<?php
$system_name	 =  "Foundy Studio";
$system_title	 =  "Foundy Studio";
?>
<?php include 'includes_top.php'; ?>
<body id="wrap">
<div id="stu">
  <!--NAVBAR-->
  <?php include 'header.php'; ?>
  <!--END NAVBAR-->
  <script>
    $(function() {
      $('.tit_theme').click(function(){
        $('.tit_theme').removeClass('reverse_color');
        $(this).addClass('reverse_color');
        $(this).find('.next_white').show().prev().hide();
        $(this).siblings().find('.next_white').hide().prev().show();
        
        var index = $('.tit_theme').index(this);
        $('.info--contents > section').hide();
        $('.info--contents > section').eq(index).show();
      })
    });
    // window 로드이벤트
    $(window).load(function(){
      // 첫번째 목록의 콘텐츠만 보이게!
      $('.tit_theme:first').addClass('reverse_color');
      $('.tit_theme:first').find('.next_white').show().prev().hide();
      $('.info--contents > section').hide();
      $('.info--contents > section:first').show();
      
      // 첫번째 목록의 테이블만 보이게!
      $('.table-list').hide();
      $('.table-list:first').show();
      $('.no-indicator:first').addClass('btn_click');
    })
  </script>
  <section class="boxwrap">
    <!--CONTENT CONTAINER-->
    <?php include $page_name.'.php' ?>
    <!--END CONTENT CONTAINER-->
  </section>
</div>
<!-- END OF CONTAINER -->
<div id="loading_set"style="display:none;text-align:center;width:100%;height:100%;position:fixed;top:0;left:0;z-index:5000;background-color:rgba(20,20,20,0.5)">
  <i class="fa fa-refresh fa-spin fa-5x fa-fw" style="position:relative;top:50%"></i>
</div>
<?
//$this->cookie_model->set_cookie('server_check_popup_time_2', '0'); // just use only test
$now = time();
if (SERVER_CHECK == true &&
  strtotime(SERVER_CHECK_POPUP_START) < $now && $now < strtotime(SERVER_CHECK_POPUP_END) &&
  $this->cookie_model->get_cookie('server_check_popup_time_2') < strtotime('-1 day')) {
  include APPPATH.'views/back/server_check_popup.php';
}
?>
<?php include APPPATH.'views/back/javascript.php'; ?>
<? if (false) { ?>
  <script>
    $(function() {
      // alert(_getCookie('server_check_popup_time_2'));
    });
  </script>
<? } ?>
</body>
</html>

