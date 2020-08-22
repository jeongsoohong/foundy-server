<style>
  .coupon-content {
    padding-left: 15px;
    padding-right: 15px;
  }
  .coupon-info-tab {
    height: 50px;
    line-height: 50px;
    width: 100%;
    display: flex;
    text-align: center;
  }
  .coupon-tab, .my-coupon-tab {
    width: 50%;
    /*background-color: #BDBDBD;*/
    color: white;
    font-size: 14px;
    font-weight: 500;
    /*border-top: 1px solid #BDBDBD;*/
    /*border-left: 1px solid #BDBDBD;*/
    /*border-right: 1px solid #BDBDBD;*/
  }
  .coupon-tab.active, .my-coupon-tab.active {
    background-color: white;
    color: #353535;
  }
  .coupon-list, .my-coupon-list {
    background-color: white;
    width: 100%;
  }
  .coupon-list, .my-coupon-list {
    border-bottom: 1px solid #EAEAEA;
    background-color: white;
    padding-left: 15px;
    padding-right: 15px;
  }
  .coupon-list ul, .my-coupon-list ul {
    margin-bottom: 0 !important;
  }
  .coupon-list ul li, .my-coupon-list ul li {
    padding: 10px 0;
    border-bottom: 1px solid #EAEAEA;
  }
  #coupon_view_more, #my_coupon_view_more {
    text-align: center;
    height: 60px;
    padding: 10px 0;
  }
  #coupon_view_more a, #my_coupon_view_more a {
    font-family: 'Quicksand' !important;
    font-size: 15px;
    color: gray;
    background-color: inherit;
    border: 1px solid #d3d3d3;
    line-height: 40px;
    padding: 0 10px;
    height: 40px;
    width: 100px;
  }
  .coupon-title {
    color: rgb(217,93,40);
    font-size: 14px;
    font-weight: 500;
    width: 70%;
  }
  .coupon-desc, .coupon-datetime {
    font-size: 12px;
    color: black;
    width: 80%;
  }
  .coupon-btn {
    text-align: center;
    margin: auto;
    width: 20%;
  }
  .btn {
    font-size: 12px;
    padding: 6px;
    width: 80%;
    height: 24px;
    line-height: 12px;
    text-align: center;
    margin: auto;
    color: white;
  }
  .btn-receive {
    background-color: rgb(217,93,40);
  }
  .btn-received {
    background-color: rgb(163,162,162);
  }
  .coupon-table {
    width: 100%;
  }
  .coupon-list ul li:last-child {
    border: none;
  }
</style>
<section class="page-section">
  <div class="container">
    <div class="row">
      <div class="coupon-content">
        <div class="coupon-info-tab">
          <div class="coupon-tab active">
            <a href="javascript:void(0);" id="coupon-tab" onclick="change_coupon_info_tab($(this))" data-target="coupon">
              쿠폰 받기
            </a>
          </div>
          <div class="my-coupon-tab">
            <a href="javascript:void(0);" id="my-coupon-tab" onclick="change_coupon_info_tab($(this))" data-target="my-coupon">
              내 쿠폰함
            </a>
          </div>
        </div>
        <div class="coupon-list" id="coupon-list">
          <ul id="coupon-ul">
          </ul>
          <div id="coupon_view_more">
            <a class="btn btn-lg btn-primary" href="javascript:void(0)" onclick="ajax_coupon_list();" role="button">
              view more
            </a>
          </div>
        </div>
        <div class="my-coupon-list" id="my-coupon-list" style="display: none">
          <ul id="my-coupon-ul">
          </ul>
          <div id="my_coupon_view_more">
            <a class="btn btn-lg btn-primary" href="javascript:void(0)" onclick="ajax_my_coupon_list();" role="button">
              view more
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  let coupon_page = 0;
  function ajax_coupon_list() {
  
    coupon_page = coupon_page + 1;
    // console.log('coupon_page : ' + coupon_page);
  
    $.ajax({
      url: "<?php echo base_url().'home/coupon/list?page='; ?>" + coupon_page,
      type: 'GET', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      success: function(data) {
      let prevCnt = $(".coupon-list ul li").length;
    
      // console.log(data);
      $('.coupon-list ul').append(data);
       //console.log($(".coupon-list ul li").length % <?php //echo COUPON_LIST_PAGE_SIZE; ?>//);
    
      let listCnt = $(".coupon-list ul li").length;
      if ( listCnt === 0 || listCnt % <?php echo COUPON_LIST_PAGE_SIZE; ?> !== 0 || prevCnt === listCnt) {
        $('#coupon_view_more').hide();
      } else {
        $('#coupon_view_more').show();
      }
      // console.log(prevCnt);
      // console.log(listCnt);
    },
      error: function(e) {
      console.log(e)
      }
    });
  }
  
  let my_coupon_page = 0;

  function ajax_my_coupon_list() {
  
    my_coupon_page = my_coupon_page + 1;
    // console.log('my_coupon_page : ' + my_coupon_page);
  
    $.ajax({
      url: "<?php echo base_url().'home/coupon/list/my?page='; ?>" + my_coupon_page,
      type: 'GET', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      success: function(data) {
        let prevCnt = $(".my-coupon-list ul li").length;
      
        // console.log(data);
        $('.my-coupon-list ul').append(data);
        //console.log($(".my-coupon-list ul li").length % <?php //echo COUPON_LIST_PAGE_SIZE; ?>//);
      
        let listCnt = $(".my-coupon-list ul li").length;
        if ( listCnt === 0 || listCnt % <?php echo COUPON_LIST_PAGE_SIZE; ?> !== 0 || prevCnt === listCnt) {
          $('#my_coupon_view_more').hide();
        } else {
          $('#my_coupon_view_more').show();
        }
        // console.log(prevCnt);
        // console.log(listCnt);
      },
      error: function(e) {
        console.log(e)
      }
    });
  }

  function change_coupon_info_tab(e) {
    let target = e.data('target');
    console.log(target);

    $('.coupon-info-tab').find('div').removeClass('active');
    $('.' + target + '-tab').addClass('active');
    if (target === 'coupon') {
      $('#coupon-list').show();
      $('#my-coupon-list').hide();
      if (coupon_page === 0) {
        ajax_coupon_list();
      }
    } else {
      $('#coupon-list').hide();
      $('#my-coupon-list').show();
      if (my_coupon_page === 0) {
        ajax_my_coupon_list();
      }
    }
  
    return true;
  }

  function get_coupon(id) {
    event.preventDefault();
  
    $.ajax({
      url: '<?php echo base_url(); ?>home/coupon/receive?id=' + id, // form action url
      type: 'GET', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        if (data === 'done' || data.search('done') !== -1) {
          let text = '<strong>성공하였습니다</strong>';
          notify(text,'success','bottom','right');
          setTimeout(function() {location.reload();}, 1000);
        } else {
          let text = '<strong>실패하였습니다</strong>' + data;
          notify(text,'warning','bottom','right');
        }
      },
      error: function (e) {
        console.log(e)
      }
    });
  }
  $(document).ready(function(){
    ajax_coupon_list();
  });

</script>
