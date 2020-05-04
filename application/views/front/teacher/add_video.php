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
                            <p class="text-success">유튜브 동영상만 지원이 됩니다</p>
                            <div class="details-box">
                                <?php
                                echo form_open(base_url() . 'home/teacher/_do_add_video/', array(
                                    'class' => 'form-login',
                                    'method' => 'post',
                                    'enctype' => 'multipart/form-data'
                                ));
                                ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" id="title" name="title" value=""
                                                   type="text"
                                                   placeholder="제목" data-toggle="tooltip" title="title">
                                        </div>
                                    </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <input class="form-control" id="description" name="description" value=""
                                             type="text"
                                             placeholder="소개" data-toggle="tooltip" title="description">
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" id="video_url" name="video_url" value=""
                                                   type="url"
                                                   placeholder="유튜브 비디오 URL" data-toggle="tooltip" title="video_url">
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="border-top: 2px solid #f5f5f5; margin-top: 35px">
                                        <button type="button" class="btn btn-theme pull-right open_modal
                                        add-video-req" data-toggle="modal" data-target="#addVideoReq">
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

    $(document).ready(function(){
        $(".add-video-req.open_modal").click(function(){
        });

        $(".post_confirm").click(function(){
            $(".post_confirm_close").click();
            $(".signup_btn").click();
        });

        $('html').animate({scrollTop:$('html, body').offset().top}, 100);
    });

</script>

