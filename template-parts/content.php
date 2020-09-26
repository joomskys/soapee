<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Soapee
 */
?>
<div <?php post_class('cms-post-archive bdr-radius-20 pt-25 p-lr-20 pb-30 mb-30 bdr-1 bdr-solid bdr-grey6'); ?>><?php 
    soapee_post_media([
        'thumbnail_size' => 'large',
        'class'          => 'mb-25 mt-n25 m-lr-n20',
        'img_class'      => 'bdr-radius-t-15'
    ]); 
    soapee_post_title(['class' => 'text-20']);
    soapee_post_meta(['class' => 'mb-25 pb-20']);
    soapee_post_excerpt(['class' => 'mb-25']);
    soapee_post_link_pages(['class' => 'mb-25']);
    soapee_post_readmore(['class' => 'btn btn-md']);
?></div>