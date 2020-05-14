<style>
  .profile div select.form-control {
    width: 90px !important;
    height: 30px !important;
    font-size: 12px !important;
    padding: 0 0 0 0 !important;
    text-align-last: center;
    border: none;
  }
  .select-arrow {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    /* Some browsers will not display the caret when using calc, so we put the fallback first */
    background: url("<?php echo base_url(); ?>uploads/icon/arrow_down.png") white no-repeat 100% !important; /* !important used for overriding all other customisations */
  }
  /*For IE*/
  select::-ms-expand { display: none; }
</style>
<!-- PAGE -->
<section class="page-section with-sidebar">
  <div class="container">
    <div class="row">
      <!-- CONTENT -->
      <div class="col-md-12 content" id="content" style="background-color: white !important;">
        <div id="blog-content">

          <!-- center -->
          <div class="col-md-12" style="padding: 0 0 0 0 !important; ">
            <div class="row">
              <div class="col-md-12" style="padding: 0 0 0 0 !important;">
                <div class="profile" style="font-size: 15px; padding: 5px 10px 5px 10px !important;">
                  <span><?php echo $page_title; ?></span>
                  <div class="pull-right" style="width: 80px; margin-right: 10px;">
<!--                    <i class="pull-right fa fa-angle-down" style="color: #737475; font-family: FontAwesome !important; padding-top: 8px;"> </i>-->
                    <select class="form-control select-arrow" id="center_category" name="center_category">
                      <option value="ALL" selected="selected">ALL</option>
                      <?php
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
                  <!-- ajax_center_list() -->
                  <ul class="center_ul">

                  </ul>
                  <!-- /ajax_center_list() -->
                </div>
              </div>
            </div>
          </div>
          <!-- /center -->
          <p style="text-align: center;">
            <a class="btn btn-lg btn-primary" id="view_more" href="#none" onclick="ajax_center_list(); return false;" role="button" style="display: none; font-family: 'Quicksand' !important; font-size: 15px; color: gray; background-color: inherit; border: 1px solid #d3d3d3">
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

  function ajax_center_list() {

    page = page + 1;

    console.log('page : ' + page + ', filter : ' + filter + ', center_type : ' + '<?php echo $center_type; ?>');

    $.ajax({
      url: "<?php echo base_url().'home/find/center/list/'.$center_type.'?page='; ?>" + page + '&filter=' + filter,
      type: 'GET', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      success: function(data) {
        $('.center_ul').append(data);
        // console.log($(".center_ul a li").length % 10);

        var listCnt = $(".center_ul a li").length;
        if ( listCnt === 0 || listCnt % 10 !== 0) {
          $('#view_more').hide();
        } else {
          $('#view_more').show();
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
    $("#center_category").change(function() {
      // console.log(this.value);
      page = 0;
      filter = this.value;
      $('#view_more').hide();
      $('.center_ul a').remove();
      ajax_center_list();
    });
  })

  $(document).ready(function(){
    page = 0;
    filter = $("#center_category option:selected").val();

    active_menu_bar('find');
    ajax_center_list();
  });
</script>
