/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

 ( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );




	// Color preview

	wp.customize( 'header_title_tagline_color', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a,.site-description' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'header_border_color', function( value ) {
		value.bind( function( to ) {
			$( '.site-navigation' ).css( {
				'border-color':to
			});
		} );
	} );
	wp.customize( 'header_border_color', function( value ) {
		value.bind( function( to ) {
			$( '#menu-toggle' ).css( {
				'background-color':to
			});
		} );
	} );
	wp.customize( 'header_link_color', function( value ) {
		value.bind( function( to ) {
			$( '.site-navigation a,#menu-toggle' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'postpage_header', function( value ) {
		value.bind( function( to ) {
			$( '.archive-list-title, .page-title, .not-found .page-title, .social-title, .comments-title, .tag-links, .parent-post-link, .comment-author .fn, .comment-author .url, .comment-reply-title, .entry-content h1, .entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5, .entry-content h6, .entry-content th, .entry-title, .entry-title a, .entry-title a:hover' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'postpage_meta', function( value ) {
		value.bind( function( to ) {
			$( '.entry-meta, .entry-meta *, .entry-meta, .entry-meta *:hover' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'postpage_text', function( value ) {
		value.bind( function( to ) {
			$( '.entry-summary, .comments-area, .comments-area p, .entry-content, .entry-content address, .entry-content dt, .page-content, .page-content p, .entry-content p, .entry-content span, .entry-content div, .entry-content li, .entry-content ul, .entry-content ol, .entry-content td, .entry-content dd, .entry-content blockquote' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'postpage_border', function( value ) {
		value.bind( function( to ) {
			$( '.page-content .search-field, .archive-list-title, .comments-area *, .entry-content *' ).css( {
				'border-color':to
			});
		} );
	} );
	wp.customize( 'postpage_link', function( value ) {
		value.bind( function( to ) {
			$( '.archive-list a, .comments-area a, .page .entry-content a, .single .entry-content a, .error404 .entry-content a' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'postpage_pagination_button_bg', function( value ) {
		value.bind( function( to ) {
			$( '.nav-previous a, .nav-next a, .nav-previous a:hover, .nav-next a:hover,.pagination .page-numbers, .pagination .page-numbers:hover' ).css( {
				'background-color':to
			});
		} );
	} );
	wp.customize( 'postpage_pagination_button_text', function( value ) {
		value.bind( function( to ) {
			$( '.nav-previous a, .nav-next a, .nav-previous a:hover, .nav-next a:hover,.pagination .page-numbers,.pagination .page-numbers:hover' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'sidebar_header', function( value ) {
		value.bind( function( to ) {
			$( '.featured-sidebar .widget-title' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'sidebar_text', function( value ) {
		value.bind( function( to ) {
			$( '.featured-sidebar *' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'sidebar_link', function( value ) {
		value.bind( function( to ) {
			$( '.featured-sidebar a' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'sidebar_border', function( value ) {
		value.bind( function( to ) {
			$( '.featured-sidebar .tagcloud a, .featured-sidebar .widget-title, .featured-sidebar *' ).css( {
				'border-color':to
			});
		} );
	} );
	wp.customize( 'footer_bg', function( value ) {
		value.bind( function( to ) {
			$( '.site-footer' ).css( {
				'background':to
			});
		} );
	} );
	wp.customize( 'footer_header', function( value ) {
		value.bind( function( to ) {
			$( '.site-footer .widget-title' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'footer_text', function( value ) {
		value.bind( function( to ) {
			$( '.site-footer li, .site-footer ol, .site-footer ul, .site-footer p, .site-footer span, .site-footer div, .site-footer' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'footer_link', function( value ) {
		value.bind( function( to ) {
			$( '.icon-chevron-up:before, .site-footer a' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'footer_border', function( value ) {
		value.bind( function( to ) {
			$( '.site-footer .tagcloud a, .site-footer *' ).css( {
				'border-color':to
			});
		} );
	} );
	wp.customize( 'body_bg', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).css( {
				'background-color':to
			});
		} );
	} );
	wp.customize( 'header_bg_color', function( value ) {
		value.bind( function( to ) {
			$( '.site-navigation, .site-header, .site-navigation .menu-wrap' ).css( {
				'background':to
			});
		} );
	} );
	





	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );
} )( jQuery );
