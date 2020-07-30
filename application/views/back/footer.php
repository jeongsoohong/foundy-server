<footer id="footer">
  <div class="show-fixed pull-right">
    <ul class="footer-list list-inline">
      <li>
        <p class="text-sm"><?php echo ('SEO_proggres');?></p>
        <div class="progress progress-sm progress-light-base">
          <div style="width: 80%" class="progress-bar progress-bar-danger"></div>
        </div>
      </li>

      <li>
        <p class="text-sm"><?php echo ('online_tutorial');?></p>
        <div class="progress progress-sm progress-light-base">
          <div style="width: 80%" class="progress-bar progress-bar-primary"></div>
        </div>
      </li>
      <li>
        <button class="btn btn-sm btn-dark btn-active-success"><?php echo ('checkout');?></button>
      </li>
    </ul>
  </div>
  <?php if($this->session->userdata('title') == 'admin'){ ?>
    <div class="hide-fixed pull-right pad-rgt">
      Currently v1.0
    </div>
  <?php } ?>
  <p class="pad-lft">&#0169; 2020 <?php echo $system_title;?></p>
</footer>