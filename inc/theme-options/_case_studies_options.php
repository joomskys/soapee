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
add_action( 'cms_post_metabox_register', 'soapee_case_study_options_register' );

function soapee_case_study_options_register( $metabox ) {
	if ( ! $metabox->isset_args( 'cms-case-study' ) ) {
		$metabox->set_args( 'cms-case-study', array(
			'opt_name'     => 'cms_case_study_option',
			'display_name' => esc_html__( 'Case Study Settings', 'soapee' ),
			//'class'        => 'fully-expanded',
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	/**
	 * Config case study meta options
	 *
	 */
	// Gallery 
	$metabox->add_section( 'cms-case-study', array(
		'title'      => esc_html__( 'Gallery', 'soapee' ),
		'fields'     => array(
			array(
				'id'       => 'cms_case_study_gallery',
				'type'     => 'gallery',
				'title'    => esc_html__( 'Gallery Images ', 'soapee' ),
				'subtitle' => esc_html__( 'Upload images or add from media library.', 'soapee' )
			)
		)
	) );
	// The Contract
	$metabox->add_section( 'cms-case-study', array(
		'title'      => esc_html__( 'The Contract', 'soapee' ),
		'fields'     => array(
			array(
				'id'       => 'cms_case_study_contract',
				'type'     => 'editor',
				'title'    => esc_html__( 'The Contract', 'soapee' ),
				'subtitle' => esc_html__( 'Enter your text', 'soapee' )
			)
		)
	) );
	// Ideals Introduction
	$metabox->add_section( 'cms-case-study', array(
		'title'  => esc_html__( 'Ideals Introduction', 'soapee' ),
		'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'cms_case_study_ideal_introduction',
				'type'     => 'editor',
				'title'    => esc_html__( 'Ideals Introduction', 'soapee' ),
				'subtitle' => esc_html__( 'Enter your text', 'soapee' )
			)
		)
	) );
	// Our Approach
	$metabox->add_section( 'cms-case-study', array(
		'title'  => esc_html__( 'Our Approach', 'soapee' ),
		'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'cms_case_study_approach',
				'type'     => 'editor',
				'title'    => esc_html__( 'Our Approach', 'soapee' ),
				'subtitle' => esc_html__( 'Enter your text', 'soapee')
			)
		)
	) );
	// Outcome
	$metabox->add_section( 'cms-case-study', array(
		'title'  => esc_html__( 'Outcome', 'soapee' ),
		'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'cms_case_study_outcome',
				'type'     => 'editor',
				'title'    => esc_html__( 'Outcome', 'soapee' ),
				'subtitle' => esc_html__( 'Enter your text', 'soapee' )
			)
		)
	) );
	//Detail
	$metabox->add_section( 'cms-case-study', array(
		'title'      => esc_html__( 'Detail', 'soapee' ),
		'fields'     => array(
			array(
				'id'       => 'cms_case_study_client',
				'type'     => 'text',
				'title'    => esc_html__( 'Client', 'soapee' ),
				'subtitle' => esc_html__( 'Enter your client name', 'soapee' )
			),
			array(
				'id'       => 'cms_case_study_project_type',
				'type'     => 'text',
				'title'    => esc_html__( 'Project Type', 'soapee' ),
				'subtitle' => esc_html__( 'Enter your project type', 'soapee' )
			),
			array(
				'id'       => 'cms_case_study_complete_date',
				'type'     => 'text',
				'title'    => esc_html__( 'Completion Date', 'soapee' ),
				'subtitle' => esc_html__( 'Enter your Completion date', 'soapee' ),
				'desc'	   => esc_html__('Date format is: dd/mm/yy','soapee'),
				'placeholder' => 'dd/mm/yy'
			),
			array(
				'id'       => 'cms_case_study_location',
				'type'     => 'text',
				'title'    => esc_html__( 'Location', 'soapee' ),
				'subtitle' => esc_html__( 'Enter your Location', 'soapee' )
			)
		)
	) );
	//Brochure
	$metabox->add_section( 'cms-case-study', array(
		'title'      => esc_html__( 'Brochure', 'soapee' ),
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'cms_case_study_brochure_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Brochure Text', 'soapee' ),
				'subtitle' => esc_html__( 'Enter your text', 'soapee' )
			),
			array(
				'id'       => 'cms_case_study_brochure_file_1',
				'type'     => 'media',
				'mode'		=> false,
				'title'    => esc_html__( 'Brochure File 1', 'soapee' ),
				'subtitle' => esc_html__( 'Upload your file', 'soapee' )
			),
			array(
				'id'       => 'cms_case_study_brochure_file_2',
				'type'     => 'media',
				'mode'		=> false,
				'title'    => esc_html__( 'Brochure File 2', 'soapee' ),
				'subtitle' => esc_html__( 'Upload your file', 'soapee' )
			),
			array(
				'id'       => 'cms_case_study_brochure_file_3',
				'type'     => 'media',
				'mode'		=> false,
				'title'    => esc_html__( 'Brochure File 3', 'soapee' ),
				'subtitle' => esc_html__( 'Upload your file', 'soapee' )
			),
			array(
				'id'       => 'cms_case_study_brochure_file_4',
				'type'     => 'media',
				'mode'		=> false,
				'title'    => esc_html__( 'Brochure File 4', 'soapee' ),
				'subtitle' => esc_html__( 'Upload your file', 'soapee' )
			),
			array(
				'id'       => 'cms_case_study_brochure_file_5',
				'type'     => 'media',
				'mode'		=> false,
				'title'    => esc_html__( 'Brochure File 5', 'soapee' ),
				'subtitle' => esc_html__( 'Upload your file', 'soapee' )
			)
		)
	) );
	// Work Together
	$metabox->add_section( 'cms-case-study', array(
		'title'      => esc_html__( 'Work Together', 'soapee' ),
		'subsection' => false,
		'fields'     => array(
			array(
				'id'       => 'cms_case_study_work_together_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Title', 'soapee' ),
				'subtitle' => esc_html__( 'Enter your text', 'soapee' ),
				'default'  => esc_html__('Let’s Start Work Together','soapee')
			),
			array(
				'id'       => 'cms_case_study_work_together_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Description', 'soapee' ),
				'subtitle' => esc_html__( 'Enter your text', 'soapee' ),
				'default'  => esc_html__('Please feel free to contact us. We will get back to you with 1-2 business days. Or just call us now.','soapee')
			),
			array(
				'id'       => 'cms_case_study_work_together_phone',
				'type'     => 'text',
				'title'    => esc_html__( 'Phone', 'soapee' ),
				'subtitle' => esc_html__( 'Enter your phone number', 'soapee' ),
				'default'  => '+84 33 861 3333'
			),
			array(
				'id'       => 'cms_case_study_work_together_mail',
				'type'     => 'text',
				'title'    => esc_html__( 'Mail', 'soapee' ),
				'subtitle' => esc_html__( 'Enter your mail', 'soapee' ),
				'default'  => 'info@cmssuperheroes.com'
			),
			array(
				'id'       => 'cms_case_study_work_together_address',
				'type'     => 'text',
				'title'    => esc_html__( 'Address', 'soapee' ),
				'subtitle' => esc_html__( 'Enter your address', 'soapee' ),
				'default'  => '37 San Fairport, NY 14450'
			),
			array(
				'id'           => 'cms_case_study_work_together_contact_text',
				'type'         => 'text',
				'title'        => esc_html__('Button Text', 'soapee'),
				'default'      => 'Contact Us Now!',
	        ),
			array(
				'id'       => 'cms_case_study_work_together_contact_page',
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
	) );
}