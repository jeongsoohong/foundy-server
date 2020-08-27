<style>
  .panel {
    height: 200px;
  }
  .panel-body table {
    height: 100px;
    text-align: center;
  }
  .panel-body table thead th {
    text-align: center;
  }
  .panel-body table thead tr {
    height: 20px;
    font-size: 20px;
  }
  .panel-body table tbody tr {
    font-size: 40px;
  }
</style>
<div id="content-container">
  <div id="page-title">
    <h1 class="page-header text-overflow">대시보드</h1>
  </div>
  <div id="page-content">
    <div class="row">
      <div class="col-md-8 col-sm-8 col-xs-8">
        <div class="panel panel-bordered panel-dark">
          <div class="panel-heading">
            <h3 class="panel-title">주문</h3>
          </div>
          <div class="panel-body">
            <div class="text-center">
              <table class="col-md-12 col-sm-12 col-xs-12">
                <thead>
                <tr>
                  <th class="col-md-2 col-sm-2 col-xs-2">입금대기</th>
                  <th class="col-md-2 col-sm-2 col-xs-2">결제완료</th>
                  <th class="col-md-2 col-sm-2 col-xs-2">상품준비중</th>
                  <th class="col-md-2 col-sm-2 col-xs-2">배송중</th>
                  <th class="col-md-2 col-sm-2 col-xs-2">배송완료</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td class="col-md-2 col-sm-2 col-xs-2">0</td>
                  <td class="col-md-2 col-sm-2 col-xs-2">0</td>
                  <td class="col-md-2 col-sm-2 col-xs-2">0</td>
                  <td class="col-md-2 col-sm-2 col-xs-2">0</td>
                  <td class="col-md-2 col-sm-2 col-xs-2">0</td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-4">
        <div class="panel panel-bordered panel-dark">
          <div class="panel-heading">
            <h3 class="panel-title">발송</h3>
          </div>
          <div class="panel-body">
            <div class="text-center">
              <table class="col-md-12 col-sm-12 col-xs-12">
                <thead>
                <tr>
                  <th class="col-md-6 col-sm-6 col-xs-6">발송지연</th>
                  <th class="col-md-6 col-sm-6 col-xs-6">반품접수</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td class="col-md-6 col-sm-6 col-xs-6">0</td>
                  <td class="col-md-6 col-sm-6 col-xs-6">0</td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
<!--    <div class="row">-->
<!--      <div class="col-md-8 col-sm-8 col-xs-8">-->
<!--        <div class="panel panel-bordered panel-dark">-->
<!--          <div class="panel-heading">-->
<!--            <h3 class="panel-title">상품 Q&A</h3>-->
<!--          </div>-->
<!--          <div class="panel-body">-->
<!--            <div class="text-center">-->
<!--              <table class="col-md-12 col-sm-12 col-xs-12" border="1" bordercolor="grey">-->
<!--                <thead>-->
<!--                <tr style="font-size: 12px">-->
<!--                  <th class="col-md-1 col-sm-1 col-xs-1">번호</th>-->
<!--                  <th class="col-md-2 col-sm-2 col-xs-2">브랜드</th>-->
<!--                  <th class="col-md-2 col-sm-2 col-xs-2">상품명</th>-->
<!--                  <th class="col-md-2 col-sm-2 col-xs-2">고객명</th>-->
<!--                  <th class="col-md-4 col-sm-4 col-xs-4">문의내용</th>-->
<!--                  <th class="col-md-1 col-sm-1 col-xs-1">답변</th>-->
<!--                </tr>-->
<!--                </thead>-->
<!--                <tbody>-->
<!--                <tr style="font-size: 12px">-->
<!--                  <td class="col-md-1 col-sm-1 col-xs-1">1</td>-->
<!--                  <td class="col-md-2 col-sm-2 col-xs-2">파운디</td>-->
<!--                  <td class="col-md-2 col-sm-2 col-xs-2">YOGA 매트</td>-->
<!--                  <td class="col-md-2 col-sm-2 col-xs-2">정수</td>-->
<!--                  <td class="col-md-4 col-sm-4 col-xs-4">매트 사이즈가 어떻게 되나요?</td>-->
<!--                  <td class="col-md-1 col-sm-1 col-xs-1">Y</td>-->
<!--                </tr>-->
<!--                <tr style="font-size: 12px">-->
<!--                  <td class="col-md-1 col-sm-1 col-xs-1">1</td>-->
<!--                  <td class="col-md-2 col-sm-2 col-xs-2">파운디</td>-->
<!--                  <td class="col-md-2 col-sm-2 col-xs-2">YOGA 매트</td>-->
<!--                  <td class="col-md-2 col-sm-2 col-xs-2">정수</td>-->
<!--                  <td class="col-md-4 col-sm-4 col-xs-4">매트 사이즈가 어떻게 되나요?</td>-->
<!--                  <td class="col-md-1 col-sm-1 col-xs-1">Y</td>-->
<!--                </tr>-->
<!--                <tr style="font-size: 12px">-->
<!--                  <td class="col-md-1 col-sm-1 col-xs-1">1</td>-->
<!--                  <td class="col-md-2 col-sm-2 col-xs-2">파운디</td>-->
<!--                  <td class="col-md-2 col-sm-2 col-xs-2">YOGA 매트</td>-->
<!--                  <td class="col-md-2 col-sm-2 col-xs-2">정수</td>-->
<!--                  <td class="col-md-4 col-sm-4 col-xs-4">매트 사이즈가 어떻게 되나요?</td>-->
<!--                  <td class="col-md-1 col-sm-1 col-xs-1">Y</td>-->
<!--                </tr>-->
<!--                </tbody>-->
<!--              </table>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--      <div class="col-md-4 col-sm-4 col-xs-4">-->
<!--        <div class="panel panel-bordered panel-dark">-->
<!--          <div class="panel-heading">-->
<!--            <h3 class="panel-title">정산</h3>-->
<!--          </div>-->
<!--          <div class="panel-body">-->
<!--            <div class="text-center">-->
<!--              <table class="col-md-12 col-sm-12 col-xs-12">-->
<!--                <thead>-->
<!--                <tr>-->
<!--                  <th class="col-md-12 col-sm-12 col-xs-12">6월 정산 확정금액</th>-->
<!--                </tr>-->
<!--                </thead>-->
<!--                <tbody>-->
<!--                <tr>-->
<!--                  <td class="col-md-12 col-sm-12 col-xs-12">000,000원</td>-->
<!--                </tr>-->
<!--                </tbody>-->
<!--              </table>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--    <div class="row">-->
<!--      <div class="col-md-8 col-sm-8 col-xs-8">-->
<!--        <div class="panel panel-bordered panel-dark">-->
<!--          <div class="panel-heading">-->
<!--            <h3 class="panel-title">CS 문의/요청</h3>-->
<!--          </div>-->
<!--          <div class="panel-body">-->
<!--            <div class="text-center">-->
<!--              <table class="col-md-12 col-sm-12 col-xs-12" border="1" bordercolor="grey">-->
<!--                <thead>-->
<!--                <tr style="font-size: 12px">-->
<!--                  <th class="col-md-1">번호</th>-->
<!--                  <th class="col-md-2">브랜드</th>-->
<!--                  <th class="col-md-2">상품명</th>-->
<!--                  <th class="col-md-2">고객명</th>-->
<!--                  <th class="col-md-4">문의내용</th>-->
<!--                  <th class="col-md-1">답변</th>-->
<!--                </tr>-->
<!--                </thead>-->
<!--                <tbody>-->
<!--                <tr style="font-size: 12px">-->
<!--                  <td class="col-md-1">1</td>-->
<!--                  <td class="col-md-2">파운디</td>-->
<!--                  <td class="col-md-2">YOGA 매트</td>-->
<!--                  <td class="col-md-2">정수</td>-->
<!--                  <td class="col-md-4">매트 사이즈가 어떻게 되나요?</td>-->
<!--                  <td class="col-md-1">Y</td>-->
<!--                </tr>-->
<!--                <tr style="font-size: 12px">-->
<!--                  <td class="col-md-1">1</td>-->
<!--                  <td class="col-md-2">파운디</td>-->
<!--                  <td class="col-md-2">YOGA 매트</td>-->
<!--                  <td class="col-md-2">정수</td>-->
<!--                  <td class="col-md-4">매트 사이즈가 어떻게 되나요?</td>-->
<!--                  <td class="col-md-1">Y</td>-->
<!--                </tr>-->
<!--                <tr style="font-size: 12px">-->
<!--                  <td class="col-md-1">1</td>-->
<!--                  <td class="col-md-2">파운디</td>-->
<!--                  <td class="col-md-2">YOGA 매트</td>-->
<!--                  <td class="col-md-2">정수</td>-->
<!--                  <td class="col-md-4">매트 사이즈가 어떻게 되나요?</td>-->
<!--                  <td class="col-md-1">Y</td>-->
<!--                </tr>-->
<!--                </tbody>-->
<!--              </table>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--      <div class="col-md-4">-->
<!--        <div class="panel panel-bordered panel-dark">-->
<!--          <div class="panel-heading">-->
<!--            <h3 class="panel-title">공지사항</h3>-->
<!--          </div>-->
<!--          <div class="panel-body">-->
<!--            <div class="text-center">-->
<!--              <h1>-->
<!--                공지사항게시판-->
<!--              </h1>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
  </div>
</div>


