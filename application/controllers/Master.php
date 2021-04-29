<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Master extends CI_Controller
{
  private $page_data = null;
  
  function __construct()
  {
    parent::__construct();
    $this->load->database();
  
    /*cache control*/
    $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    $this->output->set_header('Pragma: no-cache');
  
    if (!$this->input->is_ajax_request()) {
      $this->output->set_header('HTTP/1.0 200 OK');
      $this->output->set_header('HTTP/1.1 200 OK');
      $this->output->set_header('Last-Modified: ' . gmdate('D, d M Y H:i:s', time()) . ' GMT');
      $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
      $this->output->set_header('Cache-Control: post-check=0, pre-check=0');
      $this->output->set_header('Pragma: no-cache');
    }
  
    $this->page_data['control'] = 'master';
    $this->page_data['master_email'] = $this->session->userdata('master_email');
  }
  
  public function server($para1 = '')
  {
    if ($para1 == 'check') {
      $this->load->view('front/others/server_check');
    }
  }
  
  public function error() {
    $msg = '';
    if (isset($_GET['m'])) {
      $msg = $_GET['m'];
    }
    $page = 'master';
    if (isset($_GET['p'])) {
      $page = $_GET['p'];
    }
    $this->page_data['page_name'] = $page;
    $this->page_data['msg'] = $msg;
    $this->load->view('front/others/404_error', $this->page_data);
  }
  
  public function info() {
    $msg = '';
    if (isset($_GET['m'])) {
      $msg = $_GET['m'];
    }
    $page = 'master';
    if (isset($_GET['p'])) {
      $page = $_GET['p'];
    }
    $this->page_data['page_name'] = $page;
    $this->page_data['msg'] = $msg;
    $this->load->view('front/others/info', $this->page_data);
  }
  
  private function redirect_error($msg = '', $page = 'mater') {
    redirect(base_url().'studio/error?m='.$msg.'&p='.$page);
  }
  
  private function redirect_info($msg = '', $page = 'master') {
    redirect(base_url().'studio/info?m='.$msg.'&p='.$page);
  }
  
  private function response($result) {
    echo json_encode($result);
    exit;
  }
  
  private function alert_exit($msg, $relocate = '') {
    $echo = "<script>";
    $echo .= "alert('{$msg}');";
    if (isset($relocate) && !empty($relocate)) {
      $echo .= "window.location.href='{$relocate}';";
    }
    $echo .="</script>";
    echo $echo;
    exit;
  }
  
  public function login($para1 = '', $para2 = '')
  {
    // for login
//    $this->page_data['control'] = "master";
    
    if ($para1 == 'forget_form') {
      
      $this->load->view('back/forget_password', $this->page_data);
      
    } else if ($para1 == 'send_approval') {
      
      $this->load->library('form_validation');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
      if ($this->form_validation->run() == FALSE) {
        echo validation_errors();
      } else {
        
        $email = $this->input->post('email');
        $user_data = $this->db->get_where('user', array('email' => $email))->row();
        if (!isset($user_data) && empty($user_data) == true) {
          echo '존재하지 않는 이메일입니다!';
          exit;
        }
        
        if (!($user_data->user_type & USER_TYPE_ADMIN)) {
          echo '어드민 권한이 없습니다!';
          exit;
        }
        
        $code = rand(111111, 999999);
        
        if ($this->email_model->get_user_approval_code_data($code, $email)) {
          
          $this->session->set_userdata('master_approval_email', $email);
          $this->session->set_userdata('master_approval_code', $code);
          echo 'done';
        } else {
          echo '이메일 전송에 문제가 발생했습니다!';
        }
      }
      
    } else if ($para1 == 'approval') {
      
      if ($para2 == 'email') {
        
        if (isset($_POST['email']) == false) {
          $result['status'] = 'fail';
          $result['message'] = '이메일이 올바르지 않습니다! 다시 확인 바랍니다!';
          $this->response($result);
        }
        if (isset($_POST['email']) == false) {
          $result['status'] = 'fail';
          $result['message'] = '인증코드가 올바르지 않습니다! 다시 확인 바랍니다!';
          $this->response($result);
        }
        
        $email = $this->input->post('email');
        $code = $this->input->post('approval_code');
        
        $approval_email = $this->session->userdata('master_approval_email');
        $approval_code = $this->session->userdata('master_approval_code');
        
        if ($email != $approval_email) {
          $result['status'] = 'fail';
          $result['message'] = '이메일이 올바르지 않습니다! 다시 확인 바랍니다!';
          $this->response($result);
        }
        if ($code != $approval_code) {
          $result['status'] = 'fail';
          $result['message'] = '인증코드가 올바르지 않습니다! 다시 확인 바랍니다!';
          $this->response($result);
        }
        
        $user_data = $this->db->get_where('user', array('email' => $email))->row();
        if (!isset($user_data) && empty($user_data) == true) {
          $result['status'] = 'fail';
          $result['message'] = '회원 정보가 존재하지 않습니다!';
          $this->response($result);
        }
        
        if (!($user_data->user_type & USER_TYPE_ADMIN)) {
          $result['status'] = 'fail';
          $result['message'] = '어드민 권한이 없습니다!';
          $this->response($result);
        }
        
        $password = substr(hash('sha512', rand()), 0, 12);
        $data['password'] = sha1($password);
        $this->db->where('email', $email);
        $this->db->update('user', $data);
        
        if ($this->email_model->get_reset_pw_data($email, $password)) {
          $result['status'] = 'done';
          $result['message'] = '비밀번호가 전송되었습니다! 비밀번호 확인 후 로그인해주세요!';
          $this->response($result);
        } else {
          $result['status'] = 'fail';
          $result['message'] = '이메일 전송에 실패하였습니다!';
          $this->response($result);
        }
        
      } else if ($para2 == 'mobile') {
        
        if (isset($_GET['sid']) == false || isset($_GET['aid']) == false || isset($_GET['fid']) == false) {
          $this->redirect_error('접근 오류가 발생하였습니다!', 'close');
        }
        
        $session_id = $_GET['sid'];
        $auth_id = $_GET['aid'];
        $for = $_GET['fid'];
        
        $auth= $this->db->get_where('user_auth', array('auth_id' => $auth_id))->row();
        if (isset($auth) == false || empty($auth) == true) {
          $this->redirect_error('접근 오류가 발생하였습니다!(1)', 'close');
        }
        if ($auth->session_id != $session_id) {
          $this->redirect_error('접근 오류가 발생하였습니다!(2)', 'close');
        }
        if ($auth->for != $for || $for != 'master_forget_passwd') {
          $this->redirect_error('접근 오류가 발생하였습니다!(3)', 'close');
        }
        
        $auth_data = json_decode($auth->auth_data);
        $user_data = $this->db->get_where('user', array('phone' => $auth_data->mobileno))->row();
        if (!isset($user_data) && empty($user_data) == true) {
          $this->redirect_error('회원 정보가 존재하지 않습니다!', 'close');
        }
        
        if (!($user_data->user_type & USER_TYPE_ADMIN)) {
          $this->redirect_error('어드민 권한이 없습니다!', 'close');
        }
        
        $password = substr(hash('sha512', rand()), 0, 12);
        $data['password'] = sha1($password);
        $this->db->where('phone', $user_data->phone);
        $this->db->update('user', $data);
        
        if ($this->mts_model->send_user_passwd($user_data->phone, $user_data->email, $password) > 0) {
          $this->redirect_info('비밀번호가 전송되었습니다!<br> 문자메세지 확인 후 로그인해주세요!', 'close');
        } else {
          $this->redirect_error('문자전송에 실패하였습니다!', 'close');
        }
        
      } else {
        $this->redirect_error('접근 오류가 발생하였습니다!', 'close');
      }
      
    } else { // login
      $this->load->library('form_validation');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
      $this->form_validation->set_rules('password', 'Password', 'required');
      
      if ($this->form_validation->run() == FALSE) {
        echo validation_errors();
      } else {
        $password = sha1($this->input->post('password'));
        $email = $this->input->post('email');

//                $query = <<<QUERY
//UPDATE user set password='{$password}',user_type=user_type+{$user_type} where email='{$email}'
//QUERY;
//                $this->db->query($query);
        
        $query = <<<QUERY
SELECT * from user where email='{$email}'
QUERY;
        $user_data = $this->db->query($query)->row();
        if (empty($user_data) == false) {
          if (!($user_data->user_type & USER_TYPE_ADMIN)) {
            echo 'login_failed : not admin user';
          } else {
            if ($user_data->password != $password) {
              echo 'login_failed : incorrect password';
              exit;
            }
            $this->session->set_userdata('master_login', 'yes');
            $this->session->set_userdata('master_id', $user_data->user_id);
            $this->session->set_userdata('master_email', $user_data->email);
            
            echo 'lets_login';
          }
        } else {
          echo 'login_failed : incorrect email';
        }
      }
    }
  }
  
  /* Loging out from Admin panel */
  function logout()
  {
    // for login
//    $this->page_data['control'] = "master";
    
    //$this->session->sess_destroy();
    $this->session->set_userdata('master_login', 'no');
    redirect(base_url() . 'master', 'refresh');
  }
  
  /* Checking Login Stat */
  private function is_logged()
  {
    if ($this->session->userdata('master_login') == 'yes') {
      return true;
    } else {
      return false;
    }
  }
  
  public function index()
  {
    if ($this->is_logged() == false) {
      $this->load->view('back/login', $this->page_data);
    } else {
 
      // 현재 접속자(1hour)
      $date = date('Y-m-d H:i:d', time() - ONE_HOUR);
      $this->db->select('count(distinct(user_id)) as cnt');
      $this->db->where("active_at>='{$date}' and user_id is not null");
      $user1  = $this->db->get('user_active')->row()->cnt;
 
      // 일일 접속자
      $date = date('Y-m-d');
      $this->db->select('count(distinct(user_id)) as cnt');
      $this->db->where("active_at>='{$date}' and user_id is not null");
      $user2  = $this->db->get('user_active')->row()->cnt;
  
      // 이달 접속자
      $date = date('Y-m');
      $this->db->select('count(distinct(user_id)) as cnt');
      $this->db->where("active_at>='{$date}' and user_id is not null");
      $user3  = $this->db->get('user_active')->row()->cnt;
 
      // 당일 예약 신청 현황
      $date = date('Y-m-d');
      $this->db->select('count(*) as cnt');
      $this->db->where("register_at>='{$date}' and wait = 1");
      $online_reserve1 = $this->db->get('studio_schedule_reserve')->row()->cnt;
  
      // 당일 예약 확정 현황
      $date = date('Y-m-d');
      $this->db->select('count(*) as cnt');
      $this->db->where("register_at>='{$date}' and reserve = 1");
      $online_reserve2 = $this->db->get('studio_schedule_reserve')->row()->cnt;
  
      // 당월 예약 신청/확정 현황
      $date = date('Y-m');
      $this->db->select('count(*) as cnt');
      $this->db->where("register_at>='{$date}' and (wait = 1 or reserve=1)");
      $online_reserve3 = $this->db->get('studio_schedule_reserve')->row()->cnt;
  
      // 승인대기 센터
      $approval = APPROVAL_DATA_INACTIVATE;
      $this->db->select('count(*) as cnt');
      $this->db->where("activate={$approval}");
      $center1 = $this->db->get('center')->row()->cnt;
  
      // 등록완료 (당일)
      $date = date('Y-m-d');
      $approval = APPROVAL_DATA_ACTIVATE;
      $this->db->select('count(*) as cnt');
      $this->db->where("activate={$approval} and approval_at>='{$date}'");
      $center2 = $this->db->get('center')->row()->cnt;
  
      // 등록완료 (당일)
      $approval = APPROVAL_DATA_ACTIVATE;
      $this->db->select('count(*) as cnt');
      $this->db->where("activate={$approval}");
      $center3 = $this->db->get('center')->row()->cnt;
  
      // 승인대기 센터
      $approval = APPROVAL_DATA_INACTIVATE;
      $this->db->select('count(*) as cnt');
      $this->db->where("activate={$approval}");
      $teacher1 = $this->db->get('teacher')->row()->cnt;
  
      // 등록완료 (당일)
      $date = date('Y-m-d');
      $approval = APPROVAL_DATA_ACTIVATE;
      $this->db->select('count(*) as cnt');
      $this->db->where("activate={$approval} and approval_at>='{$date}'");
      $teacher2 = $this->db->get('teacher')->row()->cnt;
  
      // 등록완료 (당일)
      $approval = APPROVAL_DATA_ACTIVATE;
      $this->db->select('count(*) as cnt');
      $this->db->where("activate={$approval}");
      $teacher3 = $this->db->get('teacher')->row()->cnt;
  
      // 승인대기 센터
      $approval = APPROVAL_DATA_INACTIVATE;
      $this->db->select('count(*) as cnt');
      $this->db->where("activate={$approval}");
      $studio1 = $this->db->get('studio')->row()->cnt;
  
      // 등록완료 (당일)
      $date = date('Y-m-d');
      $approval = APPROVAL_DATA_ACTIVATE;
      $this->db->select('count(*) as cnt');
      $this->db->where("activate={$approval} and approval_at>='{$date}'");
      $studio2 = $this->db->get('studio')->row()->cnt;
  
      // 등록완료 (당일)
      $approval = APPROVAL_DATA_ACTIVATE;
      $this->db->select('count(*) as cnt');
      $this->db->where("activate={$approval}");
      $studio3 = $this->db->get('studio')->row()->cnt;
      
      // 일일 주문 건수
      $date = date('Y-m-d');
      $this->db->select('count(distinct(purchase_code)) as cnt');
      $this->db->where("purchase_at>='{$date}'");
      $sales1 = $this->db->get('shop_purchase_product')->row()->cnt;
  
      // 당월 주문 건수
      $date = date('Y-m');
      $this->db->select('count(distinct(purchase_code)) as cnt');
      $this->db->where("purchase_at>='{$date}'");
      $sales2 = $this->db->get('shop_purchase_product')->row()->cnt;
      
      // 월 발생매출
      $date = date('Y-m');
      $this->db->select('sum(total_balance - cancel_price) as sum');
      $this->db->where("purchase_at>='{$date}'");
      $sales3 = $this->db->get('shop_purchase_product')->row()->sum;
      
      // 승인대기 제품
      $status = SHOP_PRODUCT_STATUS_REQUEST;
      $this->db->select('count(*) as cnt');
      $this->db->where("status={$status}");
      $shop1 = $this->db->get('shop_product_id')->row()->cnt;
      
      // 판매중 상품
      $status = SHOP_PRODUCT_STATUS_ON_SALE;
      $this->db->select('count(*) as cnt');
      $this->db->where("status={$status}");
      $shop2 = $this->db->get('shop_product_id')->row()->cnt;
      
      // 판매중지 상품
      $status = SHOP_PRODUCT_STATUS_REJECT;
      $status2 = SHOP_PRODUCT_STATUS_STOP_SALE;
      $status3 = SHOP_PRODUCT_STATUS_FINISH_SALE;
      $this->db->select('count(*) as cnt');
      $this->db->where("status={$status} or status={$status2} or status={$status3}");
      $shop3 = $this->db->get('shop_product_id')->row()->cnt;
      
      // 브랜드 미확인 주문건
      $status = SHOP_SHIPPING_STATUS_ORDER_COMPLETED;
      $this->db->select('count(*) as cnt');
      $this->db->where("shipping_status={$status}");
      $shop4 = $this->db->get('shop_purchase_product')->row()->cnt;
      
      // 브랜드 미확인 C/S
      $replied = 0;
      $this->db->select('count(*) as cnt');
      $this->db->where("replied={$replied}");
      $shop5 = $this->db->get('shop_product_qna')->row()->cnt;
      
      // 1:1 문의
      $this->db->select('count(*) as cnt');
      $shop6 = $this->db->get('shop_product_qna')->row()->cnt;
      
      // 매출 상세 현황(당일)
      $balances1 = array(0,0,0,0,0,0,0,0,0,0,0);
      $sales_cnt1 = array(0,0,0,0,0,0,0,0,0,0,0);
      $date = date('Y-m-d');
      $this->db->select('total_balance,cancel_price,shipping_status');
      $this->db->where("purchase_at>='{$date}'");
      $purchase_products = $this->db->get('shop_purchase_product')->result();
      foreach ($purchase_products as $product) {
        $balances1[$product->shipping_status] += $product->total_balance;
        $sales_cnt1[$product->shipping_status] += 1;
      }
  
      // 매출 상세 현황(당월)
      $balances2 = array(0,0,0,0,0,0,0,0,0,0,0);
      $sales_cnt2 = array(0,0,0,0,0,0,0,0,0,0,0);
      $date = date('Y-m');
      $this->db->select('total_balance,cancel_price,shipping_status');
      $this->db->where("purchase_at>='{$date}'");
      $purchase_products = $this->db->get('shop_purchase_product')->result();
      foreach ($purchase_products as $product) {
        $balances2[$product->shipping_status] += $product->total_balance;
        $sales_cnt2[$product->shipping_status] += 1;
      }
  
      // 매출 상세 현황(전월)
      $balances3 = array(0,0,0,0,0,0,0,0,0,0,0);
      $sales_cnt3 = array(0,0,0,0,0,0,0,0,0,0,0);
      $date1 = date('Y-m');
      $date2 = date('Y-m', strtotime($date1.'-01') - ONE_DAY);
      $this->db->select('total_balance,cancel_price,shipping_status');
      $this->db->where("purchase_at>='{$date2}' and purchase_at<'{$date1}'");
      $purchase_products = $this->db->get('shop_purchase_product')->result();
      foreach ($purchase_products as $product) {
        $balances3[$product->shipping_status] += $product->total_balance;
        $sales_cnt3[$product->shipping_status] += 1;
      }
      
      $this->page_data['user1'] = $user1;
      $this->page_data['user2'] = $user2;
      $this->page_data['user3'] = $user3;
      $this->page_data['online_reserve1'] = $online_reserve1;
      $this->page_data['online_reserve2'] = $online_reserve2;
      $this->page_data['online_reserve3'] = $online_reserve3;
      $this->page_data['center1'] = $center1;
      $this->page_data['center2'] = $center2;
      $this->page_data['center3'] = $center3;
      $this->page_data['teacher1'] = $teacher1;
      $this->page_data['teacher2'] = $teacher2;
      $this->page_data['teacher3'] = $teacher3;
      $this->page_data['studio1'] = $studio1;
      $this->page_data['studio2'] = $studio2;
      $this->page_data['studio3'] = $studio3;
      $this->page_data['sales1'] = $sales1;
      $this->page_data['sales2'] = $sales2;
      $this->page_data['sales3'] = $sales3;
      $this->page_data['shop1'] = $shop1;
      $this->page_data['shop2'] = $shop2;
      $this->page_data['shop3'] = $shop3;
      $this->page_data['shop4'] = $shop4;
      $this->page_data['shop5'] = $shop5;
      $this->page_data['shop6'] = $shop6;
      $this->page_data['balances1'] = $balances1;
      $this->page_data['balances2'] = $balances2;
      $this->page_data['balances3'] = $balances3;
      $this->page_data['sales_cnt1'] = $sales_cnt1;
      $this->page_data['sales_cnt2'] = $sales_cnt2;
      $this->page_data['sales_cnt3'] = $sales_cnt3;
      $this->page_data['page_name'] = 'home';
      $this->load->view('back/master/index', $this->page_data);
    
    }
  }

  public function manage($p1 = '', $p2 = '', $p3 = '')
  {
    if ($this->is_logged() == false) {
      $this->load->view('back/login', $this->page_data);
    } else {
 
      $this->page_data['page_name'] = 'manage';
      $this->load->view('back/master/index', $this->page_data);
    
    }
    
  }
}
