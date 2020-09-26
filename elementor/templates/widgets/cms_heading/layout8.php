<div class="cms-heading-wrapper text-lg-<?php echo esc_attr($settings['text-align']);?> text-md-<?php echo esc_attr($settings['text-align_tablet']);?> text-lg-<?php echo esc_attr($settings['text-align_mobile']);?>">
    <div class="cms-heading-inner relative">
        <?php if ( !empty($settings['heading_text']) ) { ?>
            <div class="cms-heading h3 text-20 text-va-20 lh-24 mb-25">
                <?php echo soapee_cut_join_string_by_separator($settings['heading_text'], ['class' => '', 'class0' => '']); ?>
            </div>
        <?php }
        if(!empty($settings['subheading_text'])){ ?>
            <div class="cms-heading-sub h3 text-30 text-secondary row gutters-15">
                <?php 
                    soapee_elementor_icon_render($widget, $settings, [
                        'wrap_class' => 'col-auto',
                        'class'      => ''
                    ]);
                ?>
                <div class="col"><?php 
                    echo soapee_cut_join_string_by_separator($settings['subheading_text']); 
                ?></div>
            </div>
        <?php } ?>
    </div>
    <?php if(!empty($settings['description_text'])) { ?>
        <div class="cms-heading-desc pt-20"><?php echo wpautop($settings['description_text']); ?></div>
    <?php } 
    soapee_elementor_button_render($widget, $settings, ['class' => 'cms-heading-btn mt-15']);
?></div>