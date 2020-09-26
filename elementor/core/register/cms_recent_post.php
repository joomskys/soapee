<?php
// Register Post Grid Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_recent_post',
        'title'      => esc_html__( 'CMS Recent Post', 'soapee' ),
        'icon'       => 'eicon-posts-list',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts'    => [],
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
                            'name'         => 'gap',
                            'label'        => esc_html__( 'Item Gap', 'soapee' ),
                            'type'         => \Elementor\Controls_Manager::NUMBER,
                            'default'      => 30,
                        ),
                        array(
                            'name'         => 'gap_extra',
                            'label'        => esc_html__( 'Extra Gap', 'soapee' ),
                            'type'         => \Elementor\Controls_Manager::NUMBER,
                        ),
                        array(
                            'name'    => 'col_sm',
                            'label'   => esc_html__( 'Columns SM Devices', 'soapee' ),
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
                            'name'    => 'col_md',
                            'label'   => esc_html__( 'Columns MD Devices', 'soapee' ),
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
                            'name'    => 'col_lg',
                            'label'   => esc_html__( 'Columns LG Devices', 'soapee' ),
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