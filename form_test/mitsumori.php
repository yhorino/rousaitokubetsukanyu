<?php
 //include $_SERVER['DOCUMENT_ROOT'] .'/maintenance_check.php';
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

// セッション切れチェック 初期化
 $timeout = 900;
 $_SESSION['idle_time'] = time() + $timeout;

// COOKIE変数初期化
setcookie('paid', '0', 0, '/');
setcookie('norikae', '0', 0, '/');

?>
<!DOCTYPE html>
<html lang="ja">

<head>
<?php include_once  $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_head.html'; ?>
 
 
  <title>労働保険事務組合RJC　無料見積りフォーム</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="format-detection" content="telephone=no">
 
  <link rel="canonical" href="https://www.xn--y5q0r2lqcz91qdrc.com/form/mitsumori.php">
  <meta name="robots" content="all">
  <meta name="copyright" content="Copyright 2020 労働保険事務組合RJC All Rights Reserved.">
  <meta property="og:title" content="労働保険事務組合RJC　無料見積りフォーム">
  <meta property="og:type" content="article">
  <meta property="og:url" content="https://www.xn--y5q0r2lqcz91qdrc.com/form/mitsumori.php">
  <meta property="og:image" content="https://www.xn--y5q0r2lqcz91qdrc.com/wp-content/uploads/2023/08/kv_sp_capture.png">
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
  <?php $v = time(); ?>
  <script src="../assets/js/app.js?v=<?php echo $v;?>"></script>
  <script src="value.js?v=<?php echo $v;?>"></script>

  <script type="text/javascript" src="../assets/js/jquery.jpostal.js-master/jquery.jpostal.js"></script>
  <script src="https://kit.fontawesome.com/a366e23f99.js" crossorigin="anonymous"></script>

</head>

<body id="input_php">
<?php include_once  $_SERVER['DOCUMENT_ROOT'].'/template_php/gtag_body.html'; ?>

 <!--
    <header>
      <div class="header__flex">
        <a href="/"><img class="h_logo" src="../assets/logo_img/logo_jimukumiai.png" width="327" alt="" /></a>
      </div>
      <h1 class="mitsumori-maintitle">中小事業主の特別加入見積り</h1>
    </header>
	-->
 <?php 
 $option_class = 'no_menu';
 include_once $_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/cocoon-child-master/tmp/header-container.php'; 
 ?>
 
  <!-- contents ///////////////////////////////////-->
 <div id="mainbody">
  <main id="main">
   
    <form name="form" method="post" action="trans.php" enctype="multipart/mitsumori-data" id="mitsumori_form">
      <input type="hidden" id="pagename" name="pagename" value = "mitsumori.php">
        <input type="hidden" id="CellsNo__c" name="CellsNo__c" value = "<?php echo $_GET['cellsno'];?>">
     
     <?php /* 20230302 従業員雇っているか？ */ ?>
     <section class="mitsumori_start">
        
      <div class="mitsumori-block-flex">
       <div class="mitsumori-block">
        <h2 class="mitsumori-subttl"><span class="st_orange">赤の他人</span>を雇っていますか？</h2>
         <ul class="mitsumori-list">
           <li>
             <input id="tanin1" type="radio" name="tanin" value="1">
             <label for="tanin1"><span>はい</span></label>
           </li>
           <li>
             <input id="tanin2" type="radio" name="tanin" value="-1">
             <label for="tanin2"><span>いいえ</span></label>
           </li>
           <li class="to_oyakata">
            <p class="to_oyakata_info">赤の他人を雇っていない方は一人親方労災保険へのご加入となります。</p>
            <a href="https://www.xn--4gqprf2ac7ft97aryo6r5b3ov.tokyo/mailform_new/single_new/mitsumori_input.php?utm_campaign=jimu_form_tanin" class="to_oyakata_button">一人親方労災保険はこちら</a>
           </li>
         </ul>
         <p class="info_tel info_tel_pc">
          ※ 雇っているかわからない方は、労働保険事務組合RJC（0120-855-865）までお電話ください。
         </p>
         <p class="info_tel info_tel_sp">
          ※ 雇っているかわからない方は、お電話ください。<br><a href="tel:0120855865">労働保険事務組合RJCへ電話する</a>
         </p>
       </div>
      </div><!-- mitsumori-block-flex -->
        
     </section>
     <?php /* 20230302 従業員雇っているか？ */ ?>
     
      <section class="mitsumori">
       
      <!--<h1 class="mitsumori-ttl">質問は５つです</h1>-->
       
        <div class="mitsumori-inner">
          <div class="mitsumori-select">
           
           <div class="mitsumori-block-flex">
            <div class="mitsumori-block">
             <h2 class="mitsumori-subttl"><span class="st_orange">いつから</span>ご加入が必要ですか？</h2>
							<?php
							$sel1 = 'checked';
							$sel2 = '';
							if($_SESSION['kikan']==$kanyu2_month1) {
        $sel1 = '';
        $sel2 = 'checked';
        $sel3 = '';
        $sel4 = '';
       }
							if($_SESSION['kikan']==4) {
        $sel1 = '';
        $sel2 = '';
        $sel3 = '';
        $sel4 = 'checked';
       }
							if($_SESSION['kikan']==3) {
        $sel1 = '';
        $sel2 = '';
        $sel3 = 'checked';
       }
							?>
             <script>console.log('last4day='+<?php echo $last4day; ?>);</script>
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
               <!--
                <li>
                  <input id="kikan3" type="radio" name="kikan" value="3" required="" <?php echo $sel3;?>>
                  <label for="kikan3"><span>3月</span></label>
                </li>
-->
                <li>
                  <input id="kikan4" type="radio" name="kikan" value="4" required="" <?php echo $sel4;?>>
                  <label for="kikan4"><span>4月</span></label>
                </li>
               <?php /* 1月～2月　表示して受付する */ ?>
              </ul>
             
               <?php /* 1月～2月　表示して受付する */ ?>
               <?php /* 
               <ul class="mitsumori-list">
                <li style="position: relative;">
                  <input id="kikan4" type="radio" name="kikan" value="4" required="" <?php echo $sel4;?>>
                  <label for="kikan4"><span class="button_2line_span">4月</span></label>
                 <div id="baloon-left">
                 <p class="balloon1-left"><span>3月末まで</span><span>ご加入中の方は</span><span>こちら！</span></p>
                 </div>
                </li>
               </ul>
               */ ?>
               <?php /* 1月～2月　表示して受付する */ ?>
              
            </div>
           </div><!-- mitsumori-block-flex -->

           <?php /* 20230508 支払種別→加入期間 */ ?>
           <div class="mitsumori-block-flex" id="mb_kanyu_kikan">
            <div class="mitsumori-block">
             <h2 class="mitsumori-subttl"><span class="st_orange">いつまで</span>ご加入が必要ですか？</h2>
							<?php
							//$sel1 = '';
							//$sel2 = '';
							$sel3 = '';
							$sel4 = 'checked';
							//if($_SESSION['kanyu_kikan']=='１か月') $sel1 = 'checked';
							//if($_SESSION['kanyu_kikan']=='２か月') $sel2 = 'checked';
							if($_SESSION['kanyu_kikan']=='３か月') $sel3 = 'checked';
							if($_SESSION['kanyu_kikan']=='年払い') $sel4 = 'checked';
							?>
              <ul class="mitsumori-list">
               <?php /*
                <li class="kikan_short">
                  <input id="kanyu_kikan1" type="radio" name="kanyu_kikan" value="１か月" required="" <?php echo $sel1;?>>
                  <label for="kanyu_kikan1"><span>１か月</span></label>
                </li>
                <li class="kikan_short">
                  <input id="kanyu_kikan2" type="radio" name="kanyu_kikan" value="２か月" required="" <?php echo $sel2;?>>
                  <label for="kanyu_kikan2"><span>２か月</span></label>
                </li>
                */ ?>
               <?php /* 202404まで停止
                <li class="kikan_short">
                  <input id="kanyu_kikan3" type="radio" name="kanyu_kikan" value="３か月" required="" <?php echo $sel3;?>>
                  <label for="kanyu_kikan3"><span>３か月</span></label>
                </li>
                */ ?>
               <?php /* 20231226 期間限定キャンペーン */ /* ?>
                <li>
                  <input id="kanyu_kikan4" type="radio" name="kanyu_kikan" value="年払い今年度のみ" required="" <?php echo $sel4;?>>
                  <label for="kanyu_kikan4"><span class="button_label_small"><?php echo $end_year-1;?>年3月31日</span></label>
                </li>
                <?php */ /* 20231226 期間限定キャンペーン */?>
                <li>
                  <input id="kanyu_kikan5" type="radio" name="kanyu_kikan" value="年払い" required="" <?php echo $sel4;?>>
                  <label for="kanyu_kikan5"><span class="button_label_small"><?php echo $end_year;?>年3月31日</span></label>
                </li>
              </ul>
            </div>
           </div><!-- mitsumori-block-flex -->
                      
           <div class="mitsumori-block-flex">            
            <div class="mitsumori-block" style="padding-bottom: 20px;">
             <h2 class="mitsumori-subttl"><span class="st_orange">給付基礎日額</span>をお選びください</h2>
              <ul class="mitsumori-list">
							       <script>$ss2=0;</script>
								<?php
								for($i=0;$i<16;$i++){
          $class='';
									$sel = '';
         $ss2 = '';
         if($i==0){
 									if(!isset($_SESSION['nitigaku']) || $_SESSION['nitigaku']==$nitigaku[$i]){
           $sel = 'checked';
          }
         } else {
          if($_SESSION['nitigaku']==$nitigaku[$i]){
           $sel = 'checked';
           if($i>=1) $ss2 = '<script>$ss2=1;</script>';
          }
         }
									$ii = $i+1;
         ?>
         <?php 
         if($nitigaku[$i]==3500 || $nitigaku[$i]==6000 || $nitigaku[$i]==10000){ ?>
									<li class="<?php echo $class; ?>">
										<input id="nitigaku<?php echo $ii; ?>" type="radio" name="nitigaku" value="<?php echo $nitigaku[$i]; ?>" required="" <?php echo $sel; ?>>
										<label for="nitigaku<?php echo $ii; ?>"><span><?php echo number_format($nitigaku[$i]); ?>円</span></label>
          <?php echo $ss2; ?>
									</li>
         <?php } ?>
								<?php }	?>
               
              </ul>
             <a class="popup_link show_sp hide_pc" onclick="popup('#msg4');">給付基礎日額とは？</a>
            </div>
            <div id="msg4">
            <div class="mitsumori-block2" style="height: 150px;">
             <p class="q_title">給付基礎日額とは？</p>
             <p class="q_text">保険料の計算の基礎となる金額です。<br>
             年度内の変更はできません。<br>
             工事現場によっては、給付基礎日額10,000円以上でないと現場入場できないと言われることもあるようです。
             </p>
             <a class="close_btn show_sp hide_pc" onclick="popup_close('#msg4');">閉じる</a>
            </div>
            </div>
           </div><!-- mitsumori-block-flex -->
           
           <div class="mitsumori-block-flex">            
            <div class="mitsumori-block">
             <h2 class="mitsumori-subttl"><span class="st_orange">特別加入する人数</span>は？</h2>
              <ul class="mitsumori-list">
								<?php 
        $show_num=2;
        if($device=='スマホ'){
         $show_num=2;
        }
								for($i=1;$i<=5;$i++){
         $class='';
         if($i>($show_num-1)){
          $class='ninzu_sonota';
         }
         ?>
         <?php if($i==$show_num){ ?>
         <span id="ninzu_sonota">
           <input class="mitsumori-other ml_input170" type="button" name="ninzu_sonota" value="2人以上" onclick="show_sonota_ninzu();">
         </span>
         <?php } ?>
         <?php 
									$sel = '';
         if($i==1){
 									if(!isset($_SESSION['ninzu']) || $_SESSION['ninzu']==$i) $sel = 'checked';
         } else {
 									if($_SESSION['ninzu']==$i) $sel = 'checked';
         }
         ?>
									<li class="<?php echo $class;?>">
										<input id="ninzu<?php echo $i; ?>" type="radio" name="ninzu" value="<?php echo $i; ?>" required="" <?php echo $sel; ?>>
										<label for="ninzu<?php echo $i; ?>" class="ml_input170"><span><?php echo $i; ?> 人</span></label>
									</li>
								<?php }	?>
               
              </ul>
             <a class="popup_link show_sp hide_pc" onclick="popup('#msg3');">特別加入する方とは？</a>
            </div>
            <div id="msg3">
            <div class="mitsumori-block2">
             <p class="q_title">特別加入する方とは？</p>
             <p class="q_text">会社の代表者や役員のうち、特別加入する人数を選んでください。</p>
             <a class="close_btn show_sp hide_pc" onclick="popup_close('#msg3');">閉じる</a>
            </div>
            </div>
           </div><!-- mitsumori-block-flex -->
           
           
           <div class="mitsumori-block-flex">
            <div class="mitsumori-block">
             <h2 class="mitsumori-subttl"><span class="st_orange">主な</span>事業の種類をひとつお選びください</h2>
							      <script>$ss=0;</script>
              <ul class="mitsumori-list">
               <?php
               $i=0;
               $show_num=5;
               if($device=='スマホ'){
                $show_num=5;
               }
               foreach($kouji_syubetu_btn as $ksb){
                $class='';
                if($i>($show_num-1)){
                 $class='jigyou_sonota';
                }
                ?>
                <?php if($i==$show_num){ ?>
                <span id="jigyou_sonota">
                  <input class="mitsumori-other ml_input170" type="button" name="jigyou_sonota" value="その他" onclick="show_sonota();">
                </span>
                <?php } ?>
               <?php 
                $sel = '';
                $ss = '';
                $fs = '';
                if($i==0){
                 if(!isset($_SESSION['jigyou']) || $_SESSION['jigyou']==$ksb){
                  $sel = 'checked';
                 }
                } else {
                 if($_SESSION['jigyou']==$ksb){
                  $sel = 'checked';
                  if($i>=4) $ss = '<script>$ss=1;</script>';
                 }
                }
                if(mb_strlen($ksb)>10){
                 //$fs = ' style="font-size: 10px; margin-left:20px; line-height: 16px; width: 60%;" ';
                 $fs = ' style="font-size: min(2.5vw, 10px);" ';
                }
                ?>
                <li class="<?php echo $class; ?>">
                  <input id="jigyou<?php echo $i; ?>" type="radio" name="jigyou" value="<?php echo $ksb; ?>" class="naiyou required kst1_<?php echo $kouji_syubetu_type[$ksb][0]; ?> kst2_<?php echo $kouji_syubetu_type[$ksb][1]; ?> kst3_<?php echo $kouji_syubetu_type[$ksb][2]; ?> kst4_<?php echo $kouji_syubetu_type[$ksb][3]; ?>" required <?php echo $sel; ?>>
                  <label for="jigyou<?php echo $i; ?>" class="ml_input170"><span <?php echo $fs; ?>><?php echo $ksb; ?></span></label>
									         <?php echo $ss; ?>
                </li>
               <?php $i++; ?>
               <?php } ?>                

                </ul>
             <a class="popup_link show_sp hide_pc" onclick="popup('#msg2');">複数の事業を営業している場合は？</a>
            </div>
            <div id="msg2">
            <div class="mitsumori-block2">
             <p class="q_title">複数の事業を営業している場合は？</p>
             <p class="q_text">一番売上が多い事業を選択してください。</p>
             <a class="close_btn show_sp hide_pc" onclick="popup_close('#msg2');">閉じる</a>
            </div>
            </div>
           </div>
           
           <div class="mitsumori-block-flex">
            <div class="mitsumori-block">
             <h2 class="mitsumori-subttl"><span class="st_orange">元請工事</span>はありますか？</h2>
              <ul class="mitsumori-list">
                <li>
                  <input id="motouke2" type="radio" name="motouke" value="-1">
                  <label for="motouke2"><span>いいえ</span></label>
                </li>
                <li>
                  <input id="motouke1" type="radio" name="motouke" value="1">
                  <label for="motouke1"><span>はい</span></label>
                </li>
              </ul>
              <a class="popup_link show_sp hide_pc" onclick="popup('#msg5');">元請工事とは？</a>
             
             <div id="motouke_input" class="motouke_input">
              <h3 class="motouke_input_title">1年間の元請工事について教えてください</h3>
              <div class="motouke_input_box">
               <h4 class="motouke_input_box_title"><span class="motouke_input_no">1</span> 元請工事の請負金額</h4>
               <span class="motouke_input_item">約 <input id="motouke_kingaku" type="tel" name="motouke_kingaku"> 万円</span>
              </div>
              <div class="motouke_input_box">
               <h4 class="motouke_input_box_title"><span class="motouke_input_no">2</span> 元請工事の件数</h4>
               <span class="motouke_input_item">約 <input id="motouke_kensu" type="tel" name="motouke_kensu"> 件</span>
              </div>
             </div>
            </div>
            <div id="msg5">
            <div class="mitsumori-block2">
             <p class="q_title">元請工事とは？</p>
             <p class="q_text">施主から直接仕事を請けるのが、「元請工事」です。<br>どこかの会社を経由して請けた場合は「下請工事」となります。 </p>
             <a class="close_btn show_sp hide_pc" onclick="popup_close('#msg5');">閉じる</a>
            </div>
            </div>
           </div><!-- mitsumori-block-flex -->

           <input type="hidden" name="jimuGyousyuBangou__c" value="">
           <input id="kikane2" type="hidden" name="kikane" value="0">

           
           <?php /* 20220414 有機溶剤使用項目追加 */ ?>
           <div class="mitsumori-block-flex" id="youzai_box">
            <div class="mitsumori-block">
             <h2 class="mitsumori-subttl">特別加入される方の中に<br><span class="st_orange">有機溶剤を通算6か月以上</span>使用している方はいますか？</h2>
							<?php
							$sel1 = '';
							$sel2 = 'checked';
							if($_SESSION['youzai']=="はい"){
        $sel1 = 'checked';
        $sel2 = '';
       }
							if($_SESSION['youzai']=="いいえ") $sel2 = 'checked';
							?>
              <ul class="mitsumori-list">
                <li>
                  <input id="youzai_n" type="radio" name="youzai" value="いいえ" required="" <?php echo $sel2;?>>
                  <label for="youzai_n"><span>いいえ</span></label>
                </li>
                <li>
                  <input id="youzai_y" type="radio" name="youzai" value="はい" required="" <?php echo $sel1;?>>
                  <label for="youzai_y"><span>はい</span></label>
                </li>
              </ul>

              <div id="youzai_next">
               <div class="youzai_kakunin">
                <h3>ご確認ください</h3>
                <p>
                 有機溶剤を使用される場合、国の健康診断を受診する必要があります。<br>
                 健康診断の承認後、本会員カードを発行します。<br>
                 承認までに、おおむね3か月ほどかかることがあります。<br>
                 お申込み後、健康診断について詳細をご案内します。
                </p>
                <ul class="mitsumori-list">
                  <li>
                   <input id="youzai_kakunin_y" type="radio" name="youzai_kakunin_y" value="わかりました">
                   <label for="youzai_kakunin_y"><span>わかりました</span></label>
                 </li>
                </ul>
               </div>
              </div>
            </div>
            
           </div><!-- mitsumori-block-flex -->
           
           

           
            
<?php
/* 20220122 紹介クーポン */
 if($_GET['utm_campaign'] == 'kanyusyasyo_cupon' || $_GET['utm_campaign'] == 'kanyusyasyo_cupon_y' || $_GET['utm_campaign'] == 'kanyusyasyo_cupon_m' || $_GET['utm_campaign2'] == 'kanyusyasyo_cupon'){ ?>
  <input type="hidden" id="fromSyokaiCupon__c" name="fromSyokaiCupon__c" value = "true">
  <style>.cupon_div{display: block;}</style>
 <?php } else { ?>
  <style>.cupon_div{display: none!important;}</style>
 <?php } ?>

           <div class="mitsumori-block-flex cupon_div cupon_no_input">
            <div class="mitsumori-block">
             <div class="mitsumori-block-title"><div>ご紹介クーポン番号</div></div>
             <input type="text" name="cupon_no" id="cupon_no"> <input type="button" name="cupon_check" id="cupon_check" value="クーポンを使う">
            </div>
           </div>
<?php /* 20220122 紹介クーポン */ ?>
            
           <div id="blue_tri">
           <img src="/assets/img/blue_tri.png" alt="">
           </div>
            
<?php /* 20220122 紹介クーポン */ ?>
           <div class="cupon_div cupon_div_result">
            <div class="cupon_div_result_nenbarai">
             <p class="cupon_div_result_title">クーポンが適用されました！</p>
             <p class="cupon_div_result_info">来年度の年会費　<strong>10,000円OFF</strong></p>
            </div>
            <div class="cupon_div_result_maitsukibarai">
             <p class="cupon_div_result_title">クーポンが適用されました！</p>
             <p class="cupon_div_result_info">来年度の月会費　<strong>1か月分OFF</strong></p>
            </div>
            <div class="cupon_div_result_notfound">
             <p class="cupon_div_result_title">有効なクーポン番号ではありません</p>
            </div>
            <input type="hidden" name="syoukai_kaisya_id" id="syoukai_kaisya_id" value="">
           </div>
<?php /* 20220122 紹介クーポン */ ?>
            
          </div>
         
          <div class="mitsumori-result" id="mitumori_result">
           
           <?php /* 20231226 期間限定キャンペーン */ ?>
           <div class="sougaku_disp_box_ribbon">
            <span class="sougaku_disp_box_ribbon_title">期間限定！</span><span class="sougaku_disp_box_ribbon_title">会費</span> <span class="sougaku_disp_box_ribbon_val">50%OFF</span> <span class="sougaku_disp_box_ribbon_title">キャンペーン中</span>
           </div>
           <p class="mitsumori_result_title">保険期間は2024年<span id="mitsumori_result_title_kikan_m"></span>月～25年3月31日</p>
           <?php /* 20231226 期間限定キャンペーン */ ?>
           <p class="mitsumori_result_title">支払方法を <span class="mitsumori_result_title_maitsuki">毎月払い</span> と <span class="mitsumori_result_title_ikatsu">年払い</span> からお選びください。</p>
           
           <div class="mitsumori_result_box">
            
            <div id="mitsumori_maitsuki_box" class="mitsumori_maitsuki_box mitsumori_box">
           <?php /* 20231226 期間限定キャンペーン */ /* ?>
             <div class="maitsuki_balloon">今、お金がない人はこっち！</div>
           <?php */ /* 20231226 期間限定キャンペーン */ ?>
             <div class="mitsumori_box_title">毎月払い</div>
             <div class="mitsumori_box_body">
           <?php /* 20231226 期間限定キャンペーン */ /* ?>
              <div class="mitsumori_box_kikan">保険期間は年度（年度末３月まで）</div>
           <?php */ ?>
              <div class="mitsumori_box_sougakutitle">お支払総額</div>
           <?php /* 20231226 期間限定キャンペーン */ ?>
              <div class="mitsumori_box_inner">
               <div class="mitsumori_box_sougaku">
           <?php /* 20231226 期間限定キャンペーン */ /* ?>
                <div class="mitsumori_box_sougaku_title">お支払総額</div>
           <?php */ ?>
                <div class="mitsumori_box_sougaku_kingaku_normal"><span id="sougaku_maitsuki_normal"></span><span>円</span> </div>
                <div class="mitsumori_box_sougaku_kingaku_arrow">→</div>
           <?php /* 20231226 期間限定キャンペーン */ ?>
                <div class="mitsumori_box_sougaku_kingaku"><input id="sougaku_maitsuki" type="text" name="sougaku_maitsuki" readonly required="" value=""></div>
                <div class="mitsumori_box_sougaku_kingaku_yen">円</div>
               </div>
               <div class="mitsumori_box_morebutton" onclick="toggle_mitsumori_more('mitsumori_maitsuki_box');"><span class="toggle_text">明細を見る</span>　<i class="fas fa-chevron-down toggle_icon"></i></div>
               <div class="mitsumori_box_more">
                <div class="mitsumori_box_more_line">
                 <div class="mitsumori_box_more_line_title">特別加入保険料</div>
                 <div class="mitsumori_box_more_line_kingaku"><input id="hokenryo_maitsuki" type="text" name="hokenryo_maitsuki" readonly required="" value=""></div>
                 <div class="mitsumori_box_more_line_kingaku_yen">円</div>
                </div>
                <div class="mitsumori_box_more_line">
                 <div class="mitsumori_box_more_line_title">元請工事保険料</div>
                 <div class="mitsumori_box_more_line_kingaku"><input id="motoukehokenryo_maitsuki" type="text" name="motoukehokenryo_maitsuki" readonly required="" value=""></div>
                 <div class="mitsumori_box_more_line_kingaku_yen">円</div>
                </div>
                <!--
                <div class="mitsumori_box_more_line">
                 <div class="mitsumori_box_more_line_title">プレミアムカード</div>
                 <div class="mitsumori_box_more_line_kingaku"><input id="card_disp_maitsuki" type="text" name="card_disp_maitsuki" readonly required="" value=""></div>
                 <div class="mitsumori_box_more_line_kingaku_yen">円</div>
                </div>
-->
                <div class="mitsumori_box_more_line more_line_kaihi">
                 <div class="mitsumori_box_more_line_title small">初期経費(会費等)</div>
                 <div class="mitsumori_box_more_line_kingaku kaihi_normal"><div id="kaihi_disp_maitsuki_normal"></div><div class="mitsumori_box_more_line_kingaku_yen">円</div></div>
                 <div class="mitsumori_box_more_line_kingaku_arrow">→</div>
                 <div class="mitsumori_box_more_line_kingaku kaihi_camp"><input id="kaihi_disp_maitsuki" type="text" name="kaihi_disp_maitsuki" readonly required="" value=""></div>
                 <div class="mitsumori_box_more_line_kingaku_yen">円</div>
                </div>
                <div class="mitsumori_box_more_info">※ <span id="syokai_tsukisu_next">5</span>か月目から、月々<span class="maitsuki_val"></span>円の会費振替となります。</div>
               </div>
              </div>
              <div class="mitsumori_box_submit">
               <button class="mitsumori_submit_button" id="mousikomi_next_maitsuki" type="submit" name="mousikomi_next_maitsuki">毎月払いで<br><span class='submit_text_large'>申込みへ進む</span></button>
              </div>
             </div>
             <input id="kaihi_maitsuki" type="hidden" name="kaihi_maitsuki" value="">
             <input id="card_hiyou_maitsuki" type="hidden" name="card_hiyou_maitsuki" value="">
             <input type="hidden" name="maitsuki_kaihi" value="">
            </div>

            <div id="mitsumori_ikatsu_box" class="mitsumori_ikatsu_box mitsumori_box">
             <div class="mitsumori_box_title">年払い</div>
             <div class="mitsumori_box_body">
           <?php /* 20231226 期間限定キャンペーン */ /* ?>
              <div class="mitsumori_box_kikan">保険期間は年度（年度末３月まで）</div>
           <?php */ ?>
              <div class="mitsumori_box_sougakutitle">お支払総額</div>
           <?php /* 20231226 期間限定キャンペーン */ ?>
              <div class="mitsumori_box_inner">
               <div class="mitsumori_box_sougaku">
           <?php /* 20231226 期間限定キャンペーン */ /* ?>
                <div class="mitsumori_box_sougaku_title">お支払総額</div>
           <?php */ ?>
                <div class="mitsumori_box_sougaku_kingaku_normal"><span id="sougaku_ikatsu_normal"></span><span>円</span> </div>
                <div class="mitsumori_box_sougaku_kingaku_arrow">→</div>
           <?php /* 20231226 期間限定キャンペーン */ ?>
                <div class="mitsumori_box_sougaku_kingaku"><input id="sougaku_ikatsu" type="text" name="sougaku_ikatsu" readonly required="" value=""></div>
                <div class="mitsumori_box_sougaku_kingaku_yen">円</div>
               </div>
               <div class="mitsumori_box_morebutton" onclick="toggle_mitsumori_more('mitsumori_ikatsu_box');"><span class="toggle_text">明細を見る</span>　<i class="fas fa-chevron-down toggle_icon"></i></div>
               <div class="mitsumori_box_more">
                <div class="mitsumori_box_more_line">
                 <div class="mitsumori_box_more_line_title">特別加入保険料</div>
                 <div class="mitsumori_box_more_line_kingaku"><input id="hokenryo_ikatsu" type="text" name="hokenryo_ikatsu" readonly required="" value=""></div>
                 <div class="mitsumori_box_more_line_kingaku_yen">円</div>
                </div>
                <div class="mitsumori_box_more_line">
                 <div class="mitsumori_box_more_line_title">元請工事保険料</div>
                 <div class="mitsumori_box_more_line_kingaku"><input id="motoukehokenryo_ikatsu" type="text" name="motoukehokenryo_ikatsu" readonly required="" value=""></div>
                 <div class="mitsumori_box_more_line_kingaku_yen">円</div>
                </div>
                <!--
                <div class="mitsumori_box_more_line">
                 <div class="mitsumori_box_more_line_title">プレミアムカード</div>
                 <div class="mitsumori_box_more_line_kingaku"><input id="card_disp_ikatsu" type="text" name="card_disp_ikatsu" readonly required="" value=""></div>
                 <div class="mitsumori_box_more_line_kingaku_yen">円</div>
                </div>
-->
                <div class="mitsumori_box_more_line more_line_kaihi">
                 <div class="mitsumori_box_more_line_title small">初期経費(会費等)</div>
                 <div class="mitsumori_box_more_line_kingaku kaihi_normal"><div id="kaihi_disp_ikatsu_normal"></div><div class="mitsumori_box_more_line_kingaku_yen">円</div></div>
                 <div class="mitsumori_box_more_line_kingaku_arrow">→</div>
                 <div class="mitsumori_box_more_line_kingaku kaihi_camp"><input id="kaihi_disp_ikatsu" type="text" name="kaihi_disp_ikatsu" readonly required="" value=""></div>
                 <div class="mitsumori_box_more_line_kingaku_yen">円</div>
                </div>
                <div class="mitsumori_box_more_info">　</div>
               </div>
              </div>
              <div class="mitsumori_box_submit">
               <button class="mitsumori_submit_button" id="mousikomi_next_ikatsu" type="submit" name="mousikomi_next_ikatsu">年払いで<br><span class='submit_text_large'>申込みへ進む</span></button>
              </div>
             </div>
             <input id="kaihi_ikatsu" type="hidden" name="kaihi_ikatsu" value="">
             <input id="card_hiyou_ikatsu" type="hidden" name="card_hiyou_ikatsu" value="">
            </div>
            
           </div>
           
           
           
           <!--
           <div id="mitsumori_maitsuki_box">
             <table style="">
              <tr><th>会　費</th>
              <td><input id="kaihi_disp_maitsuki" type="text" name="kaihi_disp_maitsuki" readonly required="" value="">円</td>
              <input id="kaihi_maitsuki" type="hidden" name="kaihi_maitsuki" value=""></tr>
              <tr><th>保険料</th>
              <td><input id="hokenryo_maitsuki" type="text" name="hokenryo_maitsuki" readonly required="" value="">円</td></tr>
              <tr><th>元請工事保険料</th>
              <td><input id="motoukehokenryo_maitsuki" type="text" name="motoukehokenryo_maitsuki" readonly required="" value="">円</td></tr>
              
              </table>
              <div id="sougaku_title">お支払総額</div>
              <div id="sougaku_price">
                <input id="sougaku_maitsuki" type="text" name="sougaku_maitsuki" readonly required="" value="">円
              </div>
            <div id="mitsumori-result_button">
             <input class="mitsumori-btn" id="mousikomi_next_maitsuki" type="submit" name="mousikomi_next_maitsuki" value="">
            </div>
           
           <input id="card_hiyou_maitsuki" type="hidden" name="card_hiyou_maitsuki" value="">
           <input type="hidden" name="maitsuki_kaihi" value="">
           
           <p class="mitsumori_info">※1 お支払総額には会費、保険料、会員カード発行費用が含まれています。</p>
           
           <p class="mitsumori_info">※2 毎月払いの場合は、初回費用として<span id="syokai_tsukisu">4</span>か月分をお支払いただき、<span id="syokai_tsukisu_next">5</span>か月目から月々<span class="maitsuki_val"></span>円を口座振替にてお支払いただきます。</p>
           </div>-->
           
           <!--
           <div id="mitsumori_ikatsu_box">
             <table style="">
              <tr><th>会　費</th>
              <td><input id="kaihi_disp_ikatsu" type="text" name="kaihi_disp_ikatsu" readonly required="" value="">円</td>
              <input id="kaihi_ikatsu" type="hidden" name="kaihi_ikatsu" value=""></tr>
              <tr><th>保険料</th>
              <td><input id="hokenryo_ikatsu" type="text" name="hokenryo_ikatsu" readonly required="" value="">円</td></tr>
              <tr><th>元請工事保険料</th>
              <td><input id="motoukehokenryo_ikatsu" type="text" name="motoukehokenryo_ikatsu" readonly required="" value="">円</td></tr>
              
              </table>
              <div id="sougaku_title">お支払総額</div>
              <div id="sougaku_price">
                <input id="sougaku_ikatsu" type="text" name="sougaku_ikatsu" readonly required="" value="">円
              </div>
            <div id="mitsumori-result_button">
             <input class="mitsumori-btn" id="mousikomi_next_ikatsu" type="submit" name="mousikomi_next_ikatsu" value="">
            </div>
           
           <input id="card_hiyou_ikatsu" type="hidden" name="card_hiyou_ikatsu" value="">
           
           <p class="mitsumori_info">※1 お支払総額には会費、保険料、会員カード発行費用が含まれています。</p>
           
           </div>-->
           
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
 
 function show_sonota(){
  $('.jigyou_sonota').show();
  $('#jigyou_sonota').hide();
 }
 function show_sonota_ninzu(){
  $('.ninzu_sonota').show();
  $('#ninzu_sonota').hide();
 }
 
 $(window).on('load', function() {
  jouken_selchange();
 });
 
	$(function(){
  $('#youzai_box').hide();
  
  $('input[name="youzai"]').click(function(){
   $sel = $('input[name="youzai"]:checked').val();
   $('#youzai_next').hide();
   if($sel == 'はい'){
    $('#youzai_next').show();
   }
   jouken_selchange();
  });
  $('#youzai_next').hide();
  $('select[name="youzai_naiyou"]').change(function(){
   jouken_selchange();
  });
  $('select[name="youzai_itukara_y"]').change(function(){
   jouken_selchange();
  });
  $('select[name="youzai_itukara_m"]').change(function(){
   jouken_selchange();
  });
  $('input[name="youzai_kakunin_y"]').click(function(){
   jouken_selchange();
  });
  
  $('input[name="type"]').click(function(){
   jouken_selchange();
  });
  $('input[name="kikan"]').click(function(){
   jouken_selchange();
  });
  $('input[name="kanyu_kikan"]').click(function(){
   jouken_selchange();
  });
  $('input[name="nitigaku"]').click(function(){
   jouken_selchange();
  });
  $('input[name="motouke"]').click(function(){
   jouken_selchange();
  });
  $('input[name="motouke_kingaku"]').change(function(){
   jouken_selchange();
  });
  <?php /* 20220122 紹介クーポン */ ?>
  $('input[name="cupon_check"]').click(function(){
   cupon_check();
  });
  <?php /* 20220122 紹介クーポン */ ?>

  $('input[name="jigyou"]').click(function(){
   
   jouken_selchange();
   $jigyou = $('input[name="jigyou"]:checked').val();
   $('#youzai_next').hide();
   $('#youzai_n').prop('checked', false);
   $('#youzai_y').prop('checked', false);
   $('#youzai_naiyou').val('');
   $('#youzai_itukara_y').val('');
   $('#youzai_itukara_m').val('');
   $('#youzai_kakunin_y').prop('checked', false);
   if($jigyou == '塗装' || $jigyou == '防水'){
    $('#youzai_box').show();
   } else {
    $('#youzai_box').hide();
    $('#youzai_n').prop('checked', true);
   }
  });

  $('input[name="ninzu"]').click(function(){
   jouken_selchange();
  });
  $kanyutuki = $('input[name="kikan"]:checked').val();
  $roumu_sel = $('input[name="jigyou"]:checked').val();
  $ninzu = $('input[name="ninzu"]:checked').val();
  if($kanyutuki === undefined || $roumu_sel === undefined || $ninzu === undefined){
   $('#mitumori_result').hide();
  }
  $('.jigyou_sonota').hide();
  $('.ninzu_sonota').hide();
  
  $('#error_jugyouin').hide();
  $('input[name="jugyouin"]').click(function(){
   $sel = $('input[name="jugyouin"]:checked').val();
   jouken_selchange();
   if($sel == 'はい'){
    $('#error_jugyouin').hide();
   } else {
    $('#error_jugyouin').show();
   }
   $('input[name="jugyouinninzu"]').click(function(){
    jouken_selchange();
   });
   $('input[name="nitigaku"]').click(function(){
    jouken_selchange();
   });
   
  });
  
	if($ss==1) show_sonota();
		
  /* 20230302 従業員雇っているか？ */
  function init_mitsumori_start(){
   $('.mitsumori').hide();
   $('.to_oyakata').hide();
   $('.mitsumori-block-flex.second_block').hide();
  }
  function show_mitsumori(){
   $('.mitsumori').show();
   $('.to_oyakata').hide();
  }
  function show_to_oyakata(){
   $('.mitsumori').hide();
   $('.to_oyakata').show();
  }
  function show_tanin(){
   $('.mitsumori-block-flex.second_block').show();
   $('.to_oyakata').hide();
   $('.mitsumori').hide();
  }
  
  init_mitsumori_start();
  $('input[name="tanin"]').prop('checked', false);
  $('input[name="tanin"]').click(function(){
   const val_yes = 1;
   const val_no = -1;
   const selected_val = $('input[name="tanin"]:checked').val();
   if(selected_val == val_yes){
    show_mitsumori();
   } else if(selected_val == val_no){
    show_to_oyakata();
   } else {
    init_mitsumori_start();
   }
  });
  /* 20230302 従業員雇っているか？ */
  $('input[name="motouke"]').click(function(){
   const val_yes = 1;
   const val_no = -1;
   const selected_val = $('input[name="motouke"]:checked').val();
   if(selected_val == val_yes){
    show_motouke_input();
   } else if(selected_val == val_no){
    hide_motouke_input();
   }
  });
	});
 function show_motouke_input(){
  $('#motouke_input').show();
  $('#motouke_input input').attr('required', 'true');
 }
 function hide_motouke_input(){
  $('#motouke_input input').removeAttr('required');
  $('#motouke_input').hide();
 }
 hide_motouke_input();

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
 
 function youzai_minyuryoku(){
  let $ret = false;
  // 20220418 有機溶剤あり　未入力の場合のチェック
  if($('input[name="youzai"]:checked').val() == 'はい'){
   if($('select[name="youzai_naiyou"]').val() == ''){
    $ret = true;
   }
   if($('select[name="youzai_itukara_y"]').val() == ''){
    $ret = true;
   }
   if($('select[name="youzai_itukara_m"]').val() == ''){
    $ret = true;
   }
   if($('input[name="youzai_kakunin_y"]:checked').val() != 'わかりました'){
    $ret = true;
   }
  }
  
  return $ret;
 }
 
	function get_price(){
  get_price_maitsuki();
  get_price_ikatsu();
 }
	function get_price_maitsuki(){
  $('input[name="jimuGyousyuBangou__c"]').val("0");
  
  const $hokenryo = calc_hokenryo_maitsuki();
  const $motoukehokenryo = calc_motoukehokenryo();
  let $kaihi = calc_kaihi_maitsuki();
  const $card_hiyou = calc_cardhiyou();
  const $kanyutuki = parseInt($('input[name="kikan"]:checked').val());
  const $motoukeari = $('input[name="motouke"]:checked').val();

//  console.log('毎月　元請保険料='+$motoukehokenryo);
  var $kanyu_year = <?php echo $kanyu_year;?>;
  var $kanyu2_year = <?php echo $kanyu2_year;?>;
  var $kanyu_month = <?php echo $kanyu_month;?>;
  var $kanyu2_month = <?php echo $kanyu2_month;?>;
  var now = new Date();
  var today_m = now.getMonth()+1;
  var month3 = new Date($kanyu_year, $kanyu_month+2, 0);
  var month3_2 = new Date($kanyu2_year, $kanyu2_month+2, 0);
  var month4 = new Date($kanyu_year, $kanyu_month+3, 0);
  var month4_2 = new Date($kanyu2_year, $kanyu2_month+3, 0);
  var kikan_e;
  var kikan_s_y;
  var $m;
  if($kanyutuki == today_m){
   /*
   if($kanyutuki == 1){
    $m = 3;
    kikan_s_y = $kanyu_year;
    kikan_e = month3;
   } else {
   */
    $m = 4;
    kikan_s_y = $kanyu_year;
    kikan_e = month4;
//   }
  } else {
   /*
   if($kanyutuki == 1){
    $m = 3;
    if($kanyutuki == $kanyu_month){
     kikan_s_y = $kanyu_year;
     kikan_e = month3;
    } else {
     kikan_s_y = $kanyu2_year;
     kikan_e = month3_2;
    }
   } else {
   */
    $m = 4;
    if($kanyutuki == $kanyu_month){
     kikan_s_y = $kanyu_year;
     kikan_e = month4;
    } else {
     kikan_s_y = $kanyu2_year;
     kikan_e = month4_2;
    }
//   }
  }
  $('#syokai_tsukisu').text($m);
  $('#syokai_tsukisu_next').text($m+1);

  let $kaihi1 = calc_kaihi_per_month();
  $('.maitsuki_val').text($kaihi1.toLocaleString('ja-JP'));
  $('input[name="maitsuki_kaihi"]').val($kaihi1);
  
  /* 20231226 期間限定キャンペーン */
  $('#mitsumori_result_title_kikan_m').text($kanyutuki);
  let $kaihi_normal = $kaihi;
  $kaihi = $kaihi / 2;
  let $syokai_sougaku_normal = $hokenryo + $kaihi_normal + $card_hiyou + $motoukehokenryo;
  $syokai_sougaku_normal = Math.floor($syokai_sougaku_normal);
  /* 20231226 期間限定キャンペーン */
  let $syokai_sougaku = $hokenryo + $kaihi + $card_hiyou + $motoukehokenryo;
  $syokai_sougaku = Math.floor($syokai_sougaku);

  $('#mitumori_result').show();
  if(isNaN($syokai_sougaku) || isNaN($kaihi)){
   $('#mitumori_result').hide();
  }

  if(youzai_minyuryoku() == true){
   $('#mitumori_result').hide();
  }

  if($kaihi == 0){
   $('#mitumori_result').hide();
  }

  if($motoukeari == undefined || $motoukeari == ''){
   $('#mitumori_result').hide();
  }
  
  let $kaihi_disp = $kaihi + $card_hiyou;
  /* 20231226 期間限定キャンペーン */
  let $kaihi_normal_disp = $kaihi_normal + $card_hiyou;
  //$("#card_disp_maitsuki").val($card_hiyou.toLocaleString('ja-JP'));
  $("#kaihi_disp_maitsuki_normal").text($kaihi_normal_disp.toLocaleString('ja-JP'));
  $("#kaihi_disp_maitsuki").val($kaihi_disp.toLocaleString('ja-JP'));
  /* 20231226 期間限定キャンペーン */
  $("#kaihi_maitsuki").val($kaihi.toLocaleString('ja-JP'));
  $("#hokenryo_maitsuki").val($hokenryo.toLocaleString('ja-JP'));
  $("#motoukehokenryo_maitsuki").val($motoukehokenryo.toLocaleString('ja-JP'));
  $("#card_hiyou_maitsuki").val($card_hiyou.toLocaleString('ja-JP'));

  /* 20231226 期間限定キャンペーン */
  $("#sougaku_maitsuki_normal").text($syokai_sougaku_normal.toLocaleString('ja-JP'));
  /* 20231226 期間限定キャンペーン */
  $("#sougaku_maitsuki").val($syokai_sougaku.toLocaleString('ja-JP'));

	}
 
 function get_price_ikatsu(){
  $('input[name="jimuGyousyuBangou__c"]').val("0");
  
  const $hokenryo = calc_hokenryo_ikatsu();
  const $motoukehokenryo = calc_motoukehokenryo();
  let $kaihi = calc_kaihi_ikatsu();
  const $card_hiyou = calc_cardhiyou();
  const $kanyutuki = parseInt($('input[name="kikan"]:checked').val());
  const $motoukeari = $('input[name="motouke"]:checked').val();

//  console.log('一括　元請保険料='+$motoukehokenryo);
  let $_kanyuyear = 0;
  if($kanyutuki == <?php echo $kanyu_month;?>){
   $_kanyuyear = <?php echo $kanyu_year;?>;
  } else {
   $_kanyuyear = <?php echo $kanyu2_year;?>;
  }
  
  let $_kanyu_tsukisu = 0;
  let $em = 0;
  if(is_kikan_tyoki()){
   $_kanyu_tsukisu = tukisuu[$kanyutuki];
   $em = 3;
  } else if(is_kikan_tanki()){
   $_kanyu_tsukisu = get_kikan();
   $em = $kanyutuki + $_kanyu_tsukisu - 1;
   if($em > 12) $em -= 12;
  } else if(is_kikan_tyoki_konnendo()){
   $_kanyu_tsukisu = tukisuu[$kanyutuki];
   if(parseInt($_kanyu_tsukisu)>12){
    $_kanyu_tsukisu = tukisuu[$kanyutuki]-12;
   }
   $em = 3;
  }
  const $ey = Math.ceil((($_kanyuyear-1)*12+$kanyutuki+parseInt($_kanyu_tsukisu))/12);
  $('input[name="kikane"]').val($ey+""+$em);
  $('input[name="maitsuki_kaihi"]').val("");
  
  /* 20231226 期間限定キャンペーン */
  $('#mitsumori_result_title_kikan_m').text($kanyutuki);
  let $kaihi_normal = $kaihi;
  $kaihi = $kaihi / 2;
  let $syokai_sougaku_normal = $hokenryo + $kaihi_normal + $card_hiyou + $motoukehokenryo;
  $syokai_sougaku_normal = Math.floor($syokai_sougaku_normal);
  /* 20231226 期間限定キャンペーン */
  let $syokai_sougaku = $hokenryo + $kaihi + $card_hiyou + $motoukehokenryo;
  $syokai_sougaku = Math.floor($syokai_sougaku);

  $('#mitumori_result').show();
  if(isNaN($syokai_sougaku) || isNaN($kaihi)){
   $('#mitumori_result').hide();
  }

  if(youzai_minyuryoku() == true){
   $('#mitumori_result').hide();
  }

  if($kaihi == 0){
   $('#mitumori_result').hide();
  }

  if($motoukeari == undefined || $motoukeari == ''){
   $('#mitumori_result').hide();
  }
  
  let $kaihi_disp = $kaihi + $card_hiyou;
  /* 20231226 期間限定キャンペーン */
  let $kaihi_normal_disp = $kaihi_normal + $card_hiyou;
  //$("#card_disp_ikatsu").val($card_hiyou.toLocaleString('ja-JP'));
  $("#kaihi_disp_ikatsu_normal").text($kaihi_normal_disp.toLocaleString('ja-JP'));
  $("#kaihi_disp_ikatsu").val($kaihi_disp.toLocaleString('ja-JP'));
  /* 20231226 期間限定キャンペーン */
  $("#kaihi_ikatsu").val($kaihi.toLocaleString('ja-JP'));
  $("#hokenryo_ikatsu").val($hokenryo.toLocaleString('ja-JP'));
  $("#motoukehokenryo_ikatsu").val($motoukehokenryo.toLocaleString('ja-JP'));
  $("#card_hiyou_ikatsu").val($card_hiyou.toLocaleString('ja-JP'));

  /* 20231226 期間限定キャンペーン */
  $("#sougaku_ikatsu_normal").text($syokai_sougaku_normal.toLocaleString('ja-JP'));
  /* 20231226 期間限定キャンペーン */
  $("#sougaku_ikatsu").val($syokai_sougaku.toLocaleString('ja-JP'));

	}
 
 function calc_roumu_val(){
    let $ret = 0;
    const $_roumu_sel = $('input[name="jigyou"]:checked').val();
    if(roumu[$_roumu_sel+"0"] > 0){
     $ret = parseInt(roumu[$_roumu_sel+"0"] / 100);
     $('input[name="jimuGyousyuBangou__c"]').val(roumu[$_roumu_sel+"0"]);
    }
    return $ret;
 }
 
 function calc_hokenryo_maitsuki(){

   let $ret = 0;
  
   const $_kanyutuki = $('input[name="kikan"]:checked').val();
   const $_nitigaku = $('input[name="nitigaku"]:checked').val();
   const $_roumu_val = calc_roumu_val();
   const $_ninzu = $('input[name="ninzu"]:checked').val();
   const $_tsukisu = tukisuu[$_kanyutuki];

   // 20210319メモ　年度またぎの時は各年度の条件（料率等）で計算してから合算
   // 現時点ではそうなっていないので修正すること
     if($_tsukisu>12){
      const $_v = $_nitigaku+"_12";
      const $_kisogaku = value[$_v];
      const $_a1 = Math.floor(Math.floor($_kisogaku/1000 * $_ninzu) * (ryouritsu[$_roumu_val] * 1000));

      const $_v2 = $_nitigaku+"_"+($_tsukisu-12);
      const $_kisogaku2 = value[$_v2];
      const $_a2 = Math.floor(Math.floor($_kisogaku2/1000 * $_ninzu) * (ryouritsu[$_roumu_val] * 1000));
      const $_hokenryo = $_a1 + $_a2;
      $ret = $_hokenryo;
     } else {
      const $_v = $_nitigaku+"_"+$_tsukisu;
      const $_kisogaku = value[$_v];
      const $_hokenryo = Math.floor(Math.floor($_kisogaku/1000 * $_ninzu) * (ryouritsu[$_roumu_val] * 1000));
      $ret = $_hokenryo;
     }
  
   return $ret;
 }
 function calc_motoukehokenryo(){

   let $ret = 0;
  
   let $_motouke_kingaku = 100000;
   if($('input[name="motouke"]:checked').val()=='1'){
    $_motouke_kingaku = parseInt($('input[name="motouke_kingaku"]').val())*10000;
    if($_motouke_kingaku < 100000) {$_motouke_kingaku = 100000;}
   }
   const $_roumu_val = calc_roumu_val();
   let $_roumu_hiritu = roumu_hiritu[$_roumu_val];
   // 2024年4月以降は全て0.23にする　roumu_hiritu[]を変更し、下記削除
   if($('input[name="kikan"]:checked').val()=='4'){ $_roumu_hiritu = 0.23; }
   const $_tmp_a = ($_motouke_kingaku * $_roumu_hiritu) / 1000;

  console.log('tmp_a='+$_tmp_a);
   const $_motouke_hokenryo = Math.floor($_tmp_a * (ryouritsu[$_roumu_val] * 1000));
   $ret = $_motouke_hokenryo;
  
   return $ret;
 }

 function calc_hokenryo_ikatsu(){

   let $ret = 0;
  
   const $_kanyutuki = $('input[name="kikan"]:checked').val();
   const $_nitigaku = $('input[name="nitigaku"]:checked').val();
   const $_roumu_val = calc_roumu_val();
   const $_ninzu = $('input[name="ninzu"]:checked').val();
   let $_tsukisu = get_kikan();
   if(is_kikan_tyoki()){
    $_tsukisu = tukisuu[$_kanyutuki];
   }
   if(is_kikan_tanki()){
    $_tsukisu = get_kikan();
   }
   if(is_kikan_tyoki_konnendo()){
    $_tsukisu = tukisuu[$_kanyutuki];
    if(parseInt($_tsukisu)>12){
     $_tsukisu = tukisuu[$_kanyutuki]-12;
    }
   }

   // 20210319メモ　年度またぎの時は各年度の条件（料率等）で計算してから合算
   // 現時点ではそうなっていないので修正すること
   if($_tsukisu>12){
    const $_v = $_nitigaku+"_12";
    const $_kisogaku = value[$_v];
    const $_a1 = Math.floor(Math.floor($_kisogaku/1000 * $_ninzu) * (ryouritsu[$_roumu_val] * 1000));

    const $_v2 = $_nitigaku+"_"+($_tsukisu-12);
    const $_kisogaku2 = value[$_v2];
    const $_a2 = Math.floor(Math.floor($_kisogaku2/1000 * $_ninzu) * (ryouritsu[$_roumu_val] * 1000));
    const $_hokenryo = $_a1 + $_a2;
    $ret = $_hokenryo;
   } else {
    const $_v = $_nitigaku+"_"+$_tsukisu;
    const $_kisogaku = value[$_v];
    const $_hokenryo = Math.floor(Math.floor($_kisogaku/1000 * $_ninzu) * (ryouritsu[$_roumu_val] * 1000));
    $ret = $_hokenryo;
   }
  
   return $ret;
 }

 function calc_kaihi_per_month(){
  const $_ninzu = $('input[name="ninzu"]:checked').val();
  const $_kaihi_base_maitsuki = 8000;
  const $_kaihi_per_ninzu_maitsuki = 2000;
  
  return $_kaihi_base_maitsuki + ($_kaihi_per_ninzu_maitsuki * ($_ninzu - 1));
 }
 
 function calc_kaihi_maitsuki(){
  const $kanyutuki = parseInt($('input[name="kikan"]:checked').val());
  
  var now = new Date();
  var today_m = now.getMonth()+1;
  let $ret = 0;
  let $kaihi1 = calc_kaihi_per_month();
  /*
  if($kanyutuki == 1){
   $m = 3;
  } else {
  */
   $m = 4;
//  }
  $ret = $kaihi1 * $m;
  
  return $ret;
 }
 
 function calc_kaihi_ikatsu(){
  const $_ninzu = $('input[name="ninzu"]:checked').val();
  const $_kaihi_base = 60000;
  const $_kaihi_per_ninzu = 24000;
  //const $_kaihi_base_tanki = 40000;
  //const $_kaihi_per_ninzu_tanki = 16000;
  //const $kanyutuki = parseInt($('input[name="kikan"]:checked').val());
  
  let $ret = 0;
  $ret = $_kaihi_base + ($_kaihi_per_ninzu * ($_ninzu - 1));
  
  if(is_kikan_tyoki_konnendo()){
   $ret = Math.floor($ret / 2);
  }
  return $ret;
 }
 
 function calc_cardhiyou(){
  const $_cardhiyou_base = 3300;
  const $_ninzu = $('input[name="ninzu"]:checked').val();
  return $_cardhiyou_base * $_ninzu;
 }
 
 function get_kikan(){
  const $_kikan = $('input[name="kanyu_kikan"]:checked').val();
  let $ret = 0;
  if($_kikan == '年払い'){
   $ret = 12;
  } else if($_kikan == '１か月'){
   $ret = 1;
  } else if($_kikan == '２か月'){
   $ret = 2;
  } else if($_kikan == '３か月'){
   $ret = 3;
  } else if($_kikan == '年払い今年度のみ'){
   $ret = 4;
  }
  return $ret;
 }
 function is_kikan_tyoki_konnendo(){
  const $_kikan = $('input[name="kanyu_kikan"]:checked').val();
  let $ret = false;
  if($_kikan == '年払い今年度のみ'){
   $ret = true;
  }
  return $ret;
 }
 function is_kikan_tyoki(){
  const $_kikan = $('input[name="kanyu_kikan"]:checked').val();
  let $ret = false;
  if($_kikan == '年払い'){
   $ret = true;
  }
  return $ret;
 }
 function is_kikan_tanki(){
  const $_kikan = $('input[name="kanyu_kikan"]:checked').val();
  let $ret = false;
  if($_kikan == '１か月'){
   $ret = true;
  }
  if($_kikan == '２か月'){
   $ret = true;
  }
  if($_kikan == '３か月'){
   $ret = true;
  }
  return $ret;
 }
 
 function jouken_selchange(){
  $('#mitumori_result').hide();
  $('#sougaku').val("");
  $('#kaihi').val("");
  $('#hokenryo').val("");
  
<?php /* 20220122 紹介クーポン */ ?>
  $('.cupon_no_input').hide();
  $('.cupon_div_result').hide();
  $('.cupon_div_result_nenbarai').hide();
  $('.cupon_div_result_maitsukibarai').hide();
  $('.cupon_div_result_notfound').hide();
  $('.cupon_no_input').show();
<?php /* 20220122 紹介クーポン */ ?>
 
  $roumu_sel = $('input[name="jigyou"]:checked').val();
  
   $('#nitigaku4').parent('li').hide();
   $('#nitigaku1').parent('li').show();
   $('#nitigaku4').prop('checked', false);
  
  /* 20211227 いつまでご加入が必要ですか？ */
  /*
  $end_year = <?php echo $end_year;?>;
  $end_month = <?php echo $end_month;?>;
  $end_year_3m = <?php echo $end_year_3m;?>;
  $end_month_3m = <?php echo $end_month_3m;?>;
  $end2_year_3m = <?php echo $end2_year_3m;?>;
  $end2_month_3m = <?php echo $end2_month_3m;?>;
  $kikan = $('input[name="kikan"]:checked').val();
  $end_year_r = $end_year -2018;
  $end_year_3m_r = $end_year_3m-2018;
  $end2_year_3m_r = $end2_year_3m -2018;
  if(parseInt($kikan) == parseInt(<?php echo $kanyu2_month;?>)){
   $('#kikane1').val($end2_year_3m+""+$end2_month_3m);
   $('#kikane1 + label span').text("令和" + $end2_year_3m_r + "年" + $end2_month_3m + "月末日");
  } else if(parseInt($kikan) == 4){
   $('#kikane1').val($end_year_3m+"6");
   $('#kikane1 + label span').text("令和" + $end_year_3m_r + "年6月末日");
  } else {
   $('#kikane1').val($end_year_3m+""+$end_month_3m);
   $('#kikane1 + label span').text("令和" + $end_year_3m_r + "年" + $end_month_3m + "月末日");
  }
  $('#kikane2 + label span').text("令和" + $end_year_r + "年" + $end_month + "月末日");
*/
  $kikan_sel = $('input[name="kikan"]:checked').val();
  if(parseInt($kikan_sel) == 12){
   $('input[name="kanyu_kikan"]').prop('checked', false);
   $('#kanyu_kikan4').prop('checked', true);
   $('#kanyu_kikan5 + label').hide();
  } else {
   $('#kanyu_kikan5 + label').show();
  }
  
  if(is_kikan_tyoki_konnendo()){
   $('.mitsumori_box_kikan').text('保険期間は年度（<?php echo $end_year-1;?>年3月31日まで）');
   $('.mitsumori-result').addClass('no_maitsuki');
  } else {
   $('.mitsumori_box_kikan').text('保険期間は年度（<?php echo $end_year;?>年3月31日まで）');
   $('.mitsumori-result').removeClass('no_maitsuki');
  }
  
  /* 20211227 塗装、防水を選んだら３か月、毎月払い不可 */
  $('.kikan_short').show();
  $jigyou = $('input[name="jigyou"]:checked').val();
  
  // 有機溶剤項目表示復元
  if($jigyou == '塗装' || $jigyou == '防水'){
   $('#youzai_box').show();
   if($('input[name="youzai"]:checked').val() == 'はい'){
    $('#youzai_next').show();
    $('.kikan_short').hide();
    $('.kikan_short input').prop('checked', false);
   }
  } else {
   $('#youzai_box').hide();
   $('#youzai_n').prop('checked', true);
  }
  
  if($jigyou == '塗装' || $jigyou == '防水'){
   $('#mb_kikane').hide();
   $('input[name="kikane"]').val(["0"]);
  } else {
  }
  
  //$('input[name="kanyu_kikan"]').prop('checked', false);
  //$('#kanyu_kikan4').prop('checked', true);
  //$('#mb_kanyu_kikan').hide();
  
  get_price();
  
 }
 
<?php /* 20220122 紹介クーポン */ ?>
 function cupon_check(){
  $cupon_no = $('input[name="cupon_no"]').val();
  $('.cupon_div_result').hide();
  $('.cupon_div_result_nenbarai').hide();
  $('.cupon_div_result_maitsukibarai').hide();
  $('.cupon_div_result_notfound').hide();
  $('input[name="syoukai_kaisya_id"]').val('');
  console.log($cupon_no);
  if($cupon_no != ''){
		$.ajax({
			type: 'POST',
			cache: false,
			url: 'check_cupon_no.php',
   timeout: 10000,
			data:{
				'cupon_no' : $cupon_no
			},
			success: function(j_data){
				$data = JSON.parse(j_data);
    console.log($data['found']);
				if($data['found'] == 'true'){
     $('.cupon_div_result').show();
     $('input[name="syoukai_kaisya_id"]').val($data['id']);
    } else {
     $('.cupon_div_result').show();
     $('.cupon_div_result_notfound').show();
    }
			},
   error: function(){
     $('.cupon_div_result').show();
     $('.cupon_div_result_notfound').show();
   }
  });
   
  }
 }
<?php /* 20220122 紹介クーポン */ ?>
</script>

<script>
$height=0;
function popup($id){
 $height = $($id).find('.mitsumori-block2').height();
 $($id).find('.mitsumori-block2').height($height + 35);
 $($id).addClass('popup2');
 $($id).fadeIn();
 $($id).find('.mitsumori-block2').show();
}
function popup_close($id){
 $($id).find('.mitsumori-block2').hide();
 $($id).fadeOut();
 $($id).removeClass('popup2');
 $($id).find('.mitsumori-block2').height($height);
}
 
/* EnterでのSubmit無効化 */
document.getElementById('mitsumori_form').onkeypress = function(e) {
 if (e.keyCode === 13) {
  return false;
 }
};
 
/* 見積り　明細を見るボタン */
function toggle_mitsumori_more($boxname){
 $('.' + $boxname + ' .mitsumori_box_more').toggle();
 if($('.' + $boxname + ' .toggle_icon').hasClass('fa-chevron-down')){
  $('.' + $boxname + ' .toggle_icon').removeClass('fa-chevron-down');
  $('.' + $boxname + ' .toggle_icon').addClass('fa-chevron-up');
  $('.' + $boxname + ' .toggle_text').text('明細を閉じる');
 } else {
  $('.' + $boxname + ' .toggle_icon').addClass('fa-chevron-down');
  $('.' + $boxname + ' .toggle_icon').removeClass('fa-chevron-up');
  $('.' + $boxname + ' .toggle_text').text('明細を見る');
 }
}
$(function(){
 $('.mitsumori_box_more').hide();
});
</script>

 
</body>
</html>