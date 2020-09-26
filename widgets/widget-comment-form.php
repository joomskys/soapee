<?php 
defined( 'ABSPATH' ) or exit( -1 );
if(!class_exists('Elementor_Theme_Core')) return;
/**
 * Media attachment
 *
 * @package Soapee
 * @version 1.0
 */

class CMS_Comment_Form_Widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'cms_comment_form',
            esc_html__( '*CMS Comment Form', 'soapee' ),
            array(
                'description' => esc_attr__( 'Shows file attached in post.', 'soapee' ),
                'customize_selective_refresh' => true,
            )
        );
    }

    /**
     * Outputs the HTML for this widget.
     *
     * @param array $args An array of standard parameters for widgets in this theme
     * @param array $instance An array of settings for this widget instance
     * @return void Echoes it's output
     **/
    function widget( $args, $instance )
    {
        if(!is_single()) return;
        $instance = wp_parse_args( (array) $instance, array(
            'title'       => esc_html__( 'CMS Comment Form', 'soapee' ),
            'layout'      => '1',
        ) );
        $layout      = $instance['layout'];

        $title = empty( $instance['title'] ) ? esc_html__( 'CMS Comment Form', 'soapee' ) : $instance['title'];
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        //echo wp_kses_post($args['before_widget']);
        // add layout class to widget
        $layout_class = !empty($instance['layout']) ? 'layout-'.$instance['layout'] : 'layout-1';
        /* Add the layout from $layout to the class from the $before widget */
        // no 'class' attribute - add one with the value of width
        if( strpos($args['before_widget'], 'class') === false ) {
            // include closing tag in replace string
            $args['before_widget'] = str_replace('>', 'class="'. $layout_class . '">', $args['before_widget']);
        } else {
            // there is 'class' attribute - append width value to it
            $args['before_widget'] = str_replace('class="', 'class="'. $layout_class . ' ', $args['before_widget']);
        }
        // before widget
        printf('%s', $args['before_widget']);
        // widget title
        echo wp_kses_post($args['before_title']) . wp_kses_post($title) . wp_kses_post($args['after_title']);
        // Comment Form
        comment_form(soapee_comment_form_args_service());
        // after widget
        echo wp_kses_post($args['after_widget']);
    }

    /**
     * Deals with the settings when they are saved by the admin. Here is
     * where any validation should be dealt with.
     *
     * @param array $new_instance An array of new settings as submitted by the admin
     * @param array $old_instance An array of the previous settings
     * @return array The validated and (if necessary) amended settings
     **/
    function update( $new_instance, $old_instance )
    {
        $instance = $old_instance;
        $instance['title']       = sanitize_text_field( $new_instance['title'] );
        $instance['layout']      = strip_tags($new_instance['layout']);
        return $instance;
    }

    /**
     * Displays the form for this widget on the Widgets page of the WP Admin area.
     *
     * @param array $instance An array of the current settings for this widget
     * @return void Echoes it's output
     **/
    function form( $instance )
    {
        $instance = wp_parse_args( (array) $instance, array(
            'title'         => esc_html__( 'CMS Comment Form', 'soapee' ),
            'layout'        => '1',
        ) );

        $title         = $instance['title'] ? esc_attr( $instance['title'] ) : esc_html__( 'CMS Comment Form', 'soapee' );
        $layout    = isset($instance['layout']) ? esc_attr($instance['layout']) : '1';
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'soapee' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p><label for="<?php echo esc_url($this->get_field_id('layout')); ?>"><?php esc_html_e( 'Layout', 'soapee' ); ?></label>
            <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('layout') ); ?>" name="<?php echo esc_attr( $this->get_field_name('layout') ); ?>">
                <option value="1"<?php if( $layout == '1' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Default', 'soapee'); ?></option>
            </select>
        </p>
        <?php
    }
}

add_action( 'widgets_init', function(){
    if(function_exists('etc_register_wp_widget')){
        etc_register_wp_widget( 'CMS_Comment_Form_Widget' );
    }
});
