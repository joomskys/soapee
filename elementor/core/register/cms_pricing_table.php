<?php
// Layout Section
$pricing_table_layout_section = array(
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
                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_pricing_table/layout/layout1.png'
                ],
                '2' => [
                    'label' => esc_html__( 'Layout 2', 'soapee' ),
                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_pricing_table/layout/layout2.png'
                ],
                '3' => [
                    'label' => esc_html__( 'Layout 3', 'soapee' ),
                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_pricing_table/layout/layout3.png'
                ]
            ],
            'prefix_class' => 'cms-pricing-layout-'
        ),
    ),
);

// Pricing Table Icon Section
$pricing_table_icon_section = array(
    'name'      => 'pricing_table_icon_section',
    'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
    'label'     => esc_html__('Icon', 'soapee'),
    'condition' => [
        'pricing_table_icon_switcher'  => 'true',
    ],
    'controls' => array(
        array(
            'name'             => 'pricing_table_icon_selection',
            'label'            => esc_html__('Select an Icon', 'soapee'),
            'type'             => \Elementor\Controls_Manager::ICONS,
            'fa4compatibility' => 'icon',
            'default'          => [
                'value' => 'fas fa-check',
                'library' => 'fa-solid',
            ],
        ),
    ),
);

// Pricing Table Title Section
$pricing_table_title_section = array(
    'name'      => 'pricing_table_title_section',
    'label'     => esc_html__('Title', 'soapee'),
    'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
    'condition' => [
        'pricing_table_title_switcher'  => 'true',
    ],
    'controls' => array(
        array(
            'name'        => 'pricing_table_title_text',
            'label'       => esc_html__('Text', 'soapee'),
            'type'        => \Elementor\Controls_Manager::TEXT,
            'default'     => esc_html__('Basic', 'soapee'),
            'label_block' => true,
        ),
        array(
            'name'        => 'image_before_title',
            'label'       => esc_html__('Image Before Title', 'soapee'),
            'type'        => \Elementor\Controls_Manager::MEDIA,
            'default'     => [],
            'label_block' => true,
        ),
        array(
            'name'        => 'image_after_title',
            'label'       => esc_html__('Image After Title', 'soapee'),
            'type'        => \Elementor\Controls_Manager::MEDIA,
            'default'     => [],
            'label_block' => true,
        )
    )
);

// Pricing Table Pricing Section
$pricing_table_price_section = array(
    'name'      => 'pricing_table_price_section',
    'label'     => esc_html__('Price', 'soapee'),
    'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
    'condition' => [
        'pricing_table_price_switcher'  => 'true',
    ],
    'controls' => array(
        array(
            'name'        => 'pricing_table_slashed_price_value',
            'label'       => esc_html__('Slashed Price', 'soapee'),
            'type'        => \Elementor\Controls_Manager::TEXT,
            'label_block' => true,
        ),
        array(
            'name'        => 'pricing_table_price_currency',
            'label'       => esc_html__('Currency', 'soapee'),
            'type'        => \Elementor\Controls_Manager::TEXT,
            'default'     => '$',
            'label_block' => true,
        ),
        array(
            'name'        => 'pricing_table_price_value',
            'label'       => esc_html__('Price', 'soapee'),
            'type'        => \Elementor\Controls_Manager::TEXT,
            'default'     => '29',
            'label_block' => true,
        ),
        array(
            'name'        => 'pricing_table_price_separator',
            'label'       => esc_html__('Divider', 'soapee'),
            'type'        => \Elementor\Controls_Manager::TEXT,
            'default'     => '',
            'label_block' => true,
        ),
        array(
            'name'        => 'pricing_table_price_duration',
            'label'       => esc_html__('Duration', 'soapee'),
            'type'        => \Elementor\Controls_Manager::TEXT,
            'default'     => 'Month',
            'label_block' => true,
        ),
    ),
);

// Pricing Table Icon List Section
$pricing_table_list_section = array(
    'name'      => 'pricing_table_list_section',
    'label'     => esc_html__('Pricing List', 'soapee'),
    'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
    'condition' => [
        'pricing_table_list_switcher'  => 'true',
    ],
    'controls' => array(
        array(
            'name'    => 'fancy_text_list_items',
            'label'   => esc_html__('Features', 'soapee'),
            'type'    => \Elementor\Controls_Manager::REPEATER,
            'default' => [
                [
                    'pricing_list_item_icon' => '',
                    'pricing_list_item_text' => esc_html__( '1 Bathroom cleaning', 'soapee' ),
                ],
                [
                    'pricing_list_item_icon' => '',
                    'pricing_list_item_text' => esc_html__( 'Up to 3 bedrooms cleaning', 'soapee' ),
                ],
                [
                    'pricing_list_item_icon' => '',
                    'pricing_list_item_text' => esc_html__( '1 Livingroom cleaning', 'soapee' ),
                ],
                [
                    'pricing_list_item_icon' => '',
                    'pricing_list_item_text' => esc_html__( 'Small kitchen (0 – 150 ft2)', 'soapee' ),
                ],
                [
                    'pricing_list_item_icon' => '',
                    'pricing_list_item_text' => esc_html__( 'Pets hair removing', 'soapee' ),
                ],
                [
                    'pricing_list_item_icon' => '',
                    'pricing_list_item_text' => esc_html__( 'Up to 2 additional rooms cleaning', 'soapee' ),
                ],
            ],
            'controls' => array(
                array(
                    'name'        => 'pricing_list_item_text',
                    'label'       => esc_html__('Text', 'soapee'),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ),
                array(
                    'name'             => 'pricing_list_item_icon',
                    'label'            => esc_html__('Icon', 'soapee'),
                    'type'             => \Elementor\Controls_Manager::ICONS,
                    'fa4compatibility' => 'icon',
                )
            ),
            'title_field'   => '<i class="{{ pricing_list_item_icon }}" aria-hidden="true"></i> {{{ pricing_list_item_text }}}',
        ),
    ),
);

// Pricing Table Description Section
$pricing_table_description_section = array(
    'name'      => 'pricing_table_description_section',
    'label'     => esc_html__('Description', 'soapee'),
    'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
    'condition' => [
        'pricing_table_description_switcher'  => 'true',
    ],
    'controls' => array(
        array(
            'name'    => 'pricing_table_description_text',
            'label'   => esc_html__('Description', 'soapee'),
            'type'    => \Elementor\Controls_Manager::WYSIWYG,
            'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'
        ),
    ),
);

// Pricing Table Button Section
$pricing_table_button_section = array(
    'name'      => 'pricing_table_button_section',
    'label'     => esc_html__('Button', 'soapee'),
    'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
    'condition' => [
        'pricing_table_button_switcher'  => 'true',
    ],
    'controls' => soapee_elementor_button_settings([
        'condition' => [],
        'btn_text'  => 'Start Cleaning'
    ])
);

// Pricing Table Badge Section
$pricing_table_bagde_section = array(
    'name'      => 'pricing_table_badge_section',
    'label'     => esc_html__('Badge', 'soapee'),
    'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
    'condition' => [
        'pricing_table_badge_switcher'  => 'true',
    ],
    'controls' => array(
        array(
            'name'        => 'pricing_table_badge_text',
            'label'       => esc_html__('Text', 'soapee'),
            'type'        => \Elementor\Controls_Manager::TEXT,
            'default'     => esc_html__('Popular' , 'soapee'),
            'label_block' => true,
        ),
    ),
);

// Pricing Table Settings Section
$pricing_table_title = array(
    'name'     => 'pricing_table_title',
    'label'    => esc_html__('Display Options', 'soapee'),
    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
    'controls' => array(
        array(
            'name'  => 'pricing_table_icon_switcher',
            'label' => esc_html__('Icon', 'soapee'),
            'type'  => \Elementor\Controls_Manager::SWITCHER,
        ),
        array(
            'name'    => 'pricing_table_title_switcher',
            'label'   => esc_html__('Title', 'soapee'),
            'type'    => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
        ),
        array(
            'name'    => 'pricing_table_price_switcher',
            'label'   => esc_html__('Price', 'soapee'),
            'type'    => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
        ),
        array(
            'name'    => 'pricing_table_list_switcher',
            'label'   => esc_html__('Features', 'soapee'),
            'type'    => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
        ),
        array(
            'name'  => 'pricing_table_description_switcher',
            'label' => esc_html__('Description', 'soapee'),
            'type'  => \Elementor\Controls_Manager::SWITCHER,
        ),
        array(
            'name'    => 'pricing_table_button_switcher',
            'label'   => esc_html__('Button', 'soapee'),
            'type'    => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
        ),
        array(
            'name'    => 'pricing_table_badge_switcher',
            'label'   => esc_html__('Badge', 'soapee'),
            'type'    => \Elementor\Controls_Manager::SWITCHER,
        ),
    ),
);
etc_add_custom_widget(
    array(
        'name'       => 'cms_pricing_table',
        'title'      => esc_html__('CMS Pricing Table', 'soapee'),
        'icon'       => 'eicon-price-table',
        'categories' => array(Elementor_Theme_Core::ETC_CATEGORY_NAME),
        'params'     => array(
            'sections' => array(
                $pricing_table_layout_section,
                $pricing_table_title_section,
                $pricing_table_bagde_section,
                $pricing_table_icon_section,
                $pricing_table_price_section,
                $pricing_table_list_section,
                $pricing_table_description_section,
                $pricing_table_button_section,
                $pricing_table_title
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);