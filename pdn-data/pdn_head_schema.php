<?php
/*
	Pudin S I
	https://t.me/pudin_ira
	https://instagram.com/pudin.ira
	https://www.pdn.my.id
*/

if ( ! function_exists( 'pdn_header_schema_website' ) ) :
	function pdn_header_schema_website() { ?>
		<link rel="alternate" type="application/atom+xml" title="<?=get_bloginfo( 'name' ); ?> - Atom" href="<?=get_bloginfo( 'atom_url' ); ?>" />
		<link rel="alternate" type="application/rss+xml" title="<?=get_bloginfo( 'name' ); ?> - RSS" href="<?=get_bloginfo( 'rss_url' ); ?>" />
		<script type="application/ld+json">
		{
		  "@context": "http://schema.org",
		  "@type": "WebSite",
		  "@id": "#website",
		  "name": "<?=get_bloginfo( 'name' ); ?>",
		  "alternateName": "<?=get_bloginfo( 'description' ); ?>",
		  "url": "<?=get_home_url();?>",
		  "potentialAction": {
			"@type": "SearchAction",
			"target": "<?=get_home_url();?>/?s={search_term_string}",
			"query-input": "required name=search_term_string"
		  }
		}
		</script>
		<script type="application/ld+json">
		{
			"@context": "http://schema.org",
			"@type": "BreadcrumbList",
			"itemListElement": [
				{
					"@type": "ListItem",
					"position": 1,
					"item": {
						"@id": "<?=get_home_url();?>",
						"name": "Home"
					}
				}
			]
		}
		</script>
	<?php
	  }
	  
	add_action( 'wp_head', 'pdn_header_schema_website', 10 );
endif;
?>
