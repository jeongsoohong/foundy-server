<style>
  button,select {
    width: 100%;
    height: 32px;
    font-size: 12px;
  }
  .product-content table tr {
    height: 40px;
    font-size: 12px;
    text-align: center;
  }
  .product-content table tr th {
    text-align: center;
  }
  .product-content table tr td {
    padding: 5px 15px;
  }
  .product-content table tr td div {
    padding-left: 5px;
    padding-right: 5px;
    line-height: 32px;
  }
  .product-status {
    padding: 10px 0 !important;
  }
  .product-list input[type='checkbox'] {
    width: auto !important;
    margin: auto;
    text-align: center;
  }
  .product-list table thead,.product-list table tbody {
    border: 1px solid #EAEAEA;
  }
  .product-list table tbody tr {
    height: 60px;
  }
  .product-list table tbody tr td img {
    width: 50px;
    height: 50px;
  }
</style>
<div class="col-md-12 product-meta">
  <div class="col-md-12">
    <table class="col-md-12">
      <tbody>
      <tr>
        <th class="col-md-2">브랜드명</th>
        <td class="col-md-3"><?php echo $shop_data->shop_name; ?></td>
        <th class="col-md-2">상품명</th>
        <td class="col-md-3">
          <input disabled class="form-control" id="product-name" type="text" name="product_name" alt="" />
        </td>
        <td class="col-md-2">
          <button class="product-search btn-dark" onclick="search_page()">검색</button>
        </td>
      </tr>
      <tr>
<!--        <th class="col-md-1">브랜드</th>-->
<!--        <td class="col-md-4">-->
<!--          <input class="form-control brand_name" type="text" name="brand_name" alt="" />-->
<!--        </td>-->
        <th class="col-md-2">카테고리</th>
        <td class="col-md-3">
          <select class="form-control" id="product-category">
              <option value="all">ALL</option>
            <?php foreach ($shop_category as $cat) { ?>
              <option <?php if ($cat->cat_code == $category) echo 'selected'; ?>
                value="<?php  echo $cat->cat_code; ?>"><?php echo $cat->cat_name; ?></option>
            <?php } ?>
          </select>
        </td>
        <th class="col-md-2">판매상태</th>
        <td class="col-md-3">
          <select class="form-control" id="product-status">
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
        </td>
        <td class="col-md-2">
        </td>
      </tr>
      </tbody>
    </table>
  </div>
</div>
<div class="col-md-12">
  <hr style="width: 100%; border: 1px solid #EAEAEA">
</div>
<div class="col-md-12 product-status">
  <div class="col-md-12">
    <div class="col-md-4">
      <h5 style="padding-left: 15px">상품목록 [ 총 <?php echo $total_cnt; ?>건 ]</h5>
    </div>
    <div class="col-md-4">
    </div>
    <div class="col-md-2">
      <?php if ($status >= SHOP_PRODUCT_STATUS_ON_SALE) { ?>
        <select disabled class="form-control product-change-status" id="product-status-change">
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
      <?php } ?>
    </div>
    <div class="col-md-2">
      <?php if ($status >= SHOP_PRODUCT_STATUS_ON_SALE) { ?>
        <button class="product-change-status btn-dark" disabled id="product-status-change-btn" onclick="change_status();">판매상태변경</button>
      <?php } ?>
    </div>
  </div>
</div>
<div class="col-md-12 product-list">
  <table class="col-md-12">
    <thead>
    <tr>
      <th class="col-md-1">
        <input class="form-control" id="item-list-all" type="checkbox" name="list_all" onchange="check_all()"/>
      </th>
      <th class="col-md-1">상품코드</th>
      <th class="col-md-1">이미지</th>
      <th class="col-md-2">상품명</th>
      <th class="col-md-1">판매상태</th>
      <th class="col-md-1">정상가</th>
      <th class="col-md-1">할인가</th>
      <th class="col-md-1">판매가</th>
      <th class="col-md-1">공급원가</th>
      <th class="col-md-2">거래구분</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($product_data as $product) { ?>
      <tr>
        <td class="col-md-1">
          <input class="form-control item-list-checkbox" data-id="<?php echo $product->product_id; ?>"
                 type="checkbox" name="list[]" onclick="check_change();" value="1"/>
        </td>
        <td class="col-md-1"><?php echo $product->product_code; ?></td>
        <td class="col-md-1">
          <img src="<?php echo $product->item_image_url_0; ?>">
        </td>
        <td class="col-md-2">
          <a href="javascript:void(0)" onclick="get_product(<?php echo $product->product_id; ?>)">
            <?php echo $product->item_name; ?>
          </a>
        </td>
        <td class="col-md-1"><?php echo $this->crud_model->get_product_status_str($status); ?></td>
        <td class="col-md-1"><?php echo $this->crud_model->get_price_str($product->item_general_price); ?></td>
        <td class="col-md-1"><?php echo $this->crud_model->get_price_str($product->item_general_price - $product->item_sell_price); ?></td>
        <td class="col-md-1"><?php echo $this->crud_model->get_price_str($product->item_sell_price); ?></td>
        <td class="col-md-1"><?php echo $this->crud_model->get_price_str($product->item_supply_price); ?></td>
        <td class="col-md-2"><?php echo $this->crud_model->get_product_shipping_free_str($product->item_shipping_free); ?></td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>
<style>
  .item-list-pagination {
    padding: 15px;
    text-align: center;
  }
  .item-list-pagination div ul {
    display: flex;
  }
  .item-list-pagination div ul li {
    width: 30px;
    height: 30px;
    line-height: 30px;
    color: #DBDBDB;
    text-align: center;
    font-size: 14px;
  }
  .item-list-pagination div ul li.li-empty {
    border: none;
  }
  .item-list-pagination div ul li.active {
    color: #353535;
  }
</style>
<div class="col-md-12 item-list-pagination">
  <div class="col-md-4">
  </div>
  <div class="col-md-4">
    <ul class="nav">
      <li class="col-md-1 li-empty"></li>
      <li class="col-md-1 li-empty"></li>
      <li class="col-md-1 li-empty"></li>
      <?php if ($prev>= 2) { ?>
        <a href="javascript:void(0);" onclick="get_page('1');"><li class="col-md-1"><span class="fa fa-angle-double-left"></span></li></a>
        <a href="javascript:void(0);" onclick="get_page('<?php echo $prev - 1; ?>');"><li class="col-md-1"><span class="fa fa-angle-left"></span></li></a>
      <?php } else { ?>
        <li class="col-md-1 li-empty"></li>
        <li class="col-md-1 li-empty"></li>
      <?php }?>
      <?php if ($prev == '') { ?>
        <li class="col-md-1 li-empty"></li>
      <?php } else { ?>
        <a href="javascript:void(0);" onclick="get_page('<?php echo $prev; ?>');"><li class="col-md-1"><?php echo $prev; ?></li></a>
      <?php }?>
      <li class="col-md-1 active"><?php echo $page; ?></li>
      <?php if ($next == '') { ?>
        <li class="col-md-1 li-empty"></li>
      <?php } else { ?>
        <a href="javascript:void(0);" onclick="get_page('<?php echo $next; ?>');"><li class="col-md-1"><?php echo $next; ?></li></a>
      <?php }?>
      <?php if ($total - $page >= 2) { ?>
        <a href="javascript:void(0);" onclick="get_page('<?php echo $next + 1; ?>');"><li class="col-md-1"><span class="fa fa-angle-right"></span></li></a>
        <a href="javascript:void(0);" onclick="get_page('<?php echo $total; ?>');"><li class="col-md-1"><span class="fa fa-angle-double-right"></span></li></a>
      <?php } else { ?>
        <li class="col-md-1 li-empty"></li>
        <li class="col-md-1 li-empty"></li>
      <?php }?>
      <li class="col-md-1 li-empty"></li>
      <li class="col-md-1 li-empty"></li>
      <li class="col-md-1 li-empty"></li>
    </ul>
  </div>
  <div class="col-md-4">
  </div>
</div>
<div class="modal fade" id="productInfoModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" style="padding-top: 50px;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="width: 5%">
          <span class="pull-right" aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">상품정보</h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer" style="display: flex;">
        <button type="button" class="btn btn-danger btn-theme-sm" data-dismiss="modal"
                onclick="open_product_edit()">수정</button>
        <button type="button" class="btn btn-theme btn-theme-sm" onclick="close_product()"
                style="text-transform: none; font-weight: 400; color: #fff; background-color: black">확인</button>
      </div>
    </div>
  </div>
</div>
<script>
  var status = <?php echo $status; ?>;
  var page = <?php echo $page; ?>;
  var cat = '<?php echo $category; ?>';
  var item_name = '<?php echo $item_name; ?>';

  function get_page(page) {
    $(".product-content").html(loading_set);
    $(".product-content").load(
      "<?php echo base_url()?>shop/product/list?page=" + page +
      "&cat=" + cat + "&item_name=" + item_name + "&status=" + status
    );
  };

  function close_product() {
    $('#productInfoModal').modal('hide');
  }

  function get_product(id) {
    let modal = $('#productInfoModal');
    let info = $('#productInfoModal .modal-body');

    pid = id;

    modal.modal('show');
    modal.appendTo('body');
    info.html(loading_set);
    info.load("<?php echo base_url()?>shop/product/view/" + id);
  };

  function search_page() {
    var product_name = $('#product-name').val();
    var product_category = $('#product-category').find('option:checked').val();
    var product_status = $('#product-status').find('option:checked').val();

    // console.log(product_name);
    // console.log(product_category);
    // console.log(product_status);

    $(".product-content").html(loading_set);
    $(".product-content").load(
      encodeURI(
      "<?php echo base_url()?>shop/product/list?page=1" +
      "&cat=" + product_category + "&item_name=" + product_name + "&status=" + product_status
      )
    );
  }

  function check_all() {
    if ($('#item-list-all').is(':checked') === true) {
      $('.product-list').find('input:checkbox').prop('checked', true);
      $('#product-status-change').attr('disabled', false);
      $('#product-status-change-btn').attr('disabled', false);
    } else {
      $('.product-list').find('input:checkbox').prop('checked', false);
      $('#product-status-change').attr('disabled', true);
      $('#product-status-change-btn').attr('disabled', true);
    }
  }

  function check_change() {
    let all_checked = true;
    let checked_cnt = 0;
    $.each($('.item-list-checkbox'), function (i,e) {
      if ($(e).prop('checked') === false) {
        all_checked = false;
      } else {
        checked_cnt++;
      }
    });

    if (all_checked === true) {
      $('#item-list-all').prop('checked', true);
    } else {
      $('#item-list-all').prop('checked', false);
    }

    // console.log(checked_cnt);

    if (checked_cnt === 0) {
      $('#product-status-change').attr('disabled', true);
      $('#product-status-change-btn').attr('disabled', true);
    } else {
      $('#product-status-change').attr('disabled', false);
      $('#product-status-change-btn').attr('disabled', false);
    }
  }

  function change_status() {
    let change_status = $('#product-status-change').find('option:selected').val();

    if (change_status === status) {
      console.log('status is not changed');
      return false;
    }

    let product_ids = Array();
    let idx = 0;

    $.each($('.item-list-checkbox'), function(i,e) {
      if ($(e).prop('checked') === true) {
        product_ids[idx] = $(e).data('id');
        idx++;
      }
    });

    // console.log(product_ids);
    // console.log(change_status);

    let formData = new FormData();
    formData.append('product_ids', JSON.stringify(product_ids));
    formData.append('change_status', change_status);

    $.ajax({
      url: '<?php echo base_url(); ?>shop/product/status', // form action url
      type: 'POST', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        if (data === 'done' || data.search('done') !== -1) {
          $.notify({
            message: '저장되었습니다.',
            icon: 'fa fa-check'
          }, {
            type: 'success',
            timer: 1000,
            delay: 2000,
            animate: {
              enter: 'animated lightSpeedIn',
              exit: 'animated lightSpeedOut'
            }
          });
          setTimeout(function(){location.href='<?php echo base_url(); ?>shop/product';}, 1000);
        } else {
          var title = '<strong>실패하였습니다</strong>';
          $.notify({
            title: title,
            message: data,
            icon: 'fa fa-check'
          }, {
            type: 'warning',
            timer: 1000,
            delay: 5000,
            animate: {
              enter: 'animated lightSpeedIn',
              exit: 'animated lightSpeedOut'
            }
          });
        }
      },
      error: function (e) {
        console.log(e)
      }
    });
  }
</script>