<?php

namespace Elementor;

class carousel_home_weblink extends Widget_Base
{

  public function get_name()
  {
    return 'carousel_home_weblink';
  }

  public function get_title()
  {
    return __('Weblinks Carousel');
  }

  public function get_icon()
  {
    return 'eicon-slides';
  }

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);

  }




  public function get_categories()
  {
    return ['general'];
  }

  protected function _register_controls()
  {
  }

  protected function render()
  {
    ob_start();
?>
    <?php if ($_GET['action'] == '') : ?>

      <div class="wrapper-all-web-link">

      <div class="title-carousel_home_weblink">
        <div class="left">
          <h3><?php yp_text('หน่วยงานที่เกี่ยวข้อง','Weblinks'); ?></h3>
          <a href="<?php echo site_url(); ?>/weblinks" class="view-all"><?php yp_text('หน่วยงานทั้งหมด','View All'); ?> <i class="fas fa-chevron-right"></i></a>
        </div>


      <?php if (get_field('setting_theme', 'option') != 'six' ) : ?>
        <div class="nav-weblink-home">
          <div class="weblink-button-prev weblink-btn">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
              <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
          </div>
          <div class="weblink-button-next weblink-btn">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
              <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
          </div>
        </div>
        <?php endif; ?>
      </div>

      <div class="wrap-carousel_home_weblink">
        <div id="carousel_home_weblink" class="swiper vc_weblink">



          <div class="swiper-wrapper">
            <?php
            $args = array(
            'post_type' => array( 'weblink'),
            'posts_per_page'  =>  -1,
            'orderby'    => 'ID',
            'order'    => 'DESC'
            );
            query_posts( $args );
            ?>
            <?php if ( have_posts()) : ?>
              <?php while ( have_posts() ) : the_post(); ?>


                    <div class="swiper-slide">
                      <div class="text-center">
                        <a target="_blank" href="<?php the_field('url_link'); ?>"><?php the_post_thumbnail(); ?></a>
                        <h4>
                          <a target="_blank" href="<?php the_field('url_link'); ?>"><?php the_title(); ?></a>
                        </h4>
                      </div>
                    </div>


              <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_query(); ?>

          </div>




        </div>
      </div>

      <?php if (get_field('setting_theme', 'option') == 'six' ) : ?>
        <div class="swiper-button-next weblink-button-next">
          <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
            <polyline points="9 18 15 12 9 6"></polyline>
          </svg>
        </div>
        <div class="swiper-button-prev weblink-button-prev">
          <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
            <polyline points="15 18 9 12 15 6"></polyline>
          </svg>
        </div>
      <?php endif; ?>

    </div>

    <script type="module">
    var swiper = new Swiper("#carousel_home_weblink", {
                  slidesPerView: 7,
                  loop: false,
                  slidesPerGroup: 7,
                  spaceBetween: 20,
                  autoplay: {
                    delay: 4000,
                  },
                  navigation: {
                    nextEl: ".weblink-button-next",
                    prevEl: ".weblink-button-prev",
                  },
      <?php if (get_field('setting_theme', 'option') == 'six' ) : ?>
                  pagination: {
                   el: ".swiper-pagination",
                 },
              <?php endif; ?>
                  breakpoints: {
                     320: {
                       slidesPerView: 2,
                       spaceBetween: 20,
                     },
                     768: {
                       slidesPerView: 4,
                       spaceBetween: 20,
                     },
                     1024: {
                       slidesPerView:7,
                       spaceBetween: 20,
                     },
                   },
             });

    </script>

    <?php else : ?>
      <img src="<?php echo plugin_dir_url(__DIR__) . 'image/weblink-preview.jpg'; ?>" alt="b1-01">
    <?php endif; ?>

  <?php

    $output_string = ob_get_contents();
    ob_end_clean();
    echo $output_string;
  }

  protected function _content_template()
  {
    ob_start();
  ?>
    <img src="<?php echo plugin_dir_url(__DIR__) . 'image/weblink-preview.jpg'; ?>" alt="b1-01">
<?php
    $output_string = ob_get_contents();
    ob_end_clean();
    echo $output_string;
  }
}
