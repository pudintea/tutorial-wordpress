<?php
/*





*/

add_action( 'admin_menu', 'pdn_telegram_my_admin_menu' );
function pdn_telegram_my_admin_menu() {
    add_menu_page( 'Grup Telegram', 'Grup Telegram', 'manage_options', 'pdn-telegram-grup', 'pdn_telegram_my_admin_menu_page', 'dashicons-groups', 2  );
}

function pdn_telegram_my_admin_menu_page(){
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
			#pdn_feed_list ul li a {
				text-decoration:none;
			}
			#pdn_feed_list ul li a:hover {
				color: #000;
			}
			.inside-body p{
				font-size: 16px;
			}
		</style>
	<?php
    echo '<div class="wrap" style="width: 90%; margin:auto; padding-top: 3em;">';
    echo '<h1 style="font-size: 3em; text-transform: uppercase;">Grup Telegram</h1>';
		echo '<div class="dashboard-widgets-wrap" style="padding-top: 1em;">';
			echo '<div class="postbox-container">';
				echo '<div class="meta-box-sortables ui-sortable">';
					echo '<div class="postbox">';
						echo '<div class="postbox-header">';
							echo '<h2 style="padding: 10px;">Asalamualaikum Wr Wb</h2>';
						echo '</div>';
						echo '<div class="inside" style="display:flex;">';
							echo '<div class="inside-body" style="width:60%;">';
									echo '<h3><b>Informasi</b></h3>';
									echo '<p>Bapak dan Ibu pengelola website sekolah Al Azhar, kami ingin mengajak bapak dan ibu agar bisa bergabung bersama kami dalam sebuah grup yang sudah di buat oleh tim humas dengan tujuan agar semua admin/pengelola website bisa cakap berinteraksi dalam grup tersebut terkait masalah pengelolaan website.</p>';
									echo '<p>Dalam grup tersebut sudah banyak juga pertanyaan yang sudah di jawab, jadi silahkan di periksa terlebih dahulu chat sebelumnya barangkali yang bapak ibu tanyakan sudah ada jawabanya.</p>';
									echo '<p>Untuk bergabung dengan grup telegram, silahkan klik tombol yang ada di bawah ini.</p>';
									echo '<p><a href="https://t.me/+m2GMy3Zbjcg4NGFl" rel="nofollow noopener noreferrer" target="_blank" class="pdn-button">BERGABUNG</a></p>';
							echo '</div>';
							echo '<div class="inside-body" style="margin-left: 3em;">';
									echo '<h3><b>Artikel yang mungkin kamu butuhkan</b></h3>';
									echo '<div id="pdn_feed_list">';
									wp_widget_rss_output(array(
										'url' => 'https://feeds.feedburner.com/pdn-my-id',
										'items' => 10,
										'show_summary' => 0,
										'show_author' => 0,
										'show_date' => 0)
										);
									echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
    echo '</div>';
}




