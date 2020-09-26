<?php
if(!function_exists('soapee_cpt_case_study')){
	add_filter( 'cms_extra_post_types', 'soapee_cpt_case_study' );
	function soapee_cpt_case_study( $postypes ) {
		$case_study_slug = soapee_get_opt( 'case_study_slug', 'cms-case-study' );
		$postypes['cms-case-study'] = array(
			'status'     => true,
			'item_name'  => esc_html__( 'CMS Case Study', 'soapee' ),
			'items_name' => esc_html__( 'CMS Case Studies', 'soapee' ),
			'args'       => array(
				'menu_icon'          => 'dashicons-share-alt',
				'supports'           => array(
					'title',
					'thumbnail',
					//'editor', 
					'excerpt'
				),
				'public'             => true,
				'publicly_queryable' => true,
				'rewrite'            => array(
	                'slug'  => $case_study_slug
	 		 	),
			),
			'labels'     => array()
		);
		return $postypes;
	}
}

if(!function_exists('soapee_add_tax_case_study')){
	//add_filter( 'cms_extra_taxonomies', 'soapee_add_tax_case_study' );
	function soapee_add_tax_case_study( $taxonomies ) {
		$taxonomies['service-category'] = array(
			'status'     => true,
			'post_type'  => array( 'cms-case-study' ),
			'taxonomy'   => esc_html__( 'Case Study Category', 'soapee' ),
			'taxonomies' => esc_html__( 'Case Study Categories', 'soapee' ),
			'args'       => array(),
			'labels'     => array()
		);

		return $taxonomies;
	}
}
// gallery 
if(!function_exists('soapee_case_study_gallery')){
    function soapee_case_study_gallery($args=[]){
        $args = wp_parse_args($args, array(
            'id'             => null,
            'source'         => 'cms_case_study_gallery',
            'thumbnail_size' => '970x592',
            'echo'           => true,
        ));
        // Get gallery from option
        $gallery_list = explode(',', soapee_get_post_format_value($args['id'], $args['source'], ''));
        if(empty($gallery_list[0])) return;
        // Get first gallery in content 
        global $post;
        wp_enqueue_script('jquery-slick');       
        ?>
            <div class="cms-case-study-gallery" dir="<?php echo is_rtl() ? 'rtl' : 'ltr'; ?>">
                <?php
                foreach ($gallery_list as $img_id):
                    ?>
                    <div class="cms-slick-slide-item slick-slide-item" style="padding: 0 15px;">
                        <img src="<?php echo soapee_get_image_url_by_size(['id' => $img_id, 'size' => $args['thumbnail_size']]);?>" alt="<?php echo esc_attr(get_post_meta( $img_id, '_wp_attachment_image_alt', true )) ?> Soapee">
                    </div>
                    <?php
                endforeach;
                ?>
            </div>
        <?php
    }
}
// the contract
if(!function_exists('soapee_case_study_contract')){
	function soapee_case_study_contract(){
		?><div class="contract">
			<div class="h3 text-25 text-va-30 lh-30"><?php
				echo soapee_get_post_format_value( null, 'cms_case_study_contract_title', esc_html__('The Contract','soapee'));
			?></div>
			<div class="pt-15"><?php
				echo wpautop(soapee_get_post_format_value( null, 'cms_case_study_contract'));
			?></div>
		</div>
		<?php
	}
}
// Ideals Introduction
if(!function_exists('soapee_case_study_ideals_introduction')){
	function soapee_case_study_ideals_introduction(){
		?>
			<div class="ideals-introduction pt-40">
				<div class="h3 text-25 text-va-30 lh-30"><?php
					echo soapee_get_post_format_value( null, 'cms_case_study_ideal_introduction_title', esc_html__('Ideals Introduction','soapee'));
				?></div>
				<div class="pt-15"><?php
					echo wpautop(soapee_get_post_format_value( null, 'cms_case_study_ideal_introduction'));
				?></div>
			</div>
		<?php
	}
}
// Our Approach
if(!function_exists('soapee_case_study_approach')){
	function soapee_case_study_approach(){
		?>
			<div class="approach pt-40">
				<div class="h3 text-25 text-va-30 lh-30"><?php
					echo soapee_get_post_format_value( null, 'cms_case_study_approach_title', esc_html__('Our Approach','soapee'));
				?></div>
				<div class="pt-15"><?php
					echo wpautop(soapee_get_post_format_value( null, 'cms_case_study_approach'));
				?></div>
			</div>
		<?php
	}
}
// Outcome
if(!function_exists('soapee_case_study_outcome')){
	function soapee_case_study_outcome(){
		?>
			<div class="outcome pt-40">
				<div class="h3 text-25 text-va-30 lh-30"><?php
					echo soapee_get_post_format_value( null, 'cms_case_study_outcome_title', esc_html__('Outcome','soapee'));
				?></div>
				<div class="pt-15"><?php
					echo wpautop(soapee_get_post_format_value( null, 'cms_case_study_outcome'));
				?></div>
			</div>
		<?php
	}
}
// Details
if(!function_exists('soapee_case_study_detail')){
	function soapee_case_study_detail(){
		?>
			<div class="details-wrap cms-widget mb-35">
				<div class="cms-widget-inner bdr-1 bdr-solid bdr-grey6 bdr-radius-15">
					<div class="cms-widget-title h3 bdr-b-1 bdr-b-solid bdr-grey6 bg-grey4 p-tb-18 p-lr-20"><?php
						echo soapee_get_post_format_value( null, 'cms_case_study_detail_title', esc_html__('Detail','soapee'));
					?></div>
					<div class="cms-widget-content p-0">
						<div class="details">
							<div class="detail-item bdr-b-1 bdr-b-solid bdr-grey6 pb-17 p-lr-20">
								<span class="text-primary font-600"><?php 
									echo soapee_get_post_format_value( null, 'cms_case_study_client_title', esc_html__('Client','soapee')); 
								?>:</span>
								<span><?php echo soapee_get_post_format_value( null, 'cms_case_study_client'); ?></span>
							</div>
							<div class="detail-item bdr-b-1 bdr-b-solid bdr-grey6 p-tb-17 p-lr-20">
								<span class="text-primary font-600"><?php 
									echo soapee_get_post_format_value( null, 'cms_case_study_project_type_title', esc_html__('Project type','soapee')); 
								?>:</span>
								<span><?php echo soapee_get_post_format_value( null, 'cms_case_study_project_type'); ?></span>
							</div>
							<div class="detail-item bdr-b-1 bdr-b-solid bdr-grey6 p-tb-17 p-lr-20">
								<span class="text-primary font-600"><?php 
									echo soapee_get_post_format_value( null, 'cms_case_study_complete_date_title', esc_html__('Completion date','soapee')); 
								?>:</span>
								<span><?php echo date(get_option('date_format'), strtotime(soapee_get_post_format_value( null, 'cms_case_study_complete_date'))); ?></span>
							</div>
							<div class="detail-item p-tb-17 p-lr-20">
								<span class="text-primary font-600"><?php 
									echo soapee_get_post_format_value( null, 'cms_case_study_location_title', esc_html__('Location','soapee')); 
								?>:</span>
								<span><?php echo soapee_get_post_format_value( null, 'cms_case_study_location'); ?></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
	}
}
// Brochure
if(!function_exists('soapee_case_study_brochure')){
	function soapee_case_study_brochure(){
		?>
			<div class="brochure cms-widget mb-35">
				<div class="cms-widget-inner bdr-1 bdr-solid bdr-grey6 bdr-radius-15">
					<div class="cms-widget-title h3 bdr-b-1 bdr-b-solid bdr-grey6 bg-grey4 p-tb-18 p-lr-20"><?php
						echo soapee_get_post_format_value( null, 'cms_case_study_brochure_title', esc_html__('Brochure','soapee'));
					?></div>
					<div class="cms-widget-content pb-20">
						<div class="pb-25"><?php echo soapee_get_post_format_value( null, 'cms_case_study_brochure_text'); ?></div>
						<?php
						$files = [];
						for ($i=1; $i < 6; $i++) {
							$files[] = soapee_get_post_format_value( null, 'cms_case_study_brochure_file_'.$i);
						}
						foreach ($files as $file) {
							if(!empty($file['id'])){
							?>
							<div class="brochure-item">
									<a href="<?php echo esc_url($file['url']);?>" class="bg-accent text-white text-uppercase text-14 text-va-100 lh-24 d-block bdr-radius-24 p-tb-12 p-lr-30 mb-10">
										<span class="row justify-content-between">
											<span class="col">
												<!-- <img src="<?php echo esc_url($file['thumbnail']);?>" width="12" alt="soapee" /> -->
												<?php //echo get_the_title( $file['id'])); 
													echo basename ( get_attached_file( $file['id']) );
											?></span>
											<span class="col-auto"><?php 
												echo size_format(filesize( get_attached_file( $file['id'] ) )); 
											?></span>
										</span>
									</a>
								</div>
								<?php 
									//var_dump(wp_get_attachment_metadata($file['id']));
									//echo $file['id']; echo wp_get_attachment_metadata($file['id']); echo get_the_title( $file['id']).get_post_mime_type($file['id']).basename ( get_attached_file( $file['id']) ).size_format(filesize( get_attached_file( $file['id'] ) )); ?>
							<?php }
						}
					?></div>
				</div>
			</div>
		<?php
	}
}
// Together 
if(!function_exists('soapee_case_study_work_together')){
	function soapee_case_study_work_together(){
	?>
		<div class="cms-case-study-together">
			<div class="cms-case-study-together-inner p-lr-20 text-white text-hover-secondary bg-primary pt-45">
				<div class="h3 text-25 lh-32 text-va-30 text-uppercase text-hover-secondary"><?php soapee_cut_join_string_by_separator(soapee_get_post_format_value( null, 'cms_case_study_work_together_title')); ?></div>
				<div class="pt-20 pb-25 relative desc mb-20"><?php echo soapee_get_post_format_value( null, 'cms_case_study_work_together_text'); ?></div>
				<div class="cms-case-study-together-qc pb-40">
					<div class="phone"><span class="fas fa-phone text-secondary fa-flip"></span> <?php echo soapee_get_post_format_value( null, 'cms_case_study_work_together_phone'); ?></div>
					<div class="mail"><span class="fas fa-envelope-open-text text-secondary"></span> <?php echo soapee_get_post_format_value( null, 'cms_case_study_work_together_mail'); ?></div>
					<div class="address"><span class="fas fa-map-marker-alt text-secondary"></span> <?php echo soapee_get_post_format_value( null, 'cms_case_study_work_together_address'); ?></div>
				</div>
			</div>
			<?php if (!empty(soapee_get_post_format_value(null, 'cms_case_study_work_together_contact_text')) && !empty(soapee_get_post_format_value(null, 'cms_case_study_work_together_contact_page'))) { ?>
				<div class="cms-case-study-together-button">
					<a class="btn d-block" href="<?php the_permalink(soapee_get_post_format_value(null, 'cms_case_study_work_together_contact_page')) ?>"><?php echo soapee_get_post_format_value(null, 'cms_case_study_work_together_contact_text'); ?></a>
				</div>
			<?php } ?>
		</div>
		<?php
	}
}