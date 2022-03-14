<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- skip to main content -->
<a href="#primary" class="screen-reader-text"><?php _e('Skip to Main Content', 'mc-starter'); ?></a>

<header id="masthead" class="header" role="banner">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primary-menu"
                    aria-controls="primary-menu" aria-expanded="false"
                    aria-label="<?php _e('Toggle navigation', 'mc-starter'); ?>">
                <span class="navbar-toggler-icon"></span>
            </button>

            <?php
            // Loads the menu/primary.php template.
            get_template_part('menu/primary');
            ?>
        </div>
    </nav>
</header><!-- .header -->