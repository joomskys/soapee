<?php
if(!function_exists('soapee_cpt_footer')){
	//add_filter( 'cms_extra_post_types', 'soapee_cpt_footer' );
	function soapee_cpt_footer( $postypes ) {
		$footer_slug = soapee_get_opt( 'footer_slug', 'cms-footer' );
		$postypes['cms-footer'] = array(
			'status'     => true,
			'item_name'  => esc_html__( 'CMS Footer', 'soapee' ),
			'items_name' => esc_html__( 'CMS Footers', 'soapee' ),
			'args'       => array(
				'menu_icon'          => 'dashicons-share-alt',
				'supports'           => array(
					'title',
					'thumbnail',
					'editor', 
				),
				'public'             => true,
				'publicly_queryable' => true,
				'rewrite'            => array(
	                'slug'  => $footer_slug
	 		 	),
			),
			'labels'     => array()
		);
		return $postypes;
	}
}