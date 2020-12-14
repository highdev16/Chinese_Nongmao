function make2(s) {
    return s < 10? "0" + s : s;
  }
  function GetDateStringOf(s) {
    return s.getFullYear() + "-" + make2(s.getMonth() + 1) + "-" + make2(s.getDate()) + " "
          + make2(s.getHours()) + ":" + make2(s.getMinutes()) + ":" + make2(s.getSeconds());
  }
  $("img.thumbnail-image").click(function() {
    $("img.thumbnail-image.selected").removeClass('selected');
    $(this).addClass('selected');
    $("#mainImage").attr('src', $(this).attr('src'));
  });

  let sidebarFixed = null, sidebar;
  $(document).ready(function() {
    var rtime;
    var timeout = false;
    var delta = 200;
    $(window).resize(function() {
        rtime = new Date();
        if (timeout === false) {
            timeout = true;
            setTimeout(resizeend, delta);
        }
    });

    function resizeend() {
        if (new Date() - rtime < delta) {
            setTimeout(resizeend, delta);
        } else {
            timeout = false;
            window.location.reload();
        }               
    }
    sidebar = $("#fixed_sidebar");
    let position = sidebar.offset();
    let width = Number(sidebar.width()) + 16;
    let height = sidebar.height();
    let s = sidebar.clone().insertAfter($("footer"));
    sidebarFixed = s;
    s.addClass('sidebar-fixed')
        .css('position', 'fixed')
        .css('left', position.left + "px")
        .css('top', "70px")
        .css('height', 750 + "px")
        .css('width', width + "px")
        .css('border', "8px solid #fff0")
        .css('padding', "5px 30px 30px 15px").hide();
    window.addEventListener('scroll', function(){
      let gita = ($("footer"));          
      if (document.documentElement.scrollTop < 70) {
        sidebarFixed[0].style.display = 'none';
        sidebar.show();
      }
      else {
        if (gita.offset().top - 75 < document.documentElement.scrollTop + 750) {
          sidebarFixed.css('top', gita.offset().top - 15 - 750 -document.documentElement.scrollTop + "px");
        } else sidebarFixed.css('top', "70px");
        sidebarFixed[0].style.display = 'block';
        sidebar.hide();
      }
    });

    s.find("input, textarea").each(function(ind, ele) {
      if (this.hasAttribute('id')) {
        $(this).attr('id', $(this).attr('id') + "_second");
        if (($(this).attr('type') || "").toLowerCase() == 'checkbox') {
          let self = this;

          $(this).change(function() {
            $("#" + self.id.substr(0, self.id.length - 7)).prop('checked', (this.checked));
          })
        } else {
          let self = this;
          $(this).change(function() {
            $("#" + self.id.substr(0, self.id.length - 7)).val((self.value));
          })
        }
      }
    })
    sidebar.find("input, textarea").each(function(ind, ele) {
      if (this.hasAttribute('id')) {
        if (($(this).attr('type') || "").toLowerCase() == 'checkbox') {
          let self = this;
          $(this).change(function() {
            $("#" + self.id + "_second").prop('checked', (this.checked));
          })
        } else {
          let self = this;
          $(this).change(function() {
            $("#" + self.id + "_second").val((self.value));
          })
        }
      }
    })
///------------------ content fill ------------------////
    let href = window.location.href.split('/');
    let r = href[href.length - 1].split('.');
    if (r[1].includes('php')) {        
        r = r[1].split('r=');
        r = r[1];
    }
    else r = r[0];
    
    $.post('/api/get_applicants_number.php', function(a,b) {
      if (b == 'success') {
        try {
          a = JSON.parse(a);
          if (a['result'] == 'success') {
            $(".applicant_number").html(a.data + "");
          }
        } catch(e) {}
      }
    });
    let categoryArr = ['', '农贸设计百科', '农贸新闻资讯', '光影新闻动态', '政府政策文件'];
    $.post('/api/getarticle.php', {r}, function(a,b) {
      if (b == 'success') {
        try {
          a = JSON.parse(a);
          if (a['result'] == 'success') {
            a = a.data;
            console.log(a);
            let myCategory = a['row']['category'];
            $("section.mainmenu6 div.u-layout-row > div:nth-child(" + myCategory + ") p").addClass('active-submenu');
            $("a.titlemainmenu.mainmenu6").addClass('active');
            $("#browsecount").html(a.row.browse + "");
            $("#categoryLabel").html(categoryArr[a.row['category']]).click(function() {
              window.location.href="/" + categoryLabelStrings[a.row.category] + "/"; //'/N1/p25.php?category=' + a.row.category;
            });
            $("#articleTitle").html(a.row.title);
            $("#titleLabel").html(a.row.title);
            $("#createdTimeLabel").html(GetDateStringOf(new Date(a.row.created_time * 1000)));
            $("#writerLabel").html(a.row.writer);
            
            let categoryLabelStrings = ['', 'sjbk', 'news', 'gyxw', 'gov'];
            $("#currentCategoryButton").click(function() {
                window.location.href="/" + categoryLabelStrings[a.row.category] + "/"; //'/N1/p25.php?category=' + a.row.category;
              });
            $("#currentCategoryLabel").html(categoryArr[a.row.category]);
            if (a.next) {
              $("#nextLinkLabel").html(a.next.title);
              $("#nextLinkButton").click(function() {
                window.location.href = "/" + categoryLabelStrings[a.next.category] + "/" + a.next.id + ".html";
              });
            } else {
              $("#nextLinkButton, #nextLinkLabel").css('opacity', 0);
            }

            if (a.prev) {
              $("#prevLinkLabel").html(a.prev.title);
              $("#prevLinkButton").click(function() {
                window.location.href="/" + categoryLabelStrings[a.prev.category] + "/" + a.prev.id + ".html";
              });
            } else {
              $("#prevLinkButton, #prevLinkLabel").css('opacity', 0);
            }
            $("div.main_content_area").html(a.row.content);
            $("div.main_content_area a").each(function() {
              let href = $(this).attr('href');
              if (!href.trim().startsWith("http://")) {
                href = "http://" + href.trim();
                $(this).attr('href', href).css('cursor', 'pointer');
              }
            })
          }
        } catch(e) {}
      }
    })
  })

      function submitForm() {
        $("div.u-form-send-message").hide();
        $(".u-form-field-error").removeClass('u-form-field-error');
        if ($("#namefield").val().trim().length == 0) {
          $("#namefield").addClass('u-form-field-error');
          $("#namefield_second").addClass('u-form-field-error');
          return;
        }
        if ($("#emailfield").val().trim().length == 0) {
          $("#emailfield").addClass('u-form-field-error');
          $("#emailfield_second").addClass('u-form-field-error');
          return;
        }
        if ($("#messagefield").val().trim().length == 0) {
          $("#messagefield").addClass('u-form-field-error');
          $("#messagefield_second").addClass('u-form-field-error');
          return;
        }

        $("#captcha").css('visibility', 'visible');
        getotherpicture();
      }
      function submitForm1(veccode) {
        document.getElementById("captcha_value").value = "";
        $("#captcha").css('visibility', 'visible');
        let type = 1;
        $.post('/N1/save_consult.php', { c: veccode, data: {          
                    name: $("#namefield").val().trim(),
                    email: $("#emailfield").val().trim(),
                    message: $("#messagefield").val().trim(),
                    type: type
              }}, function(a,b) {
                if (a == 'success') {
                  $("#captcha").css('visibility', 'hidden');
                  $("div.u-form-send-success").show(0).delay(3000).hide(0);
                  return;
                } else if (a == 'caperror') {
                  getotherpicture(); return;
                }
                $("#captcha").css('visibility', 'hidden');
                  $("div.u-form-send-error").show(0).delay(3000).hide(0);
              }).fail(function() {
                alert("失败！网络错误。");
              })
      }