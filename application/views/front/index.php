<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include 'includes/top/index.php';
    ?>
</head>
<body id="home" class="wide">
<!-- PRELOADER -->
<?php
include 'preloader.php';
?>
<!-- WRAPPER -->
<div class="wrapper" style="overflow-x: hidden;">

  <!-- HEADER -->
  <?php
  include 'header/header.php';
  ?>
  <!-- /HEADER -->
  
  <!-- CONTENT AREA -->
  <div class="content-area" page_name="<?= $page_name?>">
    <?php
    include $page_name.'/index.php';
    ?>
  </div>
  <!-- /CONTENT AREA -->
  
  <!-- FOOTER -->
  <?php
  if ($page_title == 'home') {
    include 'footer/footer.php';
  }
  ?>
  <!-- /FOOTER -->
  
  <div id="to-top" class="to-top" style="bottom:100px !important; display: none;"><i class="fa fa-angle-up" style="font-family: FontAwesome !important;"></i></div>

</div>
<!-- /WRAPPER -->
<?php
include 'script_texts.php';
?>
<?php
include 'includes/bottom/index.php';
?>
<div id="loading_set"style="display:none;text-align:center;width:100%;height:100%;position:fixed;top:0;left:0;z-index:5000;background-color:rgba(20,20,20,0.5)">
  <i class="fa fa-refresh fa-spin fa-5x fa-fw" style="position:relative;top:50%"></i>
</div>
<?
$server_check = true;
//$this->cookie_model->set_cookie('server_check_popup_time', '0'); // just use only test
$now = time();
if ($server_check == true &&
  strtotime('2020-12-15 19:50:00') < $now && $now < strtotime('2020-12-15 20:50:00') &&
  $this->cookie_model->get_cookie('server_check_popup_time') < strtotime('-1 day')) {
  include 'others/server_check_popup.php';
?>
<? } else if ($this->session->userdata('mobile_approval') == 'no') {
  include 'user/mobile_approval.php';
  ?>
<? } else if ($this->app_model->is_app() == false && $this->agent->is_mobile()) {
  $enroll_app_cookie = $this->cookie_model->get_cookie('enroll_app_time');
  if (empty($enroll_app_cookie) == true || $enroll_app_cookie < strtotime('-1 day')) {
    ?>
<style>
  #enroll_app {
    padding: 0;
    border: 0;
    margin: 0;
    width: 100%;
    height: 100%;
    word-break: break-word;
    font-family: 'Apple SD Gothic Neo', 'Malgun Gothic', '맑은 고딕', sans-serif !important;
    min-width: 320px;
    position:fixed;
    top:0;
    left:0;
    z-index: 6000;
  }
</style>
<div id="enroll_app">
  <div style="width: 100%; height: 100%; background-color: rgba(0,0,0,0.6); position: absolute; min-width: 320px;">
    <div style="width: 240px; height: 180px; text-align: center; position: absolute; left: 50%; top: 50%; margin-left: -120px; margin-top: -90px;">
      <p style="color: #fff; font-size: 14px; font-weight: bold; line-height: 1.5; margin-bottom: 20px;">
        파운디 앱을 설치하시면,
        <br>더욱 편리하게 보실 수 있습니다!
      </p>
      <h1 style="width: 100%; height: 60px; border-radius: 30px; background-color: #ad796d; line-height: 60px;">
        <a href="javascript:void(0)" onclick="appLinkAndInstall('<?php echo build_url($this->uri, $_GET); ?>')" style="display: block; height: inherit; line-height: inherit; text-decoration: none; color: #fff; font-size: 18px; font-weight: bold;">
          파운디 앱으로 보기 &nbsp;>
        </a>
      </h1>
      <a href="javascript:void(0)" onclick="closeAppLink()" style="display: block; color: #eee; font-size: 14px; font-weight: normal; margin-top: 32px; text-decoration: underline;">
        괜찮습니다, 웹에서 볼게요.
      </a>
    </div>
  </div>
</div>
<script>
  
  $(function() {
    let today = new Date();
    _setCookie('enroll_app_time', parseInt(today.getTime()/1000), 1);
    $('body').css('overflow-y', 'hidden');
  });
  
  function closeAppLink() {
    $('#enroll_app').hide();
    $('body').css('overflow-y', 'auto');
  }
  
  function appLinkAndInstall(url) {
    // 앱에 설정해놓은 커스텀 스킴. 여기선 "customScheme"
    let scheme_url;
    <?php if (DEV_SERVER) { ?>
    scheme_url = "foundydev://";
    <?php } else { ?>
    scheme_url = 'foundy://';
    <?php } ?>
    if (url !== null && url !== '') {
      scheme_url = scheme_url + "web?url=" + url;
    }
    let timer;	// 타이머
    let schInterval; // 인터벌
    function clearTimer(){
      clearInterval(schInterval);
      clearTimeout(timer);
    }
    // 인터벌 마다 동작할 기능
    let userAgent = navigator.userAgent;
    let visitedAt = (new Date()).getTime(); // 방문 시간
    function intervalSch(){
      // 매 인터벌 마다 웹뷰가 활성화 인지 체크
      if(document.webkitHidden || document.mozHidden || document.msHidden || document.hidden){// 웹뷰 비활성화
        clearTimer();// 앱이 설치되어있을 경우 타이머 제거
      }else{	// 웹뷰 활성화
        let diffTime = (new Date()).getTime() - visitedAt;
        if (diffTime > 2000) {
          clearTimer();// 앱이 설치되어있을 경우 타이머 제거
        }
      }
    }
    if (userAgent.match(/iPhone|iPad|iPod/)) {
      location.replace(scheme_url);
      // 앱이 설치 되어있는지 체크
      schInterval = setInterval(intervalSch, 500);
      timer = setTimeout(
        function(){
          clearInterval(schInterval);
          location.replace('https://apps.apple.com/kr/app/id1538699865?mt-8');
        }, 2000);
    } else if (userAgent.match(/Android/)) {
      if (userAgent.match(/Chrome/)) {
        // 안드로이드의 크롬에서는 intent만 동작하기 때문에 intent로 호출해야함
        setTimeout(
          function() {
            let intent_url;
            <?php if (DEV_SERVER) { ?>
            intent_url = 'intent://#Intent;scheme=foundydev;package=me.foundy.dev;end';
            <?php } else { ?>
            intent_url = 'intent://#Intent;scheme=foundy;package=me.foundy;end';
            <?php } ?>
            if (url !== null && url !== '') {
              <?php if (DEV_SERVER) { ?>
              intent_url = 'intent://web?url=' + url + '#Intent;scheme=foundydev;package=me.foundy.dev;end';
              <?php } else { ?>
              intent_url = 'intent://web?url=' + url + '#Intent;scheme=foundy;package=me.foundy;end';
              <?php } ?>
            }
            location.href = intent_url;
          }, 1000);
      } else { // 크롬 이외의 브라우저들
        // 앱이 설치 되어있는지 체크
        location.href = scheme_url;
        schInterval = setInterval(intervalSch, 500);
        timer = setTimeout(
          function() {
            clearInterval(schInterval);
            location.href = 'https://foundy.page.link/dn';
          }, 1000);
      }
    }
  }
</script>
<?php }
} ?>
<?php if ($this->app_model->is_app()) { ?>
<script>
  <?php
  $app_version = $this->app_model->get_app_version();
  $is_ios = $this->app_model->is_ios_app();
  $is_android = $this->app_model->is_android_app();
  $back_url = get_back_url($page_name, $this->session->userdata('user_login') == 'yes');
  ?>
  <?php if ($back_url == '') { ?>
  if (history.scrollRestoration) {
    window.history.scrollRestoration = 'auto';
  }
  <?php } ?>

  function getBack() {
    <?php if ($back_url == '' || ($is_ios && $app_version <= '1.0.2') || ($is_android && $app_version <= '1.0.6')) { ?>
    document.referrer&&-1!==document.referrer.indexOf("<?php echo base_url(); ?>")?history.back():location.replace("<?php echo base_url(); ?>");
    <?php } else { ?>
    location.replace('<?php echo $back_url; ?>');
    <?php } ?>
  }
  $(window).bind("pageshow", function(event) {
    if (event.originalEvent.persisted) {
      $("#loading").show().delay(500).fadeOut(500);
    }
  });
</script>
<?php } ?>
<? if (false) { ?>
  <script>
    $(function() {
      // alert(_getCookie('mobile_approval_deny'))
      // alert(_getCookie('mobile_approval_deny_time'))
      // alert(_getCookie('enroll_app_time'))
      // alert(_getCookie('server_check_popup_time'))
    })
  </script>
<? } ?>
</body>
</html>
