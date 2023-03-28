<?php
session_start();
header("Content-type: text/html;charset=utf-8");
require_once('../form/function.php');

/* reCAPTCHA */
$RECAPTUER = "6LfFcX8jAAAAACLG1rc01eTFV_D_I4KSYZ8zoqNq";

$message = null;

if (isset($_REQUEST["recaptchaToken"]) == true)	/* 送信ボタンが押された ? */
{
	/** トークンチェック */
	$token = $_REQUEST["recaptchaToken"];

	if (token_chk($token) == true)	/* トークンチェックOK */
	{
	}
	else
	{
		header('Location: siryo_seikyu_error.html');
  exit();
	}
}

function token_chk($token)
{
	global $RECAPTUER;

	/** ステータス初期化 */
	$sts = false;

	$result = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=${RECAPTUER}&response=${token}");
	$chk = json_decode($result);

	if ($chk->success == true && $chk->score >= 0.7)	/* トークンエラー */
	{
		$sts = true;
	}

	/** 処理終了 */
	return $sts;
}
/* reCAPTCHA */


// 各ページから遷移したときに全てのPOST項目をSESSIONに保存する
   $params = array('kaisyamei','tantousyamei','tantousyamei_furi','tel','mail','pref','kento_nyusya','kento_taisyoku','kento_kanyu');
   // データを取得する ＋ 必須入力のvalidate
   foreach($params as $p) {
       if(isset($_POST[$p])){
        $_SESSION[$p] = (string)@htmlspecialchars($_POST[$p], ENT_QUOTES);
       } else {
        unset($_SESSION[$p]);
       }
   }

  $kento = '';
  $kento_url = '';
  if($_SESSION['kento_nyusya']==1){
   $kento .= '入社手続き ';
   $kento_url .= '【雇用保険　入社手続き】 
https://www.xn--y5q0r2lqcz91qdrc.com/koyohoken/leaflet/koyo_nyusya.pdf

';
  }
  if($_SESSION['kento_taisyoku']==1){
   $kento .= '退職手続き ';
   $kento_url .= '【雇用保険　退職手続き】 
https://www.xn--y5q0r2lqcz91qdrc.com/koyohoken/leaflet/koyo_taisyoku.pdf

';
  }
  if($_SESSION['kento_kanyu']==1){
   $kento .= '特別加入 ';
   $kento_url .= '【中小事業主の特別加入】 
https://www.xn--y5q0r2lqcz91qdrc.com/

';
  }

  $from = 'mail@rousai.jp';
  $from_name = '労働保険事務組合RJC';
  $to = $_SESSION['mail'];
  $to_name = $_SESSION['kaisyamei'];
  $title = '☆5-'.$pref[$_SESSION['pref']].'<'.$to_name.' 様>資料請求ありがとうございます【事務組合RJC】';
  $text = $to_name.' 様

このたびは労働保険事務組合RJCへ資料請求いただき、誠にありがとうございます。

以下リンクをクリックいただくと、それぞれの資料をご覧いただけます。ぜひお役立てください。

'.$kento_url.'
---------------------------------

【お客様情報】
会社名：'.$_SESSION['kaisyamei'].'
ご担当者名：'.$_SESSION['tantousyamei'].'
ご担当者フリガナ：'.$_SESSION['tantousyamei_furi'].'
電話番号：'.$_SESSION['tel'].'
メールアドレス：'.$_SESSION['mail'].'
お住まいの都道府県：'.$_SESSION['pref'].'
今回検討していること：'.$kento.'

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
   
  sendmail($from, $from_name, $to, $to_name, $title, $text);
  sendmail($from, $from_name, $from, $from_name, $title, $text);
  
		header('Location: siryo_seikyu_done.html');
  exit;

?>
