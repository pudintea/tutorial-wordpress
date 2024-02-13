<?php
/*
* https://t.me/pudin_ira/
* https://www.pdn.my.id/
* https://www.pudin.my.id/
* https://instagram.com/pudin.ira/
* https://youtube.com/c/pudintv/
*/

//Font Open Sans
if ( ! function_exists( 'add_google_fonts' ) ) :
	function add_google_fonts() { 
		wp_enqueue_style( 'add_google_fonts', ' https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800', false );
	}
endif;
//add_action( 'wp_enqueue_scripts', 'add_google_fonts' );

/* ----------- CSS -------------------
font-family: 'Open Sans', sans-serif;
------------------------------------ */

//Font Popins
if ( ! function_exists( 'add_google_fonts_poppins' ) ) :
	function add_google_fonts_poppins() {
		wp_enqueue_style( 'poppins-google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap', false ); 
	}
endif;
add_action( 'wp_enqueue_scripts', 'add_google_fonts_poppins' );

/* ----------- CSS -------------------
// font-family: 'Poppins', sans-serif;
------------------------------------ */
