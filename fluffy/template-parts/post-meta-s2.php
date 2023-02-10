<div class="post_title">
  <?php the_title( '<h1 class="entry-title">', '</h1>' );

    if (is_singular('mec-events')) {
      $str_old = get_post_meta( get_the_ID(), 'mec_start_date', true );
      $str_format = strtotime( $str_old );
      $end_old = get_post_meta( get_the_ID(), 'mec_end_date', true );
      $end_format = strtotime( $end_old );

      $str_time_hour = get_post_meta( get_the_ID(), 'mec_start_time_hour', true );
      $str_time_min = get_post_meta( get_the_ID(), 'mec_start_time_minutes', true );
      $str_time_am_pm = get_post_meta( get_the_ID(), 'mec_start_time_ampm', true );

      $end_time_hour = get_post_meta( get_the_ID(), 'mec_end_time_hour', true );
      $end_time_min = get_post_meta( get_the_ID(), 'mec_end_time_minutes', true );
      $end_time_am_pm = get_post_meta( get_the_ID(), 'mec_date_start', true );

      if (get_locale() == 'th') {
          $year = date_i18n( "Y", $str_format )+543;
      }
      else {
          $year = date_i18n( "Y", $str_format );
      }

      if (date_i18n( "d", $str_format ) == date_i18n( "d", $end_format )) {
        $vdate =  date_i18n( "d", $str_format ).' '. date_i18n( "F", $str_format ).
         ' '. $year;
      }
      else {
        if(date_i18n( "m Y", $str_format ) == date_i18n( "m Y", $end_format ) ){
            $vdate =  date_i18n( "d", $str_format ) . '-' . date_i18n( "d", $end_format ). ' '. date_i18n( "F", $str_format ).
             ' '. $year;
        }else{
            // $vdate =  get_post_meta( get_the_ID(), 'mec-events-abbr', true );
            $vdate =  date_i18n( "d F", $str_format ).' '.$year .  '-'. date_i18n( "d F", $end_format ).' '.$year;
        }
      }

      $vtime = sprintf("%02s", $str_time_hour).':'.sprintf("%02s", $str_time_min).' - '.sprintf("%02s", $end_time_hour).':'.sprintf("%02s", $end_time_min);

      $mec_location = get_the_terms(get_the_ID(), 'mec_location');
      $types ='';
      foreach($mec_location as $term_single) {
           $types .= ucfirst($term_single->name).'';
      }
      $typesx = rtrim($types, '');
      ?>
      <div class="mec-events-meta-s">
        <?php if ($vdate): ?>
          <div class="vdate">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
            <?php echo $vdate.'&nbsp;'.yp_text_get('เวลา','Time').'&nbsp;&nbsp;'.$vtime; ?>
          </div>
        <?php endif; ?>
        <?php if ( $mec_location ) :  ?>
          <div class="vplace">
              <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
              <span><?php echo $typesx; ?></span>
          </div>
        <?php endif; ?>
      </div>
      <?php
    }
   ?>
</div>
<div class="single-meta">
  <div class="left">
    <div class="post_type">
      <strong><?php yp_text('ประเภท','Type'); ?></strong>
      <?php
        if (!empty($taxonomy)) {
          $cat = wp_get_object_terms( get_the_ID(), $taxonomy, array( 'fields' => 'names' ) );
          $term_id  = wp_get_object_terms( get_the_ID(), $taxonomy, array( 'fields' => 'ids' ) );
          //
          ?>
          <?php if (!empty($term_id)):
            $term_link = get_term_link($term_id[0],$taxonomy);?>
            <a href="<?php echo $term_link; ?>">
              <?php echo $cat[0]; ?>
            </a>
          <?php endif; ?>
          <?php
        }
      ?>

    </div>
    <?php if (is_singular('mec-events')): ?>
      <?php if (get_field('organization')): ?>
      <div class="events-extra organizer">
        <strong><?php yp_text('หน่วยงาน',"Organizer"); ?></strong>
        <span>
            <?php the_field('organization'); ?>
        </span>
      </div>
        <?php endif; ?>
        <?php if (get_field('time_to')): ?>
        <div class="events-extra time_to">
          <strong><?php yp_text('ระยะเวลา',"Period"); ?></strong>
          <span>
              <?php the_field('time_to'); ?>
          </span>
        </div>
      <?php endif; ?>

    <?php endif; ?>
  </div>
  <div class="right">
    <div class="wrap-date-post">
        <?php
        $post_date = get_the_date( 'd M Y' ); ?>
        <span class="date-post_card">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="#0074bc" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
            <span class="text-card"><?php echo $post_date; ?></span>
        </span>
      <span class="post_view">
<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
        <?php if(get_current_blog_id() != 1) { echo do_shortcode('[ngd-single-post-view id="'. get_the_ID().'"]'); } else { echo do_shortcode('[post-views]'); } ?>
      </span>
      <div class="shared-count">
        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>
        <?php if (get_field('shared_count') == '') { echo '0'; } else { the_field('shared_count'); }; ?>
      </div>

    </div>
  </div>
</div>
