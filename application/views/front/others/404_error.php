<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>template/front/ico/apple-touch-icon-144-precomposed.png">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>uploads/others/favicon.png">
  <!--    --><?php //$theme =  $this->db->get_where('ui_settings',array('type' => 'header_color'))->row()->value;?>
  <link href="<?php echo base_url(); ?>template/front/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>template/front/css/theme.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>template/front/css/theme-ash-1.css" rel="stylesheet" id="theme-config-link">
  <!--    --><?php //
  //        $font =  $this->db->get_where('ui_settings',array('type' => 'font'))->row()->value;
  //    ?><!--  -->
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,600,700,800,900' rel='stylesheet' type='text/css'>
  <link href='//spoqa.github.io/spoqa-han-sans/css/SpoqaHanSans-kr.css' rel='stylesheet' type='text/css'>
  <link href='//spoqa.github.io/spoqa-han-sans/css/SpoqaHanSans-jp.css' rel='stylesheet' type='text/css'>
  <style>
    *{
      font-family: 'Spoqa Han Sans', 'Spoqa Han Sans JP', /*'Noto Sans KR',*/ 'Quicksand', 'Patua One', 'Roboto', FontAwesome, 'Helvetica Neue', Helvetica, Arial, sans-serif !important;
    }
    .remove_one{
      cursor:pointer;
      padding-left:5px;
    }
  </style>
</head>
<body id="home" class="wide">
<section class="page-section text-center error-page" style="background-color: white; min-height: 100vh;">
  <div class="container">
    <div class="col-md-12 text-center">
      <img src="<?php echo base_url(); ?>uploads/logo_image/foundy logo_0507.png" alt="foundy" style="height: 40px; width: 100px; "/>
      </a>
    </div>
    <h3 style="margin: 64px auto; font-size: 64px; line-height: 64px;">404</h3>
    <h2>
      <i class="fa fa-warning"></i>
      oops! the page you requested was not found
    </h2>
    <p>
      <a class="btn btn-theme" href="<?php echo base_url(); ?>">
        back to home
      </a>
    </p>
  </div>
</section>
</body>
</html>
