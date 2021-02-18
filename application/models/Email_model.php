<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');



class Email_model extends CI_Model
{
  
  /*
 *	Developed by    : Active IT zone
 *	Date	        : 14 July, 2015
 *	Active Supershop eCommerce CMS
 *	http://codecanyon.net/user/activeitezone
   *  Last Modified   : 18 January, 2017
 */
  
  function __construct()
  {
    parent::__construct();
    $this->load->library('email');
  }
  
  function sendmail($email_data)
  {
    
    $config['protocol'] = 'smtp';
    $config['smtp_host'] = 'smtps.hiworks.com';
    $config['smtp_port'] = '465';
    $config['smtp_timeout'] = '7';
    $config['smtp_user'] = $email_data->from;
    $config['smtp_pass'] = 'gkfndico33!';
    $config['charset'] = 'utf-8';
    $config['newline'] = "\r\n";
    $config['mailtype'] = $email_data->mailtype; // or html
    $config['validate'] = true;
    $config['smtp_crypto'] = 'ssl';
    
    $this->email->initialize($config);
    
    $this->email->from($email_data->from, $email_data->from_name);
    $this->email->to($email_data->to);
    $this->email->subject($email_data->subject);
    $this->email->message($email_data->email_body);
    
    return $this->email->send();

//    echo $this->email->print_debugger();
//    exit;
  }
  function get_user_shipping_status_data($shipping_status, $purchase_code, $purchase_title, $shipping_company, $shipping_code, $item_img_url, $email)
  {
    $data = $this->db->get_where('server_email', array('type' => SERVER_EMAIL_TYPE_USER_SHIPPING_STATUS, 'activate' => 1))->row();
    if (isset($data) == false || empty($data) == true) {
      return false;
    }
//    $data->subject = str_replace('{{SHIPPING_STATUS}}',$shipping_status, $data->subject);
    $data->email_body = str_replace('{{SHIPPING_STATUS}}',$shipping_status, $data->email_body);
    $data->email_body = str_replace('{{PURCHASE_CODE}}',$purchase_code, $data->email_body);
    $data->email_body = str_replace('{{PURCHASE_TITLE}}',$purchase_title, $data->email_body);
    $data->email_body = str_replace('{{SHIPPING_COMPANY}}',$shipping_company, $data->email_body);
    $data->email_body = str_replace('{{SHIPPING_CODE}}',$shipping_code, $data->email_body);
    $data->email_body = str_replace('{{ITEM_IMG_URL}}',$item_img_url, $data->email_body);
  
    $data->to = $email;
    $this->sendmail($data);
    
    return true;
  }
  function get_user_order_status_data($order_status, $purchase_code, $item_name, $purchase_date, $redirect_url, $item_img_url, $email)
  {
    $data = $this->db->get_where('server_email', array('type' => SERVER_EMAIL_TYPE_USER_ORDER_STATUS, 'activate' => 1))->row();
    if (isset($data) == false || empty($data) == true) {
      return false;
    }
//    $data->subject = str_replace('{{SHIPPING_STATUS}}',$shipping_status, $data->subject);
    $data->email_body = str_replace('{{ORDER_STATUS}}',$order_status, $data->email_body);
    $data->email_body = str_replace('{{PURCHASE_CODE}}',$purchase_code, $data->email_body);
    $data->email_body = str_replace('{{ITEM_NAME}}',$item_name, $data->email_body);
    $data->email_body = str_replace('{{PURCHASE_DATE}}',date('Y.m.d', strtotime($purchase_date)), $data->email_body);
    $data->email_body = str_replace('{{REDIRECT_URL}}',$redirect_url, $data->email_body);
    $data->email_body = str_replace('{{ITEM_IMG_URL}}',$item_img_url, $data->email_body);
  
    $data->to = $email;
    $this->sendmail($data);
    
    return true;
  }
  function get_user_coupon_data($user_name, $coupon_name, $expiration_date, $email)
  {
    $data = $this->db->get_where('server_email', array('type' => SERVER_EMAIL_TYPE_USER_PROMOTION_COUPON, 'activate' => 1))->row();
    if (isset($data) == false || empty($data) == true) {
      return false;
    }
//    $data->subject = str_replace('{{SHIPPING_STATUS}}',$shipping_status, $data->subject);
    $data->email_body = str_replace('{{USER_NAME}}',$user_name, $data->email_body);
    $data->email_body = str_replace('{{COUPON_NAME}}',$coupon_name, $data->email_body);
//    $data->email_body = str_replace('{{EXPIRATION_DATE}}',date('Y.m.d', strtotime($expiration_date)), $data->email_body);
    $data->email_body = str_replace('{{EXPIRATION_DATE}}', $expiration_date, $data->email_body);
    
    $data->to = $email;
    $this->sendmail($data);
    
    return true;
  }
  function get_user_approval_code_data($code, $email)
  {
    $data = $this->db->get_where('server_email', array('type' => SERVER_EMAIL_TYPE_USER_APPROVAL_CODE, 'activate' => 1))->row();
    if (isset($data) == false || empty($data) == true) {
      return false;
    }
    $data->email_body = str_replace('{{APPROVAL_CODE}}',$code, $data->email_body);
    
    $data->to = $email;
    $this->sendmail($data);
    
    return true;
  }
  function get_reset_pw_data($email, $pw)
  {
    $data = $this->db->get_where('server_email', array('type' => SERVER_EMAIL_TYPE_RESET_PW, 'activate' => 1))->row();
    if (isset($data) == false || empty($data) == true) {
      return false;
    }
    $data->email_body = str_replace('{{EMAIL}}',$email, $data->email_body);
    $data->email_body = str_replace('{{PW}}',$pw, $data->email_body);
    
    $data->to = $email;
    $this->sendmail($data);
    
    return true;
  }
  
  function get_teacher_approval_data($email)
  {
    $data = $this->db->get_where('server_email', array('type' => SERVER_EMAIL_TYPE_TEACHER_APPROVAL, 'activate' => 1))->row();
    if (isset($data) == false || empty($data) == true) {
      return false;
    }
    
    $data->to = $email;
    $this->sendmail($data);
    
    return true;
  }
  function get_teacher_reject_data($email)
  {
    $data = $this->db->get_where('server_email', array('type' => SERVER_EMAIL_TYPE_TEACHER_REJECT, 'activate' => 1))->row();
    if (isset($data) == false || empty($data) == true) {
      return false;
    }
    
    $data->to = $email;
    $this->sendmail($data);
    
    return true;
  }
  function get_studio_approval_data($email)
  {
    $data = $this->db->get_where('server_email', array('type' => SERVER_EMAIL_TYPE_STUDIO_APPROVAL, 'activate' => 1))->row();
    if (isset($data) == false || empty($data) == true) {
      return false;
    }
    
    $data->to = $email;
    $this->sendmail($data);
    
    return true;
  }
  function get_studio_reject_data($email)
  {
    $data = $this->db->get_where('server_email', array('type' => SERVER_EMAIL_TYPE_STUDIO_REJECT, 'activate' => 1))->row();
    if (isset($data) == false || empty($data) == true) {
      return false;
    }
    
    $data->to = $email;
    $this->sendmail($data);
    
    return true;
  }
  function get_center_approval_data($email)
  {
    $data = $this->db->get_where('server_email', array('type' => SERVER_EMAIL_TYPE_CENTER_APPROVAL, 'activate' => 1))->row();
    if (isset($data) == false || empty($data) == true) {
      return false;
    }
  
    $data->to = $email;
    $this->sendmail($data);
  
    return true;
  }
  function get_center_reject_data($email)
  {
    $data = $this->db->get_where('server_email', array('type' => SERVER_EMAIL_TYPE_CENTER_REJECT, 'activate' => 1))->row();
    if (isset($data) == false || empty($data) == true) {
      return false;
    }
  
    $data->to = $email;
    $this->sendmail($data);
  
    return true;
  }
  function get_shop_shipping_status_data($brand_name, $order_status, $email)
  {
  
    $data = $this->db->get_where('server_email', array('type' => SERVER_EMAIL_TYPE_SHOP_ORDER_STATUS, 'activate' => 1))->row();
    if (isset($data) == false || empty($data) == true) {
      return false;
    }
    $data->email_body = str_replace('{{BRAND_NAME}}', $brand_name, $data->email_body);
    $data->email_body = str_replace('{{ORDER_STATUS}}', $order_status, $data->email_body);
  
    $data->to = $email;
    $this->sendmail($data);
  
    return true;
  }
  function send_shop_unconfirmed_order_mail($brand_name, $confirm_status, $count, $email)
  {
    
    $data = $this->db->get_where('server_email', array('type' => SERVER_EMAIL_TYPE_SHOP_UNCONFIRMED, 'activate' => 1))->row();
    if (isset($data) == false || empty($data) == true) {
      return false;
    }
    $data->email_body = str_replace('{{BRAND_NAME}}', $brand_name, $data->email_body);
    $data->email_body = str_replace('{{CONFIRM_STATUS}}', $confirm_status, $data->email_body);
    $data->email_body = str_replace('{{COUNT}}', $count, $data->email_body);
  
    $data->to = $email;
    $this->sendmail($data);
    
    return true;
  }
  function send_online_class_confirm($email, $title, $date, $time, $count)
  {
    $data = $this->db->get_where('server_email', array('type' => SERVER_EMAIL_TYPE_ONLINE_CLASS_CONFIRM, 'activate' => 1))->row();
    if (isset($data) == false || empty($data) == true) {
      return false;
    }
    $data->email_body = str_replace('{{날짜}}', date('Y.m.d', strtotime($date)), $data->email_body);
    $data->email_body = str_replace('{{시간}}', $time, $data->email_body);
    $data->email_body = str_replace('{{수업명}}', '['.$title.']', $data->email_body);
    $data->email_body = str_replace('{{COUNT}}', $count, $data->email_body);
    
    $data->to = $email;
    
//    log_message('debug', '[studio] send online class confirm, data['.json_encode($data).']');
    
    $this->sendmail($data);
    
    return true;
  }
  function send_online_class_register($email, $teacher_name, $title, $date, $time, $pay_info, $reserve_popup, $teacher_email)
  {
    $data = $this->db->get_where('server_email', array('type' => SERVER_EMAIL_TYPE_ONLINE_CLASS_REGISTER, 'activate' => 1))->row();
    if (isset($data) == false || empty($data) == true) {
      return false;
    }
    $data->email_body = str_replace('{{강사명}}', '['.$teacher_name.']', $data->email_body);
    $data->email_body = str_replace('{{수업명}}', '"'.$title.'"', $data->email_body);
    $data->email_body = str_replace('{{예약일자}}', date('Y.m.d', strtotime($date)), $data->email_body);
    $data->email_body = str_replace('{{시간}}', $time, $data->email_body);
    $data->email_body = str_replace('{{결제정보}}', $pay_info, $data->email_body);
    $data->email_body = str_replace('{{주의사항}}', $reserve_popup, $data->email_body);
    $data->email_body = str_replace('{{강사이메일}}', $teacher_email, $data->email_body);
  
    $data->to = $email;
    $this->sendmail($data);
  
    return true;
  }
  function send_online_class_reserve($email, $teacher_name, $title, $date, $time)
  {
    $data = $this->db->get_where('server_email', array('type' => SERVER_EMAIL_TYPE_ONLINE_CLASS_RESERVE, 'activate' => 1))->row();
    if (isset($data) == false || empty($data) == true) {
      return false;
    }
    $data->email_body = str_replace('{{강사명}}', '['.$teacher_name.']', $data->email_body);
    $data->email_body = str_replace('{{수업명}}', '"'.$title.'"', $data->email_body);
    $data->email_body = str_replace('{{예약일자}}', date('Y.m.d', strtotime($date)), $data->email_body);
    $data->email_body = str_replace('{{시간}}', $time, $data->email_body);
    
    $data->to = $email;
    $this->sendmail($data);
    
    return true;
  }
  function send_online_class_link($email, $teacher_name, $title, $date, $time, $link, $id, $pw, $teacher_email)
  {
    $data = $this->db->get_where('server_email', array('type' => SERVER_EMAIL_TYPE_ONLINE_CLASS_LINK, 'activate' => 1))->row();
    if (isset($data) == false || empty($data) == true) {
      return false;
    }
    $data->email_body = str_replace('{{강사명}}', '['.$teacher_name.']', $data->email_body);
    $data->email_body = str_replace('{{수업명}}', '"'.$title.'"', $data->email_body);
    $data->email_body = str_replace('{{예약일자}}', date('Y.m.d', strtotime($date)), $data->email_body);
    $data->email_body = str_replace('{{시간}}', $time, $data->email_body);
    $data->email_body = str_replace('{{링크}}', $link, $data->email_body);
    $data->email_body = str_replace('{{id}}', $id, $data->email_body);
    $data->email_body = str_replace('{{pw}}', $pw, $data->email_body);
    $data->email_body = str_replace('{{강사이메일}}', $teacher_email, $data->email_body);
    
    $data->to = $email;
    $this->sendmail($data);
    
    return true;
  }
  function send_online_class_cancel($email, $teacher_name, $title, $date, $time)
  {
    $data = $this->db->get_where('server_email', array('type' => SERVER_EMAIL_TYPE_ONLINE_CLASS_CANCEL, 'activate' => 1))->row();
    if (isset($data) == false || empty($data) == true) {
      return false;
    }
    $data->email_body = str_replace('{{강사명}}', '['.$teacher_name.']', $data->email_body);
    $data->email_body = str_replace('{{수업명}}', '"'.$title.'"', $data->email_body);
    $data->email_body = str_replace('{{예약일자}}', date('Y.m.d', strtotime($date)), $data->email_body);
    $data->email_body = str_replace('{{시간}}', $time, $data->email_body);
    
    $data->to = $email;
    $this->sendmail($data);
    
    return true;
  }
}