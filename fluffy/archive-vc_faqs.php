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
 if ($archive_title == 'vc_faqs') {
   $archive_title = yp_text_get('คำถามที่พบบ่อย','FAQs');
 }

 $filter_slug = 'search-faqs';
 require('template-parts/template-archive-faqs.php');
 footer_fuc();
