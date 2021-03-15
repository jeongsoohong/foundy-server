<style>
</style>
<h2 class="boxwrap__type meaning">강사 정보</h2>
<div class="boxwrap__info">
  <div class="info--tit">
    <a href="#" class="tit_theme">
      기본정보
      <div class="theme_arrow">
        <img src="<?= base_url(); ?>template/back/center/imgs/icon_next.png" width="6" height="auto">
        <img src="<?= base_url(); ?>template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">
      </div>
    </a>
  </div>
  <div class="info--contents scroll-y_hidden">
    <section class="contents_type contents_teacher scroll-y">
      <h3 class="meaning">강사 정보</h3>
      <div class="type_wrap val_wrap shadow" id="topic">
        <div class="stu_box stu_val ">
          <button class="stu_btn btn_save" onclick="update_teacher()">저장</button>
          <p class="type_tit stu_tit" style="padding: 4px 0 24px;">강사 정보</p>
          <dl class="type_detail stu_detail clearfix">
            <dt class="area_tit stu_name">강사 이름</dt>
            <dd class="area_data name_data" style="margin-bottom: 10px;">
              <input class="data_name gray_bg" id="teacher_name" type="text" value="<?= $teacher->name; ?>" disabled>
            </dd>
          </dl>
        </div>
        <div class="stu_box stu_sns" id="sns">
          <p class="type_tit stu_tit" style="padding: 4px 0 24px;">SNS 정보</p>
          <dl class="type_detail stu_detail clearfix">
            <dt class="area_tit stu_name">인스타그램 url</dt>
            <dd class="area_data name_data">
              <input class="data_name" id="instagram_url" type="text" value="<?= $teacher->instagram; ?>">
            <dt class="area_tit stu_name">유튜브 url</dt>
            <dd class="area_data name_data">
              <input class="data_name" id="youtube_url" type="text" value="<?= $teacher->youtube; ?>">
            </dd>
          </dl>
        </div>
        <div class="stu_box stu_img">
          <div class="clearfix">
            <p class="type_tit stu_tit pull-left" style="padding: 4px 0 24px;">이미지 등록</p>
            <p class="txt__add pull-left" style="padding: 8px 0 0 30px;">유저들이 온라인 클래스를 등록한 강사님 프로필을 클릭했을 시 보여줄 대문 이미지입니다.</p>
          </div>
          <dl class="type_detail stu_detail clearfix">
            <dt class="area_tit stu_name">대문 이미지 등록</dt>
            <dd class="area_data name_data add_photo">
              <p class="data_limit img_guide">권장 이미지 사이즈는 1000 * 500 px, 이미지 용량은 최대 16MB까지 업로드 가능합니다.
                <br>노출되는 위치에 따라 이미지가 잘려 보일 수 있으므로 인물이 중앙에 위치한 사진을 추천드립니다.</p>
              <label type="file" class="data_form file_form">파일열기
                <span class="file_alert" style="color: #bdbdbd;">(사진 추가를 하지 않으면 온라인 스튜디오 메인이미지로 반영됩니다.)</span>
                <span class="file_arrow"></span>
                <input type="file" id="teacher_profile_img" value="파일열기" onchange="profile_image_preview(this)">
                <script>
                  $(function(){
                    // img src값 넣기
                    // file_arrow 호버 이벤트
                    $('.add_photo').hover(function(){
                      $(this).find('.file_arrow').css('transform','rotate(225deg)')
                        .addClass('arrow_hover');
                    },function(){
                      $(this).find('.file_arrow').css('transform','rotate(45deg)')
                        .removeClass('arrow_hover');
                    })
                  })
                </script>
              </label>
              <? if (isset($teacher->profile_image_url) == true && empty($teacher->profile_image_url) == false) { ?>
                <div class="file_thumb" id="previewImg" style="display: block;">
                  <img src="<?= $teacher->profile_image_url; ?>" alt="" class="thumb_img">
                </div>
              <? } else { ?>
                <div class="file_thumb" id="previewImg" style="display: none;">
                  <img src="" alt="" class="thumb_img">
                </div>
              <? } ?>
              <label class="form-chk col_sp" style="width: 100%; margin-top: 20px;">
                <input name="no_profile_image" id="no_profile_image" type="checkbox">
                프로필 이미지 사용 안함
              </label>
              <script>
                $(function() {
                  $('#no_profile_image').click(function() {
                    if ($(this).prop('checked') === true) {
                      $('#previewImg').hide();
                    } else {
                      $('#previewImg').show();
                    }
                  });
                  <? if (isset($teacher->profile_image_url) == false || empty($teacher->profile_image_url) == true) { ?>
                  $('#no_profile_image').click();
                  <? } ?>
                });
              </script>
            </dd>
          </dl>
        </div>
        <div class="stu_box stu_area">
          <p class="type_tit stu_tit">클래스 분류</p>
          <div class="stu_yoga" style="margin-bottom: 16px;">
            <div class="class_chkbox">
              <div class="chkbox_line clearfix">
                <?php
                $count = 0;
                $categories = $this->db->order_by('category_id', 'asc')->get('category_class')->result();
                foreach ($categories as $category) {
                $category_id = $category->category_id;
                $name = $category->name;
                $count++;
                ?>
                <?php if ($count % 5 == 0) { ?>
              </div>
              <div class="chkbox_line clearfix">
                <?php } ?>
                <label class="form-chk col_sp" style="width: 80px;">
                  <input name="category_teach" type="checkbox" value="<?php echo $name;?>"
                    <?php if(in_array($name,$category_data)){ echo 'checked'; }?> id="<?php echo $category_id; ?>"/>
                  <?php echo $name; ?>
                </label>
                <?php } ?>
                <label class="form-chk col_sp">
                  <input <? if (!empty($category_etc)) echo 'checked'; ?> id="chkbox_yoga_etc" type="checkbox" name="number"> 기타
                  <span class="write_padding">
                    <input type="text" class="chk_write" id="category_teach_etc" name="category_teach_etc"
                           value="<?= $category_etc; ?>">
                  </span>
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="type_box about_box shadow" id="info">
          <p class="type_tit sch_tit">About</p>
          <p class="txt__add" style="margin: -14px 0 20px;">- 유저들이 온라인 클래스를 등록한 강사님 프로필을 클릭했을 시 보여줄 소개정보입니다.
          </p>
          <!--          <button class="sch_btn btn_save">저장</button>-->
          <form class="addinfo_textbox">
            <div class="remain_textarea">
              <p>남은 글자 수 <span class="remain_text"><strong class="remain_val"><?= 1000 - mb_strlen($teacher->about); ?></strong>자</span></p>
            </div>
            <textarea class="about_textarea" placeholder='"어떤 수업을 나누시나요? 간단하게 소개해 주세요" (최대 1,000자)'><?= $teacher->about; ?></textarea>
          </form>
        </div>
      </div>
    </section>
  </div>
</div>
<script>
  
  function profile_image_preview(target) {
    preview_img(target, 'previewImg');
    target = $('#no_profile_image');
    if (target.prop('checked') === true) {
      target.click();
    }
  }
  
  $(function() {
    // textarea 입력 이벤트
    $('.about_textarea').on('keyup',function(){
      var input = $(this).val().length;
      var left = 1000 - input;
      $('.remain_val').text(left);
      
      if($(this).val().length > 1000) {
        alert("글자수는 1,000자 이내로 제한됩니다.");
        $(this).val($(this).val().substring(0,1000));
        $('.remain_val').text(0);
        // left = 0;
      }
    })
    add_menu_active('teacher');
  });

  function update_teacher() {
    let teacher_name = $('#teacher_name').val().trim();
    let instagram = $('#instagram_url').val().trim();
    let youtube = $('#youtube_url').val().trim();
    let about = $('.about_textarea').val().trim();
    let category = [];
    let category_etc = '';
    let profile_image = '';
    let no_profile_image = $('#no_profile_image').prop('checked') === true ? 1 : 0;
  
    if (teacher_name === '') {
      alert('강사 이름을 정확히 입력해주세요.');
      return false;
    }
    if (instagram !== '') {
      if (isValidHttpUrl(instagram) === false) {
        alert('인스타그램 주소를 정확히 입력바랍니다!');
        return false;
      }
    }
    if (youtube !== '') {
      if (isValidHttpUrl(youtube) === false) {
        alert('유튜브 주소를 정확히 입력바랍니다!');
        return false;
      }
    }
    if (about === '') {
      alert('강사 정보를 정확히 입력해주세요.');
      return false;
    }
    
    $.each($('.stu_yoga').find("[name='category_teach']"), function(index, item) {
      if ($(item).prop('checked') === true) {
        category.push($(item).val());
      }
    });
    
    let target = $('#teacher_profile_img');
    if (target.val() !== '') {
      profile_image = target[0].files[0];
    } else {
      if (no_profile_image === 0) {
        // alert('프로필 이미지 사용을 위해서는 사진파일을 등록해주십시요!!')
        // return false;
      }
    }
  
    if ($('#chkbox_yoga_etc').prop('checked') === true) {
      category_etc = $('#category_teach_etc').val().trim();
    }
    
    let url = '<?php echo base_url()."studio/teacher/update"; ?>';
    let data = [];
    data['teacher_name'] = teacher_name;
    data['instagram'] = instagram;
    data['youtube'] = youtube;
    data['about'] = about;
    data['no_profile_image'] = no_profile_image;
    data['profile_image'] = profile_image;
    data['category'] = JSON.stringify(category);
    data['category_etc'] = category_etc;
    
    // console.log(data);
    
    send_post(data, url, true, '');
  }
</script>