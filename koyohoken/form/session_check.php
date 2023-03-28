<?php
// セッション切れチェック
 $timeout = 900;

 if (isset($_SESSION['idle_time']) && $_SESSION['idle_time'] < time()) {
     unset($_SESSION['idle_time']);
     header('Location: ./session_out.php');
     exit;
 }

 $_SESSION['idle_time'] = time() + $timeout;
?>
