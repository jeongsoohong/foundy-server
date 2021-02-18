<div class="popup zoom:alt_cancel zoom:wrap zoom:wait" style="height: 544px; margin-top: -272px;">
  <div class="zoom_box popup_tit" style="width: 228px;">
    <div class="popup_topic" style="text-align: center;">
      <div class="topic_icon" style="background-color: transparent; display: inline-block; margin-right: 16px;">
        <img src="<?= base_url(); ?>template/icon/pop_wait-money.png" alt="" width="44" height="38">
      </div>
      <p class="topic_message font-futura" style="color: #f9a825;">
        Ooops!
      </p>
    </div>
    <div class="popup_guidebox">
      <p class="popup_guide" style="letter-spacing: -0.03em; word-break: keep-all; color: #f9a825;">
        입금 대기 상태입니다.
        <br>입금을 하셨다면 잠시만 기다려주세요!
        <br>곧 확인해 드릴게요.
      </p>
      <p class="popup_detail">
        *티켓팅 확정 후 예약 취소는 불가합니다.
      </p>
      <!-- 결제 방식에 따라 아래 online_box, online_data 둘 중 하나만 보여주세요 -->
      <? if ($class->use_bank) { ?>
      <!-- 무통장 입금일 경우 online_box 를 보여주세요 -->
      <div class="online_box" style="height: 112px;">
        <p class="online_price">
          1 class
          <span id="price" class="font-futura">
            <?= $this->crud_model->get_price_str($class->class_price); ?>원
          </span>
        </p>
        <p class="online_talk">
          <span id="bank">
            <?= $class->bank_name; ?>
          </span>
          은행
          <span id="account_no">
            <?= $class->bank_account_number; ?>
          </span>
          <span id="account_holder">
            <?= $class->bank_depositor; ?>
          </span>
          <!-- 입금계좌는 카카오 알림톡으로 발송됩니다. -->
        </p>
      </div>
      <? } else { ?>
      <!-- 결제 URL 일 경우 online_data를 보여주세요 -->
      <dl class="online_data url_data clearfix" style="margin: 20px auto 0;">
        <dt class="data_name url_name">결제페이지</dt>
        <dd class="user_info url_info">
          <input class="info_box url_box" value="<?= $class->payment_page; ?>">
        </dd>
        <dt class="data_name" style="display: none;"></dt>
        <dd class="user_info pay_info">
          <a href="<?= $class->payment_page; ?>" class="pay_page" target="_blank">결제 바로가기</a>
        </dd>
      </dl>
      <? } ?>
      <dl class="online_data clearfix">
        <dt class="online_payAlert">신청자의 결제 및 입금 확인을 위하여,<br>결제 시 입력하신 결제자 정보 혹은 입금자명을<br>재확인 부탁 드립니다.</dt>
        <dd style="display: none;"></dd>
      </dl>
      <dl class="online_data clearfix">
        <dt class="data_name">
          <!-- 결제URL 받을시 '결제자 정보' 로 문구변경 부탁드립니다 -->
          <? if ($class->use_bank == 1) { ?>
            입금자명
          <? } else { ?>
            결제자정보
          <? } ?>
        </dt>
        <dd class="user_info">
          <input class="info_box" value="<?= $reserve->payer_info; ?>" disabled>
        </dd>
      </dl>
    </div>
  </div>
  <div class="confirm_btn" style="border-top: 1px solid #eee !important; box-sizing: content-box;">
<!--    <button class="btn_cancel" style="border: 0 !important; font-size: 14px;" onclick="close_wait_popup()">예약취소</button>-->
    <button class="btn_yes" onclick="close_wait_popup()">OK</button>
  </div>
</div>
