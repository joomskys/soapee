<?php
// Register CMS Coundown
etc_add_custom_widget(
    array(
        'name'       => 'cms_countdown',
        'title'      => esc_html__('CMS Countdown', 'soapee' ),
        'icon'       => 'eicon-countdown',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts'    => array(
            'cms-countdown',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__('Layout', 'soapee' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name'    => 'layout',
                            'label'   => esc_html__('Templates', 'soapee' ),
                            'type'    => Elementor_Theme_Core::LAYOUT_CONTROL,
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'soapee' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_countdown/layout-image/layout1.png'
                                ]
                            ],
                            'prefix_class' => 'cms-countdown-layout-'
                        )
                    )
                ),
                array(
                    'name'     => 'content_section',
                    'label'    => esc_html__('Time to', 'soapee' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'        => 'title_text',
                            'label'       => esc_html__('Title', 'soapee' ),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                            'default'     => esc_html__('Enter your title', 'soapee' ),
                            'placeholder' => esc_html__('Enter your title', 'soapee' ),
                            'label_block' => true,
                        ),
                        array(
                            'name'        => 'pre_text',
                            'label'       => esc_html__('Pre Text', 'soapee' ),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                            'default'     => esc_html__('Offer Valid Until', 'soapee' ),
                            'placeholder' => esc_html__('Offer Valid Until', 'soapee' ),
                            'label_block' => true,
                        ),
                        array(
                            'name'        => 'time_to',
                            'label'       => esc_html__('Choose your time', 'soapee' ),
                            'type'        => \Elementor\Controls_Manager::DATE_TIME,
                            'default'     => '',
                            'label_block' => true
                        )
                    )
                ),
                array(
                    'name'     => 'button1_section',
                    'label'    => esc_html__('Button 1 Settings', 'soapee' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => soapee_elementor_button_settings([
                        'prefix' => 'button1_'
                    ])
                ),
                array(
                    'name'     => 'button2_section',
                    'label'    => esc_html__('Button 2 Settings', 'soapee' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => soapee_elementor_button_settings([
                        'prefix' => 'button2_'
                    ])
                )
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);