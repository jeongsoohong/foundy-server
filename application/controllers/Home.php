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
                $result['message'] = "오류가 발생했습니다. 다시 로그인해주세요.";
                $result['redirect_url'] = $redirect_url;
            } else {

                $connected_at = $_POST['connected_at'];
                $properties= $_POST['properties'];
                $kakao_account = $_POST['kakao_account'];
                $profile = $kakao_account['profile'];

                $user_id = (int)$_POST['id'];

                $user_data = $this->db->get_where('user', array('user_id' => $user_id))->row();

                //if ($user_data->num_rows()) {
                if (empty($user_data)) {
                    $user_type = 'general';
                    $username = '';
                    $nickname = $profile['nickname'];
                    $gender = $kakao_account['gender'];
                    $email = $kakao_account['email'];
                    $phone = '';
                    $address1 = '';
                    $address2 = '';
                    $thumbnail_image_url = $profile['thumbnail_image_url'];
                    $profile_image_url = $profile['profile_image_url'];
                    $custom_image_url = '';
                    $password = '';
                    $create_at = $connected_at;

                    $ins = array(
                        'user_id' => $user_id,
                        'user_type' => $user_type,
                        'username' => $username,
                        'nickname' => $nickname,
                        'gender' => $gender,
                        'email' => $email,
                        'phone' => $phone,
                        'address1' => $address1,
                        'address2' => $address2,
                        'thumbnail_image_url' => $thumbnail_image_url,
                        'profile_image_url' => $profile_image_url,
                        'custom_image_url' => $custom_image_url,
                        'password' => $password,
                        'last_login' => date("Y-m-d H:i:s"),
                        'create_at' => $create_at,
                    );

                    $this->db->insert('user',$ins);
                    $result['message'] = "첫 방문을 환영합니다.";
                } else {

                    $email = $user_data->email;
                    $user_type = $user_data->user_type;
                    $nickname = $user_data->nickname;
                    $thumbnail_image_url = $user_data->thumbnail_image_url;
                    $profile_image_url = $user_data->profile_image_url;
                    $custom_image_url = $user_data->custom_data_url;

                    $this->db->update('user', array('last_login' => date("Y-m-d H:i:s")), array('user_id' => $user_id));
                    $result['message'] = "로그인해주셔서 감사합니다.";
                }

                $this->session->set_userdata('user_login', 'yes');
                $this->session->set_userdata('user_id', $user_id);
                $this->session->set_userdata('email', $email);
                $this->session->set_userdata('user_type', $user_type);
                $this->session->set_userdata('nickname', $nickname);
                $this->session->set_userdata('thumbnail_image_url', $thumbnail_image_url);
                $this->session->set_userdata('profile_image_url', $profile_image_url);
                $this->session->set_userdata('custom_image_url', $custom_image_url);

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

    function user()
    {
        if ($this->session->userdata('user_login') != "yes") {
            redirect(base_url() . 'home/login', 'refresh');
        }

        $view_type = $this->uri->segment(3);

        if ($view_type == 'info') {

            $page_data['user_id'] = $this->session->userdata('user_id');
            $page_data['email'] = $this->session->userdata('email');
            $page_data['user_type'] = $this->session->userdata('user_type');
            $page_data['nickname'] = $this->session->userdata('nickname');
            $page_data['profile_image_url'] = $this->session->userdata('profile_image_url');
            $page_data['thumbnail_image_url'] = $this->session->userdata('thumbname_image_url');
            $page_data['custom_image_url'] = $this->session->userdata('custom_image_url');

            $this->load->view('front/user/profile', $page_data);

        } elseif ($view_type == "center_register") {
            $this->load->view('front/user/center_register');
        } elseif ($view_type == "teacher_register") {
            $this->load->view('front/user/teacher_register');
        } elseif ($view_type == "do_center_register") {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('title', 'center-title', 'trim|required|max_length[32]');
            $this->form_validation->set_rules('phone', 'center-phone', 'trim|required|numeric|max_length[16]');
            $this->form_validation->set_rules('address', 'center-address', 'trim|required|max_length[256]');
            $this->form_validation->set_rules('latitude', 'center-latitude', 'trim|required|max_length[32]');
            $this->form_validation->set_rules('longitude', 'center-longitude', 'trim|required|max_length[32]');

            if ($this->form_validation->run() == FALSE) {
                echo '<br>' . validation_errors();
            } else {
                $user_id = $this->session->userdata('user_id');
                $title = $this->input->post('title');
                $phone = $this->input->post('phone');
                $address = $this->input->post('address');
                $longitude = $this->input->post('longitude');
                $latitude = $this->input->post('latitude');

                $query = <<<QUERY
INSERT INTO center (user_id,title,phone,address,location,latitude,longitude,activate,create_at,approval_at) 
values ({$user_id},'{$title}','{$phone}','{$address}',ST_GeomFromText('POINT({$longitude} {$latitude})'),'{$latitude}',
'{$longitude}',false,NOW(),NOW())
QUERY;
                $this->db->query($query);
                $id = $this->db->insert_id();

                echo "done";
            }
        } elseif ($view_type == "do_teacher_register") {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('introduce', 'introduce', 'trim|required|max_length[64]');
            $this->form_validation->set_rules('youtube_url', 'youtube_url', 'trim|required|valid_url|max_length[256]');
            $this->form_validation->set_rules('instagram_url', 'instagram_url', 'trim|valid_url|max_length[256]');
            $this->form_validation->set_rules('homepage_url', 'homepage_url', 'trim|valid_url|max_length[256]');

            if ($this->form_validation->run() == FALSE) {
                echo '<br>' . validation_errors();
            } else {
                $user_id = $this->session->userdata('user_id');
                $introduce = $this->input->post('introduce');
                $youtube_url = $this->input->post('youtube_url');
                $instagram_url = $this->input->post('instagram_url');
                $homepage_url = $this->input->post('homepage_url');

                $query = <<<QUERY
INSERT INTO teacher (user_id,introduce,youtube_url,instagram_url,homepage_url,activate,create_at,approval_at) 
values ({$user_id},'{$introduce}','{$youtube_url}','{$instagram_url}','{$homepage_url}',false,NOW(),NOW())
QUERY;
                $this->db->query($query);
                $id = $this->db->insert_id();

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
        $page_data['page_title'] = ('blog');
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

    function error()
    {
        $this->load->view('front/others/404_error');
    }

}
