<?php
$slides_to_show = range( 1, 10 );
$slides_to_show = array_combine( $slides_to_show, $slides_to_show );

// Register Teams List Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_teams',
        'title'      => esc_html__('CMS Teams', 'soapee'),
        'icon'       => 'fa fa-users',
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_teams/layout/layout1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__( 'Layout 2', 'soapee' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_teams/layout/layout2.png'
                                ]
                            ],
                            'prefix_class' => 'cms-team-layout-',
                        ),
                        array(
                            'name'         => 'team_image_size',
                            'type'         => \Elementor\Group_Control_Image_Size::get_type(),
                            'control_type' => 'group',
                            'default'      => 'full',
                        ),
                    ),
                ),
                soapee_elementor_slick_slider_settings([
                    'tab'       => \Elementor\Controls_Manager::TAB_LAYOUT,
                ]),
                array(
                    'name'     => 'section_teams',
                    'label'    => esc_html__('Teams', 'soapee'),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'    => 'teams',
                            'label'   => esc_html__('Select Form', 'soapee'),
                            'type'    => \Elementor\Controls_Manager::REPEATER,
                            'default' => [
                                [
                                    'team_name' => esc_html__( 'Member Name', 'soapee' ),
                                    'team_job' => esc_html__( 'Member Job Title', 'soapee' ),
                                    'team_desc' => esc_html__( 'Member Description', 'soapee' ),
                                    'team_link' => 'http://team-link.com',
                                ],
                                [
                                    'team_name' => esc_html__( 'Member Name', 'soapee' ),
                                    'team_job'  => esc_html__( 'Member Job Title', 'soapee' ),
                                    'team_desc' => esc_html__( 'Member Description', 'soapee' ),
                                    'team_link' => 'http://team-link.com',
                                ],
                                [
                                    'team_name' => esc_html__( 'Member Name', 'soapee' ),
                                    'team_job'  => esc_html__( 'Member Job Title', 'soapee' ),
                                    'team_desc' => esc_html__( 'Member Description', 'soapee' ),
                                    'team_link' => 'http://team-link.com',
                                ],
                            ],
                            'controls' => array(
                                array(
                                    'name'        => 'team_name',
                                    'label'       => esc_html__('Member Name', 'soapee'),
                                    'type'        => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                    'default'     => esc_html__( 'Team Name', 'soapee' )
                                ),
                                array(
                                    'name'        => 'team_job',
                                    'label'       => esc_html__('Member Job Title', 'soapee'),
                                    'type'        => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                    'default'     => esc_html__( 'Member Job Title', 'soapee' )
                                ),
                                array(
                                    'name'        => 'team_desc',
                                    'label'       => esc_html__('Member Description', 'soapee'),
                                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                    'default'     => esc_html__( 'Member Description', 'soapee' )
                                ),
                                array(
                                    'name'        => 'team_link',
                                    'label'       => esc_html__('Member URL', 'soapee'),
                                    'type'        => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                    'placeholder' => esc_html__('http://team-link.com', 'soapee'),
                                ),
                                array(
                                    'name'      => 'team_social',
                                    'label'     => esc_html__('Member Social', 'soapee'),
                                    'type'      => \Elementor\Controls_Manager::HEADING,
                                    'separator' => 'before'
                                ),
                                array(
                                    'name'  => 'team_link_facebook',
                                    'label' => esc_html__('Facebook', 'soapee'),
                                    'type'  => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name'  => 'team_link_twitter',
                                    'label' => esc_html__('Twitter', 'soapee'),
                                    'type'  => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name'  => 'team_link_linkedin',
                                    'label' => esc_html__('Linkedin', 'soapee'),
                                    'type'  => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name'  => 'team_link_instagram',
                                    'label' => esc_html__('Instagram', 'soapee'),
                                    'type'  => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name'  => 'team_link_skype',
                                    'label' => esc_html__('Skype', 'soapee'),
                                    'type'  => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name'  => 'team_social_new_window',
                                    'label' => esc_html__('Open in new window', 'soapee'),
                                    'type'  => \Elementor\Controls_Manager::SWITCHER,
                                ),
                                array(
                                    'name'      => 'team_social_nofollow',
                                    'label'     => esc_html__('Add nofollow', 'soapee'),
                                    'type'      => \Elementor\Controls_Manager::SWITCHER,
                                    'separator' => 'after'
                                ),
                                array(
                                    'name'        => 'team_image',
                                    'label'       => esc_html__('Team Logo/Image', 'soapee'),
                                    'type'        => \Elementor\Controls_Manager::MEDIA,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ team_name }}}',
                        ),
                    )
                )
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);