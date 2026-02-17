<?php
/**
 * Template library + meta box.
 *
 * @package LINKNEST
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function linknest_add_template_meta_box() {
	add_meta_box( 'linknest_template_select', esc_html__( 'Select LINKNEST Template', 'linknest' ), 'linknest_render_template_meta_box', 'page', 'side' );
}
add_action( 'add_meta_boxes', 'linknest_add_template_meta_box' );

function linknest_render_template_meta_box( $post ) {
	wp_nonce_field( 'linknest_template_meta', 'linknest_template_nonce' );
	$current = get_post_meta( $post->ID, '_linknest_page_template', true );
	$options = array(
		''                  => __( 'Default', 'linknest' ),
		'saas-landing'      => __( 'SaaS Landing', 'linknest' ),
		'agency-landing'    => __( 'Agency Landing', 'linknest' ),
		'creator-landing'   => __( 'Creator Landing', 'linknest' ),
		'app-landing'       => __( 'App Landing', 'linknest' ),
		'blog-layout-1'     => __( 'Blog Layout 1', 'linknest' ),
		'blog-layout-2'     => __( 'Blog Layout 2', 'linknest' ),
		'sidebar-layout'    => __( 'Sidebar Layout', 'linknest' ),
		'full-width-layout' => __( 'Full Width Layout', 'linknest' ),
		'woo-shop-layout'   => __( 'WooCommerce Shop Layout', 'linknest' ),
	);
	?>
	<select name="linknest_page_template" style="width:100%">
		<?php foreach ( $options as $value => $label ) : ?>
			<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $current, $value ); ?>><?php echo esc_html( $label ); ?></option>
		<?php endforeach; ?>
	</select>
	<?php
}

function linknest_save_template_meta( $post_id ) {
	if ( ! isset( $_POST['linknest_template_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['linknest_template_nonce'] ) ), 'linknest_template_meta' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$value = isset( $_POST['linknest_page_template'] ) ? sanitize_key( wp_unslash( $_POST['linknest_page_template'] ) ) : '';
	update_post_meta( $post_id, '_linknest_page_template', $value );
}
add_action( 'save_post_page', 'linknest_save_template_meta' );

function linknest_dynamic_page_template( $template ) {
	if ( is_page() ) {
		$selected = get_post_meta( get_queried_object_id(), '_linknest_page_template', true );
		if ( $selected ) {
			$candidate = get_template_directory() . '/template-parts/templates/' . $selected . '.php';
			if ( file_exists( $candidate ) ) {
				return $candidate;
			}
		}
	}

	return $template;
}
add_filter( 'template_include', 'linknest_dynamic_page_template', 20 );
