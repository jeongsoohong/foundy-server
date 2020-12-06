<table class="table_weeks">
  <colgroup>
    <col width="14.28%">
    <col width="14.28%">
    <col width="14.28%">
    <col width="14.28%">
    <col width="14.28%">
    <col width="14.28%">
    <col width="14.28%">
  </colgroup>
  <thead>
  <tr class="clearfix">
    <th class="sun">일</th>
    <th>월</th>
    <th>화</th>
    <th>수</th>
    <th>목</th>
    <th>금</th>
    <th>토</th>
  </tr>
  </thead>
</table>
</table>
<table class="table_days">
  <colgroup>
    <col width="14.28%">
    <col width="14.28%">
    <col width="14.28%">
    <col width="14.28%">
    <col width="14.28%">
    <col width="14.28%">
    <col width="14.28%">
  </colgroup>
  <tbody>
  <!-- 총 주차를 반복합니다. -->
  <?php for ($day = 1, $i = 0; $i < $total_week; $i++) { ?>
    <tr>
      <!-- 1일부터 7일 (한 주) -->
      <?php for ($week = 0; $week < 7; $week++) { ?>
        <td>
          <div class="days-wrap clearfix">
            <p <?php if ($week == 0) echo "class='sun'"; ?>>
              <?php
              if ($i == 0 && $week < $start_week) {
                echo($last_month_total_day - ($start_week - $week));
              } else if ($day <= $total_day) {
                echo $day;
                $day += 1;
              } else {
                echo $day % $total_day;
                $day += 1;
              }
              ?>
            </p>
            <?php if ($week == 0) { ?>
              <p class="holiday"></p>
            <?php } ?>
          </div>
          <div class="case-time">
            <p class="time-class">11:00 ~ 12:00</p>
            <p class="time-class">11:00 ~ 12:00</p>
            <p class="time-class">11:00 ~ 12:00</p>
            <p class="time-class">11:00 ~ 12:00</p>
            <p class="time-class">11:00 ~ 12:00</p>
            <p class="time-class">11:00 ~ 12:00</p>
            <p class="time-class">11:00 ~ 12:00</p>
          </div>
        </td>
      <?php } ?>
    </tr>
  <?php } ?>
  </tbody>
</table>
<script>
  $(function() {
    // case-time 클릭 이벤트
    $('.case-time').click(function(){
      $('.schedule_detail').toggle();
    })
  });
</script>
<!--
<table class="table_days">
  <colgroup>
    <col width="14.28%">
    <col width="14.28%">
    <col width="14.28%">
    <col width="14.28%">
    <col width="14.28%">
    <col width="14.28%">
    <col width="14.28%">
  </colgroup>
  <tbody>
  <tr>
    <td>
      <div class="days-wrap clearfix">
        <p class="sun">30</p>
        <p class="holiday"></p>
      </div>
      <div class="case-time">
        <p class="time-class">11:00 ~ 12:00</p>
        <p class="time-class">11:00 ~ 12:00</p>
        <p class="time-class">11:00 ~ 12:00</p>
        <p class="time-class">11:00 ~ 12:00</p>
        <p class="time-class">11:00 ~ 12:00</p>
        <p class="time-class">11:00 ~ 12:00</p>
        <p class="time-class">11:00 ~ 12:00</p>
      </div>
    </td>
    <td>
      <div class="days-wrap clearfix">
        <p>31</p>
        <p></p>
      </div>
      <div class="case-time">
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
      </div>
    </td>
    <td>
      <div class="days-wrap clearfix">
        <p>1</p>
        <p></p>
      </div>
      <div class="case-time">
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
      </div>
    </td>
    <td>
      <div class="days-wrap clearfix">
        <p>2</p>
        <p></p>
      </div>
      <div class="case-time">
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
      </div>
    </td>
    <td>
      <div class="days-wrap clearfix">
        <p>3</p>
        <p></p>
      </div>
      <div class="case-time">
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
      </div>
    </td>
    <td>
      <div class="days-wrap clearfix">
        <p>4</p>
        <p></p>
      </div>
      <div class="case-time">
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
      </div>
    </td>
    <td class="days-wrap sat">
      <div class="clearfix">
        <p>5</p>
        <p></p>
      </div>
      <div class="case-time">
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
      </div>
    </td>
  </tr>
  <tr>
    <td>
      <div class="days-wrap clearfix">
        <p class="sun">6</p>
        <p></p>
      </div>
      <div class="case-time">
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
      </div>
    </td>
    <td>
      <div class="days-wrap clearfix">
        <p>7</p>
        <p></p>
      </div>
      <div class="case-time">
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
      </div>
    </td>
    <td>
      <div class="days-wrap clearfix">
        <p>8</p>
        <p></p>
      </div>
      <div class="case-time">
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
      </div>
    </td>
    <td>
      <div class="days-wrap clearfix">
        <p>9</p>
        <p></p>
      </div>
      <div class="case-time">
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
      </div>
    </td>
    <td>
      <div class="days-wrap clearfix">
        <p>10</p>
        <p></p>
      </div>
      <div class="case-time">
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
      </div>
    </td>
    <td>
      <div class="days-wrap clearfix">
        <p>11</p>
        <p></p>
      </div>
      <div class="case-time">
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
      </div>
    </td>
    <td class="sat">
      <div class="days-wrap clearfix">
        <p>12</p>
        <p></p>
      </div>
      <div class="case-time">
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
      </div>
    </td>
  </tr>
  <tr>
    <td>
      <div class="days-wrap clearfix">
        <p class="sun">13</p>
        <p></p>
      </div>
      <div class="case-time">
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
      </div>
    </td>
    <td>
      <div class="days-wrap clearfix">
        <p>14</p>
        <p></p>
      </div>
      <div class="case-time">
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
      </div>
    </td>
    <td>
      <div class="days-wrap clearfix">
        <p>15</p>
        <p></p>
      </div>
      <div class="case-time">
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
      </div>
    </td>
    <td>
      <div class="days-wrap clearfix">
        <p>16</p>
        <p></p>
      </div>
      <div class="case-time">
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
      </div>
    </td>
    <td>
      <div class="days-wrap clearfix">
        <p>17</p>
        <p></p>
      </div>
      <div class="case-time">
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
      </div>
    </td>
    <td>
      <div class="days-wrap clearfix">
        <p>18</p>
        <p></p>
      </div>
      <div class="case-time">
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
      </div>
    </td>
    <td class="sat">
      <div class="days-wrap clearfix">
        <p>19</p>
        <p></p>
      </div>
      <div class="case-time">
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
      </div>
    </td>
  </tr>
  <tr>
    <td>
      <div class="days-wrap clearfix">
        <p class="sun">20</p>
        <p></p>
      </div>
      <div class="case-time">
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
      </div>
    </td>
    <td>
      <div class="days-wrap clearfix">
        <p>21</p>
        <p></p>
      </div>
      <div class="case-time">
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
      </div>
    </td>
    <td>
      <div class="days-wrap clearfix">
        <p>22</p>
      </div>
      <div class="case-time">
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
      </div>
    </td>
    <td>
      <div class="days-wrap clearfix">
        <p>23</p>
        <p></p>
      </div>
      <div class="case-time">
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
      </div>
    </td>
    <td>
      <div class="days-wrap clearfix">
        <p>24</p>
        <p></p>
      </div>
      <div class="case-time">
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
      </div>
    </td>
    <td>
      <div class="days-wrap clearfix">
        <p>25</p>
        <p></p>
      </div>
      <div class="case-time">
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
      </div>
    </td>
    <td class="sat">
      <div class="days-wrap clearfix">
        <p>26</p>
        <p></p>
      </div>
      <div class="case-time">
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
      </div>
    </td>
  </tr>
  <tr>
    <td>
      <div class="days-wrap clearfix">
        <p class="sun">27</p>
        <p></p>
      </div>
      <div class="case-time">
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
      </div>
    </td>
    <td>
      <div class="days-wrap clearfix">
        <p>28</p>
        <p></p>
      </div>
      <div class="case-time">
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
      </div>
    </td>
    <td>
      <div class="days-wrap clearfix">
        <p>29</p>
        <p></p>
      </div>
      <div class="case-time">
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
      </div>
    </td>
    <td>
      <div class="days-wrap clearfix">
        <p class="sun">30</p>
        <p class="holiday">추석 연휴</p>
      </div>
      <div class="case-time">
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
      </div>
    </td>
    <td>
      <div class="days-wrap clearfix">
        <p class="sun">1</p>
        <p class="holiday">추석</p>
      </div>
      <div class="case-time">
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
      </div>
    </td>
    <td>
      <div class="days-wrap clearfix">
        <p class="sun">2</p>
        <p class="holiday">추석 연휴</p>
      </div>
      <div class="case-time">
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
      </div>
    </td>
    <td class="sat">
      <div class="days-wrap clearfix">
        <p class="sun">3</p>
        <p class="holiday">개천절</p>
      </div>
      <div class="case-time">
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
        <p class="time-class"></p>
      </div>
    </td>
  </tr>
  </tbody>
</table>
-->