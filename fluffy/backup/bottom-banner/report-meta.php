<?php
function vc_register_meta_boxes() {
  add_meta_box( 'meta-box-report', __( 'Reports', 'fluffy' ), 'vc_report_display_callback', 'banner_bottom' );
}
add_action( 'add_meta_boxes', 'vc_register_meta_boxes' );

function vc_report_display_callback(){
  $banner_id = get_the_ID();
  $array = get_field('static',$banner_id);

  ///count_click_by_today
  $count_a2 = array();
  foreach ($array as $value) {
  $count_a2[] = count(array_keys($value, date('Y-m-d') ));
  }
  $count_click_by_today = count(array_keys($count_a2, "1"));
  ///count_click_by_today


  // By week
    $count_week = array();
    foreach ($array as $value) {
      $Date = $value['date_click'];

      $FirstDay = date("Y-m-d", strtotime('sunday last week'));
      $LastDay = date("Y-m-d", strtotime('sunday this week'));
      if ($Date > $FirstDay && $Date < $LastDay) {
         $count_week[] = 1;
      }
    }
    $count_by_week = count(array_keys($count_week, "1"));
  // by week



  //by same month
  $count_month = array();
  foreach ($array as $value) {
    $date = $value['date_click'];
      if(date("m", strtotime($date)) == date("m"))
      {
          $count_month[] = 1;
      }
  }
  $count_by_month = count(array_keys($count_month, "1"));
  //by same month


  //by same year
  $count_year = array();
  foreach ($array as $value) {
    $date = $value['date_click'];
      if(date("Y", strtotime($date)) == date("Y"))
      {
          $count_year[] = 1;
      }
  }
  $count_by_year = count(array_keys($count_year, "1"));
  //by same year
?>
<div class="stat-wrap">
  <div class="stat-header">
    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg> Statistics
  </div>
  <div class="stat-content">
    <div class="item-counter">
      <h4>Today</h4>
      <h3><?php echo $count_click_by_today; ?></h3>
    </div>
    <div class="item-counter">
      <h4>This Week</h4>
      <h3><?php echo $count_by_week; ?></h3>
    </div>

    <div class="item-counter">
      <h4>This Month</h4>
      <h3><?php echo $count_by_month; ?></h3>
    </div>

    <div class="item-counter">
      <h4>This Year</h4>
      <h3><?php echo $count_by_year; ?></h3>
    </div>
  </div>
</div>
<style media="screen">
.stat-wrap {
  display: inline-block;
  max-width: 250px;
  width: 100%;
  background: #1b1e26;
  border-radius: 15px;
  color: #FFF;
}
.item-counter {
    text-align: center;
    padding: 0;
}
.item-counter h3 {
    color: #FFF;
    margin: 3px 0;
}
.item-counter h4 {
    color: #8e9399;
    margin: 0;
}
.stat-header {
    background: #282c31;
    display: block;
    padding: 15px;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    text-transform: uppercase;
    font-size: 16px;
    letter-spacing: 1px;
    font-weight: 200;
}
.stat-header svg {
    margin-bottom: -4px;
}
.stat-content{
  grid-template-columns: repeat(2, 1fr);
  display: grid;
  grid-gap: 5px;
  padding: 10px 0;
}
</style>
<?php
}
 ?>
