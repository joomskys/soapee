<?php
// Register Testimonial List Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_testimonial',
        'title'      => esc_html__('CMS Testimonial', 'soapee'),
        'icon'       => 'eicon-testimonial',
        'categories' => array(Elementor_Theme_Core::ETC_CATEGORY_NAME),
        'scripts'    => array(
            'jquery-slick',
            'cms-slick-slider',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'layout_section',
                    'label' => esc_html__('Layout', 'soapee' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'soapee' ),
                            'type' => Elementor_Theme_Core::LAYOUT_CONTROL,
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'soapee' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_testimonial/layout-image/layout1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'soapee' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_testimonial/layout-image/layout2.png'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'soapee' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_testimonial/layout-image/layout3.png'
                                ]
                            ],
                            'prefix_class' => 'cms-testimonial-layout-'
                        )
                    ),
                ),
                array(
                    'name'     => 'image_before_after',
                    'label'    => esc_html__('Custom Settings', 'soapee'),
                    'tab'      => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name'        => 'item_title',
                            'label'       => esc_html__('Title', 'soapee'),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name'        => 'image_left',
                            'label'       => esc_html__('Image Left', 'soapee'),
                            'type'        => \Elementor\Controls_Manager::MEDIA,
                            'default'     => [
                                'url' => get_template_directory_uri() . '/elementor/templates/widgets/cms_testimonial/layout-image/ttmn-l.png'
                            ],
                            'label_block' => true,
                        ),
                        array(
                            'name'        => 'image_right',
                            'label'       => esc_html__('Image Right', 'soapee'),
                            'type'        => \Elementor\Controls_Manager::MEDIA,
                            'default'     => [
                                'url' => get_template_directory_uri() . '/elementor/templates/widgets/cms_testimonial/layout-image/ttmn-r.png'
                            ],
                            'label_block' => true,
                        )
                    ),
                    'condition' => [
                        'layout' => ['3']
                    ]
                ),
                soapee_elementor_slick_slider_settings([
                    'tab'       => \Elementor\Controls_Manager::TAB_LAYOUT,
                ]),
                array(
                    'name'     => 'content_list',
                    'label'    => esc_html__('Testimonial', 'soapee'),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'     => 'testimonial',
                            'label'    => esc_html__('Add Item', 'soapee'),
                            'type'     => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name'        => 'title',
                                    'label'       => esc_html__('Title', 'soapee'),
                                    'type'        => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name'        => 'sub_title',
                                    'label'       => esc_html__('Sub Title', 'soapee'),
                                    'type'        => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name'        => 'position',
                                    'label'       => esc_html__('Position', 'soapee'),
                                    'type'        => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name'        => 'description',
                                    'label'       => esc_html__('Description', 'soapee'),
                                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                ),
                                array(
                                    'name'        => 'star',
                                    'label'       => esc_html__('Star', 'soapee'),
                                    'type'        => \Elementor\Controls_Manager::SELECT,
                                    'options'     => [
                                        '100' => esc_html__('5 Star','soapee'),
                                        '80'  => esc_html__('4 Star','soapee'),
                                        '60'  => esc_html__('3 Star','soapee'),
                                        '40'  => esc_html__('2 Star','soapee'),
                                        '20'  => esc_html__('1 Star','soapee'),                                    
                                    ],  
                                    'default' => '100',
                                    'label_block' => true
                                ),
                                array(
                                    'name'        => 'image',
                                    'label'       => esc_html__('Image', 'soapee'),
                                    'type'        => \Elementor\Controls_Manager::MEDIA,
                                    'label_block' => true,
                                ),
                            ),
                            'default' => [
                                [
                                    'title'       => esc_html__( 'Name #1', 'soapee' ),
                                    'sub_title'   => '',
                                    'position'    => 'Manager #1',
                                    'description' => esc_html__( '#1 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'soapee' ),
                                    'image'       => get_template_directory_uri() . '/images/assets/placeholder/no-image.jpg' 
                                ],
                                [
                                    'title'       => esc_html__( 'Name #2', 'soapee' ),
                                    'sub_title'   => '',
                                    'position'    => 'Manager #2',
                                    'description' => esc_html__( '#2 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'soapee' ),
                                    'image'       => get_template_directory_uri() . '/images/assets/placeholder/no-image.jpg'
                                ],
                                [
                                    'title'       => esc_html__( 'Name #3', 'soapee' ),
                                    'sub_title'   => '',
                                    'position'    => 'Manager #3',
                                    'description' => esc_html__( '#3 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'soapee' ),
                                    'image'       => get_template_directory_uri() . '/images/assets/placeholder/no-image.jpg'
                                ]
                            ],
                            'title_field' => '{{{ title }}}',
                        )
                    ),
                )
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);