<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head <?php hybrid_attr( 'head' ); ?>>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header <?php hybrid_attr( 'header' ); ?>>
	<nav class="navbar navbar-default">
		<div <?php hybrid_attr( 'layout' ); ?>>
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#primary-menu">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
			</div>

			<?php hybrid_get_menu( 'primary' ); // Loads the menu/primary.php template. ?>
		</div>
	</nav>
</header><!-- .header -->