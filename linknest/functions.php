<?php
/**
 * LINKNEST functions and definitions.
 *
 * @package LINKNEST
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$ln_includes = array(
	'inc/theme-setup.php',
	'inc/enqueue.php',
	'inc/customizer.php',
	'inc/custom-post-types.php',
	'inc/component-loader.php',
	'inc/header-builder.php',
	'inc/footer-builder.php',
	'inc/hero-library.php',
	'inc/template-loader.php',
	'inc/woocommerce.php',
	'inc/animations.php',
	'inc/performance.php',
	'inc/demo-import.php',
);

foreach ( $ln_includes as $ln_file ) {
	require get_template_directory() . '/' . $ln_file;
}
