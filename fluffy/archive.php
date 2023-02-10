<?php
/**
 * The template for displaying all
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package fluffy
 */

header_fuc();
global $post;
 $current_term = get_queried_object();
 // $setting_type = get_field( 'setting_type' , 'term_' . $current_term);
 $setting_theme = get_field('setting_theme', 'option');
 $post_type = get_post_type( get_the_ID() );
 // $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); echo $term->name;
 $archive_title = $current_term->name;
 if ($archive_title == 'vc_downloadmanager') {
  $archive_title = yp_text_get('ข่าวสารและกิจกรรม','News & Events');
 }

 $filter_slug = 'archive-main';

 require('template-parts/template-archive.php');
footer_fuc();
