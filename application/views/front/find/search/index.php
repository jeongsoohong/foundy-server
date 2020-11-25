<!-- PAGE -->
<section class="page-section with-sidebar" style="padding-top: 10px !important;">
  <div class="container find-search-container">
    <?php if ($center_cnt == 0 and $teacher_cnt == 0) { ?>
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
  <div class="col-md-12 content" id="center-content" style="background-color: white !important;">
    <div id="blog-content">
      <!-- center -->
        <div class="col-md-12" style="padding: 0 0 0 0 !important; ">
          <div class="row">
            <div class="col-md-12" style="padding: 0 0 0 0 !important;">
              <div class="profile" style="font-size: 15px; padding: 5px 10px 5px 10px !important; text-align: center">
                <span>스튜디오</span>
              </div>
              <div class="widget" style="padding-bottom:10px; ">
                <!-- ajax_center_list() -->
                <ul class="center_ul">
                
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
    <div class="col-md-12 content" id="teacher-content" style="background-color: white !important;">
      <div id="blog-content">
        <!-- teacher -->
        <div class="col-md-12" style="padding: 0 0 0 0 !important; ">
          <div class="row">
            <div class="col-md-12" style="padding: 0 0 0 0 !important;">
              <div class="profile" style="font-size: 15px; padding: 5px 10px 5px 10px !important; text-align: center">
                <span>강사</span>
              </div>
              <div class="widget" style="padding-bottom:10px; ">
                <!-- ajax_teacher_list() -->
                <ul class="teacher_ul">
                
                </ul>
                <!-- /ajax_teacher_list() -->
              </div>
            </div>
          </div>
        </div>
        <p style="text-align: center;">
          <a class="btn btn-lg btn-primary" id="teacher_view_more" href="#none" onclick="ajax_teacher_list(); return false;" role="button" style="display: none; font-family: 'Quicksand' !important; font-size: 15px; color: gray; background-color: inherit; border: 1px solid #d3d3d3">
            view more
          </a>
        </p>
      </div>
      <!-- /teacher -->
      <!-- /CONTENT -->
      <?php } ?>
    </div>
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
        $('.center_ul').append(data);
        
        var listCnt = $(".center_ul li").length;
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
        $('.teacher_ul').append(data);
        
        var listCnt = $(".teacher_ul li").length;
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
    $('#teacher-content').hide();
    <?php } else { ?>
    ajax_teacher_list();
    <?php } ?>
    

    <?php if ($center_cnt == 0 and $teacher_cnt == 0) { ?>
    //$('.find-search-container').append('<div style=\'margin-top: 100px; text-align: center; font-size: 16px\'>Oops!! 아무것도 찾지 못했어요 ㅠㅠ</div>');
    <?php } ?>
  });
</script>
