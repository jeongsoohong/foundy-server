<div class="row">
  <div class="col-md-12">
    <?php
    echo form_open(base_url() . 'admin/blog/do_add/'.$blog_id, array(
      'class' => 'form-horizontal',
      'method' => 'post',
      'id' => 'blog_add',
      'enctype' => 'multipart/form-data'
    ));
    ?>
    <!--Panel heading-->
    <div class="panel-body">
      <div class="tab-base">
        <!--Tabs Content-->
        <div class="tab-content">
          <div id="blog_details" class="tab-pane fade active in">
            <div class="form-group btm_border">
              <h4 class="text-thin text-center"><?php echo ('블로그 상세'); ?></h4>
            </div>
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-1"><?php echo ('제목');?></label>
              <div class="col-sm-6">
                <input type="text" name="title" id="demo-hor-1" placeholder="<?php echo ('제목을 입력해주세요');?>" class="form-control required">
              </div>
            </div>
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-2"><?php echo ('카테고리');?></label>
              <div class="col-sm-6">
                <?php echo $this->crud_model->select_html('category_blog','category_blog','name','add','demo-chosen-select required','','','',''); ?>
              </div>
            </div>
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-12"><?php echo ('소개사진');?></label>
              <div class="col-sm-6">
                <span class="pull-left btn btn-default btn-file"> <?php echo ('파일열기');?>
                  <input type="file" name="img" onchange="preview(this);" id="demo-hor-12" class="form-control">
                </span>
                <br><br>
                <span id="previewImg" ></span>
              </div>
            </div>
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-1"><?php echo ('소개글');?></label>
              <div class="col-sm-6">
                <input type="text" name="summery" id="demo-hor-1" placeholder="<?php echo ('소개글');?>" class="form-control">
              </div>
            </div>

<!--
              <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-13"><?php /*echo ('summery'); */?></label>
              <div class="col-sm-6">
                <textarea rows="9"  class="summernotes" data-height="200" data-name="summery"></textarea>
              </div>
            </div>
-->
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-13"><?php echo ('상세정보'); ?></label>
              <div class="col-sm-6">
                <textarea rows="9"  class="summernotes" id='summernotes' data-height="300" data-name="description"></textarea>
              </div>
            </div>
<!--            <div class="form-group btm_border">-->
<!--              <label class="col-sm-4 control-label" for="demo-hor-1">--><?php //echo ('작성자');?><!--</label>-->
<!--              <div class="col-sm-6">-->
<!--                <input type="text" name="author" id="demo-hor-1" placeholder="--><?php //echo ('작성자');?><!--" class="form-control ">-->
<!--              </div>-->
<!--            </div>-->
<!--            <div class="form-group btm_border">-->
<!--              <label class="col-sm-4 control-label" for="demo-hor-1">--><?php //echo ('작성일');?><!--</label>-->
<!--              <div class="col-sm-6">-->
<!--                <input type="date" name="date" id="demo-hor-1" class="form-control">-->
<!--              </div>-->
<!--            </div>-->
          </div>
        </div>
      </div>
    </div>
    <div class="panel-footer">
      <div class="row">
        <div class="col-md-11">
          <span class="btn btn-purple btn-labeled fa fa-refresh pro_list_btn pull-right"
                onclick="ajax_set_full('add','<?php echo ('add_blog'); ?>','<?php echo ('정상적으로 리셋되었습니다!'); ?>','blog_add',''); "><?php echo ('리셋');?>
          </span>
        </div>
        <div class="col-md-1">
          <span class="btn btn-success btn-md btn-labeled fa fa-upload pull-right enterer" onclick="form_submit('blog_add','<?php echo ('정상적으로 업로드되었습니다!'); ?>', styleCode);proceed('to_add');" ><?php echo ('업로드');?></span>
        </div>
      </div>
    </div>
    </form>
  </div>
</div>

<script src="<?php echo base_url(); ?>template/back/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js">
</script>

<input type="hidden" id="option_count" value="-1">
<script type="text/javascript">
  var styleCode = '<style>'
    + '/* ============================================= */'
    + '/* 웹폰트 스타일 */'
    + '@import url(\'https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;400;500;700&display=swap\');'
    + '/* 웹폰트 적용 */'
    + '.writeBlog p, .writeBlog h2, .writeBlog h3, .writeBlog h4, .writeBlog h5, .writeBlog h6 {font-family: \'Noto Sans KR\', sans-serif !important;}'
    + '/* ============================================= */'
    + '/* === 소제목 스타일 === */'
    + '.writeBlog .contMajorhead {margin-bottom: 0; padding-bottom: 0;}'
    + '/* 1차 소제목 - 제목 */'
    + '.writeBlog .majorhead-tit {font-size: 27px; font-weight: bold; line-height: 1.33; padding-bottom: 8px; margin-bottom: 0; word-break: keep-all;}'
    + '/* 1차 소제목 - 본문 */'
    + '.writeBlog .majorhead-txt {font-size: 16px; font-weight: normal; line-height: 1.5; margin-bottom: 0; word-break: keep-all;}'
    + '/* 2차 소제목 - 제목 */'
    + '.writeBlog .subhead-tit {font-size: 21px; font-weight: bold; line-height: 1.33; word-break: keep-all;}'
    + '/* === 본문 스타일 === */'
    + '.writeBlog .txt {color: #333; font-size: 16px; font-weight: normal; margin-bottom: 36px; line-height: 1.85;}'
    + '.writeBlog .txt:last-child {margin-bottom: 0;}'
    + '/* ============================================= */'
    + '/* 목차 대분류 스타일 */'
    + '.writeBlog .index-lg {font-size: 20px; letter-spacing: -0.03em; line-height: 1.5; margin-bottom: 0;}'
    + '@media(min-width: 375px) {'
    + '.writeBlog .index-lg {font-size: 25px;}'
    + '}'
    + '/* 목차 대분류 설명 스타일  */'
    + '.writeBlog .index-desc {display: block; font-size: 15px; line-height: 1.5; padding-top: 8px;}'
    + '@media(min-width: 375px) {'
    + '.writeBlog .index-desc {font-size: 18px;}'
    + '}'
    + '/* 좌측 선 꾸밈 요소 */'
    + '.inner-deco {border-left: 2px solid #bbae9d; padding-left: 12px;}'
    + '  /* === 블로그 작성공간 여백,간격 (고정) === */'
    + '  /* 상단선 */'
    + '.writeBlog {border-top: 1px solid #eee;}'
    + '  /* 문단 여백 */'
    + '.blogCont {padding: 16px; margin: 52px 0;}'
    + '  /* .blogCont:first-child {margin-top: 40px;} */'
    + '  /* 회색 테두리 박스 */'
    + '.deco-blogCont {box-sizing: border-box; padding: 16px; margin: 52px 16px 16px; border: 1px solid #e0e0e0;}'
    + '  /* 회색 테두리 박스 폰트 크기 */'
    + '.deco-blogCont .txt {font-size: 15px; margin-bottom: 12px;}'
    + '  /* 이미지 박스 (이미지 1개 = content 1(문단 한 개)로 표기할 경우) 여백 */'
    + '.cont-img {margin: 52px 0 40px;}'
    + '  /* ============================================= */'
    + '  /* 폰트 굵기 스타일 */'
    + '  p[class*="Normal"], span[class*="Normal"] {font-weight: normal;}'
    + '  p[class*="Heavy"], span[class*="Heavy"] {font-weight: bold;}'
    + '  /* === 폰트 색상 스타일 === */'
    + '  /* 제목(블랙) */'
    + '.writeBlog .titColor {color: #000;}'
    + '  /* 본문(옅은 블랙) */'
    + '.writeBlog .txtColor {color: #333;}'
    + '  /* 오렌지 하이라이트 */'
    + '.writeBlog .orangeColor {color: #ff6633;}'
    + '  /* ============================================= */'
    + '  /* 밑줄 오렌지 */'
    + '.orangeLine {border-bottom: 2px solid #ff6633;}'
    + '  /* 배경색에 흰색 글씨 */'
    + '.highlighted {display:inline-block; background-color: #ff6633; padding: 0 4px; color: #fff; font-weight: bold;}'
    + '  /* 이탤릭체 */'
    + '.italic { font-style: oblique; font-style: italic; }'
    + '  /* 이탤릭체 가장 마지막에 적용되게끔, 이탤릭체 없으면 oblique 적용되게끔 */'
    + '  /* 사진 주석 */'
    + '.imgDesc {width: 85%; margin: 0 auto; padding-top: 12px; text-align: center; color: #bdbdbd; font-size: 14px; font-weight: bold; word-break: keep-all; line-height: 1.5;}'
    + '  /* 인용구문 */'
    + '  div.quote {text-align: center;}'
    + '  div.quote p {color: #44484b; font-size: 21px; font-weight: 500; line-height: 1.5; word-break: keep-all; margin: 0;}'
    + '  div.quote::before {content: "‘‘"; display: block; color: #e0e0e0;  font-size: 60px; font-weight: 700; margin-bottom: 4px; letter-spacing:  -0.05em;}'
    + '  div.quote::after {content: "’’"; display: block; color: #e0e0e0;  font-size: 60px; font-weight: 700; margin-top: 36px; letter-spacing:  -0.05em;}'
    + '</style>';
  
  window.preview = function (input) {
    if (input.files && input.files[0]) {
      $("#previewImg").html('');
      $(input.files).each(function () {
        var reader = new FileReader();
        reader.readAsDataURL(this);
        reader.onload = function (e) {
          $("#previewImg").append("<div style='float:left;border:4px solid #303641;padding:5px;margin:5px;'><img height='80' src='" + e.target.result + "'></div>");
        }
      });
    }
  }

  $('.delete-div-wrap .close').on('click', function() {
    var pid = $(this).closest('.delete-div-wrap').find('img').data('id');
    var here = $(this);
    msg = "정말로 삭제하시겠습니까?";
    bootbox.confirm(msg, function(result) {
      if (result) {
        $.ajax({
          url: base_url+''+user_type+'/'+module+'/dlt_img/'+pid,
          cache: false,
          success: function(data) {
            $.activeitNoty({
              type: 'success',
              icon : 'fa fa-check',
              message : '정상적으로 삭제되었습니다',
              container : 'floating',
              timer : 3000
            });
            here.closest('.delete-div-wrap').remove();
          }
        });
      }else{
        $.activeitNoty({
          type: 'danger',
          icon : 'fa fa-minus',
          message : 'Cancelled',
          container : 'floating',
          timer : 3000
        });
      };
    });
  });

  function other_forms(){}

  function set_summer(){
    $('.summernotes').each(function() {
      var now = $(this);
      var h = now.data('height');
      var n = now.data('name');
      now.closest('div').append('<input type="hidden" class="val" name="'+n+'">');
      now.summernote({
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['fontname', ['fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']], // 추가
          ['insert', ['link', 'picture', 'video']], // 추가
          // ['view', ['codeview', 'help']],
          ['view', ['fullscreen', 'codeview', 'help']],
        ],
        height: h,
        onImageUpload : function(files, editor, welEditable) {
          // console.log('image upload:', files);
          var i;
          for (i = 0; i < files.length; i++) {
            sendFile(files[i], editor, welEditable);
          }
        },
        // onImageUpload: function(image) {
        //     uploadImage(image[0]);
        // },
        onMediaDelete : function(target) {
          // console.log('delete');
          deleteImage(target[0].src);
        },
        onChange: function() {
          now.closest('div').find('.val').val(styleCode + now.code());
        },
      });
      now.closest('div').find('.val').val(styleCode + now.code());
      $('.note-editable').before(styleCode);
    });
  }

  // summernote 에디터에 이미지 업로드
  function sendFile(file,editor,welEditable) {
    var upload_path = '<?php echo IMG_WEB_PATH_BLOG; ?>';
    var data = new FormData();
    data.append("file", file);
    $.ajax({
      url: "<?php echo base_url() . 'admin/blog/upload_image/'.$blog_id; ?>",
      data: data,
      cache: false,
      contentType: false,
      enctype: 'multipart/form-data',
      processData: false,
      type: 'POST',
      success: function(data){
        var obj = JSON.parse(data);
        if (obj.success) {
          // var image = $('<img>').attr('src', '' + obj.save_url); // 에디터에 img 태그로 저장
          // alert(obj.save_url);
          // $('.summernotes').summernote("insertNode", image[0]); // summernote 에디터에 img 태그를 보여줌
          // $('.summernotes').summernote("insertImage", obj.save_url);
          editor.insertImage(welEditable, upload_path + obj.filename);
          $('.note-editable').keyup();
        } else {
          // alert(obj.error);
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
  }

  function option_count(type){
    var count = $('#option_count').val();
    if(type == 'add'){
      count++;
    }
    if(type == 'reduce'){
      count--;
    }
    $('#option_count').val(count);
  }

  function set_select(){
    $('.demo-chosen-select').chosen();
    $('.demo-cs-multiselect').chosen({width:'100%'});
  }

  $(document).ready(function() {
    set_select();
    set_summer();
    createColorpickers();
  });

  function other(){
    $('.demo-chosen-select').chosen();
    $('.demo-cs-multiselect').chosen({width:'100%'});
    $('#sub').show('slow');
    $('#brn').show('slow');
  }
  function get_cat(id){
    $('#brand').html('');
    $('#sub').hide('slow');
    $('#brn').hide('slow');
    ajax_load(base_url+'admin/blog/sub_by_cat/'+id,'sub_cat','other');
    ajax_load(base_url+'admin/blog/brand_by_cat/'+id,'brand','other');
  }

  function get_sub_res(id){}

  $(".unit").on('keyup',function(){
    $(".unit_set").html($(".unit").val());
  });

  function createColorpickers() {

    $('.demo2').colorpicker({
      format: 'rgba'
    });

  }


  $("#more_btn").click(function(){
    $("#more_additional_fields").append(''
      +'<div class="form-group">'
      +'    <div class="col-sm-4">'
      +'        <input type="text" name="ad_field_names[]" class="form-control"  placeholder="<?php echo ('field_name'); ?>">'
      +'    </div>'
      +'    <div class="col-sm-5">'
      +'        <textarea rows="9"  class="summernotes" data-height="100" data-name="ad_field_values[]"></textarea>'
      +'    </div>'
      +'    <div class="col-sm-2">'
      +'        <span class="remove_it_v rms btn btn-danger btn-icon btn-circle icon-lg fa fa-times" onclick="delete_row(this)"></span>'
      +'    </div>'
      +'</div>'
    );
    set_summer();
  });


  $("#more_option_btn").click(function(){
    option_count('add');
    var co = $('#option_count').val();
    $("#more_additional_options").append(''
      +'<div class="form-group" data-no="'+co+'">'
      +'    <div class="col-sm-4">'
      +'        <input type="text" name="op_title[]" class="form-control required"  placeholder="<?php echo ('customer_input_title'); ?>">'
      +'    </div>'
      +'    <div class="col-sm-5">'
      +'        <select class="demo-chosen-select op_type required" name="op_type[]" >'
      +'            <option value="">(none)</option>'
      +'            <option value="text">Text Input</option>'
      +'            <option value="single_select">Dropdown Single Select</option>'
      +'            <option value="multi_select">Dropdown Multi Select</option>'
      +'            <option value="radio">Radio</option>'
      +'        </select>'
      +'        <div class="col-sm-12 options">'
      +'          <input type="hidden" name="op_set'+co+'[]" value="none" >'
      +'        </div>'
      +'    </div>'
      +'    <input type="hidden" name="op_no[]" value="'+co+'" >'
      +'    <div class="col-sm-2">'
      +'        <span class="remove_it_o rmo btn btn-danger btn-icon btn-circle icon-lg fa fa-times" onclick="delete_row(this)"></span>'
      +'    </div>'
      +'</div>'
    );
    set_select();
  });

  $("#more_additional_options").on('change','.op_type',function(){
    var co = $(this).closest('.form-group').data('no');
    if($(this).val() !== 'text' && $(this).val() !== ''){
      $(this).closest('div').find(".options").html(''
        +'    <div class="col-sm-12">'
        +'        <div class="col-sm-12 options margin-bottom-10"></div><br>'
        +'        <div class="btn btn-mint btn-labeled fa fa-plus pull-right add_op">'
        +'        <?php echo ('add_options_for_choice');?></div>'
        +'    </div>'
      );
    } else if ($(this).val() == 'text' || $(this).val() == ''){
      $(this).closest('div').find(".options").html(''
        +'    <input type="hidden" name="op_set'+co+'[]" value="none" >'
      );
    }
  });

  $("#more_additional_options").on('click','.add_op',function(){
    var co = $(this).closest('.form-group').data('no');
    $(this).closest('.col-sm-12').find(".options").append(''
      +'    <div>'
      +'        <div class="col-sm-10">'
      +'          <input type="text" name="op_set'+co+'[]" class="form-control required"  placeholder="<?php echo ('option_name'); ?>">'
      +'        </div>'
      +'        <div class="col-sm-2">'
      +'          <span class="remove_it_n rmon btn btn-danger btn-icon btn-circle icon-sm fa fa-times" onclick="delete_row(this)"></span>'
      +'        </div>'
      +'    </div>'
    );
  });

  $('body').on('click', '.rmo', function(){
    $(this).parent().parent().remove();
  });

  function next_tab(){
    $('.nav-tabs li.active').next().find('a').click();
  }
  function previous_tab(){
    $('.nav-tabs li.active').prev().find('a').click();
  }

  $('body').on('click', '.rmon', function(){
    var co = $(this).closest('.form-group').data('no');
    $(this).parent().parent().remove();
    if($(this).parent().parent().parent().html() == ''){
      $(this).parent().parent().parent().html(''
        +'   <input type="hidden" name="op_set'+co+'[]" value="none" >'
      );
    }
  });


  $('body').on('click', '.rms', function(){
    $(this).parent().parent().remove();
  });


  $("#more_color_btn").click(function(){
    $("#more_colors").append(''
      +'      <div class="col-md-12" style="margin-bottom:8px;">'
      +'          <div class="col-md-8">'
      +'              <div class="input-group demo2">'
      +'                 <input type="text" value="#ccc" name="color[]" class="form-control" />'
      +'                 <span class="input-group-addon"><i></i></span>'
      +'              </div>'
      +'          </div>'
      +'          <span class="col-md-4">'
      +'              <span class="remove_it_v rmc btn btn-danger btn-icon btn-circle icon-lg fa fa-times" ></span>'
      +'          </span>'
      +'      </div>'
    );
    createColorpickers();
  });

  $('body').on('click', '.rmc', function(){
    $(this).parent().parent().remove();
  });


  function delete_row(e)
  {
    e.parentNode.parentNode.parentNode.removeChild(e.parentNode.parentNode);
  }

  /* 텍스트박스 자동 스크롤 기능 */
  // 입력에 따른 처리
  $('.note-editable').keyup(function(e) {
    // $(this).css('height', 'auto' );
    // $(this).height(this.scrollHeight);
    $(this).scrollTop(this.scrollHeight);
  });

  $(document).ready(function() {
    $("form").submit(function(e){
      return false;
    });

    // 초기 로드시 크기 조절 처리
    // $('.note-editable').keyup();
  });
</script>
<style>
  .btm_border{
    border-bottom: 1px solid #ebebeb;
    padding-bottom: 15px;
  }
  /*
      .note-editable{
          resize: none !important;
          !*overflow-y: hidden !important; !* 스크롤이 생성되는것을 막아준다. *!*!
          padding-top: .8em !important; !*엔터키로 인한 상단의 텍스트 깨짐 현상을 막아준다. *!
          padding-bottom: 0.2em !important;
          padding-left: .25em !important;
          padding-right: .25em !important;
          line-height: 1.6 !important;
          min-height: 300px !important;
      }
  */
</style>

<!--Bootstrap Tags Input [ OPTIONAL ]-->

