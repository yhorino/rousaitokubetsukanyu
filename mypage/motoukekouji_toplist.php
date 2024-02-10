<?php
session_start();
include_once('auth.php');
require_once('common_function.php');
header("Content-type: text/html;charset=utf-8");

$title="元請工事入力";

include_once('./motoukekouji_class.php');
$_id = $_SESSION['row']['Id'];
$_name = $_SESSION['row']['Name'];
$motoukekouji_array_data = new MotoukekoujiDataArray($_id, $_name);
$ret = $motoukekouji_array_data->getMotoukekoujiRecordData();

?>

<!doctype html>
<html>
<head>
<?php include_once  $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_head.html'; ?>
	
 
<?php include_once('settings.php'); ?>
  <meta name="description" content="">
  <meta name="keywords" content="">
<title><?php echo $title;?></title>
 
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width">
  <meta name="description" content="">
  <link rel="canonical" href="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/motoukekouji_list.php">
  <link rel="alternate" media="handheld" href="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/motoukekouji_list.php">
 
 <meta name="robots" content="all">
 <meta name="copyright" content="Copyright 2020 労働保険事務組合RJC All Rights Reserved.">
 <meta property="og:title" content="<?php echo $title;?>　：　マイページ">
 <meta property="og:type" content="article">
 <meta property="og:url" content="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/motoukekouji_list.php">
 <meta property="og:image" content="/assets/img/m_zenekon.png">
 <meta property="og:site_name" content="中小事業主の特別加入RJC">
 <meta property="og:description" content=""> 
 <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
 <link rel="icon" href="/favicon.ico">
 
 <link rel="stylesheet" href="motoukekouji.css">
 
</head>

<body>
<?php include_once  $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_body.html'; ?>
	
 
<?php include_once('header.php'); ?>

<div class="inner">

 <p>月ごとに完了した元請工事を登録してください。</p>
 <p>元請工事がない月は　<span class="edit_button mk_button">工事なし</span>　をクリックしてください。</p>
 <p>元請工事がある月は　<span class="edit_button mk_button">工事入力・編集</span>　から工事を登録してください。</p>
 
 <?php if($motoukekouji_array_data->MotoukekoujiDataNum() > 0){ ?>
 <div class="motoukekouji_table_outer">
 <table class="motoukekouji_table">
  <tr>
   <th class="toplist_th_kikan">工事の期間</th>
   <th class="toplist_th_status">ステータス</th>
   <th class="toplist_th_regist">登録</th>
  </tr>
  <tr>
   <td>2024年01月　完了工事</td>
   <td>工事X件　登録済</td>
   <td><a href="motoukekouji_nodata.php?kikan=202401" class="edit_button mk_button">工事なし</a>　<a href="motoukekouji_list.php?kikan=202401" class="edit_button mk_button">工事入力・編集</a></td>
  </tr>
  <?php } ?>
 </table>
 </div>
 
</div>
	
<?php include_once('footer.php'); ?>

</body>
</html>

