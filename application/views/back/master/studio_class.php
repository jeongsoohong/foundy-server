<h3 class="meaning">온라인 클래스 관리</h3>
<div class="type_wrap">
  <p class="type_tit slide_tit font-futura">Recommend Zoom-class</p>
  <div class="type_box_wrap">
    <!-- Zoom-class -->
    <div class="type_box shadow">
      <p class="type__shopTit modify__shopTit">줌 클래스 추천</p>
      <div class="type__shopCnt shop-best zoom__zone">
        <div class="zoom--cnts">
          <div class="search-wrapper clearfix" style="position: relative;">
            <div class="shop--search form_val search:zoom">
              <input class="search-input val-input" id="class_keyword" placeholder="클래스 이름(수업명)을 검색하세요">
              <!-- 검색 -->
              <button class="search-btn val-search" onclick="searchClass();">
                <img src="<?= base_url(); ?>template/back/master/icon/ic_search.png" alt="검색" width="auto" height="16">
              </button>
            </div>
          </div>
          <p class="shop--searchLesson" style="display: none;">클래스 검색 결과</p>
          <div class="shop--searchBox modify--searchBox" style="display: none;">
          </div>
          <div class="confirmGroup clearfix" style="margin-top: 20px;">
            <p class="confirmGroup--tit pull-left">클래스 그룹</p>
            <div class="confirmGroup--addBtn namedBtn pull-right clearfix">
              <button class="named-fn addGroup" onclick="addGroup();"><span>+</span>그룹 추가</button>
            </div>
          </div>
          <div class="tableBox-wrapper">
            <? foreach ($schedule_groups as $group) { ?>
              <div class="tableBox" id="group-<?= $group->schedule_group_id; ?>" data-id="<?= $group->schedule_group_id; ?>">
                <div class="zoomcnt-name clearfix">
                  <div class="name_rewrite pull-left">
                    <input class="type__shopTit type__zoomTit" name="group_name" type="text" value="<?= $group->schedule_group_name; ?>" readonly="readonly">
                    <button class="btn__rewrite">
                      <img src="<?= base_url(); ?>template/back/master/icon/ic_rewrite_white.png" alt="다시 쓰기" width="16" height="17" class="margin-auto">
                    </button>
                  </div>
                  <div class="namedBtn shortBtn lessonBtn pull-left clearfix">
                    <button class="named-fn shortBtn removeLesson" onclick="deleteClass(this);"><span>-</span>클래스 삭제</button>
                  </div>
                  <div class="namedBtn shortBtn lessonBtn pull-left clearfix">
                    <button class="named-fn shortBtn removeGroup" style="width: 110px;" onclick="removeGroup(this)"><span>-</span>그룹 삭제</button>
                  </div>
                  <button class="named-fn saveLesson">
                    <div class="saveLesson-div">
                      <p class="btn-tip-detail tip-detail-case detail-fontStyle" style="width: auto;" onclick="applyGroup(this);">저장</p>
                    </div>
                    <div class="saveLesson-btn">
                      <img src="<?= base_url(); ?>template/back/master/icon/ic_btnSave.png" class="margin-auto" alt="스케줄 전체 보기" width="16" height="15">
                    </div>
                  </button>
                </div>
                <!-- 테이블 -->
                <div class="shop--table list-table auto-height">
                  <div class="table-media tableBody">
                    <table class="table-box manage_table">
                      <colgroup>
                        <col width="4%">
                        <col width="14%">
                        <col width="18%">
                        <col width="24%">
                        <col width="15%">
                        <col width="12%">
                        <col width="13%">
                      </colgroup>
                      <thead>
                      <tr>
                        <th class="td-label chkTh">
                          <input class="chkAll chkAll_3" type="checkbox" name="chkAll" onclick="checkAll(this)">
                          <label class="chkLabel"></label>
                        </th>
                        <th>
                          <span class="th-span">수업일</span>
                        </th>
                        <th>
                          <span class="th-span">시간</span>
                        </th>
                        <th>
                          <span class="th-span">수업명</span>
                        </th>
                        <th>
                          <span class="th-span">강사</span>
                        </th>
                        <th>
                          <span class="th-span">예약정원</span>
                        </th>
                        <th>
                          <span class="th-span">순서</span>
                        </th>
                      </tr>
                      </thead>
                    </table>
                    <div class="table-scroll auto-height zoom-table scroll-y">
                      <table>
                        <colgroup>
                          <col width="4%">
                          <col width="14%">
                          <col width="18%">
                          <col width="24%">
                          <col width="15%">
                          <col width="12%">
                          <col width="13%">
                        </colgroup>
                        <tbody>
                        <? foreach ($group->schedule_infos as $schedule) { ?>
                          <tr data-id="<?= $schedule->schedule_info_id; ?>" data-group="<?= $group->schedule_group_id; ?>">
                            <td class="td-label chkTd">
                              <input class="chkPiece" type="checkbox" name="chkPiece">
                              <label class="chkLabel"></label>
                            </td>
                            <td>
                              <span class="td-span">
                                <?= date('Y.m.d', strtotime($schedule->schedule_date)); ?>
                              </span>
                            </td>
                            <td>
                              <span class="td-span">
                                <?= date('H:i', strtotime($schedule->start_time)); ?>
                                ~
                                <?= date('H:i', strtotime($schedule->end_time)); ?>
                              </span>
                            </td>
                            <td>
                              <span class="td-span">
                               <?= $schedule->schedule_title; ?>
                              </span>
                            </td>
                            <td>
                              <span class="td-span">
                               <?= $schedule->teacher_name; ?>
                              </span>
                            </td>
                            <td>
                              <span class="td-span">
                               <?= $schedule->reservable_number; ?>
                              </span>
                            </td>
                            <td>
                              <div class="td-span">
                                <button class="go__toUp" onclick="swapClass($(this).closest('tr'),'up');"></button>
                                <button class="go__toDown" onclick="swapClass($(this).closest('tr'),'down');"></button>
                              </div>
                            </td>
                          </tr>
                        <? }  ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            <? } ?>
          </div>
        </div>
        <script>
          // 클래스 그룹명 입력/삭제 script
          $(function(){
            let text = $('.type__zoomTit').text();
            $('.type__zoomTit').on('click', function(){
              console.log(text);
              $(this).text(text);
            });
            $('.type__zoomTit').attr('readOnly',true).removeClass('boxshadow');
            $(document).on('click', '.btn__rewrite', function(){
              console.log(text);
              $(this).prev().text(text).addClass('boxshadow');
              $(this).prev().attr('readOnly',false).focus();
            });
            $(document).on('keyup', '.type__zoomTit', function(e){
              if(e.keyCode === 13){
                console.log('boxshadow');
                $(this).removeClass('boxshadow');
                $(this).attr('readOnly',true).blur();
              }
            });
          })
        </script>
      </div>
<!--      <div class="list-btns-wrap clearfix">-->
<!--        <p class="list_tableList font-futura">-->
          <!-- Showing 1 to 10 of 'N' rows, 1:start 10: max 'N':all -->
<!--          Showing 1 to <span class="tableList-Max">5</span> of <span class="tableList-All">5</span> rows-->
<!--        </p>-->
<!--        <div class="list_tableBtns clearfix">-->
<!--          <button class="btn__front">-->
<!--            <span class="frontDirection front1"></span>-->
<!--            <span class="frontDirection front1"></span>-->
<!--          </button>-->
<!--          <button class="btn__bringToFront">-->
<!--            <span class="frontDirection front2"></span>-->
<!--          </button>-->
<!--          -->
          <!-- 버튼 클릭시 넘버링 바뀌면서 다음 테이블 순번으로 넘기기 -->
<!--          <button class="btn__listNo">1</button>-->
<!--          -->
<!--          <button class="btn__sendToBack">-->
<!--            <span class="backDirection back1"></span>-->
<!--          </button>-->
<!--          <button class="btn__back">-->
<!--            <span class="backDirection back2"></span>-->
<!--            <span class="backDirection back2"></span>-->
<!--          </button>-->
<!--        </div>-->
<!--        <script>-->
<!--          $(function(){-->
<!--            $('.list_tableBtns button').hover(function(){-->
<!--              // btn__front,back-->
<!--              $(this).addClass('listActive');-->
<!--              $(this).children('span[class*=front]').css({-->
<!--                border : '1px solid #433532',-->
<!--                'border-width' : '0 2px 2px 0'-->
<!--              });-->
<!--              $(this).children('span[class*=back]').css({-->
<!--                border : '1px solid #433532',-->
<!--                'border-width' : '0 2px 2px 0'-->
<!--              });-->
<!--              $(this).next().css('border-left','0');-->
<!--            },function(){-->
<!--              // btn__front,back-->
<!--              $(this).removeClass('listActive');-->
<!--              $(this).children('span[class*=front]').css({-->
<!--                border : '1px solid #e0e0e0',-->
<!--                'border-width' : '0 2px 2px 0'-->
<!--              });-->
<!--              $(this).children('span[class*=back]').css({-->
<!--                border : '1px solid #e0e0e0',-->
<!--                'border-width' : '0 2px 2px 0'-->
<!--              });-->
<!--              $(this).next().css('border-left','1px solid #e0e0e0');-->
<!--              $(this).next('.btn__listNo').css('border','0');-->
<!--            })-->
<!--          })-->
<!--        </script>-->
<!--      </div>-->
    </div>
  </div>
</div>
<script>
  // $(function(){
    // file_arrow 호버
    // $('.file_form_open').hover(function(){
    //   $(this).find('.file_arrow').css('transform','rotate(225deg)')
    //     .addClass('arrow_hover');
    // },function(){
    //   $(this).find('.file_arrow').css('transform','rotate(45deg)')
    //     .removeClass('arrow_hover');
    // })
  // })
  // $(function(){
  //     $(".frame_type .group--val").on("change keyup paste", function() {
  //         // 현재 변경된 데이터 셋팅
  //         newValue = $(this).val();
  //
  //         // 현재 실시간 데이터 표츌
  //         alert("텍스트 :: " + newValue);
  //     });
  //
  //     $('.push_tr_td').click(function(){
  //         // val 갖고 오기
  //
  //
  //         // val 해당 group에 테이블 tr td 넣기
  //
  //         /* if문 1번째 테이블 목록이 생성되지 않은 경우: insertAfter
  //            if문 1~5번째 테이블 목록이 생성된 경우: prependTo, appendTo */
  //     })
  // })
</script>
<script>
  let maxGroupCount = <?= $this->studio_model::MAX_GROUP_COUNT; ?>;
  let maxGroupClassCount = <?= $this->studio_model::MAX_GROUP_SCHEDULE_COUNT; ?>;
  let groupCount = 0;
  let groupsMap = new Map();
  let newGroupCount = 0;
  let addClassId = 0;
 
  function setGroup(_group) {
    groupsMap.set(_group.id, _group);
    groupCount++;
  }
  function delGroup(_group) {
    groupsMap.delete(_group.id);
    groupCount--;
  }
  function addGroupInfo(id,title) {
    if (groupCount === maxGroupCount) {
      alert('클래스 그룹은 최대 ' + maxGroupCount + '개 까지만 추가가능합니다!');
      return false;
    }
    let g = {id:parseInt(id),title:title,classCount:0,classMap:new Map()};
    setGroup(g);
    // groupsMap.set(parseInt(id),g);
    // groupCount++;
  
    // console.log(groupCount);
    // console.log(groupsMap);
    return true;
  }
  
  function checkGroupTitle(_group) {
    let target = $('.tableBox-wrapper').find('.tableBox#group-'+ _group.id + ' input[name="group_name"]');
    // console.log(target);
    // console.log(target.val());
    _group.title = target.val();
  }
  
  function getGroupInfo(id) {
    let g = groupsMap.get(parseInt(id));
    checkGroupTitle(g);
    return g;
  }

  let group;
  let gid;
  let classDate;
  let classTime;
  let classTitle;
  let classTeacher;
  let classReservableNumber;
  <? foreach ($schedule_groups as $group) {
    echo "gid = {$group->schedule_group_id};\n";
    echo "addGroupInfo(gid, '{$group->schedule_group_name}');\n";
    echo "group = getGroupInfo(gid);\n";
    foreach ($group->schedule_infos as $schedule) {
      $start_time = date('H:i', strtotime($schedule->start_time));
      $end_time = date('H:i', strtotime($schedule->end_time));
      echo "addClassId = {$schedule->schedule_info_id};\n";
      echo "classDate = '{$schedule->schedule_date}';\n";
      echo "classTime = '{$start_time} ~ {$end_time}';\n";
      echo "classTitle = '{$schedule->schedule_title}';\n";
      echo "classTeacher = '{$schedule->teacher_name}'\n;";
      echo "classReservableNumber = {$schedule->reservable_number};\n";
      echo "group.classMap.set(parseInt(addClassId), {id:parseInt(addClassId),date:classDate,time:classTime,title:classTitle,teacher:classTeacher,reservableNumber:classReservableNumber});\n";
      echo "group.classCount++;\n";
    }
  }
  ?>

  function removeGroup(e) {
    let g = getGroupInfo($(e).closest('.tableBox').data('id'));
    // console.log(g);
    if(confirm( g.title + ' 그룹을 삭제하시겠습니까?') === true) {
      // console.log(g.id);
      if (g.id > 0) {
        let url = '<?php echo base_url()."master/studio/class/group/delete"; ?>';
        let data = [];
        
        data['id'] = g.id;
        // console.log(data);
        
        send_post_data(data, url, function() {
          $(e).closest('.tableBox').remove();
          delGroup(g);
        }, false, false);
      } else {
        $(e).closest('.tableBox').remove();
        delGroup(g);
      }
    }
    // console.log(groupsMap);
  }

  function addGroup() {
    if(length === maxGroupCount) {
      alert('클래스 그룹은 최대 ' + maxGroupCount + '개 까지만 추가가능합니다!');
      return;
    }
    
    let newGroupId = (-1) * (newGroupCount + 1);
    let newGroupTitle = '온라인 클래스 그룹 ' + (newGroupCount + 1);
    
    if (addGroupInfo(newGroupId, newGroupTitle) === false) {
      return;
    }
  
    newGroupCount++;
    // console.log(newGroupCount);
  
    let co_html = '<div class="tableBox" id="group-' + newGroupId + '" data-id="' + newGroupId + '">' +
      '<div class="zoomcnt-name clearfix" style="">' +
      '<div class="name_rewrite pull-left">' +
      '<input class="type__shopTit type__zoomTit" name="group_name" type="text" value="' + newGroupTitle + '" readonly="readonly">' +
      '<button class="btn__rewrite"><img src="<?= base_url(); ?>template/back/master/icon/ic_rewrite_white.png" alt="다시 쓰기" width="16" height="17" class="margin-auto"></button>' +
      '</div>' +
      '<div class="namedBtn shortBtn lessonBtn pull-left clearfix">' +
      '<button class="named-fn shortBtn removeLesson" onclick="deleteClass(this);">' +
      '<span>-</span>클래스 삭제' +
      '</button>' +
      '</div>' +
      '<div class="namedBtn shortBtn lessonBtn pull-left clearfix">' +
      '<button class="named-fn shortBtn removeGroup" style="width: 110px;" onclick="removeGroup(this);">' +
      '<span>-</span>그룹 삭제' +
      '</button>' +
      '</div>' +
      '<button class="named-fn saveLesson">' +
      '<div class="saveLesson-div">' +
      '<p class="btn-tip-detail tip-detail-case detail-fontStyle" style="width: auto;" onclick="applyGroup(this);">저장</p>' +
      '</div>' +
      '<div class="saveLesson-btn">' +
      '<img src="<?= base_url(); ?>template/back/master/icon/ic_btnSave.png" class="margin-auto" alt="스케줄 전체 보기" width="16" height="15">' +
      '</div>' +
      '</button>' +
      '</div>' +
      
      
      '<div class="shop--table list-table auto-height">' +
      '<div class="table-media tableBody">' +
      '<table class="table-box manage_table">' +
      '<colgroup>'
      + '<col width="4%">'
      + '<col width="14%">'
      + '<col width="18%">'
      + '<col width="24%">'
      + '<col width="15%">'
      + '<col width="12%">'
      + '<col width="13%">' +
      '</colgroup>' +
      '<thead>' +
      '<tr>' +
      '<th class="td-label chkTh">' +
      '<input class="chkAll chkAll_recommend" type="checkbox" name="chkAll" onclick="checkAll(this)">' +
      '<label class="chkLabel"></label>' +
      '</th>' +
      '<th>' +
      '<span class="th-span">수업일</span>' +
      '</th>' +
      '<th>' +
      '<span class="th-span">시간</span>' +
      '</th>' +
      '<th>' +
      '<span class="th-span">수업명</span>' +
      '</th>' +
      '<th>' +
      '<span class="th-span">강사</span>' +
      '</th>' +
      '<th>' +
      '<span class="th-span">예약정원</span>' +
      '</th>' +
      '<th>' +
      '<span class="th-span">순서</span>' +
      '</th>' +
      '</tr>' +
      '</thead>' +
      '</table>' +
      '<div class="table-scroll auto-height zoom-table scroll-y">' +
      '<table>' +
      '<colgroup>'
      + '<col width="4%">'
      + '<col width="14%">'
      + '<col width="18%">'
      + '<col width="24%">'
      + '<col width="15%">'
      + '<col width="12%">'
      + '<col width="13%">' +
      '</colgroup>' +
      '<tbody>' +
      
      '</tbody>' +
      '</table>' +
      '</div>' +
      '</div>' +
      '</div>' +
      
      '</div>';
    
    
    $('.tableBox-wrapper').append(co_html);
  }
  
  function deleteClass(e) {
    let tr_length = $(e).closest('.zoomcnt-name').next().find('tbody').find('tr').length;
    if(tr_length < 1){
      alert('삭제할 테이블 목록이 없습니다.');
      return;
    }
    let checked = $(e).closest('.zoomcnt-name').next().find('tbody').find('.chkTd').children('input[name=chkPiece]:checked');
    if(checked.length === 0) {
      alert('삭제하려는 항목의 체크박스를 선택해주세요!');
      return;
    }
    if (confirm('정말 삭제하시겠습니까?')) {
      checked.each(function(i,e) {
        let target = $(e).closest('tr');
        let cid = target.data('id');
        gid = target.closest('tr').data('group');
        group = getGroupInfo(gid);
        // let groupClass = group.classMap.get(parseInt(cid));
        // console.log(groupClass);
        if (group.classMap.delete(parseInt(cid))) {
          group.classCount--;
          target.remove();
        }
        console.log(group);
      });
    }
  }
  // alert('ok');
  
  function searchClass() {
    let url = '<?php echo base_url()."master/studio/class/search"; ?>';
    let data = [];
  
    let keyword = $('#class_keyword').val();
    if (keyword === '') {
      alert('수업명을 입력해주세요');
      return;
    }
    
    data['keyword'] = keyword;
  
    $('#studio_class .shop--searchBox').html('');
    send_post_data(data, url, function(html) {
      $('#studio_class .shop--searchLesson').show();
      $('#studio_class .shop--searchBox').show();
      $('#studio_class .shop--searchBox').append(html);
    }, true, true);
  }
 
  function makeGroupSelect(id) {
    
    // console.log(id);
  
    if (groupCount === 0) {
      alert('추가할 그룹이 존재하지 않습니다');
      return;
    }
  
    $('.boxwrap__pop').show().find('div[class*="frame:group"]').show();
    $('div[class$="frame:group"] .box--btn').hide();
  
    $('#classGroupSelect').html('');
    // let keys = groupsMap.keys();
    // console.log(keys);
    for (let g of groupsMap.values()) {
      // console.log(g);
      checkGroupTitle(g);
      let option = '<option class="result-type-data" value="' + g.id + '" style="display: block;">' + g.title + '</option>';
      $('#classGroupSelect').append(option);
    }
    
    addClassId = id;
    // console.log(addClassId);
  }
  
  function addClass() {
    gid = $('.boxwrap__pop').show().find('div[class*="frame:group"]').find('.group--val').find('option:selected').val();
    group = getGroupInfo(gid);
    
    // console.log(gid);
    // console.log(group);
    // console.log(addClassId);
    // console.log(group.classMap);
    // console.log(group.classMap.get(addClassId));
    // console.log(group.classMap.get(addClassId) === undefined);
    
    if (group.classMap.get(parseInt(addClassId))) {
      alert('해당 그룹에 클래스가 이미 존재합니다.');
      return;
    }
    if (group.classCount >= maxGroupClassCount) {
      alert('클래스는 최대 ' + maxGroupClassCount + '개까지 추가 가능합니다.');
      return;
    }
  
    let e = $('.course_hidden_info#schedule-' + addClassId);
  
    // console.log(e);
    
    classDate = $(e).children('p:eq(0)').text();
    classTime= $(e).children('p:eq(1)').text();
    classTitle= $(e).children('p:eq(2)').text();
    classTeacher= $(e).children('p:eq(3)').text();
    classReservableNumber = $(e).children('p:eq(4)').text();
    
    group.classMap.set(parseInt(addClassId), {id:parseInt(addClassId),date:classDate,time:classTime,title:classTitle,teacher:classTeacher,reservableNumber:classReservableNumber});
    group.classCount++;
    
    let tr_tag = '<tr data-id="' + addClassId + '" data-group="' + gid + '">' +
      '<td class="td-label chkTd">' +
      '<input class="chkPiece" type="checkbox" name="chkPiece">' +
      '<label class="chkLabel"></label>' +
      '</td>' +
      '<td>' +
      '<span class="td-span">' + classDate + '</span>' +
      '</td>' +
      '<td>' +
      '<span class="td-span">' + classTime + '</span>' +
      '</td>' +
      '<td>' +
      '<span class="td-span">' + classTitle + '</span>' +
      '</td>' +
      '<td>' +
      '<span class="td-span">' + classTeacher + '</span>' +
      '</td>' +
      '<td>' +
      '<span class="td-span">' + classReservableNumber + '</span>' +
      '</td>' +
      '<td>' +
      '<div class="td-span">' +
      '<button class="go__toUp" onclick="swapClass($(this).closest(\'tr\'),\'up\');"></button>' +
      '<button class="go__toDown" onclick="swapClass($(this).closest(\'tr\'),\'down\');"></button>' +
      '</div>' +
      '</td>' +
      '</tr>';
  
    // console.log($('.tableBox#group-' + gid));
    $('.tableBox#group-' + gid).find('.zoom-table tbody').append(tr_tag);
  }
  function swapClass(e, mode) {
    if (mode === 'up') {
      if ($(e).prev().length > 0) {
        $(e).swapWith($(e).prev());
      }
    } else if (mode === 'down') {
      if ($(e).next().length > 0) {
        $(e).swapWith($(e).next());
      }
    }
  }
  
  function applyGroup(e) {
    let target = $(e).closest('.tableBox');
    gid = target.data('id');
    group = getGroupInfo(gid);
    
    // console.log(gid);
    // console.log(group);
    
    if (group.classCount <= 0) {
      alert('반영할 클래스가 존재하지 않습니다');
      return;
    }
  
    let classIds = [];
    target.find('.zoom-table tr').each(function(i,e) {
      classIds[i] = $(e).data('id');
    });
    
    let url = '<?php echo base_url()."master/studio/class/group/apply"; ?>';
    let data = [];
  
    data['id'] = group.id;
    data['name'] = group.title;
    data['count'] = group.classCount;
    data['schedule_ids'] = JSON.stringify(classIds);
    
    // console.log(data);
  
    send_post_data(data, url, function(msg) {
      let newId = parseInt(msg.data.id);
      if (newId !== group.id) {
        delGroup(group);
        group.id = newId;
        setGroup(group);
        target.attr('id', 'group-' + newId);
        target.data('id', newId.toString());
        // console.log(target);
        // console.log(target.data('id'));
        // console.log(groupsMap);
      }
    }, true, false);
  }

</script>