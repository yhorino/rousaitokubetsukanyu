<?php
session_start();
header("Content-type: text/html;charset=utf-8");
require_once('function.php');
require_once 'Mobile_Detect.php';

include('session_check.php');

  require_once("bin/sf_Api.php");
  init();
  sf_login();

$detect = new Mobile_Detect;
 
		$device = 'PC';
		if($detect->isMobile()){
			$device = 'スマホ';
		}

/*
// セッション切れチェック
 $timeout = 900;

// ini_set('session.gc_maxlifetime', $timeout);

 if (isset($_SESSION['idle_time']) && $_SESSION['idle_time'] < time()) {
//     session_destroy();
//     session_start();
//     session_regenerate_id();
     unset($_SESSION['idle_time']);
     header('Location: ./session_out.php');
     exit;
 }

 $_SESSION['idle_time'] = time() + $timeout;
*/

// 各ページから遷移したときに全てのPOST項目をSESSIONに保存する
   $params = array('type','shiharai','jugyouin', 'jugyouinninzu','nitigaku','kikan','jigyou','ninzu','sougaku','kaihi','sougaku_cp','kaihi_cp','kaisyamei','kaisyamei_furi','juusyo','juusyo_furi','zip','pref','city','address','address2','apart','daihyosyamei','daihyosyamei_sei','daihyosyamei_mei','daihyosyamei_furi','daihyosyamei_furi_sei','daihyosyamei_furi_mei','tantousyamei','tantousyamei_sei','tantousyamei_mei','tantousyamei_furi','tantousyamei_furi_sei','tantousyamei_furi_mei','denwabangou','faxbangou','mail','emailchk','daihyomobile','tantoumobile','kanyusyamei1','kanyusyamei_sei1','kanyusyamei_mei1','kanyusyamei_furi1','kanyusyamei_furi_sei1','kanyusyamei_furi_mei1','wareki1','birthday_y1','birthday_m1','birthday_d1','funjin1','funjin_naiyou1','shindou1','shindou_naiyou1','namari1','namari_naiyou1','youzai1','youzai_naiyou1','youzai_itukara_y1','youzai_itukara_m1','jimuKanyuOyakatadantai1','denwabangou1','kanyusyamei2','kanyusyamei_sei2','kanyusyamei_mei2','kanyusyamei_furi2','kanyusyamei_furi_sei2','kanyusyamei_furi_mei2','wareki2','birthday_y2','birthday_m2','birthday_d2','funjin2','funjin_naiyou2','shindou2','shindou_naiyou2','namari2','namari_naiyou2','youzai2','youzai_naiyou2','youzai_itukara_y2','youzai_itukara_m2','jimuKanyuOyakatadantai2','denwabangou2','kanyusyamei3','kanyusyamei_sei3','kanyusyamei_mei3','kanyusyamei_furi3','kanyusyamei_furi_sei3','kanyusyamei_furi_mei3','wareki3','birthday_y3','birthday_m3','birthday_d3','funjin3','funjin_naiyou3','shindou3','shindou_naiyou3','namari3','namari_naiyou3','youzai3','youzai_naiyou3','youzai_itukara_y3','youzai_itukara_m3','jimuKanyuOyakatadantai3','denwabangou3','kanyusyamei4','kanyusyamei_sei4','kanyusyamei_mei4','kanyusyamei_furi4','kanyusyamei_furi_sei4','kanyusyamei_furi_mei4','wareki4','birthday_y4','birthday_m4','birthday_d4','funjin4','funjin_naiyou4','shindou4','shindou_naiyou4','namari4','namari_naiyou4','youzai4','youzai_naiyou4','youzai_itukara_y4','youzai_itukara_m4','jimuKanyuOyakatadantai4','denwabangou4','kanyusyamei5','kanyusyamei_sei5','kanyusyamei_mei5','kanyusyamei_furi5','kanyusyamei_furi_sei5','kanyusyamei_furi_mei5','wareki5','birthday_y5','birthday_m5','birthday_d5','funjin5','funjin_naiyou5','shindou5','shindou_naiyou5','namari5','namari_naiyou5','youzai5','youzai_naiyou5','youzai_itukara_y5','youzai_itukara_m5','jimuKanyuOyakatadantai5','denwabangou5','daihyosyayakusyoku','tantousyayakusyoku','jimuGyousyuBangou__c','file_rirekisyo','file_kakutei','file_tutyo_omote','file_tutyo_ura','file_menkyo_omote_1','file_menkyo_omote_2','file_menkyo_omote_3','file_menkyo_omote_4','file_menkyo_omote_5','file_menkyo_ura_1','file_menkyo_ura_2','file_menkyo_ura_3','file_menkyo_ura_4','file_menkyo_ura_5','f_num','i','RJC_kantan__c','RJC_anshin__c','','RJC_hayasa__c','RJC_from__c','RJC_from_sonota__c','RJC_why__c','RJC_why_sonota__c','tokubetsukanyu_why__c','tokubetsukanyu_why_sonota__c','have_kyoka__c','join_koyouhoken__c','jyugyouin_ninzu__c', 'SNS_WEB__c','SNS_WEB_sonota__c','kouji_newold','tukuri','shiharai_kaisu','maitsuki_kaihi','kikane','fromSyokaiCupon__c','syoukai_kaisya_id','SyoukoukaiKaiin__c','nyukaikin_camp_wari','camp_kaihi_wari','nyukaikin','motouke','jyugyouin_yatoi', 'youzai', 'youzai_naiyou', 'youzai_itukara_y', 'youzai_itukara_m','shimebi','shiharaibi_month','shiharaibi', 'hokenryo', 'hokenryo1', 'hokenryo2');
   // データを取得する ＋ 必須入力のvalidate
   foreach($params as $p) {
       if(isset($_POST[$p])){
        $_SESSION[$p] = (string)@$_POST[$p];
       }
   }

switch($_POST['pagename']){
 case 'mitsumori.php':
 {
  if($_SESSION['shiharai_kaisu'] != '毎月払い'){
   $_SESSION['shiharai_kaisu'] = '年払い';
  }
  session_write_close();
		header('Location: input.php');
  exit;
  break;
 }
 case 'input.php':
 {
  
  $_SESSION['daihyomobile'] = mobileno_split($_SESSION['daihyomobile']);
  $_SESSION['tantoumobile'] = mobileno_split($_SESSION['tantoumobile']);
  $_SESSION['denwabangou'] = telno_split($_SESSION['denwabangou']);
  $_SESSION['faxbangou'] = telno_split($_SESSION['faxbangou']);
  
  $_SESSION['daihyosyamei'] = $_SESSION['daihyosyamei_sei'].'　'.$_SESSION['daihyosyamei_mei'];
  $_SESSION['daihyosyamei_furi'] = $_SESSION['daihyosyamei_furi_sei'].'　'.$_SESSION['daihyosyamei_furi_mei'];
  $_SESSION['tantousyamei'] = $_SESSION['tantousyamei_sei'].'　'.$_SESSION['tantousyamei_mei'];
  $_SESSION['tantousyamei_furi'] = $_SESSION['tantousyamei_furi_sei'].'　'.$_SESSION['tantousyamei_furi_mei'];
  
  // なぜかループではうまくできなかった
  $_SESSION['kanyusyamei1'] = $_SESSION['kanyusyamei_sei1'].'　'.$_SESSION['kanyusyamei_mei1'];  
  $_SESSION['kanyusyamei_furi1'] = $_SESSION['kanyusyamei_furi_sei1'].'　'.$_SESSION['kanyusyamei_furi_mei1'];
  $_SESSION['kanyusyamei2'] = $_SESSION['kanyusyamei_sei2'].'　'.$_SESSION['kanyusyamei_mei2'];  
  $_SESSION['kanyusyamei_furi2'] = $_SESSION['kanyusyamei_furi_sei2'].'　'.$_SESSION['kanyusyamei_furi_mei2'];
  $_SESSION['kanyusyamei3'] = $_SESSION['kanyusyamei_sei3'].'　'.$_SESSION['kanyusyamei_mei3'];  
  $_SESSION['kanyusyamei_furi3'] = $_SESSION['kanyusyamei_furi_sei3'].'　'.$_SESSION['kanyusyamei_furi_mei3'];
  $_SESSION['kanyusyamei4'] = $_SESSION['kanyusyamei_sei4'].'　'.$_SESSION['kanyusyamei_mei4'];  
  $_SESSION['kanyusyamei_furi4'] = $_SESSION['kanyusyamei_furi_sei4'].'　'.$_SESSION['kanyusyamei_furi_mei4'];
  $_SESSION['kanyusyamei5'] = $_SESSION['kanyusyamei_sei5'].'　'.$_SESSION['kanyusyamei_mei5'];  
  $_SESSION['kanyusyamei_furi5'] = $_SESSION['kanyusyamei_furi_sei5'].'　'.$_SESSION['kanyusyamei_furi_mei5'];
  $_SESSION['denwabangou1'] = telno_split($_SESSION['denwabangou1']);
  $_SESSION['denwabangou2'] = telno_split($_SESSION['denwabangou2']);
  $_SESSION['denwabangou3'] = telno_split($_SESSION['denwabangou3']);
  $_SESSION['denwabangou4'] = telno_split($_SESSION['denwabangou4']);
  $_SESSION['denwabangou5'] = telno_split($_SESSION['denwabangou5']);

  // 添付書類
   $f_num = intval($_SESSION['f_num']);
   if($f_num > 1){
    $zip = new ZipArchive;

    $zipname = $_SESSION['kaisyamei'].$_FILES['file_rirekisyo1']['name'].'.zip';
    $ret = $zip->open('./upload/'.$zipname, ZipArchive::CREATE|ZipArchive::OVERWRITE);
    if($ret !== true){
    }
    for($i=1;$i<=$f_num;$i++){
     move_uploaded_file($_FILES['file_rirekisyo'.$i]['tmp_name'], './upload/' . $_FILES['file_rirekisyo'.$i]['name']);
     $zip->addFile('./upload/'.$_FILES['file_rirekisyo'.$i]['name'], $_FILES['file_rirekisyo'.$i]['name']);
     $_SESSION['file_rirekisyo'.$i] = $_FILES['file_rirekisyo'.$i]['name'];
    }
    $zip->close();

    $_SESSION['img_url_rirekisyo'] = 'https://'.$_SERVER['HTTP_HOST'].'/form/upload/'.$zipname;
   } else {
    $_SESSION['img_url_rirekisyo'] = upload_file($_SESSION['kaisyamei'], $_FILES['file_rirekisyo1']['name'], $_FILES['file_rirekisyo1']['tmp_name']);   
    $_SESSION['file_rirekisyo1'] = $_FILES['file_rirekisyo1']['name'];
   }

   $_SESSION['img_url_kakutei'] = upload_file($_SESSION['kaisyamei'], $_FILES['file_kakutei']['name'], $_FILES['file_kakutei']['tmp_name']);
   $_SESSION['file_kakutei'] = $_FILES['file_kakutei']['name'];
   $_SESSION['img_url_tutyo_omote'] = upload_file($_SESSION['kaisyamei'], $_FILES['file_tutyo_omote']['name'], $_FILES['file_tutyo_omote']['tmp_name']);
   $_SESSION['file_tutyo_omote'] = $_FILES['file_tutyo_omote']['name'];
   $_SESSION['img_url_tutyo_ura'] = upload_file($_SESSION['kaisyamei'], $_FILES['file_tutyo_ura']['name'], $_FILES['file_tutyo_ura']['tmp_name']);
   $_SESSION['file_tutyo_ura'] = $_FILES['file_tutyo_ura']['name'];
   for($i=1;$i<=5;$i++){
    $_SESSION['img_url_menkyo_omote_'.$i] = upload_file($_SESSION['kaisyamei'], $_FILES['file_menkyo_omote_'.$i]['name'], $_FILES['file_menkyo_omote_'.$i]['tmp_name']);
    $_SESSION['file_menkyo_omote_'.$i] = $_FILES['file_menkyo_omote_'.$i]['name'];
    $_SESSION['img_url_menkyo_ura_'.$i] = upload_file($_SESSION['kaisyamei'], $_FILES['file_menkyo_ura_'.$i]['name'], $_FILES['file_menkyo_ura_'.$i]['tmp_name']);
    $_SESSION['file_menkyo_ura_'.$i] = $_FILES['file_menkyo_ura_'.$i]['name'];
   }
  
  session_write_close();
		header('Location: check.php');
  exit;
  break;
 }
	case 'check.php':
	{
  $_SESSION['ninzu'] = $_POST['ninzu'];
  
  $kanyu_tukisuu = intval($tukisuu[$_SESSION['kikan']]);
  if($kanyu_tukisuu > 12)
  {
   $_SESSION['kanyu_kisogaku'] = $value[$_SESSION['nitigaku'].'_12'];
   $_SESSION['kanyu_kisogaku'] += $value[$_SESSION['nitigaku'].'_'.($kanyu_tukisuu-12)];
  } else {
   $_SESSION['kanyu_kisogaku'] = $value[$_SESSION['nitigaku'].'_'.$kanyu_tukisuu];
  }
  $_SESSION['kanyu_kisogaku'] = intval($_SESSION['kanyu_kisogaku']) / 1000;
  $_SESSION['kanyu_ryouritsu'] = floatval($ryouritsu[intval($roumu[$_SESSION['jigyou']])/100])*1000;
  $_SESSION['kanyu_roumuhiritsu'] = floatval($roumu_hiritu[intval($roumu[$_SESSION['jigyou']])/100]) * 100;
  
  $_SESSION['order_no'] = rand(0,99999999);
  $_SESSION['trading_id'] = rand(0,99999999);
  $_SESSION['Device__c'] = $device;
  
  /* 20230206 給与支払日項目追加 */
  $_SESSION['kyuyoshiharaibi'] = $_SESSION['shiharaibi_month'].$_SESSION['shiharaibi'];
  /* 20230206 給与支払日項目追加 */
  
  web2case_kaisya($_SESSION);
  
 $i = 0;
 do{
  usleep(500000*$i); // 0.5秒×回数
  $result = null;
  $result = (array)getKaisyabyOrderNo($_SESSION['order_no']);
  $row = (array)$result["fields"];
  $account_id = $result["Id"];
  $i++;
  if($i > 20){
   session_write_close();
 		header('Location: check.php');
   exit();
  }
 } while(!isset($result['Id']) || $result['Id'] == '');
  
  $_SESSION['Id'] = $result['Id'];
   web2case($_SESSION);
  
  $_SESSION['sougaku'] = str_replace(',','',$_POST['sougaku']);
  $_SESSION['kaisyamei'] = $_POST['kaisyamei'];
  $_SESSION['mail'] = $_POST['mail'];
  $_SESSION['shiharai'] = $_POST['shiharai'];
  $_SESSION['kikan'] = $_POST['kikan'];
  $_SESSION['pref'] = $_POST['pref'];
  $_SESSION['prefcode'] = $pref[$_POST['pref']];

  setcookie('paid', '0', 0, '/');
  setcookie('norikae', '0', 0, '/');

 /* 20220122 紹介クーポン */
  if($_SESSION['syoukai_kaisya_id'] != ''){
   setSyokaiAccount($_SESSION['syoukai_kaisya_id'], $account_id);
  }
 /* 20220122 紹介クーポン */
  
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

 $kanyusya1_5 = '';
 for($i=1;$i<=$items['ninzu'];$i++){
  $kanyusya1_5 .= '加入者'.$i.':'.$items['kanyusyamei'.$i].'('.$items['kanyusyamei_furi'.$i].')
'.(seireki_to_wareki($items['birthday_y'.$i])).'('.$items['birthday_y'.$i].')年'.$items['birthday_m'.$i].'月'.$items['birthday_d'.$i].'日
今入っている組合:'.$items['jimuKanyuOyakatadantai'.$i];
  
   if($items['funjin'.$i] == 'はい'){
    $kanyusya1_5 .= ' 粉じん作業内容:'.$items['funjin_naiyou'.$i];
   }
   if($items['shindou'.$i] == 'はい'){
    $kanyusya1_5 .= ' 使用振動工具:'.$items['shindou_naiyou'.$i];
   }
   if($items['namari'.$i] == 'はい'){
    $kanyusya1_5 .= ' 鉛作業内容:'.$items['namari_naiyou'.$i];
   }
   if($items['youzai'.$i] == 'はい'){
    $kanyusya1_5 .= ' 使用有機溶剤:'.$items['youzai_naiyou'.$i].':'.$items['youzai_itukara_y'.$i].'年'.$items['youzai_itukara_m'.$i].'月～現在まで';
   }
   
   if($i<$items['ninzu']) $kanyusya1_5 .= '
   
';
 }
 
 if($items['type'] == '法人'){
  $url1 = $items['img_url_rirekisyo'];
 } else {
  $url1 = $items['img_url_kakutei'];  
 }
 
$nyukaikin = intval(str_replace(',','',$items['nyukaikin'])) + intval(str_replace(',','',$items['nyukaikin_camp_wari']));
$kaihi = intval(str_replace(',','',$items['kaihi'])) + intval(str_replace(',','',$items['camp_kaihi_wari']));
 
$fields = array(
// Salesforceへのパラメーター
'orgid' => $oid,
'retURL' => '',
'Device__c'=>urlencode($items['Device__c']),
//'recordType'=>'0127F000001JhhU',
'recordType'=>'0127F000001JhiD',
'AccountType__c'=>urlencode($items['type']),
'order_no__c'=>urlencode($items['order_no']),
'Kanyuhopemonth__c'=>urlencode($items['kikan'].'月'),
'Kyuhukisonitigaku__c'=>urlencode($items['nitigaku']),
'jimuHokenryoutotal__c'=>urlencode($items['sougaku']),
'jimuMaitukihurikae__c'=>urlencode($items['maitsuki_kaihi']),
//'jimuKaihiMaitsuki__c'=>urlencode($items['maitsuki_kaihi']),
'Furi__c'=>urlencode($items['kaisyamei_furi']),
'Daihyosya__c'=>urlencode($items['daihyosyamei']),
'DaihyousyaFuri__c'=>urlencode($items['daihyosyamei_furi']),
'Daihyouyakusyoku__c'=>urlencode($items['daihyosyayakusyoku']),
'Tantousya__c'=>urlencode($items['tantousyamei']),
'TantousyaFuri__c'=>urlencode($items['tantousyamei_furi']),
'Tantousyozokuyakusyoku__c'=>urlencode($items['tantousyayakusyoku']),
'DaijyoKeitai__c'=>urlencode($items['daihyomobile']),
'Mobile__c'=>urlencode($items['tantoumobile']),
'PostCode__c'=>urlencode($items['zip']),
'Prefectures__c'=>urlencode($items['pref']),
'Shikugun__c'=>urlencode($items['city']),
'Tyomei__c'=>urlencode($items['address'].$items['address2'].$items['apart']),
'Phone__c'=>urlencode($items['denwabangou']),
'Fax__c'=>urlencode($items['faxbangou']),
'Email__c'=>urlencode($items['mail']),
'LastName__c'=>urlencode($items['kaisyamei']),
'KojiType__c'=>urlencode($items['jigyou']),
'NumberOfEmployees__c'=>urlencode($items['jugyouinninzu']),
'jimuKanyuninzu__c'=>urlencode($items['ninzu']),
'Nyukinshubetsu__c'=>urlencode($items['shiharai']),
'Nyukaikin__c'=>$nyukaikin,
'Kaihi__c'=>$kaihi,
'Hokenryou__c'=>urlencode(intval(str_replace(',','',$items['sougaku']))-(intval($kaihi)+intval($nyukaikin))),
'Hokenryou1__c'=>urlencode(intval(str_replace(',','',$items['hokenryo1']))),
'Hokenryou2__c'=>urlencode(intval(str_replace(',','',$items['hokenryo2']))),
'jimuKanyusya1_No__c'=>'0001',
'jimuKanyusya1_Name__c'=>urlencode($items['kanyusyamei1']),
'jimuKanyusya1_Nichigaku__c'=>urlencode($items['nitigaku']),
'jimuKanyusya2_No__c'=>'0002',
'jimuKanyusya2_Name__c'=>urlencode($items['kanyusyamei2']),
'jimuKanyusya2_Nichigaku__c'=>urlencode($items['nitigaku']),
'jimuKanyusya3_No__c'=>'0003',
'jimuKanyusya3_Name__c'=>urlencode($items['kanyusyamei3']),
'jimuKanyusya3_Nichigaku__c'=>urlencode($items['nitigaku']),
'jimuKanyusya4_No__c'=>'0004',
'jimuKanyusya4_Name__c'=>urlencode($items['kanyusyamei4']),
'jimuKanyusya4_Nichigaku__c'=>urlencode($items['nitigaku']),
'jimuKanyusya5_No__c'=>'0005',
'jimuKanyusya5_Name__c'=>urlencode($items['kanyusyamei5']),
'jimuKanyusya5_Nichigaku__c'=>urlencode($items['nitigaku']),
'jimuGyousyuBangou__c'=>urlencode($items['jimuGyousyuBangou__c']),
'jimuSanteiKisogakuTukisuu__c'=>urlencode($items['kanyu_kisogaku']),
'jimuRyouritsu__c'=>urlencode($items['kanyu_ryouritsu']),
'jimuRoumuHiritsu__c'=>urlencode($items['kanyu_roumuhiritsu']),
'Kanyusya1_5__c'=>urlencode($kanyusya1_5),
'imageURL__c'=>urlencode($url1),
'imageURL2__c'=>urlencode($items['img_url_tutyo_omote']),
'imageURL3__c'=>urlencode($items['img_url_tutyo_ura']),
'ShiharaiType__c'=>urlencode('かつ'),
'KanyuType__c'=>urlencode($items['shiharai_kaisu']),
'trading_id__c'=>urlencode($items['trading_id']),
'shimebi__c'=>urlencode($items['shimebi']),
'shiharaibi__c'=>urlencode($items['kyuyoshiharaibi']),
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
  
  $tokutei = array();
  $tokutei['funjin_s'] = '';
  $tokutei['funjin_e'] = '';
  $tokutei['shindou_s'] = '';
  $tokutei['shindou_e'] = '';
  $tokutei['namari_s'] = '';
  $tokutei['namari_e'] = '';
  $tokutei['youzai_s'] = '';
  $tokutei['youzai_e'] = '';

 if($items['funjin'.$i]=='はい'){
  $tokutei['funjin_s'] = date('Y/m/d', strtotime("-3 year"));
  $tokutei['funjin_e'] = date('Y/m/d');
 }
 if($items['shindou'.$i]=='はい'){
  $tokutei['shindou_s'] = date('Y/m/d', strtotime("-1 year"));
  $tokutei['shindou_e'] = date('Y/m/d');
 }
 if($items['namari'.$i]=='はい'){
  $tokutei['namari_s'] = date('Y/m/d', strtotime("-6 month"));
  $tokutei['namari_e'] = date('Y/m/d');
 }
 if($items['youzai'.$i]=='はい'){
  $tokutei['youzai_s'] = date('Y/m/d', strtotime("-6 month"));
  $tokutei['youzai_e'] = date('Y/m/d');
  if($items['youzai_itukara_y'.$i] != ''){
   $tokutei['youzai_s'] = $items['youzai_itukara_y'.$i].'/'.$items['youzai_itukara_m'.$i].'/1';
  }
 }

 $cellsno = substr('0000'.$i,-4);
 $fields = array(

 // Salesforceへのパラメーター
 'orgid' => $oid,
 'retURL' => '',
 'recordType'=>'0127F000001JhhU',
 'order_no__c'=>urlencode($items['order_no']),
 'Account_madoguchi__c'=>urlencode($items['Id']),
 'Kanyuhopemonth__c'=>urlencode($items['kikan'].'月'),
 'Kyuhukisonitigaku__c'=>urlencode($items['nitigaku']),
 'Furi__c'=>urlencode($items['kanyusyamei_furi'.$i]),
 'Birth__c'=>urlencode($items['birthday_y'.$i].'/'.$items['birthday_m'.$i].'/'.$items['birthday_d'.$i]),
 'LastName__c'=>urlencode($items['kanyusyamei'.$i]),
 'KojiType__c'=>urlencode($items['jigyou']),
 'Funjintusansannen__c'=>urlencode($items['funjin'.$i]),
 'Sagyounayoufunjin__c'=>urlencode($items['funjin_naiyou'.$i]),
 'FunjinStart__c'=>urlencode($tokutei['funjin_s']),
 'FunjinEnd__c'=>urlencode($tokutei['funjin_e']),
 'Shindosagyouitinen__c'=>urlencode($items['shindou'.$i]),
 'Shiyoukougu__c'=>urlencode($items['shindou_naiyou'.$i]),
 'ShindoStart__c'=>urlencode($tokutei['shindou_s']),
 'ShindoEnd__c'=>urlencode($tokutei['shindou_e']),
 'Namarisiyousagyou__c'=>urlencode($items['namari'.$i]),
 'Sagyounaiyounamari__c'=>urlencode($items['namari_naiyou'.$i]),
 'NamariStart__c'=>urlencode($tokutei['namari_s']),
 'NamariEnd__c'=>urlencode($tokutei['namari_e']),
 'Yuukiyouzashiyousagyou__c'=>urlencode($items['youzai'.$i]),
 'Shiyouyuukiyouzai__c'=>urlencode($items['youzai_naiyou'.$i]),
 'YukiStart__c'=>urlencode($tokutei['youzai_s']),
 'YukiEnd__c'=>urlencode($tokutei['youzai_e']),
 'imageURL__c'=>urlencode($items['img_url_menkyo_omote_'.$i]),
 'imageURL2__c'=>urlencode($items['img_url_menkyo_ura_'.$i]),
 'jimuCellsNo__c'=>urlencode($cellsno),
 'jimuKanyuOyakatadantai__c'=>urlencode($items['jimuKanyuOyakatadantai'.$i]),
 'Phone__c'=>urlencode($items['denwabangou'.$i]),
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

function upload_file($name, $filename, $tmp_name){
 if($filename != ''){
   $msec = str_replace('.','',microtime(true));
   $img_name = $name.$msec.$filename;
   $img_name = str_replace(' ','',$img_name);
   $img_name = str_replace('　','',$img_name);

   //画像を保存
   move_uploaded_file($tmp_name, './upload/' . $img_name);
   $img_url = 'https://'.$_SERVER['HTTP_HOST'].'/form/upload/'.$img_name;
 }
 return $img_url;
}

 sf_logout();

?>
