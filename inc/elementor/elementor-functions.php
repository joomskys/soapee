<?php
if(!function_exists('soapee_elementor_get_posts')){
    function soapee_elementor_get_posts($posts = [], $widget, $settings = [], $args=[]){
        if(empty($posts) || !is_array($posts) || empty($settings) || !is_array($settings)){
            return false;
        }
        extract($settings);
        if($thumbnail_size != 'custom'){
            $img_size = $thumbnail_size;
        }
        elseif(!empty($thumbnail_custom_dimension['width']) && !empty($thumbnail_custom_dimension['height'])){
            $img_size = $thumbnail_custom_dimension['width'] . 'x' . $thumbnail_custom_dimension['height'];
        }
        else{
            $img_size = 'medium';
        }
        
        $args = wp_parse_args($args, [
            'item_class'     => '',
            'media_class'    => '',
            'content_class'  => '',
            'img_class'      => '',
            'readmore_class' => '',
        ]);
        $item_wrap_class = soapee_nice_class(implode(' ', ['cms-post-item-wrap', $args['item_class']]));
        foreach ($posts as $post): ?>
            <div class="<?php echo esc_attr($item_wrap_class); ?>">
                <?php
                switch ($settings['item_layout']) {
                    case '6': 
                ?>
                    <div class="cms-post-item-inner bg-white cms-box-shadow-13 cms-box-shadow-hover-14 cms-hover-zoom-img-1 cms-transition bdr-radius-15">
                        <?php soapee_post_media([
                            'id'                => $post->ID, 
                            'thumbnail_size'    => $img_size,
                            'default_thumb'     => true,
                            'class'             => 'mb-0 overflow-hidden'.$args['media_class'],
                            'img_class'         => 'w-100 '.$args['img_class']
                        ]); ?>
                        <div class="<?php echo trim(implode(' ', ['cms-post-item-content p-30', $args['content_class']])); ?>">
                            <div class="cms-post-meta-2 mb-15 clearfix"><?php 
                                soapee_post_category([
                                    'post_id'   => $post->ID, 
                                    'class'     => 'cms-category-style-2', 
                                    'icon'      => '', 
                                    'text'      => '', 
                                    'separator' => ''
                                ]);
                                soapee_post_date(['id' => $post->ID, 'class' => '', 'icon' => '']);
                            ?></div>
                            <div class="cms-post-item-title h3 text-20 text-va-30 lh-26 pb-15"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php 
                                    echo get_the_title($post->ID); 
                            ?></a></div>
                            <div class="mb-15 clearfix"><?php 
                                soapee_post_author([
                                    'class' => 'cms-author-style-2 mr-12'
                                ]);
                            ?></div>
                            <?php if((int)$excerpt_lenght > 0): ?>
                                <div class="cms-post-item-excerpt"><?php
                                    if(!empty($post->post_excerpt)){
                                        echo wp_trim_words( $post->post_excerpt, $excerpt_lenght, $settings['excerpt_more_text'] );
                                    }
                                    else{
                                        $content = strip_shortcodes( $post->post_content );
                                        $content = apply_filters( 'the_content', $content );
                                        $content = str_replace(']]>', ']]&gt;', $content);
                                        echo wp_trim_words( $content, $excerpt_lenght, $settings['excerpt_more_text'] );
                                    }
                                ?></div>
                            <?php endif;
                                soapee_elementor_button_render($widget, $settings, [
                                    'class'     => trim(implode(' ',['cms-post-item-readmore mt-20 text-uppercase', $args['readmore_class']])),
                                    'post_id'   => $post->ID,
                                    'overwrite' => true
                                ]); 
                            ?>
                        </div>
                    </div>
                <?php
                    break;
                    case '4': 
                ?>
                    <div class="cms-post-item-inner cms-shadow-12 bg-white bdr-radius-20">
                        <div class="row align-items-center">
                            <div class="col-md-5 empty-none"><?php soapee_post_media([
                                    'id'                => $post->ID, 
                                    'thumbnail_size'    => $img_size,
                                    'default_thumb'     => true,
                                    'wrap_class'        => 'text-center p-20',
                                    'class'             => trim($args['media_class']),
                                    'img_class'         => $args['img_class']
                            ]); ?></div>
                            <div class="<?php echo trim(implode(' ', ['cms-post-item-content', 'col-md-7', $args['content_class']])); ?>">
                                <div class="pt-25 pr-15 pl-15 pr-md-30 pb-25 pb-md-50">
                                    <?php soapee_service_minimum_cost(['id' => $post->ID, 'class' => 'text-md-end']); ?>
                                    <div class="cms-post-item-title h3 text-25 text-va-20 lh-26 pb-25"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo get_the_title($post->ID); ?></a></div>
                                    <?php if((int)$excerpt_lenght > 0): ?>
                                        <div class="cms-post-item-excerpt"><?php
                                            if(!empty($post->post_excerpt)){
                                                echo wp_trim_words( $post->post_excerpt, $excerpt_lenght, $settings['excerpt_more_text'] );
                                            }
                                            else{
                                                $content = strip_shortcodes( $post->post_content );
                                                $content = apply_filters( 'the_content', $content );
                                                $content = str_replace(']]>', ']]&gt;', $content);
                                                echo wp_trim_words( $content, $excerpt_lenght, $settings['excerpt_more_text'] );
                                            }
                                        ?></div>
                                        <?php soapee_service_features_list([
                                            'id'    => $post->ID,
                                            'class' => 'pt-20 cms-list-col-2'
                                        ]); ?>
                                    <?php endif;
                                        soapee_elementor_button_render($widget, $settings, [
                                            'class'     => trim(implode(' ',['cms-post-item-readmore mt-30', $args['readmore_class']])),
                                            'post_id'   => $post->ID,
                                            'overwrite' => true
                                        ]); 
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    break;
                    case '3': 
                ?>
                    <div class="cms-post-item-inner">
                        <?php soapee_post_media([
                            'id'                => $post->ID, 
                            'thumbnail_size'    => $img_size,
                            'default_thumb'     => true,
                            'class'             => 'bdr-radius-15 mb-20 '.$args['media_class'],
                            'img_class'         => 'w-100 '.$args['img_class']
                        ]); ?>
                        <div class="<?php echo trim(implode(' ', ['cms-post-item-content', $args['content_class']])); ?>">
                            <?php soapee_post_date(['id' => $post->ID, 'class' => 'mb-8 d-block', 'icon_class' => 'text-accent']); ?>
                            <div class="cms-post-item-title h3 text-20 text-va-30 lh-26 pb-15 mb-15 has-line"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo get_the_title($post->ID); ?></a></div>
                            <?php if((int)$excerpt_lenght > 0): ?>
                                <div class="cms-post-item-excerpt"><?php
                                    if(!empty($post->post_excerpt)){
                                        echo wp_trim_words( $post->post_excerpt, $excerpt_lenght, $settings['excerpt_more_text'] );
                                    }
                                    else{
                                        $content = strip_shortcodes( $post->post_content );
                                        $content = apply_filters( 'the_content', $content );
                                        $content = str_replace(']]>', ']]&gt;', $content);
                                        echo wp_trim_words( $content, $excerpt_lenght, $settings['excerpt_more_text'] );
                                    }
                                ?></div>
                            <?php endif;
                                soapee_elementor_button_render($widget, $settings, [
                                    'class'     => trim(implode(' ',['cms-post-item-readmore mt-20 text-uppercase', $args['readmore_class']])),
                                    'post_id'   => $post->ID,
                                    'overwrite' => true
                                ]); 
                            ?>
                        </div>
                    </div>
                <?php
                    break;
                    case '2': 
                ?>
                <div class="cms-post-item-inner bdr-1 bdr-solid bdr-d6d6d6 bdr-radius-15 cms-overlay-wrap cms-shadow-hover-11 bdr-hover-transparent relative cms-transition">
                    <?php 
                        soapee_service_icon([
                            'id'         => $post->ID,
                            'class'      => 'absolute cms-abs-t-25 cms-abs-l-25',
                            'icon_class' => 'cms-icon-61 cms-icon-style-1 circle bg-accent text-secondary'
                        ]);
                        soapee_post_media([
                            'id'                => $post->ID, 
                            'thumbnail_size'    => $img_size,
                            'default_thumb'     => true,
                            'class'             => $args['media_class'],
                            'img_class'         => $args['img_class']
                        ]); 
                    ?>
                    <div class="<?php echo esc_attr(soapee_nice_class(implode(' ', ['cms-post-item-content pt-20 pb-25 p-lr-25 bg-white', $args['content_class']]))); ?>">
                        <div class="cms-post-item-title h3 text-20 text-va-30 lh-26 mb-12"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo get_the_title($post->ID); ?></a></div>
                        <?php if((int)$excerpt_lenght > 0): ?>
                            <div class="cms-post-item-excerpt"><?php
                                if(!empty($post->post_excerpt)){
                                    echo wp_trim_words( $post->post_excerpt, $excerpt_lenght, $settings['excerpt_more_text'] );
                                }
                                else{
                                    $content = strip_shortcodes( $post->post_content );
                                    $content = apply_filters( 'the_content', $content );
                                    $content = str_replace(']]>', ']]&gt;', $content);
                                    echo wp_trim_words( $content, $excerpt_lenght, $settings['excerpt_more_text'] );
                                }
                            ?></div>
                        <?php endif;
                            soapee_elementor_button_render($widget, $settings, [
                                'class'     => soapee_nice_class(implode(' ',['cms-post-item-readmore mt-25', $args['readmore_class']])),
                                'post_id'   => $post->ID,
                                'overwrite' => true
                            ]); 
                        ?>
                    </div>
                    <div class="cms-overlay-content p-25 bg-white">
                        <div class="cms-overlay-content-inner h-100">
                            <div class="bdr-b-1 bdr-solid bdr-d8d8d8 mb-18 pb-18">
                                <div class="row align-items-center gutters-15">
                                    <?php soapee_service_icon([
                                        'id'         => $post->ID,
                                        'class'      => 'col-auto',
                                        'icon_class' => 'cms-icon-61 cms-icon-style-1 circle bg-accent text-secondary'
                                    ]); ?>
                                    <div class="col">
                                        <div class="h4 text-20 text-va-30"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo get_the_title($post->ID); ?></a></div>
                                        <?php soapee_service_minimum_cost(['id' => $post->ID]); ?>
                                    </div>
                                </div>
                            </div>
                            <?php 
                                soapee_service_features_list([
                                    'id' => $post->ID
                                ]);
                                soapee_elementor_button_render($widget, $settings, [
                                    'class'     => soapee_nice_class(implode(' ',['cms-post-item-readmore mt-15', $args['readmore_class']])),
                                    'post_id'   => $post->ID,
                                    'overwrite' => true
                                ]); 
                            ?>
                        </div>
                    </div>
                </div>
                <?php
                    break;
                default: 
            ?>
                <div class="cms-post-item-inner">
                    <?php soapee_post_media([
                        'id'                => $post->ID, 
                        'thumbnail_size'    => $img_size,
                        'default_thumb'     => true,
                        'class'             => 'bdr-radius-15 mb-20 '.$args['media_class'],
                        'img_class'         => $args['img_class']
                    ]); ?>
                    <div class="<?php echo trim(implode(' ', ['cms-post-item-content', $args['content_class']])); ?>">
                        <div class="cms-post-item-title h3 text-20 text-va-30 lh-26 pb-12 mb-12  has-line"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo get_the_title($post->ID); ?></a></div>
                        <?php if((int)$excerpt_lenght > 0): ?>
                            <div class="cms-post-item-excerpt"><?php
                                if(!empty($post->post_excerpt)){
                                    echo wp_trim_words( $post->post_excerpt, $excerpt_lenght, $settings['excerpt_more_text'] );
                                }
                                else{
                                    $content = strip_shortcodes( $post->post_content );
                                    $content = apply_filters( 'the_content', $content );
                                    $content = str_replace(']]>', ']]&gt;', $content);
                                    echo wp_trim_words( $content, $excerpt_lenght, $settings['excerpt_more_text'] );
                                }
                            ?></div>
                        <?php endif;
                            soapee_elementor_button_render($widget, $settings, [
                                'class'     => trim(implode(' ',['cms-post-item-readmore mt-20', $args['readmore_class']])),
                                'post_id'   => $post->ID,
                                'overwrite' => true
                            ]); 
                        ?>
                    </div>
                </div>
            <?php
                break;
            } 
            ?>
            </div>
        <?php
        endforeach;
    }
}

if(!function_exists('soapee_elementor_get_post_grid')){
    function soapee_elementor_get_post_grid($posts = [], $widget, $settings = [], $args=[]){
        if(empty($posts) || !is_array($posts) || empty($settings) || !is_array($settings)){
            return false;
        }
        extract($settings);
        if($thumbnail_size != 'custom'){
            $img_size = $thumbnail_size;
        }
        elseif(!empty($thumbnail_custom_dimension['width']) && !empty($thumbnail_custom_dimension['height'])){
            $img_size = $thumbnail_custom_dimension['width'] . 'x' . $thumbnail_custom_dimension['height'];
        }
        else{
            $img_size = 'full';
        }
        
        $widget->add_render_attribute( 'item', [
            'class' => trim('cms-grid-item col-xl-'.round(12/$col_xl).' col-lg-'.round(12/$col_lg).' col-md-'.round(12/$col_md).' col-sm-'.round(12/$col_sm)),
            'style' => 'padding:'.($settings['gap']/2).'px;'
        ] );
        if(!empty($settings['gap_extra'])){
            $widget->add_render_attribute( 'item', [
                'style' => 'margin-bottom:'.($settings['gap_extra']).'px;'
            ] );
        }
        $widget->add_render_attribute( 'item-inner', [
            'class' => 'cms-grid-item-inner',
        ] );
        foreach ($posts as $post):
            ?>
            <div <?php etc_print_html($widget->get_render_attribute_string( 'item' )); ?>>
                <div <?php etc_print_html($widget->get_render_attribute_string( 'item-inner' )); ?>>
                    <?php switch ($settings['layout']) {
                        case '6': 
                    ?>
                        <div class="bg-white cms-box-shadow-13 cms-box-shadow-hover-14 cms-hover-zoom-img-1 cms-transition bdr-radius-15">
                            <?php soapee_post_media([
                                'id'                => $post->ID, 
                                'thumbnail_size'    => $img_size,
                                'default_thumb'     => true,
                                'class'             => 'mb-0 overflow-hidden'.$args['media_class'],
                                'img_class'         => 'w-100 '.$args['img_class']
                            ]); ?>
                            <div class="<?php echo trim(implode(' ', ['cms-post-item-content p-30', $args['content_class']])); ?>">
                                <div class="cms-post-meta-2 mb-15 clearfix"><?php 
                                    soapee_post_category([
                                        'post_id'   => $post->ID, 
                                        'class'     => 'cms-category-style-2', 
                                        'icon'      => '', 
                                        'text'      => '', 
                                        'separator' => ''
                                    ]);
                                    soapee_post_date(['id' => $post->ID, 'class' => '', 'icon' => '']);
                                ?></div>
                                <div class="cms-post-item-title h3 text-20 text-va-30 lh-26 pb-15"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php 
                                        echo get_the_title($post->ID); 
                                ?></a></div>
                                <div class="mb-15 clearfix"><?php 
                                    soapee_post_author([
                                        'class' => 'cms-author-style-2 mr-12'
                                    ]);
                                ?></div>
                                <?php if((int)$excerpt_lenght > 0): ?>
                                    <div class="cms-post-item-excerpt"><?php
                                        if(!empty($post->post_excerpt)){
                                            echo wp_trim_words( $post->post_excerpt, $excerpt_lenght, $settings['excerpt_more_text'] );
                                        }
                                        else{
                                            $content = strip_shortcodes( $post->post_content );
                                            $content = apply_filters( 'the_content', $content );
                                            $content = str_replace(']]>', ']]&gt;', $content);
                                            echo wp_trim_words( $content, $excerpt_lenght, $settings['excerpt_more_text'] );
                                        }
                                    ?></div>
                                <?php endif;
                                    soapee_elementor_button_render($widget, $settings, [
                                        'class'     => trim(implode(' ',['cms-post-item-readmore mt-20 text-uppercase', $args['readmore_class']])),
                                        'post_id'   => $post->ID,
                                        'overwrite' => true
                                    ]); 
                                ?>
                            </div>
                        </div>
                    <?php
                        break; 
                        default : 
                    ?>
                        <?php soapee_post_media([
                            'id'                => $post->ID, 
                            'thumbnail_size'    => $img_size,
                            'default_thumb'     => true,
                            'class'             => 'mb-30',
                            'img_class'         => 'bdr-radius-15 w-100'
                        ]); ?>
                        <div class="cms-grid-item-content">
                            <div class="cms-grid-item-title h3 text-20 text-va-30 lh-26 pb-12 mb-12"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo get_the_title($post->ID); ?></a></div>
                            <?php if((int)$excerpt_lenght > 0): ?>
                                <div class="cms-grid-item-excerpt m-b30"><?php
                                    if(!empty($post->post_excerpt)){
                                        echo wp_trim_words( $post->post_excerpt, $excerpt_lenght, $settings['excerpt_more_text'] );
                                    }
                                    else{
                                        $content = strip_shortcodes( $post->post_content );
                                        $content = apply_filters( 'the_content', $content );
                                        $content = str_replace(']]>', ']]&gt;', $content);

                                        echo wp_trim_words( $content, $excerpt_lenght, $settings['excerpt_more_text'] );
                                    }
                                ?></div>
                            <?php endif; ?>
                            <?php soapee_elementor_button_render($widget, $settings, ['class' => 'mt-20','post_id' => $post->ID,'overwrite' => true]); ?>
                        </div>
                    <?php break;
                        } ?>
                </div>
            </div>
        <?php
        endforeach;
    }
}

// Post List 
if(!function_exists('soapee_elementor_get_post_list')){
    function soapee_elementor_get_post_list($posts = [], $settings = []){
        if(empty($posts) || !is_array($posts) || empty($settings) || !is_array($settings)){
            return false;
        }
        extract($settings);
        if($thumbnail_size != 'custom'){
            $img_size = $thumbnail_size;
        }
        elseif(!empty($thumbnail_custom_dimension['width']) && !empty($thumbnail_custom_dimension['height'])){
            $img_size = $thumbnail_custom_dimension['width'] . 'x' . $thumbnail_custom_dimension['height'];
        }
        else{
            $img_size = 'full';
        }
        if (is_array($posts)):
            foreach ($posts as $post):
                $img_id = get_post_thumbnail_id($post->ID);
                $img    = etc_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $img_size,
                    'class'      => '',
                ));
                $thumbnail = $img['thumbnail'];
                $item_class = "grid-item col-12";
                $filter_class = etc_get_term_of_post_to_class($post->ID, array_unique($tax));
                $author = get_user_by('id', $post->post_author);
                ?>
                <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                    <div class="grid-item-inner">
                        <div class="row">
                            <?php soapee_post_media([
                                'id'             => $post->ID, 
                                'thumbnail_size' => $img_size,
                                'class'          => 'col-lg-auto col-md-12',
                            ]); ?>
                            <div class="entry-body col pt-30 pt-lg-0">
                                <?php if($show_meta == 'true'): 
                                    soapee_archive_meta([
                                        'show_date'   => false,
                                        'show_author' => $show_author,
                                        'show_cat'    => $show_categories,
                                        'show_cmt'    => $show_cmt,
                                        'post_id'     => $post->ID,
                                        'class'       => 'm-b15'  
                                    ]);
                                endif; 
                                if($show_title == 'true'): ?>
                                    <<?php etc_print_html($title_tag);?> class="entry-title text-uppercase m-b15"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo get_the_title($post->ID); ?></a></<?php etc_print_html($title_tag);?>>
                                <?php endif; 
                                if($show_excerpt == 'true'): ?>
                                    <div class="entry-content m-b30">
                                        <?php
                                            if(!empty($post->post_excerpt)){
                                                echo wp_trim_words( $post->post_excerpt, $num_words, $more = null );
                                            }
                                            else{
                                                $content = strip_shortcodes( $post->post_content );
                                                $content = apply_filters( 'the_content', $content );
                                                $content = str_replace(']]>', ']]&gt;', $content);
                                                echo wp_trim_words( $content, $num_words, '' );
                                            }
                                        ?>
                                    </div>
                                <?php endif;
                                if($show_button == 'true'): ?>
                                    <div class="entry-readmore">
                                        <a class="text-accent btn-text elementor-animation-<?php echo esc_attr($hover_animation); ?>" href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_html($button_text); ?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div> 
                    </div>
                </div>
            <?php
            endforeach;
        endif;
    }
}

// Service list 
if(!function_exists('soapee_elementor_get_service')){
    function soapee_elementor_get_service($posts = [], $settings = [], $widget, $args=[]){
        if(empty($posts) || !is_array($posts) || empty($settings) || !is_array($settings)){
            return false;
        }
        $args = wp_parse_args($args, [
            'class'         => '',
            'inner_class'   => 'bg-white',
            'show_readmore' => '',
            'overlay'       => false
        ]);
        extract($settings);
        if($thumbnail_size != 'custom'){
            $img_size = $thumbnail_size;
        }
        elseif(!empty($thumbnail_custom_dimension['width']) && !empty($thumbnail_custom_dimension['height'])){
            $img_size = $thumbnail_custom_dimension['width'] . 'x' . $thumbnail_custom_dimension['height'];
        }
        else{
            $img_size = 'full';
        }
        if($widget->get_setting('layout_mode') == 'carousel'){
            $widget->add_render_attribute( 'item', [
                'class' => 'carousel-item slick-slide'
            ] );
            $widget->add_render_attribute( 'item-inner', [
                'class' => 'carousel-item-inner'
            ] );
        } else {
            $widget->add_render_attribute( 'item', [
                'class' => trim('grid-item col-xl-'.$col_xl.' col-lg-'.$col_lg.' col-md-'.$col_md.' col-sm-'.$col_sm),
            ] );
            $widget->add_render_attribute( 'item-inner', [
                'class' => 'grid-item-inner',
                'style' => 'padding-left:'.esc_attr($gap_item).'px;padding-right:'.esc_attr($gap_item).'px; padding-bottom:'.esc_attr($gap_item*2).'px;'
            ] );
        }
        if (is_array($posts)):
            foreach ($posts as $post):
                $img_id = get_post_thumbnail_id($post->ID);
                $img = etc_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $img_size,
                    'class'      => '',
                ));
                $thumbnail = $img['thumbnail'];
                if($widget->get_setting('layout_mode') == 'carousel'){
                    $item_class = 'carousel-item slick-slide';
                } else {
                    $item_class = "grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-{$col_sm}";
                }
                $filter_class = etc_get_term_of_post_to_class($post->ID, array_unique($tax));
                $author = get_user_by('id', $post->post_author);

                if(!empty($post->post_excerpt)){ 
                    $content = wp_trim_words( $post->post_excerpt, 15, $more = null );
                }
                else{
                    $content = strip_shortcodes( $post->post_content );
                    $content = apply_filters( 'the_content', $content );
                    $content = str_replace(']]>', ']]&gt;', $content);
                    $content = wp_trim_words( $content, 15, '' );
                }
                if($args['show_readmore'] == '1') { 
                    $readmore = '
                        <a class="btn" href="'.esc_url(get_permalink( $post->ID )).'">'.esc_html__('Read More', 'soapee').'</a>
                    ';
                } else {
                    $readmore =  '';
                }

                $post_link = '<a class="cms-icon cms-icon-46 bdr-solid bdr-3 bdr-white text-white bdr-hover-accent text-hover-accent" href="'.esc_url(get_permalink( $post->ID )).'"><span class="fas fa-link"></span></a>';
                $post_img = '<a class="cms-icon cms-icon-46 bdr-solid bdr-3 bdr-white text-white bdr-hover-accent text-hover-accent" data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="'.esc_attr($html_id).'" href="'.wp_get_attachment_url($img_id).'"><span class="fas fa-search"></span></a>';

                $overlay_content = '
                    <div class="entry-title h4 m-b15 text-uppercase">
                        <a href="'.esc_url(get_permalink( $post->ID )).'">'.get_the_title($post->ID).'</a>
                    </div>
                    <div class="entry-content">'
                        . $content .
                    '</div>
                    <div class="entry-readmore m-t25">'
                        .$readmore.
                    '</div>
                ';
                ?>
                <div class="<?php echo trim(esc_attr($item_class.' '.$filter_class)); ?>">
                    <div <?php etc_print_html($widget->get_render_attribute_string( 'item-inner' )); ?>>
                        <div class="<?php echo trim(implode(' ', ['grid-item-content cms-overlay-wrap', $args['inner_class']]));?>">
                            <?php if (isset($settings['layout']) && $settings['layout'] == '3') { ?>
                                <?php soapee_post_media([
                                    'id'             => $post->ID, 
                                    'thumbnail_size' => $img_size,
                                    'class'          => '',
                                    'after'          => '<div class="cms-overlay-content d-flex align-items-end p-30 p-b20"><div class="cms-overlay-content-inner text-white">'.$overlay_content.'</div></div>'
                                ]); ?>
                            <?php } else { ?>
                                <?php soapee_post_media([
                                    'id'             => $post->ID, 
                                    'thumbnail_size' => $img_size,
                                    'class'          => '',
                                    'after'          => '<div class="cms-overlay-content cms-overlay-zoom-in d-flex align-items-center justify-content-center"><div class="cms-overlay-content-inner w-100 cms-icon-list">'.$post_link.$post_img.'</div></div>'
                                ]); ?>
                                <div class="entry-body p-30">
                                    <div class="entry-title h4 m-b15 text-uppercase">
                                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo  get_the_title($post->ID); ?></a>
                                    </div>
                                    <div class="entry-content"><?php printf('%s', $content); ?></div>
                                    <?php if($args['show_readmore'] == '1'): ?>
                                        <div class="entry-readmore m-t25">
                                            <a class="btn" href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_html__('Read More', 'soapee'); ?></a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
        endif;
    }
}

/* Load more post grid */
add_action( 'wp_ajax_soapee_elementor_load_more_post_grid', 'soapee_elementor_load_more_post_grid' );
add_action( 'wp_ajax_nopriv_soapee_elementor_load_more_post_grid', 'soapee_elementor_load_more_post_grid' );
if(!function_exists('soapee_elementor_load_more_post_grid')){
    function soapee_elementor_load_more_post_grid(){
        try{
            if(!isset($_POST['settings'])){
                throw new Exception(__('Something went wrong while requesting. Please try again!', 'soapee'));
            }
            $settings = $_POST['settings'];
            set_query_var('paged', $settings['paged']);
            extract(etc_get_posts_of_grid('post', [
                'source' => isset($settings['source'])?$settings['source']:'',
                'orderby' => isset($settings['orderby'])?$settings['orderby']:'date',
                'order' => isset($settings['order'])?$settings['order']:'desc',
                'limit' => isset($settings['limit'])?$settings['limit']:'6',
                'post_ids' => '',
            ]));
            ob_start();
            soapee_elementor_get_post_grid($posts, $settings, $widget);
            $html = ob_get_clean();
            wp_send_json(
                array(
                    'status' => true,
                    'message' => __('Load Successfully!', 'soapee'),
                    'data' => array(
                        'html' => $html,
                        'paged' => $settings['paged'],
                        'posts' => $posts,
                    ),
                )
            );
        }
        catch (Exception $e){
            wp_send_json(array('status' => false, 'message' => $e->getMessage()));
        }
        die;
    }
}
/* Load more post list */
add_action( 'wp_ajax_soapee_elementor_load_more_post_list', 'soapee_elementor_load_more_post_list' );
add_action( 'wp_ajax_nopriv_soapee_elementor_load_more_post_list', 'soapee_elementor_load_more_post_list' );
if(!function_exists('soapee_elementor_load_more_post_list')){
    function soapee_elementor_load_more_post_list(){
        try{
            if(!isset($_POST['settings'])){
                throw new Exception(__('Something went wrong while requesting. Please try again!', 'soapee'));
            }
            $settings = $_POST['settings'];
            set_query_var('paged', $settings['paged']);
            extract(etc_get_posts_of_grid('post', [
                'source' => isset($settings['source'])?$settings['source']:'',
                'orderby' => isset($settings['orderby'])?$settings['orderby']:'date',
                'order' => isset($settings['order'])?$settings['order']:'desc',
                'limit' => isset($settings['limit'])?$settings['limit']:'6',
                'post_ids' => '',
            ]));
            ob_start();
            soapee_elementor_get_post_list($posts, $settings);
            $html = ob_get_clean();
            wp_send_json(
                array(
                    'status' => true,
                    'message' => __('Load Successfully!', 'soapee'),
                    'data' => array(
                        'html' => $html,
                        'paged' => $settings['paged'],
                        'posts' => $posts,
                    ),
                )
            );
        }
        catch (Exception $e){
            wp_send_json(array('status' => false, 'message' => $e->getMessage()));
        }
        die;
    }
}