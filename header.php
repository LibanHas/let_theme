<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$bootstrap_version = get_theme_mod('understrap_bootstrap_version', 'bootstrap4');
$navbar_type       = get_theme_mod('understrap_navbar_type', 'collapse');

// Detect current page language (default: Japanese)
$page_lang = 'ja';
if (strpos($_SERVER['REQUEST_URI'], '/en/') === 0) {
    $page_lang = 'en';
}

// Detect language for custom post type archives
if (is_post_type_archive('news_jp') || strpos($_SERVER['REQUEST_URI'], '/news/') === 0 ||
    is_post_type_archive('event_jp') || strpos($_SERVER['REQUEST_URI'], '/events/') === 0) {
    $page_lang = 'ja';
} elseif (is_post_type_archive('news_en') || strpos($_SERVER['REQUEST_URI'], '/en/news/') === 0 ||
        is_post_type_archive('event_en') || strpos($_SERVER['REQUEST_URI'], '/en/events/') === 0) {
    $page_lang = 'en';
} elseif (is_post_type_archive('event_jp') || strpos($_SERVER['REQUEST_URI'], '/events/') === 0) {
    $page_lang = 'ja';
} elseif (is_post_type_archive('event_en') || strpos($_SERVER['REQUEST_URI'], '/en/events/') === 0) {
    $page_lang = 'en';
}

// Prepare translation link and label
$current_id = is_singular() ? get_the_ID() : null;
$translation_url = '';
$link_text = ($page_lang === 'ja') ? 'English' : '日本語';

if ($current_id) {
    // Get translation from ACF field
    $translation_field = ($page_lang === 'ja') ? 'translation_en' : 'translation_jp';
    $translation = get_field($translation_field, $current_id);

    if ($translation) {
        $translation_url = (filter_var($translation, FILTER_VALIDATE_URL))
            ? $translation
            : get_permalink($translation);
    }
}

// Fallbacks for archives or front page
if (!$translation_url) {
    if (is_post_type_archive('news_jp') || strpos($_SERVER['REQUEST_URI'], '/news/') === 0) {
        $translation_url = site_url('/en/news/');
    } elseif (is_post_type_archive('news_en') || strpos($_SERVER['REQUEST_URI'], '/en/news/') === 0) {
        $translation_url = site_url('/news/');
    } elseif (is_post_type_archive('event_jp') || strpos($_SERVER['REQUEST_URI'], '/events/') === 0) {
        $translation_url = site_url('/en/events/');
    } elseif (is_post_type_archive('event_en') || strpos($_SERVER['REQUEST_URI'], '/en/events/') === 0) {
        $translation_url = site_url('/events/');
    }    
}
?>
<!DOCTYPE html>
<html lang="<?php echo esc_attr($page_lang); ?>">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <style>
        :root {
            --tick-url: url('<?php echo get_template_directory_uri(); ?>/images/icon-tick.svg');
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+JP:wght@100..900&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Ubuntu+Sans:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>

<?php do_action('wp_body_open'); ?>
<div class="site" id="page">

    <!-- ******************* The Navbar Area ******************* -->
    <header id="wrapper-navbar">
        <div class="navbar-header">
            <div class="navbar-inner">

                <!-- Left: LET Logo + Text -->
                <div class="navbar-left">
  <a href="<?php echo home_url(); ?>" class="let-logo-wrapper">
    <div class="logo-container ">
      <img src="<?php echo get_template_directory_uri(); ?>/images/let_logo.png" alt="LET Logo" class="navbar-logo">
    </div>
    <div class="logo-name">
      <em>Learning & Educational<br>Technologies Research Unit</em>
    </div>
  </a>
</div>

                <!-- Center: Nav Menu -->
                <nav class="navbar-center">
                    <?php
                    // Load menu for current language
                    $menu_location = ($page_lang === 'en') ? 'top_en' : 'top_jp';
                    if (has_nav_menu($menu_location)) {
                        wp_nav_menu([
                            'theme_location'  => $menu_location,
                            'container'       => false,
                            'menu_class'      => 'top-nav-list',
                            'fallback_cb'     => false,
                        ]);
                    } else {
                        echo '<p style="color: red;">⚠️ Menu not assigned for ' . esc_html($page_lang) . '</p>';
                    }
                    ?>
                </nav>

                <!-- Right: Kyodai Logo + Language Switcher + Hamburger -->
                <div class="navbar-right">
                    <div class="kyodai-logo-container">
                        <a href="https://www.kyoto-u.ac.jp/en" target="_blank" rel="noopener noreferrer" class="kyodai-logo-wrapper">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/kyoto-univ.png" alt="Kyoto University" class="kyodai-logo">
                        </a>
                    </div>

                   <!-- Language Switcher -->
<div class="language-switcher">
    <?php
    $link_text = ($page_lang === 'ja') ? 'English' : '日本語';

    if (is_singular()) {
        $current_id = get_the_ID();
        if ($page_lang === 'ja') {
            // Japanese page → find EN translation
            $translation = get_field('translation_en', $current_id);
            if ($translation) {
                $translation_url = (filter_var($translation, FILTER_VALIDATE_URL))
                    ? $translation
                    : get_permalink($translation);
            } else {
                // fallback for missing field: swap / with /en/
                $translation_url = home_url('/en' . str_replace(home_url(), '', get_permalink($current_id)));
            }
        } else {
            // English page → find JP translation
            $translation = get_field('translation_jp', $current_id);
            if ($translation) {
                $translation_url = (filter_var($translation, FILTER_VALIDATE_URL))
                    ? $translation
                    : get_permalink($translation);
            } else {
                // fallback for missing field: swap /en/ with /
                $translation_url = str_replace('/en/', '/', get_permalink($current_id));
            }
        }
    } elseif (is_front_page()) {
        $translation_url = ($page_lang === 'ja') ? site_url('/en/') : site_url('/');
    }

    if ($translation_url) {
        echo '<a href="' . esc_url($translation_url) . '">' . esc_html($link_text) . '</a>';
    } else {
        echo '<!-- ⚠️ No translation linked for this page -->';
    }
    ?>
</div>


                    <div class="hamburger-menu">
                        <button id="hamburger-toggle" class="hamburger-icon">
                            <span class="bar"></span>
                            <span class="bar"></span>
                            <span class="bar"></span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Side Menu (hidden by default) -->
            <div id="side-menu" class="side-menu">
                <button class="menu-close" aria-label="Close menu">&times;</button>
                <?php
                // Dynamically load side menu for current language
                $primary_menu_location = 'primary';
                $locations = get_nav_menu_locations();
                $menu_id = $locations[$primary_menu_location] ?? null;
                $menu = $menu_id ? wp_get_nav_menu_items($menu_id) : [];

                if ($menu): ?>
                    <div class="page-menu">
                        <?php foreach ($menu as $menu_item): ?>
                            <a href="<?php echo esc_url($menu_item->url); ?>"
                               class="page-menu__link<?php echo ($menu_item->object_id == get_queried_object_id()) ? ' page-menu__link--current' : ''; ?>">
                                <?php echo esc_html($menu_item->title); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p style="color: red; padding: 1rem;">⚠️ Side menu not assigned.</p>
                <?php endif; ?>
            </div>
        </div>
    </header>
