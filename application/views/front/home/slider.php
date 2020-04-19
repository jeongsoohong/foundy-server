<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img class="first-slide slide-img" src="<?php echo base_url(); ?>uploads/banner_image/main_banner.png" alt="First slide">
<!--            <div class="container">
                <div class="carousel-caption">
                    <h1>Example headline.</h1>
                    <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                </div>
            </div>-->
        </div>
        <div class="item">
            <img class="second-slide slide-img" src="<?php echo base_url(); ?>uploads/banner_image/main_banner.png" alt="Second slide">
<!--            <div class="container">
                <div class="carousel-caption">
                    <h1>Another example headline.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                </div>
            </div>-->
        </div>
        <div class="item">
            <img class="third-slide slide-img" src="<?php echo base_url(); ?>uploads/banner_image/main_banner.png" alt="Third slide">
<!--            <div class="container">
                <div class="carousel-caption">
                    <h1>One more for good measure.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                </div>
            </div>-->
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
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
