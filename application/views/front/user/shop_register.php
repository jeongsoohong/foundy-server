<style>
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
<div class="information-title">샵 회원 신청</div>
<div class="details-wrap">
  <div class="row">
    <div class="col-md-12">
      <div class="tabs-wrapper content-tabs">
        <div class="tab-content">
          <div class="tab-pane fade in active">
            <div class="details-wrap">
              <div class="block-title alt">
                <i class="fa fa-angle-down"></i>
                샵 정보 입력
              </div>
              <p class="text-success">샵 입점 신청 시, 담당자 검토 후 기재해 주신 연락처로 답변 드리도록 하겠습니다. 감사합니다.</p>
              <div class="details-box">
                <?php
                echo form_open(base_url() . 'home/user/do_shop_register/', array(
                  'class' => 'form-login',
                  'method' => 'post',
                  'enctype' => 'multipart/form-data'
                ));
                ?>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input class="form-control required" id="shop_name" name="shop_name" value=""
                             type="text"
                             placeholder="브랜드명(필수)" data-toggle="tooltip" title="shop_name">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input class="form-control required" id="shop_items" name="shop_items" value=""
                             type="text"
                             placeholder="입점품목(필수)" data-toggle="tooltip" title="shop_items">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input class="form-control required" id="shop_homepage_url" name="shop_homepage_url" value=""
                             type="url"
                             placeholder="홈페이지 URL(필수)" data-toggle="tooltip" title="shop_homepage_url">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input class="form-control required" id="representative_name" name="representative_name" value=""
                             type="text"
                             placeholder="대표자명(필수)" data-toggle="tooltip" title="representative_name">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input class="form-control required" id="shop_phone" name="shop_phone" value=""
                             type="tel"
                             placeholder="연락처(필수)" data-toggle="tooltip" title="shop_phone">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input class="form-control required" id="email" name="email" value=""
                             type="email"
                             placeholder="이메일(필수)" data-toggle="tooltip" title="email">
                    </div>
                  </div>
                  <div class="col-md-12 btm_border">
                    <div class="form-group">
                      <label class="col-sm-12 control-label">사업자등록증(필수)</label>
                      <div class="col-sm-12">
                        <span class="pull-left btn btn-default btn-file">파일선택
                          <input type="file" name="business_license_img" onchange="preview(this);" class="form-control required">
                        </span>
                        <br><br>
                        <span id="previewImg" ></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input class="form-control" id="sns_url" name="sns_url" value=""
                             type="url"
                             placeholder="인스타그램 / 페이스북 URL" data-toggle="tooltip"
                             title="sns_url">
                    </div>
                  </div>
                  <div class="col-md-12" style="border-top: 2px solid #f5f5f5; margin-top: 35px">
                    <button type="button" class="btn btn-theme pull-right open_modal
                                        shop-register" data-toggle="modal" data-target="#shopRegisterModal">
                      확인
                    </button>
                    <button type="button" class="hidden btn btn-theme pull-right btn_dis
                                        signup_btn" data-reload='ok' data-unsuccessful='신청에 실패했습니다.' data-success='신청에 성공했습니다.' data-ing='진행중'>
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
<script>

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

  $(document).ready(function(){
    $(".shop-register.open_modal").click(function(){
    });

    $(".post_confirm").click(function(){
      $(".post_confirm_close").click();
      $(".signup_btn").click();
    });

    $('html').animate({scrollTop:$('html, body').offset().top}, 100);
  });

</script>

