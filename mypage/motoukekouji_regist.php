<?php

define('MODE_UNKNOWN', -1);
define('MODE_INSERT', 1);
define('MODE_UPDATE', 2);

session_start();
header("Content-type: text/html;charset=utf-8");

include_once('./motoukekouji_class.php');
$mode = MODE_UNKNOWN;
$motoukekouji_data = new MotoukekoujiData();
if(isset($_POST['id']) && $_POST['id'] != ''){
 $mode = MODE_UPDATE;
 $motoukekouji_data->setId($_POST['id']);
} else {
 $mode = MODE_INSERT;
}
$motoukekouji_data->setAccountId($_POST['accountid']);
$motoukekouji_data->setKoujiType($_POST['kouji_type']);
$motoukekouji_data->setKoujiAddress($_POST['kouji_address']);
$motoukekouji_data->setKoujiKikanStart($_POST['kouji_kikan_start']);
$motoukekouji_data->setKoujiKikanEnd($_POST['kouji_kikan_end']);
$motoukekouji_data->setKoujiKingaku($_POST['kouji_kingaku']);

/* SFに登録 */

header('Location: motoukekouji_list.php');
exit;

?>

