<style>
  .require {
    color: red;
  }
</style>
<div class="row">
  <div class="col-md-12">
    <?php
    echo form_open(base_url() . 'admin/shop/do_add', array(
      'class' => 'form-horizontal',
      'method' => 'post',
      'id' => 'shop_add',
      'enctype' => 'multipart/form-data'
    ));
    ?>
    <!--Panel heading-->
    <div class="panel-body">
      <div id="shop_details" class="tab-pane fade active in">
        <div class="form-group btm_border">
          <label class="col-sm-4 control-label" for="demo-hor-1">
            브랜드명
            <span class="require">*</span>
          </label>
          <div class="col-sm-6">
            <input type="text" name="shop_name" id="demo-hor-1" value="" placeholder="상호명" class="form-control required">
          </div>
        </div>
        <div class="form-group btm_border">
          <label class="col-sm-4 control-label" for="demo-hor-2">
            대표자명
            <span class="require">*</span>
          </label>
          <div class="col-sm-6">
            <input type="text" name="representative_name" id="demo-hor-2" placeholder="대표자명" class="form-control required"
                   value="">
          </div>
        </div>
        <div class="form-group btm_border">
          <label class="col-sm-4 control-label" for="demo-hor-3">
            연락처
            <span class="require">*</span>
          </label>
          <div class="col-sm-6">
            <input type="text" name="shop_phone" id="demo-hor-3" placeholder="연락처" class="form-control required"
                   value="">
          </div>
        </div>
        <div class="form-group btm_border">
          <label class="col-sm-4 control-label" for="demo-hor-0">
            주소
          </label>
          <div class="col-sm-6">
            <div class="col-sm-6">
              <input readonly type="text" name="postcode" id="postcode" placeholder="우편번호" class="form-control"
                     value="">
            </div>
            <div class="col-sm-3">
              <button class="address-postcode-search-btn btn-edit" onclick="search_address()" style="padding: 0; font-size:12px; width:100%;height:32px">주소찾기</button>
            </div>
            <div class="col-sm-3">
            </div>
            <div class="col-sm-12">
              <input readonly type="text" name="address_1" id="address-1" placeholder="기본주소" class="form-control"
                     value="">
            </div>
            <div class="col-sm-12">
              <input readonly type="text" name="address_2" id="address-2" placeholder="상세주소" class="form-control"
                     value="">
            </div>
          </div>
        </div>
        <div class="form-group btm_border">
          <label class="col-sm-4 control-label" for="demo-hor-4">
            푹목
            <span class="require">*</span>
          </label>
          <div class="col-sm-6">
            <input type="text" name="shop_items" id="demo-hor-4" placeholder="푹목" class="form-control required"
                   value="">
          </div>
        </div>
        <div class="form-group btm_border">
          <label class="col-sm-4 control-label" for="demo-hor-5">
            홈페이지
            <span class="require">*</span>
          </label>
          <div class="col-sm-6">
            <input type="url" name="shop_homepage_url" id="demo-hor-5" placeholder="홈페이지" class="form-control required"
                   value="">
          </div>
        </div>
        <div class="form-group btm_border">
          <label class="col-sm-4 control-label" for="demo-hor-6">
            이메일
            <span class="require">*</span>
          </label>
          <div class="col-sm-6">
            <input type="email" name="email" id="demo-hor-6" placeholder="이메일" class="form-control required"
                   value="">
          </div>
        </div>
        <div class="form-group btm_border">
          <label class="col-sm-4 control-label" for="demo-hor-7">
            사업자등록번호
            <span class="require">*</span>
          </label>
          <div class="col-sm-6">
            <input type="text" name="business_license_num" id="demo-hor-7" placeholder="사업자등록번호" class="form-control require"
                   value="">
          </div>
        </div>
        <div class="form-group btm_border">
          <label class="col-sm-4 control-label" for="demo-hor-8">
            업종
          </label>
          <div class="col-sm-6">
            <input type="text" name="business_conditions" id="demo-hor-8" placeholder="업종" class="form-control"
                   value="">
          </div>
        </div>
        <div class="form-group btm_border">
          <label class="col-sm-4 control-label" for="demo-hor-9">
            업태
          </label>
          <div class="col-sm-6">
            <input type="text" name="business_type" id="demo-hor-9" placeholder="업태" class="form-control"
                   value="">
          </div>
        </div>
        <div class="form-group btm_border">
          <label class="col-sm-4 control-label" for="demo-hor-10">
            수수료율(%)
            <span class="require">*</span>
          </label>
          <div class="col-sm-6">
            <input type="text" name="commission_rate" id="demo-hor-10" placeholder="수수료율(%)" class="form-control required"
                   value="">
          </div>
        </div>
        <div class="form-group btm_border">
          <label class="col-sm-4 control-label" for="demo-hor-11">
            인스타그램 / 페이스북
          </label>
          <div class="col-sm-6">
            <input type="url" name="sns_url" id="demo-hor-11" placeholder="인스타그램 / 페이스북" class="form-control"
                   value="">
          </div>
        </div>
        <div class="form-group btm_border">
          <label class="col-sm-4 control-label" for="demo-hor-13">
            은행
          </label>
          <div class="col-sm-6">
            <input type="text" name="bank_name" id="demo-hor-13" placeholder="은행" class="form-control" value="">
          </div>
        </div>
        <div class="form-group btm_border">
          <label class="col-sm-4 control-label" for="demo-hor-14">
            계좌번호
          </label>
          <div class="col-sm-6">
            <input type="text" name="bank_account_num" id="demo-hor-14" placeholder="계좌번호" class="form-control"
                   value="">
          </div>
        </div>
        <div class="form-group btm_border">
          <label class="col-sm-4 control-label" for="demo-hor-15">
            예금주
          </label>
          <div class="col-sm-6">
            <input type="text" name="bank_depositor" id="demo-hor-15" placeholder="예금주" class="form-control"
                   value="">
          </div>
        </div>
        <div class="form-group btm_border">
          <label class="col-sm-4 control-label" for="demo-hor-16">사업자등록증</label>
          <div class="col-sm-6">
              <span class="pull-left btn btn-default btn-file">파일열기
                <input type="file" name="business_license_img" onchange="preview(this);" id="demo-hor-16" class="form-control">
              </span>
            <br><br>
            <span id="previewImg" >
<!--                <img class="img-responsive" src="--><?php //echo $row['business_license_url']; ?><!--" alt="" style="width:100%;height:auto">-->
              </span>
          </div>
        </div>
      </div>
    </div>
    <div class="panel-footer">
      <div class="row">
        <div class="col-md-11">
<!--            <span class="btn btn-purple btn-labeled fa fa-refresh pro_list_btn pull-right"-->
<!--                  onclick="ajax_set_full('add','_shop','정상적으로 리셋되었습니다!','shop_add','--><?php //echo $row['shop_id']; ?><!--')"> -->
<!--              리셋 -->
<!--            </span> -->
        </div>
        <div class="col-md-1">
            <span class="btn btn-success btn-md btn-labeled fa fa-wrench pull-right enterer"
                  onclick="form_submit('shop_add','정상적으로 수정되었습니다!');proceed('to_add');" >
              업로드
            </span>
        </div>
      </div>
    </div>
    </form>
  </div>
</div>
<!--Bootstrap Tags Input [ OPTIONAL ]-->
<script src="<?php echo base_url(); ?>template/back/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
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
  
  function search_address() {
    new daum.Postcode({
      oncomplete: function(data) {
        // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.
        
        // 각 주소의 노출 규칙에 따라 주소를 조합한다.
        // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
        var addr = ''; // 주소 변수
        var extraAddr = ''; // 참고항목 변수
        
        //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
        if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
          addr = data.roadAddress;
        } else { // 사용자가 지번 주소를 선택했을 경우(J)
          addr = data.jibunAddress;
        }
        
        // 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
        if(data.userSelectedType === 'R'){
          // 법정동명이 있을 경우 추가한다. (법정리는 제외)
          // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
          if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
            extraAddr += data.bname;
          }
          // 건물명이 있고, 공동주택일 경우 추가한다.
          if(data.buildingName !== '' && data.apartment === 'Y'){
            extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
          }
          // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
          if(extraAddr !== ''){
            extraAddr = ' (' + extraAddr + ')';
          }
          // 조합된 참고항목을 해당 필드에 넣는다.
          // document.getElementById("return-info-extra-address").value = extraAddr;
          
        } else {
          // document.getElementById("return-info-extra-address").value = '';
        }
        
        // 우편번호와 주소 정보를 해당 필드에 넣는다.
        $('#postcode').attr('value', data.zonecode);
        $('#address-1').attr('value', addr + extraAddr);
        // 커서를 상세주소 필드로 이동한다.
        $('#address-2').attr('readonly', false);
        $('#address-2').focus();
      }
    }).open();
  }
  
  $(document).ready(function() {
    $("form").submit(function(e){
      e.preventDefault();
    });
    
    // 초기 로드시 크기 조절 처리
    // $('.note-editable').keyup();
  });
</script>
<style>
  .btm_border{
    border-bottom: 1px solid #EAEAEA;
    padding-bottom: 15px;
  }
</style>

