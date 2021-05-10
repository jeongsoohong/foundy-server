<? foreach ($reserve_list as $reserve) { ?>
  <tr>
    <td><?= date('Y.m.d H:i:s', strtotime($reserve->register_at)); ?></td>
    <td><?= date('Y.m.d H:i:s', strtotime($reserve->schedule_at)); ?></td>
    <td><?= $reserve->schedule_info->schedule_title; ?></td>
    <td><?= $reserve->user->username; ?></td>
    <td><?= $reserve->user->email; ?></td>
    <td><?= $reserve->user->phone; ?></td>
    <td><?= $reserve->payer_info; ?></td>
    <td class="data_txt">
      <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
      <!-- 상태 -->
      <? if ($reserve->reserve) { ?>
        <span class="receive reserve"><?= $this->studio_model->get_reserve_str(); ?></span>
      <? } else if ($reserve->wait) { ?>
        <span class="receive wait"><?= $this->studio_model->get_wait_str(); ?></span>
      <? } else if ($reserve->cancel) { ?>
        <span class="receive cancel"><?= $this->studio_model->get_cancel_str(); ?></span>
      <? } ?>
    </td>
    <td class="data_form">
      <? if ($reserve->reserve) { ?>
        <button class="td_send ok_sign" data-id="<?= $reserve->reserve_id; ?>" onclick="schedule_reserve_active($(this))">
          <span class="send shadow active"></span>
        </button>
      <? } else if ($reserve->wait) { ?>
        <button class="td_send" data-id="<?= $reserve->reserve_id; ?>" onclick="schedule_reserve_active($(this))">
          <span class="send shadow"></span>
        </button>
      <? } else if ($reserve->cancel) { ?>
        <button class="td_send" data-id="<?= $reserve->reserve_id; ?>" onclick="schedule_reserve_active($(this))">
          <span class="send shadow"></span>
        </button>
      <? } ?>
    </td>
    <td>
      <? if ($reserve->reserve) { ?>
        <button class="td_perforce" data-id="<?= $reserve->reserve_id; ?>" onclick="schedule_cancel_active($(this))">
          <span class="perforce shadow"></span>
        </button>
      <? } else if ($reserve->wait) { ?>
        <button class="td_perforce" data-id="<?= $reserve->reserve_id; ?>" onclick="schedule_cancel_active($(this))">
          <span class="perforce shadow"></span>
        </button>
      <? } else if ($reserve->cancel) { ?>
        <button class="td_perforce red_sign" data-id="<?= $reserve->reserve_id; ?>" onclick="schedule_cancel_active($(this))">
          <span class="perforce shadow active"></span>
        </button>
      <? } ?>
    </td>
    <td>
      <button class="send_link" onclick="fn_open_zoom2(<?= $reserve->schedule_info_id; ?>)">발송</button>
    </td>
  </tr>
  
<? } ?>
<script>
  reserve_list2_date = '<?= $reserve_list_date; ?>';
</script>
