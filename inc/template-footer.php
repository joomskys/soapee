<?php
/**
 * All function for footer
*/
/**
 * Footer 
 **/
if(!function_exists('soapee_footer')){
    function soapee_footer()
    {
        $footer_layout = soapee_get_opts( 'footer_layout', '1' );
        get_template_part( 'template-parts/footer/footer-layout', $footer_layout );
    }
}
/*
 * Footer css class
*/
if(!function_exists('soapee_footer_css_class')){
    function soapee_footer_css_class($args = []){
        $args = wp_parse_args($args, [
            'class' => ''
        ]);
        $footer_top_column = soapee_get_opts( 'footer_top_column', '3' );
        $footer_fixed = soapee_get_opts('footer_fixed', '0');
        $footer_mode = soapee_get_opts('footer_mode', 'dark');
        $css_classes = [
            'cms-footer',
            'cms-footer-'.$footer_mode,
            'cms-footer-'.$footer_top_column.'column'
        ];
        if($footer_fixed == '1') $css_classes[] = 'cms-footer-fixed';
        echo trim(implode(' ', $css_classes));
    }
}
/**
 * Footer Top
 */
function soapee_footer_top() {
    $footer_top_column = soapee_get_opts( 'footer_top_column', '2');
    if($footer_top_column === '0') return;
    $_class = "col-12";
    switch ($footer_top_column){
        case '2':
            $_class = 'col-auto';
            break;
        case '3':
            $_class = 'col-md-4 col-sm-12';
            break;
        case '4':
            $_class = 'col-lg-3 col-md-6 col-sm-12';
            break;
    }
    if ( is_active_sidebar( 'sidebar-footer-1' ) || is_active_sidebar( 'sidebar-footer-2' ) || is_active_sidebar( 'sidebar-footer-3' ) || is_active_sidebar( 'sidebar-footer-4' ) ) : ?>
        <div class="cms-footer-top">
            <?php do_action ('soapee_before_footer_top'); ?>
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <?php for($i = 1 ; $i <= $footer_top_column ; $i++){
                        if ( is_active_sidebar( 'sidebar-footer-' . $i ) ){
                            echo '<div class="cms-footer-item ' . esc_html($_class) . '">';
                                dynamic_sidebar( 'sidebar-footer-' . $i );
                            echo '</div>';
                        }
                    } ?>
                </div>
            </div>
            <?php do_action ('soapee_after_footer_top'); ?>
        </div>
    <?php endif; 
}
// Footer Middle 
if(!function_exists('soapee_footer_middle')){
    function soapee_footer_middle($args = []) {
        $footer_middle_column  = soapee_get_opts( 'footer_middle_column', '4' );
        if($footer_middle_column === '0') return;
        $args = wp_parse_args($args, [
            'class' => ''
        ]);
        $_class = "col-12";
        switch ($footer_middle_column){
            case '2':
                $_class = 'col-lg-6 col-md-6 col-sm-12';
                break;
            case '3':
                $_class = 'col-lg-4 col-md-4 col-sm-12';
                break;
            case '4':
                $_class = 'col-lg-3 col-md-6 col-sm-12';
                break;
        }
        $classes = ['cms-footer-item p-tb-15', $args['class'], $_class];
        if ( is_active_sidebar( 'sidebar-footer-middle-1' ) || is_active_sidebar( 'sidebar-footer-middle-2' ) || is_active_sidebar( 'sidebar-footer-middle-3' ) || is_active_sidebar( 'sidebar-footer-middle-4' ) ) : ?>
            <div class="cms-footer-middle pt-50 pb-55 relative">
                <?php do_action ('soapee_before_footer_middle'); ?>
                <div class="container">
                    <div class="row">
                        <?php
                            for($i = 1 ; $i <= $footer_middle_column ; $i++){
                                if ( is_active_sidebar( 'sidebar-footer-middle-' . $i ) ){
                                    echo '<div class="'.trim(implode(' ', $classes)).'">';
                                        dynamic_sidebar( 'sidebar-footer-middle-' . $i );
                                    echo '</div>';
                                }
                            }
                        ?>
                    </div>
                </div>
                <?php do_action ('soapee_after_footer_middle'); ?>
            </div>
        <?php endif;
    }
}
if(!function_exists('soapee_footer_middle_image_top')){
    add_action('soapee_before_footer_middle', 'soapee_footer_middle_image_top', 0);
    add_action('soapee_after_footer_middle', 'soapee_footer_middle_image_bottom', 0);
    function soapee_footer_middle_image_top($args = []){
        $args = wp_parse_args($args, [
            'class' => ''
        ]);
        $image = soapee_get_opts( 'footer_middle_img', array( 'url' => '', 'id' => '' ) )['url'];
        $footer_middle_img_pos = soapee_get_opts('footer_middle_img_pos', 'bottom-left');
        $footer_middle_img_animation = soapee_get_opts('footer_middle_img_animation', 'fadeInLeft');
        if(empty($image) || !in_array($footer_middle_img_pos, ['top-left','top-right', 'top-center'])) return;
        ?>
        <div class="<?php echo trim(implode(' ', ['cms-footer-middle-img', $footer_middle_img_pos, 
        $footer_middle_img_animation, $args['class']])) ?>">
            <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ) ?>" />
        </div>
        <?php
    }
    function soapee_footer_middle_image_bottom($args = []){
        $args = wp_parse_args($args, [
            'class' => ''
        ]);
        $image = soapee_get_opts( 'footer_middle_img', array( 'url' => '', 'id' => '' ) )['url'];
        $footer_middle_img_pos = soapee_get_opts('footer_middle_img_pos', 'bottom-left');
        $footer_middle_img_animation = soapee_get_opts('footer_middle_img_animation', 'fadeInLeft');
        if(empty($image) || !in_array($footer_middle_img_pos, ['bottom-left','bottom-right', 'bottom-center'])) return;
        ?>
        <div class="<?php echo trim(implode(' ', ['cms-footer-middle-img', $footer_middle_img_pos, $footer_middle_img_animation, $args['class']])) ?>">
            <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ) ?>" />
        </div>
        <?php
    }
}
if(!function_exists('soapee_footer_copyright')){
    function soapee_footer_copyright($args = []){
        $args = wp_parse_args($args, [
            'class' => ''
        ]);
        $classes = ['cms-footer-copyright', $args['class']];
        $default = '&copy; 2020 Soapee by <a href="https://themeforest.net/user/cmssuperheroes" target="_blank">CMSSuperHeroes</a>. All Rights Reserved.';
    ?>
    <div class="<?php echo trim(implode(' ', $classes));?>">
        <?php echo soapee_get_opts('footer_copyright', $default); ?>
    </div>
    <?php
    }
}
if(!function_exists('soapee_social_footer')){
    function soapee_social_footer($args = []) {
        $args = wp_parse_args($args, [
            'wrap'  => true,
            'class' => ''
        ]);
        $social_list = soapee_get_opt( 'f_social_list' );
        if($social_list && isset($social_list['enabled']) && count($social_list['enabled']) > 1){
            if($args['wrap']) printf('<div class="%s">', trim(implode(' ', ['cms-social', $args['class'], 'empty-none'])) );
            foreach ($social_list['enabled'] as $social_key => $social_name){
                $social_link = soapee_get_opt( 'social_' . $social_key . '_url' );
                $social_link = !empty($social_link)?$social_link:'#';
                if($social_key !== 'placebo')  echo '<a href="'. esc_url($social_link) .'" target="_blank"><span class="fab fa-' . esc_attr($social_key) . '"></span></a>';
            }
            if($args['wrap']) echo '</div>';
        }
    }
}
/***
 * Back to top
*/
if(!function_exists('soapee_backtotop')){
    add_action('wp_footer', 'soapee_backtotop',2);
   function soapee_backtotop($args = []){
    $back_totop_on = soapee_get_opt('back_totop_on', true);
    if (!$back_totop_on) return;
    ?>
        <a href="#" class="cms-scroll-top"><span class="cms-scroll-top-arrow cms-scroll-top-icon"></span></a>
    <?php 
   } 
}