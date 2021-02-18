<div class="stu_box stu_val class_box topic_box" style="margin-bottom: 12px;">
  <p class="type_tit stu_tit youtube_tit" style="padding: 4px 0 24px;">
    <!--  -->
    <span class="youtube_class"><?= $video->title; ?></span>
  </p>
  <button class="stu_btn btn_save save_youtube manage_youtube" onclick="open_manage_youtube()">저장</button>
  <!-- <div class="youtube_message">
       <span class="read theme:sns read:youtube">**유투브 동영상만 지원이 됩니다. 수업 분류 기타에 여러 분류 입력 시 공백으로 구분해 주세요.</span>
  </div> -->
</div>
<div class="stu_box stu_sns class_box">
  <dl class="type_detail stu_detail clearfix">
    <dt class="area_tit stu_name">타이틀</dt>
    <dd class="area_data name_data">
      <input class="data_name revise_tit" type="text" id="manage_youtube_title" value="<?= $video->title; ?>">
    </dd>
    <dt class="area_tit stu_name">수업 한줄 설명</dt>
    <dd class="area_data name_data">
      <input class="data_name revise_description" id="manage_youtube_desc" type="text" value="<?= $video->desc; ?>">
    </dd>
    <dt class="area_tit stu_name">유튜브 정보</dt>
    <dd class="area_data name_data">
      <input class="data_name gray_bg revise_info" value="<?= (int)($video->playtime/60); ?>분<?= $video->playtime%60;?>초&middot;조회수<?= $video->view; ?>&middot;좋아요<?= $video->like; ?>&middot;스크랩<?= $video->bookmark; ?>" type="text" disabled>
    </dd>
    <dt class="area_tit stu_name">유튜브 url</dt>
    <dd class="area_data name_data">
      <input class="data_name gray_bg revise_url" value="<?= $video->video_url; ?>" type="url" disabled>
    </dd>
    <dt class="area_tit stu_name">수업분류</dt>
    <dd class="area_data name_data youtube_data">
      <p class="data_chkTip">수업 분류는 최대 3가지만 선택 가능합니다.</p>
      <div class="stu_yoga stu_class">
        <div class="class_chkbox">
          <p class="tit_sm">요가 클래스</p>
          <div class="chkbox_line clearfix" id="manage_youtube_category">
            <?php
            $categories = $this->db->order_by('category_id', 'asc')->get('category_class')->result();
            foreach ($categories as $category) {
              $category_id = $category->category_id;
              $name = $category->name;
              ?>
              <label class="form-chk col_sp">
                <input <?php if(in_array($name,$category_data)){ echo 'checked'; }?>
                  id="<?php echo $category_id; ?>" name="category" type="checkbox" value="<?= $name; ?>">
                <?= $name; ?>
              </label>
              <?php
            }
            ?>
            <label class="form-chk col_sp">
              <input <? if (!empty($category_etc)) echo 'checked'; ?> id="manage_chkbox_etc" type="checkbox" name="number"> 기타
              <span class="write_padding">
                <input type="text" class="chk_write chk_write2" id="manage_category_etc" name="category_yoga_etc"
                       value="<?= $category_etc; ?>">
              </span>
            </label>
          </div>
        </div>
      </div>
    </dd>
  </dl>
</div>
<script>
</script>
