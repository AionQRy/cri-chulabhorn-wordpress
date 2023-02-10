<link rel='stylesheet' id='vc-fontawesome-solid-2' href='<?php echo site_url(); ?>/wp-content/plugins/elementor/assets/lib/font-awesome/css/solid.min.css' media='all' />
<link rel='stylesheet' id='vc-fontawesome-2' href='<?php echo site_url(); ?>/wp-content/plugins/elementor/assets/lib/font-awesome/css/fontawesome.min.css' media='all' />


<main id="primary" class="site-main archive-box">
		<?php require( 'vc-post-title.php'); ?>


	<div class="detail-archive_box detail-archive-<?php echo $post_type; ?>">
		<div class="v-container">

			<div  id="grid-column-post" class="grid-column-post">
				<div class="title-td">
					<h3>
						<?php
						global $searchandfilter;
						$current_term = $searchandfilter->get($filter_id)->current_query();
						$current_term = $current_term->get_array();

						if ($current_term['_sft_poll_cat']['name'] == 'Poll Categories') {
							echo $current_term['_sft_poll_cat']['active_terms'][0]['name'];
						}
						else {
								yp_text('แบบสำรวจความเห็น','Polls');
						}
						?>

					</h3>
				</div>
           <div class="column-post_grid">
            <div class="box-post_grid">

              <div id="main" class="main-post_column">
								<?php
								$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
								$args = array(
								'post_type' => array( 'poll'),
								'paged' => $paged,
								'orderby'    => 'DESC'
								);
								// $args['search_filter_id'] = $filter_id;
								$query_all = query_posts( $args );
								?>
              <?php if ( have_posts() ) : ?>
                  <?php
                  /* Start the Loop */
                  while ( have_posts() ) :
                    the_post();
                    // get_template_part( 'template-parts/content', 'card-polls');
										?>
										<div class="item-download-toggle faqs-loop poll-loop" data-id="<?php echo the_ID(); ?>">
											<div class="vitem-download-list -list-full">
												<div class="ob1">
													<div class="wrap-question">
														<h5><?php yp_text('แบบ<BR>สำรวจ','Polls'); ?></h5>
														<span class="num"><?php echo get_the_ID(); ?></span>
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
															<div class="list-3 the_date">
																<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
																<?php echo get_the_date('d M Y'); ?>
															</div>
															<!-- <div class="list-2 view">
																<span class="post_view">
																	<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
																	<php if(get_current_blog_id() != 1) { echo do_shortcode('[ngd-single-post-view id="'. get_the_ID().'"]'); } else { echo do_shortcode('[post-views]'); } ?>
																</span>
														 </div> -->
													</div>
												</div>

												<div class="ob3">
													<button type="button" class="download-close">
														<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
													</button>
													<button class="download-btn">
														<span><?php yp_text('โหวต','Vote'); ?></span>
														<span>
														 <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="6 9 12 15 18 9"></polyline></svg>
													 </span>
													</button>
												</div>
											</div>
											<div class="content-download">
												<div class="answer-label">
													<?php yp_text('โหวต','Vote'); ?>
												</div>
												<div class="faq-content">
													<?php the_content(); ?>
												</div>
											<div class="poll-content-all">
												<?php require( 'content-card-polls.php'); ?>
											</div>
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
                  <h4 class="count-head"><?php yp_text( 'จำนวนทั้งหมด', 'All Posts' ); ?><span><strong>
                    <?php global $wp_query; echo $wp_query->found_posts; ?></strong><?php yp_text( 'รายการ', 'Items' ); ?>
                  </span></h4>
                  </div>
                  <?php fluffy_posts_navigation();  ?>
                    <div class="search-bar_yp">
                        <?php echo do_shortcode('[searchandfilter id="'.$filter_id.'"]'); ?>
                     </div>
                </div>

              </div>
             </div>
            </div>
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
