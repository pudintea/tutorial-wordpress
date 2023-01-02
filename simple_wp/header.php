<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Simple_WP
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="navbar">
	<div class="container">
         <header class="site-header">

		 <div class="menu-mobile">
					<span onclick="openNavMobile()"><i class="fa fa-bars"></i></span>
				</div>
		 	
			
			<div class="site-branding">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$simple_wp_description = get_bloginfo( 'description', 'display' );
				if ( $simple_wp_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $simple_wp_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->
				
			<nav class="main-navigation">
					

			<div class="nav-menu-gradient" id="NavGradient" onclick="openNavMobile()"></div>
				
				<div id="NavMenu" class="nav-menu">
					<h2 class="title-mobile">Menu <span onclick="openNavMobile()"><i class="fa fa-times"></i></span></h2>


				<?php wp_nav_menu( 
                    array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
                    );?>
			</nav><!-- .main-navigation -->

			<div class="search">
					<span class="search-icon" onclick="openSearch()"><i id="SearchIcon" class="fa fa-search"></i></span>
				</div>

				
	    </header><!-- .site-header -->	

		<div class="search-form" id="SearchForm" style="display: none;">
			<?php get_search_form(); ?>
		</div>

    </div><!-- .container -->
</header>
