<?php
/** 
 * Custom Widget Archive 
 * This code filters the Archive widget to include the post count inside the link 
 * @since 1.0.0
*/
if(!function_exists('soapee_get_archives_link_text')){
    add_filter('get_archives_link', 'soapee_get_archives_link_text', 10, 6);
    function soapee_get_archives_link_text($link_html, $url, $text, $format, $before, $after ){
        $text = wptexturize( $text );
        $url  = esc_url( $url );
     
        if ( 'link' == $format ) {
            $link_html = "\t<link rel='archives' title='" . esc_attr( $text ) . "' href='$url' />\n";
        } elseif ( 'option' == $format ) {
            $link_html = "\t<option value='$url'>$before $text $after</option>\n";
        } elseif ( 'html' == $format ) {
            $link_html = "\t<li>$before<a href='$url'><span class='title'>$text</span></a>$after</li>\n";
        } else { // custom
            $link_html = "\t$before<a href='$url'><span class='title'>$text</span>$after</a>\n";
        }
        return $link_html;
    }
}

if(!function_exists('soapee_archive_count_span')){
    add_filter('get_archives_link', 'soapee_archive_count_span');
    function soapee_archive_count_span($links) {
        $links = str_replace('<li>', '<li class="cms-menu-item">', $links);
        $links = str_replace('</a>&nbsp;(', ' <span class="count">(', $links);
        $links = str_replace(')</li>', ')</span></a></li>', $links);
        return $links;
    }
}