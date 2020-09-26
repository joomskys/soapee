<?php
etc_add_custom_widget(
    array(
        'name'       => 'cms_clients',
        'title'      => esc_html__('CMS Clients', 'soapee'),
        'icon'       => 'eicon-person',
        'categories' => array(Elementor_Theme_Core::ETC_CATEGORY_NAME),
        'scripts'    => array(
            'jquery-slick',
            'cms-slick-slider',
        ),
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_clients/layout/layout1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__( 'Layout 1', 'soapee' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_clients/layout/layout2.png'
                                ],
                            ],
                            'prefix_class' => 'cms-clients-layout-',
                            array(
                                'name'         => 'client_image_size',
                                'type'         => \Elementor\Group_Control_Image_Size::get_type(),
                                'control_type' => 'group',
                                'default'      => 'full',
                            ),
                        ),
                    ),
                ),
                soapee_elementor_slick_slider_settings([
                    'tab'       => \Elementor\Controls_Manager::TAB_LAYOUT,
                ]),
                array(
                    'name'     => 'section_clients',
                    'label'    => esc_html__('Clients', 'soapee'),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'    => 'clients',
                            'label'   => esc_html__('Select Form', 'soapee'),
                            'type'    => \Elementor\Controls_Manager::REPEATER,
                            'default' => [
                                [
                                    'client_name'  => esc_html__( 'Client Name #1', 'soapee' ),
                                    'client_link'  => esc_html__( 'http://client-link.com', 'soapee' ),
                                    'client_image' => '',
                                ],
                                [
                                    'client_name'  => esc_html__( 'Client Name #2', 'soapee' ),
                                    'client_link'  => esc_html__( 'http://client-link.com', 'soapee' ),
                                    'client_image' => '',
                                ],
                                [
                                    'client_name'  => esc_html__( 'Client Name #3', 'soapee' ),
                                    'client_link'  => esc_html__( 'http://client-link.com', 'soapee' ),
                                    'client_image' => '',
                                ],
                                [
                                    'client_name'  => esc_html__( 'Client Name #4', 'soapee' ),
                                    'client_link'  => esc_html__( 'http://client-link.com', 'soapee' ),
                                    'client_image' => '',
                                ],
                                [
                                    'client_name'  => esc_html__( 'Client Name #5', 'soapee' ),
                                    'client_link'  => esc_html__( 'http://client-link.com', 'soapee' ),
                                    'client_image' => '',
                                ],
                                [
                                    'client_name'  => esc_html__( 'Client Name #6', 'soapee' ),
                                    'client_link'  => esc_html__( 'http://client-link.com', 'soapee' ),
                                    'client_image' => '',
                                ],
                                [
                                    'client_name'  => esc_html__( 'Client Name #7', 'soapee' ),
                                    'client_link'  => esc_html__( 'http://client-link.com', 'soapee' ),
                                    'client_image' => '',
                                ],
                                [
                                    'client_name'  => esc_html__( 'Client Name #8', 'soapee' ),
                                    'client_link'  => esc_html__( 'http://client-link.com', 'soapee' ),
                                    'client_image' =>'',
                                ],
                            ],
                            'controls' => array(
                                array(
                                    'name'        => 'client_name',
                                    'label'       => esc_html__('Client Name', 'soapee'),
                                    'type'        => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                    'default'     => esc_html__( 'Client Name #1', 'soapee' )
                                ),
                                array(
                                    'name'        => 'client_link',
                                    'label'       => esc_html__('Client URL', 'soapee'),
                                    'type'        => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                    'placeholder' => esc_html__('http://client-link.com', 'soapee'),
                                ),
                                array(
                                    'name'        => 'client_image',
                                    'label'       => esc_html__('Client Logo/Image', 'soapee'),
                                    'type'        => \Elementor\Controls_Manager::MEDIA,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ client_name }}}',
                        ),
                    ),
                )
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);