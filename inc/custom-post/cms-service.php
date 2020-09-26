<?php
if(!function_exists('soapee_cpt_service')){
	add_filter( 'cms_extra_post_types', 'soapee_cpt_service' );
	function soapee_cpt_service( $postypes ) {
		$service_slug = soapee_get_opt( 'service_slug', 'cms-service' );
		$postypes['cms-service'] = array(
			'status'     => true,
			'item_name'  => esc_html__( 'CMS Service', 'soapee' ),
			'items_name' => esc_html__( 'CMS Services', 'soapee' ),
			'args'       => array(
				'menu_icon'          => 'dashicons-share-alt',
				'supports'           => array(
					'title',
					'thumbnail',
					'editor', 
					'excerpt',
					'comments'
				),
				'public'             => true,
				'publicly_queryable' => true,
				'rewrite'            => array(
	                'slug'  => $service_slug
	 		 	),
			),
			'labels'     => array()
		);
		return $postypes;
	}
}

if(!function_exists('soapee_add_tax_service')){
	add_filter( 'cms_extra_taxonomies', 'soapee_add_tax_service' );
	function soapee_add_tax_service( $taxonomies ) {
		$taxonomies['service-category'] = array(
			'status'     => true,
			'post_type'  => array( 'cms-service' ),
			'taxonomy'   => esc_html__( 'Service Category', 'soapee' ),
			'taxonomies' => esc_html__( 'Service Categories', 'soapee' ),
			'args'       => array(),
			'labels'     => array()
		);

		return $taxonomies;
	}
}
/**
 * Services Icons
**/
if(!function_exists('soapee_service_icon')){
	function soapee_service_icon($args = []){
		$args = wp_parse_args($args, [
			'id'         => null,
			'class'      => '',
			'icon_class' => ''
		]);
		$icon = soapee_get_post_format_value($args['id'], 'cms_service_icon');
		if(empty($icon)) return;
		?>
		<div class="<?php echo esc_attr(soapee_nice_class(implode(' ', ['cms-service-icon', $args['class']]))); ?>">
			<span class="<?php echo esc_attr(soapee_nice_class(implode(' ', ['cms-icon', $args['icon_class'], $icon]))); ?>"></span>
		</div>
		<?php
	}
}
/**
 * Services Minimum Cose
**/
if(!function_exists('soapee_service_minimum_cost')){
	function soapee_service_minimum_cost($args = []){
		$args = wp_parse_args($args, [
			'id'         => null,
			'class'      => ''
		]);
		if(get_post_type($args['id']) != 'cms-service') return;
		$cost = soapee_get_post_format_value($args['id'], 'cms_service_start_from','30');
		if(empty($cost)) return;
		?>
		<div class="<?php echo esc_attr(soapee_nice_class(implode(' ', ['cms-min-cost', $args['class']]))); ?>"><?php printf(esc_html__('Starting from %s', 'soapee'), '<span class="text-accent font-700">$'.$cost.'/m<sup>2</sup></span>'); ?></div>
		<?php
	}
}

/**
 * Services features list 
**/
if(!function_exists('soapee_service_features_list')){
	function soapee_service_features_list($args = []){
		$args = wp_parse_args($args, [
			'id'    => null,
			'class' => ''
		]);
		if(get_post_type($args['id']) != 'cms-service') return;
		$features = soapee_get_post_format_value($args['id'], 'cms_service_feature', [
			0 => "Recurring Cleaning",
			1 => "Occasional Cleaning",
			2 => "Apartment Cleaning",
			3 => "Special Event Cleaning",
			4 => "Housekeeping Services",
			5 => "Move Out &amp; Move in Cleaning",
			6 => "Refrigerator Cleaning",
			7 => "Oven Cleaning",
			8 => "Restaurants"
		]);
		if(empty($features[0])) return;
		?>
		<ul class="<?php echo esc_attr(soapee_nice_class(implode(' ', ['cms-list cms-list-checked-circle', $args['class']])));?>">
			<?php foreach ($features as $feature) {
				echo '<li>'.wp_strip_all_tags($feature).'</li>';
			} ?>
		</ul>
		<?php
	}
}

