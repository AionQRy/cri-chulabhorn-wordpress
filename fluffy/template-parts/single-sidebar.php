<?php
$style_theme = 'list-s2';
$Sassy_Social_Share = '[Sassy_Social_Share]';
$per_post = 2;
?>
<div class="single_sidebar style-<?php echo $style_theme; ?>">

  <h3 class="widget-title section-title">
    <?php if ( $post_type == 'vc_ebook' ): ?>
     <?php yp_text('หนังสือที่เกี่ยวข้อง','Related E-books'); ?>
     <?php elseif ( $post_type == 'vc_photos' ): ?>
     <?php yp_text('ภาพข่าวที่เกี่ยวข้อง','Related Photo'); ?>
     <?php elseif ( $post_type == 'vc_videos' ): ?>
      <?php yp_text('วีดีโอที่เกี่ยวข้อง','Related Video'); ?>
    <?php elseif ( $post_type == 'mec-events' ): ?>
    <?php yp_text('กิจกรรมที่เกี่ยวข้อง','Related Event'); ?>
     <?php else: ?>
     <?php yp_text('ข่าวสารที่เกี่ยวข้อง','Related Posts'); ?>
    <?php endif; ?>
  </h3>
  <?php
  $terms = wp_get_object_terms( get_queried_object_id(), $taxonomy);
  $term_id = $terms[0]->term_id;


  $related_posts[] = get_the_ID();
  $args = array(
      'post_type' =>  $post_type,
      'post__not_in' => $related_posts,
      // 'category__in' => wp_get_post_categories(get_the_ID()),
      'tax_query' => array(
        array(
            'taxonomy' => $taxonomy, //double check your taxonomy name in you dd
            'field'    => 'id',
            'terms'    => $term_id,
        ),
       ),
      'posts_per_page' =>	$per_post
  );
  $the_query = new WP_Query( $args );
  if ($the_query->have_posts()) {
  ?>

  <div class="post-related">

              <div class="v-post-loop">
                <?php
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    if ($post_type == 'vc_ebook') {
                      get_template_part( 'template-parts/content-card-ebook' );
                    }
                    else {
                        get_template_part( 'template-parts/content-card-post' );
                    }
                }
                 ?>
              </div>
  </div>
  <?php
  }
  else {
    $args = array(
        'post_type' =>  $post_type,
        'orderby' => 'rand',
        'posts_per_page' => $per_post
    );
    $the_query = new WP_Query( $args );
    ?>
    <div class="post-related">
      <div class="v-post-loop">
        <?php
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            if ($post_type == 'vc_ebook') {
              get_template_part( 'template-parts/content-card-ebook' );
            }
            else {
                get_template_part( 'template-parts/content-card-post' );
            }
        }
         ?>
      </div>
    </div>
    <?php
  }

    wp_reset_postdata();
  ?>

<div class="last-news">
  <h3 class="widget-title section-title">
  <?php if ( $post_type == 'vc_ebook' ): ?>
   <?php yp_text('หนังสือล่าสุด','Recent E-books'); ?>
   <?php elseif ( $post_type == 'vc_photos' ): ?>
   <?php yp_text('ภาพข่าวล่าสุด','Recent Photo'); ?>
   <?php elseif ( $post_type == 'vc_videos' ): ?>
   <?php yp_text('วีดีโอล่าสุด','Recent Video'); ?>
   <?php elseif ( $post_type == 'mec-events' ): ?>
   <?php yp_text('กิจกรรมล่าสุด','Recent Event'); ?>
   <?php else: ?>
   <?php yp_text('ข่าวสารล่าสุด','Recent Posts'); ?>
  <?php endif; ?>
  </h3>
  <?php
  $args = array(
  'post_type' =>  $post_type,
  'orderby' => 'date',
  'order' => 'DESC',
  'posts_per_page' => 1
  );
  $the_query = new WP_Query( $args );
  ?>
  <div class="post-related">
    <div class="v-post-loop">
    <?php
    while ( $the_query->have_posts() ) {
      $the_query->the_post();
      if ($post_type == 'vc_ebook') {
        get_template_part( 'template-parts/content-card-ebook' );
      }
      else {
          get_template_part( 'template-parts/content-card-post' );
      }
    }
    ?>
    </div>
  </div>
</div>

</div>
