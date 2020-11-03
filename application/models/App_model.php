<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class App_model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
    
    $this->load->model('Cookie_model');
    $this->load->model('Crud_model');
  }
  
  function get_session_id() {
    return $this->crud_model->get_cookie('ci_session');
  }
  
  function get_mode() {
    return $this->cookie_model->get_cookie('MODE');
  }
  
  function get_device() {
    return $this->cookie_model->get_cookie('DEVICE');
  }
  
  function get_fcm_token()
  {
    return $this->cookie_model->get_cookie('FCM-TOKEN');
  }
  
  function get_push_setting() {
    return $this->cookie_model->get_cookie('PUSH-YN');
  }
  
  function get_gps_setting() {
    return $this->cookie_model->get_cookie('GPS-YN');
  }
  
  function get_app_version() {
    return $this->cookie_model->get_cookie('VERSION');
  }
  
  function get_app_build_number() {
    return $this->cookie_model->get_cookie('BUILDNUMBER');
  }
  
  function is_app()
  {
    return ($this->get_mode() == 'APP');
  }
  
  function is_ios_app()
  {
    return ($this->is_app() & $this->get_device() == 'IOS');
  }
  
  function is_android_app()
  {
    return ($this->is_app() & $this->get_device() == 'ANDROID');
  }
 
  function get_app_data()
  {
//    $data['ci_session'] = $this->get_session_id();
    $data['mode'] = $this->get_mode();
    $data['device'] = $this->get_device();
    $data['fcm_token'] = $this->get_fcm_token();
    $data['push_setting'] = $this->get_push_setting();
    $data['gps_setting'] = $this->get_gps_setting();
    $data['version'] = $this->get_app_version();
    $data['build_number'] = $this->get_app_build_number();
    return $data;
  }
  
  function set_app_data()
  {
    $this->cookie_model->set_cookie('ci_session', $this->crud_model->get_session_id());
    $this->cookie_model->set_cookie('MODE', $this->get_mode());
    $this->cookie_model->set_cookie('DEVICE', $this->get_device());
    $this->cookie_model->set_cookie('FCM-TOKEN', $this->get_fcm_token());
    $this->cookie_model->set_cookie('SET-GPS-PERMISSION', $this->get_gps_setting());
    $this->cookie_model->set_cookie('SET-PUSH-NOTICE', $this->get_push_setting());
    $this->cookie_model->set_cookie('VERSION', $this->get_app_version());
    $this->cookie_model->set_cookie('BUILDNUMBER', $this->get_app_build_number());
  }
  
}
