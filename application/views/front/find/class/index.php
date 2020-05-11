<style>
  .profile div select.form-control {
    width: 60px !important;
    height: 30px !important;
    font-size: 12px !important;
    padding: 0 0 0 0 !important;
    text-align-last: end;
    border: none;
  }
</style>
<!-- PAGE -->
<section class="page-section with-sidebar">
  <div class="container">
    <div class="row">
      <!-- CONTENT -->
      <div class="col-md-12 content" id="content" style="background-color: white !important;">
        <div id="blog-content">

          <!-- online class -->
          <div class="col-md-12" style="padding: 0 0 0 0 !important; ">
            <div class="row">
              <div class="col-md-12" style="padding: 0 0 0 0 !important;">
                <div class="profile" style="font-size: 15px; padding: 5px 10px 5px 10px !important;">
                  <span>포잇 추천 클래스</span>
                  <div class="pull-right" style="width: 80px; padding-right: 5px;">
                    <i class="pull-right fa fa-angle-down" style="color: #737475; font-family: FontAwesome !important; padding-top: 8px;"> </i>
                    <select class="form-control select-arrow" id="class_category" name="class_category">
                      <option value="ALL" selected="selected">ALL</option>
                      <?php
                      $categories = $this->db->order_by('category_id', 'asc')->get_where('category_class', array('activate' => 1))->result();
                      foreach ($categories as $cat) {
                      ?>
                      <option value="<?php echo $cat->name; ?>"><?php echo $cat->name; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="widget widget-categories" style="padding-bottom:10px; ">
                  <ul class="video_ul">

                    <!-- ajax_class_list() -->
                    <!-- /ajax_class_list() -->

                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- /online class -->
          <p style="text-align: center;">
            <a class="btn btn-lg btn-primary" id="view_more" href="#none" onclick="ajax_class_list(); return false;" role="button" style="font-family: 'Quicksand' !important; font-size: 15px; color: gray; background-color: inherit; border: 1px solid #d3d3d3">
              view more
            </a>
          </p>
      </div>
      <!-- /CONTENT -->
    </div>
  </div>
</section>
<!-- /PAGE -->
<!--<label>-->
<!--  <input id="page_num" type="hidden" value="0"/>-->
<!--</label>-->
<script>
  var page = 0;
  var filter = '';

  function ajax_class_list() {

    page = page + 1;

    // console.log('page : ' + page + ', filter : ' + filter);

    $.ajax({
      url: "<?php echo base_url().'home/find/class/list?page='; ?>" + page + '&filter=' + filter,
      type: 'GET', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      success: function(data) {
        $('.video_ul').append(data);
        // console.log($(".video_ul a li").length % 10);

        var listCnt = $(".video_ul a li").length;
        if ( listCnt === 0 || listCnt % 10 !== 0) {
          $('#view_more').hide();
        }
        // console.log(listCnt);
      },
      error: function(e) {
        console.log(e)
      }
    });

    // $('#page_num').val(page);

  }

  $(function() {
    $("#class_category").change(function() {
      // console.log(this.value);
      page = 0;
      filter = this.value;
      $('#view_more').show();
      $('.video_ul a li').remove();
      ajax_class_list();
    });
  })

  $(document).ready(function(){
    page = 0;
    filter = $("#class_category option:selected").val();

    active_menu_bar('find');
    ajax_class_list();
  });
</script>
