<?php
/*
	Pudin S I
	https://t.me/pudin_ira
	https://instagram.com/pudin.ira
	https://www.pdn.my.id
*/

function ns_google_analytics() { ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-121810903-1"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
	gtag('config', 'UA-121810903-1');
</script>
  <?php
  }
  
add_action( 'wp_head', 'ns_google_analytics', 10 );