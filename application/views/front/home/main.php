<!-- PAGE -->
<style>
  .main-header {
    text-align: center;
    height: 40px;
  }
  .main-header h6 {
    height: 40px;
    line-height: 40px;
    margin: 0 0 0 0;
    font-size: 13px;
  }
  .main-discovery .main-nav .main-blog {
    padding-left: 15px;
    padding-right: 15px;
  }
  .main-discovery .main-nav div{
    text-align: center;
    width: 32.7% !important;
    display: inline-block;
    color: white;
    margin: 0 0 0 0;
    background-color: #B39E98;
    height: 40px;
    line-height: 40px;
    vertical-align: center;
    padding-left: 0;
    padding-right: 0;
  }
  .main-discovery, .main-fav {
    margin: 0 0 10px 0;
    padding-left: 0;
    padding-right: 0;
  }
  .main-blog-content {
    margin: 0 0 10px 0;
    padding-left: 0;
    padding-right: 0;
    /*background-color: white;*/
    padding-bottom: 10px;
  }
  .blog-img {
    padding-left: 0;
    padding-right: 0;
  }
  .blog-img img {
    min-height: 100%;
    min-width: 100%;
  }
  .blog-title {
    padding-left: 0;
    padding-right: 0;
  }
  .blog-title h5 {
    margin: 10px 0 5px 0;
  }
  .blog-summery {
    font-size: 11px;
    padding-left: 0;
    padding-right: 0;
  }
</style>
<section class="page-section" style="margin: 0px 15px 0px 15px !important; padding: 5px 0 5px 0!important; border-top: 1px solid #353535;">
  <div class="row">
    <div class="col-md-12 main-discovery">
      <div class="col-md-12 main-header navigation-header" style="text-align: center; margin: 10px 0">
<!--        <p style="line-height: 20px;">-->
          <h6 class="font-futura" style="height: 20px; line-height: 20px;">Find</h6>
        <p>건강한 시작을 위한 클래스 찾기</p>
<!--        </p>-->
      </div>
      <div class="col-md-12 main-nav" style="display: flex">
        <a href="<?php echo base_url().'home/find'; ?>" style="margin:auto;">
          <img class="img-responsive" src="<?php echo base_url(); ?>uploads/icon_0604/find01.png" alt="" />
        </a>
        <a href="<?php echo base_url().'home/find/center/a/'.CENTER_TYPE_YOGA; ?>" style="margin:auto;">
          <img class="img-responsive" src="<?php echo base_url(); ?>uploads/icon_0604/find02.png" alt="" />
        </a>
        <a href="<?php echo base_url().'home/find/center/b/'.CENTER_TYPE_PILATES; ?>" style="margin:auto;">
          <img class="img-responsive" src="<?php echo base_url(); ?>uploads/icon_0604/find03.png" alt="" />
        </a>
        <a href="<?php echo base_url().'home/find/class'; ?>" style="margin:auto;">
          <img class="img-responsive" src="<?php echo base_url(); ?>uploads/icon_0604/find04.png" alt="" />
        </a>
      </div>
    </div>
    <div class="col-md-12 main-fav">
      <div class="col-md-12 main-header navigation-header font-futura" style="text-align: center">
        <?php if (empty($bookmark_centers) && empty($bookmark_teachers)) { ?>
          <h6 class="font-futura">Your Favorite</b></h6>
        <?php } else { ?>
          <h6 class="font-futura">My Favorite</b></h6>
        <?php } ?>
      </div>
      <div class="col-md-12 main-fav-content">
        <?php include "favorite.php"; ?>
      </div>
    </div>
    <?php if (count($blogs) > 0) { ?>
      <div class="col-md-12 main-blog">
        <div class="col-md-12 main-header navigation-header" style="text-align: center">
          <h6 class="font-futura">This Week</h6>
        </div>
        <?php foreach ($blogs as $blog) { ?>
          <div class="col-md-12 main-blog-content">
            <div class="col-md-12 blog-img">
              <a href="<?php echo base_url().'home/blog/view?id='.$blog->blog_id; ?>">
                <img class="img-responsive" src="<?php echo $blog->main_image_url; ?>" alt="" />
              </a>
            </div>
            <div class="col-md-12 blog-title">
              <h5><b><?php echo $blog->title; ?></b></h5>
            </div>
            <div class="col-md-12 blog-summery">
              <?php echo $blog->summery; ?>
            </div>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
  </div>
</section>

