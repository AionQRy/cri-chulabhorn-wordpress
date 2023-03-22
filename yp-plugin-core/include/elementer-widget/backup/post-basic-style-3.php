<?php
namespace Elementor;

class post_basic_style_3 extends Widget_Base {

    public function get_name() {
		return 'post_basic_style_3';
	}

	public function get_title() {
		return __( 'Post Basic Style 3' );
	}

	public function get_icon() {
		return 'eicon-post-list';
    }

    public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);

      wp_enqueue_style( 'post_basic_style_3', plugin_dir_url( __DIR__  ) . 'css/post-basic-style-3.css','1.1.0');
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





        $this->end_controls_section();
		}

	protected function render() {
    $settings = $this->get_settings_for_display();
    $term_all = get_term_by('id', $settings['category'], 'category');
?>

    <div class="vc_posts card post-basic-style-3">
        <div class="vc_posts-wrapper">
          <div class="post-left v-post-loop">
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
            'posts_per_page'  => 1,
            'orderby'    => 'date',
            'order'    => 'DESC'
            );
            query_posts( $args );
            ?>
            <?php if ( have_posts()) : ?>
              <?php while ( have_posts() ) : the_post(); ?>
                <?php $term = get_the_category(get_the_ID()); ?>

                      <div class="vcps-item">
                        <div class="featured-croped">
                          <a href="<?php the_permalink(); ?>">
                            <div class="wrap-thumb">
                              <?php if(has_post_thumbnail()) { the_post_thumbnail();} else { echo '<img src="' . esc_url( get_template_directory_uri()) .'/img/thumb.jpg" alt="'. get_the_title() .'" />'; }?>
                            </div>
                          </a>
                        </div>

                        <div class="vcps-info">
                          <h3 class="link-name">
                            <a href="<?php the_permalink(); ?>">
                              <?php the_title(); ?>
                            </a>
                          </h3>

                          <div class="entry-meta">
                    				<span class="post_date">
                    					<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                    					<?php echo get_the_date(); ?>
                    				</span>
                    				<span class="post_view">
                    					<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                    					<?php echo do_shortcode('[post-views]'); ?>
                    					<?php if (get_locale() == 'th'): ?>
                    						<?php echo 'ครั้ง'; ?>
                    						<?php else: ?>
                    						<?php echo 'Views'; ?>
                    					<?php endif; ?>
                    				</span>
                    				<div class="clearfix"></div>
                    			</div><!-- .entry-meta -->

                          <div class="clearfix"></div>
                        </div>
                      </div>
              <?php endwhile; ?>
              <?php endif; ?>
              <?php wp_reset_query(); ?>

          </div>
          <div class="post-right">
            <div class="in-post-right v-post-loop -list">


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
            'posts_per_page'  => 6,
            'offset'    => 1,
            'orderby'    => 'date',
            'order'    => 'DESC'
            );
            query_posts( $args );
            ?>
            <?php if ( have_posts()) : ?>
              <?php while ( have_posts() ) : the_post(); ?>


            <article id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>
            	<div class="post-header">
            		<a href="<?php the_permalink(); ?>" rel="bookmark">
            			<div class="wrap-thumb">
            				<?php if(has_post_thumbnail()) { the_post_thumbnail();} else { echo '<img src="' . esc_url( get_template_directory_uri()) .'/img/thumb.jpg" alt="'. get_the_title() .'" />'; }?>
            			</div>
            		</a>
            	</div><!-- .entry-header -->

            	<div class="post-info">
            		<?php
            		the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );

            		if ( 'post' === get_post_type() ) :
            			?>
            			<div class="entry-meta">
            				<span class="post_date">
            					<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
            					<?php echo get_the_date(); ?>
            				</span>
            				<span class="post_view">
            					<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
            					<?php echo do_shortcode('[post-views]'); ?>
            					<?php if (get_locale() == 'th'): ?>
            						<?php echo 'ครั้ง'; ?>
            						<?php else: ?>
            						<?php echo 'Views'; ?>
            					<?php endif; ?>
            				</span>
            				<div class="clearfix"></div>
            			</div><!-- .entry-meta -->
            		<?php endif; ?>


            	</div>

            </article><!-- #post-<?php the_ID(); ?> -->

          <?php endwhile; ?>
          <?php endif; ?>

          </div>

          <?php wp_reset_query(); ?>

            <a href="?go_posts_terms=<?php echo $settings['category']; ?>" class="read_more btn btn-green">
              <?php yp_text('อ่านทั้งหมด','View All'); ?>
            </a>

          </div>


      </div>
    </div>


		<?php
    }

	protected function _content_template() {}


}
