<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Notice_model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }
  
  function get_notice_type_str($notice_type)
  {
    switch ($notice_type)
    {
      case SERVER_NOTICE_TYPE_COUPON: return '쿠폰알림';
    }
    return '';
  }
  function get_notice_status_str($status)
  {
    switch ($status)
    {
      case SERVER_NOTICE_STATUS_REGISTER: return '알림등록';
      case SERVER_NOTICE_STATUS_COMPLETE: return '알림완료';
      case SERVER_NOTICE_STATUS_FAIL: return '알림실패';
    }
    return '';
  }
  
  /*
create table foit.server_notice(
notice_id int not null primary key auto_increment,
notice_type tinyint not null,
notice_type_str varchar(16),
target_id int not null,
target_title varchar(128),
status tinyint not null,
status_str varchar(16) not null,
log_count int not null,
register_at timestamp not null default current_timestamp,
notice_at timestamp not null default current_timestamp,
unique key (notice_type,target_id),
key (notice_type,status)
);
   */
  function register($notice_type, $target_id, $target_title)
  {
    $data = array(
      'notice_type' => $notice_type,
      'notice_type_str' => $this->get_notice_type_str($notice_type),
      'target_id' => $target_id,
      'target_title' => $target_title,
      'status' => SERVER_NOTICE_STATUS_REGISTER,
      'status_str' => $this->get_notice_status_str(SERVER_NOTICE_STATUS_REGISTER),
      'log_count' => 0,
    );
    $this->db->set('register_at', 'NOW()', false);
    $this->db->set('notice_at', 'NOW()', false);
    $this->db->insert('server_notice', $data);
    
    return $this->db->insert_id();
  }
  
  function update($notice_id, $status, $log_count)
  {
    $data = array(
      'status' => $status,
      'status_str' => $this->get_notice_status_str($status),
      'log_count' => $log_count,
    );
    $this->db->set('notice_at', 'NOW()', false);
    $where = array('notice_id' => $notice_id);
    $this->db->update('server_notice', $data, $where);
    return $this->db->affected_rows();
  }
  
  function get($notice_type, $status)
  {
    $this->db->order_by('register_at', 'asc');
    return $this->db->get_where('server_notice', array('notice_type' => $notice_type, 'status' => $status))->result();
  }
  
  /*
create table foit.server_notice_log(
log_id int not null primary key auto_increment,
notice_id int not null null,
notice_type tinyint not null,
notice_type_str varchar(16),
target_id int not null,
target_title varchar(128),
user_id int not null,
log_at timestamp not null default current_timestamp,
key (notice_type,target_id),
key (user_id)
);
   */
  function log($notice_data, $user_id)
  {
    $data = array(
      'notice_id' => $notice_data->notice_id,
      'notice_type' => $notice_data->notice_type,
      'notice_type_str' => $this->get_notice_type_str($notice_data->notice_type),
      'target_id' => $notice_data->target_id,
      'target_title' => $notice_data->target_title,
      'user_id' => $user_id,
    );
    $this->db->set('log_at', 'NOW()', false);
    $this->db->insert('server_notice_log', $data);
  
    return $this->db->insert_id();
  }
  
  function send_notice_coupon($notice_data)
  {
    $log_count = 0;
    if ($notice_data->notice_type != SERVER_NOTICE_TYPE_COUPON) {
      $this->update($notice_data->notice_id, SERVER_NOTICE_STATUS_FAIL, $log_count);
      return false;
    }
  
    $coupon_id = $notice_data->target_id;
    $coupon = $this->coupon_model->get_server_coupon($coupon_id);
    if ($coupon->activate != APPROVAL_DATA_ACTIVATE) {
      log_message('debug', '[notice] wait for activate, notice_id['.$notice_data->notice_id.'] coupon_id['.$coupon_id.']');
      return false;
    }
    
    if ($coupon->user_type == COUPON_USER_TYPE_CENTER ||
      $coupon->user_type == COUPON_USER_TYPE_TEACHER /* || $coupon->user_type == COUPON_USER_TYPE_CENTER_TEACHER */
    ) {
      $user_type = $this->coupon_model->get_user_type_from_coupon_user_type($coupon->user_type);
      $query = <<<QUERY
select * from user where (user_type & {$user_type}) > 0
QUERY;
      $users = $this->db->query($query)->result();
      foreach ($users as $user) {
        if ($this->coupon_model->send_user_coupon_data($coupon, $user)) {
          $this->log($notice_data, $user->user_id);
          $log_count++;
        }
      }
    }
    $this->update($notice_data->notice_id, SERVER_NOTICE_STATUS_COMPLETE, $log_count);
    return true;
  }
}
