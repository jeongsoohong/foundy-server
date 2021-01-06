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
            function fn_mobile() {
              $('.tab_mobile').show().prev().hide();
              $('.type_mobile').addClass('active');
              $('.type_mail').removeClass('active');
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
                <input id="approval_code" class="code_no" placeholder="인증코드">
                <div class="code_btn">
                  <button id="btn_yes" onclick="reset_password();">인증번호 확인</button>
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
    </div>
  </article>
</div>
<script>
  // $(document).ready(function() {
  //   setTimeout(function(){ $('#forget_email').focus(); }, 500);
  // });
  
  function validateEmail(emailAddress) {
    let pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
  }
  
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
</script>
