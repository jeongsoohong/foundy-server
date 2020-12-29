<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Center extends CI_Controller
{
  private $user_id = 0;
  private $center_id = 0;
  private $center = null;
  private $centers = null;
  private $page_data = null;
  
  function __construct()
  {
    parent::__construct();
    $this->load->database();
    
    if (DEV_SERVER == false && $this->uri->segment(2) != 'error') {
      $this->redirect_error();
    }
  
    defined('IMG_PATH_CENTER')   OR define('IMG_PATH_CENTER', '/web/public_html/uploads/center_image/');
    defined('IMG_WEB_PATH_CENTER')   OR define('IMG_WEB_PATH_CENTER', base_url().'uploads/center_image/');
    
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
  }
  
  /* index of the admin. Default: Dashboard; On No Login Session: Back to login page. */
  function index()
  {
    if ($this->is_logged() == false) {
      // for login
      $this->page_data['control'] = "center";
      $this->load->view('back/login', $this->page_data);
    } else {
      redirect(base_url() . 'center/account', 'refresh');
    }
  }
  
  /* Checking Login Stat */
  function is_logged()
  {
    $this->page_data = array();
    if ($this->session->userdata('center_login') == 'yes') {
//      $shops = json_decode($this->session->userdata('shops'));
      $this->user_id = $this->session->userdata('user_id');
      $this->center_id = $this->session->userdata('center_id');
      $this->center = $this->db->get_where('center', array('center_id' => $this->center_id))->row();
      $this->centers = $this->db->get_where('center', array('user_id' => $this->user_id, 'activate' => 1))->result();
      $this->page_data['center'] = $this->center;
      $this->page_data['centers'] = $this->centers;
      
      if (empty($this->center)) {
        echo ("<script>alert('센터회원이 아닙니다');</script>");
        exit;
      }
  
      $user_data = $this->db->get_where('user', array('user_id' => $this->center->user_id))->row();
      if (!($user_data->user_type & USER_TYPE_CENTER)) {
        echo ("<script>alert('센터회원이 아닙니다');</script>");
        exit;
      }
  
      if ($user_data->user_id != $this->session->userdata('user_id')) {
        echo ("<script>alert('권한이 없습니다.');</script>");
        exit;
      }
  
      if ($this->center->activate == 0) {
        echo ("<script>alert('승인 대기 중입니다');</script>");
        exit;
      }
  
      return true;
    } else {
      return false;
    }
  }
  
  /* Loging out from Admin panel */
  function logout()
  {
//    $this->session->sess_destroy();
    $this->session->set_userdata('center_login', 'no');
    redirect(base_url() . 'center', 'refresh');
  }
  
  /* Login into Admin panel */
  function login($para1 = '', $para2 = '')
  {
    if ($para1 == 'forget_form') {
      
      $this->page_data['control'] = 'center';
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
  
        $center_data = $this->db->get_where('center', array('user_id' => $user_data->user_id, 'activate' => 1))->row();
        if (isset($center_data) && empty($center_data) == false) {
          
          $code = rand(111111, 999999);
          
          if ($this->email_model->get_user_approval_data($code, $email)) {
            
            $this->session->set_userdata('shop_approval_email', $email);
            $this->session->set_userdata('shop_approval_code', $code);
            echo 'done';
          } else {
            echo '이메일 전송에 문제가 발생했습니다!';
          }
        } else {
          echo '존재하지 않는 이메일입니다!';
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
  
        $approval_email = $this->session->userdata('shop_approval_email');
        $approval_code = $this->session->userdata('shop_approval_code');
  
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
  
        $center_data = $this->db->get_where('center', array('user_id' => $user_data->user_id, 'activate' => 1))->row();
        if (isset($center_data) && empty($center_data) == false) {
    
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
        } else {
          $result['status'] = 'fail';
          $result['message'] = '회원 정보가 존재하지 않습니다!';
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
        if ($auth->for != $for || $for != 'center_forget_passwd') {
          $this->redirect_error('접근 오류가 발생하였습니다!(3)', 'close');
        }
  
        $auth_data = json_decode($auth->auth_data);
        $user_data = $this->db->get_where('user', array('phone' => $auth_data->mobileno))->row();
        if (!isset($user_data) && empty($user_data) == true) {
          $this->redirect_error('회원 정보가 존재하지 않습니다!', 'close');
        }
  
        $center_data = $this->db->get_where('center', array('user_id' => $user_data->user_id, 'activate' => 1))->row();
        if(isset($center_data) && empty($center_data) == false) {
    
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
          $this->redirect_error('회원 전화번호가 아닙니다!', 'close');
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
        
//        $this->db->order_by('center_id', 'asc');
        $user = $this->db->get_where('user', array('email' => $email))->row();
        if (empty($user) == false) {
          if ($user->password != $password) {
            echo '비밀번호가 잘못되었습니다.';
            exit;
          }
          $centers = $this->db->get_where('center', array('user_id' => $user->user_id, 'activate' => 1))->result();
          if (empty($centers)) {
            echo '센터 회원이 아닙니다.';
            exit;
          }
          $this->session->set_userdata('center_login', 'yes');
          $this->session->set_userdata('user_id', $user->user_id);
          $this->session->set_userdata('center_id', $centers[0]->center_id);
          echo 'lets_login';
        } else {
          echo '이메일이 잘못되었습니다.';
        }
      }
      
    }
  }
  
  function change()
  {
    $center_id = $this->input->get('id');
    
    $center_data = $this->db->get_where('center', array('center_id' => $center_id))->row();
    if (empty($center_data)) {
      $this->crud_model->alert_exit('센터가 존재하지 않습니다');
    }
    if ($center_data->activate != 1) {
      $this->crud_model->alert_exit('승인 대기 중입니다.');
    }
    
    $this->session->set_userdata('center_id', $center_id);
    echo 'done';
  }
  
  function account($para1 = '', $para2 = '', $para3 = '')
  {
    if ($this->is_logged() == false) {
      redirect(base_url() . 'center', 'refresh');
    }
  
    $center_id = $this->center_id;
 
    if ($para1 == 'profile') {
    
      if ($para2 == 'update') {
  
        $center_data = $this->center;
//        if (empty($center_data)) {
//          echo ("<script>alert('센터회원이 아닙니다');</script>");
//          exit;
//        }
//
//        $user_data = $this->db->get_where('user', array('user_id' => $center_data->user_id))->row();
//        if (!($user_data->user_type & USER_TYPE_CENTER)) {
//          echo ("<script>alert('센터회원이 아닙니다');</script>");
//          exit;
//        }
//
//        if ($user_data->user_id != $this->session->userdata('user_id')) {
//          echo ("<script>alert('권한이 없습니다.');</script>");
//          exit;
//        }
//
//        if ($center_data->activate == 0) {
//          echo ("<script>alert('승인 대기 중입니다');</script>");
//          exit;
//        }
  
        $this->load->library('form_validation');
        $this->form_validation->set_rules('phone', 'center-phone', 'trim|required|numeric|max_length[16]');
        $this->form_validation->set_rules('address', 'center-address', 'trim|required|max_length[256]');
        $this->form_validation->set_rules('address-detail', 'center-address-detail', 'trim|max_length[256]');
        $this->form_validation->set_rules('latitude', 'center-latitude', 'trim|required|max_length[32]');
        $this->form_validation->set_rules('longitude', 'center-longitude', 'trim|required|max_length[32]');
  
        if ($this->form_validation->run() == FALSE) {
          echo '<br>' . validation_errors();
        } else {
          $phone = $this->input->post('phone');
          $address = $this->input->post('address');
          $address_detail = $this->input->post('address-detail');
          $longitude = $this->input->post('longitude');
          $latitude = $this->input->post('latitude');
          $categories_yoga = json_decode($this->input->post('category_yoga'));
          $categories_pilates = json_decode($this->input->post('category_pilates'));
          $shower = $this->input->post('shower');
          $towel = $this->input->post('towel');
          $parking = $this->input->post('parking');
          $valet = $this->input->post('valet');
    
          if (!empty(($this->input->post('category_yoga_etc')))) {
            if (isset($categories_yoga) && count($categories_yoga)) {
              $categories_yoga = array_merge($categories_yoga, explode(' ', trim($this->input->post('category_yoga_etc'))));
            } else {
              $categories_yoga = explode(' ', trim($this->input->post('category_yoga_etc')));
            }
          }
    
          if (!empty($categories_yoga) && count($categories_yoga)) {
            $categories_yoga = array_filter(array_map('trim', $categories_yoga));
          }
    
          if (!empty(($this->input->post('category_pilates_etc')))) {
            if (isset($categories_pilates) && count($categories_pilates)) {
              $categories_pilates = array_merge($categories_pilates, explode(' ', trim($this->input->post('category_pilates_etc'))));
            } else {
              $categories_pilates = explode(' ', trim($this->input->post('category_pilates_etc')));
            }
          }
    
          if (!empty($categories_pilates) && count($categories_pilates)) {
            $categories_pilates = array_filter(array_map('trim', $categories_pilates));
          }
    
          if ((empty($categories_yoga) && empty($categories_pilates)) || (count($categories_yoga) == 0 && count($categories_pilates) == 0)) {
            echo ("<script>alert('최소 하나의 분류를 선택해주세요');</script>");
            exit;
          }
    
          if (empty($shower) || strlen($shower) == 0) {
            $shower = 0;
          } else {
            $shower = 1;
          }
          if (empty($towel) || strlen($towel) == 0) {
            $towel = 0;
          } else {
            $towel = 1;
          }
          if (empty($parking) || strlen($parking) == 0) {
            $parking = 0;
          } else {
            $parking = 1;
          }
          if (empty($valet) || strlen($valet) == 0) {
            $valet = 0;
          } else {
            $valet = 1;
          }
    
          $cats = $this->db->get_where('center_category', array('center_id' => $center_id, 'type' => CENTER_TYPE_YOGA))->result();
          $already_categories = array();
          foreach ($cats as $c) {
            $already_categories[] = $c->category;
          }
    
          // insert category
          $diff_cats = array_diff($categories_yoga, $already_categories);
          foreach ($diff_cats as $c) {
            $ins = array(
              'center_id' => $center_id,
              'category' => $c,
              'type' => CENTER_TYPE_YOGA,
              'activate' => 1
            );
            $this->db->insert('center_category', $ins);
          }
    
          // del category
          $diff_cats = array_diff($already_categories, $categories_yoga);
          foreach ($diff_cats as $c) {
            $del = array(
              'center_id' => $center_id,
              'category' => $c,
              'type' => CENTER_TYPE_YOGA
            );
            $this->db->delete('center_category', $del);
          }
    
          $cats = $this->db->get_where('center_category', array('center_id' => $center_id, 'type' => CENTER_TYPE_PILATES))->result();
          $already_categories = array();
          foreach ($cats as $c) {
            $already_categories[] = $c->category;
          }
    
          // insert category
          $diff_cats = array_diff($categories_pilates, $already_categories);
          foreach ($diff_cats as $c) {
            $ins = array(
              'center_id' => $center_id,
              'category' => $c,
              'type' => CENTER_TYPE_PILATES,
              'activate' => 1
            );
            $this->db->insert('center_category', $ins);
          }
    
          // del category
          $diff_cats = array_diff($already_categories, $categories_pilates);
          foreach ($diff_cats as $c) {
            $del = array(
              'center_id' => $center_id,
              'category' => $c,
              'type' => CENTER_TYPE_PILATES
            );
            $this->db->delete('center_category', $del);
          }
    
          $this->db->where(array('center_id' => $center_id));
          $this->db->set('location', "ST_GeomFromText('POINT({$longitude} {$latitude})')", false);
          $this->db->update('center_location');
    
          $upd = array(
            'phone' => $phone,
            'address' => $address,
            'address_detail' => $address_detail,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'shower' => $shower,
            'towel' => $towel,
            'parking' => $parking,
            'valet' => $valet,
          );
          $where = array (
            'center_id' => $center_id
          );
          $this->db->update('center', $upd, $where);
    
          echo "done";
        }
      
      }
      
    } else if ($para1 == 'info') {
  
      //Upload image summernote
      if ($para2 == 'upload_image') {
    
        if (isset($_FILES["file"])) {
          $error = $this->crud_model->file_validation($_FILES['file'], false);
          if ($error != UPLOAD_ERR_OK) {
            echo json_encode(array('success' => false, 'error' => $error));
          } else {
            $time = gettimeofday();
            $file_name = 'center_' . $center_id . '_' . $time['sec'] . $time['usec'] . '.jpg';
            $this->crud_model->upload_image(IMG_PATH_CENTER, $file_name, $_FILES["file"], 800, 0, false, true);
            echo json_encode(array('success' => true, 'filename' => $file_name));
          }
        } else {
          echo json_encode(array('success' => false, 'error' => 4));
        }
    
      } else if ($para2 == 'update') { // save info
    
        $center_data = $this->db->get_where('center', array('center_id' => $center_id))->row();
        $user_id = $this->session->userdata('user_id');
        if ($center_data->user_id != $user_id) {
          $this->crud_model->alert_exit("권한이 없습니다, $center_id, $center_data->user_id, $user_id ", base_url() . 'center');
        }
    
        $info = $this->input->post('info');
        $files = 'center_' . $center_id . '_*.*';
        $this->crud_model->del_upload_image(IMG_WEB_PATH_CENTER, IMG_PATH_CENTER, $info, $files);
    
        $upd = array('info' => $info);
        $where = array('center_id' => $center_id);
        $this->db->update('center', $upd, $where);
    
        echo 'done';
    
      }
  
    } else if ($para1 == 'about') {
 
      if ($para2 == 'update') {
  
        $center_data = $this->db->get_where('center', array('center_id' => $center_id))->row();
        $user_id = $this->session->userdata('user_id');
        if ($center_data->user_id != $user_id) {
          $this->crud_model->alert_exit("권한이 없습니다, $center_id, $center_data->user_id, $user_id ", base_url() . 'center');
        }
  
        $about = $this->input->post('about');
        $upd = array('about' => $about);
        $where = array('center_id' => $center_id);
        $this->db->update('center', $upd, $where);
  
        echo 'done';
      
      }
  
    } else { // index page
  
      $category_yoga_data = array();
      $categories = $this->db->get_where('center_category', array('center_id' => $this->center_id, 'type' => CENTER_TYPE_YOGA))->result();
      foreach ($categories as $c) {
        $category_yoga_data[] = $c->category;
      }
  
      $categories = array();
      $category_center = $this->db->get_where('category_center', array('activate' => 1, 'type' => CENTER_TYPE_YOGA))->result();
      foreach ($category_center as $c) {
        $categories[] = $c->name;
      }
  
      $category_yoga_etc = '';
      $categories = array_values(array_diff($category_yoga_data, $categories));
      foreach ($categories as $c) {
        $category_yoga_etc .= $c.' ';
      }
  
      $category_pilates_data = array();
      $categories = $this->db->get_where('center_category', array('center_id' => $this->center_id, 'type' => CENTER_TYPE_PILATES))->result();
      foreach ($categories as $c) {
        $category_pilates_data[] = $c->category;
      }
  
      $categories = array();
      $category_center = $this->db->get_where('category_center', array('activate' => 1, 'type' => CENTER_TYPE_PILATES))->result();
      foreach ($category_center as $c) {
        $categories[] = $c->name;
      }
  
      $category_pilates_etc = '';
      $categories = array_values(array_diff($category_pilates_data, $categories));
      foreach ($categories as $c) {
        $category_pilates_etc .= $c.' ';
      }
  
      $this->page_data['category_yoga_data'] = $category_yoga_data;
      $this->page_data['category_yoga_etc'] = $category_yoga_etc;
      $this->page_data['category_pilates_data'] = $category_pilates_data;
      $this->page_data['category_pilates_etc'] = $category_pilates_etc;
  
      $this->page_data['page_name'] = "account";
      $this->load->view('back/center/index', $this->page_data);
      
    }
  }
  
  function teacher($para1 = '', $para2 = '', $para3 = '')
  {
    if ($this->is_logged() == false) {
      redirect(base_url() . 'center', 'refresh');
    }
    
    if ($para1 == 'list') { // teacher list
  
      $page = 1;
      if (isset($_GET['page'])) {
        $page = (int)$_GET['page'];
      }
      $size = CENTER_ADMIN_ITEM_LIST_PAGE_SIZE;
      $offset = $size * ($page - 1);
  
      $query = <<<QUERY
select count(*) as cnt from center_teacher where center_id={$this->center_id}
QUERY;
      $total_cnt = $this->db->query($query)->row()->cnt;

      $teachers = array();
      if ($total_cnt) {
        $teachers = $this->db->limit($size, $offset)->order_by('updated_at', 'desc')->get_where('center_teacher', array('center_id' => $this->center_id))->result();
        foreach ($teachers as $teacher) {
          $teacher->data = $this->db->get_where('teacher', array('teacher_id' => $teacher->teacher_id))->row();
          $teacher->user = $this->db->get_where('user', array('user_id' => $teacher->data->user_id))->row();
        }
      }
 
//      $this->crud_model->alert_exit(json_encode($teachers));
      
      $total = (int)($total_cnt / $size) + ($total_cnt % $size > 0 ? 1 : 0);
      $prev = $page > 1 ? $page - 1 : 0;
      $next = $total > $page ? $page + 1 : 0;
  
      $this->page_data['total_cnt'] = $total_cnt;
      $this->page_data['total'] = $total;
      $this->page_data['prev'] = $prev;
      $this->page_data['page'] = $page;
      $this->page_data['next'] = $next;
  
      $this->page_data['teachers'] = $teachers;
      $this->load->view('back/center/teacher_list', $this->page_data);
    
    } else if ($para1 == 'join') {
  
      $this->load->library('form_validation');
      $this->form_validation->set_rules('teacher_id', 'teacher_id', 'trim|required|is_natural|max_length[10]');
      if ($this->form_validation->run() == FALSE) {
        echo validation_errors();
        exit;
      }
      $teacher_id = $this->input->post('teacher_id');
  
      $ins = array(
        'center_id' => $this->center_id,
        'teacher_id' => $teacher_id,
        'activate' => 1,
      );
      $this->db->set('updated_at', 'NOW()', false);
      $this->db->insert('center_teacher', $ins);
  
      if ($this->db->affected_rows()) {
        echo 'done';
      } else {
        echo 'fail : internal error';
      }
  
    } else if ($para1 == 'leave') {
  
      $this->load->library('form_validation');
      $this->form_validation->set_rules('teacher_ids', 'teacher_ids', 'trim|required|max_length[100]');
      if ($this->form_validation->run() == FALSE) {
        echo validation_errors();
        exit;
      }
      $teacher_ids = json_decode($this->input->post('teacher_ids'));
      foreach ($teacher_ids as $teacher_id) {
        $this->db->delete('center_teacher', array('center_id' => $this->center_id, 'teacher_id' => $teacher_id));
      }

      echo 'done';
  
    } else if ($para1 == 'activate') {
  
      $this->load->library('form_validation');
      $this->form_validation->set_rules('teacher_id', 'teacher_id', 'trim|required|is_natural|max_length[10]');
      $this->form_validation->set_rules('activate', 'activate', 'trim|required|is_natural|less_than_equal_to[1]');
      if ($this->form_validation->run() == FALSE) {
        echo validation_errors();
        exit;
      }
      $teacher_id = json_decode($this->input->post('teacher_id'));
      $activate = json_decode($this->input->post('activate'));

      $upd['activate'] = $activate;
      $where['center_id'] = $this->center_id;
      $where['teacher_id'] = $teacher_id;
      $this->db->set('updated_at', 'NOW()', false);
      $this->db->update('center_teacher', $upd, $where);
 
      if ($this->db->affected_rows()) {
        echo 'done';
      } else {
        echo 'fail : internal error';
      }
  
    } else if ($para1 == 'search') { // center/teacher/search
  
      $this->load->library('form_validation');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
      if ($this->form_validation->run() == FALSE) {
        echo validation_errors();
        exit;
      }
  
      $email = $this->input->post('email');
  
      $user_data = $this->db->get_where('user', array('email' => $email))->row();
      if (empty($user_data)) {
        $result['status'] = 'fail';
        $result['message'] = "존재하지 않는 이메일입니다.";
        echo json_encode($result);
        exit;
      }
  
      if ($user_data->teacher_id == 0) {
        $result['status'] = 'fail';
        $result['message'] = "강사회원이 아닙니다.";
        echo json_encode($result);
        exit;
      }
  
      $teacher_data = $this->db->get_where('teacher', array('user_id' => $user_data->user_id))->row();
      if (empty($teacher_data)) {
        $result['status'] = 'fail';
        $result['message'] = "오류가 발생했습니다. 관리자에게 문의 바랍니다.";
        echo json_encode($result);
        exit;
      }
  
      if ($teacher_data->activate != 1) {
        $result['status'] = 'fail';
        $result['message'] = "해당 강사는 활동 중이 아닙니다";
        echo json_encode($result);
        exit;
      }
  
      $center_teacher = $this->db->get_where('center_teacher', array('center_id' => $this->center_id, 'teacher_id' => $teacher_data->teacher_id))->row();
      if (isset($center_teacher) == true && empty($center_teacher) == false) {
        $result['status'] = 'fail';
        $result['message'] = "이미 등록된 강사입니다.";
        echo json_encode($result);
        exit;
      }
  
      $result['status'] = 'done';
      $result['teacher_name'] = $teacher_data->name;
      $result['teacher_email'] = $user_data->email;
      $result['teacher_id'] = $teacher_data->teacher_id;
  
      echo json_encode($result);
  
    } else if ($para1 == 'schedule') {
      
      if ($para2 == 'calendar') {
        $year = isset($_GET['y']) ? $_GET['y'] : date('Y');
        $month = isset($_GET['m']) ? $_GET['m'] : date('m');
        $open_date = isset($_GET['d']) ? $_GET['d'] : date('Y-m-d');
  
        $first_time = strtotime($year . '-' . $month . '-01 00:00:00');
  
        $start_week = date('w', $first_time); // 1. 시작 요일
        $total_day = date('t', $first_time); // 2. 현재 달의 총 날짜
        $total_week = ceil(($total_day + $start_week) / 7);  // 3. 현재 달의 총 주차
        $last_month_total_day = date('t', $first_time - 1);

//        $this->crud_model->alert_exit($start_week.'.'.$total_day.'.'.$total_week);
  
        $this->page_data['center_id'] = $this->center_id;
        $this->page_data['year'] = $year;
        $this->page_data['month'] = $month;
        $this->page_data['open_date'] = $open_date;
        $this->page_data['start_week'] = $start_week;
        $this->page_data['total_day'] = $total_day;
        $this->page_data['total_week'] = $total_week;
        $this->page_data['last_month_total_day'] = $last_month_total_day;
        $this->load->view('back/center/schedule_calendar', $this->page_data);
  
      } else if ($para2 == 'list') {
        
        if (isset($_GET['date']) == false) {
          $this->redirect_error('비정상적인 접근입니다!');
        }
        
        $date = $_GET['date'];
        $schedules = $this->db->order_by('start_time', 'asc')->get_where('center_schedule_info', array('center_id' => $this->center_id, 'schedule_date' => $date, 'activate' => 1))->result();
        foreach ($schedules as $class) {
          if ($class->reservable) {
            $class->reserve = $this->center_model->get_schedule_reserve_cnt($class->schedule_info_id);
          }
          if ($class->waitable) {
            $class->wait = $this->center_model->get_schedule_wait_cnt($class->schedule_info_id);
          }
        }
  
        $this->page_data['classes'] = $schedules;
        $this->page_data['page_name'] = "teacher";
        $this->load->view('back/center/schedule_list', $this->page_data);
  
      } else if ($para2 == 'status') {
  
        if (isset($_GET['id']) == false) {
          $this->redirect_error('비정상적인 접근입니다!');
        }
  
        $schedule_info_id = $_GET['id'];
        
        $reserve_list = $this->center_model->get_schedule_reserve_list($schedule_info_id);
        foreach ($reserve_list as $reserve_info) {
          $reserve_info->member = $this->db->get_where('center_ticket_member', array('member_id' => $reserve_info->member_id))->row();
        }
        $wait_list = $this->center_model->get_schedule_wait_list($schedule_info_id);
        foreach ($wait_list as $wait_info) {
          $wait_info->member = $this->db->get_where('center_ticket_member', array('member_id' => $wait_info->member_id))->row();
        }
        
        $this->page_data['reserve_list'] = $reserve_list;
        $this->page_data['wait_list'] = $wait_list;
        $this->page_data['page_name'] = "teacher";
        $this->load->view('back/center/schedule_status', $this->page_data);
  
      } else if ($para2 == 'edit') {
        
        if ($para3 == 'do') {
  
          $this->load->library('form_validation');
          $this->form_validation->set_rules('id', 'id', 'trim|required|is_natural|max_length[10]');
          $this->form_validation->set_rules('start_time', 'start_time', 'trim|required|max_length[8]');
          $this->form_validation->set_rules('end_time', 'end_time', 'trim|required|max_length[8]');
          $this->form_validation->set_rules('schedule_title', 'schedule_title', 'trim|required|max_length[25]');
          $this->form_validation->set_rules('teacher_id', 'teacher_id', 'trim|required|max_length[10]');
          $this->form_validation->set_rules('reservable', 'reservable', 'trim|required|is_natural|less_than_equal_to[1]');
          $this->form_validation->set_rules('reservable_number', 'reservable_number', 'trim|required|is_natural|max_length[5]');
          $this->form_validation->set_rules('tickets', 'tickets', 'trim|required|max_length[100]');
          $this->form_validation->set_rules('open_immediate', 'open_immediate', 'trim|required|is_natural|less_than_equal_to[1]');
          $this->form_validation->set_rules('reserve_open_hour', 'reserve_open_hour', 'trim|required|is_natural|max_length[5]');
          $this->form_validation->set_rules('reserve_close_hour', 'reserve_close_hour', 'trim|required|is_natural|max_length[5]');
          $this->form_validation->set_rules('reserve_cancel_open_hour', 'reserve_cancel_open_hour', 'trim|required|is_natural|max_length[5]');
          $this->form_validation->set_rules('reserve_cancel_close_hour', 'reserve_cancel_close_hour', 'trim|required|is_natural|max_length[5]');
          $this->form_validation->set_rules('waitable', 'waitable', 'trim|required|is_natural|less_than_equal_to[1]');
          $this->form_validation->set_rules('waitable_number', 'waitable_number', 'trim|required|is_natural|max_length[5]');
  
          if ($this->form_validation->run() == FALSE) {
            echo '<br>' . validation_errors();
            exit;
          }
  
          $schedule_info_id = $this->input->post('id');
          $start_time = date('H:i:s', strtotime($this->input->post('start_time')));
          $end_time = date('H:i:s', strtotime($this->input->post('end_time')));
          $schedule_title = $this->input->post('schedule_title');
          $teacher_id = $this->input->post('teacher_id');
          $teacher_name = $this->input->post('teacher_name');
          $reservable = $this->input->post('reservable');
          $reservable_number = $this->input->post('reservable_number');
          $tickets = json_decode($this->input->post('tickets'));
          $open_immediate = $this->input->post('open_immediate');
          $reserve_open_hour = $this->input->post('reserve_open_hour');
          $reserve_close_hour = $this->input->post('reserve_close_hour');
          $reserve_cancel_open_hour = $this->input->post('reserve_cancel_open_hour');
          $reserve_cancel_close_hour = $this->input->post('reserve_cancel_close_hour');
          $waitable = $this->input->post('waitable');
          $waitable_number = $this->input->post('waitable_number');

//        log_message('debug', '[schedule] start_time['.$start_time.'] end_time['.$end_time.']');
  
          $result['status'] = 'done';
          $result['message'] = '성공하였습니다!';

          if (strtotime($start_time) > strtotime($end_time) - 10 * ONE_MINUTE) {
            $result['status'] = 'fail';
            $result['message'] = '스케줄 시간을 정확히 입력해주세요!';
            $this->response($result);
          }
  
          if ($reservable == true) {
            if ($open_immediate == false) {
              if ($reserve_open_hour < $reserve_close_hour) {
                $result['status'] = 'fail';
                $result['message'] = '예약 가능 시간을 정확히 입력해주세요!';
                $this->response($result);
              }
              if ($reserve_cancel_open_hour < $reserve_cancel_close_hour) {
                $result['status'] = 'fail';
                $result['message'] = '취소 가능 시간을 정확히 입력해주세요!';
                $this->response($result);
              }
            } else {
              $reserve_open_hour = 0;
              $reserve_cancel_open_hour = 0;
            }
          } else {
            $reserve_open_hour = 0;
            $reserve_close_hour = 0;
            $reserve_cancel_open_hour = 0;
            $reserve_cancel_close_hour = 0;
          }
          
          // limit check
          if ($reservable == true) {
            if ($reservable_number < 1 || $reservable_number > 100) {
              $result['status'] = 'fail';
              $result['message'] = '예약 정원은 최소 1명 / 최대 100명 등록 가능합니다!';
              $this->response($result);
            }
          }
          if ($waitable == true) {
            if ($waitable_number < 1 || $waitable_number> 100) {
              $result['status'] = 'fail';
              $result['message'] = '대기 정원은 최소 1명 / 최대 100명 등록 가능합니다!';
              $this->response($result);
            }
          }
          if ($open_immediate == true) {
            if ($reserve_close_hour > 12) {
              $result['status'] = 'fail';
              $result['message'] = '예약 마감 시간은 수업 12시간전까지 가능합니다!';
              $this->response($result);
            }
            if ($reserve_cancel_close_hour > 12) {
              $result['status'] = 'fail';
              $result['message'] = '취소 가능 시간은 수업 12시간전까지 가능합니다!';
              $this->response($result);
            }
          } else {
            if ($reserve_open_hour > 30 * 24) {
              $result['status'] = 'fail';
              $result['message'] = '예약 시작 시간은 수업 30일전까지 가능합니다!';
              $this->response($result);
            }
            if ($reserve_close_hour > 48) {
              $result['status'] = 'fail';
              $result['message'] = '예약 마감 시간은 수업 48시간전까지 가능합니다!';
              $this->response($result);
            }
            if ($reserve_cancel_open_hour > 30 * 24) {
              $result['status'] = 'fail';
              $result['message'] = '취소 시작 시간은 수업 30일전까지 가능합니다!';
              $this->response($result);
            }
            if ($reserve_cancel_close_hour > 48) {
              $result['status'] = 'fail';
              $result['message'] = '취소 마감 시간은 수업 48시간전까지 가능합니다!';
              $this->response($result);
            }
          }
  
          if ($teacher_id == 0) {
            $result['status'] = 'fail';
            $result['message'] = '강사를 선택해주세요!';
            $this->response($result);
          }
  
          if ($teacher_id == -1) {
            if (empty($teacher_name) || strlen($teacher_name) == 0) {
              $result['status'] = 'fail';
              $result['message'] = '강사이름을 입력해 주세요!';
              $this->response($result);
            }
          } else {
            $teacher = $this->db->get_where('teacher', array('teacher_id' => $teacher_id))->row();
            if (empty($teacher)) {
              $result['status'] = 'fail';
              $result['message'] = '강사가 존재하지 않습니다!';
              $this->response($result);
            }
            $teacher_name = $teacher->name;
          }
  
          $lock = $this->center_model->lock_schedule_info($schedule_info_id);
          if (empty($lock) == true || $lock == false) {
            $result['status'] = 'fail';
            $result['message'] = '클래스 예약 요청이 많습니다! 잠시 후 다시 시도해주세요!';
            $this->response($result);
          }
          
          $schedule_info = $this->center_model->get_schedule_info($schedule_info_id);
          if (isset($schedule_info) == false || empty($schedule_info) == true) {
            $this->center_model->unlock_schedule_info($schedule_info_id);
            $result['status'] = 'fail';
            $result['message'] = '비정상적인 접근입니다!';
            $this->response($result);
          }
         
          if ($reservable != $schedule_info->reservable) {
            $this->center_model->unlock_schedule_info($schedule_info_id);
            $result['status'] = 'fail';
            $result['message'] = '예약 기능은 변경이 불가능합니다!';
            $this->response($result);
          }
          
          if ($reservable == false && $waitable == true) {
            $this->center_model->unlock_schedule_info($schedule_info_id);
            $result['status'] = 'fail';
            $result['message'] = '예약대기는 예약기능을 필요로 합니다!';
            $this->response($result);
          }
  
          if ($reservable == false) {
            $reservable_number = 0;
          }
          if ($waitable == false) {
            $waitable_number = 0;
          }
  
          $data = array(
            'start_time' => $start_time,
            'end_time' => $end_time,
            'schedule_title' => $schedule_title,
            'teacher_id' => $teacher_id,
            'teacher_name' => $teacher_name,
            'reservable' => $reservable,
            'reservable_number' => $reservable_number,
            'tickets' => json_encode($tickets),
            'open_immediate' => $open_immediate,
            'reserve_open_hour' => $reserve_open_hour,
            'reserve_close_hour' => $reserve_close_hour,
            'reserve_cancel_open_hour' => $reserve_cancel_open_hour,
            'reserve_cancel_close_hour' => $reserve_cancel_close_hour,
            'waitable' => $waitable,
            'waitable_number' => $waitable_number,
          );
          $schedule_open_date = $schedule_info->schedule_date.' '.$start_time;
          if ($open_immediate) {
            $reserve_close_at = date('Y-m-d H:i:s', strtotime($schedule_open_date) - $reserve_close_hour * ONE_HOUR);
            $reserve_cancel_close_at = date('Y-m-d H:i:s', strtotime($schedule_open_date) - $reserve_cancel_close_hour * ONE_HOUR);
            $this->db->set('reserve_open_at', 'NOW()', false);
            $this->db->set('reserve_close_at', $reserve_close_at);
            $this->db->set('reserve_cancel_open_at', 'NOW()', false);
            $this->db->set('reserve_cancel_close_at', $reserve_cancel_close_at);
          } else {
            $reserve_open_at = date('Y-m-d H:i:s', strtotime($schedule_open_date) - $reserve_open_hour * ONE_HOUR);
            $reserve_close_at = date('Y-m-d H:i:s', strtotime($schedule_open_date) - $reserve_close_hour * ONE_HOUR);
            $reserve_cancel_open_at = date('Y-m-d H:i:s', strtotime($schedule_open_date) - $reserve_cancel_open_hour * ONE_HOUR);
            $reserve_cancel_close_at = date('Y-m-d H:i:s', strtotime($schedule_open_date)- $reserve_cancel_close_hour * ONE_HOUR);
            $this->db->set('reserve_open_at', $reserve_open_at);
            $this->db->set('reserve_close_at', $reserve_close_at);
            $this->db->set('reserve_cancel_open_at', $reserve_cancel_open_at);
            $this->db->set('reserve_cancel_close_at', $reserve_cancel_close_at);
          }
          $this->db->set('updated_at', 'NOW()', false);
          $this->db->update('center_schedule_info', $data, array('schedule_info_id' => $schedule_info_id));
  
          if ($this->db->affected_rows() <= 0) {
            $this->center_model->unlock_schedule_info($schedule_info_id);
            $result['status'] = 'fail';
            $result['message'] = '클래스 수정이 불가능한 상태입니다! 잠시 후 다시 시도해주세요!';
            $this->response($result);
          }
  
          log_message('debug', '[schedule] center admin schedule('.$schedule_info_id.') edit, reservable_number['.$schedule_info->reservable_number.'=>'.$reservable_number.']');
          log_message('debug', '[schedule] center admin schedule('.$schedule_info_id.') edit, waitable_number['.$schedule_info->waitable_number.'=>'.$waitable_number.']');
          
          $idx = 0;
          $reserve_list = $this->center_model->get_schedule_reserve_list($schedule_info_id);
          $_reserve_count = $reserve_count = count($reserve_list);
          if ($reservable_number < $reserve_count) {
            for (; $idx < $_reserve_count; $idx++) {
              if ($idx <= $reservable_number - 1) {
                continue;
              }
              $reserve_info = $reserve_list[$idx];
              if ($waitable) {
                // 예약자 => 대기자
                $this->center_model->transfer_reserve2wait($reserve_info, $schedule_title, $schedule_info->schedule_date);
                $user_info = $this->db->get_where('user', array('user_id' => $reserve_info->user_id))->row();
                $this->mts_model->send_class_reserve($user_info->phone, CENTER_TICKET_MEMBER_ACTION_RESERVE_WAIT,
                  $schedule_info->schedule_title, $schedule_info->schedule_date, $this->center->title,
                  $schedule_info->start_time,$schedule_info->end_time);
//                $this->mts_model->send_class_wait($user_info->phone, $user_info->username, $schedule_info->schedule_title,
//                  date('Y.m.d', strtotime($schedule_info->schedule_date)));
              } else {
                // 예약자 => 취소
                $this->center_model->schedule_cancel($reserve_info, $schedule_title, $schedule_info->schedule_date);
                $user_info = $this->db->get_where('user', array('user_id' => $reserve_info->user_id))->row();
                $this->mts_model->send_class_reserve($user_info->phone, CENTER_TICKET_MEMBER_ACTION_RESERVE_CANCEL,
                  $schedule_info->schedule_title, $schedule_info->schedule_date, $this->center->title,
                  $schedule_info->start_time,$schedule_info->end_time);
//                $this->mts_model->send_class_cancel($user_info->phone, $user_info->username, $schedule_info->schedule_title,
//                  date('Y.m.d', strtotime($schedule_info->schedule_date)));
              }
              $reserve_count--;
            }
          }
  
          log_message('debug', '[schedule] center admin schedule('.$schedule_info_id.') edit reserve, reserve_count['.$_reserve_count.'=>'.$reserve_count.']');
          
          $idx = 0;
          $_reserve_count = $reserve_count;
          $wait_list = $this->center_model->get_schedule_wait_list($schedule_info_id);
          $_wait_count = $wait_count = count($wait_list);
          if ($reservable_number > $_reserve_count) {
            $transferable_count = $reservable_number - $_reserve_count;
            for (; $idx < $_wait_count; $idx++) {
              if ($idx > $transferable_count - 1) {
                break;
              }
              $reserve_info = $wait_list[$idx];
              // 대기자 => 예약자
              $this->center_model->transfer_wait2reserve($reserve_info, $schedule_title, $schedule_info->schedule_date);
              $user_info = $this->db->get_where('user', array('user_id' => $reserve_info->user_id))->row();
              $this->mts_model->send_class_reserve($user_info->phone, $user_info->username, $schedule_title,
                $schedule_info->schedule_date, $this->center->center_title, $start_time, $end_time);
              $wait_count--;
              $reserve_count++;
            }
          }
  
          log_message('debug', '[schedule] center admin schedule('.$schedule_info_id.') edit wait, reserve_count['.$_reserve_count.'=>'.$reserve_count.']');
          log_message('debug', '[schedule] center admin schedule('.$schedule_info_id.') edit wait, wait_count['.$_wait_count.'=>'.$wait_count.']');
          
          $_wait_count = $wait_count;
          if ($waitable_number < $_wait_count) {
            for (; $idx < $_wait_count; $idx++) {
              if ($idx <= $waitable_number - 1) {
                break;
              }
              $reserve_info = $wait_list[$idx];
              // 대기자 => 취소
              $this->center_model->schedule_cancel($reserve_info, $schedule_title, $schedule_info->schedule_date);
              $user_info = $this->db->get_where('user', array('user_id' => $reserve_info->user_id))->row();
              $this->mts_model->send_class_reserve($user_info->phone, CENTER_TICKET_MEMBER_ACTION_RESERVE_CANCEL,
                $schedule_info->schedule_title, $schedule_info->schedule_date, $this->center->title,
                $schedule_info->start_time,$schedule_info->end_time);
//              $this->mts_model->send_class_cancel($user_info->phone, $user_info->username, $schedule_info->schedule_title,
//                date('Y.m.d', strtotime($schedule_info->schedule_date)));
              $wait_count--;
            }
          }
  
          log_message('debug', '[schedule] center admin schedule('.$schedule_info_id.') edit wait2, reserve_count['.$_reserve_count.'=>'.$reserve_count.']');
          log_message('debug', '[schedule] center admin schedule('.$schedule_info_id.') edit wait2, wait_count['.$_wait_count.'=>'.$wait_count.']');
  
          $this->center_model->unlock_schedule_info($schedule_info_id);
//          $result['class'] = array(
//            'reservable' => $reservable,
//            'reservable_number' => $reservable_number,
//            'reserve_count' => $reserve_count,
//            'waitable' => $waitable,
//            'waitable_number' => $waitable_number,
//            'wait_count' => $wait_count,
//          );
          $this->response($result);
 
        } else {
  
          if (isset($_GET['id']) == false) {
            $this->redirect_error('비정상적인 접근입니다!');
          }
  
          $schedule_info_id = $_GET['id'];
  
          $schedule_info = $this->center_model->get_schedule_info($schedule_info_id);
          if (isset($schedule_info) == false || empty($schedule_info) == true) {
            $this->redirect_error('비정상적인 접근입니다!');
          }
          
          $schedule_info->tickets = json_decode($schedule_info->tickets);
          $tickets = $this->db->get_where('center_ticket', array('center_id' => $this->center_id, 'activate' => 1))->result();
  
          $query = <<<QUERY
select b.teacher_id,b.name from center_teacher a, teacher b
where a.teacher_id = b.teacher_id and a.center_id={$this->center_id} and a.activate=b.activate and a.activate=1
QUERY;
          $teachers = $this->db->query($query)->result();
  
          $this->page_data['tickets'] = $tickets;
          $this->page_data['teachers'] = $teachers;
          $this->page_data['schedule_info'] = $schedule_info;
          $this->page_data['page_name'] = "teacher";
          $this->load->view('back/center/schedule_edit', $this->page_data);

        }
  
      } else if ($para2 == 'unregister') {
  
        $this->load->library('form_validation');
        $this->form_validation->set_rules('id', 'id', 'trim|required|is_natural|max_length[10]');
        if ($this->form_validation->run() == FALSE) {
          echo '<br>' . validation_errors();
          exit;
        }
  
        $schedule_info_id = $this->input->post('id');
        $result['status'] = 'done';
        $result['message'] = '성공하였습니다!';
  
        $lock = $this->center_model->lock_schedule_info($schedule_info_id);
        if (empty($lock) == true || $lock == false) {
          $result['status'] = 'fail';
          $result['message'] = '클래스 예약 요청이 많습니다! 잠시 후 다시 시도해주세요!';
          $this->response($result);
        }
  
        $schedule_info = $this->center_model->get_schedule_info($schedule_info_id);
        if (isset($schedule_info) == false || empty($schedule_info) == true) {
          $this->center_model->unlock_schedule_info($schedule_info_id);
          $result['status'] = 'fail';
          $result['message'] = '비정상적인 접근입니다!';
          $this->response($result);
        }
 
        $this->db->update('center_schedule_info', array('activate' => 0), array('schedule_info_id' => $schedule_info_id));
        if ($this->db->affected_rows() <= 0) {
          $this->center_model->unlock_schedule_info($schedule_info_id);
          $result['status'] = 'fail';
          $result['message'] = '클래스 삭제가 불가능한 상태입니다! 잠시 후 다시 시도해주세요!';
          $this->response($result);
        }
        
        $reserve_list = $this->center_model->get_schedule_reserve_list($schedule_info_id);
        foreach ($reserve_list as $reserve_info) {
          $this->center_model->schedule_cancel($reserve_info, $schedule_info->schedule_title, $schedule_info->schedule_date);
          $user_info = $this->db->get_where('user', array('user_id' => $reserve_info->user_id))->row();
          $this->mts_model->send_class_reserve($user_info->phone, CENTER_TICKET_MEMBER_ACTION_RESERVE_CANCEL,
            $schedule_info->schedule_title, $schedule_info->schedule_date, $this->center->title,
            $schedule_info->start_time,$schedule_info->end_time);
//          $this->mts_model->send_class_cancel($user_info->phone, $user_info->username, $schedule_info->schedule_title,
//          date('Y.m.d', strtotime($schedule_info->schedule_date)));
        }
        $wait_list = $this->center_model->get_schedule_wait_list($schedule_info_id);
        foreach ($wait_list as $reserve_info) {
          $this->center_model->schedule_cancel($reserve_info, $schedule_info->schedule_title, $schedule_info->schedule_date);
          $user_info = $this->db->get_where('user', array('user_id' => $reserve_info->user_id))->row();
          $this->mts_model->send_class_reserve($user_info->phone, CENTER_TICKET_MEMBER_ACTION_RESERVE_CANCEL,
            $schedule_info->schedule_title, $schedule_info->schedule_date, $this->center->title,
            $schedule_info->start_time,$schedule_info->end_time);
//          $this->mts_model->send_class_cancel($user_info->phone, $user_info->username, $schedule_info->schedule_title,
//            date('Y.m.d', strtotime($schedule_info->schedule_date)));
        }
  
        $this->center_model->unlock_schedule_info($schedule_info_id);
        $this->response($result);

      } else if ($para2 == 'register') {
  
        $center_data = $this->db->get_where('center', array('center_id' => $this->center_id))->row();
  
        $this->load->library('form_validation');
        $this->form_validation->set_rules('start_date', 'start_date', 'trim|required|max_length[10]');
        $this->form_validation->set_rules('end_date', 'end_date', 'trim|required|max_length[10]');
        $this->form_validation->set_rules('start_time', 'start_time', 'trim|required|max_length[8]');
        $this->form_validation->set_rules('end_time', 'end_time', 'trim|required|max_length[8]');
        $this->form_validation->set_rules('schedule_title', 'schedule_title', 'trim|required|max_length[25]');
        $this->form_validation->set_rules('weeklys', 'weeklys', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('teacher_id', 'teacher_id', 'trim|required|max_length[10]');
        $this->form_validation->set_rules('reservable', 'reservable', 'trim|required|is_natural|less_than_equal_to[1]');
        $this->form_validation->set_rules('reservable_number', 'reservable_number', 'trim|required|is_natural|max_length[5]');
        $this->form_validation->set_rules('tickets', 'tickets', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('open_immediate', 'open_immediate', 'trim|required|is_natural|less_than_equal_to[1]');
        $this->form_validation->set_rules('reserve_open_hour', 'reserve_open_hour', 'trim|required|is_natural|max_length[5]');
        $this->form_validation->set_rules('reserve_close_hour', 'reserve_close_hour', 'trim|required|is_natural|max_length[5]');
        $this->form_validation->set_rules('reserve_cancel_open_hour', 'reserve_cancel_open_hour', 'trim|required|is_natural|max_length[5]');
        $this->form_validation->set_rules('reserve_cancel_close_hour', 'reserve_cancel_close_hour', 'trim|required|is_natural|max_length[5]');
        $this->form_validation->set_rules('waitable', 'waitable', 'trim|required|is_natural|less_than_equal_to[1]');
        $this->form_validation->set_rules('waitable_number', 'waitable_number', 'trim|required|is_natural|max_length[5]');

        if ($this->form_validation->run() == FALSE) {
          echo '<br>' . validation_errors();
          exit;
        }
  
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $start_time = date('H:i:s', strtotime($this->input->post('start_time')));
        $end_time = date('H:i:s', strtotime($this->input->post('end_time')));
        $schedule_title = $this->input->post('schedule_title');
        $weeklys = json_decode($this->input->post('weeklys'));
        $teacher_id = $this->input->post('teacher_id');
        $teacher_name = $this->input->post('teacher_name');
        $reservable = $this->input->post('reservable');
        $reservable_number = $this->input->post('reservable_number');
        $tickets = json_decode($this->input->post('tickets'));
        $open_immediate = $this->input->post('open_immediate');
        $reserve_open_hour = $this->input->post('reserve_open_hour');
        $reserve_close_hour = $this->input->post('reserve_close_hour');
        $reserve_cancel_open_hour = $this->input->post('reserve_cancel_open_hour');
        $reserve_cancel_close_hour = $this->input->post('reserve_cancel_close_hour');
        $waitable = $this->input->post('waitable');
        $waitable_number = $this->input->post('waitable_number');

//        log_message('debug', '[schedule] start_time['.$start_time.'] end_time['.$end_time.']');
  
        $result['status'] = 'done';
        $result['message'] = '성공하였습니다!';

        if ($start_date > $end_date) {
          $result['status'] = 'fail';
          $result['message'] = '스케줄 날짜를 정확히 입력해주세요!';
          $this->response($result);
        }
        
        if (strtotime($start_time) > strtotime($end_time) - 10 * ONE_MINUTE) {
          $result['status'] = 'fail';
          $result['message'] = '스케줄 시간을 정확히 입력해주세요!';
          $this->response($result);
        }
        
        if ($reservable == true) {
          if ($open_immediate == false) {
            if ($reserve_open_hour < $reserve_close_hour) {
              $result['status'] = 'fail';
              $result['message'] = '예약 가능 시간을 정확히 입력해주세요!';
              $this->response($result);
            }
            if ($reserve_cancel_open_hour < $reserve_cancel_close_hour) {
              $result['status'] = 'fail';
              $result['message'] = '취소 가능 시간을 정확히 입력해주세요!';
              $this->response($result);
            }
          } else {
            $reserve_open_hour = 0;
            $reserve_cancel_open_hour = 0;
          }
        } else {
          $reserve_open_hour = 0;
          $reserve_close_hour = 0;
          $reserve_cancel_open_hour = 0;
          $reserve_cancel_close_hour = 0;
        }
        
        if ($teacher_id == 0) {
          $result['status'] = 'fail';
          $result['message'] = '강사를 선택해주세요!';
          $this->response($result);
        }
  
        if ($teacher_id == -1) {
          if (empty($teacher_name) || strlen($teacher_name) == 0) {
            $result['status'] = 'fail';
            $result['message'] = '강사이름을 입력해 주세요!';
            $this->response($result);
          }
        } else {
          $teacher = $this->db->get_where('teacher', array('teacher_id' => $teacher_id))->row();
          if (empty($teacher)) {
            $result['status'] = 'fail';
            $result['message'] = '강사가 존재하지 않습니다!';
            $this->response($result);
          }
          $teacher_name = $teacher->name;
        }
  
        if ($reservable == false && $waitable == true) {
          $result['status'] = 'fail';
          $result['message'] = '예약대기는 예약기능을 필요로 합니다!';
          $this->response($result);
        }
  
        if ($reservable == false) {
          $reservable_number = 0;
        }
        if ($waitable == false) {
          $waitable_number = 0;
        }
  
        // limit check
        if ($reservable == true) {
          if ($reservable_number < 1 || $reservable_number > 100) {
            $result['status'] = 'fail';
            $result['message'] = '예약 정원은 최소 1명 / 최대 100명 등록 가능합니다!';
            $this->response($result);
          }
        }
        if ($waitable == true) {
          if ($waitable_number < 1 || $waitable_number> 100) {
            $result['status'] = 'fail';
            $result['message'] = '대기 정원은 최소 1명 / 최대 100명 등록 가능합니다!';
            $this->response($result);
          }
        }
        if ($open_immediate == true) {
          if ($reserve_close_hour > 12) {
            $result['status'] = 'fail';
            $result['message'] = '예약 마감 시간은 수업 12시간전까지 가능합니다!';
            $this->response($result);
          }
          if ($reserve_cancel_close_hour > 12) {
            $result['status'] = 'fail';
            $result['message'] = '취소 가능 시간은 수업 12시간전까지 가능합니다!';
            $this->response($result);
          }
        } else {
          if ($reserve_open_hour > 30 * 24) {
            $result['status'] = 'fail';
            $result['message'] = '예약 시작 시간은 수업 30일전까지 가능합니다!';
            $this->response($result);
          }
          if ($reserve_close_hour > 48) {
            $result['status'] = 'fail';
            $result['message'] = '예약 마감 시간은 수업 48시간전까지 가능합니다!';
            $this->response($result);
          }
          if ($reserve_cancel_open_hour > 30 * 24) {
            $result['status'] = 'fail';
            $result['message'] = '취소 시작 시간은 수업 30일전까지 가능합니다!';
            $this->response($result);
          }
          if ($reserve_cancel_close_hour > 48) {
            $result['status'] = 'fail';
            $result['message'] = '취소 마감 시간은 수업 48시간전까지 가능합니다!';
            $this->response($result);
          }
        }
        
        $weekly = array(0, 0, 0, 0, 0, 0, 0);
        if (empty($weeklys) || count($weeklys) == 0) {
          $weekly_none = 1;
        } else {
          foreach ($weeklys as $w) {
            $w = (int)$w;
            $weekly[$w] = 1;
          }
          $weekly_none = 0;
        }
//        log_message('debug', '[schedule] weekly['.json_encode($weekly).']');
  
        $data = array(
          'center_id' => $center_data->center_id,
          'activate' => 1,
          'start_date' => $start_date,
          'end_date' => $end_date,
          'start_time' => $start_time,
          'end_time' => $end_time,
          'weekly_0' => $weekly[0],
          'weekly_1' => $weekly[1],
          'weekly_2' => $weekly[2],
          'weekly_3' => $weekly[3],
          'weekly_4' => $weekly[4],
          'weekly_5' => $weekly[5],
          'weekly_6' => $weekly[6],
          'weekly_none' => $weekly_none,
          'schedule_title' => $schedule_title,
          'teacher_id' => $teacher_id,
          'teacher_name' => $teacher_name,
          'reservable' => $reservable,
          'reservable_number' => $reservable_number,
          'tickets' => json_encode($tickets),
          'open_immediate' => $open_immediate,
          'reserve_open_hour' => $reserve_open_hour,
          'reserve_close_hour' => $reserve_close_hour,
          'reserve_cancel_open_hour' => $reserve_cancel_open_hour,
          'reserve_cancel_close_hour' => $reserve_cancel_close_hour,
          'waitable' => $waitable,
          'waitable_number' => $waitable_number,
        );
        $this->db->set('register_at', 'NOW()', false);
        $this->db->set('updated_at', 'NOW()', false);
        $this->db->insert('center_schedule', $data);
        
        $schedule_id = $this->db->insert_id();
        if ($schedule_id <= 0) {
          $result['status'] = 'fail';
          $result['message'] = 'not inserted!';
          $this->response($result);
        }
  
        $data = array(
          'center_id' => $center_data->center_id,
          'activate' => 1,
          'schedule_id' => $schedule_id,
          'start_time' => $start_time,
          'end_time' => $end_time,
          'schedule_title' => $schedule_title,
          'teacher_id' => $teacher_id,
          'teacher_name' => $teacher_name,
          'reservable' => $reservable,
          'tickets' => json_encode($tickets),
          'reservable_number' => $reservable_number,
          'waitable' => $waitable,
          'waitable_number' => $waitable_number,
          'open_immediate' => $open_immediate,
          'reserve_open_hour' => $reserve_open_hour,
          'reserve_close_hour' => $reserve_close_hour,
          'reserve_cancel_open_hour' => $reserve_cancel_open_hour,
          'reserve_cancel_close_hour' => $reserve_cancel_close_hour,
        );
        $schedule_start_time = strtotime($start_date);
        $schedule_end_time = strtotime($end_date);
        if ($weekly_none) {
          for ($datetime = $schedule_start_time; $datetime <= $schedule_end_time; $datetime += ONE_DAY) {
            $schedule_date = date('Y-m-d', $datetime);
            $schedule_open_date = $schedule_date.' '.$start_time;
            if ($open_immediate) {
              $reserve_close_at = date('Y-m-d H:i:s', strtotime($schedule_open_date) - $reserve_close_hour * ONE_HOUR);
              $reserve_cancel_close_at = date('Y-m-d H:i:s', strtotime($schedule_open_date) - $reserve_cancel_close_hour * ONE_HOUR);
              $this->db->set('reserve_open_at', 'NOW()', false);
              $this->db->set('reserve_close_at', $reserve_close_at);
              $this->db->set('reserve_cancel_open_at', 'NOW()', false);
              $this->db->set('reserve_cancel_close_at', $reserve_cancel_close_at);
            } else {
              $reserve_open_at = date('Y-m-d H:i:s', strtotime($schedule_open_date) - $reserve_open_hour * ONE_HOUR);
              $reserve_close_at = date('Y-m-d H:i:s', strtotime($schedule_open_date) - $reserve_close_hour * ONE_HOUR);
              $reserve_cancel_open_at = date('Y-m-d H:i:s', strtotime($schedule_open_date) - $reserve_cancel_open_hour * ONE_HOUR);
              $reserve_cancel_close_at = date('Y-m-d H:i:s', strtotime($schedule_open_date)- $reserve_cancel_close_hour * ONE_HOUR);
              $this->db->set('reserve_open_at', $reserve_open_at);
              $this->db->set('reserve_close_at', $reserve_close_at);
              $this->db->set('reserve_cancel_open_at', $reserve_cancel_open_at);
              $this->db->set('reserve_cancel_close_at', $reserve_cancel_close_at);
            }
            $week = date('w', $datetime);
            $this->db->set('week', $week);
            $this->db->set('schedule_date', $schedule_date);
            $this->db->set('register_at', 'NOW()', false);
            $this->db->set('updated_at', 'NOW()', false);
            $this->db->insert('center_schedule_info', $data);
            $schedule_info_id = $this->db->insert_id();
            if ($schedule_info_id <= 0) {
              $result['status'] = 'fail';
              $result['message'] = 'not inserted partly!';
              $this->response($result);
            }
          }
        } else {
          $w = date('w', $schedule_start_time);
          for ($i = 0;  $i < 7; $i++) {
            if ($weekly[$i] == 0) {
              continue;
            }
            for ($datetime = $schedule_start_time + ($i < $w ? (7 + $i - $w) : ($i - $w)) * ONE_DAY; $datetime <= $schedule_end_time; $datetime += ONE_WEEK) {
              $schedule_date = date('Y-m-d', $datetime);
              $schedule_open_date = $schedule_date.' '.$start_time;
              if ($open_immediate) {
                $reserve_close_at = date('Y-m-d H:i:s', strtotime($schedule_open_date) - $reserve_close_hour * ONE_HOUR);
                $reserve_cancel_close_at = date('Y-m-d H:i:s', strtotime($schedule_open_date) - $reserve_cancel_close_hour * ONE_HOUR);
                $this->db->set('reserve_open_at', 'NOW()', false);
                $this->db->set('reserve_close_at', $reserve_close_at);
                $this->db->set('reserve_cancel_open_at', 'NOW()', false);
                $this->db->set('reserve_cancel_close_at', $reserve_cancel_close_at);
              } else {
                $reserve_open_at = date('Y-m-d H:i:s', strtotime($schedule_open_date) - $reserve_open_hour * ONE_HOUR);
                $reserve_close_at = date('Y-m-d H:i:s', strtotime($schedule_open_date) - $reserve_close_hour * ONE_HOUR);
                $reserve_cancel_open_at = date('Y-m-d H:i:s', strtotime($schedule_open_date) - $reserve_cancel_open_hour * ONE_HOUR);
                $reserve_cancel_close_at = date('Y-m-d H:i:s', strtotime($schedule_open_date)- $reserve_cancel_close_hour * ONE_HOUR);
                $this->db->set('reserve_open_at', $reserve_open_at);
                $this->db->set('reserve_close_at', $reserve_close_at);
                $this->db->set('reserve_cancel_open_at', $reserve_cancel_open_at);
                $this->db->set('reserve_cancel_close_at', $reserve_cancel_close_at);
              }
              $week = date('w', $datetime);
              $this->db->set('schedule_date', $schedule_date);
              $this->db->set('week', $week);
              $this->db->set('register_at', 'NOW()', false);
              $this->db->set('updated_at', 'NOW()', false);
              $this->db->insert('center_schedule_info', $data);
              $schedule_info_id = $this->db->insert_id();
              if ($schedule_info_id <= 0) {
                $result['status'] = 'fail';
                $result['message'] = 'not inserted partly!';
                $this->response($result);
              }
            }
          }
        }
  
        $this->response($result);
      
      } else { // teacher/schedule/
        $this->redirect_error();
      }
  
    } else { // index
 
      if (isset($_GET['y']) == true && isset($_GET['m']) == true && isset($_GET['d']) == true) {
        $year = $_GET['y'];
        $month = $_GET['m'];
        $day = $_GET['d'];
      } else {
        $year = date('Y');
        $month = date('m');
        $day = date('d');
      }
      $date = "$year.$month.$day"; // 현재 날짜 or focus date
      
      $tab = '';
      if (isset($_GET['t']) == true) {
        $tab = $_GET['t'];
      }
      
      $query = <<<QUERY
select b.teacher_id,b.name from center_teacher a, teacher b
where a.teacher_id = b.teacher_id and a.center_id={$this->center_id} and a.activate=b.activate and a.activate=1
QUERY;
      $teachers = $this->db->query($query)->result();
      
      $tickets = $this->db->get_where('center_ticket', array('center_id' => $this->center_id, 'activate' => 1))->result();
  
      $this->page_data['year'] = $year;
      $this->page_data['month'] = $month;
      $this->page_data['day'] = $day;
      $this->page_data['date'] = $date;
      $this->page_data['teachers'] = $teachers;
      $this->page_data['tickets'] = $tickets;
      $this->page_data['tab'] = $tab;
      $this->page_data['page_name'] = "teacher";
      $this->load->view('back/center/index', $this->page_data);
    }
  }
  
  function course($para1 = '', $para2 = '', $para3 = '')
  {
    if ($this->is_logged() == false) {
      redirect(base_url() . 'center', 'refresh');
    }
    
    $center_id = $this->center_id;
    
    if ($para1 == 'ticket') {
     
      if ($para2 == 'add') { // center/course/ticket/add
  
        $this->load->library('form_validation');
        $this->form_validation->set_rules('ticket_title', 'title_title', 'trim|required|max_length[25]');
        $this->form_validation->set_rules('ticket_price', 'ticket_price', 'trim|required|is_natural|less_than_equal_to[3000000]');
        $this->form_validation->set_rules('ticket_type', 'ticket_type', 'trim|required|is_natural|less_than_equal_to[2]');
        $this->form_validation->set_rules('reservable_count', 'reservable_count', 'trim|required|is_natural|less_than_equal_to[100]');
        $this->form_validation->set_rules('reservable_count_oneday', 'reservable_count_oneday', 'trim|required|is_natural|less_than_equal_to[20]');
        $this->form_validation->set_rules('reservable_duration', 'reservable_duration', 'trim|required|is_natural|less_than_equal_to[365]');
        $this->form_validation->set_rules('limit_cancel_count_enable', 'limit_cancel_count_enable', 'trim|required|is_natural|less_than_equal_to[1]');
        $this->form_validation->set_rules('limit_cancel_count_oneday', 'limit_cancel_count_oneday', 'trim|required|is_natural|less_than_equal_to[30]');
        $this->form_validation->set_rules('limit_cancel_count_total', 'limit_cancel_count_total', 'trim|required|is_natural|less_than_equal_to[300]');
        $this->form_validation->set_rules('limit_enroll_member_count', 'limit_enroll_member_count', 'trim|required|is_natural|less_than_equal_to[200]');
  
        if ($this->form_validation->run() == FALSE) {
          echo '<br>' . validation_errors();
        } else {
          $ticket_title = $this->input->post('ticket_title');
          $ticket_price = $this->input->post('ticket_price');
          $ticket_type = $this->input->post('ticket_type');
          $reservable_count = $this->input->post('reservable_count');
          $reservable_count_oneday = $this->input->post('reservable_count_oneday');
          $reservable_duration = $this->input->post('reservable_duration');
          $limit_cancel_count_enable = $this->input->post('limit_cancel_count_enable');
          $limit_cancel_count_oneday = $this->input->post('limit_cancel_count_oneday');
          $limit_cancel_count_total = $this->input->post('limit_cancel_count_total');
          $limit_enroll_member_count = $this->input->post('limit_enroll_member_count');
  
          $data = array(
            'center_id' => $center_id,
            'activate' => 0,
            'ticket_title' => $ticket_title,
            'ticket_price' => $ticket_price,
            'ticket_type' => $ticket_type,
            'ticket_type_str' => $this->center_model->get_ticket_type_str($ticket_type),
            'reservable_count' => $reservable_count,
            'reservable_count_oneday' => $reservable_count_oneday,
            'reservable_duration' => $reservable_duration,
            'limit_cancel_count_enable' => $limit_cancel_count_enable,
            'limit_cancel_count_oneday' => $limit_cancel_count_oneday,
            'limit_cancel_count_total' => $limit_cancel_count_total,
            'limit_enroll_member_count' => $limit_enroll_member_count,
            'enroll_member_count' => 0,
          );
  
          $ticket_id = $this->center_model->add_ticket($data);
          if ($ticket_id) {
            echo 'done';
          } else {
            echo 'fail : internal error';
          }
        }

      } else if ($para2 == 'activate') { // center/course/ticket/activate

        $this->load->library('form_validation');
        $this->form_validation->set_rules('ticket_id', 'ticket_id', 'trim|required|is_numeric|max_length[10]');
        $this->form_validation->set_rules('activate', 'activate', 'trim|required|is_natural|less_than_equal_to[1]');

        if ($this->form_validation->run() == FALSE) {
          echo '<br>' . validation_errors();
        } else {
          $ticket_id = $this->input->post('ticket_id');
          $activate = $this->input->post('activate');
          
          if ($this->center_model->activate_ticket($ticket_id, $activate)) {
            echo 'done';
          } else {
            echo 'fail : internal error';
          }
        }
  
      } else if ($para2 == 'modify') { // center/course/ticket/modify
        
        if ($para3 == 'do') {
  
          $this->load->library('form_validation');
          $this->form_validation->set_rules('ticket_id', 'ticket_id', 'trim|required|is_numeric|max_length[10]');
          $this->form_validation->set_rules('ticket_title', 'title_title', 'trim|required|max_length[25]');
          $this->form_validation->set_rules('ticket_price', 'ticket_price', 'trim|required|is_natural|less_than_equal_to[3000000]');
          $this->form_validation->set_rules('ticket_type', 'ticket_type', 'trim|required|is_natural|less_than_equal_to[2]');
          $this->form_validation->set_rules('reservable_count', 'reservable_count', 'trim|required|is_natural|less_than_equal_to[100]');
          $this->form_validation->set_rules('reservable_count_oneday', 'reservable_count_oneday', 'trim|required|is_natural|less_than_equal_to[20]');
          $this->form_validation->set_rules('reservable_duration', 'reservable_duration', 'trim|required|is_natural|less_than_equal_to[365]');
          $this->form_validation->set_rules('limit_cancel_count_enable', 'limit_cancel_count_enable', 'trim|required|is_natural|less_than_equal_to[1]');
          $this->form_validation->set_rules('limit_cancel_count_oneday', 'limit_cancel_count_oneday', 'trim|required|is_natural|less_than_equal_to[30]');
          $this->form_validation->set_rules('limit_cancel_count_total', 'limit_cancel_count_total', 'trim|required|is_natural|less_than_equal_to[300]');
          $this->form_validation->set_rules('limit_enroll_member_count', 'limit_enroll_member_count', 'trim|required|is_natural|less_than_equal_to[200]');
  
          if ($this->form_validation->run() == FALSE) {
            echo '<br>' . validation_errors();
          } else {
            $ticket_id = $this->input->post('ticket_id');
            $ticket_title = $this->input->post('ticket_title');
            $ticket_price = $this->input->post('ticket_price');
            $ticket_type = $this->input->post('ticket_type');
            $reservable_count = $this->input->post('reservable_count');
            $reservable_count_oneday = $this->input->post('reservable_count_oneday');
            $reservable_duration = $this->input->post('reservable_duration');
            $limit_cancel_count_enable = $this->input->post('limit_cancel_count_enable');
            $limit_cancel_count_oneday = $this->input->post('limit_cancel_count_oneday');
            $limit_cancel_count_total = $this->input->post('limit_cancel_count_total');
            $limit_enroll_member_count = $this->input->post('limit_enroll_member_count');
    
            $data = array(
              'ticket_title' => $ticket_title,
              'ticket_price' => $ticket_price,
              'ticket_type' => $ticket_type,
              'reservable_count' => $reservable_count,
              'reservable_count_oneday' => $reservable_count_oneday,
              'reservable_duration' => $reservable_duration,
              'limit_cancel_count_enable' => $limit_cancel_count_enable,
              'limit_cancel_count_oneday' => $limit_cancel_count_oneday,
              'limit_cancel_count_total' => $limit_cancel_count_total,
              'limit_enroll_member_count' => $limit_enroll_member_count,
            );
    
            if ($this->center_model->upd_ticket($data, $ticket_id)) {
              echo 'done';
            } else {
              echo 'fail : internal error';
            }
          }
        } else {
          if (isset($_GET['id']) == false) {
            $this->redirect_error();
          }
          $ticket_id = $_GET['id'];
          $ticket = $this->center_model->get_ticket($ticket_id);
          $this->page_data['ticket'] = $ticket;
          $this->load->view('back/center/ticket_modify', $this->page_data);
  
        }
        
      } else if ($para2 == 'list') { // /center/course/ticket/list
        
        if (isset($_GET['id']) == false || isset($_GET['page']) == false || isset($_GET['filter']) == false) {
          $this->redirect_error();
        }
        
        $ticket_id = $_GET['id'];
        $page = $_GET['page'];
        $filter = $_GET['filter'];
  
        $size = CENTER_ADMIN_ITEM_LIST_PAGE_SIZE;
        $offset = $size * ($page - 1);

        $filter_col = '';
        if (empty($filter) == false) {
          if(preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $filter) || preg_match("/^[0-9]+/", $filter)) {
            $filter_col = 'phone';
            $filter = preg_replace("/[^0-9]/", '', $filter);
          } else if (strstr($filter, '@')) {
            $filter_col = 'email';
          } else {
            $filter_col = 'username';
          }
        }
        
        $total_cnt = $this->center_model->ticket_member_search_cnt($ticket_id, $filter, $filter_col);
        $members = array();
        if ($total_cnt > 0) {
          $members = $this->center_model->ticket_member_search($ticket_id, $filter, $filter_col, $size, $offset);
        }
  
        $user = null;
        if ($total_cnt == 0 && empty($filter) == false) {
          $query = <<<QUERY
select * from user where {$filter_col} like '{$filter}'
QUERY;
          $user = $this->db->query($query)->row();
        }
        
        log_message('debug', '[search list] ticket_id['.$ticket_id.'] total_cnt['.$total_cnt.'] members['.json_encode($members).'] '.
        'filter['.$filter.'] filter_col['.$filter_col.'] user['.json_encode($user).']');
  
        $num = $this->crud_model->get_list_page_num($total_cnt, $size, $page);
  
        $this->page_data['total_cnt'] = $total_cnt;
        $this->page_data['page'] = $page;
        $this->page_data['total'] = $num['total'];
        $this->page_data['prev'] = $num['prev'];
        $this->page_data['next'] = $num['next'];
 
        $ticket = $this->center_model->get_ticket($ticket_id);
        
        $this->page_data['ticket'] = $ticket;
        $this->page_data['filter'] = $filter;
        $this->page_data['user'] = $user;
        $this->page_data['members'] = $members;
        $this->load->view('back/center/ticket_member_list', $this->page_data);
  
      } else if ($para2 == 'member') { // center/course/ticket/member
        
        if ($para3 == 'join') { // center/course/ticket/member/join
  
          $this->load->library('form_validation');
          $this->form_validation->set_rules('user_id', 'user_id', 'trim|required|is_numeric|max_length[10]');
          $this->form_validation->set_rules('ticket_id', 'ticket_id', 'trim|required|is_numeric|max_length[10]');
          $this->form_validation->set_rules('enable_start_at', 'enable_start_at', 'trim|required|min_length[10]|max_length[10]');
          $this->form_validation->set_rules('enable_end_at', 'enable_end_at', 'trim|required|min_length[10]|max_length[10]');
          $this->form_validation->set_rules('reservable_count', 'reservable_count', 'trim|required|is_natural|less_than_equal_to[100]');
  
          if ($this->form_validation->run() == FALSE) {
            echo '<br>' . validation_errors();
          } else {
            $user_id = $this->input->post('user_id');
            $ticket_id = $this->input->post('ticket_id');
            $enable_start_at = $this->input->post('enable_start_at');
            $enable_end_at = $this->input->post('enable_end_at');
            $reservable_count = $this->input->post('reservable_count');
            
            $ticket = $this->center_model->get_ticket($ticket_id);
            if ($ticket->enroll_member_count >= $ticket->limit_enroll_member_count) {
              $result['status'] = 'fail';
              $result['message'] = "최대 등록 인원을 초과했습니다!";
              echo json_encode($result);
              exit;
            } else {
              if ($this->center_model->ticket_member_join($this->center_id, $ticket, $user_id, $enable_start_at, $enable_end_at, $reservable_count)) {
                $ticket = $this->center_model->get_ticket($ticket_id);
                $result['status'] = 'done';
                $result['enroll_member_count'] = $ticket->enroll_member_count;
                echo json_encode($result);
                exit;
              } else {
                $result['status'] = 'fail';
                $result['message'] = "inter error";
                echo json_encode($result);
                exit;
              }
            }
          }
        
        } else if ($para3 == 'modify') { // center/course/ticket/member/action
  
          $this->load->library('form_validation');
          $this->form_validation->set_rules('member_id', 'member_id', 'trim|required|is_numeric|max_length[10]');
          $this->form_validation->set_rules('enable_start_at', 'enable_start_at', 'trim|required|min_length[10]|max_length[10]');
          $this->form_validation->set_rules('enable_end_at', 'enable_end_at', 'trim|required|min_length[10]|max_length[10]');
          $this->form_validation->set_rules('reservable_count', 'reservable_count', 'trim|required|is_natural|less_than_equal_to[100]');
  
          if ($this->form_validation->run() == FALSE) {
            echo '<br>' . validation_errors();
          } else {
            $member_id = $this->input->post('member_id');
            $enable_start_at = $this->input->post('enable_start_at');
            $enable_end_at = $this->input->post('enable_end_at');
            $reservable_count = $this->input->post('reservable_count');
  
            if ($this->center_model->ticket_member_modify($member_id, $enable_start_at, $enable_end_at, $reservable_count)) {
              echo 'done';
            } else {
              echo 'fail';
            }
          }
          
        } else if ($para3 == 'action') { // center/course/ticket/member/action
  
          $this->load->library('form_validation');
          $this->form_validation->set_rules('ticket_id', 'ticket_id', 'trim|required|is_numeric|max_length[10]');
          $this->form_validation->set_rules('member_ids', 'member_ids', 'trim|required|max_length[128]');
          $this->form_validation->set_rules('action', 'action', 'trim|required|is_natural|max_length[10]');
          $this->form_validation->set_rules('action_duration', 'action_duration', 'trim|required|is_natural|max_length[5]');
//          $this->form_validation->set_rules('action_id', 'action_id', 'trim|required|is_natural|max_length[10]');
          $this->form_validation->set_rules('stop_start_at', 'stop_start_at', 'trim|required|max_length[10]');
          $this->form_validation->set_rules('stop_end_at', 'stop_end_at', 'trim|required|max_length[10]');
  
          if ($this->form_validation->run() == FALSE) {
            echo '<br>' . validation_errors();
          } else {
            $ticket_id = json_decode($this->input->post('ticket_id'));
            $member_ids = json_decode($this->input->post('member_ids'));
            $action = $this->input->post('action');
            $action_duration = $this->input->post('action_duration');
//            $action_id = $this->input->post('action_id');
            $stop_start_at = $this->input->post('stop_start_at');
            $stop_end_at = $this->input->post('stop_end_at');
            
            if ($action == CENTER_TICKET_MEMBER_ACTION_STOP) {
              if ($stop_start_at > $stop_end_at) {
                $result['status'] = 'fail';
                $result['message'] = "기간 설정이 잘못되었습니다!";
                echo json_encode($result);
                exit;
              }
              $start_time = strtotime($stop_start_at);
              $end_time = strtotime($stop_end_at);
              $action_duration = ($end_time - $start_time) / ONE_DAY + 1;
            }
  
            if ($res = $this->center_model->ticket_member_action($member_ids, $action, $action_duration, $stop_start_at, $stop_end_at)) {
//              if ($res[1] == 0) {
//                $result['status'] = 'fail';
//                $result['message'] = "실패하였습니다!";
//                $this->response($result);
//              }
              $ticket = $this->center_model->get_ticket($ticket_id);
              $result['status'] = 'done';
              $result['total'] = $res[0];
              $result['success'] = $res[1];
              $result['failure'] = $res[2];
              $result['enroll_member_count'] = $ticket->enroll_member_count;
              $this->response($result);
            } else {
              $result['status'] = 'fail';
              $result['message'] = "internal error";
              $this->response($result);
            }
          }
        } else if ($para3 == 'history') { // center/course/ticket/member/history
          
          if (isset($_GET['page']) == false || isset($_GET['id']) == false) {
            $this->redirect_error('접근 오류가 발생하였습니다!');
          }
          $page = $_GET['page'];
          $member_id = $_GET['id'];
          $size = CENTER_ADMIN_ITEM_LIST_PAGE_SIZE;
          $offset = $size * ($page - 1);
         
          $histories = array();
          $total_cnt = $this->center_model->ticket_member_history_cnt($member_id);
          if ($total_cnt > 0) {
            $histories = $this->center_model->ticket_member_history($member_id, $offset, $size);
          }
  
          $num = $this->crud_model->get_list_page_num($total_cnt, $size, $page);
  
          $this->page_data['total_cnt'] = $total_cnt;
          $this->page_data['page'] = $page;
          $this->page_data['total'] = $num['total'];
          $this->page_data['prev'] = $num['prev'];
          $this->page_data['next'] = $num['next'];
          $this->page_data['member_id'] = $member_id;
          $this->page_data['histories'] = $histories;
          $this->page_data['page_name'] = 'course';
          $this->load->view('back/center/ticket_member_history', $this->page_data);
        }
      }
      
    } else { // course/ticket
      
      $tickets[0] = $this->center_model->get_tickets($center_id, 0);
      $tickets[1] = $this->center_model->get_tickets($center_id, 1);
      
      $this->page_data['tickets'] = $tickets;
      $this->page_data['page_name'] = "course";
      $this->load->view('back/center/index', $this->page_data);
      
    }
  }
  
  public function member($para1 = '', $para2 = '', $para3 = '')
  {
    $this->redirect_error();
    
    if ($this->is_logged() == false) {
      redirect(base_url() . 'center', 'refresh');
    }
  
    $ticket_id = 0;
    if (isset($_GET['ticket_id'])) {
      $ticket_id = $_GET['ticket_id'];
    }
    $page = 1;
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    }
    $filter = '';
    if (isset($_GET['filter'])) {
      $filter = $_GET['filter'];
    }
  
    $size = CENTER_ADMIN_ITEM_LIST_PAGE_SIZE;
    $offset = $size * ($page - 1);
  
    $filter_col = '';
    if (empty($filter) == false) {
      if(preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $filter) || preg_match("/^[0-9]+/", $filter)) {
        $filter_col = 'phone';
        $filter = preg_replace("/[^0-9]/", '', $filter);
      } else if (strstr($filter, '@')) {
        $filter_col = 'email';
      } else {
        $filter_col = 'username';
      }
    }
  
    $total_cnt = $this->center_model->ticket_member_search_cnt($ticket_id, $filter, $filter_col, $this->center_id);
    $members = array();
    if ($total_cnt > 0) {
      $members = $this->center_model->ticket_member_search($ticket_id, $filter, $filter_col, $size, $offset, $this->center_id);
    }
  
//    log_message('debug', '[search list] ticket_id['.$ticket_id.'] total_cnt['.$total_cnt.'] members['.json_encode($members).'] '.
//      'filter['.$filter.'] filter_col['.$filter_col.']');
  
    $num = $this->crud_model->get_list_page_num($total_cnt, $size, $page);
  
    $this->page_data['total_cnt'] = $total_cnt;
    $this->page_data['page'] = $page;
    $this->page_data['total'] = $num['total'];
    $this->page_data['prev'] = $num['prev'];
    $this->page_data['next'] = $num['next'];
  
//    $tickets[0] = $this->center_model->get_tickets($this->center_id, 0);
//    $tickets[1] = $this->center_model->get_tickets($this->center_id, 1);
//    $this->page_data['tickets'] = $tickets;
  
    $this->page_data['ticket_id'] = $ticket_id;
    $this->page_data['filter'] = $filter;
    $this->page_data['members'] = $members;
    $this->page_data['page_name'] = "member";
    $this->load->view('back/center/index', $this->page_data);
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
    $page = 'center';
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
    $page = 'center';
    if (isset($_GET['p'])) {
      $page = $_GET['p'];
    }
    $this->page_data['page_name'] = $page;
    $this->page_data['msg'] = $msg;
    $this->load->view('front/others/info', $this->page_data);
  }
  
  private function redirect_error($msg = '', $page = 'center') {
    redirect(base_url().'center/error?m='.$msg.'&p='.$page);
  }
  
  private function redirect_info($msg = '', $page = 'center') {
    redirect(base_url().'center/info?m='.$msg.'&p='.$page);
  }
  
  private function response($result) {
    echo json_encode($result);
    exit;
  }
}
