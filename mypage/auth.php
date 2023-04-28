<?php

// セッションの開始
//ob_start();
session_start();

$timeout = 900;
//$timeout = 30;

ini_set('session.gc_maxlifetime', $timeout);
//session_start();

if (isset($_SESSION['idle_time']) && $_SESSION['idle_time'] < time()) {
    session_destroy();
    session_start();
    session_regenerate_id();
    unset($_SESSION['idle_time']);
//    $_SESSION = array();
}

$_SESSION['idle_time'] = time() + $timeout;

//ini_set( 'session.gc_maxlifetime', 900 );  // 秒(デフォルト:1440)

// 共通関数のinclude
require_once('common_function.php');

// セッションに入っている情報を確認する
//var_dump($_SESSION);

// セッションに「認証情報」がない場合、「非ログインTopPage(index.php)」に遷移させる( ＝ このPageは表示しない)
if (false === isset($_SESSION['auth'])) {

 $_SESSION['auth']['id'] = '';
    //
//    header('Location: ./index.php');
    header('Location: ./session_out.php');
    exit;
}

