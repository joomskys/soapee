<?php
/* Create Demo Data */
if(!function_exists('soapee_enable_export_mode')){
	add_filter('swa_ie_export_mode', 'soapee_enable_export_mode');
	function soapee_enable_export_mode() {
	    return true;
	}
}