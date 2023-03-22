<?php

function yp_search_rest_init()
{
    // route url: domain.com/wp-json/search/result/api/?s=embed
    $namespace = 'search/result';
    $route     = 'api';

    register_rest_route($namespace, $route, array(
        'methods'   => WP_REST_Server::READABLE,
        'callback'  => 'yp_search_api_callback'
    ));
}

add_action('rest_api_init', 'yp_search_rest_init');

function yp_search_api_callback()
{

  $keyword = $_GET['s'];
  $args = array(
  'post_type' => array( 'post'),
  'posts_per_page'  => 20,
  's'  => $keyword,
  'orderby'    => 'DESC'
  );
  query_posts( $args );

  $postData = array();
  // $postData["results"]=array();
?>
<?php if ( have_posts()) :
while ( have_posts() ) : the_post();
 $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
 $get_category_lists = get_the_terms(get_the_ID(), 'category');


 $postDataItem = array(
   "post_id" => get_the_ID(),
   "title" => get_the_title(),
   "cat_name" => $get_category_lists[0]->name,
   "content" => get_the_content(),
   "post_image" => $image[0],
   "permalink" => get_the_permalink(),
 );

array_push($postData, $postDataItem);
endwhile; else : ?>
<?php
$postDataItem = array(
  "error" => 'no post found'
);
array_push($postData, $postDataItem);
?>
<?php endif;
echo json_encode($postData);
wp_reset_query();
}

 ?>
