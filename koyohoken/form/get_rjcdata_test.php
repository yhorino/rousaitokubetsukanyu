<?php

	$roudouhoken_no = str_replace('-','',$_SESSION['roudouhoken_no']);
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

 setcookie("query_error", 0);
	$result_getrjcdata = null;
	$result_getrjcdata = (array)getjimuKaisyabyRoudouhokenNo($roudouhoken_no);
 $row_getrjcdata = (array)$result_getrjcdata["fields"];

if($result_getrjcdata['Id'] != ''){
 $id = $result_getrjcdata['Id'];
 $type = $row_getrjcdata['Type'];
 $kaisyamei = $row_getrjcdata['Name'];
 $kaisyamei_furi = $row_getrjcdata['Furi__c'];
 $zip = str_replace("-","",$row_getrjcdata['BillingPostalCode']);
 $pref = $row_getrjcdata['BillingState'];
 $city = $row_getrjcdata['BillingCity'];
 $address = $row_getrjcdata['BillingStreet'];
 $denwabangou = $row_getrjcdata['Phone'];
 $faxbangou = $row_getrjcdata['Fax'];
 $mail = $row_getrjcdata['Email__c'];
 $dname = explode(' ', mb_convert_kana($row_getrjcdata['Daihyosya__c'], 's'));
 $daihyosyamei_sei = $dname[0];
 $daihyosyamei_mei = $dname[1];
 $dfuri = explode(' ', mb_convert_kana($row_getrjcdata['DaihyousyaFuri__c'], 's'));
 $daihyosyamei_furi_sei = $dfuri[0];
 $daihyosyamei_furi_mei = $dfuri[1];
 $daihyosyayakusyoku = $row_getrjcdata['Daihyouyakusyoku__c'];
 $shiharai = $row_getrjcdata['ShiharaiType__c'];
 $order_no = $row_getrjcdata['order_no__c'];
}

	$ret_getrjcdata = array('id'=>$id, 'type'=>$type, 'kaisyamei'=>$kaisyamei, 'kaisyamei_furi'=>$kaisyamei_furi, 'zip'=>$zip, 'pref'=>$pref, 'city'=>$city, 'address'=>$address, 'denwabangou'=>$denwabangou, 'faxbangou'=>$faxbangou, 'mail'=>$mail, 'daihyosyamei_sei'=>$daihyosyamei_sei, 'daihyosyamei_mei'=>$daihyosyamei_mei, 'daihyosyamei_furi_sei'=>$daihyosyamei_furi_sei, 'daihyosyamei_furi_mei'=>$daihyosyamei_furi_mei, 'daihyosyayakusyoku'=>$daihyosyayakusyoku, 'order_no'=>$order_no);

?>
