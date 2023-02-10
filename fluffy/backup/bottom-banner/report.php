<?php
require_once('sub-page-report.php');
require_once('report-meta.php');

$banner_id = 1643;
$array = get_field('static',$banner_id);

///count_click_by_today
$count_a2 = array();
foreach ($array as $value) {
$count_a2[] = count(array_keys($value, "2021-12-10"));
}
$count_click_by_today = count(array_keys($count_a2, "1"));
///count_click_by_today


//by same month
$timestamp1 = strtotime('2021-11-10');
$timestamp2 = strtotime('2021-12-10');

$date1 = new DateTime();
$date1->setTimestamp($timestamp1);

$date2 = new DateTime();
$date2->setTimestamp($timestamp2);

if ($date1->format('Y-m') === $date2->format('Y-m')) {
  //  echo "เดือนเดียวกัน";
}
else {
    //echo "คนละเดือน";
}
//by same month


// By week
// Date_from acf
$Date = "2021-12-06";

$FirstDay = date("Y-m-d", strtotime('sunday last week'));
$LastDay = date("Y-m-d", strtotime('sunday this week'));
if ($Date > $FirstDay && $Date < $LastDay) {
   // echo "It is Between";
} else {
   // echo "No Not !!!";
}
// by week


// Date between
$paymentDate = '2021-12-10';
$paymentDate=date('Y-m-d', strtotime($paymentDate));
//echo $paymentDate; // echos today!
$contractDateBegin = date('Y-m-d', strtotime("2021-12-07"));
$contractDateEnd = date('Y-m-d', strtotime("2021-12-09"));

if (($paymentDate >= $contractDateBegin) && ($paymentDate <= $contractDateEnd)){
    // echo "is between";
}else{
   // echo "No Not !!!";
}
// Date between
 ?>
