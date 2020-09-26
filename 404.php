<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Soapee
 */
get_header();
?>
    <div class="container cms-content-container">
        <div class="row cms-content-row">
            <div id="cms-content-area" class="<?php soapee_content_css_class('text-center'); ?>">
                <div class="row">
                    <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                        <div data-title="<?php echo soapee_get_opt( 'heading_404_page', esc_html__('404', 'soapee') ); ?>" class="page-404-heading h2 text-100 lh-100 text-md-200 lh-md-180 text-primary">
                            <span><?php 
                                echo soapee_get_opt( 'heading_404_page', esc_html__('404', 'soapee') ); 
                            ?></span>
                        </div>
                        <div data-title="<?php echo soapee_get_opt( 'subheading_404_page', esc_html__('oops! So much dust', 'soapee') );?>" class="page-404-subheading text-uppercase text-accent text-30 lh-40 text-md-48 lh-md-70 text-va-30 font-900 mb-15">
                            <span><?php 
                                echo soapee_get_opt( 'subheading_404_page', esc_html__('Oops! So much dust', 'soapee') ); 
                            ?></span>
                        </div>
                        <div class="page-404-description mb-45"><?php 
                            echo soapee_get_opt( 'content_404_page', esc_html__('The page you are looking is not available or has been removed. Try going to Home Page by using the button below.', 'soapee') );
                        ?></div>
                        <a class="btn btn-default" href="<?php echo esc_url(home_url('/')); ?>"><?php
                            echo soapee_get_opt( 'btn_text_404_page', esc_html__('Back To Homepage','soapee') ); 
                        ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();
