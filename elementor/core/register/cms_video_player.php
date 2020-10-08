<?php
// Register Video Player Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_video_player',
        'title'      => esc_html__('CMS Video Player', 'soapee' ),
        'icon'       => 'eicon-play',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts'    => array(
            'jquery',
            'magnific-popup'
        ),
        'styles'     => array(
            'magnific-popup'
        ),
        'params'     => array(
            'sections' => array(
                array(
                    'name' => 'layout_section',
                    'label' => esc_html__('Layout', 'soapee' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name'    => 'layout',
                            'label'   => esc_html__('Templates', 'soapee' ),
                            'type'    => Elementor_Theme_Core::LAYOUT_CONTROL,
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'soapee' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_video_player/layout-image/layout1.png'
                                ]
                            ],
                            'prefix_class' => 'cms-video-layout-'
                        )
                    )
                ),
                array(
                    'name'     => 'video_section',
                    'label'    => esc_html__('Video', 'soapee' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'  => 'video_link',
                            'label' => esc_html__('Link', 'soapee' ),
                            'type'  => \Elementor\Controls_Manager::TEXT,
                            'default' => 'https://www.youtube.com/watch?v=XHOmBV4js_E'
                        ),
                        array(
                            'name'        => 'video_title',
                            'label'       => esc_html__('Title', 'soapee' ),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name'        => 'video_sub_title',
                            'label'       => esc_html__('Sub Title', 'soapee' ),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true
                        )
                    )
                ),
                array(
                    'name'     => 'image_section',
                    'label'    => esc_html__('Image Overlay', 'soapee' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'    => 'video_image_overlay',
                            'label'   => esc_html__( 'Choose Image', 'soapee' ),
                            'type'    => \Elementor\Controls_Manager::MEDIA,
                            'default' => [
                                //'url' => \Elementor\Utils::get_placeholder_image_src(),
                            ],
                            'dynamic' => [
                                'active' => true,
                            ],
                        ),
                        array(
                            'name'         => 'video_image_overlay_size',
                            'type'         => \Elementor\Group_Control_Image_Size::get_type(),
                            'control_type' => 'group',
                            'default'      => 'full',
                            'separator'    => 'none',
                        ),
                        array(
                            'name'    => 'video_image_as_background',
                            'label'   => esc_html__( 'Make Image as Background', 'soapee' ),
                            'type'    => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                    )
                ),
                array(
                    'name'     => 'play_section',
                    'label'    => esc_html__('Play Button', 'soapee' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'    => 'video_play_btn_style',
                                'label'   => esc_html__('Style', 'soapee' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    'style1' => esc_html__('Style 1','soapee'),
                                ],
                                'default' => 'style1',
                            ),
                            array(
                                'name'    => 'video_play_btn_position',
                                'label'   => esc_html__('Position', 'soapee' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    'left-center'   => esc_html__('Left Center','soapee'),
                                    'right-center'  => esc_html__('Right Center','soapee'),
                                    'center-center' => esc_html__('Center Center','soapee'),
                                ],
                                'default'      => 'left-center',
                                'prefix_class' => 'cms-video-play-btn-'
                            )
                        ),
                        soapee_elementor_button_settings([
                            'prefix'    => 'video_',
                            'btn_text'  => '',
                            'condition' => [
                                //'video_play_btn_style!' => ['style1']
                            ]
                        ])
                    )
                )
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);