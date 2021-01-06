<style>
  .content-area {
    background-color: #FFFFFF;
  }
  .btn-kakao-login {
    border: none;
  }
  .btn-kakao-login:hover {
    background-color: transparent;
  }
  footer {
    background-color: #FFFFFF;
    padding-top: 15px;
    margin-top: 0px !important;
  }
</style>
<section class="page-section color" style="background-color: #ffffff">
  <div class="container" id="login">
    <div class="row margin-top-0">
      <div class="col-sm-12">
        <div class="row box_shape" style="border: none; box-shadow: none;">
          <div class="title">
            <div class="col-sm-12 title" style="background-color: #ffffff; padding: 20px; height: auto; font-weight: 700; color: #232323">
              <!-- 로그인 -->
              <div class="option" style="text-align: center !important; margin: 0 auto; text-transform: none; font-size: 12px; line-height: 1.5; font-weight: 400; color: #757575">
                간편하게 로그인하고<br>
                균형잡힌 삶을 찾아보세요
              </div>
            </div>
          </div>
<!--          <hr>-->
          <div class="col-sm-12">
            <div class="form-group">
              <input class="form-control email" id="user-email" type="email" name="email" placeholder="<?php echo ('email');?>">
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <input class="form-control" id="user-password" type="password" name="password" placeholder="<?php echo ('password');?>">
            </div>
          </div>
          <div class="col-sm-12 text-right pull-right">
          </div>
          <div class="col-sm-12">
            <a href="javascript:void(0)" onclick="do_login()">
              <span class="btn btn-theme-sm btn-block btn-theme-dark pull-right" style="border-width:unset;border-color:#ad796d;background-color: #ad796d">
                로그인
              </span>
            </a>
          </div>
          <div class="col-sm-12 title" style="display: flex; background-color: #ffffff; padding: 10px 15px; height: 40px font-weight: 400; color: #232323">
            <div class="forgot-password" style="text-align: left; width: 50%; font-size: 12px; line-height: 20px;">
              <a href="javascript:void(0)" onclick="open_forget_password()">
                <u>비밀번호 찾기</u>
              </a>
            </div>
            <div class="option" style="text-align: right; width: 50%; font-size: 12px; line-height: 20px;">
              <a class="media-link" href="<?php echo base_url(); ?>home/register">
                <u>일반회원가입</u>
              </a>
            </div>
          </div>
          <hr style="margin-top: 12px; margin-bottom: 24px;">
<!--          <div class="col-sm-12">-->
<!--            <span class="btn btn-theme-sm btn-block btn-theme-transparent pull-center kakao-login btn-kakao-login">-->
<!--              카카오 로그인-->
<!--            </span>-->
<!--          </div>-->
          <div class="col-sm-12" style="text-align: center">
            <a href="javascript:void(0);" onclick="loginWithKakaoRest();" style="display: block;">
              <img src="//k.kakaocdn.net/14/dn/btqCn0WEmI3/nijroPfbpCa4at5EIsjyf0/o.jpg" width="225" height="48.78">
            </a>
          </div>
          <!-- 애플 로그인 -->
          <?php if ($this->app_model->is_ios_app()) { ?>
          <style>
            #appleid-signin {
              width: 210px;
              height: 44px;
              margin: 10px auto;
              padding: 0;
            }
            div:focus {
              outline: 0;
            }
          </style>
          <script type="text/javascript" src="https://appleid.cdn-apple.com/appleauth/static/jsapi/appleid/1/en_US/appleid.auth.js"></script>
          <div id="appleid-signin" class="signin-button" data-color="black" data-border="false" data-type="sign in"></div>
          <script type="text/javascript">
            <?php
            $csrf_token = md5(uniqId(rand(), TRUE));
            $this->session->set_userdata('token', $csrf_token);
            ?>
            AppleID.auth.init({
              <?php if (DEV_SERVER) { ?>
              clientId : 'me.foundy.dev.services',
              <?php } else { ?>
              clientId : 'me.foundy.services',
              <?php } ?>
              scope : 'name email',
              redirectURI : '<?php echo base_url(); ?>home/login/apple',
              state : 'apple_login', // 상태값, 나중에 response로 다시 받는다
              nonce : '<?php echo $csrf_token; ?>', // 임시값
              usePopup : true
            });
            //Listen for authorization success
            document.addEventListener('AppleIDSignInOnSuccess', (data) => {
              $("#loading_set").show();
              //handle successful response
              // console.log(data);
              $.ajax({
                url : '<?php echo base_url(); ?>home/login/apple',
                type : 'post',
                data : data.detail.authorization,
                // dataType : 'json', // 받을 데이터 방식
                success : function(res) {
                  $("#loading_set").fadeOut(500);
                  // alert(res);
                  res = JSON.parse(res);
                  if (res.status === 'success') {
                    // console.log(res.message);
                    alert(res.message);
                    window.location.href = '<?php echo $relocation; ?>';
                  } else if (res.status === 'approval') {
                    // alert(res.message);
                    window.location.href = res.approval_url;
                  } else if (res.status === 'error') {
                    alert(res.message);
                  } else {
                    $('#restoreModal .modal-body .text-center').text(res.message);
                    $('#restoreModal').modal('show');
                  }
                },
                error: function(xhr, status, error){
                  alert('login fail : ' + error);
                  // window.location.href = base_url + 'home/login';
                }
              });
            });
            //Listen for authorization failures
            document.addEventListener('AppleIDSignInOnFailure', (error) => {
              //handle error.
              console.log(error.detail);
              alert('로그인에 실패했습니다. ' + JSON.stringify(error.detail));
            });
          </script>
          <?php } ?>
          <!-- 애플 로그인 완료 -->
          <div class="col-sm-12 title" style="background-color: #ffffff; padding: 10px 20px 5px; text-transform: uppercase; font-size: 18px; line-height: 24px; font-weight: 700; color: #232323; width: 225px; margin: 12px auto 0; padding: 0;">
            <div class="option" style="text-align: center !important; margin: 0 auto 10px; text-transform: none; font-size: 10px; line-height: 1.5; font-weight: 400; color: #757575">
              * 강사회원/센터회원은<br>
              로그인 후 마이페이지에서 신청해주세요
            </div>
          </div>
<!--          <div class="col-sm-12 title" style="background-color: #ffffff; padding: 10px 20px 5px; text-transform: uppercase; font-size: 18px; line-height: 24px; font-weight: 700; color: #232323">-->
<!--            <div class="option" style="text-align: center !important; margin: 0 auto 10px; text-transform: none; font-size: 10px; line-height: 14px; font-weight: 400; color: #232323">-->
<!--              <a class="media-link" href="javascript:void(0);" onclick="search_ship_modal()">-->
<!--                <u>비회원 배송조회</u>-->
<!--              </a>-->
<!--            </div>-->
<!--          </div>-->
        </div>
      </div>
    </div>
  </div>
</section>
<div class="modal fade" id="restoreModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">회원 정보 복원</h4>
      </div>
      <div class="modal-body">
        <div class="text-center">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger " onclick="do_restore(0)">삭제</button>
        <button type="button" class="btn btn-theme btn-theme-sm " onclick="do_restore(1)" style="text-transform: none;
                font-weight: 400;">복원</button>
      </div>
    </div>
  </div>
</div>
<!--<div class="modal fade" id="forgetPwModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">-->
<!--  <div class="modal-dialog modal-dialog-centered" role="document">-->
<!--    <div class="modal-content">-->
<!--      <div class="modal-header">-->
<!--        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
<!--        <h4 class="find-modal-title" id="myModalLabel">비밀번호 찾기</h4>-->
<!--      </div>-->
<!--      <div class="modal-body" id="forget-password-modal-body">-->
<!--      </div>-->
<!--      <div class="modal-footer">-->
<!--        <button type="button" class="btn btn-danger btn-theme-sm" data-dismiss="modal"">취소</button>-->
<!--        <button type="button" class="btn btn-dark btn-theme-sm" onclick="reset_password()" style="background-color: black; color:white; text-transform: none; font-weight: 400;"">확인</button>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->
<div class="modal" id="forgetPopup" style="display: none; position: fixed; top: 0; left:0;">
  <style>
    * {
      padding: 0;
      border: 0;
      margin: 0;
    }
    html, body {
      width: 100%;
      height: 100%;
    }
    .bg {
      width: 100%;
      height: 100%;
      background-color: rgba(0,0,0,0.23);
      position: absolute;
    }
    clearfix::after {
      content: "";
      display: block;
      clear: both;
    }
    a {text-decoration: none;}
    li {list-style: none;}
    button {
      background: none;
      outline: none;
      cursor: pointer;
    }
    input {
      background: none;
      outline: none;
      box-sizing: border-box;
      border: 1px solid #e0e0e0;
    }
    .popup_pw {
      min-width: 288px;
      font-family: 'Apple SD Gothic Neo', 'Malgun Gothic', '맑은 고딕', sans-serif;
      position: absolute;
      top: 15%;
      left: 50%;
      margin-left: -45%;
      width: 90%;
      /*height: 50%;*/
      padding: 32px 0 16px;
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
      margin: 0;
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
    
    .pw_advice {
      font-size: 0;
      height: 14px;
      margin: 0 16px 24px 68px;
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
      .popup_pw {
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
        /*margin-left: 12px;*/
        width: 92px;
        margin: 0 0 0 12px;
      }
    }
    
    @media(min-width: 768px){
      .popup_pw {
        max-width: 600px;
        /*margin-left: -300px;*/
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
  <div class="bg">
    <article class="popup_pw">
      <p class="pw_tit">FORGET PASSWORD</p>
      <button class="pw_close" onclick="fn_close();">
        <img src="<? echo base_url(); ?>template/front/header/imgs/icon_close_black.png" width="12" height="12" alt="닫기" style="opacity: 0.2;">
        <!-- popup_pw 닫기 -->
        <script>
          function fn_close() {
            // $('.popup_pw').hide();
            close_forget_password();
          }
        </script>
      </button>
      <div class="pw_wrap">
        <div class="pw_how">
          <ul class="how_type clearfix">
            <li class="type_mail" onclick="fn_mail();">이메일 인증</li>
            <li class="type_mobile" onclick="fn_mobile();">휴대폰 인증</li>
            <!-- load / fn_mail,mobile 클릭 이벤트 -->
            <script>
              $(window).load(function(){
                $('.type_mail').addClass('active');
              })
              function fn_mail() {
                $('.tab_mail').show().next().hide();
                $('.type_mail').addClass('active');
                $('.type_mobile').removeClass('active');
              }
              // function fn_mobile() {
                // $('.tab_mobile').show().prev().hide();
                //$('.type_mobile').addClass('active');
                //$('.type_mail').removeClass('active');
                //$('#nice_approval').show();
                //$('#nice_approval').load('<?// echo base_url(); ?>//home/nice/main')
              // }
              function fn_mobile() {
                // $('.tab_mobile').show().prev().hide();
                $('.type_mobile').addClass('active');
                $('.type_mail').removeClass('active');
                // $('#nice_approval').show();
                $('#loading_set').show();
                let formData = new FormData();
                formData.append('s', sid);
                formData.append('f', 'forget_passwd');
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
                      window.document.form_chk.param_r3.value = 'forget_passwd';
                      fnNicePopup();
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
                nicePopup = window.open('', '_parent', 'width=500, height=550, top=100, left=100, fullscreen=no, menubar=no, status=no, toolbar=no, titlebar=yes, location=no, scrollbar=no');
                document.form_chk.action = "https://nice.checkplus.co.kr/CheckPlusSafeModel/checkplus.cb";
                // document.form_chk.target = "popupChk";
                document.form_chk.target = "_parent";
                document.form_chk.submit();
              }
            </script>
          </ul>
          <div class="how_tab">
            <div class="divide"></div>
            <div class="tab_mail" style="display: none;">
              <div class="email_write clearfix">
                <p class="write_tit">이메일</p>
                <div class="write_form clearfix">
                  <input id="forget_email" class="form_input form:mail" placeholder="이메일을 입력해 주세요.">
                  <button class="form_send" onclick="send_approval_code()">인증메일 보내기</button>
                </div>
              </div>
              <div class="email_verify clearfix" style="display: none">
                <p class="verify_tit">본인인증</p>
                <div class="verify_code clearfix">
                  <input id="approval_code" class="code_no" type="number" placeholder="인증코드">
                  <div class="code_btn">
                    <button id="btn_yes" onclick="reset_password('email');">인증번호 확인</button>
                  </div>
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
<!--            <div class="tab_mobile" style="display: none;">-->
<!--              <div class="mobile_write clearfix">-->
<!--                <p class="write_tit" style="line-height: 1.5; margin: 4px 0;">휴대폰<br>번호</p>-->
<!--                <div class="write_form form:write_lg clearfix">-->
<!--                  <div class="form_phone clearfix">-->
<!--                    <input type="text" class="form_input form:phone">-->
<!--                    <div class="hyphen">-</div>-->
<!--                    <input type="text" class="form_input form:phone">-->
<!--                    <div class="hyphen">-</div>-->
<!--                    <input type="text" class="form_input form:phone">-->
<!--                  </div>-->
<!--                  <button class="form_send form:phone_send">인증번호 보내기</button>-->
<!--                </div>-->
<!--              </div>-->
<!--              <div class="email_verify clearfix">-->
<!--                <p class="verify_tit">본인인증</p>-->
<!--                <div class="verify_code clearfix">-->
<!--                  <input class="code_no" placeholder="인증코드">-->
<!--                  <div class="code_btn">-->
<!--                    <button id="btn_yes">인증번호 확인</button>-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>-->
<!--            </div>-->
          </div>
        </div>
        <div class="pw_advice" style="display: none;">
          <div class="advice_type" style="margin: 0">
            <img id="img_info" src="<? echo base_url(); ?>template/icon/information_mark.png" width="14" height="14" style="display: none">
            <img id="img_exam" src="<? echo base_url(); ?>template/icon/exclamation_mark.png" width="14" height="14" style="display: none">
            <span id="approval_msg"></span>
          </div>
        </div>
      </div>
    </article>
  </div>
</div>
<script type="text/javascript" src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
<script>
  let auth_id = '';
  let enc = '';
  let sid = '<?= $this->crud_model->get_session_id(); ?>';
  // $(function () {
  //   alert(sid);
  // })
  function send_approval_code() {
    let email = $('#forget_email').val();
    if (validateEmail(email) === false) {
      set_approval_msg('정확한 이메일 주소를 입력바랍니다',true);
      return false;
    }
    $('#loading_set').show();
    let formData = new FormData();
    formData.append('email', email);
    $.ajax({
      url: '<?php echo base_url(); ?>' + 'home/login/send_approval', // form action url
      type: 'POST', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        $("#loading_set").fadeOut(500);
        if (data === 'done' || data.search('done') !== -1) {
          // alert('인증코드가 전송되었습니다. 이메일 확인 후 입력바랍니다.');
          set_approval_msg('인증코드가 전송되었으니 이메일 확인 후 인증코드를 정확히 입력바랍니다!');
          $('.email_verify').show();
          $('#approval_code').focus();
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
      url = '<?= base_url() ?>home/login/approval/email';
    } else {
      url = '<?= base_url() ?>home/login/approval/mobile';
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
        let msg;
        let res = JSON.parse(data);
        $("#loading_set").fadeOut(500);
        if (res.status === 'done') {
          msg = '본인인증이 완료되었습니다! ';
          $('#img_exam').hide();
          $('#img_info').show();
          set_approval_msg(msg + res.message);
          notify('<strong>' + msg + '</strong>' + res.message,'success','bottom','right');
          setTimeout(function(){window.location.reload(true);}, 1000);
        } else {
          msg = '본인인증에 실패하였습니다! ';
          $('#img_exam').show();
          $('#img_info').hide();
          set_approval_msg(msg + res.message,true);
          notify('<strong>' + msg + '</strong>' + res.message,'warning','bottom','right');
        }
      },
      error: function (e) {
        console.log(e)
      }
    });
  
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

  function clear_popup() {
    $('.tab_mail').hide();
    $('.tab_mobile').hide();
    $('#forget_email').val('');
    $('#approval_code').val('');
    $('.type_mobile').removeClass('active');
    $('.type_mail').removeClass('active');
  }

  function close_forget_password() {
    let popup = $('#forgetPopup');
    // popup.html('');
    popup.hide();
    clear_popup();
    $('body').css('overflow-y', 'auto');
  }
  
  function open_forget_password() {
    let popup = $('#forgetPopup');
    $("#loading_set").fadeOut(500);
    popup.show();
    clear_popup();
    $('.type_mail').addClass('active');
    $('body').css('overflow-y', 'hidden');
  }

  function search_ship_modal() {
    $('#searchShipModal').modal('show');
  }
  function close_foundy_modal(id) {
    $('#' + id + 'Modal').modal('hide');
  }
  
  function do_restore(restore) {
    let r;
    $('#restoreModal').modal('hide');
    $('#loading_set').show();
    if (restore === 1) {
      r = 'ok';
    } else {
      r = 'no';
    }
    $.ajax({
      url : base_url + '/home/login/restore?r=' + r,
      type : 'GET',
      dataType : 'html', // 받을 데이터 방식
      success : function(data) {
        $("#loading_set").fadeOut(500);
        // console.log(data);
        if(data == 'done' || data.search('done') !== -1){
          var text = '<div>성공하셨습니다.</div>';
          notify(text,'success','bottom','right');
          setTimeout(function(){location.href='<?php echo $relocation; ?>';}, 1000);
        } else {
          var text = '<div>실패하셨습니다.</div>';
          notify(text,'warning','bottom','right');
        }
      },
      error: function(xhr, status, error){
        // console.log(xhr);
        // console.log(status);
        // console.log(error);
        alert('restore fail : ' + error);
        // window.location.href = base_url + 'home/login';
      }
    });
  }
  
  function do_login() { // with email
    let email = $('#user-email').val();
    let password = $('#user-password').val();
  
    $('#loading_set').show();
    
    let formData = new FormData();
    formData.append('email', email);
    formData.append('password', password);
    
    // console.log(email);
    // console.log(password);
    
    $.ajax({
      url : '<?php echo base_url().'/home/login/email'; ?>',
      type: 'post', // form submit method get/post
      dataType: 'html',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success : function(res) {
        $("#loading_set").fadeOut(500);
        // console.log(res);
        res = JSON.parse(res);
        if (res.status === 'success') {
          alert(res.message);
          window.location.href = '<?php echo $relocation; ?>';
        } else if (res.status === 'fail') {
          let text = '<strong>실패하였습니다</strong><br>' + res.message;
          notify(text,'warning','bottom','right');
        } else if (res.status === 'restore') { // 복원
          $('#restoreModal .modal-body .text-center').text(res.message);
          $('#restoreModal').modal('show');
        } else {
          // console.log(res.status);
          alert(res);
        }
      },
      error: function(xhr, status, error){
        // console.log(xhr);
        // console.log(status);
        // console.log(error);
        alert('login fail : ' + error);
        // window.location.href = base_url + 'home/login';
      }
    });
  }

  function loginWithKakao() { // with JDK
    Kakao.init('<?= APIKEY_KAKAO_JAVASCRIPT; ?>');
    Kakao.Auth.login({
      success: function(authObj) {
        // alert(JSON.stringify(authObj))
        $('#loading_set').show();
        Kakao.API.request({
          url: "/v2/user/me",
          success: function(user_data) {
          
            var base_url = '<?php echo base_url(); ?>';
  
            console.log(user_data);
            console.log(Kakao.Auth.getAccessToken());
            _setCookie('kakao_access_token', Kakao.Auth.getAccessToken());
            
            $.ajax({
              url : base_url + '/home/login/kakao?access_token=' + Kakao.Auth.getAccessToken(),
              type : 'post',
              data : user_data,
              dataType : 'json', // 받을 데이터 방식
              success : function(res) {
                $("#loading_set").fadeOut(500);
                console.log(res);
                if (res.status === 'success') {
                  alert(res.message);
                  window.location.href = '<?php echo $relocation; ?>';
                } else if (res.status === 'reauthorized') {
                  Kakao.Auth.authorize({
                    redirectUri: '<?php echo base_url(); ?>home/login/kakao/rest',
                    scope: 'talk_message'
                  });
                } else {
                  $('#restoreModal .modal-body .text-center').text(res.message);
                  $('#restoreModal').modal('show');
                }
              },
              error: function(xhr, status, error){
                // console.log(xhr);
                // console.log(status);
                // console.log(error);
                alert('login fail : ' + error);
                // window.location.href = base_url + 'home/login';
              }
            });
          
            //alert(JSON.stringify(res));
          },
          fail: function(error) {
            alert('kakao fail : ' + JSON.stringify(error));
          }
        });
      },
      fail: function(err) {
        alert(JSON.stringify(err))
      },
    })
  }

  function kakaoReauthorized(scope) {
    Kakao.init('<?= APIKEY_KAKAO_JAVASCRIPT; ?>');
    Kakao.Auth.authorize({
      redirectUri: '<?php echo base_url(); ?>home/login/kakao/rest',
      scope: scope
    });
  }

  function loginWithKakaoRest() { // with REST API
    let app_key = "<?= APIKEY_KAKAO_REST; ?>";
    let redirect_uri  ='<?php echo base_url()."home/login/kakao/rest"; ?>';
    
    _setCookie('relocation', '<?php echo $relocation; ?>');
    
    location.href = "https://kauth.kakao.com/oauth/authorize?client_id=" +
      app_key + "&redirect_uri=" + redirect_uri + "&response_type=code";
  }
  
  let restore = <?php echo $restore ? 'true' : 'false'; ?>;
  $(document).ready(function() {
    if (restore === true) {
      $('#restoreModal .modal-body .text-center').text(res.message);
      $('#restoreModal').modal('show');
    }
  });
  
</script>
