<?php
/**
 * Widget Tag Cloud WP 
 * Change separator text, font size, ...
 * Hook filter: widget_tag_cloud_args, woocommerce_product_tag_cloud_widget_args
*/
if(!function_exists('soapee_widget_tag_cloud_args')){
    add_filter('widget_tag_cloud_args', 'soapee_widget_tag_cloud_args');
    add_filter('woocommerce_product_tag_cloud_widget_args', 'soapee_widget_tag_cloud_args');
    function soapee_widget_tag_cloud_args($args){
        $_args =[
            'smallest'  => '13',
            'largest'   => '13',
            'unit'      => 'px',
            'separator' => ''
        ];
        $args = wp_parse_args($args, $_args);
        return $args;
    }
}