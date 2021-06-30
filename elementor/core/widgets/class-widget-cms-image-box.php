<?php

class ETC_CmsImageBox_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_image_box';
    protected $title = 'CMS Image Box';
    protected $icon = 'eicon-image-box';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"http:\/\/localhost\/soapee\/wp-content\/themes\/soapee\/elementor\/templates\/widgets\/cms_image_box\/layout\/layout1.png"},"2":{"label":"Layout 2","image":"http:\/\/localhost\/soapee\/wp-content\/themes\/soapee\/elementor\/templates\/widgets\/cms_image_box\/layout\/layout2.png"}},"prefix_class":"cms-image-box-layout-"},{"name":"image_size","type":"image-size","control_type":"group","default":"custom","custom_dimension":{"width":201,"height":179}}]},{"name":"img_list","label":"Image Box","tab":"content","controls":[{"name":"image","label":"Image","type":"media","label_block":true},{"name":"feature_title","label":"Title","type":"text","label_block":true,"default":"Enter your Title"},{"name":"feature_lists","label":"Add your feature list","type":"repeater","default":[{"feature_list":"Dust all accessible surfaces"},{"feature_list":"Wipe down all mirrors and glass fixtures"},{"feature_list":"Clean all floor surfaces"},{"feature_list":"Take out garbage and recycling"}],"controls":[{"name":"feature_list","label":"Feature title","type":"text","label_block":true,"default":"Enter your text"}],"condition":{"layout":["1"]},"title_field":"{{{ feature_list }}}"}]},{"name":"img_button","label":"Button","tab":"content","controls":[{"name":"btn_text","label":"Button Text","type":"text","default":"","placeholder":"Read More","condition":[]},{"name":"btn_link_type","label":"Link Type","type":"select","default":"custom","options":{"custom":"Custom","page":"Internal Page"},"condition":{"btn_text!":""}},{"name":"btn_link_page","label":"Page Link","type":"select","default":"","options":{"about":"About Us","appointment":"Appointment","appointment-booking-profile":"Appointment Booking Profile","blog":"Blog","cart":"Cart","case-studies":"Case Studies","checkout":"Checkout","contact-us":"Contact Us","cost-calculator":"Cost Calculator","faqs":"FAQ\'s","home-01":"Home 01","home-01-2":"Home 01-2","home-02":"Home 02","my-account":"My account","offer":"Offer","our-services":"Our Services","our-team":"Our Team","pricing":"Pricing","shop":"Shop","testimonials":"Testimonials","why-choose-us":"Why Choose Us","wishlist":"Wishlist"},"condition":{"btn_text!":"","btn_link_type":"page"}},{"name":"btn_link","label":"Link","type":"url","placeholder":"https:\/\/your-link.com","default":{"url":"#"},"condition":{"btn_text!":"","btn_link_type":"custom"}},{"name":"btn_type","label":"Mode","type":"select","default":"btn btn-fill","options":{"btn btn-fill":"Fill","btn btn-outline":"Outline","btn-text":"Just Text","btn-overlay":"Overlay"},"condition":{"btn_text!":""}},{"name":"btn_color","label":"Color","type":"select","default":"accent","options":{"default":"Default","accent":"Accent","primary":"Primary","secondary":"Secondary","white":"White"},"condition":{"btn_text!":"","btn_type":["btn btn-fill","btn btn-outline"]}},{"name":"btn_size","label":"Size","type":"select","default":"","options":{"xs":"Extra Small","sm":"Small","":"Default","md":"Medium","lg":"Large","xl":"Extra Large"},"condition":{"btn_text!":"","btn_type":["btn btn-fill","btn btn-outline"]}},{"name":"align","label":"Button Alignment","type":"choose","options":{"left":{"title":"Left","icon":"fa fa-align-left"},"center":{"title":"Center","icon":"fa fa-align-center"},"right":{"title":"Right","icon":"fa fa-align-right"},"justify":{"title":"Justified","icon":"fa fa-align-justify"}},"prefix_class":"text-","default":"","condition":{"btn_text!":""}},{"name":"btn_icon","label":"Icon","type":"icons","label_block":true,"fa4compatibility":"icon","condition":{"btn_text!":""}},{"name":"icon_align","label":"Icon Position","type":"select","default":"left","options":{"left":"Before","right":"After"},"condition":{"btn_text!":""}},{"name":"icon_indent","label":"Icon Spacing","type":"slider","range":{"px":{"min":5,"max":50}},"condition":{"btn_text!":""},"selectors":{"{{WRAPPER}} .cms-btn-icon.cms-align-icon-right":"margin-left: {{SIZE}}{{UNIT}};","{{WRAPPER}} .cms-btn-icon.cms-align-icon-left":"margin-right: {{SIZE}}{{UNIT}};"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}