<?php
/**
 * Add a slide.
 */
function pdn_slide_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'PDN:Nampilin Slide', 'scholarship' ),
        'id'            => 'slide-1',
        'description'   => __( 'Saya Persiapkan untuk menampilkan slide di halaman utama/home.', 'scholarship' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );
}

add_action( 'widgets_init', 'pdn_slide_widgets_init' );


// KODE ASLI //
/*
function wpdocs_theme_slug_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Main Sidebar', 'textdomain' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'wpdocs_theme_slug_widgets_init' );
*/

/*
// VIEW
<?php if ( is_active_sidebar( 'left-sidebar' ) ) : ?>
<!--
    <ul id="sidebar">
        <?php dynamic_sidebar( 'left-sidebar' ); ?>
    </ul>
	-->
<?php endif; ?>
*/

// https://developer.wordpress.org/reference/functions/dynamic_sidebar/
// https://developer.wordpress.org/reference/functions/register_sidebar/

/*
== CARA PEMASANGANYA ==
// Paste di Header.php
				if ( is_active_sidebar( 'slide-1' ) ){
					dynamic_sidebar( 'slide-1' );
				}else{
					echo '<p>Silahkan masukan slidenya melalui menu : Appearance > Widget > PDN:Nampilin Slide </p>';
				}

DI pdn.function.php

require_once('pdn_register_widget_slide.php');

*/
?>