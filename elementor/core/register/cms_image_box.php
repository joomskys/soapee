<?php
// Register Gallery Image Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_image_box',
        'title'      => esc_html__('CMS Image Box', 'soapee'),
        'icon'       => 'eicon-image-box',
        'categories' => array(Elementor_Theme_Core::ETC_CATEGORY_NAME),
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_image_box/layout/layout1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__( 'Layout 2', 'soapee' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_image_box/layout/layout2.png'
                                ]
                            ],
                            'prefix_class' => 'cms-image-box-layout-',
                        ),
                        array(
                            'name'         => 'image_size',
                            'type'         => \Elementor\Group_Control_Image_Size::get_type(),
                            'control_type' => 'group',
                            'default'      => 'custom',
                            'custom_dimension' => [
                                'width'  => 201,
                                'height' => 179
                            ]
                        ),
                    ),
                ),
                array(
                    'name'     => 'img_list',
                    'label'    => esc_html__('Image Box', 'soapee'),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'        => 'image',
                            'label'       => esc_html__('Image', 'soapee'),
                            'type'        => \Elementor\Controls_Manager::MEDIA,
                            'label_block' => true,
                        ),
                        array(
                            'name'        => 'feature_title',
                            'label'       => esc_html__('Title', 'soapee'),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'default'     => esc_html__( 'Enter your Title', 'soapee' )
                        ),
                        array(
                            'name'    => 'feature_lists',
                            'label'   => esc_html__('Add your feature list', 'soapee'),
                            'type'    => \Elementor\Controls_Manager::REPEATER,
                            'default' => [
                                [
                                    'feature_list' => esc_html__( 'Dust all accessible surfaces', 'soapee' )
                                ],
                                [
                                    'feature_list' => esc_html__( 'Wipe down all mirrors and glass fixtures', 'soapee' )
                                ],
                                [
                                    'feature_list' => esc_html__( 'Clean all floor surfaces', 'soapee' )
                                ],
                                [
                                    'feature_list' => esc_html__( 'Take out garbage and recycling', 'soapee' )
                                ]
                            ],
                            'controls' => array(
                                array(
                                    'name'        => 'feature_list',
                                    'label'       => esc_html__('Feature title', 'soapee'),
                                    'type'        => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                    'default'     => esc_html__( 'Enter your text', 'soapee' )
                                )
                            ),
                            'condition' => [
                                'layout' => ['1']
                            ],
                            'title_field' => '{{{ feature_list }}}'
                        )
                    )
                ),
                array(
                    'name'     => 'img_button',
                    'label'    => esc_html__('Button', 'soapee'),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => soapee_elementor_button_settings()
                )
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);