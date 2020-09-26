<?php
function soapee_social_share_product($post = '') { 
    if(empty($post)) $post = get_the_ID();
    $show_share = soapee_get_opt('product_show_share', '0');
    if($show_share == '0') return;
    ?>
    <div class="cms-product-share cms-social align-items-center justify-content-end">
        <span class="share-title text-17 font-600 text-primary"><?php esc_html_e('Share','soapee'); ?>:</span>
        <a class="share-icon" title="Facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink($post); ?>"><i class="zmdi zmdi-facebook"></i></a>
        <a class="share-icon" title="Twitter" target="_blank" href="https://twitter.com/home?status=<?php the_permalink($post); ?>"><i class="zmdi zmdi-twitter"></i></a>
        <a class="share-icon" title="Google Plus" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink($post); ?>"><i class="zmdi zmdi-google-plus"></i></a>
        <a class="pshare-icon" title="Pinterest" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo esc_url(get_the_post_thumbnail_url( $post, 'full' )); ?>&media=&description=<?php echo get_the_title($post); ?>"><i class="zmdi zmdi-pinterest"></i></a>
    </div>
    <?php
}

function soapee_product_nav() {
    global $post;
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );

    if ( ! $next && ! $previous )
        return;
    ?>
    <?php
    $next_post = get_next_post();
    $previous_post = get_previous_post();
    if( !empty($next_post) || !empty($previous_post) ) { ?>
        <div class="product-previous-next">
            <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { ?>
                <a class="nav-link-prev" href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><i class="fa fa-long-arrow-left"></i></a>
            <?php } ?>
            <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') { ?>
                <a class="nav-link-next" href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><i class="fa fa-long-arrow-right"></i></a>
            <?php } ?>
        </div>
    <?php }
}