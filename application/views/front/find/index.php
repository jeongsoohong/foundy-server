<style>
  .thumbnail-banner {
    height: 45vw;
  }
  .thumbnail .media {
    border: none;
  }
  .media .media-link .img-bg {
    background-repeat: no-repeat;
    background-size: contain;
  }
  .find-left {
    padding-left: 15px;
    padding-right: 5px;
  }
  .find-right {
    padding-right: 15px;
    padding-left: 5px;
  }
  input#search-text {
    background-color: inherit;
  }
  .find-search {
    padding: 0 15px;
    height: 20px;
    margin: 20px 0;
  }
  .find-search table {
    line-height: 20px;
  }
  .find-search .search-text {
    width: 100%;
  }
  .find-search table tr td {
    font-family: Futura !important;
    font-style: normal;
    font-weight: 400;
    font-size: 12px;
  }
</style>
<section class="page-section" style="margin-top: 0px !important; margin-bottom: 0px !important; padding-top: 0px
    !important; padding-bottom: 0px !important;">
  <div class="container">
      <div class="col-md-12 find-search">
        <table class="col-md-12" style="width: 100%;">
          <tbody>
          <tr>
            <td style="width: 70px; text-align: right; padding-right: 10px">
              Find your
            </td>
            <td style="width: auto; border-bottom: 1px solid grey">
              <input type="text" name="search" id="search-text" value="" style="border: none; width: 100%">
            </td>
            <td style="padding-left: 10px">
              <a href="javascript:void(0);" onclick="find_search($('#search-text').val());">
                <img height="20px" width="20px" src="<?php echo base_url(); ?>uploads/icon_0504/icon07_find.png">
              </a>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-6 find-left">
        <div class="thumbnail my-2 no-scale no-border no-padding thumbnail-banner ">
          <div class="media">
            <a class="media-link" href="<?php echo base_url().'home/find/center/a/'.CENTER_TYPE_YOGA; ?>">
              <div class="col-md-6 img-bg image_delay" data-src="<?php echo base_url(); ?>uploads/icon_0604/yoga.png" style="background-image: url('<?php echo base_url(); ?>uploads/icon_0604/yoga.png');"></div>
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-6 find-right">
        <div class="thumbnail my-2 no-scale no-border no-padding thumbnail-banner">
          <div class="media">
            <a class="media-link" href="<?php echo base_url().'home/find/center/a/'.CENTER_TYPE_PILATES; ?>">
              <div class="col-md-6 img-bg image_delay" data-src="<?php echo base_url(); ?>uploads/icon_0604/pilates.png" style="background-image: url('<?php echo base_url(); ?>uploads/icon_0604/pilates.png');"></div>
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-6 find-left">
        <div class="thumbnail my-2 no-scale no-border no-padding thumbnail-banner">
          <div class="media">
            <a class="media-link" href="<?php echo base_url().'home/find/class/'; ?>">
              <div class="col-md-6 img-bg image_delay" data-src="<?php echo base_url(); ?>uploads/icon_0604/online.png" style="background-image: url('<?php echo base_url(); ?>uploads/icon_0604/online.png');"></div>
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-6 find-right">
        <div class="thumbnail my-2 no-scale no-border no-padding thumbnail-banner">
          <div class="media">
            <a class="media-link" href="javascript:void(0);" onclick="open_nearby_modal()">
              <div class="col-md-6 img-bg image_delay" data-src="<?php echo base_url(); ?>uploads/icon_0604/nearby.png" style="background-image: url('<?php echo base_url(); ?>uploads/icon_0604/nearby.png');"></div>
            </a>
          </div>
        </div>
      </div>
<!--      <div class="col-md-6 col-sm-6 col-xs-6 find-left">
        <div class="thumbnail my-2 no-scale no-border no-padding thumbnail-banner">
          <div class="media">
            <a class="media-link" href="javascript:void(0);">
              <div class="col-md-6 img-bg image_delay" data-src="<?php /*echo base_url(); */?>uploads/icon_0504/find_icon05.png" style="background-image: url('<?php /*echo base_url(); */?>uploads/icon_0504/find_icon05.png');">
              </div>
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-6 find-right">
        <div class="thumbnail my-2 no-scale no-border no-padding thumbnail-banner">
          <div class="media">
            <a class="media-link" href="javascript:void(0);">
              <div class="col-md-6 img-bg image_delay" data-src="<?php /*echo base_url(); */?>uploads/icon_0504/find_icon06.png" style="background-image: url('<?php /*echo base_url(); */?>uploads/icon_0504/find_icon06.png');">
              </div>
            </a>
          </div>
        </div>
      </div>
</div>-->
</section>
<div class="modal fade" id="nearbyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">내 주변 스튜디오 찾기</h4>
      </div>
      <div class="modal-body">
        <div style="text-align: center">
          Sorry! <br>
          본 서비스는 오픈인 8/24부터 가능합니다.
        </div>
      </div>
      <div class="modal-footer">
<!--        <button type="button" class="btn btn-danger btn-theme-sm" data-dismiss="modal"">취소</button>-->
        <button type="button" class="btn btn-danger btn-theme-sm" onclick="close_nearby_modal()" style="text-transform: none; font-weight: 400;"">확인</button>
      </div>
    </div>
  </div>
</div>
<script>
  function open_nearby_modal() {
    $('#nearbyModal').modal('show');
  }
  function close_nearby_modal() {
    $('#nearbyModal').modal('hide');
  }

  function find_search(q) {
    // console.log(q);
    location.href = '<?php echo base_url().'home/find/search?q='; ?>' + q;
  }

  $(document).ready(function() {
    var input = document.getElementById('search-text');

    input.addEventListener('keyup', function(e) {
      // console.log(e.key);
      if (e.key === 'Enter') {
        e.preventDefault();
        find_search(input.value);
      }
    })
  });
</script>
