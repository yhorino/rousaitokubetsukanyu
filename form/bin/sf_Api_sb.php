<?php
/**
 *  あいち労災様
*
* @copyright Copyright (c) 2017, SunBridge Inc.
* @version v1.00
*
*    v1.00: 2017/06/22
*/
header('Content-Type: text/html; charset=UTF-8');
$_sf_root = dirname(dirname(__FILE__));
 // 20190907 料金変更テストのため一時的にSandboxへ接続
//require_once("$_sf_root/lib/conf.php");
require_once("$_sf_root/lib/conf_sb.php");
require_once("$_sf_root/lib/soapclient/SforcePartnerClient.php");
require_once("$_sf_root/lib/soapclient/SforceHeaderOptions.php");
require_once("$_sf_root/lib/Print.php");
require_once("$_sf_root/lib/Proxy.php");
require_once("$_sf_root/lib/SfLogin.php");
require_once("$_sf_root/lib/Util.php");

/**
 * 20200727 Y.Horino
 * マイページ　顧客情報を取得
 * @param  Integer $seiri_no 会員番号
 * @return Object  顧客/Account
 */
function mp_getAccount($seiri_no){
  global $_con;

  $returns = array();
  $query = "SELECT Rousaihokenno__c,CellsNo__c,LastName,FirstName,Furi__c,Furi2__c,Seinengappiwareki__c,PersonBirthdate,Kanyunengappiwareki__c,Kanyumankiwareki__c,Center_Formula__c,Nyukinshubetsu__c,Kanyuhopemonth__c,Kanyutype_Mail__c,Kyuhukisonitigaku_Int__c,kanyusyasyo_hakkou__c,Hokenryoutotal_Int__c,Sei__c,BillingPostalCode,BillingState,BillingCity,BillingStreet,PersonMobilePhone,PersonEmail,KojiType__c,Jyosen__c,Funjintusansannen__c,Sagyounaiyoufunjin__c,Shindousagyouninen__c,Shindoukougu__c,Namarisagyoutusan__c,Sagyounaiyounamari__c,Yukisagyoutusan__c,Shiyouyukiyouza__c,CenterAddress__c FROM Account WHERE CellsNo__c = '$seiri_no'";
  try {

    $response = $_con->query($query);

    $queryResult = new QueryResult($response);

    for ($queryResult->rewind(); $queryResult->pointer < $queryResult->size; $queryResult->next()) {
      array_push($returns, $queryResult->current());
    }
  } catch (Exception $e) {
    err_die(__LINE__, __FUNCTION__ . "["  . __LINE__ . "]: ". $e->getMessage());
  }
  return $returns[0];
}

/**
 * 20200224 Y.Horino
 * IDで窓口会社情報を取得
 * @param  Integer $id ID
 * @return Object          顧客/Account
function getMadoguchibyid($id){
  global $_con;

  $returns = array();
  $query = "SELECT Id, No__c, Name, Phone, Fax, Email__c,  torimatome_ninzu__c, torihikisaki_name__c, Furi__c, Daihyosya__c, DaihyousyaFuri__c, Tantousya__c, TantousyaFuri__c, PostCode__c, Prefectures__c, Shikugun__c, Tyomei__c, Phone__c, Fax__c, Email__c, Mobile__c, torimatome_mousikomi_mail__c FROM Account WHERE Id = '$id'";
  try {

    $response = $_con->query($query);

    $queryResult = new QueryResult($response);

    for ($queryResult->rewind(); $queryResult->pointer < $queryResult->size; $queryResult->next()) {
      array_push($returns, $queryResult->current());
    }
  } catch (Exception $e) {
    err_die(__LINE__, __FUNCTION__ . "["  . __LINE__ . "]: ". $e->getMessage());
  }
  return $returns[0];
}
 */

/**
 * 20200429 Y.Horino
 * オーダー番号で顧客情報を取得
 * @param  Integer $order_no オーダー番号
 * @return Object          顧客/Account
 */
function getAccountbyOrderNo($order_no){
  global $_con;

  $returns = array();
  $query = "SELECT Id, FirstName, LastName, Kanyuhopemonth__c, Hituyounakikan__c, Kyuhukisonitigaku__c, kanyusyasyo_hakkou__c, Furi__c, Sei__c, Seinengappiwareki__c, Address_Full__c, PersonMobilePhone, Email__c, KojiType__c, Jyosen__c, Funjintusansannen__c, Sagyounaiyoufunjin__c, Shindousagyouninen__c, Shiyoukougu__c, Namarisagyoutusan__c, Sagyounaiyounamari__c, Yukisagyoutusan__c, Shiyouyukiyouza__c, Nyukinshubetsu__c FROM Account WHERE RecordType.Name = '個人取引先' AND order_no__c = '$order_no' order by CreatedDate asc";
  try {

    $response = $_con->query($query);

    $queryResult = new QueryResult($response);

    for ($queryResult->rewind(); $queryResult->pointer < $queryResult->size; $queryResult->next()) {
      array_push($returns, $queryResult->current());
    }
  } catch (Exception $e) {
    err_die(__LINE__, __FUNCTION__ . "["  . __LINE__ . "]: ". $e->getMessage());
  }
  return json_decode(json_encode($returns), true);
}

/**
 * 20200429 Y.Horino
 * オーダー番号で窓口会社情報を取得
 * @param  Integer $order_no オーダー番号
 * @return Object          顧客/Account
 */
function getMadoguchibyOrderNo($order_no){
  global $_con;

  $returns = array();
  $query = "SELECT Id, No__c, Name, Furi__c, Phone, Fax, Email__c,  BillingPostalCode, BillingState, BillingCity, BillingStreet, PrefectureCodeNew__c, torimatome_ninzu__c, PrefCode__c, Hokenryoutorimatome__c, Daihyosya__c, DaihyousyaFuri__c, Tantousya__c, TantousyaFuri__c, Torimatome_tanntoutel__c FROM Account WHERE RecordType.Name = '窓口会社' AND order_no__c = '$order_no' order by CreatedDate desc";
  try {

    $response = $_con->query($query);

    $queryResult = new QueryResult($response);

    for ($queryResult->rewind(); $queryResult->pointer < $queryResult->size; $queryResult->next()) {
      array_push($returns, $queryResult->current());
    }
  } catch (Exception $e) {
    err_die(__LINE__, __FUNCTION__ . "["  . __LINE__ . "]: ". $e->getMessage());
  }
  return $returns[0];
}

/**
 * 20200207 Y.Horino
 * 電話番号で窓口会社情報を取得
 * @param  Integer $madoguchiTelNo 窓口電話番号
 * @return Object          顧客/Account
 */
function getMadoguchibyTelNo($madoguchiTelNo){
  global $_con;

  $returns = array();
  $query = "SELECT Id, No__c, Name, Phone, Fax, Email__c,  BillingPostalCode, BillingState, BillingCity, BillingStreet, Tantousya__c, PrefectureCodeNew__c, torimatome_ninzu__c, PrefCode__c FROM Account WHERE RecordType.Name = '窓口会社' AND (Phone_NoDash__c = '$madoguchiTelNo' OR Phone = '$madoguchiTelNo') order by CreatedDate desc";
//  $query = "SELECT Id, No__c, Name, Phone, Fax, Email__c,  BillingPostalCode, BillingState, BillingCity, BillingStreet, Tantousya__c FROM Account WHERE RecordType.Name = '窓口会社' AND Phone = '$madoguchiTelNo' order by CreatedDate desc";
  try {

    $response = $_con->query($query);

    $queryResult = new QueryResult($response);

    for ($queryResult->rewind(); $queryResult->pointer < $queryResult->size; $queryResult->next()) {
      array_push($returns, $queryResult->current());
    }
  } catch (Exception $e) {
    err_die(__LINE__, __FUNCTION__ . "["  . __LINE__ . "]: ". $e->getMessage());
  }
  return $returns[0];
}

/**
 20190129 Y.Horino 試作
 * 保険料マスタを取得
 * @param  Integer $Kanyuhopemonth 加入希望月
 * @param  Integer $Kanyukikan 加入期間
 * @param  Integer $M_hokenryonitigaku 日額
 * @return Object  保険料マスタレコード/InsuranceFee__c
 */
function getInsuranceFee($Kanyuhopemonth, $Kanyukikan, $M_hokenryonitigaku){
  global $_con;

 $khm = $Kanyuhopemonth.'月';
  $returns = array();
  $query = "SELECT Sonobadeuketori__c, Kanyuhopemonth__c, Kanyukikan__c, Newkaihi__c, KaihiZangaku__c, Kaihinenko_Currency__c, M_hokenryonitigaku__c, Nownitigaku__c, ShiharaiType__c, Bumon__c, Mnyukaikin__c, NKchangeShiharaiType__c, NKchangenitigaku__c, MiharaiTukisu__c, Hokenryounew__c, HokenryouZangaku__c, Nenkohokenryo__c FROM InsuranceFee__c WHERE Kanyuhopemonth__c = '$khm' AND Kanyukikan__c = $Kanyukikan AND M_hokenryonitigaku__c = '$M_hokenryonitigaku' AND Bumon__c = 'RJC'";
  try {
    $response = $_con->query($query);

    $queryResult = new QueryResult($response);

    for ($queryResult->rewind(); $queryResult->pointer < $queryResult->size; $queryResult->next()) {
      array_push($returns, $queryResult->current());
    }
  } catch (Exception $e) {
    err_die(__LINE__, __FUNCTION__ . "["  . __LINE__ . "]: ". $e->getMessage());
  }
  return $returns[0];
}


/**
 20181123 Y.Horino 試作
 * IDで手続き進捗状況を取得
 * @param  Integer $id 顧客レコードID
 * @return Object  顧客/Account
 */
function getProgress($id){
  global $_con;

  $returns = array();
  $query = "SELECT Id, Status__c, Tetsudukishintyoku__c, CellsNo__c, Name, LastName, FirstName, Furi__c, Sei__c, PersonBirthdate, Phone, PersonMobilePhone, Fax, PersonEmail, PersonMailingAddress, BillingPostalCode, BillingState, BillingCity, BillingStreet, Moshikomisarerukata__c, KojiType__c, Kojigutaiteki__c, Jyosen__c, Funjintusansannen__c, FunjinStart__c, FunjinEnd__c, Omonasagyoufunjin__c, Sagyounaiyoufunjin__c, Shindousagyouninen__c, ShindoStart__c, ShindoEnd__c, Omonishiyoukougu__c, Shindoukougu__c, Namarisagyoutusan__c, NamariStart__c, NamariEnd__c, Omonasagyounamari__c, Sagyounaiyounamari__c, Yukisagyoutusan__c, YukiStart__c, YukiEnd__c, Omonishiyousiteiruyuki__c, Shiyouyukiyouza__c, Moshikomikikkake__c, Kanyudate__c, Kanyunengappiwareki__c, Kanyumankimonth__c, Kyuhukisonitigaku__c, Nownitigaku__c, M_hokenryonitigaku__c, TokuteiGyomu__c FROM Account WHERE Id = '$id'";
  try {
    $response = $_con->query($query);

    $queryResult = new QueryResult($response);

    for ($queryResult->rewind(); $queryResult->pointer < $queryResult->size; $queryResult->next()) {
      array_push($returns, $queryResult->current());
    }
  } catch (Exception $e) {
    err_die(__LINE__, __FUNCTION__ . "["  . __LINE__ . "]: ". $e->getMessage());
  }
  return $returns[0];
}


/**
 * 20181216 Y.Horino
 * 窓口番号で窓口会社情報を取得
 * @param  Integer $madoguchiNo 窓口番号
 * @return Object          顧客/Account
 */
function getMadoguchi($madoguchiNo){
  global $_con;

  $returns = array();
  $query = "SELECT No__c, Name, Phone, Fax, Email__c,  BillingPostalCode, BillingState, BillingCity, BillingStreet, Tantousya__c FROM Account WHERE RecordType.Name = '窓口会社' AND No__c = '$madoguchiNo'";
  try {

    $response = $_con->query($query);

    $queryResult = new QueryResult($response);

    for ($queryResult->rewind(); $queryResult->pointer < $queryResult->size; $queryResult->next()) {
      array_push($returns, $queryResult->current());
    }
  } catch (Exception $e) {
    err_die(__LINE__, __FUNCTION__ . "["  . __LINE__ . "]: ". $e->getMessage());
  }
  return $returns[0];
}

/**
 * 20181216 Y.Horino
 * 窓口番号で顧客情報を取得
 * @param  Integer $madoguchiNo 窓口番号
 * @return Object          顧客/Account
 */
function getAccountByMadoguchi($madoguchiNo){
  global $_con;

  $month = date('m');
  if(intval($month) > 3) $nendomatsu_y = date('Y')+1;
  else $nendomatsu_y = date('Y');
  $nendomatsu = date($nendomatsu_y.'-03-31');
  $returns = array();
  $query = "SELECT Id, PersonContactId, CellsNo__c, Name, LastName, FirstName, Furi__c, Sei__c, PersonBirthdate, Phone, PersonMobilePhone, Fax, PersonEmail, PersonMailingAddress, BillingPostalCode, BillingState, BillingCity, BillingStreet, Moshikomisarerukata__c, KojiType__c, Kojigutaiteki__c, Jyosen__c, Funjintusansannen__c, FunjinStart__c, FunjinEnd__c, Omonasagyoufunjin__c, Sagyounaiyoufunjin__c, Shindousagyouninen__c, ShindoStart__c, ShindoEnd__c, Omonishiyoukougu__c, Shindoukougu__c, Namarisagyoutusan__c, NamariStart__c, NamariEnd__c, Omonasagyounamari__c, Sagyounaiyounamari__c, Yukisagyoutusan__c, YukiStart__c, YukiEnd__c, Omonishiyousiteiruyuki__c, Shiyouyukiyouza__c, Moshikomikikkake__c, Kanyudate__c, Kanyunengappiwareki__c, Kanyumankimonth__c, Kyuhukisonitigaku__c, Nownitigaku__c, M_hokenryonitigaku__c, TokuteiGyomu__c FROM Account WHERE torimatome_no__c = '$madoguchiNo' AND Nendokoshinsya__c = TRUE ";
  try {

    $response = $_con->query($query);

    $queryResult = new QueryResult($response);

    for ($queryResult->rewind(); $queryResult->pointer < $queryResult->size; $queryResult->next()) {
      array_push($returns, $queryResult->current());
    }
  } catch (Exception $e) {
    err_die(__LINE__, __FUNCTION__ . "["  . __LINE__ . "]: ". $e->getMessage());
  }
 
  return json_decode(json_encode($returns), true);
}


/**
 * 会員番号で顧客情報を取得
 * @param  Integer $cellNo 会員番号
 * @return Object          顧客/Account
 */
function getAccount($cellNo){
  global $_con;

  $returns = array();
  // $query = "SELECT Id, CellsNo__c, Name, LastName, FirstName, Furi__c, PersonBirthdate, Phone, PersonHomePhone, PersonMobilePhone, Fax, PersonEmail, PersonMailingAddress, PersonOtherAddress, BillingPostalCode, Kanyudate__c, Kanyunengappiwareki__c, Kanyumankimonthsasiwareki__c, Kyuhukisonitigaku__c, M_hokenryonitigaku__c, TokuteiGyomu__c FROM Account WHERE CellsNo__c = " . $cellNo;
  $query = "SELECT Id, PersonContactId, Kyuhukisonitigaku_Int__c, CellsNo__c, Name, LastName, FirstName, Furi__c, Sei__c, PersonBirthdate, Phone, PersonMobilePhone, Fax, PersonEmail, PersonMailingAddress, BillingPostalCode, BillingState, BillingCity, BillingStreet, Moshikomisarerukata__c, KojiType__c, Kojigutaiteki__c, Jyosen__c, Funjintusansannen__c, FunjinStart__c, FunjinEnd__c, Omonasagyoufunjin__c, Sagyounaiyoufunjin__c, Shindousagyouninen__c, ShindoStart__c, ShindoEnd__c, Omonishiyoukougu__c, Shindoukougu__c, Namarisagyoutusan__c, NamariStart__c, NamariEnd__c, Omonasagyounamari__c, Sagyounaiyounamari__c, Yukisagyoutusan__c, YukiStart__c, YukiEnd__c, Omonishiyousiteiruyuki__c, Shiyouyukiyouza__c, Moshikomikikkake__c, Kanyudate__c, Kanyunengappiwareki__c, Kanyumankimonth__c, Kyuhukisonitigaku__c, Nownitigaku__c, M_hokenryonitigaku__c, TokuteiGyomu__c FROM Account WHERE CellsNo__c = '$cellNo'";
  // info("query :".$query);
  // $consumers = $_con->query($query);
  try {
    // $describAcc = $_con->describeSObject('Account');
    // var_dump($describAcc->recordTypeInfos);

    $response = $_con->query($query);

    $queryResult = new QueryResult($response);

    for ($queryResult->rewind(); $queryResult->pointer < $queryResult->size; $queryResult->next()) {
      array_push($returns, $queryResult->current());
    }
    // var_dump($returns);
  } catch (Exception $e) {
    err_die(__LINE__, __FUNCTION__ . "["  . __LINE__ . "]: ". $e->getMessage());
  }
  return $returns[0];
}

/**
 * 会員番号で顧客情報を取得
 * @param  Integer $cellNo 会員番号
 * @return Object          顧客/Contact
 */
function getContact($cellNo){
  global $_con;

  $returns = array();
  // init();
	// sf_login();

  // $query = "SELECT Id, CellsNo__c, Name, LastName, FirstName, Furi__c, PersonBirthdate, Phone, PersonHomePhone, PersonMobilePhone, Fax, PersonEmail, PersonMailingAddress, PersonOtherAddress, BillingPostalCode, Kanyudate__c, Kanyunengappiwareki__c, Kanyumankimonthsasiwareki__c, Kyuhukisonitigaku__c, M_hokenryonitigaku__c, TokuteiGyomu__c FROM Account WHERE CellsNo__c = " . $cellNo;
  $query = "SELECT Id, CellsNo__c, Name, LastName, FirstName, Birthdate, Phone, MobilePhone, Fax, Email, MailingAddress, BillingPostalCode FROM Contact WHERE CellsNo__c = '$cellNo'";
  info("query :".$query);
  // $consumers = $_con->query($query);
  try {
    $response = $_con->query($query);

    $queryResult = new QueryResult($response);

    for ($queryResult->rewind(); $queryResult->pointer < $queryResult->size; $queryResult->next()) {
      array_push($returns, $queryResult->current());
    }
    // var_dump($returns);
  } catch (Exception $e) {
    err_die(__LINE__, __FUNCTION__ . "["  . __LINE__ . "]: ". $e->getMessage());
  }
  return $returns[0];
}

/**
 * 会員番号で新しいケースを作成
 * @param  string $cellNo 会員番号
 * @return null         無
 */
function creatCase($cellNo) {
  global $_con;
  try {
    $describCase = $_con->describeSObject('Case');
    var_dump($describCase);
    $rtId;
    foreach($describCase->recordTypeInfos as $rt) {
      if ($rt->name == "新規申込（RJC）") {
        $rtId = $rt->recordTypeId;
      }
    }

    $Account = getAccount($cellNo);
    $fields = array (
      "ContactId" => $Account->fields->PersonContactId,
      "Origin" => "Web",
      "recordTypeId" => $rtId
    );

    $sobj = new SObject();
    $sobj->fields = $fields;
    $sobj->type = 'Case';

    $response = $_con->create(array($sobj));
  } catch (Exception $e) {
    err_die(__LINE__, __FUNCTION__ . "["  . __LINE__ . "]: ". $e->getMessage());
  }
}

/**
 * パスワードを変更
 * @param  string $cellNo 会員番号
 * @param  string $oldPwd 旧い暗証番号
 * @param  string $newPwd 新しい暗証番号
 * @return boolean        旧い番号の入力が間違ってる場合に、FALSEを返す
 */
/*
function changePass($cellNo, $oldPwd, $newPwd) {
  global $_con;
  try {
    if (checkCryptPwd($cellNo, $oldPwd) != TRUE) {
      return FALSE;
    } else {
      $sobj = getAccount($cellNo);
      $fieldsToUpdate = array (
        'Password__c' => encrypt("$newPwd")
      );
      $sobj->fields = $fieldsToUpdate;
      $response = $_con->update(array($sobj));
      return TRUE;
    }
  } catch (Exception $e) {
    err_die(__LINE__, __FUNCTION__ . "["  . __LINE__ . "]: ". $e->getMessage());
  }
}
*/

/**
 * 会員番号とパスワードの組み合わせを検証
 * @param  string $cellNo   会員番号
 * @param  string $plainPwd パスワード
 * @return boolean          正しいならtrueを返す
 */
/*
function checkCryptPwd($cellNo, $plainPwd) {
  $consumer = getAccount($cellNo);
  $cryptPwd = $consumer->fields->Password__c;

  $plaintext = decrypt(base64_decode($cryptPwd));

  if (strcmp($plaintext, $plainPwd) == 0) {
      return TRUE;
  } else {
      return false;
  }

}
*/


?>
