<div class="panel-body" id="demo_s">
  <table id="demo-table" class="table table-striped"  data-pagination="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" >
    <thead>
    <tr>
      <th><?php echo ('샵아이디');?></th>
      <th><?php echo ('유저아이디');?></th>
      <th><?php echo ('브랜드명');?></th>
      <th><?php echo ('대표자명');?></th>
      <th><?php echo ('연락처');?></th>
      <th><?php echo ('품목');?></th>
      <th><?php echo ('홈페이지');?></th>
      <th><?php echo ('이메일');?></th>
      <th><?php echo ('상태');?></th>
      <th class="text-right"><?php echo ('옵션');?></th>
    </tr>
    </thead>
    <tbody >
    <?php
    $i = 0;
    foreach($all_shops as $row){
      $i++;
      ?>
      <tr>
        <td><?php echo $row['shop_id']; ?></td>
        <td><?php echo $row['user_id']; ?></td>
        <td><?php echo $row['shop_name']; ?></td>
        <td><?php echo $row['representative_name']; ?></td>
        <td><?php echo $row['shop_phone']; ?></td>
        <td><?php echo $row['shop_items']; ?></td>
        <td><?php echo $row['shop_homepage_url']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td>
          <div class="label label-<?php if($row['activate'] == 1){ ?>purple<?php } else { ?>danger<?php }
          ?>">
            <?php echo $row['activate'] ? '승인' : '미승인'; ?>
          </div>
        </td>
        <td class="text-right">
          <a class="btn btn-dark btn-xs btn-labeled fa fa-user" data-toggle="tooltip"
             onclick="ajax_modal('view','<?php echo ('view_profile'); ?>','<?php echo ('successfully_viewed!');
             ?>','shop_view','<?php echo $row['shop_id']; ?>')" data-original-title="View"
             data-container="body">
            <?php echo ('샵정보');?>
          </a>
          <a class="btn btn-edit btn-xs btn-labeled fa fa-wrench" data-toggle="tooltip" onclick="ajax_set_full('edit','edit_shop','정상적으로 수정되었습니다!','shop_edit','<?php echo $row['shop_id']; ?>');proceed('to_list');" data-original-title="Edit" data-container="body">
            수정
          </a>
          <a class="btn btn-<?php echo ($row['activate'] ? 'warning' : 'success');?> btn-xs btn-labeled fa fa-check" data-toggle="tooltip"
             onclick="ajax_modal('approval','shop_approval','successfully_approval!','shop_approval','<?php echo $row['shop_id']; ?>')" data-original-title="View" data-container="body">
            <?php echo ($row['activate'] ? '미승인' : '승인');?>
          </a>
          <a onclick="delete_confirm('<?php echo $row['shop_id']; ?>','<?php echo ('정말 삭제하시겠습니까?');
          ?>')" class="btn btn-xs btn-danger btn-labeled fa fa-trash" data-toggle="tooltip"
             data-original-title="Delete" data-container="body">
            <?php echo ('삭제');?>
          </a>
        </td>
      </tr>
      <?php
    }
    ?>
    </tbody>
  </table>
</div>
<div id="vendr"></div>
<div id='export-div' style="padding:40px;">
  <h1 id ='export-title' style="display:none;">shops</h1>
  <table id="export-table" class="table" data-name='vendors' data-orientation='p' data-width='1500' style="display:none;">
    <colgroup>
      <col width="50">
      <col width="150">
      <col width="150">
      <col width="150">
      <col width="150">
      <col width="150">
      <col width="150">
      <col width="150">
      <col width="150">
    </colgroup>
    <thead>
    <tr>
      <th><?php echo ('샵아이디');?></th>
      <th><?php echo ('유저아이디');?></th>
      <th><?php echo ('상호명');?></th>
      <th><?php echo ('대표자명');?></th>
      <th><?php echo ('연락처');?></th>
      <th><?php echo ('품목');?></th>
      <th><?php echo ('홈페이지');?></th>
      <th><?php echo ('이메일');?></th>
      <th><?php echo ('상태');?></th>
    </tr>
    </thead>
    <tbody >
    <?php
    $i = 0;
    foreach($all_shops as $row){
      $i++;
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['shop_id']; ?></td>
        <td><?php echo $row['user_id']; ?></td>
        <td><?php echo $row['shop_name']; ?></td>
        <td><?php echo $row['representative_name']; ?></td>
        <td><?php echo $row['shop_phone']; ?></td>
        <td><?php echo $row['shop_items']; ?></td>
        <td><?php echo $row['shop_homepage_url']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['activate'] ? '승인' : '미승인'; ?></td>
      </tr>
      <?php
    }
    ?>
    </tbody>
  </table>
</div>

