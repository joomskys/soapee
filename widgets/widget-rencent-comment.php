<?php
add_filter('show_recent_comments_widget_style', 'soapee_show_recent_comments_widget_style');
function soapee_show_recent_comments_widget_style(){
	return false;
}

class Soapee_WP_Widget_Recent_Comments extends WP_Widget_Recent_Comments{

}