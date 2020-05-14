<script src="https://checkout.stripe.com/checkout.js"></script>
<style>
  @media (min-width: 1200px){
    .cus_cont {
      width: 1290px;
    }
  }
  .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6 {
    padding: 0 0 0 0 !important;
  }
  .select-arrow {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    /* Some browsers will not display the caret when using calc, so we put the fallback first */
    background: url("<?php echo base_url(); ?>uploads/icon/arrow_down.png") white no-repeat 98.5% !important; /* !important used for overriding all other customisations */
  }
  /*For IE*/
  select::-ms-expand { display: none; }
</style>
<section class="page-section">
  <div class="wrap container">
    <!-- <div id="profile-content"> -->
    <div class="row profile">
      <div class="col-lg-12 col-md-12" style="padding-left: 0 !important; padding-right: 0 !important;">
        <div id="profile_content">
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
                          스케줄 정보 수정
                        </div>
                        <p class="text-success">매주 열리는 일정은 체크박스를 활용하세요
                        </p>
                        <div class="details-box">
                          <?php
                          echo form_open(base_url() . 'home/center/schedule/do_mod?uid='.$user_data->user_id.'&sid='.$schedule_data->schedule_id, array(
                            'class' => 'form-login',
                            'method' => 'post',
                            'enctype' => 'multipart/form-data'
                          ));
                          ?>
                          <div class="row">
                            <div class="col-md-12" style="margin-top: 0 !important;">
                              <div class="col-md-5 col-xs-5" style="width: 180px; padding: 0 0 0 0 !important;">
                                <div class="form-group">
                                  <input class="form-control" id="start_date" name="start_date" value="<?php echo $schedule_data->start_date; ?>" type="date" placeholder="시작날짜" data-toggle="tooltip" title="start_date">
                                </div>
                              </div>
                              <div class="col-md-2 col-xs-2" style="width: auto; padding: 15px 5px 15px 5px !important;">
                                <span>~</span>
                              </div>
                              <div class="col-md-5 col-xs-5" style="width: 180px; padding: 0 0 0 0 !important;">
                                <div class="form-group">
                                  <input class="form-control" id="end_date" name="end_date" value="<?php echo $schedule_data->end_date; ?>" type="date" placeholder="종료날짜" data-toggle="tooltip" title="end_date">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-12" style="margin-top: 0 !important;">
                              <div class="col-md-5 col-xs-5" style="width: 180px; padding: 0 0 0 0 !important;">
                                <div class="form-group">
                                  <input class="form-control" id="start_time" name="start_time" value="<?php echo $schedule_data->start_time; ?>" type="time" placeholder="시작시간" data-toggle="tooltip" title="start_time">
                                </div>
                              </div>
                              <div class="col-md-2 col-xs-2" style="width: auto; padding: 15px 5px 15px 5px !important;">
                                <span>~</span>
                              </div>
                              <div class="col-md-5 col-xs-5" style="width: 180px; padding: 0 0 0 0 !important;">
                                <div class="form-group">
                                  <input class="form-control" id="end_time" name="end_time" value="<?php echo $schedule_data->end_time; ?>" type="time" placeholder="종료시간" data-toggle="tooltip" title="end_time">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="col-sm-3 control-label" for="demo-hor-inputemail">매주</label>
                                <div class="col-sm-6">
                                  <div class="col-sm-">
                                    <fieldset>
                                      <?php
                                      $week_str = array ("일요일마다", "월요일마다", "화요일마다", "수요일마다", "목요일마다", "금요일마다", "토요일마다");
                                      for ($i = 0; $i < 7; $i++) {
                                        $w = 'weekly_'.$i;
                                      ?>
                                      <label style="font-weight: 200 !important;">
                                        <input class='form-checkbox' name="weeklys[]" type="checkbox" value="<?php echo $i; ?>" <?php if ($schedule_data->{$w} == 1) { echo 'checked'; }?>/>
                                        <?php echo $week_str[$i]; ?>
                                      </label>
                                      <?php
                                      }
                                      ?>
                                    </fieldset>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <select class="form-control select-arrow select-teacher" id="teacher_id" name="teacher_id">
                                  <option value="0" <?php if ($schedule_data->schedule_id > 0) { echo 'disabled'; } ?>>강사</option>
                                  <?php
                                  foreach($teacher_data as $teacher) {
                                    ?>
                                    <option value="<?php echo $teacher->teacher_id; ?>" <?php if ($teacher->teacher_id == $schedule_data->teacher_id) { echo 'selected'; } ?>><?php echo $teacher->name; ?></option>
                                    <?php
                                  }
                                  ?>
                                  <option value="-1" <?php if ($schedule_data->teacher_id == -1) { echo 'selected'; } ?>>직접입력</option>
                                </select>
                              </div>
                            </div>
                            <?php if ($schedule_data->teacher_id == -1) { ?>
                            <div class="col-md-12 teacher_name">
                              <?php } else { ?>
                              <div class="col-md-12 teacher_name" style="display: none">
                                <?php } ?>
                              <div class="form-group">
                                <input class="form-control" id="teacher_name" name="teacher_name" value="<?php if ($schedule_data->teacher_id == -1) { echo $schedule_data->teacher_name; } ?>" type="text" placeholder="강사이름" data-toggle="tooltip" title="teacher_name">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <input class="form-control" id="schedule_title" name="schedule_title" value="<?php if ($schedule_data->schedule_id > 0) { echo $schedule_data->title; } ?>" type="text" placeholder="스케줄 이름" data-toggle="tooltip" title="schedule_title">
                              </div>
                            </div>
                              <?php if ($schedule_data->schedule_id == 0) { ?>
                              <div class="col-md-12" style="display: none">
                                <?php } else { ?>
                                <div class="col-md-12">
                                  <?php } ?>
                              <div class="form-group">
                                <label class="col-sm-3 control-label" for="demo-hor-inputemail"></label>
                                <div class="col-sm-6">
                                  <div class="col-sm-">
                                    <fieldset>
                                      <label style="font-weight: 200 !important;">
                                        <input class='form-checkbox' id='schedule_del' name="schedule_del" type="checkbox" value="1"/>
                                        삭제하기
                                      </label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-12" style="border-top: 2px solid #f5f5f5; margin-top: 35px">
                              <button type="button" class="btn btn-theme pull-right open_modal mod-schedule-req" data-toggle="modal" data-target="#modScheduleReq">
                                확인
                              </button>
                              <button type="button" class="hidden btn btn-theme pull-right btn_dis signup_btn" data-reload='no' data-relocation='<?php echo base_url()."home/center/profile/{$user_data->user_id}"; ?>' data-unsuccessful='신청에 실패했습니다.' data-success='신청에 성공했습니다.' data-ing='진행중'>
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
<div class="modal fade" id="modScheduleReq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">센터 정보 수정</h4>
      </div>
      <div class="modal-body">
        <div class="text-schedule">
          <div>스케줄 정보를 수정하시겠습니까?
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
        <div class="text-instructor content_body" id="content_body">
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

  $(document).ready(function() {
    $('.select-teacher').change(function() {
      var val = $('.select-teacher option:selected').val();
      // console.log(val);
      if (val === '-1') {
        $('.teacher_name').show();
      } else {
        $('.teacher_name').hide();
      }
      $('.select-teacher option:first').prop('disabled', true);
    });

    $('#schedule_del').change(function() {
      var del = $('#schedule_del').is(':checked');
      // console.log(del);
      if (del === true) {
        $('input').attr('disabled', true);
        $('.select-teacher').attr('disabled', true);
        $('#schedule_del').attr('disabled', false);
      } else {
        $('input').attr('disabled', false);
        $('.select-teacher').attr('disabled', false);
      }
    })

    // $('.select-teacher').click(function() {
    //   var first = $('.select-teacher option:first').val();
    //   if (first === '0') {
    //     $('.select-teacher option:first').remove();
    //   }
    //   // console.log(first);
    // });
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

