<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <title>signUp</title>
  <style>
    * {
      padding: 0;
      border: 0;
      margin: 0;
    }
    clearfix::after {
      content: "";
      display: block;
      clear: both;
    }
    a {text-decoration: none;}
    li {list-style: none;}
    .break-all {
      word-break: break-all;
    }
    .certify_wrap {
      font-family: 'Apple SD Gothic Neo', 'Malgun Gothic', '맑은 고딕', sans-serif;
      padding: 48px 0 0;
      width: calc(100% - 60px);
      margin: 0 auto;
      background-color: #fff;
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
</head>
<body>
<article class="certify_wrap">
  <h2 class="certify_tit">파운디의 원활한 서비스 이용을 위하여
    <br><strong id="fd-verify">본인 인증</strong>을 완료해 주세요!</h2>
  <div class="certify_cnt">
    <div class="certify_btn">
      <a href="javascript:void(0)" id="identity" onclick="mobile_approval();">본인인증하고 가입완료</a>
      <a href="<?= base_url(); ?>home/register/cancel" id="release">가입 취소하기</a>
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
<script src="<?php echo base_url(); ?>template/front/plugins/jquery/jquery-1.11.1.js"></script>
<div id="loading_set"style="display:none;text-align:center;width:100%;height:100%;position:fixed;top:0;left:0;z-index:5000;background-color:rgba(20,20,20,0.5)">
  <i class="fa fa-refresh fa-spin fa-5x fa-fw" style="position:relative;top:50%"></i>
</div>
<script>
  let sid = '<?= $this->crud_model->get_session_id(); ?>';
  function mobile_approval() {
    $('#loading_set').show();
    let formData = new FormData();
    formData.append('s', sid);
    formData.append('f', 'register');
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
          window.document.form_chk.param_r3.value = 'register';
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
</body>
</html>
