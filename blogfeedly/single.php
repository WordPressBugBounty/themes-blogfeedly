<?php
/**
 * The template for displaying single posts.
 */
?>
<?php get_header(); ?>
<div id="content" class="site-content">
	<!-- If has sidebar start -->
	<main id="main" class="site-main main-with-sidebar inner">
		<div class="main-has-sidebar">
			<!-- If has sidebar end -->
			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();
			get_template_part( 'content' );
			if ( is_singular( 'post' ) ) {
					// Previous/next post navigation.
				the_post_navigation( array(
					'prev_text' => '&larr; %title',
					'next_text' => '%title &rarr;'
					) );
			}
				// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
			endwhile;
			?>
				<!-- If has sidebar start -->
	</div>
<?php get_template_part( 'right-sidebar'); ?>
<!-- If has sidebar end -->

		</main><!-- .site-main -->
	</div><!-- .site-content -->
	<?php get_footer(); ?>