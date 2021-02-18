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
    background-position: top center;
    background-size: cover;
    background-attachment: scroll;
  }
  
  #classTeacherDetail {
    padding: 20px 16px 0;
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
  #classTeacherDetail .teacher__tit {
    height: 40px;
    line-height: 40px;
    position: relative;
  }
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
  
  /* teacher__search */
  .teacher__search {
    position: relative;
    width: 100%;
    height: 36px;
    margin: 4px 0 12px;
  }
  .search--form {
    width: 100%;
    height: inherit;
    padding: 0 36px 0 10px;
    color: #616161;
    font-size: 12px;
    font-weight: normal;
    border: 1px solid #f3eee8;
    border-radius: 4px;
  }
  .search--btn {
    position: absolute;
    top: 0;
    right: 0;
    width: 36px;
    height: 36px;
    border: 0;
    background-color: #f3eee8;
    border-radius: 0 4px 4px 0;
  }
  #search_keyword {
    -webkit-appearance: none;
  }
</style>
<section class="page-section with-sidebar" style="padding-top: 0 !important; padding-bottom: 0 !important; background-color: white">
  <div class="container" id="fd-class">
    <div class="row">
      <div class="col-md-12 content" id="content" style="background-color: white !important;">
        <div id="blog-content">
          <div class="col-md-12" style="padding: 0 0 0 0 !important; ">
            <div class="row">
              <div class="col-md-12 class-teacher" id="classTeacherDetail">
                <div class="teacher__tit clearfix">
                  <p class="tit--topic font-futura">FOUNDERS</p>
                  <div class="pull-right" style="width: 32%; height: 40px; position: absolute; float: none !important; right: 24px;">
                    <select class="form-control select-arrow" id="class_category" name="class_category" style="height: inherit; text-align-last: unset; direction: rtl; border: 0; padding: 6px 0;">
                      <option <?= $filter == 'ALL' ? 'selected' : ''; ?> value="ALL">ALL</option>
                      <?php
                      $categories = $this->db->order_by('category_id', 'asc')->get_where('category_class', array('activate' => 1))->result();
                      foreach ($categories as $cat) {
                        ?>
                        <option <?= $filter == $cat->name ? 'selected' : ''; ?> value="<?php echo $cat->name; ?>"><?php echo $cat->name; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="pull-right" style="position: absolute; right: 0; width: 5%; text-align: right; height: 40px; line-height: 40px; color: grey">
                    <i class="fa fa-angle-down"></i>
                  </div>
                </div>
                <div class="teacher__search">
                  <input id="search_keyword" value="<?= $search; ?>" type="text" class="search--form" placeholder="찾으시려는 강사 회원을 검색하세요">
                  <button class="search--btn" onclick="search_teacher()">
                    <img height="16" width="16" src="<?= base_url(); ?>uploads/icon_0504/icon07_find.png" style="margin-bottom: 4px;">
                  </button>
                </div>
                <div class="teacher__data">
                  <!-- ajax teacher list -->
                </div>
              </div>
            </div>
          </div>
          <div style="margin-bottom: 10px !important;">
            <p style="text-align: center; margin-bottom: 0">
              <a class="btn btn-lg btn-primary" id="view_more" onclick="ajax_teacher_list();" role="button" style="font-family: 'Quicksand' !important; font-size: 15px; color: gray; background-color: inherit; border: 1px solid #d3d3d3">
                view more
              </a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div></section>
<script>
  let page = 0;
  let filter = '<?= $filter; ?>';
  let search = '<?= $search; ?>'
  
  function ajax_teacher_list() {
    page = page + 1;
    // console.log('page : ' + page + ', filter : ' + filter + ', search : ' + search);
    $.ajax({
      url: "<?= base_url(); ?>/home/find/teacher/list?page=" + page + '&filter=' + filter + '&search=' + search,
      type: 'GET', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      success: function(data) {
        let prevCnt = $(".teacher__data .data--profile").length;
        $('.teacher__data').append(data);
        let listCnt = $(".teacher__data .data--profile").length;
        if ( listCnt === 0 || listCnt % 1 !== 0 || prevCnt === listCnt) {
          $('#view_more').hide();
        } else {
          $('#view_more').show();
        }
        // console.log(prevCnt);
        // console.log(listCnt);
      },
      error: function(e) {
        console.log(e)
      }
    });
    // $('#page_num').val(page);
  }
  
  $(function() {
    $("#class_category").change(function() {
      // console.log(this.value);
      location.href = '<?= base_url(); ?>home/find/teacher?filter=' + this.value;
    });
  })
  
  function search_teacher() {
    // console.log($('#search_keyword').val());
    location.href = '<?= base_url(); ?>home/find/teacher?search=' + $('#search_keyword').val();
  }
  
  $(document).ready(function(){
    page = 0;
    filter = $("#class_category option:selected").val();
    
    active_menu_bar('find');
    ajax_teacher_list();
  });
</script>
