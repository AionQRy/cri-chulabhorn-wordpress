<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php if (!is_front_page() ): ?>
<?php get_template_part( 'template-parts/vc-post-title'); ?>
<?php endif; ?>

<div id="page" class="wrap-bg archive-event">
	<div class="entry-content">

			<div class="v-container">
				<div class="title-cat">
					<?php
					// $current_term = get_queried_object();
					$get_terms_default_attributes = array (
						'taxonomy' => 'mec_category', //empty string(''), false, 0 don't work, and return empty array
						'orderby' => 'name',
						'order' => 'ASC',
						'hide_empty' => true, //can be 1, '1' too
						'number' => false, //can be 0, '0', '' too
						'hierarchical' => false, //can be 1, '1' too
					);
					$projects = get_terms( 'mec_category', $get_terms_default_attributes );
					?>
					<ul>
						<li class="e-item active" data-id="0">
								<?php yp_text('ทั้งหมด','All'); ?>
							</li>
							<?php
							foreach ($projects as $sub_term_id) :
							?>
							<li class="e-item" data-id="<?php echo $sub_term_id->term_id; ?>">
									<?php echo $sub_term_id->name; ?></li>
							<?php endforeach; ?>
					</ul>
				</div>
			</div>

			<div class="event-content-a main-content">
				<div class="v-container">
					<div class="wrap-con">
						<div id="v-calendar-full">
							<?php
							if (empty($_GET['type']) || $_GET['type'] == 'monthly') {
									echo do_shortcode('[MEC id="379"]');
							}
							elseif ( $_GET['type'] == 'daily' ) {
								echo do_shortcode('[MEC id="1851"]');
							}
							elseif ($_GET['type'] == 'weekly') {
								echo do_shortcode('[MEC id="1852"]');
							}
							elseif ($_GET['type'] == 'list') {
								echo do_shortcode('[MEC id="1853"]');
							}
							else {
								echo do_shortcode('[MEC id="379"]');
							}
							 ?>
						</div>

					<?php	require('e-sidebar.php'); ?>
					</div>
				</div>
			</div>
	</div><!-- .entry-content -->
</div>
</article><!-- #post-<?php the_ID(); ?> -->
