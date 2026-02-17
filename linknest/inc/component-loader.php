<?php
/**
 * Admin component navigation.
 *
 * @package LINKNEST
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function linknest_register_admin_menu() {
	add_menu_page(
		esc_html__( 'LINKNEST', 'linknest' ),
		esc_html__( 'LINKNEST', 'linknest' ),
		'manage_options',
		'linknest-dashboard',
		'linknest_render_components_page',
		'dashicons-admin-customizer',
		58
	);

	add_submenu_page( 'linknest-dashboard', esc_html__( 'Components', 'linknest' ), esc_html__( 'Components', 'linknest' ), 'manage_options', 'linknest-dashboard', 'linknest_render_components_page' );
	add_submenu_page( 'linknest-dashboard', esc_html__( 'Import Demo', 'linknest' ), esc_html__( 'Import Demo', 'linknest' ), 'manage_options', 'linknest-import-demo', 'linknest_render_demo_page' );
}
add_action( 'admin_menu', 'linknest_register_admin_menu' );

function linknest_render_components_page() {
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'LINKNEST Components', 'linknest' ); ?></h1>
		<p><?php esc_html_e( 'Create and manage headers, footers, heroes, and reusable sections from Custom Post Types.', 'linknest' ); ?></p>
		<ul>
			<li><a href="<?php echo esc_url( admin_url( 'edit.php?post_type=linknest_header' ) ); ?>"><?php esc_html_e( 'Manage Headers', 'linknest' ); ?></a></li>
			<li><a href="<?php echo esc_url( admin_url( 'edit.php?post_type=linknest_footer' ) ); ?>"><?php esc_html_e( 'Manage Footers', 'linknest' ); ?></a></li>
			<li><a href="<?php echo esc_url( admin_url( 'edit.php?post_type=linknest_hero' ) ); ?>"><?php esc_html_e( 'Manage Hero Blocks', 'linknest' ); ?></a></li>
			<li><a href="<?php echo esc_url( admin_url( 'edit.php?post_type=linknest_template' ) ); ?>"><?php esc_html_e( 'Manage Templates', 'linknest' ); ?></a></li>
		</ul>
	</div>
	<?php
}
