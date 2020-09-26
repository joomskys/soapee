<?php
/**
 * The template for displaying all single posts
 *
 * @package Soapee
 */
get_header();
?>
<div class="container cms-content-container">
    <div class="row cms-content-row">
        <div id="cms-content-area" class="<?php soapee_content_css_class(); ?>">
            <div id="cms-posts" class="cms-posts cms-blogs">
            <?php
                while ( have_posts() )
                {
                    the_post();
                    get_template_part( 'template-parts/content-single/content', get_post_format() );
                    if ( comments_open() || get_comments_number() )
                    {
                        comments_template();
                    }
                }
            ?>
            </div>
        </div>
        <?php soapee_sidebar(); ?>
    </div>
</div>
<?php
get_footer();
