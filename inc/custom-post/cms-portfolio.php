<?php
// remove support post type portfolio
if(!function_exists('soapee_remove_post_type_portfolio')){
	add_filter('cms_extra_post_types','soapee_remove_post_type_portfolio');
	function soapee_remove_post_type_portfolio($post_types){
		$post_types['portfolio'] = array(
			'status' => false
		);
		return $post_types;
	}
}