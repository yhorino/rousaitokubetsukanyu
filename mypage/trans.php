<?php
session_start();
header("Content-type: text/html;charset=utf-8");
require_once('common_function.php');

switch($_POST['pagename']){
 case 'kaisya.php':
 {
  session_write_close();
  header('Location: kaisya_edit.php');
  exit;
  break;
 }
 case 'kaisya_edit.php':
 {
  $_SESSION['kaisya_name'] = $_POST['kaisya_name'];
  $_SESSION['kaisya_zip'] = $_POST['kaisya_zip'];
  $_SESSION['kaisya_address'] = $_POST['kaisya_address'];
  $_SESSION['kaisya_tel'] = $_POST['kaisya_tel'];
  $_SESSION['kaisya_fax'] = $_POST['kaisya_fax'];
  $_SESSION['kaisya_daihyosya_name'] = $_POST['kaisya_daihyosya_name'];
  $_SESSION['kaisya_daihyosya_tel'] = $_POST['kaisya_daihyosya_tel'];
  $_SESSION['kaisya_no'] = $_POST['kaisya_no'];
  $_SESSION['kaisya_email'] = $_POST['kaisya_email'];

  session_write_close();
  header('Location: kaisya_check.php');
  exit;
  break;
 }
 case 'kaisya_check.php':
 {
  mp_sendmail($_POST);
  session_write_close();
  header('Location: kaisya_done.php');
  exit;
  break;
 }
 case 'kaisya_done.php':
 {
  session_write_close();
  header('Location: top.php');
  exit;
  break;
 }
	default:
	{
		echo '不明なページからのアクセスです';
  exit();
		break;
	}
}

function mp_sendmail($items){
 
 $kaisya_name = '';
 if($items['kaisya_name'] != $_SESSION['bk']['Name']){
  $kaisya_name = '会社名：'.$_SESSION['bk']['Name'].'　→　'.$items['kaisya_name'].'
';
 }
 $kaisya_zip = '';
 if($items['kaisya_zip'] != $_SESSION['bk']['BillingPostalCode']){
  $kaisya_zip = '郵便番号：'.$_SESSION['bk']['BillingPostalCode'].'　→　'.$items['kaisya_zip'].'
';
 }
 $kaisya_address = '';
 if($items['kaisya_address'] != $_SESSION['bk']['BillingState'].$_SESSION['bk']['BillingCity'].$_SESSION['bk']['BillingStreet']){
  $kaisya_address = '住所：'.$_SESSION['bk']['BillingState'].$_SESSION['bk']['BillingCity'].$_SESSION['bk']['BillingStreet'].'　→　'.$items['kaisya_address'].'
';
 }
 $kaisya_tel = '';
 if($items['kaisya_tel'] != $_SESSION['bk']['Phone']){
  $kaisya_tel = '電話番号：'.$_SESSION['bk']['Phone'].'　→　'.$items['kaisya_tel'].'
';
 }
 $kaisya_fax = '';
 if($items['kaisya_fax'] != $_SESSION['bk']['Fax']){
  $kaisya_fax = 'FAX番号：'.$_SESSION['bk']['Fax'].'　→　'.$items['kaisya_fax'].'
';
 }
 $kaisya_daihyosya_name = '';
 if($items['kaisya_daihyosya_name'] != $_SESSION['bk']['Daihyosya__c']){
  $kaisya_daihyosya_name = '代表者名：'.$_SESSION['bk']['Daihyosya__c'].'　→　'.$items['kaisya_daihyosya_name'].'
';
 }
 $kaisya_daihyosya_tel = '';
 if($items['kaisya_daihyosya_tel'] != $_SESSION['bk']['DaijyoKeitai__c']){
  $kaisya_daihyosya_tel = '代表者連絡先：'.$_SESSION['bk']['DaijyoKeitai__c'].'　→　'.$items['kaisya_daihyosya_tel'].'
';
 }
 /*
 $kaisya_no = '';
 if($items['kaisya_no'] != $_SESSION['bk']['HoujinBangou__c']){
  $kaisya_no = '法人番号：'.$_SESSION['bk']['HoujinBangou__c'].'　→　'.$items['kaisya_no'].'
';
 }
 */
 $kaisya_email = '';
 if($items['kaisya_email'] != $_SESSION['bk']['Email__c']){
  $kaisya_email = 'メールアドレス：'.$_SESSION['bk']['Email__c'].'　→　'.$items['kaisya_email'].'
';
 }

 $text = '---------------------------------
　※このメールは、労働保険事務組合RJCより自動送信されています。
---------------------------------
'.$items['kaisya_name'].'　様

■登録情報変更申込を受付いたしました

平素は労働保険事務組合RJCをご愛顧いただき、誠にありがとうございます。
'.$items['kaisya_name'].' 様から下記の通り登録情報変更申込を受付いたしました。

【変更点】
□-------------------------------
'.$kaisya_name.$kaisya_zip.$kaisya_address.$kaisya_tel.$kaisya_fax.$kaisya_daihyosya_name.$kaisya_daihyosya_tel.$kaisya_no.$kaisya_email.'
□-------------------------------

内容確認のうえ、登録情報の変更をいたします。
変更が完了いたしましたら、メールにて '.$items['kaisya_name'].' 様へご連絡いたします。

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

 $from = 'mail@rousai.jp';
 $from_name = '労働保険事務組合RJC';
 $to = $items['kaisya_email'];
 $to_name = str_replace("　","", $items['kaisya_name']);
 $code = '';
// $code = $_SESSION['row']['PrefectureCodeNew__c'].'-'.$_SESSION['row']['PrefCode__c'];
 $title = '◇'.$to_name.'様からの登録情報変更申込を受付いたしました';
 
 sendmail($from, $from_name, $to, $to_name, $title, $text);
 sendmail($from, $from_name, $from, $from_name, $title, $text);

}

function mp_sendmail_toRJC($items){

 $kaisya_name = '';
 if($items['kaisya_name'] != $_SESSION['kaisya_name']){
  $kaisya_name = '会社名：'.$_SESSION['kaisya_name'].'　→　'.$items['kaisya_name'].'
';
 }
 $kaisya_zip = '';
 if($items['kaisya_zip'] != $_SESSION['kaisya_zip']){
  $kaisya_zip = '郵便番号：'.$_SESSION['kaisya_zip'].'　→　'.$items['kaisya_zip'].'
';
 }
 $kaisya_address = '';
 if($items['kaisya_address'] != $_SESSION['kaisya_address']){
  $kaisya_address = '住所：'.$_SESSION['kaisya_address'].'　→　'.$items['kaisya_address'].'
';
 }
 $kaisya_tel = '';
 if($items['kaisya_tel'] != $_SESSION['kaisya_tel']){
  $kaisya_tel = '電話番号：'.$_SESSION['kaisya_tel'].'　→　'.$items['kaisya_tel'].'
';
 }
 $kaisya_fax = '';
 if($items['kaisya_fax'] != $_SESSION['kaisya_fax']){
  $kaisya_fax = 'FAX番号：'.$_SESSION['kaisya_fax'].'　→　'.$items['kaisya_fax'].'
';
 }
 $kaisya_daihyosya_name = '';
 if($items['kaisya_daihyosya_name'] != $_SESSION['kaisya_daihyosya_name']){
  $kaisya_daihyosya_name = '代表者名：'.$_SESSION['kaisya_daihyosya_name'].'　→　'.$items['kaisya_daihyosya_name'].'
';
 }
 $kaisya_daihyosya_tel = '';
 if($items['kaisya_daihyosya_tel'] != $_SESSION['kaisya_daihyosya_tel']){
  $kaisya_daihyosya_tel = '代表者連絡先：'.$_SESSION['kaisya_daihyosya_tel'].'　→　'.$items['kaisya_daihyosya_tel'].'
';
 }
 /*
 $kaisya_no = '';
 if($items['kaisya_no'] != $_SESSION['kaisya_no']){
  $kaisya_no = '法人番号：'.$_SESSION['kaisya_no'].'　→　'.$items['kaisya_no'].'
';
 }
 */
 $kaisya_email = '';
 if($items['kaisya_email'] != $_SESSION['kaisya_email']){
  $kaisya_email = 'メールアドレス：'.$_SESSION['kaisya_email'].'　→　'.$items['kaisya_email'].'
';
 }

 $text = $items['kaisya_name'].'　様

【変更点】
□-------------------------------
'.$kaisya_name.$kaisya_zip.$kaisya_address.$kaisya_tel.$kaisya_fax.$kaisya_daihyosya_name.$kaisya_daihyosya_tel.$kaisya_no.$kaisya_email.'
□-------------------------------

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

 $from = 'mail@rousai.jp';
 $from_name = '労働保険事務組合RJC';
 $to = $from;
 $to_name = $from_name;
 $name =  str_replace("　","", $items['kaisya_name']);
 $code = '';
// $code = $_SESSION['row']['PrefectureCodeNew__c'].'-'.$_SESSION['row']['PrefCode__c'];
 $title = '◇'.$name.'様　登録情報変更申込';
// $title = '☆'.$code.$name.'様　登録情報変更申込';
 
 sendmail($from, $from_name, $to, $to_name, $title, $text);

}

?>
