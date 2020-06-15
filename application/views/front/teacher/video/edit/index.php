<script src="https://checkout.stripe.com/checkout.js"></script>
<style>
  @media (min-width: 1200px){
    .cus_cont {
      width: 1290px;
    }
  }
</style>
<section class="page-section">
  <div class="wrap container">
    <!-- <div id="profile-content"> -->
    <div class="row profile">
      <div class="col-lg-12 col-md-12" style="padding-left: 0 !important; padding-right: 0 !important;">
        <div id="profile_content">
          <div class="information-title">클래스 수정</div>
          <div class="details-wrap">
            <div class="row">
              <div class="col-md-12">
                <div class="tabs-wrapper content-tabs">
                  <div class="tab-content">
                    <div class="tab-pane fade in active">
                      <div class="details-wrap">
                        <div class="block-title alt">
                          <i class="fa fa-angle-down"></i>
                          동영상 정보 입력
                        </div>
                        <p class="text-success">유튜브 동영상만 지원이 됩니다<br>수업 분류 기타에 여러 분류 입력 시 공백으로 구분해 주세요
                        </p>
                        <div class="details-box">
                          <?php
                          echo form_open(base_url() . 'home/teacher/do_edit_video/'.$video_data->video_id.'/'.$user_data->user_id,
                            array(
                            'class' => 'form-login',
                            'method' => 'post',
                            'enctype' => 'multipart/form-data'
                          ));
                          ?>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <input value="<?php echo $video_data->title; ?>" class="form-control" id="title" name="title" type="text" placeholder="제목" data-toggle="tooltip" title="title">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <input value="<?php echo $video_data->desc; ?>" class="form-control" id="description" name="description" type="text" placeholder="소개" data-toggle="tooltip" title="description">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <input readonly value="<?php echo $video_data->video_url; ?>" class="form-control" id="video_url" name="video_url" type="url" placeholder="비디오 공유 URL" data-toggle="tooltip" title="video_url">
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
                            <div class="col-md-12" style="border-top: 2px solid #f5f5f5; margin-top: 35px">
                              <button type="button" class="btn btn-theme pull-right open_modal edit-video-req" data-toggle="modal" data-target="#editVideoReq">
                                확인
                              </button>
                              <button type="button" class="hidden btn btn-theme pull-right btn_dis signup_btn" data-relocation='<?php echo base_url().'home/teacher/profile/'.$user_data->user_id; ?>' data-unsuccessful='신청에 실패했습니다.' data-success='신청에 성공했습니다.' data-ing='진행중'>
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
              $(".post_confirm").click(function(){
                $(".post_confirm_close").click();
                $(".signup_btn").click();
              });

              $('html').animate({scrollTop:$('html, body').offset().top}, 100);
            });

          </script>

        </div>
      </div>
    </div>
    <!-- </div> -->
  </div>
</section>

<!-- Modal For C-C Post confirm -->
<div class="modal fade" id="editVideoReq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">클래스 수정</h4>
      </div>
      <div class="modal-body">
        <div class="text-video">
          <div>비디오 수정하시겠습니까?
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

<!-- Modal For C-C Status change -->
<div class="modal fade" id="statusChange" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">change_availability_status</h4>
      </div>
      <div class="modal-body">
        <div class="text-video content_body" id="content_body">
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal For C-C Status change -->
<style type="text/css">
  .pagination_box a{
    cursor: pointer;
  }
  .pleft_nav li.active {
    background-color: #ebebeb!important;
  }
</style>
<script type="text/javascript">

  $(document).ready(function(){
    // active_menu_bar('find');
  });
</script>
<style type="text/css">
  .pagination_box a {
    cursor: pointer;
  }
  .pleft_nav li.active {
    background-color: #ebebeb !important;
  }
  .fa-angle-up,.fa-angle-down {
    font-family: FontAwesome !important;
  }
</style>
