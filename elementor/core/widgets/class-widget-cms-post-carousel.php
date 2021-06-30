<?php

class ETC_CmsPostCarousel_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_post_carousel';
    protected $title = 'CMS Posts Carousel';
    protected $icon = 'eicon-posts-carousel';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"section_slick_slider_settings","label":"Carousel Settings","tab":"layout","controls":[{"name":"slide_rows","label":"Rows","description":"Setting this to more than 1 initializes grid mode. Use slidesPerRow to set how many slides should be in each row.","type":"select","options":{"1":"1","2":"2","3":"3","4":"4"},"control_type":"responsive","default":"1"},{"name":"slide_mode","label":"Slide mode","type":"select","options":{"true":"Fade","false":"Slide"},"default":"false"},{"name":"slides_to_show","label":"Slides to Show","type":"select","control_type":"responsive","default":"","options":{"":"Default","1":1,"2":2,"3":3,"4":4,"5":5,"6":6,"7":7,"8":8,"9":9,"10":10},"condition":{"slide_mode":"false"}},{"name":"slides_to_scroll","label":"Slides to Scroll","type":"select","control_type":"responsive","default":"","options":{"":"Default","1":1,"2":2,"3":3,"4":4,"5":5,"6":6,"7":7,"8":8,"9":9,"10":10},"condition":{"slide_mode":"false","slides_to_show!":"1"}},{"name":"slides_gutter","label":"Gutter","type":"number","default":30},{"name":"arrows","label":"Show Arrows","type":"switcher","control_type":"responsive"},{"name":"arrows_pos","label":"Arrows Position","type":"select","control_type":"responsive","default":"in-vertical","options":{"in-vertical":"Inside Vertical","out-vertical":"Outside Vertical"},"condition":{"arrows":"true"},"prefix_class":"cms-slick-nav-","separator":"before"},{"name":"dots","label":"Show Dots","type":"switcher","control_type":"responsive","default":"true"},{"name":"dots_pos","label":"Dots Position","type":"select","control_type":"responsive","default":"out","options":{"in":"Inside","out":"Outside"},"condition":{"dots":"true"},"prefix_class":"cms-slick-dots-","separator":"before"},{"name":"pause_on_hover","label":"Pause on Hover","type":"switcher"},{"name":"autoplay","label":"Autoplay","type":"switcher","default":"true"},{"name":"autoplay_speed","label":"Autoplay Speed","type":"number","default":2000,"condition":{"autoplay":"true"}},{"name":"infinite","label":"Infinite Loop","type":"switcher"},{"name":"speed","label":"Animation Speed","type":"number","default":500}],"condition":[]},{"name":"layout_section","label":"Items Layout","tab":"layout","controls":[{"name":"item_layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"http:\/\/localhost\/soapee\/wp-content\/themes\/soapee\/elementor\/templates\/layouts\/posts\/layout1.png"},"2":{"label":"Layout 2","image":"http:\/\/localhost\/soapee\/wp-content\/themes\/soapee\/elementor\/templates\/layouts\/posts\/layout2.png"},"3":{"label":"Layout 3","image":"http:\/\/localhost\/soapee\/wp-content\/themes\/soapee\/elementor\/templates\/layouts\/posts\/layout3.png"},"4":{"label":"Layout 4","image":"http:\/\/localhost\/soapee\/wp-content\/themes\/soapee\/elementor\/templates\/layouts\/posts\/layout4.png"},"5":{"label":"Layout 5","image":"http:\/\/localhost\/soapee\/wp-content\/themes\/soapee\/elementor\/templates\/layouts\/posts\/layout5.png"},"6":{"label":"Layout 6","image":"http:\/\/localhost\/soapee\/wp-content\/themes\/soapee\/elementor\/templates\/layouts\/posts\/layout6.png"}},"prefix_class":"cms-post-layout-"}]},{"name":"source_section","label":"Source","tab":"content","controls":[{"name":"post_type","label":"Select Post Type","type":"select","multiple":true,"options":{"post":"Post","cms-case-study":"CMS Case Study","cms-service":"CMS Service","product":"Product"},"default":"post"},{"name":"source_post","label":"Select Term of Post","type":"select2","multiple":true,"options":{"carpet-cleaning|category":"Carpet Cleaning","move-in-out-cleaning|category":"Move In \u2013 Out Cleaning","office-cleaning|category":"Office Cleaning","post-construction-cleaning|category":"Post Construction Cleaning","recurring-cleaning|category":"Recurring Cleaning","daily-inspiration|post_tag":"Daily Inspiration","echo-bio-power|post_tag":"Echo &amp; Bio Power","fuel-gas|post_tag":"Fuel &amp; Gas","housekeeping|post_tag":"Housekeeping","power-energy-sector|post_tag":"Power &amp; Energy Sector","welding-engineering|post_tag":"Welding Engineering"},"condition":{"post_type":["post"]}},{"name":"source_cms-case-study","label":"Select Term of CMS Case Study","type":"select2","multiple":true,"options":[],"condition":{"post_type":["cms-case-study"]}},{"name":"source_cms-service","label":"Select Term of CMS Service","type":"select2","multiple":true,"options":{"cleaning-commercial-areas|service-category":"Cleaning Commercial Areas","cleaning-garden|service-category":"Cleaning Garden","cleaning-studio|service-category":"Cleaning Studio","company-cleaning|service-category":"Company Cleaning","house-cleaning|service-category":"House Cleaning"},"condition":{"post_type":["cms-service"]}},{"name":"source_product","label":"Select Term of Product","type":"select2","multiple":true,"options":{"external|product_type":"external","grouped|product_type":"grouped","simple|product_type":"simple","variable|product_type":"variable","rated-5|product_visibility":"rated-5","cleaning-home|product_cat":"Cleaning Home","special-offers|product_cat":"Special Offers","cleaner|product_tag":"Cleaner","cleaning-home|product_tag":"Cleaning Home","furniture|product_tag":"Furniture","minimum-of-4-hours-per-cleaning-visit|pa_offer":"Minimum of 4 hours per cleaning visit."},"condition":{"post_type":["product"]}},{"name":"orderby","label":"Order By","type":"select","default":"date","options":{"date":"Date","ID":"ID","author":"Author","title":"Title","rand":"Random"}},{"name":"order","label":"Sort Order","type":"select","default":"desc","options":{"desc":"Descending","asc":"Ascending"}},{"name":"limit","label":"Total items","type":"number","default":"6"}]},{"name":"thumbnail_section","label":"Thumbnail Options","tab":"content","controls":[{"name":"thumbnail","type":"image-size","control_type":"group","default":"medium"}]},{"name":"excerpt_section","label":"Excerpt Options","tab":"content","controls":[{"name":"excerpt_lenght","label":"Excerpt lenght","type":"number","default":25,"separator":"after"},{"name":"excerpt_more_text","label":"Excerpt more text","type":"text","default":"...","separator":"after"}]},{"name":"readmore_section","label":"Read More Options","tab":"content","controls":[{"name":"btn_text","label":"Button Text","type":"text","default":"Read More","placeholder":"Read More","condition":[]},{"name":"btn_link_type","label":"Link Type","type":"select","default":"post","options":{"custom":"Custom","page":"Internal Page","post":"Post Detail"},"condition":{"btn_text!":""}},{"name":"btn_link_page","label":"Page Link","type":"select","default":"","options":{"about":"About Us","appointment":"Appointment","appointment-booking-profile":"Appointment Booking Profile","blog":"Blog","cart":"Cart","case-studies":"Case Studies","checkout":"Checkout","contact-us":"Contact Us","cost-calculator":"Cost Calculator","faqs":"FAQ\'s","home-01":"Home 01","home-01-2":"Home 01-2","home-02":"Home 02","my-account":"My account","offer":"Offer","our-services":"Our Services","our-team":"Our Team","pricing":"Pricing","shop":"Shop","testimonials":"Testimonials","why-choose-us":"Why Choose Us","wishlist":"Wishlist"},"condition":{"btn_text!":"","btn_link_type":"page"}},{"name":"btn_link","label":"Link","type":"url","placeholder":"https:\/\/your-link.com","default":{"url":"#"},"condition":{"btn_text!":"","btn_link_type":"custom"}},{"name":"btn_type","label":"Mode","type":"select","default":"btn btn-fill","options":{"btn btn-fill":"Fill","btn btn-outline":"Outline","btn-text":"Just Text","btn-overlay":"Overlay"},"condition":{"btn_text!":""}},{"name":"btn_color","label":"Color","type":"select","default":"accent","options":{"default":"Default","accent":"Accent","primary":"Primary","secondary":"Secondary","white":"White"},"condition":{"btn_text!":"","btn_type":["btn btn-fill","btn btn-outline"]}},{"name":"btn_size","label":"Size","type":"select","default":"","options":{"xs":"Extra Small","sm":"Small","":"Default","md":"Medium","lg":"Large","xl":"Extra Large"},"condition":{"btn_text!":"","btn_type":["btn btn-fill","btn btn-outline"]}},{"name":"align","label":"Button Alignment","type":"choose","options":{"left":{"title":"Left","icon":"fa fa-align-left"},"center":{"title":"Center","icon":"fa fa-align-center"},"right":{"title":"Right","icon":"fa fa-align-right"},"justify":{"title":"Justified","icon":"fa fa-align-justify"}},"prefix_class":"text-","default":"","condition":{"btn_text!":""}},{"name":"btn_icon","label":"Icon","type":"icons","label_block":true,"fa4compatibility":"icon","condition":{"btn_text!":""}},{"name":"icon_align","label":"Icon Position","type":"select","default":"left","options":{"left":"Before","right":"After"},"condition":{"btn_text!":""}},{"name":"icon_indent","label":"Icon Spacing","type":"slider","range":{"px":{"min":5,"max":50}},"condition":{"btn_text!":""},"selectors":{"{{WRAPPER}} .cms-btn-icon.cms-align-icon-right":"margin-left: {{SIZE}}{{UNIT}};","{{WRAPPER}} .cms-btn-icon.cms-align-icon-left":"margin-right: {{SIZE}}{{UNIT}};"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'jquery-slick','cms-slick-slider' );
}