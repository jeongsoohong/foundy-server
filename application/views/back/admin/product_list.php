<style>
  table thead tr th, table tbody tr td {
    text-align: center;
    vertical-align: middle !important;
  }
</style>
<div class="panel-body" id="demo_s">
  <table id="demo-table" class="table table-striped"
         data-pagination="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" >
    <thead>
    <tr>
      <th><?php echo ('브랜드명');?></th>
      <th><?php echo ('상품코드');?></th>
      <th><?php echo ('카테고리');?></th>
      <th><?php echo ('이미지');?></th>
      <th><?php echo ('상품명');?></th>
      <th><?php echo ('판매가');?></th>
      <th><?php echo ('상태');?></th>
      <th><?php echo ('옵션');?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($all_products as $row){ ?>
      <tr>
        <td><?php echo $row['shop_name']; ?></td>
        <td><?php echo $row['product_code']; ?></td>
        <td><?php echo $row['item_cat']; ?></td>
        <td><img class="img-sm img-border" src="<?php echo $row['item_image_url_0']; ?>"/></td>
        <td><?php echo $row['item_name']; ?></td>
        <td><?php echo $this->crud_model->get_price_str($row['item_sell_price']); ?></td>
        <td>
          <div class="label label-<?php echo $this->crud_model->get_product_status_class($row['status']); ?>">
            <?php echo $this->crud_model->get_product_status_str($row['status']); ?>
          </div>
        </td>
        <td class="text-right">
          <a class="btn btn-dark btn-xs btn-labeled fa fa-user" data-toggle="tooltip"
             onclick="ajax_modal('view','view_product','successfully_viewed!','shop_product',
               '<?php echo $row['product_id']; ?>')" data-original-title="View" data-container="body">
            아이템정보
          </a>
          <a class="btn btn-edit btn-xs btn-labeled fa fa-wrench" data-toggle="tooltip"
             onclick="ajax_set_full('edit','edit_product','정상적으로 수정되었습니다!','product_edit','<?php echo $row['product_id']; ?>');proceed('to_list');"
             data-original-title="Edit" data-container="body">
            수정
          </a>
          <!--
          <a class="btn btn-<?php //echo ($row['status'] == SHOP_PRODUCT_STATUS_REQUEST ? 'success' : 'danger'); ?> btn-xs btn-labeled fa fa-check" data-toggle="tooltip"
             onclick="ajax_modal('approval','product_approval','successfully_approval!','product_approval','<?php //echo $row['product_id']; ?>')"
             data-original-title="View" data-container="body">
            <?php //echo ($row['status'] == SHOP_PRODUCT_STATUS_REQUEST ? '승인' : '미승인'); ?>
          </a>
          -->
          <a class="btn btn-warning btn-xs btn-labeled fa fa-check" data-toggle="tooltip"
             onclick="ajax_modal('approval','product_approval','successfully approval!','product_approval',
               '<?php echo $row['product_id']; ?>')" data-original-title="View" data-container="body">
            상태변경
          </a>
          <!--
          <a onclick="delete_confirm('<?php //echo $row['product_id']; ?>','<?php //echo ('정말 삭제하시겠습니까?'); ?>')"
             class="btn btn-xs btn-danger btn-labeled fa fa-trash" data-toggle="tooltip"
             data-original-title="Delete" data-container="body">
            삭제
          </a>
        </td>
        -->
      </tr>
      <?php } ?>
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
    </colgroup>
    <thead>
    <tr>
      <th><?php echo ('번호');?></th>
      <th><?php echo ('브랜드명');?></th>
      <th><?php echo ('상품코드');?></th>
      <th><?php echo ('카테고리');?></th>
      <th><?php echo ('이미지');?></th>
      <th><?php echo ('상품명');?></th>
      <th><?php echo ('판매가');?></th>
      <th><?php echo ('상태');?></th>
    </tr>
    </thead>
    <tbody >
    <?php
    $i = 0;
    foreach($all_products as $row){
      $i++;
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['shop_name']; ?></td>
        <td><?php echo $row['product_code']; ?></td>
        <td><?php echo $row['item_cat']; ?></td>
        <td><img class="img-sm img-border" src="<?php echo $row['item_image_url_0']; ?>"/></td>
        <td><?php echo $row['item_name']; ?></td>
        <td><?php echo $row['item_sell_price']; ?></td>
        <td><?php echo $row['status']; ?></td>
        <td>
          <div class="label label-purple">
            <?php echo $this->crud_model->get_product_status_str($row['status']); ?>
          </div>
        </td>
      </tr>
      <?php
    }
    ?>
    </tbody>
  </table>
</div>

