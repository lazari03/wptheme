<?php
/**
 * Demo import integrations.
 *
 * @package LINKNEST
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function linknest_ocdi_import_files() {
	$base = get_template_directory() . '/assets/demo/';
	return array(
		array(
			'import_file_name'             => __( 'SaaS Demo', 'linknest' ),
			'local_import_file'            => $base . 'saas/content.xml',
			'local_import_customizer_file' => $base . 'saas/customizer.dat',
			'local_import_widget_file'     => $base . 'saas/widgets.wie',
		),
		array(
			'import_file_name'             => __( 'Creator Demo', 'linknest' ),
			'local_import_file'            => $base . 'creator/content.xml',
			'local_import_customizer_file' => $base . 'creator/customizer.dat',
			'local_import_widget_file'     => $base . 'creator/widgets.wie',
		),
		array(
			'import_file_name'             => __( 'Agency Demo', 'linknest' ),
			'local_import_file'            => $base . 'agency/content.xml',
			'local_import_customizer_file' => $base . 'agency/customizer.dat',
			'local_import_widget_file'     => $base . 'agency/widgets.wie',
		),
		array(
			'import_file_name'             => __( 'Shop Demo', 'linknest' ),
			'local_import_file'            => $base . 'shop/content.xml',
			'local_import_customizer_file' => $base . 'shop/customizer.dat',
			'local_import_widget_file'     => $base . 'shop/widgets.wie',
		),
	);
}
add_filter( 'ocdi/import_files', 'linknest_ocdi_import_files' );

function linknest_ocdi_after_import_setup( $selected_import ) {
	$front_page = get_page_by_title( 'Home' );
	$blog_page  = get_page_by_title( 'Blog' );
	$primary    = get_term_by( 'name', 'Primary Menu', 'nav_menu' );

	if ( $front_page instanceof WP_Post ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', (int) $front_page->ID );
	}

	if ( $blog_page instanceof WP_Post ) {
		update_option( 'page_for_posts', (int) $blog_page->ID );
	}

	if ( $primary && ! is_wp_error( $primary ) ) {
		set_theme_mod( 'nav_menu_locations', array( 'primary' => (int) $primary->term_id ) );
	}

	if ( isset( $selected_import['import_file_name'] ) && 'Shop Demo' === $selected_import['import_file_name'] ) {
		$shop_page = get_page_by_title( 'Shop' );
		if ( $shop_page instanceof WP_Post ) {
			update_option( 'woocommerce_shop_page_id', (int) $shop_page->ID );
		}
	}
}
add_action( 'ocdi/after_import', 'linknest_ocdi_after_import_setup' );

function linknest_render_demo_page() {
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Import LINKNEST Demo', 'linknest' ); ?></h1>
		<p><?php esc_html_e( 'Choose a demo and run import from One Click Demo Import.', 'linknest' ); ?></p>
		<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:16px;max-width:980px;">
			<?php foreach ( linknest_ocdi_import_files() as $demo ) : ?>
				<div style="background:#fff;border:1px solid #ddd;padding:16px;border-radius:8px;">
					<div style="height:120px;border-radius:8px;background:linear-gradient(135deg,#7c3aed,#22d3ee);margin-bottom:10px;" aria-hidden="true"></div>
					<h3><?php echo esc_html( $demo['import_file_name'] ); ?></h3>
					<p><?php esc_html_e( 'Importer-ready package (content, widgets, customizer).', 'linknest' ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
		<p><a class="button button-primary" href="<?php echo esc_url( admin_url( 'themes.php?page=pt-one-click-demo-import' ) ); ?>"><?php esc_html_e( 'Open Demo Importer', 'linknest' ); ?></a></p>
	</div>
	<?php
}
