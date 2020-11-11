<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Push
{
  public function __construct($params = array())
  {
    log_message('debug', "Push Class Initialized");
  }
  
  function send_push_private($session, $title, $body, $url, $app_data)
  {
    if (isset($session) == true && empty($session) == false) {
      $app_data = json_decode($session->userdata('app_data'));
      if ($session->userdata('is_app') == 'yes' && $app_data->push_setting == 'ON') {
        log_message('debug', '[push notification] '.json_encode($app_data));
        send_notification($title, $body, ['url' => $url], $app_data->fcm_token);
        return true;
      }
    } else if (isset($app_data) == true && empty($app_data) == false && $app_data->push_setting == 1) {
      log_message('debug', '[push notification] '.json_encode($app_data));
      send_notification($title, $body, ['url' => $url], $app_data->fcm_token);
      return true;
    }
    log_message('debug', '[push notification] fail!! session : '.json_encode($session));
    log_message('debug', '[push notification] fail!! app_data : '.json_encode($app_data));
    return false;
  }

}
