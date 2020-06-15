<style>
  .page-section .container .content {
    /*background-color: white;*/
    padding-bottom: 10px;
  }
  .main-header {
    text-align: center;
    height: 40px;
    padding: 0 0;
  }
  .main-header h6 {
    height: 40px;
    line-height: 40px;
    margin: 0 0 0 0;
    font-size: 14px;
  }
  .main-blog {
    padding-left: 0;
    padding-right: 0;
  }
  .blog_ul li {
    margin-bottom: 25px;
  }
  #view_more {
    text-align: center;
    height: 40px;
    display: none
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
  .main-blog div select.form-control {
    width: 100% !important;
    height: 30px !important;
    font-size: 12px !important;
    padding: 0 0 0 0 !important;
    text-align-last: right;
    border: none;
    direction: rtl;
  }
  select option {
    direction: ltr;
  }
  .form-control {
    background: #F3EFEB;
  }
</style>
<section class="page-section with-sidebar">
  <div class="container">
    <div class="row">
      <!-- SIDEBAR -->
<!--      --><?php
//      include 'sidebar.php';
//      ?>
      <!-- /SIDEBAR -->
      <!-- CONTENT -->
      <div class="col-md-12 content" id="content">
        <div id="blog-content">
          <div class="col-md-12 main-blog">
            <div class="col-md-12 main-header navigation-header" style="text-align: center; display: flex">
              <div class="col-md-6" style="text-align: right; width: 70%; padding: 0 0; font-size: 14px">
<!--                <h6><b style="padding-right: 5px">EARTH</b><i class="fa fa-angle-right" style="font-size: 14px; color: grey;"></i></h6>-->
              </div>
              <div style="width: 25%">
                <select class="form-control select-arrow" id="blog_category" name="blog_category" style="padding: 0 0; border: none">
                  <option value="0" <?php if ($category == 0) { echo 'selected="selected"'; } ?>>ALL</option>
                  <?php foreach ($categories as $c) { ?>
                    <option value="<?php echo $c->category_id; ?>" <?php if ($c->category_id == $category) { echo 'selected="selected"'; } ?>><?php echo $c->name; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="pull-right" style="width: 5%; text-align: right; line-height: 30px; color: grey">
                <i class="fa fa-angle-down"></i>
              </div>
            </div>
            <div class="main-blog-list">
              <!-- list -->
              <ul class="blog_ul">

              </ul>
              <!-- /list -->
            </div>
          </div>
          <div id="view_more">
            <a class="btn btn-lg btn-primary" href="javascript:void(0)" onclick="ajax_blog_list();" role="button">
              view more
            </a>
          </div>
        </div>
      </div>
      <!-- /CONTENT -->
    </div>
  </div>
</section>
<!-- /PAGE WITH SIDEBAR -->
<script>

  var page = 0;
  var category = <?php echo $category; ?>;

  function ajax_blog_list() {

    page = page + 1;

    // console.log('page : ' + page + ', cateogory : ' + category);

    $.ajax({
      url: "<?php echo base_url().'home/blog/list?page='; ?>" + page + '&category=' + category,
      type: 'GET', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      success: function(data) {
        var prevCnt = $(".blog_ul li").length;

        // console.log(data);
        $('.blog_ul').append(data);
        // console.log($(".center_ul a li").length % 10);

        var listCnt = $(".blog_ul li").length;
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

    // $('#page_num').val(page);

  }

  $(document).ready(function(){
    $('#blog_category').change(function() {
      // console.log($(this).val());
      page = 0;
      category = $(this).val();
      $('#view_more').hide();
      $('.blog_ul li').remove();
      ajax_blog_list();
    })
    active_menu_bar('earth');
    ajax_blog_list();
  });
</script>
