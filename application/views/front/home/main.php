<!-- PAGE -->
<style>
  .main-header {
    text-align: center;
    height: 40px;
  }
  .main-header h6 {
    height: 40px;
    line-height: 40px;
    margin: 0 0 0 0;
    font-size: 13px;
  }
  .main-discovery .main-nav .main-blog {
    padding-left: 15px;
    padding-right: 15px;
  }
  .main-discovery .main-nav div{
    text-align: center;
    width: 32.7% !important;
    display: inline-block;
    color: white;
    margin: 0 0 0 0;
    background-color: #B39E98;
    height: 40px;
    line-height: 40px;
    vertical-align: center;
    padding-left: 0;
    padding-right: 0;
  }
  .main-discovery, .main-fav {
    margin: 0 0 10px 0;
    padding-left: 0;
    padding-right: 0;
  }
  .main-blog-content {
    margin: 0 0 10px 0;
    padding-left: 0;
    padding-right: 0;
    /*background-color: white;*/
    padding-bottom: 10px;
  }
  .blog-img {
    padding-left: 0;
    padding-right: 0;
  }
  .blog-img img {
    min-height: 100%;
    min-width: 100%;
  }
  .blog-title {
    padding-left: 0;
    padding-right: 0;
  }
  .blog-title h5 {
    margin: 10px 0 5px 0;
  }
  .blog-summery {
    font-size: 11px;
    padding-left: 0;
    padding-right: 0;
  }
</style>
<section class="page-section" style="border-top: 1px solid #bdbdbd; padding: 4px 0 32px !important; margin: 0 16px !important;">
  <div class="row">
    <div class="col-md-12 main-discovery">
      <div class="col-md-12 main-header navigation-header" style="text-align: center; margin: 10px 0">
        <h6 class="font-futura" style="height: 20px; line-height: 20px;">Find</h6>
        <p>건강한 시작을 위한 클래스 찾기</p>
      </div>
      <div class="col-md-12 main-nav" style="display: flex">
        <a href="<?php echo base_url().'home/find'; ?>" style="margin:auto;">
          <img class="img-responsive" src="<?php echo base_url(); ?>uploads/icon_0604/find01.png" alt="" />
        </a>
        <a href="<?php echo base_url().'home/find/center/'.CENTER_TYPE_YOGA; ?>" style="margin:auto;">
          <img class="img-responsive" src="<?php echo base_url(); ?>uploads/icon_0604/find02.png" alt="" />
        </a>
        <a href="<?php echo base_url().'home/find/center/'.CENTER_TYPE_PILATES; ?>" style="margin:auto;">
          <img class="img-responsive" src="<?php echo base_url(); ?>uploads/icon_0604/find03.png" alt="" />
        </a>
        <a href="<?php echo base_url().'home/find/class'; ?>" style="margin:auto;">
          <img class="img-responsive" src="<?php echo base_url(); ?>uploads/icon_0604/find04.png" alt="" />
        </a>
      </div>
    </div>
    <div class="col-md-12 main-fav">
      <div class="col-md-12 main-header navigation-header font-futura" style="text-align: center">
        <?php if (empty($bookmark_centers) && empty($bookmark_teachers)) { ?>
          <h6 class="font-futura">Your Favorite</h6>
        <?php } else { ?>
          <h6 class="font-futura">My Favorite</h6>
        <?php } ?>
      </div>
      <div class="col-md-12 main-fav-content">
        <?php include "favorite.php"; ?>
      </div>
    </div>
    <style type="text/css">
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
      .wait_schedule {
        background-color: #f5f5f5;
      }
      .wait_schedule .type_today {
        background-color: #e0e0e0;
      }
      .wait_schedule .type_info,
      .wait_schedule .name_class,
      .wait_schedule .name_center {
        color: #9e9e9e;
      }
      #waitClass {
        position: absolute;
        bottom: 8px;
        right: 9px;
        margin: 0;
        font-size: 11px;
        font-weight: bold;
        color: #d32f2f;
        z-index: 2;
      }
    </style>
    <!-- UPCOMMING CLASS -->
    <? if (count($upcoming_class) > 0) {
      function get_week_str($week) {
        switch($week) {
          case 0 : return 'SUN';
          case 1 : return 'MON';
          case 2 : return 'TUE';
          case 3 : return 'WED';
          case 4 : return 'THU';
          case 5 : return 'FRI';
          case 6 : return 'SAT';
        }
        return '';
      }
      function get_ampm($time) {
        return ($time < '12:00:00' ? 'am' : 'pm');
      }
      function get_time($time) {
        return ($time <= '12:00:00' ? substr($time, 0, 5) : substr(date('H:i:s', strtotime($time) - 12 * ONE_HOUR), 0, 5));
      }
      ?>
      <div class="col-md-12 main-upcoming">
        <div class="upcoming_tit">
          <p class="font-futura tit_txt">Upcoming Class</p>
        </div>
        <div class="upcoming_wrap">
          <? foreach ($upcoming_class as $class) { ?>
            <? if ($class->reserve == 1) { ?>
              <div class="upcoming_schedule">
                <div class="schedule_type">
                  <div class="type_today" style="background-color: #000 !important;">
                    <!-- 요일 축약어는 지금처럼 '세글자'로 부탁드립니다. -->
                    <!-- 일 단위가 한 자릿수이면 '1일' 처럼 표기 부탁드립니다. -->
                    <p class="font-futura today_date">
                      <?= get_week_str($class->schedule_info->week); ?>
                      <br>
                      <span class="date_no">
                        <?= date('j', strtotime($class->schedule_info->schedule_date)); ?>
                      </span>일
                    </p>
                  </div>
                  <p class="type_info">
                    <span class="font-futura day_morning">
                      <?= get_ampm($class->schedule_info->start_time); ?>
                    </span>
                    <span class="font-futura time_start">
                      <?= get_time($class->schedule_info->start_time); ?>
                    </span>
                    <br>~
                    <span class="font-futura day_afternoon">
                      <?= get_ampm($class->schedule_info->end_time); ?>
                    </span>
                    <span class="font-futura time_end">
                      <?= get_time($class->schedule_info->end_time); ?>
                    </span>
                  </p>
                  <div class="type_name">
                    <p class="name_class" style="text-align: right;">
                      <?= $class->schedule_info->schedule_title; ?>
                    </p>
                    <p class="name_center" style="text-align: right;">
                      <?= $class->center_info->title; ?>
                    </p>
                  </div>
                </div>
                <button class="type_cancel" onclick="open_cancel_popup(<?= $class->schedule_info_id; ?>)">
                  <img src="<?= base_url(); ?>template/icon/ic_cancel_v2.png" width="40" height="40">
                </button>
              </div>
            <? } else { ?>
              <div class="upcoming_schedule wait_schedule">
                <div class="schedule_type">
                  <div class="type_today">
                    <p class="font-futura today_date">
                      <?= get_week_str($class->schedule_info->week); ?>
                      <br>
                      <span class="date_no">
                        <?= date('j', strtotime($class->schedule_info->schedule_date)); ?>
                      </span>일
                    </p>
                  </div>
                  <p class="type_info">
                    <span class="font-futura day_morning">
                      <?= get_ampm($class->schedule_info->start_time); ?>
                    </span>
                    <span class="font-futura time_start">
                      <?= get_time($class->schedule_info->start_time); ?>
                    </span>
                    <br>~
                    <span class="font-futura day_afternoon">
                      <?= get_ampm($class->schedule_info->end_time); ?>
                    </span>
                    <span class="font-futura time_end">
                      <?= get_time($class->schedule_info->end_time); ?>
                    </span>
                  </p>
                  <div class="type_name">
                    <p class="name_class" style="text-align: right;">
                      <?= $class->schedule_info->schedule_title; ?>
                    </p>
                    <p class="name_center" style="text-align: right;">
                      <?= $class->center_info->title; ?>
                    </p>
                  </div>
                </div>
                <button class="type_cancel" onclick="open_cancel_popup(<?= $class->schedule_info_id; ?>)">
                  <img src="<?= base_url(); ?>template/icon/ic_cancel_v2.png" width="40" height="40">
                </button>
                <p id="waitClass">대기 <span><?= $class->wait_number; ?></span></p>
              </div>
            <? } ?>
          <? } ?>
        </div>
        <!--      <button class="font-futura btn_more" style="font-weight: bold !important;">MORE</button>-->
      </div>
    <? } ?>
    <!-- /UPCOMMING CLASS -->
    <?php if (count($blogs) > 0) { ?>
      <div class="col-md-12 main-blog" style="padding: 0;">
        <div class="col-md-12 main-header navigation-header" style="text-align: center">
          <h6 class="font-futura">This Week</h6>
        </div>
        <?php foreach ($blogs as $blog) { ?>
          <div class="col-md-12 main-blog-content">
            <div class="col-md-12 blog-img">
              <a href="<?php echo base_url().'home/blog/view?id='.$blog->blog_id; ?>">
                <img class="img-responsive" src="<?php echo $blog->main_image_url; ?>" alt="" />
              </a>
            </div>
            <div class="col-md-12 blog-title">
              <h5><b><?php echo $blog->title; ?></b></h5>
            </div>
            <div class="col-md-12 blog-summery">
              <?php echo $blog->summery; ?>
            </div>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
  </div>
</section>

<!-- popup -->
<style type="text/css">
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
</style>
<div class="popup-box" id="schedule_reserve_popup" style="display: none;">
</div>
<div class="popup-box" id="schedule_cancel_popup" style="display: none;">
</div>
<div class="popup-box" id="schedule_alert_popup" style="display: none;">
  <div class="popup theme:alt_cancel_detail">
    <div class="popup_tit">
      <div class="popup_topic">
        <div class="topic_icon" style="background-color: #d32f2f;">
          <img src="<?= base_url(); ?>template/icon/ic_exclamation.png" alt="" width="16" height="16">
        </div>
        <p class="topic_message font-futura" style="font-weight: bold !important; color: #d32f2f; margin: 0 !important; line-height: 44px;">
          Ooops!
        </p>
      </div>
      <div>
        <p class="popup_guide">
          예약 취소는 수업 시작 00시간 전까지만 가능합니다.
          <br>센터로 직접 문의 주세요!
        </p>
      </div>
      <div class="confirm_btn" style="border-top: 1px solid #eee !important;">
        <button class="btn_yes" style="border:none !important;" onclick="close_alert_popup()">OK</button>
      </div>
    </div>
  </div>
</div>
<div class="popup-box" id="schedule_notify_popup" style="display: none;">
  <div class="popup theme:alt_cancel_detail">
    <div class="popup_tit">
      <div class="popup_topic">
        <div class="topic_icon" style="background-color: #1ba9e4;">
          <img src="<?= base_url(); ?>template/icon/information_white.png" alt="" width="16" height="16">
        </div>
        <p class="topic_message font-futura" style="font-weight: bold !important; color: #1ba9e4; margin: 0 !important; line-height: 44px;">
          SUCCESS!
        </p>
      </div>
      <div>
        <p class="popup_guide">
          예약 취소는 수업 시작 00시간 전까지만 가능합니다.
          <br>센터로 직접 문의 주세요!
        </p>
      </div>
      <div class="confirm_btn" style="border-top: 1px solid #eee !important;">
        <button class="btn_yes" style="border:none !important;" onclick="close_notify_popup()">OK</button>
      </div>
    </div>
  </div>
</div>
