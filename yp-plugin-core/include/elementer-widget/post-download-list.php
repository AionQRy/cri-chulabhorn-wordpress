<?php

namespace Elementor;

class post_download_list extends Widget_Base
{

  public function get_name()
  {
    return 'post_download_list';
  }

  public function get_title()
  {
    return __('VC Download Lists');
  }

  public function get_icon()
  {
    return 'eicon-post-list';
  }

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);

    wp_enqueue_style('vc_post_download_list', plugin_dir_url(__DIR__) . '/css/post-download-list.css', '1.1.0');
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
    'taxonomy' => 'vc_download_category',
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
          'default' => __( 'Procurement', 'yp-core' ),
          'placeholder' => __( 'Title', 'yp-core' ),
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

    $this->add_control(
        'per_posts',
        [
          'type' => \Elementor\Controls_Manager::TEXT,
          'label' => esc_html__( 'Per Posts', 'yp-core' ),
          'default' => __( '4', 'yp-core' ),
          'placeholder' => __( '4', 'yp-core' ),
        ]
      );

      $this->add_control(
          'post_offset',
          [
            'type' => \Elementor\Controls_Manager::TEXT,
            'label' => esc_html__( 'Offset', 'yp-core' ),
            'default' => __( '', 'yp-core' ),
            'placeholder' => __( '1', 'yp-core' ),
          ]
        );



    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    $offset   = $settings['post_offset'];
    if ($offset == '') {
      $offset = 0;
    }


    // print_r($settings['category']);
?>

    <div class="vc_post_download_list">
        <div class="p-title">
          <h3><?php echo $settings['vtitle']; ?></h3>
        </div>

      <div class="wrap-download-list">
          <div class="download-list">
              <?php
              $args = [
                'post_type'      => ['vc_downloadmanager'],
                'tax_query'      => [
                  [
                    'taxonomy' => 'vc_download_category',
                    'field'    => 'term_id',
                    'terms'    => $settings['category'],
                  ],
                ],
                'offset' => $offset,
                'posts_per_page' => $settings['per_posts'],
                'orderby'        => 'date',
                'order'          => 'DESC',
              ];
              query_posts($args);

              ?>
              <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                  <?php
                  $i = 0;
                  if( have_rows('files_download') ): ?>
                  <?php while( have_rows('files_download') ): the_row();
                  $i++;
                  if ($i > 1) {
                    continue;
                  }
                      get_template_part( 'template-parts/content', 'list-download');
                  endwhile;
                   endif;
                 ?>
                <?php endwhile; ?>
              <?php else: ?>
                <p><?php yp_text('ไม่มีข้อมูล','No Data'); ?></p>
              <?php endif; ?>
              <?php wp_reset_query(); ?>

          </div>
        </div>

        <div class="wrap-view-all btn-main">
          <a href="?go_file_terms=<?php echo $settings['category']; ?>" class="vc-view-more" role="button">
            <span><?php yp_text('ดูทั้งหมด','See All'); ?></span>
          </a>
        </div>

    </div>
<?php
  }

  protected function _content_template()
  {
  }
}
