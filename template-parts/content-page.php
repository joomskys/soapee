<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package Soapee
 */

?>

<div <?php post_class('cms-single-page clearfix'); ?>><?php 
	the_content();
?></div>
<?php 
	soapee_post_link_pages(['class' => 'mt-30']); 
?>
