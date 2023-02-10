<?php
global $wp_query;
$is_search = $wp_query->query['sfid'];
if (get_post_type() == 'vc_photos' && empty($is_search) || is_post_type_archive('vc_photos') ) {
    $vpostype_title = yp_text_get('ภาพข่าว','News Photo');
    $bg_title = get_stylesheet_directory_uri().'/img/photo-title.jpg';
    if (is_tax('vc_photo_category') || is_tax('vc_photo_tags')) {
      $current_term = get_queried_object();
      $vpostype_title = $current_term->name;
    }
}
elseif (is_home() || is_category() || is_tag()) {
    $vpostype_title = yp_text_get('ข่าวสารและกิจกรรม','News & Events');
    if (is_category() || is_tag()) {
      $current_term = get_queried_object();
      $vpostype_title = $current_term->name;
    }
    $bg_title = get_stylesheet_directory_uri().'/img/video-title.jpg';
}
elseif (get_post_type() == 'vc_videos' && empty($is_search) || is_post_type_archive('vc_videos') ) {
    $vpostype_title = yp_text_get('คลังวีดีโอ','Video Library');
    if (is_tax('vc_video_category') || is_tax('vc_video_tags')) {
      $current_term = get_queried_object();
      $vpostype_title = $current_term->name;
    }
    $bg_title = get_stylesheet_directory_uri().'/img/video-title.jpg';
}
elseif (get_post_type() == 'vc_ebook' && empty($is_search) || is_post_type_archive('vc_ebook') ) {
  $vpostype_title = yp_text_get('วารสารออนไลน์','Chulabhorn Foundation Newsletters');
  if (is_tax('vc_ebook_category') || is_tax('vc_ebook_tags')) {
    $current_term = get_queried_object();
    $vpostype_title = $current_term->name;
  }
  $bg_title = get_stylesheet_directory_uri().'/img/video-title.jpg';
}
elseif (get_post_type() == 'vc_downloadmanager' && empty($is_search) || is_post_type_archive('vc_downloadmanager') || is_tax('vc_download_category') || is_tax('vc_download_tags')) {
  $vpostype_title = yp_text_get('ดาวน์โหลด','Download');
  if (is_tax('vc_download_category') || is_tax('vc_download_tags')) {
    $current_term = get_queried_object();
    $vpostype_title = $current_term->name;
  }
  $bg_title = get_stylesheet_directory_uri().'/img/download-title.jpg';
}
elseif (get_post_type() == 'mec-events' && empty($is_search) || is_post_type_archive('mec-events') ) {
  $vpostype_title = yp_text_get('ปฏิทินกิจกรรม','Event Calendar');
  if (is_tax('mec_category') || is_tax('mec_tag')) {
    $current_term = get_queried_object();
    $vpostype_title = $current_term->name;
  }
  $bg_title = get_stylesheet_directory_uri().'/img/event-title.jpg';
}
elseif (get_post_type() == 'vc_weblink' && empty($is_search) || is_post_type_archive('vc_weblink')) {
  $vpostype_title = yp_text_get('Web link','Web link');
  if (is_tax('vc_weblink_category')) {
    $current_term = get_queried_object();
    $vpostype_title = $current_term->name;
  }
  $bg_title = get_stylesheet_directory_uri().'/img/title-weblink.jpg';
}
elseif (get_post_type() == 'vc_rss' && empty($is_search) || is_post_type_archive('vc_rss') ) {
  $vpostype_title = yp_text_get('RSS','RSS');
  if (is_tax('rss_category')) {
    $current_term = get_queried_object();
    $vpostype_title = $current_term->name;
  }
  $bg_title = get_stylesheet_directory_uri().'/img/rss-title.jpg';
}
elseif (get_post_type() == 'vc_publications' && empty($is_search) || is_post_type_archive('vc_publications') || is_tax('vc_publications_category')) {
  $vpostype_title = yp_text_get('สิ่งพิมพ์','Publications');
  if (is_tax('vc_publications_category')) {
    $vpostype_title = $archive_title;
  }
  $bg_title = get_stylesheet_directory_uri().'/img/publications-title.jpg';
}
elseif (is_page_template('page-polls.php') || is_tax('poll_cat')) {
  $vpostype_title = yp_text_get('แบบสำรวจความเห็น','Polls');
  if (is_tax('poll_cat')) {
    $current_term = get_queried_object();
    $vpostype_title = $current_term->name;
  }
  $bg_title = get_stylesheet_directory_uri().'/img/poll-title.jpg';
}
elseif (get_post_type() == 'vc_faqs' && empty($is_search) || is_post_type_archive('vc_faqs_category') || is_tax('vc_faqs_category')) {
  $vpostype_title = yp_text_get('คำถามที่พบบ่อย','FAQs');
  if (is_tax('vc_faqs_category')) {
    $current_term = get_queried_object();
    $vpostype_title = $current_term->name;
  }
  $bg_title = get_stylesheet_directory_uri().'/img/faq-title.jpg';
}
elseif (get_post_type() == 'page' && empty($is_search) ) {
  $vpostype_title = get_the_title();
  $bg_title = get_the_post_thumbnail_url(get_the_ID(),'full');
  if (empty($bg_title)) {
    $bg_title = get_stylesheet_directory_uri().'/img/video-title.jpg';
  }
  ?>
    <!-- <style media="screen">
   .vpost_title .in-title {
        right: 15%;
      }
    </style> -->
  <?php
}
else {
    $vpostype_title = get_post_type();
    if ($vpostype_title == 'post') {
      $vpostype_title = yp_text_get('ข่าวสารและกิจกรรม','News & Events');
    }
    else {
      $vpostype_title = get_post_type_object($vpostype_title);
      $vpostype_title = $vpostype_title->label;
      if (empty($vpostype_title)) {
            $vpostype_title = yp_text_get('ข่าวสารและกิจกรรม','News & Events');
      }
    }
    $bg_title = get_stylesheet_directory_uri().'/img/video-title.jpg';

    if (isset($is_search)) {
        $vpostype_title = yp_text_get('ค้นหา','Search');
        $bg_title = get_stylesheet_directory_uri().'/img/search-title.jpg';
    }
}

if (is_singular() && get_post_type() != 'page') {
  if (get_post_type() == 'poll') {
    $taxonomy_t = 'poll_cat';
  }
  elseif (get_post_type() == 'vc_downloadmanager') {
    $taxonomy_t = 'vc_download_category';
  }
  elseif (get_post_type() == 'vc_ebook') {
    $taxonomy_t = 'vc_ebook_category';
  }
  elseif (get_post_type() == 'vc_photos') {
    $taxonomy_t = 'vc_photo_category';
  }
  elseif (get_post_type() == 'vc_videos') {
    $taxonomy_t = 'vc_video_category';
  }
  elseif (get_post_type() == 'vc_weblink') {
    $taxonomy_t = 'vc_weblink_category';
  }
  elseif (get_post_type() == 'vc_rss') {
    $taxonomy_t = 'rss_category';
  }
  elseif (get_post_type() == 'vc_publications') {
    $taxonomy_t = 'vc_publications_category';
  }
  elseif (get_post_type() == 'vc_faqs') {
    $taxonomy_t = 'vc_faqs_category';
  }
  else {
      $taxonomy_t = 'category';
  }

  $cat_t = wp_get_object_terms( get_the_ID(), $taxonomy_t, array( 'fields' => 'names' ) );
  $vpostype_title = $cat_t[0];
}
?>
<div class="v-container">
  <div class="vpost_title" style="background:url('<?php echo $bg_title; ?>');">
    <div class="wrap-in-title">
        <div class="in-title">
          <?php
            echo $vpostype_title;
           ?>
        </div>
    </div>
  </div>
</div>

<div class="yp_breadcrumb">
  <div class="v-container">
    <?php
      if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb( '<p id="breadcrumbs"><a class="svg-b" href="'.get_home_url().'"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a><span class="divider"></span>','</p>' );
      }
     ?>
     <link rel='stylesheet' id='vc-fontawesome-solid-2' href='<?php echo site_url(); ?>/wp-content//plugins/elementor/assets/lib/font-awesome/css/solid.min.css' media='all' />
     <link rel='stylesheet' id='vc-fontawesome-2' href='<?php echo site_url(); ?>/wp-content/plugins/elementor/assets/lib/font-awesome/css/fontawesome.min.css' media='all' />

     <?php if (is_archive() && !is_post_type_archive('mec-events') ): ?>
       <?php if (is_archive() && !is_post_type_archive('vc_publications') && !is_tax('vc_publications_category') && !is_tax('vc_publications_year')): ?>
         <?php if (is_archive() && !is_post_type_archive('vc_faqs') && !is_tax('vc_faqs_category')): ?>
           <div class="right-rss-archive">
             <?php
             $post_type = get_post_type();
             $get_queried = get_queried_object();

             if (get_locale() == 'th') {
               $lang_rss = 'th';
             }
             else {
                $lang_rss = 'en';
             }

             if ($get_queried->taxonomy == '') {
               $url = get_site_url().'/wp-json/export-rss/is_archive/id/?post_type='.$post_type.'&items=10&lang='.$lang_rss;
             }
             else {
               $url = get_site_url().'/wp-json/export-rss/'.$get_queried->taxonomy.'/'.$get_queried->term_taxonomy_id.'/?post_type='.$post_type.'&items=10&lang='.$lang_rss;
             }
             ?>
             <!-- domain.com/wp-json/export-rss/post/category/74?items=2 -->
             <a target="_blank" href="<?php echo $url; ?>" class="yp_rss-export">
               <p>RSS</p>

               <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 310 310" style="enable-background:new 0 0 310 310;" xml:space="preserve">
               <g id="XMLID_788_">
                 <path id="XMLID_789_" d="M90.244,264.828C90.244,240.11,70.139,220,45.427,220c-24.715,0-44.822,20.11-44.822,44.828   c0,24.714,20.107,44.82,44.822,44.82C70.139,309.648,90.244,289.542,90.244,264.828z"/>
                 <path id="XMLID_790_" d="M5.648,169.43c35.961,0,69.782,14.066,95.231,39.605c25.45,25.583,39.467,59.648,39.467,95.92   c0,2.762,2.238,5,5,5h57.486c2.762,0,5-2.238,5-5c0-111.952-90.699-203.031-202.185-203.031c-2.762,0-5,2.238-5,5v57.505   C0.648,167.191,2.887,169.43,5.648,169.43z"/>
                 <path id="XMLID_791_" d="M5.726,0c-2.762,0-5,2.238-5,5v57.495c0,2.762,2.238,5,5,5c130.24,0,236.199,106.544,236.199,237.505   c0,2.762,2.238,5,5,5h57.471c2.762,0,5-2.238,5-5C309.396,136.822,173.17,0,5.726,0z"/>
               </g>
               </svg>
             </a>
           </div>
         <?php endif; ?>
       <?php endif; ?>
     <?php endif; ?>


     <?php
     if ( is_post_type_archive('mec-events') ):
       require('search-event-top.php');
     endif;

     if ( is_post_type_archive('vc_publications') || is_tax('vc_publications_category') || is_tax('vc_publications_year') ):
       require('search-publications.php');
     endif;

     if ( is_page_template('page-polls.php') ):
       require('search-polls.php');
     endif;

     if ( is_post_type_archive('vc_faqs') || is_tax('vc_faqs_category') ):
       require('search-faqs.php');
     endif;
      ?>
  </div>
</div>
