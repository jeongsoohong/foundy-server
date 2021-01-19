<?php
$now = date('Y-m-d H:i:s');
foreach ($coupons as $coupon) {
  $usable = true;
  if ($coupon->used == 1 || $coupon->use_at < $now) {
    $usable = false;
  }
  ?>
  <li>
    <table class="coupon-table">
      <tbody>
      <tr>
        <td class="coupon-title <?php if ($usable == false) echo 'unusable'; ?>" style="width: 100% !important;"><?php echo $coupon->coupon_title; ?></td>
      </tr>
      <tr>
<!--        <td class="coupon-desc --><?php //if ($usable == false) echo 'unusable'; ?><!--" style="width: 100% !important;">--><?php //echo $coupon->coupon_desc; ?><!--</td>-->
      </tr>
      <tr>
        <? if ($coupon->coupon_type == COUPON_TYPE_SHOP_FREE_SHIPPING) { ?>
          <td class="coupon-benefit">샵 구매시 무료배송</td>
        <? } else { ?>
          <td class="coupon-benefit">샵 구매시
            <?php echo $coupon->coupon_benefit; ?><?php echo ($coupon->coupon_type == COUPON_TYPE_SHOP_DISCOUNT_PERCENT ? '%' : '원'); ?> 할인</td>
        <? } ?>
      </tr>
      <tr>
        <?php if ($coupon->used == 0) { ?>
          <?php if ($coupon->use_at < $now) { ?>
            <td class="coupon-datetime <?php if ($usable == false) echo 'unusable'; ?>" style="width: 100% !important;">
              <?php echo ("{$coupon->use_at}"); ?> 까지 사용가능(기간만료)
            </td>
          <?php } else { ?>
            <td class="coupon-datetime <?php if ($usable == false) echo 'unusable'; ?>" style="width: 100% !important;">
              <?php echo ("{$coupon->use_at}"); ?> 까지 사용가능
            </td>
          <?php } ?>
        <?php } else { ?>
          <td class="coupon-datetime <?php if ($usable == false) echo 'unusable'; ?>" style="width: 100% !important;">
            <?php echo ("{$coupon->used_at}"); ?> 사용완료
          </td>
        <?php } ?>
      </tr>
      </tbody>
    </table>
  </li>
<?php } ?>
<style>
  td.unusable {
    color: grey;
  }
</style>
