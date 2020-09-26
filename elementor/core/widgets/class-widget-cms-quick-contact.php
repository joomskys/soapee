<?php

class ETC_CmsQuickContact_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_quick_contact';
    protected $title = 'CMS Quick Contact';
    protected $icon = 'eicon-mail';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"https:\/\/demo.cmssuperheroes.com\/themeforest\/soapee\/wp-content\/themes\/soapee\/elementor\/templates\/widgets\/cms_quick_contact\/layout-image\/layout1.png"},"2":{"label":"Layout 2","image":"https:\/\/demo.cmssuperheroes.com\/themeforest\/soapee\/wp-content\/themes\/soapee\/elementor\/templates\/widgets\/cms_quick_contact\/layout-image\/layout2.png"}}}]},{"name":"source_section","label":"Source Settings","tab":"content","controls":[{"name":"heading_text","label":"Heading","type":"text","default":"Book Directly Or You Have Questions","placeholder":"Enter your title","label_block":true},{"name":"description_text","label":"Description","type":"textarea","default":"Would you like to talk to us over the phone? Just submit your information and we will contact you shortly. You can also email us if you wish","placeholder":"Enter your description","rows":10,"show_label":false},{"name":"contact_list","label":"Contact Lists","type":"repeater","controls":[{"name":"contact_list_title_1","label":"Title 1","type":"text","placeholder":"Enter your text","default":"Enter your text","label_block":true},{"name":"contact_list_text_1","label":"Text 1","type":"text","placeholder":"Enter your text","default":"Enter your text","label_block":true},{"name":"contact_list_title_2","label":"Title 2","type":"text","placeholder":"Enter your text","default":"Enter your text","label_block":true},{"name":"contact_list_text_2","label":"Text 2","type":"text","placeholder":"Enter your text","default":"Enter your text","label_block":true},{"name":"contact_list_icon","label":"Icon","type":"icons","fa4compatibility":"icon","default":[]}],"default":[{"contact_list_title_1":"Address:","contact_list_text_1":"Fargo Bank, 355 S Grand Ave, Suite 100 San Francisco, LA 94107 United States","contact_list_title_2":"","contact_list_text_2":"","contact_list_icon":{"value":"fas fa-map-marker","library":"fa-solid"}},{"contact_list_title_1":"Mail:","contact_list_text_1":"info@cmssuperheros.com","contact_list_title_2":"Phone:","contact_list_text_2":"01692 333 555 (Free Consulting 24 \/ 7)","contact_list_icon":{"value":"fas fa-mail-box","library":"fa-solid"}},{"contact_list_title_1":"Open:","contact_list_text_1":"Monday - Friday: 8.00am - 7.00pm","contact_list_title_2":"Close:","contact_list_text_2":"Saturday - Sunday - Holiday","contact_list_icon":{"value":"fas fa-clock","library":"fa-solid"}}],"title_field":"{{{ contact_list_title_1 }}} {{{ contact_list_text_1 }}}"},{"name":"btn_text","label":"Button Text","type":"text","default":"","placeholder":"Read More","condition":[]},{"name":"btn_link_type","label":"Link Type","type":"select","default":"custom","options":{"custom":"Custom","page":"Internal Page"},"condition":{"btn_text!":""}},{"name":"btn_link_page","label":"Page Link","type":"select","default":"","options":{"about":"About Us","appointment":"Appointment","appointment-booking-profile":"Appointment Booking Profile","blog":"Blog","cart":"Cart","case-studies":"Case Studies","checkout":"Checkout","contact-us":"Contact Us","cost-calculator":"Cost Calculator","faqs":"FAQ\'s","home-01":"Home 01","home-01-2":"Home 01-2","home-02":"Home 02","my-account":"My account","offer":"Offer","our-services":"Our Services","our-team":"Our Team","pricing":"Pricing","shop":"Shop","testimonials":"Testimonials","why-choose-us":"Why Choose Us","wishlist":"Wishlist"},"condition":{"btn_text!":"","btn_link_type":"page"}},{"name":"btn_link","label":"Link","type":"url","placeholder":"https:\/\/your-link.com","default":{"url":"#"},"condition":{"btn_text!":"","btn_link_type":"custom"}},{"name":"btn_type","label":"Mode","type":"select","default":"btn btn-fill","options":{"btn btn-fill":"Fill","btn btn-outline":"Outline","btn-text":"Just Text","btn-overlay":"Overlay"},"condition":{"btn_text!":""}},{"name":"btn_color","label":"Color","type":"select","default":"accent","options":{"default":"Default","accent":"Accent","primary":"Primary","secondary":"Secondary","white":"White"},"condition":{"btn_text!":"","btn_type":["btn btn-fill","btn btn-outline"]}},{"name":"btn_size","label":"Size","type":"select","default":"","options":{"xs":"Extra Small","sm":"Small","":"Default","md":"Medium","lg":"Large","xl":"Extra Large"},"condition":{"btn_text!":"","btn_type":["btn btn-fill","btn btn-outline"]}},{"name":"align","label":"Button Alignment","type":"choose","options":{"left":{"title":"Left","icon":"fa fa-align-left"},"center":{"title":"Center","icon":"fa fa-align-center"},"right":{"title":"Right","icon":"fa fa-align-right"},"justify":{"title":"Justified","icon":"fa fa-align-justify"}},"prefix_class":"text-","default":"","condition":{"btn_text!":""}},{"name":"btn_icon","label":"Icon","type":"icons","label_block":true,"fa4compatibility":"icon","condition":{"btn_text!":""}},{"name":"icon_align","label":"Icon Position","type":"select","default":"left","options":{"left":"Before","right":"After"},"condition":{"btn_text!":""}},{"name":"icon_indent","label":"Icon Spacing","type":"slider","range":{"px":{"min":5,"max":50}},"condition":{"btn_text!":""},"selectors":{"{{WRAPPER}} .cms-btn-icon.cms-align-icon-right":"margin-left: {{SIZE}}{{UNIT}};","{{WRAPPER}} .cms-btn-icon.cms-align-icon-left":"margin-right: {{SIZE}}{{UNIT}};"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}