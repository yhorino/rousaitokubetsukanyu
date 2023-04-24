<?php
include_once('auth.php');
require_once('common_function.php');
header("Content-type: text/html;charset=utf-8");

$title="登録情報　変更の確認";

 $kaisya_name = $_SESSION['kaisya_name'];
 if($_SESSION['kaisya_name'] != $_SESSION['bk']['Name']){
  $kaisya_name = '<span class="change">'.$_SESSION['kaisya_name'].'</span>';
 }
 $kaisya_zip = $_SESSION['kaisya_zip'];
 if($_SESSION['kaisya_zip'] != $_SESSION['bk']['BillingPostalCode']){
  $kaisya_zip = '<span class="change">'.$_SESSION['kaisya_zip'].'</span>';
 }
 $kaisya_address = $_SESSION['kaisya_address'];
 if($_SESSION['kaisya_address'] != $_SESSION['bk']['BillingState'].$_SESSION['bk']['BillingCity'].$_SESSION['bk']['BillingStreet']){
  $kaisya_address = '<span class="change">'.$_SESSION['kaisya_address'].'</span>';
 }
 $kaisya_tel = $_SESSION['kaisya_tel'];
 if($_SESSION['kaisya_tel'] != $_SESSION['bk']['Phone']){
  $kaisya_tel = '<span class="change">'.$_SESSION['kaisya_tel'].'</span>';
 }
 $kaisya_fax = $_SESSION['kaisya_fax'];
 if($_SESSION['kaisya_fax'] != $_SESSION['bk']['Fax']){
  $kaisya_fax = '<span class="change">'.$_SESSION['kaisya_fax'].'</span>';
 }
 $kaisya_daihyosya_name = $_SESSION['kaisya_daihyosya_name'];
 if($_SESSION['kaisya_daihyosya_name'] != $_SESSION['bk']['Daihyosya__c']){
  $kaisya_daihyosya_name = '<span class="change">'.$_SESSION['kaisya_daihyosya_name'].'</span>';
 }
 $kaisya_daihyosya_tel = $_SESSION['kaisya_daihyosya_tel'];
 if($_SESSION['kaisya_daihyosya_tel'] != $_SESSION['bk']['DaijyoKeitai__c']){
  $kaisya_daihyosya_tel = '<span class="change">'.$_SESSION['kaisya_daihyosya_tel'].'</span>';
 }
 $kaisya_no = $_SESSION['kaisya_no'];
 if($_SESSION['kaisya_no'] != $_SESSION['bk']['HoujinBangou__c']){
  $kaisya_no = '<span class="change">'.$_SESSION['kaisya_no'].'</span>';
 }
 $kaisya_email = $_SESSION['kaisya_email'];
 if($_SESSION['kaisya_email'] != $_SESSION['bk']['Email__c']){
  $kaisya_email = '<span class="change">'.$_SESSION['kaisya_email'].'</span>';
 }
?>

<!doctype html>
<html id="kaisya_check_php">
<head>
<?php include_once  $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_head.html'; ?>
	
 
<?php include_once('settings.php'); ?>
  <meta name="description" content="">
  <meta name="keywords" content="">
<title><?php echo $title;?></title>
 
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width">
  <meta name="description" content="">
  <link rel="canonical" href="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/kaisya_check.php">
  <link rel="alternate" media="handheld" href="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/kaisya_check.php">
 
 <meta name="robots" content="all">
 <meta name="copyright" content="Copyright 2020 労働保険事務組合RJC All Rights Reserved.">
 <meta property="og:title" content="<?php echo $title;?>　：　マイページ">
 <meta property="og:type" content="article">
 <meta property="og:url" content="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/kaisya_check.php">
 <meta property="og:image" content="/assets/img/m_zenekon.png">
 <meta property="og:site_name" content="中小事業主の特別加入RJC">
 <meta property="og:description" content=""> 
 <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
 <link rel="icon" href="/favicon.ico">
 
</head>

<body>
<?php include_once  $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_body.html'; ?>
	
 
<?php include_once('header.php'); ?>
<style>
 .change{
  color: #f00;
 }
</style>
 
<div class="inner">
	
<form name="form" method="post" action="trans.php" enctype="multipart/mitsumori-data">
<input type="hidden" id="pagename" name="pagename" value = "kaisya_check.php">
<input type="hidden" name="kaisya_name" value="<?php echo $_SESSION['kaisya_name']; ?>">
<input type="hidden" name="kaisya_zip" value="<?php echo $_SESSION['kaisya_zip']; ?>">
<input type="hidden" name="kaisya_address" value="<?php echo $_SESSION['kaisya_address']; ?>">
<input type="hidden" name="kaisya_tel" value="<?php echo $_SESSION['kaisya_tel']; ?>">
<input type="hidden" name="kaisya_fax" value="<?php echo $_SESSION['kaisya_fax']; ?>">
<input type="hidden" name="kaisya_daihyosya_name" value="<?php echo $_SESSION['kaisya_daihyosya_name']; ?>">
<input type="hidden" name="kaisya_daihyosya_tel" value="<?php echo $_SESSION['kaisya_daihyosya_tel']; ?>">
<input type="hidden" name="kaisya_no" value="<?php echo $_SESSION['kaisya_no']; ?>">
<input type="hidden" name="kaisya_email" value="<?php echo $_SESSION['kaisya_email']; ?>">
	
<figure>
 <figcaption>登録情報　変更の確認</figcaption>
 <p>以下のとおり登録情報を変更します。</p>
 <table>
  <tr>
   <th>会社名</th><td><?php echo $kaisya_name; ?></td>
  </tr>
  <tr>
   <th>郵便番号</th><td><?php echo $kaisya_zip; ?></td>
  </tr>
  <tr>
   <th>住所</th><td><?php echo $kaisya_address; ?></td>
  </tr>
  <tr>
   <th>電話番号</th><td><?php echo $kaisya_tel; ?></td>
  </tr>
  <tr>
   <th>FAX番号</th><td><?php echo $kaisya_fax; ?></td>
  </tr>
  <tr>
   <th>代表者名</th><td><?php echo $kaisya_daihyosya_name; ?></td>
  </tr>
  <tr>
   <th>代表者連絡先</th><td><?php echo $kaisya_daihyosya_tel; ?></td>
  </tr>
  <tr>
   <th>法人番号</th><td><?php echo $kaisya_no; ?></td>
  </tr>
  <tr>
   <th>メールアドレス</th><td><?php echo $kaisya_email; ?></td>
  </tr>
 </table>
</figure>

<input type="submit" name="submit" value="変更内容を送信">
 
</form>

</div>
	
<?php include_once('footer.php'); ?>

</body>
</html>