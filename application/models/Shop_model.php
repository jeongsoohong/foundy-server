<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Shop_model extends CI_Model
{
 
  const CONFIRM_DELAY_DAYS = 1;
  
  function __construct()
  {
    parent::__construct();
    
  }
  
  function get($shop_id) {
    return $this->db->get_where('shop', array('shop_id' => $shop_id))->row();
  }
  
  function get_shop_ids_for_purchase_product($shipping_status, $modified_at)
  {
    $query = <<<QUERY
select distinct(shop_id) from shop_purchase_product
where shipping_status={$shipping_status} and modified_at<'{$modified_at}'
QUERY;
    return $this->db->query($query)->result();
  }
  
  function get_count_of_purchase_product($shipping_status, $modified_at, $shop_id)
  {
    $query = <<<QUERY
select count(*) as cnt from shop_purchase_product
where shipping_status={$shipping_status} and modified_at<'{$modified_at}' and shop_id={$shop_id}
QUERY;
    return $this->db->query($query)->row()->cnt;
  }
  
  function get_purchase_products($shipping_status, $modified_at = NULL)
  {
    $query = <<<QUERY
select * from shop_purchase_product
where shipping_status={$shipping_status}
QUERY;
    
    if ($modified_at) {
      $query .= " and modified_at<'{$modified_at}'";
    }

    return $this->db->query($query)->result();
  }
  
  function get_shipping_data($shipping_data)
  {
    $url = sprintf('https://info.sweettracker.co.kr/api/v1/trackingInfo?t_key=%s&t_code=%s&t_invoice=%s',
      APIKEY_SWEET_TRACKER, $shipping_data->shipping_company, $shipping_data->shipping_code);
  
    $opts = array(
      CURLOPT_URL => $url,
      CURLOPT_SSL_VERIFYPEER => false,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HEADER => false,
    );
    $ch = curl_init();
    curl_setopt_array($ch, $opts);
    $result = json_decode(curl_exec($ch));
    curl_close($ch);
    
    //$this->crud_model->alert_exit(json_encode($result));
    
    return $result;
  }
  
  function preprocess_shop_shipping_status_set($purchase_product, $next_status)
  {
    $ins = array(
      'purchase_product_id' => $purchase_product->purchase_product_id,
      'shipping_status' => $next_status,
      'shipping_status_code' => $this->shop_model->get_shipping_status_str($next_status),
    );
    $this->db->set('modified_at', 'NOW()', false);
    $this->db->insert('shop_purchase_product_status', $ins);
  
    // send kakao alim talk
    $purchase_info = $this->db->get_where('shop_purchase', array('purchase_code' => $purchase_product->purchase_code))->row();
    if ($purchase_info->user_id > 0) {
      $user_data = $this->db->get_where('user', array('user_id' => $purchase_info->user_id))->row();
      $email = $user_data->email;
      $phone = $user_data->phone;
    } else {
      $email = $purchase_info->sender_email;
      $phone = $purchase_info->sender_phone;
    }
    if ($purchase_info->user_id > 0) {
      $redirect_url = base_url() . "home/shop/order/detail?c={$purchase_info->purchase_code}";
    } else {
      $redirect_url = base_url() . "home/shop/order/detail?c={$purchase_info->purchase_code}&a={$purchase_info->session_id}";
    }
    $payment_info =  json_decode($purchase_info->bootpay_done_data);
    $this->mts_model->send_shop_order($phone, $next_status, $purchase_info->purchase_code,
      $payment_info->item_name, $payment_info->purchased_at, $redirect_url);
    $product_info = $this->db->get_where('shop_product', array('product_id' => $purchase_product->product_id))->row();
    $this->email_model->get_user_order_status_data(
      $this->get_shipping_status_str($next_status), $purchase_info->purchase_code,
      $product_info->item_name, date('Y-m-d H:i:s'), $redirect_url, $product_info->item_image_url_0, $email);
  }
  
  function cancel_payment($purchase_product_id, $cancel_reason, $shipping_status, $user_cancel, $auth_code)
  {
    $purchase_product = $this->db->get_where('shop_purchase_product', array('purchase_product_id' => $purchase_product_id))->row();
    $purchase_info = $this->db->get_where('shop_purchase', array('purchase_id' => $purchase_product->purchase_id))->row();
    
    if (empty($purchase_product) || empty($purchase_info)) {
      $this->crud_model->alert_exit('잘못된 접근입니다.');
    }
    
    if ($user_cancel == true) {
      // confirm user_id & session_id
      if ($purchase_info->user_id > 0) {
        if ($this->session->userdata('user_login') != 'yes') {
          $this->crud_model->alert_exit('잘못된 접근입니다.(1)');
        }
        $user_id = $this->session->userdata('user_id');
        if ($purchase_info->user_id != $user_id) {
          $this->crud_model->alert_exit('잘못된 접근입니다.(2)');
        }
      } else if ($purchase_info->session_id != '0') {
        if ($purchase_info->session_id != $auth_code) {
          $this->crud_model->alert_exit('잘못된 접근입니다.(3)');
        }
      } else {
        $this->crud_model->alert_exit('잘못된 접근입니다.(4)');
      }
      // confirm shipping_status
      if ($purchase_product->shipping_status != SHOP_SHIPPING_STATUS_PREPARE &&
        $purchase_product->shipping_status != SHOP_SHIPPING_STATUS_ORDER_COMPLETED) {
        $status = $this->get_shipping_status_str($purchase_product->shipping_status);
        $this->crud_model->alert_exit('주문취소가 불가능한 상태입니다. 관리자에게 문의해주세요.(주문상태:'.$status.')');
      }
    } else { // center cancel
      // confirm shipping_status
      if ($purchase_product->shipping_status != SHOP_SHIPPING_STATUS_PREPARE &&
        $purchase_product->shipping_status != SHOP_SHIPPING_STATUS_ORDER_COMPLETED &&
        $purchase_product->shipping_status != SHOP_SHIPPING_STATUS_PURCHASE_CANCELING) {
        $status = $this->get_shipping_status_str($purchase_product->shipping_status);
        $this->crud_model->alert_exit('주문취소가 불가능한 상태입니다. 관리자에게 문의해주세요.(주문상태:'.$status.')');
      }
    }
    
    if ($purchase_info->status == SHOP_PURCHASE_STATUS_ALL_CANCELED) {
      $status = $this->get_purchase_status_str($purchase_info->status);
      $this->crud_model->alert_exit('주문취소가 불가능한 상태입니다. 관리자에게 문의해주세요.(결제상태:'.$status.')');
    }
    
    $url = 'https://api.bootpay.co.kr/request/token';
    $app_key = APIKEY_BOOTPAY_REST;
    $private_key = APIKEY_BOOTPAY_PRIVATE;
    
    $post_data = array(
      'application_id' => $app_key,
      'private_key' => $private_key
    );
//        $params = sprintf( 'application_id=%s&private_key=%s', $app_key, $private_key);
    
    $opts = array(
      CURLOPT_URL => $url,
      CURLOPT_SSL_VERIFYPEER => false,
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => http_build_query($post_data), // $params 처럼
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HEADER => false,
    );
    $ch = curl_init();
    curl_setopt_array($ch, $opts);
    $result = json_decode(curl_exec($ch));
    
    if ($result->status != 200) {
      $this->crud_model->alert_exit('토큰에 문제가 발생했습니다. 관리자에게 문의바랍니다.(1)');
    }
    
    $access_token = $result->data->token;
    
    $url = 'https://api.bootpay.co.kr/cancel';
    $post_data = array(
      'receipt_id' => $purchase_info->receipt_id,
      'name' => $purchase_info->sender_name.'('.$purchase_info->sender_email.')',
      'reason' => $cancel_reason,
      'cancel_id' => $purchase_product_id,
      'price' => $purchase_product->total_balance - $purchase_product->discount,
    );
    
    $opts = array(
      CURLOPT_URL => $url,
      CURLOPT_SSL_VERIFYPEER => false,
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => http_build_query($post_data),
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HTTPHEADER => array("Authorization: ".$access_token)
    );
    $ch = curl_init();
    curl_setopt_array($ch, $opts);
    $result = json_decode(curl_exec($ch));
    
    curl_close($ch);
    
    if ($result->status != 200) {
      $this->crud_model->alert_exit(json_encode($result));
    }
    
    $request_cancel_price = $result->data->request_cancel_price;
    $remain_price = $result->data->remain_price;
    $canceled_price = $result->data->cancelled_price;
    
    $reason = array();
    if (empty($purchase_info->cancel_reason) == false) {
      $reason = json_decode($purchase_info->cancel_reason);
    }
    $reason[] = $cancel_reason;
    
    $status = SHOP_PURCHASE_STATUS_ALL_CANCELED;
    if ($remain_price > 0) {
      $status = SHOP_PURCHASE_STATUS_PART_CANCELED;
    }
    
    $cancel_data = array();
    if (empty($purchase_info->cancel_reason) == false) {
      $cancel_data = json_decode($purchase_info->cancel_data);
    }
    $cancel_data[] = json_encode($result, JSON_UNESCAPED_UNICODE);
    
    $upd = array(
      'cancel_price' => $canceled_price,
      'cancel_reason' => json_encode($reason, JSON_UNESCAPED_UNICODE),
      'cancel_data' => json_encode($cancel_data, JSON_UNESCAPED_UNICODE),
      'status' => $status,
      'status_code' => $this->get_purchase_status_str($status),
    );
    $this->db->set('canceled_at', 'NOW()', false);
    $this->db->where('purchase_id', $purchase_info->purchase_id);
    $this->db->update('shop_purchase', $upd);
    
    $upd = array(
      'canceled' => 1,
      'cancel_price' => $request_cancel_price,
      'cancel_data' => json_encode($result, JSON_UNESCAPED_UNICODE),
      'cancel_reason' => $cancel_reason,
      'shipping_status' => $shipping_status,
      'shipping_status_code' => $this->get_shipping_status_str($shipping_status),
    );
    $this->db->set('canceled_at', 'NOW()', false);
    $this->db->where('purchase_product_id', $purchase_product_id);
    $this->db->update('shop_purchase_product', $upd);
    
    $ins = array(
      'purchase_product_id' => $purchase_product_id,
      'shipping_status' => $shipping_status,
      'shipping_status_code' => $this->get_shipping_status_str($shipping_status),
      'shipping_data' => json_encode($result, JSON_UNESCAPED_UNICODE),
    );
    $this->db->set('modified_at', 'NOW()', false);
    $this->db->insert('shop_purchase_product_status', $ins);
    
    $this->db->set('sell', 'sell-1', false);
    $this->db->where('product_id', $purchase_product->product_id);
    $this->db->update('shop_product_id');
    
    // send push
    if ($purchase_info->user_id > 0) {
      $redirect_url = base_url() . "home/shop/order/detail?c={$purchase_info->purchase_code}";
    } else {
      $redirect_url = base_url() . "home/shop/order/detail?c={$purchase_info->purchase_code}&a={$purchase_info->session_id}";
    }
    
    $title = $this->get_shipping_status_str($shipping_status);
    if ($user_cancel) {
      $body = '주문하신 상품을 취소하였습니다. 주문내역을 확인해주세요.';
      $this->push->send_push_private($this->session, $title, $body, $redirect_url, null);
    } else {
      $body = '주문하신 상품이 취소되었습니다. 주문내역을 확인해주세요.';
      $app_data = $this->db->get_where('user_app', array('user_id' => $purchase_info->user_id))->row();

//      log_message('debug', '[push notification] req { title: '.$title.', body: '.$body.', user_id : '.$purchase_info->uesr_id.
//        ', app_data : '.json_encode($app_data));
      
      $this->push->send_push_private(null, $title, $body, $url, $app_data);
    }
    
    // send email
    if ($purchase_info->user_id > 0) {
      $user_data = $this->db->get_where('user', array('user_id' => $purchase_info->user_id))->row();
      $email = $user_data->email;
      $phone = $user_data->phone;
    } else {
      $email = $purchase_info->sender_email;
      $phone = $purchase_info->sender_phone;
    }
    $product_info = $this->db->get_where('shop_product', array('product_id' => $purchase_product->product_id))->row();
    $shop_info = $this->db->get_where('shop', array('shop_id' => $product_info->shop_id))->row();
    $this->email_model->get_user_order_status_data(
      $this->get_shipping_status_str($shipping_status), $purchase_info->purchase_code,
      $product_info->item_name, date('Y-m-d H:i:s'), $redirect_url, $product_info->item_image_url_0, $email);
    if ($user_cancel) {
      $this->email_model->get_shop_shipping_status_data($shop_info->shop_name,
        $this->get_shipping_status_str($shipping_status), $shop_info->email);
    }
    
    // send kakao alim talk
    $payment_info =  json_decode($purchase_info->bootpay_done_data);
    $this->mts_model->send_shop_order($phone, $shipping_status, $purchase_info->purchase_code,
      $payment_info->item_name, $payment_info->purchased_at, $redirect_url);
    
    return $purchase_info->purchase_code;
  }
  
  function get_shipping_req_str($type) {
    switch($type) {
      case SHOP_SHIPPING_REQ_DEFAULT : return '배송시 요청 사항을 선택해 주세요.';
      case SHOP_SHIPPING_REQ_IN_FRONT_OF_DOOR : return '부재시 문 앞에 놓아 주세요.';
      case SHOP_SHIPPING_REQ_OFFICE : return '부재시 경비실에 맡겨 주세요.';
      case SHOP_SHIPPING_REQ_PHONE_OR_SMS : return '부재시 전화 또는 문자 주세요.';
      case SHOP_SHIPPING_REQ_PHONE_BEFORE_SHIPPING : return '배송 전에 연락주세요.';
      case SHOP_SHIPPING_REQ_DIRECT_INPUT : return '직접입력';
    }
    return '';
  }
  
  function get_purchase_status_str($status) {
    switch($status) {
      case SHOP_PURCHASE_STATUS_PREPARED : return '구매 준비';
      case SHOP_PURCHASE_STATUS_PURCHASING: return '구매중';
      case SHOP_PURCHASE_STATUS_PAYING: return '결제중';
      case SHOP_PURCHASE_STATUS_PAYING_CANCELED: return '결제중 취소';
      case SHOP_PURCHASE_STATUS_CONFIRM_SUCCESS: return '결제 확인 성공';
      case SHOP_PURCHASE_STATUS_CONFIRM_FAIL: return '결제 확인 실패';
      case SHOP_PURCHASE_STATUS_DONE_SUCCESS: return '결제 검증 성공';
      case SHOP_PURCHASE_STATUS_DONE_FAIL: return '결제 검증 실패';
      case SHOP_PURCHASE_STATUS_COMPLETED: return '결제 완료';
      case SHOP_PURCHASE_STATUS_PART_CANCELED: return '부분 결제취소';
      case SHOP_PURCHASE_STATUS_ALL_CANCELED: return '전체 결제취소';
    }
    return '';
  }
  
  function get_shipping_status_str($status) {
    switch ($status) {
      case SHOP_SHIPPING_STATUS_WAIT: return '입금대기';
      case SHOP_SHIPPING_STATUS_ORDER_COMPLETED: return '주문완료';
      case SHOP_SHIPPING_STATUS_ORDER_CANCELED: return '주문취소';
      case SHOP_SHIPPING_STATUS_PREPARE: return '배송준비중';
      case SHOP_SHIPPING_STATUS_IN_PROGRESS: return '배송중';
      case SHOP_SHIPPING_STATUS_COMPLETED: return '배송완료';
      case SHOP_SHIPPING_STATUS_PURCHASE_COMPLETED: return '구매확정';
      case SHOP_SHIPPING_STATUS_PURCHASE_CANCELED: return '반품완료';
      case SHOP_SHIPPING_STATUS_PURCHASE_CANCELING: return '반품중';
      case SHOP_SHIPPING_STATUS_PURCHASE_CHANGED: return '교환완료';
      case SHOP_SHIPPING_STATUS_PURCHASE_CHANGING: return '교환중';
    }
  }
  
  function get_order_req_type_str($type) {
    switch ($type) {
      case SHOP_ORDER_REQ_TYPE_DEFAULT : return '기본';
      case SHOP_ORDER_REQ_TYPE_CANCEL: return '주문취소';
      case SHOP_ORDER_REQ_TYPE_CHANGE: return '교환';
      case SHOP_ORDER_REQ_TYPE_RETURN: return '반품';
    }
  }
}