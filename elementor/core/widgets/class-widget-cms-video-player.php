<?php

class ETC_CmsVideoPlayer_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_video_player';
    protected $title = 'CMS Video Player';
    protected $icon = 'eicon-play';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"http:\/\/localhost\/soapee-demo\/wp-content\/themes\/soapee\/elementor\/templates\/widgets\/cms_video_player\/layout-image\/layout1.png"}},"prefix_class":"cms-video-layout-"}]},{"name":"video_section","label":"Video","tab":"content","controls":[{"name":"video_link","label":"Link","type":"text","default":"https:\/\/www.youtube.com\/watch?v=XHOmBV4js_E"},{"name":"video_title","label":"Title","type":"text","label_block":true},{"name":"video_sub_title","label":"Sub Title","type":"text","label_block":true}]},{"name":"image_section","label":"Image Overlay","tab":"content","controls":[{"name":"video_image_overlay","label":"Choose Image","type":"media","default":[],"dynamic":{"active":true}},{"name":"video_image_overlay_size","type":"image-size","control_type":"group","default":"full","separator":"none"},{"name":"video_image_as_background","label":"Make Image as Background","type":"switcher","default":"false"}]},{"name":"play_section","label":"Play Button","tab":"content","controls":[{"name":"video_play_btn_style","label":"Style","type":"select","options":{"style1":"Style 1"},"default":"style1"},{"name":"video_play_btn_position","label":"Position","type":"select","options":{"left-center":"Left Center","right-center":"Right Center","center-center":"Center Center"},"default":"left-center","prefix_class":"cms-video-play-btn-"},{"name":"video_btn_text","label":"Button Text","type":"text","default":"","placeholder":"Read More","condition":[]},{"name":"video_btn_link_type","label":"Link Type","type":"select","default":"custom","options":{"custom":"Custom","page":"Internal Page"},"condition":{"video_btn_text!":""}},{"name":"video_btn_link_page","label":"Page Link","type":"select","default":"","options":{"about":"About Us","appointment":"Appointment","appointment-booking-profile":"Appointment Booking Profile","blog-archives":"Blog Archives","blog-grid":"Blog Grid","cart":"Cart","case-studies":"Case Studies","checkout":"Checkout","contact-us":"Contact Us","contact-us-02":"Contact Us 02","cost-calculator":"Cost Calculator","faqs":"FAQ\'s","home-01":"Home 01","home-01-2":"Home 01-2","home-02":"Home 02","my-account":"My account","offer":"Offer","our-services":"Our Services","our-team":"Our Team","pricing":"Pricing","shop":"Shop","testimonials":"Testimonials","why-choose-us":"Why Choose Us","wishlist":"Wishlist"},"condition":{"video_btn_text!":"","video_btn_link_type":"page"}},{"name":"video_btn_link","label":"Link","type":"url","placeholder":"https:\/\/your-link.com","default":{"url":"#"},"condition":{"video_btn_text!":"","video_btn_link_type":"custom"}},{"name":"video_btn_type","label":"Mode","type":"select","default":"btn btn-fill","options":{"btn btn-fill":"Fill","btn btn-outline":"Outline","btn-text":"Just Text","btn-overlay":"Overlay"},"condition":{"video_btn_text!":""}},{"name":"video_btn_color","label":"Color","type":"select","default":"accent","options":{"default":"Default","accent":"Accent","primary":"Primary","secondary":"Secondary","white":"White"},"condition":{"video_btn_text!":"","video_btn_type":["btn btn-fill","btn btn-outline"]}},{"name":"video_btn_size","label":"Size","type":"select","default":"","options":{"xs":"Extra Small","sm":"Small","":"Default","md":"Medium","lg":"Large","xl":"Extra Large"},"condition":{"video_btn_text!":"","video_btn_type":["btn btn-fill","btn btn-outline"]}},{"name":"video_align","label":"Button Alignment","type":"choose","options":{"left":{"title":"Left","icon":"fa fa-align-left"},"center":{"title":"Center","icon":"fa fa-align-center"},"right":{"title":"Right","icon":"fa fa-align-right"},"justify":{"title":"Justified","icon":"fa fa-align-justify"}},"prefix_class":"text-","default":"","condition":{"video_btn_text!":""}},{"name":"video_btn_icon","label":"Icon","type":"icons","label_block":true,"fa4compatibility":"icon","condition":{"video_btn_text!":""}},{"name":"video_icon_align","label":"Icon Position","type":"select","default":"left","options":{"left":"Before","right":"After"},"condition":{"video_btn_text!":""}},{"name":"video_icon_indent","label":"Icon Spacing","type":"slider","range":{"px":{"min":5,"max":50}},"condition":{"video_btn_text!":""},"selectors":{"{{WRAPPER}} .cms-btn-icon.cms-align-icon-right":"margin-left: {{SIZE}}{{UNIT}};","{{WRAPPER}} .cms-btn-icon.cms-align-icon-left":"margin-right: {{SIZE}}{{UNIT}};"}}]}]}';
    protected $styles = array( 'magnific-popup' );
    protected $scripts = array( 'jquery','magnific-popup' );
}