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
                $login_data = $this->db->get_where('user', array('email' => $this->input->post('email'), 'password' => sha1($this->input->post('password')), 'user_type' => 'admin'));
                if ($login_data->num_rows() > 0) {
                    foreach ($login_data->result_array() as $row) {
                        $this->session->set_userdata('login', 'yes');
                        $this->session->set_userdata('admin_login', 'yes');
                        $this->session->set_userdata('admin_id', $row['user_id']);
                        $this->session->set_userdata('admin_name', $row['username']);
                        $this->session->set_userdata('title', 'admin');
                        echo 'lets_login';
                    }
                } else {
                    echo 'login_failed';
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
            echo 'yah!good';
        } else {
            echo 'nope!bad';
        }
    }

    /* Manage Admin Settings */
    function manage_admin($para1 = "")
    {
        if ($this->session->userdata('admin_login') != 'yes') {
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
        if ($para1 == 'do_add') {
            $data['name'] = $this->input->post('name');
            $this->db->insert('blog_category', $data);
            redirect(base_url() . 'admin/blog_category');
        } else if ($para1 == 'edit') {
            $page_data['blog_category_data'] = $this->db->get_where('blog_category', array('blog_category_id' => $para2))->result_array();
            $this->load->view('back/admin/blog_category_edit', $page_data);
        } elseif ($para1 == "update") {
            $data['name'] = $this->input->post('name');
            $this->db->where('blog_category_id', $para2);
            $this->db->update('blog_category', $data);
            redirect(base_url() . 'admin/blog_category');
        } elseif ($para1 == 'delete') {
            $this->db->where('blog_category_id', $para2);
            $this->db->delete('blog_category');
            redirect(base_url() . 'admin/blog_category');
        } elseif ($para1 == 'list') {
            //            $this->db->order_by('blog_category_id', 'desc');
            $page_data['all_categories'] = $this->db->get('blog_category')->result_array();
            $this->load->view('back/admin/blog_category_list', $page_data);
        } elseif ($para1 == 'add') {
            $this->load->view('back/admin/blog_category_add');
        } else {
            $page_data['page_name'] = "blog_category";
            $page_data['all_categories'] = $this->db->get('blog_category')->result_array();
            $this->load->view('back/index', $page_data);
        }
    }

    /*Product Category add, edit, view, delete */
    function blog($para1 = '', $para2 = '')
    {
        if ($para1 == 'do_add') {
            $data['title'] = $this->input->post('title');
            $data['date'] = $this->input->post('date');
            $data['author'] = $this->input->post('author');
            $data['summery'] = $this->input->post('summery');
            $data['blog_category'] = $this->input->post('blog_category');
            $data['description'] = $this->input->post('description');
            $this->db->insert('blog', $data);
            $id = $this->db->insert_id();
            $this->crud_model->file_up("img", "blog", $id, '', '', '.jpg');
            //            redirect(base_url() . "admin/blog/1_{$_FILES['img']['tmp_name']}");
        } else if ($para1 == 'edit') {
            $page_data['blog_data'] = $this->db->get_where('blog', array('blog_id' => $para2))->result_array();
            $this->load->view('back/admin/blog_edit', $page_data);
        } elseif ($para1 == "update") {
            $data['title'] = $this->input->post('title');
            $data['date'] = $this->input->post('date');
            $data['author'] = $this->input->post('author');
            $data['summery'] = $this->input->post('summery');
            $data['blog_category'] = $this->input->post('blog_category');
            $data['description'] = $this->input->post('description');
            $this->db->where('blog_id', $para2);
            $this->db->update('blog', $data);
            $this->crud_model->file_up("img", "blog", $para2, '', '', '.jpg');
            redirect(base_url() . 'admin/blog');
        } elseif ($para1 == 'delete') {
            $this->crud_model->file_dlt('blog', $para2, '.jpg');
            $this->db->where('blog_id', $para2);
            $this->db->delete('blog');
            redirect(base_url() . 'admin/blog');
        } elseif ($para1 == 'list') {
            $this->db->order_by('blog_id', 'desc');
            $page_data['all_blogs'] = $this->db->get('blog')->result_array();
            $this->load->view('back/admin/blog_list', $page_data);
        } elseif ($para1 == 'add') {
            $this->load->view('back/admin/blog_add');
        } else {
            $page_data['page_name'] = "blog";
            $page_data['all_blogs'] = $this->db->get('blog')->result_array();
            $this->load->view('back/index', $page_data);
        }
    }

    public function upload()
    {
        # 매달 해당월 폴더 제작
        //        $mydir = UPLOAD.date('Ym');
        $mydir = '/html/uploads/blog_image';
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
            # 이미지 리사이징 가로 900px 이상만 리사이징됨
            $img_conf['image_library'] = 'gd2';
            $img_conf['source_image'] = $data['upload_data']['full_path'];
            $img_conf['create_thumb'] = TRUE;
            $img_conf['quality'] = '90%';
            $img_conf['maintain_ratio'] = TRUE;
            $img_conf['new_image'] = $mydir;
            if ($data['upload_data']['image_width'] > 900) {
                $img_conf['width'] = 900;
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
        if (isset($_FILES["file"]["name"])) {
            $this->load->library('upload');

            $config['upload_path'] = '/html/uploads/blog_image/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('image')) {
                $this->upload->display_errors();
                return FALSE;
            } else {
                $data = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = '/html/uploads/blog_image/' . $data['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '60%';
                $config['width'] = 800;
                $config['height'] = 800;
                $config['new_image'] = '/html/uploads/blog_image/' . $data['file_name'];
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
        $src = $this->input->post('src');
        $file_name = str_replace(base_url(), '', $src);
        if (unlink($file_name)) {
            echo 'File Delete Successfully';
        } else {
            echo $file_name;
        }
    }

    /* teacher Management */
    function teacher($para1 = '', $para2 = '', $para3 = '')
    {
        if ($this->session->userdata('admin_login') != 'yes') {
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
            $page_data['activate'] = $this->db->get_where('teacher', array('teacher_id' => $para2))->row()->activate;
            $this->load->view('back/admin/teacher_approval', $page_data);
        } else if ($para1 == 'approval_set') {
            $teacher = $para2;
            $approval = $this->input->post('approval');
            if ($approval == 'ok') {
                $data['activate'] = 1;
            } else {
                $data['activate'] = 0;
            }
            $this->db->where('teacher_id', $teacher);
            $this->db->update('teacher', $data);
//            $this->email_model->status_email('teacher', $teacher);
        }else {
            if ($para1 == 'approval_list') {
                $page_data['page_name'] = "teacher";
                $page_data['para2'] = "approval";
                $page_data['all_teachers'] = $this->db->get_where('teacher', array('activate' => 0))->result_array();
            } else {
                $page_data['page_name'] = "teacher";
                $page_data['para2'] = "";
                $page_data['all_teachers'] = $this->db->get_where('teacher', array('activate' => 1))->result_array();
            }
            $this->load->view('back/index', $page_data);
        }
    }
}
