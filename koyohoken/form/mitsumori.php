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
  <meta property="og:image" content="https://www.xn--y5q0r2lqcz91qdrc.com/assets/img/h_logo.png">
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
      <a href="/koyohoken/"><img class="h_logo" src="../../assets/img/h_logo.png" width="327" alt="" /></a>
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
           
           <!--<div class="mitsumori-block-flex">
            <div class="mitsumori-block">
             <h2 class="mitsumori-subttl"><span class="st_blue">いつから</span>ご加入が必要ですか？</h2>
							<?php
							$sel1 = 'checked';
							$sel2 = '';
       $sel4 = '';
							if($_SESSION['kikan']==$kanyu_month1){
        $sel1 = 'checked';
        $sel2 = '';
        $sel4 = '';
       }
							if($_SESSION['kikan']==$kanyu2_month1){
        $sel1 = '';
        $sel2 = 'checked';
        $sel4 = '';
       }
							if($_SESSION['kikan']==4){
        $sel1 = '';
        $sel2 = '';
        $sel4 = 'checked';
       }
							?>
             <script>console.log('last5day='+<?php echo $last5day; ?>);</script>
              <ul class="mitsumori-list">
                <li>
                  <input id="kikan1" type="radio" name="kikan" value="<?php echo $kanyu_month1;?>" required="" <?php echo $sel1;?>>
                  <label for="kikan1"><span><?php echo $kanyu_month1;?>月</span></label>
                </li>
                <li>
                  <input id="kikan2" type="radio" name="kikan" value="<?php echo $kanyu2_month1;?>" required="" <?php echo $sel2;?>>
                  <label for="kikan2"><span><?php echo $kanyu2_month1;?>月</span></label>
                </li>
              </ul>
             
               <?php /* 1月～2月　表示して受付する 
               <ul class="mitsumori-list">              
                <li style="position: relative;">
                  <input id="kikan4" type="radio" name="kikan" value="4" required="" <?php echo $sel4;?>>
                  <label for="kikan4"><span class="button_2line_span">新年度（4月）から加入</span></label>
                 <div id="baloon-left">
                 <p class="balloon1-left"><span>3月末まで</span><span>ご加入中の方は</span><span>こちら！</span></p>
                 </div>
                </li>
               </ul>
                1月～2月　表示して受付する */ ?>
              
            </div>
           </div> mitsumori-block-flex -->

           <input id="kikan" type="hidden" name="kikan" value="<?php echo $kanyu_month1;?>">
           
           <div class="mitsumori-block-flex">
            <div class="mitsumori-block">
             <h2 class="mitsumori-subttl"><span class="st_blue">従業員の人数</span>は？</h2>
              <ul class="mitsumori-list">
								<?php 
               /*
        $show_num=2;
        if($device=='スマホ'){
         $show_num=2;
        }
        */
								for($i=1;$i<=4;$i++){
         $class='';
         /*
         if($i>($show_num-1)){
          $class='ninzu_sonota';
         }
         if($i==$show_num){
          echo '
         <span id="ninzu_sonota">
           <input class="mitsumori-other ml_input170" type="button" name="ninzu_sonota" value="その他" onclick="show_sonota_ninzu();">
         </span>';
         }
									$sel = '';
         */
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

              <!--<a class="popup_link" onclick="popup('#msg_tekiyou');">雇用保険適用事業所番号とは？</a>-->
             
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

           <!--
           <div class="mitsumori-block-flex" id="koyo_hajimete">
            <div class="mitsumori-block">
             <h2 class="mitsumori-subttl"><span class="st_blue">雇用保険</span>は、はじめてですか？</h2>
							<?php
							$sel1 = '';
							$sel2 = '';
							if($_SESSION['koyo_hajimete']=="はい"){
        $sel1 = 'checked';
        $sel2 = '';
       }
							if($_SESSION['koyo_hajimete']=="いいえ") $sel2 = 'checked';
							?>
              <ul class="mitsumori-list">
                <li>
                  <input id="koyo_hajimete_y" type="radio" name="koyo_hajimete" value="はい" required="" <?php echo $sel1;?>>
                  <label for="koyo_hajimete_y"><span>はい</span></label>
                </li>
                <li>
                  <input id="koyo_hajimete_n" type="radio" name="koyo_hajimete" value="いいえ" required="" <?php echo $sel2;?>>
                  <label for="koyo_hajimete_n"><span>いいえ</span></label>
                </li>
              </ul>

            </div>
            
           </div> -->
           
           
           <div id="blue_tri">
           <img src="/assets/img/blue_tri.png" alt="">
           </div>
            
          </div>
         
          <!--<input id="shiharai_tsuki" type="hidden" name="shiharai_tsuki" value="<?php echo $_SESSION['shiharai_tsuki']; ?>">-->
          <div class="mitsumori-result" id="mitumori_result">
          <input id="sougaku_normal" type="hidden" name="sougaku_normal" readonly required="" value="<?php echo $_SESSION['sougaku_normal']; ?>">
          <input id="sougaku" type="hidden" name="sougaku" readonly required="" value="<?php echo $_SESSION['sougaku']; ?>">
           
           <div id="mousikomi_result_flex">
            
            <!--
            <div id="maitsuki_title" class="mitsumori_title">月々のお支払金額</div>
            <div class="mitsumori-result_item">
              <div id="sougaku_price">
               <span id="shiharai_tsuki_disp"></span><span class="en_small">円（税別）</span>
              </div>
            </div>
            -->
            
            <div id="sougaku_title" class="mitsumori_title">お支払い総額</div>
            <div class="mitsumori-result_item mitsumori-result_item2">
              <div class="price_camp_title"><span style="transform: scaleX(-1); display: inline-block;">/</span>今だけ！会社登録費<span style="font-size: 1.5em;">０</span>円！<span>/</span></div>
              <div id="sougaku_price2">
               <span class="price_normal hajimete_item"><span class="price_normal_label">通常 </span><span class="kingaku_bold line-through"><span id="sougaku_normal_disp"></span>円</span></span>
               <span class="price_tri"><i class="fas fa-caret-right"></i></span>
               <span class="price_camp mitsumori_red"><span id="sougaku_disp"></span><span class="en_small">円<span class="zeibetsu">（税別）</span></span></span>
              </div>
             <!--
              <div id="uchiwake_price">
               
               <span class="uchiwake uchiwake_tetsuduki hajimete_item">
                <span class="uchiwake_line1"><span class="uchiwake_line_title">・手続き費用<span class="mitsumori_red mitsumori_small">　※33%OFF適用</span></span></span>
                <span class="uchiwake_line2"><span class="uchiwake_line_title mitsumori_small"><span class="tetsuduki_keisan"><span id="tetsuduki_normal"></span><span class="mitsumori_red"> - <span id="tetsuduki_waribiki"></span></span></span></span>
                <span id="tetsuduki_goukei" class="uchiwake_line_value mitsumori_red"></span>
                </span>
               </span>
               
               <span class="uchiwake uchiwake_kaihi">
                <span class="uchiwake_line1"><span class="uchiwake_line_title">・会費<span id="uchiwake_kaihi_months"></span>か月分</span></span>
                <span class="uchiwake_line2"><span class="uchiwake_line_title mitsumori_small"><span id="kaihi_keisan"></span></span>
                <span id="kaihi_goukei" class="uchiwake_line_value"></span>
                </span>
               </span>
               
               <span class="uchiwake uchiwake_goukei">
                <span class="uchiwake_line_goukei"><span class="uchiwake_line_title">合計</span>
                <span id="goukei_goukei" class="uchiwake_line_value mitsumori_red"></span>
                </span>
               </span>
               
              </div>
              -->
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
  
  /*$kanyu_month = parseInt($('input[name="kikan"]:checked').val());
  if($kanyu_month <= 3){
   $kanyu_tsukisu = 4 - $kanyu_month;   
  } else {
   $kanyu_tsukisu = 16 - $kanyu_month;
  }*/
  $koyo_bangou = $('input[name="koyo_bangou"]:checked').val();
  $ninzu = $('input[name="ninzu"]:checked').val();
  //$hajimete = $('input[name="koyo_hajimete"]:checked').val();
  /*
  var now = new Date();
  $this_month = now.getMonth()+1;
  $today = now.getDate();
  */
  
  //if($kanyu_month != undefined && $ninzu != undefined && $hajimete != undefined){
  if(/*$kanyu_month != undefined*/ $koyo_bangou != undefined && $ninzu != undefined){
  
   /*
   // 表示は税別　決済は税込
   // 月々の支払額　＝　事務委託費 5000
   if($ninzu <= 5) {
    $shiharai_tsuki = 5000;
   } else {
    $shiharai_tsuki = 5000 + (1000 * ($ninzu-5));    
   }

   // 初回支払額
   // 雇用保険はじめて　当月19日以前加入　＝　事務委託費３か月分 15000
   // 雇用保険はじめて　当月20日以降加入　＝　事務委託費４か月分 20000
   // 雇用保険はじめてでない　当月19日以前加入
   // 　＝　事務委託費３か月分 15000
   // 　＋成立届 20000
   // 　＋適用事業所設置届 20000
   // 　＋従業員資格取得届 20000*人数
   // 雇用保険はじめてでない　当月20日以降加入　＝　事務委託費４か月分
   // 　＝　事務委託費４か月分 20000
   // 　＋成立届 20000
   // 　＋適用事業所設置届 2000
   // 　＋従業員資格取得届 20000*人数
   
   // 20221108 事務委託費廃止　スポット対応化
   
   // 33%割引キャンペーン
   
   $jimu_itaku = $shiharai_tsuki*3;
   $jimu_itaku_tsukisu = 3;
   if($this_month == $kanyu_month && $today >= 20){
    $jimu_itaku = $shiharai_tsuki*4;
    $jimu_itaku_tsukisu = 4;
   }
   $syorui = 20000+20000+(20000*$ninzu);
   $syorui_waribiki = Math.floor($syorui*(1/3));
   $syorui_camp = $syorui-$syorui_waribiki;
    $syokai_shiharai = $syorui;
    $syokai_shiharai_camp = $syorui_camp;

   // 雇用保険料（参考値）
   // 月給（30万）×月数×16.5/1000×人数
   $koyo_hokenryo = 300000*$kanyu_tsukisu*(16.5/1000)*$ninzu;
*/
   
   // 20221206 雇用保険　計算変更
   // 番号あり→3,000円×人数
   // 番号なし→37,000円＋（3,000円×人数）
   if($koyo_bangou == 'はい'){
    $syokai_shiharai_camp = 3000 * $ninzu;
   } else {
    $syokai_shiharai_camp = 37000 + (3000 * $ninzu);
   }
   $syokai_shiharai = $syokai_shiharai_camp + 5000; // 会社登録費割引分
   //$('input[name="shiharai_tsuki"]').val(($shiharai_tsuki*1.1).toLocaleString());
   $('input[name="sougaku_normal"]').val(($syokai_shiharai*1.1).toLocaleString());
   $('input[name="sougaku"]').val(($syokai_shiharai_camp*1.1).toLocaleString());

   //$('#shiharai_tsuki_disp').text($shiharai_tsuki.toLocaleString());
   $('#sougaku_normal_disp').text($syokai_shiharai.toLocaleString());
   $('#sougaku_disp').text($syokai_shiharai_camp.toLocaleString());
   
   //$('#tetsuduki_normal').text($syorui.toLocaleString());
   //$('#tetsuduki_waribiki').text($syorui_waribiki.toLocaleString());
   //$('#tetsuduki_goukei').text($syorui_camp.toLocaleString()+'円');
   
   //$('#uchiwake_kaihi_months').text($jimu_itaku_tsukisu);
   //$('#kaihi_keisan').text($shiharai_tsuki.toLocaleString()+' × '+$jimu_itaku_tsukisu);
   //$('#kaihi_goukei').text($jimu_itaku.toLocaleString()+'円');
   
   //$('#goukei_goukei').text($syokai_shiharai_camp.toLocaleString()+'円');

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
 //$('#mitumori_result').hide();
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