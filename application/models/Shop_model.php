<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Shop_model extends CI_Model
{
 
  const CONFIRM_DELAY_DAYS = 2;
  
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
 
}