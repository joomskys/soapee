<?php
$widget->add_render_attribute( 'inner', [
    'class' => 'cms-ttmn-slider-inner col-md-10 col-lg-8',
] );
?>
<?php if(isset($settings['testimonial']) && !empty($settings['testimonial']) && count($settings['testimonial'])): ?>
    <div class="cms-ttmn-slider row no-gutters align-items-end justify-content-center">
        <?php soapee_elementor_image_render2( $settings,'image_left', ['class'=>'cms-ttmn-banner cms-ttmn-banner-left col-auto rtl-flip pb-65']); ?>
        <div <?php etc_print_html($widget->get_render_attribute_string( 'inner' )); ?>>
            <div class="item-title bg-accent bdr-radius-25 text-white h3 text-25 text-vc-20 text-center empty-none d-inline-block p-25 bdr-radius-40 overflow-visible d-center"><?php etc_print_html($settings['item_title']); ?></div>
            <div <?php soapee_slick_slider_settings($widget); ?>>
                <?php foreach ($settings['testimonial'] as $value): 
                    $img = etc_get_image_by_size( array(
                        'attach_id'  => $value['image']['id'],
                        'thumb_size' => '61',
                        'class'      => '',
                    ));
                    $thumbnail = $img['thumbnail'];
                    ?>
                        <div class="cms-ttmn-item cms-slick-slide slick-slide">
                            <div class="cms-ttmn-item-inner cms-shadow-3 cms-shadow-hover-4 bg-white pt-95 pb-50 p-lr-25 p-lr-md-110 bdr-radius-25 text-center cms-transition">
                                <div class="cms-ttmn-desc text-20 lh-28 font-400i text-primary"><?php echo esc_html($value['description']); ?></div>
                                <?php soapee_image_by_size([
                                    'id'      => $value['image']['id'],
                                    'size'    => '60',
                                    'class'   => 'circle mt-20',
                                    'default' => false
                                ]); ?>
                                <div class="cms-ttmn-title text-uppercase text-15 text-va-100 h5 text-accent pt-25"><?php echo esc_html($value['title']); ?></div>
                                <div class="cms-ttmn-position pt-2"><?php echo esc_html($value['position']); ?></div>
                                <div class="cms-ttmn-star pt-8"><div class="cms-star-rating"><span class="cms-star-rated" style="width:<?php echo esc_attr($value['star']) . '%';?>"></span></div></div>
                            </div>
                        </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php soapee_elementor_image_render2( $settings,'image_right', ['class'=>'cms-ttmn-banner cms-ttmn-banner-right col-auto rtl-flip pb-65']); ?>
    </div>
<?php endif; ?>
