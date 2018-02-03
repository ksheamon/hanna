<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hannashints
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'hannashints' ); ?></a>

	<header id="masthead" class="site-header">
		<nav id="site-navigation" class="main-navigation aligncenter">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'hannashints' ); ?></button>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
			?>
		</nav><!-- #site-navigation -->

		<div class="site-branding">
			<?php
			$description = get_bloginfo( 'description', 'display' );			
			if ( is_front_page() && is_home() ) : ?>
				<h1 id="logo-type" class="aligncenter">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<span class="site-title"><?php bloginfo( 'name' ); ?></span>
						<span class="site-description"><?php echo $description; ?></span>
					</a>
				</h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;?>
		</div><!-- .site-branding -->

	</header><!-- #masthead -->

	<?php if ( is_front_page() && is_home() ) {
		get_template_part('template-parts/featured-slider', 'none');
		
	} ?>
	<div class="wrapper">
		<div id="content" class="site-content">
