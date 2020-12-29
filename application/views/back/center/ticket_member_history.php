<div class="table_body">
  <table class="table-list" style="display: table;">
    <colgroup>
      <col width="18%">
      <col width="22%">
      <col width="60%">
    </colgroup>
    <tbody>
    <? foreach ($histories as $history) {
      $history_at = strtotime($history->history_at);
      $date = date('Y.m.d', $history_at);
      $time = date('H:i', $history_at);
      ?>
      <tr>
        <td><?= $date; ?><br>"<?= $time; ?>"</td>
        <td><?= $history->action_str; ?></td>
        <td><?= $history->action_data; ?></td>
      </tr>
    <? } ?>
    </tbody>
  </table>
</div>
<div class="table_nav_btns">
  <div class="btns_prev">
    <?php if ($prev>= 2) { ?>
      <button class="prev_first" onclick="get_history(<?= $member_id; ?>,1)">
        <img src="<?= base_url().'template/back/center'; ?>/imgs/icon_dbPrev.png" height="12" width="auto">
      </button>
      <button class="prev_before" onclick="get_history(<?= $member_id; ?>,<?= $prev - 1; ?>)">
        <img src="<?= base_url().'template/back/center'; ?>/imgs/icon_prev.png" height="12" width="auto">
      </button>
    <?php }?>
  </div>
  <div class="btns_no">
    <?php if ($prev > 0) { ?>
      <button class="no-indicator" onclick="get_history(<?= $member_id; ?>,<?= $prev; ?>)"><?= $prev; ?></button>
    <?php }?>
    <button class="no-indicator btn_click" onclick="get_history(<?= $member_id; ?>,<?= $page; ?>)"><?= $page; ?></button>
    <?php if ($next > 0) { ?>
      <button class="no-indicator" onclick="get_history(<?= $member_id; ?>,<?= $next; ?>)"><?= $next; ?></button>
    <?php }?>
  </div>
  <div class="btns_next">
    <?php if ($total - $next > 2) { ?>
      <button class="next_after" onclick="get_history(<?= $member_id; ?>,<?= $next + 1; ?>)">
        <img src="<?= base_url().'template/back/center'; ?>/imgs/icon_next.png" height="12" width="auto">
      </button>
      <button class="next_last" onclick="get_history(<?= $member_id; ?>,<?= $total; ?>)">
        <img src="<?= base_url().'template/back/center'; ?>/imgs/icon_dbNext.png" height="12" width="auto">
      </button>
    <?php } ?>
  </div>
</div>