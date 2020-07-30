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
            <a class="media-link" href="javascript:void(0);">
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
<script>
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
