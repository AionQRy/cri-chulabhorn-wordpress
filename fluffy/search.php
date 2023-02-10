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
 $current_term = get_queried_object()->term_id;
 $setting_theme = get_field('setting_theme', 'option');
 $post_type = get_post_type( get_the_ID() );

 $archive_title = yp_text_get('ค้นหา','Search');
 $filter_slug = 'search-filter';

 require('template-parts/template-archive-search.php');
?>
<?php if (isset($_GET['s'])): ?>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
        $('.sf-field-search .sf-input-text').val('<?php echo $_GET['s']; ?>');
    });
  </script>
<?php endif; ?>
<?php
footer_fuc();
?>
