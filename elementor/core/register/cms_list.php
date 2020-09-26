<?php
// Register Progress Bar Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_list',
        'title'      => esc_html__( 'CMS List', 'soapee' ),
        'icon'       => 'eicon-bullet-list',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_list/layout/layout1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__( 'Layout 2', 'soapee' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_list/layout/layout2.png'
                                ],
                                '3' => [
                                    'label' => esc_html__( 'Layout 3', 'soapee' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_list/layout/layout3.png'
                                ]
                            ],
                            'prefix_class' => 'cms-list-layout-'
                        ),
                        array(
                            'name'             => 'default_selected_icon',
                            'label'            => esc_html__( 'Default Icon', 'soapee' ),
                            'type'             => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'default'          => [],
                            'condition' => [
                                'layout'    => ['2', '3']                            
                            ],
                        ),
                    )
                ),
                array(
                    'name'     => 'source_section',
                    'label'    => esc_html__( 'Source Settings', 'soapee' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'     => 'cms_list',
                            'label'    => esc_html__( 'Lists', 'soapee' ),
                            'type'     => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name'        => 'title',
                                    'label'       => esc_html__( 'Title', 'soapee' ),
                                    'type'        => \Elementor\Controls_Manager::TEXT,
                                    'placeholder' => esc_html__( 'Enter your title', 'soapee' ),
                                    'label_block' => true,
                                    ''
                                ),
                                array(
                                    'name'             => 'selected_icon',
                                    'label'            => esc_html__( 'Icon', 'soapee' ),
                                    'type'             => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                    'default'          => [],
                                    /*'condition' => [
                                        'layout'    => ['2']                            
                                    ],*/
                                ),
                                array(
                                    'name'        => 'description',
                                    'label'       => esc_html__( 'Description', 'soapee' ),
                                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                    'placeholder' => esc_html__( 'Enter your text', 'soapee' ),
                                    'label_block' => true,
                                    /*'condition'  => [
                                        'layout' => ['1']
                                    ]*/
                                )
                            ),
                            'default'   => [
                                [
                                    'title'         => 'Instant online booking with 7am-11pm availability',
                                    'description' => 'Book online instantly, and schedule your first cleaning for as early as tomorrow. Get your home cleaned anytime from 7am to 11pm, 7 days a week.',
                                ],
                                [
                                    'title'       => 'Friendly, vetted professionals',
                                    'description' => 'All professionals on the SCleaner platform are screened, background checked, and are rated by customers like you to ensure quality.',
                                ],
                                [
                                    'title'       => 'Cleaned the way you want',
                                    'description' => 'Professionals bring supplies and work from a comprehensive checklist that you can tailor to your liking. You can work with the same cleaner every time. SCleaner strives to match you with the right professional for you and your home. We also provide you with a team of professionals to provide backup in case of scheduling conflicts.',
                                ],
                                [
                                    'title'       => 'See the progress of your cleaning from your phone',
                                    'description' => 'Not able to be home during the cleaning? No problem. The SCleaner app allows your to see when your cleaner arrives and check the progress of their cleaning.',
                                ],
                                [
                                    'title'       => 'The SCleaner Happiness Guarantee',
                                    'description' => 'Your happiness is our goal. If you\'re not satisfied with the quality of the service, we\'ll send another pro to make it right at no extra charge.',
                                ],
                                [
                                    'title'       => 'Flexible scheduling',
                                    'description' => 'Set a schedule that fits your life. SCleaner helps you automatically schedule your weekly, biweekly, or monthly cleaning, so you can focus on the other things in your life. Reschedule or adjust the frequency of your cleanings as needed. Get the benefit of a regularly cleaned home. Easy and secure online payments. No more last minute runs to the bank. Pay online and tip at your discretion.',
                                ]
                            ],
                            'title_field' => '{{{ elementor.helpers.renderIcon( this, selected_icon, {}, "i", "panel" ) || \'<i class="{{ icon }}" aria-hidden="true"></i>\' }}} {{{ title }}}',
                        )
                    )
                )
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);