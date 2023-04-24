<?php

// セッションの開始
ob_start();
session_start();

require_once('common_function.php');
$title="マイページ　セッション切れ";

// セッションの認証情報を削除
unset($_SESSION['auth']);
session_destroy();

// 非ログインTopPageに遷移
//header('Location: /');

?>
<!DOCTYPE HTML>
<html lang="ja" id="logout_php">
<head>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_head.html'; ?>
 
  <meta charset="UTF-8">
  <?php include_once('settings.php'); ?>
  <title><?php echo $title;?>　：　マイページ</title>
  <style type="text/css">
    .error { color: red; }
  </style>
 
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width">
  <meta name="description" content="">
  <link rel="canonical" href="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/session_out.php">
  <link rel="alternate" media="handheld" href="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/session_out.php">
 
 <meta name="robots" content="all">
 <meta name="copyright" content="Copyright 2020 労働保険事務組合RJC All Rights Reserved.">
 <meta property="og:title" content="<?php echo $title;?>　：　マイページ">
 <meta property="og:type" content="article">
 <meta property="og:url" content="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/session_out.php">
 <meta property="og:image" content="/assets/img/m_zenekon.png">
 <meta property="og:site_name" content="中小事業主の特別加入RJC">
 <meta property="og:description" content=""> 
 <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
 <link rel="icon" href="/favicon.ico">
 
</head>

<body>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_body.html'; ?>
 
 <?php include_once('header.php'); ?>
 
 <div class="inner">
  <form action="index.php" method="post">
   <h1>ブラウザセッションが時間切れになりました</h1>
   <p>個人情報を保護するために、15分間何の操作もされなかった場合、<br>
   ブラウザセッションはタイムアウトします。</p>
   <div class="input_item">
    <button type="submit" id="submit_button" style="font-size: 20px;">マイページ　トップへ</button>
   </div>

  </form>
 </div>

<?php include_once('footer.php'); ?>

</body>
</html>