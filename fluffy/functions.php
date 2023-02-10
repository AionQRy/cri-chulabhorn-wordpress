<?php
/**
 * fluffy functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fluffy
 */


 add_action( 'wp_head', 'archive_select_check' );
 function archive_select_check() {

 	if (is_archive()) {
     $term = get_queried_object();
     $parent = $term->parent;
     $terms_child = get_term_children( $term->term_id, $term->taxonomy );

     // if has child
     if ( !empty($terms_child) ) {
       ?>
       <script type="text/javascript">
           jQuery(document).ready(function($) {
               $('.sf-field-category select.sf-input-select option, .sf-field-taxonomy-wpdmcategory select.sf-input-select option').attr('disabled', 'disabled');
               $('.sf-field-category select.sf-input-select option.sf-item-<?php echo $term->term_id; ?>, .sf-field-taxonomy-wpdmcategory select.sf-input-select option.sf-item-<?php echo $term->term_id; ?>').removeAttr('disabled');
             <?php foreach ($terms_child as $value): ?>
             $('.sf-field-category select.sf-input-select option.sf-item-<?php echo $value; ?>, .sf-field-taxonomy-wpdmcategory select.sf-input-select option.sf-item-<?php echo $value; ?>').removeAttr('disabled');
             <?php endforeach; ?>
             $('select.sf-input-select option[disabled="disabled"]').remove();
         });
       </script>
       <?php
     }

     // if has parent
     if ($parent != 0) {
         $parent_child = get_term_children($parent, $term->taxonomy );
       ?>
       <script type="text/javascript">
           jQuery(document).ready(function($) {
               $('.sf-field-category select.sf-input-select option, .sf-field-taxonomy-wpdmcategory select.sf-input-select option').attr('disabled', 'disabled');
               $('.sf-field-category select.sf-input-select option.sf-item-<?php echo $term->term_id; ?>, .sf-field-taxonomy-wpdmcategory select.sf-input-select option.sf-item-<?php echo $term->term_id; ?>').removeAttr('disabled');
               $('.sf-field-category select.sf-input-select option.sf-item-<?php echo $parent; ?>, .sf-field-taxonomy-wpdmcategory select.sf-input-select option.sf-item-<?php echo $parent; ?>').removeAttr('disabled');
             <?php foreach ($parent_child as $value): ?>
             $('.sf-field-category select.sf-input-select option.sf-item-<?php echo $value; ?>, .sf-field-taxonomy-wpdmcategory select.sf-input-select option.sf-item-<?php echo $value; ?>').removeAttr('disabled');
             <?php endforeach; ?>
             $('select.sf-input-select option[disabled="disabled"]').remove();
         });
       </script>
       <?php
     }

   }

   if (is_tax('vc_publications_category')) {

      session_start();
      $filter = get_page_by_path( 'publications', OBJECT, 'search-filter-widget' );

      if ( function_exists( 'pll_the_languages' ) ) {
        $id_filter = $translations = $GLOBALS["polylang"]->model->post->get_translations($filter->ID);
        if (get_locale() == 'th') {
          $filter_id = $id_filter['th'];
        }
        if (get_locale() != 'th') {
          $filter_id = $id_filter['en'];
        }
      }
      else {
        $filter_id = $filter->ID;
      }

     global $searchandfilter;
      $current_t = $searchandfilter->get($filter_id)->current_query();
      $current_t = $current_t->get_array();
      $current_t = $current_t['_sft_vc_publications_category']['active_terms'][0]['id'];

     $args = array(
       'post_type' => array( 'vc_publications'),
       'tax_query'         => array(
              array(
                  'taxonomy'  => 'vc_publications_category',
                  'field'     => 'term_id',
                  'terms'     => $current_t
              )
            ),
       'posts_per_page'  => -1,
       'orderby'    => 'DESC'
       );
       query_posts( $args );
       $array_year = array();
     if ( have_posts()) :
       while ( have_posts() ) : the_post();
       if (empty($_GET['_sft_vc_publications_year'])):
         $terms_now = wp_get_object_terms( get_the_ID(), 'vc_publications_year', array('fields'=>'ids') );
         $array_year[] = $terms_now[0];
       endif;
     endwhile;
    endif;
     wp_reset_query();

     if (empty($_GET['_sft_vc_publications_year'])) {
         $_SESSION["array_year"] = $array_year;
     }
     ?>
     <?php if (!empty($_SESSION['array_year'])): ?>
          <script type="text/javascript">
              jQuery(document).ready(function($) {
                  $('li.sf-field-taxonomy-vc_publications_year select.sf-input-select option').attr('disabled', 'disabled');
                  $('li.sf-field-taxonomy-vc_publications_year select.sf-input-select option.sf-item-0').removeAttr('disabled');
                  <?php foreach ($_SESSION['array_year'] as $value): ?>
                  $('li.sf-field-taxonomy-vc_publications_year select.sf-input-select option.sf-item-<?php echo $value; ?>').removeAttr('disabled');
                  <?php endforeach; ?>
                  $('li.sf-field-taxonomy-vc_publications_year select.sf-input-select option[disabled="disabled"]').remove();
            });
          </script>
      <?php endif;

   }




   if (is_tax('vc_publications_year')) {

      session_start();
      $filter = get_page_by_path( 'publications', OBJECT, 'search-filter-widget' );

      if ( function_exists( 'pll_the_languages' ) ) {
        $id_filter = $translations = $GLOBALS["polylang"]->model->post->get_translations($filter->ID);
        if (get_locale() == 'th') {
          $filter_id = $id_filter['th'];
        }
        if (get_locale() != 'th') {
          $filter_id = $id_filter['en'];
        }
      }
      else {
        $filter_id = $filter->ID;
      }

     global $searchandfilter;
      $current_t = $searchandfilter->get($filter_id)->current_query();
      $current_t = $current_t->get_array();
      $current_t = $current_t['_sft_vc_publications_year']['active_terms'][0]['id'];

     $args = array(
       'post_type' => array( 'vc_publications'),
       'tax_query'         => array(
              array(
                  'taxonomy'  => 'vc_publications_year',
                  'field'     => 'term_id',
                  'terms'     => $current_t
              )
            ),
       'posts_per_page'  => -1,
       'orderby'    => 'DESC'
       );
       query_posts( $args );
       $array_year = array();
     if ( have_posts()) :
       while ( have_posts() ) : the_post();
       if (empty($_GET['_sft_vc_publications_category'])):
         $terms_now = wp_get_object_terms( get_the_ID(), 'vc_publications_category', array('fields'=>'ids') );
         $array_year[] = $terms_now[0];
       endif;
     endwhile;
    endif;
     wp_reset_query();

     if (empty($_GET['_sft_vc_publications_category'])) {
         $_SESSION["array_cat"] = $array_year;
     }
     ?>
     <?php if (!empty($_SESSION['array_cat'])): ?>
          <script type="text/javascript">
              jQuery(document).ready(function($) {
                  $('li.sf-field-taxonomy-vc_publications_category select.sf-input-select option').attr('disabled', 'disabled');
                  $('li.sf-field-taxonomy-vc_publications_category select.sf-input-select option.sf-item-0').removeAttr('disabled');
                  <?php foreach ($_SESSION['array_cat'] as $value): ?>
                  $('li.sf-field-taxonomy-vc_publications_category select.sf-input-select option.sf-item-<?php echo $value; ?>').removeAttr('disabled');
                  <?php endforeach; ?>
                  $('li.sf-field-taxonomy-vc_publications_category select.sf-input-select option[disabled="disabled"]').remove();
            });
          </script>
      <?php endif;
   }

}

 add_filter( 'wpseo_breadcrumb_links', 'unbox_yoast_seo_breadcrumb_append_link' );
 function unbox_yoast_seo_breadcrumb_append_link( $links ) {
     global $post;
     if( is_singular('post')){
        if (get_locale() == 'th') {
          $text = 'ข่าวสารและกิจกรรม';
          $url = get_home_url().'/all-article';
        }
        else {
          $text = 'News & Events';
          $url = get_home_url().'/all-post';
        }
         $breadcrumb[] = array(
         'url' => $url,
         'text' => $text,
       );
       // array_unshift($links, $breadcrumb);
         array_splice( $links, 1, -5, $breadcrumb );
     }
     return $links;
 }


 add_filter( 'wpseo_breadcrumb_links', 'search_yoast_seo_breadcrumb_append_link' );
 function search_yoast_seo_breadcrumb_append_link( $links ) {
     global $post;
     if( is_search()){
        if (get_locale() == 'th') {
          $text = 'การค้นหาขั้นสูง';
          $url = '#';
        }
        else {
          $text = 'Advanced Search';
          $url = '#';
        }
         $breadcrumb[] = array(
         'url' => $url,
         'text' => $text,
       );
       // array_unshift($links, $breadcrumb);
         array_splice( $links, 1, -1, $breadcrumb );
     }
     return $links;
 }

 if (class_exists('ACF')) {
	require_once('theme-core/theme-core.php');
}
	// require_once('give-style.php');
  function yp_reg_count_shared() {
         wp_enqueue_script( 'count-shared-script', get_template_directory_uri() . '/js/yp_count_shared.js', array('jquery') );
         wp_localize_script( 'count-shared-script', 'count_shared_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
  }
  add_action( 'wp_enqueue_scripts', 'yp_reg_count_shared' );


  add_action("wp_ajax_count_shared_ajax", "count_shared_fnc");
  add_action("wp_ajax_nopriv_count_shared_ajax", "count_shared_fnc");

  function count_shared_fnc() {
    // echo $_POST['data_id'];
    $shared_count = get_field('shared_count',$_POST['data_id']);
    if ($shared_count == '') {
      $shared_count = 0;
    }
    $shared_count = $shared_count+1;
    update_field('shared_count', $shared_count,$_POST['data_id']);
    echo "counted";
    die();
  }

function file_size_html($file_url){

  if (!empty($file_url)) {
    $ch = curl_init($file_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, TRUE);
    curl_setopt($ch, CURLOPT_NOBODY, TRUE);
    $data = curl_exec($ch);
    $fileSize = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
    $httpResponseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    $file_size = $fileSize;
    $size_cal = $file_size/1048576;
    $unit = '';

    if ($size_cal <= 0) {
      $unit = 'KB';
      $size_cal = $file_size/1024;
    }
    else {
      $unit = 'MB';
    }

    return number_format($size_cal,1).' '.$unit;
  }

}

function file_size_cal($file_url){

  if (!empty($file_url)) {
    $ch = curl_init($file_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, TRUE);
    curl_setopt($ch, CURLOPT_NOBODY, TRUE);
    $data = curl_exec($ch);
    $fileSize = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
    $httpResponseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    $file_size = $fileSize;
    // $size_cal = $file_size/1048576;
    return $file_size;
  }

}


function ext_file($ext){
  if ($ext == 'pdf') {
      $file_icon_type = get_stylesheet_directory_uri().'/img/ic_pdf.png';
  }
 else if ($ext == 'xlsx' || $ext == 'xls') {
      $file_icon_type = get_stylesheet_directory_uri().'/img/ic_pdf.png';
  }

  else if ($ext == 'doc' || $ext == 'docx') {
      $file_icon_type = get_stylesheet_directory_uri().'/img/ic_doc.png';
  }

 else if ($ext == 'ppt' || $ext == 'pptx') {
      $file_icon_type = get_stylesheet_directory_uri().'/img/ic_ppt.png';
  }
  else if ($ext == 'zip') {
       $file_icon_type = get_stylesheet_directory_uri().'/img/ic_zip.png';
   }
   else if ($ext == 'rar') {
        $file_icon_type = get_stylesheet_directory_uri().'/img/ic_rar.png';
    }
  else {
       $file_icon_type = get_stylesheet_directory_uri().'/img/ic_worldwide.png';
   }
   return $file_icon_type;
}


function yp_editor_content( $content ) {
    // Polylang sets the 'from_post' parameter
    if ( isset( $_GET['from_post'] ) ) {
        $my_post = get_post( $_GET['from_post'] );
        if ( $my_post )
            return $my_post->post_content;
    }

    return $content;
}
add_filter( 'default_content', 'yp_editor_content' );


// Make sure Polylang copies the title when creating a translation
function yp_editor_title( $title ) {
   // Polylang sets the 'from_post' parameter
   if ( isset( $_GET['from_post'] ) ) {
       $my_post = get_post( $_GET['from_post'] );
       if ( $my_post )
           return $my_post->post_title;
   }

   return $title;
}
add_filter( 'default_title', 'yp_editor_title' );


function yp_editor_excerpt( $excerpt ) {
   // Polylang sets the 'from_post' parameter
   if ( isset( $_GET['from_post'] ) ) {
       $my_post = get_post( $_GET['from_post'] );
       if ( $my_post )
           return $my_post->post_excerpt;
   }

   return $title;
}
add_filter( 'default_excerpt', 'yp_editor_excerpt' );



if (get_current_blog_id() != 1) {
  add_filter( 'show_admin_bar', '__return_false' );
}

add_filter('register_taxonomy_args', 'wpdocs_my_taxonomy_args', 9999, 3);
function wpdocs_my_taxonomy_args($args, $taxonomy)
{
  if ('mec_tag' !== $taxonomy) {
    return $args;
  }
  // Set Hierarchical
  $args['public'] = true;
  $args['publicly_queryable'] = true;
  $args['query_var'] = true;
  $args['rewrite']['with_front'] = true;
  // Return
  return $args;
}

function goto_term(){

  if (get_current_blog_id() != 1) {
      switch_to_blog(get_current_blog_id());
  }


  if (!empty($_GET['go_posts_terms'])) {
    $term_id = $_GET['go_posts_terms'];
    $term_ini = (int) $term_id;
    $term_link = get_term_link($term_ini,'category');
    wp_safe_redirect($term_link);
    exit();
  }

  if (!empty($_GET['go_ebook_terms'])) {
    $term_id = $_GET['go_ebook_terms'];
    $term_ini = (int) $term_id;
    $term_link = get_term_link($term_ini,'vc_ebook_category');
    wp_safe_redirect($term_link);
    exit();
  }

  if (!empty($_GET['go_file_terms'])) {
    $term_id = $_GET['go_file_terms'];
    $term_ini = (int) $term_id;
    $term_link = get_term_link($term_ini,'vc_download_category');
    wp_safe_redirect($term_link);
    exit();
  }



  // if (get_current_blog_id() != 1) {
  // restore_current_blog();
  // }
}
add_action('template_redirect','goto_term');



function yp_reg_count_click() {
       wp_enqueue_script( 'count-click-script', get_template_directory_uri() . '/js/yp_count_click.js', array('jquery') );
       wp_localize_script( 'count-click-script', 'count_click_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'yp_reg_count_click' );

// add_action("wp_ajax_file_broken_ajax", "file_broken_fnc");
// add_action("wp_ajax_nopriv_file_broken_ajax", "file_broken_fnc");
// function file_broken_fnc() {
//   echo "string";
//   update_row('files_download', $_POST['file_id'], $value,$_POST['data_pid']);
// }

add_action("wp_ajax_count_click_ajax", "count_click_fnc");
add_action("wp_ajax_nopriv_count_click_ajax", "count_click_fnc");

function count_click_fnc() {

  if ($_POST['data_type'] == 'file_download_yp') {
    $items = get_field( 'files_download',$_POST['data_pid'] );

    $o_file_count = $items[$_POST['file_id']-1]['file_download_count'];
    if (empty($o_file_count)) {
      $o_file_count = 0;
    }
    $file_count = $o_file_count + 1;

    echo 'Row:'.$_POST['file_id'];
    echo ' Old Count:'.$o_file_count;
    echo ' New Count:'.$file_count;

    $value = array(
        'file_download_count' => $file_count,
    );
    update_row('files_download', $_POST['file_id'], $value,$_POST['data_pid']);

  }


die();
}


function vc_single_image($atts) {
	$atts = extract(
		shortcode_atts(
		array(
			'image'=>'',
      'link'=>''
		),$atts)
	);
	ob_start();
	?>
  <a href="<?php echo $link; ?>">
    <img src="<?php echo wp_get_attachment_image_src( $image ,'full')[0]; ?>" alt="img">
  </a>
	<?php
	$output_string = ob_get_contents();
	ob_end_clean();
	return $output_string;
}
add_shortcode('vc_single_image','vc_single_image');

function footer_report(){
  ?>
  <?php if ($_GET['data-title']): ?>
    <script type="text/javascript">
      jQuery(document).ready(function($) {
        $('.report-depart').prop('selectedIndex',4);
        $('.report-message').val('Broken file report\nFile name: '+'<?php echo $_GET['data-title']; ?>\nFile url :'+'<?php echo $_GET['data-url']; ?>');
      });
    </script>
  <?php endif; ?>
  <div class="wrap-popup-broken">
    <div class="broken-overlay"></div>
    <div class="broken-form">
      <h5><?php yp_text('แจ้งไฟล์เสีย','Report broken file'); ?></h5>
      <span class="btn-close">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1 active"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
      </span>
      <?php echo do_shortcode('[fluentform id="5"]'); ?>
    </div>
  </div>

  <script type="text/javascript">
    jQuery(document).ready(function($) {
      <?php if (!is_page('1821') && !is_page('13083') ): ?>
      $(document).on('fluentform_submission_success',function(){
       setTimeout(function(){
           $('.ff-message-success').hide();
         }, 1000);
     })
      <?php endif; ?>
      $('.professional-wrap .elementor-widget-image-box').click(function(event) {
        $('.profile-modal').addClass('active');
        var wrap = $(this).parent().parent().attr('data-id');
        var more_data = $('.elementor-element-'+wrap+' .elementor-widget-text-editor .elementor-widget-container').html();
        var name = $('.elementor-element-'+wrap+' .elementor-image-box-title').text();
        var image = $('.elementor-element-'+wrap+' .elementor-image-box-img img').attr('src');
        // var position = $('.elementor-element-'+wrap+' .elementor-heading-title').text();
        $('.profile-content h2').text(name);
        $('.profile-content .vcontent').html(more_data);
        $('.profile-content img').attr('src',image);

      });

      $('.profile-overlay,.close-profile').click(function(event) {
        $('.profile-modal').removeClass('active');
      });
    });
  </script>
  <div class="profile-modal">
    <div class="profile-overlay"></div>

    <div class="profile-content">
      <div class="close-profile">
        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1 active"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
      </div>
      <div class="left">
        <h2></h2>
        <div class="vcontent"></div>
      </div>
      <div class="right">
        <img alt="profile">
      </div>
    </div>
  </div>
  <?php
}
add_action('wp_footer','footer_report');

function yp_popup_search(){
  if (isset($_GET['_sf_s'])) {
    $s = $_GET['_sf_s'];
  }
  else {
    $s = $_GET['s'];
  }
  ?>
  <div class="popup_search">
        <div class="cancel-btn_search">
            <span class="btn-close">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </span>
        </div>
		<div class="box-search">
        <div class="sec-search_box">
            <h3><?php yp_text( 'กรุณากรอกคำที่ต้องการค้นหา', 'Please enter a search term' ); ?></h3>
            <?php if (get_locale() == 'th'): ?>
                <p>หากต้องการค้นหาฉบับที่ 2 ต้องพิมพ์ "ฉบับที่ 2"</p>
                <?php else: ?>
                    <p>To find the 2nd edition, type "2nd edition"</p>
            <?php endif; ?>
                        <form action="<?php echo home_url(); ?>" id="search-h_box" class="search-h_box" method="GET">
                            <div class="main-object_s">
                                <div class="s-object object-1">
																	<label for="s-text">
                                    <input type="text" name="s" id="s-text" class="input-s_box input-s_text" value="<?php echo $s; ?>" placeholder="<?php yp_text( 'ค้นหาข้อมูล', 'Search...' ); ?>">
																		</label>
                                </div>
																<div class="s-object object-2">
																		<button type="submit" class="btn-search_h btn-sh"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button>
																</div>
                            </div>
                        </form>
                    </div>
		</div>
	</div>
  <?php
}

function in_thumb(){
  $hide = 1;
  $url = get_the_permalink();
  ?>
  <?php if ($hide == 1): ?>
    <div class="in-thumb-overlay">
      <a href="<?php echo $url; ?>" class="" title="<?php the_title(); ?>">
        <span class="in-view-more icon"><i aria-hidden="true" class="flaticon-plus"></i></span>
      </a>
      </div>
  <?php endif;
}
function in_thumb_url($url){
  $hide = 1;
  if ($url == '') {
    $url = get_the_permalink();
  }
  ?>
  <?php if ($hide == 1): ?>
    <div class="in-thumb-overlay">
      <a href="<?php echo $url; ?>" class="" title="<?php the_title(); ?>">
        <span class="in-view-more icon"><i aria-hidden="true" class="flaticon-plus"></i></span>
      </a>
      </div>
  <?php endif;
}

function overwrite_shortcode() {

    function wpdm_package($atts) {
        extract(shortcode_atts(array('id' => ''), $atts));
				ob_start();
			    $ID = $id;
			    $package = WPDM()->package->init($ID);
			      $fileinfo = maybe_unserialize(get_post_meta($ID, '__wpdm_fileinfo', true));
			    $files = maybe_unserialize($package->files);
			    $allfiles = $files;
			    $count = count($allfiles);

			    $permalink = get_permalink($ID);
			    $sap = strpos($permalink, '?') ? '&' : '?';
			    $download_all_url = $permalink . $sap . "wpdmdl={$ID}";
			    $package_download_url = $package->getDownloadURL($ID);
			    ?>


			<div class="list-download wpdm_package">
			  <div class="menu">
			    <div class="date-public">
			      <i class="far fa-calendar"></i>
			      <p><?php yp_text('วันที่เผยแพร่','Publish Date'); ?></p>
			      <h4><?php the_date('d M y') ?></h4>
			    </div>
			    <div class="file-count">
			      <i class="fas fa-file-download"></i>
			      <p><?php yp_text('จำนวนไฟล์','Number of files'); ?></p>
			      <h4><?php echo $count; ?></h4>
			    </div>
			  </div>
			  <div class="list">


			    <ul>
			    <?php
			    foreach ($allfiles as $fileID => $sfile) {
			    // $filePass = wpdm_valueof($fileinfo, "{$fileID}/password");
			    $fileTitle = wpdm_valueof($fileinfo, "{$fileID}/title");
			    $fileTitle = $fileTitle ?: preg_replace("/([0-9]+)_/", "", wpdm_basename($sfile));
			    $fileTitle = wpdm_escs($fileTitle);
			    $ind = $fileID; //\WPDM_Crypt::Encrypt($sfile);
			    $download_url = add_query_arg(['ind' => $ind, 'filename' => wp_basename($sfile)], $package_download_url);


			    $ext = pathinfo($sfile, PATHINFO_EXTENSION);

			    if ($ext == 'pdf') {
			        $file_icon_type = get_stylesheet_directory_uri().'/img/pdf.svg';
			    }

			   else if ($ext == 'xlsx') {
			        $file_icon_type = get_stylesheet_directory_uri().'/img/xls.svg';
			    }

			    else if ($ext == 'xls') {
			        $file_icon_type = get_stylesheet_directory_uri().'/img/xls.svg';
			    }

			    else if ($ext == 'doc') {
			        $file_icon_type = get_stylesheet_directory_uri().'/img/doc.svg';
			    }

			   else if ($ext == 'docx') {
			        $file_icon_type = get_stylesheet_directory_uri().'/img/doc.svg';
			    }

			   else if ($ext == 'ppt') {
			        $file_icon_type = get_stylesheet_directory_uri().'/img/pptx.svg';
			    }

			   else if ($ext == 'pptx') {
			        $file_icon_type = get_stylesheet_directory_uri().'/img/pptx.svg';
			    }
			    else {
			         $file_icon_type = get_stylesheet_directory_uri().'/img/log.svg';
			     }
			    ?>


			    <li class="file">
			    <img src="<?php echo $file_icon_type; ?>" alt="<?php echo $fileTitle; ?>">
			      <div class="detail"><?php echo $fileTitle; ?></div>
			      <a target="_blank" href="<?php echo $download_url; ?>">
			        <i class="fas fa-download fa-fw"></i> <?php yp_text('ดาวน์โหลด','Download'); ?>
			      </a>
			    </li>

			  <?php } ?>
			</ul>

			    <div class="detail-button">
			      <a href="<?php echo $download_all_url; ?>" class="download-all">
			        <i class="fas fa-download"></i> <?php yp_text('ดาวน์โหลดทั้งหมด','Download All'); ?>
			      </a>
			      <a href="#" class="report">
			        <i class="fas fa-exclamation-circle fa-lg"></i> <?php yp_text('แจ้งไฟล์เสีย','Report'); ?>
			      </a>
			    </div>
			  </div>


			</div>



			<?php
			$output_string = ob_get_contents();
			ob_end_clean();
			return $output_string;
    }

    remove_shortcode('wpdm_package');
    add_shortcode('wpdm_package', 'wpdm_package');
}

add_action('wp_loaded', 'overwrite_shortcode');


add_action('fluentform_before_insert_submission', 'unsubscribe_function', 10, 3);
function unsubscribe_function($insertData, $data, $form)
{
  if($form->title != 'Unsubscribe TH' && $form->title != 'Unsubscribe EN') {
     return;
  }
        // wp_mail( $to, $subject, $body, $headers );
    $post_id = post_exists($data['email']);

    if ($post_id != '0') {
      wp_delete_post( $post_id, true);
    }
    else {
      $form->settings['confirmation']['messageToShow'] = 'ไม่พบ Email ของคุณ';
    }

}



add_filter('fluentform_before_insert_submission', 'subscribe_function', 10, 3);

function subscribe_function($insertData, $data, $form)
{
  if($form->title != 'Subscription TH' && $form->title != 'Subscription EN') {
     return;
  }


    global $user_ID;


    if (post_exists($data['email']) == '0') {
      $post = array(
          'post_type' => 'e-newsletter',
          'post_name' => $data['email'], //slug
          'post_title' => $data['email'],
          'post_author' => $user_ID,
          'post_status' => 'publish',
          'ping_status' => 'closed',
          'comment_status' => 'closed',
      );

      $post_id  = wp_insert_post($post);


      if (!empty($data['category_data'])) {
            $category_data = implode(',',$data['category_data']);
      }
      else {
        $category_data = '-';
            // wp_send_json_error('คุณโหวตแล้ว');
      }


      update_field('email_sub',$data['email'],$post_id);
      update_field('sub_type',$category_data,$post_id);
      update_field('ref_code',base64_encode($post_id),$post_id);
      update_field('enew_status','not_confirm',$post_id);

      ob_start();
      $url = get_home_url().'/e-newsletter/?confirm_email=1&ref='.base64_encode($post_id);
      ?>
        <h4><?php yp_text('คลิกลิงค์ได้ล่างเพื่อยืนยันอีเมล','Click the link below to verify your email.'); ?></h4>
        <a href="<?php echo $url; ?>"><?php echo $url; ?></a>
      <?php
      $output_string = ob_get_contents();
      ob_end_clean();

      $to = $data['email'];
      $subject = yp_text_get('กรุณายืนยันอีเมล','Please Comfirm Email');
      $body =  $output_string;
      $headers = array('Content-Type: text/html; charset=UTF-8');

      wp_mail( $to, $subject, $body, $headers );
    }
    else {
      wp_send_json_error(yp_text_get('คุณสมัครรับข้อมูลแล้ว','You are already subscribed'));
    }

    // return $form;
}


function save_confirm(){
  if (isset($_GET['confirm_email'])) {
      $post_id = base64_decode($_GET['ref']);
      if (get_field('enew_status',$post_id) == 'not_confirm') {
          update_field('enew_status','confirmed',$post_id);
      }
  }
}
add_action('init','save_confirm');

function tax_field($atts) {
		ob_start();
		$mine = array();
		$categories = get_categories(array(
			'orderby'   => 'name',
			'parent'   => 0,
			'order'     => 'ASC'
		));
?>
<div class="ff-el-input--label full-width">
	<label for="category_data"><?php yp_text('กรุณาเลือกประเภทของข่าวสารที่คุณมีความสนใจในการติดตาม','Please select the type of news you are interested in following'); ?></label>
</div>
	<?php
	foreach ($categories as $category ) {
		 $mine[$category->term_id] = $category->name;
	 ?>
   <label class="category_data" for="category_data_<?php echo $category->term_id; ?>">
     <input type="checkbox" id="category_data_<?php echo $category->term_id; ?>"  name="category_data[]" value="<?php echo $category->term_id; ?>">
     <?php echo $category->name; ?>
 </label>
	<?php  }
$output_string = ob_get_contents();
ob_end_clean();
return $output_string;
}
add_shortcode('tax_field','tax_field');

//shortcode ob_start
function e_news_shortcode($atts) {
  $atts = extract(
    shortcode_atts(
    array(
      'subscription' => '',
      'unsubscribe' => ''
    ),$atts)
  );
	ob_start();
?>
<link rel='stylesheet' id='vc-fontawesome-solid-2' href='<?php echo site_url(); ?>/wp-content/plugins/elementor/assets/lib/font-awesome/css/solid.min.css' media='all' />
<link rel='stylesheet' id='vc-fontawesome-2' href='<?php echo site_url(); ?>/wp-content/plugins/elementor/assets/lib/font-awesome/css/fontawesome.min.css' media='all' />
  <?php if (isset($_GET['confirm_email'])): ?>
    <div class="confirm_box">
      <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
      <h4><?php yp_text('คุณยืนยันอีเมลเรียบร้อยแล้ว','You have successfully verified your email'); ?></h4>
      <a href="<?php echo home_url('/e-newsletter'); ?>"><?php yp_text('ย้อนกลับ','Go back'); ?></a>
    </div>
    <?php else: ?>
      <div class="e_news_shortcode">
        <div class="left">
          <div class="nav-menu-left">
            <div class="venew-title">
              <h4><?php yp_text('เมนู','Menu'); ?></h4>
              <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
            </div>
            <ul>
              <li data-id="content-subscription" class="active"><?php yp_text('สมัครรับข่าวสาร','Subscription'); ?></li>
              <li data-id="content-unsubscribe"><?php yp_text('ยกเลิกสมัครรับข่าวสาร','Unsubscribe'); ?></li>
            </ul>
          </div>
        </div>
        <div class="right">
          <div class="content-item content-subscription active">
            <h2><?php yp_text('สมัครรับข่าวสาร','Subscription'); ?></h2>
            <?php echo do_shortcode('[fluentform id="'.$subscription.'"]'); ?>
          </div>
          <div class="content-item content-unsubscribe">
              <h2><?php yp_text('ยกเลิกสมัครรับข่าวสาร','Unsubscribe'); ?></h2>
            <?php echo do_shortcode('[fluentform id="'.$unsubscribe.'"]'); ?>
          </div>
        </div>
      </div>
      <script type="text/javascript">
          jQuery(document).ready(function($) {
            $('.reset-form').click(function(event) {
              $('.e_news_shortcode input').val('');
              $('.e_news_shortcode .category_data input,.e_news_shortcode .sub_lang input').prop('checked', false);
            });

            $('.nav-menu-left li').click(function(event) {
               $('.nav-menu-left li,.content-item').removeClass('active');
               $(this).addClass('active');
               var data = $(this).attr('data-id');
               $('.'+data).addClass('active');
            });
          });
      </script>
  <?php endif; ?>
<?php
	$output_string = ob_get_contents();
	ob_end_clean();
	return $output_string;

}
add_shortcode('e_news_shortcode', 'e_news_shortcode');



function v_page_title(){
  // $setting_theme = get_field('setting_theme', 'option');

      get_template_part( 'template-parts/page-title-archive-s2');

  // if (is_archive()) {
    // switch ($setting_theme) {
    //   case 'one':
    //       get_template_part( 'template-parts/page-title-archive-s2');
    //     break;
    //   case 'two':
    //       get_template_part( 'template-parts/page-title-archive-s1');
    //     break;
    //   case 'three':
    //       get_template_part( 'template-parts/page-title-archive-s1');
    //       break;
    //   case 'four':
    //       get_template_part( 'template-parts/page-title-archive-s2');
    //   break;
    //   case 'five':
    //       get_template_part( 'template-parts/page-title-archive-s2');
    //   break;
    //   case 'six':
    //       get_template_part( 'template-parts/page-title-archive-s2');
    //   break;
    //   case 'seven':
    //       get_template_part( 'template-parts/page-title-archive-s2');
    //   break;
    //   case 'eight':
    //       get_template_part( 'template-parts/page-title-archive-s1');
    //   break;
    //   case 'nine':
    //       get_template_part( 'template-parts/page-title-archive-s1');
    //   break;
    //   case 'ten':
    //       get_template_part( 'template-parts/page-title-archive-s1');
    //   break;
    //   case 'eleven':
    //       get_template_part( 'template-parts/page-title-archive-s1');
    //   break;
    //   default:
    //       get_template_part( 'template-parts/page-title-archive-s1');
    //     break;
    // }
  // }

}

add_filter( 'body_class', 'yp_add_theme_class' );
function yp_add_theme_class( $classes ) {
		if ( get_field('setting_theme','option') ) {
			$classes[] = 'theme-'.get_field('setting_theme','option').' lang-'.get_locale();
		}
    if ( $_COOKIE['boxColor'] ) {
      $classes[] = $_COOKIE['boxColor'];
    }
    if ( $_COOKIE['vSize'] ) {
      $classes[] = $_COOKIE['vSize'];
    }

    return $classes;
}

// function set_primary_on_publish ($post_ID) {
//     global $post;
//
// 				// Only set for post_type = post!
// 		 if ( 'post' !== $post->post_type ) {
// 				 return;
// 		 }
//
//     $categories = get_the_terms( $post->ID, 'category' );
//
//     // wrapper to hide any errors from top level categories or products without category
//     if ( $categories && ! is_wp_error( $category ) ) :
//
//         // loop through each cat
//         foreach($categories as $category) :
//
//           // get the children (if any) of the current cat
//           $children = get_categories( array ('taxonomy' => 'category', 'parent' => $category->term_id ));
//
//           if ( count($children) == 0 ) {
//                 $childid = $category->term_id;
//                 update_post_meta($post->ID,'_yoast_wpseo_primary_category',$childid);
//           }
//         endforeach;
//     endif;
// }
//
// add_action( 'save_post', 'set_primary_on_publish', 10, 2 );
// add_action( 'edit', 'set_primary_on_publish', 10, 2 );
// add_action( 'wp_insert_post', 'set_primary_on_publish', 10, 2 );





// function yp_add_year(){
//
//   if ($_GET['run'] == 1) {
//
//     $args = array(
//     'post_type' => array( 'post'),
//     'posts_per_page'  =>  300,
//      // 'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
//     'orderby'    => 'date',
//     'order'    => 'DESC'
//     );
//                 // $args['search_filter_id'] = 3567;
//     query_posts( $args );
//
//     while ( have_posts() ) :
//       the_post();
//
//         $post_year = get_the_date('Y',get_the_ID());
//         $term_id = term_exists( $post_year, 'post_year' );
//         echo   $post_year;
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
//     endwhile;
//
//   }
//
// }
// add_action('init','yp_add_year');



//
// function set_front_page_template() {
// 	$screen = get_current_screen();
// 	if (strpos($screen->id, "theme-general-settings") == true) {
//
// 		$values = $_POST['acf']['field_61c4896edaa1b'];
//
//     if( isset($values) ) {
// 			if ($values == 'one') {
// 				update_option( 'page_on_front', 3655 );
// 			}
// 			if ($values == 'two') {
// 				update_option( 'page_on_front', 3800 );
// 			}
// 			if ($values == 'three') {
// 				update_option( 'page_on_front', 15 );
// 			}
// 			if ($values == 'four') {
// 				update_option( 'page_on_front', 3808 );
// 			}
// 			if ($values == 'five') {
// 				update_option( 'page_on_front', 3817 );
// 			}
// 			if ($values == 'six') {
// 				update_option( 'page_on_front', 3821 );
// 			}
// 			if ($values == 'seven') {
// 				update_option( 'page_on_front', 3830 );
// 			}
// 			if ($values == 'eight') {
// 				update_option( 'page_on_front', 4294 );
// 			}
// 			if ($values == 'nine') {
// 				update_option( 'page_on_front', 4295 );
// 			}
// 			if ($values == 'ten') {
// 				update_option( 'page_on_front', 5080 );
// 			}
// 			if ($values == 'eleven') {
// 				update_option( 'page_on_front', 5082 );
// 			}
//
// 			update_option( 'show_on_front', 'page' );
//     }
// 	}
// }
// add_action('acf/save_post', 'set_front_page_template', 20);



//Save our extra registration user meta.
// add_action('init', 'save_edit_profile_yp');
// function save_edit_profile_yp () {
//
//
// 	if (isset( $_POST['act_eProfile_ID'] )) {
//
// 		$user_id = $_POST['act_eProfile_ID'];
//
// 		if (isset( $_POST['first_name'] )) {
// 		  update_user_meta($user_id, 'first_name', $_POST['first_name']);
// 		}
//
// 		if (isset( $_POST['last_name'] )) {
// 			update_user_meta($user_id, 'last_name', $_POST['last_name']);
// 		}
//
// 		if (isset( $_POST['user_email'] )) {
// 			update_user_meta($user_id, 'user_email', $_POST['user_email']);
// 		}
//
// 		if (isset( $_POST['acf'] )) {
// 		update_field('field_617faf150d8af', $_POST['acf']['field_617faf150d8af'], 'user_'.$user_id);
// 		}
//
// 		if ($_POST['confirm_password'] != '' && $_POST['user_password'] != '') {
// 			wp_set_password( $_POST['confirm_password'], $user_id );
// 		}
//
// 		wp_redirect(home_url('/edit-profile?update=true#message'));
// 		exit();
// 	}
//
//
// }




add_action( 'admin_enqueue_scripts', 'yp_load_admin_styles' );
function yp_load_admin_styles() {
  wp_enqueue_script( 'admin_script_yp', get_template_directory_uri() . '/js/admin_script_yp.js', false, wp_get_theme()->get( 'Version' ) );
  wp_enqueue_style( 'admin_css_yp', get_template_directory_uri() . '/css/admin_css_yp.css', false, wp_get_theme()->get( 'Version' ) );
}

function yp_reg_bottom_banner() {
  // wp_enqueue_style( 'sarabun_font', get_template_directory_uri() . '/fonts/sarabun/stylesheet.css', false, '1.0.0' );
wp_enqueue_style( 'chulabhorn_font', get_template_directory_uri() . '/fonts/chulabhorn/stylesheet.css', false, wp_get_theme()->get( 'Version' ) );

      // wp_enqueue_script( 'bottom-banner-script', get_template_directory_uri() . '/js/bottom_banner.js', array('jquery') );
      // wp_localize_script( 'bottom-banner-script', 'bottom_banner_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

      // wp_enqueue_style( 'fontawesome-solid-all-page', site_url() . '/wp-content/plugins/elementor/assets/lib/font-awesome/css/solid.min.css', false, '1.0.0' );
      // wp_enqueue_style( 'fontawesome-all-page', site_url() . '/wp-content/plugins/elementor/assets/lib/font-awesome/css/fontawesome.min.css', false, '1.0.0' );
 }
 add_action( 'wp_enqueue_scripts', 'yp_reg_bottom_banner' );







 add_filter('use_block_editor_for_post_type', 'prefix_disable_gutenberg', 10, 2);
 function prefix_disable_gutenberg($current_status, $post_type)
 {
     // Use your post type key instead of 'product'
     // if ($post_type != 'vc_photo')

     return false;
     return $current_status;
 }



function is_elementor() {
	if ( function_exists( 'elementor_load_plugin_textdomain' ) )
	{
	    global $post;
	    // return \Elementor\Plugin::$instance->db->is_built_with_elementor($post->ID);
      // return \Elementor\Plugin::$instance->documents->get( $post->ID )->is_built_with_elementor();
      if (!empty($post->ID)) {
        return Elementor\Plugin::$instance->documents->get( $post->ID )->is_built_with_elementor();
      }
      // Elementor\Plugin::instance()->db->is_built_with_elementor( $post->ID  );
	}
}
function is_used_elementor($id) {
	if ( function_exists( 'elementor_load_plugin_textdomain' ) )
	{
      if (!empty($id)) {
        return Elementor\Plugin::$instance->documents->get( $id )->is_built_with_elementor();
      }
	}
}
function rocket_lazyload_exclude_class( $attributes ) {
	$attributes[] = 'class="custom-logo"';
	return $attributes;
}
add_filter( 'rocket_lazyload_excluded_attributes', 'rocket_lazyload_exclude_class' );

function yp_loading(){
  ?>
  <?php if (empty($_GET['type'])): ?>
    <div class="wrap-loader-cri">
      <div class="top"></div>
      <div class="bottom"></div>
      <div class="in">
        <div class="loader-cri">
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
      jQuery(document).ready(function($) {
        setTimeout(function () {
          $('.wrap-loader-cri').addClass('hide-loader');
        }, 800);
        setTimeout(function () {
          $('.wrap-loader-cri').addClass('hide-loader-2');
        }, 900);
        setTimeout(function () {
          $('.wrap-loader-cri').addClass('hide');
        }, 1800);
      });
    </script>
  <?php endif; ?>

  <?php
}
add_filter( 'wp_head', 'yp_loading' );

add_action('wp_head', function() { echo '<script type="text/javascript"> if (typeof(wp) == "undefined") { window.wp = { i18n: { setLocaleData: (function() { return false; })} }; } </script>'; });

function vecular_prefix_menu_arrow($item_output, $item, $depth, $args) {
		if (in_array('menu-item-has-children', $item->classes)) {
				$arrow = '<div class="wrap-toggle-mobile"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg></div>'; // Change the class to your font icon
				$item_output = str_replace('</a>', '</a>'. $arrow .'', $item_output);
		}
		return $item_output;
}
add_filter('walker_nav_menu_start_el', 'vecular_prefix_menu_arrow', 10, 4);


if ( ! function_exists( 'fluffy_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function fluffy_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on fluffy, use a find and replace
		 * to change 'fluffy' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'fluffy', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'fluffy' ),
				'mobile' => esc_html__( 'Mobile Menu', 'fluffy' ),
      	'menu-roadmap-footer' => esc_html__( 'Bottom Menu', 'fluffy' )
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'fluffy_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'fluffy_setup' );

function new_labels(){
  $date = get_the_date('m-d');
  $y = get_the_date('Y');
  if (get_locale() == 'th') {
      $y = get_the_date('Y')-543;
  }

  $final = $y.'-'.$date;

    if( strtotime($final) > strtotime('-4 day') ) {
      echo '<div class="new-label">';
      yp_text('มาใหม่','New');
      echo '</div>';
    }
}




/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fluffy_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fluffy_content_width', 640 );
}
add_action( 'after_setup_theme', 'fluffy_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
 function fluffy_widgets_init() {
 	register_sidebar(
 		array(
 			'name'          => esc_html__( 'Sidebar', 'fluffy' ),
 			'id'            => 'sidebar-1',
 			'description'   => esc_html__( 'Add widgets here.', 'fluffy' ),
 			'before_widget' => '<section id="%1$s" class="widget %2$s">',
 			'after_widget'  => '</section>',
 			'before_title'  => '<h2 class="widget-title">',
 			'after_title'   => '</h2>',
 		)
 	);

   register_sidebar(
     array(
       'name'          => esc_html__( 'Footer Widget 1', 'fluffy' ),
       'id'            => 'footer-widget-1',
       'description'   => esc_html__( 'Add widgets here.', 'fluffy' ),
       'before_widget' => '<section id="%1$s" class="widget %2$s">',
       'after_widget'  => '</section>',
       'before_title'  => '<h4 class="widget-title">',
       'after_title'   => '</h4>',
     )
   );

   register_sidebar(
     array(
       'name'          => esc_html__( 'Footer Widget 2', 'fluffy' ),
       'id'            => 'footer-widget-2',
       'description'   => esc_html__( 'Add widgets here.', 'fluffy' ),
       'before_widget' => '<section id="%1$s" class="widget %2$s">',
       'after_widget'  => '</section>',
       'before_title'  => '<h4 class="widget-title">',
       'after_title'   => '</h4>',
     )
   );

   register_sidebar(
     array(
       'name'          => esc_html__( 'Footer Widget 3', 'fluffy' ),
       'id'            => 'footer-widget-3',
       'description'   => esc_html__( 'Add widgets here.', 'fluffy' ),
       'before_widget' => '<section id="%1$s" class="widget %2$s">',
       'after_widget'  => '</section>',
       'before_title'  => '<h4 class="widget-title">',
       'after_title'   => '</h4>',
     )
   );

   register_sidebar(
     array(
       'name'          => esc_html__( 'Footer Widget 4', 'fluffy' ),
       'id'            => 'footer-widget-4',
       'description'   => esc_html__( 'Add widgets here.', 'fluffy' ),
       'before_widget' => '<section id="%1$s" class="widget %2$s">',
       'after_widget'  => '</section>',
       'before_title'  => '<h4 class="widget-title">',
       'after_title'   => '</h4>',
     )
   );

   register_sidebar(
     array(
       'name'          => esc_html__( 'Footer Widget 5', 'fluffy' ),
       'id'            => 'footer-widget-5',
       'description'   => esc_html__( 'Add widgets here.', 'fluffy' ),
       'before_widget' => '<section id="%1$s" class="widget %2$s">',
       'after_widget'  => '</section>',
       'before_title'  => '<h4 class="widget-title">',
       'after_title'   => '</h4>',
     )
   );


 }
 add_action( 'widgets_init', 'fluffy_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fluffy_scripts() {
	// wp_enqueue_script( 'yp_chart', get_template_directory_uri() . '/js/chart.js','','',true );

	wp_enqueue_style( 'fluffy-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
	wp_style_add_data( 'fluffy-style', 'rtl', 'replace' );
	wp_enqueue_style( 'fluffy-main', get_template_directory_uri(). '/css/main.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'fluffy-child-style', get_template_directory_uri(). '/css/child-style.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_script( 'jsxp-script', get_template_directory_uri() . '/js/style.js', array('jquery'), true );
	wp_enqueue_script( 'vecular-script', get_template_directory_uri() . '/js/vecular.js', array('jquery'), wp_get_theme()->get( 'Version' ), true );

  wp_enqueue_script( 'wow-script', get_template_directory_uri() . '/js/wow.min.js', wp_get_theme()->get( 'Version' ), true );
  wp_enqueue_style( 'animated-style', get_template_directory_uri(). '/css/animate.min.css', array(), wp_get_theme()->get( 'Version' ) );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fluffy_scripts' );



// Enable media_library_infinite_scrolling
class Enable_Media_Library_Infinite_Scrolling {
	public function __construct() {
		$this->add_hooks();
	}
	public function add_hooks() {
		add_filter( 'media_library_infinite_scrolling', '__return_true' );
	}
}
new Enable_Media_Library_Infinite_Scrolling();

 // Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
// Disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



add_filter('acf/settings/save_json', 'yp_acf_json_save_point');

function yp_acf_json_save_point( $path ) {
    // update path
    $path = get_stylesheet_directory() . '/acf-json';
    // return
    return $path;
}



add_filter('acf/settings/load_json', 'yp_acf_json_load_point');

function yp_acf_json_load_point( $paths ) {
   // remove original path (optional)
   unset($paths[0]);
   // append path
   $paths[] = get_stylesheet_directory() . '/acf-json';
   // return
   return $paths;
}


add_filter( 'wp_image_editors', 'change_graphic_lib' );

function change_graphic_lib($array) {
return array( 'WP_Image_Editor_GD', 'WP_Image_Editor_Imagick' );
}
add_filter( 'big_image_size_threshold', '__return_false' );
