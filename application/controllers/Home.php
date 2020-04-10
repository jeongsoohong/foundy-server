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

            if ($this->router->fetch_method() == 'index') {
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
        $type = $this->uri->segment(3);
        if (!strncmp($type, "kakao", 5)) {

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

            $base_url = base_url();
            echo ("<script>alert('로그인해 주셔서 감사합니다.'); window.location.href='${base_url}home';</script>");
        } else {
            $page_data['page_name'] = "user/login";
            $page_data['asset_page'] = "login";
            $page_data['page_title'] = "login";
            $this->load->view('front/index', $page_data);
        }
    }
}
