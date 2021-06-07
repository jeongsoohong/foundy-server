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
  
  function get_list() {
    return $this->db->get_where('shop', array('activate' => APPROVAL_DATA_ACTIVATE))->result();
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
      'shipping_status_code' => $this->get_shipping_status_str($next_status),
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
  
  function cancel_payment($purchase_code, $purchase_products, $cancel_reason, $shipping_status,
                          $user_cancel, $auth_code, $skip_shipping_fee = false)
  {
    $purchase_info = $this->db->get_where('shop_purchase', array('purchase_code' => $purchase_code))->row();
    
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
    }

    if ($purchase_info->status == SHOP_PURCHASE_STATUS_ALL_CANCELED) {
      $status = $this->get_purchase_status_str($purchase_info->status);
      $this->crud_model->alert_exit('주문취소가 불가능한 상태입니다. 관리자에게 문의해주세요.(결제상태:'.$status.')');
    }

    $total_balance = 0;
    $total_discount = 0;
    foreach ($purchase_products as $purchase_product) {
      if ($user_cancel == true) {
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
     
      if ($skip_shipping_fee) {
        $total_balance += ($purchase_product->total_price + $purchase_product->total_additional_price);
      } else {
        $total_balance += $purchase_product->total_balance;
      }
      $total_discount += $purchase_product->discount;
    }
    
    if ($total_balance - $total_discount <= 0) {
      $this->crud_model->alert_exit('취소 확정 금액이 0원이므로 취소하실 수 없습니다. 관리자에게 문의바랍니다.');
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
      $this->crud_model->alert_exit('토큰에 문제가 발생했습니다. 관리자에게 문의바랍니다.'.
        '(status:'.$result->status.',code:'.$result->code.',message:'.$result->message.')');
    }
    
    $access_token = $result->data->token;
    
    $url = 'https://api.bootpay.co.kr/cancel';
    $post_data = array(
      'receipt_id' => $purchase_info->receipt_id,
      'name' => $purchase_info->sender_name.'('.$purchase_info->sender_email.')',
      'reason' => $cancel_reason,
      'cancel_id' => $purchase_products[0],
      'price' => $total_balance - $total_discount,
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
    $reason =  json_encode($reason, JSON_UNESCAPED_UNICODE);
    
    $status = SHOP_PURCHASE_STATUS_ALL_CANCELED;
    if ($remain_price > 0) {
      $status = SHOP_PURCHASE_STATUS_PART_CANCELED;
    }
    
    $cancel_data = array();
    if (empty($purchase_info->cancel_data) == false) {
      $cancel_data = json_decode($purchase_info->cancel_data);
    }
    $cancel_data[] = json_encode($result, JSON_UNESCAPED_UNICODE);
    $cancel_data = json_encode($cancel_data, JSON_UNESCAPED_UNICODE);
    
    $result_json = json_encode($result, JSON_UNESCAPED_UNICODE);
    
    foreach ($purchase_products as $purchase_product) {
  
      $upd = array(
        'cancel_price' => $canceled_price,
        'cancel_reason' => $reason,
        'cancel_data' => $cancel_data,
        'status' => $status,
        'status_code' => $this->get_purchase_status_str($status),
      );
      $this->db->set('canceled_at', 'NOW()', false);
      $this->db->where('purchase_id', $purchase_info->purchase_id);
      $this->db->update('shop_purchase', $upd);
  
      $upd = array(
        'canceled' => 1,
        'cancel_price' => $request_cancel_price,
        'cancel_data' => $result_json,
        'shipping_status' => $shipping_status,
        'shipping_status_code' => $this->get_shipping_status_str($shipping_status),
      );
      if ($shipping_status != SHOP_SHIPPING_STATUS_PURCHASE_CANCELED) {
        $upd['cancel_reason'] = $cancel_reason;
      }
      $this->db->set('canceled_at', 'NOW()', false);
      $this->db->where('purchase_product_id', $purchase_product->purchase_product_id);
      $this->db->update('shop_purchase_product', $upd);
  
      $ins = array(
        'purchase_product_id' => $purchase_product->purchase_product_id,
        'shipping_status' => $shipping_status,
        'shipping_status_code' => $this->get_shipping_status_str($shipping_status),
        'shipping_data' => $result_json,
      );
      $this->db->set('modified_at', 'NOW()', false);
      $this->db->insert('shop_purchase_product_status', $ins);
  
      $this->db->set('sell', 'sell-1', false);
      $this->db->where('product_id', $purchase_product->product_id);
      $this->db->update('shop_product_id');
  
      // send push
      if ($purchase_info->user_id > 0) {
        $redirect_url = base_url() . "home/shop/order/detail?c={$purchase_code}";
      } else {
        $redirect_url = base_url() . "home/shop/order/detail?c={$purchase_code}&a={$purchase_info->session_id}";
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
  
    }
    
    return $purchase_code;
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
      case SHOP_SHIPPING_STATUS_WAIT:
      case SHOP_SHIPPING_STATUS_NONE: return '주문상태';
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
  
  function get_purchase_items($cart_items, $result, $on_sale_alert, $price_alert, $balance_update)
  {
  
    $total_price = 0;
    $total_shipping_fee= 0;
    $total_additional_price = 0;
    $total_purchase_cnt = 0;
    $cart_ids = array();
  
    $shop_items = array();
    foreach ($cart_items as $cart_item) {
      
      $cart_ids[] = $cart_item->cart_id;
  
      if (isset($shop_items[$cart_item->shop_id]) == false) {
        $shop_item = new stdClass();
      
        $shop = $this->db->get_where('shop', array('shop_id' => $cart_item->shop_id))->row();
        $shop_item->shop = new stdClass();
        $shop_item->shop->shop_id = $shop->shop_id;
        $shop_item->shop->shop_name = $shop->shop_name;
      
        $shop_shipping = $this->db->get_where('shop_shipping', array('shop_id' => $cart_item->shop_id))->row();
        $shop_item->shop_shipping = new stdClass();
        $shop_item->shop_shipping->free_shipping = $shop_shipping->free_shipping;
        $shop_item->shop_shipping->free_shipping_total_price = $shop_shipping->free_shipping_total_price;
        $shop_item->shop_shipping->free_shipping_cond_price = $shop_shipping->free_shipping_cond_price;
        $shop_item->item_cnt = 0;
        $shop_item->total_price = 0;
        $shop_item->total_purchase_cnt = 0;
        $shop_item->total_shipping_fee = 0;
        $shop_item->total_additional_price = 0;
        $shop_items[$cart_item->shop_id] = $shop_item;
        $shop_item->delegate_cart_id = $cart_item->cart_id;
      }
    
      $shop_item = $shop_items[$cart_item->shop_id];
    
      if (isset($shop_item->items[$cart_item->product_id]) == false) {
        $item = new stdClass();
      
        $product = $this->db->get_where('shop_product', array('product_id' => $cart_item->product_id))->row();
        $item->product = new stdClass();
        $item->product->product_id = $product->product_id;
        $item->product->product_code = $product->product_code;
        $item->product->item_cat = $product->item_cat;
        $item->product->item_name = $product->item_name;
        $item->product->item_general_price = $product->item_general_price;
        $item->product->item_sell_price = $product->item_sell_price;
        $item->product->item_discount_rate = $product->item_discount_rate;
        $item->product->item_margin = $product->item_margin;
        $item->product->item_supply_price = $product->item_supply_price;
        $item->product->item_tax = $product->item_tax;
        $item->product->bundle_shipping_cnt = $product->bundle_shipping_cnt;
        $item->product->item_image_url_0 = $product->item_image_url_0;
        
        if ($result->delegate_item == null) {
          $result->delegate_item = $item;
        }
      
        $product_id = $this->db->get_where('shop_product_id', array('product_id' => $cart_item->product_id))->row();
        $item->product_id = new stdClass();
        $item->product_id->status = $product_id->status;
        $item->total_purchase_cnt = 0;
        $item->total_price = 0;
        $item->total_additional_price = 0;
        $item->total_shipping_fee = 0;
        $item->cart_items = array();
        $item->delegate_cart_id = $cart_item->cart_id;
        $shop_item->items[$cart_item->product_id] = $item;
        
        if ($on_sale_alert && $item->product_id->status != SHOP_PRODUCT_STATUS_ON_SALE) {
          $this->crud_model->alert_exit('판매중지상품이 포함되어있습니다. 장바구니에서 확인 후 다시 구매해주세요.',
            base_url().'home/shop/cart');
        }
        
        if ($price_alert && $cart_item->item_sell_price != $item->product->item_sell_price) {
          $this->crud_model->alert_exit('가격정보가 변경되었습니다. 장바구니에서 확인 후 다시 구매해주세요.',
            base_url().'home/shop/cart');
        }
        
        $cart_item->item_sell_price = $item->product->item_sell_price;
  
      }
  
      $item = $shop_item->items[$cart_item->product_id];
      $item->cart_items[$cart_item->cart_id] = $cart_item;
    
      // total purchase cnt
      if ($item->product_id->status == SHOP_PRODUCT_STATUS_ON_SALE) {
        $total_purchase_cnt += $cart_item->total_purchase_cnt;
        $item->total_purchase_cnt += $cart_item->total_purchase_cnt;
        $shop_item->total_purchase_cnt += $cart_item->total_purchase_cnt;
      }
    
      // total price
      $cart_item->total_price = ($item->product->item_sell_price * $cart_item->total_purchase_cnt);
      if ($item->product_id->status == SHOP_PRODUCT_STATUS_ON_SALE) {
        $total_price += $cart_item->total_price;
        $item->total_price += $cart_item->total_price;
        $shop_item->total_price += $cart_item->total_price;
      }
    
      // options -- 변하면 안됨
      $cart_item->additional_price = 0;
      $cart_item->item_option_requires = json_decode($cart_item->item_option_requires);
      foreach ($cart_item->item_option_requires as $opt) {
        $cart_item->additional_price += $opt->price;
        if ($item->product_id->status == SHOP_PRODUCT_STATUS_ON_SALE) {
          $total_additional_price += $opt->price;
          $item->total_additional_price += $opt->price;
          $shop_item->total_additional_price += $opt->price;
        }
      }
      $cart_item->item_option_others = json_decode($cart_item->item_option_others);
      foreach ($cart_item->item_option_others as $opt) {
        $cart_item->additional_price += $opt->price;
        if ($item->product_id->status == SHOP_PRODUCT_STATUS_ON_SALE) {
          $total_additional_price += $opt->price;
          $item->total_additional_price += $opt->price;
          $shop_item->total_additional_price += $opt->price;
        }
      }
      $cart_item->shipping_fee = 0;
      $item->shipping_fee = 0;
    }
  
    foreach ($shop_items as $key => $shop_item) {
      if ($shop_item->shop_shipping->free_shipping == false) {
        if ($shop_item->total_price < $shop_item->shop_shipping->free_shipping_total_price) {
          foreach ($shop_item->items as $product_id => $item) {
            $item->shipping_fee = ($shop_item->shop_shipping->free_shipping_cond_price *
              ((int)($item->total_purchase_cnt / $item->product->bundle_shipping_cnt) +
                ($item->total_purchase_cnt % $item->product->bundle_shipping_cnt > 0 ? 1 : 0)));
          
            if ($item->product_id->status == SHOP_PRODUCT_STATUS_ON_SALE) {
              $shop_item->total_shipping_fee += $item->shipping_fee;
              $total_shipping_fee += $item->shipping_fee;
            }
          
            $item->total_balance = $item->total_price + $item->shipping_fee + $item->total_additional_price;
          }
        }
      }
      foreach ($shop_item->items as $product_id => $item) {
        foreach ($item->cart_items as $cart_id => $cart_item) {
          if ($item->delegate_cart_id == $cart_id) {
            $cart_item->shipping_fee = $item->shipping_fee;
          }
          $cart_item->total_balance = $cart_item->total_price + $cart_item->shipping_fee + $cart_item->additional_price;
          
          if ($balance_update) {
            $upd = array(
              'item_general_price' => $item->product->item_general_price,
              'item_sell_price' => $item->product->item_sell_price,
              'item_discount_rate' => $item->product->item_discount_rate,
              'free_shipping' => $shop_item->shop_shipping->free_shipping,
              'free_shipping_total_price' => $shop_item->shop_shipping->free_shipping_total_price,
              'free_shipping_cond_price' => $shop_item->shop_shipping->free_shipping_cond_price,
              'bundle_shipping_cnt' => $item->product->bundle_shipping_cnt,
              'total_purchase_cnt' => $cart_item->total_purchase_cnt,
              'total_price' => $cart_item->total_price,
              'total_shipping_fee' => $cart_item->shipping_fee,
              'total_additional_price' => $cart_item->additional_price,
              'total_balance' => $cart_item->total_balance,
              'item_tax' => $item->product->item_tax,
              'item_margin' => $item->product->item_margin,
              'item_supply_price' => $item->product->item_supply_price,
            );
  
            $this->db->set('modified_at', 'NOW()', false);
            $this->db->update('shop_cart', $upd, array('cart_id' => $cart_item->cart_id));
          }
        }
      }
    }
    
    $result->total_price = $total_price;
    $result->total_shipping_fee = $total_shipping_fee;
    $result->total_additional_price = $total_additional_price;
    $result->total_purchase_cnt = $total_purchase_cnt;
    $result->cart_ids = $cart_ids;
  
    return $shop_items;
  }
  
  function get_no_cancel_info($no_cancel_items, $no_cancel_info, $balance_update)
  {
    $total_price = 0;
    $total_shipping_fee= 0;
    $total_additional_price = 0;
    $total_purchase_cnt = 0;
    $total_discount = 0;
    $total_balance = 0;
  
    $free_shipping = false;
    $free_shipping_total_price = 0;
    $free_shipping_cond_price = 0;
    
    $purchase_items = array();
    foreach ($no_cancel_items as $no_cancel_item) {
  
      if ($no_cancel_item->shipping_status == SHOP_SHIPPING_STATUS_ORDER_CANCELED &&
        $no_cancel_item->shipping_status == SHOP_SHIPPING_STATUS_PURCHASE_CANCELED) {
        $this->crud_model->alert_exit('주문취소가 불가능한 상태입니다. 관리자에게 문의해주세요.(주문상태:'.$no_cancel_item->shipping_status.')');
      }
  
      if (isset($purchase_items[$no_cancel_item->product_id]) == false) {
        
        $purchase_item = new stdClass();
        $purchase_item->total_purchase_cnt = 0;
        $purchase_item->total_price = 0;
        $purchase_item->total_additional_price = 0;
        $purchase_item->total_shipping_fee = 0;
        $purchase_item->discount = 0;
        $purchase_item->bundle_shipping_cnt = $no_cancel_item->bundle_shipping_cnt;
        $purchase_item->items = array();
        $purchase_item->delegate_id = $no_cancel_item->purchase_product_id;
       
        $free_shipping = $no_cancel_item->free_shipping;
        $free_shipping_total_price = $no_cancel_item->free_shipping_total_price;
        $free_shipping_cond_price = $no_cancel_item->free_shipping_cond_price;
        
        $purchase_items[$no_cancel_item->product_id] = $purchase_item;
      }
  
      $purchase_item = $purchase_items[$no_cancel_item->product_id];
      $purchase_item->items[] = $no_cancel_item;
  
      // total purchase cnt
      $total_purchase_cnt += $no_cancel_item->total_purchase_cnt;
      $purchase_item->total_purchase_cnt += $no_cancel_item->total_purchase_cnt;
      
      // total price
      $total_price += $no_cancel_item->total_price;
      $purchase_item->total_price += $no_cancel_item->total_price;
      
      // total additional price
      $total_additional_price += $no_cancel_item->total_additional_price;
      $purchase_item->total_additional_price += $no_cancel_item->total_additional_price;
      
      // discount
      $total_discount += $no_cancel_item->discount;
      $purchase_item->discount += $no_cancel_item->discount;
      
      // shipping_fee
      $no_cancel_item->total_shipping_fee = 0;
      $purchase_item->total_shipping_fee = 0;
    }
    
    if ($free_shipping == false) {
      if ($total_price < $free_shipping_total_price) {
        foreach ($purchase_items as $purchase_item) {
          $purchase_item->total_shipping_fee = ($free_shipping_cond_price *
            ((int)($purchase_item->total_purchase_cnt / $purchase_item->bundle_shipping_cnt) +
              ($purchase_item->total_purchase_cnt % $purchase_item->bundle_shipping_cnt > 0 ? 1 : 0)));
        
          $total_shipping_fee += $purchase_item->total_shipping_fee;
          $purchase_item->total_balance = $purchase_item->total_price + $purchase_item->total_shipping_fee + $purchase_item->total_additional_price;
        
        }
      
      }
    }
 
    foreach ($purchase_items as $purchase_item) {
      foreach ($purchase_item->items as $no_cancel_item) {
        if ($purchase_item->delegate_id == $no_cancel_item->purchase_product_id) {
          $no_cancel_item->total_shipping_fee = $purchase_item->total_shipping_fee;
        }
        $no_cancel_item->total_balance = $no_cancel_item->total_price + $no_cancel_item->total_shipping_fee + $no_cancel_item->total_additional_price;
        $total_balance += $no_cancel_item->total_balance;
    
        if ($balance_update) {
          $upd = array(
            'total_shipping_fee' => $no_cancel_item->total_shipping_fee,
            'total_balance' => $no_cancel_item->total_balance,
          );
          $this->db->update('shop_purchase_product', $upd, array('purchase_product_id' => $no_cancel_item->purchase_product_id));
        }
      }
    }
    
    $no_cancel_info->total_price = $total_price;
    $no_cancel_info->total_shipping_fee = $total_shipping_fee;
    $no_cancel_info->total_additional_price = $total_additional_price;
    $no_cancel_info->total_purchase_cnt = $total_purchase_cnt;
    $no_cancel_info->total_balance = $total_balance;
    $no_cancel_info->total_discount = $total_discount;
    
    return $no_cancel_items;
  }
}