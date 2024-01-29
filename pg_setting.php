<?php
/* 動作モード 0:本番環境 -1:試験環境 */
if(!isset($mode)){ $mode = 0; }

/* 共通設定コード */
if($mode == -1){
 include $_SERVER["DOCUMENT_ROOT"].'/pg_hash.php';
 $pg_url = 'https://sandbox.paygent.co.jp/v/u/request';
 $seq_merchant_id = '52462';
 $return_url = 'https://'.$_SERVER['HTTP_HOST'].'/form_test/paid.php';
 $stop_return_url = 'https://'.$_SERVER['HTTP_HOST'].'/form_test/done.php';
} else {
 include $_SERVER["DOCUMENT_ROOT"].'/pg_hash_h.php';
 $pg_url = 'https://link.paygent.co.jp/v/u/request';
 $seq_merchant_id = '62094';
 $return_url = 'https://'.$_SERVER['HTTP_HOST'].'/form/paid.php';
 $stop_return_url = 'https://'.$_SERVER['HTTP_HOST'].'/form/done.php';
}

$merchant_name = '労働保険事務組合ＲＪＣ';
$banner_url = 'https://www.xn--y5q0r2lqcz91qdrc.com/assets/logo_img/logo_jimukumiai_s.png';

$trading_id=$_SESSION['trading_id'];
$payment_type='02';
$fix_params='';
$id=$_SESSION['sougaku'];
$payment_term_day='';
$payment_term_min='';
$payment_class='0';
$use_card_conf_number='0';
$customer_id=$_SESSION['order_no'];
$threedsecure_ryaku='1';

$stock_card_mode = 2;

/* 下記パラメータは個別に設定すること */
$payment_detail = '';
$payment_detail_kana = '';
$return_url = '';
$stop_return_url = '';

?>
