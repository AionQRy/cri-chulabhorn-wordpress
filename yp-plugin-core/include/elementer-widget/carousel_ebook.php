<?php

namespace Elementor;

class carousel_ebook extends Widget_Base
{

  public function get_name()
  {
    return 'carousel_ebook';
  }

  public function get_title()
  {
    return __('VC Ebook Carousel');
  }

  public function get_icon()
  {
    return 'eicon-slides';
  }

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);
    wp_enqueue_style('carousel_ebook', plugin_dir_url(__DIR__) . 'css/carousel_ebook.css', '1.1.0');
  }


  public function get_style_depends() {
     $styles = [ 'carousel_ebook' ];
     return $styles;
   }
  //
  //  public function get_script_depends() {
  //    $scripts = [ 'yp-main-script' ,'yp-splide-video-js'];
  //    return $scripts;
  //  }


  public function get_categories()
  {
    return ['general'];
  }

  protected function _register_controls(){
    $mine = array();
    if (function_exists( 'pll_the_languages' )) {
        $lang = pll_get_post_language(get_the_ID());
    }
    else {
        $lang = '';
    }
    $categories = get_terms([
    'taxonomy' => 'vc_ebook_category',
    'hide_empty' => false,
    'orderby'   => 'name',
    'lang' => $lang,
    'order'     => 'ASC'
    ]);

    foreach ($categories as $category ) {
       $mine[$category->term_id] = $category->name;
    }

    $this->start_controls_section(
      'content_section',
      [
        'label' => __( 'Content', 'post-plus' ),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    // Post categories.
    $this->add_control(
      'category',
      [
        'label' => '<i class="fa fa-folder"></i> ' . __( 'Category', 'yp-core' ),
        'type' => \Elementor\Controls_Manager::SELECT2,
        'default' => 'none',
        'options'   => $mine,
        'multiple' => false,
      ]
    );

    $this->add_control(
        'title',
        [
          'label' => __( 'Title', 'yp-core' ),
          'type' => \Elementor\Controls_Manager::TEXT,
          'default' => __( 'CRT', 'yp-core' ),
          'placeholder' => __( 'เช่น CRT', 'yp-core' ),
        ]
      );

      $this->add_control(
          'sub_title',
          [
            'label' => __( 'Sub Title', 'yp-core' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Newsletter', 'yp-core' ),
            'placeholder' => __( 'เช่น Newsletter', 'yp-core' ),
          ]
        );

    $this->add_control(
        'per_posts',
        [
          'label' => __( 'Posts Per Page', 'yp-core' ),
          'type' => \Elementor\Controls_Manager::TEXT,
          'default' => __( '5', 'yp-core' ),
          'placeholder' => __( 'เช่น 5', 'yp-core' ),
        ]
      );


      $this->add_responsive_control(
    'space_between',
    [
      'type' => \Elementor\Controls_Manager::TEXT,
      'label' => esc_html__( 'Spacing', 'yp-core' ),
      // 'range' => [
      // 	'px' => [
      // 		'min' => 0,
      // 		'max' => 100,
      // 	],
      // ],
      'devices' => [ 'desktop', 'tablet', 'mobile' ],
      'desktop_default' => 30,
      'tablet_default' => 20,
      'mobile_default' => 20,
      // 'selectors' => [
      // 	'{{WRAPPER}} .widget-image' => 'margin-bottom: {{SIZE}}{{UNIT}};',
      // ],
    ]
  );

      $this->add_responsive_control(
        'column',
        [
          'type' => \Elementor\Controls_Manager::TEXT,
          'label' => esc_html__( 'Column', 'yp-core' ),

          'devices' => [ 'desktop', 'tablet', 'mobile' ],
          'desktop_default' => 1,
          'tablet_default' => 1,
          'mobile_default' => 1,
        ]
      );

      $this->add_control(
          'post_offset',
          [
            'label' => __( 'Offset', 'yp-core' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( '', 'yp-core' ),
            'placeholder' => __( 'เช่น 1', 'yp-core' ),
          ]
        );

  }

    protected function render() {
      // $setting_theme = get_field('setting_theme', 'option');
      $settings = $this->get_settings_for_display();
      $pagination_number = $settings['pagination_number'];

        $widget_id = $this->get_id();
        $offset = $settings['post_offset'];
        if ($offset == '') {
          $offset = 0;
        }
        $column_desktop = $settings['column'];
        $column_tablet = $settings['column_tablet'];
        $column_mobile = $settings['column_mobile'];

        $space_between_desktop = $settings['space_between'];
        $space_between_tablet = $settings['space_between_tablet'];
        $space_between_mobile = $settings['space_between_mobile'];
  ?>
      <?php if ($_GET['action'] == '') : ?>
        <?php

          $args = array(
            'post_type' => array('vc_ebook'),
            'tax_query'         => array(
              array(
                'taxonomy'  => 'vc_ebook_category',
                'field'     => 'term_id',
                'terms'     => $settings['category']
              )
            ),
            'posts_per_page'  => $settings['per_posts'],
            'offset'    => $offset,
            'orderby'    => 'date',
            'order'    => 'DESC'
          );
        query_posts( $args );
        ?>

        <?php if ( have_posts()) : ?>
          <div class="cpt-newsletter v-light">
              <div class="grid-box ">
                  <div class="column-1 id-<?php echo $widget_id; ?>">
                      <div class="wrap-title">
                        <div class="title">
                            <div class="head-h2 t-1"><?php echo $settings['title']; ?></div>
                            <div class="head-h2 t-2"><?php echo $settings['sub_title']; ?></div>
                        </div>
                        <div class="btn-read_all">
                            <a href="?go_ebook_terms=<?php echo $settings['category']; ?>" class="link-read_all"><?php yp_text('ดูทั้งหมด','See All'); ?></a>
                        </div>
                      </div>


                      <div class="swiper-pagination-box"></div>
                      <div class="vc_new_arrow .id-<?php echo $widget_id; ?>">
                        <div class="swiper-button-prev vc-nav">
                          <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                            <polyline points="15 18 9 12 15 6"></polyline>
                          </svg>
                        </div>
                        <div class="swiper-button-next vc-nav">
                          <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                            <polyline points="9 18 15 12 9 6"></polyline>
                          </svg>
                        </div>
                      </div>
                  </div>
                  <div class="column-2">
           <!-- Swiper -->
              <div class="swiper carousel_home_ebook id-<?php echo $widget_id; ?>">
                <div class="swiper-wrapper">
          <?php while ( have_posts() ) : the_post(); ?>
            <div class="swiper-slide">
                <article class="article-cpt">
                    <div class="article-box">
                        <div class="feature-image_box">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <div class="overlay-img">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                </div>
                                <?php if(has_post_thumbnail()) { the_post_thumbnail();} else { echo '<img src="' . esc_url( get_template_directory_uri()) .'/img/thumb.jpg" alt="'. get_the_title() .'" />'; }?>
                            </a>
                        </div>
                        <div class="info-box">
                            <div class="head-post_h2">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php
                                        $term_list = get_the_terms(get_the_ID(), 'vc_ebook_category');
                                        echo $term_list[0]->name;
                                     ?>
                                </a>
                            </div>
                            <div class="detail-post_p">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
              <?php endwhile; ?>
              <?php wp_reset_query(); ?>
            </div>

          </div>
        </div>
      </div>
    </div>


  <script type="module">
        var swiper = new Swiper(".carousel_home_ebook.id-<?php echo $widget_id; ?>", {
          slidesPerView: <?php echo $settings['column']; ?>,
          spaceBetween: <?php echo $space_between_desktop; ?>,
          loop: true,
          autoplay: {
            delay: 5000,
          },
          navigation: {
            nextEl: ".id-<?php echo $widget_id; ?> .swiper-button-next",
            prevEl: ".id-<?php echo $widget_id; ?> .swiper-button-prev",
          },
          pagination: {
           el: ".cpt-newsletter .column-1.id-<?php echo $widget_id; ?> .swiper-pagination-box",
           clickable: true,
           type: "fraction",
      /*Return bullets as numbers*/
           renderBullet: function (index, className) {
             return '<span class="' + className + '">' + (index + 1) + "</span>";
           },
           },
          autoHeight: true,
           breakpoints: {
              320: {
                slidesPerView: <?php echo $column_mobile; ?>,
                spaceBetween: <?php echo $space_between_mobile; ?>,
              },
              768: {
                slidesPerView: <?php echo $column_tablet; ?>,
                spaceBetween: <?php echo $space_between_tablet; ?>,
              },
              1024: {
                slidesPerView: <?php echo $column_desktop; ?>,
                spaceBetween: <?php echo $space_between_desktop; ?>,
              },
            },
        });


        </script>
      <?php else : ?>
        <img src="<?php echo plugin_dir_url(__DIR__) . 'image/post-preview.jpg'; ?>" alt="preview">
      <?php endif; ?>
    <?php endif; ?>
    <?php
    }

    protected function _content_template()
    {
      ob_start();
    ?>
      <img src="<?php echo plugin_dir_url(__DIR__) . 'image/post-preview.jpg'; ?>" alt="preview">
  <?php
      $output_string = ob_get_contents();
      ob_end_clean();
      echo $output_string;
    }
  }
