<div class="cms-heading-wrapper cms-heading-layout1 text-lg-<?php echo esc_attr($settings['text-align']);?> text-md-<?php echo esc_attr($settings['text-align_tablet']);?> text-lg-<?php echo esc_attr($settings['text-align_mobile']);?>">
    <?php 
        soapee_elementor_icon_render($widget, $settings, [
            'wrap_class' => 'mb-20',
            'class'      => 'cms-icon-50 text-50'
        ]);
    ?>
    <div class="cms-heading-inner relative"><?php 
        if ( !empty($settings['heading_text']) ) { 
            ?><div class="cms-heading h2 text-40 text-va-20 lh-48"><?php echo soapee_cut_join_string_by_separator($settings['heading_text'], ['class' => '', 'class0' => 'text-accent']); ?></div><?php 
        }
        if(!empty($settings['subheading_text'])){
        ?><div class="cms-heading-sub h3 mt-15"><?php echo soapee_cut_join_string_by_separator($settings['subheading_text'], ['class' => '']); ?></div><?php }
    ?></div>
    <?php if(!empty($settings['description_text'])) { ?>
        <div class="cms-heading-desc text-20 lh-24 mt-15 text-primary"><?php echo wpautop($settings['description_text']); ?></div>
    <?php } 
    soapee_elementor_button_render($widget, $settings, ['class' => 'cms-heading-btn mt-45']);
?></div>