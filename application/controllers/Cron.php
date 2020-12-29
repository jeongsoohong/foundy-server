<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

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
    log_message('info', '[cron] unregister, para1['.$para1.']');
    $date = date('Y-m-d', strtotime('-7 days'));
    echo $date;
    if ($para1 == 'delete') {
      $query = <<<QUERY
select a.* from user a, user_unregister b where a.user_id=b.user_id and a.unregister=1 and b.unregister_at<'{$date}'
QUERY;
      $result = $this->db->query($query)->result();

      var_dump($result);
//      echo json_encode($result);
    } else {
      log_message('error', '[cron] invalid para1['.$para1.'] for unregister');
    }
  }
  
  public function center($para1 = '', $para2 = '', $para3 = '')
  {
    if ($para1 == 'schedule') {
      
      if ($para2 == 'confirm') {
        
        $duration = 1; // crontab duration(minute)
    
      } else {
        log_message('error', '[cron] invalid para2[' . $para2 . '] for center/schedule');
      }
      
    } else {
      log_message('error', '[cron] invalid para1['.$para1.'] for center');
    }
  }
}
