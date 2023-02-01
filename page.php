<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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
                get_template_part('content/singular/page');
            } ?>
        </main><!-- /#primary -->

        <?php get_sidebar(); ?>
    </div>

<?php get_footer();
