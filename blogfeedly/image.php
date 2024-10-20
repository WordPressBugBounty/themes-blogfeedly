<?php
/**
 * The template for displaying image attachments.
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
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					<div class="entry-meta">
						<?php
						stsblogfeedly_posted_on();
						edit_post_link( esc_html__( 'Edit', 'blogfeedly' ), '<span class="edit-link">', '</span>' );
						?>
					</div>
				</header><!-- .entry-header -->
				<div class="entry-content">
					<div class="entry-attachment">
						<?php echo wp_get_attachment_image( get_the_ID(), 'post-thumbnail' );?>
						<?php if ( has_excerpt() ) : ?>
						<div class="entry-caption">
							<?php the_excerpt(); ?>
						</div>
					<?php endif; ?>
				</div><!-- .entry-attachment -->
				<?php
				the_content( __( 'Read More', 'blogfeedly' ) );
				wp_link_pages( array(
					'before'      => '<p class="page-links"><span class="page-links-title">' . __( 'Pages:', 'blogfeedly' ) . '</span>',
					'after'       => '</p>',
					'link_before' => '<span class="page-link">',
					'link_after'  => '</span>'
					) );
					?>
				</div><!-- .entry-content -->
				<footer class="entry-footer">
					<?php stsblogfeedly_entry_footer(); ?>
				</footer><!-- .entry-footer -->
			</article><!-- #post-## -->
			<?php
				// Show navigation if there is more than one attachment
			$attachments = array_values( get_children( array(
				'post_parent'    => $post->post_parent,
				'post_status'    => 'inherit',
				'post_type'      => 'attachment',
				'post_mime_type' => 'image',
				'order'          => 'ASC',
				'orderby'        => 'menu_order ID' 
				) ) );
			if ( count( $attachments ) > 1 ) :
				?>
			<nav id="image-navigation" class="navigation image-navigation">
				<div class="nav-links">
					<div class="nav-previous"><?php previous_image_link( false, '&larr; ' . __( 'Previous Image', 'blogfeedly' ) ); ?></div>
					<div class="nav-next"><?php next_image_link( false, __( 'Next Image', 'blogfeedly' ) . ' &rarr;' ); ?></div>
				</div><!-- .nav-links -->
			</nav><!-- #image-navigation -->
			<?php
			endif;
				// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			endwhile;
			?>
			<!-- If has sidebar start -->
		</div>
		<?php get_template_part( 'right-sidebar'); ?>
		<!-- If has sidebar end -->
	</main><!-- .site-main -->
</div><!-- .site-content -->
<?php get_footer(); ?>