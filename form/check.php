<?php
// セッションの開始
ob_start();
session_start();

header("Content-type: text/html;charset=utf-8");
require_once('function.php');

$_SESSION['zip'] = substr($_SESSION['zip'],0,3).'-'.substr($_SESSION['zip'],-4);

include('session_check.php');
?>

<!DOCTYPE html>
<html lang="ja">

<head>
<?php $TOP_PATH = '../../';?>
<?php include_once  $TOP_PATH.'template_php/gtag_head.html'; ?>
 
 
  <title>申込み内容確認：労働保険事務組合RJC　無料見積りフォーム</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="format-detection" content="telephone=no">
 
  <link rel="canonical" href="https://www.xn--4gqprf2ac7ft97aryo6r5b3ov.tokyo/chusho-jigyonushi/form/check.php">
  <meta name="robots" content="all">
  <meta name="copyright" content="Copyright 2020 労働保険事務組合RJC All Rights Reserved.">
  <meta property="og:title" content="申込み内容確認：労働保険事務組合RJC　無料見積りフォーム">
  <meta property="og:type" content="article">
  <meta property="og:url" content="https://www.xn--4gqprf2ac7ft97aryo6r5b3ov.tokyo/chusho-jigyonushi/form/check.php">
  <meta property="og:image" content="https://www.xn--4gqprf2ac7ft97aryo6r5b3ov.tokyo/chusho-jigyonushi/assets/img/h_logo.png">
  <meta property="og:site_name" content="建設業専門　全国対応　中小事業主の特別加入RJC">
  <meta property="og:description" content="" />
  <link rel="apple-touch-icon" sizes="180x180" href="/chusho-jigyonushi/apple-touch-icon-180x180.png">
  <link rel="icon" href="/chusho-jigyonushi/favicon.ico">
 
  <!-- CSS-->
  <link rel="stylesheet" href="../assets/css/reset.css">
  <link rel="stylesheet" href="../assets/css/common.css">
  <link rel="stylesheet" href="../assets/css/style.css">
<!--  <link rel="stylesheet" href="../assets/css/style_form.css">-->
  <link rel="stylesheet" href="style_form_new.css">
  <!-- JS-->
  <script src="../assets/js/app.js"></script>

</head>
<body id="check_php">
<?php include_once  $TOP_PATH.'template_php/gtag_body.html'; ?>
 
 
 <a href="#main">メインコンテンツに移動</a>
	
    <header>
      <div class="header__flex">
				<a href="/chusho-jigyonushi/"><img class="h_logo" src="../assets/img/h_logo.png" width="327" alt="" /></a>
      </div>
     
      <div id="flow_image">
      <img src="../assets/img/form_flow2.png" alt="STEP2 確認画面" class="show_pc hide_sp">
      <img src="../assets/img/form_flow2_sp.png" alt="STEP2 確認画面" class="show_sp hide_pc">
      </div>
    </header>
	
 <!-- 本番環境へ流す -->

<!--<form action="https://webto.salesforce.com/servlet/servlet.WebToCase?encoding=UTF-8" method="POST">-->

 
  <!-- contents ///////////////////////////////////-->
  <main id="main">

    <form name="form" method="post" action="trans.php" enctype="multipart/mitsumori-data">

<input type=hidden name="orgid" value="00D7F0000001NoF">
<input type=hidden id="recordType" name="recordType" value="0127F000001JhhU">
   
      
        <input type="hidden" id="pagename" name="pagename" value = "check.php">
        
<?php /* 20220122 紹介クーポン */ ?>
        <input type="hidden" id="syoukai_kaisya_id" name="syoukai_kaisya_id" value = "<?php echo $_SESSION['syoukai_kaisya_id'];?>">
<?php /* 20220122 紹介クーポン */ ?>
        <input type="hidden" id="i" name="i" value = "<?php echo $_SESSION['i'];?>">
        <input type="hidden" id="type" name="type" value = "<?php echo $_SESSION['type'];?>">
        <input type="hidden" id="jugyouin" name="jugyouin" value = "<?php echo $_SESSION['jugyouin'];?>">
        <input type="hidden" id="jugyouinninzu" name="jugyouinninzu" value = "<?php echo $_SESSION['jugyouinninzu'];?>">
        <input type="hidden" id="nitigaku" name="nitigaku" value = "<?php echo $_SESSION['nitigaku'];?>">
        <input type="hidden" id="shiharai_kaisu" name="shiharai_kaisu" value = "<?php echo $_SESSION['shiharai_kaisu'];?>">
        
        <input type="hidden" id="kikan" name="kikan" value = "<?php echo $_SESSION['kikan'];?>">
        <input type="hidden" id="jigyou" name="jigyou" value = "<?php echo $_SESSION['jigyou'];?>">
        <input type="hidden" id="ninzu" name="ninzu" value = "<?php echo $_SESSION['ninzu'];?>">
        <input type="hidden" id="shiharai" name="shiharai" value = "<?php echo $_SESSION['shiharai'];?>">
        <input type="hidden" id="sougaku" name="sougaku" value = "<?php echo $_SESSION['sougaku'];?>">
        <input type="hidden" id="kaihi" name="kaihi" value = "<?php echo $_SESSION['kaihi'];?>">
        <input type="hidden" name="jimuGyousyuBangou__c" value="<?php echo $_SESSION['jimuGyousyuBangou__c'];?>">
        
        
        <input type="hidden" id="kaisyamei" name="kaisyamei" value = "<?php echo $_SESSION['kaisyamei'];?>">
        <input type="hidden" id="kaisyamei_furi" name="kaisyamei_furi" value = "<?php echo $_SESSION['kaisyamei_furi'];?>">
        <input type="hidden" id="daihyosyamei" name="daihyosyamei" value = "<?php echo $_SESSION['daihyosyamei'];?>">
        <input type="hidden" id="daihyosyamei_furi" name="daihyosyamei_furi" value = "<?php echo $_SESSION['daihyosyamei_furi'];?>">
        <input type="hidden" id="daihyosyayakusyoku" name="daihyosyayakusyoku" value = "<?php echo $_SESSION['daihyosyayakusyoku'];?>">
       
        <input type="hidden" id="tantousyamei" name="tantousyamei" value = "<?php echo $_SESSION['tantousyamei'];?>">
        <input type="hidden" id="tantousyamei_furi" name="tantousyamei_furi" value = "<?php echo $_SESSION['tantousyamei_furi'];?>">
        <input type="hidden" id="tantousyayakusyoku" name="tantousyayakusyoku" value = "<?php echo $_SESSION['tantousyayakusyoku'];?>">
     
        <input type="hidden" id="zip" name="zip" value = "<?php echo $_SESSION['zip'];?>">
        <input type="hidden" id="pref" name="pref" value = "<?php echo $_SESSION['pref'];?>">
        <input type="hidden" id="city" name="city" value = "<?php echo $_SESSION['city'];?>">
        <input type="hidden" id="address" name="address" value = "<?php echo $_SESSION['address'];?>">
        <input type="hidden" id="address2" name="address2" value = "<?php echo $_SESSION['address2'];?>">
        <input type="hidden" id="apart" name="apart" value = "">
        
        <input type="hidden" id="denwabangou" name="denwabangou" value = "<?php echo $_SESSION['denwabangou'];?>">
        <input type="hidden" id="faxbangou" name="faxbangou" value = "<?php echo $_SESSION['faxbangou'];?>">
        <input type="hidden" id="mail" name="mail" value = "<?php echo $_SESSION['mail'];?>">
        <input type="hidden" id="daihyomobile" name="daihyomobile" value = "<?php echo $_SESSION['daihyomobile'];?>">
        <input type="hidden" id="tantoumobile" name="tantoumobile" value = "<?php echo $_SESSION['tantoumobile'];?>">

        <input type="hidden" id="kanyusyamei1" name="kanyusyamei1" value = "<?php if($_SESSION['ninzu'] >= 1) echo $_SESSION['kanyusyamei1'];?>">
        <input type="hidden" id="kanyusyamei_furi1" name="kanyusyamei_furi1" value = "<?php if($_SESSION['ninzu'] >= 1) echo $_SESSION['kanyusyamei_furi1'];?>">
        <input type="hidden" id="wareki1" name="wareki1" value = "<?php if($_SESSION['ninzu'] >= 1) echo $_SESSION['wareki1'];?>">
        <input type="hidden" id="birthdayw1" name="birthdayw1" value = "<?php if($_SESSION['ninzu'] >= 1) echo format_wareki_birth($_SESSION['birthday_y1'],$_SESSION['birthday_m1'],$_SESSION['birthday_d1']);?>">
        <input type="hidden" id="funjin1" name="funjin1" value = "<?php if($_SESSION['ninzu'] >= 1) echo $_SESSION['funjin1'];?>">
        <input type="hidden" id="funjin_naiyou1" name="funjin_naiyou1" value = "<?php if($_SESSION['ninzu'] >= 1) echo $_SESSION['funjin_naiyou1'];?>">
        <input type="hidden" id="shindou1" name="shindou1" value = "<?php if($_SESSION['ninzu'] >= 1) echo $_SESSION['shindou1'];?>">
        <input type="hidden" id="shindou_naiyou1" name="shindou_naiyou1" value = "<?php if($_SESSION['ninzu'] >= 1) echo $_SESSION['shindou_naiyou1'];?>">
        <input type="hidden" id="namari1" name="namari1" value = "<?php if($_SESSION['ninzu'] >= 1) echo $_SESSION['namari1'];?>">
        <input type="hidden" id="namari_naiyou1" name="namari_naiyou1" value = "<?php if($_SESSION['ninzu'] >= 1) echo $_SESSION['namari_naiyou1'];?>">
        <input type="hidden" id="youzai1" name="youzai1" value = "<?php if($_SESSION['ninzu'] >= 1) echo $_SESSION['youzai1'];?>">
        <input type="hidden" id="youzai_naiyou1" name="youzai_naiyou1" value = "<?php if($_SESSION['ninzu'] >= 1) echo $_SESSION['youzai_naiyou1'];?>">
        <input type="hidden" id="jimuKanyuOyakatadantai1" name="jimuKanyuOyakatadantai1" value = "<?php if($_SESSION['ninzu'] >= 1) echo $_SESSION['jimuKanyuOyakatadantai1'];?>">
        <input type="hidden" id="denwabangou1" name="denwabangou1" value = "<?php if($_SESSION['ninzu'] >= 1) echo $_SESSION['denwabangou1'];?>">

        <input type="hidden" id="kanyusyamei2" name="kanyusyamei2" value = "<?php if($_SESSION['ninzu'] >= 2) echo $_SESSION['kanyusyamei2'];?>">
        <input type="hidden" id="kanyusyamei_furi2" name="kanyusyamei_furi2" value = "<?php if($_SESSION['ninzu'] >= 2) echo $_SESSION['kanyusyamei_furi2'];?>">
        <input type="hidden" id="birthdayw2" name="birthdayw2" value = "<?php if($_SESSION['ninzu'] >= 2) echo format_wareki_birth($_SESSION['birthday_y2'],$_SESSION['birthday_m2'],$_SESSION['birthday_d2']);?>">
        <input type="hidden" id="funjin2" name="funjin2" value = "<?php if($_SESSION['ninzu'] >= 2) echo $_SESSION['funjin2'];?>">
        <input type="hidden" id="funjin_naiyou2" name="funjin_naiyou2" value = "<?php if($_SESSION['ninzu'] >= 2) echo $_SESSION['funjin_naiyou2'];?>">
        <input type="hidden" id="shindou2" name="shindou2" value = "<?php if($_SESSION['ninzu'] >= 2) echo $_SESSION['shindou2'];?>">
        <input type="hidden" id="shindou_naiyou2" name="shindou_naiyou2" value = "<?php if($_SESSION['ninzu'] >= 2) echo $_SESSION['shindou_naiyou2'];?>">
        <input type="hidden" id="namari2" name="namari2" value = "<?php if($_SESSION['ninzu'] >= 2) echo $_SESSION['namari2'];?>">
        <input type="hidden" id="namari_naiyou2" name="namari_naiyou2" value = "<?php if($_SESSION['ninzu'] >= 2) echo $_SESSION['namari_naiyou2'];?>">
        <input type="hidden" id="youzai2" name="youzai2" value = "<?php if($_SESSION['ninzu'] >= 2) echo $_SESSION['youzai2'];?>">
        <input type="hidden" id="youzai_naiyou2" name="youzai_naiyou2" value = "<?php if($_SESSION['ninzu'] >= 2) echo $_SESSION['youzai_naiyou2'];?>">
        <input type="hidden" id="jimuKanyuOyakatadantai2" name="jimuKanyuOyakatadantai2" value = "<?php if($_SESSION['ninzu'] >= 2) echo $_SESSION['jimuKanyuOyakatadantai2'];?>">
        <input type="hidden" id="denwabangou2" name="denwabangou2" value = "<?php if($_SESSION['ninzu'] >= 2) echo $_SESSION['denwabangou2'];?>">

        <input type="hidden" id="kanyusyamei3" name="kanyusyamei3" value = "<?php if($_SESSION['ninzu'] >= 3) echo $_SESSION['kanyusyamei3'];?>">
        <input type="hidden" id="kanyusyamei_furi3" name="kanyusyamei_furi3" value = "<?php if($_SESSION['ninzu'] >= 3) echo $_SESSION['kanyusyamei_furi3'];?>">
        <input type="hidden" id="birthdayw3" name="birthdayw3" value = "<?php if($_SESSION['ninzu'] >= 3) echo format_wareki_birth($_SESSION['birthday_y3'],$_SESSION['birthday_m3'],$_SESSION['birthday_d3']);?>">
        <input type="hidden" id="funjin3" name="funjin3" value = "<?php if($_SESSION['ninzu'] >= 3) echo $_SESSION['funjin3'];?>">
        <input type="hidden" id="funjin_naiyou3" name="funjin_naiyou3" value = "<?php if($_SESSION['ninzu'] >= 3) echo $_SESSION['funjin_naiyou3'];?>">
        <input type="hidden" id="shindou3" name="shindou3" value = "<?php if($_SESSION['ninzu'] >= 3) echo $_SESSION['shindou3'];?>">
        <input type="hidden" id="shindou_naiyou3" name="shindou_naiyou3" value = "<?php if($_SESSION['ninzu'] >= 3) echo $_SESSION['shindou_naiyou3'];?>">
        <input type="hidden" id="namari3" name="namari3" value = "<?php if($_SESSION['ninzu'] >= 3) echo $_SESSION['namari3'];?>">
        <input type="hidden" id="namari_naiyou3" name="namari_naiyou3" value = "<?php if($_SESSION['ninzu'] >= 3) echo $_SESSION['namari_naiyou3'];?>">
        <input type="hidden" id="youzai3" name="youzai3" value = "<?php if($_SESSION['ninzu'] >= 3) echo $_SESSION['youzai3'];?>">
        <input type="hidden" id="youzai_naiyou3" name="youzai_naiyou3" value = "<?php if($_SESSION['ninzu'] >= 3) echo $_SESSION['youzai_naiyou3'];?>">
        <input type="hidden" id="jimuKanyuOyakatadantai3" name="jimuKanyuOyakatadantai3" value = "<?php if($_SESSION['ninzu'] >= 3) echo $_SESSION['jimuKanyuOyakatadantai3'];?>">
        <input type="hidden" id="denwabangou3" name="denwabangou3" value = "<?php if($_SESSION['ninzu'] >= 3) echo $_SESSION['denwabangou3'];?>">
        
        <input type="hidden" id="kanyusyamei4" name="kanyusyamei4" value = "<?php if($_SESSION['ninzu'] >= 4) echo $_SESSION['kanyusyamei4'];?>">
        <input type="hidden" id="kanyusyamei_furi4" name="kanyusyamei_furi4" value = "<?php if($_SESSION['ninzu'] >= 4) echo $_SESSION['kanyusyamei_furi4'];?>">
        <input type="hidden" id="birthdayw4" name="birthdayw4" value = "<?php if($_SESSION['ninzu'] >= 4) echo format_wareki_birth($_SESSION['birthday_y4'],$_SESSION['birthday_m4'],$_SESSION['birthday_d4']);?>">
        <input type="hidden" id="funjin4" name="funjin4" value = "<?php if($_SESSION['ninzu'] >= 4) echo $_SESSION['funjin4'];?>">
        <input type="hidden" id="funjin_naiyou4" name="funjin_naiyou4" value = "<?php if($_SESSION['ninzu'] >= 4) echo $_SESSION['funjin_naiyou4'];?>">
        <input type="hidden" id="shindou4" name="shindou4" value = "<?php if($_SESSION['ninzu'] >= 4) echo $_SESSION['shindou4'];?>">
        <input type="hidden" id="shindou_naiyou4" name="shindou_naiyou4" value = "<?php if($_SESSION['ninzu'] >= 4) echo $_SESSION['shindou_naiyou4'];?>">
        <input type="hidden" id="namari4" name="namari4" value = "<?php if($_SESSION['ninzu'] >= 4) echo $_SESSION['namari4'];?>">
        <input type="hidden" id="namari_naiyou4" name="namari_naiyou4" value = "<?php if($_SESSION['ninzu'] >= 4) echo $_SESSION['namari_naiyou4'];?>">
        <input type="hidden" id="youzai4" name="youzai4" value = "<?php if($_SESSION['ninzu'] >= 4) echo $_SESSION['youzai4'];?>">
        <input type="hidden" id="youzai_naiyou4" name="youzai_naiyou4" value = "<?php if($_SESSION['ninzu'] >= 4) echo $_SESSION['youzai_naiyou4'];?>">
        <input type="hidden" id="jimuKanyuOyakatadantai4" name="jimuKanyuOyakatadantai4" value = "<?php if($_SESSION['ninzu'] >= 4) echo $_SESSION['jimuKanyuOyakatadantai4'];?>">
        <input type="hidden" id="denwabangou4" name="denwabangou4" value = "<?php if($_SESSION['ninzu'] >= 4) echo $_SESSION['denwabangou4'];?>">
        
        <input type="hidden" id="kanyusyamei5" name="kanyusyamei5" value = "<?php if($_SESSION['ninzu'] >= 5) echo $_SESSION['kanyusyamei5'];?>">
        <input type="hidden" id="kanyusyamei_furi5" name="kanyusyamei_furi5" value = "<?php if($_SESSION['ninzu'] >= 5) echo $_SESSION['kanyusyamei_furi5'];?>">
        <input type="hidden" id="birthdayw5" name="birthdayw5" value = "<?php if($_SESSION['ninzu'] >= 5) echo format_wareki_birth($_SESSION['birthday_y5'],$_SESSION['birthday_m5'],$_SESSION['birthday_d5']);?>">
        <input type="hidden" id="funjin5" name="funjin5" value = "<?php if($_SESSION['ninzu'] >= 5) echo $_SESSION['funjin5'];?>">
        <input type="hidden" id="funjin_naiyou5" name="funjin_naiyou5" value = "<?php if($_SESSION['ninzu'] >= 5) echo $_SESSION['funjin_naiyou5'];?>">
        <input type="hidden" id="shindou5" name="shindou5" value = "<?php if($_SESSION['ninzu'] >= 5) echo $_SESSION['shindou5'];?>">
        <input type="hidden" id="shindou_naiyou5" name="shindou_naiyou5" value = "<?php if($_SESSION['ninzu'] >= 5) echo $_SESSION['shindou_naiyou5'];?>">
        <input type="hidden" id="namari5" name="namari5" value = "<?php if($_SESSION['ninzu'] >= 5) echo $_SESSION['namari5'];?>">
        <input type="hidden" id="namari_naiyou5" name="namari_naiyou5" value = "<?php if($_SESSION['ninzu'] >= 5) echo $_SESSION['namari_naiyou5'];?>">
        <input type="hidden" id="youzai5" name="youzai5" value = "<?php if($_SESSION['ninzu'] >= 5) echo $_SESSION['youzai5'];?>">
        <input type="hidden" id="youzai_naiyou5" name="youzai_naiyou5" value = "<?php if($_SESSION['ninzu'] >= 5) echo $_SESSION['youzai_naiyou5'];?>">
        <input type="hidden" id="jimuKanyuOyakatadantai5" name="jimuKanyuOyakatadantai5" value = "<?php if($_SESSION['ninzu'] >= 5) echo $_SESSION['jimuKanyuOyakatadantai5'];?>">
        <input type="hidden" id="denwabangou5" name="denwabangou5" value = "<?php if($_SESSION['ninzu'] >= 5) echo $_SESSION['denwabangou5'];?>">
            
        <?php /* 20230206 給与支払日項目追加 */ ?>
        <input type="hidden" id="shimebi" name="shimebi" value = "<?php echo $_SESSION['shimebi'];?>">
        <input type="hidden" id="shiharaibi_month" name="shiharaibi_month" value = "<?php echo $_SESSION['shiharaibi_month'];?>">
        <input type="hidden" id="shiharaibi" name="shiharaibi" value = "<?php echo $_SESSION['shiharaibi'];?>">
        <?php /* 20230206 給与支払日項目追加 */ ?>

        <h1 class="mitsumori-ttl">お申込み内容のご確認</h1>
        <section class="mitsumori">
          <div class="mitsumori-inner">

           <figure>
           <figcaption>会社情報</figcaption>
           <table class="input_table">

            <tr>
             <th colspan="2">会社名・屋号</th>
             <td>
              <?php echo $_SESSION['kaisyamei_furi'];?><br>
              <?php echo $_SESSION['kaisyamei'];?>
             </td>
            </tr>
            
            <?php /* 20230206 給与支払日項目追加 */ ?>
            <tr>
             <th colspan="2">給与支払い</th>
             <td>
              <?php echo $_SESSION['shimebi'];?>締め  <?php echo $_SESSION['shiharaibi_month'];?><?php echo $_SESSION['shiharaibi'];?>払い
             </td>
            </tr>
            <?php /* 20230206 給与支払日項目追加 */ ?>
            
            <tr>
             <th colspan="2">住所</th>
             <td>
              <?php echo $_SESSION['zip'];?><br>
              <?php echo $_SESSION['pref'].$_SESSION['city'].$_SESSION['address'].$_SESSION['address2'].$_SESSION['apart'];?>
             </td>
            </tr>
            
            <tr>
             <th colspan="2">電話番号</th>
             <td>
              <?php echo $_SESSION['denwabangou'];?>
             </td>
            </tr>
            
            <tr>
             <th colspan="2">FAX番号</th>
             <td>
              <?php echo $_SESSION['faxbangou'];?>
             </td>
            </tr>
            
            <tr>
             <th colspan="2">メールアドレス</th>
             <td>
              <?php echo $_SESSION['mail'];?>
             </td>
            </tr>
            
            <tr>
             <th colspan="2">代表者</th>
             <td>
              <?php echo $_SESSION['daihyosyayakusyoku'];?><br>
              <?php echo $_SESSION['daihyosyamei_furi'];?><br>
              <?php echo $_SESSION['daihyosyamei'];?>
             </td>
            </tr>
            
            <tr>
             <th colspan="2">担当者</th>
             <td>
              <?php echo $_SESSION['tantousyamei_furi'];?><br>
              <?php echo $_SESSION['tantousyamei'];?>
             </td>
            </tr>
            
            <tr>
             <th colspan="2">担当者につながる携帯番号</th>
             <td>
              <?php echo $_SESSION['tantoumobile'];?>
             </td>
            </tr>
            
           </table>
           </figure>
          
            <?php 
            $s1 = '';
            $s2 = '';
            $s3 = '';
            if($_SESSION['type']=='個人'){
             $s1 = ' style="display: none;" ';
            } else {
             $s2 = ' style="display: none;" ';             
            }
            if(intval($_SESSION['kikane'])!=0){
             $s3 = ' style="display: none;" ';
            } else {
            }
            ?>
           <figure <?php echo $s2;?>>
           <figcaption>添付書類</figcaption>
           <table class="input_table">
            <!--
            <tr <?php echo $s1;?>>
             <th colspan="2">会社の履歴事項全部証明書</th>
             <td>
              <?php
              echo $_SESSION['file_rirekisyo1'];
              for($i=2;$i<=$_SESSION['f_num'];$i++){
               echo '<br>'.$_SESSION['file_rirekisyo'.$i];
              }
              ?>
             </td>
            </tr>
-->
            <tr <?php echo $s2;?>>
             <th colspan="2">直近の確定申告書B または 開業届</th>
             <td>
              <?php echo $_SESSION['file_kakutei'];?>
             </td>
            </tr>
            <!--
            <tr <?php echo $s3;?>>
             <th colspan="2">口座振替予定の銀行通帳（表紙）</th>
             <td>
              <?php echo $_SESSION['file_tutyo_omote'];?>
             </td>
            </tr>
            <tr <?php echo $s3;?>>
             <th colspan="2">口座振替予定の銀行通帳<br>（支店名記載のあるページ）</th>
             <td>
              <?php echo $_SESSION['file_tutyo_ura'];?>
             </td>
            </tr>
-->
           </table>
           </figure>
           
           <figure>
           <figcaption>特別加入者情報</figcaption>
           <table class="input_table">

            <?php
            for($i=1;$i<=$_SESSION['ninzu'];$i++){
             $rows = 6;
             if($_SESSION['funjin'.$i] == 'はい'){
             $rows++;
             }
             if($_SESSION['shindou'.$i] == 'はい'){
             $rows++;
             }
             if($_SESSION['namari'.$i] == 'はい'){
             $rows++;
             }
             if($_SESSION['youzai'.$i] == 'はい'){
             $rows++;
             }
             echo'
             <tr>
              <th rowspan="'.$rows.'">'.$i.'人目の特別加入者</th><th>氏名</th>
              <td>
              '.$_SESSION['kanyusyamei_furi'.$i].'<br>
              '.$_SESSION['kanyusyamei'.$i].'
              </td>
             </tr>

             <tr>
              <th>生年月日</th>
              <td>
             '.format_wareki_birth($_SESSION['birthday_y'.$i],$_SESSION['birthday_m'.$i],$_SESSION['birthday_d'.$i]).'
              </td>
             </tr>
             ';
             
             echo'
             <tr>
              <th>携帯電話番号</th>
              <td>
             '.$_SESSION['denwabangou'.$i].'
              </td>
             </tr>
             ';
             
             if($_SESSION['funjin'.$i] == 'はい'){
              echo '
            <tr>
              <th>粉じん作業内容</dt>
              <td>'.$_SESSION['funjin_naiyou'.$i].'</td>
            </tr>';
             }
             if($_SESSION['shindou'.$i] == 'はい'){
              echo '
            <tr>
              <th>使用振動工具</th>
              <td>'.$_SESSION['shindou_naiyou'.$i].'</td>
            </tr>';
             }
             if($_SESSION['namari'.$i] == 'はい'){
              echo '
            <tr>
              <th>鉛作業内容</th>
              <td>'.$_SESSION['namari_naiyou'.$i].'</td>
            </tr>';
             }
             if($_SESSION['youzai'.$i] == 'はい'){
              echo '
            <tr>
              <th>使用有機溶剤</th>
              <td>'.$_SESSION['youzai_naiyou'.$i].'</td>
            </tr>';
             }
            echo '
            <tr>
             <th>運転免許証（表）</th>
             <td>
              '.$_SESSION['file_menkyo_omote_'.$i].'
             </td>
            </tr>
            <tr>
             <th>運転免許証（裏）</th>
             <td>
              '.$_SESSION['file_menkyo_ura_'.$i].'
             </td>
            </tr>
            ';
            echo '
            <tr>
             <th>今入っている一人親方組合はどこですか？
</th>
             <td>
              '.$_SESSION['jimuKanyuOyakatadantai'.$i].'
             </td>
            </tr>
            ';
            }
            ?>
            
           </table>
           </figure>
           
           <figure>
           <figcaption>申込内容</figcaption>
           <table class="input_table">

            <tr>
             <th colspan="2">加入希望月</th>
             <td>
              <?php echo $_SESSION['kikan'];?> 月
             </td>
            </tr>
            
            <tr>
             <th colspan="2">事業の種類</th>
             <td>
              <?php echo $_SESSION['jigyou'];?>
             </td>
            </tr>
            
            <tr>
             <th colspan="2">給付基礎日額</th>
             <td>
              <?php echo number_format($_SESSION['nitigaku']);?> 円
             </td>
            </tr>
            
            <tr>
             <th colspan="2">お支払総額</th>
             <td>
              <?php echo $_SESSION['sougaku']; ?> 円
             </td>
            </tr>
            
           </table>
           </figure>
           
           <figure id="kikan_alert" <?php if($_SESSION['shiharai_kaisu'] == '毎月払い'){echo ' style="display: none;" ';}?>>
            <?php
             $this_month = date('m');
             if(intval($_SESSION['kikan']) == intval($this_month)){
              $start = '加入承認日';              
             } else {
              $start = $_SESSION['kikan'].'月1日（予定）';
             }
//             $end = date('Y年3月31日', strtotime('+1 year'));
             if(intval($_SESSION['kikane']) > 0){
              $kikane_y = intval(substr($_SESSION['kikane'],0,4));
              $kikane_m = intval(substr($_SESSION['kikane'],4));
              $end = $kikane_y.'年'.$kikane_m.'月末日';
             } else { 
              if(intval($_SESSION['kikan']) >= intval($this_month)){
               $end = date('Y年3月末日', strtotime('+1 year'));
              } else {
               $end = date('Y年3月末日', strtotime('+2 year'));               
              }
             }
            ?>
            <div>
             <p>あなたの加入期間は</p>
             <p id="kikan_disp"><span><span style="display: inline-block; font-size: 1em;"><?php echo $start;?></span>　～　<span style="display: inline-block; font-size: 1em;"><?php echo $end;?></span></span>　までです</p>
            </div>
           </figure>
           
           <figure>
           <figcaption>お支払方法</figcaption>
           <table class="input_table">

            <tr>
             <th colspan="2">お支払方法</th>
             <td>
              <?php echo $_SESSION['shiharai']; ?>
             </td>
            </tr>
            
            <!--
            <tr>
             <th colspan="2">支払種別</th>
             <td>
              <?php echo $_SESSION['shiharai_kaisu']; ?>
             </td>
            </tr>
            -->
           </table>
           </figure>

           <!--
            <dl class="mitsumori-form_item -confirm">
              <dt>家族以外の従業員はいますか？</dt>
              <dd><?php echo $_SESSION['jugyouin'];?></dd>
            </dl>
            <dl class="mitsumori-form_item -confirm">
              <dt>個人ですか？法人ですか？</dt>
              <dd><?php echo $_SESSION['type'];?></dd>
            </dl>
            <dl class="mitsumori-form_item -confirm">
              <dt>特別加入する人数</dt>
              <dd><?php echo $_SESSION['ninzu'];?> 人</dd>
            </dl>
            <dl class="mitsumori-form_item -confirm">
              <dt>従業員数</dt>
              <dd><?php echo $_SESSION['jugyouinninzu'];?> 人</dd>
            </dl>
            -->
           

           
           <?php /************************************/ ?>
           <?php /* 20211122 Y.Horino アンケート入力 */ ?>
           <!--
           <section id="q_form">
            <h2>アンケート回答後、次へお進みください</h2>
            
            <div id="q_form_body">
             
            <div class="q_form_item">
             <h3>Q1 RJCについてお聞きします<span class="required_text"> ※ 必須</span></h3>
             
             <?php /* https://kodocode.net/design-css-rating/ */ ?>
             <div class="q_form_item_a star">
              <input type="radio" name="RJC_hayasa__c" id="star1-null" value="" required />
              <input type="radio" name="RJC_hayasa__c" id="star1-1" value="不満" required />
              <input type="radio" name="RJC_hayasa__c" id="star1-2" value="やや不満" required />
              <input type="radio" name="RJC_hayasa__c" id="star1-3" value="やや満足" required />
              <input type="radio" name="RJC_hayasa__c" id="star1-4" value="紹介したい" required />

              <input type="radio" name="RJC_kantan__c" id="star2-null" value="" required />
              <input type="radio" name="RJC_kantan__c" id="star2-1" value="不満" required />
              <input type="radio" name="RJC_kantan__c" id="star2-2" value="やや不満" required />
              <input type="radio" name="RJC_kantan__c" id="star2-3" value="やや満足" required />
              <input type="radio" name="RJC_kantan__c" id="star2-4" value="紹介したい" required />

              <input type="radio" name="RJC_anshin__c" id="star3-null" value="" required />
              <input type="radio" name="RJC_anshin__c" id="star3-1" value="不満" required />
              <input type="radio" name="RJC_anshin__c" id="star3-2" value="やや不満" required />
              <input type="radio" name="RJC_anshin__c" id="star3-3" value="やや満足" required />
              <input type="radio" name="RJC_anshin__c" id="star3-4" value="紹介したい" required />

               <table id="sec">
                <tr><th></th><th>不満</th><th>やや不満</th><th>やや満足</th><th>紹介したい</th></tr>

                <tr><th>早さ</th>
                 <td>
                  <label for="star1-1">
                   <svg width="255" height="240" viewBox="0 0 51 48">
                     <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z">
                   </svg>
                  </label>
                 </td>
                 <td>
                  <label for="star1-2">
                    <svg width="255" height="240" viewBox="0 0 51 48">
                      <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z">
                    </svg>
                  </label>
                 </td>
                 <td>
                  <label for="star1-3">
                    <svg width="255" height="240" viewBox="0 0 51 48">
                      <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z">
                    </svg>
                  </label>
                 </td>
                 <td>
                  <label for="star1-4">
                    <svg width="255" height="240" viewBox="0 0 51 48">
                      <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z">
                    </svg>
                  </label>
                 </td>
                </tr>

                <tr><th>かんたん</th>
                 <td>
                  <label for="star2-1">
                   <svg width="255" height="240" viewBox="0 0 51 48">
                     <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z">
                   </svg>
                  </label>
                 </td>
                 <td>
                  <label for="star2-2">
                    <svg width="255" height="240" viewBox="0 0 51 48">
                      <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z">
                    </svg>
                  </label>
                 </td>
                 <td>
                  <label for="star2-3">
                    <svg width="255" height="240" viewBox="0 0 51 48">
                      <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z">
                    </svg>
                  </label>
                 </td>
                 <td>
                  <label for="star2-4">
                    <svg width="255" height="240" viewBox="0 0 51 48">
                      <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z">
                    </svg>
                  </label>
                 </td>
                </tr>

                <tr><th>安心</th>
                 <td>
                  <label for="star3-1">
                   <svg width="255" height="240" viewBox="0 0 51 48">
                     <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z">
                   </svg>
                  </label>
                 </td>
                 <td>
                  <label for="star3-2">
                    <svg width="255" height="240" viewBox="0 0 51 48">
                      <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z">
                    </svg>
                  </label>
                 </td>
                 <td>
                  <label for="star3-3">
                    <svg width="255" height="240" viewBox="0 0 51 48">
                      <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z">
                    </svg>
                  </label>
                 </td>
                 <td>
                  <label for="star3-4">
                    <svg width="255" height="240" viewBox="0 0 51 48">
                      <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z">
                    </svg>
                  </label>
                 </td>
                </tr>

               </table>
              </div>
             
            </div>
            
            <div class="q_form_item">
             <h3>Q2 RJCをどのようにして知りましたか？<span class="required_text"> ※ 必須</span></h3>
             
             <div class="q_form_item_a">
              <p class="radio_p"><input type="radio" name="RJC_from__c" id="find_1" value="Yahoo" required><label for="find_1">Yahoo</label></p>
              <p class="radio_p"><input type="radio" name="RJC_from__c" id="find_2" value="Google" required><label for="find_2">Google</label></p>
              <p class="radio_p"><input type="radio" name="RJC_from__c" id="find_3" value="知人の紹介" required><label for="find_3">知人の紹介</label></p>
              <p class="radio_p"><input type="radio" name="RJC_from__c" id="find_4" value="一人親方労災保険RJCに加入していた" required><label for="find_4">一人親方労災保険RJCに加入していた</label></p>
              <p class="radio_p"><input type="radio" name="RJC_from__c" id="find_5" value="チラシ" required><label for="find_5">チラシ</label></p>
              <p class="radio_p"><input type="radio" name="RJC_from__c" id="find_other" value="その他" required><label for="find_other">その他</label></p>
              <textarea name="RJC_from_sonota__c" id="RJC_from_sonota__c" class="textarea_sonota"></textarea>
             </div>
            </div>
             
            <div class="q_form_item">
             <h3>Q3 なぜRJCを選びましたか？<span class="required_text"> ※ 必須</span></h3>
             
             <div class="q_form_item_a">
              <p class="radio_p"><input type="radio" name="RJC_why__c" id="select_1" value="会員カードが即日発行だから" required><label for="select_1">会員カードが即日発行だから</label></p>
              <p class="radio_p"><input type="radio" name="RJC_why__c" id="select_2" value="申込みが簡単だから" required><label for="select_2">申込みが簡単だから</label></p>
              <p class="radio_p"><input type="radio" name="RJC_why__c" id="select_3" value="金額が安いから" required><label for="select_3">金額が安いから</label></p>
              <p class="radio_p"><input type="radio" name="RJC_why__c" id="select_other" value="その他" required><label for="select_other">その他</label></p>
              <textarea name="RJC_why_sonota__c" id="RJC_why_sonota__c" class="textarea_sonota"></textarea>
             </div>
            </div>
             
            <div class="q_form_item">
             <h3>Q4 なぜ特別加入が必要になりましたか？<span class="required_text"> ※ 必須</span></h3>
             
             <div class="q_form_item_a">
              <p class="radio_p"><input type="radio" name="tokubetsukanyu_why__c" id="need_1" value="現場で必要と言われたから" required><label for="need_1">現場で必要と言われたから</label></p>
              <p class="radio_p"><input type="radio" name="tokubetsukanyu_why__c" id="need_2" value="初めて従業員を雇ったから" required><label for="need_2">初めて従業員を雇ったから</label></p>
              <p class="radio_p"><input type="radio" name="tokubetsukanyu_why__c" id="need_3" value="本当はずっと前から従業員を雇っているから" required><label for="need_3">本当はずっと前から従業員を雇っているから</label></p>
              <p class="radio_p"><input type="radio" name="tokubetsukanyu_why__c" id="need_other" value="その他"><label for="need_other" required>その他</label></p>
              <textarea name="tokubetsukanyu_why_sonota__c" id="tokubetsukanyu_why_sonota__c" class="textarea_sonota"></textarea>
             </div>
            </div>
             
            <div class="q_form_item">
             <h3>Q5 建設業許可を持っていますか？<span class="required_text"> ※ 必須</span></h3>
             
             <div class="q_form_item_a">
              <p class="radio_p"><input type="radio" name="have_kyoka__c" id="kyoka_y" value="はい" required><label for="kyoka_y">はい</label></p>
              <p class="radio_p"><input type="radio" name="have_kyoka__c" id="kyoka_n" value="いいえ" required><label for="kyoka_n">いいえ</label></p>
             </div>
            </div>
             
            <div class="q_form_item">
             <h3>Q6 従業員は何人いますか？<span class="required_text"> ※ 必須</span></h3>
             
             <div class="q_form_item_a">
              <p class="radio_p"><input type="radio" name="jyugyouin_ninzu__c" id="jyugyouin_1" value="１人" required><label for="jyugyouin_1">１人</label></p>
              <p class="radio_p"><input type="radio" name="jyugyouin_ninzu__c" id="jyugyouin_2" value="２人" required><label for="jyugyouin_2">２人</label></p>
              <p class="radio_p"><input type="radio" name="jyugyouin_ninzu__c" id="jyugyouin_3" value="３人以上" required><label for="jyugyouin_3">３人以上</label></p>
             </div>
            </div>
             
            <div class="q_form_item">
             <h3>Q7 雇用保険に入っていますか？<span class="required_text"> ※ 必須</span></h3>
             
             <div class="q_form_item_a">
              <p class="radio_p"><input type="radio" name="join_koyouhoken__c" id="koyou_y" value="はい" required><label for="koyou_y">はい</label></p>
              <p class="radio_p"><input type="radio" name="join_koyouhoken__c" id="koyou_n" value="いいえ" required><label for="koyou_n">いいえ</label></p>
             </div>
            </div>
             
            </div>
            
           </section>
           <script>
            $(function(){
             $('.textarea_sonota').hide();
             $('input[name="RJC_from__c"]').click(function(){
              if($('input[name="RJC_from__c"]:checked').val() == 'その他'){
               $('#RJC_from_sonota__c').show();
               $('#RJC_from_sonota__c').attr("required", "required");
              } else {
               $('#RJC_from_sonota__c').hide();               
               $('#RJC_from_sonota__c').val("");
               $('#RJC_from_sonota__c').removeAttr("required");
              }
             });
             $('input[name="RJC_why__c"]').click(function(){
              if($('input[name="RJC_why__c"]:checked').val() == 'その他'){
               $('#RJC_why_sonota__c').show();
               $('#RJC_why_sonota__c').attr("required", "required");
              } else {
               $('#RJC_why_sonota__c').hide();               
               $('#RJC_why_sonota__c').val("");
               $('#RJC_why_sonota__c').removeAttr("required");
              }
             });
             $('input[name="tokubetsukanyu_why__c"]').click(function(){
              if($('input[name="tokubetsukanyu_why__c"]:checked').val() == 'その他'){
               $('#tokubetsukanyu_why_sonota__c').show();
               $('#tokubetsukanyu_why_sonota__c').attr("required", "required");
              } else {
               $('#tokubetsukanyu_why_sonota__c').hide();               
               $('#tokubetsukanyu_why_sonota__c').val("");
               $('#tokubetsukanyu_why_sonota__c').removeAttr("required");
              }
             });
            });
           </script>
-->
           <?php /* 20211122 Y.Horino アンケート入力 */ ?>
           <?php /************************************/ ?>
           
           
           
           
           
           
          <section class="mitsumori-regulation" id="regulation">
            <h2 class="mitsumori-regulation_ttl">注意事項及び団体則</h2>
            <div id="regulation_box" onSelectStart = "return false;" onMouseDown = "return false;" style = "-moz-user-select: none; -khtml-user-select: none; user-select: none;">
              <div class="mitsumori-regulation_box">
                <h4>〈注意事項〉</h4>
<pre style="white-space: pre-wrap ;">
加入希望者及び一般会員（以下「会員等」という。）は、当団体に入会し労働保険事務を委託（以下「事務委託」という。）するにあたり、建設工事に従事する際には労働安全衛生法及び関係法令を遵守し、かつ安全衛生に十分留意し、積極的に労働災害及び通勤災害防止に努めなければならない。</pre>
<h4>〈団体則〉</h4>
<pre style="white-space: pre-wrap ;">
1.	労働者災害補償保険法（以下「法」という。）の補償開始日は、管轄労働局の承認日とする。
2.	当団体が受託する事務委託を継続するには当団体の指定する期日までの年度更新手続を要するものとする。
3.	当団体は、会員等が希望する保険関係について事務委託するものとし、事務委託しない保険関係は自社にて手続を行うものとする。
4.	用語の定義
①　「脱退」とは、委託解除し当団体及び第一種特別加入から脱退することをいう。
5.	当団体は、次に該当すると思料される者からの加入申込みまたは会員資格の継続は、理由を附さずして断ることができる。
①　入会の意図が社会的、倫理的見地から検討して不当であると思料されるとき
②　「暴力団員による不当な行為の防止等に関する法律」第9条に該当すると思料されるとき
③　労働者災害補償保険法第33条第1項の要件を満たさないとき
④　その他、当団体が一般会員とすることを不適当と判断したとき
6.	会員等のうち第一種特別加入希望者が、特定業務従事期間が定められている期間を超え加入後も当該業務に従事する予定がある場合は、事前に健康診断を受診し管轄労働局長の承認を受けなければ会員カードの発行ができないものとする。なお、当団体より指定された期限内に健康診断を受診し、不承認であった場合は、未使用の労働保険料から振込手数料を控除した額を返金する。ただし、当団体より指定された期限内に健康診断を受診せず、不承認となった場合は、不承認となった日の属する月の末日をもって委託解除し、25.を適用する。
7.	加入希望者は、加入申込み後、当団体の指定する期限内に入会必要書類並びに会費及び労働保険料（以下「保険料等」という。）の支払いを完了させることで加入申込み完了とする。当団体の指定期限内に加入申込みが完了しないときは、事前通知なく一方的に加入手続を中止する。
8.	当団体は、会員等がいったん支払った会費は、いかなる理由があっても返金することはない。
9.	当団体から加入希望者に対してメール等で行う手続き開始連絡前に加入希望者から加入手続き取消しの申し出があったときは、①加入希望者がすでに保険料等振込み完了済みの場合は保険料等から振込手数料を控除した額を加入希望者の指定する金融機関口座に返金するものとし、②クレジットカードで支払いの場合は当団体がクレジットカード支払いを取り消すものとする。ただし、当団体から加入希望者に対してメール等で手続き開始連絡後に当該申し出があったときは、8.に該当し加入月の末日までを保険期間とし、25.を適用する。
10.	会員等は、当団体が必要とする個人情報を開示しなければならない。なお、当団体は、会員等から収集した行政手続における特定の個人を識別するための番号の利用等に関する法律（以下「マイナンバー法」という。）に定められた個人番号（以下「マイナンバー」という。）は内容確認後直ちに廃棄するものとする。
11.	当団体は、会員等からマイナンバーが記載された書類等を受領した場合、マイナンバー部分に黒塗り等の処理を施すことにより判別不能にした後に各種手続を行うものとし、マイナンバー法に定められたる利用範囲を越えたマイナンバーの保管、保有および活用はしない。
12.	当団体は、会員等の個人情報を当団体の定める「個人情報取扱規程」に準じて適正に処理する。
13．保険期間は、1．に定める補償開始日より一般会員から脱退の申し出または保険料等の口座振替不能確認後に当団体が定める脱退日または当該年度末とする。
14.	当団体が会員等に送付した預金口座振替依頼書が指定返送期限までに返送されないときは、5.④に該当すると判断し会員カード記載期間をもって脱退する。
15.	当団体は、一般会員より特段の申し出がない限り脱退日をもって保険関係は事業廃止とする。
16.	当団体は、会員等が当団体の定める「反社会的勢力の排除条項」に該当することを知ったときは、事前に会員等に何ら通告せず本委託を解除し、かつ捜査機関への通報及び協力をしなければならない。
17.	当団体が前項の規定により事務委託を解除した場合は、会員等に損害が生じても当団体は何らこれを賠償、補償することを要しない。また、解除により当団体に損害が生じたときは、会員等はその損害を賠償しなければならない。
18.	年度更新の意思確認は、毎年11月以降に当団体より一般会員宛に郵送、ＦＡＸまたはメールにて行う。一般会員は、指定期日迄に当団体の定める方法による意思確認かつ保険料等の納付（以下「継続手続」という。）を完了しなければならない。指定期日迄に継続手続が確認できないときは、年度末をもって脱退とする。
19.	年度更新時の給付基礎日額は、一般会員より特段の申し出がない限り、加入時に申し出た給付基礎日額を変更なく継続する。
20.	一般会員が脱退を希望するときは、脱退希望日の60日前までに当団体に連絡しなければならない。
21.	当団体は、過去に5.に該当し委託解除した一般会員の個人事業主又はその3親等以内の親族並びに法人の役員が加入希望者であったときは、当団体へ事務委託はできないものとする。
22．当団体は、会員が21.であることが判明したときは、5.に該当する者と判断し当団体が決定した日をもって脱退するものとする。
23.	一般会員が次のいずれかに該当する場合は、一般会員の事前合意なしに当団体の一方的判断によって脱退手続を行う。
①　一般会員が、指定期日までに会費又は労働保険料を支払わないとき
②　一般会員の連絡先に連絡が取れなくなった日の翌日から起算して連続又は断続して暦日で14日間連絡が取れないとき
③　一般会員が、日本国内外の法令に違反し、脱退手続を取ることが相当であると当団体が判断したとき
④　一般会員としてふさわしくないと当団体が判断したとき
⑤　その他前各号に準ずるとき
24.	一般会員は、次のいずれかに該当した場合は直ちに当団体まで連絡しなければならない。連絡がない場合は、労災保険給付請求ができない等の不利益を被ることがある。
①　年間100日以上労働者（パート、アルバイトを含む）を雇入れなくなったとき
②　建設業に従事しなくなったとき、または従事できなくなったとき
③　業種（職種）または除染作業区分を変更したとき
④　法人会員の場合は、法人の所在地、商号、電話番号等を、個人事業主会員の場合は、事業主の住所、屋号、電話番号等を変更したとき
⑤　その他前各号に準ずるとき 
25.	一般会員が年度途中に脱退、5.又は9.但し書きに該当し脱退となったときは、既納の保険料等のうち未使用の労働保険料から手続き費用及び振込手数料（以下「手続き費用等」という。）を差し引いた後に残余の労働保険料がある場合は、一般会員の指定する金融機関口座に返金する。なお、手続き費用等の不足額が生じた場合は一般会員に不足額を請求するものとする。
26.	労働保険事務組合は、法により一般会員及び一般会員に属する従業員の労災事故に係る労災保険給付請求手続は行うことができない。
27.	一般会員の事務委託に関する法の給付手続については、一般会員が行うものとする。
28.	当団体の会費は、国税庁通達№6467に該当し仕入税額控除の対象とはならず、また、印紙税法別表第一　課税物件表第17号文書非課税物件欄2かっこ書に該当するため、印紙税法非課税である。 
29.	当団体が実施するキャンペーン、サービス等は、会員等への事前の承諾なく終了することがある。
30.	団体則、すべての規程及び規則等（以下「団体則等」という。）は、理事会または役員会に諮り会員の事前承諾なく変更する場合がある。
31.	会員等は、上記団体則等を遵守し、団体則等の執行により被った損害等に関し如何なる名目においても当団体に損害等を請求できない。当団体は、上記団体則等の執行により会員等に生じる如何なる損害等に関しても一切責任を負わないものとする。
32.	当団体の運営並びに総会及び諸会議における議決事項については、理事長またはその会議の長に委任するものとする。

</pre>
<p style='text-align: right;'>作成及び使用開始；20221201</p>
              </div>
            </div>
          </section>

         <style>
          #check_php #sei_tbl figcaption{
           margin-top: 0;
          }
          #sei_tbl{
           width: 100%;
           /*max-width: 700px;
           margin: 1em;*/
          }
          #sei_tbl table{
           width: 100%;
          }
          #sei_tbl th, #sei_tbl td{
           background: none;
           border: 1px solid #999;
           line-height: 2em;
           text-align:center;
          }
          @media screen and (max-width: 740px){
           #sei_tbl th, #sei_tbl td{
               display: table-cell;
           }
          }
         </style>
          <section class="mitsumori-regulation" id="regulation">
            <h2 class="mitsumori-regulation_ttl">入会に関する確認事項及び誓約書</h2>
            <div id="regulation_box" onSelectStart = "return false;" onMouseDown = "return false;" style = "-moz-user-select: none; -khtml-user-select: none; user-select: none;">
              <div class="mitsumori-regulation_box">
                <h4>〈入会に関する確認事項及び誓約書〉</h4>
<pre style="white-space: pre-wrap ;">
　このたび、貴団体に入会し一括有期事業（末尾５）を委託するにあたり、下記事項を確認し遵守することを誓約いたします。

１．私は、貴団体の定めた定款、団体則、規約等を遵守いたします。
２．委託する労働保険事務は、一括有期事業（末尾５）です。 
３． 委託期間は受託日より委託解除日までとし、年度途中の給付基礎日額変更できないことを理解しました。
４．入会後の最初の会員カードは、加入月の末日が有効期限となるものが発行されることを理解しました。
５．貴団体が指定する期間内に口座振替依頼書の送付がないときは、会員カード記載期間で委託解除となることを理解しました。 
６．過去に、団体の指示に従わなかったことを事由として委託解除されたことがある場合は、再度貴団体への事務委託はできないことを理解しました。
７．委託解除については、委託期間満了の６０日前までに申し出ます。
８．次年度の委託期間の更新は、貴団体の指定期日までに貴団体の指定する方法にて行います。
９．一括有期事業（末尾５）以外の保険関係を他労働保険事務組合に委託いたしません。
10．入会前の未加入労災事故はありません。
11．第一種特別加入する者は、貴団体のＷＥＢサイト申込みフォームに入力したとおりです。
12． ２．で委託した手続は、届出書類の提出及び保険料等の納入を貴団体が確認後、開始されることを理解しました。
13．次年度以降の労働保険料等は、年一括で私が指定した金融機関口座より貴団体の指定した時期に口座振替にて支払います。 
14．会費は、第一種特別加入者数に基づき、毎年度新たに算定されることを理解しました。
15．13.の口座振替ができなかったときは、私からの委託解除の意思表示とみなされ直ちに委託解除されることを理解しました。
16. 15．の委託解除日を以て一括有期事業は事業廃止（元請工事がないため）されることを理解しました。
17. 貴団体からの連絡不能状態が１４日以上連続した場合は、理由の如何にかかわらず事業をする意志がないものとみなされ一方的に委託解除されても一切異議を申し立てません。
18．委託解除されたことにより被った損失に関しては、すべて自己責任であることを理解しました。
19．未納分の保険料等については、口座振替、差押え、取引先へ請求等されても一切異議を申し立てません。
20．私は、反社会的勢力（暴力団、暴力団員、暴力団員でなくなった時から５年を経過しない者、暴力団準構成員、暴力団関係企業、総会屋等、社会運動等標ぼうゴロ又は特殊知能暴力集団、その他これらに準ずる者をいう）に属する者ではなく、貴団体との契約において暴力的な要求行為等を行いません。
21．その他貴団体に損害を与える行為をしないことをここに誓約いたします。
</pre>
<!--<br>
<figure id="sei_tbl">
<figcaption>別表１</figcaption>
<table>
<tr><th style="min-width: 4em;">業務の範囲</th><th style="min-width: 4em;">特別加入者数</th><th style="min-width: 5em;">年会費</th><th>備考</th></tr>
<tr><td>末尾５</td><td>1 名まで</td><td>60,000 円</td><td>2 名以上の場合、24,000 円/人加算</td></tr>
</table>
</figure>-->
              </div>
            </div>
          </section>

          <p class="mitsumori-txt">下の「申込み」ボタンをクリックすることで、加入者ご本人様が申込み内容及び「注意事項および団体則」「入会に関する確認事項及び誓約書」を確認し、同意いただいたことといたします。</p>
         
          <div class="mitsumori-btn_area">
            <input class="mitsumori-submit" type="image" src="../assets/img/form_check_next.png" id="submit" name="submit" value="次へ進む">
           <a class="mitsumori-back" id="back" onClick="history.back()"><img src="../assets/img/form_card_back.png" alt="前の画面に戻る"></a>
          </div>

           
  <!-- https://www.sejuku.net/blog/104657 -->
<div class="popup">
  <div class="content">
   <img src="../assets/img/form_kanyusyasyo_popup_pc.png" class="popup_back show_pc hide_sp">
   <img src="../assets/img/form_kanyusyasyo_popup_sp.png" class="popup_back show_sp hide_pc">
   
   <a id="popup_close"></a>
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
.content {
  max-width: 600px;
  opacity: 1;
  color: #000;
  font-size: 14px;
  line-height: 20px;
  text-align: left;
  position: relative;
}
#popup_close{
    text-decoration: none;
    display: inline-block;
    text-align: center;
    cursor: pointer;
}
#popup_close img{
 width: 100%;
}
#popup_close{
 position: absolute;
 color: transparent;
 bottom: 12%;
 right: 28.5%;
 width: 42%;
 height: 12%;
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
 #popup_close{
  bottom: 12%;
  right: 24%;
  width: 52%;
  height: 12%;
 }
}
@media screen and (max-width: 400px) {
 #popup_close{
 }
}
  </style>
  <script>
$(".popup").hide();
<?php if($_SESSION['shiharai_kaisu'] == '毎月払い') { ?>
$("#submit").on("click", function() {
 $(".popup").fadeIn();
 return false;
});
<?php } else { ?>
$("#submit").on("click", function() {
 return true;
});
<?php } ?>
   
$("#popup_close").on("click", function() {
 //$(".popup").fadeOut();
 $("#popup_close").css('background-color','#fff8');
 $("#popup_close").css('cursor','wait');
 $('form').submit();
});
  </script>
  <!-- https://www.sejuku.net/blog/104657 -->

           
         <!--
          <div class="mitsumori-btn_area">
            <input class="mitsumori-back" type="reset" id="reset" value="＜ 戻る" onClick="history.back()">
            <input class="mitsumori-submit" type="submit" id="submit" name="submit" value="加入申込み">
          </div>
-->
        </div>

      </section>

    </form>
  </main>

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
$(function() {
 $("form").submit(function() {
   var self = this;
  console.log('--- submit ---');
   $("#submit").prop("disabled", true);
   $("#submit").css("opacity", "0.3");
   setTimeout(function() {
     $("#submit").prop("disabled", false);
     $("#submit").css("opacity", "1");
   }, 30000);
 });
});
</script>

</body>
</html>