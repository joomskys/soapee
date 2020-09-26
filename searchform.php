<?php
/**
 * Search Form
 */
$search_field_placeholder = soapee_get_opt( 'search_field_placeholder', esc_html__('Search...','soapee') );
?>
<form role="search" method="get" class="cms-searchform" action="<?php echo esc_url(home_url( '/' )); ?>">
    <input type="text" placeholder="<?php echo esc_attr( $search_field_placeholder ); ?>" name="s" class="cms-search-field font-600i" />
	<button type="submit" class="cms-search-submit bg-accent bg-hover-secondary text-white"><span class="cms-search-submit-icon"></span></button>
</form>