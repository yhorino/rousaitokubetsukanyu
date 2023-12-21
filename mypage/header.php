<?php
//include_once('auth.php');
session_start();
require_once('common_function.php');
header("Content-type: text/html;charset=utf-8");

/*
 require_once("bin/sf_Api.php");
 init();
 sf_login();

 $result = (array)getKaisyabyOrderNo('58820109');
 $row = (array)$result["fields"];

 sf_logout();
*/
?>

<?php /*
<style>
@media screen and (min-width: 961px){
 .sp {
     display: none !important;
 }
}
@media screen and (max-width: 960px){
 .pc {
     display: none !important;
 }
}
 
// 20201012 ナビ固定 
// https://littlethings.jp/blog/web/scroll-menu 
.is-fixed {
  position: fixed;
  top: 0;
  left: 0;
  z-index: 200;
  width: 100%;
}
 
 .pc{
    background-color: #fff;
    border-bottom: 1px solid #eee;
 }
 header #h_title {
     background-color: #fff;
 }
 header #h_menu{
  background-color: #fff;
  line-height: 2em;
  max-width: 1000px;
  margin: 0 auto;
  margin-top: -43px;
 }
 header #h_menu .flex_row{
  max-width: 640px;
  margin: 0 0 0 auto;
 }
 header #h_menu .flex_row li{
  width: auto;
  border: none;
  padding: 0 15px 5px;
  font-size: 14px;
  color: #ccc;
  position: relative;
 }
 header #h_menu .flex_row li a{
  color: #1B983A;
  display: inline-block;
  font-size: 13px;
 }
 header #h_menu .flex_row li a:hover{
  text-decoration: underline;
 }
 header #h_menu .flex_row li:before {
    content: '';
    position: absolute;
    right: 0%;
    bottom: 14px;
    display: inline-block;
    width: 1px;
    height: 12px;
    -moz-transform: translateX(-50%);
    -webkit-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    transform: translate(-50%);
    background-color: #eee;
}
header #h_menu .flex_row li:last-child:before {
    display: none;
}
 
@media screen and (max-width: 960px){
 .header_body{
  font-size: 10px;
    line-height: 20px;
 }
 .header_body .header_sp{
  background-color: #fff;
 }
 .header_body .main-nav {
     display: -webkit-flex;
     display: flex;
     max-width: 100%;
     margin: auto;
     padding: 15px 0px 10px;
 }
 .header_body ul, .header_body li {
     list-style: none;
 }
 .header_body .main-nav a {
     display: block;
     color: inherit;
     text-decoration: inherit;
 }
 .header_body .main-nav a:link {
     color: #2c9400;
     text-decoration: none;
     border: none;
 }
 .header_body .logo img {
    height: 42px;
    width: auto;
    max-width: none;
    margin-top: 5px;
 }
 .header_body #nenkou, .header_body #telicon {
    margin-right: auto;
 }
 .header_body .header_top .header_top-right {
    float: right;
    margin-top: 5px;
    margin-left: 5px;
    margin-right: 5px;
 }
 .header_body .header_top .header_top-left a,
 .header_body .header_top .header_top-right a {
    display: inline-block;
    width: 42px;
    height: 42px;
 }
 .header_body .navbar-toggle:active, 
 .header_body .navbar-toggle:hover, 
 .header_body .active .navbar-toggle {
    background-color: #def7d3;
 }
 .header_body .navbar-toggle .icon-bar, 
 .header_body .active .navbar-toggle .icon-bar, 
 .header_body .navbar-toggle {
    transition: 0.3s;
 }
 .header_body .navbar-toggle {
    position: relative;
    float: right;
    width: 42px;
    height: 42px;
    margin: 0px 10px 5px 0;
    padding: 0px 10px;
    outline: 0 !important;
    background-color: transparent;
    background-image: none;
    border-color: #2c9400;
    border-radius: 4px;
    border: none;
    background: #def7d3;
 }
 .header_body .navbar-toggle .icon-bar, 
 .header_body .active .navbar-toggle .icon-bar, 
 .header_body .navbar-toggle {
    transition: 0.3s;
 }
 .header_body .navbar-toggle .icon-bar {
    display: block;
    width: 22px;
    height: 2px;
    border-radius: 1px;
    background-color: #2c9400;
 }
 .header_body .navbar-toggle .icon-bar+.icon-bar {
    margin-top: 4px;
 }
 .header_body .active .navbar-toggle .icon-bar+.icon-bar {
    margin-top: -1.5px;
 }
 .header_body .active .navbar-toggle .icon-bar.bar1 {
    -o-transform: rotate(45deg);
    -moz-transform: rotate(45deg);
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
 }
 .header_body .active .navbar-toggle .icon-bar.bar2 {
    opacity: 0;
 }
 .header_body .active .navbar-toggle .icon-bar.bar3 {
    -o-transform: rotate(-45deg);
    -moz-transform: rotate(-45deg);
    -webkit-transform: rotate(-45deg);
    -ms-transform: rotate(-45deg);
    transform: rotate(-45deg);
 }
 .header_body .header-dropdown {
     display: none;
     background-color: #fff;
     list-style-type: none;
     padding: 0;
     margin: 14px 0 14px 0;
     width: 100%;
     text-align: left;
     font-size: 15px;
     line-height: 160%;
 }
 .header_body .header-dropdown li {
    padding: 0;
    transition: 0.3s;
    border-bottom: 2px dashed #2c9400;
    text-align: left;
 }
 .header_body .header-dropdown li:first-child {
    border-top: 2px dashed #2c9400;
 }
 .header_body .header-dropdown li a {
    padding: 10px;
    display: block;
    text-decoration: none;
    color: inherit;
 }
 .header_body #nenkou2021 {
    background-color: #009BEB;
    font-size: 16px;
    line-height: 35px;
 }
 .header_body #nenkou2021 a {
    color: #fff;
    text-decoration: inherit;
    display: block;
    width: 100%;
 }
 .header_body #nenkou2021 a span {
    display: inline-block;
    float: right;
    margin-right: 10px;
 }
}
@media screen and (max-width: 400px){
 .header_body .main-nav {
     padding: 10px 0px 5px;
 }
 .header_body .logo img {
    height: 34px;
 }
}
 
header #h_title #flex1 a {
 width: 300px;
 display: block;
}
 
</style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>

<header class="header_body">
<div id="mainnav">
<div class="pc">
<div id="h_title">
<div class="flex_row inner">
<div id="flex1"><a href="/"><img src="/assets/logo_img/logo_jimukumiai.png" alt="労働保険事務組合RJC"></a></div>
<div id="flex2">
 <?php
 if($_SESSION['row']['Name'] != ''){
  echo '
 <nav>
  <ul>
   <li><a href="top.php">マイページTOP</a></li>
   <li><a href="kaisya.php">会社情報</a></li>
   <li><a href="kanyusya.php">特別加入者情報</a></li>
   <li><a href="kanyusya.php">会員カード</a></li>
   <li><a href="kanyusya.php">加入証明書</a></li>
   <li><a href="download.php">各種ダウンロード・印刷</a></li>
  </ul>
 </nav>';
 }
  ?>
 </div>
</div>
</div>
</div>
 
<!--スマホヘッダー ここから-->
  <div class="sp">
    <div class="header_sp">
      <div class="header_top">
        <div class="container">
          <div id="header">
            <nav>
              <ul class="main-nav">
                <li><a href="/" class="logo"><img src="/assets/logo_img/logo_jimukumiai.png" alt="労働保険事務組合RJC"></a></li>
               <li>
               <li>
                <div class="header_top-right">
                </div>
               </li>
                <div class="header_top-right">
                  <button type="button" class="navbar-toggle"> <span class="sr-only"></span> <span class="icon-bar bar1"></span> <span class="icon-bar bar2"></span> <span class="icon-bar bar3"></span> </button>
                </div>
             </li>
              </ul>
          <ul class="header-dropdown">
 <?php
 if($_SESSION['row']['Name'] != ''){
  echo '
   <li><a href="top.php">マイページTOP</a></li>
   <li><a href="kaisya.php">会社情報</a></li>
   <li><a href="kanyusya.php">特別加入者情報</a></li>
   <li><a href="kanyusya.php">会員カード</a></li>
   <li><a href="kanyusya.php">加入証明書</a></li>
   <li><a href="download.php">各種ダウンロード・印刷</a></li>
';
 }
  ?>
          </ul>
           
            </nav>
          </div>
      </div>
    </div>
  </div> 
 </div>
<!--スマホヘッダー ここまで-->
</div>

<div id="logout">
<!--<a href="change_pw.php" id="change_pw_button">パスワード変更</a>　-->
<a href="logout.php">ログアウト</a>
</div>

<div id="h_namebox" class="flex_row inner">
<div id="h_name"><span id="h_name_label"></span><?php echo $_SESSION['row']['Name'];?>　様</div>
<div id="h_seirino"><span id="h_seirino_label"><?php echo $title;?></span></div>
</div>

<div class="inner">

</div>

</header>

<script>
	$('.navbar-toggle').click(function () {
  console.log('click');
  $('.header_sp').toggleClass('active');
		$('.header_sp .header-dropdown').slideToggle();
	});
</script>
*/ ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
  <?php 
 $sidemenu_mode = 'mypage';
 include_once $_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/cocoon-child-master/tmp/header-container.php'; 

 ?>

