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
          <div class="information-title">센터 정보 수정</div>
          <div class="details-wrap">
            <div class="row">
              <div class="col-md-12">
                <div class="tabs-wrapper content-tabs">
                  <div class="tab-content">
                    <div class="tab-pane fade in active">
                      <div class="details-wrap">
                        <div class="block-title alt">
                          <i class="fa fa-angle-down"></i>
                          강사 정보 수정
                        </div>
                        <p class="text-success">저장 후 원래대로 복원이 불가하므로 확인 후 저장하세요
                        </p>
                        <div class="details-box">
                          <?php
                          echo form_open(base_url() . 'home/center/teacher/modify/'.$center_data->center_id, array(
                            'class' => 'form-login',
                            'method' => 'post',
                            'enctype' => 'multipart/form-data'
                          ));
                          ?>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="profile" style="font-family: 'quicksand' !important; font-size: 15px; text-align: center; padding-bottom: 5px; !important;">
                                <b>instructor</b>
                                <span class="pull-right" id="isearch"><img src="<?php echo base_url(); ?>uploads/icon/icon-2.png" style="width: 20px; height: 20px;"></span>
                              </div>
                              <div class="add_list_input" style="display: none;">
<!--                                  <input id='in-3' type="hidden" name="add_list[]" value="3">-->
<!--                                  <input id='in-4' type="hidden" name="add_list[]" value="4">-->
                              </div>
                              <div class="widget " style="padding-bottom:10px; ">
                                <ul class="profile_ul teacher_list_ul" style="text-align: center">
                                  <?php
                                  $teacher_id_list = array();
                                  if ($center_data->teacher_cnt > 0) {
                                    foreach ($teacher_data as $teacher) {
                                      $teacher = $this->db->get_where('teacher', array('teacher_id' => $teacher->teacher_id))->row();
                                      $teacher_id = $teacher->teacher_id;
                                      $teacher_name = $teacher->name;
                                      $teacher_email = $user_data->email;

                                      $teacher_id_list[] = $teacher_id;
                                      ?>
                                      <li id="li-<?php echo $teacher_id; ?>"><?php echo "{$teacher_name}({$teacher_email})"; ?>
                                        <a href="javascript:void(0);" onclick="remove_teacher($(this).attr('id'), $(this).parent('li').text());" id="<?php echo $teacher_id; ?>">
                                          <span class="pull-right" style="font-weight: 600; color:gray">-</span>
                                        </a>
                                      </li>
                                      <?php
                                    }
                                  }
                                  ?>
                                </ul>
                              </div>
                            </div>
                            <div class="col-md-12" id="remove_block" style="display: none">
                              <div class="profile" style="font-family: 'quicksand' !important; font-size: 15px; text-align: center; padding-bottom: 5px; !important;"><b>removed</b></div>
                              <div class="remove_list_input" style="display: none;">
<!--                                <input id='in-5' type="hidden" name="remove_list[]" value="5">-->
<!--                                <input id='in-6' type="hidden" name="remove_list[]" value="6">-->
                              </div>
                              <div class="widget " style="padding-bottom:10px; ">
                                <ul class="profile_ul remove_list_ul" style="text-align: center">
<!--                                  <li id="li-5">홍정수(jsoohong90@naver.com)-->
<!--                                    <a href="javascript:void(0);" onclick="add_teacher($(this).attr('id'), $(this).parent('li').text());" id="5">-->
<!--                                      <span class="pull-right" style="font-weight: 600; color:gray">+</span>-->
<!--                                    </a>-->
<!--                                  </li>-->
<!--                                  <li id="li-6">우우우(wowowo@naver.com)-->
<!--                                    <a href="javascript:void(0);" onclick="add_teacher($(this).attr('id'), $(this).parent('li').text());" id="6">-->
<!--                                      <span class="pull-right" style="font-weight: 600; color:gray">+</span>-->
<!--                                    </a>-->
<!--                                  </li>-->
                                </ul>
                              </div>
                            </div>
                            <div class="col-md-12" id="search_block" style="display: none;">
                              <div class="profile" style="font-family: 'quicksand' !important; font-size: 15px; text-align: center; padding-bottom: 5px; !important;"><b>search</b></div>
                              <div class="form-group">
                                <div class="input-group">
                                  <input class="form-control" id="teacher_search" name="teacher_search" value="" type="text"
                                         placeholder="강사 가입 시 이메일로 검색" data-toggle="tooltip" title="teacher_search" style="border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important;">
                                  <div class="input-group-addon" style="padding: 0 0 0 0">
                                    <label id="teacher-search" style="margin: 0 0 0 0">
                                      <a href="javascript:void(0);" onclick="search_teacher()">
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
                            <div class="col-md-12" style="border-top: 2px solid #f5f5f5; margin-top: 35px">
                              <button type="button" class="btn btn-theme pull-right open_modal modify-instructor-req" data-toggle="modal" data-target="#modifyInstructorReq">
                                확인
                              </button>
                              <button type="button" class="hidden btn btn-theme pull-right btn_dis signup_btn" data-reload='no' data-relocation='<?php echo base_url()."home/center/profile/{$center_data->center_id}"; ?>' data-unsuccessful='신청에 실패했습니다.' data-success='신청에 성공했습니다.' data-ing='진행중'>
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
<div class="modal fade" id="modifyInstructorReq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">센터 정보 수정</h4>
      </div>
      <div class="modal-body">
        <div class="text-instructor">
          <div>강사 정보를 수정하시겠습니까?
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
        <div class="text-instructor content_body" id="content_body">
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

<script>

  var teacher_list = [<?php foreach($teacher_id_list as $id) { echo "\"$id\","; }?>];
  var add_list = [];
  var remove_list = [];

  function is_original_teacher(teacher_id) {
    for (var i = 0; i < teacher_list.length; i++) {
      if (teacher_list[i] === teacher_id) {
        return true;
      }
    }
    return false;
  }

  function search_teacher() {
    var search_email = document.getElementById('teacher_search').value;
    // console.log(search_email);
    $.ajax({
      url : '<?php echo base_url(); ?>home/center/teacher/search?email=' + search_email,
      type : 'GET',
      dataType : 'json',
      contentType: 'application/json',
      success : function(res) {
        // console.log(res.status);
        if (res.status === 'success') {
          if (confirm(res.teacher_name + '님을 추가하시겠습니까?')) {
            var text = res.teacher_name + '(' + res.teacher_email + ')+';
            add_teacher(res.teacher_id, text);
            $('#search_block').hide();
            document.getElementById('teacher_search').value = '';
          }
        } else {
          alert(res.message);
        }
      },
      error: function(xhr, status, error){
        alert(error);
      }
    });
  }

  function add_teacher(teacher_id, text) {
    var tmp = text.replace(/(\s*)/g,""); // 모든 공백을 없앤다
    var teacher_data = tmp.substring(0, tmp.length - 1); // 마지막 +/- 제거

    $('#li-' + teacher_id).remove();
    $('#in-' + teacher_id).remove();

    var teacher_list_html = '<li id=\"li-' + teacher_id + '\">' + teacher_data +
      '<a href="javascript:void(0);" onclick=\"remove_teacher($(this).attr(\'id\'), $(this).parent(\'li\').text());\" id=\"' + teacher_id + '\">' +
      '<span class="pull-right" style="font-weight: 600; color:gray">-</span></a></li>';
    $('.teacher_list_ul').append(teacher_list_html);

    if (is_original_teacher(teacher_id) === false) {
      var add_input_html = '<input id=\'in-' + teacher_id + '\' type=\"hidden\" name=\"add_list[]\" value=\"' + teacher_id + '\">';
      $('.add_list_input').append(add_input_html);
    }

    if ($('.remove_list_ul li').length <= 0) {
      $('#remove_block').hide();
    }

    // console.log($('.remove_list_ul li').length);
  }

  function remove_teacher(teacher_id, text) {

    var tmp = text.replace(/(\s*)/g,""); // 모든 공백을 없앤다
    var teacher_data = tmp.substring(0, tmp.length - 1); // 마지막 +/- 제거

    $('#li-' + teacher_id).remove();
    $('#in-' + teacher_id).remove();

    var remove_list_html = '<li id=\"li-' + teacher_id + '\">' + teacher_data +
      '<a href="javascript:void(0);" onclick=\"add_teacher($(this).attr(\'id\'), $(this).parent(\'li\').text());\" id=\"' + teacher_id + '\">' +
      '<span class="pull-right" style="font-weight: 600; color:gray">+</span></a></li>';
    $('.remove_list_ul').append(remove_list_html);

    if (is_original_teacher(teacher_id) === true) {
      var remove_input_html = '<input id=\'in-' + teacher_id + '\' type=\"hidden\" name=\"remove_list[]\" value=\"' + teacher_id + '\">';
      $('.remove_list_input').append(remove_input_html);
    }

    if ($('#remove_block').css('display') === 'none') {
      $('#remove_block').show();
    }
  }

  $(function() {
    $('#isearch').click(function () {
      if ($('#search_block').css('display') === 'none') {
        $('#search_block').show();
      } else {
        $('#search_block').hide();
      }
    });
  });
</script>
