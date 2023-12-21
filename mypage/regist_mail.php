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

 require_once("bin/sf_Api.php");

$sessionid = session_id();
 
 // SFから取引先データ取得
  init();
  sf_login();
 if(isset($_POST['kaiin_no'])){
  $_SESSION['regist_kaiin_no'] = convertto_haneisu($_POST['kaiin_no']);
 }
 if(isset($_POST['email'])){
  $_SESSION['regist_email'] = convertto_haneisu($_POST['email']);
 }
//var_dump($_SESSION);
// $result = (array)mp_getAccount($_SESSION['regist_seirino']);
 $datum = null;
 if(isset($_SESSION['regist_kaiin_no']) && $_SESSION['regist_kaiin_no'] != ''){
  $result = (array)mp_getAccount_kaisya($_SESSION['regist_kaiin_no']);
  $datum = (array)$result['fields'];
 //var_dump($datum);
 }
  sf_logout();

//var_dump($datum);
if ( !((isset($view_data['error_invalid_update']))&&(true === $view_data['error_invalid_update'])) ){
 
//var_dump($_COOKIE['regist']);
if(isset($_COOKIE['regist']) && $_COOKIE['regist'] == 1){

$sf_phone = str_replace('-', '', $datum['Phone']);
$in_phone = str_replace('-', '', $_POST['kaisya_tel']);
if(($datum['Name'] != '') && ($sf_phone == $in_phone)){
  session_id($sessionid);

  //$_SESSION['auth']['seirino'] = $_SESSION['regist_seirino'];

  /* 20200910 メールアドレス登録なしでも送信はする　RJC側確認のため
  if($datum['PersonEmail'] == ''){
    // エラー情報をセッションに入れて持ちまわる
    $_SESSION['output_buffer']['error_no_email'] = true;

    // 入力ページに遷移する
    header('Location: ./regist.php');
    exit;
  }
  */

  $tmppass = date('si'); // 秒分4桁
  $r = mp_settmpPW($datum['jimuKaiinNo__c'], $tmppass);

// var_dump($inner_id);
  $from = 'mail@rousai.jp';
  $from_name = '労働保険事務組合RJC';
  //$to = 'y_horino@tmgt.co.jp'; // debug
  //$to_name = '堀野義博'; // debug
  $to = $datum['Email__c'];
  $to_name = $datum['Name'];
  $title = '◇【マイページ】パスワード登録案内【事務組合RJC】';
  $text = $to_name.' 様

  下記の仮パスワードをパスワード登録画面に入力して、新しいパスワードを登録してください。

   仮パスワード　：　'.$tmppass.'
   
  パスワード登録画面はこちらから
  https://'.$_SERVER['HTTP_HOST'].'/mypage/regist_pw.php?no='.$_SESSION['regist_kaiin_no'].'
  
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

  if(isset($_POST['email']) && $_POST['email'] != ''){
   sendmail($from, $from_name, $_POST['email'], $to_name, $title, $text);
  }
 
/* $text .= '
 mail: '.$_POST['email'];*/
  sendmail($from, $from_name, $from, $from_name, $title, $text);
 } else {
   $_SESSION['output_buffer']['error'] = true;
//put_log('操作', 'regist_mail.php', 'パスワード登録失敗');
   $_SESSION['error_msg'] = '入力内容に誤りがあります。';

   // 入力ページに遷移する
   header('Location: ./regist.php');
   exit;
 
 }
}

 /*
 if($datum['PersonEmail'] == ''){
   // エラー情報をセッションに入れて持ちまわる
   $_SESSION['output_buffer']['error_no_email'] = true;
put_log('操作', 'regist_pw.php', 'パスワード登録　アドレスなし');

   // 入力ページに遷移する
   header('Location: ./regist.php');
   exit;
 }
 */
 
}

// (二重に出力しないように)セッション内の「出力用情報」を削除する
unset($_SESSION['output_buffer']);
$title="パスワード登録";
//put_log('操作', 'regist_pw.php', $title);

setcookie('regist','0');
?>
<!DOCTYPE HTML>
<html lang="ja" id="regist_mail_php">
<head>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_head.html'; ?>
 
  <meta charset="UTF-8">
  <?php include_once('settings.php'); ?>
  <title><?php echo $title;?>　：　マイページ</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta property="og:title" content="<?php echo $title;?>　：　マイページ">
  <meta property="og:type" content="article">
  <meta property="og:url" content="/mypage/regist_mail.php">
  <meta property="og:image" content="image/">
  <meta property="og:site_name" content="<?php echo $title;?>　：　マイページ">
  <meta property="og:description" content=""> 
  <link rel="canonical" href="/mypage/regist_mail.php">
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
	
<div class="inner" id="body_inner">

 <h1>仮パスワードを送信しました</h1>
  <p>
   <!--登録済みのメールアドレスへ-->入力いただいたメールアドレス宛てに、本登録を行うための仮パスワードとURLをメール送信しました。<br>
   メールのURLより本登録画面へ進んでいただき、マイページの本登録をしてください。
  </p>
 
 <div id="word_info" style="margin: 0 auto; width: 97%;">
  <p><b>・仮パスワードが記載されたメールが届かない場合</b><br>
① 「迷惑メールフォルダ」をご確認ください。<br>
【Gmailの場合】<br><br>
<a href="image/gmail.png">＜説明図＞</a><br><br>
<a href="https://support.google.com/mail/answer/1366858?co=GENIE.Platform%3DiOS&hl=ja">詳しくはこちら<br>【迷惑メールのマークを外す】</a><br>
<br>
【Yahooメールの場合】<br>
<a href="https://support.yahoo-net.jp/PccMail/s/article/H000011502">詳しくはこちら<br>【「迷惑メールでない」と報告する】</a><br>
<br>
② 迷惑メールフォルダにも届いていない場合は、「<a href="/mail_setting.html" >こちらのページ</a>」をご覧ください。</p>
 </div>


</div>
	
<?php include_once('footer.php'); ?>
 
</body>
</html>
