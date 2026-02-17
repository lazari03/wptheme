<?php
/**
 * Enqueue scripts and styles.
 *
 * @package LINKNEST
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get Google Fonts URL from selected typography.
 *
 * @return string
 */
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

	$query_args = array(
		'family'  => rawurlencode( $fonts[ $selected ] ),
		'display' => 'swap',
	);

	return add_query_arg( $query_args, 'https://fonts.googleapis.com/css2' );
}

/**
 * Enqueue frontend assets.
 */
function linknest_enqueue_assets() {
	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'linknest-fonts', esc_url_raw( linknest_get_fonts_url() ), array(), null );
	wp_enqueue_style( 'linknest-main', get_template_directory_uri() . '/assets/css/main.css', array(), $version );

	wp_enqueue_script( 'linknest-main', get_template_directory_uri() . '/assets/js/main.js', array(), $version, true );
	wp_script_add_data( 'linknest-main', 'defer', true );

	wp_localize_script(
		'linknest-main',
		'linknestConfig',
		array(
			'containerWidth' => absint( get_theme_mod( 'linknest_container_width', 1200 ) ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'linknest_enqueue_assets' );
