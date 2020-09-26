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
if($post_comments_form_on) : ?>
    <div id="comments" class="comments-area mt-35">
        <?php
        // You can start editing here -- including this comment!
        if ( have_comments() ) : ?>
            <div class="comment-list-wrap">
                <h2 class="comments-title"><?php echo esc_html__('Comments', 'soapee') ?></h2>
                <?php //the_comments_navigation(); ?>
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
        comment_form(soapee_comment_form_args());
    ?>
    </div>
<?php endif;