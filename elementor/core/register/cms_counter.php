<?php
//Register Counter Widget
 etc_add_custom_widget(
    array(
        'name'       => 'cms_counter',
        'title'      => esc_html__('CMS Counter', 'soapee'),
        'icon'       => 'eicon-counter-circle',
        'categories' => array(Elementor_Theme_Core::ETC_CATEGORY_NAME),
        'scripts'    => array(
            'jquery-numerator',
            'cms-counter-widget-js',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'soapee' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name'         => 'layout',
                            'label'        => esc_html__( 'Templates', 'soapee' ),
                            'type'         => Elementor_Theme_Core::LAYOUT_CONTROL,
                            'prefix_class' => 'cms-counter-layout',
                            'default'      => '1',
                            'options'      => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'soapee' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_counter/layout/layout1.png'
                                ]
                            ],
                        ),
                    ),
                ),
                array(
                    'name'     => 'section_counter',
                    'label'    => esc_html__('Counter', 'soapee'),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'    => 'starting_number',
                            'label'   => esc_html__('Starting Number', 'soapee'),
                            'type'    => \Elementor\Controls_Manager::NUMBER,
                            'default' => 1,
                        ),
                        array(
                            'name'    => 'ending_number',
                            'label'   => esc_html__('Ending Number', 'soapee'),
                            'type'    => \Elementor\Controls_Manager::NUMBER,
                            'default' => 100,
                        ),
                        array(
                            'name'        => 'prefix',
                            'label'       => esc_html__('Number Prefix', 'soapee'),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                            'default'     => '',
                            'placeholder' => '1',
                        ),
                        array(
                            'name'        => 'suffix',
                            'label'       => esc_html__('Number Suffix', 'soapee'),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                            'default'     => '',
                            'placeholder' => '+',
                        ),
                        array(
                            'name'    => 'duration',
                            'label'   => esc_html__('Animation Duration', 'soapee'),
                            'type'    => \Elementor\Controls_Manager::NUMBER,
                            'default' => 2000,
                            'min'     => 100,
                            'step'    => 100,
                        ),
                        array(
                            'name'    => 'thousand_separator',
                            'label'   => esc_html__('Thousand Separator', 'soapee'),
                            'type'    => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name'      => 'thousand_separator_char',
                            'label'     => esc_html__('Separator', 'soapee'),
                            'type'      => \Elementor\Controls_Manager::SELECT,
                            'condition' => [
                                'thousand_separator' => 'true',
                            ],
                            'options' => [
                                ''  => 'Default',
                                '.' => 'Dot',
                                ' ' => 'Space',
                            ],
                            'default' => '',
                        ),
                        array(
                            'name'        => 'title',
                            'label'       => esc_html__('Title', 'soapee'),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'default'     => esc_html__( 'Counter', 'soapee' ),
                            'placeholder' => esc_html__( 'Counter Title', 'soapee' ),
                        ),
                        array(
                            'name'    => 'show_icon',
                            'label'   => esc_html__('Show Icon', 'soapee'),
                            'type'    => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name'    => 'icon_type',
                            'label'   => esc_html__( 'Icon Type', 'soapee' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'icon' => esc_html__('Icon', 'soapee'),
                                'image' => esc_html__('Image', 'soapee'),
                            ],
                            'default'   => 'icon',
                            'condition' => [
                                'show_icon' => 'true'
                            ]
                        ),
                        array(
                            'name'             => 'counter_icon',
                            'label'            => esc_html__( 'Icon', 'soapee' ),
                            'type'             => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'condition'        => [
                                'show_icon' => 'true',
                                'icon_type' => 'icon'
                            ]
                        ),
                        array(
                            'name'      => 'icon_image',
                            'label'     => esc_html__( 'Icon Image', 'soapee' ),
                            'type'      => \Elementor\Controls_Manager::MEDIA,
                            'default'   => '',
                            'condition' => [
                                'show_icon' => 'true',
                                'icon_type' => 'image'
                            ]
                        )
                    )
                )
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);