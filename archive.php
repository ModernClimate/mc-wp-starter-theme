<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package AD Starter
 */

get_header(); ?>

    <div class="container">
        <div class="row">
            <div id="primary" class="col-sm-8">
                <?php
                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();
                        // Loads the content/singular/page.php template.
                        get_template_part( 'content/archive/content' );
                    }
                } else {
                    // Loads the content/singular/page.php template.
                    get_template_part( 'content/content', 'none' );
                }
                ?>
            </div><!-- /#primary -->

            <?php get_sidebar(); ?>
        </div>
    </div>

<?php get_footer();
