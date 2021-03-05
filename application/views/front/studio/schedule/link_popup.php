<?php if (isset($class->class_link) == true && empty($class->class_link) == false) { ?>
  <div class="popup zoom:alt_cancel zoom:wrap after_style" style="height: 458px; margin-top: -229px;">
    <div class="zoom_box popup_tit">
      <div class="popup_topic" style="text-align: center;">
        <div class="topic_icon" style="background-color: transparent;">
          <img src="<?= base_url(); ?>template/icon/pop_confirmed.png" alt="" width="44" height="44">
        </div>
        <p class="topic_message font-futura">
          ZOOM class OPEN!
        </p>
      </div>
      <div class="popup_guidebox">
        <a href="<?= $class->class_link; ?>" class="guidelink zoom_link" target="_blank">수업 참가 하기</a>
        <p class="popup_detail">
          *티켓팅 확정 후 예약 취소는 불가합니다. 온라인 클래스 취소에 대한 자세한 문의는 해당 온라인 스튜디오로 연락 부탁드립니다.
        </p>
<!--        <button class="query_studio copy-linkBtn" onclick="copy_to_clipboard('copy-linkBtn')">-->
        <button class="query_studio copy-linkBtn" id="copy-link-<?= $class->schedule_info_id; ?>" data-clipboard-text="<?= $class->class_link; ?>">
          <div class="copy-txt">
            수업 참가 링크 복사하기
            <span class="linkIcon">
              <img src="<?= base_url(); ?>template/icon/ic_zoomLink.png" width="12" height="11.5">
            </span>
          </div>
        </button>
        <span class="stripe"></span>
      </div>
      <a href="mailto:<?= $studio_data->email; ?>">
        <button class="query_studio">온라인 스튜디오로 문의하기</button>
      </a>
    </div>
    <div class="confirm_btn" style="border-top: 1px solid #eee !important;">
      <button class="btn_yes" style="border:none !important;" onclick="close_link_popup()">OK</button>
    </div>
  </div>
  <script>
    $(function() {
      init_clipboard('copy-link-<?= $class->schedule_info_id; ?>', function(e) {
        // console.log(e);
        close_link_popup();
        if (e.text === '<?= $class->class_link; ?>') {
          alert("복사되었습니다!");
        } else {
          alert("실패하였습니다!");
        }
      });
    });
  </script>
<?php } else { ?>
  <div class="popup zoom:alt_cancel zoom:wrap before_height" style="height: 336px; margin-top: -168px;">
    <div class="zoom_box popup_tit">
      <div class="popup_topic" style="text-align: center;">
        <div class="topic_icon" style="background-color: #1ba9e4; display: inline-block; margin-right: 16px;">
          <img src="<?= base_url(); ?>template/icon/ic_exclamation.png" alt="" width="16" height="16">
        </div>
        <p class="topic_message font-futura">
          Ooops!
        </p>
      </div>
      <div class="popup_guidebox">
        <p class="popup_guide" style="letter-spacing: -0.03em; word-break: keep-all;">
          아직 수업 준비중입니다.
          <br>수업 링크가 생성되면 카카오 알림톡이
          <br>발송됩니다.
        </p>
        <p class="popup_detail">
          *티켓팅 확정 후 예약 취소는 불가합니다. 온라인 클래스 취소에 대한 자세한 문의는 해당 온라인 스튜디오로 연락 부탁드립니다.
        </p>
      </div>
      <a href="mailto:<?= $studio_data->email; ?>">
        <button class="query_studio">온라인 스튜디오로 문의하기</button>
      </a>
    </div>
    <div class="confirm_btn" style="border-top: 1px solid #eee !important;">
      <button class="btn_yes" style="border:none !important;" onclick="close_link_popup()">OK</button>
    </div>
  </div>
<?php } ?>
