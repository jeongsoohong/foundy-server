<h2 class="boxwrap__type meaning">유튜브 클래스</h2>
<div class="boxwrap__info" id="youtube">
  <div class="info--tit">
    <a href="#" class="tit_theme">
      클래스 올리기
      <div class="theme_arrow">
        <img src="<?= base_url(); ?>template/back/center/imgs/icon_next.png" width="6" height="auto">
        <img src="<?= base_url(); ?>template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">
      </div>
    </a>
    <a href="#" class="tit_theme">
      클래스 관리
      <div class="theme_arrow">
        <img src="<?= base_url(); ?>template/back/center/imgs/icon_next.png" width="6" height="auto">
        <img src="<?= base_url(); ?>template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">
      </div>
    </a>
  </div>
  <div class="info--contents scroll-y_hidden">
    <section class="contents_type contents_studio scroll-y" id="youtube_up">
      <h3 class="meaning">클래스 올리기</h3>
      <div class="type_wrap val_wrap shadow" id="topic">
        <div class="stu_box stu_val class_box">
          <p class="type_tit stu_tit youtube_tit" style="padding: 4px 0 24px;">
            클래스 올리기
            <!-- <button class="stu_btn btn_save save_youtube">저장</button> -->
          </p>
          <button class="stu_btn btn_save save_youtube" onclick="register_youtube()">저장</button>
          <div class="youtube_message">
            <span class="read theme:sns read:youtube">**유투브 동영상만 지원이 됩니다. 수업 분류 기타에 여러 분류 입력 시 공백으로 구분해 주세요.</span>
          </div>
        </div>
        <div class="stu_box stu_sns class_box">
          <dl class="type_detail stu_detail clearfix">
            <dt class="area_tit stu_name">타이틀</dt>
            <dd class="area_data name_data">
              <input class="data_name" type="text" id="title">
            <dt class="area_tit stu_name">수업 한줄 설명</dt>
            <dd class="area_data name_data">
              <input class="data_name" type="text" id="desc">
            </dd>
            <dt class="area_tit stu_name">유튜브 url</dt>
            <dd class="area_data name_data">
              <input class="data_name" type="text" id="youtube_url">
            </dd>
            <dt class="area_tit stu_name">수업분류</dt>
            <dd class="area_data name_data youtube_data">
              <p class="data_chkTip">수업 분류는 최대 3가지만 선택 가능합니다.</p>
              <div class="stu_yoga stu_class">
                <div class="class_chkbox">
                  <div class="chkbox_line clearfix">
                    <?php
                    $categories = $this->db->order_by('category_id', 'asc')->get('category_class')->result();
                    foreach ($categories as $category) {
                      $category_id = $category->category_id;
                      $name = $category->name;
                      ?>
                      <label class="form-chk col_sp" style="width: 80px;">
                        <input id="<?php echo $category_id; ?>" name="category" type="checkbox" value="<?= $name; ?>">
                        <?= $name; ?>
                      </label>
                      <?php
                    }
                    ?>
                    <label class="form-chk col_sp">
                      <input id="chkbox_etc" type="checkbox" name="number"> 기타
                      <span class="write_padding">
                        <input type="text" class="chk_write" id="category_etc" name="category_etc" value="">
                      </span>
                    </label>
                  </div>
                </div>
              </div>
            </dd>
          </dl>
        </div>
      </div>
    </section>
    <section class="contents_type contents_studio scroll-y" id="youtube_manage">
      <h3 class="meaning">클래스 관리</h3>
      <div class="type_wrap">
        <div class="stu_box stu_val manage_box shadow class_box">
          <p class="type_tit stu_tit youtube_tit" style="padding: 4px 0 24px;">
            클래스 관리
          </p>
          <div class="video_ul" id="video">
            <!-- youtube list -->
          </div>
          <!-- 11개 이상 부터는 숨겨둔 상태에서 MORE 버튼 클릭시 li slideUp 기능 추가 부탁드립니다 -->
          <button class="font-futura youtube_more" style="font-weight: bold !important;" id="view_more" onclick="get_youtube_list();">MORE</button>
        </div>
        <div class="type_wrap val_wrap shadow" id="topic2" style="display: none;">
          <!-- youtube manage -->
        </div>
      </div>
    </section>
  </div>
</div>
<div class="popup-box">
  <div class="popup theme:alert_remove_this" id="popYoutubeRemove" style="display: none;">
    <div class="popup_cnt">
      <div class="guide_box confirm_box" style="padding-top: 36px; margin-bottom: 16px;">
        <img src="<?= base_url(); ?>template/back/center/imgs/exclamation_mark.png" alt="" width="40" height="40" class="guide_icon">
        <p class="confirm_message" style="line-height: 40px">해당 클래스를 <strong>삭제</strong>하시겠습니까?</p>
      </div>
      <p class="confirm_message" style="line-height: 1.75;width: 250px;font-size: 13px;margin: 0 auto;color: #9e9e9e;">현재 클래스에 해당되는 콘텐츠가 목록에서 삭제될 수 있습니다!</p>
      <div class="confirm_btn">
        <button class="btn_cancel font-futura" id="alert_cancel" onclick="close_unregister_youtube()">CANCEL</button>
        <button class="btn_ok font-futura" id="alert_ok" onclick="unregister_youtube()">OK</button>
      </div>
    </div>
  </div>
  <div class="popup theme:alert_remove_this" id="popYoutubeSave" style="display: none;">
    <div class="popup_cnt">
      <div class="guide_box confirm_box" style="padding-top: 36px; margin-bottom: 16px;">
        <img src="<?= base_url(); ?>template/back/center/imgs/information_mark.png" alt="" width="40" height="40" class="guide_icon">
        <p class="confirm_message" style="line-height: 40px">수정한 내용을 <strong>저장</strong>하시겠습니까?</p>
      </div>
      <p class="confirm_message" style="line-height: 1.75;width: 250px;font-size: 13px;margin: 0 auto;color: #9e9e9e;">해당 클래스에 해당되는 콘텐츠 내용이 변경될 수 있습니다!</p>
      <div class="confirm_btn">
        <button class="btn_cancel font-futura" id="alert_cancelSave" onclick="close_manage_youtube()">CANCEL</button>
        <button class="btn_ok font-futura" id="alert_okSave" onclick="update_youtube()">OK</button>
      </div>
    </div>
  </div>
</div>
<script>
  
  let page = 0;
  function get_youtube_list() {
    page = page + 1;
    $.ajax({
      url: "<?php echo base_url().'studio/youtube/list?page='; ?>" + page,
      type: 'GET', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      success: function(data) {
        let prevCnt = $(".video_ul .video_cnt").length;
        $('.video_ul').append(data);
        // console.log($(".video_ul .video_cnt a").length % 10);
        let listCnt = $(".video_ul .video_cnt").length;
        if ( listCnt === 0 || listCnt % <?= $this->teacher_model::TEACHER_VIDEO_PAGE_SIZE; ?> !== 0 || prevCnt === listCnt) {
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
  
  function register_youtube() {
    let title = $('#title').val().trim();
    let desc = $('#desc').val().trim();
    let video_url = $('#youtube_url').val().trim();
    let category = [];
    let category_etc = '';
    
    if (title === '') {
      alert('타이틀을 정확히 입력해주세요.');
      return false;
    }
    if (desc === '') {
      alert('한줄 설명을 정확히 입력해주세요.');
      return false;
    }
    if (video_url === '') {
      alert('유튜브 주소를 정확히 입력해주세요.');
      return false;
    }
    if (isValidHttpUrl(video_url) === false) {
      alert('유튜브 주소를 정확히 입력해주세요.');
      return false;
    }
    
    $.each($('.stu_yoga').find("[name='category']"), function(index, item) {
      if ($(item).prop('checked') === true) {
        category.push($(item).val());
      }
    });
    
    if ($('#chkbox_etc').prop('checked') === true) {
      category_etc = $('#category_etc').val().trim();
    }
    
    let url = '<?php echo base_url()."studio/youtube/register"; ?>';
    let data = [];
    data['title'] = title;
    data['desc'] = desc;
    data['video_url'] = video_url;
    data['category'] = JSON.stringify(category);
    data['category_etc'] = category_etc;
    
    // console.log(data);
    
    send_post(data, url, true, '');
  }
 
  let unregister_youtube_id = 0;
  function open_unregister_youtube(id) {
    unregister_youtube_id = id;
    $('.popup-box').show().find('#popYoutubeRemove').show();
  }
  
  function close_unregister_youtube() {
    $('.popup-box').hide().find('#popYoutubeRemove').hide();
  }
  
  function unregister_youtube() {
    if (unregister_youtube_id <= 0) {
      alert('잘못된 접근입니다!');
      return false;
    }
    
    let url = '<?php echo base_url()."studio/youtube/unregister"; ?>';
    let data = [];
    data['id'] = unregister_youtube_id;
    
    // console.log(data);
    
    send_post(data, url, true, '');
  }

  function open_manage_youtube() {
    $('.popup-box').show().find('#popYoutubeSave').show();
  }
  function close_manage_youtube() {
    $('.popup-box').hide().find('#popYoutubeSave').hide();
  }
  
  let manage_youtube_id = 0;
  function get_youtube(id) {
    // console.log(id);
    get_page('topic2', '<?php echo base_url(); ?>studio/youtube/manage?id='+id, true);
    manage_youtube_id = id;
    $('#topic2').show();
    move('topic2','youtube_manage', 500);
  }

  function update_youtube() {
    if (manage_youtube_id <= 0) {
      alert('잘못된 접근입니다!');
      return false;
    }
    
    let category = [];
    let category_etc = '';
  
    $.each($('#manage_youtube_category').find("[name='category']"), function(index, item) {
      if ($(item).prop('checked') === true) {
        category.push($(item).val());
      }
    });
  
    if ($('#manage_chkbox_etc').prop('checked') === true) {
      category_etc = trim($('#manage_category_etc').val());
    }
  
    let url = '<?php echo base_url()."studio/youtube/update"; ?>';
    let data = [];
    data['id'] = manage_youtube_id;
    data['title'] = trim($('#manage_youtube_title').val());
    data['desc'] = trim($('#manage_youtube_desc').val());
    data['category'] = JSON.stringify(category);
    data['category_etc'] = category_etc;
  
    console.log(data);
  
    send_post(data, url, true, '');
  }
  
  $(function() {
    get_youtube_list();
    add_menu_active('youtube');
  })
</script>