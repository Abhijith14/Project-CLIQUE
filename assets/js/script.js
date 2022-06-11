/*-----------------------------------------------------------------------------------

 Template Name:Friendbook
 Template URI: themes.pixelstrap.com/friendbook
 Description: This is a social website
 Author: Pixelstrap
 Author URI: https://themeforest.net/user/pixelstrap

 ----------------------------------------------------------------------------------- */
// 01.Loader
// 02.Tap to top
// 03.Image to background
// 04.Favourite add 
// 05.Create post
// 06.App Btn
// 07.React panel
// 08.Comment page
// 09.Mouseup
// 10.Show more/infinite js
// 11.Modal backdrop
// 12.Sidebar open/close
// 13.Header
// 14.Album open/close
// 15.Footer
// 16.Setting filter
// 17.Comment modal
// 18.Expand search
// 19.Dark


/*=====================
    1.Loader
 ==========================*/

 $(window).on('load', function() {
    setTimeout(function() {
        $('.loading-text').fadeOut('slow');
    }, 500);
    $('.loading-text').remove('slow');
    setTimeout(function() {
        $('.pre-loader').fadeOut('slow');
    }, 1000);
    $('.pre-loader').remove('slow');
});


/*========================
  2. Tap to top js
  ==========================*/
$(document).ready(function() {
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 600) {
            $('.tap-top').fadeIn();
        } else {
            $('.tap-top').fadeOut();
        }
    });
    $('.tap-top').on('click', function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

});


/*=====================
  3. Image to background js
  ==========================*/

$(".bg-top").parent().addClass('b-top'); // background postion top
$(".bg-bottom").parent().addClass('b-bottom'); // background postion bottom
$(".bg-center").parent().addClass('b-center'); // background postion center
$(".bg-left").parent().addClass('b-left'); // background postion left
$(".bg-right").parent().addClass('b-right'); // background postion right
$(".bg_size_content").parent().addClass('b_size_content'); // background size content
$(".bg-img").parent().addClass('bg-size');
$(".bg-img.blur-up").parent().addClass('blur-up lazyload');
$('.bg-img').each(function() {

    var el = $(this),
        src = el.attr('src'),
        parent = el.parent();


    parent.css({
        'background-image': 'url(' + src + ')',
        'background-size': 'cover',
        'background-position': 'center',
        'background-repeat': 'no-repeat',
        'display': 'block'
    });

    el.hide();
});

/*=====================
  4. Favourite add js
==========================*/

$(".favourite-btn").on("click", function() {
    $(this).toggleClass("active");
});


/*========================
 5. Create post js
==========================*/

$(".create-post").on("click", function() {
    $(this).addClass("active");
});


$("#create-overlay").on("click", function() {
    $("body").addClass("create-overlay");
});

$(".close-btn").on("click", function() {
    $("body").removeClass("create-overlay");
    $(".create-post ").removeClass("active");
});


var myValue;

function clickGradient(val) {
    myValue = val;
}
$(".gradient-bg li").on("click", function() {
    $(".static-section").addClass("d-none");
    $("#bg-post").removeClass();
    $("#bg-post").addClass("bg-post d-block  " + myValue)
});

$("#bg-post .close-icon").on("click", function() {
    $(".static-section").removeClass("d-none");
    $("#bg-post").removeClass();
    $("#bg-post").addClass("bg-post");
    $('.Disable').prop("disabled", true);
});


$(".modal .gradient-bg li").on("click", function() {
    $(".modal .static-section").addClass("d-none");
    $("#bg-post1").removeClass();
    $("#bg-post1").addClass("bg-post d-block  " + myValue)
});

$("#bg-post1 .close-icon").on("click", function() {
    $(".modal .static-section").removeClass("d-none");
    $("#bg-post1").removeClass();
    $("#bg-post1").addClass("bg-post");
    $('.Disable').prop("disabled", true);
});

$(".enable").click(function(event) {
    event.preventDefault();
    $('.Disable').prop("disabled", false);
    $('.post-btn').addClass("d-block")
});

var content_width = jQuery(window).width();
if ((content_width) <= '576') {
    $(".create-post").on("click", function() {
        $(".overlay-bg").addClass("show");
        $('body').css({
            'overflow': 'hidden',
        });
    });
    $(".overlay-bg").on("click", function() {
        $(".overlay-bg").removeClass("show");
        $("#bg-post").removeClass();
        $("#bg-post").addClass("bg-post");
        $('body').css({
            'overflow': 'auto',
        });
    });

}

// additional input 
$("#feeling-btn").on("click", function(){
    $("#additional-input").addClass("feeling");
    $("#additional-input").removeClass("place");
    $("#additional-input").removeClass("friends");
    var feeling_activity = $( "#additional-input .feeling-input .form-control").val()
})
$("#checkin-btn").on("click", function(){
    $("#additional-input").addClass("place");
    $("#additional-input").removeClass("feeling");
    $("#additional-input").removeClass("friends");
})
$("#friends-btn").on("click", function(){
    $("#additional-input").addClass("friends");
    $("#additional-input").removeClass("feeling");
    $("#additional-input").removeClass("place");
})
$("#icon-close").on("click", function(){
    $("#additional-input").removeClass("friends");
    $("#additional-input").removeClass("feeling");
    $("#additional-input").removeClass("place");
})


/*========================
  6. App Btn js
==========================*/
$(".app-btn a").on("click", function() {
    $(".app-btn .app-box").addClass("show");
    $(".app-overlay").addClass("show");
    $('body').css({
        'overflow': 'hidden',
    });
});
$(".app-overlay").on("click", function() {
    $(".app-btn .app-box").removeClass("show");
    $(".app-overlay").removeClass("show");
    $('body').css({
        'overflow': 'auto',
    });
});


/*========================
  7. React panel js
==========================*/

$(".react-click").on("click", function() {
    $(this).parents(".react-btn").find(".react-box").toggleClass("show");
});


/*========================
  8. Comment js
==========================*/
$(".comment-click").on("click", function() {
    $('.ldr-comments').show();
    $('.comment-section .main-comment').hide();
    setTimeout(function() {
        $('.ldr-comments').hide();
        $('.comment-section .main-comment').show();
    }, 2000);
    $(this).parents(".post-details").find(".comment-section .comments").toggleClass("d-block");
});

/*========================
  9. Mouseup js
==========================*/

$(document).mouseup(function(e) {

    // create post
    var post = $(".create-post");
    if (!post.is(e.target) &&
        post.has(e.target).length === 0) {
        $(".create-post").removeClass("active");
        $("#post-btn").removeClass();
        $("#post-btn").addClass("post-btn d-none");
        $("#post-btn1").removeClass();
        $("#post-btn1").addClass("post-btn d-none");
        $("overlay-bg").removeClass("active");
    }

    // react panel
    var react = $(".react-btn");
    if (!react.is(e.target) &&
        react.has(e.target).length === 0) {
        $(".react-box").removeClass("show");
    }

    // sidebar 
    var sidebar = $(".fixed-sidebar");
    if (!sidebar.is(e.target) &&
        sidebar.has(e.target).length === 0) {
        $(".fixed-sidebar").removeClass("show");
        $("body").removeClass("sidebar-overlay");
    }


    // searchbar 
    var searchbar = $(".search-box");
    if (!searchbar.is(e.target) &&
        searchbar.has(e.target).length === 0) {
        $(".search-box").removeClass("show");
    }

});


/*=====================
 10. Show more/infinite js
==========================*/
$(function() {
    $(".infinite-loader-sec .col-grid-box").slice(0, 5).show();
    var window_width = jQuery(window).width();
    if ((window_width) > '1199') {
        $("#load-more").on('click', function(e) {
            e.preventDefault();
            $(".infinite-loader-sec .col-grid-box:hidden").slice(0, 1).slideDown();
            if ($(".infinite-loader-sec .col-grid-box:hidden").length === 0) {
                $("#load-more").addClass('no-more');
            }
        });
    }
});


/*=====================
 11. Modal backdrop hidden
 ==========================*/
// var window_width = jQuery(window).width();
// if ((window_width) < '576') {
//     $('#shareModal').modal({
//         show: false,
//         backdrop: false
//     });
// }


/*=====================
 12.  Sidebar open/close js
 ==========================*/
$("#nav-sidebar").on("click", function() {
    $(".fixed-sidebar").addClass("show");
    $("body").addClass("sidebar-overlay");
});


/*=====================
 13. Header js
 ==========================*/
var window_width = jQuery(window).width();
if ((window_width) < '576') {
    $('.header-btn').on('show.bs.dropdown', function() {
        $("body").addClass("header-overlay");
    })
}

$(".navbar-toggler").on("click", function() {
    $(".navbar .overlay-bg").addClass("show");
    $(".navbar-collapse").addClass("show");
    $('body').css({
        'overflow': 'hidden',
    });
});

$(".navbar .back-btn").on("click", function() {
    $(".navbar .overlay-bg").removeClass("show");
    $(".navbar-collapse").removeClass("show");
    $('body').css({
        'overflow': 'auto',
    });
});



// profile page js 
/*=====================
  14. Album open/close
 ==========================*/
$(".gallery-album .collection").on("click", function() {
    $(".gallery-open").addClass("d-block");
    $(".gallery-album").addClass("d-none")
});

$(".gallery-open .close-album").on("click", function() {
    $(".gallery-open").removeClass("d-block");
    $(".gallery-album").removeClass("d-none")
});


/*=====================
 15. Footer js
 ==========================*/

var contentwidth = jQuery(window).width();
if ((contentwidth) < '767') {
    jQuery('.footer-title h4').append('<span class="according-menu"><i class="fas fa-chevron-down"></i></span>');
    jQuery('.footer-title').click(function() {
        jQuery('.footer-title').removeClass('active');
        jQuery('.footer-content').slideUp('normal');
        if (jQuery(this).next().is(':hidden') == true) {
            jQuery(this).addClass('active');
            jQuery(this).find('span').replaceWith('<span class="according-menu"><i class="fas fa-chevron-up"></i></span>');
            jQuery(this).next().slideDown('normal');
        } else {
            jQuery(this).find('span').replaceWith('<span class="according-menu"><i class="fas fa-chevron-down"></i></span>');
        }
    });
    jQuery('.footer-content').hide();
} else {
    jQuery('.footer-content').show();
}


/*=====================
 16. Setting filter
 ==========================*/
$(".setting-section .detail-box").on("click", function() {
    var _box = $(this).data("class");
    $(".setting-sidebar .tab-section .nav .nav-link").each(function(index) {
        var _attr = $(this).attr("aria-controls");
        if (_box == _attr) {
            $(this).trigger("click");
        }
    });
});

$(".setting-menu").on("click", function() {
    $(".setting-section .setting-sidebar").addClass("show");
});

$(".setting-section .back-btn").on("click", function() {
    $(".setting-section .setting-sidebar").removeClass("show");
});


/*=====================
  17. Comment modal js 
 ==========================*/
$('#imageModel').on('hidden.bs.modal', function(e) {
    $('body').removeClass('filter-blur');
})

$('#imageModel').on('shown.bs.modal', function() {
    $('body').addClass('filter-blur');
    $('.slide-1').slick({
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        dots: true,
        dotsClass: 'custom_paging',
        customPaging: function(slider, i) {
            return (i + 1) + '/' + slider.slideCount;
        }
    });

});


/*=====================
  18. Expand search js 
 ==========================*/
 $(".xs-search .icon-search").on("click", function() {
    $(this).parents(".xs-search").addClass("open-full");
});

$(".xs-search .icon-close").on("click", function() {
    $(this).parents(".xs-search").removeClass("open-full");
});

$(".search-type").on("click", function() {
    $(this).parents(".search-box").addClass("show");
});

$(".search-box .icon-close").on("click", function() {
    $(this).parents(".search-box").removeClass("show");
});

/*=====================
   19. Dark js 
 ==========================*/

$(document).ready(function() {
    $("#dark").click(function() {
        $(this).parent(".header-btn").find("#light").addClass("d-inline-block");
        $(this).parent(".header-btn").find("#dark").addClass("d-none");
        $("#change-link").attr("href", "../assets/css/dark.css");
    });
    $("#light").click(function() {
        $(this).parent(".header-btn").find("#light").removeClass("d-inline-block");
        $(this).parent(".header-btn").find("#dark").removeClass("d-none")
        $("#change-link").attr("href", "../assets/css/style.css");
    });
});	
$(document).ready(function() {
    $("#dark-1").click(function() {
        $(this).parent(".header-btn").find("#light-1").addClass("d-inline-block");
        $(this).parent(".header-btn").find("#dark-1").addClass("d-none");
        $("#change-link").attr("href", "../assets/css/dark-1.css");
    });
    $("#light-1").click(function() {
        $(this).parent(".header-btn").find("#light-1").removeClass("d-inline-block");
        $(this).parent(".header-btn").find("#dark-1").removeClass("d-none")
        $("#change-link").attr("href", "../assets/css/style-1.css");
    });
});	
$(document).ready(function() {
    $("#dark-2").click(function() {
        $(this).parent(".header-btn").find("#light-2").addClass("d-inline-block");
        $(this).parent(".header-btn").find("#dark-2").addClass("d-none");
        $("#change-link").attr("href", "../assets/css/dark-2.css");
    });
    $("#light-2").click(function() {
        $(this).parent(".header-btn").find("#light-2").removeClass("d-inline-block");
        $(this).parent(".header-btn").find("#dark-2").removeClass("d-none")
        $("#change-link").attr("href", "../assets/css/style-2.css");
    });
});