<link rel='stylesheet' id='vc-fontawesome-solid-2' href='<?php echo site_url(); ?>/wp-content//plugins/elementor/assets/lib/font-awesome/css/solid.min.css' media='all' />
<link rel='stylesheet' id='vc-fontawesome-2' href='<?php echo site_url(); ?>/wp-content/plugins/elementor/assets/lib/font-awesome/css/fontawesome.min.css' media='all' />


	<main id="primary" class="site-main archive-box">
		<?php get_template_part( 'template-parts/vc-post-title'); ?>

	 <div class="banner-archive_box">
      <?php
      $get_terms_default_attributes = array (
        'taxonomy' => $taxonomy, //empty string(''), false, 0 don't work, and return empty array
        'orderby' => 'name',
        'order' => 'ASC',
        'hide_empty' => true, //can be 1, '1' too
        'number' => false, //can be 0, '0', '' too
        'hierarchical' => false, //can be 1, '1' too
      );
      $projects = get_terms(  $taxonomy, $get_terms_default_attributes );
      ?>
<div class="vc_postx card post-tab-v1" data-nav="post-tab-v1">

		<?php if (is_post_type_archive($post_type)): ?>
			<div class="head-tab">
					<div class="p-title"></div>
					<div class="v-container">
						<div class="nav-sub-term-yp">
							<ul>
									<?php
									$i = 0;
									foreach ($projects as $sub_term_id) :
									$i++;
									$term_in     = get_term_by('id', $sub_term_id->term_id, $taxonomy);
									?>
									<li class="<?php if ($i == 1) {
																	echo "active";
															} ?>" data-id="<?php echo $sub_term_id->term_id; ?>" data-nav="post-tab-v1">
											<?php echo $term_in->name; ?></li>
									<?php endforeach; ?>
							</ul>
						</div>
					</div>
			</div>
			<div class="v-container wrap">
			<?php
			$i = 0;
			foreach ($projects as $term_id) :
					$i++;
			?>
			<div class="content-post-tab-yp	<?php if ($i == 1) { echo "active"; } ?>" data-id="<?php echo $term_id->term_id; ?>">
					<div class="title-td">
						<h3><?php echo $archive_title; ?></h3>
					</div>
					<div class="vc_posts-wrapper vc_post_tab_v1">
							<div class="left">
							<?php
							$args = [
									'post_type'      =>  $post_type,
									'tax_query'      => [
									[
											'taxonomy' => $taxonomy,
											'field'    => 'term_id',
											'terms'    => $term_id,
									],
									],
									'posts_per_page' => 1,
									'orderby'        => 'ID',
									'order'          => 'DESC',
							];
							query_posts($args);

							?>
							<?php if (have_posts()) : ?>
									<?php while (have_posts()) : the_post(); ?>
									<?php
											$term = get_the_category(get_the_ID());
											get_template_part( 'template-parts/content', 'card-post');
									?>

									<?php endwhile; ?>
							<?php endif; ?>
							<?php wp_reset_query(); ?>
							</div>
							<div class="right">
							<?php
							$args = [
									'post_type'      =>  $post_type,
									'tax_query'      => [
									[
											'taxonomy' => $taxonomy,
											'field'    => 'term_id',
											'terms'    => $term_id->term_id,
									],
									],
									'offset' => 1,
									'posts_per_page' => 3,
									'orderby'        => 'ID',
									'order'          => 'DESC',
							];
							query_posts($args);

							?>
							<?php if (have_posts()) : ?>
									<?php while (have_posts()) : the_post(); ?>
									<?php
											$term = get_the_category(get_the_ID());
											get_template_part( 'template-parts/content', 'card-post');
									?>
									<?php endwhile; ?>
							<?php endif; ?>
							<?php wp_reset_query(); ?>
							</div>
					</div>
					</div>
			<?php endforeach; ?>
				</div>


			</div>
	</div>
	<!-- end -->
	<?php else: ?>
		<style media="screen">
		.detail-archive_box {
				background: #FFF;
				border-top: solid 1px #ddd;
				border-bottom: solid 1px #ddd;
			}
		</style>
		<?php endif; ?>


	<div class="detail-archive_box detail-archive-<?php echo $post_type; ?>">
		<div class="v-container">

			<div  id="grid-column-post" class="grid-column-post">
				<div class="title-td">
					<h3><?php echo $archive_title; ?></h3>
				</div>
        <!-- <div class="left-content"> -->
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
          //
          //           echo '<div class="search-bar_ypx">';
          //           echo do_shortcode('[searchandfilter id="'.$filter_id.'"]');
          //           echo '</div>';


          // $posts_per_page = 2;

            // $args = array(
            // 'post_type' => $post_type,
            // 'orderby' => 'DESC'
              // 'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
            // 'offset' => $offset,
            // );
            // $args['search_filter_id'] = 77310;
            // $query_all = query_posts( $args );


            echo '<div class="search-bar_ypx">';
            echo do_shortcode('[searchandfilter id="'.$filter_id.'"]');
            echo '</div>';
           ?>
           <div class="column-post_grid">
            <div class="box-post_grid">
              <div id="main" class="main-post_column <?php if ($setting_type == 'announce' || $setting_type == '') {echo "one-column";} ?>">
              <?php if ( have_posts() ) : ?>
                  <?php
                  /* Start the Loop */
                  while ( have_posts() ) :
                    the_post();
                    /*
                    * Include the Post-Type-specific template for the content.
                    * If you want to override this in a child theme, then include a file
                    * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                    */
                    // get_template_part( 'template-parts/content', get_post_type() );
                    if ($setting_type == 'announce') {
                      get_template_part( 'template-parts/content', 'announce');
                    }
                    else {
                      get_template_part( 'template-parts/content', 'card-post');
                    }

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


	</main><!-- #main -->
