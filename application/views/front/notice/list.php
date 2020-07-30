<?php foreach ($notice_infos as $info) { ?>
  <li>
    <a href="javascript:void(0);" onclick="get_notice(<?php echo $info->blog_id; ?>)">
      <div class="notice-list-li" id="notice-list-li-<?php echo $info->blog_id; ?>">
        <span style="color: grey; font-size: 10px; ">
          <?php echo $info->modified_at; ?>
        </span><br>
        <h6 class="notice-title" id="notice-title-<?php echo $info->blog_id; ?>" style="font-size:14px; margin: 5px 0 !important;"><?php echo $info->title; ?>
          <span class="pull-right"><span class="fa fa-angle-down"></span>
        </h6>
      </div>
    </a>
  </li>
<?php }?>
