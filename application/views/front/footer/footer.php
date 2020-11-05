<footer class="footer1" >
  <div class="footer1-meta">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="copyright" version="Currently v0.1">
            주식회사 파운디 | 대표 : 신두철 | 통신판매업신고번호 : 제 2020-서울용산-1881호 ㅣ 사업자등록번호 : 658-87-01852(
            <a href="javascript:void(0);" onclick="onopen('business');"><u>사업자정보확인</u></a>
            )<br>
            주소 : 서울특별시 마포구 성미산로 19길 21 202호 ㅣ 전화 : <a href="tel:070-8656-8895">070-8656-8895</a><br>
            이메일 : <a href="mailto:hello@foundy.me">hello@foundy.me</a><br>
            개인정보보호책임자 홍정수(<a href="mailto:hello@foundy.me">hello@foundy.me</a>) |
            <a href="javascript:void(0);" onclick="onopen('service')"><u>서비스이용약관</u></a> |
            <a href="javascript:void(0);" onclick="onopen('privacy')"><u>개인정보보호정책</u></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<style>
  .link:hover{
    text-decoration:underline;
  }
  .model-2 a {
    margin: 0px 1px;
    height: 32px;
    width: 32px;
    line-height: 32px;
  }
  footer {
    height: 100px !important;
    padding-bottom: 0px !important;
    margin-bottom: 0px !important;
  }
</style>

<script language="JavaScript">
  function onopen(input) {
    var url;
    if (input === 'business') {
      url = "http://www.ftc.go.kr/bizCommPop.do?wrkr_no=6588701852"
      window.open(url, "bizCommPop", "width=750, height=700;");
    } else if (input === 'service') {
      url = "<?php echo base_url().'home/user/service'; ?>";
      window.open(url, "foundy", "width=750, height=700;");
    } else if (input === 'privacy') {
      url = "<?php echo base_url().'home/user/privacy'; ?>";
      window.open(url, "foundy", "width=750, height=700;");
    }
  }
</script>
