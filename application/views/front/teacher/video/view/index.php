<style>
  @media (max-width: 992px) {
    .row .col-md-12.content {
      padding-left: 0px !important;
      padding-right: 0px !important;
    }
    .row .col-md-12.content .post-wrap.post-single {
      padding: 0px;
    }
    .row .col-md-12.content .post-wrap.post-single .post-media {
      margin-left: 10px;
      margin-right: 10px;
      margin-bottom: 0 !important;
      display: contents;
    }
    .row .col-md-12.content .post-wrap.post-single .post-header {
      /*margin-left: 20px;*/
      /*margin-right: 20px;*/
      /*margin-top: 20px;*/
      /*margin-bottom: 20px !important;*/
    }
  }
  iframe {
    width: 100% !important;
    height: 520px !important;
  }
  @media (max-width: 992px) {
    iframe {
      height: 440px !important;
      /*width: 480px !important;*/
    }
  }
  @media (max-width: 680px) {
    iframe {
      height: 360px !important;
      /*width: 480px !important;*/
    }
    .page-section {
      padding-top: 0 !important;
    }
  }
  @media (max-width: 520px) {
    iframe {
      height: 280px !important;
      /*width: 360px !important;*/
    }
  }
  @media (max-width: 400px) {
    iframe {
      height: 200px !important;
      /*width: 270px !important;*/
    }
  }
  .post-media h2 {
    margin-bottom: 0;
  }
  /* blog image */
  .post-body .post-excerpt img {
    height: auto;
    width: 100% !important;
    max-width: 100%;
    margin: 0px !important;
  }
  p.post-desc {
    margin-bottom: 0;
  }
  .post-body {
    background-color: white !important;
    height: 30px !important;
    margin: 0 10px 0 10px !important;
    position: relative;
  }
  .post-body .post-excerpt {
    height: 30px !important;
  }
  .post-body .post-excerpt .text-xl {
    font-size: 12px;
    padding-right: 10px
  }
  #video-edit {
    background-color: white;
    height: 60px;
    width: 50px;
    position: absolute;
    z-index: 10;
    top: -30px;
    left: 80%;
    display: none;
    text-align: center;
  }
  #video-edit a {
    color: grey;
    font-size: 12px;
    line-height: 30px;
  }
  .post-title {
    font-size: 18px !important;
  }
  .post-desc {
    font-size: 13px !important;
  }
</style>
<section class="page-section with-sidebar">
  <div class="container">
    <div class="row">
      <div class="col-md-12" style="padding: 0 0 0 0 !important; ">
        <div class="recent-post" style="background: #fff;border: 1px solid #e0e0e0;">
          <div class="media">
            <span class="pull-left" href="#" style="height: 40px; float:left !important; padding: 0 !important; margin: 10px 10px 10px 10px !important; ">
              <div class="media-object img-bg" id="blah" style="background-image: url('<?php
              if (empty($user_data->profile_image_url)) {
                echo base_url() . 'uploads/icon/profile_icon.png';
              } else {
                echo $user_data->profile_image_url;
              }
              ?>'); background-size: cover; background-position-x: center; background-position-y: top; width: 40px; height: 40px; border-radius: 20px"></div>
            </span>
            <div class="media-body" style="padding-right: 10px; padding-top: 10px;">
              <div class="col-md-12" style="margin: 10px 0 10px 0 !important; padding-left: 0 !important; text-align: left !important; font-size: 12px !important;">
                <a href="<?php echo base_url(); ?>home/teacher/profile/<?php echo $user_data->user_id; ?>">
                  <p>
                    <?php echo $teacher_data->name; ?>
                  </p>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- CONTENT -->
      <div id="blog_category" style="display: none"><?php echo $video_data->video_id; ?></div>
      <div class="col-md-12 content" id="content" style="padding-left: 0 !important; padding-right: 0 !important;">
        <article class="post-wrap post-single">
          <div class="post-media">
            <iframe src="<?php echo $video_data->video_url;?>" frameborder="0">
            </iframe>
            <h2 class="post-title" style="padding: 10px 10px 0 10px !important; text-align: left"><?php echo $video_data->title; ?></h2>
            <p class="post-desc" style="padding: 10px 10px 10px 10px !important;">
              <?php echo $video_data->desc; ?>
              <br>
              <?php
              $cat = '';
              $categories = $this->db->get_where('teacher_video_category', array('video_id' => $video_data->video_id))->result();
              foreach($categories as $category) {
                $cat .= $category->category . '/';
              }
              $cat[strlen($cat) - 1] = "\0";
              ?>
              <span class="text-sm" style="color:saddlebrown;">
              <?php echo $cat; ?>
            </span>
            </p>
          </div>
          <!--            <div class="buttons">
                          <div id="share"></div>
                      </div>
          -->
          <div class="post-body">
            <div class="post-excerpt">
              <?php if ($iam_this_video) { ?>
                <a href="javascript:void(0);">
                  <span class="video-edit pull-right" data-target='video-edit' style="color: grey;">
                    <i class="fa fa-ellipsis-v"></i>
                  </span>
                </a>
                <div id="video-edit">
                </div>
              <?php } ?>
              <span class="text-xl pull-left" id="like">
                <?php echo $this->crud_model->sns_func_html('like', 'class', $liked, $video_data->video_id, 20, 20); ?>
              </span>
            </div>
          </div>
          <!--          <hr class="page-divider"/>-->
        </article>
      </div>
      <!-- /CONTENT -->
    </div>
  </div
</section>
<div class="col-md-12" style="border-top: 2px solid #f5f5f5; margin-top: 35px; display:none">
  <button type="button" class="btn btn-theme pull-right open_modal video-delete" data-toggle="modal" data-target="#videoDeleteModal">
    확인
  </button>
  <button type="button" class="hidden btn btn-theme pull-right btn_dis signup_btn" data-reload='ok' data-unsuccessful='신청에 실패했습니다.' data-success='신청에 성공했습니다.' data-ing='진행중'>
    확인
  </button>
</div>
<div class="modal fade" id="videoDeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">클래스 삭제</h4>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <div>정말 클래스를 삭제 하시겠습니까?
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger video_delete_close" data-dismiss="modal">취소</button>
        <button type="button" class="btn btn-theme btn-theme-sm video_delete_confirm" style="text-transform: none;
                font-weight: 400;">확인</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function openPop() {
    if ($('#video-edit').css('display') === 'none') {
      var video_edit = '<?php echo base_url().'home/teacher/video_edit/'.$video_data->video_id.'/'.$user_data->user_id; ?>';
      var html = "<a href=\"" + video_edit + "\">수정</a><br>" +
        "<a href=\"javascript:void(0);\" onclick=\"$(\'.open_modal.video-delete\').click();\">삭제</a>";
      $('#video-edit').empty().append(html);
      $('#video-edit').show();
    } else {
      $('#video-edit').hide();
    }
  }

  $(document).ready(function() {
    active_menu_bar('find');
    $('.video-edit').click(function(e) {
      openPop();
    });
    $('.video_delete_confirm').click(function(e) {
      $('.video_delete_close').click();
      // e.preventDefault();
      $('#loading_set').show();
      $.ajax({
        url: '<?php echo base_url().'home/teacher/do_del_video/'.$video_data->video_id.'/'.$user_data->user_id; ?>',
        success: function(data) {
          $("#loading_set").fadeOut(500);
          if(data == 'done' || data.search('done') !== -1){
            notify('신청에 성공했습니다.','success','bottom','right');
            setTimeout(function(){
              location.href='<?php echo base_url().'home/teacher/profile/'.$user_data->user_id; ?>', 3000
            });
          } else {
            var text = '<div>신청에 실패했습니다.</div>'+data;
            notify(text,'warning','bottom','right');
          }
        },
        error: function(e) {
          console.log(e)
        }
      });
    });
  });
</script>
