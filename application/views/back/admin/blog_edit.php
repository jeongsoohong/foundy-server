<?php
foreach($blog_data as $row){
  ?>
  <div class="row">
    <div class="col-md-12">
      <?php
      echo form_open(base_url() . 'admin/blog/update/' . $row['blog_id'], array(
        'class' => 'form-horizontal',
        'method' => 'post',
        'id' => 'blog_edit',
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
                <label class="col-sm-4 control-label" for="demo-hor-1">
                  <?php echo ('blog_title');?>
                </label>
                <div class="col-sm-6">
                  <input type="text" name="title" id="demo-hor-1" value="<?php echo $row['title']; ?>" placeholder="<?php echo ('제목');?>" class="form-control required">
                </div>
              </div>

              <div class="form-group btm_border">
                <label class="col-sm-4 control-label" for="demo-hor-2"><?php echo ('카테고리');?></label>
                <div class="col-sm-6">
                  <?php echo $this->crud_model->select_html('category_blog','category_blog','name','edit','demo-chosen-select required',$row['blog_category'],'','',''); ?>
                </div>
              </div>

              <div class="form-group btm_border">
                <label class="col-sm-4 control-label" for="demo-hor-12"><?php echo ('소개사진');?></label>
                <div class="col-sm-6">
                  <span class="pull-left btn btn-default btn-file"> <?php echo ('파일열기');?>
                    <input type="file" name="img" onchange="preview(this);" id="demo-hor-inputpass" class="form-control">
                  </span>
                  <br><br>
                  <span id="previewImg" >
                    <img class="img-responsive" width="100" src="<?php echo $row['main_image_url']; ?>" alt="User_Image" >
                  </span>
                </div>
              </div>

              <!--                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-14">
                                    <?php /*echo ('소개글');*/?>
                                        </label>
                                <div class="col-sm-6">
                                    <textarea rows="9" class="summernotes" data-height="200" data-name="summery"><?php /*echo $row['summery']; */?></textarea>
                                </div>
                            </div>
-->
              <div class="form-group btm_border">
                <label class="col-sm-4 control-label" for="demo-hor-1"><?php echo ('소개글');?></label>
                <div class="col-sm-6">
                  <input type="text" name="summery" id="demo-hor-1" placeholder="<?php echo ('소개글');?>" class="form-control required" value="<?php echo $row['summery']; ?>">
                </div>
              </div>

              <div class="form-group btm_border">
                <label class="col-sm-4 control-label" for="demo-hor-14">
                  <?php echo ('상세정보');?>
                </label>
                <div class="col-sm-6">
                  <textarea rows="9" class="summernotes" data-height="300" data-name="description"><?php echo $row['description']; ?></textarea>
                </div>
              </div>

<!--              <div class="form-group btm_border">-->
<!--                <label class="col-sm-4 control-label" for="demo-hor-1">--><?php //echo ('작성자');?><!--</label>-->
<!--                <div class="col-sm-6">-->
<!--                  <input type="text" name="author" value="--><?php //echo $row['author']; ?><!--" id="demo-hor-1" placeholder="--><?php //echo ('작성자');?><!--" class="form-control ">-->
<!--                </div>-->
<!--              </div>-->
<!---->
<!--              <div class="form-group btm_border">-->
<!--                <label class="col-sm-4 control-label" for="demo-hor-1">--><?php //echo ('작성일');?><!--</label>-->
<!--                <div class="col-sm-6">-->
<!--                  <input type="date" name="date" value="--><?php //echo $row['date']; ?><!--" id="demo-hor-1" class="form-control">-->
<!--                </div>-->
<!--              </div>-->


            </div>


          </div>
        </div>

      </div>
      <div class="panel-footer">
        <div class="row">
          <div class="col-md-11">
            <span class="btn btn-purple btn-labeled fa fa-refresh pro_list_btn pull-right"
                  onclick="ajax_set_full('edit','<?php echo ('edit_blog'); ?>','<?php echo ('정상적으로 리셋되었습니다!'); ?>','blog_edit','<?php echo $row['blog_id']; ?>') "><?php echo ('리셋');?>
            </span>
          </div>
          <div class="col-md-1">
            <span class="btn btn-success btn-md btn-labeled fa fa-wrench pull-right enterer" onclick="form_submit('blog_edit','<?php echo ('정상적으로 수정되었습니다!'); ?>');proceed('to_add');" ><?php echo ('수정');?></span>
          </div>
        </div>
      </div>
      </form>
    </div>
  </div>
  <?php
}
?>
<!--Bootstrap Tags Input [ OPTIONAL ]-->
<script src="<?php echo base_url(); ?>template/back/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

<script type="text/javascript">
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
          console.log('image upload:', files);
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
          now.closest('div').find('.val').val(now.code());
        }
      });
      now.closest('div').find('.val').val(now.code());
    });
  }

  // summernote 에디터에 이미지 업로드
  function sendFile(file,editor,welEditable) {
    data = new FormData();
    data.append("file", file);
    $.ajax({
      url: "/admin/upload", // image 저장 경로
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
          editor.insertImage(welEditable, obj.save_url);
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

  function uploadImage(image) {
    var data = new FormData();
    data.append("image", image);
    $.ajax({
      url: "<?php echo base_url() . 'admin/upload_image'?>",
      cache: false,
      contentType: false,
      processData: false,
      data: data,
      type: "POST",
      success: function(url) {
        $('#summernotes').summernote("insertImage", url);
        console.log(url);
      },
      error: function(data) {
        console.log(3);
        console.log(data);
      }
    });
  }

  function deleteImage(src) {
    $.ajax({
      data: {src : src},
      type: "POST",
      url: "<?php echo base_url(). 'admin/delete_image'?>",
      cache: false,
      success: function(response) {
        console.log(response);
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
      e.preventDefault();
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

