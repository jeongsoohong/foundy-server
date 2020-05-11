<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Home extends CI_Controller
{
  function __construct()
  {
    parent::__construct();

    $this->load->database();

    if (!$this->input->is_ajax_request()) {
      $this->output->set_header('HTTP/1.0 200 OK');
      $this->output->set_header('HTTP/1.1 200 OK');
      $this->output->set_header('Last-Modified: ' . gmdate('D, d M Y H:i:s', time()) . ' GMT');
      $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
      $this->output->set_header('Cache-Control: post-check=0, pre-check=0');
      $this->output->set_header('Pragma: no-cache');

      if ($this->router->fetch_method() == 'index' ||
        $this->router->fetch_method() == 'blog' ||
        $this->router->fetch_method() == 'blog_view') {
        $this->output->cache(60);
      }
    }

    // $this->config->cache_query();
  }

  public function index()
  {
    $page_data['page_name'] = "home";
    $page_data['asset_page'] = "home";
    $page_data['page_title'] = "home";
    $this->load->view('front/index', $page_data);
  }

  function error()
  {
    $this->load->view('front/others/404_error');
  }

  public function login()
  {
    if ($this->session->userdata('user_login') == "yes") {
      redirect('home', 'refresh');
    }

    $login_type = $this->uri->segment(3);

    if (!strncmp($login_type, "kakao", 5)) {
      //header('Content-Type: application/json; charset=UTF-8');
      $result = array();
      $redirect_url = base_url();

      if (!isset($_POST) || !isset($_POST['id'])) {
        $redirect_url .= "home/login";
        $result['status'] = 'error';
        $result['message'] = "오류가 발생했습니다. 다시 로그인해주세요(1).";
        $result['redirect_url'] = $redirect_url;
      } else {

        $connected_at = $_POST['connected_at'];
        $properties= $_POST['properties'];
        $kakao_account = $_POST['kakao_account'];
        $profile = $kakao_account['profile'];

        $kakao_id = (int)$_POST['id'];

        $user_data = $this->db->get_where('user', array('kakao_id' => $kakao_id))->row();

        if (empty($user_data)) {
          $user_type = USER_TYPE_GENERAL;
          $username = '';
          $nickname = $profile['nickname'];
          $gender = $kakao_account['gender'];
          $email = $kakao_account['email'];
          $phone = '';
          $kakao_thumbnail_image_url = $profile['thumbnail_image_url'];
          $kakao_profile_image_url = $profile['profile_image_url'];
          $profile_image_url = '';
          $password = '';
          $create_at = $connected_at;

          $ins = array(
            'kakao_id' => $kakao_id,
            'user_type' => $user_type,
            'username' => $username,
            'nickname' => $nickname,
            'gender' => $gender,
            'email' => $email,
            'phone' => $phone,
            'kakao_thumbnail_image_url' => $kakao_thumbnail_image_url,
            'kakao_profile_image_url' => $kakao_profile_image_url,
            'profile_image_url' => $profile_image_url,
            'password' => $password,
            'last_login_at' => date("Y-m-d H:i:s"),
            'create_at' => $create_at,
          );

          $this->db->insert('user',$ins);
          $result['message'] = "첫 방문을 환영합니다.";
        } else {

          $user_id = $user_data->user_id;
          $kakao_id = $user_data->kakao_id;
          $email = $user_data->email;
          $user_type = $user_data->user_type;
          $nickname = $user_data->nickname;
          $kakao_thumbnail_image_url = $user_data->kakao_thumbnail_image_url;
          $profile_image_url = $user_data->profile_image_url;

          $this->db->update('user', array('last_login_at' => date("Y-m-d H:i:s")), array('kakao_id' =>
            $kakao_id));
          $result['message'] = "로그인해주셔서 감사합니다.";
        }

        $this->session->set_userdata('user_login', 'yes');
        $this->session->set_userdata('user_id', $user_id);
        $this->session->set_userdata('kakao_id', $kakao_id);
        $this->session->set_userdata('email', $email);
        $this->session->set_userdata('user_type', $user_type);
        $this->session->set_userdata('nickname', $nickname);
        $this->session->set_userdata('kakao_thumbnail_image_url', $kakao_thumbnail_image_url);
        $this->session->set_userdata('profile_image_url', $profile_image_url);

        $redirect_url .= 'home';
        $result['status'] = 'success';
        $result['redirect_url'] = $redirect_url;
      }

      echo json_encode($result);
      exit;
    } else if (!strncmp($login_type, "kakao/rest", 5)) { /* kakao rest api를 이용한 간편 로그인 방법 - 사용 안함 */

      redirect('home', 'refresh');

      if (!isset($_GET["code"])) {
        $base_url = base_url();
        echo ("<script>alert('오류가 발생했습니다. 다시 로그인해주세요.'); window.location.href='${base_url}home/login';</script>");
      }

      $code = $_GET["code"];	//발급받은 code 값

      $app_key = "a7e336b59aed62d0e46dae8a8c55da21";
      $redirect_uri = "http://10.0.4.56/home/login/kakao";

      $api_url = "https://kauth.kakao.com/oauth/token";
      $params = sprintf( 'grant_type=authorization_code&client_id=%s&redirect_uri=%s&code=%s', $app_key, $redirect_uri, $code);

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
      $result = json_decode(curl_exec($ch));

      if (isset($result->error)) {
        $base_url = base_url();
        $message = sprintf("오류가 발생했습니다. 다시 로그인해주세요. 오류 메세지 : %s'", $result->error_description);
        echo ("<script>alert(\"$message\"); window.location.href='${base_url}home/login';</script>");
        exit;
      }

      $access_token = $result->access_token;
      $token_type = $result->token_type;
      $refresh_token = $result->refresh_token;
      $expires_in = $result->expires_in;
      $scope = $result->scope;
      $refresh_token_expires_in = $result->refresh_token_expires_in;

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
      $result = json_decode(curl_exec($ch));

      curl_close($ch);

      $this->session->set_userdata('user_login', 'yes');

      //$base_url = base_url();
      //echo ("<script>alert('로그인해 주셔서 감사합니다.'); window.location.href='${base_url}home';</script>");
    } else {
      $page_data['page_name'] = "user/login";
      $page_data['asset_page'] = "login";
      $page_data['page_title'] = "login";
      $this->load->view('front/index', $page_data);
    }
  }

  /* FUNCTION: Logout set */
  function logout()
  {
    $redirect_url = base_url();
    $this->session->sess_destroy();
    $result['status'] = 'success';
    $result['redirect_url'] = $redirect_url;
    $result['message'] = "로그아웃 되었습니다.";
    echo json_encode($result);
    exit;
  }

  /* FUNCTION: Unregister set */
  function unregister()
  {
    if ($this->session->userdata('user_login') != "yes") {
      $this->session->set_flashdata('alert', "login first!");
      redirect(base_url() . 'home', 'refresh');
    }

    $user_id = $this->session->userdata('user_id');

    $this->db->where('user_id', $user_id);
    $this->db->delete('user');

    $redirect_url = base_url();
    $this->session->sess_destroy();
    $result['status'] = 'success';
    $result['redirect_url'] = $redirect_url;
    $result['message'] = "회원탈퇴 되었습니다.";
    echo json_encode($result);
    exit;
  }

  /* FUNCTION: Loads Contact Page */
  function blog($para1 = "")
  {
    $page_data['category'] = $para1;
    $page_data['page_name'] = 'blog';
    $page_data['asset_page'] = 'blog';
    $page_data['page_title'] = 'blog';
    $this->load->view('front/index', $page_data);
  }

  /* FUNCTION: Loads Contact Page */
  function blog_by_cat($para1 = "")
  {
    $page_data['category'] = $para1;
    $this->load->view('front/blog/blog_list', $page_data);
  }

  function ajax_blog_list($para1 = "")
  {
    $this->load->library('Ajax_pagination');

    $category_id = $this->input->post('blog_category');
    if ($category_id !== '' && $category_id !== 'all') {
      $this->db->where('blog_category', $category_id);
    }

    // pagination
    $config['total_rows'] = $this->db->count_all_results('blog');
    $config['base_url'] = base_url() . 'index.php?home/listed/';
    $config['per_page'] = 3;
    $config['uri_segment'] = 5;
    $config['cur_page_giv'] = $para1;

    $function = "filter_blog('0')";
    $config['first_link'] = '&laquo;';
    $config['first_tag_open'] = '<li><a onClick="' . $function . '">';
    $config['first_tag_close'] = '</a></li>';

    $rr = ($config['total_rows'] - 1) / $config['per_page'];
    $last_start = floor($rr) * $config['per_page'];
    $function = "filter_blog('" . $last_start . "')";
    $config['last_link'] = '&raquo;';
    $config['last_tag_open'] = '<li><a onClick="' . $function . '">';
    $config['last_tag_close'] = '</a></li>';

    $function = "filter_blog('" . ($para1 - $config['per_page']) . "')";
    $config['prev_tag_open'] = '<li><a onClick="' . $function . '">';
    $config['prev_tag_close'] = '</a></li>';

    $function = "filter_blog('" . ($para1 + $config['per_page']) . "')";
    $config['next_link'] = '&rsaquo;';
    $config['next_tag_open'] = '<li><a onClick="' . $function . '">';
    $config['next_tag_close'] = '</a></li>';

    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';

    $config['cur_tag_open'] = '<li class="active"><a>';
    $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';

    $function = "filter_blog(((this.innerHTML-1)*" . $config['per_page'] . "))";
    $config['num_tag_open'] = '<li><a onClick="' . $function . '">';
    $config['num_tag_close'] = '</a></li>';
    $this->ajax_pagination->initialize($config);

    $this->db->order_by('blog_id', 'desc');
    if ($category_id !== '' && $category_id !== 'all') {
      $this->db->where('blog_category', $category_id);
    }

    $page_data['blogs'] = $this->db->get('blog', $config['per_page'], $para1)->result_array();
    if ($category_id !== '' && $category_id !== 'all') {
      $category = $this->crud_model->get_type_name_by_id('blog_category', $category_id, 'name');
    } else {
      $category = ('all_blogs');
    }
    $page_data['category_name'] = $category;
    $page_data['count'] = $config['total_rows'];

    $this->load->view('front/blog/ajax_list', $page_data);
  }

  /* FUNCTION: Loads Contact Page */
  function blog_view($para1 = "")
  {
    $page_data['blog'] = $this->db->get_where('blog', array('blog_id' => $para1))->result_array();
    $page_data['categories'] = $this->db->get('blog_category')->result_array();

    $this->db->where('blog_id', $para1);
    $this->db->update('blog', array(
      'number_of_view' => 'number_of_view + 1'
    ));
    $page_data['page_name'] = 'blog/blog_view';
    $page_data['asset_page'] = 'blog_view';
    $page_data['page_title'] = $this->db->get_where('blog', array('blog_id' => $para1))->row()->title;
    $this->load->view('front/index.php', $page_data);
  }

  function user()
  {
    if ($this->session->userdata('user_login') != "yes") {
      redirect(base_url() . 'home/login', 'refresh');
    }

    $base_url = base_url();
    $view_type = $this->uri->segment(3);

    if ($view_type == 'info') {

      $page_data['user_id'] = $this->session->userdata('user_id');
      $page_data['email'] = $this->session->userdata('email');
      $page_data['user_type'] = $this->session->userdata('user_type');
      $page_data['nickname'] = $this->session->userdata('nickname');
      $page_data['profile_image_url'] = $this->session->userdata('profile_image_url');
      $page_data['thumbnail_image_url'] = $this->session->userdata('kakao_thumbnail_image_url');

      if ($this->session->userdata('user_type') & USER_TYPE_CENTER) {
        $row = $this->db->get_where('center', array( 'user_id' => $this->session->userdata('user_id') ))->row();
        $page_data['center_activate'] = $row->activate;
      }

      if ($this->session->userdata('user_type') & USER_TYPE_TEACHER) {
        $row = $this->db->get_where('teacher', array( 'user_id' => $this->session->userdata('user_id') ))->row();
        $page_data['teacher_activate'] = $row->activate;
      }

      $this->load->view('front/user/profile', $page_data);

    } elseif ($view_type == "center_register") {

      $user_id = $this->session->userdata('user_id');
      $query = <<<QUERY
SELECT center_id FROM user WHERE user_id={$user_id}
QUERY;
      $row = $this->db->query($query)->row();

      if ($row->center_id > 0) {
        echo ("<script>alert('이미신청하셨습니다'); window.location.href='{$base_url}home/user'</script>");
        exit;
      } else {
        $this->load->view('front/user/center_register');
      }

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

    } elseif ($view_type == "do_center_register") {
      $this->load->library('form_validation');

      $this->form_validation->set_rules('title', 'center-title', 'trim|required|max_length[32]');
      $this->form_validation->set_rules('phone', 'center-phone', 'trim|required|numeric|max_length[16]');
      $this->form_validation->set_rules('about', 'about', 'trim|required|max_length[64]');
      $this->form_validation->set_rules('address', 'center-address', 'trim|required|max_length[256]');
      $this->form_validation->set_rules('address_detail', 'center-address-detail', 'trim|max_length[256]');
      $this->form_validation->set_rules('latitude', 'center-latitude', 'trim|required|max_length[32]');
      $this->form_validation->set_rules('longitude', 'center-longitude', 'trim|required|max_length[32]');

      if ($this->form_validation->run() == FALSE) {
        echo '<br>' . validation_errors();
      } else {
        $user_id = $this->session->userdata('user_id');
        $title = $this->input->post('title');
        $phone = $this->input->post('phone');
        $about = $this->input->post('about');
        $address = $this->input->post('address');
        $address_detail = $this->input->post('address_detail');
        $longitude = $this->input->post('longitude');
        $latitude = $this->input->post('latitude');
        $categories_yoga = $this->input->post('category_yoga');
        $categories_pilates = $this->input->post('category_pilates');

        $address_detail = (empty($address_detail) ? '' : $address_detail);

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

        $data = array(
          'user_id' => $user_id,
          'title' => $title,
          'phone' => $phone,
          'about' => $about,
          'address' => $address,
          'address_detail' => $address_detail,
          'latitude' => $latitude,
          'longitude' => $longitude,
          'activate' => 0
        );
        $this->db->set($data);
        $this->db->set('location', "ST_GeomFromText('POINT({$longitude} {$latitude})')", false);
        $this->db->set('create_at', 'NOW()', false);
        $this->db->set('approval_at', 'NOW()', false);
        $this->db->insert('center');

        $center_id = $this->db->insert_id();

        foreach ($categories_yoga as $cat) {
          $cat = trim($cat);
          $this->db->insert('center_category', array('center_id' => $center_id, 'category' => $cat, 'type' => CENTER_TYPE_YOGA));
        }

        foreach ($categories_pilates as $cat) {
          $cat = trim($cat);
          $this->db->insert('center_category', array('center_id' => $center_id, 'category' => $cat, 'type' => CENTER_TYPE_PILATES));
        }

        $this->db->where('user_id', $user_id);
        $this->db->update('user', array( 'center_id' => $center_id));

        $this->session->set_userdata('center_id', $center_id);

        echo "done";
      }
    } elseif ($view_type == "do_teacher_register") {
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
        $user_id = $this->session->userdata('user_id');
        $about = $this->input->post('about');
        $youtube = $this->input->post('youtube');
        $instagram = $this->input->post('instagram');
//        $homepage = $this->input->post('homepage');
        $categories = $this->input->post('category');

        if (empty($youtube) && empty($instagram)) {
          echo ("<script>alert('유뷰브와 인스타그램 중 최소 하나는 입력해주세요');</script>");
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
          'create_at' => 'NOW()',
          'approval_at' => 'NOW()'
        );
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
    } else {
      if ($view_type == 'center') {
        $page_data['part'] = 'center_register';
      } else if ($view_type == 'teacher') {
        $page_data['part'] = 'teacher_register';
      } else {
        $page_data['part'] = 'info';
      }
      $page_data['page_name'] = "user";
      $page_data['asset_page'] = "user_profile";
      $page_data['page_title'] = "my_profile";
      $this->load->view('front/index', $page_data);
    }

  }

  function center($para1 = "", $para2 = "", $para3 = "")
  {
    $base_url = base_url();

    if ($para1 == "profile") {

      $center_user_id = $para2;

      if ($center_user_id == $this->session->userdata('user_id')) {
        $iam_this_center = true;
      } else {
        $iam_this_center = false;
      }

      $user_data = $this->db->get_where('user', array('user_id' => $center_user_id))->row();
      if (!($user_data->user_type & USER_TYPE_CENTER)) {
        echo ("<script>alert('센터회원이 아닙니다'); window.location.href='{$base_url}home/user'</script>");
        exit;
      }

      $center_data = $this->db->get_where('center', array('user_id' => $center_user_id))->row();
      if ($center_data->activate == 0) {
        echo ("<script>alert('승인 대기 중입니다'); window.location.href='{$base_url}home/user'</script>");
        exit;
      }

      $page_data['page_name'] = "center/profile";
      $page_data['asset_page'] = "center_profile";
      $page_data['page_title'] = "center_profile";
      $page_data['user_data'] = $user_data;
      $page_data['center_data'] = $center_data;
      $page_data['iam_this_center'] = $iam_this_center;
      $this->load->view('front/index', $page_data);

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

        $result['status'] = 'success';
        $result['teacher_name'] = $teacher_data->name;
        $result['teacher_email'] = $user_data->email;
        $result['teacher_id'] = $teacher_data->teacher_id;

        echo json_encode($result);
        exit;

      } else {

        $center_user_id = $para2;
        if ($center_user_id != $this->session->userdata('user_id')) {
          echo ("<script>alert('권한이 없습니다'); window.location.href='{$base_url}home/user'</script>");
          exit;
        }

        $user_data = $this->db->get_where('user', array('user_id' => $center_user_id))->row();
        if (!($user_data->user_type & USER_TYPE_CENTER)) {
          echo ("<script>alert('센터회원이 아닙니다'); window.location.href='{$base_url}home/user'</script>");
          exit;
        }

        $center_data = $this->db->get_where('center', array('user_id' => $center_user_id))->row();
        if ($center_data->activate == 0) {
          echo ("<script>alert('승인 대기 중입니다'); window.location.href='{$base_url}home/user'</script>");
          exit;
        }

        $page_data['page_name'] = "center/teacher";
        $page_data['asset_page'] = "center_teacher_info";
        $page_data['page_title'] = "center_teacher_info";
        $page_data['user_data'] = $user_data;
        $page_data['center_data'] = $center_data;
        $this->load->view('front/index', $page_data);

      }

    }
  }

  function teacher($para1 = "", $para2 = "", $para3 = "")
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
      if (!($user_data->user_type & USER_TYPE_TEACHER)) {
        echo ("<script>alert('강사회원이 아닙니다'); window.location.href='{$base_url}home/user'</script>");
        exit;
      }

      $teacher_data = $this->db->get_where('teacher', array('user_id' => $teacher_user_id))->row();
      if ($teacher_data->activate == 0) {
        echo ("<script>alert('승인 대기 중입니다'); window.location.href='{$base_url}home/user'</script>");
        exit;
      }

      $where = array (
        'teacher_id' => $teacher_data->teacher_id,
        'activate' => 1
      );

      $video_data = $this->db->order_by('video_id', 'desc')->get_where('teacher_video', $where)->result();

      $page_data['page_name'] = "teacher/profile";
      $page_data['asset_page'] = "teacher_profile";
      $page_data['page_title'] = "teacher_profile";
      $page_data['user_data'] = $user_data;
      $page_data['teacher_data'] = $teacher_data;
      $page_data['video_data'] = $video_data;
      $page_data['iam_this_teacher'] = $iam_this_teacher;
      $this->load->view('front/index', $page_data);

    } else if ($para1 == 'video') {

      $action = $para2;

      if ($action != 'view') {

        $teacher_user_id = $para3;
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

        $page_data['page_name'] = "teacher/video/".$action;
        $page_data['asset_page'] = "teacher_video_".$action;
        $page_data['page_title'] = "teacher_video_".$action;
        $page_data['user_data'] = $user_data;
        $page_data['teacher_data'] = $teacher_data;
        $this->load->view('front/index', $page_data);

      } else {
        $video_id = $para3;

        $video_data = $this->db->get_where('teacher_video', array('video_id' => $video_id))->row();
        if (empty($video_data)) {
          echo ("<script>alert('잘못된 접근이 감지 되었습니다'); window.location.href='{$base_url}home'</script>");
          exit;
        }

        $teacher_data = $this->db->get_where('teacher', array('teacher_id' => $video_data->teacher_id))->row();
        if (empty($teacher_data)) {
          echo ("<script>alert('잘못된 접근이 감지 되었습니다'); window.location.href='{$base_url}home'</script>");
          exit;
        }

        $user_data = $this->db->get_where('user', array('user_id' => $teacher_data->user_id))->row();
        if (empty($teacher_data)) {
          echo ("<script>alert('잘못된 접근이 감지 되었습니다'); window.location.href='{$base_url}home'</script>");
          exit;
        }

        $this->db->where(array('video_id' => $video_id));
        $this->db->set('view', 'view + 1', false);
        $this->db->update('teacher_video');

        $video_data->view += 1;

        $page_data['page_name'] = "teacher/video/".$action;
        $page_data['asset_page'] = "teacher_video_".$action;
        $page_data['page_title'] = "teacher_video_".$action;
        $page_data['video_data'] = $video_data;
        $page_data['teacher_data'] = $teacher_data;
        $page_data['user_data'] = $user_data;
        $this->load->view('front/index', $page_data);
      }

    } else if ($para1 == 'do_add_video') {

      $teacher_user_id = $para2;

      if ($teacher_user_id != $this->session->userdata('user_id')) {
        echo ("<script>alert('권한이 없습니다'); window.location.href='{$base_url}home/user'</script>");
        exit;
      }

      $user_data = $this->db->get_where('user', array('user_id' => $teacher_user_id))->row();
      $str = json_encode($user_data);
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
        $content = file_get_contents("http://youtube.com/get_video_info?video_id=".$youtube_id);
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

        $youtube_url = "http://www.youtube.com/embed/".$youtube_id;

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

  function find($para1 = '', $para2 = '')
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
          $video_data = $this->db->order_by('video_id', 'desc')->get('teacher_video', $limit, $offset)->result();
        } else {
          $this->db->order_by('video_id', 'desc');
          $video_list = $this->db->get_where('teacher_video_category', array('category' => $filter), $limit, $offset)->result();

          $video_data= array();
          if (!empty($video_list) && count($video_list) > 0) {
            $video_id_list = array();
            foreach ($video_list as $video) {
              $video_id_list[] = $video->video_id;
            }
            $this->db->where_in('video_id', $video_id_list);
            $video_data = $this->db->order_by('video_id', 'desc')->get('teacher_video')->result();
          }
        }

        $page_data['video_data'] = $video_data;
        $this->load->view('front/find/class/list', $page_data);

      } else {

        $video_data = $this->db->order_by('video_id', 'desc')->get('teacher_video', 10, 0)->result();

        $page_data['video_data'] = $video_data;
        $page_data['page_name'] = "find/class";
        $page_data['asset_page'] = "class";
        $page_data['page_title'] = "class";
        $this->load->view('front/index', $page_data);

      }

    } else {

      $page_data['page_name'] = "find";
      $page_data['asset_page'] = "find";
      $page_data['page_title'] = "find";
      $this->load->view('front/index', $page_data);

    }
  }

}
