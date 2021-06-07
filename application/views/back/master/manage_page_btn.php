<?
$func_name = 'get_'.$tab.'_list';
$last_page = (int)(($total % $page_size == 0) ? ($total / $page_size) : ($total / $page_size + 1));
?>
<p class="list_tableList font-futura">
  <!-- Showing 1 to 10 of 'N' rows, 1:start 10: max 'N':all -->
  Showing <?= $page_size * ($page - 1) + 1; ?> to
  <span class="tableList-Max"><?= $total >= $page_size * $page ? $page_size * $page : $total; ?></span> of
  <span class="tableList-All"><?= $total ; ?></span> rows
</p>
<div class="list_tableBtns clearfix">
  <button class="btn__front" onclick="<?= $func_name.'(1)'; ?>">
    <span class="frontDirection front1"></span>
    <span class="frontDirection front1"></span>
  </button>
  <? if ($page <= 1) { ?>
    <button class="btn__bringToFront" disabled>
      <span class="frontDirection front2"></span>
    </button>
  <? } else { ?>
    <button class="btn__bringToFront" onclick="<?= $func_name.'('.($page-1).')'; ?>">
      <span class="frontDirection front2"></span>
    </button>
  <? } ?>
  
  <!-- 버튼 클릭시 넘버링 바뀌면서 다음 테이블 순번으로 넘기기 -->
  <button class="btn__listNo"><?= $page; ?></button>
 
  <? if ($last_page <= $page) { ?>
    <button class="btn__sendToBack" disabled>
      <span class="backDirection back1"></span>
    </button>
  <? } else { ?>
    <button class="btn__sendToBack" onclick="<?= $func_name.'('.($page+1).')'; ?>">
      <span class="backDirection back1"></span>
    </button>
  <? } ?>
  <button class="btn__back" onclick="<?= $func_name.'('.$last_page.')'; ?>">
    <span class="backDirection back2"></span>
    <span class="backDirection back2"></span>
  </button>
</div>
<script>
  $(function(){
    $('.list_tableBtns button').hover(function(){
      // btn__front,back
      $(this).addClass('listActive');
      $(this).children('span[class*=front]').css({
        border : '1px solid #433532',
        'border-width' : '0 2px 2px 0'
      });
      $(this).children('span[class*=back]').css({
        border : '1px solid #433532',
        'border-width' : '0 2px 2px 0'
      });
      $(this).next().css('border-left','0');
    },function(){
      // btn__front,back
      $(this).removeClass('listActive');
      $(this).children('span[class*=front]').css({
        border : '1px solid #e0e0e0',
        'border-width' : '0 2px 2px 0'
      });
      $(this).children('span[class*=back]').css({
        border : '1px solid #e0e0e0',
        'border-width' : '0 2px 2px 0'
      });
      $(this).next().css('border-left','1px solid #e0e0e0');
      $(this).next('.btn__listNo').css('border','0');
    })
  })
</script>
