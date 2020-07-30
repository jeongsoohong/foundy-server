<table class="col-md-12">
  <thead>
  <tr>
    <th class="col-md-1">담당</th>
    <th class="col-md-2">담당자</th>
    <th class="col-md-2">전화번호</th>
    <th class="col-md-2">핸드폰번호</th>
    <th class="col-md-3">이메일</th>
    <th class="col-md-2">추가/삭제/수정</th>
  </tr>
  </thead>
  <tbody>
  <?php foreach ($shop_worker as $worker) { ?>
    <tr class="worker-info worker-info-upd">
      <td class="col-md-1">
        <select class="form-control worker_category">
          <?php foreach ($shop_worker_cat as $cat) { ?>
            <option value="<?php echo $cat->category_id; ?>" <?php if ($cat->category_id == $worker->worker_category) { echo 'selected'; }?>>
              <?php echo $cat->name; ?>
            </option>
          <?php } ?>
        </select>
      </td>
      <td class="col-md-2">
        <input class="form-control worker_name" value="<?php echo $worker->worker_name; ?>" type="text" name="worker_name" alt="" maxlength="32" placeholder=""/>
      </td>
      <td class="col-md-2">
        <input class="form-control phone" value="<?php echo $worker->phone; ?>" type="text" name="phone" alt="" maxlength="32" placeholder=""/>
      </td>
      <td class="col-md-2">
        <input class="form-control mobile" value="<?php echo $worker->mobile; ?>" type="text" name="mobile" alt="" maxlength="32" placeholder=""/>
      </td>
      <td class="col-md-3">
        <input class="form-control email" value="<?php echo $worker->email; ?>" type="text" name="email" alt="" maxlength="128" placeholder=""/>
      </td>
      <td class="col-md-2">
        <button class="worker-edit btn-dark" onclick="worker_info_update('upd',$(this),<?php echo $worker->worker_id; ?>)">수정</button>
        <?php if ($worker->worker_category != SHOP_WORKER_CATEGORY_REPRESENT) { ?>
          <button class="worker-del btn-danger" onclick="worker_info_update('del',$(this),<?php echo $worker->worker_id; ?>)">삭제</button>
        <?php } ?>
      </td>
    </tr>
  <?php } ?>
  <tr class="worker-info worker-info-add">
    <td class="col-md-1">
      <select class="form-control worker_category">
        <?php foreach ($shop_worker_cat as $cat) { ?>
          <option value="<?php echo $cat->category_id; ?>" <?php if ($cat->category_id == SHOP_WORKER_CATEGORY_ETC) { echo 'selected'; }?>>
            <?php echo $cat->name; ?>
          </option>
        <?php } ?>
      </select>
    </td>
    <td class="col-md-2">
      <input class="form-control worker_name" value="" type="text" name="worker_name" alt="" maxlength="32" placeholder=""/>
    </td>
    <td class="col-md-2">
      <input class="form-control phone" value="" type="text" name="phone" alt="" maxlength="32" placeholder=""/>
    </td>
    <td class="col-md-2">
      <input class="form-control mobile" value="" type="text" name="mobile" alt="" maxlength="32" placeholder=""/>
    </td>
    <td class="col-md-3">
      <input class="form-control email" value="" type="text" name="email" alt="" maxlength="128" placeholder=""/>
    </td>
    <td class="col-md-2">
      <button class="worker-add btn-success" onclick="worker_info_update('add',$(this), 0)">추가</button>
    </td>
  </tr>
  </tbody>
</table>
