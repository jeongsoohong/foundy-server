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
    
//    log_message('debug', '[studio] send_atalk2 ins['.json_encode($ins).']');
    
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
    $msg = str_replace('#{구매상태}', $this->shop_model->get_shipping_status_str($purchase_status), $msg);
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
      $button->scheme_android = "foundy://web?url={$url}";
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
    $msg = str_replace('#{배송상태}', $this->shop_model->get_shipping_status_str($shipping_status), $msg);
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
  
  function send_center_approval($phone)
  {
    if ($phone == null || $phone == '') {
      return 0;
    }
    $msg = <<<MSG
[FOUNDY 센터회원 승인]
파운디 센터회원 신청의 승인이 완료 되었습니다.

#{상세메세지}

어드민 URL : www.foundy.me/center

**회원가입 당시 ID/PW와 동일하며, 일반 로그인이 아닌 카카오톡 로그인, 애플로그인 등을 사용하여 비밀번호를 설정하지 않으신 경우, 파운디 > MY PAGE 에서 비밀번호 설정을 해주시기 바랍니다.
**프로그램 사용에 어려움이 있으시면, 카카오톡 ‘파운디’로 문의 주세요!
MSG;
    
    $detail_msg = <<<MSG
지금 어드민에 접속하셔서, 전자 시간표와 센터 소식 등 더 많은 정보를 등록해 주세요.
MSG;

    $msg = str_replace('#{상세메세지}', $detail_msg, $msg);
  
    $button = new stdClass();
    $button->name = '카톡으로 문의하기';
    $button->type = 'WL'; // WEB LINK
    $button->url_pc = 'http://pf.kakao.com/_xnzxbxaxb';
    $button->url_mobile = 'http://pf.kakao.com/_xnzxbxaxb';

    $subject = '파운디 센터승인';
    $template_code = 'FOUNDY_Approve01';
    $replace_type = 'L'; // 'S' : SMS 전환전송 'L' : LMS 전환전송 'N' : 전환전송 하지않음
    return $this->send_atalk2($phone, $msg, $subject, $template_code, json_encode($button), $replace_type);
  }
  
  function send_teacher_approval($phone)
  {
    if ($phone == null || $phone == '') {
      return 0;
    }
    $msg = <<<MSG
[FOUNDY 강사회원 승인]
파운디 센터회원 신청의 승인이 완료 되었습니다.

#{상세메시지}

어드민 URL : www.foundy.me/studio

-온라인 클래스 전자 시간표, 예약 및 알림톡 서비스를 이용 하시려면, 강사 어드민 우측 상단의 ‘온라인 스튜디오 신청’을 클릭해 주세요.
-회원가입 당시 ID/PW와 동일하며, 일반 로그인이 아닌 카카오톡 로그인, 애플로그인 등을 사용하여 비밀번호를 설정하지 않으신 경우, 파운디 > MY PAGE 에서 비밀번호 설정을 해주시기 바랍니다.
-프로그램 사용에 어려움이 있으시면, 카카오톡 ‘파운디’로 문의 주세요!
MSG;
    
    $detail_msg = <<<MSG
지금 어드민에 접속하셔서, 선생님의 유투브 온라인 수업을 나누어 주세요!
MSG;
    
    $msg = str_replace('#{상세메시지}', $detail_msg, $msg);
  
    $button1 = new stdClass();
    $button1->name = '온라인 스튜디오 신청';
    $button1->type = 'AL'; // APP LINK
    $url = base_url().'home/user/studio';
    if (DEV_SERVER) {
      $button1->scheme_ios = "foundy-dev://web?url={$url}";
      $button1->scheme_android = "foundy-dev://web?url={$url}";
      $button1->url_pc = $url;
      $button1->url_mobile = $url;
    } else {
      $button1->scheme_ios = "foundy://web?url={$url}";
      $button1->scheme_android = "foundy://web?url={$url}";
      $button1->url_pc = $url;
      $button1->url_mobile = $url;
    }
  
    $button2 = new stdClass();
    $button2->name = '카톡으로 문의하기';
    $button2->type = 'WL'; // WEB LINK
    $button2->url_pc = 'http://pf.kakao.com/_xnzxbxaxb';
    $button2->url_mobile = 'http://pf.kakao.com/_xnzxbxaxb';
 
    $button = json_encode($button1).','.json_encode($button2);
  
    $subject = '파운디 강사승인';
    $template_code = 'FOUNDY_Approve02';
    $replace_type = 'L'; // 'S' : SMS 전환전송 'L' : LMS 전환전송 'N' : 전환전송 하지않음
    return $this->send_atalk2($phone, $msg, $subject, $template_code, $button, $replace_type);
  }
  
  function send_studio_approval($phone)
  {
    if ($phone == null || $phone == '') {
      return 0;
    }
    $msg = <<<MSG
[FOUNDY 온라인 스튜디오 승인]
선생님의 온라인 스튜디오 신청의 승인이 완료 되었습니다.

#{상세메시지}

어드민 URL : www.foundy.me/studio

-프로그램 사용에 어려움이 있으시면, 카카오톡 ‘파운디’로 문의 주세요!
MSG;
    
    $detail_msg = <<<MSG
지금 어드민에 접속하셔서, 선생님의 줌 클래스 시간표를 등록하시고 파운디에 수업을 소개해 주세요!
MSG;
    
    $msg = str_replace('#{상세메시지}', $detail_msg, $msg);
  
    $button = new stdClass();
    $button->name = '카톡으로 문의하기';
    $button->type = 'WL'; // WEB LINK
    $button->url_pc = 'http://pf.kakao.com/_xnzxbxaxb';
    $button->url_mobile = 'http://pf.kakao.com/_xnzxbxaxb';
  
    $subject = '온라인스튜디오 승인';
    $template_code = 'FOUNDY_Approve03';
    $replace_type = 'L'; // 'S' : SMS 전환전송 'L' : LMS 전환전송 'N' : 전환전송 하지않음
    return $this->send_atalk2($phone, $msg, $subject, $template_code, json_encode($button), $replace_type);
  }

  function send_reject_approval($phone, $user_type)
  {
    if ($phone == null || $phone == '') {
      return 0;
    }
    $msg = <<<MSG
[FOUNDY #{센터/강사/온라인 스튜디오} 반려]
파운디 #{센터회원/강사회원/온라인 스튜디오}신청이 반려 되었습니다.

#{상세메세지}

기타 문의사항은 카카오톡 ‘파운디로 문의 주세요!
MSG;
    
    if ($user_type == USER_TYPE_CENTER) {
      $type1 = '센터';
      $type2 = '센터회원';
      $detail_msg = <<<MSG
정확한 상호와 연락처, 주소 등을 입력하셨는지 확인 부탁드립니다.
MSG;
    } else if ($user_type == USER_TYPE_TEACHER) {
      $type1 = '강사';
      $type2 = '강사회원';
      $detail_msg = <<<MSG
추가 증빙자료(강사 자격증)가 있으시면 카카오톡 ‘파운디’로 전달 주세요!
MSG;
    } else if ($user_type == USER_TYPE_STUDIO) {
      $type1 = '온라인 스튜디오';
      $type2 = '온라인 스튜디오';
      $detail_msg = <<<MSG
진행중이신 수업에 대한 추가 증빙자료가 있으시면 카카오톡 ‘파운디’로 전달 주세요!
MSG;
    } else {
      return 0;
    }
  
    $msg = str_replace('#{센터/강사/온라인 스튜디오}', $type1, $msg);
    $msg = str_replace('#{센터회원/강사회원/온라인 스튜디오}', $type2, $msg);
    $msg = str_replace('#{상세메세지}', $detail_msg, $msg);
    
    $subject = '센터/강사/온라인 반려';
    $template_code = 'FOUNDY_Reject01';
    $replace_type = 'L'; // 'S' : SMS 전환전송 'L' : LMS 전환전송 'N' : 전환전송 하지않음
    return $this->send_atalk($phone, $msg, $subject, $template_code, $replace_type);
  }
  
  function send_studio_class_confirm($phone, $schedule_title, $date, $start_time)
  {
    if ($phone == null || $phone == '') {
      return 0;
    }
    $schedule_title = "\"{$schedule_title}\"";
    $date = date('Y.m.d', strtotime($date));
    $time = $this->get_ampm($start_time).' '.$this->get_time($start_time);
    $msg = <<<MSG
[온라인클래스 티켓팅 확인 요청]
#{날짜} #{시간} #{수업명} 수업에 새로운 신청자가 있습니다.
신청자의 결제가 확인 되셨다면 예약 확정 버튼을 눌러주세요!
MSG;
    $msg = str_replace('#{수업명}', $schedule_title, $msg);
    $msg = str_replace('#{날짜}', $date, $msg);
    $msg = str_replace('#{시간}', $time, $msg);
  
    $button = new stdClass();
    $button->name = '어드민 바로가기';
    $button->type = 'WL'; // WEB LINK
    $button->url_pc = base_url().'studio';
    $button->url_mobile = base_url().'studio';
  
    $subject = '온라인 스튜디오 예약확인 요청';
    $template_code = 'FOUNDY_studio_confirm';
    $replace_type = 'L'; // 'S' : SMS 전환전송 'L' : LMS 전환전송 'N' : 전환전송 하지않음
    return $this->send_atalk2($phone, $msg, $subject, $template_code, json_encode($button), $replace_type);
  }
  
  function send_studio_class_cancel($phone, $teacher_name, $schedule_title, $date, $start_time)
  {
    if ($phone == null || $phone == '') {
      return 0;
    }
   
    $teacher_name = "[$teacher_name]";
    $schedule_title = "\"{$schedule_title}\"";
    $date = date('Y.m.d', strtotime($date));
    $time = $this->get_ampm($start_time).' '.$this->get_time($start_time);
  
    $msg = <<<MSG
[FOUNDY Online class Ticketing]
신청하신 온라인 클래스의 티켓팅이 취소 되었습니다.

-예약내역 : #{강사명} #{수업명}
-예약일자 : #{예약일자} #{시간}

*입금 혹은 결제 시간이 초과되어 취소가 된 경우, 재신청은 파운디에서 부탁 드립니다.
*입금 혹은 결제가 완료된 상태에서 강사의 고지 없이 취소된 경우, 파운디로 문의 주시기 바랍니다.
MSG;
    
    $msg = str_replace('#{강사명}', $teacher_name, $msg);
    $msg = str_replace('#{수업명}', $schedule_title, $msg);
    $msg = str_replace('#{예약일자}', $date, $msg);
    $msg = str_replace('#{시간}', $time, $msg);
  
    $button = new stdClass();
    $button->name = '파운디 고객센터';
    $button->type = 'WL'; // WEB LINK
    $button->url_pc = 'http://pf.kakao.com/_xnzxbxaxb/chat';
    $button->url_mobile = 'http://pf.kakao.com/_xnzxbxaxb/chat';
  
    $subject = '예약 취소';
    $template_code = 'FOUNDY_Onlinecancel';
    $replace_type = 'L'; // 'S' : SMS 전환전송 'L' : LMS 전환전송 'N' : 전환전송 하지않음
    return $this->send_atalk2($phone, $msg, $subject, $template_code, json_encode($button), $replace_type);
  }
  
  function send_studio_class_wait_bank($phone, $teacher_name, $schedule_title, $date, $start_time, $class_price,
                                       $bank_name, $bank_account_number, $bank_depositor, $reserve_popup, $studio_email,
                                       $teacher_id, $schedule_date, $schedule_info_id)
  {
    if ($phone == null || $phone == '') {
      return 0;
    }
  
    $teacher_name = "[{$teacher_name}]";
    $schedule_title = "\"{$schedule_title}\"";
    $date = date('Y.m.d', strtotime($date));
    $time = $this->get_ampm($start_time).' '.$this->get_time($start_time);
    $class_price = $this->crud_model->get_price_str($class_price).'원';
//    $bank_account = '<'.$bank_name.'은행 '.$bank_account_number.' '.$bank_depositor.'>';
    
    $msg = <<<MSG
[FOUNDY Online class Ticketing]
신청해주신 온라인 줌 클래스의 내역입니다. 온라인 클래스는 입금 확인 후 티켓팅 확정 됩니다.

-예약내역 : #{강사명} #{수업명}
-예약일자 : #{예약일자} #{시간}
-수업료 : #{수업료}
-입금계좌 : #{은행} #{계좌번호} #{예금주}

*티켓팅 관련 주의사항
#{상세문구}

-수업료 입금 후 티켓팅 취소는 불가합니다.
-티켓팅 신청 후 일정 시간 수업료 입금이 되지 않을 경우 자동 취소될 수 있습니다.
-입금자 확인 후 티켓팅 확정과 함께 수업 링크가 알림톡으로 발송됩니다.
-불가피한 사유로 취소를 원하실 경우나 입금자명 변동이 있을 경우 아래 선생님의 이메일 주소로 직접 문의 주세요!
#{강사이메일}
MSG;
  
    $msg = str_replace('#{강사명}', $teacher_name, $msg);
    $msg = str_replace('#{수업명}', $schedule_title, $msg);
    $msg = str_replace('#{예약일자}', $date, $msg);
    $msg = str_replace('#{시간}', $time, $msg);
    $msg = str_replace('#{수업료}', $class_price, $msg);
    $msg = str_replace('#{은행}', '<'.$bank_name.'은행>', $msg);
    $msg = str_replace('#{계좌번호}', $bank_account_number, $msg);
    $msg = str_replace('#{예금주}', $bank_depositor, $msg);
    $msg = str_replace('#{상세문구}', $reserve_popup, $msg);
    $msg = str_replace('#{강사이메일}', $studio_email, $msg);
  
    $button = new stdClass();
    $button->name = '신청내역 확인하기';
    $button->type = 'AL'; // APP LINK
    $url = base_url().'home/teacher/profile/'.$teacher_id.'?nav=schedule&sdate='.
      date('Y-m-d', strtotime($schedule_date)).'&popid='.$schedule_info_id;
    if (DEV_SERVER) {
      $button->scheme_ios = "foundy-dev://web?url={$url}";
      $button->scheme_android = "foundy-dev://web?url={$url}";
      $button->url_pc = $url;
      $button->url_mobile = $url;
    } else {
      $button->scheme_ios = "foundy://web?url={$url}";
      $button->scheme_android = "foundy://web?url={$url}";
      $button->url_pc = $url;
      $button->url_mobile = $url;
    }
    
    $subject = '온라인 클래스 입금요청01';
    $template_code = 'FOUNDY_confirm02';
    $replace_type = 'L'; // 'S' : SMS 전환전송 'L' : LMS 전환전송 'N' : 전환전송 하지않음
    return $this->send_atalk2($phone, $msg, $subject, $template_code, json_encode($button), $replace_type);
  }
  
  function send_studio_class_wait_page($phone, $teacher_name, $schedule_title, $schedule_date, $start_time,
                                       $payment_page, $reserve_popup, $studio_email, $teacher_id, $schedule_info_id)
  {
    if ($phone == null || $phone == '') {
      return 0;
    }
   
    $teacher_name = "[{$teacher_name}]";
    $schedule_title = "\"{$schedule_title}\"";
    $date = date('Y.m.d', strtotime($schedule_date));
    $time = $this->get_ampm($start_time).' '.$this->get_time($start_time);
    
    $msg = <<<MSG
[FOUNDY Online class Ticketing]
신청해주신 온라인 줌 클래스의 내역입니다. 온라인 클래스는 입금 확인 후 티켓팅 확정 됩니다.

-예약내역 : #{강사명} #{수업명}
-예약일자 : #{예약일자} #{시간}
-결제 바로가기 : #{링크}

*티켓팅 관련 주의사항
#{상세문구}

-수업료 입금 후 티켓팅 취소는 불가합니다.
-티켓팅 신청 후 일정 시간 수업료 입금이 되지 않을 경우 자동 취소될 수 있습니다.
-입금자 확인 후 티켓팅 확정과 함께 수업 링크가 알림톡으로 발송됩니다.
-불가피한 사유로 취소를 원하실 경우나 입금자명 변동이 있을 경우 아래 선생님의 이메일 주소로 직접 문의 주세요!
#{강사이메일}
MSG;
    
    $msg = str_replace('#{강사명}', $teacher_name, $msg);
    $msg = str_replace('#{수업명}', $schedule_title, $msg);
    $msg = str_replace('#{예약일자}', $date, $msg);
    $msg = str_replace('#{시간}', $time, $msg);
    $msg = str_replace('#{링크}', $payment_page, $msg);
    $msg = str_replace('#{상세문구}', $reserve_popup, $msg);
    $msg = str_replace('#{강사이메일}', $studio_email, $msg);
  
    $button = new stdClass();
    $button->name = '신청내역 확인하기';
    $button->type = 'AL'; // APP LINK
    $url = base_url().'home/teacher/profile/'.$teacher_id.'?nav=schedule&sdate='.
      date('Y-m-d', strtotime($schedule_date)).'&popid='.$schedule_info_id;
    if (DEV_SERVER) {
      $button->scheme_ios = "foundy-dev://web?url={$url}";
      $button->scheme_android = "foundy-dev://web?url={$url}";
      $button->url_pc = $url;
      $button->url_mobile = $url;
    } else {
      $button->scheme_ios = "foundy://web?url={$url}";
      $button->scheme_android = "foundy://web?url={$url}";
      $button->url_pc = $url;
      $button->url_mobile = $url;
    }
    
//    log_message('debug', '[studio] url['.$url.'] date['.$date.']');
  
    $subject = '온라인 클래스 입금요청02';
    $template_code = 'FOUNDY_confirm03';
    $replace_type = 'L'; // 'S' : SMS 전환전송 'L' : LMS 전환전송 'N' : 전환전송 하지않음
    return $this->send_atalk2($phone, $msg, $subject, $template_code, json_encode($button), $replace_type);
  }
  
  function send_studio_class_reserve_notlink($phone, $teacher_name, $schedule_title, $date, $start_time)
  {
    if ($phone == null || $phone == '') {
      return 0;
    }
   
    $teacher_name = "[{$teacher_name}]";
    $schedule_title = "\"{$schedule_title}\"";
    $date = date('Y.m.d', strtotime($date));
    $time = $this->get_ampm($start_time).' '.$this->get_time($start_time);
    
    $msg = <<<MSG
[FOUNDY Online class Ticketing]
신청하신 온라인 클래스 티켓팅이 확정 되었습니다!

-예약내역 : #{강사명} #{수업명}
-예약일자 : #{예약일자} #{시간}

수업 링크가 개설되면 알림톡이 발송됩니다. 잠시만 기다려 주세요!
링크 생성 후, 파운디에서도 확인 가능하며, 바로 온라인 클래스로 이동하실 수 있어요.
MSG;
    
    $msg = str_replace('#{강사명}', $teacher_name, $msg);
    $msg = str_replace('#{수업명}', $schedule_title, $msg);
    $msg = str_replace('#{예약일자}', $date, $msg);
    $msg = str_replace('#{시간}', $time, $msg);
    
    $subject = '티켓팅 확정(수업링크 생성 전)';
    $template_code = 'FOUNDY_Onlinereservation03';
    $replace_type = 'L'; // 'S' : SMS 전환전송 'L' : LMS 전환전송 'N' : 전환전송 하지않음
    return $this->send_atalk($phone, $msg, $subject, $template_code, $replace_type);
  }
  
  function send_studio_class_reserve_link($phone, $teacher_name, $schedule_title, $date, $start_time, $link,
                                          $id, $pw, $studio_email, $class_info)
  {
    if ($phone == null || $phone == '') {
      return 0;
    }
  
    $teacher_name = "[{$teacher_name}]";
    $schedule_title = "\"{$schedule_title}\"";
    $date = date('Y.m.d', strtotime($date));
    $time = $this->get_ampm($start_time).' '.$this->get_time($start_time);
    
    $msg = <<<MSG
[FOUNDY Online class Ticketing]
신청하신 온라인 클래스 티켓팅이 확정 되었습니다!

-예약내역 : #{강사명} #{수업명}
-예약일자 : #{예약일자} #{시간}
-수업링크 : #{링크}
-회의ID : #{id}
-비밀번호 : #{pw}

-수업 전 기기의 스피커가 정상 작동하는지 확인해 주세요.
-입장 후 비디오는 ON, 마이크는 OFF 해주세요.
-불가피한 사유로 취소를 원하실 경우나 입금자명 변동이 있을 경우 아래 선생님의 이메일 주소로 직접 문의 주세요!
#{강사이메일}
MSG;
    
    $msg = str_replace('#{강사명}', $teacher_name, $msg);
    $msg = str_replace('#{수업명}', $schedule_title, $msg);
    $msg = str_replace('#{예약일자}', $date, $msg);
    $msg = str_replace('#{시간}', $time, $msg);
    $msg = str_replace('#{링크}', $link, $msg);
    $msg = str_replace('#{id}', $id, $msg);
    $msg = str_replace('#{pw}', $pw, $msg);
   
    // 수업안내 메세지를 '강사이메일'절과 함께 사용함(카카오 알림톡 템플릿 코드 재등록 방지를 위해)
    if (isset($class_info) == true && empty($class_info) == false) {
      $replace_email = <<<MSG
{$studio_email}

{$class_info}
MSG;
      $msg = str_replace('#{강사이메일}', $replace_email, $msg);
    } else {
      $msg = str_replace('#{강사이메일}', $studio_email, $msg);
    }
    
    $subject = '온라인클래스 티켓팅 확정';
    $template_code = 'FOUNDY_Onlinereservation02';
    $replace_type = 'L'; // 'S' : SMS 전환전송 'L' : LMS 전환전송 'N' : 전환전송 하지않음
    return $this->send_atalk($phone, $msg, $subject, $template_code, $replace_type);
  }
  
  function send_studio_class_wait($user_data, $studio_user_data, $studio_info, $schedule_info)
  {
    if ($schedule_info->use_bank) {
      $this->send_studio_class_wait_bank($user_data->phone, $schedule_info->teacher_name, $schedule_info->schedule_title,
        $schedule_info->schedule_date, $schedule_info->start_time, $schedule_info->class_price, $schedule_info->bank_name,
        $schedule_info->bank_account_number, $schedule_info->bank_depositor, $schedule_info->reserve_popup,
        (isset($studio_info->email) ? $studio_info->email : $studio_user_data->email), $studio_info->teacher_id,
      $schedule_info->schedule_date, $schedule_info->schedule_info_id);
    } else {
      $this->send_studio_class_wait_page($user_data->phone, $schedule_info->teacher_name, $schedule_info->schedule_title,
        $schedule_info->schedule_date, $schedule_info->start_time, $schedule_info->payment_page, $schedule_info->reserve_popup,
        (isset($studio_info->email) ? $studio_info->email : $studio_user_data->email), $studio_info->teacher_id,
        $schedule_info->schedule_info_id);
    }
  }
  
  function send_studio_class_reserve($user_data, $studio_user_data, $studio_info, $schedule_info)
  {
    if (isset($schedule_info->class_link)) {
      $this->send_studio_class_reserve_link($user_data->phone, $schedule_info->teacher_name, $schedule_info->schedule_title,
        $schedule_info->schedule_date, $schedule_info->start_time, $schedule_info->class_link, $schedule_info->class_id, $schedule_info->class_pw,
        (isset($studio_info->email) ? $studio_info->email : $studio_user_data->email), $schedule_info->class_info);
    } else {
      $this->send_studio_class_reserve_notlink($user_data->phone, $schedule_info->teacher_name, $schedule_info->schedule_title,
        $schedule_info->schedule_date, $schedule_info->start_time);
    }
  
  }
  
}
