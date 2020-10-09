<?php
$widget->add_render_attribute( 'inner', [
    'class' => 'cms-ttmn-slider-inner',
] );
?>
<?php if(isset($settings['testimonial']) && !empty($settings['testimonial']) && count($settings['testimonial'])): ?>
    <div class="cms-ttmn-slider">
        <div <?php etc_print_html($widget->get_render_attribute_string( 'inner' )); ?>>
            <div <?php soapee_slick_slider_settings($widget); ?>>
                <?php foreach ($settings['testimonial'] as $value): 
                    $img = etc_get_image_by_size( array(
                        'attach_id'  => $value['image']['id'],
                        'thumb_size' => '61',
                        'class'      => '',
                    ));
                    $thumbnail = $img['thumbnail'];
                    ?>
                        <div class="cms-ttmn-item cms-slick-slide slick-slide" style="padding-left: <?php echo esc_attr($settings['slides_gutter']/2);?>px; padding-right: <?php echo esc_attr($settings['slides_gutter']/2);?>px;">
                            <div class="cms-ttmn-item-inner cms-shadow-3 cms-shadow-hover-4 bg-white bdr-radius-25 cms-transition">
                                <div class="cms-ttmn-item-inner2 bg-white p-tb-65 p-lr-25 p-lr-md-80">
                                    <span class="cms-ttmn-quote-icon cms-ttmn-quote-icon-tl"></span>
                                    <div class="cms-ttmn-desc font-600 text-primary text-center"><?php echo esc_html($value['description']); ?></div>
                                    <span class="cms-ttmn-quote-icon cms-ttmn-quote-icon-br"></span>
                                </div>
                            </div>
                            <div class="row align-items-center gutters-15 pt-30 p-lr-30">
                                <?php soapee_image_by_size([
                                    'id'      => $value['image']['id'],
                                    'size'    => '61',
                                    'class'   => 'circle',
                                    'default' => true,
                                    'before'  => '<div class="cms-ttmn-image col-auto">',
                                    'after'   => '</div>'
                                ]); ?>
                                <div class="cms-ttmn-content col">
                                    <div class="cms-ttmn-title text-uppercase text-17 text-va-20 h5"><?php echo esc_html($value['title']); ?></div>
                                    <div class="cms-ttmn-position"><?php echo esc_html($value['position']); ?></div>
                                    
                                </div>
                            </div>
                        </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
