<?php
include_once('auth.php');
require_once('common_function.php');
header("Content-type: text/html;charset=utf-8");
$TOP_PATH = '../../';

$title="マイページTOP";
?>

<!doctype html>
<html id="top_php">
<head>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_head.html'; ?>
	
 
<?php include_once('settings.php'); ?>
  <meta name="description" content="">
  <meta name="keywords" content="">
<title><?php echo $title;?></title>
 
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width">
  <meta name="description" content="">
  <link rel="canonical" href="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/top.php">
  <link rel="alternate" media="handheld" href="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/top.php">
 
 <meta name="robots" content="all">
 <meta name="copyright" content="Copyright 2020 労働保険事務組合RJC All Rights Reserved.">
 <meta property="og:title" content="<?php echo $title;?>　：　マイページ">
 <meta property="og:type" content="article">
 <meta property="og:url" content="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/top.php">
 <meta property="og:image" content="/assets/img/m_zenekon.png">
 <meta property="og:site_name" content="中小事業主の特別加入RJC">
 <meta property="og:description" content=""> 
 <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
 <link rel="icon" href="/favicon.ico">
 
</head>

<body>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_body.html'; ?>
	
 
<?php include_once('header.php'); ?>
<?php /*include("top_nenkopopup.php");*/?>

<div class="inner">
	
<ul id="top_menu">
<li>
<a href="kaisya.php"><img src="image/img_kaisya.png">
</a>
<a href="kaisya.php">会社情報</a>
<p>会社情報を確認・変更ができます。</p>
</li>
<li>
<a href="kanyusya.php"><img src="image/img_kanyusyainfo.png">
</a>
<a href="kanyusya.php">特別加入者情報</a>
<p>特別加入者の情報が確認できます。</p>
</li>
<li>
<a href="kanyusya.php"><img src="image/img_kanyusyasyo.png">
</a>
<a href="kanyusya.php">会員カード</a>
<p>特別加入の会員カードを見ることができます。</p>
</li>
<li>
<a href="kanyusya.php"><img src="image/img_syoumeisyo.png">
</a>
<a href="kanyusya.php">加入証明書</a>
<p>特別加入の加入証明書を見ることができます。</p>
</li>
<li>
<a href="download.php"><img src="image/img_download.png">
</a>
<a href="download.php"><span class="hide_sp" style="text-decoration: inherit;">各種</span>ダウンロード・印刷</a>
<p>会員カードや加入証明書などのダウンロード・印刷ができます。</p>
</li>
 
<?php if($_SESSION['row']['Kanyutype__c']!='旧会員（会費3期払い）' && $_SESSION['row']['Kanyutype__c']!='旧会員（会費毎月払い）' && $_SESSION['row']['koyouhokenitakuhi__c']==''){ ?>
<li>
<a href="https://www.xn--y5q0r2lqcz91qdrc.com/koyohoken/form/mitsumori.php?no=<?php echo $_SESSION['row']['jimuKaiinNo__c'];?>"><img src="image/img_koyohoken.png">
</a>
<a href="https://www.xn--y5q0r2lqcz91qdrc.com/koyohoken/form/mitsumori.php?no=<?php echo $_SESSION['row']['jimuKaiinNo__c'];?>">雇用保険申込</a>
<p>従業員の雇用保険申込ができます。</p>
</li>
<?php } ?>
 
 <!--
<li>
<a href=""><img src="image/img_syokai.png">
</a>
<a href="">お友達紹介</a>
<p>お友達を紹介した方もされた方も割引特典があります。</p>
</li>
-->
</ul>


</div>
	
<?php include_once('footer.php'); ?>

</body>
</html>