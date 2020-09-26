<?php
/**
 * Review callback function 
 * make it callback same as default blog review
*/
if(!function_exists('soapee_woocommerce_product_review_list_args')){
	add_filter('woocommerce_product_review_list_args', 'soapee_woocommerce_product_review_list_args');
	function soapee_woocommerce_product_review_list_args($args){
		$args['style']      = 'ul';
		$args['short_ping'] = 'true';
		$args['callback']   = 'soapee_comment_list';
		return $args;
	}
}
/**
 * Comment form Args
*/
if(!function_exists('soapee_woocommerce_product_review_comment_form_args')){
	add_filter('woocommerce_product_review_comment_form_args', 'soapee_woocommerce_product_review_comment_form_args');
	function soapee_woocommerce_product_review_comment_form_args($comment_form){
		$comment_form = soapee_comment_form_args();
		return $comment_form;
	}
}
// open inner div 
if(!function_exists('soapee_woocommerce_review_inner_open')){
	add_action('woocommerce_review_before', 'soapee_woocommerce_review_inner_open', 0);
	function soapee_woocommerce_review_inner_open(){ 
		return '<div class="comment-inner row gutters-20 align-items-center">';
	}
}
// close inner div 
if(!function_exists('soapee_woocommerce_review_inner_close')){
	add_action('woocommerce_review_after_comment_text', 'soapee_woocommerce_review_inner_close', 99999999);
	function soapee_woocommerce_review_inner_close(){ 
		return '</div>';
	}
}
// avatar
if(!function_exists('soapee_woocommerce_review_gravatar_size')){
	add_filter('woocommerce_review_gravatar_size', 'soapee_woocommerce_review_gravatar_size');
	function soapee_woocommerce_review_gravatar_size(){
		return soapee_configs('comment')['avatar-size'];
	}
}
if(!function_exists('soapee_woocommerce_review_display_gravatar')){
	remove_action('woocommerce_review_before', 'woocommerce_review_display_gravatar', 10);
	add_action('woocommerce_review_before', 'soapee_woocommerce_review_display_gravatar', 0);
	function soapee_woocommerce_review_display_gravatar($comment){
		echo '<div class="comment-avatar col-auto">';
			woocommerce_review_display_gravatar($comment);
		echo '</div>';
	}
}

// comment title, date, rating, 
if(!function_exists('soapee_woocommerce_review_header')){
	add_action('woocommerce_review_before', 'soapee_woocommerce_review_header', 1);
	remove_action('woocommerce_review_before_comment_meta', 'woocommerce_review_display_rating', 10);
	remove_action('woocommerce_review_meta', 'woocommerce_review_display_meta', 10);
	function soapee_woocommerce_review_header(){
		?>
			<div class="comment-content col p-tb-10">
	        	<div class="row justify-content-center justify-content-lg-between p-tb15">
	        		<div class="col">
	        			<div class="comment-title mb-0 h5 text-17 text-va-30 font-700 text-primary text-uppercase"><?php printf( '%s', get_comment_author_link() ); ?></div>
			        	<div class="comment-meta font-400i text-va-30">
			            	<span class="comment-date"><?php echo get_comment_date().' - '.get_comment_time(); ?></span>
			            </div>
			            <div class="comment-rating-average"><?php 
			            	woocommerce_review_display_rating();
			            ?></div>
			        </div>
				</div>
	        </div>
		<?php
	}
}