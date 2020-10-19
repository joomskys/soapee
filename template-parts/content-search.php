<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Soapee
 */
?>
<div <?php post_class('cms-post-archive bdr-radius-20 mb-30 bdr-1 bdr-solid bdr-grey6 p-lr-20'); ?>>
    <div class="row">
        <?php 
            soapee_post_media([
                'thumbnail_size' => 'large',
                'wrap_class'     => 'col-lg-5 empty-none p-tb-20 p-lr-15 text-center',
                'img_class'      => 'bdr-radius-15',
                'inner'          => false
            ]);
        ?>
        <div class="col pt-25 pb-30"><?php 
            soapee_post_title(['class' => 'text-24']);
            soapee_post_meta(['class' => 'mb-25 pb-20']);
            soapee_post_excerpt(['class' => 'mb-25', 'length' => '15']);
            soapee_post_link_pages(['class' => 'mb-25']);
            soapee_post_readmore(['class' => 'btn btn-md']);
        ?></div>
    </div>
</div>