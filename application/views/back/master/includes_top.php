<!DOCTYPE html>
<html>
<head>
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <title>Master Admin</title>
  
  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= base_url(); ?>uploads/others/favicon.png">
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>template/back/plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>template/back/master/master.css?v=1.1.3">
  
  <!-- font -->
  <link href="https://spoqa.github.io/spoqa-han-sans/css/SpoqaHanSans-kr.css" rel="stylesheet" type="text/css">
  <link href="https://spoqa.github.io/spoqa-han-sans/css/SpoqaHanSans-jp.css" rel="stylesheet" type="text/css">
  
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
  <script src="<?= base_url(); ?>template/back/center/bootstrap-datepicker.ko.min.js"></script>
  
  <!--  <script src="--><!--"></script>-->
  
  <style type="text/css">
      html, body {
          height: 100%;
      }
  </style>
  <style type="text/css">
      @font-face{
          font-family:"futura-pt";
          src:url("<?= base_url(); ?>template/fonts/futura-pt/FuturaPTMedium.otf") format("woff"),
          url("<?= base_url(); ?>template/fonts/futura-pt/FuturaPTMedium.otf") format("opentype"),
          url("<?= base_url(); ?>template/fonts/futura-pt/FuturaPTMedium.otf") format("truetype");
      }
      *{
          font-family: 'Spoqa Han Sans', 'Spoqa Han Sans JP', /*'Noto Sans KR',*/ 'Quicksand', 'Patua One', 'Roboto', FontAwesome, 'Helvetica Neue', Helvetica, Arial, 'Glyphicons Halflings', sans-serif !important;
      }
      .remove_one{
          cursor:pointer;
          padding-left:5px;
      }
      body {
          background: #F3EFEB;
      }
      .page-section {
          padding-top: 10px !important;
          padding-bottom: 10px !important;
      }
      body {
          margin: 0 !important; /* 리셋을 하지 않은 경우 추가 */
      }
      .content-area {
          min-height: calc(100vh - 98px) !important;
      }
      .font-futura {
          font-family: futura-pt !important;
          font-style: normal !important;
          font-weight: 400 !important;
          /* futura-pt 적용되면 아래 폰트 스타일 지워주세요 */
          /*font-family: 'Futura PT','san-serif' !important;*/
      }
      .footer1 {
          margin: 0 !important;
          padding-top: 0 !important;
      }
  </style>
  
  <!-- include summernote css/js -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/lang/summernote-ko-KR.min.js"></script>
  <script src="<?= base_url(); ?>template/front/js/bootstrap-notify.min.js"></script>
</head>
