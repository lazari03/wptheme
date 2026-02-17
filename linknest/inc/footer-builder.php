<?php
/**
 * Footer builder helpers.
 *
 * @package LINKNEST
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function linknest_get_footer_layout() {
	$layout = get_theme_mod( 'linknest_footer_layout', 'columns-3' );
	$valid  = array( 'columns-2', 'columns-3', 'columns-4', 'newsletter', 'minimal' );

	return in_array( $layout, $valid, true ) ? $layout : 'columns-3';
}
