<?php if (get_field('video_post_embed')): ?>
	<div class="video_embed_wrap">
<?php echo get_field('video_post_embed'); ?>
	</div>
<?php endif; ?>

		<?php
			$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
			$video_1 = get_field('video_480p');
			$video_2 = get_field('video_720p');
			$video_3 = get_field('video_1080p');
		 ?>

			<?php if ($video_1 != '' || $video_2 != '' || $video_3 != ''): ?>

			 <link  rel="stylesheet" href="<?php echo site_url(); ?>/wp-content/themes/fluffy/css/plyr.css"/>
			 <script src="<?php echo site_url(); ?>/wp-content/themes/fluffy/js/plyr.js"></script>

			 <script type="text/javascript">
			 document.addEventListener('DOMContentLoaded', () => {
					// This is the bare minimum JavaScript. You can opt to pass no arguments to setup.
					const player = new Plyr('#player');
					// Expose
					window.player = player;
					// Bind event listener
					function on(selector, type, callback) {
						document.querySelector(selector).addEventListener(type, callback, false);
					}
				});
			 </script>

		<div class="video_local_wrap">
			<video controls crossorigin playsinline id="player" style="--plyr-color-main: #df4425;">
				<?php if ($video_1['url']): ?>
					<source src="<?php echo $video_1['url']; ?>" type="video/mp4" size="480">
				<?php endif; ?>

				<?php if ($video_2['url']): ?>
					<source src="<?php echo $video_2['url']; ?>" type="video/mp4" size="720">
				<?php endif; ?>

				<?php if ($video_3['url']): ?>
					<source src="<?php echo $video_3['url']; ?>" type="video/mp4" size="1080">
				<?php endif; ?>

			</video>
				<a download target="_blank" href="<?php echo $video_2['url']; ?>" class="hide btn-video-download">
					<?php yp_text('ดาวน์โหลด','Download'); ?> <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><polyline points="8 12 12 16 16 12"></polyline><line x1="12" y1="8" x2="12" y2="16"></line></svg>
				</a>
		</div>

<?php endif; ?>
