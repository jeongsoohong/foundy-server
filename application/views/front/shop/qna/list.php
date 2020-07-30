<?php foreach ($qna_data as $qna) { ?>
  <li>
    <div class="item-content-qna-qes">
      <a href="javascript:void(0);" onclick="get_reply(this, <?php echo $qna->qna_id; ?>)" data-private="<?php echo $qna->is_private; ?>">
        <div class="qna-list-li" id="qna-list-li-<?php echo $qna->qna_id; ?>">
          <h6 class="qna-title" id="qna-title-<?php echo $qna->qna_id; ?>">
            <?php echo ($qna->is_private ? '비공개 글입니다.' : $qna->qes_title); ?>
            <span class="pull-right fa fa-angle-down"></span>
          </h6>
          <span style="color: grey; font-size: 10px; ">
            <?php
            $p = strchr($qna->user->email, '@');
            echo substr($qna->user->email, 0, 3).'***'. $p.' | '. $qna->qes_at;
            ?>
          </span>
          <?php if ($qna->replied) { ?>
            <a href="javascript:void(0);">
              <span class="qna-replied" >답변완료</span>
            </a>
          <?php } ?>
        </div>
      </a>
    </div>
  </li>
<?php } ?>
