<table class="table-list" style="display: table;">
  <colgroup>
    <col width="5%">
    <col width="16.5%">
    <col width="12.5%">
    <col width="12.5%">
    <col width="15.5%">
    <col width="5.5%">
    <col width="5.5%">
    <col width="5%">
    <col width="5.5%">
    <col width="16.5%">
  </colgroup>
  <tbody>
  <?php foreach ($members as $member) { ?>
    <tr>
      <td>
        <input type="checkbox" class="ticket_chk" data-id="<?php echo $member->member_id; ?>">
      </td>
      <td><?php echo $member->email; ?></td>
      <td><?php echo $member->phone; ?></td>
      <td><?php echo $member->username; ?></td>
      <td><?php echo date('Ymd', strtotime($member->enable_start_at)); ?>-<?php echo date('Ymd', strtotime($member->enable_end_at)); ?></td>
      <td><?php echo $member->stop; ?>일</td>
      <td><?php echo $member->renewal; ?>일</td>
      <td><?php echo ($member->refund ? 'O' : 'X'); ?></td>
      <td><?php echo $member->reserve.'/'.$member->reservable_count;?></td>
      <td>
        <button class="btn_valid view_info" onclick="get_history(<?= $member->member_id ?>, 1);">활동내역</button>
        <button class="btn_valid change_info"
                data-id="<?php echo $member->member_id; ?>"
                data-type="<?php echo $member->ticket_type; ?>"
                data-email="<?php echo $member->email; ?>"
                data-name="<?php echo $member->username; ?>"
                data-phone="<?php echo $member->phone; ?>"
                data-start="<?php echo substr($member->enable_start_at, 0, 10); ?>"
                data-end="<?php echo substr($member->enable_end_at, 0, 10); ?>"
                data-count="<?php echo $member->reservable_count; ?>"
        >회원정보</button>
      </td>
    </tr>
  <?php } ?>
  </tbody>
</table>
<div class="table_nav_btns">
  <div class="btns_prev">
    <?php if ($prev>= 2) { ?>
      <button class="prev_first" onclick="get_list(<?php echo $ticket->ticket_id; ?>,1,'<?php echo $filter; ?>')">
        <img src="<?php echo base_url().'template/back/center'; ?>/imgs/icon_dbPrev.png" height="12" width="auto">
      </button>
      <button class="prev_before" onclick="get_list(<?php echo $ticket->ticket_id; ?>,<?php echo $prev - 1; ?>,'<?php echo $filter; ?>')">
        <img src="<?php echo base_url().'template/back/center'; ?>/imgs/icon_prev.png" height="12" width="auto">
      </button>
    <?php }?>
  </div>
  <div class="btns_no">
    <?php if ($prev > 0) { ?>
      <button class="no-indicator" onclick="get_list(<?php echo $ticket->ticket_id; ?>,<?php echo $prev; ?>,'<?php echo $filter; ?>')"><?php echo $prev; ?></button>
    <?php }?>
    <button class="no-indicator btn_click" onclick="get_list(<?php echo $ticket->ticket_id; ?>,<?php echo $page; ?>,'<?php echo $filter; ?>')"><?php echo $page; ?></button>
    <?php if ($next > 0) { ?>
      <button class="no-indicator" onclick="get_list(<?php echo $ticket->ticket_id; ?>,<?php echo $next; ?>,'<?php echo $filter; ?>')"><?php echo $next; ?></button>
    <?php }?>
  </div>
  <div class="btns_next">
    <?php if ($total - $next > 2) { ?>
      <button class="next_after" onclick="get_list(<?php echo $ticket->ticket_id; ?>,<?php echo $next + 1; ?>,'<?php echo $filter; ?>')">
        <img src="<?php echo base_url().'template/back/center'; ?>/imgs/icon_next.png" height="12" width="auto">
      </button>
      <button class="next_last" onclick="get_list(<?php echo $ticket->ticket_id; ?>,<?php echo $total; ?>,'<?php echo $filter; ?>')">
        <img src="<?php echo base_url().'template/back/center'; ?>/imgs/icon_dbNext.png" height="12" width="auto">
      </button>
    <?php } ?>
  </div>
</div>
<script>
  $(function() {
    filter = '<?php echo $filter; ?>';
    page = <?php echo $page; ?>;
    ticket_id = <?php echo $ticket->ticket_id; ?>;
    ticket_member_total_cnt = <?php echo $total; ?>;
    ticket_type = <?php echo $ticket->ticket_type; ?>;
    reservable_count = <?php echo $ticket->reservable_count; ?>;
    reservable_duration = <?php echo $ticket->reservable_duration; ?>;
    $('#ticket_members').text(ticket_member_total_cnt);
    <?php if (isset($user)) { ?>
    user_id = <?php echo $user->user_id; ?>;
    user_name = '<?php echo $user->username; ?>';
    user_phone = '<?php echo $user->phone; ?>';
    user_email = '<?php echo $user->email; ?>';
    <?php } else { ?>
    user_id = 0;
    user_name = '';
    user_phone = '';
    user_email = '';
    <?php } ?>
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
      $('#enable_start_at').prop('disabled',true);
      $('#enable_end_at').val(end);
      $('#enable_end_at').prop('disabled',true);
      if (type === <?php echo CENTER_TICKET_TYPE_COUNT; ?>) {
        $('#reservable_count').val(count);
        $('#reservable_count').prop('disabled',true);
      } else {
        $('#reservable_count').val(0);
        $('#reservable_count').prop('disabled',true);
      }
      $('.popup-box').show();
      $('.popup__member .data-box').show();
      $('.popup__member').show();
      $('.popup__member .member--join').hide();
      $('.popup__member .member--data').show();
      $('.popup__member .member--data button.data-save').hide();
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
    });
    $('.view_info').click(function(){
      $('.popup-box').show();
      $('div[class$=history]').show().find('table').show();
    });
  });
</script>
