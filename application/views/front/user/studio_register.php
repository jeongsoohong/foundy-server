<div class="information-title">온라인 스튜디오 신청</div>
<div class="details-wrap" id="stu">
  <div class="row">
    <div class="col-md-12">
      <div class="tabs-wrapper content-tabs">
        <div class="tab-content">
          <div class="tab-pane fade in active">
            <div class="details-wrap">
              <div class="block-title alt" id="stu_tit">
                <i class="fa fa-angle-down"></i>
                온라인 스튜디오 정보 입력
              </div>
              <p class="text-success">
                온라인 스튜디오 신청 완료 후 승인까지 3-4일이 소요됩니다<br>스튜디오 분류 기타에 여러 분류 입력 시 공백으로 구분해 주세요
              </p>
              <div class="details-box">
                <?php
                echo form_open(base_url() . 'home/user/do_studio_register/', array(
                  'class' => 'form-login',
                  'method' => 'post',
                  'enctype' => 'multipart/form-data'
                ));
                ?>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input class="form-control" id="studio-title" name="title" value="" type="text"
                             placeholder="온라인 스튜디오 이름" data-toggle="tooltip" title="studio_name">
                    </div>
                  </div>
<!--                  <div class="col-md-12">-->
<!--                    <div class="form-group">-->
<!--                      <input class="form-control" id="about" name="about" value="" type="text"-->
<!--                             placeholder="about" data-toggle="tooltip" title="about">-->
<!--                    </div>-->
<!--                  </div>-->
                  <div class="col-md-12">
                    <div class="form-group">
                      <input class="form-control" id="email" name="email" value="" type="email"
                             placeholder="고객과 상담 가능한 이메일" data-toggle="tooltip" title="email">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input disabled class="form-control" id="instagram-url" name="instagram" type="url"
                             placeholder="인스타그램 홈 url" data-toggle="tooltip" title="instagram"
                             value="<?= $teacher->instagram; ?>">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input disabled class="form-control" id="youtube-url" name="youtube" type="url"
                             placeholder="유투브 URL" data-toggle="tooltip" title="youtube"
                             value="<?= $teacher->youtube; ?>">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input class="form-control" id="payment_page" name="payment_page" type="url"
                             placeholder="결제페이지 URL" data-toggle="tooltip" title="payment_page"
                             value="">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="col-sm-3 control-label" for="demo-hor-inputemail">요가</label>
                      <div class="col-sm-6">
                        <div class="col-sm-">
                          <fieldset>
                            <?php
                            $categories = $this->db->order_by('category_id', 'asc')->get_where('category_studio', array('type' => STUDIO_TYPE_YOGA))->result();
                            foreach ($categories as $category) {
                              $category_id = $category->category_id;
                              $name = $category->name;
                              ?>
                              <label style="font-weight: 200 !important;">
                                <input id="<?php echo $category_id; ?>" class='form-checkbox' name="category_yoga[]" type="checkbox" value="<?php echo $name;?>"/>
                                <?php echo $name; ?>
                              </label>
                              <?php
                            }
                            ?>
                            <br>
                            <label style="font-weight: 200 !important; margin: 10px 0 0 0 !important; width: auto !important;">
                              기타
                              <input class="form-block" id="etc" name="category_yoga_etc" value="" type="text" data-toggle="tooltip" title="category_yoga_etc" style="margin-left: 10px !important;"/>
                            </label>
                          </fieldset>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="col-sm-3 control-label" for="demo-hor-inputemail">필라테스</label>
                      <div class="col-sm-6">
                        <div class="col-sm-">
                          <fieldset>
                            <?php
                            $categories = $this->db->order_by('category_id', 'asc')->get_where('category_studio', array('type' => STUDIO_TYPE_PILATES))->result();
                            foreach ($categories as $category) {
                              $category_id = $category->category_id;
                              $name = $category->name;
                              ?>
                              <label style="font-weight: 200 !important;">
                                <input id="<?php echo $category_id; ?>" class='form-checkbox' name="category_pilates[]" type="checkbox" value="<?php echo $name;?>"/>
                                <?php echo $name; ?>
                              </label>
                              <?php
                            }
                            ?>
                            <br>
                            <label style="font-weight: 200 !important; margin: 10px 0 0 0 !important; width: auto !important;">
                              기타
                              <input class="form-block" id="etc" name="category_pilates_etc" value="" type="text" data-toggle="tooltip" title="category_pilates_etc" style="margin-left: 10px !important;"/>
                            </label>
                          </fieldset>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12" style="border-top: 2px solid #f5f5f5; margin-top: 35px">
                    <button type="button" class="btn btn-theme pull-right open_modal
                                        studio-register" data-toggle="modal" data-target="#studioRegisterModal">
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

  var valid_title = false;

  $(document).ready(function(){
    $(".studio-register.open_modal").click(function(){
      if (document.getElementById('studio-title').value !== '') {
        valid_title = true;
      }
      if (valid_title === false) {
        alert("온라인 스튜디오 이름을 입력해 주세요");
        return false;
      }

      return true;
    });

    $(".post_confirm").click(function(){
      $(".post_confirm_close").click();
      $(".signup_btn").click();
    });

    $('html').animate({scrollTop:$('html, body').offset().top}, 100);
  });

</script>

