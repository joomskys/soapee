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
    <div class="row cms-content-row">
        <div id="cms-content-area" class="<?php soapee_content_css_class(); ?>">
            <div id="cms-posts" class="cms-posts cms-blogs pt-70">
            <?php
                while ( have_posts() )
                {
                    the_post();
                    ?>
                    <div class="row">
                        <div class="col-lg-8">
                            <?php 
                                soapee_case_study_contract();
                                soapee_case_study_ideals_introduction();
                                soapee_case_study_approach();
                                soapee_case_study_outcome();

                                if ( comments_open() || get_comments_number() )
                                {
                                    comments_template();
                                }
                            ?>
                        </div>
                        <div class="col-lg-4 pt-50 pt-lg-0"><?php
                            soapee_case_study_detail();
                            soapee_case_study_brochure();
                            soapee_case_study_work_together();
                        ?></div>
                    </div>
                    <?php
                }
            ?>
            </div>
        </div>
        <?php soapee_sidebar(); ?>
    </div>
</div>
<?php
get_footer();
