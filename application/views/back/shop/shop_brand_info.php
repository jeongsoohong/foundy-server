<?php $brand_info = $shop_brand_info[0]; ?>
<table border="1" bordercolor="#EAEAEA" class="col-md-12">
  <tbody>
<!--  <tr>-->
<!--    <th class="col-md-2 brand-text-date-header" style="background-color: #EAEAEA">브랜드 기간 문구</th>-->
<!--    <td class="col-md-10 brand-text-date">-->
<!--      <div class="col-md-12" style="padding: 5px">-->
<!--        <div class="col-md-2">-->
<!--          문구 설정기간-->
<!--        </div>-->
<!--        <div class="col-md-4">-->
<!--          <div class='input-group date' id='datetimepicker1'>-->
<!--            <input type='text' class="form-control" name="start_date"/>-->
<!--            <span class="input-group-addon">-->
<!--              <span class="glyphicon glyphicon-calendar"></span>-->
<!--            </span>-->
<!--          </div>-->
<!--        </div>-->
<!--        <div class="col-md-1" style="text-align: center">-->
<!--          ~-->
<!--        </div>-->
<!--        <div class="col-md-4">-->
<!--          <div class='input-group date' id='datetimepicker2'>-->
<!--            <input type='text' class="form-control" name="end_date"/>-->
<!--            <span class="input-group-addon">-->
<!--              <span class="glyphicon glyphicon-calendar"></span>-->
<!--            </span>-->
<!--          </div>-->
<!--        </div>-->
<!--        <div class="col-md-1">-->
<!--        </div>-->
<!--      </div>-->
<!--      <div class="col-md-12">-->
<!--        <div class="col-md-2">-->
<!--          기간 설정문구-->
<!--        </div>-->
<!--        <div class="col-md-10">-->
<!--          <textarea rows="5" class="form-control" data-height="500" data-name="brand-text-date">2018년 추석으로 인한 배송 안내드립니다.-->
<!--추석 전 마지막 발송은 9월 19일(수) 오후 1시 이전 주문건 까지이며,-->
<!--재계일은 9월 27일(목) 부터 순차적으로 진행될 예정입니다. 감사합니다.</textarea>-->
<!--        </div>-->
<!--      </div>-->
<!--      <div class="col-md-12" style="color: saddlebrown">-->
<!--        * 기간설정 코멘트는 아래의 브랜드 코멘트보다 상위에 노출됩니다.-->
<!--      </div>-->
<!--    </td>-->
<!--  </tr>-->
  <tr>
    <th class="col-md-2 brand-text-base-header" style="background-color: #EAEAEA">브랜드 문구</th>
    <td class="col-md-10 brand-text-base">
      <div class="col-md-12">
        <textarea id="brand_text_base" rows="5" class="form-control" data-height="500" data-name="brand-text-base"><?php echo $brand_info->brand_text; ?></textarea>
      </div>
      <div class="col-md-12" style="color: saddlebrown">
        * 브랜드문구는 기간 설정에 관계없이 항상 노출됩니다.
      </div>
    </td>
  </tr>
  </tbody>
</table>
