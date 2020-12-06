<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Mts_model extends CI_Model
{
  private $callback = '07086568895';
  
  function __construct()
  {
    parent::__construct();
  }

  function send_user_approval_code($phone, $approval_code)
  {
    $msg = "[파운디] 인증번호는 [{$approval_code}] 입니다.";
 
    $id = $this->send_smsmms($phone, $this->callback, $msg);
    log_message('debug', "[send smsmms] id[$id] phone[$phone] approval_code[$approval_code] msg[$msg]");
    
    return $id;
  }
  
  function send_user_passwd($phone, $email, $passwd)
  {
    $msg = "[파운디] <{$email}>님의 비밀번호가 [{$passwd}]으로 초기화되었습니다.";
    
    $id = $this->send_smsmms($phone, $this->callback, $msg);
    log_message('debug', "[send smsmms] id[$id] phone[$phone] email[$email] passwd[$passwd] msg[$msg]");
    
    return $id;
  }
  
  function send_smsmms($phone, $callback, $msg)
  {
    $ins = array(
      'TRAN_PHONE' => $phone,
      'TRAN_CALLBACK' => $callback,
      'TRAN_MSG' => $msg,
    );
    $this->db->set('TRAN_DATE', 'NOW()', false);
    $this->db->insert('MTS_SMS_MSG', $ins);

    return $this->db->insert_id();
  }
}
