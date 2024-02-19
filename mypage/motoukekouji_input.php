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
if(isset($_GET['kikan']) && $_GET['kikan'] != ''){
 $kikan_end_y = substr($_GET['kikan'],0,4);
 $kikan_end_m = substr($_GET['kikan'],4,2);
 $kikan_end_nextm = intval($kikan_end_m)+1;
 $kikan_end_nexty = $kikan_end_y;
 if($kikan_end_nextm > 12) {
  $kikan_end_nextm = 1;
  $kikan_end_nexty = intval($kikan_end_y)+1;
 }
 $kikan_end_time = mktime(0, 0, 0, $kikan_end_nextm, 0, $kikan_end_nexty);
 $kikan_end_d = date('d', $kikan_end_time); 
 $kikan_end = $kikan_end_y.'-'.$kikan_end_m.'-'.$kikan_end_d;
 $kikan_end_e = $kikan_end;
 $kikan_end_s = $kikan_end_y.'-'.$kikan_end_m.'-01';
 $_SESSION['kikan'] = $_GET['kikan'];
}
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
 $meisyo = $motoukekouji_data->KoujiMeisyo();
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
	
 <div class="title_box">
  <span class="list_title">【<?php echo $kikan_end_y;?>年<?php echo $kikan_end_m;?>月分】完了工事　入力画面</span>
 </div>
 
 <form name="form" method="post" action="motoukekouji_regist.php">
  <input type="hidden" name="Id" value="<?php echo $id;?>">
  <input type="hidden" name="AccountId" value="<?php echo $accountid;?>">
  
  <div class="motoukekouji_input_outer">

  <div class="motoukekouji_inputitems">
   
   <div class="motoukekouji_inputitem">
    <span class="motoukekouji_inputitem_title">工事の種類　大分類</span>
    <span class="motoukekouji_inputitem_box">
     <select name="kouji_type" id="kouji_type" class="fixsize_inputitem" required>
      <option value="">-</option>
      <?php for($i=0;$i<count($gyosyu_list);$i++){ ?>
      <option value="<?php echo $gyosyu_list[$i];?>" <?php if($gyosyu_list[$i] == $type) echo 'selected'; ?>><?php echo $gyosyu_list[$i];?></option>
      <?php } ?>
     </select>
    </span>
    <span class="motoukekouji_inputitem_title">工事の種類　小分類</span>
    <span class="motoukekouji_inputitem_box">
     <select name="kouji_subtype" id="kouji_subtype" class="fixsize_inputitem">
     </select>
    </span>
   </div>

   <div class="motoukekouji_inputitem">
    <span class="motoukekouji_inputitem_title">工事名称</span>
    <span class="motoukekouji_inputitem_box">
     <input type="text" name="kouji_meisyo" placeholder="例：〇〇邸　〇〇工事" value="<?php echo $meisyo;?>" class="fixsize_inputitem" required>
    </span>
   </div>

   <div class="motoukekouji_inputitem">
    <span class="motoukekouji_inputitem_title">現場の住所</span>
    <span class="motoukekouji_inputitem_box">
     <input type="text" name="kouji_address" placeholder="例：〇〇県〇〇市〇〇町9-9　マンション名" value="<?php echo $address;?>" class="fixsize_inputitem" required>
    </span>
   </div>

   <div class="motoukekouji_inputitem">
    <span class="motoukekouji_inputitem_title">工事の期間</span>
    <span class="motoukekouji_inputitem_box inputitem_kikan">
     <input type="date" name="kouji_kikan_start" value="<?php echo $kikan_start;?>" max="<?php echo $kikan_end;?>" required>　～　<input type="date" name="kouji_kikan_end" value="<?php echo $kikan_end;?>" min="<?php echo $kikan_end_s;?>" max="<?php echo $kikan_end_e;?>" required>
    </span>
   </div>

   <div class="motoukekouji_inputitem">
    <span class="motoukekouji_inputitem_title">工事の請負金額</span>
    <span class="motoukekouji_inputitem_box">
     <input type="tel" name="kouji_kingaku" value="<?php echo $kingaku;?>" class="fixsize_inputitem kingakuitem" required> 円（税別）
    </span>
   </div>
   
  </div>

   <input type="submit" name="submit" class="mk_submit_button mk_button" value="仮登録する">
  </div>
  
 </form>
 
</div>
	
<?php include_once('footer.php'); ?>

<script>
 const majorSelect = document.getElementById('kouji_type');
 const minorSelect = document.getElementById('kouji_subtype');
 const categories = {
     "大工": [],
     "塗装": ["新築工事","改修工事"],
     "防水": [],
     "板金": ["新築工事","改修工事"],
     "タイル・れんが・ブロック": [],
     "左官": ["新築工事","改修工事"],
     "鉄筋": [],
     "屋根": [],
     "足場": [],
     "電気": ["新築工事","改修工事"],
     "内装": ["新築工事","改修工事"],
     "管": ["新築工事","改修工事","地面下の埋設工事"],
     "機械器具設置": ["小型機械（家庭用エアコン、パイプ取付けなど）","太陽光発電装置","大型機械（エレベーターやボイラー、ベルトコンベアーなど）","保守点検のみ"],
     "電気通信": [],
     "建具": [],
     "熱絶縁": [],
     "ガラス": [],
     "消防施設": ["新築工事","改修工事","保守点検のみ"],
     "美装": ["新築工事","改修工事"],
     "とび・土工・道路": ["造成工事や河川工事などの地面を掘って行う工事","道路改修工事","ガードレルや標識設置などの工事","草刈り"],
     "解体": [],
     "造園": ["庭園の造園工事","公園、ゴルフ場など広場の造園工事","草刈りや剪定のみ"],
     "外構": [],
     "型枠": [],
     "鉄骨": []
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

 minorSelect.classList.remove("sel_disabled");
 minorSelect.removeAttribute("disabled");
 minorSelect.required = true;
 if (categories[selectedCategory]) {
   if (categories[selectedCategory].length <= 0){
     const option = document.createElement('option');
     option.value = "";
     option.textContent = "選択不要";
     minorSelect.appendChild(option);
    
     minorSelect.classList.add("sel_disabled");
     minorSelect.disabled = true;
     minorSelect.removeAttribute("required");
   } else {
      // 選択された大分類に応じて小分類の選択肢を追加
      const option1 = document.createElement('option');
      option1.value = "";
      option1.textContent = "選択してください";
      minorSelect.appendChild(option1);
      categories[selectedCategory].forEach(function(item) {
          const option = document.createElement('option');
          if(item == ""){
          } else {
           option.value = item;
           option.textContent = item;
          }
          minorSelect.appendChild(option);
      });
   }
  } else {
      // 大分類が選択されていない場合の処理
      const defaultOption = document.createElement('option');
      defaultOption.textContent = '先に大分類を選択してください';
      minorSelect.appendChild(defaultOption);
  }   
}

/* 終了日を変更したら、開始日のmaxに指定して制限する */
document.addEventListener('DOMContentLoaded', function () {
    const startDateInput = document.querySelector('input[name="kouji_kikan_start"]');
    const endDateInput = document.querySelector('input[name="kouji_kikan_end"]');

    // 終了日の入力が変更されたときにイベントリスナーを設定
    endDateInput.addEventListener('change', function() {
        // 開始日のmax属性を終了日の値に設定
        startDateInput.max = endDateInput.value;
    });
});
</script>
 
</body>
</html>