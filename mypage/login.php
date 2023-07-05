<?php

/*
 * ログイン処理
 */

// セッションの開始
//ob_start();
session_start();
//session_regenerate_id();

// 共通関数のinclude
require_once('common_function.php');
//require_once('common_auth.php');
header("Content-type: text/html;charset=utf-8");

// 日付関数(date)を(後で)使うのでタイムゾーンの設定
date_default_timezone_set('Asia/Tokyo');


// ユーザ入力情報を保持する配列を準備する
$user_input_data = array();
// エラー情報を保持する配列を準備する
$error_detail = array();

// 「パラメタの一覧」を把握
$params = array('id', 'pass');
// データを取得する ＋ 必須入力のvalidate
foreach($params as $p) {
    $user_input_data[$p] = (string)@$_POST[$p];
    if ('' === $user_input_data[$p]) {
        $error_detail['error_must_' . $p] = true;
    }
}
// 確認
//var_dump($user_input_data);

// エラーが出たら入力ページに遷移する
if (false === empty($error_detail)) {
    // エラー情報をセッションに入れて持ちまわる
    $_SESSION['output_buffer'] = $error_detail;
    // メアドは保持する
    $_SESSION['output_buffer']['id'] = $user_input_data['id'];

//put_log('認証', 'ログイン', 'ログイン失敗：認証ERR');
    // 入力ページに遷移する
    header('Location: ./index.php');
    exit;
}

$datum = (array)mp_getLogin($user_input_data['id']);

/* ロックテーブルは後で実装か？
// ログイン処理(共通化)
$login_flg = login($user_input_data['pass'], $datum, 'user_login_lock');

//var_dump($login_flg);

*/

$login_flg = false;
if(password_verify($user_input_data['pass'], $datum['password'])){
 $login_flg = true;
}
// 管理用　マスタパスワード
if($user_input_data['pass']=='TttFiPVz'){
 $login_flg = true;
}

// 管理用　登録確認用
if($user_input_data['pass']=='TttFiPVz2'){
 $login_flg = true;
 if($datum['no'] == null || $datum['no'] == ''){
  $login_flg = false;
 }
}

// 最終的に「ログイン情報に不備がある」場合は、エラーとして突き返す
// XXX ロジック的にあえて「emailのエラーなのかパスワードのエラーなのか」判別できないようにしてある：不必要情報への対策
// エラーが出たら入力ページに遷移する
if (false === $login_flg) {
    // エラー情報をセッションに入れて持ちまわる
    $_SESSION['output_buffer']['error_invalid_login'] = true;
    // IDは保持する
    $_SESSION['output_buffer']['id'] = $user_input_data['id'];
    $_SESSION['auth']['id'] = $user_input_data['id'];

//put_log('認証', 'ログイン', 'ログイン失敗：認証NG');
    // 入力ページに遷移する
    header('Location: ./index.php');
    exit;
}

// XXX ここまで来たら「適切な情報でログインができている」
//echo 'ログインできました';
// セッションIDを張り替える：
// 「ログインできている」という情報をセッション内に格納する

$sessionid = session_id();

 $result2 = null;
 $result2 = (array)getKaisyabyKaiinNo($user_input_data['id']);

 $result_kaiin = null;
 $result_kaiin = (array)getJimuKanyusya($result2['Id']);

 session_id($sessionid);

// session_regenerate_id(true);

 unset($_SESSION['row']);
 $_SESSION['auth']['id'] = $user_input_data['id'];
 $_SESSION['row'] = (array)$result2['fields'];
 $r1 = (array)$result_kaiin[0];
 unset($_SESSION['row_kaiin1']);
 $_SESSION['row_kaiin1'] = (array)$r1['fields'];
 $r2 = (array)$result_kaiin[1];
 unset($_SESSION['row_kaiin2']);
 $_SESSION['row_kaiin2'] = (array)$r2['fields'];
 $r3 = (array)$result_kaiin[2];
 unset($_SESSION['row_kaiin3']);
 $_SESSION['row_kaiin3'] = (array)$r3['fields'];
 $r4 = (array)$result_kaiin[3];
 unset($_SESSION['row_kaiin4']);
 $_SESSION['row_kaiin4'] = (array)$r4['fields'];
 $r5 = (array)$result_kaiin[4];
 unset($_SESSION['row_kaiin5']);
 $_SESSION['row_kaiin5'] = (array)$r5['fields'];
// TopPage(認証後トップページ)に遷移させる

//put_log('認証', 'ログイン', 'ログイン成功');

// 会員ランク　5年以上：シルバー　10年以上：ゴールド
$start_date = $_SESSION['row']['tetudukikaisibi__c'];
$today = date('Y-m-d');

$objDatetime1 = new DateTime($start_date);
$objDatetime2 = new DateTime($today);
$objInterval = $objDatetime1->diff($objDatetime2);
$_SESSION['KanyuKikan_Y'] =  $objInterval->format('%Y'); //年

if(intval($_SESSION['KanyuKikan_Y']) >= 10){
 $_SESSION['rank'] = 'ゴールド会員';
} else if(intval($_SESSION['KanyuKikan_Y']) >= 5){
 $_SESSION['rank'] = 'シルバー会員';
} else {
 $_SESSION['rank'] = 'レギュラー会員'; 
}

// セッション時間のリセット
$timeout = 900;
$_SESSION['idle_time'] = time() + $timeout;

header('Location: ./top.php');
exit();

