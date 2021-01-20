<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Coupon_model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }
  
  function get_coupon_user_type_str($type) {
    switch ($type) {
      case COUPON_USER_TYPE_DEFAULT: return '적용회원';
      case COUPON_USER_TYPE_REGISTER: return '회원가입쿠폰';
      case COUPON_USER_TYPE_SHOP_PURCHASING: return '구매유도쿠폰';
      case COUPON_USER_TYPE_CENTER: return '센터회원쿠폰';
      case COUPON_USER_TYPE_TEACHER: return '강사회원쿠폰';
//      case COUPON_USER_TYPE_CENTER_TEACHER: return '센터/강사회원쿠폰';
    }
    return '';
  }
  function get_coupon_type_str($type) {
    switch ($type) {
      case COUPON_TYPE_DEFAULT: return '쿠폰타입';
      case COUPON_TYPE_SHOP_DISCOUNT_PRICE: return '샵할인금액';
      case COUPON_TYPE_SHOP_DISCOUNT_PERCENT: return '샵할인율';
      case COUPON_TYPE_SHOP_FREE_SHIPPING: return '무료배송';
    }
    return '';
  }

  function get_user_coupon($user_id, $coupon_id, $used = -1)
  {
    $this->db->order_by('user_coupon_id', 'desc');
    if ($used == -1) {
      return $this->db->get_where('user_coupon', array('user_id' => $user_id, 'coupon_id' => $coupon_id))->row();
    }
    return $this->db->get_where('user_coupon', array('user_id' => $user_id, 'coupon_id' => $coupon_id, 'used' => $used))->row();
  }

  function check_shop_purchasing_coupon($user_id, $coupon_id)
  {
    $received = $this->get_user_coupon($user_id, $coupon_id, 0);
    if (isset($received) == true && empty($received) == false) {
      return COUPON_RECEIVED;
    }
    return COUPON_RECEIVABLE;
  }
  
  function check_user_register_coupon($coupon_data, $user_id)
  {
    $received = $this->get_user_coupon($user_id, $coupon_data->coupon_id);
    if (isset($received) == true && empty($received) == false) {
      return COUPON_RECEIVED;
    }
    if ($coupon_data->coupon_count == 0) {
      $query = <<<QUERY
select user_id from user where '{$coupon_data->start_at}'<=create_at and  create_at<='{$coupon_data->end_at}'
order by user_id asc
QUERY;
    } else {
      $query = <<<QUERY
select user_id from user where '{$coupon_data->start_at}'<=create_at and  create_at<='{$coupon_data->end_at}'
order by user_id asc limit 0,{$coupon_data->coupon_count}
QUERY;
    }
    $user_ids = $this->db->query($query)->result();
    foreach ($user_ids as $u) {
      if ($u->user_id == $user_id) {
        return COUPON_RECEIVABLE;
      }
    }
    return COUPON_UNRECEIVABLE;
  }
  
  function get_user_type_from_coupon_user_type($coupon_user_type)
  {
    switch($coupon_user_type)
    {
      case COUPON_USER_TYPE_CENTER: return USER_TYPE_CENTER;
      case COUPON_USER_TYPE_TEACHER: return USER_TYPE_TEACHER;
//      case COUPON_USER_TYPE_CENTER_TEACHER: return (USER_TYPE_CENTER|USER_TYPE_TEACHER);
    }
    return USER_TYPE_DEFAULT;
  }
  
  function check_user_type_coupon($coupon_data, $user_data)
  {
    $received = $this->get_user_coupon($user_data->user_id, $coupon_data->coupon_id);
    if (isset($received) == true && empty($received) == false) {
      return COUPON_RECEIVED;
    }
    if ($coupon_data->coupon_count == 0) {
      $coupon_user_type = $this->get_user_type_from_coupon_user_type($coupon_data->user_type);
      if ($coupon_user_type | $user_data->user_type) {
        return COUPON_RECEIVABLE;
      }
    }
    return COUPON_UNRECEIVABLE;
  }
  
  function check_received($user_data, $coupon_data)
  {
    if ($coupon_data->user_type == COUPON_USER_TYPE_REGISTER) {
      return $this->check_user_register_coupon($coupon_data, $user_data->user_id);
    } else if ($coupon_data->user_type == COUPON_USER_TYPE_SHOP_PURCHASING) {
      return $this->check_shop_purchasing_coupon($user_data->user_id, $coupon_data->coupon_id);
    } else if ($coupon_data->user_type == COUPON_USER_TYPE_CENTER ||
      $coupon_data->user_type == COUPON_USER_TYPE_TEACHER /*|| $coupon_data->user_type == COUPON_USER_TYPE_CENTER_TEACHER */
    ) {
      return $this->check_user_type_coupon($coupon_data, $user_data);
    } else {
      return COUPON_UNRECEIVABLE;
    }
  }
  
  function receive_coupon($user_data, $coupon_id)
  {
    $coupon_data = $this->db->get_where('server_coupon', array('coupon_id' => $coupon_id))->row();
    
    $now = date('Y-m-d H:i:s');
    if ($coupon_data->start_at > $now || $now > $coupon_data->end_at) {
      echo '발급 기간이 지났습니다.';
      exit;
    }
    if ($coupon_data->activate == 0) {
      echo '발급 중지된 쿠폰입니다.';
      exit;
    }
    
    $received = $this->check_received($user_data, $coupon_data);
    if ($received == COUPON_RECEIVED) {
      echo '이미 발급 받은 쿠폰입니다.';
      exit;
    }
    if ($received == COUPON_UNRECEIVABLE) {
      echo '쿠폰 발급 대상자가 아닙니다.';
      exit;
    }

//    if ($coupon_data->user_type == COUPON_USER_TYPE_REGISTER) {
//      if ($coupon_data->start_at > $now || $now > $coupon_data->end_at) {
//        echo '발급 기간이 지났습니다.';
//        exit;
//      }
//      if ($coupon_data->activate == 0) {
//        echo '발급 중지된 쿠폰입니다.';
//        exit;
//      }
//      $received = $this->check_user_register_coupon($coupon_data, $user_id);
//      if ($received == COUPON_RECEIVED) {
//        echo '이미 발급 받은 쿠폰입니다.';
//        exit;
//      }
//
//      if ($received == COUPON_UNRECEIVABLE) {
//        echo '쿠폰 발급 대상자가 아닙니다.';
//        exit;
//      }
//    } else if ($coupon_data->user_type == COUPON_USER_TYPE_SHOP_PURCHASING) {
//      if ($coupon_data->start_at > $now || $now > $coupon_data->end_at) {
//        echo '발급 기간이 지났습니다.';
//        exit;
//      }
//      if ($coupon_data->activate == 0) {
//        echo '발급 중지된 쿠폰입니다.';
//        exit;
//      }
//      if ($this->check_shop_purchasing_coupon($user_id, $coupon_id) == COUPON_RECEIVED) {
//        echo '이미 발급 받은 쿠폰입니다.';
//        exit;
//      }
//    }
  
    $coupon_code = sprintf('%s%010d%010d', date('ymdHis'), $user_data->user_id, $coupon_id);
    $ins = array(
      'user_id' => $user_data->user_id,
      'coupon_code' => $coupon_code,
      'coupon_id' => $coupon_id,
      'coupon_type' => $coupon_data->coupon_type,
      'coupon_benefit' => $coupon_data->coupon_benefit,
      'coupon_title' => $coupon_data->coupon_title,
      'coupon_desc' => $coupon_data->coupon_desc,
      'coupon_img_url' => $coupon_data->coupon_img_url,
      'used' => 0,
      'use_at' => $coupon_data->use_at,
    );
    $this->db->set('create_at', 'NOW()', false);
    $this->db->set('used_at', 'NOW()', false);
  
    $this->db->insert('user_coupon', $ins);
  }
  
  function get_server_coupons($coupon_type)
  {
    $query = <<<QUERY
select * from server_coupon where user_type={$coupon_type} and activate=1 and
start_at<=NOW() and NOW()<=end_at
QUERY;
    return $this->db->query($query)->result();
  }

  // 특정 쿠폰 보내기
  function send_user_coupon_data($coupon, $user_data)
  {
    $received = $this->check_received($user_data, $coupon);
    if ($received == COUPON_RECEIVABLE) {
      $this->email_model->get_user_coupon_data($user_data->username, $coupon->coupon_title, $coupon->use_at, $user_data->email);
      $this->mts_model->send_user_coupon($user_data->phone, $user_data->username, $coupon->coupon_title, $coupon->use_at);
      return true;
    }
    return false;
  }
 
  // 유저 타입에 맞는 모든 쿠폰 보내기
  function send_coupon_data($coupon_user_type, $user_data) {
    $coupons = $this->get_server_coupons($coupon_user_type);
    foreach ($coupons as $coupon) {
      if ($coupon->user_type == $coupon_user_type) {
        $this->send_user_coupon_data($coupon, $user_data);
      }
    }
  }

  function get_server_coupon($coupon_id)
  {
    return $this->db->get_where('server_coupon', array('coupon_id' => $coupon_id))->row();
  }
}
