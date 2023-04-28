<?php
include_once('auth.php');
require_once('common_function.php');
header("Content-type: text/html;charset=utf-8");

$title="登録情報の変更";
/*
 require_once("bin/sf_Api.php");
 init();
 sf_login();

 $result = (array)getKaisyabyOrderNo('22805147');
 $row = (array)$result["fields"];

 sf_logout();
 $_SESSION['bk'] = $row;
 */
 
?>

<!doctype html>
<html id="kaisya_edit_php">
<head>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_head.html'; ?>
	
 
<?php include_once('settings.php'); ?>
  <meta name="description" content="">
  <meta name="keywords" content="">
<title><?php echo $title;?></title>
 
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width">
  <meta name="description" content="">
  <link rel="canonical" href="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/kaisya_edit.php">
  <link rel="alternate" media="handheld" href="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/kaisya_edit.php">
 
 <meta name="robots" content="all">
 <meta name="copyright" content="Copyright 2020 労働保険事務組合RJC All Rights Reserved.">
 <meta property="og:title" content="<?php echo $title;?>　：　マイページ">
 <meta property="og:type" content="article">
 <meta property="og:url" content="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/kaisya_edit.php">
 <meta property="og:image" content="/assets/img/m_zenekon.png">
 <meta property="og:site_name" content="中小事業主の特別加入RJC">
 <meta property="og:description" content=""> 
 <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
 <link rel="icon" href="/favicon.ico">
 
</head>

<body>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_body.html'; ?>
	
 
<?php include_once('header.php'); ?>
<?php $_SESSION['bk'] = $_SESSION['row']; ?>
 
<div class="inner">
	
<form name="form" method="post" action="trans.php" enctype="multipart/mitsumori-data">
<input type="hidden" id="pagename" name="pagename" value = "kaisya_edit.php">
	
<figure>
 <figcaption>登録情報の変更</figcaption>
<p>現在の登録情報が表示されています。<br>
変更項目を直接修正してください。
</p>
 <table>
  <tr>
   <th>会社名</th><td><input type="text" name="kaisya_name" value="<?php echo $_SESSION['row']['Name'];?>"></td>
  </tr>
  <tr>
   <th>郵便番号</th><td><input type="text" name="kaisya_zip" value="<?php echo $_SESSION['row']['BillingPostalCode'];?>"></td>
  </tr>
  <tr>
   <th>住所</th><td><input type="text" name="kaisya_address" value="<?php echo $_SESSION['row']['BillingState'].$_SESSION['row']['BillingCity'].$_SESSION['row']['BillingStreet'];?>"></td>
  </tr>
  <tr>
   <th>電話番号</th><td><input type="text" name="kaisya_tel" value="<?php echo $_SESSION['row']['Phone'];?>"></td>
  </tr>
  <tr>
   <th>FAX番号</th><td><input type="text" name="kaisya_fax" value="<?php echo $_SESSION['row']['Fax'];?>"></td>
  </tr>
  <tr>
   <th>代表者名</th><td><input type="text" name="kaisya_daihyosya_name" value="<?php echo $_SESSION['row']['Daihyosya__c'];?>"></td>
  </tr>
  <tr>
   <th>代表者連絡先</th><td><input type="text" name="kaisya_daihyosya_tel" value="<?php echo $_SESSION['row']['DaijyoKeitai__c'];?>"></td>
  </tr>
  <tr>
   <th>メールアドレス</th><td><input type="text" name="kaisya_email" value="<?php echo $_SESSION['row']['Email__c'];?>"></td>
  </tr>
 </table>
  
<p>ご確認ください</p>
<ol>
<li>登録情報の変更は、当組合にて手続きを行います。</li>
<li>変更内容によっては、確認書類が必要となります。<br>
あらためて、変更手続きのご案内をいたします。
</li>
<li>変更内容のマイページへの反映までお時間をいただきます。<br>
あらかじめご了承ください。
</li>
</ol>
  
<label id="readcheck"><input type="checkbox" name="kakunin" required>上記の事項を確認しました</label>
</figure>

<input type="submit" name="submit" value="確認画面へ">
 
</form>

</div>
	
<?php include_once('footer.php'); ?>

</body>
</html>