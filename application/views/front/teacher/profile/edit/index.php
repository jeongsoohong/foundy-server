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
<section class="page-section">
  <div class="wrap container">
    <!-- <div id="profile-content"> -->
    <div class="row profile">
      <div class="col-lg-12 col-md-12" style="padding-left: 0 !important; padding-right: 0 !important;">
        <div id="profile_content">
          <div class="information-title">강사 프로필 수정</div>
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
<!--                        <p class="text-success">-->
<!--                          * 수업 분류 기타에 여러 분류 입력 시 공백으로 구분해 주세요.<br>-->
<!--                          * 권장 이미지 사이즈는 1000 * 500 px, 이미지 용량은 최대 16MB까지 업로드 가능합니다.<br>-->
<!--                          * 노출되는 위치에 따라 이미지가 잘려 보일 수 있으므로 인물이 중앙에 위치한 사진을 추천드립니다.<br>-->
<!--                          * 세로형 이미지는 오류가 발생할 수 있으므로 가급적 가로형 혹은 정사각형 비율의 이미지를 업로드 해주세요. 세로형 이미지가 회전되어 업로드 되는 경우, 앨범에서 이미지를 다시 돌려서 저장 후 업로드 해주세요.-->
<!--                        </p>-->
                        <div class="details-box">
                          <?php
                          echo form_open(base_url() . 'home/teacher/do_edit_profile/'.$teacher_data->teacher_id, array(
                            'class' => 'form-login',
                            'method' => 'post',
                            'enctype' => 'multipart/form-data'
                          ));
                          ?>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <input readonly value="<?php echo $teacher_data->name; ?>" class="form-control" id="teacher_name" name="teacher_name" type="text"  placeholder="강사이름" data-toggle="tooltip" title="teacher_name">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <input value="<?php echo $teacher_data->about; ?>" class="form-control" id="about" name="about" type="text" placeholder="about" data-toggle="tooltip" title="about">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <input value="<?php echo $teacher_data->youtube; ?>" class="form-control" id="youtube-url" name="youtube" type="url" placeholder="유투브 홈 URL" data-toggle="tooltip" title="youtube">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <input value="<?php echo $teacher_data->instagram; ?>" class="form-control" id="instagram-url" name="instagram" type="url" placeholder="인스타그램 홈 URL" data-toggle="tooltip"
                                       title="instagram">
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
                                          <input <?php if(in_array($name,$category_data)){ echo 'checked'; }?> id="<?php echo $category_id; ?>" class='form-checkbox' name="category[]" type="checkbox" value="<?php echo $name;?>"/>
                                          <?php echo $name; ?>
                                        </label>
                                        <?php
                                      }
                                      ?>
                                      <br>
                                      <label style="font-weight: 200 !important; margin: 10px 0 0 0 !important; width: auto !important;">
                                        기타
                                        <input value="<?php echo $category_etc; ?>" class="form-block" id="etc" name="category_etc" type="text" data-toggle="tooltip" title="category_etc" style="margin-left: 10px !important;"/>
                                      </label>
                                    </fieldset>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <p class="text-success" style="padding: 20px 15px 0;">
                              * 수업 분류 기타에 여러 분류 입력 시 공백으로 구분해 주세요.<br>
                              * 권장 이미지 사이즈는 1000 * 500 px, 이미지 용량은 최대 16MB까지 업로드 가능합니다.<br>
                              * 노출되는 위치에 따라 이미지가 잘려 보일 수 있으므로 인물이 중앙에 위치한 사진을 추천드립니다.<br>
                              * 세로형 이미지는 오류가 발생할 수 있으므로 가급적 가로형 혹은 정사각형 비율의 이미지를 업로드 해주세요. 세로형 이미지가 회전되어 업로드 되는 경우, 앨범에서 이미지를 다시 돌려서 저장 후 업로드 해주세요.
                            </p>
                            <div class="col-md-12" style="border-top: 2px solid #f5f5f5; margin-top: 35px">
                              <button type="button" class="btn btn-theme pull-right open_modal
                                        teacher-edit" data-toggle="modal" data-target="#teacherEditModal">
                                확인
                              </button>
                              <button type="button" class="hidden btn btn-theme pull-right btn_dis
                                        signup_btn" data-relocation='<?php echo base_url().'home/teacher/profile/'.$teacher_data->teacher_id; ?>' data-unsuccessful='신청에 실패했습니다.' data-success='신청에 성공했습니다.' data-ing='진행중'>
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
        </div>
      </div>
    </div>
    <!-- </div> -->
  </div>
</section>
<!-- Modal For C-C Post confirm -->
<div class="modal fade" id="teacherEditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">강사 프로필 수정</h4>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <div>정말 수정하시겠습니까?
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger post_confirm_close" data-dismiss="modal">취소</button>
        <button type="button" class="btn btn-theme btn-theme-sm post_confirm" style="text-transform: none;
                font-weight: 400;">확인</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal For C-C Post confirm -->
<script>
  $(document).ready(function(){
    $(".post_confirm").click(function(){
      $(".post_confirm_close").click();
      $(".signup_btn").click();
    });

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
</script>

