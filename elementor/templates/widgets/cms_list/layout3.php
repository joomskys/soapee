<?php if(isset($settings['cms_list']) && !empty($settings['cms_list'])): 
    $settings['default_selected_icon']['value'] = empty($settings['default_selected_icon']['value']) ? 'zmdi zmdi-check-circle' : $settings['default_selected_icon']['value']; 
    $settings['default_selected_icon']['library'] = empty($settings['default_selected_icon']['library']) ? 'material_design' : $settings['default_selected_icon']['library'];

?>
<div class="cms_lists">
<?php 
    foreach ($settings['cms_list'] as $key => $cms_list):
        $icon = empty($cms_list['selected_icon']['value']) ? $settings['default_selected_icon'] : $cms_list['selected_icon'];
        if ( ! empty( $cms_list['title'] ) ) { ?>
            <div class="cms-list-item">
                <div class="cms-list-title text-primary"><?php 
                    soapee_elementor_icon_render($widget, $settings, [
                        'id'    => $icon, 
                        'loop'  => true,
                        'class' => 'text-accent pr-10',
                        'tag'   => 'span'
                    ]);
                    echo soapee_cut_join_string_by_separator($cms_list['title'], ['class' => 'text-accent']); 
                ?></div>
                <div class="cms-list-desc pt-7 d-none"><?php echo wpautop($cms_list['description']); ?></div>
            </div>    
        <?php } ?>
    <?php endforeach; ?>
</div>
<?php
endif; 