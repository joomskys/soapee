<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package Soapee
 */

get_header();
?>
    <div class="container cms-content-container">
        <div class="row cms-content-row">
            <div id="cms-content-area" class="<?php soapee_content_css_class(); ?>">
                <?php
                    while ( have_posts() )
                    {
                        the_post();
                        get_template_part( 'template-parts/content', 'page' );
                        if ( comments_open() || get_comments_number() )
                        {
                            comments_template();
                        }
                    }
                ?>
            </div>
            <?php soapee_sidebar(); ?>
        </div>
    </div>
<?php
get_footer();