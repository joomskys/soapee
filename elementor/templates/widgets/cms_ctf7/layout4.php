<?php
$default_settings = [
    'ctf7_id' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$html_id = etc_get_element_id($settings);
$icon_size = $widget->get_settings('icon_size', ['size' => '48', 'unit' => 'px']);
if(class_exists('WPCF7') && !empty($ctf7_id)) : ?>
    <div id="<?php echo esc_attr($html_id); ?>" class="cms-cf7">
        <div class="cms-cf7-inner">
            <div class="row gutters-30">
                <div class="col-lg-7">
                    <div class="row gutters-20 align-items-center"><?php 
                        soapee_elementor_icon_render($widget, $settings, [
                            'wrap_class' => 'col-auto cms-cf7-form-icon text-primary text-'.$icon_size['size'],
                            'style' => 'font-size:'.$icon_size['size'].$icon_size['unit']
                        ]); ?>
                        <div class="col"><?php
                            if(!empty($settings['form_title'])){ ?>
                                <div class="cms-form-heading h4 text-20 text-va-30 text-uppercase text-primary font-700"><?php echo esc_html($settings['form_title']); ?></div>
                            <?php }
                                if(!empty($settings['form_desc'])) { ?>
                                <div class="cms-form-desc text-17 text-primary"><?php echo soapee_cut_join_string_by_separator($settings['form_desc'], ['class' => '', 'class1' => 'text-underline-2 text-uppercase font-500']); ?></div>
                            <?php } 
                        ?></div>
                    </div>
                </div>
                <div class="col-lg-5"><?php
                    echo do_shortcode('[contact-form-7 id="'.esc_attr( $ctf7_id ).'"]'); 
                ?></div>
            </div>
        </div>
    </div>
<?php endif;