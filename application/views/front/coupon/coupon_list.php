<?php foreach ($coupons as $coupon) { ?>
  <li>
    <table class="coupon-table">
      <tbody>
      <tr>
        <td class="coupon-title"><?php echo $coupon->coupon_title; ?></td>
        <td class="coupon-btn" rowspan="3">
          <?php $received = $this->db->get_where('user_coupon', array('user_id' => $user_id, 'coupon_id' => $coupon->coupon_id))->row();
          if (isset($received) == true && empty($received) == false) { ?>
            <button class="btn btn-received">발급완료</button>
          <?php } else { ?>
            <button class="btn btn-receive" onclick="get_coupon(<?php echo $coupon->coupon_id; ?>)">쿠폰받기</button>
          <?php } ?>
        </td>
      </tr>
      <tr>
        <td class="coupon-desc"><?php echo $coupon->coupon_desc; ?></td>
      </tr>
      <tr>
        <td class="coupon-datetime">발급기간 : <?php echo ("{$coupon->start_at} ~ {$coupon->end_at}"); ?></td>
      </tr>
      </tbody>
    </table>
  </li>
<?php } ?>
