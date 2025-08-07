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
 * Enqueue custom styles and scripts
 */
function enqueue_custom_theme_scripts()
{
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

    // Accordion interaction script //
    wp_enqueue_script('accordion', get_stylesheet_directory_uri() . '/js/accordion.js', array(), null, true);

    // Swiper styles and scripts
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_theme_scripts');

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

// add_filter('post_type_link', 'custom_member_permalink', 10, 2);

// function custom_member_permalink($permalink, $post) {
//     if ($post->post_type === 'member') {
//         $language = get_field('language', $post->ID); // Get ACF field value
//         if ($language === 'en') {
//             // Replace 'member' with 'en/member'
//             $permalink = str_replace('/member/', '/en/member/', $permalink);
//         }
//     }
//     return $permalink;
// }

// add_action('init', function () {
//     add_rewrite_rule(
//         '^en/member/([^/]+)/?$',
//         'index.php?post_type=member&name=$matches[1]',
//         'top'
//     );
// });

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


function enqueue_swiper_assets()
{
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_swiper_assets');

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

function manually_sync_update_dates()
{
    if (!is_admin() || !current_user_can('manage_options')) {
        return;
    }

    if (!isset($_GET['sync_updates']) || $_GET['sync_updates'] !== '1') {
        return;
    }

    $query = new WP_Query([
        'post_type' => ['news', 'news_en', 'news_jp', 'event', 'event_en', 'event_jp'],
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

    $selected = $_GET['member_type'] ?? '';
    $options = [
        ''            => 'すべてのメンバー種別',
        'faculty'     => 'faculty',
        'student'     => 'student',
        'alumni'      => 'alumni',
        'collaborator'=> 'collaborator'
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

function add_member_type_column($columns)
{
    $columns['member_type'] = 'メンバー区分';
    return $columns;
}
add_filter('manage_member_posts_columns', 'add_member_type_column');

function show_member_type_column($column, $post_id)
{
    if ($column === 'member_type') {
        $value = get_field('member_type', $post_id);
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

function manually_assign_event_tags()
{
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

// add_filter('wp_nav_menu_objects', function ($items, $args) {
//     global $page_lang;

//     foreach ($items as &$item) {
//         // Get the page ID of the menu item
//         $linked_page_id = url_to_postid($item->url);

//         if ($linked_page_id) {
//             if ($page_lang === 'en') {
//                 // On an English page → try to find English translation
//                 $translated_page = get_field('translation_en', $linked_page_id);
//                 if ($translated_page) {
//                     $item->url = get_permalink($translated_page);
//                 }
//             } elseif ($page_lang === 'ja') {
//                 // On a Japanese page → try to find Japanese translation
//                 $translated_page = get_field('translation_jp', $linked_page_id);
//                 if ($translated_page) {
//                     $item->url = get_permalink($translated_page);
//                 }
//             }
//         }
//     }

//     return $items;
// }, 10, 2); // 👈 add ", 2" so WP passes both $items and $args


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

// 🛠 One-time fixer: assign language to existing Member posts
function assign_language_to_existing_members() {
    // Query all Member posts
    $members = get_posts([
        'post_type'      => 'member',
        'posts_per_page' => -1,
        'post_status'    => 'any'
    ]);

    foreach ($members as $member) {
        // Only assign if language is not set
        if (!get_field('language', $member->ID)) {
            // 📝 Guess language: set to 'ja' (Japanese) by default
            update_field('language', 'ja', $member->ID);
        }
    }

    echo "✅ Language field assigned to " . count($members) . " members.";
}
// assign_language_to_existing_members();


/**
 * Adjust member post type slugs based on language
 */
/**
 * Add extra rewrite rule so /en/member/... works alongside /member/...
 */
/**
 * Allow /en/member/... URLs and redirect English members there if needed.
 */
/**
 * Allow /en/member/... URLs for members.
 */
function member_add_en_rewrite_rule() {
    add_rewrite_rule(
        '^en/member/([^/]+)/?',
        'index.php?post_type=member&name=$matches[1]',
        'top'
    );
}
add_action('init', 'member_add_en_rewrite_rule');

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




function register_custom_post_type_event()
{
    register_post_type('event', [
        'labels' => [
            'name' => 'Events',
            'singular_name' => 'Event',
        ],
        'public' => true,
        'show_in_menu' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
        'show_in_rest' => true,
    ]);
}
add_action('init', 'register_custom_post_type_event');

add_filter('language_attributes', function($output) {
    // Get current URL
    $current_url = $_SERVER['REQUEST_URI'];

    // Check if we are on the English Events archive
    if (strpos($current_url, '/en/events') === 0) {
        // Replace lang="ja" with lang="en"
        $output = str_replace('lang="ja"', 'lang="en"', $output);
    }

    return $output;
});


/**
 * Temporarily register the old News CPT
 */
// function register_custom_post_type_news()
// {
//     register_post_type('news', [
//         'labels' => [
//             'name' => 'News (OLD)',
//             'singular_name' => 'News (OLD)',
//             'add_new_item' => 'Add New News (OLD)',
//             'edit_item' => 'Edit News (OLD)',
//             'new_item' => 'New News (OLD)',
//             'view_item' => 'View News (OLD)',
//             'search_items' => 'Search News (OLD)',
//             'not_found' => 'No News (OLD) found',
//             'not_found_in_trash' => 'No News (OLD) found in Trash',
//         ],
//         'public' => true,
//         'show_in_menu' => true, // ✅ Show it in admin menu
//         'supports' => ['title', 'editor', 'thumbnail', 'custom-fields'],
//         'show_in_rest' => true, // ✅ Enable block editor
//     ]);
// }
// add_action('init', 'register_custom_post_type_news');




