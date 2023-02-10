<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fluffy
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'fluffy' ); ?></a>

	<header id="main-header-1" class="main-header section-header box-header">
        <div class="top-bar">
            <div class="v-container">
            <div class="main-top">
							<div class="left">
								<!-- th -->
								<?php if (get_field('footer_open_s3','option') && get_locale() != 'th'): ?>
									<div class="open-time">
											<p class="head-class"><?php the_field('footer_open_s3','option'); ?></p>
									</div>
								<?php endif; ?>

								<?php if (get_field('footer_phone_s3','option') && get_locale() != 'th'): ?>
									<div class="phone-top">
										<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
											<p class="head-class"><?php the_field('footer_phone_s3','option'); ?></p>
									</div>
								<?php endif; ?>
								<?php if (get_field('footer_fax_s3','option') && get_locale() != 'th'): ?>
									<div class="fax-top">
										<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
											<p class="head-class"><?php the_field('footer_fax_s3','option'); ?></p>
									</div>
								<?php endif; ?>
								<!-- en -->
								<?php if (get_field('footer_open_s3_th','option') && get_locale() == 'th'): ?>
									<div class="open-time">
											<p class="head-class"><?php the_field('footer_open_s3_th','option'); ?></p>
									</div>
								<?php endif; ?>

								<?php if (get_field('footer_phone_s3_th','option') && get_locale() == 'th'): ?>
									<div class="phone-top">
										<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
											<p class="head-class"><?php the_field('footer_phone_s3_th','option'); ?></p>
									</div>
								<?php endif; ?>
								<?php if (get_field('footer_fax_s3_th','option') && get_locale() == 'th'): ?>
									<div class="fax-top">
										<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
											<p class="head-class"><?php the_field('footer_fax_s3_th','option'); ?></p>
									</div>
								<?php endif; ?>
							</div>
							<div class="right">
								<div class="size-box pad-top">
										<div class="box-size">
												<div class="text-size">
													<span class="text-span"><?php yp_text( 'การแสดงผล', 'Display' ); ?></span>
												</div>
												<div class="button-size">
														<button type="button" class="sizeOne active"><?php yp_text('ก','A') ?></button>
														<button type="button" class="sizeTwo"><?php yp_text('ก','A') ?></button>
														<button type="button" class="sizeThree"><?php yp_text('ก','A') ?></button>
												</div>
										</div>
								</div>

								<div class="color-box pad-top">
									<div class="box-color">
											<div class="button-color">
												<button type="button" class="btn-color cbtn-1 active"><?php yp_text('C','C') ?></button>
												<button type="button" class="btn-color cbtn-2"><?php yp_text('C','C') ?></button>
												<button type="button" class="btn-color cbtn-3"><?php yp_text('C','C') ?></button>
											</div>
									</div>
								</div>
								<div class="lang-box">
									<span class="text-span"><?php echo do_shortcode('[polylang_slink]'); ?></span>
								</div>
							</div>
            </div>
        </div>
        </div>
        <div class="main-object">
            <div class="v-container">
                <div class="object-1">
                      <div class="site-branding">
                          <?php if (get_locale() == 'th'): ?>
                          	  <?php the_custom_logo(); ?>
															<?php else: ?>
																<?php if (get_field('logo_en','option')): ?>
																	<a href="<?php echo home_url(); ?>" class="custom-logo-link" rel="home" aria-current="page">
																		<?php echo wp_get_attachment_image( get_field('logo_en','option')['ID'], 'large', array( "class" => "custom-logo","alt" => "logo" ) ); ?>
																	</a>
																<?php endif; ?>
                          <?php endif; ?>
                        </div><!-- .site-branding -->
                </div>
                <div class="object-2">
									<div class="menu-primary_home">
											<div class="desktop_menu _desktop">
												<?php
												wp_nav_menu(
														array(
																'theme_location' => 'primary',
																'menu_id'        => 'primary-menu',
														)
												);
												?>
											</div>
									</div>
	                <div class="v-search_box pad-top">
										<div class="toggle-search">
											<div class="toggle-icon">
													<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
											</div>
											</div>
	                </div>
               </div>
            </div>
        </div>

        <div class="mobile-object">
            <div class="mobile-wrap">
                <div class="object-1">
                    <div class="site-branding">
                        <?php the_custom_logo(); ?>
                    </div>
                </div>
                <div class="object-2">
                    <nav id="site-navigation" class="main-navigation">
                    <div class="toggle-search">
	                    <div class="toggle-icon">
	                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
	                    </div>
                		</div>
                        <div class="main-tog">
                            <div id="toggle-main-menu" class="hamburger hamburger--slider">
                                <div class="hamburger-box">
                                    <div class="hamburger-inner"></div>
                                </div>
                            </div>
                        <span class="span-toggle"><?php yp_text( 'เมนูหลัก', 'Menu' ); ?></span>
                        </div>

                        <div class="overlay_menu_m"></div>
                        <div id="mobile_menu_wrap">
                            <div id="close-mobile-menu" class="hamburger hamburger--slider is-active">
															<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                            </div>

                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'mobile',
                                    'menu_id'        => 'mobile-menu',
                                )
                            );
                            ?>
                        </div>
                    </nav><!-- #site-navigation -->
                </div>
            </div>
        </div>
	</header><!-- #masthead -->

<?php yp_popup_search(); ?>
