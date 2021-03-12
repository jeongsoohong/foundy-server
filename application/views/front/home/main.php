<style>
  .main-header {
    text-align: center;
    height: 40px;
  }
  .main-header h6 {
    height: 40px;
    line-height: 40px;
    margin: 0 0 0 0;
    font-size: 15px;
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
<section class="page-section" style="padding: 12px 0 32px !important; margin: 0 16px !important;">
  <div class="row">
    <!-- UPCOMING CLASS -->
    <? include 'upcoming.php'; ?>
    <!-- /UPCOMING CLASS -->
    <!-- FAVORITE -->
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
    <!-- / FAVORITE -->
    <!-- BEST ITEM -->
    <div class="col-md-12 main-shop">
      <?php include "best_item.php"; ?>
    </div>
    <!--/ BEST ITEM -->
    <div class="col-md-12 main-discovery">
      <div class="col-md-12 main-header navigation-header" style="text-align: center; margin: 10px 0">
        <h6 class="font-futura" style="height: 20px; line-height: 20px;">Find</h6>
        <p>건강한 시작을 위한 클래스 찾기</p>
      </div>
      <div class="col-md-12 main-nav" style="display: flex">
        <a href="<?php echo base_url().'home/find'; ?>" style="margin:auto;">
          <img class="img-responsive" src="<?php echo base_url(); ?>template/icon/fd_this.png" width="80" height="80" alt="" />
        </a>
        <a href="<?php echo base_url().'home/find/center/'.CENTER_TYPE_YOGA; ?>" style="margin:auto;">
          <img class="img-responsive" src="<?php echo base_url(); ?>template/icon/fd_yoga.png" width="80" height="80" alt="" />
        </a>
        <a href="<?php echo base_url().'home/find/center/'.CENTER_TYPE_PILATES; ?>" style="margin:auto;">
          <img class="img-responsive" src="<?php echo base_url(); ?>template/icon/fd_pilates.png" width="80" height="80" alt="" />
        </a>
<!--        --><?//
//        if (STUDIO_OPEN) {
//          if (DEV_SERVER) {
//            $online_link = base_url().'home/find/studio';
//          } else {
//            $online_link = base_url().'home/find/studio';
//          }
//        } else {
//          if ($this->session->userdata('user_login') == 'yes') {
//            $user_data = json_decode($this->session->userdata('user_data'));
//            if ($user_data->user_type & USER_TYPE_ADMIN) {
//              $online_link = base_url() . 'home/find/studio';
//            } else {
//              $online_link = base_url() . 'home/find/class';
//            }
//          } else {
//            $online_link = base_url() . 'home/find/class';
//          }
//        }
//        ?>
        <a href="<?= base_url().'home/find/studio'; ?>" style="margin:auto;">
          <img class="img-responsive" src="<?php echo base_url(); ?>template/icon/fd_onlineClass.png" width="80" height="80" alt="" />
        </a>
      </div>
    </div>
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
    width: 80px;
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
    padding-left: 80px;
    height: 32px;
    line-height: 32px;
    border-radius: 4px;
  }
  .info_box {
    background-color: #f5f5f5;
    box-sizing: border-box;
    border: 0;
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
    height: 152px;
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
  .popup-box {
    z-index: 200;
  }
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
    padding-bottom: 20px;
    margin-bottom: 20px;
    border-bottom: 1px dashed #eee;
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
  .before_height {
    height: 390px !important;
    margin-top: -195px !important;
  }
  .after_style .popup_detail {
    padding-bottom: 0 !important;
    margin-bottom: 0 !important;
    border-bottom: 0 !important;
  }
  .after_style .copy-linkBtn {
    margin-top: 0 !important;
  }

</style>
<div class="popup-box" id="schedule_reserve_popup" style="display: none;">
</div>
<div class="popup-box" id="schedule_cancel_popup" style="display: none;">
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
      <div class="confirm_btn" style="border-top: 1px solid #eee !important;">
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
      <div class="confirm_btn" style="border-top: 1px solid #eee !important;">
        <button class="btn_yes" style="border:none !important;" onclick="close_notify_popup()">OK</button>
      </div>
    </div>
  </div>
</div>
<!-- 온라인 '티켓팅 확정' 클릭 팝업(ZOOM 링크 생성 후) -->
<div class="popup-box" id="confirmed_linked" style="display: none;">
</div>
