<?php
session_start();
header("Content-type: text/html;charset=utf-8");

define('SF_MODE_UNKNOWN', -1);
define('SF_MODE_INSERT', 1);
define('SF_MODE_UPDATE', 2);

include_once('./motoukekouji_class.php');
$mode = SF_MODE_UNKNOWN;
$motoukekouji_data = new MotoukekoujiData();
if(isset($_POST['Id']) && $_POST['Id'] != ''){
 $mode = SF_MODE_UPDATE;
 $motoukekouji_data->setId($_POST['Id']);
} else {
 $mode = SF_MODE_INSERT;
}
$motoukekouji_data->setAccountId($_POST['AccountId']);
$motoukekouji_data->setKoujiType($_POST['kouji_type']);
$motoukekouji_data->setKoujiSubType($_POST['kouji_subtype']);
$motoukekouji_data->setKoujiAddress($_POST['kouji_address']);
$motoukekouji_data->setKoujiKikanStart($_POST['kouji_kikan_start']);
$motoukekouji_data->setKoujiKikanEnd($_POST['kouji_kikan_end']);
$motoukekouji_data->setKoujiKingaku($_POST['kouji_kingaku']);
$motoukekouji_data->setKoujiMeisyo($_POST['kouji_meisyo']);

/* SFに登録 */
if($mode == SF_MODE_INSERT){
 $type = SF_OBJECT;
 $insertitems=array(
  'Account__c'=>$motoukekouji_data->AccountId(),
  'KoujiType__c'=>$motoukekouji_data->KoujiType(),
  'KoujiSubType__c'=>$motoukekouji_data->KoujiSubType(),
  'KoujiKikanStart__c'=>$motoukekouji_data->KoujiKikanStart(),
  'KoujiKikanEnd__c'=>$motoukekouji_data->KoujiKikanEnd(),
  'KoujiAddress__c'=>$motoukekouji_data->KoujiAddress(),
  'KoujiKingaku__c'=>$motoukekouji_data->KoujiKingaku(),
  'KoujiMeisyo__c'=>$motoukekouji_data->KoujiMeisyo()
 );
 sf_soql_insert($type, $insertitems);
}

if($mode == SF_MODE_UPDATE){
 $_select = SELECT_MOTOUKEKOUJI;
 $_from = SF_OBJECT;
 $id = $motoukekouji_data->Id();
 $_where = "Id = '$id'";
 $_orderby = "";
 $updateitems=array(
  'KoujiType__c'=>$motoukekouji_data->KoujiType(),
  'KoujiSubType__c'=>$motoukekouji_data->KoujiSubType(),
  'KoujiKikanStart__c'=>$motoukekouji_data->KoujiKikanStart(),
  'KoujiKikanEnd__c'=>$motoukekouji_data->KoujiKikanEnd(),
  'KoujiAddress__c'=>$motoukekouji_data->KoujiAddress(),
  'KoujiKingaku__c'=>$motoukekouji_data->KoujiKingaku(),
  'KoujiMeisyo__c'=>$motoukekouji_data->KoujiMeisyo()
 );
 sf_soql_update($_select, $_from, $_where, $_orderby, $updateitems);
}

$_SESSION['changed'] = 1;

header('Location: motoukekouji_list.php?kikan='.$_SESSION['kikan']);
exit;

?>

