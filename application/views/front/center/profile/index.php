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
  #info .recent-post {
    padding: 0 15px;
  }
  #info .recent-post img {
    width: 100% !important;
  }
</style>
<style type="text/css">
  /* style 추가  */
  .card_plan p {
    margin: 0;
  }
  /*.schedule.slick-content {*/
  /*  width: 44px !important;*/
  /*}*/
  .type_info {
    display: inline-block;
    color: #757575;
    font-size: 14px;
    margin-right: 16px !important;
    vertical-align: middle;
    line-height: 1.3;
  }
  
  .type_info .font-futura {
    font-weight: bold !important;
  }
  
  .type_class {
    display: inline-block;
    vertical-align: top;
  }
  
  .type_name {
    display: inline-block;
    vertical-align: middle;
    margin-top: -4px;
  }
  
  
  .card_class {
    position: relative;
    padding: 19px 19px 18px;
    border-bottom: 1px solid #eee;
  }
  .card_class:last-child {
    border-bottom: 0;
  }
  
  .class_name {
    color: #333;
    font-size: 14px;
    font-weight: bold;
    margin-top: -4px !important;
  }
  .class_teacher {
    color: #757575;
    font-size: 12px;
    font-weight: normal;
  }
  
  .type_btn {
    position: absolute;
    top: 8px;
    right: 8px;
    width: 40px;
    height: 40px;
    padding: 0;
    background-color: transparent;
    border: 0
  }
  
  .btn_more {
    display: block;
    width: 108px;
    height: 36px;
    margin: 24px auto;
    border: 1px solid #B7A6A4;
    box-sizing: border-box;
    color: #B7A6A4;
    font-size: 14px;
    padding: 0;
    background-color: transparent;
  }
  
  .center-nav {
    height: 40px;
    margin: 12px 8px !important;
    padding: 0 !important;
  }
  .center-nav-content {
    margin-right: 6px;
    /*width: 80px !important;*/
    padding: 0;
    border-radius: 12px;
    line-height: 40px;
    box-sizing: border-box;
  }
  
  .popup-box {
    display: none;
    background-color: rgba(0,0,0,0.3);
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 10;
  }
  div[class*='theme'] {
    font-size: 0;
    background-color: #fff;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    border-radius: 4px;
    z-index: 11;
    width: 268px;
    position: absolute;
    left: 50%;
    top: 50%;
    margin-left: -134px;
    text-align: center;
  }
  
  div[class*='theme'] p {
    margin: 0;
  }
  .theme\:book {
    height: 212px;
    margin-top: -106px;
  }
  .theme\:alt_cancel {
    height: 184px;
    margin-top: -92px;
  }
  .theme\:alt_cancel_detail {
    height: 176px;
    margin-top: -88px;
  }
  
  .popup_tit {
    padding-top: 32px;
  }
  .topic_icon {
    display: inline-block;
    width: 44px;
    height: 44px;
    line-height: 44px;
    background-color: #B0957A;
    margin-right: 16px;
    border-radius: 50%;
  }
  .topic_icon img {
    margin-bottom: 2px;
  }
  .topic_message {
    display: inline-block;
    color: #B0957A;
    font-size: 14px;
    text-align: left;
    vertical-align: top;
    margin-top: -6px !important;
  }
  .topic_message .font-futura {
    font-size: 16px;
    font-weight: bold !important;
    line-height: 1.5;
  }
  .popup_guide {
    margin-top: 20px !important;
    color: #757575;
    font-size: 11px;
    line-height: 1.75;
  }
  
  .confirm_btn {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 48px;
  }
  .confirm_btn button {
    box-sizing: border-box;
    border-top: 1px solid #eee !important;
    border: 0;
    color: #0091ea;
    font-size: 16px;
    width: 50%;
    height: inherit;
    padding: 0;
    background-color: transparent;
    font-family: futura-pt !important;
  }
  .btn_no {
    width: calc(50% - 1px) !important;
    border-right: 1px solid #eee !important;
  }
  
  .btn_info {
    padding: 0;
    margin: 0;
  }
  .btn_fn {
    float: left;
    height: 30px;
  }
  .btn_fn:nth-child(2) {
    margin: 0 12px;
    height: 30px;
  }
  .btn_fn:nth-child(2) span {
    display: inline-block;
    width: 1px;
    height: 20px;
    margin: 5px 0;
    background-color: #bdbdbd;
  }
  .btn_fn a, .btn_fn div {
    text-align: center;
  }
  .btn_fn a {
    float: left;
    display: block;
    width: 30px;
    height: 30px;
    margin-right: 8px;
    line-height: 30px;
    background-color: #F7D47C;
    border-radius: 50%;
  }
  .btn_fn a:last-child {
    margin-right: 0;
  }
  .btn_fn div {
    font-size: 0;
  }
  .btn_fn div img {
    margin-right: 8px;
  }
  .btn_fn div img:last-child {
    margin: 0;
  }
</style>
<div id="center-edit">
</div>
<section class="page-section" style="padding-top: 0 !important; padding-bottom: 0 !important; background-color: white">
  <div class="wrap container">
    <div class="row profile">
      <div class="col-lg-12 col-md-12" style="padding-left: 0 !important; padding-right: 0 !important;">
        <div id="profile_content">
          <div class="row">
            <div class="col-md-12" style="padding: 24px 20px !important; box-sizing: border-box; width: 92.7%; margin: 0 auto;">
              <div class="recent-post" style="background: #fff;">
                <div class="media">
                  <div class="clearfix" id="profile-title" style="margin-bottom: 12px;">
                    <p style="margin-bottom: 0; float: left; color: #111; font-size: 18px; font-weight: bold;"><?php echo $center_data->title; ?></p>
                    <style>
                      #profile_content #profile-title a {
                        display: block;
                        width: 24px;
                        height: 24px;
                        float: right;
                        margin-top: 3px;
                      }
                    </style>
                    <?php echo $this->crud_model->sns_func_html('bookmark', 'center', $bookmarked, $center_data->center_id, 24, 24); ?>
                  </div>
                  <div style="margin-bottom: 16px; letter-spacing: 0.079em;">
                    <p style="color: saddlebrown; font-size: 12px; font-weight: normal; margin-bottom: 0;">
                      <?php
                      $cat = '';
                      $categories = $this->db->get_where('center_category', array('center_id' => $center_data->center_id))->result();
                      foreach($categories as $category) {
                        $cat .= $category->category . '/';
                      }
                      $cat[strlen($cat) - 1] = "\0";
                      echo $cat;
                      ?>
                    </p>
                    <p style="color: #757575; font-size: 12px; font-weight: normal;">
                    <?php echo $center_data->address.' '.$center_data->address_detail; ?>
                    </p>
                  </div>
                  <div class="clearfix">
                    <!-- 스타일 추가수정 -->
                    <div style="float: left;">
                      <!-- 태그 및 스타일 추가수정 -->
                      <ul class="btn_info clearfix">
                        <li class="btn_fn clearfix">
                          <!-- 전화 버튼 -->
                          <a href="tel:<?php echo $center_data->phone; ?>" style="font-size: 14px;">
                            <!-- margin값 수정 -->
                            <img src="<?php echo base_url(); ?>uploads/icon/icon01_call.png" style="height: 12px; width: 12px; margin-bottom: 4px;">
                          </a>
                          <!-- 인스타그램 버튼 -->
                          <a href="#">
                            <img src="<?php echo base_url(); ?>template/icon/ic_instagram.png" width="16" height="16" style="margin-bottom: 4px;">
                          </a>
                          <!-- 블로그 버튼 -->
                          <a href="#">
                            <img src="<?php echo base_url(); ?>template/icon/ic_blog.png" width="16" height="auto" style="margin-bottom: 4px;">
                          </a>
                        </li>
                        <li class="btn_fn">
                          <!-- 구분선 -->
                          <span></span>
                        </li>
                        <li class="btn_fn clearfix">
                          <div style="float: left;">
                            <!-- 이미지 여백을 없애서 샤워/타월/주차/발레 아래 이미지로 대체/추가해주세요 -->
                            <?php if ($center_data->shower) { ?>
                            <img src="<?php echo base_url(); ?>template/icon/icon14_shower.png" width="30" height="30">
                            <?php } ?>
                            <?php if ($center_data->towel) { ?>
                            <img src="<?php echo base_url(); ?>template/icon/icon15_towel.png" width="30" height="30">
                            <?php } ?>
                            <?php if ($center_data->parking) { ?>
                            <img src="<?php echo base_url(); ?>template/icon/icon16_parking.png" width="30" height="30">
                            <?php } ?>
                            <?php if ($center_data->valet) { ?>
                            <img src="<?php echo base_url(); ?>template/icon/icon17_valet.png" width="30" height="30">
                            <?php } ?>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="center-nav slick" style="width: 88.41%; margin: 12px auto !important;">
              <div class="center-nav-content">
                <a class="center-nav-location" href="javascript:void(0)" onclick="move('location');">
                  <div class="col-md-12 font-futura" style="font-size: 15px; padding: 0">
                    location
                  </div>
                </a>
              </div>
              <div class="center-nav-content">
                <a class="center-nav-schedule" href="javascript:void(0)" onclick="move('schedule');">
                  <div class="col-md-12 font-futura" style="font-size: 15px; padding: 0;">
                    schedule
                  </div>
                </a>
              </div>
              <div class="center-nav-content">
                <a class="center-nav-instructors" href="javascript:void(0)" onclick="move('instructors');">
                  <div class="col-md-12 font-futura" style="font-size: 15px; padding: 0;">
                    instructors
                  </div>
                </a>
              </div>
              <div class="center-nav-content">
                <a class="center-nav-info" href="javascript:void(0)" onclick="move('info');">
                  <div class="col-md-12 font-futura" style="font-size: 15px; padding: 0">
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
                        <pre style="background-color: inherit; border: none"><?php echo $center_data->about; ?></pre>
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
                    <div id="kakao-map" style="width:100%;height:180px;"></div>
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
<!--                            <a href="javascript:void(0);">-->
<!--                              <span class="pull-right center-edit" data-target='schedule-add' style="color: grey; padding-right: 25px">-->
<!--                                <img src="--><?php //echo base_url(); ?><!--uploads/icon/dots.png" alt="" style="width: 10px; height: 10px">-->
<!--                                <i class="fa fa-ellipsis-v"></i>-->
<!--                              </span>-->
<!--                            </a>-->
                          <?php } ?>
                        </td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
<!--                  <div class="col-md-12" style="padding: 10px 0px 10px 0px !important; border: none;">-->
                  <div class="col-md-12" style="padding: 10px 0px 10px 0px !important; border-bottom: 1px solid #eee;">
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
                    <? if (DEV_SERVER) { ?>
                    <div class="col-md-12 widget schedule-detail" style="margin-top: 16px; padding: 0; border-top: 1px solid #eee;">
                      <div class="col-md-12 card_plan" style="padding: 0;">
                        <div class="card_wrap">
                          <div class="card_class">
                            <p class="type_info">
                              <span class="font-futura day_part">pm</span> <span class="font-futura time_no">7:00 <br>~ 8:00</span>
                            </p>
                            <div class="type_class">
                              <p class="class_name">빈야사</p>
                              <p class="class_teacher">샤일라</p>
                            </div>
                            <button class="type_btn btn_on">
                              <img src="<?php echo base_url(); ?>template/icon/ic_cancel_on.png" width="40" height="40">
                            </button>
                          </div>
                          <div class="card_class">
                            <p class="type_info">
                              <span class="font-futura day_part">pm</span> <span class="font-futura time_no">7:00 <br>~ 8:00</span>
                            </p>
                            <div class="type_class">
                              <p class="class_name">리프레쉬 릴렉스</p>
                              <p class="class_teacher">샤일라</p>
                            </div>
                            <button class="type_btn btn_off">
                              <img src="<?php echo base_url(); ?>template/icon/ic_cancel_off.png" width="40" height="40">
                            </button>
                          </div>
                          <div class="card_class">
                            <p class="type_info">
                              <span class="font-futura day_part">pm</span> <span class="font-futura time_no">7:00 <br>~ 8:00</span>
                            </p>
                            <div class="type_class">
                              <p class="class_name">빈야사</p>
                              <p class="class_teacher">샤일라</p>
                            </div>
                            <button class="type_btn btn_on">
                              <img src="<?php echo base_url(); ?>template/icon/ic_cancel_on.png" width="40" height="40">
                            </button>
                          </div>
                          <div class="card_class">
                            <p class="type_info">
                              <span class="font-futura day_part">pm</span> <span class="font-futura time_no">7:00 <br>~ 8:00</span>
                            </p>
                            <div class="type_class">
                              <p class="class_name">리프레쉬 릴렉스</p>
                              <p class="class_teacher">샤일라</p>
                            </div>
                            <button class="type_btn btn_off">
                              <img src="<?php echo base_url(); ?>template/icon/ic_cancel_off.png" width="40" height="40">
                            </button>
                          </div>
                          <div class="card_hide hide_1" style="display: none;">
                            <div class="card_class">
                              <p class="type_info">
                                <span class="font-futura day_part">pm</span> <span class="font-futura time_no">7:00 <br>~ 8:00</span>
                              </p>
                              <div class="type_class">
                                <p class="class_name">빈야사</p>
                                <p class="class_teacher">샤일라</p>
                              </div>
                              <button class="type_btn btn_on">
                                <img src="<?php echo base_url(); ?>template/icon/ic_cancel_on.png" width="40" height="40">
                              </button>
                            </div>
                            <div class="card_class">
                              <p class="type_info">
                                <span class="font-futura day_part">pm</span> <span class="font-futura time_no">7:00 <br>~ 8:00</span>
                              </p>
                              <div class="type_class">
                                <p class="class_name">리프레쉬 릴렉스</p>
                                <p class="class_teacher">샤일라</p>
                              </div>
                              <button class="type_btn btn_off">
                                <img src="<?php echo base_url(); ?>template/icon/ic_cancel_off.png" width="40" height="40">
                              </button>
                            </div>
                          </div>
                        </div>
                        <button class="font-futura btn_more">MORE</button>
                      </div>
                    </div>
                    <? } ?>
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
<!--                            <a href="javascript:void(0);">-->
<!--                              <span class="pull-right center-edit" data-target='instructor-add' style="color: grey; padding-right: 25px">-->
<!--                                <img src="--><?php //echo base_url(); ?><!--uploads/icon/dots.png" alt="" style="width: 10px; height: 10px">-->
<!--                                <i class="fa fa-ellipsis-v"></i>-->
<!--                              </span>-->
<!--                            </a>-->
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
<!--                            <a href="javascript:void(0);">-->
<!--                              <span class="pull-right center-edit" data-target="info-edit" style="color: grey; padding-right: 25px">-->
<!--                                <img src="--><?php //echo base_url(); ?><!--uploads/icon/dots.png" alt="" style="width: 10px; height: 10px">-->
<!--                                <i class="fa fa-ellipsis-v"></i>-->
<!--                              </span>-->
<!--                            </a>-->
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

<div class="popup-box">
  <div class="popup theme:book">
    <div class="popup_tit">
      <div class="popup_topic">
        <div class="topic_icon">
          <img src="<?php echo base_url(); ?>template/icon/ic_calendar.png" alt="" width="16" height="16">
        </div>
        <p class="topic_message" style="font-weight: bold !important;"><span class="font-futura">pm <span class="set_time">7:00</span> - <span class="set_time">8:00</span></span> [빈야사]
          <br>수업을 예약합니다.</p>
      </div>
      <p class="popup_guide" style="text-align: left; width: 223px; margin: 0 auto;">예약 취소는 수업 시작 <span class="font-futura">00</span>시간 전까지만 가능하며,
        <br>그 이후의 취소는 센터로 직접 문의 주세요!</p>
    </div>
    <div class="confirm_btn">
      <button class="btn_no">CANCEL</button>
      <button class="btn_yes">OK</button>
    </div>
  </div>
  <div class="popup theme:alt_cancel">
    <div class="popup_tit">
      <div class="popup_topic">
        <div class="topic_icon" style="background-color: #9C8F92;">
          <img src="<?php echo base_url(); ?>template/icon/ic_calendar.png" alt="" width="16" height="16">
        </div>
        <p class="topic_message" style="font-weight: bold !important; color: #9C8F92;"><span class="font-futura">pm <span class="set_time">7:00</span> - <span class="set_time">8:00</span></span>
          <br>[레스토레이티브]
          <br>수업을 취소하시겠습니까?</p>
      </div>
    </div>
    <div class="confirm_btn">
      <button class="btn_no">CANCEL</button>
      <button class="btn_yes">OK</button>
    </div>
  </div>
  <div class="popup theme:alt_cancel_detail">
    <div class="popup_tit">
      <div class="popup_topic">
        <div class="topic_icon" style="background-color: #d32f2f;">
          <img src="<?php echo base_url(); ?>template/icon/ic_exclamation.png" alt="" width="16" height="16">
        </div>
        <p class="topic_message font-futura" style="font-weight: bold !important;     color: #d32f2f; margin: 0 !important; line-height: 44px;">Ooops!</p>
      </div>
      <p class="popup_guide">예약 취소는 수업 시작 <span>00</span>시간 전까지만 가능합니다.
        <br>센터로 직접 문의 주세요!</p>
    </div>
  </div>
</div>
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

<!--<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>-->
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
    $('#loading_set').show();
    
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
        $("#loading_set").fadeOut(500);
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
  
  $(function(){
  
    // btn_more 클릭 이벤트 기능 수정 요청드립니다.
    $('.btn_more').click(function(){
      var display = $('.card_hide').css('display');
      // console.log(1);
      /* ========= slide 기능 작업 요청 드립니다. ========= */
      /* 4개씩 펼쳐지고 마지막 버튼 클릭시 card_hide 전체가 슬라이드업 되는 기능 부탁드립니다.*/
      if(display == 'none'){
        $(this).text('FOLD');
        $('.card_hide').slideDown();
      }
      else {
        $(this).text('MORE');
        $('.card_hide').slideUp();
      }
    })
  
    // btn_on 클릭 이벤트
    $('.popup-box').hide().children().hide();
    $('.btn_on').click(function(){
      //console.log(1);
      $('.popup-box').show();
      $('div[class*=book]').show();
    })
  
    // btn_off 클릭 이벤트
    $('.popup-box').hide().children().hide();
    $('.btn_off').click(function(){
      $('.popup-box').show();
    
      // 취소가능 시간에 클릭했을 경우
      $('div[class$=_cancel]').show();
    
      // 취소가능 이외 시간에 클릭했을 경우
      $('div[class$=_detail]').show();
    })
  
    // btn_yes 클릭 이벤트
    $('.btn_yes').click(function(){
      $('.popup-box').hide().children().hide();
    })
  
    // btn_no 클릭 이벤트
    $('.btn_no').click(function(){
      $('.popup-box').hide().children().hide();
    })
  
    // cancel_detail 팝업창 닫기
    $('div[class$=_detail]').click(function(){
      $('.popup-box').hide().children().hide();
    })
  
    // popup-box 팝업창 닫기
    $('.popup-box').click(function(){
      $('.popup-box').hide().children().hide();
    })
  })
</script>
