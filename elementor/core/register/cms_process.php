<?php
// Register Process Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_process',
        'title'      => esc_html__('CMS Process', 'soapee'),
        'icon'       => 'eicon-counter',
        'categories' => array(Elementor_Theme_Core::ETC_CATEGORY_NAME),
        'scripts'    => array(),
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'soapee' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array_merge(
                        array(soapee_elementor_text_align()),
                        soapee_column_settings(),
                        array(
                            array(
                                'name'    => 'layout',
                                'label'   => esc_html__( 'Templates', 'soapee' ),
                                'type'    => Elementor_Theme_Core::LAYOUT_CONTROL,
                                'default' => '1',
                                'options' => [
                                    '1' => [
                                        'label' => esc_html__( 'Layout 1', 'soapee' ),
                                        'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_process/layout/layout1.png'
                                    ]
                                ],
                                'prefix_class' => 'cms-process-layout-',
                            )
                        )
                    )
                ),
                array(
                    'name'     => 'section_process',
                    'label'    => esc_html__('Process', 'soapee'),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'    => 'process',
                            'label'   => esc_html__('Add your process', 'soapee'),
                            'type'    => \Elementor\Controls_Manager::REPEATER,
                            'default' => [
                                [
                                    'process_name' => 'Online Scheduling',
                                    'process_icon' => [],
                                    'process_desc' => 'Book & pay online. We’ll match you with a trusted, experienced house cleaner',
                                ],
                                [
                                    'process_name' => 'Clean Carefully',
                                    'process_icon' => [],
                                    'process_desc' => 'Every cleaner is friendly and reliable. They’ve been background-checked & rated 5-stars',
                                ],
                                [
                                    'process_name' => 'Enjoy Cleanliness',
                                    'process_icon' => [],
                                    'process_desc' => 'Now, enjoy the cleanliness of your beloved home, if there are errors we guarantee 100%',
                                ],
                            ],
                            'controls' => array(
                                array(
                                    'name'             => 'process_icon',
                                    'label'            => esc_html__( 'Icon', 'soapee' ),
                                    'type'             => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                    'default'          => [
                                        'value'   => 'fas fa-star',
                                        'library' => 'fa-solid',
                                    ]
                                ),
                                array(
                                    'name'        => 'process_name',
                                    'label'       => esc_html__('Process Name', 'soapee'),
                                    'type'        => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                    'default'     => ''
                                ),
                                array(
                                    'name'        => 'process_desc',
                                    'label'       => esc_html__('Process Description', 'soapee'),
                                    'type'        => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                    'default'     => ''
                                )
                            ),
                            'title_field' => '{{{ process_name }}}',
                        ),
                    )
                )
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);