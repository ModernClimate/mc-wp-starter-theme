<?php
/**
 * Template Name: Page Builder
 *
 * This template displays Advanced Custom Fields
 * flexible content fields in a user-defined order.
 *
 * @package AD Starter
 */

get_header(); ?>

    <div class="container">
        <div class="row">
            <div id="primary" class="col-sm-8">
                <?php
                while (have_posts()) {
                    the_post();
                    // Loads the content/singular/page.php template.
                    get_template_part('content/singular/page');

                    // hook: App/Fields/Modules/outputFlexibleModules()
                    do_action('ad/modules/output', get_the_ID());
                }
                ?>
            </div><!-- /#primary -->

            <?php get_sidebar(); ?>
        </div>
    </div>

<?php get_footer();
