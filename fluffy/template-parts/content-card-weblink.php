<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fluffy
 */
$url_link = get_field('url_link', get_the_ID());
?>
 <!-- wow fadeInUp -->
<article id="post-<?php the_ID(); ?>" class="card-post_m card-recent_post card-weblink">
	<a href="<?php echo $url_link; ?>" target="_blank" class="link-all" title="<?php the_title(); ?>"></a>
	<div class="post-header">
				<?php if(has_post_thumbnail()) { the_post_thumbnail('large');} else { echo '<img src="' . esc_url( get_template_directory_uri()) .'/img/thumb.jpg" alt="'. get_the_title() .'" />'; }?>
    <?php in_thumb_url($url_link); ?>
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

		</div>
        <div class="title-head_card">
            <?php the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>
        </div>
				<div class="post_excerpt">
					<?php echo str_replace("\xc2\xa0","",get_the_excerpt()); ?>
				</div>

				<a href="<?php if($url_link): echo $url_link; else: echo '#'; endif; ?>"  target="_blank" class="read-more">
					<?php yp_text('Go to website','View More'); ?>
					<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="9 18 15 12 9 6"></polyline></svg>
				</a>
	</div>
</article>
