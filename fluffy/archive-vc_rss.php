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
 if ($archive_title == 'vc_rss') {
   $archive_title = yp_text_get('RSS','RSS');
 }

 $filter_slug = 'search-rss';

 require('template-parts/template-archive-rss.php');
footer_fuc();
