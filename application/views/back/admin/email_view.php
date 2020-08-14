<div id="content-container" style="padding-top:0px !important;">
  <div class="text-center pad-all">
    <div class="pad-ver">
<!--      <img class="img-sm img-border" src="--><?php //echo base_url(); ?><!--uploads/vendor_logo_image/default.jpg" alt="">-->
    </div>
    <h4 class="text-lg text-overflow mar-no"><?php echo $email->type_desc; ?></h4>
    <p class="text-sm">email</p>
    <div class="pad-ver btn-group">
      <button class="btn <?php echo ($email->activate ? 'btn-success' : 'btn-danger'); ?>"><?php echo ($email->activate ? '승인' : '미승인'); ?></button>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-sm-12">
      <div class="panel-body">
        <table class="table table-striped" style="border-radius:3px;">
          <tbody>
          <tr>
            <th class="custom_td">보내는 주소</th>
            <td class="custom_td"><?php echo $email->from; ?></td>
          </tr>
          <tr>
            <th class="custom_td">보내는 사람</th>
            <td class="custom_td"><?php echo $email->from_name; ?></td>
          </tr>
          <tr>
            <th class="custom_td">메일 타입</th>
            <td class="custom_td"><?php echo $email->mailtype; ?></td>
          </tr>
          <tr>
            <th class="custom_td">이메일 제목</th>
            <td class="custom_td"><?php echo $email->subject; ?></td>
          </tr>
          <tr>
            <th class="custom_td">치환 문자열</th>
            <td class="custom_td"><?php echo $email->substitute_str; ?></td>
          </tr>
          <tr>
            <th class="custom_td">이메일 본문</th>
            <td class="custom_td"><?php echo $email->email_body; ?></td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<style>
  .custom_td{
    border-left: 1px solid #ddd;
    border-right: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
  }
  .custom_td img {
    width: 100% !important;
    height: auto !important;
  }
</style>
<script type="text/javascript">
  $(document).ready(function(){
    $('.enterer').hide();
  });
</script>
