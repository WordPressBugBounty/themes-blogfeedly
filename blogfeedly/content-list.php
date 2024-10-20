<?php
/**
 * The template part for displaying content in search and author archive pages.
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-list-item' ); ?>>
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		<div class="entry-meta">
			<?php
			stsblogfeedly_posted_on();
			edit_post_link( __( 'Edit', 'blogfeedly' ), '<span class="edit-link">', '</span>' );
			?>
		</div>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
</article><!-- #post-## -->