<?php if (count($upcoming_classes) > 0) { ?>
  <div class="upcoming_hide hide_<?= $page - 1; ?>">
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
          <!-- ONLINE 예약하기 -->
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
<?php } ?>
