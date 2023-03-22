<?php

namespace Elementor;

class post_tab_style_2 extends Widget_Base
{

  public function get_name()
  {
    return 'post_tab_style_2';
  }

  public function get_title()
  {
    return __('Post Tab Style 2');
  }

  public function get_icon()
  {
    return 'eicon-post-list';
  }

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);

    wp_enqueue_style('vc_post_tab_style_2', plugin_dir_url(__DIR__) . '../css/post-tab/post-tab-style-2.css', '1.1.0');
  }

  protected function _register_controls()
  {
    $mine       = [];
    $categories = get_categories([
      'orderby'    => 'name',
      'hide_empty' => 0,
      // 'parent'     => 0,
      'order'      => 'ASC',
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

    // Post categories.
    $this->add_control(
      'category',
      [
        'label'    => '<i class="fa fa-folder"></i> ' . __('Category', 'yp-core'),
        'type'     => \Elementor\Controls_Manager::SELECT2,
        'default'  => 'none',
        'options'  => $mine,
        'multiple' => true,
      ]
    );



    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    $offset   = $settings['post_offset'];
    if ($offet == '') {
      $offet = 0;
    }

    $term_all = get_term_by('id', $settings['category'][0], 'category');

    // print_r($settings['category']);
?>

    <div class="vc_postx card post-tab-style-2" data-nav="post-tab-style-2">
      <div class="p-title">
        <h3><?php echo $term_all->name; ?></h3>
      </div>

      <div class="nav-sub-term-yp">
        <ul>
          <?php
          $i = 0;
          foreach ($settings['category'] as $sub_term_id) :
            $i++;
            $term_in     = get_term_by('id', $sub_term_id, 'category');
          ?>
            <li class="<?php if ($i == 1) {
                          echo "active";
                        } ?>" data-id="<?php echo $sub_term_id; ?>" data-nav="post-tab-style-2">
              <?php echo $term_in->name; ?></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <?php
      $i = 0;
      foreach ($settings['category'] as $term_id) :
        $i++;
      ?>

        <div class="content-post-tab-yp	<?php if ($i == 1) { echo "active"; } ?>" data-id="<?php echo $term_id; ?>">



          <div class="vc_posts-wrapper vc_post_tab_style_2">
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
              'posts_per_page' => 4,
              'orderby'        => 'date',
              'order'          => 'DESC',
            ];
            query_posts($args);

            ?>
            <?php if (have_posts()) : ?>
              <?php while (have_posts()) : the_post(); ?>
                <?php $term = get_the_category(get_the_ID()); ?>

                <article id="post-<?php the_ID(); ?>" class="card-post_m card-recent_post">
                	<div class="post-header">
                		<a href="<?php the_permalink(); ?>" rel="bookmark">
                				<?php if(has_post_thumbnail()) { the_post_thumbnail();} else { echo '<img src="' . esc_url( get_template_directory_uri()) .'/img/thumb.jpg" alt="'. get_the_title() .'" />'; }?>
                		</a>
                    <?php if (get_field('setting_theme', 'option') == 'six') : ?>
                      <div class="overlay_theme_6">
                        <a href="<?php the_permalink(); ?>"><?php yp_text('อ่านเพิ่มเติม','View more'); ?></a>
                      </div>
                    <?php endif; ?>
                    <?php in_thumb(); ?>
                	</div><!-- .entry-header -->

                	<div class="post-info">


                        <div class="title-head_card">


                            <?php
                            the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
                            ?>
                        </div>

                        <?php if (get_field('setting_theme', 'option') == 'six') : ?>
                          <div class="p_excerpt">
                            <?php the_excerpt(); ?>
                          </div>
                        <?php endif; ?>


                      <?php if (get_field('setting_theme', 'option') != 'six') : ?>
                        <div class="date-post_card">
                            <?php   $post_date = get_the_date( 'd M Y' ); ?>
                            <span class="date-post_card">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="#0074bc" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                <span class="text-card"><?php echo $post_date; ?></span>
                            </span>
                      <span class="post_view">
                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                        <?php echo do_shortcode('[post-views]'); ?>
                                        <?php esc_html_e( 'ครั้ง', 'fluffy' ); ?>
                                      </span>
                        </div>
                        <?php endif; ?>
                	</div>

                </article>


              <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
            <div class="clearfix"></div>

          </div>

        </div>


      <?php endforeach; ?>



<div class="text-center btn-view-all">
  <a href="?go_posts_terms=<?php echo $settings['category'][0]; ?>" class="term-link-all read_more">
      <?php yp_text('อ่านทั้งหมด','View All'); ?>
    </a>
</div>


    </div>
<?php
  }

  protected function _content_template()
  {
  }
}
