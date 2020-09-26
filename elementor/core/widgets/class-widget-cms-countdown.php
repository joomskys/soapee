<?php

class ETC_CmsCountdown_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_countdown';
    protected $title = 'CMS Countdown';
    protected $icon = 'eicon-countdown';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"https:\/\/demo.cmssuperheroes.com\/themeforest\/soapee\/wp-content\/themes\/soapee\/elementor\/templates\/widgets\/cms_countdown\/layout-image\/layout1.png"}},"prefix_class":"cms-countdown-layout-"}]},{"name":"content_section","label":"Time to","tab":"content","controls":[{"name":"title_text","label":"Title","type":"text","default":"Enter your title","placeholder":"Enter your title","label_block":true},{"name":"pre_text","label":"Pre Text","type":"text","default":"Offer Valid Until","placeholder":"Offer Valid Until","label_block":true},{"name":"time_to","label":"Choose your time","type":"date_time","default":"","label_block":true}]},{"name":"button1_section","label":"Button 1 Settings","tab":"content","controls":[{"name":"button1_btn_text","label":"Button Text","type":"text","default":"","placeholder":"Read More","condition":[]},{"name":"button1_btn_link_type","label":"Link Type","type":"select","default":"custom","options":{"custom":"Custom","page":"Internal Page"},"condition":{"button1_btn_text!":""}},{"name":"button1_btn_link_page","label":"Page Link","type":"select","default":"","options":{"about":"About Us","appointment":"Appointment","appointment-booking-profile":"Appointment Booking Profile","blog":"Blog","cart":"Cart","case-studies":"Case Studies","checkout":"Checkout","contact-us":"Contact Us","cost-calculator":"Cost Calculator","faqs":"FAQ\'s","home-01":"Home 01","home-01-2":"Home 01-2","home-02":"Home 02","my-account":"My account","offer":"Offer","our-services":"Our Services","our-team":"Our Team","pricing":"Pricing","shop":"Shop","testimonials":"Testimonials","why-choose-us":"Why Choose Us","wishlist":"Wishlist"},"condition":{"button1_btn_text!":"","button1_btn_link_type":"page"}},{"name":"button1_btn_link","label":"Link","type":"url","placeholder":"https:\/\/your-link.com","default":{"url":"#"},"condition":{"button1_btn_text!":"","button1_btn_link_type":"custom"}},{"name":"button1_btn_type","label":"Mode","type":"select","default":"btn btn-fill","options":{"btn btn-fill":"Fill","btn btn-outline":"Outline","btn-text":"Just Text","btn-overlay":"Overlay"},"condition":{"button1_btn_text!":""}},{"name":"button1_btn_color","label":"Color","type":"select","default":"accent","options":{"default":"Default","accent":"Accent","primary":"Primary","secondary":"Secondary","white":"White"},"condition":{"button1_btn_text!":"","button1_btn_type":["btn btn-fill","btn btn-outline"]}},{"name":"button1_btn_size","label":"Size","type":"select","default":"","options":{"xs":"Extra Small","sm":"Small","":"Default","md":"Medium","lg":"Large","xl":"Extra Large"},"condition":{"button1_btn_text!":"","button1_btn_type":["btn btn-fill","btn btn-outline"]}},{"name":"button1_align","label":"Button Alignment","type":"choose","options":{"left":{"title":"Left","icon":"fa fa-align-left"},"center":{"title":"Center","icon":"fa fa-align-center"},"right":{"title":"Right","icon":"fa fa-align-right"},"justify":{"title":"Justified","icon":"fa fa-align-justify"}},"prefix_class":"text-","default":"","condition":{"button1_btn_text!":""}},{"name":"button1_btn_icon","label":"Icon","type":"icons","label_block":true,"fa4compatibility":"icon","condition":{"button1_btn_text!":""}},{"name":"button1_icon_align","label":"Icon Position","type":"select","default":"left","options":{"left":"Before","right":"After"},"condition":{"button1_btn_text!":""}},{"name":"button1_icon_indent","label":"Icon Spacing","type":"slider","range":{"px":{"min":5,"max":50}},"condition":{"button1_btn_text!":""},"selectors":{"{{WRAPPER}} .cms-btn-icon.cms-align-icon-right":"margin-left: {{SIZE}}{{UNIT}};","{{WRAPPER}} .cms-btn-icon.cms-align-icon-left":"margin-right: {{SIZE}}{{UNIT}};"}}]},{"name":"button2_section","label":"Button 2 Settings","tab":"content","controls":[{"name":"button2_btn_text","label":"Button Text","type":"text","default":"","placeholder":"Read More","condition":[]},{"name":"button2_btn_link_type","label":"Link Type","type":"select","default":"custom","options":{"custom":"Custom","page":"Internal Page"},"condition":{"button2_btn_text!":""}},{"name":"button2_btn_link_page","label":"Page Link","type":"select","default":"","options":{"about":"About Us","appointment":"Appointment","appointment-booking-profile":"Appointment Booking Profile","blog":"Blog","cart":"Cart","case-studies":"Case Studies","checkout":"Checkout","contact-us":"Contact Us","cost-calculator":"Cost Calculator","faqs":"FAQ\'s","home-01":"Home 01","home-01-2":"Home 01-2","home-02":"Home 02","my-account":"My account","offer":"Offer","our-services":"Our Services","our-team":"Our Team","pricing":"Pricing","shop":"Shop","testimonials":"Testimonials","why-choose-us":"Why Choose Us","wishlist":"Wishlist"},"condition":{"button2_btn_text!":"","button2_btn_link_type":"page"}},{"name":"button2_btn_link","label":"Link","type":"url","placeholder":"https:\/\/your-link.com","default":{"url":"#"},"condition":{"button2_btn_text!":"","button2_btn_link_type":"custom"}},{"name":"button2_btn_type","label":"Mode","type":"select","default":"btn btn-fill","options":{"btn btn-fill":"Fill","btn btn-outline":"Outline","btn-text":"Just Text","btn-overlay":"Overlay"},"condition":{"button2_btn_text!":""}},{"name":"button2_btn_color","label":"Color","type":"select","default":"accent","options":{"default":"Default","accent":"Accent","primary":"Primary","secondary":"Secondary","white":"White"},"condition":{"button2_btn_text!":"","button2_btn_type":["btn btn-fill","btn btn-outline"]}},{"name":"button2_btn_size","label":"Size","type":"select","default":"","options":{"xs":"Extra Small","sm":"Small","":"Default","md":"Medium","lg":"Large","xl":"Extra Large"},"condition":{"button2_btn_text!":"","button2_btn_type":["btn btn-fill","btn btn-outline"]}},{"name":"button2_align","label":"Button Alignment","type":"choose","options":{"left":{"title":"Left","icon":"fa fa-align-left"},"center":{"title":"Center","icon":"fa fa-align-center"},"right":{"title":"Right","icon":"fa fa-align-right"},"justify":{"title":"Justified","icon":"fa fa-align-justify"}},"prefix_class":"text-","default":"","condition":{"button2_btn_text!":""}},{"name":"button2_btn_icon","label":"Icon","type":"icons","label_block":true,"fa4compatibility":"icon","condition":{"button2_btn_text!":""}},{"name":"button2_icon_align","label":"Icon Position","type":"select","default":"left","options":{"left":"Before","right":"After"},"condition":{"button2_btn_text!":""}},{"name":"button2_icon_indent","label":"Icon Spacing","type":"slider","range":{"px":{"min":5,"max":50}},"condition":{"button2_btn_text!":""},"selectors":{"{{WRAPPER}} .cms-btn-icon.cms-align-icon-right":"margin-left: {{SIZE}}{{UNIT}};","{{WRAPPER}} .cms-btn-icon.cms-align-icon-left":"margin-right: {{SIZE}}{{UNIT}};"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'cms-countdown' );
}