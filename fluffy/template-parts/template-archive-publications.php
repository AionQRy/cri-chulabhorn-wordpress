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
						$current_term = get_queried_object();
						if ($current_term->taxonomy == 'vc_publications_year') {
							 echo yp_text_get('สิ่งพิมพ์','Publications');
						}
						else {
							echo $archive_title;
						}
						?>

					</h3>
				</div>
           <div class="column-post_grid">
            <div class="box-post_grid">

              <div id="main" class="main-post_column">
								<div class="left-year">
									<h3><?php
										 $current_term = get_queried_object();
										 if ($current_term->taxonomy == 'vc_publications_year') {
												// echo yp_text_get('ปี','Year').' '.$current_term->name;
												echo $current_term->name;
										 }
										 elseif(isset( $_GET['_sft_vc_publications_year'] )) {
											 $term = get_term_by('slug', $_GET['_sft_vc_publications_year'], 'vc_publications_year');
											 // echo yp_text_get('ปี','Year').' '.$term->name;
											 echo $term->name;
										 }
										 else {
										   echo yp_text_get('ปีทั้งหมด','All Year');
										 }
									 ?>
								 </h3>
								</div>
              <?php if ( have_posts() ) : ?>
                  <?php
                  /* Start the Loop */
                  while ( have_posts() ) :
                    the_post();
                    get_template_part( 'template-parts/content', 'card-publications');
                  endwhile;
                else :
                  get_template_part( 'template-parts/content', 'none' );
									?>
									<style media="screen">
										.title-td,.left-year{
											display: none;
										}
									</style>
									<?php
                endif;
                ?>
                <!-- <div class="box-pageination_post">
                  <div class="count-found">
                  <h4 class="count-head"><php yp_text( 'จำนวนทั้งหมด', 'All Posts' ); ?><span><strong>
                    <php global $wp_query; echo $wp_query->found_posts; ?></strong><?php yp_text( 'รายการ', 'Items' ); ?>
                  </span></h4>
                  </div>
                  <php fluffy_posts_navigation();  ?>
                    <div class="search-bar_yp">
                        <php echo do_shortcode('[searchandfilter id="'.$filter_id.'"]'); ?>
                     </div>
                </div> -->

								<div class="box-pageination_post">
									    <?php fluffy_posts_navigation();  ?>
								</div>
              </div>
             </div>
            </div>
			</div>
		</div>
	</div>


	</main><!-- #main -->
