<?php

/** no direct access **/
defined('MECEXEC') or die();

$settings = $this->main->get_settings();
$days_in_month = date('t', mktime(0, 0, 0, $month, 1, $year));
$this->localtime = isset($this->skin_options['include_local_time']) ? $this->skin_options['include_local_time'] : false;
$map_events = [];
$showLoadMore = false;
$display_label = isset($this->skin_options['display_label']) ? $this->skin_options['display_label'] : false;
$display_cats = isset($this->skin_options['display_categories']) ? (boolean) $this->skin_options['display_categories'] : false;
$reason_for_cancellation = isset($this->skin_options['reason_for_cancellation']) ? $this->skin_options['reason_for_cancellation'] : false;
?>
<div class="mec-event-list-standard">
    <?php for ($list_day = 1; $list_day <= $days_in_month; $list_day++) { ?>
        <?php
        $time = strtotime($year . '-' . $month . '-' . $list_day);
        $today = date('Y-m-d', $time);
        ?>
        <?php if (isset($events[$today]) and count($events[$today])) { ?>
            <?php $showLoadMore = true; ?>
            <?php foreach ($this->events[$today] as $event) : ?>
                <?php
                $map_events[] = $event;
                $location = isset($event->data->locations[$event->data->meta['mec_location_id']]) ? $event->data->locations[$event->data->meta['mec_location_id']] : array();
                $organizer = isset($event->data->organizers[$event->data->meta['mec_organizer_id']]) ? $event->data->organizers[$event->data->meta['mec_organizer_id']] : array();
                $start_time = (isset($event->data->time) ? $event->data->time['start'] : '');
                $end_time = (isset($event->data->time) ? $event->data->time['end'] : '');
                $event_color = isset($event->data->meta['mec_color']) ? '#' . $event->data->meta['mec_color'] : '';
                $event_start_date = !empty($event->date['start']['date']) ? $event->date['start']['date'] : '';


                $event_id = $event->data->ID;
                $tickets = isset($event->data->tickets) ? $event->data->tickets : array();
                $dates = isset($event->dates) ? $event->dates : array($event->date);

                $occurrence_time = isset($dates[0]['start']['timestamp']) ? $dates[0]['start']['timestamp'] : strtotime($dates[0]['start']['date']);

                $default_ticket_number = 0;
                if (count($tickets) == 1) $default_ticket_number = 1;

                $book = $this->getBook();
                $availability = $book->get_tickets_availability($event_id, strtotime($event_start_date . ' ' . $event->data->time['start']));



                $spots = 0;
                foreach ($tickets as $ticket_id => $ticket) {
                    $spots = isset($availability[$ticket_id]) ? $availability[$ticket_id] : -1;
                }

                $label_style = '';
                if (!empty($event->data->labels)) {
                    foreach ($event->data->labels as $label) {
                        if (!isset($label['style']) or (isset($label['style']) and !trim($label['style']))) {
                            continue;
                        }
                        if ($label['style']  == 'mec-label-featured') {
                            $label_style = esc_html__('Featured', 'mec-fl');
                        } elseif ($label['style']  == 'mec-label-canceled') {
                            $label_style = esc_html__('Canceled', 'mec-fl');
                        }
                    }
                }

                $speakers = '""';
                if (!empty($event->data->speakers)) {
                    $speakers = [];
                    foreach ($event->data->speakers as $key => $value) {
                        $speakers[] = array(
                            "@type"     => "Person",
                            "name"      => $value['name'],
                            "image"     => $value['thumbnail'],
                            "sameAs"    => $value['facebook'],
                        );
                    }

                    $speakers = json_encode($speakers);
                }

                $schema_settings = isset($settings['schema']) ? $settings['schema'] : '';
                if ($schema_settings == '1') :
                ?>
                    <script type="application/ld+json">
                        {
                            "@context": "http://schema.org",
                            "@type": "Event",
                            "startDate": "<?php echo !empty($event->data->meta['mec_date']['start']['date']) ? $event->data->meta['mec_date']['start']['date'] : ''; ?>",
                            "endDate": "<?php echo !empty($event->data->meta['mec_date']['end']['date']) ? $event->data->meta['mec_date']['end']['date'] : ''; ?>",
                            "location": {
                                "@type": "Place",
                                "name": "<?php echo (isset($location['name']) ? $location['name'] : ''); ?>",
                                "image": "<?php echo (isset($location['thumbnail']) ? esc_url($location['thumbnail']) : '');; ?>",
                                "address": "<?php echo (isset($location['address']) ? $location['address'] : ''); ?>"
                            },
                            "offers": {
                                "url": "<?php echo $event->data->permalink; ?>",
                                "price": "<?php echo isset($event->data->meta['mec_cost']) ? $event->data->meta['mec_cost'] : ''; ?>",
                                "priceCurrency": "<?php echo isset($settings['currency']) ? $settings['currency'] : ''; ?>"
                            },
                            "performer": <?php echo $speakers; ?>,
                            "description": "<?php echo esc_html(preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '<div class="figure">$1</div>', preg_replace('/\s/u', ' ', $event->data->post->post_content))); ?>",
                            "image": "<?php echo !empty($event->data->featured_image['full']) ? esc_html($event->data->featured_image['full']) : ''; ?>",
                            "name": "<?php esc_html_e($event->data->title); ?>",
                            "url": "<?php echo $this->main->get_event_date_permalink($event, $event->date['start']['date']); ?>"
                        }
                    </script>
                <?php endif; ?>

                <article data-style="<?php echo $label_style; ?>" class="vevent-card <?php echo (isset($event->data->meta['event_past']) and trim($event->data->meta['event_past'])) ? 'mec-past-event ' : ''; ?>mec-event-article mec-clear aaa <?php echo $this->get_event_classes($event); ?>" style="border-right-color: <?php echo esc_attr($event_color); ?>;" itemscope>
                    <?php
                    $excerpt = trim($event->data->post->post_excerpt) ? $event->data->post->post_excerpt : '';

                    // Safe Excerpt for UTF-8 Strings
                    if (!trim($excerpt)) {
                        $ex = explode(' ', strip_tags(strip_shortcodes($event->data->post->post_content)));
                        $words = array_slice($ex, 0, 10);

                        $excerpt = implode(' ', $words);
                    }
                    $str_old = get_post_meta( $event->data->ID, 'mec_start_date', true );
                    $str_format = strtotime( $str_old );
                    $end_old = get_post_meta( $event->data->ID, 'mec_end_date', true );
                    $end_format = strtotime( $end_old );

                    $str_time_hour = get_post_meta( $event->data->ID, 'mec_start_time_hour', true );
                    $str_time_min = get_post_meta( $event->data->ID, 'mec_start_time_minutes', true );
                    $str_time_am_pm = get_post_meta( $event->data->ID, 'mec_start_time_ampm', true );

                    $end_time_hour = get_post_meta( $event->data->ID, 'mec_end_time_hour', true );
                    $end_time_min = get_post_meta( $event->data->ID, 'mec_end_time_minutes', true );
                    $end_time_am_pm = get_post_meta( $event->data->ID, 'mec_date_start', true );

                    ?>
                    <div class="mec-event-vdate">
                      <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                      <span>
                        <?php
                        // echo date_i18n( "d", $str_format );
                        if (date_i18n( "d", $str_format ) == date_i18n( "d", $end_format )) {
                          $vdate =  date_i18n( "d", $str_format ).' '. date_i18n( "M", $str_format ).
                           ' '. date_i18n( "y", $str_format );
                           ?>
                           <div class="big1">
                             <b><?php echo date_i18n( "d", $str_format ); ?></b>
                           </div>
                           <div class="big2">
                                  <span><?php echo date_i18n( "M y", $str_format ); ?></span>
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
                                  <span><?php echo date_i18n( "M y", $str_format ); ?></span>
                               </div>
                               <?php
                          }else{
                              // $vdate =  get_post_meta( get_the_ID(), 'mec-events-abbr', true );
                              ?>
                                <div class="line-1">
                                  <b><?php echo date_i18n( "d", $str_format ); ?></b>
                                  <span><?php echo date_i18n( "M y", $str_format ); ?></span>
                                </div>
                                <div class="vdivider"></div>
                                <div class="line-2">
                                  <b><?php echo date_i18n( "d", $end_format ); ?></b>
                                  <span><?php echo date_i18n( "M y", $end_format ); ?></span>
                                </div>
                              <?php
                          }
                        }

                        ?>
                      </span>
                    </div>
                    <div class="mec-event-content">
                        <?php $soldout = $this->main->get_flags($event->data->ID, $event_start_date); ?>
                        <h3 class="mec-event-title">
                            <?php
                                $class = 'mec-color-hover';
                                echo $this->display_link( $event, null, $class );
                                echo $this->display_custom_data( $event );
                            ?>
                            <?php echo $this->main->get_normal_labels($event, $display_label) . $this->main->display_cancellation_reason($event, $reason_for_cancellation); ?>
                            <?php if (!empty($label_style)) {
                                echo '<span class="mec-fc-style">' . $label_style . '</span>';
                            } ?>
                        </h3>

                        <div class="vdate-in">
                          <div class="vdate">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            <?php
                            if (date_i18n( "d", $str_format ) == date_i18n( "d", $end_format )) {
                              $vdate =  date_i18n( "d", $str_format ).' '. date_i18n( "F", $str_format ).
                               ' '. date_i18n( "Y", $str_format );
                            }
                            else {
                              if(date_i18n( "m Y", $str_format ) == date_i18n( "m Y", $end_format ) ){
                                  $vdate =  date_i18n( "d", $str_format ) . '-' . date_i18n( "d", $end_format ). ' '. date_i18n( "F", $str_format ).
                                   ' '. date_i18n( "Y", $str_format );
                              }else{
                                  // $vdate =  get_post_meta( get_the_ID(), 'mec-events-abbr', true );
                                  $vdate =  date_i18n( "d F Y", $str_format ) .  '-'. date_i18n( "d F Y", $end_format );
                              }
                            }

                            $vtime = sprintf("%02s", $str_time_hour).':'.sprintf("%02s", $str_time_min).' - '.sprintf("%02s", $end_time_hour).':'.sprintf("%02s", $end_time_min);

                            echo $vdate.'&nbsp;&nbsp;'.yp_text_get('เวลา','Time').'&nbsp;&nbsp;'.$vtime;
                             ?>
                          </div>
                           <?php if (isset($location['name'])) : ?>
                               <div class="vplace">
                                   <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                   <span><?php echo (isset($location['name']) ? $location['name'] : ''); ?></span>
                               </div>
                           <?php endif; ?>
                        </div>
                        <div class="vmore -m">
                            <a href="<?php echo get_the_permalink($event->data->ID); ?>">
                              <?php yp_text('อ่านเพิ่มเติม','Read More'); ?>
                              <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </a>
                        </div>
                    </div>
                    <div class="vmore -d">
                        <a href="<?php echo get_the_permalink($event->data->ID); ?>">
                          <?php yp_text('อ่านเพิ่มเติม','Read More'); ?>
                          <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </a>
                    </div>
                    <a href="<?php echo get_the_permalink($event->data->ID); ?>" class="link-all"></a>
                </article>
            <?php endforeach; ?>
        <?php } ?>
    <?php } ?>
    <?php if ($this->loadMoreRunning == false && $showLoadMore == false) { ?>
        <span class="mec-fluent-no-event"><?php esc_html_e('No Events', 'mec-fl'); ?></span>
    <?php } ?>
</div>

<?php if ($showLoadMore && $this->load_more_button and $this->found >= $this->limit) : ?>
    <?php
    $endMonth = $this->year . '-' . $this->month . '-' . date('t', strtotime($this->year . '-' . $this->month));
    $maximumDate = $this->maximum_date && (strtotime($this->maximum_date) < strtotime($endMonth)) ? $this->maximum_date : $endMonth;
    ?>
    <div class="mec-load-more-wrap">
        <div class="mec-load-more-button" data-end-date="<?php echo esc_attr($this->end_date); ?>" data-maximum-date="<?php echo esc_attr($maximumDate); ?>" data-next-offset="<?php echo esc_attr($this->next_offset); ?>" data-year="<?php echo esc_attr($this->year); ?>" data-month="<?php echo esc_attr($this->month); ?>" onclick=""><?php echo __('Load More', 'mec'); ?></div>
    </div>
<?php endif; ?>

<?php
if (isset($this->map_on_top) and $this->map_on_top) :
    if (isset($map_events) and !empty($map_events)) {
        // Include Map Assets such as JS and CSS libraries
        $this->main->load_map_assets();

        // It changing geolocation focus, because after done filtering, if it doesn't. then the map position will not set correctly.
        if ((isset($_REQUEST['action']) and $_REQUEST['action'] == 'mec_list_load_more') and isset($_REQUEST['sf'])) {
            $this->geolocation_focus = true;
        }

        $map_javascript = '<script type="text/javascript">
    var mecmap' . $this->id . ';
    jQuery(document).ready(function()
    {
        var jsonPush = gmapSkin(' . json_encode($this->render->markers($map_events)) . ');
        mecmap' . $this->id . ' = jQuery("#mec_googlemap_canvas' . $this->id . '").mecGoogleMaps(
        {
            id: "' . $this->id . '",
            autoinit: false,
            atts: "' . http_build_query(array('atts' => $this->atts), '', '&') . '",
            zoom: ' . (isset($settings['google_maps_zoomlevel']) ? $settings['google_maps_zoomlevel'] : 14) . ',
            icon: "' . apply_filters('mec_marker_icon', $this->main->asset('img/m-04.png')) . '",
            styles: ' . ((isset($settings['google_maps_style']) and trim($settings['google_maps_style']) != '') ? $this->main->get_googlemap_style($settings['google_maps_style']) : "''") . ',
            markers: jsonPush,
            clustering_images: "' . $this->main->asset('img/cluster1/m') . '",
            getDirection: 0,
            ajax_url: "' . admin_url('admin-ajax.php', null) . '",
            geolocation: "' . $this->geolocation . '",
            geolocation_focus: ' . $this->geolocation_focus . '
        });

        var mecinterval' . $this->id . ' = setInterval(function()
        {
            if(jQuery("#mec_googlemap_canvas' . $this->id . '").is(":visible"))
            {
                mecmap' . $this->id . '.init();
                clearInterval(mecinterval' . $this->id . ');
            };
        }, 1000);
    });
    </script>';

        $map_data = new stdClass;
        $map_data->id = $this->id;
        $map_data->atts = $this->atts;
        $map_data->events =  $map_events;
        $map_data->render = $this->render;
        $map_data->geolocation = $this->geolocation;
        $map_data->sf_status = null;
        $map_data->main = $this->main;

        $map_javascript = apply_filters('mec_map_load_script', $map_javascript, $map_data, $settings);

        // Include javascript code into the page
        if ($this->main->is_ajax()) {
            echo $map_javascript;
        } else {
            $this->factory->params('footer', $map_javascript);
        }
    }
endif;
