<script>
  function trim(obj) {
    return obj.replace(/^\s+|\s+$/g,"");
  }
  function ltrim(obj) {
    return obj.replace(/^\s+/,"");
  }
  function rtrim(obj) {
    return obj.replace(/\s+$/,"");
  }
  $(function() {
    window.addEventListener("click", function(event) {
      let mypage_body = document.getElementById('mypage-body');
      let mypage_angle = document.getElementById('mypage-angle');
      // console.log(event.target);
      // console.log(mypage_body);
      // console.log(mypage_angle);
      if (event.target !== mypage_body && event.target !== mypage_angle) {
        $('#mypage').hide();
      }
    });
  });
</script>

