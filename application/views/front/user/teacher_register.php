<div class="information-title">강사 회원 신청</div>
<div class="details-wrap">
  <div class="row">
    <div class="col-md-12">
      <div class="tabs-wrapper content-tabs">
        <div class="tab-content">
          <div class="tab-pane fade in active">
            <div class="details-wrap">
              <div class="block-title alt">
                <i class="fa fa-angle-down"></i>
                강사 정보 입력
              </div>
              <p class="text-success">강사 신청 완료 후 승인까지 3-4일이 소요됩니다<br>수업 분류 기타에 여러 분류 입력 시 공백으로 구분해 주세요</p>
              <div class="details-box">
                <?php
                echo form_open(base_url() . 'home/user/do_teacher_register/', array(
                  'class' => 'form-login',
                  'method' => 'post',
                  'enctype' => 'multipart/form-data'
                ));
                ?>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input class="form-control" id="teacher_name" name="teacher_name" value=""
                             type="text"
                             placeholder="강사이름" data-toggle="tooltip" title="teacher_name">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input class="form-control" id="about" name="about" value=""
                             type="text"
                             placeholder="about" data-toggle="tooltip" title="about">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input class="form-control" id="youtube-url" name="youtube" value=""
                             type="url"
                             placeholder="유투브 홈 URL" data-toggle="tooltip" title="youtube">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input class="form-control" id="instagram-url" name="instagram" value=""
                             type="url"
                             placeholder="인스타그램 홈 url" data-toggle="tooltip"
                             title="instagram">
                    </div>
                  </div>
                  <!--                  <div class="col-md-12">-->
                  <!--                    <div class="form-group">-->
                  <!--                      <input class="form-control" id="homepage-url" name="homepage" value=""-->
                  <!--                             type="url"-->
                  <!--                             placeholder="블로그 / 홈페이지 URL" data-toggle="tooltip"-->
                  <!--                             title="homepage">-->
                  <!--                    </div>-->
                  <!--                  </div>-->
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="col-sm-3 control-label" for="demo-hor-inputemail">수업분류</label>
                      <div class="col-sm-6">
                        <div class="col-sm-">
                          <fieldset>
                            <?php
                            $categories = $this->db->order_by('category_id', 'asc')->get('category_class')->result();
                            foreach ($categories as $category) {
                              $category_id = $category->category_id;
                              $name = $category->name;
                              ?>
                              <label style="font-weight: 200 !important;">
                                <input id="<?php echo $category_id; ?>" class='form-checkbox' name="category[]" type="checkbox" value="<?php echo $name;?>"/>
                                <?php echo $name; ?>
                              </label>
                              <?php
                            }
                            ?>
                            <br>
                            <label style="font-weight: 200 !important; margin: 10px 0 0 0 !important; width: auto !important;">
                              기타
                              <input class="form-block" id="etc" name="category_etc" value="" type="text" data-toggle="tooltip" title="category_etc" style="margin-left: 10px !important;"/>
                              <!--                                      <input id="class_category_etc" name="class_category_etc" type="text" value="" title="class_category_etc"/>-->
                            </label>
                          </fieldset>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12" style="border-top: 2px solid #f5f5f5; margin-top: 35px">
                    <button type="button" class="btn btn-theme pull-right open_modal
                                        teacher-register" data-toggle="modal" data-target="#teacherRegisterModal">
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

  $(document).ready(function(){
    $(".teachr-register.open_modal").click(function(){
    });

    $(".post_confirm").click(function(){
      $(".post_confirm_close").click();
      $(".signup_btn").click();
    });

    $('html').animate({scrollTop:$('html, body').offset().top}, 100);
  });

</script>

