<meta charset="UTF-8">
<meta name="author" content="FOUNDY">
<meta name="revisit-after" content="2 days">
<meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1,width=device-width" />
<!--<meta name="appleid-signin-client-id" content="[CLIENT_ID]">-->
<!--<meta name="appleid-signin-scope" content="[SCOPES]">-->
<!--<meta name="appleid-signin-redirect-uri" content="[REDIRECT_URI]">-->
<!--<meta name="appleid-signin-state" content="[STATE]">-->
<?php
$e = array(
  'general' => true, //description
  'og' => true,
  'twitter'=> true,
  'robot'=> true
);
$title = '';
$desc = '';
$imgurl = '';
if ($page_name == 'center/profile') {
  $title = $center_data->title;
  $desc = $center_data->about;
}
if ($page_name == 'teacher/video/view') {
  $title = $video_data->title;
  $desc = $video_data->desc;
  $imgurl = $video_data->thumbnail_image_url;
}
if ($page_name == 'blog/blog_view') {
  $title = $blog->title;
  $desc = $blog->summery;
  $imgurl = $blog->main_image_url;
}
if ($page_name == 'shop/product') {
  $title = $product->item_name;
  $desc = $product->item_base_info;
  $imgurl = $product->item_image_url_0;
}
meta_tags($e, $title, $desc, $imgurl, $url);
?>
<?php
include 'meta/' . $asset_page . '.php';
?>
<!-- Favicon -->
<link rel="apple-touch-icon-precomposed" sizes="167x167" href="<?php echo base_url(); ?>uploads/others/favicon.png">
<link rel="shortcut icon" href="<?php echo base_url(); ?>uploads/others/favicon.png">
<!--<title>--><?php //echo $page_title; ?><!--</title>-->
<!-- CSS Global -->
<link href="<?php echo base_url(); ?>template/front/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>template/front/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>template/front/plugins/fontawesome/css/font-awesome.min.css" rel="stylesheet">
<!--<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" />-->
<link href="<?php echo base_url(); ?>template/front/plugins/animate/animate.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>template/front/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>template/front/modal/css/sm.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>template/front/rateit/rateit.css" rel="stylesheet">

<!-- Theme CSS -->
<link href="<?php echo base_url(); ?>template/front/css/theme.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>template/front/css/theme-ash-1.css" rel="stylesheet" id="theme-config-link">
<link href="<?php echo base_url(); ?>template/front/plugins/smedia/custom-1.css" rel="stylesheet">

<!-- Font -->
<!-- Menu Bar Font -->
<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
<!-- Banner Title Font -->
<!--<link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR&display=swap" rel="stylesheet">-->
<link href='//spoqa.github.io/spoqa-han-sans/css/SpoqaHanSans-kr.css' rel='stylesheet' type='text/css'>
<link href='//spoqa.github.io/spoqa-han-sans/css/SpoqaHanSans-jp.css' rel='stylesheet' type='text/css'>

<link href='https://fonts.googleapis.com/css?family=Roboto:400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Patua+One&display=swap" rel="stylesheet">
<!--<link href="https://db.onlinewebfonts.com/c/b46bb1fc76216f5cd90457d0451dbee4?family=Futura-pt" rel="stylesheet">-->
<style>
  @font-face{
    font-family:"futura-pt";
    src:url("<?php echo base_url(); ?>template/fonts/futura-pt/FuturaPTMedium.otf") format("woff"),
    url("<?php echo base_url(); ?>template/fonts/futura-pt/FuturaPTMedium.otf") format("opentype"),
    url("<?php echo base_url(); ?>template/fonts/futura-pt/FuturaPTMedium.otf") format("truetype");
  }
  *{
    font-family: 'Spoqa Han Sans', 'Spoqa Han Sans JP', /*'Noto Sans KR',*/ 'Quicksand', 'Patua One', 'Roboto', FontAwesome, 'Helvetica Neue', Helvetica, Arial, sans-serif !important;
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
  }
  .footer1 {
    margin: 0 !important;
    padding-top: 0 !important;
  }
</style>

<!-- jquery -->
<script src="<?php echo base_url(); ?>template/front/plugins/jquery/jquery-1.11.1.js"></script>
<!--<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.js"></script>-->
<!--<script src="--><?php //echo base_url(); ?><!--template/front/plugins/jquery.mobile-1.4.5/jquery.mobile-1.4.5.js"></script>-->

<?php
include $asset_page.'.php';
?>

