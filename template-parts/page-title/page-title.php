<?php
$titles        = soapee_get_page_titles();
$pagetitle     = soapee_get_opts( 'pagetitle', '1' );
$ptitle_layout = soapee_get_opts( 'ptitle_layout', '1' );
$sub_title     = soapee_get_opts( 'sub_title' );

ob_start();
if ( $titles['title'] )
{
    printf( '<h1 class="cms-ptitle-text">%s</h1>', $titles['title'] );
}
$titles_html          = ob_get_clean();
$ptitle_breadcrumb_on = soapee_get_opts( 'ptitle_breadcrumb_on', 'show' );

// 404 page
if(is_404()){
    $ptitle_layout = '404';
}

if($pagetitle == '1') : ?>
    <?php 
        switch ($ptitle_layout) {
            default: 
        ?>
            <div id="cms-pagetitle" class="cms-pagetitle cms-pagetitle-layout<?php echo esc_attr($ptitle_layout); ?> relative d-flex">
                <div class="cms-page-title-overlay"></div>
                <div class="container text-center d-flex justify-content-center">
                    <div class="cms-page-title-inner align-self-end">
                        <?php if(!is_404()){
                            printf( '%s', wp_kses_post($titles_html)); 
                            if(!empty($sub_title)) : 
                        ?>
                            <h6 class="page-sub-title ft-sub">
                                <?php echo wp_kses_post( $sub_title ); ?>
                            </h6>
                        <?php endif; 
                        } ?>
                        <?php if($ptitle_breadcrumb_on == '1') : ?>
                            <?php soapee_breadcrumb(['class' => 'bg-white-15 bdr-radius-20', 'divider' => '<span class="divider"></span>']); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php 
            break;
        }
    ?>
<?php endif; ?>