<?php
include_once('auth.php');
require_once('common_function.php');
header("Content-type: text/html;charset=utf-8");

$title="各種ダウンロード・印刷";
?>

<!doctype html>
<html id="download_php">
<head>
<?php include_once  $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_head.html'; ?>
	
 
<?php include_once('settings.php'); ?>
  <meta name="description" content="">
  <meta name="keywords" content="">
 
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width">
  <meta name="description" content="">
  <link rel="canonical" href="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/download.php">
  <link rel="alternate" media="handheld" href="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/download.php">
 
 <meta name="robots" content="all">
 <meta name="copyright" content="Copyright 2020 労働保険事務組合RJC All Rights Reserved.">
 <meta property="og:title" content="<?php echo $title;?>　：　マイページ">
 <meta property="og:type" content="article">
 <meta property="og:url" content="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/download.php">
 <meta property="og:image" content="/assets/img/m_zenekon.png">
 <meta property="og:site_name" content="中小事業主の特別加入RJC">
 <meta property="og:description" content=""> 
 <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
 <link rel="icon" href="/favicon.ico">
 
<script src='pdfmake/pdfmake.min.js'></script>
<script src='pdfmake/vfs_fonts.js'></script>
 
<title><?php echo $title;?></title>
</head>

<body>
<?php include_once  $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_body.html'; ?>
	
 
<?php include_once('header.php'); ?>

<div class="inner">

<figure class="show_pc hide_sp">
 <figcaption>各種ダウンロード・印刷</figcaption>
 <table>
  <tr>
   <th>No</th><th style="width: 23em;">名称</th><th style="width: 7em;">更新日</th><th style="width: 7em;">印刷</th><th>詳細</th>
  </tr>
  <tr>
   <td>01</td><td>特別加入会員カード</td><td>2023/03/23</td><td><a href="kanyusya.php">閲覧・印刷</a></td><td>特別加入の会員カードを閲覧・印刷できます。</td>
  </tr>
  <tr>
   <td>02</td><td>特別加入証明書</td><td>2023/03/23</td><td><a href="kanyusya.php">閲覧・印刷</a></td><td>特別加入の証明書を閲覧・印刷できます。</td>
  </tr>
  <tr>
   <td>03</td><td>団体則</td><td>2023/10/17</td><td><a href="dantaisoku.pdf">閲覧・印刷</a></td><td>労働保険事務組合RJCの団体則を閲覧・印刷できます。</td>
  </tr>
  <tr>
   <td>04</td><td>労災請求に関する確認事項</td><td>2023/08/03</td><td><a href="#" onclick="outputPDF_kakuninjikou();">閲覧・印刷</a></td><td>労働保険事務組合RJCの労災請求に関する確認事項を閲覧・印刷できます。</td>
  </tr>
  <tr>
   <td>05</td><td>営業、事務作業等の労災請求に関するお知らせ</td><td>2023/08/30</td><td><a href="sagyo_rosai.pdf">閲覧・印刷</a></td><td>営業、事務作業等の労災請求に関するお知らせを閲覧・印刷できます。</td>
  </tr>
  <?php if($_SESSION['row']['kyotei36_URL__c'] != ''){ ?>
  <tr>
   <td>06</td><td>休日・時間外労働に関する協定届</td><td>2023/06/09</td><td><a href="<?php echo $_SESSION['row']['kyotei36_URL__c'];?>">閲覧・印刷</a></td><td>休日・時間外労働に関する協定届を閲覧・印刷できます。</td>
  </tr>
  <?php } ?>
  <!--
  <tr>
   <td>04</td><td>労働保険保険関係成立証明書</td><td></td><td><a href="#" onclick="outputPDF_hokenseiritu();" >閲覧・印刷</a></td><td>労働保険保険関係成立証明書を閲覧・印刷できます。</td>
  </tr>
-->
 </table>
</figure>

<figure class="show_sp hide_pc">
 <figcaption>各種ダウンロード・印刷</figcaption>
 <table>
  <tr>
   <th>No</th><td>01</td><th>更新日</th><td>2021/07/10</td>
  </tr>
  <tr>
   <th>名称</th><td colspan="3">特別加入会員カード</td>
  </tr>
  <tr>
   <th>詳細</th><td colspan="3">特別加入の会員カードを閲覧・印刷できます。</td>
  </tr>
 </table>
 <p><a href="kanyusya.php">表示・印刷</a></p>

 <table>
  <tr>
   <th>No</th><td>02</td><th>更新日</th><td>2021/07/10</td>
  </tr>
  <tr>
   <th>名称</th><td colspan="3">特別加入証明書</td>
  </tr>
  <tr>
   <th>詳細</th><td colspan="3">特別加入の証明書を閲覧・印刷できます。</td>
  </tr>
 </table>
 <p><a href="kanyusya.php">表示・印刷</a></p>

 <table>
  <tr>
   <th>No</th><td>03</td><th>更新日</th><td>2023/05/30</td>
  </tr>
  <tr>
   <th>名称</th><td colspan="3">団体則</td>
  </tr>
  <tr>
   <th>詳細</th><td colspan="3">労働保険事務組合RJCの団体則を閲覧・印刷できます。</td>
  </tr>
 </table>
 <p><a href="dantaisoku.pdf">表示・印刷</a></p>
 
 <table>
  <tr>
   <th>No</th><td>04</td><th>更新日</th><td>2023/08/03</td>
  </tr>
  <tr>
   <th>名称</th><td colspan="3">労災請求に関する確認事項</td>
  </tr>
  <tr>
   <th>詳細</th><td colspan="3">労働保険事務組合RJCの労災請求に関する確認事項を閲覧・印刷できます。</td>
  </tr>
 </table>
 <p><a href="#" onclick="outputPDF_kakuninjikou();">表示・印刷</a></p>
 
 <table>
  <tr>
   <th>No</th><td>05</td><th>更新日</th><td>2023/08/30</td>
  </tr>
  <tr>
   <th>名称</th><td colspan="3">営業、事務作業等の労災請求に関するお知らせ</td>
  </tr>
  <tr>
   <th>詳細</th><td colspan="3">営業、事務作業等の労災請求に関するお知らせを閲覧・印刷できます。</td>
  </tr>
 </table>
 <p><a href="sagyo_rosai.pdf">表示・印刷</a></p>
 
 <?php if($_SESSION['row']['kyotei36_URL__c'] != ''){ ?>
 <table>
  <tr>
   <th>No</th><td>06</td><th>更新日</th><td></td>
  </tr>
  <tr>
   <th>名称</th><td colspan="3">休日・時間外労働に関する協定届</td>
  </tr>
  <tr>
   <th>詳細</th><td colspan="3">休日・時間外労働に関する協定届を閲覧・印刷できます。</td>
  </tr>
 </table>
 <p><a href="<?php echo $_SESSION['row']['kyotei36_URL__c'];?>">表示・印刷</a></p>
 <?php } ?>
 <!--
 <table>
  <tr>
   <th>No</th><td>04</td><th>更新日</th><td></td>
  </tr>
  <tr>
   <th>名称</th><td colspan="3">労働保険保険関係成立証明書</td>
  </tr>
  <tr>
   <th>詳細</th><td colspan="3">労働保険保険関係成立証明書を閲覧・印刷できます。</td>
  </tr>
 </table>
 <p><a href="#" onclick="outputPDF_hokenseiritu();" >表示・印刷</a></p>
 -->
</figure>

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

function outputPDF_hokenseiritu(){
 
  // ここでフォントを指定
  pdfMake.fonts = {
      GenShin: {
        normal: 'GenShinGothic-Normal-Sub.ttf',
        bold: 'GenShinGothic-Normal-Sub.ttf',
        italics: 'GenShinGothic-Normal-Sub.ttf',
        bolditalics: 'GenShinGothic-Normal-Sub.ttf'
      }
    }

 var Address = "<?php echo $_SESSION['row']['BillingState'].$_SESSION['row']['BillingCity'].$_SESSION['row']['BillingStreet'];?>";
 var KaisyaName = "<?php echo $_SESSION['row']['Name'];?>";
 var roudouno0 = "<?php echo str_replace('-', '', $_SESSION['row']['jimuRoudouhokenBangou0__c']);?>";
 var roudouno2 = "<?php echo str_replace('-', '', $_SESSION['row']['jimuRoudouhokenBangou2__c']);?>";
 var roudouno5 = "<?php echo str_replace('-', '', $_SESSION['row']['jimuRoudouhokenBangou5__c']);?>";
 var roudouno6 = "<?php echo str_replace('-', '', $_SESSION['row']['jimuRoudouhokenBangou6__c']);?>";
 
 var roudouno_line = [["※","※","※","※","※","※","※","※","※","※","※","※","※","※"],["※","※","※","※","※","※","※","※","※","※","※","※","※","※"],["※","※","※","※","※","※","※","※","※","※","※","※","※","※"],["※","※","※","※","※","※","※","※","※","※","※","※","※","※"],];
 var offset = [-5, -5, -5, -5];
 var line = 0;
 var j=0;
 if(roudouno0 != ""){
  for(j=0;j<14;j++){
   roudouno_line[line][j] = roudouno0.charAt(j);
   offset[line] = 0;
  }
  line++;
 }
 if(roudouno2 != ""){
  for(j=0;j<14;j++){
   roudouno_line[line][j] = roudouno2.charAt(j);
   offset[line] = 0;
  }
  line++;
 }
 if(roudouno5 != ""){
  for(j=0;j<14;j++){
   roudouno_line[line][j] = roudouno5.charAt(j);
   offset[line] = 0;
  }
  line++;
 }
 if(roudouno6 != ""){
  for(j=0;j<14;j++){
   roudouno_line[line][j] = roudouno6.charAt(j);
   offset[line] = 0;
  }
  line++;
 }
 
 var now = new Date();
 var fy = Number(now.getFullYear());
 var fny = Number(now.getFullYear());
 var y = Number(now.getFullYear())-2018;
 var m = now.getMonth()+1;
 var d = now.getDate();
 if(Number(m)>3) fny += 1;
 /* 注：全角数字、記号等は文字化けする？フォントの問題？ */

 var Today = '令和 '+y+' 年 '+m+' 月 '+d+' 日'; 

 var docDefinition = {
    pageSize: 'A4',
    pageMargins: [0, 0, 0, 0],
    content: [
     /*
     {
      text: '100', absolutePosition:{x:0,y:100}, fontSize: 10
     },
     {
      text: '200', absolutePosition:{x:0,y:200}, fontSize: 10
     },
     {
      text: '300', absolutePosition:{x:0,y:300}, fontSize: 10
     },
     {
      text: '400', absolutePosition:{x:0,y:400}, fontSize: 10
     },
     {
      text: '500', absolutePosition:{x:0,y:500}, fontSize: 10
     },
     {
      text: '600', absolutePosition:{x:0,y:600}, fontSize: 10
     },
     {
      text: '700', absolutePosition:{x:0,y:700}, fontSize: 10
     },
     {
      text: '800', absolutePosition:{x:0,y:800}, fontSize: 10
     },
     {
      text: '100', absolutePosition:{x:100,y:0}, fontSize: 10
     },
     {
      text: '200', absolutePosition:{x:200,y:0}, fontSize: 10
     },
     {
      text: '300', absolutePosition:{x:300,y:0}, fontSize: 10
     },
     {
      text: '400', absolutePosition:{x:400,y:0}, fontSize: 10
     },
     {
      text: '500', absolutePosition:{x:500,y:0}, fontSize: 10
     },
     */
     {
      text: zth(KaisyaName), absolutePosition:{x:200,y:237}, fontSize: 12
     },
     {
      text: zth(Address), absolutePosition:{x:200,y:274}, fontSize: 12
     },
     {
      text: zth(y), absolutePosition:{x:99,y:313}, fontSize: 10
     },
     {
      text: zth(m), absolutePosition:{x:120,y:313}, fontSize: 10
     },
     {
      text: zth(d), absolutePosition:{x:141,y:313}, fontSize: 10
     },
     {
      text: zth(y), absolutePosition:{x:99,y:548}, fontSize: 10
     },
     {
      text: zth(m), absolutePosition:{x:120,y:548}, fontSize: 10
     },
     {
      text: zth(d), absolutePosition:{x:141,y:548}, fontSize: 10
     },
     {
      text: zth(roudouno_line[0][0]), absolutePosition:{x:130+offset[0],y:403}, fontSize: 18
     },
     {
      text: zth(roudouno_line[0][1]), absolutePosition:{x:155+offset[0],y:403}, fontSize: 18
     },
     {
      text: zth(roudouno_line[0][2]), absolutePosition:{x:180+offset[0],y:403}, fontSize: 18
     },
     {
      text: zth(roudouno_line[0][3]), absolutePosition:{x:205+offset[0],y:403}, fontSize: 18
     },
     {
      text: zth(roudouno_line[0][4]), absolutePosition:{x:230+offset[0],y:403}, fontSize: 18
     },
     {
      text: zth(roudouno_line[0][5]), absolutePosition:{x:257+offset[0],y:403}, fontSize: 18
     },
     {
      text: zth(roudouno_line[0][6]), absolutePosition:{x:283+offset[0],y:403}, fontSize: 18
     },
     {
      text: zth(roudouno_line[0][7]), absolutePosition:{x:309+offset[0],y:403}, fontSize: 18
     },
     {
      text: zth(roudouno_line[0][8]), absolutePosition:{x:335+offset[0],y:403}, fontSize: 18
     },
     {
      text: zth(roudouno_line[0][9]), absolutePosition:{x:361+offset[0],y:403}, fontSize: 18
     },
     {
      text: zth(roudouno_line[0][10]), absolutePosition:{x:387+offset[0],y:403}, fontSize: 18
     },
     {
      text: zth(roudouno_line[0][11]), absolutePosition:{x:413+offset[0],y:403}, fontSize: 18
     },
     {
      text: zth(roudouno_line[0][12]), absolutePosition:{x:439+offset[0],y:403}, fontSize: 18
     },
     {
      text: zth(roudouno_line[0][13]), absolutePosition:{x:465+offset[0],y:403}, fontSize: 18
     },
     {
      text: zth(roudouno_line[1][0]), absolutePosition:{x:130+offset[1],y:431}, fontSize: 18
     },
     {
      text: zth(roudouno_line[1][1]), absolutePosition:{x:155+offset[1],y:431}, fontSize: 18
     },
     {
      text: zth(roudouno_line[1][2]), absolutePosition:{x:180+offset[1],y:431}, fontSize: 18
     },
     {
      text: zth(roudouno_line[1][3]), absolutePosition:{x:205+offset[1],y:431}, fontSize: 18
     },
     {
      text: zth(roudouno_line[1][4]), absolutePosition:{x:230+offset[1],y:431}, fontSize: 18
     },
     {
      text: zth(roudouno_line[1][5]), absolutePosition:{x:257+offset[1],y:431}, fontSize: 18
     },
     {
      text: zth(roudouno_line[1][6]), absolutePosition:{x:283+offset[1],y:431}, fontSize: 18
     },
     {
      text: zth(roudouno_line[1][7]), absolutePosition:{x:309+offset[1],y:431}, fontSize: 18
     },
     {
      text: zth(roudouno_line[1][8]), absolutePosition:{x:335+offset[1],y:431}, fontSize: 18
     },
     {
      text: zth(roudouno_line[1][9]), absolutePosition:{x:361+offset[1],y:431}, fontSize: 18
     },
     {
      text: zth(roudouno_line[1][10]), absolutePosition:{x:387+offset[1],y:431}, fontSize: 18
     },
     {
      text: zth(roudouno_line[1][11]), absolutePosition:{x:413+offset[1],y:431}, fontSize: 18
     },
     {
      text: zth(roudouno_line[1][12]), absolutePosition:{x:439+offset[1],y:431}, fontSize: 18
     },
     {
      text: zth(roudouno_line[1][13]), absolutePosition:{x:465+offset[1],y:431}, fontSize: 18
     },
     {
      text: zth(roudouno_line[2][0]), absolutePosition:{x:130+offset[2],y:458}, fontSize: 18
     },
     {
      text: zth(roudouno_line[2][1]), absolutePosition:{x:155+offset[2],y:458}, fontSize: 18
     },
     {
      text: zth(roudouno_line[2][2]), absolutePosition:{x:180+offset[2],y:458}, fontSize: 18
     },
     {
      text: zth(roudouno_line[2][3]), absolutePosition:{x:205+offset[2],y:458}, fontSize: 18
     },
     {
      text: zth(roudouno_line[2][4]), absolutePosition:{x:230+offset[2],y:458}, fontSize: 18
     },
     {
      text: zth(roudouno_line[2][5]), absolutePosition:{x:257+offset[2],y:458}, fontSize: 18
     },
     {
      text: zth(roudouno_line[2][6]), absolutePosition:{x:283+offset[2],y:458}, fontSize: 18
     },
     {
      text: zth(roudouno_line[2][7]), absolutePosition:{x:309+offset[2],y:458}, fontSize: 18
     },
     {
      text: zth(roudouno_line[2][8]), absolutePosition:{x:335+offset[2],y:458}, fontSize: 18
     },
     {
      text: zth(roudouno_line[2][9]), absolutePosition:{x:361+offset[2],y:458}, fontSize: 18
     },
     {
      text: zth(roudouno_line[2][10]), absolutePosition:{x:387+offset[2],y:458}, fontSize: 18
     },
     {
      text: zth(roudouno_line[2][11]), absolutePosition:{x:413+offset[2],y:458}, fontSize: 18
     },
     {
      text: zth(roudouno_line[2][12]), absolutePosition:{x:439+offset[2],y:458}, fontSize: 18
     },
     {
      text: zth(roudouno_line[2][13]), absolutePosition:{x:465+offset[2],y:458}, fontSize: 18
     },
     {
      text: zth(roudouno_line[3][0]), absolutePosition:{x:130+offset[3],y:486}, fontSize: 18
     },
     {
      text: zth(roudouno_line[3][1]), absolutePosition:{x:155+offset[3],y:486}, fontSize: 18
     },
     {
      text: zth(roudouno_line[3][2]), absolutePosition:{x:180+offset[3],y:486}, fontSize: 18
     },
     {
      text: zth(roudouno_line[3][3]), absolutePosition:{x:205+offset[3],y:486}, fontSize: 18
     },
     {
      text: zth(roudouno_line[3][4]), absolutePosition:{x:230+offset[3],y:486}, fontSize: 18
     },
     {
      text: zth(roudouno_line[3][5]), absolutePosition:{x:257+offset[3],y:486}, fontSize: 18
     },
     {
      text: zth(roudouno_line[3][6]), absolutePosition:{x:283+offset[3],y:486}, fontSize: 18
     },
     {
      text: zth(roudouno_line[3][7]), absolutePosition:{x:309+offset[3],y:486}, fontSize: 18
     },
     {
      text: zth(roudouno_line[3][8]), absolutePosition:{x:335+offset[3],y:486}, fontSize: 18
     },
     {
      text: zth(roudouno_line[3][9]), absolutePosition:{x:361+offset[3],y:486}, fontSize: 18
     },
     {
      text: zth(roudouno_line[3][10]), absolutePosition:{x:387+offset[3],y:486}, fontSize: 18
     },
     {
      text: zth(roudouno_line[3][11]), absolutePosition:{x:413+offset[3],y:486}, fontSize: 18
     },
     {
      text: zth(roudouno_line[3][12]), absolutePosition:{x:439+offset[3],y:486}, fontSize: 18
     },
     {
      text: zth(roudouno_line[3][13]), absolutePosition:{x:465+offset[3],y:486}, fontSize: 18
     },

             ],
    defaultStyle:{
      font: 'GenShin'//ここでデフォルトのスタイル名を指定しています。
    },
    background: [ // https://hamayapp.appspot.com/static/data_uri_conv.html
        {
            image: '<?php include "hoken_seiritu_bkimg.php"; ?>', width: 595
        }
    ]
};
 
//  pdfMake.createPdf(docDefinition).download('加入証明書.pdf');
  pdfMake.createPdf(docDefinition).open();
}
 
function outputPDF_kakuninjikou(){
 
  // ここでフォントを指定
  pdfMake.fonts = {
      GenShin: {
        normal: 'GenShinGothic-Normal-Sub.ttf',
        bold: 'GenShinGothic-Normal-Sub.ttf',
        italics: 'GenShinGothic-Normal-Sub.ttf',
        bolditalics: 'GenShinGothic-Normal-Sub.ttf'
      }
    }
 
 var now = new Date();
 var y = Number(now.getFullYear());
 var m = now.getMonth()+1;
 var d = now.getDate();
 /* 注：全角数字、記号等は文字化けする？フォントの問題？ */
 var KaisyaName = "<?php echo $_SESSION['row']['Name'];?>";
 var Daihyosyaname = "<?php echo $_SESSION['row']['Daihyosya__c'];?>";

 var doc_content = new Array();
 
 doc_content.push({image: '<?php include 'bk_kakuninjikou1.php'; ?>', absolutePosition:{x:0,y:0}, width: 595});
 
 doc_content.push({text: '', pageBreak: 'before'});
 doc_content.push(     
     {
      text: zth(y), absolutePosition:{x:65,y:379}, fontSize: 10
     },
     {
      text: zth(m), absolutePosition:{x:105,y:379}, fontSize: 10
     },
     {
      text: zth(d), absolutePosition:{x:130,y:379}, fontSize: 10
     },
     {
      text: zth(KaisyaName), absolutePosition:{x:340,y:393}, fontSize: 10
     },
     {
      text: zth(Daihyosyaname), absolutePosition:{x:340,y:408}, fontSize: 10
     },
  );
 
 var docDefinition = {
    pageSize: 'A4',
    pageMargins: [0, 0, 0, 0],
    content: doc_content,
    defaultStyle:{
      font: 'GenShin'//ここでデフォルトのスタイル名を指定しています。
    },
    background: [ // https://hamayapp.appspot.com/static/data_uri_conv.html
        {
            image: '<?php include 'bk_kakuninjikou2.php' ;?>', width: 595
        }
    ]
};
 
//  pdfMake.createPdf(docDefinition).download('加入証明書.pdf');
  pdfMake.createPdf(docDefinition).open();
} 
</script> 
 
</body>
</html>