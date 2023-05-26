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

require_once("$_sf_root/lib/conf.php");
require_once("$_sf_root/lib/soapclient/SforcePartnerClient.php");
require_once("$_sf_root/lib/soapclient/SforceHeaderOptions.php");
require_once("$_sf_root/lib/Print.php");
require_once("$_sf_root/lib/Proxy.php");
require_once("$_sf_root/lib/SfLogin.php");
require_once("$_sf_root/lib/Util.php");

/**
 * 20201021 Y.Horino
 * 顧客情報を全て取得
 * @param  Integer $seiri_no 会員番号
 * @return Object  顧客/Account
 */
function getAccountAll($seiri_no){
  global $_con;

  $returns = array();
  $query = "SELECT LastName,FirstName,BillingPostalCode,BillingState,BillingCity,BillingStreet,Fax,Website,PersonMobilePhone,Name,BillingAddress,PersonEmail,PersonBirthdate,Phone,NoDM__c,FAX_mousikomi_datetime__c,Center__c,PrefectureCodeNew__c,order_no__c,Hokenryoutotal_Int__c,CVNo__c,Kanyutype__c,Center_Formula__c,CenterAddress__c,Torimatome_mail__c,Torimatome_juusho__c,torimatome_ninzu__c,Torimatome_tanntousha__c,Torimatome_tanntoutel__c,Torimatome_tantouyakushoku__c,Torimatome_telno__c,Torimatometouroku__c,torimatome_no__c,Furi__c,Furi2__c,Furigana__c,Email__c,Namarisagyoutusan__c,NamariStart_Wareki__c,NamariStart__c,NamariEnd_Wareki__c,NamariEnd__c,NamariTsusan__c,Kanyukaisuu__c,Kanyuhopemonth__c,Kanyuhopedatemonth__c,Kanyuhopemonthewareki__c,Kanyukikan__c,Kanyumonthwarekisasi__c,Kanyusyaayotype__c,Kanyusyasyomaisenddate__c,Kanyusyasendprint__c,KanyushashoSoufuZangaku__c,Kanyusenddate__c,KanyushashoSoufuDTZangaku__c,kanyusyasyo_hakkou__c,Kanyusyasyomailsenddatenk__c,Kanyusyasyoprintzumi__c,Kanyusyaprintdatetime__c,Device__c,Kanyudate__c,Kanyunengappiwareki__c,Kanyunengappiwarekinenko__c,Kanyunendowareki__c,Kanyuumankidukibkseireki__c,Kanyumankiheiseinozoku__c,Kanyumankimonth__c,Kanyumankimonthnk__c,Kanyumankibinew__c,Kanyuumankibibksaireki__c,Kanyumankiwareki__c,Kanyumankiwarekink__c,KanyumankibiBK__c,Kazokuigaiumu__c,Newkaihi__c,KaihiZangaku__c,Kainyugokei__c,Newkaihi_Int__c,Kantokusyo_address__c,Kyuhukisonitigaku__c,Kyuhukisonitigaku_Int__c,M_hokenryonitigaku__c,WorkContents__c,Syomeisyokakuniaildate__c,KingakuAnnai__c,Keiyakukikan__c,PersonMobilePhone_NoDash__c,Mobile_wh__c,PersonMobilePhonesasi__c,Kenshinkakunin__c,NKkenkoushindan__c,Kenkoshindankijitu__c,Kenkoshindayoyaku__c,Kenkoushindayoukakunin__c,Kenkoshindayohi__c,Nownitigaku__c,Name_fullsp__c,Shoumeisho_one__c,Shoumeisho_two__c,Field1__c,KojiType__c,Kojigutaiteki__c,KongojyujisuruNamari__c,Kongojyujisurushindou__c,Kongojyujifunjin__c,Kongojyujisuruyuki__c,Kongojyuujiyousetu__c,re_entry__c,Sagyoubasyoyuki__c,Sagyounaiyounamari__c,Sagyounaiyoufunjin__c,Shiyoukougu__c,Shiyouyukiyouza__c,ShiharaisougakuShukei__c,shiharai_kigen_nenkou__c,shiharai_kigen2_nenkou__c,ShiharaiType__c,ShiharaisougakutorimatomeInt__c,Nexthurikaebi_text__c,Nextseikyumonth__c,Omonasagyounamari__c,Omonasagyoufunjin__c,Omonishiyousiteiruyuki__c,Omonishiyoukougu__c,Tetuzukikaishisenddate__c,Tetuzukikanryomailsenddate__c,Tetsuzukikaishi__c,tetudukikaisibi__c,TetuzukiKanryo__c,Uketukedate__c,Uketukedatewarekiyobi__c,CVReceiptTime__c,CVReceiptDate__c,Addresssasi__c,Address_Full__c,Jyosen__c,ShonintsuchitochakuFlg__c,ShonintsuchitochakuDT__c,SyomeiStatus__c,SyomeiDate__c,Shoumeishokigenseireki__c,Syomeisyokigen__c,Syomeisyokigenwarekiyobi__c,Syomeisyojyuryoumailsenddateup__c,Syomeisyojyuryou__c,ShoumeishoTokusoku__c,ShoumeishoTokusokuMail__c,Syomeisyotokusokukigendate__c,Syomeisyotokuzokukigendatewareki__c,Shoumeisho_no_one__c,Shoumeisho_no_two__c,Frikomikigenseireki__c,Furikomikigen__c,Furikomikigenwarekiyobi__c,Furikomikoza__c,Furikomikozank__c,Frikaejouhoutouroku__c,Frikaetourokunichiji__c,FurikaefubiFlg__c,Shindousagyouninen__c,Shindoukougu__c,ShindoStart_Wareki__c,ShindoStart__c,ShindoEnd_Wareki__c,ShindoEnd__c,ShindoTsusan__c,Furikomi_mousikomisya__c,Moshikominaiyoukakuninsya__c,SyoruiStatus__c,SyoruiDate__c,ShinntyokushutsuryokuShinntyokushutsuryo__c,Status__c,Sei__c,CellsNo__c,Brithday_sai_wa__c,Seinengappiwareki__c,Madoguti__c,No__c,SendLimit__c,Sofujoprintnk__c,Sofujoprintdatenk__c,trouble_alert__c,Daihyosya__c,DaijyoKeitai__c,DaijyoKeitai_NoDash__c,Daihyouyakusyoku__c,Daihyouyakusyokusasi__c,DaihyousyaFuri__c,DaihyousyaFurisasi__c,Daihyosyasasi__c,Dattaikibouni__c,Dattaishinseizumi__c,DattaiNenggapi__c,Tantousya__c,TantousyaKeitai__c,TantousyaKeitai_NoDash__c,TantousyaKeitaisasi__c,Tantousyozokuyakusyoku__c,Tantousyozokuyakusyokusasi__c,TantousyaFuri__c,TantousyaFurisasi__c,Tantousyasasi__c,Bumon__c,Birthdatewareki__c,DantaiURL__c,DantaiName__c,Phone_NoDash__c,Phonesasi__c,PrefCode__c,TokuteiGyomu__c,TokuteiUmu__c,Tokusokumailsenddate__c,Tokusokunyukinmailsenddate__c,Mnyukaikin__c,Mnyukaikin_Int__c,NyukinannaitaishoTorimatome__c,Nyukinkakunin__c,Nyuukinkakuninbizangaku__c,NyukinkakuninbiNK__c,NyukinDate__c,NyukinkakuninzangakuDT__c,Nyukinkakunindatewareki__c,NyukinkakunindateNKwareki__c,Nyukinkakuninzangaku__c,NyukinCancelMail__c,Nyukinkingaku__c,Nyukinkingakuzangaku__c,Nyukinkouzabangou__c,Nyukinkouzazangaku__c,Nyukinshubetsu__c,Nyuukinshubetsuzangaku__c,Nyukinnmeigitorimatome__c,Nyukinkiroku__c,Nyukinhenkinkirokuzangaku__c,Nendokoshinninzu__c,Nendokoshinsya__c,Nenkoutaishousha_subete__c,MiharaiTukisu__c,Old__c,Hituyounakikan__c,Fusokukingaku__c,Fusokukingakuzangaku__c,Funjintusansannen__c,FunjinStart_Wareki__c,FunjinStart__c,FunjinEnd_Wareki__c,FunjinEnd__c,FunjinTsusan__c,NKhenko__c,Henkinkingaku__c,HenkinjitesuryoDattai__c,Furikomizumi__c,Henkinfurikomiday__c,Henkinfurikomidate__c,Henkinfurikomiwarkekiyobi__c,Henkinsakikoza__c,Henkinsakikozano__c,HenkinsogakuDattai__c,Hokenryounew__c,HokenryouZangaku_int__c,HokenryouZangaku__c,ShiharaisougakuZangaku__c,InsuranceFee_Zangaku__c,InsuranceFee_New__c,Hokenryoutotal__c,Hokenryoutorimatomenk__c,Hokenryoutorimatome__c,ShiharaisougakunkINT__c,Hokenryounew_Int__c,Nenkohokenryo__c,Nenkohokenryo_calc__c,NenkohokenryoINT__c,HonnenHitoriOyakata__c,Maitukihurikae__c,Remind__c,Miseinen__c,miseinen_info__c,Cancel__c,Cancelmailsenddate__c,CancelMail__c,Menkyosyotemp__c,Yukisagyoutusan__c,YukiStart_Wareki__c,YukiStart__c,YukiEnd_Wareki__c,YukiEnd__c,YukiTsusan__c,Postcodesasi__c,Yousetusagyouumu__c,RenrakuIraiNaiyou__c,RousaiJikokaisuu__c,RousaiJikobi__c,RousaiShinseiumu__c,Rousaihokenno__c,SendHokenBango__c FROM Account WHERE CellsNo__c = '$seiri_no'";
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
 * 20200917 Y.Horino
 * 再加入　顧客情報を取得
 * @param  Integer $seiri_no 会員番号
 * @return Object  顧客/Account
 */
function mp_getAccount_Re($seiri_no){
  global $_con;

  $returns = array();
  $query = "SELECT Rousaihokenno__c,CellsNo__c,LastName,FirstName,Furi__c,Furi2__c,Seinengappiwareki__c,PersonBirthdate,Kanyunengappiwareki__c,Kanyumankiwareki__c,Center_Formula__c,Nyukinshubetsu__c,Kanyuhopemonth__c,Kanyutype_Mail__c,Kyuhukisonitigaku_Int__c,kanyusyasyo_hakkou__c,Hokenryoutotal_Int__c,Sei__c,BillingPostalCode,BillingState,BillingCity,BillingStreet,PersonMobilePhone,PersonEmail,KojiType__c,Jyosen__c,Funjintusansannen__c,Sagyounaiyoufunjin__c,Shindousagyouninen__c,Shindoukougu__c,Namarisagyoutusan__c,Sagyounaiyounamari__c,Yukisagyoutusan__c,Sagyoubasyoyuki__c,Shiyouyukiyouza__c,CenterAddress__c FROM Account WHERE CellsNo__c = '$seiri_no'";
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
 * 20200727 Y.Horino
 * マイページ　顧客情報を取得
 * @param  Integer $seiri_no 会員番号
 * @return Object  顧客/Account
 */
function mp_getAccount($seiri_no){
  global $_con;

  if(strlen($seiri_no)==6){
   $seiri_no = substr($seiri_no,0,2).'00'.substr($seiri_no,2,4);
  }
 
  $returns = array();
  $query = "SELECT Rousaihokenno__c,CellsNo__c,LastName,FirstName,Furi__c,Furi2__c,Seinengappiwareki__c,PersonBirthdate,Kanyunengappiwareki__c,Kanyumankiwareki__c,Center_Formula__c,Nyukinshubetsu__c,Kanyuhopemonth__c,Kanyutype_Mail__c,Kyuhukisonitigaku_Int__c,kanyusyasyo_hakkou__c,Hokenryoutotal_Int__c,Sei__c,BillingPostalCode,BillingState,BillingCity,BillingStreet,PersonMobilePhone,PersonEmail,KojiType__c,Jyosen__c,Funjintusansannen__c,Sagyounaiyoufunjin__c,Shindousagyouninen__c,Shindoukougu__c,Namarisagyoutusan__c,Sagyounaiyounamari__c,Yukisagyoutusan__c,Shiyouyukiyouza__c,CenterAddress__c,PrefectureCodeNew__c,PrefCode__c FROM Account WHERE CellsNo__c = '$seiri_no'";
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
 * 20210913 Y.Horino
 * マイページ　事務組合会社情報を取得
 * @param  Integer $kaiin_no 会員No
 * @return Object  顧客/Account
 */
function mp_getAccount_kaisya($kaiin_no){
  global $_con;

  $returns = array();
  $query = "SELECT ID,Rousaihokenno__c,jimuKaiinNo__c,Name,Furi__c,Furi2__c,tmp_password__c,Phone,PersonEmail,Email__c FROM Account WHERE RecordType.Name = '事務組合会社' AND jimuKaiinNo__c = '$kaiin_no'";
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

function getJimuKanyusya($kaisya_id){
  global $_con;

  $returns = array();
  $query = "SELECT Id, No__c, Name, Furi__c, Phone, Fax, Email__c,  BillingPostalCode, BillingState, BillingCity, BillingStreet, PrefectureCodeNew__c, torimatome_ninzu__c, PrefCode__c, Hokenryoutorimatome__c, Daihyosya__c, DaihyousyaFuri__c, DaijyoKeitai__c, Tantousya__c, TantousyaFuri__c, Torimatome_tanntoutel__c, HoujinBangou__c, jimuRoudouhokenBangou0__c, jimuRoudouhokenBangou2__c, jimuRoudouhokenBangou5__c, jimuRoudouhokenBangou6__c, PersonBirthdate, Kyuhukisonitigaku__c,Nownitigaku__c,Kanyudate__c,CellsNo__c,Kanyumankibinew__c,DattaiNenggapi__c FROM Account WHERE RecordType.Name = '事務組合加入者' AND jimuKaisya__c = '$kaisya_id' order by CellsNo__c asc";
  try {

    $response = $_con->query($query);

    $queryResult = new QueryResult($response);

    for ($queryResult->rewind(); $queryResult->pointer < $queryResult->size; $queryResult->next()) {
      array_push($returns, $queryResult->current());
    }
  } catch (Exception $e) {
    err_die(__LINE__, __FUNCTION__ . "["  . __LINE__ . "]: ". $e->getMessage());
  }
  return $returns;
}

function getKaisyabyKaiinNo($kaiin_no){
  global $_con;

  $returns = array();
  $query = "SELECT Id, jimuKaiinNo__c, No__c, Name, Furi__c, Phone, Fax, Email__c,  BillingPostalCode, BillingState, BillingCity, BillingStreet, PrefectureCodeNew__c, torimatome_ninzu__c, PrefCode__c, Hokenryoutorimatome__c, Daihyosya__c, DaihyousyaFuri__c, DaijyoKeitai__c, Tantousya__c, TantousyaFuri__c, Torimatome_tanntoutel__c, HoujinBangou__c, jimuRoudouhokenBangou0__c, jimuRoudouhokenBangou2__c, jimuRoudouhokenBangou5__c, jimuRoudouhokenBangou6__c, jimuIkkatuyuukiRousaihokenBangou__c, jimuKanyusya1_Name__c, jimuKanyusya2_Name__c, jimuKanyusya3_Name__c, jimuKanyusya4_Name__c, jimuKanyusya5_Name__c, Kanyudate__c,order_no__c, tetudukikaisibi__c, DattaiNenggapi__c,jimusyahokigou1__c, jimusyahokigou2__c, jimukyokaikenpono__c, jimuKoyouhokenBangou__c, KojiType__c,Kanyumankibinew__c FROM Account WHERE RecordType.Name = '事務組合会社' AND jimuKaiinNo__c = '$kaiin_no' order by CreatedDate desc";
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

function getKaisyabyOrderNo($order_no){
  global $_con;

  $returns = array();
  $query = "SELECT Id, No__c, Name, Furi__c, Phone, Fax, Email__c,  BillingPostalCode, BillingState, BillingCity, BillingStreet, PrefectureCodeNew__c, torimatome_ninzu__c, PrefCode__c, Hokenryoutorimatome__c, Daihyosya__c, DaihyousyaFuri__c, DaijyoKeitai__c, Tantousya__c, TantousyaFuri__c, Torimatome_tanntoutel__c, HoujinBangou__c, jimuRoudouhokenBangou5__c, jimuKanyusya1_Name__c, jimuKanyusya2_Name__c, jimuKanyusya3_Name__c, jimuKanyusya4_Name__c, jimuKanyusya5_Name__c, Kanyudate__c, KojiType__c FROM Account WHERE RecordType.Name = '事務組合会社' AND order_no__c = '$order_no' order by CreatedDate desc";
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
 * 20200307 Y.Horino
 * 窓口会社番号と電話番号で窓口会社情報を取得
 * @param  Integer $madoguchiNo 窓口会社番号
 * @param  Integer $madoguchiTelNo 窓口電話番号
 * @return Object          顧客/Account
 */
function getMadoguchibyMadoguchiNoAndTelNo($madoguchiNo, $madoguchiTelNo, $madoguchiName){
  global $_con;

  $returns = array();
  $query = "SELECT Id, No__c, Name, Furi__c, Daihyosya__c, DaihyousyaFuri__c, Tantousya__c, TantousyaFuri__c, TantousyaKeitai__c, Phone, Fax, Email__c,  BillingPostalCode, BillingState, BillingCity, BillingStreet FROM Account WHERE RecordType.Name = '窓口会社' AND (
  (No__c = '$madoguchiNo' AND (Phone_NoDash__c = '$madoguchiTelNo' OR Phone = '$madoguchiTelNo')) OR 
  (No__c = '$madoguchiNo' AND Name = '$madoguchiName') OR 
  (Name = '$madoguchiName' AND (Phone_NoDash__c = '$madoguchiTelNo' OR Phone = '$madoguchiTelNo')) )
  order by CreatedDate desc";
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
  $query = "SELECT Sonobadeuketori__c, Kanyuhopemonth__c, Kanyukikan__c, Newkaihi__c, KaihiZangaku__c,  M_hokenryonitigaku__c, Nownitigaku__c, ShiharaiType__c, Bumon__c, Mnyukaikin__c,   MiharaiTukisu__c, Hokenryounew__c, HokenryouZangaku__c, Nenkohokenryo__c FROM InsuranceFee__c WHERE Kanyuhopemonth__c = '$khm' AND Kanyukikan__c = $Kanyukikan AND M_hokenryonitigaku__c = '$M_hokenryonitigaku' AND Bumon__c = 'RJC'";
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
  $query = "SELECT Id, Status__c, Tetsudukishintyoku__c, CellsNo__c, Name, LastName, FirstName, Furi__c, Sei__c, PersonBirthdate, Phone, PersonMobilePhone, Fax, PersonEmail, PersonMailingAddress, BillingPostalCode, BillingState, BillingCity, BillingStreet, KojiType__c, Kojigutaiteki__c, Jyosen__c, Funjintusansannen__c, FunjinStart__c, FunjinEnd__c, Omonasagyoufunjin__c, Sagyounaiyoufunjin__c, Shindousagyouninen__c, ShindoStart__c, ShindoEnd__c, Omonishiyoukougu__c, Shindoukougu__c, Namarisagyoutusan__c, NamariStart__c, NamariEnd__c, Omonasagyounamari__c, Sagyounaiyounamari__c, Yukisagyoutusan__c, YukiStart__c, YukiEnd__c, Omonishiyousiteiruyuki__c, Shiyouyukiyouza__c, Moshikomikikkake__c, Kanyudate__c, Kanyunengappiwareki__c, Kanyumankimonth__c, Kyuhukisonitigaku__c, Nownitigaku__c, M_hokenryonitigaku__c, TokuteiGyomu__c FROM Account WHERE Id = '$id'";
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
  $query = "SELECT Id, PersonContactId, CellsNo__c, Name, LastName, FirstName, Furi__c, Sei__c, PersonBirthdate, Phone, PersonMobilePhone, Fax, PersonEmail, PersonMailingAddress, BillingPostalCode, BillingState, BillingCity, BillingStreet, KojiType__c, Kojigutaiteki__c, Jyosen__c, Funjintusansannen__c, FunjinStart__c, FunjinEnd__c, Omonasagyoufunjin__c, Sagyounaiyoufunjin__c, Shindousagyouninen__c, ShindoStart__c, ShindoEnd__c, Omonishiyoukougu__c, Shindoukougu__c, Namarisagyoutusan__c, NamariStart__c, NamariEnd__c, Omonasagyounamari__c, Sagyounaiyounamari__c, Yukisagyoutusan__c, YukiStart__c, YukiEnd__c, Omonishiyousiteiruyuki__c, Shiyouyukiyouza__c, Moshikomikikkake__c, Kanyudate__c, Kanyunengappiwareki__c, Kanyumankimonth__c, Kyuhukisonitigaku__c, Nownitigaku__c, M_hokenryonitigaku__c, TokuteiGyomu__c FROM Account WHERE torimatome_no__c = '$madoguchiNo' AND Nendokoshinsya__c = TRUE ";
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
  $query = "SELECT Id, PersonContactId, Kyuhukisonitigaku_Int__c, CellsNo__c, Name, LastName, FirstName, Furi__c, Sei__c, PersonBirthdate, Phone, PersonMobilePhone, Fax, PersonEmail, PersonMailingAddress, BillingPostalCode, BillingState, BillingCity, BillingStreet, KojiType__c, Kojigutaiteki__c, Jyosen__c, Funjintusansannen__c, FunjinStart__c, FunjinEnd__c, Omonasagyoufunjin__c, Sagyounaiyoufunjin__c, Shindousagyouninen__c, ShindoStart__c, ShindoEnd__c, Omonishiyoukougu__c, Shindoukougu__c, Namarisagyoutusan__c, NamariStart__c, NamariEnd__c, Omonasagyounamari__c, Sagyounaiyounamari__c, Yukisagyoutusan__c, YukiStart__c, YukiEnd__c, Omonishiyousiteiruyuki__c, Shiyouyukiyouza__c, Moshikomikikkake__c, Kanyudate__c, Kanyunengappiwareki__c, Kanyumankimonth__c, Kyuhukisonitigaku__c, Nownitigaku__c, M_hokenryonitigaku__c, TokuteiGyomu__c FROM Account WHERE CellsNo__c = '$cellNo'";
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

function testUpdate($cellNo, $newFirstName) {
  global $_con;
  try {
     $sobj = getAccount($cellNo);
     $fieldsToUpdate = array (
       'FirstName' => $newFirstName
     );
     $sobj->fields = $fieldsToUpdate;
     $response = $_con->update(array($sobj));
     return TRUE;
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


// 20220115 パスワードDBをサーバDBからSFへ移行

function jm_getjimuMypage($id){
  global $_con;

  $returns = array();
  $query = "SELECT Id,create_date__c,email__c,id__c,inner_id__c,password__c,tmp_password__c,update_date__c FROM jimuMypage__c WHERE id__c='$id'";
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

function jm_getLoginMail($email){
  global $_con;

  $returns = array();
  $query = "SELECT id__c, password__c FROM jimuMypage__c WHERE email__c='$email'";
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

function getAccountbyMail($email){
  global $_con;

  $returns = array();
  $query = "SELECT Id, jimuKaiinNo__c FROM Account WHERE Email__c='$email' AND jimuKaiinNo__c <> ''";
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

function jm_getLoginData($id){
  global $_con;

  $returns = array();
  $query = "SELECT id__c, password__c, email__c FROM jimuMypage__c WHERE id__c='$id'";
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

function jm_getId($inner_id){
  global $_con;

  $returns = array();
  $query = "SELECT id__c FROM jimuMypage__c WHERE inner_id__c='$inner_id'";
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

function jm_getEmail($inner_id){
  global $_con;

  $returns = array();
  $query = "SELECT email__c FROM jimuMypage__c WHERE inner_id__c='$inner_id'";
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

function jm_getUpdateDate($inner_id){
  global $_con;

  $returns = array();
  $query = "SELECT update_date__c FROM jimuMypage__c WHERE inner_id__c='$inner_id'";
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

function jm_settmpPW($no, $tmppass, $email){
  global $_con;
 
  $returns = array();
  $query = "SELECT email__c from jimuMypage__c where id__c<>'$no' and email__c='$email'";
  try {

    $response = $_con->query($query);

    $queryResult = new QueryResult($response);

    for ($queryResult->rewind(); $queryResult->pointer < $queryResult->size; $queryResult->next()) {
      array_push($returns, $queryResult->current());
    }
  } catch (Exception $e) {
    err_die(__LINE__, __FUNCTION__ . "["  . __LINE__ . "]: ". $e->getMessage());
  }
 
//var_dump($returns[0]);
  if($returns[0] != null){
    return '';
  }
 
  $tmppass_hash = $tmppass;
  $inner_id = rand(100000, 999999);

  try {
     $sobj = jm_getjimuMypage($no);
     if($sobj == null){
      $item['create_date__c'] = date('Y-m-d H:i:s');
      $item['update_date__c'] = date('Y-m-d H:i:s');
      $item['email__c'] = $email;
      $item['id__c'] = $no;
      $item['inner_id__c'] = $inner_id;
      $item['password__c'] = $tmppass_hash;
      $item['tmp_password__c'] = $tmppass_hash;
      createjimuMypage($item);
     } else {
      $fieldsToUpdate = array (
       'update_date__c' => date('Y-m-d H:i:s'),
       'email__c' => $email,
       'inner_id__c' => $inner_id,
       'password__c' => $tmppass_hash,
       'tmp_password__c' => $tmppass_hash
      );
      $sobj->fields = $fieldsToUpdate;
      $response = $_con->update(array($sobj));
     }
     return $inner_id;
  } catch (Exception $e) {
    err_die(__LINE__, __FUNCTION__ . "["  . __LINE__ . "]: ". $e->getMessage() . var_dump($fieldsToUpdate));
  }
}

function createjimuMypage($item) {
  global $_con;
  try {
   
    $fields = array (
     "create_date__c"	 => $item['create_date__c'],
     "email__c"	 => $item['email__c'],
     "id__c"	 => $item['id__c'],
     "inner_id__c"	 => $item['inner_id__c'],
     "password__c"	 => $item['password__c'],
     "tmp_password__c"	 => $item['tmp_password__c'],
     "update_date__c"	 => $item['update_date__c']
    );
   
    $sobj = new SObject();
    $sobj->fields = $fields;
    $sobj->type = 'jimuMypage__c';

    $response = $_con->create(array($sobj));
  } catch (Exception $e) {
    err_die(__LINE__, __FUNCTION__ . "["  . __LINE__ . "]: ". $e->getMessage());
  }
}

function jm_changePW($no, $newpass){
  global $_con;
 
  try {
     $sobj = jm_getjimuMypage($no);
     $fieldsToUpdate = array (
      'update_date__c' => date('Y-m-d H:i:s'),
      'password__c' => $newpass,
      'inner_id__c'	 => $newpass,
      'tmp_password__c' => $newpass
     );
     $sobj->fields = $fieldsToUpdate;
     $response = $_con->update(array($sobj));
     return true;
  } catch (Exception $e) {
    err_die(__LINE__, __FUNCTION__ . "["  . __LINE__ . "]: ". $e->getMessage() . var_dump($fieldsToUpdate));
  }
}


// 20220115 パスワードDBをサーバDBからSFへ移行


?>