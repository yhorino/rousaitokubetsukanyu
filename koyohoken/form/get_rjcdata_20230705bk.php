<?php
	session_start();
	header("Content-type: text/html;charset=utf-8");
	$roudouhoken_no = str_replace('-','',$_POST['roudouhoken_no']);
 $roudouhoken_no = substr($roudouhoken_no, 0, 5).'-'.substr($roudouhoken_no, 5, 6).'-'.substr($roudouhoken_no, 11, 3);

 $id = '';
 $type ='';
 $kaisyamei = '';
 $kaisyamei_furi = '';
 $zip = '';
 $pref = '';
 $city = '';
 $address = '';
 $denwabangou = '';
 $faxbangou = '';
 $mail = '';
 $daihyosyamei_sei = '';
 $daihyosyamei_mei = '';
 $daihyosyamei_furi_sei = '';
 $daihyosyamei_furi_mei = '';
 $daihyosyayakusyoku = '';
 $shiharai = '';
 $order_no = '';

 require_once("../../form/bin/sf_Api.php");
 init();
 sf_login();

 setcookie("query_error", 0);
	$result = null;
	$result = (array)getjimuKaisyabyRoudouhokenNo($roudouhoken_no);
 $row = (array)$result["fields"];

if($result['Id'] != ''){
 $id = $result['Id'];
 $type = $row['Type'];
 $kaisyamei = $row['Name'];
 $kaisyamei_furi = $row['Furi__c'];
 $zip = str_replace("-","",$row['BillingPostalCode']);
 $pref = $row['BillingState'];
 $city = $row['BillingCity'];
 $address = $row['BillingStreet'];
 $denwabangou = $row['Phone'];
 $faxbangou = $row['Fax'];
 $mail = $row['Email__c'];
 $dname = explode(' ', mb_convert_kana($row['Daihyosya__c'], 's'));
 $daihyosyamei_sei = $dname[0];
 $daihyosyamei_mei = $dname[1];
 $dfuri = explode(' ', mb_convert_kana($row['DaihyousyaFuri__c'], 's'));
 $daihyosyamei_furi_sei = $dfuri[0];
 $daihyosyamei_furi_mei = $dfuri[1];
 $daihyosyayakusyoku = $row['Daihyouyakusyoku__c'];
 $shiharai = $row['ShiharaiType__c'];
 $order_no = $row['order_no__c'];
}

  sf_logout();
// echo " [logout] ";


	$ret = array('id'=>$id, 'type'=>$type, 'kaisyamei'=>$kaisyamei, 'kaisyamei_furi'=>$kaisyamei_furi, 'zip'=>$zip, 'pref'=>$pref, 'city'=>$city, 'address'=>$address, 'denwabangou'=>$denwabangou, 'faxbangou'=>$faxbangou, 'mail'=>$mail, 'daihyosyamei_sei'=>$daihyosyamei_sei, 'daihyosyamei_mei'=>$daihyosyamei_mei, 'daihyosyamei_furi_sei'=>$daihyosyamei_furi_sei, 'daihyosyamei_furi_mei'=>$daihyosyamei_furi_mei, 'daihyosyayakusyoku'=>$daihyosyayakusyoku, 'order_no'=>$order_no);

	echo json_encode($ret);

?>
