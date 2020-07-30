<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <!--	<meta name="viewport" content="width=device-width, initial-scale=1">-->
  <meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1,width=device-width" />
  <meta http-equiv="refresh" content="300">
  <title>Login | Foundy ADMIN</title>

  <!--STYLESHEET-->
  <!--Roboto Font [ OPTIONAL ]-->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,300,500" rel="stylesheet" type="text/css">
  <!--Bootstrap Stylesheet [ REQUIRED ]-->
  <link href="<?php echo base_url(); ?>template/back/css/bootstrap.min.css" rel="stylesheet">
  <!--Activeit Stylesheet [ REQUIRED ]-->
  <link href="<?php echo base_url(); ?>template/back/css/activeit.min.css" rel="stylesheet">
  <!--Font Awesome [ OPTIONAL ]-->
  <link href="<?php echo base_url(); ?>template/back/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!--Demo [ DEMONSTRATION ]-->
  <link href="<?php echo base_url(); ?>template/back/css/demo/activeit-demo.min.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>template/back/js/jquery-2.1.1.min.js"></script>

  <!--SCRIPT-->
  <!--Page Load Progress Bar [ OPTIONAL ]-->
  <link href="<?php echo base_url(); ?>template/back/plugins/pace/pace.min.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>template/back/plugins/pace/pace.min.js"></script>
  <link rel="shortcut icon" href="<?php echo base_url(); ?>uploads/others/favicon.png?>">
</head>

<body>
<div id="container" class="cls-container"
     style="background:url(<?php echo base_url(); ?>uploads/others/repeat.jpg) 50% 50% / auto repeat scroll;">
  <!-- BACKGROUND IMAGE -->
  <div id="bg-overlay"></div>
  <!-- LOGIN FORM -->
  <div class="cls-content">
    <div class="cls-content-sm panel panel-colorful panel-login" style="margin-top: 50px !important;">
      <div class="panel-body">
        <a class="box-inline" href="<?php echo base_url(); ?><?php echo $control; ?>">
          <img src="<?php echo base_url(). 'uploads/logo_image/logo_46.png'; ?>" class="log_icon">
        </a>
        <hr class="hr-log">
        <p class="pad-btm">ADMIN</p>
        <?php
        echo form_open(base_url().$control.'/login/', array(
          'method' => 'post',
          'id' => 'login'
        ));
        ?>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-user" style="color:#FFF !important"></i></div>
            <input type="text" name="email" class="form-control email" placeholder="이메일">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-key" style="color:#FFF !important"></i></div>
            <input type="password" name="password" class="form-control pass" placeholder="비밀번호">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6 text-left">
            <!--                        <div class="pad-ver">
                            <a href="#" onclick="ajax_modal('forget_form','<?php /*echo ('forget_password'); */?>','<?php /*echo ('email_sent_with_new_password!'); */?>','forget','')" class="btn-link mar-rgt" style="color:#fff !important;"><?php /*echo ('forgot_password');*/?> ?</a>
                        </div>-->
          </div>
          <div class="col-xs-6" style="margin-top : 10px;">
            <div class="form-group text-right main_login">
              <span class="btn btn-login btn-labeled fa fa-unlock-alt snbtn" onclick="form_submit('login')"><b>로그인</b></span>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  <?php //$control = $this->uri->segment(1);?>
</div>
<!--jQuery [ REQUIRED ]-->
<script src="<?php echo base_url(); ?>template/back/js/jquery-2.1.1.min.js"></script>
<!--BootstrapJS [ RECOMMENDED ]-->
<script src="<?php echo base_url(); ?>template/back/js/bootstrap.min.js"></script>
<!--Activeit Admin [ RECOMMENDED ]-->
<script src="<?php echo base_url(); ?>template/back/js/activeit.min.js"></script>
<!--Background Image [ DEMONSTRATION ]-->
<script src="<?php echo base_url(); ?>template/back/js/demo/bg-images.js"></script>
<!--Bootbox Modals [ OPTIONAL ]-->
<script src="<?php echo base_url(); ?>template/back/plugins/bootbox/bootbox.min.js"></script>
<!--Demo script [ DEMONSTRATION ]-->
<script src="<?php echo base_url(); ?>template/back/js/ajax_login.js"></script>
<script>
  var base_url = "<?php echo base_url(); ?>";
  var cancdd = "<?php echo ('cancelled'); ?>";
  var req = "<?php echo ('this_field_is_required'); ?>";
  var sing = "<?php echo ('signing_in...'); ?>";
  var nps = "<?php echo ('new_password_sent_to_your_email'); ?>";
  var lfil = "<?php echo ('login_failed!'); ?>";
  var wrem = "<?php echo ('wrong_e-mail_address!_try_again'); ?>";
  var lss = "<?php echo ('login_successful!'); ?>";
  var sucss = "<?php echo ('SUCCESS!'); ?>";
  var rpss = "<?php echo ('reset_password'); ?>";
  var user_type = "<?php echo $control; ?>";
  var module = "login";
  var unapproved = "<?php echo ('account_not_approved._wait_for_approval.'); ?>";

  window.addEventListener("keydown", checkKeyPressed, false);
  function checkKeyPressed(e) {
    if (e.keyCode == "13") {
      $('body').find(':focus').closest('form').find('.snbtn').click();
      if($('body').find('.modal-content').find(':focus').closest('form').closest('.modal-content').length > 0){
        $('body').find('.modal-content').find(':focus').closest('form').closest('.modal-content').find('.snbtn_modal').click();
      }
    }
  }
</script>
<!--Activeit Admin [ RECOMMENDED ]-->
<script src="<?php echo base_url(); ?>template/back/js/activeit.min.js"></script>
</body>
</html>
