<?php
/**
 * One Click Demo Import integration.
 *
 * @package LINKNEST
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * OCDI import files.
 *
 * @return array
 */
function linknest_ocdi_import_files() {
	return array(
		array(
			'import_file_name'             => __( 'LINKNEST Demo', 'linknest' ),
			'local_import_file'            => get_template_directory() . '/assets/demo/demo-content.xml',
			'local_import_customizer_file' => get_template_directory() . '/assets/demo/customizer.dat',
		),
	);
}
add_filter( 'ocdi/import_files', 'linknest_ocdi_import_files' );

/**
 * OCDI after import setup.
 */
function linknest_ocdi_after_import_setup() {
	$front_page = get_page_by_title( 'Home' );
	$primary    = get_term_by( 'name', 'Primary Menu', 'nav_menu' );

	if ( $front_page ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', (int) $front_page->ID );
	}

	if ( $primary && ! is_wp_error( $primary ) ) {
		set_theme_mod(
			'nav_menu_locations',
			array(
				'primary' => (int) $primary->term_id,
			)
		);
	}
}
add_action( 'ocdi/after_import', 'linknest_ocdi_after_import_setup' );
