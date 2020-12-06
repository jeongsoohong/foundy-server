<script>
  function send_post(dataArr, url, reload = true, relocation = '', callback = null) {
    let formData = new FormData();
    for (let key in dataArr) {
      formData.append(key, dataArr[key]);
    }
    
    $('#loading_set').show();
    
    $.ajax({
      url: url,
      type: 'POST', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        $("#loading_set").delay(500).fadeOut(500);
        // console.log(data);
        if (data === 'done' || data.search('done') !== -1) {
          $.notify({
            message: '성공하였습니다.',
            icon: 'fa fa-check'
          }, {
            type: 'success',
            timer: 1000,
            delay: 2000,
            animate: {
              enter: 'animated lightSpeedIn',
              exit: 'animated lightSpeedOut'
            }
          });
          if (reload === true) {
            setTimeout(function(){location.reload()}, 1000);
          } else if (relocation !== '') {
            setTimeout(function(){location.location = relocation;}, 1000);
          } else if (callback !== null) {
            setTimeout(function(){callback(data)}, 1000);
          }
        } else {
          var title = '<strong>실패하였습니다</strong>';
          $.notify({
            title: title,
            message: data,
            icon: 'fa fa-check'
          }, {
            type: 'warning',
            timer: 1000,
            delay: 5000,
            animate: {
              enter: 'animated lightSpeedIn',
              exit: 'animated lightSpeedOut'
            }
          });
        }
      },
      error: function (e) {
        console.log(e)
      }
    });
  }
  
  function send_post_data(dataArr, url, callback = null) {
    let formData = new FormData();
    for (let key in dataArr) {
      formData.append(key, dataArr[key]);
    }
  
    $('#loading_set').show();
  
    $.ajax({
      url: url,
      type: 'POST', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        $("#loading_set").delay(500).fadeOut(500);
        data = JSON.parse(data);
        // console.log(data);
        if (data.status === 'done') {
          callback(data);
        } else {
          alert(data.message);
        }
      },
      error: function (e) {
        console.log(e)
      }
    });
  }

  function get_page(id, url, loading = true) {
    if (loading) {
      $('#loading_set').show();
    }
    $('#' + id).load(url);
    if (loading) {
      $("#loading_set").delay(500).fadeOut(500);
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

</script>