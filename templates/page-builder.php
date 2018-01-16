<?php
/**
 * Template Name: Page Builder
 *
 * This template displays Advanced Custom Fields
 * flexible content fields in a user-defined order.
 *
 * @package AD Starter
 */

get_header();
?>

<div class="template__page-builder">
  <div class="container">
      <div class="row">
          <div id="primary" class="col-sm-12">

            <?php
                // Flexible Content Rows
                get_template_part( 'components/flexible', 'modules' );

            ?>
            
    </div>
  </div>
</div><!-- /.page-builder -->

<?php get_footer(); ?>
