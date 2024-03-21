<?php //ヘッダーエリア
/**
 * Cocoon WordPress Theme
 * @author: yhira
 * @link: https://wp-cocoon.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */
/*if ( !defined( 'ABSPATH' ) ) exit; */?>

<?php /*
<div id="header-container" class="header-container test-container">
  <div id="header-container-in" class="header-container-in<?php echo get_additional_header_container_classes(); ?>">
    <header id="header" class="header<?php echo get_additional_header_classes(); ?> cf" itemscope itemtype="https://schema.org/WPHeader">

      <div id="header-in" class="header-in wrap cf" itemscope itemtype="https://schema.org/WebSite">

        <?php //キャッチフレーズがヘッダー上部のとき
        if (is_tagline_position_header_top()) {
           get_template_part('tmp/header-tagline');
        } ?>

        <?php //ロゴ前にコードを挿入するためのアクションフック
        do_action( 'wp_header_logo_before_open' ); ?>

        <?php //ロゴタグの生成
        generate_the_site_logo_tag(); ?>

        <?php //ロゴ後にコードを挿入するためのアクションフック
        do_action( 'wp_header_logo_after_open' ); ?>

        <?php //キャッチフレーズがヘッダー下部のとき
        if (is_tagline_position_header_bottom()) {
           get_template_part('tmp/header-tagline');
        } ?>

      </div>

    </header>

    <?php get_template_part('tmp/navi'); ?>
  </div><!-- /.header-container-in -->
</div><!-- /.header-container -->
*/ ?>





<link rel="stylesheet" href="/wp-content/themes/cocoon-child-master/tmp/header.css" type="text/css">
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
<script>
// jQueryが読み込まれているかどうかを確認
if (typeof jQuery === 'undefined') {
    // jQueryが読み込まれていない場合にのみ、指定のjQueryファイルを読み込む
    var script = document.createElement('script');
    script.src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js';
    script.onload = function () {
        // jQueryが読み込まれた後に実行したいコードをここに書く
        // 例: 共通部品を初期化する処理など
    };
    document.head.appendChild(script);
} else {
    // jQueryが既に読み込まれている場合に実行したいコードをここに書く
    // 例: 共通部品を初期化する処理など
}
</script>

<header id="common_header">
 <div id="ch_header" class="ch_outer jimu <?php echo $option_class;?>">
  <div class="ch_logo">
   <a href="/">
	   <div class="ch_logo_button_pc"><img src="https://www.xn--y5q0r2lqcz91qdrc.com/wp-content/uploads/2023/05/logo_jimukumiai.png" alt="労働保険事務組合RJC"></div>
	   <div class="ch_logo_button_sp"><img src="https://www.xn--y5q0r2lqcz91qdrc.com/wp-content/uploads/2023/05/logo_jimukumiai.png" alt="労働保険事務組合RJC"></div>
   </a>
  </div>
  
  <div class="ch_spacer">
  </div>
  
  <div class="ch_tel">
   <?php /* スマホ電話ボタンのリンク先修正 */ ?>
   <!--<a href="tel:0120855865">--><a href="/3058/">
    <div class="ch_tel_button_pc"><img src="/wp-content/uploads/2023/09/top_tel_s.png" alt="0120855865"></div>
    <div class="ch_tel_button_sp sp_button"><i class="fas fa-phone-alt tel_icon sp_icon"></i><span class="tel_text sp_text">TEL</span></div>
   </a>
  </div>
  
  <div class="ch_mypage">
   <?php  if($sidemenu_mode == 'mypage'){ ?>
   <a href="/mypage/logout.php">
    <div class="ch_mypage_button_pc"><i class="fas fa-user-lock mypage_icon"></i> <span class="mypage_text">マイページログアウト</span></div>
    <div class="ch_mypage_button_sp sp_button"><i class="fas fa-user-lock mypage_icon sp_icon"></i><span class="mypage_text sp_text">ログアウト</span></div>
   </a>
   <?php } else { ?>
   <a href="/mypage/index.php">
    <div class="ch_mypage_button_pc"><i class="fas fa-user-lock mypage_icon"></i> <span class="mypage_text">マイページログイン</span></div>
    <div class="ch_mypage_button_sp sp_button"><i class="fas fa-user-lock mypage_icon sp_icon"></i><span class="mypage_text sp_text">ログイン</span></div>
   </a>
   <?php } ?>
  </div>
  
  <div class="ch_menu">
   <a onclick="menu_slidein();">
    <div class="ch_menu_button_pc"><i class="fas fa-bars menu_icon"></i> <span class="menu_text">メニュー</span></div>
    <div class="ch_menu_button_sp sp_button"><i class="fas fa-bars menu_icon sp_icon"></i><span class="menu_text sp_text">メニュー</span></div>
   </a>
  </div>
  
 </div>
<?php
if($disp_titlebar == true){
 if($title != '' || $title_text != ''){
  echo '<h1 class="form_header_h1 jimu">
   <div class="header_title">
    <span class="title">'.$title.'</span> <span class="title_text">'.$title_text.'</span>
   </div></h1>
  ';
 }
}
?> 
</header>

<?php 
 if($sidemenu_mode == 'mypage'){
  include '/home/rjc/domains/xn--y5q0r2lqcz91qdrc.com/public_html/wp-content/themes/cocoon-child-master/tmp/sidemenu_mypage.php';
 } else {
//  include get_stylesheet_directory().'/tmp/sidemenu.php';
  include '/home/rjc/domains/xn--y5q0r2lqcz91qdrc.com/public_html/wp-content/themes/cocoon-child-master/tmp/sidemenu.php';
 }
?>

<script>
jQuery(function ($) {
 $('#ch_header').removeClass('fixed');
 $(window).scroll(function () {
  if ($(this).scrollTop() > 300) {
   header_fix();
  } else {
   header_nofix();
  }
 });
});
function header_fix(){
 jQuery('#ch_header').addClass('fixed');
}
function header_nofix(){
 jQuery('#ch_header').removeClass('fixed');
}
</script>

