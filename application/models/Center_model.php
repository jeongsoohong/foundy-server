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
      case CENTER_TICKET_MEMBER_ACTION_JOIN: return '수강권등록';
      case CENTER_TICKET_MEMBER_ACTION_STOP: return '수강권정지';
      case CENTER_TICKET_MEMBER_ACTION_RENEWAL: return '수강권연장';
      case CENTER_TICKET_MEMBER_ACTION_REFUND: return '수강권환불';
      case CENTER_TICKET_MEMBER_ACTION_DELETE: return '수강권삭제';
      case CENTER_TICKET_MEMBER_ACTION_RESERVE: return '클래스예약';
      case CENTER_TICKET_MEMBER_ACTION_RESERVE_WAIT: return '클래스예약대기';
      case CENTER_TICKET_MEMBER_ACTION_RESERVE_CANCEL: return '클래스예약취소';
      case CENTER_TICKET_MEMBER_ACTION_RESERVE_FAIL: return '클래스예약실패';
      case CENTER_TICKET_MEMBER_ACTION_MODIFY: return '정보수정';
      case CENTER_TICKET_MEMBER_ACTION_ADDITION: return '수업횟수추가';
      case CENTER_TICKET_MEMBER_ACTION_RESERVE_TRANS: return '클래스예약전환';
      case CENTER_TICKET_MEMBER_ACTION_RESERVE_WAIT_TRANS: return '클래스예약대기전환';
      case CENTER_TICKET_MEMBER_ACTION_RESERVE_CANCEL_TRANS: return '클래스예약취소전환';
    }
 
    return null;
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
      'wait' => 0,
      'cancel' => 0,
      'fail' => 0,
      'stop' => 0,
      'renewal' => 0,
      'refund' => 0,
      'reservable_count' => $reservable_count,
      'reservable_count_oneday' => $ticket->reservable_count_oneday,
      'reservable_duration' => $ticket->reservable_duration,
      'enable_start_at' => $this->get_member_start_at($enable_start_at),
      'enable_end_at' => $this->get_member_end_at($enable_end_at),
    );
    $this->db->set('stop_start_at', 'NOW()', false);
    $this->db->set('stop_end_at', 'NOW()', false);
    $this->db->set('create_at', 'NOW()', false);
    $this->db->set('update_at', 'NOW()', false);
    $this->db->insert('center_ticket_member', $member);
    $member_id = $this->db->insert_id();
    if ($member_id <= 0) {
      return $member_id;
    }
    
    $member['member_id'] = $member_id;
  
    $action_data = '';
    $action_data .= '<'.$ticket->ticket_title.'>';
    if ($ticket->ticket_type == CENTER_TICKET_TYPE_COUNT) {
      $action_data .= ' '.$reservable_count.'회';
    }
    $action_data .= ', '.$this->crud_model->get_price_str($ticket->ticket_price).'원';
    $action_data .= '<br>'.date('Y.m.d', strtotime($enable_start_at)).' ~ '.date('Y.m.d', strtotime($enable_end_at));
    $ins = array(
      'member_id' => $member_id,
      'ticket_id' => $ticket->ticket_id,
      'user_id' => $user_id,
      'schedule_info_id' => 0,
      'action' => CENTER_TICKET_MEMBER_ACTION_JOIN,
      'action_str' => $this->get_ticket_member_action_str(CENTER_TICKET_MEMBER_ACTION_JOIN),
      'action_duration' => 0,
      'action_data'=> $action_data,
    );
    $this->db->set('history_at', 'NOW()', false);
    $this->db->insert('center_ticket_member_history', $ins);
  
    $this->db->set('enroll_member_count', 'enroll_member_count+1', false);
    $this->db->set('update_at', 'NOW()', false);
    $this->db->where('ticket_id', $ticket->ticket_id);
    $this->db->update('center_ticket');
  
    return $member_id;
  }
  
  function ticket_member_reserve($member_id, $ticket_id, $user_id, $schedule_info_id, $reserve_id, $action, $schedule_title, $schedule_date)
  {
    $ins = array(
      'member_id' => $member_id,
      'ticket_id' => $ticket_id,
      'user_id' => $user_id,
      'schedule_info_id' => $schedule_info_id,
      'reserve_id' => $reserve_id,
      'action' => $action,
      'action_str' => $this->get_ticket_member_action_str($action),
      'action_duration' => 0,
      'action_data' => '<' . $schedule_title . '>, 일시 : ' . date('Y.m.d', strtotime($schedule_date)),
    );
    $this->db->set('history_at', 'NOW()', false);
    $this->db->insert('center_ticket_member_history', $ins);
    return true;
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
      'schedule_info_id' => 0,
      'action' => CENTER_TICKET_MEMBER_ACTION_MODIFY,
      'action_str' => $this->get_ticket_member_action_str(CENTER_TICKET_MEMBER_ACTION_MODIFY),
      'action_duration' => 0,
      'action_data' => json_encode($upd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
    );
    $this->db->set('stop_start_at', 'NOW()', false);
    $this->db->set('stop_end_at', 'NOW()', false);
    $this->db->set('history_at', 'NOW()', false);
    $this->db->insert('center_ticket_member_history', $ins);
  
    return true;
  }
  
  function ticket_member_action($member_ids, $action, $action_duration, $stop_start_at, $stop_end_at)
  {
    $ins = array(
      'reserve_id' => 0,
      'action' => $action,
      'action_str' => $this->get_ticket_member_action_str($action),
      'action_duration' => $action_duration,
    );
    
    $result[0] = count($member_ids); // total
    $result[1] = 0; // success
    $result[2] = 0; // failure
    
    foreach($member_ids as $member_id) {
      $member = $this->get_ticket_member($member_id);
      if ($member->deleted == 1) {
        $result[2] += 1;
        continue;
      } else if ($action != CENTER_TICKET_MEMBER_ACTION_DELETE && $member->refund == 1) {
          $result[2] += 1;
          continue;
      }

      $action_data = '';
      if ($action == CENTER_TICKET_MEMBER_ACTION_STOP) {
        if ($member->stop > 0) {
          $now = time();
          if (strtotime($member->stop_end_at) < $now) { // 정지기간 종료
            $this->db->set('stop', 'stop+'.$action_duration, false);
            $this->db->set('stop_start_at', $stop_start_at);
            $this->db->set('stop_end_at', $stop_end_at);
            $this->db->set('enable_end_at', $this->get_member_extend_end_at($member->enable_end_at, $action_duration));
          } else if (strtotime($member->stop_start_at) < $now && $now < strtotime($member->stop_end_at)) { // 정지 기간 중
            $result[2] += 1;
            continue;
          } else { // 정지 기간 예정
            $start_time = strtotime($member->stop_start_at);
            $end_time = strtotime($member->stop_end_at);
            $stop_duration = ($end_time - $start_time) / ONE_DAY + 1;
            $this->db->set('stop', 'stop+'.$action_duration.'-'.$stop_duration, false);
            $this->db->set('stop_start_at', $stop_start_at);
            $this->db->set('stop_end_at', $stop_end_at);
            $this->db->set('enable_end_at', $this->get_member_extend_end_at($member->enable_end_at, $action_duration - $stop_duration));
          
          }
        } else {
          $this->db->set('stop', 'stop+'.$action_duration, false);
          $this->db->set('stop_start_at', $this->get_member_start_at($stop_start_at));
          $this->db->set('stop_end_at', $this->get_member_end_at($stop_end_at));
          $this->db->set('enable_end_at', $this->get_member_extend_end_at($member->enable_end_at, $action_duration));
        }
        $action_data .= date('Y.m.d', strtotime($stop_start_at)).' ~ '.date('Y.m.d', strtotime($stop_end_at));
      } else if ($action == CENTER_TICKET_MEMBER_ACTION_RENEWAL) {
        $this->db->set('renewal', 'renewal+'.$action_duration, false);
        $this->db->set('enable_end_at', $this->get_member_extend_end_at($member->enable_end_at, $action_duration));
        $action_data .= $action_duration.'일';
      } else if ($action == CENTER_TICKET_MEMBER_ACTION_REFUND) {
        $this->db->set('refund', 1);
      } else if ($action == CENTER_TICKET_MEMBER_ACTION_DELETE) {
        $this->db->set('deleted', 1);
      } else if ($action == CENTER_TICKET_MEMBER_ACTION_ADDITION) {
        $reservable_count = $member->reservable_count + $action_duration;
        if ($reservable_count < 0) {
          $reservable_count = 0;
        }
        $this->db->set('reservable_count', $reservable_count);
        $action_data .= $action_duration.'회';
      } else {
        $result[2] += 1;
        continue;
      }
  
      $this->db->set('update_at', 'NOW()', false);
      $this->db->where('member_id', $member_id);
      $this->db->update('center_ticket_member');
      if ($this->db->affected_rows() <= 0) {
        $result[2] += 1;
        continue;
      }

      $ins['action_data'] = $action_data;
      $ins['member_id'] = $member_id;
      $ins['user_id'] = $member->user_id;
      $ins['ticket_id'] = $member->ticket_id;
      $this->db->set('history_at', 'NOW()', false);
  
      $this->db->insert('center_ticket_member_history', $ins);
  
      if (($action == CENTER_TICKET_MEMBER_ACTION_REFUND && $member->deleted == 0) ||
        ($action == CENTER_TICKET_MEMBER_ACTION_DELETE && $member->refund == 0)) {
        $this->db->set('enroll_member_count', 'enroll_member_count-1', false);
        $this->db->set('update_at', 'NOW()', false);
        $this->db->where('ticket_id', $member->ticket_id);
        $this->db->update('center_ticket');
      }
  
      $result[1] += 1;
    }
    
    return $result;
  }
  
  function ticket_member_history_cnt($member_id)
  {
    $query = <<<QUERY
select count(*) as cnt from center_ticket_member_history where member_id={$member_id}
QUERY;
    return $this->db->query($query)->row()->cnt;
  }
  
  function ticket_member_history($member_id, $offset, $size)
  {
    $query = <<<QUERY
select * from center_ticket_member_history where member_id={$member_id} order by history_id desc limit ${offset},{$size}
QUERY;
    return $this->db->query($query)->result();
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
  
  function get_schedule_info($schedule_info_id)
  {
    return $this->db->get_where('center_schedule_info', array('schedule_info_id' => $schedule_info_id, 'activate' => 1))->row();
  }
  
  function lock_schedule_info($schedule_info_id)
  {
    $query = <<<QUERY
select get_lock('center_schedule:{$schedule_info_id}',5) as 'lock'
QUERY;
    $result = $this->db->query($query)->row()->lock;
    log_message('debug', '[lock] center_schedule:'.$schedule_info_id.',result:'.$result);
    return $result;
  }
  
  function unlock_schedule_info($schedule_info_id)
  {
    $query = <<<QUERY
select release_lock('center_schedule:{$schedule_info_id}') as 'unlock'
QUERY;
    $result = $this->db->query($query)->row()->unlock;
    log_message('debug', '[unlock] center_schedule_id:'.$schedule_info_id.',result:'.$result);
    return $result;
  }

  function get_schedule_reserve_cnt($schedule_info_id)
  {
    $query = <<<QUERY
select count(*) as cnt from center_schedule_reserve where schedule_info_id={$schedule_info_id} and reserve=1
QUERY;
    return $this->db->query($query)->row()->cnt;
  }
  
  function get_schedule_wait_cnt($schedule_info_id)
  {
    $query = <<<QUERY
select count(*) as cnt from center_schedule_reserve where schedule_info_id={$schedule_info_id} and wait=1
QUERY;
    return $this->db->query($query)->row()->cnt;
  }
 
  function get_schedule_reserve_list($schedule_info_id, $order = 'asc', $limit = 0, $offset = 0)
  {
    if ($limit > 0) {
      $this->db->limit($limit, $offset);
    }
    return $this->db->order_by('reserve_id', $order)->get_where('center_schedule_reserve', array('reserve' => 1, 'schedule_info_id' => $schedule_info_id))->result();
  }
 
  function get_schedule_wait_list($schedule_info_id,  $order = 'asc', $limit = 0, $offset = 0)
  {
    if ($limit > 0) {
      $this->db->limit($limit, $offset);
    }
    return $this->db->order_by('reserve_id', $order)->get_where('center_schedule_reserve', array('wait' => 1, 'schedule_info_id' => $schedule_info_id))->result();
  }
 
  function get_schedule_reserve_info_last($schedule_info_id)
  {
    return $this->db->order_by('reserve_id', 'desc')->limit(1, 0)->get_where('center_schedule_reserve', array('schedule_info_id' => $schedule_info_id, 'reserve' => 1))->row();
  }
 
  function get_schedule_wait_info_first($schedule_info_id)
  {
    return $this->db->order_by('reserve_id', 'asc')->limit(1, 0)->get_where('center_schedule_reserve', array('schedule_info_id' => $schedule_info_id, 'wait' => 1))->row();
  }
 
  function schedule_cancel($reserve_info, $schedule_title, $schedule_date, $trans = true)
  {
    $upd = array(
      'reserve' => 0,
      'wait' => 0,
      'cancel' => 1,
      'fail' => 0,
    );
    $where = array(
      'reserve_id' => $reserve_info->reserve_id,
    );
    $this->db->set('cancel_at', 'NOW()', false);
    $this->db->update('center_schedule_reserve', $upd, $where);
  
    if ($reserve_info->reserve) {
      $this->db->set('reserve', 'reserve-1', false);
    } else {
      $this->db->set('wait', 'wait-1', false);
    }
    $this->db->set('cancel', 'cancel+1', false);
    $this->db->set('update_at', 'NOW()', false);
    $this->db->update('center_ticket_member', array(), array('member_id' => $reserve_info->member_id));
    
    if ($trans == true) {
      $action = CENTER_TICKET_MEMBER_ACTION_RESERVE_CANCEL_TRANS;
    } else {
      $action = CENTER_TICKET_MEMBER_ACTION_RESERVE_CANCEL;
    }
   
    $this->ticket_member_reserve($reserve_info->member_id, $reserve_info->ticket_id, $reserve_info->user_id,
    $reserve_info->schedule_info_id, $reserve_info->reserve_id, $action,
    $schedule_title, $schedule_date);
  }
  
  function transfer_wait2reserve($wait_info, $schedule_title, $schedule_date)
  {
    $upd = array(
      'reserve' => 1,
      'wait' => 0,
      'cancel' => 0,
      'fail' => 0,
    );
    $where = array(
      'reserve_id' => $wait_info->reserve_id,
    );
    $this->db->set('register_at', 'NOW()', false);
    $this->db->update('center_schedule_reserve', $upd, $where);
 
    $this->ticket_member_reserve($wait_info->member_id, $wait_info->ticket_id, $wait_info->user_id,
      $wait_info->schedule_info_id, $wait_info->reserve_id, CENTER_TICKET_MEMBER_ACTION_RESERVE_TRANS,
    $schedule_title, $schedule_date);
  
    $this->db->set('reserve', 'reserve+1', false);
    $this->db->set('wait', 'wait-1', false);
    $this->db->set('update_at', 'NOW()', false);
    $this->db->update('center_ticket_member', array(), array('member_id' => $wait_info->member_id));
  }
  
  function transfer_reserve2wait($reserve_info, $schedule_title, $schedule_date)
  {
    $upd = array(
      'reserve' => 0,
      'wait' => 1,
      'cancel' => 0,
      'fail' => 0,
    );
    $where = array(
      'reserve_id' => $reserve_info->reserve_id,
    );
    $this->db->set('register_at', 'NOW()', false);
    $this->db->update('center_schedule_reserve', $upd, $where);
   
    $this->ticket_member_reserve($reserve_info->member_id, $reserve_info->ticket_id, $reserve_info->user_id,
    $reserve_info->schedule_info_id, $reserve_info->reserve_id, CENTER_TICKET_MEMBER_ACTION_RESERVE_WAIT_TRANS,
    $schedule_title, $schedule_date);
    
    $this->db->set('reserve', 'reserve-1', false);
    $this->db->set('wait', 'wait+1', false);
    $this->db->set('update_at', 'NOW()', false);
    $this->db->update('center_ticket_member', array(), array('member_id' => $reserve_info->member_id));
  }
  function get_ampm($time) {
    return ($time < '12:00:00' ? 'am' : 'pm');
  }
  function get_time($time) {
    return ($time <= '12:00:00' ? substr($time, 0, 5) : substr(date('H:i:s', strtotime($time) - 12 * ONE_HOUR), 0, 5));
  }
}
