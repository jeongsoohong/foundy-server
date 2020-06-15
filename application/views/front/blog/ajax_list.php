<style>
  .main-blog-content {
    margin: 0 0 10px 0;
    padding-left: 0;
    padding-right: 0;
    /*background-color: white;*/
    padding-bottom: 10px;
    /*border: 1px solid #EAEAEA;*/
    border: none;
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
<?php foreach ($blogs as $blog) { ?>
  <li>
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
  </li>
<?php } ?>
