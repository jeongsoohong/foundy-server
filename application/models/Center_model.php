<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Center_model extends CI_Model
{
  
  function __construct()
  {
    parent::__construct();
    
  }
  
  function get_ticket_type_str($ticket_type)
  {
    switch ($ticket_type)
    {
      case CENTER_TICKET_TYPE_DEFAULT: return '전체';
      case CENTER_TICKET_TYPE_COUNT: return '정액권';
      case CENTER_TICKET_TYPE_DURATION: return '기간권';
    }
    return '';
  }
  
  function add_ticket($data)
  {
    $data['activate'] = 0;
    $data['enroll_member_count'] = 0;
    $data['ticket_type_str'] = $this->get_ticket_type_str($data['ticket_type']);
    $this->db->set('create_at', 'NOW()', false);
    $this->db->set('update_at', 'NOW()', false);
    $this->db->insert('center_ticket', $data);
    return $this->db->insert_id();
  }
  
  function upd_ticket($data, $ticket_id)
  {
    $this->db->set('update_at', 'NOW()', false);
    $this->db->update('center_ticket', $data, array('ticket_id' => $ticket_id));
    return $this->db->affected_rows();
  }
  
  function activate_ticket($ticket_id, $activate)
  {
    $data['activate'] = $activate;
    $this->db->set('update_at', 'NOW()', false);
    $this->db->update('center_ticket', $data, array('ticket_id' => $ticket_id));
    return $this->db->affected_rows();
  }
  
  function get_tickets($center_id, $activate)
  {
    return $this->db->order_by('ticket_id', 'desc')->get_where('center_ticket', array('center_id' => $center_id, 'activate' => $activate))->result();
  }
  
  function get_ticket($ticket_id)
  {
    return $this->db->get_where('center_ticket', array('ticket_id' => $ticket_id))->row();
  }
  
  function get_ticket_member_action_str($action)
  {
    switch($action) {
      case CENTER_TICKET_MEMBER_ACTION_JOIN: return '등록';
      case CENTER_TICKET_MEMBER_ACTION_STOP: return '정지';
      case CENTER_TICKET_MEMBER_ACTION_RENEWAL: return '연장';
      case CENTER_TICKET_MEMBER_ACTION_REFUND: return '환불';
      case CENTER_TICKET_MEMBER_ACTION_DELETE: return '삭제';
      case CENTER_TICKET_MEMBER_ACTION_RESERVE: return '예약';
      case CENTER_TICKET_MEMBER_ACTION_RESERVE_WAIT: return '예약대기';
      case CENTER_TICKET_MEMBER_ACTION_RESERVE_CANCEL: return '예약취소';
      case CENTER_TICKET_MEMBER_ACTION_MODIFY: return '정보수정';
    }
 
    return '';
  }
  
  function get_ticket_member($member_id)
  {
    return $this->db->get_where('center_ticket_member', array('member_id' => $member_id))->row();
  }
  function get_member_start_at($start_at)
  {
    return $start_at . ' 00:00:00';
  }
  function get_member_end_at($end_at)
  {
    return $end_at . ' 23:59:59';
  }
  function get_member_extend_end_at($enable_end_at, $extend_duration /* day */)
  {
    return date('Y-m-d H:i:s', strtotime($enable_end_at) + $extend_duration * ONE_DAY);
  }
  
  
  function ticket_member_join($center_id, $ticket, $user_id, $enable_start_at, $enable_end_at, $reservable_count)
  {
    $user_data = $this->db->get_where('user', array('user_id' => $user_id))->row();
    
//    $start_at = date('Y-m-d');
//    $end_at = date('Y-m-d', strtotime(($ticket->reservable_duration+1).'days'));
    
    $member = array(
      'ticket_id' => $ticket->ticket_id,
      'center_id' => $center_id,
      'user_id' => $user_id,
      'username' => $user_data->username,
      'email' => $user_data->email,
      'phone' => $user_data->phone,
      'ticket_title' => $ticket->ticket_title,
      'ticket_price' => $ticket->ticket_price,
      'ticket_type' => $ticket->ticket_type,
      'ticket_type_str' => $ticket->ticket_type_str,
      'reserve' => 0,
      'reservable_count' => $reservable_count,
      'reservable_count_oneday' => $ticket->reservable_count_oneday,
      'reservable_duration' => $ticket->reservable_duration,
      'enable_start_at' => $this->get_member_start_at($enable_start_at),
      'enable_end_at' => $this->get_member_end_at($enable_end_at),
      'stop' => 0,
      'renewal' => 0,
      'refund' => 0,
    );
    $this->db->set('create_at', 'NOW()', false);
    $this->db->set('update_at', 'NOW()', false);
    $this->db->set('last_reserve_at', 'NOW()', false);
    $this->db->insert('center_ticket_member', $member);
    $member_id = $this->db->insert_id();
    if ($member_id <= 0) {
      return $member_id;
    }
    
    $member['member_id'] = $member_id;
    
    $ins = array(
      'member_id' => $member_id,
      'ticket_id' => $ticket->ticket_id,
      'user_id' => $user_id,
      'action' => CENTER_TICKET_MEMBER_ACTION_JOIN,
      'action_str' => $this->get_ticket_member_action_str(CENTER_TICKET_MEMBER_ACTION_JOIN),
      'action_duration' => 0,
      'action_data' => json_encode($member),
    );
    $this->db->set('stop_start_at', 'NOW()', false);
    $this->db->set('stop_end_at', 'NOW()', false);
    $this->db->set('history_at', 'NOW()', false);
    $this->db->insert('center_ticket_member_history', $ins);
  
    $this->db->set('enroll_member_count', 'enroll_member_count+1', false);
    $this->db->set('update_at', 'NOW()', false);
    $this->db->where('ticket_id', $ticket->ticket_id);
    $this->db->update('center_ticket');
  
    return $member_id;
  }
  
  function ticket_member_modify($member_id, $enable_start_at, $enable_end_at, $reservable_count)
  {
    $member = $this->get_ticket_member($member_id);
    $upd = array(
      'enable_start_at' => $this->get_member_start_at($enable_start_at),
      'enable_end_at' => $this->get_member_end_at($enable_end_at),
    );
   
    // upd 세팅 순서 바꾸면 안됨
    if ($member->ticket_type == CENTER_TICKET_TYPE_COUNT) {
      $upd['reservable_count'] = $reservable_count;
    }
    $this->db->set('update_at', 'NOW()', false);
    $this->db->update('center_ticket_member', $upd, array('member_id' => $member_id));
    if ($this->db->affected_rows() <= 0) {
      return false;
    }
    
    $ins = array(
      'member_id' => $member_id,
      'ticket_id' => $member->ticket_id,
      'user_id' => $member->user_id,
      'action' => CENTER_TICKET_MEMBER_ACTION_MODIFY,
      'action_str' => $this->get_ticket_member_action_str(CENTER_TICKET_MEMBER_ACTION_MODIFY),
      'action_duration' => 0,
      'action_data' => json_encode($upd),
    );
    $this->db->set('stop_start_at', 'NOW()', false);
    $this->db->set('stop_end_at', 'NOW()', false);
    $this->db->set('history_at', 'NOW()', false);
    $this->db->insert('center_ticket_member_history', $ins);
  
    return true;
  }
  
  function ticket_member_action($member_ids, $action, $action_duration, $action_data, $stop_start_at, $stop_end_at)
  {
    $ins = array(
      'action' => $action,
      'action_str' => $this->get_ticket_member_action_str($action),
      'action_duration' => $action_duration,
      'action_data' => $action_data,
      'stop_start_at' => $this->get_member_start_at($stop_start_at),
      'stop_end_at' => $this->get_member_end_at($stop_end_at),
    );
    
    foreach($member_ids as $member_id) {
      $member = $this->get_ticket_member($member_id);
  
      if ($action == CENTER_TICKET_MEMBER_ACTION_REFUND && $member->refund == 1) {
        continue;
      } else if ($member->deleted == 1) {
        continue;
      }
      
      $ins['member_id'] = $member_id;
      $ins['user_id'] = $member->user_id;
      $ins['ticket_id'] = $member->ticket_id;
      $this->db->set('history_at', 'NOW()', false);
      
      $this->db->insert('center_ticket_member_history', $ins);
      if ($this->db->insert_id() <= 0) {
        return false;
      }
  
      if ($action == CENTER_TICKET_MEMBER_ACTION_STOP) {
        $this->db->set('stop', 'stop+'.$action_duration, false);
        $this->db->set('enable_end_at', $this->get_member_extend_end_at($member->enable_end_at, $action_duration));
      } else if ($action == CENTER_TICKET_MEMBER_ACTION_RENEWAL) {
        $this->db->set('renewal', 'renewal+'.$action_duration, false);
        $this->db->set('enable_end_at', $this->get_member_extend_end_at($member->enable_end_at, $action_duration));
      } else if ($action == CENTER_TICKET_MEMBER_ACTION_REFUND) {
        $this->db->set('refund', 1);
      } else if ($action == CENTER_TICKET_MEMBER_ACTION_DELETE) {
        $this->db->set('deleted', 1);
      } else {
        return false;
      }
  
      $this->db->set('update_at', 'NOW()', false);
      $this->db->where('member_id', $member_id);
      $this->db->update('center_ticket_member');
      if ($this->db->affected_rows() <= 0) {
        return false;
      }
      
      if (($action == CENTER_TICKET_MEMBER_ACTION_REFUND && $member->deleted == 0) ||
        ($action == CENTER_TICKET_MEMBER_ACTION_DELETE && $member->refund == 0)) {
        $this->db->set('enroll_member_count', 'enroll_member_count-1', false);
        $this->db->set('update_at', 'NOW()', false);
        $this->db->where('ticket_id', $member->ticket_id);
        $this->db->update('center_ticket');
      }
    }
    
    return true;
  }
  
  function ticket_member_search_cnt($ticket_id, $filter, $filter_col, $center_id = 0)
  {
    if ($ticket_id == 0) {
      if (empty($filter) == false) {
        $query = <<<QUERY
select count(*) as cnt from center_ticket_member where center_id={$center_id} and deleted=0 and {$filter_col} like '%{$filter}%'
QUERY;
        $total_cnt = $this->db->query($query)->row()->cnt;
      } else {
        $query = <<<QUERY
select count(*) as cnt from center_ticket_member where center_id={$center_id} and deleted=0 order by ticket_id desc
QUERY;
        $total_cnt = $this->db->query($query)->row()->cnt;
      }
    } else {
      if (empty($filter) == false) {
        $query = <<<QUERY
select count(*) as cnt from center_ticket_member where ticket_id={$ticket_id} and deleted=0 and {$filter_col} like '%{$filter}%'
QUERY;
        $total_cnt = $this->db->query($query)->row()->cnt;
      } else {
        $query = <<<QUERY
select count(*) as cnt from center_ticket_member where ticket_id={$ticket_id} and deleted=0 order by ticket_id desc
QUERY;
        $total_cnt = $this->db->query($query)->row()->cnt;
      }
    }
    return $total_cnt;
  }
  
  function ticket_member_search($ticket_id, $filter, $filter_col, $size, $offset, $center_id = 0)
  {
    if ($ticket_id == 0) {
      if (empty($filter) == false) {
        $query = <<<QUERY
select * from center_ticket_member
where center_id={$center_id} and deleted=0 and {$filter_col} like '%{$filter}%' order by member_id desc limit {$offset},{$size}
QUERY;
        $members = $this->db->query($query)->result();
      } else {
        $members = $this->db->order_by('member_id', 'desc')->limit($size, $offset)->
        get_where('center_ticket_member', array('center_id' => $center_id, 'deleted' => 0))->result();
      }
    } else {
      if (empty($filter) == false) {
        $query = <<<QUERY
select * from center_ticket_member
where ticket_id={$ticket_id} and deleted=0 and {$filter_col} like '%{$filter}%' order by member_id desc limit {$offset},{$size}
QUERY;
        $members = $this->db->query($query)->result();
      } else {
        $members = $this->db->order_by('member_id', 'desc')->limit($size, $offset)->
        get_where('center_ticket_member', array('ticket_id' => $ticket_id, 'deleted' => 0))->result();
      }
    }
    
    return $members;
  }
  
}
