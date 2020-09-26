<?php
/* Dashboard Theme */
add_filter('cms_documentation_link',function(){
     return 'https://doc.cmssuperheroes.com/wordpress/soapee/';
});

add_filter('cms_ticket_link', 'soapee_add_cms_ticket_link');
function soapee_add_cms_ticket_link($url)
{
    $url = array(
    	'type' => 'url', 
    	'link' => 'https://cmssuperheroes.com/ticket/'
    );
    return $url;
}
add_filter('cms_video_tutorial_link',function(){
     return '#';
});