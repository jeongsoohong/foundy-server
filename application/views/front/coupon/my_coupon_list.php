<?php foreach ($coupons as $coupon) { ?>
  <li>
    <table class="coupon-table">
      <tbody>
      <tr>
        <td class="coupon-title" style="width: 100% !important;"><?php echo $coupon->coupon_title; ?></td>
      </tr>
      <tr>
        <td class="coupon-desc" style="width: 100% !important;"><?php echo $coupon->coupon_desc; ?></td>
      </tr>
      <tr>
        <td class="coupon-benefit" style="width: 100% !important;">샵 구매시
        <?php echo $coupon->coupon_benefit; ?><?php echo ($coupon->coupon_type == COUPON_TYPE_SHOP_DISCOUNT_PERCENT ? '%' : '원'); ?> 할인</td>
      </tr>
      <tr>
        <?php if ($coupon->used == 0) { ?>
          <td class="coupon-datetime" style="width: 100% !important;"><?php echo ("{$coupon->use_at}"); ?> 까지 사용가능</td>
        <?php } else { ?>
          <td class="coupon-datetime" style="width: 100% !important;"><?php echo ("{$coupon->used_at}"); ?> 사용완료</td>
        <?php } ?>
      </tr>
      </tbody>
    </table>
  </li>
<?php } ?>
