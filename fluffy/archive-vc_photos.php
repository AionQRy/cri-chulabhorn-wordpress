<?php
/**
 * The template for displaying all Photo
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
 if ($archive_title == 'vc_photos') {
   $archive_title = yp_text_get('คลังรูปภาพ','Photos');
 }

 $taxonomy = 'vc_photo_category';
 $tags = 'vc_photo_tags';
 $filter_slug = 'search-photo';

 require('template-parts/template-archive-media.php');
footer_fuc();
