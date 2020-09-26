<?php
/**
 * Custom Woocommerce shop page.
 */
get_header();
?>
    <div class="container cms-content-container p-tb-60">
        <div class="row cms-content-row">
            <div id="cms-content-area" class="<?php soapee_content_css_class(); ?>">
                 <div id="cms-products" class="cms-posts cms-products">
                    <?php woocommerce_content(); ?>
                </div>
            </div>
            <?php soapee_sidebar(); ?>
        </div>
    </div>
<?php
get_footer();