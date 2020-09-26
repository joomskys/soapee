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
$widget->add_render_attribute( 'row', [
    'class' => 'row justify-content-center',
    'style' => 'margin:'.($settings['gap']/-2).'px;'
] );
?>
<div id="<?php echo esc_attr($html_id) ?>" class="cms-grid cms-post-grid">
    <div <?php etc_print_html($widget->get_render_attribute_string( 'row' )); ?>>
        <?php
            $settings['tax'] = $tax;
            soapee_elementor_get_post_grid($posts, $widget, $settings);
        ?>
    </div>
</div>