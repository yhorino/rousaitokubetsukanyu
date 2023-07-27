<?php
 include $_SERVER['DOCUMENT_ROOT'] .'/maintenance_check.php';
?>

<?php
// セッションの開始
ob_start();
session_start();

header("Content-type: text/html;charset=utf-8");

require_once('function.php');
require_once('Mobile_Detect.php');

$detect = new Mobile_Detect;
 
		$device = 'PC';
		if($detect->isMobile()){
			$device = 'スマホ';
		}

// セッション切れチェック
 $timeout = 900;

 if (isset($_SESSION['idle_time']) && $_SESSION['idle_time'] < time()) {
     unset($_SESSION['idle_time']);
     header('Location: ./session_out.php');
     exit;
 }

 $_SESSION['idle_time'] = time() + $timeout;

 // パラメータ未設定の場合はセッション切れ扱いにする（エラー）
 if(!isset($_GET['cellsno'])){
  header('Location: ./session_out.php');
 }

?>
<!DOCTYPE html>
<html lang="ja">

<head>
<?php include_once  $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_head.html'; ?>
 
 
  <title>見積り：労働保険事務組合RJC　無料見積りフォーム</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="format-detection" content="telephone=no">
 
  <link rel="canonical" href="https://www.xn--y5q0r2lqcz91qdrc.com/form_norikae/mitsumori.php">
  <meta name="robots" content="all">
  <meta name="copyright" content="Copyright 2020 労働保険事務組合RJC All Rights Reserved.">
  <meta property="og:title" content="見積り：労働保険事務組合RJC　無料見積りフォーム">
  <meta property="og:type" content="article">
  <meta property="og:url" content="https://www.xn--y5q0r2lqcz91qdrc.com/form_norikae/mitsumori.php">
  <meta property="og:image" content="https://www.xn--y5q0r2lqcz91qdrc.com/assets/logo_img/logo_jimukumiai.png">
  <meta property="og:site_name" content="建設業専門　全国対応　中小事業主の特別加入RJC">
  <meta property="og:description" content="" />
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
  <link rel="icon" href="/favicon.ico">
 
  <!-- CSS-->
  <link rel="stylesheet" href="../assets/css/reset.css">
  <link rel="stylesheet" href="../assets/css/common.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="style_form_new.css">
  <!-- JS-->
  <script src="../assets/js/app.js"></script>

 <script type="text/javascript" src="../assets/js/jquery.jpostal.js-master/jquery.jpostal.js"></script>
 <script src="https://kit.fontawesome.com/a366e23f99.js" crossorigin="anonymous"></script>
 
  <script>
    /* 変更した場合はPHP変数にコピーすること */
    var roumu = {};
   roumu["大工0"] = 3501;
   roumu["大工1"] = 0;
   roumu["大工2"] = 0;
   roumu["大工3"] = 0;
   roumu["大工4"] = 0;
   roumu["塗装0"] = 3504;
   roumu["塗装1"] = 0;
   roumu["塗装2"] = 0;
   roumu["塗装3"] = 0;
   roumu["塗装4"] = 0;
   roumu["防水0"] = 3501;
   roumu["防水1"] = 0;
   roumu["防水2"] = 0;
   roumu["防水3"] = 0;
   roumu["防水4"] = 0;
   roumu["板金0"] = 3501;
   roumu["板金1"] = 0;
   roumu["板金2"] = 0;
   roumu["板金3"] = 0;
   roumu["板金4"] = 0;
   roumu["タイル・れんが・ブロック0"] = 3501;
   roumu["タイル・れんが・ブロック1"] = 0;
   roumu["タイル・れんが・ブロック2"] = 0;
   roumu["タイル・れんが・ブロック3"] = 0;
   roumu["タイル・れんが・ブロック4"] = 0;
   roumu["左官0"] = 3504;
   roumu["左官1"] = 0;
   roumu["左官2"] = 0;
   roumu["左官3"] = 0;
   roumu["左官4"] = 0;
   roumu["鉄筋0"] = 3501;
   roumu["鉄筋1"] = 0;
   roumu["鉄筋2"] = 0;
   roumu["鉄筋3"] = 0;
   roumu["鉄筋4"] = 0;
   roumu["屋根0"] = 3501;
   roumu["屋根1"] = 0;
   roumu["屋根2"] = 0;
   roumu["屋根3"] = 0;
   roumu["屋根4"] = 0;
   roumu["足場0"] = 3506;
   roumu["足場1"] = 0;
   roumu["足場2"] = 0;
   roumu["足場3"] = 0;
   roumu["足場4"] = 0;
   roumu["電気0"] = 3507;
   roumu["電気1"] = 0;
   roumu["電気2"] = 0;
   roumu["電気3"] = 0;
   roumu["電気4"] = 0;
   roumu["内装0"] = 3501;
   roumu["内装1"] = 0;
   roumu["内装2"] = 0;
   roumu["内装3"] = 0;
   roumu["内装4"] = 0;
   roumu["管0"] = 3504;
   roumu["管1"] = 0;
   roumu["管2"] = 0;
   roumu["管3"] = 0;
   roumu["管4"] = 0;
   roumu["機械器具設置0"] = 3801;
   roumu["機械器具設置1"] = 0;
   roumu["機械器具設置2"] = 0;
   roumu["機械器具設置3"] = 0;
   roumu["機械器具設置4"] = 0;
   roumu["電気通信0"] = 3801;
   roumu["電気通信1"] = 0;
   roumu["電気通信2"] = 0;
   roumu["電気通信3"] = 0;
   roumu["電気通信4"] = 0;
   roumu["建具0"] = 3803;
   roumu["建具1"] = 0;
   roumu["建具2"] = 0;
   roumu["建具3"] = 0;
   roumu["建具4"] = 0;
   roumu["熱絶縁0"] = 3801;
   roumu["熱絶縁1"] = 0;
   roumu["熱絶縁2"] = 0;
   roumu["熱絶縁3"] = 0;
   roumu["熱絶縁4"] = 0;
   roumu["ガラス0"] = 3801;
   roumu["ガラス1"] = 0;
   roumu["ガラス2"] = 0;
   roumu["ガラス3"] = 0;
   roumu["ガラス4"] = 0;
   roumu["消防施設0"] = 3504;
   roumu["消防施設1"] = 0;
   roumu["消防施設2"] = 0;
   roumu["消防施設3"] = 0;
   roumu["消防施設4"] = 0;
   roumu["美装0"] = 3501;
   roumu["美装1"] = 0;
   roumu["美装2"] = 0;
   roumu["美装3"] = 0;
   roumu["美装4"] = 0;
   roumu["とび・土工・コンクリート0"] = 3718;
   roumu["とび・土工・コンクリート1"] = 0;
   roumu["とび・土工・コンクリート2"] = 0;
   roumu["とび・土工・コンクリート3"] = 0;
   roumu["とび・土工・コンクリート4"] = 0;
   roumu["解体0"] = 3716;
   roumu["解体1"] = 0;
   roumu["解体2"] = 0;
   roumu["解体3"] = 0;
   roumu["解体4"] = 0;
   roumu["造園0"] = 3719;
   roumu["造園1"] = 0;
   roumu["造園2"] = 0;
   roumu["造園3"] = 0;
   roumu["造園4"] = 0;
   roumu["外構0"] = 3506;
   roumu["外構1"] = 0;
   roumu["外構2"] = 0;
   roumu["外構3"] = 0;
   roumu["外構4"] = 0;
   roumu["型枠0"] = 3505;
   roumu["型枠1"] = 0;
   roumu["型枠2"] = 0;
   roumu["型枠3"] = 0;
   roumu["型枠4"] = 0;
   roumu["鉄骨0"] = 3501;
   roumu["鉄骨1"] = 0;
   roumu["鉄骨2"] = 0;
   roumu["鉄骨3"] = 0;
   roumu["鉄骨4"] = 0;
   
    var roumu_hiritu = {};
    roumu_hiritu[33] = 0.17;
    roumu_hiritu[35] = 0.23;
    roumu_hiritu[38] = 0.23;
    roumu_hiritu[37] = 0.24;

    var ryouritsu = {};
    ryouritsu[33] = 0.009;
    ryouritsu[35] = 0.0095;
    ryouritsu[38] = 0.012;
    ryouritsu[37] = 0.015;
  
    var tukisuu = {};
    tukisuu[1] = 15;
    tukisuu[2] = 14;
    tukisuu[3] = 13;
    tukisuu[4] = 12;
    tukisuu[5] = 11;
    tukisuu[6] = 10;
    tukisuu[7] = 9;
    tukisuu[8] = 8;
    tukisuu[9] = 7;
    tukisuu[10] = 6;
    tukisuu[11] = 5;
    tukisuu[12] = 4;
   
  </script>
 
  <title>労働保険事務組合RJC　無料見積りフォーム</title>
  
</head>

<style>
.mitsumori-list input[type=radio], .mitsumori-list input[type=checkbox] {
    display: block;
    position: absolute;
    opacity: 0;
}
.mitsumori-subttl {
    border-left: none;
    padding-left: 0;
}
.mitsumori-subttl .label{
 font-size: 16px;
 margin: 0 0.5em 0 0;
}

/* 20210521 */
.mitsumori-list,
.mitsumori-block {
    position: relative;
}
.mitsumori-list input[type=radio], .mitsumori-list input[type=checkbox] {
    top: 0px;
    height: 7em;
    width: 0px;
}
</style>
 
<body id="input_php">
<?php include_once  $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_body.html'; ?>
 
 
    <header>
      <div class="header__flex">
        <a href="/"><img class="h_logo" src="../assets/logo_img/logo_jimukumiai.png" width="327" alt="" /></a>
      </div>
     <div class="mitsumori-ttl-div mitsumori-ttl-div-step">
     <div class="div_center"><span>切替えステップ</span><img src="img/flow1.png" alt=""></div>
     </div>
     <div class="mitsumori-ttl-div mitsumori-ttl-div-main">
      <h1 class="div_center"><span>中小事業主の特別加入　見積もり</span></h1>
     </div>
    </header>
	
  <!-- contents ///////////////////////////////////-->
 <div id="mainbody">
  <main id="main">
   
    <form name="form" method="post" action="trans.php" enctype="multipart/mitsumori-data">
      <input type="hidden" id="pagename" name="pagename" value = "mitsumori.php">
        <input type="hidden" id="CellsNo__c" name="CellsNo__c" value = "<?php echo $_GET['cellsno'];?>">

      <section class="mitsumori mitsumori_start">
       
        <div class="mitsumori-inner">
          <div class="mitsumori-select">
           
           <div class="mitsumori-block-flex">
            <div class="mitsumori-block-title">
             <p><span>赤の他人を</span><span>雇っていますか？</span></p>
            </div>
            <div class="mitsumori-block-button">
            <ul class="mitsumori-list">
              <li>
                <input id="jyugyoin-ari1" type="radio" name="jyugyoin-ari" value="はい" >
                <label for="jyugyoin-ari1"><span>はい</span></label>
              </li>
              <li>
                <input id="jyugyoin-ari2" type="radio" name="jyugyoin-ari" value="いいえ" >
                <label for="jyugyoin-ari2"><span>いいえ</span></label>
              </li>

             </ul>
            </div>
            <div class="mitsumori-block-hint">
            </div>
           </div><!-- mitsumori-block-flex -->
           
           <div class="to_oyakata">
            <p class="to_oyakata_info">赤の他人を雇っていない方は一人親方労災保険へのご加入となります。</p>
            <a href="https://www.xn--4gqprf2ac7ft97aryo6r5b3ov.tokyo/mailform_new/single_new/mitsumori_input.php" class="to_oyakata_button">一人親方労災保険はこちら</a>
           </div>
           <p class="info_tel info_tel_pc">
            ※ 雇っているかわからない方は、労働保険事務組合RJC（0120-855-865）までお電話ください。
           </p>
           <p class="info_tel info_tel_sp">
            ※ 雇っているかわからない方は、お電話ください。<br><a href="tel:0120855865">労働保険事務組合RJCへ電話する</a>
           </p>

         </div>
       </div>
       
        <div class="mitsumori-inner motouke">
          <div class="mitsumori-select">
           
           <div class="mitsumori-block-flex">
            <div class="mitsumori-block-title">
             <p><span>元請工事</span><span>はありますか？</span></p>
            </div>
            <div class="mitsumori-block-button">
            <ul class="mitsumori-list">
              <li>
                <input id="motouke2" type="radio" name="motouke" value="いいえ" >
                <label for="motouke2"><span>いいえ</span></label>
              </li>
              <li>
                <input id="motouke1" type="radio" name="motouke" value="はい" >
                <label for="motouke1"><span>はい</span></label>
              </li>

             </ul>
            </div>
            <div class="mitsumori-block-hint">
            </div>
           </div><!-- mitsumori-block-flex -->
           
           <div class="motouke_msg">
            <p class="motouke_msg_info">当組合ではご加入いただけません。</p>
            <a href="/" class="totop_button">トップページへ</a>
           </div>

         </div>
       </div>
       
      </section>
     
     
      <section class="mitsumori" id="jyugyoin-ari_after_div">
        <div class="mitsumori-inner">
          <div class="mitsumori-select">
           
           <div>
            
           <div class="mitsumori-block-flex">
            <div class="mitsumori-block-title">
             <p>加入希望月</p>
            </div>
            <div class="mitsumori-block-button">
            <?php
             if(!isset($_SESSION['kikan'])){
              $_SESSION['kikan'] = $kanyu_month1;
             }
            $sel1 = '';
            $sel2 = '';
            if($_SESSION['kikan']==$kanyu_month1) $sel1 = 'checked';
            if($_SESSION['kikan']==$kanyu2_month1) $sel2 = 'checked';
            if($_SESSION['kikan']==4) $sel4 = 'checked';
            ?>
            <ul class="mitsumori-list">
              <li>
                <input id="kikan1" type="radio" name="kikan" value="<?php echo $kanyu_month1;?>" required="" <?php echo $sel1;?>>
                <label for="kikan1"><span><?php echo $kanyu_month1;?>月</span></label>
              </li>
              <li>
                <input id="kikan2" type="radio" name="kikan" value="<?php echo $kanyu2_month1;?>" required="" <?php echo $sel2;?>>
                <label for="kikan2"><span><?php echo $kanyu2_month1;?>月</span></label>
              </li>
             
             <?php /* 1月～2月　表示して受付する */ ?>
              <!--<li style="position: relative;">-->
             <!--
              <li>
                <input id="kikan4" type="radio" name="kikan" value="4" required="" <?php echo $sel4;?>>
                <label for="kikan4"><span>4月</span></label>
              </li>
              -->
             <?php /* 1月～2月　表示して受付する */ ?>
             
             </ul>
            </div>
            <div class="mitsumori-block-hint">
            </div>
           </div><!-- mitsumori-block-flex -->

            
           <div class="mitsumori-block-flex">
            <div class="mitsumori-block-title">
             <p>特別加入する人数</p>
            </div>
            <div class="mitsumori-block-button">
             <ul class="mitsumori-list">
             <?php 
             if(!isset($_SESSION['ninzu'])){
              $_SESSION['ninzu'] = 1;
             }
             $show_num=2;
             if($device=='スマホ'){
              $show_num=2;
             }
             for($i=1;$i<=5;$i++){
              $class='';
              if($i>($show_num-1)){
               $class='ninzu_sonota';
              }
              if($i==$show_num){
                echo '<li id="ninzu_sonota">
                 <input type="radio" name="ninzu_sonota" value="その他" class="mitsumori-other">
                 <label for="ninzu_sonota" class="ml_input170" onclick="show_sonota_ninzu();"><span>2人以上</span></label>
               </li>';
              }
              if($i>0 && $i%3==0){
               echo '</ul><ul class="mitsumori-list '.$class.'">';
              }
              $sel = '';
              if($_SESSION['ninzu']==$i) $sel = 'checked';
              echo '
              <li class="'.$class.'">
               <input id="ninzu'.$i.'" type="radio" name="ninzu" value="'.$i.'" required="" '.$sel.'>
               <label for="ninzu'.$i.'" class="ml_input170"><span>'.$i.' 人</span></label>
              </li>
              ';
             }
             ?>
             </ul>
            </div>
            <div class="mitsumori-block-hint">
             <a class="popup_link" onclick="popup('#msg3');">ヒント</a>
             
             <div id="msg3">
             <div class="mitsumori-block2" style="display: none;">
              <p class="q_title">特別加入する方とは？</p>
              <p class="q_text">会社の代表者や役員のうち、特別加入する人数を選んでください。</p>
             </div>
             </div>
            </div>
           </div><!-- mitsumori-block-flex -->

           <div class="mitsumori-block-flex">
            <div class="mitsumori-block-title">
             <p>給付基礎日額</p>
            </div>
            <div class="mitsumori-block-button">
             <ul class="mitsumori-list">
             <?php
             if(!isset($_SESSION['nitigaku'])){
              $_SESSION['nitigaku'] = '3500';
             }
             $sel1 = '';
             $sel2 = '';
             if($_SESSION['nitigaku']=='3500') $sel1 = 'checked';
             if($_SESSION['nitigaku']=='10000') $sel2 = 'checked';
             ?>
             <li>
               <input id="nitigaku3500" type="radio" name="nitigaku" value="3500" required="" <?php echo $sel1;?>>
               <label for="nitigaku3500"><span>3,500円</span></label>
             </li>
             <li>
               <input id="nitigaku10000" type="radio" name="nitigaku" value="10000" required="" <?php echo $sel2;?>>
               <label for="nitigaku10000"><span>10,000円</span></label>
             </li>
             </ul>
            </div>
            <div class="mitsumori-block-hint">
            </div>
           </div><!-- mitsumori-block-flex -->
            
           <div class="mitsumori-block-flex">
            <div class="mitsumori-block-title">
             <p>主な事業の種類</p>
            </div>
            <div class="mitsumori-block-button">
             <?php 
              echo '<script>$ss=0;</script>';
             ?>
             <ul class="mitsumori-list">
              <?php
             if(!isset($_SESSION['jigyou'])){
              $_SESSION['jigyou'] = $kouji_syubetu_btn[0];
             }
              $i=0;
              $show_num=5;
              foreach($kouji_syubetu_btn as $ksb){
               $class='';
               if($i>($show_num-1)){
                $class='jigyou_sonota';
               }
               if($i==$show_num){
                echo '<li id="jigyou_sonota">
                 <input type="radio" name="jigyou_sonota" value="その他" class="mitsumori-other">
                 <label for="jigyou_sonota" class="ml_input170" onclick="show_sonota();"><span>その他</span></label>
               </li>';
               }
               if($i>0 && $i%3==0){
                echo '</ul><ul class="mitsumori-list '.$class.'">';
               }
       $sel = '';
       $ss = '';
       $fs = '';
       if($_SESSION['jigyou']==$ksb){
        $sel = 'checked';
        if($i>=4) $ss = '<script>$ss=1;</script>';
       }
       if(mb_strlen($ksb)>5){
        $fs = ' class="fs-small1" ';
       }
       if(mb_strlen($ksb)>10){
        $fs = ' class="fs-small2" ';
       }
               echo '<li class="'.$class.'">
                 <input id="jigyou'.$i.'" type="radio" name="jigyou" value="'.$ksb.'" class="naiyou required kst1_'.$kouji_syubetu_type[$ksb][0].' kst2_'.$kouji_syubetu_type[$ksb][1].' kst3_'.$kouji_syubetu_type[$ksb][2].' kst4_'.$kouji_syubetu_type[$ksb][3].'" required '.$sel.'>
                 <label for="jigyou'.$i.'" class="ml_input170"><span'.$fs.'>'.$ksb.'</span></label>
        '.$ss.'
               </li>';
               $i++;
              }
?>                

             </ul>
            </div>
            <div class="mitsumori-block-hint">
             <a class="popup_link" onclick="popup('#msg2');">ヒント</a>
             
             <div id="msg2">
             <div class="mitsumori-block2" style="display: none;">
              <p class="q_title">複数の事業を営業している場合は？</p>
              <p class="q_text">一番売上が多い事業を選択してください。</p>
             </div>
             </div>
            </div>
           </div><!-- mitsumori-block-flex -->
            

           <div class="mitsumori-block-flex">
            <div class="mitsumori-block-title">
             <p>支払種別</p>
            </div>
            <div class="mitsumori-block-button">
             <ul class="mitsumori-list">
             <?php
             $sel1 = '';
             $sel2 = '';
             if($_SESSION['shiharai_kaisu']=='毎月払い') $sel1 = 'checked';
             if($_SESSION['shiharai_kaisu']=='年払い') $sel2 = 'checked';
             ?>
             <li class="disabled_button">
               <input id="shiharai_kaisu1" type="radio" name="shiharai_kaisu" value="毎月払い" required="" <?php echo $sel1;?> disabled>
               <label for="shiharai_kaisu1"><span>毎月払い</span></label>
             </li>
             <li>
               <input id="shiharai_kaisu2" type="radio" name="shiharai_kaisu" value="年払い" required="" <?php echo $sel2;?>>
               <label for="shiharai_kaisu2"><span>年払い</span></label>
             </li>
             </ul>
            </div>
            <div class="mitsumori-block-hint">
             <a class="popup_link" onclick="popup('#msg4');">ヒント</a>
             
             <div id="msg4">
             <div class="mitsumori-block2" style="display: none;">
              <p class="q_title">毎月払いとは？</p>
              <p class="q_text">初回費用として保険料と3か月分の会費等をお支払いただき、4か月目から月額会費を口座振替にてお支払いただく方法です。</p><br>
              <p class="q_title">年払いとは？</p>
              <p class="q_text">お申込み時に、保険料等を一括でお支払いただく方法です。</p>
             </div>
             </div>
             
            </div>
           </div><!-- mitsumori-block-flex -->
            
           <input type="hidden" name="jimuGyousyuBangou__c" value="">
           
            

           <div class="mitsumori-getprice">
            <input type="button" name="mitsumori-getprice-button" class="mitsumori-getprice-button yellow-shadow-button" value="金額はいくら？">
           </div>
            
           </div><!-- jyugyoin-ari_after_div -->
           </div>
           
          </div>
         
          <div class="mitsumori-result" id="mitumori_result">
           
           <p id="result_kikan" class="mitsumori-result-kikan"><span id="result_kikan_title">加入期間</span><br><span id="result_kikan_s"></span>　～　<span id="result_kikan_e"></span></p>
           <input type="hidden" name="kikan_sy" id="kikan_sy" value="">
           <input type="hidden" name="kikan_sm" id="kikan_sm" value="">
           <input type="hidden" name="kikan_ey" id="kikan_ey" value="">
           <input type="hidden" name="kikan_em" id="kikan_em" value="">

            <div class="mitsumori-result_item">
             
              <div class="mitsumori-result_item-sougaku mitsumori-result_item-sougaku_nowari">
              <div id="sougaku_title_nowari" class="sougaku_title">合計金額</div>
              <div id="sougaku_price_nowari" class="sougaku_price">
                <span id="sougaku_disp_nowari" class="sougaku_disp sougaku_disp_nowari"><?php echo $_SESSION['sougaku_nowari']; ?></span>円
              </div>
              </div>
             
              <div class="mitsumori-result_item-arrow">
               <img src="img/waribiki_arrow.png" alt="">
              </div>
             
              <div class="mitsumori-result_item-sougaku">
              <div id="sougaku_title" class="sougaku_title">合計金額</div>
              <div id="sougaku_price" class="sougaku_price">
                <span id="sougaku_disp" class="sougaku_disp"><?php echo $_SESSION['sougaku']; ?></span>円
              </div>
              </div>
             
              <input id="nyukaikin_nowari" type="hidden" name="nyukaikin_nowari" value="<?php echo $_SESSION['nyukaikin_nowari']; ?>">
              <input id="kaihi_nowari" type="hidden" name="kaihi_nowari" value="<?php echo $_SESSION['kaihi_nowari']; ?>">
              <input id="hokenryo_nowari" type="hidden" name="hokenryo_nowari" value="<?php echo $_SESSION['hokenryo_nowari']; ?>">
              <input id="sougaku_nowari" type="hidden" name="sougaku_nowari" value="<?php echo $_SESSION['sougaku_nowari']; ?>">
             
              <input id="nyukaikin" type="hidden" name="nyukaikin" value="<?php echo $_SESSION['nyukaikin']; ?>">
              <input id="kaihi" type="hidden" name="kaihi" value="<?php echo $_SESSION['kaihi']; ?>">
              <input id="hokenryo" type="hidden" name="hokenryo" value="<?php echo $_SESSION['hokenryo']; ?>">
              <input id="sougaku" type="hidden" name="sougaku" value="<?php echo $_SESSION['sougaku']; ?>">
             
            </div>
           
           
            <div id="mitsumori-result_button">
             <input class="mitsumori-btn yellow-shadow-button" id="mousikomi_next" type="submit" name="mousikomi_next" value="この金額で切替えする">
            </div>
            
           <br>
           <input type="hidden" name="maitsuki_kaihi" value="">
          </div>
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
  /*
  $('#jyugyoin-ari_after_div').hide();
  $('.to_oyakata').hide();
  $('#jyugyoin-ari1').click(function(){
   $('#jyugyoin-ari_after_div').show();
   $('.to_oyakata').hide();
  });
  $('#jyugyoin-ari2').click(function(){
   $('#jyugyoin-ari_after_div').hide();
   $('.to_oyakata').show();
  });
  */
  /* 20230302 従業員雇っているか？ */
  function init_mitsumori_start(){
   $('#jyugyoin-ari_after_div').hide();
   $('.to_oyakata').hide();
   $('.mitsumori-inner.motouke').hide();
  }
  function show_mitsumori(){
   $('#jyugyoin-ari_after_div').show();
   $('.to_oyakata').hide();
   $('.motouke_msg').hide();
  }
  function show_to_oyakata(){
   $('#jyugyoin-ari_after_div').hide();
   $('.to_oyakata').show();
   $('.mitsumori-inner.motouke').hide();
  }
  function show_motouke(){
   $('.mitsumori-inner.motouke').show();
   $('.to_oyakata').hide();
   $('.motouke_msg').hide();
   $('#jyugyoin-ari_after_div').hide();
  }
  function show_motouke_msg(){
   $('.mitsumori-inner.motouke').show();
   $('.to_oyakata').hide();
   $('.motouke_msg').show();
   $('#jyugyoin-ari_after_div').hide();
  }
  
  init_mitsumori_start();
  $('input[name="jyugyoin-ari"]').prop('checked', false);
  $('input[name="jyugyoin-ari"]').click(function(){
   const val_yes = 'はい';
   const val_no = 'いいえ';
   const selected_val = $('input[name="jyugyoin-ari"]:checked').val();
   if(selected_val == val_yes){
    show_motouke();
   } else if(selected_val == val_no){
    show_to_oyakata();
   } else {
    init_mitsumori_start();
   }
  });
  /* 20230302 従業員雇っているか？ */
  $('input[name="motouke"]').click(function(){
   const val_yes = 'はい';
   const val_no = 'いいえ';
   const selected_val = $('input[name="motouke"]:checked').val();
   if(selected_val == val_yes){
    show_motouke_msg();
   } else if(selected_val == val_no){
    show_mitsumori();
   } else {
    init_mitsumori_start();
   }
  });

 });
 
 $(window).on('load', function() {
  jouken_selchange();
 });
 
	$(function(){
  $('#mitumori').click(function(){
   get_price();
  });
  $('input[name="type"]').click(function(){
   jouken_selchange();
  });
  $('input[name="kikan"]').click(function(){
   jouken_selchange();
  });
  $('input[name="nitigaku"]').click(function(){
   jouken_selchange();
  });
  $('input[name="kouji_newold"]').click(function(){
   $roumu_sel = $('input[name="jigyou"]:checked').val();
   $kouji_newold_sel = $('input[name="kouji_newold"]:checked').val();

   $('#mb_tukuri').hide();
   $('input[name="tukuri"]').prop('checked', false);
   $('input[name="tukuri"]').prop('required', false);
   if(roumu[$roumu_sel+"3"] > 0){
    if(roumu[$roumu_sel+"2"] > 0){
     if($kouji_newold_sel == "新築工事"){
      $('#mb_tukuri').show();
      $('input[name="tukuri"]').prop('required', 'required');
     }
    }
   }
   
   jouken_selchange();
  });
  $('input[name="tukuri"]').click(function(){
   jouken_selchange();
  });
  <?php /* 20220122 紹介クーポン */ ?>
  $('input[name="cupon_check"]').click(function(){
   cupon_check();
  });
  <?php /* 20220122 紹介クーポン */ ?>
  $('input[name="mitsumori-getprice-button"]').click(function(){
   get_price();
  });
  $('input[name="shiharai_kaisu"]').click(function(){
   jouken_selchange();
  });

  $('#mb_kouji_newold').hide();
  $('#mb_tukuri').hide();
  
  $('input[name="jigyou"]').click(function(){
   $('input[name="kouji_newold"]').prop('checked', false);
   $('input[name="tukuri"]').prop('checked', false);
   
   jouken_selchange();
   $('input[name="jigyou1"]').val($('input[name="jigyou"]:checked').val());
   $('input[name="jigyou2"]').val($('input[name="jigyou"]:checked').val());
   $('input[name="jigyou3"]').val($('input[name="jigyou"]:checked').val());
   $('input[name="jigyou4"]').val($('input[name="jigyou"]:checked').val());
   $('input[name="jigyou5"]').val($('input[name="jigyou"]:checked').val());
  });
 $('input[name="jigyou1"]').val($('input[name="jigyou"]:checked').val());
 $('input[name="jigyou2"]').val($('input[name="jigyou"]:checked').val());
 $('input[name="jigyou3"]').val($('input[name="jigyou"]:checked').val());
 $('input[name="jigyou4"]').val($('input[name="jigyou"]:checked').val());
 $('input[name="jigyou5"]').val($('input[name="jigyou"]:checked').val());

  $('input[name="ninzu"]').click(function(){
   ninzu_selchange();
   jouken_selchange();
  });
  ninzu_selchange();
  $kanyutuki = $('input[name="kikan"]:checked').val();
  $roumu_sel = $('input[name="jigyou"]:checked').val();
  $ninzu = $('input[name="ninzu"]:checked').val();
  console.log($kanyutuki);
  console.log($roumu_sel);
  console.log($ninzu);
  if($kanyutuki === undefined || $roumu_sel === undefined || $ninzu === undefined){
   $('#input_sec').hide();
   $('#mousikomi_next').hide();
   $('.mitsumori-result').hide();
   $('.mitsumori-result-btn_block').hide();
   $('#input_sec input, #input_sec select').prop('disabled', true);
  }
  $('.jigyou_sonota').hide();
  $('.nitigaku_sonota').hide();
  $('.ninzu_sonota').hide();
  $('.ninzu2_sonota').hide();
  
  $('#error_jugyouin').hide();
  $('input[name="jugyouin"]').click(function(){
   $sel = $('input[name="jugyouin"]:checked').val();
   jouken_selchange();
   if($sel == 'はい'){
    $('#error_jugyouin').hide();
    $('#mitumori').prop('disabled', false);
   } else {
    $('#error_jugyouin').show();
    $('#mitumori').prop('disabled', true);
   }
   $('input[name="jugyouinninzu"]').click(function(){
    jouken_selchange();
   });
   $('input[name="nitigaku"]').click(function(){
    jouken_selchange();
   });
   
  });
  
	if($ss==1) show_sonota();
		
	});
 
 function show_sonota(){
  $('.jigyou_sonota').show();
  $('#jigyou_sonota').hide();
 }
 function show_sonota_m(){
  $('.nitigaku_sonota').show();
  $('#nitigaku_sonota').hide();
 }
 function show_sonota_ninzu(){
  $('.ninzu_sonota').show();
  $('#ninzu_sonota').hide();
 }
 function show_sonota_ninzu2(){
  $('.ninzu2_sonota').show();
  $('#ninzu2_sonota').hide();
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
	function get_price(){
    $('#input_sec').hide();
    $jugyouin = $('input[name="jugyouin"]:checked').val();
    $jugyouinninzu = $('input[name="jugyouinninzu"]:checked').val();
    $kanyutuki = $('input[name="kikan"]:checked').val();
    $kikan = 0;
    $roumu_sel = $('input[name="jigyou"]:checked').val();
    $nitigaku = $('input[name="nitigaku"]:checked').val();
    $shiharai_kaisu = $('input[name="shiharai_kaisu"]:checked').val();
  
    $('.mitsumori-getprice').hide();
  
    $('input[name="jimuGyousyuBangou__c"]').val("0");
  
    $kaihi_2y = 0;
    $nyukaikin_camp = 0;
  
    $roumu_val = 0;
    if(roumu[$roumu_sel+"0"] > 0){
     $roumu_val = parseInt(roumu[$roumu_sel+"0"] / 100);
     $('input[name="jimuGyousyuBangou__c"]').val(roumu[$roumu_sel+"0"]);
    } else {
     $kouji_newold_sel = $('input[name="kouji_newold"]:checked').val();
     $tukuri_sel = $('input[name="tukuri"]:checked').val();
     if($kouji_newold_sel == "新築工事"){
      $roumu_val = parseInt(roumu[$roumu_sel+"1"] / 100);
      $('input[name="jimuGyousyuBangou__c"]').val(roumu[$roumu_sel+"1"]);
     }
     if($kouji_newold_sel == "改修工事"){
      $roumu_val = parseInt(roumu[$roumu_sel+"2"] / 100);
      $('input[name="jimuGyousyuBangou__c"]').val(roumu[$roumu_sel+"2"]);
     }
     if($tukuri_sel == "木造"){
      $roumu_val = parseInt(roumu[$roumu_sel+"3"] / 100);
      $('input[name="jimuGyousyuBangou__c"]').val(roumu[$roumu_sel+"3"]);
     }
     if($tukuri_sel == "鉄骨"){
      $roumu_val = parseInt(roumu[$roumu_sel+"4"] / 100);
      $('input[name="jimuGyousyuBangou__c"]').val(roumu[$roumu_sel+"4"]);
     }
    }
  console.log("roumu_val="+$roumu_val);
  
    $motouke_kingaku = 100000;
    $nyukaikin = 10000;
    $jikotou_tsumitatekin = 0;
    $tmp_a = ($motouke_kingaku * roumu_hiritu[$roumu_val]) / 1000;
    $ninzu = $('input[name="ninzu"]:checked').val();
  
  console.log("ninzu="+$ninzu);
  // 20210319メモ　年度またぎの時は各年度の条件（料率等）で計算してから合算
  // 現時点ではそうなっていないので修正すること
    if(tukisuu[$kanyutuki]>12){
     $v = $nitigaku+"_12";
     $kisogaku = value[$v];
     $a = Math.floor(Math.floor($kisogaku/1000 * $ninzu) * (ryouritsu[$roumu_val] * 1000));
     
     $v2 = $nitigaku+"_"+(tukisuu[$kanyutuki]-12);
     $kisogaku2 = value[$v2];
     $a = $a + Math.floor(Math.floor($kisogaku2/1000 * $ninzu) * (ryouritsu[$roumu_val] * 1000));
    } else {
     $v = $nitigaku+"_"+tukisuu[$kanyutuki];
     $kisogaku = value[$v];
     $a = Math.floor(Math.floor($kisogaku/1000 * $ninzu) * (ryouritsu[$roumu_val] * 1000));
    }
  
    $b = Math.floor($tmp_a * (ryouritsu[$roumu_val] * 1000));
    $hokenryo = $a + $b;
  
    $kanyu_year = <?php echo $kanyu_year;?>;
    $kanyu2_year = <?php echo $kanyu2_year;?>;
    $kanyu_month = <?php echo $kanyu_month;?>;
    $kanyu2_month = <?php echo $kanyu2_month;?>;
  
//    $kaihi = 11000 + (1000 * ($ninzu - 1));
//    $kaihi = 4000 * tukisuu[$kanyutuki] + (1000 * ($ninzu - 1));
//    $kaihi = (4000 + (1000 * ($ninzu - 1))) * tukisuu[$kanyutuki];
    // 20210903 会費通年固定 42,000円＋（１人追加で＋24,000円）
//    $kaihi = 42000 + (24000 * ($ninzu - 1));
    // 20211201 会費通年固定 60,000円＋（１人追加で＋24,000円）
    // 申込みしないのは安すぎるからでは？という仮説から
    var now = new Date();
    var today = now.getDate();
    var today_m = now.getMonth()+1;
    var month3 = new Date($kanyu_year, $kanyu_month+2, 0);
    var month3_2 = new Date($kanyu2_year, $kanyu2_month+2, 0);
    var month4 = new Date($kanyu_year, $kanyu_month+3, 0);
  console.log(month3);
  
    $('.maitsuki_text3').hide();
    $('.maitsuki_text4').hide();
  
  
  // 加入期間は年だが、支払は４か月分（毎月払いの計算）
  
    if($shiharai_kaisu == '毎月払い'){
     $('#result_kikan_title').text('初回費用');
     $kaihi1 = 8000 + (2000 * ($ninzu - 1));
     
  
     if($kanyutuki == today_m){
      if(today > 20){
       $m = 4;
       $kaihi = $kaihi1 * 4;
       $('#result_kikan_s').text($kanyu_year+"年"+$kanyutuki+"月");
       $('#result_kikan_e').text(month4.getFullYear()+"年"+(month4.getMonth()+1)+"月末日");
       $('#kikan_sy').val($kanyu_year);
       $('#kikan_sm').val($kanyutuki);
       $('#kikan_ey').val(month4.getFullYear());
       $('#kikan_em').val(month4.getMonth()+1);
      } else {
       $m = 3;
       $kaihi = $kaihi1 * 3;
       $('#result_kikan_s').text($kanyu_year+"年"+$kanyutuki+"月");
       $('#result_kikan_e').text(month3.getFullYear()+"年"+(month3.getMonth()+1)+"月末日");
       $('#kikan_sy').val($kanyu_year);
       $('#kikan_sm').val($kanyutuki);
       $('#kikan_ey').val(month3.getFullYear());
       $('#kikan_em').val(month3.getMonth()+1);
      }
     } else {
      $m = 3;
      $kaihi = $kaihi1 * 3;      
      if($kanyutuki == $kanyu_month){
       $('#result_kikan_s').text($kanyu_year+"年"+$kanyutuki+"月");
       $('#result_kikan_e').text(month3.getFullYear()+"年"+(month3.getMonth()+1)+"月末日");
       $('#kikan_sy').val($kanyu_year);
       $('#kikan_sm').val($kanyutuki);
       $('#kikan_ey').val(month3.getFullYear());
       $('#kikan_em').val(month3.getMonth()+1);
      } else if($kanyutuki == 4){
       $('#result_kikan_s').text($kanyu2_year+"年4月");
       $('#result_kikan_e').text(month3_2.getFullYear()+"年6月末日");       
       $('#kikan_sy').val($kanyu2_year);
       $('#kikan_sm').val('4');
       $('#kikan_ey').val(month3_2.getFullYear());
       $('#kikan_em').val('6');
      } else {
       $('#result_kikan_s').text($kanyu2_year+"年"+$kanyutuki+"月");
       $('#result_kikan_e').text(month3_2.getFullYear()+"年"+(month3_2.getMonth()+1)+"月末日");       
       $('#kikan_sy').val($kanyu2_year);
       $('#kikan_sm').val($kanyutuki);
       $('#kikan_ey').val(month3_2.getFullYear());
       $('#kikan_em').val(month3_2.getMonth()+1);
      } 
     }
     // 20211227 会費計算修正
     
     $('.maitsuki_text').show();
     $('.maitsuki_val').text($kaihi1.toLocaleString('ja-JP'));
     $('input[name="maitsuki_kaihi"]').val($kaihi1);
     $kaihi_2y = $kaihi;
     $kaihi_camp = $kaihi;
    } else {
      $('#result_kikan_title').text('加入期間');
      $kaihi = 60000 + (24000 * ($ninzu - 1));
      
      $kaihi = 60000 + (24000 * ($ninzu - 1));
     // 20220309 謄本取得代行　割引率変更　40%→35%
      $kaihi_camp = $kaihi; // 20220527 会費割引廃止
      
      if($kanyutuki == $kanyu_month){
       $('#result_kikan_s').text($kanyu_year+"年"+$kanyutuki+"月");
       $ey = Math.ceil((($kanyu_year-1)*12+parseInt($kanyutuki)+parseInt(tukisuu[$kanyutuki]))/12);
       $('#result_kikan_e').text($ey+"年3月末日");
       $('#kikan_sy').val($kanyu_year);
       $('#kikan_sm').val($kanyutuki);
       $('#kikan_ey').val($ey);
       $('#kikan_em').val('3');
      } else {
       $('#result_kikan_s').text($kanyu2_year+"年"+$kanyutuki+"月");
       $ey = Math.ceil((($kanyu2_year-1)*12+parseInt($kanyutuki)+parseInt(tukisuu[$kanyutuki]))/12);
       $('#result_kikan_e').text($ey+"年3月末日");
       $('#kikan_sy').val($kanyu2_year);
       $('#kikan_sm').val($kanyutuki);
       $('#kikan_ey').val($ey);
       $('#kikan_em').val('3');
      }

      $('.maitsuki_text').hide();
      $('input[name="maitsuki_kaihi"]').val("");
    }
  console.log("kaihi="+$kaihi);
  
  
    $syokai_sougaku = $hokenryo + $nyukaikin + $jikotou_tsumitatekin + $kaihi ;
    $syokai_sougaku = Math.floor($syokai_sougaku);

    $syokai_sougaku_camp = $hokenryo + $jikotou_tsumitatekin + $kaihi_camp;
    $syokai_sougaku_camp = Math.floor($syokai_sougaku_camp);
  
    $('#mousikomi_next').show();
    $('.mitsumori-result').show();
    $('.mitsumori-result-btn_block').show();
    $('#input_sec input, #input_sec select').prop('disabled', false);
    if(isNaN($syokai_sougaku)){
     $syokai_sougaku = "";
     $kaihi = "";
     $('#mousikomi_next').hide();
     $('.mitsumori-result').hide();
     $('.mitsumori-result-btn_block').hide();
     $('#input_sec input, #input_sec select').prop('disabled', true);
    }
    if(isNaN($kaihi)){
     $syokai_sougaku = "";
     $kaihi = "";
     $('#mousikomi_next').hide();
     $('.mitsumori-result').hide();
     $('.mitsumori-result-btn_block').hide();
     $('#input_sec input, #input_sec select').prop('disabled', true);
    }
    
    $("#sougaku_disp").text($syokai_sougaku_camp.toLocaleString('ja-JP'));
    $("#sougaku_disp_nowari").text($syokai_sougaku.toLocaleString('ja-JP'));
    $("#sougaku_nowari").val($syokai_sougaku.toLocaleString('ja-JP'));
    $("#sougaku").val($syokai_sougaku_camp.toLocaleString('ja-JP'));
    $("#kaihi_disp").text($kaihi.toLocaleString('ja-JP'));
    $("#kaihi_nowari").val($kaihi.toLocaleString('ja-JP'));
    $("#kaihi").val($kaihi_camp.toLocaleString('ja-JP'));
    $("#hokenryo_disp").text($hokenryo.toLocaleString('ja-JP'));
    $("#hokenryo_nowari").val($hokenryo.toLocaleString('ja-JP'));
    $("#hokenryo").val($hokenryo.toLocaleString('ja-JP'));
    $("#nyukaikin").text("0");
    $("#nyukaikin_disp").val("10,000");
    $("#nyukaikin_nowari").val("10,000");

    if($kikan <= 0 && $shiharai_kaisu == '年払い'){
     $syokei = $syokai_sougaku;
     $nyukaikin_wari = -1 * ($nyukaikin - $nyukaikin_camp);
     $kaihi_wari = -1 * ($kaihi_2y - $kaihi_camp);
     $sougaku_wari = -1 * ($syokai_sougaku - $syokai_sougaku_camp);
     $("#syokei").val($syokei.toLocaleString('ja-JP'));
     $("#camp_nyukaikin_wari").val($nyukaikin_wari.toLocaleString('ja-JP'));
     $("#camp_kaihi_wari").val($kaihi_wari.toLocaleString('ja-JP'));
     $("#sougaku").val($syokai_sougaku_camp.toLocaleString('ja-JP'));
    } else if($kikan <= 0 && $shiharai_kaisu == '毎月払い'){
     $syokei = $syokai_sougaku;
     $nyukaikin_wari = -1 * ($nyukaikin - $nyukaikin_camp);
     $kaihi_wari = -1 * ($kaihi_2y - $kaihi_camp);
     $sougaku_wari = -1 * ($syokai_sougaku - $syokai_sougaku_camp);
     $("#syokei").val($syokei.toLocaleString('ja-JP'));
     $("#camp_nyukaikin_wari").val($nyukaikin_wari.toLocaleString('ja-JP'));
     $("#camp_kaihi_wari_tr").hide();
     $("#camp_kaihi_wari").val($kaihi_wari.toLocaleString('ja-JP'));
     $("#sougaku").val($syokai_sougaku_camp.toLocaleString('ja-JP'));
    }
     
    $('html,body').animate({scrollTop : $('div#mitumori_result').offset().top}, 0);
   
	}
 function ninzu_selchange(){
  $ninzu_sel = $('input[name="ninzu"]:checked').val();
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
  }
 }
 function jouken_selchange(){
  $('#input_sec').hide();
  $('#mousikomi_next').hide();
  $('.mitsumori-result').hide();
  $('.mitsumori-result-btn_block').hide();
  $('#input_sec input, #input_sec select').prop('disabled', true);
  $('#sougaku').val("");
  $('#kaihi').val("");
  $('#hokenryo').val("");
  
  $roumu_sel = $('input[name="jigyou"]:checked').val();
  $kouji_newold_sel = $('input[name="kouji_newold"]:checked').val();
  $tukuri_sel = $('input[name="tukuri"]:checked').val();
  
  $('#mb_kouji_newold').hide();
  $('input[name="kouji_newold"]').prop('required', false);
  if((roumu[$roumu_sel+"3"] == 0) || (roumu[$roumu_sel+"2"] == 0)){
   $('#mb_tukuri').hide();
   $('input[name="tukuri"]').prop('required', false);
  }
  if(roumu[$roumu_sel+"0"] > 0){
   $('input[name="kouji_newold"]').prop('checked', false);
   $('input[name="tukuri"]').prop('checked', false);
  } else {
   if(roumu[$roumu_sel+"3"] > 0){
    if(roumu[$roumu_sel+"2"] > 0){
     $('#mb_kouji_newold').show();
     $('input[name="kouji_newold"]').prop('required', 'required');
    } else {
     $('#mb_tukuri').show();
     $('input[name="tukuri"]').prop('required', 'required');
    }
   } else if(roumu[$roumu_sel+"2"] > 0){
     $('#mb_kouji_newold').show();
     $('input[name="kouji_newold"]').prop('required', 'required');
     $('input[name="tukuri"]').prop('checked', false);
     $('input[name="tukuri"]').prop('required', false);
   }
  }
  
  if(roumu[$roumu_sel+"3"] > 0){
   if(roumu[$roumu_sel+"2"] > 0){
    if($kouji_newold_sel == "新築工事"){
     $('#mb_tukuri').show();
     $('input[name="tukuri"]').prop('required', 'required');
    } else {
     $('#mb_tukuri').hide();
     $('input[name="tukuri"]').prop('checked', false);
     $('input[name="tukuri"]').prop('required', false);
    }
   }
  }

  // 2022/1～　日額選択は3500円、10000円の２択
  // 2022/1になったら日額6000円は完全に削除すること
  $('#nitigaku4').parent('li').hide();
  $('#nitigaku1').parent('li').show();
  $kanyutuki = $('input[name="kikan"]:checked').val();
  $kanyu_year = <?php echo $kanyu_year;?>;
  $kanyu_month = <?php echo $kanyu_month;?>;
  if(($kanyutuki == $kanyu_month) && (parseInt($kanyu_year) == 2021)){
   $('#nitigaku1').parent('li').hide();
   $('#nitigaku4').parent('li').show();
   $('#nitigaku1').prop('checked', false);
  } else {
   $('#nitigaku4').parent('li').hide();
   $('#nitigaku1').parent('li').show();
   $('#nitigaku4').prop('checked', false);
  }
  
  
  /* 20221201 入力が揃ったらボタン表示 */
  $('.mitsumori-getprice').hide();
  $kikan = $('input[name="kikan"]:checked').val();
  $ninzu = $('input[name="ninzu"]:checked').val();
  $nitigaku = $('input[name="nitigaku"]:checked').val();
  $jigyou = $('input[name="jigyou"]:checked').val();
  $shiharai_kaisu = $('input[name="shiharai_kaisu"]:checked').val();
  if($kikan != undefined && $ninzu != undefined && $nitigaku != undefined && $jigyou != undefined && $shiharai_kaisu != undefined){
   $('.mitsumori-getprice').show();
  }
  /* 20221201 入力が揃ったらボタン表示 */
  
 }
 
</script>

<script>
$height=0;
$(function(){
 $kanyu_year = <?php echo $kanyu_year;?>;
 $kanyu2_year = <?php echo $kanyu2_year;?>;
 $kanyu_month = <?php echo $kanyu_month;?>;
 $kanyu2_month = <?php echo $kanyu2_month;?>;
 var now = new Date();
 var today = now.getDate();
 var month3 = new Date($kanyu_year, $kanyu_month+2, 0);
 var month3_2 = new Date($kanyu2_year, $kanyu2_month+2, 0);
 var month4 = new Date($kanyu_year, $kanyu_month+3, 0);
console.log(month3);
  
 $('.maitsuki_text2_3').hide();
 $('.maitsuki_text2_4').hide();

 if(today > 20){
  $m = 4;
 } else {
  $m = 3;
 }

 $('.maitsuki_text2_'+$m).show();
 
});
function popup($id){
 $($id).addClass('popup2');
 $($id).find('.mitsumori-block2').toggle();
}
</script>

 
</body>
</html>