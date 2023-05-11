<?php
// セッション切れチェック
 $timeout = 900;

// ini_set('session.gc_maxlifetime', $timeout);

 if (isset($_SESSION['idle_time']) && $_SESSION['idle_time'] < time()) {
     session_destroy();
     session_start();
     session_regenerate_id();
     unset($_SESSION['idle_time']);
     header('Location: ./session_out.php');
     exit;
 }

/*
 if (!isset($_SESSION['jigyou'])) {
//     session_destroy();
//     session_start();
//     session_regenerate_id();
     unset($_SESSION['idle_time']);
     header('Location: ./session_out.php');
     exit;
 }
*/

 $_SESSION['idle_time'] = time() + $timeout;
?>
