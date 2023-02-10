<?php
/**
 * Template name: Page Search
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fluffy
 */
 header_fuc();
 global $post;
  $current_term = get_queried_object()->term_id;
  $setting_theme = get_field('setting_theme', 'option');
  $post_type = get_post_type( get_the_ID() );

  $archive_title = yp_text_get('ค้นหา','Search');
  $filter_slug = 'search-filter';

  require('template-parts/template-archive-search.php');
 footer_fuc();
 ?>
