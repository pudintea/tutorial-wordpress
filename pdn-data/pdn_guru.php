<?php 

/*** POST TYPE SLIDE ***/
	
	register_post_type( 'pdn_guru',		
	array(			
	    'menu_icon' => 'dashicons-welcome-learn-more',
		'labels' => array(				
	    'name' => __( 'Guru' ),				
	    'singular_name' => __( 'Guru' ),        
	    'add_new' => __( 'Tambah Guru?' ),	
	    'add_new_item' => __( 'Tambah Guru' ),	
	    'edit' => __( 'Edit' ),	 
	    'edit_item' => __( 'Edit Guru' ),	
	    'new_item' => __( 'Item Guru' ),	
	    'view' => __( 'Lihat Guru' ),	
	    'view_item' => __( 'Lihat Item' ),	
	    'search_items' => __( 'Cari Item' ),	
	    'not_found' => __( 'Tidak ada Guru ditemukan' ),	
	    'not_found_in_trash' => __( 'Tidak ada Guru di folder Trash' ),	
	    'parent' => __( 'Parent Super Duper' ),			
	    ),		                	
		'public' => true,           					            
		'has_archive' => true,        			            
		'supports' => array( 'title', 'editor', 'thumbnail' ),        			            
		'exclude_from_search' => false,
		'register_meta_box_cb' => 'pdn_guru_meta_box',
		 )	
    );
	
	function pdn_guru_meta_box() {
	    add_meta_box('pdn_guru_meta_box_isi', 'Penting dibaca', 'pdn_guru_meta_box_isi', 'pdn_guru', 'normal', 'default');
	}
	
	function pdn_guru_meta_box_isi() {
	    ?>
			<div>
				<ul>
					<li>1. Untuk menambahkan Guru, silahkan isi pada bagian <b><i>Featured Image / Gambar Unggulan</i></b> di sebelah kanan bawah</li>
					<li>2. Klik Set Featured Image</li>
					<li>3. Ukuran Gambar yang disarankan untuk Guru adalah: <b>1 : 1</b> artinya jika lebarnya 640px maka tingginya juga 640px</li>
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