<?php
/*
* Pudin Saepudin
* https://t.me/pudin_ira
* https://instagram.com/pudin.ira
* https://youtube.com/c/pudintv
* https://www.pdn.my.id
* function to create wp-sitemap.xml file in root directory of site
* add_action("publish_post", "pdn_create_sitemap");
* add_action("publish_page", "pdn_create_sitemap");
*/
if ( ! function_exists( 'pdn_create_sitemap' ) ) :
	add_action( "save_post", "pdn_create_sitemap" );
	function pdn_create_sitemap() {
		if ( str_replace( '-', '', get_option( 'gmt_offset' ) ) < 10 ) { 
			$tempo = '-0' . str_replace( '-', '', get_option( 'gmt_offset' ) ); 
		} else { 
			$tempo = get_option( 'gmt_offset' ); 
		}
		if( strlen( $tempo ) == 3 ) { $tempo = $tempo . ':00'; }
		$postsForSitemap = get_posts( array(
			'numberposts' => -1,
			'orderby'     => 'modified',
			'post_type'   => array( 'post', 'page' ),
			'order'       => 'DESC'
		) );
		$sitemap .= '<?xml version="1.0" encoding="UTF-8"?>' . '<?xml-stylesheet type="text/xsl" href="' . 
			esc_url( home_url( '/' ) ) . 'sitemap.xsl"?>';
		$sitemap .= "\n" . '<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
		$sitemap .= "\t" . '<url>' . "\n" .
			"\t\t" . '<loc>' . esc_url( home_url( '/' ) ) . '</loc>' .
			"\n\t\t" . '<lastmod>' . date( "Y-m-d\TH:i:s", current_time( 'timestamp', 0 ) ) . $tempo . '</lastmod>' .
			"\n\t\t" . '<changefreq>daily</changefreq>' .
			"\n\t\t" . '<priority>1.0</priority>' .
			"\n\t" . '</url>' . "\n";
		foreach( $postsForSitemap as $post ) {
			setup_postdata( $post);
			$postdate = explode( " ", $post->post_modified );
			$sitemap .= "\t" . '<url>' . "\n" .
				"\t\t" . '<loc>' . get_permalink( $post->ID ) . '</loc>' .
				"\n\t\t" . '<lastmod>' . $postdate[0] . 'T' . $postdate[1] . $tempo . '</lastmod>' .
				"\n\t\t" . '<changefreq>Weekly</changefreq>' .
				"\n\t\t" . '<priority>0.5</priority>' .
				"\n\t" . '</url>' . "\n";
		}
		$sitemap .= '</urlset>';
		$fp = fopen( ABSPATH . "wp-sitemap.xml", 'w' );
		fwrite( $fp, $sitemap );
		fclose( $fp );
	}
endif; /* END Code sitemap */
