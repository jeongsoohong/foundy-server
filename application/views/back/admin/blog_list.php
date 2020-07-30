<div class="panel-body" id="demo_s">
  <table id="demo-table" class="table table-striped"  data-pagination="true" data-show-refresh="true" data-ignorecol="0,6" data-show-toggle="true" data-show-columns="false" data-search="true" >
    <thead>
    <tr>
      <th>아이디</th>
      <th>제목</th>
      <th>작성일</th>
      <th>카테고리</th>
      <th>상태</th>
      <th class="text-right">옵션</th>
    </tr>
    </thead>

    <tbody >
    <?php
    $i=0;
    foreach($all_blogs as $row){
      $i++;
      ?>
      <tr>
        <td><?php echo $row['blog_id']; ?></td>
        <td><?php echo $row['title']; ?></td>
        <td><?php echo $row['modified_at']; ?></td>
        <td><?php echo $row['category']->name.'('.$row['category']->desc.')'; ?></td>
        <td>
          <div id='status-activate' class="label label-<?php if($row['activate']== 1){ ?>info<?php } else { ?>warning<?php }
          ?>">
            <?php echo $row['activate'] ? 'activate' : 'inactivate'; ?>
          </div>
          <div id='status-main' class="label label-<?php if($row['main_view']== 1){ ?>purple<?php } else { ?>danger<?php }
          ?>">
            <?php echo $row['main_view'] ? '메인노출' : '메인미노출'; ?>
          </div>
          <div id='status-shop' class="label label-<?php if($row['shop_view']== 1){ ?>info<?php } else { ?>warning<?php }
          ?>">
            <?php echo $row['shop_view'] ? '샵메인노출' : '샵메인미노출'; ?>
          </div>
        </td>
        <td class="text-right">
          <a class="btn btn-edit btn-xs btn-labeled fa fa-wrench" data-toggle="tooltip" onclick="ajax_set_full('edit','<?php echo ('edit_blog'); ?>','정상적으로 수정되었습니다!','blog_edit','<?php echo $row['blog_id']; ?>');proceed('to_list');" data-original-title="Edit" data-container="body">
            수정
          </a>
          <?php if ($row['category']->type == BLOG_TYPE_DEFAULT) {?>
            <a class="btn <?php if ($row['main_view']) {echo 'btn-warning';}else{echo 'btn-success';}?> btn-xs btn-labeled fa fa-check" data-toggle="tooltip"
               onclick="confirmMainView(<?php echo $row['blog_id'];?>,<?php echo $row['main_view'];?>,'main')" data-original-title="View" data-container="body">
              <?php if($row['main_view']){echo '메인미노출';}else{echo '메인노출';} ?>
            </a>
            <a class="btn <?php if ($row['shop_view']) {echo 'btn-warning';}else{echo 'btn-success';}?> btn-xs btn-labeled fa fa-check" data-toggle="tooltip"
               onclick="confirmMainView(<?php echo $row['blog_id'];?>,<?php echo $row['shop_view'];?>,'shop')" data-original-title="View" data-container="body">
              <?php if($row['shop_view']){echo '샵메인미노출';}else{echo '샵메인노출';} ?>
            </a>
          <?php } ?>
          <a class="btn <?php if ($row['activate']) {echo 'btn-danger';}else{echo 'btn-success';}?> btn-xs btn-labeled fa fa-check" data-toggle="tooltip"
             onclick="confirmActivate(<?php echo $row['blog_id'];?>,<?php echo $row['activate'];?>)" data-original-title="View" data-container="body">
            <?php if($row['activate']){echo 'inactivate';}else{echo 'activate';} ?>
          </a>
          <!--
          <a onclick="delete_confirm('<?php //echo $row['blog_id']; ?>','정말 삭제하시겠습니까?')" class="btn btn-danger btn-xs btn-labeled fa fa-trash" data-toggle="tooltip" data-original-title="Delete" data-container="body">
            삭제
          </a>
          -->
        </td>
      </tr>
      <?php
    }
    ?>
    </tbody>
  </table>
</div>
<script>
  function confirmMainView(id,activate,type) {
    let msg ='';
    if (type === 'shop') {
      msg += '샵';
    }
    if (activate) {
     msg += '메인에 게시를 취소하시겠습니까?';
    } else {
      msg += '메인에 게시를 하시겠습니까?';
    }

    let req = activate ? 'no' : 'ok';
    msg = '<div class="modal-title">'+msg+'</div>';
    bootbox.confirm(msg, function(result) {
      if (result) {
        ajax_load(base_url + '' + user_type + '/' + module + '/' + type + '_view_set/' + id + '?req=' + req);
        $.activeitNoty({
          type: 'success',
          icon: 'fa fa-check',
          message: (req === 'ok' ? s_e : s_d),
          container: 'floating',
          timer: 3000
        });
        location.href='<?php echo base_url(); ?>/admin/blog';
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

  function confirmActivate(id,activate) {
    let msg ='';
    if (activate) {
      msg += '블로그 게시를 취소하시겠습니까?';
    } else {
      msg += '블로그 게시를 하시겠습니까?';
    }

    let req = activate ? 'no' : 'ok';
    msg = '<div class="modal-title">'+msg+'</div>';
    bootbox.confirm(msg, function(result) {
      if (result) {
        ajax_load(base_url + '' + user_type + '/' + module + '/activate_set/' + id + '?req=' + req);
        $.activeitNoty({
          type: 'success',
          icon: 'fa fa-check',
          message: (req === 'ok' ? s_e : s_d),
          container: 'floating',
          timer: 3000
        });
        location.href='<?php echo base_url(); ?>/admin/blog';
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


