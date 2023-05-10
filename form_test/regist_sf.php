<?php
	session_start();
	header("Content-type: text/html;charset=utf-8");

 include_once 'regist_sf_function.php';

 $formdata = new FormData();
 $formdata->setName(session_id());
 $formdata->setEmail($_POST['email']);
 $formdata->setFormAction($_POST['form_action']);
 $result = $formdata->RegistSalesforceLead();
 $error_msg = '';

	$ret = array('result'=>$result, 'error_msg'=>$error_msg);
	echo json_encode($ret);

?>
