<p class="add-tit">
  <span class="">쿠폰</span> 상세
</p>
<div class="add-box scroll-y" style="height: 464px;">
  <button class="frame_close" onclick="close_coupon_mod()">
    <img src="<?= base_url(); ?>template/back/center/imgs/icon_close_black.png" alt="" width="12" height="12" style="opacity: 0.5;">
  </button>
  <dl class="add-contents clearfix">
<!--    <dt class="contents__tit">아이디</dt>-->
<!--    <dd class="contents__data">-->
<!--      <input type="text" placeholder="아이디를 입력해주세요" class="data_form revise_id">-->
<!--    </dd>-->
    <dt class="contents__tit">쿠폰명</dt>
    <dd class="contents__data">
      <input type="text" id="coupon_title" placeholder="쿠폰명을 입력해주세요" class="data_form revise_cpName" value="<?php echo $coupon->coupon_title;?>">
    </dd>
    <dt class="contents__tit">혜택회원</dt>
    <dd class="contents__data">
      <div class="data_form">
        <select style="width: 100%;" id="user_type" onchange="set_coupon_desc()">
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
    </dd>
    <dt class="contents__tit">쿠폰수</dt>
    <dd class="contents__data">
      <input type="text" id="coupon_count" placeholder="쿠폰수 (0: 무제한)" class="data_form revise_cpCount" value="<?php echo $coupon->coupon_count; ?>">
    </dd>
    <dt class="contents__tit">쿠폰타입</dt>
    <dd class="contents__data">
      <div class="data_form">
        <select id="coupon_type" style="width: 100%;">
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
    </dd>
    <dt class="contents__tit">할인가격(율)</dt>
    <dd class="contents__data">
      <input type="text" id="coupon_benefit" value="<?php echo $coupon->coupon_benefit; ?>" placeholder="할인 가격(원) 또는 할일율(%) 또는 무료배송" class="data_form revise_cpDc">
    </dd>
    <dt class="contents__tit">쿠폰설명</dt>
    <dd class="contents__data">
      <input type="text" id="coupon_desc" value="<?php echo $coupon->coupon_desc; ?>" placeholder="쿠폰설명" class="data_form revise_cpGuide">
    </dd>
    <dt class="contents__tit">발급시작시간</dt>
    <dd class="contents__data">
      <div class="data_function">
        <div class="container">
          <div class="form-group">
            <div class="input-group date" id="datetimepicker1">
              <input type="text" id="start_at" class="form-control revise_issueStart" placeholder="발급시작시간"
                     value="<?php echo date('m/d/Y g:i A',strtotime($coupon->start_at)); ?>">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </div>
        </div>
      </div>
    </dd>
    <dt class="contents__tit">발급종료시간</dt>
    <dd class="contents__data">
      <div class="data_function">
        <div class="container">
          <div class="form-group">
            <div class="input-group date" id="datetimepicker2">
              <input type="text" id="end_at" class="form-control revise_issueEnd" placeholder="발급종료시간"
                     value="<?php echo date('m/d/Y g:i A', strtotime($coupon->end_at)); ?>">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </div>
        </div>
      </div>
    </dd>
    <dt class="contents__tit">사용종료시간</dt>
    <dd class="contents__data">
      <div class="data_function">
        <div class="container">
          <div class="form-group">
            <div class="input-group date" id="datetimepicker3">
              <input type="text" id="use_at" class="form-control revise_cpTerminate" placeholder="사용종료시간"
                     value="<?php echo date('m/d/Y g:i A', strtotime($coupon->use_at)); ?>"/>
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </div>
        </div>
      </div>
    </dd>
  </dl>
</div>
<div class="add-fn clearfix">
  <button class="fn__upload" onclick="do_mod('<?= $type; ?>');">
    <span class="upload--span"><img src="<?= base_url(); ?>template/back/master/icon/pop_ic_upload.png" height="16" width="auto"></span>
    업로드
  </button>
  <button class="fn__refresh" onclick="get_coupon_mod(<?= $coupon->coupon_id; ?>,'<?= $type; ?>')">
    <span class="refresh--span"><img src="<?= base_url(); ?>template/back/master/icon/pop_ic_refresh.png" height="16" width="auto"></span>
    리셋
  </button>
</div>
<script>
  $(document).ready(function() {
    $('#datetimepicker1').datetimepicker();
    $('#datetimepicker2').datetimepicker();
    $('#datetimepicker3').datetimepicker();
  });
  
  function set_coupon_desc() {
    let coupon_type = parseInt($('#user_type').find('option:selected').val());
    let target = $('#coupon_desc');
    
    console.log(coupon_type)
    console.log(target)
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
  
  function do_mod(type) {
    let url = "<?= base_url().'master/manage/coupon/do_'; ?>" + type;
    let data = [];
    
    data['id'] = <?= $coupon->coupon_id; ?>;
    data['coupon_title'] = $('#coupon_title').val();
    data['user_type'] = parseInt($('#user_type').find('option:selected').val());
    data['coupon_count'] = $('#coupon_count').val();
    data['coupon_type'] = parseInt($('#coupon_type').find('option:selected').val());
    data['coupon_benefit'] = $('#coupon_benefit').val();
    data['coupon_desc'] = $('#coupon_desc').val();
    data['start_at'] = $('#start_at').val();
    data['end_at'] = $('#end_at').val();
    data['use_at'] = $('#use_at').val();
    
    console.log(data);
    
    send_post_data(data, url, function() {
      let role = 'coupon';
      console.log(role);
      close_coupon_mod();
      setTimeout(function() {get_page2('manage_' + role, "<?= base_url().'master/manage/page?tab='; ?>" + role)}, 1000);
    }, true);
  }
</script>