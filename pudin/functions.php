<?php
/*
	Pudin S I
	https://t.me/pudin_ira
	https://instagram.com/pudin.ira
	https://www.pdn.my.id
*/


/* ---------------------------
Disable Update 
---------------------------- */
function remove_core_updates (){
	global $wp_version ; return ( object ) array ( 'last_checked' => time (), 'version_checked' => $wp_version ,);
}
	add_filter ( 'pre_site_transient_update_core' , 'remove_core_updates' );
	add_filter ( 'pre_site_transient_update_plugins' , 'remove_core_updates' );
	add_filter ( 'pre_site_transient_update_themes' , 'remove_core_updates' );

/* ----------------------------
Panggil Style.css 
----------------------------- */
add_action( 'wp_enqueue_scripts', function() {
	wp_enqueue_style('main-style', get_template_directory_uri() . '/style.css');
});

/* -----------------------------------------
Panggil Font Open Sans 
--------------------------------------------- */
function pdn_add_google_fonts() { 
	wp_enqueue_style( ' add_google_fonts ', ' https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800', false ); 
} 
add_action( 'wp_enqueue_scripts', 'pdn_add_google_fonts' );

/* ------------------------------------------
KONFIGURASI 
-------------------------------------------- */
if ( ! function_exists( 'pudin_setup' ) ) :
	function pudin_setup() {

		//load_theme_textdomain( 'pudin', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for custom logo.
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 50,
			'width'       => 240,
			'flex-height' => true,
			'flex-width' => true,		
		) );

		add_theme_support( 'post-thumbnails' );

		add_image_size( 'pudin-blog-medium', 600, 318, true );
		add_image_size( 'pudin-blog-large', 1210, 642, true );
		add_image_size( 'pudin-portfolio-medium', 500, 500, true );
		add_image_size( 'pudin-team-medium', 300, 343, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'pudin_primary_menu' => esc_html__( 'Primary Menu', 'pudin' ),
			'pudin_footer_menu' => esc_html__( 'Footer Menu', 'pudin' ),
		) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'custom-background', apply_filters( 'pudin_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
	}
endif;
add_action( 'after_setup_theme', 'pudin_setup' );

/* ------------------------------------------

-------------------------------------------- */


