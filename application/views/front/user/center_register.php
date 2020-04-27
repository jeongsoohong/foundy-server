<style>
    .bootstrap-select > .selectpicker {
        -webkit-appearance: none;
        -webkit-box-shadow: none;
        box-shadow: none !important;
        height: 50px;
        border-radius: 4px;
        border: 1px solid #c5c5c5;
        background-color: #ffffff !important;
        color: #737475 !important;
    }
    .dropdown-menu {
        border-width: 1px !important;
    }
    .input-group-addon {
        padding: 5px 16px;
    }
</style>
<div class="information-title">센터 회원 신청</div>
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
                            <p class="text-success"><?='센터 신청 완료 후 승인까지 3-4일이 소요됩니다'?></p>
                            <div class="details-box">
                                <?php
                                echo form_open(base_url() . 'home/user/do_center_register/', array(
                                    'class' => 'form-login',
                                    'method' => 'post',
                                    'enctype' => 'multipart/form-data'
                                ));
                                ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" id="center-title" name="title" value="" type="text"
                                                   placeholder="센터명" data-toggle="tooltip" title="center_name">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" id="center-phone" name="phone" value="" type="tel"
                                                   placeholder="전화번호" data-toggle="tooltip" title="phone">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input class="form-control" id="center-address" name="address" value="" type="text"
                                                       placeholder="지도검색(주소를 입력 후 검색을 눌러주세요)" data-toggle="tooltip" title="address"
                                                       style="border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important;">
                                                <div class="input-group-addon"><label id="kakao-map-search" onclick="search_center()" style="font-size:10px !important;"><a href="#none">검색</a></label></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div id="kakao-map" style="width:100%;height:350px;"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="display: none;">
                                        <div class="form-group">
                                            <input class="form-control" id="center-latitude" name="latitude" value="" type="text"
                                                   placeholder="위도" data-toggle="tooltip" title="center_latitude">
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="display: none;">
                                        <div class="form-group">
                                            <input class="form-control" id="center-longitude" name="longitude" value="" type="text"
                                                   placeholder="경도" data-toggle="tooltip" title="center_longitude">
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="border-top: 2px solid #f5f5f5; margin-top: 35px">
                                        <button type="button" class="btn btn-theme pull-right open_modal center-register" data-toggle="modal" data-target="#prodPostModal">
                                            확인
                                        </button>
                                        <button type="button" class="hidden btn btn-theme pull-right btn_dis
                                        signup_btn" data-reload='ok' data-unsuccessful='신청에 실패했습니다.' data-success='신청에 성공했습니다.' data-ing='진행중'>
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
<script>

    var valid_title = false;
    var valid_phone = false;
    var valid_address = false;
    var valid_address_txt = '';

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

        // 주소-좌표 변환 객체를 생성합니다
        var geocoder = new kakao.maps.services.Geocoder();
        // 주소로 좌표를 검색합니다
        geocoder.addressSearch(document.getElementById('center-address').value, function(result, status) {
            // console.log(result);
            // console.log(status);
            if (status == null || status !== kakao.maps.services.Status.OK) {
                alert("주소가 잘못되었습니다");
            } else {
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
                        content: '<div style="width:150px;text-align:center;padding:6px 0;">' + document.getElementById('center-address').value + '</div>'
                    });
                    infowindow.open(map, marker);
                    // 지도의 중심을 결과값으로 받은 위치로 이동시킵니다
                    map.setCenter(coords);
                }

                valid_address = true;
                valid_address_txt = document.getElementById('center-address').value;

                document.getElementById('center-latitude').value = result[0].y;
                document.getElementById('center-longitude').value = result[0].x;
            }
        });
    }
</script>

