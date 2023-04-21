<?php
// セッションの開始
ob_start();
session_start();

header("Content-type: text/html;charset=utf-8");

require_once('../../form/function.php');
require_once('../../form/Mobile_Detect.php');

$detect = new Mobile_Detect;
 
		$device = 'PC';
		if($detect->isMobile()){
			$device = 'スマホ';
		}

// セッション切れチェック 初期化
 $timeout = 900;
 $_SESSION['idle_time'] = time() + $timeout;

// COOKIE変数初期化
setcookie('paid', '0', 0, '/');
setcookie('norikae', '0', 0, '/');

?>
<!DOCTYPE html>
<html lang="ja">

<head>
<?php include_once  $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_head.html'; ?>
 
 
  <title>雇用保険見積り：労働保険事務組合RJC　雇用保険の加入フォーム</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="format-detection" content="telephone=no">
 
  <link rel="canonical" href="https://www.xn--y5q0r2lqcz91qdrc.com/koyohoken/form/mitsumori.php">
  <meta name="robots" content="all">
  <meta name="copyright" content="Copyright 2020 労働保険事務組合RJC All Rights Reserved.">
  <meta property="og:title" content="雇用保険見積り：労働保険事務組合RJC　雇用保険の加入フォーム">
  <meta property="og:type" content="article">
  <meta property="og:url" content="https://www.xn--y5q0r2lqcz91qdrc.com/koyohoken/form/mitsumori.php">
  <meta property="og:image" content="https://www.xn--y5q0r2lqcz91qdrc.com/assets/img/h_logo.svg">
  <meta property="og:site_name" content="建設業専門　全国対応　中小事業主の特別加入RJC">
  <meta property="og:description" content="" />
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
  <link rel="icon" href="/favicon.ico">
 
  <!-- CSS-->
  <link rel="stylesheet" href="../../assets/css/reset.css">
  <link rel="stylesheet" href="../../assets/css/common.css">
  <link rel="stylesheet" href="../../assets/css/style.css">
  <link rel="stylesheet" href="style_form_new.css">
  <!-- JS-->
  <script src="../../assets/js/app.js"></script>

 <script type="text/javascript" src="../../assets/js/jquery.jpostal.js-master/jquery.jpostal.js"></script>
 <script src="https://kit.fontawesome.com/a366e23f99.js" crossorigin="anonymous"></script>
 
</head>

<body id="input_php">
<?php include_once  $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_body.html'; ?>
 
 
  <header>
    <div class="header__flex">
      <a href="/koyohoken/"><img class="h_logo" src="../../assets/img/h_logo.svg" width="327" alt="" /></a>
    </div>
    <h1 class="mitsumori-maintitle">雇用保険の加入申込み</h1>
    <h2 class="mitsumori-ttl">かんたん見積もり</h2>
  </header>
	
  <!-- contents ///////////////////////////////////-->
 <div id="mainbody">
  <main id="main">
   
    <form name="form" method="post" action="trans.php" enctype="multipart/mitsumori-data">
      <input type="hidden" id="pagename" name="pagename" value = "mitsumori.php">
     
      <section class="mitsumori">
        <div class="mitsumori-inner">
          <div class="mitsumori-select">
           
           <input id="kikan" type="hidden" name="kikan" value="<?php echo $kanyu_month1;?>">
           
           <div class="mitsumori-block-flex">
            <div class="mitsumori-block">
             <h2 class="mitsumori-subttl"><span class="st_blue">従業員の人数</span>は？</h2>
              <ul class="mitsumori-list">
								<?php 
								for($i=1;$i<=4;$i++){
         $class='';
									$sel = '';
         if($i==1){
 									if(!isset($_SESSION['ninzu']) || $_SESSION['ninzu']==$i) $sel = 'checked';
         } else {
 									if($_SESSION['ninzu']==$i) $sel = 'checked';
         }
									echo '
									<li class="'.$class.'">
										<input id="ninzu'.$i.'" type="radio" name="ninzu" value="'.$i.'" required="" '.$sel.'>
										<label for="ninzu'.$i.'" class="ml_input170"><span>'.$i.' 人</span></label>
									</li>
									';
								}
								?>
              </ul>
            </div>
           </div><!-- mitsumori-block-flex -->
           
           <div class="mitsumori-block-flex" id="koyo_bangou">
            <div class="mitsumori-block">
             <h2 class="mitsumori-subttl"><span class="st_blue">雇用保険をかけたことが</span>ありますか？</h2>
							<?php
							$sel1 = '';
							$sel2 = '';
							if(!isset($_SESSION['koyo_bangou'])){
        $sel1 = '';
        $sel2 = 'checked';
       }
							if($_SESSION['koyo_bangou']=="はい"){
        $sel1 = 'checked';
        $sel2 = '';
       }
							if($_SESSION['koyo_bangou']=="いいえ") $sel2 = 'checked';
							?>
              <ul class="mitsumori-list">
                <li>
                  <input id="koyo_bangou_n" type="radio" name="koyo_bangou" value="いいえ" required="" <?php echo $sel2;?>>
                  <label for="koyo_bangou_n"><span>いいえ</span></label>
                </li>
                <li>
                  <input id="koyo_bangou_y" type="radio" name="koyo_bangou" value="はい" required="" <?php echo $sel1;?>>
                  <label for="koyo_bangou_y"><span>はい</span></label>
                </li>
              </ul>

            </div>
            
           </div>
           
           
           <div id="msg_tekiyou">
           <div class="mitsumori-block2">
            <p class="q_title">雇用保険適用事業所番号とは？</p>
            <p class="q_text">雇用保険適用事業所設置届事業主控 または、雇用保険被保険者資格取得等確認通知書（事業主通知用）で確認することができます。</p>

            <div class="popup_grid_box">
            <div class="popup_box">
            <p class="q_subtitle">・雇用保険適用事業所設置届事業主控<br>　</p>
            <p class="q_text q_image kanyusyasyo_img">
             <img src="../img/tekiyou_hikae.png" alt="雇用保険適用事業所設置届事業主控">
            </p>
            </div>
            <div class="popup_box">
            <p class="q_subtitle">・雇用保険被保険者資格取得等確認通知書<br>（事業主通知用）</p>
            <p class="q_text q_image kanyusyasyo_img">
             <img src="../img/tekiyou_tuchi.png" alt="雇用保険被保険者資格取得等確認通知書（事業主通知用）">
            </p>
            </div>
            </div>

            <a class="close_btn" onclick="popup_close('#msg_tekiyou');">閉じる</a>
           </div>
           </div>

           <div id="blue_tri">
           <img src="/assets/img/blue_tri.png" alt="">
           </div>
            
          </div>
         
          <div class="mitsumori-result" id="mitumori_result">
          <input id="sougaku_normal" type="hidden" name="sougaku_normal" readonly required="" value="<?php echo $_SESSION['sougaku_normal']; ?>">
          <input id="sougaku" type="hidden" name="sougaku" readonly required="" value="<?php echo $_SESSION['sougaku']; ?>">
           
           <div id="mousikomi_result_flex">
            
            <div id="sougaku_title" class="mitsumori_title">お支払い総額</div>
            <div class="mitsumori-result_item mitsumori-result_item2">
              <div class="price_camp_title"><span style="transform: scaleX(-1); display: inline-block;">/</span>今だけ！会社登録費<span style="font-size: 1.5em;">０</span>円！<span>/</span></div>
              <div id="sougaku_price2">
               <span class="price_normal hajimete_item"><span class="price_normal_label">通常 </span><span class="kingaku_bold line-through"><span id="sougaku_normal_disp"></span>円</span></span>
               <span class="price_tri"><i class="fas fa-caret-right"></i></span>
               <span class="price_camp mitsumori_red"><span id="sougaku_disp"></span><span class="en_small">円<span class="zeibetsu">（税別）</span></span></span>
              </div>

            </div>
            <p class="mitsumori-result_info1">※ 雇用保険料は含まれていません</p>
            
            <div id="mitsumori-result_button">
             <input class="mitsumori-btn" id="mousikomi_next" type="submit" name="mousikomi_next" value="">
            </div>
           </div>
           
           <a class="popup_link" onclick="popup('#msg_koyohoken');">雇用保険料とは？</a>
           
           <div id="msg_koyohoken">
           <div class="mitsumori-block2">
            <p class="q_title">雇用保険料とは？</p>
            <p class="q_text">従業員の見込年収×雇用保険料率(16.5/1000)で計算します。現場に入る従業員は絶対に入ること！</p>
            <p class="q_text q_text_box">
            <span class="q_text_box_title">＜保険料の例＞</span>
            <span class="q_text_box_text">11月加入、従業員1人、月給30万円の場合</span>
            <span class="q_text_box_kingaku">24,750円</span>
            <span class="q_text_box_text">11月加入、従業員2人、月給30万円の場合</span>
            <span class="q_text_box_kingaku">49,500円</span>
            <span class="q_text_box_text">※保険は年度単位</span>
            </p>
            <a class="close_btn" onclick="popup_close('#msg_koyohoken');">閉じる</a>
           </div>
           </div>
           
          </div>
        </div>
     </section>
    </form>
  </main>

</div>
 
<script>
$(function(){
  var ua = navigator.userAgent;
  var isIE6 = ua.match(/msie [6.]/i), isIE7 = ua.match(/msie [7.]/i);
  if (isIE6 || isIE7) {
    location.replace('nosupport.php');
	}
});
</script>


<script>
 function browser(){
   var userAgent = window.navigator.userAgent.toLowerCase();

   if(userAgent.indexOf('msie') != -1 ||
           userAgent.indexOf('trident') != -1) {
       return "msie";
   } else if(userAgent.indexOf('edge') != -1) {
       return "edge";
   } else if(userAgent.indexOf('chrome') != -1) {
       return "chrome";
   } else if(userAgent.indexOf('safari') != -1) {
       return "safari";
   } else if(userAgent.indexOf('firefox') != -1) {
       return "firefox";
   } else if(userAgent.indexOf('opera') != -1) {
       return "opera";
   } else {
       return "";
   }
 }
 
	function get_price(){
  $('#mitumori_result').hide();
  
  $koyo_bangou = $('input[name="koyo_bangou"]:checked').val();
  $ninzu = $('input[name="ninzu"]:checked').val();
  if($koyo_bangou != undefined && $ninzu != undefined){
  
   // 20221206 雇用保険　計算変更
   // 番号あり→3,000円×人数
   // 番号なし→37,000円＋（3,000円×人数）
   if($koyo_bangou == 'はい'){
    $syokai_shiharai_camp = 3000 * $ninzu;
   } else {
    $syokai_shiharai_camp = 37000 + (3000 * $ninzu);
   }
   $syokai_shiharai = $syokai_shiharai_camp + 5000; // 会社登録費割引分
   $('input[name="sougaku_normal"]').val(($syokai_shiharai*1.1).toLocaleString());
   $('input[name="sougaku"]').val(($syokai_shiharai_camp*1.1).toLocaleString());

   $('#sougaku_normal_disp').text($syokai_shiharai.toLocaleString());
   $('#sougaku_disp').text($syokai_shiharai_camp.toLocaleString());
   
   $('#mitumori_result').show();
  }
	}
 
 $('input').click(function(){
  jouken_selchange();
 });
 $('input[name="ninzu"]').click(function(){
  ninzu_selchange();
 });
 ninzu_selchange();
 $('.ninzu_sonota').hide(); 
 get_price();
 function show_sonota_ninzu(){
  $('.ninzu_sonota').show();
  $('#ninzu_sonota').hide();
 }
 
 function ninzu_selchange(){
  $ninzu_sel = $('input[name="ninzu"]:checked').val();
  for($i=0;$i<=5;$i++){
   if($i <= $ninzu_sel){
    $('#kanyusya_input'+$i).show();
    $('#kanyusya_input'+$i).find('input').prop('required', true);
    $('#kanyusya_input'+$i).find('select.birthday').prop('required', true);
   } else {
    $('#kanyusya_input'+$i).hide();
    $('#kanyusya_input'+$i).find('input').prop('required', false);
    $('#kanyusya_input'+$i).find('select.birthday').prop('required', false);
   }
  }
 }
 
 function jouken_selchange(){
  get_price();
 }
 
function popup($id){
 $height = $($id).find('.mitsumori-block2').height();
 $($id).find('.mitsumori-block2').height($height + 35);
 $($id).addClass('popup2');
 $($id).fadeIn();
 $($id).find('.mitsumori-block2').show();
}
function popup_close($id){
 $($id).find('.mitsumori-block2').hide();
 $($id).fadeOut();
 $($id).removeClass('popup2');
 $($id).find('.mitsumori-block2').height($height);
}
 $('#msg_koyohoken').hide();
 $('#msg_tekiyou').hide();
</script>
 
</body>
</html>