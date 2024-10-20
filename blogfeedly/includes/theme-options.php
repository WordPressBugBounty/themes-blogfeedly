<?php

/**
 * Theme settings sections.
 */
function stsblogfeedly_theme_settings_sections() {
	return array(
		'general' => array(
			'name'   => 'stsblogfeedly_general_settings',
			'title'  => __( 'General Settings', 'blogfeedly' ),
			'priority' => 140
		),
		'social' => array(
			'name'  => 'stsblogfeedly_social_settings',
			'title' => __( 'Social Links Settings', 'blogfeedly' ),
			'priority' => 150
		)
	);
}

/**
 * Theme settings fields.
 */
function stsblogfeedly_theme_settings_fields() {
	return array(
		'logo_retina' => array(
			'name'     => 'logo_retina',
			'title'    => __( 'Check if you use double sized logo.', 'blogfeedly' ),
			'type'     => 'checkbox',
			'sanitize' => 'stsblogfeedly_sanitize_checkbox',
			'default'  => false,
			'section'  => 'title_tagline',
			'priority' => 9
		),
		'show_title' => array(
			'name'     => 'show_title',
			'title'    => __( 'Show Title', 'blogfeedly' ),
			'type'     => 'checkbox',
			'sanitize' => 'stsblogfeedly_sanitize_checkbox',
			'default'  => true,
			'section'  => 'title_tagline',
			'priority' => 10
		),
		'show_tagline' => array(
			'name'     => 'show_tagline',
			'title'    => __( 'Show Tagline', 'blogfeedly' ),
			'type'     => 'checkbox',
			'sanitize' => 'stsblogfeedly_sanitize_checkbox',
			'default'  => true,
			'section'  => 'title_tagline',
			'priority' => 10
		),
		'animated_nav' => array(
			'name'     => 'animated_nav',
			'title'    => __( 'Enable Animated Navigation Menu.', 'blogfeedly' ),
			'type'     => 'checkbox',
			'sanitize' => 'stsblogfeedly_sanitize_checkbox',
			'default'  => true,
			'section'  => 'stsblogfeedly_general_setting',
			'priority' => 1
		),
	);
}

/**
 * Return default theme options.
 */
function stsblogfeedly_default_theme_options() {
	$fields = stsblogfeedly_theme_settings_fields();
	$defaults = array();
	foreach( $fields as $field ){
		$defaults[$field['name']] = $field['default'];
	}
	return $defaults;
}

/**
 * Return theme options array.
 */
function stsblogfeedly_theme_options() {
	$defaults = stsblogfeedly_default_theme_options();
	$options = wp_parse_args( get_option( 'stsblogfeedly_options', array() ), $defaults );
	return $options;
}

/**
 * Helper function to return the theme option value.
 */
function stsblogfeedly_get_option( $name ) {
	$options = stsblogfeedly_theme_options();
	if ( array_key_exists( $name, $options ) )
		return $options[$name];
	return false;
}
