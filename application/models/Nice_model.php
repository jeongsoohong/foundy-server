<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Nice_model extends CI_Model
{
  function __construct() {
    parent::__construct();
  }
  
  function get_sitecode() {
    return 'BT250';
  }
  
  function get_sitepw() {
    return 'c7Y6ZcOF0CJ1';
  }
  
  function get_reqseq() {
    return 'REQ_0123456789';
  }
  
  function get_module() {
    return 'CPClient_32bit';
  }
  
  function get_module_path() {
    return '/web/public_html/template/nice/modules/'.$this->get_module();
  }
  
  function get_return_url($domain) {
    return base_url().$domain.'/nice/done';
  }
  function get_error_url($domain) {
    return base_url().$domain.'/nice/fail';
  }
  
  //********************************************************************************************
  //해당 함수에서 에러 발생 시 $len => (int)$len 로 수정 후 사용하시기 바랍니다. (하기소스 참고)
  //********************************************************************************************
  
  function get_value_from_plain_data($str, $name) {
    $pos1 = 0;  //length의 시작 위치
    $pos2 = 0;  //:의 위치
  
    while( $pos1 <= strlen($str) )
    {
      $pos2 = strpos( $str , ":" , $pos1);
      $len = substr($str , $pos1 , $pos2 - $pos1);
      $key = substr($str , $pos2 + 1 , (int)$len);
      $pos1 = $pos2 + (int)$len + 1;
      if( $key == $name )
      {
        $pos2 = strpos( $str , ":" , $pos1);
        $len = substr($str , $pos1 , $pos2 - $pos1);
        $value = substr($str , $pos2 + 1 , (int)$len);
        return $value;
      }
      else
      {
        // 다르면 스킵한다.
        $pos2 = strpos( $str , ":" , $pos1);
        $len = substr($str , $pos1 , $pos2 - $pos1);
        $pos1 = $pos2 + (int)$len + 1;
      }
    }
  }
}
