<?php
/**
 * Build Single Product Gallery and Summary layout 
 *
*/
if(!function_exists('soapee_woocommerce_before_single_product_summary')){
	add_action('woocommerce_before_single_product_summary','soapee_woocommerce_before_single_product_summary', 0);
	function soapee_woocommerce_before_single_product_summary(){
		$classes = ['cms-wc-img-summary cms-single-product-gallery-summary-wraps row', soapee_get_opts('soapee_product_gallery_layout', soapee_configs('soapee_product_gallery_layout'))];
		$class = soapee_get_opts('soapee_product_gallery_thumb_position', soapee_configs('soapee_product_gallery_thumb_position'));
		echo '<div class="'.trim(implode(' ', $classes)).'">';
			echo '<div class="cms-single-product-gallery-wraps col-md-6 thumbnail-'.esc_attr($class).'">
				<div class="cms-single-product-gallery-wraps-inner relative">';
				do_action('soapee_before_single_product_gallery');
				do_action('soapee_single_product_gallery');
				do_action('soapee_adter_single_product_gallery');
			
	}
}
// close gallery column  and open summary column
if(!function_exists('soapee_woocommerce_single_gallery_close')){
	add_action('woocommerce_before_single_product_summary', 'soapee_woocommerce_single_gallery_close', 999);
	function soapee_woocommerce_single_gallery_close(){
		echo '</div></div>';
			echo '<div class="cms-single-product-summary-wrap col-md-6">';
	}
}

// close summary columns and close galery-sumary row
if(!function_exists('soapee_woocommerce_after_single_product_summary')){
	add_action('woocommerce_after_single_product_summary', 'soapee_woocommerce_after_single_product_summary', 0);
	function soapee_woocommerce_after_single_product_summary(){
			echo '</div>';
		echo '</div>';
	}
}
// Remove default sale flash and gallery 
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
// Get back sale flash and galley 
add_action('soapee_before_single_product_gallery', 'woocommerce_show_product_sale_flash', 1);
add_action('soapee_single_product_gallery', 'woocommerce_show_product_images', 1);

/**
 * Add Custom CSS class to Gallery
*/
add_filter('woocommerce_single_product_image_gallery_classes','soapee_woocommerce_single_product_image_gallery_classes');
function soapee_woocommerce_single_product_image_gallery_classes($class){
	$class[] = 'cms-product-gallery-'.soapee_get_opts('soapee_product_gallery_layout', soapee_configs('soapee_product_gallery_layout'));
	$class[] = 'cms-product-gallery-'.soapee_get_opts('soapee_product_gallery_thumb_position', soapee_configs('soapee_product_gallery_thumb_position'));
	unset($class[3]);
	return $class;
}

/**
 * Single Product 
 *
 * Gallery style with thumbnail carousel in bottom
 *
*/
if(!function_exists('soapee_wc_single_product_gallery_layout')){
	add_filter('woocommerce_single_product_carousel_options', 'soapee_wc_single_product_gallery_layout' );
    function soapee_wc_single_product_gallery_layout($options){
        $gallery_layout = soapee_get_opts('soapee_product_gallery_layout', soapee_configs('soapee_product_gallery_layout'));

        $options['prevText']     = '<span class="flex-prev-icon"></span>';
		$options['nextText']     = '<span class="flex-next-icon"></span>';

        switch ($gallery_layout) {
	        case 'vertical':
				$options['directionNav'] = true;
				$options['controlNav']   = false;
	            $options['sync'] = '.wc-gallery-sync';
	            break;
	    
	        case 'horizontal':
	            $options['directionNav'] = true;
				$options['controlNav']   = false;
	            $options['sync'] = '.wc-gallery-sync';
	            break;
	    }
	    return $options;
    }
}

/**
 * Single Product Gallery
 *
 * Add thumbnail product gallery 
 *
*/
if(!function_exists('soapee_product_gallery_thumbnail_sync')){
	add_action('soapee_single_product_gallery', 'soapee_product_gallery_thumbnail_sync', 2);
	function soapee_product_gallery_thumbnail_sync($args=[]){
		global $product;
		$gallery_layout = soapee_get_opts('soapee_product_gallery_layout', soapee_configs('soapee_product_gallery_layout'));
		$product_gallery_thumb_position = soapee_get_opts('soapee_product_gallery_thumb_position', soapee_configs('soapee_product_gallery_thumb_position'));
        $args = wp_parse_args($args, [
            'gallery_layout' => $gallery_layout
        ]);
        $post_thumbnail_id = $product->get_image_id();
    	$attachment_ids = array_merge( (array)$post_thumbnail_id , $product->get_gallery_image_ids() );

        if('simple' === $args['gallery_layout'] || empty($attachment_ids[0])) return;
        $flex_class = '';

        $thumb_v_w = soapee_configs('soapee_product_gallery_thumbnail_v_w');
        $thumb_v_h = soapee_configs('soapee_product_gallery_thumbnail_v_h');

        $thumb_h_w = soapee_configs('soapee_product_gallery_thumbnail_h_w');
        $thumb_h_h = soapee_configs('soapee_product_gallery_thumbnail_h_h');

        

        switch ($args['gallery_layout']) {
	        case 'vertical':
				$thumbnail_size = $thumb_v_w.'x'.$thumb_v_h;
				$thumb_w        = $thumb_v_w;
				$thumb_h        = $thumb_v_h;
				$flex_class     = 'flex-vertical';
				$thumb_margin   = soapee_configs('soapee_product_gallery_thumbnail_space_vertical');
	            break;
	    
	        case 'horizontal':
	            $thumbnail_size = $thumb_h_w.'x'.$thumb_h_h;
	            $thumb_w = $thumb_h_w;
	            $thumb_h = $thumb_h_h;
	            $flex_class = 'flex-horizontal';
	            $thumb_margin   = soapee_configs('soapee_product_gallery_thumbnail_space_horizontal');
	            break;

	    }
	    $gallery_css_class = ['wc-gallery-sync', 'thumbnail-'.$gallery_layout, 'thumbnail-pos-'.$product_gallery_thumb_position];
    ?>
    	<div class="<?php echo trim(implode(' ', $gallery_css_class));?>" data-thumb-w="<?php echo esc_attr($thumb_w);?>" data-thumb-h="<?php echo esc_attr($thumb_h);?>" data-thumb-margin="<?php echo esc_attr($thumb_margin); ?>">
			<div class="wc-gallery-sync-slides flexslider <?php echo esc_attr($flex_class);?>">
	            <?php foreach ( $attachment_ids as $attachment_id ) { ?>
	                <div class="wc-gallery-sync-slide flex-control-thumb"><?php soapee_image_by_size(['id' => $attachment_id, 'size' => $thumbnail_size]);?></div>
	            <?php } ?>
	        </div>
	    </div>
    <?php
	}
}

// single product title
if ( ! function_exists( 'woocommerce_template_single_title' ) ) {
	/**
	 * Output the product title.
	 */
	function woocommerce_template_single_title() {
		the_title('<div class="product-title h3 text-25 text-va-30 lh-35 mb-8">', '</div>');
	}
}
// single price 
add_filter('woocommerce_product_price_class', function(){
	return 'text-20 text-primary lh-30 font-500 price';
});

// move rating to after price
remove_action('woocommerce_single_product_summary','woocommerce_template_single_rating', 10);
add_action('woocommerce_single_product_summary','woocommerce_template_single_rating', 11);

/**
 * Get HTML for ratings.
 *
 * @since  3.0.0
 * @param  float $rating Rating being shown.
 * @param  int   $count  Total number of ratings.
 * @return string
 */
if(!function_exists('soapee_woocommerce_product_get_rating_html')){
	add_filter('woocommerce_product_get_rating_html', 'soapee_woocommerce_product_get_rating_html', 10, 3);
	function soapee_woocommerce_product_get_rating_html( $html, $rating, $count) {
		$label = sprintf( __( 'Rated %s out of 5', 'soapee' ), $rating );
		$html  = '<div class="cms-star-rating" role="img" aria-label="' . esc_attr( $label ) . '">' . wc_get_star_rating_html( $rating, $count ) . '</div>';
		return $html;
	}
}
/**
 * Get HTML for star rating.
 *
 * @since  3.1.0
 * @param  float $rating Rating being shown.
 * @param  int   $count  Total number of ratings.
 * @return string
 */
if (!function_exists('soapee_woocommerce_get_star_rating_html')) {
	add_filter('woocommerce_get_star_rating_html', 'soapee_woocommerce_get_star_rating_html', 10, 3);
	function soapee_woocommerce_get_star_rating_html( $html, $rating, $count ) {
		$html = '<span class="cms-star-rated" style="width:' . ( ( $rating / 5 ) * 100 ) . '%">';
		/*if ( 0 < $count ) {
			// translators: 1: rating 2: rating count
			$html .= sprintf( _n( 'Rated %1$s out of 5 based on %2$s customer rating', 'Rated %1$s out of 5 based on %2$s customer ratings', $count, 'soapee' ), '<strong class="rating">' . esc_html( $rating ) . '</strong>', '<span class="rating">' . esc_html( $count ) . '</span>' );
		} else {
			// translators: %s: rating
			$html .= sprintf( esc_html__( 'Rated %s out of 5', 'soapee' ), '<strong class="rating">' . esc_html( $rating ) . '</strong>' );
		}*/

		$html .= '</span>';

		return $html;
	}
}
/**
 * Change order of some section
 	* action: woocommerce_single_product_summary
	* @hooked woocommerce_template_single_add_to_cart - 30
	* @hooked woocommerce_template_single_meta - 40
	* @hooked woocommerce_template_single_sharing - 50
*/
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
/* call back */
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 21);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 22);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 23);
// add product next/prev link under product add to cart form 
if(!function_exists('soapee_product_nav_link')){
	add_action('woocommerce_single_product_summary', 'soapee_product_nav_link', 24);
	function soapee_product_nav_link($args = []){
		$args = wp_parse_args($args, [
			'show_thumbnail' => '0'
		]);	
		soapee_posts_nav_link($args);
	}
}

/**
 * Single Product meta 
*/
if ( ! function_exists( 'woocommerce_template_single_meta' ) ) {

	/**
	 * Output the product meta.
	 */
	function woocommerce_template_single_meta() {
		global $product;
		?>
			<div class="cms-product-meta mt-20">
				<?php do_action( 'woocommerce_product_meta_start' ); ?>

				<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
					<div class="cms-meta-item cms-sku">
						<span class="cms-meta-label"><?php esc_html_e( 'SKU:', 'soapee' ); ?></span>
						<span class="cms-sku"><?php echo ( esc_attr($sku = $product->get_sku()) ) ? $sku : esc_html__( 'N/A', 'soapee' ); ?></span>
					</div>
				<?php endif; ?>
				<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<div class="cms-meta-item cms-posted-in"><span class="cms-meta-label">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'soapee' ) . '</span> ', '</div>' ); ?>

				<?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<div class="cms-meta-item cms-tagged-as"><span class="cms-meta-label">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'soapee' ) . '</span> ', '</div>' ); ?>
				<?php do_action( 'woocommerce_product_meta_end' ); ?>
			</div>
		<?php
	}
}
/**
 * product share 
 * add to product meta
*/
add_action('woocommerce_product_meta_end', 'soapee_social_share_product');

/** Wrap add-to-cart and some other button
 * woocommerce_after_add_to_cart_quantity
*/
//add_action('woocommerce_after_add_to_cart_button', function(){ echo '<div class="cms-single-product-btns"><div class="cms-single-product-btn d-flex align-items-end">';}, 0);
//add_action('woocommerce_after_add_to_cart_button', function(){ echo '</div></div>';}, 999);

// remove tab content title 
add_filter('woocommerce_product_description_heading', '__return_false');
add_filter('woocommerce_product_additional_information_heading', '__return_false');
// Upsell product 
if(!function_exists('soapee_woocommerce_upsell_display_args')){
	add_filter('woocommerce_upsell_display_args','soapee_woocommerce_upsell_display_args');
	function soapee_woocommerce_upsell_display_args($args){
		$args['posts_per_page'] = $args['columns'] = soapee_get_opts('upsells_product', '3');
		return $args;
	}
}
// Related product
if(!function_exists('soapee_woocommerce_output_related_products_args')){
	add_filter('woocommerce_output_related_products_args', 'soapee_woocommerce_output_related_products_args');
	function soapee_woocommerce_output_related_products_args($args){
		$args['posts_per_page'] = $args['columns'] = soapee_get_opts('related_product', '3');
		return $args;
	}
}