<div class="information-title">강사 회원 신청</div>
<div class="details-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="tabs-wrapper content-tabs">
                <div class="tab-content">
                    <div class="tab-pane fade in active">
                        <div class="details-wrap">
                            <div class="block-title alt">
                                <i class="fa fa-angle-down"></i>
                                강사 정보 입력
                            </div>
                            <p class="text-success"><?='강사 신청 완료 후 승인까지 3-4일이 소요됩니다'?></p>
                            <div class="details-box">
                                <?php
                                echo form_open(base_url() . 'home/user/do_teacher_register/', array(
                                    'class' => 'form-login',
                                    'method' => 'post',
                                    'enctype' => 'multipart/form-data'
                                ));
                                ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" id="introduce" name="introduce" value=""
                                                   type="text"
                                                   placeholder="소개글" data-toggle="tooltip" title="introduce">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" id="youtube-url" name="youtube" value=""
                                                   type="url"
                                                   placeholder="유투브 홈 URL" data-toggle="tooltip" title="youtube">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" id="instagram-url" name="instagram" value=""
                                                   type="url"
                                                   placeholder="인스타그램 홈 URL" data-toggle="tooltip"
                                                   title="instagram">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" id="homepage-url" name="homepage" value=""
                                                   type="url"
                                                   placeholder="블로그 / 홈페이지 URL" data-toggle="tooltip"
                                                   title="homepage">
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="border-top: 2px solid #f5f5f5; margin-top: 35px">
                                        <button type="button" class="btn btn-theme pull-right open_modal
                                        teacher-register" data-toggle="modal" data-target="#teacherRegisterModal">
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
        $(".teachr-register.open_modal").click(function(){
        });

        $(".post_confirm").click(function(){
            $(".post_confirm_close").click();
            $(".signup_btn").click();
        });

        $('html').animate({scrollTop:$('html, body').offset().top}, 100);
    });

</script>

