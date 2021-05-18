<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package New_Reflection
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<script src="https://polyfill.io/v3/polyfill.min.js?features=default" crossorigin="anonymous"></script>
	<?php wp_head(); ?>
	<script src="https://kit.fontawesome.com/e97517236b.js" crossorigin="anonymous"></script>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'new-reflection' ); ?></a>

	<header id="masthead" class="site-header">
		<div id="hero-image">
			<div class="site-branding">
				<?php
				the_custom_logo();
				if ( is_front_page() ) :
					?>
					<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
					<?php
				elseif (!empty($pagename) && $pagename != "privacy-policy") :
					?>
					<h1 class="site-title"><?php echo ucwords($pagename); ?></h1>
					<?php
				elseif ($pagename == "privacy-policy") :
					?>
					<h1 class="site-title">Privacy Policy</h1>
					<?php
				else :
					?>
					<h1 class="site-title">WordPress Reflection</h1>
					<?php
				endif;
					?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php //esc_html_e( 'Primary Menu', 'new-reflection' ); ?></button> -->
				<button class="hamburger hamburger--elastic menu-toggle" type="button" aria-controls="primary-menu" aria-expanded="false">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
				<input type="search" id="nav-search" class="search-field" placeholder="Search..." value="" name="s">
				<button id="search-buttons" aria-controls="nav-search" aria-expanded="false">
					<i class="fas fa-search-plus search-button-visible" aria-hidden="false"></i>
					<i class="fas fa-search-minus" aria-hidden="true"></i>
			</button>
			</nav><!-- #site-navigation -->
		</div><!-- #hero-image -->
	</header><!-- #masthead -->
