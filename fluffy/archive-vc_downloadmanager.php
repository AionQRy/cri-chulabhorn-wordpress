<?php
/**
 * The template for displaying all Download
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package fluffy
 */

header_fuc();
global $post;
 $current_term = get_queried_object();
 $post_type = get_post_type( get_the_ID() );
 $setting_theme = get_field('setting_theme', 'option');

 $archive_title = $current_term->name;
 if ($archive_title == 'vc_downloadmanager') {
  $archive_title = yp_text_get('ดาวน์โหลด','Download');
 }

 $taxonomy = 'vc_download_category';
 $tags = 'vc_download_tags';
 $filter_slug = 'archive-download';

 require('template-parts/template-archive-download.php');
footer_fuc();
