<style>
    .thumbnail-banner {
        height: 45vw;
    }
    .thumbnail .media {
        border: none;
    }
    .media .media-link .img-bg {
        background-repeat: no-repeat;
        background-size: contain;
    }
    .find-left {
        padding-left: 15px;
        padding-right: 5px;
    }
    .find-right {
        padding-right: 15px;
        padding-left: 5px;
    }
    input#search-text {
        background-color: inherit;
    }
    .find-search {
        padding: 0 15px;
        height: 20px;
        margin: 20px 0;
    }
    .find-search table {
        line-height: 20px;
    }
    .find-search .search-text {
        width: 100%;
    }
    .find-search table tr td {
        font-family: Futura !important;
        font-style: normal;
        font-weight: 400;
        font-size: 12px;
    }
</style>
<section class="page-section" style="margin-top: 0px !important; margin-bottom: 0px !important; padding-top: 0px
    !important; padding-bottom: 0px !important;">
  <div class="container">
    <div class="col-md-12 find-search" style="padding: 0 16px; margin: 20px 0 28px;">
      <table class="col-md-12" style="width: 100%;">
        <tbody>
        <tr>
          <td style="width: 70px; text-align: right; padding-right: 10px">
            Find your
          </td>
          <td style="width: auto; border-bottom: 1px solid grey">
            <input type="text" name="search" id="search-text" value="" style="border: none; width: 100%; height: 32px;">
          </td>
          <td style="padding-left: 10px">
            <a href="javascript:void(0);" onclick="find_search($('#search-text').val());">
              <img height="16" width="16" src="<?php echo base_url(); ?>uploads/icon_0504/icon07_find.png">
            </a>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6 find-left">
      <div class="thumbnail my-2 no-scale no-border no-padding thumbnail-banner ">
        <div class="media">
          <a class="media-link" href="<?php echo base_url().'home/find/center/'.CENTER_TYPE_YOGA; ?>">
            <div class="col-md-6 img-bg image_delay" data-src="<?php echo base_url(); ?>uploads/icon_0604/yoga.png"
                 style="background-image: url('<?php echo base_url(); ?>uploads/icon_0604/yoga.png');">
            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6 find-right">
      <div class="thumbnail my-2 no-scale no-border no-padding thumbnail-banner">
        <div class="media">
          <a class="media-link" href="<?php echo base_url().'home/find/center/'.CENTER_TYPE_PILATES; ?>">
            <div class="col-md-6 img-bg image_delay" data-src="<?php echo base_url(); ?>uploads/icon_0604/pilates.png"
                 style="background-image: url('<?php echo base_url(); ?>uploads/icon_0604/pilates.png');">
            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6 find-left">
      <div class="thumbnail my-2 no-scale no-border no-padding thumbnail-banner">
        <div class="media">
         <?
         if (STUDIO_OPEN) {
           if (DEV_SERVER) {
             $online_link = base_url().'home/find/studio';
           } else {
             $online_link = base_url().'home/find/studio';
           }
         } else {
           if (DEV_SERVER) {
             $online_link = base_url().'home/find/studio';
//             $online_link = base_url().'home/find/class';
           } else {
             $online_link = base_url().'home/find/class';
           }
         }
         ?>
          <a class="media-link" href="<?= $online_link; ?>">
            <div class="col-md-6 img-bg image_delay" data-src="<?php echo base_url(); ?>uploads/icon_0604/online.png"
                 style="background-image: url('<?php echo base_url(); ?>uploads/icon_0604/online.png');">
            </div>
          </a>
        </div>
      </div>
    </div>
<!--    <div class="col-md-6 col-sm-6 col-xs-6 find-right">-->
<!--      <div class="thumbnail my-2 no-scale no-border no-padding thumbnail-banner">-->
<!--        <div class="media">-->
<!--          <a class="media-link" href="javascript:void(0);" onclick="open_find_modal('내 주변 스튜디오 찾기')">-->
<!--            <div class="col-md-6 img-bg image_delay" data-src="--><?php //echo base_url(); ?><!--uploads/icon_0604/nearby.png"-->
<!--                 style="background-image: url('--><?php //echo base_url(); ?><!--uploads/icon_0604/nearby.png');">-->
<!--            </div>-->
<!--          </a>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="thumbnail my-2 no-scale no-border no-padding thumbnail-banner">
        <div class="media">
<!--          <a class="media-link" href="javascript:void(0);" onclick="open_qna_modal()">-->
          <a class="media-link" href="http://pf.kakao.com/_xnzxbxaxb/chat" target="_blank">
            <div class="col-md-6 img-bg image_delay" data-src="<?php echo base_url(); ?>uploads/icon_0604/question.png"
                 style="background-image: url('<?php echo base_url(); ?>uploads/icon_0604/question.png');">
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="modal fade" id="findModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="find-modal-title" id="myModalLabel">내 주변 스튜디오 찾기</h4>
      </div>
      <div class="modal-body">
        <div style="text-align: center">
          Sorry! <br>
          본 서비스는 아직 준비중입니다.
        </div>
      </div>
      <div class="modal-footer">
        <!--        <button type="button" class="btn btn-danger btn-theme-sm" data-dismiss="modal"">취소</button>-->
        <button type="button" class="btn btn-danger btn-theme-sm" onclick="close_find_modal()" style="text-transform: none; font-weight: 400;">확인</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="qnaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">1:1 문의하기</h4>
      </div>
      <div class="modal-body">
        <div class="qna-email">
          <label style="width: 100%; font-size: 14px">
            이메일
            <input type="email" class="form-control" id="qna-email" name="qna_email">
          </label>
        </div>
        <div class="qna-body-modal">
          <label style="width: 100%; font-size: 14px">
            문의할 내용을 입력해주세요.
            <textarea rows="10" data-height="500" name='qna_body' id='qna-body' class="form-control" wrap="hard"></textarea>
          </label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-theme-sm" data-dismiss="modal" onclick="clear_qna();">취소</button>
        <button type="button" class="btn btn-theme btn-theme-sm"style="text-transform: none; font-weight: 400;" onclick="submit_qna();">확인</button>
      </div>
    </div>
  </div>
</div>
<script>
  function open_find_modal(text) {
    $('.find-modal-title').text(text);
    $('#findModal').modal('show');
  }
  function close_find_modal() {
    $('#findModal').modal('hide');
  }

  function find_search(q) {
    // console.log(q);
    location.href = '<?php echo base_url().'home/find/search?q='; ?>' + q;
  }

  function open_qna_modal() {
    $('#qnaModal').modal('show');
  }
  function clear_qna() {
    $('#qna-body').val('');
  }
  function submit_qna() {
    let qna_body = trim($('#qna-body').val());
    let qna_email = trim($('#qna-email').val());
  
    // console.log(qna_body);
    // console.log(qna_email);
  
    if (isValidEmailAddress(qna_email) === false) {
      alert('유효한 이메일을 입력바랍니다.');
      return false;
    }
    if (qna_body.toString().length < 10) {
      alert('최소 10자 이상 입력바랍니다.');
      return false;
    }
  
    $('#loading_set').show();
    
    let formData = new FormData();
    formData.append('qna_body', qna_body);
    formData.append('email', qna_email);
  
    $.ajax({
      url: '<?php echo base_url(); ?>home/qna', // form action url
      type: 'POST', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        $("#loading_set").fadeOut(500);
        if (data === 'done' || data.search('done') !== -1) {
          let text = '<strong>성공하였습니다</strong>';
          notify(text,'success','bottom','right');
          $('#qnaModal').modal('hide');
          setTimeout(function(){location.reload();},1000);
        } else {
          let text = '<strong>실패하였습니다</strong>' + data;
          notify(text,'warning','bottom','right');
        }
      },
      error: function (e) {
        console.log(e)
      }
    });
  }
  $(document).ready(function() {
    let input = document.getElementById('search-text');

    input.addEventListener('keyup', function(e) {
      // console.log(e.key);
      if (e.key === 'Enter') {
        e.preventDefault();
        find_search(input.value);
      }
    })
  });
</script>
