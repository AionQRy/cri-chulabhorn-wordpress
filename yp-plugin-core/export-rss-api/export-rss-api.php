<?php
function yp_export_rss_rest_init(){
    // route url: domain.com/wp-json/export-rss/post/category/74?items=2
    $namespace = 'export-rss';
    $route     = '(?P<taxonomy>\w+)/(?P<cat_id>\w+)';

// /(?P<taxonomy>\d+)/(?P<cat_id>\d+)
    register_rest_route($namespace, $route, array(
        'methods'   => 'GET',
        'callback'  => 'yp_export_rss_api_callback'
    ));
}

add_action('rest_api_init', 'yp_export_rss_rest_init');

function yp_export_rss_api_callback($data){
  $limit = $_GET['items'];
  $post_type = $_GET['post_type'];
  if ($limit == '') {
    $limit = 10;
  }
  if ($data['taxonomy'] == 'is_archive') {
    $args = [
      'post_type'      => [$post_type],
      'posts_per_page' => $limit,
      'orderby'        => 'date',
      'order'          => 'DESC',
    ];
  }
  else {
    $args = [
      'post_type'      => [$post_type],
      'tax_query'      => [
        [
          'taxonomy' => $data['taxonomy'],
          'field'    => 'term_id',
          'terms'    => $data['cat_id'],
        ],
      ],
      'posts_per_page' => $limit,
      'orderby'        => 'date',
      'order'          => 'DESC',
    ];
  }
query_posts($args);
header( "Content-type: text/xml");
echo "<?xml version='1.0' encoding='UTF-8'?>
<rss version='2.0'>
<channel>
<title>".get_bloginfo()." | RSS</title>
<link>".home_url()."</link>
<description>Cloud RSS</description>
<language>".get_locale()."</language>";
 ?>
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
    <?php
      $image = get_the_post_thumbnail_url(get_the_ID(), 'large');
      if ($image == '') {
        $image = get_template_directory_uri() .'/img/thumb.jpg';
      }
       echo "<item>
       <title>".get_the_title()."</title>
       <link>".get_the_permalink()."</link>
       <pubDate>".get_the_time('c')."</pubDate>
       <description>".get_the_title()."</description>
       <enclosure url='".$image."' type='image/jpeg'/>
       </item>";
    ?>
                  <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
<?php  echo "</channel></rss>"; } ?>
