<?php
if(!function_exists('soapee_cpt_team')){
	//add_filter( 'cms_extra_post_types', 'soapee_cpt_team' );
	function soapee_cpt_team( $postypes ) {
		$postypes['cms-team'] = array(
			'status'     => true,
			'item_name'  => esc_html__( 'CMS Team', 'soapee' ),
			'items_name' => esc_html__( 'CMS Teams', 'soapee' ),
			'args'       => array(
				'menu_icon'          => 'dashicons-admin-users',
				'public'             => true,
				'publicly_queryable' => true,
				'supports'           => array(
					'title',
					//'thumbnail',
					'editor',
				),
			),
			'labels'     => array()
		);
		return $postypes;
	}
}
if(!function_exists('soapee_cpt_tax_team')){
	//add_filter( 'cms_extra_taxonomies', 'soapee_cpt_tax_team' );
	function soapee_cpt_tax_team( $taxonomies ) {
		$taxonomies['cms-team-tag'] = array(
			'status'       => true,
			'post_type'    => array( 'cms-team' ),
			'taxonomy'     => esc_html__( 'Team Tag', 'soapee' ),
			'taxsoapeemy' => esc_html__( 'Team Tag', 'soapee' ),
			'taxonomies'   => esc_html__( 'Team Tags', 'soapee' ),
			'args'         => array(),
			'labels'       => array()
		);
		return $taxonomies;
	}
}

// Team Meta 
/**
 * Register metabox for CMS Team based on Redux Framework. Supported methods:
 *     isset_args( $post_type )
 *     set_args( $post_type, $redux_args, $metabox_args )
 *     add_section( $post_type, $sections )
 * Each post type can contains only one metabox. Pease note that each field id
 * leads by an underscore sign ( _ ) in order to not show that into Custom Field
 * Metabox from WordPress core feature.
 *
 * @param  CMS_Post_Metabox $metabox
 */
if(!function_exists('soapee_team_meta_opts')){
	add_action( 'cms_post_metabox_register', 'soapee_team_meta_opts' );
	function soapee_team_meta_opts( $metabox ) {
		if ( ! $metabox->isset_args( 'cms-team' ) ) {
			$metabox->set_args( 'cms-team', array(
				'opt_name'            => 'post_option',
				'display_name'        => esc_html__( 'CMS Team Settings', 'soapee' ),
				'show_options_object' => false,
			), array(
				'context'  => 'advanced',
				'priority' => 'default'
			) );
		}
		// Page title
		$metabox->add_section( 'cms-team', soapee_page_title_opts(['default' => true]));
	}
}