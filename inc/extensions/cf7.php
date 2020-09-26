<?php
/**
 * removing default submit tag
 */
remove_action('wpcf7_init', 'wpcf7_add_form_tag_submit');
/**
 * adding action with function which handles our button markup
 */
add_action('wpcf7_init', 'soapee_cf7_submit_button');
/**
 * adding out submit button tag
 */
if (!function_exists('soapee_cf7_submit_button')) {
	function soapee_cf7_submit_button() {
		wpcf7_add_form_tag('submit', 'soapee_cf7_submit_button_handler');
	}
}
/**
 * out button markup inside handler
 */
if (!function_exists('soapee_cf7_submit_button_handler')) {
	function soapee_cf7_submit_button_handler($tag) {
		$tag              = new WPCF7_FormTag($tag);
		$class            = wpcf7_form_controls_class($tag->type);
		$atts             = array();
		$atts['class']    = $tag->get_class_option($class);
		$atts['id']       = $tag->get_id_option();
		$atts['tabindex'] = $tag->get_option('tabindex', 'int', true);
		$value            = isset($tag->values[0]) ? $tag->values[0] : '';
		if (empty($value)) {
			$value = esc_html__('Send', 'soapee');
		}
		$atts['type'] = 'submit';
		$atts['icon'] = soaape_cf7_get_icon($tag->options);
		$icon = '';
		if(isset($atts['icon']) && $atts['icon'] != '') $icon = '<span class="wpcf7-submit-icon '.$atts['icon'].'"></span>';
		$atts = wpcf7_format_atts($atts);		
		$html = sprintf('<button %1$s><span class="cms-btn-text">%2$s</span>%3$s</button>', $atts, $value, $icon);
		return $html;
	}
}

if(!function_exists('soaape_cf7_get_icon')){
	function soaape_cf7_get_icon($data, $default=''){
		if ( is_string( $default ) ) {
			$default = explode( ' ', $default );
		}
		$options = array_merge(
			(array) $default,
			(array) soapee_cf7_get_atts( $data, 'icon', 'icon' ) );

		$options = array_filter( array_unique( $options ) );

		return implode( ' ', $options );
	}
}
function soapee_cf7_get_atts( $data, $opt, $pattern = '', $single = false ) {
	$preset_patterns = array(
		'date'       => '([0-9]{4}-[0-9]{2}-[0-9]{2}|today(.*))',
		'int'        => '[0-9]+',
		'signed_int' => '-?[0-9]+',
		'class'      => '[-0-9a-zA-Z_]+',
		'icon'       => '[-0-9a-zA-Z_]+',
		'id'         => '[-0-9a-zA-Z_]+',
	);

	if ( isset( $preset_patterns[$pattern] ) ) {
		$pattern = $preset_patterns[$pattern];
	}

	if ( '' == $pattern ) {
		$pattern = '.+';
	}

	$pattern = sprintf( '/^%s:%s$/i', preg_quote( $opt, '/' ), $pattern );

	if ( $single ) {
		$matches = soapee_cf7_get_first_match_option( $data, $pattern );

		if ( ! $matches ) {
			return false;
		}

		return substr( $matches[0], strlen( $opt ) + 1 );
	} else {
		$matches_a = soapee_cf7_get_all_match_options( $data, $pattern );

		if ( ! $matches_a ) {
			return false;
		}

		$results = array();

		foreach ( $matches_a as $matches ) {
			$results[] = substr( $matches[0], strlen( $opt ) + 1 );
		}

		return $results;
	}
}
function soapee_cf7_get_first_match_option( $options, $pattern ) {
	foreach( (array) $options as $option ) {
		if ( preg_match( $pattern, $option, $matches ) ) {
			return $matches;
		}
	}

	return false;
}
function soapee_cf7_get_all_match_options( $options, $pattern ) {
		$result = array();

		foreach( (array) $options as $option ) {
			if ( preg_match( $pattern, $option, $matches ) ) {
				$result[] = $matches;
			}
		}

		return $result;
	}