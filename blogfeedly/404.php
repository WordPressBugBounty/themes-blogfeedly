<?php
/**
 * The template for displaying 404 pages
 */
?>
<?php get_header(); ?>
	<div id="content" class="site-content">
				<!-- If has sidebar start -->
	<main id="main" class="site-main main-with-sidebar inner">
		<div class="main-has-sidebar">
			<!-- If has sidebar end -->
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( '404 - Page Not Found!', 'blogfeedly' ); ?></h1>
				</header><!-- .page-header -->
				<div class="page-content">
					<p><?php esc_html_e( 'Sorry, the page you were looking for doesn&rsquo;t exist anymore or has been moved. Maybe try one of the links below or a search?', 'blogfeedly' ); ?></p>
					<?php get_search_form(); ?>
					<h2 class="archive-list-title"><?php _e( 'Latest Posts', 'blogfeedly' ); ?></h2>
					<ul class="archive-list">
						<?php
						wp_get_archives( array(
							'type'  => 'postbypost',
							'limit' => 15
						) );
						?>
					</ul>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
			<!-- If has sidebar start -->
		</div>
		<?php get_template_part( 'right-sidebar'); ?>
		<!-- If has sidebar end -->
		</main><!-- .site-main -->
	</div><!-- .site-content -->
<?php get_footer(); ?>