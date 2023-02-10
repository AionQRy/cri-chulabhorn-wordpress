<?php
/**
 * Template name: Poll
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
 if ($archive_title == 'polls') {
   $archive_title = yp_text_get('แบบสำรวจความเห็น','Polls');
 }

 $filter_slug = 'polls';

 require('template-parts/template-archive-polls.php');
 footer_fuc();
