<?php
/**
 * Template part for displaying default header layout
 */
?>
<header id="cms-header" class="<?php soapee_header_css_class('relative'); ?>">
    <div class="<?php soapee_header_container_css_class(); ?>">
        <div class="row justify-content-between align-items-center">
            <?php soapee_logo(['class' => 'cms-header-left col']); ?>
            <div class="cms-header-right col-auto">
                <div class="row align-items-center">
                    <div class="cms-navigation col-auto">
                        <nav class="cms-main-navigation">
                            <?php get_template_part( 'template-parts/header/header-menu' ); ?>
                        </nav>
                    </div>
                    <div class="<?php soapee_site_menu_right_class('col-auto');?>">
                        <div class="cms-navigation-attrs-inner row align-items-center"><?php 
                            do_action('soapee_header_before_atts');
                            soapee_header_cart(['class' => 'col-auto']);
                            soapee_header_search(['class' => 'col-auto']);
                            soapee_header_social([
                                'before'     => '<div class="cms-header-socials col-auto">', 
                                'after'      => '</div>',
                                'icon_class' => ''
                            ]);
                            soapee_hidden_sidebar_icon(['class' => 'col-auto']);
                            soapee_header_button([
                                'class'     => 'col-auto d-none d-sm-block',
                                'btn_class' => 'btn btn-secondary',
                                'text'      => soapee_get_opts('h_btn_text',esc_html__('Your Text','soapee'))
                            ]);
                            do_action('soapee_header_after_atts');
                            soapee_mobile_menu_icon(['class' => 'col-auto']);
                        ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>