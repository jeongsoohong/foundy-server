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
            <div class="col-sm-12 title" style="background-color: #ffffff; padding: 20px; height: 64px; font-weight: 700; color: #232323">
              <!-- 로그인 -->
              <div class="option" style="text-align: center !important; margin: 0 auto 10px; text-transform: none; font-size: 12px; line-height: 12px; font-weight: 400; color: #757575">
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
              <span class="btn btn-theme-sm btn-block btn-theme-dark pull-right">
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
          <hr style="margin-top: 10px; margin-bottom: 10px;">
<!--          <div class="col-sm-12">-->
<!--            <span class="btn btn-theme-sm btn-block btn-theme-transparent pull-center kakao-login btn-kakao-login">-->
<!--              카카오 로그인-->
<!--            </span>-->
<!--          </div>-->
          <div class="col-sm-12" style="text-align: center">
            <a href="javascript:void(0);" onclick="loginWithKakaoRest();">
              <img src="//k.kakaocdn.net/14/dn/btqCn0WEmI3/nijroPfbpCa4at5EIsjyf0/o.jpg" width="210" height="44"/>
            </a>
          </div>
          <!-- 애플 로그인 -->
<!--          --><?php //if ($this->crud_model->is_ios_app()) { ?>
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
                  // console.log(res);
                  res = JSON.parse(res);
                  if (res.status === 'success') {
                    // console.log(res.message);
                    alert(res.message);
                    window.location.href = '<?php echo base_url(); ?>';
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
<!--          --><?php //} ?>
          <!-- 애플 로그인 완료 -->
          <div class="col-sm-12 title" style="background-color: #ffffff; padding: 10px 20px 5px; text-transform: uppercase; font-size: 18px; line-height: 24px; font-weight: 700; color: #232323">
            <div class="option" style="text-align: center !important; margin: 0 auto 10px; text-transform: none; font-size: 10px; line-height: 14px; font-weight: 400; color: #757575">
              * 강사회원/센터회원은 로그인 후 마이페이지에서 신청해주세요
            </div>
          </div>
          <div class="col-sm-12 title" style="background-color: #ffffff; padding: 10px 20px 5px; text-transform: uppercase; font-size: 18px; line-height: 24px; font-weight: 700; color: #232323">
            <div class="option" style="text-align: center !important; margin: 0 auto 10px; text-transform: none; font-size: 10px; line-height: 14px; font-weight: 400; color: #232323">
              <a class="media-link" href="javascript:void(0);" onclick="search_ship_modal()">
                <u>비회원 배송조회</u>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="modal fade" id="searchShipModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="find-modal-title" id="myModalLabel">비회원 배송조회</h4>
      </div>
      <div class="modal-body">
        <div style="text-align: center">
          Sorry! <br>
          본 서비스는 아직 준비중입니다.
        </div>
      </div>
      <div class="modal-footer">
        <!--        <button type="button" class="btn btn-danger btn-theme-sm" data-dismiss="modal"">취소</button>-->
        <button type="button" class="btn btn-danger btn-theme-sm" onclick="close_foundy_modal('searchShip')" style="text-transform: none; font-weight: 400;"">확인</button>
      </div>
    </div>
  </div>
</div>
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
<div class="modal fade" id="forgetPwModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="find-modal-title" id="myModalLabel">비밀번호 찾기</h4>
      </div>
      <div class="modal-body" id="forget-password-modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-theme-sm" data-dismiss="modal"">취소</button>
        <button type="button" class="btn btn-dark btn-theme-sm" onclick="reset_password()" style="background-color: black; color:white; text-transform: none; font-weight: 400;"">확인</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
<script type="text/javascript">
  
  function reset_password() {
    $('#loading_set').show();
    
    let email = $('#forget_email').val();
    let approval_code = $('#approval_code').val();
    
    let formData = new FormData();
    formData.append('email', email);
    formData.append('approval_code', approval_code);
  
    $.ajax({
      url: '<?php echo base_url(); ?>' + 'home/login/forget', // form action url
      type: 'POST', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        $("#loading_set").fadeOut(500);
        if (data === 'done' || data.search('done') !== -1) {
          var text = '<strong>본인인증이 완료되었습니다.</strong>' + ' 해당 이메일 주소로 비밀번호가 발급되었으니 확인 후 로그인해 주세요.';
          notify(text,'success','bottom','right');
          setTimeout(function(){window.location.reload(true);}, 3000);
        } else {
          var text = '<strong>실패하였습니다</strong>' + data;
          notify(text,'warning','bottom','right');
        }
      },
      error: function (e) {
        console.log(e)
      }
    });
  
  }
  
  function close_forget_password() {
    let list = $('#forget-password-modal-body');
    list.html('');
    $('#forgetPwModal').modal('hide');
  }
  
  function open_forget_password() {
    $('#loading_set').show();
    let list = $('#forget-password-modal-body');
    $.ajax({
      url: '<?php echo base_url().'home/login/forget_form'; ?>',
      beforeSend: function() {
        list.html(''); // change submit button text
      },
      success: function(data) {
        $("#loading_set").fadeOut(500);
        list.html('');
        list.html(data).fadeIn();
        $('#forgetPwModal').modal('show');
      },
      error: function(e) {
        console.log(e)
      }
    });
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
          setTimeout(function(){location.href='<?php echo base_url(); ?>';}, 1000);
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
          window.location.href = '<?php echo base_url(); ?>';
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
    Kakao.init('8ee901a556539927d58b30a6bf21a781');
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
                  window.location.href = '<?php echo base_url(); ?>';
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
    Kakao.init('8ee901a556539927d58b30a6bf21a781');
    Kakao.Auth.authorize({
      redirectUri: '<?php echo base_url(); ?>home/login/kakao/rest',
      scope: scope
    });
  }

  function loginWithKakaoRest() { // with REST API
    let app_key = "c08aebc9e7ed5722a399bbc3962ca051";
    let redirect_uri  ='<?php echo base_url().'home/login/kakao/rest'; ?>';
  
    location.href = "https://kauth.kakao.com/oauth/authorize?client_id=" +
      app_key + "&redirect_uri=" + redirect_uri + "&response_type=code";
  }
  
  let restore = <?php echo $restore ? 'true' : 'false'; ?>;
  $(document).ready(function() {
    if (restore === true) {
      $('#restoreModal .modal-body .text-center').text(res.message);
      $('#restoreModal').modal('show');
    }
    <?php if ($need_kakao_agreement) { ?>
    kakaoReauthorized('talk_message');
    <?php } ?>
    
  });

</script>
