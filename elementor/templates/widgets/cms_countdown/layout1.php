<?php 
    if(empty($settings['time_to'])) $settings['time_to'] = date('Y-m-d H:i', strtotime("+6 days 2 hours 56 minutes 50 seconds"));
?>
<div class="cms-countdown">
    <div class="text-25 lh-40 h3 font-700i text-uppercase mb-25 text-white"><span class="text-secondary">*</span><?php echo esc_html($settings['title_text']); ?></div>
    <div class="bdr-5 bdr-solid bdr-white bdr-radius-20 bg-secondary text-30 text-va-20 text-uppercase font-700 h2 p-20 text-center mb-35"><?php
        printf('%s %s', $settings['pre_text'], date_i18n('d.m.Y', strtotime( $settings['time_to'] ) ));
    ?></div>
    <div class="cms-countdown-bar row gutters-25 align-items-center justify-content-center text-white" data-time="<?php echo esc_attr($settings['time_to']); ?>">
        <div class="time-item col-auto">
            <div class="time-item-inner bdr-1 bdr-solid bdr-white-30 bdr-radius-10 text-center p-lr-10 p-tb-25">
                <div class="day inner-number"></div>
                <div class="inner-text"><?php echo esc_html__('Days', 'soapee') ?></div>
            </div>
        </div>
        <div class="time-item col-auto">
            <div class="time-item-inner bdr-1 bdr-solid bdr-white-30 bdr-radius-10 text-center p-lr-10 p-tb-25">
                <div class="hour inner-number"></div>
                <div class="inner-text"><?php echo esc_html__('Hours', 'soapee') ?></div>
            </div>
        </div>
        <div class="time-item col-auto">
            <div class="time-item-inner bdr-1 bdr-solid bdr-white-30 bdr-radius-10 text-center p-lr-10 p-tb-25">
                <div class="minute inner-number"></div>
                <div class="inner-text"><?php echo esc_html__('Minutes', 'soapee') ?></div>
            </div>
        </div>
        <div class="time-item col-auto">
            <div class="time-item-inner bdr-1 bdr-solid bdr-white-30 bdr-radius-10 text-center p-lr-10 p-tb-25">
                <div class="second inner-number"></div>
                <div class="inner-text"><?php echo esc_html__('Seconds', 'soapee') ?></div>
            </div>
        </div>
    </div>
    <div class="mt-42 empty-none row justify-content-center gutters-15"><?php 
        soapee_elementor_button_render($widget, $settings, ['prefix' => 'button1_', 'tag' => 'div','class' => 'col-auto', 'overwrite' => true]);
        soapee_elementor_button_render($widget, $settings, ['prefix' => 'button2_', 'tag' => 'div','class' => 'col-auto', 'overwrite' => true]);
    ?></div>
</div>
