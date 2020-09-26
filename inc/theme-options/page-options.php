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

add_action( 'cms_post_metabox_register', 'soapee_page_options_register' );
function soapee_page_options_register( $metabox ) {
	if ( ! $metabox->isset_args( 'product' ) ) {
		$metabox->set_args( 'product', array(
			'opt_name'            => 'product_option',
			'display_name'        => esc_html__( 'Product Settings', 'soapee' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'page' ) ) {
		$metabox->set_args( 'page', array(
			'opt_name'            => soapee_get_page_opt_name(),
			'display_name'        => esc_html__( 'Page Settings', 'soapee' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	/**
	 * Config page meta options
	 *
	 */
	// Header Top
	$metabox->add_section('page', soapee_header_top_opts(['default' => true, 'default_value' => '-1']));
	// Main Header
	$metabox->add_section( 'page',  soapee_header_opts([
			'default'         => true,
			'default_value'   => '-1',
			'container_width' => '-1'
		])
	);
	// Ontop Header
	$metabox->add_section( 'page', soapee_header_ontop_opts([
			'default'       => true,
			'default_value' => '-1'
		])
	);
	// Sticky Header
	$metabox->add_section( 'page', soapee_header_sticky_opts([
			'default'       => true,
			'default_value' => '-1'
		])
	);
	// Navigation
	$metabox->add_section('page', soapee_navigation_opts());
	// Attribute:  search, cart, ...
	$metabox->add_section('page', soapee_header_atts_opts(['default' => true]));
	// Page title
	$metabox->add_section( 'page', soapee_page_title_opts(['default' => true, 'default_value' => '-1']));
	// Sidebar
	$metabox->add_section('page', soapee_sidebar_opts(['default' => true, 'subsection' => false]));
	// Footer 
	$metabox->add_section('page', soapee_footer_opts(['default' => true, 'default_value'=>'-1', 'subsection' => false]));
	$metabox->add_section('page', soapee_footer_top_opts(['default' => true, 'default_value'=>'-1', 'subsection' => true]));
	$metabox->add_section('page', soapee_footer_middle_opts(['default' => true, 'default_value'=>'-1', 'subsection' => true]));

	// Products
	$metabox->add_section( 'product',  soapee_header_opts([
			'default'       => true,
			'default_value' => '-1'
		])
	);
	$metabox->add_section( 'product', soapee_page_title_opts([
			'default' => true, 
			'default_value' => '-1'
		])
	);
}

function soapee_get_option_of_theme_options( $key, $default = '' ) {
	if ( empty( $key ) ) {
		return '';
	}
	$options = get_option( soapee_get_opt_name(), array() );
	$value   = isset( $options[ $key ] ) ? $options[ $key ] : $default;

	return $value;
}