<style>
  .notice-list-header {
    border-bottom: 1px solid #EAEAEA;
    height: 40px;
    line-height: 40px;
    padding-left: 15px;
    padding-right: 15px;
    /*display: flex;*/
  }
  .notice-list {
    border-bottom: 1px solid #EAEAEA;
    background-color: white;
    padding-left: 15px;
    padding-right: 15px;
  }
  .notice-list ul {
    margin-bottom: 0 !important;
  }
  .notice-list ul li, .notice-detail {
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
  /* blog image */
  .notice-detail img {
    height: auto;
    width: 100% !important;
    max-width: 100%;
    margin: 0px !important;
  }
  /*.notice-detail p {*/
  /*  padding: 0 15px;*/
  /*}*/
</style>
<section class="page-section">
  <div class="container">
    <div class="row">
      <div class="notice-content">
        <div class="notice-list-header" style="text-align: center">
          <?php echo $title; ?>
        </div>
        <div class="notice-list">
          <ul>
            <!-- list -->
          </ul>
        </div>
        <div id="view_more">
          <a class="btn btn-lg btn-primary" href="javascript:void(0)" onclick="ajax_notice_list();" role="button">
            view more
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  var page = 0;
  function ajax_notice_list() {

    page = page + 1;

    console.log('page : ' + page);

    $.ajax({
      url: "<?php echo base_url().'home/notice/list?type='.$type.'&page='; ?>" + page,
      type: 'GET', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      success: function(data) {
        var prevCnt = $(".notice-list ul li").length;

        // console.log(data);
        $('.notice-list ul').append(data);
        // console.log($(".notice-list ul li").length % 10);

        var listCnt = $(".notice-list ul li").length;
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

  var notice_id = 0;

  function get_notice(id) {
    $('#notice-detail-' + notice_id).remove();

    let s = $('#notice-title-' + notice_id + ' .fa');
    s.removeClass('fa-angle-up');
    s.addClass('fa-angle-down');

    if (id === notice_id) {
      notice_id = 0;
      return false;
    }

    $.ajax({
      url: "<?php echo base_url().'home/notice/detail?id='; ?>" + id,
      type: 'GET', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      success: function(html) {

        $('#notice-list-li-' + id).closest('li').after(html);

        s = $('#notice-title-' + id + ' .fa');
        s.removeClass('fa-angle-down');
        s.addClass('fa-angle-up');

        notice_id = id;

      },
      error: function(e) {
        console.log(e)
      }
    });

    return true;
  }

  $(document).ready(function(){
    ajax_notice_list();
  });

</script>
