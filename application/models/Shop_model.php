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
      'shipping_status_code' => $this->crud_model->get_shipping_status_str($next_status),
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
      $this->crud_model->get_shipping_status_str($next_status), $purchase_info->purchase_code,
      $product_info->item_name, date('Y-m-d H:i:s'), $redirect_url, $product_info->item_image_url_0, $email);
  }
  
}