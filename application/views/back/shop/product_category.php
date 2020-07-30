<select id="item-cat-<?php echo $cat_level; ?>"  class="form-control" onchange="get_product_category($(this));" data-id="<?php echo $cat_level;?>">
  <option value="0"><?php echo $cat_level == 2 ? '중분류' : '소분류'; ?></option>
  <?php foreach ($shop_product_category as $cat) { ?>
    <option value="<?php echo $cat->cat_code; ?>"><?php echo $cat->cat_name; ?></option>
  <?php } ?>
</select>
