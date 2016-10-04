<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package AD Starter
 */

get_header(); ?>

<div <?php hybrid_attr( 'layout' ); ?>>
	<div class="row">

		<div <?php hybrid_attr( 'primary', hybrid_get_theme_layout() ); ?>>

			<?php hybrid_get_menu( 'breadcrumb' ); // Loads the menu/breadcrumb.php template. ?>

			<?php
			while ( have_posts() ) {
				the_post();

				// Loads the content/singular/page.php template.
				hybrid_get_content_template();
		
				// Flexible Content Rows
				get_template_part( 'components/flexible', 'modules' );
			}
			?>

		</div><!-- /#primary -->

		<?php hybrid_get_sidebar( 'primary' ); // Loads the sidebar/primary.php template. ?>

	</div><!-- /.row -->
</div><!-- /.container -->

<?php get_footer(); ?>
