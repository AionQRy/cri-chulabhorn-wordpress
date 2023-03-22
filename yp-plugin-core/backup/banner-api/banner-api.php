<?php
function yp_banner_rest_init(){
    // route url: domain.com/wp-json/banner/result/api/
    $namespace = 'banner/result';
    $route     = 'api';

    register_rest_route($namespace, $route, array(
        'methods'   => WP_REST_Server::READABLE,
        'callback'  => 'yp_banner_api_callback'
    ));
}

add_action('rest_api_init', 'yp_banner_rest_init');

function yp_banner_api_callback(){
$postData = array();

 if (have_rows('image_slider', 'option')) :
    while (have_rows('image_slider', 'option')) : the_row();

      $gallery_main_banner = get_sub_field('image_h', 'option');
      $link = get_sub_field('link', 'option');
      if ($link) {
        $link_url = $link;
      }

      $show_date = date('Y-m-d');
      $show_date = date('Y-m-d', strtotime($show_date));
      //echo $show_date; // echos today!
      $getDateBegin = date('Y-m-d', strtotime(get_sub_field('start_date')));
      $getDateEnd = date('Y-m-d', strtotime(get_sub_field('end_date')));

      if (get_sub_field('on_off', 'option') != ''){
          if ( ($show_date >= $getDateBegin) && ($show_date <= $getDateEnd) ) {

            $postDataItem = array(
              "post_url" => $link_url,
              "image_url" => $gallery_main_banner['url']
            );
            array_push($postData, $postDataItem);
          }
    }
  endwhile;
endif;

echo json_encode($postData);
}
?>
