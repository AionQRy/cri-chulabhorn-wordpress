<div class="e-rightbar">
  <h3 class="widget-title section-title">
      <?php yp_text('กิจกรรมที่ใกล้จะถึง','Upcoming Event'); ?>
  </h3>
  <?php
  $args = array(
   'post_type' =>  'mec-events',
   'order' => 'DESC',
   'orderby' => 'date',
   'meta_query' => array( // WordPress has all the results, now, return only the events after today's date
   array(
     'key' => 'mec_start_date', // Check the start date field
     'value' => date("Y-m-d"), // Set today's date (note the similar format)
     'compare' => '>=', // Return the ones greater than today's date
     'type' => 'DATE' // Let WordPress know we're working with date
     )
   ),
   'posts_per_page' => 3
 );
 $the_query = new WP_Query( $args );
 if ($the_query->have_posts()) {
   while ( $the_query->have_posts() ) {
       $the_query->the_post();
  ?>
  <article class="vevent-card mec-event-article" itemscope>
      <?php

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



      ?>
      <div class="mec-event-vdate">
        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
        <span>
          <?php
          // echo date_i18n( "d", $str_format );
          if (date_i18n( "d", $str_format ) == date_i18n( "d", $end_format )) {
            $vdate =  date_i18n( "d", $str_format ).' '. date_i18n( "M", $str_format ).
             ' '.$year;
             ?>
             <div class="big1">
               <b><?php echo date_i18n( "d", $str_format ); ?></b>
             </div>
             <div class="big2">
                    <span><?php echo date_i18n( "M", $str_format ).' '.$year; ?></span>
             </div>
             <?php
          }
          else {
            if(date_i18n( "m Y", $str_format ) == date_i18n( "m Y", $end_format ) ){
            ?>
                 <div class="l1">
                   <b><?php
                   echo date_i18n( "d", $str_format ) . '-' . date_i18n( "d", $end_format );
                    ?></b>
                    <span><?php echo date_i18n( "M", $str_format ).' '.$year;; ?></span>
                 </div>
                 <?php
            }else{
                // $vdate =  get_post_meta( get_the_ID(), 'mec-events-abbr', true );
                ?>
                  <div class="line-1">
                    <b><?php echo date_i18n( "d", $str_format ); ?></b>
                    <span><?php echo date_i18n( "M", $str_format ).' '.$year;; ?></span>
                  </div>
                  <div class="vdivider"></div>
                  <div class="line-2">
                    <b><?php echo date_i18n( "d", $end_format ); ?></b>
                    <span><?php echo date_i18n( "M", $end_format ).' '.$year;; ?></span>
                  </div>
                <?php
            }
          }

          ?>
        </span>
      </div>
      <div class="mec-event-content">
          <h3 class="mec-event-title">
            <?php the_title(); ?>
          </h3>

          <div class="vdate-in">
            <div class="vdate">
              <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
              <?php
              // if (date_i18n( "d", $str_format ) == date_i18n( "d", $end_format )) {
              //   $vdate =  date_i18n( "d", $str_format ).' '. date_i18n( "F", $str_format ).
              //    ' '. date_i18n( "Y", $str_format );
              // }
              // else {
              //   if(date_i18n( "m Y", $str_format ) == date_i18n( "m Y", $end_format ) ){
              //       $vdate =  date_i18n( "d", $str_format ) . '-' . date_i18n( "d", $end_format ). ' '. date_i18n( "F", $str_format ).
              //        ' '. date_i18n( "Y", $str_format );
              //   }else{
              //       // $vdate =  get_post_meta( get_the_ID(), 'mec-events-abbr', true );
              //       $vdate =  date_i18n( "d F Y", $str_format ) .  '-'. date_i18n( "d F Y", $end_format );
              //   }
              // }


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

              echo $vdate.'<BR>'.yp_text_get('เวลา','Time').'&nbsp;&nbsp;'.$vtime;
               ?>
            </div>
            <?php
               $mec_location = get_the_terms(get_the_ID(), 'mec_location');
               $types ='';
               foreach($mec_location as $term_single) {
                    $types .= ucfirst($term_single->name).'';
               }
               $typesx = rtrim($types, '');
               ?>
            <?php if ( $mec_location ) :  ?>
              <div class="vplace">
                  <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                  <span><?php echo $typesx; ?></span>
              </div>
            <?php endif; ?>
          </div>
          <div class="vmore">
              <a href="<?php echo get_the_permalink(get_the_ID()); ?>">
                <?php yp_text('อ่านเพิ่มเติม','Read More'); ?>
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="9 18 15 12 9 6"></polyline></svg>
              </a>
          </div>
      </div>

      <a href="<?php echo get_the_permalink(get_the_ID()); ?>" class="link-all"></a>
  </article>
  <?php
     }
    wp_reset_postdata();
 }
   ?>
</div>
