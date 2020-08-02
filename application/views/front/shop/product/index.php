<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

<style>
  /*#qna-body {*/
  /*  -webkit-writing-mode: horizontal-tb;*/
  /*  text-rendering: auto;*/
  /*  letter-spacing: normal;*/
  /*  word-spacing: normal;*/
  /*  text-transform: none;*/
  /*  text-indent: 0px;*/
  /*  text-shadow: none;*/
  /*  display: inline-block;*/
  /*  text-align: start;*/
  /*  appearance: textarea;*/
  /*  -webkit-rtl-ordering:  logical;*/
  /*  -webkit-flex-direction: column;*/
  /*  resize: auto;*/
  /*  cursor: text;*/
  /*  white-space: pre-wrap;*/
  /*  overflow-wrap: break-word;*/
  /*}*/
  .page-section {
    background-color: white;
    padding-top: 0 !important;
    padding-bottom: 0 !important;
    margin-bottom: 55px;
  }
  .product-content {
    padding: 0 0 10px 0 !important;
  }
  .review-images, .item-images, .item-content-desc, .item-content-noti, .item-option-row, .item-price, .item-price-bold {
    padding: 0;
  }
  .review-images {
    padding-left: 10px;
    padding-right: 10px;
  }
  .brand-name {
    padding-left: 15px;
    padding-right: 15px;
    margin: 0 !important;
    color: saddlebrown;
  }
  .item-base-info {
    margin: 0 !important;
  }
  .item-name, .item-name h4 {
    margin: 0 0 0 0 !important;
  }
  .review-images, .item-images {
    width: 100%;
  }
  .review-images, .item-image, .review-image img, .item-image img {
    width: 100%;
  }
  .review-images .slick-track {
    width: 100% !important;
    display: flex !important;
  }
  .review-image {
    width: 33.3% !important;
    margin: 3px !important;
  }
  .review-image {
    width: 100%;
  }
  .review-image .slider-img {
    width: 30vw !important;
    height: 30vw !important;
  }
  .slick-track {
    margin: 0;
  }
  .slick-list {
    padding: 0 !important;
    margin: 0 !important;
  }
  .slick-dotted.slick-slider {
    margin-bottom: 0;
  }
  .slick-dots {
    top: 85%;
    overflow: hidden;
  }
  .slick-dots li {
    margin: 0 0;
  }
  .slick-dots li button:before {
    color: white;
    font-size: 12px;
  }
  .slick-dots li.slick-active button:before {
    color: white !important;
  }
  .item-like img, .item-share img {
    width: 15px;
    height: 15px;
    margin-right: 15px;
  }
  .item_name, .item-base-info, .item-meta-info {
    font-size: 14px;
    height: auto;
  }
  .product-content > div {
    padding-bottom: 10px;
  }
  .item-option-row {
    margin-bottom: 10px !important;
  }
  .item-purchase-cnt, .item-option, .item-option-row {
    /*display: flex;*/
    padding-left: 0 !important;
    padding-right: 0 !important;
  }
  .item-purchase-cnt-header, .item-option-header {
    width: 20%;
    text-align: right;
    line-height: 40px;
  }
  .item-purchase-cnt-select, .item-option-select {
    width: 100%;
  }
  .item-meta-info table {
    width: 100%;
  }
  .item-meta-info th {
    /*text-align: center;*/
    width: 25%;
    padding: 10px 5px;
  }
  .item-meta-info td {
    width: 75%;
    padding: 10px 5px;
  }
  .item-meta-info tr {
    font-size: 10px;
  }
  .item-nav-tab {
    display: flex;
    height: 40px;
    width: 100%;
    padding: 0;
  }
  .item-nav-tab a {
    height: 40px;
    width: 25%;
  }
  .item-nav-tab a div {
    width: 100%;
    /*border: 1px solid #EAEAEA;*/
    height: 40px;
    line-height: 40px;
    text-align: center;
    background-color: white;
    color: #BDBDBD;
    font-weight: 400;
  }
  .item-nav-tab a div:hover {
    color: #353535;
    border-bottom: 1px solid #353535;
  }
  .item-nav-tab a div.active {
    color: #353535;
    border-bottom: 1px solid #353535;
  }
  .item-nav-tab.sticky {
    position: fixed;
    top: 40px;
    width: 100%;
    z-index: 100;
  }
  .item-content-info, .item-content-review, .item-content-question, .item-content-shipping {
    display: none;
  }
  .item-content-desc div {
    margin: 0 auto !important;
  }
  .item-content-desc img, .item-content-desc iframe {
    width: 100% !important;
    display: block !important;
    margin: 0 auto !important;
  }
  .item-content-noti th, .item-content-shipping th {
    width: 30%;
    text-align: left;
  }
  .item-content-noti th, .item-content-noti td, .item-content-shipping th, .item-content-shipping td {
    padding: 10px;
    font-size: 10px;
  }
  .item-cart-btn {
    width: 100%;
    background-color: black;
    height: 50px;
    bottom: 0;
    z-index: 100;
    position: fixed;
  }
  .item-cart-btn a h6 {
    font-size: 18px;
    text-align: center;
    line-height: 50px;
    color: white;
    margin: 0;
  }
  .review-star, .item-review-star {
    height: 60px;
  }
  .review-star, .item-review-star {
    text-align: center;
  }
  .review-star span img, .item-review-star span img {
    width: 40px;
    height: 40px;
  }
  .item-price {
    font-size: 12px;
    height: 15px;
    line-height: 15px;
    margin-bottom: 0 !important;
  }
  .item-price-bold {
    font-size: 17px;
    font-weight: 700;
    height: 20px;
    line-height: 20px;
    margin-bottom: 0 !important;
  }
  .product-balance {
    width: 100%;
    padding: 10px 15px;
  }
  .product-balance table {
    margin: 0;
    width: 100%;
  }
  .product-balance table tr th {
    width: 20%;
  }
  .product-balance table tr td {
    width: 80%;
    text-align: right;
    font-size: 20px;
  }
  .modal-body .product-content {
    border-bottom: 1px solid #353535;
  }
  .item-content-question {
    padding: 10px 0;
  }
  .item-question-btn {
    /*width: 100%;*/
    height: 40px;
    margin: 10px 20px;
  }
  .item-question-btn a h6 {
    width: 100%;
    height: 40px;
    line-height: 40px;
    font-size: 14px;
    text-align: center;
    background-color: #B39E98;
    color: white;
    margin: 0;
  }
  .item-content-qna-ul {
    width: 100%;
    padding: 10px 0;
  }
  .item-content-qna-ul ul {
    margin: 0;
  }
  .item-content-qna-ul ul li:first-child {
    border-top: 1px solid #EAEAEA;
  }
  .item-content-qna-ul ul li {
    border-bottom: 1px solid #EAEAEA;
    padding: 10px;
  }
  .item-content-qna-qes {
    padding: 10px;
  }
  .item-content-qna-reply {
    padding: 10px;
    border-top: 1px solid #EAEAEA;
  }
  .qna-body {
    padding: 10px;
  }
  .review-body, .qna-reply {
    padding: 20px;
    border: 1px solid #EAEAEA;
    border-radius: 4px;
  }
  .review-body pre, .qna-body pre, .qna-reply pre {
    padding: 5px 0;
    margin: 0;
    font-size: 12px;
    background-color: white;
    border: none;
  }
  .qna-title {
    margin 5px 0;
    font-size: 12px;
  }
  .qna-replied {
    font-size:10px;
    margin: 0 5px;
    padding: 2px 5px;
    color: white;
    background-color: black;
    border: 1px solid #EAEAEA;
  }

  #review_more, #qna_view_more {
    text-align: center;
    height: 60px;
    padding: 10px 0;
    display: none;
  }
  #review_more a, #qna_view_more a {
    font-family: 'Quicksand' !important;
    font-size: 15px;
    color: gray;
    background-color: inherit;
    border: 1px solid #d3d3d3;
    line-height: 40px;
    padding: 0 10px;
  }
  .item-review-on {
    border-bottom: 1px solid #EAEAEA;
  }
  .item-review-on, .item-review-star {
    padding-top: 10px;
    padding-bottom: 10px;
  }
  .btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    width: 25%;
    height: 25%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: 0;
    background: white;
    cursor: inherit;
    display: block;
  }
  .btn-file.btn-default {
    color: #C5C5C5;
    background-color: white;
    border-color: #C5C5C5;
    width: 100%;
    height: 28vw;
    line-height: 28vw;
    font-size: 30px;
    margin: auto;
    padding: 0;
  }
  .item-content-review {
    padding: 0 !important;
  }
  .item-content-review-ul {
    width: 100%;
    padding: 10px 0;
  }
  .item-content-review-ul ul {
    margin: 0;
  }
  .item-content-review-ul ul li:first-child {
    border-top: 1px solid #EAEAEA;
  }
  .item-content-review-ul ul li {
    border-bottom: 1px solid #EAEAEA;
    padding: 10px;
  }
</style>
<section class="page-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 product-content">
        <div class="col-md-12 item-images">
          <?php
            for ($i = 0; $i < $product->item_image_count; $i++) {
            ?>
            <div class="item-image">
              <img class="slider-img" src="<?php echo $product->{'item_image_url_'.$i}; ?>" alt="">
            </div>
          <?php } ?>
        </div>
        <div class="col-md-12 brand-name">
          <?php echo $product->brand_name; ?>
        </div>
        <div class="col-md-12 item-name">
          <h4><?php echo $product->item_name; ?></h4>
        </div>
        <div class="col-md-12 item-base-info">
          <?php echo $product->item_base_info; ?>
        </div>
        <div class="col-md-12 item-meta-info">
          <?php if ($product->item_discount_rate == 0) { ?>
            <div class="col-md-12 item-price-bold">
              <?php echo $this->crud_model->get_price_str($product->item_sell_price); ?>원
              <span class="pull-right item-like">
                <?php echo $this->crud_model->sns_func_html('like', 'product', $liked, $product->product_id, 20, 20); ?>
              </span>
            </div>
            <div class="col-md-12 item-price">
            </div>
          <?php } else { ?>
            <div class="col-md-12 item-price" style="color: grey">
              <?php echo $this->crud_model->get_price_str($product->item_general_price); ?>원
            </div>
            <div class="col-md-12 item-price-bold" style="color: #FF6633">
              <?php echo $product->item_discount_rate.'% '.$this->crud_model->get_price_str($product->item_sell_price); ?>원
              <span class="pull-right item-like">
                <?php echo $this->crud_model->sns_func_html('like', 'product', $liked, $product->product_id, 20, 20); ?>
              </span>
            </div>
          <?php } ?>
        </div>
        <div class="col-md-12 item-meta-info">
          <table>
            <tbody>
            <tr>
              <th>배송정보</th>
              <td>
                <?php if ($shop_shipping->free_shipping) {?>
                  무료배송
                <?php } else {?>
                  배송비 - <?php  echo $this->crud_model->get_price_str($shop_shipping->free_shipping_cond_price); ?>원<br>
                  해당 제품 <?php echo $this->crud_model->get_price_str($shop_shipping->free_shipping_total_price); ?>원 이상 구매시 무료배송
                <?php }?>
              </td>
            </tr>
            <tr>
              <th>브랜드공지</th>
              <td><?php echo $brand_info->brand_text; ?></td>
            </tr>
            </tbody>
          </table>
        </div>
        <div class="col-md-12 item-nav-tab" id="item-nav-tab">
          <a href="javascript:void(0);" onclick="change_item_nav_tab($(this))" data-target="info">
            <div class="col-md-3 item-nav-info">
              상품설명
            </div>
          </a>
          <a href="javascript:void(0);" onclick="change_item_nav_tab($(this))" data-target="review">
            <div class="col-md-3 item-nav-review">
              리뷰(<?php echo $product->review; ?>)
            </div>
          </a>
          <a href="javascript:void(0);" onclick="change_item_nav_tab($(this))" data-target="question">
            <div class="col-md-3 item-nav-question">
              상품문의(<?php echo $product->qna; ?>)
            </div>
          </a>
          <a href="javascript:void(0);" onclick="change_item_nav_tab($(this))" data-target="shipping">
            <div class="col-md-3 item-nav-shipping">
              배송/환불
            </div>
          </a>
        </div>
        <div class="col-md-12 item-content-info">
          <div class="col-md-12 item-content-desc">
            <?php echo $product->item_desc; ?>
          </div>
          <div class="col-md-12 item-content-noti">
            <?php if ($product->item_noti_info_need || $product->item_cert_need) { ?>
              <table border="1" bordercolor="#EAEAEA">
                <tbody>
                <?php if ($product->item_noti_info_need) { ?>
                  <tr>
                    <th>상품고시정보</th>
                    <td id="item-content-noti"><?php echo $product->item_noti_info; ?></td>
                  </tr>
                <?php } ?>
                <?php if ($product->item_cert_need) { ?>
                  <tr>
                    <th>KC인증번호</th>
                    <td><?php echo $product->item_kc_cert_number; ?></td>
                  </tr>
                  <tr>
                    <th>제품명</th>
                    <td><?php echo $product->item_cert_name; ?></td>
                  </tr>
                  <tr>
                    <th>모델명</th>
                    <td><?php echo $product->item_model_name; ?></td>
                  </tr>
                  <tr>
                    <th>제조업자명</th>
                    <td><?php echo $product->item_manufacturer_name; ?></td>
                  </tr>
                  <tr>
                    <th>수입업자명</th>
                    <td><?php echo $product->item_importer_name; ?></td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            <?php } ?>
          </div>
        </div>
        <div class="col-md-12 item-content-review">
          <div class="col-md-12 item-review-on">
            평점(<?php echo $review_score_i.'.'.$review_score_f; ?>)
            <a href="javascript:void(0);" onclick="open_review()"><span class="pull-right"><u>리뷰쓰기</u></span></a>
          </div>
          <div class="col-md-12 item-review-star">
            <?php $i = 0; for (; $i < $review_score_i; $i++) { ?>
              <span><img src="<?php echo base_url().'uploads/icon/icon13_star.png'; ?>"/></span>
            <?php }
            if ($review_score_i < 5)  {
              if ($review_score_f <=2) { ?>
                <span><img src="<?php echo base_url().'uploads/icon/icon12_star.png'; ?>"/></span>
              <?php } else if ($review_score_f <= 8) { ?>
                <span><img src="<?php echo base_url().'uploads/icon/icon14_star half.png'; ?>"/></span>
              <?php } else { ?>
                <span><img src="<?php echo base_url().'uploads/icon/icon13_star.png'; ?>"/></span>
              <?php }
              $i++;
            }
            for (; $i < 5; $i++) { ?>
              <span><img src="<?php echo base_url().'uploads/icon/icon12_star.png'; ?>"/></span>
            <?php
            }?>
          </div>
          <?php if (count($review_images) > 0) { ?>
            <div class="review-images">
              <?php foreach ($review_images as $review_image) {?>
                <div class="review-image">
                  <img class="slider-img" src="<?php echo $review_image->url; ?>" alt="">
                </div>
              <?php }?>
            </div>
          <?php }?>
          <div class="col-md-12 item-content-review-ul">
            <ul>
              <!-- review list -->
            </ul>
          </div>
          <div id="review_more">
            <a class="btn btn-lg btn-primary" href="javascript:void(0)" onclick="ajax_review_list();" role="button">
              view more
            </a>
          </div>
        </div>
        <div class="col-md-12 item-content-question">
          <div class="col-md-12 item-question-btn">
            <a href="javascript:void(0);" onclick="open_qna()"><h6>상품문의작성</h6></a>
          </div>
          <div class="col-md-12 item-content-qna-ul">
            <ul>
              <!-- qna list -->
            </ul>
          </div>
          <div id="qna_view_more">
            <a class="btn btn-lg btn-primary" href="javascript:void(0)" onclick="ajax_qna_list();" role="button">
              view more
            </a>
          </div>
        </div>
        <div class="col-md-12 item-content-shipping">
          <table border="1" bordercolor="#EAEAEA">
            <tbody>
<!--            <tr>-->
<!--              <th>배송정보</th>-->
<!--              <td>브랜드 업체발송은, 각 브랜드에서 개별적으로 상품이 발송되며 배송 소요일자 및 배송료는 각 브랜드 별 배송 정책에 따라 달라집니다.</td>-->
<!--            </tr>-->

            <tr>
              <th>배송정보</th>
              <td>
                모든 상품은 입금 확인후 출고되며, 주문 후 7일 이내 입금이 되지 않을 시 자동 취소됩니다.<br>
                배송지역 : 전국지역. 산간 도서지방은 주문금액에 상관없이 별도의 배송비가 추가.<br>
                배송기간 : 2~7일 소요<br>
                배송지연/리오더 상품의 경우 해당상품의 배송날짜를 참고 및 공지사항 확인
              </td>
            </tr>
            <tr>
              <th>교환/환불정책</th>
              <td>
                상품 수령일로부터 7일 이내 반품 / 환불 가능합니다.<br>
                단순변심 반품의 경우 왕복배송비를 차감한 금액이 환불되며, 상품 불량인 경우는 배송비를 포함한 전액이 환불됩니다.<br>
                포장을 개봉하였으나 포장이 훼손되어 상품가치가 현저히 상실된 경우 반품 / 환불이 불가합니다.<br>
                출고 이후 환불요청 시 상품 회수 후 처리됩니다.<br>
                주문제작상품 / 밀봉포장상품 등은 변심에 따른 반품 / 환불이 불가합니다.<br>
                일부 완제품으로 수입된 상품의 경우 A/S가 불가합니다.<br>
                특정브랜드의 상품설명에 별도로 기입된 교환/환불/AS기준이 우선합니다.<br>
                구매자가 미성년자인 경우에는 상품 구입 시 법정대리인이 동의하지 아니하면 미성년자 본인 또는 법정대리인이 구매취소 할 수 있습니다.
              </td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-md-12 item-cart-btn" id="item-cart-btn">
        <a href="javascript:void(0)" onclick="add_opt()">
          <h6 class="font-futura">BUY NOW</h6>
        </a>
      </div>
    </div>
  </div>
</section>
<!-- Modal For C-C Post confirm -->
<div class="modal fade" id="itemOptModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">장바구니 담기</h4>
      </div>
      <div class="modal-body">
        <div class="text-center product-content" style="text-align: left">
          <div class="col-md-12 brand-name">
            <?php echo $product->brand_name; ?>
          </div>
          <div class="col-md-12 item-name">
            <h4><?php echo $product->item_name; ?></h4>
          </div>
          <div class="col-md-12 item-base-info">
            <?php echo $product->item_base_info; ?>
          </div>
          <div class="col-md-12 item-meta-info">
            <?php if ($product->item_discount_rate == 0) { ?>
              <div class="col-md-12 item-price-bold">
                <?php echo $this->crud_model->get_price_str($product->item_sell_price); ?>원
              </div>
              <div class="col-md-12 item-price">
              </div>
            <?php } else { ?>
              <div class="col-md-12 item-price" style="color: grey">
                <?php echo $this->crud_model->get_price_str($product->item_general_price); ?>원
              </div>
              <div class="col-md-12 item-price-bold" style="color: #FF6633">
                <?php echo $product->item_discount_rate.'% '.$this->crud_model->get_price_str($product->item_sell_price); ?>원
              </div>
            <?php } ?>
          </div>
          <div class="col-md-12 item-option">
            <?php if ($product->item_option_requires_cnt > 0) {
              $options = json_decode($product->item_option_requires);
              foreach ($options as $option) {
                ?>
                <div class="col-md-12 item-option-row">
                  <!--                    <div class="col-md-4 item-option-header">-->
                  <!--                      옵션-->
                  <!--                    </div>-->
                  <div class="col-md-12 item-option-select">
                    <select class="form-control" onchange="change_balance()" data-role="require" data-id="<?php echo $option->idx;?>" data-target="<?php echo $option->item_option_name; ?>">
                      <option value="-1" data-action="no" data-target="0" selected><?php echo $option->item_option_name; ?>(필수)</option>
                      <?php foreach ($option->item_option_vals as $val) { ?>
                        <option value="<?php echo $val->idx; ?>" data-action="<?php echo $val->price ? 'add' : 'no'; ?>"
                                data-target="<?php echo $val->price; ?>"><?php echo $val->value; ?><?php if ($val->price > 0) echo "(+{$val->price})"; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              <?php }
            }
            ?>
            <?php if ($product->item_option_others_cnt > 0) {
              $options = json_decode($product->item_option_others);
              foreach ($options as $option) {
                ?>
                <div class="col-md-12 item-option-row">
                  <!--                    <div class="col-md-4 item-option-header">-->
                  <!--                      옵션-->
                  <!--                    </div>-->
                  <div class="col-md-12 item-option-select">
                    <select class="form-control" onchange="change_balance()" data-role="others" data-id="<?php echo $option->idx;?>" data-target="<?php echo $option->item_option_name; ?>">
                      <option value="-1" data-action="no" data-target="0" selected><?php echo $option->item_option_name; ?></option>
                      <?php foreach ($option->item_option_vals as $val) { ?>
                        <option value="<?php echo $val->idx; ?>" data-action="<?php echo $val->price ? 'add' : 'no'; ?>"
                                data-target="<?php echo $val->price; ?>"><?php echo $val->value; ?><?php if ($val->price > 0) echo "(+{$val->price})"; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              <?php }
            }
            ?>
            <div class="col-md-12 item-purchase-cnt">
              <!--            <div class="col-md-4 item-purchase-cnt-header">-->
              <!--              수량-->
              <!--            </div>-->
              <div class="col-md-12 item-purchase-cnt-select">
                <select class="form-control" onchange="change_balance()">
                  <option value="0">수량</option>
                  <?php for ($i = 1; $i <= $product->purchase_max_cnt; $i++) { ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="product-balance">
          <table>
            <tbody>
            <tr>
              <th>주문상품수</th>
              <td id="total-purchase-cnt">0개</td>
            </tr>
            <tr>
              <th>주문금액</th>
              <td id="total-price">0원</td>
            </tr>
            <tr>
              <th>추가금액</th>
              <td id="total-additional-price">0원</td>
            </tr>
            <tr>
              <th>배송비</th>
              <td id="total-shipping-fee">0원</td>
            </tr>
            <tr>
              <th>결제금액</th>
              <td id="total-balance">0원</td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-theme-sm" data-dismiss="modal">취소</button>
        <button type="button" class="btn btn-theme btn-theme-sm" onclick="add_cart()" style="text-transform: none; font-weight: 400;">확인</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="addCartModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">장바구니</h4>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <div>상품이 장바구니에 담겼습니다
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-theme-sm" data-dismiss="modal" onclick="go_cart()">장바구니로 가기</button>
        <button type="button" class="btn btn-theme btn-theme-sm" onclick="go_shop()" style="text-transform: none; font-weight: 400;">계속 쇼핑하기</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="qnaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">상품문의</h4>
      </div>
      <div class="modal-body">
        <div class="qna-title">
          <label style="width: 100%; font-size: 14px">
            제목
            <input type="text" class="form-control" id="qna-title" name="qna_title">
          </label>
        </div>
        <div class="qna-body-modal">
          <label style="width: 100%; font-size: 14px">
            문의할 내용을 입력해주세요.
            <textarea rows="10" data-height="500" name='qna_body' id='qna-body' class="form-control" wrap="hard"></textarea>
          </label>
        </div>
        <div class="qna-checkbox">
          <label style="width: 100%; font-size: 14px">
            <input type="checkbox" class="form-checkbox" id="qna-private" onchange="check_private()" name="qna_private">
            비공개
          </label>
        </div>
        <div class="qna-pw" style="display: none;">
          <label style="width: 100%; font-size: 14px">
             비밀번호<span style="color:grey">(숫자 4자리)</span>
            <input type="password" class="form-control" id="qna-pw" name="qna_pw" maxlength="4">
          </label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-theme-sm" data-dismiss="modal" onclick="clear_qna();">취소</button>
        <button type="button" class="btn btn-theme btn-theme-sm"style="text-transform: none; font-weight: 400;" onclick="submit_qna();">확인</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="qnaPwModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">비밀번호</h4>
      </div>
      <div class="modal-body">
        <div class="qna-pw">
          <label style="width: 100%; font-size: 14px">
            비밀번호<span style="color:grey">(숫자 4자리)</span>
            <input type="password" class="form-control" id="qna-reply-pw" name="qna_pw" maxlength="4">
          </label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-theme-sm" data-dismiss="modal" onclick="clear_qna();">취소</button>
        <button type="button" class="btn btn-theme btn-theme-sm"style="text-transform: none; font-weight: 400;" onclick="get_reply(null, 0);">확인</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">리뷰쓰기</h4>
      </div>
      <div class="modal-body">
        <div class="review-star">
          <a href="javascript:void(0);" onclick="put_review_score(1)">
            <span id="review-score-1">
              <img src="<?php echo base_url().'uploads/icon/icon12_star.png'; ?>"/>
            </span>
          </a>
          <a href="javascript:void(0);" onclick="put_review_score(2)">
            <span id="review-score-2">
              <img src="<?php echo base_url().'uploads/icon/icon12_star.png'; ?>"/>
            </span>
          </a>
          <a href="javascript:void(0);" onclick="put_review_score(3)">
            <span id="review-score-3">
              <img src="<?php echo base_url().'uploads/icon/icon12_star.png'; ?>"/>
            </span>
          </a>
          <a href="javascript:void(0);" onclick="put_review_score(4)">
            <span id="review-score-4">
              <img src="<?php echo base_url().'uploads/icon/icon12_star.png'; ?>"/>
            </span>
          </a>
          <a href="javascript:void(0);" onclick="put_review_score(5)">
            <span id="review-score-5">
              <img src="<?php echo base_url().'uploads/icon/icon12_star.png'; ?>"/>
            </span>
          </a>
        </div>
        <div class="review-img" style="padding: 10px 0">
          <div class="review-img-title" style="width: 100%; font-size: 14px; font-weight: 400">
            사진업로드(최대3장)
          </div>
          <div style="display: flex">
            <div class="review-img-file" style="width:28vw; margin: auto">
              <span class="pull-left btn btn-default btn-file" id="preview-img-1" data-id="1" onclick="open_review_file(this);">+</span>
            </div>
            <div class="review-img-file" style="width:28vw; margin: auto">
              <span class="pull-left btn btn-default btn-file" id="preview-img-2" data-id="2" onclick="open_review_file(this);">+</span>
            </div>
            <div class="review-img-file" style="width:28vw; margin: auto">
              <span class="pull-left btn btn-default btn-file" id="preview-img-3" data-id="3" onclick="open_review_file(this);">+</span>
            </div>
          </div>
        </div>
        <div class="review-body-modal">
          <label style="width: 100%; font-size: 14px; font-weight: 400">
            리뷰
            <textarea rows="10" data-height="500" name='review_body' id='review-body' class="form-control" wrap="hard"></textarea>
          </label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-theme-sm" data-dismiss="modal" onclick="clear_review();">취소</button>
        <button type="button" class="btn btn-theme btn-theme-sm"style="text-transform: none; font-weight: 400;" onclick="submit_review();">확인</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript">
  var item_navbar;
  var item_sticky;

  window.onscroll = function() {
    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop;

    // console.log('sticky : ' + sticky + ', pageYOffset : ' + window.pageYOffset);
    // console.log('item_sticky : ' + item_sticky + ', pageYOffset : ' + window.pageYOffset);

    if (window.pageYOffset > sticky) {
      navbar.classList.add("navigation-sticky");
    } else {
      navbar.classList.remove("navigation-sticky");
    }
    if (window.pageYOffset > item_sticky) {
      item_navbar.classList.add("sticky");
    } else {
      item_navbar.classList.remove("sticky");
    }
  }

  function move(id) {
    var offset = $(id).offset();
    offset.top = offset.top - 110;
    // console.log(offset);
    $('html, body').animate({scrollTop : offset.top}, 100);
  }

  function change_item_nav_tab(elem) {
    var target = elem.data('target');
    // console.log(target);
    $('.item-nav-tab').find('.active').removeClass('active');
    $('.item-nav-'+target).addClass('active');

    $('.item-content-info').hide();
    $('.item-content-review').hide();
    $('.item-content-question').hide();
    $('.item-content-shipping').hide();
    $('.item-content-'+target).show();
    move('.item-content-'+target);
    if (target === 'question' && qna_page === 0) {
      ajax_qna_list();
    }
    if (target === 'review' && review_page === 0) {
      ajax_review_list();
    }
  }

  // function url_copy_to_clipboard() {
  //   window.clipboardData.setData('Text', location.href);
  //   alert("클립보드로 URL이 복사되었습니다.");
  // }

  // // Save a current position in global
  // window.__scrollPosition = document.documentElement.scrollTop || 0;
  // document.addEventListener('scroll', function() {
  //   let _documentY = document.documentElement.scrollTop;
  //   let _direction = _documentY - window.__scrollPosition >= 0 ? 1 : -1;
  //   // console.log(_direction); // 콘솔창에 스크롤 방향을 출력
  //
  //   if (_direction > 0) {
  //     $('#item-cart-btn').show();
  //   } else {
  //     $('#item-cart-btn').hide();
  //   }
  //
  //   window.__scrollPosition = _documentY; // Update scrollY
  // });

  function init_item_sticky() {
    item_navbar = document.getElementById("item-nav-tab");
    item_sticky = item_navbar.offsetTop;
    // console.log(item_sticky);
  }

  function go_cart() {
    window.location.href = '<?php echo base_url(); ?>home/shop/cart';
  }
  function go_shop() {
    window.location.href = '<?php echo base_url(); ?>home/shop/main';
  }

  function add_opt() {
    $('#itemOptModal').modal('show');
  }

  let product_id = <?php echo $product->product_id; ?>;
  let item_sell_price = <?php echo $product->item_sell_price; ?>;
  let total_purchase_cnt = 0;
  let total_price = 0;
  let free_shipping = <?php echo $shop_shipping->free_shipping == 1 ? 'true' : 'false'; ?>;
  let free_shipping_total_price = <?php echo $shop_shipping->free_shipping_total_price; ?>;
  let free_shipping_cond_price = <?php echo $shop_shipping->free_shipping_cond_price; ?>;
  let bundle_shipping_cnt = <?php echo $product->bundle_shipping_cnt; ?>;
  let total_shipping_fee = 0;
  let total_additional_price = 0;
  let total_balance = 0;
  let item_option_requires_cnt = <?php echo $product->item_option_requires_cnt; ?>;
  let item_option_others_cnt = <?php echo $product->item_option_others_cnt; ?>;
  let item_option_requires = Array();
  let item_option_others = Array();
  let item_tax = <?php echo $product->item_tax; ?>;
  let item_margin = <?php echo $product->item_margin; ?>;
  let item_supply_price = <?php echo $product->item_supply_price; ?>;


  function init_options() {
    $.each($('.item-option').find('.item-option-row'), function(idx, opt) {
      let select = $(opt).find('select');
      let require = select.data('role') === 'require';
      let index = select.data('id');
      let opt_name = select.data('target');
      let opt_selected = select.find('option:selected');
      let val = opt_selected.val();
      let price = opt_selected.data('target');
      let option = opt_selected.text();

      // console.log(opt_selected);

      if (require === true) {
        item_option_requires[index] = Object();
        item_option_requires[index].name = opt_name;
        item_option_requires[index].val = val;
        item_option_requires[index].price = price;
        item_option_requires[index].option = option;
      } else {
        item_option_others[index] = Object();
        item_option_others[index].name = opt_name;
        item_option_others[index].val = val;
        item_option_others[index].price = price;
        item_option_others[index].option = option;
      }
    });

    // console.log(item_option_requires);
    // console.log(item_option_others);
  }

  function add_cart() {
    let shop_id = <?php echo $product->shop_id; ?>;

    for (let i = 0; i < item_option_requires_cnt; i++) {
      if (item_option_requires[i].val === -1) {
        alert('필수 옵션을 선택해 주세요');
        return false;
      }
    }

    if (total_purchase_cnt === 0) {
      alert('수량을 선택해 주세요');
      return false;
    }

    // console.log(product_id);
    // console.log(total_purchase_cnt);
    // console.log(total_price);
    // console.log(total_shipping_fee);
    // console.log(total_additional_price);
    // console.log(total_balance);
    // console.log(item_option_requires);
    // console.log(item_option_others);

    let formData = new FormData();
    formData.append('product_id', product_id);
    formData.append('shop_id', shop_id);
    formData.append('item_general_price', <?php echo $product->item_general_price; ?>);
    formData.append('item_sell_price', item_sell_price);
    formData.append('item_discount_rate', <?php echo $product->item_discount_rate; ?>);
    formData.append('free_shipping', (free_shipping === true ? '1' : '0'));
    formData.append('free_shipping_total_price', free_shipping_total_price);
    formData.append('free_shipping_cond_price', free_shipping_cond_price);
    formData.append('bundle_shipping_cnt', bundle_shipping_cnt);
    formData.append('total_purchase_cnt', total_purchase_cnt);
    formData.append('total_price', total_price);
    formData.append('total_shipping_fee', total_shipping_fee);
    formData.append('total_additional_price', total_additional_price);
    formData.append('total_balance', total_balance);
    formData.append('item_option_requires_cnt', item_option_requires_cnt);
    formData.append('item_option_others_cnt', item_option_others_cnt);
    formData.append('item_option_requires', JSON.stringify(item_option_requires));
    formData.append('item_option_others', JSON.stringify(item_option_others));
    formData.append('item_tax', item_tax);
    formData.append('item_margin', item_margin);
    formData.append('item_supply_price', item_supply_price);

    $.ajax({
      url: '<?php echo base_url(); ?>home/shop/cart/add', // form action url
      type: 'POST', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        if (data === 'done' || data.search('done') !== -1) {
          // var text = '<strong>성공하였습니다</strong>';
          // notify(text,'success','bottom','right');
          $('#itemOptModal').modal('hide');
          $('#addCartModal').modal('show');
          cart_on(true);
        } else {
          var text = '<strong>실패하였습니다</strong>' + data;
          notify(text,'warning','bottom','right');
        }
      },
      error: function (e) {
        console.log(e)
      }
    });

    return true;
  }

  function change_balance() {
    total_purchase_cnt = parseInt($('.item-purchase-cnt-select').find('option:selected').val());
    total_price = item_sell_price * total_purchase_cnt;

    // console.log(item_sell_price);
    // console.log(total_purchase_cnt);
    // console.log(total_price);
    //
    // console.log('---------------------------------');

    if (free_shipping === false && total_purchase_cnt > 0) {
      if (total_price < free_shipping_total_price) {
        total_shipping_fee = free_shipping_cond_price *
          (parseInt(total_purchase_cnt / bundle_shipping_cnt) + (total_purchase_cnt % bundle_shipping_cnt > 0 ? 1 : 0));
      }
    }

    // console.log(free_shipping);
    // console.log(free_shipping_total_price);
    // console.log(free_shipping_cond_price);
    // console.log(bundle_shipping_cnt);
    // console.log(total_shipping_fee);
    // console.log('---------------------------------');

    $.each($('.item-option').find('.item-option-row'), function(idx, opt) {
      let select = $(opt).find('select');
      let require = select.data('role') === 'require';
      let index = select.data('id');
      let opt_selected = select.find('option:selected');
      let val = opt_selected.val();
      let add = opt_selected.data('action');
      let price = opt_selected.data('target');
      let option = opt_selected.text();

      if (require === true) {
        item_option_requires[index].val = val;
        item_option_requires[index].price = price;
        item_option_requires[index].option = option;
      } else {
        item_option_others[index].val = val;
        item_option_others[index].price = price;
        item_option_others[index].option = option;
      }

      if (add === 'add') {
        total_additional_price += (price * total_purchase_cnt);
      }

      // console.log(select);
      // console.log(require);
      // console.log(id);
      // console.log(opt_selected);
      // console.log(val);
      // console.log(add);
      // console.log(add_price);
      // console.log(total_additional_price);
    });
    // console.log(item_option_requires);
    // console.log(item_option_others);
    // console.log('---------------------------------');

    total_balance = total_price + total_shipping_fee + total_additional_price;

    // console.log(total_balance);
    // console.log('---------------------------------');

    $('#total-purchase-cnt').text(total_purchase_cnt + '개');
    $('#total-price').text(get_price_str(total_price) + '원');
    $('#total-additional-price').text(get_price_str(total_additional_price) + '원');
    $('#total-shipping-fee').text(get_price_str(total_shipping_fee) + '원');
    $('#total-balance').text(get_price_str(total_balance) + '원');
  }

  let purchase_product_id = <?php echo $purchase_product_id; ?>;
  function open_review() {
    if (purchase_product_id === 0) {
      alert('구매내역이 존재하지 않습니다');
      return false;
    }

    $('#reviewModal').modal('show');
  }

  let review_score = 0;
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

  let review_img = Array();
  function preview_img(files, id) {
    let preview = $("#preview-img-"+id);
    if (files && files[0]) {
      preview.html('');
      $(files).each(function () {
        var reader = new FileReader();
        reader.readAsDataURL(this);
        reader.onload = function (e) {
          preview.append("<img src='" + e.target.result + "' style='width: 100%; height: 100%; vertical-align: unset'>");
        }
      });
    }
  }

  function open_review_file(elem) {
    let img_id = $(elem).data('id');
    let input = document.createElement("input");
    input.type = "file";
    input.name = "review_img_" + img_id;
    input.onchange = function (event) {
      preview_img(event.target.files, img_id);
      review_img[img_id-1] = event.target.files[0];
    };
    input.click();
  }

  function clear_review() {
    console.log('clear_review');
    review_score = 0;
    for (let i = 1; i <= 5; i++) {
      $('#review-score-'+i).find('img').prop('src', '<?php echo base_url(); ?>uploads/icon/icon12_star.png');
    }
    for (let i = 1; i <= 3; i++) {
      let s = $('#preview-img-' + i).closest('.review-img-file');
      console.log(s);
      s.html('');
      s.html('<span class="pull-left btn btn-default btn-file" id="preview-img-' + i + '" data-id="' + i + '" onclick="open_review_file(this);">+</span>');
      review_img[i-1] = null;
    }
    $('#review-body').val('');
  }

  function submit_review() {
    let review_body = $('#review-body').val();

    console.log(review_score);

    let review_file_cnt = 0;
    let review_files = Array();
    for (let i = 0; i < 3; i++) {
      console.log(review_img[i]);
      if (review_img[i]) {
        review_files[review_file_cnt] = review_img[i];
        review_file_cnt += 1;
      }
    }

    console.log(review_body);

    let formData = new FormData();
    formData.append('review_score', review_score);
    formData.append('review_body', review_body);
    formData.append('review_file_cnt', review_file_cnt.toString());
    for (let i = 0; i < review_file_cnt; i++) {
      formData.append('review_file_' + i, review_files[i]);
    }

    $.ajax({
      url: '<?php echo base_url(); ?>home/shop/review/register?id=' + purchase_product_id, // form action url
      type: 'POST', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        if (data === 'done' || data.search('done') !== -1) {
          var text = '<strong>성공하였습니다</strong>';
          notify(text,'success','bottom','right');
          window.location.reload(true);
        } else {
          var text = '<strong>실패하였습니다</strong>' + data;
          notify(text,'warning','bottom','right');
        }
      },
      error: function (e) {
        console.log(e)
      }
    });
  }

  let review_page = 0;
  let review_total_cnt = <?php echo $product->review; ?>;
  function ajax_review_list() {

    review_page = review_page + 1;

    $.ajax({
      url: "<?php echo base_url().'home/shop/review/list?id='; ?>" + product_id + '&page=' + review_page,
      type: 'GET', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      success: function(html) {
        // console.log(html);
        $('.item-content-review-ul ul').append(html);

        var listCnt = $(".item-content-review-ul li").length;
        if ( listCnt >= review_total_cnt) {
          $('#review_more').hide();
        } else {
          $('#review_more').show();
        }
      },
      error: function(e) {
        console.log(e)
      }
    });

    // $('#page_num').val(page);

  }

  let get_review_id = 0;
  function get_review_body(review_id) {
    // console.log(ele);
    $(".item-content-review-body").remove();

    let s = $('#review-body-'+get_review_id).find('.fa-angle-up');
    s.removeClass('fa-angle-up');
    s.addClass('fa-angle-down');

    // console.log(get_qna_id);
    // console.log(qna_id);
    if (get_review_id === review_id) {
      get_review_id = 0;
      return false;
    }

    let formData = new FormData();
    $.ajax({
      url: "<?php echo base_url().'home/shop/review/body?id='; ?>" + review_id,
      type: 'GET', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function(html) {
        // console.log(html);
        // console.log(qna_id);
        // console.log($('#qna-list-li-'+qna_id).closest('li'));
        $('#review-list-li-'+review_id).closest('li').append(html);

        s = $('#review-body-'+review_id).find('.fa-angle-down');
        // console.log(s);
        s.removeClass('fa-angle-down');
        s.addClass('fa-angle-up');

        get_review_id = review_id;
      },
      error: function(e) {
        console.log(e)
      }
    });
  }

  let qna_page = 0;
  let qna_total_cnt = <?php echo $product->qna; ?>;
  function ajax_qna_list() {

    qna_page = qna_page + 1;

    $.ajax({
      url: "<?php echo base_url().'home/shop/qna/list?id='; ?>" + product_id + '&page=' + qna_page,
      type: 'GET', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      success: function(html) {
        // console.log(html);
        $('.item-content-qna-ul ul').append(html);

        var listCnt = $(".item-content-qna-ul li").length;
        if ( listCnt >= qna_total_cnt) {
          $('#qna_view_more').hide();
        } else {
          $('#qna_view_more').show();
        }
      },
      error: function(e) {
        console.log(e)
      }
    });

    // $('#page_num').val(page);

  }

  let get_qna_id = 0;
  function get_reply(ele, qna_id) {
    // console.log(ele);
    $(".item-content-qna-reply").remove();

    let s = $('#qna-title-'+get_qna_id).find('.fa-angle-up');
    s.removeClass('fa-angle-up');
    s.addClass('fa-angle-down');

    // console.log(get_qna_id);
    // console.log(qna_id);
    if (get_qna_id === qna_id) {
      get_qna_id = 0;
      return false;
    }

    let pw = '';
    if (ele) {
      let select = $(ele);
      let is_private = select.data('private');
      // console.log(is_private);
      if (is_private === 1) {
        open_qna_pw(qna_id);
        return true;
      }
    } else {
      pw = $('#qna-reply-pw').val();
      if (check_pw(pw) === false) {
        return false;
      }
      qna_id = $('#qna-reply-pw').data('id');
      $('#qnaPwModal').modal('hide');
    }

    let formData = new FormData();
    formData.append('qna_id', qna_id);
    formData.append('qna_pw', pw);
    $.ajax({
      url: "<?php echo base_url().'home/shop/qna/reply?id='; ?>" + product_id,
      type: 'POST', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function(html) {
        // console.log(html);
        // console.log(qna_id);
        // console.log($('#qna-list-li-'+qna_id).closest('li'));
        $('#qna-list-li-'+qna_id).closest('li').append(html);

        s = $('#qna-title-'+qna_id).find('.fa-angle-down');
        // console.log(s);
        s.removeClass('fa-angle-down');
        s.addClass('fa-angle-up');

        get_qna_id = qna_id;
      },
      error: function(e) {
        console.log(e)
      }
    });
    clear_qna();
  }

  function open_qna() {
    $('#qnaModal').modal('show');
    //window.location.href = "<?php //echo base_url().'home/shop/qna?id='.$product->product_id; ?>//";
  }

  function open_qna_pw(qna_id) {
    $('#qna-reply-pw').data('id', qna_id);
    $('#qnaPwModal').modal('show');
    console.log($('#qna-reply-pw').data('id'));
    //window.location.href = "<?php //echo base_url().'home/shop/qna?id='.$product->product_id; ?>//";
  }

  function check_private() {
    let qna_private = $('#qna-private').prop('checked');
    // console.log(qna_private);
    if (qna_private === true) {
      $('.qna-pw').show();
    } else {
      $('.qna-pw').hide();
    }
  }

  function check_pw(pw) {
    if (pw.length !== 4) {
      alert('비밀번호는 숫자 4자리로 입력 바랍니다.');
      $('#qna-pw').val('');
      return false;
    }

    for (let i = 0; i < pw.length; i++) {
      // console.log(pw[i]);
      if (pw[i] < '0' || pw[i] > '9') {
        alert('비밀번호는 숫자 4자리로 입력 바랍니다.');
        $('#qna-pw').val('');
        return false;
      }
    }

    return true;
  }

  function clear_qna() {
    // console.log('clear');
    $('#qna-title').val('');
    $('#qna-body').val('');
    $('#qna-private').prop('checked', false);
    $('#qna-pw').val('');
    $('#qna-reply-pw').val('');
  }

  function clear_qna_list() {
    console.log($('.item-content-qna-ul ul').find('li'));
    $('.item-content-qna-ul ul').find('li').remove();
    qna_page = 0;
  }

  function submit_qna() {
    let qna_title = trim($('#qna-title').val());
    let qna_body = trim($('#qna-body').val());
    let qna_private = $('#qna-private').prop('checked') === true ? '1' : '0';
    let qna_pw = $('#qna-pw').val();

    // console.log(qna_title);
    // console.log(qna_body);
    // console.log(qna_private);
    // console.log(qna_pw);

    if (qna_private === '1' && check_pw(qna_pw) === false) {
      return false;
    }

    let formData = new FormData();
    formData.append('qna_title', qna_title);
    formData.append('qna_body', qna_body);
    formData.append('qna_private', qna_private);
    formData.append('qna_pw', qna_pw);

    $.ajax({
      url: '<?php echo base_url(); ?>home/shop/qna/qes?id=' + product_id, // form action url
      type: 'POST', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        if (data === 'done' || data.search('done') !== -1) {
          var text = '<strong>성공하였습니다</strong>';
          notify(text,'success','bottom','right');
          $('#qnaModal').modal('hide');
          window.location.reload(true);
        } else {
          var text = '<strong>실패하였습니다</strong>' + data;
          notify(text,'warning','bottom','right');
        }
      },
      error: function (e) {
        console.log(e)
      }
    });
  }

  $(document).ready(function() {
    $('.item-images').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      centerMode: true,
      infinite: true,
      // swipe: true,
      // swipeToSlide: true,
      speed: 500,
      autoplaySpeed: 3000,
      waitForAnimate: false,
      focusOnSelect: true,
      autoplay: true,
      arrows: false,
    });

    <?php if (count($review_images) > 0) { ?>
    $('.review-images').slick({
      slidesToShow: 3,
      slidesToScroll: 3,
      dots: false,
      centerMode: false,
      infinite: false,
      swipe: true,
      swipeToSlide: true,
      speed: 500,
      // autoplaySpeed: 3000,
      waitForAnimate: false,
      focusOnSelect: false,
      autoplay: false,
      arrows: false,
      easing: 'swing',
      centerPadding: '10px',
    });
    <?php } ?>
    //active_menu_bar('<?php //echo $this->crud_model->get_product_category_str($product->item_cat); ?>//');
    $('.item-content-info').show();
    $('.item-nav-info').addClass('active');
    init_item_sticky();
    init_options();
  });

</script>
