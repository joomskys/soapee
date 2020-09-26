<?php
add_action( 'admin_enqueue_scripts', function(){
      wp_enqueue_style( 'iconmoon-font', get_template_directory_uri() . '/assets/fonts/icomoon/css/font-icomoon.css', array(), '1.0' );
} );
// add icon to cms icon picker 
if(!function_exists('soapee_cms_iconmoon_iconpicker')){
    add_filter("redux_cms_iconpicker_field/get_icons", 'soapee_cms_iconmoon_iconpicker');
    function soapee_cms_iconmoon_iconpicker($icons){
        $icons['IcoMoon'] = [
			array('iconmoon-hours'        => 'iconmoon-hours'),
			array('iconmoon-hours-1'      => 'iconmoon-hours-1'),
			array('iconmoon-buildings'    => 'iconmoon-buildings'),
			array('iconmoon-clock'        => 'iconmoon-clock'),
			array('iconmoon-clock-1'      => 'iconmoon-clock-1'),
			array('iconmoon-email'        => 'iconmoon-email'),
			array('iconmoon-envelope'     => 'iconmoon-envelope'),
			array('iconmoon-envelope-1'   => 'iconmoon-envelope-1'),
			array('iconmoon-fax'          => 'iconmoon-fax'),
			array('iconmoon-house'        => 'iconmoon-house'),
			array('iconmoon-placeholder'  => 'iconmoon-placeholder'),
			array('iconmoon-smartphone'   => 'iconmoon-smartphone'),
			array('iconmoon-smartphone-1' => 'iconmoon-smartphone-1'),
			array('iconmoon-time'         => 'iconmoon-time'),
			array('iconmoon-time-1'       => 'iconmoon-time-1'),
			array('iconmoon-time-2'       => 'iconmoon-time-2'),
			array('iconmoon-travel'       => 'iconmoon-travel'),
        ];
        return $icons;
    }
}