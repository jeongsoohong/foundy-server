<style>
  button,select {
    width: 100%;
    height: 32px;
    font-size: 12px;
  }
  .notice-content table tr {
    height: 40px;
    font-size: 12px;
    text-align: center;
  }
  .notice-content table tr th {
    text-align: center;
  }
  .notice-content table tr td {
    padding: 5px 15px;
  }
  .notice-content table tr td div {
    padding-left: 0;
    padding-right: 0;
    line-height: 32px;
  }
  .notice-list table thead,.notice-list table tbody {
    border: 1px solid #EAEAEA;
  }
  .notice-list .notice-title {
    text-align: left;
  }
</style>
<div id="content-container">
  <div id="page-title">
    <h1 class="page-header text-overflow">공지사항</h1>
  </div>
  <div class="notice-content" id="page-content">
    <div class="row">
      <div class="col-md-12">
        <table class="col-md-12">
          <tbody>
          <tr>
            <td class="col-md-10">
              <input value="<?php echo $q; ?>" id="query" class="form-control" value="" type="text" name="notice-search" alt="" placeholder="검색정보를 입력하세요"/>
            </td>
            <td class="col-md-2">
              <button class="notice-search-btn btn-dark" onclick="search_notice_page()">검색</button>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-12">
        <hr style="width: 100%; bnotice: 1px solid #EAEAEA">
      </div>
      <div class="col-md-12 notice-list">
        <table class="col-md-12">
          <thead>
          <tr>
            <th class="col-md-8">타이틀</th>
            <th class="col-md-2">작성자</th>
            <th class="col-md-2">등록일</th>
          </tr>
          </thead>
          <tbody>
          <?php foreach ($notice_data as $notice) { ?>
            <tr>
              <td class="col-md-8 notice-title" >
                <a href="javascript:void(0);" onclick="get_notice(<?php echo $notice->blog_id; ?>)">
                  <?php echo $notice->title; ?>
                </a>
              </td>
              <td class="col-md-2">FOUNDY</td>
              <td class="col-md-2"><?php echo $notice->modified_at; ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-12 item-list-pagination">
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
      <ul class="nav">
        <li class="col-md-1 li-empty"></li>
        <li class="col-md-1 li-empty"></li>
        <li class="col-md-1 li-empty"></li>
        <?php if ($prev>= 2) { ?>
          <a href="javascript:void(0);" onclick="get_notice_page('1');"><li class="col-md-1"><span class="fa fa-angle-double-left"></span></li></a>
          <a href="javascript:void(0);" onclick="get_notice_page('<?php echo $prev - 1; ?>');"><li class="col-md-1"><span class="fa fa-angle-left"></span></li></a>
        <?php } else { ?>
          <li class="col-md-1 li-empty"></li>
          <li class="col-md-1 li-empty"></li>
        <?php }?>
        <?php if ($prev == '') { ?>
          <li class="col-md-1 li-empty"></li>
        <?php } else { ?>
          <a href="javascript:void(0);" onclick="get_notice_page('<?php echo $prev; ?>');"><li class="col-md-1"><?php echo $prev; ?></li></a>
        <?php }?>
        <li class="col-md-1 active"><?php echo $page; ?></li>
        <?php if ($next == '') { ?>
          <li class="col-md-1 li-empty"></li>
        <?php } else { ?>
          <a href="javascript:void(0);" onclick="get_notice_page('<?php echo $next; ?>');"><li class="col-md-1"><?php echo $next; ?></li></a>
        <?php }?>
        <?php if ($total - $page >= 2) { ?>
          <a href="javascript:void(0);" onclick="get_notice_page('<?php echo $next + 1; ?>');"><li class="col-md-1"><span class="fa fa-angle-right"></span></li></a>
          <a href="javascript:void(0);" onclick="get_notice_page('<?php echo $total; ?>');"><li class="col-md-1"><span class="fa fa-angle-double-right"></span></li></a>
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
</div>
<div class="modal fade" id="noticeModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" style="padding-top: 50px;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="width: 5%">
          <span class="pull-right" aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="noticeModalTitle"></h4>
      </div>
      <div class="modal-body" id="noticeModalDesc">
      </div>
      <div class="modal-footer" style="display: block;">
<!--        <button type="button" class="btn btn-danger btn-theme-sm" data-dismiss="modal">취소</button>-->
        <button type="button" class="btn btn-theme btn-theme-sm" onclick="close_notice()"
                style="text-transform: none; width: 20%; font-weight: 400; color: #fff; background-color: black">확인</button>
      </div>
    </div>
  </div>
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
<script>

  let page = <?php echo $page; ?>;
  let query = '<?php echo $q; ?>';
  
  function close_notice() {
    $('#noticeModal').modal('hide');
  }

  function get_notice(nid) {
    let modal = $('#noticeModal');
  
    // console.log(nid);
  
    $.ajax({
      url: '<?php echo base_url(); ?>shop/notice/detail?nid=' + nid,
      type: 'GET', // form submit method get/post
      cache: false,
      contentType: 'application/json',
      processData: false,
      success: function (res) {
        let notice = JSON.parse(res);
        // console.log(notice);
        $('#noticeModalTitle').text(notice.title);
        $('#noticeModalDesc').html(notice.description);
        
        modal.modal('show');
        modal.appendTo('body');
      },
      error: function (e) {
        console.log(e);
      }
    });
  }

  function get_notice_page(page) {
    console.log(query);
    window.location.href = encodeURI("<?php echo base_url();?>shop/notice?page=" + page + "&q=" + query);
  }

  function search_notice_page() {
    let _query = $('#query').val();
    console.log(_query);
    window.location.href = encodeURI("<?php echo base_url();?>shop/notice?page=" + page + "&q=" + _query);
  }
</script>