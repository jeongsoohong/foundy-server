<div id="content-container" style="padding-top:0px !important;">
  <div class="text-center pad-all">
    <div class="pad-ver">
      <!--      <img class="img-sm img-border" src="--><?php //echo base_url(); ?><!--uploads/vendor_logo_image/default.jpg" alt="">-->
    </div>
    <h4 class="text-lg text-overflow mar-no"><?php echo $coupon->coupon_title; ?></h4>
    <p class="text-sm">coupon</p>
    <div class="pad-ver btn-group">
      <button class="btn <?php echo ($coupon->activate ? 'btn-success' : 'btn-danger'); ?>"><?php echo ($coupon->activate ? '발급중' : '발급중지'); ?></button>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-sm-12">
      <div class="panel-body">
        <table class="table table-striped" style="border-radius:3px;">
          <tbody>
          <tr>
            <th class="custom_td">아이디</th>
            <td class="custom_td"><?php echo $coupon->coupon_id; ?></td>
          </tr>
          <tr>
            <th class="custom_td">내용</th>
            <td class="custom_td"><?php echo $coupon->coupon_desc; ?></td>
          </tr>
          <tr>
            <th class="custom_td">적용회원</th>
            <td class="custom_td"><?php echo $this->coupon_model->get_coupon_user_type_str($coupon->user_type); ?></td>
          </tr>
          <tr>
            <th class="custom_td">쿠폰수</th>
            <td class="custom_td"><?php echo $coupon->coupon_count == 0 ? '무제한' : $coupon->coupon_count; ?></td>
          </tr>
          <tr>
            <th class="custom_td">할인</th>
            <? if ($coupon->coupon_type == COUPON_TYPE_SHOP_FREE_SHIPPING) { ?>
              <td>무료배송</td>
            <? } else { ?>
              <td><?php echo $coupon->coupon_benefit; ?><?php echo ($coupon->coupon_type == COUPON_TYPE_SHOP_DISCOUNT_PERCENT ? '%' : '원'); ?></td>
            <? } ?>
          </tr>
          <tr>
            <th class="custom_td">발급시간</th>
            <td><?php echo $coupon->start_at; ?> ~ <?php echo $coupon->end_at; ?></td>
          </tr>
          <tr>
            <th class="custom_td">사용종료시간</th>
            <td><?php echo $coupon->use_at; ?></td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<style>
  .custom_td{
    border-left: 1px solid #ddd;
    border-right: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
  }
  .custom_td img {
    width: 100% !important;
    height: auto !important;
  }
</style>
<script type="text/javascript">
  $(document).ready(function(){
    $('.enterer').hide();
  });
</script>
