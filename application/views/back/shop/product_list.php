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
<!--  <div class="col-md-12" id="page-title" style="margin-bottom: 15px;">-->
<!--    <h1 class="page-header text-overflow">상품관리 <span class="fa fa-angle-right"></span> 상품리스트</h1>-->
<!--  </div>-->
<!--  <div class="col-md-12">-->
<!--    <div class="col-md-10">-->
<!--    </div>-->
<!--    <div class="col-md-2" style="padding-left: 15px; padding-right: 15px">-->
<!--      <button class="product_register btn-danger">신규등록</button>-->
<!--    </div>-->
<!--  </div>-->
  <div class="col-md-12">
    <table class="col-md-12">
      <tbody>
      <tr>
        <th class="col-md-2">브랜드명</th>
        <td class="col-md-3"><?php echo $shop_data->shop_name; ?></td>
        <th class="col-md-2">상품명</th>
        <td class="col-md-3">
          <input class="form-control" id="product-name" type="text" name="product_name" alt="" />
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
              <option value="<?php  echo $cat->cat_code; ?>"><?php echo $cat->cat_name; ?></option>
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
      <?php if ($status > SHOP_PRODUCT_STATUS_ON_SALE) { ?>
        <select class="form-control product-change-status">
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
      <?php if ($status > SHOP_PRODUCT_STATUS_ON_SALE) { ?>
        <button class="product-change-status btn-dark">변경</button>
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
          <input class="form-control item-list-checkbox" data-id="<?php echo $product->product_id; ?>" type="checkbox" name="list[]"/>
        </td>
        <td class="col-md-1"><?php echo $product->product_code; ?></td>
        <td class="col-md-1">
          <img src="<?php echo $product->item_image_url_0; ?>">
        </td>
        <td class="col-md-2"><?php echo $product->item_name; ?></td>
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
    } else {
      $('.product-list').find('input:checkbox').prop('checked', false);
    }
  }
</script>