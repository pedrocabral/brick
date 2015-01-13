<?php
/**
 * @package brick
 */
?><!DOCTYPE html><!-- header.php -->
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php wp_head(); ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php flush(); ?>
<body <?php body_class(); ?>>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'brick' ); ?></a>
		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div><!-- .site-branding -->
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => null, 'items_wrap' => '<ul id="%1$s" class="%2$s">'."\n".'%3$s'."\t\t\t\t".'</ul>'."\n" ,'depth' => 5, 'walker' => new menu_walker() ) ); ?>
			</nav><!-- #site-navigation -->
			<div class="search-form">
				<?php get_search_form();
			echo "\n\t";?>
		</div>
		</header><!-- #masthead -->
		<div id="content" class="site-content"><!-- header.php -->
