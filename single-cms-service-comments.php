<?php
/**
 * The template for displaying comments.
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @package Soapee
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}
$post_comments_form_on = soapee_get_opt( 'post_comments_form_on', true );

$comments_number = absint( get_comments_number() );


if($post_comments_form_on) : ?>
    <div id="comments" class="comments-area mt-35">
        <?php
        // You can start editing here -- including this comment!
        if ( have_comments() ) : ?>
            <div class="comment-list-wrap">
                <h3 class="comments-title text-25"><?php echo esc_html__('Customer Reviews', 'soapee') ?></h2>
                <div class="row justify-content-between mb-40">
                    <div class="text-17 text-primary font-700 col p-tb-5"><?php 
                        printf(
                            /* translators: 1: Number of comments, 2: Post title. */
                            _nx(
                                '<span class="text-accent">%1$s</span> Review for %2$s',
                                '<span class="text-accent">%1$s</span> Reviews for %2$s',
                                $comments_number,
                                'comments title',
                                'soapee'
                            ),
                            number_format_i18n( $comments_number ),
                            get_the_title()
                        );
                        
                        //the_comments_navigation(); ?>
                    </div>
                    <div class="col-12 col-md-auto p-tb-5">
                        <div class="row">
                            <div class="col"><?php 
                                echo soapee_comment_rating_display_feedback([
                                    'mode' => 'good',
                                    'text' => esc_html__('xxpositive feedback', 'soapee')
                                ]);
                            ?></div>
                            <div class="col-12 col-md-auto"><?php
                                echo soapee_comment_rating_display_feedback([
                                    'mode' => 'bad',
                                    'text' => esc_html__('xxnegative feedback','soapee')
                                ]);
                            ?></div>
                        </div>
                    </div>
                </div>
                <ol class="commentlist">
                    <?php
                        wp_list_comments( array(
                            'style'      => 'ul',
                            'short_ping' => true,
                            'callback'   => 'soapee_comment_list'
                        ) );
                    ?>
                </ol>
                <nav class="navigation comments-pagination mt-50 empty-none"><?php 
                    //the_comments_navigation(); 
                    paginate_comments_links([
                        'prev_text' => soapee_pagination_prev_text(),
                        'next_text' => soapee_pagination_next_text()
                    ]); 
                ?></nav>
            </div>
            <?php if ( ! comments_open() ) : ?>
                <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'soapee' ); ?></p>
            <?php
            endif;

        endif; // Check for have_comments().
        //comment_form(soapee_comment_form_args());
    ?>
    </div>
<?php endif;