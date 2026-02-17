<?php
/**
 * Header builder helpers.
 *
 * @package LINKNEST
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function linknest_get_header_layout() {
	$layout = get_theme_mod( 'linknest_header_layout', 'classic' );
	$valid  = array( 'classic', 'floating-island', 'centered', 'split', 'transparent', 'minimal-mobile' );

	return in_array( $layout, $valid, true ) ? $layout : 'classic';
}
