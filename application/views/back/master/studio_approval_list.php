<?php foreach ($studios as $studio) { ?>
  <tr>
    <td class="td-label chkTd">
      <input class="chkPiece" type="checkbox" name="chkPiece" data-id="<?= $studio->studio_id; ?>">
      <label class="chkLabel"></label>
    </td>
    <td>
    <span class="td-span">
      <img class="span-img" src="<?= base_url(); ?>uploads/vendor_logo_image/default.jpg?random=1612166734429" alt="" width="46" height="46">
    </span>
    </td>
    <td>
      <span class="td-span"><?= $studio->title; ?></span>
    </td>
    <td>
      <span class="td-span"><?= $studio->email ?></span>
    </td>
    <td>
      <? if ($studio->activate == APPROVAL_DATA_ACTIVATE) { ?>
        <span class="td-span td-status td-locate font-futura locate_home">승인</span>
      <? } else if ($studio->activate == APPROVAL_DATA_REJECT) { ?>
        <span class="td-span td-status td-locate font-futura td-rejected">반려</span>
      <? } else { ?>
         <span class="td-span td-status td-locate font-futura locate_shop">신청</span>
      <? } ?>
    </td>
    <td class="fn-td-btn clearfix">
      <div class="td-btn-wrap">
        <p class="td-span td-btn td-seeing" onclick="get_approval_popup(<?= $studio->studio_id; ?>, 'profile');">
        <span class="btn-ic btn--seeProfile">
          <img src="<?= base_url(); ?>template/back/master/icon/ic_person.png" class="ic-img" width="12" height="11" alt="">
        </span>
          프로필
        </p>
        <p class="td-span td-btn td-showType" onclick="get_approval_popup(<?= $studio->studio_id; ?>, 'popup');">
        <span class="btn-ic btn--display">
          <img src="<?= base_url(); ?>template/back/master/icon/ic_check.png" class="ic-img" width="9" height="auto" alt="">
        </span>
          상태변경
        </p>
      </div>
    </td>
  </tr>
<?php } ?>
<script>
  function req_approval(id) {
    let data = [];
  
    data['id'] = id;
    
    console.log(data);
    
    let url = "<?= base_url().'master/studio/approval/set'; ?>";
    send_post_data(data, url, function() {
      close_approval_popup('popup');
      get_studio_list(<?= $page; ?>);
    }, true, false);
  };
  
  function get_approval_popup(id, type) {
    // console.log(id);
    // console.log(type);
    get_page2('approval_' + type, "<?= base_url().'master/studio/approval/'; ?>" + type + '?id=' + id, true, function() {
      $('.boxwrap__pop').show().children('#approval_' + type).show();
    });
  }
  function close_approval_popup(type) {
    $('.boxwrap__pop').hide().children('#approval_' + type).hide();
  };

</script>
