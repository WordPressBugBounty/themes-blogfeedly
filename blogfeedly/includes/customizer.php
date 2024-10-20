<?php
/**
 * Blogfeedly Theme Customizer.
 */

/**
 * Implement Theme Customizer additions and adjustments.
 */
function stsblogfeedly_customize_register( $wp_customize ) {
	// Remove the core display site title and tagline control.
	$wp_customize->remove_control( 'display_header_text' );

	/**
	 * Add sections.
	 */
	$blogfeedly_sections = stsblogfeedly_theme_settings_sections();
	foreach ( $blogfeedly_sections as $section ) {
		$wp_customize->add_section( $section['name'], array( 
			'title'    => $section['title'],
			'priority' => $section['priority']
			) );
	}


	/* New Section */
	$wp_customize->add_section( 'postpage', array(
		'title'      => __('Posts & Pages','blogfeedly'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
		) );




	/* New Section */
	$wp_customize->add_section( 'sidebar', array(
		'title'      => __('Sidebar Settings','blogfeedly'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
		) );
	$wp_customize->add_setting( 'hide_sidebar', array(
		'default' => 0,
		'sanitize_callback' => 'sanitize_text_field',
		) );

	$wp_customize->add_control( 'hide_sidebar', array(
		'label'    => __( 'Hide Sidebar', 'blogfeedly' ),
		'section'  => 'sidebar',
		'priority' => 1,
		'settings' => 'hide_sidebar',
		'type'     => 'checkbox',
		) );



	/* New Section */
	$wp_customize->add_section( 'footer', array(
		'title'      => __('Footer Settings','blogfeedly'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
		) );
	$wp_customize->add_setting( 'footer_bg', array(
		'default'           => '#171717',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bg', array(
		'label'       => __( 'Background Color', 'blogfeedly' ),
		'section'     => 'footer',
		'priority'   => 1,
		'settings'    => 'footer_bg',
		) ) );
	$wp_customize->add_setting( 'footer_header', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_header', array(
		'label'       => __( 'Headline Color', 'blogfeedly' ),
		'section'     => 'footer',
		'priority'   => 1,
		'settings'    => 'footer_header',
		) ) );
	$wp_customize->add_setting( 'footer_text', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_text', array(
		'label'       => __( 'Text Color', 'blogfeedly' ),
		'section'     => 'footer',
		'priority'   => 1,
		'settings'    => 'footer_text',
		) ) );
	$wp_customize->add_setting( 'footer_link', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_link', array(
		'label'       => __( 'Link Color', 'blogfeedly' ),
		'section'     => 'footer',
		'priority'   => 1,
		'settings'    => 'footer_link',
		) ) );
	$wp_customize->add_setting( 'footer_border', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_border', array(
		'label'       => __( 'Border Color', 'blogfeedly' ),
		'section'     => 'footer',
		'priority'   => 1,
		'settings'    => 'footer_border',
		) ) );
	$wp_customize->add_setting( 'footer_button_bg', array(
		'default'           => '#fab526',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_button_bg', array(
		'label'       => __( 'Button Background Color', 'blogfeedly' ),
		'section'     => 'footer',
		'priority'   => 1,
		'settings'    => 'footer_button_bg',
		) ) );
	$wp_customize->add_setting( 'footer_button_text', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_button_text', array(
		'label'       => __( 'Button Text Color', 'blogfeedly' ),
		'section'     => 'footer',
		'priority'   => 1,
		'settings'    => 'footer_button_text',
		) ) );

	/**
	 * Add settings and controls.
	 */
	$blogfeedly_settings = stsblogfeedly_theme_settings_fields();
	foreach ( $blogfeedly_settings as $option ) {
		$wp_customize->add_setting( 'stsblogfeedly_options[' . $option['name'] . ']', array(
			'default'           => $option['default'],
			'type'              => 'option',
			'sanitize_callback' => $option['sanitize']
			) );

		if ( $option['type'] == 'color' ) {
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'stsblogfeedly_' . $option['name'], array(
				'label'    => $option['title'],
				'section'  => $option['section'],
				'settings' => 'stsblogfeedly_options[' . $option['name'] . ']',
				'priority' => $option['priority']
				) ) );
		} else {
			$wp_customize->add_control( 'stsblogfeedly_' . $option['name'], array(
				'label'    => $option['title'],
				'section'  => $option['section'],
				'settings' => 'stsblogfeedly_options[' . $option['name'] . ']',
				'type'     => $option['type'],
				'priority' => $option['priority']
				) );
		}
	}
}

add_action( 'customize_register', 'stsblogfeedly_customize_register' );

/**
 * Checkbox sanitization callback.
 */
function stsblogfeedly_sanitize_checkbox( $input ) {
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

/**
 * HTML sanitization callback.
 */
function stsblogfeedly_sanitize_html( $input ) {
	return wp_filter_post_kses( $input );
}

/**
 * No HTML sanitization callback.
 */
function stsblogfeedly_sanitize_nohtml( $input ) {
	return wp_filter_nohtml_kses( $input );
}

/**
 * Nonnegative integer sanitization callback.
 */
function stsblogfeedly_sanitize_number( $input ) {
	$input = absint( $input );
	if ( ! $input )
		$input = '';
	return $input;
}



/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function blogfeedly_customize_preview_js() {
	wp_enqueue_script( 'blogfeedly-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'blogfeedly_customize_preview_js' );


if(! function_exists('blogfeedly_customizer_styling' ) ):
	function blogfeedly_customizer_styling(){
		?>

		<style type="text/css">
		.site-title a,.site-description { color: <?php echo esc_attr(get_theme_mod( 'header_title_tagline_color')); ?>; }
		.site-navigation{ border-color: <?php echo esc_attr(get_theme_mod( 'header_border_color')); ?>; }
		#menu-toggle { background-color: <?php echo esc_attr(get_theme_mod( 'header_border_color')); ?>; }
		.site-navigation a,#menu-toggle{ color: <?php echo esc_attr(get_theme_mod( 'header_link_color')); ?>; }
		.archive-list-title, .page-title, .not-found .page-title, .social-title, .comments-title, .tag-links, .parent-post-link, .comment-author .fn, .comment-author .url, .comment-reply-title, .entry-content h1, .entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5, .entry-content h6, .entry-content th, .entry-title, .entry-title a, .entry-title a:hover{ color: <?php echo esc_attr(get_theme_mod( 'postpage_header')); ?>; }
		.entry-meta, .entry-meta *, .entry-meta, .entry-meta *:hover{ color: <?php echo esc_attr(get_theme_mod( 'postpage_meta')); ?>; }
		.entry-summary, .comments-area, .comments-area p, .entry-content, .entry-content address, .entry-content dt, .page-content, .page-content p, .entry-content p, .entry-content span, .entry-content div, .entry-content li, .entry-content ul, .entry-content ol, .entry-content td, .entry-content dd, .entry-content blockquote { color: <?php echo esc_attr(get_theme_mod( 'postpage_text')); ?>; }
		.page-content .search-field, .archive-list-title, .comments-area *, .entry-content *{ border-color: <?php echo esc_attr(get_theme_mod( 'postpage_border')); ?>; }
		.archive-list a, .comments-area a, .page .entry-content a, .single .entry-content a, .error404 .entry-content a { color: <?php echo esc_attr(get_theme_mod( 'postpage_link')); ?>; }
		.tag-links a, button:hover, button:focus, button:active, input[type="submit"]:hover, input[type="submit"]:focus, input[type="submit"]:active, input[type="button"]:hover, input[type="button"]:focus, input[type="button"]:active, input[type="reset"]:hover, input[type="reset"]:focus, input[type="reset"]:active, button, input[type="submit"], input[type="button"], input[type="reset"], a.more-link{ background-color: <?php echo esc_attr(get_theme_mod( 'postpage_button_bg')); ?>; }
		button:hover, button:focus, button:active, input[type="submit"]:hover, input[type="submit"]:focus, input[type="submit"]:active, input[type="button"]:hover, input[type="button"]:focus, input[type="button"]:active, input[type="reset"]:hover, input[type="reset"]:focus, input[type="reset"]:active, button, input[type="submit"], input[type="button"], input[type="reset"], a.more-link{ border-color: <?php echo esc_attr(get_theme_mod( 'postpage_button_bg')); ?>; }
		.tag-links a, button:hover, button:focus, button:active, input[type="submit"]:hover, input[type="submit"]:focus, input[type="submit"]:active, input[type="button"]:hover, input[type="button"]:focus, input[type="button"]:active, input[type="reset"]:hover, input[type="reset"]:focus, input[type="reset"]:active, button, input[type="submit"], input[type="button"], input[type="reset"], a.more-link{ color: <?php echo esc_attr(get_theme_mod( 'postpage_button_text')); ?>; }
		.nav-previous a, .nav-next a, .nav-previous a:hover, .nav-next a:hover,.pagination .page-numbers, .pagination .page-numbers:hover{ background-color: <?php echo esc_attr(get_theme_mod( 'postpage_pagination_button_bg')); ?>; }
		.nav-previous a, .nav-next a, .nav-previous a:hover, .nav-next a:hover,.pagination .page-numbers,.pagination .page-numbers:hover{ color: <?php echo esc_attr(get_theme_mod( 'postpage_pagination_button_text')); ?>; }
		.featured-sidebar .widget-title{ color: <?php echo esc_attr(get_theme_mod( 'sidebar_header')); ?>; }
		.featured-sidebar *{ color: <?php echo esc_attr(get_theme_mod( 'sidebar_text')); ?>; }
		.featured-sidebar a{ color: <?php echo esc_attr(get_theme_mod( 'sidebar_link')); ?>; }
		.featured-sidebar .tagcloud a, .featured-sidebar .widget-title, .featured-sidebar *{ border-color: <?php echo esc_attr(get_theme_mod( 'sidebar_border')); ?>; }
		.featured-sidebar .widget input[type="submit"]{ background-color: <?php echo esc_attr(get_theme_mod( 'sidebar_button_bg')); ?>; }
		.featured-sidebar .widget input[type="submit"]{ color: <?php echo esc_attr(get_theme_mod( 'sidebar_button_text')); ?>; }
		<?php if ( get_theme_mod( 'hide_sidebar' ) == '1' ) : ?>
		aside#secondary.featured-sidebar {
			display:none !important;
		}
		.main-has-sidebar {
			max-width:100%;
		}
		.site-content .inner.main-with-sidebar {
			max-width: 780px;
			display:block;
		}
		<?php endif; ?>
		.site-footer{ background-color: <?php echo esc_attr(get_theme_mod( 'footer_bg')); ?>; }
		.site-footer .widget-title{ color: <?php echo esc_attr(get_theme_mod( 'footer_header')); ?>; }
		.site-footer li, .site-footer ol, .site-footer ul, .site-footer p, .site-footer span, .site-footer div, .site-footer { color: <?php echo esc_attr(get_theme_mod( 'footer_text')); ?>; }
		.icon-chevron-up:before, .site-footer a{ color: <?php echo esc_attr(get_theme_mod( 'footer_link')); ?>; }
		.site-footer .tagcloud a, .site-footer *{ border-color: <?php echo esc_attr(get_theme_mod( 'footer_border')); ?>; }
		.site-footer .widget input[type="submit"] { background-color: <?php echo esc_attr(get_theme_mod( 'footer_button_bg')); ?>; }
		.site-footer .widget input[type="submit"] { border-color: <?php echo esc_attr(get_theme_mod( 'footer_button_bg')); ?>; }
		.site-footer .widget input[type="submit"] { color: <?php echo esc_attr(get_theme_mod( 'footer_button_text')); ?>; }
		body{ background: <?php echo esc_attr(get_theme_mod( 'body_bg')); ?>; }
		.site-navigation, .site-header, .site-navigation .menu-wrap{ background: <?php echo esc_attr(get_theme_mod( 'header_bg_color')); ?>; }


		</style>
		<?php }
		add_action( 'wp_head', 'blogfeedly_customizer_styling' );
		endif;
