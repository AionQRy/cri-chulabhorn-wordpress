<?php
/**
 * The template for displaying all Video
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package fluffy
 */

header_fuc();
global $post;
 $current_term = get_queried_object();
 $setting_theme = get_field('setting_theme', 'option');
 $post_type = get_post_type( get_the_ID() );


 $archive_title = $current_term->name;
 if ($archive_title == 'vc_videos') {
   $archive_title = yp_text_get('คลังวิดีโอ','Videos');
 }

 $taxonomy = 'vc_video_category';
 $tags = 'vc_video_tags';
  $filter_slug = 'search-video';

 require('template-parts/template-archive-media.php');
// get_sidebar();
footer_fuc();
