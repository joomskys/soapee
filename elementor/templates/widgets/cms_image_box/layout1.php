<?php
//image size
$image_size                 = $widget->get_setting('image_size_size','full');
$thumbnail_custom_dimension = $widget->get_setting('image_size_custom_dimension', ['width'=> 201, 'height' => 179]);
if(empty($thumbnail_custom_dimension['width'])) $thumbnail_custom_dimension['width'] = 201;
if(empty($thumbnail_custom_dimension['height'])) $thumbnail_custom_dimension['height'] = 179;

if($image_size != 'custom'){
    $img_size = $image_size;
} elseif (!empty($thumbnail_custom_dimension['width']) && !empty($thumbnail_custom_dimension['height'])){
    $img_size = $thumbnail_custom_dimension['width'] . 'x' . $thumbnail_custom_dimension['height'];
} else {
    $img_size = 'full';
}
?>
<div class="row">
	<div class="col-12 col-xs-auto"><?php
		soapee_image_by_size([
		    'id'      => $settings['image']['id'], 
		    'size'    => $img_size,
		    'class'   => 'cms-img-box bdr-radius-15',
		    'default' => true,
		    'before'  => '<div class="cms-image-box">',
		    'after'   => '</div>'
		]);
	?></div>
	<div class="col pt-17">
		<div class="h4 text-20 text-va-20 lh-26 font-500 pb-10"> <?php
		echo esc_html($settings['feature_title']);
		?></div>
		<ul class="cms-list cms-list-carret"><?php
			foreach ($settings['feature_lists'] as $feature_list){
				echo '<li>'.esc_html($feature_list['feature_list']).'</li>';
			}
		?></ul>
	</div>
</div>