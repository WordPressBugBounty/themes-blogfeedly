<?php
/**
 * The template for displaying Archive pages.
 */
?>
<?php get_header(); ?>
<div id="content" class="site-content">
	<!-- If has sidebar start -->
	<main id="main" class="site-main main-with-sidebar inner">
		<div class="main-has-sidebar">
			<!-- If has sidebar end -->
		<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
		</header><!-- .page-header -->
		<?php
				// Start the Loop.
		while ( have_posts() ) : the_post();
		get_template_part( 'content' );
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
</div><!-- .site-content -->
<?php get_footer(); ?>