<?php
if(!function_exists('wooscp_init')) return;
//hide default compare button on product archive page
if(!function_exists('soapee_filter_wooscp_button_archive')){
	add_filter( 'filter_wooscp_button_archive', 'soapee_filter_wooscp_button_archive' );
	function soapee_filter_wooscp_button_archive() { 
		return '0'; 
	}
}
//hide default compare button on product single page
if(!function_exists('soapee_filter_wooscp_button_single')){
	add_filter( 'filter_wooscp_button_single', 'soapee_filter_wooscp_button_single' );
	function soapee_filter_wooscp_button_single() { 
		return '0'; 
	}
}
// add compare to product archive page 
if(!function_exists('soapee_wooscp_loop_product')){
	add_action('soapee_shop_loop_overlay_content_midde', 'soapee_wooscp_loop_product', 9);
	function soapee_wooscp_loop_product(){
		echo do_shortcode('[wooscp]');
	}
}
// add compare button affter add-to-cart button on single product page
if(!function_exists('soapee_wooscp_after_add_to_cart_button')){
	add_filter('woocommerce_after_add_to_cart_button', 'soapee_wooscp_after_add_to_cart_button');
	function soapee_wooscp_after_add_to_cart_button(){
		echo do_shortcode('[wooscp]');
	}
}