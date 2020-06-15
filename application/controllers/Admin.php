<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Admin extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('spreadsheet');

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
  }

  /* index of the admin. Default: Dashboard; On No Login Session: Back to login page. */
  public function index()
  {
    if ($this->session->userdata('admin_login') == 'yes') {
      $page_data['page_name'] = "dashboard";
      $this->load->view('back/index', $page_data);
    } else {
      $page_data['control'] = "admin";
      $this->load->view('back/login', $page_data);
    }
  }

  /* Login into Admin panel */
  function login($para1 = '')
  {
    if ($para1 == 'forget_form') {
      $page_data['control'] = 'admin';
      $this->load->view('back/forget_password', $page_data);
    } else if ($para1 == 'forget') {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
      if ($this->form_validation->run() == FALSE) {
        echo validation_errors();
      } else {
        $query = $this->db->get_where('admin', array('email' => $this->input->post('email')));
        if ($query->num_rows() > 0) {
          $admin_id = $query->row()->admin_id;
          $password = substr(hash('sha512', rand()), 0, 12);
          $data['password'] = sha1($password);
          $this->db->where('admin_id', $admin_id);
          $this->db->update('admin', $data);
          if ($this->email_model->password_reset_email('admin', $admin_id, $password)) {
            echo 'email_sent';
          } else {
            echo 'email_not_sent';
          }
        } else {
          echo 'email_nay';
        }
      }
    } else {
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
            $this->session->set_userdata('login', 'yes');
            $this->session->set_userdata('admin_login', 'yes');
            $this->session->set_userdata('admin_id', $user_data->user_id);
            $this->session->set_userdata('admin_name', $user_data->nickname);
            $this->session->set_userdata('title', 'admin');

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
    $this->session->sess_destroy();
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
    if ($this->is_logged() == false) {
      redirect(base_url() . 'admin');
    }

    if ($para1 == 'do_add') {

      $data['name'] = $this->input->post('name');
      $this->db->insert('category_blog', $data);
      redirect(base_url() . 'admin/blog_category');

    } else if ($para1 == 'edit') {

      $page_data['blog_category_data'] = $this->db->get_where('category_blog', array('category_id' => $para2))->result_array();
      $this->load->view('back/admin/blog_category_edit', $page_data);

    } elseif ($para1 == "update") {

      $data['name'] = $this->input->post('name');
      $this->db->where('category_id', $para2);
      $this->db->update('category_blog', $data);
      redirect(base_url() . 'admin/blog_category');

    } elseif ($para1 == 'delete') {

      $this->db->where('category_id', $para2);
      $this->db->delete('category_blog');
      redirect(base_url() . 'admin/blog_category');

    } elseif ($para1 == 'list') {
      //            $this->db->order_by('blog_category_id', 'desc');
      $page_data['all_categories'] = $this->db->get('category_blog')->result_array();
      $this->load->view('back/admin/blog_category_list', $page_data);

    } elseif ($para1 == 'add') {

      $this->load->view('back/admin/blog_category_add');

    } else {

      $page_data['page_name'] = "blog_category";
      $page_data['all_categories'] = $this->db->get('category_blog')->result_array();
      $this->load->view('back/index', $page_data);

    }
  }

  /*Product Category add, edit, view, delete */
  function blog($para1 = '', $para2 = '')
  {
    if ($this->is_logged() == false) {
      redirect(base_url() . 'admin');
    }

    if ($para1 == 'do_add') {

      $blog_id = $para2;

      if (!isset($_FILES["img"]["tmp_name"])) {
        redirect(base_url() . "admin/blog");
        exit;
      }

      $time = time();
      $file_name = 'blog_'.$blog_id.'.jpg';
      $main_image_url = base_url().'uploads/blog_image/blog_'.$blog_id.'_thumb.jpg?id='.$time;

      //      $this->crud_model->file_up("img", "blog", $blog_id, '', '', '.jpg', '400', '250');
      $this->crud_model->upload_image(IMG_PATH_BLOG, $file_name, $_FILES["img"]["tmp_name"], 400, 250, true, false);

      $data['blog_id'] = $blog_id;
      $data['main_image_url'] = $main_image_url;
      $data['title'] = $this->input->post('title');
      $data['summery'] = $this->input->post('summery');
      $data['blog_category'] = $this->input->post('category_blog');
      $data['description'] = $this->input->post('description');
      $this->db->insert('blog', $data);

      $files = 'blog_'.$blog_id.'_*.*';
      $except_file = 'blog_'.$blog_id.'_thumb.jpg';
      $this->crud_model->del_upload_image(IMG_WEB_PATH_BLOG, IMG_PATH_CENTER, $data['description'], $files, $except_file);

      redirect(base_url() . "admin/blog");
    } else if ($para1 == 'edit') {

      $page_data['blog_data'] = $this->db->get_where('blog', array('blog_id' => $para2))->result_array();
      $this->load->view('back/admin/blog_edit', $page_data);

    } elseif ($para1 == "update") {

      $blog_id = $para2;

      if (isset($_FILES["img"]["tmp_name"])) {
        $file_name = 'blog_'.$blog_id.'.jpg';
//      $this->crud_model->file_up("img", "blog", $blog_id, '', '', '.jpg', '400', '250');
        $this->crud_model->upload_image(IMG_PATH_BLOG, $file_name, $_FILES["img"]["tmp_name"], 400, 250, true, false);
      }

      $time = time();
      $main_image_url = base_url().'uploads/blog_image/blog_'.$blog_id.'_thumb.jpg?id='.$time;
      $data['main_image_url'] = $main_image_url;

      $data['title'] = $this->input->post('title');
      $data['summery'] = $this->input->post('summery');
      $data['blog_category'] = $this->input->post('category_blog');
      $data['description'] = $this->input->post('description');

      $this->db->where('blog_id', $blog_id);
      $this->db->update('blog', $data);

      $files = 'blog_'.$blog_id.'_*.*';
      $except_file = 'blog_'.$blog_id.'_thumb.jpg';
      $this->crud_model->del_upload_image(IMG_WEB_PATH_BLOG, IMG_PATH_CENTER, $data['description'], $files, $except_file);

      redirect(base_url() . 'admin/blog');

    } elseif ($para1 == 'upload_image') {

      $blog_id = $para2;

      if (isset($_FILES["file"]["tmp_name"])) {
        $time = gettimeofday();
        $file_name = 'blog_'.$blog_id.'_'.$time['sec'].$time['usec'].'.jpg';
        $this->crud_model->upload_image(IMG_PATH_BLOG, $file_name, $_FILES["file"]["tmp_name"], 400, 0, false, true);
        echo json_encode(array('success' => true, 'filename' => $file_name));
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
      redirect(base_url() . 'admin/blog');

    } elseif ($para1 == 'list') {

      $this->db->order_by('blog_id', 'desc');
      $page_data['all_blogs'] = $this->db->get('blog')->result_array();
      $this->load->view('back/admin/blog_list', $page_data);

    } elseif ($para1 == 'add') {

      $data['user_id'] = $this->session->userdata('user_id');
      $this->db->set($data);
      $this->db->set('date', 'NOW()', false);
      $this->db->insert('blog_id');
      $blog_id = $this->db->insert_id();

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

    } else {

      $page_data['page_name'] = "blog";
      $page_data['all_blogs'] = $this->db->get('blog')->result_array();
      $this->load->view('back/index', $page_data);

    }
  }

  public function upload()
  {
    if ($this->is_logged() == false) {
      redirect(base_url() . 'admin');
    }
    # 매달 해당월 폴더 제작
    //        $mydir = UPLOAD.date('Ym');
    $mydir = '/web/public_html/uploads/blog_image';
    if (!is_dir($mydir)) {
      if (@mkdir($mydir, 0777)) {
        @chmod($mydir, 0777);
      }
    }
    # 파일 업로드
    $config['upload_path'] = $mydir;
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = 2048;
    $config['max_width'] = 0;
    $config['max_height'] = 0;
    $config['encrypt_name'] = true;
    $log_field = array();
    $this->load->library('upload', $config);
    if (!$this->upload->do_upload('file')) {
      $error_message = $this->upload->display_errors();
      echo json_encode(array('success' => false, 'error' => strip_tags($error_message), 'url' => $mydir));
      exit();
    } else {
      $data = array('upload_data' => $this->upload->data());
      $save_url = base_url() . 'uploads/blog_image/' . $data['upload_data']['file_name'];
      # 이미지 리사이징 가로 400px 이상만 리사이징됨
      $img_conf['image_library'] = 'gd2';
      $img_conf['source_image'] = $data['upload_data']['full_path'];
      $img_conf['create_thumb'] = TRUE;
      $img_conf['quality'] = '100%';
      $img_conf['maintain_ratio'] = TRUE;
      $img_conf['new_image'] = $mydir;
      if ($data['upload_data']['image_width'] > 400) {
        $img_conf['width'] = 400;
        $img_conf['master_dim'] = 'width';
      }
      $this->load->library('image_lib', $img_conf);
      if ($this->image_lib->resize()) {
        # URL 다시 설정
        $refile_arr = explode('.', $data['upload_data']['file_name']);
        $refile = $refile_arr[0] . '_thumb.' . $refile_arr[1];
        $save_url = base_url() . 'uploads/blog_image/' . $refile;
        unlink($data['upload_data']['full_path']);
      }
      echo json_encode(array('success' => true, 'save_url' => $save_url));
      exit();
    }
  }

  //Upload image summernote
  function upload_image()
  {
    if ($this->is_logged() == false) {
      redirect(base_url() . 'admin');
    }
    if (isset($_FILES["file"]["name"])) {
      $this->load->library('upload');

      $config['upload_path'] = '/web/public_html/uploads/blog_image/';
      $config['allowed_types'] = 'jpg|jpeg|png|gif';
      $this->upload->initialize($config);
      if (!$this->upload->do_upload('image')) {
        $this->upload->display_errors();
        return FALSE;
      } else {
        $data = $this->upload->data();
        //Compress Image
        $config['image_library'] = 'gd2';
        $config['source_image'] = '/web/public_html/uploads/blog_image/' . $data['file_name'];
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = TRUE;
        $config['quality'] = '100%';
        $config['width'] = 400;
        $config['height'] = 300;
        $config['new_image'] = '/web/public_html/uploads/blog_image/' . $data['file_name'];
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
        echo base_url() . 'uploads/blog_image/' . $data['file_name'];
      }
    } else {
      $error_message = $this->upload->display_errors();
      echo json_encode(array('success' => false, 'error' => strip_tags($error_message)));
      exit();
    }
  }

  //Delete image summernote
  function delete_image()
  {
    if ($this->is_logged() == false) {
      redirect(base_url() . 'admin');
    }
    $src = $this->input->post('src');
    $file_name = str_replace(base_url(), '', $src);
    if (unlink($file_name)) {
      echo 'File Delete Successfully';
    } else {
      echo $file_name;
    }
  }

  /* center Management */
  function center($para1 = '', $para2 = '', $para3 = '')
  {
    if ($this->is_logged() == false) {
      redirect(base_url() . 'admin');
    }

    if ($para1 == 'list') {

      if ($para2 == 'approval') {
        $this->db->order_by('center_id', 'desc');
        $page_data['all_centers'] = $this->db->get_where('center', array('activate' => 0))->result_array();
      } else {
        $this->db->order_by('center_id', 'desc');
        $page_data['all_centers'] = $this->db->get_where('center', array('activate' => 1))->result_array();
      }
      $this->load->view('back/admin/center_list', $page_data);

    } else if ($para1 == 'view') {

      $page_data['center_data'] = $this->db->get_where('center', array('center_id' => $para2))->result_array();
      $this->load->view('back/admin/center_view', $page_data);

    } else if ($para1 == 'delete') {

      $this->db->where('center_id', $para2);
      $this->db->delete('center');

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
      if ($approval == 'ok') {
        $data['activate'] = 1;
      } else {
        $data['activate'] = 0;
      }

      $query = <<<QUERY
UPDATE center set activate={$data['activate']},approval_at=NOW() where center_id={$center_id}
QUERY;
      $this->db->query($query);

      $query = <<<QUERY
UPDATE center_category set activate={$data['activate']} where center_id={$center_id}
QUERY;
      $this->db->query($query);

      $query = <<<QUERY
select count(*) as cnt from center where user_id={$user_id}
QUERY;
      $center_cnt = $this->db->query($query)->row()->cnt;

      $user_data = $this->db->get_where('user', array('user_id' => $user_id));

      $user_type = USER_TYPE_CENTER;
      if ($center_cnt > 0 and ($user_data->user_type & USER_TYPE_CENTER) == false) {
        $query = <<<QUERY
UPDATE user set user_type=user_type+{$user_type} where user_id={$user_id}
QUERY;
        $this->db->query($query);
      } else if ($center_cnt == 0 and ($user_data->user_type & USER_TYPE_CENTER) == true) {
        $query = <<<QUERY
UPDATE user set user_type=user_type-{$user_type} where user_id={$user_id}
QUERY;
        $this->db->query($query);
      }

      //            $this->email_model->status_email('teacher', $teacher);

    }else {
      if ($para1 == 'approval_list') {
        $page_data['page_name'] = "center";
        $page_data['list_type'] = "approval";
        $page_data['all_centers'] = $this->db->get_where('center', array('activate' => 0))->result_array();
      } else {
        $page_data['page_name'] = "center";
        $page_data['list_type'] = "";
        $page_data['all_centers'] = $this->db->get_where('center', array('activate' => 1))->result_array();
      }
      $this->load->view('back/index', $page_data);
    }
  }

  /* teacher Management */
  function teacher($para1 = '', $para2 = '', $para3 = '')
  {
    if ($this->is_logged() == false) {
      redirect(base_url() . 'admin');
    }

    if ($para1 == 'list') {

      if ($para2 == 'approval') {
        $this->db->order_by('teacher_id', 'desc');
        $page_data['all_teachers'] = $this->db->get_where('teacher', array('activate' => 0))->result_array();
      } else {
        $this->db->order_by('teacher_id', 'desc');
        $page_data['all_teachers'] = $this->db->get_where('teacher', array('activate' => 1))->result_array();
      }
      $this->load->view('back/admin/teacher_list', $page_data);

    } else if ($para1 == 'view') {

      $page_data['teacher_data'] = $this->db->get_where('teacher', array('teacher_id' => $para2))->result_array();
      $this->load->view('back/admin/teacher_view', $page_data);

    } else if ($para1 == 'delete') {

      $this->db->where('teacher_id', $para2);
      $this->db->delete('teacher');

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
      if ($approval == 'ok') {
        $data['activate'] = 1;
      } else {
        $data['activate'] = 0;
      }

      $query = <<<QUERY
UPDATE teacher set activate={$data['activate']},approval_at=NOW() where teacher_id={$teacher_id}
QUERY;
      $this->db->query($query);

      $user_type = USER_TYPE_TEACHER;
      if ($approval == 'ok') {
        $query = <<<QUERY
UPDATE user set user_type=user_type+{$user_type} where user_id={$user_id}
QUERY;
      } else {
        $query = <<<QUERY
UPDATE user set user_type=user_type-{$user_type} where user_id={$user_id}
QUERY;
      }
      $this->db->query($query);

      //            $this->email_model->status_email('teacher', $teacher);
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
    if ($this->is_logged() == false) {
      redirect(base_url() . 'admin');
    }

    $type = $para1;

    if ($type == 'add') {

      $this->load->view('back/admin/slider_add');

    } elseif ($type == 'do_add') {

      if (!isset($_FILES["img"]["tmp_name"])) {
        redirect(base_url() . "admin/slider");
        exit;
      }

      $data['slider_image_url'] = '';
      $data['category'] = $this->input->post('category');
      $data['title'] = $this->input->post('title');
      $data['desc'] = $this->input->post('desc');
      $data['activate'] = 0;
      $this->db->insert('main_slider', $data);
      $slider_id = $this->db->insert_id();

      $time = time();
      $file_name = 'slider_'.$slider_id.'.jpg';
      $slider_image_url = base_url().'uploads/slider_image/slider_'.$slider_id.'_thumb.jpg?id='.$time;
      $this->crud_model->upload_image(IMG_PATH_SLIDER, $file_name, $_FILES["img"]["tmp_name"], 400, 250, true, false);

      $upd['slider_image_url'] = $slider_image_url;
      $this->db->where('slider_id', $slider_id);
      $this->db->update('main_slider', $upd);

      redirect(base_url() . "admin/slider");

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

      //            $this->email_model->status_email('teacher', $teacher);

    } elseif ($type == 'edit') {

      $slider_id = $para2;
      $page_data['slider'] = $this->db->get_where('main_slider', array('slider_id' => $slider_id))->row();
      $this->load->view('back/admin/slider_edit', $page_data);

    } elseif ($type == 'update') {

      $slider_id = $para2;

      if (isset($_FILES["img"]["tmp_name"])) {
        $time = time();
        $file_name = 'slider_'.$slider_id.'.jpg';
        $slider_image_url = base_url().'uploads/slider_image/slider_'.$slider_id.'_thumb.jpg?id='.$time;
        $this->crud_model->upload_image(IMG_PATH_SLIDER, $file_name, $_FILES["img"]["tmp_name"], 400, 250, true, false);
        $data['slider_image_url'] = $slider_image_url;
      }

      $data['category'] = $this->input->post('category');
      $data['title'] = $this->input->post('title');
      $data['desc'] = $this->input->post('desc');
      $this->db->set('date', 'NOW()', false);
      $this->db->where('slider_id', $slider_id);
      $this->db->update('main_slider', $data);

      redirect(base_url() . "admin/slider");

    } elseif ($type == 'delete') {

      $slider_id = $para2;
      $this->db->where('slider_id', $slider_id);
      $this->db->delete('main_slider');
      redirect(base_url() . 'admin/slider');

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

}
