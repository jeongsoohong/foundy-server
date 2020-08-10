<style>
  .product-navbar-content {
    margin: 0 !important;
    padding: 0 !important;
  }
  .product-navbar-content ul {
    display: flex;
    /*margin: 0 25px;*/
  }
  .product-navbar-content ul li{
    margin: 0 !important;
    padding: 0 !important;
  }
  .product-navbar-content ul li a {
    font-size: 14px;
    width: 100% !important;
    margin: 0 !important;
    text-align: center;
    padding-left: 0 !important;
    padding-right: 0 !important;
  }
  .product-navbar-content ul li {
    background-color: white !important;
  }
  .product-navbar-content ul li a {
    background-color: white !important;
    color: #DBDBDB;
  }
  .product-navbar-content ul li a.active {
    color: #353535;
    border-bottom: 1px solid #353535;
  }
  .product-navbar-content ul li a:hover {
    background-color: #EAEAEA !important;
    color: #353535;
  }
  .product-navbar-content ul li a span {
    padding-left: 10px;
    padding-right: 10px;
  }
</style>
<div id="content-container">
  <div class="row">
    <div class="col-md-12">
      <!-- product nav -->
      <div class="col-md-12" style="padding-left: 0; padding-right: 0">
        <div class="col-md-12" id="page-title">
          <h1 class="page-header text-overflow">상품관리</h1>
        </div>
        <div class="col-md-12 product-navbar-content">
          <ul class="nav">
<!--            <li class="col-md-2"></li>-->
            <li class="col-md-3" id="product_list"><a href="javascript:void(0);">상품리스트</a></li>
            <li class="col-md-3" id="product_qna"><a href="javascript:void(0);">상품Q&A</a></li>
            <li class="col-md-3" id="product_review"><a href="javascript:void(0);">상품리뷰</a></li>
            <li class="col-md-3" id="product_register"><a href="javascript:void(0);">상품등록</a></li>
            <li class="col-md-3" id="product_edit" style="display:none"><a href="javascript:void(0);">상품정보수정</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-12">
        <hr style="width: 100%; border: 1px solid #EAEAEA; margin: 0">
      </div>
      <div class="col-md-12" id="page-content">
        <div class="row">
          <!-- product content -->
          <div class="col-md-12 product-content">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  var loading_set = '<div style="text-align:center;width:100%;height:'+(top*2)+'px; position:relative;top:'+top+'px;"><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i></div>';

  function active_nav(nav) {
    $('.product-navbar-content').find('ul li a').removeClass('active');
    $('#product_' + nav +' a').addClass('active');
  }

  let edit_open = false;
  function check_edit(open) {
    if (open === false) {
      if (edit_open === true) {
        // $('ul .nav li:first-child').remove();
        $('ul .nav').append('<li class="col-md-3" id="product_edit"><a href="javascript:void(0);">상품정보수정</a></li>')
        // $('#product_edit').show();
      }
    } else {
      if (edit_open === false) {
        $('#product_edit').remove();
        // $('ul .nav').prepend('<li class="col-md-2"></li>');
        // $('#product_edit').hide();
      }
    }
  }

  $('#product_list').on('click',function(){
    $(".product-content").html(loading_set);
    $(".product-content").load("<?php echo base_url()?>shop/product/list?page=1&cat=all&item_name=&status=<?php echo SHOP_PRODUCT_STATUS_ON_SALE; ?>");
    active_nav('list');
    $('#product_edit').hide();
  });

  $('#product_qna').on('click',function(){
    $(".product-content").html(loading_set);
    $(".product-content").load("<?php echo base_url()?>shop/product/qna");
    active_nav('qna');
    $('#product_edit').hide();
  });

  $('#product_review').on('click',function(){
    $(".product-content").html(loading_set);
    $(".product-content").load("<?php echo base_url()?>shop/product/review");
    active_nav('review');
    $('#product_edit').hide();
  });
  $('#product_register').on('click',function(){
    $(".product-content").html(loading_set);
    $(".product-content").load("<?php echo base_url()?>shop/product/register?e=0");
    active_nav('register');
    $('#product_edit').hide();
  });
  $('#product_edit').on('click',function(){
    $(".product-content").html(loading_set);
    $(".product-content").load("<?php echo base_url()?>shop/product/register?e=1&p="+pid);
    active_nav('edit');
    $('#product_edit').show();
  });

  let pid = 0;
  function open_product_edit() {
    // console.log(pid);
    $('#product_edit').click();
  }

  $(document).ready(function() {
    $('#product_list').click();
  });
</script>
