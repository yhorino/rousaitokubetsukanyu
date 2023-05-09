<?php
	session_start();
	header("Content-type: text/html;charset=utf-8");

 include_once 'regist_sf_function.php';

	$ret = array('price'=>number_format($price), 'm'=>number_format($m), 'price_all'=>number_format($price_all), 'price_all1'=>number_format($price_all1), 'hokenryo'=>number_format($hokenryo), 'nyukaikin'=>number_format($nyukaikin), 'kaihi'=>number_format($kaihi), 'kanyu_year'=>number_format($kanyu_year), 'kanyu_month'=>number_format($kanyu_month), 'end_year'=>number_format($end_year), 'end_month'=>number_format($end_month), 'syoukai_str'=>$syoukai_str, 'cupon_str'=>$cupon_str, 'price_normal'=>number_format($price_normal), 'waribiki_all'=>number_format($waribiki_all),
 'no'=>$_POST['no'],
 'idx'=>$_POST['idx']);
	echo json_encode($ret);

?>
