<?php if(isset($settings['cms_list']) && !empty($settings['cms_list'])): ?>
<div class="cms-lists">
<?php 
    foreach ($settings['cms_list'] as $key => $cms_list):
        if ( ! empty( $cms_list['title'] ) ) { ?>
            <div class="cms-list-item">
                <div class="cms-list-title text-20 font-600 text-primary "><?php 
                	soapee_elementor_icon_render($widget, $settings, [
						'id'    => $cms_list['selected_icon'], 
						'loop'  => true,
						'class' => 'text-accent pr-10 d-none',
                        'tag'   => 'span'
                	]);
                	echo esc_html($cms_list['title']); 
                ?></div>
                <div class="cms-list-desc pt-7"><?php echo wpautop($cms_list['description']); ?></div>
            </div>    
        <?php } ?>
    <?php endforeach; ?>
</div>
<?php
endif; 