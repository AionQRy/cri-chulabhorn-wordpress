<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fluffy
 */

?>
<?php echo do_shortcode('[bottom_banner]'); ?>

<footer id="footer-yp_2" class="footer footer-yp">
    <div class="main-footer">
        <div class="v-container">
            <div class="main-wrap">

                <div class="object-grid object-address">
                    <div class="image">
                            <?php the_custom_logo(); ?>
                    </div>
                    <div class="detail">

                        <!-- en -->
                        <?php
                        if (get_field('footer_address_s3','option') && get_locale() != 'th'): ?>
                          <?php the_field('footer_address_s3','option'); ?>
                        <?php endif; ?>
                        <div class="footer-contact">
                          <?php if (get_field('footer_phone_s3','option') && get_locale() != 'th'): ?>
                            <div class="obj1">
                              <span><?php yp_text('โทรศัพท์ : ','Phone : '); ?></span> <a href="tel:<?php the_field('footer_phone_s3','option'); ?>"><?php the_field('footer_phone_s3','option'); ?></a>
                            </div>
                          <?php endif; ?>
                          <?php if (get_field('footer_fax_s3','option') && get_locale() != 'th'): ?>
                            <div class="obj2">
                              <span><?php yp_text('โทรสาร : ','Fax : '); ?></span> <a href="#"><?php the_field('footer_fax_s3','option'); ?></a>
                            </div>
                          <?php endif; ?>
                        </div>
                        <?php if (get_field('footer_email_s3','option') && get_locale() != 'th'): ?>
                          <span><?php yp_text('อีเมล : ','Email : '); ?></span> <a href="mailto:<?php the_field('footer_email_s3','option'); ?>"><?php the_field('footer_email_s3','option'); ?></a>
                        <?php endif; ?>
                        <!-- th -->
                        <?php
                        if (get_field('footer_address_th','option') && get_locale() == 'th'): ?>
                          <?php the_field('footer_address_th','option'); ?>
                        <?php endif; ?>
                        <div class="footer-contact">
                          <?php if (get_field('footer_phone_s3_th','option') && get_locale() == 'th'): ?>
                            <div class="obj1">
                              <span><?php yp_text('โทรศัพท์ : ','Phone : '); ?></span> <a href="tel:<?php the_field('footer_phone_s3_th','option'); ?>"><?php the_field('footer_phone_s3','option'); ?></a>
                            </div>
                          <?php endif; ?>
                          <?php if (get_field('footer_fax_s3_th','option') && get_locale() == 'th'): ?>
                            <div class="obj2">
                              <span><?php yp_text('โทรสาร : ','Fax : '); ?></span> <a href="#"><?php the_field('footer_fax_s3_th','option'); ?></a>
                            </div>
                          <?php endif; ?>
                        </div>
                        <?php if (get_field('footer_email_s3_th','option') && get_locale() == 'th'): ?>
                          <span><?php yp_text('อีเมล : ','Email : '); ?></span> <a href="mailto:<?php the_field('footer_email_s3_th','option'); ?>"><?php the_field('footer_email_s3','option'); ?></a>
                        <?php endif; ?>


                    </div>
                    <?php echo do_shortcode('[social_list]'); ?>
                </div>


                <?php if (is_active_sidebar('footer-widget-1')): ?>
                  <div class="object-grid object-1">
                      <div class="detail">
                          <nav class="footer-menu">
                              <?php dynamic_sidebar( 'footer-widget-1' ); ?>
                          </nav>
                      </div>
                  </div>
                <?php endif; ?>

                <?php if (is_active_sidebar('footer-widget-2')): ?>
                  <div class="object-grid object-2">
                      <div class="detail">
                          <nav class="footer-menu">
                              <?php dynamic_sidebar( 'footer-widget-2' ); ?>
                          </nav>
                      </div>
                  </div>
                <?php endif; ?>


                <?php if (is_active_sidebar('footer-widget-3')): ?>
                  <div class="object-grid object-3">
                      <div class="detail">
                          <nav id="knowledge-footer" class="footer-menu">
                                <?php dynamic_sidebar( 'footer-widget-3' ); ?>
                          </nav>
                      </div>
                  </div>
                <?php endif; ?>


                <?php if (is_active_sidebar('footer-widget-4')): ?>
                  <div class="object-grid object-4">
                      <div class="detail">
                          <nav id="report-footer" class="footer-menu">
                            <?php dynamic_sidebar( 'footer-widget-4' ); ?>
                          </nav>
                      </div>
                  </div>
                <?php endif; ?>

                  <?php if (is_active_sidebar('footer-widget-5')): ?>
                <div class="object-grid object-5">
                    <div class="detail">
                        <nav id="report-footer" class="footer-menu">
                          <?php dynamic_sidebar( 'footer-widget-5' ); ?>
                        </nav>
                    </div>
                </div>
              <?php endif; ?>


            </div>
        </div>
    </div>
    <div class="bottom-footer">
        <div class="v-container">
            <div class="main-bottom">
                <div class="object-grid object-1"><p><?php
                if (get_locale() == 'th') {
                  the_field('footer_copyright_th','option');
                }
                else {
                  the_field('footer_copyright','option');
                }
                ?></p></div>
                <div class="object-grid object-2">
                        <nav id="roadmap-footer" class="footer-menu">
                            <?php wp_nav_menu( array( 'theme_location' => 'menu-roadmap-footer', 'menu_id' => 'menu-roadmap-footer' ) ); ?>
                        </nav>
                </div>
            </div>
        </div>
    </div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
