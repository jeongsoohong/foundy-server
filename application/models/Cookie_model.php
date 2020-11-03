<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Cookie_model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }
  
  function set_cookie($name, $value, $day = false)
  {
    $day = is_numeric($day) && $day > 0 ? (int)$day : 60;
    
    $cookie = array();
    $cookie['name'] = $name;
    $cookie['value'] = $value;
    $cookie['expire'] = $day * 86400;
    $cookie['path'] = '/';
    
    $this->input->set_cookie($cookie);
  }
  
  function get_cookie($name)
  {
    return get_cookie($name);
  }
  
  function delete_cookie($name)
  {
    $cookie = array();
    $cookie['name'] = $name;
    $cookie['value'] = '';
    $cookie['expire'] = '';
    $cookie['path'] = '/';
    
    //$this->input->set_cookie($cookie);
    setcookie($name, "", time() - 86400, '/');
  }
  
}
