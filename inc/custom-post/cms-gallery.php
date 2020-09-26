<?php
if(!function_exists('soapee_cpt_gallery')){
	//add_filter( 'cms_extra_post_types', 'soapee_cpt_gallery' );
	function soapee_cpt_gallery( $postypes ) {
		$gallery_slug = soapee_get_opt( 'gallery_slug', 'cms-gallery' );
		$postypes['gallery'] = array(
			'status'     => true,
			'item_name'  => esc_html__( 'Gallery', 'soapee' ),
			'items_name' => esc_html__( 'Gallery', 'soapee' ),
			'args'       => array(
				'menu_icon'          => 'dashicons-format-gallery',
				'supports'           => array(
					'title',
					'thumbnail',
				),
				'public'             => true,
				'publicly_queryable' => true,
				'rewrite'             => array(
	                'slug'  => $gallery_slug
	 		 	),
			),
			'labels'     => array()
		);
		return $postypes;
	}
}

if(!function_exists('soapee_add_tax_gallery')){
	//add_filter( 'cms_extra_taxonomies', 'soapee_add_tax_gallery' );
	function soapee_add_tax_gallery( $taxonomies ) {
		$taxonomies['gallery-category'] = array(
			'status'     => true,
			'post_type'  => array( 'cms-gallery' ),
			'taxonomy'   => esc_html__( 'Gallery Category', 'soapee' ),
			'taxonomies' => esc_html__( 'Gallery Categories', 'soapee' ),
			'args'       => array(),
			'labels'     => array()
		);

		return $taxonomies;
	}
}