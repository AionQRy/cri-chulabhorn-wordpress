<div class="publications-top polls-top">
  <?php
  $filter = get_page_by_path( $filter_slug, OBJECT, 'search-filter-widget' );

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

  echo '<div class="search-bar_ypx">';
  echo do_shortcode('[searchandfilter id="'.$filter_id.'"]');
  echo '</div>';
   ?>
</div>
<style media="screen">
  @media (max-width:767px) {
    .yp_breadcrumb .v-container {
      flex-wrap: wrap;
      gap: 10px;
    }
    .publications-top {
      width: 100%;
    }
  }
</style>
