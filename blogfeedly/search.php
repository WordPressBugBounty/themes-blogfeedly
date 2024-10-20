<?php
/**
 * The template for displaying search results.
 */
?>
<?php get_header(); ?>
<section id="content" class="site-content">
				<!-- If has sidebar start -->
	<main id="main" class="site-main main-with-sidebar inner">
		<div class="main-has-sidebar">
			<!-- If has sidebar end -->
		<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'blogfeedly' ), '<span class="highlight">' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
		</header><!-- .page-header -->
		<div class="page-content">
			<?php get_search_form(); ?>
		</div>
		<?php
				// Start the Loop.
		while ( have_posts() ) : the_post();
		get_template_part( 'content', 'list' );
		endwhile;
		stsblogfeedly_loop_navigation();
		else:
				// If no content, include the "No posts found" template.
			get_template_part( 'content', 'none' );
		endif;
		?>
		<!-- If has sidebar start -->
	</div>
	<?php get_template_part( 'right-sidebar'); ?>
	<!-- If has sidebar end -->
</main><!-- .site-main -->
</section><!-- .site-content -->
<?php get_footer(); ?>