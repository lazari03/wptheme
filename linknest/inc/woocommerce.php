<?php
/**
 * WooCommerce integration.
 *
 * @package LINKNEST
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function linknest_wc_loop_columns() {
	return max( 2, min( 5, absint( get_theme_mod( 'linknest_wc_products_per_row', 3 ) ) ) );
}
add_filter( 'loop_shop_columns', 'linknest_wc_loop_columns' );

function linknest_wc_product_card_class( $classes ) {
	if ( is_product_taxonomy() || is_shop() ) {
		$classes[] = 'ln-card-' . sanitize_html_class( get_theme_mod( 'linknest_wc_card_style', 'modern' ) );
	}
	return $classes;
}
add_filter( 'post_class', 'linknest_wc_product_card_class' );

function linknest_wc_quick_view_button() {
	if ( ! get_theme_mod( 'linknest_wc_quick_view', false ) ) {
		return;
	}
	echo '<button class="button ln-quick-view" type="button">' . esc_html__( 'Quick View', 'linknest' ) . '</button>';
}
add_action( 'woocommerce_after_shop_loop_item', 'linknest_wc_quick_view_button', 15 );
