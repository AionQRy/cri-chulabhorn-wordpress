<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fluffy
 */
?>
 <!-- wow fadeInUp -->
<article id="post-<?php the_ID(); ?>" class="card-post_m card-recent_post">
	<a href="<?php the_permalink(); ?>" class="link-all" title="<?php the_title(); ?>"></a>
	<div class="post-header">
		<?php
		if (get_post_type() == 'vc_photos') {
			$gallery = get_field('gallery_post');
			if (!empty($gallery)):
			?>
			<div class="gallery-label">
				<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
				<span><?php echo count($gallery); ?></span>
			</div>
			<?php else: ?>
				<div class="gallery-label">
					<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
					<span><?php echo '0'; ?></span>
				</div>
			<?php endif; ?>
		<?php	} ?>

		<?php
		if  (get_post_type() == 'vc_videos') {
			$video_post_embed = get_field('video_post_embed');
			$video_480p = get_field('video_480p');
			$video_720p = get_field('video_720p');
			$video_1080p = get_field('video_1080p');
			// if (!empty($video_post_embed) || !empty($video_480p) || !empty($video_720p) || !empty($video_1080p)):
			?>
			<div class="video-label">
				<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
			</div>
			<!-- <php endif; ?> -->
		<?php	} ?>


		<a href="<?php the_permalink(); ?>" rel="bookmark">
				<?php if(has_post_thumbnail()) { the_post_thumbnail('large');} else { echo '<img src="' . esc_url( get_template_directory_uri()) .'/img/thumb.jpg" alt="'. get_the_title() .'" />'; }?>
		</a>
    <?php in_thumb(); ?>
		<?php
	  new_labels();
		 ?>
	</div><!-- .entry-header -->

	<div class="post-info">
		<div class="date-post_card">
				<?php
				$post_date = get_the_date( 'd M Y' ); ?>
				<span class="date-post_card">
						<svg viewBox="0 0 24 24" width="24" height="24" stroke="#0074bc" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
						<span class="text-card"><?php echo $post_date; ?></span>
				</span>
			<span class="post_view">
<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
				<?php if(get_current_blog_id() != 1) { echo do_shortcode('[ngd-single-post-view id="'. get_the_ID().'"]'); } else { echo do_shortcode('[post-views]'); } ?>
			</span>

			<?php
		  new_labels();
			 ?>
		</div>
        <div class="title-head_card">
            <?php the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>
        </div>
				<div class="post_excerpt">
					<?php echo str_replace("\xc2\xa0","",get_the_excerpt()); ?>
				</div>

				<a href="#" class="read-more">
					<?php yp_text('อ่านเพิ่มเติม','View More'); ?>
					<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="9 18 15 12 9 6"></polyline></svg>
				</a>
	</div>
</article>
