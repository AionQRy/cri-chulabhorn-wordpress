<?php
namespace Elementor;

class post_procurement_style_1_v1 extends Widget_Base {

    public function get_name() {
		return 'post_procurement_style_1_v1';
	}

	public function get_title() {
		return __( 'ข่าวประกาศ Style 1 V1' );
	}

	public function get_icon() {
		return 'eicon-post-list';
    }

    public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);

      wp_enqueue_style( 'post_procurement_style_1_v1', plugin_dir_url( __DIR__  ) . 'css/post_procurement_style_1_v1.css','1.1.0');
	 }





	protected function _register_controls() {
		$mine = array();
    $categories = get_categories(array(
			'orderby'   => 'name',
			'order'     => 'ASC'
		));

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
        'per_posts',
        [
          'label' => __( 'Posts Per Page', 'yp-core' ),
          'type' => \Elementor\Controls_Manager::TEXT,
          'default' => __( '4', 'yp-core' ),
          'placeholder' => __( 'เช่น 4', 'yp-core' ),
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

        $this->end_controls_section();
		}

	protected function render() {
    $settings = $this->get_settings_for_display();
    $offset = $settings['post_offset'];
    if ($offset == '') {
      $offset = 0;
    }
    $term = get_term( $settings['category'], 'category' );
  ?>

  <div class="procurement-wrap style-1-v1 v-post-loop -list">
    <div class="procurement-title">
      <div class="v-topics">
        <?php yp_text('หัวข้อ','Subject'); ?>
      </div>
      <div class="v-date">
          <?php yp_text('วันที่','Date'); ?>
      </div>
    </div>
  <?php
  $args = array(
  'post_type' => array( 'post'),
  'tax_query'         => array(
         array(
             'taxonomy'  => 'category',
             'field'     => 'term_id',
             'terms'     => $settings['category']
         )
       ),
  'posts_per_page'  =>  $settings['per_posts'],
  'offset'    => $offset,
  'orderby'    => 'date',
  'order'    => 'DESC'
  );
  query_posts( $args );
  ?>
  <?php if ( have_posts()) : ?>
    <?php while ( have_posts() ) : the_post();
    // $term = get_the_category(get_the_ID());
    ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>
    <div class="post-header">
    </div><!-- .entry-header -->

    <div class="post-info">
      <?php
      the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
      ?>
    </div>

  <?php if ( 'post' === get_post_type() ) : ?>
      <div class="entry-meta">
        <span class="post_date">
          <?php echo get_the_date('d M Y'); ?>
        </span>
        <div class="clearfix"></div>
      </div><!-- .entry-meta -->
    <?php endif; ?>

  </article><!-- #post-<?php the_ID(); ?> -->

<?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_query(); ?>



</div>

		<?php
    }

	protected function _content_template() {}


}
