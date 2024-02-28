<?php
 include_once('./bin/sf_Api.php');
 define('SELECT_ATTACHEDFILE','Id,Name,URL__c,Status__c,LinkText__c,Account__c,FileType__c');

 define('STATUS_PUBLIC', '公開');
 define('STATUS_PRIVATE', '非公開');
 define('STATUS_DELETE', '削除');
 define('FILETYPE_RYOSYUSYO', '領収書');
 define('FILETYPE_NOUNYUTSUCHISYO', '納入通知書');

 define('SF_OBJECT', 'AttachedFile__c');

/**********************************************************************/
/* 添付ファイルデータ */
/**********************************************************************/
 class AttachedFileDatas{
  private $_afd = [];
  private $_AccountId;
  
  public function __construct($_accountid){
   $this->_AccountId = $_accountid;
  }
  
  public function getFiles($_filetype){
   $_ret_afd_records = [];
   foreach($this->_afd as $_afd_rec){
    if($_afd_rec->FileType() == $_filetype){
     $_ret_afd_records[] = $_afd_rec;
    }
   }
   
   return $_ret_afd_records;
  }
  
  public function getAttachedFileRecordDatas(){
   $_select = SELECT_ATTACHEDFILE;
   $_from = SF_OBJECT;
   $_status = STATUS_PUBLIC;
   $_where = "Account__c = '$this->_AccountId' AND Status__c = '$_status'";
   $_orderby = "";
   
   $_result = (array)sf_soql_select($_select, $_from, $_where, $_orderby);
   if(count($_result) <= 0) return false;
   
   for($i=0;$i<count($_result);$i++){
    $_row = (array)$_result[$i]['fields'];
    $_afd_record = new AttachedFileData($_row);
    $this->_afd[] = $_afd_record;
   }
   
   return true;
  }
  
 }

 class AttachedFileData{
  private $_Id;
  private $_Name;
  private $_URL__c;
  private $_Status__c;
  private $_LinkText__c;
  private $_Account__c;
  private $_FileType__c;
  
  public function __construct($_row){
   $this->_Id = $_row['Id'];
   $this->_Name = $_row['Name'];
   $this->_URL__c = $_row['URL__c'];
   $this->_Status__c = $_row['Status__c'];
   $this->_LinkText__c = $_row['LinkText__c'];
   $this->_Account__c = $_row['Account__c'];
   $this->_FileType__c = $_row['FileType__c'];
  }
  
  /* 参照関数 */
  public function Name(){return $this->_Name;}
  public function URL(){return $this->_URL__c;}
  public function Status(){return $this->_Status__c;}
  public function LinkText(){return $this->_LinkText__c;}
  public function Account(){return $this->_Account;}
  public function FileType(){return $this->_FileType__c;}
  
  /* 更新関数 */
  
  /* 判定関数 */

  

 };



?>
