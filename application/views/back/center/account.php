<!-- include libraries(jQuery, bootstrap) -->
<!--<link href="//stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">-->
<!--<script src="//code.jquery.com/jquery-2.2.4.min.js"></script>-->
<!--<script src="//stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->

<!-- include summernote css/js -->

<!--Summernote [ OPTIONAL ]-->
<!--<link href="--><?php //echo base_url(); ?><!--template/back/plugins/summernote/summernote.min.css" rel="stylesheet">-->
<!--<script src="--><?php //echo base_url(); ?><!--template/back/plugins/summernote/summernote.js"></script>-->
<style>
  .note-editable{
    resize: none !important;
    *overflow-y: hidden !important; /* 스크롤이 생성되는것을 막아준다. */
    padding-top: .8em !important; /*엔터키로 인한 상단의 텍스트 깨짐 현상을 막아준다. */
    padding-bottom: 0.2em !important;
    padding-left: .25em !important;
    padding-right: .25em !important;
    line-height: 1.6 !important;
    min-height: 300px !important;
  }
  .note-editable iframe, .note-editable img {
    width: 100% !important;
    height: auto !important;
  }
  .note-toolbar {
    height: auto;
  }
</style>
<h2 class="boxwrap__type meaning">센터정보</h2>
<div class="boxwrap__info">
  <div class="info--tit">
    <a href="#" class="tit_theme">
      기본정보
      <div class="theme_arrow">
        <img src="<?php echo base_url().'template/back/center/imgs/icon_next.png'; ?>" width="6" height="auto">
        <img src="<?php echo base_url().'template/back/center/imgs/icon_next_white.png'; ?>" width="6" height="auto" style="display: none;" class="next_white">
      </div>
    </a>
    <a href="#" class="tit_theme">
      추가정보
      <div class="theme_arrow">
        <img src="<?php echo base_url().'template/back/center/imgs/icon_next.png'; ?>" width="6" height="auto">
        <img src="<?php echo base_url().'template/back/center/imgs/icon_next_white.png'; ?>" width="6" height="auto" style="display: none;" class="next_white">
      </div>
    </a>
  </div>
  <div class="info--contents scroll-y_hidden">
    <section class="contents_center contents_enroll scroll-y">
      <h3 class="meaning">센터명</h3>
      <div class="center_detailbox shadow_md">
        <div class="centerName">
          <button class="btn_save btn_val btn_rg" onclick="save_profile()">저장</button>
          <p class="centerName_tit enroll_tit tit-lg">센터명</p>
          <dl class="enroll_detail clearfix">
            <dt>센터명</dt>
            <dd class="detail_name">
              <input class="name_space name_center" type="text"  value="<?php echo $center->title; ?>" style="height: 32px;" disabled>
              <span>센터명 변경시 담당자에게 연락주시기 바랍니다.</span>
            </dd>
            <dt>전화번호</dt>
            <dd class="detail_phone">
              <input class="name_space" id="center-phone" type="text" style="height: 32px;" value="<?php echo $center->phone; ?>">
              <!--              <p>-</p>-->
              <!--              <input class="name_space" type="text" style="height: 32px;">-->
              <!--              <p>-</p>-->
              <!--              <input class="name_space" type="text" style="height: 32px;">-->
            </dd><br>
            <dt>기본 주소</dt>
            <dd class="detail_address">
              <div class="address_box">
                <input type="text" placeholder="주소 검색" class="address_input" id="center-address" value="<?php echo $center->address; ?>">
                <button class="address_search" onclick="search_center()">
                  <!-- 주소창 검색시 카카오 검색서비스 끌어오기 -->
                  <img src="<?php echo base_url().'template/back/center/imgs/icon_find.png'; ?>" width="24">
                </button>
              </div>
            </dd>
            <dt>상세 주소</dt>
            <dd class="detail_address">
              <div class="address_box">
                <input type="text" placeholder="상세 주소 입력" class="address_input" id="center-address-detail" value="<?php echo $center->address_detail; ?>">
              </div>
            </dd>
          </dl>
          <div id="kakao-map" style="width:100%;height:350px;"></div>
          <input type="text" id="center-latitude" style="display:none;" value="<?php echo $center->latitude; ?>">
          <input type="text" id="center-longitude" style="display:none;" value="<?php echo $center->longitude; ?>">
        </div>
        <div class="centerArea">
          <p class="centerArea_tit_lg enroll_tit tit-lg">클래스 분류</p>
          <div class="centerArea_yoga">
            <p class="centerArea_tit_sm">요가 클래스</p>
            <div class="chkbox_wrap">
              <div class="chkbox_line">
                <?php
                $count = 0;
                $categories = $this->db->order_by('category_id', 'asc')->get_where('category_center', array('type' => CENTER_TYPE_YOGA))->result();
                foreach ($categories as $category) {
                $category_id = $category->category_id;
                $name = $category->name;
                $count++;
                ?>
                <?php if ($count % 5 == 0) { ?>
              </div>
              <div class="chkbox_line">
                <?php } ?>
                <label class="form-chk col_sp">
                  <input name="category_yoga" type="checkbox" value="<?php echo $name;?>"
                    <?php if(in_array($name,$category_yoga_data)){ echo 'checked'; }?> id="<?php echo $category_id; ?>"/>
                  <?php echo $name; ?>
                </label>
                <?php if ($count % 5 == 0) { ?>
                <?php } ?>
                <?php
                }
                ?>
                <label class="form-chk col_sp" id="chk_other">
                    <input id="chkbox_yoga_etc" <?php if (empty($category_yoga_etc) == false) echo 'checked'; ?>
                    type="checkbox" name="number">
                  기타
                  <span class="write_padding">
                    <input type="text" class="chk_write" id="category_yoga_etc" name="category_yoga_etc"
                      value="<?php echo $category_yoga_etc; ?>"/>
                  </span>
                  <style type="text/css">
                    #whole a {
                      text-decoration: none;
                      color: inherit;
                    }
                    #whole a:hover {
                      text-decoration: none;
                      font-weight: bold;
                    }
                    #whole .id_current {
                      border-bottom: 1px solid #f3efee;
                      box-sizing: border-box;
                    }
                    #whole .header h1 {
                      margin: 5px 16px 0 0;
                    }
                    #whole .header .logo_home {
                      text-align: center;
                    }
                    #whole .header .logo_home img {
                      padding: 0;
                    }
                    @media(min-width: 600px){
                      .chkbox_line #chk_other {
                        width: 144px;
                      }
                      .chk_write {
                        width: 84px;
                      }
                    }
                    @media(min-width: 928px){
                      .chkbox_line #chk_other {
                        width: 186px;
                      }
                      .chk_write {
                        width: 124px;
                      }
                    }
                    @media(min-width: 1025px){
                      .chkbox_line #chk_other {
                        width: 220px;
                      }
                      .chk_write {
                        width: 140px;
                      }
                    }
                  </style>
                  <!-- 체크박스 disabled 기능 필요 -->
                </label>
              </div>
            </div>
          </div>
          <div class="centerArea_pilates">
            <p class="centerArea_tit_sm">필라테스 클래스</p>
            <div class="chkbox_wrap">
              <div class="chkbox_line">
                <?php
                $count = 0;
                $categories = $this->db->order_by('category_id', 'asc')->get_where('category_center', array('type' => CENTER_TYPE_PILATES))->result();
                foreach ($categories as $category) {
                $category_id = $category->category_id;
                $name = $category->name;
                $count++;
                ?>
                <?php if ($count % 5 == 0) { ?>
              </div>
              <div class="chkbox_line">
                <?php } ?>
                <label class="form-chk col_sp">
                  <input name="category_pilates" type="checkbox" value="<?php echo $name;?>"
                    <?php if(in_array($name,$category_pilates_data)){ echo 'checked'; }?> id="<?php echo $category_id; ?>"/>
                  <?php echo $name; ?>
                </label>
                <?php
                }
                ?>
                <label class="form-chk col_sp">
                  <input id="chkbox_pilates_etc" <?php if (empty($category_pilates_etc) == false) echo 'checked'; ?>
                    type="checkbox" name="number">
                  기타
                  <span class="write_padding">
                    <input type="text" class="chk_write" id="category_pilates_etc" name="category_pilates_etc"
                      value="<?php echo $category_pilates_etc; ?>"/>
                  </span>
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="centerUsing">
          <p class="centerUsing_tit enroll_tit tit-lg">이용정보</p>
          <div class="chkbox_wrap">
            <div class="chkbox_line">
              <label class="form-chk col_sp">
                <input <?php if ($center->shower) {echo 'checked';} ?> type="checkbox" id="shower" name="shower">
                샤워시설
              </label>
              <label class="form-chk col_sp">
                <input <?php if ($center->towel) {echo 'checked';} ?> type="checkbox" id="towel" name="towel">
                수건제공
              </label>
              <label class="form-chk col_sp">
                <input <?php if ($center->parking) {echo 'checked';} ?> type="checkbox" id="parking" name="parking">
                주차
              </label>
              <label class="form-chk col_sp">
                <input <?php if ($center->valet) {echo 'checked';} ?> type="checkbox" id="valet" name="valet">
                발렛
              </label>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="contents_addinfo contents_modify scroll-y">
      <h3 class="meaning">추가정보</h3>
      <div class="addinfo_detailbox modify_detailbox">
        <div class="addinfo_about ticket_name shadow_md">
          <div class="about_wrap name_wrap">
            <p class="name_tit tit-lg tit-normal">About</p>
            <button class="btn_save btn_val btn_rg" onclick="save_about()">저장</button>
          </div>
          <form class="addinfo_textbox">
            <div class="remain_textarea">
              <p>남은 글자 수 <span class="remain_text"><strong class="remain_val"><?php echo (1000 - mb_strlen($center->about)); ?></strong>자</span></p>
            </div>
            <textarea class="about_textarea" placeholder="내용을 입력해주세요 (최대 1,000자)"><?php echo $center->about; ?></textarea>
          </form>
        </div>
        <div class="addinfo_editor ticket_name shadow_md">
          <div class="editor_wrap name_wrap clearfix">
            <!-- 블로그 편집기 불러오기 -->
            <p class="editor_tit name_tit tit-lg tit-normal">Info</p>
            <button class="btn_save btn_val btn_rg" onclick="save_info()">저장</button>
          </div>
          <div style="width: 100%; font-size: 12px;">
            <p>- 권장 이미지 사이즈 : 가로 800px </p>
            <p>- 이미지가 비정상적으로 보여질 수 있으므로, 권장사이즈를 준수하여 주시기 바랍니다.</p>
          </div>
          <div class="editor_box">
            <textarea class="summernotes" id='summernotes' data-height="500" data-name="item-desc"><?php echo $center->info; ?></textarea>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<script src="//stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=<?= APIKEY_KAKAO_JAVASCRIPT; ?>&libraries=services"></script>
<script type="text/javascript">
  function open_kakao_map() {
    var coord = new kakao.maps.LatLng(<?php echo $center->latitude; ?>, <?php echo $center->longitude; ?>);
    var mapContainer = document.getElementById('kakao-map'), // 지도를 표시할 div
      mapOption = {
        center: coord, // 지도의 중심좌표
        level: 3 // 지도의 확대 레벨
      };
    
    // 지도를 표시할 div와  지도 옵션으로  지도를 생성합니다
    var map = new kakao.maps.Map(mapContainer, mapOption);
    
    // var coords = new kakao.maps.LatLng(result[0].y, result[0].x);
    // 결과값으로 받은 위치를 마커로 표시합니다
    var marker = new kakao.maps.Marker({
      map: map,
      position: coord
    });
    // 인포윈도우로 장소에 대한 설명을 표시합니다
    var infowindow = new kakao.maps.InfoWindow({
      content: '<div style="width:150px;text-align:center;padding:6px 0; font-size: 12px;"><?php echo $center->address;?></div>'
    });
    infowindow.open(map, marker);
  }

  let valid_phone = false;
  let valid_address = true;
  let valid_address_txt = '<?php echo $center->address; ?>';
  
  function search_center() {
    // console.log(document.getElementById('center-address').value);
  
    valid_address = false;
  
    // 주소-좌표 변환 객체를 생성합니다
    var geocoder = new kakao.maps.services.Geocoder();
    // 주소로 좌표를 검색합니다
    geocoder.addressSearch(document.getElementById('center-address').value, function(result, status) {
      // console.log(result);
      // console.log(status);
      if (status == null || status !== kakao.maps.services.Status.OK) {
        alert("주소가 잘못되었습니다");
      } else {
        // $('#kakao-map').show();
      
        var mapContainer = document.getElementById('kakao-map'), // 지도를 표시할 div
          mapOption = {
            center: new kakao.maps.LatLng(33.450701, 126.570667), // 지도의 중심좌표
            level: 3 // 지도의 확대 레벨
          };
        // 지도를 표시할 div와  지도 옵션으로  지도를 생성합니다
        var map = new kakao.maps.Map(mapContainer, mapOption);
        // 정상적으로 검색이 완료됐으면
        if (status === kakao.maps.services.Status.OK) {
          var coords = new kakao.maps.LatLng(result[0].y, result[0].x);
          // 결과값으로 받은 위치를 마커로 표시합니다
          var marker = new kakao.maps.Marker({
            map: map,
            position: coords
          });
          // 인포윈도우로 장소에 대한 설명을 표시합니다
          var infowindow = new kakao.maps.InfoWindow({
            content: '<div style="width:150px;text-align:center;padding:6px 0; font-size: 12px;">' + result[0]
              .address_name + '</div>'
          });
          infowindow.open(map, marker);
          // 지도의 중심을 결과값으로 받은 위치로 이동시킵니다
          map.setCenter(coords);
        }
      
        valid_address = true;
        valid_address_txt = result[0].address_name;
        document.getElementById('center-address').value = result[0].address_name;
        document.getElementById('center-address-detail').value = '';
      
        document.getElementById('center-latitude').value = result[0].y;
        document.getElementById('center-longitude').value = result[0].x;
      
      }
    });
  }

  function save_profile() {
  
    let phone = $('#center-phone').val();
    let address = $('#center-address').val();
    let address_detail = $('#center-address-detail').val();
    let latitude = $('#center-latitude').val();
    let longitude = $('#center-longitude').val();
    let category_yoga = [];
    let category_yoga_etc = '';
    let category_pilates = [];
    let category_pilates_etc = '';
    let shower = $('#shower').prop('checked') === true ? '1' : '0';
    let towel = $('#towel').prop('checked') === true ? '1' : '0';
    let parking = $('#parking').prop('checked') === true ? '1' : '0';
    let valet = $('#valet').prop('checked') === true ? '1' : '0';
  
    $.each($('.centerArea_yoga').find("[name='category_yoga']"), function(index, item) {
      if ($(item).prop('checked') === true) {
        category_yoga.push($(item).val());
      }
    });
    $.each($('.centerArea_pilates').find("[name='category_pilates']"), function(index, item) {
      if ($(item).prop('checked') === true) {
        category_pilates.push($(item).val());
      }
    });
  
    if ($('#chkbox_yoga_etc').prop('checked') === true) {
      category_yoga_etc = $('#category_yoga_etc').val();
    }
    if ($('#chkbox_pilates_etc').prop('checked') === true) {
      category_pilates_etc = $('#category_pilates_etc').val();
    }
    
    // console.log(phone);
    // console.log(address);
    // console.log(address_detail);
    // console.log(latitude);
    // console.log(longitude);
    // console.log(category_yoga);
    // console.log(category_yoga_etc);
    // console.log(category_pilates);
    // console.log(category_pilates_etc);
    // console.log(shower);
    // console.log(towel);
    // console.log(parking);
    // console.log(valet);
    // console.log(category_yoga);
    // console.log(category_yoga_etc);
    // console.log(category_pilates);
    // console.log(category_pilates_etc);
  
    if (phone !== '') {
      valid_phone = true;
    }
  
    if (valid_phone === false) {
      alert("전화번호를 정확히 입력해 주세요");
      return false;
    }
    if (valid_address === true && valid_address_txt !== $('#center-address').val()) {
      valid_address = false;
      valid_address_txt = '';
      alert("주소를 다시 검색해 주세요");
      return false;
    }
    if (valid_address === false) {
      alert("주소를 정확히 입력 후 지도를 검색해주세요");
      return false;
    }
  
    let url = '<?php echo base_url()."center/account/profile/update"; ?>';
    let data = [];
    data['phone'] = phone;
    data['address'] = address;
    data['address-detail'] = address_detail;
    data['latitude'] = latitude;
    data['longitude'] = longitude;
    data['category_yoga'] = JSON.stringify(category_yoga);
    data['category_yoga_etc'] = category_yoga_etc;
    data['category_pilates'] = JSON.stringify(category_pilates);
    data['category_pilates_etc'] = category_pilates_etc;
    data['shower'] = shower;
    data['towel'] = towel;
    data['parking'] = parking;
    data['valet'] = valet;
    
    console.log(data);
  
    send_post(data, url, true, '');
  }

  function set_summer(){
    $('#summernotes').each(function() {
      var now = $(this);
      var h = now.data('height');
      var n = now.data('name');
      // $(this).closest('div').append('<input type="hidden" class="val" name="description">');
      now.closest('div').append('<input type="hidden" class="val" name="'+n+'">');
    
      $('#summernotes').summernote({
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['fontsize', ['fontsize']],
          // ['fontname', ['fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']], // 추가
          ['insert', ['link', 'picture', 'video']], // 추가
          // ['view', ['codeview', 'help']],
          // ['view', ['fullscreen', 'codeview', 'help']],
        ],
        // fontNames: ['Noto Sans KR', 'Quicksand', 'Patua One'],
        height: h,
        lang: "ko-KR",
        dialogsInBody: true,
        dialogsFade: true,
        disableDragAndDrop: false,
        callbacks: {
          onImageUpload : function(files) {
            // console.log('image upload:', files);
            for (var i = 0; i < files.length; i++) {
              sendFile(files[i]);
            }
          },
          onChange: function(contents, $editable) {
            // console.log('onChange:', contents, $editable);
            now.closest('div').find('.val').val(now.summernote('code'));
          }
          // onMediaDelete : function(target) {
          //   // console.log('delete');
          //   deleteImage(target[0].src);
          // },
        },
      });
      now.closest('div').find('.val').val('<?php echo $center->info; ?>');
      // console.log(now.closest('div').find('.val').val());
      // now.closest('div').find('.val').val(now.summernote('code'));
      // console.log($('#summernotes').summernote('fullscreen.isFullscreen'));
    });
  }

  // summernote.image.upload
  function sendFile(file) {
    var upload_path = '<?php echo IMG_WEB_PATH_CENTER; ?>';
    var data = new FormData();
    data.append("file", file);
    // console.log('image upload:', file);
    // console.log(data);
    $('#loading_set').show();
    $.ajax({
      url: "<?php echo base_url() . 'center/account/info/upload_image/'; ?>",
      data: data,
      cache: false,
      contentType: false,
      enctype: 'multipart/form-data',
      processData: false,
      type: 'POST',
      success: function(data){
        $("#loading_set").fadeOut(500);
        // console.log(data);
        var obj = JSON.parse(data);
        if (obj.success) {
          // var image = $('<img>').attr('src', '' + obj.save_url); // 에디터에 img 태그로 저장
          // alert(obj.save_url);
          // $('.summernotes').summernote("insertNode", image[0]); // summernote 에디터에 img 태그를 보여줌
          $('#summernotes').summernote("insertImage", upload_path + obj.filename);
          $('.note-editable').keyup();
        } else {
          switch(parseInt(obj.error)) {
            case 1: alert('업로드 용량 제한에 걸렸습니다.'); break;
            case 2: alert('MAX_FILE_SIZE 보다 큰 파일은 업로드할 수 없습니다.'); break;
            case 3: alert('파일이 일부분만 전송되었습니다.'); break;
            case 4: alert('파일이 전송되지 않았습니다.'); break;
            case 6: alert('임시 폴더가 없습니다.'); break;
            case 7: alert('파일 쓰기 실패'); break;
            case 8: alert('알수 없는 오류입니다.'); break;
            case 100: alert('허용된 파일이 아닙니다.'); break;
            case 101: alert('0 byte 파일은 업로드할 수 없습니다.'); break;
          }
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus+" "+errorThrown);
      }
    });
  };
  $('.note-editable').keyup(function(e) {
    // $(this).css('height', 'auto' );
    // $(this).height(this.scrollHeight);
    $(this).scrollTop(this.scrollHeight);
  });

  $(function(){
    // nav--id 클릭이벤트
    $('.id_list').css('display','none');
    $('.nav--id').click(function(){
      $('.id_list').toggle();
      var display = $('.arrow_up').css('display');
      // console.log(display);
      if(display == 'none'){
        $('.arrow_up').show().prev().hide();
      }
      else {
        $('.arrow_up').hide().prev().show();
      }
    })
    $('.list_child').hover(function(){
      $('.list_child').css('background','#fff');
      $(this).css('background','#eee');
    },function(){
      $('.list_child').css('background','#fff');
    })
    
    // list_child 클릭이벤트
    $('.list_child').click(function(){
      var origin = $('.current_accessed').text();
      var current = $(this).text();
      $('.current_accessed').text(current);
      $(this).text(origin);
    })
    
    
    // tit_theme 클릭이벤트
    $('.tit_theme').click(function(){
      $('.tit_theme').removeClass('reverse_color');
      $(this).addClass('reverse_color');
      $(this).find('.next_white').show().prev().hide();
      $(this).siblings().find('.next_white').hide().prev().show();
      
      var index = $('.tit_theme').index(this);
      $('.info--contents > section').hide();
      $('.info--contents > section').eq(index).show();
    })
    
    // window 로드이벤트
    $(window).load(function(){
      $('.tit_theme:first').addClass('reverse_color');
      $('.tit_theme:first').find('.next_white').show().prev().hide();
      $('.info--contents > section').hide();
      $('.info--contents > section:first').show();
    })
    
    
    // chk_btn 클릭이벤트
    $('.main_chk').click(function(){
      var chk = $('.main_chk').prop('checked');
      if(chk){
        $('input[class^=ticket_]').prop('checked',true);
      }
      else {
        $('input[class^=ticket_]').prop('checked',false);
      }
    })
    
    /* 팝업창 오픈이벤트 */
    $('.popup-box').children().hide();
    
    
    /* 팝업창 닫기이벤트 */
    // 윈도우 ESC버튼 팝업닫기
    $(window).keyup(function(e){
      if(e.keyCode == 27){
        $(".popup-box").fadeOut();
        $('.popup-box').children().hide();
      }
    })
    
    // 윈도우 클릭시 팝업닫기
    $(window).click(function(e){
      var target = e.target.className;
      
      if(target == 'popup-box'){
        $('.popup-box').fadeOut();
        $('.popup-box').children().hide();
      }
    })
    
    // 주소검색창 닫기 버튼
    $('.address_box').click(function(){
      $('.popup-box').fadeOut();
      $('.popup-box').children().hide();
    })
    
    // textarea 입력 이벤트
    $('.about_textarea').on('keyup',function(){
      var input = $(this).val().length;
      var left = 1000 - input;
      $('.remain_val').text(left);
      
      if($(this).val().length > 1000) {
        alert("글자수는 1,000자 이내로 제한됩니다.");
        $(this).val($(this).val().substring(0,1000));
        $('.remain_val').text(0);
        // left = 0;
      }
    })
    
    add_menu_active('account');
    open_kakao_map();
    set_summer();
  });

  function save_info() {
  
    let info = $('#summernotes').closest('div').find('.val').val();
    if (info === '') {
      alert('센터 정보를 정확히 입력해주세요.');
      return false;
    }
    
    // console.log(about);
  
    let url = '<?php echo base_url()."center/account/info/update"; ?>';
    let data = [];
    data['info'] = info;
  
    send_post(data, url, true, '');
  }
  
  function save_about() {
    let about = $('.about_textarea').val().trim();
    if (about === '') {
      alert('센터 정보를 정확히 입력해주세요.');
      return false;
    }
    
    // console.log(about);
    
    let url = '<?php echo base_url()."center/account/about/update"; ?>';
    let data = [];
    data['about'] = about;
    
    send_post(data, url, true, '');
  }
</script>
