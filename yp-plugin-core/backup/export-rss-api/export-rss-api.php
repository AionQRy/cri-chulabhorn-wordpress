<?php
function yp_export_rss_rest_init(){
    // route url: domain.com/wp-json/export-rss/post/category/74?items=2
    $namespace = 'export-rss';
    $route     = '(?P<post_type>\w+)/(?P<taxonomy>\w+)/(?P<cat_id>\w+)';

// /(?P<taxonomy>\d+)/(?P<cat_id>\d+)
    register_rest_route($namespace, $route, array(
        'methods'   => 'GET',
        'callback'  => 'yp_export_rss_api_callback'
    ));
}

add_action('rest_api_init', 'yp_export_rss_rest_init');

function yp_export_rss_api_callback($data){
  $limit = $_GET['items'];
  if ($limit == '') {
    $limit = 10;
  }
$args = [
  'post_type'      => ['post'],
  'tax_query'      => [
    [
      'taxonomy' => $data['taxonomy'],
      'field'    => 'term_id',
      'terms'    => $data['cat_id'],
    ],
  ],
  'posts_per_page' => $limit,
  // 'offset'         => 1,
  'orderby'        => 'date',
  'order'          => 'DESC',
];
query_posts($args);
// header( "Content-type: text/xml");

echo "<?xml version='1.0' encoding='UTF-8'?>
<rss version='2.0'>
<channel>
<title>MOE.go.th | RSS</title>
<link>https://moe.co.th</link>
<description>Cloud RSS</description>
<language>th-th</language>";
 ?>
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
    <?php
    // <description>".get_the_content()."</description>
    // <description><![CDATA[this is <b>bold</b>]]></description>

      $image = get_the_post_thumbnail_url(get_the_ID(), 'large');
      if ($image == '') {
        $image = get_template_directory_uri() .'/img/thumb.jpg';
      }
// echo get_the_post_thumbnail_url(get_the_ID(),'large');

       echo "<item>
       <title>".get_the_title()."</title>
       <link>".get_the_permalink()."</link>
       <pubDate>".get_the_date()."</pubDate>
       <description>".get_the_title()."</description>
       <enclosure url='".$image."' type='image/jpeg'/>
       </item>";
    ?>
                  <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>

<?php  echo "</channel></rss>";

 } ?>
