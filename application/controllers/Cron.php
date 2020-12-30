<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

// remove logs
// 50 14 * * * root /usr/bin/find /web/log/logs/cron-*.log -ctime +7 -exec rm -f {} \;
// 50 14 * * * root /usr/bin/find /web/log/logs/log-*.log -ctime +7 -exec rm -f {} \;
// 50 14 * * * root /usr/bin/find /web/log/mts/alimtalk/common.log.* -ctime +7 -exec rm -f {} \;
// 50 14 * * * root /usr/bin/find /web/log/mts/alimtalk/mms_dbmove.log.* -ctime +7 -exec rm -f {} \;
// 50 14 * * * root /usr/bin/find /web/log/mts/alimtalk/mms_report.log.* -ctime +7 -exec rm -f {} \;
// 50 14 * * * root /usr/bin/find /web/log/mts/alimtalk/mms_send.log.* -ctime +7 -exec rm -f {} \;
// 50 14 * * * root /usr/bin/find /web/log/mts/smsmms/common.log.* -ctime +7 -exec rm -f {} \;
// 50 14 * * * root /usr/bin/find /web/log/mts/smsmms/mms_dbmove.log.* -ctime +7 -exec rm -f {} \;
// 50 14 * * * root /usr/bin/find /web/log/mts/smsmms/mms_report.log.* -ctime +7 -exec rm -f {} \;
// 50 14 * * * root /usr/bin/find /web/log/mts/smsmms/mms_send.log.* -ctime +7 -exec rm -f {} \;
// 50 14 * * * root /usr/bin/find /web/log/mts/smsmms/sms_dbmove.log.* -ctime +7 -exec rm -f {} \;
// 50 14 * * * root /usr/bin/find /web/log/mts/smsmms/sms_report.log.* -ctime +7 -exec rm -f {} \;
// 50 14 * * * root /usr/bin/find /web/log/mts/smsmms/sms_send.log.* -ctime +7 -exec rm -f {} \;

class Cron extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->database();
//    $this->load->library('core/log');
    
    // this controller can only be called from the command line
    if (!$this->input->is_cli_request()) show_error('Direct access is not allowed');
  }
  
  public function unregister($para1 = '')
  {
    // 30 23 * * * root /usr/bin/nohup /usr/bin/php -f /web/public_html/index.php cron unregister delete 2>&1 &
    
    $date = date('Y-m-d', strtotime('-7 days'));
    echo $date;
    if ($para1 == 'delete') {
      $query = <<<QUERY
select a.* from user a, user_unregister b where a.user_id=b.user_id and a.unregister=1 and b.unregister_at<'{$date}'
QUERY;
      $result = $this->db->query($query)->result();
  
      log_message('info', '[cron] unregister, para1['.$para1.'] result['.json_encode($result).']');
//      var_dump($result);
//      echo json_encode($result);
    } else {
      log_message('error', '[cron] invalid para1['.$para1.'] for unregister');
    }
  }
  
  public function center($para1 = '', $para2 = '', $para3 = '', $para4 = '', $para5 = '')
  {
    if ($para1 == 'class') {
      
      if ($para2 == 'reminder') {
        // 클래스 시작 시간 알림톡 전송
        // 0 19 * * * root /usr/bin/php -f /web/public_html/index.php cron center class reminder 19 5 15
        // 0 8 * * * root /usr/bin/php -f /web/public_html/index.php cron center class reminder 8 2 7
        // 0 13 * * * root /usr/bin/php -f /web/public_html/index.php cron center class reminder 13 2 11
        
        $now = date('Y-m-d').' '.$para3.':00:00';
        $start_at = date('Y-m-d H:i:s', strtotime($now) + $para4 * ONE_HOUR);
        $end_at = date('Y-m-d H:i:s', strtotime($now) + $para5 * ONE_HOUR);
        $schedule_date_1 = substr($start_at, 0, 10);
        $schedule_date_2 = substr($end_at, 0, 10);
        $start_time_1 = substr($start_at, 11, 9);
        $start_time_2 = substr($end_at, 11, 9);
        if ($schedule_date_1 != $schedule_date_2) {
          $query = <<<QUERY
select * from center_schedule_info
where (schedule_date='{$schedule_date_1}' and '{$start_time_1}'<=start_time) or
(schedule_date='{$schedule_date_2}' and start_time<'{$start_time_2}') and
activate=1 and reservable=1
QUERY;
        } else {
          $query = <<<QUERY
select * from center_schedule_info
where schedule_date='{$schedule_date_1}' and '{$start_time_1}'<=start_time and start_time<'{$start_time_2}' and
activate=1 and reservable=1
QUERY;
        }
        $classes = $this->db->query($query)->result();
  
        log_message('debug', '[cron] center/class/reminder, now['.$now.'] start_at['.$start_at.
          '] end_at['.$end_at.'] count['.count($classes).']');
  
        foreach ($classes as $class) {
          $center = $this->db->get_where('center', array('center_id' => $class->center_id))->row();
          $reserve_list = $this->center_model->get_schedule_reserve_list($class->schedule_info_id);
          foreach ($reserve_list as $reserve_info) {
            $user_info = $this->db->get_where('user', array('user_id' => $reserve_info->user_id))->row();
            $this->mts_model->send_class_reminder($user_info->phone, $class->schedule_title, $class->schedule_date,
            $center->title, $class->start_time, $class->end_time);
          }
        }
        
      } else if ($para2 == 'update') {
        // 주기적으로 클래스 업데이트 될 때 알림톡 전송(일주일 이내 클래스에 대해서)
        // */15 * * * * root /usr/bin/php -f /web/public_html/index.php cron center class update 15

        $duration = $para3 * ONE_MINUTE; // minute * 60(sec)
        $now = time();
        $now = $now - $now % $duration;
        $schedule_date_1 = date('Y-m-d', $now);
        $schedule_date_2 = date('Y-m-d', $now + ONE_WEEK - 1);
        $start_at = date('Y-m-d H:i:s', $now - $duration);
        $end_at = date('Y-m-d H:i:s', $now - 1);
        $query = <<<QUERY
select distinct(center_id) from center_schedule_info
where '{$schedule_date_1}'<=schedule_date and schedule_date<='{$schedule_date_2}' and
'{$start_at}'<=updated_at and updated_at<='{$end_at}' and activate=1
QUERY;
        $updated_centers = $this->db->query($query)->result();
  
        log_message('debug', '[cron] center/class/update, date1['.$schedule_date_1.'] date2['.$schedule_date_2.
          '] start_at['.$start_at.'] end_at['.$end_at.'] count['.count($updated_centers).'] ids['.json_encode($updated_centers).']');
       
        if (count($updated_centers) > 0) {
          $center_ids = array();
          foreach ($updated_centers as $center) {
            $center_ids[] = $center->center_id;
          }
          $this->db->where('activate', 1);
          $this->db->where_in('center_id', $center_ids);
          $centers = $this->db->get('center')->result();
          foreach ($centers as $center) {
            $users = $this->db->get_where('bookmark_center', array('center_id' => $center->center_id))->result();
            foreach ($users as $user) {
              $user_info = $this->db->get_where('user', array('user_id' => $user->user_id))->row();
              $this->mts_model->send_class_update($user_info->phone, $center->title);
            }
          }
        }
      
      } else if ($para2 == 'wait') {
        // 주기적으로 시작된 클래스에 대해서 대기자 취소
        // */1 * * * * root /usr/bin/php -f /web/public_html/index.php cron center class wait 1

        $duration = $para3 * ONE_MINUTE; // minute * 60(sec)
        $now = time();
        $now = $now - $now % $duration;
        $schedule_date = date('Y-m-d', $now);
        $start_time = date('H:i:s', $now - $duration);
        $end_time = date('H:i:s', $now - 1);
        $query = <<<QUERY
select * from center_schedule_info where schedule_date='{$schedule_date}' and
'{$start_time}'<=start_time and start_time<='{$end_time}' and activate=1 and waitable=1
QUERY;
        $classes = $this->db->query($query)->result();
  
        log_message('debug', '[cron] center/class/wait, duration['.$duration.'] now['.$now.'] date['.$schedule_date.
          '] start_time['.$start_time.'] end_time['.$end_time.'] count['.count($classes).']');
  
        foreach ($classes as $class) {
          $center = $this->db->get_where('center', array('center_id' => $class->center_id))->row();
          $wait_list = $this->center_model->get_schedule_wait_list($class->schedule_info_id);
          foreach ($wait_list as $wait_info) {
            $this->center_model->schedule_cancel($wait_info, $class->schedule_title, $class->schedule_date);
            $user_info = $this->db->get_where('user', array('user_id' => $wait_info->user_id))->row();
            $this->mts_model->send_class_reserve($user_info->phone, CENTER_TICKET_MEMBER_ACTION_RESERVE_CANCEL,
              $class->schedule_title, $class->schedule_date, $center->title,
              $class->start_time, $class->end_time);
          }
        }
  
      } else {
        log_message('error', '[cron] invalid para2[' . $para2 . '] for center/class');
      }
      
    } else {
      log_message('error', '[cron] invalid para1['.$para1.'] for center');
    }
  }
}
