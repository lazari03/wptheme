<?php
/**
 * Animation helpers.
 *
 * @package LINKNEST
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function linknest_has_animations_enabled() {
	return (bool) get_theme_mod( 'linknest_enable_animations', true );
}
