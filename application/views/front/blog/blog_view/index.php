<style>
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
  @media (max-width: 992px) {
    .row .col-md-12.content {
      padding-left: 0px !important;
      padding-right: 0px !important;
    }
    .row .col-md-12.content .post-wrap.post-single {
      padding: 0px;
    }
    .row .col-md-12.content .post-wrap.post-single .post-media {
      margin-left: 10px;
      margin-right: 10px;
    }
    .row .col-md-12.content .post-wrap.post-single .post-header {
      margin-left: 20px;
      margin-right: 20px;
    }
  }
  @media (max-width: 680px) {
    iframe {
      height: 270px !important;
      width: 480px !important;
    }
  }
  @media (max-width: 520px) {
    iframe {
      height: 210px !important;
      width: 360px !important;
    }
  }
  @media (max-width: 400px) {
    iframe {
      height: 160px !important;
      width: 270px !important;
    }
  }
  /* blog image */
  .post-body .post-excerpt img {
    height: auto;
    width: 100% !important;
    max-width: 100%;
    margin: 0px !important;
  }
  .post-body .post-excerpt p {
    padding: 0 15px;
  }
  .page-section {
    background-color: white;
  }
  .post-title {
    font-size: 20px;
  }
</style>
<section class="page-section with-sidebar">
  <div class="container">
    <div class="row">
      <!-- CONTENT -->
      <div class="col-md-12 content" id="content">
        <article class="post-wrap post-single" style="padding-top: 10px">
          <div class="col-md-12 main-header navigation-header" style="text-align: center; display: flex">
            <div class="col-md-12" style="text-align: center; width: 100%; padding: 0 0; font-size: 14px">
              <h6>
                <b style="padding-right: 5px">EARTH</b>
                <i class="fa fa-angle-right" style="font-size: 14px; color: grey;"></i>
                <span style="color: grey;"><?php echo $category->name; ?></span>
              </h6>
            </div>
<!--            <div class="col-md-6" style="text-align: left; width: 50%; padding: 0 5px;">-->
<!--              <select class="form-control select-arrow" id="blog_category" name="blog_category" style="padding: 0 0; border: none">-->
<!--                <option value="0">ALL</option>-->
<!--                --><?php //foreach ($categories as $c) { ?>
<!--                  <option value="--><?php //echo $c->category_id; ?><!--" --><?php //if ($c->category_id == $blog->blog_category) { echo "selected=\"selected\""; } ?><!-- >--><?php //echo $c->name; ?><!--</option>-->
<!--                --><?php //} ?>
<!--              </select>-->
<!--            </div>-->
          </div>

          <hr style="width: 30px; border-top: 2px solid black">
          <div class="post-header" style="text-align: center">
            <div class="post-meta" style="margin: 10px 10px 10px 10px; font-size: 12px">
              <?php echo substr($blog->modified_at, 0, 10); ?>
            </div>
            <p class="post-title" style="margin-bottom: 10px">
              <b><?php echo $blog->title; ?></b>
            </p>
            <div class="post-meta">
              <?php echo $blog->summery; ?>
            </div>
          </div>
          <div class="post-media">
            <img class="img-responsive" src="<?php echo $blog->main_image_url; ?>" alt="" style="min-height: 100%;"/>
          </div>
          <div class="post-body">
            <div class="post-excerpt">
              <p>
                <?php echo $blog->description; ?>
              </p>
            </div>
          </div>
        </article>
        <hr class="page-divider"/>
      </div>
      <!-- /CONTENT -->
    </div>
  </div
</section>
<script type="text/javascript">
  $(document).ready(function() {
    //$('#blog_category').change(function() {
    //  // console.log($(this).val());
    //  var category = $(this).val();
    //  location.href= '<?php //echo base_url(); ?>//home/blog?category=' + category;
    //})
    active_menu_bar('earth');
  });
</script>
