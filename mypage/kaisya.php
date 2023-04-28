<?php
include_once('auth.php');
require_once('common_function.php');
header("Content-type: text/html;charset=utf-8");

$title="会社情報";
/*
 require_once("bin/sf_Api.php");
 init();
 sf_login();

 $result = (array)getKaisyabyOrderNo('58820109');
 $row = (array)$result["fields"];

 sf_logout();
*/
if($_SESSION['row']['jimusyahokigou1__c'] == '11'){
 $_SESSION['row']['jimusyahokigou1__c'] = '';
}
if($_SESSION['row']['jimusyahokigou2__c'] == 'アアア'){
 $_SESSION['row']['jimusyahokigou2__c'] = '';
}
?>

<!doctype html>
<html id="kaisya_php">
<head>
<?php include_once  $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_head.html'; ?>
	
 
<?php include_once('settings.php'); ?>
  <meta name="description" content="">
  <meta name="keywords" content="">
<title><?php echo $title;?></title>
 
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width">
  <meta name="description" content="">
  <link rel="canonical" href="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/kaisya.php">
  <link rel="alternate" media="handheld" href="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/kaisya.php">
 
 <meta name="robots" content="all">
 <meta name="copyright" content="Copyright 2020 労働保険事務組合RJC All Rights Reserved.">
 <meta property="og:title" content="<?php echo $title;?>　：　マイページ">
 <meta property="og:type" content="article">
 <meta property="og:url" content="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/kaisya.php">
 <meta property="og:image" content="/assets/img/m_zenekon.png">
 <meta property="og:site_name" content="中小事業主の特別加入RJC">
 <meta property="og:description" content=""> 
 <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
 <link rel="icon" href="/favicon.ico">
 
</head>

<body>
<?php include_once  $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_body.html'; ?>
	
 
<?php include_once('header.php'); ?>

<div class="inner">
	
<form name="form" method="post" action="trans.php" enctype="multipart/mitsumori-data">
<input type="hidden" id="pagename" name="pagename" value = "kaisya.php">
	
<figure>
 <figcaption>会社情報</figcaption>
 <table>
  <tr>
   <th>会社名</th><td id="kaisya_name"><?php echo $_SESSION['row']['Name'];?></td>
  </tr>
  <tr>
   <th>郵便番号</th><td id="kaisya_zip"><?php echo $_SESSION['row']['BillingPostalCode'];?></td>
  </tr>
  <tr>
   <th>住所</th><td id="kaisya_address"><?php echo $_SESSION['row']['BillingState'].$_SESSION['row']['BillingCity'].$_SESSION['row']['BillingStreet'];?></td>
  </tr>
  <tr>
   <th>電話番号</th><td id="kaisya_tel"><?php echo $_SESSION['row']['Phone'];?></td>
  </tr>
  <tr>
   <th>FAX番号</th><td id="kaisya_fax"><?php echo $_SESSION['row']['Fax'];?></td>
  </tr>
  <tr>
   <th>代表者名</th><td id="kaisya_daihyosya_name"><?php echo $_SESSION['row']['Daihyosya__c'];?></td>
  </tr>
  <tr>
   <th>代表者連絡先</th><td id="kaisya_daihyosya_tel"><?php echo $_SESSION['row']['DaijyoKeitai__c'];?></td>
  </tr>
  <tr>
   <th>メールアドレス</th><td id="kaisya_email"><?php echo $_SESSION['row']['Email__c'];?></td>
  </tr>
 </table>
</figure>

<input type="submit" name="submit" value="登録情報の変更">

</form>

<figure <?php if($_SESSION['row']['jimuRoudouhokenBangou0__c'] == '') {echo 'style="display: none;"';}?>>
 <figcaption>労働保険</figcaption>
 <table>
  <tr <?php if($_SESSION['row']['jimuRoudouhokenBangou0__c'] == '') {echo 'style="display: none;"';}?>>
   <th>労働保険番号</th><td id="rousai_roudou_no0"><?php echo $_SESSION['row']['jimuRoudouhokenBangou0__c'];?></td>
  </tr>
  <tr>
   <th>雇用保険事業所番号</th><td id="koyou_jigyosya_no"><?php echo $_SESSION['row']['jimuKoyouhokenBangou__c'];?></td>
  </tr>
 </table>
</figure>

<figure <?php if(($_SESSION['row']['jimuRoudouhokenBangou5__c'] == '') && ($_SESSION['row']['jimuRoudouhokenBangou6__c'] == '')) {echo 'style="display: none;"';}?>>
 <figcaption>労災保険</figcaption>
 <table>
  <tr <?php if($_SESSION['row']['jimuRoudouhokenBangou5__c'] == '') {echo 'style="display: none;"';}?>>
   <th>労働保険番号</th><td id="rousai_roudou_no5"><?php echo $_SESSION['row']['jimuRoudouhokenBangou5__c'];?></td>
  </tr>
  <tr <?php if($_SESSION['row']['jimuRoudouhokenBangou6__c'] == '') {echo 'style="display: none;"';}?>>
   <th>労働保険番号</th><td id="rousai_roudou_no6"><?php echo $_SESSION['row']['jimuRoudouhokenBangou6__c'];?></td>
  </tr>
 </table>
</figure>

<figure <?php if($_SESSION['row']['jimuRoudouhokenBangou2__c'] == '') {echo 'style="display: none;"';}?>>
 <figcaption>雇用保険</figcaption>
 <table>
  <tr>
   <th>雇用保険事業所番号</th><td id="koyou_jigyosya_no"><?php echo $_SESSION['row']['jimuKoyouhokenBangou__c'];?></td>
  </tr>
  <tr>
   <th>労働保険番号</th><td id="koyou_roudou_no"><?php echo $_SESSION['row']['jimuRoudouhokenBangou2__c'];?></td>
  </tr>
 </table>
</figure>
 
<figure <?php if(($_SESSION['row']['jimusyahokigou1__c'] == '') && ($_SESSION['row']['jimusyahokigou2__c'] == '') && ($_SESSION['row']['jimukyokaikenpono__c'] == '')) {echo 'style="display: none;"';}?>>
 <figcaption>社会保険</figcaption>
 <table>
  <tr>
   <th>社会保険記号１</th><td id="syakai_kigou1"><?php echo $_SESSION['row']['jimusyahokigou1__c'];?></td>
  </tr>
  <tr>
   <th>社会保険記号２</th><td id="syakai_kigou2"><?php echo $_SESSION['row']['jimusyahokigou2__c'];?></td>
  </tr>
  <tr>
   <th>協会けんぽ番号</th><td id="syakai_kenpo_no"><?php echo $_SESSION['row']['jimukyokaikenpono__c'];?></td>
  </tr>
 </table>
</figure>


<input type="button" name="prev" value="戻る" onclick="history.back();">
 
</div>
	
<?php include_once('footer.php'); ?>

</body>
</html>