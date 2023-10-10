<?php
// セッションの開始
ob_start();
session_start();

header("Content-type: text/html;charset=utf-8");
require_once('../../form/function.php');

include('session_check.php');

function item_set($item){
 if(isset($item) && $item != '') return true;
 else return false;
}
function disp_fixeditem($itemname){
 echo '
 <input type="hidden" name="'.$itemname.'" id="'.$itemname.'" value="'.$_SESSION[$itemname].'">
 <span class="input_fixed">'.$_SESSION[$itemname].'</span>
 '; 
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
<?php include_once  $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_head.html'; ?>
 
 
  <title>雇用保険の加入申込み：労働保険事務組合RJC　無料見積りフォーム</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="format-detection" content="telephone=no">
 
  <link rel="canonical" href="https://www.xn--y5q0r2lqcz91qdrc.com/koyohoken/form/input.php">
  <meta name="robots" content="all">
  <meta name="copyright" content="Copyright 2020 労働保険事務組合RJC All Rights Reserved.">
  <meta property="og:title" content="雇用保険の加入申込み：労働保険事務組合RJC　無料見積りフォーム">
  <meta property="og:type" content="article">
  <meta property="og:url" content="https://www.xn--y5q0r2lqcz91qdrc.com/koyohoken/form/input.php">
  <meta property="og:image" content="https://www.xn--y5q0r2lqcz91qdrc.com/assets/logo_img/logo_jimukumiai.png">
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
  <script src="mynumber.js"></script>

 <script type="text/javascript" src="../../assets/js/jquery.jpostal.js-master/jquery.jpostal.js"></script>
 <script src="https://kit.fontawesome.com/a366e23f99.js" crossorigin="anonymous"></script>
 
<script type="text/javascript" src="../../assets/js/jquery.autoKana.js"></script>
 
 <?php include_once('./pw_toggle.inc'); ?>
 
<script>
$(function() {
 $.fn.autoKana('#kaisyamei', '#kaisyamei_furi', {katakana:true});
 $.fn.autoKana('#daihyosyamei_sei', '#daihyosyamei_furi_sei', {katakana:true});
 $.fn.autoKana('#daihyosyamei_mei', '#daihyosyamei_furi_mei', {katakana:true});
 $.fn.autoKana('#tantousyamei_sei', '#tantousyamei_furi_sei', {katakana:true});
 $.fn.autoKana('#tantousyamei_mei', '#tantousyamei_furi_mei', {katakana:true});
 $.fn.autoKana('#jyugyoinmei_sei1', '#jyugyoinmei_furi_sei1', {katakana:true});
 $.fn.autoKana('#jyugyoinmei_mei1', '#jyugyoinmei_furi_mei1', {katakana:true});
 $.fn.autoKana('#jyugyoinmei_sei2', '#jyugyoinmei_furi_sei2', {katakana:true});
 $.fn.autoKana('#jyugyoinmei_mei2', '#jyugyoinmei_furi_mei2', {katakana:true});
 $.fn.autoKana('#jyugyoinmei_sei3', '#jyugyoinmei_furi_sei3', {katakana:true});
 $.fn.autoKana('#jyugyoinmei_mei3', '#jyugyoinmei_furi_mei3', {katakana:true});
 $.fn.autoKana('#jyugyoinmei_sei4', '#jyugyoinmei_furi_sei4', {katakana:true});
 $.fn.autoKana('#jyugyoinmei_mei4', '#jyugyoinmei_furi_mei4', {katakana:true});
 $.fn.autoKana('#jyugyoinmei_sei5', '#jyugyoinmei_furi_sei5', {katakana:true});
 $.fn.autoKana('#jyugyoinmei_mei5', '#jyugyoinmei_furi_mei5', {katakana:true});
});
</script>
 
<script>
$(function () {
	$('#zip').jpostal({
		postcode : [
			'#zip'
		],
		address : {
			'#pref' : '%3',
			'#city' : '%4',
			'#address' : '%5',
			'#address2' : '%6%7',
		}
	});
 
 <?php for($no=1;$no<=intval($_SESSION['ninzu']);$no++){ ?>

	$('#zip<?php echo $no;?>').jpostal({
		postcode : [
			'#zip<?php echo $no;?>'
		],
		address : {
			'#pref<?php echo $no;?>' : '%3',
			'#city<?php echo $no;?>' : '%4',
			'#address<?php echo $no;?>' : '%5',
			'#address2<?php echo $no;?>' : '%6%7',
		}
	});
 
 <?php } ?>
});
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
 
<body id="input_php">
 
 <?php
  //if(isset($_GET['debug']) && $_GET['debug'] == 1){
   include_once('popup.php');
  //}
 ?>
 
<?php include_once  $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_body.html'; ?>
 
 
 <a href="#main">メインコンテンツに移動</a>
	
    <header>
      <div class="header__flex">
        <a href="/koyohoken/"><img class="h_logo" src="../../assets/logo_img/logo_jimukumiai.png" width="327" alt="" /></a>
      </div>
      <h1 class="mitsumori-maintitle">雇用保険の加入申込み</h1>
    </header>
	
<?php /* https://blog-and-destroy.com/7283 */ ?>
<style>
#overlay, 
#overlay2{ 
  position: fixed;
  top: 0;
  z-index: 100;
  width: 100%;
  height:100%;
  display: none;
  background: rgba(0,0,0,0.6);
}
.cv-spinner {
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;  
}
.spinner {
  width: 40px;
  height: 40px;
  border: 4px #ddd solid;
  border-top: 4px #2e93e6 solid;
  border-radius: 50%;
  animation: sp-anime 0.8s infinite linear;
}
@keyframes sp-anime {
  100% { 
    transform: rotate(360deg); 
  }
}
.is-hide{
  display:none;
}
</style>
 
<div id="overlay">
  <div class="cv-spinner">
    <span class="spinner"></span>
  </div>
</div>

<div id="overlay2">
  <div class="cv-spinner">
    <span class="spinner"></span>
  </div>
</div>
 
  <!-- contents ///////////////////////////////////-->
 <div id="mainbody">
  <main id="main">
   
    <form name="form" method="post" action="trans.php" enctype="multipart/form-data">
      <input type="hidden" id="pagename" name="pagename" value = "input.php">
     
      <input type="hidden" id="kikan" name="kikan" value = "<?php echo $_SESSION['kikan'];?>">
      <input type="hidden" id="ninzu" name="ninzu" value = "<?php echo $_SESSION['ninzu'];?>">
      <input type="hidden" id="koyo_hajimete" name="koyo_hajimete" value = "<?php echo $_SESSION['koyo_hajimete'];?>">
      <input type="hidden" id="shiharai_tsuki" name="shiharai_tsuki" value = "<?php echo $_SESSION['shiharai_tsuki'];?>">
      <input type="hidden" id="koyo_bangou" name="koyo_bangou" value = "<?php echo $_SESSION['koyo_bangou'];?>">
      <input type="hidden" id="sougaku" name="sougaku" value = "<?php echo $_SESSION['sougaku'];?>">
     
      <input type="hidden" id="kaisya_id" name="kaisya_id" value = "<?php echo $_SESSION['kaisya_id'];?>">
      <input type="hidden" id="order_no" name="order_no" value = "">
      <input type="hidden" id="roudouhoken_no" name="roudouhoken_no" value = "<?php echo $_SESSION['roudouhoken_no']; ?>">
     
      <section class="mitsumori input_section">
      <h1 class="mitsumori-ttl">お客様情報の入力</h1>
        <?php if(item_set($_SESSION['roudouhoken_no'])) { ?>
        <p class="input_fixed_message">内容をご確認いただき、変更がある場合は申込後にご連絡ください。</p>
        <?php } ?>
        <div class="mitsumori-inner">
         
         <figure>
         <figcaption>会社情報</figcaption>
         <table class="input_table">
          
          <tr>
           <th>個人ですか？法人ですか？</th><th><span class="label req">必須</span></th>
           <td>
           <?php if(item_set($_SESSION['type'])) { ?>
           <?php disp_fixeditem('type'); ?>
           <?php } else { ?>
            <?php
            $sel1 = '';
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
            
            <input id="type1" type="radio" name="type" value="個人" required="" <?php echo $sel1;?>>
            <label for="type1"><span>個人</span></label>

            <input id="type2" type="radio" name="type" value="法人" required="" <?php echo $sel2;?>>
            <label for="type2"><span>法人</span></label>
            <?php } ?>
            
           </td>
          </tr>
          
          <tr>
           <th>会社名・屋号</th><th><span class="label req">必須</span></th>
           <td>
            <?php if(item_set($_SESSION['kaisyamei'])) { ?>
            <?php disp_fixeditem('kaisyamei'); ?>
            <?php } else { ?>
            <input id="kaisyamei" type="text" name="kaisyamei" required="" placeholder="株式会社　労災建設" value="">
            <?php } ?>
           </td>
           
          </tr>
          
          <tr>
           <th>会社名・屋号 フリガナ</th><th><span class="label req">必須</span></th>
           <td>
            
            <?php if(item_set($_SESSION['kaisyamei_furi'])) { ?>
            <?php disp_fixeditem('kaisyamei_furi'); ?>
            <?php } else { ?>
            <input id="kaisyamei_furi" type="text" name="kaisyamei_furi" required="" placeholder="カブシキガイシャ　ロウサイケンセツ" value="<?php echo $_SESSION['kaisyamei_furi']; ?>" pattern="[\u30A1-\u30FC\u3041-\u309F\uFF10-\uFF19\uFF21-\uFF3A\uFF41-\uFF5A|　| ]*" title="ひらがな、カタカナ">
            <?php } ?>
           </td>
           
          </tr>
          
          <?php $_SESSION['zip'] = str_replace('-', '', $_SESSION['zip']); ?>
          <tr>
          <th>郵便番号</th><th><span class="label req">必須</span></th>
          <td>
           <?php if(item_set($_SESSION['zip'])) { ?>
           <?php disp_fixeditem('zip'); ?>
           <?php } else { ?>
           <input type="tel" name="zip" id="zip" class="zip" placeholder="1234567(ハイフンなし)" maxlength="8" value="<?php echo $_SESSION['zip']; ?>" pattern="[0-9]+$" title="数字(ハイフンなし)" required>
           <?php } ?>
          </td>
          </tr>

          <tr>
          <th>都道府県</th><th><span class="label req">必須</span></th>
          <td>
           <?php if(item_set($_SESSION['pref'])) { ?>
           <?php disp_fixeditem('pref'); ?>
           <?php } else { ?>
           <select id="pref" name="pref" class="" required>
           <option value="">選択してください</option>
           <?php
            for($i=1;$i<=47;$i++){
   $sel = '';
   if($_SESSION['pref']==$pref[$i]) $sel = 'selected';
             echo '<option value="'.$pref[$i].'" '.$sel.'>'.$pref[$i].'</option>';
            }
            ?>
           </select>
           <?php } ?>
          </td>
          </tr>

          <tr>
          <th>市区町村</th><th><span class="label req">必須</span></th>
          <td>
           <?php if(item_set($_SESSION['city'])) { ?>
           <?php disp_fixeditem('city'); ?>
           <?php } else { ?>
           <input id="city" type="text" name="city" required="" placeholder="千代田区" value="<?php echo $_SESSION['city']; ?>">
           <?php } ?>
          </td>
          </tr>

          <tr>
          <th>丁目・番地号</th><th><span class="label req">必須</span></th>
          <td>
           <?php if(item_set($_SESSION['address'])) { ?>
           <?php disp_fixeditem('address'); ?>
           <?php } else { ?>
           <input id="address" type="text" name="address" required="" placeholder="千代田１－１" value="<?php echo $_SESSION['address']; ?>">
           <?php } ?>
          </td>
          </tr>

          <tr>
          <th>建物名等</th><th></th>
          <td>
           <?php if(item_set($_SESSION['apart'])) { ?>
           <?php disp_fixeditem('apart'); ?>
           <?php } else { ?>
           <input id="apart" class="no-required" type="text" name="apart" placeholder="東京ビルディング１０１" value="<?php echo $_SESSION['apart']; ?>">
           <?php } ?>
          </td>
          </tr>
          
          <?php $_SESSION['denwabangou'] = str_replace('-', '', $_SESSION['denwabangou']); ?>
          <tr>
          <th>電話番号</th><th><span class="label req">必須</span></th>
          <td>

           <?php if(item_set($_SESSION['denwabangou'])) { ?>
           <?php disp_fixeditem('denwabangou'); ?>
           <?php } else { ?>
           <input id="denwabangou" type="tel" name="denwabangou" class="" required="" placeholder="0311112222(ハイフンなし)" maxlength="13" value="<?php echo $_SESSION['denwabangou']; ?>" pattern="[0-9]+$" title="数字(ハイフンなし)">
           <?php } ?>
            
          </td>

          </tr>
          
          <?php $_SESSION['faxbangou'] = str_replace('-', '', $_SESSION['faxbangou']); ?>
          <tr>
          <th>FAX番号</th></th><th>
          <td>
            
           <?php if(item_set($_SESSION['faxbangou'])) { ?>
           <?php disp_fixeditem('faxbangou'); ?>
           <?php } else { ?>
           <input id="faxbangou" type="tel" name="faxbangou" class="" placeholder="0311112223(ハイフンなし)" maxlength="13" value="<?php echo $_SESSION['faxbangou']; ?>" pattern="[0-9]+$" title="数字(ハイフンなし)">
           <?php } ?>
            
          </td>
           
          </tr>
          
          <tr>
          <th>メールアドレス</th><th><span class="label req">必須</span></th>
          <td>

           <?php if(item_set($_SESSION['mail'])) { ?>
           <?php disp_fixeditem('mail'); ?>
           <?php } else { ?>
           <input id="email" type="email" name="mail" placeholder="name@domain.co.jp" value="<?php echo $_SESSION['mail']; ?>" required>
           <?php } ?>

          </td>
           
          </tr>
          
          <tr>
           <th>給与支払い</th><th><span class="label req">必須</span></th>
           <td>
            <?php if(item_set($_SESSION['jimuChinginShimeShiharaibi__c'])) { ?>
            <?php 
             $shimebi = mb_substr($_SESSION['jimuChinginShimeShiharaibi__c'],0,mb_strpos($_SESSION['jimuChinginShimeShiharaibi__c'],'締'));
             $shimebi_after = mb_substr($_SESSION['jimuChinginShimeShiharaibi__c'],mb_strpos($_SESSION['jimuChinginShimeShiharaibi__c'],'締')+1);
             $shiharaibi_month = mb_substr($shimebi_after,0,mb_strpos($shimebi_after,'月')+1);
             $shiharaibi_month_after = mb_substr($shimebi_after,mb_strpos($shimebi_after,'月')+1);
             $shiharaibi = mb_substr($shiharaibi_month_after,0,mb_strpos($shiharaibi_month_after,'払'));
            ?>
            <input type="hidden" name="shimebi" id="shimebi" value="<?php echo $shimebi; ?>">
            <input type="hidden" name="shiharaibi_month" id="shiharaibi_month" value="<?php echo $shiharaibi_month; ?>">
            <input type="hidden" name="shiharaibi" id="shiharaibi" value="<?php echo $shiharaibi; ?>">
            <span class="input_fixed"><?php echo $_SESSION['jimuChinginShimeShiharaibi__c']; ?></span>
            <?php } else { ?>
            <div class="kyuyo_selbox">
             <span class="kyuyo_selitem">
              <span class="kyuyo_selitem_label">締め日</span>
              <span class="kyuyo_selitem_input full">
              <select id="shimebi" name="shimebi" required>
               <option value="">-</option>
               <?php for($i=1;$i<=28;$i++){ ?>
               <option value="<?php echo $i;?>日"><?php echo $i;?>日</option>
               <?php } ?>
               <option value="末">末日</option>
              </select>
              </span>
             </span>
             <span class="kyuyo_selitem">
              <span class="kyuyo_selitem_label">支払日</span>
              <span class="kyuyo_selitem_input">
              <select id="shiharaibi_month" name="shiharaibi_month" required>
               <option value="">-</option>
               <option value="当月">当月</option>
               <option value="翌月">翌月</option>
              </select>
              <select id="shiharaibi" name="shiharaibi" required>
               <option value="">-</option>
               <?php for($i=1;$i<=28;$i++){ ?>
               <option value="<?php echo $i;?>日"><?php echo $i;?>日</option>
               <?php } ?>
               <option value="末">末日</option>
              </select>
              </span>
             </span>
            </div>
            <?php } ?>
           </td>
           
          </tr>
     
         </table>
         </figure>
         <figure>
         <figcaption>代表者情報</figcaption>
         <table class="input_table">
          
          <tr class="fl_l fl_c">
           <th>氏名</th><th><span class="label req">必須</span></th>
           <td>
            <?php if(item_set($_SESSION['daihyosyamei_sei'])) { ?>
            <?php disp_fixeditem('daihyosyamei_sei'); ?>
            <?php disp_fixeditem('daihyosyamei_mei'); ?>
            <?php } else { ?>
            <div class="input_table_flex">
            <input id="daihyosyamei_sei" type="text" name="daihyosyamei_sei" required="" placeholder="代表" value="<?php echo $_SESSION['daihyosyamei_sei']; ?>">　<input id="daihyosyamei_mei" type="text" name="daihyosyamei_mei" required="" placeholder="太郎" value="<?php echo $_SESSION['daihyosyamei_mei']; ?>">
            </div>
            <?php } ?>
           </td>
           
          </tr>
           
          <tr class="fl_l fl_c">
           <th>フリガナ</th><th><span class="label req">必須</span></th>
           <td>
            <?php if(item_set($_SESSION['daihyosyamei_furi_sei'])) { ?>
            <?php disp_fixeditem('daihyosyamei_furi_sei'); ?>
            <?php disp_fixeditem('daihyosyamei_furi_mei'); ?>
            <?php } else { ?>
            <div class="input_table_flex">
            <input id="daihyosyamei_furi_sei" type="text" name="daihyosyamei_furi_sei" required="" placeholder="ダイヒョウ" value="<?php echo $_SESSION['daihyosyamei_furi_sei']; ?>" pattern="[\u30A1-\u30FC\u3041-\u309F|　| ]*" title="ひらがな、カタカナ">　<input id="daihyosyamei_furi_mei" type="text" name="daihyosyamei_furi_mei" required="" placeholder="タロウ" value="<?php echo $_SESSION['daihyosyamei_furi_mei']; ?>" pattern="[\u30A1-\u30FC\u3041-\u309F|　| ]*" title="ひらがな、カタカナ">
            </div>
            <?php } ?>
           </td>
           
          <tr class="fl_c">
           <th>役職</th><th><span class="label req">必須</span></th>
           <td>
            
            <?php if(item_set($_SESSION['daihyosyayakusyoku'])) { ?>
            <?php disp_fixeditem('daihyosyayakusyoku'); ?>
            <?php } else { ?>
            <select id="daihyosyayakusyoku" type="text" name="daihyosyayakusyoku" class="" required="">
             <option value="代表">代表</option>
             <option value="取締役">取締役</option>
             <option value="代表取締役">代表取締役</option>
             <option value="代表社員">代表社員</option>
            </select>
            <?php } ?>
           </td>
          </tr>
          
         </table>
         </figure>
          
              <?php
             for($no=1;$no<=intval($_SESSION['ninzu']);$no++){
              echo '<figure id="jyugyoin_input'.$no.'"><figcaption>'.$no.'人目の従業員情報';
              echo '</figcaption>';
              echo '<table class="input_table">';
              
              echo '
              <tr>
               <th>氏名</th><th><span class="label req">必須</span></th>
               <td>
               <div class="input_table_flex">
                <input id="jyugyoinmei_sei'.$no.'" type="text" name="jyugyoinmei_sei'.$no.'" placeholder="労災" value="'.$_SESSION['jyugyoinmei_sei'.$no].'">　<input id="jyugyoinmei_mei'.$no.'" type="text" name="jyugyoinmei_mei'.$no.'" placeholder="太郎" value="'.$_SESSION['jyugyoinmei_mei'.$no].'">
                </div>
               </td>

              </tr>
              
              <tr>
               <th>フリガナ</th><th><span class="label req">必須</span></th>
               <td>
                <div class="input_table_flex">
                <input id="jyugyoinmei_furi_sei'.$no.'" type="text" name="jyugyoinmei_furi_sei'.$no.'" placeholder="ロウサイ" value="'.$_SESSION['jyugyoinmei_furi_sei'.$no].'" pattern="[\u30A1-\u30FC\u3041-\u309F|　| ]*" title="ひらがな、カタカナ">　<input id="jyugyoinmei_furi_mei'.$no.'" type="text" name="jyugyoinmei_furi_mei'.$no.'" placeholder="タロウ" value="'.$_SESSION['jyugyoinmei_furi_mei'.$no].'" pattern="[\u30A1-\u30FC\u3041-\u309F|　| ]*" title="ひらがな、カタカナ">
                </div>
               </td>

              </tr>
              
              <tr>
               <th>入社日</th><th><span class="label req">必須</span></th>
               <td>
               
               <div class="input_table_flex">
        <select name="nyusyadate_y'.$no.'" id="nyusyadate_y'.$no.'" class="nyusyadate">';
							 
echo '<option value="">-- 年 --</option>';
							 
					for($y=intval(date('Y'))-60;$y<=intval(date('Y'));$y++){
						$sel = '';
						if($_SESSION['nyusyadate_y'.$no]==$y) $sel = 'selected';
						echo '<option value="'.$y.'" '.$sel.'>'.seireki_to_wareki($y).'年('.$y.'年)</option>';
					}
					echo '</select>　';
					echo '<select name="nyusyadate_m'.$no.'" id="nyusyadate_m'.$no.'" class="nyusyadate">';
							 
echo '<option value="">-- 月 --</option>';
							 
					for($m=1;$m<=12;$m++){
						$sel = '';
						if($_SESSION['nyusyadate_m'.$no]==$m) $sel = 'selected';
						echo '<option value="'.$m.'" '.$sel.'>'.$m.'月</option>';
					}
					echo '</select>　';
					echo '<select name="nyusyadate_d'.$no.'" id="nyusyadate_d'.$no.'" class="nyusyadate">';
							 
echo '<option value="">-- 日 --</option>';
							 
					for($d=1;$d<=31;$d++){
						$sel = '';
						if($_SESSION['nyusyadate_d'.$no]==$d) $sel = 'selected';
						echo '<option value="'.$d.'" '.$sel.'>'.$d.'日</option>';
					}
					echo '</select></div>
     
               </td>

              </tr>
              
              <tr>
               <th>給与区分</th><th><span class="label req">必須</span></th>
               <td>
                <select id="kyuyokubun'.$no.'" name="kyuyokubun'.$no.'">
                <option value="">-- 選択 --</option>
                <option value="時給">時給</option>
                <option value="日給">日給</option>
                <option value="日給月給">日給月給</option>
                </select>
               </td>

              </tr>
              
              <tr>
               <th>月給(万円)</th><th><span class="label req">必須</span></th>
               <td>
                <div class="input_table_flex">
                <input id="gekkyu'.$no.'" type="tel" name="gekkyu'.$no.'" placeholder="30" value="'.$_SESSION['gekkyu'.$no].'" >
                </div>
               </td>

              </tr>
              ';
              
              echo '
              <tr>
               <th>生年月日</th><th><span class="label req">必須</span></th>
               <td>
               <div class="input_table_flex">
        <select name="birthday_y'.$no.'" id="birthday_y'.$no.'" class="birthday">';
							 
echo '<option value="">-- 年 --</option>';
							 
					for($y=intval(date('Y'))-80;$y<=intval(date('Y'))-10;$y++){
						$sel = '';
						if($_SESSION['birthday_y'.$no]==$y) $sel = 'selected';
						echo '<option value="'.$y.'" '.$sel.'>'.seireki_to_wareki($y).'年('.$y.'年)</option>';
					}
					echo '</select>　';
					echo '<select name="birthday_m'.$no.'" id="birthday_m'.$no.'" class="birthday">';
							 
echo '<option value="">-- 月 --</option>';
							 
					for($m=1;$m<=12;$m++){
						$sel = '';
						if($_SESSION['birthday_m'.$no]==$m) $sel = 'selected';
						echo '<option value="'.$m.'" '.$sel.'>'.$m.'月</option>';
					}
					echo '</select>　';
					echo '<select name="birthday_d'.$no.'" id="birthday_d'.$no.'" class="birthday">';
							 
echo '<option value="">-- 日 --</option>';
							 
					for($d=1;$d<=31;$d++){
						$sel = '';
						if($_SESSION['birthday_d'.$no]==$d) $sel = 'selected';
						echo '<option value="'.$d.'" '.$sel.'>'.$d.'日</option>';
					}
					echo '</select></div>
                
               </td>

              </tr>
              ';
              
              echo '
              <tr>
               <th>マイナンバー</th><th><span class="label req">必須</span></th>
               <td>
                <div class="input_table_flex">
                <span class="input_password"><input type="password"  id="mynumber'.$no.'" name="mynumber'.$no.'" value="" placeholder="12桁(12345678012)" maxlength="12" minlength="12" required><i class="fa-solid fa-eye pw_input_eyeicon"></i></span>
                </div>
                <p class="mynumbererr" id="mynumbererr'.$no.'">マイナンバー番号に誤りがあります</p>
               </td>

              </tr>
              ';
              $_SESSION['zip'.$no] = str_replace('-', '', $_SESSION['zip'.$no]);
              echo '
              <tr>
              <th>郵便番号</th><th><span class="label req">必須</span></th>
              <td>
              <input type="tel" name="zip'.$no.'" id="zip'.$no.'" class="zip " placeholder="1234567(ハイフンなし)" maxlength="8" value="'.$_SESSION['zip'.$no].'" pattern="[0-9]+$" title="数字(ハイフンなし)" required>
              </td>
              </tr>

              <tr>
              <th>都道府県</th><th><span class="label req">必須</span></th>
              <td>
              <select id="pref'.$no.'" name="pref'.$no.'" class="" required>
              <option value="">選択してください</option>';
               for($i=1;$i<=47;$i++){
                $sel = '';
                if($_SESSION['pref'.$no]==$pref[$i]) $sel = 'selected';
                echo '<option value="'.$pref[$i].'" '.$sel.'>'.$pref[$i].'</option>';
               }
              echo '
              </select>
              </td>
              </tr>

              <tr>
              <th>市区町村</th><th><span class="label req">必須</span></th>
              <td>
              <input id="city'.$no.'" type="text" name="city'.$no.'" required="" placeholder="千代田区" value="'.$_SESSION['city'.$no].'">
              </td>
              </tr>

              <tr>
              <th>丁目・番地号</th><th><span class="label req">必須</span></th>
              <td>
              <input id="address'.$no.'" type="text" name="address'.$no.'" required="" placeholder="千代田１－１" value="'.$_SESSION['address'.$no].'">
              </td>
              </tr>

              <tr>
              <th>建物名等</th><th></th>
              <td>
              <input id="apart'.$no.'" class="no-required" type="text" name="apart'.$no.'" placeholder="東京ビルディング１０１" value="'.$_SESSION['apart'.$no].'">
              </td>
              </tr>

              <tr>
              <th>携帯電話番号</th><th><span class="label req">必須</span></th>
              <td>
              <input id="mobile'.$no.'" type="tel" name="mobile'.$no.'" required="" placeholder="09011112222" value="'.$_SESSION['mobile'.$no].'">
              </td>
              </tr>

              ';
              
              echo '</table>';
              echo '</figure>';
             }
              ?>
          
          <!--
         <h1 class="mitsumori-ttl" style="margin-top: 80px;">お支払方法の登録</h1>
         <figure>
         <table class="input_table">
          
          <tr>
           <th>お支払方法</th><th><span class="label req">必須</span></th>
           <td>
           <?php
           $sel1 = '';
           $sel2 = '';
           if($_SESSION['shiharai']=='クレジットカード') $sel1 = 'checked';
           if($_SESSION['shiharai']=='銀行振込') $sel2 = 'checked';
           ?>
            <input id="shiharai1" type="radio" name="shiharai" value="クレジットカード" required="" <?php echo $sel1;?>>
            <label for="shiharai1"><span>クレジットカード</span></label><br><br>
            <input id="shiharai2" type="radio" name="shiharai" value="銀行振込" required="" <?php echo $sel2;?>>
            <label for="shiharai2"><span>銀行振込</span></label>
            <p>お申込み完了後、振込先をメールにてご案内します。</p>
           </td>
          </tr>
          </table>
         </figure>
-->
         <input id="shiharai2" type="hidden" name="shiharai" value="銀行振込">
          
         <!-- https://www.sejuku.net/blog/104657 -->
         <div class="popup">
           <div class="content">
            <img src="../../assets/img/card-pop_backpc.png" class="popup_back show_pc hide_sp">
            <img src="../../assets/img/card-pop_backsp.png" class="popup_back show_sp hide_pc">

            <a id="popup_change">
            </a>
            <a id="popup_close">
            </a>
           </div>
         </div>

           <style>
         .show_pc{
          display: block;
         }
         .hide_pc{
          display: none;
         }
         .popup {
           height: 100vh;
           width: 100%;
           background: rgba(0,0,0,0.5);
           position: fixed;
           top: 0;
           left: 0;
           display: flex;
           justify-content: center;
           align-items: center;
           z-index: 100;
         }
         .popup strong{
             font-size: 2em;
             margin: 0 auto;
             display: block;
             width: 13em;
             max-width: 100%;
             line-height: 1.2em;
         }
         .popup strong span{
          display: inline-block;
         }
         .content {
           max-width: 600px;
           opacity: 1;
           color: #000;
           font-size: 14px;
           line-height: 20px;
           text-align: left;
           position: relative;
         }
         .popup_back{
          width: 100%;
         }
         #popup_button{
             margin: 1em auto 0;
             width: 300px;
             max-width: 90%;
         }
         #popup_change,
         #popup_close{
             text-decoration: none;
             display: inline-block;
             text-align: center;
             cursor: pointer;
         }
         #popup_change{
             position: absolute;
             color: #fff;
          bottom: 8%;
          left: 13.5%;
          width: 34%;
          height: 16%;
         }
         #popup_change img,
         #popup_close img{
          width: 100%;
         }
         #popup_close{
             position: absolute;
             color: #fff;
          bottom: 8%;
          right: 11.5%;
          width: 34%;
          height: 16%;
         }
         @media screen and (max-width: 960px) {
         .show_sp{
          display: block;
         }
         .hide_sp{
          display: none !important;
         }
          .content {
           max-width: 400px;
           width: 90%;
          }
          .popup strong{
             width: 8em;
             text-align: center;
          }
          #popup_button{
           max-width: 20em;
          }
          #popup_change{
           width: 39%;
           height: 15%;
           left: 7%;
           bottom: 10%;
          }
          #popup_close{
           bottom: 10%;
           right: 5%;
           width: 40%;
           height: 15%;
          }
         }
         @media screen and (max-width: 400px) {
          #popup_change{
          }
          #popup_close{
          }
          .popup strong{
           font-size: 1.7em;
          }
          #popup_button{
           width: 215px;
          }
         }
           </style>
           <script>
         $(".popup").hide();
         $("#shiharai1 + label").on("click", function() {
         });
         $("#shiharai2 + label").on("click", function() {
           $(".popup").fadeIn();
         });
         $("#popup_close").on("click", function() {
           $(".popup").fadeOut();
         });
         $("#popup_change").on("click", function() {
           $('input[name="shiharai"]:checked').prop('checked', false);
           $('#shiharai1').prop('checked', true);
           $(".popup").fadeOut();
         });
         $('input[name="shiharai"]').click(function(){
         });
           </script>
           <!-- https://www.sejuku.net/blog/104657 -->
          
          
          
          <section class="mitsumori-regulation" id="regulation">
            <h2 class="mitsumori-regulation_ttl">業務委託に関する誓約書</h2>
            <div id="regulation_box" onSelectStart = "return false;" onMouseDown = "return false;" style = "-moz-user-select: none; -khtml-user-select: none; user-select: none;">
              <div class="mitsumori-regulation_box">
                <h4>〈業務委託に関する誓約書〉</h4>
<pre style="white-space: pre-wrap ;">
　このたび、社会保険労務士事務所トータルマネジメント　代表　共田　容脩　に、業務委託するにあたり下記事項を確認し遵守することを誓約いたします。

１．委託する業務の範囲は、別表１のとおりです。
２．本契約の業務委託報酬額は別表１によります。
３．別表１の業務委託報酬額表に定める手続き報酬額の支払いを受託者が確認後、手続きが開始されることを確認しました。
４．受託者の定めた期限を過ぎて手続き報酬額が支払われたときは、手続きが遅延することを理解しました。
５．委託者が必要書類、帳簿等の資料を提示（提供）しない、または提示（提供）する書類に意図的な改ざん等があることが判明したときは、即時に委託が終了となることを確認しました。
６．別表1に含まれない業務の報酬額は、その都度協議して定めます。
７．支払いされた手続き費用は、いかなる理由があっても返金されないことを理解しました。 
８．私は、反社会的勢力(暴力団、暴力団員、暴力団員でなくなった時から5年を経過しない者、暴力団準構成員、暴力団関係企業、総会屋等、社会運動等標ぼうゴロ又は特殊知能暴力集団、その他これらに準ずる者をいう)に属する者ではなく、貴事務所との契約において暴力的な要求行為等を行いません。
９．その他貴事務所に損害を与える行為をしないこと、刑事、民事上の裁判、調停等を申し立てないことをここに誓約いたします。
</pre>
              </div>
            </div>
          </section>

          <p class="mitsumori-txt">下の「申込み」ボタンをクリックすることで、加入者ご本人様が申込み内容及び「業務委託に関する誓約書」を確認し、同意いただいたことといたします。</p>
          
          
          
          <div class="mitsumori-btn_area">
            <input class="mitsumori-submit" type="image" src="../../assets/img/form_check_next.png" id="submit" name="submit" value="申し込む">
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
<?php include("table.js"); ?>
 
 
	$(function(){
  $('#input_sec').show();  

  $ninzu_sel = <?php if(isset($_SESSION['ninzu'])) {echo $_SESSION['ninzu'];} else {echo '1';} ?>;
  for($i=0;$i<=5;$i++){
   if($i <= $ninzu_sel){
    $('#jyugyoin_input'+$i).show();
    $('#jyugyoin_input'+$i).find('input').prop('required', true);
    $('#jyugyoin_input'+$i).find('input.no-required').prop('required', false);
    $('#jyugyoin_input'+$i).find('select.birthday').prop('required', true);
   } else {
    $('#jyugyoin_input'+$i).hide();
    $('#jyugyoin_input'+$i).find('input').prop('required', false);
    $('#jyugyoin_input'+$i).find('select.birthday').prop('required', false);
   }
  }
  
	});
 
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
</script>

  <script>
function check_mynumber(){
	$(".mynumbererr").hide();
 $ret = true;
 
 for($no=1;$no<=<?php echo intval($_SESSION['ninzu']);?>;$no++){
  $mynumber_input = $("#mynumber"+$no).val();
  $("#mynumbererr"+$no).hide();
  if(!Mynumber.isValid($mynumber_input)){
   $("#mynumbererr"+$no).show();
   $("#mynumbererr"+$no).css('color','#ff0000');
   if($ret == true){
    $(window).scrollTop($("#mynumber"+$no).offset().top - 70);
   }
   $ret = false;
  }
 }
 
	return $ret;
}
$(function(){
		$(".mynumbererr").hide();

		$("form").submit(function(){
   if(!check_mynumber()) return false;
   
			return true;
		});
 
	});
   
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
   
  </script>

  
</body>
</html>