<?php
date_default_timezone_set('Asia/Tokyo');

include_once $_SERVER['DOCUMENT_ROOT'].'/PHPMailer/phpmailer_sendmail.php';

$dbh = null;
include_once $_SERVER['DOCUMENT_ROOT'].'/dbinfo.php';
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

function db_getTholiday($order){
	header("Content-type: text/html;charset=utf-8");
	
	global $dbh;
 db_init_dbh();

 if($order === 'DESC'){
 	$sql = 'SELECT `date` from `T_holiday` ORDER BY `date` DESC';
 } else {
 	$sql = 'SELECT `date` from `T_holiday` ORDER BY `date` ASC';  
 }
	$stmt = $dbh->prepare($sql);
	$stmt->execute();
 
	$holiday = array();
	if($stmt != null){
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$holiday[] = $row['date'];
		}
	}
 
	return $holiday;
}

function mobileno_split($no){
 $no = str_replace('-','',$no);
 $no1 = substr($no,0,3);
 $no2 = substr($no,3,4);
 $no3 = substr($no,-4);
 $no_split = $no1.'-'.$no2.'-'.$no3;
 
 return $no_split;
}


/* 【市外局番・市内局番データベース】
https://www.japan-database.jp/db_download */
function telno_split($no){
 $no_bk = $no;
 $no = str_replace('-','',$no);
 
	global $dbh;
 db_init_dbh();

 $kyoku = substr($no,0,6);
	$sql = 'SELECT `shigai`, `shinai` from `M_shigai` WHERE `kyoku` = :kyoku';
	$stmt = $dbh->prepare($sql);
 $stmt->bindValue(":kyoku", $kyoku);
	$stmt->execute();
 
	$shigai = array();
	$shinai = array();
	if($stmt != null){
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
   $shigai[] = $row['shigai'];
   $shinai[] = $row['shinai'];
		}
	}
 
 
 $no1 = $shigai[0];
 $no2 = $shinai[0];
 $no3 = substr($no,-4);
 if($no1 == '' || $no2 == ''){
  $no_split = $no_bk;
 } else {
  $no_split = $no1.'-'.$no2.'-'.$no3;
 }
 
 return $no_split;
}

// 休日を除外した月末4日前を計算し、日時を返す
// 20221222 5営業日前→4営業日前に変更 一人親方と同じにする
function calc_last4day(){
		
	$holiday = db_getTholiday('DESC');

		$lastday = date('Y-m-t');
		$last4day = date('Y-m-d', strtotime('-4 days', strtotime(date('Y-m-t'))));
		
		$checkday = $lastday;
		for($i=0;$i<=4;$i++){
			foreach($holiday as $hday){
				if($hday == $checkday){
					$last4day = date('Y-m-d', strtotime('-1 day', strtotime($last4day)));
					$checkday = date('Y-m-d', strtotime('-1 day', strtotime($checkday)));
				}
			}
			$checkday = date('Y-m-d', strtotime('-1 day', strtotime($checkday)));
		}

		return $last4day;
}

 function seireki_to_wareki($year){
    $tmp=0;
    if ($year > 2018) {//令和
        $tmp = $year - 2018;
        if($tmp === 1) $tmp = '元';
        $tmp = '令和'.$tmp;
        return $tmp;
    }else if ($year > 1988) {//平成
        $tmp = $year - 1988;
        if($tmp === 1) $tmp = '元';
        $tmp = '平成'.$tmp;
        return $tmp;
    }else if ($year > 1925) {//昭和
        $tmp = $year - 1925;
        if($tmp === 1) $tmp = '元';
        $tmp = '昭和'.$tmp;
        return $tmp;
    }else if ($year > 1911) {//大正
        $tmp = $year - 1911;
        if($tmp === 1) $tmp = '元';
        $tmp = '大正'.$tmp;
        return $tmp;
    }else if ($year > 1867) {//明治
        $tmp = $year - 1867;
        if($tmp === 1) $tmp = '元';
        $tmp = '明治'.$tmp;
        return $tmp;
    }else{//該当なし
        return '';
    }
}

$today = intval(date('j'));
$last4day = intval(date('j', strtotime(calc_last4day())));
if($today > $last4day){
	$kanyu_year = date('Y', strtotime(date('Y-m-01').' +1 month'));
	$kanyu_month = date('n', strtotime(date('Y-m-01').' +1 month'));
	$kanyu2_year = date('Y', strtotime(date('Y-m-01').' +2 month'));
	$kanyu2_month = date('n', strtotime(date('Y-m-01').' +2 month'));
}else{
	$kanyu_year = date('Y', strtotime(date('Y-m-01')));
	$kanyu_month = date('n', strtotime(date('Y-m-01')));
	$kanyu2_year = date('Y', strtotime(date('Y-m-01').' +1 month'));
	$kanyu2_month = date('n', strtotime(date('Y-m-01').' +1 month'));
}


	$kanyu_month1 = $kanyu_month;
	if($kanyu_month1 > 12) $kanyu_month1 = $kanyu_month1-12;
	$kanyu2_month1 = $kanyu2_month;
	if($kanyu2_month1 > 12) $kanyu2_month1 = $kanyu2_month1-12;

/* 20211227 ３か月加入　末尾計算 */
 // 年払い
 $end_year = intval($kanyu_year) + 1;   
 $end2_year = intval($kanyu2_year) + 1;   
 $end_month = 3;
 $end2_month = 3;
 // 3か月加入
 $end_year_3m = intval(date('Y', strtotime(date($kanyu_year.'-'.$kanyu_month.'-01').' +2 month')));
 $end_month_3m = intval(date('n', strtotime(date($kanyu_year.'-'.$kanyu_month.'-01').' +2 month')));
 $end2_year_3m = intval(date('Y', strtotime(date($kanyu2_year.'-'.$kanyu2_month.'-01').' +2 month')));
 $end2_month_3m = intval(date('n', strtotime(date($kanyu2_year.'-'.$kanyu2_month.'-01').' +2 month')));

function get_funjin_syurui(){
	$syurui = array();
	$syurui[] = 'はつり工事';
	$syurui[] = 'アーク溶接';
	$syurui[] = 'その他';
	
	return $syurui;
}
function get_shindou_syurui(){
	$syurui = array();
	$syurui[] = 'チッピングハンマー';
	$syurui[] = 'コーキングハンマー';
	$syurui[] = 'コンクリートブレーカー';
	$syurui[] = 'チェンソー';
	$syurui[] = 'ブッシュクリーナー';
	$syurui[] = 'その他';
	
	return $syurui;
}
function get_shindou_syurui43(){
	$syurui = array();
	$syurui[] = 'インパクトドライバー（ネジ締め）';
	$syurui[] = 'ハンマー';
	$syurui[] = 'スコップ';
	$syurui[] = '丸のこ';
	$syurui[] = '特になし';
	$syurui[] = 'その他';
	
	return $syurui;
}
function get_namari_syurui(){
	$syurui = array();
	$syurui[] = '半田付け作業';
	$syurui[] = 'その他';
	
	return $syurui;
}
function get_youzai_syurui(){
	$syurui = array();
	$syurui[] = 'キシレン';
	$syurui[] = 'トルエン';
	$syurui[] = 'メタノール';
	$syurui[] = '酢酸エチル';
	$syurui[] = 'メチルエチルケトン';
	$syurui[] = 'エチルベンゼン';
	$syurui[] = 'メチルイソブチルケトン';
	$syurui[] = 'イソブチルアルコール';
	$syurui[] = 'エチルエーテル';
	$syurui[] = 'その他';
	
	return $syurui;
}


 function format_wareki_birth($y, $m, $d){

  $wy = seireki_to_wareki($y);
  $wareki_birth = $wy.'年('.$y.'年)'.$m.'月'.$d.'日';
  
  return $wareki_birth;
 }




    $pref = array();
    $pref[1]="北海道";
    $pref[2]="青森県";
    $pref[3]="岩手県";
    $pref[4]="宮城県";
    $pref[5]="秋田県";
    $pref[6]="山形県";
    $pref[7]="福島県";
    $pref[8]="茨城県";
    $pref[9]="栃木県";
    $pref[10]="群馬県";
    $pref[11]="埼玉県";
    $pref[12]="千葉県";
    $pref[12]="千葉県";
    $pref[13]="東京都";
    $pref[14]="神奈川県";
    $pref[15]="新潟県";
    $pref[16]="富山県";
    $pref[17]="石川県";
    $pref[18]="福井県";
    $pref[19]="山梨県";
    $pref[20]="長野県";
    $pref[21]="岐阜県";
    $pref[22]="静岡県";
    $pref[23]="愛知県";
    $pref[24]="三重県";
    $pref[25]="滋賀県";
    $pref[26]="京都府";
    $pref[27]="大阪府";
    $pref[28]="兵庫県";
    $pref[29]="奈良県";
    $pref[30]="和歌山県";
    $pref[31]="鳥取県";
    $pref[32]="島根県";
    $pref[33]="岡山県";
    $pref[34]="広島県";
    $pref[35]="山口県";
    $pref[36]="徳島県";
    $pref[37]="香川県";
    $pref[38]="愛媛県";
    $pref[39]="高知県";
    $pref[40]="福岡県";
    $pref[41]="佐賀県";
    $pref[42]="長崎県";
    $pref[43]="熊本県";
    $pref[44]="大分県";
    $pref[45]="宮崎県";
    $pref[46]="鹿児島県";
    $pref[47]="沖縄県";
 
    $pref["北海道"]="01";
    $pref["青森県"]="02";
    $pref["岩手県"]="03";
    $pref["宮城県"]="04";
    $pref["秋田県"]="05";
    $pref["山形県"]="06";
    $pref["福島県"]="07";
    $pref["茨城県"]="08";
    $pref["栃木県"]="09";
    $pref["群馬県"]="10";
    $pref["埼玉県"]="11";
    $pref["千葉県"]="12";
    $pref["東京都"]="13";
    $pref["神奈川県"]="14";
    $pref["新潟県"]="15";
    $pref["富山県"]="16";
    $pref["石川県"]="17";
    $pref["福井県"]="18";
    $pref["山梨県"]="19";
    $pref["長野県"]="20";
    $pref["岐阜県"]="21";
    $pref["静岡県"]="22";
    $pref["愛知県"]="23";
    $pref["三重県"]="24";
    $pref["滋賀県"]="25";
    $pref["京都府"]="26";
    $pref["大阪府"]="27";
    $pref["兵庫県"]="28";
    $pref["奈良県"]="29";
    $pref["和歌山県"]="30";
    $pref["鳥取県"]="31";
    $pref["島根県"]="32";
    $pref["岡山県"]="33";
    $pref["広島県"]="34";
    $pref["山口県"]="35";
    $pref["徳島県"]="36";
    $pref["香川県"]="37";
    $pref["愛媛県"]="38";
    $pref["高知県"]="39";
    $pref["福岡県"]="40";
    $pref["佐賀県"]="41";
    $pref["長崎県"]="42";
    $pref["熊本県"]="43";
    $pref["大分県"]="44";
    $pref["宮崎県"]="45";
    $pref["鹿児島県"]="46";
    $pref["沖縄県"]="47";

    $kouji_syubetu_btn[]='足場';
    $kouji_syubetu_btn[]='電気';
    $kouji_syubetu_btn[]='内装';
    $kouji_syubetu_btn[]='管';
    $kouji_syubetu_btn[]='とび・土工・コンクリート';
    $kouji_syubetu_btn[]='大工';
    $kouji_syubetu_btn[]='塗装';
    $kouji_syubetu_btn[]='防水';
    $kouji_syubetu_btn[]='板金';
    $kouji_syubetu_btn[]='タイル・れんが・ブロック';
    $kouji_syubetu_btn[]='左官';
    $kouji_syubetu_btn[]='鉄筋';
    $kouji_syubetu_btn[]='屋根';
    $kouji_syubetu_btn[]='機械器具設置';
    $kouji_syubetu_btn[]='電気通信';
    $kouji_syubetu_btn[]='建具';
    $kouji_syubetu_btn[]='熱絶縁';
    $kouji_syubetu_btn[]='ガラス';
    $kouji_syubetu_btn[]='消防施設';
    $kouji_syubetu_btn[]='美装';
    $kouji_syubetu_btn[]='解体';
 
    $kouji_syubetu_btn[]='造園';
    $kouji_syubetu_btn[]='外構';
    $kouji_syubetu_btn[]='型枠';
    $kouji_syubetu_btn[]='鉄骨';
 
    $kouji_syubetu_type['とび・土工・コンクリート']= array(0,0,0,0);//'とび工事';
    $kouji_syubetu_type['電気']= array(0,0,0,0);//'電気工事';
    $kouji_syubetu_type['内装']= array(0,0,0,0);//'内装工事';
    $kouji_syubetu_type['管']= array(0,0,0,0);//管
    $kouji_syubetu_type['塗装']= array(0,0,0,1);//'塗装工事';
    $kouji_syubetu_type['大工']= array(0,0,0,0);//'大工';
    $kouji_syubetu_type['機械器具設置']= array(0,0,0,0);//'機械器具据付工事';
    $kouji_syubetu_type['電気通信']= array(0,0,0,0);//'電気通信工事';
    $kouji_syubetu_type['防水']= array(0,0,0,1);//'防水工事';
    $kouji_syubetu_type['解体']= array(0,0,0,0);//'解体工事';
    $kouji_syubetu_type['左官']= array(0,0,0,0);//'左官工事';
    $kouji_syubetu_type['美装']= array(0,0,0,0);//美装
    $kouji_syubetu_type['板金']= array(0,0,0,0);//'板金工事';
    $kouji_syubetu_type['タイル・れんが・ブロック']= array(0,0,0,0);//'タイル工事';
    $kouji_syubetu_type['鉄筋']= array(0,0,0,0);//鉄筋
    $kouji_syubetu_type['造園']= array(0,0,0,0);//
    $kouji_syubetu_type['熱絶縁']= array(0,0,0,0);//'熱絶縁工事';
    $kouji_syubetu_type['建具']= array(0,0,0,0);//'建具工事';
    $kouji_syubetu_type['屋根']= array(0,0,0,0);//'屋根工事';
    $kouji_syubetu_type['ガラス']= array(0,0,0,0);//'ガラス工事';
    $kouji_syubetu_type['消防施設']= array(0,0,0,0);//消防施設
    $kouji_syubetu_type['足場']= array(0,0,0,0);//'足場組立工事';
 
    $kouji_syubetu_type['外構']= array(0,0,0,0);//
    $kouji_syubetu_type['型枠']= array(0,0,0,0);//
    $kouji_syubetu_type['鉄骨']= array(0,0,0,0);//
 
    $roumu = array();

$roumu["大工"] = 3501;
$roumu["塗装"] = 3504;
$roumu["防水"] = 3501;
$roumu["板金"] = 3501;
$roumu["タイル・れんが・ブロック"] = 3501;
$roumu["左官"] = 3504;
$roumu["鉄筋"] = 3501;
$roumu["屋根"] = 3501;
$roumu["足場"] = 3501;
$roumu["電気"] = 3507;
$roumu["内装"] = 3501;
$roumu["管"] = 3504;
$roumu["機械器具設置"] = 3801;
$roumu["電気通信"] = 3801;
$roumu["建具"] = 3803;
$roumu["熱絶縁"] = 3801;
$roumu["ガラス"] = 3801;
$roumu["消防施設"] = 3504;
$roumu["美装"] = 3501;
$roumu["とび・土工・コンクリート"] = 3718;
$roumu["解体"] = 3505;
$roumu["造園"] = 3506;
$roumu["外構"] = 3506;
$roumu["型枠"] = 3505;
$roumu["鉄骨"] = 3501;


    $roumu_hiritu = array();
    $roumu_hiritu[33] = 0.17;
    $roumu_hiritu[35] = 0.23;
    $roumu_hiritu[38] = 0.23;
    $roumu_hiritu[37] = 0.24;

    $ryouritsu = array();
    $ryouritsu[33] = 0.009;
    $ryouritsu[35] = 0.0095;
    $ryouritsu[38] = 0.012;
    $ryouritsu[37] = 0.015;
  
    $tukisuu = array();
    $tukisuu[1] = 15;
    $tukisuu[2] = 14;
    $tukisuu[3] = 13;
    $tukisuu[4] = 12;
    $tukisuu[5] = 11;
    $tukisuu[6] = 10;
    $tukisuu[7] = 9;
    $tukisuu[8] = 8;
    $tukisuu[9] = 7;
    $tukisuu[10] = 6;
    $tukisuu[11] = 5;
    $tukisuu[12] = 4;

	$nitigaku[]=3500;
	$nitigaku[]=4000;
	$nitigaku[]=5000;
	$nitigaku[]=6000;
	$nitigaku[]=7000;
	$nitigaku[]=8000;
	$nitigaku[]=9000;
	$nitigaku[]=10000;
	$nitigaku[]=12000;
	$nitigaku[]=14000;
	$nitigaku[]=16000;
	$nitigaku[]=18000;
	$nitigaku[]=20000;
	$nitigaku[]=22000;
	$nitigaku[]=24000;
	$nitigaku[]=25000;

$value=array();
$value['25000_1']=760417;
$value['25000_2']=1520834;
$value['25000_3']=2281251;
$value['25000_4']=3041668;
$value['25000_5']=3802085;
$value['25000_6']=4562502;
$value['25000_7']=5322919;
$value['25000_8']=6083336;
$value['25000_9']=6843753;
$value['25000_10']=7604170;
$value['25000_11']=8364587;
$value['25000_12']=9125000;
$value['24000_1']=730000;
$value['24000_2']=1460000;
$value['24000_3']=2190000;
$value['24000_4']=2920000;
$value['24000_5']=3650000;
$value['24000_6']=4380000;
$value['24000_7']=5110000;
$value['24000_8']=5840000;
$value['24000_9']=6570000;
$value['24000_10']=7300000;
$value['24000_11']=8030000;
$value['24000_12']=8760000;
$value['22000_1']=669167;
$value['22000_2']=1338334;
$value['22000_3']=2007501;
$value['22000_4']=2676668;
$value['22000_5']=3345835;
$value['22000_6']=4015002;
$value['22000_7']=4684169;
$value['22000_8']=5353336;
$value['22000_9']=6022503;
$value['22000_10']=6691670;
$value['22000_11']=7360837;
$value['22000_12']=8030000;
$value['20000_1']=608334;
$value['20000_2']=1216668;
$value['20000_3']=1825002;
$value['20000_4']=2433336;
$value['20000_5']=3041670;
$value['20000_6']=3650004;
$value['20000_7']=4258338;
$value['20000_8']=4866672;
$value['20000_9']=5475006;
$value['20000_10']=6083340;
$value['20000_11']=6691674;
$value['20000_12']=7300000;
$value['18000_1']=547500;
$value['18000_2']=1095000;
$value['18000_3']=1642500;
$value['18000_4']=2190000;
$value['18000_5']=2737500;
$value['18000_6']=3285000;
$value['18000_7']=3832500;
$value['18000_8']=4380000;
$value['18000_9']=4927500;
$value['18000_10']=5475000;
$value['18000_11']=6022500;
$value['18000_12']=6570000;
$value['16000_1']=486667;
$value['16000_2']=973334;
$value['16000_3']=1460001;
$value['16000_4']=1946668;
$value['16000_5']=2433335;
$value['16000_6']=2920002;
$value['16000_7']=3406669;
$value['16000_8']=3893336;
$value['16000_9']=4380003;
$value['16000_10']=4866670;
$value['16000_11']=5353337;
$value['16000_12']=5840000;
$value['14000_1']=425834;
$value['14000_2']=851668;
$value['14000_3']=1277502;
$value['14000_4']=1703336;
$value['14000_5']=2129170;
$value['14000_6']=2555004;
$value['14000_7']=2980838;
$value['14000_8']=3406672;
$value['14000_9']=3832506;
$value['14000_10']=4258340;
$value['14000_11']=4684174;
$value['14000_12']=5110000;
$value['12000_1']=365000;
$value['12000_2']=730000;
$value['12000_3']=1095000;
$value['12000_4']=1460000;
$value['12000_5']=1825000;
$value['12000_6']=2190000;
$value['12000_7']=2555000;
$value['12000_8']=2920000;
$value['12000_9']=3285000;
$value['12000_10']=3650000;
$value['12000_11']=4015000;
$value['12000_12']=4380000;
$value['10000_1']=304167;
$value['10000_2']=608334;
$value['10000_3']=912501;
$value['10000_4']=1216668;
$value['10000_5']=1520835;
$value['10000_6']=1825002;
$value['10000_7']=2129169;
$value['10000_8']=2433336;
$value['10000_9']=2737503;
$value['10000_10']=3041670;
$value['10000_11']=3345837;
$value['10000_12']=3650000;
$value['9000_1']=273750;
$value['9000_2']=547500;
$value['9000_3']=821250;
$value['9000_4']=1095000;
$value['9000_5']=1368750;
$value['9000_6']=1642500;
$value['9000_7']=1916250;
$value['9000_8']=2190000;
$value['9000_9']=2463750;
$value['9000_10']=2737500;
$value['9000_11']=3011250;
$value['9000_12']=3285000;
$value['8000_1']=243334;
$value['8000_2']=486668;
$value['8000_3']=730002;
$value['8000_4']=973336;
$value['8000_5']=1216670;
$value['8000_6']=1460004;
$value['8000_7']=1703338;
$value['8000_8']=1946672;
$value['8000_9']=2190006;
$value['8000_10']=2433340;
$value['8000_11']=2676674;
$value['8000_12']=2920000;
$value['7000_1']=212917;
$value['7000_2']=425834;
$value['7000_3']=638751;
$value['7000_4']=851668;
$value['7000_5']=1064585;
$value['7000_6']=1277502;
$value['7000_7']=1490419;
$value['7000_8']=1703336;
$value['7000_9']=1916253;
$value['7000_10']=2129170;
$value['7000_11']=2342087;
$value['7000_12']=2555000;
$value['6000_1']=182500;
$value['6000_2']=365000;
$value['6000_3']=547500;
$value['6000_4']=730000;
$value['6000_5']=912500;
$value['6000_6']=1095000;
$value['6000_7']=1277500;
$value['6000_8']=1460000;
$value['6000_9']=1642500;
$value['6000_10']=1825000;
$value['6000_11']=2007500;
$value['6000_12']=2190000;
$value['5000_1']=152084;
$value['5000_2']=304168;
$value['5000_3']=456252;
$value['5000_4']=608336;
$value['5000_5']=760420;
$value['5000_6']=912504;
$value['5000_7']=1064588;
$value['5000_8']=1216672;
$value['5000_9']=1368756;
$value['5000_10']=1520840;
$value['5000_11']=1672924;
$value['5000_12']=1825000;
$value['4000_1']=121667;
$value['4000_2']=243334;
$value['4000_3']=365001;
$value['4000_4']=486668;
$value['4000_5']=608335;
$value['4000_6']=730002;
$value['4000_7']=851669;
$value['4000_8']=973336;
$value['4000_9']=1095003;
$value['4000_10']=1216670;
$value['4000_11']=1338337;
$value['4000_12']=1460000;
$value['3500_1']=106459;
$value['3500_2']=212918;
$value['3500_3']=319377;
$value['3500_4']=425836;
$value['3500_5']=532295;
$value['3500_6']=638754;
$value['3500_7']=745213;
$value['3500_8']=851672;
$value['3500_9']=958131;
$value['3500_10']=1064590;
$value['3500_11']=1171049;
$value['3500_12']=1277500;

function __sendmail($from, $from_name, $to, $to_name, $title, $text){
	mb_language("Japanese");
	mb_internal_encoding("UTF-8");
	$to_name = mb_encode_mimeheader($to_name,"ISO-2022-JP");
	$to = "$to_name<$to>";
	$from_name = mb_encode_mimeheader($from_name, "ISO-2022-JP");
 $title = mb_convert_encoding($title, "ISO-2022-JP-MS");
 $text = mb_convert_encoding($text, "ISO-2022-JP-MS");
	$param = "-f ".$from;
	$from = "$from_name<$from>";
	$header  = "From: $from\n";
	$header .= "Reply-To: $from";
	$result = mb_send_mail($to, $title, $text, $header, $param);
	if ($result) {
	} else {
	}
}

function convertto_zenkaku($str){
	return mb_convert_kana($str, 'KSRNAV');
}
function convertto_zenkana($str){
	return mb_convert_kana($str, 'KCSRNAV');
}
function convertto_hankana($str){
	return mb_convert_kana($str, 'khsrna');
}

function convertto_haneisu($str){
	return mb_convert_kana($str, 'as');
}

?>
