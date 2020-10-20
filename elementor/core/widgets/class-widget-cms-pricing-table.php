<?php

class ETC_CmsPricingTable_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_pricing_table';
    protected $title = 'CMS Pricing Table';
    protected $icon = 'eicon-price-table';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"http:\/\/localhost\/soapee-demo\/wp-content\/themes\/soapee\/elementor\/templates\/widgets\/cms_pricing_table\/layout\/layout1.png"},"2":{"label":"Layout 2","image":"http:\/\/localhost\/soapee-demo\/wp-content\/themes\/soapee\/elementor\/templates\/widgets\/cms_pricing_table\/layout\/layout2.png"},"3":{"label":"Layout 3","image":"http:\/\/localhost\/soapee-demo\/wp-content\/themes\/soapee\/elementor\/templates\/widgets\/cms_pricing_table\/layout\/layout3.png"}},"prefix_class":"cms-pricing-layout-"}]},{"name":"pricing_table_title_section","label":"Title","tab":"content","condition":{"pricing_table_title_switcher":"true"},"controls":[{"name":"pricing_table_title_text","label":"Text","type":"text","default":"Basic","label_block":true},{"name":"image_before_title","label":"Image Before Title","type":"media","default":[],"label_block":true},{"name":"image_after_title","label":"Image After Title","type":"media","default":[],"label_block":true}]},{"name":"pricing_table_badge_section","label":"Badge","tab":"content","condition":{"pricing_table_badge_switcher":"true"},"controls":[{"name":"pricing_table_badge_text","label":"Text","type":"text","default":"Popular","label_block":true}]},{"name":"pricing_table_icon_section","tab":"content","label":"Icon","condition":{"pricing_table_icon_switcher":"true"},"controls":[{"name":"pricing_table_icon_selection","label":"Select an Icon","type":"icons","fa4compatibility":"icon","default":{"value":"fas fa-check","library":"fa-solid"}}]},{"name":"pricing_table_price_section","label":"Price","tab":"content","condition":{"pricing_table_price_switcher":"true"},"controls":[{"name":"pricing_table_slashed_price_value","label":"Slashed Price","type":"text","label_block":true},{"name":"pricing_table_price_currency","label":"Currency","type":"text","default":"$","label_block":true},{"name":"pricing_table_price_value","label":"Price","type":"text","default":"29","label_block":true},{"name":"pricing_table_price_separator","label":"Divider","type":"text","default":"","label_block":true},{"name":"pricing_table_price_duration","label":"Duration","type":"text","default":"Month","label_block":true}]},{"name":"pricing_table_list_section","label":"Pricing List","tab":"content","condition":{"pricing_table_list_switcher":"true"},"controls":[{"name":"fancy_text_list_items","label":"Features","type":"repeater","default":[{"pricing_list_item_icon":"","pricing_list_item_text":"1 Bathroom cleaning"},{"pricing_list_item_icon":"","pricing_list_item_text":"Up to 3 bedrooms cleaning"},{"pricing_list_item_icon":"","pricing_list_item_text":"1 Livingroom cleaning"},{"pricing_list_item_icon":"","pricing_list_item_text":"Small kitchen (0 \u2013 150 ft2)"},{"pricing_list_item_icon":"","pricing_list_item_text":"Pets hair removing"},{"pricing_list_item_icon":"","pricing_list_item_text":"Up to 2 additional rooms cleaning"}],"controls":[{"name":"pricing_list_item_text","label":"Text","type":"text","label_block":true},{"name":"pricing_list_item_icon","label":"Icon","type":"icons","fa4compatibility":"icon"}],"title_field":"<i class=\"{{ pricing_list_item_icon }}\" aria-hidden=\"true\"><\/i> {{{ pricing_list_item_text }}}"}]},{"name":"pricing_table_description_section","label":"Description","tab":"content","condition":{"pricing_table_description_switcher":"true"},"controls":[{"name":"pricing_table_description_text","label":"Description","type":"wysiwyg","default":"Lorem ipsum dolor sit amet, consectetur adipiscing elit"}]},{"name":"pricing_table_button_section","label":"Button","tab":"content","condition":{"pricing_table_button_switcher":"true"},"controls":[{"name":"btn_text","label":"Button Text","type":"text","default":"Start Cleaning","placeholder":"Read More","condition":[]},{"name":"btn_link_type","label":"Link Type","type":"select","default":"custom","options":{"custom":"Custom","page":"Internal Page"},"condition":{"btn_text!":""}},{"name":"btn_link_page","label":"Page Link","type":"select","default":"","options":{"about":"About Us","appointment":"Appointment","appointment-booking-profile":"Appointment Booking Profile","blog-archives":"Blog Archives","blog-grid":"Blog Grid","cart":"Cart","case-studies":"Case Studies","checkout":"Checkout","contact-us":"Contact Us","contact-us-02":"Contact Us 02","cost-calculator":"Cost Calculator","faqs":"FAQ\'s","home-01":"Home 01","home-01-2":"Home 01-2","home-02":"Home 02","my-account":"My account","offer":"Offer","our-services":"Our Services","our-team":"Our Team","pricing":"Pricing","shop":"Shop","testimonials":"Testimonials","why-choose-us":"Why Choose Us","wishlist":"Wishlist"},"condition":{"btn_text!":"","btn_link_type":"page"}},{"name":"btn_link","label":"Link","type":"url","placeholder":"https:\/\/your-link.com","default":{"url":"#"},"condition":{"btn_text!":"","btn_link_type":"custom"}},{"name":"btn_type","label":"Mode","type":"select","default":"btn btn-fill","options":{"btn btn-fill":"Fill","btn btn-outline":"Outline","btn-text":"Just Text","btn-overlay":"Overlay"},"condition":{"btn_text!":""}},{"name":"btn_color","label":"Color","type":"select","default":"accent","options":{"default":"Default","accent":"Accent","primary":"Primary","secondary":"Secondary","white":"White"},"condition":{"btn_text!":"","btn_type":["btn btn-fill","btn btn-outline"]}},{"name":"btn_size","label":"Size","type":"select","default":"","options":{"xs":"Extra Small","sm":"Small","":"Default","md":"Medium","lg":"Large","xl":"Extra Large"},"condition":{"btn_text!":"","btn_type":["btn btn-fill","btn btn-outline"]}},{"name":"align","label":"Button Alignment","type":"choose","options":{"left":{"title":"Left","icon":"fa fa-align-left"},"center":{"title":"Center","icon":"fa fa-align-center"},"right":{"title":"Right","icon":"fa fa-align-right"},"justify":{"title":"Justified","icon":"fa fa-align-justify"}},"prefix_class":"text-","default":"","condition":{"btn_text!":""}},{"name":"btn_icon","label":"Icon","type":"icons","label_block":true,"fa4compatibility":"icon","condition":{"btn_text!":""}},{"name":"icon_align","label":"Icon Position","type":"select","default":"left","options":{"left":"Before","right":"After"},"condition":{"btn_text!":""}},{"name":"icon_indent","label":"Icon Spacing","type":"slider","range":{"px":{"min":5,"max":50}},"condition":{"btn_text!":""},"selectors":{"{{WRAPPER}} .cms-btn-icon.cms-align-icon-right":"margin-left: {{SIZE}}{{UNIT}};","{{WRAPPER}} .cms-btn-icon.cms-align-icon-left":"margin-right: {{SIZE}}{{UNIT}};"}}]},{"name":"pricing_table_title","label":"Display Options","tab":"content","controls":[{"name":"pricing_table_icon_switcher","label":"Icon","type":"switcher"},{"name":"pricing_table_title_switcher","label":"Title","type":"switcher","default":"true"},{"name":"pricing_table_price_switcher","label":"Price","type":"switcher","default":"true"},{"name":"pricing_table_list_switcher","label":"Features","type":"switcher","default":"true"},{"name":"pricing_table_description_switcher","label":"Description","type":"switcher"},{"name":"pricing_table_button_switcher","label":"Button","type":"switcher","default":"true"},{"name":"pricing_table_badge_switcher","label":"Badge","type":"switcher"}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}