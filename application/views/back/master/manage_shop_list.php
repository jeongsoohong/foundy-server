<? $no = 0;
foreach ($product_list as $item) {
  $no++;
  ?>
  <tr>
    <td class="td-label chkTd">
      <input class="chkPiece" type="checkbox" name="chkPiece" onclick="check_piece('<?= $type; ?>')" data-id="<?= $item->product_id; ?>">
      <label class="chkLabel"></label>
    </td>
    <td>
      <span class="td-span"><?= $no; ?></span>
    </td>
    <td>
      <span class="td-span"><?= $item->product_code; ?></span>
    </td>
    <td>
      <span class="td-span"><?= $item->item_name; ?></span>
    </td>
    <td>
      <span class="td-span"><?= $item->brand_name; ?></span>
    </td>
    <td>
      <span class="td-span"><?= $this->crud_model->get_price_str($item->item_sell_price); ?>원</span>
    </td>
    <td>
      <span class="td-span"><?= $item->item_discount_rate; ?>%</span>
    </td>
    <td>
      <div class="td-span">
        <? if ($ordering == true) { ?>
          <button class="go__toUp" onclick="reorder_list('<?= $type; ?>', 'up', <?= $item->product_id; ?>)"></button>
          <button class="go__toDown" onclick="reorder_list('<?= $type; ?>', 'down', <?= $item->product_id; ?>)"></button>
        <? } ?>
      </div>
    </td>
  </tr>
<? } ?>
