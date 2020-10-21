<?php
/**
 * Functions and definitions
 *
 * @package Soapee
 */
if(!function_exists('soapee_require_folder')){
    function soapee_require_folder($foldername,$path = '')
    {
        if($path === '') $path = get_template_directory();
        $dir = $path . DIRECTORY_SEPARATOR . $foldername;
        if (!is_dir($dir)) {
            return;
        }
        $files = array_diff(scandir($dir), array('..', '.'));
        foreach ($files as $file) {
            $patch = $dir . DIRECTORY_SEPARATOR . $file;
            if (file_exists($patch) && strpos($file, ".php") !== false) {
                require_once $patch;
            }
        }
    }
}
soapee_require_folder('inc');
soapee_require_folder('inc/extends');

// make some configs
if(!function_exists('soapee_configs')){
    function soapee_configs($value){
        $configs = [
            // color
            'theme_colors' => [
                'accent'      => soapee_hexToRgb(soapee_get_opts('accent_color', '#1b55e3'), 1),
                'primary'     => soapee_hexToRgb(soapee_get_opts('primary_color', '#161357'), 1),
                'primary-07'  => soapee_hexToRgb(soapee_get_opts('primary_color', '#161357'), 0.7),
                'primary-102' => soapee_hexToRgb(soapee_get_opts('primary_color', '#161357'), 0.102),
                'primary-150' => soapee_hexToRgb(soapee_get_opts('primary_color', '#161357'), 0.15),
                'secondary'   => soapee_hexToRgb(soapee_get_opts('secondary_color', '#ffde00'), 1),
                'blue1'       => soapee_hexToRgb('#0e1422',1),
                'blue2'       => soapee_hexToRgb('#272381',1),
                'blue4'       => soapee_hexToRgb('#0e0c44',1),
                'blue5'       => soapee_hexToRgb('#121d3a',0.15),
                'grey1'       => soapee_hexToRgb('#777777',1),
                'grey2'       => soapee_hexToRgb('#323743',1),
                'grey3'       => soapee_hexToRgb('#e7e7ee',1),
                'grey4'       => soapee_hexToRgb('#e8eefc',1),
                'grey5'       => soapee_hexToRgb('#fbfbfb',1),
                'grey6'       => soapee_hexToRgb('#dad9de',1),
                'grey7'       => soapee_hexToRgb('#f5f5f5',1),
                'grey8'       => soapee_hexToRgb('#f6f8fe',1),
                'grey8-02'    => soapee_hexToRgb('#c8c8c8', 0.2),
                'grey8-06'    => soapee_hexToRgb('#c8c8c8', 0.6),
                'grey-9'      => soapee_hexToRgb('#d5d6e5',1),
                'grey-10'     => soapee_hexToRgb('#d8d8d8',1),
                'd8d8d8'      => soapee_hexToRgb('#d8d8d8',1),
                'grey-f1f1f5' => soapee_hexToRgb('#f1f1f5',1),
                'black-02'    => soapee_hexToRgb('#000000',0.2),
                'white'       => soapee_hexToRgb('#ffffff',1),
                'white-15'    => soapee_hexToRgb('#ffffff',0.15),
                'white-20'    => soapee_hexToRgb('#ffffff',0.2),
                'white-30'    => soapee_hexToRgb('#ffffff',0.3),
                'rating'      => soapee_hexToRgb('#fab702', 1),
                'd6d6d6'      => soapee_hexToRgb('#d6d6d6', 1),
                'transparent' => soapee_hexToRgb('#000000', 0)
            ],
            'link_color'  => [
                'regular' => 'var(--primary-color)',
                'hover'   => 'var(--accent-color)',
                'active' => 'var(--accent-color)',
            ],
            // spacing (use for: padding, margin, row gutters, ...)
            'theme_spacings' => [
                0 => 0, 
                5 => 5, 
                10 => 10, 
                15 => 15, 
                20 => 20, 
                25 => 25, 
                30 => 30, 
                35 => 35, 
                40 => 40
            ],
            // screen size use in
            'theme_size_screen'    => [
                'xs' => 0,
                'sm' => 576,
                'md' => 768,
                'lg' => 992,
                'xl' => 1200
            ],
            // logo
            'logo' => [
                'width'     => soapee_get_opts('logo_size', ['width' => '170px', 'height' => '44px'])['width'],
                'height'    => soapee_get_opts('logo_size', ['width' => '170px', 'height' => '44px'])['height'],
                'units'     => soapee_get_opts('logo_size', ['units' => 'px'])['units'],
                'width-sm'  => soapee_get_opts('logo_size_sm', ['width' => '170px', 'height' => '44px'])['width'],
                'height-sm' => soapee_get_opts('logo_size_sm', ['width' => '170px', 'height' => '44px'])['height'],
                'default'   => get_template_directory_uri().'/assets/images/logo/logo.png',  
                'ontop'     => get_template_directory_uri().'/assets/images/logo/logo-ontop.png',  
                'sticky'    => get_template_directory_uri().'/assets/images/logo/logo-sticky.png',  
                'mobile'    => get_template_directory_uri().'/assets/images/logo/logo-mobile.png',  
            ],
            // body typo
            'body' => [
                'bg'                => '#fff',
                'font-family'       => soapee_get_opts('body_font_typo',['font-family' => '\'futurabook\', sans-serif'])['font-family'],
                'font-size'         => soapee_get_opts('body_font_typo',['font-size' => '15px'])['font-size'],
                'font-weight'       => soapee_get_opts('body_font_typo',['font-weight' => '400'])['font-weight'],
                'font-color'        => soapee_get_opts('body_font_typo',['color' => '#444'])['color'],
                'line-height'       => soapee_get_opts('body_font_typo',['line-height' => '24px'])['line-height'],
                'letter-spacing'    => soapee_get_opts('body_font_typo',['letter-spacing' => '0px'])['letter-spacing'],
                'font-size-large'   => '17px',
                'font-size-medium'  => '16px',
                'font-size-small'   => '13px',
                'font-size-xsmall'  => '12px',
                'font-size-xxsmall' => '11px',
            ],
            // heading type
            'heading' => [
                // default
                'h1-size'          => '36px',
                'h2-size'          => '30px',
                'h3-size'          => '25px',
                'h4-size'          => '18px',
                'h5-size'          => '16px',
                'h6-size'          => '15px',
                'font-family'      => '\'google_sansbold\', sans-serif',
                'font-color'       => 'var(--primary-color)',
                'font-color-hover' => 'var(--accent-color)',
                'font-weight'      => 'normal',
                'line-height'      => 1.2,
                'letter-spacing'   => 0,
                // custom 
                'h1_typo'               => [
                    'font-family'       => soapee_get_opts('h1_typo',['font-family' => 'var(--heading-font-family)'])['font-family'],
                    'font-size'         => soapee_get_opts('h1_typo',['font-size' => 'var(--heading-h1-size)'])['font-size'],
                    'font-weight'       => soapee_get_opts('h1_typo',['font-weight' => 'var(--heading-font-weight)'])['font-weight'],
                    'font-color'        => soapee_get_opts('h1_typo',['color' => 'var(--heading-font-color)'])['color'],
                    'line-height'       => soapee_get_opts('h1_typo',['line-height' => 'var(--heading-line-height)'])['line-height'],
                    'letter-spacing'    => soapee_get_opts('h1_typo',['letter-spacing' => 'var(--heading-letter-spacing)'])['letter-spacing']
                ],
                'h2_typo'               => [
                    'font-family'       => soapee_get_opts('h2_typo',['font-family' => 'var(--heading-font-family)'])['font-family'],
                    'font-size'         => soapee_get_opts('h2_typo',['font-size' => 'var(--heading-h2-size)'])['font-size'],
                    'font-weight'       => soapee_get_opts('h2_typo',['font-weight' => 'var(--heading-font-weight)'])['font-weight'],
                    'font-color'        => soapee_get_opts('h2_typo',['color' => 'var(--heading-font-color)'])['color'],
                    'line-height'       => soapee_get_opts('h2_typo',['line-height' => 'var(--heading-line-height)'])['line-height'],
                    'letter-spacing'    => soapee_get_opts('h2_typo',['letter-spacing' => 'var(--heading-letter-spacing)'])['letter-spacing']
                ],
                'h3_typo'               => [
                    'font-family'       => soapee_get_opts('h3_typo',['font-family' => 'var(--heading-font-family)'])['font-family'],
                    'font-size'         => soapee_get_opts('h3_typo',['font-size' => 'var(--heading-h3-size)'])['font-size'],
                    'font-weight'       => soapee_get_opts('h3_typo',['font-weight' => 'var(--heading-font-weight)'])['font-weight'],
                    'font-color'        => soapee_get_opts('h3_typo',['color' => 'var(--heading-font-color)'])['color'],
                    'line-height'       => soapee_get_opts('h3_typo',['line-height' => 'var(--heading-line-height)'])['line-height'],
                    'letter-spacing'    => soapee_get_opts('h3_typo',['letter-spacing' => 'var(--heading-letter-spacing)'])['letter-spacing']
                ],
                'h4_typo'               => [
                    'font-family'       => soapee_get_opts('h4_typo',['font-family' => 'var(--heading-font-family)'])['font-family'],
                    'font-size'         => soapee_get_opts('h4_typo',['font-size' => 'var(--heading-h4-size)'])['font-size'],
                    'font-weight'       => soapee_get_opts('h4_typo',['font-weight' => 'var(--heading-font-weight)'])['font-weight'],
                    'font-color'        => soapee_get_opts('h4_typo',['color' => 'var(--heading-font-color)'])['color'],
                    'line-height'       => soapee_get_opts('h4_typo',['line-height' => 'var(--heading-line-height)'])['line-height'],
                    'letter-spacing'    => soapee_get_opts('h4_typo',['letter-spacing' => 'var(--heading-letter-spacing)'])['letter-spacing']
                ],
                'h5_typo'               => [
                    'font-family'       => soapee_get_opts('h5_typo',['font-family' => 'var(--heading-font-family)'])['font-family'],
                    'font-size'         => soapee_get_opts('h5_typo',['font-size' => 'var(--heading-h5-size)'])['font-size'],
                    'font-weight'       => soapee_get_opts('h5_typo',['font-weight' => 'var(--heading-font-weight)'])['font-weight'],
                    'font-color'        => soapee_get_opts('h5_typo',['color' => 'var(--heading-font-color)'])['color'],
                    'line-height'       => soapee_get_opts('h5_typo',['line-height' => 'var(--heading-line-height)'])['line-height'],
                    'letter-spacing'    => soapee_get_opts('h5_typo',['letter-spacing' => 'var(--heading-letter-spacing)'])['letter-spacing']
                ],
                'h6_typo'               => [
                    'font-family'       => soapee_get_opts('h6_typo',['font-family' => 'var(--heading-font-family)'])['font-family'],
                    'font-size'         => soapee_get_opts('h6_typo',['font-size' => 'var(--heading-h6-size)'])['font-size'],
                    'font-weight'       => soapee_get_opts('h6_typo',['font-weight' => 'var(--heading-font-weight)'])['font-weight'],
                    'font-color'        => soapee_get_opts('h6_typo',['color' => 'var(--heading-font-color)'])['color'],
                    'line-height'       => soapee_get_opts('h6_typo',['line-height' => '1.4667'])['line-height'],
                    'letter-spacing'    => soapee_get_opts('h6_typo',['letter-spacing' => 'var(--heading-letter-spacing)'])['letter-spacing']
                ]
            ],
            // meta 
            'meta' => [
                'font-family'           => 'var(--body-font-family)',
                'font-size'             => 'var(--body-font-size)',   
                'font-color'            => '#444',    
                'font-color-hover'      => 'var(--accent-color)',
                'font-weight'           => '400'
            ], 
            // button 
            'button' => [
                'font-family'       => soapee_get_opts('btn_typo',['font-family' => 'var(--heading-font-family)'])['font-family'],
                'font-size'         => soapee_get_opts('btn_typo',['font-size' => '13px'])['font-size'],
                'font-weight'       => soapee_get_opts('btn_typo',['font-weight' => 'normal'])['font-weight'],
                'font-color'        => soapee_get_opts('btn_typo',['color' => 'var(--primary-color)'])['color'],
                'line-height'       => soapee_get_opts('btn_typo',['line-height' => '1.8461'])['line-height'],
                'letter-spacing'    => soapee_get_opts('btn_typo',['letter-spacing' => '1px'])['letter-spacing']
            ],
            // border
            'border' => [
                'main'           => '1px solid #dad9de', 
                'main2'          => '2px solid #dad9de', 
                'main-color'     => '#dad9de'
            ],
            // shadow 
            'shadow' => [
                '1'  => '0px 1px 10px 0px rgba(22, 19, 87, 0.15)',
                '2'  => '0px 5px 13px 0px rgba(0, 0, 0, 0.2)',
                '3'  => '0px 2px 9.5px 0.5px rgba(22, 19, 87, 0.15)',
                '4'  => '0px 2px 30.4px 1.6px rgba(22, 19, 87, 0.3)',
                '5'  => '0px 8px 23.04px 0.96px rgba(22, 19, 87, 0.15)',
                '6'  => '0px 6px 18px 0px rgba(22, 19, 87, 0.3)',
                '7'  => '0px 4px 18px 0px rgba(22, 19, 87, 0.15)',
                '8'  => '0px 3px 39.99px 3.01px rgba(22, 19, 87, 0.2)',
                '9'  => '0px 5px 26.97px 2.03px rgba(22, 19, 87, 0.15)',
                '10' => '0px 6px 20.79px 0.21px rgba(22, 19, 87, 0.2)',
                '11' => '0px 0px 40.85px 2.15px rgba(0, 0, 0, 0.2)',
                '12' => '0px 14px 45.57px 3.43px rgba(22, 19, 87, 0.15)',
                '13' => '0px 1px 0px 0px rgba(191,191,191,.32)',  
                '14' => '0px 0px 25px 0px rgba(0,0,0,.1)',
                '15' => '0px 0px 11px 8px rgba(249, 249, 249, 1)'   
            ],
            // Gradient
            'gradient' => [
                '1' => '90deg, var(--primary-color) 0%, var(--blue2-color) 100%',
                '2' => '90deg, rgb(202,202,202) 0%, rgb(27,85,227) 0%, rgb(33,141,233) 100%'
            ],
            // thumbnail size
            'thumbnail' => [
                'large_size_w'                   => 770,
                'large_size_h'                   => 430,
                'medium_size_w'                  => 370,
                'medium_size_h'                  => 210,
                'medium_large_size_w'            => 570,
                'medium_large_size_h'            => 402,
                'thumbnail_size_w'               => 76,
                'thumbnail_size_h'               => 82,
                'post_thumbnail_size_w'          => 1170,
                'post_thumbnail_size_h'          => 650,    
            ],
            // comments
            'comment' => [
                'avatar-size'  => 65,
                'border'       => '1.5px solid var(--accent-color)',
                'radius'       => '50%' 
            ],                                   
            // Default Thumbnail
            // use placeholder image if post dont have feature image
            'default_post_thumbnail' => soapee_get_theme_opt('default_post_thumbnail', '0'), 
            // make post thumbnail as background of it
            'thumbnail_is_bg'        => soapee_get_theme_opt('thumbnail_is_bg', '0'),
            // Header 
            'header' => [
                'height' => '100px', // use for default header
                'width'  => '320px' // use for sidebar header
            ],
            // Menu
            'menu' => array_merge(
                ['bg'            => '#fff'],
                soapee_get_opts('main_menu_color', [
                    'regular' => 'var(--primary-color)',
                    'hover'   => 'var(--accent-color)',
                    'active'  => 'var(--accent-color)',
                ]),
                [
                    'font-family' => '\'google_sansmedium\', sans-serif',
                    'font-size'   => 'var(--body-font-size-large)',
                    'font-weight' => 'unset'
                ]
            ),
            // Menu Ontop Color
            'ontop' => array_merge(
                ['bg'            => 'transparent'],
                soapee_get_opts('ontop_menu_color', [
                    'regular' => '#fff',
                    'hover'   => 'var(--accent-color)',
                    'active'  => 'var(--accent-color)'
                ])
            ),
            // Menu Sticky Color
            'sticky' => array_merge(
                ['bg'            => '#fff'],
                soapee_get_opts('sticky_menu_color', [
                    'regular' => 'var(--primary-color)',
                    'hover'   => 'var(--accent-color)',
                    'active'  => 'var(--accent-color)'
                ])
            ),
            // Dropdown
            'dropdown' => array_merge(
                ['bg'            => '#f5f5f5'],
                soapee_get_opts('dropdown_menu_color', [
                    'regular' => 'var(--primary-color)',
                    'hover'   => 'var(--accent-color)',
                    'active'  => 'var(--accent-color)'
                ])
            ),
            // Page title
            'ptitle' => array_merge(
                soapee_get_opts('ptitle_bg', [
                    'background-image'      => 'none', //get_template_directory_uri().'/assets/images/ptitle-layout/bg.jpg',
                    'background-repeat'     => 'no-repeat',
                    'background-size'       => 'cover',
                    'background-attachment' => 'fixed',
                    'background-position'   => 'center center',
                    'background-color'      => 'var(--blue1-color)'
                ]),
                soapee_get_opts('ptitle_overlay_color', ['rgba' => 'rgba(18,29,58,0.5)']),
                ['text-color' => soapee_get_opts('ptitle_color', '#fff')],
                soapee_get_opts('ptitle_link_color', [
                    'regular' => 'var(--secondary-color)',
                    'hover'   => '#fff',
                    'acctive' => 'var(--accent-color)',
                ])
            ),
            // 404 page
            '404' => [
                'background' => soapee_get_opts('bg_404_page', [
                    'background-repeat'     => 'no-repeat',
                    'background-size'       => 'cover',
                    'background-attachment' => 'fixed',
                    'background-position'   => 'center center'
                ])
            ],
            // google font, ex: Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i
            'google_fonts'          => '',
            'content_width'         => 1170,          
            // WooCommerce,
            'soapee_product_single_image_w'          => '570',
            'soapee_product_single_image_h'          => '581',
            
            'soapee_product_loop_image_w'            => '370',
            'soapee_product_loop_image_h'            => '419',

            'soapee_product_gallery_layout'          => 'horizontal',
            'soapee_product_gallery_thumb_position'  => 'bottom',

            'soapee_product_gallery_thumbnail_w'     => '100',
            'soapee_product_gallery_thumbnail_h'     => '113',
            
            'soapee_product_gallery_thumbnail_v_w'   => '100',
            'soapee_product_gallery_thumbnail_v_h'   => '113',
            
            'soapee_product_gallery_thumbnail_h_w'   => '100',
            'soapee_product_gallery_thumbnail_h_h'   => '113',
            
            'soapee_product_gallery_thumbnail_space_vertical'   => '5',
            'soapee_product_gallery_thumbnail_space_horizontal' => '5',

            // API 
            'api' => [
                'google' => soapee_get_theme_opt('gm_api_key', 'AIzaSyC08_qdlXXCWiFNVj02d-L2BDK5qr6ZnfM')
            ]
        ];
        return $configs[$value];
    }
}



if ( ! function_exists( 'soapee_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
    add_action( 'after_setup_theme', 'soapee_setup' );
	function soapee_setup() {
		// Make theme available for translation.
		load_theme_textdomain( 'soapee', get_template_directory() . '/languages' );

		// Custom Header
		add_theme_support( "custom-header" );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		/*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );
        // Set post thumbnail size.
        set_post_thumbnail_size( soapee_configs('thumbnail')['post_thumbnail_size_w'], soapee_configs('thumbnail')['post_thumbnail_size_h'] );
        // Add custom image size used in Cover Template.
        add_image_size( 'soapee_medium_large', soapee_configs('thumbnail')['medium_large_size_w'], soapee_configs('thumbnail')['medium_large_size_h'], true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Soapee Primary', 'soapee' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form', 
			'comment-form',
			'comment-list',
            'navigation-widgets',
			'gallery',
			'caption',
            'script',
            'style'
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'soapee_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for core custom logo.
		add_theme_support( 'custom-logo', array(
			'height'      => soapee_configs('logo')['width'],
			'width'       => soapee_configs('logo')['height'],
			'flex-width'  => true,
			'flex-height' => true,
		) );
		add_theme_support( 'post-formats', array(
			'gallery',
			'video',
		) );
        // Enable support for WooCommerce.
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}
}
/* Display Custom Image Sizes */
if(!function_exists('soapee_custom_sizes')){
    add_filter('image_size_names_choose','soapee_custom_sizes');
    function soapee_custom_sizes($sizes){
        return array_merge($sizes, array(
            'soapee_medium_large' => esc_html__('Medium Large', 'soapee')
        ));
    }
}

if(!function_exists('soapee_update')){
    add_action('after_switch_theme', 'soapee_update');
    function soapee_update(){
        /* Change default image thumbnail sizes in wordpress */
        $thumbnail_size = array(
            'large_size_w'        => soapee_configs('thumbnail')['large_size_w'],
            'large_size_h'        => soapee_configs('thumbnail')['large_size_h'],
            'large_crop'          => 1, 
            'medium_large_size_w' => soapee_configs('thumbnail')['medium_large_size_w'],
            'medium_large_size_h' => soapee_configs('thumbnail')['medium_large_size_h'],
            'medium_large_crop'   => 1, 
            'medium_size_w'       => soapee_configs('thumbnail')['medium_size_w'],
            'medium_size_h'       => soapee_configs('thumbnail')['medium_size_h'],
            'medium_crop'         => 1, 
            'thumbnail_size_w'    => soapee_configs('thumbnail')['thumbnail_size_w'],
            'thumbnail_size_h'    => soapee_configs('thumbnail')['thumbnail_size_h'],
            'thumbnail_crop'      => 1,
        );
        foreach ($thumbnail_size as $option => $value) {
            if (get_option($option, '') != $value)
                update_option($option, $value);
        }
    }
}
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 */
// Set up the content width value based on the theme's design and stylesheet.
if(!function_exists('soapee_content_width')){
    add_action('after_setup_theme', 'soapee_content_width', 0);
    if (!isset($content_width))
        $content_width = apply_filters('soapee_content_width', soapee_configs('content_width'));
    function soapee_content_width()
    {
        $GLOBALS['content_width'] = apply_filters('soapee_content_width', soapee_configs('content_width'));
    }
}

// Add new menu Locations
add_action( 'cms_locations', function ( $cms_locations ) {
//    $cms_locations['cms-test'] ='Test Menu';
	return $cms_locations;
} );
/**
 * Register widget area.
 */
if(!function_exists('soapee_widgets_init')){
    add_action( 'widgets_init', 'soapee_widgets_init' );
    function soapee_widgets_init() {
        if(class_exists('Elementor_Theme_Core')){
            $all_post_type = soapee_all_post_types();
            foreach ($all_post_type as $key => $value) {
                register_sidebar( array(
                    'name'          => sprintf( esc_html__( '%s Sidebar', 'soapee' ), $value ),
                    'id'            => 'sidebar-'.$key,
                    'description'   => sprintf(esc_html__( 'Add widgets here to show in %1$s archive page and single %2$s page', 'soapee' ), strtoupper(str_replace('-', ' ', $key)), $value),
                    'title_class'   => 'text-capitalize'
                ) );
            }
            // Hidden sidebar
            register_sidebar( array(
                'name'          => esc_html__( 'Hidden Sidebar', 'soapee' ),
                'id'            => 'sidebar-hidden',
                'description'   => esc_html__( 'Add widgets here.', 'soapee' ),
                'title_class'   => 'text-capitalize'
            ) );
            // Footer Top
            $footer_top_column = soapee_get_opts( 'footer_top_column', '4' );
            if ( isset( $footer_top_column ) && $footer_top_column ) {
                for ( $i = 1; $i <= $footer_top_column; $i ++ ) {
                    register_sidebar( array(
                        'name'          => sprintf( esc_html__( 'Footer Top %s', 'soapee' ), $i ),
                        'id'            => 'sidebar-footer-' . $i,
                        'description'   => esc_html__( 'Add widgets here.', 'soapee' ),
                        'before_widget' => '<div id="%1$s" class="cms-widget %2$s"><div class="cms-widget-inner">',
                        'after_widget'  => '</div></div>',
                        'before_title'  => '<div class="cms-widget-title h3 text-white text-hover-white pb-8 mb-8">',
                        'after_title'   => '</div>',
                        'title_class'   => 'footer-widget-title'
                    ) );
                }
            }
            // Footer Middle
            $footer_middle_column = soapee_get_opts( 'footer_middle_column', '4' );
            if ( isset( $footer_middle_column ) && $footer_middle_column ) {
                for ( $i = 1; $i <= $footer_middle_column; $i ++ ) {
                    register_sidebar( array(
                        'name'          => sprintf( esc_html__( 'Footer Middle %s', 'soapee' ), $i ),
                        'id'            => 'sidebar-footer-middle-' . $i,
                        'description'   => esc_html__( 'Add widgets here.', 'soapee' ),
                        'before_widget' => '<div id="%1$s" class="cms-widget %2$s"><div class="cms-widget-inner">',
                        'after_widget'  => '</div></div>',
                        'before_title'  => '<div class="cms-widget-title h3 text-white text-hover-white pb-8 mb-8">',
                        'after_title'   => '</div>',
                        'title_class'   => 'footer-middle-widget-title'
                    ) );
                }
            }
            // Footer Bottom
            register_sidebar( array(
                'name'          => esc_html__( 'Footer Bottom', 'soapee' ),
                'id'            => 'sidebar-footer-bottom',
                'description'   => esc_html__( 'Add widgets here.', 'soapee' ),
                'before_widget' => '<div id="%1$s" class="cms-widget %2$s"><div class="cms-widget-inner">',
                'after_widget'  => '</div></div>',
                'before_title'  => '<div class="cms-widget-title h3 text-white text-hover-white pb-8 mb-8">',
                'after_title'   => '</div>',
                'title_class'   => 'footer-bottom-widget-title'
            ) );
        } else {
            register_sidebar( array(
                'name'          => esc_html__( 'Blog Widgets', 'soapee' ),
                'id'            => 'sidebar-post',
                'description'   => esc_html__( 'Add widgets here to show on blog/archives/single post page', 'soapee' ),
                'title_class'   => 'text-uppercase'
            ) );
        }
    }
}
/**
 * Change default widget title structure
*/
if(!function_exists('soapee_widgets_output_structure')){
    add_filter('widget_display_callback', 'soapee_widgets_output_structure', 10, 3);
    add_filter('register_sidebar_defaults', 'soapee_widgets_output_structure', 10, 3);
    add_filter('elementor/widgets/wordpress/widget_args', 'soapee_widgets_output_structure', 10, 3);
    function soapee_widgets_output_structure($args){
        $widget_title_tag = 'h3';
        $title_class = [
            'cms-widget-title text-20',
            'bdr-b-1 bdr-b-solid bdr-grey6',
            'bg-grey4',
            'p-tb-18 p-lr-20',
            isset($args['title_class']) ? $args['title_class'] : ''
        ];
        $title_class = apply_filters('cms_widget_title_class', $title_class);
        
        $args['before_widget'] = '<div id="%1$s" class="cms-widget %2$s"><div class="cms-widget-inner bdr-1 bdr-solid bdr-grey6 bdr-radius-15">';
        $args['after_widget']  = '</div></div></div>';

        $args['before_title']  = '<'.$widget_title_tag.' class="'.trim(implode(' ', $title_class)).'">';
        $args['after_title']   = '</'.$widget_title_tag.'><div class="cms-widget-content">';
        return $args;
    }
}



/**
 * Enqueue scripts and styles.
 */
function soapee_scripts() {
	$theme = wp_get_theme( get_template() );
    $min = soapee_get_opt('dev_mode', '0') === '0' ? '.min' : '';
    // google font
    if(!empty(soapee_configs('google_fonts'))){
        wp_enqueue_style( 'soapee-google-fonts', soapee_fonts_url() );
    }
    // awesome icon font 
	wp_enqueue_style( 'font-awesome-all', get_template_directory_uri() . '/assets/fonts/awesome/css/all.min.css', array(), '5.14.0' );
    // material-design-iconic-font
    wp_enqueue_style( 'material-design-iconic-font', get_template_directory_uri() . '/assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css', array(), '2.2.0' );
    //icofont
    wp_enqueue_style( 'icofont', get_template_directory_uri() . '/assets/fonts/icofont/icofont'.$min.'.css', array(), '1.0.1' );
    //iconmoon font
    wp_register_style( 'font-icomoon', get_template_directory_uri() . '/assets/fonts/icomoon/css/font-icomoon.css', array(), '1.0.1' );
    // local font 
    if(soapee_get_opts('body_typo', 'default') === 'default'){
        wp_enqueue_style( 'soapee-default-font', get_template_directory_uri() . '/assets/fonts/futura/stylesheet.css', array(), $theme->get( 'Version' ) );
    }
    if(soapee_get_opts('heading_font_typo', 'default') === 'default'){
        wp_enqueue_style( 'soapee-default-heading-font', get_template_directory_uri() . '/assets/fonts/Google-Sans/stylesheet.css', array(), $theme->get( 'Version' ) );
    }
    // theme style
    wp_enqueue_style( 'soapee', get_template_directory_uri() . '/assets/css/theme'.$min.'.css', array(), $theme->get( 'Version' ) );
    wp_add_inline_style( 'soapee', soapee_inline_styles() );
    // WP Comment
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    // magnific-popup
    wp_register_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/magnific-popup.min.js', array( 'jquery' ), '1.0.0', true );
    wp_register_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), '1.0.0' );
    // smoothscroll
    $smoothscroll = soapee_get_opt( 'smoothscroll', false );
    if ( isset( $smoothscroll ) && $smoothscroll ) {
        wp_enqueue_script( 'smoothscroll', get_template_directory_uri() . '/assets/js/smoothscroll.min.js', array( 'jquery' ), 'all', true );
    }
    // sidebar fixed on scroll
    wp_register_script( 'soapee-sidebar-fixed', get_template_directory_uri() . '/assets/js/sidebar-scroll-fixed.js', array( 'jquery' ), '1.0.0', true );
    // Slick Slider 
    wp_register_script( 'jquery-slick', get_template_directory_uri() . '/assets/js/slick/slick.min.js', array( 'jquery' ), '1.8.1', true );
    // Theme JS
	wp_enqueue_script( 'soapee', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), $theme->get( 'Version' ), true );
	wp_localize_script( 'soapee', 'main_data', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

    /*
     * Elementor Widget JS
     */
    // Counter Widget
    wp_register_script( 'cms-counter-widget-js', get_template_directory_uri() . '/elementor/js/cms-counter-widget.js', [ 'jquery' ], $theme->get( 'Version' ) );
    // Progress Bar Widget
    wp_register_script( 'cms-progressbar-widget-js', get_template_directory_uri() . '/elementor/js/cms-progressbar-widget.js', [ 'jquery' ], $theme->get( 'Version' ) );
    // Pie Charts Widget
    wp_register_script( 'cms-piecharts-widget-js', get_template_directory_uri() . '/elementor/js/cms-piecharts-widget.js', [ 'jquery' ], $theme->get( 'Version' ) );
    // Google Maps Widget
    $api = soapee_configs('api')['google'];
    $api_js = "https://maps.googleapis.com/maps/api/js?&key=".$api;
    wp_register_script('maps-googleapis', $api_js, [], date("Ymd"));
    wp_register_script('custom-gm-widget-js', get_template_directory_uri() . '/elementor/js/custom-gm-widget.js', ['maps-googleapis', 'jquery'], $theme->get( 'Version' ), true);    
    wp_register_script('cms-toggle-widget-js', get_template_directory_uri() . '/elementor/js/cms-toggle-widget.js', [ 'jquery' ], $theme->get( 'Version' ), true);
    wp_register_script('cms-accordion-widget-js', get_template_directory_uri() . '/elementor/js/cms-accordion-widget.js', [ 'jquery' ], $theme->get( 'Version' ), true);
    wp_register_script('cms-alert-widget-js', get_template_directory_uri() . '/elementor/js/cms-alert-widget.js', [ 'jquery' ], $theme->get( 'Version' ), true);
    wp_register_script('cms-tabs-widget-js', get_template_directory_uri() . '/elementor/js/cms-tabs-widget.js', [ 'jquery' ], $theme->get( 'Version' ), true);
    
    wp_register_script('cms-slick-slider', get_template_directory_uri() . '/elementor/js/cms-slick-slider.js', [ 'jquery' ], $theme->get( 'Version' ), true);
    wp_register_script('cms-masonry', get_template_directory_uri() . '/elementor/js/cms-masonry.js', [ 'jquery' ], $theme->get( 'Version' ), true);
    wp_register_script('cms-countdown', get_template_directory_uri() . '/elementor/js/cms-countdown.js', [ 'jquery' ], $theme->get( 'Version' ), true);
    wp_enqueue_script('soapee-elementor-custom-js', get_template_directory_uri() . '/assets/js/elementor-custom.js', [ 'jquery' ], $theme->get( 'Version' ), true);
}
add_action( 'wp_enqueue_scripts', 'soapee_scripts' );

/* add editor styles */
//add_action( 'admin_init', 'soapee_add_editor_styles' );
function soapee_add_editor_styles() {
	add_editor_style( 'editor-style.css' );
}

/* add admin styles */
if(!function_exists('soapee_admin_style')){
    add_action( 'admin_enqueue_scripts', 'soapee_admin_style' );
    function soapee_admin_style() {
    	$theme = wp_get_theme( get_template() );
    	wp_enqueue_style( 'soapee-admin-style', get_template_directory_uri() . '/assets/css/admin.css' );
        if(soapee_get_opts('body_typo', 'default') === 'default'){
            wp_enqueue_style( 'soapee-default-font', get_template_directory_uri() . '/assets/fonts/futura/stylesheet.css', array(), $theme->get( 'Version' ) );
        }
        if(soapee_get_opts('heading_font_typo', 'default') === 'default'){
            wp_enqueue_style( 'soapee-default-heading-font', get_template_directory_uri() . '/assets/fonts/Google-Sans/stylesheet.css', array(), $theme->get( 'Version' ) );
        }
    }
}

/**
 * Register Google Fonts
 *
 * https://gist.github.com/kailoon/e2dc2a04a8bd5034682c
 * https://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/
 *
*/
if(!function_exists('soapee_fonts_url')){
    function soapee_fonts_url() {
        if(empty(soapee_configs('google_fonts'))) return;
        $font_url = add_query_arg( 
            'family', 
            urlencode(soapee_configs('google_fonts')), 
            "//fonts.googleapis.com/css"
        );
        return $font_url;
    }
}

if(!function_exists('soapee_inline_styles')){
    function soapee_inline_styles() {
        ob_start();
        // CSS Variable
        $theme_colors = soapee_configs('theme_colors');
        $link_color   = soapee_configs('link_color');
        $body         = soapee_configs('body');
        $logo         = soapee_configs('logo');
        $header       = soapee_configs('header');
        $menu         = soapee_configs('menu');
        $ontop        = soapee_configs('ontop');
        $sticky       = soapee_configs('sticky');
        $dropdown     = soapee_configs('dropdown');
        $ptitle       = soapee_configs('ptitle');
        $heading      = soapee_configs('heading');
        $meta         = soapee_configs('meta');
        $border       = soapee_configs('border');
        $comment      = soapee_configs('comment');
        unset($ptitle['media']);
        //var_dump($dropdown); die();
        echo ':root{';
            foreach ($logo as $key => $value) {
                printf('--logo-%1$s:%2$s;', $key, $value)."\n";
            }
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color: %2$s;', $color, $value)."\n";
            }
            foreach ($link_color as $color => $value) {
                printf('--link-%1$s-color: %2$s;', $color, $value)."\n";
            }
            foreach ($body as $key => $value) {
                printf('--body-%1$s: %2$s;', $key, $value)."\n";
            }
            foreach ($header as $key => $value) {
                printf('--header-%1$s: %2$s;', $key, $value)."\n";
            }
            foreach ($menu as $key => $value) {
                printf('--menu-%1$s: %2$s;', $key, $value)."\n";
            }
            foreach ($ontop as $key => $value) {
                printf('--ontop-%1$s: %2$s;', $key, $value)."\n";
            }
            foreach ($sticky as $key => $value) {
                printf('--sticky-%1$s: %2$s;', $key, $value)."\n";
            }
            foreach ($dropdown as $key => $value) {
                printf('--dropdown-%1$s: %2$s;', $key, $value)."\n";
            }
            foreach ($ptitle as $key => $value) {
                if($key === 'background-image') $value = 'url('.$value.')';
                printf('--ptitle-%1$s: %2$s;', $key, $value)."\n";
            }
            foreach ($heading as $key => $value) {
                if(!is_array($value)){
                    printf('--heading-%1$s: %2$s;', $key, $value)."\n";
                } else {
                    foreach ($value as $_key => $_value) {
                        printf('--heading-%3$s-%1$s: %2$s;', $_key, $_value, str_replace('_', '-', $key))."\n";
                    }
                }
            }
            foreach ($meta as $key => $value) {
                printf('--meta-%1$s: %2$s;', $key, $value)."\n";
            }
            foreach ($border as $key => $value) {
                printf('--border-%1$s: %2$s;', $key, $value)."\n";
            }
            foreach ($comment as $key => $value) {
                printf('--comment-%1$s: %2$s;', $key, $value)."\n";
            }
        echo '}';
        return ob_get_clean();
    }
}

/**
 * Remove all Font Awesome from 3rd extension 
 * to use only font-awesome latest from our theme
 * //'font-awesome',
 * //'gglcptch',
*/
add_filter('etc_remove_styles', 'soapee_remove_styles');
function soapee_remove_styles($styles){
    $_styles = [
        'newsletter',
        'woocommerce-smallscreen'
    ];
    $styles = array_merge($styles, $_styles);
    return $styles;
}

add_action( 'wp_enqueue_scripts', 'etc_remove_styles', 999 );
add_action( 'wp_footer', 'etc_remove_styles', 999 );
add_action( 'wp_header', 'etc_remove_styles', 999 );
function etc_remove_styles() {
    $default = [ 'font-awesome', 'gglcptch' ];
    $styles  = apply_filters( 'etc_remove_styles', $default );
    foreach ( $styles as $style ) {
        wp_dequeue_style( $style );
        wp_deregister_style( $style );
    }
}

/**
 * Incudes file
 *
*/
soapee_require_folder('inc/classes');
soapee_require_folder('inc/theme-options');

/**
 * Additional widgets for the theme
 */
soapee_require_folder('widgets');
/**
 * Custom post type
*/
soapee_require_folder('inc/custom-post');
/**
 * Elementor
*/
soapee_require_folder('inc/elementor');
/**
 *  Woocommerce
 */
if(class_exists('Woocommerce')){
    soapee_require_folder('woocommerce');
}
/**
 * other extensions
*/
soapee_require_folder('inc/extensions');
/**
 * IcoFont Icon Font
*/
soapee_require_folder('assets/fonts/icofont');
/**
 * IcoMoon Icon Font
*/
soapee_require_folder('assets/fonts/icomoon');
/**
 * Material Design Icon Font
*/
soapee_require_folder('assets/fonts/material-design-iconic-font');
