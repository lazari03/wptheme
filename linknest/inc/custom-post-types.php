<?php
/**
 * Custom post types.
 *
 * @package LINKNEST
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register LINKNEST CPTs.
 */
function linknest_register_custom_post_types() {
	$types = array(
		'linknest_feature' => array(
			'singular' => __( 'Feature', 'linknest' ),
			'plural'   => __( 'Features', 'linknest' ),
		),
		'linknest_testimonial' => array(
			'singular' => __( 'Testimonial', 'linknest' ),
			'plural'   => __( 'Testimonials', 'linknest' ),
		),
		'linknest_pricing' => array(
			'singular' => __( 'Pricing Plan', 'linknest' ),
			'plural'   => __( 'Pricing Plans', 'linknest' ),
		),
	);

	foreach ( $types as $slug => $label ) {
		register_post_type(
			$slug,
			array(
				'labels' => array(
					'name'          => $label['plural'],
					'singular_name' => $label['singular'],
					'add_new_item'  => sprintf( __( 'Add New %s', 'linknest' ), $label['singular'] ),
					'edit_item'     => sprintf( __( 'Edit %s', 'linknest' ), $label['singular'] ),
				),
				'public'             => true,
				'show_in_rest'       => true,
				'menu_icon'          => 'dashicons-screenoptions',
				'has_archive'        => true,
				'supports'           => array( 'title', 'editor', 'thumbnail' ),
				'rewrite'            => array( 'slug' => str_replace( 'linknest_', '', $slug ) ),
			)
		);
	}
}
add_action( 'init', 'linknest_register_custom_post_types' );
