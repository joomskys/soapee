<?php
// Register Heading Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_heading',
        'title'      => esc_html__( 'CMS Heading', 'soapee' ),
        'icon'       => 'eicon-t-letter',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts'    => array(),
        'params'     => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'soapee' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name'         => 'text-align',
                            'label'        => esc_html__( 'Content Alignment', 'soapee' ),
                            'type'         => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options'      => [
                                'left' => [
                                    'title' => esc_html__( 'Left', 'soapee' ),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'soapee' ),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__( 'Right', 'soapee' ),
                                    'icon' => 'eicon-text-align-right',
                                ],
                                'justify' => [
                                    'title' => esc_html__( 'Justified', 'soapee' ),
                                    'icon' => 'eicon-text-align-justify',
                                ],
                            ],
                            'default' => 'center',
                        ),
                        array(
                            'name'    => 'layout',
                            'label'   => esc_html__( 'Templates', 'soapee' ),
                            'type'    => Elementor_Theme_Core::LAYOUT_CONTROL,
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label'      => esc_html__( 'Layout 1', 'soapee' ),
                                    'image'      => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout/layout1.png',
                                    'show_label' => true
                                ],
                                '2' => [
                                    'label'      => esc_html__( 'Layout 2', 'soapee' ),
                                    'image'      => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout/layout2.png',
                                    'show_label' => true
                                ],
                                '3' => [
                                    'label'      => esc_html__( 'Layout 3', 'soapee' ),
                                    'image'      => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout/layout3.png',
                                    'show_label' => true
                                ],
                                '4' => [
                                    'label'      => esc_html__( 'Layout 4', 'soapee' ),
                                    'image'      => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout/layout4.png',
                                    'show_label' => true
                                ],
                                '5' => [
                                    'label'      => esc_html__( 'Layout 5', 'soapee' ),
                                    'image'      => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout/layout5.png',
                                    'show_label' => true
                                ],
                                '6' => [
                                    'label'      => esc_html__( 'Layout 6', 'soapee' ),
                                    'image'      => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout/layout6.png',
                                    'show_label' => true
                                ],
                                '7' => [
                                    'label'      => esc_html__( 'Layout 7', 'soapee' ),
                                    'image'      => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout/layout1.png',
                                    'show_label' => true
                                ],
                                '8' => [
                                    'label'      => esc_html__( 'Layout 8', 'soapee' ),
                                    'image'      => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout/layout8.png',
                                    'show_label' => true
                                ]
                            ],
                            'prefix_class' => 'cms-heading-layout-'
                        )
                    ),
                ),
                array(
                    'name'     => 'title_section',
                    'label'    => esc_html__( 'Custom Heading', 'soapee' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'             => 'selected_icon',
                                'label'            => esc_html__( 'Icon', 'soapee' ),
                                'type'             => \Elementor\Controls_Manager::ICONS,
                                'fa4compatibility' => 'icon',
                                'default'          => [
                                    'value'     => '',
                                    'library'   => '',
                                ],
                                'condition' => [
                                    'layout'    => ['1', '8']                            
                                ],
                            ),
                            array(
                                'name'        => 'heading_text',
                                'label'       => esc_html__( 'Heading', 'soapee' ),
                                'type'        => \Elementor\Controls_Manager::TEXT,
                                'default'     => esc_html__( 'This is the heading', 'soapee' ),
                                'placeholder' => esc_html__( 'Enter your title', 'soapee' ),
                                'label_block' => true,
                            ),
                            array(
                                'name'        => 'subheading_text',
                                'label'       => esc_html__( 'Sub Heading', 'soapee' ),
                                'type'        => \Elementor\Controls_Manager::TEXT,
                                'default'     => esc_html__( 'This is the sub heading', 'soapee' ),
                                'placeholder' => esc_html__( 'Enter your sub title', 'soapee' ),
                                'label_block' => true,
                                'condition'   => [],
                            ),
                            array(
                                'name'        => 'description_text',
                                'label'       => esc_html__( 'Description', 'soapee' ),
                                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                'default'     => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'soapee' ),
                                'placeholder' => esc_html__( 'Enter your description', 'soapee' ),
                                'rows'        => 10,
                                'show_label'  => false,
                                'condition'   => [],
                            )
                        ),
                        soapee_elementor_button_settings([
                            'condition' => []
                        ])
                    )
                )
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);