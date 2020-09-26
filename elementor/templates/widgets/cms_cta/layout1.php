<div class="row gutters-10 justify-content-center">
	<div class="col-auto"><?php
		soapee_elementor_icon_render($widget, $settings, [
			'tag' 		 => 'span',
            'wrap_class' => '',
            'class'      => 'text-30 text-secondary'
        ]);
	?></div>
	<div class="col col-lg-auto align-self-center maxw-90 percent">
		<div class="text-20 text-va-20 h4 <?php echo esc_attr($settings['class']);?>"><?php
			echo esc_html($settings['title'].' '.$settings['pre_phone_text']);
			printf('%s', '<span class="text-secondary"> '.$settings['phone'].'</span>');
			echo esc_html(' '.$settings['pre_btn_text']);

			soapee_elementor_button_render($widget, $settings, [
				'wrap' => false
			]); 
		?></div>
	</div>
	<div class="col-auto"><?php 
		soapee_elementor_icon_render($widget, $settings, [
			'id'		 => 'selected_icon_after',
			'tag'		 => 'span',	
	        'wrap_class' => '',
	        'class'      => 'text-30 text-secondary'
	    ]);
    ?></div>
</div>
