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
<div id="<?php echo esc_attr($html_id) ?>"  class="widget_cms_recent_posts">
    <div class="cms-posts-list layout-4">
        <div class="h3 text-20 text-va-20 lh-24 mb-20"><?php echo esc_html($settings['e_title']); ?></div>
        <?php foreach ($posts as $post) { ?>
            <div class="cms-post-item">
                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo get_the_title($post->ID); ?></a>
            </div>
        <?php } ?>
    </div>
</div>