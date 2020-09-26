<div class="cms-qc-wrap">
	<div class="cms-qc-inner">
		<div class="cms-qc-heading h2 text-40 text-va-20 lh-48 mb-25">
			<?php echo esc_html($settings['heading_text']); ?>
		</div>
		<div class="cms-qc-desc mb-15">
			<?php echo esc_html($settings['description_text']); ?>
		</div>
		<?php foreach ($settings['contact_list'] as $value): ?>
			<div class="cms-qc-list p-tb-15 bdr-b-1 bdr-solid bdr-grey6">
				<div class="row gutters-20 align-items-center">
					<div class="col-auto">
					<?php 
			        	soapee_elementor_icon_render($widget, $settings,[
			        		'id'      => $value['contact_list_icon'],
				            'loop'    => true,
				            'class'   => 'text-accent text-25',
			        	]);
			        ?>
			        </div>
			        <div class="col">
			        	<div><span class="font-600 text-primary"><?php echo esc_html($value['contact_list_title_1']); ?></span> <?php echo esc_html($value['contact_list_text_1']); ?></div>
			        	<div><span class="font-600 text-primary"><?php echo esc_html($value['contact_list_title_2']); ?></span> <?php echo esc_html($value['contact_list_text_2']); ?></div>
			        </div>
			    </div>
		    </div>      
		<?php endforeach; 
		soapee_elementor_button_render($widget, $settings, ['class'=> 'mt-30']);
		?>
	</div>
</div>