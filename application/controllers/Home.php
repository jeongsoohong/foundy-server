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

    public function index() {
        $page_data['page_name'] = "home/home";
        $page_data['asset_page'] = "home";
        $page_data['page_title'] = "home";
        $this->load->view('front/index', $page_data);
    }


}
