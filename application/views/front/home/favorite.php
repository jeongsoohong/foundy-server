<style>
  .main-fav-content {
    margin: 0 0 10px 0;
    padding-left: 15px;
    padding-right: 15px;
  }
  .main-fav-content .view,.schedule {
    margin-top: 6px;
    margin-bottom: 6px;
    padding-left: 5px;
    padding-right: 5px;
    height: 26px;
    line-height: 26px !important;
    border: 1px solid grey;
  }
  .main-nav div:hover {
    background-color: #6E6360;
  }
  .main-fav {
    <? if (count($upcoming_class) > 0 || count($upcoming_class2) > 0) { ?>
    padding: 12px 0;
    <? } else { ?>
    padding: 0 0 8px;
    <? } ?>
  }
  .main-discovery .main-header {
    margin: 10px 0 16px;
  }
  .main-discovery {
    margin-bottom: 40px !important;
  }
  .fav-wrap {
    overflow-x: scroll;
    white-space: nowrap;
    border-radius: 4px;
    /*box-shadow: 0 2px 4px rgb(0 0 0 / 8%);*/
  }
  .fav-wrap::-webkit-scrollbar {
    display: none;
  }
  .fav-table {
    width: 100%;
    display: inline-block;
    vertical-align: top;
  }
  .fav-table tr {
    background-color: white;
    /*box-shadow: 0 2px 4px rgba(0,0,0,0.08); */
  }
  .fav-table tr:first-child td:first-child {
    border-radius: 4px 0 0 0;
  }
  .fav-table tr:first-child td:last-child {
    border-radius: 0 4px 0 0;
  }
  .fav-table tr:last-child td:first-child {
    border-radius: 0 0 0 4px;
  }
  .fav-table tr:last-child td:last-child {
    border-radius: 0 0 4px 0;
  }
</style>
<div class="fav-wrap">
  <div class="fav-table">
    <?php if (empty($bookmark_centers) && empty($bookmark_teachers)) { ?>
      <table class="col-md-12" style="width: 100%">
        <tbody>
        <tr style="height: 60px" class="favorite_studio">
          <td style="padding: 0 20px 0 20px; width: 85%">
            당신의 건강한 라이프를 시작해보세요!<br>
            <a href="<?php echo base_url(); ?>home/find"><u>지금 찾으러 가기 ></u></a>
          </td>
          <td style="text-align: center">
            <img src="<?php echo base_url().'uploads/icon_0504/icon12_star.png'; ?>" alt='' style="width:20px !important; height: 20px !important;">
          </td>
        </tr>
        </tbody>
      </table>
    <?php
    } else {
    ?>
      <div class="fav-table-body" style="width: 100%;">
        <?
        foreach ($bookmark_centers as $center) {
          ?>
          <div style="width: 100%; display: inline-flex;">
            <div style="width: 70%; padding: 14px 16px; font-size: 11px; font-weight: normal; line-height: 1.75; color: #9e9e9e;">
              스튜디오
              <br><span style="display: block; font-size: 13px; font-weight: bold; color: #333;"><?php echo $center->title; ?></span>
            </div>
            <div style="width: 17%; padding: 14px 16px; text-align: center; position: relative;">
              <a href="<?php echo base_url().'home/center/profile/'.$center->center_id.'?nav=schedule'; ?>" style="display: block; padding-left: 8px; border-left: 1px dashed #e0e0e0; position: absolute; top: 0; bottom: 0; margin: auto; height: 32px;">
                <div style="width: 32px; height: 32px; line-height: 32px; text-align: center; position: relative;">
                  <img src="<?php echo base_url(); ?>template/icon/ic_calendar_revise.png" width="18" height="18" style="position: absolute; margin: auto; left: 0; right: 0; top: 0; bottom: 0;">
                </div>
              </a>
            </div>
            <div class="fav-star" style="padding: 19px 16px; text-align: center; position: relative;">
              <?php echo $this->crud_model->sns_func_html('bookmark', 'center', true, $center->center_id, 20, 20); ?>
            </div>
          </div>
        <?php }
        foreach ($bookmark_teachers as $teacher) {
          ?>
          <div style="width: 100%; display: inline-flex;">
            <div style="width: 70%; padding: 14px 16px; font-size: 11px; font-weight: normal; line-height: 1.75; color: #9e9e9e;">
              강사
              <br><span style="display: block; font-size: 13px; font-weight: bold; color: #333;"><?php echo $teacher->name; ?></span>
            </div>
            <div style="width: 17%; padding: 14px 16px; text-align: center; position: relative;">
              <a href="<?php echo base_url().'home/teacher/profile/'.$teacher->teacher_id.'?nav=schedule'; ?>" style="display: block; padding-left: 8px; border-left: 1px dashed #e0e0e0; position: absolute; top: 0; bottom: 0; margin: auto; height: 32px;">
                <div style="width: 32px; height: 32px; line-height: 32px; text-align: center; position: relative;">
                  <img src="<?php echo base_url(); ?>template/icon/ic_calendar_revise.png" width="18" height="18" style="position: absolute; margin: auto; left: 0; right: 0; top: 0; bottom: 0;">
                </div>
              </a>
            </div>
            <div class="fav-star" style="padding: 19px 16px; text-align: center; position: relative;">
              <?php echo $this->crud_model->sns_func_html('bookmark', 'teacher', true, $teacher->teacher_id, 20, 20); ?>
            </div>
          </div>
          <?php
        }
        ?>
      </div>
      <style>
        .fav-table-body .slick-list {
          background-color: #fff;
          box-shadow: 0 2px 4px rgb(0 0 0 / 8%);
        }
        .fav-table-body .slick-dots {
          top: 110%;
          overflow: hidden;
          position: static;
          opacity: 0.3;
          height: 32px;
          line-height: 32px;
        }
        .fav-table-body .slick-dots li {
          margin: 0 0;
        }
        .fav-table-body .slick-dots li button:before {
          color: black;
          font-size: 12px;
        }
        .fav-table-body .slick-dots li.slick-active button:before {
          color: black !important;
        }
        .fav-star a {
          display: block !important;
          height: 20px !important;
          position: absolute !important;
          top: 0 !important;
          bottom: 0 !important;
          left: 6px !important;
          margin: auto !important;
        }
      </style>
      <script>
        $(function() {
          $('.fav-table-body').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            centerMode: false,
            infinite: false,
            // swipe: true,
            // swipeToSlide: true,
            speed: 500,
            autoplaySpeed: 3000,
            waitForAnimate: false,
            focusOnSelect: false,
            autoplay: false,
            arrows: false,
          });
        });
      </script>
      <?
    }
    ?>
  </div>
</div>
