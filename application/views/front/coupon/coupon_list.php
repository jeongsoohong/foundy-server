<?php
$user_data = json_decode($this->session->userdata('user_data'));
foreach ($coupons as $coupon) {
  $received = $this->coupon_model->check_received($user_data, $coupon);
//  log_message('debug', '[coupon] coupon['.json_encode($coupon).'] received['.$received.']');
  if ($received == COUPON_UNRECEIVABLE) {
    continue;
  }
  ?>
  <li>
    <table class="coupon-table">
      <tbody>
      <tr>
        <td class="coupon-title"><?php echo $coupon->coupon_title; ?></td>
        <td class="coupon-btn" rowspan="4">
          <? if ($received == COUPON_RECEIVED) { ?>
            <button class="btn btn-received">발급완료</button>
          <?php } else { ?>
            <button class="btn btn-receive" onclick="get_coupon(<?php echo $coupon->coupon_id; ?>)">쿠폰받기</button>
          <?php } ?>
        </td>
      </tr>
      <tr>
<!--        <td class="coupon-desc">--><?php //echo $coupon->coupon_desc; ?><!--</td>-->
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
        <td class="coupon-datetime"><?php echo ("{$coupon->start_at} ~ {$coupon->end_at}"); ?></td>
      </tr>
      </tbody>
    </table>
  </li>
<?php } ?>
