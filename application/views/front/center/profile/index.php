<script src="https://checkout.stripe.com/checkout.js"></script>
<style>
  @media (min-width: 1200px){
    .cus_cont {
      width: 1290px;
    }
  }
  #center-edit {
    background-color: white;
    height: 40px;
    width: 50px;
    position: absolute;
    left: 78%;
    z-index: 10;
    display: none;
    text-align: center;
  }

  #center-edit a {
    color: grey;
    font-size: 12px;
    line-height: 40px;
  }
  .profile_ul {
    border: none;
    box-shadow: none;
  }
  .col-md-12 .profile {
    font-size: 15px;
    text-align: center;
    height: 50px;
    line-height: 50px;
    background-color: #F3EFEB;
  }
  #info .recent-post p {
    padding: 0 15px;
  }
  #info .recent-post img {
    width: 100% !important;
  }
</style>
<?php
$profile_row_add = false;
if ($center_data->shower || $center_data->towel || $center_data->parking || $center_data->valet) {
  $profile_row_add = true;
}

?>
<div id="center-edit">
</div>
<section class="page-section" style="padding-top: 0 !important; padding-bottom: 0 !important; background-color: white">
  <div class="wrap container">
    <!-- <div id="profile-content"> -->
    <div class="row profile">
      <div class="col-lg-12 col-md-12" style="padding-left: 0 !important; padding-right: 0 !important;">
        <div id="profile_content">
<!--          <div class="profile" id='profile' style="font-family: 'Quicksand' !important; font-size: 15px; text-align: center; padding-bottom: 5px; !important;"><b>profile</b></div>-->
          <div class="row">
            <div class="col-md-12" style="padding: 0 10px 0 10px !important; ">
              <div class="recent-post" style="background: #fff;">
                <div class="media">
                  <div class="media-body" style="padding: 10px 10px 10px 10px">
                    <div class="col-md-12" style="margin: 10px 0 10px 0 !important; padding-left: 20px !important; text-align: left; !important; font-size: 12px !important;">
                      <table class="col-md-12" style="width: 100%">
                        <tbody>
                        <tr style="height: 30px;">
                          <td style="width: 80%">
                            <b><?php echo $center_data->title; ?></b>
                          </td>
                          <td style="text-align: right">
                            <?php if ($iam_this_center == true) { ?>
                              <a href="javascript:void(0);">
                                <span class="center-edit" data-target='profile-edit' style="color: grey;">
<!--                                  <i class="fa fa-ellipsis-v"></i>-->
                                  <img src="<?php echo base_url(); ?>uploads/icon/dots.png" alt="" style="width: 10px !important; height: 10px !important;">
                                </span>
                              </a>
                            <?php } else { ?>
                              <?php echo $this->crud_model->sns_func_html('bookmark', 'center', $bookmarked, $center_data->center_id, 20, 20); ?>
                            <?php } ?>
                          </td>
                        </tr>
                        <tr style="height: 30px;">
                          <td style="width: 80%">
                            <?php
                            $cat = '';
                            $categories = $this->db->get_where('center_category', array('center_id' => $center_data->center_id))->result();
                            foreach($categories as $category) {
                              $cat .= $category->category . '/';
                            }
                            $cat[strlen($cat) - 1] = "\0";
                            ?>
                            <span style="color: saddlebrown;"><?php echo $cat; ?></span>
                          </td>
                          <td style="text-align: center">
<!--                            --><?php //echo $this->crud_model->sns_func_html('bookmark', 'center', $bookmarked, $center_data->center_id, 20, 20); ?>
                          </td>
                        </tr>
                        <tr style="height: 30px;">
                          <td style="width: 80%">
                            <?php echo "{$center_data->address} {$center_data->address_detail}"; ?>
                          </td>
                          <td>
                          </td>
                        </tr>
                        <tr style="height: 30px;">
                          <td style="width: 80%">
                            <span><img src="<?php echo base_url(); ?>uploads/icon/icon01_call.png" style="height: 10px !important; width: 10px !important;"></span>
                            <a href="tel:<?php echo $center_data->phone; ?>"><?php echo $center_data->phone; ?></a>
                          </td>
                          <td>
                          </td>
                        </tr>
                        <?php if ($profile_row_add) { ?>
                        <tr style="height: 30px;">
                          <td style="width: 80%">
                            <?php if ($center_data->shower) { ?>
                              <span class="pull-left"><img src="<?php echo base_url(); ?>uploads/icon_0504/icon14_shower.png" style="height: 25px !important; width: 25px !important;"></span>
                            <?php } ?>
                            <?php if ($center_data->towel) { ?>
                              <span class="pull-left"><img src="<?php echo base_url(); ?>uploads/icon_0504/icon15_towel.png" style="height: 25px !important; width: 25px !important;"></span>
                            <?php } ?>
                            <?php if ($center_data->parking) { ?>
                              <span class="pull-left"><img src="<?php echo base_url(); ?>uploads/icon_0504/icon16_parking.png" style="height: 25px !important; width: 25px !important;"></span>
                            <?php } ?>
                            <?php if ($center_data->valet) { ?>
                              <span class="pull-left"><img src="<?php echo base_url(); ?>uploads/icon_0504/icon17_valet.png" style="height: 25px !important; width: 25px !important;"></span>
                            <?php } ?>
                          </td>
                          <td>
                          </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="center-nav slick">
              <div class="center-nav-content">
                <a class="center-nav-location" href="javascript:void(0)" onclick="move('location');">
                  <div class="col-md-12 font-futura" style="font-size: 15px;">
                    location
                  </div>
                </a>
              </div>
              <div class="center-nav-content">
                <a class="center-nav-schedule" href="javascript:void(0)" onclick="move('schedule');">
                  <div class="col-md-12 font-futura" style="font-size: 15px;">
                    schedule
                  </div>
                </a>
              </div>
              <div class="center-nav-content">
                <a class="center-nav-instructors" href="javascript:void(0)" onclick="move('instructors');">
                  <div class="col-md-12 font-futura" style="font-size: 15px;">
                    instructors
                  </div>
                </a>
              </div>
              <div class="center-nav-content">
                <a class="center-nav-info" href="javascript:void(0)" onclick="move('info');">
                  <div class="col-md-12 font-futura" style="font-size: 15px;">
                    info
                  </div>
                </a>
              </div>
            </div>
            <div class="col-md-12" id="about">
              <div class="row">
                <div class="col-md-12">
                  <div class="profile">
                    <b class="font-futura">about</b>
                  </div>
                  <div class="widget " style="padding-bottom:0;">
                    <ul class="profile_ul" style="text-align: center;">
                      <li>
                        <?php echo $center_data->about; ?>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12" id="location">
              <div class="row">
                <div class="col-md-12">
                  <div class="profile">
                    <b class="font-futura">location</b>
                  </div>
                  <div class="widget kakao-map" style="padding-bottom:0;">
                    <div id="kakao-map" style="width:100%;height:350px;"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12" id="schedule">
              <div class="row">
                <div class="col-md-12">
                  <div class="profile">
                    <table class="col-md-12" style="width: 100%">
                      <tbody>
                      <tr>
                        <td style="width: 20%">
                        </td>
                        <td>
                          <b class="font-futura">schedule</b>
                        </td>
                        <td style="width: 20%">
                          <?php if ($iam_this_center == true) { ?>
                            <a href="javascript:void(0);">
                              <span class="pull-right center-edit" data-target='schedule-add' style="color: grey; padding-right: 25px">
                                <img src="<?php echo base_url(); ?>uploads/icon/dots.png" alt="" style="width: 10px; height: 10px">
<!--                                <i class="fa fa-ellipsis-v"></i>-->
                              </span>
                            </a>
                          <?php } ?>
                        </td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-md-12" style="padding: 10px 0px 10px 0px !important; border: none;">
                    <div class="col-md-12 recent-post" style="background: #fff; padding-left: 5px; padding-right: 5px; /* border: 1px solid #e0e0e0; */">
                      <div class="media">
                        <p style="color: #6D6D6D; font-size: medium; height: 30px; text-align: center; font-weight: 600; margin-bottom: 0px !important; padding: 0 5px 0 5px">
                          <span class="schedule-month font-futura">
                            <?php
                            echo $this->crud_model->get_month(date('n', strtotime($start_date)));
                            ?>
                          </span>
                        </p>
                        <table class="col-md-12" style="width: 100%; text-align: center; font-size: 16px">
                          <tbody>
                          <tr>
                            <td style="width: 12.8%"><div class="font-futura" style="margin: 0 0 0 0;">S</div></td>
                            <td style="width: 12.8%"><div class="font-futura" style="margin: 0 0 0 0;">M</div></td>
                            <td style="width: 12.8%"><div class=font-futura" style="margin: 0 0 0 0;">T</div></td>
                            <td style="width: 12.8%"><div class=font-futura" style="margin: 0 0 0 0;">W</div></td>
                            <td style="width: 12.8%"><div class=font-futura" style="margin: 0 0 0 0;">T</div></td>
                            <td style="width: 12.8%"><div class=font-futura" style="margin: 0 0 0 0;">F</div></td>
                            <td style="width: 12.8%"><div class=font-futura" style="margin: 0 0 0 0;">S</div></td>
                          </tr>
                          </tbody>
                        </table>
                        <div class="schedule slick" style="height: 40px; font-size: 16px; /* padding-bottom: 10px; */">
                          <?php
                          $current = strtotime($start_date);
                          $last = strtotime($end_date);
                          $months = array();
                          $w = date('w', $current);
                          $start = -1 * $w;
                          $current = strtotime("{$start} day", $current);
                          while ($current <= $last) {
                            $date = date('Y-m-d', $current);
                            $day = date('j', $current); // 0 제거
                            $months[] = date('n', $current);
                            ?>
                            <div class="schedule slick-content<?php if ($date == $start_date) { echo ' active'; } else if ($date < $start_date) { echo ' before'; } ?>" id="<?php echo $date; ?>" style="width: 12.8%">
                              <div style="width: 40px; height: 40px; text-align: center; margin: 0 auto; line-height: 40px; border-radius: 20px;">
                                <?php echo $day; ?>
                              </div>
                            </div>
                            <?php
                            $current = strtotime('+1 day', $current);
                          }
                          ?>
                        </div>
                      </div>
                    </div>
                    <!--  ajax schedule  -->
                    <div class="col-md-12 widget schedule-detail" style="padding: 0 15px 0 15px !important;">

                    </div>
                    <!--  /ajax schedule  -->
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12" id="instructors">
              <div class="row">
                <div class="col-md-12">
                  <div class="profile">
                    <table class="col-md-12" style="width: 100%">
                      <tbody>
                      <tr>
                        <td style="width: 20%">
                        </td>
                        <td>
                          <b class="font-futura">instructors</b>
                        </td>
                        <td style="width: 20%">
                          <?php if ($iam_this_center == true) { ?>
                            <a href="javascript:void(0);">
                              <span class="pull-right center-edit" data-target='instructor-add' style="color: grey; padding-right: 25px">
                                <img src="<?php echo base_url(); ?>uploads/icon/dots.png" alt="" style="width: 10px; height: 10px">
<!--                                <i class="fa fa-ellipsis-v"></i>-->
                              </span>
                            </a>
                          <?php } ?>
                        </td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-md-12" style="padding: 10px 0px 10px 0px !important; border: none;">
                    <div class="recent-post" style="background: #fff;/* border: 1px solid #e0e0e0; */">
                      <div class="media">
                        <?php
                        if ($center_data->teacher_cnt > 0) {
                          ?>
                          <div class="instructor slick" style="height: 100px; /* padding-bottom: 10px; */">
                            <?php
                            foreach ($teacher_data as $teacher) {
                              $teacher = $this->db->get_where('teacher', array('teacher_id' => $teacher->teacher_id))->row();
                              $teacher_name = $teacher->name;
                              $profile_image_url = $user_data->profile_image_url;
                              if (empty($profile_image_url) or strlen($profile_image_url) == 0) {
                                $profile_image_url = base_url().'uploads/icon/profile_icon.png';
                              }
                              ?>
                              <div class="instructor slick-content active" id="1" style="margin-top: 10px; text-align: center">
                                <a href="<?php echo base_url().'home/teacher/profile/'.$user_data->user_id; ?>">
                                  <p>
                                    <span><img src="<?php echo $profile_image_url; ?>" style="width:60px; height: 60px; margin: auto; border-radius: 30px"></span>
                                    <span><?php echo $teacher_name; ?></span>
                                  </p>
                                </a>
                              </div>
                              <?php
                            }
                            ?>
                          </div>
                          <?php
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12" id="info">
              <div class="row">
                <div class="col-md-12">
                  <div class="profile">
                    <table class="col-md-12" style="width: 100%">
                      <tbody>
                      <tr>
                        <td style="width: 20%">
                        </td>
                        <td>
                          <b class="font-futura">info</b>
                        </td>
                        <td style="width: 20%">
                          <?php if ($iam_this_center == true) { ?>
                            <a href="javascript:void(0);">
                              <span class="pull-right center-edit" data-target="info-edit" style="color: grey; padding-right: 25px">
                                <img src="<?php echo base_url(); ?>uploads/icon/dots.png" alt="" style="width: 10px; height: 10px">
<!--                                <i class="fa fa-ellipsis-v"></i>-->
                              </span>
                            </a>
                          <?php } ?>
                        </td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-md-12" style="padding: 10px 0px 0px 0px !important; border: none;">
                    <div class="recent-post" style="background: #fff;/* border: 1px solid #e0e0e0; */">
                      <div class="media">
                        <div>
                          <?php echo $center_data->info; ?>
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
  .schedule-detail {
    background-color: white;
  }
  .profile_ul {
    padding: 0 10px 0 10px !important;
    border-radius: 0 !important;
  }
  .profile_ul li {
    padding: 10px !important;
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
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

<style>
  .center-nav {
    height: 40px;
    margin: 10px 15px 10px 15px;
    padding-left: 5px;
    padding-right: 5px;
  }
  .center-nav-content {
    background-color: #B39E98;
    line-height: 40px;
    color: white;
    text-align: center;
    /*margin-left: 5px;*/
    margin-right: 5px;
    /*width: 100px;*/
  }
  .center-nav-content a {
    color: white;
    font-family: Futura !important;
    font-weight: 400;
  }
</style>

<style>
  .schedule.slick-content {
    text-align: center;
    color: black;
  }
  .schedule.slick-content.active {
    text-align: center;
    color: black;
  }
  .schedule.slick-content.active div {
    background-color: black;
    color: white;
  }
  .schedule.slick-content.before div {
    color: grey;
  }
  .schedule-edit {
    color: gray;
  }
  .slick-content:focus {
    outline: none !important;
  }
</style>

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>

  $(document).ready(function() {
    $('.center-nav.slick').slick({
      // centerMode: true,
      // centerPadding: '10px',
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: false,
      arrows: false,
      // focusOnSelect: true,
      infinite: false,
      // swipe: true,
      // swipeToSlide: true,
      speed: 100,
      // waitForAnimate: false,
      easing: 'swing',
      // variableWidth: true
    });
  });

</script>
<script type="text/javascript">
  var month = [<?php foreach ($months as $m) {echo '"'.$this->crud_model->get_month($m).'",';} ?>];
  var today = '<?php echo $start_date; ?>';

  function get_month_str(m) {
    var monthArr = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    return monthArr[m];
  }

  function get_schedule_content(date) {
    // set current month
    var d = new Date(date);
    var currentMonth = get_month_str(d.getMonth());
    var scheduleMonth = $.trim($('.schedule-month').text());
    if (scheduleMonth !== currentMonth) {
      $('.schedule-month').text(currentMonth);
    }

    // set current day to Bold
    $('.schedule.slick-content').removeClass("active");
    $('#'+date).addClass("active");

    $.ajax({
      url: "<?php echo base_url().'home/center/schedule/info?cid='.$center_data->center_id.'&date='; ?>" + date,
      type: 'GET', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      success: function(data) {
        // alert(data);
        $('.schedule-detail table').remove();
        $('.schedule-detail').append(data);
      },
      error: function(e) {
        console.log(e)
      }
    });
  }

  $(function() {
    $('.schedule.slick-content').click(function () {
      var date = $(this).attr('id');
      // console.log(date);
      get_schedule_content(date);
    });

    // On edge hit
    // $('.schedule.slick').on('edge', function(event, slick, direction){
    //   console.log('edge was hit')
    // });

    // On swipe event
    $('.slick').on('swipe', function(event, slick, direction){
      // console.log(direction);
      // Get the current slide
      var currentSlide = $('.schedule.slick').slick('slickCurrentSlide');
      var scheduleMonth = $.trim($('.schedule-month').text());
      var currentMonth = month[currentSlide];

      // console.log(currentSlide);
      // console.log(month[currentSlide] + '월');
      // console.log(scheduleMonth);

      if (scheduleMonth !== currentMonth) {
        $('.schedule-month').text(currentMonth);
      }
    })

    $('.schedule-add').click(function () {
      // console.log('schedule-add');
    });

    $('.schedule-edit').click(function () {
      // console.log($(this).attr('id'));
    });
  });

  $(document).ready(function(){
    $('.schedule.slick').slick({
      // centerMode: true,
      // centerPadding: '10px',
      slidesToShow: 7,
      slidesToScroll: 7,
      autoplay: false,
      arrows: false,
      // focusOnSelect: true,
      infinite: false,
      // swipe: true,
      // swipeToSlide: true,
      speed: 100,
      // waitForAnimate: false,
      easing: 'swing',
    });

    get_schedule_content(today);
  });
</script>

<?php
if ($center_data->teacher_cnt > 0) {
  ?>
  <script type="text/javascript">
    // $(function() {
    //   $('.instructor-add').click(function () {
    //     console.log('instructor-add');
    //   });
    // });

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
  <?php
}
?>

<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=8ee901a556539927d58b30a6bf21a781"></script>
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

<script type="text/javascript">

  function move(id) {
    var offset = $('#' + id).offset();
    offset.top = offset.top - 85;
    // console.log(offset);
    $('html, body').animate({scrollTop : offset.top}, 100);
  }

  var target = '';
  var id = '';

  function openPop(elem) {
    if ($('#center-edit').css('display') === 'none' || target !== elem.attr('data-target') ||
      (target === 'schedule-edit' && id !== elem.attr('id'))) {
      // var divTop = e.pageY; //상단 좌표 위치 안맞을시 e.pageY
      // var divLeft = e.pageX; //좌측 좌표 위치 안맞을시 e.pageX
      var divTop = elem.offset().top;
      var divLeft = elem.offset().left - 60; // posY - width - 10(padding)

      var base_url = '<?php echo base_url(); ?>';
      var href = '';
      var text = '';
      target = elem.attr('data-target');

      if (target === 'schedule-add') {
        href = base_url + 'home/center/schedule/mod?sid=0&cid=<?php echo $center_data->center_id; ?>';
        text = '추가';
      } else if (target === 'instructor-add') {
        href = base_url + 'home/center/teacher/<?php echo $center_data->center_id; ?>';
        text = '수정';
      } else if (target === 'info-edit') {
        href = base_url + 'home/center/info/<?php echo $center_data->center_id; ?>';
        text = '수정';
      } else if (target === 'schedule-edit') {
        id = elem.attr('id');
        // console.log(id);
        href = base_url + 'home/center/schedule/mod?sid=' + id + '&cid=<?php echo $center_data->center_id; ?>';
        text = '수정';
      } else if (target === 'profile-edit') {
        href = base_url + 'home/center/edit_profile/<?php echo $center_data->center_id; ?>';
        text = '수정';
      } else {
        return;
      }

      $('#center-edit').empty().append('<a href="' + href + '">' + text + '</a>');
      $('#center-edit').css({
        "top": divTop ,
        "left": divLeft,
        "position": "absolute"
      }).show();
    } else {
      $('#center-edit').hide();
    }
  }
  $(document).ready(function() {
    // $('html').animate({scrollTop:$('html, body').offset().top}, 100);
    <?php
    if (!empty($nav) && strlen($nav) > 0) {
      echo "move('{$nav}');";
    } else {
      echo "$('html').animate({scrollTop:$('html, body').offset().top}, 100);";
    }
    ?>

    $('.center-edit').click(function(e) {
      openPop($(this));
    });
    active_menu_bar('find');
  });
</script>

