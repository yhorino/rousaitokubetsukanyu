<?php
include_once('auth.php');
require_once('common_function.php');
header("Content-type: text/html;charset=utf-8");

$title="特別加入者情報";
?>

<!doctype html>
<html id="kanyusya_php">
<head>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_head.html'; ?>
	
 
<?php include_once('settings.php'); ?>
  <meta name="description" content="">
  <meta name="keywords" content="">
 
<script src='pdfmake/pdfmake.min.js'></script>
<script src='pdfmake/vfs_fonts.js'></script>
 
<title><?php echo $title;?></title>
 
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width">
  <meta name="description" content="">
  <link rel="canonical" href="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/kanyusya.php">
  <link rel="alternate" media="handheld" href="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/kanyusya.php">
 
 <meta name="robots" content="all">
 <meta name="copyright" content="Copyright 2020 労働保険事務組合RJC All Rights Reserved.">
 <meta property="og:title" content="<?php echo $title;?>　：　マイページ">
 <meta property="og:type" content="article">
 <meta property="og:url" content="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/kanyusya.php">
 <meta property="og:image" content="/assets/img/m_zenekon.png">
 <meta property="og:site_name" content="中小事業主の特別加入RJC">
 <meta property="og:description" content=""> 
 <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
 <link rel="icon" href="/favicon.ico">
 
</head>

<body>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_body.html'; ?>
	
 
<?php include_once('header.php'); ?>

<div class="inner">
<?php
$no = 1;
 $roudouno[0] = $_SESSION['row']['jimuRoudouhokenBangou0__c'];
 $roudouno[1] = $_SESSION['row']['jimuRoudouhokenBangou5__c'];
 $roudouno[2] = $_SESSION['row']['jimuRoudouhokenBangou6__c'];
 $bikou[0] = '一元適用事業　労災・雇用保険';
 $bikou[1] = '二元適用事業　労災保険（元請労災保険）';
 $bikou[2] = '二元適用事業　労災保険';
 $matsubi[0] = 0;
 $matsubi[1] = 5;
 $matsubi[2] = 6;
 $kanyudate_itemname[0] = 'matubi0kanyubi__c';
 $kanyudate_itemname[1] = 'Kanyudate__c';
 $kanyudate_itemname[2] = 'matubi6kanyubi__c';
?>
 
<?php
 for($j=0;$j<3;$j++){
if($roudouno[$j] != '') {
 echo '
<div class="gray_box show_pc hide_sp roudouno'.$j.'">
<figure>
 <figcaption>労働保険番号</figcaption>
 <table class="roudouhokenbangou">
  <tr><th>No</th><th>労働保険番号</th><th>備考</th></tr>
   <tr><td>'.$no.'</td><td>'.$roudouno[$j].'</td><td>'.$bikou[$j].'</td></tr>
 </table>
</figure>
 
<figure>
 <figcaption>特別加入者情報</figcaption>
 <table>
  <tr>
   <th>整理番号</th><th>氏名</th><th>給付基礎日額</th><th>加入日</th><th>脱退日</th><th>会員カード</th><th>加入証明書</th>
  </tr>';
   $count = 0;
   for($i=1;$i<=5;$i++){
    $kanyusya = $_SESSION['row_kaiin'.$i];
    
    $kanyudate = $kanyusya[$kanyudate_itemname[$j]];
    if($j==1 && $kanyudate == ''){$kanyudate = '2023-04-01';}
    
    if($kanyusya['Name'] != '' && 
       (
        $kanyusya['jimuRoudouhokenBangou0__c'] == $roudouno[$j] || 
        $kanyusya['jimuRoudouhokenBangou5__c'] == $roudouno[$j] || 
        $kanyusya['jimuRoudouhokenBangou6__c'] == $roudouno[$j] ||
        ($kanyusya['jimuRoudouhokenBangou0__c'] == '' &&
         $kanyusya['jimuRoudouhokenBangou5__c'] == '' &&
         $kanyusya['jimuRoudouhokenBangou6__c'] == '' &&
         $_SESSION['row']['jimuRoudouhokenBangou5__c'] == $roudouno[$j]
        )
       )
      ){
     echo '<tr><td>'.$kanyusya['CellsNo__c'].'</td><td>'.$kanyusya['Name'].'</td><td>'.number_format($kanyusya['Kyuhukisonitigaku__c']).' 円</td><td>'.$kanyudate.'</td><td>'.$kanyusya['DattaiNenggapi__c'].'</td><td><a href="kaiinsyo.php?no='.$i.'&seiribangou='.$kanyusya['CellsNo__c'].'&matsubi='.$matsubi[$j].'">表示・印刷</a></td><td><a href="#" onclick="outputPDF('.$i.', \''.$roudouno[$j].'\');" >表示・印刷</a></td></tr>';
     $count++;
    }
   }
  echo '
 </table>
</figure>
</div>
 
<div class="gray_box show_sp hide_pc roudouno'.$j.'">
<figure>
 <figcaption>労働保険番号</figcaption>
 <table class="roudouhokenbangou_sp">
  <tr><th>労働保険番号</th><td>'.$roudouno[$j].'</td></tr>
 </table>
</figure>
 
<figure>
 <figcaption>特別加入者情報</figcaption>
 <table>';
   for($i=1;$i<=5;$i++){
    $kanyusya = $_SESSION['row_kaiin'.$i];
    if($kanyusya['Name'] != '' && 
       (
        $kanyusya['jimuRoudouhokenBangou0__c'] == $roudouno[$j] || 
        $kanyusya['jimuRoudouhokenBangou5__c'] == $roudouno[$j] || 
        $kanyusya['jimuRoudouhokenBangou6__c'] == $roudouno[$j] ||
        ($kanyusya['jimuRoudouhokenBangou0__c'] == '' &&
         $kanyusya['jimuRoudouhokenBangou5__c'] == '' &&
         $kanyusya['jimuRoudouhokenBangou6__c'] == '' &&
         $_SESSION['row']['jimuRoudouhokenBangou5__c'] == $roudouno[$j]
        )
       )
      ){
     echo '  <tr>
   <th>整理番号</th><td>'.$kanyusya['CellsNo__c'].'</td>
  </tr>
';
     echo '  <tr><th>氏名</th><td>'.$kanyusya['Name'].'</td>
  </tr>
';
     echo '  <tr><th>給付基礎日額</th><td>'.number_format($kanyusya['Kyuhukisonitigaku__c']).' 円</td>
  </tr>
';
     echo '  <tr><th>加入日</th><td>'.$kanyudate.'</td>
  </tr>
';
     echo '  <tr><th>脱退日</th><td>'.$kanyusya['DattaiNenggapi__c'].'</td>
  </tr>
';
     echo '  <tr><th>会員カード</th><td><a href="kaiinsyo.php?no='.$i.'&seiribangou='.$kanyusya['CellsNo__c'].'&matsubi='.$matsubi[$j].'">表示・印刷</a></td>
  </tr>
';
     echo '  <tr><th>加入証明書</th><td><a href="#" onclick="outputPDF('.$i.', \''.$roudouno[$j].'\');" >表示・印刷</a></td>
  </tr>
';
    }
   }
 echo '
 </table>
</figure>
</div>';
 $no++;
 if($count == 0){
  echo '<style>.roudouno'.$j.'{ display: none;}</style>';
 }
}
}
?>

<?php
  /*
  if($_SESSION['row']['jimuRoudouhokenBangou2__c'] != '') {
   echo '<tr><td>'.$i.'</td><td>'.$_SESSION['row']['jimuRoudouhokenBangou2__c'].'</td><td>二元適用事業　雇用保険</td></tr>';
   $i++;
  }
  if($_SESSION['row']['jimuRoudouhokenBangou5__c'] != '') {
   echo '<tr><td>'.$i.'</td><td>'.$_SESSION['row']['jimuRoudouhokenBangou5__c'].'</td><td>二元適用事業　労災保険（元請労災保険）</td></tr>';
   $i++;
  }
  if($_SESSION['row']['jimuRoudouhokenBangou6__c'] != '') {
   echo '<tr><td>'.$i.'</td><td>'.$_SESSION['row']['jimuRoudouhokenBangou6__c'].'</td><td></td></tr>';
   $i++;
  }
  */
  ?>
 
<input type="button" name="prev" value="戻る" onclick="history.back();">
 
</div>
	
<?php include_once('footer.php'); ?>

 <script>

function zth(text){
  var txt = String(text);
  var str = txt.replace(/[Ａ-Ｚａ-ｚ０-９]/g, function(s) {
		return String.fromCharCode(s.charCodeAt(0) - 65248);
 });
 str = str.replace(/　/g,' ');
 str = str.replace(/－/g,'-');
 str = str.replace(/―/g,'-');
 str = str.replace(/—/g,'-');
 str = str.replace(/‐/g,'-');
 return str;
}
 
function outputPDF($i, $roudouno){
 
  // ここでフォントを指定
  pdfMake.fonts = {
      GenShin: {
        normal: 'GenShinGothic-Normal-Sub.ttf',
        bold: 'GenShinGothic-Normal-Sub.ttf',
        italics: 'GenShinGothic-Normal-Sub.ttf',
        bolditalics: 'GenShinGothic-Normal-Sub.ttf'
      }
    }
 
 var NamePHP = ["","<?php echo $_SESSION['row_kaiin1']['Name'];?>", "<?php echo $_SESSION['row_kaiin2']['Name'];?>", "<?php echo $_SESSION['row_kaiin3']['Name'];?>", "<?php echo $_SESSION['row_kaiin4']['Name'];?>", "<?php echo $_SESSION['row_kaiin5']['Name'];?>"];
 var NitigakuPHP = ["","<?php echo $_SESSION['row_kaiin1']['Kyuhukisonitigaku__c'];?>", "<?php echo $_SESSION['row_kaiin2']['Kyuhukisonitigaku__c'];?>", "<?php echo $_SESSION['row_kaiin3']['Kyuhukisonitigaku__c'];?>", "<?php echo $_SESSION['row_kaiin4']['Kyuhukisonitigaku__c'];?>", "<?php echo $_SESSION['row_kaiin5']['Kyuhukisonitigaku__c'];?>"];
 var CellsNoPHP = ["","<?php echo $_SESSION['row_kaiin1']['CellsNo__c'];?>", "<?php echo $_SESSION['row_kaiin2']['CellsNo__c'];?>", "<?php echo $_SESSION['row_kaiin3']['CellsNo__c'];?>", "<?php echo $_SESSION['row_kaiin4']['CellsNo__c'];?>", "<?php echo $_SESSION['row_kaiin5']['CellsNo__c'];?>"];

 var KanyudatePHP0 = ["","<?php echo $_SESSION['row_kaiin1']['matubi0kanyubi__c'];?>", "<?php echo $_SESSION['row_kaiin2']['matubi0kanyubi__c'];?>", "<?php echo $_SESSION['row_kaiin3']['matubi0kanyubi__c'];?>", "<?php echo $_SESSION['row_kaiin4']['matubi0kanyubi__c'];?>", "<?php echo $_SESSION['row_kaiin5']['matubi0kanyubi__c'];?>"];
 var KanyudatePHP5 = ["","<?php echo $_SESSION['row_kaiin1']['Kanyudate__c'];?>", "<?php echo $_SESSION['row_kaiin2']['Kanyudate__c'];?>", "<?php echo $_SESSION['row_kaiin3']['Kanyudate__c'];?>", "<?php echo $_SESSION['row_kaiin4']['Kanyudate__c'];?>", "<?php echo $_SESSION['row_kaiin5']['Kanyudate__c'];?>"];
 var KanyudatePHP6 = ["","<?php echo $_SESSION['row_kaiin1']['matubi6kanyubi__c'];?>", "<?php echo $_SESSION['row_kaiin2']['matubi6kanyubi__c'];?>", "<?php echo $_SESSION['row_kaiin3']['matubi6kanyubi__c'];?>", "<?php echo $_SESSION['row_kaiin4']['matubi6kanyubi__c'];?>", "<?php echo $_SESSION['row_kaiin5']['matubi6kanyubi__c'];?>"];

 var KanyudatePHP = KanyudatePHP0;
 var roudouno_split = $roudouno.split('-');
 var matsubi = parseInt(roudouno_split[1].substr(-1));
 if(matsubi == 0){ KanyudatePHP = KanyudatePHP0; }
 if(matsubi == 5){ KanyudatePHP = KanyudatePHP5; }
 if(matsubi == 6){ KanyudatePHP = KanyudatePHP6; }
 
 var KanyumankibiPHP = ["","<?php echo $_SESSION['row_kaiin1']['Kanyumankibinew__c'];?>", "<?php echo $_SESSION['row_kaiin2']['Kanyumankibinew__c'];?>", "<?php echo $_SESSION['row_kaiin3']['Kanyumankibinew__c'];?>", "<?php echo $_SESSION['row_kaiin4']['Kanyumankibinew__c'];?>", "<?php echo $_SESSION['row_kaiin5']['Kanyumankibinew__c'];?>"];
 
 var now = new Date();
 var fy = Number(now.getFullYear());
 var fny = Number(now.getFullYear());
// var y = Number(now.getFullYear())-2018;
 var y = Number(now.getFullYear());
 var m = now.getMonth()+1;
 var d = now.getDate();
 if(Number(m)>3) fny += 1;
 /* 注：全角数字、記号等は文字化けする？フォントの問題？ */
 var Rousaihokenno__c = $roudouno;
 var Address = "<?php echo $_SESSION['row']['BillingState'].$_SESSION['row']['BillingCity'].$_SESSION['row']['BillingStreet'];?>";
 var KaisyaName = "<?php echo $_SESSION['row']['Name'];?>";
 var Daihyosyaname = "<?php echo $_SESSION['row']['Daihyosya__c'];?>";
 var CellsNo__c = CellsNoPHP[$i];
 var Name = NamePHP[$i];
 var KojiType__c = "<?php echo $_SESSION['row']['KojiType__c'];?>";
 var Nownitigaku__c = NitigakuPHP[$i];
 var Kanyunengappiwareki__c = KanyudatePHP[$i];
 var Kanyumankiwareki__c = KanyumankibiPHP[$i];

 if(m < 4){
  fy = fy - 1;
 } else {
  fny = fny + 1;
 }

 /* 20220325 SFデータ入力完了までは2022/4/1～2023/3/31にする */
 /*
 if(Kanyunengappiwareki__c == '') Kanyunengappiwareki__c = fy+'-04-01';
 if(Kanyumankiwareki__c == '') Kanyumankiwareki__c = fny+'-03-31';
 */
 if(Kanyunengappiwareki__c == '') Kanyunengappiwareki__c = '2023-04-01';
 if(Kanyumankiwareki__c == '') Kanyumankiwareki__c = '2024-03-31';
 
var Nitigaku = Number(Nownitigaku__c).toLocaleString('ja-JP')+' 円';
var kanyuymd = Kanyunengappiwareki__c.split('-');
var dattaiymd = Kanyumankiwareki__c.split('-');
var Kanyukikan = kanyuymd[0]+' 年 '+kanyuymd[1]+' 月 '+kanyuymd[2]+' 日 から';
var Kanyukikan2 = dattaiymd[0]+' 年 '+dattaiymd[1]+' 月 '+dattaiymd[2]+' 日 まで';
//var Today = '令和 '+y+' 年 '+m+' 月 '+d+' 日'; 
var Today = y+' 年 '+m+' 月 '+d+' 日'; 

 var docDefinition = {
    pageSize: 'A4',
    pageMargins: [0, 0, 0, 0],
    content: [
     {
      text: zth(Rousaihokenno__c), absolutePosition:{x:230,y:227}, fontSize: 12
     },
     {
      text: zth(CellsNo__c), absolutePosition:{x:230,y:263}, fontSize: 12
     },
     {
      text: zth(Name), absolutePosition:{x:230,y:299}, fontSize: 12
     },
     {
      text: zth(Nitigaku), absolutePosition:{x:230,y:335}, fontSize: 12
     },
     {
      text: zth(KaisyaName), absolutePosition:{x:230,y:371}, fontSize: 12
     },
     {
      text: zth(Address), absolutePosition:{x:230,y:407}, fontSize: 12
     },
     {
      text: zth(Kanyukikan), absolutePosition:{x:230,y:443}, fontSize: 12
     },
     {
      text: zth(Kanyukikan2), absolutePosition:{x:230,y:463}, fontSize: 12
     },
     {
      text: zth(Today), absolutePosition:{x:150,y:576}, fontSize: 12
     },
/*     
     {
      text: zth(Daihyosyaname), absolutePosition:{x:200,y:359}, fontSize: 10
     },
     {
      text: zth(KojiType__c), absolutePosition:{x:230,y:452}, fontSize: 12
     },
*/

             ],
    defaultStyle:{
      font: 'GenShin'//ここでデフォルトのスタイル名を指定しています。
    },
    background: [ // https://hamayapp.appspot.com/static/data_uri_conv.html
        {
            image: '<?php include 'bk_kanyusyomeisyo.php' ;?>', width: 595
        }
    ]
};
 
//  pdfMake.createPdf(docDefinition).download('加入証明書.pdf');
  pdfMake.createPdf(docDefinition).open();
}
  
   </script>
 
</body>
</html>