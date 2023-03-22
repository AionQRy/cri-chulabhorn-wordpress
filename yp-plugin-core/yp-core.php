<?php
/**
 * @package     YP Core Client
 * @author      your-plans.com
 * @copyright   your-plans.com
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name:  YP Core Client
 * Plugin URI:
 * Description: YP Core System
 * Version:     1.2.9
 * Author:      your-plans.com
 * Author URI:  http://www.your-plans.com
 * Text Domain: yp-core
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 */

// Block direct access to file
defined( 'ABSPATH' ) or die( 'Not Authorized!' );

// Plugin Defines
define( "YP_FILE", __FILE__ );
define( "YP_DIRECTORY", dirname(__FILE__) );
define( "YP_TEXT_DOMAIN", dirname(__FILE__) );
define( "YP_DIRECTORY_BASENAME", plugin_basename( YP_FILE ) );
define( "YP_DIRECTORY_PATH", plugin_dir_path( YP_FILE ) );
define( "YP_DIRECTORY_URL", plugins_url( null, YP_FILE ) );

// Require the main class file
// require_once( YP_DIRECTORY . '/include/main-class.php' );
require_once( YP_DIRECTORY . '/include/elementer-widget/widget.php');
// require_once( YP_DIRECTORY . '/post-link-core/post-link-core.php');
// require_once( YP_DIRECTORY . '/post-embed/post-embed.php');
// require_once( YP_DIRECTORY . '/search-post-api/search-post-api.php');
// require_once( YP_DIRECTORY . '/quick-links/quick-links.php');
// require_once( YP_DIRECTORY . '/banner-api/banner-api.php');
require_once( YP_DIRECTORY . '/export-rss-api/export-rss-api.php');
require_once('shortcode.php');
require_once('post_type.php');
require_once('taxonomies.php');
// require_once('weblink.php');



function yp_text($text_th,$text_eng){
  if (get_locale() == 'th') {
    echo $text_th;
  }
  if (get_locale() != 'th') {
    echo $text_eng;
  }

}

function yp_text_get($text_th,$text_eng){
  if (get_locale() == 'th') {
      return $text_th;
  }
  if (get_locale() != 'th') {
     return $text_eng;
  }
}



// add_filter( 'register_taxonomy_args' , 'wpdocs_my_taxonomy_args', 9999, 3 );
// function wpdocs_my_taxonomy_args( $args, $taxonomy ) {
//
//     // Target "my-taxonomy"
//     if ( 'mec_tag' !== $taxonomy ) {
//         return $args;
//     }
//     // Set Hierarchical
//     $args[ 'public' ] = true;
//     $args[ 'publicly_queryable' ] = true;
//     $args[ 'query_var' ] = true;
//     $args[ 'rewrite' ][ 'with_front' ] = true;
//
//     // Return
//     return $args;
// }



function yp_core_script() {
  wp_enqueue_style( 'swiper-yp', YP_DIRECTORY_URL. '/include/css/swiper-bundle.min.css',array(),'1.0' );
  wp_enqueue_style( 'yp-core', YP_DIRECTORY_URL. '/include/css/yp-core.css', array(), '1.0' );
}
add_action( 'wp_enqueue_scripts', 'yp_core_script' );




if( function_exists('acf_add_options_page') ) {

  acf_add_options_page(array(
    'page_title' 	=> 'Theme General Settings',
    'menu_title'	=> 'Theme Settings',
    'menu_slug' 	=> 'theme-general-settings',
    'capability'	=> 'edit_posts',
    'redirect'		=> false
  ));

  acf_add_options_sub_page(array(
    'page_title' 	=> 'Footer Settings',
    'menu_title'	=> 'Footer Settings',
    'parent_slug'	=> 'theme-general-settings',
  ));

  acf_add_options_sub_page(array(
    'page_title' 	=> 'Top Graphic Settings',
    'menu_title'	=> 'Top Graphic',
    'parent_slug'	=> 'theme-general-settings',
  ));

  // acf_add_options_sub_page(array(
  //   'page_title' 	=> 'Quick Links Settings',
  //   'menu_title'	=> 'Quick Links',
  //   'parent_slug'	=> 'theme-general-settings',
  // ));

  acf_add_options_sub_page(array(
    'page_title' 	=> 'Social Media Settings',
    'menu_title'	=> 'Social Media',
    'parent_slug'	=> 'theme-general-settings',
  ));



  acf_add_options_page(array(
    'page_title' 	=> 'หน้าต้อนรับ',
    'menu_title'	=> 'หน้าต้อนรับ',
    'menu_slug' 	=> 'vc_splash_page',
    'icon_url' => 'dashicons-format-gallery',
    'capability'	=> 'edit_posts',
      'position'      => 28,
    'redirect'		=> false
  ));
}





// function update_post_data(){
//   // echo "xxxxx";
//   $start = $_GET['run'];
//   // $item = $_GET['i'];
//
//   if ($start == 1) {
//
//     $args = array(
//       'post_type' => 'post',
//       'post_status'     => 'publish',
//       'posts_per_page'  => 3,
//       // 'category__not_in' => array(58819, 210, 1634),
//       // 'category__in' => array(67570),
//       // 'p' => '137442',
//       'order'    => 'date',
//       'orderby'    => 'DESC'
//     );
//     $query_posts = query_posts($args);
//     if (have_posts()) :
//      while (have_posts()) : the_post();
//
//
//         $post_year = get_the_date('Y');
//         $term_id = term_exists( $post_year, 'post_year' );
//
//
//         if (!empty($term_id)) {
//           $post_id = get_the_ID();
//           $category_id = $term_id['term_id'];
//           $taxonomy = 'post_year';
//
//           wp_set_object_terms( $post_id, intval( $category_id ), $taxonomy );
//         }
//         else {
//             $term_id =  wp_insert_term(
//               $post_year,
//               'post_year',
//               array(
//                 'description' => '',
//                 'slug'        => $post_year
//               )
//           );
//
//           $post_id = get_the_ID();
//           $category_id = $term_id['term_id'];
//           $taxonomy = 'post_year';
//
//           wp_set_object_terms( $post_id, intval( $category_id ), $taxonomy );
//         }
//
//       endwhile;
//     endif;
//     wp_reset_query();
//
//   }
// }
// add_action('init', 'update_post_data');


// add_action('admin_enqueue_scripts', 'yp_ajax_import');
// function yp_ajax_import()
// {
//   wp_enqueue_script('yp-ajax-import', plugins_url('assets/js/yp_ajax_import.js', __FILE__), array('jquery'));
//   wp_localize_script('yp-ajax-import', 'ajax_import_object', array(
//     'ajax_url' => admin_url('admin-ajax.php')
//   ));
// }


//
// add_action( 'wp_ajax_yp_run_import',        'yp_run_import_callback' );
// add_action( 'wp_ajax_nopriv_yp_run_import', 'yp_run_import_callback' );
// function yp_run_import_callback()
// {
//
//   // update_field('import_completed', 'เริ่ม', 'option');
//
//   $args = array(
//     'post_type' => 'post',
//     'post_status'     => 'publish',
//     'posts_per_page'  => -1,
//     // 'category__not_in' => array(58819, 210, 1634),
//     // 'category__in' => array(67570),
//     // 'p' => '137442',
//     'order'    => 'date',
//     'orderby'    => 'DESC'
//   );
//   $query_posts = query_posts($args);
//   if (have_posts()) : // while (have_posts()) : the_post();
//
//
//       $post_year = get_the_date('Y');
//       $term_id = term_exists( $post_year, 'post_year' );
//
//
//       if (!empty($term_id)) {
//         $post_id = get_the_ID();
//         $category_id = $term_id['term_id'];
//         $taxonomy = 'post_year';
//
//         wp_set_object_terms( $post_id, intval( $category_id ), $taxonomy );
//       }
//       else {
//           $term_id =  wp_insert_term(
//             $post_year,
//             'post_year',
//             array(
//               'description' => '',
//               'slug'        => $post_year
//             )
//         );
//
//         $post_id = get_the_ID();
//         $category_id = $term_id['term_id'];
//         $taxonomy = 'post_year';
//
//         wp_set_object_terms( $post_id, intval( $category_id ), $taxonomy );
//       }
//
//     endwhile;
//   endif;
//   wp_reset_query();
//
//
//   // exit;
// }
