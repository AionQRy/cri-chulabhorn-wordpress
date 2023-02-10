<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fluffy
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="page-404">
	<div class="entry-content">
		<div class="v-container">
			<div class="wrap-404">
				<div class="left">
					<img src="<?php echo get_template_directory_uri();?>/img/404.png" alt="404">
				</div>
				<div class="right">
					<div class="in-right">
						<h1>404</h1>
						<h4><?php yp_text('ไม่พบหน้าที่ต้องการ','Not Found'); ?></h4>
						<a href="<?php echo home_url(); ?>"><?php yp_text('ไปหน้าแรก','Go to Home'); ?>
							<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
							<polyline points="9 18 15 12 9 6"></polyline>
						</svg>
					 </a>
					</div>
				</div>
			</div>
		</div>
	</div><!-- .entry-content -->
</div>
</article><!-- #post-<?php the_ID(); ?> -->
