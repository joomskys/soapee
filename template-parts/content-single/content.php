<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Soapee
 */
?>
<div <?php post_class('cms-single-post'); ?>>
    <?php 
        soapee_post_media([
            'thumbnail_size' => 'full',
            'class'          => 'mb-20 text-center',
            'img_class'      => 'bdr-radius-15',
            'show_image'     =>  (bool) soapee_get_opts('post_feature_image_on', true)    
        ]);
        soapee_post_meta([
            'show_date'   => soapee_get_opts('post_date_on','1'),
            'show_cat'    => soapee_get_opts('post_categories_on','1'),
            'show_author' => soapee_get_opts('post_author_on','1'),
            'show_cmt'    => soapee_get_opts('post_comments_on','0'),
            'class'       => 'mb-20 pb-20 clearfix'  
        ]);
    ?>
    <div class="cms-post-content mb-30 clearfix"><?php
        the_content();
    ?></div>
    <?php 
        // post page
        soapee_post_link_pages(['class' => 'mb-30']);
    ?>
    <div class="row gutters-30 justify-content-between">
        <?php
            // Post tag
            // param: show_tag, title
            soapee_post_tagged_in([
                'show_tag' => soapee_get_opt( 'post_tags_on', '1' ), 
                'title'    => esc_html__('Tags','soapee'),
                'class'    => 'col-auto'
            ]);
            // post share
            // param: show_share, class, title, social_class
            soapee_socials_share_default([
                'class'        => 'col-auto gutters-10',
                'show_share'   => soapee_get_opt( 'post_social_share_on', '0' ),   
                'title'        => '<div class="col-auto"><div class="h4">'.esc_html__('Share:','soapee').'</div></div>',
                'social_class' => 'cms-social-circle cms-social-bg-colored cms-social-34'
            ]);
        ?>
    </div>
    <?php
        // Next/Preview Post link
        // param: show_nav, class, prev_title, next_title
        soapee_posts_nav_link([
            'show_nav' => soapee_get_opt('post_nav_link_on', '1'),
            'class'    => 'mt-30']
        );

        // Author info
        // param: show_author, class
        soapee_post_author_info([
            'class'       => 'mt-30',
            'show_author' => soapee_get_opt('post_author_info_on', '0')
        ]);
        // Related post
        // param: class, show_related, title, posts_per_page, post_tyle
        soapee_related_post([
            'class' => 'mt-40'
        ]);
    ?>
</div>