<?php
/**
 * Custom template tags for this theme.
 *
 * @package Soapee
 */

/**
 * Page loading
 **/
if(!function_exists('soapee_page_loading')){
    function soapee_page_loading()
    {
        $page_loading = soapee_get_opt( 'show_page_loading', false );

        if($page_loading) { ?>
            <div id="cms-loadding" class="cms-loader">
                <div class="loading-spinner">
                    <div class="loading-dot1"></div>
                    <div class="loading-dot2"></div>
                </div>
            </div>
        <?php }
    }
}

/**
 * Header layout
 **/
if(!function_exists('soapee_header_layout')){
    function soapee_header_layout()
    {
        $header_layout = soapee_get_opts( 'header_layout', '1' );
        get_template_part( 'template-parts/header/header-layout', $header_layout );
    }
}
/**
 * Header css class
*/
if(!function_exists('soapee_header_css_class')){
    function soapee_header_css_class($class=''){
        $classes = [
            'cms-header',
            'header-layout'.soapee_get_opts('header_layout','1')
        ];
        $header_sticky = soapee_get_opts('sticky_on','0');
        $header_ontop = soapee_get_opts('header_ontop','0');
        if($header_sticky == '1') $classes[] = 'is-sticky header-sticky';
        if($header_ontop == '1') $classes[] = 'is-ontop header-ontop';
        if(!empty($class)) $classes[] = $class;

        echo implode(' ', $classes);
    }
}
/**
 * Header container css class
*/
if(!function_exists('soapee_header_container_css_class')){
    function soapee_header_container_css_class($class=''){
        $classes = [
            'cms-header-container',
            'container'
        ];
        $container = soapee_get_opts('header_layout_width', '1');
        if($container != '1') {
            $classes[] = 'container-'.$container;
        }
        if(!empty($class)) $classes[] = $class;

        echo trim(implode(' ', $classes));
    }
}
/**
 * Header Logo
*/ 
if(!function_exists('soapee_logo')){
    function soapee_logo($args = []){
        $args = wp_parse_args($args, [
            'class' => ''
        ]);
    ?>
        <div class="<?php echo implode(' ', ['cms-header-logo', $args['class']]); ?>">
            <?php 
                do_action('soapee_before_logo');
                get_template_part( 'template-parts/header/header-branding' ); 
                do_action('soapee_after_logo');
            ?>
        </div>  
    <?php
    }
}
/**
 * Add span wrap menu title.
 *
 * @param  string  $title The menu item's title.
 * @param  WP_Post $item  The current menu item.
 * @param  array   $args  An array of wp_nav_menu() arguments.
 * @param  int     $depth Depth of menu item. Used for padding.
 * @return string  $title The menu item's title with dropdown icon.
 */
function soapee_nav_menu_item_title_wrap( $title, $item, $args, $depth ) {
    if ( 'primary' === $args->theme_location ) {
        foreach ( $item->classes as $value ) {
            if ( 'menu-item-has-children' === $value || 'page_item_has_children' === $value ) {
                $title = $title . '<span class="cms-parent-menu-icon"></span>';
            }
        }
    }
    $title = '<span class="cms-menu-title">'.$title.'</span>';
    return $title;
}
add_filter( 'nav_menu_item_title', 'soapee_nav_menu_item_title_wrap', 10, 4 );
/**
 * Page title layout
 **/
if(!function_exists('soapee_page_title_layout')){
    function soapee_page_title_layout()
    {
        if(is_404()) return;
        get_template_part( 'template-parts/page-title/page-title', soapee_get_opts('ptitle_layout', '1') );
    }
}

/**
 * Set primary content class based on sidebar position
 *
 * @param  string $sidebar_pos
 * @param  string $extra_class
 */
if(!function_exists('soapee_primary_class')){
    function soapee_primary_class( $sidebar_pos, $extra_class = '' )
    {
        if ( class_exists( 'WooCommerce' ) && (is_product_category()) || class_exists( 'WooCommerce' ) && (is_shop()) ) :
            $sidebar_load = 'sidebar-shop';
        elseif (is_page()) :
            $sidebar_load = 'sidebar-page';
        else :
            $sidebar_load = 'sidebar-blog';
        endif;
        global $wp_query;
        
        if ( is_active_sidebar( $sidebar_load ) ) {
            $class = array( trim( $extra_class ) );
            switch ( $sidebar_pos )
            {
                case 'left':
                    $class[] = 'cms-content-area has-sidebar order-2 col-xl-8 col-lg-8';
                    break;

                case 'right':
                    $class[] = 'cms-content-area has-sidebar order-1 col-xl-8 col-lg-8';
                    break;

                default:
                    $class[] = 'cms-content-area full-width col-12';
                    break;
            }

            $class = implode( ' ', array_filter( $class ) );

            if ( $class )
            {
                echo ' class="' . esc_attr($class) . '"';
            }
        } else {
            echo ' class="cms-content-area col-12"';
        }
    }
}

if(!function_exists('soapee_content_css_class')){
    function soapee_content_css_class($class=''){
        $classes = [
            'cms-content-area',
            $class
        ];
        $sidebar            = soapee_get_sidebar();
        $sidebar_position   = soapee_sidebar_position();
        $content_grid_class = soapee_get_opts('archive_grid_col', '8');

        if( in_array($sidebar_position, ['0', 'none', 'bottom']) ){
            $classes[] = 'col-12 has-gtb';
        } else {
            if($sidebar && ('none' !== $sidebar_position || 'center' == $sidebar_position)){
                $classes[] = 'col-lg-'.$content_grid_class;
                if($sidebar_position == 'left') $classes[] = 'order-lg-1';
                if($sidebar_position == 'center') $classes[] = 'offset-lg-2';
            } else {
                $classes[] = 'col-12';
            }
        }
        echo trim(implode(' ', $classes));
    }
}

/**
 * Set secondary content class based on sidebar position
 *
 * @param  string $sidebar_pos
 * @param  string $extra_class
 */
if(!function_exists('soapee_secondary_class')){
    function soapee_secondary_class( $sidebar_pos, $extra_class = '' )
    {
        if ( class_exists( 'WooCommerce' ) && (is_product_category()) ) :
            $sidebar_load = 'sidebar-shop';
        elseif (is_page()) :
            $sidebar_load = 'sidebar-page';
        else :
            $sidebar_load = 'sidebar-blog';
        endif;

        if ( is_active_sidebar( $sidebar_load ) ) {
            $class = array(trim($extra_class));
            switch ($sidebar_pos) {
                case 'left':
                    $class[] = 'sidebar-area sidebar-fixed col-xl-4 col-lg-4';
                    break;

                case 'right':
                    $class[] = 'sidebar-area sidebar-fixed col-xl-4 col-lg-4';
                    break;

                default:
                    break;
            }

            $class = implode(' ', array_filter($class));

            if ($class) {
                echo ' class="' . esc_html($class) . '"';
            }
        }
    }
}


// Post link pages
if(!function_exists('soapee_post_link_pages')){
    add_filter('wp_link_pages_args', 'soapee_wp_link_pages_args');
    function soapee_wp_link_pages_args($args){
        $args['before']      = '';
        $args['after']       = '';
        $args['link_before'] = '<span>';
        $args['link_after']  = '</span>';
        return $args;   
    }
    function soapee_post_link_pages($args = []){
        $args = wp_parse_args($args, [
            'class' => ''
        ]);
    ?>
    <div class="<?php echo trim(implode(' ', ['navigation cms-page-links', $args['class']])); ?>"><?php 
        wp_link_pages(); 
    ?></div>
    <?php
    }
}
// Post title
if ( ! function_exists( 'soapee_post_title' ) ) :
    /**
     * Print post title
     *
     * @param  integer $length
     */
    function soapee_post_title($args = []){
        $args = wp_parse_args($args, [
            'tag'         => 'h3',
            'sticky_icon' => '<span class="fa fa-thumbtack"></span>&nbsp;',
            'show_link'   => true,
            'class'       => ''
        ]);
        ?>
        <<?php echo esc_attr($args['tag']); ?> class="<?php echo trim(implode(' ', ['cms-post-title', $args['class']]));?>"><?php 
            if($args['show_link']) { ?>
                <a href="<?php echo esc_url( get_permalink()); ?>">
            <?php }
                    if(is_sticky()) { printf('%s', $args['sticky_icon']); }
                    the_title();
            if($args['show_link']) { ?>
                </a>
        <?php } ?></<?php echo esc_attr($args['tag']); ?>>
    <?php
    }
endif;

if ( ! function_exists( 'soapee_post_excerpt' ) ) :
    /**
     * Print post excerpt based on length.
     *
     * @param  integer $length
     */
    function soapee_post_excerpt($args = []) {
        $args = wp_parse_args($args, [
            'class'          => '',
            'length'         => 48,
            'show_readmore'  => false,
            'readmore_class' => '',
            'readmore_text'  => esc_html__('Read More', 'soapee'),
            'hellip'         => '&hellip;'
        ]);
        //add_filter('soapee_excerpt_more', function($args){ return $args['hellip'];});
    ?>
    <div class="<?php echo trim(implode(' ', ['cms-post-excerpt', $args['class']])) ?>"><?php 
        echo soapee_get_the_excerpt( $args['length'] );
        if($args['show_readmore'] === true) {
            ?>&nbsp;<a href="<?php echo esc_url( get_permalink()); ?>" class="<?php echo trim(implode(' ', ['cms-readmore-text text-accent', $args['readmore_class']]));?>"><?php echo esc_html($args['readmore_text']); ?></a><?php
        }
    ?></div>
    <?php
    }
endif;

if ( ! function_exists( 'soapee_post_readmore' ) ) :
    /**
     * Print post Readmore.
     *
     * @param 
     */
    function soapee_post_readmore($args = []){
        $args = wp_parse_args($args, [
            'wrap_class' => '',
            'class'      => '',
            'text'       => esc_html__('Read More', 'soapee')
        ]);
       ?>
       <div class="<?php echo trim(implode(' ', ['cms-post-readmore', $args['wrap_class']]));?>">
            <a href="<?php echo esc_url( get_permalink()); ?>" class="<?php echo trim(implode(' ', ['cms-readmore', $args['class']]));?>"><?php echo esc_html($args['text']); ?></a>
        </div>
       <?php 
    }
endif;

/**
 * Prints post edit link when applicable
 */
function soapee_entry_edit_link()
{
    edit_post_link(
        sprintf(
            wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
                esc_html__( 'Edit', 'soapee' ),
                array(
                    'span' => array(
                        'class' => array(),
                    ),
                )
            ),
            get_the_title()
        ),
        '<div class="cms-post-edit-link"><span class="fa fa-edit"></span>',
        '</div>'
    );
}

if(!function_exists('soapee_ajax_paginate_links')){
    function soapee_ajax_paginate_links($link){
        $parts = parse_url($link);
        parse_str($parts['query'], $query);
        if(isset($query['page']) && !empty($query['page'])){
            return '#' . $query['page'];
        }
        else{
            return '#1';
        }
    }
}

add_action( 'wp_ajax_soapee_get_pagination_html', 'soapee_get_pagination_html' );
add_action( 'wp_ajax_nopriv_soapee_get_pagination_html', 'soapee_get_pagination_html' );
if(!function_exists('soapee_get_pagination_html')){
    function soapee_get_pagination_html(){
        try{
            if(!isset($_POST['query_vars'])){
                throw new Exception(__('Something went wrong while requesting. Please try again!', 'soapee'));
            }
            $query = new WP_Query($_POST['query_vars']);
            ob_start();
            soapee_posts_pagination( $query,  true );
            $html = ob_get_clean();
            wp_send_json(
                array(
                    'status'  => true,
                    'message' => esc_html__('Load Successfully!', 'soapee'),
                    'data'    => array(
                        'html'       => $html,
                        'query_vars' => $_POST['query_vars'],
                        'post'       => $query->have_posts()
                    ),
                )
            );
        }
        catch (Exception $e){
            wp_send_json(array('status' => false, 'message' => $e->getMessage()));
        }
        die;
    }
}

/**
 * Prints posts pagination based on query
 *
 * @param  WP_Query $query     Custom query, if left blank, this will use global query ( current query )
 * @return void
 */
function soapee_posts_pagination( $query = null, $ajax = false )
{
    if($ajax){
        add_filter('paginate_links', 'soapee_ajax_paginate_links');
    }

    $classes = array();

    if ( empty( $query ) )
    {
        $query = $GLOBALS['wp_query'];
    }

    if ( empty( $query->max_num_pages ) || ! is_numeric( $query->max_num_pages ) || $query->max_num_pages < 2 )
    {
        return;
    }

    $paged = $query->get( 'paged', '' );

    if ( ! $paged && is_front_page() && ! is_home() )
    {
        $paged = $query->get( 'page', '' );
    }

    $paged = $paged ? intval( $paged ) : 1;

    $pagenum_link = html_entity_decode( get_pagenum_link() );
    $query_args   = array();
    $url_parts    = explode( '?', $pagenum_link );

    if ( isset( $url_parts[1] ) )
    {
        wp_parse_str( $url_parts[1], $query_args );
    }

    $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
    $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

    $html_prev = soapee_pagination_prev_text();
    $html_next = soapee_pagination_next_text();

    $paginate_links_args = array(
        'base'     => $pagenum_link,
        'total'    => $query->max_num_pages,
        'current'  => $paged,
        'mid_size' => 1,
        'add_args' => array_map( 'urlencode', $query_args ),
        'prev_text' => $html_prev,
        'next_text' => $html_next,
    );
    if($ajax){
        $paginate_links_args['format'] = '?page=%#%';
    }
    $links = paginate_links( $paginate_links_args );
    if ( $links ):
    ?>
    <nav class="navigation posts-pagination <?php echo esc_attr($ajax?'ajax':''); ?>">
        <?php
            printf($links);
        ?>
    </nav>
    <?php
    endif;
}
if(!function_exists('soapee_pagination_prev_text')){
    function soapee_pagination_prev_text(){
        return '<span class="nav-prev-icon"></span>';
    }
}
if(!function_exists('soapee_pagination_next_text')){
    function soapee_pagination_next_text(){
        return '<span class="nav-next-icon"></span>';
    }
}
/* Meta Post Author */
if(!function_exists('soapee_post_author')){
    function soapee_post_author($args = []){
        $args = wp_parse_args($args,[
            'show_author' => true,
            'class'      => '',
            'text'       => esc_html__('By','soapee'),
            'icon'       => 'icofont-user-alt-7',
            'icon_class' => ''
        ]);

        if(!$args['show_author']) return;
    ?>
        <span class="<?php echo trim(implode(' ', ['cms-post-author', $args['class']]));?>">
            <?php 
                // author icon
                $icon_class = implode(' ', ['meta-icon', $args['icon'], $args['icon_class']]);
                if(!empty($args['icon'])) echo '<span class="'.esc_attr($icon_class).'"></span>&nbsp;';
                // Author text
                if(!empty($args['text'])):  echo '<span>'.esc_html($args['text']).'&nbsp;</span>'; endif; 
                // Author name
                the_author_posts_link();
            ?>
        </span>
    <?php
    }
}
/* Meta Post Category */
if(!function_exists('soapee_post_category')){
    function soapee_post_category($args = []){
        $args = wp_parse_args($args,[
            'show_cat'   => true,
            'class'      => '',
            'text'       => esc_html__('in','soapee'),
            'icon'       => 'icofont-tag',
            'icon_class' => '',
            'taxo'       => soapee_get_custom_post_cat_taxonomy(),
            'separator'  => ', ',
            'post_id'    => get_the_ID()
        ]);

        if( !$args['show_cat'] || !get_the_term_list( $args['post_id'], $args['taxo']) ) return;
    ?>
        <span class="<?php echo trim(implode(' ', ['cms-post-cat', $args['class']]));?>">
            <?php 
                // cat icon
                $icon_class = implode(' ', ['meta-icon',$args['icon'], $args['icon_class']]);
                if(!empty($args['icon'])) echo '<span class="'.esc_attr($icon_class).'">&nbsp;</span>';
                // cat text
                if(!empty($args['text'])):  echo '<span>'.esc_html($args['text']).'&nbsp;</span>'; endif; 
                // cat list
                the_terms( $args['post_id'], $args['taxo'], '<span class="cms-category-list">', $args['separator'], '</span>' );
            ?>
        </span>
    <?php
    }
}
/* Meta Post Comment */
if(!function_exists('soapee_post_comment')){
    function soapee_post_comment($args = []){
        $args = wp_parse_args($args,[
            'show_cmt'   => true,
            'text'       => esc_html__('Comments','soapee'),
            'class'      => '',
            'icon'       => 'icofont-comment',
            'icon_class' => '',
            'cmt_with_text' => true
        ]);

        if(!$args['show_cmt']) return;
    ?>
        <span class="<?php echo trim(implode(' ', ['cms-post-cmt', $args['class']]));?>">
            <?php 
                // cat icon
                $icon_class = implode(' ', ['meta-icon', $args['icon'], $args['icon_class']]);
                if(!empty($args['icon'])) echo '<span class="'.esc_attr($icon_class).'"></span>';
                // cat text
                if(!empty($args['text'])):  echo '<span>'.esc_html($args['text']).'&nbsp;</span>'; endif; 
                // cat list
            ?>
            <a href="<?php the_permalink(); ?>"><?php
                if($args['cmt_with_text']) 
                    echo comments_number(
                        esc_html__('No Comments', 'soapee'),
                        esc_html__('1 Comment', 'soapee'),
                        esc_html__('% Comments', 'soapee')); 
                else 
                    echo comments_number(
                        '0',
                        '1', 
                        '%'
                    );
            ?></a>
        </span>
    <?php
    }
}
/* Meta post author */
if(!function_exists('soapee_post_date')){
    function soapee_post_date($args = []){
        $args = wp_parse_args($args, [
            'id'          => null,
            'show_date'   => true,
            'date_format' => get_option('date_format'),
            'class'       => '',
            'icon'        => 'icofont-calendar',
            'icon_class'  => '',
        ]);
        if(!$args['show_date']) return;
        ?>
        <span class="<?php echo trim(implode(' ', ['cms-post-date', $args['class']]));?>">
            <?php 
                // date icon
                $icon_class = implode(' ', ['meta-icon', $args['icon'], $args['icon_class']]);
                if(!empty($args['icon'])) echo '<span class="'.esc_attr($icon_class).'"></span>';
            ?>
            <span><?php echo get_the_date($args['date_format'], $args['id']); ?></span>
        </span>
        <?php
    }
}

/**
 * Prints post meta
 */
if ( ! function_exists( 'soapee_post_meta' ) ) :
    function soapee_post_meta($args=[]) {
        $args = wp_parse_args($args,[
            'show_author' => soapee_get_opt( 'archive_author_on', true ),
            'show_cat'    => soapee_get_opt( 'archive_categories_on', true ),
            'show_cmt'    => soapee_get_opt( 'archive_comments_on', true ),
            'show_date'   => soapee_get_opt( 'archive_date_on', true ),
            'class'       => '',
            'item_class'  => '',
            'post_id'     => get_the_ID(),
            'date_format' => get_option('date_format')
        ]);
        $loop_class = soapee_is_loop() ? 'loop' : '';
        if($args['show_author'] || $args['show_cat'] || $args['show_cmt'] || $args['show_date']) : ?>
            <div class="<?php echo trim(implode(' ', ['cms-post-meta', $loop_class, $args['class']])); ?>">
                <div class="cms-post-meta-inner row gutters-md-20">
                    <?php 
                        soapee_post_date([
                            'date_format' => $args['date_format'],
                            'class'       => 'col-auto '.$args['item_class']
                        ]);
                        soapee_post_category([
                            'show_cat' => $args['show_cat'],
                            'class'    => 'col-auto '.$args['item_class'],
                            'post_id'  => $args['post_id'],
                        ]);
                        soapee_post_comment([
                            'show_cmt' => $args['show_cmt'],
                            'class'    => 'col-auto '.$args['item_class'],  
                            'text'     => ''
                        ]);
                        soapee_post_author([
                            'show_author' => $args['show_author'],
                            'class'       => 'col-auto '.$args['item_class']
                        ]); 
                    ?>
                </div>
            </div>
        <?php endif; }
endif;

/**
 * Prints tag list
 */
if ( ! function_exists( 'soapee_post_tagged_in' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function soapee_post_tagged_in($args = [])
    {
        $args = wp_parse_args($args, [
            'title' => '',
            'class' => ''
        ]);
        $tags_list = get_the_tag_list( '<div class="tagcloud">', '', '</div>' );
        if ( $tags_list )
        {
            echo '<div class="'.trim(implode(' ', ['cms-post-tags', $args['class']])).'"><div class="row gutters-30 align-items-center">';
                if($args['title'] != '') echo '<div class="col-auto cms-post-tags-title h4">'.esc_html($args['title']).'</div>';
                printf('<div class="col">%2$s</div>', '', $tags_list);
            echo '</div></div>';
        }
    }
endif;

/**
 * List socials share for post.
 */
if(!function_exists('soapee_socials_share_default')){
    function soapee_socials_share_default($args = []) {
        $args = wp_parse_args($args, [
            'show_share'   => '1',
            'class'        => '',
            'title'        => '<div class="cms-post-share-title h4">'.esc_html__('Share:','soapee').'</div>',
            'social_class' => ''
        ]);
        if($args['show_share'] != '1') return;
        $pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
    ?>
        <div class="<?php echo trim(implode(' ',['cms-post-share row align-items-center',  $args['class']]));?>">
            <?php if(!empty($args['title'])) printf('%s', $args['title']); ?>
            <div class="<?php echo trim(implode(' ',['col-auto cms-social',  $args['social_class']]));?>">
                <a class="fb-social facebook hover-effect" title="Facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php urlencode(the_permalink()); ?>"><i class="fab fa-facebook-f"></i></a>
                <a class="tw-social twitter hover-effect" title="Twitter" target="_blank" href="https://twitter.com/home?status=<?php the_permalink(); ?>"><i class="fab fa-twitter"></i></a>
                <a class="pin-social pinterest hover-effect" title="Pinterest" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(the_permalink()); ?>&media=<?php echo esc_attr($pinterestimage[0]); ?>&description=<?php the_title(); ?>"><i class="fab fa-pinterest"></i></a>
                <a class="it-social instagram hover-effect" title="Instagram" target="_blank" href="https://instagram.com/<?php echo soapee_get_opt('instagram_user');?>"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <?php
    }
}

/**
 * Post Author Info
****/
if(!function_exists('soapee_post_author_info')){
    function soapee_post_author_info($args = []){
        $args = wp_parse_args($args,[
            'class'       => '',  
            'show_author' => soapee_get_opt('post_author_info_on','0')
        ]);
        if($args['show_author'] != '1' || get_the_author_meta( 'description' ) == '' ) return;
    ?>
        <div class="<?php echo trim(implode(' ', ['cms-post-author-info', $args['class']]));?>">
            <div class="cms-post-author row">
                <div class="cms-post-author-avatar col-auto">
                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 'full' ); ?>
                    </div>
                <div class="cms-post-author-description col"><?php 
                    echo '<div class="cms-post-author-title h4">'.get_the_author().'</div>';
                    the_author_meta( 'description' );
                    soapee_get_user_social([
                        'class' => 'social-square m-t20'
                    ]); 
                ?></div>
            </div>
        </div>
    <?php 
    }
}
/**
 * Single  Next/Prev Link
*/
if(!function_exists('soapee_posts_nav_link')) { 
    function soapee_posts_nav_link($args = []){
        $args = wp_parse_args($args, [
            'show_nav'       => '1',
            'show_thumbnail' => '1',
            'thumbnail_size' => '80',
            'show_title'     => '1',
            'prev_title'     =>  esc_html__('Preview', 'soapee'). ' ' .get_post_type(),
            'next_title'     =>  esc_html__('Next', 'soapee'). ' ' . get_post_type(),
            'prev_icon'      => 'fas fa-long-arrow-alt-left',
            'next_icon'      => 'fas fa-long-arrow-alt-right',
            'class'          => '',
            'img_class'      => 'bdr-radius-10'
        ]);
        if($args['show_nav'] != '1') return;
        $next_post = get_next_post();
        $previous_post = get_previous_post();
    ?>
        <div class="<?php echo trim(implode(' ', ['cms-single-next-prev-navigation row gutters-30 justify-content-between', $args['class']])); ?>">
            <?php if(!empty($previous_post)) { ?>
            <div class="col-lg-6 relative text-start">
                <?php 
                    // overlay link
                    previous_post_link('%link',''); 
                ?>
                <div class="row align-items-center gutters-20">
                    <?php if('1' === $args['show_thumbnail']):
                        soapee_post_thumbnail([
                            'id'             => $previous_post->ID, 
                            'thumbnail_size' => $args['thumbnail_size'], 
                            'class'          => 'col-auto', 
                            'img_class'      => $args['img_class']
                        ]);
                    endif;
                        if('1' !== $args['show_thumbnail'] && !empty($args['prev_icon'])){
                            echo '<div class="col-auto"><span class="cms-nav-icon '.$args['prev_icon'].'"></span></div>';
                        }
                     ?>
                    <div class="col"><?php 
                        // label
                        if(!empty($args['prev_title'])) printf('<div class="cms-nav-label text-13 text-va-100 text-uppercase">%s</div>', esc_html($args['prev_title']));
                        // title
                        if('1' === $args['show_title']) printf('<div class="cms-nav-title h3 text-20 text-va-30">%s</div>', get_the_title($previous_post->ID ));
                    ?></div>
                </div>
            </div>
            <?php } else { echo '<div class="col-auto col-lg-6 relative text-start"></div>'; }
            if(!empty($next_post)) : ?>
            <div class="col-lg-6 relative text-end">
                <?php 
                    // overlay link
                    next_post_link('%link','');
                ?>
                <div class="row align-items-center gutters-20">
                    <div class="col"><?php
                        // label
                        if(!empty($args['prev_title'])) printf('<div class="cms-nav-label text-13 text-va-100 text-uppercase">%s</div>', esc_html($args['next_title']));
                        // title
                        if('1' === $args['show_title']) printf('<div class="cms-nav-title h3 text-20 text-va-30">%s</div>', get_the_title($next_post->ID ));
                    ?></div>
                    <?php if('1' === $args['show_thumbnail']):
                        soapee_post_thumbnail([
                            'id'             => $next_post->ID,
                            'thumbnail_size' => $args['thumbnail_size'], 
                            'class'          => 'col-auto', 
                            'img_class'      => $args['img_class']
                        ]); 
                    endif;
                        if('1' !== $args['show_thumbnail'] && !empty($args['next_icon'])){
                            echo '<div class="col-auto"><span class="cms-nav-icon '.$args['next_icon'].'"></span></div>';
                        }
                    ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    <?php }
}

/**
 * Related Post
 */
if(!function_exists('soapee_related_post')){
    function soapee_related_post($args = [])
    {
        $args = wp_parse_args($args, [
            'class'          => '',
            'show_related'   => soapee_get_opt( 'post_related_on', '0' ),
            'title'          => esc_html__('Related Posts','soapee'),
            'posts_per_page' => '2',
            'post_type'      => 'post'
        ]);

        if($args['show_related'] != '1') return;
        
        global $post;
        $current_id = $post->ID;
        $posttags = get_the_category($post->ID);
        if (empty($posttags)) return;
        $tags = array();
        foreach ($posttags as $tag) {
            $tags[] = $tag->term_id;
        }
        $query_similar = new WP_Query(array(
            'posts_per_page' => $args['posts_per_page'], 
            'post_type'      => $args['post_type'], 
            'post_status'    => 'publish', 
            'category__in'   => $tags
        ));
        if (count($query_similar->posts) > 1) {
            ?>
            <div class="<?php echo trim(implode(' ', ['cms-related-post', $args['class']]));?>">
                <?php if(!empty($args['title'])) echo '<h4 class="text-uppercase">'.esc_html($args['title']).'</h4>'; ?>
                <div class="cms-related-post-inner row">
                    <?php foreach ($query_similar->posts as $post):
                        if ($post->ID !== $current_id) : ?>
                            <div class="grid-item col-lg-6 col-12">
                                <div class="grid-item-inner">
                                    <?php 
                                        soapee_post_media([
                                            'id'             => $post->ID,
                                            'thumbnail_size' => 'medium'
                                        ]);
                                    ?>
                                    <h4 class="item-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h4>
                                </div>
                            </div>
                        <?php endif;
                    endforeach; ?>
                </div>
            </div>
        <?php }
        wp_reset_postdata();
    }
}

/**
 * Sidebar Hidden
 */
if(!function_exists('soapee_sidebar_hidden')){
    add_action('wp_footer', 'soapee_sidebar_hidden');
    function soapee_sidebar_hidden()
    {
        $hidden_sidebar_on = soapee_get_opts( 'hidden_sidebar_on', '0' );
        if($hidden_sidebar_on == '0' || !is_active_sidebar('sidebar-hidden')) return; 
        ?>
            <div class="cms-hidden-sidebar">
                <div class="cms-hidden-close fas fa-times"></div>
                <div class="cms-hidden-sidebar-inner cms-mousewheel p-30">
                    <div class="cms-hidden-sidebar-inner2 cms-mousewheel-inner">
                        <div class="cms-sidebar-area">
                            <div class="cms-sidebar-area-inner">
                                <?php dynamic_sidebar( 'sidebar-hidden' ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
}
if(!function_exists('soapee_hidden_sidebar_icon')){
    function soapee_hidden_sidebar_icon($args = []){
        if(soapee_get_opts( 'hidden_sidebar_on', '0' ) != '1' || !is_active_sidebar('sidebar-hidden')) return;
        $args = wp_parse_args($args, [
            'class' => '',
            'icon'  => 'fas fa-sign-out-alt'
        ]);
    ?>
        <div class="<?php echo trim(implode(' ', ['cms-header-hidden-sidebar header-icon cms-transition', $args['class']]));?>">
            <span class="<?php echo trim(implode(' ', [$args['icon']]));?>"></span>
        </div>
    <?php
    }
}

/**
 * User custom fields.
 */
add_action( 'show_user_profile', 'soapee_user_fields' );
add_action( 'edit_user_profile', 'soapee_user_fields' );
function soapee_user_fields($user){

    $user_facebook = get_user_meta($user->ID, 'user_facebook', true);
    $user_twitter = get_user_meta($user->ID, 'user_twitter', true);
    $user_linkedin = get_user_meta($user->ID, 'user_linkedin', true);
    $user_skype = get_user_meta($user->ID, 'user_skype', true);
    $user_google = get_user_meta($user->ID, 'user_google', true);
    $user_youtube = get_user_meta($user->ID, 'user_youtube', true);
    $user_vimeo = get_user_meta($user->ID, 'user_vimeo', true);
    $user_tumblr = get_user_meta($user->ID, 'user_tumblr', true);
    $user_rss = get_user_meta($user->ID, 'user_rss', true);
    $user_pinterest = get_user_meta($user->ID, 'user_pinterest', true);
    $user_instagram = get_user_meta($user->ID, 'user_instagram', true);
    $user_yelp = get_user_meta($user->ID, 'user_yelp', true);

    ?>
    <h3><?php esc_html_e('Social', 'soapee'); ?></h3>
    <table class="form-table">
        <tr>
            <th><label for="user_facebook"><?php esc_html_e('Facebook', 'soapee'); ?></label></th>
            <td>
                <input id="user_facebook" name="user_facebook" type="text" value="<?php echo esc_attr(isset($user_facebook) ? $user_facebook : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_twitter"><?php esc_html_e('Twitter', 'soapee'); ?></label></th>
            <td>
                <input id="user_twitter" name="user_twitter" type="text" value="<?php echo esc_attr(isset($user_twitter) ? $user_twitter : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_linkedin"><?php esc_html_e('Linkedin', 'soapee'); ?></label></th>
            <td>
                <input id="user_linkedin" name="user_linkedin" type="text" value="<?php echo esc_attr(isset($user_linkedin) ? $user_linkedin : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_skype"><?php esc_html_e('Skype', 'soapee'); ?></label></th>
            <td>
                <input id="user_skype" name="user_skype" type="text" value="<?php echo esc_attr(isset($user_skype) ? $user_skype : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_google"><?php esc_html_e('Google', 'soapee'); ?></label></th>
            <td>
                <input id="user_google" name="user_google" type="text" value="<?php echo esc_attr(isset($user_google) ? $user_google : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_youtube"><?php esc_html_e('Youtube', 'soapee'); ?></label></th>
            <td>
                <input id="user_youtube" name="user_youtube" type="text" value="<?php echo esc_attr(isset($user_youtube) ? $user_youtube : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_vimeo"><?php esc_html_e('Vimeo', 'soapee'); ?></label></th>
            <td>
                <input id="user_vimeo" name="user_vimeo" type="text" value="<?php echo esc_attr(isset($user_vimeo) ? $user_vimeo : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_tumblr"><?php esc_html_e('Tumblr', 'soapee'); ?></label></th>
            <td>
                <input id="user_tumblr" name="user_tumblr" type="text" value="<?php echo esc_attr(isset($user_tumblr) ? $user_tumblr : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_rss"><?php esc_html_e('Rss', 'soapee'); ?></label></th>
            <td>
                <input id="user_rss" name="user_rss" type="text" value="<?php echo esc_attr(isset($user_rss) ? $user_rss : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_pinterest"><?php esc_html_e('Pinterest', 'soapee'); ?></label></th>
            <td>
                <input id="user_pinterest" name="user_pinterest" type="text" value="<?php echo esc_attr(isset($user_pinterest) ? $user_pinterest : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_instagram"><?php esc_html_e('Instagram', 'soapee'); ?></label></th>
            <td>
                <input id="user_instagram" name="user_instagram" type="text" value="<?php echo esc_attr(isset($user_instagram) ? $user_instagram : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_yelp"><?php esc_html_e('Yelp', 'soapee'); ?></label></th>
            <td>
                <input id="user_yelp" name="user_yelp" type="text" value="<?php echo esc_attr(isset($user_yelp) ? $user_yelp : ''); ?>" />
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Save user custom fields.
 */
add_action( 'personal_options_update', 'soapee_save_user_custom_fields' );
add_action( 'edit_user_profile_update', 'soapee_save_user_custom_fields' );
function soapee_save_user_custom_fields( $user_id )
{
    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;

    if(isset($_POST['user_facebook']))
        update_user_meta( $user_id, 'user_facebook', $_POST['user_facebook'] );
    if(isset($_POST['user_twitter']))
        update_user_meta( $user_id, 'user_twitter', $_POST['user_twitter'] );
    if(isset($_POST['user_linkedin']))
        update_user_meta( $user_id, 'user_linkedin', $_POST['user_linkedin'] );
    if(isset($_POST['user_skype']))
        update_user_meta( $user_id, 'user_skype', $_POST['user_skype'] );
    if(isset($_POST['user_google']))
        update_user_meta( $user_id, 'user_google', $_POST['user_google'] );
    if(isset($_POST['user_youtube']))
        update_user_meta( $user_id, 'user_youtube', $_POST['user_youtube'] );
    if(isset($_POST['user_vimeo']))
        update_user_meta( $user_id, 'user_vimeo', $_POST['user_vimeo'] );
    if(isset($_POST['user_tumblr']))
        update_user_meta( $user_id, 'user_tumblr', $_POST['user_tumblr'] );
    if(isset($_POST['user_rss']))
        update_user_meta( $user_id, 'user_rss', $_POST['user_rss'] );
    if(isset($_POST['user_pinterest']))
        update_user_meta( $user_id, 'user_pinterest', $_POST['user_pinterest'] );
    if(isset($_POST['user_instagram']))
        update_user_meta( $user_id, 'user_instagram', $_POST['user_instagram'] );
    if(isset($_POST['user_yelp']))
        update_user_meta( $user_id, 'user_yelp', $_POST['user_yelp'] );
}
/* Author Social */
if(!function_exists('soapee_get_user_social')){
    function soapee_get_user_social($args = []) {
        $args = wp_parse_args($args,[
            'class' => ''
        ]);
        $user_facebook = get_user_meta(get_the_author_meta( 'ID' ), 'user_facebook', true);
        $user_twitter = get_user_meta(get_the_author_meta( 'ID' ), 'user_twitter', true);
        $user_linkedin = get_user_meta(get_the_author_meta( 'ID' ), 'user_linkedin', true);
        $user_skype = get_user_meta(get_the_author_meta( 'ID' ), 'user_skype', true);
        $user_google = get_user_meta(get_the_author_meta( 'ID' ), 'user_google', true);
        $user_youtube = get_user_meta(get_the_author_meta( 'ID' ), 'user_youtube', true);
        $user_vimeo = get_user_meta(get_the_author_meta( 'ID' ), 'user_vimeo', true);
        $user_tumblr = get_user_meta(get_the_author_meta( 'ID' ), 'user_tumblr', true);
        $user_rss = get_user_meta(get_the_author_meta( 'ID' ), 'user_rss', true);
        $user_pinterest = get_user_meta(get_the_author_meta( 'ID' ), 'user_pinterest', true);
        $user_instagram = get_user_meta(get_the_author_meta( 'ID' ), 'user_instagram', true);
        $user_yelp = get_user_meta(get_the_author_meta( 'ID' ), 'user_yelp', true);

        ?>
        <div class="<?php echo trim(implode(' ', ['user-social', $args['class']]));?>">
            <?php if(!empty($user_facebook)) { ?>
                <a href="<?php echo esc_url($user_facebook); ?>"><i class="fab fa-facebook-f"></i></a>
            <?php } ?>
            <?php if(!empty($user_twitter)) { ?>
                <a href="<?php echo esc_url($user_twitter); ?>"><i class="fa fa-twitter"></i></a>
            <?php } ?>
            <?php if(!empty($user_linkedin)) { ?>
                <a href="<?php echo esc_url($user_linkedin); ?>"><i class="fa fa-linkedin"></i></a>
            <?php } ?>
            <?php if(!empty($user_rss)) { ?>
                <a href="<?php echo esc_url($user_rss); ?>"><i class="fa fa-rss"></i></a>
            <?php } ?>
            <?php if(!empty($user_instagram)) { ?>
                <a href="<?php echo esc_url($user_instagram); ?>"><i class="fa fa-instagram"></i></a>
            <?php } ?>
            <?php if(!empty($user_google)) { ?>
                <a href="<?php echo esc_url($user_google); ?>"><i class="fa fa-google-plus"></i></a>
            <?php } ?>
            <?php if(!empty($user_skype)) { ?>
                <a href="<?php echo esc_url($user_skype); ?>"><i class="fa fa-skype"></i></a>
            <?php } ?>
            <?php if(!empty($user_pinterest)) { ?>
                <a href="<?php echo esc_url($user_pinterest); ?>"><i class="fa fa-pinterest"></i></a>
            <?php } ?>
            <?php if(!empty($user_vimeo)) { ?>
                <a href="<?php echo esc_url($user_vimeo); ?>"><i class="fa fa-vimeo"></i></a>
            <?php } ?>
            <?php if(!empty($user_youtube)) { ?>
                <a href="<?php echo esc_url($user_youtube); ?>"><i class="fa fa-youtube"></i></a>
            <?php } ?>
            <?php if(!empty($user_yelp)) { ?>
                <a href="<?php echo esc_url($user_yelp); ?>"><i class="fa fa-yelp"></i></a>
            <?php } ?>
            <?php if(!empty($user_tumblr)) { ?>
                <a href="<?php echo esc_url($user_tumblr); ?>"><i class="fa fa-tumblr"></i></a>
            <?php } ?>

        </div> <?php
    }
}
/**
 * Social Icon
 */

function soapee_header_social($args=[]) {
    $args = wp_parse_args($args,[
        'icon_class' => '',
        'before'     => '',
        'after'      => ''
    ]);
    $social_list = soapee_get_opts( 'social_list' );
    if(isset($social_list['enabled']) && count($social_list['enabled']) === 1) return;
    if($social_list && isset($social_list['enabled'])){
        printf('%s', $args['before']);
        foreach ($social_list['enabled'] as $social_key => $social_name){
            $social_link = soapee_get_opt( 'social_' . $social_key . '_url' );
            $social_icon = !empty(soapee_get_opt( 'social_' . $social_key . '_icon')) ? soapee_get_opt( 'social_' . $social_key . '_icon') : 'fab fa-'.$social_key;
            $social_link = !empty($social_link)?$social_link:'#';
            if($social_key !== 'placebo') echo '<a href="'. esc_url($social_link) .'" target="_blank" class="'.trim(implode(' ', ['header-icon', $args['icon_class']])) .'"><span class="'.esc_attr($social_icon).'"></span></a>';
        }
        printf('%s', $args['after']);
    }
}

/**
 * Header Top
**/
if(!function_exists('soapee_header_top_text')){
    function soapee_header_top_text($args = []){
        $args = wp_parse_args($args,[
            'tag'   => 'div',
            'class' => '',
            'text'  => ''
        ]);
        $text = soapee_get_opts('header_top_short_text', $args['text']);
        if(empty($text)) return;
        echo '<'.$args['tag'].' class="'.implode(' ', ['cms-header-top-text', $args['class']]).'">';
            printf('%s', $text);
        echo '</'.$args['tag'].'>';
    }
}
if(!function_exists('soapee_header_top_quick_contact')){
    function soapee_header_top_quick_contact($args=[]){
        $args = wp_parse_args($args,[
            'before' => '',
            'after'  => '',
            'tag'    => 'div',
            'class'  => ''
        ]);
        // html
        if(!empty($args['before']))  echo soapee_html($args['before']);
            echo '<'.$args['tag'].' class="'.implode(' ', ['cms-quickcontact style-2', $args['class']]).'">';
                for ($i=0; $i < 4 ; $i++) { 
                   if(!empty(soapee_get_opts('header_top_icon'.$i, '')) || !empty(soapee_get_opts('header_top_icon'.$i.'_label', '')) || !empty(soapee_get_opts('header_top_icon'.$i.'_text', '')) ){
                        echo '<div class="cms-qc-item">';
                            if(!empty(soapee_get_opts('header_top_icon'.$i, ''))) echo '<span class="qc-icon '.esc_attr(soapee_get_opts('header_top_icon'.$i, '')).'"></span>';
                            echo '<span>';
                                if(!empty(soapee_get_opts('header_top_icon'.$i.'_label', ''))) echo '<span class="qc-label">'.esc_html(soapee_get_opts('header_top_icon'.$i.'_label', '')).'</span>';
                                if(!empty(soapee_get_opts('header_top_icon'.$i.'_text', ''))) echo '<span class="qc-text">'.esc_html(soapee_get_opts('header_top_icon'.$i.'_text', '')).'</span>';
                            echo '</span>';
                        echo '</div>';
                   }
                }
            echo '</'.$args['tag'].'>';
        if(!empty($args['after'])) echo soapee_html($args['after']);
    }
}
if(!function_exists('soapee_header_top_social')){
    function soapee_header_top_social($args=[]) {
        $args = wp_parse_args($args, [
            'tag'    => 'div',
            'class'  => '',
            'before' => '',
            'after'  => ''
        ]);
        $social_list = soapee_get_opts( 't_social_list' );
        if(isset($social_list['enabled']) && count($social_list['enabled']) === 1) return;

        if(!empty($args['before'])) echo soapee_html($args['before']);
            echo '<'.$args['tag'].' class="'.implode(' ', ['cms-social-list', $args['class']]).'">';
                foreach ($social_list['enabled'] as $social_key => $social_name){
                    $social_link = soapee_get_opt( 'social_' . $social_key . '_url' );
                    $social_link = !empty($social_link)?$social_link:'#';
                    if($social_key == 'facebook') $social_key = $social_key.'-f';
                    if($social_key !== 'placebo') echo '<a href="'. esc_url($social_link) .'" target="_blank"><span class="cms-icon fab fa-' . esc_attr($social_key) . '"></span></a>';
                }
            echo '</'.$args['tag'].'>';
        if(!empty($args['after'])) echo soapee_html($args['after']);
    }
}
if(!function_exists('soapee_header_top')){
    function soapee_header_top($args = []){
        $args = wp_parse_args($args, []);
        $show_header_top = soapee_get_opts('show_header_top', '0');
        if($show_header_top == '0') return;
    ?>
    <div id="cms-header-top" class="cms-header-top text-primary bg-white d-max-sm-none">
        <div class="<?php soapee_header_container_css_class(); ?>">
            <div class="row justify-content-center justify-content-xxl-between align-items-center">
                <div class="col-auto"><?php
                    soapee_header_top_text(['tag' => 'span','class' => 'd-inline-block d-max-xs-none p-tb-13']);
                ?></div>
                <div class="col-auto"><?php 
                    soapee_header_top_quick_contact(['class' => 'd-flex justify-content-sm-center']);
                    soapee_header_top_social(['tag' => 'span','class' => 'd-inline-block']); 
                ?></div>
            </div>
        </div>
    </div>
    <?php
    }
}
// Header Button 
if(!function_exists('soapee_header_button')){
    function soapee_header_button($args=[]){
        $args = wp_parse_args($args,[
            'class'     => '',
            'btn_class' => ''
        ]);
        $h_btn_on          = soapee_get_opts( 'h_btn_on', '0' );
        $h_btn_text        = soapee_get_opts( 'h_btn_text', 'Your Text' );
        $h_btn_link_type   = soapee_get_opts( 'h_btn_link_type', 'page' );
        $h_btn_link        = soapee_get_opts( 'h_btn_link' );
        $h_btn_link_custom = soapee_get_opts( 'h_btn_link_custom' );
        $h_btn_target      = soapee_get_opts( 'h_btn_target', '_self' );
        if($h_btn_link_type == 'page') {
            $h_btn_url = get_permalink($h_btn_link);
        } else {
            $h_btn_url = $h_btn_link_custom;
        }
        if($h_btn_on == '0') return;
        ?>
            <div class="<?php echo trim(implode(' ', ['cms-header-btn', $args['class']])); ?>">
                <a href="<?php echo esc_url( $h_btn_url ); ?>" target="<?php echo esc_attr($h_btn_target); ?>" class="<?php echo trim(implode(' ', ['h-btn', $args['btn_class']])); ?>"><?php 
                    echo esc_html( $h_btn_text ); 
                ?></a>
            </div>
    <?php
    }
}
// Header Search
if(!function_exists('soapee_header_search')){
    function soapee_header_search($args=[]){
        $args = wp_parse_args($args, [
            'class'      => '',
            'icon_class' => '',
            'icon'       => 'fa fa-search'
        ]);
        $search_on = soapee_get_opts('search_on', '0');
        $css_class = ['cms-header-search', $args['class']];
        if($search_on == '0') return;
        wp_enqueue_script('magnific-popup');
        wp_enqueue_style('magnific-popup');
    ?>
        <div class="<?php echo implode(' ', $css_class);?>">
            <a href="#cms-search-popup" class="<?php echo trim(implode(' ', ['h-btn-search cms-transition header-icon', $args['icon_class']])); ?>"><span class="<?php echo esc_attr($args['icon']);?>"></span></a>
        </div>
    <?php
    }
}
/**
 * Search Popup
 */
if(!function_exists('soapee_search_popup')){
    add_action('wp_footer', 'soapee_search_popup', 1);
    function soapee_search_popup(){
        $search_on = soapee_get_opts( 'search_on', '0' );
        ?>
        <div class="d-none">
            <div id="cms-search-popup" class="cms-search-popup">
                <div class="container">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>
        <?php
    }
}
// Header Cart
if(!function_exists('soapee_header_cart')){
    function soapee_header_cart($args=[]){
        $cart_on = soapee_get_opts( 'cart_on', '0' );
        if(!class_exists('Woocommerce') || $cart_on == '0') return;
        $args = wp_parse_args($args,[
            'class'      => '',
            'style'      => '1',
            'icon'       => 'fa fa-shopping-cart',
            'icon_class' => ''
        ]);
        $css_class = ['cms-header-cart relative', $args['class']];
    ?>
        <div class="<?php echo implode(' ', $css_class); ?>">
            <span class="<?php echo trim(implode(' ', ['h-btn-cart cms-transition header-icon', $args['icon_class']])); ?>">
                <span class="<?php echo esc_attr($args['icon']);?>"></span>
                <span class="header-count cart-count cart_total style-<?php echo esc_attr($args['style']);?>"><?php soapee_woocommerce_cart_counter(['style' => $args['style']]); ?></span>
            </span>
            <div class="widget_shopping_cart">
                <div class="widget_shopping_cart_content">
                    <?php woocommerce_mini_cart(); ?>
                </div>
            </div>
        </div>
    <?php
    }
}
if(!function_exists('soapee_woocommerce_add_to_cart_fragments')){
    add_filter('woocommerce_add_to_cart_fragments', 'soapee_woocommerce_add_to_cart_fragments', 10, 1 );
    function soapee_woocommerce_add_to_cart_fragments( $fragments ) {
        if(!class_exists('WooCommerce')) return;
        ob_start();
        $header_layout = soapee_get_opts('header_layout','1');
        switch ($header_layout) {
            case '5':
                $cart_style = '2';
                break;
            
            default:
                $cart_style = '1';
                break;
        }
        ?>
        <span class="header-count cart-count cart_total style-<?php echo esc_attr($cart_style);?>"><?php soapee_woocommerce_cart_counter(['style' => $cart_style]); ?></span>
        <?php
        $fragments['.cart_total'] = ob_get_clean();
        return $fragments;
    }
}

if(!function_exists('soapee_woocommerce_cart_counter')){
    function soapee_woocommerce_cart_counter($args=[]){
        if(!class_exists('WooCommerce')) return;
        $args = wp_parse_args($args, [
            'style' => '1'
        ]);
        switch ($args['style']) {
            case '2':
                $count = WC()->cart->cart_contents_count;
                break;
            
            default:
                $count = WC()->cart->cart_contents_count;
                break;
        }
        echo soapee_html($count);
    }
}

// Mobile menu icon
if(!function_exists('soapee_mobile_menu_icon')){
    function soapee_mobile_menu_icon($args=[]){
        $args = wp_parse_args($args,[
            'class' => ''
        ]);
        $css_class = ['main-menu-mobile', $args['class']];
        ?>
            <div id="main-menu-mobile" class="<?php echo implode(' ', $css_class);?>">
                <span class="btn-nav-mobile open-menu">
                    <span></span>
                </span>
            </div>
        <?php
    }
}
// Menu Right Class
if(!function_exists('soapee_site_menu_right_class')){
    function soapee_site_menu_right_class($class=''){
        $css_class         = ['cms-navigation-attrs'];
        $cart_on           = soapee_get_opts('cart_on','0');
        $search_on         = soapee_get_opts('search_on','0');
        $social_list       = soapee_get_opts( 'social_list' );
        $social_on         = (count($social_list['enabled']) > 1) ? '1' : '0';
        $hidden_sidebar_on = soapee_get_opts('hidden_sidebar_on', '0');
        if($cart_on == '1' || $search_on == '1' || $social_on == '1' || $hidden_sidebar_on == '1') $css_class[] = 'has-atts';
        $css_class[] =  $class;
        echo implode(' ', $css_class);
    }
}