<?php
class CMS_Estimate extends WP_Widget {

    function __construct() {
        parent::__construct(
            'cms_estimate_widget', // Base ID
            esc_html__('*CMS Free Estimate', 'soapee'), // Name
            array('description' => esc_html__('Add quick estimate info', 'soapee'),) // Args
        );
    }

    function widget($args, $instance) {
        global $woocommerce;

        extract($args);
        if (!empty($instance['title'])) {
            $title = apply_filters('widget_title', empty($instance['title']) ? esc_html__('Social', 'soapee' ) : $instance['title'], $instance, $this->id_base);
        }

        $icon_phone = 'zmdi zmdi-phone-msg';
        $text_phone = isset($instance['text_phone']) ? $instance['text_phone'] : '';

        $text_desc = isset($instance['text_desc']) ? $instance['text_desc'] : '';
        $text_page = isset($instance['text_page']) ? $instance['text_page'] : '';
        
        // no 'class' attribute - add one with the value of width
        if( strpos($before_widget, 'class') === false ) {
            $before_widget = str_replace('>', $before_widget);
        }

        printf( '%s', $before_widget);

        if (!empty($title)) printf('%1$s%2$s%3$s', $before_title , $title , $after_title);

            echo "<div class='cms-estimate'>";

                if ($text_phone != '') {
                    echo '<div class="cms-estimate-item text-30 text-secondary cms-heading h3 font-700"><span class="cms-estimate-icon '.$icon_phone.'"></span><span class="cms-estimate-text">'.esc_html($text_phone).'</span></div>';
                }

                if ($text_desc != '') {
                    echo '<div class="cms-estimate-item pt-20"><span class="cms-estimate-text">'.esc_html($text_desc).'</span></div>';
                }

                if ($text_page != '0') {
                    echo '<a href="'.get_permalink( get_page_by_path( $text_page ) ).'" class="btn btn-secondary mt-15">'.esc_html__('Request An Free Estimate', 'soapee').'</a>';
                }

            echo "</div>";

         printf( '%s',$after_widget);
    }

    function update( $new_instance, $old_instance ) {
         $instance = $old_instance;
         $instance['title'] = strip_tags($new_instance['title']);

         $instance['text_phone']   = strip_tags($new_instance['text_phone']);
         $instance['text_desc']   = strip_tags($new_instance['text_desc']);
         $instance['text_page']   = strip_tags($new_instance['text_page']);
        

         return $instance;
    }

    function form( $instance ) {
         $title = isset($instance['title']) ? esc_attr($instance['title']) : '';

         $text_phone   = isset($instance['text_phone']) ? esc_attr($instance['text_phone']) : '';
         $text_desc   = isset($instance['text_desc']) ? esc_attr($instance['text_desc']) : '';
         $text_page   = isset($instance['text_page']) ? esc_attr($instance['text_page']) : '';
    
         ?>
         <p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title:', 'soapee' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('text_phone')); ?>"><?php esc_html_e( 'Phone Number:', 'soapee' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('text_phone') ); ?>" name="<?php echo esc_attr( $this->get_field_name('text_phone') ); ?>" type="text" value="<?php echo esc_attr( $text_phone ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('text_desc')); ?>"><?php esc_html_e( 'Description :', 'soapee' ); ?></label>
            <textarea id="<?php echo esc_attr($this->get_field_id( 'text_desc' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'text_desc' )); ?>" row="50" cols="45" style="width: 100%;"><?php echo esc_textarea( $instance['text_desc'] ); ?></textarea></p>

        <p><label for="<?php echo esc_attr($this->get_field_id('text_page')); ?>"><?php esc_html_e( 'Select a page :', 'soapee' ); ?></label>
        <select id="<?php echo esc_attr($this->get_field_id( 'text_page' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'text_page' )); ?>" style="width: 100%;">
            <option value="0"><?php esc_html_e( '&mdash; Select &mdash;','soapee' ); ?></option>
            <?php
                $pages = get_pages(array('hierarchical' => 0, 'posts_per_page' => '-1'));
                foreach($pages as $page){
                    echo '<option value="'.$page->post_name.'" '.selected( $text_page, $page->post_name ).'>'. esc_html($page->post_title).'</option>';
                }
        ?></select>

            
    </p>
    <?php
    }

}

/**
* Class CMS_Quick_Contact
*/

function register_estimate_widget() {
    if(function_exists('etc_register_wp_widget')) {
        etc_register_wp_widget('CMS_Estimate');
    }
}
add_action('widgets_init', 'register_estimate_widget');