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
                                echo form_open(base_url() . 'home/profile/do_center_register/', array(
                                    'class' => 'form-login',
                                    'method' => 'post',
                                    'enctype' => 'multipart/form-data'
                                ));
                                ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" name="title" value="" type="text"
                                                   placeholder="센터명" data-toggle="tooltip" title="center_name">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" name="phone" value="" type="tel"
                                                   placeholder="전화번호" data-toggle="tooltip" title="phone">
                                        </div>
                                    </div>
<!--                                    <div class="col-md-12">-->
<!--                                        <div class="form-group">-->
<!--                                            <input class="form-control" name="location" value="" type="text"-->
<!--                                                   placeholder="주소" data-toggle="tooltip" title="location">-->
<!--                                        </div>-->
<!--                                    </div>-->

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input class="form-control" name="location" value="" type="text"
                                                       placeholder="센터위치" data-toggle="tooltip" title="location"
                                                       style="border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important;">
                                                <div class="input-group-addon search"
                                                     style="font-size:12px
                                                !important;
">검색</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <!--                                        <div id="map" style="width:500px;height:400px;">
                                        <textarea class="form-control" name="location-map" placeholder="위치정보"
                                                  data-toggle="tooltip" title="location-map" style="height: 300px;">
                                                                                    </textarea>
                                                                                </div>
                                        -->
                                        <div id="map" style="width:500px;height:400px;"></div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div>
                                                <label>센터로고</label><br>
                                                <label class="btn btn-theme btn-theme-sm" for="prod_img" style="width: 200px;font-size: 12px;margin-top: 10px;padding: 8px;">
                                                    파일찾기
                                                </label>
                                            </div>
                                            <div>
                                                <span class="pull-left btn btn-default btn-file hidden">파일찾기
                                                     <input type="file" multiple name="images[]" onchange="preview(this);" id="prod_img" class="form-control required">
                                                </span>
                                                <span id="previewImg"></span>
                                            </div>
                                        </div>
                                    </div>
<!--                                    <div class="col-md-12">-->
<!--                                        <div class="form-group">-->
<!--                                            <label>추가 정보</label><br>-->
<!--                                            <h5><i>추가 사항이 있으면 버튼을 클릭하세요.</i></h5>-->
<!--                                            <button type="button" class="btn btn-theme btn-theme-sm" id="more_btn"-->
<!--                                                    style="width: 200px;font-size: 12px;margin-top: 10px;padding: 8px;">필드추가</button>-->
<!--                                        </div>-->
<!--                                        <div class="row" id="more_additional_fields" style="margin-top: 0px">-->
                                            <!-- 주석 Loads more fields -->
<!--                                        </div>-->
<!--                                    </div>-->
                                    <div class="col-md-12" style="border-top: 2px solid #f5f5f5; margin-top: 35px">
                                        <button type="button" type="button" class="btn btn-theme pull-right open_modal" data-toggle="modal" data-target="#prodPostModal">
                                            확인
                                        </button>
                                        <button type="button" class="hidden btn btn-theme pull-right btn_dis
                                        signup_btn" data-reload='ok' data-unsuccessful='신청이 실패했습니다.'); ?>'
                                            data-success='신청에 성공했습니다.' data-ing='진행중'>
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
    window.preview = function (input) {
        if (input.files && input.files[0]) {
            $("#previewImg").html('');
            $(input.files).each(function () {
                var reader = new FileReader();
                reader.readAsDataURL(this);
                reader.onload = function (e) {
                    $("#previewImg").append("<div style='float:left;border:2px solid #303641;padding:5px;margin:5px;'><img height='80' src='" + e.target.result + "' style='width:auto'></div>");
                }
            });
        }
    }

    $(document).ready(function(){
        //tooltip_set();
        $('.selectpicker').selectpicker();
        $('.selectpicker').tooltip();

        $("#more_btn").click(function(){
            $("#more_additional_fields").append(''
                +'<div class="parent_div">'
                +'  <div class="col-md-5">'
                +'      <div class="form-group">'
                +'          <input class="form-control" name="ad_field_names[]" value="" type="text" '
                +'placeholder="필드이름" data-toggle="tooltip" title="field_name">'
                +'      </div>'
                +'  </div>'
                +'  <div class="col-md-5">'
                +'        <div class="form-group">'
                +'          <input class="form-control" name="ad_field_values[]" value="" type="text" ' +
                'placeholder="내용"' + ' data-toggle="tooltip" title="details">'
                +'      </div>'
                +'  </div>'
                +'  <div class="col-md-2">'
                +'      <div class="form-group">'
                +'          <span class="remove_it_v rms btn btn-danger btn-icon btn-circle icon-lg fa fa-times" onclick="delete_row(this)"></span>'
                +'      </div>'
                +'  </div>'
                +'</div>'
            );
        });

        $(".open_modal").click(function(){
            $(".post_amount").html("<?/*=$upload_amount*/?>");
        });

        $(".post_confirm").click(function(){
            $(".post_confirm_close").click();
            $(".signup_btn").click();
        });

        $('html').animate({scrollTop:$('html, body').offset().top}, 100);
    });

    /*    $(function () {
            //bootstrap WYSIHTML5 - text editor
            $('.txt_editor').wysihtml5({
                toolbar: {
                    "image": true, // Button to insert an image.
                    "video": true
                }
            });
        })*/

    function get_sub_cat(category_id) {
        ajax_load(base_url+'home/get_dropdown_by_id/sub_category/category/'+category_id+'/sub_category_name/0','post_sub_category', 'set_elements');
    }

    function delete_row(e)
    {
        $(e).parent().parent().parent().remove();
    }
</script>
<!--<script src="--><?php //echo base_url(); ?><!--template/back/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>-->
<script>
    var base_url = '<?php /*echo base_url(); */?>';
    var user_type = 'admin';
    var module = 'newsletter';
    var list_cont_func = 'list';
    var dlt_cont_func = 'delete';
</script>
