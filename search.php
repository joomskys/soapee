<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package CMS
 * @subpackage Soapee
 * @since Soaoee 1.0
 * @version 1.0
 */

get_header();
?>
<div class="container cms-content-container">
    <div class="row cms-content-row">
        <div id="cms-content-area" class="<?php soapee_content_css_class(); ?>">
            <div id="cms-posts" class="cms-posts cms-blogs">
                <?php if ( have_posts() ) : ?>
                    <div class="cms-page-title h1 mb-50"><?php
                    /* translators: Search query. */
                    printf( esc_html__( 'Search Results for: %s', 'soapee' ), '<span>' . get_search_query() . '</span>' );
                    ?></div>
                <?php else : ?>
                    <div class="cms-page-title h1 mb-50"><?php esc_html_e( 'Nothing Found', 'soapee' ); ?></div>
                <?php endif; ?>
                <?php
                    if ( have_posts() ) {
                        while ( have_posts() )
                        {
                            the_post();
                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called loop-post-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part( 'template-parts/content' );
                        }
                        soapee_posts_pagination();
                    } else { ?>
                        <div class="no-results not-found">
                            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'soapee' ); ?></p>
                        <?php get_search_form(); ?>
                        </div>
                    <?php } ?>
            </div>
        </div>
        <?php soapee_sidebar(); ?>
    </div>
</div>
<?php
get_footer();
