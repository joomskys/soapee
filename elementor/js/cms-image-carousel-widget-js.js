( function( $ ) {
    /**
     * @param $scope The Widget wrapper element as a jQuery element
     * @param $ The jQuery alias
     */
    var WidgetCMSImageCarouselHandler = function( $scope, $ ) {
        var breakpoints = elementorFrontend.config.breakpoints;
        var carousel = $scope.find(".cms-slick-slider");
        var data = carousel.data();
        var slickOptions = {
            fade: true === data.fade,
            slidesToShow: data.slidestoshow,
            autoplay: true === data.autoplay,
            autoplaySpeed: data.autoplayspeed,
            infinite: true === data.infinite,
            pauseOnHover: true === data.pauseonhover,
            speed: data.speed,
            arrows: true === data.arrows,
            dots: true === data.dots,
            rtl: 'rtl' === data.dir,
            prevArrow : '<div class="cms-slick-prev"><span class="cms-slick-prev-icon"></span></div>',
            nextArrow : '<div class="cms-slick-next"><span class="cms-slick-next-icon"></span></div>',
            dotsClass: 'cms-slick-dots',
            responsive: [
                {
                    breakpoint: breakpoints.lg,
                    settings: {
                        slidesToShow: data.slidestoshowtablet,
                        slidesToScroll: data.slidestoscrolltablet,
                    }
                },
                {
                    breakpoint: breakpoints.md,
                    settings: {
                        slidesToShow: data.slidestoshowmobile,
                        slidesToScroll: data.slidestoscrollmobile,
                    }
                }
            ],
            adaptiveHeight: true
        };
        carousel.slick(slickOptions);
    };

    // Make sure you run this code under Elementor.
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/cms_image_carousel.default', WidgetCMSImageCarouselHandler );
    } );
} )( jQuery );