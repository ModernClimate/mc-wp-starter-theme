<?php get_header(); ?>

<div class="row">
  <div class="col-md-8">
    <h1><?php printf( 'Search Results for: %s', get_search_query() ); ?></h1>
    <?php if( have_posts() ): ?>
      <?php while( have_posts() ): the_post(); ?>
        <h2>
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        <?php the_excerpt(); ?>
      <?php endwhile; wp_reset_query(); ?>
    <?php else: ?>
      <h2>Nothing Found</h2>
      <p>
        Sorry, but nothing matched your search criteria. Please try again with some different keywords.
      </p>
    <?php endif; ?>

    <?php if( $wp_query->max_num_pages > 1 ): ?>
      <nav>
        <ul class="pager">
          <li class="previous"><?php previous_posts_link( 'Prev' ); ?></li>
          <li class="next"><?php next_posts_link( 'Next' ); ?>></li>
        </ul>
      </nav>
    <?php endif; ?>
  </div>

  <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
