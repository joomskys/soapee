<?php
// Remove support Mega Menu
if(!function_exists('soapee_enable_megamenu')){
	add_filter( 'cms_enable_megamenu', 'soapee_enable_megamenu' );
	function soapee_enable_megamenu() {
		return false;
	}
}
if(!function_exists('soapee_enable_onepage')){
	add_filter( 'cms_enable_onepage', 'soapee_enable_onepage' );
	function soapee_enable_onepage() {
		return false;
	}
}