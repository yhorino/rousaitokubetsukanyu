<?php
session_start();
include_once('auth.php');
require_once('common_function.php');
header("Content-type: text/html;charset=utf-8");

$title="元請工事入力";

include_once('./motoukekouji_class.php');
$id = '';
$accountid = '';
$type = '';
$address = '';
$kikan_start = '';
$kikan_end = '';
$kingaku = '';

$motoukekouji_data = new MotoukekoujiData();
if(isset($_GET['id']) && $_GET['id'] != ''){
 $id = $_GET['id'];
 $motoukekouji_data->setId($id);
 $ret = $motoukekouji_data->getMotoukekoujiRecordData();
 $accountid = $motoukekouji_data->AccountId();
 $type = $motoukekouji_data->KoujiType();
 $subtype = $motoukekouji_data->KoujiSubType();
 $address = $motoukekouji_data->KoujiAddress();
 $kikan_start = $motoukekouji_data->KoujiKikanStart();
 $kikan_end = $motoukekouji_data->KoujiKikanEnd();
 $kingaku = $motoukekouji_data->KoujiKingaku();
} else {
 $motoukekouji_data->setAccountId($_SESSION['row']['Id']);
 $accountid = $motoukekouji_data->AccountId();
}

$gyosyu_list = array('大工','塗装','防水','板金','タイル・れんが・ブロック','左官','鉄筋','屋根','足場','電気','内装','管','機械器具設置','電気通信','建具','熱絶縁','ガラス','消防施設','美装','とび・土工・道路','解体','造園','外構','型枠','鉄骨');

?>

<!doctype html>
<html>
<head>
<?php include_once  $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_head.html'; ?>
	
 
<?php include_once('settings.php'); ?>
  <meta name="description" content="">
  <meta name="keywords" content="">
<title><?php echo $title;?></title>
 
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width">
  <meta name="description" content="">
  <link rel="canonical" href="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/motoukekouji_input.php">
  <link rel="alternate" media="handheld" href="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/motoukekouji_input.php">
 
 <meta name="robots" content="all">
 <meta name="copyright" content="Copyright 2020 労働保険事務組合RJC All Rights Reserved.">
 <meta property="og:title" content="<?php echo $title;?>　：　マイページ">
 <meta property="og:type" content="article">
 <meta property="og:url" content="https://www.xn--y5q0r2lqcz91qdrc.com/mypage/motoukekouji_input.php">
 <meta property="og:image" content="/assets/img/m_zenekon.png">
 <meta property="og:site_name" content="中小事業主の特別加入RJC">
 <meta property="og:description" content=""> 
 <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
 <link rel="icon" href="/favicon.ico">
 
 <link rel="stylesheet" href="motoukekouji.css">
 
</head>

<body>
<?php include_once  $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_body.html'; ?>
	
 
<?php include_once('header.php'); ?>
 
<div class="inner">
	
 <form name="form" method="post" action="motoukekouji_regist.php">
  <input type="hidden" name="Id" value="<?php echo $id;?>">
  <input type="hidden" name="AccountId" value="<?php echo $accountid;?>">
  
  <div class="motoukekouji_input_outer">

  <div class="motoukekouji_inputitems">
   
   <div class="motoukekouji_inputitem">
    <span class="motoukekouji_inputitem_title">工事の種類</span>
    <span class="motoukekouji_inputitem_box">
     <select name="kouji_type" id="kouji_type" class="fixsize_inputitem">
      <option value="">-</option>
      <?php for($i=0;$i<count($gyosyu_list);$i++){ ?>
      <option value="<?php echo $gyosyu_list[$i];?>" <?php if($gyosyu_list[$i] == $type) echo 'selected'; ?>><?php echo $gyosyu_list[$i];?></option>
      <?php } ?>
     </select>
     <select name="kouji_subtype" id="kouji_subtype" class="fixsize_inputitem">
     </select>
    </span>
   </div>

   <div class="motoukekouji_inputitem">
    <span class="motoukekouji_inputitem_title">現場の住所</span>
    <span class="motoukekouji_inputitem_box">
     <input type="text" name="kouji_address" placeholder="都道府県と市をご記入ください" value="<?php echo $address;?>" class="fixsize_inputitem">
    </span>
   </div>

   <div class="motoukekouji_inputitem">
    <span class="motoukekouji_inputitem_title">工事の期間</span>
    <span class="motoukekouji_inputitem_box inputitem_kikan">
     <input type="date" name="kouji_kikan_start" value="<?php echo $kikan_start;?>">　～　<input type="date" name="kouji_kikan_end" value="<?php echo $kikan_end;?>">
    </span>
   </div>

   <div class="motoukekouji_inputitem">
    <span class="motoukekouji_inputitem_title">工事の請負金額</span>
    <span class="motoukekouji_inputitem_box">
     <input type="tel" name="kouji_kingaku" value="<?php echo $kingaku;?>" class="fixsize_inputitem kingakuitem"> 円（税別）
    </span>
   </div>
   
  </div>

   <input type="submit" name="submit" class="mk_submit_button mk_button" value="登録する">
  </div>
  
 </form>
 
</div>
	
<?php include_once('footer.php'); ?>

<script>
 const majorSelect = document.getElementById('kouji_type');
 const minorSelect = document.getElementById('kouji_subtype');
 const categories = {
     "大工": [""],
     "塗装": ["新築工事","改修工事"],
     "防水": [""],
     "板金": ["新築工事","改修工事"],
     "タイル・れんが・ブロック": [""],
     "左官": ["新築工事","改修工事"],
     "鉄筋": [""],
     "屋根": [""],
     "足場": [""],
     "電気": ["新築工事","改修工事"],
     "内装": ["新築工事","改修工事"],
     "管": ["新築工事","改修工事","地面下の埋設工事"],
     "機械器具設置": ["小型機械（家庭用エアコン、パイプ取付けなど）","太陽光発電装置","大型機械（エレベーターやボイラー、ベルトコンベアー）","保守点検のみ"],
     "電気通信": [""],
     "建具": [""],
     "熱絶縁": [""],
     "ガラス": [""],
     "消防施設": ["新築工事","改修工事","保守点検のみ"],
     "美装": ["新築工事","改修工事"],
     "とび・土工・道路": ["造成工事や河川工事などの地面を掘って行う工事","道路改修工事","ガードレルや標識設置などの工事","草刈り"],
     "解体": [""],
     "造園": ["庭園の造園工事","公園、ゴルフ場など広場の造園工事","草刈りや剪定のみ"],
     "型枠": [""],
     "鉄骨": [""]
 };

 document.addEventListener('DOMContentLoaded', function() {

    majorSelect.addEventListener('change', setSubtypeItems);
  
  initSubtypeItem();

});
function initSubtypeItem(){
 setSubtypeItems();
 $('#kouji_subtype').val('<?php echo $subtype;?>');
}
function setSubtypeItems(){
  // 小分類をクリア
  minorSelect.innerHTML = '';

  const selectedCategory = majorSelect.value;

  if (categories[selectedCategory]) {
      // 選択された大分類に応じて小分類の選択肢を追加
      categories[selectedCategory].forEach(function(item) {
          const option = document.createElement('option');
          option.value = item;
          option.textContent = item;
          minorSelect.appendChild(option);
      });
  } else {
      // 大分類が選択されていない場合の処理
      const defaultOption = document.createElement('option');
      defaultOption.textContent = '先に大分類を選択してください';
      minorSelect.appendChild(defaultOption);
  }   
}

</script>
 
</body>
</html>