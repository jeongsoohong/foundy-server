<div class="item-content-qna-reply" id="item-content-qna-reply-1">
  <div class="qna-body">
    <span style="margin: 0 2px; color: saddlebrown;">Q:</span><?php echo $qna->qes_title; ?>
    <pre><?php echo $qna->qes_body; ?></pre>
  </div>
  <?php if ($qna->replied) { ?>
    <div class="qna-reply">
      <pre><span style="margin: 0 2px; color: saddlebrown;">A:</span><?php echo $qna->reply; ?></pre>
    </div>
  <?php } ?>
</div>
