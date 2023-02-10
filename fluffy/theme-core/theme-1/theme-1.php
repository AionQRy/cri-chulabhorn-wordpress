<?php
function vtheme_style() {
	wp_enqueue_style( 'theme-core-1-css', get_stylesheet_directory_uri() . '/theme-core/theme-1/theme-1.css', array(), wp_get_theme()->get( 'Version' ), 'all');
	wp_enqueue_script( 'theme-core-1-js', get_stylesheet_directory_uri() . '/theme-core/theme-1/js/theme-1.js', array(), wp_get_theme()->get( 'Version' ), 'all');
    wp_enqueue_style( 'theme-header-1-css', get_stylesheet_directory_uri() . '/theme-core/theme-1/css/header-1.css', array(), wp_get_theme()->get( 'Version' ), 'all');
    wp_enqueue_style( 'theme-footer-1-css', get_stylesheet_directory_uri() . '/theme-core/theme-1/css/footer-1.css', array(), wp_get_theme()->get( 'Version' ), 'all');
}
add_action( 'wp_enqueue_scripts', 'vtheme_style' , 20 );
?>
