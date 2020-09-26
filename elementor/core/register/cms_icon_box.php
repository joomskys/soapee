<?php
// Register Icon Box Widget
etc_add_custom_widget(
    array(
        'name' => 'cms_icon_box',
        'title' => esc_html__( 'CMS Icon Box', 'soapee' ),
        'icon' => 'eicon-icon-box',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts' => array(

        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'layout_section',
                    'label' => esc_html__( 'Layout', 'soapee' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name'         => 'text-align',
                            'label'        => esc_html__( 'Content Alignment', 'soapee' ),
                            'type'         => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options'      => [
                                'start' => [
                                    'title' => esc_html__( 'Start', 'soapee' ),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'soapee' ),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'end' => [
                                    'title' => esc_html__( 'End', 'soapee' ),
                                    'icon' => 'eicon-text-align-right',
                                ],
                                'justify' => [
                                    'title' => esc_html__( 'Justified', 'soapee' ),
                                    'icon' => 'eicon-text-align-justify',
                                ],
                            ],
                            'default' => 'center',
                            'selectors' => [
                                //'{{WRAPPER}} .cms-icon-box-wrapper' => 'text-align: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'layout',
                            'label' => esc_html__( 'Templates', 'soapee' ),
                            'type' => Elementor_Theme_Core::LAYOUT_CONTROL,
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'soapee' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_icon_box/layout/layout1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__( 'Layout 2', 'soapee' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_icon_box/layout/layout2.png'
                                ],
                                '3' => [
                                    'label' => esc_html__( 'Layout 3', 'soapee' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_icon_box/layout/layout3.png'
                                ],
                                '4' => [
                                    'label' => esc_html__( 'Layout 4', 'soapee' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_icon_box/layout/layout3.png'
                                ],
                            ],
                            'prefix_class' => 'cms-icon-box-layout-',
                        )
                    ),
                ),
                array(
                    'name' => 'icon_section',
                    'label' => esc_html__( 'Icon Box', 'soapee' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'             => 'icon_type',
                                'label'            => esc_html__( 'Icon Type', 'soapee' ),
                                'type'             => \Elementor\Controls_Manager::SELECT,
                                'options'          => [
                                    'icon' => esc_html__('Icon','soapee'),
                                    'img'  => esc_html__('Image','soapee'),
                                ],
                                'default'  => 'icon'
                            ),
                            array(
                                'name'             => 'selected_icon',
                                'label'            => esc_html__( 'Icon', 'soapee' ),
                                'type'             => \Elementor\Controls_Manager::ICONS,
                                'fa4compatibility' => 'icon',
                                'default'          => [
                                    'value' => 'fas fa-star',
                                    'library' => 'fa-solid',
                                ],
                                'condition' => [
                                    'icon_type'    => 'icon'                            
                                ],
                            ),
                            array(
                                'name'             => 'selected_img',
                                'label'            => esc_html__( 'Image', 'soapee' ),
                                'type'             => \Elementor\Controls_Manager::MEDIA,
                                'default'          => '',
                                'condition' => [
                                    'icon_type'    => 'img'                            
                                ],
                            ),
                            array(
                                'name'         => 'thumbnail_size',
                                'type'         => \Elementor\Group_Control_Image_Size::get_type(),
                                'control_type' => 'group',
                                'default'      => 'full',
                                'condition'    => [
                                    'icon_type'    => 'img'                            
                                ],
                            ),
                            array(
                                'name'        => 'title_text',
                                'label'       => esc_html__( 'Title', 'soapee' ),
                                'type'        => \Elementor\Controls_Manager::TEXT,
                                'default'     => esc_html__( 'This is the heading', 'soapee' ),
                                'placeholder' => esc_html__( 'Enter your title', 'soapee' ),
                                'label_block' => true,
                            ),
                            array(
                                'name'        => 'description_text',
                                'label'       => esc_html__( 'Description', 'soapee' ),
                                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                'default'     => esc_html__( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'soapee' ),
                                'placeholder' => esc_html__( 'Enter your description', 'soapee' ),
                                'rows'        => 10,
                                'show_label'  => false,
                            ),
                            array(
                                'name'    => 'add_icon_link',
                                'label'   => esc_html__('Add icon Link','soapee'),
                                'type'    => \Elementor\Controls_Manager::SWITCHER,
                                'default' => 'true',
                            )
                        ),
                        soapee_elementor_button_settings([
                            'condition' => [
                                'add_icon_link'    => 'true'                            
                            ],
                            'btn_text'         => 'Overlay',
                            'btn_type_default' => 'btn-overlay'
                        ])
                    )
                )
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);