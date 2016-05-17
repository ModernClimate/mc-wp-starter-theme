<?php

add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );
add_action( 'wp_enqueue_scripts', 'enqueue_styles' );

function enqueue_scripts() {

  wp_dequeue_script( 'jquery-migrate' ); 

  wp_register_script(
    'bower',
    AD_THEME_PATH_URL . 'assets/dist/bower.js',
    array( 'jquery' )
  );

  wp_register_script(
    'global',
    AD_THEME_PATH_URL . 'assets/dist/global.js',
    array( 'bower' )
  );
  wp_enqueue_script( 'global' );
}

function enqueue_styles() {
  wp_register_style(
    'style',
    AD_THEME_PATH_URL . 'assets/dist/style.css'
  );
  wp_enqueue_style( 'style' );
}
