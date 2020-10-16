<?php
if(!class_exists('Elementor_Theme_Core')) return;
//Create the rating interface.
add_action( 'comment_form_logged_in_after', 'soapee_comment_rating_fields' );
//add_action( 'comment_form_after_fields', 'soapee_comment_rating_fields' );
function soapee_comment_rating_fields () {
	//if(is_singular('product')) return;
	?>
	<div class="cms-comment-rating row mt-10">
		<label for="rating" class="comment-form-field col-auto"><?php 
			esc_html_e('Your Rating','soapee');
		?><span class="required">*</span></label>
		<fieldset class="comment-form-field comments-rating col">
			<span class="rating-container">
				<?php for ( $i = 5; $i >= 1; $i-- ) : ?>
					<input type="radio" id="rating-<?php echo esc_attr( $i ); ?>" name="rating" value="<?php echo esc_attr( $i ); ?>" /><label for="rating-<?php echo esc_attr( $i ); ?>"><span class="d-none"><?php echo esc_html( $i ); ?></span></label>
				<?php endfor; ?>
				<input type="radio" id="rating-0" class="star-cb-clear" name="rating" value="0" /><label for="rating-0"><span class="d-none">0</span></label>
			</span>
		</fieldset>
	</div>
	<?php
}
// add rating to adter comment form fields
add_filter('comment_form_default_fields', 'soapee_comment_rating_default_fields' );
function soapee_comment_rating_default_fields ($fields) {
	$fields_rating = [];
	//if(!is_singular('product')){
		ob_start();
			soapee_comment_rating_fields();
		$fields_rating['rating'] = ob_get_clean();
	//}
	$fields = array_merge($fields_rating, $fields);
	return $fields;
}

//Save the new meta added by theme  submitted by the user.
add_action( 'comment_post', 'soapee_comment_rating_save_comment_meta' );
function soapee_comment_rating_save_comment_meta( $comment_id ) {
	// rating
	if ( ( isset( $_POST['rating'] ) ) && ( '' !== $_POST['rating'] ) )
	$rating = intval( $_POST['rating'] );
	// address
	if ( ( isset( $_POST['address'] ) ) && ( '' !== $_POST['address'] ) )
	$address = $_POST['address'];

	add_comment_meta( $comment_id, 'rating', $rating );
	add_comment_meta( $comment_id, 'address', $address );
}
//Make the rating required.
add_filter( 'preprocess_comment', 'soapee_comment_rating_require_rating' );
function soapee_comment_rating_require_rating( $commentdata ) {
	if ( ! is_admin() && ( ! isset( $_POST['rating'] ) || 0 === intval( $_POST['rating'] ) ) )
	wp_die( esc_html__( 'Error: You did not add a rating. Hit the Back button on your Web browser and resubmit your comment with a rating.','soapee' ) );
	return $commentdata;
}


//Display the rating on a submitted comment.
//add_filter( 'comment_text', 'soapee_comment_rating_display_rating');
function soapee_comment_rating_display_rating( $comment_text ){

	if ( $rating = get_comment_meta( get_comment_ID(), 'rating', true ) ) {
		$stars = '<div class="stars">';
		for ( $i = 1; $i <= $rating; $i++ ) {
			$stars .= '<span class="rating-icon cms-rating-icon-filled"></span>';
		}
		$stars .= '</div>';
		$comment_text = $comment_text . $stars;
		return $comment_text;
	} else {
		return $comment_text;
	}
}

//Get the average rating of a post.
function soapee_comment_rating_get_average_ratings( $id ) {
	$comments = get_approved_comments( $id );
	if ( $comments ) {
		$i = 0;
		$total = 0;
		foreach( $comments as $comment ){
			$rate = get_comment_meta( $comment->comment_ID, 'rating', true );
			if( isset( $rate ) && '' !== $rate ) {
				$i++;
				$total += $rate;
			}
		}

		if ( 0 === $i ) {
			return false;
		} else {
			return round( $total / $i, 1 );
		}
	} else {
		return false;
	}
}
// Display the star average rating only
function soapee_comment_rating_display_average() {

	global $post;

	if ( false === soapee_comment_rating_get_average_ratings( $post->ID ) ) {
		return false;
	}
	
	$stars   = '';
	$average = soapee_comment_rating_get_average_ratings( $post->ID );

	for ( $i = 1; $i <= $average + 1; $i++ ) {
		
		$width = intval( $i - $average > 0 ? 20 - ( ( $i - $average ) * 20 ) : 20 );

		if ( 0 === $width ) {
			continue;
		}
		$stars .= '<span style="overflow:hidden; width:' . $width . 'px" class="rating-icon cms-rating-icon-filled"></span>';

		if ( $i - $average > 0 ) {
			$stars .= '<span style="overflow:hidden; position:relative; left:-' . $width .'px;" class="cms-rating-icon cms-rating-icon-empty"></span>';
		}
	}
	$custom_content  = '<div class="cms-average-rating cms-average-rating-star">' . $stars .'</div>';
	return $custom_content;
}

//Display the average rating above the content.
//add_filter( 'the_content', 'soapee_comment_rating_display_average_rating' );
function soapee_comment_rating_display_average_rating( $content ) {

	global $post;

	if ( false === soapee_comment_rating_get_average_ratings( $post->ID ) ) {
		return $content;
	}
	
	$stars   = '';
	$average = soapee_comment_rating_get_average_ratings( $post->ID );

	for ( $i = 1; $i <= $average + 1; $i++ ) {
		
		$width = intval( $i - $average > 0 ? 20 - ( ( $i - $average ) * 20 ) : 20 );

		if ( 0 === $width ) {
			continue;
		}

		$stars .= '<span style="overflow:hidden; width:' . $width . 'px" class="rating-icon cms-rating-icon-filled"></span>';

		if ( $i - $average > 0 ) {
			$stars .= '<span style="overflow:hidden; position:relative; left:-' . $width .'px;" class="rating-icon cms-rating-icon-empty"></span>';
		}
	}
	
	$custom_content  = '<div class="average-rating">This post\'s average rating is: ' . $average .' ' . $stars .'</div>';
	$custom_content .= $content;
	return $custom_content;
}

function soapee_comment_rating_display_feedback($args=[]){
	$args = wp_parse_args($args,[
		'id'        => get_the_ID(),
		'mode'      => 'good', //bad
		'good_text' => esc_html__('positive feedback', 'soapee'),
		'bad_text'  => esc_html__('negative feedback', 'soapee'),
		'good_icon' => 'icofont-simple-smile',
		'bad_icon'  => 'icofont-sad'
	]);
	$comments = get_approved_comments( $args['id'] );
	if ( $comments ) {
		$i = 0;
		$total = 0;
		$good_rate = $bad_rate = 0;
		foreach( $comments as $comment ){
			$rate = get_comment_meta( $comment->comment_ID, 'rating', true );
			if( isset( $rate ) && '' !== $rate ) {
				$i++;
				$total += $rate;
			}
			if(isset($rate) && $rate > 3){
				$good_rate ++;
			}
			if(isset($rate) && $rate <= 3){
				$bad_rate ++;
			}
		}

		if ( 0 === $i ) {
			return false;
		} else {
			//return  $total .' good:'.$good_rate.' bad:'.$bad_rate ;
			if($args['mode'] == 'good'){
				return '<span class="cms-rating-good text-accent text-17 '.$args['good_icon'].'"></span> <span class="cms-rating-percent text-accent font-700">'.number_format_i18n( $good_rate*100 / $i, 2 ).'%</span> '.$args['good_text'];
			} else {
				return '<span class="cms-rating-bad text-accent text-17 '.$args['bad_icon'].'"></span> <span class="cms-rating-percent text-accent font-700">'.number_format_i18n( $bad_rate*100 / $i, 2 ).'%</span> '.$args['bad_text'];
			}
		}
	} else {
		return false;
	}
}

//Display the address on a submitted comment.
//add_filter( 'comment_text', 'soapee_comment_rating_display_rating');
function soapee_comment_display_address(){
	$address =  get_comment_meta( get_comment_ID(), 'address', true ) ;
	if(empty($address)) return;
	?>
		<div class="cms-comment-address"><?php echo esc_html($address); ?></div>
	<?php
}
