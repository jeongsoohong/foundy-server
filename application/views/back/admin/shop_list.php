<div class="panel-body" id="demo_s">
  <table id="demo-table" class="table table-striped"  data-pagination="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" >
    <thead>
    <tr>
      <th><?php echo ('샵아이디');?></th>
      <th><?php echo ('유저아이디');?></th>
      <th><?php echo ('브랜드명');?></th>
      <th><?php echo ('대표자명');?></th>
      <th><?php echo ('연락처');?></th>
      <th><?php echo ('품목');?></th>
      <th><?php echo ('홈페이지');?></th>
      <th><?php echo ('이메일');?></th>
      <th><?php echo ('상태');?></th>
      <th class="text-right"><?php echo ('옵션');?></th>
    </tr>
    </thead>
    <tbody >
    <?php
    $i = 0;
    foreach($all_shops as $row){
      $i++;
      ?>
      <tr>
        <td><?php echo $row['shop_id']; ?></td>
        <td><?php echo $row['user_id']; ?></td>
        <td><?php echo $row['shop_name']; ?></td>
        <td><?php echo $row['representative_name']; ?></td>
        <td><?php echo $row['shop_phone']; ?></td>
        <td><?php echo $row['shop_items']; ?></td>
        <td><?php echo $row['shop_homepage_url']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td>
          <div class="label label-<?php if($row['activate'] == 1){ ?>purple<?php } else { ?>danger<?php }
          ?>">
            <?php echo $row['activate'] ? '승인' : '미승인'; ?>
          </div>
        </td>
        <td class="text-right">
          <a class="btn btn-dark btn-xs btn-labeled fa fa-user" data-toggle="tooltip"
             onclick="ajax_modal('view','<?php echo ('view_profile'); ?>','<?php echo ('successfully_viewed!');
             ?>','shop_view','<?php echo $row['shop_id']; ?>')" data-original-title="View"
             data-container="body">
            <?php echo ('샵정보');?>
          </a>
          <a class="btn btn-edit btn-xs btn-labeled fa fa-wrench" data-toggle="tooltip" onclick="ajax_set_full('edit','edit_shop','정상적으로 수정되었습니다!','shop_edit','<?php echo $row['shop_id']; ?>');proceed('to_list');" data-original-title="Edit" data-container="body">
            수정
          </a>
          <a class="btn btn-<?php echo ($row['activate'] ? 'warning' : 'success');?> btn-xs btn-labeled fa fa-check" data-toggle="tooltip"
             onclick="ajax_modal('approval','shop_approval','successfully_approval!','shop_approval','<?php echo $row['shop_id']; ?>')" data-original-title="View" data-container="body">
            <?php echo ($row['activate'] ? '미승인' : '승인');?>
          </a>
          <a onclick="open_password(<? echo $row['shop_id']; ?>)" class="btn btn-xs btn-danger btn-labeled fa fa-trash">
            비밀번호변경
          </a>
        </td>
      </tr>
      <?php
    }
    ?>
    </tbody>
  </table>
</div>
<div class="modal fade" id="pwModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">비밀번호 변경</h4>
      </div>
      <div class="modal-body">
        <div class="pw1">
          <input type="password" class="form-control" id="password1" name="password1" placeholder="비밀번호">
        </div>
        <div class="pw2">
          <input type="password" class="form-control" id="password2" name="password2" placeholder="비밀번호 확인">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-theme-sm" data-dismiss="modal" onclick="clear_password();">취소</button>
        <button type="button" class="btn btn-theme btn-theme-sm"style="background-color: black; color: white; text-transform: none; font-weight: 400;"
                onclick="change_password();">확인</button>
      </div>
    </div>
  </div>
</div>
<style>
  .pw1, .pw2 {
    margin: 10px;
  }
</style>
<script>
  
  function clear_password() {
    // console.log($('#password1').val());
    // console.log($('#password2').val());
    
    $('#password1').val('');
    $('#password2').val('');
    $('#pwModal').modal('hide');
  }
 
  let shop_id = 0;
  function open_password(id) {
    clear_password();
   
    // console.log('shop_id : ' + shop_id);
    
    shop_id = id;
    $('#pwModal').modal('show');
  }
  
  function change_password() {
    let password1 = $('#password1').val();
    let password2 = $('#password2').val();
    
    // console.log(shop_id);
    // console.log(password1);
    // console.log(password2);
    
    let formData = new FormData();
    formData.append('shop_id', shop_id);
    formData.append('password1', password1);
    formData.append('password2', password2);
  
    $.ajax({
      url : '<?php echo base_url().'admin/shop/password'; ?>',
      type: 'post', // form submit method get/post
      dataType: 'html',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success : function(res) {
        // console.log(res);
        res = JSON.parse(res);
        if (res.status === 'success') {
          // alert(res.message);
          let text = '<strong>' + res.message + '</strong>';
          $.activeitNoty({
            type: 'success',
            icon : 'fa fa-plus',
            message : text,
            container : 'floating',
            timer : 3000
          });
          setTimeout(function() {location.reload();}, 1000);
        } else {
          let text = '<strong>실패하였습니다</strong><br>' + res.message;
          $.activeitNoty({
            type: 'danger',
            icon : 'fa fa-minus',
            message : text,
            container : 'floating',
            timer : 3000
          });
        }
      },
      error: function(xhr, status, error){
        // console.log(xhr);
        // console.log(status);
        // console.log(error);
        alert('fail : ' + error);
        // window.location.href = base_url + 'home/login';
      }
    });
  }
  
</script>
<div id="vendr"></div>
<div id='export-div' style="padding:40px;">
  <h1 id ='export-title' style="display:none;">shops</h1>
  <table id="export-table" class="table" data-name='vendors' data-orientation='p' data-width='1500' style="display:none;">
    <colgroup>
      <col width="50">
      <col width="150">
      <col width="150">
      <col width="150">
      <col width="150">
      <col width="150">
      <col width="150">
      <col width="150">
      <col width="150">
    </colgroup>
    <thead>
    <tr>
      <th><?php echo ('샵아이디');?></th>
      <th><?php echo ('유저아이디');?></th>
      <th><?php echo ('상호명');?></th>
      <th><?php echo ('대표자명');?></th>
      <th><?php echo ('연락처');?></th>
      <th><?php echo ('품목');?></th>
      <th><?php echo ('홈페이지');?></th>
      <th><?php echo ('이메일');?></th>
      <th><?php echo ('상태');?></th>
    </tr>
    </thead>
    <tbody >
    <?php
    $i = 0;
    foreach($all_shops as $row){
      $i++;
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['shop_id']; ?></td>
        <td><?php echo $row['user_id']; ?></td>
        <td><?php echo $row['shop_name']; ?></td>
        <td><?php echo $row['representative_name']; ?></td>
        <td><?php echo $row['shop_phone']; ?></td>
        <td><?php echo $row['shop_items']; ?></td>
        <td><?php echo $row['shop_homepage_url']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['activate'] ? '승인' : '미승인'; ?></td>
      </tr>
      <?php
    }
    ?>
    </tbody>
  </table>
</div>

