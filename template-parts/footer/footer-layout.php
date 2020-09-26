<div id="cms-footer" class="<?php soapee_footer_css_class();?>">
    <?php soapee_footer_top(); ?>
    <?php soapee_footer_middle(); ?>
    <div class="cms-footer-bottom">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <?php soapee_footer_copyright(); ?>
                </div>
                <div class="col-auto"><?php 
                    soapee_social_footer(['class'=>'cms-footer-social col-auto']);
                    dynamic_sidebar('sidebar-footer-bottom');
                ?></div>
            </div>
        </div>
    </div>
    <?php do_action('soapee_after_footer'); ?>
</div>