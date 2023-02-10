<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fluffy
 */
 $poll = liquidpoll_get_poll( get_the_ID() );
 $seriesVotes  = array_values( $poll->get_poll_reports( 'counts' ) );

 $option_name  = $poll->get_poll_options();
 // $color_1 = "#f68b3d";
 // $color_2 = "#ff643e";
 // $color_3 = "#febf0f";
 // $color_4 = "#00a88e";
 // $color_5 = "#45250e";
 // $color_6 = "#d3460b";

// print_r($option_name);
$polled_data = $poll->get_meta( 'polled_data', array() );
$poller = liquidpoll_get_poller();
// echo "<pre>";
// print_r($poller);
// echo "</pre>";
//
// echo "<BR><pre>";
// print_r($polled_data);
// echo "</pre>";

 $results = $poll->get_poll_results();


 $singles = $results['singles'];
 $percentages = $results['percentages'];
 $data_poll = array();
 foreach ($singles as $key_s => $value_s) {
    $data_poll[] = array(
                    'label' => $option_name[$key_s]['label'],
                    'percentages' => $percentages[$key_s],
                    'key' => $key_s,
                    'singles' => $value_s
                  );
   // echo $option_name[$key_s]['label']."<BR>";
 }
 // echo "<pre>";
 // print_r($data_poll);
 // echo "</pre>";
 // foreach($results as $key => $value)
 //  {
 //
 //
 //      // singles
 //      // percentages
 //    // print_r($option_name[$key]);
 //    // echo $option_name[$key]['label'];
 //    // echo "string".$value;
 //  }

 $counts = $poll->get_poll_reports( 'counts' );
 ?>

 <?php

 $has_voted = array();
 foreach ($counts as $count) {
   if ($count != 0) {
     $has_voted[] = $count;
   }
 }
if (isset($has_voted)) {
$c_vote = count($has_voted);
}
?>


<?php if ( array_key_exists( $poller, $polled_data ) ): ?>
  <div class="polls-list-wrap">
    <?php foreach ($data_poll as $value): ?>
      <article class="polls-list i-<?php echo $value['key']; ?>">
        <div class="top">
          <span style="width:<?php echo $value['percentages']; ?>%"></span>
        </div>
        <div class="bottom">
          <h4 class="item-title">
            <?php echo $value['label']; ?>
            <small>(<?php echo $value['percentages']; ?>%)</small>
          </h4>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
  <?php else: ?>
    <?php echo do_shortcode('[poll id="'.get_the_ID().'"]'); ?>
<?php endif; ?>
