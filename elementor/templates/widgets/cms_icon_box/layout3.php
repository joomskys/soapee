<?php
$icon_tag = 'span';
$has_icon = ! empty( $settings['selected_icon'] );

if ( ! empty( $settings['link']['url'] ) ) {
    $widget->add_render_attribute( 'link', 'href', $settings['link']['url'] );
    $icon_tag = 'a';

    if ( $settings['link']['is_external'] ) {
        $widget->add_render_attribute( 'link', 'target', '_blank' );
    }

    if ( $settings['link']['nofollow'] ) {
        $widget->add_render_attribute( 'link', 'rel', 'nofollow' );
    }
}

if ( $has_icon ) {
    $widget->add_render_attribute( 'i', 'class', $settings['selected_icon'] );
    $widget->add_render_attribute( 'i', 'aria-hidden', 'true' );
}

$icon_attributes = $widget->get_render_attribute_string( 'selected_icon' );
$link_attributes = $widget->get_render_attribute_string( 'link' );

$widget->add_render_attribute( 'description_text', 'class', 'cms-icon-box-description' );

$widget->add_inline_editing_attributes( 'title_text', 'none' );
$widget->add_inline_editing_attributes( 'description_text' );

$is_new = \Elementor\Icons_Manager::is_migration_allowed();
?>
<div class="cms-icon-box-wrapper cms-icon-box-layout3 text-<?php echo esc_attr($settings['text-align']);?> bg-gradient-2 h-100 d-flex align-items-center p-tb-50">
    <div class="col-12">
        <div class="cms-icon-box-icon text-100 text-secondary mb-25">
            <?php soapee_elementor_image_render($widget, $settings); ?>
            <?php if ( $has_icon ) : ?><<?php echo implode( ' ', [ $icon_tag, $icon_attributes, $link_attributes ] ); ?>>
                <?php
                    if($is_new):
                        \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] );
                ?>
                <?php else: ?>
                    <i <?php etc_print_html($widget->get_render_attribute_string( 'i' )); ?>></i>
                <?php endif; ?>
            </<?php etc_print_html($icon_tag); ?>>
            <?php endif; ?>
        </div>
        <div class="cms-icon-box-content">
            <div class="h2 cms-icon-box-title text-40 text-vc-50 lh-50 text-white text-uppercase">
                <<?php echo implode( ' ', [ $icon_tag, $link_attributes ] ); ?><?php etc_print_html($widget->get_render_attribute_string( 'title_text' )); ?>><?php echo esc_html($settings['title_text']); ?></<?php etc_print_html($icon_tag); ?>>
            </div>
            <div class="text-white"><?php echo wpautop($settings['description_text']); ?></div>
        </div>
        <?php soapee_elementor_button_render($widget, $settings, ['class' => 'mt-57']); ?>
    </div>
</div>