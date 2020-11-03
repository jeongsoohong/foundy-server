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
    if (isset($session) && empty($session) == false) {
      $app_data = json_decode($session->userdata('app_data'));
      if ($session->userdata('is_app') == 'yes' && $app_data->push_setting == 'ON') {
//          log_message('debug', '[push notification] '.json_encode($this->app_model->get_app_data()));
        send_notification($title, $body, ['url' => $url], $app_data->fcm_token);
        return true;
      }
    } else if (isset($app_data) && empty($app_data) && $app_data->push_setting == 'ON') {
      send_notification($title, $body, ['url' => $url], $app_data->fcm_token);
      return true;
    }
    return false;
  }

}
