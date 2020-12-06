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
  .certify_wrap {
    font-family: 'Apple SD Gothic Neo', 'Malgun Gothic', '맑은 고딕', sans-serif;
  }
  a {text-decoration: none;}
  li {list-style: none;}
  .break-all {
    word-break: break-all;
  }
  .certify_popup {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.12);
    height: 380px;
    width: 296px;
    position: absolute;
    top: 120px;
    left: 50%;
    margin-left: -148px;
    border-radius: 4px;
    background-color: #fff;
  }
  .certify_wrap {
    width: 242px;
    height: 296px;
    margin: auto;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
  }
  .certify_tit {
    text-align: center;
    color: #111;
    font-size: 15px;
    font-weight: normal;
    line-height: 1.5;
    margin: 0 0 24px 0;
  }
  .certify_alert {
    color: #9e9e9e;
    font-size: 11px;
    font-weight: normal;
    line-height: 1.5;
    margin: 24px 0 0 0;
  }
  .certify_alert span {
    display: block;
    margin: 8px 0;
  }
  .certify_btn a {
    display: block;
    height: 40px;
    line-height: 40px;
    text-align: center;
    font-size: 14px;
    font-weight: bold;
    box-sizing: border-box;
  }
  #identity {
    color: #fff;
    background-color: #604c48;
    margin-bottom: 8px;
  }
  #release {
    color: #604c48;
    background-color: #fff;
    border: 1px solid #604c48;
  }
  #fd-verify {
    color: darksalmon;
  }
</style>
<div class="modal" id="mobileApprovalPopup" style="display: none; position: fixed; top: 0; left:0;">
  <div class="bg">
    <section class="certify_popup">
      <article class="certify_wrap">
        <p class="certify_tit">파운디의 원활한 서비스 이용을 위하여
          <br><strong id="fd-verify">본인 인증</strong>을 완료해 주세요!</p>
        <div class="certify_cnt">
          <div class="certify_btn">
            <a href="#" id="identity" onclick="mobile_approval()">본인인증하기</a>
            <a href="#" id="release" onclick="close_mobile_approval_popup()">다음에하기</a>
          </div>
          <p class="certify_alert break-all">* 타인의 개인정보 도용 방지와 주문 및 결제를 위한
            개인정보를 최초 1회 본인인증을 통해 받고 있습니다.
            <span>* 본인인증 완료 후 파운디의 서비스를 이용하실 수 있습니다.</span>
            * 휴대폰번호 본인인증은 번호 당 1개의 아이디만 인증하여 사용하실 수 있습니다.</p>
        </div>
        <div class="verify_code clearfix" style="display: none">
          <form name="form_chk" method="post">
            <input type="hidden" name="m" value="checkplusService">
            <input type="hidden" name="EncodeData">
            <input type="hidden" id="sid" name="param_r1" value="">
            <input type="hidden" id="aid" name="param_r2" value="">
            <input type="hidden" id="did" name="param_r3" value="">
          </form>
        </div>
      </article>
    </section>
  </div>
</div>
<script>
  $(function() {
    open_mobile_approval_popup();
  })
  function open_mobile_approval_popup() {
    let popup = $('#mobileApprovalPopup');
    popup.show();
    $('body').css('overflow-y', 'hidden');
  }
  function close_mobile_approval_popup() {
    let popup = $('#mobileApprovalPopup');
    let today = new Date();
    popup.hide();
    $('body').css('overflow-y', 'auto');
    _setCookie('mobile_approval_deny', 'yes', 1);
    _setCookie('mobile_approval_deny_time', parseInt(today.getTime()/1000), 1);
    // if (isApp()) {
    //   alert(_getCookie('mobile_approval_deny'))
    //   alert(_getCookie('mobile_approval_deny_time'))
    // }
    // console.log(_getCookie('mobile_approval_deny'))
    // console.log(_getCookie('mobile_approval_deny_time'))
  }
  let sid = '<?= $this->crud_model->get_session_id(); ?>';
  function mobile_approval() {
    $('#loading_set').show();
    let formData = new FormData();
    formData.append('s', sid);
    formData.append('f', 'mobile_approval');
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
          window.document.form_chk.param_r3.value = 'mobile_approval';
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
</script>