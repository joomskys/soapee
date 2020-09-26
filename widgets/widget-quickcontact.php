<?php
class CMS_Quick_Contact extends WP_Widget {
    function __construct() {
        parent::__construct(
            'cms_quickcontact_widget', // Base ID
            esc_html__('*CMS Quick Contact', 'soapee'), // Name
            array('description' => esc_html__('Add quick contact info', 'soapee'),) // Args
        );
    }
    function widget($args, $instance) {
        extract($args);
        if (!empty($instance['title'])) {
            $title = apply_filters('widget_title', empty($instance['title']) ? esc_html__('CMS Quick Contact', 'soapee' ) : $instance['title'], $instance, $this->id_base);
        }
        $instance['description']  = isset($instance['description']) ? $instance['description'] : '';
        $icon_phone = 'zmdi zmdi-phone';
        $text_phone = isset($instance['text_phone']) ? $instance['text_phone'] : '';

        $icon_email = 'zmdi zmdi-email';
        $text_email = isset($instance['text_email']) ? $instance['text_email'] : '';

        $icon_address = 'zmdi zmdi-pin';
        $text_address = isset($instance['text_address']) ? $instance['text_address'] : '';

        $icon_time = 'zmdi zmdi-time';
        $text_time = isset($instance['text_time']) ? $instance['text_time'] : '';

        $layout = isset($instance['layout']) ? $instance['layout'] : '1';
        $btn_text = isset($instance['btn_text']) ? $instance['btn_text'] : 'Contact Us Now!';
        $btn_page = isset($instance['btn_page']) ? $instance['btn_page'] : '';

        // add layout class to widget
        $layout_class = !empty($instance['layout']) ? 'layout-'.$instance['layout'] : 'layout-1';
        /* Add the layout from $layout to the class from the $before widget */
        // no 'class' attribute - add one with the value of width
        if( strpos($before_widget, 'class') === false ) {
            // include closing tag in replace string
            $before_widget = str_replace('>', 'class="'. $layout_class . '">', $before_widget);
        } else {
            // there is 'class' attribute - append width value to it
            // $before_widget = str_replace('class="', 'class="'. $layout_class . ' ', $before_widget);
            $before_widget =  preg_replace( '/class="/', "class=\"{$layout_class} ", $before_widget, 1 );
        }

        printf( '%s', $before_widget);

        if (!empty($title)) printf('%1$s%2$s%3$s', $before_title , $title , $after_title);
            printf('<div class="description pb-25 empty-none">%s</div>', $instance['description']);
            echo "<div class='cms-quickcontact'>";

                if ($text_phone != '') {
                    echo '<div class="cms-qc-item"><span class="qc-icon '.$icon_phone.'"></span><span class="qc-text">'.esc_html($text_phone).'</span></div>';
                }

                if ($text_email != '') {
                    echo '<div class="cms-qc-item"><span class="qc-icon '.$icon_email.'"></span><span class="qc-text">'.esc_html($text_email).'</span></div>';
                }

                if ($text_address != '') {
                    echo '<div class="cms-qc-item"><span class="qc-icon '.$icon_address.'"></span><span class="qc-text">'.esc_html($text_address).'</span></div>';
                }

                if ($text_time != '') {
                    echo '<div class="cms-qc-item"><span class="qc-icon '.$icon_time.'"></span><span class="qc-text">'.esc_html($text_time).'</span></div>';
                }

            echo "</div>";

            if(!empty($btn_page)){
                ?>
                <div class="cms-widget-button">
                    <a href="<?php echo esc_url($btn_page); ?>" class="btn d-block"><?php echo esc_html($btn_text);?></a>
                </div>
                <?php
            }

         printf( '%s',$after_widget);
    }

    function update( $new_instance, $old_instance ) {
         $instance = $old_instance;
         $instance['title']        = strip_tags($new_instance['title']);
         $instance['description']  = $new_instance['description'];
         $instance['text_phone']   = strip_tags($new_instance['text_phone']);
         $instance['text_email']   = strip_tags($new_instance['text_email']);
         $instance['text_address'] = strip_tags($new_instance['text_address']);
         $instance['text_time']    = strip_tags($new_instance['text_time']);
         $instance['layout']       = $new_instance['layout'];
         $instance['btn_text']       = $new_instance['btn_text'];
         $instance['btn_page']       = $new_instance['btn_page'];

         return $instance;
    }

    function form( $instance ) {
        $title        = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $description  = isset($instance['description']) ? $instance['description'] : '';
        $text_phone   = isset($instance['text_phone']) ? esc_attr($instance['text_phone']) : '';
        $text_email   = isset($instance['text_email']) ? esc_attr($instance['text_email']) : '';
        $text_address = isset($instance['text_address']) ? esc_attr($instance['text_address']) : '';
        $text_time    = isset($instance['text_time']) ? esc_attr($instance['text_time']) : '';
        $layout       = isset($instance['layout']) ? esc_attr($instance['layout']) : '1';
        $btn_text       = isset($instance['btn_text']) ? esc_attr($instance['btn_text']) : 'Contact Us Now!';
        $btn_page       = isset($instance['btn_page']) ? esc_attr($instance['btn_page']) : '';

        ?>
        <p><label for="<?php echo esc_url($this->get_field_id('layout')); ?>"><?php esc_html_e( 'Layout', 'soapee' ); ?></label>
            <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('layout') ); ?>" name="<?php echo esc_attr( $this->get_field_name('layout') ); ?>">
                <option value="1"<?php if( $layout == '1' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Default', 'soapee'); ?></option>
                <option value="work-together"<?php if( $layout == 'work-together' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Work Together', 'soapee'); ?></option>
            </select>
        </p>
        <p><label for="<?php echo esc_url($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title:', 'soapee' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php esc_html_e( 'Description:', 'soapee' ); ?></label>
        <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>"><?php echo esc_html( $description ); ?></textarea>
        </p>
        <p><label for="<?php echo esc_attr($this->get_field_id('text_phone')); ?>"><?php esc_html_e( 'Phone Number:', 'soapee' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('text_phone') ); ?>" name="<?php echo esc_attr( $this->get_field_name('text_phone') ); ?>" type="text" value="<?php echo esc_attr( $text_phone ); ?>" /></p>

        <p><label for="<?php echo esc_attr($this->get_field_id('text_email')); ?>"><?php esc_html_e( 'Email Address:', 'soapee' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('text_email') ); ?>" name="<?php echo esc_attr( $this->get_field_name('text_email') ); ?>" type="text" value="<?php echo esc_attr( $text_email ); ?>" /></p>

        <p><label for="<?php echo esc_attr($this->get_field_id('text_address')); ?>"><?php esc_html_e( 'Your Address:', 'soapee' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('text_address') ); ?>" name="<?php echo esc_attr( $this->get_field_name('text_address') ); ?>" type="text" value="<?php echo esc_attr( $text_address ); ?>" /></p>

        <p><label for="<?php echo esc_attr($this->get_field_id('text_time')); ?>"><?php esc_html_e( 'Your Time:', 'soapee' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('text_time') ); ?>" name="<?php echo esc_attr( $this->get_field_name('text_time') ); ?>" type="text" value="<?php echo esc_attr( $text_time ); ?>" /></p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_text')); ?>"><?php esc_html_e( 'Button Text:', 'soapee' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('btn_text') ); ?>" name="<?php echo esc_attr( $this->get_field_name('btn_text') ); ?>" type="text" value="<?php echo esc_attr( $btn_text ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_page')); ?>"><?php esc_html_e( 'Button Page:', 'soapee' ); ?></label>
            <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('btn_page') ); ?>" name="<?php echo esc_attr( $this->get_field_name('btn_page') ); ?>">
                <option value=""> <?php esc_html_e('Select Page', 'soapee'); ?></option> 
                <?php 
                $pages = get_pages(); 
                foreach ( $pages as $page ) {
                    $option = '<option '. (get_page_link( $page->ID ) == esc_attr($btn_page) ? "selected='selected'":"").'value="' . get_page_link( $page->ID ) . '">';
                    $option .= $page->post_title;
                    $option .= '</option>';
                    printf('%s', $option);
                }
                ?>
            </select>
        </p>
    <?php
    }

}

/**
* Class CMS_Quick_Contact
*/

function register_quickcontact_widget() {
    if(function_exists('etc_register_wp_widget')) {
        etc_register_wp_widget('CMS_Quick_Contact');
    }
}
add_action('widgets_init', 'register_quickcontact_widget');