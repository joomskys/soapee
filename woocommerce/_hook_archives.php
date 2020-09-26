<?php
// remove page title on archive page
add_filter('woocommerce_show_page_title', function(){ return false;});
/**
 * Custom archive notices, catalog order and result count
*/
remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
// add custom layout for notices
if(!function_exists('soapee_woocommerce_output_all_notices')){
	add_action('woocommerce_before_shop_loop','soapee_woocommerce_output_all_notices', 10);
	add_action('soapee_woocommerce_output_all_notices', 'woocommerce_output_all_notices');
	function soapee_woocommerce_output_all_notices(){
	?>
		<div class="cms-wc-all-notices empty-none"><?php do_action('soapee_woocommerce_output_all_notices'); ?></div>
	<?php
	}
}
// add custom layout for catalog order and result count
if(!function_exists('soapee_woocommerce_catalog_result')){
	add_action('woocommerce_before_shop_loop','soapee_woocommerce_catalog_result', 20);
	add_action('soapee_woocommerce_catalog_ordering', 'woocommerce_catalog_ordering');
	add_action('soapee_woocommerce_result_count', 'woocommerce_result_count');
	function soapee_woocommerce_catalog_result(){
	?>
		<div class="row justify-content-between align-items-center">
			<div class="col-md-12 col-lg-auto order-lg-2 mb-30">
				<?php do_action('soapee_woocommerce_catalog_ordering'); ?>
			</div>
			<div class="col mb-30">
				<?php do_action('soapee_woocommerce_result_count'); ?>
			</div>
		</div>
	<?php
	}
}

/**
 * Custom products layout on archive page
 * 
*/
// Loop products columns 
/**
 * Change number of column that are displayed per page (shop page)
 * Return column number
*/
add_filter( 'loop_shop_columns', 'soapee_loop_shop_columns', 20 ); 
function soapee_loop_shop_columns() {
	$columns          = soapee_get_opts('products_columns', 3);
	$sidebar_position = soapee_get_opts('sidebar_pos', 'bottom');
	if(is_active_sidebar('sidebar-product') && $sidebar_position !== 'bottom') {
		if(class_exists('WPcleverWoosq') && class_exists('WPcleverWoosw') && class_exists('WPcleverWooscp'))
			$columns = $columns ; //- 1;
		else 
			$columns = $columns ; //- 1;
	} elseif(class_exists('WPcleverWoosq') && class_exists('WPcleverWoosw') && class_exists('WPcleverWooscp') && $sidebar_position !== 'bottom'){
		$columns = $columns ; //- 1;
	}
  return $columns;
}

/**
 * Change number of products that are displayed per page (shop page)
 * $limit contains the current number of products per page based on the value stored on Options -> Reading
 * Return the number of products you wanna show per page.
 * 
 */
add_filter( 'loop_shop_per_page', 'soapee_loop_shop_per_page', 20 );
function soapee_loop_shop_per_page( $limit ) {
  $limit = soapee_get_opts('product_per_page', 9);
  return $limit;
}

// add div wrap
add_action('woocommerce_before_shop_loop_item', function(){ echo '<div class="cms-overlay-wrap">';}, 0);
add_action('woocommerce_after_shop_loop_item', function(){ echo '</div>';}, 9999);

// wrap product image by div
if(!function_exists('soapee_wrap_products_thumbnail_open')){
	add_action('woocommerce_before_shop_loop_item', 'soapee_wrap_products_thumbnail_open', 1);
	function soapee_wrap_products_thumbnail_open(){
		echo '<div class="cms-products-thumb text-center relative">';
	}
}
if(!function_exists('soapee_wrap_products_thumbnail_close')){
	add_action('woocommerce_before_shop_loop_item', 'soapee_wrap_products_thumbnail_close', 999);
	function soapee_wrap_products_thumbnail_close(){
		echo '</div>';
	}
}
// product thumbnail & sale flash
remove_action('woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash', 10);
remove_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail', 10);

add_action('woocommerce_before_shop_loop_item','woocommerce_template_loop_product_thumbnail', 10);
add_action('woocommerce_before_shop_loop_item','woocommerce_show_product_loop_sale_flash', 11);
// add products overlay content
if(!function_exists('soapee_shop_loop_overlay_content')){
	add_action('woocommerce_before_shop_loop_item', 'soapee_shop_loop_overlay_content', 12);
	// add-to-cart-button on bottom of overlay
	remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
	add_action('soapee_shop_loop_overlay_content_end', 'woocommerce_template_loop_add_to_cart', 10);
	function soapee_shop_loop_overlay_content(){
	?>
		<div class="cms-overlay-content cms-overlay-center-to-side">
			<div class="cms-overlay-content-inner row justify-content-center h-100">
				<div class="cms-overlay-content-top col-12 align-self-start"><?php 
					do_action('soapee_shop_loop_overlay_content_top'); 
					?></div>
				<div class="cms-overlay-content-middle col-12 align-self-center cms-icon-list"><?php 
					do_action('soapee_shop_loop_overlay_content_midde'); 
				?></div>
				<div class="cms-overlay-content-end col-12 align-self-end cms-bottom-to-top bg-secondary text-center transition d-flex"><?php 
					do_action('soapee_shop_loop_overlay_content_end'); 
				?></div>
			</div>
		</div>
	<?php
	}
}
// Loop Icon add-to-cart
if(!function_exists('soapee_loop_add_to_cart_icon')){
	//add_action('soapee_shop_loop_overlay_content_midde', 'soapee_loop_add_to_cart_icon');
	function soapee_loop_add_to_cart_icon($args=[]){
		global $product;
		if ( $product ) {
			$defaults = array(
				'quantity'   => 1,
				'class'      => implode(
					' ',
					array_filter(
						array(
							'cms-icon cms-icon-46 brd-3 bdr-solid bdr-white bdr-hover-accent text-white text-hover-accent',
							'product_type_' . $product->get_type(),
							//'add_to_cart_button',
							$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
							$product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
						)
					)
				),
				'attributes' => array(
					'data-product_id'  => $product->get_id(),
					'data-product_sku' => $product->get_sku(),
					'aria-label'       => $product->add_to_cart_description(),
					'rel'              => 'nofollow',
				),
				'icon' => 'fa fa-shopping-cart'
			);

			$args = apply_filters( 'soapee_woocommerce_loop_add_to_cart_icon_args', wp_parse_args( $args, $defaults ), $product );

			if ( isset( $args['attributes']['aria-label'] ) ) {
				$args['attributes']['aria-label'] = wp_strip_all_tags( $args['attributes']['aria-label'] );
			}

			echo sprintf(
				'<a href="%s" data-quantity="%s" class="%s" %s><span class="%s"></span></a>',
				esc_url( $product->add_to_cart_url() ),
				esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
				esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
				isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
				$args['icon']
			);
		}
	}
}
// Loop add-to-cart button with custom text
if(!function_exists('soapee_loop_add_to_cart_button')){
	function soapee_loop_add_to_cart_button($product, $args=[]){
		if ( $product ) {
			$defaults = array(
				'quantity'   => 1,
				'class'      => implode(
					' ',
					array_filter(
						array(
							'button',
							'cms-add-to-cart-button',
							'product_type_' . $product->get_type(),
							//'add_to_cart_button',
							$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
							$product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
						)
					)
				),
				'attributes' => array(
					'data-product_id'  => $product->get_id(),
					'data-product_sku' => $product->get_sku(),
					'aria-label'       => $product->add_to_cart_description(),
					'rel'              => 'nofollow',
				),
				'text' => esc_html__('Add to cart','soapee')
			);

			$args = apply_filters( 'soapee_woocommerce_loop_add_to_cart_button_args', wp_parse_args( $args, $defaults ), $product );

			if ( isset( $args['attributes']['aria-label'] ) ) {
				$args['attributes']['aria-label'] = wp_strip_all_tags( $args['attributes']['aria-label'] );
			}

			echo sprintf(
				'%1$s<a href="%2$s" data-quantity="%3$s" class="%4$s" %5$s><span class="cms-text">%6$s</span></a>%7$s',
				'<div class="woocommerce cms-woocommerce">',
				esc_url( $product->add_to_cart_url() ),
				esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
				esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
				isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
				$args['text'],
				'</div>'
			);
		}
	}
}
/*
 * Loop product title & rating
 * wrap product title & rating in to row 
 */
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
// remove link on product image
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
// add link to product title
//add_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_link_open', 1 );
//add_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_link_close', 9998 );

if(!function_exists('soapee_woocommerce_shop_loop_item_title')){
	add_action('woocommerce_shop_loop_item_title', 'soapee_woocommerce_shop_loop_item_title', 0);
	function soapee_woocommerce_shop_loop_item_title(){
		?>
			<div class="row align-items-center pb-15">
				<div class="col"><?php 
					woocommerce_template_loop_product_link_open();
					woocommerce_template_loop_product_title(); 
					woocommerce_template_loop_product_link_close();
				?></div>
				<div class="col-12 col-sm-auto empty-none"><?php woocommerce_template_loop_rating(); ?></div>
			</div>
		<?php
	}
}
// Loop default add to cart button
if(!function_exists('soapee_woocommerce_loop_add_to_cart_args')){
	add_filter('woocommerce_loop_add_to_cart_args', 'soapee_woocommerce_loop_add_to_cart_args');
	function soapee_woocommerce_loop_add_to_cart_args($args){
		global $product;
			$args['class'] = isset($args['class']) ? $args['class'] : [];
			$args['class'] .= ' cms-add-to-cart-btn text-13 text-va-70 text-uppercase font-600 p-tb-13 d-block cms-bg-secondary cms-bg-hover-primary text-primary text-hover-white col';
			$class = explode(' ', $args['class']);
			unset($class[0]);
			$args['class'] = implode(' ', $class);
			$args['text'] = $product->add_to_cart_text();
			$args['icon'] = 'fas fa-cart-plus';
			$args['icon_loading'] = 'fas fa-spinner';
			$args['icon_added'] = 'fas fa-shopping-cart';
			$args['icon_post'] = 'after';
		return $args;
	}
}
if(!function_exists('soapee_woocommerce_loop_add_to_cart_link')){
	add_filter('woocommerce_loop_add_to_cart_link', 'soapee_woocommerce_loop_add_to_cart_link', 10 , 3);
	function soapee_woocommerce_loop_add_to_cart_link($button, $product, $args){
		$args['icon'] = '<span class="cms-btn-icon cms-default-icon '.$args['icon'].'"></span>'.
						 '<span class="cms-btn-icon cms-loading-icon fa-spin '.$args['icon_loading'].'"></span>'.
						 '<span class="cms-btn-icon cms-added-icon '.$args['icon_added'].'"></span>';
		$button = sprintf(
			'<a href="%s" data-quantity="%s" class="%s" %s>%s<span class="cms-btn-text">%s</span>%s</a>',
			esc_url( $product->add_to_cart_url() ),
			esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
			esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
			isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
			($args['icon_post'] == 'before') ? $args['icon'] : '',
			esc_html( $args['text'] ),
			($args['icon_post'] == 'after') ? $args['icon'] : ''
		);
		return $button;
	}
}

// make some change to default add-to-cart button
if ( ! function_exists( 'woocommerce_template_loop_add_to_cart_x' ) ) {

	/**
	 * Get the add to cart template for the loop.
	 *
	 * @param array $args Arguments.
	 */
	function woocommerce_template_loop_add_to_cart_x( $args = array() ) {
		global $product;

		if ( $product ) {
			$defaults = array(
				'quantity'   => 1,
				'class'      => implode(
					' ',
					array_filter(
						array(
							'button',
							'product_type_' . $product->get_type(),
							$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
							$product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
						)
					)
				),
				'attributes' => array(
					'data-product_id'  => $product->get_id(),
					'data-product_sku' => $product->get_sku(),
					'aria-label'       => $product->add_to_cart_description(),
					'rel'              => 'nofollow',
				),
			);

			$args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );

			if ( isset( $args['attributes']['aria-label'] ) ) {
				$args['attributes']['aria-label'] = wp_strip_all_tags( $args['attributes']['aria-label'] );
			}

			wc_get_template( 'loop/add-to-cart.php', $args );
		}
	}
}
// Wrap products infor by div 
if(!function_exists('soapee_loop_product_content_open')){
	add_action('woocommerce_before_shop_loop_item', 'soapee_loop_product_content_open', 1000);
	function soapee_loop_product_content_open(){
		echo '<div class="cms-products-content pt-20 pb-10 bg-white">';
	}
}
if(!function_exists('soapee_loop_product_content_close')){
	add_action('woocommerce_after_shop_loop_item', 'soapee_loop_product_content_close', 999);
	function soapee_loop_product_content_close(){
		echo '</div>';
	}
}
// Loop product title 
if ( ! function_exists( 'woocommerce_template_loop_product_title' ) ) {
	/**
	 * Show the product title in the product loop. By default this is an H2.
	 */
	function woocommerce_template_loop_product_title() {
		echo '<span class="h3 text-25 text-va-20">' . get_the_title() . '</span>';
	}
}
// Loop product sale flash 
if(!function_exists('soapee_woocommerce_show_product_loop_sale_flash')){
	add_filter('woocommerce_sale_flash', 'soapee_woocommerce_show_product_loop_sale_flash', 10, 3 );
	function soapee_woocommerce_show_product_loop_sale_flash($flash, $post, $product){
		if( $product->is_type('variable')){
	        $percentages = array();
	        // Get all variation prices
	        $prices = $product->get_variation_prices();
	        // Loop through variation prices
	        foreach( $prices['price'] as $key => $price ){
	            // Only on sale variations
	            if( $prices['regular_price'][$key] !== $price ){
	                // Calculate and set in the array the percentage for each variation on sale
	                $percentages[] = (floatval( $prices['regular_price'][ $key ] ) - floatval( $price ) ) / floatval( $prices['regular_price'][ $key ] ) * 100;
	            }
	        }
	        // We keep the lowest and highest value
	        $min_percentage = round(min($percentages), 2);
	        $max_percentage = round(max($percentages), 2);
	        if($min_percentage < $max_percentage)
	    		$percentage = $min_percentage.'%' . ' - ' . $max_percentage.'%';
	    	else 
	    		$percentage = $max_percentage.'%';
	    } elseif ($product->is_type('grouped')){
	    	$tax_display_mode = get_option( 'woocommerce_tax_display_shop' );
			$child_prices     = $percentages = array();
			$children         = array_filter( array_map( 'wc_get_product', $product->get_children() ), 'wc_products_array_filter_visible_grouped' );

			foreach ( $children as  $child ) {
				
				$regular_price = (float) $child->get_regular_price();
	        	$sale_price    = (float) $child->get_sale_price();
				if ( '' !== $child->get_price() ) {
					$child_prices[] = 'incl' === $tax_display_mode ? wc_get_price_including_tax( $child ) : wc_get_price_excluding_tax( $child );
				}

				if($sale_price != '') $percentages[]    = round(100 - ($sale_price / $regular_price * 100));
			}

			if ( ! empty( $child_prices ) ) {
				$min_price = min( $child_prices );
				$max_price = max( $child_prices );

				$min_percentage = round(min($percentages), 2);
				$max_percentage = round(max($percentages), 2);
			} else {
				$min_price = '';
				$max_price = '';
				$min_percentage = '';
				$max_percentage = '';
			}

	    	if($min_percentage < $max_percentage)
	    		$percentage = $min_percentage.'%' . ' - ' . $max_percentage.'%';
	    	else 
	    		$percentage = $max_percentage.'%';
	    } else {
	        $regular_price = (float) $product->get_regular_price();
	        $sale_price    = (float) $product->get_sale_price();
	        $percentage    = round(100 - ($sale_price / $regular_price * 100)).'%';
	    }
	    $class = is_singular() ? 'single' : '';
	    $flash = '<span class="cms-onsale '.$class.' cms-bg-accent text-white lh-30 p-lr-25 bdr-radius-15">' 
		    . esc_html__( 'Sale', 'soapee' ) . ' ' . $percentage 
	    	.'</span>';
	    return $flash;
	}
}
// paginate links
add_filter('woocommerce_pagination_args', 'soapee_woocommerce_pagination_args');
function soapee_woocommerce_pagination_args($default){
	$default = array_merge($default, [
		'prev_text' => soapee_pagination_prev_text(),
		'next_text' => soapee_pagination_next_text(),
		'type'      => 'plain',
	]);
	return $default;
}