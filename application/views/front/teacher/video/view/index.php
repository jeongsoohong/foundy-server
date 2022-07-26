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
  .post-title {
    font-size: 18px !important;
  }
  .post-desc {
    font-size: 13px !important;
  }
  .post-body .post-excerpt {
    height: 20px !important;
    font-size: 0;
    line-height: normal;
  }
  .post-body .post-excerpt .text-xl {
    font-size: 0;
    font-weight: normal;
    line-height: 0;
  }
  .recent-post {
    border: 0 !important;
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
                <a href="<?php echo base_url(); ?>home/teacher/profile/<?php echo $teacher_data->teacher_id; ?>">
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
          </div>
          <div class="post-body" style="margin: 0 !important; padding: 20px 16px 24px; position: unset; box-sizing: border-box; height: auto !important;">
            <? if ($iam_this_video) { ?>
              <button class="post__more">
                <img src="<?= base_url();?>template/icon/ic_more_horizon.png" width="20" height="5" class="more--icon">
                <script>
                  $(function(){
                    // console.log(1);
                    $('.post__more').click(function(){
                      $('.post__edit').toggle();
                    })
                  })
                </script>
              </button>
              <div class="post__edit">
                <button class="edit--modify" onclick="go_edit_video()">수정</button>
                <button class="edit--remove" onclick="open_del_video()">삭제</button>
              </div>
              <style type="text/css">
                .post-body {
                  position: relative !important;
                }
                .post-title {
                  width: 70%;
                  word-break: break-all;
                }
                .post-body button {
                  outline: none;
                  border: 0;
                  background: transparent;
                  padding: 0;
                }
                .post__more {
                  position: absolute;
                  width: 40px;
                  height: 40px;
      
                  margin-top: -8px;
                  right: 16px;
                  text-align: right;
                }
                .more--icon {
                  opacity: 0.3;
                }
                .post__edit {
                  display: none;
                  position: absolute;
                  top: 48px;
                  right: 15px;
                  height: 28px;
                }
                .post__edit button {
                  position: relative;
                  width: 40px;
                  height: 24px;
                  background-color: #333;
                  color: #fff;
                  font-size: 11px;
                  font-weight: bold;
                  box-sizing: border-box;
                  border-radius: 4px;
                }
              </style>
            <? } ?>
            <h2 class="post-title" style="color: #111; font-size: 16px !important; font-weight: bold !important; margin: 0; padding-bottom: 16px; line-height: 1.5;">
              <?php echo $video_data->title; ?>
            </h2>
            <p class="post-desc" style="color: #757575; font-size: 12px !important; line-height: 1.75; padding-bottom: 12px;">
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
              <span class="text-sm" style="color:saddlebrown; font-size: 11px; font-weight: bold !important;">
                <?php echo $cat; ?>
              </span>
            </p>
            <div class="post-excerpt">
              <style>
                #like a {
                  width: 20px;
                  height: 20px;
                  line-height: 20px;
                }
              </style>
              <span class="text-xl pull-left" id="like">
                <?php echo $this->crud_model->sns_func_html('like', 'class', $liked, $video_data->video_id, 20, 17.41); ?>
              </span>
            </div>
          </div>
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
  $(document).ready(function() {
    active_menu_bar('find');
    $('.video_delete_confirm').click(function(e) {
      $('.video_delete_close').click();
      // e.preventDefault();
      $('#loading_set').show();
      $.ajax({
        url: '<?php echo base_url().'home/teacher/do_del_video/'.$video_data->video_id.'/'.$user_data->user_id; ?>',
        success: function(data) {
          $("#loading_set").fadeOut(500);
          if(data === 'done' || data.search('done') !== -1){
            notify('신청에 성공했습니다.','success','bottom','right');
            setTimeout(function(){
              location.href='<?php echo base_url().'home/teacher/profile/'.$teacher_data->teacher_id; ?>';
            }, 3000);
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
  
  function open_del_video() {
    $('.open_modal.video-delete').click();
  }
  function go_edit_video() {
    location.href = '<?php echo base_url().'home/teacher/video_edit/'.$video_data->video_id.'/'.$user_data->user_id; ?>';
  }
</script>
