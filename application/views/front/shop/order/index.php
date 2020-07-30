<style>
  .purchase-list-header {
    border-bottom: 1px solid #EAEAEA;
    height: 40px;
    line-height: 40px;
    padding-left: 15px;
    padding-right: 15px;
    /*display: flex;*/
  }
  .purchase-list {
    border-bottom: 1px solid #EAEAEA;
    background-color: white;
    padding-left: 15px;
    padding-right: 15px;
  }
  .purchase-list ul {
    margin-bottom: 0 !important;
  }
  .purchase-list ul li {
    padding: 10px 0;
    border-bottom: 1px solid #EAEAEA;
  }
  #view_more {
    text-align: center;
    height: 60px;
    padding: 10px 0;
    display: none;
  }
  #view_more a {
    font-family: 'Quicksand' !important;
    font-size: 15px;
    color: gray;
    background-color: inherit;
    border: 1px solid #d3d3d3;
    line-height: 40px;
    padding: 0 10px;
  }
</style>
<section class="page-section">
  <div class="container">
    <div class="row">
      <div class="purchase-content">
        <div class="purchase-list-header" style="text-align: center">
          주문내역
        </div>
        <div class="purchase-list">
          <ul>
<!--            --><?php //foreach ($purchase_infos as $info) { ?>
<!--              <li>-->
<!--                <a href="--><?php //echo base_url().'home/shop/order/detail?c='.$info->purchase_code; ?><!--">-->
<!--                  <div>-->
<!--                    <span style="color: grey; font-size: 10px; ">-->
<!--                      --><?php //echo $info->payment_info->purchased_at.' '.$this->crud_model->get_purchase_status_str($info->status); ?>
<!--                    </span><br>-->
<!--                    <h6 style="font-size:14px; margin: 5px 0 !important;">--><?php //echo $info->payment_info->item_name; ?>
<!--                      <span class="pull-right">바로가기 <span class="fa fa-angle-right"></span>-->
<!--                    </h6>-->
<!--                  </div>-->
<!--                </a>-->
<!--              </li>-->
<!--            --><?php //}?>
          </ul>
        </div>
        <div id="view_more">
          <a class="btn btn-lg btn-primary" href="javascript:void(0)" onclick="ajax_order_list();" role="button">
            view more
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  var page = 0;

  function ajax_order_list() {

    page = page + 1;

    // console.log('page : ' + page + ', cateogory : ' + category);

    $.ajax({
      url: "<?php echo base_url().'home/shop/order/list?page='; ?>" + page,
      type: 'GET', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      success: function(data) {
        var prevCnt = $(".purchase-list ul li").length;

        // console.log(data);
        $('.purchase-list ul').append(data);
        // console.log($(".purchase-list ul li").length % 10);

        var listCnt = $(".purchase-list ul li").length;
        if ( listCnt === 0 || listCnt % 2 !== 0 || prevCnt === listCnt) {
          $('#view_more').hide();
        } else {
          $('#view_more').show();
        }
        // console.log(prevCnt);
        // console.log(listCnt);
      },
      error: function(e) {
        console.log(e)
      }
    });
  }

  $(document).ready(function(){
    ajax_order_list();
  });

</script>
