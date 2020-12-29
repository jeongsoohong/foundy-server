<?php


if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Kakao_model extends CI_Model
{
  
  function __construct()
  {
    parent::__construct();
  }

  function set_user_kakao($user_id, $kakao_id, $allowed_scopes, $access_token, $refresh_token, $expires_in, $refresh_token_expires_in)
  {
    $data = array(
      'kakao_id' => $kakao_id,
      'allowed_scopes' => $allowed_scopes,
      'access_token' => $access_token,
      'refresh_token' => $refresh_token,
      'expires_in' => $expires_in,
      'refresh_token_expires_in' => $refresh_token_expires_in,
    );
    $this->db->set('last_updated_at', 'NOW()', false);
    $this->db->update('user_kakao', $data, array('user_id' => $user_id));
    if ($this->db->affected_rows() == 0) {
      $data['user_id'] = $user_id;
      $this->db->set('create_at', 'NOW()', false);
      $this->db->insert('user_kakao', $data);
    }
  
  }
  
  function is_kakao_user()
  {
    if ($this->session->userdata('user_login') != 'yes') {
      return false;
    }
    if ($this->session->userdata('login_type') != 'kakao') {
      return false;
    }
    return true;
  }
  
  function has_talk_message_agreement($user_kakao)
  {
    $allowed_scopes = explode(' ', $user_kakao->allowed_scopes);
    log_message('debug', '[kakao] allowed_scopes : '.json_encode($allowed_scopes));
    foreach ($allowed_scopes as $scope) {
      if ($scope == 'talk_message') {
        return true;
      }
    }
    return false;
  }
  
  function send_message($access_token)
  {
    $object_type = 'text';
    $text = '로그인해 주셔서 감사합니다.';
    $button_title = '자세히 보기';
    $web_url = base_url().'home';
    $mobile_web_url = base_url().'home';
  
    // 카카오 알림톡 보내기
    $data = 'template_object={"object_type": "'.$object_type.'","text": "'.$text.'","button_title": "'.$button_title.'",
    "link": {"web_url" : "'.$web_url.'","mobile_web_url" : "'.$mobile_web_url.'"}}';

    $api_url= "https://kapi.kakao.com/v2/api/talk/memo/default/send";
    $opts = array(
      CURLOPT_URL => $api_url,
      CURLOPT_SSL_VERIFYPEER => false,
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => $data,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HTTPHEADER => array('Content-Type: application/x-www-form-urlencoded', "Authorization: Bearer " . $access_token )
    );

    $ch = curl_init();
    curl_setopt_array($ch, $opts);
    $res = curl_exec($ch);
    curl_close($ch);

    log_message('debug', '[kakao 알림톡] req : '.json_encode($opts).', res : '.$res);
  
    $res = json_decode($res);
//    if (isset($res) && isset($res->code) && $res->code == -402) {
//      $url = 'https://kauth.kakao.com//oauth/authorize';
//      $params = array(
//        'client_id' => APIKEY_KAKAO_JAVASCRIPT,
//        'redirect_uri' => base_url()."home/login/kakao/rest",
//        'response_type' => 'code',
//        'scope' => 'talk_message',
//        'auth_type' => 'reauthenticate',
//      );
//      $url = $url.'?'.http_build_query($params, '', '&');
//      $ch = curl_init();
//      curl_setopt($ch, CURLOPT_URL, $url);
//      curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
//      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
//      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//      $response = curl_exec($ch);
//      curl_close($ch);
//
//      log_message('debug', '[kakao agree] get : '.$url.', res : '.$response);
//    }
  
    return $res;
  }
}
