<?php
					$gallery = get_field('gallery_post');
					 if( $gallery ): ?>
					 <style media="screen">
					 .wrap-single.style-2 .gallery-single.section-box-single {
					     padding-top: 5px;
					 }
					 .single .entry-featured-image {
    margin-bottom: 5px;
}
					 .wrap_yp_gallery {
							 display: flex;
							 flex-wrap: wrap;
							 margin: 0 -5px;
					 }
					 .wrap_yp_gallery a.yp_gallery_item {
							 width: calc(20% - 10px);
							 float: left;
							 display: none;
							 margin: 5px;
					 }
					 .wrap_yp_gallery a.yp_gallery_item:nth-child(1) {
						 display: block;
					}
					 .wrap_yp_gallery a.yp_gallery_item:nth-child(2) {
							display: block;
					 }
					 .wrap_yp_gallery a.yp_gallery_item:nth-child(3) {
						 display: block;
					}
					.wrap_yp_gallery a.yp_gallery_item:nth-child(4) {
						 display: block;
					}
					.wrap_yp_gallery a.yp_gallery_item:nth-child(5) {
						 display: block;
					}

					.wrap_yp_gallery a.yp_gallery_item:nth-child(6) {
						display: block;
				 }
					.wrap_yp_gallery a.yp_gallery_item:nth-child(7) {
						 display: block;
					}
					.wrap_yp_gallery a.yp_gallery_item:nth-child(8) {
						display: block;
				 }
				 .wrap_yp_gallery a.yp_gallery_item:nth-child(9) {
						display: block;
				 }
				 .wrap_yp_gallery a.yp_gallery_item:nth-child(10) {
						display: block;
				 }

					.wrap_yp_gallery a.yp_gallery_item .item-thumbs{
						padding-bottom: calc( 0.66 * 100% );
						position: relative;
						transform-style: preserve-3d;
						-webkit-transform-style: preserve-3d;
						overflow: hidden;
						border-radius: 10px;
					}

					.wrap_yp_gallery a.yp_gallery_item .item-thumbs img{
						border-radius: 10px;
					display: block;
					-webkit-transition: -webkit-filter .3s;
					transition: -webkit-filter .3s;
					-o-transition: filter .3s;
					transition: filter .3s;
					transition: filter .3s,-webkit-filter .3s;
					height: 100%;
					width: 100%;
					position: absolute;
					top: calc(50% + 1px);
					left: calc(50% + 1px);
					-webkit-transform: scale(1.01) translate(-50%,-50%);
					-ms-transform: scale(1.01) translate(-50%,-50%);
					transform: scale(1.01) translate(-50%,-50%);
					object-fit: cover;
					}

					.wrap_yp_gallery .overlay_thumb {
							position: absolute;
							top: 0;
							left: 0;
							background: #00a1e1c4;
							color: #FFF;
							content: '';
							display: block;
							z-index: 123;
							width: 100%;
							height: 100%;
					}
					.wrap_yp_gallery .in-overlay {
		display: flex;
		align-items: center;
		flex-direction: column;
}
				.wrap_yp_gallery .in-overlay p{
					margin: 0;
				}
					.wrap_yp_gallery .in-overlay{
						top: 50%;
						left: 50%;
						transform: translate(-50%, -50%);
						position: absolute;
					}
					.wrap_yp_gallery .in-overlay span {
							font-size: 28px;
									border-bottom: solid 3px #FFF;
					}
					.wrap_yp_gallery .in-overlay svg {
							margin-bottom: -0.25em;
							margin-right: 1px;
					}
					.wrap_yp_gallery .in-overlay svg {
							margin-bottom: -0.25em;
							margin-right: 1px;
					}
					.fancybox__thumbs .carousel__slide .fancybox__thumb::after{
						border-color: #f9aa2b!important;
					}
					 .wrap_yp_gallery a.yp_gallery_item:hover{
						 opacity: 0.9;
					 }
					 .fancybox__container{
						 z-index: 9999!important;
					 }

					 /*for tabletV*/
					 @media (min-width: 768px) and (max-width: 991px) {
						 .wrap_yp_gallery a.yp_gallery_item {
								margin-bottom: 10px;
						 }
					 }
					 @media (max-width:767px) {
						 .wrap_yp_gallery a.yp_gallery_item {
							 width: calc(50% - 10px);
							 margin-bottom: 10px;
							 }
					 }
					 </style>

					<link  rel="stylesheet" href="<?php echo site_url(); ?>/wp-content/plugins/yp-plugin-core/include/css/fancybox.css"/>
					<script src="<?php echo site_url(); ?>/wp-content/plugins/yp-plugin-core/include/js/fancybox.min.js"></script>


					<div class="gallery-single section-box-single">
				  <div class="entry-featured-image">
						<div class="swiper gallery-top">
							<div class="swiper-wrapper">
								<?php
								$i = 0;
								foreach ($gallery as $value):
								$i++; ?>
									<div class="swiper-slide">
										<img src="<?php echo $value['url']; ?>" alt="<?php echo $value['caption']; ?>">
									</div>
								<?php endforeach; ?>
							</div>
							<div class="contorl-bottom">
								<div class="swiper-button-prevx">
									<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
										<polyline points="15 18 9 12 15 6"></polyline>
									</svg>
								</div>
								<div class="swiper-pagination-box"></div>
								<div class="swiper-button-nextx">
									<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
										<polyline points="9 18 15 12 9 6"></polyline>
									</svg>
								</div>
							</div>
						</div>
					</div>

					<script type="text/javascript">
					var swiper = new Swiper(".gallery-top", {
						slidesPerView: 1,
						spaceBetween: 0,
						loop: true,
						autoplay: {
							delay: 5000,
						},
						navigation: {
							nextEl: ".gallery-top .swiper-button-nextx",
							prevEl: ".gallery-top .swiper-button-prevx",
						},
						pagination: {
						 el: ".gallery-top .swiper-pagination-box",
						 clickable: true,
						 type: "fraction",
						 },
						autoHeight: true,

					});
					</script>


						<div class="wrap_yp_gallery">
								<?php
								$i = 0;
								$count_gallery = count($gallery);
								foreach( $gallery as $galleries ):
								$i++;
								?>
												<a data-fancybox="gallery" class="yp_gallery_item"  href="<?php echo esc_url($galleries['url']); ?>">
													<div class="item-thumbs">
														<div class="overlay_thumb_single">
																<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
														</div>

														<?php if ($i >= 10): ?>
															<div class="overlay_thumb">
																<div class="in-overlay">
																	<p><?php yp_text('ภาพทั้งหมด','All Photos'); ?></p>
																	<span><?php echo $count_gallery; ?></span>
																</div>
															</div>
														<?php endif; ?>
														<img src="<?php echo esc_url($galleries['sizes']['large']); ?>" alt="<?php echo esc_url($galleries['caption']); ?>">
													</div>
												</a>
								<?php endforeach; ?>
						</div>
					</div>
					<?php if (!empty($gallery)): ?>
						<div class="wrap-all-list gallery-top">
							<div class="file-btn">
								<a href="<?php the_permalink(); ?>?action=download" class="btn-file-download">
									Download  <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><polyline points="8 12 12 16 16 12"></polyline><line x1="12" y1="8" x2="12" y2="16"></line></svg>
								</a>
							</div>
						</div>
					<?php endif; ?>
<?php endif; ?>

<?php
if ($_GET['action'] == 'download') {
	// ob_start();
	$gallery = get_field('gallery_post');
	$gallery_url = array();

	if ($gallery && $gallery_pathfile == '') {
		foreach ($gallery as $value) {
			array_push($gallery_url, $value['sizes']['large']);
		}
	}

	$files = $gallery_url;

	# create new zip object
	$zip = new ZipArchive();
	# create a temp file & open it
	$tmp_file = tempnam('.', '');
	$zip->open($tmp_file, ZipArchive::CREATE);
	# loop through each file
	foreach ($files as $file) {
		# download file
		$download_file = file_get_contents($file);
		$zip->addFromString(basename($file), $download_file);
	}
	# close zip
	$zip->close();
	# send the file to the browser as a download
	header('Content-type: application/zip');
	header('Content-disposition: attachment; filename="image-'.get_the_ID().'.zip"');
	ob_end_clean();
	readfile($tmp_file);
	exit;
	die();
}
 ?>
