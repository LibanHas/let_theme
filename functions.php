<?php
/**
 * UnderStrap functions and definitions
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// UnderStrap's includes directory.
$understrap_inc_dir = 'inc';

// Array of files to include.
$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/editor.php',                          // Load Editor functions.
	'/block-editor.php',                    // Load Block Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

// Load WooCommerce functions if WooCommerce is activated.
if ( class_exists( 'WooCommerce' ) ) {
	$understrap_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if ( class_exists( 'Jetpack' ) ) {
	$understrap_includes[] = '/jetpack.php';
}

// Include files.
foreach ( $understrap_includes as $file ) {
	require_once get_theme_file_path( $understrap_inc_dir . $file );
}

function theme_enqueue_styles() {
    // Enqueue main styles
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/dist/css/style.css', array(), null, 'all');
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');


function enqueue_custom_scripts() {
    // Enqueue the custom hamburger menu JavaScript
    wp_enqueue_script('hamburger-menu-js', get_template_directory_uri() . '/js/hamburger-menu.js', array('jquery'), null, true);

    // Enqueue any other styles or scripts
   // wp_enqueue_style('custom-hamburger-style', get_template_directory_uri() . '/css/hamburger-style.css');
}

add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');
