<?php
/**
 * The template for displaying all single posts
 *
 * @package Soapee
 */
get_header();

while ( have_posts() ) {
    the_post();
    soapee_case_study_gallery();
}
?>
<div class="container cms-content-container">
    <div class="row cms-content-row p-tb-110">
        <div id="cms-content-area" class="<?php soapee_content_css_class(); ?>">
            <div id="cms-posts" class="cms-posts cms-blogs">
            <?php
                while ( have_posts() )
                {
                    the_post();
                    
                    the_content();
                    if ( comments_open() || get_comments_number() )
                    {
                        comments_template('/single-cms-service-comments.php');
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
