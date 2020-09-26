<?php
$default_settings = [
    'ctf7_id' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$html_id = etc_get_element_id($settings);
if(class_exists('WPCF7') && !empty($ctf7_id)) : ?>
    <div id="<?php echo esc_attr($html_id); ?>" class="cms-cf7">
        <div class="cms-cf7-inner">
            <div class="cms-widget">
                <div class="cms-widget-inner bdr-1 bdr-solid bdr-grey6 bdr-radius-15"><?php 
                    if(!empty($settings['form_title'])){ ?>
                        <h3 class="cms-widget-title bdr-b-1 bdr-b-solid bdr-grey6 bg-grey4 p-tb-18 p-lr-20"><?php echo esc_html($settings['form_title']); ?></h3>
                    <?php } ?>
                    <div class="cms-widget-content"><?php 
                        if(!empty($settings['form_desc'])){ ?>
                        <div class="cms-form-desc mt-25 text-primary pb-15"><?php echo esc_html($settings['form_desc']); ?></div>
                    <?php }
                        echo do_shortcode('[contact-form-7 id="'.esc_attr( $ctf7_id ).'"]'); 
                    ?></div>
                </div>
            </div>
        </div>
    </div>
<?php endif;