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
  
    $now = time();
    if (SERVER_CHECK == true &&
      strtotime(SERVER_CHECK_START) < $now && $now < strtotime(SERVER_CHECK_END)) {
      if ($this->uri->segment(2) != 'server' && $this->uri->segment(3) != 'check') {
        redirect(base_url().'master/server/check');
      }
    }
  
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
  
  private function redirect_error($msg = '', $page = 'master') {
    redirect(base_url().'studio/error?m='.$msg.'&p='.$page);
  }
  
  private function redirect_info($msg = '', $page = 'master') {
    redirect(base_url().'studio/info?m='.$msg.'&p='.$page);
  }
  
  private function response($result) {
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
    exit;
  }
  
  private function response2($status, $msg = '', $redirect = '') {
    $result['status'] = $status;
    if ($status == 'done' && $msg == '') {
      $msg = '성공하였습니다!';
    }
    $result['message'] = $msg;
    $result['redirect'] = $redirect;
    $this->response($result);
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
      $sales3 = ($sales3 ? $sales3 : 0);
      
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
      redirect(base_url().'master');
    }

    if ($p1 == 'page') {
      
      if ($p2 == 'btn') {
  
        if (isset($_GET['tab']) == false || empty($_GET['tab']) == true) {
          $this->redirect_error('잘못된 접근입니다.');
        }
        if (isset($_GET['page']) == false || empty($_GET['page']) == true) {
          $this->redirect_error('잘못된 접근입니다.');
        }
  
        $page = $_GET['page'];
        
        $tab = $_GET['tab'];
        if ($tab == 'coupon') {
          $coupon_type = COUPON_TYPE_DEFAULT;
          $where = "coupon_type>{$coupon_type}";
          $total = $this->coupon_model->get_server_coupon_list_cnt($page, $where);
          $page_size = $this->coupon_model::COUPON_LIST_PAGE_SIZE;
        }
        
        $this->page_data['tab'] = $tab;
        $this->page_data['total'] = $total;
        $this->page_data['page_size'] = $page_size;
        $this->page_data['page'] = $page;
        $this->load->view('back/master/manage_page_btn', $this->page_data);
      
      } else { // page
  
        if (isset($_GET['tab']) == false || empty($_GET['tab']) == true) {
          $this->redirect_error('잘못된 접근입니다.');
        }
  
        $tab = $_GET['tab'];
        $this->load->view('back/master/manage_' . $tab, $this->page_data);
      
      }
  
    } else if ($p1 == 'shop') {
  
      if ($p2 == 'join') {
    
        if (isset($_POST['ids']) == false || empty($_POST['ids']) == true) {
          $this->response2('fail', '잘못된 접근입니다.(ids)');
        }
    
        if (isset($_POST['type']) == false || empty($_POST['type']) == true) {
          $this->response2('fail', '잘못된 접근입니다.(type)');
        }
    
        if (isset($_POST['mode']) == false || empty($_POST['mode']) == true) {
          $this->response2('fail', '잘못된 접근입니다.(mode)');
        }
    
        $type = $_POST['type'];
        if ($type != 'best' && $type != 'new' && $type != 'recommend' &&
          $type != 'yoga' && $type != 'vegan' && $type != 'healing') {
          $this->response2('fail', '잘못된 접근입니다.(type:'.$type.')');
        }
    
        if ($type == 'yoga') {
          $cat = '01';
          $type = 'best2';
        } else if ($type == 'vegan') {
          $cat = '02';
          $type = 'best2';
        } else if ($type == 'healing') {
          $cat = '03';
          $type = 'best2';
        } else { // shop main (best, new, recommend)
          $cat = null;
        }
    
        $mode = $_POST['mode'];
        if ($mode != 'add' && $mode != 'del') {
          $this->response2('fail', '잘못된 접근입니다.(mode:' . $mode . ')');
        }
    
        $ids = json_decode($_POST['ids']);
        foreach ($ids as $product_id) {
          $product = $this->db->get_where('shop_product_id', array('product_id' => $product_id))->row();
          if (isset($product) == false || empty($product) == true) {
            $this->response2('fail', '잘못된 접근입니다.(product_id:' . $product_id . ')');
          }
          if ($mode == 'add' && $product->{$type} > 0) {
            $this->response2('fail', '이미 추가된 상품이 포함되었습니다.(product_code:' . $product->product_code. ')');
          }
          if ($mode == 'del' && $product->{$type} == 0) {
            $this->response2('fail', '이미 추가된 삭제이 포함되었습니다.(product_code:' . $product->product_code. ')');
          }
      
        }
    
        if ($mode == 'add') {
          $status = SHOP_PRODUCT_STATUS_ON_SALE;
          $this->db->select("max({$type}) as max");
          $this->db->where("{$type}>0 and status={$status}");
          if ($cat != null) {
            $this->db->where("product_code like '{$cat}%'");
          }
          $value = $this->db->get('shop_product_id')->row()->max;
      
          foreach ($ids as $product_id) {
            $value++;
            $this->db->set($type, $value);
            $this->db->where('product_id', $product_id);
            $this->db->update('shop_product_id');
          }
      
          $this->response2('done', '추가되었습니다.');
        } else {
          $this->db->set($type, '0');
          $this->db->where_in('product_id', $ids);
          $this->db->update('shop_product_id');
      
          $this->response2('done', '삭제되었습니다.');
        }
    
      } else if ($p2 == 'order') {
  
          if (isset($_POST['type']) == false || empty($_POST['type']) == true) {
            $this->response2('fail', '잘못된 접근입니다.(type)');
          }
  
          if (isset($_POST['mode']) == false || empty($_POST['mode']) == true) {
            $this->response2('fail', '잘못된 접근입니다.(mode)');
          }
          
          if (isset($_POST['pid']) == false || empty($_POST['pid']) == true) {
            $this->response2('fail', '잘못된 접근입니다.(pid)');
          }
  
          $type = $_POST['type'];
          if ($type != 'best' && $type != 'new' && $type != 'recommend' &&
            $type != 'yoga' && $type != 'vegan' && $type != 'healing') {
            $this->response2('fail', '잘못된 접근입니다.(type:'.$type.')');
          }
  
          if ($type == 'yoga') {
            $cat = '01';
            $type = 'best2';
          } else if ($type == 'vegan') {
            $cat = '02';
            $type = 'best2';
          } else if ($type == 'healing') {
            $cat = '03';
            $type = 'best2';
          } else { // sho main (best, new, recommend)
            $cat = null;
          }
          
          $mode = $_POST['mode'];
          if ($mode != 'up' && $mode != 'down') {
            $this->response2('fail', '잘못된 접근입니다.(mode:' . $mode . ')');
          }

          $pid = $_POST['pid'];
          $product = $this->db->get_where('shop_product_id', array('product_id' => $pid))->row();
          if (isset($product) == false || empty($product) == true) {
            $this->response2('fail', '잘못된 접근입니다.(pid:' . $pid. ')');
          }
          
          if ($product->{$type} == 0) {
            $this->response2('fail', '메인에 등록되지 않은 아이템입니다.(pid:' . $pid. ',type:'.$type.')');
          }
         
          $status = SHOP_PRODUCT_STATUS_ON_SALE;
          if ($mode == 'up') {
            $this->db->limit(1);
            $this->db->order_by($type, 'desc');
            $this->db->where("{$type}>0 and {$type}<{$product->{$type}} and status={$status}");
            if ($cat != null) {
              $this->db->where("product_code like '{$cat}%'");
            }
            $product2 = $this->db->get('shop_product_id')->row();
            if (isset($product2) == false || empty($product2) == true) {
              $this->response2('fail', '이미 최상위 상품입니다.');
            }
          } else { // down
            $this->db->limit(1);
            $this->db->order_by($type, 'asc');
            $this->db->where("{$type}>{$product->{$type}} and status={$status}");
            if ($cat != null) {
              $this->db->where("product_code like '{$cat}%'");
            }
            $product2 = $this->db->get('shop_product_id')->row();
            if (isset($product2) == false || empty($product2) == true) {
              $this->response2('fail', '이미 최하위 상품입니다.');
            }
          }
          
          $this->db->set($type, $product->{$type});
          $this->db->where('product_id', $product2->product_id);
          $this->db->update('shop_product_id');
  
          $this->db->set($type, $product2->{$type});
          $this->db->where('product_id', $product->product_id);
          $this->db->update('shop_product_id');
  
          $this->response2('done', '성공하였습니다.');
  
      } else if ($p2 == 'search') {
  
        if (isset($_GET['brand']) == false || empty($_GET['brand']) == true) {
          $this->response2('fail', '잘못된 접근입니다.(type)');
        }
  
        if (isset($_GET['order']) == false || empty($_GET['order']) == true) {
          $this->response2('fail', '잘못된 접근입니다.(order)');
        }
  
        if (isset($_GET['type']) == false || empty($_GET['type']) == true) {
          $this->response2('fail', '잘못된 접근입니다.(type)');
        }
  
        $category = 'all';
        if (isset($_GET['cat']) == true && empty($_GET['cat']) == false) {
          $category = $_GET['cat'];
        }
  
        $type = $_GET['type'];
        if ($type != 'best' && $type != 'new' && $type != 'recommend' &&
          $type != 'yoga' && $type != 'vegan' && $type != 'healing') {
          $this->response2('fail', '잘못된 접근입니다.(type:'.$type.')');
        }
  
        $order_col = $_GET['order'];
        if ($order_col != 'new' && $order_col != 'sell') {
          $this->response2('fail', '잘못된 접근입니다.(order_col:'.$order_col.')');
        }
  
        if ($order_col == 'new') {
          $order_col = 'register_at'; // 최신순
        } else {
          $order_col = 'sell'; // 판매량순
        }
  
        $shop_name = $_GET['brand'];
        $shop = $this->db->get_where('shop', array('shop_name' => $shop_name))->row();
        if (isset($shop) == false || empty($shop) == true) {
          $this->response2('fail', '해당 브랜드가 존재하지 않습니다.');
        }
  
        $status = SHOP_PRODUCT_STATUS_ON_SALE;
        $product_list = $this->crud_model->get_product_list($shop->shop_id, $status, null, $category, 0, 100, 'desc', $order_col);
        if (isset($product_list) == false || empty($product_list) || count($product_list) == 0) {
          $this->response2('fail', '해당 브랜드의 판매중인 상품이 존재하지 않습니다.');
        }
  
        $this->page_data['type'] = $type;
        $this->page_data['ordering'] = false;
        $this->page_data['product_list'] = $product_list;
        $this->load->view('back/master/manage_shop_list', $this->page_data);
  
      } else if ($p2 == 'list') {
  
        if (isset($_GET['type']) == false || empty($_GET['type']) == true) {
          $this->response2('fail', '잘못된 접근입니다.(type)');
        }
        
        $category = 'all';
        if (isset($_GET['cat']) == true && empty($_GET['cat']) == false) {
          $category = $_GET['cat'];
        }
        
        $page = 1;
        $order = 'asc';
        $limit = 100;
        $offset = ($page - 1) * $limit;
        $status = SHOP_PRODUCT_STATUS_ON_SALE;
 
        $type = $_GET['type'];
        $order_col = $type;
        if ($type != 'best' && $type != 'new' && $type != 'recommend' &&
          $type != 'yoga' && $type != 'vegan' && $type != 'healing') {
          $this->response2('fail', '잘못된 접근입니다.(type:'.$type.')');
        }
        
        if ($type == 'yoga' || $type == 'vegan' || $type == 'healing') {
          $order_col = 'best2';
        }
  
        $product_list = $this->crud_model->get_product_list(0, $status, null, $category, $offset, $limit, $order, $order_col);
  
        $this->page_data['type'] = $type;
        $this->page_data['ordering'] = true;
        $this->page_data['product_list'] = $product_list;
        $this->load->view('back/master/manage_shop_list', $this->page_data);
  
      } else {
        $this->response2('fail', '잘못된 접근입니다.');
      }
  
    } else if ($p1 == 'coupon') {
  
      if ($p2 == 'add') {
    
        $coupon = $this->db->get_where('server_coupon', array('coupon_type' => COUPON_TYPE_DEFAULT))->row();
        if (empty($coupon) == true) {
          $ins = array(
            'activate' => 0,
            'user_type' => COUPON_USER_TYPE_DEFAULT,
            'coupon_type' => COUPON_TYPE_DEFAULT,
            'coupon_benefit' => 0,
            'coupon_title' => '',
            'coupon_desc' => '',
            'coupon_img_url' => '',
          );
          $this->db->set('start_at', 'NOW()', false);
          $this->db->set('end_at', 'NOW()', false);
          $this->db->set('use_at', 'NOW()', false);
      
          $this->db->insert('server_coupon', $ins);
      
          $coupon_id = $this->db->insert_id();
        } else {
          $coupon_id = $coupon->coupon_id;
        }
        $coupon = $this->db->get_where('server_coupon', array('coupon_id' => $coupon_id))->row();
  
        $page_data['type'] = 'add';
        $page_data['coupon'] = $coupon;
        $this->load->view('back/master/manage_coupon_mod', $page_data);
    
      } else if ($p2 == 'do_add') {
    
        $coupon_id = $_POST['id'];
    
        $data['activate'] = 0;
        $data['coupon_title'] = $this->input->post('coupon_title');
        $data['user_type'] = $this->input->post('user_type');
        $data['coupon_count'] = $this->input->post('coupon_count');
        $data['coupon_type'] = $this->input->post('coupon_type');
        $data['coupon_benefit'] = $this->input->post('coupon_benefit');
        $data['coupon_desc'] = $this->input->post('coupon_desc');
        $data['start_at'] = date('Y-m-d H:i:s', strtotime($this->input->post('start_at')));
        $data['end_at'] = date('Y-m-d H:i:s', strtotime($this->input->post('end_at')));
        $data['use_at'] = date('Y-m-d H:i:s', strtotime($this->input->post('use_at')));
    
        if ($data['user_type'] == COUPON_USER_TYPE_DEFAULT || $data['coupon_type'] == COUPON_TYPE_DEFAULT) {
          $this->response2('fail', '유저 / 쿠폰 타입을 정확히 입력해 주세요.');
        }
    
        if ($data['user_type'] == COUPON_USER_TYPE_SHOP_PURCHASING) {
          if ($data['coupon_count'] > 0) {
            $this->response2('fail', $this->coupon_model->get_coupon_user_type_str(COUPON_USER_TYPE_SHOP_PURCHASING).
              '은 쿠폰수 0(무제한 쿠폰)만 가능합니다.');
          }
          if ($data['coupon_type'] == COUPON_TYPE_SHOP_DISCOUNT_PERCENT || $data['coupon_type'] == COUPON_TYPE_SHOP_DISCOUNT_PRICE) {
            $this->response2('fail', $this->coupon_model->get_coupon_user_type_str(COUPON_USER_TYPE_SHOP_PURCHASING).
              '은'.$this->coupon_model->get_coupon_type_str(COUPON_TYPE_SHOP_FREE_SHIPPING).' 타입만 가능합니다.');
          }
        }
    
        if ($data['user_type'] == COUPON_USER_TYPE_REGISTER) {
          if ($data['coupon_type'] == COUPON_TYPE_SHOP_FREE_SHIPPING) {
            $this->response2('fail', $this->coupon_model->get_coupon_user_type_str(COUPON_USER_TYPE_REGISTER).
              '은'.$this->coupon_model->get_coupon_type_str(COUPON_TYPE_SHOP_FREE_SHIPPING).' 타입이 불가능합니다.');
          }
        }
    
        if ($data['user_type'] == COUPON_USER_TYPE_CENTER ||
          $data['user_type'] == COUPON_USER_TYPE_TEACHER /* || $data['user_type'] == COUPON_USER_TYPE_CENTER_TEACHER */
        ) {
          if ($data['coupon_count'] > 0) {
            $this->response2('fail', $this->coupon_model->get_coupon_user_type_str($data['user_type']).
              '은 쿠폰수 0(무제한 쿠폰)만 가능합니다.');
          }
          if ($data['coupon_type'] == COUPON_TYPE_SHOP_FREE_SHIPPING) {
            $this->response2('fail', $this->coupon_model->get_coupon_user_type_str($data['user_type']).
              '은'.$this->coupon_model->get_coupon_type_str(COUPON_TYPE_SHOP_FREE_SHIPPING).' 타입이 불가능합니다.');
          }
        }
    
        $where = array('coupon_id' => $coupon_id);
        $this->db->update('server_coupon', $data, $where);

//      $coupon_desc= $this->input->post('coupon_desc');
//      $files = 'coupon_'.$coupon_id.'_*.*';
//      $this->crud_model->del_upload_image(IMG_WEB_PATH_SERVER, IMG_PATH_SERVER, $coupon_desc, $files);
    
        // register server notice
        if ($data['user_type'] == COUPON_USER_TYPE_CENTER ||
          $data['user_type'] == COUPON_USER_TYPE_TEACHER /* || COUPON_USER_TYPE_CENTER_TEACHER */
        ) {
          $this->notice_model->register(SERVER_NOTICE_TYPE_COUPON, $coupon_id, $data['coupon_title']);
        }
  
        $this->response2('done', '성공하였습니다.');

      } elseif ($p2 == 'mod') {
    
        $coupon_id = $_GET['id'];
        $coupon = $this->db->get_where('server_coupon', array('coupon_id' => $coupon_id))->row();
        
        $page_data['type'] = 'mod';
        $page_data['coupon'] = $coupon;
        $this->load->view('back/master/manage_coupon_mod', $page_data);
    
      } elseif ($p2 == 'do_mod') {
    
        $coupon_id = $_POST['id'];
    
        $data['coupon_title'] = $this->input->post('coupon_title');
        $data['user_type'] = $this->input->post('user_type');
        $data['coupon_count'] = $this->input->post('coupon_count');
        $data['coupon_type'] = $this->input->post('coupon_type');
        $data['coupon_benefit'] = $this->input->post('coupon_benefit');
        $data['coupon_desc'] = $this->input->post('coupon_desc');
        $data['start_at'] = date('Y-m-d H:i:s', strtotime($this->input->post('start_at')));
        $data['end_at'] = date('Y-m-d H:i:s', strtotime($this->input->post('end_at')));
        $data['use_at'] = date('Y-m-d H:i:s', strtotime($this->input->post('use_at')));
    
        if ($data['user_type'] == COUPON_USER_TYPE_DEFAULT || $data['coupon_type'] == COUPON_TYPE_DEFAULT) {
          $this->response2('fail', '유저 / 쿠폰 타입을 정확히 입력해 주세요.');
        }
    
        $where = array('coupon_id' => $coupon_id);
        $this->db->update('server_coupon', $data, $where);

//      $coupon_desc= $this->input->post('coupon_desc');
//      $files = 'coupon_'.$coupon_id.'_*.*';
//      $this->crud_model->del_upload_image(IMG_WEB_PATH_SERVER, IMG_PATH_SERVER, $coupon_desc, $files);
  
        $this->response2('done', '성공하였습니다.');

//      } else if ($p2 == 'upload_image') {
//        $coupon_id = $para2;
//
//        if (isset($_FILES["file"])) {
//          $error = $this->crud_model->file_validation($_FILES['file'], false);
//          if ($error != UPLOAD_ERR_OK) {
//            echo json_encode(array('success' => false, 'error' => $error));
//          } else {
//            $time = gettimeofday();
//            $file_name = 'coupon_' . $coupon_id . '_' . $time['sec'] . $time['usec'] . '.jpg';
//            $this->crud_model->upload_image(IMG_PATH_SERVER, $file_name, $_FILES["file"], 400, 0, false, true);
//            echo json_encode(array('success' => true, 'filename' => $file_name));
//          }
//        } else {
//          echo json_encode(array('success' => false, 'error' => 4));
//        }
  
      } else if ($p2 == 'approval') {
  
        if (isset($_POST['id']) == false || empty($_POST['id']) == true) {
          $this->response2('fail', '잘못된 접근입니다.(id)');
        }
  
        if (isset($_POST['req']) == false || empty($_POST['req']) == true) {
          $this->response2('fail', '잘못된 접근입니다.(req)');
        }
  
        $approval = $_POST['req'];
        if ($approval == 'ok') {
          $data['activate'] = APPROVAL_DATA_ACTIVATE;
        } else if ($approval == 'no') {
          $data['activate'] = APPROVAL_DATA_INACTIVATE;
        } else {
          $this->response2('fail', '잘못된 접근입니다.(approval:'.$approval.')');
        }

//        $query = <<<QUERY
//UPDATE server_coupon set activate={$data['activate']} where coupon_id={$coupon_id}
//QUERY;
//        $this->db->query($query);
  
        $coupon_id = $_POST['id'];
        $coupon = $this->coupon_model->get_server_coupon($coupon_id);
        if (isset($coupon) == false || empty($coupon) == true) {
          $this->response2('fail', '쿠폰이 존재하지 않습니다.(coupon_id:'.$coupon_id.')');
        }
  
        if ($coupon->activate == $data['activate']) {
          $this->response2('fail', '이미 상태 변경이 완료되었습니다.(coupon_id:'.
            $coupon_id.', activate:'.$coupon->activate.')');
        }
  
        $this->db->where('coupon_id', $coupon_id);
        $this->db->update('server_coupon', $data);
  
        if ($this->db->affected_rows() <= 0) {
          $this->response2('fail', '상태가 정상적으로 변경되지 않았습니다.(coupon_id:'.
            $coupon_id.', activate:'.$coupon->activate.')');
        }
  
        $this->response2('done', '성공하였습니다.');
  
      } elseif ($p2 == 'remove') {
  
        if (isset($_POST['ids']) == false || empty($_POST['ids']) == true) {
          $this->response2('fail', '잘못된 접근입니다.(ids)');
        }
        
        $coupon_ids = json_decode($this->input->post('ids'));
        if (!is_array($coupon_ids)) {
          $this->response2('fail', '잘못된 타입입니다.(coupon_ids:'.json_encode($coupon_ids).')');
        }
        
        $this->db->where_in('coupon_id', $coupon_ids);
        $this->db->delete('server_coupon');
        
        $this->response2('done', '성공하였습니다.');
    
      } elseif ($p2 == 'view') {
    
        $coupon_id = $_GET['id'];
        $coupon = $this->db->get_where('server_coupon', array('coupon_id' => $coupon_id))->row();
        $page_data['coupon'] = $coupon;
        $this->load->view('back/master/manage_coupon_view', $page_data);
    
      } elseif ($p2 == 'list') {
  
        if (isset($_GET['page']) == false || empty($_GET['page']) == true) {
          $this->response2('fail', '잘못된 접근입니다.(page)');
        }
        
        $page = $_GET['page'];
    
        $page_data['coupons'] = $this->coupon_model->get_server_coupon_list($page);
        $this->load->view('back/master/manage_coupon_list', $page_data);
    
      } else {
        $this->response2('fail', '잘못된 접근입니다.');
      }
  
    } else {
  
      $this->page_data['page_name'] = 'manage';
      $this->load->view('back/master/index', $this->page_data);
  
    }
  
  }
  
  public function shop($p1 = '', $p2 = '', $p3 = '')
  {
    if ($this->is_logged() == false) {
      redirect(base_url().'master');
    }
    
    if ($p1 == 'page') {
  
      if ($p2 == 'btn') {
    
        if (isset($_GET['tab']) == false || empty($_GET['tab']) == true) {
          $this->redirect_error('잘못된 접근입니다.');
        }
        if (isset($_GET['page']) == false || empty($_GET['page']) == true) {
          $this->redirect_error('잘못된 접근입니다.');
        }
    
        $page = $_GET['page'];
    
        $tab = $_GET['tab'];
        if ($tab == 'order') {
          $coupon_type = COUPON_TYPE_DEFAULT;
          $where = "coupon_type>{$coupon_type}";
          $total = $this->coupon_model->get_server_coupon_list_cnt($page, $where);
          $page_size = $this->coupon_model::COUPON_LIST_PAGE_SIZE;
        }
    
        $this->page_data['tab'] = $tab;
        $this->page_data['total'] = $total;
        $this->page_data['page_size'] = $page_size;
        $this->page_data['page'] = $page;
        $this->load->view('back/master/manage_page_btn', $this->page_data);
    
      } else { // page
    
        if (isset($_GET['tab']) == false || empty($_GET['tab']) == true) {
          $this->redirect_error('잘못된 접근입니다.');
        }
  
        $tab = $_GET['tab'];
        if ($tab == 'order') {
  
          $shops = $this->shop_model->get_list();
          $ship_status = SHOP_SHIPPING_STATUS_NONE;
          $this->page_data['shops'] = $shops;
          $this->page_data['shop_id'] = 0;
//            $this->page_data['page'] = 0;
          $this->page_data['ship_status'] = $ship_status;
          $this->page_data['start_date'] = '';
          $this->page_data['end_date'] = '';
          $this->page_data['confirm_delay'] = 0;
        
        }
    
        $this->load->view('back/master/shop_' . $tab, $this->page_data);
  
      }
  
    } else if ($p1 == 'order') {
      
      $this->shop_order($p1, $p2, $p3);
  
    } else {
  
      $this->page_data['page_name'] = 'shop';
      $this->load->view('back/master/index', $this->page_data);
  
    }
  
  }
  
  private function shop_order($p1 = '', $p2 = '', $p3 = '')
  {
  
    if ($p2 == 'list') {
  
      $page = 1;
      if (isset($_GET['page'])) {
        $page = $_GET['page'];
      }
      $shop_id = 0;
      if (isset($_GET['shop_id'])) {
        $shop_id = $_GET['shop_id'];
      }
      $ship_status = SHOP_SHIPPING_STATUS_NONE;
      if (isset($_GET['ship_status'])) {
        $ship_status = $_GET['ship_status'];
      }
      $start_date = '';
      $start_date_kor = '';
      if (isset($_GET['start_date'])) {
        $start_date = $_GET['start_date'];
        $start_date_kor = date('Y-m-d H:i:s', strtotime($_GET['start_date']));
      }
      $end_date = '';
      $end_date_kor = '';
      if (isset($_GET['end_date'])) {
        $end_date = $_GET['end_date'];
        $end_date_kor = date('Y-m-d H:i:s', strtotime($_GET['end_date']));
      }
      $confirm_delay = false;
      if (isset($_GET['confirm_delay'])) {
        $confirm_delay = ($_GET['confirm_delay'] == '1');
      }
  
      $size = SHOP_ADMIN_ITEM_LIST_PAGE_SIZE;
      $offset = $size * ($page - 1);

      $shop_data = null;
      $shop_shipping_company = null;
      if ($shop_id > 0) {
        $shop_data = $this->db->get_where('shop', array('shop_id' => $shop_id))->row();
        $shop_shipping_company = $this->db->get_where('shop_shipping_company', array('shop_id' => $shop_id))->result();
      }
  
      $select = "select a.shop_id,a.shop_name,c.item_name,d.*";
      $from = "from shop a, shop_product c, shop_purchase_product d";
      $order_by = "order by purchase_product_id desc";
      $limit = "limit {$offset},{$size}";
      if ($shop_id > 0) {
        $where = "where a.shop_id=d.shop_id and c.product_id=d.product_id and d.shop_id={$shop_data->shop_id} and d.shipping_status={$ship_status}";
      } else {
        $where = "where a.shop_id=d.shop_id and c.product_id=d.product_id and d.shipping_status={$ship_status}";
      }
      if (($ship_status == SHOP_SHIPPING_STATUS_ORDER_COMPLETED || $ship_status == SHOP_SHIPPING_STATUS_PREPARE) && $confirm_delay == true) {
        $purchase_date = date('Y-m-d', strtotime('-' . $this->shop_model::CONFIRM_DELAY_DAYS . ' days'));
//      $this->crud_model->alert_exit($purchase_date);
        $where .= " and d.purchase_at <= '{$purchase_date}'";
      } else if (!empty($start_date) && !empty($end_date)) {
        $where .= " and '{$start_date_kor}' <= d.purchase_at and d.purchase_at <= '{$end_date_kor}'";
      } else {
        $start_date = '';
        $end_date = '';
      }
      $query = $select . ' ' . $from . ' ' . $where . ' ' . $order_by . ' ' . $limit;
      $order_data = $this->db->query($query)->result();
      
      if ($shop_id == 0) {
        foreach ($order_data as $order) {
          $order->shop_data = $this->db->get_where('shop', array('shop_id' => $order->shop_id))->row();
          $order->shop_shipping_company = $this->db->get_where('shop_shipping_company', array('shop_id' => $order->shop_id))->result();
        }
      } else {
        foreach ($order_data as $order) {
          $order->shop_data = $shop_data;
          $order->shop_shipping_company = $shop_shipping_company;
        }
      }
  
      $select = "select count(*) as cnt";
      $query = $select . ' ' . $from . ' ' . $where . ' ';
  
      $total_cnt = $this->db->query($query)->row()->cnt;
  
      if ($ship_status == SHOP_SHIPPING_STATUS_ORDER_COMPLETED) {
        $next_status = SHOP_SHIPPING_STATUS_PREPARE;
      } else if ($ship_status == SHOP_SHIPPING_STATUS_PREPARE) {
        $next_status = SHOP_SHIPPING_STATUS_IN_PROGRESS;
      } else if ($ship_status == SHOP_SHIPPING_STATUS_IN_PROGRESS) {
        $next_status = SHOP_SHIPPING_STATUS_COMPLETED;
      } else if ($ship_status == SHOP_SHIPPING_STATUS_PURCHASE_CANCELING) {
        $next_status = SHOP_SHIPPING_STATUS_PURCHASE_CANCELED;
      } else if ($ship_status == SHOP_SHIPPING_STATUS_PURCHASE_CHANGING) {
        $next_status = SHOP_SHIPPING_STATUS_PURCHASE_CHANGED;
      } else {
        $next_status = SHOP_SHIPPING_STATUS_WAIT;
      }

//        log_message('debug', '[master] shop[' . json_encode($shop_data) . ']');
  
      $this->page_data['tab'] = 'order';
      $this->page_data['total'] = $total_cnt;
      $this->page_data['page_size'] = $size;
      $this->page_data['page'] = $page;
  
      $this->page_data['ship_status'] = $ship_status;
      $this->page_data['next_status'] = $next_status;
      $this->page_data['start_date'] = $start_date;
      $this->page_data['end_date'] = $end_date;
      $this->page_data['confirm_delay'] = $confirm_delay == true ? '1' : '0';
  
      $this->page_data['order_data'] = $order_data;
      $this->page_data['shop_data'] = $shop_data;
      $this->page_data['shop_id'] = $shop_id;
//      $this->page_data['shop_shipping_company'] = $shop_shipping_company;
      $this->load->view('back/master/shop_order_list', $this->page_data);
  
    } else if ($p2 == 'excel') {
      
      if ($p3 == 'info') {
  
        $shop_id = 0;
        if (isset($_GET['shop_id'])) {
          $shop_id = $_GET['shop_id'];
        }
        $ship_status = SHOP_SHIPPING_STATUS_NONE;
        if (isset($_GET['ship_status'])) {
          $ship_status = $_GET['ship_status'];
        }
        $start_date = '';
        $start_date_kor = '';
        if (isset($_GET['start_date'])) {
          $start_date = $_GET['start_date'];
          $start_date_kor = date('Y-m-d H:i:s', strtotime($_GET['start_date']));
        }
        $end_date = '';
        $end_date_kor = '';
        if (isset($_GET['end_date'])) {
          $end_date = $_GET['end_date'];
          $end_date_kor = date('Y-m-d H:i:s', strtotime($_GET['end_date']));
        }
        $confirm_delay = false;
        if (isset($_GET['confirm_delay'])) {
          $confirm_delay = ($_GET['confirm_delay'] == '1');
        }

        $shop_data = null;
        if ($shop_id > 0) {
          $shop_data = $this->db->get_where('shop', array('shop_id' => $shop_id))->row();
          if (isset($shop_data) == false || empty($shop_data) == true) {
            $this->response2('fail', '브랜드 아이디가 잘못되었습니다.(shop_id:'.$shop_id.')');
          }
        }
  
        $select = "select a.shop_id,a.shop_name,c.item_name,d.*";
        $from = "from shop a, shop_product c, shop_purchase_product d";
        $order_by = "order by purchase_product_id desc";
        if ($shop_id > 0) {
          $where = "where a.shop_id=d.shop_id and c.product_id=d.product_id and d.shop_id={$shop_data->shop_id} and d.shipping_status={$ship_status}";
        } else {
          $where = "where a.shop_id=d.shop_id and c.product_id=d.product_id and d.shipping_status={$ship_status}";
        }
        if (($ship_status == SHOP_SHIPPING_STATUS_ORDER_COMPLETED || $ship_status == SHOP_SHIPPING_STATUS_PREPARE) && $confirm_delay == true) {
          $purchase_date = date('Y-m-d', strtotime('-' . $this->shop_model::CONFIRM_DELAY_DAYS . ' days'));
//      $this->crud_model->alert_exit($purchase_date);
          $where .= " and d.purchase_at <= '{$purchase_date}'";
        } else if (!empty($start_date) && !empty($end_date)) {
          $where .= " and '{$start_date_kor}' <= d.purchase_at and d.purchase_at <= '{$end_date_kor}'";
        } else {
          $start_date = '';
          $end_date = '';
        }
//        $query = $select . ' ' . $from . ' ' . $where . ' ' . $order_by . ' ';
//      $order_data = $this->db->query($query)->result();
  
        $select = "select count(*) as cnt";
        $query = $select . ' ' . $from . ' ' . $where . ' ';
  
        $total_cnt = $this->db->query($query)->row()->cnt;
  
        if ($total_cnt <= 0) {
          $this->response2('fail', '<'.$this->shop_model->get_shipping_status_str($ship_status)
            . '> 주문상태인 데이터가 0건 입니다.');
        }

//        log_message('debug', '[master] shop[' . json_encode($shop_data) . ']');
  
        $this->page_data['total'] = $total_cnt;
        $this->page_data['shop_id'] = $shop_id;
        $this->page_data['ship_status'] = $ship_status;
        $this->page_data['start_date'] = $start_date;
        $this->page_data['end_date'] = $end_date;
        $this->page_data['confirm_delay'] = $confirm_delay == true ? '1' : '0';
        $this->page_data['shop_data'] = $shop_data;
        $this->load->view('back/master/shop_order_excel', $this->page_data);
  
      } else if ($p3 == 'download') {
  
        $shop_id = 0;
        if (isset($_GET['shop_id'])) {
          $shop_id = $_GET['shop_id'];
        }
        $ship_status = SHOP_SHIPPING_STATUS_NONE;
        if (isset($_GET['ship_status'])) {
          $ship_status = $_GET['ship_status'];
        }
        $start_date = '';
        $start_date_kor = '';
        if (isset($_GET['start_date'])) {
          $start_date = $_GET['start_date'];
          $start_date_kor = date('Y-m-d H:i:s', strtotime($_GET['start_date']));
        }
        $end_date = '';
        $end_date_kor = '';
        if (isset($_GET['end_date'])) {
          $end_date = $_GET['end_date'];
          $end_date_kor = date('Y-m-d H:i:s', strtotime($_GET['end_date']));
        }
        $confirm_delay = false;
        if (isset($_GET['confirm_delay'])) {
          $confirm_delay = ($_GET['confirm_delay'] == '1');
        }
  
        $shop_data = null;
        if ($shop_id > 0) {
          $shop_data = $this->db->get_where('shop', array('shop_id' => $shop_id))->row();
          if (isset($shop_data) == false || empty($shop_data) == true) {
            $this->response2('fail', '브랜드 아이디가 잘못되었습니다.(shop_id:'.$shop_id.')');
          }
        }
  
        $select = "select a.shop_id,a.shop_name,c.item_name,d.*";
        $from = "from shop a, shop_product c, shop_purchase_product d";
        $order_by = "order by purchase_product_id desc";
        if ($shop_id > 0) {
          $where = "where a.shop_id=d.shop_id and c.product_id=d.product_id and d.shop_id={$shop_data->shop_id} and d.shipping_status={$ship_status}";
        } else {
          $where = "where a.shop_id=d.shop_id and c.product_id=d.product_id and d.shipping_status={$ship_status}";
        }
        if (($ship_status == SHOP_SHIPPING_STATUS_ORDER_COMPLETED || $ship_status == SHOP_SHIPPING_STATUS_PREPARE) && $confirm_delay == true) {
          $purchase_date = date('Y-m-d', strtotime('-' . $this->shop_model::CONFIRM_DELAY_DAYS . ' days'));
//      $this->crud_model->alert_exit($purchase_date);
          $where .= " and d.purchase_at <= '{$purchase_date}'";
        } else if (!empty($start_date) && !empty($end_date)) {
          $where .= " and '{$start_date_kor}' <= d.purchase_at and d.purchase_at <= '{$end_date_kor}'";
        } else {
          $start_date = '';
          $end_date = '';
        }
        $query = $select . ' ' . $from . ' ' . $where . ' ' . $order_by . ' ';
        $order_data = $this->db->query($query)->result_array();
  
        if (isset($order_data) == false || empty($order_data) == true) {
          $this->response2('fail', '<' . $this->shop_model->get_shipping_status_str($ship_status)
            . '> 주문상태인 데이터가 0건 입니다.');
        }

        if ($shop_id == 0) {
          $file_name = '전체브랜드_'.$this->shop_model->get_shipping_status_str($ship_status).
            '_주문정보';
          $title = '전체브랜드_'.$this->shop_model->get_shipping_status_str($ship_status);
        } else {
          $file_name = $order_data[0]['shop_name'].'_'.$this->shop_model->get_shipping_status_str($ship_status).
            '_주문정보';
          $title = $order_data[0]['shop_name'].'_'.$this->shop_model->get_shipping_status_str($ship_status);
        }
        if (empty($start_date) == false && empty($end_date) == false) {
          $file_name .= "_{$start_date}_{$end_date}";
        }
        $subject = $title;
        $desc = $title."\n".'주문확인지연:'.($confirm_delay ? 'YES' : 'NO')."\n";
        if (empty($start_date) == false && empty($end_date) == false) {
          $desc .= "{$start_date} - {$end_date}";
        }
        
        $header = array(
          '샵아이디(서버)',
          '브랜드이름',
          '상품명',
          '구매상품아이디(서버)',
          '구매아이디(서버)',
          '구매코드',
          '유저아이디(서버)',
          '세션아이디(서버)',
          '상품아이디(서버)',
          '과세여부',
          '정상가',
          '할인율(%)',
          '판매가',
          '마진율(%)',
          '공급가',
          '무료배송여부',
          '무료배송가격',
          '배송비',
          '묶음배송갯수',
          '구매갯수',
          '전체상품가격',
          '전체배송비',
          '전체추가금액',
          '총금액',
          '필수옵션갯수',
          '필수옵션정보',
          '선택옵션갯수',
          '선택옵션정보',
          '구매날짜',
          '상태변경날짜',
          '배송상태코드',
          '배송상태',
          '배송정보',
          '리뷰작성여부',
          '구매취소여부',
          '구매취소날짜',
          '구매취소사유',
          '할인금액',
          '쿠폰사용아이디(서버)',
          '구매취소금액',
          '구매취소정보(서버)',
          '정산완료금액',
        );

//        log_message('debug', '[master] header[' . json_encode($header, JSON_UNESCAPED_UNICODE) . ']');
  
        $this->load->library('excel');
        $this->excel->write($file_name, $header, $title, $subject, $desc, $order_data);
  
      } else {
        $this->response2('fail', '잘못된 접근입니다.');
      }
  
    } else if ($p2 == 'view') {
  
      if (isset($_GET['id']) == false || empty($_GET['id']) == true) {
        $this->redirect_error('잘못된 접근입니다.');
      }
  
      $purchase_product_id = $_GET['id'];
  
      $purchase_product = $this->db->get_where('shop_purchase_product', array('purchase_product_id' => $purchase_product_id))->row();
      $purchase_info = $this->db->get_where('shop_purchase', array('purchase_id' => $purchase_product->purchase_id))->row();
      $purchase_status = $this->db->order_by('history_id', 'asc')->get_where('shop_purchase_product_status', array('purchase_product_id' => $purchase_product_id))->result();
      $product_info = $this->db->get_where('shop_product', array('product_id' => $purchase_product->product_id))->row();
      $product_id_info = $this->db->get_where('shop_product_id', array('product_id' => $purchase_product->product_id))->row();
      $shop_info = $this->db->get_where('shop', array('shop_id' => $product_info->shop_id))->row();

//      $this->crud_model->alert_exit(json_encode($product_info));
  
      $this->page_data['purchase_product'] = $purchase_product;
      $this->page_data['purchase_info'] = $purchase_info;
      $this->page_data['purchase_status'] = $purchase_status;
      $this->page_data['product_info'] = $product_info;
      $this->page_data['product_id_info'] = $product_id_info;
      $this->page_data['shop_info'] = $shop_info;
      $this->load->view('back/master/shop_order_view', $this->page_data);
  
    } else if ($p2 == 'update') {
  
      if ($p3 == 'ship') {
    
        $purchase_product_id = $_POST['purchase_product_id'];
        $shipping_data = json_decode($_POST['shipping_data']);
    
        $shipping_data->shipping_company_name = $this->db->get_where('shipping_company',
          array('company_code' => $shipping_data->shipping_company))->row()->company_name;
        $purchase_product = $this->db->get_where('shop_purchase_product', array('purchase_product_id' => $purchase_product_id))->row();
        $ins = array(
          'purchase_product_id' => $purchase_product->purchase_product_id,
          'shipping_status' => $purchase_product->shipping_status,
          'shipping_status_code' => $this->shop_model->get_shipping_status_str($purchase_product->shipping_status),
          'shipping_data' => json_encode($shipping_data),
        );
        $this->db->set('modified_at', 'NOW()', false);
        $this->db->insert('shop_purchase_product_status', $ins);
    
        $this->db->set('shipping_data', json_encode($shipping_data));
        $this->db->set('modified_at', 'NOW()', false);
        $this->db->where('purchase_product_id', $purchase_product_id);
        $this->db->update('shop_purchase_product');
    
        // 송장변경 알림톡이 필요함
        // send kakao alim talk
        $purchase_info = $this->db->get_where('shop_purchase',
          array('purchase_code' => $purchase_product->purchase_code))->row();
        if ($purchase_info->user_id > 0) {
          $user_data = $this->db->get_where('user', array('user_id' => $purchase_info->user_id))->row();
          $phone = $user_data->phone;
          $email = $user_data->email;
        } else {
          $phone = $purchase_info->sender_phone;
          $email = $purchase_info->sender_email;
        }
        $product_info = $this->db->get_where('shop_product', array('product_id' => $purchase_product->product_id))->row();
        $this->mts_model->send_shop_shipping($phone, SHOP_SHIPPING_STATUS_IN_PROGRESS,
          $purchase_info->purchase_code, $product_info->item_name, $shipping_data->shipping_company_name, $shipping_data->shipping_code);
        $this->email_model->get_user_shipping_status_data($this->shop_model->get_shipping_status_str(SHOP_SHIPPING_STATUS_IN_PROGRESS),
          $purchase_info->purchase_code, $product_info->item_name, $shipping_data->shipping_company_name, $shipping_data->shipping_code,
          $product_info->item_image_url_0, $email);
    
        $this->response2('done', '성공하였습니다.');
  
      } else {
    
//        $shop_id = $_POST['shop_id'];
        $ship_status = $_POST['ship_status'];
        $next_status = $_POST['next_status'];
        $shipping_infos = json_decode($_POST['shipping_infos']);
    
        if ($next_status == SHOP_SHIPPING_STATUS_IN_PROGRESS) {
          foreach ($shipping_infos as $info) {
            $purchase_product = $this->db->get_where('shop_purchase_product', array('purchase_product_id' => $info->purchase_product_id))->row();
            if ($purchase_product->shipping_status != $ship_status) {
              continue;
            }
            $shipping_data = new stdClass();
            $shipping_data->shipping_company = $info->shipping_company;
            $shipping_data->shipping_code = $info->shipping_code;
            $shipping_data->shipping_company_name = $this->db->get_where('shipping_company', array('company_code' => $shipping_data->shipping_company))->row()->company_name;
        
            $ins = array(
              'purchase_product_id' => $purchase_product->purchase_product_id,
              'shipping_status' => $next_status,
              'shipping_status_code' => $this->shop_model->get_shipping_status_str($next_status),
              'shipping_data' => json_encode($shipping_data),
            );
            $this->db->set('modified_at', 'NOW()', false);
            $this->db->insert('shop_purchase_product_status', $ins);
        
            $this->db->set('shipping_status', $next_status);
            $this->db->set('shipping_status_code', $this->shop_model->get_shipping_status_str($next_status));
            $this->db->set('shipping_data', json_encode($shipping_data));
            $this->db->set('modified_at', 'NOW()', false);
            $this->db->where('purchase_product_id', $info->purchase_product_id);
            $this->db->update('shop_purchase_product');
        
            // send kakao alim talk
            $purchase_info = $this->db->get_where('shop_purchase',
              array('purchase_code' => $purchase_product->purchase_code))->row();
            if ($purchase_info->user_id > 0) {
              $user_data = $this->db->get_where('user', array('user_id' => $purchase_info->user_id))->row();
              $email = $user_data->email;
              $phone = $user_data->phone;
            } else {
              $email = $purchase_info->sender_email;
              $phone = $purchase_info->sender_phone;
            }
            $product_info = $this->db->get_where('shop_product', array('product_id' => $purchase_product->product_id))->row();
            $this->mts_model->send_shop_shipping($phone, SHOP_SHIPPING_STATUS_IN_PROGRESS,
              $purchase_info->purchase_code, $product_info->item_name, $shipping_data->shipping_company_name, $shipping_data->shipping_code);
            $this->email_model->get_user_shipping_status_data($this->shop_model->get_shipping_status_str(SHOP_SHIPPING_STATUS_IN_PROGRESS),
              $purchase_info->purchase_code, $product_info->item_name, $shipping_data->shipping_company_name, $shipping_data->shipping_code,
              $product_info->item_image_url_0, $email);
          }
      
          $this->response2('done', '성공하였습니다.');
  
        } else if ($next_status == SHOP_SHIPPING_STATUS_ORDER_CANCELED) {
          // 주문취소 - 결제 취소가 필요한 부분
      
          if (isset($_POST['only_info']) == false) {
            $this->response2('fail', '잘못된 접근입니다.');
          }
      
          $only_info = $_POST['only_info'] == '1';
      
          if (isset($_POST['cancel_reason']) == false) {
            $this->response2('fail', '잘못된 접근입니다.');
          }
          $cancel_reason = $_POST['cancel_reason'];
          if ($only_info == false && mb_strlen($cancel_reason) < 5) {
            $this->response2('fail', '취소 사유는 최소 5자 입력바랍니다.');
          }
      
          $cancel_items = array();
          $purchase_code = null;
          $shop_id = 0;
          foreach ($shipping_infos as $info) {
            $purchase_product = $this->db->get_where('shop_purchase_product', array('purchase_product_id' => $info->purchase_product_id))->row();
            if ($purchase_product->shipping_status != $ship_status) {
              $this->response2('fail', '잘못된 접근입니다.(ship_status:'.$purchase_product->shipping_status.')');
            }
        
            if ($shop_id == 0) {
              $shop_id = $purchase_product->shop_id;
              $purchase_code = $purchase_product->purchase_code;
            } else if ($purchase_code != $purchase_product->purchase_code) {
              $this->response2('fail', '주문취소는 하나의 구매코드에 대해서 가능합니다!');
            }
        
//            if ($shop_id != $this->session->userdata('shop_id')) {
//              $this->crud_model->alert_exit("상품 브랜드 관리자가 아닙니다!");
//            }
//
            $cancel_items[] = $purchase_product;
          }
      
          if (count($cancel_items) <= 0) {
            $this->response2('fail', '취소상품이 존재하지 않습니다!');
          }
      
          $this->db->where(array('purchase_code' => $purchase_code, 'shop_id' => $shop_id));
          $total_items = $this->db->get('shop_purchase_product')->result();
      
          $total_balance = 0;
          $total_discount = 0;
          $total_shipping_fee = 0;
          $no_cancel_items = array();
          foreach ($total_items as $item1) {
            $cancel_item = false;
            foreach ($cancel_items as $item2) {
              if ($item1->purchase_product_id == $item2->purchase_product_id) {
                $cancel_item = true;
                break;
              }
            }
            if ($cancel_item == false && $item1->shipping_status != SHOP_SHIPPING_STATUS_ORDER_CANCELED) {
              $no_cancel_items[] = $item1;
            }
            if ($item1->shipping_status != SHOP_SHIPPING_STATUS_ORDER_CANCELED) {
              $total_balance += $item1->total_balance;
              $total_discount += $item1->discount;
              $total_shipping_fee += $item1->total_shipping_fee;
            }
          }

//          log_message('debug', '[order] only_info['.$only_info.'] purchase_code['.$purchase_code.'] shop_id['.$shop_id.
//            '] no_cancel_items['.json_encode($no_cancel_items).'] cancel_items['.json_encode($cancel_items).']');
      
          $no_cancel_info = new stdClass();
          $no_cancel_info->total_price = 0;
          $no_cancel_info->total_shipping_fee = 0;
          $no_cancel_info->total_additional_price = 0;
          $no_cancel_info->total_purchase_cnt = 0;
          $no_cancel_info->total_balance = 0;
          $no_cancel_info->total_discount = 0;
      
          if ($only_info == true) {
        
            if (count($no_cancel_items)) {
              $this->shop_model->get_no_cancel_info($no_cancel_items, $no_cancel_info, false);
            }

//            $cancel_items = $this->shop_model->get_cancel_items($cancel_items, $result, false);
//            log_message('debug', '[shop] result['.json_encode($result).']');
        
            $final_balance = ($total_balance - $total_discount) - ($no_cancel_info->total_balance - $no_cancel_info->total_discount);
        
            $page_data['total_balance'] = $total_balance;
            $page_data['total_discount'] = $total_discount;
            $page_data['total_shipping_fee'] = $total_shipping_fee;
            $page_data['final_balance'] = $final_balance;
            $page_data['no_cancel_info'] = $no_cancel_info;
            $page_data['page_name'] = "order";
            $this->load->view('back/master/shop_order_cancel', $page_data);
        
          } else {
        
            if (count($no_cancel_items)) {
              $this->shop_model->get_no_cancel_info($no_cancel_items, $no_cancel_info, false);
            }
        
            $cancel_shipping_fee = $total_shipping_fee - $no_cancel_info->total_shipping_fee;
        
            $charge_shipping_fee = false;
            $cancel_total_balance = 0;
            foreach ($cancel_items as $cancel_item) {
              if ($charge_shipping_fee == false) {
                $cancel_item->total_shipping_fee = $cancel_shipping_fee;
                $charge_shipping_fee = true;
              } else {
                $cancel_item->total_shipping_fee = 0;
              }
              $cancel_item->total_balance = $cancel_item->total_price + $cancel_item->total_shipping_fee + $cancel_item->total_additional_price;
              $cancel_total_balance += ($cancel_item->total_balance - $cancel_item->discount);
            }
        
            if ($cancel_total_balance <= 0) {
              $this->response2('fail', '취소 확정 금액이 0원이므로 취소하실 수 없습니다. 관리자에게 문의바랍니다.');
            }
        
            if (count($no_cancel_items)) {
              $this->shop_model->get_no_cancel_info($no_cancel_items, $no_cancel_info, true);
            }
        
            foreach ($cancel_items as $cancel_item) {
              $upd = array(
                'total_shipping_fee' => $cancel_item->total_shipping_fee,
                'total_balance' => $cancel_item->total_balance,
              );
              $this->db->update('shop_purchase_product', $upd, array('purchase_product_id' => $cancel_item->purchase_product_id));
            }
        
            $this->shop_model->cancel_payment($purchase_code, $cancel_items, $cancel_reason, $next_status, false, null);
        
            $this->response2('done', '성공하였습니다.');
          }

        } else {
          
          $purchase_product_ids = array();
          foreach ($shipping_infos as $info) {
            $purchase_product = $this->db->get_where('shop_purchase_product', array('purchase_product_id' => $info->purchase_product_id))->row();
            if ($purchase_product->shipping_status != $ship_status) {
              continue;
            }
        
            $ins = array(
              'purchase_product_id' => $purchase_product->purchase_product_id,
              'shipping_status' => $next_status,
              'shipping_status_code' => $this->shop_model->get_shipping_status_str($next_status),
            );
            $this->db->set('modified_at', 'NOW()', false);
            $this->db->insert('shop_purchase_product_status', $ins);
        
            // send kakao alim talk
            $purchase_info = $this->db->get_where('shop_purchase', array('purchase_code' => $purchase_product->purchase_code))->row();
            if ($purchase_info->user_id > 0) {
              $user_data = $this->db->get_where('user', array('user_id' => $purchase_info->user_id))->row();
              $email = $user_data->email;
              $phone = $user_data->phone;
            } else {
              $email = $purchase_info->sender_email;
              $phone = $purchase_info->sender_phone;
            }
            if ($purchase_info->user_id > 0) {
              $redirect_url = base_url() . "home/shop/order/detail?c={$purchase_info->purchase_code}";
            } else {
              $redirect_url = base_url() . "home/shop/order/detail?c={$purchase_info->purchase_code}&a={$purchase_info->session_id}";
            }
            $payment_info =  json_decode($purchase_info->bootpay_done_data);
            $this->mts_model->send_shop_order($phone, $next_status, $purchase_info->purchase_code,
              $payment_info->item_name, $payment_info->purchased_at, $redirect_url);
            $product_info = $this->db->get_where('shop_product', array('product_id' => $purchase_product->product_id))->row();
            $this->email_model->get_user_order_status_data(
              $this->shop_model->get_shipping_status_str($next_status), $purchase_info->purchase_code,
              $product_info->item_name, date('Y-m-d H:i:s'), $redirect_url, $product_info->item_image_url_0, $email);
        
            $purchase_product_ids[] = $info->purchase_product_id;
          }
          if (count($purchase_product_ids) > 0) {
            $this->db->where_in('purchase_product_id', $purchase_product_ids);
            $this->db->set('shipping_status', $next_status);
            $this->db->set('shipping_status_code', $this->shop_model->get_shipping_status_str($next_status));
            $this->db->set('modified_at', 'NOW()', false);
            $this->db->update('shop_purchase_product');
          }
          
          $this->response2('done', '성공하였습니다.');
        
        }
    
      }
  
    } else if ($p2 == 'req') {
  
      $purchase_product_id = $_POST['req_id'];
      $req_type  = $_POST['req_type'];
      $req_reason = $_POST['req_reason'];
  
      if (mb_strlen($req_reason) < 5) {
        $this->response2('fail', '사유는 최소 5자 입력바랍니다.');
      }
  
      $purchase_product = $this->db->get_where('shop_purchase_product', array('purchase_product_id' => $purchase_product_id))->row();
  
      if ($req_type == SHOP_ORDER_REQ_TYPE_CANCEL) {
        $next_status = SHOP_SHIPPING_STATUS_ORDER_CANCELED;
        $canceled = 1;
    
        if ($purchase_product->shipping_status != SHOP_SHIPPING_STATUS_ORDER_COMPLETED && $purchase_product->shipping_status != SHOP_SHIPPING_STATUS_PREPARE) {
          $this->response2('fail', '잘못된 접근입니다.(ship_status:'.$purchase_product->shipping_status.')');
        }
    
      } else if ($req_type == SHOP_ORDER_REQ_TYPE_CHANGE) {
        $next_status = SHOP_SHIPPING_STATUS_PURCHASE_CHANGING;
        $canceled = 0;
    
        if ($purchase_product->shipping_status != SHOP_SHIPPING_STATUS_COMPLETED) {
          $this->response2('fail', '잘못된 접근입니다.(ship_status:'.$purchase_product->shipping_status.')');
        }
    
      } else if ($req_type == SHOP_ORDER_REQ_TYPE_RETURN) {
        $next_status = SHOP_SHIPPING_STATUS_PURCHASE_CANCELING;
        $canceled = 1;
    
        if ($purchase_product->shipping_status != SHOP_SHIPPING_STATUS_COMPLETED) {
          $this->response2('fail', '잘못된 접근입니다.(ship_status:'.$purchase_product->shipping_status.')');
        }
    
      } else {
        $this->response2('fail', '잘못된 접근입니다.');
      }
  
      if ($req_type == SHOP_ORDER_REQ_TYPE_CANCEL) { // 결제 취소가 필요한 부분
        $this->response2('fail', '잘못된 접근입니다.');
//        $this->shop_model->cancel_payment($purchase_product->purchase_product_id, $req_reason,
//          SHOP_SHIPPING_STATUS_ORDER_CANCELED, false, null);
      } else {
        $ins = array(
          'purchase_product_id' => $purchase_product_id,
          'shipping_status' => $next_status,
          'shipping_status_code' => $this->shop_model->get_shipping_status_str($next_status),
          'shipping_data' => $req_reason,
        );
        $this->db->set('modified_at', 'NOW()', false);
        $this->db->insert('shop_purchase_product_status', $ins);
    
        $upd = array(
          'shipping_status' => $next_status,
          'shipping_status_code' => $this->shop_model->get_shipping_status_str($next_status),
          'canceled' => $canceled,
          'cancel_reason' => $req_reason,
        );
        $this->db->set('canceled_at', 'NOW()', false);
        $this->db->where('purchase_product_id', $purchase_product_id);
        $this->db->update('shop_purchase_product', $upd);
    
        // send kakao alim talk
        $purchase_info = $this->db->get_where('shop_purchase', array('purchase_code' => $purchase_product->purchase_code))->row();
        if ($purchase_info->user_id > 0) {
          $user_data = $this->db->get_where('user', array('user_id' => $purchase_info->user_id))->row();
          $email = $user_data->email;
          $phone = $user_data->phone;
        } else {
          $email = $purchase_info->sender_email;
          $phone = $purchase_info->sender_phone;
        }
        if ($purchase_info->user_id > 0) {
          $redirect_url = base_url() . "home/shop/order/detail?c={$purchase_info->purchase_code}";
        } else {
          $redirect_url = base_url() . "home/shop/order/detail?c={$purchase_info->purchase_code}&a={$purchase_info->session_id}";
        }
        $payment_info =  json_decode($purchase_info->bootpay_done_data);
        $this->mts_model->send_shop_order($phone, $next_status, $purchase_info->purchase_code,
          $payment_info->item_name, $payment_info->purchased_at, $redirect_url);
        $product_info = $this->db->get_where('shop_product', array('product_id' => $purchase_product->product_id))->row();
        $this->email_model->get_user_order_status_data(
          $this->shop_model->get_shipping_status_str($next_status), $purchase_info->purchase_code,
          $product_info->item_name, date('Y-m-d H:i:s'), $redirect_url, $product_info->item_image_url_0, $email);
      }
  
      $this->response2('done', '성공하였습니다.');
  
    } else {
      $this->response2('fail', '잘못된 접근입니다.');
    }
  }
}
