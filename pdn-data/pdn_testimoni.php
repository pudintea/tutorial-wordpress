<?php 

/*** POST TYPE SLIDE ***/
	
	register_post_type( 'pdn_testimoni',		
	array(			
	    'menu_icon' => 'dashicons-format-gallery',
		'labels' => array(				
	    'name' => __( 'Testimoni' ),				
	    'singular_name' => __( 'Testimoni' ),        
	    'add_new' => __( 'Tambah Testimoni?' ),	
	    'add_new_item' => __( 'Tambah Testimoni' ),	
	    'edit' => __( 'Edit' ),	 
	    'edit_item' => __( 'Edit Testimoni' ),	
	    'new_item' => __( 'Item Testimoni' ),	
	    'view' => __( 'Lihat Testimoni' ),	
	    'view_item' => __( 'Lihat Item' ),	
	    'search_items' => __( 'Cari Item' ),	
	    'not_found' => __( 'Tidak ada Testimoni ditemukan' ),	
	    'not_found_in_trash' => __( 'Tidak ada Testimoni di folder Trash' ),	
	    'parent' => __( 'Parent Super Duper' ),			
	    ),		                	
		'public' => true,           					            
		'has_archive' => true,        			            
		'supports' => array( 'title', 'editor', 'thumbnail' ),        			            
		'exclude_from_search' => false,
		'register_meta_box_cb' => 'pdn_testimoni_meta_box',
		 )	
    );
	
	function pdn_testimoni_meta_box() {
	    add_meta_box('pdn_testimoni_meta_box_isi', 'Penting dibaca', 'pdn_testimoni_meta_box_isi', 'pdn_testimoni', 'normal', 'default');
	}
	
	function pdn_testimoni_meta_box_isi() {
	    ?>
			<div>
				<ul>
				<li>1. Untuk menambahkan testimoni, silahkan isi pada bagian <b><i>Featured Image / Gambar Unggulan</i></b> di sebelah kanan bawah</li>
				<li>2. Klik Set Featured Image</li>
				<li>3. Ukuran Gambar yang disarankan untuk testimoni adalah: <b>1 : 1</b> artinya jika lebarnya 500px maka tingginya juga 500px</li>
				</ul>
			</div>
			<br/>
			<br/>
			<br/>
			<div>
				<b>Kontak Kami</b><br/>
				<ul>
					<li><a href="https://t.me/pudin_ira" style="text-decoration:none;" target="_blank">Telegram</a></li>
					<li><a href="https://youtube.com/c/pudintv" style="text-decoration:none;" target="_blank">Youtube</a></li>
					<li><a href="https://www.it-corner.web.id/" style="text-decoration:none;" target="_blank" rel="dofollow">Website</a></li>
				</ul>
			</div>
		
		<?php
	}
	
?>