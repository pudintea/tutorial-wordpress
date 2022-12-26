<?php
function add_google_fonts() {
	wp_enqueue_style( ' add_google_fonts ', ' https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800', false );
}
add_action( 'wp_enqueue_scripts', 'add_google_fonts' );

// functions.php
// font-family: 'Open Sans', sans-serif;
