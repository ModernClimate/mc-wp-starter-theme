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
					_e( '<p>It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.</p>', 'ad-starter' );

					get_search_form();
					?>
				</div><!-- /.entry__content -->

			</div><!-- /#primary -->

			<?php hybrid_get_sidebar( 'primary' ); // Loads the sidebar/primary.php template. ?>

		</div><!-- /.row -->
	</div><!-- /.container -->

<?php get_footer(); ?>