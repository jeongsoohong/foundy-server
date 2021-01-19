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
  
  function send_atalk($phone, $msg, $subject, $template_code, $replace_type = 'N')
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
      'TRAN_REPLACE_TYPE' => $replace_type, //'S' : SMS 전환전송 'L' : LMS 전환전송 'N' : 전환전송 하지않음
      'TRAN_REPLACE_MSG' => $msg,
    );
    $this->db->set('TRAN_DATE', 'NOW()', false);
    $this->db->insert('MTS_ATALK_MSG', $ins);
    
    return $this->db->insert_id();
  }
  function send_atalk2($phone, $msg, $subject, $template_code, $button, $replace_type = 'N')
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
      'TRAN_REPLACE_TYPE' => $replace_type, // 'S' : SMS 전환전송 'L' : LMS 전환전송 'N' : 전환전송 하지않음
      'TRAN_REPLACE_MSG' => $msg,
      'TRAN_BUTTON' => $button, // json
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
    
    return $this->send_sms($phone, $msg);
  }
  
  function send_user_passwd($phone, $email, $passwd)
  {
    if ($phone == null || $phone == '') {
      return 0;
    }
    
    $msg = "[파운디] <{$email}>님의 비밀번호가 [{$passwd}]으로 초기화되었습니다.";
    
    return $this->send_sms($phone, $msg);
  }
  
  function get_ampm($time)
  {
    return ($time < '12:00:00' ? 'AM' : 'PM');
  }
  
  function get_time($time)
  {
    return ($time <= '12:00:00' ? substr($time, 0, 5) : substr(date('H:i:s', strtotime($time) - 12 * ONE_HOUR), 0, 5));
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

    $center_title = "<{$center_title}>";
    $schedule_title = "\"{$schedule_title}\"";
    $date = date('Y.m.d', strtotime($date));
    $time = $this->get_ampm($start_time).' '.$this->get_time($start_time);
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
  
    $subject = '수업예약내역';
    $template_code = 'FOUNDY_reservation';
    $replace_type = 'L'; // 'S' : SMS 전환전송 'L' : LMS 전환전송 'N' : 전환전송 하지않음
    return $this->send_atalk($phone, $msg, $subject, $template_code, $replace_type);
  }
  
  function send_class_reserve_by_center($phone, $type, $schedule_title, $date, $center_title, $start_time, $end_time)
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
    $center_title = "<{$center_title}>";
    $schedule_title = "\"{$schedule_title}\"";
    $date = date('Y.m.d', strtotime($date));
    $time = $this->get_ampm($start_time).' '.$this->get_time($start_time).' ~ '.$this->get_ampm($end_time).' '.$this->get_time($end_time);
    $msg = <<<MSG
[FOUNDY #{예약현황}]
수업정보 변동으로 인하여 클래스 예약이 #{예약현황} 되었습니다.

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
  
    $subject = '수업정보 변동 (예약상태 변경)';
    $template_code = 'FOUNDY_reservation02';
    $replace_type = 'L'; // 'S' : SMS 전환전송 'L' : LMS 전환전송 'N' : 전환전송 하지않음
    return $this->send_atalk($phone, $msg, $subject, $template_code, $replace_type);
  }
  
  function send_class_reminder($phone, $schedule_title, $date, $center_title, $start_time, $end_time)
  {
    if ($phone == null || $phone == '') {
      return 0;
    }
    $center_title = "<{$center_title}>";
    $schedule_title = "\"{$schedule_title}\"";
    $date = date('Y.m.d', strtotime($date));
    $time = $this->get_ampm($start_time).' '.$this->get_time($start_time);
    $msg = <<<MSG
[FOUNDY 예약알림]

예약하신 #{센터명} #{수업명} 수업은 #{일시} #{시간} 시작입니다!
수업 시작 전에 여유있게 입장하셔서 시작 준비운동부터 안전한 수업 즐기시길 바랍니다 :)

*예약취소 가능시간은 센터마다 상이하며, 시스템상 취소가 불가한 시간에 취소를 원하실 경우, 예약하신 센터에 문의를 부탁드립니다!
MSG;
    $msg = str_replace('#{센터명}', $center_title, $msg);
    $msg = str_replace('#{수업명}', $schedule_title, $msg);
    $msg = str_replace('#{일시}', $date, $msg);
    $msg = str_replace('#{시간}', $time, $msg);
  
    $subject = '예약알림/리마인드톡';
    $template_code = 'FOUNDY_reminder_talk';
    $replace_type = 'L'; // 'S' : SMS 전환전송 'L' : LMS 전환전송 'N' : 전환전송 하지않음
    return $this->send_atalk($phone, $msg, $subject, $template_code, $replace_type);
  }
  
  function send_class_update($phone, $center_title)
  {
    if ($phone == null || $phone == '') {
      return 0;
    }
    $center_title = "<{$center_title}>";
    $msg = <<<MSG
[FOUNDY 클래스 업데이트]

안녕하세요, 회원님이 소식 받아보기 신청하신 #{센터명} 스케줄이 업데이트 되었습니다.
지금 파운디에서 확인해 주세요!

건강한 라이프 스타일 가이드, 파운디
MSG;
    $msg = str_replace('#{센터명}', $center_title, $msg);
  
    $subject = '센터 스케줄 업데이트 알림';
    $template_code = 'FOUNDY_class_update';
    $replace_type = 'L'; // 'S' : SMS 전환전송 'L' : LMS 전환전송 'N' : 전환전송 하지않음
    return $this->send_atalk($phone, $msg, $subject, $template_code, $replace_type);
  }
  
  function send_shop_order($phone, $purchase_status, $purchase_code, $purchase_title, $purchase_date, $url)
  {
    if ($phone == null || $phone == '') {
      return 0;
    }
    $msg = <<<MSG
[FOUNDY #{구매상태}]
주문하신 #{상품명}의 세부 주문상태는
아래 버튼을 클릭하여 확인해주세요!

-주문일자 : #{주문일자}
-주문번호 : #{주문번호}
-상품명 : #{제품명}
MSG;
    $msg = str_replace('#{구매상태}', $this->crud_model->get_shipping_status_str($purchase_status), $msg);
    $msg = str_replace('#{주문일자}', date('Y.m.d', strtotime($purchase_date)), $msg);
    $msg = str_replace('#{주문번호}', $purchase_code, $msg);
    $msg = str_replace('#{상품명}', '상품', $msg);
    $msg = str_replace('#{제품명}', $purchase_title, $msg);
    
    $button = new stdClass();
    $button->name = '구매내역 조회하기';
    $button->type = 'AL'; // APP LINK
    if (DEV_SERVER) {
      $button->scheme_ios = "foundy-dev://web?url={$url}";
      $button->scheme_android = "foundy-dev://web?url={$url}";
      $button->url_pc = $url;
      $button->url_mobile = $url;
    } else {
      $button->scheme_ios = "foundy://web?url={$url}";
      $button->scheme_android = "foundy-dev://web?url={$url}";
      $button->url_pc = $url;
      $button->url_mobile = $url;
    }
  
    $subject = '구매내역조회 메세지';
    $template_code = 'FOUNDY_order01';
    $replace_type = 'L'; // 'S' : SMS 전환전송 'L' : LMS 전환전송 'N' : 전환전송 하지않음
    return $this->send_atalk2($phone, $msg, $subject, $template_code, json_encode($button), $replace_type);
  }
  
  function send_shop_shipping($phone, $shipping_status, $purchase_code, $purchase_title, $shipping_company, $shipping_code)
  {
    if ($phone == null || $phone == '') {
      return 0;
    }
    $msg = <<<MSG
[FOUNDY #{배송상태}]
주문하신 상품이 #{배송상태} 되었습니다.
#{추가메세지}

-주문번호 : #{주문번호}
-상품명 : #{제품명}
-택배사 : #{택배사}
-송장번호 : #{송장번호}
MSG;
    $msg = str_replace('#{배송상태}', $this->crud_model->get_shipping_status_str($shipping_status), $msg);
    $msg = str_replace('#{주문번호}', $purchase_code, $msg);
    $msg = str_replace('#{추가메세지}', '', $msg);
    $msg = str_replace('#{제품명}', $purchase_title, $msg);
    $msg = str_replace('#{택배사}', $shipping_company, $msg);
    $msg = str_replace('#{송장번호}', $shipping_code, $msg);
  
    $button = new stdClass();
    $button->name = '송장조회';
    $button->type = 'DS'; // 배송조회
  
    $subject = '배송상태 메세지';
    $template_code = 'FOUNDY_shipping01';
    $replace_type = 'L'; // 'S' : SMS 전환전송 'L' : LMS 전환전송 'N' : 전환전송 하지않음
    return $this->send_atalk2($phone, $msg, $subject, $template_code, json_encode($button), $replace_type);
  }
  
  function send_user_register($phone)
  {
    if ($phone == null || $phone == '') {
      return 0;
    }
    $msg = <<<MSG
Welcome, FOUNDY!
파운디의 회원가입이 완료 되었습니다.
MSG;
    
    $subject = '회원가입';
    $template_code = 'FOUNDY_welcome1';
    $replace_type = 'S'; // 'S' : SMS 전환전송 'L' : LMS 전환전송 'N' : 전환전송 하지않음
    return $this->send_atalk($phone, $msg, $subject, $template_code, $replace_type);
  }
  
  function send_user_coupon($phone, $user_name, $coupon_name, $expiration_date)
  {
    if ($phone == null || $phone == '') {
      return 0;
    }
//    $expiration_date = date('Y.m.d', strtotime($expiration_date));
    $msg = <<<MSG
#{고객명} 고객님께 #{쿠폰명} 쿠폰이 지금 발급되었습니다!

-쿠폰명 : #{쿠폰명}
-쿠폰 유효기간 : #{유효기간}
www.foundy.me
MSG;
    $msg = str_replace('#{고객명}', $user_name, $msg);
    $msg = str_replace('#{쿠폰명}', '<'.$coupon_name.'>', $msg);
    $msg = str_replace('#{유효기간}', $expiration_date, $msg);
    
    $subject = 'FOUNDY_promotion1';
    $template_code = 'FOUNDY_promotion1';
    $replace_type = 'L'; // 'S' : SMS 전환전송 'L' : LMS 전환전송 'N' : 전환전송 하지않음
    return $this->send_atalk($phone, $msg, $subject, $template_code, $replace_type);
  }
}
