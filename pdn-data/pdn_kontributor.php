<?php 


/*** POST TYPE SLIDE ***/
	
	register_post_type( 'pdn_kontributor',		
	array(			
	    'menu_icon' => 'dashicons-groups',
		'labels' => array(				
	    'name' => __( 'Kontributor' ),				
	    'singular_name' => __( 'Kontributor' ),        
	    'add_new' => __( 'Tambah Kontributor?' ),	
	    'add_new_item' => __( 'Tambah Kontributor' ),	
	    'edit' => __( 'Edit' ),	 
	    'edit_item' => __( 'Edit Kontributor' ),	
	    'new_item' => __( 'Item Kontributor' ),	
	    'view' => __( 'Lihat Kontributor' ),	
	    'view_item' => __( 'Lihat Item' ),	
	    'search_items' => __( 'Cari Item' ),	
	    'not_found' => __( 'Tidak ada Kontributor ditemukan' ),	
	    'not_found_in_trash' => __( 'Tidak ada Kontributor di folder Trash' ),	
	    'parent' => __( 'Parent Super Duper' ),			
	    ),		                	
		'public' => true,           					            
		'has_archive' => true,        			            
		'supports' => array( 'title', 'thumbnail' ),        			            
		'exclude_from_search' => false,
		'register_meta_box_cb' => 'pdn_kontributor_meta_box',
		 )	
    );
	
	function pdn_kontributor_meta_box() {
	    add_meta_box('pdn_kontributor_meta_box_isi', 'Penting dibaca', 'pdn_kontributor_meta_box_isi', 'pdn_kontributor', 'normal', 'default');
	}
	
	function pdn_kontributor_meta_box_isi() {
	    ?>
			<div>
				<ul>
				<li>1. Untuk menambahkan Kontributor, silahkan isi pada bagian <b><i>Featured Image / Gambar Unggulan</i></b> di sebelah kanan bawah</li>
				<li>2. Klik Set Featured Image</li>
				<li>3. Ukuran Gambar yang disarankan untuk Kontributor adalah: <b> Lebar: 1536px, Tinggi: 680px </b></li>
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