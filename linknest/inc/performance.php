<?php
/**
 * Performance helpers.
 *
 * @package LINKNEST
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function linknest_filter_script_loader_tag( $tag, $handle, $src ) {
	if ( ! get_theme_mod( 'linknest_perf_defer_scripts', true ) ) {
		return $tag;
	}

	$allowed = array( 'linknest-core', 'linknest-animations' );
	if ( in_array( $handle, $allowed, true ) ) {
		return '<script src="' . esc_url( $src ) . '" defer></script>';
	}

	return $tag;
}
add_filter( 'script_loader_tag', 'linknest_filter_script_loader_tag', 10, 3 );
