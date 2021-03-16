<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Studio_model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }
  
  function get_img_web_path()
  {
    return base_url().'uploads/studio_image/';
  }
  function get_img_path()
  {
    return '/web/public_html/uploads/studio_image/';
  }
  
  function get($studio_id) {
    return $this->db->get_where('studio', array('studio_id' => $studio_id))->row();
  }
  function get_from_user_id($user_id) {
    return $this->db->get_where('studio', array('user_id' => $user_id, 'activate' => 1))->row();
  }
  
  function get_studios($teacher_id) {
    return $this->db->get_where('studio', array('teacher_id' => $teacher_id, 'activate' => 1))->result();
  }
  
  function get_categories($studio_id, $type)
  {
    $category_yoga_data = array();
    $categories = $this->db->get_where('studio_category', array('studio_id' => $studio_id, 'type' => $type))->result();
    foreach ($categories as $c) {
      $category_yoga_data[] = $c->category;
    }
  
    $categories = array();
    $category_studio = $this->db->get_where('category_studio', array('activate' => 1, 'type' => $type))->result();
    foreach ($category_studio as $c) {
      $categories[] = $c->name;
    }
  
    $category_yoga_etc = '';
    $categories = array_values(array_diff($category_yoga_data, $categories));
    foreach ($categories as $c) {
      $category_yoga_etc .= $c.' ';
    }
    
    return array($category_yoga_data, $category_yoga_etc);
  }
  
  function get_class_categories($schedule_info_id, $type)
  {
    $category_yoga_data = array();
    $categories = $this->db->get_where('studio_class_category', array('schedule_info_id' => $schedule_info_id, 'type' => $type))->result();
    foreach ($categories as $c) {
      $category_yoga_data[] = $c->category;
    }
    
    $categories = array();
    $category_studio = $this->db->get_where('category_studio', array('activate' => 1, 'type' => $type))->result();
    foreach ($category_studio as $c) {
      $categories[] = $c->name;
    }
    
    $category_yoga_etc = '';
    $categories = array_values(array_diff($category_yoga_data, $categories));
    foreach ($categories as $c) {
      $category_yoga_etc .= $c.' ';
    }
    
    return array($category_yoga_data, $category_yoga_etc);
  }
  
  function upload_image($file, $studio_id)
  {
    $error = $this->crud_model->file_validation($file, false);
    if ($error != UPLOAD_ERR_OK) {
      return array('success' => false, 'error' => $error);
    } else {
      $time = gettimeofday();
      $file_name = 'studio_' . $studio_id . '_' . $time['sec'] . $time['usec'] . '.jpg';
      $this->crud_model->upload_image($this->get_img_path(), $file_name, $file,
        1000, 0, false, true);
      return array('success' => true, 'filename' => $file_name);
    }
  }
  
  function update_info($studio_id, $user_id, $info)
  {
    $studio_data = $this->db->get_where('studio', array('studio_id' => $studio_id))->row();
    if ($studio_data->user_id != $user_id) {
      $this->crud_model->alert_exit("권한이 없습니다, {$studio_id}, {$studio_data->user_id}, {$user_id}",
        base_url() . 'studio');
    }
  
    $files = 'studio_' . $studio_id . '_*.*';
    $this->crud_model->del_upload_image($this->get_img_web_path(),
      $this->get_img_path(), $info, $files);
  
    $upd = array('info' => $info);
    $where = array('studio_id' => $studio_id);
    $this->db->update('studio', $upd, $where);
  }
  
  function update_about($studio_id, $user_id, $about)
  {
    $studio_data = $this->db->get_where('studio', array('studio_id' => $studio_id))->row();
    if ($studio_data->user_id != $user_id) {
      $this->crud_model->alert_exit("권한이 없습니다, {$studio_id}, {$studio_data->user_id}, {$user_id}",
        base_url() . 'studio');
    }
  
    $upd = array('about' => $about);
    $where = array('studio_id' => $studio_id);
    $this->db->update('studio', $upd, $where);
  }
  
  function update_profile($studio_id, $instagram, $youtube, $email, $payment_page,
                          $categories_yoga, $category_yoga_etc, $categories_pilates, $category_pilates_etc)
  {
    if (!empty($category_yoga_etc)) {
      if (isset($categories_yoga) && count($categories_yoga)) {
        $categories_yoga = array_merge($categories_yoga, explode(' ', $category_yoga_etc));
      } else {
        $categories_yoga = explode(' ', $category_yoga_etc);
      }
    }
  
    if (!empty($categories_yoga) && count($categories_yoga)) {
      $categories_yoga = array_filter(array_map('trim', $categories_yoga));
    }
  
    if (!empty($category_pilates_etc)) {
      if (isset($categories_pilates) && count($categories_pilates)) {
        $categories_pilates = array_merge($categories_pilates, explode(' ', $category_pilates_etc));
      } else {
        $categories_pilates = explode(' ', $category_pilates_etc);
      }
    }
  
    if (!empty($categories_pilates) && count($categories_pilates)) {
      $categories_pilates = array_filter(array_map('trim', $categories_pilates));
    }
  
    if ((empty($categories_yoga) && empty($categories_pilates)) || (count($categories_yoga) == 0 && count($categories_pilates) == 0)) {
      $this->crud_model->alert_exit('최소 하나의 분류를 선택해주세요');
    }
  
    $cats = $this->db->get_where('studio_category', array('studio_id' => $studio_id, 'type' => STUDIO_TYPE_YOGA))->result();
    $already_categories = array();
    foreach ($cats as $c) {
      $already_categories[] = $c->category;
    }
  
    // insert category
    $diff_cats = array_diff($categories_yoga, $already_categories);
    foreach ($diff_cats as $c) {
      $ins = array(
        'studio_id' => $studio_id,
        'category' => $c,
        'type' => STUDIO_TYPE_YOGA,
        'activate' => 1
      );
      $this->db->insert('studio_category', $ins);
    }
  
    // del category
    $diff_cats = array_diff($already_categories, $categories_yoga);
    foreach ($diff_cats as $c) {
      $del = array(
        'studio_id' => $studio_id,
        'category' => $c,
        'type' => STUDIO_TYPE_YOGA
      );
      $this->db->delete('studio_category', $del);
    }
  
    $cats = $this->db->get_where('studio_category', array('studio_id' => $studio_id, 'type' => STUDIO_TYPE_PILATES))->result();
    $already_categories = array();
    foreach ($cats as $c) {
      $already_categories[] = $c->category;
    }
  
    // insert category
    $diff_cats = array_diff($categories_pilates, $already_categories);
    foreach ($diff_cats as $c) {
      $ins = array(
        'studio_id' => $studio_id,
        'category' => $c,
        'type' => STUDIO_TYPE_PILATES,
        'activate' => 1
      );
      $this->db->insert('studio_category', $ins);
    }
  
    // del category
    $diff_cats = array_diff($already_categories, $categories_pilates);
    foreach ($diff_cats as $c) {
      $del = array(
        'studio_id' => $studio_id,
        'category' => $c,
        'type' => STUDIO_TYPE_PILATES
      );
      $this->db->delete('studio_category', $del);
    }
  
    if (isset($instagram) == false || empty($instagram) == true) {
      $instagram = null;
    }
    if (isset($youtube) == false || empty($youtube) == true) {
      $youtube = null;
    }
    if (isset($email) == false || empty($email) == true) {
      $email = null;
    }
    if (isset($payment_page) == false || empty($payment_page) == true) {
      $email = null;
    }
  
    $upd = array(
      'instagram' => $instagram,
      'youtube' => $youtube,
      'email' => $email,
      'payment_page' => $payment_page,
    );
    $where = array (
      'studio_id' => $studio_id
    );
    $this->db->update('studio', $upd, $where);
  
  }
  
  function lock_schedule_info($schedule_info_id)
  {
    $query = <<<QUERY
select get_lock('studio_schedule:{$schedule_info_id}',5) as 'lock'
QUERY;
    $result = $this->db->query($query)->row()->lock;
    log_message('debug', '[lock] studio_schedule:'.$schedule_info_id.',result:'.$result);
    return $result;
  }
  
  function unlock_schedule_info($schedule_info_id)
  {
    $query = <<<QUERY
select release_lock('studio_schedule:{$schedule_info_id}') as 'unlock'
QUERY;
    $result = $this->db->query($query)->row()->unlock;
    log_message('debug', '[unlock] studio_schedule_id:'.$schedule_info_id.',result:'.$result);
    return $result;
  }
  
  function get_schedule_info($schedule_info_id)
  {
    return $this->db->get_where('studio_schedule_info', array('schedule_info_id' => $schedule_info_id, 'activate' => 1))->row();
  }
  
  function register($user_id, $teacher_id, $center_id, $title, $instagram, $youtube, $email, $payment_page,
                    $categories_yoga, $categories_pilates, $category_yoga_etc, $category_pilates_etc)
  {
    $this->db->where('title', $title);
    $dup = $this->db->get('studio')->row();
    if (isset($dup) && !empty($dup)) {
      echo ("<script>alert('이미 있는 스튜디오명입니다! 다시 시도해주세요!');</script>");
      exit;
    }
    
    if (!empty($category_yoga_etc)) {
      if (isset($categories_yoga) && count($categories_yoga)) {
        $categories_yoga = array_merge($categories_yoga, explode(' ', trim($category_yoga_etc)));
      } else {
        $categories_yoga = explode(' ', trim($category_yoga_etc));
      }
    }
  
    if (!empty($categories_yoga) && count($categories_yoga)) {
      $categories_yoga = array_filter(array_map('trim', $categories_yoga));
    }
  
    if (!empty($category_pilates_etc)) {
      if (isset($categories_pilates) && count($categories_pilates)) {
        $categories_pilates = array_merge($categories_pilates, explode(' ', trim($category_pilates_etc)));
      } else {
        $categories_pilates = explode(' ', trim($category_pilates_etc));
      }
    }
  
    if (!empty($categories_pilates) && count($categories_pilates)) {
      $categories_pilates = array_filter(array_map('trim', $categories_pilates));
    }
  
    if ((empty($categories_yoga) && empty($categories_pilates)) || (count($categories_yoga) == 0 && count($categories_pilates) == 0)) {
      echo ("<script>alert('최소 하나의 분류를 선택해주세요');</script>");
      exit;
    }
  
    if (isset($instagram) == false || empty($instagram) == true) {
      $instagram = null;
    }
    if (isset($youtube) == false || empty($youtube) == true) {
      $youtube = null;
    }
    if (isset($email) == false || empty($email) == true) {
      $email = null;
    }
    if (isset($payment_page) == false || empty($payment_page) == true) {
      $payment_page =  null;
    }
  
    $data = array(
      'user_id' => $user_id,
      'teacher_id' => $teacher_id,
      'center_id' => $center_id,
      'title' => $title,
      'instagram' => $instagram,
      'youtube' => $youtube,
      'email' => $email,
      'payment_page' => $payment_page,
      'activate' => 0,
    );
    $this->db->set($data);
    $this->db->set('create_at', 'NOW()', false);
    $this->db->set('approval_at', 'NOW()', false);
    $this->db->insert('studio');
    
    $studio_id = $this->db->insert_id();
    
    foreach ($categories_yoga as $cat) {
      $cat = trim($cat);
      $this->db->insert('studio_category', array('studio_id' => $studio_id, 'category' => $cat, 'type' => STUDIO_TYPE_YOGA, 'activate' => 0));
    }
  
    foreach ($categories_pilates as $cat) {
      $cat = trim($cat);
      $this->db->insert('studio_category', array('studio_id' => $studio_id, 'category' => $cat, 'type' => STUDIO_TYPE_PILATES, 'activate' => 0));
    }
 
    return $studio_id;
  }
  
  const FIND_UPCOMING_CLASS_PAGE_SIZE = 5;
  function get_upcoming_class_list($limit, $offset, $random = false, $where_in = null) {
    $today = date('Y-m-d');
    $time = date('H:i:s');
    $this->db->limit($limit, $offset);
    if ($random == true) {
      $this->db->order_by('rand() asc');
    } else {
      $this->db->order_by('schedule_date,start_time asc');
    }
    if (isset($where_in) == true && empty($where_in) == false) {
      $this->db->where("(schedule_date >= '{$today}' and activate = 1)");
      $this->db->where_in('schedule_info_id', $where_in);
    } else {
      $this->db->where("(schedule_date = '{$today}' and start_time > '$time' and activate = 1)");
      $this->db->or_where("(schedule_date > '{$today}' and activate = 1)");
    }
//    $sql = $this->db->get_compiled_select('studio_schedule_info');
//    log_message('debug', '[studio] sql['.$sql.']');
    return $this->db->get('studio_schedule_info')->result();
  }
  
  function get_week_str($week) {
    switch($week) {
      case 0 : return 'SUN';
      case 1 : return 'MON';
      case 2 : return 'TUE';
      case 3 : return 'WED';
      case 4 : return 'THU';
      case 5 : return 'FRI';
      case 6 : return 'SAT';
    }
    return '';
  }
  function get_ampm($time) {
    return ($time < '12:00:00' ? 'am' : 'pm');
  }
  function get_time($time) {
    return ($time <= '12:00:00' ? substr($time, 0, 5) : substr(date('H:i:s', strtotime($time) - 12 * ONE_HOUR), 0, 5));
  }

  function check_ticketing($schedule)
  {
    $now = time();
    if (strtotime($schedule->reserve_open_at) <= $now && $now <= strtotime($schedule->reserve_close_at)) {
      // 예약가능
    } else {
      // 예약불가
      $schedule->ticketing = false;
    }
    $schedule->reserve_info = null;
    if ($this->session->userdata('user_login') == "yes") {
      $user_id = $this->session->userdata('user_id');
      $query = <<<QUERY
select * from studio_schedule_reserve
where user_id={$user_id} and schedule_info_id={$schedule->schedule_info_id} and (reserve=1 or wait=1)
QUERY;
      $reserve_info = $this->db->query($query)->row();
      if (empty($reserve_info) == false) {
        if ($reserve_info->wait == 1) { // 대기중
          $query = <<<QUERY
select count(*) as cnt from studio_schedule_reserve
where schedule_info_id={$schedule->schedule_info_id} and wait=1 and  reserve_id<={$reserve_info->reserve_id}
QUERY;
          $reserve_info->wait_cnt = $this->db->query($query)->row()->cnt;
        }
        $schedule->reserve_info = $reserve_info;
      } else {
        if ($schedule->waitable == 0) { // 무한 입금대기 가능
        } else { // 입금 대기 인원 체크
          $wait_cnt = $this->get_schedule_wait_cnt($schedule->schedule_info_id);
          if ($wait_cnt >= $schedule->waitable_number) {
            $schedule->ticketing = false;
          }
        }
      }
    }
    log_message('debug', '[studio] check_ticketing['.json_encode($schedule).']');
  }
  function get_schedules($studio_id, $date)
  {
    $this->db->order_by('start_time', 'asc');
    $schedules = $this->db->get_where('studio_schedule_info', array('studio_id' => $studio_id, 'schedule_date' => $date, 'activate' => 1))->result();
    foreach ($schedules as $schedule) {
      if ($schedule->ticketing == false) {
        continue;
      }
      $this->check_ticketing($schedule);
    }
    log_message('debug', '[studio] get_schedules['.json_encode($schedules).']');
    return $schedules;
  }
  
  function get_schedule_reserve_cnt($schedule_info_id)
  {
    $query = <<<QUERY
select count(*) as cnt from studio_schedule_reserve where schedule_info_id={$schedule_info_id} and reserve=1
QUERY;
    return $this->db->query($query)->row()->cnt;
  }
  
  function get_schedule_wait_cnt($schedule_info_id)
  {
    $query = <<<QUERY
select count(*) as cnt from studio_schedule_reserve where schedule_info_id={$schedule_info_id} and wait=1
QUERY;
    return $this->db->query($query)->row()->cnt;
  }
  
  function get_schedule_reserve_list($schedule_info_id, $order_col = null, $order = 'asc', $limit = 0, $offset = 0)
  {
    if ($limit > 0) {
      $this->db->limit($limit, $offset);
    }
    if ($order_col != null) {
      $this->db->order_by($order_col, $order);
    } else {
      $this->db->order_by('reserve_id', $order);
    }
    return $this->db->get_where('studio_schedule_reserve', array('reserve' => 1, 'schedule_info_id' => $schedule_info_id))->result();
  }
  
  function get_schedule_wait_list($schedule_info_id, $order_col = null, $order = 'asc', $limit = 0, $offset = 0)
  {
    if ($limit > 0) {
      $this->db->limit($limit, $offset);
    }
    if ($order_col != null) {
      $this->db->order_by($order_col, $order);
    } else {
      $this->db->order_by('reserve_id', $order);
    }
    return $this->db->get_where('studio_schedule_reserve', array('wait' => 1, 'schedule_info_id' => $schedule_info_id))->result();
  }
  
  function get_schedule_cancel_list($schedule_info_id, $order_col = null, $order = 'asc', $limit = 0, $offset = 0)
  {
    if ($limit > 0) {
      $this->db->limit($limit, $offset);
    }
    if ($order_col != null) {
      $this->db->order_by($order_col, $order);
    } else {
      $this->db->order_by('reserve_id', $order);
    }
    return $this->db->get_where('studio_schedule_reserve', array('cancel' => 1, 'schedule_info_id' => $schedule_info_id))->result();
  }
  
  function get_schedule_fail_list($schedule_info_id, $order_col = null, $order = 'asc', $limit = 0, $offset = 0)
  {
    if ($limit > 0) {
      $this->db->limit($limit, $offset);
    }
    if ($order_col != null) {
      $this->db->order_by($order_col, $order);
    } else {
      $this->db->order_by('reserve_id', $order);
    }
    return $this->db->get_where('studio_schedule_reserve', array('fail' => 1, 'schedule_info_id' => $schedule_info_id))->result();
  }
  
  function get_schedule_reserve_info_last($schedule_info_id)
  {
    return $this->db->order_by('reserve_id', 'desc')->limit(1, 0)->get_where('studio_schedule_reserve', array('schedule_info_id' => $schedule_info_id, 'reserve' => 1))->row();
  }
  
  function get_schedule_wait_info_first($schedule_info_id)
  {
    return $this->db->order_by('reserve_id', 'asc')->limit(1, 0)->get_where('studio_schedule_reserve', array('schedule_info_id' => $schedule_info_id, 'wait' => 1))->row();
  }
  
  function get_reserve_info($reserve_id)
  {
    return $this->db->get_where('studio_schedule_reserve', array('reserve_id' => $reserve_id))->row();
  }
  
  function get_reserve_info_user($schedule_info_id, $user_id)
  {
    return $this->db->get_where('studio_schedule_reserve',
      array('schedule_info_id' => $schedule_info_id, 'user_id' => $user_id))->row();
  }
  
  function update_schedule_status($reserve_id, $status)
  {
    $reserve = 0;
    $wait = 0;
    $cancel = 0;
    if ($status == self::TICKETING_STATUS_RESERVE) {
      $reserve = 1;
    } else if ($status == self::TICKETING_STATUS_WAIT) {
      $wait = 1;
    } else if ($status == self::TICKETING_STATUS_CANCEL) {
      $cancel = 1;
      $this->db->set('cancel_at', 'NOW()', false);
    } else {
      return false;
    }
    $this->db->set('reserve', $reserve);
    $this->db->set('wait', $wait);
    $this->db->set('cancel', $cancel);
    $this->db->where('reserve_id', $reserve_id);
    $this->db->update('studio_schedule_reserve');
    return $this->db->affected_rows();
  }

  CONST TICKETING_STATUS_DEFAULT = 0;
  CONST TICKETING_STATUS_RESERVE = 1;
  CONST TICKETING_STATUS_WAIT = 2;
  CONST TICKETING_STATUS_CANCEL = 3;
  function get_ticketing_status_str($status)
  {
    switch ($status) {
      case self::TICKETING_STATUS_RESERVE: return '티켓팅확정';
      case self::TICKETING_STATUS_WAIT: return '입금대기';
      case self::TICKETING_STATUS_CANCEL: return '티켓팅취소';
      case self::TICKETING_STATUS_DEFAULT:
    }
    return '';
  }
  function get_reserve_str()
  {
    return $this->get_ticketing_status_str(self::TICKETING_STATUS_RESERVE);
  }
  function get_wait_str()
  {
    return $this->get_ticketing_status_str(self::TICKETING_STATUS_WAIT);
  }
  function get_cancel_str()
  {
    return $this->get_ticketing_status_str(self::TICKETING_STATUS_CANCEL);
  }
  
}