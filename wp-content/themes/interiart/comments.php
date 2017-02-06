<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>
        <div class="tzCommentContent">
            <h2 class="comments-title">
                <?php
                echo get_comments_number().' ';?><?php  esc_html_e('Comments','interiart');
                ?>
            </h2>

            <?php interiart_comment_nav(); ?>

            <ol class="comment-list">
                <?php
                wp_list_comments( array(
                    'callback'    => 'interiart_comment',
                    'style'       => 'ol',
                ) );
                ?>
            </ol><!-- .comment-list -->

            <?php interiart_comment_nav(); ?>
        </div>

    <?php endif; // have_comments() ?>

    <div class="tzCommentForm">
        <?php
        // If comments are closed and there are comments, let's leave a little note, shall we?
        if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
            ?>
            <p class="no-comments"><?php  esc_html_e( 'Comments are closed.', 'interiart'); ?></p>
        <?php endif; ?>
        <?php

        $aria_req = ( $req ? " aria-required='true'" : '' );
        $args = array(
            'comment_notes_after' => '',
            'fields' => apply_filters( 'comment_form_default_fields',
                array(
                    'author' => '<div class="row tzCommentForm_Top"><p class="comment-form-author col-lg-4 col-md-4 col-sm-12 col-xs-12">' . '<label for="author">' .  esc_html__( 'Name','interiart') . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                        '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' placeholder="'.( $req ? 'Name' : '' ).'" /></p>',
                    'email'  => '<p class="comment-form-email col-lg-4 col-md-4 col-sm-12 col-xs-12"><label for="email">' .  esc_html__( 'Email','interiart') . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                        '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . ' placeholder="'.( $req ? 'Email' : '' ).'" /></p>',
                    'url'    => '<p class="comment-form-url col-lg-4 col-md-4 col-sm-12 col-xs-12"><label for="url">' .  esc_html__( 'Website','interiart') . '</label> ' .
                        '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" placeholder="'.( $req ? 'Website' : '' ).'"/></p></div>',
                )
            ),
            'comment_field'        => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment','noun','interiart') . '</label> <textarea id="comment" name="comment" cols="45" rows="8" required="required" placeholder="Your Comment"></textarea></p>',
            'label_submit'      =>  esc_html__( 'Post Comment','interiart'),
        );
        ?>
        <?php comment_form( $args ); ?>
    </div>

</div><!-- .comments-area -->
