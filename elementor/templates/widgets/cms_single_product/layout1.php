<?php
	$product = wc_get_product( $settings['product_id'] );
?>
<div class="cms-single-product">
	<div class="row gutters-50">
	<div class="col-12 col-lg-auto"><?php
		soapee_image_by_size([
			'id'   => $product->get_image_id(),
			'size' => '553x421',
			'class' => 'w-100 bdr-radius-20'
		]);
	?></div>	
	<div class="col pt-30 pt-lg-20">
		<div class="cms-heading h3 text-25 text-va-20 pb-20 lh-33"><a href="<?php the_permalink($settings['product_id']); ?>"><?php echo etc_print_html($product->get_name());?></a></div>
		<div class="cms-desc"><?php echo etc_print_html($product->get_short_description());?></div>
		<div class="cms-product-meta pt-18">
			<div class="cms-product-regular-price pb-7">
				<span class="label font-600 text-primary"><?php echo esc_html($settings['normal_price_label']); ?></span>
				<span class="value text-accent"><?php echo etc_print_html($product->get_price_html()).' '.esc_html($settings['normal_price_suffix']); ?></span>
			</div>
			<div class="cms-product-sale-price  pb-7">
				<span class="label font-600 text-primary"><?php echo esc_html($settings['sale_price_label']); ?></span>
				<span class="value text-accent"><?php echo etc_print_html($product->get_price_html()).' '.esc_html($settings['sale_price_suffix']); ?></span>
			</div>
			<div class="cms-product-require  pb-7">
				<span class="label font-600 text-primary"><?php echo esc_html($settings['required_label']); ?></span>
				<span class="value text-accent"><?php echo esc_html($settings['required_text']); ?></span>
			</div>
			<div class="cms-product-date-on-sale-to">
				<span class="label font-600 text-primary"><?php echo esc_html($settings['expires_date_label']); ?></span>
				<span class="value text-accent"><?php 
					$time_to = $product->get_date_on_sale_to() === NULL ? strtotime("+6 days 2 hours 56 minutes 50 seconds") : strtotime($product->get_date_on_sale_to());
					echo date(get_option('date_format'), $time_to);
				?></span>
			</div>
		</div>
		<div class="row justify-content-between align-items-center mt-18">
			<div class="col-auto p-15"><?php 
				switch ($settings['add_to_cart_type']) {
					case 'add_to_cart':
						soapee_loop_add_to_cart_button($product, ['text' => esc_html__('Book now!','soapee')]);
						break;
					case 'page':
				?>
					<a href="<?php echo soapee_get_link_by_slug($settings['add_to_cart_link'], 'page');?>" class="btn"><?php esc_html_e('Book Now!','soapee'); ?></a>
				<?php
					break;
					default:
				?>
					<a href="<?php the_permalink($settings['product_id']);?>" class="btn"><?php esc_html_e('Book Now!','soapee'); ?></a>
				<?php
						break;
				}
				
			?></div>
			<div class="col p-15"><?php 
				do_action('woocommerce_share',  $settings['product_id']); 
			?></div>
		</div>
	</div>
	</div>
</div>