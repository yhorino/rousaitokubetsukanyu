<?php

/*
 * ログイン処理
 */

// セッションの開始
ob_start();
session_start();
//session_regenerate_id();

// 共通関数のinclude
require_once('common_function.php');
//require_once('common_auth.php');

// 日付関数(date)を(後で)使うのでタイムゾーンの設定
//date_default_timezone_set('Asia/Tokyo');

// ユーザ入力情報を保持する配列を準備する
$user_input_data = array();
// エラー情報を保持する配列を準備する
$error_detail = array();

// 「パラメタの一覧」を把握
$params = array('tmppass','newpass','kaiin_no');
// データを取得する ＋ 必須入力のvalidate
foreach($params as $p) {
    $user_input_data[$p] = (string)@$_POST[$p];
}
// 確認
//var_dump($user_input_data);

$datum = (array)mp_getLogin($user_input_data['kaiin_no']);

$login_flg = false;
if($user_input_data['tmppass'] == $datum['tmp_password']){
 $login_flg = true;
}

// 最終的に「ログイン情報に不備がある」場合は、エラーとして突き返す
// エラーが出たら入力ページに遷移する
if (false === $login_flg) {
    // エラー情報をセッションに入れて持ちまわる
    $_SESSION['output_buffer']['error_invalid_update'] = true;

//put_log('操作', 'パスワード登録', 'パスワード登録失敗:パスワード不一致');
    // 入力ページに遷移する
    header('Location: ./regist_pw.php?no='.$user_input_data['kaiin_no']);
    exit;
}

// XXX ここまで来たら「適切な情報でログインができている」
//echo 'ログインできました';
// セッションIDを張り替える：
// 「ログインできている」という情報をセッション内に格納する

//var_dump($user_input_data);
//var_dump($newpass_hash);
$ret = mp_changePW($user_input_data['kaiin_no'], $user_input_data['newpass']);
//var_dump($user_input_data);

//put_log('操作', 'パスワード登録', 'パスワード登録成功');

$_SESSION['kaiin_no'] = $user_input_data['kaiin_no'];
setcookie('regist','1');

header('Location: ./regist_pw_done.php');
exit();

