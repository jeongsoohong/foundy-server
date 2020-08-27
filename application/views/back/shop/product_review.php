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
  .review-star, .item-review-star {
    height: 60px;
    text-align: center;
  }
  .review-star span img, .item-review-star span img {
    width: 40px;
    height: 40px;
  }
</style>
<div class="col-md-12 col-sm-12 col-xs-12 product-meta">
<!--  <div class="col-md-12" id="page-title">-->
<!--    <h1 class="page-header text-overflow">상품관리 <span class="fa fa-angle-right"></span> 상품리뷰</h1>-->
<!--  </div>-->
  <div class="col-md-12 col-sm-12 col-xs-12">
    <table class="col-md-12 col-sm-12 col-xs-12">
      <tbody>
      <tr>
        <td class="col-md-2 col-sm-2 col-xs-2">
          <select class="form-control search-category">
            <option value="1">상품명</option>
<!--            <option value="2">상품코드</option>-->
<!--            <option value="3">내용</option>-->
<!--            <option value="4">작성자ID</option>-->
<!--            <option value="5">주문번호</option>-->
<!--            <option value="6">브랜드명</option>-->
          </select>
        </td>
        <td class="col-md-8 col-sm-8 col-xs-8">
          <input value="<?php echo $item_name; ?>" id='item-name' class="form-control search_meta" type="text" name="search_meta" alt="" />
        </td>
        <td class="col-md-2 col-sm-2 col-xs-2">
          <a href="javascript:void(0);" onclick="search_review_page()">
            <button class="product-search btn-dark">검색</button>
          </a>
        </td>
      </tr>
      </tbody>
    </table>
  </div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
  <hr style="width: 100%; border: 1px solid #EAEAEA">
</div>
<div class="col-md-12 col-sm-12 col-xs-12 review-list">
  <table class="col-md-12 col-sm-12 col-xs-12">
    <thead>
    <tr>
      <th class="col-md-1 col-sm-1 col-xs-1">아이디</th>
      <th class="col-md-1 col-sm-1 col-xs-1">주문번호</th>
      <th class="col-md-2 col-sm-2 col-xs-2">상품명</th>
      <th class="col-md-1 col-sm-1 col-xs-1">점수</th>
      <th class="col-md-5 col-sm-5 col-xs-5">후기내용</th>
      <th class="col-md-1 col-sm-1 col-xs-1">작성자ID</th>
      <th class="col-md-1 col-sm-1 col-xs-1">등록일</th>
    </tr>
    </thead>
    <tbody>
    <?php $idx = 1; foreach ($review_data as $review) { ?>
      <tr>
        <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $review->review_id; ?></td>
        <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $review->purchase_code; ?></td>
        <td class="col-md-2 col-sm-2 col-xs-2"><?php echo $review->item_name; ?></td>
        <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $review->review_score; ?></td>
        <td class="col-md-5 col-sm-5 col-xs-5">
          <a href="javascript:void(0)" onclick="get_review(<?php echo $review->review_id; ?>)">
            <?php echo (mb_strlen($review->review_body) > 25 ? mb_substr($review->review_body, 0, 25).'...' : $review->review_body); ?>
          </a>
        </td>
        <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $review->email; ?></td>
        <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $review->review_at; ?></td>
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
<div class="col-md-12 col-sm-12 col-xs-12 item-list-pagination">
  <div class="col-md-4 col-sm-4 col-xs-4">
  </div>
  <div class="col-md-4 col-sm-4 col-xs-4">
    <ul class="nav">
      <li class="col-md-1 col-sm-1 col-xs-1 li-empty"></li>
      <li class="col-md-1 col-sm-1 col-xs-1 li-empty"></li>
      <li class="col-md-1 col-sm-1 col-xs-1 li-empty"></li>
      <?php if ($prev>= 2) { ?>
        <a href="javascript:void(0);" onclick="get_review_page('1');"><li class="col-md-1 col-sm-1 col-xs-1"><span class="fa fa-angle-double-left"></span></li></a>
        <a href="javascript:void(0);" onclick="get_review_page('<?php echo $prev - 1; ?>');"><li class="col-md-1 col-sm-1 col-xs-1"><span class="fa fa-angle-left"></span></li></a>
      <?php } else { ?>
        <li class="col-md-1 col-sm-1 col-xs-1 li-empty"></li>
        <li class="col-md-1 col-sm-1 col-xs-1 li-empty"></li>
      <?php }?>
      <?php if ($prev == '') { ?>
        <li class="col-md-1 col-sm-1 col-xs-1 li-empty"></li>
      <?php } else { ?>
        <a href="javascript:void(0);" onclick="get_review_page('<?php echo $prev; ?>');"><li class="col-md-1 col-sm-1 col-xs-1 "><?php echo $prev; ?></li></a>
      <?php }?>
      <li class="col-md-1 col-sm-1 col-xs-1 active"><?php echo $page; ?></li>
      <?php if ($next == '') { ?>
        <li class="col-md-1 col-sm-1 col-xs-1 li-empty"></li>
      <?php } else { ?>
        <a href="javascript:void(0);" onclick="get_review_page('<?php echo $next; ?>');"><li class="col-md-1 col-sm-1 col-xs-1 "><?php echo $next; ?></li></a>
      <?php }?>
      <?php if ($total - $page >= 2) { ?>
        <a href="javascript:void(0);" onclick="get_review_page('<?php echo $next + 1; ?>');"><li class="col-md-1 col-sm-1 col-xs-1 "><span class="fa fa-angle-right"></span></li></a>
        <a href="javascript:void(0);" onclick="get_review_page('<?php echo $total; ?>');"><li class="col-md-1 col-sm-1 col-xs-1 "><span class="fa fa-angle-double-right"></span></li></a>
      <?php } else { ?>
        <li class="col-md-1 col-sm-1 col-xs-1  li-empty"></li>
        <li class="col-md-1 col-sm-1 col-xs-1  li-empty"></li>
      <?php }?>
      <li class="col-md-1 col-sm-1 col-xs-1 li-empty"></li>
      <li class="col-md-1 col-sm-1 col-xs-1 li-empty"></li>
      <li class="col-md-1 col-sm-1 col-xs-1 li-empty"></li>
    </ul>
  </div>
  <div class="col-md-4 col-sm-4 col-xs-4">
  </div>
</div>
<div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding-top: 50px;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="display: block">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="width: 5%"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">리뷰보기</h4>
      </div>
      <div class="modal-body">
        <div class="review-star">
          <a href="javascript:void(0);">
            <span id="review-score-1">
              <img src="<?php echo base_url().'uploads/icon/icon12_star.png'; ?>"/>
            </span>
          </a>
          <a href="javascript:void(0);">
            <span id="review-score-2">
              <img src="<?php echo base_url().'uploads/icon/icon12_star.png'; ?>"/>
            </span>
          </a>
          <a href="javascript:void(0);">
            <span id="review-score-3">
              <img src="<?php echo base_url().'uploads/icon/icon12_star.png'; ?>"/>
            </span>
          </a>
          <a href="javascript:void(0);">
            <span id="review-score-4">
              <img src="<?php echo base_url().'uploads/icon/icon12_star.png'; ?>"/>
            </span>
          </a>
          <a href="javascript:void(0);">
            <span id="review-score-5">
              <img src="<?php echo base_url().'uploads/icon/icon12_star.png'; ?>"/>
            </span>
          </a>
        </div>
        <div class="review-body">
          <div class="review-body-title" style="width: 100%; font-size: 18px; font-weight: 400; padding-bottom: 10px">
            리뷰
          </div>
          <div class="review-body-pre" id="review-body-pre">
            <!-- review body pre -->
          </div>
        </div>
        <div class="review-img">
          <div class="review-img-title" style="width: 100%; font-size: 18px; font-weight: 400; padding-bottom: 10px">
            사진
          </div>
          <div class="review-img-1">
            <img id="review-img-1" src="<?php echo base_url().'uploads/icon/icon12_star.png'; ?>" style="width: 100%;"/>
          </div>
          <div class="review-img-2">
            <img id="review-img-2" src="<?php echo base_url().'uploads/icon/icon12_star.png'; ?>" style="width: 100%;"/>
          </div>
          <div class="review-img-3">
            <img id="review-img-3" src="<?php echo base_url().'uploads/icon/icon12_star.png'; ?>" style="width: 100%;"/>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="display: block">
<!--        <button type="button" class="btn btn-danger btn-theme-sm" data-dismiss="modal" onclick="clear_review();"-->
<!--        style="width: 20%;">취소</button>-->
        <button type="button" class="btn btn-theme btn-theme-sm" style="width: 20%; background-color: black; color: white; text-transform: none; font-weight: 400;"
                onclick="close_review();">확인</button>
      </div>
    </div>
  </div>
</div>
<script>

  let page = <?php echo $page; ?>;
  let item_name = '<?php echo $item_name; ?>';

  function close_review() {
    $('#reviewModal').modal('hide');
  }

  function put_review_score(score) {
    review_score = score;
  
    let i = 1;
    for (; i <= score; i++) {
      $('#review-score-'+i).html('');
      $('#review-score-'+i).append("<img src='<?php echo base_url().'uploads/icon/icon13_star.png'; ?>'/>");
    }
    for (; i <= 5; i++) {
      $('#review-score-'+i).html('');
      $('#review-score-'+i).append("<img src='<?php echo base_url().'uploads/icon/icon12_star.png'; ?>'/>");
    }
  }
  
  function get_review(rid) {
    let modal = $('#reviewModal');
  
    // console.log('rid: ' + rid);
    
    $('#loading_set').show();
  
    $.ajax({
      url: '<?php echo base_url(); ?>shop/product/review/get?rid=' + rid,
      type: 'GET', // form submit method get/post
      cache: false,
      contentType: 'application/json',
      processData: false,
      success: function (res) {
         $("#loading_set").fadeOut(500);
         // console.log(res);
         let review = JSON.parse(res);
         // console.log(review);
         // console.log(review.review_score);
         // console.log(review.review_body);
         // console.log(review.review_file_cnt);
         // console.log(review.review_img_url_1);
         // console.log(review.review_img_url_2);
         // console.log(review.review_img_url_3);
         // console.log(review.review_at);
   
         put_review_score(review.review_score);
         $('#review-body-pre').html('<pre>' + review.review_body + '</pre>');
         
         $('#review-img-1').attr('src', review.review_img_url_1);
         $('#review-img-2').attr('src', review.review_img_url_2);
         $('#review-img-3').attr('src', review.review_img_url_3);
        
         if (review.review_file_cnt > 0) {
           for (let i = 1; i <= review.review_file_cnt; i++) {
             $('.review-img-' + i).show();
           }
           for (let i = review.review_file_cnt + 1; i <= <?php echo SHOP_PRODUCT_REVIEW_IMAGE_COUNT_MAX; ?>; i++) {
             $('.review-img-' + i).hide();
           }
         } else {
           $('.review-img').hide();
         }
  
         modal.modal('show');
         modal.appendTo('body');
    
       },
       error: function (e) {
         console.log(e);
       }
     });
    
  }
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

    // console.log(item_name);

    $(".product-content").html(loading_set);
    $(".product-content").load(
      encodeURI(
        "<?php echo base_url();?>shop/product/review?page=1&item_name=" + item_name
      )
    );
  }
</script>
