<?php
/**
 * Change cart thumbnail size
 * Filter Hook: woocommerce_cart_item_thumbnail
*/
if(!function_exists('soapee_woocommerce_cart_item_thumbnail')){
	add_filter('woocommerce_cart_item_thumbnail', 'soapee_woocommerce_cart_item_thumbnail', 10, 3);
	function soapee_woocommerce_cart_item_thumbnail($thumbnail, $cart_item, $cart_item_key){
		$_product  = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
		$thumbnail = $_product->get_image('thumbnail');
		return $thumbnail;
	}
}

/**
 * Cart Actions
 * Wrap cart actions in to div
*/
if(!function_exists('soapee_woocommerce_cart_actions')){
	add_action('woocommerce_cart_actions', 'soapee_woocommerce_cart_actions', 0);
	function soapee_woocommerce_cart_actions(){
		?>
		<div class="cms-cart-actions row"><?php do_action('soapee_woocommerce_cart_actions'); ?></div>
		<?php
	}
}
/**
 * CMS cart action Coupon
*/
if(!function_exists('soapee_cart_actions_coupon')){
	add_action('soapee_woocommerce_cart_actions', 'soapee_cart_actions_coupon', 0);
	function soapee_cart_actions_coupon(){
		if ( wc_coupons_enabled() ) { ?>
			<div class="cms-coupon col">
				<div class="row">
					<div class="col mt-20">
						<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'soapee' ); ?>" />
					</div>
					<div class="col-12 col-xs-auto mt-20">
						<button type="submit" class="button" name="apply_coupon" value="<?php echo esc_attr_e( 'Apply coupon', 'soapee' ); ?>"><?php esc_html_e( 'Apply coupon', 'soapee' ); ?></button>
					</div>
					<div class="col-12 mt-20 empty-none"><?php do_action( 'woocommerce_cart_coupon' ); ?></div>
				</div>
			</div>
		<?php } 
	}
}
/**
 * CMS cart action Button
*/
if(!function_exists('soapee_cart_actions_button')){
	add_action('soapee_woocommerce_cart_actions', 'soapee_cart_actions_button', 0);
	function soapee_cart_actions_button(){
		?>
		<div class="cms-cart-actions-btn col-12 col-md-auto"><div class="row justify-content-end"><?php do_action('soapee_cart_actions_button'); ?></div></div>
		<?php
	}
}
/**
 * Update cart button
*/
if(!function_exists('soapee_woocommerce_update_cart_button')){
	add_action('soapee_cart_actions_button','soapee_woocommerce_update_cart_button',0);
	function soapee_woocommerce_update_cart_button(){
		?>
		<div class="col-auto mt-20">
			<button type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'soapee' ); ?>"><?php esc_html_e( 'Update cart', 'soapee' ); ?></button>
		</div>
		<?php
	}
}
/**
 * Clear Cart
*/
if(!function_exists('soapee_woocommerce_clear_cart')){
	add_action('soapee_cart_actions_button', 'soapee_woocommerce_clear_cart', 2);
	function soapee_woocommerce_clear_cart(){
		?>
			<div class="col-auto mt-20"><a class="btn cms-clear-cart" href="<?php echo esc_url( add_query_arg( 'empty_cart', 'yes' ) ); ?>"><?php esc_html_e( 'Empty Cart', 'soapee' ); 
			?></a></div>
		<?php
	}
}
if(!function_exists('soapee_woocommerce_empty_cart_action')){
	add_action( 'wp_loaded', 'soapee_woocommerce_empty_cart_action', 20 );
	function soapee_woocommerce_empty_cart_action() {
		if ( isset( $_GET['empty_cart'] ) && 'yes' === esc_html( $_GET['empty_cart'] ) ) {
			WC()->cart->empty_cart();
			$referer  = wp_get_referer() ? esc_url( remove_query_arg( 'empty_cart' ) ) : wc_get_cart_url();
			wp_safe_redirect( $referer );
		}
	}
}
/**
 * Add Continue Shopping Button
*/
if(!function_exists('soapee_woocommerce_return_to_shop')){
	add_action('soapee_cart_actions_button', 'soapee_woocommerce_return_to_shop', 2);
	function soapee_woocommerce_return_to_shop(){ ?>
		<div class="col-auto mt-20"><a class="btn cms-continue-shop" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>"><?php esc_html_e( 'Continue Shopping', 'soapee' ); 
		?></a></div>
	<?php
	}
}

/**
 * Change order of cart total and cross sells product
 * Cart collaterals hook.
 *
 * @hooked woocommerce_cross_sell_display
 * @hooked woocommerce_cart_totals - 10
 */
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cart_totals', 10 );
// call back
add_action( 'woocommerce_cart_collaterals', 'woocommerce_cart_totals', 0 );
add_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 1 );

// Cross Sells
if(!function_exists('soapee_woocommerce_cross_sells_columns')){
	add_filter('woocommerce_cross_sells_columns', 'soapee_woocommerce_cross_sells_columns');
	function soapee_woocommerce_cross_sells_columns($columns){
		$columns = soapee_get_opts('cross_sell_product_column', 3);
		return $columns;
	}
}
if(!function_exists('soapee_woocommerce_cross_sells_total')){
	add_filter('woocommerce_cross_sells_total', 'soapee_woocommerce_cross_sells_total');
	function soapee_woocommerce_cross_sells_total($limit){
		$limit = soapee_get_opts('cross_sell_product_total', 3);
		return $limit;
	}
}

/*
 * Process to checkout button
*/

if ( ! function_exists( 'woocommerce_button_proceed_to_checkout' ) ) {

	/**
	 * Output the proceed to checkout button.
	 */
	function woocommerce_button_proceed_to_checkout() {
		?><div class="mt-20 text-end">
			<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="checkout-button button">
				<?php esc_html_e( 'Proceed to checkout', 'soapee' ); ?>
			</a>
		</div><?php
	}
}