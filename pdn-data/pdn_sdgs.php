<?php 


/*** POST TYPE SLIDE ***/
	
	register_post_type( 'pdn_sdgs',		
	array(			
	    'menu_icon' => 'dashicons-universal-access',
		'labels' => array(				
	    'name' => __( 'SDGS' ),				
	    'singular_name' => __( 'SDGS' ),        
	    'add_new' => __( 'Tambah SDGS?' ),	
	    'add_new_item' => __( 'Tambah SDGS' ),	
	    'edit' => __( 'Edit' ),	 
	    'edit_item' => __( 'Edit SDGS' ),	
	    'new_item' => __( 'Item SDGS' ),	
	    'view' => __( 'Lihat SDGS' ),	
	    'view_item' => __( 'Lihat Item' ),	
	    'search_items' => __( 'Cari Item' ),	
	    'not_found' => __( 'Tidak ada SDGS ditemukan' ),	
	    'not_found_in_trash' => __( 'Tidak ada SDGS di folder Trash' ),	
	    'parent' => __( 'Parent Super Duper' ),			
	    ),		                	
		'public' => true,           					            
		'has_archive' => true,        			            
		'supports' => array( 'title', 'thumbnail' ),        			            
		'exclude_from_search' => false,
		'register_meta_box_cb' => 'pdn_sdgs_meta_box',
		 )	
    );
	
	function pdn_sdgs_meta_box() {
	    add_meta_box('pdn_sdgs_meta_box_isi', 'Penting dibaca', 'pdn_sdgs_meta_box_isi', 'pdn_sdgs', 'normal', 'default');
	}
	
	function pdn_sdgs_meta_box_isi() {
		
		global $post;
	    // Noncename needed to verify where the data originated
	    echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
	    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

	    // Get the location data if its already been entered

	    $pdn_embed = get_post_meta($post->ID, '_pdn_sdgs', true);

	    // Echo out the field

			echo '<p>Masukan LINK dibawah ini</p>';
	        echo '<input type="text" name="_pdn_sdgs" value="' . $pdn_embed  . '" class="widefat" autocomplete="off" />';
	    ?>
			<div>
				<ul>
				<li>1. Untuk menambahkan Gambar SDGS, silahkan isi pada bagian <b><i>Featured Image / Gambar Unggulan</i></b> di sebelah kanan bawah</li>
				<li>2. Klik Set Featured Image</li>
				<li>3. Ukuran Gambar yang disarankan untuk SDGS adalah 1:1 = <b> Lebar: 550px, Tinggi: 550px </b></li>
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
	
	function pdn_sdgs_meta($post_id, $post) {

	    if ( !isset( $_POST['eventmeta_noncename'] ) || !wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename(__FILE__) )) {
			return $post->ID;
		}

	    // Is the user allowed to edit the post or page?

	    if ( !current_user_can( 'edit_post', $post->ID ))

	        return $post->ID;

	    // OK, we're authenticated: we need to find and save the data
	    // We'll put it into an array to make it easier to loop though.

	    $events_meta['_pdn_sdgs'] = $_POST['_pdn_sdgs'];

	    // Add values of $events_meta as custom fields

	    foreach ($events_meta as $key => $value) { // Cycle through the $events_meta array!	        
		    if( $post->post_type == 'revision' ) return; // Don't store custom data twice
	        $value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
	        if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
	            update_post_meta($post->ID, $key, $value);
	        } else { // If the custom field doesn't have a value
	            add_post_meta($post->ID, $key, $value);
	        }
	        if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
	    }

	}

	add_action('save_post', 'pdn_sdgs_meta', 1, 2); // save the custom fields
	
?>