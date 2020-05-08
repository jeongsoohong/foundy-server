<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1" class=""></li>
    <li data-target="#myCarousel" data-slide-to="2" class=""></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img class="first-slide slide-img" src="<?php echo base_url(); ?>uploads/banner_image/main01.png" alt="First slide">
      <div class="container">
        <div class="carousel-caption">
          <h1 style="font-family: 'Patua One' !important;">join now!</h1>
          <p>파운디에서 당신의 건강한 삶을 찾아보세요<br>
            베타기간 동안 가입 혜택도 지금 확인해보세요!
          </p>
          <p>
            <a class="btn btn-lg btn-primary" href="<?php echo base_url(); ?>home/user" role="button">
              지금 가입하기
            </a>
          </p>
        </div>
      </div>
    </div>
    <div class="item">
      <img class="second-slide slide-img" src="<?php echo base_url(); ?>uploads/banner_image/main02.png" alt="Second slide">
      <div class="container">
        <div class="carousel-caption">
          <h1 style="font-family: 'Patua One' !important;">join now!</h1>
          <p>요가/필라테스 센터 등록하고<br>
            다양한 파운딧의 서비스를 무료로 이용해 보세요!
          </p>
          <p>
            <a class="btn btn-lg btn-primary" href="<?php echo base_url(); ?>home/user/center"
               role="button">
              센터회원 가입하기
            </a>
          </p>
        </div>
      </div>
    </div>
    <div class="item">
      <a href="<?php echo base_url(); ?>home/user/teacher">
        <img class="second-slide slide-img" src="<?php echo base_url(); ?>uploads/banner_image/main03.png" alt="Third slide">
      </a>
      <div class="container">
        <div class="carousel-caption">
          <h1 style="font-family: 'Patua One' !important;">join now!</h1>
          <p>ONLY, 강사 회원만을 위해 준비한 혜택을<br>
            지금 바로 확인하세요!
          </p>
          <p>
            <a class="btn btn-lg btn-primary" href="<?php echo base_url(); ?>home/user/teacher"
               role="button">
              강사회원 가입하기
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true" style="font-family: 'Glyphicons Halflings' !important;"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="font-family: 'Glyphicons Halflings' !important;"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<script>
  $(function(){
    // 이미지 슬라이드 컨트롤를 사용하기 위해서는 carousel를 실행
    $('.carousel').carousel({
      // 슬리아딩 자동 순환 지연 시간
      // false면 자동 순환하지 않는다.
      interval: 3000,
      // hover를 설정하면 마우스를 가져대면 자동 순환이 멈춘다.
      pause: "hover",
      // 순환 설정, true면 1 -> 2가면 다시 1로 돌아가서 반복
      wrap: true,
      // 키보드 이벤트 설정 여부(?)
      keyboard : true
    });
  });
</script>
