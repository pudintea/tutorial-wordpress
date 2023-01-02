<?php
/*
 * simple_wp Theme Customizer
 *
 * @package simple_wp
 */
add_action( 'customize_register', 'simple_wp_customize_register' );

function simple_wp_customize_register( $wp_customize ) {

	/*
	 * Create custom section for ads 
	 */

	$wp_customize->add_section( 'section_ads_post_single', array(
		'title' 	=> __( 'Pengaturan Iklan Halaman Artikel', 'simple_wp' ),
		'priority' 	=> 500
	) );

	$wp_customize->add_setting( 'setting_ads_in_content', array(
		'sanitize_callback' => false,
	) );

	$wp_customize->add_setting( 'setting_show_ads_every', array(
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'control_ads_in_content', array(
		'label' => __( 'Iklan Dalam Konten', 'wp_simple' ),
		'description' => __( 'Akan muncul di dalam konten', 'wp_simple' ),
		'section' => 'section_ads_post_single',
		'settings' => 'setting_ads_in_content',
		'type' => 'textarea',
	) );

	$wp_customize->add_control( 'control_show_ads_every', array(
		'label' => __( 'Tampilkan iklan setiap ... paragraf', 'wp_simple' ),
		'section' => 'section_ads_post_single',
		'settings' => 'setting_show_ads_every',
		'type' => 'number',
	) );

}
?>