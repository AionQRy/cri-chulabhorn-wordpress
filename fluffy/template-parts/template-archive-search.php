<link rel='stylesheet' id='vc-fontawesome-solid-2' href='<?php echo site_url(); ?>/wp-content/plugins/elementor/assets/lib/font-awesome/css/solid.min.css' media='all' />
<link rel='stylesheet' id='vc-fontawesome-2' href='<?php echo site_url(); ?>/wp-content/plugins/elementor/assets/lib/font-awesome/css/fontawesome.min.css' media='all' />


<main id="primary" class="site-main archive-box search-box-p">
		<?php get_template_part( 'template-parts/vc-post-title'); ?>


	<div class="detail-archive_box detail-archive-search">
		<div class="v-container">

			<div  id="grid-column-post" class="grid-column-post">
				<div class="title-td">
					<h3><?php echo $archive_title; ?></h3>
				</div>
            <?php
          $post_id = get_the_ID();
          $post = get_post( $post_id );
          $post_type = $post->post_type;
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
                <?php
                $text_search = $_GET['_sf_s'];
                if($text_search): ?>
                <div class="div-title">
                <div class="box-none_search">
				<div class="h3-fail">
					<?php yp_text( 'ผลลัพธ์การค้นหา', 'Results for' ); ?>
					<?php if($text_search){
						?>
						<span class="word-t word-s">"<?php echo $text_search; ?>"</span>
						<?php
					}?>
					<?php yp_text( 'พบ', 'found' ); ?>
					<span class="word-t word-f"></span>
					<?php yp_text( 'บทความ', 'items' ); ?>
				</div>

			</div>
                </div>

                <?php endif;?>
              <?php if ( have_posts() ) : ?>
                  <?php
                  /* Start the Loop */
                  while ( have_posts() ) :
                    the_post();
                    ?>
                    <article class="card-rss card-search">
            <div class="column-box">
                <div class="c-1">
                    <div class="feature-column">
                        <div class="feature-image">
                        <a href="
                        <?php
                        switch ($post_type) {
                            case 'vc_rss':
                              $url_link = get_field('url_link', get_the_ID());
                              if($url_link): echo $url_link; else: echo '#'; endif;
                              break;
                            case 'vc_weblink':
                              $url_rss = get_field('url_rss', get_the_ID());
                              if($url_rss): echo $url_rss; else: echo '#'; endif;
                              break;
                            default:
                              echo get_the_permalink();
                              break;
                          }
                          ?>
                          ">
                        <?php
                          switch ($post_type) {
                            case 'vc_downloadmanager':
                              ?>
                              <img src="<?php echo get_stylesheet_directory_uri();?>/theme-core/theme-1/img/file.png" alt="" srcset="">
                              <?php
                                break;
                              case 'mec-events':
                              ?>
                              <img src="<?php echo get_stylesheet_directory_uri();?>/theme-core/theme-1/img/talk.png" alt="" srcset="">
                              <?php
                                break;
                              case 'vc_photos':
                              ?>
                              <img src="<?php echo get_stylesheet_directory_uri();?>/theme-core/theme-1/img/rss-img-1.png" alt="" srcset="">
                              <?php
                                break;
                              case 'vc_videos':
                              ?>
                              <img src="<?php echo get_stylesheet_directory_uri();?>/theme-core/theme-1/img/rss-img-1.png" alt="" srcset="">
                              <?php
                                break;
                              case 'vc_rss':
                              ?>
                              <img src="<?php echo get_stylesheet_directory_uri();?>/theme-core/theme-1/img/rss-img-1.png" alt="" srcset="">
                              <?php
                                break;
                              case 'vc_weblink':
                              ?>
                              <img src="<?php echo get_stylesheet_directory_uri();?>/theme-core/theme-1/img/rss-img-1.png" alt="" srcset="">
                              <?php
                                break;
                              case 'vc_ebook':
                              ?>
                              <img src="<?php echo get_stylesheet_directory_uri();?>/theme-core/theme-1/img/book.png" alt="" srcset="">
                              <?php
                                break;
                              default:
                                ?>
																<?php if(has_post_thumbnail()) { the_post_thumbnail('large');} else { echo '<img src="' . esc_url( get_template_directory_uri()) .'/img/thumb.jpg" alt="'. get_the_title() .'" />'; }?>
																<?php
                                break;
                            }
                          ?>
                          </a>
                        </div>
                        <div class="text-box">
                            <h3>
                            <a href="<?php
                        switch ($post_type) {
                            case 'vc_rss':
                              $url_link = get_field('url_link', get_the_ID());
                              if($url_link): echo $url_link; else: echo '#'; endif;
                              break;
                            case 'vc_weblink':
                              $url_rss = get_field('url_rss', get_the_ID());
                              if($url_rss): echo $url_rss; else: echo '#'; endif;
                              break;
                            default:
                              echo get_the_permalink();
                              break;
                          }
                          ?>">
                          <?php echo get_the_title(); ?></a></h3>
                            <?php
                            $excerpt = get_the_excerpt();
                            if($excerpt):
                            ?>
                            <p><?php echo $excerpt; ?></p>
                            <?php
                            endif; ?>
                            <div class="date-box">
                                <?php $post_date = get_the_date( 'd M Y' ); ?>
                              <span class="date-post_card">
                                  <svg viewBox="0 0 24 24" width="24" height="24" stroke="#0074bc" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                  <span class="text-card"><?php echo $post_date; ?></span>
                              </span>
                              <span class="post_view">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
                                <?php if(get_current_blog_id() != 1) { echo do_shortcode('[ngd-single-post-view id="'. get_the_ID().'"]'); } else { echo do_shortcode('[post-views]'); } ?>
                              </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c-2">
                    <div class="btn-both_box">
                      <a href="
                      <?php
                        switch ($post_type) {
                            case 'vc_rss':
                              $url_link = get_field('url_link', get_the_ID());
                              if($url_link): echo $url_link; else: echo '#'; endif;
                              break;
                            case 'vc_weblink':
                              $url_rss = get_field('url_rss', get_the_ID());
                              if($url_rss): echo $url_rss; else: echo '#'; endif;
                              break;
                            default:
                              echo get_the_permalink();
                              break;
                          }
                          ?>
                          " class="btn-box_1"><?php yp_text( 'ประเภทข้อมูล:', 'Type:' ); ?>
                      <?php
                        switch ($post_type) {
                            case 'vc_downloadmanager':
                              echo esc_html__( 'ไฟล์เอกสาร', 'fluffy' );
                              break;
                            case 'mec-events':
                              echo esc_html__( 'ประชาสัมพันธ์', 'fluffy' );
                              break;
                            case 'vc_photos':
                              echo esc_html__( 'อัลบั้มภาพ', 'fluffy' );
                              break;
                            case 'vc_videos':
                              echo esc_html__( 'วีดีโอ', 'fluffy' );
                              break;
                            case 'vc_rss':
                              echo esc_html__( 'RSS', 'fluffy' );
                              break;
                            case 'vc_weblink':
                              echo esc_html__( 'Weblink', 'fluffy' );
                              break;
                            case 'vc_ebook':
                              echo esc_html__( 'หนังสือ', 'fluffy' );
                              break;
                            default:
                              echo esc_html__( 'ข่าวประชาสัมพันธ์', 'fluffy' );
                              break;
                          }
                          ?>
                      </a>
                      <a href="
                      <?php
                        switch ($post_type) {
                            case 'vc_rss':
                              $url_link = get_field('url_link', get_the_ID());
                              if($url_link): echo $url_link; else: echo '#'; endif;
                              break;
                            case 'vc_weblink':
                              $url_rss = get_field('url_rss', get_the_ID());
                              if($url_rss): echo $url_rss; else: echo '#'; endif;
                              break;
                            default:
                              echo get_the_permalink();
                              break;
                          }
                          ?>
                          "
                           class="btn-box_1"><?php yp_text( 'อ่านเพิ่มเติม', 'Readmore' ); ?></a>
                    </div>
                </div>
            </div>
        </article>

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


	</main><!-- #main -->
