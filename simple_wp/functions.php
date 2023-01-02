<?php
/**
 * Simple WP functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Simple_WP
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function simple_wp_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Simple WP, use a find and replace
		* to change 'simple-wp' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'simple-wp', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'simple-wp' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'simple_wp_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'simple_wp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function simple_wp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'simple_wp_content_width', 640 );
}
add_action( 'after_setup_theme', 'simple_wp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function simple_wp_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'simple-wp' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'simple-wp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'simple_wp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function simple_wp_scripts() {
	wp_enqueue_style( 'simple-wp-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'simple-wp-style', 'rtl', 'replace' );

	wp_enqueue_style( 'simple-wp-fontawesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css', array(), _S_VERSION );

	// wp_enqueue_script( 'simple-wp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	// wp_enqueue_style( 'google_fonts', 'https://fonts.googleapis.com/css2?family=Montserrat&display=swap', false );
	// wp_enqueue_script( 'fontawesome_script', 'https://kit.fontawesome.com/a02bdf0a8b.js', array(), '6.0', true );
	wp_enqueue_script( 'simple_wp_javascript', get_template_directory_uri() . '/js/js.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'simple_wp_javascript', get_template_directory_uri() . '/js/js-jquery.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'simple_wp_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



/**
 * Insert ads inside content.
 */
$ad_code_in_content_exist = get_theme_mod( 'setting_ads_in_content' );

function insert_post_ads( $content ) {
        $ad_code = get_theme_mod( 'setting_ads_in_content' );
        $insert_every = get_theme_mod( 'setting_show_ads_every' );
        $closing_p = '</p>';
        $paragraphs = explode( $closing_p, $content );
        $total_paragraph = count( $paragraphs );
        
        if ( is_single() && ! is_admin() ) {
            for ( $i = $insert_every; $i <= $total_paragraph; $i += $insert_every ) {
                $content = prefix_insert_after_paragraph( $ad_code, $i++, $content );
            }
            return $content;
        }
        return $content;
}
if ( ! $ad_code_in_content_exist == '' ) :
add_filter( 'the_content', 'insert_post_ads' );
endif;

// Parent Function.
function prefix_insert_after_paragraph( $insertion, $paragraph_id, $content ) {
    $closing_p = '</p>';
    $paragraphs = explode( $closing_p, $content );
    foreach ($paragraphs as $index => $paragraph) {
 
        if ( trim( $paragraph ) ) {
            $paragraphs[$index] .= $closing_p;
        }
 
        if ( $paragraph_id == $index + 1 ) {
            $paragraphs[$index] .= $insertion;
        }
    }
    return implode( '', $paragraphs );
}

// Excerpt function

function new_excerpt_length($length) {
	return 25;
	}
	add_filter('excerpt_length', 'new_excerpt_length');
	 
	// Changing excerpt more
	function new_excerpt_more($more) {
	return '...';
	}
	add_filter('excerpt_more', 'new_excerpt_more');
	
/* Menonaktifkan Update */
function remove_core_updates (){
global $wp_version ; return ( object ) array ( 'last_checked' => time (), 'version_checked' => $wp_version ,);
}
add_filter ( 'pre_site_transient_update_core' , 'remove_core_updates' );
add_filter ( 'pre_site_transient_update_plugins' , 'remove_core_updates' );
add_filter ( 'pre_site_transient_update_themes' , 'remove_core_updates' );
/* End Menonaktifkan Update */

