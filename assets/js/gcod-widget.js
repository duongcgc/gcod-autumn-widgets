(function($) {
    "use strict";

    // your code here

      

    // var widgetPostsSlider = function ($scope, $) {
        $(".widget-posts-slider").slick({
            loop: true,
            autoplay: false,
            autoplaySpeed: 3000,
            dots: false,
            infinite: true,
            speed: 500,
            adaptiveHeight: true,
            vertical: false,
            rows: 1,
            slidesPerRow: 1,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="fal fa-angle-left icon"></i></a>',
            nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="fal fa-angle-right icon"></i></a>',
            responsive: [
                {
                    breakpoint: 1500,
                    settings: {
                        rows: 1,
                        slidesPerRow: 1,
                    }
                },
                {
                    breakpoint: 1200,
                    settings: {
                        rows: 1,
                        slidesPerRow: 1,
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        rows: 1,
                        slidesPerRow: 1,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        rows: 1,
                        slidesPerRow: 1,
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        rows: 1,
                        slidesPerRow: 1,
                    }
                }
            ]
        }); 
    // }; 


    // $(window).on('elementor/frontend/init', function () {
    //     elementorFrontend.hooks.addAction('frontend/element_ready/widget', widgetPostsSlider);
    // }); 
})(jQuery);