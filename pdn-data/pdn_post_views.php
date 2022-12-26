<?php
/*
		https://t.me/pudin_ira/
		https://www.pdn.my.id/
		https://instagram.com/pudin.ira/
		https://youtube.com/c/pudintv/
		
		P. Saepudin Ilham.
		Secript ini simpan di single.php
		setPostViews(get_the_ID());
		echo getPostViews(get_the_ID());
		===
		secript dibawah ini simpan di function.php
		
*/

/* Post Count and Views by Pudin*/
if ( ! function_exists( 'getPostViews' ) ) :
	function getPostViews($postID){ 
	    $count_key = 'post_views_count'; 
		$count = get_post_meta($postID, 
		$count_key, true); 
		
		if($count==''){ 
		delete_post_meta($postID, $count_key); 
		add_post_meta($postID, $count_key, '0');
		return '<span class="post-views"><i class="fas fa-eye" aria-hidden="true"></i>0 Views</span>';
		} 
		return '<span class="post-views"><i class="fas fa-eye" aria-hidden="true"></i>'.$count.' Views</span>'; 
	} 
endif;
if ( ! function_exists( 'setPostViews' ) ) :
	function setPostViews($postID) { 
	    $count_key = 'post_views_count'; 
		$count = get_post_meta($postID, $count_key, true); 
		
		if($count==''){ 
		$count = 0; delete_post_meta($postID, $count_key); 
		add_post_meta($postID, $count_key, '0'); 
		}else{ 
		$count++; 
		update_post_meta($postID, $count_key, $count); 
		} 
	}
endif;
/* End Post Count and Views by Pudin */

