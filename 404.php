<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package AD Starter
 */

get_header(); ?>

	<div class="container">
		<div class="row">

			<div <?php hybrid_attr( 'primary' ); ?>>

				<header class="entry__header">
					<h1 class="hdg hdg--1">
						<?php _e( 'Page Not Found', 'ad-starter' ); ?>
					</h1>
				</header><!-- /.entry__header -->

				<div class="entry__content">
					<?php
					_e( '<p>It looks like the page you&rsquo;re looking for doesn&rsquo;t exist. Perhaps a quick look through these pages will help you find what you&rsquo;re looking for:</p>', 'ad-starter' );

					hybrid_get_menu( 'primary' ); // Loads the menu/primary.php template.
					?>
				</div><!-- /.entry__content -->

			</div><!-- /#primary -->

			<?php hybrid_get_sidebar( 'primary' ); // Loads the sidebar/primary.php template. ?>

		</div><!-- /.row -->
	</div><!-- /.container -->

<?php get_footer(); ?>