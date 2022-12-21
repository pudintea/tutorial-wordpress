<?php 

define('PDN_DATA_DIR_TEMA', get_template_directory());
// POST TYPE
//add_action( 'init', 'pdn_create_post_type' );
function pdn_create_post_type() {
	require_once('pdn_slide.php');
	require_once('pdn_testimoni.php');
	require_once('pdn_guru.php');
	require_once('pdn_youtube.php');
}

// TAMBAHAN FUNGSI LAIN
require_once('pdn_tutorial.php');
require_once('pdn_disable_updates.php');
require_once('pdn_breadcrumb.php');
require_once('pdn_share_posts.php');
require_once('pdn_telegram_group.php');

//require_once('pdn_google_analytics.php');

// ADD WIDGETS
add_action( 'widgets_init', 'pdn_register_widget' );
function pdn_register_widget() {
	register_widget( 'pdn_majalah_widget' );
	register_widget( 'pdn_blog_best_practice' );
	register_widget( 'pdn_running_text_widget' );
}
// WIDGETNYA
require_once('pdn_majalah_widget.php');
require_once('pdn_blog_best_practice.php');
require_once('pdn_running_text_widget.php');
require_once('pdn_register_widget_slide.php');
?>