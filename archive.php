<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package MC
 */

get_header(); ?>

    <div class="container flex space-x-2 mx-auto">
        <main id="primary" class="w-full md:w-3/4">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    // Loads the content/singular/page.php template.
                    get_template_part('content/archive/content');
                }
            } else {
                // Loads the content/singular/page.php template.
                get_template_part('content/content', 'none');
            }
            ?>
        </main><!-- /#primary -->

        <?php get_sidebar(); ?>
    </div>

<?php get_footer();
