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
              <!-- 회원가입 -->
              <div class="option" style="text-align: center !important; margin: 0 auto 10px; text-transform: none; font-size: 12px; line-height: 12px; font-weight: 400; color: #757575">
                회원가입하고<br>
                FOUNDY로 균형잡힌 삶을 찾아보세요
              </div>
            </div>
          </div>
<!--          <hr>-->
          <div class="col-sm-12">
            <div class="form-group">
              <input class="form-control email" id="user-email" type="email" name="email" placeholder="이메일">
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <input class="form-control" id="user-password-1" type="password" name="password2" placeholder="비밀번호">
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <input class="form-control" id="user-password-2" type="password" name="password2" placeholder="비밀번호 확인">
            </div>
          </div>
          <div class="col-sm-12">
            <a href="javascript:void(0)" onclick="do_register()">
              <span class="btn btn-theme-sm btn-block btn-theme-dark pull-right" style="border-width:unset;border-color:#ad796d;background-color:#ad796d">
                회원가입
              </span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript">
  
  
  function validateEmail(emailAddress) {
    let pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
  }

  function do_register() {
    let email = $('#user-email').val();
    let password1 = $('#user-password-1').val();
    let password2 = $('#user-password-2').val();
    
    if (validateEmail(email) === false) {
      let text = '<strong>옵바른 이메일 주소를 입력바랍니다.</strong>';
      notify(text,'warning','bottom','right');
      return false;
    }
    
    if (password1 === '' || password2 === '') {
      let text = '<strong>비밀번호를 입력해주세요.</strong>';
      notify(text,'warning','bottom','right');
      return false;
    }
    
    if (password1 !== password2) {
      let text = '<strong>입력하신 비밀번호가 일치하지 않습니다.</strong>';
      notify(text,'warning','bottom','right');
      return false;
    }
    
    // console.log(email);
    // console.log(password1);
    // console.log(password2);
    
    $('#loading_set').show();
    
    let formData = new FormData();
    formData.append('email', email);
    formData.append('password1', password1);
    formData.append('password2', password2);
   
    // console.log(formData);
    
    $.ajax({
      url : '<?php echo base_url().'home/register/do_register'; ?>',
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
        } else if (res.status === 'approval') {
            alert(res.message);
            window.location.href = res.approval_url;
        } else {
          let text = '<strong>실패하였습니다</strong><br>' + res.message;
          notify(text,'warning','bottom','right');
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

</script>
