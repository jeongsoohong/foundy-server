<div>
  <?php
  echo form_open(base_url() . ''.$control.'/login/forget/', array(
    'class' => 'form-horizontal',
    'method' => 'post',
    'id' => 'forget'
  ));
  ?>
  <div class="panel-body">
    <div class="form-group">
      <label class="col-sm-2 control-label" for="demo-hor-1">
        이메일
      </label>
      <div class="col-sm-10">
        <input type="email" autofocus name="email" id="forget_email" class="form-control required"
               placeholder="이메일을 입력해 주세요" >
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label" for="demo-hor-1">
        본인인증
      </label>
      <div class="col-sm-6">
        <input disabled type="text" name="approval_code" id="approval_code" class="form-control required"
               placeholder="인증코드" >
      </div>
      <div class="col-sm-4">
        <button class="btn-dark" onclick="send_approval_code()" style="width: 100%; height: 32px; font-size: 12px; padding: 6px 12px;">
          인증메일보내기
        </button>
      </div>
    </div>
  </div>
  </form>
</div>

<script>
  $(document).ready(function() {
    $("form").submit(function(event){
      event.preventDefault();
    });
    setTimeout(function(){ $('#forget_email').focus(); }, 500);
  });

  function validateEmail(emailAddress) {
    let pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
  }
  
  function send_approval_code() {
    let email = $('#forget_email').val();
    // console.log(email);
  
    if (validateEmail(email) === false) {
      alert('올바른 이메일 주소를 입력바랍니다');
      return false;
    }
    
    let formData = new FormData();
    formData.append('email', email);
    
    $.ajax({
      url: '<?php echo base_url(); ?>' + user_type + '/login/send_approval', // form action url
      type: 'POST', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        if (data === 'done' || data.search('done') !== -1) {
          alert('인증코드가 전송되었습니다. 이메일 확인 후 입력바랍니다.');
          $('#approval_code').prop('disabled', false);
          $('#approval_code').focus();
        } else {
          alert(data);
        }
      },
      error: function (e) {
        console.log(e)
      }
    });
  }
</script>