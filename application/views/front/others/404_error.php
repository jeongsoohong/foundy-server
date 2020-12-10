<!DOCTYPE html>
<html style="height: 100%;">
<head>
  <meta charset="utf-8">
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <title>파운디-건강한 라이프스타일 가이드</title>
  <link rel="shortcut icon" href="<?php echo base_url(); ?>uploads/others/favicon.png">
  <style>
    @font-face{
      font-family:"futura-pt";
      src:url("https://dev.foundy.me/template/fonts/futura-pt/FuturaPTMedium.otf") format("woff"),
      url("https://dev.foundy.me/template/fonts/futura-pt/FuturaPTMedium.otf") format("opentype"),
      url("https://dev.foundy.me/template/fonts/futura-pt/FuturaPTMedium.otf") format("truetype");
    }
    * {
      padding: 0;
      border: 0;
      margin: 0;
    }
  </style>
</head>
<body style="height: 100%; font-family: sans-serif;">
<div style="height: inherit; box-sizing: border-box; margin: 0; min-width: 320px; position: relative; background-color: #845b4c;">
  <div style="font-size: 0; text-align: center; width: 240px; height: 184px; position: absolute; top: 40%; left: 50%; margin-top: -92px; margin-left: -120px;">
    <div>
      <div>
        <img src="<? echo base_url(); ?>template/icon/exclamation_white.png" width="44" height="44" style="display: block; margin: 0 auto 12px;">
        <h1 style="font-family: 'futura-pt' !important; color: #fff; font-size: 36px; font-weight: normal !important; line-height: 32px; vertical-align: top;">Oops!</h1>
      </div>
      <? if (isset($msg) == true && empty($msg) == false) { ?>
        <p style="margin: 28px 0 0 0; color: #fff; font-size: 16px; font-weight: normal; line-height: 1.65; text-align: center;"><?= $msg ?></p>
      <? } else { ?>
        <p style="margin: 28px 0 0 0; color: #fff; font-size: 16px; font-weight: normal; line-height: 1.65; text-align: center;">페이지를 찾을 수 없습니다!</p>
      <? } ?>
    </div>
    <? if (isset($page_name) && $page_name != 'close') { ?>
        <a href="<?= base_url().$page_name ?>" style="display: block; text-decoration: none; font-family: 'futura-pt' !important; background-color: #fff; box-sizing: border-box; padding: 0 16px; color: #111; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.3); font-size: 16px; font-weight: normal; height: 56px; line-height: 56px; border-radius: 28px; margin: 24px auto 0;">BACK TO HOME</a>
    <? } else if ($page_name == 'close') { ?>
      <a href="javascript:void(0);" onclick="close_popup();" style="display: block; text-decoration: none; font-family: 'futura-pt' !important; background-color: #fff; box-sizing: border-box; padding: 0 16px; color: #111; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.3); font-size: 16px; font-weight: normal; height: 56px; line-height: 56px; border-radius: 28px; margin: 24px auto 0;">CLOSE</a>
    <? } else { ?>
      <a href="<?= base_url() ?>" style="display: block; text-decoration: none; font-family: 'futura-pt' !important; background-color: #fff; box-sizing: border-box; padding: 0 16px; color: #111; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.3); font-size: 16px; font-weight: normal; height: 56px; line-height: 56px; border-radius: 28px; margin: 24px auto 0;">BACK TO HOME</a>
    <? } ?>
  </div>
</div>
<script>
  function close_popup() {
    close();
  }
</script>

</body>
</html>
