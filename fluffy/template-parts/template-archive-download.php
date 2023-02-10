<link rel='stylesheet' id='vc-fontawesome-solid-2' href='<?php echo site_url(); ?>/wp-content//plugins/elementor/assets/lib/font-awesome/css/solid.min.css' media='all' />
<link rel='stylesheet' id='vc-fontawesome-2' href='<?php echo site_url(); ?>/wp-content/plugins/elementor/assets/lib/font-awesome/css/fontawesome.min.css' media='all' />


	<main id="primary" class="site-main archive-box">
		<?php get_template_part( 'template-parts/vc-post-title'); ?>


	<div class="detail-archive_box detail-archive-<?php echo $post_type; ?>">
		<div class="v-container">

			<div  id="grid-column-post" class="grid-column-post">
        <!-- <div class="left-content"> -->
				<div class="title-td">
					<h3><?php echo $archive_title; ?></h3>
				</div>
          <?php


          $filter = get_page_by_path( $filter_slug, OBJECT, 'search-filter-widget' );

          if ( function_exists( 'pll_the_languages' ) ) {
            $id_filter = $translations = $GLOBALS["polylang"]->model->post->get_translations($filter->ID);
            if (get_locale() == 'th') {
              $filter_id = $id_filter['th'];
            }
            if (get_locale() != 'th') {
              $filter_id = $id_filter['en'];
            }
          }
          else {
            $filter_id = $filter->ID;
          }

            echo '<div class="search-bar_ypx">';
            echo do_shortcode('[searchandfilter id="'.$filter_id.'"]');
            echo '</div>';
           ?>
           <div class="column-post_grid">
            <div class="box-post_grid">
              <div id="main" class="main-post_column">
              <?php if ( have_posts() ) : ?>
                  <?php
                  /* Start the Loop */
                  while ( have_posts() ) :
                    the_post();
										$url_host_z = get_field('files_download');
										// echo "<pre>";
										// print_r($url_host_z);
										// echo "</pre>";

										$sum_size = 0;
										foreach ($url_host_z as $value) {
											$sum_size = $sum_size + file_size_cal($value['file_download']['url']);
										}


										$size_cal = $sum_size/1048576;
								    $unit = '';

								    if ($size_cal <= 0) {
								      $unit = 'KB';
								      $size_cal = $sum_size/1024;
								    }
								    else {
								      $unit = 'MB';
								    }

										$sum_count = 0;
										foreach ($url_host_z as $vcount) {
											if ($vcount['file_download_count'] == '') {
													$sum_count = $sum_count;
											}
											else {
												$sum_count = $sum_count + $vcount['file_download_count'];
											}
										}
	                	?>
										<div class="item-download-toggle" data-id="<?php echo the_ID(); ?>">
											<div class="vitem-download-list -list-full">
											  <div class="ob1">
											        <?php
															 $url_host_z = $url_host_z[0]['file_download']['url'];
											         $ext_z = pathinfo($url_host_z, PATHINFO_EXTENSION);

															 $file_icon_type = ext_file($ext_z);

											    ?>
											    <div class="bg type-<?php echo $ext_z; ?>">
											      <img src="<?php echo $file_icon_type; ?>" alt="<?php the_title(); ?>">
											    </div>

											  </div>
											  <div class="ob2">
											    <div class="top">
											      <h4>
											        <span>
											          <?php
											          the_title();
											          ?>
											        </span>
											      </h4>
											    </div>
											    <div class="bottom">
											        <div class="list-1">
											          <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
											          <span>
											            <?php
											            if (!empty($size_cal)) {
																		echo number_format($size_cal,1).' '.$unit;
											            }
											             ?>
											          </span>
											        </div>
											        <div class="list-2 ac">
											          <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
											            <span>
											              <?php
											              if (!empty($sum_count)) {
											                echo $sum_count;
											              }
											              else {
											                echo "0";
											              }
											               ?>
											            </span>
											        </div>
											        <div class="list-3 the_date">
																<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
											          <?php echo get_the_date('d M Y'); ?>
											        </div>
											    </div>
											  </div>

											  <div class="ob3">
													<button type="button" class="download-close">
														<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
													</button>
											    <button class="download-btn">
											      <span><?php yp_text('ดูไฟล์','View More'); ?></span>
														<span>
														 <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="6 9 12 15 18 9"></polyline></svg>
													 </span>
											    </button>
											  </div>
											</div>
											<div class="content-download">
												<?php if( have_rows('files_download') ): ?>
													<?php while( have_rows('files_download') ): the_row();?>
																					<?php require( 'content-list-download-full.php'); ?>
														<?php endwhile; ?>
												<?php endif; ?>
											</div>
										</div>
										<?php

                  endwhile;

                else :

                  get_template_part( 'template-parts/content', 'none' );

                endif;
                ?>
                <div class="box-pageination_post">
                  <div class="count-found">
                  <h4 class="count-head"><?php yp_text( 'จำนวนทั้งหมด', 'All Posts' ); ?><span><strong><?php global $wp_query; echo $wp_query->found_posts; ?></strong><?php yp_text( 'รายการ', 'Items' ); ?></span></h4>
                  </div>
                  <?php fluffy_posts_navigation();  ?>
                    <div class="search-bar_yp">
                        <?php echo do_shortcode('[searchandfilter id="'.$filter_id.'"]'); ?>
                     </div>
                </div>
              </div>
             </div>

            </div>
        <!-- </div> -->
        <!-- <div class="right-content"> -->
        <!-- </div> -->
        <!-- <div class="clearfix"></div> -->
			</div>
		</div>
	</div>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('.vitem-download-list.-list-full .download-close').click(function(event) {
			$(this).parent().parent().parent().toggleClass('active');
		});
		$('.vitem-download-list.-list-full .download-btn').click(function(event) {
			$(this).parent().parent().parent().toggleClass('active');
		});
	});
</script>
	</main><!-- #main -->
