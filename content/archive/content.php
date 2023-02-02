<?php

/**
 * @package MC
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if (has_post_thumbnail()) : ?>
        <div class="entry__thumb">
            <?php the_post_thumbnail(); ?>
        </div>
    <?php endif; ?>

    <header class="entry__header">
        <?php
        the_title(
            sprintf(
                '<h1 class="hdg hdg--1"><a href="%s" rel="bookmark">',
                esc_url(get_permalink())
            ),
            '</a></h1>'
        );
        ?>
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