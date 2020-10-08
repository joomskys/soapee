<?php
/**
 * Get Page List 
 * @return array
*/
if(!function_exists('soapee_elementor_list_page_opts')){
    function soapee_elementor_list_page_opts($default = []){
        $page_list = array();
        if(!empty($default))
            $page_list[$default['value']] = $default['label'];
        $pages = get_pages(array('hierarchical' => 0, 'posts_per_page' => '-1'));
        foreach($pages as $page){
            $page_list[$page->post_name] = $page->post_title;
        }
        return $page_list;
    }
}

/**
 * Term option for post type
 * make option for elementor element option
*/
if(!function_exists('etc_get_grid_term_by_post_type_options')){
    function etc_get_grid_term_by_post_type_options($args=[]){
        $args = wp_parse_args($args, ['condition' => 'post_type']);
        $post_types = get_post_types([
            'public'   => true,
            //'_builtin' => false
        ], 'objects');
        $DefaultExcludedPostTypes = [
            'page',
            'attachment',
            'revision',
            'nav_menu_item',
            'vc_grid_item',
            'custom_css',
            'customize_changeset',
            'oembed_cache',
            'cms-mega-menu',
            'elementor_library',
        ];
        $ExtraExcludedPostTypes = apply_filters('etc_get_post_types', []);
        $excludedPostTypes      = array_merge($DefaultExcludedPostTypes, $ExtraExcludedPostTypes );

        $result = [];
        if (!is_array($post_types))
            return $result;
        foreach ($post_types as $post_type) {
            if (!$post_type instanceof WP_Post_Type)
                continue;
            if (in_array($post_type->name, $excludedPostTypes))
                continue;
            $result[] = array(
                'name'     => 'source_'.$post_type->name,
                'label'    => sprintf(esc_html__( 'Select Term of %s', 'soapee' ), $post_type->labels->singular_name),
                'type'     => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => etc_get_grid_term_options($post_type->name),
                'condition' => [
                    $args['condition'] => [$post_type->name]
                ]
            );
        }
  
        return $result;
    }
}
/**
 * Extra Elementor Icons
*/
if(!function_exists('soapee_register_custom_icon_library')){
    add_filter('elementor/icons_manager/native', 'soapee_register_custom_icon_library');
    function soapee_register_custom_icon_library($tabs){
        $custom_tabs = [
            'icofont_icon' => [
                'name'          => 'iconfont',
                'label'         => esc_html__( 'IcoFont', 'soapee' ),
                'url'           => get_template_directory_uri() . '/assets/fonts/icofont/icofont.min.css',
                'enqueue'       => [],
                'prefix'        => '',
                'displayPrefix' => 'icofont',
                'labelIcon'     => 'icofont icofont-angry-monster',
                'ver'           => '1.0.0',
                'fetchJson'     => get_template_directory_uri() . '/assets/fonts/icofont/icofont.js',
                'native'        => true,
            ],
            'icomoon_icon' => [
                'name'          => 'iconmoon',
                'label'         => esc_html__( 'IconMoon', 'soapee' ),
                'url'           => get_template_directory_uri() . '/assets/fonts/icomoon/css/font-icomoon.css',
                'enqueue'       => [],
                'prefix'        => '',
                'displayPrefix' => '',
                'labelIcon'     => 'iconmoon-buildings',
                'ver'           => '1.0.0',
                'fetchJson'     => get_template_directory_uri() . '/assets/fonts/icomoon/icomoon.js',
                'native'        => true,
            ],
            'material_design_icon' => [
                'name'          => 'material_design',
                'label'         => esc_html__( 'Material Design', 'soapee' ),
                'url'           => get_template_directory_uri() . '/assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css',
                'enqueue'       => [],
                'prefix'        => 'zmdi ',
                'displayPrefix' => '',
                'labelIcon'     => 'zmdi zmdi-3d-rotation',
                'ver'           => '1.0.0',
                'fetchJson'     => get_template_directory_uri() . '/assets/fonts/material-design-iconic-font/material-design-iconic-font.js',
                'native'        => true,
            ]
        ];
        $tabs = array_merge($custom_tabs, $tabs);
        return $tabs;
    }
}
if(!function_exists('soapee_elementor_post_layout')){
    function soapee_elementor_post_layout(){
        return [
            '1' => [
                'label' => esc_html__( 'Layout 1', 'soapee' ),
                'image' => get_template_directory_uri() . '/elementor/templates/layouts/posts/layout1.png'
            ],
            '2' => [
                'label' => esc_html__( 'Layout 2', 'soapee' ),
                'image' => get_template_directory_uri() . '/elementor/templates/layouts/posts/layout2.png'
            ],
            '3' => [
                'label' => esc_html__( 'Layout 3', 'soapee' ),
                'image' => get_template_directory_uri() . '/elementor/templates/layouts/posts/layout3.png'
            ],
            '4' => [
                'label' => esc_html__( 'Layout 4', 'soapee' ),
                'image' => get_template_directory_uri() . '/elementor/templates/layouts/posts/layout4.png'
            ],
            '5' => [
                'label' => esc_html__( 'Layout 5', 'soapee' ),
                'image' => get_template_directory_uri() . '/elementor/templates/layouts/posts/layout5.png'
            ],
            '6' => [
                'label' => esc_html__( 'Layout 6', 'soapee' ),
                'image' => get_template_directory_uri() . '/elementor/templates/layouts/posts/layout6.png'
            ]
        ];
    }
}
if(!function_exists('soapee_elementor_layout_mode_settings')){
    function soapee_elementor_layout_mode_settings($args = []){
        $args = wp_parse_args($args, [
            'tab'       => \Elementor\Controls_Manager::TAB_LAYOUT,
            'condition' => []
        ]);
        $slides_to_show = range( 1, 10 );
        $slides_to_show = array_combine( $slides_to_show, $slides_to_show );
        return array(
            'name'     => 'section_layout_mode_settings',
            'label'    => esc_html__('Layout Mode Settings', 'soapee'),
            'tab'      => $args['tab'],
            'controls' => array(
                array(
                    'name'    => 'layout_mode',
                    'label'   => esc_html__('Layout Mode', 'soapee'),
                    'type'    => \Elementor\Controls_Manager::SELECT,
                    'default' => 'grid',
                    'options' => [
                        'grid'     => esc_html__('Grid', 'soapee'),
                        'masonry'  => esc_html__('Masonry', 'soapee'),
                        'carousel' => esc_html__('Carousel', 'soapee'),
                    ]
                ),
                array(
                    'name'         => 'gap',
                    'label'        => esc_html__( 'Item Gap', 'soapee' ),
                    'type'         => \Elementor\Controls_Manager::NUMBER,
                    'control_type' => 'responsive',
                    'default'      => 30,
                ),
                array(
                    'name'         => 'gap_extra',
                    'label'        => esc_html__( 'Extra Gap Bottom', 'soapee' ),
                    'description'  => esc_html__( 'Add extra space at bottom of each items','soapee'),
                    'type'         => \Elementor\Controls_Manager::NUMBER,
                )
            )
        );
    }
}

if(!function_exists('soapee_elementor_layout_mode_settings_render_attrs')){
    function soapee_elementor_layout_mode_settings_render_attrs($widget, $settings, $args = []){
        $args = wp_parse_args($args,[
            'post_type' => 'post',
            'class'     => ''
        ]);
        $html_id   = etc_get_element_id($settings);
        extract(etc_get_posts_of_grid($args['post_type'], [
            'source'   => $widget->get_setting('source', ''),
            'orderby'  => $widget->get_setting('orderby', 'date'),
            'order'    => $widget->get_setting('order', 'desc'),
            'limit'    => $widget->get_setting('limit', 6),
            'post_ids' => $widget->get_setting('post_ids', ''),
        ]));

        $widget->add_render_attribute( 'wrapper', [
            'id'              => $html_id,
            'class'           => $args['class'],
            'data-mode'       => $settings['layout_mode'],
            'data-layout'     => $settings['layout_type'],
            'data-start-page' => $paged,
            'data-max-pages'  => $max,
            'data-total'      => $total,
            'data-perpage'    => $widget->get_setting('limit', 6),
            'data-next-link'  => $next_link
        ]);
        etc_print_html($widget->get_render_attribute_string( 'wrapper' ));
    }
}

if(!function_exists('soapee_elementor_slick_slider_settings')){
    function soapee_elementor_slick_slider_settings($args = []){
        $args = wp_parse_args($args, [
            'tab'       => \Elementor\Controls_Manager::TAB_LAYOUT,
            'condition' => []
        ]);
        $slides_to_show = range( 1, 10 );
        $slides_to_show = array_combine( $slides_to_show, $slides_to_show );
        return array(
            'name'     => 'section_slick_slider_settings',
            'label'    => esc_html__('Carousel Settings', 'soapee'),
            'tab'      => $args['tab'],
            'controls' => array(
                array(
                    'name' => 'slide_rows',
                    'label' => esc_html__('Rows', 'soapee'),
                    'description' => esc_html__('Setting this to more than 1 initializes grid mode. Use slidesPerRow to set how many slides should be in each row.', 'soapee'),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4'
                    ],
                    'control_type' => 'responsive',
                    'default'      => '1',
                ),
                array(
                    'name' => 'slide_mode',
                    'label' => esc_html__('Slide mode', 'soapee'),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        'true' => esc_html__('Fade', 'soapee'),
                        'false' => esc_html__('Slide', 'soapee'),
                    ],
                    'default' => 'false',
                ),
                array(
                    'name'         => 'slides_to_show',
                    'label'        => esc_html__('Slides to Show', 'soapee'),
                    'type'         => \Elementor\Controls_Manager::SELECT,
                    'control_type' => 'responsive',
                    'default'      => '',
                    'options'      => [
                            '' => esc_html__('Default', 'soapee' ),
                        ] + $slides_to_show,
                    'condition' => [
                        'slide_mode' => 'false'
                    ]
                ),
                array(
                    'name'         => 'slides_to_scroll',
                    'label'        => esc_html__('Slides to Scroll', 'soapee'),
                    'type'         => \Elementor\Controls_Manager::SELECT,
                    'control_type' => 'responsive',
                    'default'      => '',
                    'options'      => [
                            '' => esc_html__('Default', 'soapee' ),
                        ] + $slides_to_show,
                    'condition' => [
                        'slide_mode'      => 'false',
                        'slides_to_show!' => '1',
                    ],
                ),
                array(
                    'name'         => 'slides_gutter',
                    'label'        => esc_html__('Gutter', 'soapee'),
                    'type'         => \Elementor\Controls_Manager::NUMBER,
                    'default'      => 30,
                ),
                array(
                    'name'         => 'arrows',
                    'label'        => esc_html__('Show Arrows', 'soapee'),
                    'type'         => \Elementor\Controls_Manager::SWITCHER,
                    'control_type' => 'responsive',
                ),
                array(
                    'name'         => 'arrows_pos',
                    'label'        => esc_html__('Arrows Position', 'soapee'),
                    'type'         => \Elementor\Controls_Manager::SELECT,
                    'control_type' => 'responsive',
                    'default'      => 'in-vertical',
                    'options'      => [
                        'in-vertical'    => esc_html__('Inside Vertical','soapee'),
                        'out-vertical'    => esc_html__('Outside Vertical','soapee')
                    ],
                    'condition' => [
                        'arrows'   => 'true'
                    ],
                    'prefix_class' => 'cms-slick-nav-',
                    'separator'    => 'before',
                ),
                array(
                    'name'         => 'dots',
                    'label'        => esc_html__('Show Dots', 'soapee'),
                    'type'         => \Elementor\Controls_Manager::SWITCHER,
                    'control_type' => 'responsive',
                    'default'      => 'true'
                ),
                array(
                    'name'         => 'dots_pos',
                    'label'        => esc_html__('Dots Position', 'soapee'),
                    'type'         => \Elementor\Controls_Manager::SELECT,
                    'control_type' => 'responsive',
                    'default'      => 'out',
                    'options'      => [
                        'in'  => esc_html__('Inside','soapee'),
                        'out' => esc_html__('Outside','soapee')
                    ],
                    'condition' => [
                        'dots'   => 'true'
                    ],
                    'prefix_class' => 'cms-slick-dots-',
                    'separator'    => 'before',
                ),
                array(
                    'name'  => 'pause_on_hover',
                    'label' => esc_html__('Pause on Hover', 'soapee'),
                    'type'  => \Elementor\Controls_Manager::SWITCHER,
                ),
                array(
                    'name'    => 'autoplay',
                    'label'   => esc_html__('Autoplay', 'soapee'),
                    'type'    => \Elementor\Controls_Manager::SWITCHER,
                    'default' => 'true'
                ),
                array(
                    'name'      => 'autoplay_speed',
                    'label'     => esc_html__('Autoplay Speed', 'soapee'),
                    'type'      => \Elementor\Controls_Manager::NUMBER,
                    'default'   => 2000,
                    'condition' => [
                        'autoplay' => 'true'
                    ]
                ),
                array(
                    'name'  => 'infinite',
                    'label' => esc_html__('Infinite Loop', 'soapee'),
                    'type'  => \Elementor\Controls_Manager::SWITCHER,
                ),
                array(
                    'name'    => 'speed',
                    'label'   => esc_html__('Animation Speed', 'soapee'),
                    'type'    => \Elementor\Controls_Manager::NUMBER,
                    'default' => 500,
                ),
            ),
            'condition' => $args['condition']
        );
    }
}

if(!function_exists('soapee_slick_slider_settings')){
    function soapee_slick_slider_settings($widget, $class=''){
        $layout_mode = $widget->get_setting('layout_mode', 'carousel');
        if($layout_mode != 'carousel') return;

        $slide_mode              = $widget->get_setting('slide_mode', 'false');
        $slide_rows              = $widget->get_setting('slide_rows', '1');
        $slides_to_show          = $widget->get_setting('slides_to_show', '3');
        $slides_to_show_tablet   = $widget->get_setting('slides_to_show_tablet', '2');
        $slides_to_show_mobile   = $widget->get_setting('slides_to_show_mobile', '1');
        $slides_to_scroll        = $widget->get_setting('slides_to_scroll', '3');
        $slides_to_scroll_tablet = $widget->get_setting('slides_to_scroll_tablet', '2');
        $slides_to_scroll_mobile = $widget->get_setting('slides_to_scroll_mobile', '1');

        $slideRows =  !empty($slide_rows) ? $slide_rows : 1;
        $slideRowsTablet = !empty($slide_rows_tablet) ? $slide_rows_tablet : $slideRows;
        $slideRowsMobile = !empty($slide_rows_mobile) ? $slide_rows_mobile : $slideRows;

        if($slide_mode == 'true'){
            $slidesToShow = $slidesToShowTablet = $slidesToShowMobile = $slidesToScroll = $slidesToScrollTablet = $slidesToScrollMobile = 1;
        } else {
            if(1 === (int)$slides_to_show){
                $slidesToShow = $slidesToShowTablet = $slidesToShowMobile = $slidesToScroll = $slidesToScrollTablet = $slidesToScrollMobile = 1;
            } else {
                $slidesToShow       = !empty($slides_to_show)?$slides_to_show:3;
                $slidesToShowTablet = !empty($slides_to_show_tablet)?$slides_to_show_tablet:2;
                $slidesToShowMobile = !empty($slides_to_show_mobile)?$slides_to_show_mobile:1;

                $slidesToScroll = !empty($slides_to_scroll)?$slides_to_scroll:3;
                $slidesToScrollTablet = !empty($slides_to_scroll_tablet)?$slides_to_scroll_tablet:2;
                $slidesToScrollMobile = !empty($slides_to_scroll_mobile)?$slides_to_scroll_mobile:1;
            }
        }

        $slides_gutter  = (int) $widget->get_setting('slides_gutter', '30')/2;
        $arrows         = $widget->get_setting('arrows');
        $arrows_tablet  = $widget->get_setting('arrows_tablet', 'false');
        $arrows_mobile  = $widget->get_setting('arrows_mobile', 'false');
        $arrows_pos     = $widget->get_setting('arrows_pos','in-vertical');
        $dots           = $widget->get_setting('dots');
        $dots_tablet    = $widget->get_setting('dots_table', 'true');
        $dots_mobile    = $widget->get_setting('dots_mobile', 'true');
        $dots_pos       = $widget->get_setting('dots_pos','out');
        $pause_on_hover = $widget->get_setting('pause_on_hover');
        $autoplay       = $widget->get_setting('autoplay');
        $autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
        $infinite       = $widget->get_setting('infinite');
        $speed          = $widget->get_setting('speed', '500');

        //$dir = $widget->get_setting('dir', 'ltr');
        $dir = is_rtl() ? 'rtl' : 'ltr';
        $widget->add_render_attribute( 'cms-slider-settings', [
            'class'                     => trim('cms-slick-slider '.$class),
            'data-fade'                 => $slide_mode,
            'data-rows'                 => $slideRows,
            'data-rowstablet'           => $slideRowsTablet,
            'data-rowsmobile'           => $slideRowsMobile,
            'data-arrows'               => $arrows,
            'data-arrowstablet'         => $arrows_tablet,
            'data-arrowsmobile'         => $arrows_mobile,
            'data-dots'                 => $dots,
            'data-dotstablet'           => $dots_tablet,
            'data-dotsmobile'           => $dots_mobile,
            'data-pauseOnHover'         => $pause_on_hover,
            'data-autoplay'             => $autoplay,
            'data-autoplaySpeed'        => $autoplay_speed,
            'data-infinite'             => $infinite,
            'data-speed'                => $speed,
            'data-slidestoshow'         => $slidesToShow,
            'data-slidestoshowtablet'   => $slidesToShowTablet,
            'data-slidestoshowmobile'   => $slidesToShowMobile,
            'data-slidestoscroll'       => $slidesToScroll,
            'data-slidestoscrolltablet' => $slidesToScrollTablet,
            'data-slidestoscrollmobile' => $slidesToScrollMobile,
            'data-gutter'               => $slides_gutter,
            'data-dir'                  => $dir,
            'style'                     => 'margin:-'.$slides_gutter.'px;',    
        ] );
        if((int)$slideRows > 1) $widget->add_render_attribute( 'cms-slider-settings', 'class', 'multi-rows-xl');
        if((int)$slideRowsTablet > 1) $widget->add_render_attribute( 'cms-slider-settings', 'class', 'multi-rows-lg');
        if((int)$slideRowsMobile > 1) $widget->add_render_attribute( 'cms-slider-settings', 'class', 'multi-rows-md');

        etc_print_html($widget->get_render_attribute_string( 'cms-slider-settings' ));
    }
}
// Grid settings
if(!function_exists('soapee_column_settings')){
    function soapee_column_settings(){
        return array(
            array(
                'name'    => 'col_sm',
                'label'   => esc_html__( 'Columns SM Devices', 'soapee' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1'  => '1',
                    '2'  => '2',
                    '3'  => '3',
                    '4'  => '4',
                    '6'  => '6',
                    '12' => '12',
                ],
            ),
            array(
                'name'    => 'col_md',
                'label'   => esc_html__( 'Columns MD Devices', 'soapee' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => '2',
                'options' => [
                    '1'  => '1',
                    '2'  => '2',
                    '3'  => '3',
                    '4'  => '4',
                    '6'  => '6',
                    '12' => '12',
                ],
            ),
            array(
                'name'    => 'col_lg',
                'label'   => esc_html__( 'Columns LG Devices', 'soapee' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '1'  => '1',
                    '2'  => '2',
                    '3'  => '3',
                    '4'  => '4',
                    '6'  => '6',
                    '12' => '12',
                ],
            ),
            array(
                'name'    => 'col_xl',
                'label'   => esc_html__( 'Columns XL Devices', 'soapee' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => '4',
                'options' => [
                    '1'  => '1',
                    '2'  => '2',
                    '3'  => '3',
                    '4'  => '4',
                    '6'  => '6',
                    '12' => '12',
                ],
            )
        );
    }
}
if(!function_exists('soapee_grid_column_settings')){
    function soapee_grid_column_settings($args = []){
        $args = wp_parse_args($args, [
            'tab'       => \Elementor\Controls_Manager::TAB_LAYOUT,
            'condition' => []
        ]);
        return array(
            'name'     => 'section_grid_settings',
            'label'    => esc_html__('Grid Settings', 'soapee'),
            'tab'      => $args['tab'],
            'controls' => soapee_column_settings(),
            'condition' => $args['condition']
        );
    }
}
// get column width
if(!function_exists('soapee_elementor_grid_column_class')){
    function soapee_elementor_grid_column_class($widget, $settings){
        $class = [];
        $class[] = 'col-xl-'.round(12/$settings['col_xl']);
        $class[] = 'col-lg-'.round(12/$settings['col_lg']);
        $class[] = 'col-md-'.round(12/$settings['col_md']);
        $class[] = 'col-sm-'.round(12/$settings['col_sm']);

        echo trim(implode(' ', $class));
    }
}
/**
 * Masonry Settings
*/
if(!function_exists('soapee_elementor_masonry_settings')){
    function soapee_elementor_masonry_settings($args = []){
        $args = wp_parse_args($args, [
            'tab'       => \Elementor\Controls_Manager::TAB_LAYOUT,
            'condition' => []
        ]);
        return array(
            'name'     => 'section_masonry_settings',
            'label'    => esc_html__('Masonry Settings', 'soapee'),
            'tab'      => $args['tab'],
            'controls' => array_merge(
                array(
                    array(
                        'name'    => 'masonry_layout_mode',
                        'label'   => esc_html__( 'Layout Mode', 'soapee' ),
                        'type'    => \Elementor\Controls_Manager::SELECT,
                        'options' => [
                            'masonry' => esc_html__( 'Masonry', 'soapee' ),
                            'fitRows' => esc_html__( 'Fit Row', 'soapee' ),
                        ],
                        'default'   => 'masonry'
                    ),
                    array(
                        'name'    => 'filter',
                        'label'   => esc_html__( 'Filter on Masonry', 'soapee' ),
                        'type'    => \Elementor\Controls_Manager::SELECT,
                        'default' => 'false',
                        'options' => [
                            'true'  => esc_html__( 'Enable', 'soapee' ),
                            'false' => esc_html__( 'Disable', 'soapee' ),
                        ]
                    ),
                    array(
                        'name'    => 'pagination_type',
                        'label'   => esc_html__( 'Pagination Type', 'soapee' ),
                        'type'    => \Elementor\Controls_Manager::SELECT,
                        'default' => 'false',
                        'options' => [
                            'pagination' => esc_html__( 'Pagination', 'soapee' ),
                            'loadmore'   => esc_html__( 'Loadmore', 'soapee' ),
                            'false'      => esc_html__( 'Disable', 'soapee' ),
                        ]
                    ),
                    array(
                        'name'      => 'filter_default_title',
                        'label'     => esc_html__( 'Default Title', 'soapee' ),
                        'type'      => \Elementor\Controls_Manager::TEXT,
                        'default'   => esc_html__( 'All', 'soapee' ),
                        'condition' => [
                            'filter' => 'true',
                        ],
                    ),
                    array(
                        'name'    => 'filter_alignment',
                        'label'   => esc_html__( 'Alignment', 'soapee' ),
                        'type'    => \Elementor\Controls_Manager::SELECT,
                        'default' => 'center',
                        'options' => [
                            'center' => esc_html__( 'Center', 'soapee' ),
                            'left' => esc_html__( 'Left', 'soapee' ),
                            'right' => esc_html__( 'Right', 'soapee' ),
                        ],
                        'condition' => [
                            'filter' => 'true',
                        ],
                    )
                ),
                soapee_column_settings()
            ),
            'condition' => $args['condition']
        );
    }
}
if(!function_exists('soapee_elementor_button_settings')){
    function soapee_elementor_button_settings($args = []){
        $args = wp_parse_args($args, [
            'options'               => [],
            'condition'             => [],
            'prefix'                => '',
            'btn_text'              => '',
            'btn_type'              => [],
            'btn_type_default'      => 'btn btn-fill',
            'btn_link_type'         => [],
            'btn_link_type_default' => 'custom'
        ]);
        $default = [
            array(
                'name'        => $args['prefix'].'btn_text',
                'label'       => esc_html__( 'Button Text', 'soapee' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => $args['btn_text'],
                'placeholder' => esc_html__('Read More', 'soapee'),
                'condition'   => $args['condition'],
            ),
            array(
                'name'        => $args['prefix'].'btn_link_type',
                'label'       => esc_html__( 'Link Type', 'soapee' ),
                'type'        => \Elementor\Controls_Manager::SELECT,
                'default'     => $args['btn_link_type_default'],
                'options'     => array_merge(
                    [
                        'custom'   => esc_html__('Custom','soapee'),
                        'page'     => esc_html__('Internal Page','soapee'),
                    ],
                    $args[ 'btn_link_type']
                ),
                'condition' => array_merge([$args['prefix'].'btn_text!' => ''], $args['condition']),
            ),
            array(
                'name'        => $args['prefix'].'btn_link_page',
                'label'       => esc_html__( 'Page Link', 'soapee' ),
                'type'        => \Elementor\Controls_Manager::SELECT,
                'default'     => '',
                'options'     => soapee_elementor_list_page_opts(),
                'condition'   => array_merge([$args['prefix'].'btn_text!' => ''], $args['condition'], [$args['prefix'].'btn_link_type' => 'page']),
            ),            
            array(
                'name'        => $args['prefix'].'btn_link',
                'label'       => esc_html__( 'Link', 'soapee' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'soapee' ),
                'default'     => [
                    'url' => '#',
                ],
                'condition' => array_merge([$args['prefix'].'btn_text!' => ''], $args['condition'], [$args['prefix'].'btn_link_type' => 'custom']),
            ),
            array(
                'name'        => $args['prefix'].'btn_type',
                'label'       => esc_html__( 'Mode', 'soapee' ),
                'type'        => \Elementor\Controls_Manager::SELECT,
                'default'     => $args['btn_type_default'],
                'options'     => array_merge(
                    [
                        'btn btn-fill'    => esc_html__('Fill','soapee'),
                        'btn btn-outline' => esc_html__('Outline','soapee'),
                        'btn-text'        => esc_html__('Just Text','soapee'),
                        'btn-overlay'     => esc_html__('Overlay','soapee'),
                    ],
                    $args['btn_type']
                ),
                'condition' => array_merge([$args['prefix'].'btn_text!' => ''], $args['condition']),
            ),
            array(
                'name'        => $args['prefix'].'btn_color',
                'label'       => esc_html__( 'Color', 'soapee' ),
                'type'        => \Elementor\Controls_Manager::SELECT,
                'default'     => 'accent',
                'options'     => [
                    'default'   => esc_html__('Default','soapee'),
                    'accent'    => esc_html__('Accent','soapee'),
                    'primary'   => esc_html__('Primary','soapee'),
                    'secondary' => esc_html__('Secondary','soapee'),
                    'white'     => esc_html__('White','soapee')
                ],
                'condition' => array_merge([$args['prefix'].'btn_text!' => ''], $args['condition'],[$args['prefix'].'btn_type' => ['btn btn-fill', 'btn btn-outline']]),
            ),
            array(
                'name'        => $args['prefix'].'btn_size',
                'label'       => esc_html__( 'Size', 'soapee' ),
                'type'        => \Elementor\Controls_Manager::SELECT,
                'default'     => '',
                'options'     => [
                    'xs' => esc_html__('Extra Small','soapee'),  
                    'sm' => esc_html__('Small','soapee'),  
                    ''   => esc_html__('Default','soapee'),
                    'md' => esc_html__('Medium','soapee'),
                    'lg' => esc_html__('Large','soapee'),
                    'xl' => esc_html__('Extra Large','soapee')
                ],
                'condition' => array_merge([$args['prefix'].'btn_text!' => ''], $args['condition'],[$args['prefix'].'btn_type' => ['btn btn-fill', 'btn btn-outline']]), 
            ),
            array(
                'name'    => $args['prefix'].'align',
                'label'   => esc_html__( 'Button Alignment', 'soapee' ),
                'type'    => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left'    => [
                        'title' => esc_html__( 'Left', 'soapee' ),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'soapee' ),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'soapee' ),
                        'icon'  => 'fa fa-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__( 'Justified', 'soapee' ),
                        'icon'  => 'fa fa-align-justify',
                    ],
                ],
                'prefix_class' => 'text-',
                'default' => '',
                'condition' => array_merge([$args['prefix'].'btn_text!' => ''], $args['condition'])
            ),
            array(
                'name'             => $args['prefix'].'btn_icon',
                'label'            => esc_html__( 'Icon', 'soapee' ),
                'type'             => \Elementor\Controls_Manager::ICONS,
                'label_block'      => true,
                'fa4compatibility' => 'icon',
                'condition' => array_merge([$args['prefix'].'btn_text!' => ''], $args['condition'])
            ),
            array(
                'name'    => $args['prefix'].'icon_align',
                'label'   => esc_html__( 'Icon Position', 'soapee' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'left',
                'options' => [
                    'left'  => esc_html__( 'Before', 'soapee' ),
                    'right' => esc_html__( 'After', 'soapee' ),
                ],
                'condition' => array_merge([$args['prefix'].'btn_text!' => ''], $args['condition'])
            ),
            array(
                'name'  => $args['prefix'].'icon_indent',
                'label' => esc_html__( 'Icon Spacing', 'soapee' ),
                'type'  => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 50,
                    ],
                ],
                'condition' => array_merge([$args['prefix'].'btn_text!' => ''], $args['condition']),
                'selectors' => [
                    '{{WRAPPER}} .cms-btn-icon.cms-align-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .cms-btn-icon.cms-align-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
                ]
            )
        ];
        return wp_parse_args($args['options'], $default);
    }
}
// Alignment options
if(!function_exists('soapee_elementor_text_align')){
    function soapee_elementor_text_align() {
        return array(
            'name'         => 'text-align',
            'label'        => esc_html__( 'Content Alignment', 'soapee' ),
            'type'         => \Elementor\Controls_Manager::CHOOSE,
            'control_type' => 'responsive',
            'options'      => [
                'start' => [
                    'title' => esc_html__( 'Left', 'soapee' ),
                    'icon' => 'eicon-text-align-left',
                ],
                'center' => [
                    'title' => esc_html__( 'Center', 'soapee' ),
                    'icon' => 'eicon-text-align-center',
                ],
                'end' => [
                    'title' => esc_html__( 'Right', 'soapee' ),
                    'icon' => 'eicon-text-align-right',
                ],
                'justify' => [
                    'title' => esc_html__( 'Justified', 'soapee' ),
                    'icon' => 'eicon-text-align-justify',
                ],
            ],
            'default' => 'center',
        );
    }
}
// Alignment css class
if(!function_exists('soapee_elementor_align_class')){
    function soapee_elementor_align_class($settings, $id = 'text-align', $extra_class = ''){
        $align_class = [];
        // Text Align
        if( !empty($settings[$id.'_mobile']) && !empty($settings[$id.'_tablet']) ){
            $align_class[] = 'text-'.$settings[$id.'_mobile'];
            $align_class[] = 'text-md-'.$settings[$id.'_tablet'];
            $align_class[] = 'text-lg-'.$settings[$id];
        } elseif( !empty($settings[$id.'_mobile']) && empty($settings[$id.'_tablet']) ){
            $align_class[] = 'text-'.$settings[$id.'_mobile'];
            $align_class[] = 'text-md-'.$settings[$id];
        } elseif( empty($settings[$id.'_mobile']) && empty($settings[$id.'_tablet']) ){
            $align_class[] = !empty($settings[$id]) ? 'text-'.$settings[$id] : '';
        }
        $align_class[] = $extra_class;
        return trim(implode(' ', $align_class));
    }
}
// Button Render
if(!function_exists('soapee_elementor_button_render')){
    function soapee_elementor_button_render($widget, $settings, $args = []){
        $args = wp_parse_args($args, [
            'post_id'     => '',
            'tag'         => 'div',
            'overwrite'   => false,
            'prefix'      => '',
            'wrap'        => true,
            'class'       => '',
            'icon_before' => '',
            'icon_after'  => ''
        ]);
        if(empty($settings[$args['prefix'].'btn_text'])) return;
        $widget->add_render_attribute( 'button', 'class', $settings[$args['prefix'].'btn_type'], $args['overwrite'] );
        if($settings[$args['prefix'].'btn_link_type'] === 'page'){
            $widget->add_render_attribute( 'button', 'href', soapee_get_link_by_slug($settings[$args['prefix'].'btn_link_page'],'page'), $args['overwrite'] );
        } elseif ( ! empty( $settings[$args['prefix'].'btn_link']['url'] ) ) {
            $widget->add_render_attribute( 'button', 'href', $settings[$args['prefix'].'btn_link']['url'], $args['overwrite'] );
            if ( $settings[$args['prefix'].'btn_link']['is_external'] ) {
                $widget->add_render_attribute( 'button', 'target', '_blank' , $args['overwrite']);
            }

            if ( $settings[$args['prefix'].'btn_link']['nofollow'] ) {
                $widget->add_render_attribute( 'button', 'rel', 'nofollow', $args['overwrite'] );
            }
        } elseif($settings[$args['prefix'].'btn_link_type'] === 'post'){
            $widget->add_render_attribute( 'button', 'href', get_the_permalink($args['post_id']), $args['overwrite']);
        }
        if( !in_array($settings[$args['prefix'].'btn_type'], ['btn-text','btn-overlay']) ){
            if ( ! empty( $settings[$args['prefix'].'btn_color'] ) ) {
                $widget->add_render_attribute( 'button', 'class', 'btn-' . $settings[$args['prefix'].'btn_color'] );
            }
            if ( ! empty( $settings[$args['prefix'].'btn_size'] ) ) {
                $widget->add_render_attribute( 'button', 'class', 'btn-' . $settings[$args['prefix'].'btn_size'] );
            }
        } else {
            if ( ! empty( $settings[$args['prefix'].'btn_color'] ) ) {
                $widget->add_render_attribute( 'button', 'class', 'text-' . $settings[$args['prefix'].'btn_color'] );
            }
            if ( ! empty( $settings[$args['prefix'].'btn_size'] ) ) {
                $widget->add_render_attribute( 'button', 'class', 'btn-' . $settings[$args['prefix'].'btn_size'] );
            }
        }
        $is_new = \Elementor\Icons_Manager::is_migration_allowed();

        $settings[$args['prefix'].'icon_align'] = isset($settings[$args['prefix'].'icon_align']) ? $settings[$args['prefix'].'icon_align'] : 'left';
        if($args['wrap'] == true):
    ?>
        <<?php echo esc_html($args['tag']);?> class="cms-btn-wraps <?php echo esc_attr($args['class']);?>">
    <?php endif; ?>
            <a <?php etc_print_html($widget->get_render_attribute_string( 'button' )); ?>><?php
                $widget->add_render_attribute( [
                    'content-wrapper' => [
                        'class' => 'cms-btn-content',
                    ],
                    'icon-align' => [
                        'class' => [
                            'cms-btn-icon',
                            'cms-align-icon-' . $settings[$args['prefix'].'icon_align'],
                        ],
                    ],
                    'text' => [
                        'class' => 'cms-btn-text',
                    ]
                ], '', '', $args['overwrite']);
                $widget->add_inline_editing_attributes( 'text', 'none' );
                ?><span <?php etc_print_html($widget->get_render_attribute_string( 'content-wrapper' )); ?>>
                    <?php if($settings[$args['prefix'].'icon_align'] === 'left' && !empty($settings[$args['prefix'].'btn_icon']['value'])) : ?>
                        <span <?php etc_print_html($widget->get_render_attribute_string( 'icon-align' )); ?>>
                            <?php
                                \Elementor\Icons_Manager::render_icon( $settings[$args['prefix'].'btn_icon'], [ 'aria-hidden' => 'true' ] );
                            ?>
                        </span>
                    <?php endif; 
                    if($settings[$args['prefix'].'btn_type'] != 'btn-overlay') {
                    ?>
                    <span <?php etc_print_html($widget->get_render_attribute_string( 'text' )); ?>><?php echo esc_html($settings[$args['prefix'].'btn_text']); ?></span>
                    <?php }
                    if($settings[$args['prefix'].'icon_align'] === 'right' && !empty($settings[$args['prefix'].'btn_icon']['value'])) : ?>
                        <span <?php etc_print_html($widget->get_render_attribute_string( 'icon-align' )); ?>>
                            <?php
                                \Elementor\Icons_Manager::render_icon( $settings[$args['prefix'].'btn_icon'], [ 'aria-hidden' => 'true' ] );
                            ?>
                        </span>
                    <?php endif; 
                ?></span>
            </a>
        <?php  if($args['wrap'] == true): ?>
        </<?php echo esc_html($args['tag']);?>>
    <?php
        endif;
    }
}
// Image Render 
if(!function_exists('soapee_elementor_image_render')){
    function soapee_elementor_image_render($widget, $settings, $args = []){
        $args = wp_parse_args($args, [
            'id'      => 'selected_img',
            'size'    => 'thumbnail_size',
            'class'   => '',
            'default' => true,
            'before'  => '',
            'after'   => ''
        ]);      
        if(empty($settings[$args['id']])) return;
        $thumbnail_size_custom = isset($settings[$args['size'].'_custom_dimension']) ? $settings[$args['size'].'_custom_dimension'] : ['width' => '', 'height' => ''];
        if($settings[$args['size'].'_size'] != 'custom'){
            $img_size = $settings[$args['size'].'_size'];
        }
        elseif(!empty($thumbnail_size_custom['width']) && !empty($thumbnail_size_custom['height'])){
            $img_size = $thumbnail_size_custom['width'] . 'x' . $thumbnail_size_custom['height'];
        }
        else{
            $img_size = 'full';
        }

        soapee_image_by_size([
            'id'      => $settings[$args['id']]['id'],
            'size'    => $img_size,
            'class'   => $args['class'],
            'default' => $args['default'],
            'before'  => $args['before'],
            'after'   => $args['after']
        ]);
    }
}
// image render 2
if(!function_exists('soapee_elementor_image_render2')){
    function soapee_elementor_image_render2($settings, $id, $args = []){
        $args = wp_parse_args($args, [
            'class' => ''
        ]);
        ?>
        <div class="empty-none <?php echo esc_attr($args['class']);?>"><?php 
            $image_html = \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', $id );
            printf('%s', $image_html);
            ?>
        </div><?php
    }
}
// Render icon 
if(!function_exists('soapee_elementor_icon_render')){
    function soapee_elementor_icon_render($widget, $settings, $args = []){
        $args = wp_parse_args($args, [
            'id'         => 'selected_icon',
            'loop'       => false,
            'tag'        => 'div',   
            'wrap_class' => '',
            'class'      => '',
            'style'      => '',
            'before'     => '',
            'after'      => '',
            'atts'       => []
        ]);
        if($args['loop']) {
            $icon = $args['id'];
        } else {
            $icon = $settings[$args['id']];
        }
        if (empty($icon)) return;
        $atts = [];
        foreach ($args['atts'] as $key => $att) {
            $atts[] = $key.'="'.$att.'"';
        }
        ?>
        <<?php echo esc_html($args['tag']);?> class="<?php echo trim(implode(' ',['cms-icon-wrap', $args['wrap_class']]));?>" <?php echo implode(' ', $atts);?>><?php \Elementor\Icons_Manager::render_icon( $icon, [ 
                'aria-hidden' => 'true', 
                'class'       => trim(implode(' ', ['cms-iconx', $args['class'] ])),
                'style'       => $args['style']  
            ]); ?></<?php echo esc_html($args['tag']);?>>
        <?php
    }
}

// Render link options
if(!function_exists('soapee_elementor_link_render')){
    function soapee_elementor_link_render($key, $args =[]){
        $attributes = $atts = [];
        if ( ! empty( $key['url'] ) ) {
            $attributes['href'] = esc_url( $key['url'] );
        }

        if ( ! empty( $key['is_external'] ) ) {
            $attributes['target'] = '_blank';
        }

        if ( ! empty( $key['nofollow'] ) ) {
            $attributes['rel'] = 'nofollow';
        }
        
        if ( ! empty( $key['custom_attributes'] ) ) {
            // Custom URL attributes should come as a string of comma-delimited key|value pairs
            $attributes = array_merge( $attributes, soapee_parse_custom_attributes( $key['custom_attributes'] ) );
        }

        $attributes = soapee_array_merge_recursive($attributes, $args);
        
        echo trim(implode(' ', $attributes));
    }
}
if(!function_exists('soapee_parse_custom_attributes')){
    function soapee_parse_custom_attributes( $attributes_string, $delimiter = ',' ) {
        $attributes = explode( $delimiter, $attributes_string );
        $result = [];

        foreach ( $attributes as $attribute ) {
            $attr_key_value = explode( '|', $attribute );

            $attr_key = mb_strtolower( $attr_key_value[0] );

            // Remove any not allowed characters.
            preg_match( '/[-_a-z0-9]+/', $attr_key, $attr_key_matches );

            if ( empty( $attr_key_matches[0] ) ) {
                continue;
            }

            $attr_key = $attr_key_matches[0];

            // Avoid Javascript events and unescaped href.
            if ( 'href' === $attr_key || 'on' === substr( $attr_key, 0, 2 ) ) {
                continue;
            }

            if ( isset( $attr_key_value[1] ) ) {
                $attr_value = trim( $attr_key_value[1] );
            } else {
                $attr_value = '';
            }

            $result[ $attr_key ] = $attr_value;
        }

        return $result;
    }
}
// Scan element (need add to bottom of this file)
$files = scandir(get_template_directory() . '/elementor/core/register');
foreach ($files as $file){
    $pos = strrpos($file, ".php");
    if($pos !== false){
        require_once get_template_directory() . '/elementor/core/register/' . $file;
    }
}