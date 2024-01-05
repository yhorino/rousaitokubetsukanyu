
<?php 
 function isTypeBank($type){
  if($type == '銀行振込') return true;
  else return false;
 }
 function isTypeFurikomi($type){
  $_type = mb_substr($type, 0, 4);
  if($_type == '口座振替') return true;
  else return false;
 }

 require_once($_SERVER['DOCUMENT_ROOT'].'/mypage/bin/sf_Api.php');
 sf_login();

// 年更SFから取引先データ取得
 $result = null;
 $result = (array)getNendkoshinId_NoMoshikomiuketsuke($_SESSION['row']['jimuKaiinNo__c']);
 $row_nenko = (array)$result['fields'];

 sf_logout();

 if(isset($result['Id'])){
 // 最初は振込の場合のみポップアップ表示
 // 振込受付完了したら銀振受付に切り替える
 //if(isTypeFurikomi($row_nenko['dairinyukinshubetsu__c'])) {
 //if(isTypeBank($row__nenko['dairinyukinshubetsu__c'])) {
  $datetime = new DateTime('2024/01/19 23:59:59');
  $current  = new DateTime('now');
  $diff     = $current->diff($datetime);
  $y = $datetime->format('Y');
  $m = $datetime->format('m');
  $d = $datetime->format('d');
  $day_of_week = $datetime->format('N');
  $days_in_japanese = ['月', '火', '水', '木', '金', '土', '日'];
  $day_of_week_japanese = $days_in_japanese[$day_of_week - 1];
  
  $kigen_days = $diff->days+1;
  $kanyu_year = intval(date('Y', strtotime($_SESSION['row']['Kanyudate__c'])));
  if($kanyu_year < 2023){
   $kanyu_month = 1;
  } else {
   $kanyu_month = intval(date('m', strtotime($_SESSION['row']['Kanyudate__c'])));
  }
  if($datetime > $current){
?>
<link rel="stylesheet" href="<?php echo $TOP_PATH;?>button.css">

<!-- https://www.sejuku.net/blog/104657 -->
 <!-- 年度更新のポップアップ -->
<div class="popup_nenko" style="">
  <div class="content">
   <div class="popup_nenko_x" id="popup_nenko_close">×</div>
   <div class="popup_nenko_title">継続手続き期間中です！</div>
   <div class="popup_nenko_body" id="popup_body1">
    <p class="popup_nenko_kigen"><?php echo $y;?><span class="ymd_ch">年</span><?php echo $m;?><span class="ymd_ch">月</span><?php echo $d;?><span class="ymd_ch">日(<?php echo $day_of_week_japanese;?>)</span>まで<br>あと、<span class="marker_yellow"><?php echo $kigen_days; ?><span class="ymd_ch">日</span></span></p>
    <p>継続手続きをする</p>
    <p class="popup_nenko_buttonbox"><a href="#" class="popup_nenko_button_yes common_button" id="popup_nenko_button_yes">する</a><a href="#" id="popup_nenko_close2" class="popup_nenko_button_no common_button reverse noshadow">今はしない</a></p>
   </div>
   <div class="popup_nenko_body" id="popup_body2">
    <p class="">2023年<?php echo $kanyu_month;?>月～2023年12月の間に元請工事はありますか？</p>
    <p class="popup_nenko_buttonbox2"><a href="https://www.kenpoke.com/nenko/trans.php?type=11&no=<?php echo $_SESSION['row']['jimuKaiinNo__c'];?>" class="popup_nenko_button_yes common_button">元請工事はありません</a></p>
    <p class="popup_info">※ 万が一、元請工事をされている場合は、<a href="tel:0120855865">0120-855-865</a>にお電話ください。</p>
   </div>
  </div>
</div>
 
  <script>
$(function(){
$(".popup_nenko").fadeIn();
$("#popup_body2").hide();
$("#popup_nenko_close").on("click", function() {
  $(".popup_nenko").fadeOut();
});
$("#popup_nenko_close2").on("click", function() {
  $(".popup_nenko").fadeOut();
});
$("#popup_nenko_button_yes").on("click", function() {
  $("#popup_body1").hide();
  $("#popup_body2").show();
});
});
  </script>
  <style>
.show_pc{
 display: block;
}
.hide_pc{
 display: none;
}
.popup_nenko {
  height: 100vh;
  width: 100%;
  background: rgba(0,0,0,0.5);
  position: fixed;
  top: 0;
  left: 0;
  display: grid;
  justify-content: center;
  align-items: center;
  z-index: 200;
}
.popup_nenko .content{
 font-size: clamp(16px, 4vw, 25px);
 text-align: center;
 position: relative;
 box-shadow: 2px 2px 3px 0px rgb(50,50,50,0.7);
 border-radius: 5px;
 display: grid;
 width: 650px;
}
.popup_nenko .content p{
 margin: 5px;
}
.popup_nenko_title{
 background-color: #E66700;
 border-radius: 5px 5px 0 0;
 color: #fff;
 font-size: clamp(16px, 5vw, 32px);
 line-height: 32px;
 padding: 20px 0;
}
.popup_nenko_body{
 background-color: #fff;
 padding: 30px 95px 40px 95px;
 border: 2px solid #E66700;
 border-radius: 0 0 5px 5px;
}
.popup_nenko_kigen{
 color: #E66700;
 font-size: clamp(18px, 5vw, 40px);
 padding-bottom: 30px;
}
.popup_nenko .content .popup_nenko_buttonbox,
.popup_nenko_buttonbox{
 display: grid;
 grid-template-columns: 1fr 1fr;
 grid-column-gap: 20px;
 margin: 20px 0;
}
.popup_nenko_button_yes,
.popup_nenko_button_no {
 font-size: clamp(12px, 3vw, 18px);
 line-height: 3em;
}
.popup_nenko_button_yes:after,
.popup_nenko_button_no:after {
 font-size: clamp(12px, 3vw, 18px);
}
/*
.popup_nenko_buttonbox a {
 border: 1px solid #E66700;
 line-height: 2em;
 text-decoration: none;
 padding: 10px;
 font-size: clamp(14px, 4vw, 18px);
 border-radius: 30px;
}
.popup_nenko_button_yes{
 background-color: #E66700;
 color: #fff;
 position: relative;
}
.popup_nenko_button_no{
 background-color: #fff;
 color: #E66700;
 position: relative;
}
.popup_nenko_button_yes::after {
 font-family: "Font Awesome 5 Free";
 content: '\f0da';
 font-size: clamp(14px, 3vw, 20px);
 font-weight: 900;
 margin-right: 4px;
 color: #fff;
 position: absolute;
 top: 20%;
 right: 5%;
}
.popup_nenko_button_no::after {
 font-family: "Font Awesome 5 Free";
 content: '\f0da';
 font-size: clamp(14px, 3vw, 20px);
 font-weight: 900;
 margin-right: 4px;
 color: #E66700;
 position: absolute;
 top: 20%;
 right: 5%;
}
   */
.marker_yellow {
 background: linear-gradient(transparent 80%, #ffff66 80%, #ffff66 90%,transparent 90%);
}
.ymd_ch{
 font-size: 0.8em;
}
.popup_nenko .content .popup_nenko_buttonbox2,
.popup_nenko_buttonbox2{
 display: grid;
 grid-template-columns: 1fr;
 grid-column-gap: 20px;
 margin: 20px 0;
}
.popup_nenko_buttonbox2 a {
 border: 1px solid #E66700;
 line-height: 2em;
 text-decoration: none;
 padding: 10px;
 font-size: clamp(14px, 4vw, 18px);
 border-radius: 30px;
}
   .popup_info{
    font-size: 12px;
   }
@media screen and (max-width: 960px) {
 .show_sp{
  display: block;
 }
 .hide_sp{
  display: none !important;
 }
 .popup_nenko .content{
  width: clamp(300px, 90vw, 650px);
 }
 .popup_nenko_body{
  padding: 20px 20px 20px 20px;
 }
}
   
.popup_nenko_x {
    position: absolute;
    right: 5px;
    top: -1.5em;
    color: #ccc;
    cursor: pointer;
}   
  </style>
  <!-- https://www.sejuku.net/blog/104657 -->
 <?php } ?>
 <?php /*}*/ ?>
 <?php } ?>
