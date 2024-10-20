<?php
/**
 * The template for displaying pages.
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
			while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php stsblogfeedly_post_thumbnail(); ?>
					<header class="entry-header"> 
						<?php
						the_title( '<h1 class="entry-title">', '</h1>' );
						edit_post_link( __( 'Edit', 'blogfeedly' ), '<div class="entry-meta">', '</div>' );
						?>
					</header><!-- .entry-header -->
					<div class="entry-content">
						<?php
						the_content();
						wp_link_pages( array(
							'before'      => '<p class="page-links"><span class="page-links-title">' . __( 'Pages:', 'blogfeedly' ) . '</span>',
							'after'       => '</p>',
							'link_before' => '<span class="page-link">',
							'link_after'  => '</span>'
						) );
						?>
					</div><!-- .entry-content -->
				</article><!-- #post -->
				<?php
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