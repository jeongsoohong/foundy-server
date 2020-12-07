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
  function login($para1 = '')
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
          echo '존재하지 않는 이메일입니다.';
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
            echo '이메일 전송에 문제가 발생했습니다.';
          }
        } else {
          echo '존재하지 않는 이메일입니다.';
        }
      }
      
    } else if ($para1 == 'forget') {
      
      $this->load->library('form_validation');
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
      if ($this->form_validation->run() == FALSE) {
        echo validation_errors();
      } else {
        
        $email = $this->input->post('email');
        $code = $this->input->post('approval_code');
        
        $approval_email = $this->session->userdata('shop_approval_email');
        $approval_code = $this->session->userdata('shop_approval_code');
        
        if ($email != $approval_email) {
          $this->crud_model->alert_exit('이메일이 올바르지 않습니다. 다시 확인 바랍니다.');
        }
        if ($code != $approval_code) {
          $this->crud_model->alert_exit('인증코드가 올바르지 않습니다. 다시 확인 바랍니다.');
        }
  
        $user_data = $this->db->get_where('user', array('email' => $email))->row();
        if (!isset($user_data) && empty($user_data) == true) {
          echo 'email_nay';
          exit;
        }
  
        $center_data = $this->db->get_where('center', array('user_id' => $user_data->user_id, 'activate' => 1))->row();
        if (isset($center_data) && empty($center_data) == false) {
          
          $password = substr(hash('sha512', rand()), 0, 12);
          $data['password'] = sha1($password);
          $this->db->where('email', $email);
          $this->db->update('shop', $data);
          
          if ($this->email_model->get_reset_pw_data($email, $password)) {
            echo 'email_sent';
          } else {
            echo 'email_not_sent';
          }
        } else {
          echo 'email_nay';
        }
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
  
    } else if ($para1 == 'schedule') {
      
      if ($para2 == 'calendar') {
        $year = isset($_GET['y']) ? $_GET['y'] : date('Y');
        $month = isset($_GET['m']) ? $_GET['m'] : date('m');
        
        $first_time = strtotime($year.'-'.$month.'-01 00:00:00');
  
        $start_week = date('w', $first_time); // 1. 시작 요일
        $total_day = date('t', $first_time); // 2. 현재 달의 총 날짜
        $total_week = ceil(($total_day + $start_week) / 7);  // 3. 현재 달의 총 주차
        $last_month_total_day = date('t', $first_time - 1);
  
//        $this->crud_model->alert_exit($start_week.'.'.$total_day.'.'.$total_week);
  
        $this->page_data['year'] = $year;
        $this->page_data['month'] = $month;
        $this->page_data['start_week'] = $start_week;
        $this->page_data['total_day'] = $total_day;
        $this->page_data['total_week'] = $total_week;
        $this->page_data['last_month_total_day'] = $last_month_total_day;
        $this->load->view('back/center/schedule_calendar', $this->page_data);
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
      
    } else { // index
  
      $year = date('Y');
      $month = date('m');
      $day = date('d');
      $date = "$year.$month.$day"; // 현재 날짜
  
      $this->page_data['year'] = $year;
      $this->page_data['month'] = $month;
      $this->page_data['date'] = $date;
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
        $this->form_validation->set_rules('ticket_title', 'title_title', 'trim|required|max_length[16]');
        $this->form_validation->set_rules('ticket_price', 'ticket_price', 'trim|required|is_natural|less_than_equal_to[10000000]');
        $this->form_validation->set_rules('ticket_type', 'ticket_type', 'trim|required|is_natural|less_than_equal_to[2]');
        $this->form_validation->set_rules('reservable_count', 'reservable_count', 'trim|required|is_natural|less_than_equal_to[100]');
        $this->form_validation->set_rules('reservable_count_oneday', 'reservable_count_oneday', 'trim|required|is_natural|less_than_equal_to[10]');
        $this->form_validation->set_rules('reservable_duration', 'reservable_duration', 'trim|required|is_natural|less_than_equal_to[365]');
        $this->form_validation->set_rules('limit_cancel_count_enable', 'limit_cancel_count_enable', 'trim|required|is_natural|less_than_equal_to[1]');
        $this->form_validation->set_rules('limit_cancel_count_oneday', 'limit_cancel_count_oneday', 'trim|required|is_natural|less_than_equal_to[10]');
        $this->form_validation->set_rules('limit_cancel_count_total', 'limit_cancel_count_total', 'trim|required|is_natural|less_than_equal_to[100]');
        $this->form_validation->set_rules('limit_enroll_member_count', 'limit_enroll_member_count', 'trim|required|is_natural|less_than_equal_to[1000]');
  
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
          $this->form_validation->set_rules('ticket_title', 'title_title', 'trim|required|max_length[16]');
          $this->form_validation->set_rules('ticket_price', 'ticket_price', 'trim|required|is_natural|less_than_equal_to[10000000]');
          $this->form_validation->set_rules('ticket_type', 'ticket_type', 'trim|required|is_natural|less_than_equal_to[2]');
          $this->form_validation->set_rules('reservable_count', 'reservable_count', 'trim|required|is_natural|less_than_equal_to[100]');
          $this->form_validation->set_rules('reservable_count_oneday', 'reservable_count_oneday', 'trim|required|is_natural|less_than_equal_to[10]');
          $this->form_validation->set_rules('reservable_duration', 'reservable_duration', 'trim|required|is_natural|less_than_equal_to[365]');
          $this->form_validation->set_rules('limit_cancel_count_enable', 'limit_cancel_count_enable', 'trim|required|is_natural|less_than_equal_to[1]');
          $this->form_validation->set_rules('limit_cancel_count_oneday', 'limit_cancel_count_oneday', 'trim|required|is_natural|less_than_equal_to[10]');
          $this->form_validation->set_rules('limit_cancel_count_total', 'limit_cancel_count_total', 'trim|required|is_natural|less_than_equal_to[100]');
          $this->form_validation->set_rules('limit_enroll_member_count', 'limit_enroll_member_count', 'trim|required|is_natural|less_than_equal_to[1000]');
  
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
        
//        log_message('debug', '[search list] ticket_id['.$ticket_id.'] total_cnt['.$total_cnt.'] members['.json_encode($members).'] '.
//        'filter['.$filter.'] filter_col['.$filter_col.'] user['.json_encode($user).']');
  
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
            $action = $this->input->post('action');
            $member_ids = json_decode($this->input->post('member_ids'));
            $action = $this->input->post('action');
            $action_duration = $this->input->post('action_duration');
//            $action_id = $this->input->post('action_id');
            $stop_start_at = $this->input->post('stop_start_at');
            $stop_end_at = $this->input->post('stop_end_at');
            
            if ($action == CENTER_TICKET_MEMBER_ACTION_STOP) {
              $start_time = strtotime($stop_start_at);
              $end_time = strtotime($stop_end_at);
              $action_duration = ($end_time - $start_time) / ONE_DAY + 1;
//              $stop_start_at = date('Y-m-d', $start_time);
//              $stop_end_at = date('Y-m-d', $end_time);
            }
  
            if ($this->center_model->ticket_member_action($member_ids, $action, $action_duration, null, $stop_start_at, $stop_end_at)) {
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
  
  public function error()
  {
    $this->page_data['page_name'] = "center";
    $this->load->view('front/others/404_error', $this->page_data);
  }

  private function redirect_error()
  {
    redirect(base_url().'center/error');
  }
}
