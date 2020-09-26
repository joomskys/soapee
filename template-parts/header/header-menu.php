<?php
/**
 * Template part for displaying the primary menu of the site
 */
if ( has_nav_menu( 'primary' ) )
{
    wp_nav_menu( array(
        'theme_location' => 'primary',
        'container'      => '',
        'menu_id'        => 'cms-primary-menu',
        'menu_class'     => 'cms-primary-menu clearfix',
        'walker'         => class_exists( 'EFramework_Mega_Menu_Walker' ) ? new EFramework_Mega_Menu_Walker : '',
    ) );
}
else
{
    printf(
        '<ul class="cms-primary-menu primary-menu-not-set"><li><a href="%1$s">%2$s</a></li></ul>',
        esc_url( admin_url( 'nav-menus.php' ) ),
        esc_html__( 'Create New Menu', 'soapee' )
    );
}