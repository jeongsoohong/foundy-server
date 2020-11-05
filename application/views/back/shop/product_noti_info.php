<?php if ($edit && $old) { ?>
<div class="col-md-12 col-sm-12 col-xs-12" style="font-size: 8px; border: 1px solid grey; padding: 15px; background: #EAEAEA;">
  <h1 style="text-align: center">상품고시정보 수정을 부탁드립니다!!</h1>
  <?php echo $product_data->item_noti_info; ?>
</div>
<?php
}
$i = 0;
foreach ($noti_field_data as $field) {
  ?>
  <div class="col-md-12 col-sm-12 col-xs-12 noti-info">
    <div class="col-md-2 col-sm-2 col-xs-2" id="noti-field-<?php echo $i; ?>" style="text-align: center; overflow-wrap: break-word;" data-id="<?php echo $field->field_id; ?>">
      <?php echo trim($field->field_name); ?>
    </div>
    <div class="col-md-10 col-sm-10 col-xs-10">
      <input class='form-control' id="noti-info-<?php echo $i; ?>" name="not_info_<?php echo $i; ?>"
             type="text" value="<?php if ($edit) echo $field->field_value; ?>"
             placeholder="<?php if (!$edit) echo $field->placeholder; ?>"/>
    </div>
  </div>
<?php
  $i++;
} ?>
