<div class="row">
  <div class="col-md-12">
    <?php
    echo form_open(base_url() . 'admin/coupon/update/'.$coupon->coupon_id, array(
      'class' => 'form-horizontal',
      'method' => 'post',
      'id' => 'coupon_edit',
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
              <h4 class="text-thin text-center">쿠폰 상세</h4>
            </div>
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-1">쿠폰명</label>
              <div class="col-sm-6">
                <input type="text" name="coupon_title" id="demo-hor-1" placeholder="쿠폰명을 입력해주세요"
                       class="form-control required" value="<?php echo $coupon->coupon_title;?>">
              </div>
            </div>
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-3">혜택회원</label>
              <div class="col-sm-6">
                <select class="form-control required" name="user_type" id="user_type" onchange="set_coupon_desc();">
                  <option <?php if ($coupon->user_type == COUPON_USER_TYPE_DEFAULT) echo 'selected'; ?>
                    value="<?php echo COUPON_USER_TYPE_DEFAULT; ?>"><?php echo $this->coupon_model->get_coupon_user_type_str(COUPON_USER_TYPE_DEFAULT); ?></option>
                  <option <?php if ($coupon->user_type == COUPON_USER_TYPE_REGISTER) echo 'selected'; ?>
                    value="<?php echo COUPON_USER_TYPE_REGISTER; ?>"><?php echo $this->coupon_model->get_coupon_user_type_str(COUPON_USER_TYPE_REGISTER); ?></option>
                  <option <?php if ($coupon->user_type == COUPON_USER_TYPE_SHOP_PURCHASING) echo 'selected'; ?>
                    value="<?php echo COUPON_USER_TYPE_SHOP_PURCHASING; ?>"><?php echo $this->coupon_model->get_coupon_user_type_str(COUPON_USER_TYPE_SHOP_PURCHASING); ?></option>
                  <option <?php if ($coupon->user_type == COUPON_USER_TYPE_CENTER) echo 'selected'; ?>
                    value="<?php echo COUPON_USER_TYPE_CENTER; ?>"><?php echo $this->coupon_model->get_coupon_user_type_str(COUPON_USER_TYPE_CENTER); ?></option>
                  <option <?php if ($coupon->user_type == COUPON_USER_TYPE_TEACHER) echo 'selected'; ?>
                    value="<?php echo COUPON_USER_TYPE_TEACHER; ?>"><?php echo $this->coupon_model->get_coupon_user_type_str(COUPON_USER_TYPE_TEACHER); ?></option>
<!--                  <option --><?php //if ($coupon->user_type == COUPON_USER_TYPE_CENTER_TEACHER) echo 'selected'; ?>
<!--                    value="--><?php //echo COUPON_USER_TYPE_CENTER_TEACHER; ?><!--">--><?php //echo $this->coupon_model->get_coupon_user_type_str(COUPON_USER_TYPE_CENTER_TEACHER); ?><!--</option>-->
                </select>
              </div>
            </div>
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-5">쿠폰수</label>
              <div class="col-sm-6">
                <input type="text" name="coupon_count" id="demo-hor-5" placeholder="쿠폰수 (0: 무제한)"
                       class="form-control required" value="<?php echo $coupon->coupon_count; ?>">
              </div>
            </div>
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-2">쿠폰타입</label>
              <div class="col-sm-6">
                <select class="form-control required" name="coupon_type">
                  <option <?php if ($coupon->coupon_type == COUPON_TYPE_DEFAULT) echo 'selected'; ?>
                    value="<?php echo COUPON_TYPE_DEFAULT; ?>"><?php echo $this->coupon_model->get_coupon_type_str(COUPON_TYPE_DEFAULT); ?></option>
                  <option <?php if ($coupon->coupon_type == COUPON_TYPE_SHOP_DISCOUNT_PRICE) echo 'selected'; ?>
                    value="<?php echo COUPON_TYPE_SHOP_DISCOUNT_PRICE; ?>"><?php echo $this->coupon_model->get_coupon_type_str(COUPON_TYPE_SHOP_DISCOUNT_PRICE); ?></option>
                  <option <?php if ($coupon->coupon_type == COUPON_TYPE_SHOP_DISCOUNT_PERCENT) echo 'selected'; ?>
                    value="<?php echo COUPON_TYPE_SHOP_DISCOUNT_PERCENT; ?>"><?php echo $this->coupon_model->get_coupon_type_str(COUPON_TYPE_SHOP_DISCOUNT_PERCENT); ?></option>
                  <option <?php if ($coupon->coupon_type == COUPON_TYPE_SHOP_FREE_SHIPPING) echo 'selected'; ?>
                    value="<?php echo COUPON_TYPE_SHOP_FREE_SHIPPING; ?>"><?php echo $this->coupon_model->get_coupon_type_str(COUPON_TYPE_SHOP_FREE_SHIPPING); ?></option>
                </select>
              </div>
            </div>
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-4">할인가격(율)</label>
              <div class="col-sm-6">
                <input type="text" name="coupon_benefit" id="demo-hor-4" placeholder="할인 가격(원) 또는 할일율(%)"
                       class="form-control required" value="<?php echo $coupon->coupon_benefit; ?>">
              </div>
            </div>
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="coupon_desc">쿠폰설명</label>
              <div class="col-sm-6">
                <input type="text" name="coupon_desc" id="coupon_desc" placeholder="쿠폰설명"
                       class="form-control required" value="<?php echo $coupon->coupon_desc; ?>">
              </div>
            </div>
            <!--            <div class="form-group btm_border">-->
            <!--              <label class="col-sm-4 control-label" for="demo-hor-6">쿠폰이미지 url</label>-->
            <!--              <div class="col-sm-6">-->
            <!--                <input readonly type="text" name="coupon_img_url" id="demo-hor-6" placeholder="쿠폰이미지"-->
            <!--                       class="form-control" value="">-->
            <!--              </div>-->
            <!--            </div>-->
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-7">발급시작시간</label>
              <div class="col-sm-6 input-group date" id="datetimepicker1" style="padding-left: 15px !important; padding-right: 15px !important;">
                <input id="demo-hor-7" type='text' class="form-control required" name="start_at" placeholder="시작시간"
                value="<?php echo date('m/d/Y g:i A',strtotime($coupon->start_at)); ?>"/>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </div>
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-8">발급종료시간</label>
              <div class="col-sm-6 input-group date" id="datetimepicker2" style="padding-left: 15px !important; padding-right: 15px !important;">
                <input id="demo-hor-8" type='text' class="form-control required" name="end_at" placeholder="종료시간"
                value="<?php echo date('m/d/Y g:i A', strtotime($coupon->end_at)); ?>"/>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </div>
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-8">사용종료시간</label>
              <div class="col-sm-6 input-group date" id="datetimepicker3" style="padding-left: 15px !important; padding-right: 15px !important;">
                <input id="demo-hor-8" type='text' class="form-control required" name="use_at" placeholder="사용종료시간"
                value="<?php echo date('m/d/Y g:i A', strtotime($coupon->use_at)); ?>"/>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="panel-footer">
      <div class="row">
        <div class="col-md-11">
            <span class="btn btn-purple btn-labeled fa fa-refresh pro_list_btn pull-right"
                  onclick="ajax_set_full('edit','edit_coupon','정상적으로 리셋되었습니다!','coupon_edit','<?php echo $coupon->coupon_id; ?>') ">
              <?php echo ('리셋');?>
            </span>
        </div>
        <div class="col-md-1">
          <span class="btn btn-success btn-md btn-labeled fa fa-upload pull-right enterer"
                onclick="form_submit('coupon_edit','정상적으로 업로드되었습니다!');proceed('to_add');" >업로드</span>
        </div>
      </div>
    </div>
    </form>
  </div>
</div>

<!--<script src="--><?php //echo base_url(); ?><!--template/back/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>-->

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<input type="hidden" id="option_count" value="-1">
<script type="text/javascript">
  
  $(document).ready(function() {
    $('#datetimepicker1').datetimepicker();
    $('#datetimepicker2').datetimepicker();
    $('#datetimepicker3').datetimepicker();
    $("form").submit(function(e){
      return false;
    });
  });

  function set_coupon_desc() {
    let coupon_type = parseInt($('#user_type').find('option:selected').val());
    let target = $('#coupon_desc');
    if (coupon_type === <?= COUPON_USER_TYPE_REGISTER?>) {
      target.val('회원가입쿠폰(쿠폰수가 0인 경우 해당기간동안 회원가입한 모든 유저에게 지급, 0보다 큰 경우 해당 기간동안에 선착순 지급)')
    } else if (coupon_type === <?= COUPON_USER_TYPE_SHOP_PURCHASING ?>) {
      target.val('구매유도쿠폰(쿠폰수는 0만 세팅 가능, 구매페이지 접속 시 해당 쿠폰 지급)');
    } else if (coupon_type === <?= COUPON_USER_TYPE_CENTER?>) {
      target.val('센터회원쿠폰(쿠폰수는 0만 세팅 가능)');
    } else if (coupon_type === <?= COUPON_USER_TYPE_TEACHER?>) {
      target.val('강사회원쿠폰(쿠폰수는 0만 세팅 가능)');
    //} else if (coupon_type === <?//= COUPON_USER_TYPE_CENTER_TEACHER?>//) {
    //  target.val('센터/강사회원쿠폰(쿠폰수는 0만 세팅 가능, 신규 회원 승인 시 알림톡 전송, 기존 회원은 쿠폰박스에서 발급가능)');
    } else
      target.val('쿠폰설명');
  }
</script>

<style>
  .btm_border{
    border-bottom: 1px solid #ebebeb;
    padding-bottom: 15px;
  }
</style>

<!--Bootstrap Tags Input [ OPTIONAL ]-->

