<div class="row">
  <div class="col-md-12">
    <?php
    echo form_open(base_url() . 'admin/coupon/do_add/'.$coupon_id, array(
      'class' => 'form-horizontal',
      'method' => 'post',
      'id' => 'coupon_add',
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
                       class="form-control required">
              </div>
            </div>
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-3">혜택회원</label>
              <div class="col-sm-6">
                <select class="form-control required" name="user_type">
                  <option value="<?php echo COUPON_USER_TYPE_DEFAULT; ?>"><?php echo $this->crud_model->get_coupon_user_type_str(COUPON_USER_TYPE_DEFAULT); ?></option>
                  <option value="<?php echo COUPON_USER_TYPE_REGISTER; ?>"><?php echo $this->crud_model->get_coupon_user_type_str(COUPON_USER_TYPE_REGISTER); ?></option>
                </select>
              </div>
            </div>
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-5">쿠폰수</label>
              <div class="col-sm-6">
                <input type="text" name="coupon_count" id="demo-hor-5" placeholder="쿠폰수 (0: 무제한)"
                       class="form-control required" value="">
              </div>
            </div>
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-2">쿠폰타입</label>
              <div class="col-sm-6">
                <select class="form-control required" name="coupon_type">
                  <option value="<?php echo COUPON_TYPE_DEFAULT; ?>"><?php echo $this->crud_model->get_coupon_user_type_str(COUPON_TYPE_DEFAULT); ?></option>
                  <option value="<?php echo COUPON_TYPE_SHOP_DISCOUNT_PRICE; ?>"><?php echo $this->crud_model->get_coupon_type_str(COUPON_TYPE_SHOP_DISCOUNT_PRICE); ?></option>
                  <option value="<?php echo COUPON_TYPE_SHOP_DISCOUNT_PERCENT; ?>"><?php echo $this->crud_model->get_coupon_type_str(COUPON_TYPE_SHOP_DISCOUNT_PERCENT); ?></option>
                </select>
              </div>
            </div>
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-4">할인가격(율)</label>
              <div class="col-sm-6">
                <input type="text" name="coupon_benefit" id="demo-hor-4" placeholder="할인 가격(원) 또는 할일율(%)"
                       class="form-control required">
              </div>
            </div>
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-5">쿠폰설명</label>
              <div class="col-sm-6">
                <input type="text" name="coupon_desc" id="demo-hor-5" placeholder="쿠폰설명"
                       class="form-control required" value="">
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
                <input value="" id="demo-hor-7" type='text' class="form-control required" name="start_at" placeholder="발급시작시간"/>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </div>
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-8">발급종료시간</label>
              <div class="col-sm-6 input-group date" id="datetimepicker2" style="padding-left: 15px !important; padding-right: 15px !important;">
                <input value="" id="demo-hor-8" type='text' class="form-control required" name="end_at" placeholder="발급종료시간"/>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </div>
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-8">사용종료시간</label>
              <div class="col-sm-6 input-group date" id="datetimepicker3" style="padding-left: 15px !important; padding-right: 15px !important;">
                <input value="" id="demo-hor-8" type='text' class="form-control required" name="use_at" placeholder="사용종료시간"/>
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
        </div>
        <div class="col-md-1">
          <span class="btn btn-success btn-md btn-labeled fa fa-upload pull-right enterer"
                onclick="form_submit('coupon_add','정상적으로 업로드되었습니다!');proceed('to_add');" >업로드</span>
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

</script>

<style>
  .btm_border{
    border-bottom: 1px solid #ebebeb;
    padding-bottom: 15px;
  }
</style>

<!--Bootstrap Tags Input [ OPTIONAL ]-->

