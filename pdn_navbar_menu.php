/*
| Pudin Saepudin
| https://www.pdn.my.id
| https://t.me/pudin_ira
| https://instagram.com/pudin.ira
| https://youtube.com/c/pudintv
*/


/* ------------------------
FUNCTION
------------------------ */
<?php 
// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
  'pudin_primary_menu' => esc_html__( 'Primary Menu', 'pudin' ),
) );


/* ------------------------
HEADER
------------------------ */

wp_nav_menu( 
	array(
			'theme_location' 	  => 'pudin_primary_menu',
			'menu_id'        	  => '',
			'menu_class'		    => '',
			'container' 		    => 'div', 
			'container_class' 	=> 'navbar-links', 
			'fallback_cb'		    => false,
	)
);

/* ------------------------------------------------------------------------------------------- */
