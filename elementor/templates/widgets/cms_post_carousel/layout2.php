<?php
    $html_id   = etc_get_element_id($settings);
    $tax       = array();
    $source    = $widget->get_setting('source_'.$settings['post_type']);
    $orderby   = $widget->get_setting('orderby');
    $order     = $widget->get_setting('order');
    $limit     = $widget->get_setting('limit');

    extract(etc_get_posts_of_grid($settings['post_type'], [
        'source'   => $source,
        'orderby'  => $orderby,
        'order'    => $order,
        'limit'    => $limit,
    ]));
?>
<div <?php soapee_slick_slider_settings($widget); ?>>
    <?php
        $settings['tax'] = $tax;
        soapee_elementor_get_posts($posts, $widget, $settings, [
            'item_class' => 'cms-slick-slide slick-slide'
        ]); 
    ?>
</div>