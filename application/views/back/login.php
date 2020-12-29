<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <title><?= strtoupper($control); ?> | FOUNDY</title>
  <link rel="shortcut icon" href="<?= base_url(); ?>uploads/others/favicon.png?>">
  <link href="<?= base_url(); ?>template/back/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://db.onlinewebfonts.com/c/b46bb1fc76216f5cd90457d0451dbee4?family=Futura-pt" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url(); ?>template/back/plugins/font-awesome/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <style>
    /* 공통 */
    * {
      padding: 0;
      border: 0;
      margin: 0;
    }
    html, body {
      width: 100%;
      height: 100%;
    }
    body {
      font-family: 'Apple SD Gothic Neo', 'Malgun Gothic', '맑은 고딕', sans-serif;
    }
    .clearfix::after {
      content: "";
      display: block;
      clear: both;
    }
    a {
      text-decoration: none;
      font-size: 0;
    }
    li {list-style: none;}
    button {
      background: none;
      outline: none;
      cursor: pointer;
    }
    img {vertical-align: middle;}
    input {
      background: none;
      outline: none;
      box-sizing: border-box;
      border-bottom: 1px solid #eee;
      font-family: futura-pt !important;
      font-style: normal !important;
      font-weight: 400 !important;
      font-size: 16px;
    }
    .futura-pt {
      font-family: futura-pt !important;
      font-style: normal !important;
      font-weight: 400 !important;
    }
    .meaning {
      overflow: hidden;
      position: absolute;
      width: 0;
      height: 0;
      line-height: 0;
    }
    #wrap {
      width: 100%;
      height: 100%;
      position: relative;
    }
    
    /* login */
    #whole {
      background-color: #fff;
      height: 100%;
      min-width: 320px;
      box-sizing: border-box;
      padding: 120px 24px 0;
      text-align: center;
      
      position: relative;
    }
    .page_name {
      margin-bottom: 80px;
    }
    .name_link {
      display: block;
      box-sizing: border-box;
      padding-left: 2px;
    }
    .name_link img:last-child {
      display: none;
    }
    .login_form {
      float: left;
      width: 100%;
      margin-bottom: 28px;
    }
    .form_child {
      height: 44px;
    }
    .form_child input {
      width: 100%;
      height: inherit;
      padding: 0 16px;
      color: #9e9e9e;
    }
    .form\:email {
      margin-bottom: 12px;
    }
    .login_btn {
      float: left;
      width: 100%;
      display: block;
      height: 48px;
      line-height: 48px;
      text-align: center;
      background-color: #604C48;
      border-radius: 4px;
      color: #fff;
      font-size: 16px;
      font-weight: bold;
      margin-bottom: 12px;
      
      padding-top: 2px;
      box-sizing: border-box;
    }
    
    .login_fn {
      float: left;
      width: 100%;
      height: 24px;
      line-height: 24px;
    }
    .fn_child {
      height: inherit;
      line-height: inherit;
    }
    
    .fn\:maintenance {
      float: left;
      font-size: 0;
    }
    .fn\:forget {
      float: right;
      cursor: pointer;
    }
    
    .maintenance_wrap {
      width: 108px;
      cursor: pointer;
    }
    .maintenance_ic {
      height: inherit;
    }
    .maintenance_txt {
      cursor: pointer;
      display: inline-block;
      margin-left: 8px;
      height: inherit;
      line-height: inherit;
      font-size: 12px;
      font-weight: normal;
      vertical-align: top;
      
      box-sizing: border-box;
      padding-top: 1px;
      color: #BDBDBD;
    }
    
    .fn\:forget {
      color: #E9967A;
      font-size: 12px;
      font-weight: bold;
      
      box-sizing: border-box;
      padding-top: 1px;
    }
    
    .page_data {
      position: absolute;
      left: 0;
      bottom: 16px;
      width: 100%;
      box-sizing: border-box;
      padding: 0 24px;
    }
    #page_type {
      color: #bdbdbd;
      width: 84%;
      padding-bottom: 12px;
      border-bottom: 1px dashed #e0e0e0;
      margin: 0 auto 12px;
      max-width: 248px;
      font-size: 15px;
    }
    .page_question {
      color: #604C48;
      font-size: 12px;
    }
    
    /* 모바일 414 */
    @media(min-width: 414px) {
      #whole {
        padding: 120px 0 0;
        width: 80%;
        margin: 0 auto;
      }
      .page_data {
        padding: 0;
      }
    }
    
    /* 태블릿 */
    @media(min-width: 768px) {
      .name_link img:first-child {
        display: none;
      }
      .name_link img:last-child {
        display: inline-block;
      }
      .name_link {
        padding-left: 0;
      }
      .page_name {
        margin-bottom: 36px;
      }
      #whole {
        padding: 148px 0 0;
        width: 576px;
        margin: 0 auto;
      }
      .page_data {
        bottom: 32px;
      }
      .page_login {
        padding-top: 84px;
        border-top: 2px solid #604C48;
      }
      .login_wrap {
        box-sizing: border-box;
        padding: 0 30px;
      }
      .login_form {
        width: calc(100% - 138px);
        margin-right: 12px;
        margin: 0 12px 16px 0;
      }
      .form_child {
        height: 48px;
      }
      .login_btn {
        width: 126px;
        height: 108px;
        line-height: 108px;
        border-radius: 8px;
        margin-bottom: 0;
      }
      .fn\:maintenance {
        width: calc(100% - 138px);
        text-align: left;
        margin-right: 12px;
        box-sizing: border-box;
        padding-left: 8px;
      }
      .fn\:forget {
        width: 126px;
        text-align: left;
      }
    }
    @media(min-width: 1025px) {
      #whole {
        width: 760px;
      }
      .login_btn {
        width: 160px;
      }
      .login_form {
        width: calc(100% - 172px);
      }
      .fn\:maintenance {
        width: calc(100% - 172px);
      }
      .fn\:forget {
        width: 160px;
      }
    }
    
    /* forget_password */
    .bg {
      display: none;
      width: 100%;
      height: 100%;
      background-color: rgba(0,0,0,0.23);
      position: absolute;
      top: 0;
      left: 0;
    }
    .popup_center {
      min-width: 288px;
      font-family: 'Apple SD Gothic Neo', 'Malgun Gothic', '맑은 고딕', sans-serif;
      position: absolute;
      top: 44px;
      left: 50%;
      margin-left: -45%;
      width: 90%;
      padding: 32px 0 0;
      box-sizing: border-box;
      border-radius: 4px;
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.12);
      background-color: #fff;
    }
    .pw_close {
      position: absolute;
      top: 0;
      right: 0;
      width: 40px;
      height: 40px;
    }
    .pw_how {
      padding: 0 16px 12px;
    }
    .pw_tit {
      color: #111;
      font-size: 14px;
      font-weight: normal;
      padding-bottom: 16px;
      text-align: center;
    }
    .how_tab {
      margin-top: 24px;
    }
    .divide {
      border-top: 1px dashed #eee;
      margin-bottom: 24px;
    }
    .how_type {
      height: 40px;
      line-height: 40px;
    }
    .how_type li {
      cursor: pointer;
      width: 50%;
      background-color: #fff;
      color: #616161;
      font-size: 12px;
      font-weight: normal;
      text-align: center;
      height: inherit;
      line-height: inherit;
      float: left;
      box-sizing: border-box;
      border: 1px solid #eee;
    }
    .how_type .type_mail {
      border-right: 0;
    }
    
    .active {
      background-color: #eee !important;
      font-weight: bold !important;
    }
    .write_tit, .verify_tit,
    .write_form, .verify_code {
      float: left;
    }
    
    .write_tit, .verify_tit {
      width: 52px;
      font-size: 11px;
      font-weight: bold;
      color: #bdbdbd;
      height: 40px;
      line-height: 40px;
    }
    .email_write, .email_verify {
      height: 40px;
      line-height: 40px;
    }
    .email_write {
      margin-bottom: 16px;
    }
    .write_form, .verify_code {
      width: calc(100% - 52px);
      height: inherit;
      line-height: inherit;
    }
    .form_input {
      width: calc(100% - 92px);
      float: left;
      height: inherit;
      line-height: inherit;
      padding: 0 10px;
      color: #9e9e9e;
      font-size: 12px;
      box-sizing: border-box;
      border: 1px solid #eee;
    }
    .form_send {
      width: 92px;
      float: left;
      height: inherit;
      background-color: #ad796d;
      color: #fff;
      font-size: 11px;
      font-weight: bold;
    }
    .code_btn {
      width: 92px;
      font-size: 0;
      vertical-align: top;
      height: inherit;
    }
    .code_btn button {
      display: inline-block;
      color: #fff;
      width: 64px;
      height: inherit;
      line-height: inherit;
      font-size: 11px;
      font-weight: bold;
    }
    #btn_no {
      background-color: #d2c8ba;
      margin-right: 8px;
    }
    #btn_yes {
      width: inherit;
      background-color: #ad796d;
    }
    .code_no, .code_btn {
      float: left;
    }
    .code_no {
      border: 0;
      padding: 0 10px;
      width: calc(100% - 92px);
      height: inherit;
      line-height: inherit;
      background-color: #f5f5f5;
      color: #bdbdbd !important;
      font-size: 11px;
      font-weight: bold;
    }
    .form_phone {
      height: 40px;
      line-height: inherit;
      float: left;
    }
    .form\:phone {
      display: block;
      width: calc(34.7% - 12px);
      float: left;
      font-weight: normal;
    }
    .hyphen {
      display: inline-block;
      width: 12px;
      float: left;
      color: #616161;
      font-size: 11px;
      font-weight: normal;
      text-align: center;
      height: 40px;
      line-height: 40px;
    }
    
    .form\:phone_send {
      margin-top: 8px;
      width: 100%;
      height: 40px;
    }
    .mobile_write {
      height: 88px;
      margin-bottom: 16px;
    }
    .form\:write_lg {
      height: auto;
    }
    
    .pw_reset {
      background-color: #fcfafa;
      height: 68px;
      border-radius: 0 0 4px 4px;
    }
    .pw_reset button {
      width: 64px;
      height: inherit;
      float: left;
      font-size: 11px;
      font-weight: bold;
      color: #fff;
      background-color: #616161;
      border-radius: 4px;
    }
    .btn_wrap {
      padding-top: 14px;
      height: 40px;
      width: 136px;
      margin: 0 auto;
    }
    .btn_reset {;
      margin-left: 8px;
    }
    .btn_reset:hover {
      background-color: #4caf50;
    }
    .btn_cancel:hover {
      background-color: #d32f2f;
    }
    
    .pw_advice {
      font-size: 0;
      height: 14px;
      margin: 0 0 24px 68px;
      box-sizing: border-box;
    }
    .advice_type {
      display: inline-block;
      color: #0091ea;
      font-size: 11px;
      font-weight: normal;
      line-height: inherit;
      vertical-align: top;
      margin-left: 4px;
    }
    
    @media(min-width: 414px){
      .popup_center {
        max-width: 372px;
        margin-left: -186px;
      }
      .mobile_write {
        height: 40px;
      }
      .form_phone {
        width: calc(100% - 104px);
        vertical-align: top;
      }
      .form\:phone_send {
        margin-left: 12px;
        width: 92px;
        margin: 0 0 0 12px;
      }
    }
    
    @media(min-width: 768px){
      .popup_center {
        max-width: 600px;
        margin-left: -300px;
      }
      .pw_how {
        max-width: 520px;
        margin: 0 auto;
      }
      .pw_advice {
        margin-left: 92px;
      }
      .how_tab {
        margin-top: 36px;
      }
      .divide {
        margin-bottom: 36px;
      }
      .form_input {
        width: calc(100% - 136px);
      }
      .form\:mail {
        width: calc(100% - 92px);
      }
      .form\:phone {
        width: calc(34.3% - 12px);
      }
    }
  </style>
  <script src="<?= base_url(); ?>template/front/plugins/jquery/jquery-1.11.1.js"></script>
</head>
<body>
<div id="wrap">
  <div id="whole">
    <h1 class="page_name">
      <a href="#" class="name_link">
        <img src="<?= base_url(); ?>template/icon/logo_sm.png" width="102" height="32" alt="파운디">
        <img src="<?= base_url(); ?>template/icon/logo_lg.png" width="158" height="50" alt="파운디">
      </a>
    </h1>
    <div class="page_data">
      <p id="page_type" class="futura-pt">https://dev.foundy.me/<?= $control; ?></p>
      <p class="page_question futura-pt">문의 ㅣ hello@foundy.me</p>
    </div>
    <section class="page_login">
      <h2 class="login_tit meaning">로그인 폼</h2>
      <div class="login_wrap clearfix">
        <div class="login_form">
          <div class="form_child form:email">
            <input type="email" placeholder="E-mail" id="email" class="futura-pt">
          </div>
          <div class="form_child form:pw">
            <input type="password" placeholder="Password" id="password" class="futura-pt">
          </div>
        </div>
        <a href="javascript:void(0);" class="login_btn" onclick="login()">로그인</a>
        <dl class="login_fn clearfix">
          <dt class="fn_child fn:maintenance">
            <div class="maintenance_wrap">
              <button class="maintenance_ic">
                <img src="<?= base_url(); ?>template/icon/ic_check_off.png" width="20" height="20" class="chk_off">
                <img src="<?= base_url(); ?>template/icon/ic_check_on.png" width="20" height="20" class="chk_on" style="display: none;">
              </button>
              <p class="maintenance_txt">로그인 상태 유지</p>
            </div>
          </dt>
          <dd class="fn_child fn:forget" onclick="open_forget_password();">비밀번호 등록 / 재설정</dd>
        </dl>
      </div>
    </section>
  </div>
</div>
<div class="modal" id="forgetPopup" style="display: none;">
  <div class="bg">
    <article class="popup_center">
      <p class="pw_tit">FORGET PASSWORD</p>
      <button class="pw_close" onclick="close_forget_password();">
        <img src="https://dev.foundy.me/template/front/header/imgs/icon_close_black.png" width="12" height="12" alt="닫기" style="opacity: 0.2;">
      </button>
      <div class="pw_wrap">
        <div class="pw_how">
          <ul class="how_type clearfix">
            <li class="type_mail" onclick="fn_set('mail');">이메일 인증</li>
            <li class="type_mobile" onclick="fn_set('mobile');">휴대폰 인증</li>
          </ul>
          <div class="how_tab">
            <div class="divide"></div>
            <div class="tab_mail">
              <div class="email_write clearfix">
                <p class="write_tit">이메일</p>
                <div class="write_form clearfix">
                  <input class="form_input form:mail" id="forget_email" placeholder="이메일을 입력해 주세요.">
                  <button class="form_send" onclick="send_approval_code();">인증메일 보내기</button>
                </div>
              </div>
              <div class="email_verify clearfix">
                <p class="verify_tit">본인인증</p>
                <div class="verify_code clearfix">
                  <input class="code_no" id="approval_code" placeholder="인증코드">
                  <div class="code_btn">
                    <button id="btn_yes" onclick="reset_password('email')">인증번호 확인</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab_mobile" style="display: none;">
              <div class="mobile_write clearfix">
                <p class="write_tit" style="line-height: 1.5; margin: 4px 0;">휴대폰<br>번호</p>
                <div class="write_form form:write_lg clearfix">
                  <div class="form_phone clearfix">
                    <input type="text" class="form_input form:phone">
                    <div class="hyphen">-</div>
                    <input type="text" class="form_input form:phone">
                    <div class="hyphen">-</div>
                    <input type="text" class="form_input form:phone">
                  </div>
                  <button class="form_send form:phone_send">인증번호 보내기</button>
                </div>
              </div>
              <div class="email_verify clearfix">
                <p class="verify_tit">본인인증</p>
                <div class="verify_code clearfix">
                  <input class="code_no" placeholder="인증코드">
                  <div class="code_btn">
                    <button id="btn_yes">인증번호 확인</button>
                  </div>
                </div>
              </div>
              <div class="tab_mobile" id="nice_approval" style="display: none;">
                <div class="email_verify clearfix">
                  <!--                <p class="write_tit">본인인증</p>-->
                  <div class="verify_code clearfix" style="display: none">
                    <form name="form_chk" method="post">
                      <input type="hidden" name="m" value="checkplusService">
                      <input type="hidden" name="EncodeData">
                      <!--                    <a id="form_chk" href="javascript:fnNicePopup();">-->
                      <input type="hidden" id="sid" name="param_r1" value="">
                      <input type="hidden" id="aid" name="param_r2" value="">
                      <input type="hidden" id="did" name="param_r3" value="">
                    </form>
                    <!--                  <input id="approval_code" class="code_no" type="number" placeholder="인증코드">-->
                  </div>
                  <div class="code_btn" style="width: 100%">
                    <button id="btn_yes" onclick="reset_password('nice');">인증확인하기</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="pw_advice" style="display: none;">
          <div class="advice_type" style="margin: 0">
            <img id="img_info" src="<? echo base_url(); ?>template/icon/information_mark.png" width="14" height="14" style="display: none">
            <img id="img_exam" src="<? echo base_url(); ?>template/icon/exclamation_mark.png" width="14" height="14" style="display: none">
            <span id="approval_msg"></span>
          </div>
        </div>
        <!--        <div class="pw_advice">-->
        <!--          <img src="--><?//= base_url(); ?><!--template/icon/information_mark.png" width="14" height="14">-->
        <!-- 인증 실패시에  " 본인인증에 실패하였습니다. 다시 시도해주세요. " 로 문구변경 부탁드립니다. -->
        <!--          <p class="advice_type">본인인증이 완료되었습니다.</p>-->
        <!--        </div>-->
        <div class="pw_reset">
          <div class="btn_wrap clearfix">
            <button class="btn_cancel" onclick="close_forget_password();">CANCEL</button>
            <button class="btn_reset" onclick="fn_show();">APPROVAL</button>
          </div>
        </div>
      </div>
    </article>
  </div>
</div>
<div id="loading_set"style="display:none;text-align:center;width:100%;height:100%;position:fixed;top:0;left:0;z-index:5000;background-color:rgba(20,20,20,0.5)">
  <i class="fa fa-refresh fa-spin fa-5x fa-fw" style="position:relative;top:50%"></i>
</div>
<script>
  let select = '';
  function validateEmail(emailAddress) {
    let pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
  }
  function clear_approval_msg() {
    $('#img_info').hide();
    $('#img_exam').hide();
    $('.pw_advice').hide();
    $('#approval_msg').text('');
  }
  function set_approval_msg(msg,error=false) {
    if (error) {
      $('#img_info').hide();
      $('#img_exam').show();
      $('#approval_msg').css('color', 'darkred');
    } else {
      $('#img_exam').hide();
      $('#img_info').show();
      $('#approval_msg').css('color', '#0091ea');
    }
    $('#approval_msg').text(msg);
    $('.pw_advice').show();
  }
  function send_approval_code() {
    console.log(select);
    if (select === 'send_approval') {
      alert('인증이 진행중입니다!');
      return false;
    }
    let email = $('#forget_email').val();
    console.log(email);
    if (validateEmail(email) === false) {
      set_approval_msg('정확한 이메일 주소를 입력바랍니다',true);
      return false;
    }
    $('#loading_set').show();
    let formData = new FormData();
    formData.append('email', email);
    $.ajax({
      url: '<?php echo base_url().$control; ?>' + '/login/send_approval', // form action url
      type: 'POST', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        $("#loading_set").delay(500).fadeOut(500);
        if (data === 'done' || data.search('done') !== -1) {
          // alert('인증코드가 전송되었습니다. 이메일 확인 후 입력바랍니다.');
          set_approval_msg('인증코드가 전송되었으니 이메일 확인 후 인증코드를 정확히 입력바랍니다!');
          $('.email_verify').show();
          $('#approval_code').focus();
          select = 'send_approval';
        } else {
          set_approval_msg('이메일 전송에 실패하였습니다! ' + data,true);
          // alert(data);
        }
      },
      error: function (e) {
        console.log(e)
      }
    });
  }
  function reset_password(type) {
    let formData = new FormData();
    if (type === 'email') {
      formData.append('email', $('#forget_email').val());
      formData.append('approval_code', $('#approval_code').val());
    } else {
      formData.append('sid', $('#sid').val());
      formData.append('aid', $('#aid').val());
      formData.append('did', $('#did').val());
    }
    
    let url;
    if (type === 'email') {
      url = '<?= base_url().$control; ?>/login/approval/email';
    } else {
      url = '<?= base_url().$control; ?>/login/approval/mobile';
    }
    
    $('#loading_set').show();
    
    $.ajax({
      url: url,
      type: 'POST', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        console.log(data);
        let msg;
        let res = JSON.parse(data);
        $("#loading_set").fadeOut(500);
        if (res.status === 'done') {
          msg = res.message;
          $('#img_exam').hide();
          $('#img_info').show();
          set_approval_msg(msg);
          alert(msg);
          setTimeout(function(){window.location.reload(true);}, 1000);
        } else {
          msg = res.message;
          $('#img_exam').show();
          $('#img_info').hide();
          alert(msg);
          set_approval_msg(msg,true);
        }
      },
      error: function (e) {
        console.log(e)
      }
    });
    
  }
  function login() {
    let formdata = new FormData();
    formdata.append('email', $('#email').val());
    formdata.append('password', $('#password').val());
    
    if (validateEmail($('#email').val()) === false) {
      $('#loading_set').delay(500).fadeOut(500);
      alert('이메일을 정확히 입력해주세요!');
      return false;
    }
    
    $('#loading_set').show();
    
    $.ajax({
      url: '<?= base_url().$control.'/login'; ?>',
      type        : 'POST',
      dataType    : 'html',
      data        : formdata,
      cache       : false,
      contentType : false,
      processData : false,
      beforeSend: function() {
        // button.html(ing); // change submit button text
      },
      success: function(data) {
        $('#loading_set').delay(500).fadeOut(500);
        if(data === 'lets_login'){
          setTimeout(function() { window.location.href='<?= base_url().$control; ?>'}, 500)
        } else {
          alert(data);
        }
      },
      error: function(e) {
        console.log(e)
      }
    });
  };
  window.addEventListener("keydown", checkKeyPressed, false);
  function checkKeyPressed(e) {
    // console.log(e.keyCode);
    if (e.keyCode === 13) {
      // console.log('login');
      login();
    } else if(e.keyCode === 27){
      // console.log('close_popup');
      close_forget_password();
    }
  };
  $(document).ready(function(){
    // console.log(1);
    $(window).load(function(){
      $('.chk_off').show().next().hide();
    })
    
    $('.chk_off').show();
    $('.maintenance_txt').css('color','#bdbdbd');
    $('.maintenance_wrap').click(function(){
      let status = $('.chk_off').css('display');
      if(status != 'none'){
        $(this).find('.chk_off').hide().next().show();
        $('.maintenance_txt').css('color','#604C48');
      }
      else {
        $(this).find('.chk_off').show().next().hide();
        $('.maintenance_txt').css('color','#bdbdbd');
      }
    })
  })
  function fn_set(s) {
    if (select === 'progress' || select === 'send_approval') {
      alert('인증이 진행중입니다!');
      return false;
    }
    select = s;
    if (s === 'mail') {
      $('.type_mail').addClass('active');
      $('.type_mobile').removeClass('active');
    } else {
      $('.type_mobile').addClass('active');
      $('.type_mail').removeClass('active');
    }
  }
  function fn_show() {
    if (select === 'mail') {
      fn_mail();
      select = 'progress';
    } else if (select === 'mobile') {
      fn_mobile();
      select = 'progress';
    } else if (select === 'progress' || select === 'send_approval') {
      alert('인증이 진행중입니다!');
    } else {
      alert('인증 방법을 선택해주세요!');
    }
  }
  function fn_mail() {
    $('.tab_mail').show().next().hide();
  }
  function fn_mobile() {
    $('#loading_set').show();
    let formData = new FormData();
    formData.append('s', sid);
    formData.append('f', '<?= $control.'_forget_passwd'; ?>');
    $.ajax({
      url: '<?= base_url(); ?>auth/nice/init',
      type: 'POST', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        $("#loading_set").delay(500).fadeOut(500);
        data = JSON.parse(data);
        // console.log(data);
        if (data.status === 'done') {
          enc = data.enc_data;
          auth_id = data.auth_id;
          window.document.form_chk.EncodeData.value = enc;
          window.document.form_chk.param_r1.value = sid;
          window.document.form_chk.param_r2.value = auth_id;
          window.document.form_chk.param_r3.value = '<?= $control.'_forget_passwd'; ?>';
          fnNicePopup();
          close_forget_password();
        } else {
          alert(data.status);
        }
      },
      error: function (e) {
        console.log(e)
      }
    });
  }
  function fnNicePopup(){
    nicePopup = window.open('', 'popupChk', 'width=500, height=550, top=100, left=100, fullscreen=no, menubar=no, status=no, toolbar=no, titlebar=yes, location=no, scrollbar=no');
    document.form_chk.action = "https://nice.checkplus.co.kr/CheckPlusSafeModel/checkplus.cb";
    document.form_chk.target = "popupChk";
    // document.form_chk.target = "_parent";
    document.form_chk.submit();
  }
  function clear_popup() {
    select = '';
    $('.tab_mail').hide();
    $('.tab_mobile').hide();
    $('#forget_email').val('');
    $('#approval_code').val('');
    $('.type_mobile').removeClass('active');
    $('.type_mail').removeClass('active');
    clear_approval_msg();
  }
  function close_forget_password() {
    let popup = $('#forgetPopup');
    popup.hide().find('.bg').hide().children('.popup_center').hide();
    clear_popup();
  }
  function open_forget_password() {
    let popup = $('#forgetPopup');
    popup.show().find('.bg').show().children('.popup_center').show();
    clear_popup();
  }
</script>
</body>
</html>
