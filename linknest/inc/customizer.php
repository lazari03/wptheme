<?php
/**
 * Customizer settings.
 *
 * @package LINKNEST
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Sanitize checkbox.
 *
 * @param mixed $checked Value.
 * @return bool
 */
function linknest_sanitize_checkbox( $checked ) {
	return ( isset( $checked ) && true === (bool) $checked );
}

/**
 * Register customizer settings.
 *
 * @param WP_Customize_Manager $wp_customize Manager instance.
 */
function linknest_customize_register( $wp_customize ) {
	$wp_customize->add_panel(
		'linknest_global_panel',
		array(
			'title'    => __( 'Global Settings', 'linknest' ),
			'priority' => 10,
		)
	);

	$wp_customize->add_section(
		'linknest_global_section',
		array(
			'title' => __( 'Brand & Layout', 'linknest' ),
			'panel' => 'linknest_global_panel',
		)
	);

	$colors = array(
		'linknest_primary_color'   => '#7c3aed',
		'linknest_accent_color'    => '#22d3ee',
		'linknest_gradient_start'  => '#7c3aed',
		'linknest_gradient_end'    => '#22d3ee',
		'linknest_hero_grad_start' => '#1f1147',
		'linknest_hero_grad_end'   => '#4a1ca0',
	);

	foreach ( $colors as $id => $default ) {
		$wp_customize->add_setting(
			$id,
			array(
				'default'           => $default,
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$id,
				array(
					'label'   => ucwords( str_replace( '_', ' ', str_replace( 'linknest_', '', $id ) ) ),
					'section' => 'linknest_global_section',
				)
			)
		);
	}

	$wp_customize->add_setting(
		'linknest_typography',
		array(
			'default'           => 'inter',
			'sanitize_callback' => 'sanitize_key',
		)
	);
	$wp_customize->add_control(
		'linknest_typography',
		array(
			'label'   => __( 'Typography', 'linknest' ),
			'section' => 'linknest_global_section',
			'type'    => 'select',
			'choices' => array(
				'inter'   => 'Inter',
				'manrope' => 'Manrope',
				'plus'    => 'Plus Jakarta Sans',
			),
		)
	);

	$wp_customize->add_setting(
		'linknest_container_width',
		array(
			'default'           => 1200,
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'linknest_container_width',
		array(
			'label'       => __( 'Container Width (px)', 'linknest' ),
			'section'     => 'linknest_global_section',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 960,
				'max'  => 1440,
				'step' => 10,
			),
		)
	);

	$wp_customize->add_setting(
		'linknest_button_style',
		array(
			'default'           => 'pill',
			'sanitize_callback' => 'sanitize_key',
		)
	);
	$wp_customize->add_control(
		'linknest_button_style',
		array(
			'label'   => __( 'Button Style', 'linknest' ),
			'section' => 'linknest_global_section',
			'type'    => 'radio',
			'choices' => array(
				'pill'   => __( 'Pill', 'linknest' ),
				'rounded' => __( 'Rounded', 'linknest' ),
			),
		)
	);

	// Hero panel.
	$wp_customize->add_panel(
		'linknest_hero_panel',
		array(
			'title'    => __( 'Hero Section', 'linknest' ),
			'priority' => 20,
		)
	);
	$wp_customize->add_section(
		'linknest_hero_section',
		array(
			'title' => __( 'Hero Content', 'linknest' ),
			'panel' => 'linknest_hero_panel',
		)
	);

	$wp_customize->add_setting( 'linknest_hero_enable', array( 'default' => true, 'sanitize_callback' => 'linknest_sanitize_checkbox' ) );
	$wp_customize->add_control( 'linknest_hero_enable', array( 'label' => __( 'Enable Hero', 'linknest' ), 'section' => 'linknest_hero_section', 'type' => 'checkbox' ) );

	$wp_customize->add_setting( 'linknest_hero_title', array( 'default' => __( 'Everything you are. In one, simple link in bio.', 'linknest' ), 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'linknest_hero_title', array( 'label' => __( 'Title', 'linknest' ), 'section' => 'linknest_hero_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'linknest_hero_subtitle', array( 'default' => __( 'Drive your audience to the right destination with a fast, conversion-focused SaaS website.', 'linknest' ), 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'linknest_hero_subtitle', array( 'label' => __( 'Subtitle', 'linknest' ), 'section' => 'linknest_hero_section', 'type' => 'textarea' ) );

	$wp_customize->add_setting( 'linknest_hero_button_text', array( 'default' => __( 'Get Started Free', 'linknest' ), 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'linknest_hero_button_text', array( 'label' => __( 'Button Text', 'linknest' ), 'section' => 'linknest_hero_section' ) );

	$wp_customize->add_setting( 'linknest_hero_button_link', array( 'default' => '#pricing', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'linknest_hero_button_link', array( 'label' => __( 'Button Link', 'linknest' ), 'section' => 'linknest_hero_section' ) );

	// Section controls.
	$sections = array(
		'features'     => __( 'Features Section', 'linknest' ),
		'testimonials' => __( 'Testimonials Section', 'linknest' ),
		'pricing'      => __( 'Pricing Section', 'linknest' ),
	);

	$priority = 30;
	foreach ( $sections as $slug => $title ) {
		$panel_id = 'linknest_' . $slug . '_panel';
		$section_id = 'linknest_' . $slug . '_section';

		$wp_customize->add_panel(
			$panel_id,
			array(
				'title'    => $title,
				'priority' => $priority,
			)
		);

		$wp_customize->add_section(
			$section_id,
			array(
				'title' => __( 'Settings', 'linknest' ),
				'panel' => $panel_id,
			)
		);

		$wp_customize->add_setting( 'linknest_' . $slug . '_enable', array( 'default' => true, 'sanitize_callback' => 'linknest_sanitize_checkbox' ) );
		$wp_customize->add_control( 'linknest_' . $slug . '_enable', array( 'label' => __( 'Enable Section', 'linknest' ), 'section' => $section_id, 'type' => 'checkbox' ) );

		$wp_customize->add_setting(
			'linknest_' . $slug . '_title',
			array(
				'default'           => ucfirst( $slug ),
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control( 'linknest_' . $slug . '_title', array( 'label' => __( 'Section Title', 'linknest' ), 'section' => $section_id ) );

		$priority += 10;
	}

	$wp_customize->add_setting( 'linknest_highlight_plan', array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'linknest_highlight_plan', array( 'label' => __( 'Highlight Plan (title)', 'linknest' ), 'section' => 'linknest_pricing_section' ) );
}
add_action( 'customize_register', 'linknest_customize_register' );
