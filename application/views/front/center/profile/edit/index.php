<section class="page-section">
  <div class="wrap container">
    <!-- <div id="profile-content"> -->
    <div class="row profile">
      <div class="col-lg-12 col-md-12" style="padding-left: 0 !important; padding-right: 0 !important;">
        <div id="profile_content">
          <div class="information-title">센터 프로필 수정</div>
          <div class="details-wrap">
            <div class="row">
              <div class="col-md-12">
                <div class="tabs-wrapper content-tabs">
                  <div class="tab-content">
                    <div class="tab-pane fade in active">
                      <div class="details-wrap">
                        <div class="block-title alt">
                          <i class="fa fa-angle-down"></i>
                          센터 정보 입력
                        </div>
                        <p class="text-success">센터 분류 기타에 여러 분류 입력 시 공백으로 구분해 주세요</p>
                        <div class="details-box">
                          <?php
                          echo form_open(base_url() . 'home/center/do_edit_profile/'.$center_data->center_id, array(
                            'class' => 'form-login',
                            'method' => 'post',
                            'enctype' => 'multipart/form-data'
                          ));
                          ?>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <input value="<?php echo $center_data->title; ?>" class="form-control" id="center-title" name="title" type="text" placeholder="센터명" data-toggle="tooltip" title="center_name">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <input value="<?php echo $center_data->phone; ?>" class="form-control" id="center-phone" name="phone" type="tel" placeholder="전화번호" data-toggle="tooltip" title="phone">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <input value="<?php echo $center_data->about; ?>" class="form-control" id="about" name="about" type="text" placeholder="about" data-toggle="tooltip" title="about">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <div class="input-group">
                                  <input value="<?php echo $center_data->address; ?>" class="form-control" id="center-address" name="address" type="text" placeholder="주소검색(주소를 입력 후 검색을 눌러주세요)" data-toggle="tooltip" title="address"
                                         style="border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important;">
                                  <div class="input-group-addon" style="padding: 0 0 0 0">
                                    <label id="kakao-map-search" onclick="search_center()" style="margin: 0 0 0 0">
                                      <a href="#">
                                        <img src="<?php echo base_url(); ?>uploads/icon/icon-2.png"
                                             style="object-fit: contain !important; width: 48px
                                                                 !important; height: 30px !important; overflow:
                                                                 hidden; display: flex; align-items: center;
                                                                 justify-content: center;">
                                      </a>
                                    </label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-12 center-address-detail">
                              <div class="form-group">
                                <input class="form-control" id="center-address-detail"
                                       name="address-detail"
                                       value="<?php echo $center_data->address_detail; ?>" type="text"
                                       placeholder="상세주소를 입력해주세요" data-toggle="tooltip"
                                       title="address-detail">
                              </div>
                            </div>
                            <div class="col-md-12 kakao-map">
                              <div class="form-group">
                                <div id="kakao-map" style="width:100%;height:350px;"></div>
                              </div>
                            </div>
                            <div class="col-md-12" style="display: none;">
                              <div class="form-group">
                                <input value="<?php echo $center_data->latitude; ?>" class="form-control" id="center-latitude" name="latitude" type="text"
                                       placeholder="위도" data-toggle="tooltip" title="center_latitude">
                              </div>
                            </div>
                            <div class="col-md-12" style="display: none;">
                              <div class="form-group">
                                <input value="<?php echo $center_data->longitude; ?>" class="form-control" id="center-longitude" name="longitude" type="text"
                                       placeholder="경도" data-toggle="tooltip" title="center_longitude">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="col-sm-3 control-label" for="demo-hor-inputemail">요가 분류</label>
                                <div class="col-sm-6">
                                  <div class="col-sm-">
                                    <fieldset>
                                      <?php
                                      $categories = $this->db->order_by('category_id', 'asc')->get_where('category_center', array('type' => CENTER_TYPE_YOGA))->result();
                                      foreach ($categories as $category) {
                                        $category_id = $category->category_id;
                                        $name = $category->name;
                                        ?>
                                        <label style="font-weight: 200 !important;">
                                          <input <?php if(in_array($name,$category_yoga_data)){ echo 'checked'; }?> id="<?php echo $category_id; ?>" class='form-checkbox' name="category_yoga[]" type="checkbox" value="<?php echo $name;?>"/>
                                          <?php echo $name; ?>
                                        </label>
                                        <?php
                                      }
                                      ?>
                                      <br>
                                      <label style="font-weight: 200 !important; margin: 10px 0 0 0 !important; width: auto !important;">
                                        기타
                                        <input value="<?php echo $category_yoga_etc; ?>" class="form-block" id="etc" name="category_yoga_etc" type="text" data-toggle="tooltip" title="category_yoga_etc" style="margin-left: 10px !important;"/>
                                      </label>
                                    </fieldset>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="col-sm-3 control-label" for="demo-hor-inputemail">필라테스 분류</label>
                                <div class="col-sm-6">
                                  <div class="col-sm-">
                                    <fieldset>
                                      <?php
                                      $categories = $this->db->order_by('category_id', 'asc')->get_where('category_center', array('type' => CENTER_TYPE_PILATES))->result();
                                      foreach ($categories as $category) {
                                        $category_id = $category->category_id;
                                        $name = $category->name;
                                        ?>
                                        <label style="font-weight: 200 !important;">
                                          <input <?php if(in_array($name,$category_pilates_data)){ echo 'checked'; }?> id="<?php echo $category_id; ?>" class='form-checkbox' name="category_pilates[]" type="checkbox" value="<?php echo $name;?>"/>
                                          <?php echo $name; ?>
                                        </label>
                                        <?php
                                      }
                                      ?>
                                      <br>
                                      <label style="font-weight: 200 !important; margin: 10px 0 0 0 !important; width: auto !important;">
                                        기타
                                        <input value="<?php echo $category_pilates_etc; ?>" class="form-block" id="etc" name="category_pilates_etc" type="text" data-toggle="tooltip" title="category_pilates_etc" style="margin-left: 10px !important;"/>
                                      </label>
                                    </fieldset>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="col-sm-3 control-label" for="demo-hor-inputemail">이용정보</label>
                                <div class="col-sm-6">
                                  <div class="col-sm-">
                                    <fieldset>
                                      <label style="font-weight: 200 !important;">
                                        <input <?php if ($center_data->shower) { echo 'checked'; }?> id="shower" class='form-checkbox' name="shower" type="checkbox" value="shower"/>
                                        샤워시설
                                      </label>
                                      <label style="font-weight: 200 !important;">
                                        <input <?php if ($center_data->towel) { echo 'checked'; }?> id="towel" class='form-checkbox' name="towel" type="checkbox" value="towel"/>
                                        수건제공
                                      </label>
                                      <label style="font-weight: 200 !important;">
                                        <input <?php if ($center_data->parking) { echo 'checked'; }?> id="parking" class='form-checkbox' name="parking" type="checkbox" value="parking"/>
                                        주차가능
                                      </label>
                                      <label style="font-weight: 200 !important;">
                                        <input <?php if ($center_data->valet) { echo 'checked'; }?> id="valet" class='form-checkbox' name="valet" type="checkbox" value="valet"/>
                                        발렛가능
                                      </label>
                                    </fieldset>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-12" style="border-top: 2px solid #f5f5f5; margin-top: 35px">
                              <button type="button" class="btn btn-theme pull-right open_modal
                                        center-register" data-toggle="modal" data-target="#centerEditModal">
                                확인
                              </button>
                              <button type="button" class="hidden btn btn-theme pull-right btn_dis
                                        signup_btn" data-relocation='<?php echo base_url().'home/center/profile/'.$center_data->center_id; ?>' data-unsuccessful='신청에 실패했습니다.' data-success='신청에 성공했습니다.' data-ing='진행중'>
                                확인
                              </button>
                            </div>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- </div> -->
  </div>
</section>
<!-- Modal For C-C Post confirm -->
<div class="modal fade" id="centerEditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">센터 프로필 수정</h4>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <div>정말 수정하시겠습니까?
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger post_confirm_close" data-dismiss="modal">취소</button>
        <button type="button" class="btn btn-theme btn-theme-sm post_confirm" style="text-transform: none;
                font-weight: 400;">확인</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal For C-C Post confirm -->
<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=8ee901a556539927d58b30a6bf21a781&libraries=services"></script>
<script type="text/javascript">

  $(document).ready(function(){
    // active_menu_bar('find');
    var coord = new kakao.maps.LatLng(<?php echo $center_data->latitude; ?>, <?php echo $center_data->longitude; ?>);
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
      content: '<div style="width:150px;text-align:center;padding:6px 0;"><?php echo $center_data->address;?></div>'
    });
    infowindow.open(map, marker);
  });

  var valid_title = false;
  var valid_phone = false;
  var valid_address = true;
  var valid_address_txt = '<?php echo $center_data->address; ?>';

  $(document).ready(function(){
    $(".center-register.open_modal").click(function(){
      if (document.getElementById('center-title').value !== '') {
        valid_title = true;
      }
      if (document.getElementById('center-phone').value !== '') {
        valid_phone = true;
      }
      if (valid_address === true && valid_address_txt !== document.getElementById('center-address').value) {
        valid_address = false;
        valid_address_txt = '';
        alert("주소를 다시 검색해 주세요");
        return false;
      }
      if (valid_title === false) {
        alert("센터명을 입력해 주세요");
        return false;
      }
      if (valid_phone === false) {
        alert("전화번호를 정확히 입력해 주세요");
        return false;
      }
      if (valid_address === false) {
        alert("주소를 정확히 입력 후 지도를 검색해주세요");
        return false;
      }

      return true;
    });

    $(".post_confirm").click(function(){
      $(".post_confirm_close").click();
      $(".signup_btn").click();
    });

    $('html').animate({scrollTop:$('html, body').offset().top}, 100);
  });

  function search_center()
  {
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
        $('div.kakao-map').show();

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
            content: '<div style="width:150px;text-align:center;padding:6px 0;">' + result[0]
              .address_name + '</div>'
          });
          infowindow.open(map, marker);
          // 지도의 중심을 결과값으로 받은 위치로 이동시킵니다
          map.setCenter(coords);
        }

        valid_address = true;
        valid_address_txt = result[0].address_name;
        document.getElementById('center-address').value = result[0].address_name;

        document.getElementById('center-latitude').value = result[0].y;
        document.getElementById('center-longitude').value = result[0].x;

        $('div.center-address-detail').show();
      }
    });
  }

</script>

