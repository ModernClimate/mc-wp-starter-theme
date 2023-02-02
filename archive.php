<?php

/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package MC
 */

get_header(); ?>

<div class="uk-container uk-container-large">
    <div uk-grid>
        <div id="primary" class="uk-width-3-4@s">
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
        </div><!-- /#primary -->

        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer();
