<?php
// セッションの開始
ob_start();
session_start();

header("Content-type: text/html;charset=utf-8");
require_once('function.php');

include('session_check.php');

/*
require_once('regist_sf_function.php');
$formdata = new FormData();
$formdata->setName(session_id());
$formdata->setEmail('');
$formdata->RegistSalesforceLead();
*/

?>
<!DOCTYPE html>
<html lang="ja">

<head>
<?php include_once  $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_head.html'; ?>
 
 
  <title>申込内容入力：労働保険事務組合RJC　無料見積りフォーム</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="format-detection" content="telephone=no">
 
  <link rel="canonical" href="https://www.xn--y5q0r2lqcz91qdrc.com/form/input.php">
  <meta name="robots" content="all">
  <meta name="copyright" content="Copyright 2020 労働保険事務組合RJC All Rights Reserved.">
  <meta property="og:title" content="申込内容入力：労働保険事務組合RJC　無料見積りフォーム">
  <meta property="og:type" content="article">
  <meta property="og:url" content="https://www.xn--y5q0r2lqcz91qdrc.com/form/input.php">
  <meta property="og:image" content="https://www.xn--y5q0r2lqcz91qdrc.com/assets/logo_img/logo_jimukumiai.png">
  <meta property="og:site_name" content="建設業専門　全国対応　中小事業主の特別加入RJC">
  <meta property="og:description" content="" />
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
  <link rel="icon" href="/favicon.ico">
 
  <!-- CSS-->
  <link rel="stylesheet" href="../assets/css/reset.css">
  <link rel="stylesheet" href="../assets/css/common.css">
  <link rel="stylesheet" href="../assets/css/style.css">
<!--  <link rel="stylesheet" href="../assets/css/style_form.css">-->
  <link rel="stylesheet" href="style_form_new.css">
  <!-- JS-->
  <script src="../assets/js/app.js"></script>

  <script type="text/javascript" src="../assets/js/jquery.autoKana.js"></script>
  <script src="https://kit.fontawesome.com/a366e23f99.js" crossorigin="anonymous"></script>
 
  <script type="text/javascript" src="../assets/js/jquery.jpostal.js-master/jquery.jpostal.js"></script>
  <script src="value.js"></script>
 
<script>
$(function() {
 $.fn.autoKana('#kaisyamei', '#kaisyamei_furi', {katakana:true});
 $.fn.autoKana('#daihyosyamei_sei', '#daihyosyamei_furi_sei', {katakana:true});
 $.fn.autoKana('#daihyosyamei_mei', '#daihyosyamei_furi_mei', {katakana:true});
 $.fn.autoKana('#tantousyamei_sei', '#tantousyamei_furi_sei', {katakana:true});
 $.fn.autoKana('#tantousyamei_mei', '#tantousyamei_furi_mei', {katakana:true});
 $.fn.autoKana('#kanyusyamei_sei1', '#kanyusyamei_furi_sei1', {katakana:true});
 $.fn.autoKana('#kanyusyamei_mei1', '#kanyusyamei_furi_mei1', {katakana:true});
 $.fn.autoKana('#kanyusyamei_sei2', '#kanyusyamei_furi_sei2', {katakana:true});
 $.fn.autoKana('#kanyusyamei_mei2', '#kanyusyamei_furi_mei2', {katakana:true});
 $.fn.autoKana('#kanyusyamei_sei3', '#kanyusyamei_furi_sei3', {katakana:true});
 $.fn.autoKana('#kanyusyamei_mei3', '#kanyusyamei_furi_mei3', {katakana:true});
 $.fn.autoKana('#kanyusyamei_sei4', '#kanyusyamei_furi_sei4', {katakana:true});
 $.fn.autoKana('#kanyusyamei_mei4', '#kanyusyamei_furi_mei4', {katakana:true});
 $.fn.autoKana('#kanyusyamei_sei5', '#kanyusyamei_furi_sei5', {katakana:true});
 $.fn.autoKana('#kanyusyamei_mei5', '#kanyusyamei_furi_mei5', {katakana:true});
});
</script>
 
 
<script>
$(function () {
	$('#zip').jpostal({
		postcode : [
			'#zip'
		],
		address : {
			'#pref' : '%3',
			'#city' : '%4',
			'#address' : '%5',
			'#address2' : '%6%7',
		}
	});
});
</script>
 
</head>

<body id="input_php">
<?php include_once  $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_body.html'; ?>
 
 <!--
    <header>
      <div class="header__flex">
        <a href="/"><img class="h_logo" src="../assets/logo_img/logo_jimukumiai.png" width="327" alt="" /></a>
      </div>
     
      <div id="flow_image">
      <img src="../assets/img/form_flow1.png" alt="STEP1 お客様情報の入力" class="show_pc hide_sp">
      <img src="../assets/img/form_flow1_sp.png" alt="STEP1 お客様情報の入力" class="show_sp hide_pc">
      </div>
    </header>
	-->
   <?php 
 $option_class = 'no_menu';
 include_once $_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/cocoon-child-master/tmp/header-container.php'; 
 ?>

  <!-- contents ///////////////////////////////////-->
 <div id="mainbody">
  <main id="main">
   
    <form name="form" method="post" action="trans.php" enctype="multipart/form-data">
      <input type="hidden" id="pagename" name="pagename" value = "input.php">
      <input type="hidden" id="Previd__c" name="Previd__c" value = "<?php echo $_SESSION['Previd__c'];?>">

<?php /* 20220122 紹介クーポン */ ?>
        <input type="hidden" id="syoukai_kaisya_id" name="syoukai_kaisya_id" value = "<?php echo $_SESSION['syoukai_kaisya_id'];?>">
<?php /* 20220122 紹介クーポン */ ?>

      <h1 class="mitsumori-ttl">お客様情報の入力</h1>
      <section class="mitsumori">
        <div class="mitsumori-inner">
         
         <figure>
         <figcaption>会社情報</figcaption>
         <table class="input_table">
          
          <tr>
           <th>メールアドレス</th><th><span class="label req">必須</span></th>
           <td>
            
            <input id="email" type="email" name="mail" placeholder="name@domain.co.jp" value="<?php echo $_SESSION['mail']; ?>" required>
            
           </td>
           
          </tr>
          <!--<tr>
           <th>メールアドレス(再入力)</th><th><span class="label req">必須</span></th>
           <td>
            
            <input id="emailchk" type="email" name="emailchk" placeholder="name@domain.co.jp" value="" oncopy="return false" onpaste="return false" oncontextmenu="return false" required>
            <p class="emailerr" id="emailerr">e-mailの入力が一致しません</p>
           </td>
           
          </tr>-->
          
          <tr>
           <th>個人ですか？法人ですか？</th><th><span class="label req">必須</span></th>
           <td>
            <?php
            $sel1 = 'checked';
            $sel2 = '';
            if($_SESSION['type']=='個人') {
             $sel1 = 'checked';
             $sel2 = '';
            }
            if($_SESSION['type']=='法人') {
             $sel1 = '';
             $sel2 = 'checked';
            }
            ?>
            
            <input id="type1" type="radio" name="type" value="個人" required="" <?php echo $sel1;?>>
            <label for="type1"><span>個人</span></label>

            <input id="type2" type="radio" name="type" value="法人" required="" <?php echo $sel2;?>>
            <label for="type2"><span>法人</span></label>
            
           </td>
          </tr>
          
          <tr>
           <th>会社名・屋号</th><th><span class="label req">必須</span></th>
           <td>
            <input id="kaisyamei" type="text" name="kaisyamei" required="" placeholder="株式会社労災建設" value="<?php echo $_SESSION['kaisyamei']; ?>">
           </td>
           
          </tr>
          
          <tr>
           <th>会社名・屋号 フリガナ</th><th><span class="label req">必須</span></th>
           <td>
            
            <input id="kaisyamei_furi" type="text" name="kaisyamei_furi" required="" placeholder="カブシキガイシャロウサイケンセツ" value="<?php echo $_SESSION['kaisyamei_furi']; ?>" pattern="[\u30A1-\u30FC\u3041-\u309F\uFF10-\uFF19\uFF21-\uFF3A\uFF41-\uFF5A|　| ]*" title="ひらがな、カタカナ">
           </td>
           
          </tr>
          
          <?php /* 20230206 給与支払日項目追加 */ ?>
          <tr>
           <th>給与支払い</th><th><span class="label req">必須</span></th>
           <td>
            <div class="kyuyo_selbox">
             <span class="kyuyo_selitem">
              <span class="kyuyo_selitem_label">締め日</span>
              <span class="kyuyo_selitem_input full">
              <select id="shimebi" name="shimebi" required>
               <option value="">-</option>
               <?php for($i=1;$i<=28;$i++){ ?>
               <option value="<?php echo $i;?>日"><?php echo $i;?>日</option>
               <?php } ?>
               <option value="末日">末日</option>
              </select>
              </span>
             </span>
             <span class="kyuyo_selitem">
              <span class="kyuyo_selitem_label">支払日</span>
              <span class="kyuyo_selitem_input">
              <select id="shiharaibi_month" name="shiharaibi_month" required>
               <option value="">-</option>
               <option value="当月">当月</option>
               <option value="翌月">翌月</option>
              </select>
              <select id="shiharaibi" name="shiharaibi" required>
               <option value="">-</option>
               <?php for($i=1;$i<=28;$i++){ ?>
               <option value="<?php echo $i;?>日"><?php echo $i;?>日</option>
               <?php } ?>
               <option value="末日">末日</option>
              </select>
              </span>
             </span>
            </div>
           </td>
           
          </tr>
          <?php /* 20230206 給与支払日項目追加 */ ?>
          
          
          <?php $_SESSION['zip'] = str_replace('-', '', $_SESSION['zip']); ?>
          <tr>
          <th>郵便番号</th><th><span class="label req">必須</span></th>
          <td>
          <input type="tel" name="zip" id="zip" class="zip " placeholder="1234567(ハイフンなし)" maxlength="8" value="<?php echo $_SESSION['zip']; ?>" pattern="[0-9]+$" title="数字(ハイフンなし)" required>
          </td>
          </tr>

          <tr>
          <th>都道府県</th><th><span class="label req">必須</span></th>
          <td>
          <select id="pref" name="pref" class="" required>
          <option value="">選択してください</option>
          <?php
           for($i=1;$i<=47;$i++){ ?>
           <?php 
           $sel = '';
           if($_SESSION['pref']==$pref[$i]) $sel = 'selected'; ?>
            <option value="<?php echo $pref[$i];?>" <?php echo $sel;?>><?php echo $pref[$i];?></option>
           <?php } ?>
          </select>
          </td>
          </tr>

          <tr>
          <th>市区町村</th><th><span class="label req">必須</span></th>
          <td>
          <input id="city" type="text" name="city" required="" placeholder="千代田区" value="<?php echo $_SESSION['city']; ?>">
          </td>
          </tr>

          <tr>
          <th>町名</th><th><span class="label req">必須</span></th>
          <td>
          <input id="address" type="text" name="address" required="" placeholder="千代田" value="<?php echo $_SESSION['address']; ?>">
          </td>
          </tr>
          <tr>
          <th>番地号</th><th><span class="label req">必須</span></th>
          <td>
          <input id="address2" type="text" name="address2" required="" placeholder="１−１" value="<?php echo $_SESSION['address2']; ?>">
          </td>
          </tr>

          <tr>
          <th>建物名等</th></th><th>
          <td>
          <input id="apart" type="text" name="apart" placeholder="東京ビルディング１０１" value="<?php echo $_SESSION['apart']; ?>">
          </td>
          </tr>
          
          <?php $_SESSION['denwabangou'] = str_replace('-', '', $_SESSION['denwabangou']); ?>
          <tr>
           <th>電話番号</th><th><span class="label req">必須</span></th>
           <td>
            
            <input id="denwabangou" type="tel" name="denwabangou" class="" required="" placeholder="0311112222(ハイフンなし)" maxlength="13" value="<?php echo $_SESSION['denwabangou']; ?>" pattern="[0-9]+$" title="数字(ハイフンなし)">
            
           </td>
           
          </tr>
          
          <?php $_SESSION['faxbangou'] = str_replace('-', '', $_SESSION['faxbangou']); ?>
          <tr>
           <th>FAX番号</th></th><th>
           <td>
            
            <input id="faxbangou" type="tel" name="faxbangou" class="" placeholder="0311112223(ハイフンなし)" maxlength="13" value="<?php echo $_SESSION['faxbangou']; ?>" pattern="[0-9]+$" title="数字(ハイフンなし)">
            
           </td>
           
          </tr>
          
         </table>
         </figure>
         <figure>
         <figcaption>代表者情報 <span class="input_title_info">ご加入状況などの個人情報は、代表者または担当者以外の方にはお話しできません</span></figcaption>
         <table class="input_table">
          
          <tr class="fl_l fl_c">
           <th>氏名</th><th><span class="label req">必須</span></th>
           <td>
            <div class="input_table_flex">
            <input id="daihyosyamei_sei" type="text" name="daihyosyamei_sei" required="" placeholder="代表" value="<?php echo $_SESSION['daihyosyamei_sei']; ?>">　<input id="daihyosyamei_mei" type="text" name="daihyosyamei_mei" required="" placeholder="太郎" value="<?php echo $_SESSION['daihyosyamei_mei']; ?>">
            </div>
           </td>
           
          </tr>
           
          <tr class="fl_l fl_c">
           <th>フリガナ</th><th><span class="label req">必須</span></th>
           <td>
            <div class="input_table_flex">
            <input id="daihyosyamei_furi_sei" type="text" name="daihyosyamei_furi_sei" required="" placeholder="ダイヒョウ" value="<?php echo $_SESSION['daihyosyamei_furi_sei']; ?>" pattern="[\u30A1-\u30FC\u3041-\u309F|　| ]*" title="ひらがな、カタカナ">　<input id="daihyosyamei_furi_mei" type="text" name="daihyosyamei_furi_mei" required="" placeholder="タロウ" value="<?php echo $_SESSION['daihyosyamei_furi_mei']; ?>" pattern="[\u30A1-\u30FC\u3041-\u309F|　| ]*" title="ひらがな、カタカナ">
           </td>
           
          <tr class="fl_c">
           <th>役職</th><th><span class="label req">必須</span></th>
           <td>
            
            <select id="daihyosyayakusyoku" type="text" name="daihyosyayakusyoku" class="" required="">
             <option value="代表">代表</option>
             <option value="取締役">取締役</option>
             <option value="代表取締役">代表取締役</option>
             <option value="代表社員">代表社員</option>
            </select>
           </td>
          </tr>
          
          <?php $_SESSION['daihyomobile'] = str_replace('-', '', $_SESSION['daihyomobile']); ?>
          <tr>
           <th>日中につながる携帯番号</th><th><span class="label req">必須</span></th>
           <td>
            
            <input id="daihyomobile" type="tel" name="daihyomobile" class="" required="" placeholder="09011112222(ハイフンなし)" maxlength="13" value="<?php echo $_SESSION['daihyomobile']; ?>" pattern="[0-9]+$" title="数字(ハイフンなし)"><br>
            <span style="display: inline-block; margin-top: 10px; font-size: 13px;">ご連絡がつきやすい番号の入力をお願いします。</span>
           </td>
          </tr>
          
         </table>
         </figure>
         <figure>
         <figcaption>担当者情報 <!--<input type="button" name="kanyusya_input_copy0" id="kanyusya_input_copy0" class="kanyusya_input_copy"  onClick="kanyusya_copy(0);" value="代表者名をコピー">--><span class="input_title_info">※ ご加入状況などの個人情報は、代表者または担当者以外の方にはお話しできません<br>※ 0120-855-865よりお電話がありましたら、必ず受電いただくか、当日17時までに折り返しお電話ください。</span></figcaption>
         <table class="input_table">
          
          <tr class="fl_l fl_c">
           <th>氏名</th><th><span class="label req">必須</span></th>
           <td>
            <div class="input_table_flex">
            <input id="tantousyamei_sei" type="text" name="tantousyamei_sei" required="" placeholder="担当" value="<?php echo $_SESSION['tantousyamei_sei']; ?>">　<input id="tantousyamei_mei" type="text" name="tantousyamei_mei" required="" placeholder="太郎" value="<?php echo $_SESSION['tantousyamei_mei']; ?>">
           </td>
           
          </tr>
           
          <tr class="fl_l fl_c">
           <th>フリガナ</th><th><span class="label req">必須</span></th>
           <td>
            <div class="input_table_flex">            
            <input id="tantousyamei_furi_sei" type="text" name="tantousyamei_furi_sei" required="" placeholder="タントウ" value="<?php echo $_SESSION['tantousyamei_furi_sei']; ?>" pattern="[\u30A1-\u30FC\u3041-\u309F|　| ]*" title="ひらがな、カタカナ">　<input id="tantousyamei_furi_mei" type="text" name="tantousyamei_furi_mei" required="" placeholder="タロウ" value="<?php echo $_SESSION['tantousyamei_furi_mei']; ?>" pattern="[\u30A1-\u30FC\u3041-\u309F|　| ]*" title="ひらがな、カタカナ">
           </td>
           
          </tr>
           
          <?php $_SESSION['tantoumobile'] = str_replace('-', '', $_SESSION['tantoumobile']); ?>
          <tr>
           <th>担当につながる携帯番号</th><th><span class="label req">必須</span></th>
           <td>
            
            <input id="tantoumobile" type="tel" name="tantoumobile" class="" required="" placeholder="09011112222(ハイフンなし)" maxlength="13" value="<?php echo $_SESSION['tantoumobile']; ?>" pattern="[0-9]+$" title="数字(ハイフンなし)"><br>
            <span style="display: inline-block; margin-top: 10px; font-size: 13px;">ご連絡がつきやすい番号の入力をお願いします。</span>
           </td>
          </tr>
          
         </table>
         </figure>
         
         <?php /* 20211004 Y.Horino 添付書類 */ ?>
         <figure class="tr_kojin">
         <figcaption>添付書類</figcaption>
         <table class="input_table file_attach">
          
          <tr class="tr_kojin">
           <th>直近の確定申告書B<br>または　開業届</th><th><span class="label req">必須</span></th>
           <td>
           <input type="file" name="file_kakutei" accept="image/*,.pdf" id="file_kakutei" required>
           </td>
          </tr>
          
         </table>
         </figure>
         <?php /* 20211004 Y.Horino 添付書類 */ ?>
         
              <?php for($no=1;$no<=5;$no++){ ?>
              <figure id="kanyusya_input<?php echo $no;?>"><figcaption><?php echo $no;?>人目の特別加入者
              <?php if($no == 1){ ?>
               <input type="button" name="kanyusya_input_copy1" id="kanyusya_input_copy1" class="kanyusya_input_copy"  onClick="kanyusya_copy(1);" value="代表者名をコピー">
              <?php } ?>
              </figcaption>
              <table class="input_table">
              
              <tr>
               <th>氏名</th><th><span class="label req">必須</span></th>
               <td>
               <div class="input_table_flex">
                <input id="kanyusyamei_sei<?php echo $no;?>" type="text" name="kanyusyamei_sei<?php echo $no;?>" placeholder="労災" value="<?php echo $_SESSION['kanyusyamei_sei'.$no];?>">　<input id="kanyusyamei_mei<?php echo $no;?>" type="text" name="kanyusyamei_mei<?php echo $no;?>" placeholder="太郎" value="<?php echo $_SESSION['kanyusyamei_mei'.$no];?>">
                </div>
               </td>

              </tr>
              
              <tr>
               <th>フリガナ</th><th><span class="label req">必須</span></th>
               <td>
                <div class="input_table_flex">
                <input id="kanyusyamei_furi_sei<?php echo $no;?>" type="text" name="kanyusyamei_furi_sei<?php echo $no;?>" placeholder="ロウサイ" value="<?php echo $_SESSION['kanyusyamei_furi_sei'.$no];?>" pattern="[\u30A1-\u30FC\u3041-\u309F|　| ]*" title="ひらがな、カタカナ">　<input id="kanyusyamei_furi_mei<?php echo $no;?>" type="text" name="kanyusyamei_furi_mei<?php echo $no;?>" placeholder="タロウ" value="<?php echo $_SESSION['kanyusyamei_furi_mei'.$no];?>" pattern="[\u30A1-\u30FC\u3041-\u309F|　| ]*" title="ひらがな、カタカナ">
                </div>
               </td>

              </tr>
              
              <tr>
               <th>生年月日</th><th><span class="label req">必須</span></th>
               <td>
               <div class="input_table_flex">
        <select name="birthday_y<?php echo $no;?>" id="birthday_y<?php echo $no;?>" class="birthday">
							 
        <option value="">-- 年 --</option>
							 
  			 		<?php for($y=intval(date('Y'))-80;$y<=intval(date('Y'))-10;$y++){ ?>
         <?php 
         $sel = '';
         if($_SESSION['birthday_y'.$no]==$y) $sel = 'selected'; ?>
         <option value="<?php echo $y;?>" <?php echo $sel;?>><?php echo seireki_to_wareki($y);?>年(<?php echo $y;?>年)</option>
        <?php } ?>
					   </select>　
					   <select name="birthday_m<?php echo $no;?>" id="birthday_m<?php echo $no;?>" class="birthday">
							 
        <option value="">-- 月 --</option>
							 
  				 	<?php for($m=1;$m<=12;$m++){ ?>
         <?php 
         $sel = '';
         if($_SESSION['birthday_m'.$no]==$m) $sel = 'selected'; ?>
						   <option value="<?php echo $m;?>" <?php echo $sel;?>><?php echo $m;?>月</option>
					   <?php } ?>
					   </select>　
					   <select name="birthday_d<?php echo $no;?>" id="birthday_d<?php echo $no;?>" class="birthday">
							 
        <option value="">-- 日 --</option>
							 
   					<?php for($d=1;$d<=31;$d++){ ?>
         <?php 
         $sel = '';
         if($_SESSION['birthday_d'.$no]==$d) $sel = 'selected'; ?>
						    <option value="<?php echo $d;?>" <?php echo $sel;?>><?php echo $d;?>日</option>
   					<?php } ?>
					   </select></div>
                
               </td>

              </tr>
              
              <tr>
               <th>事業の種類</th><th></th>
               <td>

                <input id="jigyou<?php echo $no;?>" type="text" name="jigyou<?php echo $no;?>" readonly value="<?php echo $_SESSION['jigyou'.$no];?>">
                
               </td>

              </tr>

          <?php 
          $_SESSION['denwabangou'.$no] = str_replace('-', '', $_SESSION['denwabangou'.$no]); ?>
          <tr>
           <th>携帯電話番号</th><th><span class="label req">必須</span></th>
           <td>
            
            <input id="denwabangou<?php echo $no;?>" type="tel" name="denwabangou<?php echo $no;?>" class="" required="" placeholder="0311112222(ハイフンなし)" maxlength="13" value="<?php echo $_SESSION['denwabangou'.$no];?>" pattern="[0-9]+$" title="数字(ハイフンなし)">
            
           </td>
           
          </tr>
              
          <?php 
          $sel1 = '';
          $sel2 = '';
          if($_SESSION['funjin'.$no]=='いいえ') $sel1 = 'checked';
          if($_SESSION['funjin'.$no]=='はい') $sel2 = 'checked'; ?>
        <tr class="kst_1_input">
         <th>粉じん作業に通算3年以上従事していますか？</th><th><span class="label req">必須</span></th>
         <td>
         <input type="radio" name="funjin<?php echo $no;?>" id="funjin_no<?php echo $no;?>" value="いいえ" checked required class="required" tabindex="<?php echo $tabidx++;?>" <?php echo $sel1;?>><label for="funjin_no<?php echo $no;?>">いいえ</label>
         <input type="radio" name="funjin<?php echo $no;?>" id="funjin_yes<?php echo $no;?>" value="はい" required class="required tokutei_yes" <?php echo $sel2;?>><label for="funjin_yes<?php echo $no;?>">はい</label>
         </td>
        </tr>
        
        <tr class="kst_1_input2">
         <th>主な作業内容を一つお選びください</th><th><span class="label req">必須</span></th>
         <td>
         <select name="funjin_naiyou<?php echo $no;?>" id="funjin_naiyou<?php echo $no;?>" class="naiyou required" required tabindex="<?php echo $tabidx++;?>">
         <option value="">選択してください</option>
          <?php 
          foreach(get_funjin_syurui() as $syurui){ ?>
          <?php 
          $sel = '';
          if($_SESSION['funjin_naiyou'.$no]==$syurui) $sel = 'selected'; ?>
           <option value="<?php echo $syurui;?>" <?php echo $sel;?>><?php echo $syurui;?></option>
          <?php } ?>
          </select>
         </td>
        </tr>
              
        <?php 
        $sel1 = '';
        $sel2 = '';
        if($_SESSION['shindou'.$no]=='いいえ') $sel1 = 'checked';
        if($_SESSION['shindou'.$no]=='はい') $sel2 = 'checked'; ?>
      <tr class="kst_2_input">
       <th>振動工具を使用する作業に通算1年以上従事していますか？</th><th><span class="label req">必須</span></th>
       <td>
       <input type="radio" name="shindou<?php echo $no;?>" id="shindou_no<?php echo $no;?>" value="いいえ" checked required class="required" tabindex="<?php echo $tabidx++;?>" <?php echo $sel1;?>><label for="shindou_no<?php echo $no;?>">いいえ</label>
       <input type="radio" name="shindou<?php echo $no;?>" id="shindou_yes<?php echo $no;?>" value="はい" required class="required tokutei_yes" <?php echo $sel2;?>><label for="shindou_yes<?php echo $no;?>">はい</label>
       </td>
      </tr>
      <tr class="kst_2_input2">
       <th>主に使用する工具を一つお選びください</th><th><span class="label req">必須</span></th>
       <td>
       <select name="shindou_naiyou<?php echo $no;?>" id="shindou_naiyou<?php echo $no;?>" class="naiyou required" required tabindex="<?php echo $tabidx++;?>">
       <option value="">選択してください</option>
        <?php 
        foreach(get_shindou_syurui() as $syurui){ ?>
        <?php 
        $sel = '';
        if($_SESSION['shindou_naiyou'.$no]==$syurui) $sel = 'selected'; ?>
         <option value="<?php echo $syurui;?>" class="ss00" <?php echo $sel;?>><?php echo $syurui;?></option>
        <?php } ?>
        </select>
       </td>
 					</tr>
           
      <?php 
      $sel1 = '';
      $sel2 = '';
      if($_SESSION['namari'.$no]=='いいえ') $sel1 = 'checked';
      if($_SESSION['namari'.$no]=='はい') $sel2 = 'checked'; ?>
      <tr class="kst_3_input">
       <th>鉛を使用する作業に通算6か月以上従事していますか？</th><th><span class="label req">必須</span></th>
       <td>
        <input type="radio" name="namari<?php echo $no;?>" id="namari_no<?php echo $no;?>" value="いいえ" checked required class="required" tabindex="<?php echo $tabidx++;?>" <?php echo $sel1;?>><label for="namari_no<?php echo $no;?>">いいえ</label>
        <input type="radio" name="namari<?php echo $no;?>" id="namari_yes<?php echo $no;?>" value="はい" required class="required tokutei_yes" <?php echo $sel2;?>><label for="namari_yes<?php echo $no;?>">はい</label>
       </td>
      </tr>
      <tr class="kst_3_input2">
       <th>主な作業内容を一つお選びください</th><th><span class="label req">必須</span></th>
       <td>
        <select name="namari_naiyou<?php echo $no;?>" id="namari_naiyou<?php echo $no;?>" class="naiyou required" required tabindex="<?php echo $tabidx++;?>">
        <option value="">選択してください</option>
         <?php 
         foreach(get_namari_syurui() as $syurui){ ?>
         <?php 
         $sel = '';
         if($_SESSION['namari_naiyou'.$no]==$syurui) $sel = 'selected'; ?>
          <option value="<?php echo $syurui;?>" <?php echo $sel;?>><?php echo $syurui;?></option>
         <?php } ?>
        </select>
       </td>
      </tr>
      
      <?php 
      $sel1 = '';
      $sel2 = '';
      if($no <= intval($_SESSION['ninzu']) && $_SESSION['youzai']=='はい') $sel2 = 'checked';
      if($_SESSION['youzai'.$no]=='いいえ'){
       $sel1 = 'checked';
       $sel2 = '';
      }
      if($_SESSION['youzai'.$no]=='はい') $sel2 = 'checked'; ?>
      <tr class="kst_4_input">
       <th>有機溶剤を使用する作業に通算6か月以上従事していますか？</th><th><span class="label req">必須</span></th>
       <td>
        <input type="radio" name="youzai<?php echo $no;?>" id="youzai_no<?php echo $no;?>" value="いいえ" checked required class="required" tabindex="<?php echo $tabidx++;?>" <?php echo $sel1;?>><label for="youzai_no<?php echo $no;?>">いいえ</label>
        <input type="radio" name="youzai<?php echo $no;?>" id="youzai_yes<?php echo $no;?>" value="はい" required class="required tokutei_yes" <?php echo $sel2;?>><label for="youzai_yes<?php echo $no;?>">はい</label>
       </td>
      </tr>
      <tr class="kst_4_input2">
       <th>主に使用している有機溶剤を一つお選びください</th><th><span class="label req">必須</span></th>
       <td>
        <select name="youzai_naiyou<?php echo $no;?>" id="youzai_naiyou<?php echo $no;?>" class="naiyou required" required tabindex="<?php echo $tabidx++;?>">
        <option value="">選択してください</option>
        <?php 
        foreach(get_youzai_syurui() as $syurui){ ?>
         <?php 
         $sel = '';
         if($_SESSION['youzai_naiyou'.$no]==$syurui) $sel = 'selected'; ?>
          <option value="<?php echo $syurui;?>" <?php echo $sel;?>><?php echo $syurui;?></option>
         <?php } ?>
        </select>
       </td>
      </tr>
      <tr class="kst_4_input2">
       <th>いつから有機溶剤を使用していますか？</th><th><span class="label req">必須</span></th>
        <td>
         <select id="youzai_itukara_y<?php echo $no;?>" name="youzai_itukara_y<?php echo $no;?>" style="width: auto;">
          <?php 
          $today_y = date('Y');
          $y_start = intval($today_y)-50;
          for($i=$y_start; $i<=$today_y;$i++){ ?>
           <option value="<?php echo $i;?>"><?php echo $i;?></option>
          <?php } ?>
         <option value="" selected>--選択--</option>
         </select> 年　
         <select id="youzai_itukara_m<?php echo $no;?>" name="youzai_itukara_m<?php echo $no;?>" style="width: auto;">
          <option value="" selected>--選択--</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
         </select> 月 ～現在まで
       </td>
      </tr>
    
<?php /* 20211004 Y.Horino 添付書類 */ ?>
           <tr class="file_attach file_attach<?php echo $no;?>">
           <th>運転免許証（表）</th><th><span class="label req">必須</span></th>
           <td>
           <input type="file" name="file_menkyo_omote_<?php echo $no;?>" accept="image/*,.pdf" id="file_menkyo_omote_<?php echo $no;?>" required>
           </td>
          </tr>
          
          <tr class="file_attach file_attach<?php echo $no;?>">
           <th>運転免許証（裏）</th><th><span class="label req">必須</span></th>
           <td>
           <input type="file" name="file_menkyo_ura_<?php echo $no;?>" accept="image/*,.pdf" id="file_menkyo_ura_<?php echo $no;?>" required>
           </td>
          </tr>          
<?php /* 20211004 Y.Horino 添付書類 */ ?>
              
<?php /* 20221108 加入団体選択 */ ?>
             <tr>
               <th>今入っている一人親方組合はどこですか？</th><th><span class="label req">必須</span></th>
               <td>
                <div class="input_table_flex input_table_flex_wrap">
                <div class="input_table_flex_item">
                <input id="jimuKanyuOyakatadantai<?php echo $no; ?>1" type="radio" name="jimuKanyuOyakatadantai<?php echo $no; ?>" value="入っていない"><label for="jimuKanyuOyakatadantai<?php echo $no; ?>1">入っていない</label>
                </div>
                <div class="input_table_flex_item">
                <input id="jimuKanyuOyakatadantai<?php echo $no; ?>2" type="radio" name="jimuKanyuOyakatadantai<?php echo $no; ?>" value="一人親方労災保険RJC"><label for="jimuKanyuOyakatadantai<?php echo $no; ?>2">一人親方労災保険RJC</label>
                </div>
                <div class="input_table_flex_item">
                <input id="jimuKanyuOyakatadantai<?php echo $no; ?>3" type="radio" name="jimuKanyuOyakatadantai<?php echo $no; ?>" value="一人親方労災保険組合"><label for="jimuKanyuOyakatadantai<?php echo $no; ?>3">一人親方労災保険組合</label>
                </div>
                <div class="input_table_flex_item">
                <input id="jimuKanyuOyakatadantai<?php echo $no; ?>4" type="radio" name="jimuKanyuOyakatadantai<?php echo $no; ?>" value="楽々親方"><label for="jimuKanyuOyakatadantai<?php echo $no; ?>4">楽々親方</label>
                </div>
                <div class="input_table_flex_item">
                <input id="jimuKanyuOyakatadantai<?php echo $no; ?>5" type="radio" name="jimuKanyuOyakatadantai<?php echo $no; ?>" value="労災センター共済会"><label for="jimuKanyuOyakatadantai<?php echo $no; ?>5">労災センター共済会</label>
                </div>
                <div class="input_table_flex_item">
                <input id="jimuKanyuOyakatadantai<?php echo $no; ?>6" type="radio" name="jimuKanyuOyakatadantai<?php echo $no; ?>" value="一人親方あんしん労災"><label for="jimuKanyuOyakatadantai<?php echo $no; ?>6">一人親方あんしん労災</label>
                </div>
                <div class="input_table_flex_item">
                <input id="jimuKanyuOyakatadantai<?php echo $no; ?>7" type="radio" name="jimuKanyuOyakatadantai<?php echo $no; ?>" value="にほん労災"><label for="jimuKanyuOyakatadantai<?php echo $no; ?>7">にほん労災</label>
                </div>
                <div class="input_table_flex_item">
                <input id="jimuKanyuOyakatadantai<?php echo $no; ?>8" type="radio" name="jimuKanyuOyakatadantai<?php echo $no; ?>" value="その他"><label for="jimuKanyuOyakatadantai<?php echo $no; ?>8">その他</label>
                </div>
                </div>
               </td>

              </tr>
<?php /* 20221108 加入団体選択 */ ?>

              </table>
              </figure>
             <?php } ?>
         
         <h1 class="mitsumori-ttl" style="margin-top: 80px;">お支払方法の登録</h1>
         <figure>
         <table class="input_table">
          
          <tr>
           <th>お支払方法</th><th><span class="label req">必須</span></th>
           <td>
           <?php
           $sel1 = '';
           $sel2 = '';
           if($_SESSION['shiharai']=='クレジットカード') $sel1 = 'checked';
           if($_SESSION['shiharai']=='銀行振込') $sel2 = 'checked';
           ?>
            <input id="shiharai1" type="radio" name="shiharai" value="クレジットカード" required="" <?php echo $sel1;?>>
            <label for="shiharai1"><span>クレジットカード</span></label>
            <p style="color: #f00;">※ 使用できるのはコーポレートカードか代表者名義のカードのみです。</p><br>
            <input id="shiharai2" type="radio" name="shiharai" value="銀行振込" required="" <?php echo $sel2;?>>
            <label for="shiharai2"><span>銀行振込</span></label>
            <p>お申込み完了後、振込先をメールにてご案内します。<br>期限内に入金が確認できない場合は取消となります。</p>
           </td>
          </tr>
          </table>
         </figure>
         <!--<input id="shiharai2" type="hidden" name="shiharai" value="銀行振込">-->

         <?php if($_SESSION['shiharai_kaisu']=='毎月払い'){ ?>
         <figure class="maitsuki_input" style="">
         <table class="input_table">
          
          <tr>
           <th>ご確認ください</th><th><span class="label req">必須</span></th>
           <td>
            <?php 
             if(intval($_SESSION['kikan'])==1){
              $kikan_m = 3;
             } else {
              $kikan_m = 4;
             }
             $kikan_m_next = $kikan_m + 1;
            ?>
            毎月払いの場合は、初回費用として<?php echo $kikan_m;?>か月分をお支払いただき、<?php echo $kikan_m_next;?>か月目から月々<?php echo number_format($_SESSION['maitsuki_kaihi']);?>円を口座振替にてお支払いただきます。<br>
            <label><input id="check_maitsuki" type="checkbox" name="check_maitsuki" value="1" required> 確認しました</label>
           </td>
          </tr>
          </table>
         </figure>
          <?php } ?>
          
          
         <!-- https://www.sejuku.net/blog/104657 -->
         <div class="popup">
           <div class="content">
            <img src="../assets/img/card-pop_backpc.png" class="popup_back show_pc hide_sp">
            <img src="../assets/img/card-pop_backsp.png" class="popup_back show_sp hide_pc">

            <a id="popup_change">
            </a>
            <a id="popup_close">
            </a>
           </div>
         </div>

           <style>
         .show_pc{
          display: block;
         }
         .hide_pc{
          display: none;
         }
         .popup {
           height: 100vh;
           width: 100%;
           background: rgba(0,0,0,0.5);
           position: fixed;
           top: 0;
           left: 0;
           display: flex;
           justify-content: center;
           align-items: center;
           z-index: 100;
         }
         .popup strong{
             font-size: 2em;
             margin: 0 auto;
             display: block;
             width: 13em;
             max-width: 100%;
             line-height: 1.2em;
         }
         .popup strong span{
          display: inline-block;
         }
         .content {
           max-width: 600px;
           opacity: 1;
           color: #000;
           font-size: 14px;
           line-height: 20px;
           text-align: left;
           position: relative;
         }
         .popup_back{
          width: 100%;
         }
         #popup_button{
             margin: 1em auto 0;
             width: 300px;
             max-width: 90%;
         }
         #popup_change,
         #popup_close{
             text-decoration: none;
             display: inline-block;
             text-align: center;
             cursor: pointer;
         }
         #popup_change{
             position: absolute;
             color: #fff;
          bottom: 8%;
          left: 13.5%;
          width: 34%;
          height: 16%;
         }
         #popup_change img,
         #popup_close img{
          width: 100%;
         }
         #popup_close{
             position: absolute;
             color: #fff;
          bottom: 8%;
          right: 11.5%;
          width: 34%;
          height: 16%;
         }
         @media screen and (max-width: 960px) {
         .show_sp{
          display: block;
         }
         .hide_sp{
          display: none !important;
         }
          .content {
           max-width: 400px;
           width: 90%;
          }
          .popup strong{
             width: 8em;
             text-align: center;
          }
          #popup_button{
           max-width: 20em;
          }
          #popup_change{
           width: 39%;
           height: 15%;
           left: 7%;
           bottom: 10%;
          }
          #popup_close{
           bottom: 10%;
           right: 5%;
           width: 40%;
           height: 15%;
          }
         }
         @media screen and (max-width: 400px) {
          #popup_change{
          }
          #popup_close{
          }
          .popup strong{
           font-size: 1.7em;
          }
          #popup_button{
           width: 215px;
          }
         }
           </style>
           <script>
         $(".popup").hide();
         $("#shiharai1 + label").on("click", function() {
         });
         $("#shiharai2 + label").on("click", function() {
           $(".popup").fadeIn();
         });
         $("#popup_close").on("click", function() {
           $(".popup").fadeOut();
         });
         $("#popup_change").on("click", function() {
           $('input[name="shiharai"]:checked').prop('checked', false);
           $('#shiharai1').prop('checked', true);
           $(".popup").fadeOut();
         });
         $('input[name="shiharai"]').click(function(){
         });
           </script>
           <!-- https://www.sejuku.net/blog/104657 -->
          
          
          
          
          
          
          <div class="mitsumori-btn_area">
            <input class="mitsumori-submit" type="image" src="../assets/img/form_input_next.png" id="submit" name="submit" value="次へ進む">
           <a class="mitsumori-back" id="back" onClick="history.back()"><img src="../assets/img/form_card_back.png" alt="前の画面に戻る"></a>
          </div>
     </section>
    </form>
  </main>

 
</div>
 
  <script>
$(function(){
  var ua = navigator.userAgent;
  var isIE6 = ua.match(/msie [6.]/i), isIE7 = ua.match(/msie [7.]/i);
  if (isIE6 || isIE7) {
    location.replace('nosupport.php');
	}
});
</script>


<script>
<?php include("table.js"); ?>
 
 
	$(function(){
  $('#input_sec').show();  

  $ninzu_sel = <?php if(isset($_SESSION['ninzu'])) {echo $_SESSION['ninzu'];} else {echo '1';} ?>;
  for($i=0;$i<=5;$i++){
   if($i <= $ninzu_sel){
    $('#kanyusya_input'+$i).show();
    $('#kanyusya_input'+$i).find('input').prop('required', true);
    $('#kanyusya_input'+$i).find('select.birthday').prop('required', true);
   } else {
    $('#kanyusya_input'+$i).hide();
    $('#kanyusya_input'+$i).find('input').prop('required', false);
    $('#kanyusya_input'+$i).find('select.birthday').prop('required', false);
   }
   $('input[name="jigyou'+($i+1)+'"]').val("<?php echo $_SESSION['jigyou'];?>");
  }
	});
 
 function kanyusya_copy($no){
  if($no == 0){
   $('#tantousyamei_sei').val($('#daihyosyamei_sei').val());
   $('#tantousyamei_mei').val($('#daihyosyamei_mei').val());
   $('#tantousyamei_furi_sei').val($('#daihyosyamei_furi_sei').val());
   $('#tantousyamei_furi_mei').val($('#daihyosyamei_furi_mei').val());   
  } else {
   $('#kanyusyamei_sei'+$no).val($('#daihyosyamei_sei').val());
   $('#kanyusyamei_mei'+$no).val($('#daihyosyamei_mei').val());
   $('#kanyusyamei_furi_sei'+$no).val($('#daihyosyamei_furi_sei').val());
   $('#kanyusyamei_furi_mei'+$no).val($('#daihyosyamei_furi_mei').val());
  }
  return false;
 }
 
 function browser(){
   var userAgent = window.navigator.userAgent.toLowerCase();

   if(userAgent.indexOf('msie') != -1 ||
           userAgent.indexOf('trident') != -1) {
       return "msie";
   } else if(userAgent.indexOf('edge') != -1) {
       return "edge";
   } else if(userAgent.indexOf('chrome') != -1) {
       return "chrome";
   } else if(userAgent.indexOf('safari') != -1) {
       return "safari";
   } else if(userAgent.indexOf('firefox') != -1) {
       return "firefox";
   } else if(userAgent.indexOf('opera') != -1) {
       return "opera";
   } else {
       return "";
   }
 }
 function kst1_click($idx){
    $pref = $('#kanyusya_input'+$idx+' select[name="pref'+$idx+'"]').val();
    $val = $('#kanyusya_input'+$idx+' .kst_1_input input[name="funjin'+$idx+'"]:checked').val();
console.log("粉じん");
console.log($val);
    if($val=='はい'){
     $('#kanyusya_input'+$idx+' .kst_1_input + .kst_1_input2').show();
     $('#kanyusya_input'+$idx+' .kst_1_input + .kst_1_input2 select').attr("required", true);
    } else {
     $('#kanyusya_input'+$idx+' .kst_1_input + .kst_1_input2').hide();
     $('#kanyusya_input'+$idx+' .kst_1_input + .kst_1_input2 select').val('');
     $('#kanyusya_input'+$idx+' .kst_1_input + .kst_1_input2 select').removeAttr("required");
    }
   }
   
   function kst2_click($idx){
    $pref = $('#kanyusya_input'+$idx+' select[name="pref'+$idx+'"]').val();
    $val = $('#kanyusya_input'+$idx+' .kst_2_input input[name="shindou'+$idx+'"]:checked').val();
console.log("振動");
console.log($val);
    if($val=='はい' || $pref == '福岡県' || $pref == '佐賀県' || $pref == '長崎県' || $pref == '熊本県' || $pref == '大分県' || $pref == '宮崎県' || $pref == '鹿児島県'){
     $('#kanyusya_input'+$idx+' .kst_2_input + .kst_2_input2').show();
     $('#kanyusya_input'+$idx+' .kst_2_input + .kst_2_input2 select').attr("required", true);
    } else {
     $('#kanyusya_input'+$idx+' .kst_2_input + .kst_2_input2').hide();
     $('#kanyusya_input'+$idx+' .kst_2_input + .kst_2_input2 select').val('');
     $('#kanyusya_input'+$idx+' .kst_2_input + .kst_2_input2 select').removeAttr("required");
    }
   }
   
   function kst3_click($idx){
    $pref = $('#kanyusya_input'+$idx+' select[name="pref'+$idx+'"]').val();
    $val = $('#kanyusya_input'+$idx+' .kst_3_input input[name="namari'+$idx+'"]:checked').val();
console.log("鉛");
console.log($val);
    if($val=='はい'){
     $('#kanyusya_input'+$idx+' .kst_3_input + .kst_3_input2').show();
     $('#kanyusya_input'+$idx+' .kst_3_input + .kst_3_input2 select').attr("required", true);
    } else {
     $('#kanyusya_input'+$idx+' .kst_3_input + .kst_3_input2').hide();
     $('#kanyusya_input'+$idx+' .kst_3_input + .kst_3_input2 select').val('');
     $('#kanyusya_input'+$idx+' .kst_3_input + .kst_3_input2 select').removeAttr("required");
    }
   }
   
   function kst4_click($idx){
    $pref = $('#kanyusya_input'+$idx+' select[name="pref'+$idx+'"]').val();
    $val = $('#kanyusya_input'+$idx+' .kst_4_input input[name="youzai'+$idx+'"]:checked').val();
console.log("有機溶剤");
console.log($val);
    if($val=='はい'){
     $('#kanyusya_input'+$idx+' .kst_4_input + .kst_4_input2').show();
     $('#kanyusya_input'+$idx+' .kst_4_input + .kst_4_input2 select').attr("required", true);
     $('#kanyusya_input'+$idx+' .kst_4_input').nextAll('.kst_4_input2').show();
     $('#kanyusya_input'+$idx+' .kst_4_input').nextAll('.kst_4_input2 select').attr("required", true);
     if($pref == '福岡県' || $pref == '佐賀県' || $pref == '長崎県' || $pref == '熊本県' || $pref == '大分県' || $pref == '宮崎県' || $pref == '鹿児島県'){
      $('#kanyusya_input'+$idx+' .kst_4_input2 .input_youzai21').hide();
      $('#kanyusya_input'+$idx+' .kst_4_input2 .input_youzai22').show();
     } else {
      $('#kanyusya_input'+$idx+' .kst_4_input2 .input_youzai21').show();
      $('#kanyusya_input'+$idx+' .kst_4_input2 .input_youzai22').hide();
      $basyo = $('#kanyusya_input'+$idx+' .kst_4_input2 .input_youzai21 input[name="youzai_basyo'+$idx+'"]:checked').val();
      if($basyo == '屋内'){
       $('#kanyusya_input'+$idx+' .kst_4_input2 .input_youzai22').show();      
      }
     }
    } else {
     $('#kanyusya_input'+$idx+' .kst_4_input + .kst_4_input2').hide();
     $('#kanyusya_input'+$idx+' .kst_4_input + .kst_4_input2 select').val('');
     $('#kanyusya_input'+$idx+' .kst_4_input + .kst_4_input2 select').removeAttr("required");
     $('#kanyusya_input'+$idx+' .kst_4_input').nextAll('.kst_4_input2').hide();
     $('#kanyusya_input'+$idx+' .kst_4_input').nextAll('.kst_4_input2 select').val('');
     $('#kanyusya_input'+$idx+' .kst_4_input').nextAll('.kst_4_input2 select').removeAttr("required");
    }
   }
 
 	$('input[name="jigyou"]').click(function(){
   jigyou_click(1);
   jigyou_click(2);
   jigyou_click(3);
   jigyou_click(4);
   jigyou_click(5);
  });
  <?php for($i=1;$i<=5;$i++){ ?>
   jigyou_click(<?php echo $i;?>);
   $('#kanyusya_input<?php echo $i;?> .kst_1_input input').click(function(){
    kst1_click(<?php echo $i;?>);
   });
   kst1_click(<?php echo $i;?>);
 		$('#kanyusya_input<?php echo $i;?> .kst_2_input input').click(function(){
    kst2_click(<?php echo $i;?>);
   });
   kst2_click(<?php echo $i;?>);
 		$('#kanyusya_input<?php echo $i;?> .kst_3_input input').click(function(){
    kst3_click(<?php echo $i;?>);
   });
   kst3_click(<?php echo $i;?>);
 		$('#kanyusya_input<?php echo $i;?> .kst_4_input input').click(function(){
    kst4_click(<?php echo $i;?>);
   });
   kst4_click(<?php echo $i;?>);
 		$('#kanyusya_input<?php echo $i;?> .kst_4_input2 input').click(function(){
    kst4_click(<?php echo $i;?>);
   });
  <?php } ?>

  function jigyou_click($idx){
   $('#kanyusya_input'+$idx+' .kst_1_input').hide();
   $('#kanyusya_input'+$idx+' .kst_2_input').hide();
   $('#kanyusya_input'+$idx+' .kst_3_input').hide();
   $('#kanyusya_input'+$idx+' .kst_4_input').hide();
   $('#kanyusya_input'+$idx+' .kst_1_input2').hide();
   $('#kanyusya_input'+$idx+' .kst_2_input2').hide();
   $('#kanyusya_input'+$idx+' .kst_3_input2').hide();
   $('#kanyusya_input'+$idx+' .kst_4_input2').hide();
   $('#kanyusya_input'+$idx+' .kst_1_input input').removeAttr("required");
   $('#kanyusya_input'+$idx+' .kst_2_input input').removeAttr("required");
   $('#kanyusya_input'+$idx+' .kst_3_input input').removeAttr("required");
   $('#kanyusya_input'+$idx+' .kst_4_input input').removeAttr("required");
   $('#kanyusya_input'+$idx+' .kst_1_input2 select').removeAttr("required");
   $('#kanyusya_input'+$idx+' .kst_2_input2 select').removeAttr("required");
   $('#kanyusya_input'+$idx+' .kst_3_input2 select').removeAttr("required");
   $('#kanyusya_input'+$idx+' .kst_4_input2 select').removeAttr("required");

    $pref = $('#kanyusya_input'+$idx+' select[name="pref'+$idx+'"]').val();
    if(<?php echo $kouji_syubetu_type[$_SESSION['jigyou']][0];?> == 1){
    $('#kanyusya_input'+$idx+' .kst_1_input').show();
    $('#kanyusya_input'+$idx+' .kst_1_input input').attr("required", true);
    if($('#kanyusya_input'+$idx+' .kst_1_input input').val() == 'はい'){
     $('#kanyusya_input'+$idx+' .kst_1_input2').show();
     $('#kanyusya_input'+$idx+' .kst_1_input2 select').attr("required", true);
    }
   } else {
    $('#kanyusya_input'+$idx+' .kst_1_input input[value="いいえ"]').prop('checked', true);
    $('#kanyusya_input'+$idx+' .kst_1_input input[value="はい"]').prop('checked', false);
   }
   
    $pref = $('#kanyusya_input'+$idx+' select[name="pref'+$idx+'"]').val();
    if(<?php echo $kouji_syubetu_type[$_SESSION['jigyou']][1];?> == 1){
    $('#kanyusya_input'+$idx+' .kst_2_input').show();
    $('#kanyusya_input'+$idx+' .kst_2_input input').attr("required", true);
    if($('#kanyusya_input'+$idx+' .kst_2_input input').val() == 'はい'){
     $('#kanyusya_input'+$idx+' .kst_2_input2').show();     
     $('#kanyusya_input'+$idx+' .kst_2_input2 select').attr("required", true);
    }
   } else {
    $('#kanyusya_input'+$idx+' .kst_2_input input[value="いいえ"]').prop('checked', true);
    $('#kanyusya_input'+$idx+' .kst_2_input input[value="はい"]').prop('checked', false);
   }
   
    $pref = $('#kanyusya_input'+$idx+' select[name="pref'+$idx+'"]').val(); 
    if(<?php echo $kouji_syubetu_type[$_SESSION['jigyou']][2];?> == 1){
    $('#kanyusya_input'+$idx+' .kst_3_input').show();
    $('#kanyusya_input'+$idx+' .kst_3_input input').attr("required", true);
    if($('#kanyusya_input'+$idx+' .kst_3_input input').val() == 'はい'){
     $('#kanyusya_input'+$idx+' .kst_3_input2').show();
     $('#kanyusya_input'+$idx+' .kst_3_input2 select').attr("required", true);
    }
   } else {
    $('#kanyusya_input'+$idx+' .kst_3_input input[value="いいえ"]').prop('checked', true);
    $('#kanyusya_input'+$idx+' .kst_3_input input[value="はい"]').prop('checked', false);
   }
   
    $pref = $('#kanyusya_input'+$idx+' select[name="pref'+$idx+'"]').val();
    if(<?php echo $kouji_syubetu_type[$_SESSION['jigyou']][3];?> == 1){
    $('#kanyusya_input'+$idx+' .kst_4_input').show();
    $('#kanyusya_input'+$idx+' .kst_4_input input').attr("required", true);
    if($('#kanyusya_input'+$idx+' .kst_4_input input').val() == 'はい'){
     $('#kanyusya_input'+$idx+' .kst_4_input2').show();
     $('#kanyusya_input'+$idx+' .kst_4_input2 select').attr("required", true);
    }
   } else {
    $('#kanyusya_input'+$idx+' .kst_4_input input[value="いいえ"]').prop('checked', true);
    $('#kanyusya_input'+$idx+' .kst_4_input input[value="はい"]').prop('checked', false);
   }
		} 
</script>

  <script>
   /*
function check_email(){
	$(".emailerr").hide();
 $ret = true;
 
	$email_input = $("#email").val();
	$email_chk_input = $("#emailchk").val();
	$("#emailerr").hide();
	if($email_input != $email_chk_input){
		$("#emailerr").show();
		$("#emailerr").css('color','#ff0000');
		$(window).scrollTop($("#email").offset().top - 70);
		$ret = false;
	}
 
	return $ret;
}
*/
   
function type_click(){
 $('.tr_hojin').hide();
 $('.tr_kojin').hide();
 $('.sec_kojin').hide();
 $typesel = $('input[name="type"]:checked').val();
// $typesel = "<?php echo $_SESSION['type'];?>";
 if($typesel == '法人'){
  $('.tr_hojin').show();
  $('.tr_hojin input[type="file"]').attr('required', true);
  $('.tr_kojin input[type="file"]').val("");
  $('.tr_kojin input[type="file"]').removeAttr('required');
 } else if($typesel == '個人'){
  $('.tr_kojin').show();
  $('.sec_kojin').show();
  $('.tr_kojin input[type="file"]').attr('required', true);
  $('.tr_hojin input[type="file"]').val("");
  $('.tr_hojin input[type="file"]').removeAttr('required');
 }
 $kikan = <?php echo $_SESSION['kikane'];?>;
 if($kikan == 0){
  $('.tr_3month_hide').show();
  $('.tr_3month_hide input[type="file"]').attr('required', true);
 } else {
  $('.tr_3month_hide').hide();
  $('.tr_3month_hide input[type="file"]').val("");
  $('.tr_3month_hide input[type="file"]').removeAttr('required');
 }
}

function add_file_rirekisyo(){
 $num = $('input[name="f_num"]').val()*1;
 if($num <= 0) $num = 1;
 $num_next = $num+1;
 if($num == 1){
  $('input[name="file_rirekisyo'+$num+'"]').after('<input type="file" name="file_rirekisyo'+$num_next+'" accept="image/*,.pdf" id="file_rirekisyo'+$num_next+'" required><input type="button" name="del_button" id="del_button" onclick="del_file_rirekisyo();" value="×">');
 } else {
  $('input[name="file_rirekisyo'+$num+'"]').after('<input type="file" name="file_rirekisyo'+$num_next+'" accept="image/*,.pdf" id="file_rirekisyo'+$num_next+'" required>');
 }
 $('input[name="f_num"]').val($num_next);
}

function del_file_rirekisyo(){
 $num = $('input[name="f_num"]').val()*1;
 if($num <= 0) $num = 1;
 $num_prev = $num-1;
 $('input[name="file_rirekisyo'+$num+'"]').val("");
 $('input[name="file_rirekisyo'+$num+'"]').remove();
 $('input[name="f_num"]').val($num_prev);
 if($num_prev == 1){
  $('#del_button').remove();
 }
}

function sendonfax(){
 $chk = $("#sendonfax").prop('checked');
 console.log($chk);
 if($chk == true){
  $('.file_attach').hide();
  $('.file_attach input[type="file"]').val("");
  $('.file_attach input[type="file"]').removeAttr("required");
 } else {
  $('.file_attach').show();
  $('.file_attach input[type="file"]').attr("required");
  for($i=0;$i<=5;$i++){
   $('.file_attach'+$i).hide();
   $('.file_attach'+$i+' input[type="file"]').val("");
   $('.file_attach'+$i+' input[type="file"]').removeAttr("required");
   if($i <= <?php echo $_SESSION['ninzu'];?>){
    $('.file_attach'+$i).show();
    $('.file_attach'+$i+' input[type="file"]').attr("required", "required");
  }
  }
 }
}
   
$(function(){
		$(".emailerr").hide();

 /*
		$("form").submit(function(){
			return check_email();
		});
  */
  $('input[name="type"]').click(function(){
   type_click();
  });
  type_click();

		$("#sendonfax").click(function(){
   sendonfax();
  });
  sendonfax();
 
	});

 /* 20230510 メールアドレス入力をSFリードに登録 */
 $(function(){
  regist_sflead('フォーム：ページ表示');
  $('input[name="mail"]').focusout(function(){
   regist_sflead('フォーム：メールアドレス入力');
  });
  $('input[name="submit"]').click(function(){
   regist_sflead('フォーム：送信ボタンクリック');
  });
	});
 function regist_sflead($_form_action){
		$.ajax({
			type: 'POST',
			cache: false,
			url: 'regist_sf.php',
   timeout: 10000,
			data:{
				'email' : $('input[name="mail"]').val(),
				'form_action' : $_form_action,
			},
			success: function(j_data){
			},
   error: function(){
   }
		});
  
 }
   
  </script>

  
</body>
</html>