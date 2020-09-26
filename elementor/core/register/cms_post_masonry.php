<?php
// Post term options
$post_term_options = etc_get_grid_term_options('post');

// Register Post Grid Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_post_masonry',
        'title'      => esc_html__( 'CMS Post Masonry', 'soapee' ),
        'icon'       => 'eicon-posts-grid',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts'    => [
            'imagesloaded',
            'isotope',
            'cms-post-grid-widget-js',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'soapee' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name'    => 'layout',
                            'label'   => esc_html__( 'Templates', 'soapee' ),
                            'type'    => Elementor_Theme_Core::LAYOUT_CONTROL,
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'soapee' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_post_grid/layout/layout1.png'
                                ]
                            ],
                        ),
                    ),
                ),
                array(
                    'name'     => 'source_section',
                    'label'    => esc_html__( 'Source', 'soapee' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'     => 'source',
                            'label'    => esc_html__( 'Select Categories', 'soapee' ),
                            'type'     => \Elementor\Controls_Manager::SELECT2,
                            'multiple' => true,
                            'options'  => $post_term_options,
                        ),
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
                        ),
                    ),
                ),
                array(
                    'name'     => 'grid_section',
                    'label'    => esc_html__( 'Grid', 'soapee' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'         => 'thumbnail',
                            'type'         => \Elementor\Group_Control_Image_Size::get_type(),
                            'control_type' => 'group',
                            'default'      => 'full',
                        ),
                        array(
                            'name'    => 'layout_type',
                            'label'   => esc_html__( 'Layout Type', 'soapee' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'basic'   => esc_html__( 'Basic', 'soapee' ),
                                'masonry' => esc_html__( 'Masonry', 'soapee' ),
                            ],
                            'default' => 'basic',
                        ),
                        array(
                            'name'    => 'masonry_layout_mode',
                            'label'   => esc_html__( 'Layout Mode', 'soapee' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'masonry' => esc_html__( 'Masonry', 'soapee' ),
                                'fitRows' => esc_html__( 'Fit Row', 'soapee' ),
                            ],
                            'default'   => 'masonry',
                            'condition' => [
                                'layout_type' => 'masonry',
                            ],
                        ),
                        array(
                            'name'    => 'filter',
                            'label'   => esc_html__( 'Filter on Masonry', 'soapee' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'default' => 'false',
                            'options' => [
                                'true'  => esc_html__( 'Enable', 'soapee' ),
                                'false' => esc_html__( 'Disable', 'soapee' ),
                            ],
                            'condition' => [
                                'layout_type' => 'masonry',
                            ],
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
                            ],
                            'condition' => [
                                'layout_type' => 'masonry',
                            ],
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
                        ),
                        array(
                            'name'         => 'gap',
                            'label'        => esc_html__( 'Item Gap', 'soapee' ),
                            'type'         => \Elementor\Controls_Manager::NUMBER,
                            'control_type' => 'responsive',
                            'default'      => 30,
                            'selectors'    => [
                                //'{{WRAPPER}} .cms-post-grid .grid-item-inner' => 'padding-left: {{VALUE}}px; padding-right: {{VALUE}}px;',
                            ],
                        ),
                        array(
                            'name'    => 'col_xs',
                            'label'   => esc_html__( 'Columns XS Devices', 'soapee' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => esc_html__( '1', 'soapee' ),
                                '2' => esc_html__( '2', 'soapee' ),
                                '3' => esc_html__( '3', 'soapee' ),
                                '4' => esc_html__( '4', 'soapee' ),
                                '6' => esc_html__( '6', 'soapee' ),
                                '12' => esc_html__( '12', 'soapee' ),
                            ],
                        ),
                        array(
                            'name'    => 'col_sm',
                            'label'   => esc_html__( 'Columns SM Devices', 'soapee' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
                            'options' => [
                                '1' => esc_html__( '1', 'soapee' ),
                                '2' => esc_html__( '2', 'soapee' ),
                                '3' => esc_html__( '3', 'soapee' ),
                                '4' => esc_html__( '4', 'soapee' ),
                                '6' => esc_html__( '6', 'soapee' ),
                                '12' => esc_html__( '12', 'soapee' ),
                            ],
                        ),
                        array(
                            'name'    => 'col_md',
                            'label'   => esc_html__( 'Columns MD Devices', 'soapee' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => esc_html__( '1', 'soapee' ),
                                '2' => esc_html__( '2', 'soapee' ),
                                '3' => esc_html__( '3', 'soapee' ),
                                '4' => esc_html__( '4', 'soapee' ),
                                '6' => esc_html__( '6', 'soapee' ),
                                '12' => esc_html__( '12', 'soapee' ),
                            ],
                        ),
                        array(
                            'name'    => 'col_lg',
                            'label'   => esc_html__( 'Columns LG Devices', 'soapee' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'default' => '4',
                            'options' => [
                                '1' => esc_html__( '1', 'soapee' ),
                                '2' => esc_html__( '2', 'soapee' ),
                                '3' => esc_html__( '3', 'soapee' ),
                                '4' => esc_html__( '4', 'soapee' ),
                                '6' => esc_html__( '6', 'soapee' ),
                                '12' => esc_html__( '12', 'soapee' ),
                            ],
                        ),
                        array(
                            'name'    => 'col_xl',
                            'label'   => esc_html__( 'Columns XL Devices', 'soapee' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'default' => '4',
                            'options' => [
                                '1' => esc_html__( '1', 'soapee' ),
                                '2' => esc_html__( '2', 'soapee' ),
                                '3' => esc_html__( '3', 'soapee' ),
                                '4' => esc_html__( '4', 'soapee' ),
                                '6' => esc_html__( '6', 'soapee' ),
                                '12' => esc_html__( '12', 'soapee' ),
                            ],
                        ),
                    ),
                ),
                array(
                    'name'     => 'display_section',
                    'label'    => esc_html__( 'Display Options', 'soapee' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'      => 'show_thumbnail',
                            'label'     => esc_html__( 'Show Thumbnail', 'soapee' ),
                            'type'      => \Elementor\Controls_Manager::SWITCHER,
                            'default'   => 'true',
                            'separator' => 'after',
                        ),
                        array(
                            'name'    => 'show_title',
                            'label'   => esc_html__( 'Show Title', 'soapee' ),
                            'type'    => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name'    => 'title_tag',
                            'label'   => esc_html__('HTML Tag', 'soapee'),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'default' => 'h3',
                            'options' => [
                                'h1'    => 'H1',
                                'h2'    => 'H2',
                                'h3'    => 'H3',
                                'h4'    => 'H4',
                                'h5'    => 'H5',
                                'h6'    => 'H6',
                            ],
                            'condition' => [
                                'show_title' => 'true'
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name'    => 'show_excerpt',
                            'label'   => esc_html__( 'Show Excerpt', 'soapee' ),
                            'type'    => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name'      => 'num_words',
                            'label'     => esc_html__( 'Number of Words', 'soapee' ),
                            'type'      => \Elementor\Controls_Manager::NUMBER,
                            'default'   => 25,
                            'condition' => [
                                'show_excerpt' => 'true'
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name'    => 'show_button',
                            'label'   => esc_html__( 'Show Action Button', 'soapee' ),
                            'type'    => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name'      => 'button_text',
                            'label'     => esc_html__( 'Button Text', 'soapee' ),
                            'type'      => \Elementor\Controls_Manager::TEXT,
                            'default'   => esc_html__('Read more', 'soapee'),
                            'condition' => [
                                'show_button' => 'true'
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name'    => 'show_meta',
                            'label'   => esc_html__( 'Show Meta', 'soapee' ),
                            'type'    => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name'      => 'show_post_date',
                            'label'     => esc_html__( 'Show Post Date', 'soapee' ),
                            'type'      => \Elementor\Controls_Manager::SWITCHER,
                            'default'   => 'true',
                            'condition' => [
                                'show_meta' => 'true'
                            ],
                        ),
                        array(
                            'name'      => 'show_categories',
                            'label'     => esc_html__( 'Show Categories', 'soapee' ),
                            'type'      => \Elementor\Controls_Manager::SWITCHER,
                            'default'   => 'true',
                            'condition' => [
                                'show_meta' => 'true'
                            ],
                        ),
                        array(
                            'name'      => 'show_author',
                            'label'     => esc_html__( 'Show Author', 'soapee' ),
                            'type'      => \Elementor\Controls_Manager::SWITCHER,
                            'default'   => 'true',
                            'condition' => [
                                'show_meta' => 'true'
                            ],
                        ),
                        array(
                            'name'      => 'show_cmt',
                            'label'     => esc_html__( 'Show Comment', 'soapee' ),
                            'type'      => \Elementor\Controls_Manager::SWITCHER,
                            'default'   => 'true',
                            'condition' => [
                                'show_meta' => 'true'
                            ],
                        )
                    ),
                ),
                array(
                    'name'      => 'title_style',
                    'label'     => esc_html__('Title', 'soapee'),
                    'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'show_title'  => 'true',
                    ],
                    'controls' => array(
                        array(
                            'name'      => 'title_color',
                            'label'     => esc_html__('Color', 'soapee'),
                            'type'      => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .entry-title'  => 'color: {{VALUE}};'
                            ]
                        ),
                        array(
                            'name'      => 'title_color_hover',
                            'label'     => esc_html__('Hover Color', 'soapee'),
                            'type'      => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .entry-title a:hover'  => 'color: {{VALUE}};'
                            ]
                        ),
                        array(
                            'name'         => 'title_typo',
                            'type'         => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .entry-title',
                        ),
                        array(
                            'name'         => 'table_title_background',
                            'type'         => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types'        => [ 'classic' , 'gradient' ],
                            'selector'     => '{{WRAPPER}} .entry-title',
                        ),
                        array(
                            'name'         => 'title_margin',
                            'label'        => esc_html__('Margin', 'soapee'),
                            'type'         => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units'   => ['px', 'em', '%'],
                            'selectors'    => [
                                '{{WRAPPER}} .entry-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ]
                        ),
                        array(
                            'name'         => 'title_padding',
                            'label'        => esc_html__('Padding', 'soapee'),
                            'type'         => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units'   => ['px', 'em', '%'],
                            'selectors'    => [
                                '{{WRAPPER}} .entry-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ]
                        ),
                    ),
                ),
                array(
                    'name'      => 'excerpt_style',
                    'label'     => esc_html__('Excerpt', 'soapee'),
                    'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'show_excerpt'  => 'true',
                    ],
                    'controls' => array(
                        array(
                            'name'      => 'excerpt_color',
                            'label'     => esc_html__('Color', 'soapee'),
                            'type'      => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .entry-content'  => 'color: {{VALUE}};'
                            ]
                        ),
                        array(
                            'name'         => 'description_typo',
                            'type'         => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .entry-content',
                            'separator'    => 'after',
                        ),
                        array(
                            'name'         => 'table_excerpt_background',
                            'type'         => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types'        => [ 'classic' , 'gradient' ],
                            'selector'     => '{{WRAPPER}} .entry-content',
                        ),
                        array(
                            'name'       => 'excerpt_margin',
                            'label'      => esc_html__('Margin', 'soapee'),
                            'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => ['px', 'em', '%'],
                            'selectors'  => [
                                '{{WRAPPER}} .entry-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name'       => 'excerpt_padding',
                            'label'      => esc_html__('Padding', 'soapee'),
                            'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => ['px', 'em', '%'],
                            'selectors'  => [
                                '{{WRAPPER}} .entry-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name'     => 'button_style',
                    'label'    => esc_html__( 'Button', 'soapee' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name'         => 'button_typo',
                            'label'        => esc_html__( 'Typography', 'soapee' ),
                            'type'         => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .entry-readmore .btn, {{WRAPPER}} .entry-readmore .button, {{WRAPPER}} .entry-readmore button',
                        ),
                        array(
                            'name'         => 'tabs_button_style',
                            'control_type' => 'tab',
                            'tabs'         => [
                                array(
                                    'name'     => 'tab_button_normal',
                                    'label'    => esc_html__( 'Normal', 'soapee' ),
                                    'controls' => array(
                                        array(
                                            'name'      => 'button_text_color',
                                            'label'     => esc_html__( 'Text Color', 'soapee' ),
                                            'type'      => \Elementor\Controls_Manager::COLOR,
                                            'default'   => '',
                                            'selectors' => [
                                                '{{WRAPPER}} .entry-readmore .btn, {{WRAPPER}} .entry-readmore .button, {{WRAPPER}} .entry-readmore button' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name'      => 'button_background_color',
                                            'label'     => esc_html__( 'Background Color', 'soapee' ),
                                            'type'      => \Elementor\Controls_Manager::COLOR,
                                            'selectors' => [
                                                '{{WRAPPER}} .entry-readmore .btn, {{WRAPPER}} .entry-readmore .button, {{WRAPPER}} .entry-readmore button' => 'background-color: {{VALUE}};',
                                            ],
                                        ),
                                    ),
                                ),
                                array(
                                    'name'     => 'tab_button_hover',
                                    'label'    => esc_html__( 'Hover', 'soapee' ),
                                    'controls' => array(
                                        array(
                                            'name'      => 'button_hover_color',
                                            'label'     => esc_html__( 'Text Color', 'soapee' ),
                                            'type'      => \Elementor\Controls_Manager::COLOR,
                                            'selectors' => [
                                                '{{WRAPPER}} .entry-readmore .btn:hover, {{WRAPPER}} .entry-readmore .button:hover, {{WRAPPER}} .entry-readmore button:hover, {{WRAPPER}} .entry-readmore .btn:focus, {{WRAPPER}} .entry-readmore .button:focus, {{WRAPPER}} .entry-readmore button:focus' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name'      => 'button_background_hover_color',
                                            'label'     => esc_html__( 'Background Color', 'soapee' ),
                                            'type'      => \Elementor\Controls_Manager::COLOR,
                                            'selectors' => [
                                                '{{WRAPPER}} .entry-readmore .btn:hover, {{WRAPPER}} .entry-readmore .button:hover, {{WRAPPER}} .entry-readmore .btn:focus, {{WRAPPER}} .entry-readmore .button:focus' => 'background-color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name'      => 'button_hover_border_color',
                                            'label'     => esc_html__( 'Border Color', 'soapee' ),
                                            'type'      => \Elementor\Controls_Manager::COLOR,
                                            'condition' => [
                                                'border_border!' => '',
                                            ],
                                            'selectors' => [
                                                '{{WRAPPER}} .entry-readmore .btn:hover, {{WRAPPER}} .entry-readmore .button:hover, {{WRAPPER}} .entry-readmore .btn:focus, {{WRAPPER}} .entry-readmore .button:focus' => 'border-color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name'  => 'hover_animation',
                                            'label' => esc_html__( 'Hover Animation', 'soapee' ),
                                            'type'  => \Elementor\Controls_Manager::HOVER_ANIMATION,
                                        ),
                                    ),
                                ),
                            ]
                        ),
                        array(
                            'name'         => 'border',
                            'type'         => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .entry-readmore .btn, {{WRAPPER}} .entry-readmore .button',
                            'separator'    => 'before',
                        ),
                        array(
                            'name'       => 'button_border_radius',
                            'label'      => esc_html__( 'Border Radius', 'soapee' ),
                            'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors'  => [
                                '{{WRAPPER}} .entry-readmore .btn, {{WRAPPER}} .entry-readmore .button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name'         => 'button_box_shadow',
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .entry-readmore .btn, {{WRAPPER}} .entry-readmore .button',
                        ),
                        array(
                            'name'         => 'button_padding',
                            'label'        => esc_html__('Padding', 'soapee'),
                            'type'         => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units'   => [ 'px', 'em', '%' ],
                            'selectors'    => [
                                '{{WRAPPER}} .entry-readmore .btn, {{WRAPPER}} .entry-readmore .button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'before',
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);