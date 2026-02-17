<?php
/**
 * Custom post types.
 *
 * @package LINKNEST
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function linknest_register_custom_post_types() {
	$types = array(
		'linknest_header'       => __( 'Headers', 'linknest' ),
		'linknest_footer'       => __( 'Footers', 'linknest' ),
		'linknest_hero'         => __( 'Heroes', 'linknest' ),
		'linknest_template'     => __( 'Templates', 'linknest' ),
		'linknest_pricing'      => __( 'Pricing Plans', 'linknest' ),
		'linknest_features'     => __( 'Features', 'linknest' ),
		'linknest_testimonials' => __( 'Testimonials', 'linknest' ),
	);

	foreach ( $types as $slug => $plural ) {
		$singular = rtrim( $plural, 's' );

		register_post_type(
			$slug,
			array(
				'labels'       => array(
					'name'          => $plural,
					'singular_name' => $singular,
				),
				'public'       => true,
				'show_in_rest' => true,
				'has_archive'  => true,
				'supports'     => array( 'title', 'editor', 'thumbnail' ),
				'rewrite'      => array( 'slug' => str_replace( 'linknest_', '', $slug ) ),
			)
		);
	}
}
add_action( 'init', 'linknest_register_custom_post_types' );
