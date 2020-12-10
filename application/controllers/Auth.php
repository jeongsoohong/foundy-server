<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Auth extends CI_Controller
{
  private $page_data = null;
  
  function __construct() {
    parent::__construct();
  }
  
  public function index() {
    $this->redirect_error();
  }
  
  public function nice($para1 = '', $para2 = '', $para3 = '') {
  
    $this->load->model('nice_model');
 
    /*
    ┌ cb_encode_path 변수에 대한 설명  ──────────────────────────────────
      모듈 경로설정은, '/절대경로/모듈명' 으로 정의해 주셔야 합니다.
      
      + FTP 로 모듈 업로드시 전송형태를 'binary' 로 지정해 주시고, 권한은 755 로 설정해 주세요.
      
      + 절대경로 확인방법
        1. Telnet 또는 SSH 접속 후, cd 명령어를 이용하여 모듈이 존재하는 곳까지 이동합니다.
        2. pwd 명령어을 이용하면 절대경로를 확인하실 수 있습니다.
        3. 확인된 절대경로에 '/모듈명'을 추가로 정의해 주세요.
    └────────────────────────────────────────────────────────────────────
    */
  
    // Linux = /절대경로/ , Window = D:\\절대경로\\ , D:\절대경로\
    $cb_encode_path = $this->nice_model->get_module_path();
    $sitecode = $this->nice_model->get_sitecode();      // NICE로부터 부여받은 사이트 코드
    $sitepasswd = $this->nice_model->get_sitepw();      // NICE로부터 부여받은 사이트 패스워드
    $reqseq = $this->nice_model->get_reqseq();          // 요청 번호, 이는 성공/실패후에 같은 값으로 되돌려주게 되므로
                                                        // 업체에서 적절하게 변경하여 쓰거나, 아래와 같이 생성한다.
  
    if ($para1 == 'done') {

      if (isset($_GET["EncodeData"])) {
        $enc_data = $_GET["EncodeData"];    // 암호화된 결과 데이타
        $session_id = $_GET["param_r1"];
        $auth_id = $_GET["param_r2"];
        $for = $_GET["param_r3"];
        log_message('debug', '[nice] done, GET['.json_encode($_GET).']');
      } else if (isset($_REQUEST["EncodeData"])) {
        $enc_data = $_REQUEST["EncodeData"];		// 암호화된 결과 데이타
        $session_id = $_REQUEST["param_r1"];
        $auth_id = $_REQUEST["param_r2"];
        $for = $_REQUEST["param_r3"];
        log_message('debug', '[nice] done, REQUEST['.json_encode($_REQUEST).']');
      } else {
        $this->redirect_error('접근 오류가 발생하였습니다!', 'home');
      }
  
      if ($for == 'forget_passwd' || $for == 'mobile_approval' || $for == 'register') {
        $domain_type = 'home';
      } else if ($for == 'center_forget_passwd' || $for == 'shop_forget_passwd' || $for == 'admin_forget_passwd') {
        $domain_type = substr($for, 0, strlen($for) - 14);
      }
  
      $auth_data = $this->db->get_where('user_auth', array('auth_id' => $auth_id))->row();
      if (isset($auth_data) == false || empty($auth_data) == true) {
        $this->redirect_error('접근 오류가 발생하였습니다!(1)', $domain_type);
      }
      if ($auth_data->session_id != $session_id) {
        $this->redirect_error('접근 오류가 발생하였습니다!(2)', $domain_type);
      }
      if ($auth_data->for != $for) {
        $this->redirect_error('접근 오류가 발생하였습니다!(3)', $domain_type);
      }
//      $this->page_data['init'] = json_decode($auth_data->auth_data);
      
      //////////////////////////////////////////////// 문자열 점검///////////////////////////////////////////////
      if(preg_match('~[^0-9a-zA-Z+/=]~', $enc_data, $match)) {echo "입력 값 확인이 필요합니다 : ".$match[0]; exit;} // 문자열 점검 추가.
      if(base64_encode(base64_decode($enc_data))!=$enc_data) {echo "입력 값 확인이 필요합니다"; exit;}
  
      ///////////////////////////////////////////////////////////////////////////////////////////////////////////
  
      if ($enc_data != "") {
    
        $plaindata = `$cb_encode_path DEC $sitecode $sitepasswd $enc_data`;		// 암호화된 결과 데이터의 복호화
//        echo "[plaindata]  " . $plaindata . "<br>";
    
        if ($plaindata == -1){
          $returnMsg  = "암/복호화 시스템 오류";
        }else if ($plaindata == -4){
          $returnMsg  = "복호화 처리 오류";
        }else if ($plaindata == -5){
          $returnMsg  = "HASH값 불일치 - 복호화 데이터는 리턴됨";
        }else if ($plaindata == -6){
          $returnMsg  = "복호화 데이터 오류";
        }else if ($plaindata == -9){
          $returnMsg  = "입력값 오류";
        }else if ($plaindata == -12){
          $returnMsg  = "사이트 비밀번호 오류";
        }else{
          // 복호화가 정상적일 경우 데이터를 파싱합니다.
          $ciphertime = `$cb_encode_path CTS $sitecode $sitepasswd $enc_data`;	// 암호화된 결과 데이터 검증 (복호화한 시간획득)
      
          $requestnumber = $this->nice_model->get_value_from_plain_data($plaindata , "REQ_SEQ");
          $responsenumber = $this->nice_model->get_value_from_plain_data($plaindata , "RES_SEQ");
          $authtype = $this->nice_model->get_value_from_plain_data($plaindata , "AUTH_TYPE");
          $name = $this->nice_model->get_value_from_plain_data($plaindata , "NAME");
//          $name = $this->nice_model->get_value_from_plain_data($plaindata , "UTF8_NAME"); //charset utf8 사용시 주석 해제 후 사용
          $birthdate = $this->nice_model->get_value_from_plain_data($plaindata , "BIRTHDATE");
          $gender = $this->nice_model->get_value_from_plain_data($plaindata , "GENDER");
          $nationalinfo = $this->nice_model->get_value_from_plain_data($plaindata , "NATIONALINFO");	//내/외국인정보(사용자 매뉴얼 참조)
          $dupinfo = $this->nice_model->get_value_from_plain_data($plaindata , "DI");
          $conninfo = $this->nice_model->get_value_from_plain_data($plaindata , "CI");
          $mobileno = $this->nice_model->get_value_from_plain_data($plaindata , "MOBILE_NO");
          $mobileco = $this->nice_model->get_value_from_plain_data($plaindata , "MOBILE_CO");
  
//          if(strcmp($_SESSION["REQ_SEQ"], $requestnumber) != 0)
//          {
//            $this->redirect_error('세션값이 다릅니다~ 올바른 경로로 접근하시기 바랍니다!', $domain_type);
//            echo "세션값이 다릅니다. 올바른 경로로 접근하시기 바랍니다.<br>";
//            $requestnumber = "";
//            $responsenumber = "";
//            $authtype = "";
//            $name = "";
//            $birthdate = "";
//            $gender = "";
//            $nationalinfo = "";
//            $dupinfo = "";
//            $conninfo = "";
//            $mobileno = "";
//            $mobileco = "";
//          }
        }
      }
      $name = iconv('EUC-KR', 'UTF-8', $name);
      
//      $this->page_data['page_name'] = "auth";
      $this->page_data['ciphertime'] = $ciphertime;
      $this->page_data['requestnumber'] = $requestnumber;
      $this->page_data['responsenumber'] = $responsenumber;
      $this->page_data['authtype'] = $authtype;
      $this->page_data['name'] = $name;
      $this->page_data['birthdate'] = $birthdate;
      $this->page_data['gender'] = $gender;
      $this->page_data['nationalinfo'] = $nationalinfo;
      $this->page_data['dupinfo'] = $dupinfo;
      $this->page_data['conninfo'] = $conninfo;
      $this->page_data['mobileno'] = $mobileno;
      $this->page_data['mobileco'] = $mobileco;
      
//      log_message('debug', '[nice] done, '.$ciphertime.', '.$requestnumber.', '.$responsenumber.', '.$authtype.
//        ', '.$name.', '.$birthdate.', '.$gender.', '.$nationalinfo.', '.$dupinfo.', '.$conninfo.', '.
//      $mobileno.', '.$mobileco);
      
      $upd = array(
        'auth_data' => json_encode($this->page_data),
        'status' => 'done',
      );
      $this->db->update('user_auth', $upd, array('auth_id' => $auth_id));

      if ($for == 'forget_passwd') {
        redirect(base_url().'home/login/approval/mobile?sid='.$session_id.'&aid='.$auth_id.'&fid='.$for);
      } else if ($for == 'mobile_approval') {
        redirect(base_url().'home/register/approval/mobile?sid='.$session_id.'&aid='.$auth_id.'&fid='.$for);
      } else if ($for == 'register') {
        redirect(base_url().'home/register/approval/do?sid='.$session_id.'&aid='.$auth_id.'&fid='.$for);
      } else {
        redirect(base_url().$domain_type.'/login/approval/mobile?sid='.$session_id.'&aid='.$auth_id.'&fid='.$for);
      }
      
//      log_message('debug', '[nice] done, session_id['.$session_id.'] session_id2['.
//        $this->crud_model->get_session_id().'] reqseq1['.$_SESSION["REQ_SEQ"].'] reqseq2['.$requestnumber.']'.
//      ' data['.json_encode($upd).'] cnt['.$this->db->affected_rows().']');
//      $this->load->view('back/auth/nice/success', $this->page_data);
  
    } else if ($para2 == 'fail') {
  
      if (isset($_GET["EncodeData"])) {
        $enc_data = $_GET["EncodeData"];		// 암호화된 결과 데이타
        $session_id = $_GET["param_r1"];
        $auth_id = $_GET["param_r2"];
        $for = $_GET["param_r3"];
//        log_message('debug', '[nice] done, GET['.json_encode($_GET).']');
      } else if (isset($_REQUEST["EncodeData"])) {
        $enc_data = $_REQUEST["EncodeData"];		// 암호화된 결과 데이타
        $session_id = $_REQUEST["param_r1"];
        $auth_id = $_REQUEST["param_r2"];
        $for = $_REQUEST["param_r3"];
//        log_message('debug', '[nice] done, REQUEST['.json_encode($_REQUEST).']');
      } else {
        $this->redirect_error('접근 오류가 발생하였습니다!', 'home');
      }
  
      if ($for == 'forget_passwd' || $for == 'mobile_approval' || $for == 'register') {
        $domain_type = 'home';
      } else if ($for == 'center_forget_passwd' || $for == 'shop_forget_passwd' || $for == 'admin_forget_passwd') {
        $domain_type = substr($for, 0, strlen($for) - 14);
      }

      $auth_data = $this->db->get_where('user_auth', array('auth_id' => $auth_id))->row();
      if (isset($auth_data) == false || empty($auth_data) == true) {
        $this->redirect_error('접근 오류가 발생하였습니다!(1)', $domain_type);
      }
      if ($auth_data->session_id != $session_id) {
        $this->redirect_error('접근 오류가 발생하였습니다!(2)', $domain_type);
      }
      if ($auth_data->for != $for) {
        $this->redirect_error('접근 오류가 발생하였습니다!(3)', $domain_type);
      }
      $this->page_data['init'] = json_decode($auth_data->auth_data);
  
      //////////////////////////////////////////////// 문자열 점검///////////////////////////////////////////////
      if(preg_match('~[^0-9a-zA-Z+/=]~', $enc_data, $match)) {echo "입력 값 확인이 필요합니다 : ".$match[0]; exit;} // 문자열 점검 추가.
      if(base64_encode(base64_decode($enc_data))!=$enc_data) {echo "입력 값 확인이 필요합니다"; exit;}
  
      ///////////////////////////////////////////////////////////////////////////////////////////////////////////
  
      if ($enc_data != "") {
    
        $plaindata = `$cb_encode_path DEC $sitecode $sitepasswd $enc_data`;		// 암호화된 결과 데이터의 복호화
//        echo "[plaindata] " . $plaindata . "<br>";
    
        if ($plaindata == -1){
          $returnMsg  = "암/복호화 시스템 오류";
        }else if ($plaindata == -4){
          $returnMsg  = "복호화 처리 오류";
        }else if ($plaindata == -5){
          $returnMsg  = "HASH값 불일치 - 복호화 데이터는 리턴됨";
        }else if ($plaindata == -6){
          $returnMsg  = "복호화 데이터 오류";
        }else if ($plaindata == -9){
          $returnMsg  = "입력값 오류";
        }else if ($plaindata == -12){
          $returnMsg  = "사이트 비밀번호 오류";
        }else{
          // 복호화가 정상적일 경우 데이터를 파싱합니다.
          $ciphertime = `$cb_encode_path CTS $sitecode $sitepasswd $enc_data`;	// 암호화된 결과 데이터 검증 (복호화한 시간획득)
      
          $requestnumber = $this->nice_model->get_value_from_plain_data($plaindata , "REQ_SEQ");
          $errcode = $this->nice_model->get_value_from_plain_data($plaindata , "ERR_CODE");
          $authtype = $this->nice_model->get_value_from_plain_data($plaindata , "AUTH_TYPE");
        }
      }
  
      $this->page_data['page_name'] = "auth";
      $this->page_data['ciphertime'] = $ciphertime;
      $this->page_data['requestnumber'] = $requestnumber;
      $this->page_data['errcode'] = $errcode;
      $this->page_data['authtype'] = $authtype;
      
      $upd = array(
        'auth_data' => json_encode($this->page_data),
        'status' => 'done',
      );
      $this->db->update('user_auth', $upd, array('auth_id' => $auth_id));
//      $this->load->view('back/auth/nice/fail', $this->page_data);
      
      $this->redirect_error('인증에 오류가 발생하였습니다! ('.$errcode.')', $domain_type);
    
    } else if ($para1 == 'init') { // init
      
      if (isset($_POST['s']) == false || isset($_POST['f']) == false) {
        $result['statue'] = '입력값 오류 입니다!';
        $result['enc_data'] = '';
        echo json_encode($result);
        exit;
      }

      $session_id = $_POST['s'];
      $for = $_POST['f'];
      
      if ($for == 'forget_passwd' || $for == 'mobile_approval' || $for == 'register') {
        $domain_type = 'home';
      } else if ($for == 'center_forget_passwd' || $for == 'shop_forget_passwd' || $for == 'admin_forget_passwd') {
        $domain_type = substr($for, 0, strlen($for) - 14);
      }
      
      $authtype = "M";      		// 없으면 기본 선택화면, X: 공인인증서, M: 핸드폰, C: 카드 (1가지만 사용 가능)
      $popgubun 	= "Y";		//Y : 취소버튼 있음 / N : 취소버튼 없음
      $customize 	= "";		//없으면 기본 웹페이지 / Mobile : 모바일페이지 (default값은 빈값, 환경에 맞는 화면 제공)
      $gender = "";      		// 없으면 기본 선택화면, 0: 여자, 1: 남자
  
      // 실행방법은 싱글쿼터(`) 외에도, 'exec(), system(), shell_exec()' 등등 귀사 정책에 맞게 처리하시기 바랍니다.
//      $reqseq = `$cb_encode_path SEQ $sitecode`;
  
      // CheckPlus(본인인증) 처리 후, 결과 데이타를 리턴 받기위해 다음예제와 같이 http부터 입력합니다.
      // 리턴url은 인증 전 인증페이지를 호출하기 전 url과 동일해야 합니다. ex) 인증 전 url : http://www.~ 리턴 url : http://www.~
      $returnurl = $this->nice_model->get_return_url('auth');	// 성공시 이동될 URL
      $errorurl = $this->nice_model->get_error_url('auth');		// 실패시 이동될 URL
  
      // reqseq값은 성공페이지로 갈 경우 검증을 위하여 세션에 담아둔다.
      $_SESSION["REQ_SEQ"] = $reqseq;
      
      log_message('debug', '[nice] init, session_id['.$session_id.'] session_id2['.
        $this->crud_model->get_session_id().'] '.$_SESSION["REQ_SEQ"].' reqseq['.$reqseq.']');
  
      // 입력될 plain 데이타를 만든다.
      $plaindata = "7:REQ_SEQ" . strlen($reqseq) . ":" . $reqseq .
        "8:SITECODE" . strlen($sitecode) . ":" . $sitecode .
        "9:AUTH_TYPE" . strlen($authtype) . ":". $authtype .
        "7:RTN_URL" . strlen($returnurl) . ":" . $returnurl .
        "7:ERR_URL" . strlen($errorurl) . ":" . $errorurl .
        "11:POPUP_GUBUN" . strlen($popgubun) . ":" . $popgubun .
        "9:CUSTOMIZE" . strlen($customize) . ":" . $customize .
        "6:GENDER" . strlen($gender) . ":" . $gender ;
  
      $enc_data = `$cb_encode_path ENC $sitecode $sitepasswd $plaindata`;
//     $enc_data = system($cb_encode_path.' ENC '.$sitecode.' '.$sitepasswd.' '.$plaindata);
  
      if ($enc_data == -1) {
        $result['status'] = '암/복호화 시스템 오류 입니다!';
        $result['enc_data'] = '';
      } else if ($enc_data== -2) {
        $result['status'] = '암호화 처리 오류 입니다!';
        $result['enc_data'] = '';
      } else if($enc_data== -3) {
        $result['status'] = '암호화 데이터 오류 입니다!';
        $result['enc_data'] = '';
      } else if($enc_data== -9) {
        $result['status'] = '입력값 오류 입니다!';
        $result['enc_data'] = '';
      } else {
        $result['status'] = 'done';
        $result['enc_data'] = $enc_data;
  
        $ins = array(
          'for' => $for,
          'session_id' => $session_id,
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
          'auth_type' => USER_AUTH_TYPE_NICE_CHECK_PLUS_SAFE,
          'auth_type_str' => $this->crud_model->get_user_auth_type_str(USER_AUTH_TYPE_NICE_CHECK_PLUS_SAFE),
          'status' => 'init',
          'auth_data' => json_encode($result),
        );
        $this->db->set('auth_at', 'NOW()', false);
        $this->db->insert('user_auth', $ins);
        $auth_id = $this->db->insert_id();
        if ($auth_id <= 0) {
          $result['status'] = 'DB 오류가 발생하였습니다.(id:'.$auth_id.')';
          $result['enc_data'] = '';
        } else {
          $result['auth_id'] = $auth_id;
        }
      }
      
      $this->response($result);
      
    } else if ($para1 == 'do') {
  
      if (isset($_GET['a']) == false || isset($_GET['s']) == false || isset($_GET['e']) == false) {
        $this->redirect_error();
      }
  
      $enc_data = $_GET['e'];
      $session_id = $_GET['s'];
      $auth_id = $_GET['a'];
      $for = $_GET['f'];
  
      if ($for == 'forget_passwd' || $for == 'mobile_approval') {
        $domain_type = 'home';
      }
  
      $auth_data = $this->db->get_where('user_auth', array('auth_id' => $auth_id))->row();
      if (isset($auth_data) == false || empty($auth_data) == true) {
        $this->redirect_error('접근 오류가 발생하였습니다!', $domain_type);
      }
      if ($auth_data->session_id != $session_id) {
        $this->redirect_error('접근 오류가 발생하였습니다!', $domain_type);
      }
  
      $this->page_data['page_name'] = "auth";
      $this->page_data['sid'] = $session_id;
      $this->page_data['aid'] = $auth_id;
      $this->page_data['did'] = $domain_type;
      $this->page_data['enc_data'] = $enc_data;
      $this->load->view('back/auth/nice/main', $this->page_data);
  
    } else {
      $this->redirect_error('접근 오류가 발생하였습니다!', 'home');
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
  
  private function redirect_error($msg = '', $page = '') {
    redirect(base_url().'auth/error?m='.$msg.'&p='.$page);
  }
  
  private function response($result) {
    echo json_encode($result);
    exit;
  }
}
