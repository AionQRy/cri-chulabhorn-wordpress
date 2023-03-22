<?php
namespace Elementor;

class post_list extends Widget_Base
{

  public function get_name()
  {
    return 'post_list';
  }

  public function get_title()
  {
    return __('VC Post List');
  }

  public function get_icon()
  {
    return 'eicon-post-list';
  }

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);

    // wp_enqueue_style('vc_post_list', plugin_dir_url(__DIR__) . '../css/post-list.css', '1.1.0');
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
          'default' => __( 'Job', 'yp-core' ),
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
          'default' => __( '3', 'yp-core' ),
          'placeholder' => __( 'เช่น 3', 'yp-core' ),
        ]
      );



    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    // print_r($settings['category']);
        $widget_id = $this->get_id();
?>


    <div class="vc_post_list-wrapper">
        <div class="vtitle">
          <h4><?php echo $settings['vtitle']; ?></h4>
        </div>
          <div class="vc_post_list post-s-list id-<?php echo $widget_id; ?>">
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
                'posts_per_page' => $settings['per_posts'],
                'orderby'        => 'date',
                'order'          => 'DESC',
              ];
              query_posts($args);

              ?>
              <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                      <?php get_template_part( 'template-parts/content', 'card-post'); ?>
                <?php endwhile; ?>
              <?php else: ?>
                <p><?php yp_text('ไม่มีข้อมูล','No Data'); ?></p>
              <?php endif; ?>
              <?php wp_reset_query(); ?>
          </div>

          <div class="btn-main">
            <a href="?go_posts_terms=<?php echo $settings['category']; ?>" class="vc-view-more" role="button">
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
