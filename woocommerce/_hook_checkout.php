<?php
// add inner wrap div to order review columns
if(!function_exists('soapee_woocommerce_checkout_order_review_inner_open')){
	add_action('woocommerce_checkout_order_review','soapee_woocommerce_checkout_order_review_inner_open', 0);
	function soapee_woocommerce_checkout_order_review_inner_open(){
		echo '<div class="cms-woocommerce-checkout-review-order-inner p-30 bg-accent">';
	}
}
if(!function_exists('soapee_woocommerce_checkout_order_review_inner_close')){
	add_action('woocommerce_checkout_order_review','soapee_woocommerce_checkout_order_review_inner_close', 999);
	function soapee_woocommerce_checkout_order_review_inner_close(){
		echo '</div>';
	}
}
// add heading to order review columns
if(!function_exists('soapee_woocommerce_checkout_order_review')){
	add_action('woocommerce_checkout_order_review','soapee_woocommerce_checkout_order_review', 1);
	function soapee_woocommerce_checkout_order_review(){ ?>
		<div id="cms-order-review-heading" class="h2 text-white text-uppercase"><?php esc_html_e( 'Your order', 'soapee' ); ?></div>
	<?php }
}

// Place order button 
if(!function_exists('soapee_woocommerce_order_button_html')){
	add_filter('woocommerce_order_button_html', 'soapee_woocommerce_order_button_html');
	function soapee_woocommerce_order_button_html(){
		$order_button_text  =  apply_filters( 'woocommerce_order_button_text', esc_html__( 'Place order', 'soapee' ) );
		return '<button type="submit" class="button" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '">' . esc_html( $order_button_text ) . '</button>';
	}
}
