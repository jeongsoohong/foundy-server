<html>
<head>
  <title>NICE평가정보 - CheckPlus 안심본인인증 테스트</title>
  
  <script language='javascript'>
    window.name ="Parent_window";
    function fnPopup(){
      nicePopup = window.open('', 'popupChk', 'width=500, height=550, top=100, left=100, fullscreen=no, menubar=no, status=no, toolbar=no, titlebar=yes, location=no, scrollbar=no');
      document.form_chk.action = "https://nice.checkplus.co.kr/CheckPlusSafeModel/checkplus.cb";
      document.form_chk.target = "popupChk";
      // document.form_chk.target = "_blank";
      document.form_chk.submit();
    }
    $(function() {
      fnPopup();
    })
  </script>
</head>
<body>
<?//= $returnMsg ?><!--<br><br>-->
<!--업체정보 암호화 데이타 : [--><?//= $enc_data ?><!--]<br><br>-->

<!-- 본인인증 서비스 팝업을 호출하기 위해서는 다음과 같은 form이 필요합니다. -->
<form name="form_chk" method="post">
  <input type="hidden" name="m" value="checkplusService">				<!-- 필수 데이타로, 누락하시면 안됩니다. -->
  <input type="hidden" name="EncodeData" value="<?= $enc_data ?>">		<!-- 위에서 업체정보를 암호화 한 데이타입니다. -->
  
  <!-- 업체에서 응답받기 원하는 데이타를 설정하기 위해 사용할 수 있으며, 인증결과 응답시 해당 값을 그대로 송신합니다.
   해당 파라미터는 추가하실 수 없습니다. -->
  <input type="hidden" name="param_r1" value="<?= $sid; ?>">
  <input type="hidden" name="param_r2" value="<?= $aid; ?>">
  <input type="hidden" name="param_r3" value="<?= $did; ?>">
  
  <a id="form_chk" href="javascript:fnPopup();"> <!--CheckPlus 안심본인인증 Click--></a>
</form>
</body>
</html>
