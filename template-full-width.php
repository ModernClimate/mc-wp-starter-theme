<?php
  /* Template Name: Full Width */
  get_header();
?>

<div class="row">
  <div class="col-xs-12">
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
      include( AD_THEME_DIR . 'inc/flex-content/flex-content.php' );
    ?>
  </div>

</div>

<?php get_footer(); ?>
