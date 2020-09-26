<?php
$default_settings = [
    'ctf7_id' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$html_id = etc_get_element_id($settings);
if(class_exists('WPCF7') && !empty($ctf7_id)) : ?>
    <div id="<?php echo esc_attr($html_id); ?>" class="cms-cf7 cms-box-shadow-8 bdr-radius-20 overflow-hidden bg-white">
        <div class="cms-cf7-inner">
            <div class="row">
                <div class="col-lg-6 order-lg-2">
                    <?php soapee_elementor_image_render($widget, $settings, [
                        'id'    => 'form_banner',
                        'class' => 'w-100'
                    ]); ?>
                </div>
                <div class="col-lg-6">
                    <div class="pt-45 pb-50 pl-30 pr-30 pr-lg-0"><?php 
                        if(!empty($settings['form_title'])){ ?>
                            <div class="cms-form-heading h2 text-30 text-va-20"><?php echo esc_html($settings['form_title']); ?></div>
                        <?php }
                            if(!empty($settings['form_desc'])){ ?>
                            <div class="cms-form-desc mt-25 text-primary pb-15"><?php echo esc_html($settings['form_desc']); ?></div>
                        <?php }
                            echo do_shortcode('[contact-form-7 id="'.esc_attr( $ctf7_id ).'"]'); 
                        ?>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
<?php endif;