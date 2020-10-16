<?php defined( 'ABSPATH' ) or exit( -1 );
/**
 * Recent Posts widgets
 *
 * @package Soapee
 * @version 1.0
 */

class CMS_Recent_Posts_Widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'cms_recent_posts',
            esc_html__( '*CMS Recent Posts', 'soapee' ),
            array(
                'description' => esc_attr__( 'Shows your most recent posts.', 'soapee' ),
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
            'title'         => esc_html__( 'Recent Posts', 'soapee' ),
            'post_type'     => 'post',
            'number'        => 4,
            'post_in'       => '',
            'layout'        => '1',
        ) );
        $number = absint( $instance['number'] );
        if ( $number <= 0 || $number > 10)
        {
            $number = 4;
        }
        $post_type = $instance['post_type'];
        $post_in   = $instance['post_in'];
        $layout    = $instance['layout'];

        $title = empty( $instance['title'] ) ? esc_html__( 'Recent Posts', 'soapee' ) : $instance['title'];
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        // add layout class to widget
        $layout_class = !empty($instance['layout']) ? 'layout-'.$instance['layout'] : 'layout-1';
        /* Add the layout from $layout to the class from the $before widget */
        // no 'class' attribute - add one with the value of width
        if( strpos($args['before_widget'], 'class') === false ) {
        // include closing tag in replace string
            $args['before_widget'] = str_replace('>', 'class="'. $layout_class . '">', $args['before_widget']);
        }
        // there is 'class' attribute - append width value to it
        else {
            $args['before_widget'] = str_replace('class="', 'class="'. $layout_class . ' ', $args['before_widget']);
        }
        printf('%s', $args['before_widget']);
        printf('%1$s %2$s %3$s', $args['before_title'], $title, $args['after_title']);

        
        $sticky = '';
        if($post_in == 'featured') {
            $sticky = get_option( 'sticky_posts' );
        }
        $r = new WP_Query( array(
            'post_type'           => $post_type,
            'posts_per_page'      => $number,
            'no_found_rows'       => true,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true,
            'post__in'            => $sticky,
        ) );

        if ( $r->have_posts() )
        {
            echo '<div class="cms-posts-list layout-'.esc_attr($layout).'">';

            while ( $r->have_posts() )
            {
                $r->the_post();
                global $post;
                ?>
                <div class="cms-post-item">
                    <?php 
                        switch ($layout) {
                            case '4':
                                printf(
                                    '<a href="%1$s" title="%2$s" class="%3$s">%4$s</a>',
                                    esc_url( get_permalink() ),
                                    esc_attr( get_the_title() ),
                                    ($post->ID == get_queried_object_id()) ? 'post-item current-post-item active' : 'post-item',
                                    get_the_title()
                                );
                                break;
                            case '3':
                                printf(
                                    '<div class="cms-post-title text-17 font-600"><a href="%1$s" title="%2$s" class="%3$s">%4$s</a></div>',
                                    esc_url( get_permalink() ),
                                    esc_attr( get_the_title() ),
                                    ($post->ID == get_queried_object_id()) ? 'post-item current-post-item active' : 'post-item',
                                    get_the_title()
                                );
                                break;
                            case '2':
                        ?>
                        <div class="row gutters-20">
                            <?php
                                soapee_post_media([
                                    'class'          => 'col-auto',
                                    'thumbnail_size' => 'thumbnail',
                                    'img_class'      => 'bdr-radius-5'
                                ]);
                            ?>
                            <div class="entry-content col">
                                <div class="cms-post-meta mb-5"><?php 
                                    soapee_post_author(['icon' => '', 'text' => '']);
                                    soapee_post_date(['icon' => '']); 
                                ?></div>
                                <?php printf(
                                    '<h6 class="cms-post-title mb-0"><a href="%1$s" title="%2$s">%3$s</a></h6>',
                                    esc_url( get_permalink() ),
                                    esc_attr( get_the_title() ),
                                    get_the_title()
                                ); ?>
                            </div>
                        </div>
                        <?php
                                break;
                            default:
                        ?>
                        <div class="row gutters-20">
                            <?php
                                soapee_post_media([
                                    'wrap_class'     => 'col-auto',
                                    'thumbnail_size' => 'thumbnail',
                                    'img_class'      => 'bdr-radius-5'
                                ]);
                            ?>
                            <div class="entry-content col">
                                <div class="row h-100">
                                    <div class="col-12">
                                    <?php printf(
                                        '<h6 class="cms-post-title mb-5"><a href="%1$s" title="%2$s">%3$s</a></h6>',
                                        esc_url( get_permalink() ),
                                        esc_attr( get_the_title() ),
                                        get_the_title()
                                    ); ?>
                                    </div>
                                    <div class="cms-post-meta col-12 align-self-end"><?php 
                                        soapee_post_author(['icon' => '', 'text' => '']);
                                        soapee_post_date(['icon' => '']); 
                                    ?></div>
                                </div>
                            </div>
                        </div>
                        <?php
                            break;
                        }
                    ?>
                    </div>
            <?php }
            echo '</div>';
        }
        wp_reset_postdata();
        printf('%s' , $args['after_widget']);
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
        $instance['title']     = sanitize_text_field( $new_instance['title'] );
        $instance['number']    = absint( $new_instance['number'] );
        $instance['post_type'] = strip_tags($new_instance['post_type']);
        $instance['post_in']   = strip_tags($new_instance['post_in']);
        $instance['layout']    = strip_tags($new_instance['layout']);
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
            'title'         => esc_html__( 'Recent Posts', 'soapee' ),
            'post_type'     => 'post',
            'post_in'       => 'recent',
            'layout'        => '1',
            'number'        => 4,
        ) );

        $title         = $instance['title'] ? esc_attr( $instance['title'] ) : esc_html__( 'Recent Posts', 'soapee' );
        $number    = absint( $instance['number'] );
        $post_type = isset($instance['post_type']) ? esc_attr($instance['post_type']) : '';
        $post_in   = isset($instance['post_in']) ? esc_attr($instance['post_in']) : '';
        $layout    = isset($instance['layout']) ? esc_attr($instance['layout']) : '1';

        $post_type_list = etc_get_post_type_options();
        //var_dump($post_type_list);
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'soapee' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_url($this->get_field_id('post_type')); ?>"><?php esc_html_e( 'Post Type', 'soapee' ); ?></label>
            <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('post_type') ); ?>" name="<?php echo esc_attr( $this->get_field_name('post_type') ); ?>">
            <?php 
                foreach ($post_type_list as $key => $value) {
                ?>
                    <option value="<?php echo esc_attr($key) ?>"<?php if( $post_type == $key ){ echo 'selected="selected"';} ?>><?php echo esc_html($value); ?></option>
                <?php
                }
            ?>
            </select>
        </p>
        <p>
            <label for="<?php echo esc_url($this->get_field_id('post_in')); ?>"><?php esc_html_e( 'Post in', 'soapee' ); ?></label>
            <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('post_in') ); ?>" name="<?php echo esc_attr( $this->get_field_name('post_in') ); ?>">
            <option value="recent"<?php if( $post_in == 'recent' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Recent', 'soapee'); ?></option>
            <option value="featured"<?php if( $post_in == 'featured' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Sticky', 'soapee'); ?></option>
            </select>
        </p>
        <p><label for="<?php echo esc_url($this->get_field_id('layout')); ?>"><?php esc_html_e( 'Layout', 'soapee' ); ?></label>
            <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('layout') ); ?>" name="<?php echo esc_attr( $this->get_field_name('layout') ); ?>">
            <option value="1"<?php if( $layout == '1' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Default', 'soapee'); ?></option>
            <option value="2"<?php if( $layout == '2' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Layout 2', 'soapee'); ?></option>
            <option value="3"<?php if( $layout == '3' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Layout 3', 'soapee'); ?></option>
            <option value="4"<?php if( $layout == '4' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Layout 4', 'soapee'); ?></option>
            </select>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to show:', 'soapee' ); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $number ); ?>" size="3" />
        </p>
        <?php
    }
}

add_action( 'widgets_init', function(){
    if(function_exists('etc_register_wp_widget')){
        etc_register_wp_widget( 'CMS_Recent_Posts_Widget' );
    }
});
