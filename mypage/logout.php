<?php

// セッションの開始
ob_start();
session_start();

require_once('common_function.php');
$title="マイページ　ログアウト";
//put_log('認証', 'ログアウト', 'ログアウト');

// セッションの認証情報を削除
unset($_SESSION['auth']);
unset($_SESSION['row']);
session_destroy();

// 非ログインTopPageに遷移
header('Location: index.php');

?>
