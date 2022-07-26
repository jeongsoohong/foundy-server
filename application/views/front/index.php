<!DOCTYPE html>
<html lang="en">
<head>
  <? if (DEV_SERVER == false) { ?>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
          new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-5NTRCB7');</script>
    <!-- End Google Tag Manager -->
    <!-- facebook domain verification -->
    <meta name="facebook-domain-verification" content="rke9nkklsdbh72xbipm7y9v0lbch70" />
    <!-- End facebook domain verification -->
    <!-- Google Ads -->
    <script data-ad-client="ca-pub-5246386026868293" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- End Google Ads -->
  <? } ?>
  <?php include 'includes/top/index.php'; ?>
</head>
<body id="home" class="wide">
<? if (DEV_SERVER == false) { ?>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5NTRCB7"
                    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
<? } ?>
<!-- PRELOADER -->
<?php
include 'preloader.php';
?>
<!-- WRAPPER -->
<? if ($this->agent->is_mobile() == false) { ?>
<style>
  .wide {
    background-color: #F3EFEB !important;
    overflow-x: hidden;
  }
  /* pc에서만 스크롤바 안보이게 가능한지 제혁님께 요청하기
     햄버거 메뉴 팝업이 스크롤바 가로너비만큼 짧아지기 때문에 */
  /*::-webkit-scrollbar {*/
  /*  display: none;*/
  /*}*/
  .wrapper {
    max-width: 460px;
    margin: 0 auto;
  }
  .wrapper .header .navigation-wrapper.navigation-sticky {
    max-width: 460px;
  }
  .wrapper .container {
    max-width: 460px;
    padding: 0;
  }
  
  .wrapper .popup-box {
    max-width: 460px;
    margin: 0 auto;
    left: 0;
    right: 0;
    z-index: 200;
  }
  /* 센터프로필 페이지 */
  .wrapper .row {
    margin: 0;
  }
  /* 온라인 클래스 찾기 */
  .wrapper #content {
    padding: 0;
  }
  .wrapper .col-md-12 {
    width: 100% !important;
    /* padding: 0; 센터프로필만 건드리게끔 */
  }
  #profile_content .row .col-md-12 {
    padding: 0;
  }
  #profile_content .row .col-md-12 .col-md-12 {
    padding: 0;
  }
  /* 장바구니 구매,결제하기 페이지 */
  .item-purchase-btn {
    max-width: 460px;
    margin: 0 auto;
    right: 0;
  }
  /* 샵 카테고리 상품 상세 페이지 - sticky 상태가 안됨 */
  .item-nav-tab.sticky {
    max-width: 460px;
    margin: 0 auto;
    right: 0;
    background-color: #fff;
  }
  .item-cart-btn {
    max-width: 460px;
    margin: 0 auto;
    right: 0;
  }
  /* 강사 프로필 페이지 */
  .post-media {
    width: 100%;
    padding-bottom: 56.25%;
  }
  .post-single iframe {
    position: absolute;
    width: 100% !important;
    padding-bottom: 56.25% !important;
  }
  /* 유튜브 클래스 페이지 */
  #free-youtube .media-body {
    width: 100% !important;
  }
  .recent-post .media {
    height: 100px;
  }
  .recent-post .slick-list {
    width: 100%;
    height: 40px;
  }
  .recent-post .slick-track {
    width: 10070px !important;
  }
  #login hr {
    display: inline-block;
    background: transparent;
    height: 1px;
    width: 100%;
  }

  #login .title {
    width: 100% !important;
  }

  @media(min-width: 460px){
    .thumbnail .thumbnail-banner {
      height: 220px; !important;
    }
  }

  .thumbnail.thumbnail-banner .media,
  .thumbnaii.thumbnail-banner .media .media-link,
  .thumbnail.thumbnail-banner .media .caption {
    height: 220px;
  }

  .wrapper .thumbnail-banner {
    height: 220px;
  }

  #instructors .slick-list {
    overflow: auto;
    height: inherit;
  }
  #instructors .slick-initialized .slick-slide {
    width: 100% !important;
    max-width: 460px;
    margin: 10px auto 0;
  }
  #instructors .slick-initialized .slick-slide a {
    display: inline-block;
    margin: 0 16px;
  }

  #info .recent-post .media {
    height: auto;
  }

  div[class*=“popup-box”] {
    z-index: 200;
  }

  .modal-open .modal {
    max-width: 460px;
    margin: auto;
  }
  .modal-backdrop {
    max-width: 460px;
    margin: auto;
  }
  .modal-dialog {
    width: auto !important;
    margin: 10px !Important;
  }

  .modal {
    max-width: 460px;
    margin: auto;
  }

  @media(min-width: 768px){
    #profile_content .col-sm-6 {
      width: 100%;
      margin: 0;
      padding-bottom: 20px;
      border-bottom: 1px dashed #eee;
    }
    #profile_content .col-md-12:nth-child(12) .col-sm-6 {
      border: 0;
    }
  }

  @media(min-width: 414px){
    .popup_pw {
      max-width: 372px !important;
      margin-left: -186px !important;
    }
  }

  #free-youtube a::after {
    content: "";
    display: block;
    clear: both;
  }
  #free-youtube a, .video_ul li a {
    display: block;
  }
  .video_ul li a::after {
    content: "";
    display: block;
    clear: both;
  }
  #__daum__layer_1 {
    position: absolute !important;
    min-width: unset !important;
    max-width: 460px !important;
    margin: auto !important;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
  }
</style>
<? } ?>
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
  <? if ($page_name != 'shop/cart' && $page_name != 'shop/product' && $page_name != 'shop/purchase') { ?>
    <!-- 카카오톡 링크 -->
<? if ($this->agent->is_mobile()) { ?>
    <div id="fd-talk" style="margin-right: -52%;">
<? } else { ?>
    <div id="fd-talk" style="margin-right: -230px;">
<? } ?>
      <a href="javascript:void(0);" class="goTo-kakaoTalk" onclick="chatKakaoChannel();">
        <div class="kakaoTalk__link">
          <!-- 원형 아이콘 -->
          <div class="link--symbol shadow_sp">
            <img src="<?= base_url(); ?>template/front/img/ic_kakaoTalk.png" alt="카카오톡 링크" width="44" height="44">
          </div>
          <!-- 텍스트 문구 -->
          <div class="link--guide shadow_sp">
            <p>궁금하면 클릭!</p>
          </div>
        </div>
      </a>
      <button class="talk-close-btn shadow_sp">
        <img src="<?= base_url(); ?>template/front/img/ic_close_kakaoTalk.png" alt="카카오톡 링크 닫기" width="12" height="12">
      </button>
    </div>
    <!-- 5초 지나면 '궁금하면 클릭!' 문구 사라지게 -->
    <!--    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>-->
    <script>
      let SetTime = 5;		// 최초 설정 시간(기본 : 초)
    
      function msg_time() {	// 1초씩 카운트
      
        let m = Math.floor(SetTime % 60) + "초";	// 남은 시간 계산
        let msg = "현재 남은 시간은" + m + "입니다.";
        // console.log(msg);
      
        SetTime--;					// 1초씩 감소
      
        if (SetTime < 0) {			// 시간이 종료 되었으면..
          clearInterval(tid);		// 타이머 해제
          // alert(msg);
          // console.log('!');
          $('.link--guide p').fadeOut(400);
          $('.link--guide').animate({
            width : '20px',
            right : '10px',
            opacity : '0'
          },600);
          $('.talk-close-btn').fadeIn(400);
          $('.talk-close-btn').animate({
            top : '-56px'
          },400)
        }
      }
    
      window.onload = function TimerStart(){ tid=setInterval('msg_time()',1000) };

      $(function(){
        // alert('ok');
        $('#fd-talk .talk-close-btn').click(function(){
          $(this).hide().parent('#fd-talk').hide();
        })
      })
    </script>
  <? } ?>
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
//$this->cookie_model->set_cookie('server_check_popup_time', '0'); // just use only test
$now = time();
if (SERVER_CHECK == true &&
  strtotime(SERVER_CHECK_POPUP_START) < $now && $now < strtotime(SERVER_CHECK_POPUP_END) &&
  $this->cookie_model->get_cookie('server_check_popup_time') < strtotime('-1 day')) {
  include 'others/server_check_popup.php';
?>
<? } else if ($this->session->userdata('mobile_approval') == 'no') {
  include 'user/mobile_approval.php';
  ?>
<? } else if ($this->app_model->is_app() == false && $this->agent->is_mobile()) {
  $enroll_app_cookie = $this->cookie_model->get_cookie('enroll_app_time');
  if ($page_name == 'shop/cart' || empty($enroll_app_cookie) == true || $enroll_app_cookie < strtotime('-1 day')) {
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
        <br>쇼핑 간편결제까지<br> 더욱 편리하게 사용하실 수 있습니다.
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
