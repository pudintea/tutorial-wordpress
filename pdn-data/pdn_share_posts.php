<?php 
/*
* Pudin Saepudin
* https://t.me/pudin_ira
* https://instagram.com/pudin.ira
* https://www.pdn.my.id
* https://youtube.com/c/pudintv
*/

function pdn_share_after_content($content, $id = false){
	
	if ( ! $id ) {
		$id = get_the_ID();
	}
	$pdn_link          = [];
	$pdn_link['url']   = esc_url( get_permalink( $id ) );
	$pdn_link['title'] = wp_strip_all_tags( get_the_title( $id ) );
	$pdn_image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'pdn_share_after_content' ); //$image[0] thumbnail
	$pdn_thumbnail = isset($pdn_image[0]) ? $pdn_image[0] : get_template_directory_uri().'/assets/images/img-thumbnail1.jpg'; //Jangan Lupa, Siapkan gambar defaultnya ya.
	// POSTS
    if (is_single()) {
        $content .= '<div class="pdn-share">';
        $content .= '<ul>';
		$content .= '<li><a href="https://www.facebook.com/sharer.php?u='.$pdn_link['url'].'" title="Bagikan ke Facebook" rel="nofollow noopener noreferrer" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>';
        $content .= '<li><a href="https://t.me/share/url?url='.$pdn_link['url'].'&text='.$pdn_link['title'].'" title="Bagikan ke Telegram" rel="nofollow noopener noreferrer" target="_blank"><i class="fa fa-telegram" aria-hidden="true"></i></a></li>';
        $content .= '<li><a href="https://twitter.com/intent/tweet?text='.$pdn_link['title'].'&url='.$pdn_link['url'].'" title="Bagikan ke Twitter" rel="nofollow noopener noreferrer" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>';
        $content .= '<li><a href="https://pinterest.com/pin/create/button/?url='.$pdn_link['url'].'&media='.$pdn_thumbnail.'&description='.$pdn_link['title'].'" title="Bagikan ke Pinterest" rel="nofollow noopener noreferrer" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>';
        $content .= '<li><a href="https://api.whatsapp.com/send?phone=&text='.$pdn_link['title'].' - '.$pdn_link['url'].'" title="Bagikan ke WhatsApp" rel="nofollow noopener noreferrer" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>';
        $content .= '</ul>';
        $content .= '</div>';
    }
	
	//PAGES
	/*
	if (is_page()) {  
        $content .= 'Hallo Pudin Saepudin';
    }
	*/
	
    return $content;
}
add_filter( "the_content", "pdn_share_after_content");

/**
CSS
.pdn-share {
	width:100%;
	text-align:center;
	padding-bottom: 2em;
	padding-top: 1em;
}
.pdn-share ul{
	list-style: none;
	display: flex;
	border-radius: 3px;
	border: 1px solid #ecf0f1;
	line-height:22px;
	margin:0px;
	padding:0px;
}
.pdn-share ul li{
	flex: 1;
	text-align:center;
	border-right:1px solid #ecf0f1;
}
.pdn-share ul li:hover{
	background-color:#ecf0f1;
	color:#fff;
}
.pdn-share ul li a{
	font-size: 2em;
	display: block;
	padding-top: 5px;
	padding-bottom: 5px;
}
**/
