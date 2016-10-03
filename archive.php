<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package AD Starter
 */

get_header();
?>

<div class="container">
	<div class="row">

		<div <?php hybrid_attr( 'primary' ); ?>>

			<?php
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();

					// Loads the content/archive/content.php template.
					hybrid_get_content_template();
				}
			} else {
				// Loads the content/content-none.php template.
				get_template_part( 'content/content', 'none' );
			}
			?>

		</div><!-- #primary -->

		<?php hybrid_get_sidebar( 'primary' ); // Loads the sidebar/primary.php template. ?>

	</div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>
