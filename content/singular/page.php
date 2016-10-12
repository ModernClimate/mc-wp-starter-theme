<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package AD Starter
 */
?>

<article <?php hybrid_attr( 'post' ); ?>>

    <header class="entry__header">
        <?php the_title( '<h1 class="hdg hdg--1">', '</h1>' ); ?>
    </header><!-- .entry__header -->

    <div class="entry__content">
        <?php
        the_content();

        wp_link_pages( [
            'before' => '<div class="page-links">' . __( 'Pages:', 'ad-starter' ),
            'after'  => '</div>',
        ] );
        ?>
    </div><!-- .entry__content -->

    <footer class="entry__footer">
        <?php edit_post_link( __( 'Edit', 'ad-starter' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry__footer -->

</article><!-- #post-## -->
