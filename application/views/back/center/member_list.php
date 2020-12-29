<table class="table-list" style="display: table;">
  <colgroup>
    <col width="11%">
    <col width="11%">
    <col width="11%">
    <col width="10%">
    <col width="12%">
    <col width="15.5%">
    <col width="8%">
    <col width="8%">
    <col width="11%">
  </colgroup>
  <tbody>
  <? foreach ($members as $member) { ?>
    <tr>
      <td>
        <input type="checkbox" class="ticket_chk" data-id="<? echo $member->member_id; ?>">
      </td>
      <td><? echo $member->email; ?></td>
      <td><? echo $member->phone; ?></td>
      <td><? echo $member->username; ?></td>
      <td><? echo $member->ticket_title; ?></td>
      <td><?php echo date('Ymd', strtotime($member->enable_start_at)); ?>-<?php echo date('Ymd', strtotime($member->enable_end_at)); ?></td>
      <td><?php echo $member->stop; ?>일</td>
      <td><?php echo $member->renewal; ?>일</td>
      <td><?php echo ($member->refund ? 'O' : 'X'); ?></td>
    </tr>
  <? } ?>
  </tbody>
</table>
<div class="table_nav_btns">
  <div class="btns_prev">
    <?php if ($prev>= 2) { ?>
      <button class="prev_first" onclick="get_list(<?php echo $ticket_id; ?>,1,'<?php echo $filter; ?>')">
        <img src="<?php echo base_url().'template/back/center'; ?>/imgs/icon_dbPrev.png" height="12" width="auto">
      </button>
      <button class="prev_before" onclick="get_list(<?php echo $ticket_id; ?>,<?php echo $prev - 1; ?>,'<?php echo $filter; ?>')">
        <img src="<?php echo base_url().'template/back/center'; ?>/imgs/icon_prev.png" height="12" width="auto">
      </button>
    <?php }?>
  </div>
  <div class="btns_no">
    <?php if ($prev > 0) { ?>
      <button class="no-indicator" onclick="get_list(<?php echo $ticket_id; ?>,<?php echo $prev; ?>,'<?php echo $filter; ?>')"><?php echo $prev; ?></button>
    <?php }?>
    <button class="no-indicator btn_click" onclick="get_list(<?php echo $ticket_id; ?>,<?php echo $page; ?>,'<?php echo $filter; ?>')"><?php echo $page; ?></button>
    <?php if ($next > 0) { ?>
      <button class="no-indicator" onclick="get_list(<?php echo $ticket_id; ?>,<?php echo $next; ?>,'<?php echo $filter; ?>')"><?php echo $next; ?></button>
    <?php }?>
  </div>
  <div class="btns_next">
    <?php if ($total - $next > 2) { ?>
      <button class="next_after" onclick="get_list(<?php echo $ticket_id; ?>,<?php echo $next + 1; ?>,'<?php echo $filter; ?>')">
        <img src="<?php echo base_url().'template/back/center'; ?>/imgs/icon_next.png" height="12" width="auto">
      </button>
      <button class="next_last" onclick="get_list(<?php echo $ticket_id; ?>,<?php echo $total; ?>,'<?php echo $filter; ?>')">
        <img src="<?php echo base_url().'template/back/center'; ?>/imgs/icon_dbNext.png" height="12" width="auto">
      </button>
    <?php } ?>
  </div>
</div>
<script>
  $(function() {
    filter = '<?php echo $filter; ?>';
    page = <?php echo $page; ?>;
    ticket_id = <?php echo $ticket_id; ?>;
    $('#ticket_members').text(<? echo $total; ?>);
    $('.change_info').click(function(){
      member_id = $(this).data('id');
      let type = $(this).data('type');
      let email = $(this).data('email');
      let name = $(this).data('name');
      let phone = $(this).data('phone');
      let start = $(this).data('start');
      let end = $(this).data('end');
      let count = $(this).data('count');
      // console.log(member_id);
      // console.log(type);
      // console.log(email);
      // console.log(name);
      // console.log(phone);
      // console.log(start);
      // console.log(end);
      // console.log(count);
      $('#member_id').text(email);
      $('#member_email').val(email);
      $('#member_email').prop('disabled',true);
      $('#member_name').val(name);
      $('#member_name').prop('disabled',true);
      $('#member_phone').val(phone);
      $('#member_phone').prop('disabled',true);
      $('#enable_start_at').val(start);
      $('#enable_start_at').prop('disabled',false);
      $('#enable_end_at').val(end);
      $('#enable_end_at').prop('disabled',false);
      if (type === <?php echo CENTER_TICKET_TYPE_COUNT; ?>) {
        $('#reservable_count').val(count);
        $('#reservable_count').prop('disabled',false);
      } else {
        $('#reservable_count').val(0);
        $('#reservable_count').prop('disabled',true);
      }
      $('.popup-box').show();
      $('.popup__member .data-box').show();
      $('.popup__member').show();
      $('.popup__member .member--join').hide();
      $('.popup__member .member--data').show();
      $('.popup__member .member-party').css('margin-bottom', '10px');
    })
    $('.ticket_chk').click(function(){
      let chk = $(this).prop('checked');
      let all = true;
      // console.log(chk);
      $.each($('.ticket_chk'), function(i,v) {
        // console.log($(v).prop('checked'));
        if ($(v).prop('checked') !== chk) {
          all = false;
          return false;
        }
      });
      // console.log(all);
      if (all === true) {
        $('.main_chk').prop('checked',chk);
      } else {
        $('.main_chk').prop('checked',false);
      }
    })
  })
</script>
