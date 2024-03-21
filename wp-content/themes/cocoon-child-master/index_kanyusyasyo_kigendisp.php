<?php /* 20220512 9～12時申込LP */
//include 'db_getdata.php';
include_once '/home/rjc/domains/xn--y5q0r2lqcz91qdrc.com/public_html/wp-content/themes/cocoon-child-master/db_getdata.php';

date_default_timezone_set('Asia/Tokyo');

$date = date('Y-m-d');

$kigen = date('Y-m-d', strtotime('+1 day', strtotime($date)));

$dayofweek = date('w');
$holiday = false;
if($dayofweek == 0) { // 日
  $holiday = true;
  $kigen = date('Y-m-d', strtotime('+1 day', strtotime($date)));
}
if($dayofweek == 6) { // 土
  $holiday = true;
  $kigen = date('Y-m-d', strtotime('+2 day', strtotime($date)));
}
if($dayofweek == 5) { // 金
  $kigen = date('Y-m-d', strtotime('+3 day', strtotime($date)));
}

if(db_isholiday($date) != ''){
  $holiday = true;
}

while(db_isholiday($kigen) != ''){
  $kigen = date('Y-m-d', strtotime('+1 day', strtotime($kigen)));
}

if($holiday == false && intval(date('Hi')) < 1500) {
  $kigen = date('Y-m-d');
}

$mode = 1;
if($holiday == true || intval(date('Hi')) < 900 || intval(date('Hi')) >= 1500) {
  $mode = 1;
} else {
  $mode = 2;
}

$Y = intval(date('Y', strtotime($kigen)));
$m = intval(date('m', strtotime($kigen)));
$d = intval(date('d', strtotime($kigen)));
$w = intval(date('w', strtotime($kigen)));
$week = array("日", "月", "火", "水", "木", "金", "土");
$dow = $week[$w];
$m10 = intval(intval(date('m', strtotime($kigen)))/10);
$m1 = intval(date('m', strtotime($kigen)))%10;
$d10 = intval(intval(date('d', strtotime($kigen)))/10);
$d1 = intval(date('d', strtotime($kigen)))%10;

//$mode=2; // DEBUG

if($mode==2){
  $kigen_time = '17時';
} else {
  $kigen_time = '12時';
}
?>

<div class="index_kanyusyasyo_kigendisp">
 <p class="index_kanyusyasyo_kigendisp_title index_kanyusyasyo_kigendisp_title_balloon"><span class="index_kanyusyasyo_kigendisp_title1"><?php echo $m.'/'.$d;?><span class="small"><?php echo '('.$dow.')';?></span><?php echo $kigen_time; ?><span class="small">までに</span></span><span class="index_kanyusyasyo_kigendisp_title2">番号<span class="small">が</span>わかる</span></p>
</div>
<link rel="stylesheet" href="/wp-content/themes/cocoon-child-master/index_kanyusyasyo_kigendisp.css" type="text/css">
