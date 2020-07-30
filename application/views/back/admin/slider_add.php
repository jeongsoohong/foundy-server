<div class="row">
  <div class="col-md-12">
    <?php
    echo form_open(base_url() . 'admin/slider/do_add', array(
      'class' => 'form-horizontal',
      'method' => 'post',
      'id' => 'slider_add',
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
                <input type="text" name="title" id="demo-hor-1" placeholder="제목을 입력해주세요" class="form-control required">
              </div>
            </div>
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-2">카테고리</label>
              <div class="col-sm-6">
                <input type="text" name="category" id="demo-hor-1" placeholder="카테고리을 입력해주세요" class="form-control required">
              </div>
            </div>
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-12">Slider Image</label>
              <div class="col-sm-6">
                <span class="pull-left btn btn-default btn-file">파일열기
                  <input type="file" name="img" onchange="preview(this);" id="demo-hor-12" class="form-control required">
                </span>
                <br><br>
                <span id="previewImg" ></span>
              </div>
            </div>
            <div class="form-group btm_border">
              <label class="col-sm-4 control-label" for="demo-hor-1">설명</label>
              <div class="col-sm-6">
                <textarea rows="2" name='desc' id='desc' data-name="desc" class="form-control required" onkeydown="return limitLines(this, event);"></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="panel-footer">
      <div class="row">
        <div class="col-md-11">
          <span class="btn btn-purple btn-labeled fa fa-refresh pro_list_btn pull-right" onclick="ajax_set_full('add','add_slider','정상적으로 리셋되었습니다!','slider_add',''); ">
            리셋
          </span>
        </div>
        <div class="col-md-1">
          <span class="btn btn-success btn-md btn-labeled fa fa-upload pull-right enterer" onclick="submit()">
            업로드
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

  function limitLines(obj, e) {
    let n = (obj.value.match(/\r\n|\r|\n/g)||[]).length + 1, maxRows = obj.rows;
    if (e.which === 13 && n === maxRows) {
      return false;
    } else {
      return true;
    }
  }

  function postDesc() {
    let desc = document.getElementById('desc');
    desc.value = desc.value.replace(/\r\n|\r|\n/g,"<br />");
    return true;
  }

  function submit() {
    postDesc();
    form_submit('slider_add','정상적으로 업로드되었습니다!');
    proceed('to_add');
  }

  $(document).ready(function() {
    $("form").submit(function(e){
      return false;
    });
  });
</script>
<style>
  .btm_border{
    border-bottom: 1px solid #ebebeb;
    padding-bottom: 15px;
  }
</style>

<!--Bootstrap Tags Input [ OPTIONAL ]-->
