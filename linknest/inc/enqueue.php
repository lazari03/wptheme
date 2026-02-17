<?php
/**
 * Enqueue scripts and styles.
 *
 * @package LINKNEST
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function linknest_get_fonts_url() {
	$fonts = array(
		'inter'   => 'Inter:wght@400;500;600;700;800',
		'manrope' => 'Manrope:wght@400;500;600;700;800',
		'plus'    => 'Plus Jakarta Sans:wght@400;500;600;700;800',
	);

	$selected = get_theme_mod( 'linknest_typography', 'inter' );

	if ( ! isset( $fonts[ $selected ] ) ) {
		$selected = 'inter';
	}

	return add_query_arg(
		array(
			'family'  => rawurlencode( $fonts[ $selected ] ),
			'display' => 'swap',
		),
		'https://fonts.googleapis.com/css2'
	);
}

function linknest_enqueue_assets() {
	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'linknest-fonts', esc_url_raw( linknest_get_fonts_url() ), array(), null );
	wp_enqueue_style( 'linknest-main', get_template_directory_uri() . '/assets/css/main.css', array(), $version );

	wp_enqueue_script( 'linknest-core', get_template_directory_uri() . '/assets/js/main.js', array(), $version, true );
	wp_script_add_data( 'linknest-core', 'defer', true );

	if ( get_theme_mod( 'linknest_enable_animations', true ) ) {
		wp_enqueue_script( 'linknest-animations', get_template_directory_uri() . '/assets/js/animations.js', array(), $version, true );
		wp_script_add_data( 'linknest-animations', 'defer', true );
	}
}
add_action( 'wp_enqueue_scripts', 'linknest_enqueue_assets' );
