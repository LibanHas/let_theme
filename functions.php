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
			'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
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
    'primary-en' => __('Primary Menu English', 'understrap'),
    'primary-ja' => __('Primary Menu 日本語', 'understrap'),
    'top-en'     => __('Top Menu English', 'understrap'),
    'top-ja'     => __('Top Menu 日本語', 'understrap'),
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
        'supports' => array('title', 'editor', 'excerpt', 'custom-fields'), // 🟢 Now supports excerpt & ACF
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
	} elseif ($post_type === 'event') {
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

function set_new_member_menu_order( $post_id, $post, $update ) {
    // Only target 'member' post type and on creation (not updates)
    if ( $post->post_type !== 'member' || $update ) {
        return;
    }

    // Get the current highest menu_order
    $max_order = get_posts([
        'post_type'      => 'member',
        'posts_per_page' => 1,
        'orderby'        => 'menu_order',
        'order'          => 'DESC',
        'fields'         => 'ids',
    ]);

    $next_order = 0;
    if (!empty($max_order)) {
        $existing_post = get_post($max_order[0]);
        $next_order = (int) $existing_post->menu_order + 1;
    }

    // Update this new post's menu_order
    remove_action('save_post', 'set_new_member_menu_order', 10); // prevent infinite loop
    wp_update_post([
        'ID'         => $post_id,
        'menu_order'=> $next_order,
    ]);
    add_action('save_post', 'set_new_member_menu_order', 10, 3);
}
add_action('save_post', 'set_new_member_menu_order', 10, 3);

// Add custom filter dropdown to admin list view for 'member' post type
function add_member_type_admin_filter() {
    global $typenow;
    if ($typenow === 'member') {
        echo '';
    } else {
        return; // Exit if not on the member post type screen
    }

    $selected = $_GET['member_type'] ?? '';
    $options = [
        '' => 'すべてのメンバー種別',
        'faculty' => 'faculty',
        'student' => 'student',
        'alumni'  => 'alumni',
        'collaborator' => 'collaborator'
    ];

    echo '<select name="member_type">';
    foreach ($options as $value => $label) {
        printf(
            '<option value="%s"%s>%s</option>',
            esc_attr($value),
            selected($selected, $value, false),
            esc_html($label)
        );
    }
    echo '</select>';
}
add_action('restrict_manage_posts', 'add_member_type_admin_filter');


// Add custom column
function add_member_type_column($columns) {
    $columns['member_type'] = 'メンバー区分';
    return $columns;
}
add_filter('manage_member_posts_columns', 'add_member_type_column');

// Populate custom column
function show_member_type_column($column, $post_id) {
    if ($column === 'member_type') {
        $value = get_field('member_type', $post_id);
        echo esc_html($value ? $value : '—');
    }
}
add_action('manage_member_posts_custom_column', 'show_member_type_column', 10, 2);



function filter_members_by_member_type($query) {
    global $pagenow;

    // Only modify in admin when editing the 'member' list
    if (
        is_admin() &&
        $query->is_main_query() &&
        $pagenow === 'edit.php' &&
        isset($_GET['post_type']) &&
        $_GET['post_type'] === 'member' &&
        !empty($_GET['member_type'])
    ) {
        $query->set('meta_query', [
            [
                'key'     => 'member_type',
                'value'   => sanitize_text_field($_GET['member_type']),
                'compare' => '=',
            ]
        ]);
    }
}
add_action('pre_get_posts', 'filter_members_by_member_type');


function manually_assign_event_tags() {
    if (!is_admin() || !current_user_can('manage_options')) {
        return;
    }

    if (!isset($_GET['apply_event_tags']) || $_GET['apply_event_tags'] !== '1') {
        return;
    }

    $query = new WP_Query([
        'post_type' => 'event',
        'posts_per_page' => -1,
        'fields' => 'ids',
    ]);

    $tagged = 0;

    foreach ($query->posts as $post_id) {
        $category = get_field('event_category', $post_id);
        if ($category) continue;

        $title = get_the_title($post_id);
        $matched = '';

        if (str_contains($title, 'シンポジウム')) $matched = 'symposiums';
        elseif (str_contains($title, 'ワークショップ')) $matched = 'workshops';
        elseif (str_contains($title, '講演')) $matched = 'lectures';
        elseif (str_contains($title, 'カンファレンス')) $matched = 'conferences';
        elseif (str_contains($title, '出版')) $matched = 'publications';
        elseif (str_contains($title, 'メディア')) $matched = 'media';
        elseif (str_contains($title, '受賞')) $matched = 'awards';
        elseif (str_contains($title, 'プロジェクト')) $matched = 'projects';
        elseif (str_contains($title, 'コンテスト')) $matched = 'contests';
        elseif (str_contains($title, 'ニュース')) $matched = 'news';

        if ($matched) {
            update_field('event_category', $matched, $post_id);
            $tagged++;
        }
    }

    add_action('admin_notices', function () use ($tagged) {
        echo "<div class='notice notice-success is-dismissible'><p><strong>✅ {$tagged} events tagged.</strong></p></div>";
    });
}
add_action('admin_init', 'manually_assign_event_tags');



function enqueue_join_us_script() {
    wp_enqueue_script(
        'join-us-js',
        get_template_directory_uri() . '/js/join-us.js',
        array(), // dependencies if any (e.g., array('jquery'))
        false,   // version
        true     // load in footer
    );

    wp_localize_script('join-us-js', 'themeData', array(
        'baseUrl' => get_template_directory_uri()
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_join_us_script');


// Add Polylang language as a location rule for ACF
add_filter('acf/location/rule_types', function ($choices) {
    $choices['Post']['language'] = 'Language';
    return $choices;
});

add_filter('acf/location/rule_values/language', function ($choices) {
    // Manually define language options
    $choices['ja'] = 'Japanese';
    $choices['en'] = 'English';
    return $choices;
});

add_filter('acf/location/rule_match/language', function ($match, $rule, $options) {
    if (function_exists('pll_get_post_language') && isset($options['post_id'])) {
        $post_lang = pll_get_post_language($options['post_id']);
        if ($rule['operator'] === "==") {
            $match = ($post_lang === $rule['value']);
        } elseif ($rule['operator'] === "!=") {
            $match = ($post_lang !== $rule['value']);
        }
    }
    return $match;
}, 10, 3);



// Allow Polylang to use the same slug for different languages in URLs
add_filter( 'pll_get_the_terms', '__return_false' );
add_filter( 'pll_get_the_post_types', '__return_false' );

// Force WordPress to allow duplicate slugs for translated pages
add_filter( 'wp_unique_post_slug', function( $slug, $post_ID, $post_status, $post_type, $post_parent, $original_slug ) {
    if ( function_exists( 'pll_get_post' ) ) {
        $translated_post_ID = pll_get_post( $post_ID, pll_default_language() );
        if ( $translated_post_ID && $slug === $original_slug ) {
            return $original_slug; // Use the same slug for translation
        }
    }
    return $slug;
}, 10, 6 );











