<?php
namespace Elementor;

class post_tab_v1 extends Widget_Base
{

  public function get_name()
  {
    return 'post_tab_v1';
  }

  public function get_title()
  {
    return __('Post Tab V1');
  }

  public function get_icon()
  {
    return 'eicon-post-list';
  }

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);

    // wp_enqueue_style('vc_post_tab_v1', plugin_dir_url(__DIR__) . '../css/post-tab/post-tab-v1.css', '1.1.0');
  }

  public function get_style_depends() {
    // wp_register_style( 'vc_post_tab_v1', plugin_dir_url( __DIR__  ) . 'css/carousel_image_link.css','1.1.0');
    wp_register_style('vc_post_tab_v1', plugin_dir_url(__DIR__) . '../css/post-tab/post-tab-v1.css', '1.1.0');
    return [ 'vc_post_tab_v1' ];
  }

  protected function register_controls()
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
          'default' => __( 'Announcement', 'yp-core' ),
          'placeholder' => __( 'Title', 'yp-core' ),
        ]
      );

      $repeater = new \Elementor\Repeater();
      $repeater->add_control(
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
        'tab_item',
        [
          'label' => esc_html__( 'Tab item', 'yp-core' ),
          'type' => \Elementor\Controls_Manager::REPEATER,
          'fields' => $repeater->get_controls(),
          'default' => [
            [
              'category' => '',
            ],
          ],
        ]
      );


    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    $offset   = $settings['post_offset'];
    $tab_item = $settings['tab_item'];

    if ($offet == '') {
      $offet = 0;
    }

    // $term_all = get_term_by('id', $settings['category'][0], 'category');

    // print_r($settings['category']);
?>

    <div class="vc_postx card post-tab-v1" data-nav="post-tab-v1">
      <div class="head-tab">
        <a href="?go_posts_terms=<?php echo $tab_item[0]['category']; ?>" class="vc-view-more" role="button">
          <span><?php yp_text('ดูทั้งหมด','See All'); ?></span>
         </a>
        <div class="p-title">
          <h3><?php echo $settings['vtitle']; ?></h3>
        </div>
        <div class="nav-sub-term-yp">
          <ul>
            <?php
            $i = 0;
            foreach ($tab_item as $sub_term_id) :
              $sub_term_id = $sub_term_id['category'];
              $i++;
              $term_in     = get_term_by('id', $sub_term_id, 'category');
            ?>
              <li class="<?php if ($i == 1) {
                            echo "active";
                          } ?>" data-id="<?php echo $sub_term_id; ?>" data-nav="post-tab-v1">
                <?php echo $term_in->name; ?></li>
            <?php endforeach; ?>
          </ul>
        </div>

      </div>

      <?php
      $i = 0;
      foreach ($tab_item as $term_id) :
        $term_id = $term_id['category'];
        $i++;
      ?>
      <div class="content-post-tab-yp	<?php if ($i == 1) { echo "active"; } ?>" data-id="<?php echo $term_id; ?>">
          <div class="vc_posts-wrapper vc_post_tab_v1">
            <div class="left">
              <?php
              $args = [
                'post_type'      => ['post'],
                'tax_query'      => [
                  [
                    'taxonomy' => 'category',
                    'field'    => 'term_id',
                    'terms'    => $term_id,
                  ],
                ],
                'posts_per_page' => 1,
                'orderby'        => 'date',
                'order'          => 'DESC',
              ];
              query_posts($args);

              ?>
              <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                  <?php
                      $term = get_the_category(get_the_ID());
                      get_template_part( 'template-parts/content', 'card-post');
                   ?>
                <?php endwhile; ?>
              <?php else: ?>
                <p><?php yp_text('ไม่มีข้อมูล','No Data'); ?></p>
              <?php endif; ?>
              <?php wp_reset_query(); ?>
            </div>
            <div class="right">
              <?php
              $args = [
                'post_type'      => ['post'],
                'tax_query'      => [
                  [
                    'taxonomy' => 'category',
                    'field'    => 'term_id',
                    'terms'    => $term_id,
                  ],
                ],
                'offset' => 1,
                'posts_per_page' => 3,
                'orderby'        => 'date',
                'order'          => 'DESC',
              ];
              query_posts($args);

              ?>
              <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                  <?php
                      $term = get_the_category(get_the_ID());
                      get_template_part( 'template-parts/content', 'card-post');
                   ?>
                <?php endwhile; ?>
              <?php endif; ?>
              <?php wp_reset_query(); ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

    </div>
<?php
  }

  protected function _content_template()
  {
  }
}
