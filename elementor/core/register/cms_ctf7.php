<?php
// Register Contact Form 7 Widget
if(class_exists('WPCF7')) {
    $cf7 = get_posts('post_type="wpcf7_contact_form"&numberposts=-1');
    $contact_forms = array();
    if ($cf7) {
        foreach ($cf7 as $cform) {
            $contact_forms[$cform->ID] = $cform->post_title;
        }
    } else {
        $contact_forms[esc_html__('No contact forms found', 'soapee')] = 0;
    }

    etc_add_custom_widget(
        array(
            'name'       => 'cms_ctf7',
            'title'      => esc_html__('CMS Contact Form 7', 'soapee'),
            'icon'       => 'eicon-form-horizontal',
            'categories' => array(Elementor_Theme_Core::ETC_CATEGORY_NAME),
            'scripts'    => array(),
            'params'     => array(
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
                                        'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_ctf7/layout/layout1.png'
                                    ],
                                    '2' => [
                                        'label' => esc_html__( 'Layout 2', 'soapee' ),
                                        'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_ctf7/layout/layout2.png'
                                    ],
                                    '3' => [
                                        'label' => esc_html__( 'Layout 3', 'soapee' ),
                                        'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_ctf7/layout/layout3.png'
                                    ],
                                    '4' => [
                                        'label' => esc_html__( 'Layout 4', 'soapee' ),
                                        'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_ctf7/layout/layout4.png'
                                    ]
                                ],
                                'prefix_class' => 'cms-cf7-layout-'
                            )
                        )
                    ),
                    array(
                        'name'     => 'source_section',
                        'label'    => esc_html__('Source Settings', 'soapee'),
                        'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                        'controls' => array(
                            array(
                                'name'        => 'form_title',
                                'label'       => esc_html__( 'Form Title', 'soapee' ),
                                'type'        => \Elementor\Controls_Manager::TEXT,
                                'default'     => '',
                                'placeholder' => esc_html__( 'Enter Form title', 'soapee' ),
                                'label_block' => true,
                            ),
                            array(
                                'name'        => 'form_desc',
                                'label'       => esc_html__( 'Form Description', 'soapee' ),
                                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                'default'     => '',
                                'placeholder' => esc_html__( 'Enter your text', 'soapee' ),
                                'label_block' => true,
                            ),
                            array(
                                'name'    => 'ctf7_id',
                                'label'   => esc_html__('Select Form', 'soapee'),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'options' => $contact_forms,
                            )
                        )
                    ),
                    array(
                        'name'     => 'image_section',
                        'label'    => esc_html__('Banner Settings', 'soapee'),
                        'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                        'controls' => array(
                            array(
                                'name'        => 'form_banner',
                                'label'       => esc_html__( 'Choose your banner', 'soapee' ),
                                'type'        => \Elementor\Controls_Manager::MEDIA,
                                'label_block' => true,
                                'condition'   => [
                                    'layout' => ['1', '2']
                                ]
                            ),
                            array(
                                'name'         => 'thumbnail_size',
                                'type'         => \Elementor\Group_Control_Image_Size::get_type(),
                                'control_type' => 'group',
                                'default'      => 'full',
                                'condition'   => [
                                    'form_banner!' => ''
                                ]
                            )
                        ),
                        'condition' => [
                            'layout' => ['1','2']
                        ]
                    ),
                    array(
                        'name'     => 'icon_section',
                        'label'    => esc_html__('Icon Settings', 'soapee'),
                        'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                        'controls' => array(
                            array(
                                'name'             => 'selected_icon',
                                'label'            => esc_html__( 'Icon', 'soapee' ),
                                'type'             => \Elementor\Controls_Manager::ICONS,
                                'fa4compatibility' => 'icon',
                                'default'          => [
                                    'value'   => 'far fa-paper-plane',
                                    'library' => 'fa-regular',
                                ]
                            ),
                            array(
                                'name'         => 'icon_size',
                                'type'  => \Elementor\Controls_Manager::SLIDER,
                                'range' => [
                                    'px' => [
                                        'min' => 20,
                                        'max' => 200,
                                    ]
                                ],
                                'size_units' => ['px'],
                                'default' => [
                                    'unit' => 'px',
                                    'size' => 50,
                                ],
                            )
                        ),
                        'condition' => [
                            'layout' => ['2', '4']
                        ]
                    )
                )
            )
        ),
        get_template_directory() . '/elementor/core/widgets/'
    );
}