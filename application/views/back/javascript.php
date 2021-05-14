<script>
  function IsJsonString(str) {
    try {
      JSON.parse(str);
    } catch (e) {
      return false;
    }
    return true;
  }

  function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
  }

  function isValidHttpUrl(string) {
    let url;
    try {
      url = new URL(string);
    } catch (_) {
      return false;
    }
  
    return url.protocol === "http:" || url.protocol === "https:";
  }
  
 function preview_img(input, target) {
    if (input.files && input.files[0]) {
      $("#" + target).html('');
      $(input.files).each(function () {
        var reader = new FileReader();
        reader.readAsDataURL(this);
        reader.onload = function (e) {
          $("#" + target).append("<img class='thumb_img' alt='' src='" + e.target.result + "'>");
        }
      });
      $('#' + target).show();
    }
  }

  function move(id, target, delay) {
    let offset = document.querySelector('#'+target).scrollHeight - document.querySelector('#'+id).scrollHeight;
    $('#' + target).animate({scrollTop : offset}, delay); // target : 움직일 요소, delay : 속도
  }

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
          // console.log(reload);
          // console.log(relocation);
          // console.log(callback);
          if (reload === true) {
            setTimeout(function(){location.reload()}, 1000);
          } else if (relocation !== '') {
            setTimeout(function(){location.href = relocation;}, 1000);
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
        // console.log(data);
        if (IsJsonString(data)) {
          data = JSON.parse(data);
          if (data.status === 'done') {
            if (callback !== null) {
              callback(data);
            } else {
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
            }
          } else {
            var title = '<strong>실패하였습니다</strong>';
            $.notify({
              title: title,
              message: '<br>' + data.message,
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
            // alert(data.message);
          }
        } else {
          // console.log(data);
          var title = '<strong>실패하였습니다</strong>';
          $.notify({
            title: title,
            message: '<br>' + data,
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

  function get_page(id, url, loading = true, callback = null) {
    if (loading) {
      $('#loading_set').show();
    }
    $('#' + id).load(url);
    if (loading) {
      $("#loading_set").delay(500).fadeOut(500);
    }
    if (callback !== null) {
      callback();
    }
  }
  function get_page2(id, url, loading = true, callback = null) {
    if (loading) {
      $('#loading_set').show();
    }
    $.get(url, function(data) {
      if (loading) {
        $("#loading_set").delay(500).fadeOut(500);
      }
      // console.log(data);
      if (IsJsonString(data)) {
        let title = '<strong>실패하였습니다</strong>';
        data = JSON.parse(data);
        $.notify({
          title: title,
          message: '<br>' + data.message,
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
        if (data.redirect !== '') {
          setTimeout(function() {window.location.href = data.redirect}, 1000);
        }
      } else {
        $('#' + id).html(data);
        if (callback !== null) {
          callback();
        }
      }
    });
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
</script>