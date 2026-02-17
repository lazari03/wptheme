<?php
/**
 * Customizer settings.
 *
 * @package LINKNEST
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function linknest_sanitize_checkbox( $value ) {
	return ( isset( $value ) && true === (bool) $value );
}

function linknest_customize_register( $wp_customize ) {
	$wp_customize->add_panel(
		'linknest_theme_options',
		array(
			'title'    => __( 'LINKNEST Theme Options', 'linknest' ),
			'priority' => 10,
		)
	);

	$sections = array(
		'global'      => __( 'Global Colors', 'linknest' ),
		'typography'  => __( 'Typography', 'linknest' ),
		'header'      => __( 'Header', 'linknest' ),
		'footer'      => __( 'Footer', 'linknest' ),
		'hero'        => __( 'Hero', 'linknest' ),
		'layout'      => __( 'Layout', 'linknest' ),
		'animations'  => __( 'Animations', 'linknest' ),
		'woocommerce' => __( 'WooCommerce', 'linknest' ),
		'performance' => __( 'Performance', 'linknest' ),
	);

	foreach ( $sections as $id => $label ) {
		$wp_customize->add_section(
			'linknest_' . $id,
			array(
				'title' => $label,
				'panel' => 'linknest_theme_options',
			)
		);
	}

	$wp_customize->add_setting( 'linknest_primary_color', array( 'default' => '#7c3aed', 'sanitize_callback' => 'sanitize_hex_color' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'linknest_primary_color', array( 'label' => __( 'Primary Color', 'linknest' ), 'section' => 'linknest_global' ) ) );
	$wp_customize->add_setting( 'linknest_accent_color', array( 'default' => '#22d3ee', 'sanitize_callback' => 'sanitize_hex_color' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'linknest_accent_color', array( 'label' => __( 'Accent Color', 'linknest' ), 'section' => 'linknest_global' ) ) );

	$wp_customize->add_setting( 'linknest_typography', array( 'default' => 'inter', 'sanitize_callback' => 'sanitize_key' ) );
	$wp_customize->add_control( 'linknest_typography', array( 'label' => __( 'Font Family', 'linknest' ), 'section' => 'linknest_typography', 'type' => 'select', 'choices' => array( 'inter' => 'Inter', 'manrope' => 'Manrope', 'plus' => 'Plus Jakarta Sans' ) ) );

	$wp_customize->add_setting( 'linknest_header_layout', array( 'default' => 'classic', 'sanitize_callback' => 'sanitize_key' ) );
	$wp_customize->add_control( 'linknest_header_layout', array( 'label' => __( 'Header Layout', 'linknest' ), 'section' => 'linknest_header', 'type' => 'select', 'choices' => array( 'classic' => 'Header 1 - Classic', 'floating-island' => 'Header 2 - Floating Island', 'centered' => 'Header 3 - Centered', 'split' => 'Header 4 - Split', 'transparent' => 'Header 5 - Transparent', 'minimal-mobile' => 'Header 6 - Minimal Mobile' ) ) );
	$wp_customize->add_setting( 'linknest_header_sticky', array( 'default' => true, 'sanitize_callback' => 'linknest_sanitize_checkbox' ) );
	$wp_customize->add_control( 'linknest_header_sticky', array( 'label' => __( 'Enable Sticky Header', 'linknest' ), 'section' => 'linknest_header', 'type' => 'checkbox' ) );
	$wp_customize->add_setting( 'linknest_header_transparent', array( 'default' => false, 'sanitize_callback' => 'linknest_sanitize_checkbox' ) );
	$wp_customize->add_control( 'linknest_header_transparent', array( 'label' => __( 'Enable Transparent Header', 'linknest' ), 'section' => 'linknest_header', 'type' => 'checkbox' ) );

	$wp_customize->add_setting( 'linknest_footer_layout', array( 'default' => 'columns-3', 'sanitize_callback' => 'sanitize_key' ) );
	$wp_customize->add_control( 'linknest_footer_layout', array( 'label' => __( 'Footer Layout', 'linknest' ), 'section' => 'linknest_footer', 'type' => 'select', 'choices' => array( 'columns-2' => '2 Columns', 'columns-3' => '3 Columns', 'columns-4' => '4 Columns', 'newsletter' => 'Newsletter', 'minimal' => 'Minimal' ) ) );

	$wp_customize->add_setting( 'linknest_hero_layout', array( 'default' => 'gradient', 'sanitize_callback' => 'sanitize_key' ) );
	$wp_customize->add_control( 'linknest_hero_layout', array( 'label' => __( 'Hero Variant', 'linknest' ), 'section' => 'linknest_hero', 'type' => 'select', 'choices' => array( 'gradient' => 'Gradient', 'split-image' => 'Split Image', 'glass' => 'Glass', 'video' => 'Video Background', 'animated' => 'Animated Background', 'minimal' => 'Minimal White' ) ) );

	$wp_customize->add_setting( 'linknest_container_width', array( 'default' => 1200, 'sanitize_callback' => 'absint' ) );
	$wp_customize->add_control( 'linknest_container_width', array( 'label' => __( 'Container Width (px)', 'linknest' ), 'section' => 'linknest_layout', 'type' => 'number' ) );
	$wp_customize->add_setting( 'linknest_button_style', array( 'default' => 'pill', 'sanitize_callback' => 'sanitize_key' ) );
	$wp_customize->add_control( 'linknest_button_style', array( 'label' => __( 'Button Shape', 'linknest' ), 'section' => 'linknest_layout', 'type' => 'radio', 'choices' => array( 'pill' => 'Pill', 'rounded' => 'Rounded' ) ) );

	$wp_customize->add_setting( 'linknest_enable_animations', array( 'default' => true, 'sanitize_callback' => 'linknest_sanitize_checkbox' ) );
	$wp_customize->add_control( 'linknest_enable_animations', array( 'label' => __( 'Enable Animations', 'linknest' ), 'section' => 'linknest_animations', 'type' => 'checkbox' ) );

	$wp_customize->add_setting( 'linknest_wc_products_per_row', array( 'default' => 3, 'sanitize_callback' => 'absint' ) );
	$wp_customize->add_control( 'linknest_wc_products_per_row', array( 'label' => __( 'Products Per Row', 'linknest' ), 'section' => 'linknest_woocommerce', 'type' => 'number' ) );
	$wp_customize->add_setting( 'linknest_wc_card_style', array( 'default' => 'modern', 'sanitize_callback' => 'sanitize_key' ) );
	$wp_customize->add_control( 'linknest_wc_card_style', array( 'label' => __( 'Product Card Style', 'linknest' ), 'section' => 'linknest_woocommerce', 'type' => 'select', 'choices' => array( 'modern' => 'Modern', 'minimal' => 'Minimal' ) ) );
	$wp_customize->add_setting( 'linknest_wc_quick_view', array( 'default' => false, 'sanitize_callback' => 'linknest_sanitize_checkbox' ) );
	$wp_customize->add_control( 'linknest_wc_quick_view', array( 'label' => __( 'Enable Quick View', 'linknest' ), 'section' => 'linknest_woocommerce', 'type' => 'checkbox' ) );
	$wp_customize->add_setting( 'linknest_wc_shop_hero', array( 'default' => true, 'sanitize_callback' => 'linknest_sanitize_checkbox' ) );
	$wp_customize->add_control( 'linknest_wc_shop_hero', array( 'label' => __( 'Enable Shop Hero', 'linknest' ), 'section' => 'linknest_woocommerce', 'type' => 'checkbox' ) );

	$wp_customize->add_setting( 'linknest_perf_defer_scripts', array( 'default' => true, 'sanitize_callback' => 'linknest_sanitize_checkbox' ) );
	$wp_customize->add_control( 'linknest_perf_defer_scripts', array( 'label' => __( 'Defer Theme Scripts', 'linknest' ), 'section' => 'linknest_performance', 'type' => 'checkbox' ) );
}
add_action( 'customize_register', 'linknest_customize_register' );
