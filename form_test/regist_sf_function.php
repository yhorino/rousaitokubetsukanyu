<?php

header("Content-type: text/html;charset=utf-8");

/* 20230509 フォーム入力状況をSFリードに記録 */
class FormData{
 private $name;
 public function setName($__name){
  $this->name = urlencode($__name);
 }
 public function setFullName($__lastname, $__firstname){
  $this->name = urlencode($__lastname.' '.$__firstname);
 }
 
 private $email;
 public function setEmail($__email){
  $this->email = urlencode($__email);
 }
 
 function __construct(){
  $this->name = '';
  $this->email = '';
 }
 
 public function RegistSalesforceLead(){

  /* 本番 */
  $url = 'https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8';
  // Salesforceの組織ID
  $oid = '00D7F0000001NoF';

  $recordtypeid = '012BV0000004KeH'; // 労災特別加入フォーム入力

  $fields = array(

  // Salesforceへのパラメーター
  'oid' => $oid,
  'retURL' => '',
  'recordType' => $recordtypeid, 
  'last_name' => $this->name, 
  'company' => $this->name, 
  'email' => $this->email, 
  //'debug' => '1',
  //'debugEmail' => urlencode("xxx@xxxx"),
  );
  foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
  rtrim($fields_string,'&');


  $ch = curl_init();
  //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST,count($fields));
  //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt($ch, CURLOPT_POSTFIELDS,$fields_string);
  //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
 }

}

?>