<?php
/**
 * Register metabox for posts based on Redux Framework. Supported methods:
 *     isset_args( $post_type )
 *     set_args( $post_type, $redux_args, $metabox_args )
 *     add_section( $post_type, $sections )
 * Each post type can contains only one metabox. Pease note that each field id
 * leads by an underscore sign ( _ ) in order to not show that into Custom Field
 * Metabox from WordPress core feature.
 *
 * @param  CMS_Post_Metabox $metabox
 */
add_action( 'cms_post_metabox_register', 'soapee_service_options_register' );

function soapee_service_options_register( $metabox ) {
	if ( ! $metabox->isset_args( 'cms-service' ) ) {
		$metabox->set_args( 'cms-service', array(
			'opt_name'     => 'cms_service_option',
			'display_name' => esc_html__( 'Service Settings', 'soapee' ),
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	/**
	 * Config service meta options
	 *
	 */
	//Icon
	$metabox->add_section( 'cms-service', array(
		'title'      => esc_html__( 'Icon', 'soapee' ),
		'subsection' => false,
		'fields'     => array(
			array(
				'id'       => 'cms_service_icon',
				'type'     => 'cms_iconpicker',
				'title'    => esc_html__( 'Choose your icon', 'soapee' ),
				'subtitle' => esc_html__( 'This icon will use in shortcode', 'soapee' )
			),
			array(
				'id'       => 'cms_service_start_from',
				'type'     => 'text',
				'title'    => esc_html__( 'Start From', 'soapee' ),
				'subtitle' => esc_html__( 'Enter your minimum cost for this service per square meter', 'soapee' )
			)
		)
	));
	//Features
	$metabox->add_section( 'cms-service', array(
		'title'      => esc_html__( 'Features', 'soapee' ),
		'subsection' => false,
		'fields'     => array(
			array(
				'id'       => 'cms_service_feature',
				'type'     => 'multi_text',
				'title'    => esc_html__( 'Add your features', 'soapee' ),
				'subtitle' => esc_html__( 'This feature will use in shortcode', 'soapee' )
			)
		)
	));
	//Brochure
	$metabox->add_section( 'cms-service', array(
		'title'      => esc_html__( 'Brochure', 'soapee' ),
		'subsection' => false,
		'fields'     => array(
			array(
				'id'       => 'cms_service_brochure_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Brochure Text', 'soapee' ),
				'subtitle' => esc_html__( 'Enter your text', 'soapee' )
			),
			array(
				'id'       => 'cms_service_brochure_file_1',
				'type'     => 'media',
				'mode'		=> false,
				'title'    => esc_html__( 'Brochure File 1', 'soapee' ),
				'subtitle' => esc_html__( 'Upload your file', 'soapee' )
			),
			array(
				'id'       => 'cms_service_brochure_file_2',
				'type'     => 'media',
				'mode'		=> false,
				'title'    => esc_html__( 'Brochure File 2', 'soapee' ),
				'subtitle' => esc_html__( 'Upload your file', 'soapee' )
			),
			array(
				'id'       => 'cms_service_brochure_file_3',
				'type'     => 'media',
				'mode'		=> false,
				'title'    => esc_html__( 'Brochure File 3', 'soapee' ),
				'subtitle' => esc_html__( 'Upload your file', 'soapee' )
			),
			array(
				'id'       => 'cms_service_brochure_file_4',
				'type'     => 'media',
				'mode'		=> false,
				'title'    => esc_html__( 'Brochure File 4', 'soapee' ),
				'subtitle' => esc_html__( 'Upload your file', 'soapee' )
			),
			array(
				'id'       => 'cms_service_brochure_file_5',
				'type'     => 'media',
				'mode'		=> false,
				'title'    => esc_html__( 'Brochure File 5', 'soapee' ),
				'subtitle' => esc_html__( 'Upload your file', 'soapee' )
			)
		)
	) );
	// Work Together
	/*$metabox->add_section( 'cms-case-study', array(
		'title'      => esc_html__( 'Work Together', 'soapee' ),
		'subsection' => false,
		'fields'     => array(
			array(
				'id'       => 'cms_service_work_together_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Title', 'soapee' ),
				'subtitle' => esc_html__( 'Enter your text', 'soapee' ),
				'default'  => esc_html__('Let’s Start Work Together','soapee')
			),
			array(
				'id'       => 'cms_service_work_together_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Description', 'soapee' ),
				'subtitle' => esc_html__( 'Enter your text', 'soapee' ),
				'default'  => esc_html__('Please feel free to contact us. We will get back to you with 1-2 business days. Or just call us now.','soapee')
			),
			array(
				'id'       => 'cms_service_work_together_phone',
				'type'     => 'text',
				'title'    => esc_html__( 'Phone', 'soapee' ),
				'subtitle' => esc_html__( 'Enter your phone number', 'soapee' ),
				'default'  => '+84 33 861 3333'
			),
			array(
				'id'       => 'cms_service_work_together_mail',
				'type'     => 'text',
				'title'    => esc_html__( 'Mail', 'soapee' ),
				'subtitle' => esc_html__( 'Enter your mail', 'soapee' ),
				'default'  => 'info@cmssuperheroes.com'
			),
			array(
				'id'       => 'cms_service_work_together_address',
				'type'     => 'text',
				'title'    => esc_html__( 'Address', 'soapee' ),
				'subtitle' => esc_html__( 'Enter your address', 'soapee' ),
				'default'  => '37 San Fairport, NY 14450'
			),
			array(
				'id'           => 'cms_service_work_together_contact_text',
				'type'         => 'text',
				'title'        => esc_html__('Button Text', 'soapee'),
				'default'      => 'Contact Us Now!',
	        ),
			array(
				'id'       => 'cms_service_work_together_contact_page',
				'type'     => 'select',
				'title'    => esc_html__( 'Contact', 'soapee' ),
				'subtitle' => esc_html__( 'Choose a page for contact', 'soapee' ),
				'data'  => 'page',
	            'args'  => array(
	                'post_type'      => 'page',
	                'posts_per_page' => -1,
	                'orderby'        => 'title',
	                'order'          => 'ASC',
	            )
			)
		)
	) );*/
}