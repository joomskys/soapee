<?php
$default_settings = [
    'ctf7_id' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$html_id = etc_get_element_id($settings);
$icon_size = $widget->get_settings('icon_size', ['size' => '50', 'unit' => 'px']);
if(class_exists('WPCF7') && !empty($ctf7_id)) : ?>
    <div id="<?php echo esc_attr($html_id); ?>" class="cms-cf7 cms-box-shadow-10 bdr-radius-20 overflow-hidden bg-white">
        <div class="cms-cf7-inner p-lg-70 p-15">
            <div class="mb-30 relative"><?php 
                if(!empty($settings['form_title'])){ ?>
                    <div class="cms-form-heading h2 text-40 text-va-20 lh-50"><?php echo esc_html($settings['form_title']); ?></div>
                <?php }
                    if(!empty($settings['form_desc'])){ ?>
                    <div class="cms-form-desc mt-20 pb-15"><?php echo esc_html($settings['form_desc']); ?></div>
                <?php } 
                    if(!empty($settings['form_banner']['id'])) {
                        soapee_elementor_image_render($widget, $settings, [
                            'id'    => 'form_banner',
                            'class' => 'cms-cf7-form-icon'
                        ]);
                    } else {
                        soapee_elementor_icon_render($widget, $settings, [
                            //'id' => 'icon_size',
                            'class' => 'cms-cf7-form-icon text-'.$icon_size['size'],
                            'style' => 'font-size:'.$icon_size['size'].$icon_size['unit']
                        ]);
                    }
                ?>
            </div>
            <?php
                echo do_shortcode('[contact-form-7 id="'.esc_attr( $ctf7_id ).'"]'); 
            ?>
        </div>
    </div>
<?php endif;