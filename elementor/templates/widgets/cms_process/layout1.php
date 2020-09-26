<div class="cms-process row justify-content-center <?php echo soapee_elementor_align_class($settings);?>">
    <?php 
    $count = 0;
    foreach ($settings['process'] as $process): 
        $count++;
    ?>
        <div class="cms-process-item mb-50 <?php soapee_elementor_grid_column_class($widget, $settings); ?>">
            <div class="cms-process-item-inner">
                <?php soapee_elementor_icon_render($widget, $settings, [
                    'id'         => $process['process_icon'],
                    'loop'       => true,
                    'wrap_class' => 'cms-process-icon cms-icon cms-icon-116 bg-accent text-center text-white circle mb-15',
                    'atts'       => [
                        'data-title' => $count
                    ]
                ]); ?>
                <div class="text-20 text-va-20 h4 font-500"><?php echo esc_html($process['process_name'])?></div>
                <div class="desc mt-15 empty-none"><?php echo esc_html($process['process_desc'])?></div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
