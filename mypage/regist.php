<?php
// セッションの開始
ob_start();
session_start();

// 共通関数のinclude
require_once('common_function.php');

// セッションに入っている情報を確認する
//var_dump($_SESSION);

// セッション内に「エラー情報のフラグ」が入っていたら取り出す
$view_data = array();
if (true === isset($_SESSION['output_buffer'])) {
    $view_data = $_SESSION['output_buffer'];
}
// 確認
//var_dump($view_data);

// (二重に出力しないように)セッション内の「出力用情報」を削除する
unset($_SESSION['output_buffer']);
$title="マイページ登録";
//put_log('操作', 'regist.php', $title);

setcookie('regist','1');
?>
<!DOCTYPE HTML>
<html lang="ja" id="regist_php">
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
  <link rel="canonical" href="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/regist.php">
  <link rel="alternate" media="handheld" href="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/regist.php">
 
 <meta name="robots" content="all">
 <meta name="copyright" content="Copyright 2020 労働保険事務組合RJC All Rights Reserved.">
 <meta property="og:title" content="<?php echo $title;?>　：　マイページ">
 <meta property="og:type" content="article">
 <meta property="og:url" content="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/regist.php">
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
  <p>
   入力いただいたメールアドレスへマイページ登録に必要な「仮パスワード」を記載したメールを送信します。
  </p>
 
  <form action="./regist_mail.php" method="post">

<?php if ( (isset($view_data['error']))&&(true === $view_data['error']) ) : ?>
<!--    <span class="error">入力内容に誤りがあります<br></span>-->
    <span class="error"><?php echo $_SESSION['error_msg'];?><br></span>
<?php endif; ?>
   <div class="input_item">
    <span class="input_label">会員No</span><input type="text" name="kaiin_no" value="<?php echo $_SESSION['regist_kaiin_no'];?>" required placeholder="99A99999">
   </div>

   <div class="input_item">
    <span class="input_label">会社電話番号</span><input type="tel" name="kaisya_tel" required placeholder="0311112222">
   </div>

   <div class="input_item">
    <span class="input_label">メールアドレス</span><input type="email" name="email" value="<?php echo $_SESSION['regist_email'];?>" required placeholder="mail@rousai.jp">
   </div>
   
   <div class="input_item">
    <button type="submit" id="submit_button">送信</button>
   </div>
  </form>

  <div id="word_info">
  <ul>
   <li><strong>会員No</strong><br>労働保険事務組合RJCが発行した８桁の番号です。<br>会員カードまたは加入手続き完了のお知らせメールに記載されています。<br>会員Noがわからない場合は「<a href="tel:0120855865">0120-855-865</a>」までお問合せください。</li>
   <li><strong>会社電話番号</strong><br>お申込み時に入力いただいた会社電話番号です。</li>
   <li><strong>メールアドレス</strong><br>マイページ登録に関するメールを送信するメールアドレスです。<br>お申込み時に入力いただいたメールアドレス以外のものもご利用いただけます。</li>
  </ul>
 </div>

 
</div>
	
<?php include_once('footer.php'); ?>
 
</body>
</html>
