<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
<style>
  .profile div select.form-control {
    width: 100% !important;
    height: 30px !important;
    font-size: 12px !important;
    padding: 0 0 0 0 !important;
    text-align-last: right;
    border: none;
    direction: rtl;
  }
  select option {
    direction: ltr;
  }
  .img-youtube img, .img-insta img {
    width : 20px !important;
    height: 20px !important;
    margin-right: 5px;
  }
  .video_ul li {
    padding: 0 0 20px !important;
  }
  /*
  @media(min-width:375px){
    .video-title {
      font-size: 14px !important;
    }
    .footprint {
      padding-top: 4px !important;
    }
  }
  @media(min-width:414px){
    .media-link {
      width: 207px !important;
      padding: 0 0 123px 0 !important;
      margin-right: 16px !important;
    }
  }
   */
  .content-area {
    background-color: #fff;
  }
</style>
<!-- PAGE -->
<section class="page-section with-sidebar" style="padding-top: 0 !important; padding-bottom: 0 !important; background-color: white">
  <!-- /CONTENT -->
  <div class="container" id="fd-class">
    <div class="row">
      <!-- online class -->
      <div class="col-md-12 content" id="content" style="background-color: white !important;">
        <div id="blog-content">
          <div class="col-md-12" style="padding: 0 0 0 0 !important; ">
            <div class="row">
              <style type="text/css">
                /* Recommend Zoom Class */
                
                .btn_more {
                  display: block;
                  width: 108px;
                  height: 36px;
                  margin: 24px auto 20px;
                  border: 1px solid #B7A6A4;
                  box-sizing: border-box;
                  color: #B7A6A4;
                  font-size: 14px;
                  padding: 0;
                  background-color: transparent;
                }
                
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
                  right: 8px;
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
                  box-sizing: border-box;
                  border: 1px solid #f3eee8;
                  border-width: 0 1px 1px 1px;
                  margin-bottom: 0;
                }
                .coming .schedule_type {
                  padding-right: 32px;
                  display: table-cell;
                  vertical-align: middle;
                }
                .coming .type_info {
                  margin: -4px 0 0 8px;
                  line-height: 1.5;
                  font-size: 12.5px;
                  letter-spacing: -0.08em;
                  margin-left: 6px;
                }
                .coming .type_name {
                  position: unset;
                  float: right;
                  width: 51%;
                  line-height: 1.5;
                }
                .coming .type_cancel {
                  margin: auto;
                  top: -16px;
                  bottom: 0;
                  right: 2px;
                }
                .coming .name_class {
                  text-align: right;
                  font-size: 11px;
                  line-height: 1.8;
                  padding: 1px 0 2px;
                  letter-spacing: -0.03em;
                }
                .coming .name_center {
                  text-align: right;
                }
                
                .recommend {
                  padding: 20px 0 0;
                }
                .coming .upcoming_tit {
                  background-color: #f3eee8;
                }
                
                /* class-teacher */
                #classTeacher {
                  padding: 20px 0 0;
                }
                .coming .upcoming_schedule {
                  border: 0;
                  background-color: #f5f1ed;
                  margin-bottom: 12px;
                  border-radius: 4px;
                }
                #fd-class .clearfix::after {
                  content: "";
                  display: block;
                  clear: both;
                }
                .coming .upcoming_tit {
                  background-color: transparent;
                  margin-bottom: 4px;
                }
                .coming .tit_txt {
                  text-align: left;
                  font-size: 16px;
                  font-weight: bold !important;
                  color: #ad796d;
                }
                #classTeacher .teacher__tit {
                  padding: 0 16px;
                  height: 40px;
                  line-height: 40px;
                }
                #classTeacher .tit--topic,
                #classTeacher .tit--viewAll {
                  margin-bottom: 0;
                  height: inherit;
                  line-height: inherit;
                }
                .tit--topic {
                  float: left;
                  color: #845b4c;
                  font-size: 16px;
                  font-weight: normal;
                  line-height: 24px;
                }
                .tit--viewAll {
                  display: block;
                  float: right;
                  line-height: 24px;
                  color: #000;
                  font-size: 14px;
                  font-weight: bold;
                }
                .teacher__list {
                  white-space: nowrap;
                  overflow-x: scroll;
                  overflow-y: hidden;
                  padding: 12px 16px 0;
                  -ms-overflow-style: none; /* IE and Edge */
                  scrollbar-width: none; /* Firefox */
                }
                .teacher__list::-webkit-scrollbar {
                  display: none; /* Chrome, Safari, Opera*/
                }
                .list--profile {
                  display: inline-block;
                  margin-right: 16px;
                  text-align: center;
                  width: 17%;
                  vertical-align: top;
                }
                .list--profile:last-child {
                  margin-right: 0;
                }
                .profile_txt {
                  white-space: normal;
                  display: block;
                  width: 100%;
                  color: #333;
                  font-size: 10px;
                  word-break: break-all;
                  line-height: 1.5;
                }
                
                .profile_circle {
                  margin-bottom: 8px;
                  width: 100%;
                  padding-bottom: 100%;
                  border-radius: 50%;
                  background-repeat: no-repeat;
                  background-position: center;
                  background-size: cover;
                  background-attachment: scroll;
                }

                .slideUl {
                  white-space: nowrap;
                  margin: 0 auto;
                  margin-bottom: 0 !important;
                  font-size: 0;
                  overflow-x: scroll;
                  -ms-overflow-style: none; /* IE and Edge */
                  scrollbar-width: none; /* Firefox */
                }
                .slideUl::-webkit-scrollbar {
                  display: none; /* Chrome, Safari, Opera*/
                }
                .slideUl_li {
                  display: inline-block;
                  width: 100%;
                  padding: 0 16px;
                }
                .slideUl_li .tit_txt img {
                  margin-top: -3px;
                  margin-right: 6px;
                }
                
                .video_ul_li {
                  display: none;
                }
                
                /* Recommend 클래스 */
                .yourClass .upcoming_wrap {
                  position: relative;
                  padding-bottom: 62.5%;
                }
                .yourClass a {
                  display: block;
                }
                .yourClass .teacher_thumb {
                  position: absolute;
                  width: 100%;
                  height: 100%;
                  /*background-color: #000;*/
                  border-radius: 4px;
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
                  position: absolute;
                  width: 100%;
                  height: 100%;
                  border-right: inherit;
                  background-repeat: no-repeat;
                  background-position: center;
                  background-size: cover;
                  background-attachment: scroll;
                }
                .yourClass .upcoming_schedule {
                  display: block;
                  position: absolute !important;
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
                  line-height: 1.1;
                }
                .yourClass .schedule_class {
                  position: absolute;
                  bottom: 26px;
                  right: 12px;
                  width: 60%;
                }
                .yourClass .schedule_class img {
                  float: right;
                  margin: 4px 0 0 12px;
                }
                .yourClass .type_name {
                  direction: ltr;
                  width: 64% !important;
                }
                .yourClass .name_class {
                  color: #fff;
                  padding: 0;
                  line-height: 1.5;
                  overflow-x: scroll;
                  text-overflow: clip;
                }
                .yourClass .name_class::-webkit-scrollbar {
                  display: none;
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
              </style>
              
              <!-- class_teacher -->
              <div class="col-md-12 class-teacher" id="classTeacher">
                <div class="teacher__tit clearfix">
                  <p class="tit--topic font-futura">FOUNDERS</p>
                  <a href="<?= base_url(); ?>home/find/teacher" class="tit--viewAll font-futura">SEE ALL</a>
                </div>
                <div class="teacher__list">
                  <? foreach ($teachers as $teacher) { ?>
                    <a href="<?= base_url().'home/teacher/profile/'.$teacher->teacher_id; ?>" class="list--profile">
                      <? if (isset($teacher->profile_image_url) == true && empty($teacher->profile_image_url) == false) { ?>
                        <div class="profile_circle" style="background-image: url(<?= $teacher->profile_image_url; ?>)"></div>
                      <? } else { ?>
                        <div class="profile_circle" style="background-image: url(<?= $this->teacher_model->get_teacher_image_thumb(); ?>)"></div>
                      <? } ?>
                      <span class="profile_txt"><?= $teacher->name; ?></span>
                    </a>
                  <? } ?>
                </div>
              </div>
              <!-- Recommend 클래스 -->
              <div class="col-md-12 recommend coming yourClass">
                <div class="upcoming_slideHorizon">
                  <ul class="slideUl" style="width: 100%; padding-bottom: 20px; overflow-y: hidden;">
                    <?
                    $i = 1;
                    foreach ($recommend_classes as $class) { ?>
                      <li class="slideUl_li" id="class_<?= $i; ?>" data-id="<?= $i; ?>">
                        <a href="<?= base_url().'home/teacher/profile/'.$class->teacher_id.'?nav=schedule&sdate='.$class->schedule_date; ?>">
                          <div class="upcoming_tit">
                            <p class="font-futura tit_txt" style="text-overflow: ellipsis;"><?= $class->schedule_title; ?></p>
                          </div>
                          <div class="upcoming_wrap">
                            <div class="teacher_thumb">
                              <div class="thumb_bg"></div>
                              <? if (isset($class->class_image_url) == true && empty($class->class_image_url) == false) { ?>
                                <div class="thumb_photo" style="background-image: url(<?= $class->class_image_url; ?>)"></div>
                              <? } else if (isset($class->teacher->profile_image_url) == true && empty($class->teacher->profile_image_url) == false) { ?>
                                <div class="thumb_photo" style="background-image: url(<?= $class->teacher->profile_image_url; ?>)"></div>
                              <? } else { ?>
                                <div class="thumb_photo" style="background-image: url(<?= $this->teacher_model->get_teacher_image(); ?>)"></div>
                              <? } ?>
                          </div>
                          <div class="upcoming_schedule">
                            <div class="schedule_type">
                                <div class="type_today">
                                  <!-- 요일 축약어는 지금처럼 '세글자'로 부탁드립니다. -->
                                  <!-- 일 단위가 한 자릿수이면 '1일' 처럼 표기 부탁드립니다. -->
                                  <p class="font-futura today_date"><?= $this->studio_model->get_week_str(date('w', strtotime($class->schedule_date))); ?><br><span class="date_no"><?= date('d', strtotime($class->schedule_date)); ?></span>일</p>
                                </div>
                                <p class="type_info">
                                <span class="font-futura day_morning">
                                  <?= $this->studio_model->get_ampm($class->start_time); ?>
                                </span>
                                  <span class="font-futura time_start">
                                  <?= $this->studio_model->get_time($class->start_time); ?>
                                </span>
                                  <br>~
                                  <span class="font-futura day_afternoon">
                                  <?= $this->studio_model->get_ampm($class->end_time); ?>
                                </span>
                                  <span class="font-futura time_end">
                                  <?= $this->studio_model->get_time($class->end_time); ?>
                                </span>
                                </p>
                              </div>
                              <div class="schedule_class">
                                <? if (empty($class->reserve_info) == false) { ?>
                                  <? if ($class->reserve_info->reserve) { ?>
                                    <? if (isset($class->class_link) && empty($class->class_link) == false) { ?>
                                      <img src="<?= base_url(); ?>template/icon/online_ticketConfirmed_zoomlink_blue.png" width="28" height="28" class="dropShadow">
                                    <? } else { ?>
                                      <img src="<?= base_url(); ?>template/icon/online_ticketConfirmed_blue.png" width="28" height="28" class="dropShadow">
                                    <? } ?>
                                  <? } else { ?>
                                    <img src="<?= base_url(); ?>template/icon/online_ticketMoney_blue.png" width="28" height="28" class="dropShadow">
                                  <? } ?>
                                <? } else if ($class->ticketing) { ?>
                                  <img src="<?= base_url(); ?>template/icon/online_switch.png" width="28" height="28" class="dropShadow">
                                <? } else { ?>
                                  <img src="<?= base_url(); ?>template/icon/online_ticketDisabled.png" width="28" height="28" class="dropShadow">
                                <? } ?>
                                <div class="type_name clearfix">
                                  <p class="name_class" style="text-overflow: ellipsis;">
                                    <?= $class->schedule_title; ?>
                                  </p>
                                  <p class="name_center" style="text-overflow: ellipsis;">
                                    <?= $class->studio->title; ?>
                                  </p>
                                </div>
                              </div>
                              <button class="schedule_favorite">
                                <img src="<?= $this->crud_model->get_bookmark_icon($class->bookmarked); ?>"
                                     class="center-bookmark-1 dropShadow" alt="" style="width:24px !important; height: 24px !important;">
                              </button>
                            </div>
                          </div>
                        </a>
                      </li>
                    <? $i++;
                    } ?>
                  </ul>
                </div>
<!--                <ul class="dots">-->
<!--                  --><?// for ($i = 1; $i <= count($upcoming_classes); $i++) { ?>
<!--                    <li class="dot" id="dot_--><?//= $i; ?><!--"></li>-->
<!--                  --><?// } ?>
<!--                </ul>-->
                <style type="text/css">
                  .slick-dots {
                    text-align: center;
                    margin: 12px 0 0;
                    position: relative;
                  }
                  
                  .slick-dots li {
                    display: inline-block;
                    margin: 0 4px;
                    width: 8px;
                    height: 8px;
                    border-radius: 50%;
                    background-color: transparent !important;
                  }
                  .slick-dots li {
                    margin: 0 4px;
                    width: 8px;
                    height: 8px;
                  }
                  .slick-dots li button {
                    width: 8px;
                    height: 8px;
                  }
                  .slick-dots li button:before {
                    width: 8px;
                    height: 8px;
                    color: #e0e0e0;
                    font-size: 12px;
                    top: -30px;
                    opacity: .5;
                  }
                  .slick-dots li.slick-active button:before {
                    color: #9e9e9e !important;
                    opacity: .75;
                  }
                </style>
              </div>
  
              <div class="col-md-12" style="padding: 0 !important; margin-bottom: 36px;">
                <div class="profile" style="display: block; font-size: 16px; padding: 0 16px !important; text-align: left; height: 48px; line-height: 48px; margin: 16px 0 4px !important; position: relative; color: #845B4C;">
                  <div style="width: calc(100% - 32px); height: inherit; line-height: inherit; position: absolute;">
                    <span class="font-futura" style="position: unset; left: 0; font-size: 15px;">FREE youtube class</span>
                  </div>
                  <a href="<?= base_url(); ?>home/find/class" class="tit--viewAll font-futura youtu--more">SEE ALL</a>
                </div>
                <div class="youtuClassWrap" style="overflow-y: hidden;">
                  <? foreach ($youtube_classes as $class) {
                    $cat = array();
                    $etc = false;
                    $categories = $this->db->get_where('teacher_video_category', array('video_id' => $class->video_id))->result();
                    foreach($categories as $category) {
                      if (in_array($category->category, $youtube_categories)) {
                        if (!strcmp($category->category, '쿠킹클래스')) {
                          $cat[] = '쿠킹';
                        } else {
                          $cat[] = $category->category;
                        }
                      } else {
                        $etc = true;
                      }
                    }
                    if ($etc) {
                      $cat[] = '기타';
                    }
                    ?>
                    <div class="youtuClass">
                      <div class="yourClass">
                        <a href="<?= base_url(); ?>home/teacher/video/view/<?= $class->video_id; ?>" class="youtu_linkbox">
                          <div class="upcoming_wrap">
                            <div class="teacher_thumb">
                              <div class="thumb_bg"></div>
                              <div class="thumb_photo" style="background-image: url(<?= $class->thumbnail_image_url; ?>)"></div>
                            </div>
                            <div class="upcoming_schedule">
                              <div class="schedule_type">
                                <!-- 요가/필라테스/홈핏/쿠킹/명상/기타 , 최대 [ 3개 ] 까지 -->
                                <? foreach ($cat as $c) { ?>
                                  <div class="type_today">
                                    <p class="font-futura today_date youtu_type">
                                      <span class="type_className"><?= $c; ?></span>
                                    </p>
                                  </div>
                                <? } ?>
                                <p class="type_info youtu_info"><?= $class->title; ?></p>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                  <? } ?>
                </div>
                <style>
                  .recommend {
                    padding: 24px 0 0;
                  }
                  .youtu--more {
                    line-height: inherit;
                    float: unset;
                    position: absolute;
                    top: 0;
                    right: 16px;
                  }
                  .youtuClassWrap {
                    white-space: nowrap;
                    overflow-x: scroll;
      
                    -ms-overflow-style: none; /* IE and Edge */
                    scrollbar-width: none; /* Firefox */
                  }
                  .youtuClassWrap::-webkit-scrollbar {
                    display: none; /* Chrome, Safari, Opera*/
                  }
                  .youtuClass {
                    display: inline-block;
                    width: 100%;
                    padding: 0 16px;
                  }
                  .youtu_linkbox {
                    display: block;
                  }
                  .youtuClass .thumb_bg {
                    background-color: rgba(0,0,0,0.4);
                  }
                  .youtu_info {
                    font-weight: bold;
                    display: block;
                    margin: 12px 0 0;
                    overflow-x: scroll;
                    text-overflow: ellipsis;
                    max-width: 324px;
      
                    -ms-overflow-style: none; /* IE and Edge */
                    scrollbar-width: none; /* Firefox */
                  }
                  .youtu_info::-webkit-scrollbar {
                    display: none;
                  }
                  .youtuClass .type_today {
                    margin-right: 8px;
                  }
                  .youtuClass .type_today:last-child {
                    margin-right: 0;
                  }
                  .youtu_type {
                    display: table;
                    white-space: pre-wrap;
                    font-size: 12.5px;
                    width: 30px;
                    top: 0;
                    bottom: 0;
                    left: 0;
                    right: 0;
                    margin: auto;
                    line-height: 1.15;
                    height: 30px;
                  }
                  .type_className {
                    display: table-cell !important;
                    vertical-align: middle;
                    color: #74615d;
                  }
                </style>
              </div>
              <!-- Zoom 클래스 -->
              <style type="text/css">
                .comeUp .online_sch {
                  display: block;
                  padding: 0;
                  height: 96px;
                  border-radius: 48px 0 0 48px;
                  margin-bottom: 24px;
                }
                .comeUp .schedule_thumb {
                  position: absolute;
                  width: 105px;
                  padding-bottom: 105px;
                  border-radius: 16px;
                  background-color: #eee;
                  top: 50%;
                  margin-top: -52.5px;
                  overflow: hidden;
                }
                .comeUp .schedule_thumb a {
                  display: block;
                  position: absolute;
                  width: 100%;
                  height: 100%;
                  border-radius: inherit;
                }
                .comeUp .thumb__class {
                  width: 100%;
                  height: 100%;
                  background-repeat: no-repeat;
                  background-position: center;
                  background-size: cover;
                  background-attachment: scroll;
                  border-radius: inherit;
                }
    
                .comeUp .schedule_type {
                  display: block;
                  position: absolute;
                  top: 0;
                  left: 105px;
                  padding: 10px;
                  width: calc(100% - 105px);
                  height: inherit;
                }
                .comeUp .type_today {
                  width: 40px;
                  height: 40px;
                }
                .comeUp .today_date {
                  font-size: 10px;
                }
                .comeUp .today_date span {
                  font-size: 11px;
                }
                .comeUp .type_info {
                  font-size: 11.5px;
                }
                .comeUp .type_name {
                  position: absolute;
                  right: 13px;
                  width: 25%;
                  bottom: 0;
                  float: unset;
                  top: 58px;
                }
                .comeUp .name_class {
                  line-height: 1.5;
                  letter-spacing: -0.05em;
                  font-size: 10px;
                  padding: 0;
                }
                .comeUp .type_cancel {
                  top: -38px;
                  right: 0;
                }
                .comeUp .type_className {
                  color: #734a41;
                  font-weight: bold;
                  line-height: 1.5;
                  position: absolute;
                  bottom: 0;
                  top: 60%;
                  margin: 0;
                  left: 10px;
                  word-break: break-all;
                  font-size: 10px;
                  letter-spacing: -0.08em;
                  width: 65%;
                }
                .comeUp .type_cancel a {
                  display: block;
                }
                @media(min-width: 375px){
                  .comeUp .schedule_type {
                    padding: 10px 20px;
                  }
                  .comeUp .type_className {
                    left: 20px;
                    width: 50%;
                  }
                  .comeUp .type_name {
                    right: 24px;
                    width: 22%;
                  }
                  .comeUp .type_cancel {
                    right: 13px;
                  }
                }
                @media(min-width: 414px){
                  .comeUp .schedule_type {
                    padding: 10px 36px 10px 20px;
                  }
                  .comeUp .type_className {
                    left: 20px;
                    /*width: 50%;*/
                  }
                  .comeUp .type_name {
                    right: 36px;
                    width: 20%;
                  }
                  .comeUp .type_cancel {
                    right: 25px;
                  }
                }
              </style>
              <div class="col-md-12 zoom-upcoming coming comeUp">
                <div class="upcoming_tit">
                  <p class="font-futura tit_txt">ONLINE class</p>
                </div>
                <div class="upcoming_wrap" id="upcoming_list">
                  <? foreach ($upcoming_classes as $class) { ?>
                    <div class="upcoming_schedule online_sch">
                      <div class="schedule_thumb">
                        <a href="<?= base_url().'home/teacher/profile/'.$class->teacher_id.'?nav=schedule&sdate='.$class->schedule_date; ?>">
                          <? if (isset($class->class_image_url) == true && empty($class->class_image_url) == false) { ?>
                            <div class="thumb__class" style="background-image: url(<?= $class->class_image_url; ?>)"></div>
                          <? } else if (isset($class->teacher->profile_image_url) == true && empty($class->teacher->profile_image_url) == false) { ?>
                            <div class="thumb__class" style="background-image: url(<?= $class->teacher->profile_image_url; ?>)"></div>
                          <? } else { ?>
                            <div class="thumb__class" style="background-image: url(<?= $this->teacher_model->get_teacher_image(); ?>)"></div>
                          <? } ?>
                        </a>
                      </div>
                      <div class="schedule_type">
                        <div class="type_today" style="background-color: #000 !important;">
                          <!-- 요일 축약어는 지금처럼 '세글자'로 부탁드립니다. -->
                          <!-- 일 단위가 한 자릿수이면 '1일' 처럼 표기 부탁드립니다. -->
                          <p class="font-futura today_date"><?= $this->studio_model->get_week_str(date('w', strtotime($class->schedule_date))); ?><br><span class="date_no"><?= date('d', strtotime($class->schedule_date)); ?></span>일</p>
                        </div>
                        <p class="type_info">
                            <span class="font-futura day_morning">
                              <?= $this->studio_model->get_ampm($class->start_time); ?>
                            </span>
                          <span class="font-futura time_start">
                              <?= $this->studio_model->get_time($class->start_time); ?>
                            </span>
                          <br>~
                          <span class="font-futura day_afternoon">
                              <?= $this->studio_model->get_ampm($class->end_time); ?>
                            </span>
                          <span class="font-futura time_end">
                              <?= $this->studio_model->get_time($class->end_time); ?>
                            </span>
                        </p>
                        <p class="type_className">
                          <!-- 수업이름 25자 -->
                          <?= $class->schedule_title; ?>
                        </p>
                        <div class="type_name clearfix">
                          <p class="name_class">
                            <!-- 강사이름 최대 10자 -->
                            <?= $class->studio->title; ?>
                          </p>
                        </div>
                      </div>
                      <button class="type_cancel">
                        <a href="<?= base_url().'home/teacher/profile/'.$class->teacher_id.'?nav=schedule&sdate='.$class->schedule_date; ?>">
                          <? if (empty($class->reserve_info) == false) { ?>
                            <? if ($class->reserve_info->reserve) { ?>
                              <? if (isset($class->class_link) && empty($class->class_link) == false) { ?>
                                <img src="<?= base_url(); ?>template/icon/ic_ticketConfirmed_linked_resize.png" width="40" height="40">
                              <? } else { ?>
                                <img src="<?= base_url(); ?>template/icon/ic_ticketConfirmed_resize.png" width="40" height="40">
                              <? } ?>
                            <? } else { ?>
                              <img src="<?= base_url(); ?>template/icon/ic_ticketMoney_resize.png" width="40" height="40">
                            <? } ?>
                          <? } else if($class->ticketing) { ?>
                            <img src="<?= base_url(); ?>template/icon/ic_switch_resize.png" width="40" height="40">
                          <? } else { ?>
                            <img src="<?= base_url(); ?>template/icon/ic_ticketDisabled_resize.png" width="40" height="40">
                          <? } ?>
                        </a>
                      </button>
                    </div>
                  <? } ?>
                </div>
                <button class="font-futura btn_more" style="font-weight: bold !important;">MORE</button>
                <!-- MORE/FOLD 기능 -->
                <script>
                  // btn_more 클릭 이벤트
                  let page = 1;
                  $('.btn_more').click(function(){
                    page++;
                    // if ($(this).text() === 'FOLD') {
                    //     page = 1;
                    //     $(this).text('MORE');
                    //     $('.upcoming_hide').slideUp();
                    //     setTimeout(function(){$('div[class*=hide_]').remove();}, 1000);
                    //     return;
                    // }
                    // console.log(page);
                    $.ajax({
                      url: "<?php echo base_url().'home/find/studio/list?page='; ?>" + page,
                      type: 'GET', // form submit method get/post
                      dataType: 'html', // request type html/json/xml
                      success: function(data) {
                        // console.log(data);
                        let limit = <?= $this->studio_model::FIND_UPCOMING_CLASS_PAGE_SIZE; ?>;
                        let prevCnt = $("#upcoming_list .online_sch").length;
                        $('#upcoming_list').append(data);
                        let listCnt = $("#upcoming_list .online_sch").length;
                        if ( listCnt === 0 || listCnt % limit !== 0 || prevCnt === listCnt) {
                          // $('.btn_more').text('FOLD');
                          $('.btn_more').hide();
                        // } else {
                          // let down = $('div[class$=hide_'+ (page - 1) +']').slideDown();
                          // $('.upcoming_hide.hide_'+ (page - 1)).show().slideDown();
                          //1,2,3,4
                          // console.log(down);
                        }
                        // console.log(prevCnt);
                        // console.log(listCnt);
                      },
                      error: function(e) {
                        console.log(e)
                      }
                    });
                  });
                </script>
              </div>
            </div>
          </div>
        </div>
        <!-- /online class -->
      </div>
    </div>
    <!-- /CONTENT -->
  </div>
</section>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
  $(document).ready(function(){

    $('.slideUl_li').on('move', function(e) {
      console.log($(this).data('id'));
    });
    $('.slideUl_li').on('click', function(e) {
      console.log($(this).data('id'));
    });
  
    $('.slideUl').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      centerMode: true,
      infinite: true,
      // swipe: true,
      // swipeToSlide: true,
      speed: 500,
      autoplaySpeed: 3000,
      waitForAnimate: false,
      focusOnSelect: true,
      autoplay: true,
      arrows: false,
      centerPadding: '0px',
    });
    $('.youtuClassWrap').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      centerMode: true,
      infinite: true,
      // swipe: true,
      // swipeToSlide: true,
      speed: 500,
      autoplaySpeed: 3000,
      waitForAnimate: false,
      focusOnSelect: true,
      autoplay: true,
      arrows: false,
      centerPadding: '0px',
    });
    active_menu_bar('find');
  });
</script>
