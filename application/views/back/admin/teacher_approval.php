<div>
  <?php
  echo form_open(base_url() . 'admin/teacher/approval_set/'.$teacher_id.'/'.$user_id, array(
    'class' => 'form-horizontal',
    'method' => 'post',
    'id' => 'teacher_approval',
    'enctype' => 'multipart/form-data'
  ));
  ?>
  <div class="panel-body">

    <div class="form-group">
      <label class="col-sm-2 control-label" for="demo-hor-1"> </label>
      <div class="col-sm-2">
        <h4>상태변경</h4>
      </div>
      <div class="col-sm-4 text-center">
        <input hidden id="teacher-activate"  data-size="switchery-lg" class='form-control' name="approval"
               type="text" value="<?php echo $activate; ?>" data-id='<?php echo $teacher_id; ?>' style="display: none;"/>
        <select class="chosen-choices form-control" id="teacher-activate-select" onchange="change_status();">
          <option <?php if ($activate == 0) echo 'selected'; ?> value="0">신청</option>
          <option <?php if ($activate == 1) echo 'selected'; ?> value="1">승인</option>
          <option <?php if ($activate == 2) echo 'selected'; ?> value="2">반려</option>
        </select>
      </div>
      <div class="col-sm-2">
        <h4>승인</h4>
      </div>
    </div>

  </div>
  </form>
</div>

<script type="text/javascript">
  function change_status() {
    let activate = $('#teacher-activate-select').find('option:checked').val();
    $('#teacher-activate').val(activate);
  }

  $(document).ready(function() {
    set_switchery();
    $("form").submit(function(e){
      //return false;
    });
  });
</script>
<div id="reserve"></div>

