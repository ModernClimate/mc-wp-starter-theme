<?php
/**
 * The template for displaying all single posts.
 *
 * @package MC
 */

get_header(); ?>

    <div class="container flex space-x-2 mx-auto">
        <main id="primary" class="w-full md:w-3/4">
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
        </main><!-- /#primary -->

        <?php get_sidebar(); ?>
    </div>

<?php get_footer();
