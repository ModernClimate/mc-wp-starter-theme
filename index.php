<?php get_header(); ?>

<div class="row">
  <div class="col-md-8">
    <?php if( have_posts() ): ?>
      <?php while( have_posts() ): the_post(); ?>
        <h2>
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        <?php the_excerpt(); ?>
      <?php endwhile; wp_reset_query(); ?>
    <?php else: ?>
      <h2>No posts found</h2>
    <?php endif; ?>

    <?php if( $wp_query->max_num_pages > 1 ): ?>
      <nav>
        <ul class="pager">
          <li class="previous"><?php previous_posts_link( 'Prev' ); ?></li>
          <li class="next"><?php next_posts_link( 'Next' ); ?></li>
        </ul>
      </nav>
    <?php endif; ?>
  </div>

  <div class="col-md-4 sidebar">
    <?php get_sidebar(); ?>
  </div>
</div>

<?php get_footer(); ?>
