<div class="row">
  <div class="col-md-12">
    <?php
    echo form_open(base_url() . 'admin/email/do_add/'.$email_id, array(
      'class' => 'form-horizontal',
      'method' => 'post',
      'id' => 'email_add',
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
              <h4 class="text-thin text-center">이메일 상세</h4>
            </div>
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-2">타입</label>
              <div class="col-sm-6">
                <?php echo $this->crud_model->select_html('category_email','type','desc','add','demo-chosen-select required','','','',''); ?>
              </div>
            </div>
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-1">이메일 제목</label>
              <div class="col-sm-6">
                <input type="text" name="subject" id="demo-hor-1" placeholder="제목을 입력해주세요"
                       class="form-control required">
              </div>
            </div>
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-1">보내는 주소</label>
              <div class="col-sm-6">
                <input readonly type="text" name="from" id="demo-hor-1" placeholder="보내는 이메일 주소(hello@foundy.me)"
                       class="form-control required" value="hello@foundy.me">
              </div>
            </div>
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-1">보내는 사람</label>
              <div class="col-sm-6">
                <input type="text" name="from_name" id="demo-hor-1" placeholder="보내는 사람(FOUNDY)"
                       class="form-control required">
              </div>
            </div>
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-1">메일 타입</label>
              <div class="col-sm-6">
                <input readonly type="text" name="mailtype" id="demo-hor-1" placeholder="html"
                       class="form-control required" value="html">
              </div>
            </div>
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-1">메일 본문에서 치환할 문자열</label>
              <div class="col-sm-6">
                <input type="text" name="substitute_str" id="demo-hor-1" placeholder="{{EMAIL}}, {{PW}}, {{BRAND}} 등"
                       class="form-control">
              </div>
            </div>
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-13">이메일 본문</label>
              <div class="col-sm-6">
                <textarea rows="9"  class="summernotes" id='summernotes' data-height="300" data-name="email_body"></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="panel-footer">
      <div class="row">
        <div class="col-md-11">
        </div>
        <div class="col-md-1">
          <span class="btn btn-success btn-md btn-labeled fa fa-upload pull-right enterer"
                onclick="form_submit('email_add','정상적으로 업로드되었습니다!');proceed('to_add');" >업로드</span>
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
          now.closest('div').find('.val').val(now.code());
        },
      });
      now.closest('div').find('.val').val(now.code());
    });
  }
  
  // summernote 에디터에 이미지 업로드
  function sendFile(file,editor,welEditable) {
    var upload_path = '<?php echo IMG_WEB_PATH_SERVER; ?>';
    var data = new FormData();
    data.append("file", file);
    $.ajax({
      url: "<?php echo base_url() . 'admin/email/upload_image/'.$email_id; ?>",
      data: data,
      cache: false,
      contentType: false,
      enctype: 'multipart/form-data',
      processData: false,
      type: 'POST',
      success: function(data){
        var obj = JSON.parse(data);
        if (obj.success) {
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
  
  function set_select(){
    $('.demo-chosen-select').chosen();
    $('.demo-cs-multiselect').chosen({width:'100%'});
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
    set_select();
    set_summer();
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

