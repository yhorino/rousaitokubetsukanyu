<?php
// セッションの開始
ob_start();
session_start();

// 共通関数のinclude
require_once('common_function.php');

$title="パスワード登録";
//put_log('操作', 'regist_pw.php', $title);
$kaiin_no = $_GET['no'];

$_SESSION['kaiin_no']=$kaiin_no;

setcookie('regist','0');

// 日付関数(date)を(後で)使うのでタイムゾーンの設定
date_default_timezone_set('Asia/Tokyo');

// ユーザ入力情報を保持する配列を準備する
$user_input_data = array();
// エラー情報を保持する配列を準備する
$error_detail = array();

$datum2 = (array)mp_getLogin($_SESSION['kaiin_no']);

$regist = false;
if($datum2['password'] != '' && $datum2['tmp_password'] == ''){
 $regist = true;
}
if (true === $regist) {
 put_log('操作', 'パスワード登録', 'パスワード登録失敗:パスワード登録済');
}

?>
<!DOCTYPE HTML>
<html lang="ja" id="regist_pw_php">
<head>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_head.html'; ?>
 
  <meta charset="UTF-8">
  <?php include_once('settings.php'); ?>
  <title><?php echo $title;?>　：　マイページ</title>
 
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta property="og:title" content="<?php echo $title;?>　：　マイページ">
  <meta property="og:type" content="article">
  <meta property="og:url" content="/mypage/regist_pw.php">
  <meta property="og:image" content="image/">
  <meta property="og:site_name" content="<?php echo $title;?>　：　マイページ">
  <meta property="og:description" content=""> 
  <link rel="canonical" href="/mypage/regist_pw.php">
  <meta name="copyright" content="Copyright© 2020- 労働保険事務組合ＲＪＣ All Rights Reserved.">
  <link rel="icon" href="/favicon.ico">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
  <style type="text/css">
    .error { color: red; }
  </style>
</head>

<body>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_body.html'; ?>

<?php 
 $option_class = 'no_menu no_login';
 include_once('header.php');
 ?>
<?php include_once('pw_toggle.inc'); ?>
 
<?php
 if($regist == true){
  echo '
<div class="inner" id="new">
 <h3>パスワード登録済</h3>
 <p>この仮パスワードで登録済です。</p>
 <div class="input_item">
  <a href="index.php" id="submit_button">ログイン画面へ</a>
 </div>
</div>
  ';
 } else {
  echo '
<div class="inner" id="new">

  <h3>パスワード登録</h3>
  <p>
   マイページ登録する新しいパスワードを入力してください。
  </p>
 
  <form action="./regist_pw_update.php" method="post">
   
   <input type="hidden" name="kaiin_no" value="'.$_SESSION['kaiin_no'].'">
   
   <div class="input_item">
    <table>
    <tr><th>
    <span class="input_label">会員No</span></th><td>'.$_SESSION['kaiin_no'].'</td></tr>
    <tr><th><span class="input_label">仮パスワード</span></th><td><span class="input_password"><input type="password" name="tmppass" value="" required><i class="fa-solid fa-eye pw_input_eyeicon"></i></span></td></tr>
    <tr><th><span class="input_label">新パスワード</span></th><td><span class="input_password"><input type="password" name="newpass" value="" required minlength="8" maxlength="16"><i class="fa-solid fa-eye pw_input_eyeicon"></i></span><br>
    ※ 半角英数字 8～16文字</td></tr>
    </table>
   </div>
';
  
 if ( (isset($_SESSION['output_buffer']['error_invalid_update']))&&(true === $_SESSION['output_buffer']['error_invalid_update']) ) {
    echo '<span class="error">入力したパスワードが一致しません</span>';
  $_SESSION['output_buffer']['error_invalid_update'] = false;
 }
  
 echo '<div class="input_item">
    <button type="submit" id="submit_button">パスワード登録</button>
   </div>
   
  </form>

</div>
	';
 } ?>
 
<?php include_once('footer.php'); ?>
 
</body>
</html>
