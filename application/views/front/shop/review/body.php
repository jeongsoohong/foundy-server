<div class="item-content-review-body" id="item-content-body-<?php echo $review->review_id; ?>">
  <div class="review-body">
    <pre><?php echo $review->review_body; ?></pre>
  </div>
  <div class="review-img" style="padding: 10px 0;">
    <?php for ($i = 1; $i <= $review->review_file_cnt; $i++) { ?>
      <img src="<?php  $url = 'review_img_url_'.$i; echo $review->{$url}; ?>" alt="" style="width: 100%; height: auto; padding-bottom: 10px;"/>
    <?php } ?>
  </div>
</div>
