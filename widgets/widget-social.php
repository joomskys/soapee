<?php
class CS_Social_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'cs_social_widget', // Base ID
            esc_html__('*CMS Social', 'soapee'), // Name
            array('description' => esc_html__('CMS Social Widget', 'soapee'),) // Args
        );
    }

    function widget($args, $instance) {
        global $woocommerce;

        extract($args);
        if (!empty($instance['title'])) {
            $title = apply_filters('widget_title', empty($instance['title']) ? esc_html__('Social', 'soapee' ) : $instance['title'], $instance, $this->id_base);
        }

        $layout = isset($instance['layout']) ? $instance['layout'] : '1';

        $icon_facebook = 'zmdi zmdi-facebook';
        $link_facebook = isset($instance['link_facebook']) ? $instance['link_facebook'] : '';
        

        $icon_rss = 'zmdi zmdi-rss';
        $link_rss = isset($instance['link_rss']) ? $instance['link_rss'] : '';

        $icon_youtube = 'zmdi zmdi-youtube';
        $link_youtube = isset($instance['link_youtube']) ? $instance['link_youtube'] : '';

        $icon_twitter = 'zmdi zmdi-twitter';
        $link_twitter = isset($instance['link_twitter']) ? $instance['link_twitter'] : '';

        $icon_google = 'zmdi zmdi-google-plus';
        $link_google = isset($instance['link_google']) ? $instance['link_google'] : '';

        $icon_skype = 'zmdi zmdi-skype';
        $link_skype = isset($instance['link_skype']) ? $instance['link_skype'] : '';

        $icon_dribbble = 'zmdi zmdi-dribbble';
        $link_dribbble = isset($instance['link_dribbble']) ? $instance['link_dribbble'] : '';

        $icon_flickr = 'zmdi zmdi-flickr';
        $link_flickr = isset($instance['link_flickr']) ? $instance['link_flickr'] : '';

        $icon_linkedin = 'zmdi zmdi-linkedin';
        $link_linkedin = isset($instance['link_linkedin']) ? $instance['link_linkedin'] : '';

        $icon_vimeo = 'zmdi zmdi-vimeo';
        $link_vimeo = isset($instance['link_vimeo']) ? $instance['link_vimeo'] : '';

        $icon_pinterest = 'zmdi zmdi-pinterest';
        $link_pinterest = isset($instance['link_pinterest']) ? $instance['link_pinterest'] : '';

        $icon_bloglovin = 'zmdi zmdi-blogger';
        $link_bloglovin = isset($instance['link_bloglovin']) ? $instance['link_bloglovin'] : '';

        $icon_instagram = 'zmdi zmdi-instagram';
        $link_instagram = isset($instance['link_instagram']) ? $instance['link_instagram'] : '';

        // no 'class' attribute - add one with the value of width
        if( strpos($before_widget, 'class') === false ) {
            $before_widget = str_replace('>', $before_widget);
        }
        printf('%s', $before_widget);

        if (!empty($title))
                printf('%1$S %2$s %3$s', $before_title , $title , $after_title);

            echo '<div class="cms-social layout-'.$layout.'">';

            if ($link_facebook != '') {
                echo '<a class="social-facebook" target="_blank" href="'.esc_url($link_facebook).'"><i class="'.$icon_facebook.'"></i></a>';
            }

            if ($link_rss != '') {
                echo '<a class="social-rss" target="_blank" href="'.esc_url($link_rss).'"><i class="'.$icon_rss.'"></i></a>';
            }

            if ($link_youtube != '') {
                echo '<a class="social-youtube" target="_blank" href="'.esc_url($link_youtube).'"><i class="'.$icon_youtube.'"></i></a>';
            }

            if ($link_twitter != '') {
                echo '<a class="social-twitter" target="_blank" href="'.esc_url($link_twitter).'"><i class="'.$icon_twitter.'"></i></a>';
            }

            if ($link_google != '') {
                echo '<a class="social-google" target="_blank" href="'.esc_url($link_google).'"><i class="'.$icon_google.'"></i></a>';
            }

            if ($link_skype != '') {
                echo '<a class="social-skype" target="_blank" href="'.esc_url($link_skype).'"><i class="'.$icon_skype.'"></i></a>';
            }

            if ($link_dribbble != '') {
                echo '<a class="social-dribbble" target="_blank" href="'.esc_url($link_dribbble).'"><i class="'.$icon_dribbble.'"></i></a>';
            }

            if ($link_flickr != '') {
                echo '<a class="social-flickr" target="_blank" href="'.esc_url($link_flickr).'"><i class="'.$icon_flickr.'"></i></a>';
            }

            if ($link_linkedin != '') {
                echo '<a class="social-linkedin" target="_blank" href="'.esc_url($link_linkedin).'"><i class="'.$icon_linkedin.'"></i></a>';
            }

            if ($link_vimeo != '') {
                echo '<a class="social-vimeo" target="_blank" href="'.esc_url($link_vimeo).'"><i class="'.$icon_vimeo.'"></i></a>';
            }

            if ($link_pinterest != '') {
                echo '<a class="social-pinterest" target="_blank" href="'.esc_url($link_pinterest).'"><i class="'.$icon_pinterest.'"></i></a>';
            }

            if ($link_bloglovin != '') {
                echo '<a class="social-bloglovin" target="_blank" href="'.esc_url($link_bloglovin).'"><i class="'.$icon_bloglovin.'"></i></a>';
            }

            if ($link_instagram != '') {
                echo '<a class="social-instagram" target="_blank" href="'.esc_url($link_instagram).'"><i class="'.$icon_instagram.'"></i></a>';
            }

            echo "</div>";

        printf('%s', $after_widget);
    }

    function update( $new_instance, $old_instance ) {
         $instance = $old_instance;
         $instance['title'] = strip_tags($new_instance['title']);
         $instance['layout'] = $new_instance['layout'];

         $instance['link_facebook'] = strip_tags($new_instance['link_facebook']);

         $instance['link_rss'] = strip_tags($new_instance['link_rss']);

         $instance['link_youtube'] = strip_tags($new_instance['link_youtube']);

         $instance['link_twitter'] = strip_tags($new_instance['link_twitter']);

         $instance['link_google'] = strip_tags($new_instance['link_google']);

         $instance['link_skype'] = strip_tags($new_instance['link_skype']);

         $instance['link_dribbble'] = strip_tags($new_instance['link_dribbble']);

         $instance['link_flickr'] = strip_tags($new_instance['link_flickr']);

         $instance['link_linkedin'] = strip_tags($new_instance['link_linkedin']);

         $instance['link_vimeo'] = strip_tags($new_instance['link_vimeo']);

         $instance['link_pinterest'] = strip_tags($new_instance['link_pinterest']);

         $instance['link_bloglovin'] = strip_tags($new_instance['link_bloglovin']);

         $instance['link_instagram'] = strip_tags($new_instance['link_instagram']);

         return $instance;
    }

    function form( $instance ) {
         $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
         $layout = isset($instance['layout']) ? esc_attr($instance['layout']) : '1';

         $link_facebook = isset($instance['link_facebook']) ? esc_attr($instance['link_facebook']) : '';

         $link_rss = isset($instance['link_rss']) ? esc_attr($instance['link_rss']) : '';

         $link_youtube = isset($instance['link_youtube']) ? esc_attr($instance['link_youtube']) : '';

         $link_twitter = isset($instance['link_twitter']) ? esc_attr($instance['link_twitter']) : '';

         $link_google = isset($instance['link_google']) ? esc_attr($instance['link_google']) : '';

         $link_skype = isset($instance['link_skype']) ? esc_attr($instance['link_skype']) : '';

         $link_dribbble = isset($instance['link_dribbble']) ? esc_attr($instance['link_dribbble']) : '';

         $link_flickr = isset($instance['link_flickr']) ? esc_attr($instance['link_flickr']) : '';

         $link_linkedin = isset($instance['link_linkedin']) ? esc_attr($instance['link_linkedin']) : '';

         $link_vimeo = isset($instance['link_vimeo']) ? esc_attr($instance['link_vimeo']) : '';

         $link_pinterest = isset($instance['link_pinterest']) ? esc_attr($instance['link_pinterest']) : '';

         $link_bloglovin = isset($instance['link_bloglovin']) ? esc_attr($instance['link_bloglovin']) : '';

         $link_instagram = isset($instance['link_instagram']) ? esc_attr($instance['link_instagram']) : '';

         ?>
         <p><label for="<?php echo esc_url($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title:', 'soapee' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>
         <p><label for="<?php echo esc_url($this->get_field_id('layout')); ?>"><?php esc_html_e( 'Layout', 'soapee' ); ?></label>
            <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('layout') ); ?>" name="<?php echo esc_attr( $this->get_field_name('layout') ); ?>">
                <option value="1"<?php if( $layout == '1' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Default', 'soapee'); ?></option>
                <option value="2"<?php if( $layout == '2' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Circle', 'soapee'); ?></option>
            </select>
        </p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_facebook')); ?>"><?php esc_html_e( 'Link Facebook:', 'soapee' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_facebook') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_facebook') ); ?>" type="text" value="<?php echo esc_attr( $link_facebook ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('link_rss')); ?>"><?php esc_html_e( 'Link Rss:', 'soapee' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_rss') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_rss') ); ?>" type="text" value="<?php echo esc_attr( $link_rss ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('link_youtube')); ?>"><?php esc_html_e( 'Link Youtube:', 'soapee' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_youtube') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_youtube') ); ?>" type="text" value="<?php echo esc_attr( $link_youtube ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('link_twitter')); ?>"><?php esc_html_e( 'Link Twitter:', 'soapee' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_twitter') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_twitter') ); ?>" type="text" value="<?php echo esc_attr( $link_twitter ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('link_google')); ?>"><?php esc_html_e( 'Link Google:', 'soapee' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_google') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_google') ); ?>" type="text" value="<?php echo esc_attr( $link_google ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('link_skype')); ?>"><?php esc_html_e( 'Link Skype:', 'soapee' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_skype') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_skype') ); ?>" type="text" value="<?php echo esc_attr( $link_skype ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('link_dribbble')); ?>"><?php esc_html_e( 'Link Dribbble:', 'soapee' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_dribbble') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_dribbble') ); ?>" type="text" value="<?php echo esc_attr( $link_dribbble ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('link_flickr')); ?>"><?php esc_html_e( 'Link Flickr:', 'soapee' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_flickr') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_flickr') ); ?>" type="text" value="<?php echo esc_attr( $link_flickr ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('link_linkedin')); ?>"><?php esc_html_e( 'Link Linkedin:', 'soapee' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_linkedin') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_linkedin') ); ?>" type="text" value="<?php echo esc_attr( $link_linkedin ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('link_vimeo')); ?>"><?php esc_html_e( 'Link Vimeo:', 'soapee' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_vimeo') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_vimeo') ); ?>" type="text" value="<?php echo esc_attr( $link_vimeo ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('link_pinterest')); ?>"><?php esc_html_e( 'Link Pinterest:', 'soapee' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_pinterest') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_pinterest') ); ?>" type="text" value="<?php echo esc_attr( $link_pinterest ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('link_bloglovin')); ?>"><?php esc_html_e( 'Link Bloglovin:', 'soapee' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_bloglovin') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_bloglovin') ); ?>" type="text" value="<?php echo esc_attr( $link_bloglovin ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('link_instagram')); ?>"><?php esc_html_e( 'Link Instagram:', 'soapee' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_instagram') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_instagram') ); ?>" type="text" value="<?php echo esc_attr( $link_instagram ); ?>" /></p>
        
    <?php
    }

}

/**
* Class CS_Social_Widget
*/

function register_social_widget() {
    if(function_exists('etc_register_wp_widget')) {
        etc_register_wp_widget('CS_Social_Widget');
    }
}

add_action('widgets_init', 'register_social_widget');