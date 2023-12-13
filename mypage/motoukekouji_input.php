<?php
session_start();
include_once('auth.php');
require_once('common_function.php');
header("Content-type: text/html;charset=utf-8");

$title="元請工事入力";

include_once('./motoukekouji_class.php');
$id = '';
$accountid = '';
$type = '';
$address = '';
$kikan_start = '';
$kikan_end = '';
$kingaku = '';
if(isset($_GET['id']) && $_GET['id'] != ''){
 $id = $_GET['id'];
 $motoukekouji_data = new MotoukekoujiData();
 $motoukekouji_data->setId($_id);
 $motoukekouji_data->setAccountId($_SESSION['row']['Id']); // TEST
 $ret = $motoukekouji_data->getMotoukekoujiRecordData();
 $accountid = $motoukekouji_data->AccountId();
 $type = $motoukekouji_data->KoujiType();
 $address = $motoukekouji_data->KoujiAddress();
 $kikan_start = $motoukekouji_data->KoujiKikanStart();
 $kikan_end = $motoukekouji_data->KoujiKikanEnd();
 $kingaku = $motoukekouji_data->KoujiKingaku();
}

$gyosyu_list = array('足場工事業','電気工事業','内装工事業','管工事業','とび・土工・コンクリート工事業','大工工事業','塗装工事業','防水工事業','板金工事業','タイル・れんが・ブロック工事業','左官工事業','鉄筋工事業','屋根工事業','機械器具設置工事業','電気通信工事業','建具工事業','熱絶縁工事業','ガラス工事業','消防設備工事業','美装工事業','解体工事業','造園工事業','外構工事業','型枠工事業','鉄骨工事業');
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
  <link rel="canonical" href="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/motoukekouji_input.php">
  <link rel="alternate" media="handheld" href="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/motoukekouji_input.php">
 
 <meta name="robots" content="all">
 <meta name="copyright" content="Copyright 2020 労働保険事務組合RJC All Rights Reserved.">
 <meta property="og:title" content="<?php echo $title;?>　：　マイページ">
 <meta property="og:type" content="article">
 <meta property="og:url" content="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/motoukekouji_input.php">
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
	
 <form name="form" method="post" action="motoukekouji_regist.php">
  <input type="hidden" name="Id" value="<?php echo $id;?>">
  <input type="hidden" name="AccountId" value="<?php echo $accountid;?>">
  
  <div class="motoukekouji_input_outer">

  <div class="motoukekouji_inputitems">
   
   <div class="motoukekouji_inputitem">
    <span class="motoukekouji_inputitem_title">工事の種類</span>
    <span class="motoukekouji_inputitem_box">
     <select name="kouji_type" class="fixsize_inputitem">
      <option value="">-</option>
      <?php for($i=0;$i<count($gyosyu_list);$i++){ ?>
      <option value="<?php echo $gyosyu_list[$i];?>" <?php if($gyosyu_list[$i] == $type) echo 'selected'; ?>><?php echo $gyosyu_list[$i];?></option>
      <?php } ?>
     </select>
    </span>
   </div>

   <div class="motoukekouji_inputitem">
    <span class="motoukekouji_inputitem_title">現場の住所</span>
    <span class="motoukekouji_inputitem_box">
     <input type="text" name="kouji_address" placeholder="都道府県と市をご記入ください" value="<?php echo $address;?>" class="fixsize_inputitem">
    </span>
   </div>

   <div class="motoukekouji_inputitem">
    <span class="motoukekouji_inputitem_title">工事の期間</span>
    <span class="motoukekouji_inputitem_box inputitem_kikan">
     <input type="date" name="kouji_kikan_start" value="<?php echo $kikan_start;?>">　～　<input type="date" name="kouji_kikan_end" value="<?php echo $kikan_end;?>">
    </span>
   </div>

   <div class="motoukekouji_inputitem">
    <span class="motoukekouji_inputitem_title">工事の請負金額</span>
    <span class="motoukekouji_inputitem_box">
     <input type="tel" name="kouji_kingaku" value="<?php echo $kingaku;?>" class="fixsize_inputitem kingakuitem"> 円（税別）
    </span>
   </div>
   
  </div>

   <input type="submit" name="submit" class="mk_submit_button mk_button" value="登録する">
  </div>
  
 </form>
 
</div>
	
<?php include_once('footer.php'); ?>

</body>
</html>