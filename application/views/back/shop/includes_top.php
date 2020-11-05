<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1,width=device-width" />
  <title>Shop | FOUNDY</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>uploads/others/favicon.png">
  <!--STYLESHEET-->
  <link href="//stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
  <!--Font Awesome [ OPTIONAL ]-->
  <link href="<?php echo base_url(); ?>template/back/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>template/back/css/activeit.min.css" rel="stylesheet">
  <!-- font -->
  <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR&display=swap" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,600,700,800,900' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=Patua+One&display=swap" rel="stylesheet">
  <style>
    @font-face{
      font-family:"futura-pt";
      src:url("<?php echo base_url(); ?>template/fonts/futura-pt/FuturaPTMedium.otf") format("woff"),
      url("<?php echo base_url(); ?>template/fonts/futura-pt/FuturaPTMedium.otf") format("opentype"),
      url("<?php echo base_url(); ?>template/fonts/futura-pt/FuturaPTMedium.otf") format("truetype");
    }
    *{
      font-family: 'Noto Sans KR', 'Quicksand', 'Patua One', 'Roboto', "Glyphicons Halflings", FontAwesome, 'Helvetica Neue', Helvetica, Arial, sans-serif !important;
    }
    body {
      background: #F3EFEB;
    }
    .page-section {
      padding-top: 10px !important;
      padding-bottom: 10px !important;
    }
    .font-futura {
      font-family: futura-pt !important;
      font-style: normal !important;
      font-weight: 400 !important;
    }
    #content-container {
      padding-top: 70px !important;
      padding-left: 25px!important;
      padding-right: 25px!important;
    }
  </style>

  <script src="//code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="//stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="//cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
  <script src="<?php echo base_url(); ?>template/front/js/bootstrap-notify.min.js"></script>
<!--  <script src="--><?php //echo base_url(); ?><!--template/back/js/activeit.js"></script>-->

  <!-- include summernote css/js -->
  <link href="//cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
  <script src="//cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/summernote@0.8.16/dist/lang/summernote-ko-KR.min.js"></script>

  <script>
    var top = Number(200);
    var loading_set =
      '<div style="text-align:center;width:100%;height:'+(top*2)+'px; position:relative;top:'+top+'px;">' +
      '<i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>' +
      '</div>';

    function postDesc(input) {
      let desc = document.getElementById(input);
      desc.value = desc.value.replace(/\r\n|\r|\n/g,"<br />");
      return true;
    }

    function preDesc(input) {
      let desc = document.getElementById(input);
      desc.value = desc.value.replace("<br />", "\n");
      return true;
    }
  </script>

</head>
