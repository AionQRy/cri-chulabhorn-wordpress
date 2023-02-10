<article class="card-rss card-search">
            <div class="column-box">
                <div class="c-1">
                    <div class="feature-column">
                        <div class="feature-image">
                            <a href="<?php echo $url; ?>">
                                <img src="<?php echo get_stylesheet_directory_uri();?>/theme-core/theme-1/img/rss-img-1.png" alt="item">
                            </a>
                        </div>
                        <div class="text-box">
                            <h3><a href="<?php echo $url; ?>"><?php echo get_the_title(); ?></a></h3>
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
                      <a href="http://" class="btn-box_1"><?php esc_html_e( 'ประเภทข้อมูล:', 'fluffy' ); ?></a>
                      <a href="http://" class="btn-box_1"><?php esc_html_e( 'อ่านเพิ่มเติม', 'fluffy' ); ?></a>
                    </div>
                </div>
            </div>
        </article>
