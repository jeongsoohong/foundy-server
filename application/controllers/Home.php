<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Home extends CI_Controller
{
  private $page_data = null;
  
  function __construct()
  {
    parent::__construct();

//    if ($this->uri->segment(2) != 'server' && $this->uri->segment(3) != 'check') {
//      redirect(base_url().'home/server/check');
//    }
    
//   $this->mts_model->send_user_approval_code('01045644126', '123456');
    
    $this->load->database();

    defined('IMG_PATH_PROFILE')  OR define('IMG_PATH_PROFILE', '/web/public_html/uploads/profile_image/');
    defined('IMG_PATH_BLOG')     OR define('IMG_PATH_BLOG', '/web/public_html/uploads/blog_image/');
    defined('IMG_PATH_CENTER')   OR define('IMG_PATH_CENTER', '/web/public_html/uploads/center_image/');
    defined('IMG_PATH_SHOP')   OR define('IMG_PATH_SHOP', '/web/public_html/uploads/shop_image/');

    defined('IMG_WEB_PATH_PROFILE')  OR define('IMG_WEB_PATH_PROFILE', base_url().'uploads/profile_image/');
    defined('IMG_WEB_PATH_BLOG')     OR define('IMG_WEB_PATH_BLOG', base_url().'uploads/blog_image/');
    defined('IMG_WEB_PATH_CENTER')   OR define('IMG_WEB_PATH_CENTER', base_url().'uploads/center_image/');
    defined('IMG_WEB_PATH_SHOP')   OR define('IMG_WEB_PATH_SHOP', base_url().'uploads/shop_image/');
 
    $this->page_data['url'] = build_url($this->uri, $_GET);
    
    $user_data = new stdClass();
    if ($this->is_login() == true) {
      $user_id = $this->session->userdata('user_id');
      $user_data = $this->db->get_where('user', array('user_id' => $user_id))->row();
  
      if (isset($user_data) == false || empty($user_data) == true) { // 이상함
        $this->session->sess_destroy();
      } else if ($user_data->unregister == 1 && $this->session->userdata('user_restore') != 'yes') { // 복귀유저
     
        $this->session->sess_destroy();
        $this->crud_model->alert_exit("(탈퇴회원) 탈퇴 후 7일간 로그인이 불가능합니다.", base_url() . 'home');
      
      } else if ($user_data->mobile_approval == 0 && !$this->input->is_ajax_request()) { // 핸드폰 본인인증 안받은 유저
  
//        log_message('debug', '[mobile_approval] mobile_approval['.$this->session->userdata('mobile_approval').']');
        
        if ($this->session->userdata('mobile_approval') == 'deny' ||
          $this->session->userdata('mobile_approval') == 'no') {

          $deny = $this->cookie_model->get_cookie('mobile_approval_deny');
//          log_message('debug', '[mobile_approval] deny[' . $deny . ']');
     
          if ($deny == 'yes') {
            $deny_time = $this->cookie_model->get_cookie('mobile_approval_deny_time');
//            log_message('debug', '[mobile_approval] deny_time[' . $deny_time . '] now[' . strtotime('-1day') . ']');
            if ($deny_time > strtotime('-1 day')) {
              $this->session->set_userdata('mobile_approval', 'deny');
            } else {
              $this->session->set_userdata('mobile_approval', 'no');
            }
          }

        } else {
          $this->session->set_userdata('mobile_approval', 'no');
        }
  
      } else { // 정상
        $this->session->set_userdata('user_data', json_encode($user_data));
      }
    } else {
      $user_data->user_id = NULL;
      $user_data->kakao_id = NULL;
    }
    
    if (!$this->input->is_ajax_request()) {
      $this->output->set_header('HTTP/1.0 200 OK');
      $this->output->set_header('HTTP/1.1 200 OK');
      $this->output->set_header('Last-Modified: ' . gmdate('D, d M Y H:i:s', time()) . ' GMT');
      $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
      $this->output->set_header('Cache-Control: post-check=0, pre-check=0');
      $this->output->set_header('Pragma: no-cache');
     
      if ($this->app_model->is_app()) {
        $data = $this->app_model->get_app_data();
  
        $this->session->set_userdata('is_app', 'yes');
        $this->session->set_userdata('app_data', json_encode($data));

        if ($this->is_login()) {
          
          $where = array(
            'user_id' => $user_data->user_id,
            'device' => $this->app_model->get_device(),
          );
          $app_data = $this->db->get_where('user_app', $where)->row();
  
          $data['user_id'] = $user_data->user_id;
          $data['push_setting'] = ($data['push_setting'] == 'ON');
          $data['gps_setting'] = ($data['gps_setting'] == 'ON');
          $this->db->set('last_updated_at', 'NOW()', false);
          
          if (isset($app_data) == false || empty($app_data) == true) {
            $this->db->set('create_at', 'NOW()', false);
            $this->db->insert('user_app', $data);
          } else {
            $this->db->update('user_app', $data, $where);
          }
        }
  
        $this->app_model->set_app_data();
      } else {
        $this->session->set_userdata('is_app', 'no');
      }
  
      if ($this->router->fetch_method() == 'index' ||
        $this->router->fetch_method() == 'find' ||
        $this->router->fetch_method() == 'blog' ||
        $this->router->fetch_method() == 'blog_view' ||
        $this->router->fetch_method() == 'center' ||
        $this->router->fetch_method() == 'teacher' ||
        $this->router->fetch_method() == 'user' ||
        $this->router->fetch_method() == 'shop') {
  
        // caching
//        $this->output->cache(60);
       
        // active user
        if ($this->router->fetch_method() != 'index') {
          $ins = array(
            'user_id' => $user_data->user_id,
            'kakao_id' => $user_data->kakao_id,
            'session_id' => $this->crud_model->get_session_id(),
            'ip' => $this->crud_model->get_session_ip(),
            'is_browser' => $this->agent->is_browser(),
            'is_mobile' => $this->agent->is_mobile(),
            'is_robot' => $this->agent->is_robot(),
            'is_referral' => $this->agent->is_referral(),
            'browser' => $this->agent->browser(),
            'version' => $this->agent->version(),
            'mobile' => $this->agent->mobile(),
            'robot' => $this->agent->robot(),
            'platform' => $this->agent->platform(),
            'referrer' => $this->agent->referrer(),
            'agent' => $this->agent->agent_string(),
            'uri_1' => $this->uri->segment(2),
            'uri_2' => $this->uri->segment(3),
            'uri_3' => $this->uri->segment(4),
          );
          $this->db->set('active_at', 'NOW()', false);
          $this->db->insert('user_active', $ins);
        }
      }
    }

//$this->crud_model->alert_exit($this->crud_model->get_fcm_token());
//    if (ENVIRONMENT == 'production') {
//      echo 'production';
//    } else {
//      echo 'development';
//    }
//
//    if (DEV_SERVER == true) {
//      echo 'dev';
//    } else {
//      echo 'live';
//    }
//
//    $this->session->sess_destroy();
//    $this->config->cache_query();
  }
  
  public function index()
  {
    $bookmark_centers = array();
    $bookmark_teachers = array();
    $upcoming_class = array();
    if ($this->is_login()) {
      $user_id = $this->session->userdata('user_id');

      $bookmark_centers = $this->db->get_where('bookmark_center', array('user_id' => $user_id))->result();
      if (!empty($bookmark_centers) and count($bookmark_centers) > 0) {
        $center_ids = array();
        foreach ($bookmark_centers as $b) {
          $center_ids[] = $b->center_id;
        }
        $this->db->where('activate', 1);
        $this->db->where_in('center_id', $center_ids);
        $bookmark_centers = $this->db->get('center')->result();
      }

      $bookmark_teachers = $this->db->get_where('bookmark_teacher', array('user_id' => $user_id))->result();
      if (!empty($bookmark_teachers) and count($bookmark_teachers) > 0) {
        $teacher_ids = array();
        foreach ($bookmark_teachers as $t) {
          $teacher_ids[] = $t->teacher_id;
        }
        $this->db->where('activate', 1);
        $this->db->where_in('teacher_id', $teacher_ids);
        $bookmark_teachers = $this->db->get('teacher')->result();
      }

      $now = time();
      $start_date = date('Y-m-d H:i:s', $now);
      $end_date = date('Y-m-d H:i:s', $now + ONE_WEEK);
      $query = <<<QUERY
select * from center_schedule_reserve
where user_id={$user_id} and (reserve=1 or wait=1)
and '{$start_date}'<= schedule_at and  schedule_at<='{$end_date}' order by schedule_at asc
QUERY;
      $upcoming_class = $this->db->query($query)->result();
      foreach ($upcoming_class as $class) {
        $class->schedule_info = $this->db->get_where('center_schedule_info', array('schedule_info_id' => $class->schedule_info_id))->row();
        $class->center_info = $this->db->get_where('center', array('center_id' => $class->schedule_info->center_id))->row();
        $class->wait_number = 0;
        if ($class->wait == 1) {
          $query = <<<QUERY
select count(*) as cnt from center_schedule_reserve
where schedule_info_id={$class->schedule_info_id} and wait=1 and reserve_id<={$class->reserve_id}
QUERY;
          $class->wait_number = $this->db->query($query)->row()->cnt;
        }
      }

    }

    $this->db->order_by('date', 'asc');
    $sliders = $this->db->get_where('main_slider', array('activate' => 1, 'type' => MAIN_SLIDER_TYPE_HOME))->result();

//    $blog_category = $this->db->get_where('category_blog', array('name' => 'shop'))->row();
    $this->db->order_by('blog_id', 'desc');
    $blogs = $this->db->get_where('blog', array('main_view' => 1, 'activate' => 1))->result();

    $this->page_data['sliders'] = $sliders;
    $this->page_data['bookmark_centers'] = $bookmark_centers;
    $this->page_data['bookmark_teachers'] = $bookmark_teachers;
    $this->page_data['upcoming_class'] = $upcoming_class;
    $this->page_data['blogs'] = $blogs;
    $this->page_data['page_name'] = "home";
    $this->page_data['asset_page'] = "home";
    $this->page_data['page_title'] = "home";
    $this->load->view('front/index', $this->page_data);
  }

  private function is_login()
  {
    if ($this->session->userdata('user_login') == "yes") {
      return true;
    }
    return false;
  }
  
  private function get_login_url($url = '') {
    if ($url == '') {
      return base_url().'home/login?l='.build_url($this->uri, $_GET);
    }
    return base_url().'home/login?l='.$url;
  }
  
  private function redirect_login() {
    redirect($this->get_login_url(), 'refresh');
  }

  public function login($para1 = '', $para2 = '', $para3 = '')
  {
    if ($this->is_login() == true && $this->session->userdata('user_restore') != 'yes') {
      redirect('home', 'refresh');
    }

    $login_type = $para1;
  
    if ($login_type == 'forget_form') {
    
      $this->load->view('front/user/forget_password');
    
    } else if ($login_type == 'send_approval') {
  
      $this->load->library('form_validation');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
      if ($this->form_validation->run() == FALSE) {
        echo validation_errors();
      } else {
    
        $email = $this->input->post('email');
        $user_data = $this->db->get_where('user', array('email' => $email))->row();
        if (isset($user_data) && empty($user_data) == false) {
      
          $code = rand(111111, 999999);
      
          if ($this->email_model->get_user_approval_data($code, $email)) {
        
            $this->session->set_userdata('user_approval_email', $email);
            $this->session->set_userdata('user_approval_code', $code);
            echo 'done';
          } else {
            echo '이메일 전송에 문제가 발생했습니다.';
          }
        } else {
          echo '존재하지 않는 이메일입니다.';
        }
      }
    
    } else if ($login_type == 'approval') {
      
      if ($para2 == 'email') {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == FALSE) {
          echo validation_errors();
        } else {
    
          $email = $this->input->post('email');
          $code = $this->input->post('approval_code');
    
          $approval_email = $this->session->userdata('user_approval_email');
          $approval_code = $this->session->userdata('user_approval_code');
   
          $result['status'] = 'done';
          $result['message'] = '이메일에서 비밀번호 확인 후 로그인해주세요!';
          if ($email != $approval_email) {
            $this->crud_model->alert_exit('이메일이 올바르지 않습니다. 다시 확인 바랍니다.');
          }
          if ($code != $approval_code) {
            $this->crud_model->alert_exit('인증코드가 올바르지 않습니다. 다시 확인 바랍니다.');
          }
    
          $user_data = $this->db->get_where('user', array('email' => $email))->row();
          if(isset($user_data) && empty($user_data) == false) {
      
            $password = substr(hash('sha512', rand()), 0, 12);
            $data['password'] = sha1($password);
            $this->db->where('email', $email);
            $this->db->update('user', $data);
      
            if ($this->email_model->get_reset_pw_data($email, $password)) {
              $this->response($result);
            } else {
              $result['status'] = 'fail';
              $result['message'] = '이메일 전송에 실패하였습니다.';
              $this->response($result);
            }
          } else {
            $result['status'] = 'fail';
            $result['message'] = '유효하지 않은 이메일입니다.';
            $this->response($result);
          }
        }
      } else if ($para2 == 'mobile') {
        
        if (isset($_GET['sid']) == false || isset($_GET['aid']) == false || isset($_GET['fid']) == false) {
          $this->redirect_error('접근 오류가 발생하였습니다!');
        }
        
        $session_id = $_GET['sid'];
        $auth_id = $_GET['aid'];
        $for = $_GET['fid'];
  
        $auth= $this->db->get_where('user_auth', array('auth_id' => $auth_id))->row();
        if (isset($auth) == false || empty($auth) == true) {
          $this->redirect_error('접근 오류가 발생하였습니다!(1)');
        }
        if ($auth->session_id != $session_id || $auth->session_id != $this->crud_model->get_session_id()) {
          $this->redirect_error('접근 오류가 발생하였습니다!(2)');
        }
        if ($auth->for != $for || $for != 'forget_passwd') {
          $this->redirect_error('접근 오류가 발생하였습니다!(3)');
        }
  
        $auth_data = json_decode($auth->auth_data);
        $user_data = $this->db->get_where('user', array('phone' => $auth_data->mobileno))->row();
        if(isset($user_data) && empty($user_data) == false) {
    
          $password = substr(hash('sha512', rand()), 0, 12);
          $data['password'] = sha1($password);
          $this->db->where('phone', $user_data->phone);
          $this->db->update('user', $data);
    
          if ($this->mts_model->send_user_passwd($user_data->phone, $user_data->email, $password) > 0) {
            $this->redirect_info('비밀번호가 전송되었습니다!<br> 문자메세지 확인 후 로그인해주세요!');
          } else {
            $this->redirect_error('문자전송에 실패하였습니다!');
          }
        } else {
          $this->redirect_error('회원 전화번호가 아닙니다!');
        }
  
      } else {
        $this->redirect_error();
      }
  
    } else if ($login_type == 'restore') {
  
      $restore = ($_GET['r'] == 'ok');
  
      $user_id = $this->session->userdata('user_id');
      $user_data = json_decode($this->session->userdata('user_data'));
  
      if ($restore) {
    
        if ($user_data->teacher_id > 0) {
          $teacher_id = $user_data->teacher_id;
          $this->crud_model->do_teacher_activate($teacher_id, $user_id, 1);
        }
    
      } else {
    
        if ($user_data->teacher_id > 0) {
          $this->crud_model->delete_teacher_data($user_data);
        }
    
      }
  
      $this->session->set_userdata('user_restore', "no");
  
      echo 'done';
  
    } else if ($login_type == 'apple') {
      
      // 애플에서 유저가 "이메일 변경, 앱 서비스 해지, 애플 계정 탈퇴"를 했을 경우, 유저 정보와 이벤트에 대한 PAYLOAD 데이터를 전송
      if ($para2 == 'notify') {
  
        log_message('debug', '[apple_login] notify : '.json_encode($_POST));
      
      } else { // rest api login
       
        // get apple authenrization code / id_token ...
        $result = array();
        if (!isset($_POST) || !isset($_POST['id_token'])) {
          $result['status'] = 'error';
          $result['message'] = "오류가 발생했습니다. 다시 로그인해주세요(error : invalid post).".json_encode($_POST);
          echo json_encode($result);
          exit;
        }
  
        log_message('debug', '[apple_login] post : '.json_encode($_POST));
  
        $code = $_POST['code'];
        $id_token = $_POST['id_token'];
        $state = $_POST['state'];
        $email = '';
        $apple_user_name = '';
        $register = false;
        if (isset($_POST['user'])) {
          $user = $_POST['user'];
          $register = true;
          $email = $user->email;
          $apple_user_name = $user->firstName;
          if (isset($user->middleName) && empty($user->middleName) == false) {
            $apple_user_name .= ' '.$user->middleName;
          }
          $apple_user_name .= ' '.$user->lastName;
          $user_data = $this->db->get_where('user', array('email' => $email))->row();
          if (empty($user_data) == false) {
            $result['status'] = 'error';
            $result['message'] = "이미 가입된 이메일입니다. 다시 로그인해주세요(error : invalid email).";
            echo json_encode($result);
            exit;
          }
        }
        
        if ($state != 'apple_login') {
          $result['status'] = 'error';
          $result['message'] = "오류가 발생했습니다. 다시 로그인해주세요(error : invalid state).";
          echo json_encode($result);
          exit;
        }
        
        // parse JWT(decode id_token)
        list($header, $payload, $signature) = explode(".", $id_token);
       
        $header = base64_decode($header);
        $payload = base64_decode($payload);
  
        log_message('debug', '[apple_login] header : '.$header.', payload : '.$payload.', signature : '.$signature);
 
        $header = json_decode($header);
        $payload = json_decode($payload);
        if ($payload->nonce_supported == false || $this->session->userdata('token') != $payload->nonce) {
          $result['status'] = 'error';
          $result['message'] = "오류가 발생했습니다. 다시 로그인해주세요(error : invalid nonce).";
          echo json_encode($result);
          exit;
        }
  
        $login_data['header'] = $header;
        $login_data['payload'] = $payload;
        $login_data['signature'] = $signature;
  
        // check expiration time
        
        // generate client_secret
        $client_id = (DEV_SERVER ? 'me.foundy.dev.services' : 'me.foundy.services');
        
        $kid = 'RBR42WP3D5'; // apple private key
        $iss = 'SS5VZWK6ND'; // apple App ID(Team ID)
        $sub = $client_id;
        $jwt_client_secret = $this->apple_model->generateJWT($kid, $iss, $sub);
       
        log_message('debug', '[apple_login] jwt_client_secret : '.$jwt_client_secret);
        
        // verify user
        $req = [
          'client_id' => $client_id,
          'client_secret' => $jwt_client_secret,
          'code' => $code,
          'grant_type' => 'authorization_code'
          //,'redirect_uri' => 'https://example-app.com/redirect'
        ];
        
        log_message('debug', '[apple_login] (verify user) request : '.json_encode($req));
  
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://appleid.apple.com/auth/token');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($req));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
  
        log_message('debug', '[apple_login] (verify user) response : '.$response);
        
        $response = json_decode($response);
        $access_token = $response->access_token;
        $token_type = $response->token_type;
        $expires_in = $response->expires_in;
        $refresh_token = $response->refresh_token;
        $id_token = $response->id_token;
        
//        log_message('debug', '[apple_login] (verify user) access_token : '.$access_token.', token_type : '.$token_type.
//        ', expires_in : '.$expires_in.', refresh_token : '.$refresh_token.', id_token : '.$id_token);
//
        curl_close($ch);
  
        $login_data['access_token'] = $access_token;
        $login_data['refresh_token'] = $refresh_token;
        $login_data['expires_in'] = $expires_in;
        $login_data['verify_user'] = array('req' => $req, 'res' => $response);
        $account = json_encode($login_data);
        
        if (empty($email)) {
          $email = $payload->email;
        }
        if ($register) {
          $this->session->set_userdata('reg_type', 'apple');
          $this->session->set_userdata('reg_email', $email);
          $this->session->set_userdata('reg_account', $account);
//          log_message('debug', '[apple_login] email['.$email.'] account['.$account.'');
          $result['status'] = 'approval';
          $result['message'] = "본인인증이 필요합니다.";
          $result['approval_url'] = base_url().'home/register/approval';
          echo json_encode($result);
          exit;
//          $password = '';
//          $user_data = $this->crud_model->do_register($email, $password, $account);
//          $result['status'] = 'success';
//          $result['message'] = "첫 방문을 환영합니다.";
        } else {
          $user_data = $this->db->get_where('user', array('email' => $email))->row();
          if (empty($user_data) == true) {
            $account = json_encode($login_data);
            $this->session->set_userdata('reg_type', 'apple');
            $this->session->set_userdata('reg_email', $email);
            $this->session->set_userdata('reg_account', $account);
//            log_message('debug', '[apple_login] email['.$email.'] account['.$account.'');
            $result['status'] = 'approval';
            $result['message'] = "본인인증이 필요합니다.";
            $result['approval_url'] = base_url().'home/register/approval';
            echo json_encode($result);
            exit;
//            $password = '';
//            $user_data = $this->crud_model->do_register($email, $password, $account);
//            $result['status'] = 'success';
//            $result['message'] = "첫 방문을 환영합니다.";
          } else {
            if ($user_data->unregister == 1) {
              $ins = array(
                'user_id' => $user_data->user_id,
                'account' => json_encode($account),
                'unregistered' => 1,
              );
              $this->db->set('register_at', 'NOW()', false);
              $this->db->insert('user_register', $ins);
    
              $this->db->set('unregister', 0);
  
              $this->session->set_userdata('user_restore', "yes");
              $result['status'] = 'restore';
              $result['message'] = "기존에 휴먼계정이 삭제되지 않았습니다. 복원 후 로그인하시겠습니까? 복원을 원하지 않으시면 삭제를 클릭해 주세요.";
  
            } else {
              $result['status'] = 'success';
              $result['message'] = "로그인해주셔서 감사합니다.";
            }
            $this->db->set('last_login_at', 'NOW()', false);
            $this->db->where('user_id', $user_data->user_id);
            $this->db->update('user');
          }
        }
  
        $ins = array(
          'user_id' => $user_data->user_id,
          'account' => $account,
          'session_id' => $this->crud_model->get_session_id(),
          'ip' => $this->crud_model->get_session_ip(),
          'is_browser' => $this->agent->is_browser(),
          'is_mobile' => $this->agent->is_mobile(),
          'is_robot' => $this->agent->is_robot(),
          'is_referral' => $this->agent->is_referral(),
          'browser' => $this->agent->browser(),
          'version' => $this->agent->version(),
          'mobile' => $this->agent->mobile(),
          'robot' => $this->agent->robot(),
          'platform' => $this->agent->platform(),
          'referrer' => $this->agent->referrer(),
          'agent' => $this->agent->agent_string(),
          'login_type' => 'apple',
        );
        $this->db->set('login_at', 'NOW()', false);
        $this->db->insert('user_login',$ins);
  
        $user_id = $user_data->user_id;
        $kakao_id = $user_data->kakao_id;
        $email = $user_data->email;
        $user_type = $user_data->user_type;
        $nickname = $user_data->nickname;
        $kakao_thumbnail_image_url = $user_data->kakao_thumbnail_image_url;
        $profile_image_url = $user_data->profile_image_url;
  
        $this->session->set_userdata('user_login', 'yes');
        $this->session->set_userdata('user_id', $user_id);
        $this->session->set_userdata('kakao_id', $kakao_id);
        $this->session->set_userdata('email', $email);
        $this->session->set_userdata('user_type', $user_type);
        $this->session->set_userdata('nickname', $nickname);
        $this->session->set_userdata('kakao_thumbnail_image_url', $kakao_thumbnail_image_url);
        $this->session->set_userdata('profile_image_url', $profile_image_url);
        $this->session->set_userdata('login_type', 'apple');

        $data = array(
          'sub' => $payload->sub,
          'access_token' => $access_token,
          'refresh_token' => $refresh_token,
          'issued_at' => $payload->iat + 32400,
          'expired_at' => $payload->iat + $expires_in + 32400,
        );
        $this->db->set('last_updated_at', 'now()', false);
        $this->db->update('user_apple', $data, array('user_id' => $user_id));
        if ($this->db->affected_rows() == 0) {
          $data['user_id'] = $user_id;
          $this->db->set('create_at', 'now()', false);
          $this->db->insert('user_apple', $data);
        }
        echo json_encode($result);
      }

    } else if ($login_type == 'kakao') {

      if ($para2 == 'rest') { // kakao login with rest api
  
        if (!isset($_GET["code"])) {
          $this->crud_model->alert_exit('오류가 발생했습니다. 다시 로그인해주세요.', $this->get_login_url());
        }
        $code = $_GET["code"];	//발급받은 code 값
  
        log_message('debug', '[kakao login] GET code : '.json_encode($_GET));

        $app_key = APIKEY_KAKAO_REST;
        $redirect_uri = base_url()."home/login/kakao/rest";
  
        $api_url = "https://kauth.kakao.com/oauth/token";
        $params = sprintf( 'grant_type=authorization_code&client_id=%s&redirect_uri=%s&code=%s',
          $app_key, $redirect_uri, $code);

        $opts = array(
          CURLOPT_URL => $api_url,
          CURLOPT_SSL_VERIFYPEER => false,
          CURLOPT_POST => true,
          CURLOPT_POSTFIELDS => $params,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_HEADER => false
        );
  
        $ch = curl_init();
        curl_setopt_array($ch, $opts);
        $result = curl_exec($ch);
  
        log_message('debug', '[kakao login] req : '.$params.', res : '.$result);
  
        $result = json_decode($result);
        if (isset($result->error)) {
          $base_url = base_url();
          $message = sprintf("오류가 발생했습니다. 다시 로그인해주세요. 오류 메세지 : %s'", $result->error_description);
          $this->crud_model->alert_exit($message, $this->get_login_url());
        }
        
        $access_token = $result->access_token; // 6시간 유효, refresh_token은 60일 유효
        $token_type = $result->token_type;
        $refresh_token = $result->refresh_token;
        $expires_in = $result->expires_in;
        $scope = $result->scope;
        $refresh_token_expires_in = $result->refresh_token_expires_in;
        
  
        $this->session->set_userdata('need_kakao_access_token', 'yes');
        $this->session->set_userdata('kakao_auth', json_encode($result));
        
        $app_url= "https://kapi.kakao.com/v2/user/me";
  
        $opts = array(
          CURLOPT_URL => $app_url,
          CURLOPT_SSL_VERIFYPEER => false,
          CURLOPT_POST => true,
          CURLOPT_POSTFIELDS => false,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_HTTPHEADER => array( "Authorization: Bearer " . $access_token )
        );
  
        $ch = curl_init();
        curl_setopt_array($ch, $opts);
        $result = json_decode(curl_exec($ch), true);
        curl_close($ch);

        $this->session->set_userdata('reg_type', '');
        $result = $this->crud_model->do_kakao_login($result);
        
//        log_message('debug', '[kakao] result['.$result['status'].']');

        if ($result['status'] == 'success') {
          $user_id = $this->session->userdata('user_id');
          $kakao_id = $this->session->userdata('kakao_id');
          $this->kakao_model->set_user_kakao($user_id, $kakao_id, $scope, $access_token, $refresh_token, $expires_in,
            $refresh_token_expires_in);
          
          $relocation = $this->cookie_model->get_cookie('relocation');
          if (isset($relocation) == false || empty($relocation)) {
            $relocation = base_url();
          }
          $this->crud_model->alert_exit($result['message'], $relocation);
        } else if ($result['status'] == 'approval') { // mobile approval for register
//          $this->crud_model->alert_exit($result['message'], base_url().'home/register/approval');
          redirect(base_url().'home/register/approval');
        } else if ($result['status'] == 'restore') { // relogin after unregister
          $this->crud_model->alert_exit($result['message'], base_url().'home/login');
        } else { // error
          $this->crud_model->alert_exit($result['message'], base_url().'home/login');
        }
      } else { // kakao login with JDK
  
        if (!isset($_POST) || !isset($_POST['id'])) {
          $result = array();
          $result['status'] = 'error';
          $result['message'] = "오류가 발생했습니다. 다시 로그인해주세요(1).";
        } else {
//          $access_token = $_GET['access_token'];
          $result = $this->crud_model->do_kakao_login($_POST);
//          $res = $this->kakao_model->send_message($access_token);
//          if (isset($res) && isset($res->code) && $res->code == -402) { // insufficient scopes, 우리 필요 동의 항목 talk_agreement
//            $this->session->sess_destroy();
//            $result['status'] = 'reauthorized';
//          }
        }
  
        echo json_encode($result);
        exit;
      }
      
    } else if ($login_type == 'email') {
      
      //header('Content-Type: application/json; charset=UTF-8');
      $result = array();
  
      if (!isset($_POST) || !isset($_POST['email'])) {
        
        $result['status'] = 'error';
        $result['message'] = "오류가 발생했습니다. 다시 로그인해주세요(1).";
        echo json_encode($result);
        exit;
      
      } else {
    
        $email = $_POST['email'];
        $password = sha1($_POST['password']);
    
        $user_data = $this->db->get_where('user', array('email' => $email))->row();
    
        if (empty($user_data)) {
  
          $result['status'] = 'fail';
          $result['message'] = "이메일이 잘못되었습니다.";
          echo json_encode($result);
          exit;
        
        } else if ($user_data->password != $password) {
          
          $result['status'] = 'fail';
          $result['message'] = "비밀번호가 잘못되었습니다.";
          echo json_encode($result);
          exit;
      
        } else {
  
          if ($user_data->unregister == 1) {
            $ins = array(
              'user_id' => $user_data->user_id,
              'kakao_id' => $user_data->kakao_id,
              'account' => '',
              'unregistered' => 1,
            );
            $this->db->set('register_at', 'NOW()', false);
            $this->db->insert('user_register', $ins);
        
            $this->db->set('unregister', 0);
        
            $result['status'] = 'restore';
            if ($user_data->user_type & USER_TYPE_TEACHER) {
              $result['message'] = "기존에 강사 정보를 포함한 휴먼계정이 삭제되지 않았습니다. 복원 후 로그인하시겠습니까? 복원을 원하지 않으시면 삭제를 클릭해 주세요.";
            } else {
              $result['message'] = "기존에 휴먼계정이 삭제되지 않았습니다. 복원 후 로그인하시겠습니까? 복원을 원하지 않으시면 삭제를 클릭해 주세요.";
            }
            $this->session->set_userdata('user_restore', "yes");
        
          } else {
            $result['status'] = 'success';
            $result['message'] = "로그인해주셔서 감사합니다.";
          }
      
          $this->db->set('last_login_at', 'NOW()', false);
          $this->db->where('user_id', $user_data->user_id);
          $this->db->update('user');
      
        }
    
        $ins = array(
          'user_id' => $user_data->user_id,
          'kakao_id' => $user_data->kakao_id,
          'account' => '',
          'session_id' => $this->crud_model->get_session_id(),
          'ip' => $this->crud_model->get_session_ip(),
          'is_browser' => $this->agent->is_browser(),
          'is_mobile' => $this->agent->is_mobile(),
          'is_robot' => $this->agent->is_robot(),
          'is_referral' => $this->agent->is_referral(),
          'browser' => $this->agent->browser(),
          'version' => $this->agent->version(),
          'mobile' => $this->agent->mobile(),
          'robot' => $this->agent->robot(),
          'platform' => $this->agent->platform(),
          'referrer' => $this->agent->referrer(),
          'agent' => $this->agent->agent_string(),
          'login_type' => 'kakao',
        );
        $this->db->set('login_at', 'NOW()', false);
        $this->db->insert('user_login', $ins);
    
        $user_id = $user_data->user_id;
        $kakao_id = $user_data->kakao_id;
        $email = $user_data->email;
        $user_type = $user_data->user_type;
        $nickname = $user_data->nickname;
        $kakao_thumbnail_image_url = $user_data->kakao_thumbnail_image_url;
        $profile_image_url = $user_data->profile_image_url;
    
        $this->session->set_userdata('user_login', 'yes');
        $this->session->set_userdata('user_id', $user_id);
        $this->session->set_userdata('kakao_id', $kakao_id);
        $this->session->set_userdata('email', $email);
        $this->session->set_userdata('user_type', $user_type);
        $this->session->set_userdata('nickname', $nickname);
        $this->session->set_userdata('kakao_thumbnail_image_url', $kakao_thumbnail_image_url);
        $this->session->set_userdata('profile_image_url', $profile_image_url);
        $this->session->set_userdata('login_type', $login_type);
  
        echo json_encode($result);
        exit;
      }
    
    } else {
      $restore = isset($_GET['r']);
      $relocation = base_url();
      if (isset($_GET['l'])) {
        $relocation = build_get_location($_GET, 'l');
      }

      $this->page_data['page_name'] = "user/login";
      $this->page_data['asset_page'] = "login";
      $this->page_data['page_title'] = "login";
      $this->page_data['restore'] = $restore;
      $this->page_data['relocation'] = $relocation;
      $this->load->view('front/index', $this->page_data);
    }
  }

  /* FUNCTION: Logout set */
  public function logout()
  {
    $redirect_url = base_url();
    $result['status'] = 'success';
    $result['redirect_url'] = $redirect_url;
    $result['message'] = "로그아웃 되었습니다.";
    
    if ($this->is_login() == false) {
      redirect('home', 'refresh');
    } else {
      $user_data = json_decode($this->session->userdata('user_data'));
  
      $ins = array(
        'user_id' => $user_data->user_id,
        'kakao_id' => $user_data->kakao_id,
      );
      $this->db->set('logout_at', 'NOW()', false);
      $this->db->insert('user_logout',$ins);
  
      $this->session->sess_destroy();
      $this->cookie_model->delete_cookie('mobile_approval_deny');
      $this->cookie_model->delete_cookie('mobile_approval_deny_time');
    }
    
    echo json_encode($result);
    exit;
  }
  
  public function register($para1 = '', $para2 = '')
  {
    if ($para1 == 'do_register') {
  
      if ($this->is_login() == true) {
        $this->crud_model->alert_exit('로그인 중입니다.', base_url());
      }
  
      $this->load->library('form_validation');
      $this->form_validation->set_rules('email', 'email', 'trim|required|max_length[32]');
      $this->form_validation->set_rules('password1', 'password1', 'trim|required|max_length[32]');
      $this->form_validation->set_rules('password2', 'password2', 'trim|required|max_length[32]');
  
      if ($this->form_validation->run() == FALSE) {
        $message = '';
        $message .= json_encode(array(
          'email' => $this->input->post('email'),
          'password1' => $this->input->post('password1'),
          'password2' => $this->input->post('password2'),
        ));;
        $result['message'] = $message . '<br>' . validation_errors();
        $result['status'] = 'fail';
        echo json_encode($result);
        exit;
      }
  
      $email = $this->input->post('email');
      $password1 = $this->input->post('password1');
      $password2 = $this->input->post('password2');
      $this->crud_model->user_register_validation($email, $password1, $password2);
      
      $this->session->set_userdata('reg_type', 'email');
      $this->session->set_userdata('reg_email', $email);
      $this->session->set_userdata('reg_password1', $password1);
      $this->session->set_userdata('reg_password2', $password2);
  
      $result['status'] = 'approval';
      $result['message'] = "본인인증이 필요합니다.";
      $result['approval_url'] = base_url().'home/register/approval';
      echo json_encode($result);
      exit;
  
    } else if ($para1 == 'approval') {
  
      if ($para2 == 'mobile') {
    
        if (isset($_GET['sid']) == false || isset($_GET['aid']) == false || isset($_GET['fid']) == false) {
          $this->redirect_error('접근 오류가 발생하였습니다!');
        }
    
        $session_id = $_GET['sid'];
        $auth_id = $_GET['aid'];
        $for = $_GET['fid'];
    
        $auth = $this->db->get_where('user_auth', array('auth_id' => $auth_id))->row();
        if (isset($auth) == false || empty($auth) == true) {
          $this->redirect_error('접근 오류가 발생하였습니다!(1)');
        }
        if ($auth->session_id != $session_id || $auth->session_id != $this->crud_model->get_session_id()) {
          $this->redirect_error('접근 오류가 발생하였습니다!(2)');
        }
        if ($auth->for != $for || $for != 'mobile_approval') {
          $this->redirect_error('접근 오류가 발생하였습니다!(3)');
        }
    
        $auth_data = json_decode($auth->auth_data);
        $user_data = $this->db->get_where('user', array('phone' => $auth_data->mobileno))->row();
        if (isset($user_data) && empty($user_data) == false) {
          $this->redirect_error('이미 가입한 회원 전화번호입니다!');
        }
    
        $user_id = $this->session->userdata('user_id');
        $user_data = $this->db->get_where('user', array('user_id' => $user_id))->row();
        if (isset($user_data) && empty($user_data) == false) {
      
          $data['username'] = $auth_data->name;
          $data['phone'] = $auth_data->mobileno;
          $data['gender'] = $auth_data->gender == 1 ? 'male' : 'female';
          $data['mobile_approval'] = 1;
          $this->db->where('user_id', $user_data->user_id);
          $this->db->update('user', $data);
      
          if ($this->db->affected_rows() > 0) {
        
            $this->session->set_userdata('mobile_approval', 'yes');
            $this->redirect_info('인증이 완료되었습니다!');
          } else {
            $this->redirect_error('문제가 발생하였습니다! 관리자에게 문의 바랍니다!');
          }
      
        } else {
          $this->redirect_error('회원 전화번호가 아닙니다');
        }
    
      } else if ($para2 == 'do') {
    
        if (isset($_GET['sid']) == false || isset($_GET['aid']) == false || isset($_GET['fid']) == false) {
          $this->redirect_error('접근 오류가 발생하였습니다!');
        }
    
        $session_id = $_GET['sid'];
        $auth_id = $_GET['aid'];
        $for = $_GET['fid'];
    
        $auth = $this->db->get_where('user_auth', array('auth_id' => $auth_id))->row();
        if (isset($auth) == false || empty($auth) == true) {
          $this->redirect_error('접근 오류가 발생하였습니다!(1)');
        }
        if ($auth->session_id != $session_id || $auth->session_id != $this->crud_model->get_session_id()) {
          $this->redirect_error('접근 오류가 발생하였습니다!(2)');
        }
        if ($auth->for != $for || $for != 'register') {
          $this->redirect_error('접근 오류가 발생하였습니다!(3)');
        }
    
        $auth_data = json_decode($auth->auth_data);
        $user_data = $this->db->get_where('user', array('phone' => $auth_data->mobileno))->row();
        if (isset($user_data) && empty($user_data) == false) {
          $this->redirect_error('이미 가입한 회원 전화번호입니다!');
        }
    
        $reg_type = $this->session->userdata('reg_type');
        if ($reg_type == 'kakao') {
          $account = $this->session->userdata('reg_account');
          $account['auth'] = $auth_data;
          $result = $this->crud_model->do_kakao_login($account);
          if ($result['status'] == 'success') {
            redirect(base_url().'home/register/complete');
          } else {
            $this->redirect_error($result['message']);
          }
        } else if ($reg_type == 'apple') {
          $account = json_decode($this->session->userdata('reg_account'));
          $email = $this->session->userdata('reg_email');
          $password = '';
          $result = $this->crud_model->do_register($email, $password, $account,
            $auth_data->name, $auth_data->mobileno, ($auth_data->gender == 1 ? 'male' : 'female'), 'apple');
          if ($result['status'] == 'success') {
            redirect(base_url().'home/register/complete');
          } else {
            $this->redirect_error($result['message']);
          }
        } else if ($reg_type == 'email') {
          $email = $this->session->userdata('reg_email');
          $password1 = $this->session->userdata('reg_password1');
//          $password2 = $this->session->userdata('reg_password2');
          $account = '';
          $result = $this->crud_model->do_register($email, $password1, $account,
            $auth_data->name, $auth_data->mobileno, ($auth_data->gender == 1 ? 'male' : 'female'), 'email');
          if ($result['status'] == 'success') {
            redirect(base_url().'home/register/complete');
          } else {
            $this->redirect_error($result['message']);
          }
        } else {
          $this->redirect_error('접근 오류가 발생하였습니다!(4)');
        }
    
      } else {
        if ($this->is_login() == true) {
          $this->redirect_error('접근 오류가 발생하였습니다!(0)');
        }
        $reg_type = $this->session->userdata('reg_type');
        if ($reg_type != 'kakao' && $reg_type != 'apple' && $reg_type != 'email') {
          $this->redirect_error('접근 오류가 발생하였습니다!(1)');
        }
    
        $this->load->view('front/user/register/mobile_approval', $this->page_data);
      }
  
    } else if ($para1 == 'complete') {
      $this->load->view('front/user/register/sign_up_complete', $this->page_data);
    } else if ($para1 == 'cancel') {
      $this->load->view('front/user/register/sign_up_cancel', $this->page_data);
    } else {
      if ($this->is_login() == true) {
        $this->crud_model->alert_exit('로그인 중입니다.', base_url());
      }
      $this->page_data['page_name'] = "user/register";
      $this->page_data['asset_page'] = "login";
      $this->page_data['page_title'] = "login";
      $this->load->view('front/index', $this->page_data);
    }
  }
  
  /* FUNCTION: Unregister set */
  public function unregister($para1 = '')
  {
    if ($this->session->userdata('user_login') != "yes") {
      $this->session->set_flashdata('alert', "login first!");
      redirect(base_url() . 'home', 'refresh');
    }

    $user_id = $this->session->userdata('user_id');
    $user_data = json_decode($this->session->userdata('user_data'));

    if ($para1 == 'confirm') {

      if ($user_data->user_type & USER_TYPE_SHOP) {
        $result['status'] = 'error';
        $result['message'] = "샵 회원은 관리자에게 요청 후 회원탈퇴가 가능합니다.";
      } else if ($user_data->user_type & USER_TYPE_CENTER) {
        $result['status'] = 'error';
        $result['message'] = "센터 회원은 관리자에게 요청 후 회원탈퇴가 가능합니다.";
      } else if ($user_data->user_type & USER_TYPE_TEACHER) {
        $result['status'] = 'success';
        $result['message'] = "강사로 등록된 모든 클래스 / 센터 스케줄 정보가 휴먼기간 후 모두 삭제됩니다. 탈퇴하시겠습니까?";
      } else {
        $result['status'] = 'success';
        $result['message'] = "";
      }

    } else {

      if ($user_data->user_type & USER_TYPE_SHOP) {
        $result['status'] = 'error';
        $result['message'] = "샵 회원은 관리자에게 요청 후 회원탈퇴가 가능합니다.";
      } else if ($user_data->user_type & USER_TYPE_CENTER) {
        $result['status'] = 'error';
        $result['message'] = "센터 회원은 관리자에게 요청 후 회원탈퇴가 가능합니다.";
      } else {

        if ($user_data->user_type & USER_TYPE_TEACHER) {
          $activate = 0;
          $teacher_id = $user_data->teacher_id;
          $this->crud_model->do_teacher_activate($teacher_id, $user_id, $activate);
        }

        $ins = array(
          'user_id' => $user_data->user_id,
          'kakao_id' => $user_data->kakao_id,
//          'account' => $kakao_account,
        );
        $this->db->set('unregister_at', 'NOW()', false);
        $this->db->insert('user_unregister',$ins);

        $upd = array(
          'unregister' => 1,
        );
        $where = array(
          'user_id' => $user_id
        );
        $this->db->update('user', $upd, $where);

//    $this->db->where('user_id', $user_id);
//    $this->db->delete('user');

        $this->session->sess_destroy();

        $result['status'] = 'success';
        $result['message'] = "회원탈퇴 되었습니다.";
      }

    }

    echo json_encode($result);
    exit;
  }

  /* FUNCTION: Loads Contact Page */
  public function blog($para1 = '', $para2 = '', $para3 = '')
  {
    $type = $para1;

    if ($type == 'list') {

      $page = $_GET['page'];
      $category = $_GET['category'];
      $limit = BLOG_LIST_PAGE_SIZE;
      $offset = $limit * ($page - 1);

      if ($category == 0) {
        $category_ids = array();
        $categories = $this->db->get_where('category_blog', array('activate' => 1, 'type' => BLOG_TYPE_DEFAULT))->result();
        foreach ($categories as $c) {
          $category_ids[] = $c->category_id;
        }
        $this->db->where_in('blog_category', $category_ids);
        $where = array('activate' => 1);
      } else {
        $where = array('activate' => 1, 'blog_category' => $category);
      }
      $blogs = $this->db->order_by('blog_id', 'desc')->get_where('blog', $where, $limit, $offset)->result();

      $this->page_data['blogs'] = $blogs;
      $this->load->view('front/blog/ajax_list', $this->page_data);

    } else if ($type == 'view') {

      $blog_id = $_GET['id'];

      $blog = $this->db->get_where('blog', array('blog_id' => $blog_id))->row();
      if ($blog->activate != 1) {
        $redirect = base_url();
        echo "<script>alert('잘못된 접근입니다');location.href='{$redirect}'</script>";
        exit;
      }

      $category = $this->db->get_where('category_blog', array('category_id' => $blog->blog_category))->row();
      if ($category->activate != 1) {
        $redirect = base_url();
        echo "<script>alert('잘못된 접근입니다');location.href='{$redirect}'</script>";
        exit;
      }

//      $where = array('blog_id' => $blog_id);
//      $upd = array('number_of_view' => 'number_of_view + 1');
//      $this->db->update('blog', $upd, $where);
      $query = <<<QUERY
update blog set number_of_view=number_of_view+1 where blog_id={$blog_id}
QUERY;
      $this->db->query($query);

      $this->page_data['blog'] = $blog;
      $this->page_data['category'] =  $category;
      $this->page_data['page_name'] = 'blog/blog_view';
      $this->page_data['asset_page'] = 'blog_view';
      $this->page_data['page_title'] = $blog->title;
      $this->load->view('front/index.php', $this->page_data);

    } else {

      $category = 0; // ALL
      if (isset($_GET['category'])) {
        $category = $_GET['category'];
      }

      $valid_category = false;
      $this->db->order_by('category_id', 'desc');
      $categories = $this->db->get_where('category_blog', array('activate' => 1, 'type' => BLOG_TYPE_DEFAULT))->result();
      foreach ($categories as $c) {
        if ($c->category_id == $category) {
          $valid_category = true;
        }
      }

      if ($valid_category == false && $category > 0) {
        $redirect = base_url();
        echo "<script>alert('잘못된 접근입니다');location.href='{$redirect}'</script>";
        exit;
      }

      $this->page_data['category'] = $category;
      $this->page_data['categories'] = $categories;
      $this->page_data['page_name'] = 'blog';
      $this->page_data['asset_page'] = 'blog';
      $this->page_data['page_title'] = 'blog';
      $this->load->view('front/index', $this->page_data);

    }
  }

  /* FUNCTION: Loads Contact Page */
  function blog_by_cat($para1 = "")
  {
    $this->page_data['category'] = $para1;
    $this->load->view('front/blog/blog_list', $this->page_data);
  }

//  function ajax_blog_list($para1 = "")
//  {
//    $this->load->library('Ajax_pagination');
//
//    $category_id = $this->input->post('blog_category');
//    if ($category_id !== '' && $category_id !== 'all') {
//      $this->db->where('blog_category', $category_id);
//    }
//
//    // pagination
//    $config['total_rows'] = $this->db->count_all_results('blog');
//    $config['base_url'] = base_url() . 'index.php?home/listed/';
//    $config['per_page'] = 3;
//    $config['uri_segment'] = 5;
//    $config['cur_page_giv'] = $para1;
//
//    $function = "filter_blog('0')";
//    $config['first_link'] = '&laquo;';
//    $config['first_tag_open'] = '<li><a onClick="' . $function . '">';
//    $config['first_tag_close'] = '</a></li>';
//
//    $rr = ($config['total_rows'] - 1) / $config['per_page'];
//    $last_start = floor($rr) * $config['per_page'];
//    $function = "filter_blog('" . $last_start . "')";
//    $config['last_link'] = '&raquo;';
//    $config['last_tag_open'] = '<li><a onClick="' . $function . '">';
//    $config['last_tag_close'] = '</a></li>';
//
//    $function = "filter_blog('" . ($para1 - $config['per_page']) . "')";
//    $config['prev_tag_open'] = '<li><a onClick="' . $function . '">';
//    $config['prev_tag_close'] = '</a></li>';
//
//    $function = "filter_blog('" . ($para1 + $config['per_page']) . "')";
//    $config['next_link'] = '&rsaquo;';
//    $config['next_tag_open'] = '<li><a onClick="' . $function . '">';
//    $config['next_tag_close'] = '</a></li>';
//
//    $config['full_tag_open'] = '<ul class="pagination">';
//    $config['full_tag_close'] = '</ul>';
//
//    $config['cur_tag_open'] = '<li class="active"><a>';
//    $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
//
//    $function = "filter_blog(((this.innerHTML-1)*" . $config['per_page'] . "))";
//    $config['num_tag_open'] = '<li><a onClick="' . $function . '">';
//    $config['num_tag_close'] = '</a></li>';
//    $this->ajax_pagination->initialize($config);
//
//    $this->db->order_by('blog_id', 'desc');
//    if ($category_id !== '' && $category_id !== 'all') {
//      $this->db->where('blog_category', $category_id);
//    }
//
//    $this->page_data['blogs'] = $this->db->get('blog', $config['per_page'], $para1)->result_array();
//    if ($category_id !== '' && $category_id !== 'all') {
//      $category = $this->crud_model->get_type_name_by_id('blog_category', $category_id, 'name');
//    } else {
//      $category = ('all_blogs');
//    }
//    $this->page_data['category_name'] = $category;
//    $this->page_data['count'] = $config['total_rows'];
//
//    $this->load->view('front/blog/ajax_list', $this->page_data);
//  }

  public function user()
  {
    $base_url = base_url();
    $view_type = $this->uri->segment(3);

    if ($this->session->userdata('user_login') != "yes") {
      if ($view_type != 'service' && $view_type != 'privacy') {
        $this->redirect_login();
        exit;
      }
    }
  
    if (!$this->input->is_ajax_request()) {
      if ($view_type != 'service' &&
        $view_type != 'privacy' &&
        $view_type != 'center' &&
        $view_type != 'teacher' &&
        $view_type != 'edit' &&
        $view_type != 'notify' &&
        $view_type != 'introduce' &&
        $view_type != 'faq' &&
        $view_type != 'customer' &&
        $view_type != 'wish' &&
        $view_type != 'order' &&
        $view_type != 'coupon' &&
        $view_type != '') {
        $this->crud_model->alert_exit('잘못된 접근입니다.', base_url());
      }
    }

    if ($view_type == 'info') {

      $user_id = $this->session->userdata('user_id');
//      $user_data = $this->db->get_where('user', array('user_id' => $user_id))->row();
      $user_data = json_decode($this->session->userdata('user_data'));
      $this->page_data['user_id'] = $user_id;
      $this->page_data['email'] = $user_data->email;
      $this->page_data['user_type'] = $user_data->user_type;
      $this->page_data['nickname'] = $user_data->nickname;
      $this->page_data['profile_image_url'] = $user_data->profile_image_url;
      $this->page_data['thumbnail_image_url'] = $user_data->kakao_thumbnail_image_url;

      $this->page_data['center_activate'] = false;
      if ($user_data->user_type & USER_TYPE_CENTER) {
        $this->page_data['center_activate'] = 1;

        $my_centers = $this->db->get_where('center', array('user_id' => $user_id, 'activate' => 1))->result();
        $this->page_data['my_centers'] = $my_centers;
      }

      $this->page_data['teacher_activate'] = false;
      if ($user_data->user_type & USER_TYPE_TEACHER) {
        $this->page_data['teacher_activate'] = 1;

        $my_teacher = $this->db->get_where('teacher', array('user_id' => $user_id, 'activate' => 1))->row();
        $this->page_data['my_teacher'] = $my_teacher;
      }

      $bookmark_centers = $this->db->get_where('bookmark_center', array('user_id' => $user_id))->result();
      if (!empty($bookmark_centers) and count($bookmark_centers) > 0) {
        $center_ids = array();
        foreach ($bookmark_centers as $b) {
          $center_ids[] = $b->center_id;
        }
        $this->db->where('activate', 1);
        $this->db->where_in('center_id', $center_ids);
        $bookmark_centers = $this->db->get('center')->result();
      }

      $bookmark_teachers = $this->db->get_where('bookmark_teacher', array('user_id' => $user_id))->result();
      if (!empty($bookmark_teachers) and count($bookmark_teachers) > 0) {
        $teacher_ids = array();
        foreach ($bookmark_teachers as $t) {
          $teacher_ids[] = $t->teacher_id;
        }
        $this->db->where('activate', 1);
        $this->db->where_in('teacher_id', $teacher_ids);
        $bookmark_teachers = $this->db->get('teacher')->result();
      }

//      $bookmark_classes = $this->db->get_where('bookmark_class', array('user_id' => $user_id))->result();
//      if (!empty($bookmark_classes) and count($bookmark_classes) > 0) {
//        $video_ids = array();
//        foreach ($bookmark_classes as $v) {
//          $video_ids[] = $v->video_id;
//        }
//        $this->db->where_in('video_id', $video_ids);
//        $bookmark_classes = $this->db->get('teacher_video')->result();
//      }
      $today = date('Y-m-d');
      $query = <<<QUERY
select * from center_ticket_member
where user_id={$user_id} and refund=0 and deleted=0 and '{$today}'<=enable_end_at
order by enable_end_at asc
QUERY;

      $all_tickets = $this->db->query($query)->result();
      $on_tickets = array();
      $stop_tickets = array();
      $planed_tickets = array();
      $now = time();
      foreach ($all_tickets as $ticket) {
        $ticket->d_day = (int)((strtotime($ticket->enable_end_at) - strtotime($today))/ONE_DAY);
        if ($now < strtotime($ticket->enable_start_at)) { // 진행 예정 수강권
          $planed_tickets[] = $ticket;
        } else { // 진행중 수강권
          if ($ticket->stop > 0) { // 정지 진행중 수강권
            if (strtotime($ticket->stop_start_at) <= $now && $now <= strtotime($ticket->stop_end_at)) {
              $stop_tickets[] = $ticket;
            } else {
              $on_tickets[] = $ticket;
            }
          } else {
            $on_tickets[] = $ticket;
          }
        }
        $ticket->center = $this->db->get_where('center', array('center_id' => $ticket->center_id))->row();
      }

      $this->page_data['bookmark_centers'] = $bookmark_centers;
      $this->page_data['bookmark_teachers'] = $bookmark_teachers;
//      $this->page_data['bookmark_classes'] = $bookmark_classes;
      $this->page_data['on_tickets'] = $on_tickets;
      $this->page_data['stop_tickets'] = $stop_tickets;
      $this->page_data['planed_tickets'] = $planed_tickets;
      $this->load->view('front/user/profile', $this->page_data);

    } else if ($view_type == 'edit_profile') {

      $user_id = $this->session->userdata('user_id');
//      $user_data = $this->db->get_where('user', array('user_id' => $user_id))->row();
      $user_data = json_decode($this->session->userdata('user_data'));
      $this->page_data['user_data'] = $user_data;
      $this->load->view('front/user/update_profile', $this->page_data);

    } else if ($view_type == 'update_profile') {

      $this->load->library('form_validation');

      $this->form_validation->set_rules('nickname', 'nickname', 'trim|max_length[32]');

      if ($this->form_validation->run() == FALSE) {
        echo '<br>' . validation_errors();
      } else {

        $user_id = $this->session->userdata('user_id');
        $nickname = $this->input->post('nickname');
        $this->db->set('nickname', $nickname);

        if (isset($_FILES['profile_img'])) {
          $file_name = 'profile_'.$user_id.'.jpg';
          $error = $this->crud_model->file_validation($_FILES['profile_img'], false);
          if ($error == UPLOAD_ERR_OK) {
            $this->crud_model->upload_image(IMG_PATH_PROFILE, $file_name, $_FILES["profile_img"], 120, 0, true, true);
            $time=time();
            $profile_image_url = base_url().'uploads/profile_image/profile_'.$user_id.'_thumb.jpg?id='.$time;
            $this->db->set('profile_image_url', $profile_image_url);
          } else if ($error != UPLOAD_ERR_NO_FILE) {
            $this->crud_model->file_validation_alert($error);
          }
        }

        $this->db->where('user_id', $user_id);
        $this->db->update('user');

        echo 'done';
      }

    } else if ($view_type == 'update_password') {
      
      $user_id = $this->session->userdata('user_id');
      $user_data = $this->db->get_where('user', array('user_id' => $user_id))->row();
      $user_data = json_decode($this->session->userdata('user_data'));

      $this->load->library('form_validation');

      if ($user_data->password != '' || strlen($user_data->password) > 0) {
        $this->form_validation->set_rules('password', 'password', 'trim|required|max_length[32]');
      }

      $this->form_validation->set_rules('password1', 'password', 'trim|required|max_length[32]');
      $this->form_validation->set_rules('password2', 'password', 'trim|required|max_length[32]');

      if ($this->form_validation->run() == FALSE) {
        echo '<br>' . validation_errors();
      } else {

        if ($user_data->password != '' || strlen($user_data->password) > 0) {
          $password = sha1($this->input->post('password'));

          if ($password != $user_data->password) {
            echo "<script>alert('입력하신 기존 비밀번호가 잘못되었습니다');</script>";
            exit;
          }
        }

        $password1 = $this->input->post('password1');
        $password2 = $this->input->post('password2');
        if ($password1 != $password2) {
          echo "<script>alert('입력하신 새 비밀번호가 일치하지 않습니다');</script>";
          exit;
        }
  
        $r = $this->crud_model->check_pw($password1);
        if ($r[0] == false) {
          echo "<script>alert('$r[1]');</script>";
          exit;
        }
  
        $this->db->where('user_id', $user_id);
        $this->db->update('user', array('password' => sha1($password1)));
        echo 'done';
      }

    } elseif ($view_type == "center_register") {

//      $user_id = $this->session->userdata('user_id');
//      $query = <<<QUERY
//SELECT center_id FROM user WHERE user_id={$user_id}
//QUERY;
//      $row = $this->db->query($query)->row();

//      if ($row->center_id > 0) {
//        echo ("<script>alert('이미신청하셨습니다'); window.location.href='{$base_url}home/user'</script>");
//        exit;
//      }
      $this->load->view('front/user/center_register');

    } elseif ($view_type == "teacher_register") {

      $user_id = $this->session->userdata('user_id');
      $query = <<<QUERY
SELECT teacher_id FROM user WHERE user_id={$user_id}
QUERY;
      $row = $this->db->query($query)->row();

      if ($row->teacher_id > 0) {
        echo ("<script>alert('이미신청하셨습니다'); window.location.href='{$base_url}home/user'</script>");
        exit;
      } else {
        $this->load->view('front/user/teacher_register');
      }

    } elseif ($view_type == "shop_register") {

      $user_id = $this->session->userdata('user_id');
      $query = <<<QUERY
SELECT shop_id FROM user WHERE user_id={$user_id}
QUERY;
      $row = $this->db->query($query)->row();

//      if ($row->shop_id > 0) {
//        echo ("<script>alert('이미신청하셨습니다'); window.location.href='{$base_url}home/user'</script>");
//        exit;
//      }

      $this->load->view('front/user/shop_register');

    } elseif ($view_type == "do_center_register") {

      $this->load->library('form_validation');
      $this->form_validation->set_rules('title', 'center-title', 'trim|required|max_length[32]');
      $this->form_validation->set_rules('phone', 'center-phone', 'trim|required|numeric|max_length[16]');
      $this->form_validation->set_rules('about', 'about', 'trim|required|max_length[64]');
      $this->form_validation->set_rules('address', 'center-address', 'trim|required|max_length[256]');
      $this->form_validation->set_rules('address-detail', 'center-address-detail', 'trim|max_length[256]');
      $this->form_validation->set_rules('latitude', 'center-latitude', 'trim|required|max_length[32]');
      $this->form_validation->set_rules('longitude', 'center-longitude', 'trim|required|max_length[32]');
      $this->form_validation->set_rules('instagram', 'instagram', 'trim|valid_url|max_length[256]');

      if ($this->form_validation->run() == FALSE) {
        echo '<br>' . validation_errors();
      } else {
        $user_id = $this->session->userdata('user_id');
        $title = $this->input->post('title');
        $phone = $this->input->post('phone');
        $about = $this->input->post('about');
        $address = $this->input->post('address');
        $address_detail = $this->input->post('address-detail');
        $longitude = $this->input->post('longitude');
        $latitude = $this->input->post('latitude');
        $instagram = $this->input->post('instagram');
        $categories_yoga = $this->input->post('category_yoga');
        $categories_pilates = $this->input->post('category_pilates');
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
        
        if (isset($instagram) == false || empty($instagram) == true) {
          $instagram = null;
        }

        $data = array(
          'user_id' => $user_id,
          'title' => $title,
          'phone' => $phone,
          'about' => $about,
          'address' => $address,
          'address_detail' => $address_detail,
          'latitude' => $latitude,
          'longitude' => $longitude,
          'instagram' => $instagram,
          'activate' => 0,
          'shower' => $shower,
          'towel' => $towel,
          'parking' => $parking,
          'valet' => $valet,
        );
        $this->db->set($data);
        $this->db->set('create_at', 'NOW()', false);
        $this->db->set('approval_at', 'NOW()', false);
        $this->db->insert('center');

        $center_id = $this->db->insert_id();

        $this->db->set('center_id', $center_id, true);
        $this->db->set('location', "ST_GeomFromText('POINT({$longitude} {$latitude})')", false);
        $this->db->insert('center_location');

        foreach ($categories_yoga as $cat) {
          $cat = trim($cat);
          $this->db->insert('center_category', array('center_id' => $center_id, 'category' => $cat, 'type' => CENTER_TYPE_YOGA, 'activate' => 0));
        }

        foreach ($categories_pilates as $cat) {
          $cat = trim($cat);
          $this->db->insert('center_category', array('center_id' => $center_id, 'category' => $cat, 'type' => CENTER_TYPE_PILATES, 'activate' => 0));
        }

//        $this->db->where('user_id', $user_id);
//        $this->db->update('user', array( 'center_id' => $center_id));
//
//        $this->session->set_userdata('center_id', $center_id);

        echo "done";
      }

    } elseif ($view_type == "do_teacher_register") {

      $this->load->library('form_validation');
      $this->form_validation->set_rules('teacher_name', 'teacher_name', 'trim|required|max_length[32]');
      $this->form_validation->set_rules('about', 'about', 'trim|required|max_length[64]');
      $this->form_validation->set_rules('youtube', 'youtube', 'trim|valid_url|max_length[256]');
      $this->form_validation->set_rules('instagram', 'instagram', 'trim|valid_url|max_length[256]');
//      $this->form_validation->set_rules('homepage', 'homepage', 'trim|valid_url|max_length[256]');

      if ($this->form_validation->run() == FALSE) {
        echo '<br>' . validation_errors();
      } else {
        $name = $this->input->post('teacher_name');
        $user_id = $this->session->userdata('user_id');
        $about = $this->input->post('about');
        $youtube = $this->input->post('youtube');
        $instagram = $this->input->post('instagram');
//        $homepage = $this->input->post('homepage');
        $categories = $this->input->post('category');

        if (empty($youtube) && empty($instagram)) {
          echo ("<script>alert('유튜브와 인스타그램 중 최소 하나는 입력해주세요');</script>");
          exit;
        }

        if (!empty(($this->input->post('category_etc')))) {
          if (isset($categories) && count($categories)) {
            $categories = array_merge($categories, explode(' ', trim($this->input->post('category_etc'))));
          } else {
            $categories = explode(' ', trim($this->input->post('category_etc')));
          }
        }

        if (!empty($categories) && count($categories)) {
          $categories = array_filter(array_map('trim', $categories));
        }

        if (empty($categories) || count($categories) == 0) {
          echo ("<script>alert('최소 하나의 분류를 선택해주세요');</script>");
          exit;
        }

        $data = array(
          'name' => $name,
          'user_id' => $user_id,
          'about' => $about,
          'youtube' => $youtube,
          'instagram' => $instagram,
//          'create_at' => 'NOW()',
//          'approval_at' => 'NOW()'
        );
        $this->db->set('create_at', 'NOW()', false);
        $this->db->set('approval_at', 'NOW()', false);
        $this->db->insert('teacher', $data);
        $teacher_id = $this->db->insert_id();

        foreach ($categories as $cat) {
          $cat = trim($cat);
          $this->db->insert('teacher_category', array('teacher_id' => $teacher_id, 'category' => $cat));
        }

        $this->db->where('user_id', $user_id);
        $this->db->update('user', array( 'teacher_id' => $teacher_id));

        $this->session->set_userdata('teacher_id', $teacher_id);

        echo "done";
      }

    } elseif ($view_type == "do_shop_register") {

      $this->load->library('form_validation');
      $this->form_validation->set_rules('shop_name', 'shop_name', 'trim|required|max_length[16]');
      $this->form_validation->set_rules('shop_items', 'shop_items', 'trim|required|max_length[128]');
      $this->form_validation->set_rules('shop_phone', 'shop_phone', 'trim|required|numeric|max_length[32]');
      $this->form_validation->set_rules('shop_homepage_url', 'shop_homepage_url', 'trim|valid_url|max_length[256]');
      $this->form_validation->set_rules('representative_name', 'representative_name', 'trim|required|max_length[128]');
      $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|max_length[128]');
      $this->form_validation->set_rules('business_license_num', 'business_license_num', 'trim|required|numeric|max_length[32]');
      $this->form_validation->set_rules('sns_url', 'sns_url', 'trim|valid_url|max_length[256]');

      if ($this->form_validation->run() == FALSE) {
        echo '<br>' . validation_errors();
      } else {
        $shop_name = $this->input->post('shop_name');
        $user_id = $this->session->userdata('user_id');
        $shop_items = $this->input->post('shop_items');
        $shop_phone = $this->input->post('shop_phone');
        $shop_homepage_url = $this->input->post('shop_homepage_url');
        $representative_name = $this->input->post('representative_name');
        $email = $this->input->post('email');
        $business_license_num = $this->input->post('business_license_num');
        $sns_url = $this->input->post('sns_url');

//        if (!isset($_FILES["business_license_img"])) {
//          echo("<script>alert('사업자등록증 파일을 등록바랍니다.');</script>");
//          exit;
//        }

//        $this->crud_model->file_validation($_FILES['business_license_img']);

        $query = <<<QUERY
select count(*) as cnt from shop where shop_name='{$shop_name}'
QUERY;
        $dup = $this->db->query($query)->row()->cnt;
        if ($dup) {
          echo("<script>alert('존재하는 브랜드입니다. 다른 이름으로 신청해주세요.');</script>");
          exit;
        }

        $data = array(
          'shop_name' => $shop_name,
          'user_id' => $user_id,
          'shop_items' => $shop_items,
          'shop_phone' => $shop_phone,
          'shop_homepage_url' => $shop_homepage_url,
          'representative_name' => $representative_name,
          'email' => $email,
          'business_license_num' => $business_license_num,
          'sns_url' => $sns_url,
          'activate' => 0,
        );
        $this->db->set($data);
        $this->db->set('register_at', 'NOW()', false);
        $this->db->set('contract_at', 'NOW()', false);
        $this->db->insert('shop');
//        $shop_id = $this->db->insert_id();

//        $file_name = 'shop_' . $shop_id . '.jpg';
//        $this->crud_model->upload_image(IMG_PATH_SHOP, $file_name, $_FILES['business_license_img'], 0, 0, false, true);
//        $time = time();
//        $business_image_url = IMG_WEB_PATH_SHOP . $file_name . '?id=' . $time;
//        $this->db->where('shop_id', $shop_id);
//        $this->db->update('shop', array('business_license_url' => $business_image_url));

//        $this->db->where('user_id', $user_id);
//        $this->db->update('user', array('shop_id' => $shop_id));
//
//        $this->session->set_userdata('shop_id', $shop_id);

        if ($this->db->affected_rows() > 0) {
          echo "done";
        } else {
          echo "fail : not inserted";
        }
      }
  
    } elseif ($view_type == 'service') {
      $this->load->view('front/user/terms_of_use');
    } elseif ($view_type == 'privacy') {
      $this->load->view('front/user/personal_policy');
    } else {
      if ($view_type == 'center') {
        $this->page_data['part'] = 'center_register';
      } else if ($view_type == 'teacher') {
        $this->page_data['part'] = 'teacher_register';
      } else if ($view_type == 'edit') {
        $this->page_data['part'] = 'edit_profile';
      } else if ($view_type == 'notify') {
        $this->page_data['part'] = 'notification';
      } else if ($view_type == 'introduce') {
        $this->page_data['part'] = 'introduce';
      } else if ($view_type == 'faq') {
        $this->page_data['part'] = 'faq';
      } else if ($view_type == 'customer') {
        $this->page_data['part'] = 'customer_center';
      } else if ($view_type == 'wish') {
        $this->page_data['part'] = 'shop_wishlist';
      } else if ($view_type == 'order') {
        $this->page_data['part'] = 'shop_orderlist';
      } else if ($view_type == 'coupon') {
        $this->page_data['part'] = 'coupon_box';
      } else {
        $this->page_data['part'] = 'info';
      }
      
      $user_data = json_decode($this->session->userdata('user_data'));
      $this->page_data['user_data'] = $user_data;
      $this->page_data['page_name'] = "user";
      $this->page_data['asset_page'] = "user_profile";
      $this->page_data['page_title'] = "my_profile";
      $this->load->view('front/index', $this->page_data);
    }

  }
  
  public function find($para1 = '', $para2 = '', $para3 = '')
  {
    $view = $para1;
    
    if ($view == 'class') {
      
      $type = $para2;
      
      if ($type == 'list') {
        
        if (!isset($_GET['page']) || !isset($_GET['filter'])) {
          echo "<script>alert('잘못된 접근입니다')</script>";
          exit;
        }
        
        $page = $_GET['page'];
        $filter = $_GET['filter'];
        $limit = 10;
        $offset = 10 * ($page - 1);

//        echo "<script>alert('{$page}, {$limit}, {$offset}')</script>";
        
        if ($filter == 'ALL') {
          $this->db->where('activate', 1);
          $video_data = $this->db->order_by('video_id', 'desc')->get('teacher_video', $limit, $offset)->result();
        } else {
          $query = <<<QUERU
select a.* from teacher_video a, teacher_video_category b
where a.video_id=b.video_id and a.activate=1 and b.category='{$filter}'
order by video_id desc limit {$offset},{$limit}
QUERU;
          $video_data = $this->db->query($query)->result();

//          $this->db->order_by('video_id', 'desc');
//          $video_list = $this->db->get_where('teacher_video_category', array('category' => $filter), $limit, $offset)->result();

//          $video_data = array();
//          if (!empty($video_list) && count($video_list) > 0) {
//            $video_id_list = array();
//            foreach ($video_list as $video) {
//              $video_id_list[] = $video->video_id;
//            }
//            $this->db->where_in('video_id', $video_id_list);
//            $video_data = $this->db->order_by('video_id', 'desc')->get('teacher_video')->result();
//          }
        }
        
        $this->page_data['video_data'] = $video_data;
        $this->load->view('front/find/class/list', $this->page_data);
        
      } else {
        
        $bookmarks = array();
        if ($this->is_login()) {
          $user_id = $this->session->userdata('user_id');
          $bookmarks = $this->db->get_where('bookmark_teacher', array('user_id' => $user_id))->result();
          if (!empty($bookmarks) && count($bookmarks) > 0) {
            $teacher_ids = array();
            foreach ($bookmarks as $t) {
              $teacher_ids[] = $t->teacher_id;
            }
            $this->db->where('activate', 1);
            $this->db->where_in('teacher_id', $teacher_ids);
            $bookmarks = $this->db->get('teacher')->result();
          }
        }
        
        $video_data = $this->db->order_by('video_id', 'desc')->get('teacher_video', 10, 0)->result();
        
        $this->page_data['video_data'] = $video_data;
        $this->page_data['bookmarks'] = $bookmarks;
        $this->page_data['page_name'] = "find/class";
        $this->page_data['asset_page'] = "class";
        $this->page_data['page_title'] = "class";
        $this->load->view('front/index', $this->page_data);
        
      }
      
    } else if ($view == 'center') {
  
      $type = $para2;
      if ($type == 'list') {
        
        $center_type = $para3;
  
        if (!isset($_GET['page']) || !isset($_GET['filter'])) {
          echo "<script>alert('잘못된 접근입니다')</script>";
          exit;
        }
        
        $page = $_GET['page'];
        $filter = $_GET['filter'];
        $limit = 10;
        $offset = 10 * ($page - 1);
        
        $bookmark_ids = array(0);
        if ($this->is_login()) {
          $user_id = $this->session->userdata('user_id');
          $bookmarks = $this->db->get_where('bookmark_center', array('user_id' => $user_id))->result();
          if (!empty($bookmarks) && count($bookmarks) > 0) {
            foreach ($bookmarks as $b) {
              $bookmark_ids[] = $b->center_id;
            }
          }
        }
        
        $bookmark_ids = implode(',', $bookmark_ids);
        if ($filter == 'ALL') {
          $query = <<<QUERY
select distinct(center_id) from center_category where type={$center_type} and activate=1
and center_id not in ({$bookmark_ids})
order by center_id desc limit {$offset},{$limit}
QUERY;
          $center_list = $this->db->query($query)->result();
          
        } else {
//          $this->db->order_by('center_id', 'desc');
//          $center_list = $this->db->get_where('center_category', array('type' => $center_type, 'category' => $filter), $limit, $offset)->result();
          $query = <<<QUERY
select distinct(center_id) from center_category where type={$center_type} and activate=1 and category='{$filter}'
and center_id not in ({$bookmark_ids})
order by center_id desc limit {$offset},{$limit}
QUERY;
          $center_list = $this->db->query($query)->result();
        }

//        echo "<li>{$query}</li>";
//        exit;
        
        $center_data = $this->get_center_data($center_list);
        
        $this->page_data['center_data'] = $center_data;
        $this->load->view('front/find/center/list', $this->page_data);
        
      } else {
  
        $center_type = $para2;
        
        $limit = 10;
        $offset = 0;

//        $this->db->distinct('center_id');
//        $this->db->order_by('center_id', 'desc');
//        $center_list = $this->db->get_where('center_category', array('type' => $center_type), $limit, $offset)->result();
        
        $bookmarks = array();
//        $bookmark_ids = array(0);
        if ($this->is_login()) {
          $user_id = $this->session->userdata('user_id');
          $bookmarks = $this->db->get_where('bookmark_center', array('user_id' => $user_id))->result();
          if (!empty($bookmarks) && count($bookmarks) > 0) {
            $center_ids = array();
            foreach ($bookmarks as $b) {
              $center_ids[] = $b->center_id;
            }
            $this->db->where('activate', 1);
            $this->db->where_in('center_id', $center_ids);
            $bookmarks = $this->db->get('center')->result();
//            $bookmark_ids = $center_ids;
          }
        }

//        $bookmark_ids = implode(',', $bookmark_ids);
//        $query = <<<QUERY
//select distinct(center_id) from center_category where type={$center_type} and activate=1
//and center_id not in ({$bookmark_ids})
//order by center_id desc limit {$offset},{$limit}
//QUERY;
//
//        $center_list = $this->db->query($query)->result();
//        $center_data = $this->get_center_data($center_list);
        
        $where = array('type' => $center_type, 'activate' => 1);
        $categories = $this->db->order_by('category_id', 'asc')->get_where('category_center', $where)->result();
        
        $this->page_data['page_name'] = "find/center";
        $this->page_data['asset_page'] = "center";
        $this->page_data['page_title'] = $center_type == CENTER_TYPE_YOGA ? "YOGA" : "PILATES";
//        $this->page_data['center_data'] = $center_data;
        $this->page_data['categories'] = $categories;
        $this->page_data['center_type'] = $center_type;
        $this->page_data['bookmarks'] = $bookmarks;
        $this->load->view('front/index', $this->page_data);
        
      }
      
    } else if ($view == 'search') {
      
      $type = $para2;
      
      if ($type == 'list') {
        
        if (!isset($_GET['q'])) {
          $base_url = base_url();
          echo "<script>alert('잘못된 접근입니다');location.href='{$base_url}'</script>";
          exit;
        }
        
        $q = $_GET['q'];
        
        $page = $_GET['page'];
        $type = $_GET['type'];
        $limit = 10;
        $offset = 10 * ($page - 1);
        
        $ids = array();
        if ($this->is_login()) {
          $user_id = $this->session->userdata('user_id');
          if ($type == FIND_TYPE_CENTER) {
            
            $query = <<<QUERY
select center_id from bookmark_center where user_id={$user_id}
QUERY;
            
            $bookmarks = $this->db->query($query)->result();
            foreach ($bookmarks as $c) {
              $ids[] = $c->center_id;
            }
            
          } else if ($type == FIND_TYPE_TEACHER) {
            
            $query = <<<QUERY
select teacher_id from bookmark_teacher where user_id={$user_id}
QUERY;
            
            $bookmarks = $this->db->query($query)->result();
            foreach ($bookmarks as $t) {
              $ids[] = $t->teacher_id;
            }
            
          } else {
            $base_url = base_url();
            echo "<script>alert('잘못된 접근입니다');location.href='{$base_url}'</script>";
            exit;
          }
          
          
        }
        
        if ($type == FIND_TYPE_CENTER) {
          
          $query = <<<QUERY
select * from center where title like '%{$q}%' order by center_id desc limit {$offset},{$limit}
QUERY;
          
          $center_data = $this->db->query($query)->result();
          foreach ($center_data as $center) {
            if (in_array($center->center_id, $ids)) {
              $center->bookmark = true;
            } else {
              $center->bookmark = false;
            }
          }
          
          $this->page_data['center_data'] = $center_data;
          
        } else if ($type == FIND_TYPE_TEACHER) {
          
          $query = <<<QUERY
select * from teacher where name like '%{$q}%' order by teacher_id desc limit {$offset},{$limit}
QUERY;
          
          $teacher_data = $this->db->query($query)->result();
          foreach ($teacher_data as $teacher) {
            if (in_array($teacher->teacher_id, $ids)) {
              $teacher->bookmark = true;
            } else {
              $teacher->bookmark = false;
            }
          }
          
          $this->page_data['teacher_data'] = $teacher_data;
          
        } else {
          $base_url = base_url();
          echo "<script>alert('잘못된 접근입니다');location.href='{$base_url}'</script>";
          exit;
        }
        
        $this->page_data['type'] = $type;
        $this->load->view('front/find/search/list', $this->page_data);
        
      } else {
        
        if (!isset($_GET['q'])) {
          $base_url = base_url();
          echo "<script>alert('잘못된 접근입니다');location.href='{$base_url}'</script>";
          exit;
        }
        
        $q = $_GET['q'];
        
        $query = <<<QUERY
select count(*) as cnt from center where title like '%{$q}%'
QUERY;
        $center_cnt = $this->db->query($query)->row()->cnt;
        
        $query = <<<QUERY
select count(*) as cnt from teacher where name like '%{$q}%'
QUERY;
        $teacher_cnt = $this->db->query($query)->row()->cnt;
        
        $this->page_data['page_name'] = "find/search";
        $this->page_data['asset_page'] = "find";
        $this->page_data['page_title'] = "find";
        $this->page_data['q'] = $q;
        $this->page_data['center_cnt'] = $center_cnt;
        $this->page_data['teacher_cnt'] = $teacher_cnt;
        $this->load->view('front/index', $this->page_data);
      }
      
    } else {
      
      $this->page_data['page_name'] = "find";
      $this->page_data['asset_page'] = "find";
      $this->page_data['page_title'] = "find";
      $this->load->view('front/index', $this->page_data);
      
    }
  }
  
  public function center($para1 = "", $para2 = "", $para3 = "")
  {
    $base_url = base_url();

    if ($para1 == "profile") {

      $center_id = $para2;

      $nav = null;
      if (isset($_GET['nav'])) {
        $nav = $_GET['nav'];
      }

      $center_data = $this->db->get_where('center', array('center_id' => $center_id))->row();
      if ($center_data->activate == 0) {
        echo ("<script>alert('승인 대기 중입니다'); window.location.href='{$base_url}home/user'</script>");
        exit;
      }

      $user_data = $this->db->get_where('user', array('user_id' => $center_data->user_id))->row();
//      $user_data = json_decode($this->session->userdata('user_data'));
      if (!($user_data->user_type & USER_TYPE_CENTER)) {
        echo ("<script>alert('센터회원이 아닙니다'); window.location.href='{$base_url}home/user'</script>");
        exit;
      }

//      if ($user_data->user_id == $this->session->userdata('user_id')) {
//        $iam_this_center = true;
//      } else {
//        $iam_this_center = false;
//      }

      if ($center_data->teacher_cnt > 0) {
        $teacher_data = $this->db->get_where('center_teacher', array('center_id' => $center_data->center_id,'activate' => 1))->result();
      } else {
        $teacher_data = null;
      }

      $start_time = time();
      $end_time = strtotime("+90 day");
      $start_date = date("Y-m-d", $start_time);
      $end_date = date("Y-m-d", $end_time);
      $week = date('w', $start_time);

      $query = <<<QUERY
select * from center_schedule
where center_id={$center_data->center_id} and start_date<='{$start_date}' and '{$start_date}'<=end_date order by start_time asc
QUERY;
      $schedules = $this->db->query($query)->result();

      $schedule_data = array();
      $w = "weekly_" . $week;
      foreach ($schedules as $schedule) {
        if ($schedule->{$w} == 1 or $schedule->weekly_none == 1) {
          $schedule_data[] = $schedule;
        }
      }

      $liked = false;
      $bookmarked = false;
      if ($this->is_login() == true) {
        $session_user_id = $this->session->userdata('user_id');
        $liked = $this->crud_model->get_sns_mark('center', 'like', $session_user_id, $center_data->center_id);
        $bookmarked = $this->crud_model->get_sns_mark('center', 'bookmark', $session_user_id, $center_data->center_id);
      }

      $this->page_data['page_name'] = "center/profile";
      $this->page_data['asset_page'] = "center_profile";
      $this->page_data['page_title'] = "center_profile";
      $this->page_data['user_data'] = $user_data;
      $this->page_data['center_data'] = $center_data;
      $this->page_data['teacher_data'] = $teacher_data;
      $this->page_data['start_date'] = $start_date;
      $this->page_data['end_date'] = $end_date;
      $this->page_data['schedule_data'] = $schedule_data;
//      $this->page_data['iam_this_center'] = $iam_this_center;
      $this->page_data['liked'] = $liked;
      $this->page_data['bookmarked'] = $bookmarked;
      $this->page_data['nav'] = $nav;
      $this->load->view('front/index', $this->page_data);

    } else if ($para1 == 'edit_profile') {

      $center_id = $para2;

      $center_data = $this->db->get_where('center', array('center_id' => $center_id))->row();
      if ($center_data->activate == 0) {
        echo ("<script>alert('승인 대기 중입니다'); window.location.href='{$base_url}home'</script>");
        exit;
      }

      $user_data = $this->db->get_where('user', array('user_id' => $center_data->user_id))->row();
      if (!($user_data->user_type & USER_TYPE_CENTER)) {
        echo ("<script>alert('센터회원이 아닙니다'); window.location.href='{$base_url}home'</script>");
        exit;
      }

      if ($user_data->user_id != $this->session->userdata('user_id')) {
        echo ("<script>alert('권한이 없습니다.'); window.location.href='{$base_url}home'</script>");
        exit;
      }

      $category_yoga_data = array();
      $categories = $this->db->get_where('center_category', array('center_id' => $center_id, 'type' => CENTER_TYPE_YOGA))->result();
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
      $categories = $this->db->get_where('center_category', array('center_id' => $center_id, 'type' => CENTER_TYPE_PILATES))->result();
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

      $this->page_data['page_name'] = "center/profile/edit";
      $this->page_data['asset_page'] = "center_profile_edit";
      $this->page_data['page_title'] = "center_profile_edit";
      $this->page_data['user_data'] = $user_data;
      $this->page_data['center_data'] = $center_data;
      $this->page_data['category_yoga_data'] = $category_yoga_data;
      $this->page_data['category_yoga_etc'] = $category_yoga_etc;
      $this->page_data['category_pilates_data'] = $category_pilates_data;
      $this->page_data['category_pilates_etc'] = $category_pilates_etc;
      $this->load->view('front/index', $this->page_data);

    } else if ($para1 == 'do_edit_profile') {

      $center_id = $para2;

      $center_data = $this->db->get_where('center', array('center_id' => $center_id))->row();
      if (empty($center_data)) {
        echo ("<script>alert('센터회원이 아닙니다');</script>");
        exit;
      }

      $user_data = $this->db->get_where('user', array('user_id' => $center_data->user_id))->row();
      if (!($user_data->user_type & USER_TYPE_CENTER)) {
        echo ("<script>alert('센터회원이 아닙니다');</script>");
        exit;
      }

      if ($user_data->user_id != $this->session->userdata('user_id')) {
        echo ("<script>alert('권한이 없습니다.');</script>");
        exit;
      }

      if ($center_data->activate == 0) {
        echo ("<script>alert('승인 대기 중입니다');</script>");
        exit;
      }

      $this->load->library('form_validation');
      $this->form_validation->set_rules('title', 'center-title', 'trim|required|max_length[32]');
      $this->form_validation->set_rules('phone', 'center-phone', 'trim|required|numeric|max_length[16]');
      $this->form_validation->set_rules('about', 'about', 'trim|required|max_length[64]');
      $this->form_validation->set_rules('address', 'center-address', 'trim|required|max_length[256]');
      $this->form_validation->set_rules('address-detail', 'center-address-detail', 'trim|max_length[256]');
      $this->form_validation->set_rules('latitude', 'center-latitude', 'trim|required|max_length[32]');
      $this->form_validation->set_rules('longitude', 'center-longitude', 'trim|required|max_length[32]');

      if ($this->form_validation->run() == FALSE) {
        echo '<br>' . validation_errors();
      } else {
        $title = $this->input->post('title');
        $phone = $this->input->post('phone');
        $about = $this->input->post('about');
        $address = $this->input->post('address');
        $address_detail = $this->input->post('address-detail');
        $longitude = $this->input->post('longitude');
        $latitude = $this->input->post('latitude');
        $categories_yoga = $this->input->post('category_yoga');
        $categories_pilates = $this->input->post('category_pilates');
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
          'title' => $title,
          'phone' => $phone,
          'about' => $about,
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
    
    } else if ($para1 == 'teacher') {

      $action = $para2;

      if ($action == 'search') {

        $search_email = $_GET['email'];

        $user_data = $this->db->get_where('user', array('email' => $search_email))->row();
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
          $result['message'] = "해당 강사는 활동 중이 아닙니다.(code:{$teacher_data->activate})";
          echo json_encode($result);
          exit;
        }

        $result['status'] = 'success';
        $result['teacher_name'] = $teacher_data->name;
        $result['teacher_email'] = $user_data->email;
        $result['teacher_id'] = $teacher_data->teacher_id;

        echo json_encode($result);
        exit;

      } else if ($action == 'modify') {

        $center_id = $para3;

        $center_data = $this->db->get_where('center', array('center_id' => $center_id))->row();
        if ($center_data->activate == 0) {
          echo ("<script>alert('승인 대기 중입니다'); window.location.href='{$base_url}home/user'</script>");
          exit;
        }

        $user_data = $this->db->get_where('user', array('user_id' => $center_data->user_id))->row();
        if (!($user_data->user_type & USER_TYPE_CENTER)) {
          echo ("<script>alert('센터회원이 아닙니다'); window.location.href='{$base_url}home/user'</script>");
          exit;
        }

        if ($user_data->user_id != $this->session->userdata('user_id')) {
          echo("<script>alert('권한이 없습니다'); window.location.href='{$base_url}home/user'</script>");
          exit;
        }

        $add_list = $this->input->post('add_list');
        $remove_list = $this->input->post('remove_list');

        if (!empty($add_list) && count($add_list) > 0) {
          foreach ($add_list as $teacher_id) {
            $ins = array(
              'center_id' => $center_data->center_id,
              'teacher_id' => $teacher_id,
            );
            $this->db->insert('center_teacher', $ins);
          }
        }

        if (!empty($remove_list) && count($remove_list) > 0) {
          foreach ($remove_list as $teacher_id) {
            $del = array(
              'center_id' => $center_data->center_id,
              'teacher_id' => $teacher_id,
            );
            $this->db->where($del);
            $this->db->delete('center_teacher');
          }
        }

        $query = <<<QUERY
select count(*) as teacher_cnt from center_teacher where center_id={$center_data->center_id}
QUERY;
        $row = $this->db->query($query)->row();
        $teacher_cnt = $row->teacher_cnt;

        $upd = array(
          'teacher_cnt' => $teacher_cnt
        );

        $this->db->where(array('center_id' => $center_data->center_id));
        $this->db->update('center', $upd);

//        echo ("<script>alert('수정되었습니다'); window.location.href='{$base_url}home/center/profile/{$center_user_id}'</script>");

        echo 'done';
        exit;

      } else {

        $center_id = $para2;

        $center_data = $this->db->get_where('center', array('center_id' => $center_id))->row();
        if ($center_data->activate == 0) {
          echo ("<script>alert('승인 대기 중입니다'); window.location.href='{$base_url}home/user'</script>");
          exit;
        }

        $user_data = $this->db->get_where('user', array('user_id' => $center_data->user_id))->row();
        if (!($user_data->user_type & USER_TYPE_CENTER)) {
          echo ("<script>alert('센터회원이 아닙니다'); window.location.href='{$base_url}home/user'</script>");
          exit;
        }

        if ($user_data->user_id != $this->session->userdata('user_id')) {
          echo ("<script>alert('권한이 없습니다'); window.location.href='{$base_url}home/user'</script>");
          exit;
        }

        if ($center_data->teacher_cnt > 0) {
          $teacher_data = $this->db->get_where('center_teacher', array('center_id' => $center_data->center_id))->result();
        } else {
          $teacher_data = null;
        }

        $this->page_data['page_name'] = "center/teacher";
        $this->page_data['asset_page'] = "center_teacher_info";
        $this->page_data['page_title'] = "center_teacher_info";
        $this->page_data['user_data'] = $user_data;
        $this->page_data['center_data'] = $center_data;
        $this->page_data['teacher_data'] = $teacher_data;
        $this->load->view('front/index', $this->page_data);

      }
  
    } else if ($para1 == 'schedule') {
  
      $type = $para2;
  
      if ($type == 'mod') {
    
        $center_id = $_GET['cid'];
        $schedule_id = $_GET['sid'];
    
        $center_data = $this->db->get_where('center', array('center_id' => $center_id))->row();
        if ($center_data->activate == 0) {
          echo("<script>alert('승인 대기 중입니다'); window.location.href='{$base_url}home/user'</script>");
          exit;
        }
    
        $user_data = $this->db->get_where('user', array('user_id' => $center_data->user_id))->row();
        if (!($user_data->user_type & USER_TYPE_CENTER)) {
          echo("<script>alert('센터회원이 아닙니다'); window.location.href='{$base_url}home/user'</script>");
          exit;
        }
    
        if ($user_data->user_id != $this->session->userdata('user_id')) {
          echo("<script>alert('권한이 없습니다'); window.location.href='{$base_url}home/user'</script>");
          exit;
        }
    
        $schedule_data = new stdClass();
        if ($schedule_id > 0) {
          $schedule_data = $this->db->get_where('center_schedule', array('schedule_id' => $schedule_id))->row();
        } else {
          $start_time = strtotime('1 hour');
          $end_time = strtotime('2 hour');
          $schedule_data->schedule_id = 0;
          $schedule_data->start_date = date('Y-m-d', $start_time);
          $schedule_data->end_date = date('Y-m-d', $end_time);
          $schedule_data->start_time = date('H', $start_time) . ':00';
          $schedule_data->end_time = date('H', $end_time) . ':00';
          $schedule_data->title = '';
          $schedule_data->teacher_id = 0;
          $schedule_data->teacher_name = '';
          $schedule_data->weekly_0 = 0;
          $schedule_data->weekly_1 = 0;
          $schedule_data->weekly_2 = 0;
          $schedule_data->weekly_3 = 0;
          $schedule_data->weekly_4 = 0;
          $schedule_data->weekly_5 = 0;
          $schedule_data->weekly_6 = 0;
          $schedule_data->weekly_none = 1;
        }
    
        $teacher_data = array();
        $teachers = $this->db->get_where('center_teacher', array('center_id' => $center_data->center_id))->result();
        foreach ($teachers as $teacher) {
          $teacher_data[] = $this->db->get_where('teacher', array('teacher_id' => $teacher->teacher_id))->row();
        }
    
        $this->page_data['page_name'] = "center/schedule/mod";
        $this->page_data['asset_page'] = "center_schedule_mod";
        $this->page_data['page_title'] = "center_schedule_mod";
        $this->page_data['user_data'] = $user_data;
        $this->page_data['center_data'] = $center_data;
        $this->page_data['schedule_data'] = $schedule_data;
        $this->page_data['teacher_data'] = $teacher_data;
        $this->load->view('front/index', $this->page_data);
    
      } else if ($type == 'do_mod') {
    
        $center_id = $_GET['cid'];
        $schedule_id = $_GET['sid'];
    
        $center_data = $this->db->get_where('center', array('center_id' => $center_id))->row();
        if ($center_data->activate == 0) {
          echo("<script>alert('승인 대기 중입니다'); window.location.href='{$base_url}home/user'</script>");
          exit;
        }
    
        $user_data = $this->db->get_where('user', array('user_id' => $center_data->user_id))->row();
        if (!($user_data->user_type & USER_TYPE_CENTER)) {
          echo("<script>alert('센터회원이 아닙니다'); window.location.href='{$base_url}home/user'</script>");
          exit;
        }
    
        if ($user_data->user_id != $this->session->userdata('user_id')) {
          echo("<script>alert('권한이 없습니다'); window.location.href='{$base_url}home/user'</script>");
          exit;
        }
    
        echo("<script>alert('1');</script>");
    
        $schedule_del = $this->input->post('schedule_del');
        if (empty($schedule_del) or $schedule_del == 0) {
      
          $this->load->library('form_validation');
      
          $this->form_validation->set_rules('start_date', 'start_date', 'required');
          $this->form_validation->set_rules('end_date', 'end_date', 'required');
          $this->form_validation->set_rules('start_time', 'start_time', 'required');
          $this->form_validation->set_rules('end_time', 'end_time', 'required');
          $this->form_validation->set_rules('schedule_title', 'schedule_title', 'trim|required|max_length[32]');
      
          if ($this->form_validation->run() == FALSE) {
            echo '<br>' . validation_errors();
            exit;
          } else {
        
            $start_date = $this->input->post('start_date');
            $end_date = $this->input->post('end_date');
            $start_time = $this->input->post('start_time');
            $end_time = $this->input->post('end_time');
            $title = $this->input->post('schedule_title');
            $weeklys = $this->input->post('weeklys');
            $teacher_id = $this->input->post('teacher_id');
            $teacher_name = $this->input->post('teacher_name');
        
            if ($teacher_id == 0) {
              echo("<script>alert('강사를 선택해 주세요');</script>");
              exit;
            }
        
            if ($teacher_id == -1) {
              if (empty($teacher_name) || strlen($teacher_name) == 0) {
                echo("<script>alert('강사이름을 입력해 주세요 {$teacher_name}');</script>");
                exit;
              }
            } else {
              $teacher = $this->db->get_where('teacher', array('teacher_id' => $teacher_id))->row();
              if (empty($teacher)) {
                echo("<script>alert('강사가 존재하지 않습니다');</script>");
                exit;
              }
              $teacher_name = $teacher->name;
            }
        
            $weekly = array(0, 0, 0, 0, 0, 0, 0);
            if (empty($weeklys) || count($weeklys) == 0) {
          
              $weekly_none = 1;
          
              $data = array(
                'center_id' => $center_data->center_id,
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
                'title' => $title,
                'teacher_id' => $teacher_id,
                'teacher_name' => $teacher_name
              );
            } else {
          
              foreach ($weeklys as $w) {
                $w = (int)$w;
                $weekly[$w] = 1;
              }
          
              $weekly_none = 0;
          
              $data = array(
                'center_id' => $center_data->center_id,
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
                'title' => $title,
                'teacher_id' => $teacher_id,
                'teacher_name' => $teacher_name
              );
            }
          }
        }
    
        if (isset($schedule_del) && $schedule_del == 1) {
          $this->db->where(array('schedule_id' => $schedule_id));
          $this->db->delete('center_schedule');
        } else if ($schedule_id > 0) {
          $this->db->where(array('schedule_id' => $schedule_id));
          $this->db->update('center_schedule', $data);
        } else {
          $this->db->insert('center_schedule', $data);
        }
    
        echo 'done';
    
      } else if ($type == 'info') {
    
        $center_id = $_GET['cid'];
        $date = $_GET['date'];
    
        $center_data = $this->db->get_where('center', array('center_id' => $center_id))->row();
        if ($center_data->activate == 0) {
          echo("<script>alert('승인 대기 중입니다');'</script>");
          exit;
        }
    
        $center_user_data = $this->db->get_where('user', array('user_id' => $center_data->user_id))->row();
        if (!($center_user_data->user_type & USER_TYPE_CENTER)) {
          echo("<script>alert('센터회원이 아닙니다');'</script>");
          exit;
        }
    
        $query = <<<QUERY
select * from center_schedule_info
where center_id={$center_data->center_id} and schedule_date='{$date}' and activate=1
order by start_time asc
QUERY;
        $schedules = $this->db->query($query)->result();
    
        $now = time();
        foreach ($schedules as $schedule) {
          if ($schedule->reservable == false) {
            continue;
          }
          if (strtotime($schedule->reserve_open_at) <= $now && $now <= strtotime($schedule->reserve_close_at)) {
            // 예약가능
          } else {
            // 예약불가
            $schedule->reservable = false;
          }
          $schedule->reserve_info = null;
          if ($this->is_login()) {
            $user_id = $this->session->userdata('user_id');
            $query = <<<QUERY
select * from center_schedule_reserve
where user_id={$user_id} and schedule_info_id={$schedule->schedule_info_id} and (reserve=1 or wait=1)
QUERY;
            $reserve_info = $this->db->query($query)->row();
            if (empty($reserve_info) == false) {
              if ($reserve_info->wait == 1) { // 대기중
                $query = <<<QUERY
select count(*) as cnt from center_schedule_reserve
where schedule_info_id={$schedule->schedule_info_id} and wait=1 and  reserve_id<={$reserve_info->reserve_id}
QUERY;
                $reserve_info->wait_cnt = $this->db->query($query)->row()->cnt;
              }
              $schedule->reserve_info = $reserve_info;
            }
          }
        }
    
        $this->page_data['schedules'] = $schedules;
        $this->page_data['center_data'] = $center_data;
        $this->load->view('front/center/schedule/info/index', $this->page_data);
    
      } else if ($type == 'reserve') {
    
        if ($para3 == 'info') {
  
          if ($this->is_login() == false) {
            $this->response('fail', '클래스 예약은 로그인이 필요합니다!');
          }
          
          if (isset($_POST['id']) == false) {
            $this->response('fail', '비정상적인 접근입니다!');
          }
  
          $user_id = $this->session->userdata('user_id');
          $schedule_info_id = $this->input->post('id');
  
          $schedule_info = $this->center_model->get_schedule_info($schedule_info_id);
          if ($schedule_info->activate == false) {
            $this->response('fail', '삭제된 클래스입니다!');
          }
          
          if ($schedule_info->reservable == false) {
            $this->response('fail', '예약이 오픈되지 않았습니다!');
          }
          
          $now = time();
          $start = strtotime($schedule_info->schedule_date . ' ' . $schedule_info->start_time);
          $end = strtotime($schedule_info->schedule_date . ' ' . $schedule_info->end_time);
          if ($start <= $now && $now <= $end) {
            $this->response('fail', '클래스가 진행중입니다!');
          }
  
          $reserve_open_time = strtotime($schedule_info->reserve_open_at);
          $reserve_close_time = strtotime($schedule_info->reserve_close_at);
          if ($now < $reserve_open_time) {
            $this->response('fail', '예약이 오픈되지 않았습니다!');
          }
          if ($now > $reserve_close_time) {
            $this->response('fail', '예약이 마감되었습니다!');
          }
          
          $query = <<<QUERY
select * from center_ticket_member
where center_id={$schedule_info->center_id} and user_id={$user_id} and refund=0 and deleted=0
and enable_start_at<='{$schedule_info->schedule_date}' and '{$schedule_info->schedule_date}'<=enable_end_at
QUERY;
          $user_tickets = $this->db->query($query)->result();
          if (empty($user_tickets) == true) {
            $this->response('fail', '예약 가능한 티켓이 없습니다!');
          }
  
          $available_ticket_ids = json_decode($schedule_info->tickets);
          foreach ($user_tickets as $ticket) {
            if (in_array($ticket->ticket_id, $available_ticket_ids) == false) {
              continue;
            }
            $user_available_tickets[] = $ticket;
          }
  
          if (empty($user_available_tickets) == true) {
            $this->response('fail', '예약 가능한 티켓이 없습니다!');
          }
  
          $this->page_data['class'] = $schedule_info;
          $this->page_data['tickets'] = $user_available_tickets;
          $this->load->view('front/center/schedule/reserve_popup', $this->page_data);
          
        } else if ($para3 == 'do') {
  
          if ($this->is_login() == false) {
            $this->response('fail', '클래스 예약은 로그인이 필요합니다!');
          }
  
          if (isset($_POST['id']) == false || isset($_POST['mid']) == false) {
            $this->response('fail', '비정상적인 접근입니다!');
          }
  
          $user_id = $this->session->userdata('user_id');
          $schedule_info_id = $this->input->post('id');
          $member_id = $this->input->post('mid');
      
          $query = <<<QUERY
select * from center_schedule_reserve where schedule_info_id={$schedule_info_id} and user_id={$user_id}
and (wait=1 or reserve=1)
QUERY;
          $reserve_info = $this->db->query($query)->row();
          if (empty($reserve_info) == false) {
            if ($reserve_info->reserve == 1) {
              $status = '예약완료';
            } else if ($reserve_info->wait == 1) {
              $status = '예약대기';
            } else {
              $status = '오류'; // unreachable
            }
            $this->response('fail', '이미 신청된 클래스입니다!<상태:' . $status . '>');
          }
  
          $result = $this->center_model->lock_schedule_info($schedule_info_id);
          if (empty($result) == true || $result == false) {
            $this->response('fail', '클래스 예약 요청이 많습니다! 잠시 후 다시 시도해주세요!');
          }
  
          $schedule_info = $this->center_model->get_schedule_info($schedule_info_id);
          if ($schedule_info->activate == false) {
            $this->center_model->unlock_schedule_info($schedule_info_id);
            $this->response('fail', '삭제된 클래스입니다!');
          }
          
          $center_info = $this->db->get_where('center', array('center_id' => $schedule_info->center_id))->row();
          if (empty($center_info) == true || $center_info->activate == 0) {
            $this->center_model->unlock_schedule_info($schedule_info_id);
            $this->response('fail', '센터가 오픈되지 않았습니다!');
          }
          
          if ($schedule_info->reservable == false) {
            $this->center_model->unlock_schedule_info($schedule_info_id);
            $this->response('fail', '예약이 오픈되지 않았습니다!');
          }
      
          $now = time();
          $start = strtotime($schedule_info->schedule_date . ' ' . $schedule_info->start_time);
          $end = strtotime($schedule_info->schedule_date . ' ' . $schedule_info->end_time);
          if ($start <= $now && $now <= $end) {
            $this->center_model->unlock_schedule_info($schedule_info_id);
            $this->response('fail', '클래스가 진행중입니다!');
          }
      
          $reserve_open_time = strtotime($schedule_info->reserve_open_at);
          $reserve_close_time = strtotime($schedule_info->reserve_close_at);
          if ($now < $reserve_open_time) {
            $this->center_model->unlock_schedule_info($schedule_info_id);
            $this->response('fail', '예약이 오픈되지 않았습니다!');
          }
          if ($now > $reserve_close_time) {
            $this->center_model->unlock_schedule_info($schedule_info_id);
            $this->response('fail', '예약이 마감되었습니다!');
          }
      
          $query = <<<QUERY
select count(*) as cnt from center_schedule_reserve
where schedule_info_id={$schedule_info_id} and (reserve=1 or wait=1)
QUERY;
          $reserve_cnt = $this->db->query($query)->row()->cnt;
          $reservable_cnt = $schedule_info->reservable_number;
          if ($schedule_info->waitable) {
            $reservable_cnt += $schedule_info->waitable_number;
          }
          if ($reserve_cnt >= $reservable_cnt) {
            $this->center_model->unlock_schedule_info($schedule_info_id);
            $this->response('fail', '예약/대기 정원이 초과되었습니다!');
          }
      
          $ticket = $this->db->get_where('center_ticket_member', array('member_id' => $member_id))->row();
          if (empty($ticket) == true) {
            $this->center_model->unlock_schedule_info($schedule_info_id);
            $this->response('fail', '수강권이 존재하지 않습니다!');
          }
          if ($ticket->user_id != $user_id) {
            $this->center_model->unlock_schedule_info($schedule_info_id);
            $this->response('fail', '회원 수강권이 아닙니다!');
          }
      
          $schedule_date = $schedule_info->schedule_date . ' ' . $schedule_info->start_time;
          $schedule_time = strtotime($schedule_date);
          $available_ticket_ids = json_decode($schedule_info->tickets);

          if (in_array($ticket->ticket_id, $available_ticket_ids) == false) {
            $this->center_model->unlock_schedule_info($schedule_info_id);
            $this->response('fail', '예약이 불가능한 수강권입니다!');
          }
          // 정지 기간 체크
          if ($ticket->stop > 0 && strtotime($ticket->stop_start_at) <= $schedule_time && $schedule_time <= strtotime($ticket->stop_end_at)) {
            $this->center_model->unlock_schedule_info($schedule_info_id);
            $this->response('fail', '정지중인 수강권입니다!');
          }
          // 정액권 횟수 체크
          if ($ticket->ticket_type == CENTER_TICKET_TYPE_COUNT &&
            ($ticket->reservable_count - ($ticket->reserve + $ticket->wait)) <= 0) {
            $this->center_model->unlock_schedule_info($schedule_info_id);
            $this->response('fail', '예약 가능한 횟수를 초과한 수강권입니다!');
          }
          // 하루 예약 가능한 수업 횟수 체크
          $start_date = $schedule_info->schedule_date . ' 00:00:00';
          $end_date = $schedule_info->schedule_date . ' 23:59:59';
          $query = <<<QUERY
select count(*) as cnt from center_schedule_reserve
where user_id={$user_id} and ticket_id={$ticket->ticket_id} and (reserve=1 or wait=1)
and '{$start_date}'<= schedule_at and  schedule_at<='{$end_date}'
QUERY;
          $oneday_reserve_count = $this->db->query($query)->row()->cnt;
          if ($ticket->reservable_count_oneday <= $oneday_reserve_count) {
            $this->center_model->unlock_schedule_info($schedule_info_id);
            $this->response('fail', '1일 '.$ticket->reservable_count_oneday.'회의 클래스 예약이 가능한 수강권입니다!');
          }
          
          $action = CENTER_TICKET_MEMBER_ACTION_RESERVE_FAIL;
          
          // 현재 정원 체크
          $reserve_cnt = $this->center_model->get_schedule_reserve_cnt($schedule_info_id);
          if ($reserve_cnt < $schedule_info->reservable_number) {
            $action = CENTER_TICKET_MEMBER_ACTION_RESERVE;
          } else if ($schedule_info->waitable) {
            // 대기 인원 체크
            $wait_cnt = $this->center_model->get_schedule_wait_cnt($schedule_info_id);
            if ($wait_cnt < $schedule_info->waitable_number) {
              $action = CENTER_TICKET_MEMBER_ACTION_RESERVE_WAIT;
            }
          }
  
          $reserve = 0;
          $wait = 0;
          $fail = 0;
          if ($action == CENTER_TICKET_MEMBER_ACTION_RESERVE) {
            $reserve = 1;
          } else if ($action == CENTER_TICKET_MEMBER_ACTION_RESERVE_WAIT) {
            $wait = 1;
          } else {
            $fail = 1;
          }
  
          $ins = array(
            'user_id' => $user_id,
            'schedule_info_id' => $schedule_info_id,
            'ticket_id' => $ticket->ticket_id,
            'member_id' => $ticket->member_id,
            'reserve' => $reserve,
            'wait' => $wait,
            'cancel' => 0,
            'fail' => $fail,
            'schedule_at' => $schedule_date,
          );
          $this->db->set('register_at', 'NOW()', false);
          $this->db->set('cancel_at', 'NOW()', false);
          $this->db->insert('center_schedule_reserve', $ins);
          $reserve_id = $this->db->insert_id();
  
          $this->center_model->unlock_schedule_info($schedule_info_id);
  
          if ($reserve_id > 0) {
            $ins = array(
              'member_id' => $ticket->member_id,
              'ticket_id' => $ticket->ticket_id,
              'user_id' => $user_id,
              'schedule_info_id' => $schedule_info_id,
              'reserve_id' => $reserve_id,
              'action' => $action,
              'action_str' => $this->center_model->get_ticket_member_action_str($action),
              'action_duration' => 0,
              'action_data' => '<' . $schedule_info->schedule_title . '>, 일시 : ' . date('Y.m.d', strtotime($schedule_info->schedule_date)),
            );
            $this->db->set('history_at', 'NOW()', false);
            $this->db->insert('center_ticket_member_history', $ins);
 
            if ($reserve) {
              $this->db->set('reserve', 'reserve+1', false);
            } else if ($wait) {
              $this->db->set('wait', 'wait+1', false);
            } else {
              $this->db->set('fail', 'fail+1', false);
            }
            $this->db->set('update_at', 'NOW()', false);
            $this->db->update('center_ticket_member', array(), array('member_id' => $ticket->member_id));
  
            if ($action == CENTER_TICKET_MEMBER_ACTION_RESERVE) {
              $user_data = json_decode($this->session->userdata('user_data'));
              $this->mts_model->send_class_reserve($user_data->phone, CENTER_TICKET_MEMBER_ACTION_RESERVE,
                $schedule_info->schedule_title, $schedule_info->schedule_date, $center_info->title,
                $schedule_info->start_time,$schedule_info->end_time);
              $this->response('done', '예약이 완료되었습니다!');
            } else if ($action == CENTER_TICKET_MEMBER_ACTION_RESERVE_WAIT) {
              $user_data = json_decode($this->session->userdata('user_data'));
              $this->mts_model->send_class_reserve($user_data->phone, CENTER_TICKET_MEMBER_ACTION_RESERVE_WAIT,
                $schedule_info->schedule_title, $schedule_info->schedule_date, $center_info->title,
                $schedule_info->start_time,$schedule_info->end_time);
//              $this->mts_model->send_class_wait($user_data->phone, $user_data->username, $schedule_info->schedule_title,
//                date('Y.m.d', strtotime($schedule_info->schedule_date)));
              $this->response('done', '클래스 정원 초과로 인해서 대기자 예약 상태입니다! 추후 정원에 여유가 생길 경우 자동으로 예약됩니다');
            } else {
              $this->response('fail', '클래스 정원 초과로 예약 실패했습니다!');
            }
            
          } else {
            $this->response('fail', '클래스 예약 불가 상태입니다! 잠시 후 다시 시도해주세요!');
          }
    
        } else {
          $this->response('fail', '접근오류!');
        }
  
      } else if ($type == 'cancel') {
  
        if ($para3 == 'info') {
  
          if ($this->is_login() == false) {
            $this->response('fail', '클래스 취소는 로그인이 필요합니다!');
          }
  
          if (isset($_POST['id']) == false) {
            $this->response('fail', '비정상적인 접근입니다!');
          }
  
          $user_id = $this->session->userdata('user_id');
          $schedule_info_id = $this->input->post('id');
  
          $query = <<<QUERY
select * from center_schedule_reserve
where schedule_info_id={$schedule_info_id} and user_id={$user_id} and (reserve=1 or wait=1)
QUERY;
          $reserve_info = $this->db->query($query)->row();
          if (empty($reserve_info) == true) {
            $this->response('fail', '예약 내역이 존재하지 않습니다!');
          }
  
          $schedule_info = $this->center_model->get_schedule_info($schedule_info_id);
          if ($schedule_info->activate == false) {
            $this->response('fail', '삭제된 클래스입니다!');
          }
          
          $now = time();
          $start = strtotime($schedule_info->schedule_date.' '.$schedule_info->start_time);
          $end = strtotime($schedule_info->schedule_date.' '.$schedule_info->end_time);
          if ($start <= $now && $now <= $end) {
            $this->response('fail', '클래스가 진행중입니다!');
          }
  
          $reserve_cancel_open_time = strtotime($schedule_info->reserve_cancel_open_at);
          $reserve_cancel_close_time = strtotime($schedule_info->reserve_cancel_close_at);
          if ($now < $reserve_cancel_open_time) {
            $this->response('fail', '예약취소가 오픈되지 않았습니다!');
          }
          if ($now > $reserve_cancel_close_time) {
            $this->response('fail', '예약취소가 마감되었습니다!');
          }
  
          $this->page_data['class'] = $schedule_info;
          $this->load->view('front/center/schedule/cancel_popup', $this->page_data);
  
        } else if ($para3 == 'do') {
  
          if ($this->is_login() == false) {
            $this->response('fail', '클래스 취소는 로그인이 필요합니다!');
          }
  
          if (isset($_POST['id']) == false) {
            $this->response('fail', '비정상적인 접근입니다!');
          }
  
          $user_id = $this->session->userdata('user_id');
          $schedule_info_id = $this->input->post('id');
  
          $query = <<<QUERY
select * from center_schedule_reserve
where schedule_info_id={$schedule_info_id} and user_id={$user_id} and (reserve=1 or wait=1)
QUERY;
          $reserve_info = $this->db->query($query)->row();
          if (empty($reserve_info) == true) {
            $this->center_model->unlock_schedule_info($schedule_info_id);
            $this->response('fail', '예약 내역이 존재하지 않습니다!');
          }
  
          $lock = $this->center_model->lock_schedule_info($schedule_info_id);
          if (empty($lock) == true || $lock == false) {
            $this->response('fail', '클래스 예약 요청이 많습니다! 잠시 후 다시 시도해주세요!');
          }
  
          $schedule_info = $this->center_model->get_schedule_info($schedule_info_id);
          if ($schedule_info->activate == false) {
            $this->center_model->unlock_schedule_info($schedule_info_id);
            $this->response('fail', '삭제된 클래스입니다!');
          }
  
          $center_info = $this->db->get_where('center', array('center_id' => $schedule_info->center_id))->row();
          if (empty($center_info) == true || $center_info->activate == 0) {
            $this->center_model->unlock_schedule_info($schedule_info_id);
            $this->response('fail', '센터가 오픈되지 않았습니다!');
          }
  
          $now = time();
          $start = strtotime($schedule_info->schedule_date.' '.$schedule_info->start_time);
          $end = strtotime($schedule_info->schedule_date.' '.$schedule_info->end_time);
          if ($start <= $now && $now <= $end) {
            $this->center_model->unlock_schedule_info($schedule_info_id);
            $this->response('fail', '수업이 진행중입니다!');
          }
  
          $reserve_cancel_open_time = strtotime($schedule_info->reserve_cancel_open_at);
          $reserve_cancel_close_time = strtotime($schedule_info->reserve_cancel_close_at);
          if ($now < $reserve_cancel_open_time) {
            $this->center_model->unlock_schedule_info($schedule_info_id);
            $this->response('fail', '예약취소가 오픈되지 않았습니다!');
          }
          if ($now > $reserve_cancel_close_time) {
            $this->center_model->unlock_schedule_info($schedule_info_id);
            $this->response('fail', '예약취소가 마감되었습니다!');
          }
  
          $ticket_info = $this->db->get_where('center_ticket_member', array('member_id' => $reserve_info->member_id))->row();
          if ($ticket_info->limit_cancel_count_enable) {
    
            // 하루 취소 가능한 수업 횟수 체크
            $start_date = $schedule_info->schedule_date.' 00:00:00';
            $end_date = $schedule_info->schedule_date.' 23:59:59';
            $query = <<<QUERY
select count(*) as cnt from center_schedule_reserve
where user_id={$user_id} and ticket_id={$ticket_info->ticket_id} and cancel=1
and '{$start_date}'<= schedule_at and  schedule_at<='{$end_date}'
QUERY;
            $oneday_reserve_cancel_count = $this->db->query($query)->row()->cnt;
            if ($ticket_info->limit_cancel_count_oneday <= $oneday_reserve_cancel_count) {
              $this->center_model->unlock_schedule_info($schedule_info_id);
              $this->response('fail', '1일 취소가능한 횟수를 초과하였습니다!');
            }
    
            // 전체 취소 가능한 수업 횟수 체크
            $query = <<<QUERY
select count(*) as cnt from center_schedule_reserve
where user_id={$user_id} and ticket_id={$ticket_info->ticket_id} and cancel=1
QUERY;
            $total_reserve_cancel_count = $this->db->query($query)->row()->cnt;
            if ($ticket_info->limit_cancel_count_total <= $total_reserve_cancel_count) {
              $this->center_model->unlock_schedule_info($schedule_info_id);
              $this->response('fail', '전체 취소가능한 횟수를 초과하였습니다!');
            }
          }

          $this->center_model->schedule_cancel($reserve_info, $schedule_info->schedule_title, $schedule_info->schedule_date);
          
          if ($schedule_info->waitable) {
            $wait_info = $this->center_model->get_schedule_wait_info_first($schedule_info_id);
            if (isset($wait_info) == true && empty($wait_info) == false) {
              $this->center_model->transfer_wait2reserve($wait_info, $schedule_info->schedule_title, $schedule_info->schedule_date);
            }
          }
  
          $this->center_model->unlock_schedule_info($schedule_info_id);
  
          $user_data = json_decode($this->session->userdata('user_data'));
          $this->mts_model->send_class_reserve($user_data->phone, CENTER_TICKET_MEMBER_ACTION_RESERVE_CANCEL,
            $schedule_info->schedule_title, $schedule_info->schedule_date, $center_info->title,
            $schedule_info->start_time,$schedule_info->end_time);
//          $this->mts_model->send_class_cancel($user_data->phone, $user_data->username, $schedule_info->schedule_title,
//            date('Y.m.d', strtotime($schedule_info->schedule_date)));
          $this->response('done', '취소 신청이 완료되었습니다!');
        
        } else {
          $this->response('fail', '접근오류!');
        }
    
      } else { // unreachable
        $this->error();
      }
  
    } else if ($para1 == 'info') {

      if ($para2 == 'update') {

        $center_id = $para3;

        $center_data = $this->db->get_where('center', array('center_id' => $center_id))->row();
        $user_id = $this->session->userdata('user_id');
        if ($center_data->user_id != $user_id) {
          echo ("<script>alert('권한이 없습니다,$center_id,  $center_data->user_id, $user_id '); window.location.href='{$base_url}home/center/profile/{$center_id}'</script>");
          exit;
        }

        $desc = $this->input->post('description');
        $files = 'center_'.$center_id.'_*.*';
        $this->crud_model->del_upload_image(IMG_WEB_PATH_CENTER, IMG_PATH_CENTER, $desc, $files);

        $upd = array('info' => $desc);
        $where = array('center_id' => $center_id);
        $this->db->update('center', $upd, $where);

        echo 'done';

      //Upload image summernote
      } else if ($para2 == 'upload_image') {

        $center_id = $para3;

        if (isset($_FILES["file"])) {
          $error = $this->crud_model->file_validation($_FILES['file'], false);
          if ($error != UPLOAD_ERR_OK) {
            echo json_encode(array('success' => false, 'error' => $error));
          } else {
            $time = gettimeofday();
            $file_name = 'center_'.$center_id.'_'.$time['sec'].$time['usec'].'.jpg';
            $this->crud_model->upload_image(IMG_PATH_CENTER, $file_name, $_FILES["file"], 400, 0, false, true);
            echo json_encode(array('success' => true, 'filename' => $file_name));
          }
        } else {
          echo json_encode(array('success' => false, 'error' => 4));
        }

      } else if ($para2 == 'delete_image') {

//        $center_id = $para3;

      } else {

        $center_id = $para2;
        $center_data = $this->db->get_where('center', array('center_id' => $center_id))->row();
        if ($center_data->activate == 0) {
          echo ("<script>alert('승인 대기 중입니다'); window.location.href='{$base_url}home/user'</script>");
          exit;
        }

        $user_data = $this->db->get_where('user', array('user_id' => $center_data->user_id))->row();
        if (!($user_data->user_type & USER_TYPE_CENTER)) {
          echo ("<script>alert('센터회원이 아닙니다'); window.location.href='{$base_url}home/user'</script>");
          exit;
        }

        if ($user_data->user_id != $this->session->userdata('user_id')) {
          echo ("<script>alert('권한이 없습니다'); window.location.href='{$base_url}home/user'</script>");
          exit;
        }

        $this->page_data['page_name'] = "center/info";
        $this->page_data['asset_page'] = "center_info";
        $this->page_data['page_title'] = "center_info";
        $this->page_data['user_data'] = $user_data;
        $this->page_data['center_data'] = $center_data;
        $this->load->view('front/index', $this->page_data);
      }

    } else { // unreachable
    }
  }

  public function teacher($para1 = "", $para2 = "", $para3 = "")
  {
    $base_url = base_url();

    if ($para1 == "profile") {

      $teacher_user_id = $para2;

      if ($teacher_user_id == $this->session->userdata('user_id')) {
        $iam_this_teacher = true;
      } else {
        $iam_this_teacher = false;
      }

      $user_data = $this->db->get_where('user', array('user_id' => $teacher_user_id))->row();
//      if (!($user_data->user_type & USER_TYPE_TEACHER)) {
//        echo ("<script>alert('강사회원이 아닙니다'); window.location.href='{$base_url}home/user'</script>");
//        exit;
//      }
//
      $teacher_data = $this->db->get_where('teacher', array('user_id' => $teacher_user_id))->row();
      if ($teacher_data->activate == 0) {
        echo ("<script>alert('승인 대기 중입니다'); window.location.href='{$base_url}home/user'</script>");
        exit;
      }

      $liked = false;
      $bookmarked = false;
      if ($this->is_login() == true) {
        $session_user_id = $this->session->userdata('user_id');
        $liked = $this->crud_model->get_sns_mark('teacher', 'like', $session_user_id, $teacher_data->teacher_id);
        $bookmarked = $this->crud_model->get_sns_mark('teacher', 'bookmark', $session_user_id, $teacher_data->teacher_id);
      }

      $where = array (
        'teacher_id' => $teacher_data->teacher_id,
        'activate' => 1
      );

      $video_data = $this->db->order_by('video_id', 'desc')->get_where('teacher_video', $where)->result();

      $this->page_data['page_name'] = "teacher/profile";
      $this->page_data['asset_page'] = "teacher_profile";
      $this->page_data['page_title'] = "teacher_profile";
      $this->page_data['user_data'] = $user_data;
      $this->page_data['teacher_data'] = $teacher_data;
      $this->page_data['video_data'] = $video_data;
      $this->page_data['iam_this_teacher'] = $iam_this_teacher;
      $this->page_data['liked'] = $liked;
      $this->page_data['bookmarked'] = $bookmarked;
      $this->load->view('front/index', $this->page_data);

    } else if ($para1 == 'edit_profile') {

      $teacher_id = $para2;

      $teacher_data = $this->db->get_where('teacher', array('teacher_id' => $teacher_id))->row();
      if (empty($teacher_data)) {
        echo ("<script>alert('강사회원이 아닙니다'); window.location.href='{$base_url}home'</script>");
        exit;
      }

      if ($teacher_data->user_id != $this->session->userdata('user_id')) {
        echo("<script>alert('권한이 없습니다'); window.location.href='{$base_url}home'</script>");
        exit;
      }

      $user_data = $this->db->get_where('user', array('user_id' => $teacher_data->user_id))->row();
      if (empty($user_data)) {
        echo ("<script>alert('권한이 없습니다'); window.location.href='{$base_url}home'</script>");
        exit;
      }

      if ($teacher_data->activate == 0) {
        echo("<script>alert('승인 대기 중입니다'); window.location.href='{$base_url}home/user'</script>");
        exit;
      }

      $category_data = array();
      $categories = $this->db->get_where('teacher_category', array('teacher_id' => $teacher_id))->result();
      foreach ($categories as $c) {
        $category_data[] = $c->category;
      }

      $categories = array();
      $category_class = $this->db->get_where('category_class', array('activate' => 1))->result();
      foreach ($category_class as $c) {
        $categories[] = $c->name;
      }

      $category_etc = '';
      $categories = array_values(array_diff($category_data, $categories));
      foreach ($categories as $c) {
        $category_etc .= $c.' ';
      }

      $this->page_data['page_name'] = "teacher/profile/edit";
      $this->page_data['asset_page'] = "teacher_profile_edit";
      $this->page_data['page_title'] = "teacher_profile_edit";
      $this->page_data['user_data'] = $user_data;
      $this->page_data['teacher_data'] = $teacher_data;
      $this->page_data['category_data'] = $category_data;
      $this->page_data['category_etc'] = $category_etc;
      $this->load->view('front/index', $this->page_data);

    } else if ($para1 == 'do_edit_profile') {

      $teacher_id = $para2;
      $user_id = $this->session->userdata('user_id');

      $this->load->library('form_validation');
      $this->form_validation->set_rules('teacher_name', 'teacher_name', 'trim|required|max_length[32]');
      $this->form_validation->set_rules('about', 'about', 'trim|required|max_length[64]');
      $this->form_validation->set_rules('youtube', 'youtube', 'trim|valid_url|max_length[256]');
      $this->form_validation->set_rules('instagram_', 'instagram', 'trim|valid_url|max_length[256]');
//      $this->form_validation->set_rules('homepage', 'homepage', 'trim|valid_url|max_length[256]');

      if ($this->form_validation->run() == FALSE) {
        echo '<br>' . validation_errors();
      } else {
        $name = $this->input->post('teacher_name');
        $about = $this->input->post('about');
        $youtube = $this->input->post('youtube');
        $instagram = $this->input->post('instagram');
//        $homepage = $this->input->post('homepage');
        $categories = $this->input->post('category');

        if (empty($youtube) && empty($instagram)) {
          echo ("<script>alert('유튜브와 인스타그램 중 최소 하나는 입력해주세요');</script>");
          exit;
        }

        if (!empty(($this->input->post('category_etc')))) {
          if (isset($categories) && count($categories)) {
            $categories = array_merge($categories, explode(' ', trim($this->input->post('category_etc'))));
          } else {
            $categories = explode(' ', trim($this->input->post('category_etc')));
          }
        }

        if (!empty($categories) && count($categories)) {
          $categories = array_filter(array_map('trim', $categories));
        }

        if (empty($categories) || count($categories) == 0) {
          echo ("<script>alert('최소 하나의 분류를 선택해주세요');</script>");
          exit;
        }

        $cats = $this->db->get_where('teacher_category', array('teacher_id' => $teacher_id))->result();
        $already_categories = array();
        foreach ($cats as $c) {
          $already_categories[] = $c->category;
        }

        // insert category
        $diff_cats = array_diff($categories, $already_categories);
//        $diff_cats = json_encode($diff_cats);
//        echo("<script>alert('{$diff_cats}');</script>");
//        exit;

        foreach ($diff_cats as $c) {
          $ins = array(
            'teacher_id' => $teacher_id,
            'category' => $c
          );
          $this->db->insert('teacher_category', $ins);
        }

        // del category
        $diff_cats = array_diff($already_categories, $categories);
        foreach ($diff_cats as $c) {
          $del = array(
            'teacher_id' => $teacher_id,
            'category' => $c
          );
          $this->db->delete('teacher_category', $del);
        }

        $upd = array(
          'name' => $name,
          'user_id' => $user_id,
          'about' => $about,
          'youtube' => $youtube,
          'instagram' => $instagram,
        );
        $where = array (
          'teacher_id' => $teacher_id
        );
        $this->db->update('teacher', $upd, $where);

        echo "done";
      }

    } else if ($para1 == 'video') {

      $action = $para2;

      if ($action != 'view') {

        $teacher_user_id = $para3;
        if ($teacher_user_id != $this->session->userdata('user_id')) {
          echo("<script>alert('권한이 없습니다'); window.location.href='{$base_url}home/user'</script>");
          exit;
        }

        $user_data = $this->db->get_where('user', array('user_id' => $teacher_user_id))->row();
        if (!($user_data->user_type & USER_TYPE_TEACHER)) {
          echo("<script>alert('강사회원이 아닙니다'); window.location.href='{$base_url}home/user'</script>");
          exit;
        }

        $teacher_data = $this->db->get_where('teacher', array('user_id' => $teacher_user_id))->row();
        if ($teacher_data->activate == 0) {
          echo("<script>alert('승인 대기 중입니다'); window.location.href='{$base_url}home/user'</script>");
          exit;
        }
        
        $this->page_data['page_name'] = "teacher/video/" . $action;
        $this->page_data['asset_page'] = "teacher_video_" . $action;
        $this->page_data['page_title'] = "teacher_video_" . $action;
        $this->page_data['user_data'] = $user_data;
        $this->page_data['teacher_data'] = $teacher_data;
        $this->load->view('front/index', $this->page_data);

      } else {
        $video_id = $para3;

        $video_data = $this->db->get_where('teacher_video', array('video_id' => $video_id))->row();
        if (empty($video_data)) {
          echo("<script>alert('잘못된 접근이 감지 되었습니다'); window.location.href='{$base_url}home'</script>");
          exit;
        }

        $teacher_data = $this->db->get_where('teacher', array('teacher_id' => $video_data->teacher_id))->row();
        if (empty($teacher_data)) {
          echo("<script>alert('잘못된 접근이 감지 되었습니다'); window.location.href='{$base_url}home'</script>");
          exit;
        }

        $user_data = $this->db->get_where('user', array('user_id' => $teacher_data->user_id))->row();
        if (empty($user_data)) {
          echo("<script>alert('잘못된 접근이 감지 되었습니다'); window.location.href='{$base_url}home'</script>");
          exit;
        }

        $iam_this_video = false;
        $liked = false;
        if ($this->is_login() == true) {
          $session_user_id = $this->session->userdata('user_id');
          $liked = $this->crud_model->get_sns_mark('class', 'like', $session_user_id, $video_id);
          if ($session_user_id == $user_data->user_id) {
            $iam_this_video = true;
          }
        }

        $this->db->where(array('video_id' => $video_id));
        $this->db->set('view', 'view + 1', false);
        $this->db->update('teacher_video');

        $video_data->view += 1;

        $this->page_data['page_name'] = "teacher/video/" . $action;
        $this->page_data['asset_page'] = "teacher_video_" . $action;
        $this->page_data['page_title'] = "teacher_video_" . $action;
        $this->page_data['video_data'] = $video_data;
        $this->page_data['teacher_data'] = $teacher_data;
        $this->page_data['user_data'] = $user_data;
        $this->page_data['liked'] = $liked;
        $this->page_data['iam_this_video'] = $iam_this_video;
        $this->load->view('front/index', $this->page_data);
      }

    } elseif ($para1 == 'video_edit') {
      $base_url = base_url();
      $video_id = $para2;
      $user_id = $para3;

      if ($user_id != $this->session->userdata('user_id')) {
        echo ("<script>alert('권한이 없습니다');location.href='{$base_url}home/teacher/video/view/{$video_id}'</script>");
        exit;
      }

      $video_data = $this->db->get_where('teacher_video', array('video_id' => $video_id))->row();
      if (empty($video_data)) {
        echo("<script>alert('잘못된 접근이 감지 되었습니다');location.href='{$base_url}home/teacher/video/view/{$video_id}'</script>");
        exit;
      }

      $user_data = $this->db->get_where('user', array('user_id' => $user_id))->row();
      if (!($user_data->user_type & USER_TYPE_TEACHER)) {
        echo ("<script>alert('강사회원이 아닙니다');location.href='{$base_url}home/teacher/video/view/{$video_id}'</script>");
        exit;
      }

      $teacher_data = $this->db->get_where('teacher', array('user_id' => $user_id))->row();
      if ($teacher_data->activate == 0) {
        echo ("<script>alert('승인 대기 중입니다');location.href='{$base_url}home/teacher/video/view/{$video_id}'</script>");
        exit;
      }

      $category_data = array();
      $categories = $this->db->get_where('teacher_video_category', array('video_id' => $video_id))->result();
      foreach ($categories as $c) {
        $category_data[] = $c->category;
      }

      $categories = array();
      $category_class = $this->db->get_where('category_class', array('activate' => 1))->result();
      foreach ($category_class as $c) {
        $categories[] = $c->name;
      }

      $category_etc = '';
      $categories = array_values(array_diff($category_data, $categories));
      foreach ($categories as $c) {
          $category_etc .= $c.' ';
      }

      $this->page_data['page_name'] = "teacher/video/edit";
      $this->page_data['asset_page'] = "teacher_video_edit";
      $this->page_data['page_title'] = "teacher_video_edit";
      $this->page_data['video_data'] = $video_data;
      $this->page_data['user_data'] = $user_data;
      $this->page_data['teacher_data'] = $teacher_data;
      $this->page_data['category_data'] = $category_data;
      $this->page_data['category_etc'] = $category_etc;
      $this->load->view('front/index', $this->page_data);

    } elseif ($para1 == 'do_edit_video') {

      $video_id = $para2;
      $user_id = $para3;

      if ($user_id != $this->session->userdata('user_id')) {
        echo ("<script>alert('권한이 없습니다');</script>");
        exit;
      }

      $video_data = $this->db->get_where('teacher_video', array('video_id' => $video_id))->row();
      if (empty($video_data)) {
        echo("<script>alert('잘못된 접근이 감지 되었습니다');</script>");
        exit;
      }

      $user_data = $this->db->get_where('user', array('user_id' => $user_id))->row();
      if (!($user_data->user_type & USER_TYPE_TEACHER)) {
        echo ("<script>alert('강사회원이 아닙니다');</script>");
        exit;
      }

      $teacher_data = $this->db->get_where('teacher', array('user_id' => $user_id))->row();
      if ($teacher_data->activate == 0) {
        echo ("<script>alert('승인 대기 중입니다');</script>");
        exit;
      }

      $this->load->library('form_validation');
      $this->form_validation->set_rules('title', 'title', 'trim|required|max_length[32]');
      $this->form_validation->set_rules('description', 'description', 'trim|required|max_length[256]');

      if ($this->form_validation->run() == FALSE) {
        echo '<br>' . validation_errors();
      } else {
        $title = $this->input->post('title');
        $desc = $this->input->post('description');
        $categories = $this->input->post('category');

        if (!empty(($this->input->post('category_etc')))) {
          if (isset($categories) && count($categories)) {
            $categories = array_merge($categories, explode(' ', trim($this->input->post('category_etc'))));
          } else {
            $categories = explode(' ', trim($this->input->post('category_etc')));
          }
        }

        if (!empty($categories) && count($categories)) {
          $categories = array_filter(array_map('trim', $categories));
        }

        if (empty($categories) || count($categories) == 0) {
          echo("<script>alert('최소 하나의 분류를 선택해주세요');</script>");
          exit;
        }

        $cats = $this->db->get_where('teacher_video_category', array('video_id' => $video_id))->result();
        $already_categories = array();
        foreach ($cats as $c) {
          $already_categories[] = $c->category;
        }

        // insert category
        $diff_cats = array_diff($categories, $already_categories);
//        $diff_cats = json_encode($diff_cats);
//        echo("<script>alert('{$diff_cats}');</script>");
//        exit;

        foreach ($diff_cats as $c) {
          $ins = array(
            'video_id' => $video_id,
            'category' => $c
          );
          $this->db->insert('teacher_video_category', $ins);
        }

        // del category
        $diff_cats = array_diff($already_categories, $categories);
        foreach ($diff_cats as $c) {
          $del = array(
            'video_id' => $video_id,
            'category' => $c
          );
          $this->db->delete('teacher_video_category', $del);
        }

        $upd = array(
          'title' => $title,
          'desc' => $desc
        );
        $where = array(
          'video_id' => $video_id
        );
        $this->db->update('teacher_video', $upd, $where);

        echo 'done';
      }

    } elseif ($para1 == 'do_del_video') {

      $video_id = $para2;
      $user_id = $para3;

      if ($user_id != $this->session->userdata('user_id')) {
        echo ("<script>alert('권한이 없습니다');</script>");
        exit;
      }

      $user_data = $this->db->get_where('user', array('user_id' => $user_id))->row();
      if (!($user_data->user_type & USER_TYPE_TEACHER)) {
        echo ("<script>alert('강사회원이 아닙니다');</script>");
        exit;
      }

      $teacher_data = $this->db->get_where('teacher', array('user_id' => $user_id))->row();
      if ($teacher_data->activate == 0) {
        echo ("<script>alert('승인 대기 중입니다');</script>");
        exit;
      }

      $this->db->delete('teacher_video_category', array('video_id' => $video_id));
      $this->db->delete('teacher_video', array('video_id' => $video_id, 'teacher_id' => $teacher_data->teacher_id));

      echo 'done';

    } else if ($para1 == 'do_add_video') {

      $teacher_user_id = $para2;

      if ($teacher_user_id != $this->session->userdata('user_id')) {
        echo ("<script>alert('권한이 없습니다'); window.location.href='{$base_url}home/user'</script>");
        exit;
      }

      $user_data = $this->db->get_where('user', array('user_id' => $teacher_user_id))->row();
      if (!($user_data->user_type & USER_TYPE_TEACHER)) {
        echo ("<script>alert('강사회원이 아닙니다'); window.location.href='{$base_url}home/user'</script>");
        exit;
      }

      $teacher_data = $this->db->get_where('teacher', array('user_id' => $teacher_user_id))->row();
      if ($teacher_data->activate == 0) {
        echo ("<script>alert('승인 대기 중입니다'); window.location.href='{$base_url}home/user'</script>");
        exit;
      }

      $this->load->library('form_validation');
      $this->form_validation->set_rules('title', 'title', 'trim|required|max_length[32]');
      $this->form_validation->set_rules('description', 'description', 'trim|required|max_length[256]');
      $this->form_validation->set_rules('video_url', 'video_url', 'trim|required|valid_url|max_length[256]');

      if ($this->form_validation->run() == FALSE) {
        echo '<br>' . validation_errors();
      } else {
        $title = $this->input->post('title');
        $desc = $this->input->post('description');
        $video_url = $this->input->post('video_url');
        $categories = $this->input->post('category');

        if (!empty(($this->input->post('category_etc')))) {
          if (isset($categories) && count($categories)) {
            $categories = array_merge($categories, explode(' ', trim($this->input->post('category_etc'))));
          } else {
            $categories = explode(' ', trim($this->input->post('category_etc')));
          }
        }

        if (!empty($categories) && count($categories)) {
          $categories = array_filter(array_map('trim', $categories));
        }

//                $categories = json_encode(($this->input->post('category_etc')));
//                $categories = json_encode($categories);
//                print_r($categories);
//                echo "<script>alert('{$categories}')</script>";
//                exit;

        if (empty($categories) || count($categories) == 0) {
          echo ("<script>alert('최소 하나의 분류를 선택해주세요');</script>");
          exit;
        }

        /* parsing to extract youtube video id from video url */
        $reg_exp = '/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/';
        preg_match($reg_exp, $video_url, $matches);
        $youtube_id = $matches[7];

        /* get video info */
        $content = file_get_contents("https://youtube.com/get_video_info?video_id=".$youtube_id);
        parse_str($content, $data);
        $result = json_decode($data['player_response']);

//        echo "아이디 : ".$result->videoDetails->videoId;
//        echo "채널아이디: ".$result->videoDetails->channelId;
//        echo "제목 : ".$result->videoDetails->title;
//        echo "설명 : ".$result->videoDetails->shortDescription;
//        echo "올린 사람 : ".$result->videoDetails->author;
//        echo "조회수: ".$result->videoDetails->viewCount;
//        echo "동영상 길이 : ".$result->videoDetails->lengthSeconds;
//        echo "키워드: ".json_encode($result->videoDetails->keywords);
//        echo "썸네일 갯수: ".count($result->videoDetails->thumbnail->thumbnails);
//        echo "썸네일: ".json_encode($result->videoDetails->thumbnail->thumbnails[0]);
//        echo "썸네일: ".json_encode($result->videoDetails->thumbnail->thumbnails[1]);
//        echo "썸네일: ".json_encode($result->videoDetails->thumbnail->thumbnails[2]);
//        echo "썸네일: ".json_encode($result->videoDetails->thumbnail->thumbnails[3]);

        $youtube_url = "https://www.youtube.com/embed/".$youtube_id;

        $ins = array(
          'teacher_id' => $teacher_data->teacher_id,
          'title' => $title,
          'video_url' => $youtube_url,
          'desc' => $desc,
          'thumbnail_image_url' => $result->videoDetails->thumbnail->thumbnails[1]->url,
          'playtime' => $result->videoDetails->lengthSeconds,
          'activate' => 1,
          'yt_info' => $data['player_response']
        );
        $this->db->insert('teacher_video', $ins);

        $video_id = $this->db->insert_id();

        foreach ($categories as $cat) {
          $cat = trim($cat);
          $this->db->insert('teacher_video_category', array('video_id' => $video_id, 'category' => $cat));
        }
        echo "done";
      }

    } else {

    }
  }

  private function get_center_data(array $center_list)
  {
    $center_data = array();

    if (!empty($center_list) && count($center_list) > 0) {
      $center_id_list = array();
      foreach ($center_list as $center) {
        $center_id_list[] = $center->center_id;
      }
      $center_id_list = array_unique($center_id_list);

      $center_id_list = implode(',', $center_id_list);
      $query = <<<QUERY
select center_id,user_id,title,phone,about,address,address_detail,longitude,latitude,activate 
from center where center_id in ({$center_id_list}) and activate=1
QUERY;
      $center_data = $this->db->query($query)->result();

    }

    return $center_data;
  }

  public function sns($para1 = '', $para2 = '', $para3 = '')
  {
    if ($this->session->userdata('user_login') != "yes") {
      $result['status'] = 'not_login';
//      $result['redirect_url'] = base_url().'home/login';
      $result['redirect_url'] = $this->get_login_url($this->agent->referrer());
      $result['message'] = "로그인 후 이용이 가능합니다.";
      echo json_encode($result);
    } else {

      $user_id = $this->session->userdata('user_id');

      $cat_type = $para1; // center, class, teacher

      if ($cat_type == 'center') {
        $id_col = 'center_id';
        $upd_table = 'center';
      } else if ($cat_type == 'class') {
        $id_col = 'video_id';
        $upd_table = 'teacher_video';
      } else if ($cat_type == 'teacher') {
        $id_col = 'teacher_id';
        $upd_table = 'teacher';
      } else if ($cat_type == 'product') {
        $id_col = 'product_id';
        $upd_table = 'shop_product_id';
      } else {
        // unreachable
        $result['status'] = 'fail';
        $result['message'] = "cat_type : {$cat_type}";
        echo json_encode($result);
        exit;
      }

      $func_type = $para2; // like, bookmark
      $action = $para3; // do, undo
      $id = $_GET['id'];
      if ($action == 'do') {
        $upd = <<<QUERY
UPDATE {$upd_table} set `{$func_type}`=`{$func_type}`+1 where {$id_col}={$id}
QUERY;

        $query = <<<QUERY
insert into {$func_type}_{$cat_type} (user_id,{$id_col}) values ({$user_id},{$id})
QUERY;
      } else {
        $upd = <<<QUERY
UPDATE {$upd_table} set `{$func_type}`=`{$func_type}`-1 where {$id_col}={$id}
QUERY;

        $query = <<<QUERY
delete from {$func_type}_{$cat_type} where user_id={$user_id} and {$id_col}={$id}
QUERY;
      }

      $this->db->query($query);

      if ($this->db->affected_rows()) {
        $this->db->query($upd);
        $result['status'] = 'success';
      } else {
        $result['status'] = 'fail';
        $result['message'] = "affected_row: 0";
      }
      echo json_encode($result);
    }
  }

  public function shop($para1 = '', $para2 = '', $para3 = '')
  {
    if ($para1 == '' && empty($_GET)) {
      redirect(base_url().'home/shop/main', 'refresh');
    }
  
    $view = $para1;
    $type = $para2;
    
    if ($view == 'product') {

      $product_id = $_GET['id'];
      $query = <<<QUERY
select a.product_code,a.brand_name,a.review,a.review_score,a.status,a.qna,b.* from shop_product_id a, shop_product b
where a.product_id=b.product_id and a.product_id={$product_id}
QUERY;

      $product = $this->db->query($query)->row();
      if ($product->item_noti_info_need) {
        $product_notice = $this->db->get_where('shop_product_notice', array('product_id' => $product_id))->result();
        if (!empty($product_notice)) {
          $product->item_noti_info = '';
          foreach ($product_notice as $notice) {
            if ($product->item_noti_info != '') {
              $product->item_noti_info .= '<br>';
            }
            $product->item_noti_info .= '- ' . $notice->field_name . '<br>' . $notice->field_value;
          }
        }
      }

      $shop_id = $product->shop_id;
      $shop_shipping = $this->db->get_where('shop_shipping', array('shop_id' => $shop_id))->row();
      $brand_info = $this->db->get_where('shop_brand_info', array('shop_id' => $shop_id))->row();

      $liked = false;
      $purchase_product_id = 0;
      if ($this->is_login() == true) {
        $user_id = $this->session->userdata('user_id');
        $liked = $this->crud_model->get_sns_mark('product', 'like', $user_id, $product_id);

        $query = <<<QUERY
select * from shop_purchase_product 
where user_id={$user_id} and product_id={$product_id} and reviewed=0 and canceled=0 
order by purchase_product_id asc limit 1
QUERY;
        $purchase_product = $this->db->query($query)->row();
        if (!empty($purchase_product)) {
          $purchase_product_id = $purchase_product->purchase_product_id;
        }
      }

      $review_score_i = 0;
      $review_score_f = 0;
      if ($product->review > 0) {
        $score = (int)(($product->review_score*10)/$product->review);
        $review_score_i = (int)($score / 10);
        $review_score_f = ($score % 10);
      }

      $query = <<<QUERY
select review_img_url_1 as url from shop_product_review where product_id={$product_id} and review_file_cnt>0 order by review_id desc limit 0,5
QUERY;
      $review_images = $this->db->query($query)->result();

      $this->page_data['product'] = $product;
      $this->page_data['shop_shipping'] = $shop_shipping;
      $this->page_data['brand_info'] = $brand_info;
      $this->page_data['liked'] = $liked;
      $this->page_data['review_score_i'] = $review_score_i;
      $this->page_data['review_score_f'] = $review_score_f;
      $this->page_data['review_images'] = $review_images;
      $this->page_data['purchase_product_id'] = $purchase_product_id;
      $this->page_data['page_name'] = "shop/product";
      $this->page_data['asset_page'] = "shop";
      $this->page_data['page_title'] = "shop";
      $this->load->view('front/index', $this->page_data);

    } else if ($view == 'cart') {

      if ($type == 'add') {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('product_id', 'product_id', 'trim|required|is_natural|max_length[10]');
        $this->form_validation->set_rules('shop_id', 'shop_id', 'trim|required|is_natural|max_length[10]');
        $this->form_validation->set_rules('item_general_price', 'item_general_price', 'trim|required|is_natural|max_length[10]');
        $this->form_validation->set_rules('item_sell_price', 'item_sell_price', 'trim|required|is_natural|max_length[10]');
        $this->form_validation->set_rules('item_discount_rate', 'item_discount_rate', 'trim|required|is_natural|less_than_equal_to[100]');
        $this->form_validation->set_rules('free_shipping', 'free_shipping', 'trim|required|is_natural|less_than_equal_to[1]');
        $this->form_validation->set_rules('free_shipping_total_price', 'free_shipping_total_price', 'trim|is_natural|less_than_equal_to[999999]');
        $this->form_validation->set_rules('free_shipping_cond_price', 'free_shipping_cond_price', 'trim|is_natural|less_than_equal_to[999999]');
        $this->form_validation->set_rules('bundle_shipping_cnt', 'bundle_shipping_cnt', 'trim|required|is_natural|max_length[10]');
        $this->form_validation->set_rules('total_purchase_cnt', 'total_purchase_cnt', 'trim|required|is_natural|max_length[10]');
        $this->form_validation->set_rules('total_price', 'total_price', 'trim|required|is_natural|max_length[10]');
        $this->form_validation->set_rules('total_shipping_fee', 'total_shipping_fee', 'trim|required|is_natural|max_length[10]');
        $this->form_validation->set_rules('total_additional_price', 'total_additional_price', 'trim|required|is_natural|max_length[10]');
        $this->form_validation->set_rules('total_balance', 'total_balance', 'trim|required|is_natural|max_length[10]');
        $this->form_validation->set_rules('item_option_requires_cnt', 'item_option_requires_cnt', 'trim|required|is_natural|less_than_equal_to[5]');
        $this->form_validation->set_rules('item_option_others_cnt', 'item_option_others_cnt', 'trim|required|is_natural|less_than_equal_to[5]');
        $this->form_validation->set_rules('item_option_requires', 'item_option_requires', 'trim|max_length[65536]');
        $this->form_validation->set_rules('item_option_others', 'item_option_others', 'trim|max_length[65536]');
        $this->form_validation->set_rules('item_tax', 'item_tax', 'trim|required|is_natural|less_than_equal_to[1]');
        $this->form_validation->set_rules('item_margin', 'item_margin', 'trim|required|is_natural|less_than_equal_to[100]');
        $this->form_validation->set_rules('item_supply_price', 'item_supply_price', 'trim|required|is_natural|max_length[10]');


        if ($this->form_validation->run() == FALSE) {
          echo '<br>' . validation_errors();
        } else {
          $product_id = $this->input->post('product_id');
          $shop_id = $this->input->post('shop_id');
          $item_general_price = (int)$this->input->post('item_general_price');
          $item_sell_price = (int)$this->input->post('item_sell_price');
          $item_discount_rate = (int)$this->input->post('item_discount_rate');
          $free_shipping = $this->input->post('free_shipping');
          $free_shipping_total_price = $this->input->post('free_shipping_total_price');
          $free_shipping_cond_price = $this->input->post('free_shipping_cond_price');
          $bundle_shipping_cnt = $this->input->post('bundle_shipping_cnt');
          $total_purchase_cnt = $this->input->post('total_purchase_cnt');
          $total_price = $this->input->post('total_price');
          $total_shipping_fee = $this->input->post('total_shipping_fee');
          $total_additional_price = $this->input->post('total_additional_price');
          $total_balance = $this->input->post('total_balance');
          $item_option_requires_cnt = (int)$this->input->post('item_option_requires_cnt');
          $item_option_requires = $this->input->post('item_option_requires');
          $item_option_others_cnt = (int)$this->input->post('item_option_others_cnt');
          $item_option_others = $this->input->post('item_option_others');
          $item_tax = $this->input->post('item_tax');
          $item_margin = $this->input->post('item_margin');
          $item_supply_price = $this->input->post('item_supply_price');

          $ins = array(
            'product_id' => $product_id,
            'shop_id' => $shop_id,
            'purchase' => 0,
            'item_general_price' => $item_general_price,
            'item_sell_price' => $item_sell_price,
            'item_discount_rate' => $item_discount_rate,
            'free_shipping' => $free_shipping,
            'free_shipping_total_price' => $free_shipping_total_price,
            'free_shipping_cond_price' => $free_shipping_cond_price,
            'bundle_shipping_cnt' => $bundle_shipping_cnt,
            'total_purchase_cnt' => $total_purchase_cnt,
            'total_price' => $total_price,
            'total_shipping_fee' => $total_shipping_fee,
            'total_additional_price' => $total_additional_price,
            'total_balance' => $total_balance,
            'item_option_requires_cnt' => $item_option_requires_cnt,
            'item_option_requires' => $item_option_requires,
            'item_option_others_cnt' => $item_option_others_cnt,
            'item_option_others' => $item_option_others,
            'item_tax' => $item_tax,
            'item_margin' => $item_margin,
            'item_supply_price' => $item_supply_price,
          );
          $this->db->set($ins);
          if ($this->is_login() == true) {
            $user_id = $this->session->userdata('user_id');
            $this->db->set('user_id', $user_id);
          } else {
            $session_id = $this->crud_model->get_session_id();
            $this->db->set('session_id', $session_id);
          }
          $this->db->set('register_at', 'NOW()', false);
          $this->db->set('modified_at', 'NOW()', false);
          $this->db->set('purchase_at', 'NOW()', false);
          $this->db->insert('shop_cart', $ins);
          if ($this->db->affected_rows() > 0) {
            echo 'done';
          } else {
            echo 'fail : not inserted';
          }
        }

      } elseif ($type == 'del') {

        $cart_id = $this->input->post('cart_id');

        $this->db->delete('shop_cart', array('cart_id' => $cart_id));
        if ($this->db->affected_rows()) {
          echo 'done';
        } else {
          echo 'fail: not deleted';
        }

      } else {

        if ($this->is_login() == true) {
          $user_id = $this->session->userdata('user_id');
          $cart_items = $this->db->get_where('shop_cart', array('user_id' => $user_id))->result();
        } else {
          $session_id = $this->crud_model->get_session_id();
          $cart_items = $this->db->get_where('shop_cart', array('session_id' => $session_id))->result();
        }

        $total_price = 0;
        $total_purchase_cnt = 0;
        $total_shipping_fee = 0;
        $total_additional_price = 0;
        foreach ($cart_items as $item) {
          $item->product = $this->db->get_where('shop_product', array('product_id' => $item->product_id))->row();
          $item->product_id = $this->db->get_where('shop_product_id', array('product_id' => $item->product_id))->row();
          $item->shop = $this->db->get_where('shop', array('shop_id' => $item->product->shop_id))->row();
          $item->shop_shipping = $this->db->get_where('shop_shipping', array('shop_id' => $item->product->shop_id))->row();

          // total purchase cnt
          if ($item->product_id->status == SHOP_PRODUCT_STATUS_ON_SALE) {
            $total_purchase_cnt += $item->total_purchase_cnt;
          }

          // total price
          $item->total_price = ($item->product->item_sell_price * $item->total_purchase_cnt);
          if ($item->product_id->status == SHOP_PRODUCT_STATUS_ON_SALE) {
            $total_price += $item->total_price;
          }

          // shipping fee
          $item->shipping_fee = 0;
          if ($item->product->item_shipping_free == false) {

            if ($item->total_price < $item->shop_shipping->free_shipping_total_price) {
              $item->shipping_fee = ($item->shop_shipping->free_shipping_cond_price *
                ((int)($item->total_purchase_cnt / $item->product->bundle_shipping_cnt) +
                  ($item->total_purchase_cnt % $item->product->bundle_shipping_cnt > 0 ? 1 : 0)));
            }
  
            if ($item->product_id->status == SHOP_PRODUCT_STATUS_ON_SALE) {
              $total_shipping_fee += $item->shipping_fee;
            }

          }

          // options -- 변하면 안됨
          $item->item_option_requires = json_decode($item->item_option_requires);
          $item->additional_price = 0;
          foreach ($item->item_option_requires as $opt) {
            $item->additional_price += $opt->price;
            if ($item->product_id->status == SHOP_PRODUCT_STATUS_ON_SALE) {
              $total_additional_price += $opt->price;
            }
          }
          $item->item_option_others = json_decode($item->item_option_others);
          foreach ($item->item_option_others as $opt) {
            $item->additional_price += $opt->price;
            if ($item->product_id->status == SHOP_PRODUCT_STATUS_ON_SALE) {
              $total_additional_price += $opt->price;
            }
          }
  
          $item->total_balance = $item->total_price + $item->shipping_fee + $item->additional_price;

          $upd = array(
            'purchase' => 0,
            'item_general_price' => $item->product->item_general_price,
            'item_sell_price' => $item->product->item_sell_price,
            'item_discount_rate' => $item->product->item_discount_rate,
            'free_shipping' => $item->shop_shipping->free_shipping,
            'free_shipping_total_price' => $item->shop_shipping->free_shipping_total_price,
            'free_shipping_cond_price' => $item->shop_shipping->free_shipping_cond_price,
            'bundle_shipping_cnt' => $item->product->bundle_shipping_cnt,
            'total_purchase_cnt' => $item->total_purchase_cnt,
            'total_price' => $item->total_price,
            'total_shipping_fee' => $item->shipping_fee,
            'total_additional_price' => $item->additional_price,
            'total_balance' => $item->total_balance,
            'item_tax' => $item->product->item_tax,
            'item_margin' => $item->product->item_margin,
            'item_supply_price' => $item->product->item_supply_price,
          );

          $this->db->set('modified_at', 'NOW()', false);
          $this->db->update('shop_cart', $upd, array('cart_id' => $item->cart_id));
        }

        $total_balance = $total_price + $total_shipping_fee + $total_additional_price;

        $this->page_data['total_purchase_cnt'] = $total_purchase_cnt;
        $this->page_data['total_price'] = $total_price;
        $this->page_data['total_shipping_fee'] = $total_shipping_fee;
        $this->page_data['total_additional_price'] = $total_additional_price;
        $this->page_data['total_balance'] = $total_balance;
        $this->page_data['cart_items'] = $cart_items;
        $this->page_data['page_name'] = "shop/cart";
        $this->page_data['asset_page'] = "shop";
        $this->page_data['page_title'] = "shop";
        $this->load->view('front/index', $this->page_data);
      }

    } elseif ($view == 'order') {

      if ($type == 'detail') {

        // 구매 완료 페이지

        $purchase_code = $this->input->get('c');
        $auth_code = $this->input->get('a');
        $purchase_info = $this->db->get_where('shop_purchase', array('purchase_code' => $purchase_code))->row();
        if (isset($purchase_info) == false || empty($purchase_info) == true) {
          $this->crud_model->alert_exit('구매 상품이 존재하지 않습니다.', base_url() . 'home/shop/main');
        }
        if ($purchase_info->user_id > 0) {
          if ($this->is_login() == false) {
            $this->redirect_login();
          } else {
            $user_id = $this->session->userdata('user_id');
            if ($user_id != $purchase_info->user_id) {
              $this->crud_model->alert_exit('잘못된 접근입니다.', base_url() . 'home/user');
            }
          }
        } else {
          if ($auth_code != $purchase_info->session_id) {
            $this->crud_model->alert_exit('잘못된 접근입니다.', base_url() . 'home/shop/main');
          }
        }
        
        $purchase_items = $this->db->get_where('shop_purchase_product', array('purchase_code' => $purchase_code))->result();
        if (count($purchase_items) == 0) {
          $this->crud_model->alert_exit('구매 상품이 존재하지 않습니다.', base_url() . 'home/shop/main');
        }

        $payment_info = json_decode($purchase_info->bootpay_done_data);

        foreach ($purchase_items as $item) {
          $item->product = $this->db->get_where('shop_product', array('product_id' => $item->product_id))->row();
          $item->product_id = $this->db->get_where('shop_product_id', array('product_id' => $item->product_id))->row();
          $item->shop = $this->db->get_where('shop', array('shop_id' => $item->product->shop_id))->row();
          $item->item_option_requires = json_decode($item->item_option_requires);
          $item->item_option_others = json_decode($item->item_option_others);
          $item->shipping_data = json_decode($item->shipping_data);
        }

        $this->page_data['page_type'] = $type;
        $this->page_data['auth_code'] = $auth_code;
        $this->page_data['purchase_code'] = $purchase_code;
        $this->page_data['purchase_info'] = $purchase_info;
        $this->page_data['payment_info'] = $payment_info;
        $this->page_data['purchase_items'] = $purchase_items;
        $this->page_data['page_name'] = "shop/order/detail";
        $this->page_data['asset_page'] = "shop";
        $this->page_data['page_title'] = "shop";
        $this->load->view('front/index', $this->page_data);

      } elseif ($type == 'list') {

        $page = $_GET['page'];
        $limit = SHOP_PRODUCT_PURCHASE_LIST_PAGE_SIZE;
        $offset = ($page - 1) * $limit;

        if ($this->is_login() == true) {
          $user_id = $this->session->userdata('user_id');
          $user_key = array('user_id' => $user_id);
        } else {
          $session_id = $this->crud_model->get_session_id();
          $user_key = array('session_id' => $session_id);
        }

        $where = array(
          'status >=' => SHOP_PURCHASE_STATUS_COMPLETED
        );
        $this->db->limit($limit, $offset);
        $this->db->order_by('purchase_id', 'desc');
        $this->db->where($user_key);
        $purchase_infos = $this->db->get_where('shop_purchase', $where)->result();
        foreach ($purchase_infos as $info) {
          $info->payment_info = json_decode($info->bootpay_done_data);
        }

        $this->page_data['purchase_infos'] = $purchase_infos;
        $this->load->view('front/shop/order/list', $this->page_data);
      
      } else {

        $this->page_data['page_name'] = "shop/order";
        $this->page_data['asset_page'] = "shop";
        $this->page_data['page_title'] = "shop";
        $this->load->view('front/index', $this->page_data);

      }

    } elseif ($view == 'purchase') {

      if ($type === 'complete') {

        // 구매 완료 페이지

        $purchase_code = $this->input->get('c');
        $purchase_info = $this->db->get_where('shop_purchase', array('purchase_code' => $purchase_code))->row();

        $user_id = 0;
        $session_id = 0;
        if ($this->is_login() == true) {
          $user_id = $this->session->userdata('user_id');
          $redirect_url = base_url() . "home/shop/order/detail?c={$purchase_code}";
//          $user_key = array('user_id' => $user_id);
        } else {
          $session_id = $this->crud_model->get_session_id();
          $redirect_url = base_url() . "home/shop/order/detail?c={$purchase_code}&a={$session_id}";
//          $user_key = array('session_id' => $session_id);
        }

        $purchase_product_ids = array();
        $cart_ids = json_decode($purchase_info->cart_ids);
        $total_discount = 0;
        $item_cnt = count($cart_ids);
        $idx = 0;
        foreach ($cart_ids as $id) {
          
          $item = $this->db->get_where('shop_cart', array('cart_id' => $id))->row();
         
          $discount = 0;
          if ($purchase_info->discount > 0) {
            $idx += 1;
            if ($idx == $item_cnt) {
              $discount = $purchase_info->discount - $total_discount;
            } else {
              $discount = (int)(($purchase_info->discount * $item->total_balance / $purchase_info->total_balance) / 100) * 100;
              $total_discount += $discount;
            }
          }
          
          $ins = array(
            'purchase_id' => $purchase_info->purchase_id,
            'purchase_code' => $purchase_info->purchase_code,
            'user_id' => $user_id,
            'session_id' => $session_id,
            'product_id' => $item->product_id,
            'shop_id' => $item->shop_id,
            'item_tax' => $item->item_tax,
            'item_general_price' => $item->item_general_price,
            'item_discount_rate' => $item->item_discount_rate,
            'item_sell_price' => $item->item_sell_price,
            'item_margin' => $item->item_margin,
            'item_supply_price' => $item->item_supply_price,
            'free_shipping' => $item->free_shipping,
            'free_shipping_total_price' => $item->free_shipping_total_price,
            'free_shipping_cond_price' => $item->free_shipping_cond_price,
            'bundle_shipping_cnt' => $item->bundle_shipping_cnt,
            'total_purchase_cnt' => $item->total_purchase_cnt,
            'total_price' => $item->total_price,
            'total_shipping_fee' => $item->total_shipping_fee,
            'total_additional_price' => $item->total_additional_price,
            'total_balance' => $item->total_balance,
            'item_option_requires_cnt' => $item->item_option_requires_cnt,
            'item_option_requires' => $item->item_option_requires,
            'item_option_others_cnt' => $item->item_option_others_cnt,
            'item_option_others' => $item->item_option_others,
            'shipping_status' => SHOP_SHIPPING_STATUS_ORDER_COMPLETED,
            'shipping_status_code' => $this->crud_model->get_shipping_status_str(SHOP_SHIPPING_STATUS_ORDER_COMPLETED),
            'shipping_data' => '',
            'reviewed' => 0,
            'canceled' => 0,
            'discount' => $discount,
            'user_coupon_id' => $purchase_info->user_coupon_id,
          );
          $this->db->set('purchase_at', 'NOW()', false);
          $this->db->set('modified_at', 'NOW()', false);
          $this->db->set('canceled_at', 'NOW()', false);
          $this->db->insert('shop_purchase_product', $ins);
 
          $purchase_product_id = $this->db->insert_id();
          
          $ins = array(
            'purchase_product_id' => $purchase_product_id,
            'shipping_status' => SHOP_SHIPPING_STATUS_ORDER_COMPLETED,
            'shipping_status_code' => $this->crud_model->get_shipping_status_str(SHOP_SHIPPING_STATUS_ORDER_COMPLETED),
            'shipping_data' => '',
          );
          $this->db->set('modified_at', 'NOW()', false);
          $this->db->insert('shop_purchase_product_status', $ins);
          
//          $query = <<<QUERY
//update shop_product_id set sell=sell+1 where product_id={$item->product_id}
//QUERY;
//          $this->db->query($query);
          $this->db->set('sell', 'sell+1', false);
          $this->db->where('product_id', $item->product_id);
          $this->db->update('shop_product_id');


          if ($this->db->affected_rows()) {
            $purchase_product_ids[] = $this->db->insert_id();
            $this->db->delete('shop_cart', array('cart_id' => $id));
          }
  
          // send email
          $title = '상품을 주문해주셔서 감사합니다. 주문내역을 확인해주세요.';
          $product_info = $this->db->get_where('shop_product', array('product_id' => $item->product_id))->row();
          $shop_info = $this->db->get_where('shop', array('shop_id' => $product_info->shop_id))->row();
          $this->email_model->get_user_shipping_status_data(
            $this->crud_model->get_shipping_status_str(SHOP_SHIPPING_STATUS_ORDER_COMPLETED), $purchase_info->purchase_code,
            $shop_info->shop_name, $product_info->item_name, $purchase_info->sender_email, $redirect_url);
          $this->email_model->get_shop_shipping_status_data('신규', $purchase_code, $shop_info->shop_name,
            $product_info->item_name, $shop_info->email);
  
        } // end of cart to shop_purchase_product

        $upd = array(
          'status' => SHOP_PURCHASE_STATUS_COMPLETED,
          'status_code' => $this->crud_model->get_purchase_status_str(SHOP_PURCHASE_STATUS_COMPLETED),
          'purchase_product_ids' => json_encode($purchase_product_ids),
        );
        $this->db->set('done_at', 'NOW()', false);
        $this->db->update('shop_purchase', $upd, array('purchase_id' => $purchase_info->purchase_id));
        
        if ($purchase_info->user_coupon_id > 0) {
          $this->db->set('used', 1);
          $this->db->set('used_at', 'NOW()', false);
          $this->db->set('used_purchase_id', $purchase_info->purchase_id);
          $this->db->where('user_coupon_id', $purchase_info->user_coupon_id);
          $this->db->update('user_coupon');
        }
  
//        $app_data = json_decode($this->session->userdata('app_data'));
//        if ($this->session->userdata('is_app') == 'yes' && $app_data->push_setting == 'ON') {
////          log_message('debug', '[push notification] '.json_encode($this->app_model->get_app_data()));
//          $title = '구매성공';
//          $body = '상품을 주문해주셔서 감사합니다. 주문내역을 확인해주세요.';
//          $url = base_url().'home/shop/order/detail?c='.$purchase_code;
//          send_notification($title, $body, ['url' => $url], $app_data->fcm_token);
//        }
        
        // send push
        $title = '구매성공';
        $body = '상품을 주문해주셔서 감사합니다. 주문내역을 확인해주세요.';
        $this->push->send_push_private($this->session, $title, $body, $redirect_url, null);
        
        // send kakao alim talk

      
        //$this->crud_model->alert_exit('구매가 성공하였습니다.', base_url().'home/shop/main');
        redirect($redirect_url, 'refresh');


      } elseif ($type == 'done') {

        // check payment validation

        $purchase_code = $this->input->post('purchase_code');
        $bootpay_done_json_data = $this->input->post('bootpay_done_data');
        
        log_message('debug', '[bootpay] bootpay_done_data['.$bootpay_done_json_data.']');
  
        $data = json_decode($bootpay_done_json_data);

        $purchase_info = $this->db->get_where('shop_purchase', array('purchase_code' => $purchase_code))->row();
  
        $receiver_info = $this->db->get_where('shop_shipping_address',
          array('address_id' => $data->params->receiver_info->address_id))->row();

        $upd = array(
          'status' => SHOP_PURCHASE_STATUS_DONE_SUCCESS,
          'status_code' => $this->crud_model->get_purchase_status_str(SHOP_PURCHASE_STATUS_DONE_SUCCESS),
          'receipt_id' => $data->receipt_id,
//          'receipt_url' => $data->receipt_url, // 페이앱에서 안나옴, 이니시스에서는 나옴
          'bootpay_done_data' => $bootpay_done_json_data,
          'sender_name' => $data->params->sender_info->username,
          'sender_email' => $data->params->sender_info->email,
          'sender_phone' => $data->params->sender_info->phone,
          'sender_postcode' => $data->params->sender_info->postcode,
          'sender_address_1' => $data->params->sender_info->address_1,
          'sender_address_2' => $data->params->sender_info->address_2,
          'receiver_name' => $receiver_info->receiver_name,
          'receiver_phone_1' => $receiver_info->phone_1,
          'receiver_phone_2' => $receiver_info->phone_2,
          'receiver_postcode' => $receiver_info->postcode,
          'receiver_address_1' => $receiver_info->address_1,
          'receiver_address_2' => $receiver_info->address_2,
          'receiver_req' => $data->params->receiver_info->shipping_req,
        );
        $this->db->set('done_at', 'NOW()', false);
        $this->db->update('shop_purchase', $upd, array('purchase_id' => $purchase_info->purchase_id));
        $cnt = $this->db->affected_rows();

        if ($cnt) {
          echo 'done';
        } else {
          echo 'fail';
        }

      } elseif ($type == 'confirm') {

        // check total balance

        $purchase_code = $this->input->post('purchase_code');
        $bootpay_confirmed_json_data = $this->input->post('bootpay_confirmed_data');
        
        log_message('debug', '[bootpay] bootpay_confiremd_data['.$bootpay_confirmed_json_data.']');
        
        $data = json_decode($bootpay_confirmed_json_data);

        $purchase_info = $this->db->get_where('shop_purchase', array('purchase_code' => $purchase_code))->row();
  
        if ($data->params->purchase_info->purchase_code == $purchase_info->purchase_code) { // success

          if ($data->params->purchase_info->total_balance == $purchase_info->total_balance &&
          $data->params->purchase_info->discount == $purchase_info->discount &&
          $data->params->purchase_info->user_coupon_id == $purchase_info->user_coupon_id) { // success

            $upd = array(
              'status' => SHOP_PURCHASE_STATUS_CONFIRM_SUCCESS,
              'status_code' => $this->crud_model->get_purchase_status_str(SHOP_PURCHASE_STATUS_CONFIRM_SUCCESS),
              'receipt_id' => $data->receipt_id,
              'bootpay_confirmed_data' => $bootpay_confirmed_json_data,
            );
            $this->db->set('confirmed_at', 'NOW()', false);
            $this->db->update('shop_purchase', $upd, array('purchase_id' => $purchase_info->purchase_id));

            echo 'done';

          } else { // fail

            $fail_reason = "not matched total_balance, {$data->params->purchase_info->total_balance} != {$purchase_info->total_balance}";
            $upd = array(
              'status' => SHOP_PURCHASE_STATUS_CONFIRM_FAIL,
              'status_code' => $this->crud_model->get_purchase_status_str(SHOP_PURCHASE_STATUS_CONFIRM_FAIL),
              'receipt_id' => $data->receipt_id,
              'bootpay_confirmed_data' => $bootpay_confirmed_json_data,
              'fail_reason' => $fail_reason,
            );
            $this->db->set('confirmed_at', 'NOW()', false);
            $this->db->update('shop_purchase', $upd, array('purchase_id' => $purchase_info->purchase_id));

            echo "fail : {$fail_reason}";

          }

        } else { // fail

          $fail_reason = "not matched purchase_code, {$data->params->purchase_code} != {$purchase_code}";
          $upd = array(
            'status' => SHOP_PURCHASE_STATUS_CONFIRM_FAIL,
            'status_code' => $this->crud_model->get_purchase_status_str(SHOP_PURCHASE_STATUS_CONFIRM_FAIL),
            'receipt_id' => $data->receipt_id,
            'bootpay_confirmed_data' => $bootpay_confirmed_json_data,
            'fail_reason' => $fail_reason,
          );
          $this->db->set('confirmed_at', 'NOW()', false);
          $this->db->update('shop_purchase', $upd, array('purchase_id' => $purchase_info->purchase_id));

          echo "fail : {$fail_reason}";

        }

      } elseif ($type == 'canceled') { // 결제 중 취소
  
        $purchase_code = $this->input->post('purchase_code');
        $upd = array(
          'status' => SHOP_PURCHASE_STATUS_PAYING_CANCELED,
          'status_code' => $this->crud_model->get_purchase_status_str(SHOP_PURCHASE_STATUS_PAYING_CANCELED),
        );
        $this->db->set('canceled_at', 'NOW()', false);
        $this->db->update('shop_purchase', $upd, array('purchase_code' => $purchase_code));
  
        echo 'done';
  
      } elseif ($type == 'cancel') { // 유저가 주문 취소 요청
        
        $purchase_product_id = $this->input->post('id');
        $cancel_reason = $this->input->post('reason');
        $auth_code = $this->input->post('auth_code');
        
        $this->crud_model->cancel_payment($purchase_product_id, $cancel_reason, SHOP_SHIPPING_STATUS_ORDER_CANCELED,
          true, $auth_code);
 
        echo 'done';
  
      } elseif ($type == 'paying') {

        $purchase_code = $this->input->post('purchase_code');
        $username = $this->input->post('username');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $postcode = $this->input->post('postcode');
        $address_1 = $this->input->post('address_1');
        $address_2 = $this->input->post('address_2');
        $user_save = $this->input->post('user_save') == '1';
        $discount = $this->input->post('discount');
        $user_coupon_id = $this->input->post('user_coupon_id');
        
        $purchase_info = $this->db->get_where('shop_purchase', array('purchase_code' => $purchase_code))->row();
        if ($purchase_info->status != SHOP_PURCHASE_STATUS_PURCHASING) {
          echo ('invalid purchasing status');
          exit;
        }

        $upd = array(
          'status' => SHOP_PURCHASE_STATUS_PAYING,
          'status_code' => $this->crud_model->get_purchase_status_str(SHOP_PURCHASE_STATUS_PAYING),
          'discount' => $discount,
          'user_coupon_id' => $user_coupon_id,
        );
        $this->db->set('request_at', 'NOW()', false);
        $this->db->update('shop_purchase', $upd, array('purchase_code' => $purchase_code));

        if ($user_save == true) {

          $user_id = null;
          $session_id = null;
          if ($this->is_login() == true) {
            $user_id = $this->session->userdata('user_id');
            $user_key = array('user_id' => $user_id);
          } else {
            $session_id = $this->crud_model->get_session_id();
            $user_key = array('session_id' => $session_id);
          }

          $user_data = $this->db->get_where('shop_purchase_user', $user_key)->row();
          if (empty($user_data) == true) {
            $ins = array(
              'user_id' => $user_id,
              'session_id' => $session_id,
              'username' => $username,
              'email' => $email,
              'phone' => $phone,
              'postcode' => $postcode,
              'address_1' => $address_1,
              'address_2' => $address_2,
            );
            $this->db->set('register_at', 'NOW()', false);
            $this->db->insert('shop_purchase_user', $ins);
            $cnt = $this->db->affected_rows();
          } else {
            $upd = array(
              'username' => $username,
              'email' => $email,
              'phone' => $phone,
              'postcode' => $postcode,
              'address_1' => $address_1,
              'address_2' => $address_2,
            );
            $this->db->set('register_at', 'NOW()', false);
            $this->db->update('shop_purchase_user', $upd, $user_key);
            $cnt = $this->db->affected_rows();
          }

        }

        echo "done";

      } elseif ($type == 'add') {

        // 기존에 구매하려고 했던것들을 지운다
        if ($this->is_login() == true) {
          $user_id = $this->session->userdata('user_id');
          $user_key = array('user_id' => $user_id);
        } else {
          $session_id = $this->crud_model->get_session_id();
          $user_key = array('session_id' => $session_id);
        }
        $where = $user_key;
        $where['purchase'] = 1;
        $upd['purchase'] = 0;
        $this->db->update('shop_cart', $upd, $where);
  
        $cart_ids = $this->input->post('cart_ids');
        foreach ($cart_ids as $cart_id) {
          $this->db->set('purchase_at', 'NOW()', false);
          $this->db->update('shop_cart', array('purchase' => 1), array('cart_id' => $cart_id));
        }

        echo 'done';

      } else {

        $user_id = 0;
        $session_id = 0;
        if ($this->is_login() == true) {
          $user_id = $this->session->userdata('user_id');
          $user_key = array('user_id' => $user_id);
        } else {
          $session_id = $this->crud_model->get_session_id();
          $user_key = array('session_id' => $session_id);
        }

        $where = $user_key;
        $where['purchase'] = 1;
        $cart_items = $this->db->get_where('shop_cart', $where)->result();
        $shipping_info = $this->db->get_where('shop_shipping_address', $user_key)->result();

        if (count($cart_items) == 0) {
          $this->crud_model->alert_exit('상품이 존재하지 않습니다.', base_url().'home/shop/main');
        }

        $total_price = 0;
        $total_purchase_cnt = 0;
        $total_shipping_fee = 0;
        $total_additional_price = 0;
        $cart_ids = array();
        foreach ($cart_items as $item) {
          $item->product = $this->db->get_where('shop_product', array('product_id' => $item->product_id))->row();
          $item->product_id = $this->db->get_where('shop_product_id', array('product_id' => $item->product_id))->row();
          $item->shop = $this->db->get_where('shop', array('shop_id' => $item->product->shop_id))->row();
          $item->shop_shipping = $this->db->get_where('shop_shipping', array('shop_id' => $item->product->shop_id))->row();
  
          if ($item->product_id->status != SHOP_PRODUCT_STATUS_ON_SALE) {
            $this->crud_model->alert_exit('판매중지상품이 포함되어있습니다. 장바구니에서 확인 후 다시 구매해주세요.', base_url().'home/shop/cart');
          }
          // cart ids
          $cart_ids[] = $item->cart_id;

          // total purchase cnt
          $total_purchase_cnt += $item->total_purchase_cnt;

          // total price
          $item->total_price = ($item->product->item_sell_price * $item->total_purchase_cnt);
          $total_price += $item->total_price;

          // shipping fee
          $item->shipping_fee = 0;
          if ($item->product->item_shipping_free == false) {
  
            if ($item->total_price < $item->shop_shipping->free_shipping_total_price) {
              $item->shipping_fee = ($item->shop_shipping->free_shipping_cond_price *
                ((int)($item->total_purchase_cnt / $item->product->bundle_shipping_cnt) +
                  ($item->total_purchase_cnt % $item->product->bundle_shipping_cnt > 0 ? 1 : 0)));
            }

            $total_shipping_fee += $item->shipping_fee;

          }

          // options -- 변하면 안됨
          $item->item_option_requires = json_decode($item->item_option_requires);
          $item->additional_price = 0;
          foreach ($item->item_option_requires as $opt) {
            $item->additional_price += $opt->price;
            $total_additional_price += $opt->price;
          }
          $item->item_option_others = json_decode($item->item_option_others);
          foreach ($item->item_option_others as $opt) {
            $item->additional_price += $opt->price;
            $total_additional_price += $opt->price;
          }

          $item->total_balance = $item->total_price + $item->shipping_fee + $item->additional_price;

          $upd = array(
            'item_general_price' => $item->product->item_general_price,
            'item_sell_price' => $item->product->item_sell_price,
            'item_discount_rate' => $item->product->item_discount_rate,
            'free_shipping' => $item->shop_shipping->free_shipping,
            'free_shipping_total_price' => $item->shop_shipping->free_shipping_total_price,
            'free_shipping_cond_price' => $item->shop_shipping->free_shipping_cond_price,
            'bundle_shipping_cnt' => $item->product->bundle_shipping_cnt,
            'total_purchase_cnt' => $item->total_purchase_cnt,
            'total_price' => $item->total_price,
            'total_shipping_fee' => $item->shipping_fee,
            'total_additional_price' => $item->additional_price,
            'total_balance' => $item->total_balance,
            'item_tax' => $item->product->item_tax,
            'item_margin' => $item->product->item_margin,
            'item_supply_price' => $item->product->item_supply_price,
          );

          $this->db->set('modified_at', 'NOW()', false);
          $this->db->update('shop_cart', $upd, array('cart_id' => $item->cart_id));
        }

        $total_balance = $total_price + $total_shipping_fee + $total_additional_price;

        $where = $user_key;
        $where['status'] = SHOP_PURCHASE_STATUS_PURCHASING;
        $purchase_info = $this->db->get_where('shop_purchase', $where)->row();
        if (empty($purchase_info)) {
          $ins = $user_key;
          $ins['status'] = SHOP_PURCHASE_STATUS_PREPARED;
          $this->db->insert('shop_purchase', $ins);
          if ($this->db->affected_rows() == 0) {
            $this->crud_model->alert_exit('문제가 발생했습니다. 관리자에게 문의 바랍니다.');
          }
          $purchase_id = $this->db->insert_id();
          $purchase_info = new stdClass();
          $purchase_info->purchase_id = $purchase_id;
        }

        $purchase_info->purchase_code = sprintf('%s%010d', date('ymd'), $purchase_info->purchase_id);
        $purchase_info->status = SHOP_PURCHASE_STATUS_PURCHASING;
        $purchase_info->status_code = $this->crud_model->get_purchase_status_str($purchase_info->status);
        $purchase_info->user_id = $user_id;
        $purchase_info->session_id = $session_id;
        $purchase_info->cart_ids = json_encode($cart_ids);
        $purchase_info->purchase_product_ids = '';
        $purchase_info->total_purchase_cnt = $total_purchase_cnt;
        $purchase_info->total_price = $total_price;
        $purchase_info->total_shipping_fee = $total_shipping_fee;
        $purchase_info->total_additional_price = $total_additional_price;
        $purchase_info->total_balance = $total_balance;
        $purchase_info->receipt_id = '';
        $purchase_info->receipt_url = '';
        $purchase_info->register_at = date('Y-m-d H:i:s');
        $purchase_info->request_at = date('Y-m-d H:i:s');
        $purchase_info->confirmed_at = date('Y-m-d H:i:s');
        $purchase_info->done_at = date('Y-m-d H:i:s');
        $purchase_info->canceled_at = date('Y-m-d H:i:s');
        $purchase_info->bootpay_confirmed_data = '';
        $purchase_info->bootpay_done_data = '';

        $upd = array(
          'purchase_code' => $purchase_info->purchase_code,
          'status' => $purchase_info->status,
          'status_code' => $purchase_info->status_code,
          'user_id' => $purchase_info->user_id,
          'session_id' => $purchase_info->session_id,
          'cart_ids' => $purchase_info->cart_ids,
          'purchase_product_ids' => $purchase_info->purchase_product_ids,
          'total_purchase_cnt' => $purchase_info->total_purchase_cnt,
          'total_price' => $purchase_info->total_price,
          'total_shipping_fee' => $purchase_info->total_shipping_fee,
          'total_additional_price' => $purchase_info->total_additional_price,
          'total_balance' => $purchase_info->total_balance,
          'receipt_id' => $purchase_info->receipt_id,
          'receipt_url' => $purchase_info->receipt_url,
          'register_at' => $purchase_info->register_at,
          'request_at' => $purchase_info->request_at,
          'confirmed_at' => $purchase_info->confirmed_at,
          'canceled_at' => $purchase_info->canceled_at,
          'done_at' => $purchase_info->done_at,
          'bootpay_confirmed_data' => $purchase_info->bootpay_confirmed_data,
          'bootpay_done_data' => $purchase_info->bootpay_done_data,
        );
        $this->db->update('shop_purchase', $upd, array('purchase_id' => $purchase_info->purchase_id));

        $user_info = $this->db->get_where('shop_purchase_user', $user_key)->row();
        if (empty($user_info)) {
          $user_info = new stdClass();
          $user_info->username = '';
          $user_info->phone = '';
          $user_info->email = '';
          $user_info->postcode = '';
          $user_info->address_1 = '';
          $user_info->address_2 = '';
        }
        
        $coupons = array();
        $now = date('Y-m-d H:i:s');
        if ($this->is_login()) {
          $query = <<<QUERY
select * from user_coupon where user_id={$user_id} and used=0 and '{$now}' < use_at order by user_coupon_id desc
QUERY;
          $coupons = $this->db->query($query)->result();
        }

        $this->page_data['coupons'] = $coupons;
        $this->page_data['user_info'] = $user_info;
        $this->page_data['purchase_info'] = $purchase_info;
        $this->page_data['total_purchase_cnt'] = $total_purchase_cnt;
        $this->page_data['total_price'] = $total_price;
        $this->page_data['total_shipping_fee'] = $total_shipping_fee;
        $this->page_data['total_additional_price'] = $total_additional_price;
        $this->page_data['total_balance'] = $total_balance;
        $this->page_data['cart_items'] = $cart_items;
        $this->page_data['shipping_info'] = $shipping_info;
        $this->page_data['shipping_info_cnt'] = count($shipping_info);
        $this->page_data['page_name'] = "shop/purchase";
        $this->page_data['asset_page'] = "shop";
        $this->page_data['page_title'] = "shop";
        $this->load->view('front/index', $this->page_data);
      }

    } elseif ($view == 'shipping') {

      if ($type == 'add') {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('address_name', 'address_name', 'trim|required|max_length[32]');
        $this->form_validation->set_rules('receiver_name', 'receiver_name', 'trim|required|max_length[64]');
        $this->form_validation->set_rules('postcode', 'postcode', 'trim|required|numeric|max_length[8]');
        $this->form_validation->set_rules('address_1', 'address_1', 'trim|required|max_length[128]');
        $this->form_validation->set_rules('address_2', 'address_2', 'trim|required|max_length[128]');
        $this->form_validation->set_rules('phone_1', 'phone_1', 'trim|required|numeric|min_length[9]|max_length[16]');
        $this->form_validation->set_rules('phone_2', 'phone_2', 'trim|numeric|min_length[9]|max_length[16]');
        $this->form_validation->set_rules('shipping_req', 'shipping_req', 'trim|max_length[64]');
        $this->form_validation->set_rules('shipping_req_code', 'shipping_req_code', 'trim|required|numeric|max_length[1]');

        if ($this->form_validation->run() == FALSE) {
          echo '<br>' . validation_errors();
        } else {

          $address_name = $this->input->post('address_name');
          $receiver_name = $this->input->post('receiver_name');
          $postcode = $this->input->post('postcode');
          $address_1 = $this->input->post('address_1');
          $address_2 = $this->input->post('address_2');
          $phone_1 = $this->input->post('phone_1');
          $phone_2 = $this->input->post('phone_2');
          $shipping_req = $this->input->post('shipping_req');
          $shipping_req_code = $this->input->post('shipping_req_code');

          $ins = array(
            'address_name' => $address_name,
            'receiver_name' => $receiver_name,
            'postcode' => $postcode,
            'address_1' => $address_1,
            'address_2' => $address_2,
            'phone_1' => $phone_1,
            'phone_2' => $phone_2,
            'shipping_req' => $shipping_req,
            'shipping_req_code' => $shipping_req_code,
          );
          $this->db->set($ins);
          $this->db->set('register_at', 'NOW()', false);

          if ($this->is_login() == true) {
            $user_id = $this->session->userdata('user_id');
            $this->db->set('user_id', $user_id);
          } else {
            $session_id = $this->crud_model->get_session_id();
            $this->db->set('session_id', $session_id);
          }

          $this->db->insert('shop_shipping_address');
          if ($this->db->affected_rows()) {
            echo 'done';
          } else {
            echo 'fail : not inserted';
          }

        }

      } elseif ($type == 'del') {

        $address_id = $this->input->post('id');

        $this->db->delete('shop_shipping_address', array('address_id' => $address_id));
        if ($this->db->affected_rows()) {
          echo 'done';
        } else {
          echo 'fail: not deleted';
        }

      } elseif ($type == 'new') {
  
        $this->load->view('front/shop/purchase/shipping_address_new');
  
      } else if ($type == 'search') {
        
        $purchase_product_id = $_GET['id'];
        $purchase_product = $this->db->get_where('shop_purchase_product', array('purchase_product_id' => $purchase_product_id))->row();
        if (empty($purchase_product) == true) {
          $this->crud_model->alert_exit('잘못된 접근입니다.');
        }
        
        $shipping_data = json_decode($purchase_product->shipping_data);
        if (empty($shipping_data) == true) {
          $this->crud_model->alert_exit('잘못된 접근입니다.');
        }
  
        $url = sprintf('https://info.sweettracker.co.kr/api/v1/trackingInfo?t_key=%s&t_code=%s&t_invoice=%s',
          APIKEY_SWEET_TRACKER, $shipping_data->shipping_company, $shipping_data->shipping_code);
        
        $opts = array(
          CURLOPT_URL => $url,
          CURLOPT_SSL_VERIFYPEER => false,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_HEADER => false,
        );
        $ch = curl_init();
        curl_setopt_array($ch, $opts);
        $result = json_decode(curl_exec($ch));
//        $this->crud_model->alert_exit(json_encode($result));
        if (isset($result->status) && $result->status == false) {
          $this->crud_model->alert_exit($result->msg.' code : '.$result->code);
        }
        
        $shipping_data->shipping_company_name = $this->db->get_where('shipping_company', array('company_code' => $shipping_data->shipping_company))->row()->company_name;
        
        $shipping_data->data = $result->trackingDetails;
        
        curl_close($ch);
        
        $this->page_data['shipping_data'] = $shipping_data;
        $this->load->view('front/shop/shipping/search', $this->page_data);
        
      } else {

        if ($this->is_login() == true) {
          $user_id = $this->session->userdata('user_id');
          $shipping_info = $this->db->get_where('shop_shipping_address', array('user_id' => $user_id))->result();
        } else {
          $session_id = $this->crud_model->get_session_id();
          $shipping_info = $this->db->get_where('shop_shipping_address', array('session_id' => $session_id))->result();
        }

        $this->page_data['shipping_info'] = $shipping_info;
        $this->page_data['shipping_info_cnt'] = count($shipping_info);
        $this->load->view('front/shop/purchase/shipping_address', $this->page_data);

      }

    } else if ($view == 'qna') {

      $product_id = $_GET['id'];

      if ($type == 'qes') {

        if ($this->is_login() == false) {
          $this->crud_model->alert_exit('로그인 후 이용이 가능합니다.', $this->get_login_url($this->agent->referrer()));
        }

        $user_id = $this->session->userdata('user_id');

        $this->load->library('form_validation');
        $this->form_validation->set_rules('qna_title', 'qna_title', 'trim|required|max_length[64]');
        $this->form_validation->set_rules('qna_body', 'qna_body', 'trim|required|max_length[500]');
        $this->form_validation->set_rules('qna_private', 'qna_private', 'trim|required|is_natural|less_than_equal_to[1]');
        $this->form_validation->set_rules('qna_pw', 'qna_pw', 'trim|is_numeric|min_length[4]|max_length[4]');


        if ($this->form_validation->run() == FALSE) {
          echo '<br>' . validation_errors();
        } else {

          $qna_title = $this->input->post('qna_title');
          $qna_body = $this->input->post('qna_body');
          $qna_private = $this->input->post('qna_private');
          $qna_pw = $this->input->post('qna_pw');

          if ($qna_private) {
            $qna_pw = sha1($qna_pw);
          } else {
            $qna_pw = '';
          }

          $product_data = $this->db->get_where('shop_product_id', array('product_id' => $product_id))->row();

          $ins = array(
            'product_id' => $product_id,
            'user_id' => $user_id,
            'shop_id' => $product_data->shop_id,
            'qes_title' => $qna_title,
            'qes_body' => $qna_body,
            'reply' => '',
            'replied' => 0,
            'is_private' => $qna_private,
            'private_pw' => $qna_pw,
          );
          $this->db->set('qes_at', 'NOW()', false);
          $this->db->set('reply_at', 'NOW()', false);

          $this->db->insert('shop_product_qna', $ins);

          if ($this->db->affected_rows()) {

            $this->db->set('qna', 'qna+1', false);
            $this->db->where('product_id', $product_id);
            $this->db->update('shop_product_id');

            echo 'done';

          } else {
            echo 'fail: not deleted';
          }
        }

      } elseif ($type == 'reply') {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('qna_id', 'qna_id', 'trim|required|is_numeric');
        $this->form_validation->set_rules('qna_pw', 'qna_pw', 'trim|is_numeric|min_length[4]|max_length[4]');

        if ($this->form_validation->run() == FALSE) {
          echo '<br>' . validation_errors();
        } else {

          $qna_id = $this->input->post('qna_id');
          $qna_pw = $this->input->post('qna_pw');

          $qna = $this->db->get_where('shop_product_qna', array('qna_id' => $qna_id))->row();

          if ($qna->is_private == 1) {
            if ($this->is_login() == false) {
              $this->crud_model->alert_exit('로그인 후 이용이 가능합니다.', $this->get_login_url($this->agent->referrer()));
            }

            $user_id = $this->session->userdata('user_id');
            if ($user_id != $qna->user_id) {
              $this->crud_model->alert_exit('본인만 확인 가능합니다.');
            }

            if (sha1($qna_pw) != $qna->private_pw) {
              $this->crud_model->alert_exit('비밀번호가 다릅니다.');
            }
          }

          $this->page_data['qna'] = $qna;
          $this->load->view('front/shop/qna/reply', $this->page_data);

        }

      } else { // list

        $page = $_GET['page'];
        $limit = SHOP_PRODUCT_QNA_LIST_PAGE_SIZE;
        $offset = $limit * ($page - 1);

        $this->db->limit($limit, $offset);
        $this->db->order_by('qna_id', 'desc');
        $qna_data = $this->db->get_where('shop_product_qna', array('product_id' => $product_id))->result();
        foreach ($qna_data as $qna) {
          $qna->user = $this->db->get_where('user', array('user_id' => $qna->user_id))->row();
        }

        $this->page_data['qna_data'] = $qna_data;
        $this->load->view('front/shop/qna/list', $this->page_data);

      }

    } else if ($view == 'review') {

      if ($type == 'register') {

        $purchase_product_id = $_GET['id'];

        $purchase_product = $this->db->get_where('shop_purchase_product', array('purchase_product_id' => $purchase_product_id, 'canceled' => 0))->row();
        if (empty($purchase_product)) {
          $this->crud_model->alert_exit('구매내역이 존재하지 않습니다.');
        }

        if ($this->is_login() == false) {
          $this->crud_model->alert_exit('로그인 후 이용이 가능합니다.', $this->get_login_url($this->agent->referrer()));
        }

        $user_id = $this->session->userdata('user_id');
        if ($user_id != $purchase_product->user_id) {
          $this->crud_model->alert_exit('본인만 확인 가능합니다.');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('review_score', 'review_score', 'trim|required|is_natural_no_zero|less_than_equal_to[5]');
        $this->form_validation->set_rules('review_body', 'review_body', 'trim|required|max_length[500]');
        $this->form_validation->set_rules('review_file_cnt', 'review_file_cnt', 'trim|required|is_natural|less_than_equal_to[3]');


        if ($this->form_validation->run() == FALSE) {
          echo '<br>' . validation_errors();
        } else {

          $review_body = $this->input->post('review_body');
          $review_score = $this->input->post('review_score');
          $review_file_cnt = $this->input->post('review_file_cnt');

          $ins = array(
            'purchase_product_id' => $purchase_product_id,
            'purchase_id' => $purchase_product->purchase_id,
            'purchase_code' => $purchase_product->purchase_code,
            'user_id' => $user_id,
            'product_id' => $purchase_product->product_id,
            'shop_id' => $purchase_product->shop_id,
            'review_score' => $review_score,
            'review_body' => $review_body,
            'review_file_cnt' => $review_file_cnt,
          );
          $this->db->set($ins);
          $this->db->set('review_at', 'NOW()', false);
          $this->db->insert('shop_product_review', $ins);

          if ($this->db->affected_rows()) {

            $review_id = $this->db->insert_id();
            $i = 0;
            $review_img_url = array();
            for (; $i < $review_file_cnt; $i++) {
              if (isset($_FILES["review_file_{$i}"]) == true) {
                $this->crud_model->file_validation($_FILES["review_file_{$i}"]);
                $file_name = 'review_' . $review_id . '_' . $i . '.jpg';
                $this->crud_model->upload_image(IMG_PATH_SHOP, $file_name, $_FILES["review_file_{$i}"], 400, 0, true, true);
                $time = time();
                $file_name = 'review_' . $review_id . '_' . $i . '_thumb.jpg';
                $review_img_url[$i] = IMG_WEB_PATH_SHOP . $file_name . '?id=' . $time;
              }
            }
            for (; $i < SHOP_PRODUCT_REVIEW_IMAGE_COUNT_MAX; $i++) {
              $review_img_url[$i] = '';
            }
            for ($i = 1; $i <= SHOP_PRODUCT_REVIEW_IMAGE_COUNT_MAX; $i++) {
              $this->db->set('review_img_url_'.$i, $review_img_url[$i-1]);
            }
            $this->db->where('review_id', $review_id);
            $this->db->update('shop_product_review');

            $this->db->set('review', 'review+1', false);
            $this->db->set('review_score', 'review_score+'.$review_score, false);
            $this->db->where('product_id', $purchase_product->product_id);
            $this->db->update('shop_product_id');

            $this->db->update('shop_purchase_product', array('reviewed' => 1), array('purchase_product_id' => $purchase_product_id));

            echo 'done';

          } else {
            echo 'fail : not inserted';
          }

        }

      } elseif ($type == 'body') {

        $review_id = $_GET['id'];
        $review = $this->db->get_where('shop_product_review', array('review_id' => $review_id))->row();

        $this->page_data['review'] = $review;
        $this->load->view('front/shop/review/body', $this->page_data);

      } else { // list

        $product_id = $_GET['id'];
        $page = $_GET['page'];
        $limit = SHOP_PRODUCT_REVIEW_LIST_PAGE_SIZE;
        $offset = $limit * ($page - 1);

        $this->db->limit($limit, $offset);
        $this->db->order_by('review_id', 'desc');
        $review_data = $this->db->get_where('shop_product_review', array('product_id' => $product_id))->result();
        foreach ($review_data as $review) {
          $review->user = $this->db->get_where('user', array('user_id' => $review->user_id))->row();
        }

        $this->page_data['review_data'] = $review_data;
        $this->load->view('front/shop/review/list', $this->page_data);
      }
  
    } else if ($view == 'main') {
  
      $category = 'all';
      $page = 1;
      $order = 'asc';
      $limit = 6;
      $offset = ($page - 1) * $limit;
      $status = SHOP_PRODUCT_STATUS_ON_SALE;
  
      $order_col = 'best';
      $best_items = $this->crud_model->get_product_list(0, $status, '', $category, $offset, $limit, $order, $order_col);
      foreach ($best_items as $item) {
        $item->like = false;
        if ($this->is_login() == true) {
          $user_id = $this->session->userdata('user_id');
          $item->like = $this->crud_model->get_sns_mark('product', 'like', $user_id, $item->product_id);
      
        }
      }
      $order_col = 'new';
      $new_items = $this->crud_model->get_product_list(0, $status, '', $category, $offset, $limit, $order, $order_col);
      foreach ($new_items as $item) {
        $item->like = false;
        if ($this->is_login() == true) {
          $user_id = $this->session->userdata('user_id');
          $item->like = $this->crud_model->get_sns_mark('product', 'like', $user_id, $item->product_id);
      
        }
      }
      $order_col = 'recommend';
      $recommend_items = $this->crud_model->get_product_list(0, $status, '', $category, $offset, $limit, $order, $order_col);
      foreach ($recommend_items as $item) {
        $item->like = false;
        if ($this->is_login() == true) {
          $user_id = $this->session->userdata('user_id');
          $item->like = $this->crud_model->get_sns_mark('product', 'like', $user_id, $item->product_id);
      
        }
      }
  
      $sliders = $this->db->get_where('main_slider', array('activate' => 1, 'type' => MAIN_SLIDER_TYPE_SHOP))->result();
      $blogs = $this->db->get_where('blog', array('shop_view' => 1, 'activate' => 1))->result();
  
      $this->page_data['best_items'] = $best_items;
      $this->page_data['new_items'] = $new_items;
      $this->page_data['recommend_items'] = $recommend_items;
      $this->page_data['sliders'] = $sliders;
      $this->page_data['blogs'] = $blogs;
      $this->page_data['page_name'] = "shop/main";
      $this->page_data['asset_page'] = "shop";
      $this->page_data['page_title'] = "shop";
      $this->load->view('front/index', $this->page_data);
  
    } else if ($view == 'list') {

      $category = $_GET['cat'];
      $page = $_GET['page'];
      $order_col = $_GET['col'];
      $order = $_GET['order'];

      if ($category == 'all' || $category == 'ALL') {
        $limit = SHOP_PRODUCT_NEW_LIST_PAGE_SIZE;
        $user_id = 0;
      } elseif ($category == 'wish' || $category =='WISH') {
        if ($this->is_login() == false) {
          $this->redirect_login();
        }

        $user_id = $this->session->userdata('user_id');
        $limit = SHOP_PRODUCT_LIKE_LIST_PAGE_SIZE;
      } else {
        $limit = SHOP_PRODUCT_LIST_PAGE_SIZE;
        $user_id = 0;
      }
      $offset = ($page - 1) * $limit;
      $status = array(SHOP_PRODUCT_STATUS_ON_SALE,SHOP_PRODUCT_STATUS_STOP_SALE);
      $shop_items = $this->crud_model->get_product_list(0, $status, '', $category, $offset, $limit, $order, $order_col, $user_id);
      foreach ($shop_items as $item) {
        $item->like = false;
        if ($this->is_login() == true) {
          $user_id = $this->session->userdata('user_id');
          $item->like = $this->crud_model->get_sns_mark('product', 'like', $user_id, $item->product_id);

        }
      }

      $this->page_data['shop_items'] = $shop_items;
      $this->load->view('front/shop/product_list', $this->page_data);

    } else { // shop list index

      $category = $_GET['cat'];
      $order_col = $_GET['col'];
      $order = $_GET['order'];
      
      if (strncmp($category, '01', 2) == 0) {
        $best_order_col = 'best';
      } else {
        $best_order_col = 'sell';
      }

      if ($category != 'all' && $category != 'ALL' && $category != 'wish' && $category != 'WISH') {
        $best_cat = sprintf('%s%s', substr($category, 0, 2), '0000');
        $best_items = $this->crud_model->get_product_list(0, SHOP_PRODUCT_STATUS_ON_SALE, '', $best_cat, 0,
          SHOP_PRODUCT_BEST_LIST_PAGE_SIZE, 'asc', $best_order_col);
        foreach ($best_items as $item) {
          $item->like = false;
          if ($this->is_login() == true) {
            $user_id = $this->session->userdata('user_id');
            $item->like = $this->crud_model->get_sns_mark('product', 'like', $user_id, $item->product_id);

          }
        }
        $this->page_data['best_items'] = $best_items;
        
        // category text
        $cat_level = $this->crud_model->get_product_category_level($category);
        if ($cat_level > 1) {
          $where_cat = sprintf('%s%%', substr($category, 0, 4));
          $query = <<<QUERY
select * from shop_product_category where cat_code like '{$where_cat}' order by cat_code asc
QUERY;
        } else {
          $where_cat = sprintf('%s%%', substr($category, 0, 2));
          $query = <<<QUERY
select * from shop_product_category where cat_code like '{$where_cat}' and cat_level=2 order by cat_code asc
QUERY;
        }
        $cats = $this->db->query($query)->result();
        
        $this->page_data['cats'] = $cats;
        $this->page_data['cat_level'] = $cat_level;
//        $this->crud_model->alert_exit(json_encode($cats));
      } elseif ($category == 'wish' || $category =='WISH') {
        if ($this->is_login() == false) {
          $this->redirect_login();
        }
      }
      
      $this->page_data['category'] = $category;
      $this->page_data['order'] = $order;
      $this->page_data['col'] = $order_col;
      $this->page_data['page_name'] = "shop";
      $this->page_data['asset_page'] = "shop";
      $this->page_data['page_title'] = "shop";
      $this->load->view('front/index', $this->page_data);

    }
  }

  public function bootpay($para1 = '', $para2 = '', $para3 = '')
  {
    echo 'OK';
  }

  public function notice($para1 = '', $para2 = '', $para3 = '')
  {
    if ($para1 == 'list') {

      $page = $_GET['page'];
      $type = $_GET['type'];

      $limit = NOTICE_LIST_PAGE_SIZE;
      $offset = ($page - 1) * $limit;

      if ($type == 'all') {
        $types = array(BLOG_TYPE_NOTICE_ALL, BLOG_TYPE_NOTICE_USER);
      } elseif ($type == 'faq') {
        $types = array(BLOG_TYPE_NOTICE_FAQ);
      } elseif ($type == 'introduce') {
        $types = array(BLOG_TYPE_NOTICE_INTRODUCE);
      } elseif ($type == 'center') {
        $types = array(BLOG_TYPE_NOTICE_CENTER);
      } elseif ($type == 'teacher') {
        $types = array(BLOG_TYPE_NOTICE_TEACHER);
      } elseif ($type == 'brand') {
        $types = array(BLOG_TYPE_NOTICE_BRAND);
      }
      $this->db->where_in('type', $types);
      $categories = $this->db->get_where('category_blog', array('activate' => 1))->result();

      $category_ids = array();
      foreach ($categories as $c) {
        $category_ids[] = $c->category_id;
      }

      $this->db->limit($limit, $offset);
      $this->db->where_in('blog_category', $category_ids);
      $this->db->order_by('modified_at', 'desc');
      $notice_infos = $this->db->get_where('blog', array('activate' => 1))->result();

      $this->page_data['notice_infos'] = $notice_infos;
      $this->load->view('front/notice/list', $this->page_data);

    } elseif ($para1 == 'detail') {

      $notice_id = $_GET['id'];

      $notice = $this->db->get_where('blog', array('blog_id' => $notice_id))->row();
      $this->page_data['notice'] = $notice;
      $this->load->view('front/notice/detail', $this->page_data);

    } else {

      $type = $_GET['type'];

      $title = '';
      if ($type == 'all') {
        $title = '공지사항';
      } elseif ($type == 'faq') {
        $title = '자주하는 질문';
      } elseif ($type == 'introduce') {
        $title = '파운디 소개';
      } elseif ($type == 'center') {
        $title = '센터 공지사항';
      } elseif ($type == 'teacher') {
        $title = '강사 공지사항';
      } elseif ($type == 'brand') {
        $title = '브랜드 공지사항';
      }

      $this->page_data['title'] = $title;
      $this->page_data['type'] = $type;
      $this->page_data['page_name'] = "notice";
      $this->page_data['asset_page'] = "notice";
      $this->page_data['page_title'] = "notice";
      $this->load->view('front/index', $this->page_data);

    }
  }
  
  public function coupon($para1 = '', $para2 = '', $para3 = '')
  {
    $user_id = $this->session->userdata('user_id');
  
    if ($para1 == 'list') {
      if ($para2 == 'my') {
        if ($this->is_login() == false) {
          $this->crud_model->alert_exit('로그인 후 이용이 가능합니다.', $this->get_login_url($this->agent->referrer()));
        }
  
        $page = $_GET['page'];
        $limit = COUPON_LIST_PAGE_SIZE;
        $offset = $limit * ($page - 1);
        $query = <<<QUERY
select * from user_coupon where user_id={$user_id} order by user_coupon_id desc limit {$offset},{$limit}
QUERY;
        $coupons = $this->db->query($query)->result();
        $this->page_data['coupons'] = $coupons;
        $this->load->view('front/coupon/my_coupon_list', $this->page_data);
      } else {
        $page = $_GET['page'];
        $limit = COUPON_LIST_PAGE_SIZE;
        $offset = $limit * ($page - 1);
        $query = <<<QUERY
select * from server_coupon where activate=1 and start_at < NOW() and NOW() < end_at order by coupon_id desc limit {$offset},{$limit}
QUERY;
        $coupons = $this->db->query($query)->result();
        $this->page_data['coupons'] = $coupons;
        $this->page_data['user_id'] = $user_id;
        $this->load->view('front/coupon/coupon_list', $this->page_data);
      }
  
    } else if ($para1 == 'receive') {
  
      if ($this->is_login() == false) {
        $this->crud_model->alert_exit('로그인 후 이용이 가능합니다.', $this->get_login_url($this->agent->referrer()));
      }
      
      $coupon_id = $_GET['id'];
  
      $now = date('Y-m-d H:i:s');
      $coupon_data = $this->db->get_where('server_coupon', array('coupon_id' => $coupon_id))->row();
      if ($coupon_data->start_at > $now || $now > $coupon_data->end_at) {
        echo '발급 기간이 지났습니다.';
        exit;
      }
      if ($coupon_data->activate == 0) {
        echo '발급 중지된 쿠폰입니다.';
        exit;
      }
      $received = $this->db->get_where('user_coupon', array('user_id' => $user_id, 'coupon_id' => $coupon_id))->row();
      if (isset($received) == true && empty($received) == false) {
        echo '이미 발급 받은 쿠폰입니다.';
        exit;
      }
  
      if ($coupon_data->user_type == COUPON_USER_TYPE_REGISTER) {
        if ($coupon_data->coupon_count > 0) {
          $query = <<<QUERY
select user_id from user order by user_id asc limit 0,{$coupon_data->coupon_count}
QUERY;
          $user_ids = $this->db->query($query)->result();
      
          $where_in = false;
          foreach ($user_ids as $u) {
//            $this->crud_model->alert_exit(json_encode($u));
            if ($u->user_id == $user_id) {
              $where_in = true;
            }
          }
          if ($where_in == false) {
            echo '쿠폰 발급 대상자가 아닙니다.';
            exit;
          }
        }
      }
  
      $coupon_code = sprintf('%s%010d%010d', date('ymdHis'), $user_id, $coupon_id);
      $ins = array(
        'user_id' => $user_id,
        'coupon_code' => $coupon_code,
        'coupon_id' => $coupon_id,
        'coupon_type' => $coupon_data->coupon_type,
        'coupon_benefit' => $coupon_data->coupon_benefit,
        'coupon_title' => $coupon_data->coupon_title,
        'coupon_desc' => $coupon_data->coupon_desc,
        'coupon_img_url' => $coupon_data->coupon_img_url,
        'used' => 0,
        'use_at' => $coupon_data->use_at,
      );
      $this->db->set('create_at', 'NOW()', false);
      $this->db->set('used_at', 'NOW()', false);
  
      $this->db->insert('user_coupon', $ins);
  
      echo 'done';
  
    } else if ($para1 == 'get') {
  
      if ($this->is_login() == false) {
        $this->crud_model->alert_exit('로그인 후 이용이 가능합니다.', $this->get_login_url($this->agent->referrer()));
      }
      
      $user_coupon_id = $_GET['id'];
      $user_id = $this->session->userdata('user_id');
      
      $coupon = $this->db->get_where('user_coupon', array('user_coupon_id' => $user_coupon_id))->row();
      if (empty($coupon)) {
        $result['status'] = 'error';
        $result['message'] = "존재하지 않는 쿠폰입니다.";
        echo json_encode($result);
        exit;
      }
      
      if ($coupon->user_id != $user_id) {
        $result['status'] = 'error';
        $result['message'] = "존재하지 않는 쿠폰입니다.";
        echo json_encode($result);
        exit;
      }
     
      $now = date('Y-m-d H:i:s');
      if ($coupon->use_at < $now) {
        $result['status'] = 'error';
        $result['message'] = "사용기간이 지났습니다.";
        echo json_encode($result);
        exit;
      }
      
      $result['coupon'] = $coupon;
      $result['status'] = 'success';
      $result['message'] = "";
      echo json_encode($result);
      
    } else {
      if ($this->is_login() == false) {
        $this->redirect_login();
      }
      $this->page_data['page_name'] = "coupon";
      $this->page_data['asset_page'] = "user_profile";
      $this->page_data['page_title'] = "coupon";
      $this->load->view('front/index', $this->page_data);
    }
  }
  
  public function qna()
  {
    $user_id = 0;
    if ($this->is_login() == true) {
      $user_id = $this->session->userdata('user_id');
    }
  
    $this->load->library('form_validation');
    $this->form_validation->set_rules('qna_body', 'qna_body', 'trim|required|max_length[500]');
    $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|max_length[64]');
    
    if ($this->form_validation->run() == FALSE) {
      echo '<br>' . validation_errors();
    } else {
      $question = $this->input->post('qna_body');
      $email = $this->input->post('email');
    
      $ins = array(
        'user_id' => $user_id,
        'email' => $email,
        'question' => $question,
        'reply' => '',
        'replied' => 0,
      );
      $this->db->set('question_at', 'NOW()', false);
      $this->db->set('reply_at', 'NOW()', false);
    
      $this->db->insert('user_qna', $ins);
    
      echo 'done';
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
    $page = '';
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
    $page = '';
    if (isset($_GET['p'])) {
      $page = $_GET['p'];
    }
    $this->page_data['page_name'] = $page;
    $this->page_data['msg'] = $msg;
    $this->load->view('front/others/info', $this->page_data);
  }
  
  private function redirect_error($msg = '', $page = '') {
    redirect(base_url().'home/error?m='.$msg.'&p='.$page);
  }
  
  private function redirect_info($msg = '', $page = '') {
    redirect(base_url().'home/info?m='.$msg.'&p='.$page);
  }
  
  private function response($status, $msg = '') {
    $result['status'] = $status;
    if ($status == 'done' && $msg == '') {
      $msg = '성공하였습니다!';
    }
    $result['message'] = $msg;
    echo json_encode($result);
    exit;
  }
}
