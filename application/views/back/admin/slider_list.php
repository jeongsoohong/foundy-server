<div class="panel-body" id="demo_s">
  <table id="demo-table" class="table table-striped"  data-pagination="true" data-show-refresh="true" data-ignorecol="0,6" data-show-toggle="true" data-show-columns="false" data-search="true" >
    <thead>
    <tr>
      <th>이미지</th>
      <th>제목</th>
      <th>카테고리</th>
      <th>설명</th>
      <th>링크</th>
      <th>위치</th>
      <th>상태</th>
      <th class="text-right">옵션</th>
    </tr>
    </thead>
    <tbody >
    <?php
    $i=0;
    foreach($sliders as $slider){
      $i++;
      ?>
      <tr>
        <td><img class="img-sm img-border" src="<?php echo $slider->slider_image_url; ?>"/></td>
        <td><?php echo $slider->title; ?></td>
        <td><?php echo $slider->category; ?></td>
        <td><?php echo $slider->desc; ?></td>
        <td><?php echo empty($slider->link) == true ? '없음' : $slider->link; ?></td>
        <td>
          <div id='type' class="label label-<?php if($slider->type == MAIN_SLIDER_TYPE_HOME){ ?>success<?php } else { ?>info<?php }
          ?>">
            <?php echo $slider->type == MAIN_SLIDER_TYPE_HOME ? 'home' : 'shop'; ?>
          </div>
        </td>
        <td>
          <div id='status' class="label label-<?php if($slider->activate == 1){ ?>purple<?php } else { ?>danger<?php }
          ?>">
            <?php echo $slider->activate ? 'activate' : 'inactivate'; ?>
          </div>
        </td>
        <td class="text-right">
          <a class="btn btn-edit btn-xs btn-labeled fa fa-wrench" data-toggle="tooltip" onclick="ajax_set_full('edit','<?php echo ('edit_blog'); ?>','정상적으로 수정되었습니다!','blog_edit','<?php echo $slider->slider_id; ?>');proceed('to_list');" data-original-title="Edit" data-container="body">
            수정
          </a>
          <a class="btn btn-warning btn-xs btn-labeled fa fa-check" data-toggle="tooltip"
             onclick="confirmActivate(<?php echo $slider->slider_id;?>,<?php echo $slider->activate;?>)" data-original-title="View" data-container="body">
            상태변경
          </a>
          <a onclick="delete_confirm('<?php echo $slider->slider_id; ?>','정말 삭제하시겠습니까?')" class="btn btn-danger btn-xs btn-labeled fa fa-trash" data-toggle="tooltip" data-original-title="Delete" data-container="body">
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
    let change_status = activate ? 'inactivate' : 'activate';
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
        location.href='<?php echo base_url(); ?>/admin/slider';
        //sound('delete');
      } else {
        $.activeitNoty({
          type: 'danger',
          icon: 'fa fa-minus',
          message: cncle,
          container: 'floating',
          timer: 3000
        });
        //sound('cancelled');
      };
    });
  }
</script>


