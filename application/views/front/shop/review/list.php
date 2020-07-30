<?php foreach ($review_data as $review) { ?>
  <li>
    <div class="item-content-review-li" style="display: block">
      <a href="javascript:void(0);" onclick="get_review_body(<?php echo $review->review_id; ?>)" >
        <div class="review-list-li" id="review-list-li-<?php echo $review->review_id; ?>">
          <div class="review-header" style="height: 20px; line-height: 20px;">
            <span style="color: grey; font-size: 10px; ">
            <?php
            $p = strchr($review->user->email, '@');
            echo substr($review->user->email, 0, 3).'***'. $p;
            ?>
            </span>
            &nbsp;&nbsp;&nbsp;
            <?php $i = 0; for (; $i < $review->review_score; $i++) { ?>
              <span><img src="<?php echo base_url().'uploads/icon/icon13_star.png'; ?>" style="width: 10px; height: 10px;"/></span>
            <?php }
            for (; $i < 5; $i++) {
              ?>
              <span><img src="<?php echo base_url().'uploads/icon/icon12_star.png'; ?>" style="width: 10px; height: 10px;"/></span>
            <?php } ?>
            <span class="pull-right" style="font-size:10px; color: grey"><?php echo $review->review_at; ?></span>
          </div>
          <div class="review-body-title" id="review-body-<?php echo $review->review_id; ?>" style="height: 50px; padding: 10px; line-height: 30px;">
            <?php echo (mb_strlen($review->review_body) > 25 ? mb_substr($review->review_body,0,25).'...' : $review->review_body); ?>
            <span class="pull-right fa fa-angle-down" style="margin-left: 10px;line-height: 30px"></span>
            <?php if ($review->review_file_cnt > 0) { ?>
              <span class="pull-right" style="padding-bottom: 10px">
                  <img class="review-img" src="<?php echo $review->review_img_url_1; ?>" alt="" style="width: 30px; height: 30px">
              </span>
            <?php } ?>
          </div>
        </div>
      </a>
    </div>
  </li>
<?php } ?>
