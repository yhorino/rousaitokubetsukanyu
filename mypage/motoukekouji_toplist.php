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

$this_year = date('Y');
$next_year = ''.(intval($this_year) + 1);
$ym_list = array(
 $this_year."01",
 $this_year."02",
 $this_year."03",
 $this_year."04",
 $this_year."05",
 $this_year."06",
 $this_year."07",
 $this_year."08",
 $this_year."09",
 $this_year."10",
 $this_year."11",
 $this_year."12",
 $next_year."01",
 $next_year."02",
 $next_year."03"
);
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
 <a href="top.php">マイページトップへ戻る</a>
 
 <?php if(isset($_SESSION['message'])) { ?>
  <div class="regist_message" id="regist_message">
   <?php echo $_SESSION['message']; ?>
  </div>
  <script>
   $(document).ready(function() {
       setTimeout(function() {
           $('#regist_message').slideUp();
       }, 3000); // 3000ミリ秒 = 3秒
   });
  </script>
 <?php unset($_SESSION['message']); ?>
 <?php } ?>
 
 <div class="toplist_info">
  <p>月ごとに完了した元請工事を登録してください。</p>
  <p>元請工事がない月は　<span class="edit_button mk_button">工事なし</span>　をクリックしてください。</p>
  <p>元請工事がある月は　<span class="edit_button mk_button">工事入力・編集</span>　から工事を登録してください。</p>
  <p>登録後も工事内容は編集可能です。<br></p>
  <p>保険料は概算保険料です。<br>年度更新手続き時に正確な保険料が確定します。</p>
 </div>
 
 <div class="motoukekouji_table_outer">
 <table class="motoukekouji_table motoukekouji_toplist_table">
  <tr>
   <th class="toplist_th_kikan">工事の期間</th>
   <th class="toplist_th_status">ステータス</th>
   <th class="toplist_th_regist">登録</th>
  </tr>
  <?php foreach($ym_list as $ym){ ?>
  <?php 
   $y = substr($ym,0,4);
   $m = substr($ym,4,2);
   $cnt = intval($motoukekouji_array_data->getMotoukekoujiRecordDataNumWithYM($ym));
   $no_kouji_disable = '';
   if($cnt > 0) {
    $no_kouji_disable = ' disabled ';
    $status = '<span class="kouji_ari">工事 <span class="kouji_count">'.$cnt.'</span> 件　登録済</span>';
   } else {
    $no_kouji_disable = '';
    $status = '（工事未登録）';    
   }
  ?>
  <tr>
   <td><?php echo $y;?>年<?php echo $m;?>月　完了工事</td>
   <td><?php echo $status;?></td>
   <td><a href="motoukekouji_nodata.php?kikan=<?php echo $ym;?>" class="edit_button mk_button <?php echo $no_kouji_disable;?>">工事なし</a>　<a href="motoukekouji_list.php?kikan=<?php echo $ym;?>" class="edit_button mk_button">工事入力・編集</a></td>
  </tr>
  <?php } ?>  
 </table>
 </div>
 
</div>
	
<?php include_once('footer.php'); ?>

</body>
</html>

