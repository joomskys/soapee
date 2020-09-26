<?php
/**
 * Filter name:  woocommerce_enqueue_styles
*/
if(!function_exists('soapee_woocommerce_enqueue_styles')){
	add_filter('woocommerce_enqueue_styles', 'soapee_woocommerce_enqueue_styles');
	function soapee_woocommerce_enqueue_styles(){
		$theme = wp_get_theme( get_template() );
		$version = $theme->get( 'Version' );
		return [];
	}
}