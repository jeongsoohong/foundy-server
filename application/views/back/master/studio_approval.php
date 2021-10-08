<h3 class="meaning">온라인스튜디오 관리</h3>
<div class="type_wrap">
  <p class="type_tit slide_tit font-futura">Approve Online</p>
  <div class="type_box shadow">
    <div class="type_named">
      <div class="namedBtn clearfix">
        <button class="named-fn addBtn disabledBtn" style="margin-right: 28px;"><span>+</span> 추가</button>
        <span class="named-txt font-futura">or</span>
        <button class="named-fn removeBtn"><span>-</span> 삭제</button>
      </div>
      <div class="named-wrap">
        <!-- 리스트 보기 클릭시 내용 -->
        <div class="named-list">
          <div class="list-tool clearfix">
            <div class="tool-box">
              <input type="text" placeholder="Search" class="tool__txt">
              <div class="tool__btn">
                <button class="btn--fn btn--refresh">
                  <img src="<?= base_url(); ?>template/back/master/icon/ic_refresh.png" width="auto" height="18">
                </button>
                <button class="btn--fn">pdf</button>
                <button class="btn--fn">csv</button>
                <button class="btn--fn">xls</button>
              </div>
            </div>
          </div>
          <div class="list-table">
            <div class="table-media tableBody">
              <table class="table-box manage_table">
                <colgroup>
                  <col width="4%">
                  <col width="9%">
                  <col width="15%">
                  <col width="18%">
                  <col width="9%">
                  <col width="24%">
                </colgroup>
                <thead>
                <tr>
                  <th class="td-label chkTh">
                    <input class="chkAll chkAll_1" type="checkbox" name="chkAll" onclick="checkAll(this)">
                    <label class="chkLabel"></label>
                  </th>
                  <th>
                    <span class="th-span">로고</span>
                  </th>
                  <th>
                    <span class="th-span">스튜디오명</span>
                  </th>
                  <th>
                    <span class="th-span">이메일</span>
                  </th>
                  <th>
                    <span class="th-span">상태</span>
                  </th>
                  <th>
                    <span class="th-span">옵션</span>
                  </th>
                </tr>
                </thead>
              </table>
              <div class="scroll-y">
                <table>
                  <colgroup>
                    <col width="4%">
                    <col width="9%">
                    <col width="15%">
                    <col width="18%">
                    <col width="9%">
                    <col width="24%">
                  </colgroup>
                  <tbody id="studio_tbody_list">
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="list-btns-wrap clearfix">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    // 프로필 클릭 팝업
    $('.td-seeing').click(function(){
      $('.boxwrap__pop').show().children('div[class$="frame:studio"]').show();
      
      let hidden_studio = $(this).closest('.fn-td-btn').next().find('.stu--identity').text();
      let hidden_id = $(this).closest('.fn-td-btn').next().find('.pick--id').text();
      let t_name = $(this).closest('tr').find('td:eq(2)').find('.td-span').text();
      let t_email = $(this).closest('tr').find('td:eq(3)').find('.td-span').text();
      let hidden_insta = $(this).closest('.fn-td-btn').next().find('.stu--insta').text();
      let hidden_youtube = $(this).closest('.fn-td-btn').next().find('.stu--youtube').text();
      
      $('.stu__onlyId').text(hidden_studio);
      $('.stu__name').text(t_name);
      $('.stu__id').text(hidden_id);
      $('.stu__email').text(t_email);
      $('.stu__insta').text(hidden_insta);
      $('.stu__youtube').text(hidden_youtube);
    })
    
    // 상태변경 클릭 팝업
    $('.td-showType').click(function(){
      $('.boxwrap__pop').show().children('div[class$="frame:choice"]').show();
      
      let get_status = $(this).closest('.fn-td-btn').prev().find('.td-status').text();
      $('.result--data').val(get_status);
    })
  });

  let gPage = 1;
  let approval = '<?= $tab; ?>';
  let activate = '<?= $activate; ?>';
  function get_studio_list(page) {
    gPage = page;
    get_page2('studio_' + approval + ' #studio_tbody_list', "<?= base_url().'master/studio/approval/list?activate='.$activate.'&page='; ?>" + page, true, function() {
      get_page2('studio_' + approval + ' .list-btns-wrap', "<?= base_url().'master/studio/page/btn?tab='.$tab.'&page='; ?>" + page);
    });
  }
 
  $(function() {
    get_studio_list(gPage);
  });

  <!-- removeBtn 클릭이벤트 -->
  $('.removeBtn').click(function(){
    let txt = '정말 삭제하시겠습니까?'
    let checked = $(this).parent().next().find('.chkTd').children('input[name=chkPiece]:checked');
    
    // console.log(checked);
    if(checked.length > 0) {
      if (confirm(txt)) {
        let url = '<?php echo base_url()."master/studio/approval/del"; ?>';
        let data = [];
        let studio_ids = [];
  
        checked.each(function(i,e) {
          studio_ids[i] = $(e).data('id');
        });
        
        data['ids'] = JSON.stringify(studio_ids);
        // console.log(data);
        
        send_post_data(data, url, function() {
          get_studio_list(gPage);
        }, true, false);
      }
      
    } else {
      alert('삭제하려는 항목의 체크박스를 선택해주세요!');
    }
  })
</script>
