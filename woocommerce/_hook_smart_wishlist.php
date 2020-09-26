<?php
if(!function_exists('woosw_init')) return;
//hide default wishlist button on products archive page
if(!function_exists('soapee_woosw_button_position_archive')){
	add_filter( 'woosw_button_position_archive', 'soapee_woosw_button_position_archive' );
	function soapee_woosw_button_position_archive() { 
		return '0'; 
	}
}

//hide default wishlist button on product single page
if(!function_exists('soapee_woosw_button_position_single')){
	add_filter( 'woosw_button_position_single', 'soapee_woosw_button_position_single');
	function soapee_woosw_button_position_single(){
	    return '0';
	}
}

// add wishlist to product archive page 
if(!function_exists('soapee_woosw_loop_product')){
	add_action('soapee_shop_loop_overlay_content_midde', 'soapee_woosw_loop_product', 9);
	function soapee_woosw_loop_product(){
		echo do_shortcode('[woosw]'); //type="link"
	}
}
// add wishlist button affter add-to-cart button on single product page
if(!function_exists('soapee_woosw_after_add_to_cart_button')){
	add_filter('woocommerce_after_add_to_cart_button', 'soapee_woosw_after_add_to_cart_button');
	function soapee_woosw_after_add_to_cart_button(){
		echo do_shortcode('[woosw]');
	}
}