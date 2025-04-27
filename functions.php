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

function register_member_post_type() {
    register_post_type('member',
        array(
            'labels' => array(
                'name' => __('Members'),
                'singular_name' => __('Member'),
                'add_new' => __('Add New Member'),
                'add_new_item' => __('Add New Member'),
                'edit_item' => __('Edit Member'),
                'new_item' => __('New Member'),
                'view_item' => __('View Member'),
                'search_items' => __('Search Members'),
                'not_found' => __('No members found'),
                'not_found_in_trash' => __('No members found in Trash'),
                'all_items' => __('All Members'),
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'member'),
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_position' => 5,
            'menu_icon' => 'dashicons-groups',
            'show_in_rest' => true,
            'taxonomies' => array('member_group'),
        )
    );
}
add_action('init', 'register_member_post_type');


function register_member_group_taxonomy() {
	register_taxonomy('member_group', 'member', array(
		'labels' => array(
			'name' => 'メンバー区分',
			'singular_name' => 'メンバー区分',
		),
		'public' => true,
		'hierarchical' => true, // ✅ Change this to true
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_rest' => true,
		'rewrite' => array('slug' => 'member-group'),
	));
}


add_action('init', 'register_member_group_taxonomy');

  

add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');
