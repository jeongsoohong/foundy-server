<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Mts_model extends CI_Model
{
  private $callback = '07086568895';
  private $kakao_sender_key = '4bd39ffc87041c754584b72a61aa500d2585f524';
  
  function __construct()
  {
    parent::__construct();
  }
  
  function send_sms($phone, $msg)
  {
    $ins = array(
      'TRAN_PHONE' => $phone,
      'TRAN_CALLBACK' => $this->callback,
      'TRAN_MSG' => $msg,
      'TRAN_TYPE' => 0, // SMS
    );
    $this->db->set('TRAN_DATE', 'NOW()', false);
    $this->db->insert('MTS_SMS_MSG', $ins);
    
    return $this->db->insert_id();
  }
  
  function send_mms($phone, $msg, $subject = null)
  {
    $ins = array(
      'TRAN_PHONE' => $phone,
      'TRAN_CALLBACK' => $this->callback,
      'TRAN_SUBJECT' => $subject,
      'TRAN_MSG' => $msg,
      'TRAN_TYPE' => 4, //MMS
    );
    $this->db->set('TRAN_DATE', 'NOW()', false);
    $this->db->insert('MTS_MMS_MSG', $ins);
    
    return $this->db->insert_id();
  }
  
  function send_atalk($phone, $msg, $subject, $template_code)
  {
    $ins = array(
      'TRAN_PHONE' => $phone,
      'TRAN_CALLBACK' => $this->callback,
      'TRAN_SENDER_KEY' => $this->kakao_sender_key,
      'TRAN_TMPL_CD' => $template_code,
      'TRAN_SUBJECT' => $subject,
      'TRAN_MSG' => $msg,
      'TRAN_STATUS' => '1',
      'TRAN_TYPE' => 5, // alimtalk
      'TRAN_REPLACE_TYPE' => 'N',
      'TRAN_REPLACE_MSG' => '',
    );
    $this->db->set('TRAN_DATE', 'NOW()', false);
    $this->db->insert('MTS_ATALK_MSG', $ins);
    
    return $this->db->insert_id();
  }
  
  function send_user_approval_code($phone, $approval_code)
  {
    if ($phone == null || $phone == '') {
      return 0;
    }
    
    $msg = "[파운디] 인증번호는 [{$approval_code}] 입니다.";
    
    $id = $this->send_sms($phone, $msg);
    log_message('debug', "[send smsmms] send_user_approval_code, id[$id] phone[$phone] msg[$msg]");
    return $id;
  }
  
  function send_user_passwd($phone, $email, $passwd)
  {
    if ($phone == null || $phone == '') {
      return 0;
    }
    
    $msg = "[파운디] <{$email}>님의 비밀번호가 [{$passwd}]으로 초기화되었습니다.";
    
    $id = $this->send_sms($phone, $msg);
    log_message('debug', "[send smsmms] send_user_passwd, id[$id] phone[$phone] msg[$msg]");
    return $id;
  }
  
  function get_ampm($time)
  {
    return ($time < '12:00:00' ? 'AM' : 'PM');
  }
  
  function get_time($time)
  {
    return ($time <= '12:00:00' ? substr($time, 0, 5) : substr(date('H:i:s', strtotime($time) - 12 * ONE_HOUR), 0, 5));
  }
  
  function send_class_reminder($phone, $center_title, $schedule_title, $start_time)
  {
    if ($phone == null || $phone == '') {
      return 0;
    }
  
    $subject = '예약알림/리마인드 01';
    $msg = <<<MSG
[FOUNDY 예약알림]

예약하신 #{센터명} #{수업명} 수업은 오늘 #{시간} 시작입니다!
제시간 입장으로 시작 준비운동부터 안전한 수업 즐기시길 바랍니다 :)

*예약취소 가능시간은 센터마다 상이하며, 시스템상 취소가 불가한 시간에 취소를 원하실 경우, 예약하신 센터에 문의를 부탁드립니다!
MSG;
  
    $msg = str_replace('#{센터명}', $center_title, $msg);
    $msg = str_replace('#{수업명}', $schedule_title, $msg);
    $msg = str_replace('#{시간}', $start_time, $msg);
  
    $id = $this->send_atalk($phone, $msg, $subject, 'FOUNDY_reminder01');
    log_message('debug', "[send atalk] send_class_reminder, id[$id] phone[$phone] msg[$msg]");
 
    return $id;
  }
  
  function send_class_reserve($phone, $type, $schedule_title, $date, $center_title, $start_time, $end_time)
  {
    if ($phone == null || $phone == '') {
      return 0;
    }
    if ($type == CENTER_TICKET_MEMBER_ACTION_RESERVE) {
      $reserve_msg = '신청완료';
    } else if ($type == CENTER_TICKET_MEMBER_ACTION_RESERVE_WAIT) {
      $reserve_msg = '대기신청';
    } else if ($type == CENTER_TICKET_MEMBER_ACTION_RESERVE_CANCEL) {
      $reserve_msg = '취소완료';
    } else {
      return 0;
    }
    $subject = '수업예약내역';
    $center_title = "<{$center_title}>";
    $schedule_title = "\"{$schedule_title}\"";
    $date = date('Y.m.d', strtotime($date));
    $time = $this->get_ampm($start_time).' '.$this->get_time($start_time).' ~ '.$this->get_ampm($end_time).' '.$this->get_time($end_time);
    $msg = <<<MSG
[FOUNDY #{예약현황}]
클래스 예약이 #{예약현황} 되었습니다.

-예약내역 : #{센터명} #{수업명}
-예약일자 : #{예약일자} #{시간}

*예약 관련 주의사항
-예약취소 가능시간은 센터 마다 상이하며, 시스템상 취소가 불가한 시간에 취소를 원하실 경우, 예약하신 센터로 연락 부탁드립니다! 타인의 소중한 시간을 배려해주세요.
-예약 취소를 실수로 누르셨을 경우라도, 다시 스케줄 예약을 해주셔야 합니다.
-예약대기자의 경우 예약이 완료될 경우 알림톡이 발송됩니다.
-기타 수업에관한 문의는 해당 센터로 직접 연락 부탁드립니다.
MSG;
    $msg = str_replace('#{예약현황}', $reserve_msg, $msg);
    $msg = str_replace('#{센터명}', $center_title, $msg);
    $msg = str_replace('#{수업명}', $schedule_title, $msg);
    $msg = str_replace('#{예약일자}', $date, $msg);
    $msg = str_replace('#{시간}', $time, $msg);
    
    $id = $this->send_atalk($phone, $msg, $subject, 'FOUNDY_reservation');
    log_message('debug', "[send atalk] send_class_reserve, id[$id] phone[$phone] msg[$msg]");

//    $msg = <<<MSG
//[파운디] 클래스 예약신청 안내
//
//{$username}님,
//<{$schedule_title}> 클래스({$date}) 예약신청이 완료 되었습니다!
//궁금한 점은 파운디를 통해서 센터에 문의바랍니다!
//MSG;
    $id = $this->send_mms($phone, $msg);

    log_message('debug', "[send smsmms] send_class_reserve, id[$id] phone[$phone] msg[$msg]");
    return $id;
  }
  
  function send_class_wait($phone, $username, $title, $date)
  {
    if ($phone == null || $phone == '') {
      return 0;
    }
    $msg = <<<MSG
[파운디] 클래스 예약대기 안내

{$username}님,
<{$title}> 클래스({$date}) 정원 초과로 인해서 예약대기 신청되었습니다!
궁금한 점은 파운디를 통해서 센터에 문의바랍니다!
MSG;
    $id = $this->send_mms($phone, $msg);
    log_message('debug', "[send smsmms] send_class_wait, id[$id] phone[$phone] msg[$msg]");
    return $id;
  }
  
  function send_class_cancel($phone, $username, $title, $date)
  {
    if ($phone == null || $phone == '') {
      return 0;
    }
    $msg = <<<MSG
[파운디] 클래스 예약취소 안내

{$username}님,
<{$title}> 클래스({$date})가 예약취소 되었습니다!
궁금한 점은 파운디를 통해서 센터에 문의바랍니다!
MSG;
    $id = $this->send_mms($phone, $msg);
    log_message('debug', "[send smsmms] send_class_reserve, id[$id] phone[$phone] msg[$msg]");
    return $id;
  }
  
}
