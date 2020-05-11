<script src="https://checkout.stripe.com/checkout.js"></script>
<style>
  @media (min-width: 1200px){
    .cus_cont {
      width: 1290px;
    }
  }
</style>
<section class="page-section">
  <div class="wrap container">
    <!-- <div id="profile-content"> -->
    <div class="row profile">
      <div class="col-lg-12 col-md-12" style="padding-left: 0 !important; padding-right: 0 !important;">
        <div id="profile_content">

          <!--<div class="information-title" style="margin-bottom: 0px;">프로필</div>-->
          <div class="profile" style="font-family: 'Quicksand' !important; font-size: 15px; text-align: center; padding-bottom: 5px; !important;"><b>profile</b></div>
          <div class="row">
            <div class="col-md-12" style="padding: 10px 10px 10px 10px !important; ">
              <div class="recent-post" style="background: #fff;border: 1px solid #e0e0e0;">
                <div class="media">
                  <div class="media-body" style="padding: 10px 10px 10px 10px">
                    <div class="col-md-12" style="margin: 10px 0 10px 0 !important; padding-left: 20px !important; text-align: left; !important; font-size: 12px !important;">
                      <p>
                        <?php echo $center_data->title; ?>
<!--                        &nbsp;&nbsp;&nbsp;<a class="profile-edit pull-right" href="#">-->
<!--                          <span style="color: gray;">수정 &nbsp; > &nbsp;</span>-->
<!--                        </a>-->
                      </p>
                      <p>
                        <?php
                        $cat = '';
                        $categories = $this->db->get_where('center_category', array('center_id' => $center_data->center_id))->result();
                        foreach($categories as $category) {
                          $cat .= $category->category . '/';
                        }
                        $cat[strlen($cat) - 1] = "\0";
                        ?>
                        <span style="color: saddlebrown;"><?php echo $cat; ?></span><br>
                      </p>
                      <p>
                        <?php echo "{$center_data->address} {$center_data->address_detail}"; ?>
                      </p>
                      <p>
                        <span><img src="<?php echo base_url(); ?>uploads/icon/icon01_call.png" style="height: 10px !important; width: 10px !important;"></span>
                        <a href="tel:<?php echo $center_data->phone; ?>"><?php echo $center_data->phone; ?></a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <div class="profile" style="font-family: 'quicksand' !important; font-size: 15px; text-align: center;
                 padding-bottom: 5px; !important;"><b>about</b></div>
                  <div class="widget " style="padding-bottom:10px; ">
                    <ul class="profile_ul" style="text-align: center">
                      <li><?php echo $center_data->about; ?>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <div class="profile" style="font-family: 'Quicksand' !important; font-size: 15px; text-align: center; padding-bottom: 5px; !important;"><b>location</b></div>
                  <div class="widget kakao-map" style="padding-bottom:10px;">
                    <div id="kakao-map" style="width:100%;height:350px;"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <div class="profile" style="font-family: 'Quicksand' !important; font-size: 15px; text-align: center; padding-bottom: 5px; !important;"><b>schedule</b></div>
                  <div class="col-md-12" style="padding: 10px 0px 0px 0px !important; border: none;">
                    <div class="recent-post" style="background: #fff;/* border: 1px solid #e0e0e0; */">
                      <div class="media">
                        <p style="color: gray; font-size: medium; font-style: italic; height: 30px; text-align: center; font-weight: 600; margin-bottom: 0px !important; padding: 0 25px 0 25px">
                          5월
                          <a href="javascript:void(0);"><span class="pull-right schedule-add" style="font-style: normal;">+</span></a>
                        </p>
                        <!--                        <div class="schedule slick pull-left media-link" style="height: 30px; float:left !important; padding: 0 !important; margin: 10px 30px 10px 30px !important; text-align: center">-->
                        <div class="schedule slick" style="height: 45px; font-size: x-large; font-style: italic; /* padding-bottom: 10px; */">
                          <div class="schedule slick-content active" id="day-1"><span>1</span></div>
                          <div class="schedule slick-content" id="day-2">2</div>
                          <div class="schedule slick-content" id="day-3">3</div>
                          <div class="schedule slick-content" id="day-4">4</div>
                          <div class="schedule slick-content" id="day-5">5</div>
                          <div class="schedule slick-content" id="day-6">6</div>
                          <div class="schedule slick-content" id="day-7">7</div>
                          <div class="schedule slick-content" id="day-8">8</div>
                          <div class="schedule slick-content" id="day-9">9</div>
                          <div class="schedule slick-content" id="day-10">10</div>
                          <div class="schedule slick-content" id="day-11">11</div>
                          <div class="schedule slick-content" id="day-12">12</div>
                          <div class="schedule slick-content" id="day-13">13</div>
                          <div class="schedule slick-content" id="day-14">14</div>
                          <div class="schedule slick-content" id="day-15">15</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="widget" style="padding-bottom:10px;">
                    <ul class="profile_ul" id="schedule-detail"style="text-align: left">
                      <li><p>11:00 - 12:00 (현제혁) 요가, 2nd room<a href="javascript:void(0);"><span class="pull-right schedule-edit" id="1">수정></span></a></p></li>
                      <li><p>11:00 - 12:00 (현제혁) 요가, 2nd room<a href="javascript:void(0);"><span class="pull-right schedule-edit" id="2">수정></span></a></p></li>
                      <li><p>11:00 - 12:00 (현제혁) 요가, 2nd room<a href="javascript:void(0);"><span class="pull-right schedule-edit" id="3">수정></span></a></p></li>
                      <li><p>11:00 - 12:00 (현제혁) 요가, 2nd room<a href="javascript:void(0);"><span class="pull-right schedule-edit" id="4">수정></span></a></p></li>
                      <li><p>11:00 - 12:00 (현제혁) 요가, 2nd room<a href="javascript:void(0);"><span class="pull-right schedule-edit" id="5">수정></span></a></p></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <div class="profile" style="font-family: 'Quicksand' !important; font-size: 15px; text-align: center; padding-bottom: 5px; !important;"><b>instructors</b></div>
                  <div class="col-md-12" style="padding: 10px 0px 10px 0px !important; border: none;">
                    <div class="recent-post" style="background: #fff;/* border: 1px solid #e0e0e0; */">
                      <div class="media">
                        <a href="<?php echo base_url(); ?>home/center/teacher/<?php echo $user_data->user_id; ?>">
                          <p style="color: gray; height: 30px; text-align: center; font-weight: 600; margin-bottom: 0px !important; padding: 0 25px 0 25px">
                            <span class="instructor-add">수정></span>
                          </p>
                        </a>
                        <div class="instructor slick" style="height: 100px; /* padding-bottom: 10px; */">
                          <div class="instructor slick-content active" id="1" style="text-align: center">
                            <p>
                              <span><img src="<?php echo base_url(); ?>uploads/icon/profile_icon.png" style="width:50px; margin: auto"></span>
                              <span>instructor 1</span>
                            </p>
                          </div>
                          <div class="instructor slick-content active" id="1" style="text-align: center">
                            <p>
                              <span><img src="<?php echo base_url(); ?>uploads/icon/profile_icon.png" style="width:50px; margin: auto"></span>
                              <span>instructor 2</span>
                            </p>
                          </div>
                          <div class="instructor slick-content active" id="1" style="text-align: center">
                            <p>
                              <span><img src="<?php echo base_url(); ?>uploads/icon/profile_icon.png" style="width:50px; margin: auto"></span>
                              <span>instructor 3</span>
                            </p>
                          </div>
                          <div class="instructor slick-content active" id="1" style="text-align: center">
                            <p>
                              <span><img src="<?php echo base_url(); ?>uploads/icon/profile_icon.png" style="width:50px; margin: auto"></span>
                              <span>instructor 4</span>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <div class="profile" style="font-family: 'Quicksand' !important; font-size: 15px; text-align: center; padding-bottom: 5px; !important;"><b>info</b></div>
                  <div class="col-md-12" style="padding: 10px 0px 0px 0px !important; border: none;">
                    <div class="recent-post" style="background: #fff;/* border: 1px solid #e0e0e0; */">
                      <div class="media">
                        <a href="javascript:void(0);">
                          <p style="color: gray; height: 30px; text-align: center; font-weight: 600; margin-bottom: 0px !important; padding: 0 25px 0 25px">
                            <span class="instructor-add">수정></span>
                          </p>
                        </a>
                        <div>
                          info
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- </div> -->
  </div>
</section>

<style>
  .page-section {
    padding-top: 10px !important;
  }
  .media-body div p {
    margin: 10px 5px 5px 5px !important;
  }
  .media-body div span img {
    width : 20px !important;
    height: 20px !important;
    margin-right: 5px;
  }
  .profile_ul {
    padding: 0 10px 0 10px !important;
    border-radius: 0 !important;
  }
  .profile_ul li {
    padding: 10px 10px 10px 10px !important;
  }
  .profile_ul li span.pull-right {
    margin: 0 5px 0 0 !important;
    padding: 0 5px 0 5px !important;
  }
  .profile_ul li span.pull-right.schedule {
    border: 1px solid #8e8e8e !important;
  }
  .profile_ul li span.pull-right img {
    width: 20px !important;
    height: 20px !important;
  }
</style>

<style type="text/css">
  .pagination_box a {
    cursor: pointer;
  }
  .pleft_nav li.active {
    background-color: #ebebeb !important;
  }
  .fa-angle-up,.fa-angle-down {
    font-family: FontAwesome !important;
  }
</style>

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<style>
  .schedule .slick-content {
    text-align: center;
    color: gray;
  }
  .schedule .slick-content.active {
    text-align: center;
    color: black;
  }
  .schedule-edit {
    color: gray;
  }
  .slick-content:focus {
    outline: none !important;
  }
</style>

<script type="text/javascript">
  $(document).ready(function() {
    $('html').animate({scrollTop:$('html, body').offset().top}, 100);
  });
</script>

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript">
  $(function() {
    $('.schedule.slick-content').click(function () {
      console.log($(this).attr('id'));
      $('.schedule.slick-content').removeClass("active");
      $(this).addClass("active");
    });

    // On edge hit
    $('.schedule.slick').on('edge', function(event, slick, direction){
      console.log('edge was hit')
    });

    // On swipe event
    $('.slick').on('swipe', function(event, slick, direction){
      console.log(direction);
      // left
    })

    $('.schedule-add').click(function () {
      console.log('schedule-add');
    });

    $('.schedule-edit').click(function () {
      console.log($(this).attr('id'));
    });
  });

  $(document).ready(function(){
    $('.schedule.slick').slick({
      centerMode: true,
      centerPadding: '20px',
      slidesToShow: 10,
      slidesToScroll: 3,
      autoplay: false,
      arrows: false,
      focusOnSelect: true,
      infinite: false,
      swipe: true,
      swipeToSlide: true,
      speed: 100,
      waitForAnimate: false,
      easing: 'swing',
      responsive: [
        {
          breakpoint: 768,
          settings: {
            centerPadding: '15px',
            slidesToShow:7
          }
        },
        {
          breakpoint: 480,
          settings: {
            centerPadding: '10px',
            slidesToShow: 5
          }
        }
      ]
    });
  });
</script>

<script type="text/javascript">
  $(function() {
    $('.instructor-add').click(function () {
      console.log('instructor-add');
    });
  });

  $(document).ready(function(){
    $('.instructor.slick').slick({
      centerMode: false,
      centerPadding: '20px',
      slidesToShow: 5,
      slidesToScroll: 1,
      autoplay: false,
      arrows: false,
      focusOnSelect: false,
      infinite: false,
      swipe: true,
      swipeToSlide: true,
      speed: 100,
      waitForAnimate: false,
      easing: 'swing',
      responsive: [
        {
          breakpoint: 768,
          settings: {
            centerPadding: '15px',
            slidesToShow: 5
          }
        },
        {
          breakpoint: 480,
          settings: {
            centerPadding: '10px',
            slidesToShow: 3
          }
        }
      ]
    });
  });
</script>

<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=a7e336b59aed62d0e46dae8a8c55da21"></script>
<script type="text/javascript">

  $(document).ready(function(){
    // active_menu_bar('find');
    var coord = new kakao.maps.LatLng(<?php echo $center_data->latitude; ?>, <?php echo $center_data->longitude; ?>);
    var mapContainer = document.getElementById('kakao-map'), // 지도를 표시할 div
      mapOption = {
        center: coord, // 지도의 중심좌표
        level: 3 // 지도의 확대 레벨
      };

    // 지도를 표시할 div와  지도 옵션으로  지도를 생성합니다
    var map = new kakao.maps.Map(mapContainer, mapOption);

    // var coords = new kakao.maps.LatLng(result[0].y, result[0].x);
    // 결과값으로 받은 위치를 마커로 표시합니다
    var marker = new kakao.maps.Marker({
      map: map,
      position: coord
    });
    // 인포윈도우로 장소에 대한 설명을 표시합니다
    var infowindow = new kakao.maps.InfoWindow({
      content: '<div style="width:150px;text-align:center;padding:6px 0;"><?php echo $center_data->address;?></div>'
    });
    infowindow.open(map, marker);
  });
</script>
