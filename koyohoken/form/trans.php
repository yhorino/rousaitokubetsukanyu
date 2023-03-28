<?php
session_start();
header("Content-type: text/html;charset=utf-8");
require_once('../../form/function.php');
require_once('../../form/Mobile_Detect.php');

//include('session_check.php');


  require_once("../../form/bin/sf_Api.php");
  init();
  sf_login();


$detect = new Mobile_Detect;
 
		$device = 'PC';
		if($detect->isMobile()){
			$device = 'スマホ';
		}

// 各ページから遷移したときに全てのPOST項目をSESSIONに保存する
   $params = array('kikan', 'ninzu', 'koyo_hajimete', 'shiharai_tsuki', 'sougaku', 'rjc_kanyu', 'roudouhoken_no', 'roudouhoken_no1', 'roudouhoken_no2', 'type', 'kaisyamei', 'kaisyamei_furi', 'zip', 'pref', 'city', 'address', 'apart', 'denwabangou', 'faxbangou', 'mail', 'daihyosyamei_sei', 'daihyosyamei_mei', 'daihyosyamei_furi_sei', 'daihyosyamei_furi_mei', 'daihyosyayakusyoku', 'jyugyoinmei_sei1', 'jyugyoinmei_mei1', 'jyugyoinmei_furi_sei1', 'jyugyoinmei_furi_mei1', 'gekkyu1', 'birthday_y1', 'birthday_m1', 'birthday_d1', 'mynumber1', 'zip1', 'pref1', 'city1', 'address1', 'address21', 'apart1', 'jyugyoinmei_sei2', 'jyugyoinmei_mei2', 'jyugyoinmei_furi_sei2', 'jyugyoinmei_furi_mei2', 'gekkyu2', 'birthday_y2', 'birthday_m2', 'birthday_d2', 'mynumber2', 'zip2', 'pref2', 'city2', 'address2', 'apart2', 'jyugyoinmei_sei3', 'jyugyoinmei_mei3', 'jyugyoinmei_furi_sei3', 'jyugyoinmei_furi_mei3', 'gekkyu3', 'birthday_y3', 'birthday_m3', 'birthday_d3', 'mynumber3', 'zip3', 'pref3', 'city3', 'address3', 'apart3', 'jyugyoinmei_sei4', 'jyugyoinmei_mei4', 'jyugyoinmei_furi_sei4', 'jyugyoinmei_furi_mei4', 'gekkyu4', 'birthday_y4', 'birthday_m4', 'birthday_d4', 'mynumber4', 'zip4', 'pref4', 'city4', 'address4', 'apart4', 'jyugyoinmei_sei5', 'jyugyoinmei_mei5', 'jyugyoinmei_furi_sei5', 'jyugyoinmei_furi_mei5', 'gekkyu5', 'birthday_y5', 'birthday_m5', 'birthday_d5', 'mynumber5', 'zip5', 'pref5', 'city5', 'address5', 'apart5', 'jyugyoinmei_sei6', 'jyugyoinmei_mei6', 'jyugyoinmei_furi_sei6', 'jyugyoinmei_furi_mei6', 'gekkyu6', 'birthday_y6', 'birthday_m6', 'birthday_d6', 'mynumber6', 'zip6', 'pref6', 'city6', 'address6', 'apart6', 'jyugyoinmei_sei7', 'jyugyoinmei_mei7', 'jyugyoinmei_furi_sei7', 'jyugyoinmei_furi_mei7', 'gekkyu7', 'birthday_y7', 'birthday_m7', 'birthday_d7', 'mynumber7', 'zip7', 'pref7', 'city7', 'address7', 'apart7', 'jyugyoinmei_sei8', 'jyugyoinmei_mei8', 'jyugyoinmei_furi_sei8', 'jyugyoinmei_furi_mei8', 'gekkyu8', 'birthday_y8', 'birthday_m8', 'birthday_d8', 'mynumber8', 'zip8', 'pref8', 'city8', 'address8', 'apart8', 'jyugyoinmei_sei9', 'jyugyoinmei_mei9', 'jyugyoinmei_furi_sei9', 'jyugyoinmei_furi_mei9', 'gekkyu9', 'birthday_y9', 'birthday_m9', 'birthday_d9', 'mynumber9', 'zip9', 'pref9', 'city9', 'address9', 'apart9', 'jyugyoinmei_sei10', 'jyugyoinmei_mei10', 'jyugyoinmei_furi_sei10', 'jyugyoinmei_furi_mei10', 'gekkyu10', 'birthday_y10', 'birthday_m10', 'birthday_d10', 'mynumber10', 'zip10', 'pref10', 'city10', 'address10', 'apart10', 'shiharai', 'kaisya_id', 'order_no', 'shimebi', 'shiharaibi', 'shiharaibi_month', 'koyo_bangou');
   // データを取得する ＋ 必須入力のvalidate
   foreach($params as $p) {
       if(isset($_POST[$p])){
        $_SESSION[$p] = (string)@$_POST[$p];
       }
   }

switch($_POST['pagename']){

 case 'mitsumori.php':
 {
  session_write_close();
		header('Location: input.php');
  exit;
  break;
 }
 case 'input.php':
 {
  
  $_SESSION['denwabangou'] = telno_split($_SESSION['denwabangou']);
  $_SESSION['faxbangou'] = telno_split($_SESSION['faxbangou']);
  
  $_SESSION['daihyosyamei'] = $_SESSION['daihyosyamei_sei'].'　'.$_SESSION['daihyosyamei_mei'];
  $_SESSION['daihyosyamei_furi'] = $_SESSION['daihyosyamei_furi_sei'].'　'.$_SESSION['daihyosyamei_furi_mei'];
  
  // なぜかループではうまくできなかった
  $_SESSION['jyugyoinmei1'] = $_SESSION['jyugyoinmei_sei1'].'　'.$_SESSION['jyugyoinmei_mei1'];  
  $_SESSION['jyugyoinmei_furi1'] = $_SESSION['jyugyoinmei_furi_sei1'].'　'.$_SESSION['jyugyoinmei_furi_mei1'];
  $_SESSION['jyugyoinmei2'] = $_SESSION['jyugyoinmei_sei2'].'　'.$_SESSION['jyugyoinmei_mei2'];  
  $_SESSION['jyugyoinmei_furi2'] = $_SESSION['jyugyoinmei_furi_sei2'].'　'.$_SESSION['jyugyoinmei_furi_mei2'];
  $_SESSION['jyugyoinmei3'] = $_SESSION['jyugyoinmei_sei3'].'　'.$_SESSION['jyugyoinmei_mei3'];  
  $_SESSION['jyugyoinmei_furi3'] = $_SESSION['jyugyoinmei_furi_sei3'].'　'.$_SESSION['jyugyoinmei_furi_mei3'];
  $_SESSION['jyugyoinmei4'] = $_SESSION['jyugyoinmei_sei4'].'　'.$_SESSION['jyugyoinmei_mei4'];  
  $_SESSION['jyugyoinmei_furi4'] = $_SESSION['jyugyoinmei_furi_sei4'].'　'.$_SESSION['jyugyoinmei_furi_mei4'];
  $_SESSION['jyugyoinmei5'] = $_SESSION['jyugyoinmei_sei5'].'　'.$_SESSION['jyugyoinmei_mei5'];  
  $_SESSION['jyugyoinmei_furi5'] = $_SESSION['jyugyoinmei_furi_sei5'].'　'.$_SESSION['jyugyoinmei_furi_mei5'];
  $_SESSION['jyugyoinmei6'] = $_SESSION['jyugyoinmei_sei6'].'　'.$_SESSION['jyugyoinmei_mei6'];  
  $_SESSION['jyugyoinmei_furi6'] = $_SESSION['jyugyoinmei_furi_sei6'].'　'.$_SESSION['jyugyoinmei_furi_mei6'];
  $_SESSION['jyugyoinmei7'] = $_SESSION['jyugyoinmei_sei7'].'　'.$_SESSION['jyugyoinmei_mei7'];  
  $_SESSION['jyugyoinmei_furi7'] = $_SESSION['jyugyoinmei_furi_sei7'].'　'.$_SESSION['jyugyoinmei_furi_mei7'];
  $_SESSION['jyugyoinmei8'] = $_SESSION['jyugyoinmei_sei8'].'　'.$_SESSION['jyugyoinmei_mei8'];  
  $_SESSION['jyugyoinmei_furi8'] = $_SESSION['jyugyoinmei_furi_sei8'].'　'.$_SESSION['jyugyoinmei_furi_mei8'];
  $_SESSION['jyugyoinmei9'] = $_SESSION['jyugyoinmei_sei9'].'　'.$_SESSION['jyugyoinmei_mei9'];  
  $_SESSION['jyugyoinmei_furi9'] = $_SESSION['jyugyoinmei_furi_sei9'].'　'.$_SESSION['jyugyoinmei_furi_mei9'];
  $_SESSION['jyugyoinmei10'] = $_SESSION['jyugyoinmei_sei10'].'　'.$_SESSION['jyugyoinmei_mei10'];  
  $_SESSION['jyugyoinmei_furi10'] = $_SESSION['jyugyoinmei_furi_sei10'].'　'.$_SESSION['jyugyoinmei_furi_mei10'];
  $_SESSION['kyuyoshiharaibi'] = $_SESSION['shiharaibi_month'].$_SESSION['shiharaibi'];
  $_SESSION['roudouhoken_no'] = $_SESSION['roudouhoken_no1'].'-'.$_SESSION['roudouhoken_no2'];

  if(!isset($_SESSION['order_no']) || $_SESSION['order_no'] == ''){
   $_SESSION['order_no'] = rand(0,99999999);
  }
  $_SESSION['trading_id'] = rand(0,99999999);
  $_SESSION['Device__c'] = $device;
  
  $result_old = null;
  $result_old = (array)getKaisyaKoyoCaseIdbyOrderNo($_SESSION['order_no']);
  $row_old = (array)$result["fields"];
  
  web2case_kaisya($_SESSION);
  
  $i = 0;
  do{
   usleep(500000*$i); // 0.5秒×回数
   $result = null;
   $result = (array)getKaisyaKoyoCaseIdbyOrderNo($_SESSION['order_no']);
   $row = (array)$result["fields"];
   $i++;
   if($i > 20){
    session_write_close();
    header('Location: input.php');
    exit();
   }
  } while($result['Id'] == $result_old['Id'] || (!isset($result['Id']) || $result['Id'] == ''));
  
  $_SESSION['Id'] = $result['Id'];
  web2case($_SESSION);
  
  $_SESSION['sougaku'] = str_replace(',','',$_SESSION['sougaku']);
  $_SESSION['prefcode'] = $pref[$_SESSION['pref']];

  setcookie('paid', '0', 0, '/');
  setcookie('norikae', '0', 0, '/');

  session_write_close();
		header('Location: done.php');
  exit;
		break;
	}
	case 'done.php':
	{
		break;
	}
	default:
	{
		echo '不明なページからのアクセスです';
		break;
	}
}

// https://www.synergy-marketing.co.jp/cloud/synergylead/support/faq-salesforce-web-to-case-on-php/
function web2case_kaisya($items) {
 
/* 本番 */
$url = 'https://webto.salesforce.com/servlet/servlet.WebToCase?encoding=UTF-8';
// Salesforceの組織ID
$oid = '00D7F0000001NoF';
 
/* Sandbox del */
 /*
$url = 'https://cs31.salesforce.com/servlet/servlet.WebToCase?encoding=UTF-8';
// Salesforceの組織ID
$oid = '00Dp0000000A0zw';
*/

 /*
$detect = new Mobile_Detect;
 
		$device = 'PC';
		if($detect->isMobile()){
			$device = 'スマホ';
		}
 */
 $jyugyoin1_5 = '';
 for($i=1;$i<=$items['ninzu'];$i++){
  $jyugyoin1_5 .= '従業員'.$i.':'.$items['jyugyoinmei'.$i].'('.$items['jyugyoinmei_furi'.$i].')
'.(seireki_to_wareki($items['birthday_y'.$i])).'('.$items['birthday_y'.$i].')年'.$items['birthday_m'.$i].'月'.$items['birthday_d'.$i].'日';
  
   if($i<$items['ninzu']) $jyugyoin1_5 .= '
   
';
 }
 
 if($items['type'] == '法人'){
 } else {
 }
 
$fields = array(
// Salesforceへのパラメーター
'orgid' => $oid,
'retURL' => '',
'Device__c'=>urlencode($items['Device__c']),
'recordType'=>'012BV0000004JMA',
'AccountType__c'=>urlencode($items['type']),
'order_no__c'=>urlencode($items['order_no']),
'Kanyuhopemonth__c'=>urlencode($items['kikan'].'月'),
'jimuHokenryoutotal__c'=>urlencode($items['sougaku']),
'jimuMaitukihurikae__c'=>urlencode($items['shiharai_tsuki']),
'Furi__c'=>urlencode($items['kaisyamei_furi']),
'Daihyosya__c'=>urlencode($items['daihyosyamei']),
'DaihyousyaFuri__c'=>urlencode($items['daihyosyamei_furi']),
'Daihyouyakusyoku__c'=>urlencode($items['daihyosyayakusyoku']),
'DaijyoKeitai__c'=>urlencode($items['daihyomobile']),
'Mobile__c'=>urlencode($items['tantoumobile']),
'PostCode__c'=>urlencode($items['zip']),
'Prefectures__c'=>urlencode($items['pref']),
'Shikugun__c'=>urlencode($items['city']),
'Tyomei__c'=>urlencode($items['address'].$items['apart']),
'Phone__c'=>urlencode($items['denwabangou']),
'Fax__c'=>urlencode($items['faxbangou']),
'Email__c'=>urlencode($items['mail']),
'LastName__c'=>urlencode($items['kaisyamei']),
'NumberOfEmployees__c'=>urlencode($items['ninzu']),
'Nyukinshubetsu__c'=>urlencode($items['shiharai']),
'Hokenryou__c'=>urlencode(intval(str_replace(',','',$items['sougaku']))),
'jimuKanyusya1_No__c'=>'0001',
'jimuKanyusya1_Name__c'=>urlencode($items['jyugyoinmei1']),
'jimuKanyusya2_No__c'=>'0002',
'jimuKanyusya2_Name__c'=>urlencode($items['jyugyoinmei2']),
'jimuKanyusya3_No__c'=>'0003',
'jimuKanyusya3_Name__c'=>urlencode($items['jyugyoinmei3']),
'jimuKanyusya4_No__c'=>'0004',
'jimuKanyusya4_Name__c'=>urlencode($items['jyugyoinmei4']),
'jimuKanyusya5_No__c'=>'0005',
'jimuKanyusya5_Name__c'=>urlencode($items['jyugyoinmei5']),
'Kanyusya1_5__c'=>urlencode($jyugyoin1_5),
'KanyuType__c'=>urlencode($items['shiharai_kaisu']),
'Account_madoguchi__c'=>urlencode($items['kaisya_id']),
'shimebi__c'=>urlencode($items['shimebi']),
'shiharaibi__c'=>urlencode($items['kyuyoshiharaibi']),
'jimuRoudouhokenBangouMemo__c'=>urlencode($items['roudouhoken_no']),
'trading_id__c'=>urlencode($items['trading_id']),
'koyo_bangou__c'=>urlencode($items['koyo_bangou']),
//'debug' => '1',
//'debugEmail' => urlencode("xxx@xxxx"),
);
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string,'&');
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST,count($fields));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_POSTFIELDS,$fields_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
$result = curl_exec($ch);
curl_close($ch);
return $result;
}

// https://www.synergy-marketing.co.jp/cloud/synergylead/support/faq-salesforce-web-to-case-on-php/
function web2case($items) {
 
/* 本番 */
$url = 'https://webto.salesforce.com/servlet/servlet.WebToCase?encoding=UTF-8';
// Salesforceの組織ID
$oid = '00D7F0000001NoF';
 
/* Sandbox del */
 /*
$url = 'https://cs31.salesforce.com/servlet/servlet.WebToCase?encoding=UTF-8';
// Salesforceの組織ID
$oid = '00Dp0000000A0zw';
*/
 
 for($i=1;$i<=$items['ninzu'];$i++){
  $fields_string='';
  
 $fields = array(

 // Salesforceへのパラメーター
 'orgid' => $oid,
 'retURL' => '',
 'recordType'=>'012BV0000004JMF',
 'order_no__c'=>urlencode($items['order_no']),
 'KaisyaCaseId__c'=>urlencode($items['Id']),
 'Kanyuhopemonth__c'=>urlencode($items['kikan'].'月'),
 'Furi__c'=>urlencode($items['jyugyoinmei_furi_sei'.$i]),
 'Furi2__c'=>urlencode($items['jyugyoinmei_furi_mei'.$i]),
 'Birth__c'=>urlencode($items['birthday_y'.$i].'/'.$items['birthday_m'.$i].'/'.$items['birthday_d'.$i]),
 'LastName__c'=>urlencode($items['jyugyoinmei_sei'.$i]),
 'FIrstName__c'=>urlencode($items['jyugyoinmei_mei'.$i]),
 'PostCode__c'=>urlencode($items['zip'.$i]),
 'Prefectures__c'=>urlencode($items['pref'.$i]),
 'Shikugun__c'=>urlencode($items['city'.$i]),
 'Tyomei__c'=>urlencode($items['address'.$i].$items['apart'.$i]),
 'gekkyu__c'=>urlencode(intval(convertto_haneisu($items['gekkyu'.$i]))*10000),
 'mynumber__c'=>urlencode(convertto_haneisu($items['mynumber'.$i])),
 //'debug' => '1',
 //'debugEmail' => urlencode("xxx@xxxx"),
 );
 foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
 rtrim($fields_string,'&');

 $ch = curl_init();
 curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
 curl_setopt($ch, CURLOPT_URL, $url);
 curl_setopt($ch, CURLOPT_POST,count($fields));
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
 curl_setopt($ch, CURLOPT_POSTFIELDS,$fields_string);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

 $result = curl_exec($ch);
 curl_close($ch);
 }
 return $result;
}

 sf_logout();

?>
