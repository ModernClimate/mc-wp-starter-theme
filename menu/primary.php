<?php
/**
 * The Primary Site navigation
 *
 * @package AD Starter
 */

use AD\App\Menus\PrimaryMenuWalker;

?>

<?php if ( has_nav_menu( 'primary' ) ) : // Check if there's a menu assigned to the 'primary' location. ?>
	<div <?php hybrid_attr( 'menu', 'primary' ); ?>>
		<?php
		wp_nav_menu( [
			'theme_location'  => 'primary',
			'menu_class'      => 'nav navbar-nav',
			'container_class' => 'collapse navbar-collapse',
			'container_id'    => 'primary-menu',
			'fallback_cb'     => false,
			'depth'           => 2,
			'walker'          => new PrimaryMenuWalker()
		] );
		?>
	</div><!-- /#menu-primary -->
<?php endif; // End check for menu. ?>