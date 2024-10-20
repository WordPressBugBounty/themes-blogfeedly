<?php
/**
 * Template Name: Archives
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
						<?php the_content(); ?> 
						<h2 class="archive-list-title"><?php _e( 'Latest Posts', 'blogfeedly' ); ?></h2>
						<ul class="archive-list">
							<?php
							wp_get_archives( array(
								'type'  => 'postbypost',
								'limit' => 15
							) );
							?>
						</ul>
						<h2 class="archive-list-title"><?php _e( 'By Subject', 'blogfeedly' ); ?></h2>
						<ul class="archive-list">
							<?php
							wp_list_categories( array(
								'show_count' => 1,
								'title_li'   => ''
							) );
							?>
						</ul>
						<h2 class="archive-list-title"><?php _e( 'By Month', 'blogfeedly' ); ?></h2>
						<ul class="archive-list">
							<?php
							wp_get_archives( array(
								'type' => 'monthly'
							) );
							?>
						</ul>
					</div><!-- .entry-content -->
				</article><!-- #post -->
			<?php endwhile; ?>
				<!-- If has sidebar start -->
	</div>
<?php get_template_part( 'right-sidebar'); ?>
<!-- If has sidebar end -->
		</main><!-- .site-main -->
	</div><!-- .site-content -->
<?php get_footer(); ?>