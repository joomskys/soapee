<div class="cms-video-player relative d-inline-block">
    <?php soapee_elementor_image_render2($settings, 'video_image_overlay', ['class' => 'rtl-flip']); ?>
    <?php if(!empty($settings['video_link'])) : ?>
        <div class="btn-video-wrap">
            <a class="btn-video" href="<?php echo esc_url($settings['video_link']); ?>">
                <span class="cms-play-video-icon"></span>
            </a>
            <div class="cms-video-title h2 m-b30 m-t50 text-white"><?php echo esc_html($settings['video_title']); ?></div>
            <div class="cms-video-sub-title h4 m-b30 m-t10 text-white"><?php echo esc_html($settings['video_sub_title']); ?></div>
            <?php soapee_elementor_button_render($widget, $settings, $args = ['prefix' => 'video_']); ?>
        </div>
    <?php endif; ?>  
</div>