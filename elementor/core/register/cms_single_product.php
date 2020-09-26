<?php
if(!class_exists('WooCommerce')) return;
// Register Tabs Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_single_product',
        'title'      => esc_html__( 'CMS Single Product', 'soapee' ),
        'icon'       => 'eicon-single-product',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts'    => [],
        'params'     => array(
            'sections' => array(
                array(
                    'name'     => 'section_layout',
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_single_product/layout-img/layout1.png'
                                ]
                            ],
                            'prefix_class' => 'cms-single-product-'
                        )
                    )
                ),
                array(
                    'name'     => 'section_product',
                    'label'    => esc_html__( 'Product', 'soapee' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'      => 'product_id',
                            'label'     => esc_html__( 'Choose your product', 'soapee' ),
                            'type'      => \Elementor\Controls_Manager::SELECT,
                            'options'   => soapee_list_post('product', 'ID'),
                            'default'   => ''
                        ),
                        array(
                            'name'      => 'normal_price_label',
                            'label'     => esc_html__( 'Normal Price Label', 'soapee' ),
                            'type'      => \Elementor\Controls_Manager::TEXT,
                            'default'   => 'Normal Price:'
                        ),
                        array(
                            'name'      => 'normal_price_suffix',
                            'label'     => esc_html__( 'Normal Price Suffix', 'soapee' ),
                            'type'      => \Elementor\Controls_Manager::TEXT,
                            'default'   => 'per hour'
                        ),
                        array(
                            'name'      => 'sale_price_label',
                            'label'     => esc_html__( 'Sale Price Label', 'soapee' ),
                            'type'      => \Elementor\Controls_Manager::TEXT,
                            'default'   => 'Preferential Price:'
                        ),
                        array(
                            'name'      => 'sale_price_suffix',
                            'label'     => esc_html__( 'Normal Price Suffix', 'soapee' ),
                            'type'      => \Elementor\Controls_Manager::TEXT,
                            'default'   => 'per hour'
                        ),
                        array(
                            'name'      => 'required_label',
                            'label'     => esc_html__( 'Request Label', 'soapee' ),
                            'type'      => \Elementor\Controls_Manager::TEXT,
                            'default'   => 'Request:'
                        ),
                        array(
                            'name'      => 'required_text',
                            'label'     => esc_html__( 'Request Text', 'soapee' ),
                            'type'      => \Elementor\Controls_Manager::TEXT,
                            'default'   => 'Minimum of 4 hours per cleaning visit'
                        ), 
                        array(
                            'name'      => 'expires_date_label',
                            'label'     => esc_html__( 'Expires Date Label', 'soapee' ),
                            'type'      => \Elementor\Controls_Manager::TEXT,
                            'default'   => 'Expires Date:'
                        ),
                        array(
                            'name'      => 'add_to_cart_type',
                            'label'     => esc_html__( 'Button Type', 'soapee' ),
                            'type'      => \Elementor\Controls_Manager::SELECT,
                            'options'   => [
                                'add_to_cart' => esc_html__('Add to cart','soapee'),
                                'view_detail' => esc_html__('View Detail', 'soapee'),
                                'page'        => esc_html__('Internal Page', 'soapee')
                            ],
                            'default'   => 'add_to_cart'
                        ),
                        array(
                            'name'        => 'add_to_cart_link',
                            'label'       => esc_html__( 'Link', 'soapee' ),
                            'type'        => \Elementor\Controls_Manager::SELECT,
                            'default'     => '',
                            'options'     => soapee_elementor_list_page_opts(),
                            'condition' => ['add_to_cart_type' => 'page'],
                        ),
                    )
                )
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);