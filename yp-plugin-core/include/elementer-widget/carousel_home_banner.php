<?php

namespace Elementor;

class carousel_home_banner extends Widget_Base
{

  public function get_name()
  {
    return 'carousel_home_banner';
  }

  public function get_title()
  {
    return __('TOP BANNER');
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

  protected function register_controls()
  {

    $this->start_controls_section(
      'content_section',
      [
        'label' => __( 'Content', 'post-plus' ),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    $this->add_control(
      'pagination_number',
      [
        'label' => esc_html__( 'Pagination Number', 'plugin-name' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__( 'Show', 'yp' ),
        'label_off' => esc_html__( 'Hide', 'yp' ),
        'return_value' => 'yes',
        'default' => 'yes',
      ]
    );


  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    $pagination_number = $settings['pagination_number'];
    $widget_id = $this->get_id();
    ob_start();
?>
    <?php if ($_GET['action'] == '') : ?>

      <div class="carousel_home_banner i-<?php echo $widget_id; ?> swiper vc_banner">

        <div class="swiper-wrapper">
          <?php if (have_rows('image_slider', 'option')) : ?>
            <?php while (have_rows('image_slider', 'option')) : the_row(); ?>
              <?php

              if (get_locale() == 'th') {
                $gallery_main_banner = get_sub_field('image_h', 'option');
              }
              else {
                $gallery_main_banner = get_sub_field('image_h_en', 'option');
              }
              $link = get_sub_field('link', 'option');
              if ($link) {
                $link_url = $link;
              }


              $show_date = date('Y-m-d');
              $show_date = date('Y-m-d', strtotime($show_date));
              //echo $show_date; // echos today!
              $getDateBegin = date('Y-m-d', strtotime(get_sub_field('start_date')));
              $getDateEnd = date('Y-m-d', strtotime(get_sub_field('end_date')));

              ?>

              <?php if (get_sub_field('on_off', 'option') != '') : ?>

                <?php if (($show_date >= $getDateBegin) && ($show_date <= $getDateEnd)) : ?>
                  <div class="swiper-slide">
                    <div class="text-center">
                      <?php if (!empty($link)) : ?>
                        <a href="<?php echo $link_url; ?>" target="_blank">
                          <img class="thumbnail-content" src="<?php echo $gallery_main_banner['url']; ?>" alt="<?php echo $gallery_main_banner['title']; ?>">
                        </a>
                      <?php endif ?>
                      <?php if (empty($link)) : ?>
                        <img class="thumbnail-content" src="<?php echo $gallery_main_banner['url']; ?>" alt="<?php echo $gallery_main_banner['title']; ?>">
                      <?php endif ?>
                    </div>
                  </div>
                <?php endif; ?>

              <?php endif; ?>

            <?php endwhile; ?>
          <?php endif; ?>

        </div>
        <div class="swiper-pagination"></div>
        <!-- <div class="swiper-button-prev"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
            <polyline points="15 18 9 12 15 6"></polyline>
          </svg>
        </div>
        <div class="swiper-button-next"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
            <polyline points="9 18 15 12 9 6"></polyline>
          </svg>
        </div> -->
      </div>


      <?php
      $banner_speed = get_field('banner_speed','option');
      if ($banner_speed == '') {
        $banner_speed = '4000';
      }
      else {
          $banner_speed = get_field('banner_speed','option')*1000;
      }

       ?>
      <script type="module">
      var swiper = new Swiper(".carousel_home_banner.i-<?php echo $widget_id; ?>", {
        slidesPerView: 1,
        speed: 700,
        spaceBetween: 0,
        autoplay: {
         delay: <?php echo $banner_speed;?>,
         disableOnInteraction: false,
         pauseOnMouseEnter: true,
       },
        loop: true,
        pagination: {
          el: ".carousel_home_banner.i-<?php echo $widget_id; ?> .swiper-pagination",
          clickable: true,
          <?php if ($pagination_number == 'yes') {
            echo 'type: "fraction"';
          } ?>

        },
        allowTouchMove: true,
        autoHeight: true,
        // effect: 'fade',
        // fadeEffect: {
        //   crossFade: true
        // },
        // navigation: {
        //   nextEl: ".carousel_home_banner.i-<php echo $widget_id; ?> .swiper-button-next",
        //   prevEl: ".carousel_home_banner.i-<php echo $widget_id; ?> .swiper-button-prev",
        // },
      });


      </script>



      <div class="carousel_home_banner-m i-<?php echo $widget_id; ?> swiper vc_banner">

        <div class="swiper-wrapper">
          <?php if (have_rows('image_slider', 'option')) : ?>
            <?php while (have_rows('image_slider', 'option')) : the_row(); ?>
              <?php
              if (get_locale() == 'th') {
                $gallery_main_banner = get_sub_field('image_m', 'option');
              }
              else {
                $gallery_main_banner = get_sub_field('image_m_en', 'option');
              }

              $link = get_sub_field('link', 'option');
              if ($link) {
                $link_url = $link;
              }


              $show_date = date('Y-m-d');
              $show_date = date('Y-m-d', strtotime($show_date));
              //echo $show_date; // echos today!
              $getDateBegin = date('Y-m-d', strtotime(get_sub_field('start_date')));
              $getDateEnd = date('Y-m-d', strtotime(get_sub_field('end_date')));

              ?>

              <?php if (get_sub_field('on_off', 'option') != '') : ?>

                <?php if (($show_date >= $getDateBegin) && ($show_date <= $getDateEnd)) : ?>
                  <div class="swiper-slide">
                    <div class="text-center">
                      <?php if (!empty($link)) : ?>
                        <a href="<?php echo $link_url; ?>" target="_blank">
                          <img class="thumbnail-content" src="<?php echo $gallery_main_banner['url']; ?>" alt="<?php echo $gallery_main_banner['title']; ?>">
                        </a>
                      <?php endif ?>
                      <?php if (empty($link)) : ?>
                        <img class="thumbnail-content" src="<?php echo $gallery_main_banner['url']; ?>" alt="<?php echo $gallery_main_banner['title']; ?>">
                      <?php endif ?>
                    </div>
                  </div>
                <?php endif; ?>

              <?php endif; ?>

            <?php endwhile; ?>
          <?php endif; ?>

        </div>
        <div class="swiper-pagination"></div>
        <!-- <div class="swiper-button-prev"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
            <polyline points="15 18 9 12 15 6"></polyline>
          </svg>
        </div>
        <div class="swiper-button-next"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
            <polyline points="9 18 15 12 9 6"></polyline>
          </svg>
        </div> -->
      </div>


      <?php
      $banner_speed = get_field('banner_speed','option');
      if ($banner_speed == '') {
        $banner_speed = '4000';
      }
      else {
          $banner_speed = get_field('banner_speed','option')*1000;
      }

       ?>
      <script type="module">
      var swiper = new Swiper(".carousel_home_banner-m.i-<?php echo $widget_id; ?>", {
        slidesPerView: 1,
        spaceBetween: 0,
        speed: 700,
        autoplay: {
         delay: <?php echo $banner_speed;?>,
         disableOnInteraction: false,
         pauseOnMouseEnter: true,
       },
        loop: true,
        pagination: {
          el: ".carousel_home_banner-m.i-<?php echo $widget_id; ?> .swiper-pagination",
          clickable: true,
          <?php if ($pagination_number == 'yes') {
            echo 'type: "fraction"';
          } ?>

        },
        allowTouchMove: true,
        autoHeight: true,
        // effect: 'fade',
        // fadeEffect: {
        //   crossFade: true
        // },
        // navigation: {
        //   nextEl: ".carousel_home_banner.i-<php echo $widget_id; ?> .swiper-button-next",
        //   prevEl: ".carousel_home_banner.i-<php echo $widget_id; ?> .swiper-button-prev",
        // },
      });


      </script>
    <?php else : ?>
      <img src="<?php echo plugin_dir_url(__DIR__) . 'image/banner-preview.jpg'; ?>" width="100%" alt="b1-01">
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

    <img src="<?php echo plugin_dir_url(__DIR__) . 'image/banner-preview.jpg'; ?>" width="100%" alt="b1-01">
<?php
    $output_string = ob_get_contents();
    ob_end_clean();
    echo $output_string;
  }
}
