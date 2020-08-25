<div class="row">
  <div class="col-md-12">
    <?php
    echo form_open(base_url() . 'admin/slider/update/'.$slider->slider_id, array(
      'class' => 'form-horizontal',
      'method' => 'post',
      'id' => 'slider_edit',
      'enctype' => 'multipart/form-data'
    ));
    ?>
    <!--Panel heading-->
    <div class="panel-body">
      <div class="tab-base">
        <!--Tabs Content-->
        <div class="tab-content">
          <div id="blog_details" class="tab-pane fade active in">
            <div class="form-group btm_border">
              <h4 class="text-thin text-center">Slider 상세</h4>
            </div>
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-1">제목</label>
              <div class="col-sm-6">
                <input type="text" name="title" id="demo-hor-1" placeholder="제목을 입력해주세요" class="form-control required" value="<?php echo $slider->title; ?>">
              </div>
            </div>
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-2">카테고리</label>
              <div class="col-sm-6">
                <input type="text" name="category" id="demo-hor-1" placeholder="카테고리을 입력해주세요" class="form-control required" value="<?php echo $slider->category; ?>">
              </div>
            </div>
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-2">위치</label>
              <div class="col-sm-6">
                <select class="form-control required" name="slider_type">
                  <option <?php if ($slider->type == MAIN_SLIDER_TYPE_HOME) echo 'selected'; ?>
                    value="<?php echo MAIN_SLIDER_TYPE_HOME; ?>"><?php echo 'HOME'; ?></option>
                  <option <?php if ($slider->type == MAIN_SLIDER_TYPE_SHOP) echo 'selected'; ?>
                    value="<?php echo MAIN_SLIDER_TYPE_SHOP; ?>"><?php echo 'SHOP'; ?></option>
                </select>
              </div>
            </div>
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-2">링크</label>
              <div class="col-sm-6">
                <input value="<?php echo $slider->link; ?>" type="text" name="slider_link" id="demo-hor-1" placeholder="링크 연결시 입력해주세요" class="form-control">
              </div>
            </div>
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-12">Slider Image</label>
              <div class="col-sm-6">
                <span class="pull-left btn btn-default btn-file">파일열기
                  <input type="file" name="img" onchange="preview(this);" id="demo-hor-12" class="form-control">
                </span>
                <br><br>
                <span id="previewImg" >
                    <img class="img-responsive" width="100" src="<?php echo $slider->slider_image_url; ?>" alt="User_Image" >
                  </span>
              </div>
            </div>
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-1">설명</label>
              <div class="col-sm-6">
                <textarea rows="2" name='desc' id='desc' data-name="desc" class="form-control required" onkeydown="return limitLines(this, event);"><?php echo $slider->desc; ?></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="panel-footer">
      <div class="row">
        <div class="col-md-11">
          <span class="btn btn-purple btn-labeled fa fa-refresh pro_list_btn pull-right" onclick="ajax_set_full('edit','edit_slider','정상적으로 리셋되었습니다!','slider_edit',''); ">
            리셋
          </span>
        </div>
        <div class="col-md-1">
          <span class="btn btn-success btn-md btn-labeled fa fa-upload pull-right enterer" onclick="submit()">
            수정
        </div>
      </div>
    </div>
    </form>
  </div>
</div>

<script src="<?php echo base_url(); ?>template/back/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js">
</script>

<script type="text/javascript">
  window.preview = function (input) {
    if (input.files && input.files[0]) {
      $("#previewImg").html('');
      $(input.files).each(function () {
        var reader = new FileReader();
        reader.readAsDataURL(this);
        reader.onload = function (e) {
          $("#previewImg").append("<div style='float:left;border:4px solid #303641;padding:5px;margin:5px;'><img height='80' src='" + e.target.result + "'></div>");
        }
      });
    }
  }

  function submit() {
    postDesc('desc');
    form_submit('slider_edit','정상적으로 업로드되었습니다!');
    proceed('to_add');
  }

  $(document).ready(function() {
    $("form").submit(function(e){
      return false;
    });
    preDesc('desc');
  });
</script>
<style>
  .btm_border{
    border-bottom: 1px solid #ebebeb;
    padding-bottom: 15px;
  }
</style>

<!--Bootstrap Tags Input [ OPTIONAL ]-->

