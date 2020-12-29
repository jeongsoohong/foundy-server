<style>
  .page-section {
    padding-top: 10px !important;
  }
  .media-body div p {
    margin: 0 0 5px 0 !important;
  }
  .media-body div span img {
    width : 20px !important;
    height: 20px !important;
    margin-right: 5px;
  }
  .profile_ul {
    box-shadow: none;
    border: none;
    padding: 0 10px 0 10px !important;
    border-radius: 0 !important;
  }
  .profile_ul li {
    height: 40px !important;
    line-height: 40px;
    /*padding: 0 10px 0 10px !important;*/
    padding: 0 !important;
  }
  .profile_ul li span.pull-right {
    /*margin: 0 5px 0 0 !important;*/
    margin: 0 !important;
    padding: 0 5px 0 5px !important;
  }
  .profile_ul li span.pull-right.schedule {
    border: 1px solid #8e8e8e !important;
  }
  .profile_ul li span.pull-right img {
    width: 20px !important;
    height: 20px !important;
  }
  .view,.schedule {
    margin-top: 6px;
    margin-bottom: 6px;
    padding-left: 5px;
    padding-right: 5px;
    height: 26px;
    line-height: 26px !important;
    border: 1px solid grey;
  }
  #profile-edit {
    background-color: white;
    height: 40px;
    width: 50px;
    position: absolute;
    z-index: 10;
    top: -10px;
    left: 80%;
    display: none;
    text-align: center;
  }
  #profile-edit a {
    color: grey;
    font-size: 12px;
    line-height: 40px;
  }
  .ticket_wrap {
    padding: 0;
  }
  .ticket_txt {
    margin: 0;
    height: inherit;
    line-height: 52px;
    font-size: 16px;
  }
  .ticket_tit {
    width: 100%;
    height: 52px;
    text-align: center;
  }
  .ticket_thumb {
    background-color: #fff;
    padding: 28px 16px;
  }
  .thumb_box {
    margin-bottom: 20px;
  }
  .thumb_box:last-child {
    margin-bottom: 0px;
  }

  .ticket_wrap p {
    margin: 0;
  }
  .thumb_box {
    border-radius: 4px;
    padding-bottom: 61.6%;
    position: relative;
  }
  .box_wrap {
    position: absolute;
    width: 100%;
    height: 100%;
    padding: 16px;
  }

  .theme\:thumb_member {
    background-color: #F7D47C;
  }

  .theme\:thumb_term {
    background: linear-gradient(135deg, rgba(255,255,255,1) 0%, rgba(252,250,250,1) 0%, rgba(238,238,238,1) 100%);
  }

  .txt_academy {
    color: #9e9e9e !important;
  }

  .txt_grey {
    color: #bdbdbd !important;
  }

  .theme\:thumb_term  .question {
    border: 2px solid #d2d2d2;
  }
  .question {
    position: absolute;
    top: 16px;
    right: 16px;
    width: 60px;
    height: 32px;
    border-radius: 16px;
    background-color: transparent;
    border: 2px solid #B6895F;
    box-sizing: border-box;
  }
  .question span {
    color: #B6895F;
    font-size: 14px;
    font-weight: bold;
  }
  .time_left {
    position: absolute;
    top: 60px;
    right: 22px;
    text-align: right;
    color: #B6895F;
    font-size: 12px;
    font-weight: bold !important;
  }


  .deadline {
    color: #B6895F;
    font-size: 16px;
    font-weight: bold !important;
    position: absolute;
    top: 16px;
  }
  .box_member {
    width: 100%;
    height: 100%;
  }
  .box_member .name {
    position: absolute;
    top: 50%;
    margin-top: -32px;
  }
  .box_member .count {
    position: absolute;
    bottom: 16px;
    color: #B6895F;
    font-size: 11px;
    font-weight: bold;
  }
  .count span {
    font-size: 12px;
  }
  .box_member .logotype {
    position: absolute;
    bottom: 16px;
    right: 16px;
  }
  .name_academy {
    width: 76px;
    height: 24px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0,0,0,0.08);
    border-radius: 12px;
    border-top-left-radius: 0;
    margin-bottom: 4px;
    text-align: center;
  }
  .name p {
    color: #616161;
  }
  .name_academy p {
    font-size: 10px;
    font-weight: bold;
    line-height: 24px;
  }
  .name_ticket {
    font-size: 21px;
    font-weight: bold !important;
  }
</style>
<div class="profile" style="font-size: 15px; text-align: center; height: 50px; line-height: 50px !important;">
  <b class="font-futura">profile</b>
</div>
<div class="row">
  <div class="col-md-12" style="padding: 0 !important; ">
    <div class="recent-post" style="background: #fff;">
      <div class="media">
        <div class="col-md-12" style="margin: 0 0 0 0; padding: 15px 15px 15px 15px; position: relative">
          <table class="col-md-12" style="width: 100%;">
            <tbody>
            <tr style="height: 20px">
              <td rowspan="3" style="text-align: center">
                <div class="media-object img-bg" id="blah" style="margin: auto; border-radius: 50%;
                  background-size: cover; background-position-x: center; background-position-y: center;
                  width: 60px; height: 60px; background-image: url('<?php
                if (empty($profile_image_url) || strlen($profile_image_url) == 0) {
                  echo base_url() . 'uploads/icon/profile_icon.png';
                } else {
                  echo $profile_image_url;
                }
                ?>');">
                </div>
              </td>
              <td style="padding-left: 10px; width: 70%">
                <?php echo $nickname.' ('.$email.')'; ?>
              </td>
              <td style="width: 10%; text-align: center;">
                <a href="javascript:void(0);">
                  <span class="profile-edit" data-target='profile-edit' style="color: grey; padding-right: 20px">
                    <img src="<?php echo base_url(); ?>uploads/icon/dots.png" alt="" style="width: 10px; height: 10px">
                  </span>
                </a>
                <div id="profile-edit">
                </div>
              </td>
            </tr>
            <tr style="height: 20px">
              <td style="padding-left: 10px; width: 70%">
                <?php
                $user = '';
                if ($user_type & USER_TYPE_ADMIN) {
                  echo '어드민';
                } else if ($user_type & USER_TYPE_TEACHER and $user_type & USER_TYPE_CENTER) {
                  $user .= '강사/센터회원';
                } else if ($user_type & USER_TYPE_TEACHER) {
                  $user .= '강사회원';
                } else if ($user_type & USER_TYPE_CENTER) {
                  $user .= '센터회원';
                } else if ($user_type & USER_TYPE_GENERAL) {
                  $user .= '일반회원';
                } else {
                  $user .= '비회원';
                }
                if ($user_type & USER_TYPE_SHOP) {
                  $user .= ' | 점주';
                }
                echo $user;
                ?>
              </td>
              <td style="width: 10%">
              </td>
            </tr>
            <tr style="height: 20px">
              <td style="width: 70%">
              </td>
              <td style="width: 10%">
              </td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12" style="padding: 0 0 0 0">
    <div class="row">
      <?php if ($user_type & USER_TYPE_CENTER && $center_activate == 1) { ?>
        <div class="col-md-12">
          <div class="profile" style="font-size: 15px; text-align: center; height: 50px; line-height: 50px !important;">
            <b class="font-futura">my center</b>
          </div>
          <div class="widget">
            <ul class="profile_ul" style="padding-left: 30px !important; padding-right: 30px !important;">
              <?php
              $i = 0;
              $total_cnt = count($my_centers);
              foreach ($my_centers as $center) {
                $i++;
                ?>
                <li style="<?php echo ($i != $total_cnt ? 'border-bottom: 1px solid #EAEAEA' : ''); ?>">
                  <a href="<?php echo base_url(); ?>home/center/profile/<?php echo $center->center_id; ?>" style="position: inherit;">
                    <?php echo $center->title; ?>&nbsp;페이지 바로가기
                    <span class="pull-right" style="color: grey;">
                      <i class="fa fa-angle-right"></i>
                    </span>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      <?php } ?>
      <?php if ($user_type & USER_TYPE_TEACHER && $teacher_activate == 1) { ?>
        <div class="col-md-12">
          <div class="profile" style="font-size: 15px; text-align: center; height: 50px; line-height: 50px !important;">
            <b class="font-futura">my class</b>
          </div>
          <div class="widget">
            <ul class="profile_ul" style="padding-left: 30px !important; padding-right: 30px !important;">
              <li>
                <a href="<?php echo base_url(); ?>home/teacher/profile/<?php echo $user_id ?>" style="position: inherit;">
                  <?php echo $my_teacher->name; ?>&nbsp;강사님 페이지 바로가기
                  <span class="pull-right" style="color: grey;">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      <?php } ?>
      <?php if (count($bookmark_centers) > 0 || count($bookmark_teachers) > 0) { ?>
        <div class="col-md-12">
          <div class="profile" style="font-size: 15px; text-align: center; height: 50px; line-height: 50px !important;">
            <b class="font-futura">my favorite</b>
          </div>
          <div class="widget" style="padding-bottom: 0; ">
            <ul class="profile_ul" style="padding: 8px 32px;">
              <style type="text/css">
                .profile_li {
                  border-bottom: 1px solid #eee;
                }
                .profile_li:last-child {
                  border: 0;
                }
              </style>
              <?php
              $i = 0;
              $total_cnt = count($bookmark_centers) + count($bookmark_teachers);
              if (!empty($bookmark_centers) and count($bookmark_centers) > 0) {
                foreach ($bookmark_centers as $center) {
                  $i++;
                  ?>
                  <li class="profile_li" style="height: 68px !important">
                    <table class="col-md-12" style="width: 100%">
                      <tbody>
                      <tr style="height: 68px;">
                        <td style="padding: 14px 16px; font-size: 11px; font-weight: bold; line-height: 1.75; color: #9e9e9e;">
                          스튜디오
                          <br>
                          <span style="display: block; font-size: 13px; color: #333;">
                            <?= $center->title; ?>
                          </span>
                        </td>
                        <td style="width: 32px; text-align: right;">
                          <a href="<?php echo base_url().'home/center/profile/'.$center->center_id.'?nav=schedule'; ?>">
                            <div style="width: 32px; height: 32px; border-radius: 50%; background-color: #8B5949; line-height: 32px; text-align: center;">
                              <img src="<?= base_url(); ?>template/icon/ic_calendar.png" width="16" height="16" style="margin-bottom: 7px;">
                            </div>
                          </a>
                        </td>
                        <td style="text-align: center; width: 14.6%;">
                          <?php echo $this->crud_model->sns_func_html('bookmark', 'center', true, $center->center_id, 20, 20); ?>
                        </td>
                      </tr>
                      </tbody>
                    </table>
                  </li>
                  <?php
                }
              }
              ?>
              <?php if (!empty($bookmark_teachers) and count($bookmark_teachers) > 0) {
                foreach ($bookmark_teachers as $teacher) {
                  $i++;
                  ?>
                  <li class="profile_li" style="height: 68px !important">
                    <table class="col-md-12" style="width: 100%">
                      <tbody>
                      <tr style="height: 68px;">
                        <td style="padding: 14px 16px; font-size: 11px; font-weight: bold; line-height: 1.75; color: #9e9e9e;">
                          강사
                          <br>
                          <span style="display: block; font-size: 13px; color: #333;">
                            <?= $teacher->name; ?>
                          </span>
                        </td>
                        <td style="width: 32px; text-align: right;">
                          <a href="<?php echo base_url().'home/teacher/profile/'.$teacher->user_id; ?>">
                            <div style="width: 32px; height: 32px; border-radius: 50%; background-color: #8B5949; line-height: 32px; text-align: center;">
                              <img src="<?= base_url(); ?>template/icon/ic_calendar.png" width="16" height="16" style="margin-bottom: 7px;">
                            </div>
                          </a>
                        </td>
                        <td style="text-align: center; width: 14.6%;">
                          <?php echo $this->crud_model->sns_func_html('bookmark', 'teacher', true, $teacher->teacher_id, 20, 20); ?>
                        </td>
                      </tr>
                      </tbody>
                    </table>
                  </li>
                  <?php
                }
              }
              ?>
            </ul>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
<? if (count($on_tickets) + count($stop_tickets) + count($planed_tickets) > 0) { ?>
  <div class="col-lg-12 col-md-12 ticket_wrap">
    <div class="ticket_tit">
      <p class="ticket_txt font-futura">My Ticket</p>
    </div>
    <div class="ticket_thumb">
      <? foreach ($on_tickets as $ticket) { // 진행중 티켓 ?>
        <div class="thumb_box theme:thumb_member">
          <div class="box_wrap">
            <div class="box_member">
              <p class="deadline">d - <span><?= $ticket->d_day; ?></span></p>
              <div class="name">
                <div class="name_academy">
                  <p>
                    <a href="<?php echo base_url().'home/center/profile/'.$ticket->center->center_id.'?nav=schedule'; ?>">
                      <?= $ticket->center->title; ?>
                    </a>
                  </p>
                </div>
                <p class="name_ticket"><?= $ticket->ticket_title; ?></p>
              </div>
              <p class="count">유효기간 :
                <span><?= date('Y.m.d', strtotime($ticket->enable_start_at)); ?></span>
                ~
                <span><?= date('Y.m.d', strtotime($ticket->enable_end_at)); ?></span>
              </p>
              <img src="<?= base_url(); ?>template/icon/card_logo.png" class="logotype" width="58" height="auto">
            </div>
            <button class="question">
              <span><a href="tel:<?= $ticket->center->phone; ?>">문의</a></span>
            </button>
            <p class="time_left">
              <? if ($ticket->ticket_type == CENTER_TICKET_TYPE_COUNT) { ?>
                <span>남은 횟수
                    <br><?= $ticket->reservable_count - $ticket->reserve - $ticket->wait; ?>회
                  </span>
              <? } ?>
            </p>
          </div>
        </div>
      <? } ?>
      <? foreach ($stop_tickets as $ticket) { // 정지중 티켓 ?>
          <div class="thumb_box theme:thumb_term">
            <div class="box_wrap">
              <div class="box_member">
                <p class="deadline txt_grey">d - <span><?= $ticket->d_day; ?></span></p>
                <div class="name">
                  <div class="name_academy">
                    <p>
                      <a href="<?php echo base_url().'home/center/profile/'.$ticket->center->center_id.'?nav=schedule'; ?>">
                        <?= $ticket->center->title; ?>
                      </a>
                    </p>
                  </div>
                  <p class="name_ticket txt_grey"><?= $ticket->ticket_title; ?></p>
                </div>
                <p class="count txt_grey">유효기간 :
                  <span><?= date('Y.m.d', strtotime($ticket->enable_start_at)); ?></span>
                  ~
                  <span><?= date('Y.m.d', strtotime($ticket->enable_end_at)); ?></span>
                </p>
                <img src="<?= base_url(); ?>template/icon/card_logo.png" class="logotype" width="58" height="auto">
              </div>
              <button class="question">
                <span><a class="txt_grey" href="tel:<?= $ticket->center->phone; ?>">문의</a></span>
              </button>
              <p class="time_left">
                <? if ($ticket->ticket_type == CENTER_TICKET_TYPE_COUNT) { ?>
                  <span class="txt_grey">남은 횟수
                    <br><?= $ticket->reservable_count - $ticket->reserve; ?>회
                  </span>
                <? } ?>
              </p>
            </div>
          </div>
      <? } ?>
      <? foreach ($planed_tickets as $ticket) { // 예정된 티켓 ?>
        <div class="thumb_box theme:thumb_term">
          <div class="box_wrap">
            <div class="box_member">
              <p class="deadline txt_grey">d - <span><?= $ticket->d_day; ?></span></p>
              <div class="name">
                <div class="name_academy">
                  <p>
                    <a href="<?php echo base_url().'home/center/profile/'.$ticket->center->center_id.'?nav=schedule'; ?>">
                      <?= $ticket->center->title; ?>
                    </a>
                  </p>
                </div>
                <p class="name_ticket txt_grey"><?= $ticket->ticket_title; ?></p>
              </div>
              <p class="count txt_grey">유효기간 :
                <span><?= date('Y.m.d', strtotime($ticket->enable_start_at)); ?></span>
                ~
                <span><?= date('Y.m.d', strtotime($ticket->enable_end_at)); ?></span>
              </p>
              <img src="<?= base_url(); ?>template/icon/card_logo.png" class="logotype" width="58" height="auto">
            </div>
            <button class="question">
              <span><a class="txt_grey" href="tel:<?= $ticket->center->phone; ?>">문의</a></span>
            </button>
            <p class="time_left">
              <? if ($ticket->ticket_type == CENTER_TICKET_TYPE_COUNT) { ?>
                <span class="txt_grey">남은 횟수
                    <br><?= $ticket->reservable_count - $ticket->reserve; ?>회
                  </span>
              <? } ?>
            </p>
          </div>
        </div>
      <? } ?>
      <? if (false) { // 수강권 정지 ?>
        <div class="thumb_box theme:thumb_term">
        <div class="box_wrap">
          <div class="box_member">
            <p class="deadline txt_grey">d - <span>00</span></p>
            <div class="name">
              <div class="name_academy">
                <p>요가원 이름</p>
              </div>
              <p class="name_ticket txt_grey">수강권 이름</p>
            </div>
            <p class="count txt_grey">유효기간 : <span>20.00.00</span> ~ <span>20.00.00</span></p>
            <img src="<?= base_url(); ?>template/icon/card_logo.png" class="logotype" width="58" height="auto">
          </div>
          <button class="question">
            <span class="txt_grey">문의</span>
          </button>
          <p class="time_left">
          <span class="txt_grey">남은 횟수
            <br>10회
          </span>
          </p>
        </div>
      </div>
      <? } ?>
    </div>
  </div>
<?php } ?>
<script>
  
  function openPop() {
    if ($('#profile-edit').css('display') === 'none') {
      var html = "<a href=\"javascript:void(0);\" onclick=\"$(\'.pnav_edit_profile\').click();\">수정</a>";
      $('#profile-edit').empty().append(html);
      $('#profile-edit').show();
    } else {
      closePop();
    }
  }
  function closePop() {
    $('#profile-edit').hide();
  }
  
  $(document).ready(function() {
    $('.profile-edit').click(function (e) {
      openPop();
    });
  });
</script>
