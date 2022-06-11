$('.slide-2').slick({
    infinite: false,
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: true,
    speed: 300,
    responsive: [{
        breakpoint: 1200,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 1
        },
        breakpoint: 991,
        settings: {
            slidesToShow: 2
        }
    }]
});

$('.event_category').slick({
    infinite: true,
    slidesToShow: 2,
    slidesToScroll: 1,
    responsive: [{
        breakpoint: 576,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: true,
            infinite: true
        }
    }]
});

$('.blog-slider').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [{
            breakpoint: 1199,
            settings: {
                slidesToShow: 2
            }
        },
        {
            breakpoint: 575,
            settings: {
                slidesToShow: 1
            }
        }

    ]
});

$('.slide-4').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [{
            breakpoint: 1199,
            settings: {
                slidesToShow: 2
            }
        },
        {
            breakpoint: 575,
            settings: {
                slidesToShow: 1
            }
        }

    ]
});

$('.vertical-slide-3').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    vertical: true,
    autoplay: true,
    speed: 300,
    responsive: [{
        breakpoint: 1200,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 1
        },
        breakpoint: 576,
        settings: {
            slidesToShow: 2
        }
    }]
});


$('.slide-3').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [{
        breakpoint: 1200,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 1
        },
        breakpoint: 576,
        settings: {
            slidesToShow: 2
        }
    }]
});

$('.music-slider').slick({
    infinite: true,
    slidesToShow: 6,
    slidesToScroll: 1,
    responsive: [{
            breakpoint: 1670,
            settings: {
                slidesToShow: 5
            }
        },
        {
            breakpoint: 1441,
            settings: {
                slidesToShow: 4
            }
        },
        {
            breakpoint: 1367,
            settings: {
                slidesToShow: 4
            }
        },
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 3
            }
        },
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 2
            }
        },
        {
            breakpoint: 576,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});


$('.event-slider').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [{
        breakpoint: 1200,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 1
        },
        breakpoint: 576,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 1
        },
        breakpoint: 480,
        settings: {
            slidesToShow: 1
        }
    }]
});



$('.slide-7').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 6,
    slidesToScroll: 1,
    responsive: [{
            breakpoint: 1670,
            settings: {
                slidesToShow: 5
            }
        },
        {
            breakpoint: 1441,
            settings: {
                slidesToShow: 4
            }
        },
        {
            breakpoint: 1367,
            settings: {
                slidesToShow: 4
            }
        },
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 3
            }
        },
        {
            breakpoint: 420,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        }
    ]
});


$('.slide-8').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 8,
    slidesToScroll: 1,
    responsive: [{
            breakpoint: 1670,
            settings: {
                slidesToShow: 7
            }
        },
        {
            breakpoint: 1441,
            settings: {
                slidesToShow: 6
            }
        },
        {
            breakpoint: 1367,
            settings: {
                slidesToShow: 5
            }
        },
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 3
            }
        },
        {
            breakpoint: 420,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        }
    ]
});

$('#storyModel').on('hidden.bs.modal', function(e) {
    $('body').removeClass('filter-blur');
})

$('#storyModel').on('shown.bs.modal', function() {
    $('body').addClass('filter-blur');
    $('.slider-nav').slick({
        slidesToShow: 8,
        slidesToScroll: 1,
        asNavFor: '.slider',
        dots: false,
        centerMode: true,
        vertical: true,
        focusOnSelect: true,
        responsive: [{
            breakpoint: 991,
            settings: {
                slidesToShow: 7,
                vertical: false,
                centerMode: false,
            }
        }, 
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 6,
                vertical: false,
                centerMode: false,
            }
        }, 
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 4,
                vertical: false,
                centerMode: false,
            }
        }, 
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 3,
                vertical: false,
                centerMode: false,
            }
        }
    ]
    });

    $(".slider").slick({
        infinite: false,
        arrows: false,
        dots: false,
        autoplay: false,
        asNavFor: '.slider-nav',
        speed: 800,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true
    });

    //ticking machine
    var percentTime;
    var tick;
    var time = .1;
    var progressBarIndex = 0;

    $('.progressBarContainer .progressBar').each(function(index) {
        var progress = "<div class='inProgress inProgress" + index + "'></div>";
        $(this).html(progress);
    });

    function startProgressbar() {
        resetProgressbar();
        percentTime = 0;
        tick = setInterval(interval, 10);
    }

    var len = $(".slider").slick("getSlick").slideCount;

    function interval() {
        if (($('.slider .slick-track div[data-slick-index="' + progressBarIndex + '"]').attr("aria-hidden")) === "true") {
            progressBarIndex = $('.slider .slick-track div[aria-hidden="false"]').data("slickIndex");
            startProgressbar();
        } else {
            percentTime += 1 / (time + 5);
            $('.inProgress' + progressBarIndex).css({
                width: percentTime + "%"
            });
            if (percentTime >= 100) {
                if (progressBarIndex + 1 < len) {
                    $('.single-item').slick('slickNext');
                    progressBarIndex++;
                    if (progressBarIndex > 2) {
                        progressBarIndex = 0;
                    }
                    startProgressbar();
                } else {
                    resetProgressbar();
                }
            }
        }
    }

    function resetProgressbar() {
        // $('.inProgress').css({
        //     width: 0 + '%'
        // });
        clearInterval(tick);
    }
    startProgressbar();
    // End ticking machine

    $('.item').click(function() {
        clearInterval(tick);
        var goToThisIndex = $(this).find("span").data("slickIndex");
        $('.single-item').slick('slickGoTo', goToThisIndex, false);
        startProgressbar();
    });
})



// story js



// product js
$('.product-slide').slick({
    dots: false,
    speed: 300,
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 5000,
    infinite: true,
    centerMode: true,
    centerPadding: '50px',
    responsive: [{
            breakpoint: 1200,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
            }
        },
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 576,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                centerMode: true,
                centerPadding: '20px',
                dots: false
            }
        },
        {
            breakpoint: 460,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                centerMode: true,
                centerPadding: '30px',
                dots: false
            }
        }
    ]
});

$('.slide-three').slick({
    dots: false,
    speed: 300,
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 5000,
    infinite: true,
    centerMode: true,
    centerPadding: '50px',
    responsive: [{
            breakpoint: 991,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 576,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                centerMode: true,
                centerPadding: '20px',
                dots: false
            }
        },
        {
            breakpoint: 460,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                centerMode: true,
                centerPadding: '30px',
                dots: false
            }
        }
    ]
});

$('.product-slider').slick({
    dots: false,
    speed: 300,
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 5000,
    infinite: true,
    centerMode: true,
    centerPadding: '50px',
    responsive: [{
            breakpoint: 1800,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                centerPadding: '100px'
            }
        },
        {
            breakpoint: 1367,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                centerPadding: '50px'
            }
        },
         {
            breakpoint: 1200,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                centerPadding: '100px'
            }
        },
        {
            breakpoint: 576,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                centerMode: true,
                centerPadding: '20px',
                dots: false
            }
        },
        {
            breakpoint: 460,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                centerMode: true,
                centerPadding: '30px',
                dots: false
            }
        }
    ]
});

$('.friend-slide').slick({
    dots: false,
    speed: 300,
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 5000,
    infinite: true,
    centerMode: true,
    centerPadding: '50px',
    responsive: [{
            breakpoint: 1800,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                centerPadding: '100px'
            }
        }, {
            breakpoint: 1400,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 576,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                centerMode: true,
                centerPadding: '20px',
                dots: false
            }
        },
        {
            breakpoint: 460,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                centerMode: true,
                centerPadding: '30px',
                dots: false
            }
        }
    ]
});

$('.newsfeed1-slide').slick({
    dots: false,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 5000,
    infinite: true,
    centerMode: true,
    centerPadding: '50px',
    responsive: [{
            breakpoint: 1660,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 1440,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 1367,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 576,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                centerMode: true,
                centerPadding: '20px',
                dots: false
            }
        },
        {
            breakpoint: 460,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                centerMode: true,
                centerPadding: '30px',
                dots: false
            }
        }
    ]
});