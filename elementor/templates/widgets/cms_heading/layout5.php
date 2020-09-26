<div class="cms-heading-wrapper cms-heading-layout1 text-<?php echo esc_attr($settings['text-align']);?>">
    <div class="cms-heading-inner relative"><?php 
        if ( !empty($settings['heading_text']) ) { 
            ?><div class="cms-heading h3 text-25 text-va-30 lh-30"><?php echo soapee_cut_join_string_by_separator($settings['heading_text'], ['class' => '', 'class0' => 'text-accent']); ?></div><?php 
        }
        if(!empty($settings['subheading_text'])){
        ?><div class="cms-heading-sub h4 mt-15"><?php echo soapee_cut_join_string_by_separator($settings['subheading_text']); ?></div><?php }
    ?></div>
    <?php if(!empty($settings['description_text'])) { ?>
        <div class="cms-heading-desc text-17 lh-26 pt-15"><?php echo wpautop($settings['description_text']); ?></div>
    <?php } 
    soapee_elementor_button_render($widget, $settings, ['class' => 'cms-heading-btn mt-45']);
?></div>