<script>
  var base_url = "<?php echo base_url(); ?>";
  var product_added = "<?php echo ('product_added_to_cart'); ?>";
  var added_to_cart = "<?php echo ('added_to_cart'); ?>";
  var quantity_exceeds = "<?php echo ('product_quantity_exceed_availability!'); ?>";
  var product_already = "<?php echo ('product_already_added_to_cart!'); ?>";
  var wishlist_add = "<?php echo ('product_added_to_wishlist'); ?>";
  var wishlist_add1 = "<?php echo ('wished'); ?>";
  var wishlist_adding = "<?php echo ('wishing..'); ?>";
  var wishlist_remove = "<?php echo ('product_removed_from_wishlist'); ?>";
  var compare_add = "<?php echo ('product_added_to_compared'); ?>";
  var compare_add1 = "<?php echo ('compared'); ?>";
  var compare_adding = "<?php echo ('working..'); ?>";
  var compare_remove = "<?php echo ('product_removed_from_compare'); ?>";
  var compare_cat_full = "<?php echo ('compare_category_full'); ?>";
  var compare_already = "<?php echo ('product_already_added_to_compare'); ?>";
  var rated_success = "<?php echo ('product_rated_successfully'); ?>";
  var rated_fail = "<?php echo ('product_rating_failed'); ?>";
  var rated_already = "<?php echo ('you_already_rated_this_product'); ?>";
  var working = "<?php echo ('working..'); ?>";
  var subscribe_already = "<?php echo ('you_already_subscribed'); ?>";
  var subscribe_success = "<?php echo ('you_subscribed_successfully'); ?>";
  var subscribe_sess = "<?php echo ('you_already_subscribed_thrice_from_this_browser'); ?>";
  var logging = "<?php echo ('logging_in..'); ?>";
  var login_success = "<?php echo ('you_logged_in_successfully'); ?>";
  var login_fail = "<?php echo ('login_failed!_try_again!'); ?>";
  var logup_success = "<?php echo ('you_have_registered_successfully'); ?>";
  var logup_fail = "<?php echo ('registration_failed!_try_again!'); ?>";
  var submitting = "<?php echo ('submitting..'); ?>";
  var email_sent = "<?php echo ('email_sent_successfully'); ?>";
  var email_noex = "<?php echo ('email_does_not_exist!'); ?>";
  var email_fail = "<?php echo ('email_sending_failed!'); ?>";
  var cart_adding = "<?php echo ('adding_to_cart..'); ?>";
  var cart_product_removed = "<?php echo ('product_removed_from_cart'); ?>";
  var required = "<?php echo ('the_field_is_required'); ?>";
  var mbn = "<?php echo ('must_be_a_number'); ?>";
  var mbe = "<?php echo ('must_be_a_valid_email_address'); ?>";
  var valid_email = "<?php echo ('enter_a_valid_email_address'); ?>";
  var applying = "<?php echo ('applying..'); ?>";
  var coupon_not_valid = "<?php echo ('coupon_not_valid'); ?>";
  var coupon_discount_successful = "<?php echo ('coupon_discount_successful'); ?>";
  var currency = "";
  var exchange = Number("1");

  var $j = jQuery.noConflict();
  var $ = jQuery.noConflict();

</script>

<style>
  .header {
    border-bottom: none;
  }
  .header .navigation-wrapper {
    border-top: 1px solid #e4e4e4;
    border-bottom: 1px solid #e4e4e4;
  }
  .sf-menu li.active-under {
    font-weight: bold;
    border-bottom: solid 2px #353535 !important;
  }
  .sf-menu li.active-under a {
    color: #353535 !important;
  }
  .navigation .nav.sf-menu {
    line-height: 7px;
  }
  .navigation .nav.sf-menu a {
    color: #BDBDBD;
  }
  .box{
    overflow: hidden;
    position:relative;
  }
  .box .box-img img{
    width:100%;
    height: auto;
  }
  .box .box-img:before{
    content: "";
    position: absolute;
    top: 5%;
    left: 4%;
    width: 92%;
    height: 90%;
    opacity: 0;
    z-index:1;
    transform: scale(0,1);
    border-top: 1px solid #fff;
    border-bottom: 1px solid #fff;
    transition:all 0.90s ease 0s;
  }
  .box .box-img:after{
    content: "";
    position: absolute;
    width: 92%;
    height: 90%;
    top: 5%;
    left: 4%;
    opacity: 0;
    transform: scale(1,0);
    border-left: 1px solid #fff;
    border-right: 1px solid #fff;
    transition:all 0.90s ease 0s;
  }
  .box:hover .box-img:before,
  .box:hover .box-img:after{
    opacity:1;
    transform: scale(1);
  }
  .box .box-img .over-layer{
    position: absolute;
    display:block;
    width:100%;
    height:100%;
    opacity:0;
    transition:all 0.90s ease 0s;
  }
  .box:hover .over-layer{
    opacity:1;
  }
  .box .over-layer ul{
    list-style: none;
    position: relative;
    top: 30%;
    padding: 0;
    text-align: center;
    z-index: 1;
    transition:all 0.6s ease 0s;
  }
  .box:hover .over-layer ul{
    top: 30%;
  }
  .box .over-layer ul li{
    padding:5px;
  }

  @media only screen and (max-width: 990px) {
    .box{
      margin-bottom:20px;
    }
  }
  .wp-block.product .price {
    padding:4px 0;
    font-size: 16px !important;
    font-weight: 300 !important;
    color: #272526 !important;
  }
  h1, h2, h3, h4, h5, h6 {
    font-weight: 400 !important;
  }
  .alert{
    z-index:999999999 !important;
  }
  .bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn) {
    width: 100%;
  }
</style>

<script type="text/javascript">

  function copyText(text_id,elem,event,copied_text){
    /* Get the text field */
    var copyText = document.getElementById(text_id);

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /*For mobile devices*/

    /* Copy the text inside the text field */
    document.execCommand("copy");

    elem.innerHTML = copied_text
  }

  function reload_page(){
    var loc = location.href;
    location.replace(loc);
  }


  function notify(message,type,from,align){
    $.notify({
      // options
      message: message
    },{
      // settings
      type: type,
      placement: {
        from: from,
        align: align
      }
    });

  }

  function form_submit(form_id){
    var form = $('#'+form_id);
    var button = form.find('.submit_button');
    var prv = button.html();
    var ing = button.data('ing');
    var success = button.data('success');
    var unsuccessful = button.data('unsuccessful');
    var redirect_click = button.data('redirectclick');
    form.find('.summernotes').each(function() {
      var now = $(this);
      now.closest('div').find('.val').val(now.code());
    });

    //var form = $(this);
    var formdata = false;
    if (window.FormData){
      formdata = new FormData(form[0]);
    }


    $.ajax({
      url: form.attr('action'), // form action url
      type: 'POST', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formdata ? formdata : form.serialize(), // serialize form data
      cache       : false,
      contentType : false,
      processData : false,
      beforeSend: function() {
        button.html(ing); // change submit button text
      },
      success: function(data) {
        var alls = data.split('#-#-#');
        var part1 = alls[0];
        var part2 = alls[1];
        if(part1 == 'success'){
          notify(success,'success','bottom','right');
          if(part2 == ''){
            $(redirect_click).click();
          } else {
            location.replace(part2);
          }
          form.find('input').val('');
          form.find('textarea').val('');
          form.find('textarea').html('');
        } else {
          var text = '<div>'+unsuccessful+'</div>'+part2;
          notify(text,'warning','bottom','right');
        }
        button.html(prv);

      },
      error: function(e) {
        console.log(e)
      }
    });

  }

</script>

<style>

  .loading_parent{
    height:500px;
    width:100%;
    position:absolute;
  }
  #loading-center-relative {
    position: relative;
    left: 50%;
    top: 50%;
    height: 150px;
    width: 150px;
    margin-top: -75px;
    margin-left: -75px;
  }
  .object_on{
    width: 20px;
    height: 20px;
    float: left;
    margin-right: 20px;
    margin-top: 65px;
    -moz-border-radius: 50% 50% 50% 50%;
    -webkit-border-radius: 50% 50% 50% 50%;
    border-radius: 50% 50% 50% 50%;
    zoom: .5;
  }

  #object_one_on {
    -webkit-animation: object_one 1.5s infinite;
    animation: object_one 1.5s infinite;
  }
  #object_two_on {
    -webkit-animation: object_two 1.5s infinite;
    animation: object_two 1.5s infinite;
    -webkit-animation-delay: 0.25s;
    animation-delay: 0.25s;
  }
  #object_three_on {
    -webkit-animation: object_three 1.5s infinite;
    animation: object_three 1.5s infinite;
    -webkit-animation-delay: 0.5s;
    animation-delay: 0.5s;
  }

  @-webkit-keyframes object_one_on {
    75% { -webkit-transform: scale(0); }
  }

  @keyframes object_one_on {
    75% {
      transform: scale(0);
      -webkit-transform: scale(0);
    }
  }
  @-webkit-keyframes object_two_on {
    75% { -webkit-transform: scale(0); }
  }

  @keyframes object_two_on {
    75% {
      transform: scale(0);
      -webkit-transform:  scale(0);
    }
  }
  @-webkit-keyframes object_three_on {
    75% { -webkit-transform: scale(0); }
  }
  @keyframes object_three_on {
    75% {
      transform: scale(0);
      -webkit-transform: scale(0);
    }
  }

  #loading-center1{
    width: 100%;
    height: 100%;
    position: relative;
  }
  #loading-center-absolute1 {
    position: absolute;
    left: 50%;
    top: 50%;
    height: 150px;
    width: 150px;
    margin-top: -75px;
    margin-left: -75px;
  }
  .object1{
    width: 20px;
    height: 20px;
    float: left;
    margin-right: 20px;
    margin-top: 65px;
    -moz-border-radius: 50% 50% 50% 50%;
    -webkit-border-radius: 50% 50% 50% 50%;
    border-radius: 50% 50% 50% 50%;
  }

  #object_one1 {
    -webkit-animation: object_one1 1.5s infinite;
    animation: object_one1 1.5s infinite;
  }
  #object_two1 {
    -webkit-animation: object_two1 1.5s infinite;
    animation: object_two1 1.5s infinite;
    -webkit-animation-delay: 0.25s;
    animation-delay: 0.25s;
  }
  #object_three1 {
    -webkit-animation: object_three1 1.5s infinite;
    animation: object_three1 1.5s infinite;
    -webkit-animation-delay: 0.5s;
    animation-delay: 0.5s;

  }


  @-webkit-keyframes object_one1 {
    75% { -webkit-transform: scale(0); }
  }

  @keyframes object_one1 {

    75% {
      transform: scale(0);
      -webkit-transform: scale(0);
    }

  }

  @-webkit-keyframes object_two1 {


    75% { -webkit-transform: scale(0); }


  }

  @keyframes object_two1 {
    75% {
      transform: scale(0);
      -webkit-transform:  scale(0);
    }

  }

  @-webkit-keyframes object_three1 {

    75% { -webkit-transform: scale(0); }

  }

  @keyframes object_three1 {

    75% {
      transform: scale(0);
      -webkit-transform: scale(0);
    }

  }

</style>
<div id="loading1" style="display:none;">
  <div id="loading-center1">
    <div id="loading-center-absolute1">
      <div class="object1 base" id="object_one1"></div>
      <div class="object1 base" id="object_two1"></div>
      <div class="object1 base" id="object_three1"></div>
    </div>
  </div>
</div>
<input type="hidden" id="page_num" value="0" />
<script>
  function getLocation() {
    if (navigator.geolocation) { // GPS를 지원하면
      navigator.geolocation.getCurrentPosition(function(position) {
        alert(position.coords.latitude + ' ' + position.coords.longitude);
      }, function(error) {
        console.error(error);
      }, {
        enableHighAccuracy: false,
        maximumAge: 0,
        timeout: Infinity
      });
    } else {
      alert('GPS를 지원하지 않습니다');
    }
  }

  function get_sns_img(funcType, action)
  {
    if (funcType === 'like') {
      if (action === 'do') {
        return '<?php echo $this->crud_model->get_like_icon(true); ?>';
      } else {
        return '<?php echo $this->crud_model->get_like_icon(false); ?>';
      }
    } else if (funcType === 'bookmark') {
      if (action === 'do') {
        return '<?php echo $this->crud_model->get_bookmark_icon(true); ?>';
      } else {
        return '<?php echo $this->crud_model->get_bookmark_icon(false); ?>';
      }
    } else {
      console.log(funcType);
    }
  }

  function sns_function(funcType, findType, id, elem) {
    // console.log(elem.attr('data-action'));
    var action = elem.attr('data-action');

    $.ajax({
      url: '<?php echo base_url(); ?>home/sns/'+findType+'/'+funcType+'/'+action+'?id='+id,
      //type : 'post',
      // contentType: "application/json; charset=utf-8",//보낼 데이터 방식
      //CI에서 POST방식으로 할 경우에는 이것을 체크하면 안된다.
      //왜냐하면, json 방식은 body 안으로 전송되므로 body 를 통해 읽어들여야 한다. 그러므로
      //이방식으로 체크 되면 URLencoded format이 아닌 post로 받아올 수 없다
      //contentType: 'application/json',
      dataType : 'json', // 받을 데이터 방식
      success : function(res) {
        // console.log(res.status);
        if (res.status === 'success') {
          // console.log($('.' + funcType + '-img-'+id).attr('src'));
          $('.' + findType + '-' + funcType + '-' + id).attr('src', get_sns_img(funcType, action));
          if (action === 'do') {
            $('.' + findType + '-' + funcType + '-' + id).closest('a').attr('data-action', 'undo');
            // elem.attr('data-action', 'undo');
          } else {
            $('.' + findType + '-' + funcType + '-' + id).closest('a').attr('data-action', 'do');
            // elem.attr('data-action', 'do');
          }
        } else if (res.status == 'not_login') {
          alert(res.message);
          window.location.href = res.redirect_url;
        } else {
          console.log(res.message);
        }
      },
      error: function(xhr, status, error){
        console.log(error);
      }
    });
  }
  function get_price_str(p) {
    return p.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }
  function get_price_int(p) {
    return parseInt(p.replace(/,/g,""));
  }

  function cart_on(on) {
    if (on === true) {
      $('#cart-on').find('img:last').show();
    } else {
      $('#cart-on').find('img:last').hide();
    }
  }

  function trim(obj) {
    return obj.replace(/^\s+|\s+$/g,"");
  }
  function ltrim(obj) {
    return obj.replace(/^\s+/,"");
  }
  function rtrim(obj) {
    return obj.replace(/\s+$/,"");
  }

  function active_menu_bar(activeClass) {
    $('.sf-menu li').removeClass("active-under");
    if (activeClass !== '') {
      $('.sf-menu li.' + activeClass).addClass("active-under");
    }
  }

  //google.maps.event.addDomListener(window, 'load', initialize);
  /**/

  // function tooltip_set(){
  //   $('[data-toggle="tooltip"]').tooltip();
  // }

  function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
  }
  
  function isAndroidWebview() {
    let device = _getCookie('DEVICE');
    // console.log(device);
    return device === 'ANDROID';
  }

  function isIOSWebview() {
    let device = _getCookie('DEVICE');
    // console.log(device);
    return device === 'IOS';
  }
 
  function isApp() {
    if (isAndroidWebview()) {
      return true;
    } else if (isIOSWebview()) {
      return true;
    }
    return false;
  }
  
  function isMobile() {
    return <?php echo ($this->agent->is_mobile() ? 'true' : 'false'); ?>;
  }

  function _setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }
  
  function _getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }

  $(document).ready(function() {
    $('body').on('click','.signup_btn',function(event, action = ''){
      event.preventDefault();
      var now = $(this);
      var btntxt = now.html();
      var form = now.closest('form');
      var ing = now.data('ing');
      var success = now.data('success');
      var unsuccessful = now.data('unsuccessful');
      var rld = now.data('reload');
      var rlt = now.data('relocation');
      var callback = now.data('callback');
      var formdata = false;
      if (window.FormData){
        formdata = new FormData(form[0]);
      }
    
      $('#loading_set').show();
    
      $.ajax({
        url: form.attr('action'), // form action url
        type: 'POST', // form submit method get/post
        dataType: 'html', // request type html/json/xml
        data: formdata ? formdata : form.serialize(), // serialize form data
        cache       : false,
        contentType : false,
        processData : false,
        beforeSend: function() {
          // now.attr('disabled','disabled');
          $(".btn_dis").attr('disabled','disabled');
          now.html(ing);
        },
        success: function(data) {
          $('#loading_set').fadeOut(500);
          if(data == 'done' || data.search('done') !== -1){
            notify(success,'success','bottom','right');
          
            if (rlt !== -1) {
              setTimeout(function(){location.href=rlt;}, 1000);
            }
          
            if(rld == 'ok'){
              setTimeout(function(){location.reload();}, 1000);
            }
            if(callback == 'order_tracing'){
              // now.removeAttr('disabled');
              data = data.replace('done','');
              $('#trace_details').html(data);
            }
            $(".closeModal").click();
          } else {
            $(".btn_dis").removeAttr('disabled');
            var text = '<div>'+unsuccessful+'</div>'+data;
            notify(text,'warning','bottom','right');
          }
          now.html(btntxt);
        },
        error: function(e) {
          console.log(e)
        }
      });
    });
  
    // alert(isApp());
    // alert(isMobile());
    
    <?php if ($this->session->userdata('need_kakao_access_token') == 'yes') { ?>
    $.getScript("https://developers.kakao.com/sdk/js/kakao.min.js", function() {
      Kakao.init('8ee901a556539927d58b30a6bf21a781');
      Kakao.Auth.setAccessToken('<?php echo json_decode($this->session->userdata('kakao_auth'))->access_token; ?>');
      // console.log(Kakao.Auth.getAccessToken());
    });
    <?php $this->session->unset_userdata('need_kakao_access_token');
    } ?>
    
  });

  function sleep (delay) {
    var start = new Date().getTime();
    while (new Date().getTime() < start + delay);
  }

  function do_logout() {
    $('#loading_set').show();
    $.ajax({
      url : '<?php echo base_url().'/home/logout'; ?>',
      dataType : 'json', // 받을 데이터 방식
      success : function(res) {
        $("#loading_set").fadeOut(500);
        if (res.status === 'success') {
          alert(res.message);
          // console.log(res.message);
          window.location.href = res.redirect_url;
        } else {
          alert(res.message);
          // console.log(res.message);
          window.location.href = res.redirect_url;
        }
      },
      error: function(xhr, status, error){
        alert(error);
        window.location.href = base_url + 'home/login';
      }
    });
  }

  let login_type = '<? echo $this->session->userdata('login_type'); ?>';
  function user_logout() {
    $('#loading_set').show();
    // console.log(login_type);
    if (login_type === 'kakao') {
      $.getScript("https://developers.kakao.com/sdk/js/kakao.min.js", function() {
        Kakao.init('8ee901a556539927d58b30a6bf21a781');
        // console.log(Kakao.Auth.getAccessToken());
        if (!Kakao.Auth.getAccessToken()) {
          $("#loading_set").fadeOut(500);
          // alert('Not logged in.');
          do_logout();
        } else {
          $("#loading_set").fadeOut(500);
          Kakao.Auth.logout(function() {
            // alert('logout: ' + Kakao.Auth.getAccessToken());
            do_logout();
          });
        }
      });
    } else {
      do_logout();
    }
  }

  function chatKakaoChannel() {
    Kakao.init('8ee901a556539927d58b30a6bf21a781');
    Kakao.Channel.chat({
      channelPublicId: '_xnzxbxaxb',
    });
  }

  function validateEmail(emailAddress) {
    let pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
  }
  
  function fnNicePopup(){
    nicePopup = window.open('', '_parent', 'width=500, height=550, top=100, left=100, fullscreen=no, menubar=no, status=no, toolbar=no, titlebar=yes, location=no, scrollbar=no');
    document.form_chk.action = "https://nice.checkplus.co.kr/CheckPlusSafeModel/checkplus.cb";
    // document.form_chk.target = "popupChk";
    document.form_chk.target = "_parent";
    document.form_chk.submit();
  }
</script>

<?php if ($this->app_model->is_app()) { ?>
  <script> // Web <=> App interface
    // 메뉴토글 ------------------------------------------------------------------------------------------------
    // 송신부 web -> app
    function categoryMenuToggle() {
      if (menu_on) {
        if (setting_on) {
          close_setting_menu();
          setTimeout(function() {close_menu()}, 300);
        } else {
          close_menu();
        }
      } else {
        open_menu();
      }
    }
    // 위치정보 ------------------------------------------------------------------------------------------------
    // 송신부 web → app
    function getCurrentLocation() {
      if (_getCookie('DEVICE') === 'IOS') {
        webkit.messageHandlers.HybridBridge.postMessage({'funcType': 'getCurrentLocation' });
      } else if (_getCookie('DEVICE') === 'ANDROID') {
        window.HybridBridge.getCurrentLocation();
      }
    }
    // 수신부 app → web
    // receiveLocation 함수명 변경하면 안됩니다.
    function receiveLocation(lat, lng) {
      // 이 부분은 원하는대로 변경
      // $('#lat').val(lat);
      // $('#lng').val(lng);
      // alert('lat : ' + lat + ', lng : ' +lng);
    }
    // 버전정보 ------------------------------------------------------------------------------------------------
    // 송신부 web → app
    function getAppVersion() {
      if (_getCookie('DEVICE') === 'IOS') {
        webkit.messageHandlers.HybridBridge.postMessage({'funcType': 'getAppVersion' });
      } else if (_getCookie('DEVICE') === 'ANDROID') {
        window.HybridBridge.getAppVersion();
      }
    }
    // 수신부 app → web
    // receiveLocation 함수명 변경하면 안됩니다.
    function receiveAppVersion(version) {
      // 이 부분은 원하는대로 변경
      // console.log(version);
      $('#app_version').text(version);
    }
  
    // 푸시설정 ------------------------------------------------------------------------------------------------
    // 송신부 web → app
    // <div class="form-group">
    //   <h6>푸시알림 설정/변경</h6>
    // <button type="button" class="btn btn-primary btn-block" onclick="javascript:setPushSetting();">푸시 알림 설정 변경</button>
    // </div>
    function setPushSetting() {
      if (_getCookie('DEVICE') === 'IOS') {
        webkit.messageHandlers.HybridBridge.postMessage({'funcType': 'setPushSetting' });
      } else if (_getCookie('DEVICE') === 'ANDROID') {
        window.HybridBridge.setPushSetting();
      }
    }
    function getPushSetting() {
      return _getCookie('PUSH-YN');
    }
    // function togglePushSetting() {
    //   if (getPushSetting() === 'ON') {
    //     $('#push_setting').prop('checked', true);
    //     return true;
    //   }
    //   $('#push_setting').prop('checked', false);
    //   return false;
    // }
    function togglePushSetting(status) {
      if (status === 'ON') {
        $('#push_setting').prop('checked', true);
      } else {
        $('#push_setting').prop('checked', false);
      }
    }
    function setPush() {
        if (getPushSetting() === 'ON') {
          $('#push_setting').prop('checked', true);
        } else {
          $('#push_setting').prop('checked', false);
        }
        setPushSetting();
    }
    // GPS설정 ------------------------------------------------------------------------------------------------
    // 송신부 web → app
    // <div class="form-group">
    //   <h6>위치 정보 제공 on/off</h6>
    // <button type="button" class="btn btn-primary btn-block" onclick="javascript:setGPSSetting();">위치 정보 변경</button>
    // </div>
    function setGPSSetting() {
      if (_getCookie('DEVICE') === 'IOS') {
        webkit.messageHandlers.HybridBridge.postMessage({'funcType': 'setGPSSetting' });
      } else if (_getCookie('DEVICE') === 'ANDROID') {
        window.HybridBridge.setGPSSetting();
      }
    }
    function getGPSSetting() {
      return _getCookie('GPS-YN');
    }
    // function toggleGPSSetting() {
    //   if (getGPSSetting() === 'ON') {
    //     $('#gps_setting').prop('checked', true);
    //     return true;
    //   }
    //   $('#gps_setting').prop('checked', false);
    //   return false;
    // }
    function toggleGPSSetting(status) {
      if (status === 'ON') {
        $('#gps_setting').prop('checked', true);
      } else {
        $('#gps_setting').prop('checked', false);
      }
    }
    function setGPS() {
        if (getGPSSetting() === 'ON') {
          $('#gps_setting').prop('checked', true);
        } else {
          $('#gps_setting').prop('checked', false);
        }
        setGPSSetting();
    }
  
    // 하단메뉴 ------------------------------------------------------------------------------------------------
    // 송신부 web → app
    // <div class="form-group">
    //   <h6>하단 메뉴 감추기</h6>
    // <button type="button" class="btn btn-primary btn-block" onclick="toggleBottomBar('OFF');">하단 메뉴 감추기</button>
    // </div>
    function toggleBottomBar(show) { // ON / OFF
      if (_getCookie('DEVICE') === 'IOS') {
        webkit.messageHandlers.HybridBridge.postMessage({'funcType': 'toggleBottomBar', 'show': show });
      } else {
        window.HybridBridge.toggleBottomBar(show);
      }
    }
    
    // 쿠키정보 ------------------------------------------------------------------------------------------------
    function getCookieData() {
      alert('ci_session : ' + _getCookie('ci_session'));
      alert('MODE : ' + _getCookie('MODE'));
      alert('DEVICE : ' + _getCookie('DEVICE'));
      alert('FCM-TOKEN : ' + _getCookie('FCM-TOKEN'));
      alert('PUSH-YN: ' + _getCookie('PUSH-YN'));
      alert('GPS-YN: ' + _getCookie('GPS-YN'));
      alert('SET-PUSH-NOTICE: ' + _getCookie('SET-PUSH-NOTICE'));
      alert('SET-GPS-PERMISSION: ' + _getCookie('SET-GPS-PERMISSION'));
      alert('VERSION : ' + _getCookie('VERSION'));
      alert('BUILDNUMBER : ' + _getCookie('BUILDNUMBER'));
    }
  
    // 공유하기 ------------------------------------------------------------------------------------------------
    // 송신부 web → app
    // <a href="javascript:shareText('공유하고 싶은 문구와 URL');">
    //   이 페이지를 공유하기 <i class="fa fa-share fs-24 fw-400"> </i>
    //   </a>
    function shareText(text) {
      if (_getCookie('DEVICE') === 'IOS') {
        webkit.messageHandlers.HybridBridge.postMessage({'funcType': 'shareText', 'text': text });
      } else if (_getCookie('DEVICE') === 'ANDROID') {
        window.HybridBridge.shareText(text);
      }
    }
    // 송신부 web → app
    // <a href="javascript:shareURL('공유하고싶은URL만입력');">
    //   이 페이지를 공유하기 <i class="fa fa-share fs-24 fw-400"> </i>
    // </a>
    function shareURL(url) {
      if (_getCookie('DEVICE') === 'IOS') {
        webkit.messageHandlers.HybridBridge.postMessage({'funcType': 'shareURL', 'url': url});
      } else if (_getCookie('DEVICE') === 'ANDROID') {
        window.HybridBridge.shareURL(url);
      }
    }
  
    // case 1: url방식으로 공유하기
    // 현재 페이지의 오픈그래프 정보를 이용해서 url 공유하는 방식
    // url 방식일 경우 이 함수는 페이지에 없어도 됨
    // function getShareSetting() {
    //   if (_getCookie('DEVICE') === 'IOS') {
    //     return 'url';
    //   } else if (_getCookie('DEVICE') === 'ANDROID') {
    //     window.HybridBridge.shareSetting('url');
    //   }
    // }
  
    // case 2: 원하는 text를 앱에 전달하기
    // 현재 페이지의 오픈그래프 정보와 URL을 무시하고
    // 원하는 텍스트로 공유하고 싶은 페이지에서는 아래와 같이 공유를 원하는 문구를 작성해주세요.
    // function getShareSetting() {
    //   var shareText = '파운디가 소개하는 요가센터를 찾아보세요. https://www.foundy.me/home/find2';
    //   if (_getCookie('DEVICE') == 'IOS') {
    //     return shareText;
    //   } else if (_getCookie('DEVICE') == 'ANDROID') {
    //     window.HybridBridge.shareSetting(shareText);
    //   }
    // }
   
    var page_name = '<?php echo $page_name; ?>';
    window.onpageshow = function(event) {
      if (event.persisted || (window.performance && window.performance.navigation.type == 2)) {
        if (page_name === 'shop/cart' || page_name === 'shop/purchase' || page_name === 'shop/product') {
          toggleBottomBar('OFF');
        } else {
          toggleBottomBar('ON');
        }
      }
    }
  
    $(function() {
      getAppVersion();
      <?php if ($this->app_model->is_ios_app()) { ?>
      // getCredentialState('001068.4420f70249c345d484fc3281f19602de.1518');
      <?php } ?>
      // getCookieData();
      <?php if ($page_name == 'shop/cart' || $page_name == 'shop/purchase' || $page_name == 'shop/product') { ?>
      toggleBottomBar('OFF');
      <?php } else { ?>
      toggleBottomBar('ON');
      <?php } ?>
    });
  </script>
<?php } ?>
<!-- center -->
<script>
  function IsJsonString(str) {
    try {
      JSON.parse(str);
    } catch (e) {
      return false;
    }
    return true;
  }
  function open_reserve_popup(id) {
    $('#loading_set').show();
    let formData = new FormData();
    formData.append('id', id);
    $.ajax({
      url: "<?php echo base_url().'home/center/schedule/reserve/info'; ?>",
      type: 'POST', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function(data) {
        $("#loading_set").fadeOut(500);
        if(IsJsonString(data) === true) {
          open_alert_popup(JSON.parse(data).message);
        } else {
          $('#schedule_reserve_popup').html(data);
          $('#schedule_reserve_popup').show();
          $('body').css('overflow-y', 'hidden');
        }
      },
      error: function(e) {
        console.log(e);
        alert(e);
      }
    });
  }
  function close_reserve_popup() {
    $('#schedule_reserve_popup').hide();
    $('body').css('overflow-y', 'auto');
  }
  function reserve_schedule(id, mid) {
    $('#loading_set').show();
    let formData = new FormData();
    formData.append('id', id);
    formData.append('mid', mid);
    $.ajax({
      url: "<?php echo base_url().'home/center/schedule/reserve/do'; ?>",
      type: 'POST', // form submit method get/post
      dataType: 'json', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function(data) {
        $("#loading_set").delay(500).fadeOut(500);
        close_reserve_popup();
        if(data.status === 'done') {
          open_notify_popup(data.message);
        } else {
          open_alert_popup(data.message);
        }
      },
      error: function(e) {
        console.log(e)
      }
    });
  }
  function open_cancel_popup(id) {
    $('#loading_set').show();
    let formData = new FormData();
    formData.append('id', id);
    $.ajax({
      url: "<?php echo base_url().'home/center/schedule/cancel/info'; ?>",
      type: 'POST', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function(data) {
        console.log(data);
        $("#loading_set").fadeOut(500);
        if(IsJsonString(data) === true) {
          open_alert_popup(JSON.parse(data).message);
        } else {
          console.log($('#schedule_cancel_popup'));
          $('#schedule_cancel_popup').html(data);
          $('#schedule_cancel_popup').show();
          $('body').css('overflow-y', 'hidden');
        }
      },
      error: function(e) {
        console.log(e);
        alert(e);
      }
    });
  }
  function close_cancel_popup() {
    $('#schedule_cancel_popup').hide();
    $('body').css('overflow-y', 'auto');
  }
  function cancel_schedule(id) {
    $('#loading_set').show();
    let formData = new FormData();
    formData.append('id', id);
    $.ajax({
      url: "<?php echo base_url().'home/center/schedule/cancel/do'; ?>",
      type: 'POST', // form submit method get/post
      dataType: 'json', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function(data) {
        $("#loading_set").fadeOut(500);
        close_cancel_popup();
        if(data.status === 'done') {
          open_notify_popup(data.message);
        } else {
          open_alert_popup(data.message);
        }
      },
      error: function(e) {
        console.log(e)
      }
    });
  }
  function open_alert_popup(message) {
    $('#schedule_alert_popup .popup_guide').text(message);
    $('#schedule_alert_popup').show();
    $('body').css('overflow-y', 'hidden');
  }
  function close_alert_popup() {
    $('#schedule_alert_popup').hide();
    $('body').css('overflow-y', 'auto');
  }
  function open_notify_popup(message) {
    $('#schedule_notify_popup .popup_guide').text(message);
    $('#schedule_notify_popup').show();
    $('body').css('overflow-y', 'hidden');
  }
  function close_notify_popup() {
    $('#schedule_notify_popup').hide();
    $('body').css('overflow-y', 'auto');
    setTimeout(function() {window.location.reload(); }, 300);
  }
  function unreservable_schedule() {
    $('#schedule_alert_popup .popup_guide').text('현재 예약이 불가능합니다!');
    $('#schedule_alert_popup').show();
    $('body').css('overflow-y', 'hidden');
  }
</script>
