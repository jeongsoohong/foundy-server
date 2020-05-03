<script src="https://checkout.stripe.com/checkout.js"></script>
<style>
@media (min-width: 1200px){
    .cus_cont {
        width: 1290px;
        }
    }
</style>
<section class="page-section">
    <div class="wrap container">
        <!-- <div id="profile-content"> -->
            <div class="row profile">
                <div class="col-lg-12 col-md-12" style="padding-left: 0 !important; padding-right: 0 !important;">
                    <div id="profile_content">
                        <div class="information-title">클래스 올리기</div>
                        <div class="details-wrap">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="tabs-wrapper content-tabs">
                                        <div class="tab-content">
                                            <div class="tab-pane fade in active">
                                                <div class="details-wrap">
                                                    <div class="block-title alt">
                                                        <i class="fa fa-angle-down"></i>
                                                        비디오 정보 입력
                                                    </div>
                                                    <p class="text-success">모든 정보를 정확히 입력 바랍니다</p>
                                                    <div class="details-box">
                                                        <?php
                                                        echo form_open(base_url() . 'home/teacher/do_add_video/'.
                                                            $user_data->user_id, array(
                                                            'class' => 'form-login',
                                                            'method' => 'post',
                                                            'enctype' => 'multipart/form-data'
                                                        ));
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input class="form-control" id="title" name="title" value="" type="text" placeholder="제목" data-toggle="tooltip" title="title">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input class="form-control" id="video_url" name="video_url" value="" type="url" placeholder="비디오 공유 URL" data-toggle="tooltip" title="video_url">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input class="form-control" id="thumbnail_image_url"
                                                                           name="thumbnail_image_url" value=""
                                                                           type="url" placeholder="썸네일 이미지 URL"
                                                                           data-toggle="tooltip"
                                                                           title="thumbnail_image_url">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input class="form-control" id="playtime" name="playtime" value="" type="number" placeholder="총 재생시간(초)" data-toggle="tooltip" title="playtime">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12" style="border-top: 2px solid #f5f5f5; margin-top: 35px">
                                                                <button type="button" class="btn btn-theme pull-right open_modal add-video-req" data-toggle="modal" data-target="#addVideoReq">
                                                                    확인
                                                                </button>
                                                                <button type="button" class="hidden btn btn-theme pull-right btn_dis signup_btn" data-reload='ok' data-unsuccessful='신청에 실패했습니다.' data-success='신청에 성공했습니다.' data-ing='진행중'>
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

                            $(document).ready(function(){
                                $(".open_modal.add-video-req").click(function(){
                                });

                                $(".post_confirm").click(function(){
                                    $(".post_confirm_close").click();
                                    $(".signup_btn").click();
                                });

                                $('html').animate({scrollTop:$('html, body').offset().top}, 100);
                            });

                        </script>

                    </div>
                </div>
            </div>
        <!-- </div> -->
    </div>
</section>

<!-- Modal For C-C Post confirm -->
<div class="modal fade" id="addVideoReq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">클래스 올리기</h4>
            </div>
            <div class="modal-body">
                <div class="text-video">
                    <div>비디오 추가하시겠습니까?
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

<!-- Modal For C-C Status change -->
<div class="modal fade" id="statusChange" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">change_availability_status</h4>
            </div>
            <div class="modal-body">
                <div class="text-video content_body" id="content_body">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal For C-C Status change -->
<style type="text/css">
    .pagination_box a{
        cursor: pointer;
    }
    .pleft_nav li.active {
        background-color: #ebebeb!important;
    }
</style>
<script type="text/javascript">

    $(document).ready(function(){
        // active_menu_bar('find');
    });
</script>
<style type="text/css">
    .pagination_box a {
        cursor: pointer;
    }
    .pleft_nav li.active {
        background-color: #ebebeb !important;
    }
    .fa-angle-up,.fa-angle-down {
        font-family: FontAwesome !important;
    }
</style>
