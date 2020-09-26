<?php
// Register Quick Contact Widget
etc_add_custom_widget(
    array(
		'name'       => 'cms_quick_contact',
		'title'      => esc_html__( 'CMS Quick Contact', 'soapee' ),
		'icon'       => 'eicon-mail',
		'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_quick_contact/layout-image/layout1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__( 'Layout 2', 'soapee' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_quick_contact/layout-image/layout2.png'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
					'name'     => 'source_section',
					'label'    => esc_html__( 'Source Settings', 'soapee' ),
					'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
					'controls' => array_merge(
						array(
							array(
								'name'        => 'heading_text',
								'label'       => esc_html__( 'Heading', 'soapee' ),
								'type'        => \Elementor\Controls_Manager::TEXT,
								'default'     => 'Book Directly Or You Have Questions',
								'placeholder' => esc_html__( 'Enter your title', 'soapee' ),
								'label_block' => true,
	                        ),
	                        array(
								'name'        => 'description_text',
								'label'       => esc_html__( 'Description', 'soapee' ),
								'type'        => \Elementor\Controls_Manager::TEXTAREA,
								'default'     => 'Would you like to talk to us over the phone? Just submit your information and we will contact you shortly. You can also email us if you wish',
								'placeholder' => esc_html__( 'Enter your description', 'soapee' ),
								'rows'        => 10,
								'show_label'  => false,
	                        ),
	                        array(
								'name'     => 'contact_list',
								'label'    => esc_html__( 'Contact Lists', 'soapee' ),
								'type'     => \Elementor\Controls_Manager::REPEATER,
								'controls' => array(
	                                array(
										'name'        => 'contact_list_title_1',
										'label'       => esc_html__( 'Title 1', 'soapee' ),
										'type'        => \Elementor\Controls_Manager::TEXT,
										'placeholder' => esc_html__( 'Enter your text', 'soapee' ),
										'default'     => esc_html__( 'Enter your text', 'soapee' ),
										'label_block' => true,
	                                ),
	                                array(
										'name'        => 'contact_list_text_1',
										'label'       => esc_html__( 'Text 1', 'soapee' ),
										'type'        => \Elementor\Controls_Manager::TEXT,
										'placeholder' => esc_html__( 'Enter your text', 'soapee' ),
										'default'     => esc_html__( 'Enter your text', 'soapee' ),
										'label_block' => true,
	                                ),
	                                array(
										'name'        => 'contact_list_title_2',
										'label'       => esc_html__( 'Title 2', 'soapee' ),
										'type'        => \Elementor\Controls_Manager::TEXT,
										'placeholder' => esc_html__( 'Enter your text', 'soapee' ),
										'default'     => esc_html__( 'Enter your text', 'soapee' ),
										'label_block' => true,
	                                ),
	                                array(
										'name'        => 'contact_list_text_2',
										'label'       => esc_html__( 'Text 2', 'soapee' ),
										'type'        => \Elementor\Controls_Manager::TEXT,
										'placeholder' => esc_html__( 'Enter your text', 'soapee' ),
										'default'     => esc_html__( 'Enter your text', 'soapee' ),
										'label_block' => true,
	                                ),
	                                array(
										'name'             => 'contact_list_icon',
										'label'            => esc_html__( 'Icon', 'soapee' ),
										'type'             => \Elementor\Controls_Manager::ICONS,
										'fa4compatibility' => 'icon',
										'default'          => [],
			                        ),
	                            ),
	                            'default' => [
	                                [
										'contact_list_title_1' => 'Address:',
										'contact_list_text_1'  => 'Fargo Bank, 355 S Grand Ave, Suite 100 San Francisco, LA 94107 United States',
										'contact_list_title_2' => '',
										'contact_list_text_2'  => '',
										'contact_list_icon'    => [
											'value'   => 'fas fa-map-marker',
											'library' => 'fa-solid',
										]
	                                ],
	                                [
	                                    'contact_list_title_1' => 'Mail:',
	                                    'contact_list_text_1' => 'info@cmssuperheros.com',
	                                    'contact_list_title_2' => 'Phone:',
	                                    'contact_list_text_2' => '01692 333 555 (Free Consulting 24 / 7)',
	                                    'contact_list_icon'  => [
											'value'   => 'fas fa-mail-box',
											'library' => 'fa-solid',
										]
	                                ],
	                                [
	                                    'contact_list_title_1' => 'Open:',
	                                    'contact_list_text_1' => 'Monday - Friday: 8.00am - 7.00pm',
	                                    'contact_list_title_2' => 'Close:',
	                                    'contact_list_text_2' => 'Saturday - Sunday - Holiday',
	                                    'contact_list_icon'  => [
											'value'   => 'fas fa-clock',
											'library' => 'fa-solid',
										]
	                                ]
	                            ],
	                            'title_field' => '{{{ contact_list_title_1 }}} {{{ contact_list_text_1 }}}',
	                        )
	                    ),
                        soapee_elementor_button_settings()
                    ),
                )
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);