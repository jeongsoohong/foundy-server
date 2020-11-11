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
  function get_shop_approval_data($brand, $email)
  {
    $data = $this->db->get_where('server_email', array('type' => SERVER_EMAIL_TYPE_SHOP_APPROVAL, 'activate' => 1))->row();
    if (isset($data) == false || empty($data) == true) {
      return false;
    }
    $data->email_body = str_replace('{{BRAND}}',$brand, $data->email_body);
    $data->email_body = str_replace('{{EMAIL}}',$email, $data->email_body);
  
    $data->to = $email;
    $this->sendmail($data);
  
    return true;
  }
  function get_user_approval_data($code, $email)
  {
    $data = $this->db->get_where('server_email', array('type' => SERVER_EMAIL_TYPE_USER_APPROVAL, 'activate' => 1))->row();
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
  function get_user_qna_req_data($req, $email)
  {
    $data = $this->db->get_where('server_email', array('type' => SERVER_EMAIL_TYPE_USER_QNA_REQ, 'activate' => 1))->row();
    if (isset($data) == false || empty($data) == true) {
      return false;
    }
    $data->email_body = str_replace('{{REQ}}',$req, $data->email_body);
    
    $data->to = $email;
    $this->sendmail($data);
  
    return true;
  }
  function get_user_qna_res_data($reply, $email)
  {
    $data = $this->db->get_where('server_email', array('type' => SERVER_EMAIL_TYPE_USER_QNA_RES, 'activate' => 1))->row();
    if (isset($data) == false || empty($data) == true) {
      return false;
    }
    $data->email_body = str_replace('{{REPLY}}',$reply, $data->email_body);
    
    $data->to = $email;
    $this->sendmail($data);
  
    return true;
  }
  function get_shop_shipping_status_data($item_status, $purchase_code, $brand_name, $item_name, $email)
  {
  
    $data = $this->db->get_where('server_email', array('type' => SERVER_EMAIL_TYPE_SHOP_SHIPPING_STATUS, 'activate' => 1))->row();
    if (isset($data) == false || empty($data) == true) {
      return false;
    }
    $data->subject = str_replace('{{ITEM_STATUS}}',$item_status, $data->subject);
    $data->email_body = str_replace('{{ITEM_STATUS}}',$item_status, $data->email_body);
    $data->email_body = str_replace('{{PURCHASE_CODE}}',$purchase_code, $data->email_body);
    $data->email_body = str_replace('{{BRAND_NAME}}',$brand_name, $data->email_body);
    $data->email_body = str_replace('{{ITEM_NAME}}',$item_name, $data->email_body);
  
    $data->to = $email;
    $this->sendmail($data);
  
    return true;
  }
  function get_user_shipping_status_data($item_status, $purchase_code, $brand_name, $item_name, $email)
  {
    $data = $this->db->get_where('server_email', array('type' => SERVER_EMAIL_TYPE_USER_SHIPPING_STATUS, 'activate' => 1))->row();
    if (isset($data) == false || empty($data) == true) {
      return false;
    }
    $data->subject = str_replace('{{ITEM_STATUS}}',$item_status, $data->subject);
    $data->email_body = str_replace('{{ITEM_STATUS}}',$item_status, $data->email_body);
    $data->email_body = str_replace('{{PURCHASE_CODE}}',$purchase_code, $data->email_body);
    $data->email_body = str_replace('{{BRAND_NAME}}',$brand_name, $data->email_body);
    $data->email_body = str_replace('{{ITEM_NAME}}',$item_name, $data->email_body);
   
    $data->to = $email;
    $this->sendmail($data);
    
    return true;
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
}