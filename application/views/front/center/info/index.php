<!-- include libraries(jQuery, bootstrap) -->
<!--<link href="//stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">-->
<script src="//code.jquery.com/jquery-2.2.4.min.js"></script>
<!--<script src="//stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->

<!-- include summernote css/js -->
<link href="//cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/summernote@0.8.16/dist/lang/summernote-ko-KR.min.js"></script>

<!--Summernote [ OPTIONAL ]-->
<!--<link href="--><?php //echo base_url(); ?><!--template/back/plugins/summernote/summernote.min.css" rel="stylesheet">-->
<!--<script src="--><?php //echo base_url(); ?><!--template/back/plugins/summernote/summernote.js"></script>-->

<div class="information-title">센터 정보 수정</div>
<div class="details-wrap">
  <div class="row">
    <div class="col-md-12">
      <div class="tabs-wrapper content-tabs">
        <div class="tab-content">
          <div class="tab-pane fade in active">
            <div class="details-wrap">
              <div class="block-title alt">
                <i class="fa fa-angle-down"></i>
                센터 정보 수정
              </div>
              <p class="text-success">가격 정보 등 센터의 정보를 상세하게 작성하면 홍보에 도움이 됩니다</p>
              <div class="details-box">
                <?php
                echo form_open(base_url() . 'home/center/info/update/'. $center_data->center_id, array(
                  'class' => 'form-login',
                  'method' => 'post',
                  'enctype' => 'multipart/form-data'
                ));
                ?>
                <div class="row">
                  <div class="form-group">
                    <label class="col-sm-12 control-label"><?php echo ('상세정보'); ?></label>
                    <div class="col-sm-12">
                      <textarea rows="9"  class="summernotes" id='summernotes' data-height="300" data-name="description">
                        <?php echo $center_data->info; ?>
                      </textarea>
                    </div>
                  </div>
                  <div class="col-md-12" style="border-top: 2px solid #f5f5f5; margin-top: 35px">
                    <button type="button" class="btn btn-theme pull-right open_modal center_info" data-toggle="modal" data-target="#updateCenterInfoModal">
                      확인
                    </button>
                    <button type="button" class="hidden btn btn-theme pull-right btn_dis signup_btn" data-relocation='<?php echo base_url(); ?>home/center/profile/<?php echo $center_data->center_id; ?>' data-unsuccessful='신청에 실패했습니다.' data-success='신청에 성공했습니다.' data-ing='진행중'>
                      확인
                    </button>
                  </div>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal For C-C Post confirm -->
<div class="modal fade" id="updateCenterInfoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">센터 정보</h4>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <div>정말 수정하시겠습니까?
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger post_confirm_close" data-dismiss="modal">취소</button>
        <button type="button" class="btn btn-theme btn-theme-sm post_confirm" id="update_center_info" style="text-transform: none; font-weight: 400;">확인</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal For C-C Post confirm -->

<!-- Modal For C-C Post confirm -->
<div class="modal fade" id="updateCenterInfoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">센터 정보</h4>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <div>정말 수정하시겠습니까?
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger post_confirm_close" data-dismiss="modal">취소</button>
        <button type="button" class="btn btn-theme btn-theme-sm post_confirm" id="update_center_info" style="text-transform: none; font-weight: 400;">확인</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal For C-C Post confirm -->

<!-- Modal For C-C Post confirm -->
<div class="modal fade" id="cancelCenterInfoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">센터 정보</h4>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <div>정말 취소하시겠습니까?
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger post_confirm_close" data-dismiss="modal">취소</button>
        <button type="button" class="btn btn-theme btn-theme-sm post_confirm" id="cancel_center_info" style="text-transform: none; font-weight: 400;">확인</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal For C-C Post confirm -->

<!-- Modal For C-C Status change -->
<div class="modal fade" id="statusChange" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">change_availability_status</h4>
      </div>
      <div class="modal-body">
        <div class="text-center content_body" id="content_body">
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal For C-C Status change -->
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
</style>

<script>

  var OkButton = function(context) {
    var ui = $.summernote.ui;
    var button = ui.button({
      contents: "<span class='pull-right'>확인</span>",
      tooltip: '입력하신 정보를 저장합니다',
      click: function() {
        // console.log('OkButton');
        $('.open_modal.center_info').click();
      }
    });

    return button.render();
  }

  var CancelButton = function(context) {
    var ui = $.summernote.ui;
    var button = ui.button({
      contents: "<span class='pull-right'>취소</span>",
      tooltip: '작업하신 정보를 취소합니다',
      click: function() {
        // console.log('OkButton');
        $('.open_modal.center_info').click();
      }
    });

    return button.render();
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
          // ['view', ['fullscreen'/*, 'codeview', 'help'*/]],
          ['font', ['color','paragraph','fontsize','bold','italic','underline','clear']],
          ['insert', ['table','link', 'picture', 'video']], // 추가
          ['confirm', ['ok']]
          // ['confirm', ['cancel', 'ok']]
        ],
        buttons: {
          ok: OkButton,
          cancel: CancelButton
        },
        // fontNames: ['Noto Sans KR', 'Quicksand', 'Patua One'],
        height: h,
        lang: "ko-KR",
        callbacks: {
          onImageUpload : function(files) {
            // console.log('image upload:', files);
            var i;
            for (i = 0; i < files.length; i++) {
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
      now.closest('div').find('.val').val(now.summernote('code'));
      // console.log($('#summernotes').summernote('fullscreen.isFullscreen'));
      if ($('#summernotes').summernote('fullscreen.isFullscreen') === false) {
        $('#summernotes').summernote('fullscreen.toggle');
      }
    });
  }

  // summernote.image.upload
  function sendFile(file) {
    var upload_path = '<?php echo IMG_WEB_PATH_CENTER; ?>';
    var data = new FormData();
    data.append("file", file);
    // console.log('image upload:', file);
    // console.log(data);
    $.ajax({
      url: "<?php echo base_url() . 'home/center/info/upload_image/'.$center_data->center_id; ?>",
      data: data,
      cache: false,
      contentType: false,
      enctype: 'multipart/form-data',
      processData: false,
      type: 'POST',
      success: function(data){
        // console.log(data);
        var obj = JSON.parse(data);
        if (obj.success) {
          // var image = $('<img>').attr('src', '' + obj.save_url); // 에디터에 img 태그로 저장
          // alert(obj.save_url);
          // $('.summernotes').summernote("insertNode", image[0]); // summernote 에디터에 img 태그를 보여줌
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
    // $(this).css('height', 'auto' );
    // $(this).height(this.scrollHeight);
    $(this).scrollTop(this.scrollHeight);
  });

  $(document).ready(function(){
    $(".post_confirm").click(function(){
      $(".post_confirm_close").click();
      $(".signup_btn").click();
    });

    set_summer();

    $('html').animate({scrollTop:$('html, body').offset().top}, 100);
  });
</script>

