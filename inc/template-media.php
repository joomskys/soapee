<?php
/**
 * Post Thumbnail
*/
if(!function_exists('soapee_post_thumbnail')){
    function soapee_post_thumbnail($args=[]){
        $args = wp_parse_args($args,[
            'id'              => null,
            'thumbnail_size'  => is_single() ? 'large' : 'medium',
            'echo'            => true,
            'default_thumb'   => soapee_configs('default_post_thumbnail'),
            'thumbnail_is_bg' => soapee_configs('thumbnail_is_bg'),
            'class'           => '',
            'img_class'       => '',
            'show_image'      => true    
        ]);
        extract($args);
        if((!has_post_thumbnail($args['id']) && !$default_thumb) || !$show_image ) return;

        $thumbnail_atts = [];
        // class
        $thumbnail_atts_class = ['post-image','cms-post',$args['class']];
        if($thumbnail_is_bg) $thumbnail_atts_class[] = 'thumbnai-is-bg';
        $thumbnail_atts[] = 'class="'.implode(' ', $thumbnail_atts_class).'"';
        // style
        $thumbnail_atts_style = [];
        if($thumbnail_is_bg) $thumbnail_atts_style[] = 'background-image: url('.soapee_get_image_url_by_size(['id'=>$id,'size'=> 'full', 'default_thumb' => $default_thumb]).')';
        if(!empty($thumbnail_atts_style)) $thumbnail_atts[] = 'style="'.implode(';',$thumbnail_atts_style).'"';
        if($echo) {
        ?>
            <div <?php echo implode(' ', $thumbnail_atts);?>><?php soapee_image_by_size([
                'id'         => get_post_thumbnail_id($id),
                'default'    => $default_thumb,
                'size'       => $thumbnail_size, 
                'class'      => $args['img_class'], 
                'show_image' => $show_image]
            );
            ?></div>
            <?php do_action('soapee_post_thumbnail_content');
        } else {
            return '<div '.implode(' ', $thumbnail_atts).'><img 
                src="'.soapee_get_image_url_by_size([
                    'id'            => $id,
                    'size'          => 'full', 
                    'default_thumb' => $default_thumb
                ]).'" 
                alt="'.get_the_title().'" 
                class="'.$args['img_class'].'" 
                /></div>'
            .do_action('soapee_post_thumbnail_content');
        }
    }
}

/**
 * Post Gallery 
*/
if(!function_exists('soapee_post_gallery')){
    function soapee_post_gallery($args=[]){
        $args = wp_parse_args($args, array(
            'id'             => null,
            'show_media'     => '1',
            'thumbnail_size' => 'large',
            'show_author'    => is_singular() ? soapee_get_opts('archive_author_on','1') : soapee_get_opts('post_author_on','1'),
            'echo'           => true,
            'default_thumb'  => apply_filters('soapee_default_post_thumbnail', false),
            'light_box'      => soapee_get_post_format_value('post-gallery-lightbox', '0'),
            'source'         => 'post-gallery-images',
        ));
        if('0' === $args['show_media']) return;
        // Get gallery from option
        $gallery_list = explode(',', soapee_get_post_format_value($args['id'], $args['source'], ''));
        // Get first gallery in content 
        $gallery_in_content = get_post_gallery( get_the_ID(), false );
        if($gallery_in_content && empty($gallery_list[0]) && !is_singular()){
            $gallery_list = isset($gallery_in_content['ids']) ? explode(',', $gallery_in_content['ids']) : [];
        }
        $light_box = $args['light_box'];
        global $post;
        wp_enqueue_script('jquery-slick');
        if('1' === $light_box ) {
            $gallery_classes = ['cms-gallery cms-gallery-lightbox'];
            wp_enqueue_script( 'magnific-popup' );
            wp_enqueue_style( 'magnific-popup' );
        }
        else {
            $gallery_classes = ['cms-gallery-carousel'];
        }
        
       
        if( !empty($gallery_list[0]) || has_post_thumbnail() ){
            if(!empty($gallery_list[0])){
            ?>
                <div class="cms-post-gallery-slide cms-slick-slide slick-slide <?php if($light_box) {echo 'images-light-box';} ?>" >
	                <?php
	                foreach ($gallery_list as $img_id):
	                    ?>
	                    <div class="cms-slick-item slick-slide-item">
	                        <a class="light-box" href="<?php echo esc_url(wp_get_attachment_image_url($img_id, 'full'));?>"><img src="<?php echo soapee_get_image_url_by_size(['id' => $img_id, 'size' => $args['thumbnail_size']]);?>" alt="<?php echo esc_attr(get_post_meta( $img_id, '_wp_attachment_image_alt', true )) ?>"></a>
	                    </div>
	                    <?php
	                endforeach;
	                ?>
	            </div>
            <?php 
            } elseif(has_post_thumbnail()) {
                soapee_post_thumbnail($args);
            }
        }
    }
}
/**
 * Post Video
*/
if(!function_exists('soapee_post_video')){
    function soapee_post_video($args=[]){
        global $wp_embed;
        $args = wp_parse_args($args, [
            'video_url'      => 'post-video-url',
            'video_file'     => 'post-video-file',
            'video_html'     => 'post-video-html',
            'id'             => null,
            'thumbnail_size' => is_single() ? 'large' : 'medium',
            'echo'           => true,
            'default_thumb'  => apply_filters('soapee_default_post_thumbnail', false),
            'class'          => ''
        ]);
        $video_url = soapee_get_post_format_value($args['id'], $args['video_url'], '');
        $video_file = soapee_get_post_format_value($args['id'], $args['video_file'], []);
            $video_file_id  = isset($video_file['id']) ? $video_file['id'] : '';
        $video_html = soapee_get_post_format_value($args['id'], $args['video_html'], '');

        // Only get video from the content if a playlist isn't present.
        $_video_in_content = apply_filters( 'the_content', get_the_content('','',$args['id']) );
        if ( false === strpos( $_video_in_content, 'wp-playlist-script' ) ) {
            $video_in_content = get_media_embedded_in_content( $_video_in_content, array( 'video', 'object', 'embed', 'iframe' ) );
        }
        $video = '';
        ob_start();
        if (!empty($video_url)) {
            $video = '<div class="'.esc_attr($args['class']).'">'.do_shortcode($wp_embed->autoembed($video_url)).'</div>';
        } elseif (!empty($video_file_id)) {
            /* Get default video poster */
            $poster = !empty(get_the_post_thumbnail_url($video_file_id)) ? get_the_post_thumbnail_url($video_file_id,'full') : get_the_post_thumbnail_url(get_the_ID(),'full');
            //attachment meta data 
            $att_data = wp_get_attachment_metadata($video_file_id);
            $mime_type = explode('/', $att_data['mime_type']);
            /* Build video */            
            $video_atts = array(
                'src'    => esc_url($video_file['url']),
                'poster' => esc_url($poster),
                'width'  => esc_attr($video_file['width']),
                'height' => esc_attr($video_file['height'])
            );
            switch ($mime_type[0]) {
                case 'audio':
                    $video = '<div class="'.esc_attr($args['class']).'">'.do_shortcode($wp_embed->autoembed($video_file['url'])).'</div>';
                    break;
                
                default:
                    if(!empty($poster))
                        $video = '<div class="'.esc_attr($args['class']).'">'.wp_video_shortcode($video_atts).'</div>';
                    else 
                        $video = '<div class="'.esc_attr($args['class']).'">'.do_shortcode($wp_embed->autoembed($video_file['url'])).'</div>';
                    break;
            }            
        } elseif ('' != $video_html) {
            $_video_html = explode(',', $video_html);
            foreach ($_video_html as $value) {
                $video .= '<div class="video-item">'.'<div class="'.esc_attr($args['class']).'">'.do_shortcode($wp_embed->autoembed($value)).'</div></div>';
            }
        } elseif(! empty( $video_in_content ) && !is_singular()){
            // If not a single post, highlight the video file.
            foreach ( $video_in_content as $video_in_content_html ) {
                $video .= '<div class="'.esc_attr($args['class']).'">'.$video_in_content_html.'</div>';
            }
        } else {
        	$video = soapee_post_thumbnail($args);
        }
        $video .= ob_get_clean();
        // Show video 
        if($args['echo'])
            echo '<div class="cms-post-video">'.apply_filters('soapee_post_video', $video).'</div>';
        else 
            return '<div class="cms-post-video">'.$video.'</div>';
    }
}

/**
 * Post Audio
*/
if(!function_exists('soapee_post_audio')){
    function soapee_post_audio($args = []){
        $args = wp_parse_args($args, [
            'audio_url'      => 'post-audio-url',
            'audio_file'     => 'post-audio-file',
            'id'             => null,
            'thumbnail_size' => is_single() ? 'large' : 'medium',
            'echo'           => true,
            'default_thumb'  => apply_filters('soapee_default_post_thumbnail', false),
            'class'          => '',
            'img_class'      => ''
        ]);
        global $wp_embed;
        $audio_url = soapee_get_post_format_value($args['id'], $args['audio_url'], '');
        $audio_file = soapee_get_post_format_value($args['id'], $args['audio_file'], ['id'=>'']);
        if(!empty($audio_file['id'])){
            /* Get default video poster */
            $poster = (is_array($audio_file) && !empty(get_the_post_thumbnail_url($audio_file['id']))) ? get_the_post_thumbnail_url($audio_file['id'],'full') : get_the_post_thumbnail_url(get_the_ID(),'full');
            //attachment meta data 
            $att_data = wp_get_attachment_metadata($audio_file['id']);
            $mime_type = explode('/', $att_data['mime_type']);
            /* Build audio */            
            $audio_atts = array(
                'src'    => esc_url($audio_file['url']),
                'poster' => esc_url($poster),
                'width'  => esc_attr($audio_file['width']),
                'height' => esc_attr($audio_file['height'])
            );
        }
        // get audion in content 
        $_audio_in_content = apply_filters( 'the_content', get_the_content() );
        // Only get audio from the content if a playlist isn't present.
        if ( false === strpos( $_audio_in_content, 'wp-playlist-script' ) ) {
            $audio_in_content = get_media_embedded_in_content( $_audio_in_content, array( 'audio' ) );
        }        
        $audio = '';
        ob_start();
        if(!empty($audio_url)){
            $audio =  '<div class="'.esc_attr($args['class']).'">'.do_shortcode($wp_embed->autoembed($audio_url)).'</div>';
        } elseif (!empty($audio_file['id'])) {
            switch ($mime_type[0]) {
                case 'audio':
                    $audio = '<div class="'.esc_attr($args['class']).'">'.do_shortcode($wp_embed->autoembed($audio_file['url'])).'</div>';
                    break;
                case 'application':
                    $audio = '<div class="'.esc_attr($args['class']).'">'.do_shortcode($wp_embed->autoembed($audio_file['url'])).'</div>';
                    break;
                
                default:
                    if(!empty($poster)){
                        $audio = '<div class="'.esc_attr($args['class']).'">'.wp_video_shortcode($audio_atts).'</div>';
                    } else {
                        $audio = '<div class="'.esc_attr($args['class']).'">'.do_shortcode($wp_embed->autoembed($audio_file['url'])).'</div>';
                    }
                    break;
            }
        } elseif(! empty( $audio_in_content ) && !is_singular()){
            // If not a single post, highlight the audio file.
            foreach ( $audio_in_content as $audio_in_content_html ) {
                $audio .= '<div class="'.esc_attr($args['class']).'">'.$audio_in_content_html.'</div>';
            }
        } elseif ( has_post_thumbnail() ){
            $audio = soapee_post_thumbnail($args);
        }
        $audio .= ob_get_clean();
        // Show video 
        if($args['echo'])
            echo apply_filters('soapee_post_audio', $audio);
        else 
            return $audio;
    }
}
/**
 * Post Quote
*/
if(!function_exists('soapee_post_quote')){
    function soapee_post_quote($args = []){
        $args = wp_parse_args($args, [
            'id'             => null,
            'thumbnail_size' => is_single() ? 'large' : 'medium',
            'echo'           => true,
            'default_thumb'  => apply_filters('soapee_default_post_thumbnail', false)
        ]);
        $text = soapee_get_post_format_value($args['id'], 'post-quote-text', '');
        $cite = soapee_get_post_format_value($args['id'], 'post-quote-cite', '');
        $quote = '';
        $quote_attrs = $quote_style = [];
        $quote_css_class = ['quote-wrap'];
        
        // Inline Style
        $bg_img = soapee_get_image_url_by_size([
            'id'   => $args['id'],
            'size' => 'post-thumbnail'
        ]);
        if(!empty($bg_img)) {
            $quote_style[] = 'background-image:url('.$bg_img.')';
            $quote_css_class[] = 'has-bg';
        }
        $quote_attrs[] = 'class="'.trim(implode(' ', $quote_css_class)).'"';
        if(!empty($quote_style)) $quote_attrs[] = 'style="'.trim(implode(';', $quote_style)).'"'; 

        if(!empty($text) || !empty($cite)){
            $quote = '<div '.trim(implode(' ', $quote_attrs)).'><blockquote><div class="quote-text">'.$text.'</div><cite>'.$cite.'</cite></blockquote></div>';
        } else {
            $quote = soapee_post_thumbnail($args);
        }

        if($args['echo'])
            echo apply_filters('soapee_post_quote', $quote);
        else 
            return $quote;
    }
}
/**
 * Post Link
*/
if(!function_exists('soapee_post_link')){
    function soapee_post_link($args = []){
        $args = wp_parse_args($args, [
            'id'             => null,
            'thumbnail_size' => is_single() ? 'large' : 'medium',
            'echo'           => true,
            'default_thumb'  => apply_filters('soapee_default_post_thumbnail', false)
        ]);

        $title = soapee_get_post_format_value($args['id'], 'post-link-title', esc_html__('View Our Portfolio','soapee'));
        //https://themeforest.net/user/zookastudio/portfolio
        $link = soapee_get_post_format_value($args['id'], 'post-link-url', '');
        if(empty($link)) return;
        // Get first link in content 
        $link_in_content =  soapee_get_content_link(['echo' => false]);
        // Link attribute
        $link_attrs = $link_style = [];
        $link_css_class = ['link-wrap'];
        
        // Inline Style
        $bg_img = soapee_get_image_url_by_size([
            'id'            => $args['id'],
            'size'          => 'post-thumbnail', 
            'default_thumb' => true
        ]);
        if(!empty($bg_img)) {
            $link_style[] = 'background-image:url('.$bg_img.')';
            $link_css_class[] = 'has-bg';
        }
        $link_attrs[] = 'class="'.trim(implode(' ', $link_css_class)).'"';
        if(!empty($link_style)) $link_attrs[] = 'style="'.trim(implode(';', $link_style)).'"'; 

        if(!empty($link)) {
            // link
            $link = '<div '.trim(implode(' ', $link_attrs)).'><a href="'.esc_url($link).'" class="cms-btn cms-btn-df fill accent" target="_blank"><span>'.esc_html($title).'</span></a></div>';
        } elseif($link_in_content){
            // link 
            $link = '<div '.trim(implode(' ', $link_attrs)).'>' . soapee_get_content_link(['echo' => false]) . '</div>';
        } else {
            $link = soapee_post_thumbnail($args);
        }

        if($args['echo'])
            echo apply_filters('soapee_post_link', $link);
        else 
            return $link;
    }
}

/**
 * Post Image
 * @since 1.0.1
*/
if(!function_exists('soapee_post_image')){
    function soapee_post_image($args = []){
        $args = wp_parse_args($args, [
            'id'              => null,
            'thumbnail_size'  => is_single() ? 'large' : 'medium',
            'echo'            => true,
            'default_thumb'   => soapee_configs('default_post_thumbnail'),
            'thumbnail_is_bg' => soapee_configs('thumbnail_is_bg'),
            'class'           => '',
            'img_class'       => '',
            'show_image'      => true  
        ]);
        extract($args);
        $image = $image_in_content = '';
        // Get first link in content 
        $image_in_content =  soapee_get_content_image(['echo' => false, 'class' => $args['img_class']]);
        
        if(has_post_thumbnail($args['id'])){
           $image =  soapee_post_thumbnail($args);
        } elseif(!empty($image_in_content) && !is_single()){
            $thumbnail_atts = [];
            // class
            $thumbnail_atts_class = ['post-image','cms-post',$args['class']];
            if($thumbnail_is_bg) $thumbnail_atts_class[] = 'thumbnai-is-bg';
            $thumbnail_atts[] = 'class="'.implode(' ', $thumbnail_atts_class).'"';
            // style
            $thumbnail_atts_style = [];
            if($thumbnail_is_bg) $thumbnail_atts_style[] = 'background-image: url('.soapee_get_image_url_by_size(['id'=>$id,'size'=> 'full', 'default_thumb' => $default_thumb]).')';
            if(!empty($thumbnail_atts_style)) $thumbnail_atts[] = 'style="'.implode(';',$thumbnail_atts_style).'"';
            // images
            $image =  '<div ' .implode(' ', $thumbnail_atts).'>'.soapee_get_content_image(['echo' => false, 'class' => $args['img_class']]).'</div>';
        }
        if($args['echo'])
            echo apply_filters('soapee_post_image', $image);
        else 
            return $image;
    }
}


/**
 * Post Media
 * @since 1.0.1
*/
if(!function_exists('soapee_post_media')){
    function soapee_post_media($args = []){
        $args = wp_parse_args($args, [
            'id'             => null,
            'thumbnail_size' => is_single() ? 'large' : 'medium',
            'echo'           => true,
            'default_thumb'  => apply_filters('soapee_default_post_thumbnail', false),
            'wrap_class'     => '',
            'class'          => '',
            'before'         => '',
            'after'          => '',
            'img_class'      => '',
            'inner'          => true,
            'show_image'     => true 
        ]);
        do_action('soapee_before_post_media');
        $post_format = !empty(get_post_format($args['id'])) ? get_post_format($args['id']) : 'standard';

        $classes = [
            'cms-featured',
            'cms-post-'.$post_format,
        ];
        $classes[] = soapee_is_loop() ? 'loop' : '';
        if(!empty($args['wrap_class'])) $classes[] = $args['wrap_class'];
    ?>
    <div class="<?php echo trim(implode(' ', $classes));?>"><?php 
        if($args['inner']): ?><div class="cms-featured-inner relative"><?php endif;
        printf('%s', $args['before']);
            switch (get_post_format($args['id'])) {
                case 'gallery':
                    soapee_post_gallery($args);
                    break;
                case 'video':
                    soapee_post_video($args);
                    break;
                case 'audio':
                    soapee_post_audio($args);
                    break;
                case 'quote':
                    soapee_post_quote($args);
                    break;
                case 'link':
                    soapee_post_link($args);
                    break;
                 case 'image':
                    soapee_post_image($args);
                    break;
                default:
                    soapee_post_thumbnail($args);
                    break;
            }
        printf('%s', $args['after']);
        do_action('soapee_post_media_content', $args);
    ?><?php if($args['inner']): ?></div><?php endif; 
    ?></div>
    <?php
        do_action('soapee_after_post_media');
    }
}
if(!function_exists('soapee_loop_media')){
    function soapee_loop_media($args = []){
        $args = wp_parse_args($args, [
            'show_media'     => '1',
            'thumbnail_size' => 'large',
            'show_author'    => '1'
        ]);
        extract($args);
        if('1' !== $show_media) return;
        
        soapee_post_media($args); 
    }
}

/**
 * Post Author's on Media 
 * action hook : soapee_post_thumbnail_content
 * @since 1.0.0
*/
if(!function_exists('soapee_post_author_on_media')){
    function soapee_post_author_on_media($args = []){
        $args = wp_parse_args($args, [
			'echo'        => true,
			'show_author' => is_singular() ? soapee_get_opts('post_author_on','1') : soapee_get_opts('archive_author_on','1')
        ]);
        extract($args);

        if('1' !== $show_author) return;

        ob_start();
            echo '<div class="post-author">'
            .get_avatar(get_the_author_meta('ID'), 30,  '' , get_the_author(), array('class' => 'circle')).'&nbsp;&nbsp;'
            .esc_html__('By','soapee').':&nbsp;'
            .get_the_author_posts_link()
            .'</div>';
        if($args['echo'])
            echo ob_get_clean();
        else 
            return ob_get_clean();
    }
}

/**
 * Post Category on Media
 * action hook: soapee_post_thumbnail_content
 * @since 1.0.0
 * add_action('soapee_post_thumbnail_content', 'soapee_post_category_on_media', 10);
*/
if(!function_exists('soapee_post_category_on_media')){
    function soapee_post_category_on_media($args =[]){
        $args = wp_parse_args($args, [
            'echo'     => true,
            'show_cat' => is_singular() ? soapee_get_opts('post_categories_on','1') : soapee_get_opts('archive_categories_on','1'),
            'taxonomy' => 'category',
            'before'   => '<span class="icon-pencil icon"></span>',
            'sep'      => ' / ',
            'after'    => ''
        ]);
        extract($args);
        if('1' !== $show_cat) return;

        ob_start();
            echo '<div class="post-category badge-info">'
            .get_the_term_list( get_the_ID(), $taxonomy, $before, $sep, $after )
            .'</div>';
        if($args['echo'])
            echo ob_get_clean();
        else 
            return ob_get_clean();
    }
}

/**
 * Read more on media 
 *
*/
if(!function_exists('soapee_post_readmore_on_media')){
    function soapee_post_readmore_on_media($args=[]){
        $args = wp_parse_args($args, [
            'icon' => 'fa fa-plus',

        ]);
        ob_start();
    ?>
        <a class="overlay gradient-btt" href="<?php the_permalink();?>">
            <span class="icon-readmore <?php echo esc_attr($args['icon']);?>"></span>
        </a>
    <?php
        echo ob_get_clean();
    }
}

/**
 * Use place holder image for featured image
*/
if(!function_exists('soapee_default_post_thumbnail')){
    add_filter('soapee_default_post_thumbnail', 'soapee_default_post_thumbnail');
    function soapee_default_post_thumbnail(){
        return (bool) soapee_configs('default_post_thumbnail');
    }
}