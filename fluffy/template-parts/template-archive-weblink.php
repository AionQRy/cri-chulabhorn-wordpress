<link rel='stylesheet' id='vc-fontawesome-solid-2' href='<?php echo site_url(); ?>/wp-content/plugins/elementor/assets/lib/font-awesome/css/solid.min.css' media='all' />
<link rel='stylesheet' id='vc-fontawesome-2' href='<?php echo site_url(); ?>/wp-content/plugins/elementor/assets/lib/font-awesome/css/fontawesome.min.css' media='all' />


<main id="primary" class="site-main archive-box">
		<?php get_template_part( 'template-parts/vc-post-title'); ?>


	<div class="detail-archive_box detail-archive-<?php echo $post_type; ?>">
		<div class="v-container">

			<div  id="grid-column-post" class="grid-column-post">
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
                    get_template_part( 'template-parts/content', 'card-weblink');
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


	</main><!-- #main -->
