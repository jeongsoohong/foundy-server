<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Shop extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->database();

    defined('IMG_PATH_SHOP')   OR define('IMG_PATH_SHOP', '/web/public_html/uploads/shop_image/');
    defined('IMG_WEB_PATH_SHOP')   OR define('IMG_WEB_PATH_SHOP', base_url().'uploads/shop_image/');

    /*cache control*/
    $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    $this->output->set_header('Pragma: no-cache');

  }

  function echo_exit($msg) {
    echo "<script>alert('$msg');</script>";
    exit;
  }

  /* index of the admin. Default: Dashboard; On No Login Session: Back to login page. */
  function index()
  {
    if (($page_data = $this->is_logged()) == false) {
      // for login
      $page_data['control'] = "shop";

      $this->load->view('back/login', $page_data);
    } else {
      // for login
      $page_data['control'] = "shop";

      $page_data['page_name'] = "dashboard";
      $this->load->view('back/shop/index', $page_data);
    }

  }

  /* Login into Admin panel */
  function login($para1 = '')
  {
    // for login
    $page_data['control'] = "shop";

    if ($para1 == 'forget_form') {
      $page_data['control'] = 'shop';
      $this->load->view('back/forget_password', $page_data);
    } else if ($para1 == 'forget') {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
      if ($this->form_validation->run() == FALSE) {
        echo validation_errors();
      } else {
        $query = $this->db->get_where('user', array('email' => $this->input->post('email')));
        if ($query->num_rows() > 0) {
          $user_id = $query->row()->user_id;
          $password = substr(hash('sha512', rand()), 0, 12);
          $data['password'] = sha1($password);
          $this->db->where('user_id', $user_id);
          $this->db->update('user', $data);
          if ($this->email_model->password_reset_email('shop', $user_id, $password)) {
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
        $user_type = USER_TYPE_SHOP;
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
          if (!($user_data->user_type & USER_TYPE_SHOP)) {
            echo '샵 회원이 아닙니다.';
          } else {
            if ($user_data->password != $password) {
              echo '비밀번호가 잘못되었습니다.';
              exit;
            }
            $this->db->order_by('shop_id', 'asc');
            $this->db->limit(1,0);
            $shop_data = $this->db->get_where('shop', array('user_id' => $user_data->user_id, 'activate' => 1))->row();
            $this->session->set_userdata('shop_login', 'yes');
            $this->session->set_userdata('user_id', $user_data->user_id);
            $this->session->set_userdata('shop_id', $shop_data->shop_id);
//            $this->session->set_userdata('title', 'shop');

            echo 'lets_login';
          }
        } else {
          echo '이메일이 잘못되었습니다.';
        }
      }
    }
  }

  /* Loging out from Admin panel */
  function logout()
  {
//    $this->session->sess_destroy();
    $this->session->set_userdata('shop_login', 'no');
    redirect(base_url() . 'shop', 'refresh');
  }

  /* Checking Login Stat */
  function is_logged()
  {
    $page_data = array();
    if ($this->session->userdata('shop_login') == 'yes') {
      $user_id = $this->session->userdata('user_id');
      $shops= $this->db->get_where('shop', array('user_id' => $user_id, 'activate' => 1))->result();
      $page_data['shops'] = $shops;
      return $page_data;
    } else {
      return false;
    }
  }

  function change()
  {
    $user_id = $this->session->userdata('user_id');
    $shop_id = $this->input->get('id');

    $shop_data = $this->db->get_where('shop', array('shop_id' => $shop_id))->row();
    if (empty($shop_data)) {
      $this->crud_model->alert_exit('샵이 존재하지 않습니다');
    }
    if ($shop_data->user_id != $user_id) {
      $this->crud_model->alert_exit('해당 샵에 대한 권한이 없습니다');
    }
    if ($shop_data->activate != 1) {
      $this->crud_model->alert_exit('승인 대기 중입니다.');
    }

    $this->session->set_userdata('shop_id', $shop_id);
    echo 'done';
  }

  function notice()
  {
    if (($page_data = $this->is_logged()) == false) {
      redirect(base_url() . 'shop');
    }

    // for login
    $page_data['control'] = "shop";

    $page = 1;
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    }
    $q = '';
    if (isset($_GET['q'])) {
      $q = trim($_GET['q']);
    }

//    $size = SHOP_ADMIN_ITEM_LIST_PAGE_SIZE;
    $size = 10;
    $offset = $size *($page - 1);

    $type = BLOG_TYPE_NOTICE_BRAND;

    $select = "select *";
    $from = "from blog a, category_blog b";
    $where = "where a.blog_category=b.category_id and b.type={$type} and a.activate=1";
    if (!empty($q)) {
      $where .= " and (title like '%{$q}%' or description like '%{$q}%')";
    }

    $order_by = "order by blog_id desc";
    $limit = "limit {$offset},{$size}";

    $query = $select.' '.$from.' '.$where.' '.$order_by.' '.$limit;
    $notice_data = $this->db->query($query)->result();

    $select = "select count(*) as cnt";
    $query = $select.' '.$from.' '.$where;
    $total_cnt = $this->db->query($query)->row()->cnt;

    $total = (int)($total_cnt / $size) + ($total_cnt % $size > 0 ? 1 : 0);
    $prev = $page > 1 ? $page - 1 : '';
    $next = $total > $page ? $page + 1 : '';

    $page_data['total_cnt'] = $total_cnt;
    $page_data['total'] = $total;
    $page_data['prev'] = $prev;
    $page_data['page'] = $page;
    $page_data['next'] = $next;

    $page_data['q'] = $q;

    $page_data['notice_data'] = $notice_data;
    $page_data['page_name'] = "notice";
    $this->load->view('back/shop/index', $page_data);
  }


  function product($para1 = '', $para2 = '', $para3 = '')
  {
    if (($page_data = $this->is_logged()) == false) {
      redirect(base_url() . 'shop');
    }

    // for login
    $page_data['control'] = "shop";
    $user_id = $this->session->userdata('user_id');
    $shop_id = $this->session->userdata('shop_id');

    if ($para1 == 'list') {

      $page = $_GET['page'];
      $status = $_GET['status'];
      $cat = $_GET['cat'];
      $item_name = $_GET['item_name'];
      $size = SHOP_ADMIN_ITEM_LIST_PAGE_SIZE;
      $offset = $size *($page - 1);

//      echo "<script>alert('$item_name');</script>";
//      exit;

      $shop_data = $this->db->get_where('shop', array('shop_id' => $shop_id))->row();
      $shop_category = $this->db->get_where('shop_product_category', array('cat_level' => 1))->result();
      $product_data = $this->crud_model->get_product_list($shop_data->shop_id, $status, $item_name, $cat, $offset, $size , 'asc');
      if (isset($product_data) && !empty($product_data)) {
        $total_cnt = $this->crud_model->get_product_total_count($shop_data->shop_id, $status, $item_name, $cat);
      } else {
        $total_cnt = 0;
      }

      $total = (int)($total_cnt / $size ) + ($total_cnt % $size > 0 ? 1 : 0);
      $prev = $page > 1 ? $page - 1 : '';
      $next = $total > $page ? $page + 1 : '';

      $page_data['shop_data'] = $shop_data;
      $page_data['shop_category'] = $shop_category;
      $page_data['product_data'] = $product_data;
      $page_data['total_cnt'] = $total_cnt;
      $page_data['total'] = $total;
      $page_data['prev'] = $prev;
      $page_data['page'] = $page;
      $page_data['next'] = $next;
      $page_data['status'] = $status;
      $page_data['category'] = $cat;
      $page_data['item_name'] = $item_name;
      $page_data['page_name'] = "product_list";
      $this->load->view('back/shop/product_list', $page_data);

    } else if ($para1 == 'view') {

      $product_id = $para2;
      $query = <<<QUERY
select a.shop_name,b.status,b.register_at,b.approval_at,c.*
from shop a, shop_product_id b, shop_product c 
where a.shop_id=b.shop_id and b.product_id=c.product_id and c.product_id={$product_id}
QUERY;
      $page_data['product'] = $this->db->query($query)->row();
      $this->load->view('back/shop/product_view', $page_data);

    } else if ($para1 == 'status') {

      $product_ids = json_decode($_POST['product_ids']);
      $status = $_POST['change_status'];

      $this->db->where_in('product_id', $product_ids);
      $this->db->set('status', $status);
      $this->db->update('shop_product_id');

      echo 'done';

    } else if ($para1 == 'qna') {

      $page = 1;
      if (isset($_GET['page'])) {
        $page = $_GET['page'];
      }
      $replied = 0;
      if (isset($_GET['replied'])) {
        $replied = $_GET['replied'];
      }
      $start_date = '';
      $start_date_kor = '';
      if (isset($_GET['start_date'])) {
        $start_date = $_GET['start_date'];
        $start_date_kor = date('Y-m-d H:i:s', strtotime($_GET['start_date']));
      }
      $end_date = '';
      $end_date_kor = '';
      if (isset($_GET['end_date'])) {
        $end_date = $_GET['end_date'];
        $end_date_kor = date('Y-m-d H:i:s', strtotime($_GET['end_date']));
      }


      $size = SHOP_ADMIN_ITEM_LIST_PAGE_SIZE;
      $offset = $size*($page - 1);

      $shop_data = $this->db->get_where('shop', array('shop_id' => $shop_id))->row();

      $select = "select a.shop_id,a.shop_name,b.email,c.item_name,d.*";
      $from = "from shop a,user b,shop_product c, shop_product_qna d";
      $limit = "limit {$offset},{$size}";
      $order_by = "order by qna_id desc";
      $where = "where a.shop_id=d.shop_id and b.user_id=d.user_id and c.product_id=d.product_id and d.shop_id={$shop_data->shop_id} and d.replied={$replied}";
      if (!empty($start_date) && !empty($end_date)) {
        $where .= " and '{$start_date_kor}' <= d.qes_at and d.qes_at <= '{$end_date_kor}'";
      } else {
        $start_date = '';
        $end_date = '';
      }

      $query = $select . ' ' . $from . ' ' . $where. ' ' . ' '. $order_by . ' ' . $limit;

//      $this->crud_model->alert_exit($query);
      $qna_data = $this->db->query($query)->result();

      $select = "select count(*) as cnt";
      $query = $select . ' ' . $from . ' ' . $where . ' ';

      $total_cnt = $this->db->query($query)->row()->cnt;

      $total = (int)($total_cnt / $size) + ($total_cnt % $size > 0 ? 1 : 0);
      $prev = $page > 1 ? $page - 1 : '';
      $next = $total > $page ? $page + 1 : '';

      $page_data['total_cnt'] = $total_cnt;
      $page_data['total'] = $total;
      $page_data['prev'] = $prev;
      $page_data['page'] = $page;
      $page_data['next'] = $next;

      $page_data['replied'] = $replied;
      $page_data['start_date'] = $start_date;
      $page_data['end_date'] = $end_date;

      $page_data['shop_data'] = $shop_data;
      $page_data['qna_data'] = $qna_data;
      $page_data['page_name'] = "product_qna";
      $this->load->view('back/shop/product_qna', $page_data);

    } else if ($para1 == 'review') {

      $page = 1;
      if (isset($_GET['page'])) {
        $page = $_GET['page'];
      }
      $item_name = '';
      if (isset($_GET['item_name'])) {
        $item_name = $_GET['item_name'];
      }
      $size = SHOP_ADMIN_ITEM_LIST_PAGE_SIZE;
      $offset = $size*($page - 1);

      $shop_data = $this->db->get_where('shop', array('shop_id' => $shop_id))->row();

      $select = "select a.shop_id,a.shop_name,b.email,c.item_name,d.*";
      $from = "from shop a,user b,shop_product c, shop_product_review d";
      $order_by = "order by review_id desc";
      $limit = "limit {$offset},{$size}";
      $where = "where a.shop_id=d.shop_id and b.user_id=d.user_id and c.product_id=d.product_id and d.shop_id={$shop_data->shop_id}";
      if (!empty($item_name)) {
        $where .= " and c.item_name like '%{$item_name}%'";
      }

      $query = $select . ' ' . $from . ' ' . $where. ' ' . $order_by . ' ' . $limit;

      $review_data = $this->db->query($query)->result();

      $select = "select count(*) as cnt";
      $query = $select . ' ' . $from . ' ' . $where . ' ';

      $total_cnt = $this->db->query($query)->row()->cnt;

      $total = (int)($total_cnt / $size) + ($total_cnt % $size > 0 ? 1 : 0);
      $prev = $page > 1 ? $page - 1 : '';
      $next = $total > $page ? $page + 1 : '';

      $page_data['total_cnt'] = $total_cnt;
      $page_data['total'] = $total;
      $page_data['prev'] = $prev;
      $page_data['page'] = $page;
      $page_data['next'] = $next;

      $page_data['item_name'] = $item_name;

      $page_data['shop_data'] = $shop_data;
      $page_data['review_data'] = $review_data;
      $page_data['page_name'] = "product_review";
      $this->load->view('back/shop/product_review', $page_data);

    } else if ($para1 == 'register') {

      $edit = ($_GET['e'] == 1);

      $shop_data = $this->db->get_where('shop', array('shop_id' => $shop_id))->row();
      $shop_shipping = $this->db->get_where('shop_shipping', array('shop_id' => $shop_data->shop_id))->row();

      if ($edit == true) {

        $product_id = $_GET['p'];

        $product = $this->db->get_where('shop_product_id', array('product_id' => $product_id))->row();
        $product_data = $this->db->get_where('shop_product', array('product_id' => $product_id))->row();
        $product_data->item_option_requires = json_decode($product_data->item_option_requires);
        $product_data->item_option_others = json_decode($product_data->item_option_others);

        $cat_1 = $this->db->get_where('shop_product_category', array('cat_level' => 1))->result();
        $cat_2 = $this->db->get_where('shop_product_category', array('cat_level' => 2))->result();
        $cat_3 = $this->db->get_where('shop_product_category', array('cat_level' => 3))->result();

        $page_data['product_data'] = $product_data;
        $page_data['cat_1'] = $cat_1;
        $page_data['cat_2'] = $cat_2;
        $page_data['cat_3'] = $cat_3;

      } else {

        if ($shop_data->set_ship_info == false || $shop_data->set_return_info == false || $shop_data->set_brand_info == false) {
          $this->crud_model->alert_exit('공급사 정보를 먼저 입력해주세요.', base_url().'shop/account');
        }

        $shop_product_category = $this->db->get_where('shop_product_category', array('cat_level' => 1))->result();

        $product = $this->db->get_where('shop_product_id',
          array('shop_id' => $shop_data->shop_id, 'status' => SHOP_PRODUCT_STATUS_INIT))->row();
        if (empty($product)) {
          $ins = array(
            'user_id' => $user_id,
            'shop_id' => $shop_data->shop_id,
            'product_code' => '',
            'status' => SHOP_PRODUCT_STATUS_INIT,
          );
          $this->db->set($ins);
          $this->db->set('register_at', 'NOW()', false);
          $this->db->set('approval_at', 'NOW()', false);
          $this->db->insert('shop_product_id');
          $product_id = $this->db->insert_id();
        } else {
          $product_id = $product->product_id;
        }

        $page_data['shop_product_category'] = $shop_product_category;
      }

      $page_data['edit'] = $edit;
      $page_data['product'] = $product;
      $page_data['product_id'] = $product_id;
      $page_data['shop_data'] = $shop_data;
      $page_data['shop_shipping'] = $shop_shipping;
      $page_data['page_name'] = "product_register";
      $this->load->view('back/shop/product_register', $page_data);

    } else if ($para1 == 'do_register') {

      $this->load->library('form_validation');
      $this->form_validation->set_rules('product_id', 'product_id', 'trim|required|is_natural|max_length[10]');
      $this->form_validation->set_rules('item_name', 'item_name', 'trim|required|max_length[32]');
      $this->form_validation->set_rules('item_cat', 'item_cat', 'trim|required|numeric|max_length[6]');
      $this->form_validation->set_rules('item_type', 'item_type', 'trim|required|is_natural');
      $this->form_validation->set_rules('item_tax', 'item_tax', 'trim|required|is_natural');
      $this->form_validation->set_rules('item_shipping_days', 'item_shipping_days','trim|required|is_natural');
      $this->form_validation->set_rules('item_shipping_free', 'item_shipping_free','trim|required|is_natural');
      $this->form_validation->set_rules('item_base_info', 'item_base_info', 'trim|required|max_length[128]');
      $this->form_validation->set_rules('item_attention_point_select', 'item_attention_point_select', 'trim|required|is_natural|less_than_equal_to[1]');
      $this->form_validation->set_rules('item_attention_point', 'item_attention_point', 'trim|max_length[64]');
      $this->form_validation->set_rules('order_attention_point_select', 'order_attention_point_select', 'trim|is_natural|less_than_equal_to[1]');
      $this->form_validation->set_rules('order_attention_point', 'order_attention_point', 'trim|max_length[64]');
      $this->form_validation->set_rules('shipping_attention_point_select', 'shipping_attention_point_select', 'trim|is_natural|less_than_equal_to[1]');
      $this->form_validation->set_rules('shipping_attention_point', 'shipping_attention_point', 'trim|max_length[64]');
      $this->form_validation->set_rules('item_noti_info_disabled', 'item_noti_info_disabled', 'trim|required|is_natural|less_than_equal_to[1]');
      $this->form_validation->set_rules('item_noti_info', 'item_noti_info', 'trim|max_length[65536]');
      $this->form_validation->set_rules('item_cert_disabled', 'item_cert_disabled', 'trim|required|is_natural|less_than_equal_to[1]');
      $this->form_validation->set_rules('item_kc_cert_number', 'item_kc_cert_number', 'trim|max_length[64]');
      $this->form_validation->set_rules('item_cert_name', 'item_cert_name', 'trim|max_length[64]');
      $this->form_validation->set_rules('item_model_name', 'item_model_name', 'trim|max_length[64]');
      $this->form_validation->set_rules('item_manufacturer_name', 'item_manufacturer_name', 'trim|max_length[64]');
      $this->form_validation->set_rules('item_importer_name', 'item_importer_name', 'trim|max_length[64]');
      $this->form_validation->set_rules('item_general_price', 'item_general_price', 'trim|is_natural_no_zero|less_than_equal_to[9999999]');
      $this->form_validation->set_rules('item_sell_price', 'item_sell_price', 'trim|is_natural_no_zero|less_than_equal_to[9999999]');
      $this->form_validation->set_rules('item_margin', 'item_margin', 'trim|is_natural|less_than_equal_to[100]');
      $this->form_validation->set_rules('item_discount_rate', 'item_discount_rate', 'trim|is_natural|less_than_equal_to[100]');
      $this->form_validation->set_rules('item_supply_price', 'item_supply_price', 'trim|is_natural_no_zero|less_than_equal_to[9999999]');
      $this->form_validation->set_rules('item_option_requires_cnt', 'item_option_requires_cnt', 'trim|required|is_natural|less_than_equal_to[5]');
      $this->form_validation->set_rules('item_option_requires', 'item_option_requires', 'trim|max_length[65536]');
      $this->form_validation->set_rules('item_option_others_cnt', 'item_option_others_cnt', 'trim|required|is_natural|less_than_equal_to[5]');
      $this->form_validation->set_rules('item_option_others', 'item_option_others', 'trim|max_length[65536]');
      $this->form_validation->set_rules('item_image_file_count', 'item_image_file_count', 'trim|is_natural|less_than_equal_to[6]');
      $this->form_validation->set_rules('purchase_max_cnt', 'purchase_max_cnt', 'trim|required|is_natural|max_length[10]');
      $this->form_validation->set_rules('bundle_shipping_cnt', 'bundle_shipping_cnt', 'trim|required|is_natural|max_length[10]');

      if ($this->form_validation->run() == FALSE) {
//        $data = json_encode($_POST);
//        $this->echo_exit($data);
        echo '<br>' . validation_errors();
      } else {

        $product_id = $this->input->post('product_id');
        $item_name = $this->input->post('item_name');
        $item_cat = $this->input->post('item_cat');
        $item_type = (int)$this->input->post('item_type');
        $item_tax = (int)$this->input->post('item_tax');
        $item_shipping_days = $this->input->post('item_shipping_days');
        $item_shipping_free = (boolean)$this->input->post('item_shipping_free');
        $item_base_info = $this->input->post('item_base_info');
        $item_attention_point_select = (boolean)$this->input->post('item_attention_point_select');
        $item_attention_point = $this->input->post('item_attention_point');
        $order_attention_point_select = (boolean)$this->input->post('order_attention_point_select');
        $order_attention_point = $this->input->post('order_attention_point');
        $shipping_attention_point_select = (boolean)$this->input->post('shipping_attention_point_select');
        $shipping_attention_point = $this->input->post('shipping_attention_point');
        $item_noti_info_need = (boolean)$this->input->post('item_noti_info_disabled');
        $item_noti_info = $this->input->post('item_noti_info');
        $item_cert_need = (boolean)$this->input->post('item_cert_disabled');
        $item_kc_cert_number = $this->input->post('item_kc_cert_number');
        $item_cert_name = $this->input->post('item_cert_name');
        $item_model_name = $this->input->post('item_model_name');
        $item_manufacturer_name = $this->input->post('item_manufacturer_name');
        $item_importer_name = $this->input->post('item_importer_name');
        $item_general_price = (int)$this->input->post('item_general_price');
        $item_sell_price = (int)$this->input->post('item_sell_price');
        $item_margin = (int)$this->input->post('item_margin');
        $item_discount_rate = (int)$this->input->post('item_discount_rate');
        $item_supply_price = (int)$this->input->post('item_supply_price');
        $item_option_requires_cnt = (int)$this->input->post('item_option_requires_cnt');
        $item_option_requires = $this->input->post('item_option_requires');
        $item_option_others_cnt = (int)$this->input->post('item_option_others_cnt');
        $item_option_others = $this->input->post('item_option_others');
        $item_image_file_count = (int)$this->input->post('item_image_file_count');
        $item_desc = $this->input->post('item_desc');
        $purchase_max_cnt = (int)$this->input->post('purchase_max_cnt');
        $bundle_shipping_cnt = $this->input->post('bundle_shipping_cnt');

        $shop_data = $this->db->get_where('shop', array('shop_id' => $shop_id))->row();

        $product_code = sprintf('%s%010d', $item_cat, (int)$product_id);

//        $data['product_code'] = $product_code;
//        $data['item_cat'] = $item_cat;
//        $data['product_id'] = $product_id;
//        $this->echo_exit(json_encode($data));

        if ($item_attention_point_select == false) {
          $item_attention_point = '';
        }
        if ($order_attention_point_select == false) {
          $order_attention_point = '';
        }
        if ($shipping_attention_point_select == false) {
          $shipping_attention_point = '';
        }

        $item_image_urls = array();
        $i = 0;
        for (; $i < $item_image_file_count; $i++) {
          if (isset($_FILES["item_image_file_{$i}"]) == true) {
            $this->crud_model->file_validation($_FILES["item_image_file_{$i}"]);
            $file_name = 'product_' . $product_id . '_' . $i . '.jpg';
            $this->crud_model->upload_image(IMG_PATH_SHOP, $file_name, $_FILES["item_image_file_{$i}"], 400, 400, true, false);
            $time = time();
            $file_name = 'product_' . $product_id . '_' . $i . '_thumb.jpg';
            $item_image_urls[$i] = IMG_WEB_PATH_SHOP . $file_name . '?id=' . $time;
          }
        }
        for (; $i < SHOP_PRODUCT_IMAGE_FILE_COUNT_MAX; $i++) {
          $item_image_urls[$i] = '';
        }

        $ins = array(
          'product_id' => $product_id,
          'product_code' => $product_code,
          'shop_id' => $shop_data->shop_id,
          'item_name' => $item_name,
          'item_cat' => $item_cat,
          'item_type' => $item_type,
          'item_tax' => $item_tax,
          'item_shipping_days' => $item_shipping_days,
          'item_shipping_free' => $item_shipping_free,
          'item_base_info' => $item_base_info,
          'item_attention_point' => $item_attention_point,
          'order_attention_point' => $order_attention_point,
          'shipping_attention_point' => $shipping_attention_point,
          'item_noti_info_need' => $item_noti_info_need,
          'item_noti_info' => $item_noti_info,
          'item_cert_need' => $item_cert_need,
          'item_kc_cert_number' => $item_kc_cert_number,
          'item_cert_name' => $item_cert_name,
          'item_model_name' => $item_model_name,
          'item_manufacturer_name' => $item_manufacturer_name,
          'item_importer_name' => $item_importer_name,
          'item_general_price' => $item_general_price,
          'item_sell_price' => $item_sell_price,
          'item_margin' => $item_margin,
          'item_discount_rate' => $item_discount_rate,
          'item_supply_price' => $item_supply_price,
          'item_option_requires_cnt' => $item_option_requires_cnt,
          'item_option_requires' => $item_option_requires,
          'item_option_others_cnt' => $item_option_others_cnt,
          'item_option_others' => $item_option_others,
          'item_desc' => $item_desc,
          'item_image_count' => $item_image_file_count,
          'purchase_max_cnt' => $purchase_max_cnt,
          'bundle_shipping_cnt' => $bundle_shipping_cnt,
        );
        $this->db->set($ins);
        for ($i = 0; $i < SHOP_PRODUCT_IMAGE_FILE_COUNT_MAX; $i++) {
          $this->db->set('item_image_url_'.$i, $item_image_urls[$i]);
        }
        $this->db->insert('shop_product', $ins);

        $files = 'product_info_'.$product_id.'_*.*';
        $this->crud_model->del_upload_image(IMG_WEB_PATH_SHOP, IMG_PATH_SHOP, $item_desc, $files);

        $this->db->update('shop_product_id',
          array('product_code' => $product_code,
            'status' => SHOP_PRODUCT_STATUS_REQUEST,
            'item_sell_price' => $item_sell_price,
            'brand_name' => $shop_data->shop_name,
            'item_name' => $item_name),
          array('product_id' => $product_id)
        );

        if ($this->db->affected_rows()) {
          echo 'done';
        } else {
          echo 'fail : 문제가 발생했습니다';
        }
      }

    } else if ($para1 == 'upload_image') {

      $product_id = $para2;
      if (isset($_FILES["file"])) {
        $this->crud_model->file_validation($_FILES['file']);
        $time = gettimeofday();
        $file_name = 'product_info_'.$product_id.'_'.$time['sec'].$time['usec'].'.jpg';
        $this->crud_model->upload_image(IMG_PATH_SHOP, $file_name, $_FILES["file"], 400, 0, false, true);
        echo json_encode(array('success' => true, 'filename' => $file_name));
      } else {
        echo json_encode(array('success' => false, 'error' => 4));
      }

    } else if ($para1 == 'category') {

      $cat_code = $_GET['cat_code'];
      $cat_level = $_GET['cat_level'];
      $search_code = substr($cat_code,0, 2*($cat_level - 1)).'%';
      $query = <<<QUERY
select * from shop_product_category where cat_code like '{$search_code}' and cat_level={$cat_level}
QUERY;
      $shop_product_category = $this->db->query($query)->result();
      $page_data['cat_code'] = $cat_code;
      $page_data['cat_level'] = $cat_level;
      $page_data['shop_product_category'] = $shop_product_category;
      $this->load->view('back/shop/product_category', $page_data);

    } else if ($para1 == 'noti_info') {

      $cat_code = $_GET['cat_code'];
      $noti_id = $this->db->get_where('shop_product_category', array('cat_code' => $cat_code))->row()->noti_id;
      $noti_data = $this->db->get_where('shop_product_noti_info', array('noti_id' => $noti_id))->row();

      echo json_encode(array(
        'noti_info' => $noti_data->noti_info,
        'need_noti' => (boolean)$noti_data->need_noti,
        'need_kc_cert' => (boolean)$noti_data->need_kc_cert,
      ));

    } else {

      $page_data['page_name'] = "product";
      $this->load->view('back/shop/index', $page_data);

    }
  }

  public function order()
  {
    if (($page_data = $this->is_logged()) == false) {
      redirect(base_url() . 'shop');
    }

    // for login
    $page_data['control'] = "shop";
    $user_id = $this->session->userdata('user_id');
    $shop_id = $this->session->userdata('shop_id');

    $page = 1;
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    }
    $ship_status = SHOP_SHIPPING_STATUS_ORDER_COMPLETED;
    if (isset($_GET['ship_status'])) {
      $ship_status = $_GET['ship_status'];
    }
    $start_date = '';
    $start_date_kor = '';
    if (isset($_GET['start_date'])) {
      $start_date = $_GET['start_date'];
      $start_date_kor = date('Y-m-d H:i:s', strtotime($_GET['start_date']));
    }
    $end_date = '';
    $end_date_kor = '';
    if (isset($_GET['end_date'])) {
      $end_date = $_GET['end_date'];
      $end_date_kor = date('Y-m-d H:i:s', strtotime($_GET['end_date']));
    }
    $confirm_delay = 0;
    if (isset($_GET['confirm_delay'])) {
      $confirm_delay= $_GET['confirm_delay'];
    }

    $size = SHOP_ADMIN_ITEM_LIST_PAGE_SIZE;
    $offset = $size*($page - 1);

    $shop_data = $this->db->get_where('shop', array('shop_id' => $shop_id))->row();

    $select = "select a.shop_id,a.shop_name,b.email,c.item_name,d.*";
    $from = "from shop a,user b,shop_product c, shop_purchase_product d";
    $order_by = "order by purchase_product_id desc";
    $limit = "limit {$offset},{$size}";
    $where = "where a.shop_id=d.shop_id and b.user_id=d.user_id and c.product_id=d.product_id and d.shop_id={$shop_data->shop_id} and shipping_status={$ship_status}";
    if (!empty($start_date) && !empty($end_date)) {
      $where .= " and '{$start_date_kor}' <= d.purchase_at and d.purchase_at <= '{$end_date_kor}'";
    } else {
      $start_date = '';
      $end_date = '';
    }

    $query = $select . ' ' . $from . ' ' . $where. ' ' . $order_by . ' ' . $limit;

    $order_data = $this->db->query($query)->result();

    $select = "select count(*) as cnt";
    $query = $select . ' ' . $from . ' ' . $where . ' ';

    $total_cnt = $this->db->query($query)->row()->cnt;

    $total = (int)($total_cnt / $size) + ($total_cnt % $size > 0 ? 1 : 0);
    $prev = $page > 1 ? $page - 1 : '';
    $next = $total > $page ? $page + 1 : '';

    $page_data['total_cnt'] = $total_cnt;
    $page_data['total'] = $total;
    $page_data['prev'] = $prev;
    $page_data['page'] = $page;
    $page_data['next'] = $next;

    $page_data['ship_status'] = $ship_status;
    $page_data['start_date'] = $start_date;
    $page_data['end_date'] = $end_date;
    $page_data['confirm_delay'] = $confirm_delay;

    $page_data['order_data'] = $order_data;
    $page_data['shop_data'] = $shop_data;
    $page_data['page_name'] = "order";
    $this->load->view('back/shop/index', $page_data);
  }

  public function income()
  {
    if (($page_data = $this->is_logged()) == false) {
      redirect(base_url() . 'shop');
    }

    // for login
    $page_data['control'] = "shop";
    $user_id = $this->session->userdata('user_id');
    $shop_id = $this->session->userdata('shop_id');

    $page = 1;
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    }
    $start_date = '';
    $start_date_kor = '';
    if (isset($_GET['start_date'])) {
      $start_date = $_GET['start_date'];
      $start_date_kor = date('Y-m-d H:i:s', strtotime($_GET['start_date']));
    }
    $end_date = '';
    $end_date_kor = '';
    if (isset($_GET['end_date'])) {
      $end_date = $_GET['end_date'];
      $end_date_kor = date('Y-m-d H:i:s', strtotime($_GET['end_date']));
    }

    $ship_status = SHOP_SHIPPING_STATUS_ORDER_COMPLETED;
    $size = SHOP_ADMIN_ITEM_LIST_PAGE_SIZE;
    $offset = $size*($page - 1);

    $user_id = $this->session->userdata('user_id');
    $shop_data = $this->db->get_where('shop', array('shop_id' => $shop_id))->row();

    $select = "select a.shop_id,a.shop_name,b.email,c.item_name,e.receiver_name,d.*";
    $from = "from shop a,user b,shop_product c, shop_purchase_product d, shop_purchase e";
    $order_by = "order by purchase_product_id desc";
    $limit = "limit {$offset},{$size}";

    $where = "where a.shop_id=d.shop_id and b.user_id=d.user_id and c.product_id=d.product_id and d.purchase_id=e.purchase_id and d.shop_id={$shop_data->shop_id} and shipping_status={$ship_status}";
    if (!empty($start_date) && !empty($end_date)) {
      $where .= " and '{$start_date_kor}' <= d.purchase_at and d.purchase_at <= '{$end_date_kor}'";
    } else {
      $start_date = '';
      $end_date = '';
    }

    $query = $select . ' ' . $from . ' ' . $where. ' ' . $order_by . ' ' . $limit;
//    $this->crud_model->alert_exit($query);

    $income_data = $this->db->query($query)->result();

    foreach ($income_data as $item) {
      $item->item_option_requires = json_decode($item->item_option_requires);
      $item->item_option_others = json_decode($item->item_option_others);
    }

    $select = "select count(*) as cnt";
    $query = $select . ' ' . $from . ' ' . $where . ' ';

    $total_cnt = $this->db->query($query)->row()->cnt;

    $total = (int)($total_cnt / $size) + ($total_cnt % $size > 0 ? 1 : 0);
    $prev = $page > 1 ? $page - 1 : '';
    $next = $total > $page ? $page + 1 : '';

    $page_data['total_cnt'] = $total_cnt;
    $page_data['total'] = $total;
    $page_data['prev'] = $prev;
    $page_data['page'] = $page;
    $page_data['next'] = $next;

    $page_data['start_date'] = $start_date;
    $page_data['end_date'] = $end_date;

    $page_data['income_data'] = $income_data;
    $page_data['shop_data'] = $shop_data;
    $page_data['page_name'] = "income";
    $this->load->view('back/shop/index', $page_data);
  }

  public function account($para1 = '', $para2 = '')
  {
    if (($page_data = $this->is_logged()) == false) {
      redirect(base_url() . 'shop');
    }

    // for login
    $page_data['control'] = "shop";
    $user_id = $this->session->userdata('user_id');
    $shop_id = $this->session->userdata('shop_id');

    $user_id = $this->session->userdata('user_id');
    $shop_data = $this->db->get_where('shop', array('shop_id' => $shop_id))->row();

    $type = $para1;
    $action = $para2;

    if ($type == 'worker') {

      if ($action == 'add') {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('worker_category', 'worker_category', 'trim|required|numeric|max_length[10]');
        $this->form_validation->set_rules('worker_name', 'worker_name', 'trim|required|max_length[32]');
        $this->form_validation->set_rules('phone', 'phone', 'trim|numeric|min_length[9]|max_length[32]');
        $this->form_validation->set_rules('mobile', 'mobile', 'trim|required|numeric|max_length[32]');
        $this->form_validation->set_rules('email', 'email', 'trim|valid_email|max_length[128]');

        if ($this->form_validation->run() == FALSE) {
          echo '<br>' . validation_errors();
        } else {
          $worker_category = $this->input->post('worker_category');
          $worker_name = $this->input->post('worker_name');
          $phone = $this->input->post('phone');
          $mobile = $this->input->post('mobile');
          $email = $this->input->post('email');

          $ins = array(
            'shop_id' => $shop_data->shop_id,
            'worker_category' => $worker_category,
            'worker_name' => $worker_name,
            'phone' => $phone,
            'mobile' => $mobile,
            'email' => $email,
          );
          $this->db->insert('shop_worker', $ins);
          if ($this->db->affected_rows()) {
            echo 'done';
          } else {
            echo 'fail: no data inserted';
          }
        }

      } else if ($action == 'upd') {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('worker_id', 'worker_id', 'trim|required|numeric|max_length[10]');
        $this->form_validation->set_rules('worker_category', 'worker_category', 'trim|required|numeric|max_length[10]');
        $this->form_validation->set_rules('worker_name', 'worker_name', 'trim|required|max_length[32]');
        $this->form_validation->set_rules('phone', 'phone', 'trim|numeric|min_length[9]|max_length[16]');
        $this->form_validation->set_rules('mobile', 'mobile', 'trim|required|numeric|max_length[32]');
        $this->form_validation->set_rules('email', 'email', 'trim|valid_email|max_length[128]');

        if ($this->form_validation->run() == FALSE) {
          echo '<br>' . validation_errors();
        } else {
          $worker_id = $this->input->post('worker_id');
          $worker_category = $this->input->post('worker_category');
          $worker_name = $this->input->post('worker_name');
          $phone = $this->input->post('phone');
          $mobile = $this->input->post('mobile');
          $email = $this->input->post('email');

          $upd = array(
            'worker_category' => $worker_category,
            'worker_name' => $worker_name,
            'phone' => $phone,
            'mobile' => $mobile,
            'email' => $email,
          );
          $where = array(
            'worker_id' => $worker_id,
          );
          $this->db->update('shop_worker', $upd, $where);
          if ($this->db->affected_rows()) {
            echo 'done';
          } else {
            echo 'fail: no data updated';
          }
        }
      } else if ($action == 'del') {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('worker_id', 'worker_id', 'trim|required|numeric|max_length[10]');

        if ($this->form_validation->run() == FALSE) {
          echo '<br>' . validation_errors();
        } else {
          $worker_id = $this->input->post('worker_id');
          $where = array(
            'worker_id' => $worker_id,
          );
          $this->db->delete('shop_worker', $where);

          if ($this->db->affected_rows()) {
            echo 'done';
          } else {
            echo 'fail: no data deleted';
          }
        }

      } else { // worker info

        $shop_worker = $this->db->get_where('shop_worker', array('shop_id' => $shop_data->shop_id))->result();
        $shop_worker_cat = $this->db->order_by('category_id', 'asc')->get('category_shop_worker')->result();
        $page_data['shop_worker'] = $shop_worker;
        $page_data['shop_worker_cat'] = $shop_worker_cat;
        $this->load->view('back/shop/shop_worker', $page_data);

      }

    } else if ($type == 'ship') {

      if ($action == 'upd') {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('send_info_postcode', 'send_info_postcode', 'trim|required|numeric|max_length[8]');
        $this->form_validation->set_rules('send_info_address_1', 'send_info_address_1', 'trim|required|max_length[128]');
        $this->form_validation->set_rules('send_info_address_2', 'send_info_address_2', 'trim|required|max_length[128]');
        $this->form_validation->set_rules('send_info_phone', 'send_info_phone', 'trim|required|numeric|min_length[9]|max_length[16]');
        $this->form_validation->set_rules('free_shipping', 'free_shipping', 'trim|required|is_natural|less_than_equal_to[1]');
        $this->form_validation->set_rules('free_shipping_total_price', 'free_shipping_total_price', 'trim|is_natural|less_than_equal_to[999999]');
        $this->form_validation->set_rules('free_shipping_cond_price', 'free_shipping_cond_price', 'trim|is_natural|less_than_equal_to[999999]');
        $this->form_validation->set_rules('shipping_company_count', 'shipping_company_count', 'trim|required|is_natural_no_zero|less_than_equal_to[5]');

        if ($this->form_validation->run() == FALSE) {
          echo '<br>' . validation_errors();
        } else {
          $shipping_company_count = $this->input->post('shipping_company_count');

          $shipping_company = array();
          $this->form_validation->reset_validation();
          for ($i = 0; $i < $shipping_company_count; $i++) {
            $this->form_validation->set_rules('shipping_company_code_' . $i, 'shipping_company_code_' . $i, 'trim|required|max_length[16]');
            $this->form_validation->set_rules('shipping_company_name_' . $i, 'shipping_company_name_' . $i, 'trim|required|max_length[64]');
            $shipping_company[] = array(
              'code' => $this->input->post('shipping_company_code_' . $i),
              'name' => $this->input->post('shipping_company_name_' . $i),
            );
          }
          if ($this->form_validation->run() == FALSE) {
            echo '<br>' . validation_errors();
          } else {
            $send_info_postcode = $this->input->post('send_info_postcode');
            $send_info_address_1 = $this->input->post('send_info_address_1');
            $send_info_address_2 = $this->input->post('send_info_address_2');
            $send_info_phone = $this->input->post('send_info_phone');
            $free_shipping = $this->input->post('free_shipping');
            $free_shipping_total_price = $this->input->post('free_shipping_total_price');
            $free_shipping_cond_price = $this->input->post('free_shipping_cond_price');

            if ($free_shipping == true) {
              $free_shipping_total_price = 0;
              $free_shipping_cond_price = 0;
            }

            $data = array(
              'send_info_postcode' => $send_info_postcode,
              'send_info_address_1' => $send_info_address_1,
              'send_info_address_2' => $send_info_address_2,
              'send_info_phone' => $send_info_phone,
              'free_shipping' => $free_shipping,
              'free_shipping_total_price' => $free_shipping_total_price,
              'free_shipping_cond_price' => $free_shipping_cond_price,
            );
            $where = array(
              'shop_id' => $shop_data->shop_id,
            );
            $this->db->update('shop_shipping', $data, $where);

            if ($shop_data->set_ship_info == true or $shop_data->set_return_info == true) {
              $where = array(
                'shop_id' => $shop_data->shop_id,
              );
              $this->db->delete('shop_shipping_company', $where);
            }
            foreach ($shipping_company as $company) {
              $data = array(
                'shop_id' => $shop_data->shop_id,
                'shipping_company_code' => $company['code'],
                'shipping_company_name' => $company['name'],
              );
              $this->db->insert('shop_shipping_company', $data);
            }

            if ($shop_data->set_ship_info == false) {
              $this->db->update('shop', array('set_ship_info' => 1), array('shop_id' => $shop_data->shop_id));
            }

            echo 'done';
          }
        }

      } else {

        $shop_shipping = $this->db->get_where('shop_shipping', array('shop_id' => $shop_data->shop_id))->row();
        $shop_shipping_company = $this->db->get_where('shop_shipping_company', array('shop_id' => $shop_data->shop_id))->result();
        $page_data['shop_shipping'] = $shop_shipping;
        $page_data['shop_shipping_company'] = $shop_shipping_company;
        $page_data['page_name'] = "account";
        $this->load->view('back/shop/shop_shipping', $page_data);

      }

    } else if ($type == 'return') {

      if ($action == 'upd') {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('return_info_postcode', 'return_info_postcode', 'trim|required|numeric|max_length[8]');
        $this->form_validation->set_rules('return_info_address_1', 'return_info_address_1', 'trim|required|max_length[128]');
        $this->form_validation->set_rules('return_info_address_2', 'return_info_address_2', 'trim|required|max_length[128]');
        $this->form_validation->set_rules('return_info_phone', 'return_info_phone', 'trim|required|numeric|min_length[9]|max_length[16]');
        $this->form_validation->set_rules('return_shipping_price', 'return_shipping_price', 'trim|is_natural|less_than_equal_to[999999]');
        $this->form_validation->set_rules('return_send_shipping_price', 'return_send_shipping_price', 'trim|is_natural|less_than_equal_to[999999]');

        if ($this->form_validation->run() == FALSE) {
          echo '<br>' . validation_errors();
        } else {

          $return_info_postcode = $this->input->post('return_info_postcode');
          $return_info_address_1 = $this->input->post('return_info_address_1');
          $return_info_address_2 = $this->input->post('return_info_address_2');
          $return_info_phone = $this->input->post('return_info_phone');
          $return_shipping_price = $this->input->post('return_shipping_price');
          $return_send_shipping_price = $this->input->post('return_send_shipping_price');

          $data = array(
            'return_info_postcode' => $return_info_postcode,
            'return_info_address_1' => $return_info_address_1,
            'return_info_address_2' => $return_info_address_2,
            'return_info_phone' => $return_info_phone,
            'return_shipping_price' => $return_shipping_price,
            'return_send_shipping_price' => $return_send_shipping_price,
          );
          $where = array(
            'shop_id' => $shop_data->shop_id,
          );
          $this->db->update('shop_shipping', $data, $where);

          if ($shop_data->set_return_info == false) {
            $this->db->update('shop', array('set_return_info' => 1), array('shop_id' => $shop_data->shop_id));
          }

          echo 'done';
        }

      } else {

        $shop_shipping = $this->db->get_where('shop_shipping', array('shop_id' => $shop_data->shop_id))->row();
        $page_data['shop_shipping'] = $shop_shipping;
        $page_data['page_name'] = "account";
        $this->load->view('back/shop/shop_return', $page_data);

      }

    } else if ($type == 'brand') {

      if ($action == 'upd') {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('brand_text_base', 'brand_text_base', 'trim|required|max_length[512]');

        if ($this->form_validation->run() == FALSE) {
          echo '<br>' . validation_errors();
        } else {

          $brand_text_base = $this->input->post('brand_text_base');

          $data = array(
            'brand_text' => $brand_text_base,
          );
          $where = array(
            'shop_id' => $shop_data->shop_id,
            'type' => SHOP_BRAND_INFO_TYPE_DEFAULT
          );
          $this->db->update('shop_brand_info', $data, $where);

          if ($shop_data->set_brand_info == false) {
            $this->db->update('shop', array('set_brand_info' => 1), array('shop_id' => $shop_data->shop_id));
          }

          echo 'done';
        }

      } else {

        $now = date('Y-m-d H:i:s');
        $query = <<<QUERY
select * from shop_brand_info where shop_id={$shop_data->shop_id} and start_time<'{$now}' and '{$now}'<end_time
QUERY;
        $shop_brand_info = $this->db->query($query)->result();
//        $this->echo_exit(json_encode($shop_brand_info));
        $page_data['shop_brand_info'] = $shop_brand_info;
        $page_data['page_name'] = "account";
        $this->load->view('back/shop/shop_brand_info', $page_data);

      }

    } else {

      $shop_worker = $this->db->get_where('shop_worker', array('shop_id' => $shop_data->shop_id))->result();
      $shop_shipping = $this->db->get_where('shop_shipping', array('shop_id' => $shop_data->shop_id))->row();
      $shop_shipping_company = $this->db->get_where('shop_shipping_company', array('shop_id' => $shop_data->shop_id))->result();

      if (empty($shop_worker)) {
        $ins = array(
          'shop_id' => $shop_data->shop_id,
          'worker_category' => SHOP_WORKER_CATEGORY_REPRESENT,
          'worker_name' => $shop_data->representative_name,
          'phone' => $shop_data->shop_phone,
          'mobile' => '',
          'email' => $shop_data->email
        );
        $this->db->insert('shop_worker', $ins);
        $shop_worker = $this->db->get_where('shop_worker', array('shop_id' => $shop_data->shop_id))->result();
      }
      $shop_worker_cat = $this->db->order_by('category_id', 'asc')->get('category_shop_worker')->result();

      if(empty($shop_shipping)) {
        $ins = array (
          'send_info_postcode' => '',
          'send_info_address_1' => '',
          'send_info_address_2' => '',
          'send_info_phone' => '',
          'free_shipping' => 1,
          'free_shipping_total_price' => 0,
          'free_shipping_cond_price' => 0,
          'return_info_postcode' => '',
          'return_info_address_1' => '',
          'return_info_address_2' => '',
          'return_info_phone' => '',
          'return_shipping_price' => 0,
          'return_send_shipping_price' => 0,
          'shop_id' => $shop_data->shop_id,
        );
        $this->db->insert('shop_shipping', $ins);
        $shop_shipping = $this->db->get_where('shop_shipping', array('shop_id' => $shop_data->shop_id))->row();
      }

      $now = date('Y-m-d H:i:s');
      $query = <<<QUERY
select * from shop_brand_info where shop_id={$shop_data->shop_id} and start_time<'{$now}' and '{$now}'<end_time
QUERY;
      $shop_brand_info = $this->db->query($query)->result();

      if (empty($shop_brand_info)) {
        $ins = array (
          'type' => SHOP_BRAND_INFO_TYPE_DEFAULT,
          'brand_text' => '',
          'start_time' => '2020-01-01 00:00:00',
          'end_time' => '2037-12-31 00:00:00',
          'shop_id' => $shop_data->shop_id,
        );
        $this->db->insert('shop_brand_info', $ins);

        $query = <<<QUERY
select * from shop_brand_info where shop_id={$shop_data->shop_id} and start_time<'{$now}' and '{$now}'<end_time
QUERY;
        $shop_brand_info = $this->db->query($query)->result();
      }

      $page_data['shop_data'] = $shop_data;
      $page_data['shop_worker_cat'] = $shop_worker_cat;
      $page_data['shop_worker'] = $shop_worker;
      $page_data['shop_shipping'] = $shop_shipping;
      $page_data['shop_shipping_company'] = $shop_shipping_company;
      $page_data['shop_brand_info'] = $shop_brand_info;
      $page_data['page_name'] = "account";
      $this->load->view('back/shop/index', $page_data);

    }
  }

}
