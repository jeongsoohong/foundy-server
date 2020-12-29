<?php
$system_name	 =  "Foundy Center";
$system_title	 =  "Foundy Center";
?>
<?php include 'includes_top.php'; ?>
<body id="allwrap">
<div id="whole">
  <!--NAVBAR-->
  <?php include 'header.php'; ?>
  <!--END NAVBAR-->
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
$server_check = false;
//$this->cookie_model->set_cookie('server_check_popup_time_2', '0'); // just use only test
$now = time();
if ($server_check == true &&
  strtotime('2020-12-15 19:50:00') < $now && $now < strtotime('2020-12-15 20:50:00') &&
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

