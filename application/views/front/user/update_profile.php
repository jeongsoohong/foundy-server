<!--<link href="--><?php //echo base_url(); ?><!--template/back/css/activeit.min.css" rel="stylesheet">-->
<style>
  .btn-theme {
    background-color: #7d7d7d !important;
    border-color: #7d7d7d !important;
    color: #ffffff !important;
  }
  .form-control {
    height: 50px !important;
  }
  .nav-tabs li a {
    font-weight: 300 !important;
  }
  .btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: 0;
    background: white;
    cursor: inherit;
    display: block;
  }
</style>
<div class="information-title">
  프로필 편집
</div>
<div class="details-wrap">
  <div class="row">
    <div class="col-md-12">
      <div class="tabs-wrapper content-tabs">
        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#tab1" data-toggle="tab">
              프로필
            </a>
          </li>
          <li>
            <a href="#tab2" data-toggle="tab">
              비밀번호
            </a>
          </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane fade in active" id="tab1">
            <div class="details-wrap">
              <div class="block-title alt">
                <i class="fa fa-angle-down"></i>
                프로필 수정
              </div>
              <p class="text-success">
                * 고화질의 사진은 업로드가 안될 수 있습니다. <br>
                * 사진 선택 후 하단에서 사진 크기를 ‘작게’로 선택해 주세요.<br>
                * 권장 비율 : 정사각형<br>
                - 가로형, 세로형 이미지의 경우 이미지가 잘릴 수 있습니다. 올리실때 참고해 주세요.
              </p>
              <div class="details-box">
                <?php
                echo form_open(base_url() . 'home/user/update_profile/', array(
                  'class' => 'form-login',
                  'method' => 'post',
                  'enctype' => 'multipart/form-data'
                ));
                ?>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input class="form-control" name="email" value="<?php echo $user_data->email; ?>" type="email" placeholder="이메일" readonly>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input class="form-control" name="nickname" value="<?php echo $user_data->nickname; ?>" type="text" placeholder="별명">
                    </div>
                  </div>
                  <div class="col-md-12 btm_border">
                    <div class="form-group">
                      <label class="col-sm-12 control-label">프로필 사진</label>
                      <div class="col-sm-12">
                        <span class="pull-left btn btn-default btn-file">사진선택
                          <input type="file" name="profile_img" onchange="preview(this);" class="form-control">
                        </span>
                        <br><br>
                        <span id="previewImg" ></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                  </div>
                  <div class="col-md-12" style="border-top: 2px solid #f5f5f5; margin-top: 35px">
                    <button type="button" class="btn btn-theme pull-right open_modal update-profile" data-toggle="modal" data-target="#updateProfileModal">
                      확인
                    </button>
                    <button type="button" class="hidden btn btn-theme pull-right btn_dis signup_btn update_profile" data-reload='ok' data-unsuccessful='신청에 실패했습니다.' data-success='신청에 성공했습니다.' data-ing='진행중'>
                      확인
                    </button>
                  </div>
                </div>
                </form>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="tab2">
            <div class="details-wrap">
              <div class="block-title alt"> <i class="fa fa-angle-down"></i>비밀번호 변경</div>
              <div class="details-box">
                <?php
                echo form_open(base_url() . 'home/user/update_password/', array(
                  'class' => 'form-password',
                  'method' => 'post',
                  'enctype' => 'multipart/form-data'
                ));
                ?>
                <div class="row">
                  <?php if ($user_data->password != '' || strlen($user_data->password) > 0) { ?>
                    <div class="col-md-12">
                      <div class="form-group">
                        <input required name="password" type="password" placeholder="비밀번호" class="form-control">
                      </div>
                    </div>
                  <?php } ?>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input required name="password1" type="password" placeholder="새 비밀번호" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input required name="password2" type="password" placeholder="새 비밀번호 확인" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-12" style="border-top: 2px solid #f5f5f5; margin-top: 35px">
                    <button type="button" class="btn btn-theme pull-right open_modal" data-toggle="modal" data-target="#updatePasswordModal">
                      확인
                    </button>
                    <button type="button" class="hidden btn btn-theme pull-right btn_dis signup_btn update_password" data-reload='ok' data-unsuccessful='신청에 실패했습니다.' data-success='신청에 성공했습니다.' data-ing='진행중'>
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
<script src="<?php echo base_url(); ?>template/back/js/activeit.min.js"></script>
<script>
  $(document).ready(function() {
    $('html').animate({scrollTop:$('html, body').offset().top}, 100);
  });
  
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
  
  $(".post_confirm").click(function(){
    var id = $(this).attr('id');
    $(".post_confirm_close").click();
    $(".signup_btn." + id).click();
  });

</script>
