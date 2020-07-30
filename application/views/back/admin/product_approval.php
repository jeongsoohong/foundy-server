<div>
  <?php
  echo form_open(base_url().'admin/shop/product/approval_set/'.$product_id, array(
    'class' => 'form-horizontal',
    'method' => 'post',
    'id' => 'product_approval',
    'enctype' => 'multipart/form-data'
  ));
  ?>
  <div class="panel-body">
    <div class="form-group">
      <label class="col-sm-2 control-label" for="demo-hor-1"> </label>
      <div class="col-sm-2">
        <h4>상태변경</h4>
      </div>
      <div class="col-sm-4 text-center">
        <input hidden id="pub_<?php echo $product_id; ?>"  data-size="switchery-lg" class='product-status form-control' name="status"
               type="text" value="<?php echo $status; ?>" data-id='<?php echo $product_id; ?>' style="display: none;"/>
        <select class="chosen-choices form-control" id="product-status-select" onchange="change_status();">
          <option <?php if ($status == SHOP_PRODUCT_STATUS_REQUEST) echo 'selected'; ?>
            value="<?php echo SHOP_PRODUCT_STATUS_REQUEST; ?>">
            <?php echo $this->crud_model->get_product_status_str(SHOP_PRODUCT_STATUS_REQUEST); ?>
          </option>
          <option <?php if ($status == SHOP_PRODUCT_STATUS_REJECT) echo 'selected'; ?>
            value="<?php echo SHOP_PRODUCT_STATUS_REJECT; ?>">
            <?php echo $this->crud_model->get_product_status_str(SHOP_PRODUCT_STATUS_REJECT); ?>
          </option>
          <option <?php if ($status == SHOP_PRODUCT_STATUS_ON_SALE) echo 'selected'; ?>
            value="<?php echo SHOP_PRODUCT_STATUS_ON_SALE; ?>">
            <?php echo $this->crud_model->get_product_status_str(SHOP_PRODUCT_STATUS_ON_SALE); ?>
          </option>
          <option <?php if ($status == SHOP_PRODUCT_STATUS_STOP_SALE) echo 'selected'; ?>
            value="<?php echo SHOP_PRODUCT_STATUS_STOP_SALE; ?>">
            <?php echo $this->crud_model->get_product_status_str(SHOP_PRODUCT_STATUS_STOP_SALE); ?>
          </option>
          <option <?php if ($status == SHOP_PRODUCT_STATUS_FINISH_SALE) echo 'selected'; ?>
            value="<?php echo SHOP_PRODUCT_STATUS_FINISH_SALE; ?>">
            <?php echo $this->crud_model->get_product_status_str(SHOP_PRODUCT_STATUS_FINISH_SALE); ?>
          </option>
        </select>
      </div>
      <div class="col-sm-2">
      </div>
    </div>

  </div>
  </form>
</div>
<script>
  function change_status() {
    var status = $('#product-status-select').find('option:checked').val();
    $('.product-status').val(status);
  }
  $(document).ready(function() {
    set_switchery();
    $("form").submit(function(e){
      //return false;
    });
  });
</script>
<div id="reserve"></div>

