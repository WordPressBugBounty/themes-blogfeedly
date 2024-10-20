<?php

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 780;

if ( ! function_exists( 'stsblogfeedly_setup' ) ) :
/**
 * Run stsblogfeedly_setup() when the after_setup_theme hook is run.
 */
function stsblogfeedly_setup() {

	// Make theme available for translation.
	load_theme_textdomain( 'blogfeedly', get_template_directory() . '/languages' );

	// Style the visual editor to resemble the theme style.
	add_editor_style( array( 'css/editor-style.css', stsblogfeedly_font_url() ) );

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Register a menu location.
	register_nav_menu( 'primary', __( 'Navigation Menu', 'blogfeedly' ) );

	// Add support for featured images.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1560, 9999 );

	// Enable support for custom logo.
	add_theme_support( 'custom-logo', array(
		'height'      => '240',
		'width'       => '400',
		'flex-width' => true,
		'flex-height' => true,
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption'
	) );

}
endif;
add_action( 'after_setup_theme', 'stsblogfeedly_setup' );

/**
 * Register four widget areas in the footer.
 */
function stsblogfeedly_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Footer Widget Area 1', 'blogfeedly' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears in the footer section of the site', 'blogfeedly' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	) );
	register_sidebar( array(
		'name' => __( 'Footer Widget Area 2', 'blogfeedly' ),
		'id' => 'sidebar-2',
		'description' => __( 'Appears in the footer section of the site', 'blogfeedly' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	) );
	register_sidebar( array(
		'name' => __( 'Footer Widget Area 3', 'blogfeedly' ),
		'id' => 'sidebar-3',
		'description' => __( 'Appears in the footer section of the site', 'blogfeedly' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	) );
	register_sidebar( array(
		'name' => __( 'Footer Widget Area 4', 'blogfeedly' ),
		'id' => 'sidebar-4',
		'description' => __( 'Appears in the footer section of the site', 'blogfeedly' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	) );

	register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'blogfeedly' ),
		'id' => 'right-sidebar-1',
		'description' => __( 'Appears in the sidebar section of the site', 'blogfeedly' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	) ); 
	
}
add_action( 'widgets_init', 'stsblogfeedly_widgets_init' );

/**
 * Register Karla Google font.
 */
function stsblogfeedly_font_url() {
	$font_url = add_query_arg( 'family', urlencode( 'Karla:400,400i,700,700i' ), "https://fonts.googleapis.com/css" );
	return $font_url;
}

/**
 * Handle JavaScript detection.
 */
function stsblogfeedly_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'stsblogfeedly_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 */
function stsblogfeedly_scripts_styles() {

	// Add Karla font, used in the main stylesheet.
	wp_enqueue_style( 'stsblogfeedly-fonts', stsblogfeedly_font_url(), array(), null );

	// Load the main stylesheet.
	wp_enqueue_style( 'stsblogfeedly-style', get_stylesheet_uri() );

	// Load the IE specific stylesheet.
	wp_enqueue_style( 'stsblogfeedly-ie', get_template_directory_uri() . '/css/ie.css', array( 'stsblogfeedly-style' ), '1.6.0' );
	wp_style_add_data( 'stsblogfeedly-ie', 'conditional', 'lt IE 9' );

	// Load the html5 shiv.
	wp_enqueue_script( 'stsblogfeedly-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'stsblogfeedly-html5', 'conditional', 'lt IE 9' );

	// Add JS to pages with the comment form to support sites with threaded comments (when in use).
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Add custom scripts.
	wp_enqueue_script( 'stsblogfeedly-script', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '1.6.0', true );
}
add_action( 'wp_enqueue_scripts', 'stsblogfeedly_scripts_styles' );

/**
 * Change wp_nav_menu() fallback, wp_page_menu(), container class and depth.
 */
function stsblogfeedly_page_menu_args( $args ) {
	$args['depth'] = 1;
	$args['menu_class'] = 'menu-wrap';
	return $args;
}
add_filter( 'wp_page_menu_args', 'stsblogfeedly_page_menu_args' );

/**
 * Add custom classes to the array of body classes.
 */
function stsblogfeedly_body_class( $classes ) {
	// Check if it is a single author blog.
	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	// Check if animated navigation option is checked.
	if ( stsblogfeedly_get_option( 'animated_nav' ) )
		$classes[] = 'animated-navigation';

	// Add a class of no-avatars if avatars are disabled.
	if ( ! get_option( 'show_avatars' ) ) {
		$classes[] = 'no-avatars';
	}

	// Add a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'stsblogfeedly_body_class' );

/**
 * Customize the archive title.
 */
function stsblogfeedly_archive_title( $title ) {
	if ( is_category() ) {
		$title = sprintf( __( 'All posts in %s', 'blogfeedly' ), '<span class="highlight">' . single_cat_title( '', false ) . '</span>' );
	} elseif ( is_tag() ) {
		$title = sprintf( __( 'All posts tagged %s', 'blogfeedly' ), '<span class="highlight">' . single_tag_title( '', false ) . '</span>' );
	} elseif ( is_author() ) {
		$title = sprintf( __( 'All posts by %s', 'blogfeedly' ), '<span class="vcard highlight">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( __( 'All posts in %s', 'blogfeedly' ), '<span class="highlight">' . get_the_date( _x( 'Y', 'yearly archives date format', 'blogfeedly' ) ) . '</span>' );
	} elseif ( is_month() ) {
		$title = sprintf( __( 'All posts in %s', 'blogfeedly' ), '<span class="highlight">' . get_the_date( _x( 'F Y', 'monthly archives date format', 'blogfeedly' ) ) . '</span>' );
	} elseif ( is_day() ) {
		$title = sprintf( __( 'All posts dated %s', 'blogfeedly' ), '<span class="highlight">' . get_the_date( _x( 'F j, Y', 'daily archives date format', 'blogfeedly' ) ) . '</span>' );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'stsblogfeedly_archive_title' );

/**
 * Customize tag cloud widget.
 */
function stsblogfeedly_custom_tag_cloud_widget( $args ) {
	$args['number'] = 0;
	$args['largest'] = 14;
	$args['smallest'] = 14;
	$args['unit'] = 'px';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'stsblogfeedly_custom_tag_cloud_widget' );

if ( ! function_exists( 'stsblogfeedly_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and a 'Read More' link.
 */
function stsblogfeedly_excerpt_more( $more ) {
	$link = sprintf( '<div class="readmore-wrapper"><a href="%1$s" class="more-link">%2$s</a></div>',
		esc_url( get_permalink( get_the_ID() ) ),
		__( 'Read ', 'blogfeedly' )
	); 
	return '&hellip; ' . $link;
}
add_filter( 'excerpt_more', 'stsblogfeedly_excerpt_more' );
endif;

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Theme options.
 */
require get_template_directory() . '/includes/theme-options.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Gutenberg additions.
 */
require get_template_directory() . '/includes/gutenberg.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/includes/jetpack.php';




/**
 * Copyright and License for Upsell button by Justin Tadlock - 2016 © Justin Tadlock. customizer button https://github.com/justintadlock/trt-customizer-pro
 */
require_once( trailingslashit( get_template_directory() ) . 'justinadlock-customizer-button/class-customize.php' );









// Theme page start

add_action('admin_menu', 'blogfeedly_themepage');
function blogfeedly_themepage()
{
	$option = get_option('blogfeedly_themepage_seen');
	$awaiting = !$option ? ' <span class="awaiting-mod">1</span>' : '';
	$theme_info = add_theme_page(__('Theme Settings', 'blogfeedly'), __('Theme Settings', 'blogfeedly').$awaiting, 'manage_options', 'blogfeedly-info.php', 'blogfeedly_info_page', 1);
}
function blogfeedly_info_page()
{
	$user = wp_get_current_user();
	$theme = wp_get_theme();
	$parent_name = is_child_theme() ? wp_get_theme($theme->Template) : '';
	$theme_name = is_child_theme() ? $theme." ".__("and", "blogfeedly")." ".$parent_name : $theme;
	$demo_text = is_child_theme() ? sprintf(__("Need inspiration? Take a moment to view our theme demo for the %s parent theme %s!", "blogfeedly"), $theme, $parent_name) : __("Need inspiration? Take a moment to view our theme demo!", "blogfeedly");
	$premium_text = is_child_theme() ? sprintf(__("Unlock all features by upgrading to the premium edition of %s and its parent theme %s.", "blogfeedly"), $theme, $parent_name) : sprintf(__("Unlock all features by upgrading to the premium edition of %s.", "blogfeedly"),$theme);
	$option_name = 'blogfeedly_themepage_seen';
	$option = get_option($option_name, null);
	if (is_null($option)) {
		add_option($option_name, true);
	} elseif (!$option) {
		update_option($option_name, true);
	} ?>
	<div class="wrap">

		<div class="spt-theme-settings-wrapper">
			<div class="spt-theme-settings-wrapper-main-content">
				<div class="spt-theme-settings-tabs">

					<div class="spt-theme-settings-tab">
						<input type="radio" id="tab-1" name="tab-group-1">



						<label class="spt-theme-settings-label" for="tab-1"><?php esc_html_e("Get started with", "blogfeedly"); ?> <?php echo esc_html($theme_name); ?></label>

						<div class="spt-theme-settings-content">

							<div class="spt-theme-settings-content-getting-started-wrapper">
								<div class="spt-theme-settings-content-item">
									<div class="spt-theme-settings-content-item-header">
										<?php esc_html_e("Add Menus", "blogfeedly"); ?>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<a href="<?php echo esc_url(admin_url('nav-menus.php'))  ?>"><?php esc_html_e("Go to Menus", "blogfeedly"); ?></a>
									</div>
								</div>

								<div class="spt-theme-settings-content-item">
									<div class="spt-theme-settings-content-item-header">
										<?php esc_html_e("Add Widgets", "blogfeedly"); ?>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<a href="<?php echo esc_url(admin_url('widgets.php'))  ?>"><?php esc_html_e("Go to Widgets", "blogfeedly"); ?></a>
									</div>
								</div>

								<div class="spt-theme-settings-content-item">
									<div class="spt-theme-settings-content-item-header">
										<?php esc_html_e("Change Header Image", "blogfeedly"); ?>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<a href="<?php echo esc_url(admin_url('customize.php')) ?>"><?php esc_html_e("Go to Customizer", "blogfeedly"); ?></a>
									</div>
								</div>

								<div class="spt-theme-settings-content-item">
									<div class="spt-theme-settings-content-item-header">
										<?php esc_html_e("Social Media Icons", "blogfeedly"); ?>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<a href="<?php echo esc_url(admin_url('customize.php')) ?>"><?php esc_html_e("Go to Customizer", "blogfeedly"); ?></a>
									</div>
								</div>

								<div class="spt-theme-settings-content-item">
									<div class="spt-theme-settings-content-item-header">
										<?php esc_html_e("Upload Logo", "blogfeedly"); ?>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<a href="<?php echo esc_url(admin_url('customize.php')) ?>"><?php esc_html_e("Go to Customizer", "blogfeedly"); ?></a>
									</div>
								</div>

								<div class="spt-theme-settings-content-item">
									<div class="spt-theme-settings-content-item-header">
										<?php esc_html_e("Change Background Color / Image", "blogfeedly"); ?>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<a href="<?php echo esc_url(admin_url('customize.php')) ?>"><?php esc_html_e("Go to Customizer", "blogfeedly"); ?></a>
									</div>
								</div>


								<a target="_blank" href="https://superbthemes.com/blogfeedly/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Customize All Fonts", "blogfeedly"); ?></span> <span><?php esc_html_e("Premium", "blogfeedly"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "blogfeedly"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/blogfeedly/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Customize All Colors", "blogfeedly"); ?></span> <span><?php esc_html_e("Premium", "blogfeedly"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "blogfeedly"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/blogfeedly/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Import Demo Content", "blogfeedly"); ?></span> <span><?php esc_html_e("Premium", "blogfeedly"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Demo Import", "blogfeedly"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/blogfeedly/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Contact Premium Support", "blogfeedly"); ?></span> <span><?php esc_html_e("Premium", "blogfeedly"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "blogfeedly"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/blogfeedly/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Unlock Full SEO Optimization", "blogfeedly"); ?></span> <span><?php esc_html_e("Premium", "blogfeedly"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "blogfeedly"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/blogfeedly/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Retina Logo", "blogfeedly"); ?></span> <span><?php esc_html_e("Premium", "blogfeedly"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "blogfeedly"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/blogfeedly/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("HD Logo", "blogfeedly"); ?></span> <span><?php esc_html_e("Premium", "blogfeedly"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "blogfeedly"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/blogfeedly/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Unlock Elementor Compatibility", "blogfeedly"); ?></span> <span><?php esc_html_e("Premium", "blogfeedly"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Install Elementor", "blogfeedly"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/blogfeedly/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Access All Child Themes", "blogfeedly"); ?></span> <span><?php esc_html_e("Premium", "blogfeedly"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("View Child Themes", "blogfeedly"); ?></span>
									</div>
								</a>


								<a target="_blank" href="https://superbthemes.com/blogfeedly/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Add Recent Posts Widget", "blogfeedly"); ?></span> <span><?php esc_html_e("Premium", "blogfeedly"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Widgets", "blogfeedly"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/blogfeedly/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Custom Copyright Text", "blogfeedly"); ?></span> <span><?php esc_html_e("Premium", "blogfeedly"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "blogfeedly"); ?></span>
									</div>
								</a>


								<a target="_blank" href="https://superbthemes.com/blogfeedly/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Remove 'Tag' from tag page title", "blogfeedly"); ?></span> <span><?php esc_html_e("Premium", "blogfeedly"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "blogfeedly"); ?></span>
									</div>
								</a>


								<a target="_blank" href="https://superbthemes.com/blogfeedly/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Remove 'Author' from author page title", "blogfeedly"); ?></span> <span><?php esc_html_e("Premium", "blogfeedly"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "blogfeedly"); ?></span>
									</div>
								</a>


								<a target="_blank" href="https://superbthemes.com/blogfeedly/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Remove 'Category' from author page title", "blogfeedly"); ?></span> <span><?php esc_html_e("Premium", "blogfeedly"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "blogfeedly"); ?></span>
									</div>
								</a>




							</div>
						</div> 
					</div>


				</div>      
			</div>

			<div class="spt-theme-settings-wrapper-sidebar">

				<div class="spt-theme-settings-wrapper-sidebar-item">
					<div class="spt-theme-settings-wrapper-sidebar-item-header"><?php esc_html_e("Additional Resources", "blogfeedly"); ?></div>
					<div class="spt-theme-settings-wrapper-sidebar-item-content">
						<ul>
							<li>
								<a target="_blank" href="https://wordpress.org/support/forums/"><span class="dashicons dashicons-wordpress"></span><?php esc_html_e("WordPress.org Support Forum", "blogfeedly"); ?></a>
							</li>
							<li>
								<a target="_blank" href="https://www.facebook.com/superbthemescom/"><span class="dashicons dashicons-facebook-alt"></span><?php esc_html_e("Find us on Facebook", "blogfeedly"); ?></a>
							</li>
							<li>
								<a target="_blank" href="https://twitter.com/superbthemescom"><span class="dashicons dashicons-twitter"></span><?php esc_html_e("Find us on Twitter", "blogfeedly"); ?></a>
							</li>
							<li>
								<a target="_blank" href="https://www.instagram.com/superbthemes/"><span class="dashicons dashicons-instagram"></span><?php esc_html_e("Find us on Instagram", "blogfeedly"); ?></a>
							</li>

						</ul>
					</div>
				</div>


				<div class="spt-theme-settings-wrapper-sidebar-item">
					<div class="spt-theme-settings-wrapper-sidebar-item-header"><?php esc_html_e("View Demo", "blogfeedly"); ?></div>
					<div class="spt-theme-settings-wrapper-sidebar-item-content">
						<p><?php echo esc_html($demo_text); ?></p>
						<a href="https://superbthemes.com/demo/blogfeedly/" target="_blank" class="button button-primary"><?php esc_html_e("View Demo", "blogfeedly"); ?></a>
					</div>
				</div>

				<div class="spt-theme-settings-wrapper-sidebar-item">
					<div class="spt-theme-settings-wrapper-sidebar-item-header"><?php esc_html_e("Upgrade to Premium", "blogfeedly"); ?></div>
					<div class="spt-theme-settings-wrapper-sidebar-item-content">
						<p><?php echo esc_html($premium_text); ?></p>
						<a href="https://superbthemes.com/blogfeedly/" target="_blank" class="button button-primary"><?php esc_html_e("View Premium Version", "blogfeedly"); ?></a>
					</div>
				</div>

				<div class="spt-theme-settings-wrapper-sidebar-item">
					<div class="spt-theme-settings-wrapper-sidebar-item-header"><?php esc_html_e("Helpdesk", "blogfeedly"); ?></div>
					<div class="spt-theme-settings-wrapper-sidebar-item-content">
						<p><?php esc_html_e("If you have issues with", "blogfeedly"); ?> <?php echo esc_html($theme); ?> <?php esc_html_e("then send us an email through our website!", "blogfeedly"); ?></p>
						<a href="https://superbthemes.com/customer-support/" target="_blank" class="button"><?php esc_html_e("Contact Support", "blogfeedly"); ?></a>
					</div>
				</div>

				<div class="spt-theme-settings-wrapper-sidebar-item">
					<div class="spt-theme-settings-wrapper-sidebar-item-header"><?php esc_html_e("Review the Theme", "blogfeedly"); ?></div>
					<div class="spt-theme-settings-wrapper-sidebar-item-content">
						<p><?php esc_html_e("Do you enjoy using", "blogfeedly"); ?> <?php echo esc_html($theme); ?><?php esc_html_e("? Support us by reviewing us on WordPress.org!", "blogfeedly"); ?></p>
						<a href="https://wordpress.org/support/theme/<?php echo esc_attr(get_stylesheet()); ?>/reviews/#new-post" target="_blank" class="button"><?php esc_html_e("Leave a Review", "blogfeedly"); ?></a>
					</div>
				</div>



			</div>

		</div>
	</div>


	<?php
}

function blogfeedly_comparepage_css($hook) {
	if ('appearance_page_blogfeedly-info' != $hook) {
		return;
	}
	wp_enqueue_style('blogfeedly-custom-style', get_template_directory_uri() . '/css/compare.css');
}
add_action('admin_enqueue_scripts', 'blogfeedly_comparepage_css');

// Theme page end




/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Blogfeedly for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/tgm/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/tgm/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/tgm/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/tgm/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'blogfeedly_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function blogfeedly_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
			'name'      => 'Superb Helper',
			'slug'      => 'superb-helper',
			'required'  => false,
		),

		array(
			'name'      => 'Superb Addons - WordPress Editor And Elementor Blocks, Sections & Patterns',
			'slug'      => 'superb-blocks',
			'required'  => false,
		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'blogfeedly',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.


	);

	tgmpa( $plugins, $config );
}



add_action('admin_init', 'blogfeedly_spbThemesNotification', 8);

function blogfeedly_spbThemesNotification(){
	$notifications = include('inc/admin_notification/Autoload.php');
	$notifications->Add("blogfeedly_notification", "Unlock All Features with Blog Feedly Premium – Limited Time Offer", "
		
		Take advantage of the up to <span style='font-weight:bold;'>40% discount</span> and unlock all features with Blog Feedly Premium. 
		The discount is only available for a limited time.

		<div>
		<a style='margin-bottom:15px;' class='button button-large button-secondary' target='_blank' href='https://superbthemes.com/blogfeedly/'>Read More</a> <a style='margin-bottom:15px;' class='button button-large button-primary' target='_blank' href='https://superbthemes.com/blogfeedly/'>Upgrade Now</a>
		</div>

		", "info");

	$options_notification_start = array("delay"=> "-1 seconds", "wpautop" => false);
	$notifications->Add("blogfeedly_notification_start", "Let's get you started with Blog Feedly!", '
		<span class="st-notification-wrapper">
		<span class="st-notification-column-wrapper">
		<span class="st-notification-column">
		<img src="'. esc_url( get_template_directory_uri() . '/inc/admin_notification/src/preview.png' ).'" width="150" height="177" />
		</span>

		<span class="st-notification-column">
		<h2>Why Blog Feedly</h2>
		<ul class="st-notification-column-list">
		<li>Easy to Use & Customize</li>
		<li>Search Engine Optimized</li>
		<li>Lightweight and Fast</li>
		<li>Top-notch Customer Support</li>
		</ul>
		<a href="https://superbthemes.com/demo/blogfeedly/" target="_blank" class="button">View Blog Feedly Demo <span aria-hidden="true" class="dashicons dashicons-external"></span></a> 

		</span>
		<span class="st-notification-column">
		<h2>Customize Blog Feedly</h2>
		<ul>
		<li><a href="'. esc_url( admin_url( 'customize.php' ) ) .'" class="button button-primary">Customize The Design</a></li>
		<li><a href="'. esc_url( admin_url( 'widgets.php' ) ) .'" class="button button-primary">Add/Edit Widgets</a></li>
		<li><a href="https://superbthemes.com/customer-support/" target="_blank" class="button">Contact Support <span aria-hidden="true" class="dashicons dashicons-external"></span></a> </li>
		</ul>
		</span>
		</span>
		<span class="st-notification-footer">
		Blog Feedly is created by SuperbThemes. We have 100.000+ users and are rated <strong>Excellent</strong> on Trustpilot <img src="'. esc_url( get_template_directory_uri() . '/inc/admin_notification/src/stars.svg' ).'" width="87" height="16" />
		</span>
		</span>

		<style>.st-notification-column-wrapper{width:100%;display:-webkit-box;display:-ms-flexbox;display:flex;border-top:1px solid #eee;padding-top:20px;margin-top:3px}.st-notification-column-wrapper h2{margin:0}.st-notification-footer img{margin-bottom:-3px;margin-left:10px}.st-notification-column-wrapper .button{min-width:180px;text-align:center;margin-top:10px}.st-notification-column{margin-right:10px;padding:0 10px;max-width:250px;width:100%}.st-notification-column img{border:1px solid #eee}.st-notification-footer{display:inline-block;width:100%;padding:15px 0;border-top:1px solid #eee;margin-top:10px}.st-notification-column:first-of-type{padding-left:0;max-width:160px}.st-notification-column-list li{list-style-type:circle;margin-left:15px;font-size:14px}@media only screen and (max-width:1000px){.st-notification-column{max-width:33%}}@media only screen and (max-width:800px){.st-notification-column{max-width:50%}.st-notification-column:first-of-type{display:none}}@media only screen and (max-width:600px){.st-notification-column-wrapper{display:block}.st-notification-column{width:100%;max-width:100%;display:inline-block;padding:0;margin:0}span.st-notification-column:last-of-type{margin-top:30px}}</style>

		', "info", $options_notification_start);
	$notifications->Boot();
}
