<?php
include_once('auth.php');
require_once('common_function.php');
header("Content-type: text/html;charset=utf-8");

$title="会員カード";
/*
 require_once("bin/sf_Api.php");
 init();
 sf_login();

 $result = (array)getKaisyabyOrderNo('58820109');
 $row = (array)$result["fields"];
 $Id = $result['Id'];
 
 sf_logout();
*/
// $no = intval($_GET['seiribangou']);
 $no = intval($_GET['no']);
 $kanyusya = $_SESSION['row_kaiin'.$no];
 $matsubi_get = -1;
 if(isset($_GET['matsubi'])){
  $matsubi_get = intval($_GET['matsubi']);
 }
?>

<!doctype html>
<html id="kaiinsyo_php">
<head>
<?php include_once  $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_head.html'; ?>
 
<?php include_once('settings.php'); ?>
<title><?php echo $title;?></title>
 
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width">
  <meta name="description" content="">
  <link rel="canonical" href="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/kaiinsyo.php">
  <link rel="alternate" media="handheld" href="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/kaiinsyo.php">
 
 <meta name="robots" content="all">
 <meta name="copyright" content="Copyright 2020 労働保険事務組合RJC All Rights Reserved.">
 <meta property="og:title" content="<?php echo $title;?>　：　マイページ">
 <meta property="og:type" content="article">
 <meta property="og:url" content="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/kaiinsyo.php">
 <meta property="og:image" content="/assets/img/m_zenekon.png">
 <meta property="og:site_name" content="中小事業主の特別加入RJC">
 <meta property="og:description" content=""> 
 <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
 <link rel="icon" href="/favicon.ico">
 
</head>

<style type="text/css" media="print">
 div#mainnav{
  display: none;
 }
 footer{
  display: none;
 }
 #kaiinsyo_php body .inner input[type="button"]{
  display: none;
 }
 #kaiinsyo_php body .inner figure #kaiinsyo_print{
  display: none;
 }
</style>
 
<body>
<?php include_once  $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_body.html'; ?>
	
<?php include_once('header.php'); ?>
<?php
 $kaiinsyo = 'kaiinsyo.png';
 $bangou = $kanyusya['jimuRoudouhokenBangou0__c'];
 if($bangou == '') $bangou = $kanyusya['jimuRoudouhokenBangou6__c'];
 if($bangou == '') $bangou = $kanyusya['jimuRoudouhokenBangou5__c'];
 if($bangou == '') $bangou = $_SESSION['row']['jimuRoudouhokenBangou5__c'];
 $bangou_split = explode('-', $bangou);
 $matsubi = substr($bangou_split[1], -1);
 $kaisyano_int = intval(str_replace('A','',$_SESSION['row']['jimuKaiinNo__c']));
 if($matsubi_get >= 0){
  $matsubi = $matsubi_get;
  $bangou = $kanyusya['jimuRoudouhokenBangou'.$matsubi_get.'__c'];
 }
 $jigyosyo = $_SESSION['row']['Name'];
 
 $y = date('Y');
 $m = date('m');
 if(intval($m)>3) {
  $nendo = $y;
  $endy = $y + 1;
 } else {
  $nendo = $y - 1;
  $endy = $y;
 }
 
 $Kanyunengappiwareki__c = $kanyusya['Kanyudate__c'];
 $Kanyumankiwareki__c = $kanyusya['Kanyumankibinew__c'];
 
 /* 20220325 SFデータ入力完了までは2022/4/1～2023/3/31にする */
 if($Kanyunengappiwareki__c == '') $Kanyunengappiwareki__c = '2023-04-01';
 if($Kanyumankiwareki__c == '') $Kanyumankiwareki__c = '2024-03-31';
?>
<div class="inner" style="padding: 0;">

<figure>
 <figcaption></figcaption>
 <div id="kaiinsyo_div">
  <img src="/assets/logo_img/<?php echo $kaiinsyo;?>" alt="会員カード">
  <!--<p id="nendo"><?php echo $nendo;?></p>-->
  <p id="roudouhokenbangou"><span id="title_roudouhokenbangou" class="kaiinsyo_title"><span>労</span><span>働</span><span>保</span><span>険</span><span>番</span><span>号</span></span><span><?php echo $bangou;?></span></p>
  <p id="jigyosyo"><span id="title_jigyosyo" class="kaiinsyo_title"><span>事</span><span>業</span><span>所</span><span>名</span></span><span style="font-size: 10px; padding: 0.3em 0;"><?php echo $jigyosyo;?></span></p>
  <p id="seiribangou"><span id="title_seiribangou" class="kaiinsyo_title"><span>整</span><span>理</span><span>番</span><span>号</span></span><span><?php echo $_GET['seiribangou'];?></span></p>
  <p id="name"><span id="title_name" class="kaiinsyo_title"><span>氏</span><span>名</span></span><span><?php echo $kanyusya['Name'];?></span></p>
  <p id="hakkou"><span id="title_hakkou" class="kaiinsyo_title"><span>発</span><span>行</span><span>年</span><span>月</span><span>日</span></span><span><?php echo date('Y年m月d日', strtotime($Kanyunengappiwareki__c));?></span></p>
  <p id="kigen"><span id="title_kigen" class="kaiinsyo_title"><span>有</span><span>効</span><span>期</span><span>限</span></span><span><?php echo date('Y年m月d日', strtotime($Kanyumankiwareki__c));?></span></p>
 </div>
 <a href="javascript:void(0)" onclick="print();return false;" id="kaiinsyo_print">印刷する</a>
</figure>

<input type="button" name="prev" value="戻る" onclick="history.back();">
 
</div>
	
<?php include_once('footer.php'); ?>

</body>
</html>