<?php
/*
	Pudin S I
	https://t.me/pudin_ira
	https://instagram.com/pudin.ira
	https://www.pdn.my.id
*/

	
		function pdn_dashboard_widgets() {
			global $wp_meta_boxes;
	    	unset(
		    	$wp_meta_boxes['dashboard']['side']['core']['dashboard_plugins'],
				$wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'],
				$wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']
				);
				
				add_meta_box( 'id', 'Tutorial Pengelolaan Website <a href="https://www.pdn.my.id" target="_blank" rel="dofollow" style="text-decoration: none; font-size: 14px; text-decoration:bold;"><em>By Pudin</em></a>', 'pdn1_dashboard_custom', 'dashboard', 'normal', 'high' );
		}
		
		function pdn1_dashboard_custom()
		{
			?>
			<style>
				.pdn-button {
					background-color: red;
					border: none;
					color: #fff;
					margin-top:6px;
					padding: 10px 18px;
					text-align: center;
					text-decoration: none;
					display: inline-block;
					font-size: 16px;
					border-radius: 10px;
				}
				.pdn-button:hover {
					color: white;
					background-color: green;
				}
				#pdn_feed_list ul {
					width: 100%;
					list-style-type: decimal;
				}
				#pdn_feed_list ul li a:hover {
					color: #000;
				}
			</style>
			<div>
				<iframe width="100%" height="215" src="https://www.youtube.com/embed/rQvfC6hb9To" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			<div>
				<center>
					<a href="https://www.youtube.com/watch?v=rQvfC6hb9To&list=PLi4q_q-7vGbthO_lm0KokrcKgS6Tazp9I" class="pdn-button" target="_blank"><b><span class="dashicons dashicons-youtube"></span> Lihat Semua Video</b></a>
				</center>
			</div>
			<br/>
			<h4>Kontak Kami:</h4>
			<p>
				<a href="https://t.me/pudin_ira">Telegram</a> | <a href="https://instagram.com/pudin.ira">Instagram</a> | <a href="https://www.pdn.my.id" rel="dofollow" target="_blank">Blog Tutorial</a>
			</p>
			
			<?php
			
				echo '<h3><b>List Artikel Blog</b></h3>';
				echo '<div style="padding-left: 15px;">';
				echo '<div id="pdn_feed_list">';
				wp_widget_rss_output(array(
					'url' => 'https://feeds.feedburner.com/pdn-my-id',
					'items' => 5,
					'show_summary' => 0,
					'show_author' => 0,
					'show_date' => 0)
					);
				echo '</div>';
				echo '</div>';
		}
	
		add_action('wp_dashboard_setup', 'pdn_dashboard_widgets');
		
		
		
		
		
		
		
		