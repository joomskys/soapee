<?php
// Register Post Grid Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_post_carousel',
        'title'      => esc_html__( 'CMS Posts Carousel', 'soapee' ),
        'icon'       => 'eicon-posts-carousel',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts'    => [
            'jquery-slick',
            'cms-slick-slider',
        ],
        'params'     => array(
            'sections' => array(
                soapee_elementor_slick_slider_settings(),
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Items Layout', 'soapee' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name'    => 'item_layout',
                            'label'   => esc_html__( 'Templates', 'soapee' ),
                            'type'    => Elementor_Theme_Core::LAYOUT_CONTROL,
                            'default' => '1',
                            'options' => soapee_elementor_post_layout(),
                            'prefix_class' => 'cms-post-layout-'
                        ),
                    ),
                ),
                array(
                    'name'     => 'source_section',
                    'label'    => esc_html__( 'Source', 'soapee' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'post_type',
                                'label'    => esc_html__( 'Select Post Type', 'soapee' ),
                                'type'     => \Elementor\Controls_Manager::SELECT,
                                'multiple' => true,
                                'options'  => etc_get_post_type_options(),
                                'default'  => 'post'
                            )
                        ),
                        etc_get_grid_term_by_post_type_options(),
                        array(
                            array(
                                'name'    => 'orderby',
                                'label'   => esc_html__( 'Order By', 'soapee' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'default' => 'date',
                                'options' => [
                                    'date'   => esc_html__( 'Date', 'soapee' ),
                                    'ID'     => esc_html__( 'ID', 'soapee' ),
                                    'author' => esc_html__( 'Author', 'soapee' ),
                                    'title'  => esc_html__( 'Title', 'soapee' ),
                                    'rand'   => esc_html__( 'Random', 'soapee' ),
                                ],
                            ),
                            array(
                                'name'    => 'order',
                                'label'   => esc_html__( 'Sort Order', 'soapee' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'default' => 'desc',
                                'options' => [
                                    'desc' => esc_html__( 'Descending', 'soapee' ),
                                    'asc'  => esc_html__( 'Ascending', 'soapee' ),
                                ],
                            ),
                            array(
                                'name'    => 'limit',
                                'label'   => esc_html__( 'Total items', 'soapee' ),
                                'type'    => \Elementor\Controls_Manager::NUMBER,
                                'default' => '6',
                            )
                        )
                    )
                ),
                array(
                    'name'     => 'thumbnail_section',
                    'label'    => esc_html__( 'Thumbnail Options', 'soapee' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'         => 'thumbnail',
                            'type'         => \Elementor\Group_Control_Image_Size::get_type(),
                            'control_type' => 'group',
                            'default'      => 'medium',
                        )
                    ),
                ),
                array(
                    'name'     => 'excerpt_section',
                    'label'    => esc_html__( 'Excerpt Options', 'soapee' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'      => 'excerpt_lenght',
                            'label'     => esc_html__( 'Excerpt lenght', 'soapee' ),
                            'type'      => \Elementor\Controls_Manager::NUMBER,
                            'default'   => 25,
                            'separator' => 'after',
                        ),
                        array(
                            'name'      => 'excerpt_more_text',
                            'label'     => esc_html__( 'Excerpt more text', 'soapee' ),
                            'type'      => \Elementor\Controls_Manager::TEXT,
                            'default'   => '...',
                            'separator' => 'after',
                        )
                    ),
                ),
                array(
                    'name'     => 'readmore_section',
                    'label'    => esc_html__( 'Read More Options', 'soapee' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => soapee_elementor_button_settings([
                        'btn_text'      => esc_html__('Read More', 'soapee'),
                        'btn_link_type' => [
                            'post' => esc_html__('Post Detail','soapee')
                        ],
                        'btn_link_type_default' => 'post'
                    ]),
                )
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);