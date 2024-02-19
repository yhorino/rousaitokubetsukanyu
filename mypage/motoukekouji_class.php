<?php
 include_once('./bin/sf_Api.php');

 define('DATATYPE_MOTOUKEKOUJI', '事務組合元請工事');
 define('SELECT_MOTOUKEKOUJI','Id,Name,Account__c,KoujiType__c,KoujiSubType__c,KoujiKikanStart__c,KoujiKikanEnd__c,KoujiAddress__c,KoujiKingaku__c,KoujiHokenryo__c,KoujiMeisyo__c');
 define('SF_OBJECT', 'jimuMotoukeKouji__c');
 define('SF_SENDMAIL_OBJECT', 'SendEmail__c');

 class MotoukekoujiDataArray{
  private $_Id;
  private $_Name;
  private $_MotoukekoujiData = [];
  
  public function __construct($_Id, $_name){
   $this->_Id = $_Id;
   $this->_Name = $_name;
  }
  
  /* 参照関数 */
  public function MotoukekoujiDataNum(){return count($this->_MotoukekoujiData);}
  public function MotoukekoujiData($_idx){return $this->_MotoukekoujiData[$_idx];}
  
  public function getMotoukekoujiRecordData(){
   $_type = DATATYPE_MOTOUKEKOUJI;
   $_select = SELECT_MOTOUKEKOUJI;
   $_from = SF_OBJECT;
   $_where = "Account__c = '$this->_Id'";
   $_orderby = " ORDER BY Name DESC ";
   
   $_result = (array)sf_soql_select($_select, $_from, $_where, $_orderby);
   if(count($_result) <= 0) return false;
   
   for($i=0;$i<count($_result);$i++){
    $_row = (array)$_result[$i]['fields'];
    $_record = new MotoukekoujiData();
    $_record->setId($_result[$i]['Id']);
    $_record->setAccountId($_row['Account__c']);
    $_record->setKoujiKikanStart($_row['KoujiKikanStart__c']);
    $_record->setKoujiKikanEnd($_row['KoujiKikanEnd__c']);
    $_record->setKoujiType($_row['KoujiType__c']);
    $_record->setKoujiSubType($_row['KoujiSubType__c']);
    $_record->setKoujiAddress($_row['KoujiAddress__c']);
    $_record->setKoujiKingaku($_row['KoujiKingaku__c']);
    $_record->setKoujiHokenryo($_row['KoujiHokenryo__c']);
    $_record->setKoujiMeisyo($_row['KoujiMeisyo__c']);
    $this->_MotoukekoujiData[] = $_record;
   }
   
   /* TEST /
   for($i=0;$i<20;$i++){
    $_record = new MotoukekoujiData();
    $_record->setId('0000000'.$i);
    $_record->setAccountId($this->_Id);
    $_record->setKoujiKikanStart('2023-11-01');
    $_record->setKoujiKikanEnd('2023-12-31');
    $_record->setKoujiType('タイル・れんが・ブロック工事業');
    $_record->setKoujiAddress('鹿児島県いちき串木野市');
    $_record->setKoujiKingaku('1500000');
    $_record->setKoujiHokenryo('60000');
    $this->_MotoukekoujiData[] = $_record;
   }
   / TEST */
   
   return true;
  }
  
  public function getMotoukekoujiRecordDataWithYM($ym){
   $_type = DATATYPE_MOTOUKEKOUJI;
   $_select = SELECT_MOTOUKEKOUJI;
   $_from = SF_OBJECT;
   $_where = "Account__c = '$this->_Id'";
   $_orderby = " ORDER BY Name DESC ";
   
   $_result = (array)sf_soql_select($_select, $_from, $_where, $_orderby);
   if(count($_result) <= 0) return false;
   
   for($i=0;$i<count($_result);$i++){
    $_row = (array)$_result[$i]['fields'];
    $end = $_row['KoujiKikanEnd__c'];
    $end = str_replace('/', '', $end);
    $end = str_replace('-', '', $end);
    $end = substr($end,0,6);
    if($end == $ym){
     $_record = new MotoukekoujiData();
     $_record->setId($_result[$i]['Id']);
     $_record->setAccountId($_row['Account__c']);
     $_record->setKoujiKikanStart($_row['KoujiKikanStart__c']);
     $_record->setKoujiKikanEnd($_row['KoujiKikanEnd__c']);
     $_record->setKoujiType($_row['KoujiType__c']);
     $_record->setKoujiSubType($_row['KoujiSubType__c']);
     $_record->setKoujiAddress($_row['KoujiAddress__c']);
     $_record->setKoujiKingaku($_row['KoujiKingaku__c']);
     $_record->setKoujiHokenryo($_row['KoujiHokenryo__c']);
     $_record->setKoujiMeisyo($_row['KoujiMeisyo__c']);
     $this->_MotoukekoujiData[] = $_record;
    }
   }
   
   /* TEST /
   for($i=0;$i<20;$i++){
    $_record = new MotoukekoujiData();
    $_record->setId('0000000'.$i);
    $_record->setAccountId($this->_Id);
    $_record->setKoujiKikanStart('2023-11-01');
    $_record->setKoujiKikanEnd('2023-12-31');
    $_record->setKoujiType('タイル・れんが・ブロック工事業');
    $_record->setKoujiAddress('鹿児島県いちき串木野市');
    $_record->setKoujiKingaku('1500000');
    $_record->setKoujiHokenryo('60000');
    $this->_MotoukekoujiData[] = $_record;
   }
   / TEST */
   
   return true;
  }
  
  public function getMotoukekoujiRecordDataNumWithYM($ym){
   $count = 0;
   foreach($this->_MotoukekoujiData as $md){
    $end = $md->KoujiKikanEnd();
    $end = str_replace('/', '', $end);
    $end = str_replace('-', '', $end);
    $end = substr($end,0,6);
    if($end == $ym){
     $count++;
    }
   }
   return $count;
  }
  
 }

 class MotoukekoujiData{
  private $_Id;
  private $_AccountId;
  private $_KoujiKikanStart;
  private $_KoujiKikanEnd;
  private $_KoujiType;
  private $_KoujiSubType;
  private $_KoujiAddress;
  private $_KoujiKingaku;
  private $_KoujiHokenryo; // SF数式項目から
  private $_KoujiMeisyo;
  
  public $_dump; // DEBUG用
  
  public function __construct(){
  }
  
  /* 参照関数 */
  public function Id(){return $this->_Id;}
  public function AccountId(){return $this->_AccountId;}
  public function KoujiKikanStart(){return $this->_KoujiKikanStart;}
  public function KoujiKikanEnd(){return $this->_KoujiKikanEnd;}
  public function KoujiKikan(){return str_replace('-','/',$this->_KoujiKikanStart).'～'.str_replace('-','/',$this->_KoujiKikanEnd);}
  public function KoujiType(){return $this->_KoujiType;}
  public function KoujiSubType(){return $this->_KoujiSubType;}
  public function KoujiAddress(){return $this->_KoujiAddress;}
  public function KoujiKingaku(){return $this->_KoujiKingaku;}
  public function KoujiHokenryo(){return $this->_KoujiHokenryo;}
  public function KoujiMeisyo(){return $this->_KoujiMeisyo;}
  
  /* 更新関数 */
  public function setId($val){
   $this->_Id = $val;
  }
  public function setAccountId($val){
   $this->_AccountId = $val;
  }
  public function setKoujiKikanStart($val){
   $this->_KoujiKikanStart = $val;
  }
  public function setKoujiKikanEnd($val){
   $this->_KoujiKikanEnd = $val;
  }
  public function setKoujiType($val){
   $this->_KoujiType = $val;
  }
  public function setKoujiSubType($val){
   $this->_KoujiSubType = $val;
  }
  public function setKoujiAddress($val){
   $this->_KoujiAddress = $val;
  }
  public function setKoujiKingaku($val){
   $this->_KoujiKingaku = intval($val);
  }
  public function setKoujiHokenryo($val){
   $this->_KoujiHokenryo = intval($val);
  }
  public function setKoujiMeisyo($val){
   $this->_KoujiMeisyo = $val;
  }
  
  public function getMotoukekoujiRecordData(){
   $_type = DATATYPE_MOTOUKEKOUJI;
   $_select = SELECT_MOTOUKEKOUJI;
   $_from = SF_OBJECT;
   $_where = "Id = '$this->_Id'";
   $_orderby = "";
   
   $_result = sf_soql_select($_select, $_from, $_where, $_orderby);
   if(count($_result) <= 0) return false;
   
   $_row = (array)$_result[0]['fields'];
   $this->setId($_result[0]['Id']);
   $this->setAccountId($_row['Account__c']);
   $this->setKoujiKikanStart($_row['KoujiKikanStart__c']);
   $this->setKoujiKikanEnd($_row['KoujiKikanEnd__c']);
   $this->setKoujiType($_row['KoujiType__c']);
   $this->setKoujiSubType($_row['KoujiSubType__c']);
   $this->setKoujiAddress($_row['KoujiAddress__c']);
   $this->setKoujiKingaku($_row['KoujiKingaku__c']);
   $this->setKoujiHokenryo($_row['KoujiHokenryo__c']);
   $this->setKoujiMeisyo($_row['KoujiMeisyo__c']);
   
   $this->_dump = $_result;
   /* TEST /
   $this->setId('00000009');
   $this->setKoujiKikanStart('2023-11-01');
   $this->setKoujiKikanEnd('2023-12-31');
   $this->setKoujiType('タイル・れんが・ブロック工事業');
   $this->setKoujiAddress('鹿児島県いちき串木野市');
   $this->setKoujiKingaku('1500000');
   $this->setKoujiHokenryo('60000');
   / TEST */
   
   return true;
  }
  
 }
