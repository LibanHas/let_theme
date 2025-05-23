<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$bootstrap_version = get_theme_mod( 'understrap_bootstrap_version', 'bootstrap4' );
$navbar_type       = get_theme_mod( 'understrap_navbar_type', 'collapse' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
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
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<header id="wrapper-navbar">
	<header class="navbar-header">
  <div class="navbar-inner">

    <!-- Left: LET Logo + Text -->
    <div class="navbar-left">
      <a href="<?php echo home_url(); ?>" class="let-logo-wrapper">
        <img src="<?php echo get_template_directory_uri(); ?>/images/let_logo.png" alt="LET Logo" class="navbar-logo">
        <div class="logo-name">
		<em>Learning & Educational<br>
          Technologies Research Unit</em>
        </div>
      </a>
    </div>

    <!-- Center: Nav Menu -->
    <nav class="navbar-center">
      <?php
        wp_nav_menu([
          'theme_location'  => 'top',
          'container'       => false,
          'menu_class'      => 'top-nav-list',
          'fallback_cb'     => false,
        ]);
      ?>
    </nav>

    <!-- Right: Kyodai Logo + Hamburger -->
    <div class="navbar-right">
      <a href="https://www.kyoto-u.ac.jp/en" target="_blank" rel="noopener noreferrer" class="kyodai-logo-wrapper">
        <img src="<?php echo get_template_directory_uri(); ?>/images/kyoto-univ.png" alt="Kyoto University" class="kyodai-logo">
      </a>
      <div class="hamburger-menu">
        <button id="hamburger-toggle" class="hamburger-icon">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </button>
      </div>
    </div>

  </div>
</header>


		<!-- Side Menu (hidden by default) -->
		<div id="side-menu" class="side-menu">
		<?php
$locations = get_nav_menu_locations();
$menu_id = $locations['primary'] ?? null;
$menu = $menu_id ? wp_get_nav_menu_items($menu_id) : [];

if ($menu) :
?>
  <div class="page-menu">
  <?php foreach ($menu as $menu_item): ?>
    <a href="<?php echo esc_url($menu_item->url); ?>"
       class="page-menu__link<?php echo ($menu_item->object_id == get_queried_object_id()) ? ' page-menu__link--current' : ''; ?>">
      <?php echo esc_html($menu_item->title); ?>
    </a>
  <?php endforeach; ?>
</div>
  </div>
<?php else: ?>
  <p style="color: red; padding: 1rem;">⚠️ Menu not found or empty.</p>
<?php endif; ?>

		</div>

	</header><!-- #wrapper-navbar -->
