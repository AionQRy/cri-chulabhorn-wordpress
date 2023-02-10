<header class="entry-header">
  <div class="wrap-thumb-header page-box">

    <div class="v-container">
         <h1 class="byline">
           <?php
           if (is_archive()) {
             single_cat_title();
           }
           if (is_page()) {
             the_title();
           }
           if (is_home()) {
             yp_text('ข่าวทั้งหมด','All Archive');
           }
              ?>
         </h1>
    </div>

  <div class="yp_breadcrumb">
    <div class="v-container">
      <?php
        if ( function_exists('yoast_breadcrumb') ) {
          yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
        }
       ?>
    </div>
  </div>

</div>
</header><!-- .entry-header -->
