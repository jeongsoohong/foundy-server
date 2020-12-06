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
    <? if (DEV_SERVER) { ?>
    <!-- UPCOMMING CLASS -->
    <div class="col-md-12 main-upcoming">
      <div class="upcoming_tit">
        <p class="font-futura tit_txt">Upcoming Class</p>
      </div>
      <div class="upcoming_wrap">
        <div class="upcoming_schedule">
          <div class="schedule_type">
            <div class="type_today" style="background-color: #000 !important;">
              <p class="font-futura today_date">THU<br><span class="date_no">29</span>일</p>
            </div>
            <p class="type_info">
              <span class="font-futura day_part">pm</span> <span class="font-futura time_no">7:00 <br>~ 8:00</span>
            </p>
            <div class="type_name">
              <p class="name_class">수업이름O수업이름O</p>
              <p class="name_center">센터이름O센터이름O</p>
            </div>
            <button class="type_cancel">
              <img src="<?php echo base_url(); ?>template/icon/ic_cancel_off.png" width="40" height="40">
            </button>
          </div>
        </div>
        <div class="upcoming_schedule">
          <div class="schedule_type">
            <div class="type_today">
              <p class="font-futura today_date">THU<br><span class="date_no">29</span>일</p>
            </div>
            <p class="type_info">
              <span class="font-futura day_part">pm</span> <span class="font-futura time_no">7:00 <br>~ 8:00</span>
            </p>
            <div class="type_name">
              <p class="name_class">수업이름O수업이름O</p>
              <p class="name_center">강사이름O</p>
            </div>
            <button class="type_cancel">
              <img src="<?php echo base_url(); ?>template/icon/ic_cancel_off.png" width="40" height="40">
            </button>
          </div>
        </div>
        <div class="upcoming_schedule">
          <div class="schedule_type">
            <div class="type_today">
              <p class="font-futura today_date">THU<br><span class="date_no">29</span>일</p>
            </div>
            <p class="type_info">
              <span class="font-futura day_part">pm</span> <span class="font-futura time_no">7:00 <br>~ 8:00</span>
            </p>
            <div class="type_name">
              <p class="name_class">수업이름O수업이름O</p>
              <p class="name_center">센터이름O센터이름O</p>
            </div>
            <button class="type_cancel">
              <img src="<?php echo base_url(); ?>template/icon/ic_cancel_off.png" width="40" height="40">
            </button>
          </div>
        </div>
        <div class="upcoming_schedule">
          <div class="schedule_type">
            <div class="type_today">
              <p class="font-futura today_date">THU<br><span class="date_no">29</span>일</p>
            </div>
            <p class="type_info">
              <span class="font-futura day_part">pm</span> <span class="font-futura time_no">7:00 <br>~ 8:00</span>
            </p>
            <div class="type_name">
              <p class="name_class">수업이름O수업이름O</p>
              <p class="name_center">강사이름O</p>
            </div>
            <button class="type_cancel">
              <img src="<?php echo base_url(); ?>template/icon/ic_cancel_off.png" width="40" height="40">
            </button>
          </div>
        </div>
        <div class="upcoming_hide hide_1" style="display: none;">
          <div class="upcoming_schedule">
            <div class="schedule_type">
              <div class="type_today">
                <p class="font-futura today_date">THU<br><span class="date_no">29</span>일</p>
              </div>
              <p class="type_info">
                <span class="font-futura day_part">pm</span> <span class="font-futura time_no">7:00 <br>~ 8:00</span>
              </p>
              <div class="type_name">
                <p class="name_class">수업이름O수업이름O</p>
                <p class="name_center">센터이름O센터이름O</p>
              </div>
              <button class="type_cancel">
                <img src="<?php echo base_url(); ?>template/icon/ic_cancel_off.png" width="40" height="40">
              </button>
            </div>
          </div>
          <div class="upcoming_schedule">
            <div class="schedule_type">
              <div class="type_today">
                <p class="font-futura today_date">THU<br><span class="date_no">29</span>일</p>
              </div>
              <p class="type_info">
                <span class="font-futura day_part">pm</span> <span class="font-futura time_no">7:00 <br>~ 8:00</span>
              </p>
              <div class="type_name">
                <p class="name_class">수업이름O수업이름O</p>
                <p class="name_center">강사이름O</p>
              </div>
              <button class="type_cancel">
                <img src="<?php echo base_url(); ?>template/icon/ic_cancel_off.png" width="40" height="40">
              </button>
            </div>
          </div>
          <div class="upcoming_schedule">
            <div class="schedule_type">
              <div class="type_today">
                <p class="font-futura today_date">THU<br><span class="date_no">29</span>일</p>
              </div>
              <p class="type_info">
                <span class="font-futura day_part">pm</span> <span class="font-futura time_no">7:00 <br>~ 8:00</span>
              </p>
              <div class="type_name">
                <p class="name_class">수업이름O수업이름O</p>
                <p class="name_center">센터이름O센터이름O</p>
              </div>
              <button class="type_cancel">
                <img src="<?php echo base_url(); ?>template/icon/ic_cancel_off.png" width="40" height="40">
              </button>
            </div>
          </div>
          <div class="upcoming_schedule">
            <div class="schedule_type">
              <div class="type_today">
                <p class="font-futura today_date">THU<br><span class="date_no">29</span>일</p>
              </div>
              <p class="type_info">
                <span class="font-futura day_part">pm</span> <span class="font-futura time_no">7:00 <br>~ 8:00</span>
              </p>
              <div class="type_name">
                <p class="name_class">수업이름O수업이름O</p>
                <p class="name_center">강사이름O</p>
              </div>
              <button class="type_cancel">
                <img src="<?php echo base_url(); ?>template/icon/ic_cancel_off.png" width="40" height="40">
              </button>
            </div>
          </div>
        </div>
        <div class="upcoming_hide hide_2" style="display: none;">
          <div class="upcoming_schedule">
            <div class="schedule_type">
              <div class="type_today">
                <p class="font-futura today_date">THU<br><span class="date_no">29</span>일</p>
              </div>
              <p class="type_info">
                <span class="font-futura day_part">pm</span> <span class="font-futura time_no">7:00 <br>~ 8:00</span>
              </p>
              <div class="type_name">
                <p class="name_class">수업이름O수업이름O</p>
                <p class="name_center">센터이름O센터이름O</p>
              </div>
              <button class="type_cancel">
                <img src="<?php echo base_url(); ?>template/icon/ic_cancel_off.png" width="40" height="40">
              </button>
            </div>
          </div>
          <div class="upcoming_schedule">
            <div class="schedule_type">
              <div class="type_today">
                <p class="font-futura today_date">THU<br><span class="date_no">29</span>일</p>
              </div>
              <p class="type_info">
                <span class="font-futura day_part">pm</span> <span class="font-futura time_no">7:00 <br>~ 8:00</span>
              </p>
              <div class="type_name">
                <p class="name_class">수업이름O수업이름O</p>
                <p class="name_center">강사이름O</p>
              </div>
              <button class="type_cancel">
                <img src="<?php echo base_url(); ?>template/icon/ic_cancel_off.png" width="40" height="40">
              </button>
            </div>
          </div>
          <div class="upcoming_schedule">
            <div class="schedule_type">
              <div class="type_today">
                <p class="font-futura today_date">THU<br><span class="date_no">29</span>일</p>
              </div>
              <p class="type_info">
                <span class="font-futura day_part">pm</span> <span class="font-futura time_no">7:00 <br>~ 8:00</span>
              </p>
              <div class="type_name">
                <p class="name_class">수업이름O수업이름O</p>
                <p class="name_center">센터이름O센터이름O</p>
              </div>
              <button class="type_cancel">
                <img src="<?php echo base_url(); ?>template/icon/ic_cancel_off.png" width="40" height="40">
              </button>
            </div>
          </div>
          <div class="upcoming_schedule">
            <div class="schedule_type">
              <div class="type_today">
                <p class="font-futura today_date">THU<br><span class="date_no">29</span>일</p>
              </div>
              <p class="type_info">
                <span class="font-futura day_part">pm</span> <span class="font-futura time_no">7:00 <br>~ 8:00</span>
              </p>
              <div class="type_name">
                <p class="name_class">수업이름O수업이름O</p>
                <p class="name_center">강사이름O</p>
              </div>
              <button class="type_cancel">
                <img src="<?php echo base_url(); ?>template/icon/ic_cancel_off.png" width="40" height="40">
              </button>
            </div>
          </div>
        </div>
        <div class="upcoming_hide hide_3" style="display: none;">
          <div class="upcoming_schedule">
            <div class="schedule_type">
              <div class="type_today">
                <p class="font-futura today_date">THU<br><span class="date_no">29</span>일</p>
              </div>
              <p class="type_info">
                <span class="font-futura day_part">pm</span> <span class="font-futura time_no">7:00 <br>~ 8:00</span>
              </p>
              <div class="type_name">
                <p class="name_class">수업이름O수업이름O</p>
                <p class="name_center">센터이름O센터이름O</p>
              </div>
              <button class="type_cancel">
                <img src="<?php echo base_url(); ?>template/icon/ic_cancel_off.png" width="40" height="40">
              </button>
            </div>
          </div>
          <div class="upcoming_schedule">
            <div class="schedule_type">
              <div class="type_today">
                <p class="font-futura today_date">THU<br><span class="date_no">29</span>일</p>
              </div>
              <p class="type_info">
                <span class="font-futura day_part">pm</span> <span class="font-futura time_no">7:00 <br>~ 8:00</span>
              </p>
              <div class="type_name">
                <p class="name_class">수업이름O수업이름O</p>
                <p class="name_center">강사이름O</p>
              </div>
              <button class="type_cancel">
                <img src="<?php echo base_url(); ?>template/icon/ic_cancel_off.png" width="40" height="40">
              </button>
            </div>
          </div>
          <div class="upcoming_schedule">
            <div class="schedule_type">
              <div class="type_today">
                <p class="font-futura today_date">THU<br><span class="date_no">29</span>일</p>
              </div>
              <p class="type_info">
                <span class="font-futura day_part">pm</span> <span class="font-futura time_no">7:00 <br>~ 8:00</span>
              </p>
              <div class="type_name">
                <p class="name_class">수업이름O수업이름O</p>
                <p class="name_center">센터이름O센터이름O</p>
              </div>
              <button class="type_cancel">
                <img src="<?php echo base_url(); ?>template/icon/ic_cancel_off.png" width="40" height="40">
              </button>
            </div>
          </div>
          <div class="upcoming_schedule">
            <div class="schedule_type">
              <div class="type_today">
                <p class="font-futura today_date">THU<br><span class="date_no">29</span>일</p>
              </div>
              <p class="type_info">
                <span class="font-futura day_part">pm</span> <span class="font-futura time_no">7:00 <br>~ 8:00</span>
              </p>
              <div class="type_name">
                <p class="name_class">수업이름O수업이름O</p>
                <p class="name_center">강사이름O</p>
              </div>
              <button class="type_cancel">
                <img src="<?php echo base_url(); ?>template/icon/ic_cancel_off.png" width="40" height="40">
              </button>
            </div>
          </div>
        </div>
        <div class="upcoming_hide hide_4" style="display: none;">
          <div class="upcoming_schedule">
            <div class="schedule_type">
              <div class="type_today">
                <p class="font-futura today_date">THU<br><span class="date_no">29</span>일</p>
              </div>
              <p class="type_info">
                <span class="font-futura day_part">pm</span> <span class="font-futura time_no">7:00 <br>~ 8:00</span>
              </p>
              <div class="type_name">
                <p class="name_class">수업이름O수업이름O</p>
                <p class="name_center">센터이름O센터이름O</p>
              </div>
              <button class="type_cancel">
                <img src="<?php echo base_url(); ?>template/icon/ic_cancel_off.png" width="40" height="40">
              </button>
            </div>
          </div>
          <div class="upcoming_schedule">
            <div class="schedule_type">
              <div class="type_today">
                <p class="font-futura today_date">THU<br><span class="date_no">29</span>일</p>
              </div>
              <p class="type_info">
                <span class="font-futura day_part">pm</span> <span class="font-futura time_no">7:00 <br>~ 8:00</span>
              </p>
              <div class="type_name">
                <p class="name_class">수업이름O수업이름O</p>
                <p class="name_center">강사이름O</p>
              </div>
              <button class="type_cancel">
                <img src="<?php echo base_url(); ?>template/icon/ic_cancel_off.png" width="40" height="40">
              </button>
            </div>
          </div>
          <div class="upcoming_schedule">
            <div class="schedule_type">
              <div class="type_today">
                <p class="font-futura today_date">THU<br><span class="date_no">29</span>일</p>
              </div>
              <p class="type_info">
                <span class="font-futura day_part">pm</span> <span class="font-futura time_no">7:00 <br>~ 8:00</span>
              </p>
              <div class="type_name">
                <p class="name_class">수업이름O수업이름O</p>
                <p class="name_center">센터이름O센터이름O</p>
              </div>
              <button class="type_cancel">
                <img src="<?php echo base_url(); ?>template/icon/ic_cancel_off.png" width="40" height="40">
              </button>
            </div>
          </div>
          <div class="upcoming_schedule">
            <div class="schedule_type">
              <div class="type_today">
                <p class="font-futura today_date">THU<br><span class="date_no">29</span>일</p>
              </div>
              <p class="type_info">
                <span class="font-futura day_part">pm</span> <span class="font-futura time_no">7:00 <br>~ 8:00</span>
              </p>
              <div class="type_name">
                <p class="name_class">수업이름O수업이름O</p>
                <p class="name_center">강사이름O</p>
              </div>
              <button class="type_cancel">
                <img src="<?php echo base_url(); ?>template/icon/ic_cancel_off.png" width="40" height="40">
              </button>
            </div>
          </div>
        </div>
      </div>
      <button class="font-futura btn_more" style="font-weight: bold !important;">MORE</button>
    </div>
    <!-- /UPCOMMING CLASS -->
    <? } ?>
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

