<?php
/**
 * Move comment field to bottom
 */
function soapee_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	// move fiedl cookies
	$comment_field = $fields['cookies'];
	unset($fields['cookies']);
	 $fields['cookies'] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'soapee_comment_field_to_bottom' );

/**
 * Custom Comment List
 */
function soapee_comment_list( $comment, $args, $depth ) {
	if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
	?>
    <<?php echo ''.$tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<?php endif; ?>
		    <div class="comment-inner row gutters-20 align-items-center">
		        <?php if ($args['avatar_size'] != 0) : ?>
		        	<div class="comment-avatar col-auto"><?php
		        		echo get_avatar($comment, soapee_configs('comment')['avatar-size']); 
		        	?></div>
		        <?php endif; ?>
		        <div class="comment-content col p-tb-10">
		        	<div class="row justify-content-center justify-content-lg-between p-tb15">
		        		<div class="col">
		        			<div class="comment-title mb-0 h5 text-17 text-va-30 font-700 text-primary text-uppercase"><?php printf( '%s', get_comment_author_link() ); ?></div>
		        			<?php soapee_comment_display_address(); ?>
				        	<div class="comment-meta font-400i text-va-30">
				            	<span class="comment-date"><?php echo get_comment_date().' - '.get_comment_time(); ?></span>
				            </div>
				            <div class="comment-rating-average"><?php 
				            	echo soapee_comment_rating_display_rating('');
				            ?></div>
				        </div>
			            <div class="comment-reply col-auto align-self-end"><?php 
			            	comment_reply_link( array_merge( $args, array(
								'add_below' => $add_below,
								'depth'     => $depth,
								'max_depth' => $args['max_depth'],
								'before'	=> '<span class="text-accent"><span class="text-secondary zmdi zmdi-mail-reply">&nbsp;&nbsp;</span>',
								'after'		=> '</span>'
							) ) ); 
						?></div>
					</div>
		        </div>
		        <div class="comment-text col-12 pt-15"><?php comment_text(); ?></div>
		    </div>
		<?php if ( 'div' != $args['style'] ) : ?>
        </div>
	<?php endif;
}

/**
 * Comment form fields
**/
if(!function_exists('soapee_comment_form_args')){
	function soapee_comment_form_args($args = []){
		$args = wp_parse_args($args, []);
		$commenter = [
			'comment_author' => '',
			'comment_author_email' => ''
		];
		$fields = array(
			'id_form'              => 'commentform',
			'id_submit'            => 'submit',
			'title_reply'          => esc_attr__( 'Leave A Comment', 'soapee'),
			'title_reply_to'       => esc_attr__( 'Leave A Comment To ', 'soapee') . '%s',
			'cancel_reply_link'    => esc_attr__( 'Cancel Comment', 'soapee'),
			'label_submit'         => esc_attr__( 'Submit Comment', 'soapee'),
			'comment_notes_before' => '',
			'fields'               => apply_filters( 'comment_form_default_fields', array(

                    'author' =>'
                    	<div class="row"><div class="comment-form-field comment-form-author col-lg-4 col-md-4 col-sm-12">'.
                    	'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                    	'" size="30" placeholder="'.esc_attr__('Your name*', 'soapee').'"/></div>
                    ',

                    'email' =>'
                    	<div class="comment-form-field comment-form-email col-lg-4 col-md-4 col-sm-12">'.
                    	'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                    	'" size="30" placeholder="'.esc_attr__('Your email*', 'soapee').'"/></div>
                    ',

                    'address' =>'
                    	<div class="comment-form-field comment-form-address col-lg-4 col-md-4 col-sm-12">'.
                    	'<input id="address" name="address" type="text" value="" size="30" placeholder="'.esc_attr__('Address', 'soapee').'"/></div></div>
                    ',
            	)
            ),
            'comment_field' =>  '<div class="row"><div class="comment-form-field comment-form-comment col-12"><textarea id="comment" name="comment" cols="45" rows="8" placeholder="'.esc_attr__('Your Comment*', 'soapee').'" aria-required="true">' .
            '</textarea></div></div>',
    	);

    	return $fields;
	}
}
if(!function_exists('soapee_comment_form_args_service')){
	function soapee_comment_form_args_service($args = []){
		$args = wp_parse_args($args, []);
		$commenter = [
			'comment_author' => '',
			'comment_author_email' => ''
		];
		$fields = array(
			'id_form'              => 'commentform',
			'id_submit'            => 'submit',
			'title_reply'          => '',
			'title_reply_to'       => esc_attr__( 'Leave A Review To ', 'soapee') . '%s',
			'cancel_reply_link'    => esc_attr__( 'Cancel Review', 'soapee'),
			'label_submit'         => esc_attr__( 'Send Review', 'soapee'),
			'comment_notes_before' => '',
			'fields'               => apply_filters( 'comment_form_default_fields', array(

                    'author' =>'
                    	<div class="row"><div class="comment-form-field comment-form-author col-12">'.
                    	'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                    	'" size="30" placeholder="'.esc_attr__('Your name*', 'soapee').'"/></div>
                    ',

                    'email' =>'
                    	<div class="comment-form-field comment-form-email col-12">'.
                    	'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                    	'" size="30" placeholder="'.esc_attr__('Your email*', 'soapee').'"/></div>
                    ',
                    'address' =>'
                    	<div class="comment-form-field comment-form-website col-12">'.
                    	'<input id="address" name="address" type="text" value="" size="30" placeholder="'.esc_attr__('Address*', 'soapee').'"/></div></div>
                    ',
            	)
            ),
            'comment_field' =>  '<div class="row"><div class="comment-form-field comment-form-comment col-12"><textarea id="comment" name="comment" cols="45" rows="8" placeholder="'.esc_attr__('Your Review*', 'soapee').'" aria-required="true">' .
            '</textarea></div></div>',
    	);

    	return $fields;
	}
}