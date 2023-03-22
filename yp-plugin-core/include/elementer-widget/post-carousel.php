<?php

namespace Elementor;

class post_carousel extends Widget_Base
{

  public function get_name()
  {
    return 'post_carousel';
  }

  public function get_title()
  {
    return __('Post Carousel');
  }

  public function get_icon()
  {
    return 'eicon-slides';
  }

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);

    wp_enqueue_style('vc_post_carousel', plugin_dir_url(__DIR__) . 'css/post_carousel.css', '1.1.0');
  }

  protected function _register_controls()
  {
    $mine = array();
    if (function_exists( 'pll_the_languages' )) {
        $lang = pll_get_post_language(get_the_ID());
    }
    else {
        $lang = '';
    }
    $categories = get_terms([
    'taxonomy' => 'category',
    'hide_empty' => false,
    'orderby'   => 'name',
    'lang' => $lang,
    'order'     => 'ASC'
    ]);

    foreach ($categories as $category) {
      $mine[$category->term_id] = $category->name;
    }

    $this->start_controls_section(
      'content_section',
      [
        'label' => __('Content', 'post-plus'),
        'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    $this->add_control(
        'vtitle',
        [
          'type' => \Elementor\Controls_Manager::TEXT,
          'label' => esc_html__( 'Title', 'yp-core' ),
          'default' => __( 'Activities', 'yp-core' ),
          'placeholder' => __( 'Title', 'yp-core' ),
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

    // Post categories.
    $this->add_control(
      'category',
      [
        'label'    => '<i class="fa fa-folder"></i> ' . __('Category', 'yp-core'),
        'type'     => \Elementor\Controls_Manager::SELECT2,
        'default'  => 'none',
        'options'  => $mine,
        'multiple' => false,
      ]
    );

    $this->add_responsive_control(
      'column',
      [
        'type' => \Elementor\Controls_Manager::TEXT,
        'label' => esc_html__( 'Column', 'yp-core' ),

        'devices' => [ 'desktop', 'tablet', 'mobile' ],
        'desktop_default' => 4,
        'tablet_default' => 3,
        'mobile_default' => 2,
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
    'desktop_default' => 15,
    'tablet_default' => 15,
    'mobile_default' => 15,
    // 'selectors' => [
    // 	'{{WRAPPER}} .widget-image' => 'margin-bottom: {{SIZE}}{{UNIT}};',
    // ],
  ]
);

    $this->add_control(
      'auto_play',
      [
        'label' => esc_html__( 'Autoplay', 'yp-core' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__( 'Yes', 'yp-core' ),
        'label_off' => esc_html__( 'No', 'yp-core' ),
        'return_value' => 'yes',
        'default' => 'no',
      ]
    );

    $this->add_control(
      'pagination',
      [
        'label' => esc_html__( 'Pagination', 'yp-core' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__( 'Show', 'yp-core' ),
        'label_off' => esc_html__( 'Hide', 'yp-core' ),
        'return_value' => 'yes',
        'default' => 'yes',
      ]
    );
    // $this->add_control(
    //   'pagination_position',
    //   [
    //     'label' => esc_html__( 'Pagination Position', 'yp-core' ),
    //     'type' => \Elementor\Controls_Manager::SELECT,
    //     'default' => 'outside_pagination',
    //     'options' => [
    //       'outside_pagination' => esc_html__( 'Outside', 'yp-core' ),
    //       'inside_pagination'  => esc_html__( 'Inside', 'yp-core' ),
    //     ],
    //   ]
    // );

    $this->add_control(
      'pagination_number',
      [
        'label' => esc_html__( 'Pagination Number', 'yp-core' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__( 'Show', 'yp-core' ),
        'label_off' => esc_html__( 'Hide', 'yp-core' ),
        'return_value' => 'yes',
        'default' => 'no',
      ]
    );


    $this->add_control(
      'center_mode',
      [
        'label' => esc_html__( 'Center Mode', 'yp-core' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__( 'Yes', 'yp-core' ),
        'label_off' => esc_html__( 'No', 'yp-core' ),
        'return_value' => 'yes',
        'default' => 'no',
      ]
    );

    $this->add_control(
      'arrow',
      [
        'label' => esc_html__( 'Arrow', 'yp-core' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__( 'Show', 'yp-core' ),
        'label_off' => esc_html__( 'Hide', 'yp-core' ),
        'return_value' => 'yes',
        'default' => 'yes',
      ]
    );

    // $this->add_control(
    //   'arrow_position',
    //   [
    //     'label' => esc_html__( 'Arrow Position', 'yp-core' ),
    //     'type' => \Elementor\Controls_Manager::SELECT,
    //     'default' => 'outside_arrow',
    //     'options' => [
    //       'outside_arrow' => esc_html__( 'Outside', 'yp-core' ),
    //       'inside_arrow'  => esc_html__( 'Inside', 'yp-core' ),
    //     ],
    //   ]
    // );

    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    $offset   = $settings['post_offset'];

    $column_desktop = $settings['column'];
    $column_tablet = $settings['column_tablet'];
    $column_mobile = $settings['column_mobile'];
    $autoplay = $settings['auto_play'];
    $pagination_number = $settings['pagination_number'];
    $slide_list = $settings['slide_list'];
    $space_between_desktop = $settings['space_between'];
    $space_between_tablet = $settings['space_between_tablet'];
    $space_between_mobile = $settings['space_between_mobile'];

    if ($offset == '') {
      $offset = 0;
    }
    $widget_id = $this->get_id();
    // print_r($settings['category']);
?>

    <div class="vc_postx card v-post_carousel">
      <div class="head-tab">
        <div class="p-title">
          <h3><?php echo $settings['vtitle']; ?></h3>
        </div>

        <a href="?go_posts_terms=<?php echo $settings['category']; ?>" class="vc-view-more" role="button">
          <span><?php yp_text('ดูทั้งหมด','See All'); ?></span>
         </a>
      </div>


        <div class="vc_posts-wrapper vc_post_carousel-s">

          <div class="swiper vc_post_carousel outside id-<?php echo $widget_id; ?>">
              <div class="swiper-wrapper">
              <?php
              $args = [
                'post_type'      => ['post'],
                'tax_query'      => [
                  [
                    'taxonomy' => 'category',
                    'field'    => 'term_id',
                    'terms'    => $settings['category'],
                  ],
                ],
                'offset'        => $offset,
                'posts_per_page' => $settings['per_posts'],
                'orderby'        => 'date',
                'order'          => 'DESC',
              ];
              query_posts($args);

              ?>
              <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                  <div class="swiper-slide">
                      <?php get_template_part( 'template-parts/content', 'card-post'); ?>
                  </div>
                <?php endwhile; ?>
              <?php else: ?>
                <p><?php yp_text('ไม่มีข้อมูล','No Data'); ?></p>
              <?php endif; ?>
              <?php wp_reset_query(); ?>
            </div>
          </div>
        <?php if ($settings['arrow'] == 'yes'): ?>
          <div class="swiper-button-prev">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
              <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
          </div>
          <div class="swiper-button-next">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
              <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
          </div>
        <?php endif; ?>
        <?php if ($settings['pagination'] == 'yes'): ?>
          <div class="swiper-pagination id-<?php echo $widget_id; ?>"></div>
       <?php endif; ?>
        </div>

    </div>

    <script type="module">
    var swiper = new Swiper(".vc_post_carousel.id-<?php echo $widget_id; ?>", {
      slidesPerView: <?php echo $column_desktop; ?>,
      allowTouchMove: true,
      <?php if ($settings['center_mode'] != 'yes'): ?>
      slidesPerGroup: <?php echo $column_desktop; ?>,
     <?php endif; ?>

      spaceBetween: <?php echo $space_between_desktop; ?>,
      <?php if ($autoplay == 'yes'): ?>
        autoplay: {
         delay: 3000,
       },
      <?php endif; ?>

      <?php if($settings['center_mode']  == 'yes'): ?>
            centeredSlides: true,
      <?php endif; ?>

      loop: true,


      <?php if ($settings['pagination'] == 'yes'): ?>
      pagination: {
        el: ".id-<?php echo $widget_id; ?>.swiper-pagination",
        clickable: true,
        <?php if ($pagination_number == 'yes') {
          echo 'type: "fraction"';
        } ?>
      },
      <?php endif; ?>
      autoHeight: true,
      <?php if ($settings['arrow'] == 'yes'): ?>
      navigation: {
        nextEl: ".id-<?php echo $widget_id; ?> .swiper-button-next",
        prevEl: ".id-<?php echo $widget_id; ?> .swiper-button-prev",
      },
      <?php endif; ?>
      breakpoints: {
         320: {
           slidesPerView: <?php echo $column_mobile; ?>,
           slidesPerGroup: <?php echo $column_mobile; ?>,
           spaceBetween: <?php echo $space_between_mobile; ?>,
         },
         768: {
           slidesPerView: <?php echo $column_tablet; ?>,
           slidesPerGroup: <?php echo $column_tablet; ?>,
           spaceBetween: <?php echo $space_between_tablet; ?>,
         },
         1024: {
           slidesPerView: <?php echo $column_desktop; ?>,
           <?php if ($settings['center_mode'] != 'yes'): ?>
           slidesPerGroup: <?php echo $column_desktop; ?>,
          <?php endif; ?>
           spaceBetween: <?php echo $space_between_desktop; ?>,
         },
       },
    });
    </script>
<?php
  }

  protected function _content_template()
  {
  }
}
