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
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+JP:wght@100..900&family=Ubuntu+Sans:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<header id="wrapper-navbar">
		<!-- Logo -->
		 <div class="menubar">
		<div class="logo-container">
			<a href="<?php echo home_url(); ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/images/let_logo.png" alt="LET Logo" class="navbar-logo">
			</a>
		</div>
					<h2 class="lab-name">
    				Learning & Educational Technologies Research Unit
					</h2>
					</div>
		<!-- Hamburger Menu -->
		<div class="hamburger-menu">
			<button id="hamburger-toggle" class="hamburger-icon">
				<span class="bar"></span>
				<span class="bar"></span>
				<span class="bar"></span>
			</button>
		</div>

		<!-- Side Menu (hidden by default) -->
		<div id="side-menu" class="side-menu">
			<nav class="menu-nav">
				<!-- <?php wp_nav_menu(array('theme_location' => 'primary')); ?> -->
			</nav>
		</div>

	</header><!-- #wrapper-navbar -->
