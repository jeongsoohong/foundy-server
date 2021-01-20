<div class="panel-body" id="demo_s">
  <table id="demo-table" class="table table-striped"  data-pagination="true" data-show-refresh="true" data-ignorecol="0,6" data-show-toggle="true" data-show-columns="false" data-search="true" >
    <thead>
    <tr>
      <th>쿠폰명</th>
      <th>혜택회원</th>
      <th>쿠폰수</th>
      <th>할인</th>
      <th>발급시간</th>
      <th>사용종료시간</th>
      <th>상태</th>
      <th class="text-right">옵션</th>
    </tr>
    </thead>
    <tbody >
    <?php
    $i=0;
    $now = time();
    foreach($coupons as $coupon){
      $i++;
      ?>
      <tr>
        <td><?php echo $coupon->coupon_title; ?></td>
        <td><?php echo $this->coupon_model->get_coupon_user_type_str($coupon->user_type); ?></td>
        <td><?php echo $coupon->coupon_count == 0 ? '무제한' : $coupon->coupon_count; ?></td>
        <? if ($coupon->coupon_type == COUPON_TYPE_SHOP_FREE_SHIPPING) { ?>
          <td>무료배송</td>
        <? } else { ?>
          <td><?php echo $coupon->coupon_benefit; ?><?php echo ($coupon->coupon_type == COUPON_TYPE_SHOP_DISCOUNT_PERCENT ? '%' : '원'); ?></td>
        <? } ?>
        <td><?php echo $coupon->start_at; ?> ~ <?php echo $coupon->end_at; ?></td>
        <td><?php echo $coupon->use_at; ?></td>
        <td>
          <div id='status' class="label label-<?php echo $coupon->activate == 1 ? (strtotime($coupon->end_at) < $now ? 'dark' : 'purple') : 'danger'?>">
            <?php echo $coupon->activate == 1 ? (strtotime($coupon->end_at) < $now ? '발급완료' : '발급중') : '발급중지'; ?>
          </div>
        </td>
        <td class="text-right">
          <a class="btn btn-dark btn-xs btn-labeled fa fa-user" data-toggle="tooltip"
             onclick="ajax_modal('view','<?php echo ('view_profile'); ?>','<?php echo ('successfully_viewed!');
             ?>','coupon_view','<?php echo $coupon->coupon_id; ?>')" data-original-title="View"
             data-container="body">
            보기
          </a>
          <a class="btn btn-edit btn-xs btn-labeled fa fa-wrench" data-toggle="tooltip"
             onclick="ajax_set_full('edit','<?php echo ('edit_coupon'); ?>','정상적으로 수정되었습니다!','coupon_edit',
               '<?php echo $coupon->coupon_id; ?>');proceed('to_list');" data-original-title="Edit" data-container="body">
            수정
          </a>
          <a class="btn btn-warning btn-xs btn-labeled fa fa-check" data-toggle="tooltip"
             onclick="confirmActivate(<?php echo $coupon->coupon_id;?>,<?php echo $coupon->activate;?>)"
             data-original-title="View" data-container="body">
            상태변경
          </a>
          <a onclick="delete_confirm('<?php echo $coupon->coupon_id; ?>','정말 삭제하시겠습니까?')"
             class="btn btn-danger btn-xs btn-labeled fa fa-trash" data-toggle="tooltip"
             data-original-title="Delete" data-container="body">
            삭제
          </a>
        </td>
      </tr>
      <?php
    }
    ?>
    </tbody>
  </table>
</div>
<script>
  function confirmActivate(id,activate) {
    let change_status = activate ? '발급중지' : '발급중';
    var msg = change_status + ' 상태로 변경하시겠습니까?';
    var req = activate ? 'no' : 'ok';
    
    msg = '<div class="modal-title">'+msg+'</div>';
    bootbox.confirm(msg, function(result) {
      if (result) {
        ajax_load(base_url + '' + user_type + '/' + module + '/approval_set/' + id + '?req=' + req);
        $.activeitNoty({
          type: 'success',
          icon: 'fa fa-check',
          message: (req === 'ok' ? s_e : s_d),
          container: 'floating',
          timer: 3000
        });
        location.href='<?php echo base_url(); ?>/admin/coupon';
      } else {
        $.activeitNoty({
          type: 'danger',
          icon: 'fa fa-minus',
          message: cncle,
          container: 'floating',
          timer: 3000
        });
      };
    });
  }
</script>


