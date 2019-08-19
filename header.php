<?php
/**
 * The header for our theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Marzeotti_Base
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-84468069-6"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-84468069-6');
	</script>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'marzeotti-base' ); ?></a>

	<header id="masthead" class="header">
		<div class="header__logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		</div>

		<nav id="site-navigation" class="header__nav nav">
			<button class="nav__button" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'marzeotti-base' ); ?></button>
			<div class="nav__container nav__container--primary-menu">
				<?php
				wp_nav_menu( array(
					'container'      => false,
					'menu_class'     => 'nav__level',
					'theme_location' => 'primary-menu',
					'walker'         => new Marzeotti_Base_Walker_Nav_Menu(),
				) );
				?>
			</div>
			<div class="nav__container nav__container--button-menu">
				<?php
				wp_nav_menu( array(
					'container'      => false,
					'depth'          => 1,
					'menu_class'     => 'nav__level',
					'theme_location' => 'button-menu',
					'walker'         => new Marzeotti_Base_Walker_Nav_Menu(),
				) );
				?>
			</div>
		</nav>
	</header>

	<div id="content" class="content">