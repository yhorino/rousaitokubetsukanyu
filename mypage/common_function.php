<?php

/*
 * 共通関数置き場
 */

include_once $_SERVER['DOCUMENT_ROOT'].'/PHPMailer/phpmailer_sendmail.php';

function __sendmail($from, $from_name, $to, $to_name, $title, $text){
	mb_language("Japanese");
	mb_internal_encoding("UTF-8");
	$to_name = mb_encode_mimeheader($to_name,"ISO-2022-JP");
	$to = "$to_name<$to>";
	$from_name = mb_encode_mimeheader($from_name, "ISO-2022-JP");
	$param = "-f ".$from;
	$from = "$from_name<$from>";
	$header  = "From: $from\n";
	$header .= "Reply-To: $from";
	$result = mb_send_mail($to, $title, $text, $header, $param);
	if ($result) {
	} else {
	}
}

// XSS対策用エスケープ関数
function h($s) {
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

// 「数値の0なら空文字を返す」を追加したXSS対策用エスケープ関数
function h_digit($d) {
    if (0 === $d) {
        return '';
    }
    // else
    return h((string)$d);
}


// CSRF用共通関数
// ----------------------------
// tokenの作成とセッションへの設定
// front用
function create_csrf_token() {
    return _create_csrf_token('front');
}
// 管理画面用
function create_csrf_token_admin() {
    return _create_csrf_token('admin');
}
// 処理本体
function _create_csrf_token($type) {
    // CSRF用のトークンの作成と設定
    $csrf_token = '';
    try {
        // XXX random_bytesはPHP7以降の関数だが、PHP5.2以降で使えるユーザランド実装( https://github.com/paragonie/random_compat )が存在する
        if(function_exists('random_bytes')) {
            $csrf_token = hash('sha512', random_bytes(128));
        } else if (is_readable('/dev/urandom')) {
            $csrf_token = hash('sha512', file_get_contents('/dev/urandom', false, NULL, 0, 128), false);
        } else if(function_exists('openssl_random_pseudo_bytes')) {
            $csrf_token = hash('sha512', openssl_random_pseudo_bytes(128));
        }
    } catch (Exception $e) {
        ; // XXX 後でまとめてエラーチェックするので一端ここでは未処理
    }
    if ('' === $csrf_token) {
        echo 'CSRFトークンが作成できないので終了します';
        exit; // XXX
    }

    // CSRFトークンは5個まで(で後で追加するので、ここでは4個以下に)
    while (5 <= count(@$_SESSION[$type]['csrf_token'])) {
        array_shift($_SESSION[$type]['csrf_token']);
    }

    // セッションに格納
    $_SESSION[$type]['csrf_token'][$csrf_token] = time();

    //
    return $csrf_token;
}

// tokenのチェック
// front用
function is_csrf_token() {
    return _is_csrf_token('front');
}
// 管理画面用
function is_csrf_token_admin() {
    return _is_csrf_token('admin');
}
// 処理本体
function _is_csrf_token($type) {

    // CSRFトークンを把握
    $post_csrf_token = (string)@$_POST['csrf_token'];

    // セッションの中に「送られてきたトークン」が存在しなければ、false
    if (false === isset($_SESSION[$type]['csrf_token'][$post_csrf_token])) {
        return false;
    }

    // 寿命を把握して
    $ttl = $_SESSION[$type]['csrf_token'][$post_csrf_token];
    // 先にトークンは削除(使い捨てなので)
    unset($_SESSION[$type]['csrf_token'][$post_csrf_token]);
    // 寿命チェック(5分以内)
    if (time() >=  $ttl + 300) {
        return false;
    }
    // すべてのチェックでOKだったのでチェック成功
    return true;
}

/* 20230123 Y.Horino マイページログインを一人親方RJCに合わせる */

// DB用関数
// ----------------------------
include_once $_SERVER['DOCUMENT_ROOT'].'/dbinfo.php';

function get_dbh() {
    // データの設定
    // XXX 実際は、configファイル等で外出しにする事が多い
global $dbinfo_dbname;
global $dbinfo_dbpass;
    $dsn = 'mysql:dbname='.$dbinfo_dbname.';host=localhost';
    $user = $dbinfo_dbname;
    $pass = $dbinfo_dbpass;

    // 接続オプションの設定
    $opt = array (
        PDO::ATTR_EMULATE_PREPARES => false,
    );
    // 「複文禁止」が可能なら付け足しておく
    if (defined('PDO::MYSQL_ATTR_MULTI_STATEMENTS')) {
        $opt[PDO::MYSQL_ATTR_MULTI_STATEMENTS] = false;
    }

    // 接続
    try {
        $dbh = new PDO($dsn, $user, $pass, $opt);
    } catch (PDOException $e) {
        // XXX 本当はもう少し丁寧なエラーページを出力する
        echo 'システムでエラーが起きました';
        exit;
    }
    //
    return $dbh;
}

// ログイン認証
// ----------------------------
function mp_getLogin($no){
    // DBハンドルの取得
    $dbh = get_dbh();

    $sql = 'SELECT no,password,tmp_password FROM T_jimump_login WHERE no=:no;';
    $pre = $dbh->prepare($sql);
    // 値のバインド
    $pre->bindValue(':no', $no, PDO::PARAM_STR);
    // SQLの実行
    $r = $pre->execute(); // XXX

    // SELECTした内容の取得
    $result = $pre->fetch();
    //
    return $result;
}

// パスワード変更
// ----------------------------
function mp_settmpPW($no, $tmppass){
    // DBハンドルの取得
    $dbh = get_dbh();

    $tmppass_hash = $tmppass;
    $sql = 'INSERT INTO T_jimump_login(`no`, `password`, `tmp_password`) VALUES(:no, "", :tmppass) ON DUPLICATE KEY UPDATE  `tmp_password`=:tmppass2;';
    $pre = $dbh->prepare($sql);
    // 値のバインド
    $pre->bindValue(':tmppass', $tmppass_hash, PDO::PARAM_STR);
    $pre->bindValue(':tmppass2', $tmppass_hash, PDO::PARAM_STR);
    $pre->bindValue(':no', $no, PDO::PARAM_STR);
    // SQLの実行
    $r = $pre->execute(); // XXX

    //
    return $r;
}

// パスワード変更
// ----------------------------
function mp_changePW($no, $newpass){
    // DBハンドルの取得
    $dbh = get_dbh();

    $newpass_hash = password_hash($newpass, PASSWORD_BCRYPT);
    $sql = 'UPDATE T_jimump_login SET `password`=:newpass, `tmp_password`="" WHERE `no`=:no;';
    $pre = $dbh->prepare($sql);
    // 値のバインド
    $pre->bindValue(':newpass', $newpass_hash, PDO::PARAM_STR);
    $pre->bindValue(':no', $no, PDO::PARAM_STR);
    // SQLの実行
    $r = $pre->execute(); // XXX

    //
    return $r;
}



function mp_getAccountbyNo($no){
require_once("bin/sf_Api.php");
 init();
 sf_login();
 $result = (array)mp_getAccount_kaisya($no);
 $row = (array)$result['fields'];
 sf_logout();
 return $row;
}

/* 20230123 Y.Horino マイページログインを一人親方RJCに合わせる */


/*

// 20220115 パスワードDBをサーバDBからSFへ移行
require_once("bin/sf_Api.php");
 init();
 sf_login();
// sf_logout();

function mp_getLoginMail($email){
// init();
// sf_login();

 $result = (array)jm_getLoginMail($email);
 $row = (array)$result['fields'];
 
// sf_logout();
 
 return $row;
}

function mp_getAccountbyMail($email){
 $result = (array)getAccountbyMail($email);
 $row = (array)$result['fields'];
 return $row;
}
 
function mp_getLoginData($id){
// init();
// sf_login();

 $result = (array)jm_getLoginData($id);
 $row = (array)$result['fields'];
 
// sf_logout();
 
 return $row;
}

function mp_getId($inner_id){
// init();
// sf_login();

 $result = (array)jm_getId($inner_id);
 $row = (array)$result['fields'];
 
// sf_logout();
 
 return $row['id__c'];
}

function mp_getEmail($inner_id){
// init();
// sf_login();

 $result = (array)jm_getEmail($inner_id); 
 $row = (array)$result['fields'];
 
// sf_logout();
 
 return $row['email__c'];
}

function mp_getUpdateDate($inner_id){
// init();
// sf_login();

 $result = (array)jm_getUpdateDate($inner_id); 
 $row = (array)$result['fields'];
 
// sf_logout();
 
 return $row['update_date__c'];
}

function mp_settmpPW($no, $tmppass, $email){
// init();
// sf_login();

 $inner_id = jm_settmpPW($no, $tmppass, $email);
 
// sf_logout();
 
 if($inner_id != ''){
  return $inner_id;
 } else {
  return -1;
 }
}

function mp_changePW($no, $newpass){
// init();
// sf_login();

 $newpass_hash = password_hash($newpass, PASSWORD_BCRYPT);
 $r = jm_changePW($no, $newpass_hash);
 
// sf_logout();
 
 return $r;
}

// 20220115 パスワードDBをサーバDBからSFへ移行
*/


// 20200814 Y.Horino
// ログ出力
// ----------------------------
function put_log($type, $page, $info) {
    // DBハンドルの取得
    $dbh = get_dbh();

    if(isset($_SESSION['auth']['seirino'])){
     $user_id = $_SESSION['auth']['seirino'];
    } else {
     $user_id = '';
    }
    $sql = 'INSERT INTO T_mypage_log(type, user_id, session_id, page, date, time, info) VALUES(:type, :user_id, :session_id, :page, :date, :time, :info);';
    $pre = $dbh->prepare($sql);
    // 値のバインド
    $pre->bindValue(':type', $type, PDO::PARAM_STR);
    $pre->bindValue(':user_id', $user_id, PDO::PARAM_STR);
    $pre->bindValue(':session_id', session_id(), PDO::PARAM_STR);
    $pre->bindValue(':page', $page, PDO::PARAM_STR);
    $pre->bindValue(':date', date('Y-m-d'), PDO::PARAM_STR);
    $pre->bindValue(':time', date('H:i:s'), PDO::PARAM_STR);
    $pre->bindValue(':info', $info, PDO::PARAM_STR);
    // SQLの実行
    $r = $pre->execute(); // XXX

    //
    return $r;
}

// 20200817 Y.Horino
// ログ検索
// ----------------------------
function get_log($type, $user_id, $session_id, $page, $date, $time) {
    // DBハンドルの取得
    $dbh = get_dbh();

    $w = false;
    $where = '';
    $sql = 'SELECT * from T_mypage_log ';
    if($type != ''){
     if($w == false){
      $w = true;
      $where = $where.'WHERE type=:type ';
     } else {
      $where = $where.'AND type=:type ';    
     }
    }
    if($user_id != ''){
     if($w == false){
      $w = true;
      $where = $where.'WHERE user_id=:user_id ';
     } else {
      $where = $where.'AND user_id=:user_id ';  
     }
    }
    if($session_id != ''){
     if($w == false){
      $w = true;
      $where = $where.'WHERE session_id=:session_id ';
     } else {
      $where = $where.'AND session_id=:session_id ';
     }
    }
    if($page != ''){
     if($w == false){
      $w = true;
      $where = $where.'WHERE page=:page ';
     } else {
      $where = $where.'AND page=:page ';   
     }
    }
    if($date != ''){
     if($w == false){
      $w = true;
      $where = $where.'WHERE date=:date ';
     } else {
      $where = $where.'AND date=:date ';   
     }
    }
    if($time != ''){
     if($w == false){
      $w = true;
      $where = $where.'WHERE time=:time ';
     } else {
      $where = $where.'AND time=:time ';   
     }
    }
    $sql = $sql.$where.' ORDER BY no DESC;';
    $pre = $dbh->prepare($sql);
    // 値のバインド
    $pre->bindValue(':type', $type, PDO::PARAM_STR);
    $pre->bindValue(':user_id', $user_id, PDO::PARAM_STR);
    $pre->bindValue(':session_id', $session_id, PDO::PARAM_STR);
    $pre->bindValue(':page', $page, PDO::PARAM_STR);
    $pre->bindValue(':date', $date, PDO::PARAM_STR);
    $pre->bindValue(':time', $time, PDO::PARAM_STR);
    // SQLの実行
    $r = $pre->execute(); // XXX

    if (false === $r) {
        // XXX 本当はもう少し丁寧なエラーページを出力する
        echo 'システムでエラーが起きました';
        exit;
    }
    // SELECTした内容の取得
    $result = $pre->fetchAll();
    //var_dump($datum);
 
    //
    return $result;
}

function sendmail_nenko_credit($items){

 $text = '---------------------------------
　※このメールは、一人親方労災保険RJCより自動送信されています。
---------------------------------
'.$items['LastName'].'　'.$items['FirstName'].'　様　('.$items['CellsNo__c'].')

■クレジットカード決済完了のお知らせ

このたびはクレジットカード決済をご利用いただき、誠にありがとうございます。
継続手続き保険料の決済が完了しましたので、以下の通りご案内いたします。

---------------------------------
オーダー番号：'.$_COOKIE['order_no'].'
お支払方法：クレジットカード
お支払総額：'.number_format($items['ShiharaisougakunkINT__c']).'円
加入月：2021年4月
加入期間：2022年3月末日まで
給付基礎日額：'.number_format($items['Nownitigaku__c']).'円
登録情報変更：'.$items['NKhenko__c'].'
---------------------------------

※加入の取り消しについて
お客様のご都合による保険料等入金後の加入取り消しは一切行っておりません。

---------------------------------
【営業時間について】
営業時間は、月曜日から金曜日（土祝日を除く）9:00から17:30となっております。
時間外の場合は、翌営業日以降に対応いたします。
---------------------------------

ご不明な点・ご質問等がございましたら、下記までご連絡ください。
なお、このメールに心当たりがない、内容が間違っているなどの問題がございましたら、
お手数ですがこのメール内容を添付した形で返信願います。

---------------------------------
管轄労働局長承認　一人親方組合
一人親方労災保険RJC（組合名称：一人親方労災特別加入事務センター）

【コンタクトセンター】
〒486-0945　愛知県春日井市勝川町6-140　王子不動産勝川ビル2F

すべての事務手続はコンタクトセンターで行っております。

TEL:0120-631-744
FAX:03-6831-2752
Mail: mail@631japan.com
営業時間：月～金 9:00‐17:30（土日祝を除く）

サイトURL:
https://www.xn--4gqprf2ac7ft97aryo6r5b3ov.tokyo/
---------------------------------
';

 $from = 'mail@631japan.com';
 $from_name = '一人親方労災保険';
 $to = $items['PersonEmail'];
 $to_name = $items['LastName'].$items['FirstName'];
 $code = $items['PrefectureCodeNew__c'].'-'.$items['PrefCode__c'];
 $title = '◆NK'.$code.$to_name.'様からの継続クレジット決済が完了いたしました';
 
 sendmail($from, $from_name, $to, $to_name, $title, $text);
 sendmail($from, $from_name, $from, $from_name, $title, $text);

}

/*
function sendmail_nenko_bank($items){

 $text = '---------------------------------
　※このメールは、一人親方労災保険RJCより自動送信されています。
---------------------------------
'.$items['LastName'].'　'.$items['FirstName'].'　様　('.$_SESSION['row']['CellsNo__c'].')

■年度更新申込を受付いたしました

平素は一人親方労災保険RJCをご愛顧いただき、誠にありがとうございます。

'.$items['LastName'].'　'.$items['FirstName'].' 様から継続申込を受付いたしました。

〇月〇日までに下記の手順に従ってお振込みをお願いいたします。
なお、振込人名義は '.$items['Furi__c'].'　'.$items['Furi2__c'].' 様としていただきますようお願いいたします。

---------------------------------
【振込先口座】
金融機関：三菱UFJ銀行　春日井支店
口座番号：普通預金　0301335
口座名義：一人親方労災特別加入事務センター
口座名義（カナ）：ヒトリオヤカタロウサイトクベツカニュウジムセンター

保険料等お支払総額：'.number_format($items['Nenkohokenryo_Input__c']).' 円

振込期限：2021 年 〇 月 〇 日　
※振込手数料はご負担願います。
---------------------------------

お申込み内容に確認事項がある場合は、'.$items['LastName'].'　'.$items['FirstName'].' 様の携帯電話等に0120-631-744よりご連絡させていただきます。

---------------------------------
【営業時間について】
営業時間は、月曜日から金曜日（土祝日を除く）9:00から17:30となっております。
時間外の場合は、翌営業日以降に対応いたします。
---------------------------------

ご不明な点・ご質問等がございましたら、下記までご連絡ください。
なお、このメールに心当たりがない、内容が間違っているなどの問題がございましたら、
お手数ですがこのメール内容を添付した形で返信願います。

---------------------------------
管轄労働局長承認　一人親方組合
一人親方労災保険RJC（組合名称：一人親方労災特別加入事務センター）

【コンタクトセンター】
〒486-0945　愛知県春日井市勝川町6-140　王子不動産勝川ビル2F

すべての事務手続はコンタクトセンターで行っております。

TEL:0120-631-744
FAX:03-6831-2752
Mail: mail@631japan.com
営業時間：月～金 9:00‐17:30（土日祝を除く）

サイトURL:
https://www.xn--4gqprf2ac7ft97aryo6r5b3ov.tokyo/
---------------------------------
';

 $from = 'mail@631japan.com';
 $from_name = '一人親方労災保険';
 $to = $items['PersonEmail'];
 $to_name = $items['LastName'].'　'.$items['FirstName'];
 $code = $_SESSION['row']['PrefectureCodeNew__c'].'-'.$_SESSION['row']['PrefCode__c'];
 $title = '◆NKB'.$code.$to_name.'様からの継続申込を受付いたしました';
 
 sendmail($from, $from_name, $to, $to_name, $title, $text);
 sendmail($from, $from_name, $from, $from_name, $title, $text);

}
*/

function convertto_zenkaku($str){
	return mb_convert_kana($str, 'KSRNAV');
}
function convertto_zenkana($str){
	return mb_convert_kana($str, 'KCSRNAV');
}
function convertto_hankana($str){
	return mb_convert_kana($str, 'khsrna');
}

function convertto_haneisu($str){
	return mb_convert_kana($str, 'as');
}

