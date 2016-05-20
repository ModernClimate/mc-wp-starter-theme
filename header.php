<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <title><?php wp_title(); ?></title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#primary-menu">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
    </div>
    <?php wp_nav_menu(array(
      'menu_class'        => 'nav navbar-nav',
      'container_class'   => 'collapse navbar-collapse',
      'container_id'      => 'primary-menu',
      'fallback_cb'       => false,
      'depth'             => 1,
      'theme_location'    => 'primary'
    )); ?>
  </div>
</nav>

<div class="container">
