<?php
$system_name	 =  "Foundy Master";
$system_title	 =  "Foundy Master";
?>
<?php include 'includes_top.php'; ?>
<body>
<div id="master">
  <div style="width: 100%;height: 60px;position: absolute;">
    <!--NAVBAR-->
    <?php include 'header.php'; ?>
    <!--END NAVBAR-->
  </div>
  <!--CONTENT AREA -->
  <?php include $page_name.'.php' ?>
  <!--/ CONTENT AREA -->
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

