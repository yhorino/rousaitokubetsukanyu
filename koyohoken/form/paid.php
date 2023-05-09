<?php 
// セッションの開始
ob_start();
session_start();
?>
<?php
$paid = ''.intval($_COOKIE['paid']);
setcookie('paid', '1', 0, '/');
require_once('../../form/function.php');
?>
<!DOCTYPE html>
<html lang="ja">

<head>
<?php include_once  $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_head.html'; ?>

 
  <title>お支払が完了しました：雇用保険の加入申込み 労働保険事務組合RJC　無料見積りフォーム</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="format-detection" content="telephone=no">
 
  <link rel="canonical" href="https://www.xn--y5q0r2lqcz91qdrc.com/koyohoken/form/paid.php">
  <meta name="robots" content="all">
  <meta name="copyright" content="Copyright 2020 労働保険事務組合RJC All Rights Reserved.">
  <meta property="og:title" content="お支払が完了しました：雇用保険の加入申込み 労働保険事務組合RJC　無料見積りフォーム">
  <meta property="og:type" content="article">
  <meta property="og:url" content="https://www.xn--y5q0r2lqcz91qdrc.com/koyohoken/form/paid.php">
  <meta property="og:image" content="https://www.xn--y5q0r2lqcz91qdrc.com/assets/img/logo_jimukumiai-1.png">
  <meta property="og:site_name" content="建設業専門　全国対応　中小事業主の特別加入RJC">
  <meta property="og:description" content="" />
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
  <link rel="icon" href="/favicon.ico">
 
  <!-- CSS-->
  <link rel="stylesheet" href="../../assets/css/reset.css">
  <link rel="stylesheet" href="../../assets/css/common.css">
  <link rel="stylesheet" href="../../assets/css/style.css">
<!--  <link rel="stylesheet" href="../assets/css/style_form.css">-->
  <link rel="stylesheet" href="style_form_new.css">
   <!-- JS-->
  <script src="../../assets/js/app.js"></script>
</head>
<body id="paid_php">
<?php include_once  $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_body.html'; ?>
 
 
 <a href="#main">メインコンテンツに移動</a>

    <header>
      <div class="header__flex">
				<a href="/koyohoken/"><img class="h_logo" src="../../assets/img/logo_jimukumiai-1.png" width="327" alt="" /></a>
      </div>
     
      <div id="flow_image">
      <img src="../../assets/img/form_flow4.png" alt="STEP4 お申込み完了" class="show_pc hide_sp">
      <img src="../../assets/img/form_flow4_sp.png" alt="STEP4 お申込み完了" class="show_sp hide_pc">
      </div>
    </header>
	
  <!-- contents ///////////////////////////////////-->
  <main id="main">
    <section class="mitsumori">
      <h1 class="mitsumori-ttl">お申込み完了</h1>
      <div class="mitsumori-inner">

        <section class="mitsumori-complete">
         <img src="../../assets/img/form_paid.png" alt="お申込みありがとうございます。お申込みのお礼と大切なご案内をさせていただきます。「事務組合RJC」の名前でご登録いただいたアドレスにメールを送信いたしました。３０分以内にメールが届かない場合は、　迷惑メールフォルダに入っていませんか？　間違ったアドレスでお手続きをされていませんか？　上記をご確認の上、GmailまたはYahoo!のアドレスで再度お申込みをお願いします。" class="show_pc hide_sp">
         <img src="../../assets/img/form_paid_sp.png" alt="お申込みありがとうございます。お申込みのお礼と大切なご案内をさせていただきます。「事務組合RJC」の名前でご登録いただいたアドレスにメールを送信いたしました。３０分以内にメールが届かない場合は、　迷惑メールフォルダに入っていませんか？　間違ったアドレスでお手続きをされていませんか？　上記をご確認の上、GmailまたはYahoo!のアドレスで再度お申込みをお願いします。" class="show_sp hide_pc">
          <div class="mitsumori-btn_block">
            <a class="mitsumori-btn" href="/koyohoken/"><img src="../../assets/img/form_totop.png" alt="TOPへ戻る"></a>
          </div>
        </section>

      </div>

    </section>

  </main>

</body>
</html>

<?php error_log('['.date('Y-m-d H:i:s').'] '.'https://www.xn--y5q0r2lqcz91qdrc.com/koyohoken/ paid.php
'.print_r($_SESSION, true).' $paid='.$paid.' order_number='.$_GET['order_number'], 1, 'y_horino+sfdebug@tmgt.co.jp'); ?>

<?php
 if($paid=='0'){
  $ret = sendmail_torimatome($_GET['order_number'], $pref[$_SESSION['pref']]);
 }

function sendmail_torimatome($order_no, $prefno){
 
 $text = '---------------------------------
　※このメールは、労働保険事務組合RJCより自動送信されています。
---------------------------------
'.$_SESSION['kaisyamei'].' 様

■支払い完了案内

このたびはクレジットカード決済をご利用いただき、誠にありがとうございます。
クレジット決済による支払いが完了しましたので、以下の通りご案内いたします。

---------------------------------
オーダー番号：'.$_SESSION['order_no'].'
お支払方法：クレジットカード
お支払総額 : '.number_format($_SESSION['sougaku']).' 円
加入希望月 : '.$_SESSION['kikan'].'月
---------------------------------

後ほど「団体則」「入会に関する確認事項及び誓約書」を添付送信します。
ご確認ください。

---------------------------------
【営業時間について】
営業時間は、月曜日から金曜日（土日祝を除く）9:00から17:30となっております。
時間外のお申込みの場合は、翌営業日以降にご連絡差し上げます。
---------------------------------

ご不明な点・ご質問等がございましたら、下記までご連絡ください。
なお、このメールに心当たりがない、内容が間違っているなどの問題がございましたら、
お手数ですがこのメール内容を添付した形で返信願います。

---------------------------------
厚生労働大臣 愛知労働局認可　
労働保険事務組合RJC

〒486-0945
愛知県春日井市勝川町六丁目140番地　王子不動産勝川ビル2階

TEL:0120-855-865
FAX:0568-27-7556
Mail: mail@rousai.jp
営業時間：月～金 9:00‐17:30（土日祝を除く）

サイトURL: https://www.xn--y5q0r2lqcz91qdrc.com/
---------------------------------
';

 $from = 'mail@rousai.jp';
 $from_name = '労働保険事務組合RJC';
 $to = $_SESSION['mail'];
 $to_name = $_SESSION['kaisyamei'].' 様';
 $title = '☆【クレカ決済完了 雇用保険】 <'.$to_name.'>【事務組合RJC】';
 
  if(isset($_SESSION['kaisyamei']) && $_SESSION['kaisyamei'] != ''){
   sendmail($from, $from_name, $to, $to_name, $title, $text);
   sendmail($from, $from_name, $from, $from_name, $title, $text);
  }
 }
?>