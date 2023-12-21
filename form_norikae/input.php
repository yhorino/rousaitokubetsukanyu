<?php
// セッションの開始
ob_start();
session_start();

header("Content-type: text/html;charset=utf-8");
require_once('function.php');


?>
<!DOCTYPE html>
<html lang="ja">

<head>
<?php include_once  $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_head.html'; ?>
 
 
  <title>申込内容入力：労働保険事務組合RJC　無料見積りフォーム</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="format-detection" content="telephone=no">
 
  <link rel="canonical" href="https://www.xn--y5q0r2lqcz91qdrc.com/form_norikae/input.php">
  <meta name="robots" content="all">
  <meta name="copyright" content="Copyright 2020 労働保険事務組合RJC All Rights Reserved.">
  <meta property="og:title" content="申込内容入力：労働保険事務組合RJC　無料見積りフォーム">
  <meta property="og:type" content="article">
  <meta property="og:url" content="https://www.xn--y5q0r2lqcz91qdrc.com/form_norikae/input.php">
  <meta property="og:image" content="https://www.xn--y5q0r2lqcz91qdrc.com/assets/logo_img/logo_jimukumiai.png">
  <meta property="og:site_name" content="建設業専門　全国対応　中小事業主の特別加入RJC">
  <meta property="og:description" content="" />
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
  <link rel="icon" href="/favicon.ico">
 
  <!-- CSS-->
  <link rel="stylesheet" href="../assets/css/reset.css">
  <link rel="stylesheet" href="../assets/css/common.css">
  <link rel="stylesheet" href="../assets/css/style.css">
<!--  <link rel="stylesheet" href="../assets/css/style_form.css">-->
  <link rel="stylesheet" href="style_form_new.css">
  <!-- JS-->
  <script src="../assets/js/app.js"></script>
  <script src="https://kit.fontawesome.com/a366e23f99.js" crossorigin="anonymous"></script>

<script type="text/javascript" src="../assets/js/jquery.autoKana.js"></script>
 
<script>
$(function() {
 $.fn.autoKana('#kaisyamei', '#kaisyamei_furi', {katakana:true});
 $.fn.autoKana('#daihyosyamei_sei', '#daihyosyamei_furi_sei', {katakana:true});
 $.fn.autoKana('#daihyosyamei_mei', '#daihyosyamei_furi_mei', {katakana:true});
 $.fn.autoKana('#kanyusyamei_sei1', '#kanyusyamei_furi_sei1', {katakana:true});
 $.fn.autoKana('#kanyusyamei_mei1', '#kanyusyamei_furi_mei1', {katakana:true});
 $.fn.autoKana('#kanyusyamei_sei2', '#kanyusyamei_furi_sei2', {katakana:true});
 $.fn.autoKana('#kanyusyamei_mei2', '#kanyusyamei_furi_mei2', {katakana:true});
 $.fn.autoKana('#kanyusyamei_sei3', '#kanyusyamei_furi_sei3', {katakana:true});
 $.fn.autoKana('#kanyusyamei_mei3', '#kanyusyamei_furi_mei3', {katakana:true});
 $.fn.autoKana('#kanyusyamei_sei4', '#kanyusyamei_furi_sei4', {katakana:true});
 $.fn.autoKana('#kanyusyamei_mei4', '#kanyusyamei_furi_mei4', {katakana:true});
 $.fn.autoKana('#kanyusyamei_sei5', '#kanyusyamei_furi_sei5', {katakana:true});
 $.fn.autoKana('#kanyusyamei_mei5', '#kanyusyamei_furi_mei5', {katakana:true});
});
</script>
 
 <script src="https://kit.fontawesome.com/a366e23f99.js" crossorigin="anonymous"></script>
 
 <script type="text/javascript" src="../assets/js/jquery.jpostal.js-master/jquery.jpostal.js"></script>
 
<script>
$(function () {
	$('#zip').jpostal({
		postcode : [
			'#zip'
		],
		address : {
			'#pref' : '%3',
			'#city' : '%4',
			'#address' : '%5%6%7',
		}
	});
});
</script>
 
  <script>
    /* 変更した場合はPHP変数にコピーすること */
    var roumu = {};
    roumu["大工"] = 35;
    roumu["塗装"] = 35;
    roumu["防水"] = 35;
    roumu["鋼構造物"] = 35;
    roumu["板金"] = 35;
    roumu["タイル・れんが・ブロック"] = 35;
    roumu["左官"] = 35;
    roumu["鉄筋"] = 35;
    roumu["屋根"] = 35;
    roumu["足場"] = 35;
    roumu["電気"] = 35;
    roumu["内装"] = 35;
    roumu["管"] = 35;
    roumu["機械器具設置"] = 38;
    roumu["電気通信"] = 38;
    roumu["建具"] = 38;
    roumu["熱絶縁"] = 38;
    roumu["ガラス"] = 38;
    roumu["消防施設"] = 38;
    roumu["美装"] = 35;
    roumu["とび・土工・コンクリート"] = 37;
    roumu["解体"] = 37;
    roumu["しゅんせつ"] = 37;
    roumu["造園"] = 37;
    roumu["石"] = 35;
    roumu["ほ装"] = 33;
    roumu["さく井"] = 37;
    
    roumu['鉄骨組立て']= 35;//
    roumu['土']= 37;//
    roumu['はつり']= 37;//
    roumu['外構']= 35;//
    roumu['金物取付け']= 35;//
    roumu['冷暖房設備']= 35;//
    roumu['給湯設備']= 35;//
    roumu['配管']= 35;//
    roumu['空調']= 35;//
    roumu['型枠']= 35;//
    roumu['プラント設備']= 36;//
    roumu['サイロ設備']= 36;//
    roumu['電話']= 38;//
    roumu['シーリング']= 35;//
    roumu['鉄骨']= 35;//
    roumu['溶接']= 35;//
    roumu['サイディング']= 35;//
    roumu['外壁']= 35;//
    roumu['築炉']= 35;//
    roumu['エクステリア']= 35;//
    roumu['看板取付']= 35;//
    roumu['植栽']= 37;//
    roumu['サッシ取付け']= 38;//
    roumu['重機オペレーター']= 37;//

    var roumu_hiritu = {};
    roumu_hiritu[33] = 0.17;
    roumu_hiritu[35] = 0.23;
    roumu_hiritu[38] = 0.23;
    roumu_hiritu[37] = 0.24;

    var ryouritsu = {};
    ryouritsu[33] = 0.009;
    ryouritsu[35] = 0.0095;
    ryouritsu[38] = 0.012;
    ryouritsu[37] = 0.015;
  
    var tukisuu = {};
    tukisuu[1] = 15;
    tukisuu[2] = 14;
    tukisuu[3] = 13;
    tukisuu[4] = 12;
    tukisuu[5] = 11;
    tukisuu[6] = 10;
    tukisuu[7] = 9;
    tukisuu[8] = 8;
    tukisuu[9] = 7;
    tukisuu[10] = 6;
    tukisuu[11] = 5;
    tukisuu[12] = 4;
   
  </script>
 
</head>

<style>
.mitsumori-list input[type=radio], .mitsumori-list input[type=checkbox] {
    display: block;
    position: absolute;
    opacity: 0;
}
.mitsumori-subttl {
    border-left: none;
    padding-left: 0;
}
.mitsumori-subttl .label{
 font-size: 16px;
 margin: 0 0.5em 0 0;
}

/* 20210521 */
.mitsumori-list,
.mitsumori-block {
    position: relative;
}
.mitsumori-list input[type=radio], .mitsumori-list input[type=checkbox] {
    top: 0px;
    height: 7em;
    width: 0px;
}
</style>
 
<!--<body id="input_php">-->
<body> 
<?php include_once  $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_body.html'; ?>
 
 <!--
 <a href="#main">メインコンテンツに移動</a>
	
    <header>
      <div class="header__flex">
        <a href="/"><img class="h_logo" src="../assets/logo_img/logo_jimukumiai.png" width="327" alt="" /></a>
      </div>
     
     <div class="mitsumori-ttl-div mitsumori-ttl-div-step">
     <div class="div_center"><span>切替えステップ</span><img src="img/flow2.png" alt=""></div>
     </div>
     <div class="mitsumori-ttl-div mitsumori-ttl-div-main">
      <h1 class="div_center"><span>お客様情報のご登録</span></h1>
     </div>
    </header>
	-->
   <?php 
 $option_class = 'no_menu';
 include_once $_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/cocoon-child-master/tmp/header-container.php'; 
 ?>

  <!-- contents ///////////////////////////////////-->
 <div id="mainbody" class="with-aside-flex">
  <main id="main">
   
    <form name="form" method="post" action="trans.php" enctype="multipart/form-data">
      <input type="hidden" id="pagename" name="pagename" value = "input.php">
      <input type="hidden" id="Previd__c" name="Previd__c" value = "<?php echo $_SESSION['Previd__c'];?>">
     
      <section class="mitsumori">
        <div class="mitsumori-inner">
        <h2 class="input-subtitle">すでに登録されている情報に変更がある場合は、変更してください。</h2>
         
         <figure>
         <figcaption></figcaption>
         <table class="input_table">
          
          <tr>
           <th>法人　または　個人 <span class="label req">必須</span></th>
           <td>
            
            <?php
            $sel1 = 'checked';
            $sel2 = '';
            if($_SESSION['type']=='個人') {
             $sel1 = 'checked';
             $sel2 = '';
            }
            if($_SESSION['type']=='法人') {
             $sel1 = '';
             $sel2 = 'checked';
            }
            ?>
            
            <div class="input-flex">
            <span class="button-radio">
            <input id="type2" type="radio" name="type" value="法人" required="" <?php echo $sel2;?>>
            <label for="type2"><span>法人</span></label>
            </span>
            
            <span class="button-radio">
            <input id="type1" type="radio" name="type" value="個人" required="" <?php echo $sel1;?>>
            <label for="type1"><span>個人</span></label>
            </span>
            </div>
            
           </td>
           
          </tr>
          
          <tr>
           <th>会社名・屋号 <span class="label req">必須</span></th>
           <td>
            
            <div class="input-flex">
            <div class="input-full">
            <p>会社名</p>
            <input id="kaisyamei" class="form-bg" type="text" name="kaisyamei" required="" placeholder="株式会社労災建設" value="<?php echo $_SESSION['kaisyamei']; ?>">
            </div>
            </div>
            
            <div class="input-flex">
            <div class="input-full">
            <p>フリガナ</p>
            <input id="kaisyamei_furi" class="form-bg" type="text" name="kaisyamei_furi" required="" placeholder="カブシキガイシャロウサイケンセツ" value="<?php echo $_SESSION['kaisyamei_furi']; ?>" pattern="[\u30A1-\u30FC\u3041-\u309F\uFF10-\uFF19\uFF21-\uFF3A\uFF41-\uFF5A|　| ]*" title="ひらがな、カタカナ">
            </div>
            </div>
            
           </td>
           
          </tr>
          
         <tr>
         <th>代表者情報 <span class="label req">必須</span></th>
         <td>
           <div class="input-flex">
           <div class="input-full">
           <p>姓</p>
           <input id="daihyosyamei_sei" class="form-bg" type="text" name="daihyosyamei_sei" required="" placeholder="代表" value="<?php echo $_SESSION['daihyosyamei_sei']; ?>">
           </div>
            
           <div class="input-full">
           <p>名</p>
           <input id="daihyosyamei_mei" class="form-bg" type="text" name="daihyosyamei_mei" required="" placeholder="太郎" value="<?php echo $_SESSION['daihyosyamei_mei']; ?>">
           </div>
           </div>
         
           <div class="input-flex">
           <div class="input-full">
           <p>セイ</p>
           <input id="daihyosyamei_furi_sei" class="form-bg" type="text" name="daihyosyamei_furi_sei" required="" placeholder="ダイヒョウ" value="<?php echo $_SESSION['daihyosyamei_furi_sei']; ?>" pattern="[\u30A1-\u30FC\u3041-\u309F|　| ]*" title="ひらがな、カタカナ">
           </div>
            
           <div class="input-full">
           <p>メイ</p>
           <input id="daihyosyamei_furi_mei" class="form-bg" type="text" name="daihyosyamei_furi_mei" required="" placeholder="タロウ" value="<?php echo $_SESSION['daihyosyamei_furi_mei']; ?>" pattern="[\u30A1-\u30FC\u3041-\u309F|　| ]*" title="ひらがな、カタカナ">
           </div>
           </div>
           
           <div class="input-full">
           <p>代表者役職</p>
           <select id="daihyosyayakusyoku" class="form-bg" type="text" name="daihyosyayakusyoku" required="">
            <option value="代表">代表</option>
            <option value="取締役">取締役</option>
            <option value="代表取締役">代表取締役</option>
            <option value="代表社員">代表社員</option>
           </select>
         </td>
         </tr>
          
         <tr>
         <th>担当者情報 <span class="label req">必須</span><input type="button" name="kanyusya_input_copy0" id="kanyusya_input_copy0" class="kanyusya_input_copy"  onClick="kanyusya_copy(0);" value="代表者と同じ"></th>
         <td>
           <div class="input-flex">
           <div class="input-full">
           <p>姓</p>
           <input id="tantousyamei_sei" class="form-bg" type="text" name="tantousyamei_sei" required="" placeholder="担当" value="<?php echo $_SESSION['tantousyamei_sei']; ?>">
           </div>
          
           <div class="input-full">
           <p>名</p>
           <input id="tantousyamei_mei" class="form-bg" type="text" name="tantousyamei_mei" required="" placeholder="太郎" value="<?php echo $_SESSION['tantousyamei_mei']; ?>">
           </div>
           </div>
          
           <div class="input-flex">
           <div class="input-full">
           <p>セイ</p>
           <input id="tantousyamei_furi_sei" class="form-bg" type="text" name="tantousyamei_furi_sei" required="" placeholder="タントウ" value="<?php echo $_SESSION['tantousyamei_furi_sei']; ?>" pattern="[\u30A1-\u30FC\u3041-\u309F|　| ]*" title="ひらがな、カタカナ">
           </div>
           
           <div class="input-full">
           <p>メイ</p>
           <input id="tantousyamei_furi_mei" class="form-bg" type="text" name="tantousyamei_furi_mei" required="" placeholder="タロウ" value="<?php echo $_SESSION['tantousyamei_furi_mei']; ?>" pattern="[\u30A1-\u30FC\u3041-\u309F|　| ]*" title="ひらがな、カタカナ">
           </div>
           </div>
         </td>
         </tr>
          
          <?php $_SESSION['zip'] = str_replace('-', '', $_SESSION['zip']); ?>
          <tr>
           <th>住所 <span class="label req">必須</span></th>
           <td>
            
            <div class="input-flex">
            <div class="input-full">
            <p>郵便番号</p>
            <input type="tel" name="zip" id="zip" class="form-bg zip" placeholder="1234567(ハイフンなし)" maxlength="8" value="<?php echo $_SESSION['zip']; ?>" pattern="[0-9]+$" title="数字(ハイフンなし)">
            </div>
            </div>
            
            <div class="input-flex">
            <div class="input-full">
            <p>都道府県</p>
            <select id="pref" name="pref" class="form-bg" required>
            <option value="">選択してください</option>
            <?php
             for($i=1;$i<=47;$i++){
    $sel = '';
    if($_SESSION['pref']==$pref[$i]) $sel = 'selected';
              echo '<option value="'.$pref[$i].'" '.$sel.'>'.$pref[$i].'</option>';
             }
             ?>
            </select>
            </div>
            </div>

            <div class="input-flex">
            <div class="input-full">
            <p>市区町村</p>
            <input id="city" class="form-bg" type="text" name="city" required="" placeholder="千代田区" value="<?php echo $_SESSION['city']; ?>">
            </div>
            </div>

            <div class="input-flex">
            <div class="input-full">
            <p>丁目番地号</p>
            <input id="address" class="form-bg" type="text" name="address" required="" placeholder="千代田１−１" value="<?php echo $_SESSION['address']; ?>">
            </div>
            </div>

            <div class="input-flex">
            <div class="input-full">
            <p>建物名等</p>
            <input id="apart" class="form-bg" type="text" name="apart" placeholder="東京ビルディング１０１" value="<?php echo $_SESSION['apart']; ?>">
            </div>
            </div>
            
           </td>
          </tr>
          
          
          <tr>
           <th>連絡先情報 <span class="label req">必須</span></th>
           <td>
            <?php $_SESSION['denwabangou'] = str_replace('-', '', $_SESSION['denwabangou']); ?>
            
            <div class="input-flex">
            <div class="input-full">
            <p>電話番号（ハイフンなし）</p>
            <input id="denwabangou" class="form-bg" type="tel" name="denwabangou" required="" placeholder="0311112222(ハイフンなし)" maxlength="13" value="<?php echo $_SESSION['denwabangou']; ?>" pattern="[0-9]+$" title="数字(ハイフンなし)">
            </div>
            </div>

            <?php $_SESSION['faxbangou'] = str_replace('-', '', $_SESSION['faxbangou']); ?>

            <div class="input-flex">
            <div class="input-full">
            <p>FAX番号</p>
            <input id="faxbangou" class="form-bg" type="tel" name="faxbangou" placeholder="0311112223(ハイフンなし)" maxlength="13" value="<?php echo $_SESSION['faxbangou']; ?>" pattern="[0-9]+$" title="数字(ハイフンなし)">
            </div>
            </div>

            <div class="input-flex">
            <div class="input-full">
            <p>メールアドレス</p>
            <input id="email" class="form-bg" type="email" name="mail" required="" placeholder="name@domain.co.jp" value="<?php echo $_SESSION['mail']; ?>">
            </div>
            </div>

            <?php $_SESSION['tantoumobile'] = str_replace('-', '', $_SESSION['tantoumobile']); ?>

            <div class="input-flex">
            <div class="input-full">
            <p>担当につながる携帯番号 <span style="display: inline-block; margin-top: 10px; font-size: 13px;">※ ご連絡がつきやすい番号の入力をお願いします。</span></p>
            <input id="tantoumobile" class="form-bg" type="tel" name="tantoumobile" required="" placeholder="09011112222(ハイフンなし)" maxlength="13" value="<?php echo $_SESSION['tantoumobile']; ?>" pattern="[0-9]+$" title="数字(ハイフンなし)">
            </div>
            </div>
            
           </td>
          </tr>
          
          <tr class="tr_kojin">
           <th>添付書類 <span class="label req">必須</span></th>
           <td>
            
           <div class="input-flex">
           <div class="input-full tr_kojin">            
           <p>確定申告書Bまたは開業届</p>
           <input type="file" name="file_kakutei" accept="image/*,.pdf" id="file_kakutei" required>
           </div>
           </div>
            
            <!--
           <div class="input-flex">
           <div class="input-full tr_hojin">            
           <p>会社の履歴事項全部証明書</p>
           <input type="hidden" name="f_num" value="1">
           <input type="file" name="file_rirekisyo1" accept="image/*,.pdf" id="file_rirekisyo1" required> <input type="button" onclick="add_file_rirekisyo();" id="add_button" value="追加">
           </div>
           </div>
            -->
           </td>
          </tr>
          
         </table>
         </figure>
         
              <?php
             for($no=1;$no<=5;$no++){
              echo '<figure id="kanyusya_input'.$no.'"><figcaption class="input-section-title">特別加入者の情報';
              echo '</figcaption>';
              echo '<table class="input_table">';
              
              echo '
              <tr>
               <th>'.$no.'人目の特別加入者 <span class="label req">必須</span>';
              if($no == 1){
               echo '<input type="button" name="kanyusya_input_copy'.$no.'" id="kanyusya_input_copy'.$no.'" class="kanyusya_input_copy"  onClick="kanyusya_copy('.$no.');" value="代表者と同じ">';
              }
              echo '</th>
               <td>
               
               <div class="input-flex">
               <div class="input-full">
               <p>姓</p>
               <input id="kanyusyamei_sei'.$no.'" class="form-bg" type="text" name="kanyusyamei_sei'.$no.'" placeholder="労災" value="'.$_SESSION['kanyusyamei_sei'.$no].'">
               </div>
               
               <div class="input-full">
               <p>名</p>
               <input id="kanyusyamei_mei'.$no.'" class="form-bg" type="text" name="kanyusyamei_mei'.$no.'" placeholder="太郎" value="'.$_SESSION['kanyusyamei_mei'.$no].'">
               </div>
               </div>
               
               <div class="input-flex">
               <div class="input-full">
               <p>セイ</p>
               <input id="kanyusyamei_furi_sei'.$no.'" class="form-bg" type="text" name="kanyusyamei_furi_sei'.$no.'" placeholder="ロウサイ" value="'.$_SESSION['kanyusyamei_furi_sei'.$no].'" pattern="[\u30A1-\u30FC\u3041-\u309F|　| ]*" title="ひらがな、カタカナ"></div>
               
               <div class="input-full">
               <p>メイ</p>
               <input id="kanyusyamei_furi_mei'.$no.'" class="form-bg" type="text" name="kanyusyamei_furi_mei'.$no.'" placeholder="タロウ" value="'.$_SESSION['kanyusyamei_furi_mei'.$no].'" pattern="[\u30A1-\u30FC\u3041-\u309F|　| ]*" title="ひらがな、カタカナ"></div>
               </div>
               
               <div class="input-flex">
               <div class="input-full">
               <p>生年月日</p>
               <div class="input-flex">
               <div class="input-full">
               <select name="birthday_y'.$no.'" id="birthday_y'.$no.'"   class="form-bg birthday" style="min-width: 230px;">';
							 
echo '<option value="">-- 年 --</option>';
							 
					for($y=intval(date('Y'))-80;$y<=intval(date('Y'))-10;$y++){
						$sel = '';
						if($_SESSION['birthday_y'.$no]==$y) $sel = 'selected';
						echo '<option value="'.$y.'" '.$sel.'>'.seireki_to_wareki($y).'年('.$y.'年)</option>';
					}
					echo '</select></div>
     
     <div class="input-full">
     <select name="birthday_m'.$no.'" id="birthday_m'.$no.'"  class="form-bg birthday">';
							 
echo '<option value="">-- 月 --</option>';
							 
					for($m=1;$m<=12;$m++){
						$sel = '';
						if($_SESSION['birthday_m'.$no]==$m) $sel = 'selected';
						echo '<option value="'.$m.'" '.$sel.'>'.$m.'月</option>';
					}
					echo '</select></div>
     
     <div class="input-full">
					<select name="birthday_d'.$no.'" id="birthday_d'.$no.'"  class="form-bg birthday">';
							 
echo '<option value="">-- 日 --</option>';
							 
					for($d=1;$d<=31;$d++){
						$sel = '';
						if($_SESSION['birthday_d'.$no]==$d) $sel = 'selected';
						echo '<option value="'.$d.'" '.$sel.'>'.$d.'日</option>';
					}
					echo '</select>
     </div>
     </div></div></div>';
              
     /*
               echo '<div class="input-full">
               <p>事業の種類</p>
               <input id="jigyou'.$no.'" type="text" name="jigyou'.$no.'" readonly value="'.$_SESSION['jigyou'.$no].'">
               </div>
              ';
              */
              
              /*
				$sel1 = '';
				$sel2 = '';
				if($_SESSION['funjin'.$no]=='いいえ') $sel1 = 'checked';
				if($_SESSION['funjin'.$no]=='はい') $sel2 = 'checked';
        echo '
         <div class="input-full kst_1_input">
         <p>粉じん作業に通算3年以上従事していますか？</p>
         <div class="input-flex">
         <div class="input-full">
         <span class="button-radio">
         <input type="radio" name="funjin'.$no.'" id="funjin_no'.$no.'" value="いいえ" checked required class="required" tabindex="'.$tabidx++.'" '.$sel1.'><label for="funjin_no'.$no.'">いいえ</label>
         </span>
         </div>
         
         <div class="input-full">
         <span class="button-radio">
         <input type="radio" name="funjin'.$no.'" id="funjin_yes'.$no.'" value="はい" required class="required tokutei_yes" '.$sel2.'><label for="funjin_yes'.$no.'">はい</label>
         </span>
         </div>
         </div></div>
        
         <div class="input-full kst_1_input2">
         <p>主な作業内容を一つお選びください</p>
         <select name="funjin_naiyou'.$no.'" id="funjin_naiyou'.$no.'" class="naiyou required" required tabindex="'.$tabidx++.'">
         <option value="">選択してください</option>';
          foreach(get_funjin_syurui() as $syurui){
						$sel = '';
						if($_SESSION['funjin_naiyou'.$no]==$syurui) $sel = 'selected';
           echo '<option value="'.$syurui.'" '.$sel.'>'.$syurui.'</option>';
          }
          echo '</select></div>';
              
				$sel1 = '';
				$sel2 = '';
				if($_SESSION['shindou'.$no]=='いいえ') $sel1 = 'checked';
				if($_SESSION['shindou'.$no]=='はい') $sel2 = 'checked';
      echo '
       <div class="input-full kst_2_input">
       <p>振動工具を使用する作業に通算1年以上従事していますか？</p>
       <div class="input-flex">
       <div class="input-full">
       <span class="button-radio">
       <input type="radio" name="shindou'.$no.'" id="shindou_no'.$no.'" value="いいえ" checked required class="required" tabindex="'.$tabidx++.'" '.$sel1.'><label for="shindou_no'.$no.'">いいえ</label>
       </span>
       </div>
       
       <div class="input-full">
       <span class="button-radio">
       <input type="radio" name="shindou'.$no.'" id="shindou_yes'.$no.'" value="はい" required class="required tokutei_yes" '.$sel2.'><label for="shindou_yes'.$no.'">はい</label>
       </span>
       </div>
       </div></div>
       
       <div class="input-full kst_2_input2">
       <p>主に使用する工具を一つお選びください</p>
       <select name="shindou_naiyou'.$no.'" id="shindou_naiyou'.$no.'" class="naiyou required" required tabindex="'.$tabidx++.'">
       <option value="">選択してください</option>';
        foreach(get_shindou_syurui() as $syurui){
					$sel = '';
					if($_SESSION['shindou_naiyou'.$no]==$syurui) $sel = 'selected';
         echo '<option value="'.$syurui.'" class="ss00" '.$sel.'>'.$syurui.'</option>';
        }
        echo '</select></div>';
              
				$sel1 = '';
				$sel2 = '';
				if($_SESSION['namari'.$no]=='いいえ') $sel1 = 'checked';
				if($_SESSION['namari'.$no]=='はい') $sel2 = 'checked';
      echo '
       <div class="input-full kst_3_input">
       <p>鉛を使用する作業に通算6か月以上従事していますか？</p>
       <div class="input-flex">
       <div class="input-full">
       <span class="button-radio">
       <input type="radio" name="namari'.$no.'" id="namari_no'.$no.'" value="いいえ" checked required class="required" tabindex="'.$tabidx++.'" '.$sel1.'><label for="namari_no'.$no.'">いいえ</label>
       </span>
       </div>
       
       <div class="input-full">
       <span class="button-radio">
       <input type="radio" name="namari'.$no.'" id="namari_yes'.$no.'" value="はい" required class="required tokutei_yes" '.$sel2.'><label for="namari_yes'.$no.'">はい</label>
       </span>
       </div>
       </div></div>
       
       <div class="input-full kst_3_input2">
       <p>主な作業内容を一つお選びください</p>
       <select name="namari_naiyou'.$no.'" id="namari_naiyou'.$no.'" class="naiyou required" required tabindex="'.$tabidx++.'">
       <option value="">選択してください</option>';
        foreach(get_namari_syurui() as $syurui){
    $sel = '';
    if($_SESSION['namari_naiyou'.$no]==$syurui) $sel = 'selected';
         echo '<option value="'.$syurui.'" '.$sel.'>'.$syurui.'</option>';
        }
       echo '</select></div>';
      
				$sel1 = '';
				$sel2 = '';
				if($_SESSION['youzai'.$no]=='いいえ') $sel1 = 'checked';
				if($_SESSION['youzai'.$no]=='はい') $sel2 = 'checked';
      echo '
       <div class="input-full kst_4_input">
       <p>有機溶剤を使用する作業に通算6か月以上従事していますか？</p>
       <div class="input-flex">
       <div class="input-full">
       <span class="button-radio">
       <input type="radio" name="youzai'.$no.'" id="youzai_no'.$no.'" value="いいえ" checked required class="required" tabindex="'.$tabidx++.'" '.$sel1.'><label for="youzai_no'.$no.'">いいえ</label>
       </span>
       </div>
       
       <div class="input-full">
       <span class="button-radio">
       <input type="radio" name="youzai'.$no.'" id="youzai_yes'.$no.'" value="はい" required class="required tokutei_yes" '.$sel2.'><label for="youzai_yes'.$no.'">はい</label>
       </span>
       </div>
       </div></div>
       
       <div class="input-flex">
       <div class="input-full kst_4_input2">
       <p>主に使用している有機溶剤を一つお選びください</p>
       <select name="youzai_naiyou'.$no.'" id="youzai_naiyou'.$no.'" class="naiyou required" required tabindex="'.$tabidx++.'">
       <option value="">選択してください</option>';
       foreach(get_youzai_syurui() as $syurui){
    $sel = '';
    if($_SESSION['youzai_naiyou'.$no]==$syurui) $sel = 'selected';
        echo '<option value="'.$syurui.'" '.$sel.'>'.$syurui.'</option>';
       }
       echo '</select></div></div>';
    */
              
/* 20211004 Y.Horino 添付書類 */
              echo '
           <div class="input-flex">
           <div class="input-full file_attach file_attach'.$no.'">
           <p>運転免許証（表）</p>
           <input type="file" name="file_menkyo_omote_'.$no.'" accept="image/*,.pdf" id="file_menkyo_omote_'.$no.'" required>
           </div>
           </div>
           
           <div class="input-flex">
           <div class="input-full file_attach file_attach'.$no.'">
           <p>運転免許証（裏）</p>
           <input type="file" name="file_menkyo_ura_'.$no.'" accept="image/*,.pdf" id="file_menkyo_ura_'.$no.'" required>
           </div>
           </div>
           
           </td>
          </tr>          
';
/* 20211004 Y.Horino 添付書類 */
              
              echo '</table>';
              echo '</figure>';
             }
              ?>
         
         <!--
         <figure>
         <figcaption class="input-section-title">お支払方法の登録</figcaption>
         <table class="input_table">
          
          <tr>
           <th>お支払方法 <span class="label req">必須</span></th>
           <td>
           <?php
           $sel1 = '';
           $sel2 = '';
           if($_SESSION['shiharai']=='クレジットカード') $sel1 = 'checked';
           if($_SESSION['shiharai']=='銀行振込') $sel2 = 'checked';
           ?>
            
            <div class="input-flex">
            <div class="input-full">
            <span class="button-radio">
            <input id="shiharai1" type="radio" name="shiharai" value="クレジットカード" required="" <?php echo $sel1;?>>
            <label for="shiharai1">クレジットカード</label>
            </span>
            </div>
             
            <div class="input-full">
            <span class="button-radio">
            <input id="shiharai2" type="radio" name="shiharai" value="銀行振込" required="" <?php echo $sel2;?>>
            <label for="shiharai2">銀行振込</label></span>
            <p style="font-size: 13px; margin-top: 3px;">※ お申込み後、振込先をメールでご案内します</p>
            </div>
            </div>
            
           </td>
          </tr>
          </table>
         </figure>
         -->
         <input id="shiharai2" type="hidden" name="shiharai" value="銀行振込">
         
          <div class="mitsumori-btn_area back-button-div">
            <input class="mitsumori-submit yellow-shadow-button" type="submit"  id="submit" name="submit" value="確認画面へ">
           <a class="mitsumori-back gray-shadow-button back-button" id="back" onClick="history.back()">前に戻る</a>
          </div>
         <!--
          <div id="input_sec" class="mitsumori-form -input">
            <div class="mitsumori-form_wapper">
              
              </div>
              <div class="mitsumori-btn_area">
                <input class="mitsumori-btn" id="submit" type="submit" name="submit" value="申込み　内容確認">
              </div>
          </div>
        </div>
-->
     </section>
    </form>
  </main>

<aside class="aside-mitsumori-floatbox">
 <div class="mitsumori-result_item">
  
  <?php if($_SESSION['shiharai_kaisu'] == '年払い') { ?>
  <p id="result_kikan" class="mitsumori-result-kikan"><span id="result_kikan_title">加入期間</span><br><span id="result_kikan_s"><?php echo $_SESSION['kikan_sy'].'年'.$_SESSION['kikan'].'月';?></span>～<span id="result_kikan_e"><?php echo $_SESSION['kikan_ey'];?>年<?php echo $_SESSION['kikan_em'];?>月末日</span></p>
  <?php } else { ?>
  <p id="result_kikan" class="mitsumori-result-kikan"><span id="result_kikan_title">初回費用</span><br><span id="result_kikan_s"><?php echo $_SESSION['kikan_sy'].'年'.$_SESSION['kikan'].'月';?></span>～<span id="result_kikan_e"><?php echo $_SESSION['kikan_ey'];?>年<?php echo $_SESSION['kikan_em'];?>月末日</span></p>
  <?php } ?>

  <!--
  <table>
   <tr class="del"><th class="del-span">入会金</th>
    <td class="del-span"><span id="nyukaikin_disp">10,000</span>円</td><td>→</td><td class="wari-span"><span>0円</span></td></tr>
   <tr class="del"><th class="del-span">会　費</th>
    <td class="del-span"><span id="kaihi_disp"><?php echo $_SESSION['kaihi_nowari']; ?></span>円</td><td>→</td><td class="wari-span"><span>36,000円</span></td></tr>
   <tr><th>保険料</th>
    <td><span id="hokenryo_disp"><?php echo $_SESSION['hokenryo']; ?></span>円</td><td></td><td></td></tr>
   </table>
  -->
   <div class="mitsumori-result_item-sougaku mitsumori-result_item-sougaku_nowari">
   <div id="sougaku_title_nowari" class="sougaku_title">合計金額</div>
   <div id="sougaku_price_nowari" class="sougaku_price">
     <span id="sougaku_disp_nowari" class="sougaku_disp sougaku_disp_nowari"><?php echo $_SESSION['sougaku_nowari']; ?></span>円
   </div>
   </div>
  
   <div class="mitsumori-result_item-arrow">
    <img src="img/waribiki_arrow.png" alt="">
   </div>

   <div class="mitsumori-result_item-sougaku">
   <div id="sougaku_title">合計金額</div>
   <div id="sougaku_price">
     <span id="sougaku_disp"><?php echo $_SESSION['sougaku']; ?></span>円
   </div>
   </div>

   <input id="nyukaikin_nowari" type="hidden" name="nyukaikin_nowari" value="<?php echo $_SESSION['nyukaikin_nowari']; ?>">
   <input id="kaihi_nowari" type="hidden" name="kaihi_nowari" value="<?php echo $_SESSION['kaihi_nowari']; ?>">
   <input id="hokenryo_nowari" type="hidden" name="hokenryo_nowari" value="<?php echo $_SESSION['hokenryo']; ?>">
   <input id="sougaku_nowari" type="hidden" name="sougaku_nowari" value="<?php echo $_SESSION['sougaku_nowari']; ?>">

   <input id="nyukaikin" type="hidden" name="nyukaikin" value="<?php echo $_SESSION['nyukaikin']; ?>">
   <input id="kaihi" type="hidden" name="kaihi" value="<?php echo $_SESSION['kaihi']; ?>">
   <input id="hokenryo" type="hidden" name="hokenryo" value="<?php echo $_SESSION['hokenryo']; ?>">
   <input id="sougaku" type="hidden" name="sougaku" value="<?php echo $_SESSION['sougaku']; ?>">
 </div>
</aside>
   
</div>
 
    <!-- footer notes -------------------->
  <!--
    <footer class="ctr f16">
      <img src="../assets/img/f_logo.png" width="327" alt="" />
      <ul class="fbox">
        <li><a href="../tokusyou.html">特定商取引に基づく表記</a></li>
        <p class="pc">　｜　</p>
        <li><a href="../privacy.html">個人情報保護方針</a></li>
        <p class="pc">　｜　</p>
        <li><a href="../sitepolicy.html">サイトポリシー</a></li>
      </ul>
     <p style="font-size: 12px; margin: 10px auto;">Copyright 2020 労働保険事務組合RJC All Rights Reserved.</p>
    </footer>
-->
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
<?php include("table.js"); ?>
 
 
	$(function(){
  $('#input_sec').show();  

  $ninzu_sel = <?php if(isset($_SESSION['ninzu'])) {echo $_SESSION['ninzu'];} else {echo '1';} ?>;
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
   $('input[name="jigyou'+($i+1)+'"]').val("<?php echo $_SESSION['jigyou'];?>");
  }
	});
 
 function kanyusya_copy($no){
  if($no == 0){
   $('#tantousyamei_sei').val($('#daihyosyamei_sei').val());
   $('#tantousyamei_mei').val($('#daihyosyamei_mei').val());
   $('#tantousyamei_furi_sei').val($('#daihyosyamei_furi_sei').val());
   $('#tantousyamei_furi_mei').val($('#daihyosyamei_furi_mei').val());
   $('#tantoumobile').val($('#denwabangou').val());
   input_change($('#tantousyamei_sei'));
   input_change($('#tantousyamei_mei'));
   input_change($('#tantousyamei_furi_sei'));
   input_change($('#tantousyamei_furi_mei'));
   input_change($('#tantoumobile'));
  } else {
   $('#kanyusyamei_sei'+$no).val($('#daihyosyamei_sei').val());
   $('#kanyusyamei_mei'+$no).val($('#daihyosyamei_mei').val());
   $('#kanyusyamei_furi_sei'+$no).val($('#daihyosyamei_furi_sei').val());
   $('#kanyusyamei_furi_mei'+$no).val($('#daihyosyamei_furi_mei').val());
   $('#birthday_y'+$no).val(<?php echo $_SESSION['birth_year']; ?>);
   $('#birthday_m'+$no).val(<?php echo $_SESSION['birth_month']; ?>);
   $('#birthday_d'+$no).val(<?php echo $_SESSION['birth_date']; ?>);
   input_change($('#kanyusyamei_sei'+$no));
   input_change($('#kanyusyamei_mei'+$no));
   input_change($('#kanyusyamei_furi_sei'+$no));
   input_change($('#kanyusyamei_furi_mei'+$no));
   input_change($('#birthday_y'+$no));
   input_change($('#birthday_m'+$no));
   input_change($('#birthday_d'+$no));
  }
  return false;
 }
 
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
  <?php
  $tg_name[1] = 'funjin';
  $tg_name[2] = 'shindou';
  $tg_name[3] = 'namari';
  $tg_name[4] = 'youzai';
   echo 'function kst1_click($idx){
    $pref = $(\'#kanyusya_input\'+$idx+\' select[name="pref\'+$idx+\'"]\').val();
    $val = $(\'#kanyusya_input\'+$idx+\' .kst_1_input input[name="funjin\'+$idx+\'"]:checked\').val();
console.log("粉じん");
console.log($val);
    if($val==\'はい\'){
     $(\'#kanyusya_input\'+$idx+\' .kst_1_input + .kst_1_input2\').show();
     $(\'#kanyusya_input\'+$idx+\' .kst_1_input + .kst_1_input2 select\').attr("required", true);
    } else {
     $(\'#kanyusya_input\'+$idx+\' .kst_1_input + .kst_1_input2\').hide();
     $(\'#kanyusya_input\'+$idx+\' .kst_1_input + .kst_1_input2 select\').val(\'\');
     $(\'#kanyusya_input\'+$idx+\' .kst_1_input + .kst_1_input2 select\').removeAttr("required");
    }
   }';
   
   echo 'function kst2_click($idx){
    $pref = $(\'#kanyusya_input\'+$idx+\' select[name="pref\'+$idx+\'"]\').val();
    $val = $(\'#kanyusya_input\'+$idx+\' .kst_2_input input[name="shindou\'+$idx+\'"]:checked\').val();
console.log("振動");
console.log($val);
    if($val==\'はい\' || $pref == \'福岡県\' || $pref == \'佐賀県\' || $pref == \'長崎県\' || $pref == \'熊本県\' || $pref == \'大分県\' || $pref == \'宮崎県\' || $pref == \'鹿児島県\'){
     $(\'#kanyusya_input\'+$idx+\' .kst_2_input + .kst_2_input2\').show();
     $(\'#kanyusya_input\'+$idx+\' .kst_2_input + .kst_2_input2 select\').attr("required", true);
    } else {
     $(\'#kanyusya_input\'+$idx+\' .kst_2_input + .kst_2_input2\').hide();
     $(\'#kanyusya_input\'+$idx+\' .kst_2_input + .kst_2_input2 select\').val(\'\');
     $(\'#kanyusya_input\'+$idx+\' .kst_2_input + .kst_2_input2 select\').removeAttr("required");
    }
   }';
   
   echo 'function kst3_click($idx){
    $pref = $(\'#kanyusya_input\'+$idx+\' select[name="pref\'+$idx+\'"]\').val();
    $val = $(\'#kanyusya_input\'+$idx+\' .kst_3_input input[name="namari\'+$idx+\'"]:checked\').val();
console.log("鉛");
console.log($val);
    if($val==\'はい\'){
     $(\'#kanyusya_input\'+$idx+\' .kst_3_input + .kst_3_input2\').show();
     $(\'#kanyusya_input\'+$idx+\' .kst_3_input + .kst_3_input2 select\').attr("required", true);
    } else {
     $(\'#kanyusya_input\'+$idx+\' .kst_3_input + .kst_3_input2\').hide();
     $(\'#kanyusya_input\'+$idx+\' .kst_3_input + .kst_3_input2 select\').val(\'\');
     $(\'#kanyusya_input\'+$idx+\' .kst_3_input + .kst_3_input2 select\').removeAttr("required");
    }
   }';
   
   echo 'function kst4_click($idx){
    $pref = $(\'#kanyusya_input\'+$idx+\' select[name="pref\'+$idx+\'"]\').val();
    $val = $(\'#kanyusya_input\'+$idx+\' .kst_4_input input[name="youzai\'+$idx+\'"]:checked\').val();
console.log("有機溶剤");
console.log($val);
    if($val==\'はい\'){
     $(\'#kanyusya_input\'+$idx+\' .kst_4_input + .kst_4_input2\').show();
     $(\'#kanyusya_input\'+$idx+\' .kst_4_input + .kst_4_input2 select\').attr("required", true);
     if($pref == \'福岡県\' || $pref == \'佐賀県\' || $pref == \'長崎県\' || $pref == \'熊本県\' || $pref == \'大分県\' || $pref == \'宮崎県\' || $pref == \'鹿児島県\'){
      $(\'#kanyusya_input\'+$idx+\' .kst_4_input2 .input_youzai21\').hide();
      $(\'#kanyusya_input\'+$idx+\' .kst_4_input2 .input_youzai22\').show();
     } else {
      $(\'#kanyusya_input\'+$idx+\' .kst_4_input2 .input_youzai21\').show();
      $(\'#kanyusya_input\'+$idx+\' .kst_4_input2 .input_youzai22\').hide();
      $basyo = $(\'#kanyusya_input\'+$idx+\' .kst_4_input2 .input_youzai21 input[name="youzai_basyo\'+$idx+\'"]:checked\').val();
      if($basyo == \'屋内\'){
       $(\'#kanyusya_input\'+$idx+\' .kst_4_input2 .input_youzai22\').show();      
      }
     }
    } else {
     $(\'#kanyusya_input\'+$idx+\' .kst_4_input + .kst_4_input2\').hide();
     $(\'#kanyusya_input\'+$idx+\' .kst_4_input + .kst_4_input2 select\').val(\'\');
     $(\'#kanyusya_input\'+$idx+\' .kst_4_input + .kst_4_input2 select\').removeAttr("required");
    }
   }';
  ?>
 
   <?php
echo '		$(\'input[name="jigyou"]\').click(function(){
   jigyou_click(1);
   jigyou_click(2);
   jigyou_click(3);
   jigyou_click(4);
   jigyou_click(5);
  });';
  for($i=1;$i<=5;$i++){
echo 'jigyou_click('.$i.');';
echo '		$(\'#kanyusya_input'.$i.' .kst_1_input input\').click(function(){
   kst1_click('.$i.');
  });
  kst1_click('.$i.');';
echo '		$(\'#kanyusya_input'.$i.' .kst_2_input input\').click(function(){
   kst2_click('.$i.');
  });
  kst2_click('.$i.');';
echo '		$(\'#kanyusya_input'.$i.' .kst_3_input input\').click(function(){
   kst3_click('.$i.');
  });
  kst3_click('.$i.');';
echo '		$(\'#kanyusya_input'.$i.' .kst_4_input input\').click(function(){
   kst4_click('.$i.');
  });
  kst4_click('.$i.');';
echo '		$(\'#kanyusya_input'.$i.' .kst_4_input2 input\').click(function(){
   kst4_click('.$i.');
  });';
  }
  ?>

  function jigyou_click($idx){
   $('#kanyusya_input'+$idx+' .kst_1_input').hide();
   $('#kanyusya_input'+$idx+' .kst_2_input').hide();
   $('#kanyusya_input'+$idx+' .kst_3_input').hide();
   $('#kanyusya_input'+$idx+' .kst_4_input').hide();
   $('#kanyusya_input'+$idx+' .kst_1_input2').hide();
   $('#kanyusya_input'+$idx+' .kst_2_input2').hide();
   $('#kanyusya_input'+$idx+' .kst_3_input2').hide();
   $('#kanyusya_input'+$idx+' .kst_4_input2').hide();
   $('#kanyusya_input'+$idx+' .kst_1_input input').removeAttr("required");
   $('#kanyusya_input'+$idx+' .kst_2_input input').removeAttr("required");
   $('#kanyusya_input'+$idx+' .kst_3_input input').removeAttr("required");
   $('#kanyusya_input'+$idx+' .kst_4_input input').removeAttr("required");
   $('#kanyusya_input'+$idx+' .kst_1_input2 select').removeAttr("required");
   $('#kanyusya_input'+$idx+' .kst_2_input2 select').removeAttr("required");
   $('#kanyusya_input'+$idx+' .kst_3_input2 select').removeAttr("required");
   $('#kanyusya_input'+$idx+' .kst_4_input2 select').removeAttr("required");

  <?php
   echo '
    $pref = $(\'#kanyusya_input\'+$idx+\' select[name="pref\'+$idx+\'"]\').val();
    if('.$kouji_syubetu_type[$_SESSION['jigyou']][0].' == 1){
console.log("'.$kouji_syubetu_type[$_SESSION['jigyou']][0].' == 1");
    $(\'#kanyusya_input\'+$idx+\' .kst_1_input\').show();
    $(\'#kanyusya_input\'+$idx+\' .kst_1_input input\').attr("required", true);
    if($(\'#kanyusya_input\'+$idx+\' .kst_1_input input\').val() == \'はい\'){
     $(\'#kanyusya_input\'+$idx+\' .kst_1_input2\').show();
     $(\'#kanyusya_input\'+$idx+\' .kst_1_input2 select\').attr("required", true);
    }
   } else {
    $(\'#kanyusya_input\'+$idx+\' .kst_1_input input[value="いいえ"]\').prop(\'checked\', true);
    $(\'#kanyusya_input\'+$idx+\' .kst_1_input input[value="はい"]\').prop(\'checked\', false);
   }';
   
   echo '
    $pref = $(\'#kanyusya_input\'+$idx+\' select[name="pref\'+$idx+\'"]\').val();
    if('.$kouji_syubetu_type[$_SESSION['jigyou']][1].' == 1){
console.log("'.$kouji_syubetu_type[$_SESSION['jigyou']][1].' == 1");
    $(\'#kanyusya_input\'+$idx+\' .kst_2_input\').show();
    $(\'#kanyusya_input\'+$idx+\' .kst_2_input input\').attr("required", true);
    if($(\'#kanyusya_input\'+$idx+\' .kst_2_input input\').val() == \'はい\'){
     $(\'#kanyusya_input\'+$idx+\' .kst_2_input2\').show();     
     $(\'#kanyusya_input\'+$idx+\' .kst_2_input2 select\').attr("required", true);
    }
   } else {
    $(\'#kanyusya_input\'+$idx+\' .kst_2_input input[value="いいえ"]\').prop(\'checked\', true);
    $(\'#kanyusya_input\'+$idx+\' .kst_2_input input[value="はい"]\').prop(\'checked\', false);
   }';
   
   echo '
    $pref = $(\'#kanyusya_input\'+$idx+\' select[name="pref\'+$idx+\'"]\').val(); 
    if('.$kouji_syubetu_type[$_SESSION['jigyou']][2].' == 1){
console.log("'.$kouji_syubetu_type[$_SESSION['jigyou']][2].' == 1");
    $(\'#kanyusya_input\'+$idx+\' .kst_3_input\').show();
    $(\'#kanyusya_input\'+$idx+\' .kst_3_input input\').attr("required", true);
    if($(\'#kanyusya_input\'+$idx+\' .kst_3_input input\').val() == \'はい\'){
     $(\'#kanyusya_input\'+$idx+\' .kst_3_input2\').show();
     $(\'#kanyusya_input\'+$idx+\' .kst_3_input2 select\').attr("required", true);
    }
   } else {
    $(\'#kanyusya_input\'+$idx+\' .kst_3_input input[value="いいえ"]\').prop(\'checked\', true);
    $(\'#kanyusya_input\'+$idx+\' .kst_3_input input[value="はい"]\').prop(\'checked\', false);
   }';
   
   echo '
    $pref = $(\'#kanyusya_input\'+$idx+\' select[name="pref\'+$idx+\'"]\').val();
    if('.$kouji_syubetu_type[$_SESSION['jigyou']][3].' == 1){
console.log("'.$kouji_syubetu_type[$_SESSION['jigyou']][3].' == 1");
    $(\'#kanyusya_input\'+$idx+\' .kst_4_input\').show();
    $(\'#kanyusya_input\'+$idx+\' .kst_4_input input\').attr("required", true);
    if($(\'#kanyusya_input\'+$idx+\' .kst_4_input input\').val() == \'はい\'){
     $(\'#kanyusya_input\'+$idx+\' .kst_4_input2\').show();
     $(\'#kanyusya_input\'+$idx+\' .kst_4_input2 select\').attr("required", true);
    }
   } else {
    $(\'#kanyusya_input\'+$idx+\' .kst_4_input input[value="いいえ"]\').prop(\'checked\', true);
    $(\'#kanyusya_input\'+$idx+\' .kst_4_input input[value="はい"]\').prop(\'checked\', false);
   }';
   ?>
		} 
</script>

  <script>
   /*
function check_email(){
	$(".emailerr").hide();
 $ret = true;
 
	$email_input = $("#email").val();
	$email_chk_input = $("#emailchk").val();
	$("#emailerr").hide();
	if($email_input != $email_chk_input){
		$("#emailerr").show();
		$("#emailerr").css('color','#ff0000');
		$(window).scrollTop($("#email").offset().top - 70);
		$ret = false;
	}
 
	return $ret;
}
*/
   
function type_click($typesel){
 $('.tr_hojin').hide();
 $('.tr_kojin').hide();
 $('.sec_kojin').hide();
// $typesel = $('input[name="type"]:checked').val();
// $typesel = "<?php echo $_SESSION['type'];?>";
 if($typesel == '法人'){
  $('.tr_hojin').show();
  $('.tr_hojin input[type="file"]').attr('required', true);
  $('.tr_kojin input[type="file"]').val("");
  $('.tr_kojin input[type="file"]').removeAttr('required');
 } else if($typesel == '個人'){
  $('.tr_kojin').show();
  $('.sec_kojin').show();
  $('.tr_kojin input[type="file"]').attr('required', true);
  $('.tr_hojin input[type="file"]').val("");
  $('.tr_hojin input[type="file"]').removeAttr('required');
 }
 /*
 $kikan = <?php echo $_SESSION['kikane'];?>;
 if($kikan == 0){
  $('.tr_3month_hide').show();
  $('.tr_3month_hide input[type="file"]').attr('required', true);
 } else {
  $('.tr_3month_hide').hide();
  $('.tr_3month_hide input[type="file"]').val("");
  $('.tr_3month_hide input[type="file"]').removeAttr('required');
 }
 */
}
   
function add_file_rirekisyo(){
 $num = $('input[name="f_num"]').val()*1;
 if($num <= 0) $num = 1;
 $num_next = $num+1;
 if($num == 1){
  $('input[name="file_rirekisyo'+$num+'"]').after('<input type="file" name="file_rirekisyo'+$num_next+'" accept="image/*,.pdf" id="file_rirekisyo'+$num_next+'" required><input type="button" name="del_button" id="del_button" onclick="del_file_rirekisyo();" value="×">');
 } else {
  $('input[name="file_rirekisyo'+$num+'"]').after('<input type="file" name="file_rirekisyo'+$num_next+'" accept="image/*,.pdf" id="file_rirekisyo'+$num_next+'" required>');
 }
 $('input[name="f_num"]').val($num_next);
}

function del_file_rirekisyo(){
 $num = $('input[name="f_num"]').val()*1;
 if($num <= 0) $num = 1;
 $num_prev = $num-1;
 $('input[name="file_rirekisyo'+$num+'"]').val("");
 $('input[name="file_rirekisyo'+$num+'"]').remove();
 $('input[name="f_num"]').val($num_prev);
 if($num_prev == 1){
  $('#del_button').remove();
 }
}

function sendonfax(){
 $chk = $("#sendonfax").prop('checked');
 console.log($chk);
 if($chk == true){
  $('.file_attach').hide();
  $('.file_attach input[type="file"]').val("");
  $('.file_attach input[type="file"]').removeAttr("required");
 } else {
  $('.file_attach').show();
  $('.file_attach input[type="file"]').attr("required");
  for($i=0;$i<=5;$i++){
   $('.file_attach'+$i).hide();
   $('.file_attach'+$i+' input[type="file"]').val("");
   $('.file_attach'+$i+' input[type="file"]').removeAttr("required");
   if($i <= <?php echo $_SESSION['ninzu'];?>){
    $('.file_attach'+$i).show();
    $('.file_attach'+$i+' input[type="file"]').attr("required", "required");
  }
  }
 }
}
   
$(function(){
		$(".emailerr").hide();

		$("form").submit(function(){
//			return check_email();
		});
  $('input[name="type"] + label').click(function(){
   console.log('type_click');
   $type = $(this).prev('input[name="type"]').val();
   type_click($type);
  });
  $type = $('input[name="type"]:checked').val();
  type_click($type);

		$("#sendonfax").click(function(){
   sendonfax();
  });
  sendonfax();
 
	});
  </script>

<script>
$(".form-bg").on('keydown keyup keypress change focus blur', function() {
 input_change(this);
}
).change();
 
function input_change(_this){ 
 if ($(_this).val() == '') {
 $(_this).removeClass('filled');
 } else {
 $(_this).addClass('filled');
 }
}
 
 /*
$(".form-bg").on('keydown keyup keypress change focus blur', function() {
if ($(this).val() == '') {
$(this).removeClass('filled');
} else {
$(this).addClass('filled');
}
}
).change();
*/
 
// https://coco-factory.jp/ugokuweb/move01/5-1-5/
//スクロールすると上部に固定させるための設定を関数でまとめる
function FixedAnime() {
	var headerH = $('header').outerHeight(true);
	var scroll = $(window).scrollTop();
	if (scroll >= headerH){//headerの高さ以上になったら
			$('.mitsumori-result_item').addClass('top-fixed');//fixedというクラス名を付与
		}else{//それ以外は
			$('.mitsumori-result_item').removeClass('top-fixed');//fixedというクラス名を除去
		}
}

// 画面をスクロールをしたら動かしたい場合の記述
$(window).scroll(function () {
	FixedAnime();/* スクロール途中からヘッダーを出現させる関数を呼ぶ*/
});

// ページが読み込まれたらすぐに動かしたい場合の記述
$(window).on('load', function () {
	FixedAnime();/* スクロール途中からヘッダーを出現させる関数を呼ぶ*/
});
  
</script>
  
</body>
</html>