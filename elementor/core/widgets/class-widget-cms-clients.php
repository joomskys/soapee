<?php

class ETC_CmsClients_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_clients';
    protected $title = 'CMS Clients';
    protected $icon = 'eicon-person';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"http:\/\/localhost\/soapee-demo\/wp-content\/themes\/soapee\/elementor\/templates\/widgets\/cms_clients\/layout\/layout1.png"},"2":{"label":"Layout 1","image":"http:\/\/localhost\/soapee-demo\/wp-content\/themes\/soapee\/elementor\/templates\/widgets\/cms_clients\/layout\/layout2.png"}},"prefix_class":"cms-clients-layout-","0":{"name":"client_image_size","type":"image-size","control_type":"group","default":"full"}}]},{"name":"section_slick_slider_settings","label":"Carousel Settings","tab":"layout","controls":[{"name":"slide_rows","label":"Rows","description":"Setting this to more than 1 initializes grid mode. Use slidesPerRow to set how many slides should be in each row.","type":"select","options":{"1":"1","2":"2","3":"3","4":"4"},"control_type":"responsive","default":"1"},{"name":"slide_mode","label":"Slide mode","type":"select","options":{"true":"Fade","false":"Slide"},"default":"false"},{"name":"slides_to_show","label":"Slides to Show","type":"select","control_type":"responsive","default":"","options":{"":"Default","1":1,"2":2,"3":3,"4":4,"5":5,"6":6,"7":7,"8":8,"9":9,"10":10},"condition":{"slide_mode":"false"}},{"name":"slides_to_scroll","label":"Slides to Scroll","type":"select","control_type":"responsive","default":"","options":{"":"Default","1":1,"2":2,"3":3,"4":4,"5":5,"6":6,"7":7,"8":8,"9":9,"10":10},"condition":{"slide_mode":"false","slides_to_show!":"1"}},{"name":"slides_gutter","label":"Gutter","type":"number","default":30},{"name":"arrows","label":"Show Arrows","type":"switcher","control_type":"responsive"},{"name":"arrows_pos","label":"Arrows Position","type":"select","control_type":"responsive","default":"in-vertical","options":{"in-vertical":"Inside Vertical","out-vertical":"Outside Vertical"},"condition":{"arrows":"true"},"prefix_class":"cms-slick-nav-","separator":"before"},{"name":"dots","label":"Show Dots","type":"switcher","control_type":"responsive","default":"true"},{"name":"dots_pos","label":"Dots Position","type":"select","control_type":"responsive","default":"out","options":{"in":"Inside","out":"Outside"},"condition":{"dots":"true"},"prefix_class":"cms-slick-dots-","separator":"before"},{"name":"pause_on_hover","label":"Pause on Hover","type":"switcher"},{"name":"autoplay","label":"Autoplay","type":"switcher","default":"true"},{"name":"autoplay_speed","label":"Autoplay Speed","type":"number","default":2000,"condition":{"autoplay":"true"}},{"name":"infinite","label":"Infinite Loop","type":"switcher"},{"name":"speed","label":"Animation Speed","type":"number","default":500}],"condition":[]},{"name":"section_clients","label":"Clients","tab":"content","controls":[{"name":"clients","label":"Select Form","type":"repeater","default":[{"client_name":"Client Name #1","client_link":"http:\/\/client-link.com","client_image":""},{"client_name":"Client Name #2","client_link":"http:\/\/client-link.com","client_image":""},{"client_name":"Client Name #3","client_link":"http:\/\/client-link.com","client_image":""},{"client_name":"Client Name #4","client_link":"http:\/\/client-link.com","client_image":""},{"client_name":"Client Name #5","client_link":"http:\/\/client-link.com","client_image":""},{"client_name":"Client Name #6","client_link":"http:\/\/client-link.com","client_image":""},{"client_name":"Client Name #7","client_link":"http:\/\/client-link.com","client_image":""},{"client_name":"Client Name #8","client_link":"http:\/\/client-link.com","client_image":""}],"controls":[{"name":"client_name","label":"Client Name","type":"text","label_block":true,"default":"Client Name #1"},{"name":"client_link","label":"Client URL","type":"url","label_block":true,"placeholder":"http:\/\/client-link.com"},{"name":"client_image","label":"Client Logo\/Image","type":"media","label_block":true}],"title_field":"{{{ client_name }}}"}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'jquery-slick','cms-slick-slider' );
}