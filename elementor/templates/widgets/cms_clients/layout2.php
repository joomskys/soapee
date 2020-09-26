<?php 
// client image size
$client_image_size            = $widget->get_setting('client_image_size_size','full');
$thumbnail_custom_dimension = $widget->get_setting('client_image_size_custom_dimension');
if($client_image_size != 'custom'){
    $img_size = $client_image_size;
} elseif (!empty($thumbnail_custom_dimension['width']) && !empty($thumbnail_custom_dimension['height'])){
    $img_size = $thumbnail_custom_dimension['width'] . 'x' . $thumbnail_custom_dimension['height'];
} else {
    $img_size = 'full';
}
if(isset($settings['clients']) && !empty($settings['clients']) && count($settings['clients'])): ?>
    <div class="cms-clients">
        <div <?php soapee_slick_slider_settings($widget, 'cms-client-slider'); ?>>
            <?php foreach ($settings['clients'] as $key => $client): 
                $img = etc_get_image_by_size( array(
                    'attach_id'  => $client['client_image']['id'],
                    'thumb_size' => $img_size,
                    'class'      => 'w-100',
                ));
                if(!empty($client['client_image']['id'])){
                    $thumbnail = $img['thumbnail'];
                } else {
                    $thumbnail = soapee_default_image_thumbnail([
                        'size' => 'full',
                        'img_class' => 'w-100'
                    ]);
                }
                // get link
                $links = $settings['clients'][$key]['client_link'];
            ?>
            <div class="cms-slick-slide slick-slide">
                <div class="cms-client-item bdr-radius-10 bg-white cms-box-shadow-7 cms-transition">
                    <div class="cms-client-image text-center">
                        <a <?php soapee_elementor_link_render($links, ['class' => 'd-block']); ?>><?php echo wp_kses_post($thumbnail); ?></a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif;