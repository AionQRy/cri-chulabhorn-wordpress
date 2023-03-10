<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fluffy
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>
	<div class="post-header">
		<a href="<?php the_permalink(); ?>" rel="bookmark">
			<div class="wrap-thumb">
				<?php if(has_post_thumbnail()) { the_post_thumbnail();} else { echo '<img src="' . esc_url( get_template_directory_uri()) .'/img/thumb.jpg" alt="'. get_the_title() .'" />'; }?>
			</div>
		</a>

	</div><!-- .entry-header -->

	<div class="post-info">
		<?php 	the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

			<div class="entry-meta">
				<span class="post_date">
					<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
					<?php echo get_the_date(); ?>
				</span>
				<span class="post_view">
					<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
					<?php if(get_current_blog_id() != 1) { echo do_shortcode('[ngd-single-post-view id="'. get_the_ID().'"]'); } else { echo do_shortcode('[post-views]'); } ?>
					<?php if (get_locale() == 'th'): ?>
						<?php echo 'ครั้ง'; ?>
						<?php else: ?>
						<?php echo 'Views'; ?>
					<?php endif; ?>
				</span>
				<div class="clearfix"></div>
			</div><!-- .entry-meta -->


	</div>
</article><!-- #post-<?php the_ID(); ?> -->
