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
        <?php if ($coupon->used == 0) { ?>
          <td class="coupon-datetime" style="width: 100% !important;">사용가능날짜 : <?php echo ("~ {$coupon->use_at}"); ?></td>
        <?php } else { ?>
          <td class="coupon-datetime" style="width: 100% !important;">사용함 : <?php echo ("{$coupon->used_at}"); ?></td>
        <?php } ?>
      </tr>
      </tbody>
    </table>
  </li>
<?php } ?>
