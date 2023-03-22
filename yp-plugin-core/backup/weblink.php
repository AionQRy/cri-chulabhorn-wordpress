<?php
function links_page() {
	ob_start();
	?>
  <style media="screen">
  .weblink {
      margin: 0 -8px;
      overflow: hidden;
      padding: 0;
  }

.weblink li {
list-style-type: none;
padding: 0;
}

.weblink_ctrl {
    background: #222;
    border: none;
    cursor: pointer;
    outline: none;
    padding: 13px 15px;
    position: relative;
    text-align: left;
    width: 100%;
    margin-top: 15px;
    color: #FFF;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
        margin-bottom: 0;
}
.weblink_ctrl.active {
    background: #0074bc;
}
.weblink_ctrl svg {
    position: absolute;
    right: 10px;
    bottom: 8px;
}
.weblink_ctrl.active svg{
-webkit-transform: rotate(180deg);
-moz-transform: rotate(180deg);
-ms-transform: rotate(180deg);
-o-transform: rotate(180deg);
transform: rotate(180deg);
}

.weblink_ctrl.active h2, .weblink_ctrl:focus h2 {
position: relative;
}
.wrap_weblink .w-title h4 {
    padding: 0!important;
    margin: 0!important;
        color: #222!important;
}
.weblink_panel {
background: #F2F2F2;
display: none;
overflow: hidden;
}
.weblink_panel .post_box{
  padding: 15px;
}
.wrap_weblink {
    display: flex;
    flex-wrap: wrap;
    width: 100%;
    align-items: center;
    padding: 15px 0 0;
}
.w-img {
    float: left;
    width: 20%;
}
.w-title {
    float: left;
    width: 40%;
}
.w-link {
    float: left;
    width: 40%;
}

.wrap_weblink .w-img img {
    height: auto;
    max-width: 50px;
}
.wrap_weblink .w-link a {
    color: #555;
    word-break: break-word;
}

@media (max-width:767px) {
  .wrap_weblink .w-img img {
      width: auto;
      max-height: 65px;
  }
  .wrap_weblink .w-link a {
    font-size: 12px;
}
  .w-link,.w-title,.w-img  {
      float: none;
      width: 100%;
  }
}
  </style>
  <script type="text/javascript">
  jQuery(document).ready(function($) {
    $('.weblink_ctrl').on('click', function(e) {
  e.preventDefault();
  if ($(this).hasClass('active')) {
    $(this).removeClass('active');
    $(this).next()
    .stop()
    .slideUp(300);
  } else {
    $(this).addClass('active');
    $(this).next()
    .stop()
    .slideDown(300);
  }
  });
  });
  </script>
  <ul class="weblink">

  <?php

            $term_args = array(
                  'taxonomy'               => 'weblink_category',
                  'hide_empty'             => false,
                  'fields'                 => 'all',
                  'count'                  => true,
              );
              $term_query = new WP_Term_Query( $term_args );

              foreach ( $term_query->terms as $term ) {
  ?>


      <li>
        <h4 class="weblink_ctrl">
          <?php echo $term->name; ?>
          <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="6 9 12 15 18 9"></polyline></svg>
        </h4>
        <div class="weblink_panel">

          <?php
          $args = array(
          'post_type' => array( 'weblink'),
          'tax_query'         => array(
                 array(
                     'taxonomy'  => 'weblink_category',
                     'field'     => 'term_id',
                     'terms'     => $term->term_id
                 )
               ),
          'posts_per_page'  => -1,
          'orderby'    => 'DESC'
          );
          query_posts( $args );
          ?>
          <div class="post_box">

          <?php if ( have_posts()) : ?>
          <?php while ( have_posts() ) : the_post(); ?>
            <div class="wrap_weblink">
              <div class="w-img">
                <?php if (has_post_thumbnail()): ?>
                  <?php the_post_thumbnail(); ?>
                  <?php else: ?>
                    <img src="<?php echo site_url(); ?>/wp-content/plugins/yp-plugin-core/assets/img/thumb.jpg" alt="<?php the_title(); ?>" class="icon-weblink">
                <?php endif; ?>
              </div>
              <div class="w-title">
                <h4><?php the_title(); ?></h4>
              </div>
              <div class="w-link">
                <?php if (get_field('url_weblink')): ?>
                  <a href="<?php echo get_field('url_weblink'); ?>" target="_blank"><?php the_field('url_weblink'); ?></a>
                <?php endif; ?>
              </div>
              <div class="clearfix"></div>
            </div>
          <?php endwhile; ?>
        <?php else: ?>
          <h4>Not Found</h4>
          <?php endif; ?>
          <?php wp_reset_query(); ?>

        </div>
      </li>

  <?php }  ?>
</ul>

	<?php
	$output_string = ob_get_contents();
	ob_end_clean();
	return $output_string;
}
add_shortcode('links_page','links_page');
