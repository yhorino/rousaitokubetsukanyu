<?php
//	include_once 'get_hokenryo.php';
//	include_once 'settings.php';
//$dbh = null;
$wpdb = null;

//include_once $_SERVER['DOCUMENT_ROOT'].'/dbinfo.php';
include_once '/home/rjc/domains/xn--y5q0r2lqcz91qdrc.com/public_html/wp-content/themes/cocoon-child-master/dbinfo.php';

function db_init(){
 global $dbinfo_dbname;
 global $dbinfo_dbpass;
	global $wpdb;
 if($wpdb == null){	
		$wpdb = new wpdb($dbinfo_dbname, $dbinfo_dbpass, $dbinfo_dbname, 'localhost');
	}
}

function db_isHoliday($date){
	header("Content-type: text/html;charset=utf-8");
	
	global $wpdb;
 db_init();
	$data=array();
	$sql = 'SELECT `date` from `T_holiday` WHERE `date`="'.$date.'"';
 $result = $wpdb->get_results($sql);
	
	$found = false;
 foreach($result as $rec){
  if($rec->date != '') $found = true;
 }
	return $found;
}

/*
function db_init_dbh(){
global $dbinfo_dbname;
global $dbinfo_dbpass;
	global $dbh;
 if($dbh == null){	
		$dsn = 'mysql:dbname='.$dbinfo_dbname.';host=localhost';
		$user = $dbinfo_dbname;
		$password = $dbinfo_dbpass;
		$dbh = new PDO($dsn, $user, $password);
		$dbh->query('SET NAMES utf8');
	}
}

function db_isHoliday($date){
	header("Content-type: text/html;charset=utf-8");
	
	global $dbh;
 db_init_dbh();
	$data=array();
	$sql = 'SELECT `date` from `T_holiday` WHERE `date`=?';
	$data[] = $date;
	$stmt = $dbh->prepare($sql);
	$stmt->execute($data);
	
	$found = false;
	if($stmt != null){
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			if($row['date'] != '') $found = true;
		}
	}
	
//	$dbh = null;
	return $found;
}

function db_getTholiday($order){
	header("Content-type: text/html;charset=utf-8");
	
	global $dbh;
 db_init_dbh();
	$sql = 'SELECT `date` from `T_holiday` ORDER BY `date` '.$order;
	$stmt = $dbh->prepare($sql);
	$stmt->execute();
	
	$holiday = array();
	if($stmt != null){
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$holiday[] = $row['date'];
		}
	}
	
//	$dbh = null;
	return $holiday;
}

*/
?>