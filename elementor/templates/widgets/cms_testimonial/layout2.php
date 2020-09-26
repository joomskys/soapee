<?php
$widget->add_render_attribute( 'inner', [
    'class' => 'cms-ttmn-inner cms-slick-slider-wrapper',
] );
?>
<?php if(isset($settings['testimonial']) && !empty($settings['testimonial']) && count($settings['testimonial'])): ?>
    <div class="cms-ttmn-slider cms-ttmn-slider1">
        <div <?php etc_print_html($widget->get_render_attribute_string( 'inner' )); ?>>
            <div <?php soapee_slick_slider_settings($widget); ?>>
                <?php foreach ($settings['testimonial'] as $value): 
                    $img = etc_get_image_by_size( array(
                        'attach_id'  => $value['image']['id'],
                        'thumb_size' => '61',
                        'class'      => '',
                    ));
                    ?>
                    <div class="cms-ttmn-item cms-slick-slide slick-slide">
                        <div class="cms-ttmn-item-inner bg-white bdr-1 bdr-solid bdr-grey6 bdr-radius-15 cms-transition p-15 p-lg-30">
                            <div class="row align-items-center gutters-20">
                                <?php soapee_image_by_size([
                                    'id'      => $value['image']['id'],
                                    'size'    => '64',
                                    'class'   => 'circle',
                                    'default' => true,
                                    'before'  => '<div class="cms-ttmn-image col-auto"><div class="circle bdr-2 bdr-solid bdr-accent">',
                                    'after'   => '</div></div>'
                                ]); ?>
                                <div class="cms-ttmn-content col">
                                    <div class="cms-ttmn-title text-uppercase text-17 text-va-30 h5"><?php echo esc_html($value['title']); ?></div>
                                    <div class="cms-ttmn-position font-italic"><?php echo esc_html($value['position']); ?></div>
                                </div>
                            </div>
                            <div class="cms-ttmn-desc mt-25"><?php echo wpautop($value['description']); ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
