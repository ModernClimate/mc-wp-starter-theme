<?php

/**
 * The template for displaying comments.
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 *
 * @package MC
 */

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>
        <h2 class="comments-title"><?php comments_number(); ?></h2>

        <?php the_comments_navigation(); ?>

        <ol class="comment-list">
            <?php
            wp_list_comments([
                'style'      => 'ol',
                'short_ping' => true
            ]);
            ?>
        </ol><!-- .comment-list -->

        <?php the_comments_navigation(); ?>

    <?php endif; // Check for have_comments(). 
    ?>

    <?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
    ?>
        <p class="no-comments"><?php _e('Comments are closed.', 'mc-starter'); ?></p>
    <?php endif; ?>

    <?php comment_form(); // Loads the comment form. 
    ?>

</div><!-- .comments-area -->