<?php 

/*** POST TYPE VIDEO ***/
	
	register_post_type( 'pdn_youtube',		
	array(			
	    'menu_icon' => 'dashicons-video-alt3',
		'labels' => array(				
	    'name' => __( 'Youtube' ),				
	    'singular_name' => __( 'Youtube' ),        
	    'add_new' => __( 'Tambah Youtube?' ),	
	    'add_new_item' => __( 'Tambah Youtube' ),	
	    'edit' => __( 'Edit' ),	 
	    'edit_item' => __( 'Edit Youtube' ),	
	    'new_item' => __( 'Item Baru' ),	
	    'view' => __( 'Lihat Youtube' ),	
	    'view_item' => __( 'Lihat Item' ),	
	    'search_items' => __( 'Cari Item' ),	
	    'not_found' => __( 'Tidak ada Youtube ditemukan' ),	
	    'not_found_in_trash' => __( 'Tidak ada Youtube di folder Trash' ),	
	    'parent' => __( 'Parent Super Duper' ),			
	    ),		                	
		'public' => true,           					            
		'has_archive' => true,        			            
		'supports' => array( 'title' ),        			            
		'exclude_from_search' => false, 	 
		'register_meta_box_cb' => 'vid',
		 )
    );
	
		function vid() {
	    add_meta_box('pdn_yt', 'Youtube Galeri', 'pdn_yt', 'pdn_youtube', 'normal', 'default');
	}

	function pdn_yt() {
	    global $post;
	    // Noncename needed to verify where the data originated
	    echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
	    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

	    // Get the location data if its already been entered

	    $pdn_embed = get_post_meta($post->ID, '_pdn_youtube', true);

	    // Echo out the field

	        echo '<p>Untuk memudahkan penambahan video, gunakan embed video dari Youtube dan cukup masukkan ID Videonya saja.</p>';
	        echo '<p>Contoh Link youtube: https://www.youtube.com/watch?v=rQvfC6hb9To</p>';
	        echo '<p>Yang dimaskuan hanya : rQvfC6hb9To</p>';
			echo '<p>Masukan ID videonya dibawah ini</p>';
	        echo '<input type="text" name="_pdn_youtube" value="' . $pdn_embed  . '" class="widefat" />';
	}

	function pdn_vid_meta($post_id, $post) {

	    if ( !isset( $_POST['eventmeta_noncename'] ) || !wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename(__FILE__) )) {
			return $post->ID;
		}

	    // Is the user allowed to edit the post or page?

	    if ( !current_user_can( 'edit_post', $post->ID ))

	        return $post->ID;

	    // OK, we're authenticated: we need to find and save the data
	    // We'll put it into an array to make it easier to loop though.

	    $events_meta['_pdn_youtube'] = $_POST['_pdn_youtube'];

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

	add_action('save_post', 'pdn_vid_meta', 1, 2); // save the custom fields
	
?>