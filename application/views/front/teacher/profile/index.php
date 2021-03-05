<?php
$user_type = USER_TYPE_DEFAULT;
if ($this->session->userdata('user_login') == 'yes') {
  $user_data = json_decode($this->session->userdata('user_data'));
  $user_type = $user_data->user_type;
}
?>
<script src="https://checkout.stripe.com/checkout.js"></script>
<style>
  @media (min-width: 1200px){
    .cus_cont {
      width: 1290px;
    }
  }
  .media-body div p {
    margin: 0 0 5px 0 !important;
  }
  .img-youtube img, .img-insta img {
    width : 25px !important;
    height: 25px !important;
    margin-right: 5px;
  }
  .profile_ul {
    padding: 0 10px 0 10px !important;
    /*border-radius: 0 !important;*/
    box-shadow: none;
    border: none;
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
  #teacher-edit {
    background-color: white;
    height: 40px;
    width: 50px;
    position: absolute;
    left: 78%;
    z-index: 10;
    display: none;
    text-align: center;
  }
  #teacher-edit a {
    color: grey;
    font-size: 12px;
    line-height: 40px;
  }
  .col-md-12 .profile {
    font-size: 15px;
    text-align: center;
    height: 50px;
    line-height: 50px;
    background-color: #F3EFEB;
  }
  .profile ul {
    padding: 0 !important;
  }
  #fd-teacher .container {
    padding: 0;
  }
  #fd-teacher .row {
    margin: 0;
  }
  #fd-teacher [class^="col-"] {
    padding: 0;
  }
  .img-wrap {
    padding-top: 2px;
  }
  .img-wrap a {
    display: block;
    float: left;
    margin-right: 8px;
    width: 20px;
    height: 20px;
    line-height: 20px;
  }
  .img-wrap span {
    display: block;
    width: inherit;
    height: inherit;
    line-height: inherit;
  }
  .img-youtube img, .img-insta img {
    width : inherit!important;
    height: inherit!important;
    margin-right: 0;
    vertical-align: top;
  }
  .img-blog {
    background-color: #F7D47C;
    width: 24px;
    height: 24px;
    line-height: 24px;
    text-align: center;
    border-radius: 50%;
  }
  
  .profile_ul li {
    padding: 0 0 20px !important;
  }
  @media(min-width:375px){
    .video-title {
      font-size: 14px !important;
    }
    .footprint {
      padding-top: 4px !important;
    }
  }
  /*@media(min-width:414px){*/
  /*  .media-link {*/
  /*    width: 207px !important;*/
  /*    padding: 0 0 123px 0 !important;*/
  /*    margin-right: 16px !important;*/
  /*  }*/
  /*}*/
  .content-area {
    background-color: inherit;
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
    /*display: none;*/
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
    position: fixed;
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
    /*border-top: 1px solid #eee !important;*/
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
<div id="teacher-edit">
</div>
<section class="page-section" style="padding-top: 0 !important; padding-bottom: 0 !important; background-color: white" id="fd-teacher">
  <div class="wrap container" id="fd-sch">
      <div class="row profile">
      <div class="col-lg-12 col-md-12" style="padding-left: 0 !important; padding-right: 0 !important;">
        <div id="profile_content">
          <!-- <div class="profile">
            <b class="font-futura">profile</b>
          </div> -->
          <div class="row profile_renewal yourClass">
            <style type="text/css">
              /* profile_renewal 기본 스타일 */
              .upcoming_tit {
                height: 40px;
              }
              .tit_txt {
                height: inherit;
                line-height: 40px;
                text-align: center;
                /*font-weight: bold !important;*/
                font-size: 13px;
                margin: 0;
              }
              .upcoming_schedule {
                padding: 12px 16px;
                background-color: #fff;
                position: relative;
              }
              .type_today {
                display: inline-block;
                width: 44px;
                height: 44px;
                border-radius: 50%;
                background-color: #8F8990;
                position: relative;
                vertical-align: middle;
              }
              .type_today .font-futura {
                font-weight: bold !important;
              }
              .today_date {
                position: absolute;
                top: 50%;
                left: 50%;
                color: #fff;
                font-size: 11px;
                font-weight: bold;
                line-height: 1.2;
                width: 40px;
                text-align: center;
                margin: -14px 0 0 -20px;
              }
              .today_date span {
                display: inline-block;
              }
              .date_no {
                font-size: 13px;
              }
    
              .type_info {
                display: inline-block;
                color: #000;
                font-size: 14px;
                margin: -4px 10px 0;
                vertical-align: middle;
                line-height: 1.3;
              }
              .type_name {
                display: inline-block;
                vertical-align: middle;
                margin-top: -4px;
              }
              .name_class, .name_center {
                margin: 0;
              }
              .name_class {
                color: #757575;
                font-size: 12px;
                padding-bottom: 2px;
              }
              .name_center {
                color: #8C584C;
                font-size: 10px;
                font-weight: bold !important;
              }
    
              .type_cancel {
                position: absolute;
                top: 6px;
                right: 4px;
                width: 40px;
                height: 40px;
                padding: 0;
                background-color: transparent;
                border: 0
              }
    
              .schedule_type {
                font-size: 0;
              }
    
    
              .upcoming_schedule {
                margin-bottom: 12px;
              }
    
              .upcoming_schedule {
                padding: 12px 16px 12px 12px;
              }
              .type_info {
                font-size: 13.5px;
                line-height: 1.5;
                letter-spacing: -0.05em;
                margin: -4px 8px 0;
              }
              .type_name {
                margin: 0;
                position: absolute;
                top: 12px;
                right: 52px;
              }
              .type_today {
                display: inline-block;
                width: 44px;
                height: 44px;
                border-radius: 50%;
                background-color: #8F8990;
                position: relative;
                vertical-align: middle;
              }
    
              /* profile_renewal Recommend 클래스 */
              .yourClass p {
                margin-bottom: 0;
              }
              .yourClass .upcoming_wrap {
                position: relative;
                padding-bottom: 62.5%;
              }
              .yourClass .teacher_thumb {
                position: absolute;
                width: 100%;
                height: 100%;
                background-color: #000;
                overflow: hidden;
              }
              .yourClass .thumb_bg {
                position: absolute;
                z-index: 1;
                width: 100%;
                height: 100%;
                background-color: rgba(0,0,0,0.3);
                border-radius: inherit;
              }
              .yourClass .thumb_photo {
                width: 100%;
                height: 100%;
                background-repeat: no-repeat;
                background-position: center;
                background-size: cover;
                background-attachment: scroll;
                opacity: 0.8;
              }
              .yourClass .upcoming_schedule {
                position: absolute;
                background-color: transparent;
                width: 100%;
                height: 100%;
                padding: 0;
                margin: 0;
                z-index: 3;
              }
              .yourClass .schedule_type {
                display: block;
                position: absolute;
                bottom: 18px;
                left: 16px;
              }
              .yourClass .type_today {
                background-color: #fff !important;
                box-shadow: 0 4px 8px rgb(0 0 0 / 12%);
              }
              .yourClass .today_date {
                color: #111;
              }
              .yourClass .type_info {
                color: #fff;
                text-shadow: 0 4px 8px rgb(0 0 0 / 30%);
              }
              .yourClass .schedule-detail .type_info {
                color: #757575;
              }
              .card_plan .type_info {
                text-shadow: none;
              }
              .yourClass .schedule_class {
                position: absolute;
                bottom: 26px;
                right: 12px;
              }
              .yourClass .schedule_class img {
                float: right;
                margin: 4px 0 0 12px;
              }
              .yourClass .type_name {
                direction: rtl;
                width: auto !important;
              }
              .yourClass .name_class {
                color: #fff;
                padding: 0;
              }
              .yourClass .name_center {
                color: #fff;
              }
              .yourClass .schedule_favorite {
                border: 0;
                outline: none;
                background-color: transparent;
                padding: 0;
                position: absolute;
                top: 18px;
                right: 15px;
              }
              .yourClass .dropShadow {
                -webkit-filter: drop-shadow(2px 2px 2px rgba(0,0,0,0.3));
                -moz-filter: drop-shadow(2px 2px 2px rgba(0,0,0,0.3));
                filter: drop-shadow(2px 2px 2px rgba(0,0,0,0.3));
              }
    
              /* schSns */
              .yourClass .schSns {
                bottom: 15px;
              }
              .schSns a {
                display: inline-block;
                width: 32px;
                height: 32px;
                background-color: #fff;
                border-radius: 50%;
                position: relative;
              }
              .schSns a:first-child {
                margin-right: 6px;
              }
              .yourClass .schSns a img {
                float: unset;
                position: absolute;
                margin: auto;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
              }
  
            </style>
            <div class="upcoming_wrap">
              <div class="teacher_thumb" style="border-radius: 0;">
                <div class="thumb_bg">
                  <? if (isset($teacher_data->profile_image_url) == true && empty($teacher_data->profile_image_url) == false) { ?>
                    <div class="thumb_photo" style="background-image: url(<?= $teacher_data->profile_image_url; ?>)"></div>
                  <? } else { ?>
                    <div class="thumb_photo" style="background-image: url(<?= $this->teacher_model->get_teacher_image_thumb(); ?>)"></div>
                  <? } ?>
                </div>
              </div>
              <div class="upcoming_schedule">
                <div class="schedule_type">
                  <p class="type_info teacher_info">
                    <!-- 최대 10자 -->
                    <?= $teacher_data->name; ?>
                  </p>
                </div>
                <div class="schedule_class schSns">
                  <? if (isset($teacher_data->instagram) == true && empty($teacher_data->instagram) == false) { ?>
                    <a href="<?= $teacher_data->instagram; ?>" class="schSns_insta dropShadow" target="_blank">
                      <img src="<?= base_url(); ?>template/icon/profile_insta.png" width="16" height="16">
                    </a>
                  <? } ?>
                  <? if (isset($teacher_data->youtube) == true && empty($teacher_data->youtube) == false) { ?>
                    <a href="<?= $teacher_data->youtube; ?>" class="schSns_youtube dropShadow" target="_blank">
                      <img src="<?= base_url(); ?>template/icon/profile_youtube.png" width="16" height="11.5">
                    </a>
                  <? } ?>
                </div>
                <?php if ($iam_this_teacher == true) { ?>
<!--                  <a href="javascript:void(0);">-->
<!--                    <span class="teacher-edit" style="color: grey;">-->
<!--                      <img src="--><?php //echo base_url(); ?><!--uploads/icon/dots.png" alt="" style="width: 10px; height: 10px">-->
<!--                    </span>-->
<!--                  </a>-->
                  <button class="post__more">
                    <img src="<?= base_url();?>template/icon/ic_more_horizon.png" width="20" height="5" class="more--icon">
                    <script>
                      $(function(){
                        // console.log(1);
                        $('.post__more').click(function(){
                          $('.post__edit').toggle();
                        })
                      })
                    </script>
                  </button>
                  <div class="post__edit">
                    <button class="edit--modify" onclick="go_edit_profile()">수정</button>
<!--                    <button class="edit--remove" onclick="open_del_video()">삭제</button>-->
                  </div>
                  <style type="text/css">
                    .more-icon, .edit--modify, .edit--remove{
                      outline: none;
                      border: 0;
                      background: transparent;
                      padding: 0;
                    }
                    .post__more {
                      background: transparent;
                      padding: 0;
                      position: absolute;
                      width: 40px;
                      height: 40px;
                      margin-top: -8px;
                      right: 16px;
                      top: 20px;
                      text-align: right;
                      border : none;
                    }
                    .more--icon {
                      opacity: 0.3;
                    }
                    .post__edit {
                      display: none;
                      position: absolute;
                      top: 48px;
                      right: 15px;
                      height: 28px;
                    }
                    .post__edit button {
                      position: relative;
                      width: 40px;
                      height: 24px;
                      background-color: #333;
                      color: #fff;
                      font-size: 11px;
                      font-weight: bold;
                      box-sizing: border-box;
                      border-radius: 4px;
                    }
                  </style>
                <?php } else {?>
                  <button class="schedule_favorite">
                    <?php echo $this->crud_model->sns_func_html('bookmark', 'teacher', $bookmarked, $teacher_data->teacher_id, 24, 24); ?>
                  </button>
                <?php } ?>
              </div>
            </div>
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <div class="profile">
                    <b class="font-futura">about</b>
                  </div>
                  <div class="widget">
                    <ul class="profile_ul" style="text-align: center">
                      <li style="padding: 12px 0 !important;"><?php echo $teacher_data->about?>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- 센터 프로필에 있는 schedule 넣어주세요 -->
            <? if ((STUDIO_OPEN == true || ($user_type & USER_TYPE_ADMIN) || $iam_this_teacher == true) && isset($studio_data) == true) { ?>
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
                            $slide = (int)(((int) (strtotime($sdate) - $current) / ONE_DAY) / 7) * 7;
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
                      <div class="col-md-12 widget schedule-detail" style="margin-top: 16px; padding: 0; border-top: 1px solid #eee;">
                        <!--  ajax schedule  -->
                        <!--  /ajax schedule  -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <? if ((($user_type & USER_TYPE_ADMIN) || $iam_this_teacher == true) && isset($studio_data->info) == true && empty($studio_data->info) == false) {?>
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
                            </td>
                          </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="col-md-12" style="padding: 20px 0px !important; border: none;">
                        <div class="recent-post" style="background: #fff;/* border: 1px solid #e0e0e0; */">
                          <div class="media">
                            <div>
                              <?php echo $studio_data->info; ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <? } ?>
            <? } ?>
            <!-- 센터 프로필에 있는 schedule(시간표) 과 수업시간표를 여기에도 적용할 수 있을까요.? 제가 적용하려니 스타일이 꼬여서요 ;; -->
            <?php if ($iam_this_teacher && empty($video_data)) { ?>
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-12">
                    <div class="profile">
                      <b class="font-futura">free-class</b>
                    </div>
                    <div class="widget" style="padding: 20px 16px;">
                      <ul class="profile_ul" style="text-align: center;background-color: black;">
                        <a class="pnav_add_video" href="<?php echo base_url()."home/teacher/video/add/{$user_data->user_id}"; ?>">
                          <li style="color: white; line-height: 40px; padding: 0 !important;"><b>+</b>&nbsp;&nbsp;클래스 올리기</li>
                        </a>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            <?php }
            if (!empty($video_data)) {
              ?>
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-12">
                    <div class="profile">
                      <b class="font-futura">class</b>
                    </div>
                    <?php if ($iam_this_teacher) { ?>
                      <div class="widget" style="padding: 20px 16px;">
                        <ul class="profile_ul" style="text-align: center;background-color: black;">
                          <a class="pnav_add_video" href="<?php echo base_url()."home/teacher/video/add/{$user_data->user_id}"; ?>">
                            <li style="color: white; line-height: 40px; padding: 0 !important;"><b>+</b>&nbsp;&nbsp;클래스 올리기</li>
                          </a>
                        </ul>
                      </div>
                    <?php } ?>
                    <div class="widget" style="overflow: hidden; height: auto; padding-top: 20px;">
                      <style type="text/css">
                        #free-youtube .youtube__a {
                          display: block;
                        }
                        #free-youtube .media {
                          padding: 0 16px !important;
                        }
                        #free-youtube .media-link {
                          width: 100%;
                          padding: 0 0 56.25% 0;
                          position: relative;
                          margin-right: 4%;
                        }
                        #free-youtube .media-link img {
                          position: absolute;
                          width: 100%;
                          height: 100%;
                          /* max-width: 207px; */
                          /* max-height: 123px; */
                        }
                        #free-youtube .media-body {
                          width: 46%;
                          padding: 0;
                        }
                        #free-youtube .video-title {
                          margin: 12px 0 2px;
                          line-height: 1.5;
                          font-size: 14px;
                          font-weight: bold !important;
                        }
                        #free-youtube .classType {
                          color: saddlebrown;
                          display:block;
                          font-size: 12px;
                          line-height: 1.5;
                        }
                        #free-youtube .footprint {
                          color: gray;
                          display: block;
                          color: #bdbdbd;
                          font-size: 10px;
                          font-weight: bold !important;
                          line-height: 1.5 !important;
                          padding-top: 8px;
                          letter-spacing: 0.08em;
                        }
                      </style>
                      <ul class="profile_ul" id="free-youtube" style="overflow: inherit;">
                        <?php foreach ($video_data as $video) {
                          $cat = '';
                          $categories = $this->db->get_where('teacher_video_category', array('video_id' => $video->video_id))->result();
                          foreach($categories as $category) {
                            $cat .= $category->category . '/';
                          }
                          $cat[strlen($cat) - 1] = "\0";
                          ?>
                          <li>
                            <a href="<?php echo base_url(); ?>home/teacher/video/view/<?php echo $video->video_id; ?>">
                              <div class="col-md-12 media">
                                <div class="col-md-6 pull-left media-link">
                                  <img src="<?php echo $video->thumbnail_image_url; ?>" width="180" height="120" alt="">
                                </div>
                                <div class="col-md-6 media-body">
                                  <h5 class="video-title"><?php echo $video->title; ?></h5>
                                  <span class="classType"><?php echo $cat; ?></span>
                                  <span class="footprint"> <?php echo (int)($video->playtime/60).'분'; printf("%02d",$video->playtime%60);?>초&middot;조회수<?php echo $video->view;?>&middot;스크랩<?php echo $video->bookmark;?></span>
                                </div>
                              </div>
                            </a>
                          </li>
                        <?php } ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <?php
            }
            ?>
          </div>
        </div>
      </div>
      </div>
  </div>
</section>

<style type="text/css">
  .pagination_box a{
    cursor: pointer;
  }
  .pleft_nav li.active {
    background-color: #ebebeb!important;
  }
</style>
<script type="text/javascript">
  function abnv(thiss){
    $('#savepic').hide();
    $('#inppic').hide();
    $('#'+thiss).show();
  }
  function change_state(va){
    $('#state').val(va);
  }
  
  $('.user-profile-img').on('mouseenter',function(){
    //$('.pic_changer').show('fast');
  });
  
  //$('.set_image').on('click',function(){
  //    $('#imgInp').click();
  //});
  
  $('.user-profile-img').on('mouseleave',function(){
    if($('#state').val() == 'normal'){
      //$('.pic_changer').hide('fast');
    }
  });
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      
      reader.onload = function(e) {
        $('#blah').css('backgroundImage', "url('"+e.target.result+"')");
        $('#blah').css('backgroundSize', "cover");
      }
      reader.readAsDataURL(input.files[0]);
      abnv('savepic');
      change_state('saving');
    }
  }
  
  $("#imgInp").change(function() {
    readURL(this);
  });
  
  
  function openPop(elem) {
    if ($('#teacher-edit').css('display') === 'none') {
      // var divTop = e.pageY; //상단 좌표 위치 안맞을시 e.pageY
      // var divLeft = e.pageX; //좌측 좌표 위치 안맞을시 e.pageX
      var divTop = elem.offset().top;
      var divLeft = elem.offset().left - 60; // posY - width - 10(padding)
      
      var base_url = '<?php echo base_url(); ?>';
      var href = base_url + 'home/teacher/edit_profile/<?php echo $teacher_data->teacher_id; ?>';
      var text = '수정';
      
      $('#teacher-edit').empty().append('<a href="' + href + '">' + text + '</a>');
      $('#teacher-edit').css({
        "top": divTop ,
        "left": divLeft,
        "position": "absolute"
      }).show();
    } else {
      $('#teacher-edit').hide();
    }
  }
  
  function go_edit_profile() {
    location.href = '<?= base_url().'home/teacher/edit_profile/'.$teacher_data->teacher_id; ?>';
  }
  
  window.addEventListener("keydown", checkKeyPressed, false);
  
  function checkKeyPressed(e) {
    if (e.keyCode == "13") {
      $(":focus").closest('form').find('.page-section').click();
    }
  }
  
  $(document).ready(function() {
    $('html').animate({scrollTop:$('html, body').offset().top}, 100);
    $('.teacher-edit').click(function(e) {
      openPop($(this));
    });
  });
</script>
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

<?php if ((STUDIO_OPEN == true || ($user_type & USER_TYPE_ADMIN) || $iam_this_teacher == true) && isset($studio_data) == true) { ?>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
  
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
  <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script type="text/javascript">
    var month = [<?php foreach ($months as $m) {echo '"'.$this->crud_model->get_month($m).'",';} ?>];
    
    function get_month_str(m) {
      var monthArr = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
      return monthArr[m];
    }
    
    function get_schedule_content(date, popid = 0) {
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
        url: "<?php echo base_url().'home/studio/schedule/info?sid='.$studio_data->studio_id.'&date='; ?>" + date,
        type: 'GET', // form submit method get/post
        dataType: 'html', // request type html/json/xml
        success: function(data) {
          $("#loading_set").fadeOut(500);
          // alert(data);
          // $('.schedule-detail table').remove();
          $('.schedule-detail').html(data);
          if (popid > 0) {
            open_wait_popup(popid);
          }
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
        initialSlide: <?= $slide; ?>,
      });
      
      get_schedule_content('<?= $sdate; ?>', <?= $popid; ?>);
      
    });
  </script>
<?php } ?>
<!-- popup -->
<style type="text/css">
  #txt_select, #txt_select2 {
    position: relative;
  }
  .popup_topic {
    width: 222px;
    margin: 0 auto;
    text-align: left;
  }
  .popup_guide {
    margin-top: 16px !important;
  }
  .topic_icon {
    text-align: center;
  }
  .topic_message {
    font-size: 13px;
  }
  .theme\:book {
    height: 268px;
    margin-top: -134px;
  }
  .theme\:wait {
    height: 288px;
    margin-top: -144px;
  }
  #choice, #choice2 {
    display: block;
    position: relative;
    height: 32px;
    line-height: 32px;
    width: 220px;
    margin: 16px auto 0;
  }
  #choice select, #choice2 select {
    position: absolute;
    left: 0;
    width: 100%;
    height: inherit;
    line-height: inherit;
    padding: 0 10px;
    color: #616161;
    font-size: 11.5px;
    font-weight: bold;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
  #choice select {
    color: #B0957A;
    border: 1px solid #B0957A;
  }
  #choice2 select {
    color: #f9a825;
    border: 1px solid #f9a825;
  }
  #booking {
    height: 302px;
    margin-top: -151px;
  }
  #canceling {
    height: 220px;
    margin-top: -110px;
  }
  #canceling .popup_topic,
  #booking .popup_topic {
    text-align: center;
  }
  .favorite_close {
    width: 44px;
    height: 44px;
    position: absolute;
    top: 0;
    right: 0;
    border: 0;
    padding: 0;
    background-color: transparent;
  }
</style>

<!-- popup for studio -->
<style type="text/css">
  .popup-box {
    /*display: none;*/
    background-color: rgba(0,0,0,0.3);
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 20;
  }
  div[class*='theme'] {
    font-size: 0;
    background-color: #fff;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    border-radius: 4px;
    z-index: 11;
    width: 268px;
    position: fixed;
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
    /*border-top: 1px solid #eee !important;*/
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
  #txt_select, #txt_select2 {
    position: relative;
  }
  .popup_topic {
    width: 222px;
    margin: 0 auto;
    text-align: left;
  }
  .popup_guide {
    margin-top: 16px !important;
  }
  .topic_icon {
    text-align: center;
  }
  .topic_message {
    font-size: 13px;
    margin: 0 !important;
  }
  .theme\:book {
    height: 268px;
    margin-top: -134px;
  }
  .theme\:wait {
    height: 288px;
    margin-top: -144px;
  }
  #choice, #choice2 {
    display: block;
    position: relative;
    height: 32px;
    line-height: 32px;
    width: 220px;
    margin: 16px auto 0;
  }
  #choice select, #choice2 select {
    position: absolute;
    left: 0;
    width: 100%;
    height: inherit;
    line-height: inherit;
    padding: 0 10px;
    color: #616161;
    font-size: 11.5px;
    font-weight: bold;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
  #choice select {
    color: #B0957A;
    border: 1px solid #B0957A;
  }
  #choice2 select {
    color: #f9a825;
    border: 1px solid #f9a825;
  }
  
  #booking {
    height: 302px;
    margin-top: -151px;
  }
  #canceling {
    height: 220px;
    margin-top: -110px;
  }
  #canceling .popup_topic,
  #booking .popup_topic,
  #online .popup_topic {
    text-align: center;
  }
  
  #online {
    height: 460px;
    margin-top: -230px;
  }
  
  .online_box {
    width: 228px;
    height: 96px;
    margin: 16px auto 0;
    position: relative;
    border: 1px solid #B0957A;
    border-radius: 0 12px 0 12px;
    box-sizing: border-box;
  }
  .online_price {
    color: #B0957A;
    font-size: 16px;
    position: absolute;
    width: 100%;
    height: 34px;
    line-height: 34px;
    margin: auto !important;
    left: 0;
    right: 0;
    top: 14px;
  }
  #price {
    font-size: 24px;
    font-weight: bold !important;
  }
  .online_talk {
    position: absolute;
    bottom: 8px;
    color: #9e9e9e;
    font-size: 10px;
    text-align: center;
    width: 83%;
    word-break: keep-all;
    margin: auto !important;
    left: 0;
    right: 0;
    bottom: 22px;
    font-weight: bold;
    line-height: 1.75;
  }
  
  .online_data {
    margin: 20px auto 0;
    width: 228px;
  }
  #online .clearfix::after {
    content: "";
    display: block;
    clear: both;
  }
  .data_name, .user_info {
    margin-bottom: 8px;
  }
  .data_name {
    float: left;
    width: 72px;
    color: #616161;
    font-size: 12px;
    font-weight: bold;
    height: 32px;
    line-height: 32px;
    text-align: left;
    padding-left: 4px;
  }
  .user_info {
    box-sizing: border-box;
    padding-left: 72px;
    height: 32px;
    line-height: 32px;
    border-radius: 4px;
  }
  .info_box {
    background-color: #fcfafa;
    box-sizing: border-box;
    border: 0;
    width: 100%;
    height: inherit;
    line-height: inherit;
    padding: 0 10px;
    color: #9e9e9e;
    font-size: 12px;
    font-weight: normal;
    border-radius: inherit;
  }
  
  .announce {
    width: 228px;
    margin: 20px auto;
  }
  .announce_tit {
    height: 36px;
    line-height: 36px;
    color: #fff;
    font-size: 12px;
    font-weight: bold;
    letter-spacing: -0.03em;
    background-color: #B0957A;
    border-radius: 4px 4px 0 0;
  }
  .announce_cnt {
    color: #757575;
    font-size: 12px;
    font-weight: normal;
    line-height: 1.75;
    box-sizing: border-box;
    padding: 12px;
    /*height: 152px;*/
    height: auto;
    width: 228px;
    margin: 0 auto;
    text-align: left;
    word-break: break-all;
    border: 1px solid #eee;
    border-radius: 0 0 4px 4px;
  }
  #online .popup_guide {
    text-align: left;
    width: 228px;
    margin: 20px auto 0 !important;
    padding-top: 16px;
    border-top: 1px dashed #eee;
  }
  .online_pop {
    position: relative;
    height: inherit;
    overflow-y: scroll;
  }
  
  .favorite_close {
    width: 44px;
    height: 44px;
    position: absolute;
    top: 0;
    right: 0;
    border: 0;
    padding: 0;
    background-color: transparent;
  }
  
  /* popup 스타일 수정 및 줌 관련 팝업 */
  div[class*=':book'],
  div[class*='alt_cancel'] {
    font-size: 0;
    background-color: #fff;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    border-radius: 4px;
    z-index: 11;
    width: 268px;
    position: fixed;
    left: 50%;
    top: 50%;
    margin-left: -134px;
    text-align: center;
  }
  .zoom\:wrap .popup_tit {
    width: 216px;
    margin: 0 auto;
  }
  .zoom\:wrap .topic_icon {
    display: block;
    margin: 0 auto;
  }
  .zoom\:wrap .topic_message {
    font-size: 16px;
    text-align: center;
    font-weight: bold !important;
    color: #2D8CFF;
    margin: 8px 0 0 !important;
  }
  .zoom\:wrap .popup_topic {
    width: 100%;
  }
  .zoom\:wrap .popup_guide  {
    color: #2d8cff;
    font-size: 13.5px;
    font-weight: bold;
    width: 100%;
    margin: 0 auto 20px;
  }
  .zoom\:wrap .popup_detail {
    word-break: keep-all;
    color: #9e9e9e;
    font-size: 11px;
    font-weight: normal;
    line-height: 1.75;
    margin: 0;
  }
  .zoom\:wrap .query_studio {
    border: 0;
    padding: 0;
    background-color: #edecf9;
    color: #616161;
    font-size: 12px;
    font-weight: bold;
    width: 100%;
    height: 36px;
    line-height: 36px;
    border-radius: 4px;
  }
  .zoom\:wrap .zoom_link {
    display: block;
    padding: 0;
    margin: 16px auto 20px;
    background-color: #005ac6;
    color: #fff;
    font-size: 14px;
    font-weight: bold;
    height: 48px;
    line-height: 48px;
    border-radius: 4px;
  }
  .zoom\:wait {
    position: relative;
  }
  .zoom\:wait .popup_detail {
    padding: 0;
    border: 0;
    margin: 0;
  }
  
  .zoom\:wrap .copy-linkBtn {
    background-color: #fff;
    margin-top: 20px;
    margin-bottom: 20px;
    border-bottom: 1px dashed #eee;
    position: relative;
    box-sizing: border-box;
    border: 1px solid #2D8CFF;
  }
  .linkIcon {
    display: block;
    width: 23px;
    height: 23px;
    background-color: #2D8CFF;
    border-radius: 50%;
    position: absolute;
    top: 5.5px;
    right: 6px;
  }
  .copy-txt {
    text-align: center;
    width: 92%;
    position: relative;
    color: #2D8CFF;
  }
  .linkIcon img {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
  }
  
  .changeCancel {
    margin: 12px auto 0 !important;
    width: 80%;
    color: #d32f2f;
    word-break: keep-all;
    font-size: 10px;
    font-weight: normal;
  }
  
  .stripe {
    display: block;
    border-top: 1px dashed #eee;
    margin: 0 0 20px;
  }
  .popup_border {
    border-top: 1px dashed #eee;
    margin: 20px 0;
  }
</style>
<style type="text/css">
  #online_url {
    /*height: 648px;*/
    height: auto;
    margin-top: -324px;
  }
  #online_url .online_pop {
    overflow-y: auto;
  }
  #online_url .clearfix::after {
    content: "";
    display: block;
    clear: both;
  }
  #online_url .popup_guide {
    text-align: left;
    width: 228px;
    margin: 20px auto 0 !important;
    padding-top: 16px;
    border-top: 1px dashed #eee;
  }
  #online_url .popup_topic {
    text-align: center;
  }
  #online_url .announce {
    margin: 32px auto 20px;
  }
  .url_price {
    top: 0;
    bottom: 0;
  }
  .url_data {
    /* padding: 8px 0 0; */
    /* border-top: 1px dashed #B0957A; */
    margin: 20px auto 0;
  }
  .url_name {
    width: 100%;
    margin-bottom: 0px;
    padding: 0;
    text-align: center;
    float: unset;
  }
  .url_info {
    padding: 0;
    width: 100%;
  }
  .url_box {
    width: 100%;
    text-align: center;
  }
  .pay_info {
    padding: 0;
    height: 40px;
  }
  .pay_page {
    display: block;
    box-sizing: border-box;
    border-radius: inherit;
    background: #0091ea;
    color: #fff;
    font-size: 13px;
    font-weight: bold;
    line-height: 40px;
    height: 40px;
    width: 100%;
    outline: none;
    padding: 0;
  }
  .pay_page:hover {
    color: #fff;
  }
  
  .popup-box {
    overflow-y: scroll;
    z-index: 200;
  }
  .online_payAlert {
    width: 228px;
    margin: 0 auto !important;
    color: #d32f2f;
    font-size: 11px;
    font-weight: normal;
    line-height: 1.75;
  }
</style>

<!-- 온라인 '티켓팅 확정' 클릭 팝업(ZOOM 링크 생성 전) -->
<div class="popup-box" id="confirmed_notlinked" style="display: none;">
</div>

<!-- 온라인 '티켓팅 확정' 클릭 팝업(ZOOM 링크 생성 후) -->
<div class="popup-box" id="confirmed_linked" style="display: none;">
</div>

<!-- 온라인 '입금 대기 상태' 클릭 팝업 -->
<div class="popup-box" id="wait-money" style="display: none;">
</div>

<div class="popup-box" id="schedule_reserve_url" style="display: none;">
</div>

<!-- 온라인 스튜디오에서만 예약 완료시 팝업을 아래 스타일로 적용해주세요 -->
<div class="popup-box" id="schedule_notify_ticket_online" style="display: none;">
</div>

<div class="popup-box" id="schedule_alert_popup" style="display: none;">
  <div class="popup theme:alt_cancel_detail" style="height: 200px; margin-top: -100px;">
    <div class="popup_tit">
      <div class="popup_topic" style="text-align: center;">
        <div class="topic_icon" style="background-color: #d32f2f;">
          <img src="<?= base_url(); ?>template/icon/ic_exclamation.png" alt="" width="16" height="16">
        </div>
        <p class="topic_message font-futura" style="font-weight: bold !important; color: #d32f2f; margin: 0 !important; line-height: 44px;">
          Ooops!
        </p>
      </div>
      <div>
        <p class="popup_guide" style="letter-spacing: -0.03em;">
          예약 취소는 수업 시작 00시간 전까지만 가능합니다.
          <br>센터로 직접 문의 주세요!
        </p>
      </div>
      <div class="confirm_btn" style="border-top: 1px solid #eee !important; box-sizing: content-box;">
<!--        <button class="btn_cancel font-futura">CANCEL</button>-->
        <button class="btn_yes" style="border:none !important;" onclick="close_alert_popup()">OK</button>
      </div>
    </div>
  </div>
</div>
<div class="popup-box" id="schedule_notify_popup" style="display: none;">
  <div class="popup theme:alt_cancel_detail" style="height: 200px; margin-top: -100px;">
    <div class="popup_tit">
      <div class="popup_topic" style="text-align: center;">
        <div class="topic_icon" style="background-color: #1ba9e4;">
          <img src="<?= base_url(); ?>template/icon/information_white.png" alt="" width="16" height="16">
        </div>
        <p class="topic_message font-futura" style="font-weight: bold !important; color: #1ba9e4; margin: 0 !important; line-height: 44px;">
          SUCCESS!
        </p>
      </div>
      <div>
        <p class="popup_guide" style="letter-spacing: -0.03em;">
          예약 취소는 수업 시작 00시간 전까지만 가능합니다.
          <br>센터로 직접 문의 주세요!
        </p>
      </div>
      <div class="confirm_btn" style="border-top: 1px solid #eee !important; box-sizing: content-box;">
<!--        <button class="btn_cancel font-futura">CANCEL</button>-->
        <button class="btn_yes" style="border:none !important;" onclick="close_notify_popup()">OK</button>
      </div>
    </div>
  </div>
</div>
<!-- 즐겨찾기 되지 않은 센터의 수업을 예약 (회원권은 부여되었는데 회원이 즐겨찾기를 누르지 않은경우) -->
<!--<div class="popup-box" id="schedule_favorite_popup" style="display: none;">-->
<!--  <div class="popup theme:alt_cancel_detail" style="height: 264px; margin-top: -132px;">-->
<!--    <div class="popup_tit">-->
<!--      <button class="favorite_close" onclick="close_schedule_favorite_popup();">-->
<!--        <img src="--><?//= base_url(); ?><!--template/back/center/imgs/icon_close_black.png" alt="" width="12" height="12" style="opacity: 0.5;">-->
<!--      </button>-->
<!--      <div class="popup_topic" style="text-align: center;">-->
<!--        <div class="topic_icon" style="background-color: #1ba9e4; margin: 0;">-->
<!--          <img src="--><?//= base_url(); ?><!--template/icon/information_white.png" alt="" width="16" height="16">-->
<!--        </div>-->
<!--        <p class="topic_message font-futura" style="font-weight: bold !important; color: #1ba9e4; margin: 16px 0 0 !important; line-height: 44px; word-break: keep-all; line-height: 1.75; text-align: center;">-->
<!--          My Favorite 에 <strong id="schedule_favorite_val">--><?//= $center_data->title; ?><!--</strong> 센터를 추가하시겠습니까?-->
<!--        </p>-->
<!--      </div>-->
<!--      <div>-->
<!--        <p class="popup_guide" style="letter-spacing: -0.05em; width: 226px; margin: 0 auto;">-->
<!--          <strong id="center-val">--><?//= $center_data->title; ?><!--</strong> 센터의 스케줄 / 예약 및 관련 소식을 카카오톡과 문자로 받아보실 수 있습니다.</p>-->
<!--      </div>-->
<!--    </div>-->
<!--    <div class="confirm_btn">-->
<!--      <button class="btn_no" onclick="close_schedule_favorite_popup()">CANCEL</button>-->
<!--      <button class="btn_yes" data-action="do" onclick="set_bookmark($(this))">OK</button>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->
<script>
  let close_schedule_favorite_action = '';
  let close_schedule_favorite_redirect = '<?= base_url(); ?>';
  function close_schedule_favorite_popup() {
    $('#schedule_favorite_popup').hide();
    $('body').css('overflow-y', 'auto');
    if (close_schedule_favorite_action === 'reload') {
      setTimeout(function() {window.location.reload(); }, 300);
    } else if (close_schedule_favorite_action === 'redirect') {
      setTimeout(function() {window.location.href = close_schedule_favorite_redirect; }, 300);
    }
  }
  function open_schedule_favorite_popup() {
    $('#schedule_favorite_popup').show();
    $('body').css('overflow-y', 'hidden');
  }
  function set_bookmark(e) {
    close_schedule_favorite_action = '';
    close_schedule_favorite_redirect = '<?= base_url(); ?>';
    close_schedule_favorite_popup();
    sns_function('bookmark', 'teacher', <?= $teacher_data->teacher_id; ?>, e);
  }
  $(function() {
    reserve_schedule_bookmark = <?= $bookmarked ? 'true' : 'false'; ?>;
  })
</script>
<script>
  function open_wait_popup(id) {
    $('#loading_set').show();
    let formData = new FormData();
    formData.append('id', id);
    $.ajax({
      url: "<?php echo base_url().'home/studio/schedule/reserve/wait'; ?>",
      type: 'POST', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function(data) {
        $("#loading_set").fadeOut(500);
        if(IsJsonString(data) === true) {
          open_alert_popup(JSON.parse(data).message);
        } else {
          $('#wait-money').html(data);
          $('#wait-money').show();
          $('body').css('overflow-y', 'hidden');
        }
      },
      error: function(e) {
        console.log(e);
        alert(e);
      }
    });
  }
  function close_wait_popup() {
    $('#wait-money').hide();
    $('body').css('overflow-y', 'auto');
  }
  function open_notify_popup_online(id, redirect) {
    $('#loading_set').show();
    let formData = new FormData();
    formData.append('id', id);
    formData.append('redirect', redirect);
    $.ajax({
      url: "<?php echo base_url().'home/studio/schedule/reserve/final'; ?>",
      type: 'POST', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function(data) {
        $("#loading_set").fadeOut(500);
        if(IsJsonString(data) === true) {
          open_alert_popup(JSON.parse(data).message);
        } else {
          $('#schedule_notify_ticket_online').html(data);
          $('#schedule_notify_ticket_online').show();
          $('body').css('overflow-y', 'hidden');
        }
      },
      error: function(e) {
        console.log(e);
        alert(e);
      }
    });
  }
  function close_notify_popup_online(redirect) {
    $('#schedule_notify_ticket_online').hide();
    $('body').css('overflow-y', 'auto');
    if (redirect !== '') {
      setTimeout(function(){location.href = redirect;}, 500);
    }
  }
  function open_reserve_popup_online(id) {
    $('#loading_set').show();
    let formData = new FormData();
    formData.append('id', id);
    $.ajax({
      url: "<?php echo base_url().'home/studio/schedule/reserve/info'; ?>",
      type: 'POST', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function(data) {
        $("#loading_set").fadeOut(500);
        if(IsJsonString(data) === true) {
          open_alert_popup(JSON.parse(data).message);
        } else {
          $('#schedule_reserve_url').html(data);
          $('#schedule_reserve_url').show();
          $('body').css('overflow-y', 'hidden');
        }
      },
      error: function(e) {
        console.log(e);
        alert(e);
      }
    });
  }
  function close_reserve_popup_online() {
    $('#schedule_reserve_url').hide();
    $('body').css('overflow-y', 'auto');
  }
  var reserve_schedule_bookmark = true;
  function reserve_schedule_online(id, redirect) {
    let payer_info = $('#payer_info').val();
    
    console.log(payer_info);
    
    if (payer_info === '') {
      alert('결제자 정보를 정확히 입력해주세요!');
      return false;
    }
    
    let formData = new FormData();
    formData.append('id', id);
    formData.append('payer_info', payer_info);
  
    $('#loading_set').show();
    
    $.ajax({
      url: "<?php echo base_url().'home/studio/schedule/reserve/do'; ?>",
      type: 'POST', // form submit method get/post
      dataType: 'json', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function(data) {
        // console.log(data);
        $("#loading_set").delay(500).fadeOut(500);
        close_reserve_popup_online();
        if(data.status === 'done') {
        //   if (reserve_schedule_bookmark === false) {
        //     close_notify_action = 'bookmark_center';
        //     close_star_favorite_action = 'redirect';
        //     close_star_favorite_redirect = redirect;
        //     close_schedule_favorite_action = 'redirect';
        //     close_schedule_favorite_redirect = redirect;
        //   } else {
        //     close_notify_action = 'redirect';
        //     close_notify_redirect = redirect;
        //   }
          open_notify_popup_online(id, redirect);
        } else {
          open_alert_popup(data.message);
        }
      },
      error: function(e) {
        console.log(e)
      }
    });
  }
</script>
<script>
  
  function move(id) {
    try {
      var offset = $('#' + id).offset();
      offset.top = offset.top - 85;
      $('html, body').animate({scrollTop : offset.top}, 100);
    } catch(e) {
      return;
    }
  }
  $(document).ready(function() {
    <?php
    if (!empty($nav) && strlen($nav) > 0) {
      echo "move('{$nav}');";
    } else {
      echo "$('html').animate({scrollTop:$('html, body').offset().top}, 100);";
    }
    ?>
  
    active_menu_bar('find');
  });
</script>
