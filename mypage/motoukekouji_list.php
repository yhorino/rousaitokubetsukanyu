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
	
 <div class="button_box">
  <?php if($motoukekouji_array_data->MotoukekoujiDataNum() > 0){ ?>
  <a class="button_print mk_button" onclick="window.print();">チェックした工事を印刷</a>
  <?php } ?>
 </div>
 
 <?php if($motoukekouji_array_data->MotoukekoujiDataNum() > 0){ ?>
 <div class="motoukekouji_table_outer">
 <table class="motoukekouji_table">
  <tr>
   <th class="th_print noprint">印刷</th>
   <th class="th_kikan">工事の期間</th>
   <th class="th_type">工事の種類</th>
   <th class="th_address">現場の住所</th>
   <th class="th_kingaku">請負金額（税別）</th>
   <th class="th_hokenryo">労災保険料</th>
   <th class="th_edit noprint">登録情報</th>
  </tr>
  <?php for($i=0;$i<$motoukekouji_array_data->MotoukekoujiDataNum();$i++){ ?>
  <tr class="noprint">
   <td class="print_checkbox_td noprint"><input type="checkbox" name="print<?php echo $i;?>" class="print_checkbox"></td>
   <td><?php echo $motoukekouji_array_data->MotoukekoujiData($i)->KoujiKikan();?></td>
   <td><?php echo $motoukekouji_array_data->MotoukekoujiData($i)->KoujiType();?><br><?php echo $motoukekouji_array_data->MotoukekoujiData($i)->KoujiSubType();?></td>
   <td><?php echo $motoukekouji_array_data->MotoukekoujiData($i)->KoujiAddress();?></td>
   <td class="number_td"><?php echo number_format($motoukekouji_array_data->MotoukekoujiData($i)->KoujiKingaku()).' 円';?></td>
   <td class="number_td"><?php if(intval($motoukekouji_array_data->MotoukekoujiData($i)->KoujiHokenryo())<=0){echo '- 対象外 -';} else {echo number_format($motoukekouji_array_data->MotoukekoujiData($i)->KoujiHokenryo()).' 円';}?></td>
   <td class="edit_button_td noprint"><a href="motoukekouji_input.php?id=<?php echo $motoukekouji_array_data->MotoukekoujiData($i)->Id();?>" class="edit_button mk_button">変更する</a></td>
  </tr>
  <?php } ?>
 </table>
 </div>
 <?php } else { ?>
 <p class="nodata">
  現在登録されている元請け工事はございません。<br>新規登録ボタンから登録をお願いします。
 </p>
 <?php } ?>
 
 <div class="button_box button_box_bottom">
  <a href="motoukekouji_input.php" class="button_new mk_button">+ 工事を追加</a>
 </div>
 
</div>
	
<?php include_once('footer.php'); ?>

</body>
</html>

<script>
 $(function () {
   $('.print_checkbox').on('change', function () {
     // チェックボックスのON/OFFによってprintクラスを制御
     const row = $(this).closest('tr');
     if ($(this).prop('checked')) {
       row.removeClass('noprint');
     } else {
       row.addClass('noprint');
     }
   });
 });
</script>