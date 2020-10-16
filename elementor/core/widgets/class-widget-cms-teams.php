<?php

class ETC_CmsTeams_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_teams';
    protected $title = 'CMS Teams';
    protected $icon = 'fa fa-users';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"http:\/\/localhost\/soapee-demo\/wp-content\/themes\/soapee\/elementor\/templates\/widgets\/cms_teams\/layout\/layout1.png"},"2":{"label":"Layout 2","image":"http:\/\/localhost\/soapee-demo\/wp-content\/themes\/soapee\/elementor\/templates\/widgets\/cms_teams\/layout\/layout2.png"},"3":{"label":"Layout 3","image":"http:\/\/localhost\/soapee-demo\/wp-content\/themes\/soapee\/elementor\/templates\/widgets\/cms_teams\/layout\/layout3.png"}},"prefix_class":"cms-team-layout-"},{"name":"team_image_size","type":"image-size","control_type":"group","default":"full"}]},{"name":"section_slick_slider_settings","label":"Carousel Settings","tab":"layout","controls":[{"name":"slide_rows","label":"Rows","description":"Setting this to more than 1 initializes grid mode. Use slidesPerRow to set how many slides should be in each row.","type":"select","options":{"1":"1","2":"2","3":"3","4":"4"},"control_type":"responsive","default":"1"},{"name":"slide_mode","label":"Slide mode","type":"select","options":{"true":"Fade","false":"Slide"},"default":"false"},{"name":"slides_to_show","label":"Slides to Show","type":"select","control_type":"responsive","default":"","options":{"":"Default","1":1,"2":2,"3":3,"4":4,"5":5,"6":6,"7":7,"8":8,"9":9,"10":10},"condition":{"slide_mode":"false"}},{"name":"slides_to_scroll","label":"Slides to Scroll","type":"select","control_type":"responsive","default":"","options":{"":"Default","1":1,"2":2,"3":3,"4":4,"5":5,"6":6,"7":7,"8":8,"9":9,"10":10},"condition":{"slide_mode":"false","slides_to_show!":"1"}},{"name":"slides_gutter","label":"Gutter","type":"number","default":30},{"name":"arrows","label":"Show Arrows","type":"switcher","control_type":"responsive"},{"name":"arrows_pos","label":"Arrows Position","type":"select","control_type":"responsive","default":"in-vertical","options":{"in-vertical":"Inside Vertical","out-vertical":"Outside Vertical"},"condition":{"arrows":"true"},"prefix_class":"cms-slick-nav-","separator":"before"},{"name":"dots","label":"Show Dots","type":"switcher","control_type":"responsive","default":"true"},{"name":"dots_pos","label":"Dots Position","type":"select","control_type":"responsive","default":"out","options":{"in":"Inside","out":"Outside"},"condition":{"dots":"true"},"prefix_class":"cms-slick-dots-","separator":"before"},{"name":"pause_on_hover","label":"Pause on Hover","type":"switcher"},{"name":"autoplay","label":"Autoplay","type":"switcher","default":"true"},{"name":"autoplay_speed","label":"Autoplay Speed","type":"number","default":2000,"condition":{"autoplay":"true"}},{"name":"infinite","label":"Infinite Loop","type":"switcher"},{"name":"speed","label":"Animation Speed","type":"number","default":500}],"condition":[]},{"name":"section_teams","label":"Teams","tab":"content","controls":[{"name":"teams","label":"Select Form","type":"repeater","default":[{"team_name":"Member Name","team_job":"Member Job Title","team_desc":"Member Description","team_link":"http:\/\/team-link.com"},{"team_name":"Member Name","team_job":"Member Job Title","team_desc":"Member Description","team_link":"http:\/\/team-link.com"},{"team_name":"Member Name","team_job":"Member Job Title","team_desc":"Member Description","team_link":"http:\/\/team-link.com"}],"controls":[{"name":"team_name","label":"Member Name","type":"text","label_block":true,"default":"Team Name"},{"name":"team_job","label":"Member Job Title","type":"text","label_block":true,"default":"Member Job Title"},{"name":"team_desc","label":"Member Description","type":"textarea","label_block":true,"default":"Member Description"},{"name":"team_link","label":"Member URL","type":"url","label_block":true,"placeholder":"http:\/\/team-link.com"},{"name":"team_social","label":"Member Social","type":"heading","separator":"before"},{"name":"team_link_facebook","label":"Facebook","type":"text"},{"name":"team_link_twitter","label":"Twitter","type":"text"},{"name":"team_link_linkedin","label":"Linkedin","type":"text"},{"name":"team_link_instagram","label":"Instagram","type":"text"},{"name":"team_link_skype","label":"Skype","type":"text"},{"name":"team_social_new_window","label":"Open in new window","type":"switcher"},{"name":"team_social_nofollow","label":"Add nofollow","type":"switcher","separator":"after"},{"name":"team_image","label":"Team Logo\/Image","type":"media","label_block":true}],"title_field":"{{{ team_name }}}"}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'jquery-slick','cms-slick-slider' );
}