<?php get_header(); ?>

<div class="row">
  <div class="col-md-8">
    <?php
      // "The Loop"
      if( have_posts() ) {
        while( have_posts() ) {
          the_post();
          echo "<h1>" . get_the_title() . "</h1>";
          the_content();
        }
      }

      // Flexible Content Rows
      if ( function_exists('have_rows') ) {
        if( have_rows('content_rows') ) {
          while ( have_rows('content_rows') ) {
            the_row();
            switch( get_row_layout() ) {
              case 'columns_row':
                include( AD_THEME_DIR . 'inc/flex-content/columns.php' );
                break;
              case 'slideshow':
                include( AD_THEME_DIR . 'inc/flex-content/slideshow.php' );
                break;
            }
          }
        }
      }
    ?>
  </div>

  <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
