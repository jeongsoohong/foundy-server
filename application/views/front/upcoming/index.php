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
  
  
  /* 스타일 추가 */
  .wide .content-area,
  .wide .page-section {
    background-color: #F9F7F4;
  }
  
  .wide .page-section {
    padding-top: 20px !important;
  }
  
  /*
        #up {
          border-radius: 4px;
          box-shadow: 0 2px 4px rgba(0,0,0,0.08);
        }
        #up .upcoming_schedule {
          margin: 0;
          border-bottom: 1px solid #eee;
        }
        #up .upcoming_schedule:first-child {
          border-radius: 4px 4px 0 0;
        }
        #up .upcoming_schedule:last-child {
          border-radius: 0 0 4px 4px;
          border: 0;
        }
  */
  .up .upcoming_schedule  {
    border-radius: 4px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.08);
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
  
  .divide-upcoming {
    float: left;
    width: 50%;
    height: 40px;
    color: #433532;
    background-color: #fff;
    border: 0;
    outline: none;
    padding: 0;
    border-bottom: 3px solid #ded5c3;
    cursor: pointer;
  }
  .Unselected {
    color: #bdbdbd !important;
    background-color: #e8e8e8 !important;
    border-bottom: 3px solid #e8e8e8 !important;
  }
  .divideCnts .upcoming_schedule:first-child {
    margin-top: 12px;
  }
</style>
<section class="page-section with-sidebar">
  <div class="container" id="fd-class" style="padding: 0 15px !important;">
    <div class="row">
      <div class="col-md-12 content" id="content">
        <div id="blog-content">
          <div class="divideBtn clearfix">
            <button class="divide-upcoming font-futura" id="divide-upcoming-class" data-id="class">Upcoming Class</button>
            <button class="divide-upcoming font-futura" id="divide-upcoming-zoom" data-id="zoom">Upcoming Zoom</button>
          </div>
          <div class="divideCnts">
            <div class="Cnt__layer Cnt-class" id="upcoming-class" style="display: none;">
              <div class="col-md-12" style="padding: 0 0 0 0 !important; ">
                <div class="row">
                  <div class="col-md-12 main-upcoming coming upcomingAll">
                    <div class="upcoming_wrap up" id="class_list">
                      <!-- CLASS LIST -->
                      <!-- /CLASS_LIST -->
                    </div>
                  </div>
                </div>
              </div>
              <div style="margin-bottom: 10px !important;">
                <p style="text-align: center; margin-bottom: 0">
                  <a class="btn btn-lg btn-primary" id="class_view_more" onclick="ajax_class_list();" role="button" style="font-size: 15px; color: gray; background-color: inherit; border: 1px solid rgb(211, 211, 211); font-family: Quicksand !important; display: none;">
                    view more
                  </a>
                </p>
              </div>
            </div>
            <div class="Cnt__layer Cnt-zoom" id="upcoming-zoom" style="display: none;">
              <div class="col-md-12" style="padding: 0 0 0 0 !important; ">
                <div class="row">
                  <div class="col-md-12 main-upcoming coming upcomingAll">
                    <div class="upcoming_wrap up" id="zoom_list">
                      <!-- ZOOM LIST -->
                      <!-- /ZOOM LIST -->
                    </div>
                  </div>
                </div>
              </div>
              <div style="margin-bottom: 10px !important;">
                <p style="text-align: center; margin-bottom: 0">
                  <a class="btn btn-lg btn-primary" id="zoom_view_more" onclick="ajax_zoom_list();" role="button" style="font-size: 15px; color: gray; background-color: inherit; border: 1px solid rgb(211, 211, 211); font-family: Quicksand !important; display: none;">
                    view more
                  </a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  let class_page = 0;
  let zoom_page = 0;
  let class_type = <?php echo FIND_TYPE_CENTER; ?>;
  let zoom_type = <?php echo FIND_TYPE_TEACHER; ?>;
  let class_cnt = <?php echo $class_cnt; ?>;
  let zoom_cnt = <?php echo $zoom_cnt; ?>;
  
  function ajax_class_list() {
    class_page = class_page + 1;
    $.ajax({
      url: "<?php echo base_url().'home/upcoming/list?page='; ?>" + class_page + '&type=' + class_type,
      type: 'GET', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      success: function(data) {
        $('#class_list').append(data);
        
        let listCnt = $("#class_list .upcoming_schedule").length;
        if (listCnt < class_cnt) {
          $('#class_view_more').show();
        } else {
          $('#class_view_more').hide();
        }
        
        console.log('class_cnt : ' + class_cnt);
        console.log('class_list_cnt : ' + listCnt);
      },
      error: function(e) {
        console.log(e)
      }
    });
  }
  
  function ajax_zoom_list() {
    zoom_page = zoom_page + 1;
    $.ajax({
      url: "<?php echo base_url().'home/upcoming/list?page='; ?>"  + zoom_page + '&type=' + zoom_type,
      type: 'GET', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      success: function(data) {
        $('#zoom_list').append(data);
        
        let listCnt = $("#zoom_list .upcoming_schedule").length;
        if (listCnt < zoom_cnt) {
          $('#zoom_view_more').show();
        } else {
          $('#zoom_view_more').hide();
        }
        
        console.log('zoom_cnt : ' + zoom_cnt);
        console.log('zoom_list_cnt : ' + listCnt);
      },
      error: function(e) {
        console.log(e)
      }
    });
  }
  
  $(function(){
    //console.log(1);
    //$('.divide-upcoming').removeClass('Unselected');
    $('.divide-upcoming').click(function(){
      let index = $('.divide-upcoming').index(this);
      let id = $(this).data('id');
      console.log(id);
      $('.Cnt__layer').hide();
      $('.Cnt__layer').eq(index).show();
      $(this).removeClass('Unselected');
      $(this).siblings().addClass('Unselected');
    });
    
    <? if ($class_cnt > 0) { ?>
    ajax_class_list();
    <? } ?>
    <? if ($zoom_cnt > 0) { ?>
    ajax_zoom_list();
    <? } ?>
    
    <? if ($class_cnt > 0) { ?>
    $('#divide-upcoming-class').click();
    <? } else { ?>
    $('#divide-upcoming-zoom').click();
    <? } ?>
  
  });
</script>
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
