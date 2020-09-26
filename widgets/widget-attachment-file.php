<?php 
defined( 'ABSPATH' ) or exit( -1 );
if(!class_exists('Elementor_Theme_Core')) return;
/**
 * Media attachment
 *
 * @package Soapee
 * @version 1.0
 */

class CMS_Attachment_Files_Widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'cms_attachment_file',
            esc_html__( '*CMS Attachment File', 'soapee' ),
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
        $instance = wp_parse_args( (array) $instance, array(
            'title'       => esc_html__( 'CMS Attachment File', 'soapee' ),
            'description' => '',
            'att_id'      => '',
            'layout'      => '1',
        ) );
        $description = $instance['description'];
        $att_id      = str_replace(' ','',$instance['att_id']);
        $layout      = $instance['layout'];

        $title = empty( $instance['title'] ) ? esc_html__( 'CMS Attachment File', 'soapee' ) : $instance['title'];
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
        // attachment
        $attachments = explode(',', $att_id);
        if(empty($attachments[0])){
            echo '<div class="required text-red">'.esc_html__('No attachment file found!', 'soapee').'</div>';
        } else {
            // description 
            if(!empty($description)) printf('<div class="description pb-25">%s</div>', $description);            
            foreach ($attachments as $attachment) {
                $file = soapee_get_post_format_value( get_the_ID(), $attachment);
                if(!empty($file['id'])){
                ?>
                <div class="brochure-item">
                        <a href="<?php echo esc_url($file['url']);?>" class="bg-accent bg-hover-secondary text-white text-hover-primary text-uppercase text-14 text-va-100 lh-24 d-block bdr-radius-24 p-tb-12 p-lr-30 mb-10">
                            <span class="row justify-content-between">
                                <span class="col">
                                    <!-- <img src="<?php echo esc_url($file['thumbnail']);?>" width="12" alt="soapee" /> -->
                                    <?php //echo get_the_title( $file['id'])); 
                                        echo basename ( get_attached_file( $file['id']) );
                                ?></span>
                                <span class="col-auto"><?php 
                                    echo size_format(filesize( get_attached_file( $file['id'] ) )); 
                                ?></span>
                            </span>
                        </a>
                    </div>
                <?php }
            }
        }
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
        $instance['description'] = sanitize_text_field( $new_instance['description'] );
        $instance['att_id']      = sanitize_text_field( $new_instance['att_id'] );
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
            'title'         => esc_html__( 'CMS Attachment File', 'soapee' ),
            'description'   => '',
            'att_id'        => '',
            'layout'        => '1',
        ) );

        $title         = $instance['title'] ? esc_attr( $instance['title'] ) : esc_html__( 'Recent Posts', 'soapee' );
        $description         = $instance['description'] ? esc_attr( $instance['description'] ) : '';
        $att_id         = $instance['att_id'] ? esc_attr( $instance['att_id'] ) : '';
        $layout    = isset($instance['layout']) ? esc_attr($instance['layout']) : '1';
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'soapee' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php esc_html_e( 'Description:', 'soapee' ); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>"><?php echo esc_html( $description ); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'att_id' ) ); ?>"><?php esc_html_e( 'Attachment ID:', 'soapee' ); ?></label>
            <p class="description"><?php esc_html_e('Enter your attachment name, seperate by comma (,)','soapee'); ?></p>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'att_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'att_id' ) ); ?>"><?php echo esc_html( $att_id ); ?></textarea>
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
        etc_register_wp_widget( 'CMS_Attachment_Files_Widget' );
    }
});
