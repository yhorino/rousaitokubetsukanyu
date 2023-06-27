<?php
// セッションの開始
ob_start();
session_start();

// 共通関数のinclude
require_once('common_function.php');

if(isset($_COOKIE['regist']) && $_COOKIE['regist'] == 1){

// require_once("bin/sf_Api.php");

$sessionid = session_id();
 
 // SFから取引先データ取得
//  init();
//  sf_login();
 $result = (array)mp_getAccount_kaisya($_SESSION['kaiin_no']);
 $datum = (array)$result['fields'];
 //var_dump($datum);

//  sf_logout();
 
session_id($sessionid);
 
 //$_SESSION['auth']['seirino'] = $seirino;

 /*
 if($_SESSION['regist_email'] == ''){
// if($datum['PersonEmail'] == ''){
   // エラー情報をセッションに入れて持ちまわる
   $_SESSION['output_buffer']['error_no_email'] = true;

   // 入力ページに遷移する
   header('Location: ./regist_pw.php?seirino='.$seirino);
   exit;
 }
 */

 //$datum2 = mp_getLoginData($_SESSION['kaiin_no']);
 
 $from = 'mail@rousai.jp';
 $from_name = '労働保険事務組合RJC';
 $to = $datum['Email__c'];
 $to_name = $datum['Name'];
 $title = '◇マイページ登録完了【事務組合RJC】';
 $text = $to_name.' 様

お世話になっております。
労働保険事務組合RJCをご利用頂き誠にありがとうございます。

マイページの登録が完了しましたので、お知らせいたします。

今後ともよろしくお願い申し上げます。


---------------------------------
【営業時間について】
営業時間は、月曜日から金曜日（土日祝を除く）9:00から17:30となっております。
時間外のお申込みの場合は、翌営業日以降にご連絡差し上げます。
---------------------------------

ご不明な点・ご質問等がございましたら、下記までご連絡ください。
なお、このメールに心当たりがない、内容が間違っているなどの問題がございましたら、
お手数ですがこのメール内容を添付した形で返信願います。

--------------------------------
建設業専門　知らない人はいない
厚生労働大臣 愛知労働局長認可

労働保険事務組合RJC

〒486-0945
愛知県春日井市勝川町6-140　王子不動産勝川ビル2F

TEL: 0120-855-865
FAX: 0568-27-7556
Mail: mail@rousai.jp
営業時間: 月～金 9:00‐17:30（土日祝を除く）

サイトURL:
https://www.xn--y5q0r2lqcz91qdrc.com/

---------------------------------
 ';

 sendmail($from, $from_name, $to, $to_name, $title, $text);
}

setcookie('regist','0');

// (二重に出力しないように)セッション内の「出力用情報」を削除する
unset($_SESSION['output_buffer']);
$title="パスワード登録完了";
//put_log('操作', 'regist_pw_done.php', $title);

?>
<!DOCTYPE HTML>
<html lang="ja" id="regist_pw_done_php">
<head>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_head.html'; ?>
 
  <meta charset="UTF-8">
  <?php include_once('settings.php'); ?>
  <title><?php echo $title;?>　：　マイページ</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta property="og:title" content="<?php echo $title;?>　：　マイページ">
  <meta property="og:type" content="article">
  <meta property="og:url" content="/mypage/regist_pw_done.php">
  <meta property="og:image" content="image/">
  <meta property="og:site_name" content="<?php echo $title;?>　：　マイページ">
  <meta property="og:description" content=""> 
  <link rel="canonical" href="/mypage/regist_pw_done.php">
  <meta name="copyright" content="Copyright© 2020- 労働保険事務組合ＲＪＣ All Rights Reserved.">
  <link rel="icon" href="/favicon.ico">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
 
  <style type="text/css">
    .error { color: red; }
  </style>
</head>

<body>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_body.html'; ?>
 
<?php include_once('header.php'); ?>
	
<div class="inner">

 <form>
 <div class="input_item">
 <p>
  パスワードを登録しました
 </p>
 </div>
 
 <div class="input_item">
  <a href="index.php" id="submit_button">ログイン画面へ</a>
 </div>
 </form>
 
</div>
	
<?php include_once('footer.php'); ?>
 
 
</body>
</html>
