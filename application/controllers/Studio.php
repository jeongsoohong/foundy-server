<?php


if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Studio extends CI_Controller
{
  private $user_id = 0;
  private $user = null;
  
  private $teacher_id = 0;
  private $teacher = null;
  
  private $studio_id = 0;
  private $studio_ids = null;
  private $studio = null;
  private $studios = null;
  
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
    $page = 'studio';
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
    $page = 'studio';
    if (isset($_GET['p'])) {
      $page = $_GET['p'];
    }
    $this->page_data['page_name'] = $page;
    $this->page_data['msg'] = $msg;
    $this->load->view('front/others/info', $this->page_data);
  }
  
  private function redirect_error($msg = '', $page = 'studio') {
    redirect(base_url().'studio/error?m='.$msg.'&p='.$page);
  }
  
  private function redirect_info($msg = '', $page = 'studio') {
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
  
  /* index of the admin. Default: Dashboard; On No Login Session: Back to login page. */
  function index()
  {
    if ($this->is_logged() == false) {
      // for login
      $this->page_data['control'] = "studio";
      $this->load->view('back/login', $this->page_data);
    } else {
      redirect(base_url() . 'studio/teacher', 'refresh');
    }
  }
  
  /* Login into Admin panel */
  function login($para1 = '', $para2 = '')
  {
    if ($para1 == 'forget_form') {
      
      $this->load->view('back/forget_password', $this->page_data);
      
    } else if ($para1 == 'send_approval') {
      
      $this->load->library('form_validation');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
      if ($this->form_validation->run() == FALSE) {
        echo validation_errors();
      } else {
        
        $email = $this->input->post('email');
        $user = $this->db->get_where('user', array('email' => $email))->row();
        if (!isset($user) && empty($user) == true) {
          echo '존재하지 않는 이메일입니다!';
          exit;
        }
        
        $teacher_data = $this->db->get_where('teacher', array('user_id' => $user->user_id, 'activate' => 1))->row();
        if (isset($teacher_data) && empty($teacher_data) == false) {
          
          $code = rand(111111, 999999);
          
          if ($this->email_model->get_user_approval_code_data($code, $email)) {
            
            $this->session->set_userdata('studio_approval_email', $email);
            $this->session->set_userdata('studio_approval_code', $code);
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
        
        $approval_email = $this->session->userdata('studio_approval_email');
        $approval_code = $this->session->userdata('studio_approval_code');
        
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
        
        $user = $this->db->get_where('user', array('email' => $email))->row();
        if (!isset($user) && empty($user) == true) {
          $result['status'] = 'fail';
          $result['message'] = '회원 정보가 존재하지 않습니다!';
          $this->response($result);
        }
        
        $teacher_data = $this->db->get_where('teacher', array('user_id' => $user->user_id, 'activate' => 1))->row();
        if (isset($teacher_data) && empty($teacher_data) == false) {
          
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
        if ($auth->for != $for || $for != 'studio_forget_passwd') {
          $this->redirect_error('접근 오류가 발생하였습니다!(3)', 'close');
        }
        
        $auth_data = json_decode($auth->auth_data);
        $user = $this->db->get_where('user', array('phone' => $auth_data->mobileno))->row();
        if (!isset($user) && empty($use) == true) {
          $this->redirect_error('회원 정보가 존재하지 않습니다!', 'close');
        }
        
        $teacher_data = $this->db->get_where('teacher', array('user_id' => $user->user_id, 'activate' => 1))->row();
        if(isset($teacher_data) && empty($teacher_data) == false) {
          
          $password = substr(hash('sha512', rand()), 0, 12);
          $data['password'] = sha1($password);
          $this->db->where('phone', $user->phone);
          $this->db->update('user', $data);
          
          if ($this->mts_model->send_user_passwd($user->phone, $user->email, $password) > 0) {
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

        $user = $this->db->get_where('user', array('email' => $email))->row();
        if (empty($user) == false) {
          if ($user->password != $password) {
            echo '비밀번호가 잘못되었습니다.';
            exit;
          }
          $teacher_data = $this->db->get_where('teacher', array('user_id' => $user->user_id, 'activate' => 1))->row();
//          log_message('debug', '[studio] data['.json_encode($teacher_data).']');
          if (empty($teacher_data)) {
            echo '강사 회원이 아닙니다.';
            exit;
          }
          $this->session->set_userdata('studio_login', 'yes');
          
          $this->session->set_userdata('user_id', $user->user_id);
          $this->session->set_userdata('user', json_encode($user));
         
          $this->session->set_userdata('teacher_id', $teacher_data->teacher_id);
          $this->session->set_userdata('teacher', json_encode($teacher_data));
        
          if ($teacher_data->studio_ids != null) {
            $studio_ids = json_decode($teacher_data->studio_ids);
            $this->studio_id = $studio_ids[0];
            $this->studio = $this->db->get_where('studio', array('studio_id' => $this->studio_id))->row();
            $this->studios = $this->db->get_where('studio', array('user_id' => $this->user_id))->result();
            $this->session->set_userdata('studio_id', $studio_ids[0]);
            $this->session->set_userdata('studio', json_encode($this->studio));
            $this->session->set_userdata('studios', json_encode($this->studios));
          } else {
            $this->session->set_userdata('studio_id', 0);
          }
          echo 'lets_login';
        } else {
          echo '이메일이 잘못되었습니다.';
        }
      }
      
    }
  }
  
  /* Checking Login Stat */
  private function is_logged()
  {
    $this->page_data = array();
    if ($this->session->userdata('studio_login') == 'yes') {
//      $shops = json_decode($this->session->userdata('shops'));
      $this->user_id = $this->session->userdata('user_id');
      $this->user = json_decode($this->session->userdata('user'));
      $this->page_data['user_id'] = $this->user_id;
      $this->page_data['user'] = $this->user;
      
      $this->teacher_id = $this->session->userdata('teacher_id');
      $this->teacher = $this->teacher_model->get($this->teacher_id);
      $this->page_data['teacher_id'] = $this->teacher_id;
      $this->page_data['teacher'] = $this->teacher;
     
      $this->studio_ids = $this->teacher->studio_ids != null ? json_decode($this->teacher->studio_ids) : null;
      $this->studio_id = $this->studio_ids != null ? $this->studio_ids[0] : 0;
      $this->page_data['studio_id'] = $this->studio_id;
      
      if ($this->studio_id > 0) {
        $this->studio = $this->studio_model->get($this->studio_id);
        $this->studios = $this->studio_model->get_studios($this->teacher_id);
        
        $this->page_data['studio'] = $this->studio;
        $this->page_data['studios'] = $this->studios;
      }

//      log_message('debug', '[studio] user_id['.$this->user_id.']');
//      log_message('debug', '[studio] user['.json_encode($this->user).']');
//      log_message('debug', '[studio] teacher_id['.$this->teacher_id.']');
//      log_message('debug', '[studio] teacher['.json_encode($this->teacher).']');
//      log_message('debug', '[studio] studio_id['.$this->studio_id.']');
//      log_message('debug', '[studio] studio_ids['.json_encode($this->studio_ids).']');
//      log_message('debug', '[studio] studio['.json_encode($this->studio).']');
//      log_message('debug', '[studio] studios['.json_encode($this->studios).']');

      if (empty($this->teacher)) {
        echo ("<script>alert('강사 회원이 아닙니다');</script>");
        exit;
      }
      
      if (!($this->user->user_type & USER_TYPE_TEACHER)) {
        echo ("<script>alert('강사 회원이 아닙니다');</script>");
        exit;
      }
      
      if ($this->teacher->activate == 0) {
        echo ("<script>alert('승인 대기 중입니다');</script>");
        exit;
      }
      
      $this->page_data['register'] = false;
      
      return true;
    } else {
      return false;
    }
  }
  
  /* Loging out from Admin panel */
  function logout()
  {
//    $this->session->sess_destroy();
    $this->session->set_userdata('studio_login', 'no');
    redirect(base_url() . 'studio', 'refresh');
  }
  
  function change()
  {
    $studio_id = $this->input->get('id');
    
    $studio_data = $this->db->get_where('studio', array('studio_id' => $studio_id))->row();
    if (empty($studio_data)) {
      $this->alert_exit('스튜디오가 존재하지 않습니다');
    }
    if ($studio_data->activate != 1) {
      $this->alert_exit('승인 대기 중입니다.');
    }
  
    $this->studio_id = $studio_id;
    $this->studio = $studio_data;
    $this->session->set_userdata('studio_id', $this->studio_id);
    $this->session->set_userdata('studio', json_encode($this->studio));

    echo 'done';
  }
  
  public function teacher($para1 = '', $para2 = '', $para3 = '')
  {
    if ($this->is_logged() == false) {
      redirect(base_url() . 'studio', 'refresh');
    }
    
    if ($para1 == 'update') {
  
      $this->load->library('form_validation');
//      $this->form_validation->set_rules('teacher_name', 'teacher_name', 'trim|required|max_length[32]');
      $this->form_validation->set_rules('about', 'about', 'trim|required|max_length[64]');
      $this->form_validation->set_rules('youtube', 'youtube', 'trim|valid_url|max_length[256]');
      $this->form_validation->set_rules('instagram_', 'instagram', 'trim|valid_url|max_length[256]');
      $this->form_validation->set_rules('no_profile_image', 'no_profile_image', 'trim|required|is_natural|less_than_equal_to[1]');
  
      if ($this->form_validation->run() == FALSE) {
        echo '<br>' . validation_errors();
        exit;
      }
      
//      $name = $this->input->post('teacher_name');
      $about = $this->input->post('about');
      $youtube = $this->input->post('youtube');
      $instagram = $this->input->post('instagram');
      $categories = json_decode($this->input->post('category'));
      $category_etc =$this->input->post('category_etc');
      $no_profile_image =$this->input->post('no_profile_image');
      
      if ($no_profile_image == true) {
        $profile_image_url = null;
      } else {
        if (isset($_FILES['profile_image']) == false) {
          $profile_image_url = null;
        } else {
          $this->crud_model->file_validation($_FILES["profile_image"]);
          $file_name = 'teacher_' . $this->teacher_id . '.jpg';
          $this->crud_model->upload_image($this->teacher_model->get_img_path(), $file_name,
            $_FILES["profile_image"], 1000, 0, true, true);
  
          $time = time();
          $file_name = 'teacher_' . $this->teacher_id . '_thumb.jpg';
          $profile_image_url = $this->teacher_model->get_img_web_path(). $file_name . '?id=' . $time;
          $del_except_files[] = $this->teacher_model->get_img_path().$file_name;
        }
      }
      
      $this->teacher_model->update($this->teacher_id, $name = '', $about, $youtube, $instagram,
        $category_etc, $categories, $profile_image_url, $no_profile_image);

      $this->teacher = $this->db->get_where('teacher', array('teacher_id' => $this->teacher_id))->row();
      $this->session->set_userdata('teacher', json_encode($this->teacher));
      
      echo 'done';
      
    } else {
  
      $result = $this->teacher_model->get_categories($this->teacher_id);
      
      $this->page_data['category_data'] = $result[0];
      $this->page_data['category_etc'] = $result[1];
      $this->page_data['page_name'] = "teacher";
      $this->load->view('back/studio/index', $this->page_data);
    
    }
  }
  
  public function youtube($para1 = '', $para2 = '', $para3 = '')
  {
    if ($this->is_logged() == false) {
      redirect(base_url() . 'studio', 'refresh');
    }
    
    if ($para1 == 'list') {
  
      if (!isset($_GET['page'])) {
        $this->alert_exit('잘못된 접근입니다');
      }
  
      $page = $_GET['page'];
      $limit = $this->teacher_model::TEACHER_VIDEO_PAGE_SIZE;
      $offset = $limit * ($page - 1);
  
      $videos = $this->teacher_model->get_teacher_video($this->teacher_id, $limit, $offset);

      $this->page_data['videos'] = $videos;
      $this->load->view('back/studio/youtube_list', $this->page_data);
  
    } else if ($para1 == 'register') {
  
      $this->load->library('form_validation');
      $this->form_validation->set_rules('title', 'title', 'trim|required|max_length[40]');
      $this->form_validation->set_rules('desc', 'desc', 'trim|required|max_length[256]');
      $this->form_validation->set_rules('video_url', 'video_url', 'trim|required|valid_url|max_length[256]');
  
      if ($this->form_validation->run() == FALSE) {
        echo '<br>' . validation_errors();
      } else {
        $title = $this->input->post('title');
        $desc = $this->input->post('desc');
        $video_url = $this->input->post('video_url');
        $categories = json_decode($this->input->post('category'));
        $category_etc = $this->input->post('category_etc');
    
        $this->teacher_model->register_youtube($this->teacher, $title, $desc, $video_url, $categories, $category_etc);
    
        echo "done";
      }
  
    } else if ($para1 == 'unregister') {
  
      $this->load->library('form_validation');
      $this->form_validation->set_rules('id', 'id', 'trim|required|is_natural');
      if ($this->form_validation->run() == FALSE) {
        echo '<br>' . validation_errors();
        exit;
      }
      
      $video_id = $this->input->post('id');
      $this->teacher_model->unregister_video($video_id, $this->teacher_id);
  
      echo 'done';
      
    } else if ($para1 == 'update') {
  
      $this->load->library('form_validation');
      $this->form_validation->set_rules('id', 'id', 'trim|required|is_natural');
      $this->form_validation->set_rules('title', 'title', 'trim|required|max_length[40]');
      $this->form_validation->set_rules('desc', 'desc', 'trim|required|max_length[256]');
  
      if ($this->form_validation->run() == FALSE) {
        echo '<br>' . validation_errors();
        exit;
      }
  
      $video_id = $this->input->post('id');
      $title = $this->input->post('title');
      $desc = $this->input->post('desc');
      $categories = json_decode($this->input->post('category'));
      $category_etc = $this->input->post('category_etc');
  
      $video = $this->db->get_where('teacher_video', array('video_id' => $video_id))->row();
      if (empty($video)) {
        $this->alert_exit('잘못된 접근입니다');
      }
      
      if ($video->teacher_id != $this->teacher_id) {
        $this->alert_exit('잘못된 접근입니다');
      }
  
      $this->teacher_model->update_youtube($video_id, $title, $desc, $categories, $category_etc);
  
      echo 'done';
  
    } else if ($para1 == 'manage') {
  
      if (!isset($_GET['id'])) {
        $this->alert_exit('잘못된 접근입니다');
      }
  
      $video_id = $_GET['id'];
      $video = $this->teacher_model->get_video($this->teacher_id, $video_id);
      if (isset($video) == false || empty($video) == true) {
        $this->alert_exit('잘못된 접근입니다');
      }
      
//      log_message('debug', '[youtube] data['.json_encode($video).']');
      
      $result = $this->teacher_model->get_video_categories($video_id);
      $category_data = $result[0];
      $category_etc = $result[1];
  
      $this->page_data['category_data'] = $category_data;
      $this->page_data['category_etc'] = $category_etc;
      $this->page_data['video'] = $video;
      $this->load->view('back/studio/youtube_manage', $this->page_data);

    } else {
  
      $this->page_data['page_name'] = "youtube";
      $this->load->view('back/studio/index', $this->page_data);
    
    }
  }
  
  public function account($para1 = '', $para2 = '', $para3 = '')
  {
    if ($this->is_logged() == false) {
      redirect(base_url() . 'studio', 'refresh');
    }
    if ($para1 == 'register') {
  
      $this->load->library('form_validation');
//      $this->form_validation->set_rules('title', 'title', 'trim|required|max_length[32]');
//      $this->form_validation->set_rules('about', 'about', 'trim|required|max_length[64]');
//      $this->form_validation->set_rules('instagram', 'instagram', 'trim|valid_url|max_length[256]');
//      $this->form_validation->set_rules('youtube', 'youtube', 'trim|valid_url|max_length[256]');
      $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|max_length[128]');
      $this->form_validation->set_rules('payment_page', 'payment_page', 'trim|valid_url|max_length[256]');
  
      if ($this->form_validation->run() == FALSE) {
        echo '<br>' . validation_errors();
        exit;
      }
      
//      $title = $this->input->post('title');
//      $about = $this->input->post('about');
//      $instagram = $this->input->post('instagram');
//      $youtube = $this->input->post('youtube');
      $email = $this->input->post('email');
      $payment_page = $this->input->post('payment_page');
  
      $categories_yoga = json_decode($this->input->post('category_yoga'));
      $categories_pilates = json_decode($this->input->post('category_pilates'));
      $category_yoga_etc = $this->input->post('category_yoga');
      $category_pilates_etc = $this->input->post('category_pilates');
      
      $title = $this->teacher->name;
      $instagram = $this->teacher->instagram;
      $youtube = $this->teacher->youtube;
  
      $studio_id = $this->studio_model->register($this->user_id, $this->teacher_id, null,
        $title, $instagram, $youtube, $email, $payment_page,
        $categories_yoga, $categories_pilates, $category_yoga_etc, $category_pilates_etc);
     
      if ($this->teacher->studio_ids == null) {
        $this->teacher->studio_ids = array();
      }
      $this->teacher->studio_ids[] = $studio_id;
      
      $this->db->update('teacher', array('studio_ids' => json_encode($this->teacher->studio_ids)), array('teacher_id' => $this->teacher_id));
  
      echo "done";
    
    } else if ($para1 == 'profile') {
      
      if ($para2 == 'update') {
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|max_length[128]');
        $this->form_validation->set_rules('instagram_', 'instagram', 'trim|valid_url|max_length[256]');
        $this->form_validation->set_rules('youtube', 'youtube', 'trim|valid_url|max_length[256]');
        $this->form_validation->set_rules('payment_page', 'payment_page', 'trim|valid_url|max_length[256]');
        
        if ($this->form_validation->run() == FALSE) {
          echo '<br>' . validation_errors();
          exit;
        }
  
//        $instagram = $this->input->post('instagram');
//        $youtube = $this->input->post('youtube');
        $email = $this->input->post('email');
        $payment_page = $this->input->post('payment_page');
  
        $instagram = $this->teacher->instagram;
        $youtube = $this->teacher->youtube;
        
        $categories_yoga = json_decode($this->input->post('category_yoga'));
        $categories_pilates = json_decode($this->input->post('category_pilates'));
        
        $category_yoga_etc = trim($this->input->post('category_yoga_etc'));
        $category_pilates_etc = trim($this->input->post('category_pilates_etc'));
        
        $this->studio_model->update_profile($this->studio_id, $instagram, $youtube, $email, $payment_page,
          $categories_yoga, $category_yoga_etc, $categories_pilates, $category_pilates_etc);
        
        echo "done";
        
      } else {
        $this->error();
      }
      
    } else if ($para1 == 'info') {
      
      //Upload image summernote
      if ($para2 == 'upload_image') {
        
        if (isset($_FILES["file"])) {
          $this->response($this->studio_model->upload_image($_FILES['file'], $this->studio_id));
        } else {
          $this->response(array('success' => false, 'error' => 4));
        }
        
      } else if ($para2 == 'update') { // save info
        
        $this->studio_model->update_info($this->studio_id, $this->user_id, $this->input->post('info'));
        echo 'done';
        
      }
      
    } else if ($para1 == 'about') {
      
      if ($para2 == 'update') {
        
        $this->studio_model->update_about($this->studio_id, $this->user_id, $this->input->post('about'));
        echo 'done';
        
      }
      
    } else {
      
      if ($this->studio_id == 0 && isset($_GET['r']) == false) {
        $this->redirect_error('접근 오류가 발생하였습니다!(1)');
      }
      
      $register = false;
      if (isset($_GET['r'])) {
        $register = true;
      }
      
      if ($register == true && $this->studio_id > 0) {
        $this->alert_exit('이미신청하셨습니다', base_url().'studio');
      }
      
      $category_yoga_data = array();
      $category_yoga_etc = '';
      $category_pilates_data = array();
      $category_pilates_etc = '';
      if ($register == false) {
        $result = $this->studio_model->get_categories($this->studio_id, STUDIO_TYPE_YOGA);
        $category_yoga_data = $result[0];
        $category_yoga_etc = $result[1];
        $result = $this->studio_model->get_categories($this->studio_id, STUDIO_TYPE_PILATES);
        $category_pilates_data = $result[0];
        $category_pilates_etc = $result[1];
      }
      
      $this->page_data['register'] = $register;
      $this->page_data['category_yoga_data'] = $category_yoga_data;
      $this->page_data['category_yoga_etc'] = $category_yoga_etc;
      $this->page_data['category_pilates_data'] = $category_pilates_data;
      $this->page_data['category_pilates_etc'] = $category_pilates_etc;
      
      $this->page_data['page_name'] = "account";
      $this->load->view('back/studio/index', $this->page_data);
      
    }
    
  }
  
  function schedule($para1 = '', $para2 = '', $para3 = '')
  {
    if ($this->is_logged() == false) {
      redirect(base_url() . 'studio', 'refresh');
    }
  
    if ($para1 == 'calendar') {
      
      $year = isset($_GET['y']) ? $_GET['y'] : date('Y');
      $month = isset($_GET['m']) ? $_GET['m'] : date('m');
      $open_date = isset($_GET['d']) ? $_GET['d'] : date('Y-m-d');
    
      $first_time = strtotime($year . '-' . $month . '-01 00:00:00');
    
      $start_week = date('w', $first_time); // 1. 시작 요일
      $total_day = date('t', $first_time); // 2. 현재 달의 총 날짜
      $total_week = ceil(($total_day + $start_week) / 7);  // 3. 현재 달의 총 주차
      $last_month_total_day = date('t', $first_time - 1);

//        $this->alert_exit($start_week.'.'.$total_day.'.'.$total_week);
      
      $this->page_data['studio_id'] = $this->studio_id;
      $this->page_data['year'] = $year;
      $this->page_data['month'] = $month;
      $this->page_data['open_date'] = $open_date;
      $this->page_data['start_week'] = $start_week;
      $this->page_data['total_day'] = $total_day;
      $this->page_data['total_week'] = $total_week;
      $this->page_data['last_month_total_day'] = $last_month_total_day;
      $this->load->view('back/studio/schedule_calendar', $this->page_data);
    
    } else if ($para1 == 'list') {
    
      if (isset($_GET['date']) == false) {
        $this->redirect_error('비정상적인 접근입니다!');
      }
    
      $date = $_GET['date'];
      $schedules = $this->db->order_by('start_time', 'asc')->get_where('studio_schedule_info',
        array('studio_id' => $this->studio_id, 'schedule_date' => $date, 'activate' => 1))->result();
      
      foreach ($schedules as $class) {
        $class->reserve = $this->studio_model->get_schedule_reserve_cnt($class->schedule_info_id);
        $class->wait = $this->studio_model->get_schedule_wait_cnt($class->schedule_info_id);
      }
    
      $this->page_data['classes'] = $schedules;
      $this->page_data['page_name'] = "teacher";
      $this->load->view('back/studio/schedule_list', $this->page_data);
  
    } else if ($para1 == 'link') {
      
      if ($para2 == 'set') {
  
        $this->load->library('form_validation');
        $this->form_validation->set_rules('sid', 'sid', 'trim|required|is_natural|max_length[10]');
        $this->form_validation->set_rules('send_link_immediate', 'send_link_immediate', 'trim|required|is_natural|less_than_equal_to[1]');
        $this->form_validation->set_rules('class_link', 'class_link', 'trim|required|valid_url|max_length[256]');
        $this->form_validation->set_rules('class_id', 'class_id', 'trim|required|max_length[128]');
        $this->form_validation->set_rules('class_pw', 'class_pw', 'trim|required|max_length[128]');
        
        if ($this->form_validation->run() == FALSE) {
          echo '<br>' . validation_errors();
          exit;
        }
  
        $schedule_info_id = $this->input->post('sid');
        $send_link_immediate = $this->input->post('send_link_immediate');
        $send_link_hour = $this->input->post('send_link_hour');
        $class_link = $this->input->post('class_link');
        $class_id = $this->input->post('class_id');
        $class_pw = $this->input->post('class_pw');
        
        $schedule_info = $this->studio_model->get_schedule_info($schedule_info_id);
        if ($schedule_info->ticketing == 0) {
          $this->response(array('status' => 'fail', 'message' => '예약이 오픈되지 않았습니다!'));
        }
        
        if ($send_link_immediate == 0) {
          if ($send_link_hour < 1) {
            $this->response(array('status' => 'fail', 'message' => '링크 자동 발송 시간은 최소 1시간 전으로 설정되어야 합니다!'));
          }
        } else {
          $send_link_hour = 0;
        }
        
        $data = array(
          'send_link_immediate' => $send_link_immediate,
          'send_link_hour' => $send_link_hour,
          'class_link' => $class_link,
          'class_id' => $class_id,
          'class_pw' => $class_pw,
        );
        $where = array('schedule_info_id' => $schedule_info_id);
        $this->db->update('studio_schedule_info', $data, $where);
     
        if ($send_link_immediate == 1) {
          $schedule_info = $this->studio_model->get_schedule_info($schedule_info_id);
          $studio_info = $this->studio_model->get($schedule_info->studio_id);
          $studio_user_data = $this->db->get_where('user', array('user_id' => $studio_info->user_id))->row();
          $reserve_list = $this->studio_model->get_schedule_reserve_list($schedule_info_id);
          foreach ($reserve_list as $reserve) {
            $user_data = $this->db->get_where('user', array('user_id' => $reserve->user_id))->row();
            $this->email_model->send_online_class_link($user_data->email, $schedule_info->teacher_name, $schedule_info->schedule_title,
              $schedule_info->schedule_date, $schedule_info->start_time, $schedule_info->class_link, $schedule_info->class_id,
              $schedule_info->class_pw, (isset($studio_info->email) ? $studio_info->email : $studio_user_data->email));
            $this->mts_model->send_studio_class_reserve($user_data, $studio_user_data, $studio_info, $schedule_info);
          }
        }
        
        $this->response(array('status' => 'done', 'message' => '성공하였습니다!'));
  
      } else if ($para2 == 'send') {
  
        $this->load->library('form_validation');
        $this->form_validation->set_rules('sid', 'sid', 'trim|required|is_natural|max_length[10]');
        $this->form_validation->set_rules('rid', 'rid', 'trim|required|is_natural|max_length[10]');
  
        if ($this->form_validation->run() == FALSE) {
          echo '<br>' . validation_errors();
          exit;
        }
  
        $schedule_info_id = $this->input->post('sid');
        $reserve_id = $this->input->post('rid');
  
        $schedule_info = $this->studio_model->get_schedule_info($schedule_info_id);
        if ($schedule_info->ticketing == 0) {
          $this->response(array('status' => 'fail', 'message' => '예약이 오픈되지 않았습니다!'));
        }
        
        $reserve_info = $this->studio_model->get_reserve_info($reserve_id);
        if ($reserve_info->reserve != 1) {
          $this->response(array('status' => 'fail', 'message' => '티켓팅이 확정되지 않았습니다!'));
        }
  
        $studio_info = $this->studio_model->get($schedule_info->studio_id);
        $studio_user_data = $this->db->get_where('user', array('user_id' => $studio_info->user_id))->row();
        $user_data = $this->db->get_where('user', array('user_id' => $reserve_info->user_id))->row();
        $this->email_model->send_online_class_link($user_data->email, $schedule_info->teacher_name, $schedule_info->schedule_title,
          $schedule_info->schedule_date, $schedule_info->start_time, $schedule_info->class_link, $schedule_info->class_id,
          $schedule_info->class_pw, (isset($studio_info->email) ? $studio_info->email : $studio_user_data->email));
        $this->mts_model->send_studio_class_reserve($user_data, $studio_user_data, $studio_info, $schedule_info);
  
        $this->response(array('status' => 'done', 'message' => '성공하였습니다!'));
      
      } else {
        $this->redirect_error('비정상적인 접근입니다!');
      }
  
    } else if ($para1 == 'unregister') {
  
      $this->load->library('form_validation');
      $this->form_validation->set_rules('id', 'id', 'trim|required|is_natural|max_length[10]');
      if ($this->form_validation->run() == FALSE) {
        echo '<br>' . validation_errors();
        exit;
      }
  
      $schedule_info_id = $this->input->post('id');
      $result['status'] = 'done';
      $result['message'] = '성공하였습니다!';
  
      $lock = $this->studio_model->lock_schedule_info($schedule_info_id);
      if (empty($lock) == true || $lock == false) {
        $result['status'] = 'fail';
        $result['message'] = '클래스 예약 요청이 많습니다! 잠시 후 다시 시도해주세요!';
        $this->response($result);
      }
  
      $schedule_info = $this->studio_model->get_schedule_info($schedule_info_id);
      if (isset($schedule_info) == false || empty($schedule_info) == true) {
        $this->studio_model->unlock_schedule_info($schedule_info_id);
        $result['status'] = 'fail';
        $result['message'] = '비정상적인 접근입니다!';
        $this->response($result);
      }
      
      $this->db->set('updated_at', 'NOW()', false);
//      $this->db->set('deleted_at', 'NOW()', false);
      $this->db->update('studio_schedule_info', array('activate' => 0), array('schedule_info_id' => $schedule_info_id));
      if ($this->db->affected_rows() <= 0) {
        $this->studio_model->unlock_schedule_info($schedule_info_id);
        $result['status'] = 'fail';
        $result['message'] = '클래스 삭제가 불가능한 상태입니다! 잠시 후 다시 시도해주세요!';
        $this->response($result);
      }
  
//      $reserve_list = $this->studio_model->get_schedule_reserve_list($schedule_info_id);
//      foreach ($reserve_list as $reserve_info) {
//        $this->center_model->schedule_cancel($reserve_info, $schedule_info->schedule_title, $schedule_info->schedule_date);
//        $user_info = $this->db->get_where('user', array('user_id' => $reserve_info->user_id))->row();
//        $this->mts_model->send_class_reserve_by_center($user_info->phone, CENTER_TICKET_MEMBER_ACTION_RESERVE_CANCEL,
//          $schedule_info->schedule_title, $schedule_info->schedule_date, $this->center->title,
//          $schedule_info->start_time,$schedule_info->end_time);
//          $this->mts_model->send_class_cancel($user_info->phone, $user_info->username, $schedule_info->schedule_title,
//          date('Y.m.d', strtotime($schedule_info->schedule_date)));
//      }
//      $wait_list = $this->studio_model->get_schedule_wait_list($schedule_info_id);
//      foreach ($wait_list as $reserve_info) {
//        $this->center_model->schedule_cancel($reserve_info, $schedule_info->schedule_title, $schedule_info->schedule_date);
//        $user_info = $this->db->get_where('user', array('user_id' => $reserve_info->user_id))->row();
//        $this->mts_model->send_class_reserve_by_center($user_info->phone, CENTER_TICKET_MEMBER_ACTION_RESERVE_CANCEL,
//          $schedule_info->schedule_title, $schedule_info->schedule_date, $this->center->title,
//          $schedule_info->start_time,$schedule_info->end_time);
//          $this->mts_model->send_class_cancel($user_info->phone, $user_info->username, $schedule_info->schedule_title,
//            date('Y.m.d', strtotime($schedule_info->schedule_date)));
//      }
  
      $this->center_model->unlock_schedule_info($schedule_info_id);
      $this->response($result);
  
    } else if ($para1 == 'register') {
  
      $this->load->library('form_validation');
      $this->form_validation->set_rules('start_date', 'start_date', 'trim|required|max_length[10]');
      $this->form_validation->set_rules('end_date', 'end_date', 'trim|required|max_length[10]');
      $this->form_validation->set_rules('start_time', 'start_time', 'trim|required|max_length[8]');
      $this->form_validation->set_rules('end_time', 'end_time', 'trim|required|max_length[8]');
      $this->form_validation->set_rules('schedule_title', 'schedule_title', 'trim|required|max_length[32]');
      $this->form_validation->set_rules('weeklys', 'weeklys', 'trim|required|max_length[100]');
      $this->form_validation->set_rules('ticketing', 'ticketing', 'trim|required|is_natural|less_than_equal_to[1]');
      $this->form_validation->set_rules('reservable', 'reservable', 'trim|required|is_natural|less_than_equal_to[1]');
      $this->form_validation->set_rules('reservable_number', 'reservable_number', 'trim|is_natural|max_length[5]');
      $this->form_validation->set_rules('open_immediate', 'open_immediate', 'trim|is_natural|less_than_equal_to[1]');
      $this->form_validation->set_rules('reserve_open_hour', 'reserve_open_hour', 'trim|is_natural|max_length[5]');
      $this->form_validation->set_rules('reserve_close_hour', 'reserve_close_hour', 'trim|is_natural|max_length[5]');
      $this->form_validation->set_rules('reserve_cancel_open_hour', 'reserve_cancel_open_hour', 'trim|is_natural|max_length[5]');
      $this->form_validation->set_rules('reserve_cancel_close_hour', 'reserve_cancel_close_hour', 'trim|is_natural|max_length[5]');
      $this->form_validation->set_rules('waitable', 'waitable', 'trim|is_natural|less_than_equal_to[1]');
      $this->form_validation->set_rules('waitable_number', 'waitable_number', 'trim|is_natural|max_length[5]');
  
      $this->form_validation->set_rules('use_bank', 'use_bank', 'trim|is_natural|less_than_equal_to[1]');
      $this->form_validation->set_rules('bank_name', 'bank_name', 'trim|max_length[16]');
      $this->form_validation->set_rules('bank_account_number', 'bank_account_number', 'trim|max_length[32]');
      $this->form_validation->set_rules('bank_depositor', 'bank_depositor', 'trim|max_length[32]');
      $this->form_validation->set_rules('reserve_popup', 'reserve_popup', 'trim|max_length[100]');
      $this->form_validation->set_rules('payment_page', 'payment_page', 'trim|valid_url|max_length[256]');
//      $this->form_validation->set_rules('use_class_price', 'use_class_price', 'trim|is_natural|less_than_equal_to[1]');
      $this->form_validation->set_rules('class_price', 'class_price', 'trim|is_natural|less_than_equal_to[9999999]');
      $this->form_validation->set_rules('use_teacher_image', 'use_teacher_image', 'trim|required|is_natural|less_than_equal_to[1]');
  
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
      $teacher_name = $this->input->post('teacher_name');
      $ticketing = $this->input->post('ticketing');
      $reservable = $this->input->post('reservable');
      $reservable_number = $this->input->post('reservable_number');
      $open_immediate = $this->input->post('open_immediate');
      $reserve_open_hour = $this->input->post('reserve_open_hour');
      $reserve_close_hour = $this->input->post('reserve_close_hour');
//      $reserve_cancel_open_hour = $this->input->post('reserve_cancel_open_hour');
//      $reserve_cancel_close_hour = $this->input->post('reserve_cancel_close_hour');
      $waitable = $this->input->post('waitable');
      $waitable_number = $this->input->post('waitable_number');
  
      $use_bank = $this->input->post('use_bank');
      $bank_name = $this->input->post('bank_name');
      $bank_account_number = $this->input->post('bank_account_number');
      $bank_depositor = $this->input->post('bank_depositor');
      $reserve_popup = $this->input->post('reserve_popup');
      $payment_page = $this->input->post('payment_page');
//      $use_class_price = $this->input->post('use_class_price');
      $class_price = $this->input->post('class_price');
      $use_teacher_image = $this->input->post('use_teacher_image');
  
      $categories_yoga = json_decode($this->input->post('category_yoga'));
      $categories_pilates = json_decode($this->input->post('category_pilates'));
      $category_yoga_etc = $this->input->post('category_yoga_etc');
      $category_pilates_etc = $this->input->post('category_pilates_etc');
  
//      log_message('debug', '[schedule] start_time['.$start_time.'] end_time['.$end_time.']');
//      log_message('debug', '[schedule] date['.json_encode($_POST, JSON_UNESCAPED_UNICODE).']');
  
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
  
      if (empty($teacher_name) || strlen($teacher_name) == 0) {
        $result['status'] = 'fail';
        $result['message'] = '강사이름을 입력해 주세요!';
        $this->response($result);
      }
  
      if ($ticketing) {
  
        if (isset($class_price) == false || empty($class_price)) {
          $result['status'] = 'fail';
          $result['message'] = '수업료를 정확히 입력해주세요!';
          $this->response($result);
        }
  
        if ($open_immediate == false) {
          if ($reserve_open_hour < $reserve_close_hour) {
            $result['status'] = 'fail';
            $result['message'] = '예약 가능 시간을 정확히 입력해주세요!';
            $this->response($result);
          }
//          if ($reserve_cancel_open_hour < $reserve_cancel_close_hour) {
//            $result['status'] = 'fail';
//            $result['message'] = '취소 가능 시간을 정확히 입력해주세요!';
//            $this->response($result);
//          }
        } else {
          $reserve_open_hour = 0;
        }
    
        if ($use_bank == true) {
          if (isset($bank_name) == false || empty($bank_name)) {
            $result['status'] = 'fail';
            $result['message'] = '은행명을 정확히 입력해주세요!';
            $this->response($result);
          }
          if (isset($bank_account_number) == false || empty($bank_account_number)) {
            $result['status'] = 'fail';
            $result['message'] = '계좌번호를 정확히 입력해주세요!';
            $this->response($result);
          }
          if (isset($bank_depositor) == false || empty($bank_depositor)) {
            $result['status'] = 'fail';
            $result['message'] = '계좌번호를 정확히 입력해주세요!';
            $this->response($result);
          }
          $payment_page = null;
        } else {
          if (isset($payment_page) == false || empty($payment_page)) {
            $result['status'] = 'fail';
            $result['message'] = '결제페이지 주소를 정확히 입력해주세요!';
            $this->response($result);
          }
          $bank_name = null;
          $bank_account_number = null;
          $bank_depositor = null;
        }
  
        if (isset($reserve_popup) == false || empty($reserve_popup)) {
          $result['status'] = 'fail';
          $result['message'] = '팝업 문구를 정확히 입력해주세요!';
          $this->response($result);
        }
  
      } else {
        $reserve_open_hour = 0;
        $reserve_close_hour = 0;
        
        $bank_name = null;
        $bank_account_number = null;
        $bank_depositor = null;
        $reserve_popup = null;
        $payment_page = null;
        
        $reservable = false;
        $reservable_number = 0;
        $waitable = false;
        $waitable_number = 0;
      }
  
      if ($ticketing == false && ($reservable == true || $waitable == true)) {
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
      
      if (mb_strlen($schedule_title) > 32) {
        $result['status'] = 'fail';
        $result['message'] = '수업명은 최대 32자까지 가능합니다!';
        $this->response($result);
      }
      if ($reservable == true) {
        if ($reservable_number < 1 || $reservable_number > 100) {
          $result['status'] = 'fail';
          $result['message'] = '타켓팅 확정 인원은 최소 1명 / 최대 100명 등록 가능합니다!';
          $this->response($result);
        }
      }
      if ($waitable == true) {
        if ($waitable_number < 1 || $waitable_number> 100) {
          $result['status'] = 'fail';
          $result['message'] = '입금 대기 정원은 최소 1명 / 최대 100명 등록 가능합니다!';
          $this->response($result);
        }
      }
      if ($open_immediate == true) {
        if ($reserve_close_hour > 12) {
          $result['status'] = 'fail';
          $result['message'] = '예약 마감 시간은 수업 12시간전까지 가능합니다!';
          $this->response($result);
        }
//        if ($reserve_cancel_close_hour > 12) {
//          $result['status'] = 'fail';
//          $result['message'] = '취소 가능 시간은 수업 12시간전까지 가능합니다!';
//          $this->response($result);
//        }
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
//        if ($reserve_cancel_open_hour > 30 * 24) {
//          $result['status'] = 'fail';
//          $result['message'] = '취소 시작 시간은 수업 30일전까지 가능합니다!';
//          $this->response($result);
//        }
//        if ($reserve_cancel_close_hour > 48) {
//          $result['status'] = 'fail';
//          $result['message'] = '취소 마감 시간은 수업 48시간전까지 가능합니다!';
//          $this->response($result);
//        }
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
        $this->alert_exit('최소 하나의 분류를 선택해주세요');
      }
      
      if (count($categories_yoga) + count($categories_pilates) > 3) {
        $this->alert_exit('클래스 분류는 최대 3개 까지 선택 가능합니다!');
      }
      
//      log_message('debug', '[schedule] category_yoga_count['.count($categories_yoga).']');
//      log_message('debug', '[schedule] category_yoga['.json_encode($categories_yoga, JSON_UNESCAPED_UNICODE).']');
//      log_message('debug', '[schedule] category_pilates_count['.count($categories_pilates).']');
//      log_message('debug', '[schedule] category_pilates['.json_encode($categories_pilates, JSON_UNESCAPED_UNICODE).']');

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
  
      $reserve_cancel_open_hour = 0;
      $reserve_cancel_close_hour = 0;
      
      $data = array(
        'studio_id' => $this->studio_id,
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
        'ticketing' => $ticketing,
        'schedule_title' => $schedule_title,
        'teacher_id' => $this->teacher_id,
        'teacher_name' => $teacher_name,
        'reservable' => $reservable,
        'reservable_number' => $reservable_number,
        'open_immediate' => $open_immediate,
        'reserve_open_hour' => $reserve_open_hour,
        'reserve_close_hour' => $reserve_close_hour,
        'reserve_cancel_open_hour' => $reserve_cancel_open_hour,
        'reserve_cancel_close_hour' => $reserve_cancel_close_hour,
        'waitable' => $waitable,
        'waitable_number' => $waitable_number,
        'use_bank' => $use_bank,
        'bank_name' => $bank_name,
        'bank_account_number' => $bank_account_number,
        'bank_depositor' => $bank_depositor,
        'class_price' => $class_price,
        'reserve_popup' => $reserve_popup,
        'payment_page' => $payment_page,
//        'use_class_price' => $use_class_price,
      );
      $this->db->set('register_at', 'NOW()', false);
      $this->db->set('updated_at', 'NOW()', false);
      $this->db->insert('studio_schedule', $data);
  
      $schedule_id = $this->db->insert_id();
      if ($schedule_id <= 0) {
        $result['status'] = 'fail';
        $result['message'] = 'not inserted!';
        $this->response($result);
      }
  
      if ($use_teacher_image == true) {
        $class_image_url = null;
      } else {
        if (isset($_FILES['class_image']) == false) {
          $class_image_url = null;
        } else {
          $this->crud_model->file_validation($_FILES["class_image"]);
          $file_name = 'schedule_' . $schedule_id . '.jpg';
          $this->crud_model->upload_image($this->studio_model->get_img_path(), $file_name,
            $_FILES["class_image"], 1000, 0, true, true);
      
          $time = time();
          $file_name = 'schedule_' . $schedule_id. '_thumb.jpg';
          $class_image_url = $this->studio_model->get_img_web_path(). $file_name . '?id=' . $time;
          $del_except_files[] = $this->studio_model->get_img_path().$file_name;
        }
      }
      
      $this->db->update('studio_schedule', array('class_image_url' => $class_image_url), array('schedule_id' => $schedule_id));
  
      $data = array(
        'studio_id' => $this->studio_id,
        'activate' => 1,
        'schedule_id' => $schedule_id,
        'start_time' => $start_time,
        'end_time' => $end_time,
        'schedule_title' => $schedule_title,
        'teacher_id' => $this->teacher_id,
        'teacher_name' => $teacher_name,
        'ticketing' => $ticketing,
        'reservable' => $reservable,
        'reservable_number' => $reservable_number,
        'waitable' => $waitable,
        'waitable_number' => $waitable_number,
        'open_immediate' => $open_immediate,
        'reserve_open_hour' => $reserve_open_hour,
        'reserve_close_hour' => $reserve_close_hour,
        'reserve_cancel_open_hour' => $reserve_cancel_open_hour,
        'reserve_cancel_close_hour' => $reserve_cancel_close_hour,
        'use_bank' => $use_bank,
        'bank_name' => $bank_name,
        'bank_account_number' => $bank_account_number,
        'bank_depositor' => $bank_depositor,
        'class_price' => $class_price,
        'reserve_popup' => $reserve_popup,
        'payment_page' => $payment_page,
//        'use_class_price' => $use_class_price,
        'class_image_url' => $class_image_url,
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
          $this->db->insert('studio_schedule_info', $data);
          $schedule_info_id = $this->db->insert_id();
          if ($schedule_info_id <= 0) {
            $result['status'] = 'fail';
            $result['message'] = 'not inserted partly!';
            $this->response($result);
          }
          foreach ($categories_yoga as $cat) {
            $cat = trim($cat);
            $this->db->insert('studio_class_category', array('schedule_info_id' => $schedule_info_id, 'category' => $cat, 'type' => STUDIO_TYPE_YOGA, 'activate' => 1));
          }
  
          foreach ($categories_pilates as $cat) {
            $cat = trim($cat);
            $this->db->insert('studio_class_category', array('schedule_info_id' => $schedule_info_id, 'category' => $cat, 'type' => STUDIO_TYPE_PILATES, 'activate' => 1));
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
            $this->db->insert('studio_schedule_info', $data);
            $schedule_info_id = $this->db->insert_id();
            if ($schedule_info_id <= 0) {
              $result['status'] = 'fail';
              $result['message'] = 'not inserted partly!';
              $this->response($result);
            }
            foreach ($categories_yoga as $cat) {
              $cat = trim($cat);
              $this->db->insert('studio_class_category', array('schedule_info_id' => $schedule_info_id, 'category' => $cat, 'type' => STUDIO_TYPE_YOGA, 'activate' => 1));
            }
  
            foreach ($categories_pilates as $cat) {
              $cat = trim($cat);
              $this->db->insert('studio_class_category', array('schedule_info_id' => $schedule_info_id, 'category' => $cat, 'type' => STUDIO_TYPE_PILATES, 'activate' => 1));
            }
          }
        }
      }
  
      $this->response($result);
    
    } else if ($para1 == 'edit') {
  
      if (isset($_GET['id']) == false) {
        $this->redirect_error('비정상적인 접근입니다!');
      }
  
      $schedule_info_id = $_GET['id'];
  
      $schedule_info = $this->studio_model->get_schedule_info($schedule_info_id);
      if (isset($schedule_info) == false || empty($schedule_info) == true) {
        $this->redirect_error('비정상적인 접근입니다!');
      }
  
      $result = $this->studio_model->get_class_categories($schedule_info_id, STUDIO_TYPE_YOGA);
      $category_yoga_data = $result[0];
      $category_yoga_etc = $result[1];
      $result = $this->studio_model->get_class_categories($schedule_info_id, STUDIO_TYPE_PILATES);
      $category_pilates_data = $result[0];
      $category_pilates_etc = $result[1];
  
      $this->page_data['schedule_info'] = $schedule_info;
      $this->page_data['category_yoga_data'] = $category_yoga_data;
      $this->page_data['category_yoga_etc'] = $category_yoga_etc;
      $this->page_data['category_pilates_data'] = $category_pilates_data;
      $this->page_data['category_pilates_etc'] = $category_pilates_etc;
      $this->page_data['page_name'] = "studio";
      $this->load->view('back/studio/schedule_edit', $this->page_data);
  
    } else if ($para1 =='update') {
  
      $this->load->library('form_validation');
      $this->form_validation->set_rules('id', 'id', 'trim|required|max_length[8]');
      $this->form_validation->set_rules('start_time', 'start_time', 'trim|required|max_length[8]');
      $this->form_validation->set_rules('end_time', 'end_time', 'trim|required|max_length[8]');
      $this->form_validation->set_rules('schedule_title', 'schedule_title', 'trim|required|max_length[32]');
      $this->form_validation->set_rules('ticketing', 'ticketing', 'trim|required|is_natural|less_than_equal_to[1]');
      $this->form_validation->set_rules('reservable', 'reservable', 'trim|required|is_natural|less_than_equal_to[1]');
      $this->form_validation->set_rules('reservable_number', 'reservable_number', 'trim|is_natural|max_length[5]');
      $this->form_validation->set_rules('open_immediate', 'open_immediate', 'trim|is_natural|less_than_equal_to[1]');
      $this->form_validation->set_rules('reserve_open_hour', 'reserve_open_hour', 'trim|is_natural|max_length[5]');
      $this->form_validation->set_rules('reserve_close_hour', 'reserve_close_hour', 'trim|is_natural|max_length[5]');
      $this->form_validation->set_rules('reserve_cancel_open_hour', 'reserve_cancel_open_hour', 'trim|is_natural|max_length[5]');
      $this->form_validation->set_rules('reserve_cancel_close_hour', 'reserve_cancel_close_hour', 'trim|is_natural|max_length[5]');
      $this->form_validation->set_rules('waitable', 'waitable', 'trim|is_natural|less_than_equal_to[1]');
      $this->form_validation->set_rules('waitable_number', 'waitable_number', 'trim|is_natural|max_length[5]');
  
      $this->form_validation->set_rules('use_bank', 'use_bank', 'trim|is_natural|less_than_equal_to[1]');
      $this->form_validation->set_rules('bank_name', 'bank_name', 'trim|max_length[16]');
      $this->form_validation->set_rules('bank_account_number', 'bank_account_number', 'trim|max_length[32]');
      $this->form_validation->set_rules('bank_depositor', 'bank_depositor', 'trim|max_length[32]');
      $this->form_validation->set_rules('reserve_popup', 'reserve_popup', 'trim|max_length[100]');
      $this->form_validation->set_rules('payment_page', 'payment_page', 'trim|valid_url|max_length[256]');
//      $this->form_validation->set_rules('use_class_price', 'use_class_price', 'trim|is_natural|less_than_equal_to[1]');
      $this->form_validation->set_rules('class_price', 'class_price', 'trim|is_natural|less_than_equal_to[9999999]');
      $this->form_validation->set_rules('use_teacher_image', 'use_teacher_image', 'trim|required|is_natural|less_than_equal_to[1]');
  
      if ($this->form_validation->run() == FALSE) {
        echo '<br>' . validation_errors();
        exit;
      }
  
      $schedule_info_id = $this->input->post('id');
      $start_time = date('H:i:s', strtotime($this->input->post('start_time')));
      $end_time = date('H:i:s', strtotime($this->input->post('end_time')));
      $schedule_title = $this->input->post('schedule_title');
      $teacher_name = $this->input->post('teacher_name');
      $ticketing = $this->input->post('ticketing');
      $reservable = $this->input->post('reservable');
      $reservable_number = $this->input->post('reservable_number');
      $open_immediate = $this->input->post('open_immediate');
      $reserve_open_hour = $this->input->post('reserve_open_hour');
      $reserve_close_hour = $this->input->post('reserve_close_hour');
//      $reserve_cancel_open_hour = $this->input->post('reserve_cancel_open_hour');
//      $reserve_cancel_close_hour = $this->input->post('reserve_cancel_close_hour');
      $waitable = $this->input->post('waitable');
      $waitable_number = $this->input->post('waitable_number');
  
      $use_bank = $this->input->post('use_bank');
      $bank_name = $this->input->post('bank_name');
      $bank_account_number = $this->input->post('bank_account_number');
      $bank_depositor = $this->input->post('bank_depositor');
      $reserve_popup = $this->input->post('reserve_popup');
      $payment_page = $this->input->post('payment_page');
//      $use_class_price = $this->input->post('use_class_price');
      $class_price = $this->input->post('class_price');
      $use_teacher_image = $this->input->post('use_teacher_image');
  
      $categories_yoga = json_decode($this->input->post('category_yoga'));
      $categories_pilates = json_decode($this->input->post('category_pilates'));
      $category_yoga_etc = $this->input->post('category_yoga_etc');
      $category_pilates_etc = $this->input->post('category_pilates_etc');

//      log_message('debug', '[schedule] start_time['.$start_time.'] end_time['.$end_time.']');
//      log_message('debug', '[schedule] date['.json_encode($_POST, JSON_UNESCAPED_UNICODE).']');
  
      $result['status'] = 'done';
      $result['message'] = '성공하였습니다!';
  
      if (strtotime($start_time) > strtotime($end_time) - 10 * ONE_MINUTE) {
        $result['status'] = 'fail';
        $result['message'] = '스케줄 시간을 정확히 입력해주세요!';
        $this->response($result);
      }
  
      if (empty($teacher_name) || strlen($teacher_name) == 0) {
        $result['status'] = 'fail';
        $result['message'] = '강사이름을 입력해 주세요!';
        $this->response($result);
      }
  
      if ($ticketing) {
  
        if (isset($class_price) == false || empty($class_price)) {
          $result['status'] = 'fail';
          $result['message'] = '수업료를 정확히 입력해주세요!';
          $this->response($result);
        }
  
        if ($open_immediate == false) {
          if ($reserve_open_hour < $reserve_close_hour) {
            $result['status'] = 'fail';
            $result['message'] = '예약 가능 시간을 정확히 입력해주세요!';
            $this->response($result);
          }
//          if ($reserve_cancel_open_hour < $reserve_cancel_close_hour) {
//            $result['status'] = 'fail';
//            $result['message'] = '취소 가능 시간을 정확히 입력해주세요!';
//            $this->response($result);
//          }
        } else {
          $reserve_open_hour = 0;
        }
    
        if ($use_bank == true) {
          if (isset($bank_name) == false || empty($bank_name)) {
            $result['status'] = 'fail';
            $result['message'] = '은행명을 정확히 입력해주세요!';
            $this->response($result);
          }
          if (isset($bank_account_number) == false || empty($bank_account_number)) {
            $result['status'] = 'fail';
            $result['message'] = '계좌번호를 정확히 입력해주세요!';
            $this->response($result);
          }
          if (isset($bank_depositor) == false || empty($bank_depositor)) {
            $result['status'] = 'fail';
            $result['message'] = '계좌번호를 정확히 입력해주세요!';
            $this->response($result);
          }
          $payment_page = null;
        } else {
          if (isset($payment_page) == false || empty($payment_page)) {
            $result['status'] = 'fail';
            $result['message'] = '결제페이지 주소를 정확히 입력해주세요!';
            $this->response($result);
          }
          $bank_name = null;
          $bank_account_number = null;
          $bank_depositor = null;
        }
    
        if (isset($reserve_popup) == false || empty($reserve_popup)) {
          $result['status'] = 'fail';
          $result['message'] = '팝업 문구를 정확히 입력해주세요!';
          $this->response($result);
        }
    
      } else {
        $reserve_open_hour = 0;
        $reserve_close_hour = 0;
    
        $bank_name = null;
        $bank_account_number = null;
        $bank_depositor = null;
        $reserve_popup = null;
        $payment_page = null;
    
        $reservable = false;
        $reservable_number = 0;
        $waitable = false;
        $waitable_number = 0;
      }
  
      if ($ticketing == false && ($reservable == true || $waitable == true)) {
        $result['status'] = 'fail';
        $result['message'] = '예약대기는 예약기능을 필요로 합니다!';
        $this->response($result);
      }
  
      // limit check
      if (mb_strlen($schedule_title) > 32) {
        $result['status'] = 'fail';
        $result['message'] = '수업명은 최대 32자까지 가능합니다!';
        $this->response($result);
      }
      if ($reservable == true) {
        if ($reservable_number < 1 || $reservable_number > 100) {
          $result['status'] = 'fail';
          $result['message'] = '타켓팅 확정 인원은 최소 1명 / 최대 100명 등록 가능합니다!';
          $this->response($result);
        }
      }
      if ($waitable == true) {
        if ($waitable_number < 1 || $waitable_number> 100) {
          $result['status'] = 'fail';
          $result['message'] = '입금 대기 정원은 최소 1명 / 최대 100명 등록 가능합니다!';
          $this->response($result);
        }
      }
      if ($open_immediate == true) {
        if ($reserve_close_hour > 12) {
          $result['status'] = 'fail';
          $result['message'] = '예약 마감 시간은 수업 12시간전까지 가능합니다!';
          $this->response($result);
        }
//        if ($reserve_cancel_close_hour > 12) {
//          $result['status'] = 'fail';
//          $result['message'] = '취소 가능 시간은 수업 12시간전까지 가능합니다!';
//          $this->response($result);
//        }
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
//        if ($reserve_cancel_open_hour > 30 * 24) {
//          $result['status'] = 'fail';
//          $result['message'] = '취소 시작 시간은 수업 30일전까지 가능합니다!';
//          $this->response($result);
//        }
//        if ($reserve_cancel_close_hour > 48) {
//          $result['status'] = 'fail';
//          $result['message'] = '취소 마감 시간은 수업 48시간전까지 가능합니다!';
//          $this->response($result);
//        }
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
        $this->alert_exit('최소 하나의 분류를 선택해주세요');
      }
  
      if (count($categories_yoga) + count($categories_pilates) > 3) {
        $this->alert_exit('클래스 분류는 최대 3개 까지 선택 가능합니다!');
      }

//      log_message('debug', '[schedule] category_yoga['.json_encode($categories_yoga, JSON_UNESCAPED_UNICODE).']');
//      log_message('debug', '[schedule] category_pilates['.json_encode($categories_pilates, JSON_UNESCAPED_UNICODE).']');
  
      $lock = $this->studio_model->lock_schedule_info($schedule_info_id);
      if (empty($lock) == true || $lock == false) {
        $result['status'] = 'fail';
        $result['message'] = '클래스 예약 요청이 많습니다! 잠시 후 다시 시도해주세요!';
        $this->response($result);
      }
  
      $schedule_info = $this->studio_model->get_schedule_info($schedule_info_id);
      if (isset($schedule_info) == false || empty($schedule_info) == true) {
        $this->studio_model->unlock_schedule_info($schedule_info_id);
        $result['status'] = 'fail';
        $result['message'] = '비정상적인 접근입니다!';
        $this->response($result);
      }
  
      if ($ticketing != $schedule_info->ticketing) {
        $this->studio_model->unlock_schedule_info($schedule_info_id);
        $result['status'] = 'fail';
        $result['message'] = '티켓팅 기능은 변경이 불가능합니다!';
        $this->response($result);
      }
  
      if ($reservable == false) {
        $reservable_number = 0;
      }
      if ($waitable == false) {
        $waitable_number = 0;
      }
      $reserve_cancel_open_hour = 0;
      $reserve_cancel_close_hour = 0;
  
      if ($use_teacher_image == true) {
        $class_image_url = null;
      } else {
        if (isset($_FILES['class_image']) == false) {
          $class_image_url = $schedule_info->class_image_url;
        } else {
          $this->crud_model->file_validation($_FILES["class_image"]);
          $file_name = 'schedule_info_' . $schedule_info_id . '.jpg';
          $this->crud_model->upload_image($this->studio_model->get_img_path(), $file_name,
            $_FILES["class_image"], 1000, 0, true, true);
      
          $time = time();
          $file_name = 'schedule_info_' . $schedule_info_id. '_thumb.jpg';
          $class_image_url = $this->studio_model->get_img_web_path(). $file_name . '?id=' . $time;
          $del_except_files[] = $this->studio_model->get_img_path().$file_name;
        }
      }
      
//      log_message('debug', '[studio] use['.$use_teacher_image.'] $_FILES['.isset($_FILES['class_image']).'] url['.$class_image_url.']');
  
      $data = array(
        'studio_id' => $this->studio_id,
        'start_time' => $start_time,
        'end_time' => $end_time,
        'schedule_title' => $schedule_title,
        'teacher_id' => $this->teacher_id,
        'teacher_name' => $teacher_name,
        'ticketing' => $ticketing,
        'reservable' => $reservable,
        'reservable_number' => $reservable_number,
        'waitable' => $waitable,
        'waitable_number' => $waitable_number,
        'open_immediate' => $open_immediate,
        'reserve_open_hour' => $reserve_open_hour,
        'reserve_close_hour' => $reserve_close_hour,
        'reserve_cancel_open_hour' => $reserve_cancel_open_hour,
        'reserve_cancel_close_hour' => $reserve_cancel_close_hour,
        'use_bank' => $use_bank,
        'bank_name' => $bank_name,
        'bank_account_number' => $bank_account_number,
        'bank_depositor' => $bank_depositor,
        'class_price' => $class_price,
        'reserve_popup' => $reserve_popup,
        'payment_page' => $payment_page,
//        'use_class_price' => $use_class_price,
        'class_image_url' => $class_image_url,
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
      $this->db->update('studio_schedule_info', $data, array('schedule_info_id' => $schedule_info_id));
  
      if ($this->db->affected_rows() <= 0) {
        $this->studio_model->unlock_schedule_info($schedule_info_id);
        $result['status'] = 'fail';
        $result['message'] = '클래스 수정이 불가능한 상태입니다! 잠시 후 다시 시도해주세요!';
        $this->response($result);
      }
  
      $this->db->delete('studio_class_category', array('schedule_info_id' => $schedule_info_id));
      foreach ($categories_yoga as $cat) {
        $cat = trim($cat);
        $this->db->insert('studio_class_category', array('schedule_info_id' => $schedule_info_id, 'category' => $cat, 'type' => STUDIO_TYPE_YOGA, 'activate' => 1));
      }
      foreach ($categories_pilates as $cat) {
        $cat = trim($cat);
        $this->db->insert('studio_class_category', array('schedule_info_id' => $schedule_info_id, 'category' => $cat, 'type' => STUDIO_TYPE_PILATES, 'activate' => 1));
      }
  
      $this->response($result);
  
    } else if ($para1 == 'status') {
  
      if ($para2 == 'update') {
    
        if (isset($_POST['rid']) == false || isset($_POST['status']) == false) {
          $this->response(array('status' => 'fail', 'message' => '비정상적인 접근입니다!'));
        }
    
        $reserve_id = $this->input->post('rid');
        $status = $this->input->post('status');
    
        $reserve = $this->studio_model->get_reserve_info($reserve_id);
        $schedule_info = $this->studio_model->get_schedule_info($reserve->schedule_info_id);
        if ($schedule_info->ticketing == 0) {
          $this->response(array('status' => 'fail', 'message' => '예약이 오픈되지 않았습니다!'));
        }
    
        $this->studio_model->lock_schedule_info($schedule_info->schedule_info_id);
    
        if ($status == $this->studio_model::TICKETING_STATUS_RESERVE) {
          if ($reserve->reserve == 1) {
            $this->studio_model->unlock_schedule_info($schedule_info->schedule_info_id);
            $this->response(array('status' => 'fail', 'message' => '이미 티켓팅 확정 되었습니다!'));
          }
          if ($schedule_info->reservable) {
            $reserve_cnt = $this->studio_model->get_schedule_reserve_cnt($schedule_info->schedule_info_id);
            if ($reserve_cnt >= $schedule_info->reservable_number) {
              $this->studio_model->unlock_schedule_info($schedule_info->schedule_info_id);
              $this->response(array('status' => 'fail', 'message' => '티켓팅 확정 정원을 초과합니다!'));
            }
          }
        } else if ($status == $this->studio_model::TICKETING_STATUS_WAIT) {
          if ($reserve->wait == 1) {
            $this->studio_model->unlock_schedule_info($schedule_info->schedule_info_id);
            $this->response(array('status' => 'fail', 'message' => '이미 입금 대기 상태 되었습니다!'));
          }
          if ($schedule_info->waitable) {
            if ($reserve->reserve != 1) {
              $reserve_cnt = $this->studio_model->get_schedule_reserve_cnt($schedule_info->schedule_info_id);
              $wait_cnt = $this->studio_model->get_schedule_wait_cnt($schedule_info->schedule_info_id);
              if (($reserve_cnt + $wait_cnt) >= ($schedule_info->reservable_number + $schedule_info->waitable_number)) {
                $this->studio_model->unlock_schedule_info($schedule_info->schedule_info_id);
                $this->response(array('status' => 'fail', 'message' => '입금 대기 정원을 초과합니다!'));
              }
            }
          }
        } else if ($status == $this->studio_model::TICKETING_STATUS_CANCEL) {
          if ($reserve->cancel == 1) {
            $this->studio_model->unlock_schedule_info($schedule_info->schedule_info_id);
            $this->response(array('status' => 'fail', 'message' => '이미 티켓팅 취소 되었습니다!'));
          }
        } else {
          $this->studio_model->unlock_schedule_info($schedule_info->schedule_info_id);
          $this->response(array('status' => 'fail', 'message' => '올바르지 않은 상태입니다!'));
        }
        
        $res = $this->studio_model->update_schedule_status($reserve_id, $status);
        if ($res) {
          $this->studio_model->unlock_schedule_info($schedule_info->schedule_info_id);
  
          $user_data = $this->db->get_where('user', array('user_id' => $reserve->user_id))->row();
          $studio_info = $this->studio_model->get($schedule_info->studio_id);
          $studio_user_data = $this->db->get_where('user', array('user_id' => $studio_info->user_id))->row();
          
//          log_message('debug', '[studio] user_data['.json_encode($user_data).']');
//          log_message('debug', '[studio] studio_info['.json_encode($studio_info).']');
//          log_message('debug', '[studio] studio_user_data['.json_encode($studio_user_data).']');
//          log_message('debug', '[studio] schedule_info['.json_encode($schedule_info).']');
  
          if ($status == $this->studio_model::TICKETING_STATUS_RESERVE) {
            $this->email_model->send_online_class_reserve($user_data->email, $schedule_info->teacher_name, $schedule_info->schedule_title,
              $schedule_info->schedule_date, $schedule_info->start_time);
            $this->mts_model->send_studio_class_reserve($user_data, $studio_user_data, $studio_info, $schedule_info);
          } else if ($status == $this->studio_model::TICKETING_STATUS_WAIT) {
//            $this->mts_model->send_studio_class_wait($user_data, $studio_user_data, $studio_info, $schedule_info);
          } else {
            $this->email_model->send_online_class_cancel($user_data->email, $schedule_info->teacher_name, $schedule_info->schedule_title,
              $schedule_info->schedule_date, $schedule_info->start_time);
            $this->mts_model->send_studio_class_cancel($user_data->phone, $schedule_info->teacher_name, $schedule_info->schedule_title,
              $schedule_info->schedule_date, $schedule_info->start_time);
          }
  
          $this->response(array('status' => 'done', 'message' => '성공하였습니다!'));
        } else {
          $this->studio_model->unlock_schedule_info($schedule_info->schedule_info_id);
          $this->response(array('status' => 'fail', 'message' => '실패하였습니다!'));
        }
      
      } else {
  
        if (isset($_GET['id']) == false) {
          $this->redirect_error('비정상적인 접근입니다!');
        }
  
        $schedule_info_id = $_GET['id'];
        $schedule_info = $this->studio_model->get_schedule_info($schedule_info_id);
        if (isset($schedule_info) == false || empty($schedule_info) == true) {
          $this->redirect_error('비정상적인 접근입니다!');
        }
  
        if ($schedule_info->ticketing == false) {
          $this->redirect_error('비정상적인 접근입니다!');
        }
  
        $reserve_list = $this->studio_model->get_schedule_reserve_list($schedule_info_id, 'register_at', 'asc');
        foreach ($reserve_list as $reserve) {
          $reserve->user = $this->db->get_where('user', array('user_id' => $reserve->user_id))->row();
        }
  
        $wait_list = $this->studio_model->get_schedule_wait_list($schedule_info_id, 'register_at', 'asc');
        foreach ($wait_list as $wait) {
          $wait->user = $this->db->get_where('user', array('user_id' => $wait->user_id))->row();
        }
  
        $cancel_list = $this->studio_model->get_schedule_cancel_list($schedule_info_id, 'register_at', 'asc');
        foreach ($cancel_list as $cancel) {
          $cancel->user = $this->db->get_where('user', array('user_id' => $cancel->user_id))->row();
        }
  
        $this->page_data['reserve_list'] = $reserve_list;
        $this->page_data['wait_list'] = $wait_list;
        $this->page_data['cancel_list'] = $cancel_list;
        $this->page_data['schedule_info'] = $schedule_info;
        $this->page_data['page_name'] = "studio";
        $this->load->view('back/studio/schedule_status', $this->page_data);
      
      }
    
    } else {
  
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
  
      $this->page_data['year'] = $year;
      $this->page_data['month'] = $month;
      $this->page_data['day'] = $day;
      $this->page_data['date'] = $date;
      $this->page_data['tab'] = $tab;
      $this->page_data['page_name'] = "schedule";
      $this->load->view('back/studio/index', $this->page_data);
    }
    
  }
}