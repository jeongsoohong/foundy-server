<style>
  .note-editable{
    resize: none !important;
    *overflow-y: hidden !important; /* 스크롤이 생성되는것을 막아준다. */
    padding-top: .8em !important; /*엔터키로 인한 상단의 텍스트 깨짐 현상을 막아준다. */
    padding-bottom: 0.2em !important;
    padding-left: .25em !important;
    padding-right: .25em !important;
    line-height: 1.6 !important;
    min-height: 300px !important;
  }
  .note-editable iframe, .note-editable img {
    width: 100% !important;
    height: auto !important;
  }
  .note-toolbar {
    height: auto;
  }
  .note-editor.note-frame {
    border: 1px solid #a9a9a9 !important;
  }
  .note-toolbar {
    margin: 0 !important;
    padding: 0 0 5px 5px !important;
  }
  .panel-default>.panel-heading {
    border-color: #ddd !important;
  }
  .note-toolbar>.note-btn-group {
    margin-top: 5px !important;
    margin-left: 0 !important;
    margin-left: 5px !important;
  }
  .btn-group>.btn {
    border: 1px solid #ccc !important;
  }
  .note-codable {
    display: none !important;
  }
  input[type="file"] {
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
    z-index: 2;
  }
</style>
<h2 class="boxwrap__type meaning">스케줄</h2>
<div class="boxwrap__info">
  <div class="info--tit">
    <a href="#" class="tit_theme">
      기본정보
      <div class="theme_arrow">
        <img src="<?= base_url(); ?>template/back/center/imgs/icon_next.png" width="6" height="auto">
        <img src="<?= base_url(); ?>template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">
      </div>
    </a>
    <? if (!$register) { ?>
      <a href="#" class="tit_theme">
        추가정보
        <div class="theme_arrow">
          <img src="<?= base_url(); ?>template/back/center/imgs/icon_next.png" width="6" height="auto">
          <img src="<?= base_url(); ?>template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">
        </div>
      </a>
    <? } ?>
  </div>
  <div class="info--contents scroll-y_hidden">
    <section class="contents_type contents_studio scroll-y">
      <h3 class="meaning">스튜디오 정보</h3>
      <div class="type_wrap val_wrap shadow" id="topic">
        <div class="stu_box stu_val ">
          <? if ($register) { ?>
            <button class="stu_btn btn_save" onclick="register_studio();">신청</button>
          <? } else { ?>
            <button class="stu_btn btn_save" onclick="save_profile();">저장</button>
          <? } ?>
          <p class="type_tit stu_tit" style="padding: 4px 0 24px;">스튜디오 정보</p>
          <dl class="type_detail stu_detail clearfix">
            <dt class="area_tit stu_name">스튜디오 이름</dt>
            <dd class="area_data name_data" style="margin-bottom: 10px;">
              <input class="data_name gray_bg" type="text" value="<?=  $teacher->name; ?>" disabled>
              <span class="read">스튜디오 이름 변경시 담당자에게 연락주시기 바랍니다.</span>
            </dd>
          </dl>
        </div>
        <div class="stu_box stu_sns" id="sns">
          <p class="type_tit stu_tit" style="padding: 4px 0 24px;">SNS 정보</p>
          <dl class="type_detail stu_detail clearfix">
            <dt class="area_tit stu_name">인스타그램 url</dt>
            <dd class="area_data name_data">
              <input class="data_name gray_bg" type="url" id="instagram_url" value="<?= $teacher->instagram; ?>" disabled>
            <dt class="area_tit stu_name">유튜브 url</dt>
            <dd class="area_data name_data">
              <input class="data_name gray_bg" type="url" id="youtube_url" value="<?= $teacher->youtube; ?>" disabled>
            </dd>
            <dt class="area_tit stu_name">이메일</dt>
            <dd class="area_data name_data">
              <input class="data_name" type="email" id="studio_email" value="<? if (!$register) echo $studio->email; ?>">
              <span class="read theme:sns">*기재해주신 이메일 주소로 수업 관련 문의 글을 받을 예정이오니, <br>자주 사용하시는 이메일로 기재해 주세요!</span>
            </dd>
          </dl>
        </div>
        <div class="stu_box stu_sns" id="sns">
          <p class="type_tit stu_tit" style="padding: 4px 0 24px;">결제 페이지</p>
          <dl class="type_detail stu_detail clearfix">
            <dt class="area_tit stu_name">결제 페이지 url</dt>
            <dd class="area_data name_data">
              <input class="data_name" type="url" id="payment_page" value="<? if (!$register) echo $studio->payment_page; ?>">
          </dl>
        </div>
        <div class="stu_box stu_area">
          <p class="type_tit stu_tit">클래스 분류</p>
          <div class="stu_yoga" style="margin-bottom: 16px;">
            <div class="class_chkbox">
              <p class="tit_sm">요가 클래스</p>
              <div class="chkbox_line clearfix">
                <?php
                $count = 0;
                $categories = $this->db->order_by('category_id', 'asc')->get_where('category_studio', array('type' => CENTER_TYPE_YOGA))->result();
                foreach ($categories as $category) {
                $category_id = $category->category_id;
                $name = $category->name;
                $count++;
                ?>
                <?php if ($count % 5 == 0) { ?>
              </div>
              <div class="chkbox_line clearfix">
                <?php } ?>
                <label class="form-chk col_sp">
                  <input name="category_yoga" type="checkbox" value="<?php echo $name;?>"
                    <?php if(in_array($name,$category_yoga_data)){ echo 'checked'; }?> id="<?php echo $category_id; ?>"/>
                  <?php echo $name; ?>
                </label>
                <?php } ?>
                <label class="form-chk col_sp" id="chk_other">
                  <input id="chkbox_yoga_etc" <?php if (empty($category_yoga_etc) == false) echo 'checked'; ?> type="checkbox" name="number">
                  기타
                  <span class="write_padding">
                    <input type="text" class="chk_write" id="category_yoga_etc" name="category_yoga_etc" value="<?php echo $category_yoga_etc; ?>"/>
                  </span>
                </label>
              </div>
            </div>
          </div>
          <div class="stu_pilates">
            <p class="tit_sm">필라테스 클래스</p>
            <div class="class_chkbox">
              <div class="chkbox_line clearfix">
                <?php
                $count = 0;
                $categories = $this->db->order_by('category_id', 'asc')->get_where('category_studio', array('type' => CENTER_TYPE_PILATES))->result();
                foreach ($categories as $category) {
                $category_id = $category->category_id;
                $name = $category->name;
                $count++;
                ?>
                <?php if ($count % 5 == 0) { ?>
              </div>
              <div class="chkbox_line clearfix">
                <?php } ?>
                <label class="form-chk col_sp">
                  <input name="category_pilates" type="checkbox" value="<?php echo $name;?>"
                    <?php if(in_array($name,$category_pilates_data)){ echo 'checked'; }?> id="<?php echo $category_id; ?>"/>
                  <?php echo $name; ?>
                </label>
                <?php } ?>
                <label class="form-chk col_sp" id="chk_other">
                  <input id="chkbox_pilates_etc" <?php if (empty($category_pilates_etc) == false) echo 'checked'; ?> type="checkbox" name="number">
                  기타
                  <span class="write_padding">
                    <input type="text" class="chk_write" id="category_pilates_etc" name="category_pilates_etc" value="<?php echo $category_pilates_etc; ?>"/>
                  </span>
                </label>
              </div>
            </div>
          </div>
        </div>
        <!--
        <div class="stu_box stu_img">
          <p class="type_tit stu_tit" style="padding: 4px 0 24px;">이미지 등록</p>
          <dl class="type_detail stu_detail clearfix">
            <dt class="area_tit stu_name">대문 이미지 등록</dt>
            <dd class="area_data name_data add_photo">
              <label type="file" class="data_form file_form">파일열기
                <span class="file_alert" style="color: #bdbdbd;">(사진 추가를 하지 않으면 온라인 스튜디오 메인이미지로 반영됩니다.)</span>
                <span class="file_arrow"></span>
                <input type="file" id="studio_img" value="파일열기" onchange="preview_img(this, 'previewImg');">
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
              <div class="file_thumb" id="previewImg">
                <img src="" alt="" class="thumb_img">
              </div>
            </dd>
          </dl>
        </div>
        -->
      </div>
    </section>
    <section class="contents_type contents_info scroll-y">
      <h3 class="meaning">추가정보</h3>
      <div class="type_wrap info_wrap">
<!--        <div class="type_box about_box shadow" id="info">-->
<!--          <p class="type_tit sch_tit">About</p>-->
<!--          <button class="sch_btn btn_save" onclick="save_about();">저장</button>-->
<!--          <form class="addinfo_textbox">-->
<!--            <div class="remain_textarea">-->
<!--              <p>남은 글자 수 <span class="remain_text"><strong class="remain_val">--><?php //if (!$register) { echo (1000 - mb_strlen($studio->about)); } else { echo 1000; } ?><!--</strong>자</span></p>-->
<!--            </div>-->
<!--            <textarea class="about_textarea" placeholder="내용을 입력해주세요 (최대 1,000자)">--><?// if (!$register) echo $studio->about; ?><!--</textarea>-->
<!--          </form>-->
<!--        </div>-->
        <div class="type_box info_box shadow">
          <p class="type_tit sch_tit">Info</p>
          <button class="sch_btn btn_save" onclick="save_info();">저장</button>
          <div class="edit_wrap">
            <div style="width: 100%; font-size: 12px;">
              <p style="line-height: 1.75; margin-bottom: 8px;">- 권장 이미지 사이즈 : 가로 1000px
                <br>- 이미지가 비정상적으로 보여질 수 있으므로, 권장사이즈를 준수하여 주시기 바랍니다.</p>
            </div>
            <div class="editor_box">
              <textarea class="summernotes" id='summernotes' data-height="500" data-name="item-desc"><? if (!$register) echo $studio->info; ?></textarea>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
  
  function get_profile_data() {
  
    let instagram = trim($('#instagram_url').val());
    let youtube = trim($('#youtube_url').val());
    let payment_page = trim($('#payment_page').val());
    let email = trim($('#studio_email').val());
    let category_yoga = [];
    let category_yoga_etc = '';
    let category_pilates = [];
    let category_pilates_etc = '';
  
    if (email !== '') {
      if (isValidEmailAddress(email) === false) {
        alert('이메일 주소를 정확히 입력바랍니다!');
        return false;
      }
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
  
    $.each($('.stu_yoga').find("[name='category_yoga']"), function(index, item) {
      if ($(item).prop('checked') === true) {
        category_yoga.push($(item).val());
      }
    });
    $.each($('.stu_pilates').find("[name='category_pilates']"), function(index, item) {
      if ($(item).prop('checked') === true) {
        category_pilates.push($(item).val());
      }
    });
  
    if ($('#chkbox_yoga_etc').prop('checked') === true) {
      category_yoga_etc = $('#category_yoga_etc').val();
    }
    if ($('#chkbox_pilates_etc').prop('checked') === true) {
      category_pilates_etc = $('#category_pilates_etc').val();
    }
  
    let data = [];
    // data['instagram'] = instagram;
    // data['youtube'] = youtube;
    data['email'] = email;
    data['payment_page'] = payment_page;
    data['category_yoga'] = JSON.stringify(category_yoga);
    data['category_yoga_etc'] = category_yoga_etc;
    data['category_pilates'] = JSON.stringify(category_pilates);
    data['category_pilates_etc'] = category_pilates_etc;
  
    console.log(data);
    
    return data;
  }

  function save_profile() {
    let url = '<?php echo base_url()."studio/account/profile/update"; ?>';
    let data = get_profile_data();
    if (data === false) {
      return false;
    }
    send_post(data, url, true, '');
  }

  function register_studio() {
    let url = '<?php echo base_url()."studio/account/register"; ?>';
    let data = get_profile_data();
    if (data === false) {
      return false;
    }
    send_post(data, url, false, '<?= base_url();?>studio');
  }
  
  function set_summer(){
    $('#summernotes').each(function() {
      var now = $(this);
      var h = now.data('height');
      var n = now.data('name');
      // $(this).closest('div').append('<input type="hidden" class="val" name="description">');
      now.closest('div').append('<input type="hidden" class="val" name="'+n+'">');
    
      $('#summernotes').summernote({
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['fontsize', ['fontsize']],
          // ['fontname', ['fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']], // 추가
          ['insert', ['link', 'picture', 'video']], // 추가
          // ['view', ['codeview', 'help']],
          // ['view', ['fullscreen', 'codeview', 'help']],
        ],
        // fontNames: ['Noto Sans KR', 'Quicksand', 'Patua One'],
        height: h,
        lang: "ko-KR",
        dialogsInBody: true,
        dialogsFade: true,
        disableDragAndDrop: false,
        callbacks: {
          onImageUpload : function(files) {
            // console.log('image upload:', files);
            for (var i = 0; i < files.length; i++) {
              sendFile(files[i]);
            }
          },
          onChange: function(contents, $editable) {
            // console.log('onChange:', contents, $editable);
            now.closest('div').find('.val').val(now.summernote('code'));
          }
          // onMediaDelete : function(target) {
          //   // console.log('delete');
          //   deleteImage(target[0].src);
          // },
        },
      });
      now.closest('div').find('.val').val('<? if(!$register) echo $studio->info; ?>');
      // console.log(now.closest('div').find('.val').val());
      // now.closest('div').find('.val').val(now.summernote('code'));
      // console.log($('#summernotes').summernote('fullscreen.isFullscreen'));
    });
  }

  // summernote.image.upload
  function sendFile(file) {
    var upload_path = '<?= $this->studio_model->get_img_web_path(); ?>';
    var data = new FormData();
    data.append("file", file);
    // console.log('image upload:', file);
    // console.log(data);
    $('#loading_set').show();
    $.ajax({
      url: "<?= base_url() . 'studio/account/info/upload_image/'; ?>",
      data: data,
      cache: false,
      contentType: false,
      enctype: 'multipart/form-data',
      processData: false,
      type: 'POST',
      success: function(data){
        $("#loading_set").fadeOut(500);
        // console.log(data);
        var obj = JSON.parse(data);
        if (obj.success) {
          $('#summernotes').summernote("insertImage", upload_path + obj.filename);
          $('.note-editable').keyup();
        } else {
          switch(parseInt(obj.error)) {
            case 1: alert('업로드 용량 제한에 걸렸습니다.'); break;
            case 2: alert('MAX_FILE_SIZE 보다 큰 파일은 업로드할 수 없습니다.'); break;
            case 3: alert('파일이 일부분만 전송되었습니다.'); break;
            case 4: alert('파일이 전송되지 않았습니다.'); break;
            case 6: alert('임시 폴더가 없습니다.'); break;
            case 7: alert('파일 쓰기 실패'); break;
            case 8: alert('알수 없는 오류입니다.'); break;
            case 100: alert('허용된 파일이 아닙니다.'); break;
            case 101: alert('0 byte 파일은 업로드할 수 없습니다.'); break;
          }
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus+" "+errorThrown);
      }
    });
  };
  $('.note-editable').keyup(function(e) {
    $(this).scrollTop(this.scrollHeight);
  });
  
  function save_info() {
    let info = $('#summernotes').closest('div').find('.val').val();
    if (info === '') {
      alert('센터 정보를 정확히 입력해주세요.');
      return false;
    }
    // console.log(info);
    let url = '<?php echo base_url()."studio/account/info/update"; ?>';
    let data = [];
    data['info'] = info;
    send_post(data, url, true, '');
  }

  function save_about() {
    let about = $('.about_textarea').val().trim();
    if (about === '') {
      alert('스튜디오 정보를 정확히 입력해주세요.');
      return false;
    }
    // console.log(about);
    let url = '<?php echo base_url()."studio/account/about/update"; ?>';
    let data = [];
    data['about'] = about;
    send_post(data, url, true, '');
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
    });
    set_summer();
    add_menu_active('account');
  });

</script>