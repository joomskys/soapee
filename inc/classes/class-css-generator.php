<?php
if ( ! class_exists( 'Redux_Instances' ) ) {
	return;
}

class CSS_Generator {
	/**
     * scssc class instance
     *
     * @access protected
     * @var scssc
     */
    protected $scssc = null;

    /**
     * ReduxFramework class instance
     *
     * @access protected
     * @var ReduxFramework
     */
    protected $redux = null;

    /**
     * Debug mode is turn on or not
     *
     * @access protected
     * @var boolean
     */
    protected $dev_mode = true;

    /**
     * opt_name of ReduxFramework
     *
     * @access protected
     * @var string
     */
    protected $opt_name = '';

	/**
	 * Constructor
	 */
	function __construct() {
		$this->opt_name = soapee_get_opt_name();

		if ( empty( $this->opt_name ) ) {
			return;
		}
		$this->dev_mode = soapee_get_opt( 'dev_mode', '0' ) === '1' ? true : false;
		add_filter( 'cms_scssc_lib', function(){ return 'new';} );
		add_filter( 'cms_scssc_on', '__return_true' );
		add_action( 'init', array( $this, 'init' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ), 20 );
	}

	/**
	 * init hook - 10
	 */
	function init() {
		if ( ! class_exists( '\Leafo\ScssPhp\Compiler' ) )
        {
            return;
        }

		$this->redux = Redux_Instances::get_instance( $this->opt_name );

		if ( empty( $this->redux ) || ! $this->redux instanceof ReduxFramework ) {
			return;
		}
		add_action( 'wp', array( $this, 'generate_with_dev_mode' ) );
		add_action( "redux/options/{$this->opt_name}/saved", function () {
			$this->generate_file();
		} );
	}

	function generate_with_dev_mode() {
		if ( $this->dev_mode === true ) {
			$this->generate_file(); 
			$this->generate_min_file();
		}
	}

	/**
	 * Generate options and css files
	 */
	function generate_file() {
		if(!class_exists('\Leafo\ScssPhp\Compiler')) return;

		$scss_dir = get_template_directory() . '/assets/scss/';
		$css_dir  = get_template_directory() . '/assets/css/';

		//$this->scssc = new scssc();
		$this->scssc = new \Leafo\ScssPhp\Compiler();
		$this->scssc->setImportPaths( $scss_dir );

		$_options = $scss_dir . 'theme-options.scss';

		$this->redux->filesystem->execute( 'put_contents', $_options, array(
			'content' => preg_replace( "/(?<=[^\r]|^)\n/", "\r\n", $this->options_output() )
		) );
		$css_file = $css_dir . 'theme.css';

		/**
         * build source map
         * this used for load scss file when dev_mode is on
         * @source: https://github.com/leafo/scssphp/wiki/Source-Maps
        */
        $this->scssc->setSourceMap(\Leafo\ScssPhp\Compiler::SOURCE_MAP_FILE);
        if(is_child_theme()){
            $this->scssc->setSourceMapOptions(array(
                'sourceMapWriteTo'  => $child_css_file . ".map",
                'sourceMapURL'      => "child-theme.css.map",
                'sourceMapFilename' => $child_css_file,
                'sourceMapBasepath' => $child_scss_dir,
                'sourceRoot'        => $child_scss_dir,
            ));
        } else {
            $this->scssc->setSourceMapOptions(array(
                'sourceMapWriteTo'  => $css_file . ".map",
                'sourceMapURL'      => "theme.css.map",
                'sourceMapFilename' => $css_file,
                'sourceMapBasepath' => $scss_dir,
                'sourceRoot'        => $scss_dir,
            ));
        }
        // end build source map

		//$this->scssc->setFormatter( 'scss_formatter' );
		$this->scssc->setFormatter('Leafo\ScssPhp\Formatter\Crunched');

		$this->redux->filesystem->execute( 'put_contents', $css_file, array(
			'content' => preg_replace( "/(?<=[^\r]|^)\n/", "\r\n", $this->scssc->compile( '@import "theme.scss"' ) )
		) );
	}
	/**
     * Generate options and css files
     */
    function generate_min_file()
    {   
        // Theme
        $scss_dir = get_template_directory() . '/assets/scss/';
        $css_dir  = get_template_directory() . '/assets/css/';
        $css_file = $css_dir . 'theme.min.css';
        // Child Theme
        $child_scss_dir = get_stylesheet_directory() . '/assets/scss/';
        $child_css_dir  = get_stylesheet_directory() . '/assets/css/';
        $child_css_file = $child_css_dir . 'child-theme.min.css';

        $this->scssc = new \Leafo\ScssPhp\Compiler();
        $this->scssc->setImportPaths( $scss_dir );

        $_options = $scss_dir . 'theme-options.scss';

        $this->redux->filesystem->execute( 'put_contents', $_options, array(
            'content' => $this->options_output()
        ) );
        $this->scssc->setFormatter( 'Leafo\ScssPhp\Formatter\Crunched' );
        
        // Theme
        $this->redux->filesystem->execute( 'put_contents', $css_file, array(
            'content' => $this->scssc->compile( '@'.'import "theme.scss"' )
        ) );
        // Child Theme
        if(is_child_theme()){
            $this->redux->filesystem->execute( 'put_contents', $child_css_file, array(
                'content' => $this->scssc->compile( '@'.'import "child-theme.scss"' )
            ) );
        }
    }
	/**
	 * Output options to _variables.scss
	 *
	 * @access protected
	 * @return string
	 */
	protected function print_scss_opt($variable, $nhay = false){
		if(is_array($variable)){
			$x = [];
			foreach ($variable as $key => $value) {
                if($nhay) $value = '\''.$value.'\'';
                if(!is_array($value)){
				    $x[] =  '\''.$key.'\':'.$value;
                    //$x[] =  $key.':'.$value;
                }
			}
			return implode(',', $x);
		} else {
			return $variable;
		}
	}
    function print_single_scss_opt() {
        ob_start();
        // CSS Variable
        $theme_colors = soapee_configs('theme_colors');
        $link_color   = soapee_get_opts('link_color', soapee_configs('link_color'));
        $body         = soapee_configs('body');
        $heading      = soapee_configs('heading');
        $meta         = soapee_configs('meta');
        $button       = soapee_configs('button');
        $border       = soapee_configs('border');
        $shadow       = soapee_configs('shadow');
        $gradient     = soapee_configs('gradient');
        $comment      = soapee_configs('comment');
            foreach ($theme_colors as $key => $value) {
                printf('$%1$s_color: %2$s;', $key, $value);
            }
            foreach ($link_color as $key => $value) {
                printf('$link_%1$s_color: %2$s;', $key, $value);
            }
            foreach ($body as $key => $value) {
                printf('$body-%1$s: %2$s;', $key, 'var(--body-'.$key.')');
            }
            foreach ($heading as $key => $value) {
                if(!is_array($value)) {
                    printf('$heading-%1$s: %2$s;', $key, $value);
                } else {
                    foreach ($value as $_key => $_value) {
                        printf('$heading-%3$s-%1$s: %2$s;', $_key, $_value, str_replace('_', '-', $key));
                    }
                }
            }
            foreach ($meta as $key => $value) {
                printf('$meta-%1$s: %2$s;', $key, $value);
            }
            foreach ($button as $key => $value) {
                printf('$button-%1$s: %2$s;', $key, $value);
            }
            foreach ($border as $key => $value) {
                printf('$border-%1$s: %2$s;', $key, $value);
            }
            foreach ($shadow as $key => $value) {
                printf('$shadow-%1$s: %2$s;', $key, $value);
            }
            foreach ($gradient as $key => $value) {
                printf('$gradient-%1$s: %2$s;', $key, $value);
            }
            foreach ($comment as $key => $value) {
                printf('$comment-%1$s: %2$s;', $key, $value);
            }	
        return ob_get_clean();
    }
	protected function options_output() {
		ob_start();
		// Theme colors 
		printf('$theme_colors:(%s);',$this->print_scss_opt(soapee_configs('theme_colors')));
        // Link colors
        printf('$link_color:(%s);',$this->print_scss_opt(soapee_configs('link_color')));
		// Theme spacings
        printf('$theme_spacings:(%s);',$this->print_scss_opt(soapee_configs('theme_spacings')));
        // Gradient
        printf('$theme_gradient:(%s);',$this->print_scss_opt(soapee_configs('gradient'), true));
        // Theme screen size
        printf('$theme_screen_sizes:(%s);',$this->print_scss_opt(soapee_configs('theme_size_screen')));
        // body typo
        //printf('$theme_body:(%s);',$this->print_scss_opt(soapee_configs('body')));
        // heading typo
        //printf('$theme_heading:(%s);',$this->print_scss_opt(soapee_configs('heading')));
        // meta typo
        //printf('$theme_meta:(%s);',$this->print_scss_opt(soapee_configs('meta')));
        // Shadow
        printf('$theme_shadow:(%s);',$this->print_scss_opt(soapee_configs('shadow')));
        // Border
        printf('$theme_border:(%s);',$this->print_scss_opt(soapee_configs('border')));
        // Thumbnails size
        printf('$theme_thumbnail_size:(%s);',$this->print_scss_opt(soapee_configs('thumbnail')));
        printf('%s', $this->print_single_scss_opt());
		return ob_get_clean();
	}

	/**
	 * Hooked wp_enqueue_scripts - 20
	 * Make sure that the handle is enqueued from earlier wp_enqueue_scripts hook.
	 */
	function enqueue() {
		$css = $this->inline_css();
		if ( ! empty( $css ) ) {
			wp_add_inline_style( 'soapee', $this->dev_mode ? $css : soapee_css_minifier( $css ) );
		}
	}

	/**
	 * Generate inline css based on theme options
	 */
	protected function inline_css() {
		ob_start();
		
		/* Custom Css */
		$custom_css = soapee_get_opt( 'site_css' );
		if ( ! empty( $custom_css ) ) {
			echo esc_attr( $custom_css );
		}

		return ob_get_clean();
	}
}

new CSS_Generator();