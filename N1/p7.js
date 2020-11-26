
      let sidebarFixed = null, sidebar, windowWidth, prevWindowWidth;
      $(document).ready(function() {
        prevWindowWidth = windowWidth = $(window).width();
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
          let gita = ($("#gita_area"));
          if (document.documentElement.scrollTop < 70) {
            sidebarFixed[0].style.display = 'none';
            sidebar.css('visibility', 'visible')
          }
          else {
            if (gita.offset().top - 85 < document.documentElement.scrollTop + 750) {
              sidebarFixed.css('top', gita.offset().top - 85 - 750 -document.documentElement.scrollTop + "px");
            } else sidebarFixed.css('top', "70px");
            sidebarFixed[0].style.display = 'block';
            sidebar.css('visibility', 'hidden')
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
        $.post('/api/get_applicants_number.php', function(a,b) {
          if (b == 'success') {
            console.log(a, b)
            try {
              a = JSON.parse(a);
              console.log(a, b)
              if (a['result'] == 'success') {
                console.log("OK" + a.data)
                $(".applicant_number").html("" + a.data + "");
              }
            } catch(e) {}
          }
        });
        $(window).resize(function() {            
          windowWidth = $(window).width();            
          prevWindowWidth = windowWidth;
          setTimeout(function() {
            console.log(sidebar.offset().left + 'px')
            console.log(sidebar)
            sidebarFixed.css('left', sidebar.offset().left + 'px') 
          }, 1000);
        })
      })

      function submitForm() {
        $("div.u-form-send-message").hide();
        $(".u-form-field-error").removeClass('u-form-field-error');
        if ($("#namefield").val().trim().length == 0) {
          $("#namefield").addClass('u-form-field-error');
          $("#namefield_second").addClass('u-form-field-error');
        }
        if ($("#emailfield").val().trim().length == 0) {
          $("#emailfield").addClass('u-form-field-error');
          $("#emailfield_second").addClass('u-form-field-error');
        }
        if ($("#messagefield").val().trim().length == 0) {
          $("#messagefield").addClass('u-form-field-error');
          $("#messagefield_second").addClass('u-form-field-error');
        }
        let type = [];
        if ($("#s111111")[0].checked) type.push('设计');
        if ($("#s111112")[0].checked) type.push('运营');
        if ($("#s111113")[0].checked) type.push('投资');
        if ($("#s111114")[0].checked) type.push('融资');
        $.post('/N1/save_consult.php', { data: {
                    name: $("#namefield").val().trim(),
                    email: $("#emailfield").val().trim(),
                    message: $("#messagefield").val().trim(),
                    type
              }}, function(a,b) {
                if (a == 'success') {
                  $("div.u-form-send-success").show(0).delay(3000).hide(0);
                } else
                  $("div.u-form-send-error").show(0).delay(3000).hide(0);
              }).fail(function() {
                alert("失败！网络错误。");
              })
      }
    
      $("img.thumbnail-image").click(function() {
        $("img.thumbnail-image.selected").removeClass('selected');
        $(this).addClass('selected');
        $("#mainImage").attr('src', $(this).attr('src'));
      });

      function moveLeft(direction) {
        let pos = parseInt($("#scrollContent").css('margin-left')) || 0;
        pos += direction * 100;
        console.log(pos + parseInt($("#scrollContent").width()), parseInt($("#scrollParent").width()))
        if (pos + parseInt($("#scrollContent").width()) < parseInt($("#scrollParent").width()))
          $("#scrollContent").animate({'margin-left' : Math.min(0, parseInt($("#scrollParent").width()) - parseInt($("#scrollContent").width()))}, 100);
        else if (pos >= 0)
          $("#scrollContent").animate({'margin-left' : 0}, 1000);

        else
        $("#scrollContent").animate({'margin-left' : pos + 'px'}, 100);
      }

      function goToOtherPage(category) {
        if (category == 1) window.location.href='/zxsj/';
        if (category == 2) window.location.href='/jzsj/';
        if (category == 3) window.location.href='/znsj/';
        if (category == 4) window.location.href='/nmyy/';
      }
      function goToOtherPiece(category, id) {
        if (category == 1) window.location.href='/zxsj/' + id + ".html";
        if (category == 2) window.location.href='/jzsj/' + id + ".html";
        if (category == 3) window.location.href='/znsj/' + id + ".html";
        if (category == 4) window.location.href='/nmyy/' + id + ".html";
      }
      function escapeHtml(text) {
        return text
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
      }
      function occurrences(string, subString, allowOverlapping) {
        string += "";
        subString += "";
        if (subString.length <= 0) return (string.length + 1);

        var n = 0,
            pos = 0,
            step = allowOverlapping ? 1 : subString.length;

        while (true) {
            pos = string.indexOf(subString, pos);
            if (pos >= 0) {
                ++n;
                pos += step;
            } else break;
        }
        return n;
      }
      