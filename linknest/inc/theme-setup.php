<?php
/**
 * Theme setup.
 *
 * @package LINKNEST
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function linknest_setup() {
	load_theme_textdomain( 'linknest', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array( 'height' => 56, 'width' => 200, 'flex-width' => true, 'flex-height' => false ) );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/editor.css' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'woocommerce' );

	register_nav_menus(
		array(
			'primary'   => esc_html__( 'Primary Menu', 'linknest' ),
			'secondary' => esc_html__( 'Secondary Menu', 'linknest' ),
			'footer'    => esc_html__( 'Footer Menu', 'linknest' ),
		)
	);
}
add_action( 'after_setup_theme', 'linknest_setup' );

function linknest_content_width() {
	$GLOBALS['content_width'] = absint( get_theme_mod( 'linknest_container_width', 1200 ) );
}
add_action( 'after_setup_theme', 'linknest_content_width', 0 );

function linknest_body_classes( $classes ) {
	$classes[] = 'linknest-button-' . sanitize_html_class( get_theme_mod( 'linknest_button_style', 'pill' ) );
	$classes[] = get_theme_mod( 'linknest_header_sticky', true ) ? 'has-sticky-header' : 'no-sticky-header';

	return $classes;
}
add_filter( 'body_class', 'linknest_body_classes' );
