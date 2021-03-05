<?php if (count($upcoming_class) > 0 || count($upcoming_class2) > 0) { ?>
  <?php
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
      bottom: 10px;
      right: 9px;
      margin: 0;
      font-size: 10.5px;
      font-weight: bold;
      color: #d32f2f;
      z-index: 2;
    }
    .coming .upcoming_schedule {
      display: table;
      width: 100%;
      height: 80px;
      padding: 0 12px;
    }
    .coming .schedule_type {
      padding-right: 32px;
      display: table-cell;
      vertical-align: middle;
    }
    .coming .type_info {
      line-height: 1.5;
      font-size: 12.5px;
      margin: -4px 0 0 6px;
      letter-spacing: -0.06em;
    }
    .coming .type_name {
      position: unset;
      float: right;
      line-height: 1.5;
      width: 54%;
      margin-top: -1px;
    }
    .coming .type_cancel {
      margin: auto;
      top: -16px;
      bottom: 0;
      right: 2px;
    }
    .coming .name_class {
      text-align: right;
      padding: 1px 0 2px;
      font-size: 10.3px;
      line-height: 1.85;
      letter-spacing: -0.05em;
    }
    .coming .name_center {
      text-align: right;
    }
    .up {
      border-radius: 4px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.08);
    }
    .up .upcoming_schedule {
      margin: 0;
      border-bottom: 1px solid #eee;
    }
    .up .upcoming_schedule:first-child {
      border-radius: 4px 4px 0 0;
    }
    .up .upcoming_schedule:last-child {
      border-radius: 0 0 4px 4px;
      border: 0;
    }
    
    .coming .upcoming_tit {
      position: relative;
    }
    .coming .tit_txt {
      margin: 0;
    }
    .coming .tit_seeAll {
      display: block;
      position: absolute;
      top: 0;
      right: 0;
      width: 54px;
      height: 40px;
      color: #9e9e9e;
      font-size: 12px;
      font-weight: 700;
      line-height: 40px;
      font-family: futura-pt !important;
    }
    .coming-tit--detail {
      display: block;
      float: left;
      width: 33.33%;
      text-align: center;
      cursor: pointer;
      color: #9e9e9e;
      font-size: 15px;
      font-weight: normal;
      height: 40px;
      line-height: 40px;
      font-family: futura-pt !important;
    }
    .coming-tit--wrap {
      width: 164px;
      position: relative;
      margin: auto;
      left: 0;
      right: 0;
    }
    .tit-divide {
      width: 1px;
      height: 16px ;
      margin: 10px 0;
      background-color: #bdbdbd;
    }
    .tit-seeAll {
      position: absolute;
      float: unset;
      width: auto !important;
      top: 0;
      right: 15px;
      font-size: 13px;
    }
  </style>
  <div class="main-shop__tit">
    <div style="margin: 0; padding: 0 15px; position: relative;">
      <div class="coming-tit--wrap clearfix">
        <div class="coming-tit--detail" style="cursor: default;width: auto;">Upcoming</div>
        <div class="coming-tit--detail titActive" id="coming-tit-class" data-id="class" style="width: 32% !important;margin-left: -4px;">Class</div>
        <div class="coming-tit--detail tit-divide"></div>
        <div class="coming-tit--detail" id="coming-tit-zoom" data-id="zoom" style="width: 32% !important;">Zoom</div>
      </div>
      <div class="coming-tit--detail tit-seeAll">
        <a class="font-futura" href="<?= base_url(); ?>home/upcoming" style="opacity: 0.5;">See All</a>
      </div>
    </div>
  </div>
  <script>
    $(function(){
      $('#coming-tit-class, #coming-tit-zoom').click(function() {
        let id =$(this).data('id');
        // console.log(id);
        $('.coming-tit--detail').removeClass('titActive');
        $(this).addClass('titActive');
        $('.main-upcoming').hide();
        $('#upcoming-'+id).show();
      });
      <? if (count($upcoming_class) > 0) { ?>
      $('#coming-tit-class').click();
      <? } else { ?>
      $('#coming-tit-zoom').click();
      <? } ?>
    })
  </script>
<?php } ?>
<? if (count($upcoming_class) > 0) { ?>
  <div class="col-md-12 main-upcoming coming" id="upcoming-class" style="display: none;">
<!--    <div class="upcoming_tit">-->
<!--      <p class="font-futura tit_txt">Upcoming Class</p>-->
<!--    </div>-->
    <div class="upcoming_wrap up">
      <? foreach ($upcoming_class as $class) { ?>
        <? if ($class->reserve == 1) { ?>
          <div class="upcoming_schedule">
            <div class="schedule_type">
              <div class="type_today" style="background-color: #000 !important;">
                <!-- 요일 축약어는 지금처럼 '세글자'로 부탁드립니다. -->
                <!-- 일 단위가 한 자릿수이면 '1일' 처럼 표기 부탁드립니다. -->
                <p class="font-futura today_date"><?= get_week_str($class->schedule_info->week); ?><br><span class="date_no"><?= date('j', strtotime($class->schedule_info->schedule_date)); ?></span>일</p>
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
              <div class="type_name clearfix">
                <p class="name_class">
                  <?= $class->schedule_info->schedule_title; ?>
                </p>
                <p class="name_center">
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
                <p class="font-futura today_date"><?= get_week_str($class->schedule_info->week); ?><br><span class="date_no"><?= date('j', strtotime($class->schedule_info->schedule_date)); ?></span>일</p>
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
              <div class="type_name clearfix">
                <p class="name_class">
                  <?= $class->schedule_info->schedule_title; ?>
                </p>
                <p class="name_center">
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
<? if (count($upcoming_class2) > 0) { ?>
  <div class="col-md-12 main-upcoming coming" id="upcoming-zoom" style="display: none;">
<!--    <div class="upcoming_tit">-->
<!--      <p class="font-futura tit_txt">Upcoming Class</p>-->
<!--    </div>-->
    <div class="upcoming_wrap up">
      <? foreach ($upcoming_class2 as $class) { ?>
        <div class="upcoming_schedule">
          <div class="schedule_type">
            <div class="type_today" style="background-color: #000 !important;">
              <!-- 요일 축약어는 지금처럼 '세글자'로 부탁드립니다. -->
              <!-- 일 단위가 한 자릿수이면 '1일' 처럼 표기 부탁드립니다. -->
              <p class="font-futura today_date"><?= get_week_str($class->schedule_info->week); ?><br><span class="date_no"><?= date('j', strtotime($class->schedule_info->schedule_date)); ?></span>일</p>
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
            <div class="type_name clearfix">
              <p class="name_class">
                <?= $class->schedule_info->schedule_title; ?>
              </p>
              <p class="name_center">
                <?= $class->studio_info->title; ?>
              </p>
            </div>
          </div>
          <button class="type_cancel" onclick="open_link_popup(<?= $class->schedule_info->schedule_info_id; ?>)">
            <? if (isset($class->schedule_info->class_link) && empty($class->schedule_info->class_link) == false) { ?>
              <img src="<?= base_url(); ?>template/icon/ic_upcoming_linked.png" width="40" height="40">
            <? } else { ?>
              <img src="<?= base_url(); ?>template/icon/ic_upcoming_confirmed.png" width="40" height="40">
            <? } ?>
          </button>
        </div>
      <? } ?>
    </div>
    <!--      <button class="font-futura btn_more" style="font-weight: bold !important;">MORE</button>-->
  </div>
<? } ?>
