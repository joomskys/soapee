<?php
// Add custom field to section
if(!function_exists('soapee_custom_section_params')){
    add_filter('etc-custom-section/custom-params', 'soapee_custom_section_params');
    function soapee_custom_section_params(){
        return array(
            'sections' => array(
                array(
                    'name'     => 'cms_custom_layout',
                    'label'    => esc_html__( 'Custom Settings', 'soapee' ),
                    //'tab'      => Elementor_Theme_Core::ETC_TAB_NAME,
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        // make section full content with a space on start / end
                        array(
                            'name'         => 'full_content_with_space',
                            'label'        => esc_html__( 'Full Content with space from?', 'soapee' ),
                            'type'         => \Elementor\Controls_Manager::SELECT,
                            'prefix_class' => 'cms-full-content-with-space-',
                            'options'      => array(
                                'none'    => esc_html__( 'None', 'soapee' ),
                                'start'   => esc_html__( 'Start', 'soapee' ),
                                'end'     => esc_html__( 'End', 'soapee' ),
                            ),
                            'default'      => 'none'
                        ),
                        // this field hasn't config prefix_class
                        // its value will be handled at soapee_custom_section_classes function
                        // screen shot - http://prntscr.com/tjco9g
                        array(
                            'name'    => 'column_hori_align',
                            'label'   => esc_html__( 'Horizontal Align', 'soapee' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'options' => array(
                                ''        => esc_html__( 'Default', 'soapee' ),
                                'start'   => esc_html__( 'Start', 'soapee' ),
                                'center'  => esc_html__( 'Center', 'soapee' ),
                                'end'     => esc_html__( 'End', 'soapee' ),
                                'around'  => esc_html__( 'Space Around', 'soapee' ),
                                'between' => esc_html__( 'Space Between', 'soapee' ),
                            ),
                            'prefix_class' => 'cms-justify-content-',
                            'default'      => 'center',
                        ),
                        // this field has config prefix_class
                        // it mean that the class will be added directly to wrapper
                        // screen shot - http://prntscr.com/tjcnjg
                        array(
                            'name'    => 'add_shake_image',
                            'label'   => esc_html__( 'Add Shake Image', 'soapee' ),
                            'type'    => \Elementor\Controls_Manager::SWITCHER,
                            'prefix_class' => 'cms-had-shake-img-',
                            'default'      => 'false',
                        ),
                    )
                ),
            ),
        );
    }
}

// handle custom class will be added to section
if(!function_exists('soapee_custom_section_classes')){
    //add_filter('etc-custom-section-classes', 'soapee_custom_section_classes', 10, 2);
    function soapee_custom_section_classes($classes, $settings){
        if(isset($settings['column_hori_align']) && !empty($settings['column_hori_align'])){
            $classes[] = 'cms-justify-content-' . $settings['column_hori_align'];
        }
        return $classes;
    }
}

// Add custom field to column
if(!function_exists('soapee_custom_column_params')){
    //add_filter('etc-custom-column/custom-params', 'soapee_custom_column_params');
    function soapee_custom_column_params(){
        return array(
            'sections' => array(
                array(
                    'name' => 'custom_section',
                    'label' => esc_html__( 'Custom Settings', 'soapee' ),
                    'tab' => Elementor_Theme_Core::ETC_TAB_NAME,
                    'controls' => array(
                        // this field hasn't config prefix_class
                        // its value will be handled at soapee_custom_column_classes function
                        // screen shot - http://prntscr.com/tjco9g
                        array(
                            'name' => 'custom_style',
                            'label' => esc_html__( 'Style Settings', 'soapee' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => array(
                                '' => esc_html__( 'Default', 'soapee' ),
                                '1' => esc_html__( 'Style 1', 'soapee' ),
                                '2' => esc_html__( 'Style 2', 'soapee' ),
                                '3' => esc_html__( 'Style 3', 'soapee' ),
                            ),
                            'default' => '',
                        ),
                        // this field has config prefix_class
                        // it mean that the class will be added directly to wrapper
                        // screen shot - http://prntscr.com/tjcnjg
                        array(
                            'name' => 'custom_position',
                            'label' => esc_html__( 'Position Settings', 'soapee' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => array(
                                '' => esc_html__( 'Default', 'soapee' ),
                                '1' => esc_html__( 'Postion 1', 'soapee' ),
                                '2' => esc_html__( 'Postion 2', 'soapee' ),
                                '3' => esc_html__( 'Postion 3', 'soapee' ),
                            ),
                            'prefix_class' => 'soapee-',
                            'default' => '',
                        ),
                    ),
                ),
            ),
        );
    }
}

// handle custom class will be added to column
if(!function_exists('soapee_custom_column_classes')){
    //add_filter('etc-custom-column-classes', 'soapee_custom_column_classes', 10, 2);
    function soapee_custom_column_classes($classes, $settings){
        if(isset($settings['custom_style']) && !empty($settings['custom_style'])){
            $classes[] = 'style-' . $settings['custom_style'];
        }
        return $classes;
    }
}

// add html to before row
if(!function_exists('soapee_before_elementor_row_shake_image')){
    add_action('soapee_before_elementor_row','soapee_before_elementor_row_shake_image');
    function soapee_before_elementor_row_shake_image($settings){
        if($settings['add_shake_image'] === 'false') return;
    ?>
    <div class="pos-bl">
        <div class="cms-shake-image-wrap">
            <div class="cms-shake-image shake_image">
                <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/truck/truck-2.png');?>" alt="soapee" >
                    <span class="tyre-position"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/truck/rotate-tyer.png');?>" alt="soapee" class="spin-tyres"></span>
                <img class="blink-image" src="<?php echo esc_url(get_template_directory_uri().'/assets/images/truck/light-blink.png');?>" alt="soapee">
            </div>
        </div>
    </div>
    <?php
    }
}