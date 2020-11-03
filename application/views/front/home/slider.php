<?php if (count($sliders) > 0) { ?>
  <style>
    .carousel-caption {
      padding: 5px 0 !important;
    }
    .carousel-caption h3, h6 {
      margin: 0 !important;
    }
    .carousel-caption p {
      font-size: 13px;
      margin: 5px 0;
    }
    .carousel-caption .p-category {
      font-size: 10px;
      margin-top: 10px;
      margin-bottom: 0 !important;
    }
  </style>
  <div class="col-md-12" style="height: auto; padding: 0;">
    <div class="slider-nav">
      <?php
      $i = 0;
      foreach ($sliders as $slider) {
        $i++;
        ?>
        <div class="slider-nav-item">
          <?php if (empty($slider->link) == false && strlen($slider->link) > 0) { ?>
          <a href="<?php echo $slider->link; ?>">
            <?php } ?>
            <img class="slide-<?php echo $i; ?> slider-img" src="<?php echo $slider->slider_image_url; ?>" alt="">
            <?php if (empty($slider->link) == false && strlen($slider->link) > 0) { ?>
          </a>
        <?php } ?>
        </div>
      <?php } ?>
    </div>
    <div class="slider-for">
      <?php foreach ($sliders as $slider) {?>
        <div class="carousel-caption">
          <p class="p-category"><?php echo $slider->category; ?></p>
          <h3 style="font-family: 'Patua One' !important; margin-top: 10px"><?php echo $slider->title; ?></h3>
          <p><?php echo $slider->desc; ?></p>
        </div>
      <?php } ?>
    </div>
  </div>

  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
  <style>
    .slick-slider .slick-prev.slick-arrow {
      left: 10px;
      z-index: 10;
    }
    .slick-slider .slick-next.slick-arrow {
      right: 10px;
      z-index: 10;
    }
    .slick-list {
      padding: 0 !important;
    }
    .slick-dotted.slick-slider {
      margin-bottom: 0;
    }
    .slick-dots {
      top: 85%;
      overflow: hidden;
    }
    .slick-dots li {
      margin: 0 0;
    }
    .slick-dots li button:before {
      color: white;
      font-size: 12px;
    }
    .slick-dots li.slick-active button:before {
      color: white !important;
    }
    .carousel-caption {
      color: black;
      padding-top: 10px;
      padding-bottom: 10px;
      text-shadow: unset;
    }
    .slider-nav-item img {
      width: inherit;
    }
    .slider-nav-item a, .slider-nav-item a img {
      width: inherit;
    }
  </style>

<!--  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>-->
  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.slider-nav').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        centerMode: true,
        infinite: true,
        // swipe: true,
        // swipeToSlide: true,
        speed: 500,
        autoplaySpeed: 3000,
        waitForAnimate: false,
        focusOnSelect: true,
        autoplay: true,
        arrows: true,
        asNavFor: '.slider-for',
      });
      $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav',
      });
      active_menu_bar('home');
    });
  </script>
<?php }?>
