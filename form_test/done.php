<?php 
// セッションの開始
ob_start();
session_start();

// 20220314 完了画面に来たらタイムアウト状態にする
// 確認画面に戻って再申込みできないようにするため
$_SESSION['idle_time'] = time();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
<?php include_once  $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_head.html'; ?>

 
  <title>お申込みを受付けました：労働保険事務組合RJC　無料見積りフォーム</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="format-detection" content="telephone=no">
 
  <link rel="canonical" href="https://www.xn--y5q0r2lqcz91qdrc.com/form/done.php">
  <meta name="robots" content="all">
  <meta name="copyright" content="Copyright 2020 労働保険事務組合RJC All Rights Reserved.">
  <meta property="og:title" content="お申込みを受付けました：労働保険事務組合RJC　無料見積りフォーム">
  <meta property="og:type" content="article">
  <meta property="og:url" content="https://www.xn--y5q0r2lqcz91qdrc.com/form/done.php">
  <meta property="og:image" content="https://www.xn--y5q0r2lqcz91qdrc.com/assets/img/logo_jimukumiai-1.png">
  <meta property="og:site_name" content="建設業専門　全国対応　中小事業主の特別加入RJC">
  <meta property="og:description" content="" />
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
  <link rel="icon" href="/favicon.ico">
 
  <!-- CSS-->
  <link rel="stylesheet" href="../assets/css/reset.css">
  <link rel="stylesheet" href="../assets/css/common.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="style_form_new.css">
   <!-- JS-->
  <script src="../assets/js/app.js"></script>
 
  <script src="https://kit.fontawesome.com/a366e23f99.js" crossorigin="anonymous"></script>
 
</head>
<body id="done_php">
<?php include_once  $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_body.html'; ?>
 
    <header>
      <div class="header__flex">
				<a href="/"><img class="h_logo" src="../assets/img/logo_jimukumiai-1.png" width="327" alt="" /></a>
      </div>
     
<?php
 if($_SESSION['shiharai']=='銀行振込'){ ?>
   <div id="flow_image">
   <img src="../assets/img/form_flow4.png" alt="STEP4 お申込み完了" class="show_pc hide_sp">
   <img src="../assets/img/form_flow4_sp.png" alt="STEP4 お申込み完了" class="show_sp hide_pc">
   </div>
<?php } ?>
     
    </header>
	
  <!-- contents ///////////////////////////////////-->
  <main id="main">
      <section class="mitsumori">
<?php
if($_SESSION['shiharai']=='クレジットカード'){ ?>
<?php include_once $_SERVER["DOCUMENT_ROOT"].'/pg_setting.php'; ?>
  <?php 
  $payment_detail = '中小事業主の特別加入';
  $payment_detail_kana = 'ﾁｭｳｼｮｳｼﾞｷﾞｮｳﾇｼﾉﾄｸﾍﾞﾂｶﾆｭｳ';
  $return_url = 'https://'.$_SERVER['HTTP_HOST'].'/form/paid.php';
  $stop_return_url = 'https://'.$_SERVER['HTTP_HOST'].'/form/done.php';

  // DEBUG
  if(isset($_GET['customer_id'])){
   $customer_id=$_GET['customer_id'];
  }
  // DEBUG
  
  $hash = pg_hash($trading_id, $payment_type, $fix_params, $id, $seq_merchant_id, $payment_term_day, $payment_term_min, $payment_class, $use_card_conf_number, $customer_id, $threedsecure_ryaku);
 ?>
<div id="form_flow_php" class="1">
 
<?php include $_SERVER["DOCUMENT_ROOT"].'/pg_param_html.php'; ?>

   <p style="color: #f00;font-weight: bold; margin: 1em auto; font-weight: bold; background-color: #eee; padding: 1em; text-align:center;">加入申込みはまだ完了しておりません。クレジットカード決済画面へお進みください。
     <input type="submit" id="submit" name="submit" value="カード決済画面へ" class="submit_card">
   </p>
   <p>※ 「カード決済画面へ」ボタンをクリックすると、外部サイトのページ（ペイジェント決済画面）へ移動します。</p>
   <p style="padding: 20px;">
   カード決済は、クレジットカード決済代行の<span style="text-decoration: underline;">ペイジェント株式会社</span>の決済代行サービスを利用しております。<br>
   安心してお支払いをしていただくために、お客様の情報がペイジェントサイト経由で送信される際にはSSL(128bit)による暗号化通信で行い、クレジットカード情報は当サイトでは保有せず、同社で厳重に管理しております。</p>
  </form>

</div>
<?php } else { ?>
  <h1 class="mitsumori-ttl">お申込みを受付しました</h1>
  <div class="mitsumori-inner">
  <section class="mitsumori-complete">
   <img src="../assets/img/form_paid.png" alt="お申込みありがとうございます。お申込みのお礼と大切なご案内をさせていただきます。「事務組合RJC」の名前でご登録いただいたアドレスにメールを送信いたしました。３０分以内にメールが届かない場合は、　迷惑メールフォルダに入っていませんか？　間違ったアドレスでお手続きをされていませんか？　上記をご確認の上、GmailまたはYahoo!のアドレスで再度お申込みをお願いします。" class="show_pc hide_sp">
   <img src="../assets/img/form_paid_sp.png" alt="お申込みありがとうございます。お申込みのお礼と大切なご案内をさせていただきます。「事務組合RJC」の名前でご登録いただいたアドレスにメールを送信いたしました。３０分以内にメールが届かない場合は、　迷惑メールフォルダに入っていませんか？　間違ったアドレスでお手続きをされていませんか？　上記をご確認の上、GmailまたはYahoo!のアドレスで再度お申込みをお願いします。" class="show_sp hide_pc">
   <?php /*
    <div class="mitsumori-btn_block">
      <a class="mitsumori-btn" href="/"><img src="../assets/img/form_totop.png" alt="TOPへ戻る"></a>
    </div>
*/ ?>
   <div class="tel_button_box">
    <a href="tel:0120855865" class="kv_button kv_button_red">0120-855-865 へ電話する</a>
   </div>
   
  </section>
  </div>
        
<?php } ?>
         
     </section>
     
  </main>

</body>
</html>