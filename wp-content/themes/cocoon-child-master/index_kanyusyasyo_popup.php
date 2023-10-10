<?php /* 20220512 9～12時申込LP */
//echo $_SERVER['DOCUMENT_ROOT'];
include '/home/rjc/domains/xn--y5q0r2lqcz91qdrc.com/public_html/wp-content/themes/cocoon-child-master/db_getdata.php';

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

if($holiday == false && intval(date('Hi')) < 1300) {
  $kigen = date('Y-m-d');
}

$mode = 1;
if($holiday == true || intval(date('Hi')) < 900 || intval(date('Hi')) >= 1300) {
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
  $kigen_time = '<span class="small">夕方</span>17時';
} else {
  $kigen_time = '<span class="small">お昼</span>12時';
}

?>

<?php /* 20220717 会員カード発行ポップアップ */ ?>
<?php /*
<div class="kanyusyasyo_popup_fixbutton_box" onclick="popup_kanyusyasyo();"> <img src="/img/ic_question.png" alt=""><span class="kanyusyasyo_popup_text">いつ会員カードが受け取れる？</span> </div>
*/ ?>
<link rel="stylesheet" href="/wp-content/themes/cocoon-child-master/index_kanyusyasyo_popup.css" type="text/css">
<script>
function popup_kanyusyasyo(){
  $('.popup_kanyusyasyo').fadeIn();
}
function close_popup_kanyusyasyo(){
  $('.popup_kanyusyasyo').fadeOut();
  setTimeout(function(){popup_kanyusyasyo()},60000);
}
$(".popup_kanyusyasyo").hide();
$(function(){
  <?php /* https://sterfield.co.jp/designer/%E3%80%90jquery%E3%80%91%E3%82%B9%E3%82%AF%E3%83%AD%E3%83%BC%E3%83%AB%E4%B8%AD%E3%81%AB%E9%9D%9E%E8%A1%A8%E7%A4%BA%E3%81%AB%E3%81%99%E3%82%8Bjquery%E3%81%AE%E3%82%B3%E3%83%BC%E3%83%89/ */ ?>
 /*
    $(window).on("scroll touchmove", function(){
    $('.kanyusyasyo_popup_fixbutton_box').stop();
    $('.kanyusyasyo_popup_fixbutton_box').css('display', 'none').delay(100).fadeIn();
  });
  */
  if($('.show_sp').is(':visible')){
    $('.popup_kanyusyasyo').hide();
  }
});
</script>
<?php /* https://www.sejuku.net/blog/104657 */ ?>
<div class="popup_kanyusyasyo">
  <div class="content">
    <div class="popup_kanyusyasyo_close" onclick="close_popup_kanyusyasyo();"></div>
    <a href="/form/mitsumori.php?from=<?php echo $PATH_HTTP;?>&page=/&pos=popup_kanyusyasyo" class="popup_kanyusyasyo_button"></a>
    <p class="popup_kanyusyasyo_title"><?php echo $m.'/'.$d.'('.$dow.')'?><?php echo $kigen_time; ?><span class="small">までに</span><br>
    会員カード発行</p>
    <img src="/img/kanyusyasyo_popup.png" alt="">
  </div>
</div>
<?php /* https://www.sejuku.net/blog/104657 */ ?>
<?php /* 20220717 会員カード発行ポップアップ */ ?>

