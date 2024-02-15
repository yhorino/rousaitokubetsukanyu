<?php
session_start();
header("Content-type: text/html;charset=utf-8");

include_once('./motoukekouji_class.php');
$_id = $_SESSION['row']['Id'];
$_name = $_SESSION['row']['Name'];
$y = substr($_POST['kikan'],0,4);
$m = substr($_POST['kikan'],4,2);
$ym = $y.'年'.$m.'月';

$type = SF_SENDMAIL_OBJECT;
$body = <<<EOF
$_name 様

■$ym の元請工事追加の受付をしました

$ym の元請工事追加の受付をしました。
追加いただいた内容を確認いたします。

---------------------------------
【営業時間について】
営業時間は、月曜日から金曜日（土日祝を除く）9:00から17:30となっております。
時間外のお申込みの場合は、翌営業日以降にご連絡差し上げます。
---------------------------------

ご不明な点・ご質問等がございましたら、下記までご連絡ください。
なお、このメールに心当たりがない、内容が間違っているなどの問題がございましたら、
お手数ですがこのメール内容を添付した形で返信願います。

---------------------------------
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
EOF;

$insertitems=array(
 'EmaiFrom__c'=>'mail@rousai.jp',
 'EmailTo__c'=>$_SESSION['row']['Email__c'],
 'EmailTitle__c'=>'☆【'.$ym.'】元請工事追加の受付をしました【事務組合RJC】',
 'EmailBody__c'=>$body
);
sf_soql_insert($type, $insertitems);

unset($_SESSION['changed']);
$_SESSION['message'] = $ym.'の元請工事追加の受付をしました。';

header('Location: motoukekouji_toplist.php');
exit;

?>

