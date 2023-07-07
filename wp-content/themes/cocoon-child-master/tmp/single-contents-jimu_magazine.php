<?php
/**
 * Cocoon WordPress Theme
 * @author: yhira
 * @link: https://wp-cocoon.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */
if ( !defined( 'ABSPATH' ) ) exit;

///////////////////////////////////////
// 投稿ページのコンテンツ
///////////////////////////////////////?>
<?php //パンくずリストがメイントップの場合
if (is_single_breadcrumbs_position_main_top()){
  get_template_part('tmp/breadcrumbs');
} ?>

<?php //本文テンプレート
get_template_part('tmp/content-c_voice') ?>

<link rel="stylesheet" href="magazine.css">
<?php echo do_shortcode('[insert page=\'1086\' display=\'content\']'); /* 監修者 */ ?>
<?php echo do_shortcode('[insert page=\'1102\' display=\'content\']'); /* マガジン一覧 */ ?>
