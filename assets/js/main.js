;(function ($) {

    "use strict";

    /* ===================
     Page reload
     ===================== */
    var scroll_top;
    var window_height;
    var window_width;
    var scroll_status = '';
    var lastScrollTop = 0;
    // Fire on document ready.
    $( document ).ready( function() {
        // magnific Popup
        soapee_magnific_popup();
        // menu
        soapee_open_mobile_menu();
        soapee_dropdown_menu();
        // hidden sidebar
        soapee_header_hidden_sidebar();
        // WooCommerce
        soapee_open_cart_popup();
        soapee_wc_single_product_gallery();
        soapee_quantity_plus_minus();
        soapee_quantity_plus_minus_action();
        soapee_single_add_to_cart_button();
        // background image moving
        soapee_background_moving();
        soapee_video_size();

        // elementor
        soapee_elementor_section_full_width_with_space();
    });

    $(window).on('load', function () {
        $(".cms-loader").fadeOut("slow");
        window_width = $(window).width();
        soapee_col_offset();
        soapee_header_ontop();
        soapee_header_sticky();
        soapee_rtl();
        soapee_footer_fixed();
        soapee_scroll_to_top();
        setTimeout(function () { $('.cms-grid-menu-layout5 .grid-filter-wrap .filter-item:nth-child(1)').trigger('click'); }, 100);
        soapee_post_gallery_slide();
        soapee_video_size();
        soapee_case_study_gallery_slide();
    });
    $(window).on('resize', function () {
        window_width = $(window).width();
        soapee_col_offset();
        soapee_video_size();
        // elementor
        soapee_elementor_section_full_width_with_space();
    });

    $(window).on('scroll', function () {
        scroll_top = $(window).scrollTop();
        window_height = $(window).height();
        window_width = $(window).width();
        if (scroll_top < lastScrollTop) {
            scroll_status = 'up';
        } else {
            scroll_status = 'down';
        }
        lastScrollTop = scroll_top;
        soapee_header_sticky();
        soapee_scroll_to_top();
    });
    // Ajax Complete
    $(document).ajaxComplete(function(event, xhr, settings){
        "use strict";
        $.sep_grid_refresh(); // this need to add last function
        soapee_post_gallery_slide();
        soapee_video_size();

        // WooCommerce
        soapee_ajax_add_to_cart();
        // elementor
        soapee_elementor_section_full_width_with_space();
    });

    $.sep_grid_refresh = function (){
        $('.cms-grid-masonry').each(function () {
            var _gutter = $(this).data('gutter');
            var _layoutMode = $(this).data('layoutmode');
            var iso = new Isotope(this, {
                layoutMode: _layoutMode,
                itemSelector: '.grid-item',
                percentPosition: true,
                masonry: {
                    columnWidth: '.grid-sizer',
                    gutter: 0,
                },
                containerStyle: null,
                stagger: 30,
                sortBy : 'name',
            });

            var filtersElem = $(this).parent().find('.grid-filter-wrap');
            filtersElem.on('click', function (event) {
                var filterValue = event.target.getAttribute('data-filter');
                iso.arrange({filter: filterValue});
            });

            var filterItem = $(this).parent().find('.filter-item');
            filterItem.on('click', function (e) {
                filterItem.removeClass('active');
                $(this).addClass('active');
            });

            var filtersSelect = $(this).parent().find('.select-filter-wrap');
            filtersSelect.change(function() {
                var filters = $(this).val();
                iso.arrange({filter: filters});
            });

            var orderSelect = $(this).parent().find('.select-order-wrap');
            orderSelect.change(function() {
                var e_order = $(this).val();
                if(e_order == 'asc') {
                    iso.arrange({sortAscending: false});
                }
                if(e_order == 'des') {
                    iso.arrange({sortAscending: true});
                }
            });

        });
    }

    // load more
    $(document).on('click', '.cms-load-more', function(){
        var loadmore = $(this).data('loadmore');
        var _this = $(this).parents(".cms-grid");

        if(_this.hasClass('cms-post-grid')){
            var load_action = 'soapee_elementor_load_more_post_grid';
        } else if(_this.hasClass('cms-post-list')) {
            var load_action = 'soapee_elementor_load_more_post_list';
        }
        var layout_type = _this.data('layout');
        loadmore.paged = parseInt(_this.data('start-page')) +1;
        $.ajax({
            url: main_data.ajax_url,
            type: 'POST',
            beforeSend: function () {

            },
            data: {
                action: load_action,
                settings: loadmore
            }
        })
            .done(function (res) {
                if(res.status == true){
                    console.log(res.data);
                    _this.find('.cms-grid-inner').append(res.data.html);
                    _this.data('start-page', res.data.paged);
                    if(layout_type == 'masonry'){
                        $.sep_grid_refresh();
                    }
                }
                else if(res.status == false){
                    console.log(res.message);
                }
            })
            .fail(function (res) {
                console.log(res);
                return false;
            })
            .always(function () {
                return false;
            });
    });

    // pagination
    $(document).on('click', '.cms-grid-pagination .ajax a.page-numbers', function(){
        var _this = $(this).parents(".cms-grid");
        var loadmore = _this.find(".cms-grid-pagination").data('loadmore');
        var query_vars = _this.find(".cms-grid-pagination").data('query');
        var layout_type = _this.data('layout');
        var paged = $(this).attr('href');
        paged = paged.replace('#', '');
        loadmore.paged = parseInt(paged);
        query_vars.paged = parseInt(paged);
        if(_this.hasClass('cms-post-grid')){
            var load_action = 'soapee_elementor_load_more_post_grid';
        } else if(_this.hasClass('cms-post-list')) {
            var load_action = 'soapee_elementor_load_more_post_list';
        }
        // reload pagination
        $.ajax({
            url: main_data.ajax_url,
            type: 'POST',
            beforeSend: function () {

            },
            data: {
                action: 'soapee_get_pagination_html',
                query_vars: query_vars
            }
        }).done(function (res) {
            if(res.status == true){
                _this.find(".cms-grid-pagination").html(res.data.html);
            }
            else if(res.status == false){
                console.log(res.message);
            }
        }).fail(function (res) {
            console.log(res);
            return false;
        }).always(function () {
            return false;
        });
        // load post
        $.ajax({
            url: main_data.ajax_url,
            type: 'POST',
            beforeSend: function () {

            },
            data: {
                action: load_action,
                settings: loadmore
            }
        }).done(function (res) {
            if(res.status == true){
                _this.find('.cms-grid-inner .grid-item').remove();
                _this.find('.cms-grid-inner').append(res.data.html);
                _this.data('start-page', res.data.paged);
                if(layout_type == 'masonry'){
                    $.sep_grid_refresh();
                }
            }
            else if(res.status == false){
                console.log(res.message);
            }
        }).fail(function (res) {
            console.log(res);
            return false;
        }).always(function () {
            return false;
        });
        return false;
    });

    $(document).ready(function () {
        /* ===================
         Search Toggle
         ===================== */
        $('.h-btn-form').click(function (e) {
            e.preventDefault();
            $('.cms-modal-contact-form').removeClass('remove').toggleClass('open');
        });
        $('.cms-close').click(function (e) {
            e.preventDefault();
            $(this).parent().addClass('remove').removeClass('open');
            $(this).parents('.cms-modal').addClass('remove').removeClass('open');
            $(this).parents('#page').find('.site-overlay').removeClass('open');
        });
        
        /* ====================
         Scroll To Top
         ====================== */
        $('.cms-scroll-top').click(function () {
            $('html, body').animate({scrollTop: 0}, 800);
            return false;
        });

        /* =================
        Add Class
        =================== */
        $('.wpcf7-select').parent().addClass('wpcf7-menu');
        /* =================
         Row & VC Column Animation
         =================== */
        $('.vc_row.wpb_row.vc_row-fluid').each(function () {
            var vctime = 100;
            var vc_inner = $(this).children().length;
            var _vci = vc_inner - 1;
            $(this).find('> .wpb_animate_when_almost_visible').each(function (index, obj) {
                $(this).css('animation-delay', vctime + 'ms');
                if (_vci === index) {
                    vctime = 100;
                    _vci = _vci + vc_inner;
                } else {
                    vctime = vctime + 100;
                }
            });
        });
        $('.animation-time').each(function () {
            var vctime = 100;
            var vc_inner = $(this).children().length;
            var _vci = vc_inner - 1;
            $(this).find('> .grid-item > .wpb_animate_when_almost_visible').each(function (index, obj) {
                $(this).css('animation-delay', vctime + 'ms');
                if (_vci === index) {
                    vctime = 100;
                    _vci = _vci + vc_inner;
                } else {
                    vctime = vctime + 40;
                }
            });
        });

        /* =================
         The clicked item should be in center in owl carousel
         =================== */
        var $owl_item = $('.owl-active-click');
        $owl_item.children().each(function (index) {
            $(this).attr('data-position', index);
        });
        $(document).on('click', '.owl-active-click .owl-item > div', function () {
            $owl_item.trigger('to.owl.carousel', $(this).data('position'));
        });

        /* Newsletter */
        var email_text = $('.tnp-field-email label').text();
        $('.tnp-field-email label').remove();
        $('.tnp-field-email').find(".tnp-email").each(function (ev) {
            if (!$(this).val()) {
                $(this).attr("placeholder", email_text);
            }
        });
        var firstname_text = $('.tnp-field-firstname label').text();
        $('.tnp-field-firstname label').remove();
        $('.tnp-field-firstname').find(".tnp-firstname").each(function (ev) {
            if (!$(this).val()) {
                $(this).attr("placeholder", firstname_text);
            }
        });
        var lastname_text = $('.tnp-field-lastname label').text();
        $('.tnp-field-lastname label').remove();
        $('.tnp-field-lastname').find(".tnp-lastname").each(function (ev) {
            if (!$(this).val()) {
                $(this).attr("placeholder", lastname_text);
            }
        });

        

        /* Modal */
        $(document).on('click', function (e) {
            if (e.target.className == 'cms-modal cms-modal-search open')
                $('.cms-modal-search').removeClass('open');
            if (e.target.className == 'cms-modal-close'){
                $(e.target).parents(".cms-modal-search").removeClass('open');
            }
            if (e.target.className == 'cms-hidden-sidebar open')
                $('.cms-hidden-sidebar').removeClass('open');
        });

        /* =================
         Move Divider, Angled & Overlay for Row VC
         =================== */
        $('.entry-content > .vc_row').each(function () {
            var _el_overlay = $(this).find(".cms-row-overlay"),
                _row_overlay = _el_overlay.parents(".wpb_column");
            _row_overlay.before(_el_overlay.clone());
            _el_overlay.remove();
            $(this).find(".cms-row-overlay").parent().addClass('vc-row-overlay');

            var _el_divider = $(this).find(".row-divider"),
                _row_divider = _el_divider.parents(".wpb_column");
            _row_divider.before(_el_divider.clone());
            _el_divider.remove();
        });

    });
    /**
     * Check right to left
    */
    function soapee_is_rtl(){
        "use strict";
        var rtl = $('html[dir="rtl"]'),
            is_rtl = rtl.length ? true : false;
        return is_rtl;
    }
    /* =================
     Column Absolute
     =================== */
     function soapee_magnific_popup(){
        'use strict';
        if(typeof $.magnificPopup === 'undefined') return false;
        /* Images Light Box - Gallery:True */
        $('.cms-images-light-box').each(function () {
            $(this).magnificPopup({
                delegate: 'a.cms-light-box',
                type: 'image',
                gallery: {
                    enabled: true
                },
                mainClass: 'mfp-fade',
            });
        });

        $('.cms-image-light-box').each(function () {
            $(this).magnificPopup({
                delegate: 'a.cms-light-box',
                type: 'image',
                gallery: {
                    enabled: false
                },
                mainClass: 'mfp-fade',
            });
        });

        /* Video Light Box */
        $('.cms-video-button, .btn-video, a[href*="youtube"]').magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
        $('.cms-image-video').append( '<span class="btn-video"><span class="cms-play-video-icon"></span></span>');
        /* Search */
        $('.h-btn-search').magnificPopup({
            type:'inline',
            closeBtnInside: false,
            removalDelay: 300,
            mainClass: 'mfp-fade',
            focus: '.cms-search-field',
            zoom: {
                enabled: true,
                duration: 500,
                easing: 'ease-in-out', 
                opener: function(openerElement) {
                    return openerElement.is('img') ? openerElement : openerElement.find('img');
                }
            }
        });
     }
     /* =================
     Column Absolute
     =================== */
    function soapee_col_offset() {
        'use strict';
        var w_vc_row_lg = ($('#content').width() - 1230) / 2;
        if (window_width > 1200) {
            $('.col-offset-right > .vc_column-inner').css('padding-right', w_vc_row_lg + 'px');
            $('.col-offset-left > .vc_column-inner').css('padding-left', w_vc_row_lg + 'px');
            $('.col-offset-right > .col-offset-inner').css('padding-right', w_vc_row_lg + 'px');
            $('.col-offset-left > .col-offset-inner').css('padding-left', w_vc_row_lg + 'px');
        }
    }
    // Header ontop
    function soapee_header_ontop() {
        'use strict';
        var offsetTop = $('#cms-header-top').outerHeight();
        if($('#cms-header').hasClass('is-ontop')) {
            $('#cms-header').css({
                'top': offsetTop
            });
        }
    }
    /**
     * header sticky
     * $('#cms-header').css('top', topSpace);
     * $('#cms-header').removeClass('header-sticky').css('top','');
    */
    function soapee_header_sticky() {
        'use strict';
        var offsetTop = $('#cms-header').outerHeight();
        var h_header = $('.fixed-height').outerHeight();
        var offsetTopAnimation = offsetTop + 200;
        var topSpace = $('html').css('margin-top');
        if($('#cms-header').hasClass('is-sticky')) {
            if (scroll_top > offsetTopAnimation) {
                $('#cms-header').addClass('header-sticky').removeClass('header-ontop');
            } else {
                $('#cms-header').removeClass('header-sticky');
                if($('#cms-header').hasClass('is-ontop')){
                    $('#cms-header').addClass('header-ontop');
                }
            }
        }
        if (window_width > 992) {
            $('.fixed-height').css({
                'height': h_header
            });
        }
    }
     /* =================
     Menu Mobile
     =================== */
     function soapee_open_mobile_menu(){
        'use strict';
        $("#main-menu-mobile .open-menu").on('click', function () {
            $(this).toggleClass('opened');
            $('.cms-navigation').toggleClass('navigation-open');
        });
        /* Add toggle button to parent Menu */
        $('.cms-primary-menu li.menu-item-has-children').append('<span class="main-menu-toggle"></span>');
        $('.main-menu-toggle').on('click', function () {
            $(this).toggleClass('open');
            $(this).parent().find('> .sub-menu').toggleClass('submenu-open').slideToggle();
            $(this).parent().toggleClass('active');
            $(this).parent().find('> a').toggleClass('active');
        });
    }
    /* =================
     Menu Dropdown Touched Side
     =================== */
    function soapee_dropdown_menu(){
        'use strict';
        var $menu = $('.cms-main-navigation');        
        $menu.find('.cms-primary-menu li').each(function () {
            var $submenu = $(this).find('> ul.sub-menu');
            if ($submenu.length == 1) {
                $(this).hover(function () {
                    if ($submenu.offset().left + $submenu.width() > $(window).width()) {
                        $submenu.addClass('back');
                    } else if ($submenu.offset().left < 0) {
                        $submenu.addClass('back');
                    }
                }, function () {
                    $submenu.removeClass('back');
                });
            }
        });

        $('.sub-menu .current-menu-item').parents('.menu-item-has-children').addClass('current-menu-ancestor');
    }
    /* =================
     Hidden Side bar
    =================== */
    function soapee_header_hidden_sidebar(){
        'use strict';

        $(".cms-header-hidden-sidebar").on('click', function (e) {
            e.preventDefault();
            $('.cms-hidden-sidebar').toggleClass('open');
        });
        $(".cms-hidden-close").on('click', function (e) {
            e.preventDefault();
            $(this).parent().removeClass('open');
        });
    }
    /* =================
    RTL
    =================== */
    function soapee_rtl() {
        'use strict';
        if ($('html').attr('dir') == 'rtl') {
            $('[data-vc-full-width="true"]').each(function (i, v) {
                $(this).css('right', $(this).css('left')).css('left', 'auto');
            });
        }
    }
    /* ====================
      Fixed Footer
     ====================== */
     function soapee_footer_fixed(){
        'use strict';
        var offsetFooter = $('#cms-footer').outerHeight();
        if($('#cms-footer').hasClass('cms-footer-fixed')) {
            $('#cms-page').css({
                'padding-bottom': offsetFooter
            });
        }
     }
    /* ====================
     Scroll To Top
     ====================== */
    function soapee_scroll_to_top() {
        'use strict';
        if (scroll_top < window_height) {
            $('.cms-scroll-top').addClass('off').removeClass('on');
        }
        if (scroll_top > window_height) {
            $('.cms-scroll-top').addClass('on').removeClass('off');
        }
    }
    /** ============
     Post gallery
    ================ */
    function soapee_post_gallery_slide(){
        'use strict';
        if(typeof $.fn.slick !== 'undefined'){
            $('.cms-post-gallery-slide').slick({
                dots: true,
                prevArrow : '<div class="cms-slick-prev"><span class="cms-slick-prev-icon"></span></div>',
                nextArrow : '<div class="cms-slick-next"><span class="cms-slick-next-icon"></span></div>',
                dotsClass: 'cms-slick-dots', 
                rtl: soapee_is_rtl()
            });
        }
    }
    /**
     * Media Embed dimensions
     * 
     * Youtube, Vimeo, Iframe, Video, Audio.
     * @author Chinh Duong Manh
     */
    function soapee_video_size() {
        'use strict';
        setTimeout(function(){
            $('.cms-featured iframe , .cms-featured  video, .cms-featured .wp-video-shortcode, .cms-post-content iframe').each(function(){
                var v_width = $(this).parent().width();
                var v_height = Math.floor(v_width / (16/9));
                $(this).attr('width',v_width).css('width',v_width);
                $(this).attr('height',v_height + 59).css('height',v_height + 59);
            });
        }, 100);
    }
    /**
     * BACKGROUND IMAGE MOVING FUNCTION BY= jquery.bgscroll.js
    */
    (function() {
        "use strict";
        $.fn.bgscroll = $.fn.bgScroll = function( options ) {
            
            if( !this.length ) return this;
            if( !options ) options = {};
            if( !window.scrollElements ) window.scrollElements = {};
            
            for( var i = 0; i < this.length; i++ ) {
                
                var allowedChars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                var randomId = '';
                for( var l = 0; l < 5; l++ ) randomId += allowedChars.charAt( Math.floor( Math.random() * allowedChars.length ) );
                
                    this[ i ].current = 0;
                    this[ i ].scrollSpeed = options.scrollSpeed ? options.scrollSpeed : 70;
                    this[ i ].direction = options.direction ? options.direction : 'h';
                    window.scrollElements[ randomId ] = this[ i ];
                    
                    eval( 'window[randomId]=function(){var axis=0;var e=window.scrollElements.' + randomId + ';e.current -= 1;if (e.direction == "h") axis = e.current + "px 0";else if (e.direction == "v") axis = "0 " + e.current + "px";else if (e.direction == "d") axis = e.current + "px " + e.current + "px";$( e ).css("background-position", axis);}' );
                                                             
                    setInterval( 'window.' + randomId + '()', options.scrollSpeed ? options.scrollSpeed : 70 );
                }
                
                return this;
            }
    })(jQuery);   

    /**
     * Background Moving
     * $('.cms-bg-moving-v').bgscroll({scrollSpeed:20 , direction:'v' });
     * $('.cms-bg-moving-d').bgscroll({scrollSpeed:20 , direction:'d' });
    */
    function soapee_background_moving(){
        "use strict";
        $('.cms-bg-moving-h').bgscroll({scrollSpeed:20 , direction:'h' });
    }
    /**
     * WooCommerce Archive 
    **/
    function soapee_ajax_add_to_cart(){
        'use strict';
        var $class = $('.ajax_add_to_cart').attr('class');
        $('.added_to_cart').addClass($class).removeClass('ajax_add_to_cart wc-forward');
    }
    /**
     * WooCommerce
     * Single Product
    */
    // open cart popup
    function soapee_open_cart_popup(){
        'use strict';
        $('.h-btn-cart').on('click', function (e) {
            e.preventDefault();
            var $submenu = $(this).next('.widget_shopping_cart');
            $(this).next('.widget_shopping_cart').toggleClass('open');
            if ($submenu.offset().left + $submenu.width() > $(window).width()) {
                $submenu.css({'right':'0', 'left': 'auto'});
            } else if ($submenu.offset().left < 0) {
                $submenu.css({'right':'0', 'left': 'auto'});
            }
        });
    }
    // WooCommerce Single Product Gallery 
    function soapee_wc_single_product_gallery(){
        'use strict';
        if(typeof $.flexslider != 'undefined'){
            $('.wc-gallery-sync').each(function() {
                var itemW      = parseInt($(this).attr('data-thumb-w')),
                    itemH      = parseInt($(this).attr('data-thumb-h')),
                    itemN      = parseInt($(this).attr('data-thumb-n')),
                    itemMargin = parseInt($(this).attr('data-thumb-margin')),
                    itemSpace  = itemH - itemW + itemMargin;
                if($(this).hasClass('thumbnail-vertical')){
                    $(this).flexslider({
                        selector       : '.wc-gallery-sync-slides > .wc-gallery-sync-slide',
                        animation      : 'slide',
                        controlNav     : false,
                        directionNav   : true,
                        prevText       : '<span class="flex-prev-icon"></span>',
                        nextText       : '<span class="flex-next-icon"></span>',
                        asNavFor       : '.woocommerce-product-gallery',
                        direction      : 'vertical',
                        slideshow      : false,
                        animationLoop  : false,
                        itemWidth      : itemW, // add thumb image height
                        itemMargin     : itemSpace, // need it to fix transform item
                        move           : 3,
                        start: function(slider){
                            var asNavFor     = slider.vars.asNavFor,
                                height       = $(asNavFor).height(),
                                height_thumb = $(asNavFor).find('.flex-viewport').height(),
                                window_w = $(window).width();
                            if(window_w > 1024) {
                                slider.css({'max-height' : height_thumb, 'overflow': 'hidden'});
                                slider.find('> .flex-viewport > *').css({'height': height, 'width': ''});
                            }
                        }
                    });
                }
                if($(this).hasClass('thumbnail-horizontal')){
                    $(this).flexslider({
                        selector       : '.wc-gallery-sync-slides > .wc-gallery-sync-slide',
                        animation      : 'slide',
                        controlNav     : true,
                        directionNav   : false,
                        prevText       : '<span class="flex-prev-icon"></span>',
                        nextText       : '<span class="flex-next-icon"></span>',
                        asNavFor       : '.woocommerce-product-gallery',
                        slideshow      : false,
                        animationLoop  : false, // Breaks photoswipe pagination if true.
                        itemWidth      : itemW,
                        itemMargin     : itemMargin,
                        start: function(slider){

                        }
                    });
                };
            });
        }
    }
    //quantity number field custom
    function soapee_quantity_plus_minus(){
        "use strict";
        $( ".quantity input" ).wrap( "<div class='cms-quantity'></div>" );
        $('<span class="quantity-button quantity-down"></span>').insertBefore('.quantity input');
        $('<span class="quantity-button quantity-up"></span>').insertAfter('.quantity input');
    }
    function soapee_ajax_quantity_plus_minus(){
        "use strict";
        $('<span class="quantity-button quantity-down"></span>').insertBefore('.quantity input');
        $('<span class="quantity-button quantity-up"></span>').insertAfter('.quantity input');
    }
    function soapee_quantity_plus_minus_action(){
        "use strict";
        $(document).on('click','.quantity .quantity-button',function () {
            var $this = $(this),
                spinner = $this.closest('.quantity'),
                input = spinner.find('input[type="number"]'),
                step = input.attr('step'),
                min = input.attr('min'),
                max = input.attr('max'),value = parseInt(input.val());
            if(!value) value = 0;
            if(!step) step=1;
            step = parseInt(step);
            if (!min) min = 0;
            var type = $this.hasClass('quantity-up') ? 'up' : 'down' ;
            switch (type)
            {
                case 'up':
                    if(!(max && value >= max))
                        input.val(value+step).change();
                    break;
                case 'down':
                    if (value > min)
                        input.val(value-step).change();
                    break;
            }
            if(max && (parseInt(input.val()) > max))
                input.val(max).change();
            if(parseInt(input.val()) < min)
                input.val(min).change();
        });
    }
    // single add-to-cart-button
    function soapee_single_add_to_cart_button(){
        'use strict';
        $('.single_add_to_cart_button').removeClass('button alt');
    }
    /**
     * Cart Page
    */
    // move remove product to last of row
    function soapee_table_move_column(table, selected ,from, to, remove, colspan, colspan_value) {
        "use strict";
        var rows = jQuery(selected, table);
        var cols;
        rows.each(function() {
            cols = jQuery(this).children('th, td');
            cols.eq(from).detach().insertAfter(cols.eq(to));
        });
        var rows_remove = jQuery(remove, table);
        rows_remove.each(function(){
            jQuery(this).remove(remove);
        });
        var colspan = jQuery(colspan, table);
        colspan.each(function(){
            jQuery(this).attr('colspan',colspan_value);
        });
    }

    /** ============
     Case study gallery
    ================ */
    function soapee_case_study_gallery_slide(){
        'use strict';        
        if(typeof $.fn.slick !== 'undefined'){
            $('.cms-case-study-gallery').slick({
                centerMode: true,
                centerPadding: '23.958%',
                slidesToShow: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                prevArrow : '<div class="cms-slick-prev"><span class="cms-slick-prev-icon"></span></div>',
                nextArrow : '<div class="cms-slick-next"><span class="cms-slick-next-icon"></span></div>',
                rtl: soapee_is_rtl()
            });
        }
    }
    /** ====================================================
     Elementer Section Full Width with Left/ Right Spacing
    ======================================================== **/
    function soapee_elementor_section_full_width_with_space(){
        'use strict';
        if($(window).width() > 1199 ){
            setTimeout(function(){
                $('.elementor-section-full_width').each(function () {
                    var offset = parseInt($(this).css('left').replace('-','')),
                        $section_space_start = $(this).hasClass('cms-full-content-with-space-start'),
                        $section_space_end = $(this).hasClass('cms-full-content-with-space-end');

                    if(soapee_is_rtl()){
                        if($section_space_start) {
                            $(this).css({
                                'padding-right': offset + 'px',
                            });
                        } else if($section_space_end) {
                            $(this).css({
                                'padding-left': offset + 'px',
                            });
                        }
                    } else {
                        if($section_space_start){
                            $(this).css({
                                'padding-left': offset + 'px',
                            });
                        } else if($section_space_end){
                            $(this).css({
                                'padding-right': offset + 'px',
                            });
                        }
                    }
                })
            }, 10 );
        } else {
            $('.elementor-section-full_width').each(function () {
                $(this).css({
                    'padding-left': '',
                    'padding-right': ''
                });
            })
        }
    }
})(jQuery);
