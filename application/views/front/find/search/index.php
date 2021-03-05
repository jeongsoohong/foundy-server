<!-- PAGE -->
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
  .content-area {
    background-color: #fff;
  }
  /* Recommend Zoom Class */
  .upcoming_wrap {
    margin-bottom: 20px;
  }
  
  .btn_more {
    display: block;
    width: 108px;
    height: 36px;
    margin: 0 auto 20px;
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
  
  #classTeacher {
    padding: 20px 0 0;
  }
  #fd-class .clearfix::after {
    content: "";
    display: block;
    clear: both;
  }
  #classCenter .teacher__tit,
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
    
    text-align: center;
    border-bottom: 1px dotted #ccc;
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
    padding: 12px 16px 0;
  }
  .list--profile {
    display: inline-block;
    margin-right: 16px;
    text-align: center;
    width: 48px;
    vertical-align: top;
  }
  .profile_txt {
    white-space: normal;
    display: block;
    width: inherit;
    color: #333;
    font-size: 10px;
    word-break: break-all;
    line-height: 1.5;
  }
  .list--profile:last-child {
    margin-right: 0;
  }
  .profile_circle {
    margin-bottom: 8px;
    width: 72%;
    padding-bottom: 72%;
    /*border-radius: 24px;*/
    background-color: #eee;
    position: relative;
    border-radius: 50%;
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    background-attachment: scroll;
  }
  #classCenter {
    padding: 12px 0;
  }
  #classTeacherDetail {
    padding: 12px 16px 0;
    border-top: 4px solid #F3EFEB;
  }
  .detail--profile {
    display: block;
    width: 100%;
    position: relative;
    margin-bottom: 16px;
    font-size: 0;
  }
  .detail--profile a {
    display: inline-block;
  }
  .profile_info {
    float: left;
  }
  .profile_favorite {
    position: absolute;
    background: none;
    border: 0;
    width: 44px;
    height: 44px;
    top: 50%;
    right: 0;
    padding: 0;
    margin-top: -30px;
  }
  #classCenter .teacher__tit,
  #classTeacherDetail .teacher__tit {
    height: 40px;
    line-height: 40px;
    position: relative;
    margin-bottom: 12px;
  }
  #classCenter .tit--topic,
  #classTeacherDetail .tit--topic {
    margin: 0;
    width: 100%;
    height: inherit;
    line-height: inherit;
  }
  .teacher__data {
    padding: 12px 0;
  }
  .info_photo {
    margin: 0 8px 0 0;
    vertical-align: middle;
    width: 64px;
    height: 64px;
    padding: 0;
    border-radius: 50%;
  }
  .info_photo, .info_teacher {
    display: inline-block;
  }
  .info_teacher {
    vertical-align: middle;
  }
  .info_teacher p {
    margin: 0;
  }
  .teacher-name {
    color: #333;
    font-size: 12px;
    font-weight: bold;
  }
  .teacher-class {
    color: #616161;
    font-size: 10px;
    font-weight: normal;
  }
  
  .content-area .page-section .container {
    padding: 0 15px !important;
    margin: 0 auto !important;
  }
</style>
<section class="page-section with-sidebar" style="padding: 0 !important;">
  <?php if ($center_cnt == 0 and $teacher_cnt == 0) { ?>
    <div class="container find-search-container">
      <div style="padding: 0; border: 0; font-family: sans-serif; min-width: 320px; font-size: 0; text-align: center; width: 260px; margin: 84px auto 0;">
        <div>
          <div>
            <img src="<?php echo base_url(); ?>template/icon/exclamation_sandy.png" width="32" height="32">
            <h2 style="font-family: 'Futura PT' !important; display: inline-block; color: #111; font-size: 32px; font-weight: normal !important; line-height: 32px; margin: 0 0 0 12px; vertical-align: top;">Oops!</h2>
          </div>
          <p style="padding: 0; margin: 20px 0 0 0; color: #757575; font-size: 16px; font-weight: normal; line-height: 1.65; text-align: center;">검색 결과가 없습니다!
            <br>다른 검색어를 입력해주세요.</p>
        </div>
        <a href="http://pf.kakao.com/_xnzxbxaxb/chat" target="_blank" style="display: block; text-decoration: none; background-color: #ad796d; box-sizing: border-box; padding: 16px; color: #fff; font-size: 14px; font-weight: normal; line-height: 1.75; border-radius: 0 20px; width: 260px; margin: 24px auto 0;">
          센터 및 강사정보 등록을 원하신다면
          <br><strong>카카오톡 ‘파운디’</strong>로 문의주세요!
        </a>
      </div>
    </div>
  <?php } else { ?>
    <div class="container" id="fd-class">
      <div class="row">
        <div class="col-md-12 content" id="content" style="background-color: white !important;">
          <div id="center-content">
            <!-- center -->
            <div class="col-md-12" style="padding: 0 0 0 0 !important; ">
              <div class="row">
                <div class="col-me-12 class-center" id="classCenter">
                  <div class="teacher__tit clearfix">
                    <p class="tit--topic">스튜디오</p>
                  </div>
                  <div class="widget" style="padding-bottom:10px; ">
                    <!-- ajax_center_list() -->
                    <ul class="bookmark_video_ul" id="center_ul">
                  
                    </ul>
                    <!-- /ajax_center_list() -->
                  </div>
                </div>
              </div>
            </div>
            <p style="text-align: center;">
              <a class="btn btn-lg btn-primary" id="center_view_more" href="#none" onclick="ajax_center_list(); return false;" role="button" style="display: none; font-family: 'Quicksand' !important; font-size: 15px; color: gray; background-color: inherit; border: 1px solid #d3d3d3">
                view more
              </a>
            </p>
          </div>
          <!-- /center -->
        </div>
        <!-- /CONTENT -->
        <!-- CONTENT -->
        <div class="col-md-12 class-teacher" id="classTeacherDetail">
          <div class="teacher__tit clearfix">
            <p class="tit--topic font-futura">FOUNDERS</p>
          </div>
          <!-- ajax_teacher_list() -->
          <div class="teacher__data" id="teacher_ul">
          </div>
          <!-- /ajax_teacher_list() -->
          <p style="text-align: center;">
            <a class="btn btn-lg btn-primary" id="teacher_view_more" href="#none" onclick="ajax_teacher_list(); return false;" role="button" style="display: none; font-family: 'Quicksand' !important; font-size: 15px; color: gray; background-color: inherit; border: 1px solid #d3d3d3">
              view more
            </a>
          </p>
          
        </div>
        <!-- /teacher -->
        <!-- /CONTENT -->
      </div>
    </div>
  <?php } ?>
</section>
<script>
  var center_page = 0;
  var teacher_page = 0;
  var center_type = <?php echo FIND_TYPE_CENTER; ?>;
  var teacher_type = <?php echo FIND_TYPE_TEACHER; ?>;
  var q = '<?php echo $q; ?>';
  var center_cnt = <?php echo $center_cnt; ?>;
  var teacher_cnt = <?php echo $teacher_cnt; ?>;
  
  function ajax_center_list() {
    center_page = center_page + 1;
    $.ajax({
      url: "<?php echo base_url().'home/find/search/list?q='; ?>" + q + '&page=' + center_page + '&type=' + center_type,
      type: 'GET', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      success: function(data) {
        $('#center_ul').append(data);
        
        var listCnt = $("#center_ul li").length;
        if (listCnt < center_cnt) {
          $('#center_view_more').show();
        } else {
          $('#center_view_more').hide();
        }
      },
      error: function(e) {
        console.log(e)
      }
    });
  }
  
  function ajax_teacher_list() {
    teacher_page = teacher_page + 1;
    $.ajax({
      url: "<?php echo base_url().'home/find/search/list?q='; ?>" + q + '&page=' + teacher_page + '&type=' + teacher_type,
      type: 'GET', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      success: function(data) {
        $('#teacher_ul').append(data);
        
        var listCnt = $("#teacher_ul div").length;
        if (listCnt < teacher_cnt) {
          $('#teacher_view_more').show();
        } else {
          $('#teacher_view_more').hide();
        }
      },
      error: function(e) {
        console.log(e)
      }
    });
  }
  
  $(document).ready(function(){
    center_page = 0;
    teacher_page = 0;
    
    // active_menu_bar('find');
    <?php if ($center_cnt == 0) { ?>
    $('#center-content').hide();
    <?php } else { ?>
    ajax_center_list();
    <?php } ?>
    
    <?php if ($teacher_cnt == 0) { ?>
    $('#classTeacherDetail').hide();
    <?php } else { ?>
    ajax_teacher_list();
    <?php } ?>
    
    
    <?php if ($center_cnt == 0 and $teacher_cnt == 0) { ?>
    //$('.find-search-container').append('<div style=\'margin-top: 100px; text-align: center; font-size: 16px\'>Oops!! 아무것도 찾지 못했어요 ㅠㅠ</div>');
    <?php } ?>
  });
</script>
