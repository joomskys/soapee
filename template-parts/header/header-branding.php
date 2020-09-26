<?php
/**
 * Template part for displaying site branding
 */

$logo = soapee_get_opts( 'logo', array( 'url' => soapee_configs('logo')['default'], 'id' => '' ) );
$logo_url = $logo['url'];

$logo_ontop = soapee_get_opts( 'logo_ontop', array( 'url' => soapee_configs('logo')['ontop'], 'id' => '' ) );
$logo_ontop_url = $logo_ontop['url'];

$logo_sticky = soapee_get_opts( 'logo_sticky', array( 'url' => soapee_configs('logo')['sticky'], 'id' => '' ) );
$logo_sticky_url = $logo_sticky['url'];

$logo_mobile = soapee_get_opts( 'logo_mobile', array( 'url' => soapee_configs('logo')['mobile'], 'id' => '' ) );
$logo_mobile_url = $logo_mobile['url'];


printf(
    '<a class="logo-default" href="%1$s" title="%2$s" rel="home"><img class="cms-logo" src="%3$s" alt="%2$s"/></a>',
    esc_url( home_url( '/' ) ),
    esc_attr( get_bloginfo( 'name' ) ),
    esc_url( $logo_url )
);
printf(
    '<a class="logo-ontop" href="%1$s" title="%2$s" rel="home"><img class="cms-logo" src="%3$s" alt="%2$s"/></a>',
    esc_url( home_url( '/' ) ),
    esc_attr( get_bloginfo( 'name' ) ),
    esc_url( $logo_ontop_url )
);
printf(
    '<a class="logo-sticky" href="%1$s" title="%2$s" rel="home"><img class="cms-logo" src="%3$s" alt="%2$s"/></a>',
    esc_url( home_url( '/' ) ),
    esc_attr( get_bloginfo( 'name' ) ),
    esc_url( $logo_sticky_url )
);

printf(
    '<a class="logo-mobile" href="%1$s" title="%2$s" rel="home"><img class="cms-logo" src="%3$s" alt="%2$s"/></a>',
    esc_url( home_url( '/' ) ),
    esc_attr( get_bloginfo( 'name' ) ),
    esc_url( $logo_mobile_url )
);  
