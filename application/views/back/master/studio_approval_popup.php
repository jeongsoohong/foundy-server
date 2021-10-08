<button class="frame_close" onclick="close_approval_popup('popup')">
  <img src="<?= base_url(); ?>template/back/center/imgs/icon_close_black.png" alt="" width="12" height="12" style="opacity: 0.5;">
</button>
<div class="frame_cnt">
  <p class="cnt_tit">
    <!-- inactivate 상태로 변경하시겠습니까? / 정말 삭제하시겠습니까? -->
    <? if ($studio->activate == APPROVAL_DATA_ACTIVATE) { ?>
      <strong>반려</strong>
    <? } else { ?>
      <strong>승인</strong>
    <? } ?>
    상태로 변경하시겠습니까?
  </p>
  <div class="cnt_btns confirm_btn">
    <button class="btn_cancel font-futura" onclick="close_approval_popup('popup')">CANCEL</button>
    <button class="btn_ok remove_absolute font-futura" onclick="req_approval(<?= $studio->studio_id; ?>)">OK</button>
  </div>
  <script>
    $(document).ready(function(){
      // alert("ok");
      $('.remove_absolute').click(function(){
        // chkPiece가 1개 이상 선택됐을 때, 조건문 removeBtn 클릭 이벤트 참고
        $('input[name="chkPiece"]:checked').closest('tr').remove();
      })
    })
  </script>
</div>
