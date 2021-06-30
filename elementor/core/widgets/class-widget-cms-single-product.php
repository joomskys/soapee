<?php

class ETC_CmsSingleProduct_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_single_product';
    protected $title = 'CMS Single Product';
    protected $icon = 'eicon-single-product';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"section_layout","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"http:\/\/localhost\/soapee\/wp-content\/themes\/soapee\/elementor\/templates\/widgets\/cms_single_product\/layout-img\/layout1.png"}},"prefix_class":"cms-single-product-"}]},{"name":"section_product","label":"Product","tab":"content","controls":[{"name":"product_id","label":"Choose your product","type":"select","options":{"680":"Granite & Marble","679":"Pledge Multisurface Cleaner","678":"Clean & Glide","677":"Oxi Clean","676":"Emerald Clean","675":"Pledge Clean Floor Cleaner","673":"Pledge Clean Floor Cleaner","672":"Emerald Clean","671":"Oxi Clean","670":"Clean & Glide","669":"Pledge multisurface cleaner","662":"Granite & Marble","660":"Product 10","356":"Exclusive Offer - Spring Cleaning Service 20% OFF","355":"Special Offer - Refer a Friend Get Any Our cleaning service 10% OFF","342":"Big Discount 50% for all services on National Day"},"default":""},{"name":"normal_price_label","label":"Normal Price Label","type":"text","default":"Normal Price:"},{"name":"normal_price_suffix","label":"Normal Price Suffix","type":"text","default":"per hour"},{"name":"sale_price_label","label":"Sale Price Label","type":"text","default":"Preferential Price:"},{"name":"sale_price_suffix","label":"Normal Price Suffix","type":"text","default":"per hour"},{"name":"required_label","label":"Request Label","type":"text","default":"Request:"},{"name":"required_text","label":"Request Text","type":"text","default":"Minimum of 4 hours per cleaning visit"},{"name":"expires_date_label","label":"Expires Date Label","type":"text","default":"Expires Date:"},{"name":"add_to_cart_type","label":"Button Type","type":"select","options":{"add_to_cart":"Add to cart","view_detail":"View Detail","page":"Internal Page"},"default":"add_to_cart"},{"name":"add_to_cart_link","label":"Link","type":"select","default":"","options":{"about":"About Us","appointment":"Appointment","appointment-booking-profile":"Appointment Booking Profile","blog":"Blog","cart":"Cart","case-studies":"Case Studies","checkout":"Checkout","contact-us":"Contact Us","cost-calculator":"Cost Calculator","faqs":"FAQ\'s","home-01":"Home 01","home-01-2":"Home 01-2","home-02":"Home 02","my-account":"My account","offer":"Offer","our-services":"Our Services","our-team":"Our Team","pricing":"Pricing","shop":"Shop","testimonials":"Testimonials","why-choose-us":"Why Choose Us","wishlist":"Wishlist"},"condition":{"add_to_cart_type":"page"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}