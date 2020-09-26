<?php
// Register Call to Action Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_cta',
        'title'      => esc_html__( 'CMS Call to Action', 'soapee' ),
        'icon'       => 'eicon-image-rollover',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'params'     => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'soapee' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name'    => 'class',
                            'label'   => esc_html__( 'CSS Classes', 'soapee' ),
                            'type'    => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                            'dynamic' => [
                                'active' => true,
                            ],
                            'title'        => esc_html__( 'Add your custom class WITHOUT the dot. e.g: my-class', 'soapee' ),
                            'classes'      => 'elementor-control-direction-ltr',
                        ),
                        array(
                            'name'    => 'layout',
                            'label'   => esc_html__( 'Templates', 'soapee' ),
                            'type'    => Elementor_Theme_Core::LAYOUT_CONTROL,
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'soapee' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_cta/layout/layout1.png'
                                ],
                            ],
                            'prefix_class' => 'cms-cta-layout-',
                        ),
                    ),
                ),
                array(
                    'name'     => 'text_section',
                    'label'    => esc_html__( 'Text Settings', 'soapee' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'        => 'title',
                            'label'       => esc_html__('Enter your text', 'soapee'),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                            'default'     => esc_html__('We are here for you.', 'soapee'),
                            'label_block' => true,
                        )
                    )
                ),
                array(
                    'name'     => 'phone_section',
                    'label'    => esc_html__( 'Phone Settings', 'soapee' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'        => 'pre_phone_text',
                            'label'       => esc_html__('Enter some text before phone number', 'soapee'),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                            'default'     => esc_html__('Call us at','soapee'),
                            'label_block' => true,
                        ),
                        array(
                            'name'        => 'phone',
                            'label'       => esc_html__('Enter your phone number', 'soapee'),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                            'default'     => '+84 123 456 789',
                            'label_block' => true,
                        )
                    )
                ),
                array(
                    'name'     => 'link_section',
                    'label'    => esc_html__( 'Link Settings', 'soapee' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'        => 'pre_btn_text',
                                'label'       => esc_html__('Enter your text before the link', 'soapee'),
                                'type'        => \Elementor\Controls_Manager::TEXT,
                                'default'     => esc_html__('Or','soapee'),
                                'label_block' => true,
                                'condition'   => [
                                    'btn_text!' => ''
                                ]
                            )
                        ),
                        soapee_elementor_button_settings([
                            'btn_text' => 'Click Me',
                            'btn_type' => [
                                'text-underline' => esc_html__('Text Underline', 'soapee')
                            ]
                        ])
                    )
                ),
                array(
                    'name'     => 'icon_section',
                    'label'    => esc_html__( 'Icon Settings', 'soapee' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
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
                                'layout'    => ['1']                 
                            ],
                        ),
                        array(
                            'name'             => 'selected_icon_after',
                            'label'            => esc_html__( 'Icon After', 'soapee' ),
                            'type'             => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'default'          => [
                                'value'     => '',
                                'library'   => '',
                            ],
                            'condition' => [
                                'layout'    => ['1']                         
                            ],
                        )
                    )
                )
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);