<?php
// セッションの開始
ob_start();
session_start();

header("Content-type: text/html;charset=utf-8");
require_once('function.php');
?>

<!DOCTYPE html>
<html lang="ja">

<head>
<?php $TOP_PATH = '../../';?>
<?php include_once  $TOP_PATH.'template_php/gtag_head.html'; ?>
 
 
  <title>セッション切れ：労働保険事務組合RJC　無料見積りフォーム</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="format-detection" content="telephone=no">
 
  <link rel="canonical" href="https://www.xn--4gqprf2ac7ft97aryo6r5b3ov.tokyo/chusho-jigyonushi/form_norikae/session_out.php">
  <meta name="robots" content="all">
  <meta name="copyright" content="Copyright 2020 労働保険事務組合RJC All Rights Reserved.">
  <meta property="og:title" content="セッション切れ：労働保険事務組合RJC　無料見積りフォーム">
  <meta property="og:type" content="article">
  <meta property="og:url" content="https://www.xn--4gqprf2ac7ft97aryo6r5b3ov.tokyo/chusho-jigyonushi/form_norikae/session_out.php">
  <meta property="og:image" content="https://www.xn--4gqprf2ac7ft97aryo6r5b3ov.tokyo/chusho-jigyonushi/assets/img/h_logo.png">
  <meta property="og:site_name" content="建設業専門　全国対応　中小事業主の特別加入RJC">
  <meta property="og:description" content="" />
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
  <link rel="icon" href="/favicon.ico">
 
  <!-- CSS-->
  <link rel="stylesheet" href="../assets/css/reset.css">
  <link rel="stylesheet" href="../assets/css/common.css">
  <link rel="stylesheet" href="../assets/css/style.css">
<!--  <link rel="stylesheet" href="../assets/css/style_form.css">-->
  <link rel="stylesheet" href="style_form_new.css">
  <!-- JS-->
  <script src="../assets/js/app.js"></script>

</head>
<body id="regist_done_php">
<?php include_once  $TOP_PATH.'template_php/gtag_body.html'; ?>
 
 
 <a href="#main">メインコンテンツに移動</a>
	
    <header>
      <div class="header__flex">
				<a href="/"><img class="h_logo" src="../assets/img/h_logo.png" width="327" alt="" /></a>
      </div>
    </header>
	
 <div id="mainbody">
  <main id="main">
   
   <h1 class="mitsumori-ttl">ブラウザセッションが時間切れになりました</h1>
   <p>個人情報を保護するために、15分間何の操作もされなかった場合、<br>
   ブラウザセッションはタイムアウトします。</p>
   <p>もう一度、メールに記載したURLをクリックして、申込みを行ってください。</p>
 
 </main>
</div>

</body>
</html>