<?php
/**
 * Hero library helpers.
 *
 * @package LINKNEST
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function linknest_get_hero_layout() {
	$layout = get_theme_mod( 'linknest_hero_layout', 'gradient' );
	$valid  = array( 'gradient', 'split-image', 'glass', 'video', 'animated', 'minimal' );

	return in_array( $layout, $valid, true ) ? $layout : 'gradient';
}
