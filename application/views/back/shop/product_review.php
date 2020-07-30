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
    padding-left: 0;
    padding-right: 0;
    line-height: 32px;
  }
  .review-list table thead,.review-list table tbody {
    border: 1px solid #EAEAEA;
  }
</style>
<div class="col-md-12 product-meta">
<!--  <div class="col-md-12" id="page-title">-->
<!--    <h1 class="page-header text-overflow">상품관리 <span class="fa fa-angle-right"></span> 상품리뷰</h1>-->
<!--  </div>-->
  <div class="col-md-12">
    <table class="col-md-12">
      <tbody>
      <tr>
        <td class="col-md-2">
          <select class="form-control search-category">
            <option value="1">상품명</option>
<!--            <option value="2">상품코드</option>-->
<!--            <option value="3">내용</option>-->
<!--            <option value="4">작성자ID</option>-->
<!--            <option value="5">주문번호</option>-->
<!--            <option value="6">브랜드명</option>-->
          </select>
        </td>
        <td class="col-md-8">
          <input value="<?php echo $item_name; ?>" id='item-name' class="form-control search_meta" type="text" name="search_meta" alt="" />
        </td>
        <td class="col-md-2">
          <a href="javascript:void(0);" onclick="search_review_page()">
            <button class="product-search btn-dark">검색</button>
          </a>
        </td>
      </tr>
      </tbody>
    </table>
  </div>
</div>
<div class="col-md-12">
  <hr style="width: 100%; border: 1px solid #EAEAEA">
</div>
<div class="col-md-12 review-list">
  <table class="col-md-12">
    <thead>
    <tr>
      <th class="col-md-1">아이디</th>
      <th class="col-md-1">주문번호</th>
      <th class="col-md-2">상품명</th>
      <th class="col-md-1">점수</th>
      <th class="col-md-5">후기내용</th>
      <th class="col-md-1">작성자ID</th>
      <th class="col-md-1">등록일</th>
    </tr>
    </thead>
    <tbody>
    <?php $idx = 1; foreach ($review_data as $review) { ?>
      <tr>
        <td class="col-md-1"><?php echo $review->review_id; ?></td>
        <td class="col-md-1"><?php echo $review->purchase_code; ?></td>
        <td class="col-md-2"><?php echo $review->item_name; ?></td>
        <td class="col-md-1"><?php echo $review->review_score; ?></td>
        <td class="col-md-5"><?php echo (mb_strlen($review->review_body) > 25 ? mb_substr($review->review_body, 0, 25).'...' : $review->review_body); ?></td>
        <td class="col-md-1"><?php echo $review->email; ?></td>
        <td class="col-md-1"><?php echo $review->review_at; ?></td>
      </tr>
      <?php $idx++; }?>
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
        <a href="javascript:void(0);" onclick="get_review_page('1');"><li class="col-md-1"><span class="fa fa-angle-double-left"></span></li></a>
        <a href="javascript:void(0);" onclick="get_review_page('<?php echo $prev - 1; ?>');"><li class="col-md-1"><span class="fa fa-angle-left"></span></li></a>
      <?php } else { ?>
        <li class="col-md-1 li-empty"></li>
        <li class="col-md-1 li-empty"></li>
      <?php }?>
      <?php if ($prev == '') { ?>
        <li class="col-md-1 li-empty"></li>
      <?php } else { ?>
        <a href="javascript:void(0);" onclick="get_review_page('<?php echo $prev; ?>');"><li class="col-md-1"><?php echo $prev; ?></li></a>
      <?php }?>
      <li class="col-md-1 active"><?php echo $page; ?></li>
      <?php if ($next == '') { ?>
        <li class="col-md-1 li-empty"></li>
      <?php } else { ?>
        <a href="javascript:void(0);" onclick="get_review_page('<?php echo $next; ?>');"><li class="col-md-1"><?php echo $next; ?></li></a>
      <?php }?>
      <?php if ($total - $page >= 2) { ?>
        <a href="javascript:void(0);" onclick="get_review_page('<?php echo $next + 1; ?>');"><li class="col-md-1"><span class="fa fa-angle-right"></span></li></a>
        <a href="javascript:void(0);" onclick="get_review_page('<?php echo $total; ?>');"><li class="col-md-1"><span class="fa fa-angle-double-right"></span></li></a>
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

  var page = <?php echo $page; ?>;
  var item_name = '<?php echo $item_name; ?>';

  function get_review_page(page) {
    $(".product-content").html(loading_set);
    $(".product-content").load(
      encodeURI(
        "<?php echo base_url();?>shop/product/review?page=" + page + "&item_name=" + item_name
      )
    );
  };

  function search_review_page() {
    var item_name = $('#item-name').val();

    console.log(item_name);

    $(".product-content").html(loading_set);
    $(".product-content").load(
      encodeURI(
        "<?php echo base_url();?>shop/product/review?page=1&item_name=" + item_name
      )
    );
  }
</script>
