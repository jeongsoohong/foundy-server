<section class="page-section with-sidebar">
  <div class="container">
    <div class="row">
      <div class="col-md-12" style="padding: 0 0 0 0 !important; ">
        <div class="recent-post" style="background: #fff;border: 1px solid #e0e0e0;">
          <div class="media">
            <a class="pull-left media-link" href="#" style="height: 40px; float:left !important; padding: 0 !important; margin: 10px 30px 10px 30px !important; ">
              <div class="media-object img-bg" id="blah" style="background-image: url('<?php
              if (empty($user_data->profile_image_url)) {
                echo base_url() . 'uploads/icon/profile_icon.png';
              } else {
                echo $user_data->profile_image_url;
              }
              ?>'); background-size: cover; background-position-x: center; background-position-y: top; width: 40px; height: 40px;"></div>
            </a>
            <div class="media-body" style="padding-right: 10px; padding-top: 10px;">
              <div class="col-md-12" style="margin: 10px 0 10px 0 !important; padding-left: 20px !important; text-align: left; !important; font-size: 12px !important;">
                <a href="<?php echo base_url(); ?>home/teacher/profile/<?php echo $user_data->user_id; ?>">
                  <p>
                    <?php echo $teacher_data->name; ?>
                  </p>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- CONTENT -->
      <div id="blog_category" style="display: none"><?php echo $video_data->video_id; ?></div>
      <div class="col-md-12 content" id="content" style="padding-left: 0 !important; padding-right: 0 !important;">
        <article class="post-wrap post-single">
          <!--                    <div class="post-header">-->
          <!--                        <h2 class="post-title" style="text-align: center; font-size: 16px !important; padding-top: 15px !important;">-->
          <!--                            --><?php //echo $video_data->title;?>
          <!--                        </h2>-->
          <!--                    </div>-->
          <div class="post-media">
            <iframe src="<?php echo $video_data->video_url;?>" frameborder="0">
            </iframe>
            <h2 class="post-title" style="padding: 10px 10px 0 10px !important; text-align: center"><?php echo $video_data->title; ?></h2>
            <p class="post-desc" style="padding: 10px 10px 10px 10px !important;">
              <?php echo $video_data->desc; ?>
              <br>
              <?php
              $cat = '';
              $categories = $this->db->get_where('teacher_video_category', array('video_id' => $video_data->video_id))->result();
              foreach($categories as $category) {
                $cat .= $category->category . '/';
              }
              $cat[strlen($cat) - 1] = "\0";
              ?>
              <span class="text-sm" style="color:saddlebrown;">
              <?php echo $cat; ?>
            </span>
            </p>
          </div>
          <!--            <div class="buttons">
                          <div id="share"></div>
                      </div>
          -->
          <div class="post-body" style="background-color: white !important; height: 30px !important; margin: 0 20px 0 20px !important;">
            <div class="post-excerpt" style="height: 30px !important;">
                            <span class="text-xl pull-left" id="like" style="font-size: 12px; padding-left: 10px ">
                                <img src="<?php echo base_url(); ?>uploads/icon/icon-4.png" style="width:20px !important; height: 20px !important;"> &nbsp 0
                            </span>
              <span class="text-xl pull-left" id="reply" style="font-size: 12px; padding-left: 10px ">
                                &nbsp <img src="<?php echo base_url(); ?>uploads/icon/icon-5.jpg" style="width:20px !important; height: 20px !important;"> &nbsp 0
                            </span>
              <span class="pull-right" id="bookmark" style="font-size: 12px; padding-right: 10px">
                                <img src="<?php echo base_url(); ?>uploads/icon/icon-11.jpg" style="width:20px !important; height: 20px !important;">
                            </span>
            </div>
          </div>
          <!--          <hr class="page-divider"/>-->
        </article>
      </div>
      <!-- /CONTENT -->
    </div>
  </div
</section>
<script type="text/javascript">
  $(document).ready(function() {
    active_menu_bar('find');
  });
</script>
<style>
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
      margin-bottom: 0 !important;
      display: contents;
    }
    .row .col-md-12.content .post-wrap.post-single .post-header {
      /*margin-left: 20px;*/
      /*margin-right: 20px;*/
      /*margin-top: 20px;*/
      /*margin-bottom: 20px !important;*/
    }
  }
  iframe {
    width: 100% !important;
    height: 520px !important;
  }
  @media (max-width: 992px) {
    iframe {
      height: 440px !important;
      /*width: 480px !important;*/
    }
  }
  @media (max-width: 680px) {
    iframe {
      height: 360px !important;
      /*width: 480px !important;*/
    }
    .page-section {
      padding-top: 0 !important;
    }
  }
  @media (max-width: 520px) {
    iframe {
      height: 280px !important;
      /*width: 360px !important;*/
    }
  }
  @media (max-width: 400px) {
    iframe {
      height: 200px !important;
      /*width: 270px !important;*/
    }
  }
  /* blog image */
  .post-body .post-excerpt img {
    height: auto;
    width: 100% !important;
    max-width: 100%;
    margin: 0px !important;
  }
</style>
