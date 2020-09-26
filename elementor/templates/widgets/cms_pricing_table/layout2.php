<?php
$widget->add_inline_editing_attributes('pricing_table_title_text');
$widget->add_inline_editing_attributes('pricing_table_description_text', 'advanced');
$widget->add_inline_editing_attributes('pricing_table_button_text');
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
?>
<div class="cms-pricing-wrap bg-white text-center bdr-1 bdr-solid bdr-grey-10 bdr-radius-20 relative overflow-hidden">
    <div class="cms-pricing-inner">
        <?php if($settings['pricing_table_badge_switcher']) : ?>
            <div class="cms-pricing-badge cms-badge cms-badge-conner">
                <div class="corner bg-accent text-white text-13 text-uppercase font-600 p-tb-5 p-lr-10"><span><?php echo esc_html($settings['pricing_table_badge_text']); ?></span></div>
            </div>
        <?php endif; ?>
        <?php if($settings['pricing_table_icon_switcher'] == 'true') : ?>
            <div class="cms-pricing-icon text-80 lh-100 text-accent">
                <?php
                if($is_new):
                    \Elementor\Icons_Manager::render_icon( $settings['pricing_table_icon_selection'], [ 'aria-hidden' => 'true' ] );
                ?>
                <?php else: ?>
                <i class="<?php echo esc_attr( $settings['pricing_table_icon_selection'] ); ?>"></i>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php if($settings['pricing_table_title_switcher'] == 'true') : ?>
            <div class="cms-pricing-title cms-heading h3 text-25 text-va-30 text-uppercase p-tb-17 p-lr-20 bg-primary text-secondary">
                <?php soapee_elementor_image_render2($settings, 'image_before_title',['class'=> 'title-image d-inline']); ?>    
                <span><?php echo esc_html($settings['pricing_table_title_text']);?></span>
                <?php soapee_elementor_image_render2($settings, 'image_after_title',['class'=> 'title-image d-inline']); ?>                    
            </div>
        <?php endif; ?>
        <?php if($settings['pricing_table_price_switcher'] == 'true') : ?>
            <div class="cms-pricing-price bg-accent text-white pt-35 pb-25">
                <span class="cms-price-wrap h3 text-55 text-va-30 lh-30 text-secondary"><?php 
                    echo esc_html($settings['pricing_table_slashed_price_value']); 
                    echo '<span class="cms-price-currency text-20 text-white">'.esc_html($settings['pricing_table_price_currency']).'</span>'; 
                    echo esc_html($settings['pricing_table_price_value']); 
                ?></span>
                <span class="cms-price-package text-17 d-block pt-5"><?php 
                    echo esc_html($settings['pricing_table_price_separator']); 
                    echo esc_html($settings['pricing_table_price_duration']); 
                ?></span>
            </div>
        <?php endif; ?>
        <div class="pb-35 p-lr-30">
            <?php if($settings['pricing_table_list_switcher'] == 'true') : ?>
                <div class="cms-pricing-list">
                    <ul class="cms-pricing-list">
                        <?php
                            foreach( $settings['fancy_text_list_items'] as $item ):
                        ?>
                            <li>
                                <?php
                                if($is_new):
                                    \Elementor\Icons_Manager::render_icon( $item['pricing_list_item_icon'], [ 'aria-hidden' => 'true' ] );
                                ?>
                                <?php else: ?>
                                <i class="<?php echo esc_attr( $item['pricing_list_item_icon'] ); ?>"></i>
                                <?php endif; ?>
                                <span class="pricing-list-span"><?php echo esc_html($item['pricing_list_item_text']); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <?php if($settings['pricing_table_description_switcher'] == 'true') : ?>
                <div class="cms-pricing-description pb-30">
                    <?php echo esc_html($settings['pricing_table_description_text']); ?>
                </div>
            <?php endif;
                soapee_elementor_button_render($widget, $settings, []); 
            ?>
        </div>
    </div>
</div>