
<html>
<head>
  <title>NICE평가정보 - CheckPlus 본인인증 테스트</title>
</head>
<body>
<center>
  <p><p><p><p>
    본인인증이 완료 되었습니다.<br>
  <table border=1>
<!--    <tr>-->
<!--      <td>복호화한 시간</td>-->
<!--      <td>--><?//= $ciphertime ?><!-- (YYMMDDHHMMSS)</td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--      <td>요청 번호</td>-->
<!--      <td>--><?//= $requestnumber ?><!--</td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--      <td>나신평응답 번호</td>-->
<!--      <td>--><?//= $responsenumber ?><!--</td>-->
<!--    </tr>-->
    <tr>
      <td>인증수단</td>
      <td><?= $authtype ?></td>
    </tr>
    <tr>
      <td>성명</td>
      <td><?= $name ?></td>
    </tr>
    <tr>
      <td>생년월일(YYYYMMDD)</td>
      <td><?= $birthdate ?></td>
    </tr>
    <tr>
      <td>성별</td>
      <td><?= $gender ?></td>
    </tr>
<!--    <tr>-->
<!--      <td>내/외국인정보</td>-->
<!--      <td>--><?//= $nationalinfo ?><!--</td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--      <td>DI(64 byte)</td>-->
<!--      <td>--><?//= $dupinfo ?><!--</td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--      <td>CI(88 byte)</td>-->
<!--      <td>--><?//= $conninfo ?><!--</td>-->
<!--    </tr>-->
    <tr>
      <td>휴대폰번호</td>
      <td><?= $mobileno ?></td>
    </tr>
    <tr>
      <td>통신사</td>
      <td><?= $mobileco ?></td>
    </tr>
<!--    <tr>-->
<!--      <td colspan="2">인증 후 결과값은 내부 설정에 따른 값만 리턴받으실 수 있습니다. <br>-->
<!--        일부 결과값이 null로 리턴되는 경우 관리담당자 또는 계약부서(02-2122-4615)로 문의바랍니다.</td>-->
<!--    </tr>-->
<!--  </table>-->
</center>
</body>
</html>
<script>
  window.self.close();
</script>
