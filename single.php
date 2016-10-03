<?php
/**
 * The template for displaying all single posts.
 *
 * @package AD Starter
 */

get_header(); ?>

	<div class="container">
		<div class="row">

			<div <?php hybrid_attr( 'primary', hybrid_get_theme_layout() ); ?>>

				<?php
				while ( have_posts() ) {
					the_post();

					// Loads the content/singular/content.php template.
					hybrid_get_content_template();

					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				}
				?>

			</div><!-- /#primary -->

			<?php hybrid_get_sidebar( 'primary' ); // Loads the sidebar/primary.php template. ?>

		</div><!-- /.row -->
	</div><!-- /.container -->

<?php get_footer(); ?>