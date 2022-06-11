$(document).ready(function() {
  $(".popover-cls").popover({
          trigger: "manual",
          html: true,
          animation: false,
          content: function() {
              return '<div class="popover-loader">' +
                  '<p>loader</p>' +
                  '</div>' +
                  '<div class="media popover-media">' +
                  '<img class="img-fluid user-img" src="' + $(this).data('img') + '" />' +
                  '<div class="media-body">' +
                  '<h4>' +
                  $(this).data('name') +
                  '</h4>' +
                  '<h6><img src="../assets/svg/users.svg" class="img-fluid">30 mutual friend</h6>' +
                  '<h6><img src="../assets/svg/map-pin.svg" class="img-fluid">lives in london</h6>' +
                  '</div>' +
                  '</div>' +
                  '<div class="button-popover">' +
                  '<a href="#" class="btn btn-solid"><img src="../assets/svg/message-square.svg" class="img-fluid">message</a>' +
                  '<a href="#" class="btn btn-solid"><img src="../assets/svg/user-check.svg" class="img-fluid mr-0"></a>' +
                  '</div>';
          }
      })
      .on("mouseenter", function() {
          $('.popover-loader').addClass('show');
          setTimeout(function() {
              $('.popover-loader').removeClass('show');
          }, 1000);
          var _this = this;
          $(this).popover("show");
          $(".popover").on("mouseleave", function() {
              $(_this).popover('hide');
          });
      }).on("mouseleave", function() {
          var _this = this;
          setTimeout(function() {
              if (!$(".popover:hover").length) {
                  $(_this).popover("hide");
              }
          }, 10);
      });

});