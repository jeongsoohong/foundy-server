<p class="tr-data">강사목록 총 <span clas="tr-count"><?php echo $total_cnt; ?></span>개</p>
<div class="table_main">
  <table class="table_head">
    <colgroup>
      <col width="12%">
      <col width="12%">
      <col width="12%">
      <col width="36%">
      <col width="16%">
      <col width="12%">
    </colgroup>
    <thead>
    <tr>
      <th>
        <input type="checkbox" class="main_chk">
      </th>
      <th>센터강사</th>
      <th>이름</th>
      <th>id</th>
      <th>활동중</th>
      <th>기타</th>
      <!--                    <th>-->
      <!--                      <button class="id_remove">삭제</button>-->
      <!--                    </th>-->
    </tr>
    </thead>
  </table>
  <div class="table_body_wrap">
    <div class="table_body">
      <table class="table-list">
        <colgroup>
          <col width="12%">
          <col width="12%">
          <col width="12%">
          <col width="36%">
          <col width="16%">
          <col width="12%">
        </colgroup>
        <tbody>
        <?php
        $idx = $total_cnt - CENTER_ADMIN_ITEM_LIST_PAGE_SIZE * ($page - 1);
        foreach ($teachers as $teacher) {
          ?>
          <tr>
            <td>
              <input type="checkbox" class="ticket_chk" data-id="<?php echo $teacher->teacher_id; ?>">
            </td>
            <td><?php echo $idx; ?></td>
            <td><?php echo $teacher->data->name; ?></td>
            <td><?php echo $teacher->user->email; ?></td>
            <td class="onoff-btn" id="onoff-btn-<?php echo $teacher->teacher_id; ?>">
              <?php if ($teacher->activate == APPROVAL_DATA_ACTIVATE) { ?>
                <button class="onoff onoff_on" data-id="<?php echo $teacher->teacher_id; ?>">
                  <span class="onoff_point onoff_point_on"></span>
                </button>
              <?php } else { ?>
                <button class="onoff" data-id="<?php echo $teacher->teacher_id; ?>">
                  <span class="onoff_point"></span>
                </button>
              <?php } ?>
            </td>
            <td>
              <?php if ($teacher->data->activate == APPROVAL_DATA_INACTIVATE) echo '승인대기강사'; ?>
              <?php if ($teacher->data->activate == APPROVAL_DATA_REJECT) echo '반려된강사'; ?>
            </td>
          </tr>
        <?php
          $idx--;
        } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="table_nav_btns">
  <!-- 페이지 버튼 처음/마지막 페이지 안넘어가게-->
  <div class="btns_prev">
    <?php if ($prev>= 2) { ?>
      <button class="prev_first" onclick="get_list(1)">
        <img src="<?php echo base_url().'template/back/center'; ?>/imgs/icon_dbPrev.png" height="12" width="auto">
      </button>
      <button class="prev_before" onclick="get_list(<?php echo $prev - 1; ?>)">
        <img src="<?php echo base_url().'template/back/center'; ?>/imgs/icon_prev.png" height="12" width="auto">
      </button>
    <?php }?>
  </div>
  <div class="btns_no">
    <?php if ($prev > 0) { ?>
      <button class="no-indicator" onclick="get_list(<?php echo $prev; ?>)"><?php echo $prev; ?></button>
    <?php }?>
    <button class="no-indicator btn_click" onclick="get_list(<?php echo $page; ?>)"><?php echo $page; ?></button>
    <?php if ($next > 0) { ?>
      <button class="no-indicator" onclick="get_list(<?php echo $next; ?>)"><?php echo $next; ?></button>
    <?php }?>
  </div>
  <div class="btns_next">
    <?php if ($total - $next > 2) { ?>
      <button class="next_after" onclick="get_list(<?php echo $next + 1; ?>)">
        <img src="<?php echo base_url().'template/back/center'; ?>/imgs/icon_next.png" height="12" width="auto">
      </button>
      <button class="next_last" onclick="get_list(<?php echo $total; ?>)">
        <img src="<?php echo base_url().'template/back/center'; ?>/imgs/icon_dbNext.png" height="12" width="auto">
      </button>
    <?php } ?>
  </div>
</div>
<script>
  let page = <?php echo $page; ?>;
 
  function get_list(page) {
    let url = '<?php echo base_url(); ?>center/teacher/list?page=' +page;
    get_page('teacher_list', url);
  }
  
  // onoff-btn 애니메이션
  $('.onoff').click(function(){
    let url = '<?php echo base_url(); ?>center/teacher/activate';
    let activate = $(this).hasClass('onoff_on') ? 0 : 1;
    let teacher_id = $(this).data('id');
  
    let data = [];
    data['teacher_id'] = teacher_id;
    data['activate'] = activate;
  
    console.log(data);
    
    send_post(data, url, false, '', function() {
      let target = $('#onoff-btn-'+teacher_id);
      let onoff = target.find('.onoff');
      let onoff_point = target.find('.onoff_point');
      // console.log(left)
      if(onoff.hasClass('onoff_on')) {
        onoff.removeClass('onoff_on');
        onoff_point.removeClass('onoff_point_on');
      } else {
        onoff.addClass('onoff_on');
        onoff_point.addClass('onoff_point_on');
      }
    });
  
  })

</script>
