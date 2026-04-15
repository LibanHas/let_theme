<?php
// ✅ Fallback for missing wp_admin_headers
if (!function_exists('wp_admin_headers')) {
    function wp_admin_headers() {
        // Do nothing, fallback function to prevent fatal error
    }
}

/**
 * UnderStrap functions and definitions
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

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
if (class_exists('WooCommerce')) {
    $understrap_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activated.
if (class_exists('Jetpack')) {
    $understrap_includes[] = '/jetpack.php';
}

// Include files.
foreach ($understrap_includes as $file) {
    require_once get_theme_file_path($understrap_inc_dir . $file);
}

/**
 * ==================================================
 * ASSETS / SCRIPTS / STYLES
 * ==================================================
 *
 * All frontend CSS and JS enqueues live here.
 * If you need to add a new script, start here.
 */

function enqueue_custom_theme_scripts()
{
    // Custom main theme style — version tied to file mtime for automatic cache-busting
    $css_path = get_template_directory() . '/css/theme-bootstrap4.min.css';
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/css/theme-bootstrap4.min.css', array(), filemtime($css_path), 'all');

    // Hamburger menu script
    $hamburger_path = get_template_directory() . '/js/hamburger-menu.js';
    wp_enqueue_script('hamburger-menu-js', get_template_directory_uri() . '/js/hamburger-menu.js', array('jquery'), filemtime($hamburger_path), true);

    // Scroll animation script
    wp_enqueue_script('animations', get_template_directory_uri() . '/js/animations.js', array(), null, true);

    // Tagline animation script
    wp_enqueue_script('tagline-test', get_template_directory_uri() . '/js/tagline-test.js', array(), null, true);

    // Admissions steps interaction
    wp_enqueue_script('admissions-steps', get_template_directory_uri() . '/js/admissions-steps.js', array(), null, true);

    // Accordion interaction script //
    wp_enqueue_script('accordion', get_stylesheet_directory_uri() . '/js/accordion.js', array(), null, true);

    // Swiper styles and scripts
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_theme_scripts');

function enqueue_aos_scripts()
{
    wp_enqueue_style('aos-style', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css', array(), '2.3.4');
    wp_enqueue_script('aos-script', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js', array('jquery'), '2.3.4', true);

    wp_add_inline_script('aos-script', 'AOS.init({
        duration: 800,
        easing: "ease-out-back",
        once: true
    });');
}
add_action('wp_enqueue_scripts', 'enqueue_aos_scripts');


function enqueue_join_us_script()
{
    wp_enqueue_script(
        'join-us-js',
        get_template_directory_uri() . '/js/join-us.js',
        array(),
        false,
        true
    );

    wp_localize_script('join-us-js', 'themeData', array(
        'baseUrl' => get_template_directory_uri()
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_join_us_script');



/**
 * Register Member Custom Post Type
 */
function register_member_post_type()
{
    register_post_type('member', array(
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
        'rewrite' => array(
            'slug' => 'member', // Use a static slug here
        ),
        'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
        'menu_position' => 5,
        'menu_icon' => 'dashicons-groups',
        'show_in_rest' => true,
        'taxonomies' => array('member_group'),
    ));
}
add_action('init', 'register_member_post_type');



/**
 * Register Member Group Custom Taxonomy
 */
function register_member_group_taxonomy()
{
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



register_nav_menus(array(
    'top_jp' => __('Top Menu (Japanese)', 'understrap'),
    'top_en' => __('Top Menu (English)', 'understrap'),
    'primary' => __('Primary Menu', 'understrap'),
));

function add_publications_body_class($classes)
{
    if (is_page_template('page-templates/page-publications.php')) {
        $classes[] = 'page-publications-scrollfix';
    }
    return $classes;
}
add_filter('body_class', 'add_publications_body_class');


function register_news_taxonomy()
{
   register_taxonomy('news_category', ['news_jp', 'news_en'], array(
    'labels' => array(
        'name' => 'News Categories',
        'singular_name' => 'News Category',
    ),
    'hierarchical' => false,
    'public' => true,
    'show_in_rest' => true,
));
}
add_action('init', 'register_news_taxonomy');


/**
 * Register Japanese News CPT
 */
function register_news_jp_post_type() {
    register_post_type('news_jp', array(
        'labels' => array(
            'name'               => __('News (JP)', 'textdomain'),
            'singular_name'      => __('News (JP)', 'textdomain'),
            'add_new'            => __('Add New News (JP)', 'textdomain'),
            'add_new_item'       => __('Add New News (JP)', 'textdomain'),
            'edit_item'          => __('Edit News (JP)', 'textdomain'),
            'new_item'           => __('New News (JP)', 'textdomain'),
            'view_item'          => __('View News (JP)', 'textdomain'),
            'search_items'       => __('Search News (JP)', 'textdomain'),
            'not_found'          => __('No News (JP) found', 'textdomain'),
            'not_found_in_trash' => __('No News (JP) found in Trash', 'textdomain'),
            'all_items'          => __('All News (JP)', 'textdomain'),
        ),
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => array(
            'slug' => 'news',
            'with_front' => false
        ),
        'menu_icon'    => 'dashicons-megaphone',
        'supports'     => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'register_news_jp_post_type');

/**
 * Register English News CPT
 */
function register_news_en_post_type() {
    register_post_type('news_en', array(
        'labels' => array(
            'name'               => __('News (EN)', 'textdomain'),
            'singular_name'      => __('News (EN)', 'textdomain'),
            'add_new'            => __('Add New News (EN)', 'textdomain'),
            'add_new_item'       => __('Add New News (EN)', 'textdomain'),
            'edit_item'          => __('Edit News (EN)', 'textdomain'),
            'new_item'           => __('New News (EN)', 'textdomain'),
            'view_item'          => __('View News (EN)', 'textdomain'),
            'search_items'       => __('Search News (EN)', 'textdomain'),
            'not_found'          => __('No News (EN) found', 'textdomain'),
            'not_found_in_trash' => __('No News (EN) found in Trash', 'textdomain'),
            'all_items'          => __('All News (EN)', 'textdomain'),
        ),
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => array(
            'slug' => 'en/news',
            'with_front' => false
        ),
        'menu_icon'    => 'dashicons-megaphone',
        'supports'     => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'register_news_en_post_type');


/**
 * Register Japanese Events CPT
 */
function register_event_jp_post_type() {
    register_post_type('event_jp', array(
        'labels' => array(
            'name'               => __('Events (JP)', 'textdomain'),
            'singular_name'      => __('Event (JP)', 'textdomain'),
            'add_new'            => __('Add New Event (JP)', 'textdomain'),
            'add_new_item'       => __('Add New Event (JP)', 'textdomain'),
            'edit_item'          => __('Edit Event (JP)', 'textdomain'),
            'new_item'           => __('New Event (JP)', 'textdomain'),
            'view_item'          => __('View Event (JP)', 'textdomain'),
            'search_items'       => __('Search Events (JP)', 'textdomain'),
            'not_found'          => __('No Events (JP) found', 'textdomain'),
            'not_found_in_trash' => __('No Events (JP) found in Trash', 'textdomain'),
            'all_items'          => __('All Events (JP)', 'textdomain'),
        ),
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => array(
            'slug' => 'events',
            'with_front' => false
        ),
        'menu_icon'    => 'dashicons-calendar-alt',
        'supports'     => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'register_event_jp_post_type');

/**
 * Register English Events CPT
 */
function register_event_en_post_type() {
    register_post_type('event_en', array(
        'labels' => array(
            'name'               => __('Events (EN)', 'textdomain'),
            'singular_name'      => __('Event (EN)', 'textdomain'),
            'add_new'            => __('Add New Event (EN)', 'textdomain'),
            'add_new_item'       => __('Add New Event (EN)', 'textdomain'),
            'edit_item'          => __('Edit Event (EN)', 'textdomain'),
            'new_item'           => __('New Event (EN)', 'textdomain'),
            'view_item'          => __('View Event (EN)', 'textdomain'),
            'search_items'       => __('Search Events (EN)', 'textdomain'),
            'not_found'          => __('No Events (EN) found', 'textdomain'),
            'not_found_in_trash' => __('No Events (EN) found in Trash', 'textdomain'),
            'all_items'          => __('All Events (EN)', 'textdomain'),
        ),
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => array(
            'slug' => 'en/events',
            'with_front' => false
        ),
        'menu_icon'    => 'dashicons-calendar-alt',
        'supports'     => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'register_event_en_post_type');





function sync_update_date_field($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (wp_is_post_revision($post_id)) return;

    $post_type = get_post_type($post_id);

if (in_array($post_type, ['news', 'news_en', 'news_jp'])) {
    $news_date = get_field('news_date', $post_id);
    if ($news_date) {
        update_field('update_date', $news_date, $post_id);
    }
} elseif (in_array($post_type, ['event', 'event_en', 'event_jp'])) {
    $event_date = get_field('event_date', $post_id);
    if ($event_date) {
        update_field('update_date', $event_date, $post_id);
    }
}

}
add_action('acf/save_post', 'sync_update_date_field', 20);



function set_new_member_menu_order($post_id, $post, $update)
{
    if ($post->post_type !== 'member' || $update) {
        return;
    }

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

    remove_action('save_post', 'set_new_member_menu_order', 10);
    wp_update_post([
        'ID'         => $post_id,
        'menu_order' => $next_order,
    ]);
    add_action('save_post', 'set_new_member_menu_order', 10, 3);
}
add_action('save_post', 'set_new_member_menu_order', 10, 3);

function add_member_type_admin_filter()
{
    global $typenow;

    if ($typenow !== 'member') return;

    $filters = [
        'member_type_jp' => 'Japanese',
        'member_type_en' => 'English',
    ];

    foreach ($filters as $meta_key => $label_prefix) {
        $selected = $_GET[$meta_key] ?? '';

        echo '<select name="' . esc_attr($meta_key) . '">';
        echo '<option value="">' . $label_prefix . ' – All Types</option>';
        echo '<option value="faculty"' . selected($selected, 'faculty', false) . '>Faculty</option>';
        echo '<option value="student"' . selected($selected, 'student', false) . '>Student</option>';
        echo '<option value="alumni"' . selected($selected, 'alumni', false) . '>Former Member</option>';
        echo '<option value="collaborator"' . selected($selected, 'collaborator', false) . '>Research Collaborator</option>';
        echo '</select>';
    }
}

add_action('restrict_manage_posts', 'add_member_type_admin_filter');



function add_member_type_column($columns)
{
    $columns['member_type'] = 'メンバー区分';
    return $columns;
}
add_filter('manage_member_posts_columns', 'add_member_type_column');

function show_member_type_column($column, $post_id)
{
    if ($column === 'member_type') {
        $value = get_field('member_type_en', $post_id) ?: get_field('member_type_jp', $post_id);
        echo esc_html($value ?: '—');
    }
}

add_action('manage_member_posts_custom_column', 'show_member_type_column', 10, 2);

function filter_members_by_member_type($query)
{
    global $pagenow;

    if (
        is_admin() &&
        $query->is_main_query() &&
        $pagenow === 'edit.php' &&
        isset($_GET['post_type']) &&
        $_GET['post_type'] === 'member'
    ) {
        // Check for either member_type_en or member_type_jp
        foreach (['member_type_en', 'member_type_jp'] as $meta_key) {
            if (!empty($_GET[$meta_key])) {
                $query->set('meta_query', [
                    [
                        'key'     => $meta_key,
                        'value'   => sanitize_text_field($_GET[$meta_key]),
                        'compare' => '=',
                    ]
                ]);
                break;
            }
        }
    }
}
add_action('pre_get_posts', 'filter_members_by_member_type');



/**
 * ==================================================
 * LANGUAGE HANDLING
 * ==================================================
 *
 * Language strategy:
 * - Members: ACF field `language` + URL rewrite (/member/ vs /en/member/)
 * - News / Events: separate JP/EN CPTs (news_jp, news_en, event_jp, event_en)
 * - <html lang=""> is derived from page context
 */



add_action('parse_query', function ($query) {
    if (!is_admin() && $query->is_main_query()) {
        global $page_lang;

        if (is_post_type_archive('event_en') || is_singular('event_en')) {
            $page_lang = 'en';
        } elseif (is_post_type_archive('event_jp') || is_singular('event_jp')) {
            $page_lang = 'ja';
        }
    }
});

add_filter('language_attributes', function ($output) {
    global $page_lang;

    if ($page_lang === 'en') {
        return 'lang="en"';
    } elseif ($page_lang === 'ja') {
        return 'lang="ja"';
    }
    return $output;
});

// ✅ Add "Language" to ACF location rules for Post (CPTs like Member)
add_filter('acf/location/rule_types', function ($choices) {
    $choices['Post']['language'] = 'Language';
    return $choices;
});

// ✅ Populate dropdown values for "Language"
add_filter('acf/location/rule_values/language', function ($choices) {
    $choices['en'] = 'English';
    $choices['ja'] = 'Japanese';
    return $choices;
});

// ✅ Match rule logic for "Language"
add_filter('acf/location/rule_match/language', function ($match, $rule, $options) {
    $post_id = $options['post_id'] ?? 0;
    $current_language = get_field('language', $post_id);

    if ($rule['operator'] === '==') {
        $match = ($current_language === $rule['value']);
    } elseif ($rule['operator'] === '!=') {
        $match = ($current_language !== $rule['value']);
    }
    return $match;
}, 10, 3);

function member_add_en_rewrite_rule() {
    add_rewrite_rule(
        '^en/member/([^/]+)/?',
        'index.php?post_type=member&name=$matches[1]',
        'top'
    );
}
add_action('init', 'member_add_en_rewrite_rule');

/**
 * Generate language-aware member permalinks.
 * - Japanese members: /member/{slug}
 * - English members:  /en/member/{slug}
 */
function member_language_aware_permalink($post_link, $post) {
    if (!($post instanceof WP_Post) || $post->post_type !== 'member') {
        return $post_link;
    }

    $slug = $post->post_name;
    if ($slug === '') {
        return $post_link;
    }

    $lang = get_field('language', $post->ID);
    if ($lang === 'en') {
        return home_url('/en/member/' . $slug . '/');
    }

    return home_url('/member/' . $slug . '/');
}
add_filter('post_type_link', 'member_language_aware_permalink', 10, 2);

/**
 * Redirect English members to /en/member/... if not already there.
 */
function redirect_english_members_to_en_url() {
    if (is_singular('member')) {
        $lang = get_field('language', get_queried_object_id());

        if ($lang === 'en') {
            $request_uri = $_SERVER['REQUEST_URI'];

            // If URL doesn't start with /en/, redirect
            if (strpos($request_uri, '/en/') !== 0) {
                $permalink = get_permalink(get_queried_object_id());
                $en_url = home_url('/en' . parse_url($permalink, PHP_URL_PATH));
                wp_redirect($en_url, 301);
                exit;
            }
        }
    }
}
add_action('template_redirect', 'redirect_english_members_to_en_url');

// Helper: map post type → choice value
function let_news_lang_choice_for_post_type($pt) {
    if ($pt === 'news_jp') return 'ja';
    if ($pt === 'news_en') return 'en-US';
    return null;
  }
  
  /** 1) Pre-fill on editor load (new posts) */
  add_filter('acf/load_value/name=news_language', function ($value, $post_id, $field) {
    if (!empty($value)) return $value; // keep existing value
    $pt = get_post_type($post_id);
    $choice = let_news_lang_choice_for_post_type($pt);
    return $choice ?: $value;
  }, 10, 3);
  
  /** 2) Enforce on save if empty/cleared (safety net) */
  add_action('acf/save_post', function ($post_id) {
    $pt = get_post_type($post_id);
    if (!$pt) return;
  
    $choice = let_news_lang_choice_for_post_type($pt);
    if ($choice) {
      $current = get_field('news_language', $post_id);
      if (!$current) {
        // Use field NAME is fine here; if you prefer, swap to update_field('field_XXXX', ...)
        update_field('news_language', $choice, $post_id);
      }
    }
  }, 20);
  
  /** 3) Make the field read-only for News so editors can see but not change it */
  add_filter('acf/prepare_field/name=news_language', function ($field) {
    $pt = get_post_type();
    if (in_array($pt, ['news_jp','news_en'], true)) {
      $field['readonly'] = 1;   // visible & submitted, but not editable
      // Don't use $field['disabled'] = 1; (disabled fields don't submit)
    }
    return $field;
  });



add_action('acf/save_post', function ($post_id) {
    if (get_post_type($post_id) !== 'member') return;

    $lang = get_field('language', $post_id);

    if ($lang === 'ja') {
        update_field('member_type_en', '', $post_id);
    }
}, 30);

/**
 * Clear homepage carousel cache when news or events are saved/updated
 */
function let_clear_carousel_cache($post_id) {
    // Get post type
    $post_type = get_post_type($post_id);

    // Clear Japanese carousel cache for JP posts
    if (in_array($post_type, ['news_jp', 'event_jp'], true)) {
        delete_transient('home_carousel_posts');
    }

    // Clear English carousel cache for EN posts
    if (in_array($post_type, ['news_en', 'event_en'], true)) {
        delete_transient('home_carousel_posts_en');
    }
}
add_action('save_post', 'let_clear_carousel_cache');
add_action('acf/save_post', 'let_clear_carousel_cache', 20);



add_action('init', function () {

    register_post_type('program_item', [
        'labels' => [
            'name'               => 'プログラム項目',
            'singular_name'      => 'プログラム項目',
            'add_new'            => '新規追加',
            'add_new_item'       => 'プログラム項目を追加',
            'edit_item'          => 'プログラム項目を編集',
            'new_item'           => '新しいプログラム項目',
            'view_item'          => 'プログラム項目を表示',
            'search_items'       => 'プログラム項目を検索',
            'not_found'          => 'プログラム項目が見つかりません',
            'menu_name'          => 'プログラム項目',
        ],
        'public'           => false,
        'show_ui'          => true,
        'show_in_menu'     => false, // Only created via Event
        'hierarchical'     => true,  // 🔥 REQUIRED
        'supports'         => ['title', 'page-attributes'], // 🔥 REQUIRED
        'has_archive'      => false,
        'rewrite'          => false,
        'show_in_rest'     => true,
    ]);

});



/**
 * Store event ID in transient when admin is editing an event
 * This allows program_item to automatically know its parent event
 */
add_action('admin_init', function() {
    global $pagenow;

    // When editing an event, store its ID
    if ($pagenow === 'post.php' && isset($_GET['post'])) {
        $post_type = get_post_type($_GET['post']);
        if (in_array($post_type, ['event_jp', 'event_en'])) {
            set_transient(
                'last_edited_event_' . get_current_user_id(),
                intval($_GET['post']),
                HOUR_IN_SECONDS
            );
        }
    }
});

/**
 * Auto-populate related_event ACF field from transient
 */
add_filter('acf/load_value/name=related_event', function($value, $post_id, $field) {
    // Only auto-fill if empty (new post)
    if (!empty($value)) return $value;

    // Only for program_item post type
    if (get_post_type($post_id) !== 'program_item') return $value;

    $transient_key = 'last_edited_event_' . get_current_user_id();
    $event_id = get_transient($transient_key);

    if ($event_id) {
        return $event_id;
    }

    return $value;
}, 10, 3);

/**
 * Prevent ACF admin fatal when a textarea field stores array data.
 * This can happen after field type changes/migrations.
 */
add_filter('acf/load_value/type=textarea', function($value, $post_id, $field) {
    if (!is_array($value)) {
        return $value;
    }

    $flatten = function($input) use (&$flatten) {
        $out = [];

        if (is_array($input)) {
            foreach ($input as $item) {
                $out = array_merge($out, $flatten($item));
            }
            return $out;
        }

        if (is_object($input)) {
            if (method_exists($input, '__toString')) {
                $text = trim((string) $input);
                return $text !== '' ? [$text] : [];
            }
            return [];
        }

        if (is_scalar($input)) {
            $text = trim((string) $input);
            return $text !== '' ? [$text] : [];
        }

        return [];
    };

    $parts = array_values(array_unique($flatten($value)));
    return implode("\n", $parts);
}, 20, 3);

/**
 * Auto-set post_parent when saving a new program_item
 */
add_action('save_post_program_item', function($post_id, $post, $update) {
    // Skip if autosave or revision
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (wp_is_post_revision($post_id)) return;

    // Only set parent if it's not already set
    if ($post->post_parent == 0) {
        $transient_key = 'last_edited_event_' . get_current_user_id();
        $parent_id = get_transient($transient_key);

        if ($parent_id) {
            // Remove the action to prevent infinite loop
            remove_action('save_post_program_item', __FUNCTION__, 10);

            wp_update_post([
                'ID' => $post_id,
                'post_parent' => intval($parent_id)
            ]);

            // Re-add the action
            add_action('save_post_program_item', __FUNCTION__, 10, 3);
        }
    }
}, 10, 3);

/**
 * Get adjacent event by event_date_start ACF field
 *
 * @param string $direction 'next' (newer) or 'previous' (older)
 * @return WP_Post|null
 */
function get_adjacent_event_by_date($direction = 'next') {
    $current_post = get_post();
    if (!$current_post) return null;

    $current_date = get_field('event_date_start', $current_post->ID);
    if (!$current_date) return null;

    // Determine comparison and order based on direction
    if ($direction === 'next') {
        // Next = newer event (date greater than current)
        $compare = '>';
        $order = 'ASC';
    } else {
        // Previous = older event (date less than current)
        $compare = '<';
        $order = 'DESC';
    }

    $args = [
        'post_type'      => $current_post->post_type,
        'posts_per_page' => 1,
        'post_status'    => 'publish',
        'post__not_in'   => [$current_post->ID],
        'meta_key'       => 'event_date_start',
        'orderby'        => 'meta_value',
        'order'          => $order,
        'meta_query'     => [
            [
                'key'     => 'event_date_start',
                'value'   => $current_date,
                'compare' => $compare,
                'type'    => 'DATE',
            ],
        ],
    ];

    $posts = get_posts($args);
    return !empty($posts) ? $posts[0] : null;
}

/**
 * Get adjacent news by news_date ACF field
 *
 * @param string $direction 'next' (newer) or 'previous' (older)
 * @return WP_Post|null
 */
function get_adjacent_news_by_date($direction = 'next') {
    $current_post = get_post();
    if (!$current_post) return null;

    $current_date = get_field('news_date', $current_post->ID);
    if (!$current_date) return null;

    // Determine comparison and order based on direction
    if ($direction === 'next') {
        // Next = newer news (date greater than current)
        $compare = '>';
        $order = 'ASC';
    } else {
        // Previous = older news (date less than current)
        $compare = '<';
        $order = 'DESC';
    }

    $args = [
        'post_type'      => $current_post->post_type,
        'posts_per_page' => 1,
        'post_status'    => 'publish',
        'post__not_in'   => [$current_post->ID],
        'meta_key'       => 'news_date',
        'orderby'        => 'meta_value',
        'order'          => $order,
        'meta_query'     => [
            [
                'key'     => 'news_date',
                'value'   => $current_date,
                'compare' => $compare,
                'type'    => 'DATE',
            ],
        ],
    ];

    $posts = get_posts($args);
    return !empty($posts) ? $posts[0] : null;
}

add_action('add_meta_boxes', function () {
    add_meta_box(
        'event_program_items',
        'プログラム',
        'render_event_program_items_box',
        'event_jp',
        'normal',
        'default'
    );
});

function render_event_program_items_box($post) {

    $items = get_posts([
        'post_type'      => 'program_item',
        'posts_per_page' => -1,
        'post_parent'    => $post->ID,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    ]);

    echo '<p>このイベントのプログラム項目です。</p>';

    if ($items) {
        echo '<ul>';
        foreach ($items as $item) {
            echo '<li>';
            echo esc_html($item->post_title);
            echo ' <a href="' . get_edit_post_link($item->ID) . '">編集</a>';
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p><em>まだプログラム項目がありません。</em></p>';
    }

    // Simple URL without post_parent - the transient handles it
    $add_url = admin_url('post-new.php?post_type=program_item');

    echo '<p><a class="button" href="' . esc_url($add_url) . '">プログラム項目を追加</a></p>';
}

/**
 * Resolve related event ID from a news post ACF field (supports multiple return formats).
 */
function let_get_related_event_id_from_news($post_id) {
    $candidates = ['news_related_event', 'related_event', 'event_reference', 'news_event'];
    $raw = null;

    foreach ($candidates as $field_name) {
        $value = get_field($field_name, $post_id);
        if (!empty($value)) {
            $raw = $value;
            break;
        }
    }

    if ($raw instanceof WP_Post) {
        return (int) $raw->ID;
    }

    if (is_numeric($raw)) {
        return (int) $raw;
    }

    if (is_array($raw)) {
        if (isset($raw['ID']) && is_numeric($raw['ID'])) {
            return (int) $raw['ID'];
        }
        if (isset($raw[0])) {
            $first = $raw[0];
            if ($first instanceof WP_Post) {
                return (int) $first->ID;
            }
            if (is_numeric($first)) {
                return (int) $first;
            }
            if (is_array($first) && isset($first['ID']) && is_numeric($first['ID'])) {
                return (int) $first['ID'];
            }
        }
    }

    return 0;
}

add_action('add_meta_boxes', function () {
    add_meta_box(
        'news_event_report_preview',
        'イベント開催報告（プレビュー）',
        'render_news_event_report_preview_box',
        'news_jp',
        'side',
        'default'
    );
});

function render_news_event_report_preview_box($post) {
    $toggle_raw = get_field('news_show_event_report', $post->ID);
    if ($toggle_raw === null || $toggle_raw === '') {
        $toggle_raw = get_field('show_event_report', $post->ID);
    }
    $show_event_report = ($toggle_raw === null) ? true : (bool) $toggle_raw;

    $event_id = let_get_related_event_id_from_news($post->ID);
    $event_post = $event_id ? get_post($event_id) : null;
    $event_type = $event_post ? (string) $event_post->post_type : '';
    $is_event_type = $event_type !== '' && strpos($event_type, 'event') === 0;

    echo '<p><strong>表示設定:</strong> ' . ($show_event_report ? 'ON' : 'OFF') . '</p>';

    if (!$show_event_report) {
        echo '<p>このニュースでは「イベント開催報告」は表示されません。</p>';
        return;
    }

    if (!$event_post) {
        echo '<p>関連イベントが未設定です。</p>';
        return;
    }

    if (!$is_event_type) {
        echo '<p>関連投稿のタイプがイベントではありません。</p>';
        echo '<p><code>' . esc_html($event_type) . '</code></p>';
        return;
    }

    $date = (string) get_field('event_date_start', $event_id);
    $start_time = (string) get_field('event_start_time', $event_id);
    $end_time = (string) get_field('event_end_time', $event_id);
    $venue = (string) get_field('event_venue', $event_id);
    $organizer = (string) get_field('event_organizer', $event_id);

    $program_items = get_posts([
        'post_type'      => 'program_item',
        'posts_per_page' => -1,
        'meta_query'     => [
            [
                'key'   => 'related_event',
                'value' => $event_id,
            ],
        ],
    ]);

    $video_count = 0;
    $pdf_count = 0;
    foreach ($program_items as $program_item) {
        if (get_field('youtube_url', $program_item->ID)) {
            $video_count++;
        }
        if (get_field('presentation_pdf', $program_item->ID)) {
            $pdf_count++;
        }
    }

    echo '<p><strong>関連イベント:</strong><br><a href="' . esc_url(get_edit_post_link($event_id)) . '">' . esc_html(get_the_title($event_id)) . '</a></p>';
    echo '<p><strong>日時:</strong><br>' . esc_html(trim($date . ' ' . $start_time . ($end_time ? '〜' . $end_time : ''))) . '</p>';

    if ($venue !== '') {
        echo '<p><strong>会場:</strong><br>' . esc_html($venue) . '</p>';
    }
    if ($organizer !== '') {
        echo '<p><strong>主催:</strong><br>' . esc_html($organizer) . '</p>';
    }

    echo '<p><strong>動画:</strong> ' . esc_html((string) $video_count) . '件<br><strong>資料:</strong> ' . esc_html((string) $pdf_count) . '件</p>';
    echo '<p><a href="' . esc_url(get_permalink($event_id)) . '" target="_blank" rel="noopener">イベントページを表示</a></p>';
}
