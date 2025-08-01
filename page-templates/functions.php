<?php
/**
 * UnderStrap functions and definitions
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// UnderStrap's includes directory.
$understrap_inc_dir = 'inc';

// Array of files to include.
$understrap_includes = array(
	'/theme-settings.php',
	'/setup.php',
	'/widgets.php',
	'/enqueue.php',
	'/template-tags.php',
	'/pagination.php',
	'/hooks.php',
	'/extras.php',
	'/customizer.php',
	'/custom-comments.php',
	'/class-wp-bootstrap-navwalker.php',
	'/editor.php',
	'/block-editor.php',
	'/deprecated.php',
);

// Load WooCommerce functions if WooCommerce is activated.
if ( class_exists( 'WooCommerce' ) ) {
	$understrap_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activated.
if ( class_exists( 'Jetpack' ) ) {
	$understrap_includes[] = '/jetpack.php';
}

// Include files.
foreach ( $understrap_includes as $file ) {
	require_once get_theme_file_path( $understrap_inc_dir . $file );
}

/**
 * Enqueue custom styles and scripts
 */
function enqueue_custom_theme_scripts() {
	// Custom main theme style
	wp_enqueue_style('theme-style', get_template_directory_uri() . '/css/theme-bootstrap4.min.css', array(), null, 'all');

	// Hamburger menu script
	wp_enqueue_script('hamburger-menu-js', get_template_directory_uri() . '/js/hamburger-menu.js', array('jquery'), null, true);

	// Scroll animation script
	wp_enqueue_script('animations', get_template_directory_uri() . '/js/animations.js', array(), null, true);

	// Tagline animation script
	wp_enqueue_script('tagline-test', get_template_directory_uri() . '/js/tagline-test.js', array(), null, true);

	// Admissions steps interaction
	wp_enqueue_script('admissions-steps', get_template_directory_uri() . '/js/admissions-steps.js', array(), null, true);

	// Accordion interaction script
	wp_enqueue_script('accordion', get_stylesheet_directory_uri() . '/js/accordion.js', array(), null, true);

	// Swiper styles and scripts
	wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
	wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_theme_scripts');

/**
 * Register Member Custom Post Type
 */
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

/**
 * Register Member Group Custom Taxonomy
 */
function register_member_group_taxonomy() {
	register_taxonomy('member_group', 'member', array(
		'labels' => array(
			'name' => 'メンバー区分',
			'singular_name' => 'メンバー区分',
		),
		'public' => true,
		'hierarchical' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_rest' => true,
		'rewrite' => array('slug' => 'member-group'),
	));
}
add_action('init', 'register_member_group_taxonomy');

function enqueue_aos_scripts() {
	wp_enqueue_style('aos-style', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css', array(), '2.3.4');
	wp_enqueue_script('aos-script', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js', array('jquery'), '2.3.4', true);

	wp_add_inline_script('aos-script', 'AOS.init({
		duration: 800,
		easing: "ease-out-back",
		once: true
	});');
}
add_action('wp_enqueue_scripts', 'enqueue_aos_scripts');

register_nav_menus(array(
	'primary' => __('Side Menu', 'understrap'), // for your hamburger/side nav
	'top'     => __('Top Menu', 'understrap'),  // for the few key links in the header
  ));
  

function add_publications_body_class( $classes ) {
    if ( is_page_template( 'page-templates/page-publications.php' ) ) {
        $classes[] = 'page-publications-scrollfix';
    }
    return $classes;
}
add_filter( 'body_class', 'add_publications_body_class' );


function register_news_post_type() {
    register_post_type('news', array(
        'labels' => array(
            'name' => 'News',
            'singular_name' => 'News',
            'add_new_item' => 'Add New News Item',
            'edit_item' => 'Edit News Item',
            'new_item' => 'New News Item',
            'view_item' => 'View News Item',
            'search_items' => 'Search News',
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'news'),
        'menu_position' => 5,
        'menu_icon' => 'dashicons-megaphone',
        'supports' => array('title', 'excerpt', 'custom-fields'), // 🟢 Now supports excerpt & ACF
        'show_in_rest' => true, // 🟢 Enables Gutenberg & REST support
    ));
}
add_action('init', 'register_news_post_type');


function register_news_taxonomy() {
    register_taxonomy('news_category', 'news', array(
        'labels' => array(
            'name' => 'News Categories',
            'singular_name' => 'News Category',
        ),
        'hierarchical' => false,
        'public' => true,
        'show_in_rest' => true, // 🟢 Important for block editor
    ));
}
add_action('init', 'register_news_taxonomy');


function register_custom_post_type_event() {

	register_post_type('event', [
	  'labels' => [
		'name' => 'Events',
		'singular_name' => 'Event',
		'add_new_item' => 'Add New Event',
		'edit_item' => 'Edit Event',
		'new_item' => 'New Event',
		'view_item' => 'View Event',
		'search_items' => 'Search Events',
		'not_found' => 'No events found',
		'not_found_in_trash' => 'No events found in trash'
	  ],
	  'public' => true,
	  'has_archive' => true,
	  'rewrite' => ['slug' => 'events'],
	  'menu_icon' => 'dashicons-calendar-alt',
	  'supports' => ['title', 'editor', 'thumbnail'],
	  'show_in_rest' => true,
	]);
  }
  add_action('init', 'register_custom_post_type_event');
  
  function enqueue_swiper_assets() {
	wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
	wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], null, true);
  }
  add_action('wp_enqueue_scripts', 'enqueue_swiper_assets');
  
  function sync_update_date_field($post_id) {
	// Prevent infinite loop
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
	if (wp_is_post_revision($post_id)) return;
  
	$post_type = get_post_type($post_id);
  
	if ($post_type === 'news') {
	  $news_date = get_field('news_date', $post_id);
	  if ($news_date) {
		update_field('update_date', $news_date, $post_id);
	  }
	} elseif ($post_type === 'events') {
	  $event_date = get_field('event_date', $post_id);
	  if ($event_date) {
		update_field('update_date', $event_date, $post_id);
	  }
	}
  }
  add_action('acf/save_post', 'sync_update_date_field', 20);
  
  // Manual sync for existing news and event posts
function manually_sync_update_dates() {
    // Only allow admin users to run this
    if (!is_admin() || !current_user_can('manage_options')) {
        return;
    }

    // Only run if explicitly triggered via URL
    if (!isset($_GET['sync_updates']) || $_GET['sync_updates'] !== '1') {
        return;
    }

    $query = new WP_Query([
        'post_type' => ['news', 'event'],
        'posts_per_page' => -1,
        'fields' => 'ids',
    ]);

    $synced = 0;

    foreach ($query->posts as $post_id) {
        $type = get_post_type($post_id);
        if ($type === 'news') {
            $d = get_field('news_date', $post_id);
        } elseif ($type === 'event') {
            $d = get_field('event_date', $post_id);
        }

        if ($d) {
            update_field('update_date', $d, $post_id);
            $synced++;
        }
    }

    add_action('admin_notices', function () use ($synced) {
        echo "<div class='notice notice-success is-dismissible'><p><strong>✅ Synced {$synced} posts.</strong></p></div>";
    });
}
add_action('admin_init', 'manually_sync_update_dates');


