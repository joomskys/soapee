<?php
/**
 * Header Top
*/
if(!function_exists('soapee_header_top_opts')){
	function soapee_header_top_opts($args=[]){
		$args = wp_parse_args($args, [
			'default'       => false,
			'default_value' => '0',
			'subsection'    => false
		]);
		if($args['default']){
			$options = [
				'-1' => esc_html__('Default','soapee'),
                '1'  => esc_html__('Yes','soapee'),
                '0'  => esc_html__('No','soapee'),
			];
		} else {
			$options = [
				'1'  => esc_html__('Yes','soapee'),
                '0'  => esc_html__('No','soapee'),
			];
		}
		$opts = [
			'title'      => esc_html__('Header Top', 'soapee'),
		    'icon'       => 'el el-website',
		    'subsection' => $args['subsection'],
		    'fields'     => array(
		    	array(
		            'id'       => 'show_header_top',
		            'title'    => esc_html__('Header Top', 'soapee'),
		            'subtitle' => esc_html__('Show/Hide header top section.', 'soapee'),
		            'type'     => 'button_set',
                    'options'  => $options,
                    'default'  => $args['default_value'],
		        ),
		        array(
					'id'           => 'header_top_short_text',
					'type'         => 'textarea',
					'title'        => esc_html__('Short Text', 'soapee'),
					'validate'     => 'html_custom',
					'default'      => '',
					'allowed_html' => array(
		                'a' => array(
		                    'href' => array(),
		                    'title' => array(),
		                    'class' => array(),
		                ),
		                'br' => array(),
		                'em' => array(),
		                'b' => array(),
		                'strong' => array(),
		                'span' => array(),
		                'label' => array(),
		                'p' => array(),
		                'div' => array(
		                    'class' => array()
		                ),
		                'span' => array(
		                    'class' => array()
		                ),
		                'h1' => array(
		                    'class' => array()
		                ),
		                'h2' => array(
		                    'class' => array()
		                ),
		                'h3' => array(
		                    'class' => array()
		                ),
		                'h4' => array(
		                    'class' => array()
		                ),
		                'h5' => array(
		                    'class' => array()
		                ),
		                'h6' => array(
		                    'class' => array()
		                ),
		                'ul' => array(
		                    'class' => array()
		                ),
		                'li' => array(),
		            ),
		            'required' => array( 0 => 'show_header_top', 1 => 'equals', 2 => '1' ),
		        ),
		        array(
					'title'  => esc_html__('Quick Contact', 'soapee'),
					'type'   => 'section',
					'id'     => 'header_contact',
					'indent' => true,
					'required' => array( 0 => 'show_header_top', 1 => 'equals', 2 => '1' ),
		        ),
		        //for ($i=0; $i < 10 ; $i++) { 
			        array(
			            'id'      => 'header_top_icon1',
			            'type'    => 'cms_iconpicker',
			            'title'   => esc_html__('Icon 1', 'soapee'),
			            'default' => '',
			            'required' => array( 0 => 'show_header_top', 1 => 'equals', 2 => '1' ),
			        ),
			        array(
			            'id'      => 'header_top_icon1_label',
			            'type'    => 'text',
			            'title'   => esc_html__('Icon 1 Label', 'soapee'),
			            'default' => '',
			            'required' => array( 0 => 'show_header_top', 1 => 'equals', 2 => '1' ),
			        ),
			        array(
			            'id'      => 'header_top_icon1_text',
			            'type'    => 'text',
			            'title'   => esc_html__('Icon 1 Text', 'soapee'),
			            'default' => '',
			            'required' => array( 0 => 'show_header_top', 1 => 'equals', 2 => '1' ),
			        ),
			        array(
			            'id'      => 'header_top_icon2',
			            'type'    => 'cms_iconpicker',
			            'title'   => esc_html__('Icon 2', 'soapee'),
			            'default' => '',
			            'required' => array( 0 => 'show_header_top', 1 => 'equals', 2 => '1' ),
			        ),
			        array(
			            'id'      => 'header_top_icon2_label',
			            'type'    => 'text',
			            'title'   => esc_html__('Icon 2 Label', 'soapee'),
			            'default' => '',
			            'required' => array( 0 => 'show_header_top', 1 => 'equals', 2 => '1' ),
			        ),
			        array(
			            'id'      => 'header_top_icon2_text',
			            'type'    => 'text',
			            'title'   => esc_html__('Icon 2 Text', 'soapee'),
			            'default' => '',
			            'required' => array( 0 => 'show_header_top', 1 => 'equals', 2 => '1' ),
			        ),
			         array(
			            'id'      => 'header_top_icon3',
			            'type'    => 'cms_iconpicker',
			            'title'   => esc_html__('Icon 3', 'soapee'),
			            'default' => '',
			            'required' => array( 0 => 'show_header_top', 1 => 'equals', 2 => '1' ),
			        ),
			        array(
			            'id'      => 'header_top_icon3_label',
			            'type'    => 'text',
			            'title'   => esc_html__('Icon 3 Label', 'soapee'),
			            'default' => '',
			            'required' => array( 0 => 'show_header_top', 1 => 'equals', 2 => '1' ),
			        ),
			        array(
			            'id'      => 'header_top_icon3_text',
			            'type'    => 'text',
			            'title'   => esc_html__('Icon 3 Text', 'soapee'),
			            'default' => '',
			            'required' => array( 0 => 'show_header_top', 1 => 'equals', 2 => '1' ),
			        ),
			    //}
		        array(
					'title'  => esc_html__('Social List', 'soapee'),
					'type'   => 'section',
					'id'     => 'header_top_social',
					'indent' => true,
					'required' => array( 0 => 'show_header_top', 1 => 'equals', 2 => '1' ),
		        ),
		        soapee_social_list_opts(['param_name' => 't_social_list'])
		    )
		];
		return $opts;
	}
}

/**
 * Header 
**/
if(!function_exists('soapee_header_opts')){
	function soapee_header_opts($args=[]){
		$args = wp_parse_args($args,[
			'default'         => false,
			'default_value'   => '1',
			'container_width' => 'wide'
		]);
		$opt_default = [
			'-1' => get_template_directory_uri() . '/assets/images/header-layout/h-df.jpg',
			'0'    => get_template_directory_uri() . '/assets/images/header-layout/h0.jpg',
		];
		$opt_list = [
			'1' => get_template_directory_uri() . '/assets/images/header-layout/h1.jpg'
		];
		$header_container_width_default = [
			'-1'    => esc_html__('Theme Default', 'soapee')
		];
		$header_container_width_list = [
			'1'    => esc_html__('Default', 'soapee'),
			'wide' => esc_html__('Wide', 'soapee'),
			'full' => esc_html__('Full', 'soapee'),
		];
		if($args['default']){
			$opt_lists = $opt_default +  $opt_list;
			$header_container_width_opts = $header_container_width_default + $header_container_width_list;
		} else {
			$opt_lists = $opt_list;
			$header_container_width_opts = $header_container_width_list;
		}

		$opts = array(
		    'title'  => esc_html__('Header', 'soapee'),
		    'icon'   => 'el-icon-website',
		    'fields' => array(
		        array(
		            'id'       => 'header_layout',
		            'type'     => 'image_select',
		            'title'    => esc_html__('Layout', 'soapee'),
		            'subtitle' => esc_html__('Select a layout for header.', 'soapee'),
		            'options'  => $opt_lists,
		            'default'  => $args['default_value']
		        ),
		        array(
		            'id'       => 'header_layout_width',
		            'type'     => 'button_set',
		            'title'    => esc_html__('Header Container Width', 'soapee'),
		            'subtitle' => esc_html__('Choose your header container width', 'soapee'),
		            'options'  => $header_container_width_opts,
		            'default'  => $args['container_width']
		        )
		    )
		);
		return $opts;
	}
}
if(!function_exists('soapee_header_logo_opts')){
	function soapee_header_logo_opts($args = []){
		$args = wp_parse_args($args, [
			'subsection'    => true
		]);
		return array(
		    'title'      => esc_html__('Logo', 'soapee'),
		    'icon'       => 'el el-picture',
		    'subsection' => $args['subsection'],
		    'fields'     => array(
		        array(
		            'id'       => 'logo',
		            'type'     => 'media',
		            'title'    => esc_html__('Main Logo', 'soapee'),
		            'default' => array()
		        ),
		        array(
		            'id'       => 'logo_ontop',
		            'type'     => 'media',
		            'title'    => esc_html__('Ontop Logo', 'soapee'),
		             'default' => array()
		        ),
		        array(
		            'id'       => 'logo_sticky',
		            'type'     => 'media',
		            'title'    => esc_html__('Stick Logo', 'soapee'),
		             'default' => array()
		        ),
		        array(
		            'id'       => 'logo_mobile',
		            'type'     => 'media',
		            'title'    => esc_html__('Tablet & Mobile Logo', 'soapee'),
		             'default' => array()
		        ),
		        array(
		            'id'       => 'logo_size',
		            'type'     => 'dimensions',
		            'title'    => esc_html__('Logo Size', 'soapee'),
		            'subtitle' => esc_html__('Enter demensions for your logo, just in case the logo is too large. Leave blank to use default size from theme', 'soapee'),
		            'unit'     => 'px'
		        ),
		        array(
		            'id'       => 'logo_size_sm',
		            'type'     => 'dimensions',
		            'title'    => esc_html__('Enter demensions for your logo on Tablet & Mobile', 'soapee'),
		            'unit'     => 'px'
		        ),
		    )
		);
	}
}
/**
 * Header OnTop (Transparent)
**/
if(!function_exists('soapee_header_ontop_opts')){
	function soapee_header_ontop_opts($args = []){
		$args = wp_parse_args($args, [
			'default'       => false,
			'default_value' => '1',
			'subsection'    => true
		]);
		if($args['default']){
			$options = [
				'-1' => esc_html__('Default','soapee'),
                '1'  => esc_html__('Yes','soapee'),
                '0'  => esc_html__('No','soapee'),
			];
			$default_value = '-1';
		} else {
			$options = [
				'1'  => esc_html__('Yes','soapee'),
                '0'  => esc_html__('No','soapee'),
			];
			$default_value = '0';
		}
		return array(
		    'title'      => esc_html__('Header OnTop (Transparent)', 'soapee'),
		    'icon'       => 'el-icon-website',
		    'subsection' => $args['subsection'],
		    'fields'     => array(
		        array(
		            'id'       => 'header_ontop',
		            'title'    => esc_html__('OnTop Header', 'soapee'),
		            'subtitle' => esc_html__('Header will be overlay on next content when applicable.', 'soapee'),
		            'type'     => 'button_set',
                    'options'  => $options,
                    'default'  => $default_value,
		        )
		    )
		);
	}
}
/**
 * Header Sticky
**/
if(!function_exists('soapee_header_sticky_opts')){
	function soapee_header_sticky_opts($args = []){
		$args = wp_parse_args($args, [
			'default'       => false,
			'default_value' => '1',
			'subsection'    => true
		]);
		if($args['default']){
			$options = [
				'-1' => esc_html__('Default','soapee'),
                '1'  => esc_html__('Yes','soapee'),
                '0'  => esc_html__('No','soapee'),
			];
			$default_value = '-1';
		} else {
			$options = [
				'1'  => esc_html__('Yes','soapee'),
                '0'  => esc_html__('No','soapee'),
			];
			$default_value = '0';
		}
		return array(
		    'title'      => esc_html__('Header Sticky', 'soapee'),
		    'icon'       => 'el-icon-website',
		    'subsection' => $args['subsection'],
		    'fields'     => array(
		        array(
		            'id'       => 'sticky_on',
		            'title'    => esc_html__('Sticky Header', 'soapee'),
		            'subtitle' => esc_html__('Header will be sticked when applicable.', 'soapee'),
		            'type'     => 'button_set',
                    'options'  => $options,
                    'default'  => $default_value,
		        ),
		        array(
					'id'       => 'header_sticky_bg',
					'type'     => 'background',
					'title'    => esc_html__('Background', 'soapee'),
					'output'   => array('.cms-header.header-sticky .h-fixed'),
					'required' => array( 0 => 'sticky_on', 1 => 'equals', 2 => '1' ),
					'force_output' => true
		        ),
		    )
		);
	}
}

/**
 * Header Navigation 
**/
if(!function_exists('soapee_navigation_opts')){
	function soapee_navigation_opts($args=[]){
		$args = wp_parse_args($args, [
			'default'       => false,
			'default_value' => '1'
		]);
		$opts = array(
		    'title'      => esc_html__('Navigation', 'soapee'),
		    'icon'       => 'el el-lines',
		    'subsection' => true,
		    'fields'     => array(
		        /*array(
					'id'          => 'font_menu',
					'type'        => 'typography',
					'title'       => esc_html__('Custom Google Font', 'soapee'),
					'font-backup' => true,
					'all_styles'  => true,
					'font-style'  => false,
					'font-weight' => true,
					'text-align'  => false,
					'font-size'   => false,
					'line-height' => false,
					'color'       => false,
					'output'      => array('.primary-menu > li > a, body .primary-menu .sub-menu li a'),
					'units'       => ['px'],
		        ),
		        array(
		            'id'       => 'menu_font_size',
		            'type'     => 'text',
		            'title'    => esc_html__('Font Size', 'soapee'),
		            'validate' => 'numeric',
		            'desc'     => 'Enter number',
		            'msg'      => 'Please enter number',
		            'default'  => ''
		        ),
		        array(
		            'id'       => 'menu_text_transform',
		            'type'     => 'select',
		            'title'    => esc_html__('Text Transform', 'soapee'),
		            'options'  => array(
						''           => esc_html__('Uppercase', 'soapee'),
						'capitalize' => esc_html__('Capitalize', 'soapee'),
						'lowercase'  => esc_html__('Lowercase', 'soapee'),
						'initial'    => esc_html__('Initial', 'soapee'),
						'inherit'    => esc_html__('Inherit', 'soapee'),
						'none'       => esc_html__('None', 'soapee'),
		            ),
		            'default'  => ''
		        ),*/
		        array(
					'title'  => esc_html__('Main Menu', 'soapee'),
					'type'   => 'section',
					'id'     => 'main_menu',
					'indent' => true
		        ),
		        array(
		            'id'      => 'main_menu_color',
		            'type'    => 'link_color',
		            'title'   => esc_html__('Color', 'soapee'),
		            'default' => array(
		                'regular' => '',
		                'hover'   => '',
		                'active'   => '',
		            ),
		        ),
		        array(
					'title'  => esc_html__('Ontop Menu', 'soapee'),
					'type'   => 'section',
					'id'     => 'ontop_menu',
					'indent' => true
		        ),
		        array(
		            'id'      => 'ontop_menu_color',
		            'type'    => 'link_color',
		            'title'   => esc_html__('Color', 'soapee'),
		            'default' => array(
		                'regular' => '',
		                'hover'   => '',
		                'active'   => '',
		            ),
		        ),
		        array(
					'title'  => esc_html__('Sticky Menu', 'soapee'),
					'type'   => 'section',
					'id'     => 'sticky_menu',
					'indent' => true
		        ),
		        array(
		            'id'      => 'sticky_menu_color',
		            'type'    => 'link_color',
		            'title'   => esc_html__('Color', 'soapee'),
		            'default' => array(
		                'regular' => '',
		                'hover'   => '',
		                'active'   => '',
		            ),
		        )
		    )
		);
		return $opts;
	}
}
/**
 * Header Attribute
*/
if(!function_exists('soapee_header_atts_opts')){
	function soapee_header_atts_opts($args = []){
		$args = wp_parse_args($args, [
			'default'       => false,
			'default_value' => '1',
			'subsection'    => true
		]);
		if($args['default']){
			$options = [
				'-1' => esc_html__('Default','soapee'),
                '1'  => esc_html__('Yes','soapee'),
                '0'  => esc_html__('No','soapee'),
			];
			$default_value = '-1';

			$h_btn_link_type = [
				'-1' => esc_html__('Default','soapee'),
                'page'  => esc_html__('Page','soapee'),
                'custom'  => esc_html__('Custom','soapee'),
			];
			$h_btn_link_type_value = '-1';

			$h_btn_target = [
				'-1' => esc_html__('Default','soapee'),
                '_self'  => esc_html__('Self', 'soapee'),
		        '_blank'  => esc_html__('Blank', 'soapee')
			];
			$h_btn_target_value = '-1';
		} else {
			$options = [
				'1'  => esc_html__('Yes','soapee'),
                '0'  => esc_html__('No','soapee'),
			];
			$default_value = '0';

			$h_btn_link_type = [
                'page'  => esc_html__('Page', 'soapee'),
		        'custom'  => esc_html__('Custom', 'soapee')
			];
			$h_btn_link_type_value = 'page';

			$h_btn_target = [
                '_self'  => esc_html__('Self', 'soapee'),
		        '_blank'  => esc_html__('Blank', 'soapee')
			];
			$h_btn_target_value = '_self';
		}
		// Return
		return array(
		    'title'      => esc_html__('Header Attribute', 'soapee'),
		    'icon'       => 'el-icon-website',
		    'subsection' => $args['subsection'],
		    'fields'     => array(
		        array(
                    'title'    => esc_html__('Show Search', 'soapee'),
                    'subtitle' => esc_html__('Show/Hide search icon', 'soapee'),
                    'id'       => 'search_on',
                    'type'     => 'button_set',
                    'options'  => $options,
                    'default'  => $default_value,
                ),
                soapee_woo_header_cart_opts([
                	'options' => $options,
                	'default' => $default_value	
                ]),
                array(
					'title'  => esc_html__('Hidden Sidebar', 'soapee'),
					'type'   => 'section',
					'id'     => 'hidden_sidebar',
					'indent' => true
		        ),
		        array(
		            'id'       => 'hidden_sidebar_on',
		            'type'     => 'button_set',
		            'title'    => esc_html__('Show/Hide Hidden Sidebar', 'soapee'),
		            'desc'	   => esc_html__('When it is YES, you need add widget to Hidden Sidebar','soapee'),	
		            'options'  => $options,
                    'default'  => $default_value,
		        ),
                array(
					'title'  => esc_html__('Button Navigation', 'soapee'),
					'type'   => 'section',
					'id'     => 'button_navigation',
					'indent' => true
		        ),
		        array(
		            'id'       => 'h_btn_on',
		            'type'     => 'button_set',
		            'title'    => esc_html__('Show/Hide Button', 'soapee'),
		            'options'  => $options,
                    'default'  => $default_value,
		        ),
		        array(
					'id'           => 'h_btn_text',
					'type'         => 'text',
					'title'        => esc_html__('Button Text', 'soapee'),
					'default'      => '',
					'required'     => array( 0 => 'h_btn_on', 1 => 'equals', 2 => '1' ),
		        ),
		        array(
		            'id'       => 'h_btn_link_type',
		            'type'     => 'button_set',
		            'title'    => esc_html__('Button Link Type', 'soapee'),
		            'options'  => $h_btn_link_type,
					'default'      => $h_btn_link_type_value,
					'required'     => array( 0 => 'h_btn_on', 1 => 'equals', 2 => '1' ),
		        ),
		        array(
		            'id'    => 'h_btn_link',
		            'type'  => 'select',
		            'title' => esc_html__( 'Page Link', 'soapee' ), 
		            'data'  => 'page',
		            'args'  => array(
		                'post_type'      => 'page',
		                'posts_per_page' => -1,
		                'orderby'        => 'title',
		                'order'          => 'ASC',
		            ),
		            'required' => array( 0 => 'h_btn_link_type', 1 => 'equals', 2 => 'page' ),
		        ),
		        array(
		            'id' => 'h_btn_link_custom',
		            'type' => 'text',
		            'title' => esc_html__('Custom Link', 'soapee'),
		            'default' => '',
		            'required' => array( 0 => 'h_btn_link_type', 1 => 'equals', 2 => 'custom' ),
		        ),
		        array(
		            'id'       => 'h_btn_target',
		            'type'     => 'button_set',
		            'title'    => esc_html__('Button Target', 'soapee'),
		            'options'  => $h_btn_target,
		            'default'  => $h_btn_target_value,
		            'required' => array( 0 => 'h_btn_on', 1 => 'equals', 2 => '1' ),
		        )
		    )
		);
	}
}
/**
 * Social list
**/
if(!function_exists('soapee_social_list_opts')){
	function soapee_social_list_opts($args=[]){
		$args = wp_parse_args($args,[
			'param_name' => 'social_list'
		]);
		$opts = array(
            'id'      => $args['param_name'],
            'type'    => 'sorter',
            'desc'    => 'Choose which social networks are displayed and edit where they link to.',
            'options' => array(
                'enabled'  => array(),
                'disabled' => array(
                	'facebook'      => 'Facebook',
                    'twitter'       => 'Twitter',
                    'linkedin'      => 'Linkedin',
                    'instagram'     => 'Instagram',
                	'google-plus'   => 'Google',
                    'tripadvisor'   => 'Tripadvisor',
                    'youtube'       => 'Youtube',
                    'vimeo'         => 'Vimeo',
                    'tumblr'        => 'Tumblr',
                    'pinterest'     => 'Pinterest',
                    'yelp'          => 'Yelp',
                    'skype'         => 'Skype',
                )
            ),
        );
        return $opts;
	}
}
/**
 * Page Title
***/
if(!function_exists('soapee_page_title_opts')){
	function soapee_page_title_opts($args = []){
		$args = wp_parse_args($args, [
			'default'       => false,
			'default_value' => '1',
			'subsection'    => false
		]);
		if($args['default']){
			$options = [
				'-1' => esc_html__('Default','soapee'),
                '1'  => esc_html__('Yes','soapee'),
                '0'  => esc_html__('No','soapee'),
			];
		} else {
			$options = [
				'1'  => esc_html__('Yes','soapee'),
                '0'  => esc_html__('No','soapee'),
			];
		}
		// layout
		$layout_default = [
			'-1' => get_template_directory_uri() . '/assets/images/opt-default.jpg',
		];
		$layout_list = [
			'1' => get_template_directory_uri() . '/assets/images/ptitle-layout/p1.png',
		];
		
		if($args['default']){
			$layout_opts = $layout_default +  $layout_list;
		} else {
			$layout_opts = $layout_list;
		}
		// Show/Hide
		if($args['default']){
			$sh_options = [
				'-1' => esc_html__('Default','soapee'),
                '1'  => esc_html__('Show','soapee'),
                '0'  => esc_html__('Hide','soapee'),
			];
		} else {
			$sh_options = [
				'1'  => esc_html__('Show','soapee'),
                '0'  => esc_html__('Hide','soapee'),
			];
		}
		return array(
			'title'      => esc_html__('Page Title', 'soapee'),
			'icon'       => 'el-icon-map-marker',
			'subsection' => $args['subsection'],
			'fields'     => array(
		        array(
		            'id'           => 'pagetitle',
		            'type'         => 'button_set',
		            'title'        => esc_html__( 'Page Title', 'soapee' ),
		            'subtitle'     => esc_html__('Show/Hide page title?', 'soapee'),
		            'options'      => $sh_options,
		            'default'      => $args['default_value'],
		        ),
		        array(
					'id'           => 'custom_title',
					'type'         => 'textarea',
					'title'        => esc_html__( 'Title', 'soapee' ),
					'subtitle'     => esc_html__( 'Use custom title for this page. The default title will be used on document title.', 'soapee' ),
					'required' 		=> array( 0 => 'pagetitle', 1 => 'equals', 2 => '1' ),
				),
		        array(
		            'id'       => 'ptitle_layout',
		            'type'     => 'image_select',
		            'title'    => esc_html__('Layout', 'soapee'),
		            'subtitle' => esc_html__('Select a layout for page title.', 'soapee'),
		            'options'  => $layout_opts,
		            'default'  => $args['default_value'],
		            'required' => array( 0 => 'pagetitle', 1 => 'equals', 2 => '1' ),
		        ),
		        array(
					'id'                    => 'ptitle_bg',
					'type'                  => 'background',
					'title'                 => esc_html__('Background', 'soapee'),
					'subtitle'              => esc_html__('Page title background.', 'soapee'),
					'output'                => array('body #pagetitle'),
					'required'              => array( 0 => 'pagetitle', 1 => 'equals', 2 => '1' ),
		        ),
		        array(
					'id'           => 'ptitle_overlay_color',
					'type'         => 'color_rgba',
					'title'        => esc_html__('Overlay Color', 'soapee'),
					'output'       => array('background-color' => 'body #pagetitle.bg-overlay:before'),
					'required'     => array( 0 => 'pagetitle', 1 => 'equals', 2 => '1' ),
		        ),
		        array(
					'id'          => 'ptitle_color',
					'type'        => 'color',
					'transpatent' => false,
					'title'       => esc_html__('Title Color', 'soapee'),
					'subtitle'    => esc_html__('Page title color.', 'soapee'),
					'required'    => array( 0 => 'pagetitle', 1 => 'equals', 2 => '1' ),
		        ),
		        array(
		            'id'       => 'ptitle_breadcrumb_on',
		            'type'     => 'button_set',
		            'title'    => esc_html__('Breadcrumb', 'soapee'),
		            'options'  => $sh_options,
		            'default'  => $args['default_value'],
		            'required' => array( 0 => 'pagetitle', 1 => 'equals', 2 => '1' ),
		        ),
		    )
		);
	}
}
/**
 * Footer Options
**/
if(!function_exists('soapee_footer_opts')){
	function soapee_footer_opts($args=[]){
		$args = wp_parse_args($args, [
			'default'       => false,
			'default_value' => '1',
			'subsection'    => false
		]);
		if($args['default']){
			$options = [
				'-1' => esc_html__('Default','soapee'),
                '1'  => esc_html__('Yes','soapee'),
                '0'  => esc_html__('No','soapee'),
			];
			$default_value = '-1';
		} else {
			$options = [
				'1'  => esc_html__('Yes','soapee'),
                '0'  => esc_html__('No','soapee'),
			];
			$default_value = '0';
		}
		// layout
		$layout_default = [
			'-1' => get_template_directory_uri() . '/assets/images/header-layout/h-df.jpg',
		];
		$layout_list = [
			'1' => get_template_directory_uri() . '/assets/images/footer-layout/f1.jpg',
		];
		
		if($args['default']){
			$layout_opts = $layout_default +  $layout_list;
		} else {
			$layout_opts = $layout_list;
		}
		// Colors Mode
		if($args['default']){
			$color_options = [
				'-1' => esc_html__('Default','soapee'),
                'light'  => esc_html__('Light','soapee'),
                'dark'  => esc_html__('Dark','soapee'),
			];
			$default_color_value = '-1';
		} else {
			$color_options = [
				'light'  => esc_html__('Light','soapee'),
                'dark'  => esc_html__('Dark','soapee'),
			];
			$default_color_value = 'dark';
		}
		// Return
		return array(
		    'title'      => esc_html__('Footer', 'soapee'),
		    'icon'       => 'el-icon-website',
		    'subsection' => $args['subsection'],
		    'fields'     => array(
		    	array(
		            'id'       => 'footer_layout',
		            'type'     => 'image_select',
		            'title'    => esc_html__('Layout', 'soapee'),
		            'subtitle' => esc_html__('Select a layout for upper footer area.', 'soapee'),
		            'options'  => $layout_opts,
		            'default'  => $args['default']
		        ),
		        array(
                    'title'    => esc_html__('Footer Fixed', 'soapee'),
                    'subtitle' => esc_html__('Make footer fixed at bottom?', 'soapee'),
                    'id'       => 'footer_fixed',
                    'type'     => 'button_set',
                    'options'  => $options,
                    'default'  => $default_value,
                ),
                array(
                    'title'    => esc_html__('Footer Color', 'soapee'),
                    'subtitle' => esc_html__('Choose footer color mode', 'soapee'),
                    'id'       => 'footer_mode',
                    'type'     => 'button_set',
                    'options'  => $color_options,
                    'default'  => $default_color_value,
                ),
            )
		);
	}
}

// Footer Top Opts
if(!function_exists('soapee_footer_top_opts')){
	function soapee_footer_top_opts($args = []){
		$args = wp_parse_args($args, [
			'default'       => false,
			'default_value' => '1',
			'subsection'    => true
		]);
		return array(
		    'title'      => esc_html__('Footer Top', 'soapee'),
		    'icon'       => 'el el-circle-arrow-right',
		    'subsection' => $args['subsection'],
		    'fields'     => array(
		        array(
		            'id'       => 'footer_top_column',
		            'type'     => 'button_set',
		            'title'    => esc_html__('Columns', 'soapee'),
		            'options'  => array(
		            	'0'  => esc_html__('Disable', 'soapee'),
		                '1'  => esc_html__('1 Column', 'soapee'),
		                '2'  => esc_html__('2 Column', 'soapee'),
		                '3'  => esc_html__('3 Column', 'soapee'),
		                '4'  => esc_html__('4 Column', 'soapee'),
		            ),
		            'default'  => '2',
		        )
		    )
		);
	}
}

if(!function_exists('footer_middle_opts')){
	function soapee_footer_middle_opts($args = []){
		$args = wp_parse_args($args, [
			'default'       => false,
			'default_value' => '1',
			'subsection'    => true
		]);
		return array(
		    'title'      => esc_html__('Footer Middle', 'soapee'),
		    'icon'       => 'el el-circle-arrow-right',
		    'subsection' => $args['subsection'],
		    'fields'     => array(
		        array(
		            'id'       => 'footer_middle_column',
		            'type'     => 'button_set',
		            'title'    => esc_html__('Columns', 'soapee'),
		            'options'  => array(
		                '0'  => esc_html__('Disable', 'soapee'),
		                '1'  => esc_html__('1 Column', 'soapee'),
		                '2'  => esc_html__('2 Column', 'soapee'),
		                '3'  => esc_html__('3 Column', 'soapee'),
		                '4'  => esc_html__('4 Column', 'soapee'),
		            ),
		            'default'  => '4',
		        ),
		        array(
					'id'       => 'footer_middle_img',
					'type'     => 'media',
					'title'    => esc_html__('Add extra image', 'soapee'),
					'required' => [0 => 'footer_middle_column', 1 => 'not', 2 => '0']
		        ),
		        array(
					'id'      => 'footer_middle_img_pos',
					'type'    => 'select',
					'title'   => esc_html__('Extra image position','soapee'),
					'default' => 'bottom-left',
					'options' => [
		        		'top-left' => esc_html__('Top - Left', 'soapee'),
		        		'top-right' => esc_html__('Top - Right', 'soapee'),
		        		'top-center' => esc_html__('Top - Center', 'soapee'),
		        		'bottom-left' => esc_html__('Bottom - Left', 'soapee'),
		        		'bottom-right' => esc_html__('Bottom - Right', 'soapee'),
		        		'bottom-center' => esc_html__('Bottom - Center', 'soapee'),
		        	],
		        	'required' => [0 => 'footer_middle_img', 1 => 'not', 2 => '']
		        ),
		        array(
					'id'      => 'footer_middle_img_animation',
					'type'    => 'select',
					'title'   => esc_html__('Extra image Animation','soapee'),
					'default' => 'fadeInLeft',
					'options' => [
						'fadeInLeft'  => esc_html__('fade In Left', 'soapee'),
						'fadeInRight' => esc_html__('Fade In Right', 'soapee'),
						'fadeInUp'    => esc_html__('Fade In Up', 'soapee'),
						'fadeInDown'  => esc_html__('Fade In Down', 'soapee'),
		        	],
		        	'required' => [0 => 'footer_middle_img', 1 => 'not', 2 => '']
		        )
		    )
		);
	}
}
if(!function_exists('soapee_footer_bottom_opts')){
	function soapee_footer_bottom_opts($args = []){
		return array(
		    'title'      => esc_html__('Footer Bottom', 'soapee'),
		    'icon'       => 'el el-circle-arrow-right',
		    'subsection' => true,
		    'fields'     => array(
		        array(
					'id'           =>'footer_copyright',
					'type'         => 'textarea',
					'title'        => esc_html__('Copyright', 'soapee'),
					'validate'     => 'html_custom',
					'default'      => sprintf( esc_html__('&copy; %s %s by %s. All Rights Reserved.','soapee'), date('Y') , get_bloginfo('name'), '<a href="'.esc_url('https://themeforest.net/user/cmssuperheroes').'" target="_blank">'.esc_html__('CMSSuperHeroes','soapee').'</a>'),
					'allowed_html' => array(
		                'a' => array(
		                    'href' => array(),
		                    'title' => array(),
		                    'class' => array(),
		                    'target' => array()
		                )
		            )
		        ),
		        array(
		            'title'  => esc_html__('Social', 'soapee'),
		            'type'   => 'section',
		            'id'     => 'footer_social',
		            'indent' => true,
		        ),
		        soapee_social_list_opts(['param_name' => 'f_social_list'])
		    )
		);
	}
}
/**
 * Sidebar
*/
if(!function_exists('soapee_sidebar_opts')){
	function soapee_sidebar_opts($args = []){
		$args = wp_parse_args($args, [
			'name'          => 'sidebar_page_pos',
			'default'       => false,
			'default_value' => '0',
			'subsection'    => true
		]);
		if($args['default']){
			$options = [
				'-1'    => esc_html__('Default','soapee'),
				'0'     => esc_html__('No Sidebar','soapee'),
				'left'  => esc_html__('Left','soapee'),
				'right' => esc_html__('Right','soapee'),
				'bottom' => esc_html__('Bottom','soapee'),
			];
			$default_value = '-1';
		} else {
			$options = [
				'0'     => esc_html__('No Sidebar','soapee'),
				'left'  => esc_html__('Left','soapee'),
				'right' => esc_html__('Right','soapee'),
				'bottom' => esc_html__('Bottom','soapee'),
			];
			$default_value = '0';
		}
		// Return
		return array(
		    'title'      => esc_html__('Sidebar Position', 'soapee'),
		    'icon'       => 'el-icon-website',
		    'subsection' => $args['subsection'],
		    'fields'     => array(
		        array(
                    'title'    => esc_html__('Sidebar Position', 'soapee'),
                    'subtitle' => esc_html__('Choose position for sidebar', 'soapee'),
                    'id'       => $args['name'],
                    'type'     => 'button_set',
                    'options'  => $options,
                    'default'  => $default_value,
                )
            )
		);
	}
}

if(!function_exists('soapee_woo_header_cart_opts')){
	function soapee_woo_header_cart_opts($args = []){
		if(!class_exists('WooCommerce')) return array();
		$args = wp_parse_args($args, [
			'options' => '',
			'default' => ''
		]);
		return array(
            'title'    => esc_html__('Show Cart', 'soapee'),
            'subtitle' => esc_html__('Show/Hide cart icon', 'soapee'),
            'id'       => 'cart_on',
            'type'     => 'button_set',
            'options'  => $args['options'],
            'default'  => $args['default'],
        );
	}
}