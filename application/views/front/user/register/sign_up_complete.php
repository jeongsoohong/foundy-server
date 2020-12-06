<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <title>signUp</title>
  <style>
    * {
      padding: 0;
      border: 0;
      margin: 0;
    }
    .clearfix::after {
      content: "";
      display: block;
      clear: both;
    }
    a {text-decoration: none;}
    li {list-style: none;}
    .break-all {
      word-break: break-all;
    }
    .complete_wrap {
      font-family: 'Apple SD Gothic Neo', 'Malgun Gothic', '맑은 고딕', sans-serif;
      padding: 48px 0 0;
      width: calc(100% - 60px);
      margin: 0 auto;
      text-align: center;
      background-color: #fff;
    }
    .complete_tit {
      text-align: center;
      color: darksalmon;
      font-size: 21px;
      font-weight: bold;
      line-height: 1.5;
      margin: 0 0 24px 0;
    }
    .complete_guide {
      color: #616161;
      font-size: 15px;
      font-weight: normal;
    }
    #back {
      margin-top: 40px;
      display: block;
      color: #604c48;
      font-size: 14px;
      font-weight: bold;
      background-color: #fff;
      border: 1px solid #604c48;
      box-sizing: border-box;
      height: 40px;
      line-height: 40px;
      text-align: center;
    }
  </style>
</head>
<body>

<article class="complete_wrap">
  <div class="complete_box">
    <h2 class="complete_tit">
      <span style="display: block;">
        <img src="<?= base_url(); ?>template/icon/ic_ok.png" width="44" height="44">
      </span>
      감사합니다!</h2>
    <p class="complete_guide">파운디 회원가입이 완료되었습니다.</p>
  </div>
  <a href="<?= base_url(); ?>" id="back">홈으로 이동</a>
</article>

</body>
</html>
