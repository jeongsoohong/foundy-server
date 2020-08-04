<style>
  .profile div select.form-control {
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
</style>
<!-- PAGE -->
<section class="page-section with-sidebar" style="padding-top: 0 !important; padding-bottom: 0 !important; background-color: white">
  <div class="container">
    <div class="row">
      <?php if (!empty($bookmarks) && count($bookmarks) > 0) { ?>
        <!-- bookmark -->
        <div class="col-md-12 content" id="content" style="margin-bottom: 0 !important; background-color: white !important; border-bottom: 1px solid #F5F5F5">
          <div id="blog-content">
            <div class="col-md-12" style="padding: 0 0 0 0 !important; ">
              <div class="row">
                <div class="col-md-12" style="padding: 0 0 0 0 !important; height: 50px">
                  <div class="profile" style="font-size: 15px; height: 50px; line-height: 50px; padding: 5px 20px 5px 20px !important; text-align: center">
                    <span class="font-futura">My Favorite</span>
                  </div>
                </div>
                <div class="widget" style="padding-bottom:10px; ">
                  <ul class="bookmark_video_ul">
                    <?php
                    foreach ($bookmarks as $center) {
                      $c = '';
                      $type_cnt = 0;
                      $cats = $this->db->get_where('center_category', array('center_id' => $center->center_id))->result();
                      foreach($cats as $cat) {
                        $c .= $cat->category . '/';
                        if ($cat->type == $center_type) {
                          $type_cnt++;
                        }
                      }
                      $c[strlen($c) - 1] = "\0";
                      if ($type_cnt == 0) {
                        continue;
                      }
                      ?>
                      <li style="padding: 10px 0 10px 0 !important;">
                        <a href="<?php echo base_url(); ?>home/center/profile/<?php echo $center->center_id; ?>">
                          <div class="col-md-12 " style="padding: 0 20px 0 20px !important; height: 75px">
                            <table class="col-md-12" style="background-color: white; width: 100%">
                              <tbody>
                              <tr style="height: 25px">
                                <td style="width: 85%">
                                  <h5 class="center-title" style="margin: 0 !important;"><b><?php echo $center->title; ?></b></h5>
                                </td>
                                <td style="text-align: right">
                                  <?php echo $this->crud_model->sns_func_html('bookmark', 'center', true, $center->center_id, 20, 20); ?>
                                </td>
                              </tr>
                              <tr style="height: 23px">
                                <td style="width: 85%">
                                  <?php echo "{$center->address} {$center->address_detail}"; ?>
                                </td>
                                <td></td>
                              </tr>
                              <tr style="height: 23px">
                                <td style="width: 85%">
                                  <span style="color: saddlebrown;"><?php echo $c; ?></span><br>
                                </td>
                                <td></td>
                              </tr>
                              </tbody>
                            </table>
                          </div>
                        </a>
                      </li>
                    <?php } ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>

      <!-- CONTENT -->
      <div class="col-md-12 content" id="content" style="background-color: white !important;">
        <div id="blog-content">

          <!-- center -->
          <div class="col-md-12" style="padding: 0 0 0 0 !important; ">
            <div class="row">
              <div class="col-md-12" style="padding: 0 0 0 0 !important; height: 50px;">
                <div class="profile" style="display: flex; font-size: 15px; height: 50px; line-height: 50px; padding: 5px 20px 5px 20px !important; text-align: center">
                  <div style="width: 70%; ">
                    <span class="font-futura" style="position: absolute; left: 45%"><?php echo $page_title; ?></span>
                  </div>
                  <div class="pull-right" style="width: 25%;height: 50px; line-height: 50px; ">
                    <select class="form-control select-arrow" id="center_category" name="center_category" style="height: 50px; line-height: 50px">
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
                  <div class="pull-right" style="width: 5%; text-align: right; height: 50px; line-height: 50px; color: grey">
                    <i class="fa fa-angle-down"></i>
                  </div>
                </div>
              </div>
              <div class="widget" style="padding-bottom:10px;">
                <!-- ajax_center_list() -->
                <ul class="center_ul">

                </ul>
                <!-- /ajax_center_list() -->
              </div>
            </div>
          </div>
          <!-- /center -->
          <div style="margin-bottom: 10px !important;">
            <p style="text-align: center;">
              <a class="btn btn-lg btn-primary" id="view_more" href="#none" onclick="ajax_center_list(); return false;" role="button" style="display: none; font-family: 'Quicksand' !important; font-size: 15px; color: gray; background-color: inherit; border: 1px solid #d3d3d3">
                view more
              </a>
            </p>
          </div>
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

    //console.log('page : ' + page + ', filter : ' + filter + ', center_type : ' + '<?php //echo $center_type; ?>//');

    $.ajax({
      url: "<?php echo base_url().'home/find/center/list/'.$center_type.'?page='; ?>" + page + '&filter=' + filter,
      type: 'GET', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      success: function(data) {
        var prevCnt = $(".center_ul li").length;

        // console.log(data);
        $('.center_ul').append(data);
        // console.log($(".center_ul a li").length % 10);

        var listCnt = $(".center_ul li").length;
        if ( listCnt === 0 || listCnt % 10 !== 0 || prevCnt === listCnt) {
          $('#view_more').hide();
        } else {
          $('#view_more').show();
        }
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
      $('.center_ul li').remove();
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
