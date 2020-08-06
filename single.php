<?php
/**
 * The template for displaying all single posts.
 *
 * @package MC
 */

get_header(); ?>

    <div class="container">
        <div class="row">
            <div id="primary" class="col-sm-8">
                <?php
                while (have_posts()) {
                    the_post();
                    // Loads the content/singular/page.php template.
                    get_template_part('content/singular/' . get_post_type());
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                }
                ?>
            </div><!-- /#primary -->

            <?php get_sidebar(); ?>
        </div>
    </div>

<?php get_footer();