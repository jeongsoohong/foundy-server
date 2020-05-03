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

                    </div>
                </div>
                <div class="col-lg-12 col-md-12" style="margin-top: 20px !important; display: none;">
                    <input type="hidden" id="state" value="normal" />
                    <div class="widget account-details">
                        <div class="information-title" style="margin-bottom: 0px; margin-top: 0px;">더보기</div>
                        <ul class="pleft_nav">
                            <a class="pnav_view" href="#profile_content" style="display: none;"><li>프로필</li></a>
                            <a class="pnav_edit" href="#profile_content" style="display: none;"><li>수정</li></a>
<!--                            <a class="pnav_add_video" href="#profile_content" style="display: none;"><li>동영상-->
<!--                                    올리기</li></a>-->
                        </ul>
                    </div>
                </div>
            </div>
        <!-- </div> -->
    </div>
</section>

<!-- Modal For C-C Post confirm -->
<div class="modal fade" id="centerRegisterModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">센터 회원 신청</h4>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <div>센터 승인까지는 3-4일정도 소요되며, 완료 후 연락드리겠습니다
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
                <div class="text-center content_body" id="content_body">
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

    var top = Number(200);
    var loading_set = '<div style="text-align:center;width:100%;height:'+(top*2)+'px; position:relative;top:'+top+'px;"><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i></div>';

    $('.pnav_view').on('click',function(){
        $("#profile_content").html(loading_set);
        $("#profile_content").load("<?php echo base_url()?>home/teacher/_view/<?php echo $part2; ?>");
        $(".pleft_nav").find("li").removeClass("active");
        $(".pnav_view").find("li").addClass("active");
    });

    $('.pnav_edit').on('click',function(){
        $("#profile_content").html(loading_set);
        $("#profile_content").load("<?php echo base_url()?>home/teacher/_edit/<?php echo $part2; ?>");
        $(".pleft_nav").find("li").removeClass("active");
        $(".pnav_edit").find("li").addClass("active");
    });

    $('.pnav_add_video').on('click',function(){
        console.log('pvan_add_video');
        $("#profile_content").html(loading_set);
        $("#profile_content").load("<?php echo base_url()?>home/teacher/_add_video/<?php echo $part2; ?>");
        $(".pleft_nav").find("li").removeClass("active");
        $(".pnav_add_video").find("li").addClass("active");
    });

    $(document).ready(function(){
        // active_menu_bar('find');

         //$("#<?php //echo $part; ?>//").click();
        $(".pnav_<?php echo $part1; ?>").click();
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
