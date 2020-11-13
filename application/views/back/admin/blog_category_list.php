<div class="panel-body" id="demo_s">
  <table id="demo-table" class="table table-striped"  data-pagination="true" data-show-refresh="true" data-ignorecol="0,2" data-show-toggle="true" data-show-columns="false" data-search="true" >

    <thead>
    <tr>
      <th>no</th>
      <th>name</th>
      <th>desc</th>
      <th>status</th>
      <th class="text-right">options</th>
    </tr>
    </thead>

    <tbody >
    <?php
    $i = 0;
    foreach($all_categories as $row){
      $i++;
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['desc']; ?></td>
        <td>
          <div id='status-activate' class="label label-<?php if($row['activate']== 1){ ?>info<?php } else { ?>warning<?php }
          ?>">
            <?php echo $row['activate'] ? 'activate' : 'inactivate'; ?>
          </div>
        </td>
        <td class="text-right">
          <?php if ($row['type'] == BLOG_TYPE_DEFAULT) { ?>
          <a class="btn btn-edit btn-xs btn-labeled fa fa-wrench" data-toggle="tooltip"
             onclick="ajax_modal('edit','<?php echo ('edit_blog_category'); ?>','<?php echo ('successfully_edited!'); ?>','blog_category_edit','<?php echo $row['category_id']; ?>')"
             data-original-title="Edit" data-container="body">
            <?php echo ('edit');?>
          </a>
          <a onclick="delete_confirm('<?php echo $row['category_id']; ?>','<?php echo ('really_want_to_delete_this?'); ?>')" class="btn btn-danger btn-xs btn-labeled fa fa-trash" data-toggle="tooltip"
             data-original-title="Delete" data-container="body">
            <?php echo ('delete');?>
          </a>
            <a class="btn <?php if ($row['activate']) {echo 'btn-warning';}else{echo 'btn-success';}?> btn-xs btn-labeled fa fa-check" data-toggle="tooltip"
               onclick="confirmActivate(<?php echo $row['category_id'];?>,<?php echo $row['activate'];?>)" data-original-title="View" data-container="body">
              <?php if($row['activate']){echo 'inactivate';}else{echo 'activate';} ?>
            </a>
          <?php } ?>
        </td>
      </tr>
      <?php
    }
    ?>
    </tbody>
  </table>
</div>

<div id='export-div'>
  <h1 style="display:none;"><?php echo ('blog_category'); ?></h1>
  <table id="export-table" data-name='blog_category' data-orientation='p' style="display:none;">
    <thead>
    <tr>
      <th>no</th>
      <th>name</th>
      <th>desc</th>
      <th class="text-right">options</th>
    </tr>
    </thead>

    <tbody >
    <?php
    $i = 0;
    foreach($all_categories as $row){
      $i++;
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['desc']; ?></td>
        <td><?php echo $row['activate']; ?></td>
      </tr>
      <?php
    }
    ?>
    </tbody>
  </table>
</div>

<script>
  
  function confirmActivate(id,activate) {
    let msg ='';
    if (activate) {
      msg += '카테고리 게시를 취소하시겠습니까?';
    } else {
      msg += '카테고리 게시를 하시겠습니까?';
    }
    
    let req = activate ? 'no' : 'ok';
    msg = '<div class="modal-title">'+msg+'</div>';
    bootbox.confirm(msg, function(result) {
      console.log(result);
      if (result) {
        ajax_load(base_url + '' + user_type + '/' + module + '/activate_set/' + id + '?req=' + req);
        $.activeitNoty({
          type: 'success',
          icon: 'fa fa-check',
          message: (req === 'ok' ? s_e : s_d),
          container: 'floating',
          timer: 3000
        });
        location.href='<?php echo base_url(); ?>/admin/blog_category';
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