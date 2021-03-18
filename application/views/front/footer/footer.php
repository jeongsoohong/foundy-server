<footer class="footer1" id="fd-footer">
  <div class="footer1-meta">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="copyright" version="Currently v0.1">
            주식회사 파운디 | 대표 : 신두철 | 통신판매업신고번호 : 제 2020-서울마포-3960호 ㅣ 사업자등록번호 : 658-87-01852
            <a href="javascript:void(0);" onclick="onopen(&#39;business&#39;);"><u>(사업자정보확인)</u></a>
            ㅣ 주소 : 서울특별시 마포구 성미산로 19길 21 202호 ㅣ 전화 : <a href="tel:070-8656-8895">070-8656-8895</a>
            이메일 : <a href="mailto:hello@foundy.me">hello@foundy.me</a><br>
            개인정보보호책임자 홍정수(<a href="mailto:hello@foundy.me">hello@foundy.me</a>) |
            <a href="javascript:void(0);" onclick="onopen('service')"><u>서비스이용약관</u></a> |
            <a href="javascript:void(0);" onclick="onopen('privacy')"><u>개인정보보호정책</u></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <? if (false) { ?>
    <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
    <div id="player"></div>
    <script>
      // 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');
    
      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    
      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: 'auto',
          width: '100%',
          videoId: 'p8hGXujjnzU',
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          },
          playerVars: {
            'autoplay': 1,
            'controls': 0,
            'autohide': 1,
            'wmode': 'opaque',
            'origin': '<?= base_url(); ?>'
          },
        });
      }
    
      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        console.log('onPlayerReady');
        event.target.playVideo();
        // player.loadVideoByUrl("https://youtu.be/p8hGXujjnzU");
        // player.playVideo();
      }
    
      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      var done = false;
      function onPlayerStateChange(event) {
        console.log('onPlayerStateChange');
        if (event.data === YT.PlayerState.PLAYING && !done) {
          setTimeout(stopVideo, 6000);
          done = true;
        }
      }
      function stopVideo() {
        player.stopVideo();
      }
    </script>
  <? } ?>
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
