<?php
/**
 * Show Sidebar
 * All function for sidebar
*/
if(!function_exists('soapee_get_sidebar')){
    function soapee_get_sidebar($check = true){
        global $wp_query;
        if ( isset($_GET['post_type'])) {
            $sidebar = 'sidebar-'.$_GET['post_type'];
        } elseif (isset($wp_query->post->post_type) && !is_search()){
            $sidebar = 'sidebar-'.$wp_query->post->post_type;
        } elseif ( is_search() ) {
            $sidebar = 'sidebar-post';
        } else {
            $sidebar = 'sidebar-post';
        }

        if($check)
            return is_active_sidebar($sidebar);
        else 
            return $sidebar;
    }
}
if(!function_exists('soapee_sidebar_position')){
    function soapee_sidebar_position(){
        global $wp_query;        
        if((is_archive() || is_post_type_archive('post') || is_home() || is_search()) && !is_post_type_archive('product')){
            $sidebar_position = soapee_get_opts('archive_sidebar_pos', 'right');
        } elseif(is_post_type_archive('portfolio')) {
            $sidebar_position = soapee_get_opts('portfolio_archive_sidebar_pos', 'right');
        } elseif(is_page()){
            if (class_exists('WooCommerce') && (is_checkout() || is_cart())) {
                $sidebar_position = soapee_get_opts('product-sidebar-pos', 'right');
            } else {
                $sidebar_position = soapee_get_opts('sidebar_page_pos', 'right');
            }
        } elseif (is_singular('post')) {
            $sidebar_position = soapee_get_opts('post_sidebar_pos', 'right');
        } elseif (is_singular('portfolio')) {
            $sidebar_position = soapee_get_opts('portfolio_sidebar_pos', 'right');
        } elseif (is_singular('cms-service')) {
            $sidebar_position = soapee_get_opts('post_sidebar_pos', 'right');
        } elseif (class_exists('WooCommerce') && is_post_type_archive('product')) {
            $sidebar_position = soapee_get_opts('product-sidebar-pos', 'right');
        } elseif (is_singular('product')) {
            $sidebar_position = soapee_get_opts('single-product-sidebar-pos', 'right');
        } else {
            $sidebar_position = 'none';
        }
        return $sidebar_position;
    }
}
function soapee_sidebar($args = []){
    $sidebar            = soapee_get_sidebar(false);
    $sidebar_position   = soapee_sidebar_position();
    if( in_array($sidebar_position, ['0','none']) ) return;
    $args = wp_parse_args($args, [
        'class' => ''
    ]);
    ?>
        <div id="cms-sidebar-area" class="<?php soapee_sidebar_css_class(['class' => $args['class']]); ?>">
            <div class="cms-sidebar-area-inner"><?php 
                get_sidebar(); 
            ?></div>
        </div>
    <?php
}

/*
 * Sidebar area css class
*/
function soapee_sidebar_css_class($args=[]){
    $args = wp_parse_args($args, [
        'class' => ''
    ]);
    $classes = [
        'cms-sidebar-area',
        'cms-sidebar-area-'.soapee_sidebar_position(),
        $args['class']
    ];
    $sidebar_position   = soapee_sidebar_position();
    if( in_array($sidebar_position, ['0', 'none', 'bottom']) ){
        $classes[] = 'col-12 has-gtb';
    } else {
        $content_grid_class = (int) soapee_get_opts('archive_grid_col', '8');
        $sidebar_grid_class = 12 - $content_grid_class;
        $classes[] = 'col-lg-'.$sidebar_grid_class; 
    }
    echo trim(implode(' ', $classes));
}