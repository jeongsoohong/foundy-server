<?
$now = time();
?>
<button class="frame_close" onclick="close_coupon_view();">
  <img src="<?= base_url(); ?>template/back/center/imgs/icon_close_black.png" alt="" width="12" height="12" style="opacity: 0.5;">
</button>
<div class="cnt_btns confirm_btn" onclick="close_coupon_view();" style="background-color: #fff;">
  <button class="btn_cancel font-futura">CANCEL</button>
</div>
<div class="frame_wrap">
  <div class="frame_tit">
    <p class="tit_name font-futura">view_profile</p>
    <div class="tit_display">
      <p class="display-type">
        <span class="typeC-Tit"><?= $coupon->coupon_title; ?></span>
        <br><span class="type-name">coupon</span>
      </p>
      <div class="display-now <?= $coupon->activate == 1 ? (strtotime($coupon->end_at) < $now ? 'display-cpnCompleted' : 'display-cpnIng') : 'display-cpnStopped'; ?>">
        <?= $coupon->activate == 1 ? (strtotime($coupon->end_at) < $now ? '발급완료' : '발급중') : '발급중지'; ?>
      </div>
    </div>
    <div class="tit_table table_form:coupon">
      <div class="table_scroll scroll-y" style="height: 243px;">
        <table class="mail_table">
          <colgroup>
            <col width="16%">
            <col width="84%">
          </colgroup>
          <tbody>
          <tr>
            <th>아이디</th>
            <td class="see__id">
              <?= $coupon->coupon_id; ?>
            </td>
          </tr>
          <tr>
            <th>쿠폰명</th>
            <td class="see__name">
              <?= $coupon->coupon_title; ?>
            </td>
          </tr>
          <tr>
            <!-- 내용 = 쿠폰설명  -->
            <th>내용</th>
            <td class="see__guide">
              <?= $coupon->coupon_desc; ?>
            </td>
          </tr>
          <tr>
            <!-- 적용 회원 = 혜택 회원 -->
            <th>적용 회원</th>
            <td class="see__benefit">
              <?php echo $this->coupon_model->get_coupon_user_type_str($coupon->user_type); ?>
            </td>
          </tr>
          <tr>
            <th>쿠폰수</th>
            <td class="see__count">
              <?php echo $coupon->coupon_count == 0 ? '무제한' : $coupon->coupon_count; ?>
            </td>
          </tr>
          <tr>
            <th>쿠폰타입</th>
            <td class="see__type">
              <?= $this->coupon_model->get_coupon_type_str($coupon->coupon_type); ?>
            </td>
          </tr>
          <tr>
            <!-- 할인 = 할인가격(율) -->
            <th>할인</th>
            <td class="see__dc">
              <? if ($coupon->coupon_type == COUPON_TYPE_SHOP_FREE_SHIPPING) {
                echo '무료배송';
              } else {
                echo $coupon->coupon_benefit;
                echo ($coupon->coupon_type == COUPON_TYPE_SHOP_DISCOUNT_PERCENT ? '%' : '원');
              } ?>
            </td>
          </tr>
          <tr>
            <!-- 발급 [ 시작 ~ 종료 ] 시간 -->
            <th>발급시간</th>
            <td>
              <div class="space:layer">
                <div class="layer--position scroll-x">
                  <span class="see__start">
                    <?= $coupon->start_at; ?>
                  </span>
                  ~
                  <span class="see__end">
                    <?= $coupon->end_at; ?>
                  </span>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <th>사용종료시간</th>
            <td class="see__terminate">
              <?= $coupon->use_at; ?>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
