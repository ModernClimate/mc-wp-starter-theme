<?php

/**
 * The template used for displaying page content in page.php
 *
 * @package MC
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry__header">
        <?php the_title('<h1 class="hdg hdg--1">', '</h1>'); ?>
    </header><!-- .entry__header -->

    <div class="entry__content">
        <?php
        the_content();
        wp_link_pages([
            'before' => '<div class="page-links">' . __('Pages:', 'mc-starter'),
            'after'  => '</div>',
        ]);
        ?>
    </div><!-- .entry__content -->

</article><!-- #post-## -->