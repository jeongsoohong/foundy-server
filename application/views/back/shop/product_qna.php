<style>
  button,select {
    width: 100%;
    height: 32px;
    font-size: 12px;
  }
  .product-content table tr {
    height: 40px;
    font-size: 12px;
    text-align: center;
  }
  .product-content table tr th {
    text-align: center;
  }
  .product-content table tr td {
    padding: 5px 15px;
  }
  .product-content table tr td div {
    padding-left: 0;
    padding-right: 0;
    line-height: 32px;
  }
  .bootstrap-datetimepicker-widget.dropdown-menu {
    width: auto !important;
  }
  .qna-list table thead,.qna-list table tbody {
    border: 1px solid #EAEAEA;
  }
</style>
<div class="col-md-12 product-meta">
<!--  <div class="col-md-12" id="page-title">-->
<!--    <h1 class="page-header text-overflow">상품관리 <span class="fa fa-angle-right"></span> 상품Q&A</h1>-->
<!--  </div>-->
  <div class="col-md-12">
    <table class="col-md-12">
      <tbody>
      <tr>
        <th class="col-md-1">브랜드</th>
        <td class="col-md-4">
          <select class="form-control brand-category">
            <option value="<?php echo $shop_data->shop_name; ?>"><?php echo $shop_data->shop_name; ?></option>
          </select>
        </td>
        <th class="col-md-1">답변여부</th>
        <td class="col-md-4">
          <select class="form-control reply-state">
            <option <?php if (!$replied) echo 'selected'; ?>  value="0">미처리</option>
            <option <?php if ($replied) echo 'selected'; ?> value="1">답변완료</option>
          </select>
        </td>
        <td class="col-md-2">
          <button class="product-search btn-dark" onclick="search_qna_page();">검색</button>
        </td>
      </tr>
      <tr>
        <th class="col-md-1">고객명</th>
        <td class="col-md-4">
          <input disabled class="form-control customer_name" type="text" name="customer_name" alt="" />
        </td>
        <th class="col-md-1">상품명</th>
        <td class="col-md-4">
          <input disabled class="form-control product_name" type="text" name="product_name" alt="" />
        </td>
        <td class="col-md-2">
        </td>
      </tr>
      <tr>
        <th class="col-md-1">등록기간</th>
        <td class="col-md-4">
          <div class='input-group date' id='datetimepicker1'>
            <input value="<?php echo $start_date; ?>" type='text' class="form-control" id="start-date" name="start_date"/>
            <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
            </span>
          </div>
        </td>
        <td class="col-md-1">
          ~
        </td>
        <td class="col-md-4">
          <div class='input-group date' id='datetimepicker2'>
            <input value="<?php echo $end_date; ?>" type='text' class="form-control" id="end-date" name="end_date"/>
            <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
            </span>
          </div>
        </td>
        <td class="col-md-2">
        </td>
      </tr>
      </tbody>
    </table>
  </div>
</div>
<div class="col-md-12">
  <hr style="width: 100%; border: 1px solid #EAEAEA">
</div>
<div class="col-md-12 qna-list">
  <table class="col-md-12">
    <thead>
    <tr>
      <th class="col-md-1">아이디</th>
      <th class="col-md-1">브랜드</th>
      <th class="col-md-2">상품명</th>
      <th class="col-md-1">고객명</th>
      <th class="col-md-4">문의내용</th>
      <th class="col-md-1">등록일시</th>
      <th class="col-md-1">답변여부</th>
      <th class="col-md-1">답변등록일시</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($qna_data as $qna) { ?>
    <tr>
      <td class="col-md-1"><?php echo $qna->qna_id; ?></td>
      <td class="col-md-1"><?php echo $qna->shop_name; ?></td>
      <td class="col-md-2"><?php echo $qna->item_name; ?></td>
      <td class="col-md-1"><?php echo $qna->email; ?></td>
      <td class="col-md-4">
        <a href="javascript:void(0);" onclick="get_qna(<?php echo $qna->qna_id; ?>)">
          <?php echo $qna->qes_title; ?>
        </a>
      </td>
      <td class="col-md-1"><?php echo $qna->qes_at; ?></td>
      <td class="col-md-1"><?php echo ($qna->replied == 1 ? 'Y' : 'N'); ?></td>
      <td class="col-md-1"><?php echo ($qna->replied == 1 ? $qna->reply_at : '-'); ?></td>
    </tr>
    <?php } ?>
    </tbody>
  </table>
</div>
<style>
  .item-list-pagination {
    padding: 15px;
    text-align: center;
  }
  .item-list-pagination div ul {
    display: flex;
  }
  .item-list-pagination div ul li {
    width: 30px;
    height: 30px;
    line-height: 30px;
    color: #DBDBDB;
    text-align: center;
    font-size: 14px;
  }
  .item-list-pagination div ul li.li-empty {
    border: none;
  }
  .item-list-pagination div ul li.active {
    color: #353535;
  }
</style>
<div class="col-md-12 item-list-pagination">
  <div class="col-md-4">
  </div>
  <div class="col-md-4">
    <ul class="nav">
      <li class="col-md-1 li-empty"></li>
      <li class="col-md-1 li-empty"></li>
      <li class="col-md-1 li-empty"></li>
      <?php if ($prev>= 2) { ?>
        <a href="javascript:void(0);" onclick="get_qna_page('1');"><li class="col-md-1"><span class="fa fa-angle-double-left"></span></li></a>
        <a href="javascript:void(0);" onclick="get_qna_page('<?php echo $prev - 1; ?>');"><li class="col-md-1"><span class="fa fa-angle-left"></span></li></a>
      <?php } else { ?>
        <li class="col-md-1 li-empty"></li>
        <li class="col-md-1 li-empty"></li>
      <?php }?>
      <?php if ($prev == '') { ?>
        <li class="col-md-1 li-empty"></li>
      <?php } else { ?>
        <a href="javascript:void(0);" onclick="get_qna_page('<?php echo $prev; ?>');"><li class="col-md-1"><?php echo $prev; ?></li></a>
      <?php }?>
      <li class="col-md-1 active"><?php echo $page; ?></li>
      <?php if ($next == '') { ?>
        <li class="col-md-1 li-empty"></li>
      <?php } else { ?>
        <a href="javascript:void(0);" onclick="get_qna_page('<?php echo $next; ?>');"><li class="col-md-1"><?php echo $next; ?></li></a>
      <?php }?>
      <?php if ($total - $page >= 2) { ?>
        <a href="javascript:void(0);" onclick="get_qna_page('<?php echo $next + 1; ?>');"><li class="col-md-1"><span class="fa fa-angle-right"></span></li></a>
        <a href="javascript:void(0);" onclick="get_qna_page('<?php echo $total; ?>');"><li class="col-md-1"><span class="fa fa-angle-double-right"></span></li></a>
      <?php } else { ?>
        <li class="col-md-1 li-empty"></li>
        <li class="col-md-1 li-empty"></li>
      <?php }?>
      <li class="col-md-1 li-empty"></li>
      <li class="col-md-1 li-empty"></li>
      <li class="col-md-1 li-empty"></li>
    </ul>
  </div>
  <div class="col-md-4">
  </div>
</div>
<div class="modal fade" id="qnaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="width: 5px; padding: 0 15px">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="qna-title">
        </h4>
      </div>
      <div class="modal-body" style="padding-top: 0 !important;">
        <div class="qna-title" style="height: 15px; line-height: 10px; border-bottom: 1px solid #EAEAEA; margin-bottom: 10px;">
<!--          <span class="qna-title" id="qna-title">-->
<!--          </span>-->
          <span id="qna-meta" style="color: grey; font-size: 10px; "></span>
          <span id="qna-replied" style="color: grey; font-size: 10px"></span>
          <!--          <label style="width: 100%; font-size: 14px; border: none">-->
<!--            제목-->
<!--            <input readonly type="text" class="form-control" id="qna-title" name="qna_title">-->
<!--          </label>-->
        </div>
        <div class="qna-body">
          <label style="width: 100%; font-size: 16px">
            문의 내용
            <textarea readonly rows="10" data-height="500" name='qna_body' id='qna-body' class="form-control" wrap="hard"></textarea>
          </label>
        </div>
        <div class="reply-body">
          <label style="width: 100%; font-size: 16px;">
            답변
            <textarea readonly rows="10" data-height="500" name='qna_reply' id='qna-reply' class="form-control" wrap="hard"></textarea>
          </label>
        </div>
      </div>
      <div class="modal-footer" style="display: block;">
        <button type="button" class="btn btn-danger btn-theme-sm" style="width: 20%;"
                onclick="edit_qna();">수정</button>
        <button type="button" class="btn btn-theme btn-theme-sm" style="text-transform: none; background-color: black; color:white; width:20%; font-weight: 400;"
                onclick="submit_reply();">저장</button>
      </div>
    </div>
  </div>
</div>
<script>

  let page = <?php echo $page; ?>;
  let replied = <?php echo $replied; ?>;
  let start_date = '<?php echo $start_date; ?>';
  let end_date = '<?php echo $end_date; ?>';
 
  let qna_id = 0;
  
  function submit_reply() {
    let qna_reply = $('#qna-reply').val();
    
    // console.log(qna_id);
    // console.log(qna_reply);
    
    let formData = new FormData();
    formData.append('qna_id', qna_id);
    formData.append('qna_reply', qna_reply);
  
    $.ajax({
      url: '<?php echo base_url(); ?>shop/product/qna/reply',
      type: 'post', // form submit method get/post
      dataType: 'html',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        // console.log(data);
        if (data === 'done' || data.search('done') !== -1) {
          $.notify({
            message: '저장되었습니다.',
            icon: 'fa fa-check'
          }, {
            type: 'success',
            timer: 1000,
            delay: 2000,
            animate: {
              enter: 'animated lightSpeedIn',
              exit: 'animated lightSpeedOut'
            }
          });
          setTimeout(function(){location.reload();}, 1000);
        } else {
          var title = '<strong>실패하였습니다</strong>';
          $.notify({
            title: title,
            message: data,
            icon: 'fa fa-check'
          }, {
            type: 'warning',
            timer: 1000,
            delay: 5000,
            animate: {
              enter: 'animated lightSpeedIn',
              exit: 'animated lightSpeedOut'
            }
          });
        }
      },
      error: function (e) {
        console.log(e);
      }
    });
  }

  function edit_qna() {
    // console.log($('#qna-reply'));
    $('#qna-reply').attr('readonly', false);
    $('#qna-reply').focus();
  }
  
  function close_qna() {
    $('#qnaModal').modal('hide');
  }

  function get_qna(qid) {
    let modal = $('#qnaModal');
 
    qna_id = qid;
    // console.log(qna_id);
  
    $.ajax({
      url: '<?php echo base_url(); ?>shop/product/qna/get?qid=' + qna_id,
      type: 'GET', // form submit method get/post
      cache: false,
      contentType: 'application/json',
      processData: false,
      success: function (res) {
        // console.log(res);
        let qna = JSON.parse(res);
        // console.log(qna);
        // console.log(qna.qes_title);
        // console.log(qna.qes_body);
        // console.log(qna.reply);
        // console.log(qna.replied);
        // console.log(qna.reply_at);
        $('#qna-title').text(qna.qes_title);
        $('#qna-meta').text(qna.email + ' | ' + qna.qes_at);
        $('#qna-body').val(qna.qes_body);
        $('#qna-reply').val(qna.reply);
        
        let replied = ' | 미답변';
        if (qna.replied === '1') {
          replied = ' | 답변완료(' + qna.reply_at + ')';
        } else {
          edit_qna();
        }
        $('#qna-replied').text(replied);
        
        modal.modal('show');
        modal.appendTo('body');
        
        if (qna.replied === '0') {
          edit_qna();
        }
      },
      error: function (e) {
        console.log(e);
      }
    });
  
  }

  function get_qna_page(page) {
    // console.log(replied);
    // console.log(start_date);
    // console.log(end_date);

    $(".product-content").html(loading_set);
    $(".product-content").load(
      encodeURI(
        "<?php echo base_url();?>shop/product/qna?page=" + page + "&replied=" + replied + '&start_date=' + start_date + '&end_date=' + end_date
      )
    );
  };

  function search_qna_page() {
    let _replied = $('.reply-state').find('option:selected').val();
    let _start_date = $('#start-date').val();
    let _end_date = $('#end-date').val();

    // console.log(_replied);
    // console.log(_start_date);
    // console.log(_end_date);

    $(".product-content").html(loading_set);
    $(".product-content").load(
      encodeURI(
        "<?php echo base_url();?>shop/product/qna?page=1&replied=" + _replied + '&start_date=' + _start_date + '&end_date=' + _end_date
      )
    );
  }
</script>
<script>
  $(document).ready(function(){
    $('#datetimepicker1').datetimepicker();
    $('#datetimepicker2').datetimepicker();
  });
</script>
