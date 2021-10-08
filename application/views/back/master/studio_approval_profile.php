<button class="frame_close" onclick="close_approval_popup('profile')">
  <img src="<?= base_url(); ?>template/back/center/imgs/icon_close_black.png" alt="" width="12" height="12" style="opacity: 0.5;">
</button>
<div class="cnt_btns confirm_btn" style="background-color: #fff;">
  <button class="btn_cancel font-futura" onclick="close_approval_popup('profile')">CANCEL</button>
</div>
<div class="frame_wrap">
  <div class="frame_tit">
    <p class="tit_name font-futura">view_profile</p>
    <div class="tit_display">
      <span class="display_centerImg">
        <img src="<?= base_url(); ?>uploads/vendor_logo_image/default.jpg" alt="" width="46" height="46" class="span-img">
      </span>
      <p class="display-type">
        <span class="stu__onlyId">
          <?= $studio->studio_id; ?>
        </span><br>
        <span class="type-name" style="padding: 0;">studio</span>
      </p>
    </div>
    <div class="tit_table table_form:center">
      <div class="table_scroll scroll-y" style="height: 243px;">
        <table class="mail_table">
          <colgroup>
            <col width="20%">
            <col width="80%">
          </colgroup>
          <tbody>
          <tr>
            <th>스튜디오명</th>
            <td class="stu__name">
              <?= $studio->title; ?>
            </td>
          </tr>
          <tr>
            <th>유저아이디</th>
            <td class="stu__id">
              <?= $user->email; ?>
            </td>
          </tr>
          <tr>
            <th>스튜디오이메일</th>
            <td class="stu__email">
              <?= $studio->email; ?>
            </td>
          </tr>
          <tr>
            <th>인스타그램</th>
            <td>
              <div class="space:layer">
                <div class="layer--position stu__insta scroll-x">
                  <?= $studio->instagram; ?>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <th>유튜브</th>
            <td>
              <div class="space:layer">
                <div class="layer--position stu__youtube scroll-x">
                  <?= $studio->youtube; ?>
                </div>
              </div>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
