<?php

/**
 * Register new Customizer elements.
 *
 * @param WP_Customize_Manager $wp_customize WP_Customize_Manager instance.
 */
add_action( 'customize_register', 'mai_register_customizer_settings', 20 );
function mai_register_customizer_settings( $wp_customize ) {

	/* ************ *
	 * Mai Settings *
	 * ************ */

	$section        = 'mai_settings';
	$settings_field = 'genesis-settings';

	// Section.
	$wp_customize->add_section(
		$section,
		array(
			'title'    => __( 'Mai Settings', 'mai-pro-engine' ),
			'priority' => '35',
		)
	);

	$wp_customize->add_setting(
		_mai_customizer_get_field_name( $settings_field, 'header_customizer_heading' ),
		array(
			'default' => '',
			'type'    => 'option',
		)
	);
	$wp_customize->add_control(
		new Mai_Customize_Control_Content( $wp_customize,
			$prefix . 'header_customizer_heading',
			array(
				'label'    => __( 'Header Settings', 'mai-pro-engine' ),
				'section'  => $section,
				'settings' => _mai_customizer_get_field_name( $settings_field, 'header_customizer_heading' ),
			)
		)
	);

	// Sticky Header.
	$wp_customize->add_setting(
		_mai_customizer_get_field_name( $settings_field, 'enable_sticky_header' ),
		array(
			'default' => 0,
			'type'    => 'option',
		)
	);
	$wp_customize->add_control(
		'enable_sticky_header',
		array(
			'label'    => __( 'Enable sticky header', 'mai-pro-engine' ),
			'section'  => $section,
			'settings' => _mai_customizer_get_field_name( $settings_field, 'enable_sticky_header' ),
			'type'     => 'checkbox',
		)
	);

	// Shrink Header.
	$wp_customize->add_setting(
		_mai_customizer_get_field_name( $settings_field, 'enable_shrink_header' ),
		array(
			'default' => 0,
			'type'    => 'option',
		)
	);
	$wp_customize->add_control(
		'enable_shrink_header',
		array(
			'label'    => __( 'Enable shrink header', 'mai-pro-engine' ),
			'section'  => $section,
			'settings' => _mai_customizer_get_field_name( $settings_field, 'enable_shrink_header' ),
			'type'     => 'checkbox',
		)
	);

	// Footer widgets.
	$wp_customize->add_setting(
		_mai_customizer_get_field_name( $settings_field, 'footer_widget_count' ),
		array(
			'default'           => '2',
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_key',
		)
	);
	$wp_customize->add_control(
		'footer_widget_count',
		array(
			'label'       => __( 'Footer widget areas', 'mai-pro-engine' ),
			'description' => __( 'Save and reload customizer to view changes.', 'mai-pro-engine' ),
			'section'     => $section,
			'settings'    => _mai_customizer_get_field_name( $settings_field, 'footer_widget_count' ),
			'priority'    => 10,
			'type'        => 'select',
			'choices'     => array(
				'0' => __( 'None', 'mai-pro-engine' ),
				'1' => __( '1', 'mai-pro-engine' ),
				'2' => __( '2', 'mai-pro-engine' ),
				'3' => __( '3', 'mai-pro-engine' ),
				'4' => __( '4', 'mai-pro-engine' ),
				'6' => __( '6', 'mai-pro-engine' ),
			),
		)
	);

	// Mobile menu.
	$wp_customize->add_setting(
		_mai_customizer_get_field_name( $settings_field, 'mobile_menu_style' ),
		array(
			'default'           => 'standard',
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_key',
		)
	);
	$wp_customize->add_control(
		'mobile_menu_style',
		array(
			'label'    => __( 'Mobile menu style', 'mai-pro-engine' ),
			'section'  => $section,
			'settings' => _mai_customizer_get_field_name( $settings_field, 'mobile_menu_style' ),
			'priority' => 10,
			'type'     => 'select',
			'choices'  => array(
				'standard' => __( 'Standard Menu', 'mai-pro-engine' ),
				'side'     => __( 'Side Menu', 'mai-pro-engine' ),
			),
		)
	);

}
