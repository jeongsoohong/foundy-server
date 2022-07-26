<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Admin extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->database();
    //$this->load->library('spreadsheet');
  
    $now = time();
    if (SERVER_CHECK == true &&
      strtotime(SERVER_CHECK_START) < $now && $now < strtotime(SERVER_CHECK_END)) {
      if ($this->uri->segment(2) != 'server' && $this->uri->segment(3) != 'check') {
        redirect(base_url().'admin/server/check');
      }
    }
  
    defined('IMG_PATH_PROFILE')  OR define('IMG_PATH_PROFILE', '/web/public_html/uploads/profile_image/');
    defined('IMG_PATH_BLOG')     OR define('IMG_PATH_BLOG', '/web/public_html/uploads/blog_image/');
    defined('IMG_PATH_CENTER')   OR define('IMG_PATH_CENTER', '/web/public_html/uploads/center_image/');
    defined('IMG_PATH_SHOP')   OR define('IMG_PATH_SHOP', '/web/public_html/uploads/shop_image/');

    defined('IMG_WEB_PATH_PROFILE')  OR define('IMG_WEB_PATH_PROFILE', base_url().'uploads/profile_image/');
    defined('IMG_WEB_PATH_BLOG')     OR define('IMG_WEB_PATH_BLOG', base_url().'uploads/blog_image/');
    defined('IMG_WEB_PATH_CENTER')   OR define('IMG_WEB_PATH_CENTER', base_url().'uploads/center_image/');
    defined('IMG_WEB_PATH_SHOP')   OR define('IMG_WEB_PATH_SHOP', base_url().'uploads/shop_image/');

    /*cache control*/
    //$this->output->enable_profiler(TRUE);
    $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    $this->output->set_header('Pragma: no-cache');
    //$this->crud_model->ip_data();
    //$this->config->cache_query();

    defined('IMG_PATH_BLOG')      OR define('IMG_PATH_BLOG', '/web/public_html/uploads/blog_image/');
    defined('IMG_WEB_PATH_BLOG')  OR define('IMG_WEB_PATH_BLOG', base_url().'uploads/blog_image/');
    defined('IMG_PATH_SLIDER')      OR define('IMG_PATH_SLIDER', '/web/public_html/uploads/slider_image/');
    defined('IMG_WEB_PATH_SLIDER')  OR define('IMG_WEB_PATH_SLIDER', base_url().'uploads/slider_image/');
    defined('IMG_PATH_SERVER')      OR define('IMG_PATH_SERVER', '/web/public_html/uploads/server_image/');
    defined('IMG_WEB_PATH_SERVER')  OR define('IMG_WEB_PATH_SERVER', base_url().'uploads/server_image/');

  }

  /* index of the admin. Default: Dashboard; On No Login Session: Back to login page. */
  public function index()
  {
    // for login
    $page_data['control'] = "admin";

    if ($this->session->userdata('admin_login') == 'yes') {
    
      // 가입자수
      $date = date('Y-m-d');
      $query = <<<QUERY
select count(*) as count from user where create_at>='{$date}' and unregister=0
QUERY;
      $today_register = $this->db->query($query)->row()->count;
  
      $week = date('w');
      $date = date('Y-m-d', strtotime($date." -".$week."days"));
      $query = <<<QUERY
select count(*) as count from user where create_at>='{$date}' and unregister=0
QUERY;
      $this_week_register = $this->db->query($query)->row()->count;
  
      $date = date('Y-m').'-01';
      $query = <<<QUERY
select count(*) as count from user where create_at>='{$date}' and unregister=0
QUERY;
      $this_month_register = $this->db->query($query)->row()->count;
  
      $query = <<<QUERY
select count(*) as count from user where unregister=0
QUERY;
      $total_register = $this->db->query($query)->row()->count;
    
      // 접속자수
      $start = date('Y-m-d').' 00:00:00';
      $end = date('Y-m-d').' 23:59:59';
      $query = <<<QUERY
select count(distinct(user_id)) as count from user_active
where user_id is not null and '{$start}'<=active_at and active_at<='{$end}'
QUERY;
      $today_member_au= $this->db->query($query)->row()->count;
  
      $start = date('Y-m-d').' 00:00:00';
      $end = date('Y-m-d').' 23:59:59';
      $query = <<<QUERY
select count(distinct(session_id)) as count from user_active
where '{$start}'<=active_at and active_at<='{$end}'
QUERY;
      $today_au= $this->db->query($query)->row()->count;
  
      $start = date('Y-m').'-01 00:00:00';
      $end = date('Y-m-d').' 23:59:59';
      $query = <<<QUERY
select count(distinct(user_id)) as count from user_active where user_id is not null and '{$start}'<=active_at and active_at<='{$end}'
QUERY;
      $this_month_member_au= $this->db->query($query)->row()->count;
  
      $start = date('Y-m').'-01 00:00:00';
      $end = date('Y-m-d').' 23:59:59';
      $query = <<<QUERY
select count(distinct(session_id)) as count from user_active where '{$start}'<=active_at and active_at<='{$end}'
QUERY;
      $this_month_au= $this->db->query($query)->row()->count;
      
      // 샵 주문 / 매출
      $shipping_status = SHOP_SHIPPING_STATUS_ORDER_COMPLETED;
      $shipping_status2 = SHOP_SHIPPING_STATUS_PREPARE;
      $query = <<<QUERY
select count(*) as count from shop_purchase_product where shipping_status in ({$shipping_status},{$shipping_status2})
QUERY;
      $shipping_status_1_count = $this->db->query($query)->row()->count;
      
      $query = <<<QUERY
select sum(total_balance) as count from shop_purchase_product where shipping_status in ({$shipping_status},{$shipping_status2})
QUERY;
      $shipping_status_1_balance = $this->db->query($query)->row()->count;
  
      $shipping_status = SHOP_SHIPPING_STATUS_IN_PROGRESS;
      $query = <<<QUERY
select count(*) as count from shop_purchase_product where shipping_status in ({$shipping_status})
QUERY;
      $shipping_status_2_count = $this->db->query($query)->row()->count;
  
      $query = <<<QUERY
select sum(total_balance) as count from shop_purchase_product where shipping_status in ({$shipping_status})
QUERY;
      $shipping_status_2_balance = $this->db->query($query)->row()->count;
  
      $shipping_status = SHOP_SHIPPING_STATUS_COMPLETED;
      $query = <<<QUERY
select count(*) as count from shop_purchase_product where shipping_status in ({$shipping_status})
QUERY;
      $shipping_status_3_count = $this->db->query($query)->row()->count;
  
      $query = <<<QUERY
select sum(total_balance) as count from shop_purchase_product where shipping_status in ({$shipping_status})
QUERY;
      $shipping_status_3_balance = $this->db->query($query)->row()->count;
  
      $shipping_status = SHOP_SHIPPING_STATUS_PURCHASE_COMPLETED;
      $shipping_status2 = SHOP_SHIPPING_STATUS_PURCHASE_CHANGING;
      $shipping_status3 = SHOP_SHIPPING_STATUS_PURCHASE_CHANGED;
      $query = <<<QUERY
select count(*) as count from shop_purchase_product where shipping_status in ({$shipping_status},{$shipping_status2},{$shipping_status3})
QUERY;
      $shipping_status_4_count = $this->db->query($query)->row()->count;
  
      $query = <<<QUERY
select sum(total_balance) as count from shop_purchase_product where shipping_status in ({$shipping_status},{$shipping_status2},{$shipping_status3})
QUERY;
      $shipping_status_4_balance = $this->db->query($query)->row()->count;
  
      $shipping_status = SHOP_SHIPPING_STATUS_ORDER_CANCELED;
      $query = <<<QUERY
select count(*) as count from shop_purchase_product where shipping_status in ({$shipping_status})
QUERY;
      $shipping_status_5_count = $this->db->query($query)->row()->count;
  
      $query = <<<QUERY
select sum(total_balance) as count from shop_purchase_product where shipping_status in ({$shipping_status})
QUERY;
      $shipping_status_5_balance = $this->db->query($query)->row()->count;
  
      $shipping_status = SHOP_SHIPPING_STATUS_PURCHASE_CANCELING;
      $shipping_status2 = SHOP_SHIPPING_STATUS_PURCHASE_CANCELED;
      $query = <<<QUERY
select count(*) as count from shop_purchase_product where shipping_status in ({$shipping_status},{$shipping_status2})
QUERY;
      $shipping_status_6_count = $this->db->query($query)->row()->count;
  
      $query = <<<QUERY
select sum(total_balance) as count from shop_purchase_product where shipping_status in ({$shipping_status},{$shipping_status2})
QUERY;
      $shipping_status_6_balance = $this->db->query($query)->row()->count;
      
      // 센터 / 강사
      $query = <<<QUERY
select count(*) as count from center where activate=1
QUERY;
      $total_center = $this->db->query($query)->row()->count;

      $query = <<<QUERY
select count(*) as count from center where activate=0
QUERY;
      $unapproved_center = $this->db->query($query)->row()->count;

      $query = <<<QUERY
select count(*) as count from teacher where activate=1
QUERY;
      $total_teacher = $this->db->query($query)->row()->count;

      $query = <<<QUERY
select count(*) as count from teacher where activate=0
QUERY;
      $unapproved_teacher = $this->db->query($query)->row()->count;

      // 샵 / 상품
      $query = <<<QUERY
select count(*) as count from shop where activate=1
QUERY;
      $total_shop = $this->db->query($query)->row()->count;

      $query = <<<QUERY
select count(*) as count from shop where activate=0
QUERY;
      $unapproved_shop = $this->db->query($query)->row()->count;

      $status = SHOP_PRODUCT_STATUS_REQUEST;
      $query = <<<QUERY
select count(*) as count from shop_product_id where status={$status}
QUERY;
      $unapproved_product = $this->db->query($query)->row()->count;

      $status = SHOP_PRODUCT_STATUS_ON_SALE;
      $query = <<<QUERY
select count(*) as count from shop_product_id where status={$status}
QUERY;
      $product_on_sale = $this->db->query($query)->row()->count;

      $page_data['today_register'] = $today_register;
      $page_data['this_week_register'] = $this_week_register;
      $page_data['this_month_register'] = $this_month_register;
      $page_data['total_register'] = $total_register;
      $page_data['today_member_au'] = $today_member_au;
      $page_data['today_au'] = $today_au;
      $page_data['this_month_member_au'] = $this_month_member_au;
      $page_data['this_month_au'] = $this_month_au;
      $page_data['shipping_status_1_count'] = $shipping_status_1_count;
      $page_data['shipping_status_1_balance'] = $shipping_status_1_balance;
      $page_data['shipping_status_2_count'] = $shipping_status_2_count;
      $page_data['shipping_status_2_balance'] = $shipping_status_2_balance;
      $page_data['shipping_status_3_count'] = $shipping_status_3_count;
      $page_data['shipping_status_3_balance'] = $shipping_status_3_balance;
      $page_data['shipping_status_4_count'] = $shipping_status_4_count;
      $page_data['shipping_status_4_balance'] = $shipping_status_4_balance;
      $page_data['shipping_status_5_count'] = $shipping_status_5_count;
      $page_data['shipping_status_5_balance'] = $shipping_status_5_balance;
      $page_data['shipping_status_6_count'] = $shipping_status_6_count;
      $page_data['shipping_status_6_balance'] = $shipping_status_6_balance;
      $page_data['total_center'] = $total_center;
      $page_data['unapproved_center'] = $unapproved_center;
      $page_data['total_teacher'] = $total_teacher;
      $page_data['unapproved_teacher'] = $unapproved_teacher;
      $page_data['total_shop'] = $total_shop;
      $page_data['unapproved_shop'] = $unapproved_shop;
      $page_data['product_on_sale'] = $product_on_sale;
      $page_data['unapproved_product'] = $unapproved_product;
      $page_data['page_name'] = "dashboard";
      $this->load->view('back/index', $page_data);
    } else {
//      $page_data['control'] = "admin";
      $this->load->view('back/login', $page_data);
    }
  }
  
  /* Login into Admin panel */
  function login($para1 = '', $para2 = '')
  {
    // for login
    $page_data['control'] = "admin";

    if ($para1 == 'forget_form') {
   
      $page_data['control'] = 'admin';
      $this->load->view('back/forget_password', $page_data);
    
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
    
          $this->session->set_userdata('admin_approval_email', $email);
          $this->session->set_userdata('admin_approval_code', $code);
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
    
        $approval_email = $this->session->userdata('admin_approval_email');
        $approval_code = $this->session->userdata('admin_approval_code');
    
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
        if ($auth->for != $for || $for != 'admin_forget_passwd') {
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
        $user_type = USER_TYPE_ADMIN;
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
            $this->session->set_userdata('admin_login', 'yes');
            $this->session->set_userdata('admin_id', $user_data->user_id);
            $this->session->set_userdata('admin_name', $user_data->nickname);
//            $this->session->set_userdata('title', 'admin');

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
    $page_data['control'] = "admin";

    //$this->session->sess_destroy();
    $this->session->set_userdata('admin_login', 'no');
    redirect(base_url() . 'admin', 'refresh');
  }

  /* Checking Login Stat */
  function is_logged()
  {
    if ($this->session->userdata('admin_login') == 'yes') {
      return true;
    } else {
      return false;
    }
  }
  
  /* Manage Admin Settings */
  function manage_admin($para1 = "")
  {
    // for login
    $page_data['control'] = "admin";

    if ($this->is_logged() == false) {
      redirect(base_url() . 'admin');
    }

    if ($para1 == 'update_password') {
      $user_data['password'] = $this->input->post('password');
      $account_data = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('admin_id')))->result_array();
      foreach ($account_data as $row) {
        if (sha1($user_data['password']) == $row['password']) {
          if ($this->input->post('password1') == $this->input->post('password2')) {
            $data['password'] = sha1($this->input->post('password1'));
            $this->db->where('admin_id', $this->session->userdata('admin_id'));
            $this->db->update('admin', $data);
            echo 'updated';
          }
        } else {
          echo 'pass_prb';
        }
      }
    } else if ($para1 == 'update_profile') {
      $this->db->where('admin_id', $this->session->userdata('admin_id'));
      $this->db->update('admin', array('name' => $this->input->post('name'), 'email' => $this->input->post('email'), 'address' => $this->input->post('address'), 'phone' => $this->input->post('phone')));
    } else {
      $page_data['page_name'] = "manage_admin";
      $this->load->view('back/index', $page_data);
    }
  }

  /*Product blog_category add, edit, view, delete */
  function blog_category($para1 = '', $para2 = '')
  {
    // for login
    $page_data['control'] = "admin";

    if ($this->is_logged() == false) {
      redirect(base_url() . 'admin');
    }

    if ($para1 == 'do_add') {

      $data['name'] = $this->input->post('name');
      $data['desc'] = $this->input->post('desc');
      $data['type'] = BLOG_TYPE_DEFAULT;
      $this->db->insert('category_blog', $data);
      echo 'done';
//      redirect(base_url() . 'admin/blog_category');

    } else if ($para1 == 'edit') {

      $page_data['blog_category_data'] = $this->db->get_where('category_blog', array('category_id' => $para2))->result_array();
      $this->load->view('back/admin/blog_category_edit', $page_data);

    } elseif ($para1 == "update") {

      $data['name'] = $this->input->post('name');
      $data['desc'] = $this->input->post('desc');
      $this->db->where('category_id', $para2);
      $this->db->update('category_blog', $data);
      echo 'done';
//      redirect(base_url() . 'admin/blog_category');

    } elseif ($para1 == 'delete') {

      $this->db->where('category_id', $para2);
      $this->db->delete('category_blog');
      echo 'done';
//      redirect(base_url() . 'admin/blog_category');

    } elseif ($para1 == 'list') {
      //            $this->db->order_by('blog_category_id', 'desc');
      $page_data['all_categories'] = $this->db->order_by('type', 'desc')->get('category_blog')->result_array();
      $this->load->view('back/admin/blog_category_list', $page_data);

    } elseif ($para1 == 'add') {

      $this->load->view('back/admin/blog_category_add');
  
    } else if ($para1 == 'activate_set') {
  
      $cateogry_id = $para2;
      $req = $_GET['req'];
      if ($req == 'ok') {
        $activate= 1;
      } else {
        $activate = 0;
      }
  
      $query = <<<QUERY
UPDATE category_blog set activate={$activate} where category_id={$cateogry_id}
QUERY;
      $this->db->query($query);
      echo 'done';
  
    } else {

      $page_data['page_name'] = "blog_category";
      $page_data['all_categories'] = $this->db->get('category_blog')->result_array();
      $this->load->view('back/index', $page_data);

    }
  }

  /*Product Category add, edit, view, delete */
  function blog($para1 = '', $para2 = '')
  {
    // for login
    $page_data['control'] = "admin";

    if ($this->is_logged() == false) {
      redirect(base_url() . 'admin');
    }

    if ($para1 == 'do_add') {

      $blog_id = $para2;
      $category_id = $this->input->post('category_blog');
      $blog_category = $this->db->get_where('category_blog', array('category_id' => $category_id))->row();

      $main_image_url = '';
      if (!isset($_FILES["img"])) {
        if ($blog_category->type == BLOG_TYPE_DEFAULT) {
          echo '메인 이미지를 첨부해주세요.';
          exit;
        }
      } else {
        $error = $this->crud_model->file_validation($_FILES['img'], false);
        if ($error == UPLOAD_ERR_OK) {
          $time = time();
          $file_name = 'blog_' . $blog_id . '.jpg';
          $main_image_url = base_url() . 'uploads/blog_image/blog_' . $blog_id . '_thumb.jpg?id=' . $time;
          $this->crud_model->upload_image(IMG_PATH_BLOG, $file_name, $_FILES["img"], 400, 250, true, false);
        }
      }

      $data['main_image_url'] = $main_image_url;
      $data['blog_id'] = $blog_id;
      $data['title'] = $this->input->post('title');
      $data['summery'] = $this->input->post('summery');
      $data['blog_category'] = $category_id;
      $data['description'] = $this->input->post('description');
      $data['main_view'] = 0;
      $data['shop_view'] = 0;
      $data['activate'] = 0;
      $this->db->insert('blog', $data);

      $files = 'blog_'.$blog_id.'_*.*';
      $except_file = 'blog_'.$blog_id.'_thumb.jpg';
      $this->crud_model->del_upload_image(IMG_WEB_PATH_BLOG, IMG_PATH_CENTER, $data['description'], $files, $except_file);

      $this->db->update('blog_id', array('added' => 1), array('id' => $blog_id));

      echo 'done';

    } else if ($para1 == 'edit') {

      $page_data['blog_data'] = $this->db->get_where('blog', array('blog_id' => $para2))->result_array();
      $this->load->view('back/admin/blog_edit', $page_data);

    } elseif ($para1 == "update") {

      $blog_id = $para2;
      $category_id = $this->input->post('category_blog');

      if (isset($_FILES["img"])) {
        $error = $this->crud_model->file_validation($_FILES['img'], false);
        if ($error == UPLOAD_ERR_OK) {
          $time = time();
          $file_name = 'blog_' . $blog_id . '.jpg';
          $this->crud_model->upload_image(IMG_PATH_BLOG, $file_name, $_FILES["img"], 400, 250, true, false);
          $main_image_url = base_url() . 'uploads/blog_image/blog_' . $blog_id . '_thumb.jpg?id=' . $time;
          $data['main_image_url'] = $main_image_url;
        }
      } else {
        $blog_category = $this->db->get_where('category_blog', array('category_id' => $category_id))->row();
        if ($blog_category->type == BLOG_TYPE_DEFAULT) {
          $blog = $this->db->get_where('blog', array('blog_id' => $blog_id))->row();
          if ($blog->main_image_url == '') {
            echo '메인 이미지를 첨부해주세요.';
            exit;
          }
        }
      }

      $data['title'] = $this->input->post('title');
      $data['summery'] = $this->input->post('summery');
      $data['blog_category'] = $category_id;
      $data['description'] = $this->input->post('description');

      $this->db->where('blog_id', $blog_id);
      $this->db->update('blog', $data);

      $files = 'blog_'.$blog_id.'_*.*';
      $except_file = 'blog_'.$blog_id.'_thumb.jpg';
      $this->crud_model->del_upload_image(IMG_WEB_PATH_BLOG, IMG_PATH_CENTER, $data['description'], $files, $except_file);

      echo 'done';

    } elseif ($para1 == 'upload_image') {

      $blog_id = $para2;

      if (isset($_FILES["file"])) {
        $error = $this->crud_model->file_validation($_FILES['file'], false);
        if ($error != UPLOAD_ERR_OK) {
          echo json_encode(array('success' => false, 'error' => $error));
        } else {
          $time = gettimeofday();
          $file_name = 'blog_' . $blog_id . '_' . $time['sec'] . $time['usec'] . '.jpg';
          $this->crud_model->upload_image(IMG_PATH_BLOG, $file_name, $_FILES["file"], 400, 0, false, true);
          echo json_encode(array('success' => true, 'filename' => $file_name));
        }
      } else {
        echo json_encode(array('success' => false, 'error' => 4));
      }

    } elseif ($para1 == 'delete') {

      $blog_id = $para2;

//      $this->crud_model->file_dlt('blog', $para2, '.jpg');

      $files = 'blog_'.$blog_id.'_*.*';
      $this->crud_model->del_image(IMG_PATH_BLOG, $files);

      $this->db->where('blog_id', $blog_id);
      $this->db->delete('blog');
      echo 'done';
//      redirect(base_url() . 'admin/blog');

    } elseif ($para1 == 'list') {

      $this->db->order_by('blog_id', 'desc');
      $blogs = $this->db->get('blog')->result_array();
      $all_blogs = array();
      foreach ($blogs as $blog) {
        $blog['category'] = $this->db->get_where('category_blog', array('category_id' => $blog['blog_category']))->row();
        $all_blogs[] = $blog;
      }
      $page_data['all_blogs'] = $all_blogs;
      $this->load->view('back/admin/blog_list', $page_data);

    } elseif ($para1 == 'add') {

      if ($this->session->userdata('admin_login') != 'yes') {
        $this->crud_model->alert_exit('로그인이 필요합니다.');
      }
      $user_id = $this->session->userdata('admin_id');
      $added_id = $this->db->get_where('blog_id', array('user_id' => $user_id, 'added' => 0))->row();
      if (empty($added_id)) {
        $data['user_id'] = $user_id;
        $data['added'] = 0;
        $this->db->set($data);
        $this->db->set('date', 'NOW()', false);
        $this->db->insert('blog_id');
        $blog_id = $this->db->insert_id();
      } else {
        $blog_id = $added_id->id;
      }

      $page_data['blog_id'] = $blog_id;
      $this->load->view('back/admin/blog_add', $page_data);

    } else if ($para1 == 'main_view_set') {

      $blog_id = $para2;
      $req = $_GET['req'];
      if ($req == 'ok') {
        $main_view = 1;
      } else {
        $main_view = 0;
      }

      $query = <<<QUERY
UPDATE blog set main_view={$main_view} where blog_id={$blog_id}
QUERY;
      $this->db->query($query);
      echo 'done';

    } else if ($para1 == 'shop_view_set') {

      $blog_id = $para2;
      $req = $_GET['req'];
      if ($req == 'ok') {
        $main_view = 1;
      } else {
        $main_view = 0;
      }

      $query = <<<QUERY
UPDATE blog set shop_view={$main_view} where blog_id={$blog_id}
QUERY;
      $this->db->query($query);
      echo 'done';

    } else if ($para1 == 'activate_set') {

      $blog_id = $para2;
      $req = $_GET['req'];
      if ($req == 'ok') {
        $activate= 1;
      } else {
        $activate = 0;
      }

      $query = <<<QUERY
UPDATE blog set activate={$activate} where blog_id={$blog_id}
QUERY;
      $this->db->query($query);
      echo 'done';

    } else {

      $page_data['page_name'] = "blog";
      $page_data['all_blogs'] = $this->db->get('blog')->result_array();
      $this->load->view('back/index', $page_data);

    }
  }

  /* center Management */
  function center($para1 = '', $para2 = '', $para3 = '')
  {
    // for login
    $page_data['control'] = "admin";

    if ($this->is_logged() == false) {
      redirect(base_url() . 'admin');
    }

    if ($para1 == 'list') {

      if ($para2 == 'approval') {
        $query = <<<QUERY
select * from center where activate=0 or activate=2 order by center_id desc
QUERY;
        $page_data['all_centers'] = $this->db->query($query)->result_array();
      } else {
        $this->db->order_by('center_id', 'desc');
        $page_data['all_centers'] = $this->db->get_where('center', array('activate' => 1))->result_array();
      }
      $this->load->view('back/admin/center_list', $page_data);

    } else if ($para1 == 'view') {

      $center_data = $this->db->get_where('center', array('center_id' => $para2))->result_array();
      $page_data['user_data'] = $this->db->get_where('user', array('user_id' => $center_data[0]['user_id']))->row();
      $page_data['center_data'] = $center_data;
      $this->load->view('back/admin/center_view', $page_data);

    } else if ($para1 == 'delete') {

      $this->db->where('center_id', $para2);
      $this->db->delete('center');
      echo 'done';

    } else if ($para1 == 'approval') {

      $page_data['center_id'] = $para2;
      $row = $this->db->get_where('center', array('center_id' => $para2))->row();
      $page_data['activate'] = $row->activate;
      $page_data['user_id'] = $row->user_id;
      $this->load->view('back/admin/center_approval', $page_data);

    } else if ($para1 == 'approval_set') {

      $center_id = $para2;
      $user_id = $para3;

      $approval = $this->input->post('approval');
      if ($approval == '0') {
        $activate = 0;
      } else if ($approval == '1') {
        $activate = 1;
      } else {
        $activate = 2;
      }

      $query = <<<QUERY
UPDATE center set activate={$activate},approval_at=NOW() where center_id={$center_id}
QUERY;
      $this->db->query($query);

      $query = <<<QUERY
UPDATE center_category set activate={$activate} where center_id={$center_id}
QUERY;
      $this->db->query($query);

      $query = <<<QUERY
select count(*) as cnt from center where user_id={$user_id} and activate=1
QUERY;
      $center_cnt = $this->db->query($query)->row()->cnt;

      $user_data = $this->db->get_where('user', array('user_id' => $user_id))->row();

      if ($center_cnt > 0) {
        $user_type = ($user_data->user_type | USER_TYPE_CENTER);
        $query = <<<QUERY
UPDATE user set user_type={$user_type} where user_id={$user_id}
QUERY;
        $this->db->query($query);
      } else {
        $user_type = ($user_data->user_type & ~USER_TYPE_CENTER);
        $query = <<<QUERY
UPDATE user set user_type={$user_type} where user_id={$user_id}
QUERY;
        $this->db->query($query);
      }
  
      if ($activate == 1) {
        $user_id = $this->db->get_where('center', array('center_id' => $center_id))->row()->user_id;
        $email = $this->db->get_where('user', array('user_id' => $user_id))->row()->email;
        $this->email_model->get_center_approval_data($email);
        $this->coupon_model->send_coupon_data(COUPON_USER_TYPE_CENTER, $user_data);
//        $this->coupon_model->send_coupon_data(COUPON_USER_TYPE_CENTER_TEACHER, $user_data);
        $this->mts_model->send_center_approval($user_data->phone);
      } else if($activate == 2) {
        $user_id = $this->db->get_where('center', array('center_id' => $center_id))->row()->user_id;
        $email = $this->db->get_where('user', array('user_id' => $user_id))->row()->email;
        $this->email_model->get_center_reject_data($email);
        $this->mts_model->send_reject_approval($user_data->phone, USER_TYPE_CENTER);
      }

      echo 'done';

    }else {
      if ($para1 == 'approval_list') {
        $page_data['page_name'] = "center";
        $page_data['list_type'] = "approval";
//        $query = <<<QUERY
//select * from center where activate=0 or activate=2
//QUERY;
//        $page_data['all_centers'] = $this->db->query($query)->result_array();
      } else {
        $page_data['page_name'] = "center";
        $page_data['list_type'] = "";
//        $page_data['all_centers'] = $this->db->get_where('center', array('activate' => 1))->result_array();
      }
      $this->load->view('back/index', $page_data);
    }
  }
  
  /* studio Management */
  function studio($para1 = '', $para2 = '', $para3 = '')
  {
    // for login
    $page_data['control'] = "admin";
    
    if ($this->is_logged() == false) {
      redirect(base_url() . 'admin');
    }
    
    if ($para1 == 'list') {
      
      if ($para2 == 'approval') {
        $query = <<<QUERY
select * from studio where activate=0 or activate=2 order by studio_id desc
QUERY;
        $page_data['all_studios'] = $this->db->query($query)->result_array();
      } else {
        $this->db->order_by('studio_id', 'desc');
        $page_data['all_studios'] = $this->db->get_where('studio', array('activate' => 1))->result_array();
      }
      $this->load->view('back/admin/studio_list', $page_data);
      
    } else if ($para1 == 'view') {
      
      $page_data['studio_data'] = $this->db->get_where('studio', array('studio_id' => $para2))->result_array();
      $this->load->view('back/admin/studio_view', $page_data);
      
    } else if ($para1 == 'delete') {
      
      $this->db->where('studio_id', $para2);
      $this->db->delete('studio');
      echo 'done';
      
    } else if ($para1 == 'approval') {
      
      $page_data['studio_id'] = $para2;
      $row = $this->db->get_where('studio', array('studio_id' => $para2))->row();
      $page_data['activate'] = $row->activate;
      $page_data['user_id'] = $row->user_id;
      $this->load->view('back/admin/studio_approval', $page_data);
      
    } else if ($para1 == 'approval_set') {
      
      $studio_id = $para2;
      $user_id = $para3;
      
      $approval = $this->input->post('approval');
      if ($approval == '0') {
        $activate = 0;
      } else if ($approval == '1') {
        $activate = 1;
      } else {
        $activate = 2;
      }
      
      $query = <<<QUERY
UPDATE studio set activate={$activate},approval_at=NOW() where studio_id={$studio_id}
QUERY;
      $this->db->query($query);
      
      $query = <<<QUERY
UPDATE studio_category set activate={$activate} where studio_id={$studio_id}
QUERY;
      $this->db->query($query);
 
      if ($activate == 2) {
        $query = <<<QUERY
UPDATE studio_schedule set activate={$activate} where studio_id={$studio_id}
QUERY;
        $this->db->query($query);
        
        $query = <<<QUERY
UPDATE studio_schedule_info set activate={$activate} where studio_id={$studio_id}
QUERY;
        $this->db->query($query);
      }
      
      $query = <<<QUERY
select count(*) as cnt from studio where user_id={$user_id} and activate=1
QUERY;
      $studio_cnt = $this->db->query($query)->row()->cnt;
      
      $user_data = $this->db->get_where('user', array('user_id' => $user_id))->row();
      
      if ($studio_cnt > 0) {
        $user_type = ($user_data->user_type | USER_TYPE_STUDIO);
        $query = <<<QUERY
UPDATE user set user_type={$user_type} where user_id={$user_id}
QUERY;
        $this->db->query($query);
      } else {
        $user_type = ($user_data->user_type & ~USER_TYPE_STUDIO);
        $query = <<<QUERY
UPDATE user set user_type={$user_type} where user_id={$user_id}
QUERY;
        $this->db->query($query);
      }
      
      if ($activate == 1) {
        $user_id = $this->db->get_where('studio', array('studio_id' => $studio_id))->row()->user_id;
        $email = $this->db->get_where('user', array('user_id' => $user_id))->row()->email;
        $this->email_model->get_studio_approval_data($email);
        $this->mts_model->send_studio_approval($user_data->phone);
//        $this->coupon_model->send_coupon_data(COUPON_USER_TYPE_CENTER, $user_data);
      } else if($activate == 2) {
        $user_id = $this->db->get_where('studio', array('studio_id' => $studio_id))->row()->user_id;
        $email = $this->db->get_where('user', array('user_id' => $user_id))->row()->email;
        $this->email_model->get_studio_reject_data($email);
        $this->mts_model->send_reject_approval($user_data->phone, USER_TYPE_STUDIO);
      }
      
      echo 'done';
      
    }else {
      
      if ($para1 == 'approval_list') {
        $page_data['page_name'] = "studio";
        $page_data['list_type'] = "approval";
      } else {
        $page_data['page_name'] = "studio";
        $page_data['list_type'] = "";
      }
      
      $this->load->view('back/index', $page_data);
    }
  }
  /* teacher Management */
  function teacher($para1 = '', $para2 = '', $para3 = '')
  {
    // for login
    $page_data['control'] = "admin";

    if ($this->is_logged() == false) {
      redirect(base_url() . 'admin');
    }

    if ($para1 == 'list') {

      if ($para2 == 'approval') {
        $this->db->order_by('teacher_id', 'desc');
        $query = <<<QUERY
select * from teacher where activate=0 or activate=2 order by teacher_id desc
QUERY;

        $page_data['all_teachers'] = $this->db->query($query)->result_array();
      } else {
        $this->db->order_by('teacher_id', 'desc');
        $page_data['all_teachers'] = $this->db->get_where('teacher', array('activate' => 1))->result_array();
      }
      $this->load->view('back/admin/teacher_list', $page_data);

    } else if ($para1 == 'view') {

      $teacher_data = $this->db->get_where('teacher', array('teacher_id' => $para2))->result_array();
      $page_data['user_data'] = $this->db->get_where('user', array('user_id' => $teacher_data[0]['user_id']))->row();
      $page_data['teacher_data'] = $teacher_data;
      $this->load->view('back/admin/teacher_view', $page_data);

    } else if ($para1 == 'delete') {

      $this->db->where('teacher_id', $para2);
      $this->db->delete('teacher');
      echo 'done';

    } else if ($para1 == 'approval') {

      $page_data['teacher_id'] = $para2;
      $row = $this->db->get_where('teacher', array('teacher_id' => $para2))->row();
      $page_data['activate'] = $row->activate;
      $page_data['user_id'] = $row->user_id;
      $this->load->view('back/admin/teacher_approval', $page_data);

    } else if ($para1 == 'approval_set') {

      $teacher_id = $para2;
      $user_id = $para3;
      $approval = $this->input->post('approval');
      if ($approval == '0') {
        $activate = 0;
      } else if ($approval == '1') {
        $activate = 1;
      } else {
        $activate = 2;
      }

      $this->crud_model->do_teacher_activate($teacher_id, $user_id, $activate);
  
      $user_data = $this->db->get_where('user', array('user_id' => $user_id))->row();
      if ($activate == 1) {
        $user_id = $this->db->get_where('teacher', array('teacher_id' => $teacher_id))->row()->user_id;
        $email = $this->db->get_where('user', array('user_id' => $user_id))->row()->email;
        $this->email_model->get_teacher_approval_data($email);
        
        $this->coupon_model->send_coupon_data(COUPON_USER_TYPE_TEACHER, $user_data);
        $this->mts_model->send_teacher_approval($user_data->phone);
//        $this->coupon_model->send_coupon_data(COUPON_USER_TYPE_CENTER_TEACHER, $user_data);
      } else if($activate == 2) {
        $user_id = $this->db->get_where('teacher', array('teacher_id' => $teacher_id))->row()->user_id;
        $email = $this->db->get_where('user', array('user_id' => $user_id))->row()->email;
        $this->email_model->get_teacher_reject_data($email);
        $this->mts_model->send_reject_approval($user_data->phone, USER_TYPE_TEACHER);
      }

      echo 'done';

    }else {

      if ($para1 == 'approval_list') {
        $page_data['page_name'] = "teacher";
        $page_data['list_type'] = "approval";
        $page_data['all_teachers'] = $this->db->get_where('teacher', array('activate' => 0))->result_array();
      } else {
        $page_data['page_name'] = "teacher";
        $page_data['list_type'] = "";
        $page_data['all_teachers'] = $this->db->get_where('teacher', array('activate' => 1))->result_array();
      }
      $this->load->view('back/index', $page_data);

    }
  }

  function slider($para1 = '', $para2 = '')
  {
    // for login
    $page_data['control'] = "admin";

    if ($this->is_logged() == false) {
      redirect(base_url() . 'admin');
    }

    $type = $para1;

    if ($type == 'add') {

      $this->load->view('back/admin/slider_add');

    } elseif ($type == 'do_add') {

      if (!isset($_FILES["img"])) {
        echo '메인 이미지를 첨부해주세요.';
        exit;
      }

      $this->crud_model->file_validation($_FILES['img']);

      $data['slider_image_url'] = '';
      $data['category'] = $this->input->post('category');
      $data['title'] = $this->input->post('title');
      $data['type'] = $this->input->post('slider_type');
      $data['link'] = $this->input->post('slider_link');
      $data['desc'] = $this->input->post('desc');
      $data['activate'] = 0;
      $this->db->insert('main_slider', $data);
      $slider_id = $this->db->insert_id();

      $time = time();
      $file_name = 'slider_'.$slider_id.'.jpg';
//      $slider_image_url = base_url().'uploads/slider_image/slider_'.$slider_id.'_thumb.jpg?id='.$time;
//      $this->crud_model->upload_image(IMG_PATH_SLIDER, $file_name, $_FILES["img"], 400, 250, true, false);
      $slider_image_url = base_url().'uploads/slider_image/slider_'.$slider_id.'.jpg?id='.$time;
      $this->crud_model->upload_image(IMG_PATH_SLIDER, $file_name, $_FILES["img"], 1000, 0, false, true);

      $upd['slider_image_url'] = $slider_image_url;
      $this->db->where('slider_id', $slider_id);
      $this->db->update('main_slider', $upd);

      echo 'done';
//      redirect(base_url() . "admin/slider");

    } else if ($type == 'approval') { // 안씀

      $slider_id = $para2;

      $page_data['slider_id'] = $slider_id;
      $slider = $this->db->get_where('main_slider', array('slider_id' => $slider_id))->row();
      $page_data['activate'] = $slider->activate;
      $this->load->view('back/admin/slider_approval', $page_data);

    } else if ($type == 'approval_set') {

      $slider_id = $para2;
      $approval = $_GET['req'];
      if ($approval == 'ok') {
        $data['activate'] = 1;
      } else {
        $data['activate'] = 0;
      }

      $query = <<<QUERY
UPDATE main_slider set activate={$data['activate']} where slider_id={$slider_id}
QUERY;
      $this->db->query($query);

      echo 'done';

    } elseif ($type == 'edit') {

      $slider_id = $para2;
      $page_data['slider'] = $this->db->get_where('main_slider', array('slider_id' => $slider_id))->row();
      $this->load->view('back/admin/slider_edit', $page_data);

    } elseif ($type == 'update') {

      $slider_id = $para2;

      if (isset($_FILES["img"])) {
        $error = $this->crud_model->file_validation($_FILES['img'], false);
        if ($error == UPLOAD_ERR_OK) {
          $time = time();
          $file_name = 'slider_'.$slider_id.'.jpg';
//          $slider_image_url = base_url().'uploads/slider_image/slider_'.$slider_id.'_thumb.jpg?id='.$time;
//          $this->crud_model->upload_image(IMG_PATH_SLIDER, $file_name, $_FILES["img"], 400, 250, true, false);
          $slider_image_url = base_url().'uploads/slider_image/slider_'.$slider_id.'.jpg?id='.$time;
          $this->crud_model->upload_image(IMG_PATH_SLIDER, $file_name, $_FILES["img"], 1000, 0, false, true);
          $data['slider_image_url'] = $slider_image_url;
        }
      }

      $data['category'] = $this->input->post('category');
      $data['title'] = $this->input->post('title');
      $data['type'] = $this->input->post('slider_type');
      $data['link'] = $this->input->post('slider_link');
      $data['desc'] = $this->input->post('desc');
      $this->db->set('date', 'NOW()', false);
      $this->db->where('slider_id', $slider_id);
      $this->db->update('main_slider', $data);

      echo 'done';
//      redirect(base_url() . "admin/slider");

    } elseif ($type == 'delete') {

      $slider_id = $para2;
      $this->db->where('slider_id', $slider_id);
      $this->db->delete('main_slider');
      echo 'done';
//      redirect(base_url() . 'admin/slider');

    } elseif ($type == 'list') {

      $this->db->order_by('slider_id', 'desc');
      $page_data['sliders'] = $this->db->get('main_slider')->result();
      $this->load->view('back/admin/slider_list', $page_data);

    } else {

      $page_data['page_name'] = "slider";
      $page_data['sliders'] = $this->db->get('main_slider')->result();
      $this->load->view('back/index', $page_data);

    }

  }

  function shop($para1 = '', $para2 = '', $para3 = '')
  {
    // for login
    $page_data['control'] = "admin";

    if ($this->is_logged() == false) {
      redirect(base_url() . 'admin');
    }

    $type = $para1;
    $sub_type = $para2;

    if ($type == 'product') { // shop items

      $type = $para2;
      $sub_type = $para3;

      if ($type == 'list') {

        if ($sub_type == 'product_approval') {

          $status = SHOP_PRODUCT_STATUS_REQUEST;
          $status2 = SHOP_PRODUCT_STATUS_REJECT;
          $query = <<<QUERY
select a.shop_name,b.product_id,b.product_code,b.status,c.item_cat,c.item_image_url_0,c.item_name,c.item_sell_price
from shop a, shop_product_id b, shop_product c 
where a.shop_id=b.shop_id and b.product_id=c.product_id and b.status>={$status} and b.status<={$status2}
QUERY;
          $page_data['all_products'] = $this->db->query($query)->result_array();
          $this->load->view('back/admin/product_list', $page_data);

        } else {

          $status = SHOP_PRODUCT_STATUS_ON_SALE;
          $query = <<<QUERY
select a.shop_name,b.product_id,b.product_code,b.status,c.item_cat,c.item_image_url_0,c.item_name,c.item_sell_price
from shop a, shop_product_id b, shop_product c 
where a.shop_id=b.shop_id and b.product_id=c.product_id and b.status>={$status}
QUERY;
          $page_data['all_products'] = $this->db->query($query)->result_array();
          $this->load->view('back/admin/product_list', $page_data);

        }


      } else if ($type == 'approval') {

        $product_id = $para3;
        $page_data['product_id'] = $product_id;
        $row = $this->db->get_where('shop_product_id', array('product_id' => $product_id))->row();
        $page_data['status'] = $row->status;
        $this->load->view('back/admin/product_approval', $page_data);

      } else if ($type == 'approval_set') {

        $product_id = $para3;
        $product_data = $this->db->get_where('shop_product_id', array('product_id' => $product_id))->row();
        $shop_data = $this->db->get_where('shop', array('shop_id' => $product_data->shop_id))->row();
        $status = $this->input->post('status');
        if ($shop_data->activate == 0 && $status >= SHOP_PRODUCT_STATUS_ON_SALE) {
          $this->crud_model->alert_exit('샵 승인을 먼저 해주세요');
        } else {
          $query = <<<QUERY
UPDATE shop_product_id set status={$status},approval_at=NOW() where product_id={$product_id}
QUERY;
          $this->db->query($query);
          echo 'done';
        }

      } else if ($type == 'view') {

        $product_id = $para3;
        $query = <<<QUERY
select a.shop_name,b.status,b.register_at,b.approval_at,c.*
from shop a, shop_product_id b, shop_product c 
where a.shop_id=b.shop_id and b.product_id=c.product_id and c.product_id={$product_id}
QUERY;
        $page_data['product'] = $this->db->query($query)->row();
        $this->load->view('back/admin/product_view', $page_data);

      } else if ($type == 'delete') {

        $shop_id = $para3;
        $this->db->where('shop_id', $shop_id);
        $this->db->delete('shop');
        echo 'done';

      } else if ($type == 'edit') {

        $shop_id = $para3;
        $page_data['shop_data'] = $this->db->get_where('shop', array('shop_id' => $shop_id))->result_array();
        $this->load->view('back/admin/shop_edit', $page_data);

      } else { // shop product main

        $page_data['page_name'] = "product";
        $page_data['list_type'] = $type;
        $this->load->view('back/index', $page_data);

      }

    } else { // shops

      if ($type == 'list') {

        if ($sub_type == 'shop_approval') {

          $this->db->order_by('shop_id', 'desc');
          $page_data['all_shops'] = $this->db->get_where('shop', array('activate' => 0))->result_array();
          $this->load->view('back/admin/shop_list', $page_data);

        } else { // shop list

          $this->db->order_by('shop_id', 'desc');
          $page_data['all_shops'] = $this->db->get_where('shop', array('activate' => 1))->result_array();
          $this->load->view('back/admin/shop_list', $page_data);

        }

      } else if ($type == 'approval') {

        $shop_id = $para2;
        $page_data['shop_id'] = $shop_id;
        $row = $this->db->get_where('shop', array('shop_id' => $shop_id))->row();
        $page_data['activate'] = $row->activate;
        $page_data['user_id'] = $row->user_id;
        $this->load->view('back/admin/shop_approval', $page_data);

      } else if ($para1 == 'approval_set') {

        $shop_id = $para2;
        $user_id = $para3;
  
        $shop_data = $this->db->get_where('shop', array('shop_id' => $shop_id))->row();
  
        $approval = $this->input->post('approval');
        if ($approval == 'ok') {
          $data['activate'] = 1;
          if (empty($shop_data->commission_rate) == true || $shop_data->commission_rate == '') {
            $this->crud_model->alert_exit("샵의 수수료율 등 추가정보를 먼저 업데이트 해주세요. commission_rate: {$shop_data->commission_rate}");
          }
          if (isset($shop_data->password) == false || empty($shop_data->password) == true || $shop_data->password == '') {
            $this->crud_model->alert_exit("샵의 비밀번호를 세팅해주세요.");
          }
        } else {
          $data['activate'] = 0;
          $this->db->update('shop_product_id', array('status' => SHOP_PRODUCT_STATUS_REJECT), array('shop_id' => $shop_id));
        }

        $query = <<<QUERY
UPDATE shop set activate={$data['activate']},contract_at=NOW() where shop_id={$shop_id}
QUERY;
        $this->db->query($query);

        $query = <<<QUERY
select count(*) as cnt from shop where user_id={$user_id} and activate=1
QUERY;
        $shop_cnt = $this->db->query($query)->row()->cnt;

        $user_data = $this->db->get_where('user', array('user_id' => $user_id))->row();

        if ($shop_cnt > 0) {
          $user_type = ($user_data->user_type | USER_TYPE_SHOP);
          $query = <<<QUERY
UPDATE user set user_type={$user_type} where user_id={$user_id}
QUERY;
        } else {
          $user_type = ($user_data->user_type & ~USER_TYPE_SHOP);
          $query = <<<QUERY
UPDATE user set user_type={$user_type} where user_id={$user_id}
QUERY;
        }
        $this->db->query($query);
 
        if ($data['activate'] == 1) {
          $this->email_model->get_shop_approval_data($shop_data->shop_name, $shop_data->email);
        }
        
        echo 'done';

      } else if ($type == 'view') {

        $shop_id = $para2;
        $page_data['shop'] = $this->db->get_where('shop', array('shop_id' => $shop_id))->row();
        $this->load->view('back/admin/shop_view', $page_data);

      } else if ($type == 'delete') {

        $shop_id = $para2;
        $this->db->where('shop_id', $shop_id);
        $this->db->delete('shop');
        echo 'done';
  
      } else if ($type == 'add') {
  
        $this->load->view('back/admin/shop_add', $page_data);
  
      } else if ($type == 'do_add') {
  
        $this->load->library('form_validation');
        $this->form_validation->set_rules('shop_name', 'shop_name', 'trim|required|max_length[128]');
        $this->form_validation->set_rules('representative_name', 'representative_name', 'trim|required|max_length[128]');
        $this->form_validation->set_rules('shop_phone', 'shop_phone', 'trim|required|numeric|max_length[32]');
        $this->form_validation->set_rules('shop_items', 'shop_items', 'trim|required|max_length[128]');
        $this->form_validation->set_rules('shop_homepage_url', 'shop_homepage_url', 'trim|required|valid_url|max_length[256]');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|max_length[128]');
        $this->form_validation->set_rules('sns_url', 'sns_url', 'trim|valid_url|max_length[256]');
        $this->form_validation->set_rules('business_license_num', 'business_license_num', 'trim|max_length[32]');
        $this->form_validation->set_rules('business_conditions', 'business_conditions', 'trim|max_length[128]');
        $this->form_validation->set_rules('business_type', 'business_type', 'trim|max_length[128]');
        $this->form_validation->set_rules('commission_rate', 'commission_rate', 'trim|required|numeric|max_length[16]');
        $this->form_validation->set_rules('bank_name', 'bank_name', 'trim|max_length[64]');
        $this->form_validation->set_rules('bank_account_num', 'bank_account_num', 'trim|max_length[32]');
        $this->form_validation->set_rules('bank_depositor', 'bank_depositor', 'trim|max_length[64]');
        $this->form_validation->set_rules('postcode', 'postcode', 'trim|max_length[8]');
        $this->form_validation->set_rules('address_1', 'address_1', 'trim|max_length[128]');
        $this->form_validation->set_rules('address_2', 'address_2', 'trim|max_length[128]');
  
        if ($this->form_validation->run() == FALSE) {
          echo '<br>' . validation_errors();
        } else {
  
          $shop_name = $this->input->post('shop_name');
          $shop_items = $this->input->post('shop_items');
          $shop_phone = $this->input->post('shop_phone');
          $shop_homepage_url = $this->input->post('shop_homepage_url');
          $representative_name = $this->input->post('representative_name');
          $email = $this->input->post('email');
          $sns_url = $this->input->post('sns_url');
          $business_license_num = $this->input->post('business_license_num');
          $business_conditions = $this->input->post('business_conditions');
          $business_type = $this->input->post('business_type');
          $commission_rate = $this->input->post('commission_rate');
          $bank_nmae = $this->input->post('bank_name');
          $bank_account_num = $this->input->post('bank_account_num');
          $bank_depositor = $this->input->post('bank_depositor');
          $postcode = $this->input->post('postcode');
          $address_1 = $this->input->post('address_1');
          $address_2 = $this->input->post('address_2');
          
          $dup = $this->db->get_where('shop', array('shop_name' => $shop_name))->row();
          if (isset($dup) == true && empty($dup) == false) {
            echo '브랜드가 이미 존재합니다';
            exit;
          }
          
          $shop_data = $this->db->get_where('shop', array('email' => $email))->row();
          if (isset($shop_data) == true && empty($shop_data) == false) {
            $password = $shop_data->password;
          } else {
            $password = '';
          }
  
          $data = array(
            'shop_name' => $shop_name,
            'representative_name' => $representative_name,
            'shop_phone' => $shop_phone,
            'shop_items' => $shop_items,
            'shop_homepage_url' => $shop_homepage_url,
            'email' => $email,
            'sns_url' => $sns_url,
            'business_license_num' => $business_license_num,
            'business_conditions' => $business_conditions,
            'business_type' => $business_type,
            'commission_rate' => $commission_rate,
            'bank_name' => $bank_nmae,
            'bank_account_num' => $bank_account_num,
            'bank_depositor' => $bank_depositor,
            'postcode' => $postcode,
            'address_1' => $address_1,
            'address_2' => $address_2,
            'password' => $password,
          );
 
          $this->db->set('register_at', 'NOW()', false);
          $this->db->set('contract_at', 'NOW()', false);
          $this->db->set('unregister_at', 'NOW()', false);
          $this->db->insert('shop', $data);
  
          $shop_id = $this->db->insert_id();
  
          if (isset($_FILES["business_license_img"])) {
            $error = $this->crud_model->file_validation($_FILES['business_license_img'], false);
            if ($error == UPLOAD_ERR_OK) {
              $file_name = 'shop_' . $shop_id . '.jpg';
              $this->crud_model->upload_image(IMG_PATH_SHOP, $file_name, $_FILES["business_license_img"], 0, 0, false, true);
              $time = time();
              $business_image_url = IMG_WEB_PATH_SHOP . $file_name . '?id=' . $time;
              $data['business_license_url'] = $business_image_url;
            } else if ($error != UPLOAD_ERR_NO_FILE) {
              $this->crud_model->file_validation_alert($error);
            }
          }
  
          echo 'done';
        }
        
      } else if ($type == 'edit') {
  
        $shop_id = $para2;
        $page_data['shop_data'] = $this->db->get_where('shop', array('shop_id' => $shop_id))->result_array();
        $this->load->view('back/admin/shop_edit', $page_data);
  
      } elseif ($type == "update") {
  
        $shop_id = $para2;

//        $data = $this->input->post('business_license_num');
//        echo "<script>alert('$data');</script>";
//        exit;
  
        $this->load->library('form_validation');
        $this->form_validation->set_rules('shop_name', 'shop_name', 'trim|required|max_length[128]');
        $this->form_validation->set_rules('representative_name', 'representative_name', 'trim|required|max_length[128]');
        $this->form_validation->set_rules('shop_phone', 'shop_phone', 'trim|required|numeric|max_length[32]');
        $this->form_validation->set_rules('shop_items', 'shop_items', 'trim|required|max_length[128]');
        $this->form_validation->set_rules('shop_homepage_url', 'shop_homepage_url', 'trim|valid_url|required|max_length[256]');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|max_length[128]');
        $this->form_validation->set_rules('sns_url', 'sns_url', 'trim|valid_url|max_length[256]');
        $this->form_validation->set_rules('business_license_num', 'business_license_num', 'trim|max_length[32]');
        $this->form_validation->set_rules('business_conditions', 'business_conditions', 'trim|max_length[128]');
        $this->form_validation->set_rules('business_type', 'business_type', 'trim|max_length[128]');
        $this->form_validation->set_rules('commission_rate', 'commission_rate', 'trim|required|numeric|max_length[16]');
        $this->form_validation->set_rules('bank_name', 'bank_name', 'trim|max_length[64]');
        $this->form_validation->set_rules('bank_account_num', 'bank_account_num', 'trim|max_length[32]');
        $this->form_validation->set_rules('bank_depositor', 'bank_depositor', 'trim|max_length[64]');
        $this->form_validation->set_rules('postcode', 'postcode', 'trim|max_length[8]');
        $this->form_validation->set_rules('address_1', 'address_1', 'trim|max_length[128]');
        $this->form_validation->set_rules('address_2', 'address_2', 'trim|max_length[128]');
  
        if ($this->form_validation->run() == FALSE) {
          echo '<br>' . validation_errors();
        } else {
    
          $shop_name = $this->input->post('shop_name');
          $shop_items = $this->input->post('shop_items');
          $shop_phone = $this->input->post('shop_phone');
          $shop_homepage_url = $this->input->post('shop_homepage_url');
          $representative_name = $this->input->post('representative_name');
          $email = $this->input->post('email');
          $sns_url = $this->input->post('sns_url');
          $business_license_num = $this->input->post('business_license_num');
          $business_conditions = $this->input->post('business_conditions');
          $business_type = $this->input->post('business_type');
          $commission_rate = $this->input->post('commission_rate');
          $bank_nmae = $this->input->post('bank_name');
          $bank_account_num = $this->input->post('bank_account_num');
          $bank_depositor = $this->input->post('bank_depositor');
          $postcode = $this->input->post('postcode');
          $address_1 = $this->input->post('address_1');
          $address_2 = $this->input->post('address_2');
    
          $where = array(
            'shop_id' => $shop_id
          );
          $data = array(
            'shop_name' => $shop_name,
            'representative_name' => $representative_name,
            'shop_phone' => $shop_phone,
            'shop_items' => $shop_items,
            'shop_homepage_url' => $shop_homepage_url,
            'email' => $email,
            'sns_url' => $sns_url,
            'business_license_num' => $business_license_num,
            'business_conditions' => $business_conditions,
            'business_type' => $business_type,
            'commission_rate' => $commission_rate,
            'bank_name' => $bank_nmae,
            'bank_account_num' => $bank_account_num,
            'bank_depositor' => $bank_depositor,
            'postcode' => $postcode,
            'address_1' => $address_1,
            'address_2' => $address_2,
          );
          if (isset($_FILES["business_license_img"])) {
            $error = $this->crud_model->file_validation($_FILES['business_license_img'], false);
            if ($error == UPLOAD_ERR_OK) {
              $file_name = 'shop_' . $shop_id . '.jpg';
              $this->crud_model->upload_image(IMG_PATH_SHOP, $file_name, $_FILES["business_license_img"], 0, 0, false, true);
              $time = time();
              $business_image_url = IMG_WEB_PATH_SHOP . $file_name . '?id=' . $time;
              $data['business_license_url'] = $business_image_url;
            } else if ($error != UPLOAD_ERR_NO_FILE) {
              $this->crud_model->file_validation_alert($error);
            }
          }
    
          $this->db->update('shop', $data, $where);
    
          echo 'done';
//          redirect(base_url() . 'admin/shop');
        }
  
      } else if ($type == 'password') {
  
        $this->load->library('form_validation');
        $this->form_validation->set_rules('password1', 'password1', 'trim|required|max_length[32]');
        $this->form_validation->set_rules('password2', 'password2', 'trim|required|max_length[32]');
  
        if ($this->form_validation->run() == FALSE) {
          $message = '';
          $message .= json_encode(array(
            'password1' => $this->input->post('password1'),
            'password2' => $this->input->post('password2'),
          ));;
          $result['message'] = $message.'<br>' . validation_errors();
          $result['status'] = 'fail';
          echo json_encode($result);
          exit;
        }
  
        $password1 = $this->input->post('password1');
        $password2 = $this->input->post('password2');
        if ($password1 != $password2) {
          $result['status'] = 'fail';
          $result['message'] = "입력하신 비밀번호가 일치하지 않습니다.";
          echo json_encode($result);
          exit;
        }
  
        $r = $this->crud_model->check_pw($password1);
        if ($r[0] == false) {
          $result['status'] = 'fail';
          $result['message'] = $r[1];
          echo json_encode($result);
          exit;
        }

        $shop_id = $this->input->post('shop_id');
        $shop_data = $this->db->get_where('shop', array('shop_id' => $shop_id))->row();
        
        $upd = array(
          'password' => sha1($password1)
        );
        $where = array(
          'email' => $shop_data->email,
        );
        $this->db->update('shop', $upd, $where);
  
        $result['status'] = 'success';
        $result['message'] = '비밀번호 변경에 설공하셨습니다.';
        echo json_encode($result);
        exit;
  
      } else { // shop main

        $page_data['page_name'] = "shop";
        $page_data['list_type'] = $type;
        $this->load->view('back/index', $page_data);

      }

    }

  }
  
  function email($para1 = '', $para2 = '')
  {
    // for login
    $page_data['control'] = "admin";
    
    if ($this->is_logged() == false) {
      redirect(base_url() . 'admin');
    }
    
    $type = $para1;
    
    if ($type == 'add') {
      
      $email = $this->db->get_where('server_email', array('type' => SERVER_EMAIL_TYPE_DEFAULT))->row();
      if (empty($email) == true) {
        $ins = array(
          'type' => SERVER_EMAIL_TYPE_DEFAULT,
          'type_desc' => '',
          'from' => '',
          'from_name' => '',
          'subject' => '',
          'email_body' => '',
          'substitute_Str' => '',
          'mailtype' => '',
          'activate' => 0,
        );
        $this->db->set('create_at', 'NOW()', false);
        $this->db->set('modified_at', 'NOW()', false);
        $this->db->set('approval_at', 'NOW()', false);
        
        $this->db->insert('server_email', $ins);
        
        $email_id = $this->db->insert_id();
      } else {
        $email_id = $email->email_id;
      }
      
      $page_data['email_id'] = $email_id;
      
      $this->load->view('back/admin/email_add', $page_data);
      
    } elseif ($type == 'do_add') {
      
      $email_id = $para2;
      
      $data['type'] = $this->input->post('type');
      $data['type_desc'] = $this->db->get_where('category_email', array('type' => $data['type']))->row()->desc;
      $data['subject'] = $this->input->post('subject');
      $data['from'] = $this->input->post('from');
      $data['from_name'] = $this->input->post('from_name');
      $data['email_body'] = $this->input->post('email_body');
      $data['substitute_str'] = $this->input->post('substitute_str');
      $data['mailtype'] = $this->input->post('mailtype');
      $data['activate'] = 0;
      
      $this->db->set('create_at', 'NOW()', false);
      $this->db->set('modified_at', 'NOW()', false);
      $where = array('email_id' => $email_id);
      $this->db->update('server_email', $data, $where);
  
      $email_body = $this->input->post('email_body');
      $files = 'email_'.$email_id.'_*.*';
      $this->crud_model->del_upload_image(IMG_WEB_PATH_SERVER, IMG_PATH_SERVER, $email_body, $files);

      echo 'done';
    
    } else if ($type == 'approval') { // 안씀
      
      $email_id = $para2;
      
      $page_data['email_id'] = $email_id;
      $email = $this->db->get_where('server_email', array('email_id' => $email_id))->row();
      $page_data['activate'] = $email->activate;
      $this->load->view('back/admin/email_approval', $page_data);
      
    } else if ($type == 'approval_set') {
      
      $email_id = $para2;
      $approval = $_GET['req'];
      if ($approval == 'ok') {
        $data['activate'] = 1;
      } else {
        $data['activate'] = 0;
      }
      
      $query = <<<QUERY
UPDATE server_email set activate={$data['activate']},approval_at=NOW() where email_id={$email_id}
QUERY;
      $this->db->query($query);
      
      echo 'done';
      
    } elseif ($type == 'edit') {
  
      log_message('debug', '[email] data['.json_encode($_POST).']');
      $email_id = $para2;
      $page_data['email'] = $this->db->get_where('server_email', array('email_id' => $email_id))->row();
      $this->load->view('back/admin/email_edit', $page_data);
      
    } elseif ($type == 'update') {
      
      $email_id = $para2;
      
      log_message('debug', '[email] data['.json_encode($_POST).']');
  
      $data['type'] = $this->input->post('type');
//      $data['type_desc'] = $this->db->get_where('category_email', array('type' => $data['type']))->row()->desc;
      $data['subject'] = $this->input->post('subject');
      $data['from'] = $this->input->post('from');
      $data['from_name'] = $this->input->post('from_name');
      $data['email_body'] = $this->input->post('email_body');
      $data['substitute_str'] = $this->input->post('substitute_str');
      $data['mailtype'] = $this->input->post('mailtype');
  
      $this->db->set('modified_at', 'NOW()', false);
      
      $where = array('email_id' => $email_id);
      $this->db->update('server_email', $data, $where);
  
      $email_body = $this->input->post('email_body');
      $files = 'email_'.$email_id.'_*.*';
      $this->crud_model->del_upload_image(IMG_WEB_PATH_SERVER, IMG_PATH_SERVER, $email_body, $files);
  
      echo 'done';
  
    } elseif ($para1 == 'upload_image') {
  
      $email_id = $para2;
  
      if (isset($_FILES["file"])) {
        $error = $this->crud_model->file_validation($_FILES['file'], false);
        if ($error != UPLOAD_ERR_OK) {
          echo json_encode(array('success' => false, 'error' => $error));
        } else {
          $time = gettimeofday();
          $file_name = 'email_' . $email_id . '_' . $time['sec'] . $time['usec'] . '.jpg';
          $this->crud_model->upload_image(IMG_PATH_SERVER, $file_name, $_FILES["file"], 400, 0, false, true);
          echo json_encode(array('success' => true, 'filename' => $file_name));
        }
      } else {
        echo json_encode(array('success' => false, 'error' => 4));
      }
      
    } elseif ($type == 'delete') {
      
      $email_id = $para2;
      $this->db->where('email_id', $email_id);
      $this->db->delete('server_email');
      echo 'done';
    
    } elseif ($type == 'view') {
      
      $email_id = $para2;
      $email = $this->db->get_where('server_email', array('email_id' => $email_id))->row();
      $page_data['email'] = $email;
      $this->load->view('back/admin/email_view', $page_data);
      
    } elseif ($type == 'list') {
    
      $type = SERVER_EMAIL_TYPE_DEFAULT;
      $query = <<<QUERY
select * from server_email where type > {$type} order by email_id desc
QUERY;

      $page_data['emails'] = $this->db->query($query)->result();
      $this->load->view('back/admin/email_list', $page_data);
      
    } else {
      
      $page_data['page_name'] = "email";
      $page_data['emails'] = $this->db->get('server_email')->result();
      $this->load->view('back/index', $page_data);
      
    }
  }
  
  function coupon($para1 = '', $para2 = '')
  {
    // for login
    $page_data['control'] = "admin";
    
    if ($this->is_logged() == false) {
      redirect(base_url() . 'admin');
    }
    
    $type = $para1;
    
    if ($type == 'add') {
      
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
      
      $page_data['coupon_id'] = $coupon_id;
      
      $this->load->view('back/admin/coupon_add', $page_data);
      
    } else if ($type == 'do_add') {
      
      $coupon_id = $para2;
  
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
        echo '유저 / 쿠폰 타입을 정확히 입력해 주세요.';
        exit;
      }
      
      if ($data['user_type'] == COUPON_USER_TYPE_SHOP_PURCHASING) {
        if ($data['coupon_count'] > 0) {
          echo $this->coupon_model->get_coupon_user_type_str(COUPON_USER_TYPE_SHOP_PURCHASING).
            '은 쿠폰수 0(무제한 쿠폰)만 가능합니다.';
          exit;
        }
        if ($data['coupon_type'] == COUPON_TYPE_SHOP_DISCOUNT_PERCENT || $data['coupon_type'] == COUPON_TYPE_SHOP_DISCOUNT_PRICE) {
          echo $this->coupon_model->get_coupon_user_type_str(COUPON_USER_TYPE_SHOP_PURCHASING).
            '은'.$this->coupon_model->get_coupon_type_str(COUPON_TYPE_SHOP_FREE_SHIPPING).' 타입만 가능합니다.';
          exit;
        }
      }
      
      if ($data['user_type'] == COUPON_USER_TYPE_REGISTER) {
        if ($data['coupon_type'] == COUPON_TYPE_SHOP_FREE_SHIPPING) {
          echo $this->coupon_model->get_coupon_user_type_str(COUPON_USER_TYPE_REGISTER).
            '은'.$this->coupon_model->get_coupon_type_str(COUPON_TYPE_SHOP_FREE_SHIPPING).' 타입이 불가능합니다.';
          exit;
        }
      }
  
      if ($data['user_type'] == COUPON_USER_TYPE_CENTER ||
        $data['user_type'] == COUPON_USER_TYPE_TEACHER /* || $data['user_type'] == COUPON_USER_TYPE_CENTER_TEACHER */
      ) {
        if ($data['coupon_count'] > 0) {
          echo $this->coupon_model->get_coupon_user_type_str($data['user_type']).
            '은 쿠폰수 0(무제한 쿠폰)만 가능합니다.';
          exit;
        }
        if ($data['coupon_type'] == COUPON_TYPE_SHOP_FREE_SHIPPING) {
          echo $this->coupon_model->get_coupon_user_type_str($data['user_type']).
            '은'.$this->coupon_model->get_coupon_type_str(COUPON_TYPE_SHOP_FREE_SHIPPING).' 타입이 불가능합니다.';
          exit;
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
  
      echo 'done';
      
//    } else if ($type == 'approval') { // 안씀
//
//      $coupon_id = $para2;
//
//      $page_data['coupon_id'] = $coupon_id;
//      $coupon = $this->db->get_where('server_coupon', array('coupon_id' => $coupon_id))->row();
//      $page_data['activate'] = $coupon->activate;
//      $this->load->view('back/admin/coupon_approval', $page_data);
//
    } else if ($type == 'approval_set') {
      
      $coupon_id = $para2;
      $approval = $_GET['req'];
      if ($approval == 'ok') {
        $data['activate'] = 1;
      } else {
        $data['activate'] = 0;
      }
      
      $query = <<<QUERY
UPDATE server_coupon set activate={$data['activate']} where coupon_id={$coupon_id}
QUERY;
      $this->db->query($query);
      
      if ($this->db->affected_rows() <= 0) {
        echo 'internal error';
        exit;
      }

      echo 'done';
      
    } elseif ($type == 'edit') {
      
      $coupon_id = $para2;
      $page_data['coupon'] = $this->db->get_where('server_coupon', array('coupon_id' => $coupon_id))->row();
      $this->load->view('back/admin/coupon_edit', $page_data);
      
    } elseif ($type == 'update') {
      
      $coupon_id = $para2;
  
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
        echo '유저 / 쿠폰 타입을 정확히 입력해 주세요.';
        exit;
      }
  
      $where = array('coupon_id' => $coupon_id);
      $this->db->update('server_coupon', $data, $where);
  
//      $coupon_desc= $this->input->post('coupon_desc');
//      $files = 'coupon_'.$coupon_id.'_*.*';
//      $this->crud_model->del_upload_image(IMG_WEB_PATH_SERVER, IMG_PATH_SERVER, $coupon_desc, $files);
      
      echo 'done';
      
    } else if ($para1 == 'upload_image') {
      
      $coupon_id = $para2;
      
      if (isset($_FILES["file"])) {
        $error = $this->crud_model->file_validation($_FILES['file'], false);
        if ($error != UPLOAD_ERR_OK) {
          echo json_encode(array('success' => false, 'error' => $error));
        } else {
          $time = gettimeofday();
          $file_name = 'coupon_' . $coupon_id . '_' . $time['sec'] . $time['usec'] . '.jpg';
          $this->crud_model->upload_image(IMG_PATH_SERVER, $file_name, $_FILES["file"], 400, 0, false, true);
          echo json_encode(array('success' => true, 'filename' => $file_name));
        }
      } else {
        echo json_encode(array('success' => false, 'error' => 4));
      }
      
    } elseif ($type == 'delete') {
      
      $coupon_id = $para2;
      $this->db->where('coupon_id', $coupon_id);
      $this->db->delete('server_coupon');
      echo 'done';
      
    } elseif ($type == 'view') {
      
      $coupon_id = $para2;
      $coupon = $this->db->get_where('server_coupon', array('coupon_id' => $coupon_id))->row();
      $page_data['coupon'] = $coupon;
      $this->load->view('back/admin/coupon_view', $page_data);
      
    } elseif ($type == 'list') {
      
      $coupon_type = COUPON_TYPE_DEFAULT;
      $query = <<<QUERY
select * from server_coupon where coupon_type > {$coupon_type} order by coupon_id desc
QUERY;
      
      $page_data['coupons'] = $this->db->query($query)->result();
      $this->load->view('back/admin/coupon_list', $page_data);
      
    } else {
      
      $page_data['page_name'] = "coupon";
      $this->load->view('back/index', $page_data);
      
    }
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
    $page = 'admin';
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
    $page = 'admin';
    if (isset($_GET['p'])) {
      $page = $_GET['p'];
    }
    $this->page_data['page_name'] = $page;
    $this->page_data['msg'] = $msg;
    $this->load->view('front/others/info', $this->page_data);
  }
  
  private function redirect_error($msg = '', $page = 'admin') {
    redirect(base_url().'admin/error?m='.$msg.'&p='.$page);
  }
  
  private function redirect_info($msg = '', $page = 'admin') {
    redirect(base_url().'admin/info?m='.$msg.'&p='.$page);
  }
  
  private function response($result) {
    echo json_encode($result);
    exit;
  }
}
